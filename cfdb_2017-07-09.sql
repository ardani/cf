# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.35)
# Database: cfdb
# Generation Time: 2017-07-09 14:57:15 +0000
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
	(101,'P07','G21',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(100,'P07','G06',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(99,'P07','G03',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(90,'P06','G20',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(89,'P06','G19',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(88,'P06','G11',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(87,'P06','G01',0.9,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(86,'P05','G18',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(85,'P05','G17',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(84,'P05','G16',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(83,'P05','G03',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(82,'P05','G01',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(81,'P04','G15',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(80,'P04','G14',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(79,'P04','G01',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(78,'P03','G13',0.7,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(77,'P03','G11',0.9,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(76,'P03','G08',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(75,'P03','G04',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(74,'P03','G03',0.7,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(73,'P03','G01',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(72,'P02','G12',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(71,'P02','G10',0.7,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(70,'P02','G08',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(69,'P02','G05',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(68,'P02','G03',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(67,'P02','G01',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(65,'P01','G09',0.9,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(64,'P01','G07',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(63,'P01','G06',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(62,'P01','G05',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(61,'P01','G03',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(60,'P01','G01',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(98,'P07','G01',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(102,'P08','G01',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(103,'P08','G06',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(104,'P09','G02',0.9,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(105,'P09','G03',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(106,'P09','G05',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(107,'P09','G17',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(108,'P09','G22',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(109,'P09','G23',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(110,'P09','G24',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(111,'P10','G02',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(112,'P10','G05',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(113,'P10','G08',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(114,'P10','G24',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(115,'P10','G25',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(116,'P11','G02',1.0,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(117,'P11','G05',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(118,'P11','G08',0.9,0.2,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(119,'P11','G24',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(120,'P11','G25',0.8,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(121,'P11','G26',0.7,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00'),
	(122,'P11','G27',0.9,0.1,'2017-07-06 00:00:00','2017-07-06 00:00:00');

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
	('G01','Tidak terjadi penurunan penglihatan','images/umHpKSvxCjtM3r0HdaoE8qeExABRq2Liinnf3v0T.png',NULL,NULL,'2017-06-20 15:26:32','2017-07-06 13:06:27'),
	('G02','Terjadi penurunan penglihatan','',NULL,NULL,'2017-07-06 13:08:12','2017-07-06 13:08:12'),
	('G03','Mata merah','',NULL,NULL,'2017-07-06 13:08:27','2017-07-06 13:08:27'),
	('G04','Gatal','',NULL,NULL,'2017-07-06 13:08:43','2017-07-06 13:08:43'),
	('G05','Mata berair','',NULL,NULL,'2017-07-06 13:08:55','2017-07-06 13:08:55'),
	('G06','Tidak ada air mata','',NULL,NULL,'2017-07-06 13:09:20','2017-07-06 13:09:20'),
	('G07','Terdapat cairan kental keruh','',NULL,NULL,'2017-07-06 13:09:35','2017-07-06 13:09:35'),
	('G08','Terdapat cairan jernih cair','',NULL,NULL,'2017-07-06 13:09:46','2017-07-06 13:09:46'),
	('G09','Bengkak pada konjungtiva','',NULL,NULL,'2017-07-06 13:09:56','2017-07-06 13:09:56'),
	('G10','Hanya terjadi pada salah satu mata','',NULL,NULL,'2017-07-06 13:12:27','2017-07-06 13:12:27'),
	('G11','Terjadi pada kedua mata','',NULL,NULL,'2017-07-06 13:12:41','2017-07-06 13:12:41'),
	('G12','Pelebaran pembuluh darah pada mata / Kongesti','',NULL,NULL,'2017-07-06 13:12:55','2017-07-06 13:12:55'),
	('G13','Terjadi karena obat atau lensa kontak','',NULL,NULL,'2017-07-06 13:13:06','2017-07-06 13:13:06'),
	('G14','Terjadi karena jatuh atau terbentur benda keras','',NULL,NULL,'2017-07-06 13:13:17','2017-07-06 13:13:17'),
	('G15','Adanya gambaran berwarna merah pada bagian putih m','',NULL,NULL,'2017-07-06 13:13:27','2017-07-06 13:13:27'),
	('G16','Adanya selaput yang menutupi sebagian dari putih b','',NULL,NULL,'2017-07-06 13:13:38','2017-07-06 13:13:38'),
	('G17','Rasa tidak nyaman sensasi benda asing','',NULL,NULL,'2017-07-06 13:13:51','2017-07-06 13:13:51'),
	('G18','Tampak pertumbuhan selaput segitiga dengan puncak ','',NULL,NULL,'2017-07-06 13:14:00','2017-07-06 13:14:00'),
	('G19','Banyak dijumpai pada orang dewasa','',NULL,NULL,'2017-07-06 13:14:19','2017-07-06 13:14:19'),
	('G20','Penonjolan berwarna putih kuning keabu-abuan, tak ','',NULL,NULL,'2017-07-06 13:14:31','2017-07-06 13:14:31'),
	('G21','Rabun senja','',NULL,NULL,'2017-07-06 13:14:43','2017-07-06 13:14:43'),
	('G22','Sensasi panas atau perih pada mata seperti terbaka','',NULL,NULL,'2017-07-06 13:14:57','2017-07-06 13:14:57'),
	('G23','Kelopak mata sulit terbuka','',NULL,NULL,'2017-07-06 13:15:07','2017-07-06 13:15:07'),
	('G24','Peka terhadap cahaya (silau)','',NULL,NULL,'2017-07-06 13:15:13','2017-07-06 13:15:13'),
	('G25','Nyeri kepala','',NULL,NULL,'2017-07-06 13:15:24','2017-07-06 13:15:24'),
	('G26','Kerusakan pada bagian putih mata dan jaringan mata','',NULL,NULL,'2017-07-06 13:15:36','2017-07-06 13:15:36'),
	('G27','Bola mata tidak bisa digerakan','',NULL,NULL,'2017-07-06 13:15:42','2017-07-06 13:15:42');

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
	(1,'TIDAK YAKIN',-1,1,'2017-06-22 04:26:10','2017-07-06 13:17:48'),
	(2,'CUKUP TIDAK YAKIN',-0.5,2,'2017-07-05 14:05:09','2017-07-06 13:18:08'),
	(3,'RAGU-RAGU',0,3,'2017-07-06 13:18:18','2017-07-06 13:18:18'),
	(4,'(YA) CUKUP YAKIN',0.5,4,'2017-07-06 13:18:29','2017-07-06 13:18:29'),
	(5,'(YA) YAKIN',1,5,'2017-07-06 13:18:41','2017-07-06 13:18:41');

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
	('P01','Konjungtivitis Karena Bakteri','images/umHpKSvxCjtM3r0HdaoE8qeExABRq2Liinnf3v0T.png',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',' is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum',NULL,'2017-07-06 13:02:52'),
	('P02','Konjungtivitis Karena Virus',NULL,NULL,NULL,NULL,'2017-07-06 13:03:17'),
	('P03','Konjungtivitis Karena Alergi',NULL,NULL,NULL,NULL,'2017-07-06 13:03:29'),
	('P04','Pendarahan Sub Konjungtiva',NULL,NULL,NULL,NULL,'2017-07-06 13:03:44'),
	('P05','Pterigium',NULL,NULL,NULL,NULL,'2017-07-06 13:03:57'),
	('P06','Pinguekula','',NULL,NULL,'2017-07-06 13:04:11','2017-07-06 13:04:11'),
	('P07','Defisiensi Vitamin A','',NULL,NULL,'2017-07-06 13:04:20','2017-07-06 13:04:20'),
	('P08','Mata Kering','',NULL,NULL,'2017-07-06 13:04:30','2017-07-06 13:04:30'),
	('P09','Keratitis','',NULL,NULL,'2017-07-06 13:04:36','2017-07-06 13:04:36'),
	('P10','Endoftalmitis','',NULL,NULL,'2017-07-06 13:04:46','2017-07-06 13:04:46'),
	('P11','Panoftalmitis','',NULL,NULL,'2017-07-06 13:04:53','2017-07-06 13:04:53');

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
	(1,'Admin','admin@admin.com','$2y$10$IEbRJ9hml/KIbViYqsh9LeF8rh1Mr0O4CB4tuC84JXCjp1iOlGaD2','yLwfTDsh6qr2Zp2IJIOjVcIsgdxzHzfn9b4mpUuW136e2VEl6IOZu3mqHWQi','2017-06-19 06:05:03','2017-06-19 06:05:03');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
