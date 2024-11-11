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
-- Table structure for table `attras`
--

DROP TABLE IF EXISTS `attras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attras` (
  `attraindex` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Zone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Tel` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `AttraAdd` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Opentime` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Picture1` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Px` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Py` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Website` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Ticketinfo` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Remarks` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Enable` int(5) DEFAULT NULL,
  UNIQUE KEY `attraimdex` (`attraindex`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attras`
--

LOCK TABLES `attras` WRITE;
/*!40000 ALTER TABLE `attras` DISABLE KEYS */;
INSERT INTO `attras` VALUES (1,'高雄願景館','三民區','高雄願景館的前身是日治時期興建的高雄市舊火車站，外觀是”和洋混合式建築”氣勢雄偉，內部則為西式的玄關及大廳。2002年為了配合鐵路、捷運、高鐵的三鐵共構，這棟老火車站建築物遷移到附近的空地上，並由市府規劃，以\"數位博物館\"的型式，其中歷史迴廊對於鐵道文化及往日風貌有一系列回顧，讓遊客可以重溫老車站的過往風華，而3D虛擬互動區則讓參觀者以虛擬實境的方式飛越高雄的重要景點並同時見證高雄的發展歷史。願景館是認識高雄過去與未來的最佳場所，而願景橋、鐵路文化棧道、風的祝福廣場…等公共藝術區也是遊客們最愛駐足與拍照留念的美麗景點。','886-7-2363357','高雄市三民區建國二路318號','週二至週日10:00-18:00，每週一公休','img/Attra/705.jpg','120.303113','22.638329',NULL,'免費參觀',NULL,1),(2,'高雄市立圖書總館','前鎮區','市立圖書館新總館位於新光路，是一棟結合植物、環保與文化的建築物。這座八層樓高的新總館外方內圓，樓板面積高達37233平方公尺，以樹為建築概念、書為主角，建構出館中有樹、樹中有館開放寬敞的友善空間。在建築及設計方面，市圖新總館有數項突破性的創新:鋼棒懸吊建築、懸吊景觀中庭、挑高7.5米無柱遮蔽式廣場、模矩化空間安排、綠能減碳的大量植栽…是綠色公共建築的新典範，極簡風格的設計與自然的綠意書香，營造出靜謐舒適的閱讀空間。高雄最美的人情味在圖書館也不缺席，由民間募款購書，開館藏書已逾70萬冊，館內還有一棵別具意義的「感恩樹」，感謝市民及大家共同參與，成就高雄文化的永恆印記。市圖總館的一樓為挑空半開放空間、頂樓還設有空中花園眺望灣區風景，在這個歡迎大家共享的閱讀園地，就像舊時庄頭的大榕樹下，朗朗書聲、盈盈笑語，無論白天夜晚都是港都最優質吸引人的文化所在。','886-7-5360238','高雄市前鎮區新光路61號','平日10:00-22:00(21:30停止入館)，假日10:00-17:00(16:30停止入館)，除夕閉館，每週一休館','img/Attra/1954.jpg','120.301814','22.610111','http://www.ksml.edu.tw/mainlibrary/index.aspx','NULL',NULL,1),(3,'旗津天后宮','旗津區','位於高雄市旗津鬧區的旗津天后宮，奉祀海神媽祖已經有三百多年歷史。據文獻記載，西元1673年，福建漁戶徐阿華遇颶風漂流至旗津落戶，隨後招徠六戶同鄉並奉迎湄洲媽祖分靈扺台，為臺灣第一座媽祖廟，也是高雄最古老的廟宇。其後媽祖廟經過數次修葺，現今的天后宮是以1926年重建的廟體為基礎。旗後天后宮的建築屬於華南式廟宇建築，格局為兩殿五門兩護室，廟頂為燕尾脊的造型，以雙龍拱仙翁做為裝飾，遍處是木雕、石刻、彩塑、剪黏等琳瑯滿目，不但具有古拙的鄉土味，且栩栩如生，活潑生動;而廟中重要的彩繪諸如：門神、通樑、壁畫、浮雕以及平面畫等等，都是出自彩繪大師陳玉峰之手，種種精巧的工藝均為師父工匠們的智慧結晶，整棟廟宇如同藝術瑰寶，值得細細觀賞。在傳承三百餘年的香火繚繞中，天后宮還有多項重要文物，例如1673年自唐山奉迎而來的媽祖神像、虎爺將軍石雕、渡海的壓艙石及石雕香爐;1886年的銅鐘，以及記載著當時歷史背景的官方及民間石碑二方等等。天后宮不僅是高雄地方的信仰集會中心，更是先民渡海來台開荒闢土三百多年的歷史軌跡，裊裊香煙中不變的是媽祖對蒼生的守護與民間傳統藝術的維護傳承，值得我們虔心領會、永世流傳。','886-7-5712115','高雄市旗津區廟前路93號','平日05:00-10:00，假日05:00-10:30','img/Attra/2113.jpg','120.268426','22.613404','http://www.chijinmazu.org.tw/','',NULL,1),(4,'真愛碼頭','前金區','真愛碼頭正式名稱為12號碼頭，原是一個散裝貨輪碼頭，但隨著貨櫃輪興起而逐漸沒落。真愛碼頭矗立在愛河出海口，分別對著高雄市區及旗津渡輪碼頭，因此以雙座風帆的特殊造型，藉此象徵高雄市與海港對話，並冠上「真愛」之名，讓您充滿各種浪漫的想像。在此可欣賞高雄摩天大樓林立的現代都市風貌，也可眺望高雄海港體驗大船入港的震撼，白天、夜晚各具不同的風貌。 ','886-7-2262888','高雄市前金區五福路橋旁轉公園路可達','全天候開放','img/Attra/3284.jpg','120.28966','22.61862',NULL,NULL,NULL,1),(5,'壽山情人觀景臺','鼓山區','位於壽山忠烈祠旁，景觀台上有32種愛的宣言文字飾板，象徵愛是不分國界的共通語言，另設置情侶裝置藝術「LOVE傳聲筒」及獼猴造型石雕三座，分別象徵愛情中追求、熱戀、連理不同階段。往山下望去，令人驚艷的山海日景及迷人華燈夜景，盡收眼底，已成為高雄市具有代表性的觀光景點之一。','886-7-7995678','高雄鼓山區忠義路30號(忠烈祠旁)','全天候開放','img/Attra/1426.jpg','120.274001','22.625510',NULL,'',NULL,1),(6,'旗山天后宮','旗山區','西元1700多年，先民為求平安與心靈寄託，從大陸湄洲恭請媽祖聖尊至蕃薯寮(旗山舊稱)。地方人士參拜聖蹟靈驗，廣為相傳，並由許多當地百姓共同出資興建廟宇，於1824年落成，距今近200年歷史。於廟宇內鑲有「奉憲」碑，碑文記述當時聚落消滅流棍事蹟，廟內壁有聚資重修碑兩座，是研究旗山發展史的珍貴史料。終年香火鼎盛的旗山天后宮，是旗山地區僅存的清領時期廟宇，更是旗山人最重要的信仰中心。由於香火鼎盛，媽祖神像臉部早已被香煙薰得黝黑發亮。廟內石雕樸實簡雅，木雕、銅塑則裝飾得華美多采，是遊客來旗山必去的景點之一。','886-7-6612037','高雄市旗山區永福街23巷16號','每日05:00-22:00','img/Attra/2314.jpg','120.482306','22.886665','http://www.5658.com.tw/thg/','',NULL,1);
/*!40000 ALTER TABLE `attras` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-11 17:17:20
