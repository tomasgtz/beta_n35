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
-- Temporary view structure for view `payments_types`
--

DROP TABLE IF EXISTS `payments_types`;
/*!50001 DROP VIEW IF EXISTS `payments_types`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `payments_types` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `list_id`,
 1 AS `created`,
 1 AS `created_user_id`,
 1 AS `modified`,
 1 AS `modified_user_id`,
 1 AS `status_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `orders_phases`
--

DROP TABLE IF EXISTS `orders_phases`;
/*!50001 DROP VIEW IF EXISTS `orders_phases`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `orders_phases` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `list_id`,
 1 AS `created`,
 1 AS `created_user_id`,
 1 AS `modified`,
 1 AS `modified_user_id`,
 1 AS `status_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `services`
--

DROP TABLE IF EXISTS `services`;
/*!50001 DROP VIEW IF EXISTS `services`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `services` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `list_id`,
 1 AS `created`,
 1 AS `created_user_id`,
 1 AS `modified`,
 1 AS `modified_user_id`,
 1 AS `status_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `created_users`
--

DROP TABLE IF EXISTS `created_users`;
/*!50001 DROP VIEW IF EXISTS `created_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `created_users` AS SELECT 
 1 AS `id`,
 1 AS `username`,
 1 AS `password`,
 1 AS `created`,
 1 AS `modified`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!50001 DROP VIEW IF EXISTS `roles`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `roles` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `list_id`,
 1 AS `created`,
 1 AS `created_user_id`,
 1 AS `modified`,
 1 AS `modified_user_id`,
 1 AS `status_id`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `modified_users`
--

DROP TABLE IF EXISTS `modified_users`;
/*!50001 DROP VIEW IF EXISTS `modified_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `modified_users` AS SELECT 
 1 AS `id`,
 1 AS `username`,
 1 AS `password`,
 1 AS `created`,
 1 AS `modified`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `payments_types`
--

/*!50001 DROP VIEW IF EXISTS `payments_types`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`madaimx_consola`@`187.160.11.%` SQL SECURITY DEFINER */
/*!50001 VIEW `payments_types` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `orders_phases`
--

/*!50001 DROP VIEW IF EXISTS `orders_phases`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`madaimx_consola`@`187.160.11.%` SQL SECURITY DEFINER */
/*!50001 VIEW `orders_phases` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `services`
--

/*!50001 DROP VIEW IF EXISTS `services`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`madaimx_consola`@`187.160.11.%` SQL SECURITY DEFINER */
/*!50001 VIEW `services` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 3) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `created_users`
--

/*!50001 DROP VIEW IF EXISTS `created_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`madaimx_consola`@`187.160.11.%` SQL SECURITY DEFINER */
/*!50001 VIEW `created_users` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`created` AS `created`,`users`.`modified` AS `modified` from `users` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `roles`
--

/*!50001 DROP VIEW IF EXISTS `roles`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`madaimx_consola`@`187.160.11.%` SQL SECURITY DEFINER */
/*!50001 VIEW `roles` AS select `lists_elements`.`id` AS `id`,`lists_elements`.`name` AS `name`,`lists_elements`.`list_id` AS `list_id`,`lists_elements`.`created` AS `created`,`lists_elements`.`created_user_id` AS `created_user_id`,`lists_elements`.`modified` AS `modified`,`lists_elements`.`modified_user_id` AS `modified_user_id`,`lists_elements`.`status_id` AS `status_id` from `lists_elements` where (`lists_elements`.`list_id` = 4) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `modified_users`
--

/*!50001 DROP VIEW IF EXISTS `modified_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`madaimx_consola`@`187.160.11.%` SQL SECURITY DEFINER */
/*!50001 VIEW `modified_users` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`created` AS `created`,`users`.`modified` AS `modified` from `users` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping routines for database 'madaimx_consola'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-12 16:00:21
