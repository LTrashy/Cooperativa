-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: cooperativa
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

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
  CONSTRAINT `aportes_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `asociados` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COMMENT='tabla aportes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aportes`
--

/*!40000 ALTER TABLE `aportes` DISABLE KEYS */;
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
  CONSTRAINT `asociados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COMMENT='tabla asociados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asociados`
--

/*!40000 ALTER TABLE `asociados` DISABLE KEYS */;
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
  `nro_cuotas` int DEFAULT NULL COMMENT 'numero de cuotas',
  `tasa_interes` float(7,3) DEFAULT NULL COMMENT 'tasa de interes',
  `tasa_mora` float(7,3) DEFAULT NULL COMMENT 'tasa de mora',
  `fecha_credito` date DEFAULT NULL COMMENT 'fecha del credito',
  `fecha_desembolso` date DEFAULT NULL COMMENT 'fecha de desembolso',
  `saldo` decimal(12,3) DEFAULT NULL COMMENT 'saldo del credito',
  `valor_cuota` decimal(10,2) NOT NULL COMMENT 'valor de la cuota',
  PRIMARY KEY (`id`),
  KEY `id_asociado` (`id_asociado`),
  CONSTRAINT `creditos_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `asociados` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COMMENT='tabla creditos';
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
  `abono_capital` float(9,3) DEFAULT NULL COMMENT 'abono a capital',
  `interes_corriente` float(10,3) DEFAULT NULL COMMENT 'interes corriente',
  `interes_mora` float(7,3) DEFAULT NULL COMMENT 'interes mora',
  `fecha_proyeccion` date DEFAULT NULL COMMENT 'fecha estimada de pago',
  `fecha_pago` date DEFAULT NULL COMMENT 'fecha de pago',
  `saldo_cuota` float(11,3) NOT NULL,
  `num_cuota` int NOT NULL COMMENT 'numero de cuotas',
  PRIMARY KEY (`id`),
  KEY `id_credito` (`id_credito`),
  CONSTRAINT `cuota_ibfk_1` FOREIGN KEY (`id_credito`) REFERENCES `creditos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COMMENT='tabla cuotas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuota`
--

/*!40000 ALTER TABLE `cuota` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuota` ENABLE KEYS */;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name_permiso` varchar(255) DEFAULT NULL COMMENT 'nombre permiso',
  `available` tinyint(1) DEFAULT NULL COMMENT 'servicio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COMMENT='tabla permisos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'',1),(2,'login',1),(3,'signup',1),(4,'dashboard',1),(5,'user',1),(6,'admin',1);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;

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
INSERT INTO `personas` VALUES (1,1001270312,'Anderson Gonzalez Forero ','calle 69a sur# 17n 76',3197454533,'ander@gmail.com','2001-03-29'),(2,123,'','',0,'',NULL);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name_role` varchar(255) DEFAULT NULL COMMENT 'nombre',
  `available` tinyint(1) DEFAULT NULL COMMENT 'servicio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COMMENT='tabla roles';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'public',1),(2,'user',1),(3,'admin',1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

--
-- Table structure for table `roles_permisos`
--

DROP TABLE IF EXISTS `roles_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles_permisos` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_role` int NOT NULL COMMENT 'id rol',
  `id_permiso` int NOT NULL COMMENT 'id permiso',
  PRIMARY KEY (`id`),
  KEY `id_role` (`id_role`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COMMENT='tabla relacional roles-permisos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_permisos`
--

/*!40000 ALTER TABLE `roles_permisos` DISABLE KEYS */;
INSERT INTO `roles_permisos` VALUES (1,1,1),(2,1,2),(3,1,3),(4,2,4),(5,2,5),(6,3,6);
/*!40000 ALTER TABLE `roles_permisos` ENABLE KEYS */;

--
-- Table structure for table `user_permiso`
--

DROP TABLE IF EXISTS `user_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_permiso` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_user` int NOT NULL COMMENT 'id user',
  `id_permiso` int NOT NULL COMMENT 'id permiso',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `user_permiso_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_permiso_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='tabla relacional user-permiso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_permiso`
--

/*!40000 ALTER TABLE `user_permiso` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_permiso` ENABLE KEYS */;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_roles` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_role` int NOT NULL COMMENT 'id role',
  `id_user` int NOT NULL COMMENT 'id user',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COMMENT='tabla relacional user-rol';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,2,1),(2,2,2);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_persona` int NOT NULL COMMENT 'id persona',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  `password` varchar(255) DEFAULT NULL COMMENT 'password',
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COMMENT='users TABLE';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'2021-11-24 00:00:00','trashy','$2y$10$hA2fHlX1D/YxnPIQn3OKRusTXv6b47deMq/c5/JM.MaO/Yj1ds7gm'),(2,2,'2021-11-24 00:00:00','aa','$2y$10$k2OJmtjA4l5z1eYR36jo4ukv/ZH3ZaE8EyVMNYkebjyrAHWKJQmyC');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-26 23:21:32
