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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `area` (
  `AreaIndex` int(200) NOT NULL AUTO_INCREMENT,
  `AreaName` varchar(500) DEFAULT NULL,
  `AreaNum` int(200) DEFAULT NULL,
  `TID` int(255) DEFAULT NULL,
  `total` int(200) DEFAULT NULL,
  `countiesID` varchar(5) NOT NULL,
  UNIQUE KEY `AreaIndex` (`AreaIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES (1,'新興區',800,6400600,5,'07'),(2,'前金區',801,6400700,5,'07'),(3,'苓雅區',802,6400800,8,'07'),(4,'鹽埕區',803,6400100,2,'07'),(5,'鼓山區',804,6400200,5,'07'),(6,'旗津區',805,6401000,1,'07'),(7,'前鎮區',806,6400900,8,'07'),(8,'三民區',807,6400500,9,'07'),(9,'楠梓區',811,6400400,3,'07'),(10,'小港區',812,6401100,3,'07'),(11,'左營區',813,6400300,8,'07'),(12,'仁武區',814,6401700,1,'07'),(13,'大社區',815,6401600,NULL,'07'),(14,'岡山區',820,6401900,2,'07'),(15,'路竹區',821,6402400,NULL,'07'),(16,'阿蓮區',822,6402300,NULL,'07'),(17,'田寮區',823,6402200,NULL,'07'),(18,'燕巢區',824,6402100,NULL,'07'),(19,'橋頭區',825,6402000,NULL,'07'),(20,'梓官區',826,6402900,NULL,'07'),(21,'彌陀區',827,6402800,1,'07'),(22,'永安區',828,6402700,2,'07'),(23,'湖內區',829,6402500,NULL,'07'),(24,'鳳山區',830,6401200,4,'07'),(25,'大寮區',831,6401400,NULL,'07'),(26,'林園區',832,6401300,NULL,'07'),(27,'鳥松區',833,6401800,0,'07'),(28,'大樹區',840,6401500,NULL,'07'),(29,'旗山區',842,6403000,NULL,'07'),(30,'美濃區',843,6403100,NULL,'07'),(31,'六龜區',844,6403200,NULL,'07'),(32,'內門區',845,6403500,NULL,'07'),(33,'杉林區',846,6403400,NULL,'07'),(34,'甲仙區',847,6403300,NULL,'07'),(35,'桃源區',848,6403700,NULL,'07'),(36,'那瑪夏區',849,6403800,NULL,'07'),(37,'茂林區',851,6403600,NULL,'07'),(38,'茄萣區',852,6402600,NULL,'07');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
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
