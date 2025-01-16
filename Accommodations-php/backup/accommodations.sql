CREATE DATABASE  IF NOT EXISTS `accommodations` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `accommodations`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: accommodations
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `accommodations`
--

DROP TABLE IF EXISTS `accommodations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accommodations` (
  `id_accomodation` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_accomodation`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodations`
--

LOCK TABLES `accommodations` WRITE;
/*!40000 ALTER TABLE `accommodations` DISABLE KEYS */;
INSERT INTO `accommodations` VALUES (1,'Sunrise Hotel','A beautiful hotel with ocean views',120.50,'https://res.cloudinary.com/dygrpoblt/image/upload/v1735877127/download_d8eou0.jpg'),(2,'Green Cabin','Rustic cabin in the middle of the forest',85.00,'https://res.cloudinary.com/dygrpoblt/image/upload/v1735877215/download_fagknj.jpg'),(3,'Modern Apartment','Contemporary apartment in the city center',150.75,'https://res.cloudinary.com/dygrpoblt/image/upload/v1735877242/download_u6qtof.jpg'),(4,'Los cobanos','Linda Playa',500.00,'https://res.cloudinary.com/dygrpoblt/image/upload/v1736913046/download_hnh742.jpg'),(5,'Playa de Oro','Linda Playa',600.00,'https://res.cloudinary.com/dygrpoblt/image/upload/v1736913046/download_hnh742.jpg'),(6,'Playa de Oro','Linda Playa',600.00,'https://res.cloudinary.com/dygrpoblt/image/upload/v1736913046/download_hnh742.jpg'),(7,'Hotel en New York','Buen Hotel',700.00,'https://res.cloudinary.com/dygrpoblt/image/upload/v1736996162/download_hwuzdm.jpg');
/*!40000 ALTER TABLE `accommodations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_selections`
--

DROP TABLE IF EXISTS `user_selections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_selections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `accommodation_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_selection` (`user_id`,`accommodation_id`),
  KEY `accommodation_id` (`accommodation_id`),
  CONSTRAINT `user_selections_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_selections_ibfk_2` FOREIGN KEY (`accommodation_id`) REFERENCES `accommodations` (`id_accomodation`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_selections`
--

LOCK TABLES `user_selections` WRITE;
/*!40000 ALTER TABLE `user_selections` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_selections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('usuario','administrador') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (18,'Kenia Paz','admin@example.com','password','administrador'),(19,'Chriss','christianmonterrosaportillo@gmail.com','password','usuario'),(21,'Ian','crispinedalobo@gmail.com','password','usuario');
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

-- Dump completed on 2025-01-15 21:14:11
