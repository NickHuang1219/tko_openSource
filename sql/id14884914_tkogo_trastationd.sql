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
-- Table structure for table `trastationd`
--

DROP TABLE IF EXISTS `trastationd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trastationd` (
  `CountiesID` varchar(5) NOT NULL,
  `StationID` varchar(100) NOT NULL,
  `StationUID` varchar(100) NOT NULL,
  `StationNameTW` varchar(100) NOT NULL,
  `StationNameEN` varchar(100) NOT NULL,
  `PositionLat` varchar(100) NOT NULL,
  `PositionLon` varchar(100) NOT NULL,
  `StationClass` varchar(5) NOT NULL,
  `StationAddress` varchar(1000) NOT NULL,
  `op` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trastationd`
--

LOCK TABLES `trastationd` WRITE;
/*!40000 ALTER TABLE `trastationd` DISABLE KEYS */;
INSERT INTO `trastationd` VALUES ('01','0900','TRA-0900','基隆','','25.13401','121.74013','1','104基隆市中山區民治里1鄰中山一路16之 1號','1'),('01','0910','TRA-0910','三坑','','25.12305','121.74202','4','20045基隆市仁愛區德厚里龍安街 206 號','1'),('01','0920','TRA-0920','八堵','','25.10843','121.72898','2','20541基隆市暖暖區八南里八堵路 142 號','1'),('01','0930','TRA-0930','七堵','','25.09294','121.71415','1','20646基隆市七堵區長興里東新街 2 號','1'),('01','0940','TRA-0940','百福','','25.07803','121.69373','4','20651基隆市七堵區堵南里明德三路 1 之 1 號','1'),('021','0950','TRA-0950','五堵','','25.07784','121.66764','4','22178新北市汐止區長安里長安路 17 號','1'),('021','0960','TRA-0960','汐止','','25.06894','121.66244','2','22166新北市汐止區信望里信義路 1 號','1'),('021','0970','TRA-0970','汐科','','25.06241','121.64669','4','22184新北市汐止區大同里大同路二段 182 號','1'),('02','0980','TRA-0980','南港','','25.05348','121.60706','1','115臺北市南港區南港里南港路一段 313 號','1'),('02','0990','TRA-0990','松山','','25.04936','121.57807','1','11088臺北市信義區永吉里松山路 11 號B1','1'),('02','1000','TRA-1000','臺北','','25.04771','121.51784','0','100臺北市中正區黎明里北平西路 3 號','1'),('02','1001','TRA-1001','臺北-環島','','25.04811','121.51793','4','','1'),('02','1010','TRA-1010','萬華','','25.03348','121.49984','1','108220臺北市萬華區富福里康定路 382 號','1'),('021','1020','TRA-1020','板橋','','25.01469','121.46352','1','220新北市板橋區新民里站前路','1'),('021','1030','TRA-1030','浮洲','','25.00419','121.44477','4','22058新北市板橋區僑中里僑中二街 156 號','1'),('021','1040','TRA-1040','樹林','','24.99121','121.42481','1','23845新北市樹林區樹北里鎮前街 112 號','1'),('021','1050','TRA-1050','南樹林','','24.98034','121.40891','4','23846新北市樹林區東山里中山路二段 230 號','1'),('021','1060','TRA-1060','山佳','','24.97233','121.39273','3','23852新北市樹林區中山里山佳街 28 號','1'),('021','1070','TRA-1070','鶯歌','','24.95432','121.35535','2','23942新北市鶯歌區東鶯里文化路 68 號','1'),('03','1080','TRA-1080','桃園','','24.98941','121.31399','1','33041桃園市桃園區武陵里中正路 1 號','1'),('03','1090','TRA-1090','內壢','','24.97287','121.25814','3','32072桃園市中壢區中原里中華路一段 267 號','1'),('03','1100','TRA-1100','中壢','','24.95382','121.22571','1','32041桃園市中壢區石頭里中和路 139 號','1'),('03','1110','TRA-1110','埔心','','24.91945','121.18366','3','32653桃園市楊梅區埔心里永美路 208 號','1'),('03','1120','TRA-1120','楊梅','','24.91391','121.14634','3','32643桃園市楊梅區楊梅里大成路 256 號','1'),('03','1130','TRA-1130','富岡','','24.93462','121.08313','3','32649桃園市楊梅區富岡里成功路 37 號','1'),('03','1140','TRA-1140','新富','','24.93107','121.06759','5','32649桃園市楊梅區富豐里富全街 1 號','1'),('032','1150','TRA-1150','北湖','','24.92191','121.05586','4','30371新竹縣湖口鄉東興村北湖路 1 號','1'),('032','1160','TRA-1160','湖口','','24.90292','121.04412','3','30342新竹縣湖口鄉仁勢村中山路二段 121 號','1'),('032','1170','TRA-1170','新豐','','24.86961','120.99654','3','30442新竹縣新豐鄉山崎村新興路 202 號','1'),('032','1180','TRA-1180','竹北','','24.83892','121.00936','3','30265新竹縣竹義里和平街 59 號','1'),('031','1190','TRA-1190','北新竹','','24.80876','120.98385','4','30060新竹市 東區東園里中華路一段 291 之 2 號','1'),('031','1191','TRA-1191','千甲','','24.80669','121.00301','4','30059新竹市 東區水源里千甲路 142 號','1'),('031','1192','TRA-1192','新莊','','24.78819','121.02182','4','30073新竹市 東區新莊里關東路 310 號','1'),('032','1193','TRA-1193','竹中','','24.78125','121.03117','4','31061新竹縣竹東鎮頭重里竹中路 145 號','1'),('032','1194','TRA-1194','六家','','24.80751','121.03921','4','30273新竹縣竹北市隘口里復興三路二段 229 號','1'),('032','1201','TRA-1201','上員','','24.77797','121.05554','5','310新竹縣竹東鎮上員里光明路 (無站房)','1'),('032','1202','TRA-1202','榮華','','24.74851','121.08296','5','310新竹縣竹東鎮仁愛里北興路 (無站房)','1'),('032','1203','TRA-1203','竹東','','24.73811','121.09465','2','31047新竹縣竹東鎮雞林里東林路 196 號','1'),('032','1204','TRA-1204','橫山','','24.72051','121.11657','5','31241新竹縣橫山鄉橫山村橫山路 97 號 (無站房)','1'),('032','1205','TRA-1205','九讚頭','','24.72068','121.13621','4','31242新竹縣橫山鄉大肚村中豐路二段 286 巷 29 號','1'),('032','1206','TRA-1206','合興','','24.71649','121.15434','5','31243新竹縣橫山鄉力行村中山街一段 17 號','1'),('032','1207','TRA-1207','富貴','','24.71553','121.16729','5','312新竹縣橫山鄉豐田村中山街一段 (無站房)','1'),('032','1208','TRA-1208','內灣','','24.70526','121.18247','4','31243新竹縣橫山鄉內灣村中正路 6 號','1'),('031','1210','TRA-1210','新竹','','24.80169','120.97156','1','30060新竹市 東區榮光里中華路二段 445 號','1'),('031','1220','TRA-1220','三姓橋','','24.78723','120.92838','4','30093新竹市 香山區香山里元培街 32 巷 30 號','1'),('031','1230','TRA-1230','香山','','24.76321','120.91391','4','30094新竹市 香山區朝山里中華路五段 347 巷 2 弄 27 號','1'),('037','1240','TRA-1240','崎頂','','24.72281','120.87213','5','35054苗栗縣竹南鎮崎頂里北戶 55 號','1'),('037','1250','TRA-1250','竹南','','24.68663','120.88041','1','35041苗栗縣竹南鎮竹南里中山路 166 號','1'),('037','2110','TRA-2110','談文','','24.65641','120.85825','5','36143苗栗縣造橋鄉談文村仁愛路 29 號','1'),('037','2120','TRA-2120','大山','','24.64565','120.80376','4','35658苗栗縣後龍鎮大山里明山路 180 號','1'),('037','2130','TRA-2130','後龍','','24.61621','120.78731','3','35641苗栗縣後龍鎮北龍里車站街 127-2 號','1'),('037','2140','TRA-2140','龍港','','24.61169','120.75812','5','35668苗栗縣後龍鎮龍京里公司寮 85 號','1'),('037','2150','TRA-2150','白沙屯','','24.56481','120.70824','3','35742苗栗縣通霄鎮白西里白西 131 號','1'),('037','2160','TRA-2160','新埔','','24.54018','120.69518','4','35742苗栗縣通霄鎮新埔里新埔 57 號','1'),('037','2170','TRA-2170','通霄','','24.49141','120.67843','3','35741苗栗縣通霄鎮通西里中正路 109 號','1'),('037','2180','TRA-2180','苑裡','','24.44344','120.65146','3','35841苗栗縣苑裡鎮苑北里中山路 165 號','1'),('04','2190','TRA-2190','日南','','24.37805','120.65412','4','43771臺中市大甲區孟春里中山路二段 140 巷 8 號','1'),('04','2200','TRA-2200','大甲','','24.34448','120.62702','2','43744臺中市大甲區大甲里中山路一段 828 號','1'),('04','2210','TRA-2210','臺中港','','24.30441','120.60231','2','43642臺中市清水區頂湳里甲南路 2 號','1'),('04','2220','TRA-2220','清水','','24.26364','120.56918','3','43653臺中市南社里中正街 115 號','1'),('04','2230','TRA-2230','沙鹿','','24.23702','120.55752','2','43353臺中市沙鹿區沙鹿里中正街 94 號','1'),('04','2240','TRA-2240','龍井','','24.19745','120.54336','3','43450臺中市龍井區龍泉里龍新路 1 號','1'),('04','2250','TRA-2250','大肚','','24.15401','120.54255','3','43242臺中市大肚區頂街里平和街 121 號','1'),('04','2260','TRA-2260','追分','','24.12061','120.57014','3','43245臺中市大肚區王田里追分街 13 號','1'),('037','3140','TRA-3140','造橋','','24.64206','120.86719','5','36144苗栗縣造橋鄉造橋村平仁路 54 號','1'),('037','3150','TRA-3150','豐富','','24.60131','120.82357','4','35648苗栗縣後龍鎮校椅里高鐵一路 66 號','1'),('037','3160','TRA-3160','苗栗','','24.57002','120.82264','1','36043苗栗縣上苗里為公路 1 號','1'),('037','3170','TRA-3170','南勢','','24.52234','120.79157','5','36063苗栗縣苗栗市新英里南勢 39 號','1'),('037','3180','TRA-3180','銅鑼','','24.48648','120.78616','3','36641苗栗縣銅鑼鄉銅鑼村大同路 13 號','1'),('037','3190','TRA-3190','三義','','24.42066','120.77393','3','36741苗栗縣三義鄉雙湖村雙湖 90 號','1'),('04','3210','TRA-3210','泰安','','24.33146','120.74181','4','42156臺中市后里區泰安里安眉路 37 之 12 號','1'),('04','3220','TRA-3220','后里','','24.30933','120.73288','3','42142臺中市后里區義里里甲后路一段 1 號','1'),('04','3230','TRA-3230','豐原','','24.25413','120.72291','1','42056臺中市豐原區豐原里中正路 1 號','1'),('04','3240','TRA-3240','栗林','','24.23481','120.71069','4','427臺中市潭子區潭豐路二段747號','1'),('04','3250','TRA-3250','潭子','','24.21283','120.70557','3','42751臺中市潭子區中山路二段352-1號','1'),('04','3260','TRA-3260','頭家厝','','24.19572','120.70398','4','427臺中市潭子區頭張東路43巷8號','1'),('04','3270','TRA-3270','松竹','','24.17983','120.70197','4','406臺中市北屯區舊社里松竹路一段1473巷100號','1'),('04','3280','TRA-3280','太原','','24.16413','120.69981','4','40645臺中市北屯區北興里東光路 665 號','1'),('04','3290','TRA-3290','精武','','24.14917','120.69773','4','40151臺中市東區東南里東光路 161號','1'),('04','3300','TRA-3300','臺中','','24.13661','120.68527','0','40043臺中市中區綠川里臺灣大道一段 1 號','1'),('04','3310','TRA-3310','五權','','24.12877','120.66644','4','402臺中市南區建國南路二段201號','1'),('04','3320','TRA-3320','大慶','','24.11891','120.64791','4','40242臺中市南區樹德里7鄰大慶街2段130號','1'),('04','3330','TRA-3330','烏日','','24.10867','120.62244','4','41442臺中市烏日區烏日里三民街 258 號','1'),('04','3340','TRA-3340','新烏日','','24.10976','120.61429','2','41456臺中市烏日區三和里高鐵東一路 26 號','1'),('04','3350','TRA-3350','成功','','24.11424','120.59021','3','41453臺中市烏日區榮泉里中山路三段 550 號','1'),('041','3360','TRA-3360','彰化','','24.08171','120.53828','1','50043彰化縣彰化市長樂里三民路 1 號','1'),('041','3370','TRA-3370','花壇','','24.02521','120.53759','4','50341彰化縣花壇鄉花壇村中正路 370 號','1'),('041','3380','TRA-3380','大村','','23.99003','120.56068','4','515彰化縣大村鄉過溝村福進路 100 號','1'),('041','3390','TRA-3390','員林','','23.95933','120.56995','1','51041彰化縣員林市和平里民權街 55 號','1'),('041','3400','TRA-3400','永靖','','23.92811','120.57165','5','51241彰化縣永靖鄉崙子村永崙路 25 號','1'),('041','3410','TRA-3410','社頭','','23.89571','120.58082','3','51155彰化縣社頭鄉廣興村社站路 10 號','1'),('041','3420','TRA-3420','田中','','23.85827','120.59121','2','52042彰化縣田中鎮中路里中州路一段 1 號','1'),('041','3430','TRA-3430','二水','','23.81321','120.61805','2','53042彰化縣二水鄉光化村光文路 1 號','1'),('041','3431','TRA-3431','源泉','','23.79846','120.64208','5','530彰化縣二水鄉合興村英義路 (無站房)','1'),('049','3432','TRA-3432','濁水','','23.83467','120.70467','4','55141南投縣名間鄉濁水村車站路 15 號','1'),('049','3433','TRA-3433','龍泉','','23.83521','120.74996','5','552南投縣集集鎮隘寮村龍泉巷 (無站房)','1'),('049','3434','TRA-3434','集集','','23.82653','120.78491','5','55241南投縣集集鎮吳厝里民生路 75 號','1'),('049','3435','TRA-3435','水里','','23.81844','120.85333','4','55353南投縣水里鄉水里村民生路 440 號','1'),('049','3436','TRA-3436','車埕','','23.83263','120.86572','5','55345南投縣水里鄉車埕村民權巷 2 號','1'),('05','3450','TRA-3450','林內','','23.75967','120.61499','3','64341雲林縣林內鄉林中村中山路 42 號','1'),('05','3460','TRA-3460','石榴','','23.73167','120.57998','5','64071雲林縣斗六市榴北里文明路 31 號','1'),('05','3470','TRA-3470','斗六','','23.71157','120.54117','1','64050雲林縣斗六市信義里民生路 187 號','1'),('05','3480','TRA-3480','斗南','','23.67302','120.48082','2','63042雲林縣斗南鎮南昌里中山路 2 號','1'),('05','3490','TRA-3490','石龜','','23.63951','120.47106','5','630雲林縣斗南鎮石龜里','1'),('052','4050','TRA-4050','大林','','23.60112','120.45585','3','62242嘉義縣大林鎮吉林里中山路 2 號','1'),('052','4060','TRA-4060','民雄','','23.55502','120.43136','3','62142嘉義縣民雄鄉東榮村和平路 2 號','1'),('051','4070','TRA-4070','嘉北','','23.49985','120.44852','4','60079嘉義市 東區後湖里保建街 110 號','1'),('051','4080','TRA-4080','嘉義','','23.47902','120.44124','1','60041嘉義市 西區番社里中山路 528 號','1'),('052','4090','TRA-4090','水上','','23.43389','120.39961','4','60841嘉義縣水上鄉下寮村鴿溪寮 49 號','1'),('052','4100','TRA-4100','南靖','','23.41346','120.38647','4','60859嘉義縣水上鄉三鎮村三鎮路 26 號','1'),('06','4110','TRA-4110','後壁','','23.36626','120.36058','4','73143臺南市後壁區後壁里後壁 77 號','1'),('06','4120','TRA-4120','新營','','23.30658','120.32344','1','73045臺南市新營區中營里中山路 1 號','1'),('06','4130','TRA-4130','柳營','','23.27762','120.32252','4','73657臺南市柳營區東昇里建國路 1 號','1'),('06','4140','TRA-4140','林鳳營','','23.24259','120.32107','4','73444臺南市六甲區中社里林鳳營 16 號','1'),('06','4150','TRA-4150','隆田','','23.19271','120.31917','2','72041臺南市官田區隆田里中山路一段 1 號','1'),('06','4160','TRA-4160','拔林','','23.17287','120.32117','5','72044臺南市官田區拔林里拔子林 83 之 1 號','1'),('06','4170','TRA-4170','善化','','23.13333','120.30653','2','74154臺南市善化區光文里中山路 1 號','1'),('06','4180','TRA-4180','南科','','23.10714','120.30175','4','74443臺南市新市區大營里大營 287-300 號','1'),('06','4190','TRA-4190','新市','','23.06816','120.29004','3','74448臺南市新市區新和里中華路 1 號','1'),('06','4200','TRA-4200','永康','','23.03873','120.25374','2','71090臺南市永康區埔園里中山路 459 號','1'),('06','4210','TRA-4210','大橋','','23.01951','120.22449','4','71049臺南市永康區西橋里中華路 835 號','1'),('06','4220','TRA-4220','臺南','','22.99719','120.21231','1','70146臺南市東區成大里北門路二段 4 號','1'),('06','4250','TRA-4250','保安','','22.93289','120.23143','3','71755臺南市仁德區保安里文賢路一段 529 巷 10 號','1'),('06','4260','TRA-4260','仁德','','22.92364','120.24061','4','71750臺南市仁德區保安里永德路 10 號','1'),('06','4270','TRA-4270','中洲','','22.90466','120.25286','2','71754臺南市仁德區中洲五街236號','1'),('06','4271','TRA-4271','長榮大學','','22.90735','120.27274','4','71150臺南市歸仁區大潭里長大路15 號','1'),('06','4272','TRA-4272','沙崙','','22.92419','120.28635','4','71151臺南市歸仁區沙崙里歸仁大道 102 號','1'),('07','4290','TRA-4290','大湖','','22.87821','120.25384','3','82144高雄市路竹區甲南里天祐路 24 號','1'),('07','4300','TRA-4300','路竹','','22.85404','120.26619','3','82146高雄市路竹區竹南里中正路 288 號','1'),('07','4310','TRA-4310','岡山','','22.79251','120.30008','1','82065高雄市岡山區碧紅里岡燕路 111 號','1'),('07','4320','TRA-4320','橋頭','','22.76113','120.31043','3','82548高雄市橋頭區橋頭里站前街 14 號','1'),('07','4330','TRA-4330','楠梓','','22.72717','120.32453','2','81162高雄市惠楠里建楠路 229 號','1'),('07','4340','TRA-4340','新左營','','22.68721','120.30721','1','81354高雄市左營區尾北里站前北路 1 號','1'),('07','4350','TRA-4350','左營','','22.67441','120.29441','4','81351高雄市左營區翠華路1050號地下1層','1'),('07','4360','TRA-4360','內惟','','22.66611','120.28691','4','804高雄市鼓山區翠華路500號地下1層','1'),('07','4370','TRA-4370','美術館','','22.65298','120.28163','4','80460高雄市鼓山區翠華路246號','1'),('07','4380','TRA-4380','鼓山','','22.64169','120.28071','4','80445高雄市鼓山區鐵路街20巷6號','1'),('07','4390','TRA-4390','三塊厝','','22.63901','120.29381','4','80748高雄市三民區德北里6鄰康平街1號','1'),('07','4400','TRA-4400','高雄','','22.63801','120.30313','0','80750高雄市三民區港西里建國二路 318 號','1'),('07','4410','TRA-4410','民族','','22.63881','120.31479','4','807高雄市三民區博惠里14鄰凱旋一路260號','1'),('07','4420','TRA-4420','科工館','','22.63702','120.32663','4','807高雄市三民區寶盛里15鄰大順三路307號','1'),('07','4430','TRA-4430','正義','','22.63425','120.34245','4','802高雄市苓雅區建軍里正義路 308號B1','1'),('07','4440','TRA-4440','鳳山','','22.63131','120.35746','2','83064高雄市鳳山區曹公里曹公路 137 號','1'),('07','4450','TRA-4450','後庄','','22.64013','120.39132','4','83143高雄市大寮區後庄里民慶街 9 號','1'),('07','4460','TRA-4460','九曲堂','','22.65658','120.42072','3','84041高雄市大樹區久堂里久堂路鐵路巷 15 號','1'),('08','4470','TRA-4470','六塊厝','','22.66619','120.46491','5','90082屏東縣屏東市長安里光復路 392 號','1'),('08','5000','TRA-5000','屏東','','22.66961','120.48627','1','90078屏東縣屏東市擇仁里公勇路 62 號','1'),('08','5010','TRA-5010','歸來','','22.65214','120.50294','5','90043屏東縣屏東市歸來里歸仁路 5 之 4 號','1'),('08','5020','TRA-5020','麟洛','','22.63478','120.51446','5','90941屏東縣麟洛鄉田道村中華路站前巷 15 號','1'),('08','5030','TRA-5030','西勢','','22.61661','120.52677','3','91142屏東縣竹田鄉西勢村西豐路 2 號','1'),('08','5040','TRA-5040','竹田','','22.58648','120.54009','4','91144屏東縣竹田鄉履豐村豐明路29 號','1'),('08','5050','TRA-5050','潮州','','22.55007','120.53662','1','92045屏東縣潮州鎮新榮里信義路 111 號','1'),('08','5060','TRA-5060','崁頂','','22.51311','120.51481','5','92442屏東縣崁頂鄉崁頂村中正路 122 號','1'),('08','5070','TRA-5070','南州','','22.49203','120.51159','3','92643屏東縣南州鄉仁里村仁里路 86 號','1'),('08','5080','TRA-5080','鎮安','','22.45794','120.51151','5','92748屏東縣林邊鄉鎮安村永和路 4 號','1'),('08','5090','TRA-5090','林邊','','22.43141','120.51538','3','92744屏東縣林邊鄉仁和村仁愛路 33 號','1'),('08','5100','TRA-5100','佳冬','','22.41416','120.54782','4','931屏東縣佳冬鄉六根村復興路21號','1'),('08','5110','TRA-5110','東海','','22.39903','120.57252','5','94042屏東縣枋寮鄉東海村西安路 92 號','1'),('08','5120','TRA-5120','枋寮','','22.36786','120.59501','3','94043屏東縣枋寮鄉枋寮村儲運路 18 號','1'),('08','5130','TRA-5130','加祿','','22.33085','120.62445','3','94145屏東縣枋山鄉加祿村會社 53 號','1'),('08','5140','TRA-5140','內獅','','22.30615','120.64322','5','94150屏東縣枋山鄉加祿村南和 43 號','1'),('08','5160','TRA-5160','枋山','','22.26677','120.65968','4','94350屏東縣獅子鄉內獅村內獅巷 84 號','1'),('089','5190','TRA-5190','大武','','22.36537','120.90091','3','96541臺東縣大武鄉大鳥村和平部落 33 號','1'),('089','5200','TRA-5200','瀧溪','','22.46072','120.94188','4','96345臺東縣太麻里鄉多良村大溪 37 號','1'),('089','5210','TRA-5210','金崙','','22.53161','120.96721','3','96344臺東縣太麻里鄉金崙村金崙 47 之 17 號','1'),('089','5220','TRA-5220','太麻里','','22.61879','121.00505','3','96346臺東縣太麻里鄉大王村站前路 2 號','1'),('089','5230','TRA-5230','知本','','22.71008','121.06128','3','95093臺東縣臺東市知本里知本路二段 900 巷 85 號','1'),('089','5240','TRA-5240','康樂','','22.76406','121.09338','4','95060臺東縣臺東市康樂里博物館路 51 巷 131 號','1'),('08','5999','TRA-5999','潮州基地','','22.52231','120.52642','4','92054屏東縣潮州鎮光春里光復路 616 號','1'),('089','6000','TRA-6000','臺東','','22.79375','121.12326','1','95058臺東縣臺東市岩灣里岩灣路 101 巷 598 號','1'),('089','6010','TRA-6010','山里','','22.86194','121.13778','3','95443臺東縣卑南鄉嘉豐村山里路 108 號','1'),('089','6020','TRA-6020','鹿野','','22.91251','121.13696','3','95542臺東縣鹿野鄉鹿野村中正路 38 號','1'),('089','6030','TRA-6030','瑞源','','22.95613','121.15902','3','95543臺東縣鹿野鄉瑞源村瑞景路一段 336 巷 8 號 之 1','1'),('089','6040','TRA-6040','瑞和','','22.98001','121.15573','5','95543臺東縣鹿野鄉瑞和村瑞景路三段 1 之 1 號','1'),('089','6050','TRA-6050','關山','','23.04564','121.16441','3','95662臺東縣關山鎮里壠里博愛路 2 號','1'),('089','6060','TRA-6060','海端','','23.10257','121.17695','4','95664臺東縣關山鎮德高里西莊 49 號','1'),('089','6070','TRA-6070','池上','','23.12628','121.21945','3','95862臺東縣池上鄉福文村鐵花路 30 號','1'),('034','6080','TRA-6080','富里','','23.17935','121.24864','3','98341花蓮縣富里鄉富里村車站街 56 號','1'),('034','6090','TRA-6090','東竹','','23.22612','121.27844','3','98391花蓮縣富里鄉新興村新興 26 號','1'),('034','6100','TRA-6100','東里','','23.27127','121.30575','3','98392花蓮縣富里鄉東里村大莊路 15 之 6 號','1'),('034','6110','TRA-6110','玉里','','23.33161','121.31181','1','98143花蓮縣玉里鎮中城里康樂街 39 號','1'),('034','6120','TRA-6120','三民','','23.42463','121.34561','3','98191花蓮縣玉里鎮三民里三民 10 號','1'),('034','6130','TRA-6130','瑞穗','','23.49739','121.37689','3','97841花蓮縣瑞穗鄉瑞穗村四維街 13 號','1'),('034','6140','TRA-6140','富源','','23.58028','121.38003','3','97843花蓮縣瑞穗鄉富源村富源路 2 號','1'),('034','6150','TRA-6150','大富','','23.60572','121.38969','5','97644花蓮縣光復鄉大富村明德路 1 號','1'),('034','6160','TRA-6160','光復','','23.66633','121.42125','3','97645花蓮縣光復鄉大安村中正路一段 2 之 1 號','1'),('034','6170','TRA-6170','萬榮','','23.71199','121.41907','3','97543花蓮縣鳳林鎮長橋里長德街 17 號','1'),('034','6180','TRA-6180','鳳林','','23.74625','121.44708','3','97545花蓮縣鳳林鎮鳳智里中山路 43 號','1'),('034','6190','TRA-6190','南平','','23.78228','121.45833','3','97542花蓮縣鳳林鎮南平里自強路 233 號','1'),('034','6200','TRA-6200','林榮新光','','23.80167','121.46166','4','97542花蓮縣鳳林鎮兆豐路800號','1'),('034','6210','TRA-6210','豐田','','23.84836','121.49619','4','97451花蓮縣壽豐鄉豐山村站前街 36 號','1'),('034','6220','TRA-6220','壽豐','','23.86901','121.51064','3','97442花蓮縣壽豐鄉壽豐村壽山路 1 號','1'),('034','6230','TRA-6230','平和','','23.88275','121.52036','5','97445花蓮縣壽豐鄉平和村平和路 1 號','1'),('034','6240','TRA-6240','志學','','23.90751','121.52947','3','97443花蓮縣壽豐鄉志學村中正路 1 號','1'),('034','6250','TRA-6250','吉安','','23.96825','121.58261','3','97350花蓮縣吉安鄉南昌村南昌路 200 號','1'),('034','7000','TRA-7000','花蓮','','23.99264','121.60158','0','97055花蓮縣花蓮市國聯里國聯一路 100 號','1'),('034','7010','TRA-7010','北埔','','24.03251','121.60189','3','97147花蓮縣新城鄉北埔村自強街 113 號','1'),('034','7020','TRA-7020','景美','','24.09039','121.61103','4','97243花蓮縣秀林鄉景美村加灣 178 之 1 號','1'),('034','7030','TRA-7030','新城','','24.12761','121.64103','2','97163花蓮縣新城鄉新城村新興一路 73 號','1'),('034','7040','TRA-7040','崇德','','24.17111','121.65555','3','97253花蓮縣秀林鄉崇德村海濱路 96 號','1'),('034','7050','TRA-7050','和仁','','24.24219','121.71192','3','97291花蓮縣秀林鄉和平村和仁 71 號','1'),('034','7060','TRA-7060','和平','','24.29825','121.75322','2','97291花蓮縣秀林鄉和平村和平 276 號','1'),('033','7070','TRA-7070','漢本','','24.33541','121.76827','3','27247宜蘭縣南澳鄉澳花村蘇花路一段 56 號','1'),('033','7080','TRA-7080','武塔','','24.44879','121.77601','5','27245宜蘭縣南澳鄉武塔村新溪路 18 號','1'),('033','7090','TRA-7090','南澳','','24.46342','121.80103','3','27092宜蘭縣蘇澳鎮南強里大通路 22 號','1'),('033','7100','TRA-7100','東澳','','24.51828','121.83071','2','27291宜蘭縣南澳鄉東岳村東岳路 1 號','1'),('033','7110','TRA-7110','永樂','','24.56843','121.84458','3','27046宜蘭縣蘇澳鎮永樂里圳頭路 60 號','1'),('033','7120','TRA-7120','蘇澳','','24.59521','121.85144','2','27048宜蘭縣蘇澳鎮蘇南里太平路 1 號','1'),('033','7130','TRA-7130','蘇澳新','','24.60852','121.82719','1','27048宜蘭縣蘇澳鎮聖愛里中山路二段 238 之 1 號','1'),('033','7140','TRA-7140','新馬','','24.61535','121.82292','5','27048宜蘭縣蘇澳鎮新城里中山路二段 322 號','1'),('033','7150','TRA-7150','冬山','','24.63627','121.79212','3','26946宜蘭縣冬山鄉冬山村中正路 1 號','1'),('033','7160','TRA-7160','羅東','','24.67795','121.77424','2','26550宜蘭縣羅東鎮大新里公正路 2 號','1'),('033','7170','TRA-7170','中里','','24.69415','121.77526','5','26844宜蘭縣五結鄉中興村台興路 10 號','1'),('033','7180','TRA-7180','二結','','24.70529','121.77411','3','26843宜蘭縣五結鄉五結中路三段658巷8號','1'),('033','7190','TRA-7190','宜蘭','','24.75462','121.75791','1','26043宜蘭縣宜蘭市和睦里光復路 1 號','1'),('033','7200','TRA-7200','四城','','24.78684','121.76268','4','26245宜蘭縣礁溪鄉吳沙村站前路 24 號','1'),('033','7210','TRA-7210','礁溪','','24.82705','121.77523','3','26248宜蘭縣礁溪鄉德陽村溫泉路 1 號','1'),('033','7220','TRA-7220','頂埔','','24.84383','121.80918','5','26142宜蘭縣頭城鎮下埔里下埔路 4 之 8 號','1'),('033','7230','TRA-7230','頭城','','24.85898','121.82253','2','26146宜蘭縣頭城鎮纘祥路 59 號','1'),('033','7240','TRA-7240','外澳','','24.88371','121.84576','5','261宜蘭縣頭城鎮濱海路二段 217 號','1'),('033','7250','TRA-7250','龜山','','24.90481','121.86886','4','26144宜蘭縣頭城鎮更新里濱海路三段 261 號','1'),('033','7260','TRA-7260','大溪','','24.93836','121.88983','5','26145宜蘭縣頭城鎮濱海路五段 63 號','1'),('033','7270','TRA-7270','大里','','24.96688','121.92257','4','26145宜蘭縣頭城鎮大里里濱海路六段 326 號','1'),('033','7280','TRA-7280','石城','','24.97837','121.94546','5','26145宜蘭縣頭城鎮濱海路七段 230 號','1'),('021','7290','TRA-7290','福隆','','25.01598','121.94471','3','22841新北市貢寮區福隆里福隆街 2 號','1'),('021','7300','TRA-7300','貢寮','','25.02209','121.90867','4','22843新北市貢寮區貢寮里朝陽街 33 號','1'),('021','7310','TRA-7310','雙溪','','25.03858','121.86645','2','22744新北市雙溪區新基里朝陽街 1 號','1'),('021','7320','TRA-7320','牡丹','','25.05877','121.85194','5','22741新北市雙溪區牡丹里51號','1'),('021','7330','TRA-7330','三貂嶺','','25.06555','121.82259','3','22446新北市瑞芳區碩仁里魚寮路 1 號','1'),('021','7331','TRA-7331','大華','','25.04993','121.79751','5','22643新北市平溪區南山里六分 12 之 1 號','1'),('021','7332','TRA-7332','十分','','25.04111','121.77514','4','22643新北市平溪區十分里十分街 51 號','1'),('021','7333','TRA-7333','望古','','25.03445','121.76349','5','226新北市平溪區望古里 (無站房)','1'),('021','7334','TRA-7334','嶺腳','','25.03021','121.74784','5','22641新北市平溪區嶺腳里嶺腳寮 22 號','1'),('021','7335','TRA-7335','平溪','','25.02552','121.73994','4','22641新北市平溪區平溪里中華街 12 號','1'),('021','7336','TRA-7336','菁桐','','25.02384','121.72394','4','22642新北市平溪區菁桐里菁桐街 52 號','1'),('021','7350','TRA-7350','猴硐','','25.08711','121.82741','3','22446新北市瑞芳區光復里柴寮路 70 號','1'),('021','7360','TRA-7360','瑞芳','','25.10861','121.80596','1','22441新北市瑞芳區龍潭里明燈路三段 82 號','1'),('01','7361','TRA-7361','海科館','','25.13768','121.80003','5','202基隆市中正區長潭里','1'),('01','7362','TRA-7362','八斗子','','25.13534','121.80285','5','202基隆市中正區砂子里省道臺 2 線 (與新北市瑞芳區交界處、無站房)','1'),('021','7362','TRA-7362','八斗子','','25.13534','121.80285','5','202基隆市中正區砂子里省道臺 2 線 (與新北市瑞芳區交界處、無站房)','1'),('021','7380','TRA-7380','四腳亭','','25.10281','121.76192','3','22449新北市瑞芳區吉慶里中央路 65 號','1'),('01','7390','TRA-7390','暖暖','','25.10224','121.74048','5','205基隆市暖暖區暖暖里暖暖街 51 號','1');
/*!40000 ALTER TABLE `trastationd` ENABLE KEYS */;
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