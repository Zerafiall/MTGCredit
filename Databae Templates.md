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
  PRIMARY KEY (`TransID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci

## Functions

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBalance`( 
	In PLayerIDInput int, 
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
    IN TransDelta decimal(16,2))
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
	INSERT INTO Transactions (PlayerID, Amount) VALUES (Player, TransDelta);
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `SetBalance`( 
    thisPlayerID int, 
    thisAmount decimal(16,2))
BEGIN
	INSERT INTO transactions (PlayerID, Amount) 
    VALUES (thisPlayerID , thisAmount);
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
