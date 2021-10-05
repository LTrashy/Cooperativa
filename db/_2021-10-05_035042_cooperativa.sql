-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cooperativa
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.3

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
-- Table structure for table `aportes`
--

DROP TABLE IF EXISTS `aportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aportes` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_asociado` int NOT NULL COMMENT 'foreign KEY',
  `valor_aporte` int DEFAULT NULL COMMENT 'valor del aporte',
  `create_time` datetime DEFAULT NULL COMMENT 'create time del aporte',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_asociado` (`id_asociado`),
  CONSTRAINT `aportes_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `asociados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COMMENT='table de aportes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aportes`
--

/*!40000 ALTER TABLE `aportes` DISABLE KEYS */;
INSERT INTO `aportes` VALUES (1,1,250000,'2021-10-02 20:53:44');
/*!40000 ALTER TABLE `aportes` ENABLE KEYS */;

--
-- Table structure for table `asociados`
--

DROP TABLE IF EXISTS `asociados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asociados` (
  `id` int NOT NULL COMMENT 'primary key',
  `id_persona` bigint NOT NULL COMMENT 'foreing key',
  `create_time` timestamp NULL DEFAULT NULL COMMENT 'create time',
  `total_aportes` bigint DEFAULT NULL COMMENT 'total de apotes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `asociados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tabla asociados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asociados`
--

/*!40000 ALTER TABLE `asociados` DISABLE KEYS */;
INSERT INTO `asociados` VALUES (1,1001270312,'2021-10-03 01:51:25',500000);
/*!40000 ALTER TABLE `asociados` ENABLE KEYS */;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` bigint NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` bigint DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tabla personas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1001270312,'anderson gonzalez','calle 69 a # 17 n 76',3197454533,'asgonzaleztr@gmail.com','2001-03-29');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-05  3:51:20
