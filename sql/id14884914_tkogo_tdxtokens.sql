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
-- Table structure for table `tdxtokens`
--

DROP TABLE IF EXISTS `tdxtokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tdxtokens` (
  `tdxIndex` int(255) NOT NULL AUTO_INCREMENT,
  `tokenTime` int(255) NOT NULL,
  `tokendate` varchar(1000) NOT NULL,
  `tdxtoken` varchar(10000) NOT NULL,
  `updateOC` int(11) NOT NULL,
  `tdxKeyId` varchar(1000) NOT NULL,
  `tokenNum` int(11) NOT NULL,
  `tokenNumDate` varchar(255) DEFAULT NULL,
  UNIQUE KEY `tdxIndex` (`tdxIndex`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tdxtokens`
--

LOCK TABLES `tdxtokens` WRITE;
/*!40000 ALTER TABLE `tdxtokens` DISABLE KEYS */;
INSERT INTO `tdxtokens` VALUES (1,2400,'2024-08-29 11:52:57','eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJER2lKNFE5bFg4WldFajlNNEE2amFVNm9JOGJVQ3RYWGV6OFdZVzh3ZkhrIn0.eyJleHAiOjE3MjQ5ODk5NzcsImlhdCI6MTcyNDkwMzU3NywianRpIjoiNzgzNDRiNmMtYjgwMy00NzUyLTg0MTMtZWY0ZDA4YjRiZDYyIiwiaXNzIjoiaHR0cHM6Ly90ZHgudHJhbnNwb3J0ZGF0YS50dy9hdXRoL3JlYWxtcy9URFhDb25uZWN0Iiwic3ViIjoiMjk4NDZhODEtMzc5OC00NmI4LTk1NjAtODAxNTIwMjQ4NTlkIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiazEwMzE2MTYtMDllMGE3NjUtODMxOC00OGVmIiwiYWNyIjoiMSIsInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJzdGF0aXN0aWMiLCJwcmVtaXVtIiwibWFhcyIsImFkdmFuY2VkIiwidG91cmlzbSIsImhpc3RvcmljYWwiLCJiYXNpYyJdfSwic2NvcGUiOiJwcm9maWxlIGVtYWlsIiwidXNlciI6IjMxMDk1OTZjIn0.Dobwzn62OXtlwx_zpWjhxQE57Gfnuda376BKUOeQV4S5NQKcHGXo95nz-pMjW1pyJmb04wHrh6fL7A_gFPAueNBGPfZl5Ds-it8_l2TjhJ4y5SRredBuxQWaGPXWR8LWZ2jolwPgRQqeZKowRv4LonW-cO3rNwLnrWAslyIiGhrywxZAVidelgA2zJF6l1QCp45L2TW2rjSyyNwqNst-y2C1Q2s68KYqFn083w7Ko3_bQqZI_Y_PathZfWmYzC0hbkkpjV3YqCgWWu5eo4tGd5wKqkMNbskN9yERG1LY-_iYdleqqU8hkgzVbo_MBbzIke-NZBdPdYOhRLXbbtsQrw',1,'無法提供',5,'2024-08-29 12:21:34'),(2,2400,'2024-08-29 11:52:57','eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJER2lKNFE5bFg4WldFajlNNEE2amFVNm9JOGJVQ3RYWGV6OFdZVzh3ZkhrIn0.eyJleHAiOjE3MjQ5ODk5NzgsImlhdCI6MTcyNDkwMzU3OCwianRpIjoiYjQ5NjlmYWItZTZkYy00MWQ1LThkNGMtYmNkODY3M2I3OTVmIiwiaXNzIjoiaHR0cHM6Ly90ZHgudHJhbnNwb3J0ZGF0YS50dy9hdXRoL3JlYWxtcy9URFhDb25uZWN0Iiwic3ViIjoiZDEwMzNiNGUtMWE1Zi00ZTAwLWFkOTQtOGQ4YjU0ODk3NDM0IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiazEwMzE2MTYtOTU5Y2VmZjAtNWYzMC00YTZlIiwiYWNyIjoiMSIsInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJzdGF0aXN0aWMiLCJwcmVtaXVtIiwibWFhcyIsImFkdmFuY2VkIiwidG91cmlzbSIsImhpc3RvcmljYWwiLCJiYXNpYyJdfSwic2NvcGUiOiJwcm9maWxlIGVtYWlsIiwidXNlciI6IjMxMDk1OTZjIn0.pVJ3NV5jtu5h_r7leKHAmgIes-a061QgmciitKoTCy8Fsnqr2GxIsQOn6vMvxIszbTBUTj1iYrn_nRwvuv-55Q0DhaYzA3PUEEuADy2zQHV6rfQcydy9o_wbhn2MrePqVqr1SVD_Z72alWiVYshimGdm1EP8pzS9lTZK7KQu7JYI4Oht8mnhSG6Oh6nKc8mzIfXaVB9QJIbQopWa0Dw-l4LE13EUlsFpgoWt10atUdebsOLG0oltt-zvCSFzkyG0oo2o7ujZA4kIS8YuoUJckKyEhLkJl_O1nz_J819kiDVDpYMrrLPImr0bZ-1aX4rbHWuRhwbW7OCjENnXKqIuDA',1,'無法提供',5,'2024-08-29 12:21:40'),(3,2400,'2024-08-29 11:52:58','eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJER2lKNFE5bFg4WldFajlNNEE2amFVNm9JOGJVQ3RYWGV6OFdZVzh3ZkhrIn0.eyJleHAiOjE3MjQ5ODk5NzgsImlhdCI6MTcyNDkwMzU3OCwianRpIjoiN2MwOWRkZDYtMDc1ZS00MGZkLWI2NDMtNDgzMGE3ZWY3YmJhIiwiaXNzIjoiaHR0cHM6Ly90ZHgudHJhbnNwb3J0ZGF0YS50dy9hdXRoL3JlYWxtcy9URFhDb25uZWN0Iiwic3ViIjoiNjAzYjVjOWUtMmNhZC00NTNlLWE4ZTEtMjY1YjBkMTEyZWZkIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiazEwMzE2MTYtMGE5NDlkNzAtODUwYi00YWY5IiwiYWNyIjoiMSIsInJlYWxtX2FjY2VzcyI6eyJyb2xlcyI6WyJzdGF0aXN0aWMiLCJwcmVtaXVtIiwibWFhcyIsImFkdmFuY2VkIiwidG91cmlzbSIsImhpc3RvcmljYWwiLCJiYXNpYyJdfSwic2NvcGUiOiJwcm9maWxlIGVtYWlsIiwidXNlciI6IjMxMDk1OTZjIn0.g4-zA7cABFvqbVPAvsOPcU3OH0aXRjEk1jXSWbA4SefKQgUQupYI3ARUksD6HLy4ZP2i9_NdMEI0_qLUYtptdeLYnbhOTDcGTNe1ovP9-5O2fXxKHB4bPH6uRkYikG5lgKIvgkhu3WfMpZ13C5jXfZS68Wfv4NSGi-RKR_X-Cbyl3W5Br4L-Na0m2pzK9MBcniqbD8GtxV5fBdwOvQB8VGYZjDWV6FZ9tTHSMxYFgoyolWqQ0jvsVNnniVufBRcCSQwozTKPn9eBgWUU-jKC32LjKg42U6dAh2Dzhyu0SRnkq-GMGIeow112eFpxQ-pmCDZBH3ygx2lcik56_klc7Q',1,'無法提供',5,'2024-08-29 12:21:45'),(4,2400,'2024-08-29 11:52:58','eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJER2lKNFE5bFg4WldFajlNNEE2amFVNm9JOGJVQ3RYWGV6OFdZVzh3ZkhrIn0.eyJleHAiOjE3MjQ5ODk5NzksImlhdCI6MTcyNDkwMzU3OSwianRpIjoiNzc1NTZmNWMtMGU4Ni00MDc4LTgzZTktZTcwZjljNDM0ZTgzIiwiaXNzIjoiaHR0cHM6Ly90ZHgudHJhbnNwb3J0ZGF0YS50dy9hdXRoL3JlYWxtcy9URFhDb25uZWN0Iiwic3ViIjoiNWM2NmZjZmQtZjY4NS00ZDNiLWFjODgtNDhiZWU5ODQ3YjY0IiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiZmlzaDk3MDYyOC1iNzE4YWExYi1iYWI3LTQ4ZmEiLCJhY3IiOiIxIiwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbInN0YXRpc3RpYyIsInByZW1pdW0iLCJtYWFzIiwiYWR2YW5jZWQiLCJ0b3VyaXNtIiwiaGlzdG9yaWNhbCIsImJhc2ljIl19LCJzY29wZSI6InByb2ZpbGUgZW1haWwiLCJ1c2VyIjoiZmIxNWMxZmYifQ.EtLyDz_VlL8YDGoEXZaZ0hik_DA8d9-4BdDsqMVK9vdnIqObGl9M1mmZ7ExcUQdKa2hkpxznx78cby5LnhEHvD-L8HepxP6zlKmkkdhKKfLKqVRGens179pl8iPggk-93XAuEcgymf8MJRWl9Tl3griof7pBGfBTMaSliEBkgFteUt8-YKazrdSdcu8es86eEQPkuS6JVYlsEnahwwc3zlNopCc9Pcb9n_yUxvojqMy9bE4OJKvvSuRxRKBgD1XLhp5P_ThjldlYEm_m9XZE_HUff5veftz7jfYwNPJIAjZCnOcCQYKTg_19FIlubAYJq6uTV9wF7Y3N14CYazFIRA',1,'無法提供',4,'2024-08-29 12:21:50'),(5,2400,'2024-08-29 11:52:59','eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJER2lKNFE5bFg4WldFajlNNEE2amFVNm9JOGJVQ3RYWGV6OFdZVzh3ZkhrIn0.eyJleHAiOjE3MjQ5ODk5NzksImlhdCI6MTcyNDkwMzU3OSwianRpIjoiNTBjNGQ3NDktYzU1MC00YzFmLTg4NGMtOWFkNDUzNTAwMmE2IiwiaXNzIjoiaHR0cHM6Ly90ZHgudHJhbnNwb3J0ZGF0YS50dy9hdXRoL3JlYWxtcy9URFhDb25uZWN0Iiwic3ViIjoiOTE4OGRiM2EtMDk0Mi00MTQ5LTk4NmItY2YzOTRjMmJkZTJkIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiZmlzaDk3MDYyOC0wMzcyZjE0OC0yOTAzLTQwMGYiLCJhY3IiOiIxIiwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbInN0YXRpc3RpYyIsInByZW1pdW0iLCJtYWFzIiwiYWR2YW5jZWQiLCJ0b3VyaXNtIiwiaGlzdG9yaWNhbCIsImJhc2ljIl19LCJzY29wZSI6InByb2ZpbGUgZW1haWwiLCJ1c2VyIjoiZmIxNWMxZmYifQ.Kkb1UFGEXQvFRTuI_wiPGAWcZXAXvkkvnja9Ym7uyysaApMj43bq0pWrwnaO4I3_32bQspufcd46Hd09JJ5Z8KeWWqHj3hHU-F-hA5xxt9NV_DtCrCfvQKsY-EMWafrnxcsVoqSbaHNlHE7PHwFEx9NntjP_9pKSPZ6Z6JEUxXcwmQop8s9n2VP7RJqLh1oKn4xJYZ0bQ6tTGsZFfjlJ_268NvdR_STXSRPBQpBX6S4EE_bhBA1sGP3DgXl0DAUF8nANAHbo1pS9cT1OufmRiKrqzRk9jI-SmHCtI4GtqT0y6UM6BSEIu1cnhIGN3q6mo9144ww3AQA_OEFLvHpFZg',1,'無法提供',5,'2024-08-29 12:10:27'),(6,2400,'2024-08-29 11:52:59','eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJER2lKNFE5bFg4WldFajlNNEE2amFVNm9JOGJVQ3RYWGV6OFdZVzh3ZkhrIn0.eyJleHAiOjE3MjQ5ODk5ODAsImlhdCI6MTcyNDkwMzU4MCwianRpIjoiNmU1ZjQyODktOWRhMy00NmM1LTlhNmYtMmVkMjFhZGJlZjlmIiwiaXNzIjoiaHR0cHM6Ly90ZHgudHJhbnNwb3J0ZGF0YS50dy9hdXRoL3JlYWxtcy9URFhDb25uZWN0Iiwic3ViIjoiNGY0ZjZlZmYtNmYxNC00YmEyLWI4YjUtMzJkODhhZDgxZWRjIiwidHlwIjoiQmVhcmVyIiwiYXpwIjoiZmlzaDk3MDYyOC1mYjcwNGY0Zi05NzFiLTQ5OTQiLCJhY3IiOiIxIiwicmVhbG1fYWNjZXNzIjp7InJvbGVzIjpbInN0YXRpc3RpYyIsInByZW1pdW0iLCJtYWFzIiwiYWR2YW5jZWQiLCJ0b3VyaXNtIiwiaGlzdG9yaWNhbCIsImJhc2ljIl19LCJzY29wZSI6InByb2ZpbGUgZW1haWwiLCJ1c2VyIjoiZmIxNWMxZmYifQ.VdStONo9WdT1wMrhEGTc_ViGaUsT2BKQRf0tyD1zDzN5744iiVqI3bLiMSxtdaSaXkM_thGeKKfnbpZGXsfA15ZiAvHZKmO_YZ4v8P7Fs5R3iU9Xh7TfRIWztRAzfBF6G1wbeR2796_PAFed0JYu_KcZhn6GeF0496VIiLhSFCaebuYKd_jdhBO7dpAJP0kpRHjMJfPyrKf_N1OooRffi40nyj8UNngV9v_PsE8NKU3Lu9OAmZdAUC8LKYf7cCTv9OGTXDevBQXJ_n5LyUQdp3Nve5XnG-5BYRuAlQ1GAPRrsRnSWyGASnIag4yMVnELeZ7yY3sXkncRC2CAoLHe5w',1,'無法提供',5,'2024-08-29 12:10:31');
/*!40000 ALTER TABLE `tdxtokens` ENABLE KEYS */;
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