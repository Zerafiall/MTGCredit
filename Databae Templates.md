# Database

## Create Table

CREATE TABLE `Players` (
  `PlayerID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Balance` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PlayerID`),
  UNIQUE KEY `PlayerIDs_UNIQUE` (`PlayerID`),
  KEY `Players_firstandlast` (`FirstName`,`LastName`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

CREATE TABLE `Transactions` (
  `TransID` int NOT NULL AUTO_INCREMENT,
  `PlayerID` int NOT NULL,
  `Amount` decimal(16,2) NOT NULL,
  `Date` date NOT NULL,
  `Comment` varchar(200) NOT NULL,
  PRIMARY KEY (`TransID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

## Functions

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBalance`( 
	In PlayerIDInput int, 
	OUT BalanceForPlayer decimal(32,2))
BEGIN
	Select Balance
    into BalanceForPlayer
    From Players 
    Where PlayerID = PlayerIDInput;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetHistory5`(
	Player INT)
BEGIN
	Select *
    FROM Transactions 
    Where PlayerID = Player
    Order By TransID Desc
    Limit 5;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetHistoryX`(
	Player INT,
    Backwards INT)
BEGIN
	Select *
    FROM Transactions 
    Where PlayerID = Player
    Order By TransID Desc
    Limit Backwards;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `NewPlayer`(
    thisFirstName nvarchar(32), 
    thisLastName nvarchar(32))
BEGIN
	INSERT INTO Players (FirstName, LastName) 
    VALUES (thisFirstName, thisLastName);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `NewTransaction`( 
	IN Player int, 
    IN TransDelta decimal(16,2),
    IN NewComment varchar(200))
BEGIN
	-- Get old balance
    Select Balance
    INTO @CurBal
	From Players 
    Where PlayerID = Player;
	
    -- Do math
    SET @NewBal = @CurBal + TransDelta;
    
    -- Update Players Table 
    UPDATE Players
    Set Balance = @NewBal
    Where PlayerID = Player;
    
    -- Append Transaction Table
	INSERT INTO Transactions (PlayerID, Amount, Date, Comment) VALUES (Player, TransDelta, date, NewComment);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `SetBalance`( 
    thisPlayerID int, 
    thisAmount decimal(16,2),
    NewComment varchar(200))
BEGIN
	INSERT INTO transactions (PlayerID, Amount, Comment) 
    VALUES (thisPlayerID , thisAmount, NewComment);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchForPlayer`( 
	SearchTerm nvarchar(32),
    OUT PlayerRecivedID INT)
BEGIN    
	SET @term = concat('%',@SearchTerm,'%');
    
    SELECT PlayerID
    INTO PlayerRecivedID
    FROM Players 
	WHERE concat(FirstName, ' ', LastName) REGEXP (SearchTerm)
    LIMIT 1;
END

--- 

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `GetBalance`(IN `PLayerIDInput` int, OUT `BalanceForPlayer` decimal)
Select Balance
    into BalanceForPlayer
    From Players 
    Where PlayerID = PlayerIDInput$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `GetHistory5`(IN `PlayerIDInput` int)
Select *
    FROM Transactions 
    Where PlayerID = PlayerIDInput
    Order By TransID Desc
    Limit 5$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `GetHistoryX`(IN `PlayerIDInput` int, IN `Backwards` int)
Select *
    FROM Transactions 
    Where PlayerID = PlayerIDInput
    Order By TransID Desc
    Limit 5$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `NewPlayer`(IN `newFirstName` varchar(32), IN `newLastName` varchar(32))
INSERT INTO Players (FirstName, LastName) VALUES (newFirstName, newLastName)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `NewTransaction`( 
	IN Player int, 
    IN TransDelta decimal(16,2),
    IN Comment varchar(32))
BEGIN
	-- Get old balance
    Select Balance
    INTO @CurBal
	From Players 
    Where PlayerID = Player;
	
    -- Do math
    SET @NewBal = @CurBal + TransDelta;
    
    -- Update Players Table 
    UPDATE Players
    Set Balance = @NewBal
    Where PlayerID = Player;
    
    -- Append Transaction Table
	INSERT INTO Transactions (PlayerID, Amount, DATE, Comment) VALUES (Player, TransDelta, curdate(), Comment);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchForPlayer`( 
	SearchTerm nvarchar(32),
    OUT PlayerRecivedID INT)
BEGIN    
	SET @term = concat('%',@SearchTerm,'%');
    
    SELECT PlayerID
    INTO PlayerRecivedID
    FROM Players 
	WHERE concat(FirstName, ' ', LastName) REGEXP (SearchTerm)
    LIMIT 1;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `SetBalance`(IN `thisPlayerID` int, IN `thisAmount` decimal)
BEGIN
	INSERT INTO transactions (PlayerID, Amount) 
    VALUES (thisPlayerID , thisAmount);
END$$
DELIMITER ;
