/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.6.15-log : Database - meetings.laravel
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`meetings.laravel` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `meetings.laravel`;

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `avatars` */

insert  into `avatars`(`id`,`created_at`,`updated_at`,`avatar`,`user_id`,`active`) values (1,'2015-10-27 11:28:26','2015-10-27 11:28:26','561baf0851658.jpg',1,1),(2,'2015-10-27 11:28:26','2015-10-27 11:28:26','561baf2a8ef80.jpg',2,1),(3,'2015-10-27 11:28:26','2015-10-27 11:28:26','561baf3f401c8.jpg',3,1),(4,'2015-10-27 11:28:26','2015-10-27 11:28:26','561baf5034328.jpg',4,1),(5,'2015-10-27 11:28:26','2015-10-27 11:28:26','561baf61c8258.jpg',5,1),(6,'2015-10-27 11:28:26','2015-10-27 11:28:26','561baf7489be8.jpg',6,1),(7,'2015-10-27 11:28:26','2015-10-27 11:28:26','561bafb51b008.jpg',7,1),(8,'2015-10-27 11:28:26','2015-10-27 11:28:26','561bafca5ceb8.jpg',8,1),(9,'2015-10-27 11:28:26','2015-10-27 11:28:26','561bafdd170c0.jpg',9,1),(10,'2015-10-27 11:28:26','2015-10-27 11:28:26','561bafefbfa68.jpg',10,1),(11,'2015-10-29 15:46:26','2015-10-29 15:46:26','56322332d2410.jpg',11,1),(12,'2015-10-29 15:47:06','2015-10-29 15:47:06','5632235a319c0.jpg',12,1),(13,'2015-10-29 15:47:45','2015-10-29 15:47:45','5632238123f00.jpg',13,1);

/*Table structure for table `dialogs` */

DROP TABLE IF EXISTS `dialogs`;

CREATE TABLE `dialogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `friend_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

/*Data for the table `dialogs` */

insert  into `dialogs`(`id`,`created_at`,`updated_at`,`user_id`,`friend_id`) values (1,'2015-10-27 11:28:28','2015-10-27 11:28:28',1,2),(2,'2015-10-27 11:28:28','2015-10-27 11:28:28',2,1),(3,'2015-10-27 11:28:28','2015-10-27 11:28:28',1,3),(4,'2015-10-27 11:28:28','2015-10-27 11:28:28',3,1),(5,'2015-10-27 11:28:28','2015-10-27 11:28:28',2,4),(6,'2015-10-27 11:28:28','2015-10-27 11:28:28',4,2),(7,'2015-10-27 11:28:28','2015-10-27 11:28:28',3,4),(8,'2015-10-27 11:28:28','2015-10-27 11:28:28',4,3),(9,'2015-10-27 11:28:28','2015-10-27 11:28:28',4,8),(10,'2015-10-27 11:28:28','2015-10-27 11:28:28',8,4),(11,'2015-10-27 11:28:28','2015-10-27 11:28:28',4,10),(12,'2015-10-27 11:28:28','2015-10-27 11:28:28',10,4),(13,'2015-10-27 11:28:28','2015-11-09 12:57:37',5,9),(14,'2015-10-27 11:28:28','2015-11-09 12:57:37',9,5),(15,'2015-10-27 11:28:28','2015-11-09 12:57:21',5,6),(16,'2015-10-27 11:28:28','2015-11-09 12:57:21',6,5),(19,'2015-10-27 11:28:28','2015-10-27 11:28:28',6,10),(20,'2015-10-27 11:28:28','2015-10-27 11:28:28',10,6),(21,'2015-10-27 11:28:28','2015-10-27 11:28:28',7,1),(22,'2015-10-27 11:28:28','2015-10-27 11:28:28',1,7),(23,'2015-10-27 11:28:28','2015-10-27 11:28:28',8,2),(24,'2015-10-27 11:28:28','2015-10-27 11:28:28',2,8),(25,'2015-10-27 11:28:28','2015-10-27 11:28:28',9,2),(26,'2015-10-27 11:28:28','2015-10-27 11:28:28',2,9),(27,'2015-10-27 11:28:28','2015-11-09 12:40:21',10,5),(28,'2015-10-27 11:28:28','2015-11-09 12:40:21',5,10),(29,'2015-10-27 16:58:35','2015-11-09 15:31:28',8,6),(30,'2015-10-27 16:58:35','2015-11-09 15:31:28',6,8),(37,'2015-10-27 17:03:14','2015-10-27 17:03:14',6,4),(38,'2015-10-27 17:03:15','2015-10-27 17:03:15',4,6);

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

