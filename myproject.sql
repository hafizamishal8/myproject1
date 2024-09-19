/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - myproject
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`myproject` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `myproject`;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `highest_degree` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `graduation_year` int(11) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `gpa` float DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `additional_courses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`full_name`,`email`,`phone`,`address`,`city`,`highest_degree`,`university`,`graduation_year`,`major`,`gpa`,`message`,`additional_courses`) values 
(1,'Sania','aftab@gmail.com','2147483647','House 23 Karachi','Karachi',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'SANA2--','sanaaftab@gmail.com','21400099','House 23 Karachi','Karachi',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'Huzefa','huzefa@gmail.com','2147483647','house 13','Karachi',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'sania','hafizasania6@gmail.com','03160328760','korangi5','Karachi',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
