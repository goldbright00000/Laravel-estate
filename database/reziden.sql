-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: reziden
-- ------------------------------------------------------
-- Server version	5.5.52-0ubuntu0.14.04.1

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
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `estate_id` int(11) DEFAULT '0',
  `announcement_type` enum('resident','manager') NOT NULL,
  `publisher_id` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (25,'Wang','What about this?\nhao kan ma?\n',1,'resident',9,9,'2016-10-14 09:32:55',NULL),(26,'Wang','Design\n',1,'resident',9,9,'2016-10-14 09:32:59',NULL),(27,'estate manager post on 10/10 @ 16:50 by Philip','test posts',1,'manager',9,9,'2016-10-14 09:33:09','2016-10-10 09:24:00'),(28,'asfasf','asdfasfd',0,'manager',9,9,'2016-10-14 09:39:18',NULL),(29,'Target date','Testing ',0,'resident',11,11,'2016-10-20 03:20:29',NULL),(30,'t','t',1,'manager',19,19,'2016-10-31 00:10:06',NULL),(31,'Maintenance Work...','Please note that there will be some maintenance works done on the 1st Nov 2016 to 12th of Nov 2016. The tennis court would be closed down for maintenance work.',1,'manager',19,19,'2016-10-31 07:30:20',NULL);
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_code`
--

DROP TABLE IF EXISTS `country_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_code`
--

LOCK TABLES `country_code` WRITE;
/*!40000 ALTER TABLE `country_code` DISABLE KEYS */;
INSERT INTO `country_code` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'AS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AR','Argentina'),(9,'AM','Armenia'),(10,'AW','Aruba'),(11,'AU','Australia'),(12,'AT','Austria'),(13,'AZ','Azerbaijan'),(14,'BS','Bahamas'),(15,'BH','Bahrain'),(16,'BD','Bangladesh'),(17,'BB','Barbados'),(18,'BY','Belarus'),(19,'BE','Belgium'),(20,'BZ','Belize'),(21,'BJ','Benin'),(22,'BM','Bermuda'),(23,'BT','Bhutan'),(24,'BO','Bolivia'),(25,'BA','Bosnia and Herzegowina'),(26,'BW','Botswana'),(27,'BV','Bouvet Island'),(28,'BR','Brazil'),(29,'IO','British Indian Ocean Territory'),(30,'BN','Brunei Darussalam'),(31,'BG','Bulgaria'),(32,'BF','Burkina Faso'),(33,'BI','Burundi'),(34,'KH','Cambodia'),(35,'CM','Cameroon'),(36,'CA','Canada'),(37,'CV','Cape Verde'),(38,'KY','Cayman Islands'),(39,'CF','Central African Republic'),(40,'TD','Chad'),(41,'CL','Chile'),(42,'CN','China'),(43,'CX','Christmas Island'),(44,'CC','Cocos (Keeling) Islands'),(45,'CO','Colombia'),(46,'KM','Comoros'),(47,'CG','Congo'),(48,'CD','Congo, the Democratic Republic of the'),(49,'CK','Cook Islands'),(50,'CR','Costa Rica'),(51,'CI','Cote d\'Ivoire'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'EC','Ecuador'),(61,'EG','Egypt'),(62,'SV','El Salvador'),(63,'GQ','Equatorial Guinea'),(64,'ER','Eritrea'),(65,'EE','Estonia'),(66,'ET','Ethiopia'),(67,'FK','Falkland Islands (Malvinas)'),(68,'FO','Faroe Islands'),(69,'FJ','Fiji'),(70,'FI','Finland'),(71,'FR','France'),(72,'GF','French Guiana'),(73,'PF','French Polynesia'),(74,'TF','French Southern Territories'),(75,'GA','Gabon'),(76,'GM','Gambia'),(77,'GE','Georgia'),(78,'DE','Germany'),(79,'GH','Ghana'),(80,'GI','Gibraltar'),(81,'GR','Greece'),(82,'GL','Greenland'),(83,'GD','Grenada'),(84,'GP','Guadeloupe'),(85,'GU','Guam'),(86,'GT','Guatemala'),(87,'GN','Guinea'),(88,'GW','Guinea-Bissau'),(89,'GY','Guyana'),(90,'HT','Haiti'),(91,'HM','Heard and Mc Donald Islands'),(92,'VA','Holy See (Vatican City State)'),(93,'HN','Honduras'),(94,'HK','Hong Kong'),(95,'HU','Hungary'),(96,'IS','Iceland'),(97,'IN','India'),(98,'ID','Indonesia'),(99,'IR','Iran (Islamic Republic of)'),(100,'IQ','Iraq'),(101,'IE','Ireland'),(102,'IL','Israel'),(103,'IT','Italy'),(104,'JM','Jamaica'),(105,'JP','Japan'),(106,'JO','Jordan'),(107,'KZ','Kazakhstan'),(108,'KE','Kenya'),(109,'KI','Kiribati'),(110,'KP','Korea, Democratic People\'s Republic of'),(111,'KR','Korea, Republic of'),(112,'KW','Kuwait'),(113,'KG','Kyrgyzstan'),(114,'LA','Lao People\'s Democratic Republic'),(115,'LV','Latvia'),(116,'LB','Lebanon'),(117,'LS','Lesotho'),(118,'LR','Liberia'),(119,'LY','Libyan Arab Jamahiriya'),(120,'LI','Liechtenstein'),(121,'LT','Lithuania'),(122,'LU','Luxembourg'),(123,'MO','Macau'),(124,'MK','Macedonia, The Former Yugoslav Republic of'),(125,'MG','Madagascar'),(126,'MW','Malawi'),(127,'MY','Malaysia'),(128,'MV','Maldives'),(129,'ML','Mali'),(130,'MT','Malta'),(131,'MH','Marshall Islands'),(132,'MQ','Martinique'),(133,'MR','Mauritania'),(134,'MU','Mauritius'),(135,'YT','Mayotte'),(136,'MX','Mexico'),(137,'FM','Micronesia, Federated States of'),(138,'MD','Moldova, Republic of'),(139,'MC','Monaco'),(140,'MN','Mongolia'),(141,'MS','Montserrat'),(142,'MA','Morocco'),(143,'MZ','Mozambique'),(144,'MM','Myanmar'),(145,'NA','Namibia'),(146,'NR','Nauru'),(147,'NP','Nepal'),(148,'NL','Netherlands'),(149,'AN','Netherlands Antilles'),(150,'NC','New Caledonia'),(151,'NZ','New Zealand'),(152,'NI','Nicaragua'),(153,'NE','Niger'),(154,'NG','Nigeria'),(155,'NU','Niue'),(156,'NF','Norfolk Island'),(157,'MP','Northern Mariana Islands'),(158,'NO','Norway'),(159,'OM','Oman'),(160,'PK','Pakistan'),(161,'PW','Palau'),(162,'PA','Panama'),(163,'PG','Papua New Guinea'),(164,'PY','Paraguay'),(165,'PE','Peru'),(166,'PH','Philippines'),(167,'PN','Pitcairn'),(168,'PL','Poland'),(169,'PT','Portugal'),(170,'PR','Puerto Rico'),(171,'QA','Qatar'),(172,'RE','Reunion'),(173,'RO','Romania'),(174,'RU','Russian Federation'),(175,'RW','Rwanda'),(176,'KN','Saint Kitts and Nevis'),(177,'LC','Saint LUCIA'),(178,'VC','Saint Vincent and the Grenadines'),(179,'WS','Samoa'),(180,'SM','San Marino'),(181,'ST','Sao Tome and Principe'),(182,'SA','Saudi Arabia'),(183,'SN','Senegal'),(184,'SC','Seychelles'),(185,'SL','Sierra Leone'),(186,'SG','Singapore'),(187,'SK','Slovakia (Slovak Republic)'),(188,'SI','Slovenia'),(189,'SB','Solomon Islands'),(190,'SO','Somalia'),(191,'ZA','South Africa'),(192,'GS','South Georgia and the South Sandwich Islands'),(193,'ES','Spain'),(194,'LK','Sri Lanka'),(195,'SH','St. Helena'),(196,'PM','St. Pierre and Miquelon'),(197,'SD','Sudan'),(198,'SR','Suriname'),(199,'SJ','Svalbard and Jan Mayen Islands'),(200,'SZ','Swaziland'),(201,'SE','Sweden'),(202,'CH','Switzerland'),(203,'SY','Syrian Arab Republic'),(204,'TW','Taiwan, Province of China'),(205,'TJ','Tajikistan'),(206,'TZ','Tanzania, United Republic of'),(207,'TH','Thailand'),(208,'TG','Togo'),(209,'TK','Tokelau'),(210,'TO','Tonga'),(211,'TT','Trinidad and Tobago'),(212,'TN','Tunisia'),(213,'TR','Turkey'),(214,'TM','Turkmenistan'),(215,'TC','Turks and Caicos Islands'),(216,'TV','Tuvalu'),(217,'UG','Uganda'),(218,'UA','Ukraine'),(219,'AE','United Arab Emirates'),(220,'GB','United Kingdom'),(221,'US','United States'),(222,'UM','United States Minor Outlying Islands'),(223,'UY','Uruguay'),(224,'UZ','Uzbekistan'),(225,'VU','Vanuatu'),(226,'VE','Venezuela'),(227,'VN','Viet Nam'),(228,'VG','Virgin Islands (British)'),(229,'VI','Virgin Islands (U.S.)'),(230,'WF','Wallis and Futuna Islands'),(231,'EH','Western Sahara'),(232,'YE','Yemen'),(233,'ZM','Zambia'),(234,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `country_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `estate_id` int(11) DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_ext` char(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `upload_by` int(11) DEFAULT '0',
  `type` enum('AGM','ByLaws','Handbook') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate_events`
