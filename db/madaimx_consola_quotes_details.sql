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
-- Table structure for table `quotes_details`
--

DROP TABLE IF EXISTS `quotes_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_number` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_cadcam` decimal(10,2) DEFAULT NULL,
  `quote_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `quote_id` (`quote_id`),
  CONSTRAINT `quotes_details_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `quotes_details_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `quotes_details_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `quotes_details_ibfk_4` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes_details`
--

LOCK TABLES `quotes_details` WRITE;
/*!40000 ALTER TABLE `quotes_details` DISABLE KEYS */;
INSERT INTO `quotes_details` VALUES (1,'','',0,0.00,0.00,14,'2018-04-28 11:08:34',1,'2018-05-12 13:38:50',1,1),(2,'anillo 001','Sin descripción',1,1.00,0.65,18,'2018-04-28 11:18:49',1,'2018-05-12 13:38:50',1,1),(3,'anillo 001','Sin descripción',1,1.00,0.65,19,'2018-04-28 11:25:57',1,'2018-05-12 13:38:50',1,1),(4,'anillo 001','Sin descripción',10,1.00,0.65,25,'2018-04-28 11:46:04',1,'2018-05-12 13:38:50',1,1),(5,'anillo 001','CON DESCRIPcion',10,1.00,0.65,9,'2018-04-28 11:48:25',1,'2018-05-12 13:38:50',1,1),(6,'anillo 001','Descripcion de pieza',10,150.50,97.83,10,'2018-04-28 11:49:20',1,'2018-05-12 13:38:50',1,1),(7,'anillo 001','CON DESCRIPcion',10,1.00,0.65,29,'2018-05-02 21:30:45',1,'2018-05-12 13:38:50',1,1),(8,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,650.00,30,'2018-05-02 21:36:05',1,'2018-05-12 13:38:50',1,1),(9,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,650.00,31,'2018-05-02 21:36:25',1,'2018-05-12 13:38:50',1,1),(10,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,650.00,32,'2018-05-02 21:42:23',1,'2018-05-12 13:38:50',1,1),(11,'001','Anillo de bodas',1,1000.00,650.00,33,'2018-05-09 21:57:20',1,'2018-05-12 13:38:50',1,1),(12,'001','Anillo de compromiso',1,17000.00,11050.00,34,'2018-05-09 21:57:49',1,'2018-05-12 13:38:50',1,1),(13,'001','Anillo oro amarillo',1,17500.00,11375.00,35,'2018-05-09 21:58:14',1,'2018-05-12 13:38:50',1,1),(14,'018','Anillo oro blanco',1,17500.00,11375.00,36,'2018-05-09 21:58:43',1,'2018-05-12 13:38:50',1,1),(15,'019','Anillo delgado',1,1500.00,975.00,37,'2018-05-09 21:59:17',1,'2018-05-12 13:38:50',1,1),(16,'029','Pieza terminada en oro blanco',1,15000.00,9750.00,38,'2018-05-09 21:59:58',1,'2018-05-12 13:38:50',1,1),(17,'058','Pieza pulida en oro blanco',1,15300.00,9945.00,39,'2018-05-10 14:29:10',1,'2018-05-12 13:38:50',1,1),(18,'059','Pieza pulida en oro blanco',1,17300.00,11245.00,40,'2018-05-12 13:33:42',1,'2018-05-12 13:38:50',1,1);
/*!40000 ALTER TABLE `quotes_details` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `QuotesDetailsBeforeInsert` BEFORE INSERT ON `quotes_details` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `QuotesDetailsBeforeUpdate` BEFORE UPDATE ON `quotes_details` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 16:00:01
