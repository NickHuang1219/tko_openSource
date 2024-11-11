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
-- Table structure for table `thsrstation`
--

DROP TABLE IF EXISTS `thsrstation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thsrstation` (
  `StationUID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StationID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StationCode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StationNameTW` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StationNameEN` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `StationAddress` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `OperatorID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PositionLon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PositionLat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `GeoHash` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LocationCity` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LocationCityCode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LocationTown` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `LocationTownCode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UpdateTime` varchar(1000) NOT NULL,
  `VersionID` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  UNIQUE KEY `StationUID` (`StationUID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thsrstation`
--

LOCK TABLES `thsrstation` WRITE;
/*!40000 ALTER TABLE `thsrstation` DISABLE KEYS */;
INSERT INTO `thsrstation` VALUES ('THSR-0990','0990','NAK','南港','Nangang','台北市南港區南港路一段313號','THSR','121.60706329346','25.053188323975','wsqqx0z93','臺北市','TPE','南港區','63000090','2017-04-11T11:05:00+08:00','1'),('THSR-1000','1000','TPE','台北','Taipei','台北市北平西路3號','THSR','121.51698303223','25.04767036438','wsqqmpvcq','臺北市','TPE','中正區','63000050','2017-04-11T11:05:00+08:00','1'),('THSR-1010','1010','BAC','板橋','Banqiao','新北市板橋區縣民大道二段7號','THSR','121.46459197998','25.013870239258','wsqq7cxu6','新北市','NWT','板橋區','65000010','2017-04-11T11:05:00+08:00','1'),('THSR-1020','1020','TAY','桃園','Taoyuan','桃園市中壢區高鐵北路一段6號','THSR','121.21472930908','25.012861251831','wsqnq33y7','桃園市','TAO','中壢區','68000020','2017-04-11T11:05:00+08:00','1'),('THSR-1030','1030','HSC','新竹','Hsinchu','新竹縣竹北市高鐵七路6號','THSR','121.04026031494','24.808441162109','wsqj4k4zd','新竹縣','HSQ','竹北市','10004010','2017-04-11T11:05:00+08:00','1'),('THSR-1035','1035','MIL','苗栗','Miaoli','苗栗縣後龍鎮高鐵三路268號','THSR','120.82527160645','24.605447769165','wsmgvrq30','苗栗縣','MIA','後龍鎮','10005060','2017-04-11T11:05:00+08:00','1'),('THSR-1040','1040','TAC','台中','Taichung','台中市烏日區站區二路8號','THSR','120.61596679688','24.112483978271','wsmc0ttc7','臺中市','TXG','烏日區','66000230','2017-04-11T11:05:00+08:00','1'),('THSR-1043','1043','CHA','彰化','Changhua','彰化縣田中鎮站區路二段99號','THSR','120.57460784912','23.874326705933','wsjxzdpwp','彰化縣','CHA','田中鎮','10007120','2017-06-28T00:00:00+08:00','1'),('THSR-1047','1047','YUL','雲林','Yunlin','雲林縣虎尾鎮站前東路301號','THSR','120.41651153564','23.73623085022','wsjxh1h9s','雲林縣','YUN','虎尾鎮','10009030','2017-06-28T00:00:00+08:00','1'),('THSR-1050','1050','CHY','嘉義','Chiayi','嘉義縣太保市高鐵西路168號','THSR','120.32325744629','23.459506988525','wsjt6n8tx','嘉義縣','CYQ','太保市','10010010','2017-06-28T00:00:00+08:00','1'),('THSR-1060','1060','TNN','台南','Tainan','台南市歸仁區歸仁大道100號','THSR','120.28620147705','22.925077438354','wsjd3jmsr','臺南市','TNN','歸仁區','67000280','2017-04-11T11:05:00+08:00','1'),('THSR-1070','1070','ZUY','左營','Zuoying','高雄市左營區高鐵路105號','THSR','120.30748748779','22.687391281128','wsj91dj5x','高雄市','KHH','左營區','64000030','2017-06-28T00:00:00+08:00','1');
/*!40000 ALTER TABLE `thsrstation` ENABLE KEYS */;
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
