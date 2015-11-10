/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.6.15-log : Database - u376454239_meet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`u376454239_meet` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `u376454239_meet`;

/*Table structure for table `avatars` */

DROP TABLE IF EXISTS `avatars`;

CREATE TABLE `avatars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `avatar` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `avatars` */

insert  into `avatars`(`id`,`created_at`,`updated_at`,`avatar`,`user_id`,`active`) values (1,'2015-11-10 13:45:06','2015-11-10 13:45:06','561baf0851658.jpg',1,1),(2,'2015-11-10 13:45:06','2015-11-10 13:45:06','561baf2a8ef80.jpg',2,1),(3,'2015-11-10 13:45:06','2015-11-10 13:45:06','561baf3f401c8.jpg',3,1),(4,'2015-11-10 13:45:06','2015-11-10 13:45:06','561baf5034328.jpg',4,1),(5,'2015-11-10 13:45:06','2015-11-10 13:45:06','561baf61c8258.jpg',5,1),(6,'2015-11-10 13:45:06','2015-11-10 13:45:06','561baf7489be8.jpg',6,1),(7,'2015-11-10 13:45:06','2015-11-10 13:45:06','561bafb51b008.jpg',7,1),(8,'2015-11-10 13:45:06','2015-11-10 13:45:06','561bafca5ceb8.jpg',8,1),(9,'2015-11-10 13:45:06','2015-11-10 13:45:06','561bafdd170c0.jpg',9,1),(10,'2015-11-10 13:45:06','2015-11-10 13:45:06','561bafefbfa68.jpg',10,1);

/*Table structure for table `dialogs` */

DROP TABLE IF EXISTS `dialogs`;

CREATE TABLE `dialogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

/*Data for the table `dialogs` */

insert  into `dialogs`(`id`,`created_at`,`updated_at`,`user_id`,`friend_id`) values (1,'2015-11-10 13:45:07','2015-11-10 13:45:07',1,2),(2,'2015-11-10 13:45:08','2015-11-10 13:45:08',2,1),(3,'2015-11-10 13:45:08','2015-11-10 13:45:08',1,3),(4,'2015-11-10 13:45:08','2015-11-10 13:45:08',3,1),(5,'2015-11-10 13:45:08','2015-11-10 13:45:08',2,4),(6,'2015-11-10 13:45:08','2015-11-10 13:45:08',4,2),(7,'2015-11-10 13:45:08','2015-11-10 13:45:08',3,4),(8,'2015-11-10 13:45:08','2015-11-10 13:45:08',4,3),(9,'2015-11-10 13:45:08','2015-11-10 13:45:08',4,8),(10,'2015-11-10 13:45:08','2015-11-10 13:45:08',8,4),(11,'2015-11-10 13:45:08','2015-11-10 13:45:08',4,10),(12,'2015-11-10 13:45:08','2015-11-10 13:45:08',10,4),(13,'2015-11-10 13:45:08','2015-11-10 13:45:08',5,9),(14,'2015-11-10 13:45:08','2015-11-10 13:45:08',9,5),(15,'2015-11-10 13:45:08','2015-11-10 13:45:08',5,6),(16,'2015-11-10 13:45:08','2015-11-10 13:45:08',6,5),(17,'2015-11-10 13:45:08','2015-11-10 13:45:08',6,8),(18,'2015-11-10 13:45:08','2015-11-10 13:45:08',8,6),(19,'2015-11-10 13:45:08','2015-11-10 13:45:08',6,10),(20,'2015-11-10 13:45:08','2015-11-10 13:45:08',10,6),(21,'2015-11-10 13:45:08','2015-11-10 13:45:08',7,1),(22,'2015-11-10 13:45:08','2015-11-10 13:45:08',1,7),(23,'2015-11-10 13:45:08','2015-11-10 13:45:08',8,2),(24,'2015-11-10 13:45:08','2015-11-10 13:45:08',2,8),(25,'2015-11-10 13:45:08','2015-11-10 13:45:08',9,2),(26,'2015-11-10 13:45:08','2015-11-10 13:45:08',2,9),(27,'2015-11-10 13:45:08','2015-11-10 13:45:08',10,5),(28,'2015-11-10 13:45:08','2015-11-10 13:45:08',5,10);

/*Table structure for table `friends` */

DROP TABLE IF EXISTS `friends`;

