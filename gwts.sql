/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.28 : Database - gwts
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`gwts` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `gwts`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(10) NOT NULL,
  `date_registered` datetime NOT NULL,
  `expires` datetime NOT NULL,
  `postal_address` text,
  `physical_location` text,
  `telephone` varchar(200) DEFAULT NULL,
  `fax` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `contact_name` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `property_mark` text NOT NULL,
  `mark_registered` datetime NOT NULL,
  `mark_expired` datetime NOT NULL,
  `company_type_id` text,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_name_unique` (`name`),
  UNIQUE KEY `companies_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `companies` */

insert  into `companies`(`id`,`name`,`code`,`date_registered`,`expires`,`postal_address`,`physical_location`,`telephone`,`fax`,`email`,`contact_name`,`role`,`property_mark`,`mark_registered`,`mark_expired`,`company_type_id`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'John Bitar & Co','GHJBC','2011-05-01 00:00:00','2050-05-01 00:00:00','','Awaso','','','','Justice Nhyira','','JCM','2013-05-01 00:00:00','2015-05-01 00:00:00','1',1,1,'2013-04-10 10:18:18','2013-04-10 10:18:18'),(2,'Manu and Sons','GHMNS','2010-01-01 00:00:00','2050-01-01 00:00:00','','Assin Manso','','','','Peter Manu','','JCM','2013-04-01 00:00:00','2015-04-01 00:00:00','1',1,1,'2013-04-10 10:18:18','2013-04-10 10:18:18');

/*Table structure for table `company_types` */

DROP TABLE IF EXISTS `company_types`;