/*Data for the table `friends` */

insert  into `friends`(`id`,`created_at`,`updated_at`,`user_id`,`friend_id`,`initiator_id`,`status`) values (1,'2015-10-27 11:28:27','2015-10-27 11:28:27',1,2,1,'subscription'),(2,'2015-10-27 11:28:27','2015-10-27 11:28:27',2,1,1,'proposal'),(3,'2015-10-27 11:28:27','2015-10-27 11:28:27',1,3,1,'approved'),(4,'2015-10-27 11:28:27','2015-10-27 11:28:27',3,1,1,'approved'),(5,'2015-10-27 11:28:27','2015-10-27 11:28:27',4,1,4,'approved'),(6,'2015-10-27 11:28:27','2015-10-27 11:28:27',1,4,4,'approved'),(7,'2015-10-27 11:28:27','2015-10-27 11:28:27',2,3,2,'subscription'),(8,'2015-10-27 11:28:27','2015-10-27 11:28:27',3,2,2,'proposal'),(9,'2015-10-27 11:28:27','2015-10-27 11:28:27',2,9,9,'approved'),(10,'2015-10-27 11:28:27','2015-10-27 11:28:27',9,2,9,'approved'),(11,'2015-10-27 11:28:27','2015-10-27 11:28:27',3,4,3,'subscription'),(12,'2015-10-27 11:28:27','2015-10-27 11:28:27',4,3,3,'proposal'),(13,'2015-10-27 11:28:27','2015-10-27 11:28:27',3,5,3,'approved'),(14,'2015-10-27 11:28:27','2015-10-27 11:28:27',5,3,3,'approved'),(15,'2015-10-27 11:28:27','2015-10-27 11:28:27',5,6,5,'approved'),(16,'2015-10-27 11:28:27','2015-10-27 11:28:27',6,5,5,'approved'),(17,'2015-10-27 11:28:27','2015-10-27 11:28:27',5,7,5,'subscription'),(18,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,5,5,'proposal'),(19,'2015-10-27 11:28:27','2015-10-27 11:28:27',6,3,6,'approved'),(20,'2015-10-27 11:28:27','2015-10-27 11:28:27',3,6,6,'approved'),(23,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,4,7,'subscription'),(24,'2015-10-27 11:28:27','2015-10-27 11:28:27',4,7,7,'proposal'),(25,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,1,7,'approved'),(26,'2015-10-27 11:28:27','2015-10-27 11:28:27',1,7,7,'approved'),(27,'2015-10-27 11:28:27','2015-10-27 11:28:27',8,7,8,'subscription'),(28,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,8,8,'proposal'),(29,'2015-10-27 11:28:27','2015-10-27 11:28:27',8,9,8,'approved'),(30,'2015-10-27 11:28:27','2015-10-27 11:28:27',9,8,8,'approved'),(31,'2015-10-27 11:28:27','2015-10-27 11:28:27',8,10,8,'approved'),(32,'2015-10-27 11:28:27','2015-10-27 11:28:27',10,8,8,'approved'),(33,'2015-10-27 11:28:27','2015-10-27 11:28:27',9,4,9,'subscription'),(34,'2015-10-27 11:28:27','2015-10-27 11:28:27',4,9,9,'proposal'),(37,'2015-10-27 11:28:27','2015-10-27 11:28:27',9,3,9,'approved'),(38,'2015-10-27 11:28:27','2015-10-27 11:28:27',3,9,9,'approved'),(39,'2015-10-27 11:28:27','2015-10-27 11:28:27',10,2,10,'subscription'),(40,'2015-10-27 11:28:28','2015-10-27 11:28:28',2,10,10,'proposal'),(41,'2015-10-27 11:28:28','2015-10-27 11:28:28',10,7,10,'approved'),(42,'2015-10-27 11:28:28','2015-10-27 11:28:28',7,10,10,'approved'),(59,'2015-11-04 16:34:12','2015-11-09 12:07:14',4,6,4,'approved'),(60,'2015-11-04 16:34:12','2015-11-09 12:07:14',6,4,4,'approved'),(73,'2015-11-09 12:07:27','2015-11-09 12:07:27',6,10,6,'subscription'),(74,'2015-11-09 12:07:27','2015-11-09 12:07:27',10,6,6,'proposal');