CREATE TABLE `friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  `initiator_id` int(10) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `friends` */

insert  into `friends`(`id`,`created_at`,`updated_at`,`user_id`,`friend_id`,`initiator_id`,`status`) values (1,'2015-11-10 13:45:07','2015-11-10 13:45:07',1,2,1,'subscription'),(2,'2015-11-10 13:45:07','2015-11-10 13:45:07',2,1,1,'proposal'),(3,'2015-11-10 13:45:07','2015-11-10 13:45:07',1,3,1,'approved'),(4,'2015-11-10 13:45:07','2015-11-10 13:45:07',3,1,1,'approved'),(5,'2015-11-10 13:45:07','2015-11-10 13:45:07',4,1,4,'approved'),(6,'2015-11-10 13:45:07','2015-11-10 13:45:07',1,4,4,'approved'),(7,'2015-11-10 13:45:07','2015-11-10 13:45:07',2,3,2,'subscription'),(8,'2015-11-10 13:45:07','2015-11-10 13:45:07',3,2,2,'proposal'),(9,'2015-11-10 13:45:07','2015-11-10 13:45:07',2,9,9,'approved'),(10,'2015-11-10 13:45:07','2015-11-10 13:45:07',9,2,9,'approved'),(11,'2015-11-10 13:45:07','2015-11-10 13:45:07',3,4,3,'subscription'),(12,'2015-11-10 13:45:07','2015-11-10 13:45:07',4,3,3,'proposal'),(13,'2015-11-10 13:45:07','2015-11-10 13:45:07',3,5,3,'approved'),(14,'2015-11-10 13:45:07','2015-11-10 13:45:07',5,3,3,'approved'),(15,'2015-11-10 13:45:07','2015-11-10 13:45:07',5,6,5,'approved'),(16,'2015-11-10 13:45:07','2015-11-10 13:45:07',6,5,5,'approved'),(17,'2015-11-10 13:45:07','2015-11-10 13:45:07',5,7,5,'subscription'),(18,'2015-11-10 13:45:07','2015-11-10 13:45:07',7,5,5,'proposal'),(19,'2015-11-10 13:45:07','2015-11-10 13:45:07',6,3,6,'subscription'),(20,'2015-11-10 13:45:07','2015-11-10 13:45:07',3,6,6,'proposal'),(21,'2015-11-10 13:45:07','2015-11-10 13:45:07',6,7,6,'approved'),(22,'2015-11-10 13:45:07','2015-11-10 13:45:07',7,6,6,'proposal'),(23,'2015-11-10 13:45:07','2015-11-10 13:45:07',7,4,7,'subscription'),(24,'2015-11-10 13:45:07','2015-11-10 13:45:07',4,7,7,'proposal'),(25,'2015-11-10 13:45:07','2015-11-10 13:45:07',7,1,7,'approved'),(26,'2015-11-10 13:45:07','2015-11-10 13:45:07',1,7,7,'approved'),(27,'2015-11-10 13:45:07','2015-11-10 13:45:07',8,7,8,'subscription'),(28,'2015-11-10 13:45:07','2015-11-10 13:45:07',7,8,8,'proposal'),(29,'2015-11-10 13:45:07','2015-11-10 13:45:07',8,9,8,'approved'),(30,'2015-11-10 13:45:07','2015-11-10 13:45:07',9,8,8,'approved'),(31,'2015-11-10 13:45:07','2015-11-10 13:45:07',8,10,8,'approved'),(32,'2015-11-10 13:45:07','2015-11-10 13:45:07',10,8,8,'approved'),(33,'2015-11-10 13:45:07','2015-11-10 13:45:07',9,4,9,'subscription'),(34,'2015-11-10 13:45:07','2015-11-10 13:45:07',4,9,9,'proposal'),(35,'2015-11-10 13:45:07','2015-11-10 13:45:07',9,6,9,'approved'),(36,'2015-11-10 13:45:07','2015-11-10 13:45:07',6,9,9,'approved'),(37,'2015-11-10 13:45:07','2015-11-10 13:45:07',9,3,9,'approved'),(38,'2015-11-10 13:45:07','2015-11-10 13:45:07',3,9,9,'approved'),(39,'2015-11-10 13:45:07','2015-11-10 13:45:07',10,2,10,'subscription'),(40,'2015-11-10 13:45:07','2015-11-10 13:45:07',2,10,10,'proposal'),(41,'2015-11-10 13:45:07','2015-11-10 13:45:07',10,7,10,'approved'),(42,'2015-11-10 13:45:07','2015-11-10 13:45:07',7,10,10,'approved');

/*Table structure for table `hobbies` */

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `interest_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `hobbies` */

