CREATE DATABASE  IF NOT EXISTS `trabalhodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `trabalhodb`;

CREATE TABLE `tentativa_acesso` (
  `tent_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tent_data` date NOT NULL,
  `tent_hora` time NOT NULL,
  `tent_tipo_aut` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tent_aut` enum('S','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tent_usu_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`tent_id`),
  KEY `usuario_acesso` (`tent_usu_id`),
  CONSTRAINT `tentativa_acesso_ibfk_1` FOREIGN KEY (`tent_usu_id`) REFERENCES `usuario` (`usu_id`)
)


CREATE TABLE `usuario` (
  `usu_id` int unsigned NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_nascimento` date NOT NULL,
  `usu_nomemat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_cpf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_celular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_fixo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_endereco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_tipo` enum('1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '2',
  `usu_login` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `login` (`usu_login`)
)