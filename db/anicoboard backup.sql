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
  CONSTRAINT `fk_articles_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Lorem ipsum dolor sit amet, consectetur adipisicing elit','2017-11-08',1),(2,'Aut saepe sint perferendis libero quos distinctio ','2017-11-09',2),(3,'dignissimos perspiciatis. Veniam, hic, sint! Rem odio quae delectus et','2017-11-07',4),(4,'fuga aliquid cum eaque laudantium quibusdam, iste natus, veritatis ratione','2017-11-10',3),(5,'suscipit repellat perferendis cupiditate eos.','2017-11-06',1),(6,' laudantium quibusdam, iste natus, veritatis ratione','2017-11-11',3),(7,'eritatis ratione','2017-11-16',2),(8,'내용을 입력해봅니다.','2017-11-17',4),(9,'다시 내용을 입력해봅니다.','2017-11-17',4),(10,'Idol Legend Eriko.','2017-11-17',4),(11,'Yosino sakura !!!','2017-11-18',4),(12,'ERROR!!!','2017-11-18',1),(13,'Windows girl~','2017-11-18',5),(14,'Animation Pero Android.','2017-11-18',5),(15,'FireFox browser.','2017-11-18',4),(16,'ORDER BY column DESC 로 내림차순으로 정렬하여 id열의 내림차순으로 항상 최신 글이 먼저 오고  먼저쓴글이 나중으로 오게 하였습니다.','2017-11-18',1),(17,'ORDER BY column DESC 을 테스트 합니다. PHP Camp.','2017-11-18',1),(18,'ORDER BY column DESC 을 테스트 합니다. ','2017-11-18',4),(19,'test','2017-11-18',1),(20,'PHP camp 열심히 공부합시다.','2017-11-18',2),(21,'Composer Logo','2017-11-18',2),(22,'No image test','2017-11-18',6),(23,'No image test','2017-11-18',5),(24,'MAC MINI','2017-11-18',6),(25,'신무월의 무녀. Kannazuki no miko.','2017-11-18',6),(26,'TSUKISHIRO ALICE DACAPO Second session.','2017-11-18',1),(27,'DACAPO for SHUFFLE','2017-11-18',1),(28,'Planetarian - Hosino Yumemi','2017-11-18',1),(29,'Microsoft','2017-11-18',6),(30,'Computer Bootstrap in Layout Guide.','2017-11-18',1),(31,'2017 Miku Expo in sword fancy. Collection.','2017-11-18',3),(32,'우리의 PHP 걸이네요~~! ELEPHANT GIRL ~','2017-11-18',3),(33,'KOTORI, NEMU,  AISIA.','2017-11-19',3),(34,'error','2017-11-20',1),(35,'진심으로 ERROR. Debug.','2017-11-20',7),(36,'foundation CSS Framework.','2017-11-20',7),(37,'생활코딩','2017-11-20',7),(38,'Memory SAMSUNG','2017-11-21',7),(39,'SEGA','2017-11-23',1),(40,'Android.','2017-11-23',11),(41,'Javascript girl~','2017-11-23',11),(42,'Kube Css FrameWork.','2017-11-24',12);
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
  KEY `fk_comments_articles1_idx` (`articles_id`),
  CONSTRAINT `fk_comments_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'30 번 내용에 달립니다.',1,30),(2,'일단은',2,32),(3,'Dacapo 너무 귀엽고 재밌어요.',3,33),(4,'세계를 바꾼 기업',4,29),(5,'나는 MS 안티임.',5,29),(6,'자유의 여신상.',6,2),(7,'Agra 타지마할 궁전.',3,1),(8,'Dacapo SS Kotori',4,3),(9,'두바이~ 부르츠 칼리파.',2,4),(10,'요세미티 산. MAC Thema.',1,5),(11,'시에라 산. Computer의 상징적인 곳.',5,7),(12,'MiKu Kawaii',4,31),(13,'test comments insert for article id 20',3,20),(14,'32번에 달려요.',4,32),(15,'test comments insert for article id 33',3,33),(16,'안녕하세요 테스트 댓글입니다.',3,20),(17,'첫 코멘트를 달아봅니다. Debug 인생.',7,35),(18,'Debug~~',1,35),(19,'안녕하세요 테스트요',1,34),(20,'이제 내용에 달려요',1,23),(21,'Hiroin SIRAKAWA',1,6),(22,'토에이 페로',1,14),(23,'ERROR~~~',1,34),(24,'잘들어오네요.',1,34),(25,'ERROR falid ~~~~',7,35),(26,'정말로 좋은거 많이 배워 갑니다. 감사합니다.',1,37),(27,'플라네타리움에 어서오세요. \"나는 눈물을 흘리지 않는 로봇이니까요\"',7,28),(28,'때없는 사람들의 노고위에 지어진 컴퓨터 문명.',3,38),(29,'Genesis 명품',11,39),(30,'test',12,41),(31,'test',12,41),(32,'안녕하세요',12,41);
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
  CONSTRAINT `fk_follows_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (1,3,'Yosemite',7),(2,7,'Leodays',2),(3,3,'Leodays',2),(4,3,'NaraLee',1),(5,1,'Highwind',3),(6,7,'Highwind',3),(7,4,'Highwind',3),(8,6,'Highwind',3),(9,5,'Highwind',3),(10,2,'NaraLee',1),(11,4,'NaraLee',1),(12,6,'NaraLee',1),(14,5,'NaraLee',1),(16,1,'datetime',11),(17,3,'leosdays26',5),(19,4,'leosdays26',5),(20,11,'leosdays26',5),(22,11,'Gmail',12),(23,1,'Gmail',12),(24,3,'Gmail',12),(25,3,'Laravel',4);
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
  CONSTRAINT `fk_likes_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_likes_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,10,1,1),(2,20,2,2),(3,30,1,3),(4,40,2,4),(5,50,1,5),(6,100,3,6),(7,10,1,7),(8,20,2,8),(9,30,1,9),(10,40,2,10),(11,50,1,11),(12,100,3,12),(13,10,1,13),(14,20,2,14),(15,30,1,15),(16,10,1,16),(17,20,2,17),(18,10,1,18),(19,20,2,19),(20,30,1,20),(21,40,2,21),(22,50,1,22),(23,100,3,23),(24,10,1,24),(25,20,2,25),(26,30,1,26),(27,40,2,27),(28,50,1,28),(29,100,3,29),(30,10,1,30),(31,20,2,31);
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
  CONSTRAINT `fk_pictuers_articles1` FOREIGN KEY (`articles_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pictures`
--

LOCK TABLES `pictures` WRITE;
/*!40000 ALTER TABLE `pictures` DISABLE KEYS */;
INSERT INTO `pictures` VALUES (1,'img/image/img0.png',1),(2,'img/image/img1.png',2),(3,'img/image/img2.png',4),(4,'img/image/img3.png',3),(5,'img/image/img4.png',1),(6,'img/image/img5.png',3),(7,'img/image/img6.png',2),(8,'img/image/img005.jpg',4),(9,'img/image/img003.jpg',4),(10,'img/image/image014.jpg',4),(11,'img/image/logo.jpg',4),(12,'img/image/Vocaloid0003.jpg',1),(13,'img/image/windowsgirl06.jpg',5),(14,'img/image/image012.jpg',5),(15,'img/image/image20.jpg',4),(16,'img/image/image005.jpg',1),(17,'img/image/image001.jpg',1),(18,'img/image/image001.jpg',4),(19,'img/image/image16.jpg',1),(20,'img/image/Screenshot 2017-10-19 at 00.21.09.png',2),(21,'img/image/Screenshot 2017-10-20 at 13.25.36.png',2),(22,'img/image/Screenshot 2017-10-20 at 13.25.14.png',6),(23,'img/image/usericon01.png',6),(24,'img/image/usericon01.png',6),(25,'img/image/kannazuki no miko.png',6),(26,'img/image/dacapo14.jpg',1),(27,'img/image/dacapo12.jpg',1),(28,'img/image/img049.jpg',1),(29,'img/image/img017.jpg',6),(30,'img/image/img100.jpg',1),(31,'img/image/img097.jpg',3),(32,'img/image/php.jpg',3),(33,'img/image/dacapo05.jpg',3),(34,'img/image/Vocaloid0003.jpg',1),(35,'img/image/Vocaloid0003.jpg',7),(36,'img/image/image18.jpg',7),(37,'img/image/WebLogo14.png',7),(38,'img/image/img008.jpg',7),(39,'img/image/img033.jpg',1),(40,'img/image/image012.jpg',11),(41,'img/image/javascript.jpg',11),(42,'img/image/image30.jpg',12);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'stonker@gmail.com','이나라','NaraLee','$2y$11$XI1y4aMw9chvpE1F5sfRK.QsVhIbJ/offrYVUlRaBO/nrxiu/1p6u','img/icon/user/usericon00.png'),(2,'highwind26@gmail.com','이승훈','Leodays','$2y$11$/9d2me1vcU3zOSyrGqPpSumAtjTFLViyX6P1DCf6fEwt4nPvnEH0K','img/icon/user/usericon01.png'),(3,'highwind26@nate.com','이데이','Highwind','$2y$11$ypgWxRCBoQDFbPCl.EPpAuiTPWewIRhy/2f5QPjdMSpNbDeUjAY5.','img/icon/user/usericon02.png'),(4,'highwind26@naver.com','이만화','Laravel','$2y$11$aB.YaarfV.GnbpOYzMTeFuzgLWSFmcYeaOOkwZrhKNL5rV2jg7Kbq','img/icon/user/usericon03.png'),(5,'leosdays@gmail.com','이레오','leosdays26','$2y$11$a880ZshgkR0b8xYPZ6BeNeaCz1iec5.xeIXBPQjAd2RJ89dd5y6P2','img/icon/user/img019.jpg'),(6,'leechar@gmail.com','리차르','CharLee','$2y$11$kqJpAh1qUDJovX9uqsDsbuRCQFyCa9FWOfgrxdCGV2ijhbaox59Ha','img/icon/user/usericon05.png'),(7,'yosemite@gmail.com','이요세','Yosemite','$2y$11$.1OIkXog0nb5gkydreQ9Pele4q6V9R59Z6/eaH4DpitEGdjnGn.tu','img/icon/user/usericon06.png'),(11,'datetime@gmail.com','데이터리','datetime','$2y$11$vRXT0IrtkEJ3Ed2oQ20i/.TvUU9wek2C7AhBCEX1NwFx.Umi1A4Va','img/icon/user/image012.jpg'),(12,'gmail@gmail.com','지메일','Gmail','$2y$11$IVT0mr3MLlXiITkKH0a9vemCw2wlE3XGe9kh12N48xtFKMIuORSxe','img/icon/user/image003.jpg');
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

-- Dump completed on 2017-11-24 20:26:07
