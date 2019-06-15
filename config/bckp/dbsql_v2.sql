CREATE DATABASE  IF NOT EXISTS `dbservclick` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbservclick`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbservclick
-- ------------------------------------------------------
-- Server version	5.6.15-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idadmin` int(6) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `status_` tinyint(4) NOT NULL,
  `perfil` smallint(6) NOT NULL DEFAULT '1',
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `idadmin_UNIQUE` (`idadmin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `descricao_UNIQUE` (`descricao`),
  UNIQUE KEY `idcategoria_UNIQUE` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (5,'Comprador'),(3,'Eletricista'),(7,'Informática'),(6,'Instalador de Internet'),(2,'Mecânico de Moto'),(4,'Motoboy'),(1,'Pintor');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(6) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fone` varchar(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` int(1) DEFAULT '2',
  `foto` varchar(30) DEFAULT NULL,
  `status_` int(1) DEFAULT '1',
  `dtcadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `idcliente_UNIQUE` (`idcliente`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8 COMMENT='                 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (84,'00742828247','Laurilene GuimarÃ£es Da Silva','lenesilva_guimaraes@hotmail.ni','92993310836','laura','MTIzNDU=',2,'laura1555284187.jpg',1,'2019-04-14 18:15:01'),(88,'00803709269','Sammy Da Silva Melo','silvasammy@outlook.com','92995223984','sammy','MTIzNDU=',2,'sammy1555370521.jpg',1,'2019-04-14 18:20:34'),(89,'03065246279','Heloyse','ferreira.heloyse@gmail.com','92989887878','heloyse','MTIzNDU=',2,'heloyse1555371190.jpg',1,'2019-04-15 23:28:34');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `idendereco` int(6) NOT NULL AUTO_INCREMENT,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `cliente` int(6) DEFAULT NULL,
  `fisico` int(6) DEFAULT NULL,
  `servico` int(6) DEFAULT NULL,
  `juridico` int(6) DEFAULT NULL,
  PRIMARY KEY (`idendereco`),
  UNIQUE KEY `cnpj_UNIQUE` (`idendereco`),
  KEY `fk_endereco_fisico1_idx` (`fisico`),
  KEY `fk_endereco_servico1_idx` (`servico`),
  KEY `fk_endereco_juridico1_idx` (`juridico`),
  KEY `fk_endereco_cliente1_idx` (`cliente`),
  CONSTRAINT `fk_endereco_cliente1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_fisico1` FOREIGN KEY (`fisico`) REFERENCES `fisico` (`idfisico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_juridico1` FOREIGN KEY (`juridico`) REFERENCES `juridico` (`idjuridico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_servico1` FOREIGN KEY (`servico`) REFERENCES `servico` (`idservico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COMMENT='                 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (36,'69057170','Rua Feliciana Costa','Manaus','Nossa Senhora Das GraÃ§as','AM','45','apartamento 07',84,NULL,NULL,NULL),(39,'69059160','Rua 17 De Marco','Manaus','Santa Etelvina','AM','44','casa',88,NULL,NULL,NULL),(40,'69058120','Rua Acre','Manaus','Vieralves','AM','','',NULL,1,NULL,NULL),(41,'69057170','Rua Feliciana Costa','Manaus','SÃ£o LÃ¡zaro','AM','778','ap2',89,NULL,NULL,NULL),(42,'69057170','Rua Feliciana Costa, Nossa Senhora Das GraÃ§as','Manaus','Vieralves','AM','8998','',NULL,2,NULL,NULL);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fisico`
--

DROP TABLE IF EXISTS `fisico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fisico` (
  `idfisico` int(6) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` longtext NOT NULL,
  `email` varchar(60) NOT NULL COMMENT 'Senha',
  `fone` varchar(11) NOT NULL COMMENT 'Perfil',
  `fixo` varchar(10) DEFAULT NULL,
  `status_` tinyint(4) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` smallint(6) NOT NULL DEFAULT '3',
  `pagina` int(6) DEFAULT NULL,
  `admin` int(6) DEFAULT NULL,
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idfisico`),
  UNIQUE KEY `cnpj_UNIQUE` (`cpf`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `idfisico_UNIQUE` (`idfisico`),
  KEY `fk_fisico_administrador1_idx` (`admin`),
  KEY `fk_fisico_pagina1_idx` (`pagina`),
  CONSTRAINT `fk_fisico_administrador1` FOREIGN KEY (`admin`) REFERENCES `administrador` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fisico_pagina1` FOREIGN KEY (`pagina`) REFERENCES `pagina` (`idpagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='                 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fisico`
--

LOCK TABLES `fisico` WRITE;
/*!40000 ALTER TABLE `fisico` DISABLE KEYS */;
INSERT INTO `fisico` VALUES (1,'00803709269','Beltrano Kontrol','Personal Trainer\r\nTEste \r\n','beltrano@email.com.br','92993388766','9223232323',2,'luis1555368354.jpg','luis','MTIzNDU=',3,5,NULL,'2019-04-15 03:45:19'),(2,'00742828247','Laurilene GuimarÃ£es Da Silva','Teste','lenesilva_guimaraes@hotmail.com','92993310836','',1,'laura1555377069.jpg','laura','MTIzNDU=',3,7,NULL,'2019-04-16 01:11:10');
/*!40000 ALTER TABLE `fisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fisicocategoria`
--

DROP TABLE IF EXISTS `fisicocategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fisicocategoria` (
  `fisico` int(6) NOT NULL,
  `categoria` int(6) NOT NULL,
  PRIMARY KEY (`fisico`,`categoria`),
  KEY `fk_fisico_has_categoria_fisico1_idx` (`fisico`),
  KEY `fk_fisico_has_categoria_categoria_idx` (`categoria`),
  CONSTRAINT `fk_fisico_has_categoria_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_fisico_has_categoria_fisico1` FOREIGN KEY (`fisico`) REFERENCES `fisico` (`idfisico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fisicocategoria`
--

LOCK TABLES `fisicocategoria` WRITE;
/*!40000 ALTER TABLE `fisicocategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `fisicocategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juridico`
--

DROP TABLE IF EXISTS `juridico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juridico` (
  `idjuridico` int(6) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(14) NOT NULL,
  `descricao` longtext NOT NULL,
  `email` varchar(80) NOT NULL,
  `fone` varchar(11) NOT NULL,
  `fixo` varchar(10) DEFAULT NULL,
  `status_` tinyint(4) NOT NULL,
  `razaosocial` varchar(80) NOT NULL,
  `nomefantasia` varchar(80) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `logo` varchar(40) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` smallint(6) NOT NULL DEFAULT '3',
  `pagina` int(6) DEFAULT NULL,
  `admin` int(6) DEFAULT NULL,
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idjuridico`),
  UNIQUE KEY `cnpj_UNIQUE` (`cnpj`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `idjuridico_UNIQUE` (`idjuridico`),
  KEY `fk_juridico_administrador1_idx` (`admin`),
  KEY `fk_juridico_pagina1_idx` (`pagina`),
  CONSTRAINT `fk_juridico_administrador1` FOREIGN KEY (`admin`) REFERENCES `administrador` (`idadmin`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_juridico_pagina1` FOREIGN KEY (`pagina`) REFERENCES `pagina` (`idpagina`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='                 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juridico`
--

LOCK TABLES `juridico` WRITE;
/*!40000 ALTER TABLE `juridico` DISABLE KEYS */;
INSERT INTO `juridico` VALUES (1,'90.898.678/870','- Polimento Cristalizado','moncajava@lavajato.com','92999938786','',1,'Lava Jato','Lava Jato Monca','Monca Silveira','monca1555377000.jpg','monca','MTIzNDU=',3,6,NULL,'2019-04-16 01:10:01');
/*!40000 ALTER TABLE `juridico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juridicocategoria`
--

DROP TABLE IF EXISTS `juridicocategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juridicocategoria` (
  `juridico` int(6) NOT NULL,
  `categoria` int(6) NOT NULL,
  PRIMARY KEY (`juridico`,`categoria`),
  KEY `fk_juridico_has_categoria_juridico1_idx` (`juridico`),
  KEY `fk_juridico_has_categoria_categoria_idx` (`categoria`),
  CONSTRAINT `fk_juridico_has_categoria_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_juridico_has_categoria_juridico1` FOREIGN KEY (`juridico`) REFERENCES `juridico` (`idjuridico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juridicocategoria`
--

LOCK TABLES `juridicocategoria` WRITE;
/*!40000 ALTER TABLE `juridicocategoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `juridicocategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina` (
  `idpagina` int(6) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `pinterest` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `google` varchar(50) DEFAULT NULL,
  `site` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpagina`),
  UNIQUE KEY `idcategoria_UNIQUE` (`idpagina`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='                 ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina`
--

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` VALUES (2,'http://facebook.com/bodyshape','','','','',''),(3,'http://facebook.com/bodyshape','','','','',''),(4,'http://facebook.com/bodyshape','','','','',''),(5,'http://facebook.com/bodyshape','https://instagram.com/bodyshape','','','',''),(6,'','','','','','http://www.lavajatomonca.com.br'),(7,'http://facebook.com/lavajato','','','','',''),(8,'','','','','','http://www.lavajatomonca.com.br'),(9,'','','','','','http://www.lavajatomonca.com.br');
/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servico` (
  `idservico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` longtext NOT NULL,
  `data` date NOT NULL,
  `datafim` date DEFAULT NULL,
  `valor` double(8,2) NOT NULL DEFAULT '0.00',
  `status_` tinyint(4) NOT NULL,
  `cliente` bigint(11) NOT NULL,
  `fisico` int(6) NOT NULL,
  `categoria` int(6) NOT NULL,
  `juridico` int(6) NOT NULL,
  PRIMARY KEY (`idservico`),
  KEY `fk_Servico_fisico1_idx` (`fisico`),
  KEY `fk_servico_juridico1_idx` (`juridico`),
  KEY `fk_servico_categoria1_idx` (`categoria`),
  CONSTRAINT `fk_servico_categoria1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servico_fisico1` FOREIGN KEY (`fisico`) REFERENCES `fisico` (`idfisico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_juridico1` FOREIGN KEY (`juridico`) REFERENCES `juridico` (`idjuridico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbservclick'
--

--
-- Dumping routines for database 'dbservclick'
--
/*!50003 DROP PROCEDURE IF EXISTS `SP_CADASTRAR_CLIENTE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CADASTRAR_CLIENTE`(
																			pcpf	varchar(11),
																			pnome	varchar(50),
																			pemail	varchar(80),
																			pfone	varchar(11),
																			plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	smallint(6),
																			pfoto	varchar(40),
																			pstatus_	tinyint(4),
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pcidade	varchar(30),
																			pbairro	varchar(30),
																			pestado	varchar(2),
																			pnumero	varchar(10),
																			pcomplemento	varchar(30)
																		  )
BEGIN

		DECLARE vidcliente INT;
        
		INSERT INTO cliente (
										cpf,
										nome,
										email,
										fone,
										login,
										senha,
										perfil,
										foto,
										status_
										)
						  VALUES(
										pcpf,
										pnome,
										pemail,
										pfone,
										plogin,
										psenha,
										pperfil,
										pfoto,
										pstatus_
										);
                                        
		SET vidcliente = LAST_INSERT_ID();
        
        INSERT INTO endereco (
											cep,
											logradouro,
											cidade,
											bairro,
											estado,
											numero,
											complemento,
											cliente
                                            )
							   VALUES(
											pcep,
											plogradouro,
											pcidade,
											pbairro,
											pestado,
											pnumero,
											pcomplemento,
											vidcliente
											);
                                            
		SELECT * FROM cliente 
        INNER JOIN endereco ON cliente = idcliente
        WHERE idcliente = vidcliente;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_CADASTRAR_FISICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CADASTRAR_FISICO`(
																			pcpf	varchar(11),
																			pnome	varchar(50),
                                                                            pdescricao	longtext,
																			pemail	varchar(80),
																			pfone	varchar(11),
                                                                            pfixo	varchar(10),
                                                                            pstatus_	tinyint(4),
                                                                            pfoto	varchar(30),
																			plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	smallint(6),
																			
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pcidade	varchar(30),
																			pbairro	varchar(30),
																			pestado	varchar(2),
																			pnumero	varchar(10),
																			pcomplemento	varchar(30),
                                                                            
                                                                            pfacebook varchar(50),
                                                                            pinstagram varchar(50),
                                                                            ppinterest varchar(50),
                                                                            ptwitter varchar(50),
                                                                            pgoogle varchar(50),
                                                                            psite varchar(50)
																		  )
BEGIN

		DECLARE vidpagina INT;
        DECLARE vidfisico INT;
        
        INSERT INTO pagina (
										facebook,
                                        instagram,
                                        pinterest,
                                        twitter,
                                        google,
                                        site
                                        )
							VALUES(
										pfacebook,
                                        pinstagram,
                                        ppinterest,
                                        ptwitter,
                                        pgoogle,
                                        psite
                                        );
                                        
		SET vidpagina = LAST_INSERT_ID();
                                        
        INSERT INTO fisico (
										cpf,
										nome,
                                        descricao,
										email,
										fone,
                                        fixo,
                                        status_,
                                        foto,
										login,
										senha,
										perfil,
										pagina										
										)
						  VALUES(
										pcpf,
										pnome,
										pdescricao,
										pemail,
										pfone,
                                        pfixo,
                                        pstatus_,
                                        pfoto,
										plogin,
										psenha,
										pperfil,
										vidpagina
										);
        
        SET vidfisico = LAST_INSERT_ID();
        
        INSERT INTO endereco (
											cep,
											logradouro,
											cidade,
											bairro,
											estado,
											numero,
											complemento,
											fisico
                                            )
							   VALUES(
											pcep,
											plogradouro,
											pcidade,
											pbairro,
											pestado,
											pnumero,
											pcomplemento,
											vidfisico
											);
                                            
		SELECT * FROM fisico 
        INNER JOIN endereco ON fisico 	   = vidfisico
        INNER JOIN pagina     ON idpagina = pagina
        WHERE idfisico = vidfisico;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_CADASTRAR_JURIDICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_CADASTRAR_JURIDICO`(
																			pcnpj	varchar(14),
                                                                            pdescricao	longtext,
																			pemail	varchar(80),
																			pfone	varchar(11),
                                                                            pfixo	varchar(10),
                                                                            pstatus_	tinyint(4),
                                                                            prazaosocial	varchar(80),
                                                                            pnomefantasia varchar(80),
                                                                            presponsavel varchar(50),
                                                                            plogo	varchar(40),
																			plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	smallint(6),
																			
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pcidade	varchar(30),
																			pbairro	varchar(30),
																			pestado	varchar(2),
																			pnumero	varchar(10),
																			pcomplemento	varchar(30),
                                                                            
                                                                            pfacebook varchar(50),
                                                                            pinstagram varchar(50),
                                                                            ppinterest varchar(50),
                                                                            ptwitter varchar(50),
                                                                            pgoogle varchar(50),
                                                                            psite varchar(50)
																		  )
BEGIN

		DECLARE vidpagina INT;
        DECLARE vidjuridico INT;
        
        INSERT INTO pagina (
										facebook,
                                        instagram,
                                        pinterest,
                                        twitter,
                                        google,
                                        site
                                        )
							VALUES(
										pfacebook,
                                        pinstagram,
                                        ppinterest,
                                        ptwitter,
                                        pgoogle,
                                        psite
                                        );
                                        
		SET vidpagina = LAST_INSERT_ID();
                                        
        INSERT INTO juridico (
										cnpj,
                                        descricao,
										email,
										fone,
                                        fixo,
                                        status_,
                                        razaosocial,
                                        nomefantasia,
                                        responsavel,
                                        logo,
										login,
										senha,
										perfil,
										pagina										
										)
						  VALUES(
										pcnpj,
										pdescricao,
										pemail,
										pfone,
                                        pfixo,
                                        pstatus_,
                                        prazaosocial,
                                        pnomefantasia,
                                        presponsavel,
                                        plogo,
										plogin,
										psenha,
										pperfil,
										vidpagina
										);
        
        SET vidjuridico = LAST_INSERT_ID();
        
        INSERT INTO endereco (
											cep,
											logradouro,
											cidade,
											bairro,
											estado,
											numero,
											complemento,
											fisico
                                            )
							   VALUES(
											pcep,
											plogradouro,
											pcidade,
											pbairro,
											pestado,
											pnumero,
											pcomplemento,
											vidfisico
											);
                                            
		SELECT * FROM juridico 
        INNER JOIN endereco ON juridico   = idjuridico
        INNER JOIN pagina     ON idpagina = vidpagina
        WHERE idjuridico = vidjuridico;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_EDITAR_CLIENTE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EDITAR_CLIENTE`(
																			pidcliente int(6),
																			pcpf	varchar(11),
																			pnome	varchar(50),
																			pemail	varchar(80),
																			pfone	varchar(11),
																			plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	smallint(6),
																			pfoto	varchar(40),
																			pstatus_	tinyint(4),
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pcidade	varchar(30),
																			pbairro	varchar(30),
																			pestado	varchar(2),
																			pnumero	varchar(10),
																			pcomplemento	varchar(30)
																		  )
BEGIN

		DECLARE vidcliente INT;
        
		UPDATE cliente SET 
										cpf = pcpf,
										nome = pnome,
										email = pemail,
										fone = pfone,
										login = plogin,
										senha = psenha,
										perfil = pperfil,
										foto = pfoto,
										status_ = pstatus_
								WHERE idcliente = pidcliente;
        
        UPDATE endereco SET
											cep = pcep,
											logradouro = plogradouro,
											cidade = pcidade,
											bairro = pbairro,
											estado = pestado,
											numero = pnumero,
											complemento = pcomplemento
									WHERE cliente = pidcliente;
                                            
		SELECT * FROM cliente 
        INNER JOIN endereco ON cliente = idcliente
        WHERE idcliente = pidcliente;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_EDITAR_FISICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EDITAR_FISICO`(
																			pidfisico int(6),
																			pcpf	varchar(11),
																			pnome	varchar(50),
                                                                            pdescricao	longtext,
																			pemail	varchar(80),
																			pfone	varchar(11),
                                                                            pfixo	varchar(10),
                                                                            pstatus_	tinyint(4),
                                                                            pfoto	varchar(30),
																			plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	smallint(6),
																			ppagina int(6),
                                                                            
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pcidade	varchar(30),
																			pbairro	varchar(30),
																			pestado	varchar(2),
																			pnumero	varchar(10),
																			pcomplemento	varchar(30),
                                                                            
                                                                            pfacebook varchar(50),
                                                                            pinstagram varchar(50),
                                                                            ppinterest varchar(50),
                                                                            ptwitter varchar(50),
                                                                            pgoogle varchar(50),
                                                                            psite varchar(50)
																		  )
BEGIN
        
        UPDATE pagina SET
										facebook 	= pfacebook,
                                        instagram 	= pinstagram,
                                        pinterest 	= ppinterest,
                                        twitter 		= ptwitter,
                                        google 		= pgoogle,
                                        site 			= psite
							WHERE idpagina = ppagina;
                                        
        UPDATE fisico SET
										cpf 			= pcpf,
										nome 		= pnome,
                                        descricao 	= pdescricao,
										email 		= pemail,
										fone 			= pfone,
                                        fixo 			= pfixo,
                                        status_ 		= pstatus_,
                                        foto 			= pfoto,
										login 		= plogin,
										senha 		= psenha,
										perfil 		= pperfil
						  WHERE 
										idfisico = pidfisico;
        
        UPDATE endereco SET
											cep 				= pcep,
											logradouro 	= plogradouro,
											cidade 			= pcidade,
											bairro 			= pbairro,
											estado 			= pestado,
											numero 		= pnumero,
											complemento = pcomplemento
							   WHERE
											fisico = pidfisico;
                                            
		SELECT * FROM fisico f
        INNER JOIN endereco e ON e.fisico      = f.idfisico
        INNER JOIN pagina p     ON p.idpagina = f.pagina
        WHERE f.idfisico = pidfisico;
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_EDITAR_JURIDICO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_EDITAR_JURIDICO`(
																			pidjuridico int(6),
																			pcnpj	varchar(14),
                                                                            pdescricao	longtext,
																			pemail	varchar(80),
																			pfone	varchar(11),
                                                                            pfixo	varchar(10),
                                                                            pstatus_	tinyint(4),
                                                                            prazaosocial	varchar(80),
                                                                            pnomefantasia varchar(80),
                                                                            presponsavel varchar(50),
                                                                            plogo	varchar(40),
																			plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	smallint(6),
                                                                            ppagina int(6),
																			
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pcidade	varchar(30),
																			pbairro	varchar(30),
																			pestado	varchar(2),
																			pnumero	varchar(10),
																			pcomplemento	varchar(30),
                                                                            
                                                                            pfacebook varchar(50),
                                                                            pinstagram varchar(50),
                                                                            ppinterest varchar(50),
                                                                            ptwitter varchar(50),
                                                                            pgoogle varchar(50),
                                                                            psite varchar(50)
																		  )
BEGIN

		UPDATE pagina SET
										facebook 	= pfacebook,
                                        instagram 	= pinstagram,
                                        pinterest 	= ppinterest,
                                        twitter 		= ptwitter,
                                        google 		= pgoogle,
                                        site 			= psite
							WHERE idpagina = ppagina;
                                        
        UPDATE fisico SET
										cnpj = pcnpj,
                                        descricao = pdescricao,
										email = pemail,
										fone = pfone,
                                        fixo = pfixo,
                                        status_ = pstatus_,
                                        razaosocial = prazaosocial,
                                        nomefantasia = pnomefantasia,
                                        responsavel = presponsavel,
                                        logo = plogo,
										login = plogin,
										senha =psenha,
										perfil = pperfil,
										pagina	= vidpagina								
										
						  WHERE	idjuridico = pidjuridico;
                                        
       UPDATE endereco SET
											cep 				= pcep,
											logradouro 	= plogradouro,
											cidade 			= pcidade,
											bairro 			= pbairro,
											estado 			= pestado,
											numero 		= pnumero,
											complemento = pcomplemento
							   WHERE
											juridico = pidjuridico;
                                            
		SELECT * FROM juridico 
        INNER JOIN endereco ON juridico   = idjuridico
        INNER JOIN pagina     ON idpagina = pagina
        WHERE idjuridico = pidjuridico;
        
        
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SP_REALIZAR_LOGIN` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SP_REALIZAR_LOGIN`(plogin varchar(15), psenha varchar(100))
BEGIN

	DECLARE vidadmin int;
    DECLARE vidcliente int;
    DECLARE vidfisico int;
    DECLARE vidjuridico int;
    
    SET vidadmin = NULL;
    SET vidcliente = NULL;
    SET vidfisico = NULL;
    SET vidjuridico = NULL;
    
	SET vidadmin = (SELECT idadmin 	FROM administrador  WHERE login = plogin AND senha = psenha AND status_ <> 2);
    SET vidcliente = (SELECT idcliente 	FROM cliente 		   	WHERE login = plogin AND senha = psenha AND status_ <> 2);
    SET vidfisico = (SELECT idfisico 	FROM fisico				WHERE login = plogin AND senha = psenha AND status_ <> 2);
    SET vidjuridico = (SELECT idjuridico FROM juridico 			WHERE login = plogin AND senha = psenha AND status_ <> 2);
    
    IF vidadmin <> 0 THEN
		SELECT * FROM administrador WHERE idadmin = vidadmin;
	ELSEIF vidcliente <> 0 THEN
		SELECT * FROM cliente WHERE idcliente = vidcliente;
	ELSEIF vidfisico <> 0 THEN
		SELECT * FROM fisico WHERE idfisico = vidfisico;
    ELSEIF vidjuridico <> 0 THEN
		SELECT * FROM juridico WHERE idjuridico = vidjuridico;
    END IF;
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-15 21:28:21
