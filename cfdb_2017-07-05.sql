# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: cfdb
# Generation Time: 2017-07-05 14:05:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`)
VALUES
	('admin','21232f297a57a5a743894a0e4a801fc3','Administrator');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table basis_pengetahuan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `basis_pengetahuan`;

CREATE TABLE `basis_pengetahuan` (
  `kode_pengetahuan` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` char(3) NOT NULL DEFAULT '',
  `kode_gejala` char(3) NOT NULL DEFAULT '',
  `mb` double(11,1) NOT NULL,
  `md` double(11,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_pengetahuan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `basis_pengetahuan` WRITE;
/*!40000 ALTER TABLE `basis_pengetahuan` DISABLE KEYS */;

INSERT INTO `basis_pengetahuan` (`kode_pengetahuan`, `kode_penyakit`, `kode_gejala`, `mb`, `md`, `created_at`, `updated_at`)
VALUES
	(35,'1','G02',0.0,0.0,'2017-07-05 00:00:00','2017-07-05 00:00:00');

/*!40000 ALTER TABLE `basis_pengetahuan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gejala
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gejala`;

CREATE TABLE `gejala` (
  `kode_gejala` char(3) NOT NULL DEFAULT '',
  `nama_gejala` varchar(50) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `desc` text,
  `pertanyaan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `gejala` WRITE;
/*!40000 ALTER TABLE `gejala` DISABLE KEYS */;

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`, `image`, `desc`, `pertanyaan`, `created_at`, `updated_at`)
VALUES
	('G02','test','images/umHpKSvxCjtM3r0HdaoE8qeExABRq2Liinnf3v0T.png','ubah','test','2017-06-20 15:26:32','2017-06-20 15:37:15');

/*!40000 ALTER TABLE `gejala` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hasil
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hasil`;

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` char(3) NOT NULL DEFAULT '',
  `nilai` double(11,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hasil`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `hasil` WRITE;
/*!40000 ALTER TABLE `hasil` DISABLE KEYS */;

INSERT INTO `hasil` (`id_hasil`, `kode_penyakit`, `nilai`, `created_at`, `updated_at`)
VALUES
	(1,'1',0.3800,NULL,NULL),
	(2,'2',0.2184,NULL,NULL),
	(3,'3',0.3740,NULL,NULL),
	(4,'4',0.3740,NULL,NULL),
	(5,'5',0.4000,NULL,NULL);

/*!40000 ALTER TABLE `hasil` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table option
# ------------------------------------------------------------

DROP TABLE IF EXISTS `option`;

CREATE TABLE `option` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) DEFAULT NULL,
  `nilai` float DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `option` WRITE;
/*!40000 ALTER TABLE `option` DISABLE KEYS */;

INSERT INTO `option` (`id`, `nama`, `nilai`, `order`, `created_at`, `updated_at`)
VALUES
	(1,'setuju',1,1,'2017-06-22 04:26:10','2017-06-22 04:26:10'),
	(2,'ragu ragu',0,2,'2017-07-05 14:05:09','2017-07-05 14:05:09');

/*!40000 ALTER TABLE `option` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table penyakit
# ------------------------------------------------------------

DROP TABLE IF EXISTS `penyakit`;

CREATE TABLE `penyakit` (
  `kode_penyakit` char(3) NOT NULL DEFAULT '',
  `nama_penyakit` varchar(35) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `desc` text,
  `solusi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `penyakit` WRITE;
/*!40000 ALTER TABLE `penyakit` DISABLE KEYS */;

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `image`, `desc`, `solusi`, `created_at`, `updated_at`)
VALUES
	('1','Demam Berdarah Dengue',NULL,NULL,NULL,NULL,NULL),
	('2','Demam Penyakit Kuning',NULL,NULL,NULL,NULL,NULL),
	('3','Chikungunya',NULL,NULL,NULL,NULL,NULL),
	('4','Encephalitis',NULL,NULL,NULL,NULL,NULL),
	('5','Malaria',NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `penyakit` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table setting
# ------------------------------------------------------------

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;

INSERT INTO `setting` (`id`, `key`, `value`, `created_at`, `updated_at`)
VALUES
	(1,'min_conf','60',NULL,'2017-06-05 15:01:50'),
	(2,'min_sup','30',NULL,'2017-06-05 15:01:50');

/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Osborne Kunde','admin@admin.com','$2y$10$IEbRJ9hml/KIbViYqsh9LeF8rh1Mr0O4CB4tuC84JXCjp1iOlGaD2','PFzR9ndPzF','2017-06-19 06:05:03','2017-06-19 06:05:03');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
