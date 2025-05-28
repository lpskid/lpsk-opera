-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: lpsk_opera
-- ------------------------------------------------------
-- Server version	8.0.42-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'user','Super Admin has created','App\\Models\\User','created',1,NULL,NULL,'{\"attributes\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(2,'user','User has created','App\\Models\\User','created',2,NULL,NULL,'{\"attributes\": {\"name\": \"User\", \"email\": \"user@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(3,'user','Biro Hukum has created','App\\Models\\User','created',3,NULL,NULL,'{\"attributes\": {\"name\": \"Biro Hukum\", \"email\": \"hukum@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(4,'user','Perwakilan Unit Kerja has created','App\\Models\\User','created',4,NULL,NULL,'{\"attributes\": {\"name\": \"Perwakilan Unit Kerja\", \"email\": \"perwakilan@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(5,'user','Karo HKH has created','App\\Models\\User','created',5,NULL,NULL,'{\"attributes\": {\"name\": \"Karo HKH\", \"email\": \"karohkh@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(6,'user','Sekretaris Jendral has created','App\\Models\\User','created',6,NULL,NULL,'{\"attributes\": {\"name\": \"Sekretaris Jendral\", \"email\": \"sekretarisjendral@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(7,'user','Pimpinan has created','App\\Models\\User','created',7,NULL,NULL,'{\"attributes\": {\"name\": \"Pimpinan\", \"email\": \"pimpinan@example.com\"}}',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(8,'user','Super Admin has updated','App\\Models\\User','updated',1,'App\\Models\\User',1,'{\"old\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}, \"attributes\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}}',NULL,'2024-10-30 15:14:23','2024-10-30 15:14:23'),(9,'user','Super Admin has updated','App\\Models\\User','updated',1,'App\\Models\\User',1,'{\"old\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}, \"attributes\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}}',NULL,'2024-11-01 11:17:20','2024-11-01 11:17:20'),(10,'user','Super Admin has updated','App\\Models\\User','updated',1,'App\\Models\\User',1,'{\"old\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}, \"attributes\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}}',NULL,'2024-11-01 11:33:02','2024-11-01 11:33:02'),(11,'user','Super Admin has updated','App\\Models\\User','updated',1,'App\\Models\\User',1,'{\"old\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}, \"attributes\": {\"name\": \"Super Admin\", \"email\": \"superadmin@example.com\"}}',NULL,'2024-11-04 01:10:35','2024-11-04 01:10:35'),(12,'user','fctoer has created','App\\Models\\User','created',8,'App\\Models\\User',1,'{\"attributes\": {\"name\": \"fctoer\", \"email\": \"fctoer@gmail.com\"}}',NULL,'2025-05-27 16:08:15','2025-05-27 16:08:15');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('admin@example.com|202.51.201.2','i:2;',1745396075),('admin@example.com|202.51.201.2:timer','i:1745396075;',1745396075),('admin@lpsk.go.id|119.235.221.215','i:2;',1731481207),('admin@lpsk.go.id|119.235.221.215:timer','i:1731481207;',1731481207),('bagian_hukum@lpsk|202.51.201.2','i:1;',1745309866),('bagian_hukum@lpsk|202.51.201.2:timer','i:1745309866;',1745309866),('captcha_09d9f645daa4005e8b91d1ba96ac0017','a:3:{i:0;s:1:\"u\";i:1;s:1:\"n\";i:2;s:1:\"e\";}',1730459317),('captcha_14435a7c19cff0a910d2ad4661c4700f','a:3:{i:0;s:1:\"2\";i:1;s:1:\"p\";i:2;s:1:\"r\";}',1730367205),('captcha_193007f9959dfd338681e0563b1b44a2','a:3:{i:0;s:1:\"m\";i:1;s:1:\"q\";i:2;s:1:\"4\";}',1730363188),('captcha_2a1c5fec3123a49780160dbc125518f2','a:3:{i:0;s:1:\"z\";i:1;s:1:\"a\";i:2;s:1:\"h\";}',1730212490),('captcha_35f8d80c21242703a3b5a08bd08921f1','a:3:{i:0;s:1:\"9\";i:1;s:1:\"u\";i:2;s:1:\"x\";}',1730215051),('captcha_37cf9368928fef228def84d1602d5265','a:3:{i:0;s:1:\"e\";i:1;s:1:\"r\";i:2;s:1:\"b\";}',1730240194),('captcha_3d4cf3930935d416970940db0ccf9e19','a:3:{i:0;s:1:\"8\";i:1;s:1:\"9\";i:2;s:1:\"e\";}',1730434871),('captcha_3e08e54fb56fd9d8c4b2c5f433ee77bc','a:3:{i:0;s:1:\"q\";i:1;s:1:\"j\";i:2;s:1:\"u\";}',1730262472),('captcha_4ae50babfba6b3b79c509a14801e1141','a:3:{i:0;s:1:\"a\";i:1;s:1:\"e\";i:2;s:1:\"4\";}',1730212863),('captcha_56a2149c749a36396d1e5d0d73bc9bd8','a:3:{i:0;s:1:\"g\";i:1;s:1:\"r\";i:2;s:1:\"f\";}',1730499830),('captcha_5a7ad54f156f7fa04b28dee4f7678d60','a:3:{i:0;s:1:\"j\";i:1;s:1:\"y\";i:2;s:1:\"b\";}',1730434747),('captcha_621cc4c6c4749c5ff72a6add3e5e8927','a:3:{i:0;s:1:\"p\";i:1;s:1:\"u\";i:2;s:1:\"t\";}',1730213616),('captcha_67b0321e39a66d4e35365b2691025cf8','a:3:{i:0;s:1:\"7\";i:1;s:1:\"m\";i:2;s:1:\"x\";}',1730657026),('captcha_6ab5e962646a7f019a79a6d61c0fa393','a:3:{i:0;s:1:\"2\";i:1;s:1:\"g\";i:2;s:1:\"c\";}',1730240204),('captcha_6fc9be3e57178473f9582e5d95e50719','a:3:{i:0;s:1:\"r\";i:1;s:1:\"c\";i:2;s:1:\"x\";}',1730352342),('captcha_729f89832ee150c3f03887d466585a14','a:3:{i:0;s:1:\"t\";i:1;s:1:\"q\";i:2;s:1:\"y\";}',1730434591),('captcha_7d99646fb755567f9041a689096cdd43','a:3:{i:0;s:1:\"u\";i:1;s:1:\"z\";i:2;s:1:\"e\";}',1730211868),('captcha_7e22b2f30a8b257f446f8b57562566e3','a:3:{i:0;s:1:\"r\";i:1;s:1:\"t\";i:2;s:1:\"u\";}',1730499505),('captcha_80412f25dcd2ba3932c3aedda0ad7250','a:3:{i:0;s:1:\"g\";i:1;s:1:\"g\";i:2;s:1:\"3\";}',1730270182),('captcha_8179c128919885ee41a023643239d050','a:3:{i:0;s:1:\"m\";i:1;s:1:\"t\";i:2;s:1:\"y\";}',1730670091),('captcha_8ca23ddb8fae3a642c42eacebc42fc99','a:3:{i:0;s:1:\"d\";i:1;s:1:\"c\";i:2;s:1:\"b\";}',1730435002),('captcha_977071e249d848a3a91412e617ae918b','a:3:{i:0;s:1:\"4\";i:1;s:1:\"m\";i:2;s:1:\"3\";}',1730239456),('captcha_a04e90ed396c27248a8c0697f7902e60','a:3:{i:0;s:1:\"c\";i:1;s:1:\"d\";i:2;s:1:\"r\";}',1730434715),('captcha_a1c7bde6911b5a3950222637e23bb4b7','a:3:{i:0;s:1:\"d\";i:1;s:1:\"h\";i:2;s:1:\"3\";}',1730367142),('captcha_a62f7cd2a0a8cc2b99d62aca1670423e','a:3:{i:0;s:1:\"b\";i:1;s:1:\"x\";i:2;s:1:\"x\";}',1730367343),('captcha_a98a7fa8a86feac6890e261b8686798d','a:3:{i:0;s:1:\"6\";i:1;s:1:\"c\";i:2;s:1:\"d\";}',1730254987),('captcha_c764e5ea3d9abfcdc37629e410cbabae','a:3:{i:0;s:1:\"m\";i:1;s:1:\"j\";i:2;s:1:\"q\";}',1730657153),('captcha_c98c20d1c2fc6d3eedee28476cecacf7','a:3:{i:0;s:1:\"c\";i:1;s:1:\"f\";i:2;s:1:\"d\";}',1730262393),('captcha_caa1e692fadf6fad3a52db98b08d3a2a','a:3:{i:0;s:1:\"z\";i:1;s:1:\"h\";i:2;s:1:\"g\";}',1730462941),('captcha_d1379d05eabbec9e4cb1eb6b2cacf52c','a:3:{i:0;s:1:\"z\";i:1;s:1:\"a\";i:2;s:1:\"n\";}',1730436295),('captcha_d381a015b6b60624676a299287f83d3b','a:3:{i:0;s:1:\"y\";i:1;s:1:\"n\";i:2;s:1:\"g\";}',1730345773),('captcha_e31a0528a61ff1bf5cdd5398d4ffdbb8','a:3:{i:0;s:1:\"p\";i:1;s:1:\"d\";i:2;s:1:\"p\";}',1730657452),('captcha_e83f289603397715413f4213e58fb085','a:3:{i:0;s:1:\"d\";i:1;s:1:\"z\";i:2;s:1:\"u\";}',1730212645),('captcha_ec453da6cc7b91d5641bcf1534b37daf','a:3:{i:0;s:1:\"m\";i:1;s:1:\"m\";i:2;s:1:\"9\";}',1730362873),('captcha_f258fa19b60b42dba6c527b88c318a71','a:3:{i:0;s:1:\"x\";i:1;s:1:\"q\";i:2;s:1:\"a\";}',1730212167),('captcha_f2f25e4d590032f281a26a1563b57340','a:3:{i:0;s:1:\"r\";i:1;s:1:\"m\";i:2;s:1:\"r\";}',1730240188),('captcha_f49ea6618a036898b3cd34989848e03b','a:3:{i:0;s:1:\"j\";i:1;s:1:\"q\";i:2;s:1:\"t\";}',1730254975),('captcha_f58d120e1f1dbbb93e17d30d79117951','a:3:{i:0;s:1:\"6\";i:1;s:1:\"4\";i:2;s:1:\"a\";}',1730434688),('captcha_ff408cc94d227743f6699959ca9aa6d7','a:3:{i:0;s:1:\"r\";i:1;s:1:\"b\";i:2;s:1:\"x\";}',1730367149),('spatie.permission.cache','a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:33:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:16:\"dashboard-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:7:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:11:\"user-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"user-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"user-update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"user-destroy\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:14:\"profile-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:2;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:18:\"master-data-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:11:\"role-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"role-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:11:\"role-update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:12:\"role-destroy\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:12:\"users-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:12:\"users-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:12:\"users-update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:13:\"users-destroy\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"regulation-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:6:{i:0;i:1;i:1;i:3;i:2;i:4;i:3;i:5;i:4;i:6;i:5;i:7;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:17:\"regulation-create\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:17:\"regulation-update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:18:\"regulation-destroy\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:35:\"regulation-status-update-pengusulan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:46:\"regulation-status-update-penyusunan_pembahasan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:43:\"regulation-status-update-partisipasi_publik\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:45:\"regulation-status-update-persetujuan_pimpinan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:4:{i:0;i:1;i:1;i:5;i:2;i:6;i:3;i:7;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:37:\"regulation-status-update-penyelarasan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:34:\"regulation-status-update-penetapan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:47:\"regulation-status-update-pengundangan_peraturan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:45:\"regulation-status-update-penyusunan_informasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:39:\"regulation-status-update-penyebarluasan\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:39:\"regulation-status-update-laporan_proses\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:41:\"regulation-status-update-analisa_evaluasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:10:\"log-access\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:14:\"log-activities\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:11:\"log-systems\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:7:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"Super Admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:4:\"User\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:3;s:1:\"b\";s:21:\"Perwakilan Unit Kerja\";s:1:\"c\";s:3:\"web\";}i:3;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"Biro Hukum\";s:1:\"c\";s:3:\"web\";}i:4;a:3:{s:1:\"a\";i:5;s:1:\"b\";s:8:\"Karo HKH\";s:1:\"c\";s:3:\"web\";}i:5;a:3:{s:1:\"a\";i:6;s:1:\"b\";s:19:\"Sekretaris Jenderal\";s:1:\"c\";s:3:\"web\";}i:6;a:3:{s:1:\"a\";i:7;s:1:\"b\";s:8:\"Pimpinan\";s:1:\"c\";s:3:\"web\";}}}',1748423107),('superadmin@gmail.com|202.51.201.2','i:5;',1748336706),('superadmin@gmail.com|202.51.201.2:timer','i:1748336706;',1748336706);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluations`
--

DROP TABLE IF EXISTS `evaluations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evaluations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `regulation_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluations_regulation_id_foreign` (`regulation_id`),
  CONSTRAINT `evaluations_regulation_id_foreign` FOREIGN KEY (`regulation_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluations`
--

LOCK TABLES `evaluations` WRITE;
/*!40000 ALTER TABLE `evaluations` DISABLE KEYS */;
INSERT INTO `evaluations` VALUES (1,3,'Arya','arya@gmail.com','0857132631263','1',321,'1','Analisis','2024-11-04 13:39:51','2024-11-04 13:39:51'),(2,3,'Soviana','soviananurafifah@gmail.com','08100100214','1',35,'2','Peraturan ini seharusnya diubah mengiringi adanya UU Nomor 13 Tahun 2022 tentang Perubahan UU Nomor 12 Tahun 2011 dimana ada terdapat Pasal 96 yang menyebutkan bahwa pembentuk peraturan harus menyediakan sarana partisipasi publik','2024-11-05 20:15:13','2024-11-05 20:15:13');
/*!40000 ALTER TABLE `evaluations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_10_07_113943_create_permission_tables',1),(5,'2024_10_07_152932_create_activity_log_table',1),(6,'2024_10_07_152933_add_event_column_to_activity_log_table',1),(7,'2024_10_07_152934_add_batch_uuid_column_to_activity_log_table',1),(8,'2024_10_10_101143_create_regulations_table',1),(9,'2024_10_11_081654_create_evaluations_table',1),(10,'2024_10_16_062519_create_regulation_attachments_table',1),(11,'2024_10_17_014753_create_public_participations_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(4,'App\\Models\\User',3),(3,'App\\Models\\User',4),(5,'App\\Models\\User',5),(6,'App\\Models\\User',6),(7,'App\\Models\\User',7),(1,'App\\Models\\User',8);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'dashboard-access','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(2,'user-access','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(3,'user-create','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(4,'user-update','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(5,'user-destroy','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(6,'profile-access','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(7,'master-data-access','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(8,'role-access','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(9,'role-create','web','2024-10-29 20:38:51','2024-10-29 20:38:51'),(10,'role-update','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(11,'role-destroy','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(12,'users-access','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(13,'users-create','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(14,'users-update','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(15,'users-destroy','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(16,'regulation-access','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(17,'regulation-create','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(18,'regulation-update','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(19,'regulation-destroy','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(20,'regulation-status-update-pengusulan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(21,'regulation-status-update-penyusunan_pembahasan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(22,'regulation-status-update-partisipasi_publik','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(23,'regulation-status-update-persetujuan_pimpinan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(24,'regulation-status-update-penyelarasan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(25,'regulation-status-update-penetapan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(26,'regulation-status-update-pengundangan_peraturan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(27,'regulation-status-update-penyusunan_informasi','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(28,'regulation-status-update-penyebarluasan','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(29,'regulation-status-update-laporan_proses','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(30,'regulation-status-update-analisa_evaluasi','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(31,'log-access','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(32,'log-activities','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(33,'log-systems','web','2024-10-29 20:38:52','2024-10-29 20:38:52');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `public_participations`
--

DROP TABLE IF EXISTS `public_participations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `public_participations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `regulation_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `public_participations_regulation_id_foreign` (`regulation_id`),
  CONSTRAINT `public_participations_regulation_id_foreign` FOREIGN KEY (`regulation_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `public_participations`
--

LOCK TABLES `public_participations` WRITE;
/*!40000 ALTER TABLE `public_participations` DISABLE KEYS */;
INSERT INTO `public_participations` VALUES (4,5,'Gokmauli Sitanggang','feranika7@gmail.com','081299365767','1',42,'1','peraturan sesuai dengan ketentuan yang berlaku','2024-10-31 16:34:42','2024-10-31 16:34:42'),(9,26,'test','siti.nurliyah@lpsk.go.id','082211551127','1',39,'2','masukan 11 pertanyaan','2025-04-23 15:05:31','2025-04-23 15:05:31'),(10,26,'Wahyu Eka Styawan','wahyuekas@walhijatim.org','082141265128','1',33,'1','1. Efektivitas dan Kebutuhan Revisi UU No. 13/2006 & UU No. 31/2014\r\n\r\nEfektivitas masih terbatas. UU telah menjadi dasar hukum penting, tetapi implementasi tidak konsisten, khususnya di luar kota besar.\r\n\r\nBagian mendesak direvisi yakni definisi dan perlindungan bagi whistleblower dan justice collaborator, mekanisme kompensasi & restitusi, serta penguatan kewenangan LPSK.\r\n\r\nCelah hukum saat ini adalah belum ada harmonisasi norma dengan KUHAP dan UU sektoral lainnya; perlindungan untuk kelompok rentan tidak eksplisit.\r\n\r\n2. Tantangan Utama dan Perluasan Peran LPSK Daerah\r\n\r\nTantangan utama yakni lemahnya koordinasi dengan APH, keterbatasan SDM LPSK, belum adanya kantor perwakilan daerah, serta keterbatasan anggaran.\r\n\r\nPenguatan LPSK Daerah tentu sangat perlu. Struktur perwakilan diatur tegas dalam RUU, dengan kewenangan administratif dan dukungan anggaran dari Pemda.\r\n\r\n3. Mekanisme Perlindungan Justice Collaborator\r\n\r\nSaat ini, perlindungan JC tergantung inisiatif LPSK dan keberanian aparat hukum. Tidak semua penegak hukum menghargai peran JC.\r\n\r\nPerlindungan dibutuhkan khususnya pemisahan tahanan, keamanan fisik, perlindungan identitas, pendampingan hukum.\r\n\r\nKe depan perlu menetapkan syarat, hak, dan penghargaan bagi JC secara eksplisit (termasuk kemungkinan pembebasan bersyarat/remisi tambahan).\r\n\r\n4. Perlindungan untuk Kelompok Rentan\r\n\r\nBelum memadainya akses bagi anak, perempuan, disabilitas masih terhambat: dari sisi fisik, bahasa, maupun budaya hukum.\r\n\r\nPendekatan berbasis kerentanan menjadi penting ditambahkan dalam RUU, termasuk pasal khusus tentang akomodasi layak dan afirmasi perlindungan.\r\n\r\n5. Koordinasi Lintas Lembaga\r\n\r\nSaat ini, koordinasi LPSK–APH–Pemda sering informal dan tidak sistemik. alerlu pasal yang mewajibkan pembentukan gugus tugas perlindungan saksi dan korban di daerah. Wajib ada protokol kerja bersama. Dukungan Pemda perlu diakomodasi dalam bentuk pendanaan, SDM pendamping korban, dan penyediaan rumah aman.\r\n\r\n6. Layanan Terpadu untuk Korban\r\n\r\nHambatan selama ini adalah adanya tumpang tindih peran antar lembaga, tidak ada SOP terpadu, akses ke layanan medis & psiko-sosial bergantung wilayah.\r\n\r\nUU harus tetapkan tanggung jawab lintas kementerian/Lembaga (Kemenkes, Kemensos, Komnas Perempuan, dll), termasuk anggaran lintas sektor.\r\n\r\n7. Pelibatan Masyarakat Sipil\r\n\r\nMeski sudah ada pelibatan, tapi belum diformalisasi dan belum mendapat dukungan pendanaan negara. Perlu memformalkan peran CSO sebagai mitra LPSK. Beri insentif berupa pelatihan, pendanaan program lokal, dan pengakuan hukum.\r\n\r\n8. Persebaran Akses di Wilayah Terpencil\r\n\r\nMasalah utama saat ini ialah tidak adanya kantor cabang; akses jauh dari jangkauan; masyarakat tidak tahu cara melapor. Ke depan perlu mewajibkan pendirian kantor perwakilan atau kerja sama dengan Pemda. Desentralisasi layanan penting. Kerja sama ideal seperti MoU LPSK–Pemda, pembiayaan bersama, dan pelatihan bersama APH daerah.\r\n\r\n9. Strategi Sosialisasi dan Edukasi Publik\r\n\r\nSaat ini yang terjadi adalah sporadisnya layanan sosialisasi dan edukasi publik serta tidak terstruktur. Sebagian besar korban bahkan tidak tahu keberadaan LPSK. Negara & pemda wajib melakukan pendidikan hukum publik. Libatkan sekolah, desa, dan media komunitas. Metode efektif seperti paralegal desa, media sosial/media komunikasi, program edukasi berbasis kasus.\r\n\r\n10. Victim Trust Fund\r\n\r\nSaat ini bantuan kepada korban sangat terbatas, bergantung anggaran tahunan LPSK. Idealnya digunakan untuk: pemulihan medis, psiko-sosial, tempat tinggal, pendidikan anak korban. Perlu mengatur sumber dana (APBN, dana kompensasi pelaku, hibah internasional), lembaga pengelola, dan mekanisme transparansi publik.\r\n\r\n11. Masukan Tambahan\r\nKonteks wilayah konflik atau adat, perlindungan harus sensitif terhadap dinamika lokal (misalnya stigma di Papua, Maluku, atau warga yang memperjuangkan hak atas lingkungan hidup).\r\n\r\nPenggunaan teknologi seperti sistem pelaporan online, hotline anonim, perlindungan digital perlu diatur secara eksplisit.','2025-04-24 22:28:59','2025-04-24 22:28:59'),(11,26,'Fahmi Ardiyanto','fahmiardiyanto12@gmail.com','087770007148','1',25,'1','sebagai peserta Konsultasi Publik yang di Selenggarakan di Surabaya','2025-04-25 23:58:00','2025-04-25 23:58:00'),(12,26,'Maria Novita A, S.H., M.H','maria.ih@upnjatim.ac.id','085217864743','1',32,'2','Mengikuti kegiatan rekomendasi publik di Surabaya','2025-04-26 08:37:03','2025-04-26 08:37:03'),(13,26,'Maria Goreti Jelinda','mariagoretijelinda@gmail.com','085256009492','1',30,'2','Saya membutuhkan penjelasan spesifik dalam Pasal 3 UU No. 13 Tahun 2006, di antaranya, \r\nPasal 3\r\nPerlindungan Saksi dan Korban berasaskan pada:\r\nPasal 3\r\nPerlindungan Saksi dan Korban berasaskan pada:\r\na. penghargaan atas harkat dan martabat manusia;\r\nb. rasa aman;\r\nc. keadilan;\r\nd. tidak diskriminatif; dan\r\ne. kepastian hukum.\r\n\r\nBerdasarkan realita yang sering saya temukan di masyarakat bahwa Korban lebih khususnya terkadang kurang mendapat perlindungan hukum dan keadilan hukum dan sosial. Pemerataan eksistensi Stakeholder hingga ke pelosok daerah masih sangat minim yang berakibat pada kinerja stakeholder tampaknya tidak terlihat atau tidak dirasakan oleh masyarakat terutama sebagai Korban. \r\n\r\nKedua, Kasus Perlindungan Anak yang merupakan korbannya di bawah umur, belum mendapatkan perlindungan khusus dalam memenuhi aspek psikologi, fasilitas terapi atau sejenis apapun itu yang dapat membantu anak korban sembuh dari luka atau bahkan trauma yang dialaminya. Dalam hal ini, pemerataan dan keberadaan lembaga terkait pun belum berjalan baik hingga ke daerah.','2025-04-26 10:21:25','2025-04-26 10:21:25'),(14,26,'Siti Mazdafiah','siti.mazdafiah@gmail.com','081330984480','1',54,'2','Masukan utk revisi uu lpsk:\r\n1. Untuk lebih “ramah” terhadap kasus-kasus kekerasan yang melibatkan perempuan dengan mempertimbangkan kompleksitas gender. Pada kasus-kasus semacam kdrt atau kekerasan seksual ada pertimbangan-pertimbangan tertentu yang menyebabkan perempuan tidak melapor. Contoh kasus: suami melakukan kekerasan fisik dan psikis selama perkawinan hingga berdampak trauma pada istri maupun anak. Ibu membawa anak-anak keluar dr rumah utk mengamankan diri dan anak-anak, sambil mengurus perceraian, meski mendapatkan ancaman secara konstan dari suami agar anak-anak dan istri kembali tinggal bersama. Korban bersikukuh tdk melaporkan suami secara pidana terkait kdrt yg dilakukan suami krn tdk ingin anak2 memiliki ayah dengan catatan tindak pidana. Saranq untuk lpsk, utk mengakses perlindungan, sebaiknya syaratvm melakukan pelaporan dihilangkan \r\n2. Untuk lebih secara jelas menu jukkan inklusivitas dalam ruu perubahan dengan menyebutkan keragaman gender dan keragaman2 yg lain\r\n3. Utk lebih dapat memanfaatkan fasilitas yang sdh ada spt upt ppa dan shelter2 yang sudah ada sebelumnya\r\n4. Utk memberikan dukungan kepada lembaga2 yg turut melakukan pendampingan kepada saksi dan korban. \r\n5. Untuk lebih menyebarluaskan informasi layanan lpsk dan cara mengaksesnya kepada publik, spt misalnya memperbanyak poster2 di area publik/dipasang di kantor pemerintah terkait dan lembaga2 masy.','2025-04-26 10:58:58','2025-04-26 10:58:58'),(15,26,'aseanri','aseanriaseanri@gmail.com','081319040119','1',49,'1','Dalam penanggulangan HIV terutama di kelompok rentan dari kalangan komunitas , yaitu komunitas korban NAPZA, Pekerja seks , Transpuan, ODHIV , LSL, masih ada perlakuan stigma, dan diskriminasi, dimana bila ada kasus yang dihadapi komunitas tersebut ketika menjadi korban cenderung tidak berani melapor karena belum ada jaminan terlindungi hak-haknya, sehingga menghambat dalam penanganan pengurangan kasus HIV','2025-04-26 11:31:54','2025-04-26 11:31:54'),(16,26,'Michelle Kristina','michellekristina@staff.ubaya.ac.id','0','1',33,'2','Sesuai cat dlm file','2025-04-26 11:39:32','2025-04-26 11:39:32'),(17,26,'Zeth Natan,S.H.,S.IP','zethnatan82@gmail.com','085190007163','1',43,'1','https://hukum.lpsk.go.id/storage/attachments/D2Pp463UheSu4Hvda59YPLLPjFT5J94NyE79ntqU.pdf','2025-04-26 11:41:29','2025-04-26 11:41:29'),(18,26,'Habibullah','bullahhabi1969@gmail.com','082124791427','1',55,'1','Partisipasi siap membangun','2025-04-26 14:05:27','2025-04-26 14:05:27'),(19,26,'Flora Nainggolan','floranainggolan.sumut@gmail.com','08116576543','1',48,'2','1.	Apakah diperlukan ketentuan dalam RUU yang mewajibkan negara dan pemda untuk melakukan pendidikan hukum kepada masyarakat? Apa metode yang paling efektif agar informasi tentang perlindungan saksi dan korban dapat menjangkau masyarakat akar rumput?\r\n\r\nMasukan :\r\na.	Bekerja sama dengan Bappenas, supaya memasukkan program perlindungan saksi dan korban ini dalam program pemerintah daerah dan stakeholder terkait, sehingga Pemerintah daerah dapat mengalokasikan anggaran dalam mendukung giat penyebarluasan informasi perlindungan saksi dan korban;\r\nb.	Membangun komunikasi dengan Kemenristek Dikti dan Kementerian Pendidikan, untuk dapat mengakomodir perlindungan saksi dan korbang sebagai salah satu kurikulum mata kuliah dan/atau mata pelajaran;\r\nc.	Menyajikan iklan  Stasiun TV milik pemerintah dan/atau swasta di prime tertentu selamat kurun waktu tertentu (misal satu tahun tetapi diiklankan setiap hari, hingga viral) yang akan memudahkan masyarakat hafal, familiar dengan iklan perlindungan sakti dan korban. Boleh mengadopsi iklan yang unik/informatif/tidak terlalu formil yang  dikemas easy educated seperti iklan bear brand, mi instan, shampoo dll.\r\n\r\n2.	Bagaimana pandangan terhadap urgensi pembentukan Victim Trust Fund atau dana bantuan korban dalam sistem perlindungan saksi dan korban di Indonesia? Apa saja bentuk kompensasi atau bantuan yang idealnya dibiayai oleh dana tersebut, termasuk untuk pemulihan medis, psikologis, dan sosial? Apakah RUU perlu secara eksplisit mengatur sumber pendanaan, mekanisme pengelolaan, dan pengawasan terhadap dana bantuan korban agar akuntabel dan berkelanjutan?\r\nMasukan :\r\na.	Boleh dialokasikan disesuaikan dengan kemampuan keuangan negara;\r\nb.	Dapat dipertimbangkan menjadi gratis (kewajiban bagi instansi terkait) misal kewajiban memberikan bantuan medis gratis  wajib minimun 2 orang korban/saksi bagi setiap rumah sakit. (dapat dipertimbangkan seperti kewajiban bagi notaris untuk memberikan konsultasi hukum gratis bagi masyarakat miskin dsb);\r\nc.	Dapat dipertimbangkan menjadi kewajiban pelaku usaha/perusahaan untuk mengalokasikan CSR untuk membantu saksi/korban;\r\nd.	Kesemuanya dikemas dalam sebuah kebijakan sehingga memiliki dasar hukum yang implementatif.','2025-04-26 15:28:35','2025-04-26 15:28:35'),(20,26,'Kristoni, S.H','kristoniham@gmail.com','085350352266','1',29,'1','LPSK sebagai lembaga negara yang berwenang dalam memberikan perlindungan terhadap saksi dan korban, berkaitan dengan hal itu, UU LPSK harus di akomodir keberadaan dalam RKUHAP yang merupakan Dasar Hukum bagi Pelaksanaan Proses Hukum terhadap saksi maupun korban, dengan adanya UU LPSK harus bisa menjamin bahwa terlaksanakan sistem peradilan pidana harus ditetap memperhatikan perlindungan dan pemenuhan hak asasi setiap korban maupun saksi. jangan sampai proses hukum dijalankan dengan intimidasi, siksaan fisik maupun nonfisik terhadap tersangka demi untuk mencapai kepastian hukum. begitu juga sebaliknya setiap orang yang menjadi saksi atas terjadinya peristiwa hukum harus betul-betul bisa dijamin keamanan dan indefendensi dalam memberikan kesaksian, supaya kebenaran dalam proses hukum dapat tercapai untuk proses hukum yang terang benderang.   Satu Hal yang paling penting yaitu jangan sampai proses hukum menjadikan orang yang sebetulnya Korban malah jadi Pelaku, ini betul-betul menjadi perhatian dan perjuangan bagi LPSK untuk meluruskan yang bengkok.','2025-04-27 07:40:48','2025-04-27 07:40:48'),(21,26,'Syams M','syamminnawa406@gmail.com','085338218380','1',45,'1','Agar lebih diperjelas kewenangan LPSK dengan dengan instansi penegak hukum dalam setiap tahapan peradilan pidana','2025-04-27 07:56:51','2025-04-27 07:56:51'),(22,26,'Ali Imran','Limran741@gmail.com','087887775989','1',36,'1','1. Perlindungan Identitas Digital : Mengatur perlindungan data pribadi dan identitas digital saksi/korban di era teknologi informasi\r\n2. Pengaturan Perlindungan Lintas Negara : Menegaskan mekanisme perlindungan bagi saksi/korban dalam kasus lintas negara atau transnasional','2025-04-28 11:46:45','2025-04-28 11:46:45');
/*!40000 ALTER TABLE `public_participations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regulation_attachments`
--

DROP TABLE IF EXISTS `regulation_attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regulation_attachments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `regulation_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `regulation_attachments_regulation_id_foreign` (`regulation_id`),
  CONSTRAINT `regulation_attachments_regulation_id_foreign` FOREIGN KEY (`regulation_id`) REFERENCES `regulations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regulation_attachments`
--

LOCK TABLES `regulation_attachments` WRITE;
/*!40000 ALTER TABLE `regulation_attachments` DISABLE KEYS */;
INSERT INTO `regulation_attachments` VALUES (2,5,'Rancangan Perubahan Peraturan LPSK Nomor 1 Tahun 2020.doc','attachments/iwffeUb45BmPThqbiAuBY7puAknqHqkdfzrWs9vt.doc','2024-10-30 04:59:17','2024-10-30 04:59:17'),(3,24,'Rancangan Peraturan LPSK tentang Perubahan Peraturan Nomor 7 Tahun 2020 tentang Korban TP Terorisme Masa Lalu.doc','attachments/DjANJ9AcdRHb9Qol0F4bDHDiaU0eVdiUC5A7SRz7.doc','2024-11-04 00:54:05','2024-11-04 00:54:05'),(6,26,'TOR Latar Belakang dan Pertanyaan Kunci 26 April 2025.pdf','attachments/D2Pp463UheSu4Hvda59YPLLPjFT5J94NyE79ntqU.pdf','2025-04-23 14:33:23','2025-04-23 14:33:23');
/*!40000 ALTER TABLE `regulation_attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regulations`
--

DROP TABLE IF EXISTS `regulations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regulations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `jdih_link` longtext COLLATE utf8mb4_unicode_ci,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL DEFAULT '2024-10-29',
  `information` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pengusulan','penyusunan_pembahasan','partisipasi_publik','persetujuan_pimpinan','penyelarasan','penetapan','pengundangan_peraturan','penyusunan_informasi','penyebarluasan','laporan_proses','analisa_evaluasi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pengusulan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regulations`
--

LOCK TABLES `regulations` WRITE;
/*!40000 ALTER TABLE `regulations` DISABLE KEYS */;
INSERT INTO `regulations` VALUES (3,'https://jdih.lpsk.go.id/dokumen/view?id=59','Peraturan LPSK Nomor 1 Tahun 2020 tentang Pembentukan Peraturan di Lingkungan LPSK','peraturan-lpsk-nomor-1-tahun-2020-tentang-pembentukan-peraturan-di-lingkungan-lpsk-ropfqx','2024-10-29',NULL,'Pengaturan mengenai proses pembentukan peraturan di lingkungan LPSK mulai dari tahapan perencanaan, penyusunan, pembahasan, pengesahan atau penetapan, dan pengundangan.','analisa_evaluasi','2024-10-29 20:59:37','2024-10-29 21:35:54'),(5,NULL,'Rancangan Peraturan LPSK tentang Pembentukan Peraturan di Lingkungan LPSK','rancangan-peraturan-lpsk-tentang-pembentukan-peraturan-di-lingkungan-lpsk-wjg0hs','2024-10-29',NULL,'Peraturan ini merupakan pembaharuan terhadap Peraturan LPSK yang sudah ada sebelumnya, yaitu Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 1 Tahun 2020 tentang Tata Cara Pembentukan Peraturan di Lingkungan Lembaga Perlindungan Saksi dan Korban. Melalui Rancangan Peraturan ini, diatur mengenai proses pembentukan peraturan di lingkungan LPSK mulai dari perencanaan, analisis dan evaluasi, penyusunan, pembahasan, persetujuan, partisipasi publik, pengesahan atau penetapan, pengundangan, penyebarluasan, dan pemantauan. selain itu juga, diatur mengenai instrumen hukum lain selain Pertaran LPSK, mulai dari\r\na.    Peraturan Sekjen,\r\nb.    Keputusan LPSK;\r\nc.	Keputusan Ketua LPSK;\r\nd.	Keputusan Sekretaris Jenderal LPSK;\r\ne.	surat edaran;\r\nf.	petunjuk pelaksanaan/petunjuk teknis/pedoman teknis;\r\ng.	keterangan LPSK; dan\r\nh.	pendapat hukum.','penyelarasan','2024-10-30 04:59:17','2024-11-04 01:08:00'),(6,'https://jdih.lpsk.go.id/dokumen/view?id=60','Peraturan LPSK Nomor 2 Tahun 2020 tentang Permohonan Perlindungan Saksi dan Korban','peraturan-lpsk-nomor-2-tahun-2020-tentang-permohonan-perlindungan-saksi-dan-korban-myghvl','2024-10-29',NULL,'Peraturan ini mengatur mengenai subjek perlindungan, tata cara pengajuan permohonan, persyaratan permohonan, pemeriksaan, penelaahan, sampai dengan keputusan atas permohonan perlindungan yang diajukan','analisa_evaluasi','2024-10-30 05:18:52','2024-10-30 05:19:04'),(7,'https://jdih.lpsk.go.id/dokumen/view?id=61','Peraturan LPSK Nomor 3 Tahun 2020 tentang Penyelenggaraan Sistem Pengendalian Intern Pemerintah di Lingkungan LPSK','peraturan-lpsk-nomor-3-tahun-2020-tentang-penyelenggaraan-sistem-pengendalian-intern-pemerintah-di-lingkungan-lpsk-psnv4l','2024-10-29',NULL,'Peraturan ini mengatur mengenai proses integral pada tindakan dan kegiatan yang dilakukan secara terus-menerus oleh\r\nPimpinan LPSK, dan seluruh pegawai untuk memberikan keyakinan memadai atas tercapainya tujuan organisasi melalui kegiatan yang efektif dan efisien, keandalan pelaporan keuangan, pengamanan aset negara, dan ketaatan terhadap peraturan perundang-undangan.','analisa_evaluasi','2024-10-30 05:21:35','2024-10-30 05:21:41'),(8,'https://jdih.lpsk.go.id/dokumen/view?id=62','Perturan LPSK Nomor 4 Tahun 2020 tentang Klasifikasi Arsip di Lingkungan LPSK','perturan-lpsk-nomor-4-tahun-2020-tentang-klasifikasi-arsip-di-lingkungan-lpsk-yuomc3','2024-10-29',NULL,'Peraturan ini mengatur mengenai jenis-jenis arsip, serta pengaturan Arsip secara berjenjang dari hasil pelaksanaan fungsi dan tugas LPSK menjadi beberapa kategori unit informasi kearsipan.','analisa_evaluasi','2024-10-30 05:23:23','2024-10-30 05:23:30'),(9,'https://jdih.lpsk.go.id/dokumen/view?id=63','Peraturan LPSK Nomor 5 Tahun 2020 tentang Jadwal Retensi Arsip','peraturan-lpsk-nomor-5-tahun-2020-tentang-jadwal-retensi-arsip-thqyoo','2024-10-29',NULL,'Peraturan ini mengatur mengenai daftar yang berisi jangka waktu penyimpanan atau retensi, jenis arsip, dan keterangan\r\nyang berisi rekomendasi tentang penetapan suatu jenis arsip yang dimusnahkan, dinilai kembali, atau dipermanenkan yang dipergunakan sebagai pedoman penyusutan dan penyelematan arsip di lingkungan Lembaga Perlindungan Saksi dan Korban.','analisa_evaluasi','2024-10-30 05:25:25','2024-10-30 05:25:29'),(10,'https://jdih.lpsk.go.id/dokumen/view?id=64','Peraturan LPSK Nomor 6 Tahun 2020 tentang Sistem Klasifikasi Keamanan dan Akses Arsip Dinamis di Lingkungan LPSK','peraturan-lpsk-nomor-6-tahun-2020-tentang-sistem-klasifikasi-keamanan-dan-akses-arsip-dinamis-di-lingkungan-lpsk-upcbm2','2024-10-29',NULL,'Peraturan ini berisi mengenai pengkategorian dan pengaturan ketersediaan Arsip Dinamis sebagai hasil dari kewenangan hukum dan otoritas legal pencipta Arsip untuk mempermudah pemanfaatan Arsip.','analisa_evaluasi','2024-10-30 05:27:40','2024-10-30 05:27:45'),(11,'https://jdih.lpsk.go.id/dokumen/view?id=65','Peraturan LPSK Nomor 7 Tahun 2020 tentang Tata Cara Pengajuan dan Pemeriksaan Permohonan Kompensasi, Bantuan Medis, atau Rehabilitasi Psikososial dan Psikologis Bagi Korban Tindak Pidana Terorisme Masa Lalu','peraturan-lpsk-nomor-7-tahun-2020-tentang-tata-cara-pengajuan-dan-pemeriksaan-permohonan-kompensasi-bantuan-medis-atau-rehabilitasi-psikososial-dan-psikologis-bagi-korban-tindak-pidana-terorisme-masa-lalu-knlln8','2024-10-29',NULL,'Peraturan ini mengatur mengenai Tata Cara Pengajuan dan Pemeriksaan Permohonan Kompensasi, Bantuan Medis, atau Rehabilitasi Psikososial dan Psikologis Bagi Korban Tindak Pidana Terorisme Masa Lalu. Korban Korban langsung yang diakibatkan dari Tindak Pidana Terorisme yang terjadi sejak berlakunya Peraturan Pemerintah Pengganti Undang-Undang Nomor 1 Tahun 2002 tentang Pemberantasan Tindak Pidana Terorisme sampai dengan berlakunya Undang-Undang Nomor 5 Tahun 2018 tentang Perubahan atas Undang-Undang Nomor 15 Tahun 2003 tentang Penetapan Peraturan Pemerintah Pengganti Undang-Undang Nomor 1 Tahun\r\n2002 tentang Pemberantasan Tindak Pidana Terorisme Menjadi Undang-Undang yang belum mendapatkan Kompensasi, bantuan medis, atau rehabilitasi psikososial dan psikologis.','analisa_evaluasi','2024-10-30 05:29:58','2024-10-30 05:30:03'),(12,'https://jdih.lpsk.go.id/dokumen/view?id=66','Perturan LPSK Nomor 8 Tahun 2020 tentang Sidang Mahkamah Pimpinan LPSK','perturan-lpsk-nomor-8-tahun-2020-tentang-sidang-mahkamah-pimpinan-lpsk-27qfzw','2024-10-29',NULL,'Perturan ini mengatur mengenai sebuah rapat yang disebut majelis untuk pengambilan keputusan atas permohonan perlindungan, perubahan jenis layanan perlindungan dan/atau penghentian perlindungan.','analisa_evaluasi','2024-10-30 05:31:41','2024-10-30 05:31:47'),(13,'https://jdih.lpsk.go.id/dokumen/view?id=67','Peraturan LPSK Nomor 1 Tahun 2023 tentang Pelaksanaan Pemberian Tunjangan Kinerja Pegawai di Lingkungan Sekretariat Jenderal LPSK','peraturan-lpsk-nomor-1-tahun-2023-tentang-pelaksanaan-pemberian-tunjangan-kinerja-pegawai-di-lingkungan-sekretariat-jenderal-lpsk-mrqeep','2024-10-29',NULL,'Perturan ini mengatur mengenai mekanisme Pemberian Tunjangan Kinerja melalui capaian SKP dan melalui pencatatan kehadiran. selain itu juga mengatur mengenai ketentuan jam kerja, cuti, Pelanggaran dan Pemotongan Tunjangan Kinerja Berdasarkan Pelaksanaan Kehadiran Pegawai LPSK, serta bagaimana ketentuan pegawai yang dianggap tidak melanggar ketentuan jam kerja.','analisa_evaluasi','2024-10-30 05:35:09','2024-10-30 05:35:14'),(14,'https://jdih.lpsk.go.id/dokumen/view?id=14','Peraturan LPSK Nomor 1 Tahun 2022 tentang Pemberian Perlindungan Kepada Saksi dan Korban','peraturan-lpsk-nomor-1-tahun-2022-tentang-pemberian-perlindungan-kepada-saksi-dan-korban-a479nz','2024-10-29',NULL,'Peraturan ini memuat mengenai bentuk-bentuk program perlindungan, serta bagaimana mekanisme pemberian perlindungan dan bantuan kepada saksi dan/atau korban setelah diputuskan menjadi terlindung LPSK.','analisa_evaluasi','2024-10-30 05:37:01','2024-10-30 05:37:07'),(15,'https://jdih.lpsk.go.id/common/dokumen/2023plpsk002.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 2 Tahun 2023 Tentang Susunan Panitia Seleksi, Tata Cara Pelaksanaan Seleksi dan Pemilihan Calon Anggota Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-2-tahun-2023-tentang-susunan-panitia-seleksi-tata-cara-pelaksanaan-seleksi-dan-pemilihan-calon-anggota-lembaga-perlindungan-saksi-dan-korban-iq4z5t','2024-10-29',NULL,'Dalam Peraturan ini diatur tentang tata cara pelaksanaan seleksi dan\r\npemilihan calon anggota. Peraturan ini juga merincikan susunan panitia\r\nseleksi, alur, dan pendanaan seleksi anggota.','analisa_evaluasi','2024-10-31 11:48:02','2024-10-31 11:48:56'),(16,'https://jdih.lpsk.go.id/common/dokumen/2023plpsk003.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 3 Tahun 2023 tentang Pemberian Penghargaan Paritrana Bagi Pimpinan dan Pegawai di Lingkungan Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-3-tahun-2023-tentang-pemberian-penghargaan-paritrana-bagi-pimpinan-dan-pegawai-di-lingkungan-lembaga-perlindungan-saksi-dan-korban-2frptk','2024-10-29',NULL,'Peraturan ini mengatur tentang acuan definitif penghargaan yang dimaksud dan jenis dari penghargaan dalam aturan ini serta mekanisme pemberian penghargaan.','analisa_evaluasi','2024-10-31 11:55:43','2024-10-31 11:55:52'),(17,'https://jdih.lpsk.go.id/common/dokumen/2023plpsk004.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 4 Tahun 2023 tentang Pengelolaan Rumah Aman','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-4-tahun-2023-tentang-pengelolaan-rumah-aman-jsaqrt','2024-10-29',NULL,'Dalam Peraturan ini diatur tentang pengelolaan rumah aman dengan menetapkan batasan istilah yang digunakan dalam pengaturannya. Diatur tentang fungsi dan standar rumah aman serta pelaksanaan pengelolaan perlindungan di rumah aman meliputi persyaratan penempatan, persiapan perlindungan, pelaksanaan perlindungan, pengamanan dan pengawalan, program perlindungan,  penghentian perlindungan, pemantauan dan pengendalian.','analisa_evaluasi','2024-10-31 13:31:13','2024-10-31 13:31:23'),(18,'https://jdih.lpsk.go.id/common/dokumen/40.perlpsknomor5tahun2023.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 5 Tahun 2023 tentang Tata Cara Pemilihan Ketua Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-5-tahun-2023-tentang-tata-cara-pemilihan-ketua-lembaga-perlindungan-saksi-dan-korban-kyqhq9','2024-10-29',NULL,'Dalam peraturan ini diatur tentang Pimpinan LPSK, rapat pemilihan, tata\r\ncara pemilihan, hasil pemilihan dan masa jabatan Pimpinan LPSK.','analisa_evaluasi','2024-10-31 13:55:16','2024-10-31 13:55:24'),(19,'https://jdih.lpsk.go.id/common/dokumen/2024plpsk001.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 1 Tahun 2024 tentang Standar Pelayanan di Lingkungan Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-1-tahun-2024-tentang-standar-pelayanan-di-lingkungan-lembaga-perlindungan-saksi-dan-korban-iy7goi','2024-10-29',NULL,'Dalam Peraturan ini diatur tentang Standar Pelayanan di lingkungan LPSK meliputi pelayanan penerimaan permohonan, tindakan proaktif, pemberian perlindungan darurat, pemberian perlindungan dan informasi publik.','analisa_evaluasi','2024-10-31 14:00:13','2024-10-31 14:00:25'),(20,'https://jdih.lpsk.go.id/common/dokumen/2024plpsk002.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 2 Tahun 2024 tentang Pengelolaan Pengaduan Pelayanan Publik dan Whistleblowing System di Lingkungan Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-2-tahun-2024-tentang-pengelolaan-pengaduan-pelayanan-publik-dan-whistleblowing-system-di-lingkungan-lembaga-perlindungan-saksi-dan-korban-rjsibr','2024-10-29',NULL,'Di dalam peraturan ini diatur tentang mekanisme penanganan pengaduan meliputi penyampaian pengaduan, penanganan pengaduan, perlindungan pengaduan dan sistem pengelolaan pengaduan pelayanan publik nasional.','analisa_evaluasi','2024-10-31 14:04:24','2024-10-31 14:04:31'),(21,'https://jdih.lpsk.go.id/common/dokumen/2024plpsk003.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 3 Tahun 2024 tentang Pedoman Teknis Keprotokolan di Lingkungan Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-3-tahun-2024-tentang-pedoman-teknis-keprotokolan-di-lingkungan-lembaga-perlindungan-saksi-dan-korban-seojbi','2024-10-29',NULL,'Di dalam peraturan ini diatur tentang acara kenegaraan, acara resmi, tata tempat, tata upacara, tata penghormatan, kunjungan kerja, tamu negara dan jamuan resmi.','analisa_evaluasi','2024-10-31 14:07:41','2024-10-31 14:07:49'),(22,'https://jdih.lpsk.go.id/common/dokumen/2024plpsk004.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 4 Tahun 2024 tentang Pengelolaan Jaringan Dokumentasi dan Informasi Hukum Lembaga Perlindungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-4-tahun-2024-tentang-pengelolaan-jaringan-dokumentasi-dan-informasi-hukum-lembaga-perlindungan-saksi-dan-korban-rbkguf','2024-10-29',NULL,'Di dalam peraturan ini diatur tentang pengelolaan jaringan dokumentasi dan informasi hukum LPSK meliputi pengelola JDIH LPSK yang terdiri atas pusat JDIH LPSK dan anggota JDIH LPSK beserta dengan tugas dan fungsinya.','analisa_evaluasi','2024-10-31 14:11:30','2024-10-31 14:11:38'),(23,'https://jdih.lpsk.go.id/common/dokumen/2021plpsk001.pdf','Peraturan Lembaga Perlindungan Saksi dan Korban Nomor 1 Tahun 2021 tentang Pelaksanaan Pemberian Tunjangan Kinerja Pegawai di Lingkungan Sekretariat Jenderal Lembaga Perlidnungan Saksi dan Korban','peraturan-lembaga-perlindungan-saksi-dan-korban-nomor-1-tahun-2021-tentang-pelaksanaan-pemberian-tunjangan-kinerja-pegawai-di-lingkungan-sekretariat-jenderal-lembaga-perlidnungan-saksi-dan-korban-g9ree5','2024-10-29',NULL,'Dalam Peraturan ini diatur tentang Pelaksanaan Pemberian Tunjangan Kinerja di Lingkungan Sekretariat Jenderal Lembaga Perlindungan Saksi dan Korban yang meliputi Mekanisme Pemberian Tunjangan Kinerja dan Pembayaran Tunjangan Kinerja','analisa_evaluasi','2024-10-31 14:15:14','2024-10-31 14:15:23'),(24,NULL,'Rancangan Peraturan LPSK tentang Perubahan Atas Peraturan LPSK Nomor 7 Tahun 2020 tentang Tindak Pidana Terorisme Masa Lalu','rancangan-peraturan-lpsk-tentang-perubahan-atas-peraturan-lpsk-nomor-7-tahun-2020-tentang-tindak-pidana-terorisme-masa-lalu-pyr6gh','2024-10-29',NULL,'Peraturan LPSK ini berjudul Peraturan LPSK tentang Perubahan atas Peraturan LPSK Nomor 7 Tahun 2020 tentang Tata Cara Pengajuan dan Pemeriksaan Permohonan Kompensasi, Bantuan Medis, atau Rehabilitasi Psikososial dan Psikologis Bagi Korban Tindak Pidana Terorisme Masa Lalu. Dibentuk dalam rangka melakukan perubahan terhadap 1 Pasal di dalamnya, yaitu Pasal 5 yang mengatur mengenai batas waktu penyampaian permohonan kepada LPSK untuk kompensasi, bantuan medis, bantuan rehabilitasi psikososial dan psikologis bagi korban tindak pidana terorisme masa lalu.\r\n\r\nPasal 5 yang semua menyebutkan batas waktu sampai dengan 22 Juni Tahun 2021, maka disesuaikan sesuai dengan Putusan Mahkamah Konstitusi Nomor 103/PUU-XXO/2023 tentang Pengujian Undang-Undang Undang-Undang Nomor 5 Tahun 2018 tentang Perubahan atas Undang-Undang Nomor 15 Tahun 2003 tentang Penetapan Peraturan Pemerintah Pengganti Undang-Undang Nomor 1 Tahun 2002 tentang Pemberantasan Tindak Pidana Terorisme Menjadi Undang-Undang terhadap Undang-Undang Dasar Negara Republik Indonesia Tahun 1945, yang memberikan batasan pengajuan permohonan sampai dengan 22 Juni 2028.','penyelarasan','2024-11-04 00:54:05','2024-11-04 01:07:32'),(26,NULL,'Masukan untuk RUU Perubahan Kedua UU Perlindungan Saksi dan Korban','masukan-untuk-ruu-perubahan-kedua-uu-perlindungan-saksi-dan-korban-ysi62r','2024-10-29','Ikuti Petunjuk Dibawah ini!','(1) Tolong Lengkapi data diri Bapak dan Ibu pada Bagian dibawah ini;\r\n(2)  Unduh Daftar Pertanyaan pada bagian sebelah kanan atas (tertulis lampiran dan klik unduh);\r\n(3) Kemudian Isi Masukan terkait dengan Substansi RUU tentang Perubahan Kedua UU Perlindungan Saksi dan Korban berdasarkan 11 (sebelas) daftar pertanyaan yang terdapat pada Bagian II (Kedua) yang berjudul \"Permasalahan dalam Pertanyaan Seputar Perlindungan Saksi dan Korban\" pada kolom Partisipasi dibawah ini atau Dapat mengunggah/mengupload file masukan yang telah di isi oleh Bapak dan Ibu pada bagian lampiran (Klik Chose File/Pilih File);\r\n(4) Kemudian pastikan untuk klik submit.','partisipasi_publik','2025-04-23 14:33:23','2025-04-23 14:47:42');
/*!40000 ALTER TABLE `regulations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(1,2),(6,2),(1,3),(16,3),(17,3),(18,3),(19,3),(1,4),(16,4),(21,4),(24,4),(25,4),(26,4),(27,4),(28,4),(29,4),(30,4),(1,5),(16,5),(23,5),(1,6),(16,6),(23,6),(1,7),(16,7),(23,7);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Admin','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(2,'User','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(3,'Perwakilan Unit Kerja','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(4,'Biro Hukum','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(5,'Karo HKH','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(6,'Sekretaris Jenderal','web','2024-10-29 20:38:52','2024-10-29 20:38:52'),(7,'Pimpinan','web','2024-10-29 20:38:52','2024-10-29 20:38:52');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('4jpsWph17UvZVPy4xixbbWzRVNDRBDbZr9GXRrVB',NULL,'43.156.202.34','Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZG1FbkRLaHRNeHlwOGNEWWwyOVFrRWJDbURGSzFxbFpvc3FTTDZyMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjM6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1748398557),('76S1U9Br83KZQLwhLt93tknbwrGmI22ca0NSWME6',NULL,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVUNBdHpRV2JxVEhqMDVwcVhFdHBMWlBocWtHQVd0UUlSWnZMVGFXMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTUyOiJodHRwOi8vaHVrdW0ubHBzay5nby5pZC9ldmFsdWFzaS9wZXJhdHVyYW4tbHBzay1ub21vci02LXRhaHVuLTIwMjAtdGVudGFuZy1zaXN0ZW0ta2xhc2lmaWthc2kta2VhbWFuYW4tZGFuLWFrc2VzLWFyc2lwLWRpbmFtaXMtZGktbGluZ2t1bmdhbi1scHNrLXVwY2JtMiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzM6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkL2Rhc2hib2FyZCI7fX0=',1748404253),('8engCjVRNzkzrNP2kCWUWrMli8QwisBZXnM9X6jp',NULL,'202.51.201.2','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEdJNGtkblF1TzZkTlRzYjk1MFFuSkxYeFRreVpyZEo2RGV4UDM4OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTIyOiJodHRwOi8vaHVrdW0ubHBzay5nby5pZC9ldmFsdWFzaS9wZXJhdHVyYW4tbHBzay1ub21vci0yLXRhaHVuLTIwMjAtdGVudGFuZy1wZXJtb2hvbmFuLXBlcmxpbmR1bmdhbi1zYWtzaS1kYW4ta29yYmFuLW15Z2h2bCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1748398077),('cCIfZJ6jtpATmyKHivrWxWvtcQptmz4r390eQvRQ',1,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSDVwR3I0bFYzUlRjR1RCMTRpOXlrZmlhbmJZTnZudUNBcU9tbFY0byI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwOi8vaHVrdW0ubHBzay5nby5pZC9wZXJhdHVyYW4vZGF0YSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1748406517),('gSk9Hbd92EEzEgrOmTuChhkDxebTrNSNU1v46aeu',1,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZnRSYUNya005M3pYOWRnZmZJcnZtcWRMTHd1WG9FRjhaYWNCY0pHMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkL3BlcmF0dXJhbi9kYXRhL3Blbmd1c3VsYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1748406849),('HPRBxS2KfR2ycVsv0IA2TlDnv4IwACeIXe5fFAke',1,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSjFuMVE0UlVBUWs3d1FFSmw2QzZZM3c4OXl1UkZtTFY1V0xlRzhEciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkL3BlcmF0dXJhbi9kYXRhL3BlbmV0YXBhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1748406061),('hzi7OAQM9oGlLItZgOcvRIleusfzBOnFNBCiTriA',NULL,'202.51.201.2','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNGE5TXdjVE1WeUlwMFo4a2wzdXdDSzhBZXJ0dHBTeWhaNWxMeVd0eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTQ0OiJodHRwOi8vaHVrdW0ubHBzay5nby5pZC9mcm9udC1wZXJhdHVyYW4vcGVyYXR1cmFuLWxlbWJhZ2EtcGVybGluZHVuZ2FuLXNha3NpLWRhbi1rb3JiYW4tbm9tb3ItNC10YWh1bi0yMDIzLXRlbnRhbmctcGVuZ2Vsb2xhYW4tcnVtYWgtYW1hbi1qc2FxcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1748398221),('itK7ZEqPipVxqjGPVuOPjewmukoaJpnTois03jy0',NULL,'202.51.201.2','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYWFIbElHYjdQRUo2YmdpeWFUaVpId29zUHNLblhGR0RJU2lxdWpqSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTE3OiJodHRwOi8vaHVrdW0ubHBzay5nby5pZC9mcm9udC1wZXJhdHVyYW4vcGVydHVyYW4tbHBzay1ub21vci04LXRhaHVuLTIwMjAtdGVudGFuZy1zaWRhbmctbWFoa2FtYWgtcGltcGluYW4tbHBzay0yN3FmenciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1748398722),('qrwKLEGNQFDEfbVuUPaaVnVxVG5VejsiaFQTcfOT',NULL,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaW1HS0poZUYyOVdoY095RXc2NVc4Q2R5eXo5b05wZHZwZnVmM3lMeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkL3BhcnRpc2lwYXNpLXB1YmxpayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1748405856),('Uct2aIq4og6ERUmNAoDuPmFs4G1oSqEgQ7mf0iPs',1,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36 Edg/136.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRXo4U01RYUdNUVh4c3pSM3FjaFpnakJwcVRMeUJFODdjQmJVOXM5UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkL3BlcmF0dXJhbi9kYXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1748406482),('vNOlBzkg9xAVHDmvAB294ow2SieQMnTuY8OwieGN',1,'103.142.203.34','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/136.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibndza2NVVnVnRFhRWGR0eEFOUEFVd1F3bWE1bUhnbVVhVHAwQ2FNaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly9odWt1bS5scHNrLmdvLmlkL3BlcmF0dXJhbi9kYXRhIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1748405219);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super Admin','superadmin@example.com',NULL,'$2y$12$POpA/1vsQSg6uvpyr7.CMew2Bmlhry1wWWJP07YI5KgH4C8N/2qIe','X86vQUhnASAnkbUaYZlqcsI0Uut4NwmEYckJ33qRX1jN9L3QrdnEbZ1Nq4bn','2024-10-29 20:38:51','2024-10-29 20:38:51'),(2,'User','user@example.com',NULL,'$2y$12$HjGv6g0q2Je7.iOaMpCwyu.owLtRMjd55yGIrPwhWzpji7eeyeQli',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(3,'Biro Hukum','hukum@example.com',NULL,'$2y$12$YQom1OQA147btlvVHDtilOlGuqy22c.YXqMvA5YRxLEvkf8ql8ZUG',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(4,'Perwakilan Unit Kerja','perwakilan@example.com',NULL,'$2y$12$i4vdPdJkWSdV85WSa0m9c.GKtNwXKLGcdMYABlMAIx62bslkRr8dm',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(5,'Karo HKH','karohkh@example.com',NULL,'$2y$12$F9z1OiyRooVEXGLlERm1BO7XnFdlXGQHZ3XDLLJ5aAgQUC3VcBCcq',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(6,'Sekretaris Jendral','sekretarisjendral@example.com',NULL,'$2y$12$lDCt1pxg/9dNOhbBQmXzGeUoWDAg/Yj9oMVdU/G0wNnqwS0h76a3u',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(7,'Pimpinan','pimpinan@example.com',NULL,'$2y$12$ittnUGAZhv2rlUdKVyFHkOpc07KG1Uq5XoKjlZSU/nT2nhu0RnXty',NULL,'2024-10-29 20:38:51','2024-10-29 20:38:51'),(8,'fctoer','fctoer@gmail.com',NULL,'$2y$12$t8bSCvTxTueRMnKFBLz.9OcdQY2LZyWiJh.G8TXzK/M5.m3xJlZYu',NULL,'2025-05-27 16:08:15','2025-05-27 16:08:15');
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

-- Dump completed on 2025-05-28  4:34:48
