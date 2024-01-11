-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: smartagriculture
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `land`
--

DROP TABLE IF EXISTS `land`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `land` (
  `Land_id` int NOT NULL AUTO_INCREMENT,
  `Farmer_id` int DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Soil_type` varchar(255) DEFAULT NULL,
  `Crop_type` varchar(255) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`Land_id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `land`
--

LOCK TABLES `land` WRITE;
/*!40000 ALTER TABLE `land` DISABLE KEYS */;
INSERT INTO `land` VALUES (1,1,'Field A','Loam','Rice',1),(2,2,'Field B','Silt','Wheat',1),(3,3,'Field C','Clay','Corn',2),(4,4,'Field D','Sandy Loam','Barley',3),(5,5,'Field E','Peat','Soybeans',6),(94,5,'','Silt','cron',6),(95,NULL,'Field A',NULL,'potato',6),(96,NULL,'Field A',NULL,'potato',6),(97,NULL,'Field A',NULL,'potato',6),(98,NULL,'Field F',NULL,'potato',6),(99,NULL,'Field 7',NULL,'tomato',6),(100,NULL,'Field 8',NULL,'tomato',6),(101,NULL,'Field 23','Loam','tomato',6),(102,NULL,'Field 10','Silt','tomato',6),(103,NULL,'Field 10','Silt','tomato',6),(104,NULL,'Field 35','Silt','tomato',6),(105,NULL,'moumita','Loam','potato',6),(106,NULL,'Naren','Loam','potato',6),(107,NULL,'Field 788','Loam','potato',6),(108,NULL,'Field 788','Loam','potato',6),(109,NULL,'Filed B','Loam','tomato',6),(110,NULL,'Filed 23444','Loam','tomato',6),(111,NULL,'Filed 2555','Loam','tomato',6),(112,NULL,'Filed 2555','Loam','tomato',6),(113,NULL,'Filed 2555','Loam','tomato',6),(114,NULL,'Filed 2555','Loam','tomato',6),(115,NULL,'Filed 2555','Loam','tomato',6),(116,NULL,'Field Sourav','Silt','tomato',6),(117,NULL,'','Loam','potato',6),(118,NULL,'','Loam','potato',6),(119,NULL,'west Ara','Loam','potato',6),(120,NULL,'west Ara','Loam','potato',6),(121,NULL,'JGEC','Clay','tomato',2),(122,NULL,'asa','Loam','potato',2),(123,NULL,'asa','Loam','potato',2),(124,NULL,NULL,NULL,NULL,6),(125,NULL,NULL,NULL,NULL,6),(126,NULL,'Filed 4','Loam','potato',6),(127,NULL,'Filed 4','Loam','potato',6),(128,NULL,NULL,NULL,NULL,2),(129,NULL,NULL,NULL,NULL,2),(130,NULL,NULL,NULL,NULL,2),(131,NULL,NULL,NULL,NULL,2),(132,NULL,'Field A','Loam','potato',2),(133,NULL,'asas','Loam','potato',2);
/*!40000 ALTER TABLE `land` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-10 19:32:36
