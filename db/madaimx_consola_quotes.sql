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
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_phone` varchar(150) DEFAULT NULL,
  `comments` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `branch_id` (`branch_id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `id` (`id`),
  CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `quotes_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `quotes_ibfk_3` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `quotes_ibfk_4` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (10,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 11:00:37',1,'2018-05-01 08:08:54',1,1),(14,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:08:33',1,'2018-05-01 08:09:24',1,1),(18,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:18:49',1,'2018-05-01 08:09:24',1,1),(19,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:25:56',1,'2018-05-01 08:09:24',1,1),(25,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:46:04',1,'2018-05-01 08:09:25',1,1),(29,'Jaime','jrodriguez@abc.com','8123242022','Comentarios',1,'2018-05-02 21:30:45',1,'2018-05-02 21:30:45',1,1),(30,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',1,'2018-05-02 21:36:05',1,'2018-05-02 21:36:05',1,1),(31,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',1,'2018-05-02 21:36:24',1,'2018-05-02 21:36:24',1,1),(32,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',1,'2018-05-02 21:42:23',1,'2018-05-02 21:42:23',1,1),(33,'Tom','tomasgtz2@abc.com','8123200000','Cotizacion de prueba',1,'2018-05-09 21:57:20',1,'2018-05-09 21:57:20',1,1),(34,'Angel Gutierrez','tomasgtz2@abc.com','8123200000','Cotizacion de prueba',1,'2018-05-09 21:57:49',1,'2018-05-09 21:57:49',1,1),(35,'Juan Lopez H','tomasgtz2@abc.com','8123200000','Cotizacion de prueba',1,'2018-05-09 21:58:14',1,'2018-05-09 21:58:14',1,1),(36,'Luz Maria Velazquez','tomasgtz2@abc.com','8123200000','Cotizacion de prueba',1,'2018-05-09 21:58:43',1,'2018-05-09 21:58:43',1,1),(37,'Maria Mendez ','tomasgtz2@abc.com','80205050','Cotizacion de prueba',1,'2018-05-09 21:59:17',1,'2018-05-09 21:59:17',1,1),(38,'Sonia Smith ','smith@abc.com','80205050','Cotizacion de prueba',1,'2018-05-09 21:59:58',1,'2018-05-09 21:59:58',1,1),(39,'Ricardo Palmerin','smith@abc.com','80205050','Cotizacion de prueba',1,'2018-05-10 14:29:10',1,'2018-05-10 14:29:10',1,1),(40,'Margarita Lopez','mlopez@abc.com','784535109','Cotizacion de prueba 20180512',1,'2018-05-12 13:33:42',1,'2018-05-12 13:33:42',1,1);
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `QuotesBeforeInsert` BEFORE INSERT ON `quotes` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `QuotesBeforeUpdate` BEFORE UPDATE ON `quotes` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 15:59:40