CREATE TABLE `company_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `company_types` */

insert  into `company_types`(`id`,`name`,`description`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'CONTRACTOR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(2,'BUYER','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(3,'EXPORTER','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17');

/*Table structure for table `forest_districts` */

DROP TABLE IF EXISTS `forest_districts`;

CREATE TABLE `forest_districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `telephone` varchar(200) DEFAULT NULL,
  `locality_mark` varchar(200) NOT NULL,
  `stool_land_owner` varchar(200) NOT NULL,
  `district_assembly` varchar(200) NOT NULL,
  `region_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `forest_districts` */

insert  into `forest_districts`(`id`,`name`,`address`,`telephone`,`locality_mark`,`stool_land_owner`,`district_assembly`,`region_id`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Bekwai','P.O. Box 11, Bekwai','0322 390793','W/1','Bekwai','Bekwai',3,1,1,'2013-04-10 10:18:18','2013-04-10 10:18:18'),(2,'Sehwi Wiaso','','','W/2','S/Winso','Sehwi Wiaso',3,1,1,'2013-04-10 10:18:18','2013-04-10 10:18:18');

/*Table structure for table `laravel_migrations` */

DROP TABLE IF EXISTS `laravel_migrations`;

CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `laravel_migrations` */

insert  into `laravel_migrations`(`bundle`,`name`,`batch`) values ('application','2013_04_09_091529_create_users',1),('application','2013_04_09_091539_create_regions',1),('application','2013_04_09_091551_create_company_types',1),('application','2013_04_09_091604_create_species',1),('application','2013_04_09_091617_create_companies',1),('application','2013_04_09_091636_create_forest_districts',1),('application','2013_04_09_091833_create_tifs',1),('application','2013_04_09_091840_create_tif_details',1),('application','2013_04_09_091847_create_lifs',1),('application','2013_04_09_091855_create_lif_details',1),('application','2013_04_09_091908_create_lmccs',1),('application','2013_04_09_091915_create_lmcc_details',1),('application','2013_04_09_104834_create_tucs',1);

/*Table structure for table `lif_details` */

DROP TABLE IF EXISTS `lif_details`;

CREATE TABLE `lif_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lif_id` int(10) unsigned NOT NULL,
  `tif_id` int(10) unsigned NOT NULL,
  `reserve_code` varchar(64) NOT NULL,
  `stock_survey_number` varchar(200) NOT NULL,
  `tree_number` varchar(200) NOT NULL,
  `species_id` int(10) unsigned NOT NULL,
  `log_number` varchar(200) NOT NULL,
  `log_length` float DEFAULT NULL,
  `db1` float DEFAULT NULL,
  `db2` float DEFAULT NULL,
  `dt1` float DEFAULT NULL,
  `dt2` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `lif_details` */

insert  into `lif_details`(`id`,`lif_id`,`tif_id`,`reserve_code`,`stock_survey_number`,`tree_number`,`species_id`,`log_number`,`log_length`,`db1`,`db2`,`dt1`,`dt2`,`volume`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,1,'BKTI0001','1','0010',1,'1',35,20,18,14,17,145,1,1,'2013-04-10 10:18:20','2013-04-10 10:18:20'),(2,1,1,'BKTI0001','1','0010',1,'2',45,21,19,15,14,135,1,1,'2013-04-10 10:18:20','2013-04-10 10:18:20');

/*Table structure for table `lifs` */

DROP TABLE IF EXISTS `lifs`;

CREATE TABLE `lifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(128) NOT NULL,
  `tuc_id` int(10) unsigned NOT NULL,
  `tif_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `total_number_of_logs` int(11) NOT NULL,
  `contractors_name` varchar(200) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lifs_reference_number_unique` (`reference_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `lifs` */

insert  into `lifs`(`id`,`reference_number`,`tuc_id`,`tif_id`,`date`,`total_number_of_logs`,`contractors_name`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'BKTI0001',1,1,'2013-04-10 10:18:20',4,'Kojo Manu',1,1,'2013-04-10 10:18:20','2013-04-10 10:18:20');

/*Table structure for table `lmcc_details` */

DROP TABLE IF EXISTS `lmcc_details`;

CREATE TABLE `lmcc_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lmcc_id` int(10) unsigned NOT NULL,
  `tif_ref` varchar(200) NOT NULL,
  `reserve_code` varchar(64) NOT NULL,
  `compartment_number` varchar(200) NOT NULL,
  `stock_number` varchar(200) NOT NULL,
  `tree_number` varchar(200) NOT NULL,
  `log_number` varchar(200) NOT NULL,
  `species_id` int(10) unsigned NOT NULL,
  `db1` float DEFAULT NULL,
  `db2` float DEFAULT NULL,
  `db` float DEFAULT NULL,
  `dt1` float DEFAULT NULL,
  `dt2` float DEFAULT NULL,
  `dt` float DEFAULT NULL,
  `length` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `defects` varchar(200) DEFAULT NULL,
  `grade` varchar(200) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `lmcc_details` */

insert  into `lmcc_details`(`id`,`lmcc_id`,`tif_ref`,`reserve_code`,`compartment_number`,`stock_number`,`tree_number`,`log_number`,`species_id`,`db1`,`db2`,`db`,`dt1`,`dt2`,`dt`,`length`,`volume`,`defects`,`grade`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,10,'sdfv','','23','12','23','1',3,13,34,3,23,45,57,123,0,'sdf','df',1,1,'2013-04-10 10:31:49','2013-04-10 10:31:49');

/*Table structure for table `lmccs` */

DROP TABLE IF EXISTS `lmccs`;

CREATE TABLE `lmccs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(128) NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `forest_district_id` int(10) unsigned NOT NULL,
  `lif_ref` varchar(200) NOT NULL,
  `drivers_name` varchar(200) DEFAULT NULL,
  `vehicle_number` varchar(200) DEFAULT NULL,
  `destination` varchar(200) DEFAULT NULL,
  `check_point` varchar(200) DEFAULT NULL,
  `sawmill` varchar(200) DEFAULT NULL,
  `fsd_officer_name` varchar(200) DEFAULT NULL,
  `issue_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `property_mark_agent_name` varchar(200) DEFAULT NULL,
  `tidd_officer_name` varchar(200) DEFAULT NULL,
  `tidd_officer_number` varchar(200) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lmccs_reference_number_unique` (`reference_number`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `lmccs` */

insert  into `lmccs`(`id`,`reference_number`,`company_id`,`forest_district_id`,`lif_ref`,`drivers_name`,`vehicle_number`,`destination`,`check_point`,`sawmill`,`fsd_officer_name`,`issue_date`,`expiry_date`,`property_mark_agent_name`,`tidd_officer_name`,`tidd_officer_number`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (10,'dsf',1,1,'sadfv','sdfv','asdv','asdv','sdf','asdfv','','2013-04-10 10:31:49','2013-04-10 10:31:49','','','',1,1,'2013-04-10 10:31:49','2013-04-10 10:31:49');

/*Table structure for table `regions` */

DROP TABLE IF EXISTS `regions`;

CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` varchar(4) NOT NULL,
  `description` text,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regions_name_unique` (`name`),
  UNIQUE KEY `regions_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `regions` */

insert  into `regions`(`id`,`name`,`code`,`description`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Western Region','WNR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(2,'Central Region','CLR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(3,'Ashanti Region','AIR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(4,'Northern Region','NNR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(5,'Greater Accra Region','GAR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(6,'Volta Region','VAR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(7,'Brong Ahafo Region','BAR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(8,'Eastern Region','ENR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(9,'Upper East Region','UER','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(10,'Upper West Region','UWR','',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17');

/*Table structure for table `species` */

DROP TABLE IF EXISTS `species`;

CREATE TABLE `species` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `latin` varchar(128) NOT NULL,
  `trade` varchar(200) DEFAULT NULL,
  `felling_limit` int(11) NOT NULL,
  `species_code` varchar(4) DEFAULT NULL,
  `mean_tree_volume` float NOT NULL,
  `star_class` varchar(128) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `species_species_code_unique` (`species_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `species` */

insert  into `species`(`id`,`latin`,`trade`,`felling_limit`,`species_code`,`mean_tree_volume`,`star_class`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Afzelia africana','PAPAO',90,'AFZ',6.8,'RED',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(2,'Albizia adianthifolia','ALBIZIA',90,'ALA',8.6,'PINK',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(3,'Albizia ferruginea','ALBIZIA',90,'ALF',14.6,'SCARLET',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(4,'Albizia zygia','ALBIZIA',90,'ALZ',10.8,'PINK',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17'),(5,'Alstonia boonei','SINURO',110,'ABO',20.1,'PINK',1,1,'2013-04-10 10:18:17','2013-04-10 10:18:17');

/*Table structure for table `tif_details` */

DROP TABLE IF EXISTS `tif_details`;

CREATE TABLE `tif_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tif_id` int(10) unsigned NOT NULL,
  `reserve_code` varchar(64) NOT NULL,
  `stock_survey_number` varchar(200) NOT NULL,
  `tree_number` varchar(200) NOT NULL,
  `species_id` int(10) unsigned NOT NULL,
  `tree_length` float DEFAULT NULL,
  `diameter1` float DEFAULT NULL,
  `diameter2` float DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tif_details` */

insert  into `tif_details`(`id`,`tif_id`,`reserve_code`,`stock_survey_number`,`tree_number`,`species_id`,`tree_length`,`diameter1`,`diameter2`,`volume`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,1,'BKTI0001','1','0010',1,45,20,18,112,1,1,'2013-04-10 10:18:19','2013-04-10 10:18:19'),(2,1,'BKTI0001','1','0011',2,40,18,15,110,1,1,'2013-04-10 10:18:19','2013-04-10 10:18:19');

/*Table structure for table `tifs` */

DROP TABLE IF EXISTS `tifs`;

CREATE TABLE `tifs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(128) NOT NULL,
  `tuc_id` int(10) unsigned NOT NULL,
  `forest_district_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `range_supervisors_name` varchar(200) DEFAULT NULL,
  `contractors_name` varchar(200) DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tifs_reference_number_unique` (`reference_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tifs` */

insert  into `tifs`(`id`,`reference_number`,`tuc_id`,`forest_district_id`,`date`,`range_supervisors_name`,`contractors_name`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'BKTI0001',1,1,'2013-04-10 10:18:19','John Appiah','Kojo Manu',1,1,'2013-04-10 10:18:19','2013-04-10 10:18:19');

/*Table structure for table `tucs` */

DROP TABLE IF EXISTS `tucs`;

CREATE TABLE `tucs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference_number` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `mlnr_approval_ref` varchar(128) NOT NULL,
  `date_of_award` datetime NOT NULL,
  `date_of_expiry` datetime NOT NULL,
  `duration_in_years` float NOT NULL,
  `forest_reserve_code` varchar(200) DEFAULT NULL,
  `area` varchar(200) NOT NULL,
  `total_compartment_area` float DEFAULT NULL,
  `date_of_grant` datetime NOT NULL,
  `duration_of_grant` float NOT NULL,
  `date_of_endorsement` datetime NOT NULL,
  `notification_letter_ref` varchar(128) NOT NULL,
  `rights_invoice_ref` varchar(128) NOT NULL,
  `payment_status` varchar(128) NOT NULL,
  `forest_management_plan_ref` varchar(128) NOT NULL,
  `delineation_completed` varchar(128) NOT NULL,
  `map_ref` varchar(128) NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tucs_reference_number_unique` (`reference_number`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tucs` */

insert  into `tucs`(`id`,`reference_number`,`name`,`company_id`,`mlnr_approval_ref`,`date_of_award`,`date_of_expiry`,`duration_in_years`,`forest_reserve_code`,`area`,`total_compartment_area`,`date_of_grant`,`duration_of_grant`,`date_of_endorsement`,`notification_letter_ref`,`rights_invoice_ref`,`payment_status`,`forest_management_plan_ref`,`delineation_completed`,`map_ref`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'BKTU0001','John Menns',1,'LI001220130410','2013-04-01 00:00:00','2020-04-01 00:00:00',7,'FR000120130410','',500.23,'2013-03-01 00:00:00',7,'2013-04-01 00:00:00','NTLT0010220130410','RIN2345120130410','paid','FMP00123420130410','yes','MP0000120130410',1,1,'2013-04-10 10:18:23','2013-04-10 10:18:23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`user_name`,`email`,`phone`,`password`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Sylva Vortia','admin','svort@gwts.com','0244556699','$2a$08$Z0h3aVhrb281RXJHMW41cuz9FDVv8jAI8egw6dWwlulSbE0ThM9K.',1,1,'2013-04-10 10:18:16','2013-04-10 10:18:16');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
