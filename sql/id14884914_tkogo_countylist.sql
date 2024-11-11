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
-- Table structure for table `countylist`
--

DROP TABLE IF EXISTS `countylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countylist` (
  `CountyID` varchar(10) NOT NULL,
  `CountyName` varchar(50) NOT NULL,
  `CountyNameEn` varchar(50) NOT NULL,
  `CountyCode` varchar(50) NOT NULL,
  `County` varchar(50) NOT NULL,
  `CityID` varchar(10) NOT NULL,
  `Version` varchar(50) NOT NULL,
  UNIQUE KEY `CountyCode` (`CountyCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countylist`
--

LOCK TABLES `countylist` WRITE;
/*!40000 ALTER TABLE `countylist` DISABLE KEYS */;
INSERT INTO `countylist` VALUES ('Z','連江縣','Lienchiang','09007','LienchiangCounty','Z','22.02.1'),('W','金門縣','Kinmen','09020','KinmenCounty','W','22.02.1'),('G','宜蘭縣','Yilan','10002','YilanCounty','G','22.02.1'),('J','新竹縣','Hsinchu','10004','HsinchuCounty','J','22.02.1'),('K','苗栗縣','Miaoli','10005','MiaoliCounty','K','22.02.1'),('N','彰化縣','Changhua','10007','ChanghuaCounty','N','22.02.1'),('M','南投縣','Nantou','10008','NantouCounty','M','22.02.1'),('P','雲林縣','Yunlin','10009','YunlinCounty','P','22.02.1'),('Q','嘉義縣','Chiayi','10010','ChiayiCounty','Q','22.02.1'),('T','屏東縣','Pingtung','10013','PingtungCounty','T','22.02.1'),('V','臺東縣','Taitung','10014','TaitungCounty','V','22.02.1'),('U','花蓮縣','Hualien','10015','HualienCounty','U','22.02.1'),('X','澎湖縣','Penghu','10016','PenghuCounty','X','22.02.1'),('C','基隆市','Keelung','10017','Keelung','C','22.02.1'),('O','新竹市','Hsinchu','10018','Hsinchu','O','22.02.1'),('I','嘉義市','Chiayi','10020','Chiayi','I','22.02.1'),('A','臺北市','Taipei','63000','Taipei','A','22.02.1'),('E','高雄市','Kaohsiung','64000','Kaohsiung','E','22.02.1'),('F','新北市','NewTaipei','65000','NewTaipei','F','22.02.1'),('B','臺中市','Taichung','66000','Taichung','B','22.02.1'),('D','臺南市','Tainan','67000','Tainan','D','22.02.1'),('H','桃園市','Taoyuan','68000','Taoyuan','H','22.02.1');
/*!40000 ALTER TABLE `countylist` ENABLE KEYS */;
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