insert  into `hobbies`(`id`,`created_at`,`updated_at`,`user_id`,`interest_id`) values (1,'2015-11-10 13:45:06','2015-11-10 13:45:06',1,1),(2,'2015-11-10 13:45:06','2015-11-10 13:45:06',1,2),(3,'2015-11-10 13:45:06','2015-11-10 13:45:06',1,3),(4,'2015-11-10 13:45:06','2015-11-10 13:45:06',2,1),(5,'2015-11-10 13:45:06','2015-11-10 13:45:06',2,2),(6,'2015-11-10 13:45:06','2015-11-10 13:45:06',3,3),(7,'2015-11-10 13:45:06','2015-11-10 13:45:06',4,4),(8,'2015-11-10 13:45:06','2015-11-10 13:45:06',4,5),(9,'2015-11-10 13:45:06','2015-11-10 13:45:06',5,5),(10,'2015-11-10 13:45:06','2015-11-10 13:45:06',5,1),(11,'2015-11-10 13:45:06','2015-11-10 13:45:06',5,6),(12,'2015-11-10 13:45:06','2015-11-10 13:45:06',5,7),(13,'2015-11-10 13:45:06','2015-11-10 13:45:06',6,1),(14,'2015-11-10 13:45:06','2015-11-10 13:45:06',6,3),(15,'2015-11-10 13:45:06','2015-11-10 13:45:06',7,5),(16,'2015-11-10 13:45:06','2015-11-10 13:45:06',7,8),(17,'2015-11-10 13:45:06','2015-11-10 13:45:06',7,9),(18,'2015-11-10 13:45:06','2015-11-10 13:45:06',8,9),(19,'2015-11-10 13:45:06','2015-11-10 13:45:06',8,8),(20,'2015-11-10 13:45:07','2015-11-10 13:45:07',8,10),(21,'2015-11-10 13:45:07','2015-11-10 13:45:07',9,11),(22,'2015-11-10 13:45:07','2015-11-10 13:45:07',10,11);

/*Table structure for table `interests` */

DROP TABLE IF EXISTS `interests`;

