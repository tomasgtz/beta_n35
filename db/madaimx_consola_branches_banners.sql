-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: cadcam-mty.com.mx    Database: madaimx_consola
-- ------------------------------------------------------
-- Server version	5.6.32-78.1

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
-- Table structure for table `branches_banners`
--

DROP TABLE IF EXISTS `branches_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches_banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `url_banner` varchar(150) NOT NULL DEFAULT '',
  `text1` varchar(255) DEFAULT '0',
  `text2` varchar(255) DEFAULT '',
  `text3` varchar(255) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `branch_id` (`branch_id`),
  CONSTRAINT `branches_banners_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `branches_banners_ibfk_3` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_banners_ibfk_4` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_banners_ibfk_5` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches_banners`
--

LOCK TABLES `branches_banners` WRITE;
/*!40000 ALTER TABLE `branches_banners` DISABLE KEYS */;
INSERT INTO `branches_banners` VALUES (10,'desc','BranchBanner20180511215459ring.jpg','t1','','',1,'2018-05-11 21:54:59',1,'2018-05-11 21:54:59',1,1),(11,'desc','BranchBanner20180512101617download.png','text1','text2','text3',1,'2018-05-12 10:16:17',1,'2018-05-12 10:17:32',1,2);
/*!40000 ALTER TABLE `branches_banners` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.162.139.%`*/ /*!50003 TRIGGER `BranchesBannersBeforeInsert` BEFORE INSERT ON `branches_banners`
 FOR EACH ROW BEGIN
   SET NEW.created = NOW();
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.162.139.%`*/ /*!50003 TRIGGER `BranchesBannersBeforeUpdate` BEFORE UPDATE ON `branches_banners`
 FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-12 15:59:51
