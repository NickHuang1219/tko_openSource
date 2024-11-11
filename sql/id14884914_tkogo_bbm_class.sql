-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: id14884914_tkogo
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `bbm_class`
--

DROP TABLE IF EXISTS `bbm_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bbm_class` (
  `key_index` varchar(20) NOT NULL,
  `cityCode` varchar(20) NOT NULL,
  `class` varchar(30) NOT NULL,
  `appstorage` varchar(50) NOT NULL,
  `linename` varchar(200) NOT NULL,
  `selename` varchar(50) DEFAULT NULL,
  `selestr` varchar(200) DEFAULT NULL,
  `webRoute` varchar(100) NOT NULL,
  `adesc` int(11) NOT NULL,
  `op` int(11) NOT NULL,
  UNIQUE KEY `key_index` (`key_index`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bbm_class`
--

LOCK TABLES `bbm_class` WRITE;
/*!40000 ALTER TABLE `bbm_class` DISABLE KEYS */;
INSERT INTO `bbm_class` VALUES ('07bike_AdPol','07','bike','bike_AdPol','行政警消','AdPol','','/Bike/AdPol',8,1),('07bike_Attra','07','bike','bike_Attra','景點周邊','Attra','','/Bike/Attra',3,1),('07bike_Commu','07','bike','bike_Commu','社區周邊','Commu','','/Bike/Commu',5,1),('07bike_E','07','bike','bike_E','其他地方','E','','/Bike/E',9,1),('07bike_MRT','07','bike','bike_MRT','輕軌捷運','MRT','','/Bike/MRT',1,1),('07bike_park','07','bike','bike_park','路街巷口','park','','/Bike/park',7,1),('07bike_RSI','07','bike','bike_RSI','公園周邊','RSI','','/Bike/RSI',6,1),('07bike_S','07','bike','bike_S','學校周邊','S','','/Bike/S',4,1),('07bike_stas','07','bike','bike_stas','車站周邊','stas','','/Bike/stas',2,1),('07bus_e','07','bus','bus_e','其他公車','e',NULL,'/Bus/e',9,1),('07bus_f','07','bus','bus_f','快線公車','f',NULL,'/Bus/f',7,1),('07bus_g','07','bus','bus_g','一般公車','g',NULL,'/Bus/g',1,1),('07bus_gre','07','bus','bus_gre','綠線公車','gre',NULL,'/Bus/gre',5,1),('07bus_h','07','bus','bus_h','公路客運','h',NULL,'/Bus/h',8,1),('07bus_m','07','bus','bus_m','幹線公車','m','幹線','/Bus/m',6,1),('07bus_o','07','bus','bus_o','橘線公車','o',NULL,'/Bus/o',3,1),('07bus_r','07','bus','bus_r','紅線公車','r',NULL,'/Bus/r',2,1),('07bus_y','07','bus','bus_y','黃線公車','y',NULL,'/Bus/y',4,1),('07mrt_c','07','mrt','mrt_c','環狀輕軌','C','','/Mrt/c',3,1),('07mrt_o','07','mrt','mrt_o','橘線捷運','O','','/Mrt/o',2,1),('07mrt_r','07','mrt','mrt_r','紅線捷運','R','','/Mrt/r',1,1);
/*!40000 ALTER TABLE `bbm_class` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-11 17:17:21
