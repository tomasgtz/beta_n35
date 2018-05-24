-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: demoSistemas
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

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
  `rfc` varchar(150) NOT NULL DEFAULT '',
  `street` varchar(150) NOT NULL DEFAULT '',
  `suburb` varchar(150) NOT NULL DEFAULT '',
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(150) NOT NULL DEFAULT '',
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
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
  CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  CONSTRAINT `branches_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `branches_ibfk_3` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_ibfk_4` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_ibfk_5` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `name`, `due_date`, `phone`, `access`, `manager`, `rfc`, `street`, `suburb`, `postcode`, `city`, `state_id`, `country_id`, `user_id`, `jewelrystore_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'matriz','2018-04-10 00:00:00','8122922004',1,'Juan','000AAADDD','Paseo de los Césares 2047',' Camino Real',67170,'Guadalupe',24,138,5,1,'2018-04-28 10:25:33',1,'2018-05-01 18:02:43',1,1),(2,'Sucursal 02','2018-05-03 00:00:00','8122922005',1,'JUAN ROBLES PEREZ','08ISC008','5 DE FEBRERO 1452','FOMERREY 131',67170,'GUADALUPE',19,138,4,2,'2018-04-29 14:02:07',1,'2018-05-03 19:14:48',1,1);
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `BranchesBeforeInsert` BEFORE INSERT ON `branches` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `BranchesBeforeUpdate` BEFORE UPDATE ON `branches` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `branches_payments`
--

