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
-- Table structure for table `sensors`
--

DROP TABLE IF EXISTS `sensors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sensors` (
  `Sensor_id` int NOT NULL AUTO_INCREMENT,
  `Sensor_typeid` int DEFAULT NULL,
  `Land_id` int DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Sensor_id`),
  KEY `Sensor_typeid` (`Sensor_typeid`),
  KEY `Land_id` (`Land_id`),
  CONSTRAINT `sensors_ibfk_1` FOREIGN KEY (`Sensor_typeid`) REFERENCES `sensortype` (`Sensortype_id`),
  CONSTRAINT `sensors_ibfk_2` FOREIGN KEY (`Land_id`) REFERENCES `land` (`Land_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sensors`
--

LOCK TABLES `sensors` WRITE;
/*!40000 ALTER TABLE `sensors` DISABLE KEYS */;
INSERT INTO `sensors` VALUES (1,1,1,'Field A'),(2,2,2,'Field B'),(3,3,3,'Field C'),(4,4,4,'Field D'),(5,1,3,'Field B'),(6,1,1,'Field A'),(7,1,98,'Field F'),(8,2,99,'Field 7'),(9,3,100,'Field 8'),(10,1,101,'Field 23'),(11,1,106,'12,34'),(12,2,109,'Filed B'),(13,1,110,'Filed 23444'),(14,1,111,'(12.1,34.6)'),(15,1,111,'(12.1,34.6)'),(16,1,111,'(12.1,34.6)'),(17,1,111,'(12.1,34.6)'),(18,1,111,'(12.1,34.6)'),(19,1,119,'23,46'),(20,2,121,'(77,44)'),(21,3,121,'(76,45)'),(22,1,122,'23'),(23,1,126,'23,46'),(24,2,1,'23'),(25,2,133,'23,46');
/*!40000 ALTER TABLE `sensors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-10 19:32:37
