-- MariaDB dump 10.19  Distrib 10.6.5-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cooperativa
-- ------------------------------------------------------
-- Server version	10.6.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aportes` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_asociado` int(11) NOT NULL COMMENT 'id asociado',
  `valor_aporte` int(11) DEFAULT NULL COMMENT 'aporte',
  `create_time` datetime DEFAULT NULL COMMENT 'create time',
  PRIMARY KEY (`id`),
  KEY `id_asociado` (`id_asociado`),
  CONSTRAINT `aportes_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `asociados` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COMMENT='tabla aportes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `asociados`
--

DROP TABLE IF EXISTS `asociados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asociados` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_persona` int(11) NOT NULL COMMENT 'foreing key',
  `create_time` datetime NOT NULL COMMENT 'create time',
  `total_aportes` bigint(20) DEFAULT NULL COMMENT 'total aportes del asociado',
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `asociados_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COMMENT='tabla asociados';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `creditos`
--

DROP TABLE IF EXISTS `creditos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `creditos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_asociado` int(11) NOT NULL COMMENT 'id asociado',
  `dia_pago` date DEFAULT NULL COMMENT 'dia de pago',
  `valor_credito` bigint(20) DEFAULT NULL COMMENT 'valor del credito',
  `nro_cuotas` int(11) DEFAULT NULL COMMENT 'numero de cuotas',
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
-- Table structure for table `cuota`
--

DROP TABLE IF EXISTS `cuota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuota` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `id_credito` int(11) NOT NULL COMMENT 'id del credito',
  `abono_capital` float(9,3) DEFAULT NULL COMMENT 'abono a capital',
  `interes_corriente` float(10,3) DEFAULT NULL COMMENT 'interes corriente',
  `interes_mora` float(7,3) DEFAULT NULL COMMENT 'interes mora',
  `fecha_proyeccion` date DEFAULT NULL COMMENT 'fecha estimada de pago',
  `fecha_pago` date DEFAULT NULL COMMENT 'fecha de pago',
  `saldo_cuota` float(11,3) NOT NULL,
  `num_cuota` int(11) NOT NULL COMMENT 'numero de cuotas',
  PRIMARY KEY (`id`),
  KEY `id_credito` (`id_credito`),
  CONSTRAINT `cuota_ibfk_1` FOREIGN KEY (`id_credito`) REFERENCES `creditos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3 COMMENT='tabla cuotas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name_permiso` varchar(255) DEFAULT NULL COMMENT 'nombre permiso',
  `available` tinyint(1) DEFAULT NULL COMMENT 'servicio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COMMENT='tabla permisos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `cedula` bigint(20) NOT NULL COMMENT 'CEDULA INDEX UNIQUE',
  `nombre` varchar(150) DEFAULT NULL COMMENT 'nombre',
  `direccion` varchar(150) DEFAULT NULL COMMENT 'direccion',
  `telefono` bigint(20) DEFAULT NULL COMMENT 'telefono',
  `email` varchar(100) DEFAULT NULL COMMENT 'email',
  `birth_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `i_cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COMMENT='tabla personas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name_role` varchar(255) DEFAULT NULL COMMENT 'nombre',
  `available` tinyint(1) DEFAULT NULL COMMENT 'servicio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COMMENT='tabla roles';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles_permisos`
--

DROP TABLE IF EXISTS `roles_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_role` int(11) NOT NULL COMMENT 'id rol',
  `id_permiso` int(11) NOT NULL COMMENT 'id permiso',
  PRIMARY KEY (`id`),
  KEY `id_role` (`id_role`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COMMENT='tabla relacional roles-permisos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_permiso`
--

DROP TABLE IF EXISTS `user_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_permiso` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_user` int(11) NOT NULL COMMENT 'id user',
  `id_permiso` int(11) NOT NULL COMMENT 'id permiso',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_permiso` (`id_permiso`),
  CONSTRAINT `user_permiso_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_permiso_ibfk_2` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COMMENT='tabla relacional user-permiso';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_role` int(11) NOT NULL COMMENT 'id role',
  `id_user` int(11) NOT NULL COMMENT 'id user',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_role` (`id_role`),
  CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COMMENT='tabla relacional user-rol';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `id_persona` int(11) NOT NULL COMMENT 'id persona',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `username` varchar(255) DEFAULT NULL COMMENT 'username',
  `password` varchar(255) DEFAULT NULL COMMENT 'password',
  PRIMARY KEY (`id`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COMMENT='users TABLE';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-23 21:06:00
