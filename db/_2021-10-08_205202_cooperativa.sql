-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cooperativa
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.2

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
  `id_asociado` int NOT NULL COMMENT 'id asociado',
  `valor_aporte` int DEFAULT NULL COMMENT 'aporte',
  `create_time` datetime DEFAULT NULL COMMENT 'create time',
  PRIMARY KEY (`id`),
  KEY `id_asociado` (`id_asociado`),
  CONSTRAINT `aportes_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `asociados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COMMENT='tabla aportes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aportes`
--

/*!40000 ALTER TABLE `aportes` DISABLE KEYS */;
INSERT INTO `aportes` VALUES (1,1,NULL,'2021-10-07 19:29:01'),(2,1,10000,'2021-10-07 19:29:01'),(3,1,10000,'2021-10-07 20:15:07'),(4,1,10000,'2021-10-07 20:15:07'),(5,1,10000,'2021-10-07 20:27:46'),(6,1,20000,'2021-10-07 20:30:11'),(7,1,20000,'2021-10-07 20:30:11'),(8,1,30000,'2021-10-07 20:32:22'),(9,1,200,'2021-10-07 20:57:24'),(10,1,-200,'2021-10-07 20:58:43'),(11,1,500,'2021-10-07 21:26:27'),(12,2,10000,'2021-10-08 12:01:11');
/*!40000 ALTER TABLE `aportes` ENABLE KEYS */;

--
-- Table structure for table `asociados`
--

DROP TABLE IF EXISTS `asociados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asociados` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_persona` int NOT NULL COMMENT 'foreing key',
  `create_time` datetime NOT NULL COMMENT 'create time',
  `total_aportes` bigint DEFAULT NULL COMMENT 'total aportes del asociado',
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `asociados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COMMENT='tabla asociados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asociados`
--

/*!40000 ALTER TABLE `asociados` DISABLE KEYS */;
INSERT INTO `asociados` VALUES (1,1,'2021-10-06 20:38:32',600500),(2,2,'2021-10-08 12:00:13',10000);
/*!40000 ALTER TABLE `asociados` ENABLE KEYS */;

--
-- Table structure for table `creditos`
--

DROP TABLE IF EXISTS `creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `creditos` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_asociado` int NOT NULL COMMENT 'id asociado',
  `dia_pago` date DEFAULT NULL COMMENT 'dia de pago',
  `valor_credito` bigint DEFAULT NULL COMMENT 'valor del credito',
  `Nro_cuotas` int DEFAULT NULL COMMENT 'numero de cuotas',
  `tasa_interes` float(7,3) DEFAULT NULL COMMENT 'tasa de interes',
  `tasa_mora` float(7,3) DEFAULT NULL COMMENT 'tasa de mora',
  `fecha_credito` date DEFAULT NULL COMMENT 'fecha del credito',
  `fecha_desembolso` date DEFAULT NULL COMMENT 'fecha de desembolso',
  `saldo` decimal(10,0) DEFAULT NULL COMMENT 'saldo del credito',
  PRIMARY KEY (`id`),
  KEY `creditos` (`id_asociado`),
  CONSTRAINT `creditos_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `asociados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tabla creditos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `creditos`
--

/*!40000 ALTER TABLE `creditos` DISABLE KEYS */;
/*!40000 ALTER TABLE `creditos` ENABLE KEYS */;

--
-- Table structure for table `cuota`
--

DROP TABLE IF EXISTS `cuota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuota` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_credito` int NOT NULL COMMENT 'id del credito',
  `abono_capital` bigint DEFAULT NULL COMMENT 'abono a capital',
  `interes_corriente` float(7,3) DEFAULT NULL COMMENT 'interes corriente',
  `interes_mora` float(7,3) DEFAULT NULL COMMENT 'interes mora',
  `fecha_proyeccion` date DEFAULT NULL COMMENT 'fecha estimada de pago',
  `fecha_pago` date DEFAULT NULL COMMENT 'fecha de pago',
  PRIMARY KEY (`id`),
  KEY `cuota` (`id_credito`),
  CONSTRAINT `cuota_ibfk_1` FOREIGN KEY (`id_credito`) REFERENCES `creditos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tabla cuotas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuota`
--

/*!40000 ALTER TABLE `cuota` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuota` ENABLE KEYS */;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `cedula` bigint NOT NULL COMMENT 'CEDULA INDEX UNIQUE',
  `nombre` varchar(150) DEFAULT NULL COMMENT 'nombre',
  `direccion` varchar(150) DEFAULT NULL COMMENT 'direccion',
  `telefono` bigint DEFAULT NULL COMMENT 'telefono',
  `email` varchar(100) DEFAULT NULL COMMENT 'email',
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COMMENT='tabla personas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (1,1001270312,'anderson gonzalez forero','calle 69a sur# 17n 76',3197454533,'asgonzaleztr@gmail.com','2001-03-29'),(2,51906925,'martha forero','calle 69a sur# 17n 76',3214588941,'jovel882@gmail.com','1968-08-01');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-08 20:52:25
