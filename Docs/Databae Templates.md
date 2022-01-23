-- Database creation for MTGCredit

-- Create Table

CREATE TABLE `Players` (
  `PlayerID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Balance` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PlayerID`),
  UNIQUE KEY `PlayerIDs_UNIQUE` (`PlayerID`),
  KEY `Players_firstandlast` (`FirstName`,`LastName`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `Transactions` (
  `TransID` int NOT NULL AUTO_INCREMENT,
  `PlayerID` int NOT NULL,
  `Amount` decimal(16,2) NOT NULL,
  `Comment` varchar(45) DEFAULT 'No commnt added',
  `Date` date NOT NULL,
  PRIMARY KEY (`TransID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `usersID` int NOT NULL AUTO_INCREMENT,
  `usersUID` varchar(45) NOT NULL,
  `usersPWD` varchar(1000) NOT NULL,
  PRIMARY KEY (`usersID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
O

-- Functions
DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `createUser`(
userUID varchar(45),
userPWD varchar(1000))
BEGIN
	INSERT INTO users (usersUID, usersPWD) VALUES (userUID, userPWD);
END$$
DELIMITER ;

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
    FROM Trasactions 
    Where PlayerID = PlayerIDInput
    Order By TransID Desc
    Limit 5$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `GetPlayerName`(IN `inPlayerID` int)
BEGIN
	SELECT * FROM Players WHERE PlayerID = inPlayerID ;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `loginUser`(
userName varchar(45))
BEGIN
SELECT * FROM users WHERE usersUID = userName;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `NewPlayer`(IN `newFirstName` varchar(32), IN `newLastName` varchar(32))
INSERT INTO Players (FirstName, LastName) VALUES (newFirstName, newLastName)$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`%` PROCEDURE `NewTransaction`(IN `Player` int, IN `TransDelta` decimal(16,2), IN `Comment` varchar(32))
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
	INSERT INTO Transactions (PlayerID, Amount, Date, Comment) VALUES (Player, TransDelta, curdate(), Comment);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchForPlayer`( 
	SearchTerm varchar(32),
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
n