CREATE TABLE `interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `interests` */

insert  into `interests`(`id`,`created_at`,`updated_at`,`name`) values (1,'2015-11-10 13:45:06','2015-11-10 13:45:06','Музыка'),(2,'2015-11-10 13:45:06','2015-11-10 13:45:06','Кино'),(3,'2015-11-10 13:45:06','2015-11-10 13:45:06','Спорт'),(4,'2015-11-10 13:45:06','2015-11-10 13:45:06','Литература'),(5,'2015-11-10 13:45:06','2015-11-10 13:45:06','Компьютерные игры'),(6,'2015-11-10 13:45:06','2015-11-10 13:45:06','Дизайн'),(7,'2015-11-10 13:45:06','2015-11-10 13:45:06','Фотография'),(8,'2015-11-10 13:45:06','2015-11-10 13:45:06','Танцы'),(9,'2015-11-10 13:45:06','2015-11-10 13:45:06','Моделирование'),(10,'2015-11-10 13:45:06','2015-11-10 13:45:06','Туризм'),(11,'2015-11-10 13:45:06','2015-11-10 13:45:06','Техника');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `message` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `messages` */

insert  into `messages`(`id`,`created_at`,`updated_at`,`message`,`user_id`,`friend_id`) values (1,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',1,2),(2,'2015-11-10 13:45:08','2015-11-10 13:45:08','Норм. Поехали в центр',2,1),(3,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',1,3),(4,'2015-11-10 13:45:08','2015-11-10 13:45:08','Завтра едем?',3,1),(5,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',2,4),(6,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет',3,4),(7,'2015-11-10 13:45:08','2015-11-10 13:45:08','эгегей',4,3),(8,'2015-11-10 13:45:08','2015-11-10 13:45:08','Купи хлеба домой',3,4),(9,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',4,8),(10,'2015-11-10 13:45:08','2015-11-10 13:45:08','и тебе не хворать',8,4),(11,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',4,10),(12,'2015-11-10 13:45:08','2015-11-10 13:45:08','бедааа, скучно',10,4),(13,'2015-11-10 13:45:08','2015-11-10 13:45:08','Скоро зайду - будет весело',4,10),(14,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',5,9),(15,'2015-11-10 13:45:08','2015-11-10 13:45:08','Привет. Как дела?',5,6),(16,'2015-11-10 13:45:08','2015-11-10 13:45:08','оригинальное начало беседы',6,5),(17,'2015-11-10 13:45:08','2015-11-10 13:45:08','ну а что мне ещё спрашивать то?',5,6),(18,'2015-11-10 13:45:09','2015-11-10 13:45:09','Привет. Как дела?',6,8),(19,'2015-11-10 13:45:09','2015-11-10 13:45:09','кууу',8,6),(20,'2015-11-10 13:45:09','2015-11-10 13:45:09','Привет. Как дела?',6,10),(21,'2015-11-10 13:45:09','2015-11-10 13:45:09','Я не дома. позже созвонимся',10,6),(22,'2015-11-10 13:45:09','2015-11-10 13:45:09','Привет. Как дела?',7,1),(23,'2015-11-10 13:45:09','2015-11-10 13:45:09','как кирпичом по голове :/',1,7),(24,'2015-11-10 13:45:09','2015-11-10 13:45:09','Что случилось?',7,1),(25,'2015-11-10 13:45:09','2015-11-10 13:45:09','Привет. Как дела?',8,2),(26,'2015-11-10 13:45:09','2015-11-10 13:45:09','у меня наушники сломались',2,8),(27,'2015-11-10 13:45:09','2015-11-10 13:45:09','так неси, отремонтирую',8,2),(28,'2015-11-10 13:45:09','2015-11-10 13:45:09','Привет. Как дела?',9,2),(29,'2015-11-10 13:45:09','2015-11-10 13:45:09','отлично',2,9),(30,'2015-11-10 13:45:09','2015-11-10 13:45:09','Привет. Как дела?',10,5);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_10_12_134335_create_messages_table',1),('2015_10_12_134345_create_friends_table',1),('2015_10_12_134409_create_interests_table',1),('2015_10_12_134418_create_hobbies_table',1),('2015_10_12_155509_create_avatars_table',1),('2015_10_26_142853_create_dialogs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `password_resets` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `married` tinyint(1) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `storage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`remember_token`,`created_at`,`updated_at`,`first_name`,`last_name`,`gender`,`married`,`birth_date`,`email`,`password`,`storage`) values (1,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Анна','Бобенко','f',0,'1988-07-19','Anna@bobenko.com','$2y$10$QLeDZ3fu1UEJezhaC0CuuOiZW8aYsFkCjQLtYpIm8dJh/03R3lqFG','unt-5624bab048c10'),(2,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Борис','Левин','m',0,'1987-04-25','Boris@levin.com','$2y$10$Juk0xVRiMgqZL1AgGT/HO.jjKmP7vxxxTA2PMo.mCdroqaV91xlrW','unt-5624bacfc92c0'),(3,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Глеб','Романенко','m',0,'1987-01-25','Gleb@romanenko.com','$2y$10$ZVQ33QBA4p/fyu2jPS1/o.OKIc3Rs18oMlVtqmeQVsgmgzMwCoLa.','unt-5624bb227b4a8'),(4,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Семён','Лобанов','m',0,'1986-12-25','Semen@lobanov.com','$2y$10$XAccMsf8O34g36u48Ffro.ux.NfnMCTOHgw0bd1QSqYhlhmhLV.qK','unt-5624bb3ee7720'),(5,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Фил','Ричардс','m',0,'1987-05-26','Phil@richards.com','$2y$10$TLrLe9ZItE9jhERY5wPG2e2BLEtwjKEAshiGuBmEFC4e.aUHhuSGK','unt-5624bb5bdcb40'),(6,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Варвара','Черноус','f',0,'1988-08-26','Varya@chernous.com','$2y$10$co55X990rh1N1f1m1wGtFODinTCl7QAEezto/x0jQCRP6CToupARK','unt-5624bb771ffb8'),(7,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Полина','Купитман','f',0,'1988-09-10','Polina@kupitman.com','$2y$10$f1BKxlKQgNiXIl70vFXyY..vxC2PkCrbLXQ5r6ucu816Yea2uy6mu','unt-5624bb9043620'),(8,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Андрей','Быков','m',1,'1978-05-01','Andrey@bikov.com','$2y$10$V1mnZljw8ys1OB7Ghqod0uN4qQyGjpEGeEoQeC9gMZJ3YA/u26j5e','unt-5624bba7b0838'),(9,NULL,'2015-11-10 13:45:05','2015-11-10 13:45:05','Иван','Купитман','m',0,'1975-11-12','Ivan@kupitman.com','$2y$10$PW.HDyA2SNY9VUvS/c/dPO0B.7QPRNugyxoA9O2og1FEixlRSD9Ea','unt-5624bbb865518'),(10,NULL,'2015-11-10 13:45:06','2015-11-10 13:45:06','Анастасия','Кисегач','f',1,'1979-06-12','Anastasia@kisegach.com','$2y$10$ToPlYBZyS8TYf0269OLXYuvFHCp8f7e2cNZzxNOdnDOdKWXLIypn2','unt-5624bbe303e80');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
