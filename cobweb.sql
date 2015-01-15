-- MySQL dump 10.13  Distrib 5.6.19, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cobweb
-- ------------------------------------------------------
-- Server version	5.6.19-0ubuntu0.14.04.1

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
-- Table structure for table `AttributeReleaseConsent`
--

DROP TABLE IF EXISTS `AttributeReleaseConsent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AttributeReleaseConsent` (
  `userId` varchar(104) NOT NULL,
  `relyingPartyId` varchar(104) NOT NULL,
  `attributeId` varchar(104) NOT NULL,
  `valuesHash` varchar(256) NOT NULL,
  `consentDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`,`relyingPartyId`,`attributeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AttributeReleaseConsent`
--

LOCK TABLES `AttributeReleaseConsent` WRITE;
/*!40000 ALTER TABLE `AttributeReleaseConsent` DISABLE KEYS */;
INSERT INTO `AttributeReleaseConsent` VALUES ('andreas','*','*','*','2015-01-04 13:14:26'),('andreas','https://cobweb.edina.ac.uk/shibboleth','cobwebUserId','efae63016efb057eb10d4c33f020d4a4bbf894f1ce0b70ec921231abfbd18668','2015-01-04 12:39:20'),('andreas','https://cobweb.edina.ac.uk/shibboleth','GEOSSuser','8277474d96ce434b4c43dd9cc596575032546f6197343fd548a4a1dff7c1037a','2015-01-04 12:39:20');
/*!40000 ALTER TABLE `AttributeReleaseConsent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ToUAcceptance`
--

DROP TABLE IF EXISTS `ToUAcceptance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ToUAcceptance` (
  `userId` varchar(104) NOT NULL,
  `version` varchar(104) NOT NULL,
  `fingerprint` varchar(256) NOT NULL,
  `acceptanceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ToUAcceptance`
--

LOCK TABLES `ToUAcceptance` WRITE;
/*!40000 ALTER TABLE `ToUAcceptance` DISABLE KEYS */;
INSERT INTO `ToUAcceptance` VALUES ('andreas','1.0','5b2ee897c08c79a09cd57e8602d605bf8c52db17de9793677c36b5c78644b2b3','2015-01-04 12:33:09'),('chiggins','1.0','5b2ee897c08c79a09cd57e8602d605bf8c52db17de9793677c36b5c78644b2b3','2014-12-19 15:55:50'),('ingo','1.0','5b2ee897c08c79a09cd57e8602d605bf8c52db17de9793677c36b5c78644b2b3','2014-12-18 13:20:25'),('jls','1.0','5b2ee897c08c79a09cd57e8602d605bf8c52db17de9793677c36b5c78644b2b3','2014-12-16 14:19:28');
/*!40000 ALTER TABLE `ToUAcceptance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_configuration`
--

DROP TABLE IF EXISTS `idp_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_configuration`
--

LOCK TABLES `idp_configuration` WRITE;
/*!40000 ALTER TABLE `idp_configuration` DISABLE KEYS */;
INSERT INTO `idp_configuration` VALUES (1,'website_name','COBWEB User Management'),(2,'website_url','dyfi.cobwebproject.eu/user/'),(3,'email','support@secure-dimensions.de'),(4,'activation','1'),(5,'resend_activation_threshold','0'),(6,'language','../models/languages/en.php'),(8,'can_register','1'),(9,'new_user_title','New Member'),(11,'email_login','1'),(12,'token_timeout','10800'),(13,'version','0.2.2');
/*!40000 ALTER TABLE `idp_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_filelist`
--

DROP TABLE IF EXISTS `idp_filelist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_filelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_filelist`
--

LOCK TABLES `idp_filelist` WRITE;
/*!40000 ALTER TABLE `idp_filelist` DISABLE KEYS */;
INSERT INTO `idp_filelist` VALUES (1,'account'),(2,'forms');
/*!40000 ALTER TABLE `idp_filelist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_group_action_permits`
--

DROP TABLE IF EXISTS `idp_group_action_permits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_group_action_permits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `permits` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_group_action_permits`
--

LOCK TABLES `idp_group_action_permits` WRITE;
/*!40000 ALTER TABLE `idp_group_action_permits` DISABLE KEYS */;
INSERT INTO `idp_group_action_permits` VALUES (1,1,'updateUserEmail','isLoggedInUser(user_id)'),(2,1,'updateUserPassword','isLoggedInUser(user_id)'),(3,1,'loadUser','isLoggedInUser(user_id)'),(4,1,'loadUserGroups','isLoggedInUser(user_id)'),(5,2,'updateUserEmail','always()'),(6,2,'updateUserPassword','always()'),(7,2,'updateUser','always()'),(8,2,'updateUserDisplayName','always()'),(9,2,'updateUserTitle','always()'),(10,2,'updateUserEnabled','always()'),(11,2,'loadUser','always()'),(12,2,'loadUserGroups','always()'),(13,2,'loadUsers','always()'),(14,2,'deleteUser','always()'),(15,2,'activateUser','always()'),(16,2,'loadGroups','always()'),(18,1,'updateUserAddress','isLoggedInUser(user_id)'),(19,1,'updateUserGivenName','isLoggedInUser(user_id)'),(20,1,'updateUserSurname','isLoggedInUser(user_id)'),(21,1,'updateUserAge','isLoggedInUser(user_id)'),(22,1,'updateUserGender','isLoggedInUser(user_id)'),(23,1,'updateUserTelefon','isLoggedInUser(user_id)'),(24,1,'updateUserAffiliation','isLoggedInUser(user_id)'),(34,3,'loadUser','isUserPrimaryGroup(user_id,\'1\')'),(40,3,'loadUsers','always()'),(42,3,'loadGroups','always()'),(43,3,'loadUserGroups','always()'),(48,2,'updateUserVerified','isUserPrimaryGroup(user_id,\'1\')'),(49,3,'updateUserVerified','isUserPrimaryGroup(user_id,\'1\')'),(50,3,'updateUserEnabled','isUserPrimaryGroup(user_id,\'1\')'),(51,1,'updateUserDisplayName','isLoggedInUser(user_id)'),(52,1,'loadEntities','always()'),(53,1,'deleteEntity','always()'),(54,1,'loadGlobalEntity','always()');
/*!40000 ALTER TABLE `idp_group_action_permits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_group_page_matches`
--

DROP TABLE IF EXISTS `idp_group_page_matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_group_page_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_group_page_matches`
--

LOCK TABLES `idp_group_page_matches` WRITE;
/*!40000 ALTER TABLE `idp_group_page_matches` DISABLE KEYS */;
INSERT INTO `idp_group_page_matches` VALUES (1,1,1),(3,2,3),(4,2,4),(5,2,5),(6,2,6),(7,2,7),(8,2,8),(9,2,9),(10,2,10),(11,2,11),(12,2,12),(13,2,13),(14,2,14),(15,2,15),(16,2,16),(19,1,3),(20,1,4),(21,1,6),(22,1,13),(23,1,15),(24,3,4),(25,3,5),(26,1,18),(49,3,9),(51,3,11),(52,3,12),(53,3,13),(54,3,14),(55,3,15),(56,3,16),(57,3,10),(58,3,1),(59,2,1),(61,3,3),(64,2,20),(65,3,20),(66,1,21),(67,1,22),(68,1,23),(69,1,24);
/*!40000 ALTER TABLE `idp_group_page_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_groups`
--

DROP TABLE IF EXISTS `idp_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL,
  `home_page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_groups`
--

LOCK TABLES `idp_groups` WRITE;
/*!40000 ALTER TABLE `idp_groups` DISABLE KEYS */;
INSERT INTO `idp_groups` VALUES (1,'User',2,0,4),(2,'Administrator',0,0,9),(3,'SurveyManager',0,1,9);
/*!40000 ALTER TABLE `idp_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_nav`
--

DROP TABLE IF EXISTS `idp_nav`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_nav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(75) NOT NULL,
  `page` varchar(175) NOT NULL,
  `name` varchar(150) NOT NULL,
  `position` int(11) NOT NULL,
  `class_name` varchar(150) NOT NULL,
  `icon` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_nav`
--

LOCK TABLES `idp_nav` WRITE;
/*!40000 ALTER TABLE `idp_nav` DISABLE KEYS */;
INSERT INTO `idp_nav` VALUES (1,'left','account/dashboard_admin.php','Admin Dashboard',1,'dashboard-admin','fa fa-dashboard',0),(2,'left','account/users.php','Users',2,'users','fa fa-users',0),(3,'left','account/dashboard.php','Dashboard',3,'dashboard','fa fa-dashboard',0),(4,'left','account/password_settings.php','Password Settings',4,'password-settings','fa fa-gear',0),(5,'left-sub','#','Site Settings',6,'site-settings','fa fa-wrench',0),(6,'left-sub','account/site_settings.php','Site Configuration',7,'site-settings','fa fa-globe',5),(7,'left-sub','account/groups.php','Groups',8,'groups','fa fa-users',5),(8,'left-sub','account/site_authorization.php','Authorization',9,'site-pages','fa fa-key',5),(9,'top-main-sub','#','#USERNAME#',1,'site-settings','fa fa-user',0),(11,'top-main-sub','account/logout.php','Log Out',2,'','fa fa-power-off',9),(12,'left','account/account_settings.php','Account Settings',5,'account-settings','fa fa-gear',0),(13,'left','account/account_removal.php','Account Removal',6,'account-removal','fa fa-exclamation',0);
/*!40000 ALTER TABLE `idp_nav` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_nav_group_matches`
--

DROP TABLE IF EXISTS `idp_nav_group_matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_nav_group_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_nav_group_matches`
--

LOCK TABLES `idp_nav_group_matches` WRITE;
/*!40000 ALTER TABLE `idp_nav_group_matches` DISABLE KEYS */;
INSERT INTO `idp_nav_group_matches` VALUES (1,3,1),(2,4,1),(3,9,1),(4,10,1),(5,11,1),(6,1,2),(7,2,2),(8,5,2),(9,6,2),(10,7,2),(11,8,2),(12,12,1),(14,13,1);
/*!40000 ALTER TABLE `idp_nav_group_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_pages`
--

DROP TABLE IF EXISTS `idp_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(150) NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_pages`
--

LOCK TABLES `idp_pages` WRITE;
/*!40000 ALTER TABLE `idp_pages` DISABLE KEYS */;
INSERT INTO `idp_pages` VALUES (1,'forms/table_users.php',1),(3,'account/logout.php',1),(4,'account/dashboard.php',1),(5,'account/dashboard_admin.php',1),(6,'account/password_settings.php',1),(7,'account/site_authorization.php',1),(8,'account/site_settings.php',1),(9,'account/users.php',1),(10,'account/user_details.php',1),(11,'account/index.php',0),(12,'account/groups.php',1),(13,'forms/form_user.php',1),(14,'forms/form_group.php',1),(15,'forms/form_confirm_delete.php',1),(16,'forms/form_action_permits.php',1),(17,'account/404.php',0),(18,'account/account_settings.php',1),(20,'forms/form_verify.php',1),(21,'account/account_removal.php',1),(22,'account/attribute_release.php',1),(23,'forms/table_attribute_release.php',1),(24,'forms/table_attribute_global_release.php',1);
/*!40000 ALTER TABLE `idp_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_plugin_configuration`
--

DROP TABLE IF EXISTS `idp_plugin_configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_plugin_configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `value` varchar(150) NOT NULL,
  `binary` int(1) NOT NULL,
  `variable` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_plugin_configuration`
--

LOCK TABLES `idp_plugin_configuration` WRITE;
/*!40000 ALTER TABLE `idp_plugin_configuration` DISABLE KEYS */;
/*!40000 ALTER TABLE `idp_plugin_configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_user_action_permits`
--

DROP TABLE IF EXISTS `idp_user_action_permits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_user_action_permits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `permits` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_user_action_permits`
--

LOCK TABLES `idp_user_action_permits` WRITE;
/*!40000 ALTER TABLE `idp_user_action_permits` DISABLE KEYS */;
/*!40000 ALTER TABLE `idp_user_action_permits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_user_group_matches`
--

DROP TABLE IF EXISTS `idp_user_group_matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_user_group_matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_user_group_matches`
--

LOCK TABLES `idp_user_group_matches` WRITE;
/*!40000 ALTER TABLE `idp_user_group_matches` DISABLE KEYS */;
INSERT INTO `idp_user_group_matches` VALUES (1,1,1),(2,1,2),(7,6,1),(8,7,1),(9,8,1),(12,9,1),(14,2,1),(15,10,1),(18,3,1),(21,2,3),(37,26,1),(38,27,1),(39,28,1),(40,29,1),(41,30,1),(42,31,1),(43,32,1),(44,33,1),(45,34,1),(46,35,1),(47,36,1),(48,37,1),(49,38,1),(50,39,1);
/*!40000 ALTER TABLE `idp_user_group_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idp_users`
--

DROP TABLE IF EXISTS `idp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `given_name` varchar(150) DEFAULT NULL,
  `surname` varchar(150) DEFAULT NULL,
  `gender` varchar(16) DEFAULT NULL,
  `age` varchar(4) DEFAULT NULL,
  `affiliation` varchar(64) NOT NULL DEFAULT 'Citizen',
  `telefon` varchar(32) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `activation_token` varchar(225) NOT NULL,
  `deactivation_token` varchar(225) DEFAULT NULL,
  `last_activation_request` int(11) NOT NULL,
  `lost_password_request` tinyint(1) NOT NULL,
  `lost_password_timestamp` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `title` varchar(150) NOT NULL,
  `sign_up_stamp` int(11) NOT NULL,
  `last_sign_in_stamp` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_timestamp` int(11) DEFAULT NULL,
  `terms_of_use` text,
  `terms_of_use_timestamp` int(11) DEFAULT NULL,
  `primary_group_id` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Specifies the primary group for the user.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idp_users`
--

LOCK TABLES `idp_users` WRITE;
/*!40000 ALTER TABLE `idp_users` DISABLE KEYS */;
INSERT INTO `idp_users` VALUES (1,'andreasmatheus','Andreas Matheus','$2y$10$MsV1ZPfYgT4ihoMmbNFQ3Oery4ctVWGu50mFJWzIRiGfcz.qLMavy','am@secure-dimensions.de',NULL,NULL,NULL,NULL,'',NULL,NULL,'6323faf566dd0b84e0358a240aca828c',NULL,1419239115,0,1419239115,1,'Master Account',1418131754,1420377092,1,0,NULL,NULL,NULL,2),(2,'jls','John Long Silver','$2y$10$47jEtshOI4jRzMdk6iFnzeum/KRQEc/p7GY33RxU0gMNHt57S6A56','j0hnl0n651lv3r@gmail.com','John L.','Silver','Pirat','131','Pirat','n/a','Treasure Island','57e7e9ab255e9964285a34524dff15a3',NULL,1418476899,0,1418476899,1,'Find Badger Survey Master',1418131944,1420320779,1,1,1419950543,NULL,NULL,3),(3,'johndoe','John Don','$2y$10$buRMvz1RLHCRat3BZ.8YY.MciNHXtyEt.J6T3If7mO9.f6THFn6kC','am@secure-dimensions.eu',NULL,NULL,NULL,NULL,'Dead Man',NULL,NULL,'0c23928c974251123e52cb1dacb9257b',NULL,1418329614,0,1418329614,1,'New Member',1418329614,1420301664,1,1,1419951249,NULL,NULL,1),(9,'ingo','Ingo','$2y$10$8RcMTVQbYZop7HC9WxOpgOdonnC81DtDlEutBvusQQbQGGaviPr2y','isimonis@opengeospatial.org',NULL,NULL,NULL,NULL,'Citizen',NULL,NULL,'c236e05be82f300a74b79cfa366d243c',NULL,1418908621,0,1418908621,1,'New Member',1418908621,1418908646,1,0,NULL,NULL,NULL,1),(10,'chiggins','chiggins','$2y$10$FMY.4f06XDuQopSBDDjSLuFT2804wRo3bc3Tv.6cQm2iReHsgWNey','chris.higgins@ed.ac.uk','Chris','Higgins','Male','50','Citizen','07595116991','4 Bro Dulas, SY20 8QG','f27c9ec03b613cc434dc64449c37063e',NULL,1419004081,0,1419004081,1,'New Member',1419004081,1419004131,1,0,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `idp_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-04 13:38:41
