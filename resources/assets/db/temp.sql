/*
SQLyog Ultimate v11.32 (64 bit)
MySQL - 10.1.13-MariaDB : Database - reziden
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`reziden` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `reziden`;

/*Table structure for table `announcements` */

DROP TABLE IF EXISTS `announcements`;

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `estate_id` int(11) DEFAULT '0',
  `announcement_type` enum('resident','manager') NOT NULL,
  `publisher_id` int(11) DEFAULT '0',
  `updated_by` int(11) DEFAULT '0',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `announcements` */

insert  into `announcements`(`id`,`subject`,`message`,`estate_id`,`announcement_type`,`publisher_id`,`updated_by`,`datetime`,`updated_at`) values (20,'asfwef','asdfwefssss',1,'resident',8,8,'2016-10-10 16:19:01','2016-10-09 04:33:30'),(21,'wefasdfwef','asdfwef',1,'manager',10,10,'2016-10-10 16:19:01',NULL),(22,'sdfwef','sdfwe',1,'manager',10,10,'2016-10-10 16:19:02',NULL),(23,'aaa','aaa',1,'resident',8,8,'2016-10-10 16:19:02',NULL),(24,'sfsdf','sdfsdf',1,'resident',8,8,'2016-10-10 16:19:03',NULL),(25,'asfsadf','wefsdf',1,'resident',8,8,'2016-10-10 16:19:03',NULL),(26,'sdfsdf','sdfsdf',1,'resident',8,8,'2016-10-09 16:27:58',NULL),(27,'asdfasdf','wefwef',0,'manager',8,8,'2016-10-16 15:56:24',NULL);

/*Table structure for table `country_code` */

DROP TABLE IF EXISTS `country_code`;

