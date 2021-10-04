-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mecvise_db
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.21.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `branch` (
  `branch_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `university_id` int DEFAULT NULL,
  PRIMARY KEY (`branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (1,'Shouf Campus',1);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Bchetfine',2),(2,'Dekweneh',3),(3,'Kfarhim',2),(4,'Ehden',8);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Lebanon');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty` (
  `Faculty_ID` varchar(255) NOT NULL,
  `Faculty_Name` text NOT NULL,
  `Uni_id` varchar(255) NOT NULL,
  PRIMARY KEY (`Faculty_ID`),
  KEY `Uni_id` (`Uni_id`),
  CONSTRAINT `Faculty_ibfk_1` FOREIGN KEY (`Uni_id`) REFERENCES `university` (`Uni_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES ('1','Faculty of Business Administration and Economics (FBAE)','1'),('123','testSamah','2'),('2','Faculty of Natural and Applied Sciences (FNAS)','1'),('3','Faculty of Arts & Sciences (FAS)','2'),('4','Suliman S. Olayan School of Business (OSB)','2');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `major` (
  `Major_id` varchar(255) NOT NULL,
  `Major_Name` text NOT NULL,
  `fac_id` varchar(255) NOT NULL,
  PRIMARY KEY (`Major_id`),
  KEY `fac_id` (`fac_id`),
  CONSTRAINT `Major_ibfk_1` FOREIGN KEY (`fac_id`) REFERENCES `faculty` (`Faculty_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `major`
--

LOCK TABLES `major` WRITE;
/*!40000 ALTER TABLE `major` DISABLE KEYS */;
INSERT INTO `major` VALUES ('1','Financial Engineering','1'),('2','Banking and Finance','1'),('3','Business Computing','2'),('4','Management Information Systems (MIS)','2'),('555','AUB MAJOR','123');
/*!40000 ALTER TABLE `major` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `Post_ID` int NOT NULL AUTO_INCREMENT,
  `Best_Answer` int NOT NULL,
  `Nbr of Likes` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `body` text,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` int DEFAULT '0',
  `tags` varchar(255) DEFAULT NULL,
  KEY `Post_ID` (`Post_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (5,0,0,17,'zxczcxad ad asd ','qqwqwe',0,'med,change'),(6,0,0,17,'maarouffff 3awww','maarouf',0,'change,doctor'),(7,0,0,0,'asjhdashjadhja','Firsst POST EDITED',0,'med,change'),(8,0,0,27,'this is a simple test','Test 4',0,'cs,it,med'),(9,0,0,28,'final test is done','Final test',0,'cs,it'),(10,0,0,29,'dwhatever thing is real','Final Decription',0,'cs,it'),(11,0,0,30,'Let\'s raise some flags for other people to work, thank you.','Let\'s get down to business.',0,'cs,it'),(12,0,0,31,'tihs is a test','test7',0,'cs,it');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `province` (
  `province_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` int DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Akkar',1),(2,'Mount Lebanon',1),(3,'Beirut',1),(4,'Baalbek',1),(5,'Beqaa',1),(6,'Kesrwen-Jbiel',1),(7,'Nabatieh',1),(8,'North',1),(9,'South',1);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `university`
--

DROP TABLE IF EXISTS `university`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `university` (
  `Uni_ID` varchar(255) NOT NULL,
  `Acronym` varchar(20) NOT NULL,
  `University_Name` text NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Uni_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `university`
--

LOCK TABLES `university` WRITE;
/*!40000 ALTER TABLE `university` DISABLE KEYS */;
INSERT INTO `university` VALUES ('1','NDU','Notre Dame University Louaize','https://www.ndu.edu.lb/'),('2','AUB','American University Of Beirut','https://www.aub.edu.lb/'),('3','LAU','Lebanese American University','https://www.lau.edu.lb/');
/*!40000 ALTER TABLE `university` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `User_ID` int NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` char(1) NOT NULL COMMENT 'M or F',
  `DOB` date NOT NULL,
  `Bio` text,
  `user_Type` varchar(255) NOT NULL,
  `grade` int DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `university_id` varchar(255) DEFAULT NULL,
  `major_id` varchar(255) DEFAULT NULL,
  `standing` varchar(255) DEFAULT NULL,
  `is_password_reset` tinyint DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `clubs` varchar(255) DEFAULT NULL,
  `ask_me` varchar(255) DEFAULT NULL,
  `phone_number` varchar(100) DEFAULT NULL,
  `linked_in_account` varchar(255) DEFAULT NULL,
  `personal_email` varchar(255) DEFAULT NULL,
  `gpa` varchar(10) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `province_id` int DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'Firas','Sabra','samah_daou1@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-07',NULL,'unistudent',NULL,NULL,'2','555','alumni',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(17,'Samah','Daou','samah_daou@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1997-07-21',NULL,'prospective',12,'Path','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(18,'Ali','BABA teacher','alibaba@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','2010-01-19',NULL,'teacher',NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'Ali','Baba Prospective','alibabaprospective@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01',NULL,'prospective',11,'Marj','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(20,'Ali','Baba UniStudent','alibabaunistudent@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01','asdadasdasd','unistudent',NULL,NULL,'2','555','alumni',NULL,'sadads asdasd','czcxzx','fddsf asd asasd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(22,'Samer','Fayad','samer_fayad@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01',NULL,'prospective',12,'Ups','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'Samir','Daou','samirdaou@gmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01',NULL,'prospective',12,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'Naji','Daou','najidaou@gmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1960-10-05','I\'m Naji Daou and I love Dentistry.','teacher',NULL,NULL,'','','',NULL,'Teeth','PSP','Fixing your smile',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(28,'Jad ','Jaafar','jadjaafar@gmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01',NULL,'prospective',12,'UPS','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'Kamal','Sara','kamalsara@gmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1996-12-08','ssfdsghjghk\r\n','teacher',NULL,NULL,'','','',NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(30,'Lara','Hamed','Larahamed@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','F','1964-12-04',NULL,'teacher',NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(31,'Maarouf','Daou','maarouf.daou@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-08-15',NULL,'unistudent',NULL,NULL,'1','4','alumni',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(32,'shaker ','Absi','skabsi@gmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01',NULL,'unistudent',NULL,NULL,'1','1','freshman',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'moufid','nasr','moufi@hotmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1998-01-01','','unistudent',NULL,NULL,'2','555','alumni',NULL,'Acting','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,'graziella','rahme','g.rahme@gmail.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','F','2021-08-19',NULL,'teacher',NULL,NULL,'','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'Kareem','Savage','geqavagy@mailinator.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1971-01-03',NULL,'teacher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'55','https://www.jeloby.me.uk',NULL,NULL,NULL,NULL,1,2,1,'Nixon Fulton Co','Sit maxime magna in ','Sint ea amet praese'),(37,'Desiree','Rodriquez','sugujegaw@mailinator.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','F','1979-11-19',NULL,'teacher',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'27','https://www.boqofojerecimi.cm',NULL,NULL,NULL,NULL,1,2,1,'Bradley and Christian Associates','Aliquam eveniet cor','Culpa ut sapiente pa'),(38,'Anastasia','Burns','bysijola@mailinator.com','$2y$10$rDFAmX1tpdgN5W29eOc2FOrTcyZ/9RkNsjAPVl/L5EHBZsIHovSH.','M','1980-07-08',NULL,'prospective',11,'Erich Mercer',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'03721112','https://www.ruzavamiwopi.tv',NULL,NULL,NULL,NULL,1,2,3,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_university`
--

DROP TABLE IF EXISTS `user_university`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_university` (
  `user_university_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `university_id` varchar(255) NOT NULL,
  PRIMARY KEY (`user_university_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_university`
--

LOCK TABLES `user_university` WRITE;
/*!40000 ALTER TABLE `user_university` DISABLE KEYS */;
INSERT INTO `user_university` VALUES (1,18,'2'),(2,18,'3'),(3,27,'1'),(4,27,'2'),(5,27,'3'),(6,29,'1'),(7,29,'2'),(8,30,'1'),(9,30,'2'),(10,34,'2'),(11,37,'1'),(12,37,'2'),(13,37,'3');
/*!40000 ALTER TABLE `user_university` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-04  7:27:17
