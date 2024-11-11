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
-- Table structure for table `mrtdata`
--

DROP TABLE IF EXISTS `mrtdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mrtdata` (
  `cityCode` varchar(20) NOT NULL COMMENT '所屬縣市代碼',
  `class` varchar(10) NOT NULL COMMENT '類別lrt、mrt',
  `line` varchar(100) NOT NULL COMMENT 'lrt、mrt路線',
  `sort` double NOT NULL COMMENT '站台排序',
  `StationID` varchar(1000) NOT NULL COMMENT '查詢用ID',
  `StationUID` varchar(1000) NOT NULL COMMENT '車站代碼',
  `StationNameTw` varchar(1000) NOT NULL COMMENT '中文名稱',
  `StationNameEn` varchar(1000) NOT NULL COMMENT '英文名稱',
  `StationAddress` varchar(1000) NOT NULL COMMENT '車站地址',
  `PositionLon` varchar(100) NOT NULL COMMENT '經度',
  `PositionLat` varchar(100) NOT NULL COMMENT '緯度',
  `LocationCityCode` varchar(100) NOT NULL COMMENT '所屬城市代碼',
  `LocationTown` varchar(200) NOT NULL COMMENT '隸屬縣市行政區',
  `op` int(11) NOT NULL COMMENT '開關',
  UNIQUE KEY `StationUID` (`StationUID`),
  KEY `cityCode` (`cityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mrtdata`
--

LOCK TABLES `mrtdata` WRITE;
/*!40000 ALTER TABLE `mrtdata` DISABLE KEYS */;
INSERT INTO `mrtdata` VALUES ('07','lrt','C',1,'C1','KLRT-C1','籬仔內','Lizihnei','','120.324651','22.604625','KHH','前鎮區',1),('07','lrt','C',10,'C10','KLRT-C10','光榮碼頭','Glory Pier','','120.293234','22.616805','KHH','苓雅區',1),('07','lrt','C',11,'C11','KLRT-C11','真愛碼頭','Love Pier','','120.289466','22.619315','KHH','鹽埕區',1),('07','lrt','C',12,'C12','KLRT-C12','駁二大義','Dayi Pier-2','','120.284204','22.618562','KHH','鹽埕區',1),('07','lrt','C',13,'C13','KLRT-C13','駁二蓬萊','Penglai Pier-2','','120.279923','22.6205','KHH','鹽埕區',1),('07','lrt','C',14,'C14','KLRT-C14','哈瑪星','Hamasen','','120.275849','22.621617','KHH','鼓山區',1),('07','lrt','C',15,'C15','KLRT-C15','壽山公園站','Shoushan Park','五福四路與新樂街段','120.278601','22.626541','KHH','鼓山區',1),('07','lrt','C',16,'C16','KLRT-C16','文武聖殿站','Wenwu Temple','大公路與鼓山一路口','120.2807','22.62959','KHH','鼓山區',1),('07','lrt','C',17,'C17','KLRT-C17','鼓山區公所站','Gushan District Office','興隆路與河川街103巷','120.282567','22.635988','KHH','鼓山區',1),('07','lrt','C',18,'C18','KLRT-C18','鼓山','Gushan','高雄市鼓山區鐵路街及鐵路街18巷','120.281067','22.642037','KHH','鼓山區',1),('07','lrt','C',19,'C19','KLRT-C19','馬卡道','Makadao','高雄市鼓山區馬卡道路與華安街口','120.281415','22.647089','KHH','鼓山區',1),('07','lrt','C',2,'C2','KLRT-C2','凱旋瑞田','Kaisyuan Rueitian','','120.319799','22.599533','KHH','前鎮區',1),('07','lrt','C',20,'C20','KLRT-C20','臺鐵美術館','TRA Museum of Fine Arts','高雄市鼓山區馬卡道路與青海路口','120.281669','22.652074','KHH','鼓山區',1),('07','lrt','C',21,'C21','KLRT-C21','美術館','Kaohsiung Museum of Fine Arts','高雄市鼓山區美術館路與美術東二路口','120.287437','22.655026','KHH','鼓山區',1),('07','lrt','C',20.5,'C21A','KLRT-C21A','內惟藝術中心','Neiwei Arts Center','高雄市鼓山區馬卡道路與美術館路口','120.282868','22.65497','KHH','鼓山區',1),('07','lrt','C',22,'C22','KLRT-C22','聯合醫院','Kaohsiung Municipal United Hospital','高雄市鼓山區美術館路與中華一路','120.290918','22.654827','KHH','鼓山區',1),('07','lrt','C',23,'C23','KLRT-C23','龍華國小','Longhua Elementary School','高雄市鼓山區大順一路與龍德路口','120.295042','22.654493','KHH','鼓山區',1),('07','lrt','C',24,'C24','KLRT-C24','愛河之心','Heart of Love River','高雄市鼓山區大順一路與博愛一路口','120.30282','22.65604','KHH','鼓山區',1),('07','mrt','C',25,'C25','KLRT-C25','新上國小','Sinshang Elementary School','高雄市左營區大順一路與自由一路口','120.3083','22.6567','KHH','左營區',1),('07','mrt','C',26,'C26','KLRT-C26','大順民族','Dashun Minzu','高雄市三民區大順一路與民族一路口','120.3149','22.6556','KHH','三民區',1),('07','mrt','C',27,'C27','KLRT-C27','灣仔內(大順鼎山)','Wanzihnei(Dashun Dingshan)','高雄市三民區大順二路與鼎山街口 ','120.3185','22.6538','KHH','三民區',1),('07','mrt','C',28,'C28','KLRT-C28','高雄高工','Kaohsiung Industrial High School','高雄市三民區大順二路與建工路口  ','120.3238','22.6501','KHH','三民區',1),('07','mrt','C',29,'C29','KLRT-C29','樹德家商','Shu-Te Home-Economics & Commercial High School','高雄市三民區大順二路與建興路口','120.3262','22.6442','KHH','三民區',1),('07','lrt','C',3,'C3','KLRT-C3','前鎮之星','Cianjhen Star','','120.315368','22.595503','KHH','前鎮區',1),('07','mrt','C',30,'C30','KLRT-C30','科工館','Science and Technology Museum','高雄市三民區大順三路與鐵道園區（大順三路309巷）','120.3274','22.6375','KHH','三民區',1),('07','mrt','C',31,'C31','KLRT-C31','聖功醫院','St.Joseph Hospital','高雄市苓雅區大順三路與建國一路口','120.325819','22.633278','KHH','苓雅區',1),('07','lrt','C',32,'C32','KLRT-C32','凱旋公園站','Kaisyuan Park','中正一路與河南路口（南凱旋公園內）','120.322785','22.629433','KHH','苓雅區',1),('07','lrt','C',33,'C33','KLRT-C33','衛生局站','Department of Health','凱旋二路與凱旋二路81巷','120.3237','22.6252','KHH','苓雅區',1),('07','lrt','C',34,'C34','KLRT-C34','五權國小站','Wucyuan Elementary School','凱旋二路與三多二路口','120.3252','22.62121','KHH','苓雅區',1),('07','lrt','C',35,'C35','KLRT-C35','凱旋武昌站','Kaisyuan Wuchang','凱旋三路與武昌路口','120.3269','22.61693','KHH','苓雅區',1),('07','lrt','C',36,'C36','KLRT-C36','凱旋二聖站','Kaisyuan Ersheng','凱旋三路與二聖路口','120.3272','22.61253','KHH','鳳山區',1),('07','lrt','C',37,'C37','KLRT-C37','輕軌機廠站','LRT Depot','瑞西街與瑞北路口（輕軌機廠內）','120.3261','22.6085','KHH','前鎮區',1),('07','lrt','C',4,'C4','KLRT-C4','凱旋中華','Kaisyuan Jhonghua','','120.310517','22.593656','KHH','前鎮區',1),('07','lrt','C',5,'C5','KLRT-C5','夢時代','Dream Mall','','120.305004','22.594886','KHH','前鎮區',1),('07','lrt','C',6,'C6','KLRT-C6','經貿園區','Commerce and Trade Park','','120.30266','22.600961','KHH','前鎮區',1),('07','lrt','C',7,'C7','KLRT-C7','軟體園區','Software Technology Park','','120.300832','22.605684','KHH','前鎮區',1),('07','lrt','C',8,'C8','KLRT-C8','高雄展覽館','Kaohsiung Exhibition Center','','120.298022','22.610133','KHH','苓雅區',1),('07','lrt','C',9,'C9','KLRT-C9','旅運中心','Cruise Terminal','','120.293424','22.611587','KHH','苓雅區',1),('07','mrt','O',1,'O1','KRTC-O1','哈瑪星','Hamasen','高雄市鼓山區臨海二路17-1號地下一層','120.274508','22.621492','KHH','鼓山區',1),('07','mrt','O',10,'O10','KRTC-O10','衛武營','Weiwuying','高雄市苓雅區中正一路2號地下一層','120.341045','22.625055','KHH','苓雅區',1),('07','mrt','O',11,'O11','KRTC-O11','鳳山西站','Fongshan West','高雄市鳳山區自由路281號地下層','120.348118','22.625273','KHH','鳳山區',1),('07','mrt','O',12,'O12','KRTC-O12','鳳山','Fongshan','高雄市鳳山區光遠路446號地下層','120.355166','22.625953','KHH','鳳山區',1),('07','mrt','O',13,'O13','KRTC-O13','大東','Dadong','高雄市鳳山區光遠路226號地下一層','120.363497','22.625178','KHH','鳳山區',1),('07','mrt','O',14,'O14','KRTC-O14','鳳山國中','Fongshan Junior High School','高雄市鳳山區中山東路225號地下一層','120.372657','22.624862','KHH','鳳山區',1),('07','mrt','O',2,'O2','KRTC-O2','鹽埕埔','Yanchengpu','高雄市鹽埕區大勇路96號地下一層','120.283975','22.623795','KHH','鹽埕區',1),('07','mrt','O',4,'O4','KRTC-O4','前金','Cianjin','高雄市前金區中正四路192-1號地下一層','120.294766','22.628933','KHH','前金區',1),('07','mrt','O',5,'O5','KRTC-O5','美麗島','Formosa Boulevard','高雄市新興區中山一路115號地下一樓','120.303254','22.631278','KHH','新興區',1),('07','mrt','O',6,'O6','KRTC-O6','信義國小','Sinyi Elementary School','高雄市新興區中正三路32-1號地下一樓','120.311391','22.630675','KHH','新興區',1),('07','mrt','O',7,'O7','KRTC-O7','文化中心','Cultural Center','高雄市苓雅區中正二路45號地下一層','120.317632','22.630224','KHH','苓雅區',1),('07','mrt','O',8,'O8','KRTC-O8','五塊厝','Wukuaicuo','高雄市苓雅區中正一路286號地下一層','120.327731','22.629413','KHH','苓雅區',1),('07','mrt','O',9,'O9','KRTC-O9','苓雅運動園區','Lingya Sports Park','高雄市苓雅區中正一路99號地下一層','120.334651','22.6272','KHH','苓雅區',1),('07','mrt','OT1',1,'OT1','KRTC-OT1','大寮','Daliao','高雄市大寮區捷西路300號','120.390528','22.622122','KHH','大寮區',1),('07','mrt','R',10,'R10','KRTC-R10','美麗島','Formosa Boulevard','高雄市新興區中山一路115號地下一樓','120.301994','22.631393','KHH','新興區',1),('07','mrt','R',11,'R11','KRTC-R11','高雄車站','Kaohsiung Main Station','高雄市三民區建國二路320號地下一層','120.302703','22.639694','KHH','三民區',1),('07','mrt','R',12,'R12','KRTC-R12','後驛','Houyi','高雄市三民區博愛一路220號地下一層','120.303413','22.648495','KHH','三民區',1),('07','mrt','R',13,'R13','KRTC-R13','凹子底','Aozihdi','高雄市鼓山區博愛二路21號地下一層','120.303239','22.657268','KHH','左營區',1),('07','mrt','R',14,'R14','KRTC-R14','巨蛋','Kaohsiung Arena','高雄市左營區博愛二路485號地下一層','120.30336','22.666158','KHH','左營區',1),('07','mrt','R',15,'R15','KRTC-R15','生態園區','Ecological District','高雄市左營區博愛三路435號地下一層','120.306619','22.676686','KHH','左營區',1),('07','mrt','R',16,'R16','KRTC-R16','左營','Zuoying','高雄市左營區高鐵路107號地下一層','120.308887','22.688376','KHH','左營區',1),('07','mrt','R',17,'R17','KRTC-R17','世運','World Game','高雄市楠梓區左楠路1號','120.302531','22.701841','KHH','楠梓區',1),('07','mrt','R',18,'R18','KRTC-R18','油廠國小','Oil Refinery Elementary School','高雄市楠梓區左楠路6號','120.302323','22.708872','KHH','楠梓區',1),('07','mrt','R',19,'R19','KRTC-R19','楠梓科技園區','Nanzih Technology Industrial Park','高雄市楠梓區加昌路598號','120.307242','22.718651','KHH','楠梓區',1),('07','mrt','R',20,'R20','KRTC-R20','後勁','Houjing','高雄市楠梓區加昌路178號','120.31637','22.722324','KHH','楠梓區',1),('07','mrt','R',21,'R21','KRTC-R21','都會公園','Metropolitan Park','高雄市楠梓區高楠公路1835號','120.321014','22.729529','KHH','楠梓區',1),('07','mrt','R',22,'R22','KRTC-R22','青埔','Cingpu','高雄市橋頭區經武路20號','120.317795','22.744345','KHH','橋頭區',1),('07','mrt','R',22.5,'R22A','KRTC-R22A','橋頭糖廠','Ciaotou Sugar Refinery','高雄市橋頭區興糖路19號','120.314588','22.753581','KHH','橋頭區',1),('07','mrt','R',23,'R23','KRTC-R23','橋頭火車站','Ciaotou Station','高雄市橋頭區站前街12之1號','120.310832','22.760741','KHH','橋頭區',1),('07','mrt','R',24,'R24','KRTC-R24','岡山高醫','Kaohsiung Medical University Gangshan Hospital','高雄市岡山區大遼里9鄰中山南路2號','120.30188','22.780642','KHH','岡山區',1),('07','mrt','R',3,'R3','KRTC-R3','小港','Siaogang','高雄市小港區沿海一路280號地下一樓','120.353802','22.56459','KHH','小港區',1),('07','mrt','R',4,'R4','KRTC-R4','高雄國際機場','Kaohsiung International Airport','高雄市小港區中山四路2之2號地下一樓','120.341772','22.570166','KHH','小港區',1),('07','mrt','R',4.5,'R4A','KRTC-R4A','草衙','Caoya','高雄市前鎮區翠亨南路555號地下一樓','120.328569','22.580354','KHH','前鎮區',1),('07','mrt','R',5,'R5','KRTC-R5','前鎮高中','Cianjhen Senior High School','高雄市前鎮區翠亨北路225號地下一樓','120.321686','22.588482','KHH','前鎮區',1),('07','mrt','R',6,'R6','KRTC-R6','凱旋','Kaisyuan','高雄市前鎮區中山三路1號地下一樓','120.315119','22.596764','KHH','前鎮區',1),('07','mrt','R',7,'R7','KRTC-R7','獅甲','Shihjia','高雄市前鎮區中山三路150號地下一層','120.30815','22.606028','KHH','前鎮區',1),('07','mrt','R',8,'R8','KRTC-R8','三多商圈','Sanduo Shopping District','高雄市前鎮區中山二路268號地下一層','120.304588','22.61398','KHH','苓雅區',1),('07','mrt','R',9,'R9','KRTC-R9','中央公園','Central Park','高雄市前金區中山一路11號地下一層','120.301212','22.624839','KHH','新興區',1),('07','mrt','RK',1,'RK1','KRTC-RK1','岡山車站','Gangshan Station','高雄市岡山區中山北路1號','120.29923','22.79245','KHH','岡山區',1);
/*!40000 ALTER TABLE `mrtdata` ENABLE KEYS */;
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
