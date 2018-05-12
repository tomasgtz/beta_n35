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
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `due_date` datetime DEFAULT NULL,
  `phone` varchar(150) NOT NULL DEFAULT '',
  `access` tinyint(1) DEFAULT '0',
  `manager` varchar(150) NOT NULL DEFAULT '',
  `shopping_mall` varchar(150) DEFAULT NULL,
  `store_number` int(5) DEFAULT NULL,
  `rfc` varchar(150) NOT NULL DEFAULT '',
  `street` varchar(150) NOT NULL DEFAULT '',
  `suburb` varchar(150) NOT NULL DEFAULT '',
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(150) NOT NULL DEFAULT '',
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `shipping_street` varchar(150) DEFAULT NULL,
  `shipping_suburb` varchar(150) DEFAULT NULL,
  `shipping_postcode` int(11) DEFAULT NULL,
  `shipping_city` varchar(150) DEFAULT NULL,
  `shipping_state_id` int(11) DEFAULT NULL,
  `shipping_country_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `jewelrystore_id` int(11) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `state_id` (`state_id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `country_id` (`country_id`),
  KEY `branches_ibfk_6` (`shipping_state_id`),
  KEY `branches_ibfk_7` (`shipping_country_id`),
  CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  CONSTRAINT `branches_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `branches_ibfk_3` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_ibfk_4` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_ibfk_5` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `branches_ibfk_6` FOREIGN KEY (`shipping_state_id`) REFERENCES `states` (`id`),
  CONSTRAINT `branches_ibfk_7` FOREIGN KEY (`shipping_country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (1,'matriz','2018-04-10 00:00:00','8122922004',1,'Juan','Plaza comercial la fe',150,'000AAADDD','Paseo de los Césares 2047',' Camino Real',67170,'Guadalupe',24,138,'CAlle de envio','colonia de envio',65000,'Reynosa',28,138,5,1,'2018-04-28 10:25:33',1,'2018-05-12 10:26:31',1,1),(2,'Sucursal 02','2018-05-03 00:00:00','8122922005',1,'JUAN ROBLES PEREZ','',52,'08ISC008','5 DE FEBRERO 1452','FOMERREY 131',67170,'GUADALUPE',18,138,'Ajusco 123','Mitras Poniente',66023,'Garcia',5,138,6,2,'2018-04-29 14:02:07',1,'2018-05-11 22:19:07',1,1);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `BranchesBeforeInsert` BEFORE INSERT ON `branches`
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
/*!50003 CREATE*/ /*!50017 DEFINER=`madaimx_consola`@`187.160.11.%`*/ /*!50003 TRIGGER `BranchesBeforeUpdate` BEFORE UPDATE ON `branches`
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

-- Dump completed on 2018-05-12 16:00:12
