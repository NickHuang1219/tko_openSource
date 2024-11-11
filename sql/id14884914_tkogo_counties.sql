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
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `counties` (
  `name` varchar(10) NOT NULL,
  `en_name` varchar(50) NOT NULL,
  `id` varchar(5) NOT NULL,
  `TRAop` int(11) NOT NULL,
  `THSRop` int(5) NOT NULL,
  `AREAop` int(5) NOT NULL,
  `BUSop` int(11) NOT NULL,
  `BIKEop` int(11) NOT NULL,
  `MRTop` int(11) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counties`
--

LOCK TABLES `counties` WRITE;
/*!40000 ALTER TABLE `counties` DISABLE KEYS */;
INSERT INTO `counties` VALUES ('南投縣','NantouCounty','049',1,0,1,0,0,0),('嘉義市','Chiayi','051',1,0,1,0,0,0),('嘉義縣','ChiayiCounty','052',1,0,1,0,0,0),('基隆市','Keelung','01',1,0,1,0,0,0),('宜蘭縣','YilanCounty','033',1,0,1,0,0,0),('屏東縣','PingtungCounty','08',1,0,1,0,0,0),('彰化縣','ChanghuaCounty','041',1,0,1,0,0,0),('新北市','NewTaipei','021',1,0,1,0,0,0),('新竹市','Hsinchu','031',1,0,1,0,0,0),('新竹縣','HsinchuCounty','032',1,0,1,0,0,0),('桃園市','Taoyuan','03',1,0,1,0,0,0),('澎湖縣','PenghuCounty','061',0,0,1,0,0,0),('臺中市','Taichung','04',1,0,1,0,0,0),('臺北市','Taipei','02',1,0,1,0,0,0),('臺南市','Tainan','06',1,0,1,0,0,0),('臺東縣','TaitungCounty','089',1,0,1,0,0,0),('花蓮縣','HualienCounty','034',1,0,1,0,0,0),('苗栗縣','MiaoliCounty','037',1,0,1,0,0,0),('連江縣','LienchiangCounty','0836',0,0,1,0,0,0),('金門縣','KinmenCounty','082',0,0,1,0,0,0),('雲林縣','YunlinCounty','05',1,0,1,0,0,0),('高雄市','Kaohsiung','07',1,1,1,1,1,1);
/*!40000 ALTER TABLE `counties` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-11 17:17:19