/*Table structure for table `hobbies` */

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned NOT NULL,
  `interest_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `hobbies` */

insert  into `hobbies`(`id`,`created_at`,`updated_at`,`user_id`,`interest_id`) values (1,'2015-10-27 11:28:26','2015-10-27 11:28:26',1,1),(2,'2015-10-27 11:28:26','2015-10-27 11:28:26',1,2),(3,'2015-10-27 11:28:26','2015-10-27 11:28:26',1,3),(4,'2015-10-27 11:28:26','2015-10-27 11:28:26',2,1),(5,'2015-10-27 11:28:26','2015-10-27 11:28:26',2,2),(6,'2015-10-27 11:28:26','2015-10-27 11:28:26',3,3),(7,'2015-10-27 11:28:26','2015-10-27 11:28:26',4,4),(8,'2015-10-27 11:28:26','2015-10-27 11:28:26',4,5),(9,'2015-10-27 11:28:26','2015-10-27 11:28:26',5,5),(10,'2015-10-27 11:28:26','2015-10-27 11:28:26',5,1),(11,'2015-10-27 11:28:26','2015-10-27 11:28:26',5,6),(12,'2015-10-27 11:28:26','2015-10-27 11:28:26',5,7),(13,'2015-10-27 11:28:27','2015-10-27 11:28:27',6,1),(14,'2015-10-27 11:28:27','2015-10-27 11:28:27',6,3),(15,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,5),(16,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,8),(17,'2015-10-27 11:28:27','2015-10-27 11:28:27',7,9),(18,'2015-10-27 11:28:27','2015-10-27 11:28:27',8,9),(19,'2015-10-27 11:28:27','2015-10-27 11:28:27',8,8),(20,'2015-10-27 11:28:27','2015-10-27 11:28:27',8,10),(21,'2015-10-27 11:28:27','2015-10-27 11:28:27',9,11),(22,'2015-10-27 11:28:27','2015-10-27 11:28:27',10,11),(23,'2015-10-27 11:28:27','2015-10-27 11:28:27',5,3),(24,'2015-10-27 11:28:27','2015-10-27 11:28:27',5,2);

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

insert  into `interests`(`id`,`created_at`,`updated_at`,`name`) values (1,'2015-10-27 11:28:26','2015-10-27 11:28:26','Музыка'),(2,'2015-10-27 11:28:26','2015-10-27 11:28:26','Кино'),(3,'2015-10-27 11:28:26','2015-10-27 11:28:26','Спорт'),(4,'2015-10-27 11:28:26','2015-10-27 11:28:26','Литература'),(5,'2015-10-27 11:28:26','2015-10-27 11:28:26','Компьютерные игры'),(6,'2015-10-27 11:28:26','2015-10-27 11:28:26','Дизайн'),(7,'2015-10-27 11:28:26','2015-10-27 11:28:26','Фотография'),(8,'2015-10-27 11:28:26','2015-10-27 11:28:26','Танцы'),(9,'2015-10-27 11:28:26','2015-10-27 11:28:26','Моделирование'),(10,'2015-10-27 11:28:26','2015-10-27 11:28:26','Туризм'),(11,'2015-10-27 11:28:26','2015-10-27 11:28:26','Техника');

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `messages` */

insert  into `messages`(`id`,`created_at`,`updated_at`,`message`,`user_id`,`friend_id`) values (1,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',1,2),(2,'2015-10-27 11:28:28','2015-10-27 11:28:28','Норм. Поехали в центр',2,1),(3,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',1,3),(4,'2015-10-27 11:28:28','2015-10-27 11:28:28','Завтра едем?',3,1),(5,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',2,4),(6,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет',3,4),(7,'2015-10-27 11:28:28','2015-10-27 11:28:28','эгегей',4,3),(8,'2015-10-27 11:28:28','2015-10-27 11:28:28','Купи хлеба домой',3,4),(9,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',4,8),(10,'2015-10-27 11:28:28','2015-10-27 11:28:28','и тебе не хворать',8,4),(11,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',4,10),(12,'2015-10-27 11:28:28','2015-10-27 11:28:28','бедааа, скучно',10,4),(13,'2015-10-27 11:28:28','2015-10-27 11:28:28','Скоро зайду - будет весело',4,10),(14,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',5,9),(15,'2015-10-27 11:20:28','2015-10-27 11:20:28','Привет. Как дела?',5,6),(16,'2015-10-27 11:25:28','2015-10-27 11:25:28','оригинальное начало беседы',6,5),(17,'2015-10-27 11:28:28','2015-10-27 11:28:28','ну а что мне ещё спрашивать то?',5,6),(18,'2015-10-27 11:28:28','2015-10-27 11:28:28','Привет. Как дела?',6,8),(19,'2015-10-27 11:28:28','2015-10-27 11:28:28','кууу',8,6),(20,'2015-10-27 11:28:29','2015-10-27 11:28:29','Привет. Как дела?',6,10),(21,'2015-10-27 11:28:29','2015-10-27 11:28:29','Я не дома. позже созвонимся',10,6),(22,'2015-10-27 11:28:29','2015-10-27 11:28:29','Привет. Как дела?',7,1),(23,'2015-10-27 11:28:29','2015-10-27 11:28:29','как кирпичом по голове :/',1,7),(24,'2015-10-27 11:28:29','2015-10-27 11:28:29','Что случилось?',7,1),(25,'2015-10-27 11:28:29','2015-10-27 11:28:29','Привет. Как дела?',8,2),(26,'2015-10-27 11:28:29','2015-10-27 11:28:29','у меня наушники сломались',2,8),(27,'2015-10-27 11:28:29','2015-10-27 11:28:29','так неси, отремонтирую',8,2),(28,'2015-10-27 11:28:29','2015-10-27 11:28:29','Привет. Как дела?',9,2),(29,'2015-10-27 11:28:29','2015-10-27 11:28:29','отлично',2,9),(30,'2015-10-27 11:28:29','2015-10-27 11:28:29','Привет. Как дела?',10,5),(31,'2015-10-27 16:58:35','2015-10-27 16:58:35','Проверка связи',8,6),(32,'2015-10-27 16:59:32','2015-10-27 16:59:32','ээээ',8,6),(33,'2015-10-27 17:00:32','2015-10-27 17:00:32','проверка',6,8),(34,'2015-10-27 17:00:56','2015-10-27 17:00:56','а теперь',8,6),(35,'2015-10-27 17:03:15','2015-10-27 17:03:15','эгегей!',4,6),(36,'2015-10-27 17:04:24','2015-10-27 17:04:24','а теперь дома\r\n',10,6),(37,'2015-10-28 18:30:53','2015-10-28 18:30:53','Testing',5,6),(38,'2015-11-09 12:10:01','2015-11-09 12:10:01','Тест',10,6),(39,'2015-11-09 12:22:30','2015-11-09 12:22:30','Тест',5,6),(40,'2015-11-09 12:23:05','2015-11-09 12:23:05','Привет',6,5),(41,'2015-11-09 12:27:01','2015-11-09 12:27:01','Тест',5,6),(42,'2015-11-09 12:36:31','2015-11-09 12:36:31','тест',5,10),(43,'2015-11-09 12:37:29','2015-11-09 12:37:29','Тест времени апдейт',5,10),(44,'2015-11-09 12:40:21','2015-11-09 12:40:21','гнл',5,10),(45,'2015-11-09 12:40:39','2015-11-09 12:40:39','Тест апдейта диалогов',5,6),(46,'2015-11-09 12:40:54','2015-11-09 12:40:54','диалог апдейт',5,9),(47,'2015-11-09 12:57:21','2015-11-09 12:57:21','апдейт пашет',5,6),(48,'2015-11-09 12:57:37','2015-11-09 12:57:37','купитманчик привет',5,9),(49,'2015-11-09 13:02:35','2015-11-09 13:02:35','Тест апдейта',6,8),(50,'2015-11-09 15:31:28','2015-11-09 15:31:28','Hello there\r\n',6,8);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`remember_token`,`created_at`,`updated_at`,`first_name`,`last_name`,`gender`,`married`,`birth_date`,`email`,`password`,`storage`) values (1,NULL,'2015-10-27 11:28:25','2015-10-27 11:28:25','Анна','Бобенко','f',0,'1988-07-19','Anna@bobenko.com','$2y$10$ysUkOSKWjj1cAH4JY7qjfePJGkBuWVIo9jpbnlNhqaU.XYbzSACM.','unt-5624bab048c10'),(2,'MURj8TmFBCgtb0zruSgB3XKjtBnISc6ZEjNJmPhV9Gp0hvVp8DDpuM3Bi697','2015-10-27 11:28:25','2015-11-02 21:05:16','Борис','Левин','m',0,'1987-04-25','Boris@levin.com','$2y$10$jUpztfkt0GItBFMXz4cgf.qKhJ9tLiRTBJz3Cd8UTmXa3RN6mL5bi','unt-5624bacfc92c0'),(3,'2pcg8wskZmOTDfj0SV4b83quUn1Hi8BJiW9G5winJApOxTeQ8ftujsQ2KWY0','2015-10-27 11:28:25','2015-11-09 19:15:55','Глеб','Романенко','m',0,'1987-01-25','Gleb@romanenko.com','$2y$10$h6TK9EaIhNBAJlD8s49UguS5yJ/UDL5oSXTtUKdIx.2y6vXQN9WJG','unt-5624bb227b4a8'),(4,'L6AFiFQVZ5IhpKvUacxWit7E1vFJ9K4GN0f6biyVcLBWWLn3CaACVCnaFrH3','2015-10-27 11:28:25','2015-11-04 16:34:22','Семён','Лобанов','m',0,'1986-12-25','Semen@lobanov.com','$2y$10$EJLPy3I3T9IQCQgwFCwHKO9mKJdTqSsDC0u2sbuqkHHXZlIo6lhRK','unt-5624bb3ee7720'),(5,'7UOOS3PBqkd2WVHH9KHhcyUcNDn7HzVH8wsOEAhlc1mDqvRGWDx19J3naI6J','2015-10-27 11:28:25','2015-11-09 19:18:12','Фил','Ричардс','m',0,'1987-05-26','Phil@richards.com','$2y$10$lg0WcKWyjuybK3sA8P/R7.A9A4bTRWJySfyT1GjwvFT3c7Gn4w7cm','unt-5624bb5bdcb40'),(6,'9zRA9SrJNqnlbo1PZseSNgL7e470DSOAv1a9I88GYsHRSPllBWOxxEL95rkf','2015-10-27 11:28:26','2015-11-09 19:13:51','Варвара','Черноус','f',0,'1988-08-26','Varya@chernous.com','$2y$10$4qfLMp2w6cyRrE6kE62H7u.dKVG/TNxGj1B76qqSTl4E6Uo1eZfTG','unt-5624bb771ffb8'),(7,NULL,'2015-10-27 11:28:26','2015-10-27 11:28:26','Полина','Купитман','f',0,'1988-09-10','Polina@kupitman.com','$2y$10$uSDiKRFiwkPnffElJ3edtON.u/afXQiY0QUgykIW7u7M9t.GaDi76','unt-5624bb9043620'),(8,'aox27CNhEQecBuCJ4H86G8A3VU6IQIVz3yOEzMbLapsbUvz8zWLZ6FkHSiUY','2015-10-27 11:28:26','2015-11-04 12:20:02','Андрей','Быков','m',1,'1978-05-01','Andrey@bikov.com','$2y$10$l/fY5gf2z3FN7bRlu6Hw7OZQAc9dOhPlq6bjJOghBYn7HMPjAqeLG','unt-5624bba7b0838'),(9,NULL,'2015-10-27 11:28:26','2015-10-27 11:28:26','Иван','Купитман','m',0,'1975-11-12','Ivan@kupitman.com','$2y$10$LTW4oTeyJinkWLRPzpuJj.c1ZWvnKjgI1y5ff5RmHMFa6DzaqZjyu','unt-5624bbb865518'),(10,NULL,'2015-10-27 11:28:26','2015-10-27 11:28:26','Анастасия','Кисегач','f',1,'1979-06-12','Anastasia@kisegach.com','$2y$10$m4JLyVdY8GrvGKYuB1apZecbuDy0FeblyztTNj2.VtAuvQBYKFcjy','unt-5624bbe303e80'),(11,'vJf9HYQ1pXYAnsll7ZazyxwdX8WFvAtPzRvwikp2gCkm6mc4RjxZr3Pky5VX','2015-10-29 15:46:26','2015-11-09 19:28:19','Man','Man','m',0,'1982-10-08','Man@man.ru','$2y$10$UpfjWJLvhEhNyzJlUd.FUOW2pWbvSJdzVbRhCM9J7joXzOtbi.rPu','56322332d2028'),(12,'dp4hIEcYnBoGAlSSucCLkF14EDsS4ySqzuZEfyJFfbfK1fmFTOvvfgm3k5vL','2015-10-29 15:47:06','2015-10-29 15:47:11','Mann','Mann','m',0,'2015-02-04','Mann@mann.ru','$2y$10$MvPadXjdAT7eqOwDsKa/WeyLBFBCT8XwftCqD9ZqBpRUufySLmzA.','5632235a315d8'),(13,'0wF6aYxU2ytdzpSj6JGxBbS7LkHTRki7JfZ5Btz8nSuwqpWY45neF7527P66','2015-10-29 15:47:45','2015-10-29 16:08:58','Mannn','Mannn','m',1,'2002-10-11','Mannn@mannn.ru','$2y$10$7wSivRhJbQxtawC/aIgSduGxxUfDnD3wlkksZbFXf7QleXKsp0gW2','5632238123b18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
