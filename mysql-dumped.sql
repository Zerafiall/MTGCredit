-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: mtgcredit
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Players`
--

DROP TABLE IF EXISTS `Players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Players` (
  `PlayerID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Balance` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PlayerID`),
  UNIQUE KEY `PlayerIDs_UNIQUE` (`PlayerID`),
  KEY `Players_firstandlast` (`FirstName`,`LastName`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Players`
--

LOCK TABLES `Players` WRITE;
/*!40000 ALTER TABLE `Players` DISABLE KEYS */;
INSERT INTO `Players` VALUES (5,'Daniel','OConnor','139.5'),(6,'John','Backer','5'),(7,'Ari','M','10'),(8,'Ari','M','10'),(9,'Micheael','Greenburg','10'),(10,'Tristion','Hinkley','10'),(11,'Alex','Rogers','10'),(12,'Donovan','Lachney','10'),(13,'Will','Dalke','10');
/*!40000 ALTER TABLE `Players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Transactions` (
  `TransID` int NOT NULL AUTO_INCREMENT,
  `PlayerID` int NOT NULL,
  `Amount` decimal(16,2) NOT NULL,
  `Comment` varchar(45) DEFAULT 'No commnt added',
  `Date` date NOT NULL,
  PRIMARY KEY (`TransID`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Transactions`
--

LOCK TABLES `Transactions` WRITE;
/*!40000 ALTER TABLE `Transactions` DISABLE KEYS */;
INSERT INTO `Transactions` VALUES (24,4,4.00,'Winnings','0000-00-00'),(25,1,10.00,'Winnings','0000-00-00'),(26,4,-5.00,'Entry','0000-00-00'),(27,5,20.00,'Winnings','0000-00-00'),(28,2,-5.50,'Coffee','0000-00-00'),(29,3,4.00,'Winnings','0000-00-00'),(30,1,10.00,'Winnings','0000-00-00'),(31,4,-5.00,'Entry','0000-00-00'),(32,5,20.00,'Winnings','0000-00-00'),(33,2,-5.50,'Coffee','0000-00-00'),(34,3,4.00,'Winnings','0000-00-00'),(35,1,10.00,'Winnings','0000-00-00'),(36,4,-5.00,'Entry','0000-00-00'),(37,5,20.00,'Winnings','0000-00-00'),(38,2,-5.50,'Coffee','0000-00-00'),(39,3,4.00,'Winnings','0000-00-00'),(40,1,10.00,'Winnings','0000-00-00'),(41,4,-5.00,'Entry','0000-00-00'),(42,5,20.00,'Winnings','0000-00-00'),(43,2,-5.50,'Coffee','0000-00-00'),(44,3,4.00,'Winnings','0000-00-00'),(45,1,10.00,'Winnings','0000-00-00'),(46,4,-5.00,'Entry','0000-00-00'),(47,5,20.00,'Winnings','0000-00-00'),(48,2,-5.50,'Coffee','0000-00-00'),(49,3,4.00,'Winnings','0000-00-00'),(50,1,10.00,'Winnings','0000-00-00'),(51,4,-5.00,'Entry','0000-00-00'),(52,5,20.00,'Winnings','0000-00-00'),(53,2,-5.50,'Coffee','0000-00-00'),(54,3,4.00,'Winnings','0000-00-00'),(55,1,10.00,'Winnings','0000-00-00'),(56,4,-5.00,'Entry','0000-00-00'),(57,5,20.00,'Winnings','0000-00-00'),(58,2,-5.50,'Coffee','0000-00-00'),(59,3,4.00,'Winnings','0000-00-00'),(60,1,10.00,'Winnings','0000-00-00'),(61,4,-5.00,'Entry','0000-00-00'),(62,5,20.00,'Winnings','0000-00-00'),(63,2,-5.50,'Coffee','0000-00-00'),(64,3,4.00,'Winnings','0000-00-00'),(65,6,5.00,'Winnings','0000-00-00'),(66,6,5.00,'Winnings','0000-00-00'),(67,7,5.00,'Winnings','0000-00-00'),(68,8,5.00,'Winnings','0000-00-00'),(69,9,5.00,'Winnings','0000-00-00'),(70,10,5.00,'Winnings','0000-00-00'),(71,11,5.00,'Winnings','0000-00-00'),(72,12,5.00,'Winnings','0000-00-00'),(73,13,5.00,'Winnings','0000-00-00'),(74,6,5.00,'Winnings','2022-01-16'),(75,7,5.00,'Winnings','2022-01-16'),(76,8,5.00,'Winnings','2022-01-16'),(77,9,5.00,'Winnings','2022-01-16'),(78,10,5.00,'Winnings','2022-01-16'),(79,11,5.00,'Winnings','2022-01-16'),(80,12,5.00,'Winnings','2022-01-16'),(81,13,5.00,'Winnings','2022-01-16'),(82,5,-5.00,'','2022-01-16'),(83,5,-5.00,'Entry','2022-01-16'),(84,5,-5.00,'Entry','2022-01-16'),(85,5,-5.00,'Entry','2022-01-16'),(86,5,-5.00,'Entry for Dan','2022-01-16'),(87,6,-5.00,'Entry for John','2022-01-16'),(88,6,-5.00,'Entry for John','2022-01-16'),(89,5,-5.50,'Coffee','2022-01-17');
/*!40000 ALTER TABLE `Transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-20  3:44:15