--

DROP TABLE IF EXISTS `estate_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estate_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `event_type` enum('public','estate_community','invite_only') NOT NULL,
  `description` text NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `allDay` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate_events`
--

LOCK TABLES `estate_events` WRITE;
/*!40000 ALTER TABLE `estate_events` DISABLE KEYS */;
INSERT INTO `estate_events` VALUES (10,1,'Backdating','public','Test','Pd','888888fhjh','Gjgj','2016-10-06 04:05:00','2016-10-08 12:00:00','1','2016-10-14 11:15:52',NULL),(12,1,'Marketing campaigns ','public','','','','','2012-12-22 03:25:00','2012-12-24 03:25:00','1','2016-10-20 03:21:52',NULL),(13,1,'','public','test','','','','2016-10-08 12:00:00','2016-10-09 12:00:00','1','2016-10-31 07:41:56',NULL),(14,1,'','estate_community','','','','','2016-09-27 12:00:00','2016-09-28 12:00:00','1','2016-10-31 07:42:12',NULL);
/*!40000 ALTER TABLE `estate_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate_images`
--

DROP TABLE IF EXISTS `estate_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estate_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) NOT NULL,
  `image_ext` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `image_type` enum('sitemap','logo','banner') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate_images`
--

LOCK TABLES `estate_images` WRITE;
/*!40000 ALTER TABLE `estate_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `estate_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate_staff`
--

DROP TABLE IF EXISTS `estate_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estate_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `estate_id` int(11) DEFAULT '0',
  `role_type` int(11) DEFAULT '0',
  `date_join` date DEFAULT NULL,
  `date_left` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate_staff`
--

LOCK TABLES `estate_staff` WRITE;
/*!40000 ALTER TABLE `estate_staff` DISABLE KEYS */;
INSERT INTO `estate_staff` VALUES (2,9,1,1,'0000-00-00','0000-00-00'),(3,10,1,2,'0000-00-00','0000-00-00'),(4,11,1,7,'0000-00-00','0000-00-00'),(5,17,1,8,NULL,NULL),(6,18,1,2,NULL,NULL),(7,19,1,3,NULL,NULL),(8,20,1,9,NULL,NULL),(9,21,1,4,NULL,NULL),(10,22,1,6,NULL,NULL),(11,23,1,1,NULL,NULL),(12,24,1,8,NULL,NULL),(13,25,1,10,NULL,NULL);
/*!40000 ALTER TABLE `estate_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estates`
--

DROP TABLE IF EXISTS `estates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state_province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `developer_1` varchar(30) NOT NULL,
  `developer_2` varchar(30) NOT NULL,
  `land_plot` varchar(30) NOT NULL,
  `tenure` varchar(30) NOT NULL,
  `management` int(11) NOT NULL DEFAULT '0',
  `management_contact` varchar(255) NOT NULL,
  `sitemap` int(11) NOT NULL DEFAULT '0',
  `logo` int(11) NOT NULL DEFAULT '0',
  `banner` int(11) NOT NULL DEFAULT '0',
  `floor_plan` varchar(255) NOT NULL DEFAULT 'icon-no-image.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `font_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estates`
--

LOCK TABLES `estates` WRITE;
/*!40000 ALTER TABLE `estates` DISABLE KEYS */;
INSERT INTO `estates` VALUES (1,'consta','asdfwef','aa','asdfddd','asfd','BB','8657545674','asdfsa','asdf','asdf','asdf','asdf',1,'asdf',0,0,0,'icon-no-image.png','2016-10-14 09:16:52','2016-10-11 16:58:29',3);
/*!40000 ALTER TABLE `estates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `facility_type` int(11) NOT NULL DEFAULT '0',
  `facility_name` varchar(255) NOT NULL,
  `facility_location` varchar(255) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `based` int(11) NOT NULL DEFAULT '0',
  `deposit` varchar(255) NOT NULL DEFAULT '',
  `facility_charge` varchar(255) DEFAULT NULL,
  `service_charge` varchar(255) DEFAULT NULL,
  `description` text,
  `equipment` varchar(1000) DEFAULT NULL,
  `rules` text,
  `reservation` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (5,1,1,'BBQ pit @ rooftop','penthouse rooftop','09:00:00','17:00:00',2,'50.00','30.00','10.70','description','Grill Pan,Spatula,Skillet,Water Tap','regulations<br>edited',1,1,'2016-10-19 06:01:48','2016-10-19 06:01:48'),(6,1,2,'Front Tower Swimming pool','New Tower','08:53:00','08:53:00',1,'0.00','0.00','0.00','','','',0,1,'2016-10-20 03:25:02',NULL),(7,1,5,'One','Bedok','14:29:00','19:29:00',1,'0.04','0.10','0.05','','','',1,1,'2016-10-31 11:30:11',NULL);
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_book`
--

DROP TABLE IF EXISTS `facility_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL DEFAULT '0',
  `bookdate` date NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `book_by` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_book`
--

LOCK TABLES `facility_book` WRITE;
/*!40000 ALTER TABLE `facility_book` DISABLE KEYS */;
INSERT INTO `facility_book` VALUES (13,5,'2016-10-27','19:51:00','19:51:00',0,10,'2016-10-24 11:52:18','2016-10-31 07:31:48'),(14,5,'2016-10-25','13:00:00','15:00:00',1,9,'2016-10-24 12:06:21','2016-10-31 07:31:56');
/*!40000 ALTER TABLE `facility_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_hours`
--

DROP TABLE IF EXISTS `facility_hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL DEFAULT '0',
  `weekday` int(11) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_hours`
--

LOCK TABLES `facility_hours` WRITE;
/*!40000 ALTER TABLE `facility_hours` DISABLE KEYS */;
INSERT INTO `facility_hours` VALUES (8,5,0,'09:00:00','17:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(9,5,1,'09:00:00','17:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(10,5,2,'09:00:00','17:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(11,5,3,'09:00:00','17:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(12,5,4,'09:00:00','17:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(13,5,5,'09:00:00','17:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(14,5,6,'08:00:00','13:00:00','2016-10-19 06:01:48','2016-10-19 06:01:48'),(15,6,0,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(16,6,1,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(17,6,2,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(18,6,3,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(19,6,4,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(20,6,5,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(21,6,6,'08:53:00','08:53:00','2016-10-20 03:25:02',NULL),(22,7,0,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL),(23,7,1,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL),(24,7,2,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL),(25,7,3,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL),(26,7,4,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL),(27,7,5,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL),(28,7,6,'14:29:00','19:29:00','2016-10-31 11:30:11',NULL);
/*!40000 ALTER TABLE `facility_hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_images`
--

DROP TABLE IF EXISTS `facility_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL DEFAULT '0',
  `image_name` varchar(255) NOT NULL,
  `image_ext` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_images`
--

LOCK TABLES `facility_images` WRITE;
/*!40000 ALTER TABLE `facility_images` DISABLE KEYS */;
INSERT INTO `facility_images` VALUES (2,3,'facility1_3_1476550551','JPG','2016-10-15 16:55:51',NULL),(3,4,'facility2_4_1476550917','jpg','2016-10-15 17:01:57',NULL),(4,5,'facility1_5_1476614500','JPG','2016-10-16 10:41:40',NULL);
/*!40000 ALTER TABLE `facility_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facility_types`
--

DROP TABLE IF EXISTS `facility_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facility_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `type_name` varchar(255) NOT NULL,
  `type_description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facility_types`
--

LOCK TABLES `facility_types` WRITE;
/*!40000 ALTER TABLE `facility_types` DISABLE KEYS */;
INSERT INTO `facility_types` VALUES (1,1,'Barbecue Pit',NULL,'2016-10-15 16:40:58',NULL),(2,1,'Swimming Pool',NULL,'2016-10-15 15:01:17',NULL),(3,1,'Tennis Court',NULL,'2016-10-15 15:01:17',NULL),(4,1,'Parking',NULL,'2016-10-15 15:01:18',NULL),(5,1,'Squash Court',NULL,'2016-10-15 15:01:18',NULL),(6,1,'Function Room',NULL,'2016-10-15 15:01:18',NULL),(7,1,'Gym',NULL,'2016-10-15 15:01:18',NULL),(8,1,'Sauna',NULL,'2016-10-15 15:01:18',NULL),(9,1,'Badminton Court',NULL,'2016-10-15 15:01:18',NULL),(10,1,'Basketball Court',NULL,'2016-10-15 15:01:19',NULL);
/*!40000 ALTER TABLE `facility_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial`
--

DROP TABLE IF EXISTS `financial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tb_code` int(11) NOT NULL DEFAULT '0',
  `tb_field` varchar(255) NOT NULL,
  `cm_actual` varchar(10) NOT NULL DEFAULT '0',
  `cm_budget` varchar(10) NOT NULL DEFAULT '0',
  `cm_variance` varchar(10) NOT NULL DEFAULT '0',
  `ytd_actual` varchar(10) NOT NULL DEFAULT '0',
  `ytd_budget` varchar(10) NOT NULL DEFAULT '0',
  `ytd_variance` varchar(10) NOT NULL DEFAULT '0',
  `ytd_last` varchar(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial`
--

LOCK TABLES `financial` WRITE;
/*!40000 ALTER TABLE `financial` DISABLE KEYS */;
INSERT INTO `financial` VALUES (1,1,'Income','178777','1788821','105551','1107261','1101','5359','1099331','2016-10-18 20:07:49','2016-10-18 20:08:13'),(2,4,'Bonus','-123','123','32','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(3,4,'Salary','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(4,4,'Overtime','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(5,4,'Shift Allowance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(6,4,'Incentive Allowance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(7,4,'Other Allowance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(8,4,'CPF','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(9,4,'SDF','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(10,4,'Fringe Benefit - Insurance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(11,4,'Medical','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(12,4,'dental','0','1758','-2590','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(13,4,'Staff Train Fund / Staff Welfair Fund','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(14,2,'aa','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(15,3,'bb','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(20,1,'eee','2','2','2','3','3','3','32','2016-10-18 20:36:49','2016-10-18 18:36:49');
/*!40000 ALTER TABLE `financial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_tb_code`
--

DROP TABLE IF EXISTS `financial_tb_code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financial_tb_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `tb_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_tb_code`
--

LOCK TABLES `financial_tb_code` WRITE;
/*!40000 ALTER TABLE `financial_tb_code` DISABLE KEYS */;
INSERT INTO `financial_tb_code` VALUES (1,1,'INCOME & EXPENDITURE SUMMARY',NULL),(2,1,'INCOME SUMMARY',NULL),(3,1,'MAINTENANCE COSTS',NULL),(4,1,'PERSONNEL COSTS',NULL),(5,1,'ADMINISTRATION COSTS',NULL);
/*!40000 ALTER TABLE `financial_tb_code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fonts`
--

DROP TABLE IF EXISTS `fonts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fonts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font_name` varchar(50) DEFAULT NULL,
  `font_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fonts`
--

LOCK TABLES `fonts` WRITE;
/*!40000 ALTER TABLE `fonts` DISABLE KEYS */;
INSERT INTO `fonts` VALUES (0,'Open Sans','serif'),(1,'Proza Libre','sans-serif'),(2,'Abril Fatface','cursive'),(3,'Poiret One','cursive'),(4,'Alegreya','serif'),(5,'Source Code Pro','monospace'),(6,'Comfortaa','cursive');
/*!40000 ALTER TABLE `fonts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `job_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES (5,1,'Repair','Repair Everything...','2016-10-14 09:42:19',NULL);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `job_id` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `priority` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `date_reported` date DEFAULT NULL,
  `date_assigned` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
INSERT INTO `maintenance` VALUES (21,1,5,0,'erwe','werwrweFDWCwdf',2,12,4,100,NULL,NULL,NULL,'2016-10-31 08:20:05',NULL);
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance_attach`
--

DROP TABLE IF EXISTS `maintenance_attach`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenance_attach` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `maintenance_id` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_ext` char(10) NOT NULL,
  `file_type` char(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance_attach`
--

LOCK TABLES `maintenance_attach` WRITE;
/*!40000 ALTER TABLE `maintenance_attach` DISABLE KEYS */;
/*!40000 ALTER TABLE `maintenance_attach` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moving`
--

DROP TABLE IF EXISTS `moving`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moving` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `moving_date` date DEFAULT NULL,
  `building` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moving`
--

LOCK TABLES `moving` WRITE;
/*!40000 ALTER TABLE `moving` DISABLE KEYS */;
INSERT INTO `moving` VALUES (4,1,'2016-11-01',12,14,108,'pending','2016-10-31 08:19:04',NULL);
/*!40000 ALTER TABLE `moving` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('wang_xiaoming111@yahoo.com','728e6623e0f25657360c450b7b33fe388425188417290065080304911df0f8cd','2016-10-23 12:51:24');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll_answers`
--

DROP TABLE IF EXISTS `poll_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `answer` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_answers`
--

LOCK TABLES `poll_answers` WRITE;
/*!40000 ALTER TABLE `poll_answers` DISABLE KEYS */;
INSERT INTO `poll_answers` VALUES (4,5,9,0,'2016-10-14 10:22:00',NULL),(5,6,9,1,'2016-10-16 10:35:59',NULL),(6,5,11,0,'2016-10-20 03:22:24',NULL),(7,6,11,1,'2016-10-20 03:22:29',NULL);
/*!40000 ALTER TABLE `poll_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll_options`
--

DROP TABLE IF EXISTS `poll_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL DEFAULT '0',
  `option` varchar(255) NOT NULL,
  `option_value` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_options`
--

LOCK TABLES `poll_options` WRITE;
/*!40000 ALTER TABLE `poll_options` DISABLE KEYS */;
INSERT INTO `poll_options` VALUES (9,5,'Kung fu',0,'2016-10-14 10:01:34',NULL),(10,5,'Tai chi',1,'2016-10-14 10:01:34',NULL),(11,6,'Yes',0,'2016-10-14 11:14:00',NULL),(12,6,'a bit',1,'2016-10-14 11:14:00',NULL),(13,6,'Never',2,'2016-10-14 11:14:00',NULL);
/*!40000 ALTER TABLE `poll_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `polls`
--

DROP TABLE IF EXISTS `polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `polls`
--

LOCK TABLES `polls` WRITE;
/*!40000 ALTER TABLE `polls` DISABLE KEYS */;
INSERT INTO `polls` VALUES (5,1,'You like kung-fu or Tai chi','2016-10-14 10:01:34',NULL),(6,1,'Do you like a pet?','2016-10-14 11:14:00',NULL);
/*!40000 ALTER TABLE `polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_ext` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Estate Developer','Developer of Estate'),(2,'Estate Manager','Manager of Estate'),(3,'Estate Officer',''),(4,'Owner',''),(5,'Owner-member',''),(6,'Tenant',''),(7,'Tenant-member',''),(8,'Guest',''),(9,'Estate Council',''),(10,'Visitor','');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey`
--

DROP TABLE IF EXISTS `survey`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey`
--

LOCK TABLES `survey` WRITE;
/*!40000 ALTER TABLE `survey` DISABLE KEYS */;
INSERT INTO `survey` VALUES (7,1,'test survey','2016-10-31 08:07:08',NULL),(8,1,'this i a question','2016-11-01 02:41:47',NULL);
/*!40000 ALTER TABLE `survey` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `survey_answers`
--

DROP TABLE IF EXISTS `survey_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `survey_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `survey_answers`
--

LOCK TABLES `survey_answers` WRITE;
/*!40000 ALTER TABLE `survey_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `survey_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit_images`
--

DROP TABLE IF EXISTS `unit_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) DEFAULT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_ext` varchar(255) NOT NULL,
  `original_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit_images`
--

LOCK TABLES `unit_images` WRITE;
/*!40000 ALTER TABLE `unit_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `unit_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) DEFAULT '0',
  `unit_type` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_size_sqft` double DEFAULT '0',
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `given_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `family_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `visit_estate_id` int(11) NOT NULL DEFAULT '0',
  `image_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_ext` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'wang','wang_xiaoming111@yahoo.com','$2y$10$pcPVXtOrTGa8CLlqB8YDv.NqBXV1UsPSljalfbhGnZrknMq0eNT62','2016-10-07 16:36:02','2016-10-20 13:59:15','Wang','Xiaoming','Heilongjia','Harbin','CN','tHxKTu6R9kRkm6dyahNFKZ9z7TEAfbFPqYZphYYmYsZixB6zHMSIIYEwTEUZ',7,1,'wang_9_1476971955','png'),(10,'hongseow','pseow@variantz.com','$2y$10$Ws7FpssCUYe.RPh6KK8MyuS.bdYqBetbaMaJ0guhrgTIwLGqLab0a','2016-10-07 16:40:57','2016-10-24 12:13:51','Seow','Philip','7 Boon Keng Road #29-136','Singapore','SG','EbIJnruD0rBLnvdxyoxBaba3A6fWS74B66VnrHhDPUglVvr4Helin3GHiFWU',0,1,'',''),(11,'amalhotra','amalhotra@myvariantz.com','$2y$10$bSaSuVW7Kb3ZfJnbe6irteAJsuBbun3RJ9XqsFIi.pevHgOYIqZ62','2016-10-07 19:44:46','2016-10-07 19:44:46','Ashish','Malhotra','NCR','Delhi','IN',NULL,0,1,'',''),(18,'manager','manager@reziden.com','$2y$10$p8sAipYafuE31ElHhToufeADKqz0mpDVZYzOusjbPOkK7cz7RCw1W','2016-10-24 15:51:19','2016-10-24 15:52:04','given','family','7','boon keng','SG','eipicD9N9e6HNZMTmqHS4rtrmCAkTNla0shXF0dOrDI1hlX0R0OsRGivIQB1',0,0,NULL,NULL),(19,'officer','officer@reziden.com','$2y$10$H9hvjechDZEH.Cx0NITB4uba22ucQpmJvGaynNiQDWAuE9frDSIP.','2016-10-24 15:52:58','2016-10-24 15:53:46','given','family','7','bk','SG','2pld67POP1caCXdqGZqFta4YboBGxGytdqJOykUuH5sp8ZrQ8KwwxGWdRQr1',0,0,NULL,NULL),(20,'council','council@reziden.com','$2y$10$jx5jl5HCo1Ful1E4QtgoUOKP6JgchLNdZftNOkGkL.lWgmg1kW0BG','2016-10-24 15:54:26','2016-10-24 15:55:01','given','family','7','bk','SG','77S5Jy0XEEW5tH4oRwvig7f1RsveSIysEySitr3GgVxjLLt6YFosZSCHkkMa',0,0,NULL,NULL),(21,'owner','owner@reziden.com','$2y$10$/vcQ5BlL1ds.pB6cHEnV0.mFw8gdg6LaNv5Dg9k5RieF479BgaZ5e','2016-10-24 15:55:36','2016-10-24 15:55:40','given','family','7','bk','SG','uI7KGgB0bUVdDxh4ccm5yZAIIE8QBoCjzj0ivViagLSZSF2BMwVujMyPZCW8',0,0,NULL,NULL),(22,'tenant','tenant@reziden.com','$2y$10$iLdToNkeGOhHnmmQvqzlRuv7hU7GD1HeNjHadO.AYLFesWIVRKcgG','2016-10-24 15:56:44','2016-10-24 16:05:22','given','family','7 bk','bk','SG','Lhy8k0dHdAROXLbSDxvvjmXWs1XhMRMkI5ecUjhA4uFLxYWsqE6hvGpMzvUi',0,0,NULL,NULL),(23,'developer','developer@reziden.com','$2y$10$gbTLjUDKt8e9bJ.BOPynyuaGLbgx.KuB.TzkRJ5mY1PUQ4y2P93G2','2016-10-24 16:06:16','2016-10-24 16:06:22','given','family','7','bk','SG','UnZnCnE5B8xPecSqKRlGhAYvVgyGss80DLvvnVYKoIyKJXan8kdeKWJKOdTm',0,0,NULL,NULL),(24,'guest','guest@reziden.com','$2y$10$NZE.813fIHyQuf4Z/nlI6.02qU0xfdjCli8EMBIVW/lj.yi8iXP6G','2016-10-24 16:07:52','2016-10-24 16:10:43','given','family','27 ','paya lebar','SG','dee8pkMPuz9fdSia1pKpJoEgZ69hFCX0ZDm6gGpExESb0vjYCh8tV7d2jzDH',0,0,NULL,NULL),(25,'visitor','visitor@reziden.com','$2y$10$8w9S/1pbh9yD8POkB/xPPudy0Hs0TqQI8itOHKFLLOOu1WeNKfyUy','2016-10-24 16:11:34','2016-10-24 16:11:40','given','family','04-06','sembawang','SG','i3Bx2jY9mniZekPzqnmZEfgLp16WQz3TPNxSyb9VhfvRPj0VloiUOg5DMa8z',0,0,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warranty`
--

DROP TABLE IF EXISTS `warranty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warranty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `merchant` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_country` varchar(5) DEFAULT NULL,
  `activation_date` date DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warranty`
--

LOCK TABLES `warranty` WRITE;
/*!40000 ALTER TABLE `warranty` DISABLE KEYS */;
INSERT INTO `warranty` VALUES (8,'Pen-apple-pineapple-pen','M16000','invisible','43546789p[0poikjhggfdrty6786978','PPAP',19,'2016-10-02','SG','2017-10-01',NULL,NULL,'2016-10-31 08:06:41',NULL);
/*!40000 ALTER TABLE `warranty` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-02  2:48:32
