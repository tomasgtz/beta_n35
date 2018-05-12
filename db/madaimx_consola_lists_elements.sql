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
-- Table structure for table `lists_elements`
--

DROP TABLE IF EXISTS `lists_elements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lists_elements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `list_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `list_id` (`list_id`),
  CONSTRAINT `lists_elements_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `lists_elements_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lists_elements_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lists_elements_ibfk_4` FOREIGN KEY (`list_id`) REFERENCES `lists` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lists_elements`
--

LOCK TABLES `lists_elements` WRITE;
/*!40000 ALTER TABLE `lists_elements` DISABLE KEYS */;
INSERT INTO `lists_elements` VALUES (1,'Transferencia',1,'2018-04-25 21:42:37',1,'2018-04-25 21:57:44',1,1),(2,'Depósito',1,'2018-04-25 21:42:45',1,'2018-04-25 21:57:44',1,1),(3,'Paypal',1,'2018-04-25 21:42:52',1,'2018-04-25 21:57:44',1,1),(4,'Tarjeta',1,'2018-04-25 21:42:53',1,'2018-04-25 21:57:45',1,1),(5,'Diseño',2,'2018-04-25 22:01:34',1,'2018-04-25 22:01:34',1,1),(6,'Impresión',2,'2018-04-25 22:02:17',1,'2018-04-25 22:02:17',1,1),(7,'Manufactura',2,'2018-04-25 22:02:34',1,'2018-04-25 22:02:34',1,1),(8,'En ruta',2,'2018-04-25 22:02:49',1,'2018-04-25 22:03:41',1,1),(9,'Entregado',2,'2018-04-25 22:03:40',1,'2018-04-25 22:03:40',1,1),(10,'Diseño',3,'2018-04-25 22:28:04',1,'2018-04-25 22:28:47',1,1),(11,'Impresión en resina',3,'2018-04-25 22:28:15',1,'2018-05-06 07:19:59',1,1),(12,'Vaciado en crudo',3,'2018-04-25 22:28:27',1,'2018-05-06 07:19:59',1,1),(13,'Borrador',2,'2018-05-01 09:22:06',1,'2018-05-01 09:22:06',1,1),(14,'normal',4,'2018-05-05 06:30:31',1,'2018-05-05 06:30:31',1,1),(15,'admin',4,'2018-05-05 06:30:31',1,'2018-05-05 06:30:31',1,1),(16,'Pieza terminada (Montado y Pulido)',3,'2018-05-06 07:19:26',1,'2018-05-06 07:19:26',1,1);
/*!40000 ALTER TABLE `lists_elements` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `ListsElementsBeforeInsert` BEFORE INSERT ON `lists_elements` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `ListsElementsBeforeUpdate` BEFORE UPDATE ON `lists_elements` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 16:00:14
