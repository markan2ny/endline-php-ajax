-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: endline_db
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bad_tables`
--

DROP TABLE IF EXISTS `bad_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bad_tables` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `eval_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eval_id_idx` (`eval_id`),
  CONSTRAINT `eval_id` FOREIGN KEY (`eval_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bad_tables`
--

LOCK TABLES `bad_tables` WRITE;
/*!40000 ALTER TABLE `bad_tables` DISABLE KEYS */;
/*!40000 ALTER TABLE `bad_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mo_name` varchar(128) DEFAULT NULL,
  `bundle_tag` varchar(128) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `remark` varchar(128) DEFAULT NULL,
  `bad_qty` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `bad1` varchar(45) DEFAULT NULL,
  `bad2` varchar(45) DEFAULT NULL,
  `bad3` varchar(45) DEFAULT NULL,
  `bad4` varchar(45) DEFAULT NULL,
  `bad5` varchar(45) DEFAULT NULL,
  `evaluate_by` varchar(45) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `evaluator_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluator_id_idx` (`evaluator_id`),
  CONSTRAINT `evaluator_id` FOREIGN KEY (`evaluator_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluations`
--

LOCK TABLES `evaluations` WRITE;
/*!40000 ALTER TABLE `evaluations` DISABLE KEYS */;
INSERT INTO `evaluations` VALUES (135,'32112133BM JACKET','63254211',40,'good',0,'2022-06-28 14:32:02','','','','','','Master Buten',1,5);
/*!40000 ALTER TABLE `evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `good_qty` int(11) DEFAULT NULL,
  `bad_qty` int(11) DEFAULT NULL,
  `submit_at` datetime DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL,
  `bundle_tag` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `e_id_idx` (`e_id`),
  CONSTRAINT `e_id` FOREIGN KEY (`e_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (14,40,0,'2022-06-28 14:32:02',135,63254211);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint(11) unsigned NOT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_shipment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `role_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `role_id_idx` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,1,1),(2,2,2),(3,3,3),(4,5,3);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_names`
--

DROP TABLE IF EXISTS `role_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) DEFAULT NULL,
  `role_desc` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_names`
--

LOCK TABLES `role_names` WRITE;
/*!40000 ALTER TABLE `role_names` DISABLE KEYS */;
INSERT INTO `role_names` VALUES (1,'admin','Administrator'),(2,'manager','QA Manager'),(3,'endline','Endline User'),(4,'1','Super Adminitrator');
/*!40000 ALTER TABLE `role_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_orders`
--

DROP TABLE IF EXISTS `sales_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `so_name` varchar(45) DEFAULT NULL,
  `so_description` varchar(45) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `qty_per_day` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_shipment_date` date DEFAULT NULL,
  `order_qty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `style_id_idx` (`style_id`),
  CONSTRAINT `style_id` FOREIGN KEY (`style_id`) REFERENCES `styles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_orders`
--

LOCK TABLES `sales_orders` WRITE;
/*!40000 ALTER TABLE `sales_orders` DISABLE KEYS */;
INSERT INTO `sales_orders` VALUES (1,'12345RM JACKET','12345RM JKT',9,'2022-06-13 11:57:20',NULL,NULL,NULL,NULL,NULL),(2,'12RM JACKET11','12RM JKT11',9,'2022-06-13 14:42:25',NULL,NULL,NULL,NULL,NULL),(3,'DLDLDLDL1234','DLDLDLDL',2,'2022-06-15 08:12:22',NULL,5000,'2022-06-15','2022-06-30',50000),(4,'32112133BM JACKET','JKT',1,'2022-06-16 10:51:40',NULL,20000,'2022-06-16','2022-06-25',60000),(5,'32112133BM PANTS','PANTS',1,'2022-06-16 10:52:28',NULL,10000,'2022-06-02','2022-06-24',50000),(6,'32112133BM HAT','32112133BM HAT',1,'2022-06-16 10:53:09',NULL,10000,'2022-06-01','2022-06-23',50000);
/*!40000 ALTER TABLE `sales_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `styles`
--

DROP TABLE IF EXISTS `styles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `styles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `styles`
--

LOCK TABLES `styles` WRITE;
/*!40000 ALTER TABLE `styles` DISABLE KEYS */;
INSERT INTO `styles` VALUES (1,'3213133BM',1,'2022-06-14 10:52:23',NULL),(2,'1111111DL',1,'2022-06-14 10:52:23',NULL),(9,'1234567RM ',1,'2022-06-13 10:21:39',NULL),(11,'3213213AB',1,'2022-06-13 10:35:47',NULL),(12,'2121213AD',1,'2022-06-14 08:14:34',NULL);
/*!40000 ALTER TABLE `styles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','admin'),(2,'manager','manager','manager'),(3,'endline','endline','endline'),(4,'Juan Dela Cruz','1','1'),(5,'Master Buten','2','12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-28 15:36:19
