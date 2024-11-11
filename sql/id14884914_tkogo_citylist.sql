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
-- Table structure for table `citylist`
--

DROP TABLE IF EXISTS `citylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citylist` (
  `cityID` varchar(10) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `CityNameEn` varchar(50) NOT NULL,
  `CityCode` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `CountyID` varchar(10) NOT NULL,
  `Version` varchar(10) NOT NULL,
  UNIQUE KEY `CityCode` (`CityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citylist`
--

LOCK TABLES `citylist` WRITE;
/*!40000 ALTER TABLE `citylist` DISABLE KEYS */;
INSERT INTO `citylist` VALUES ('N','彰化縣','Changhua','CHA','ChanghuaCounty','N','22.02.1'),('I','嘉義市','Chiayi','CYI','Chiayi','I','22.02.1'),('Q','嘉義縣','Chiayi','CYQ','ChiayiCounty','Q','22.02.1'),('J','新竹縣','Hsinchu','HSQ','HsinchuCounty','J','22.02.1'),('O','新竹市','Hsinchu','HSZ','Hsinchu','O','22.02.1'),('U','花蓮縣','Hualien','HUA','HualienCounty','U','22.02.1'),('G','宜蘭縣','Yilan','ILA','YilanCounty','G','22.02.1'),('C','基隆市','Keelung','KEE','Keelung','C','22.02.1'),('E','高雄市','Kaohsiung','KHH','Kaohsiung','E','22.02.1'),('W','金門縣','Kinmen','KIN','KinmenCounty','W','22.02.1'),('Z','連江縣','Lienchiang','LIE','LienchiangCounty','Z','22.02.1'),('K','苗栗縣','Miaoli','MIA','MiaoliCounty','K','22.02.1'),('M','南投縣','Nantou','NAN','NantouCounty','M','22.02.1'),('F','新北市','NewTaipei','NWT','NewTaipei','F','22.02.1'),('X','澎湖縣','Penghu','PEN','PenghuCounty','X','22.02.1'),('T','屏東縣','Pingtung','PIF','PingtungCounty','T','22.02.1'),('H','桃園市','Taoyuan','TAO','Taoyuan','H','22.02.1'),('D','臺南市','Tainan','TNN','Tainan','D','22.02.1'),('A','臺北市','Taipei','TPE','Taipei','A','22.02.1'),('V','臺東縣','Taitung','TTT','TaitungCounty','V','22.02.1'),('B','臺中市','Taichung','TXG','Taichung','B','22.02.1'),('P','雲林縣','Yunlin','YUN','YunlinCounty','P','22.02.1');
/*!40000 ALTER TABLE `citylist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-11 17:17:18