CREATE TABLE `country_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=utf8;

/*Data for the table `country_code` */

insert  into `country_code`(`id`,`code`,`country_name`) values (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'AS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AR','Argentina'),(9,'AM','Armenia'),(10,'AW','Aruba'),(11,'AU','Australia'),(12,'AT','Austria'),(13,'AZ','Azerbaijan'),(14,'BS','Bahamas'),(15,'BH','Bahrain'),(16,'BD','Bangladesh'),(17,'BB','Barbados'),(18,'BY','Belarus'),(19,'BE','Belgium'),(20,'BZ','Belize'),(21,'BJ','Benin'),(22,'BM','Bermuda'),(23,'BT','Bhutan'),(24,'BO','Bolivia'),(25,'BA','Bosnia and Herzegowina'),(26,'BW','Botswana'),(27,'BV','Bouvet Island'),(28,'BR','Brazil'),(29,'IO','British Indian Ocean Territory'),(30,'BN','Brunei Darussalam'),(31,'BG','Bulgaria'),(32,'BF','Burkina Faso'),(33,'BI','Burundi'),(34,'KH','Cambodia'),(35,'CM','Cameroon'),(36,'CA','Canada'),(37,'CV','Cape Verde'),(38,'KY','Cayman Islands'),(39,'CF','Central African Republic'),(40,'TD','Chad'),(41,'CL','Chile'),(42,'CN','China'),(43,'CX','Christmas Island'),(44,'CC','Cocos (Keeling) Islands'),(45,'CO','Colombia'),(46,'KM','Comoros'),(47,'CG','Congo'),(48,'CD','Congo, the Democratic Republic of the'),(49,'CK','Cook Islands'),(50,'CR','Costa Rica'),(51,'CI','Cote d\'Ivoire'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'EC','Ecuador'),(61,'EG','Egypt'),(62,'SV','El Salvador'),(63,'GQ','Equatorial Guinea'),(64,'ER','Eritrea'),(65,'EE','Estonia'),(66,'ET','Ethiopia'),(67,'FK','Falkland Islands (Malvinas)'),(68,'FO','Faroe Islands'),(69,'FJ','Fiji'),(70,'FI','Finland'),(71,'FR','France'),(72,'GF','French Guiana'),(73,'PF','French Polynesia'),(74,'TF','French Southern Territories'),(75,'GA','Gabon'),(76,'GM','Gambia'),(77,'GE','Georgia'),(78,'DE','Germany'),(79,'GH','Ghana'),(80,'GI','Gibraltar'),(81,'GR','Greece'),(82,'GL','Greenland'),(83,'GD','Grenada'),(84,'GP','Guadeloupe'),(85,'GU','Guam'),(86,'GT','Guatemala'),(87,'GN','Guinea'),(88,'GW','Guinea-Bissau'),(89,'GY','Guyana'),(90,'HT','Haiti'),(91,'HM','Heard and Mc Donald Islands'),(92,'VA','Holy See (Vatican City State)'),(93,'HN','Honduras'),(94,'HK','Hong Kong'),(95,'HU','Hungary'),(96,'IS','Iceland'),(97,'IN','India'),(98,'ID','Indonesia'),(99,'IR','Iran (Islamic Republic of)'),(100,'IQ','Iraq'),(101,'IE','Ireland'),(102,'IL','Israel'),(103,'IT','Italy'),(104,'JM','Jamaica'),(105,'JP','Japan'),(106,'JO','Jordan'),(107,'KZ','Kazakhstan'),(108,'KE','Kenya'),(109,'KI','Kiribati'),(110,'KP','Korea, Democratic People\'s Republic of'),(111,'KR','Korea, Republic of'),(112,'KW','Kuwait'),(113,'KG','Kyrgyzstan'),(114,'LA','Lao People\'s Democratic Republic'),(115,'LV','Latvia'),(116,'LB','Lebanon'),(117,'LS','Lesotho'),(118,'LR','Liberia'),(119,'LY','Libyan Arab Jamahiriya'),(120,'LI','Liechtenstein'),(121,'LT','Lithuania'),(122,'LU','Luxembourg'),(123,'MO','Macau'),(124,'MK','Macedonia, The Former Yugoslav Republic of'),(125,'MG','Madagascar'),(126,'MW','Malawi'),(127,'MY','Malaysia'),(128,'MV','Maldives'),(129,'ML','Mali'),(130,'MT','Malta'),(131,'MH','Marshall Islands'),(132,'MQ','Martinique'),(133,'MR','Mauritania'),(134,'MU','Mauritius'),(135,'YT','Mayotte'),(136,'MX','Mexico'),(137,'FM','Micronesia, Federated States of'),(138,'MD','Moldova, Republic of'),(139,'MC','Monaco'),(140,'MN','Mongolia'),(141,'MS','Montserrat'),(142,'MA','Morocco'),(143,'MZ','Mozambique'),(144,'MM','Myanmar'),(145,'NA','Namibia'),(146,'NR','Nauru'),(147,'NP','Nepal'),(148,'NL','Netherlands'),(149,'AN','Netherlands Antilles'),(150,'NC','New Caledonia'),(151,'NZ','New Zealand'),(152,'NI','Nicaragua'),(153,'NE','Niger'),(154,'NG','Nigeria'),(155,'NU','Niue'),(156,'NF','Norfolk Island'),(157,'MP','Northern Mariana Islands'),(158,'NO','Norway'),(159,'OM','Oman'),(160,'PK','Pakistan'),(161,'PW','Palau'),(162,'PA','Panama'),(163,'PG','Papua New Guinea'),(164,'PY','Paraguay'),(165,'PE','Peru'),(166,'PH','Philippines'),(167,'PN','Pitcairn'),(168,'PL','Poland'),(169,'PT','Portugal'),(170,'PR','Puerto Rico'),(171,'QA','Qatar'),(172,'RE','Reunion'),(173,'RO','Romania'),(174,'RU','Russian Federation'),(175,'RW','Rwanda'),(176,'KN','Saint Kitts and Nevis'),(177,'LC','Saint LUCIA'),(178,'VC','Saint Vincent and the Grenadines'),(179,'WS','Samoa'),(180,'SM','San Marino'),(181,'ST','Sao Tome and Principe'),(182,'SA','Saudi Arabia'),(183,'SN','Senegal'),(184,'SC','Seychelles'),(185,'SL','Sierra Leone'),(186,'SG','Singapore'),(187,'SK','Slovakia (Slovak Republic)'),(188,'SI','Slovenia'),(189,'SB','Solomon Islands'),(190,'SO','Somalia'),(191,'ZA','South Africa'),(192,'GS','South Georgia and the South Sandwich Islands'),(193,'ES','Spain'),(194,'LK','Sri Lanka'),(195,'SH','St. Helena'),(196,'PM','St. Pierre and Miquelon'),(197,'SD','Sudan'),(198,'SR','Suriname'),(199,'SJ','Svalbard and Jan Mayen Islands'),(200,'SZ','Swaziland'),(201,'SE','Sweden'),(202,'CH','Switzerland'),(203,'SY','Syrian Arab Republic'),(204,'TW','Taiwan, Province of China'),(205,'TJ','Tajikistan'),(206,'TZ','Tanzania, United Republic of'),(207,'TH','Thailand'),(208,'TG','Togo'),(209,'TK','Tokelau'),(210,'TO','Tonga'),(211,'TT','Trinidad and Tobago'),(212,'TN','Tunisia'),(213,'TR','Turkey'),(214,'TM','Turkmenistan'),(215,'TC','Turks and Caicos Islands'),(216,'TV','Tuvalu'),(217,'UG','Uganda'),(218,'UA','Ukraine'),(219,'AE','United Arab Emirates'),(220,'GB','United Kingdom'),(221,'US','United States'),(222,'UM','United States Minor Outlying Islands'),(223,'UY','Uruguay'),(224,'UZ','Uzbekistan'),(225,'VU','Vanuatu'),(226,'VE','Venezuela'),(227,'VN','Viet Nam'),(228,'VG','Virgin Islands (British)'),(229,'VI','Virgin Islands (U.S.)'),(230,'WF','Wallis and Futuna Islands'),(231,'EH','Western Sahara'),(232,'YE','Yemen'),(233,'ZM','Zambia'),(234,'ZW','Zimbabwe');

/*Table structure for table `documents` */

DROP TABLE IF EXISTS `documents`;

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

/*Data for the table `documents` */

insert  into `documents`(`id`,`title`,`estate_id`,`file_name`,`file_ext`,`created_at`,`updated_at`,`upload_by`,`type`) values (1,'Estate Administration - ByLaws',1,'1476154466','pdf','2016-10-11 04:54:26',NULL,8,'ByLaws'),(2,'Estate Administration - ByLaws',1,'1476157440','docx','2016-10-11 05:44:00',NULL,8,'ByLaws'),(3,'Estate Administration - Handbook',1,'1476158372','docx','2016-10-11 05:59:32',NULL,8,'Handbook'),(4,'Estate Administration - Handbook',1,'1476177901','docx','2016-10-11 11:25:01',NULL,8,'Handbook'),(5,'Estate Administration - Handbook',1,'1476177928','docx','2016-10-11 11:25:28',NULL,8,'Handbook'),(6,'Estate Administration - AGM',1,'1476177960','docx','2016-10-11 11:26:00',NULL,8,'AGM'),(7,'Estate Administration - AGM',1,'AGM_1_1476205791','docx','2016-10-11 19:09:51',NULL,8,'AGM'),(8,'Estate Administration - AGM',1,'AGM_1_1476327205','docx','2016-10-13 04:53:25',NULL,8,'AGM');

/*Table structure for table `estate_events` */

DROP TABLE IF EXISTS `estate_events`;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `estate_events` */

insert  into `estate_events`(`id`,`estate_id`,`title`,`event_type`,`description`,`contact_person`,`contact_number`,`contact_email`,`start`,`end`,`allDay`,`created_at`,`updated_at`) values (3,1,'asdfwefasdfwefccc','public','asdfwef','asfwef','asdfwef','sfewf','2016-10-19 12:00:00','2016-10-20 12:00:00','1','2016-10-12 15:10:40','2016-10-12 13:10:40'),(4,1,'sfwefffff','public','asdfwef','asfwef','asdfwef','asfdwef','2016-10-03 12:00:00','2016-10-04 12:00:00','0','2016-10-12 14:58:47','2016-10-12 12:58:47'),(5,1,'ccc','estate_community','cc','cc','cc','cc','2016-10-06 12:00:00','2016-10-07 12:00:00','1','2016-10-12 15:00:35',NULL),(6,1,'ffff','public','sadfsaf','asdfsafd','asdfsaf','sadfasf','2016-10-07 12:00:00','2016-10-08 12:00:00','1','2016-10-12 15:02:09',NULL),(7,1,'123fff','public','fff','ss','ff','ssff','2016-10-18 12:00:00','2016-10-19 12:00:00','1','2016-10-12 15:21:34','2016-10-12 13:21:34'),(8,1,'fff','public','ff','ff','ff','ff','2016-10-14 12:00:00','2016-10-15 12:00:00','1','2016-10-12 15:04:17',NULL),(9,1,'asdfwef','public','sfwef','sfwef','sfwef','wefsdf','2016-10-21 12:00:00','2016-10-22 12:00:00','1','2016-10-12 15:04:30',NULL);

/*Table structure for table `estate_images` */

DROP TABLE IF EXISTS `estate_images`;

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

/*Data for the table `estate_images` */

insert  into `estate_images`(`id`,`image_name`,`image_ext`,`original_name`,`image_type`,`created_at`,`updated_at`) values (2,'logo_1_1476201558','jpg','dutchme.jpg','logo','2016-10-11 17:59:18',NULL),(3,'sitemap_1_1476205102','jpg','b-749958.jpg','sitemap','2016-10-11 18:58:22',NULL),(4,'banner_1_1476205109','png','ribbon-right.png','banner','2016-10-11 18:58:29',NULL);

/*Table structure for table `estate_staff` */

DROP TABLE IF EXISTS `estate_staff`;

CREATE TABLE `estate_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0',
  `staff_id` int(11) DEFAULT '0',
  `role_type` int(11) DEFAULT '0',
  `date_join` date NOT NULL,
  `date_left` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `estate_staff` */

