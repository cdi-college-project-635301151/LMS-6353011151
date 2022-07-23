CREATE DATABASE  IF NOT EXISTS `db_library_management_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_library_management_system`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: db_library_management_system
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (55,'2014_10_12_000000_create_users_table',1),(56,'2014_10_12_100000_create_password_resets_table',1),(57,'2019_08_19_000000_create_failed_jobs_table',1),(58,'2019_12_14_000001_create_personal_access_tokens_table',1),(59,'2022_06_08_153110_create_user_type_table',1),(60,'2022_06_09_005256_create_members_table',1),(61,'2022_06_09_011644_create_address_table',1),(64,'2022_06_13_205136_create_categories',1),(65,'2022_06_14_032602_create_maturiy_table',1),(66,'2022_06_14_160641_create_genre_table',1),(67,'2022_06_14_195426_create_authors_table',1),(68,'2022_06_15_171546_create_book_isbn_table',1),(69,'2022_06_19_020647_create_document_records',1),(70,'2022_06_19_031710_create_document_type_table',1),(71,'2022_06_20_085821_create_documents_table',1),(75,'2022_07_02_152427_create_borrowers_type_table',3),(76,'2022_07_02_154103_create_borrowers_models_table',4),(93,'2022_06_22_003224_create_view_documents_models_table',12),(95,'2022_07_02_162547_create_borrowers_table',14),(96,'2022_06_12_163711_create_system_users_view',15),(97,'2022_07_06_155134_create_view_borrowers_records',16),(99,'2022_06_10_044704_create_members_view',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_address`
--

DROP TABLE IF EXISTS `tbl_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_address` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_address_member_code_foreign` (`member_code`),
  CONSTRAINT `tbl_address_member_code_foreign` FOREIGN KEY (`member_code`) REFERENCES `tbl_members` (`member_code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_address`
--

LOCK TABLES `tbl_address` WRITE;
/*!40000 ALTER TABLE `tbl_address` DISABLE KEYS */;
INSERT INTO `tbl_address` VALUES (1,'4E4bBnUkRenTYvzwxa8v','123 Street','Hidden','ON','A1BC2D','1','2022-07-02 09:06:44','2022-07-02 09:06:44'),(2,'2KoCwf9S7pJtXXm2UmPd','7448 Ch. Kingsley, Cote St. Luc','Montreal','QC','H4W1P1','1','2022-07-15 22:02:20','2022-07-15 22:02:20'),(3,'ArVT6ObIZtnwndsi8ltp','123 Hidden','City','ON','H4W1P3','1','2022-07-24 02:43:31','2022-07-24 02:43:31');
/*!40000 ALTER TABLE `tbl_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_authors`
--

DROP TABLE IF EXISTS `tbl_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `author_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_authors_author_code_index` (`author_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_authors`
--

LOCK TABLES `tbl_authors` WRITE;
/*!40000 ALTER TABLE `tbl_authors` DISABLE KEYS */;
INSERT INTO `tbl_authors` VALUES (1,'Gb6yPrNgViCh5wrDQ4ri','J. K. Rowling','1','2022-06-22 05:06:46','2022-06-22 05:06:46'),(2,'RaUIf3rLiPDWxUr70cQ4','Bear McCreary','1','2022-07-24 01:19:41','2022-07-24 01:19:41');
/*!40000 ALTER TABLE `tbl_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_books_isbn`
--

DROP TABLE IF EXISTS `tbl_books_isbn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_books_isbn` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `isbn_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn_desc` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_books_isbn_isbn_desc_unique` (`isbn_desc`),
  KEY `tbl_books_isbn_isbn_code_index` (`isbn_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_books_isbn`
--

LOCK TABLES `tbl_books_isbn` WRITE;
/*!40000 ALTER TABLE `tbl_books_isbn` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_books_isbn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_borrowers`
--

DROP TABLE IF EXISTS `tbl_borrowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_borrowers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `member_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `is_checked_out` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_returned` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` char(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `borrower_type` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_borrowers_document_code_foreign` (`document_code`),
  KEY `tbl_borrowers_borrower_type_foreign` (`borrower_type`),
  KEY `tbl_borrowers_member_code_document_code_borrower_type_index` (`member_code`,`document_code`,`borrower_type`),
  CONSTRAINT `tbl_borrowers_borrower_type_foreign` FOREIGN KEY (`borrower_type`) REFERENCES `tbl_borrowers_type` (`borrower_type_id`) ON DELETE CASCADE,
  CONSTRAINT `tbl_borrowers_document_code_foreign` FOREIGN KEY (`document_code`) REFERENCES `tbl_document_records` (`document_code`) ON DELETE CASCADE,
  CONSTRAINT `tbl_borrowers_member_code_foreign` FOREIGN KEY (`member_code`) REFERENCES `tbl_members` (`member_code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_borrowers`
--

LOCK TABLES `tbl_borrowers` WRITE;
/*!40000 ALTER TABLE `tbl_borrowers` DISABLE KEYS */;
INSERT INTO `tbl_borrowers` VALUES (1,'4E4bBnUkRenTYvzwxa8v','4idwakVUgfuBqPIp2qYM','2022-07-14','2022-07-22','C','C','C','Cancel as requested.',1,'2022-07-13 22:27:33','2022-07-19 20:59:29'),(2,'4E4bBnUkRenTYvzwxa8v','WW7aOUpZvQNLaR8H6WFP','2022-07-14','2022-07-29','A','D','D',NULL,1,'2022-07-13 22:28:22','2022-07-24 00:51:25'),(3,'2KoCwf9S7pJtXXm2UmPd','4idwakVUgfuBqPIp2qYM','2022-07-27','2022-07-27','C','C','C','Cancelled as requested.',2,'2022-07-15 22:05:38','2022-07-19 20:59:37'),(4,'2KoCwf9S7pJtXXm2UmPd','4idwakVUgfuBqPIp2qYM','2022-07-18','2022-08-03','A','D','D',NULL,1,'2022-07-15 22:07:20','2022-07-23 23:57:37'),(5,'2KoCwf9S7pJtXXm2UmPd','WW7aOUpZvQNLaR8H6WFP','2022-07-11','2022-07-19','A','D','D',NULL,1,'2022-07-18 05:36:34','2022-07-20 22:38:14'),(6,'4E4bBnUkRenTYvzwxa8v','4idwakVUgfuBqPIp2qYM','2022-07-26','2022-08-04','C','C','C','Tests Request',1,'2022-07-20 21:07:25','2022-07-20 21:14:29'),(7,'4E4bBnUkRenTYvzwxa8v','4idwakVUgfuBqPIp2qYM','2022-07-27','2022-07-29','A','P','A','',1,'2022-07-20 21:14:57','2022-07-20 21:15:41'),(8,'2KoCwf9S7pJtXXm2UmPd','WW7aOUpZvQNLaR8H6WFP','2022-07-25','2022-07-27','A','P','A','',1,'2022-07-23 22:14:58','2022-07-24 00:16:30'),(9,'2KoCwf9S7pJtXXm2UmPd','4idwakVUgfuBqPIp2qYM','2022-07-25','2022-07-27','C','C','C','- Cancelled as requested by the student.',1,'2022-07-23 23:58:20','2022-07-24 00:31:30');
/*!40000 ALTER TABLE `tbl_borrowers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_borrowers_type`
--

DROP TABLE IF EXISTS `tbl_borrowers_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_borrowers_type` (
  `borrower_type_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`borrower_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_borrowers_type`
--

LOCK TABLES `tbl_borrowers_type` WRITE;
/*!40000 ALTER TABLE `tbl_borrowers_type` DISABLE KEYS */;
INSERT INTO `tbl_borrowers_type` VALUES (1,'Reservation','1','2022-07-02 19:39:49','2022-07-02 19:39:49'),(2,'Loan','1','2022-07-02 19:39:49','2022-07-02 19:39:49');
/*!40000 ALTER TABLE `tbl_borrowers_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categories`
--

DROP TABLE IF EXISTS `tbl_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_categories_category_code_index` (`category_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categories`
--

LOCK TABLES `tbl_categories` WRITE;
/*!40000 ALTER TABLE `tbl_categories` DISABLE KEYS */;
INSERT INTO `tbl_categories` VALUES (1,'fpB4eebVjasWQ7VCn9nl','Novel','Novel','1','2022-06-22 05:06:46','2022-06-22 05:06:46'),(2,'aIqy7pwVgpoBLOj85mvc','Games','Games','1','2022-07-24 01:19:41','2022-07-24 01:19:41');
/*!40000 ALTER TABLE `tbl_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_document_records`
--

DROP TABLE IF EXISTS `tbl_document_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_document_records` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `document_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_title` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn_number` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_year` int NOT NULL,
  `quantity` int NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_document_records_document_code_index` (`document_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_document_records`
--

LOCK TABLES `tbl_document_records` WRITE;
/*!40000 ALTER TABLE `tbl_document_records` DISABLE KEYS */;
INSERT INTO `tbl_document_records` VALUES (1,'WW7aOUpZvQNLaR8H6WFP','Harry Potter and the Philosopher\'s Stone','Harry Potter 1st Series','0-7475-3269-9','Gb6yPrNgViCh5wrDQ4ri',1997,8,'1','2022-06-22 05:06:46','2022-07-02 08:36:43'),(2,'4idwakVUgfuBqPIp2qYM','Harry Potter and the Chamber of Secrets','Harry Potter 2nd Series','0-7475-3849-2','Gb6yPrNgViCh5wrDQ4ri',1998,5,'1','2022-06-22 05:07:19','2022-06-22 05:07:19'),(3,'ZYBTaqMpH6wt1627W3DJ','God of War Ragnarök','God of War Ragnarök developed by Santa Monica Studio and will be published by Sony Entertainment.',NULL,'RaUIf3rLiPDWxUr70cQ4',2022,2,'1','2022-07-24 01:19:41','2022-07-24 01:19:41');
/*!40000 ALTER TABLE `tbl_document_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_document_type`
--

DROP TABLE IF EXISTS `tbl_document_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_document_type` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doc_type_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_document_type_doc_type_code_index` (`doc_type_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_document_type`
--

LOCK TABLES `tbl_document_type` WRITE;
/*!40000 ALTER TABLE `tbl_document_type` DISABLE KEYS */;
INSERT INTO `tbl_document_type` VALUES (1,'gS9FHCfcSljZs9hfA49I','Book','1','2022-06-22 05:06:46','2022-06-22 05:06:46'),(2,'4W21mB9m02DpHYeKaqhF','Disc','1','2022-07-24 01:19:41','2022-07-24 01:19:41');
/*!40000 ALTER TABLE `tbl_document_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_documents`
--

DROP TABLE IF EXISTS `tbl_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_documents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `document_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_type_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maturity_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_documents_document_code_unique` (`document_code`),
  KEY `tbl_documents_document_code_index` (`document_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_documents`
--

LOCK TABLES `tbl_documents` WRITE;
/*!40000 ALTER TABLE `tbl_documents` DISABLE KEYS */;
INSERT INTO `tbl_documents` VALUES (1,'WW7aOUpZvQNLaR8H6WFP','gS9FHCfcSljZs9hfA49I','aeIvnEvDfLiWcMwHoDrn','RdTHQNy5FoFdl8HRNxlh','fpB4eebVjasWQ7VCn9nl','1','2022-06-22 05:06:46','2022-07-02 08:36:43'),(2,'4idwakVUgfuBqPIp2qYM','gS9FHCfcSljZs9hfA49I','aeIvnEvDfLiWcMwHoDrn','RdTHQNy5FoFdl8HRNxlh','fpB4eebVjasWQ7VCn9nl','1','2022-06-22 05:07:19','2022-06-22 05:07:19'),(3,'ZYBTaqMpH6wt1627W3DJ','4W21mB9m02DpHYeKaqhF','Y2GcBgOPLYfZuSbggCoS','05o0lQ958QLVLauwGYRy','aIqy7pwVgpoBLOj85mvc','1','2022-07-24 01:19:41','2022-07-24 01:19:41');
/*!40000 ALTER TABLE `tbl_documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_genre`
--

DROP TABLE IF EXISTS `tbl_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_genre` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `genre_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_genre_genre_code_index` (`genre_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_genre`
--

LOCK TABLES `tbl_genre` WRITE;
/*!40000 ALTER TABLE `tbl_genre` DISABLE KEYS */;
INSERT INTO `tbl_genre` VALUES (1,'RdTHQNy5FoFdl8HRNxlh','Fantasy','Fantasy','1','2022-06-22 05:06:46','2022-06-22 05:06:46'),(2,'05o0lQ958QLVLauwGYRy','Action-Adventure','Action-Adventure','1','2022-06-22 05:57:24','2022-06-22 05:57:24');
/*!40000 ALTER TABLE `tbl_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_maturity`
--

DROP TABLE IF EXISTS `tbl_maturity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_maturity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `maturity_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enabled` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_maturity_maturity_code_index` (`maturity_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_maturity`
--

LOCK TABLES `tbl_maturity` WRITE;
/*!40000 ALTER TABLE `tbl_maturity` DISABLE KEYS */;
INSERT INTO `tbl_maturity` VALUES (1,'aeIvnEvDfLiWcMwHoDrn','Teenager','Teenager','1','2022-06-22 05:06:46','2022-06-22 05:06:46'),(2,'Y2GcBgOPLYfZuSbggCoS','Adult','Adult','1','2022-07-24 01:19:41','2022-07-24 01:19:41');
/*!40000 ALTER TABLE `tbl_maturity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_members`
--

DROP TABLE IF EXISTS `tbl_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_members` (
  `member_id` int unsigned NOT NULL AUTO_INCREMENT,
  `member_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `tbl_members_email_unique` (`email`),
  KEY `tbl_members_member_code_index` (`member_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_members`
--

LOCK TABLES `tbl_members` WRITE;
/*!40000 ALTER TABLE `tbl_members` DISABLE KEYS */;
INSERT INTO `tbl_members` VALUES (1,'4E4bBnUkRenTYvzwxa8v','Bryan','Binluyo','123-408-7789','bryanbinaluyo@gmail.com','2022-07-02 09:06:44','2022-07-02 09:06:44'),(2,'2KoCwf9S7pJtXXm2UmPd','Gianna Abigail','Invierno','514-995-5699','giannainvierno@gmail.com','2022-07-15 22:02:20','2022-07-15 22:02:20'),(3,'ArVT6ObIZtnwndsi8ltp','John Rey','Labegue','234-567-890','johnrey@gmail.com','2022-07-24 02:43:31','2022-07-24 02:43:31');
/*!40000 ALTER TABLE `tbl_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_types`
--

DROP TABLE IF EXISTS `tbl_user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_types` (
  `user_type_id` int unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_types`
--

LOCK TABLES `tbl_user_types` WRITE;
/*!40000 ALTER TABLE `tbl_user_types` DISABLE KEYS */;
INSERT INTO `tbl_user_types` VALUES (1,'Administrator','1','2022-06-22 05:03:45','2022-06-22 05:03:45'),(2,'Employee','1','2022-06-22 05:03:45','2022-06-22 05:03:45'),(3,'Student','1','2022-06-22 05:03:45','2022-06-22 05:03:45');
/*!40000 ALTER TABLE `tbl_user_types` ENABLE KEYS */;
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
  `user_type` int NOT NULL,
  `member_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_updated_at` timestamp NULL DEFAULT NULL,
  `is_blocked` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','useradmin@gmail.com','2022-06-22 05:03:45',1,'snaBLxyBJw','$2y$10$8cC4eHBvzt/Hke16sFfq8.aFY3F1TpwSWQz1N0.NTReKKWbMl6JB.','2022-06-22 05:03:45','0','xuwjJ4CHtV3dhJZkjvOMz2USKNZ7auBjDlzoWZeT9uQIxDGVVhA2UttaSCPM','2022-06-22 05:03:45','2022-06-22 05:03:45'),(2,'Bryan Binluyo','bryanbinaluyo@gmail.com',NULL,3,'4E4bBnUkRenTYvzwxa8v','$2y$10$UhLB6ys3KlJ62IsYFx7BgeH9gpjcHQSNDGm.jjVy5KSDYxQ8iB4NO',NULL,'0','XzGZhjQWo9JTjKOjve9gKObfph7iA1MVZw1l72QhUP20gPLjC9sKwYzZMC2f','2022-07-02 09:12:51','2022-07-06 16:04:31'),(3,'Gianna Abigail Invierno','giannainvierno@gmail.com',NULL,3,'2KoCwf9S7pJtXXm2UmPd','$2y$10$WCScFWo9fCWHT9P4GKnqVejPoC9ybRVXXTdCIP.Z0/UXBLnguvBR.',NULL,'0','Qu01FSF2sfyOUdvTklm4orITKc9KDgRAGKwe7H1dwJfpqIeuRrrwUfSBaZrh','2022-07-18 05:06:18','2022-07-18 05:11:40'),(4,'John Rey Labegue','johnrey@gmail.com',NULL,3,'ArVT6ObIZtnwndsi8ltp','$2y$10$LDZOBQcrxZa3HEAOMVLqc.DVEyRlNi8rXNxsPzwazMNvqk9jeuxwO',NULL,'0','holwbMa5M9Pq4gi2k4Joui25s6FSBInbFRdLsKRn','2022-07-24 03:03:30','2022-07-24 03:09:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_borrowers_record`
--

DROP TABLE IF EXISTS `vw_borrowers_record`;
/*!50001 DROP VIEW IF EXISTS `vw_borrowers_record`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_borrowers_record` AS SELECT 
 1 AS `id`,
 1 AS `member_code`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `document_code`,
 1 AS `doc_type_desc`,
 1 AS `genre_desc`,
 1 AS `category_desc`,
 1 AS `maturity_type`,
 1 AS `doc_title`,
 1 AS `isbn_number`,
 1 AS `author_code`,
 1 AS `author_name`,
 1 AS `publication_year`,
 1 AS `from_date`,
 1 AS `to_date`,
 1 AS `is_checked_out`,
 1 AS `is_returned`,
 1 AS `status`,
 1 AS `transaction_type`,
 1 AS `description`,
 1 AS `remarks`,
 1 AS `created_at`,
 1 AS `updated_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_documents`
--

DROP TABLE IF EXISTS `vw_documents`;
/*!50001 DROP VIEW IF EXISTS `vw_documents`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_documents` AS SELECT 
 1 AS `id`,
 1 AS `document_code`,
 1 AS `author_code`,
 1 AS `author_name`,
 1 AS `doc_title`,
 1 AS `doc_short_desc`,
 1 AS `isbn_number`,
 1 AS `publication_year`,
 1 AS `quantity`,
 1 AS `reserved`,
 1 AS `loaned`,
 1 AS `doc_type_code`,
 1 AS `doc_type_name`,
 1 AS `maturity_code`,
 1 AS `maturity_name`,
 1 AS `genre_code`,
 1 AS `genre_name`,
 1 AS `category_code`,
 1 AS `category_name`,
 1 AS `is_enabled`,
 1 AS `created_at`,
 1 AS `updated_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_members`
--

DROP TABLE IF EXISTS `vw_members`;
/*!50001 DROP VIEW IF EXISTS `vw_members`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_members` AS SELECT 
 1 AS `member_id`,
 1 AS `first_name`,
 1 AS `last_name`,
 1 AS `full_name`,
 1 AS `telephone`,
 1 AS `email`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `member_code`,
 1 AS `street_name`,
 1 AS `city`,
 1 AS `province`,
 1 AS `postal`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_system_users`
--

DROP TABLE IF EXISTS `vw_system_users`;
/*!50001 DROP VIEW IF EXISTS `vw_system_users`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_system_users` AS SELECT 
 1 AS `id`,
 1 AS `name`,
 1 AS `email`,
 1 AS `member_code`,
 1 AS `user_type`,
 1 AS `description`,
 1 AS `is_blocked`,
 1 AS `created_at`,
 1 AS `updated_at`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_borrowers_record`
--

/*!50001 DROP VIEW IF EXISTS `vw_borrowers_record`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_borrowers_record` AS select `tbl_borrowers`.`id` AS `id`,`tbl_borrowers`.`member_code` AS `member_code`,`tbl_members`.`first_name` AS `first_name`,`tbl_members`.`last_name` AS `last_name`,`tbl_documents`.`document_code` AS `document_code`,`tbl_document_type`.`short_desc` AS `doc_type_desc`,`tbl_genre`.`short_desc` AS `genre_desc`,`tbl_categories`.`short_desc` AS `category_desc`,`tbl_maturity`.`short_desc` AS `maturity_type`,`tbl_document_records`.`doc_title` AS `doc_title`,`tbl_document_records`.`isbn_number` AS `isbn_number`,`tbl_document_records`.`author_code` AS `author_code`,`tbl_authors`.`author_name` AS `author_name`,`tbl_document_records`.`publication_year` AS `publication_year`,`tbl_borrowers`.`from_date` AS `from_date`,`tbl_borrowers`.`to_date` AS `to_date`,`tbl_borrowers`.`is_checked_out` AS `is_checked_out`,`tbl_borrowers`.`is_returned` AS `is_returned`,`tbl_borrowers`.`status` AS `status`,`tbl_borrowers`.`borrower_type` AS `transaction_type`,`tbl_borrowers_type`.`description` AS `description`,`tbl_borrowers`.`remarks` AS `remarks`,`tbl_borrowers`.`created_at` AS `created_at`,`tbl_borrowers`.`updated_at` AS `updated_at` from (((((((((`tbl_borrowers` join `tbl_document_records`) join `tbl_authors`) join `tbl_borrowers_type`) join `tbl_members`) join `tbl_documents`) join `tbl_document_type`) join `tbl_genre`) join `tbl_categories`) join `tbl_maturity`) where ((`tbl_document_records`.`document_code` = `tbl_borrowers`.`document_code`) and (`tbl_authors`.`author_code` = `tbl_document_records`.`author_code`) and (`tbl_borrowers_type`.`borrower_type_id` = `tbl_borrowers`.`borrower_type`) and (`tbl_members`.`member_code` = `tbl_borrowers`.`member_code`) and (`tbl_documents`.`document_code` = `tbl_borrowers`.`document_code`) and (`tbl_document_type`.`doc_type_code` = `tbl_documents`.`doc_type_code`) and (`tbl_genre`.`genre_code` = `tbl_documents`.`genre_code`) and (`tbl_categories`.`category_code` = `tbl_documents`.`category_code`) and (`tbl_maturity`.`maturity_code` = `tbl_documents`.`maturity_code`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_documents`
--

/*!50001 DROP VIEW IF EXISTS `vw_documents`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_documents` AS select `tbl_documents`.`id` AS `id`,`tbl_documents`.`document_code` AS `document_code`,`tbl_document_records`.`author_code` AS `author_code`,`tbl_authors`.`author_name` AS `author_name`,`tbl_document_records`.`doc_title` AS `doc_title`,`tbl_document_records`.`short_desc` AS `doc_short_desc`,`tbl_document_records`.`isbn_number` AS `isbn_number`,`tbl_document_records`.`publication_year` AS `publication_year`,`tbl_document_records`.`quantity` AS `quantity`,(select count(0) from `tbl_borrowers` where ((`tbl_borrowers`.`document_code` = `tbl_documents`.`document_code`) and (`tbl_borrowers`.`status` = 'A') and (`tbl_borrowers`.`is_returned` = 'N') and (`tbl_borrowers`.`borrower_type` = '1'))) AS `reserved`,(select count(0) from `tbl_borrowers` where ((`tbl_borrowers`.`document_code` = `tbl_documents`.`document_code`) and (`tbl_borrowers`.`status` = 'A') and (`tbl_borrowers`.`is_returned` = 'N') and (`tbl_borrowers`.`borrower_type` = '2'))) AS `loaned`,`tbl_documents`.`doc_type_code` AS `doc_type_code`,`tbl_document_type`.`short_desc` AS `doc_type_name`,`tbl_maturity`.`maturity_code` AS `maturity_code`,`tbl_maturity`.`short_desc` AS `maturity_name`,`tbl_genre`.`genre_code` AS `genre_code`,`tbl_genre`.`short_desc` AS `genre_name`,`tbl_categories`.`category_code` AS `category_code`,`tbl_categories`.`short_desc` AS `category_name`,`tbl_documents`.`is_enabled` AS `is_enabled`,`tbl_documents`.`created_at` AS `created_at`,`tbl_documents`.`updated_at` AS `updated_at` from ((((((`tbl_documents` join `tbl_document_type`) join `tbl_maturity`) join `tbl_genre`) join `tbl_categories`) join `tbl_document_records`) join `tbl_authors`) where ((`tbl_document_type`.`doc_type_code` = `tbl_documents`.`doc_type_code`) and (`tbl_maturity`.`maturity_code` = `tbl_documents`.`maturity_code`) and (`tbl_genre`.`genre_code` = `tbl_documents`.`genre_code`) and (`tbl_categories`.`category_code` = `tbl_documents`.`category_code`) and (`tbl_document_records`.`document_code` = `tbl_documents`.`document_code`) and (`tbl_authors`.`author_code` = `tbl_document_records`.`author_code`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_members`
--

/*!50001 DROP VIEW IF EXISTS `vw_members`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_members` AS select `tbl_members`.`member_id` AS `member_id`,`tbl_members`.`first_name` AS `first_name`,`tbl_members`.`last_name` AS `last_name`,concat(`tbl_members`.`first_name`,' ',`tbl_members`.`last_name`) AS `full_name`,`tbl_members`.`telephone` AS `telephone`,`tbl_members`.`email` AS `email`,`tbl_members`.`created_at` AS `created_at`,`tbl_members`.`updated_at` AS `updated_at`,`tbl_members`.`member_code` AS `member_code`,`tbl_address`.`street_name` AS `street_name`,`tbl_address`.`city` AS `city`,`tbl_address`.`province` AS `province`,`tbl_address`.`postal` AS `postal` from (`tbl_members` join `tbl_address`) where ((`tbl_address`.`member_code` = `tbl_members`.`member_code`) and `tbl_members`.`member_code` in (select `users`.`member_code` from `users` where (`users`.`user_type` = 3))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_system_users`
--

/*!50001 DROP VIEW IF EXISTS `vw_system_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_system_users` AS select `users`.`id` AS `id`,`users`.`name` AS `name`,`users`.`email` AS `email`,`users`.`member_code` AS `member_code`,`users`.`user_type` AS `user_type`,`tbl_user_types`.`description` AS `description`,`users`.`is_blocked` AS `is_blocked`,`users`.`created_at` AS `created_at`,`users`.`updated_at` AS `updated_at` from ((`users` join `tbl_user_types`) join `tbl_members`) where ((`tbl_user_types`.`user_type_id` = `users`.`user_type`) and (`tbl_members`.`member_code` = `users`.`member_code`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-23 19:42:47
