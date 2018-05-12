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
-- Table structure for table `orders_details_services`
--

DROP TABLE IF EXISTS `orders_details_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_details_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `orders_detail_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `status_id` (`status_id`),
  KEY `service_id` (`service_id`),
  KEY `orders_detail_idx` (`orders_detail_id`),
  CONSTRAINT `orders_details_services_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_details_services_ibfk_2` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_details_services_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `orders_details_services_ibfk_4` FOREIGN KEY (`orders_detail_id`) REFERENCES `orders_details` (`id`),
  CONSTRAINT `orders_details_services_ibfk_5` FOREIGN KEY (`service_id`) REFERENCES `lists_elements` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details_services`
--

LOCK TABLES `orders_details_services` WRITE;
/*!40000 ALTER TABLE `orders_details_services` DISABLE KEYS */;
INSERT INTO `orders_details_services` VALUES (4,10,8,'2018-05-01 16:25:23',1,'2018-05-01 16:25:23',1,1),(5,11,8,'2018-05-01 16:25:23',1,'2018-05-01 16:25:23',1,1),(6,12,9,'2018-05-01 16:25:23',1,'2018-05-01 18:21:10',1,1),(7,11,9,'2018-05-01 17:54:22',1,'2018-05-01 17:54:22',1,1),(8,10,10,'2018-05-04 20:46:14',1,'2018-05-04 20:46:14',1,1),(9,11,10,'2018-05-04 20:46:14',1,'2018-05-04 20:46:14',1,1),(10,12,10,'2018-05-04 20:46:14',1,'2018-05-04 20:46:14',1,1),(11,10,11,'2018-05-04 20:48:22',1,'2018-05-04 20:48:22',1,1),(12,11,11,'2018-05-04 20:48:22',1,'2018-05-04 20:48:22',1,1),(13,12,11,'2018-05-04 20:48:22',1,'2018-05-04 20:48:22',1,1),(14,10,12,'2018-05-04 21:08:18',1,'2018-05-04 21:08:18',1,1),(15,11,12,'2018-05-04 21:08:18',1,'2018-05-04 21:08:18',1,1),(16,12,12,'2018-05-04 21:08:18',1,'2018-05-04 21:08:18',1,1),(17,10,13,'2018-05-04 22:42:59',1,'2018-05-04 22:42:59',1,1),(18,11,13,'2018-05-04 22:42:59',1,'2018-05-04 22:42:59',1,1),(19,12,13,'2018-05-04 22:42:59',1,'2018-05-04 22:42:59',1,1),(20,10,14,'2018-05-05 06:01:02',1,'2018-05-05 06:01:02',1,1),(21,11,14,'2018-05-05 06:01:02',1,'2018-05-05 06:01:02',1,1),(22,12,14,'2018-05-05 06:01:02',1,'2018-05-05 06:01:02',1,1),(23,10,15,'2018-05-05 06:02:05',1,'2018-05-05 06:02:05',1,1),(24,11,15,'2018-05-05 06:02:05',1,'2018-05-05 06:02:05',1,1),(25,12,15,'2018-05-05 06:02:05',1,'2018-05-05 06:02:05',1,1),(26,10,16,'2018-05-05 06:05:50',1,'2018-05-05 06:05:50',1,1),(27,11,16,'2018-05-05 06:05:50',1,'2018-05-05 06:05:50',1,1),(28,12,16,'2018-05-05 06:05:50',1,'2018-05-05 06:05:50',1,1),(29,10,17,'2018-05-05 06:06:29',1,'2018-05-05 06:06:29',1,1),(30,11,17,'2018-05-05 06:06:29',1,'2018-05-05 06:06:29',1,1),(31,12,17,'2018-05-05 06:06:29',1,'2018-05-05 06:06:29',1,1),(32,10,18,'2018-05-05 06:08:04',1,'2018-05-05 06:08:04',1,1),(33,11,18,'2018-05-05 06:08:04',1,'2018-05-05 06:08:04',1,1),(34,12,18,'2018-05-05 06:08:04',1,'2018-05-05 06:08:04',1,1),(35,10,19,'2018-05-05 09:35:21',1,'2018-05-05 09:35:21',1,1),(36,11,19,'2018-05-05 09:35:21',1,'2018-05-05 09:35:21',1,1),(37,12,19,'2018-05-05 09:35:21',1,'2018-05-05 09:35:21',1,1);
/*!40000 ALTER TABLE `orders_details_services` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `OrdersDetailsServicessBeforeInsert` BEFORE INSERT ON `orders_details_services` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `OrdersDetailsServicesBeforeUpdate` BEFORE UPDATE ON `orders_details_services` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 16:00:06