insert  into `estate_staff`(`id`,`user_id`,`staff_id`,`role_type`,`date_join`,`date_left`) values (1,8,1,1,'0000-00-00','0000-00-00');

/*Table structure for table `estates` */

DROP TABLE IF EXISTS `estates`;

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

/*Data for the table `estates` */

insert  into `estates`(`id`,`name`,`slogan`,`address`,`city`,`state_province`,`country`,`phone_number`,`email`,`developer_1`,`developer_2`,`land_plot`,`tenure`,`management`,`management_contact`,`sitemap`,`logo`,`banner`,`floor_plan`,`created_at`,`updated_at`,`font_id`) values (1,'consta','asdfwef','aa','asdfddd','asfd','BB','8657545674','asdfsa','asdf','asdf','asdf','asdf',1,'asdf',3,2,4,'floorplan_1.jpg','2016-10-11 18:58:29','2016-10-11 16:58:29',3);

/*Table structure for table `facilities` */

DROP TABLE IF EXISTS `facilities`;

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `facility_type` int(11) NOT NULL DEFAULT '0',
  `facility_name` varchar(255) NOT NULL,
  `facility_location` varchar(255) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `deposit` varchar(255) DEFAULT NULL,
  `facility_charge` varchar(255) DEFAULT NULL,
  `service_charge` varchar(255) DEFAULT NULL,
  `based` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `equipment` varchar(1000) DEFAULT NULL,
  `rules` text,
  `reservation` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `facilities` */

