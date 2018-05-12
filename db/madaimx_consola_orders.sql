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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(150) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_phone` varchar(150) DEFAULT NULL,
  `comments` text,
  `payment_url` varchar(255) DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `estimated_delivery_date` date DEFAULT NULL,
  `quote_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payments_type_id` int(11) NOT NULL,
  `orders_phase_id` int(6) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime NOT NULL,
  `modified_user_id` int(11) DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `quote_id_2` (`quote_id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `quote_id` (`quote_id`),
  KEY `branch_id` (`branch_id`),
  KEY `id` (`id`),
  KEY `orders_ibfk_7` (`orders_phase_id`),
  KEY `orders_ibfk_6` (`payments_type_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`quote_id`) REFERENCES `quotes` (`id`),
  CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`payments_type_id`) REFERENCES `lists_elements` (`id`),
  CONSTRAINT `orders_ibfk_7` FOREIGN KEY (`orders_phase_id`) REFERENCES `lists_elements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (11,'José','a','8123242022','Sin comentarios',NULL,'','2018-05-29',10,1,1,13,'2018-05-01 14:39:58',5,'2018-05-11 11:57:30',1,2),(12,'José','jose@sucursal01.com','8123242022','Sin comentarios\r\nya esta procesandose el pedido','CoverLetter._Orden_12_20180501234858.pdf','','2018-05-10',9,1,1,6,'2018-05-01 16:25:22',1,'2018-05-04 21:11:18',1,1),(13,'José','jose@sucursal01.com','8123242022','Sin comentarios\r\nTu pedido ya esta listo, se enviará mañana','CoverLetter._Orden_13_20180502011756.pdf','Sr. XXXXX YYYYY','2018-05-31',8,1,1,5,'2018-05-01 17:54:21',1,'2018-05-02 19:55:49',1,1),(16,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',NULL,NULL,NULL,31,1,2,5,'2018-05-04 20:46:14',1,'2018-05-04 20:46:14',1,1),(19,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',NULL,NULL,NULL,32,1,1,5,'2018-05-04 21:08:18',1,'2018-05-04 21:08:18',1,1),(20,'José','jose@sucursal01.com','8123242022','Sin comentarios',NULL,NULL,NULL,1,1,1,5,'2018-05-04 22:42:59',1,'2018-05-04 22:42:59',1,1),(21,'José','jose@sucursal01.com','8123242022','Sin comentarios',NULL,NULL,NULL,6,1,1,5,'2018-05-05 06:01:02',1,'2018-05-05 06:01:02',1,1),(22,'José','jose@sucursal01.com','8123242022','Sin comentarios',NULL,NULL,NULL,7,1,1,5,'2018-05-05 06:02:05',1,'2018-05-05 06:02:05',1,1),(24,'José','jose@sucursal01.com','8123242022','Sin comentarios',NULL,NULL,NULL,2,1,1,5,'2018-05-05 06:05:50',1,'2018-05-05 06:05:50',1,1),(26,'José','jose@sucursal01.com','8123242022','Sin comentarios',NULL,NULL,NULL,3,1,1,5,'2018-05-05 06:06:29',1,'2018-05-05 06:06:29',1,1),(28,'José','jose@sucursal01.com','8123242022','Sin comentarios','foto._Orden_28_20180505060804.png',NULL,NULL,4,1,1,5,'2018-05-05 06:08:04',1,'2018-05-05 06:08:04',1,1),(29,'José','jose@sucursal01.com','8123242022','Sin comentarios\r\nYA esta en proceso, se espera recibir la resina en x fecha','DevOps For Dummies._Orden_29_20180505093521.pdf','Miguel Angel Ortiz','2018-06-19',5,1,2,7,'2018-05-05 09:35:21',1,'2018-05-05 09:57:12',1,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `OrdersBeforeInsert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `OrdersBeforeUpdate` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 15:59:47
