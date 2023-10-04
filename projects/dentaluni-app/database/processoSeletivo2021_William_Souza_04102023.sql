-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: processoSeletivo2021_William_Souza
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `dentistas`
--

DROP TABLE IF EXISTS `dentistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dentistas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cro` int NOT NULL,
  `cro_uf` char(2) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dentistas`
--

LOCK TABLES `dentistas` WRITE;
/*!40000 ALTER TABLE `dentistas` DISABLE KEYS */;
INSERT INTO `dentistas` VALUES (4,'Celso','celso@test.com',123123123,'PR','2023-10-04 16:00:08','2023-10-03 17:18:43'),(6,'Bento','bento@test.com',43434343,'WA','2023-10-03 22:34:31','2023-10-03 19:42:03'),(10,'Claudia','claudia@test.com',65656565,'ER','2023-10-03 22:39:14','2023-10-03 22:39:14'),(11,'Manu','manu@test.com',123123123,'QW','2023-10-03 22:40:29','2023-10-03 22:40:29'),(12,'Luis','luis@email.com',76767676,'SC','2023-10-03 22:43:08','2023-10-03 22:43:08'),(13,'Andre','andre@test.com',98098890,'PA','2023-10-03 22:43:32','2023-10-03 22:43:32'),(14,'Joaum','jao@test.com',3123123,'WE','2023-10-04 15:14:43','2023-10-04 15:14:43'),(15,'Marcia','marcia@live.com',543534531,'AM','2023-10-04 16:01:03','2023-10-04 16:01:03');
/*!40000 ALTER TABLE `dentistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dentistas_especialidades`
--

DROP TABLE IF EXISTS `dentistas_especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dentistas_especialidades` (
  `especialidade_id` int NOT NULL,
  `dentista_id` int NOT NULL,
  PRIMARY KEY (`especialidade_id`,`dentista_id`),
  KEY `dentista_id_fk` (`dentista_id`),
  CONSTRAINT `dentista_id_fk` FOREIGN KEY (`dentista_id`) REFERENCES `dentistas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `especialidades_id_fk` FOREIGN KEY (`especialidade_id`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dentistas_especialidades`
--

LOCK TABLES `dentistas_especialidades` WRITE;
/*!40000 ALTER TABLE `dentistas_especialidades` DISABLE KEYS */;
INSERT INTO `dentistas_especialidades` VALUES (4,4),(8,4),(5,6),(3,10),(4,10),(5,11),(4,12),(9,12),(5,13),(8,13),(3,14),(7,14),(8,14),(5,15),(9,15);
/*!40000 ALTER TABLE `dentistas_especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especialidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (3,'Cardio','2023-10-03 17:10:27','2023-10-03 17:10:27'),(4,'Odonto','2023-10-03 17:10:34','2023-10-03 17:10:34'),(5,'Psico','2023-10-03 17:10:53','2023-10-03 17:10:53'),(6,'Nutri','2023-10-03 22:41:17','2023-10-03 22:41:17'),(7,'Orto','2023-10-03 22:41:26','2023-10-03 22:41:26'),(8,'Fisio','2023-10-03 22:41:44','2023-10-03 22:41:44'),(9,'Gastro','2023-10-03 22:42:00','2023-10-03 22:42:00');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-04 19:02:37