insert  into `facilities`(`id`,`estate_id`,`facility_type`,`facility_name`,`facility_location`,`start`,`end`,`deposit`,`facility_charge`,`service_charge`,`based`,`description`,`equipment`,`rules`,`reservation`,`status`,`created_at`,`updated_at`) values (7,2,3,'kids','leee','08:09:00','08:09:00','5.80','4.30','3.10',0,'','aaa,bbb,ccc','<b>asdfasdf</b>',1,0,'2016-10-17 17:11:07','2016-10-17 10:35:08'),(10,1,1,'Good Place to Rest','Heliongjia','09:00:00','18:00:00','5.01','20.00','3.00',2,'There are many thing to fry meat.','fry pane','Don\'t steal anything.',1,1,'2016-10-17 12:33:10','2016-10-17 10:33:10');

/*Table structure for table `facility_book` */

DROP TABLE IF EXISTS `facility_book`;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `facility_book` */

insert  into `facility_book`(`id`,`facility_id`,`bookdate`,`start`,`end`,`status`,`book_by`,`created_at`,`updated_at`) values (1,7,'0000-00-00','09:05:00','11:05:00',0,8,'2016-10-17 16:54:15',NULL),(3,7,'0000-00-00','12:23:00','13:28:00',0,8,'2016-10-17 16:54:15',NULL),(4,7,'0000-00-00','08:28:00','08:40:00',0,8,'2016-10-17 16:54:16',NULL),(6,10,'2016-10-17','17:00:00','18:00:00',0,8,'2016-10-17 17:33:02','2016-10-17 15:33:02'),(7,10,'2016-10-17','13:00:00','15:00:00',0,8,'2016-10-17 17:33:05','2016-10-17 15:33:05'),(8,10,'2016-10-25','16:14:00','16:14:00',1,8,'2016-10-17 17:31:22','2016-10-17 15:31:22'),(9,10,'2016-10-26','11:00:00','13:00:00',0,8,'2016-10-17 16:54:16',NULL),(10,7,'2016-10-24','11:21:00','16:21:00',0,8,'2016-10-17 16:54:20',NULL),(11,10,'2016-10-24','15:00:00','17:00:00',1,8,'2016-10-18 04:13:14','2016-10-18 02:13:14'),(12,10,'2016-10-24','13:00:00','15:00:00',1,8,'2016-10-18 02:17:33','2016-10-18 02:17:55');

/*Table structure for table `facility_hours` */

DROP TABLE IF EXISTS `facility_hours`;

