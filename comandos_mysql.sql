CREATE DATABASE  IF NOT EXISTS `trabalhodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `trabalhodb`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: trabalhodb
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
-- Table structure for table `autenticou`
--

DROP TABLE IF EXISTS `autenticou`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autenticou` (
  `autenticou_id` int unsigned NOT NULL AUTO_INCREMENT,
  `aut_desc` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`autenticou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autenticou`
--

LOCK TABLES `autenticou` WRITE;
/*!40000 ALTER TABLE `autenticou` DISABLE KEYS */;
INSERT INTO `autenticou` VALUES (1,'Sim'),(2,'Não');
/*!40000 ALTER TABLE `autenticou` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tentativa_acesso`
--

DROP TABLE IF EXISTS `tentativa_acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tentativa_acesso` (
  `tent_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tent_data` date DEFAULT NULL,
  `tent_hora` time DEFAULT NULL,
  `tent_ip` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tent_lat` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tent_lon` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_aut_id` int DEFAULT '6',
  `autenticou_id` int unsigned DEFAULT '2',
  `tent_usu_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`tent_id`),
  KEY `fk_tentativa_acesso_tipo_autenticacao1_idx` (`tipo_aut_id`),
  KEY `fk_tentativa_acesso_autenticou1_idx` (`autenticou_id`),
  KEY `fk_tentativa_acesso_usuario1_idx1` (`tent_usu_id`),
  CONSTRAINT `fk_tentativa_acesso_autenticou1` FOREIGN KEY (`autenticou_id`) REFERENCES `autenticou` (`autenticou_id`),
  CONSTRAINT `fk_tentativa_acesso_tipo_autenticacao1` FOREIGN KEY (`tipo_aut_id`) REFERENCES `tipo_autenticacao` (`tipo_id`),
  CONSTRAINT `fk_tentativa_acesso_usuario1` FOREIGN KEY (`tent_usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tentativa_acesso`
--

LOCK TABLES `tentativa_acesso` WRITE;
/*!40000 ALTER TABLE `tentativa_acesso` DISABLE KEYS */;
/*!40000 ALTER TABLE `tentativa_acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_autenticacao`
--

DROP TABLE IF EXISTS `tipo_autenticacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_autenticacao` (
  `tipo_id` int NOT NULL AUTO_INCREMENT,
  `tipo_desc` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_autenticacao`
--

LOCK TABLES `tipo_autenticacao` WRITE;
/*!40000 ALTER TABLE `tipo_autenticacao` DISABLE KEYS */;
INSERT INTO `tipo_autenticacao` VALUES (1,'Três primeiros números do CPF'),(2,'Três últimos números do CPF'),(3,'Número do celular'),(4,'Data de nascimento'),(5,'Nome materno'),(6,'Não necessária');
/*!40000 ALTER TABLE `tipo_autenticacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_usuario` (
  `tipo_usu_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usu_desc` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tipo_usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Usuário master'),(2,'Usuário comum');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usu_id` int unsigned NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_nascimento` date NOT NULL,
  `usu_nomemat` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_cpf` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_celular` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_fixo` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_endereco` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usu_id` int unsigned NOT NULL,
  `usu_login` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_senha` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `login` (`usu_login`),
  KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usu_id`),
  CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usu_id`) REFERENCES `tipo_usuario` (`tipo_usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','2012-05-05','admin','11111111111','11111111111',NULL,NULL,1,'admin','$2y$10$R/QLFKH7FDEabrnFc.9TSu4eKQJ1r4tV02ktUKvlaNwscPK6GEEoy');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-20  1:46:40
