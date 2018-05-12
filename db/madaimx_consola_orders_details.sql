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
-- Table structure for table `orders_details`
--

DROP TABLE IF EXISTS `orders_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_number` varchar(150) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_cadcam` decimal(10,2) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `order_id` (`order_id`),
  KEY `id` (`id`),
  CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_details_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_details_ibfk_4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

LOCK TABLES `orders_details` WRITE;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
INSERT INTO `orders_details` VALUES (8,'anillo 001','CON DESCRIPcion',10,1.00,0.65,12,'2018-05-01 16:25:22',1,'2018-05-12 13:39:09',1,1),(9,'modelo1','descripcion modelo1',1,150.00,97.50,13,'2018-05-01 17:54:22',1,'2018-05-12 13:39:09',1,1),(10,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,650.00,16,'2018-05-04 20:46:14',1,'2018-05-12 13:39:09',1,1),(12,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,650.00,19,'2018-05-04 21:08:18',1,'2018-05-12 13:39:09',1,1),(13,'m1','d1',1,100.00,65.00,20,'2018-05-04 22:42:59',1,'2018-05-12 13:39:09',1,1),(14,'modelo1','desc1',1,100.00,65.00,21,'2018-05-05 06:01:02',1,'2018-05-12 13:39:09',1,1),(15,'modelo1','Descripcion de pieza modificada',1,100.00,65.00,22,'2018-05-05 06:02:05',1,'2018-05-12 13:39:09',1,1),(16,'modelo1','Descripcion de pieza modificada',1,100.00,65.00,24,'2018-05-05 06:05:50',1,'2018-05-12 13:39:09',1,1),(17,'modelo1','Descripcion de pieza modificada',1,100.00,65.00,26,'2018-05-05 06:06:29',1,'2018-05-12 13:39:09',1,1),(18,'modelo1','Descripcion de pieza modificada',1,100.00,65.00,28,'2018-05-05 06:08:04',1,'2018-05-12 13:39:09',1,1),(19,'modelo 1','descripcion de la pieza',1,1500.00,975.00,29,'2018-05-05 09:35:21',1,'2018-05-12 13:39:09',1,1),(20,'AD-05','Anillo blanco',1,1500.00,975.00,11,'2018-05-06 07:54:30',1,'2018-05-12 13:39:09',1,1);
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `OrdersDetailsBeforeInsert` BEFORE INSERT ON `orders_details` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `OrdersDetailsBeforeUpdate` BEFORE UPDATE ON `orders_details` FOR EACH ROW BEGIN
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

-- Dump completed on 2018-05-12 15:59:32