CREATE TABLE `facility_hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL DEFAULT '0',
  `weekday` int(11) NOT NULL,
  `start` time DEFAULT NULL,
  `end` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `facility_hours` */

insert  into `facility_hours`(`id`,`facility_id`,`weekday`,`start`,`end`,`created_at`,`updated_at`) values (1,7,0,'08:09:00','08:09:00','2016-10-17 12:35:08','2016-10-17 10:35:08'),(2,7,1,'08:15:00','22:12:00','2016-10-17 12:35:08','2016-10-17 10:35:08'),(3,7,2,'08:09:00','01:21:00','2016-10-17 12:35:09','2016-10-17 10:35:09'),(4,7,3,'08:09:00','08:09:00','2016-10-17 12:35:09','2016-10-17 10:35:09'),(5,7,4,'08:09:00','08:09:00','2016-10-17 12:35:09','2016-10-17 10:35:09'),(6,7,5,'08:09:00','08:09:00','2016-10-17 12:35:09','2016-10-17 10:35:09'),(7,7,6,'08:09:00','08:09:00','2016-10-17 12:35:09','2016-10-17 10:35:09'),(8,8,0,'12:03:00','12:03:00','2016-10-17 12:13:38',NULL),(9,8,1,'12:03:00','12:03:00','2016-10-17 12:13:38',NULL),(10,8,2,'12:03:00','12:03:00','2016-10-17 12:13:38',NULL),(11,8,3,'12:03:00','12:03:00','2016-10-17 12:13:38',NULL),(12,8,4,'12:03:00','12:03:00','2016-10-17 12:13:39',NULL),(13,8,5,'12:03:00','12:03:00','2016-10-17 12:13:39',NULL),(14,8,6,'12:03:00','12:03:00','2016-10-17 12:13:39',NULL),(15,9,0,'12:14:00','12:14:00','2016-10-17 12:14:32',NULL),(16,9,1,'12:14:00','12:14:00','2016-10-17 12:14:33',NULL),(17,9,2,'12:14:00','12:14:00','2016-10-17 12:14:33',NULL),(18,9,3,'12:14:00','12:14:00','2016-10-17 12:14:33',NULL),(19,9,4,'12:14:00','12:14:00','2016-10-17 12:14:33',NULL),(20,9,5,'12:14:00','12:14:00','2016-10-17 12:14:33',NULL),(21,9,6,'12:14:00','12:14:00','2016-10-17 12:14:33',NULL),(22,10,0,'09:00:00','20:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10'),(23,10,1,'09:00:00','18:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10'),(24,10,2,'09:00:00','18:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10'),(25,10,3,'09:00:00','18:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10'),(26,10,4,'09:00:00','18:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10'),(27,10,5,'09:00:00','18:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10'),(28,10,6,'09:00:00','18:00:00','2016-10-17 12:33:10','2016-10-17 10:33:10');

/*Table structure for table `facility_images` */

DROP TABLE IF EXISTS `facility_images`;

CREATE TABLE `facility_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL DEFAULT '0',
  `image_name` varchar(255) NOT NULL,
  `image_ext` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `facility_images` */

insert  into `facility_images`(`id`,`facility_id`,`image_name`,`image_ext`,`created_at`,`updated_at`) values (1,7,'facility3_7_1476700307','jpg','2016-10-17 12:31:47','2016-10-17 10:31:47'),(2,10,'facility1_10_1476700295','jpg','2016-10-17 12:31:35',NULL);

/*Table structure for table `facility_types` */

DROP TABLE IF EXISTS `facility_types`;

CREATE TABLE `facility_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `type_name` varchar(255) NOT NULL,
  `type_description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `facility_types` */

insert  into `facility_types`(`id`,`estate_id`,`type_name`,`type_description`,`created_at`,`updated_at`) values (1,1,'Barbeque Pit',NULL,'2016-10-15 15:01:17',NULL),(2,1,'Swimming Pool',NULL,'2016-10-15 15:01:17',NULL),(3,1,'Tennis Court',NULL,'2016-10-15 15:01:17',NULL),(4,1,'Parking',NULL,'2016-10-15 15:01:18',NULL),(5,1,'Squash Court',NULL,'2016-10-15 15:01:18',NULL),(6,1,'Function Room',NULL,'2016-10-15 15:01:18',NULL),(7,1,'Gym',NULL,'2016-10-15 15:01:18',NULL),(8,1,'Sauna',NULL,'2016-10-15 15:01:18',NULL),(9,1,'Badminton Court',NULL,'2016-10-15 15:01:18',NULL),(10,1,'Basketball Court',NULL,'2016-10-15 15:01:19',NULL);

/*Table structure for table `financial` */

DROP TABLE IF EXISTS `financial`;

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

/*Data for the table `financial` */