DROP TABLE IF EXISTS `branches_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_date` datetime DEFAULT NULL,
  `ammount` decimal(10,2) DEFAULT NULL,
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
  CONSTRAINT `branches_payments_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `branches_payments_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_payments_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `branches_payments_ibfk_4` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches_payments`
--

LOCK TABLES `branches_payments` WRITE;
/*!40000 ALTER TABLE `branches_payments` DISABLE KEYS */;
INSERT INTO `branches_payments` (`id`, `payment_date`, `ammount`, `branch_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'2018-04-30 00:20:00',100.02,2,'2018-04-29 14:57:41',1,'2018-04-30 10:14:42',1,3),(2,'2018-04-30 00:21:00',50.00,1,'2018-04-29 14:58:11',1,'2018-04-29 14:58:11',1,1),(3,'2018-04-30 00:22:00',200.00,2,'2018-04-29 14:58:49',1,'2018-04-30 10:17:23',1,3),(4,'2018-04-30 00:22:00',350.00,2,'2018-04-29 14:59:28',1,'2018-04-29 14:59:28',1,1);
/*!40000 ALTER TABLE `branches_payments` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `BranchPaymentsBeforeInsert` BEFORE INSERT ON `branches_payments` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `BranchPaymentsPagosBeforeUpdate` BEFORE UPDATE ON `branches_payments` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `iso_code_2` char(2) NOT NULL DEFAULT '',
  `iso_code_3` char(3) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `countries_ibfk_2` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `countries_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `name`, `iso_code_2`, `iso_code_3`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'Afghanistan','AF','AFG','2018-04-27 13:30:16',1,'2018-04-28 09:10:57',1,1),(2,'Albania','AL','ALB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(3,'Algeria','DZ','DZA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(4,'American Samoa','AS','ASM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(5,'Andorra','AD','AND','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(6,'Angola','AO','AGO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(7,'Anguilla','AI','AIA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(8,'Antarctica','AQ','ATA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(9,'Antigua and Barbuda','AG','ATG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(10,'Argentina','AR','ARG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(11,'Armenia','AM','ARM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(12,'Aruba','AW','ABW','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(13,'Australia','AU','AUS','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(14,'Austria','AT','AUT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(15,'Azerbaijan','AZ','AZE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(16,'Bahamas','BS','BHS','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(17,'Bahrain','BH','BHR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(18,'Bangladesh','BD','BGD','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(19,'Barbados','BB','BRB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(20,'Belarus','BY','BLR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(21,'Belgium','BE','BEL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(22,'Belize','BZ','BLZ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(23,'Benin','BJ','BEN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(24,'Bermuda','BM','BMU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(25,'Bhutan','BT','BTN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(26,'Bolivia','BO','BOL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(28,'Botswana','BW','BWA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(29,'Bouvet Island','BV','BVT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(30,'Brazil','BR','BRA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(32,'Brunei Darussalam','BN','BRN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(33,'Bulgaria','BG','BGR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(34,'Burkina Faso','BF','BFA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(35,'Burundi','BI','BDI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(36,'Cambodia','KH','KHM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(37,'Cameroon','CM','CMR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(38,'Canada','CA','CAN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(39,'Cape Verde','CV','CPV','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(40,'Cayman Islands','KY','CYM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(41,'Central African Republic','CF','CAF','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(42,'Chad','TD','TCD','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(43,'Chile','CL','CHL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(44,'China','CN','CHN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(45,'Christmas Island','CX','CXR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(46,'Cocos (Keeling) Islands','CC','CCK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(47,'Colombia','CO','COL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(48,'Comoros','KM','COM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(49,'Congo','CG','COG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(50,'Cook Islands','CK','COK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(51,'Costa Rica','CR','CRI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(52,'Cote D\'Ivoire','CI','CIV','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(53,'Croatia','HR','HRV','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(54,'Cuba','CU','CUB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(55,'Cyprus','CY','CYP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(56,'Czech Republic','CZ','CZE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(57,'Denmark','DK','DNK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(58,'Djibouti','DJ','DJI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(59,'Dominica','DM','DMA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(60,'Dominican Republic','DO','DOM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(61,'East Timor','TP','TMP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(62,'Ecuador','EC','ECU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(63,'Egypt','EG','EGY','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(64,'El Salvador','SV','SLV','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(65,'Equatorial Guinea','GQ','GNQ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(66,'Eritrea','ER','ERI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(67,'Estonia','EE','EST','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(68,'Ethiopia','ET','ETH','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(70,'Faroe Islands','FO','FRO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(71,'Fiji','FJ','FJI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(72,'Finland','FI','FIN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(73,'France','FR','FRA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(74,'France, Metropolitan','FX','FXX','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(75,'French Guiana','GF','GUF','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(76,'French Polynesia','PF','PYF','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(78,'Gabon','GA','GAB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(79,'Gambia','GM','GMB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(80,'Georgia','GE','GEO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(81,'Germany','DE','DEU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(82,'Ghana','GH','GHA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(83,'Gibraltar','GI','GIB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(84,'Greece','GR','GRC','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(85,'Greenland','GL','GRL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(86,'Grenada','GD','GRD','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(87,'Guadeloupe','GP','GLP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(88,'Guam','GU','GUM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(89,'Guatemala','GT','GTM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(90,'Guinea','GN','GIN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(91,'Guinea-bissau','GW','GNB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(92,'Guyana','GY','GUY','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(93,'Haiti','HT','HTI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(95,'Honduras','HN','HND','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(96,'Hong Kong','HK','HKG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(97,'Hungary','HU','HUN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(98,'Iceland','IS','ISL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(99,'India','IN','IND','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(100,'Indonesia','ID','IDN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(102,'Iraq','IQ','IRQ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(103,'Ireland','IE','IRL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(104,'Israel','IL','ISR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(105,'Italy','IT','ITA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(106,'Jamaica','JM','JAM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(107,'Japan','JP','JPN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(108,'Jordan','JO','JOR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(109,'Kazakhstan','KZ','KAZ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(110,'Kenya','KE','KEN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(111,'Kiribati','KI','KIR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(113,'Korea, Republic of','KR','KOR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(114,'Kuwait','KW','KWT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(115,'Kyrgyzstan','KG','KGZ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(117,'Latvia','LV','LVA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(118,'Lebanon','LB','LBN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(119,'Lesotho','LS','LSO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(120,'Liberia','LR','LBR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(121,'Libyan Arab Jamahiriya','LY','LBY','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(122,'Liechtenstein','LI','LIE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(123,'Lithuania','LT','LTU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(124,'Luxembourg','LU','LUX','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(125,'Macau','MO','MAC','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(127,'Madagascar','MG','MDG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(128,'Malawi','MW','MWI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(129,'Malaysia','MY','MYS','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(130,'Maldives','MV','MDV','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(131,'Mali','ML','MLI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(132,'Malta','MT','MLT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(133,'Marshall Islands','MH','MHL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(134,'Martinique','MQ','MTQ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(135,'Mauritania','MR','MRT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(136,'Mauritius','MU','MUS','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(137,'Mayotte','YT','MYT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(138,'Mexico','MX','MEX','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(140,'Moldova, Republic of','MD','MDA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(141,'Monaco','MC','MCO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(142,'Mongolia','MN','MNG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(143,'Montserrat','MS','MSR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(144,'Morocco','MA','MAR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(145,'Mozambique','MZ','MOZ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(146,'Myanmar','MM','MMR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(147,'Namibia','NA','NAM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(148,'Nauru','NR','NRU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(149,'Nepal','NP','NPL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(150,'Netherlands','NL','NLD','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(151,'Netherlands Antilles','AN','ANT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(152,'New Caledonia','NC','NCL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(153,'New Zealand','NZ','NZL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(154,'Nicaragua','NI','NIC','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(155,'Niger','NE','NER','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(156,'Nigeria','NG','NGA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(157,'Niue','NU','NIU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(158,'Norfolk Island','NF','NFK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(159,'Northern Mariana Islands','MP','MNP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(160,'Norway','NO','NOR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(161,'Oman','OM','OMN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(162,'Pakistan','PK','PAK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(163,'Palau','PW','PLW','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(164,'Panama','PA','PAN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(165,'Papua New Guinea','PG','PNG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(166,'Paraguay','PY','PRY','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(167,'Peru','PE','PER','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(168,'Philippines','PH','PHL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(169,'Pitcairn','PN','PCN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(170,'Poland','PL','POL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(171,'Portugal','PT','PRT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(172,'Puerto Rico','PR','PRI','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(173,'Qatar','QA','QAT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(174,'Reunion','RE','REU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(175,'Romania','RO','ROM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(176,'Russian Federation','RU','RUS','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(177,'Rwanda','RW','RWA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(178,'Saint Kitts and Nevis','KN','KNA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(179,'Saint Lucia','LC','LCA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(181,'Samoa','WS','WSM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(182,'San Marino','SM','SMR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(183,'Sao Tome and Principe','ST','STP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(184,'Saudi Arabia','SA','SAU','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(185,'Senegal','SN','SEN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(186,'Seychelles','SC','SYC','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(187,'Sierra Leone','SL','SLE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(188,'Singapore','SG','SGP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(189,'Slovakia (Slovak Republic)','SK','SVK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(190,'Slovenia','SI','SVN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(191,'Solomon Islands','SB','SLB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(192,'Somalia','SO','SOM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(193,'South Africa','ZA','ZAF','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(195,'Spain','ES','ESP','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(196,'Sri Lanka','LK','LKA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(197,'St. Helena','SH','SHN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(198,'St. Pierre and Miquelon','PM','SPM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(199,'Sudan','SD','SDN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(200,'Suriname','SR','SUR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(202,'Swaziland','SZ','SWZ','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(203,'Sweden','SE','SWE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(204,'Switzerland','CH','CHE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(205,'Syrian Arab Republic','SY','SYR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(206,'Taiwan','TW','TWN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(207,'Tajikistan','TJ','TJK','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(208,'Tanzania, United Republic of','TZ','TZA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(209,'Thailand','TH','THA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(210,'Togo','TG','TGO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(211,'Tokelau','TK','TKL','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(212,'Tonga','TO','TON','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(213,'Trinidad and Tobago','TT','TTO','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(214,'Tunisia','TN','TUN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(215,'Turkey','TR','TUR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(216,'Turkmenistan','TM','TKM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(217,'Turks and Caicos Islands','TC','TCA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(218,'Tuvalu','TV','TUV','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(219,'Uganda','UG','UGA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(220,'Ukraine','UA','UKR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(221,'United Arab Emirates','AE','ARE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(222,'United Kingdom','GB','GBR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(223,'United States','US','USA','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(225,'Uruguay','UY','URY','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(226,'Uzbekistan','UZ','UZB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(227,'Vanuatu','VU','VUT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(228,'Vatican City State (Holy See)','VA','VAT','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(229,'Venezuela','VE','VEN','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(230,'Viet Nam','VN','VNM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(231,'Virgin Islands (British)','VG','VGB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(232,'Virgin Islands (U.S.)','VI','VIR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(233,'Wallis and Futuna Islands','WF','WLF','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(234,'Western Sahara','EH','ESH','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(235,'Yemen','YE','YEM','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(236,'Yugoslavia','YU','YUG','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(237,'Zaire','ZR','ZAR','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(238,'Zambia','ZM','ZMB','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1),(239,'Zimbabwe','ZW','ZWE','2018-04-27 13:30:16',1,'2018-04-27 13:30:16',1,1);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `CountriesBeforeInsert` BEFORE INSERT ON `countries` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `CountriesBeforeUpdate` BEFORE UPDATE ON `countries` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `created_users`
--

DROP TABLE IF EXISTS `created_users`;
/*!50001 DROP VIEW IF EXISTS `created_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `created_users` (
  `id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `password` tinyint NOT NULL,
  `created` tinyint NOT NULL,
  `modified` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
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
  CONSTRAINT `devices_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `devices_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `devices_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `devices_ibfk_4` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` (`id`, `name`, `branch_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'IPAD-001',1,'2018-04-28 10:26:11',1,'2018-05-03 19:19:51',1,1),(2,'Sucursal02Dispositivo01',2,'2018-04-30 10:20:17',1,'2018-04-30 10:23:55',1,3),(3,'Sucursal02Dispositivo02',2,'2018-04-30 10:20:32',1,'2018-04-30 10:20:58',1,1),(4,'Sucursal02Dispositivo03',2,'2018-04-30 10:20:48',1,'2018-04-30 10:21:07',1,1),(5,'Sucursal02Dispositivo04',2,'2018-04-30 10:21:22',1,'2018-04-30 10:21:22',1,1);
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `DevicesBeforeInsert` BEFORE INSERT ON `devices` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `DevicesBeforeUpdate` BEFORE UPDATE ON `devices` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `jewelry_stores`
--

DROP TABLE IF EXISTS `jewelry_stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jewelry_stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `phone` varchar(150) NOT NULL DEFAULT '',
  `manager` varchar(150) NOT NULL DEFAULT '',
  `rfc` varchar(150) NOT NULL DEFAULT '',
  `street` varchar(150) NOT NULL DEFAULT '',
  `suburb` varchar(150) NOT NULL DEFAULT '',
  `postcode` int(11) DEFAULT NULL,
  `city` varchar(150) NOT NULL DEFAULT '',
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `country_id` (`country_id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `jewelry_stores_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `jewelry_stores_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `jewelry_stores_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `jewelry_stores_ibfk_4` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  CONSTRAINT `jewelry_stores_ibfk_5` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jewelry_stores`
--

LOCK TABLES `jewelry_stores` WRITE;
/*!40000 ALTER TABLE `jewelry_stores` DISABLE KEYS */;
INSERT INTO `jewelry_stores` (`id`, `name`, `email`, `phone`, `manager`, `rfc`, `street`, `suburb`, `postcode`, `city`, `state_id`, `country_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'Joyeria demo','demo@joyeriademo.com','8100-0000','Juan Perez','ROHJ8312162WA','AVENIDA DE LOS REYES #45','COLONIA DEMO',67170,'GUADALUPE',19,138,'2018-04-28 10:24:36',1,'2018-05-03 18:51:46',1,1),(2,'JOYERIA DEMO 2','joyeria2@gmail.com','8123242022','JOSE','JOYD9501162XA','Zona Occidente 150','Constitución',67180,'Queretaro',22,138,'2018-04-29 12:00:17',1,'2018-05-03 18:52:46',1,1);
/*!40000 ALTER TABLE `jewelry_stores` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `JewerlyStoresBeforeInsert` BEFORE INSERT ON `jewelry_stores` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `JewerlyStoresBeforeUpdate` BEFORE UPDATE ON `jewelry_stores` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `lists`
--

DROP TABLE IF EXISTS `lists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  CONSTRAINT `lists_ibfk_2` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lists_ibfk_3` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lists`
--

LOCK TABLES `lists` WRITE;
/*!40000 ALTER TABLE `lists` DISABLE KEYS */;
INSERT INTO `lists` (`id`, `name`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'payment types','2018-04-25 21:41:58',1,'2018-04-25 21:57:32',1,1),(2,'order phase','2018-04-25 22:00:53',1,'2018-04-25 22:00:53',1,1),(3,'services','2018-04-25 22:27:20',1,'2018-04-25 22:27:20',1,1);
/*!40000 ALTER TABLE `lists` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `ListsBeforeInsert` BEFORE INSERT ON `lists` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `ListsBeforeUpdate` BEFORE UPDATE ON `lists` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lists_elements`
--

LOCK TABLES `lists_elements` WRITE;
/*!40000 ALTER TABLE `lists_elements` DISABLE KEYS */;
INSERT INTO `lists_elements` (`id`, `name`, `list_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'Transferencia',1,'2018-04-25 21:42:37',1,'2018-04-25 21:57:44',1,1),(2,'Depósito',1,'2018-04-25 21:42:45',1,'2018-04-25 21:57:44',1,1),(3,'Paypal',1,'2018-04-25 21:42:52',1,'2018-04-25 21:57:44',1,1),(4,'Tarjeta',1,'2018-04-25 21:42:53',1,'2018-04-25 21:57:45',1,1),(5,'Diseño',2,'2018-04-25 22:01:34',1,'2018-04-25 22:01:34',1,1),(6,'Impresión',2,'2018-04-25 22:02:17',1,'2018-04-25 22:02:17',1,1),(7,'Manufactura',2,'2018-04-25 22:02:34',1,'2018-04-25 22:02:34',1,1),(8,'En ruta',2,'2018-04-25 22:02:49',1,'2018-04-25 22:03:41',1,1),(9,'Entregado',2,'2018-04-25 22:03:40',1,'2018-04-25 22:03:40',1,1),(10,'Diseño',3,'2018-04-25 22:28:04',1,'2018-04-25 22:28:47',1,1),(11,'Impresión',3,'2018-04-25 22:28:15',1,'2018-04-25 22:28:52',1,1),(12,'Manufactura',3,'2018-04-25 22:28:27',1,'2018-04-25 22:28:53',1,1),(13,'Borrador',2,'2018-05-01 09:22:06',1,'2018-05-01 09:22:06',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `ListsElementsBeforeInsert` BEFORE INSERT ON `lists_elements` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `ListsElementsBeforeUpdate` BEFORE UPDATE ON `lists_elements` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) NOT NULL DEFAULT 'n/a',
  `friendly_text` varchar(150) NOT NULL DEFAULT 'n/a',
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `text`, `friendly_text`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'Success','Success','2018-04-25 21:11:59',1,'2018-04-25 21:11:59',1,1),(2,'Error','Error','2018-04-25 21:12:07',1,'2018-04-25 21:12:07',1,1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `MessagesBeforeInsert` BEFORE INSERT ON `messages` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `MessagesBeforeUpdate` BEFORE UPDATE ON `messages` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `modified_users`
--

DROP TABLE IF EXISTS `modified_users`;
/*!50001 DROP VIEW IF EXISTS `modified_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `modified_users` (
  `id` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `password` tinyint NOT NULL,
  `created` tinyint NOT NULL,
  `modified` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_phone`, `comments`, `payment_url`, `received_by`, `estimated_delivery_date`, `quote_id`, `branch_id`, `payments_type_id`, `orders_phase_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (11,'José','a','8123242022','Sin comentarios',NULL,NULL,NULL,10,1,1,13,'2018-05-01 14:39:58',5,'2018-05-01 16:58:05',1,1),(12,'José','jose@sucursal01.com','8123242022','Sin comentarios','CoverLetter._Orden_12_20180501234858.pdf',NULL,NULL,9,1,1,5,'2018-05-01 16:25:22',1,'2018-05-01 16:25:24',1,1),(13,'José','jose@sucursal01.com','8123242022','Sin comentarios\r\nTu pedido ya esta listo, se enviará mañana','CoverLetter._Orden_13_20180502011756.pdf','Sr. XXXXX YYYYY','2018-05-31',8,1,1,5,'2018-05-01 17:54:21',1,'2018-05-02 19:55:49',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `OrdersBeforeInsert` BEFORE INSERT ON `orders` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `OrdersBeforeUpdate` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

LOCK TABLES `orders_details` WRITE;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
INSERT INTO `orders_details` (`id`, `part_number`, `description`, `quantity`, `price`, `order_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (8,'anillo 001','CON DESCRIPcion',10,1.00,12,'2018-05-01 16:25:22',1,'2018-05-01 16:25:22',1,1),(9,'modelo1','descripcion modelo1',1,150.00,13,'2018-05-01 17:54:22',1,'2018-05-01 18:06:03',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `OrdersDetailsBeforeInsert` BEFORE INSERT ON `orders_details` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `OrdersDetailsBeforeUpdate` BEFORE UPDATE ON `orders_details` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details_services`
--

LOCK TABLES `orders_details_services` WRITE;
/*!40000 ALTER TABLE `orders_details_services` DISABLE KEYS */;
INSERT INTO `orders_details_services` (`id`, `service_id`, `orders_detail_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (4,10,8,'2018-05-01 16:25:23',1,'2018-05-01 16:25:23',1,1),(5,11,8,'2018-05-01 16:25:23',1,'2018-05-01 16:25:23',1,1),(6,12,9,'2018-05-01 16:25:23',1,'2018-05-01 18:21:10',1,1),(7,11,9,'2018-05-01 17:54:22',1,'2018-05-01 17:54:22',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `OrdersDetailsServicessBeforeInsert` BEFORE INSERT ON `orders_details_services` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `OrdersDetailsServicesBeforeUpdate` BEFORE UPDATE ON `orders_details_services` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `orders_phases`
--

DROP TABLE IF EXISTS `orders_phases`;
/*!50001 DROP VIEW IF EXISTS `orders_phases`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `orders_phases` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `list_id` tinyint NOT NULL,
  `created` tinyint NOT NULL,
  `created_user_id` tinyint NOT NULL,
  `modified` tinyint NOT NULL,
  `modified_user_id` tinyint NOT NULL,
  `status_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `payments_types`
--

DROP TABLE IF EXISTS `payments_types`;
/*!50001 DROP VIEW IF EXISTS `payments_types`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `payments_types` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `list_id` tinyint NOT NULL,
  `created` tinyint NOT NULL,
  `created_user_id` tinyint NOT NULL,
  `modified` tinyint NOT NULL,
  `modified_user_id` tinyint NOT NULL,
  `status_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` (`id`, `customer_name`, `customer_email`, `customer_phone`, `comments`, `branch_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:40:49',1,'2018-05-01 08:08:53',1,1),(2,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:41:51',1,'2018-05-01 08:08:53',1,1),(3,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:44:25',1,'2018-05-01 08:08:53',1,1),(4,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:46:46',1,'2018-05-01 08:08:53',1,1),(5,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:48:19',1,'2018-05-01 08:08:54',1,1),(6,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:48:38',1,'2018-05-01 08:08:54',1,1),(7,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:58:23',1,'2018-05-01 08:08:54',1,1),(8,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:59:08',1,'2018-05-01 08:08:54',1,1),(9,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 10:59:58',1,'2018-05-01 08:08:54',1,1),(10,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 11:00:37',1,'2018-05-01 08:08:54',1,1),(11,'José','jose@sucursal01.com','8123242022','Sin comentarios',1,'2018-04-28 11:04:16',1,'2018-05-01 08:08:54',1,1),(12,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:04:57',1,'2018-05-01 08:09:23',1,1),(13,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:06:15',1,'2018-05-01 08:09:24',1,1),(14,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:08:33',1,'2018-05-01 08:09:24',1,1),(15,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:16:02',1,'2018-05-01 08:09:24',1,1),(16,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:17:16',1,'2018-05-01 08:09:24',1,1),(17,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:18:38',1,'2018-05-01 08:09:24',1,1),(18,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:18:49',1,'2018-05-01 08:09:24',1,1),(19,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:25:56',1,'2018-05-01 08:09:24',1,1),(20,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:27:00',1,'2018-05-01 08:09:24',1,1),(25,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:46:04',1,'2018-05-01 08:09:25',1,1),(27,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:48:24',1,'2018-05-01 08:09:25',1,1),(28,'Jaime','jaime@sucursal02.com','8122922004','Comentarios',2,'2018-04-28 11:49:20',1,'2018-05-01 08:09:25',1,1),(29,'Jaime','jrodriguez@abc.com','8123242022','Comentarios',1,'2018-05-02 21:30:45',1,'2018-05-02 21:30:45',1,1),(30,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',1,'2018-05-02 21:36:05',1,'2018-05-02 21:36:05',1,1),(31,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',1,'2018-05-02 21:36:24',1,'2018-05-02 21:36:24',1,1),(32,'Tom','tomasgtz2@abc.com','8123200000','Comentarios 2',1,'2018-05-02 21:42:23',1,'2018-05-02 21:42:23',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `QuotesBeforeInsert` BEFORE INSERT ON `quotes` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `QuotesBeforeUpdate` BEFORE UPDATE ON `quotes` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotes_details`
--

LOCK TABLES `quotes_details` WRITE;
/*!40000 ALTER TABLE `quotes_details` DISABLE KEYS */;
INSERT INTO `quotes_details` (`id`, `part_number`, `description`, `quantity`, `price`, `quote_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'','',0,0.00,14,'2018-04-28 11:08:34',1,'2018-04-28 11:08:34',1,1),(2,'anillo 001','Sin descripción',1,1.00,18,'2018-04-28 11:18:49',1,'2018-04-28 11:18:49',1,1),(3,'anillo 001','Sin descripción',1,1.00,19,'2018-04-28 11:25:57',1,'2018-04-28 11:25:57',1,1),(4,'anillo 001','Sin descripción',10,1.00,25,'2018-04-28 11:46:04',1,'2018-04-28 11:46:04',1,1),(5,'anillo 001','CON DESCRIPcion',10,1.00,9,'2018-04-28 11:48:25',1,'2018-05-01 10:40:38',1,1),(6,'anillo 001','Descripcion de pieza',10,150.50,10,'2018-04-28 11:49:20',1,'2018-05-01 05:51:41',1,1),(7,'anillo 001','CON DESCRIPcion',10,1.00,29,'2018-05-02 21:30:45',1,'2018-05-02 21:30:45',1,1),(8,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,30,'2018-05-02 21:36:05',1,'2018-05-02 21:36:05',1,1),(9,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,31,'2018-05-02 21:36:25',1,'2018-05-02 21:36:25',1,1),(10,'anillo de bodas 001','Nuevo 2 Mayo',1,1000.00,32,'2018-05-02 21:42:23',1,'2018-05-02 21:42:23',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `QuotesDetailsBeforeInsert` BEFORE INSERT ON `quotes_details` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `QuotesDetailsBeforeUpdate` BEFORE UPDATE ON `quotes_details` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `services`
--

DROP TABLE IF EXISTS `services`;
/*!50001 DROP VIEW IF EXISTS `services`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `services` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `list_id` tinyint NOT NULL,
  `created` tinyint NOT NULL,
  `created_user_id` tinyint NOT NULL,
  `modified` tinyint NOT NULL,
  `modified_user_id` tinyint NOT NULL,
  `status_id` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

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
INSERT INTO `states` (`id`, `name`, `iso_code_3`, `country_id`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'Aguascalientes','AGS',138,'2018-04-25 20:46:48',1,'2018-04-25 20:46:48',1,1),(2,'Baja California','BCN',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(3,'Baja California Sur','BCS',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(4,'Campeche','CAM',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(5,'Chiapas','CHP',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(6,'Chihuahua','CHI',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(7,'Ciudad de México','DIF',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(8,'Coahuila','COA',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(9,'Colima','COL',138,'2018-04-25 20:46:49',1,'2018-04-25 20:46:49',1,1),(10,'Durango','DUR',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(11,'Guanajuato','GTO',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(12,'Guerrero','GRO',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(13,'Hidalgo','HGO',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(14,'Jalisco','JAL',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(15,'México','MEX',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(16,'Michoacán','MIC',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(17,'Morelos','MOR',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(18,'Nayarit','NAY',138,'2018-04-25 20:46:50',1,'2018-04-25 20:46:50',1,1),(19,'Nuevo León','NLE',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(20,'Oaxaca','OAX',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(21,'Puebla','PUE',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(22,'Querétaro','QRO',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(23,'Quintana Roo','ROO',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(24,'San Luis Potosí','SLP',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(25,'Sinaloa','SIN',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(26,'Sonora','SON',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(27,'Tabasco','TAB',138,'2018-04-25 20:46:51',1,'2018-04-25 20:46:51',1,1),(28,'Tamaulipas','TAM',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(29,'Tlaxcala','TLX',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(30,'Veracruz','VER',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(31,'Yucatán','YUC',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1),(32,'Zacatecas','ZAC',138,'2018-04-25 20:46:52',1,'2018-04-25 20:46:52',1,1);
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
/*!50003 CREATE*/  /*!50003 TRIGGER `StatesBeforeInsert` BEFORE INSERT ON `states` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `StatesBeforeUpdate` BEFORE UPDATE ON `states` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(150) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  `created_user_id` int(11) NOT NULL DEFAULT '1',
  `modified` datetime DEFAULT NULL,
  `modified_user_id` int(11) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `created_user_id` (`created_user_id`),
  KEY `modified_user_id` (`modified_user_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `statuses_ibfk_1` FOREIGN KEY (`created_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `statuses_ibfk_2` FOREIGN KEY (`modified_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `statuses_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `text`, `created`, `created_user_id`, `modified`, `modified_user_id`, `status_id`) VALUES (1,'Active','2018-04-25 23:34:35',1,'2018-04-25 21:08:38',1,1),(2,'Inactive','2018-04-25 23:34:35',1,'2018-04-25 21:08:38',1,1),(3,'Deleted','2018-04-25 23:34:35',1,'2018-04-25 21:08:38',1,1);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `StatusBeforeInsert` BEFORE INSERT ON `statuses` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `StatusBeforeUpdate` BEFORE UPDATE ON `statuses` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `reset_password_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `token_created_at` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `role`, `reset_password_token`, `token_created_at`, `created`, `modified`, `status_id`) VALUES (1,'rodriguez.jaime2014@gmail.com','$2a$10$rC2azCNabB8jmg/LtUNcCuVjHGbZfCQbTrhiUBA6jZf2E7lo1YIXC','admin',NULL,NULL,'2018-04-25 20:19:44','2018-05-01 18:49:49',1),(3,'jrodriguez@sdindustrial.com.mx','$2a$10$bpaCeDGCbcdduKJbhHD3yOXO/cdnWrNqg2m8aLYtSQejI8eqW2NAK','normal','30a09f85bd09fe034911f74a238b4c5e65593180c57f19906d2f3dde55d2494b','2018-05-04 16:47:50','2018-04-29 22:35:49','2018-05-04 07:59:26',1),(4,'jamez.sasori@gmail.com','$2a$10$mraRLXSpmrTsEUrhEQr23.isjM2BetdoP/uDzoVljfGfCYbz3GCV.','normal','9a47e428f0c125713860e93efc27bb8a36e0f01317aa96861679244346dc8233','2018-05-04 17:31:43','2018-04-29 22:50:59','2018-05-04 08:47:10',1),(5,'tomasgtz@gmail.com','$2a$10$oSgNEP9FLZOwTr5JNWSsC.U37GMgtBvuLVXrZ6Y68CU4O3nfd8d6e','normal','393e792118b8668a312714a02b4278d3efed968bd820a0c93b67c8f9e6f0e226','2018-05-04 17:21:57','2018-04-29 22:52:33','2018-05-04 09:58:21',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
/*!50003 CREATE*/  /*!50003 TRIGGER `UsersBeforeInsert` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
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
/*!50003 CREATE*/  /*!50003 TRIGGER `UsersBeforeUpdate` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN
   SET NEW.modified = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `created_users`
--
	
/*!50001 DROP TABLE IF EXISTS `created_users`*/;
/*!50001 DROP VIEW IF EXISTS `created_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */

/*!50001 VIEW `created_users` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`created` AS `created`,`users`.`modified` AS `modified` from `users` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `modified_users`
--

/*!50001 DROP TABLE IF EXISTS `modified_users`*/;
/*!50001 DROP VIEW IF EXISTS `modified_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */

/*!50001 VIEW `modified_users` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`created` AS `created`,`users`.`modified` AS `modified` from `users` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `orders_phases`
--

/*!50001 DROP TABLE IF EXISTS `orders_phases`*/;
/*!50001 DROP VIEW IF EXISTS `orders_phases`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */

/*!50001 VIEW `orders_phases` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `payments_types`
--

/*!50001 DROP TABLE IF EXISTS `payments_types`*/;
/*!50001 DROP VIEW IF EXISTS `payments_types`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */

/*!50001 VIEW `payments_types` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `services`
--

/*!50001 DROP TABLE IF EXISTS `services`*/;
/*!50001 DROP VIEW IF EXISTS `services`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */

/*!50001 VIEW `services` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 3) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-04 17:38:43
