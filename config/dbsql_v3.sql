CREATE DATABASE  IF NOT EXISTS `dbserv` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbserv`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dbserv
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
  `idadmin` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` tinyint(1) NOT NULL DEFAULT '1',
  `status_` tinyint(1) NOT NULL DEFAULT '1',
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `IDADMIN_UNIQUE` (`idadmin`),
  UNIQUE KEY `LOGIN_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Administrador','admin','MTIzNDU=',1,1,'2019-06-01 07:00:17');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areaatuacao`
--

DROP TABLE IF EXISTS `areaatuacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areaatuacao` (
  `idarea` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `categoria` int(6) NOT NULL,
  PRIMARY KEY (`idarea`),
  UNIQUE KEY `IDAREA_UNIQUE` (`idarea`),
  UNIQUE KEY `DESCRICAO_UNIQUE` (`descricao`),
  KEY `fk_areaatuacao_categoria` (`categoria`),
  CONSTRAINT `fk_areaatuacao_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areaatuacao`
--

LOCK TABLES `areaatuacao` WRITE;
/*!40000 ALTER TABLE `areaatuacao` DISABLE KEYS */;
INSERT INTO `areaatuacao` VALUES (1,'Eletricista',2),(2,'Pintor',2),(3,'Árbitro de Futebol',3),(4,'Gandula',3),(5,'Técnico em Informática',4),(6,'Instalador de Internet',4),(7,'Analista de Redes de Computadores',4),(8,'Mecânico Geral',5),(9,'Lanternagem e Pintura',5);
/*!40000 ALTER TABLE `areaatuacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `IDCATEGORIA_UNIQUE` (`idcategoria`),
  UNIQUE KEY `DESCRICAO_UNIQUE` (`descricao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Beleza'),(2,'Casa'),(3,'Esporte'),(4,'Informática'),(6,'teste'),(5,'Veículo');
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
  `foto` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `fone` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` tinyint(1) NOT NULL DEFAULT '2',
  `status_` tinyint(1) NOT NULL DEFAULT '1',
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endereco` int(6) NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `IDCLIENTE_UNIQUE` (`idcliente`),
  UNIQUE KEY `CPF_UNIQUE` (`cpf`),
  UNIQUE KEY `FOTO_UNIQUE` (`foto`),
  UNIQUE KEY `LOGIN_UNIQUE` (`login`),
  KEY `fk_cliente_endereco` (`endereco`),
  CONSTRAINT `fk_cliente_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'57606646031','1559176389.jpg','Renan Cesar','92995549994','renan@gmail.com','renan','827ccb0eea8a706c4c34a16891f84e7b',2,0,'2019-05-28 04:29:28',1),(2,'07472951072','luan1559017895.jpg','Luan Santos','92988484415','luan@hotmail.com','luan','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-28 04:31:36',2),(3,'98077026079','rafael1559018043.jpg','Rafael MendonÃ§a','92984745616','rafael@exatacargo.com.br','rafael','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-28 04:34:05',3),(4,'65622726026','laura1559018146.jpg','Laura GuimarÃ£es','92993310836','lenesilva@hotmail.com','laura','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-28 04:35:47',4),(5,'41307540090','heloyse1559094487.jpg','Heloyse Ferreira','98796098989','heloyse@email.com','heloyse','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-29 01:48:09',5),(6,'66485403035','reinaldo1559367032.jpg','Reinaldo Lourival','92978867271','kiko@email.com.br','reinaldo','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 05:30:34',6),(7,'58410939088','kotilin1559370542.jpg','Sammy Da Silva Melo','92987685756','silva@email.com.br','kotilin','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 06:29:03',7),(8,'12326826086','ciclano1559370619.jpg','Ciclano Da Silva','92929292922','ciclano@email.com.br','ciclano','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-01 06:30:20',8),(9,'99995424096','teste11559412053.jpg','Teste 1','92984236655','teste1@email.com','teste1','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 18:00:54',14),(10,'81643732064','1559436440.jpg','Teste 2','92984858686','teste2@email.com','teste2','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-01 18:15:31',15),(13,'22617406032','teste31559413305.jpg','Teste3','92998749494','teste3@email.com','teste3','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 18:21:46',18),(14,'69091784083','teste41559413371.jpg','Teste4','92945956459','teste4@email.com','teste4','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 18:22:52',19),(17,'67328020032','teste51559416396.jpg','Teste 5','92911984749','teste5@eail.com','teste5','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 19:13:17',22),(18,'84800181003','teste61559416453.jpg','Teste 06 ','92894449994','teste6@email.com','teste6','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-01 19:14:14',23),(19,'00803709269','teste1221559607497.jpg','Teste8 Silva','35442677367','qdww@dwdw.com','teste122','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-04 00:18:18',35);
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
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idendereco`),
  UNIQUE KEY `IDENDERECO_UNIQUE` (`idendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,'61930430','Rua 7','1','Cid Nova','Fortaleza','CE',''),(2,'69005110','Rua Quintino BocaiÃºva','Manaus','Centro','AM','31',''),(3,'69005350','Rua Governador VitÃ³rio','Manaus','Centro','AM','31',''),(4,'69057170','Rua Feliciana Costa','Manaus','Nossa Senhora Das GraÃ§as','AM','45','apto 7'),(5,'32065060','Rua Dos Bem-te-vis','897','Solar Do Madeira','Contagem','MG',''),(6,'69010060','Rua 10 De Julho','61','Centro','Manaus','AM',''),(7,'69059260','Avenida 17 De MarÃ§o','134','Santa Etelvina','Manaus','AM',''),(8,'69059000','Rua Professor IsaÃ­as Filho','11535','Santa Etelvina','Manaus','AM',''),(9,'4','69059260','Avenida 17','35','Santa Etelvina','Ma','AM'),(10,'1','69059160','Rua 17 De ','786','Santa Etelvina','Ma','AM'),(11,'1','69059160','Rua 17 De ','244125','Santa Etelvina','Ma','AM'),(12,'4','69059260','Avenida 17','421','Santa Etelvina','Ma','AM'),(13,'69059160','Rua 17 De MarÃ§o','235','Santa Etelvina','Manaus','AM',''),(14,'69007020','Rua Ãgua Viva','12','Distrito Industrial II','Manaus','AM',''),(15,'69010040','Rua Saldanha Marinho','752','Centro','Manaus','AM',''),(16,'69010040','Rua Saldanha Marinho','752','Centro','Manaus','AM',''),(17,'69005310','Rua Bernardo Ramos','665','Centro','Manaus','AM',''),(18,'69009365','Rua Rio Jacamim','6456','Puraquequara','Manaus','AM',''),(19,'69010060','Rua 10 De Julho','9595','Centro','Manaus','AM',''),(20,'69010040','Rua Saldanha Marinho','88','Centro','Manaus','AM',''),(21,'69010040','Rua Saldanha Marinho','88','Centro','Manaus','AM',''),(22,'69005310','Rua Bernardo Ramos','646','Centro','Manaus','AM',''),(23,'69007020','Rua Ãgua Viva','6','Distrito Industrial II','Manaus','AM',''),(24,'32065060','Rua Dos Bem-te-vis','2352','Solar Do Madeira','Contagem','MG',''),(25,'69005440','Travessa Vivaldo Lima','789','Centro','Manaus','AM','casa'),(26,'69010001','Avenida Eduardo Ribeiro','356','Centro','Manaus','AM',''),(27,'69007020','Rua Ãgua Viva','45','Distrito Industrial II','Manaus','AM',''),(28,'69005100','Rua Pedro Botelho','789','Centro','Manaus','AM',''),(29,'69010040','Rua Saldanha Marinho','53','Centro','Manaus','AM',''),(30,'69010040','Rua Saldanha Marinho','251','Centro','Manaus','AM',''),(31,'69010040','Rua Saldanha Marinho','45','Centro','Manaus','AM',''),(32,'69010001','Avenida Eduardo Ribeiro','789','Centro','Manaus','AM',''),(33,'69009365','Rua Rio Jacamim','789','Puraquequara','Manaus','AM',''),(34,'69050001','Avenida Constantino Nery','989','Chapada','Manaus','AM',''),(35,'69050001','Avenida Constantino Nery','A24','Chapada','Manaus','AM','');
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
  `descricao` longtext NOT NULL,
  `fixo` varchar(10) DEFAULT NULL,
  `fone` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` tinyint(1) NOT NULL DEFAULT '3',
  `status_` tinyint(1) NOT NULL DEFAULT '3',
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endereco` int(6) NOT NULL,
  `area` int(6) NOT NULL,
  `pagina` int(6) NOT NULL,
  `admin` int(6) DEFAULT NULL,
  PRIMARY KEY (`idfisico`),
  UNIQUE KEY `IDFISICO_UNIQUE` (`idfisico`),
  UNIQUE KEY `CPF_UNIQUE` (`cpf`),
  UNIQUE KEY `FOTO_UNIQUE` (`foto`),
  UNIQUE KEY `LOGIN_UNIQUE` (`login`),
  KEY `fk_fisico_endereco` (`endereco`),
  KEY `fk_fisico_area` (`area`),
  KEY `fk_fisico_pagina` (`pagina`),
  KEY `fk_fisico_admin` (`admin`),
  CONSTRAINT `fk_fisico_admin` FOREIGN KEY (`admin`) REFERENCES `administrador` (`idadmin`),
  CONSTRAINT `fk_fisico_area` FOREIGN KEY (`area`) REFERENCES `areaatuacao` (`idarea`),
  CONSTRAINT `fk_fisico_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idendereco`),
  CONSTRAINT `fk_fisico_pagina` FOREIGN KEY (`pagina`) REFERENCES `pagina` (`idpagina`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fisico`
--

LOCK TABLES `fisico` WRITE;
/*!40000 ALTER TABLE `fisico` DISABLE KEYS */;
INSERT INTO `fisico` VALUES (5,'Faço serviço de gandula para jogos profissionais e amadores. Aceito pagamento em dinheiro ou cartão.','','92993388766','fernandogomesf@icloud.com','Luis Coelho','81643732064','jokin1559372080.jpg','jokin','MTIzNDU=',3,1,'2019-06-01 06:54:42',13,3,5,NULL),(6,'Teste1f','','92294372947','teste1f@email.com','Teste 1f','57606646031','teste1f1559418208.jpg','teste1f','MTMxMzEzNDE0',3,1,'2019-06-01 19:43:29',24,9,6,NULL),(7,'Teste','','92978969856','qadad@sf.muo','Beltrano Kontrol','13576421050','teste2f1559422134.jpg','teste2f','MTIzNDU=',3,1,'2019-06-01 20:48:55',25,2,7,NULL),(8,'Tetstet','','97977867678','jbbnjn@c.co','Sammy Das Silva','00803709269','samm1559605010.jpg','samm','827ccb0eea8a706c4c34a16891f84e7b',3,3,'2019-06-03 23:36:51',34,1,17,NULL);
/*!40000 ALTER TABLE `fisico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juridico`
--

DROP TABLE IF EXISTS `juridico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juridico` (
  `idjuridico` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` longtext NOT NULL,
  `fixo` varchar(10) DEFAULT NULL,
  `fone` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `nomefantasia` varchar(80) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `razaosocial` varchar(80) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `perfil` tinyint(1) NOT NULL DEFAULT '3',
  `status_` tinyint(1) NOT NULL DEFAULT '3',
  `dtcadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endereco` int(6) NOT NULL,
  `area` int(6) NOT NULL,
  `pagina` int(6) NOT NULL,
  `admin` int(6) DEFAULT NULL,
  PRIMARY KEY (`idjuridico`),
  UNIQUE KEY `IDJURIDICO_UNIQUE` (`idjuridico`),
  UNIQUE KEY `LOGO_UNIQUE` (`foto`),
  UNIQUE KEY `CNPJ_UNIQUE` (`cnpj`),
  UNIQUE KEY `LOGIN_UNIQUE` (`login`),
  KEY `fk_juridico_endereco` (`endereco`),
  KEY `fk_juridico_area` (`area`),
  KEY `fk_juridico_pagina` (`pagina`),
  KEY `fk_juridico_admin` (`admin`),
  CONSTRAINT `fk_juridico_admin` FOREIGN KEY (`admin`) REFERENCES `administrador` (`idadmin`),
  CONSTRAINT `fk_juridico_area` FOREIGN KEY (`area`) REFERENCES `areaatuacao` (`idarea`),
  CONSTRAINT `fk_juridico_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idendereco`),
  CONSTRAINT `fk_juridico_pagina` FOREIGN KEY (`pagina`) REFERENCES `pagina` (`idpagina`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juridico`
--

LOCK TABLES `juridico` WRITE;
/*!40000 ALTER TABLE `juridico` DISABLE KEYS */;
INSERT INTO `juridico` VALUES (1,'Etete','','97496948469','teste1j@email.com','Teste1j','teste1j1559427833.jpg','Teste1j','67.809.441/000','Teste1j','teste1j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:23:54',26,7,9,NULL),(2,'Test','','62649649494','teste2j@email.com','Teste2j','teste2j1559428049.jpg','Teste2j','82.629.822/000','Teste2j','teste2j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:27:31',27,8,10,NULL),(3,'Tesdte','','95999529529','teste3j@email.com','Teste3 J','teste3j1559428207.jpg','Teste3 J','13.940.568/000','Teste3 J','teste3j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:30:09',28,6,11,NULL),(6,'Fs','','92995223984','silvasammy@outlook.com','Sfs','3tetgwet1559428584.jpg','Sfsf','67809441000100','Sfsf','3tetgwet','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:36:25',31,2,14,NULL),(8,'Realizamos serviços de funilaria e pinturas polimentos embelezamentos  etc,de automoveis ,temos os melhores preços do mercado ,melhor atendimento ,em tempo record ,realizamos orçamento pelo wts ou imail, serviços com total garantia , parcelamos em ate 12 veses no cartao de creditos.','','24250825235','teste4j@email.com','Teste4j','teste4j1559428765.jpg','Teste4j','48209382000194','Teste4j','teste4j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:39:26',33,9,16,NULL);
/*!40000 ALTER TABLE `juridico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagina`
--

DROP TABLE IF EXISTS `pagina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagina` (
  `idpagina` int(6) NOT NULL AUTO_INCREMENT,
  `site` varchar(50) DEFAULT NULL,
  `google` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `pinterest` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpagina`),
  UNIQUE KEY `IDPAGINA_UNIQUE` (`idpagina`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagina`
--

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;
INSERT INTO `pagina` VALUES (1,'','','','','',''),(2,'','','','','',''),(3,'','','','','',''),(4,'','','','','',''),(5,'','','','','',''),(6,'','http://facebook.com/lavajato','','','',''),(7,'','','','','',''),(8,'','','','','',''),(9,'','','','','',''),(10,'','','','','',''),(11,'','','','','',''),(12,'','','','','',''),(13,'','','','','',''),(14,'','','','','',''),(15,'','','','','',''),(16,'','','','','',''),(17,'','','','','','');
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
  `dtinicio` date NOT NULL,
  `dtfim` date DEFAULT NULL,
  `vlsugerido` double(8,2) DEFAULT '0.00',
  `vlprofissional` double(8,2) DEFAULT '0.00',
  `nota` tinyint(4) DEFAULT NULL,
  `comentario` longtext,
  `status_` tinyint(4) NOT NULL DEFAULT '1',
  `cliente` int(6) NOT NULL,
  `fisico` int(6) DEFAULT NULL,
  `juridico` int(6) DEFAULT NULL,
  `area` int(6) NOT NULL,
  `endereco` int(6) NOT NULL,
  PRIMARY KEY (`idservico`),
  UNIQUE KEY `IDSERVICO_UNIQUE` (`idservico`),
  KEY `fk_servico_cliente` (`cliente`),
  KEY `fk_servico_fisico` (`fisico`),
  KEY `fk_servico_juridico` (`juridico`),
  KEY `fk_servico_area` (`area`),
  KEY `fk_servico_endereco` (`endereco`),
  CONSTRAINT `fk_servico_area` FOREIGN KEY (`area`) REFERENCES `areaatuacao` (`idarea`),
  CONSTRAINT `fk_servico_cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `fk_servico_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco` (`idendereco`),
  CONSTRAINT `fk_servico_fisico` FOREIGN KEY (`fisico`) REFERENCES `fisico` (`idfisico`),
  CONSTRAINT `fk_servico_juridico` FOREIGN KEY (`juridico`) REFERENCES `juridico` (`idjuridico`)
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
-- Dumping routines for database 'dbserv'
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
																	pemail	varchar(60),
																	pfone	varchar(11),
																	plogin	varchar(15),
																	psenha	varchar(80),
																	pperfil	smallint(1),
																	pfoto	varchar(30),
																	pstatus_ tinyint(1),
                                                                    
																	pcep	varchar(8),
																	plogradouro	varchar(50),
																	pnumero	varchar(10),
																	pbairro varchar(40),
                                                                    pcidade varchar(40),
																	pestado	varchar(2),
                                                                    pcomplemento varchar(50)
																  )
BEGIN

		DECLARE videndereco INT;
        
        INSERT INTO endereco (
								cep,
								logradouro,
								numero,
                                bairro,
                                cidade,
                                estado,
								complemento
								)
							   VALUES(
										pcep,
										plogradouro,
										pnumero,
                                        pbairro,
                                        pcidade,
                                        pestado,
										pcomplemento
										);
											
		SET videndereco = LAST_INSERT_ID();
        
        INSERT INTO cliente (
							cpf,
							nome,
							email,
							fone,
							login,
							senha,
							perfil,
							foto,
							status_,
							endereco
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
								pstatus_,
								videndereco
								);
        
                                            
		SELECT * FROM cliente 
        INNER JOIN endereco ON idendereco = endereco
        WHERE idcliente = LAST_INSERT_ID();
        
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
																			pdescricao	longtext,
                                                                            pfixo	varchar(10),
                                                                            pfone	varchar(11),
                                                                            pemail	varchar(60),
																			pnome	varchar(50),
                                                                            pcpf	varchar(11),
                                                                            pfoto	varchar(30),
                                                                            plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	tinyint(1),
                                                                            pstatus_ tinyint(1),
                                                                            parea int(6),
                                                                            
                                                                            pcep 	varchar(8),
																			plogradouro	varchar(50),
																			pnumero	varchar(10),
																			pbairro varchar(40),
																			pcidade varchar(40),
																			pestado	varchar(2),
																			pcomplemento varchar(50),
                                                                            
                                                                            psite 		varchar(50),
                                                                            pgoogle 	varchar(50),
                                                                            ptwitter 	varchar(50),
                                                                            ppinterest 	varchar(50),
                                                                            pfacebook 	varchar(50),
                                                                            pinstagram 	varchar(50)
																		  )
BEGIN

		DECLARE vidpagina INT;
        DECLARE videndereco INT;
        
        INSERT INTO pagina (
										site,
                                        google,
                                        twitter,
                                        pinterest,
                                        facebook,
                                        instagram
                                        )
							VALUES(
										psite,
                                        pgoogle,
                                        ptwitter,
                                        ppinterest,                                        
                                        pfacebook,
                                        pinstagram                                        
                                        );
                                        
		SET vidpagina = LAST_INSERT_ID();
		
        
        INSERT INTO endereco (
								cep,
								logradouro,
								numero,
                                bairro,
                                cidade,
                                estado,
								complemento
								)
							   VALUES(
										pcep,
										plogradouro,
										pnumero,
                                        pbairro,
                                        pcidade,
                                        pestado,
										pcomplemento
										);
                                        
		SET videndereco = LAST_INSERT_ID();
        
        INSERT INTO fisico (
						descricao,
						fixo,
						fone,
						email,
						nome,
						cpf,
						foto,
						login,
						senha,
						perfil,
						status_,
						endereco,
						area,
						pagina
						)
						  VALUES(
									pdescricao,
									pfixo,
									pfone,
									pemail,
									pnome,
									pcpf,
									pfoto,
									plogin,
									psenha,
									pperfil,
									pstatus_,
									videndereco,
									parea,
									vidpagina
									);
        
                                            
		SELECT * FROM fisico 
        INNER JOIN endereco    ON idendereco = endereco
        INNER JOIN pagina      ON idpagina   = pagina
        INNER JOIN areaatuacao ON idarea     = area
        WHERE idfisico = LAST_INSERT_ID();
        
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
																			pdescricao	longtext,
                                                                            pfixo	varchar(10),
                                                                            pfone	varchar(11),
                                                                            pemail	varchar(60),
                                                                            presponsavel varchar(50),
																			pfoto	varchar(30),
                                                                            pnomefantasia	varchar(80),
                                                                            pcnpj	varchar(14),
                                                                            prazaosocial varchar(80),
                                                                            plogin	varchar(15),
																			psenha	varchar(80),
																			pperfil	tinyint(1),
                                                                            pstatus_ tinyint(1),
                                                                            parea int(6),
                                                                            
                                                                            pcep	varchar(8),
																			plogradouro	varchar(50),
																			pnumero	varchar(10),
																			pbairro varchar(40),
																			pcidade varchar(40),
																			pestado	varchar(2),
																			pcomplemento varchar(50),
                                                                            
                                                                            psite 		varchar(50),
                                                                            pgoogle 	varchar(50),
                                                                            ptwitter 	varchar(50),
                                                                            ppinterest 	varchar(50),
                                                                            pfacebook 	varchar(50),
                                                                            pinstagram 	varchar(50)
																		  )
BEGIN

		DECLARE vidpagina INT;
        DECLARE videndereco INT;
        
        INSERT INTO pagina (
										site,
                                        google,
                                        twitter,
                                        pinterest,
                                        facebook,
                                        instagram
                                        )
							VALUES(
										psite,
                                        pgoogle,
                                        ptwitter,
                                        ppinterest,                                        
                                        pfacebook,
                                        pinstagram                                        
                                        );
                                        
		SET vidpagina = LAST_INSERT_ID();
		
        
        INSERT INTO endereco (
								cep,
								logradouro,
								numero,
                                bairro,
                                cidade,
                                estado,
								complemento
								)
							   VALUES(
										pcep,
										plogradouro,
										pnumero,
                                        pbairro,
                                        pcidade,
                                        pestado,
										pcomplemento
										);
                                        
		SET videndereco = LAST_INSERT_ID();
        
        INSERT INTO juridico (
						descricao,
						fixo,
						fone,
						email,
                        responsavel,
						foto,
                        nomefantasia,
						cnpj,
						razaosocial,
						login,
						senha,
						perfil,
						status_,
						endereco,
						area,
						pagina
						)
						  VALUES(
									pdescricao,
									pfixo,
									pfone,
									pemail,
									presponsavel,
                                    pfoto,
                                    pnomefantasia,
									pcnpj,
									prazaosocial,
									plogin,
									psenha,
									pperfil,
									pstatus_,
									videndereco,
									parea,
									vidpagina
									);
        
                                            
		SELECT * FROM juridico 
        INNER JOIN endereco    ON idendereco = endereco
        INNER JOIN pagina      ON idpagina   = pagina
        INNER JOIN areaatuacao ON idarea     = area
        WHERE idjuridico = LAST_INSERT_ID();
        
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
																			pemail	varchar(60),
																			pfone	varchar(11),
																			pfoto	varchar(30),
																			pstatus_ tinyint(1),
                                                                            
                                                                            pendereco int(6),
																			pcep	varchar(8),
																			plogradouro	varchar(50),
																			pnumero	varchar(10),
																			pbairro varchar(40),
																			pcidade varchar(40),
																			pestado	varchar(2),
																			pcomplemento varchar(50)
																		  )
BEGIN

        
		UPDATE cliente SET 
							cpf 	= pcpf,
							nome 	= pnome,
							email 	= pemail,
							fone 	= pfone,
							foto 	= pfoto,
							status_ = pstatus_
					WHERE idcliente = pidcliente;
        
        UPDATE endereco SET
							cep 		= pcep,
							logradouro 	= plogradouro,
							cidade		= pcidade,
							bairro 		= pbairro,
							estado 		= pestado,
							numero 		= pnumero,
							complemento = pcomplemento
					WHERE idendereco = pendereco;
                                            
		SELECT * FROM cliente 
        INNER JOIN endereco ON idendereco = endereco
        WHERE idcliente = pidcliente;
        
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
    
    SET vidadmin 	= NULL;
    SET vidcliente  = NULL;
    SET vidfisico 	= NULL;
    SET vidjuridico = NULL;
    
  	SET vidadmin   	=  (SELECT idadmin   	FROM administrador  WHERE login = plogin AND senha = psenha AND status_ = 1);
    SET vidcliente 	=  (SELECT idcliente 	FROM cliente 		WHERE login = plogin AND senha = psenha AND status_ = 1);
    SET vidfisico   =  (SELECT idfisico 	FROM fisico			WHERE login = plogin AND senha = psenha AND status_ = 1);
    SET vidjuridico =  (SELECT idjuridico   FROM juridico 		WHERE login = plogin AND senha = psenha AND status_ = 1);
    
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

-- Dump completed on 2019-06-04  7:45:56
