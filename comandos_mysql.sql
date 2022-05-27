CREATE DATABASE  IF NOT EXISTS `treino_modelagem`
USE `treino_modelagem`;

-- Server version	8.0.27


DROP TABLE IF EXISTS `autenticou`;

CREATE TABLE `autenticou` (
  `autenticou_id` int unsigned NOT NULL AUTO_INCREMENT,
  `aut_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`autenticou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `autenticou` VALUES (1,'Sim'),(2,'Não');

CREATE TABLE `tentativa_acesso` (
  `tent_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tent_data` date DEFAULT NULL,
  `tent_hora` time DEFAULT NULL,
  `tent_usu_id` int unsigned DEFAULT NULL,
  `tipo_aut_id` int DEFAULT '6',
  `autenticou_id` int unsigned DEFAULT '2',
  PRIMARY KEY (`tent_id`),
  KEY `usuario_acesso` (`tent_usu_id`),
  KEY `fk_tentativa_acesso_tipo_autenticacao1_idx` (`tipo_aut_id`),
  KEY `fk_tentativa_acesso_autenticou1_idx` (`autenticou_id`),
  CONSTRAINT `fk_tentativa_acesso_autenticou1` FOREIGN KEY (`autenticou_id`) REFERENCES `autenticou` (`autenticou_id`),
  CONSTRAINT `fk_tentativa_acesso_tipo_autenticacao1` FOREIGN KEY (`tipo_aut_id`) REFERENCES `tipo_autenticacao` (`tipo_id`),
  CONSTRAINT `tentativa_acesso_ibfk_1` FOREIGN KEY (`tent_usu_id`) REFERENCES `usuario` (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=570 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `tipo_autenticacao` (
  `tipo_id` int NOT NULL AUTO_INCREMENT,
  `tipo_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `tipo_autenticacao` VALUES (1,'Três primeiros números do CPF'),(2,'Três últimos números do CPF'),(3,'Número do celular'),(4,'Data de nascimento'),(5,'Nome materno'),(6,'Não necessária');


CREATE TABLE `tipo_usuario` (
  `tipo_usu_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tipo_usu_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`tipo_usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `tipo_usuario` VALUES (1,'Usuário master'),(2,'Usuário comum');

CREATE TABLE `usuario` (
  `usu_id` int unsigned NOT NULL AUTO_INCREMENT,
  `usu_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_nascimento` date NOT NULL,
  `usu_nomemat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_cpf` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_celular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_fixo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usu_endereco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usu_id` int unsigned NOT NULL,
  `usu_login` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`usu_id`),
  UNIQUE KEY `login` (`usu_login`),
  KEY `fk_usuario_tipo_usuario1_idx` (`tipo_usu_id`),
  CONSTRAINT `fk_usuario_tipo_usuario1` FOREIGN KEY (`tipo_usu_id`) REFERENCES `tipo_usuario` (`tipo_usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



