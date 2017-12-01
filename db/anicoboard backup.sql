-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: anicoboard
-- ------------------------------------------------------
-- Server version	5.7.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article` text NOT NULL,
  `date` date DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articles_users_idx` (`users_id`),
  CONSTRAINT `fk_articles_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Statue of Liberty - 자유의 여신상.','2017-11-09',1),(2,'Sirakawa.','2017-11-07',3),(3,'부르츠 칼리파. - Samsung builds up','2017-11-10',2),(4,'Sirakawa Kotori - Dacapo EXP in Love.','2017-11-06',2),(5,'Yosemite Sierra.','2017-11-11',1),(6,'Saint Jone -  St. John\'s Cathedral','2017-11-16',3),(7,'Fractal image - Structure Core image','2017-11-17',3),(8,'idol Legend Eriko.','2017-11-17',3),(9,'Yosino Sakura. Candy POP.','2017-11-17',3),(10,'Windows Girl HIKARU','2017-11-18',4),(11,'Toei Animation Android.','2017-11-18',4),(12,'Animation In fireFox Girl','2017-11-18',3),(13,'Bitnami Application.','2017-11-18',3),(14,'ORDER BY column DESC 을 테스트 합니다.  PHP Boot Camp','2017-11-18',1),(15,'Composer Logo','2017-11-18',1),(16,'PHP camp 열심히 공부합시다. Laravel Frame Work','2017-11-18',5),(17,'MAC Mini','2017-11-18',5),(18,'신무월의 무녀. KAnnazuki No Miko','2017-11-18',5),(19,'MicroSoft LOGO','2017-11-18',5),(20,'MIKU EXPO 2017','2017-11-18',6),(22,'DACAPO in Love KOTORI NEMU AISIA','2017-11-18',2),(23,'ERROR MIKU','2017-11-18',6),(24,'Foundation CSS FrameWork','2017-11-18',6),(25,'생활코딩','2017-11-18',6),(26,'삼성 메모리','2017-11-18',6),(27,'토에이 페로','2017-11-19',10),(28,'자바스크립트 걸','2017-11-20',10),(31,'C#','2017-11-30',1),(35,'Program girl 시리즈 - PHP','2017-11-30',1),(36,'저도 글을 써봅니다.','2017-11-30',11),(38,'페이지를 넘겨보기위해 테스트 글을 작성합니다.','2017-12-02',4);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(255) NOT NULL,
  `users_id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_users1_idx` (`users_id`),
  KEY `fk_comments_articles1_idx` (`articles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'토에이 에니는 좋아요.',1,11),(2,'test',1,28),(3,'PHP 걸',1,35),(4,'두바이의 신화',1,3),(5,'PHP 걸 댓글이 잘달리나요?',1,35),(6,'C# 걸도 잘달리나요?',1,31),(7,'제가 보기엔 잘 달리는거 같네요',11,31);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `follows` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow` int(11) NOT NULL,
  `follower` varchar(50) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_follows_users1_idx` (`users_id`),
  CONSTRAINT `fk_follows_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,3,'Yosemite',7),(2,7,'Leodays',2),(3,3,'Leodays',2),(4,3,'NaraLee',1),(5,1,'Highwind',3),(6,7,'Highwind',3),(7,4,'Highwind',3),(9,5,'Highwind',3),(10,2,'NaraLee',1),(11,4,'NaraLee',1),(12,6,'NaraLee',1),(14,5,'NaraLee',1),(16,1,'datetime',8),(17,3,'leosdays26',5),(19,4,'leosdays26',5),(20,11,'leosdays26',5),(22,11,'Gmail',9),(23,1,'Gmail',9),(24,3,'Gmail',9),(25,3,'Laravel',4),(27,12,'NaraLee',1),(29,6,'Gmail',9),(30,5,'Gmail',9),(32,12,'maydays',10),(33,5,'maydays',10),(34,13,'NaraLee',1),(35,11,'NaraLee',1),(36,7,'NaraLee',1),(37,13,'MailLee',11),(38,5,'MailLee',11),(39,7,'MailLee',11),(42,14,'Highwind',3),(44,14,'Laravel',4),(45,12,'MailLee',11),(46,3,'MailLee',11),(47,13,'Laravel',4),(48,10,'NaraLee',1),(49,8,'NaraLee',1),(50,9,'NaraLee',1),(51,4,'MailLee',11),(52,11,'Laravel',4),(53,6,'Laravel',4),(54,9,'Laravel',4),(55,1,'MailLee',11),(56,2,'MailLee',11),(57,11,'Leodays',2);
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `like` tinyint(10) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_likes_users1_idx` (`users_id`),
  KEY `fk_likes_articles1_idx` (`articles_id`),
  CONSTRAINT `fk_likes_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_likes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (2,1,2,1),(3,1,1,2),(4,1,2,3),(5,1,1,4),(6,1,3,5),(7,1,1,6),(8,1,2,7),(9,1,1,8),(10,1,2,9),(11,1,1,10),(13,1,1,11),(14,1,2,12),(15,1,1,13),(18,1,1,14),(19,1,2,15),(20,1,1,16),(21,1,2,17),(22,1,1,18),(23,1,3,19),(25,1,2,20),(27,1,2,22),(28,1,1,23),(29,1,3,24),(31,1,11,25),(32,1,11,36),(33,1,11,35),(36,1,4,27),(39,1,4,11),(42,1,4,36),(43,1,4,38),(44,1,4,35);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pictuers_articles1_idx` (`articles_id`),
  CONSTRAINT `fk_pictuers_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (1,'img/image/img1.png',1),(2,'img/image/img2.png',2),(3,'img/image/img3.png',3),(4,'img/image/img5.png',4),(5,'img/image/img6.png',5),(6,'img/image/img005.jpg',6),(7,'img/image/img003.jpg',7),(8,'img/image/image014.jpg',8),(9,'img/image/logo.jpg',9),(10,'img/image/windowsgirl06.jpg',10),(11,'img/image/image012.jpg',11),(12,'img/image/image20.jpg',12),(13,'img/image/image001.jpg',13),(14,'img/image/Screenshot 2017-10-19 at 00.21.09.png',14),(15,'img/image/Screenshot 2017-10-20 at 13.25.36.png',15),(16,'img/image/Screenshot 2017-10-20 at 13.25.14.png',16),(17,'img/image/usericon01.png',17),(18,'img/image/kannazuki no miko.png',18),(19,'img/image/img017.jpg',19),(20,'img/image/img097.jpg',20),(22,'img/image/dacapo05.jpg',22),(23,'img/image/Vocaloid0003.jpg',23),(24,'img/image/image18.jpg',24),(25,'img/image/WebLogo14.png',25),(26,'img/image/img008.jpg',26),(27,'img/image/image012.jpg',27),(28,'img/image/javascript.jpg',28),(31,'img/image/csharp.jpg',31),(35,'img/image/php.jpg',35),(36,'img/image/img025.jpg',36),(38,'img/image/img006.jpg',38);
/*!40000 ALTER TABLE `pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `name` varchar(45) NOT NULL,
  `author` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usericon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'stonker@gmail.com','이나라','NaraLee','$2y$11$XI1y4aMw9chvpE1F5sfRK.QsVhIbJ/offrYVUlRaBO/nrxiu/1p6u','img/icon/user/usericon00.png'),(2,'highwind26@gmail.com','이승훈','Leodays','$2y$11$/9d2me1vcU3zOSyrGqPpSumAtjTFLViyX6P1DCf6fEwt4nPvnEH0K','img/icon/user/img089.jpg'),(3,'highwind26@nate.com','이데이','Highwind','$2y$11$ypgWxRCBoQDFbPCl.EPpAuiTPWewIRhy/2f5QPjdMSpNbDeUjAY5.','img/icon/user/dacapo05.jpg'),(4,'highwind26@naver.com','이만화','Laravel','$2y$11$aB.YaarfV.GnbpOYzMTeFuzgLWSFmcYeaOOkwZrhKNL5rV2jg7Kbq','img/icon/user/image20.jpg'),(5,'leosdays@gmail.com','이레오','leosdays26','$2y$11$a880ZshgkR0b8xYPZ6BeNeaCz1iec5.xeIXBPQjAd2RJ89dd5y6P2','img/icon/user/img019.jpg'),(6,'leechar@gmail.com','리차르','CharLee','$2y$11$kqJpAh1qUDJovX9uqsDsbuRCQFyCa9FWOfgrxdCGV2ijhbaox59Ha','img/icon/user/usericon05.png'),(7,'yosemite@gmail.com','이요세','Yosemite','$2y$11$.1OIkXog0nb5gkydreQ9Pele4q6V9R59Z6/eaH4DpitEGdjnGn.tu','img/icon/user/usericon06.png'),(8,'datetime@gmail.com','데이터리','datetime','$2y$11$vRXT0IrtkEJ3Ed2oQ20i/.TvUU9wek2C7AhBCEX1NwFx.Umi1A4Va','img/icon/user/image012.jpg'),(9,'gmail@gmail.com','지메일','Gmail','$2y$11$IVT0mr3MLlXiITkKH0a9vemCw2wlE3XGe9kh12N48xtFKMIuORSxe','img/icon/user/image003.jpg'),(10,'daysmays@naver.com','이메이','maydays','$2y$11$5UjBcBFcuiDYvMwblmQ16OtDwff.JkMLJcmEhTZ5EL1fModMHFnhS','img/icon/user/20319b4d51dc8726ce9658de9d422e7a--hair-and-nail-salon-hair-and-nails.jpg'),(11,'stonker26@gmail.com','이메일','MailLee','$2y$11$zVGRhzE.T7TqAMMOlzH/f.lJKRSKHYMC/Wm.03kGKVqvjQIbNF4Oq','img/icon/user/image009.jpg');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-02  1:21:12
