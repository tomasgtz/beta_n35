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
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `iso_code_3` char(3) NOT NULL DEFAULT '',
  `country_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `states_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `states_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `states_ibfk_4` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Aguascalientes','AGS',138,'2018-04-25 20:46:48',1,'2018-04-25 20:46:48',1,1),(2,'Baja California','BCN',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(3,'Baja California Sur','BCS',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(4,'Campeche','CAM',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(5,'Chiapas','CHP',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(6,'Chihuahua','CHI',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(7,'Ciudad de México','DIF',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(8,'Coahuila','COA',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(9,'Colima','COL',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(10,'Durango','DUR',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(11,'Guanajuato','GTO',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(12,'Guerrero','GRO',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(13,'Hidalgo','HGO',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(14,'Jalisco','JAL',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(15,'México','MEX',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(16,'Michoacán','MIC',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(17,'Morelos','MOR',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(18,'Nayarit','NAY',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(19,'Nuevo León','NLE',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(20,'Oaxaca','OAX',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(21,'Puebla','PUE',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(22,'Querétaro','QRO',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(23,'Quintana Roo','ROO',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(24,'San Luis Potosí','SLP',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(25,'Sinaloa','SIN',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(26,'Sonora','SON',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(27,'Tabasco','TAB',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(28,'Tamaulipas','TAM',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(29,'Tlaxcala','TLX',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(30,'Veracruz','VER',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(31,'Yucatán','YUC',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(32,'Zacatecas','ZAC',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `StatesBeforeInsert` BEFORE INSERT ON `states` FOR EACH ROW BEGIN
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
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `StatesBeforeUpdate` BEFORE UPDATE ON `states` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 15:59:37