insert  into `financial`(`id`,`tb_code`,`tb_field`,`cm_actual`,`cm_budget`,`cm_variance`,`ytd_actual`,`ytd_budget`,`ytd_variance`,`ytd_last`,`created_at`,`updated_at`) values (1,1,'Income','178777','1788821','105551','1107261','1101','5359','1099331','2016-10-18 20:07:49','2016-10-18 20:08:13'),(2,4,'Bonus','-123','123','32','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(3,4,'Salary','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(4,4,'Overtime','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(5,4,'Shift Allowance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(6,4,'Incentive Allowance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(7,4,'Other Allowance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(8,4,'CPF','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(9,4,'SDF','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(10,4,'Fringe Benefit - Insurance','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(11,4,'Medical','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(12,4,'dental','0','1758','-2590','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(13,4,'Staff Train Fund / Staff Welfair Fund','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(14,2,'aa','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(15,3,'bb','0','0','0','0','0','0','0','2016-10-18 20:07:49','2016-10-18 20:08:13'),(20,1,'eee','2','2','2','3','3','3','32','2016-10-18 20:36:49','2016-10-18 18:36:49');

/*Table structure for table `financial_tb_code` */

DROP TABLE IF EXISTS `financial_tb_code`;

CREATE TABLE `financial_tb_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `tb_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `financial_tb_code` */

insert  into `financial_tb_code`(`id`,`estate_id`,`tb_name`,`updated_at`) values (1,1,'INCOME & EXPENDITURE SUMMARY',NULL),(2,1,'INCOME SUMMARY',NULL),(3,1,'MAINTENANCE COSTS',NULL),(4,1,'PERSONNEL COSTS',NULL),(5,1,'ADMINISTRATION COSTS',NULL);

/*Table structure for table `fonts` */

DROP TABLE IF EXISTS `fonts`;

CREATE TABLE `fonts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `font_name` varchar(50) DEFAULT NULL,
  `font_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `fonts` */

insert  into `fonts`(`id`,`font_name`,`font_type`) values (0,'Open Sans','serif'),(1,'Proza Libre','sans-serif'),(2,'Abril Fatface','cursive'),(3,'Poiret One','cursive'),(4,'Alegreya','serif'),(5,'Source Code Pro','monospace'),(6,'Comfortaa','cursive');

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `job_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `jobs` */

insert  into `jobs`(`id`,`estate_id`,`job_name`,`description`,`created_at`,`updated_at`) values (1,1,'asdfwef','asfwef','2016-10-13 13:17:47',NULL),(2,1,'qerqwer','qwerqwer','2016-10-13 13:19:01',NULL),(3,1,'asdf','asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','2016-10-13 14:14:20',NULL),(4,1,'asdf','asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd	asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd	asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd	asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd	asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd	asdfwefsdfwefkjalkdfjwelkfj;laskjflejfl;kjfl;wekjfl;askjflewkjfla;sdjdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','2016-10-13 14:14:35',NULL),(5,1,'asdfwef','sdfwef','2016-10-16 15:56:43',NULL);

/*Table structure for table `maintenance` */

DROP TABLE IF EXISTS `maintenance`;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `maintenance` */

insert  into `maintenance`(`id`,`estate_id`,`job_id`,`status`,`subject`,`details`,`priority`,`building`,`level`,`unit`,`date_reported`,`date_assigned`,`date_completed`,`created_at`,`updated_at`) values (1,1,1,0,'asdfe','asfwef',3,23,43,23,NULL,NULL,NULL,'2016-10-13 15:15:51','2016-10-13 13:15:51'),(2,1,1,2,'asdfwef','asfwef',3,23,41,234,NULL,NULL,NULL,'2016-10-13 15:15:47','2016-10-13 13:15:47'),(3,1,1,2,'sfwef','asfwef',3,111,111,111,NULL,NULL,NULL,'2016-10-13 15:11:59','2016-10-13 13:11:59'),(4,1,1,0,'asfwef','asdfwef',3,35,234,234,NULL,NULL,NULL,'2016-10-13 17:39:48',NULL),(5,1,1,2,'sfwef','asfwef',3,12,23,23,NULL,NULL,NULL,'2016-10-13 18:00:51','2016-10-13 16:00:51'),(6,1,1,0,'fsfwe','sdfwef',3,333,33,333,NULL,NULL,NULL,'2016-10-13 17:46:30',NULL),(7,1,1,0,'asfd','asdf',3,234,1234,234,NULL,NULL,NULL,'2016-10-13 17:48:05',NULL),(8,1,1,0,'asfwef','asdfwef',3,23,23,234,NULL,NULL,NULL,'2016-10-13 17:49:32',NULL),(9,1,1,0,'asdfwef','sdfwef',3,111,234,234,NULL,NULL,NULL,'2016-10-13 17:50:29',NULL),(10,1,1,0,'sadfsdf','sdfsdf',3,23,23,23,NULL,NULL,NULL,'2016-10-13 17:53:17',NULL),(11,1,1,0,'fasdf','wefasdf',3,34452345,345,345,NULL,NULL,NULL,'2016-10-13 17:57:56',NULL),(12,1,1,0,'asdfwef','asfwef',3,111111,234,1234,NULL,NULL,NULL,'2016-10-13 17:58:40',NULL),(13,1,1,1,'f134','asdfef',3,1133333,234,234,NULL,NULL,NULL,'2016-10-13 18:01:01','2016-10-13 16:01:01'),(14,1,1,0,'asfwef','sadfwef',3,234,234,234,NULL,NULL,NULL,'2016-10-13 18:28:23',NULL),(15,1,1,0,'asdfwe','sdfewf',3,111,111,11,NULL,NULL,NULL,'2016-10-13 18:29:05',NULL),(16,1,1,0,'safsfwer','asdfwef',3,2341,24,2341,NULL,NULL,NULL,'2016-10-13 18:31:56',NULL),(17,1,1,0,'sfwef','asfwef',3,234,1234,1234,NULL,NULL,NULL,'2016-10-13 18:33:43',NULL),(18,1,1,0,'sdfwe','sdfwef',3,444,333,44,NULL,NULL,NULL,'2016-10-13 18:34:40',NULL),(19,1,1,0,'14244321','1234423432',3,23423,234234,234234,NULL,NULL,NULL,'2016-10-13 18:39:19',NULL),(20,1,4,0,'asdf','asdf',3,23,23,23,NULL,NULL,NULL,'2016-10-13 18:41:00',NULL);

/*Table structure for table `maintenance_attach` */

DROP TABLE IF EXISTS `maintenance_attach`;

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

/*Data for the table `maintenance_attach` */

insert  into `maintenance_attach`(`id`,`maintenance_id`,`file_name`,`file_ext`,`file_type`,`created_at`,`updated_at`) values (1,0,'sdf','ewf','','2016-10-13 18:31:16',NULL),(2,16,'first_16_1476376316','jpg','image','2016-10-13 18:31:56',NULL),(3,16,'second_16_1476376316','jpg','image','2016-10-13 18:31:56',NULL),(4,19,'second_19_1476376759','jpg','image','2016-10-13 18:39:19',NULL);

/*Table structure for table `moving` */

DROP TABLE IF EXISTS `moving`;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `moving` */

insert  into `moving`(`id`,`estate_id`,`moving_date`,`building`,`level`,`unit`,`status`,`created_at`,`updated_at`) values (1,1,'2016-10-24',23,2,3,'cancelled','2016-10-17 17:32:42','2016-10-17 15:32:42'),(2,1,'2016-10-23',234,234,23,'completed','2016-10-13 14:45:31','2016-10-13 12:45:31'),(3,1,'2016-10-17',3,3,3,'pending','2016-10-13 05:20:42',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `poll_answers` */

DROP TABLE IF EXISTS `poll_answers`;

CREATE TABLE `poll_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `answer` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `poll_answers` */

insert  into `poll_answers`(`id`,`poll_id`,`user_id`,`answer`,`created_at`,`updated_at`) values (1,1,8,1,'2016-10-14 08:42:40',NULL),(2,2,8,0,'2016-10-14 08:53:35',NULL),(3,4,8,0,'2016-10-14 09:20:23',NULL),(4,5,10,0,'2016-10-14 15:05:53',NULL),(5,7,10,1,'2016-10-14 15:05:54',NULL),(6,3,10,1,'2016-10-14 15:06:36',NULL);

/*Table structure for table `poll_options` */

DROP TABLE IF EXISTS `poll_options`;

CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poll_id` int(11) NOT NULL DEFAULT '0',
  `option` varchar(255) NOT NULL,
  `option_value` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `poll_options` */

insert  into `poll_options`(`id`,`poll_id`,`option`,`option_value`,`created_at`,`updated_at`) values (1,1,'yes',0,'2016-10-14 08:18:00',NULL),(2,1,'no',1,'2016-10-14 08:18:03',NULL),(3,2,'sure',0,'2016-10-14 08:19:17',NULL),(4,2,'never',1,'2016-10-14 08:19:17',NULL),(5,3,'yes',0,'2016-10-14 09:19:08',NULL),(6,3,'no',1,'2016-10-14 09:19:08',NULL),(7,4,'yes',0,'2016-10-14 09:20:19',NULL),(8,4,'no',1,'2016-10-14 09:20:19',NULL),(9,5,'Ok',0,'2016-10-14 12:08:54',NULL),(10,5,'No',1,'2016-10-14 12:08:54',NULL),(11,6,'s',0,'2016-10-14 12:10:14',NULL),(12,6,'f',1,'2016-10-14 12:10:14',NULL),(13,7,'Ok',0,'2016-10-14 12:23:41',NULL),(14,7,'No',1,'2016-10-14 12:23:41',NULL);

/*Table structure for table `polls` */

DROP TABLE IF EXISTS `polls`;

CREATE TABLE `polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `polls` */

insert  into `polls`(`id`,`estate_id`,`question`,`created_at`,`updated_at`) values (1,1,'Do u like it?','2016-10-14 08:17:42',NULL),(2,1,'Really?','2016-10-14 08:19:16',NULL),(3,1,'Do u like a pet?','2016-10-14 09:19:08',NULL),(4,1,'Do u like a cate?','2016-10-14 09:20:19',NULL),(5,1,'How are you','2016-10-14 12:08:54',NULL),(6,1,'dddd','2016-10-14 12:10:14',NULL),(7,1,'Are u sure?','2016-10-14 12:23:41',NULL);

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) DEFAULT NULL,
  `image_ext` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`image_name`,`image_ext`,`created_at`,`updated_at`) values (2,'Sumsung_Galaxy S7_5_1476882902','jpg',NULL,NULL),(7,'Sumsung_Galaxy S7_0392081039903D33RR_1476891440','jpg',NULL,NULL),(8,'Sumsung_Galaxy S7_0392081039903D33RR_1476898819','jpg',NULL,NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `role_description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`id`,`role_name`,`role_description`) values (1,'Developer','Developer of Estate'),(2,'Manager','Manager of Estate'),(3,'Estate Officer','');

/*Table structure for table `survey` */

DROP TABLE IF EXISTS `survey`;

CREATE TABLE `survey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estate_id` int(11) NOT NULL DEFAULT '0',
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `survey` */

insert  into `survey`(`id`,`estate_id`,`question`,`created_at`,`updated_at`) values (1,1,'asdfwefasdfwe','2016-10-14 05:21:26',NULL),(2,1,'Are u really?','2016-10-14 05:35:25',NULL),(3,1,'Do you like this estate?','2016-10-14 05:58:55',NULL),(4,1,'Do u like it?','2016-10-14 08:20:07',NULL),(5,1,'Our Estate is good?','2016-10-14 09:07:43',NULL),(6,1,'Are you sure?','2016-10-14 09:08:37',NULL);

/*Table structure for table `survey_answers` */

DROP TABLE IF EXISTS `survey_answers`;

CREATE TABLE `survey_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `survey_answers` */

insert  into `survey_answers`(`id`,`survey_id`,`user_id`,`answer`,`created_at`,`updated_at`) values (1,2,8,'Ok!!!!','2016-10-14 06:15:55',NULL),(2,1,8,'asdfwef','2016-10-14 06:49:02',NULL),(3,6,8,'Sure why not','2016-10-14 09:08:44',NULL),(4,4,8,'ooo','2016-10-14 16:18:50',NULL);

/*Table structure for table `unit_images` */

DROP TABLE IF EXISTS `unit_images`;

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

/*Data for the table `unit_images` */

/*Table structure for table `units` */

DROP TABLE IF EXISTS `units`;

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

/*Data for the table `units` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `given_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `family_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT '0',
  `active` int(11) DEFAULT NULL,
  `visit_estate_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`created_at`,`updated_at`,`given_name`,`family_name`,`address`,`city`,`country`,`remember_token`,`role`,`active`,`visit_estate_id`) values (7,'sf','dd@dd.com','$2y$10$T.HzZd5ur/z8NwxkqIc3wuUt3.shznZpA2MDZyis3h1BWIl3nZXXa','2016-10-07 01:24:22','2016-10-07 01:24:22','ddd','ddd','dd','dd','DZ',NULL,0,NULL,1),(8,'Wang','wang@yahoo.com','$2y$10$waESNyKT2.mJIjiG/yuaQOwCxHQgwb.4y6RYMlC8jWgmzXjU5LCwi','2016-10-07 03:06:46','2016-10-17 09:27:11','Wang','xiaoming','Heilongjia','Harbin','CN','Ouz3t3BNHLnTU9yz8wD7EQsAFtzReqqtWQtmt95Tf0Dii6DarlkLPOnpoaCj',7,NULL,1),(9,'a','a@aaa.com','$2y$10$e3E6y.Z7FPvFIQvmBN9Nb.TpJSUnAy0JFlICf83xik4IhjKHe/x5G','2016-10-07 16:34:17','2016-10-09 02:55:14','a','a','a','aa','BY','edt93jOl3qLmzKTRNn6VEBuyJAls0AnCPOz6g9HG2Tv9zCsOAeCDsuPujDTU',0,NULL,1),(10,'b','b@bb.com','$2y$10$N2cFL8BDsL/EQnL33pz.9e7d19awzeLuV5F2APyVYSpUroEwyR1.G','2016-10-08 06:36:59','2016-10-16 11:55:16','b','b','b','b','BY','C5eKsY7AqsWNrSsqAOTWxQHteqTwrtD8N9Kv2zY5Dqg6Xu0PGNZFW0VT4o1X',7,NULL,1);

/*Table structure for table `warranty` */

DROP TABLE IF EXISTS `warranty`;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `warranty` */

insert  into `warranty`(`id`,`brand`,`model`,`color`,`serial_number`,`merchant`,`user_id`,`purchase_date`,`purchase_country`,`activation_date`,`image_id`,`price`,`created_at`,`updated_at`) values (5,'Sumsung','Galaxy S7','grey','0392081039903D33RR','KKK',8,'2016-10-20','TW','2016-10-21',2,NULL,'2016-10-19 13:15:02',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
