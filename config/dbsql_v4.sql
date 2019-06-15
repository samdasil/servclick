USE   `dbservclick`;


DROP TABLE IF EXISTS `pagina`;
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

INSERT INTO `pagina` VALUES (1,'','','','','',''),(2,'','','','','',''),(3,'','','','','',''),(4,'','','','','',''),(5,'','','','','',''),(6,'','','','','https://facebook.com/lanternagem',''),(7,'','','','','',''),(8,'','','','','',''),(9,'','','','','',''),(10,'','','','','',''),(11,'','','','','',''),(12,'','','','','',''),(13,'','','','','',''),(14,'','','','','',''),(15,'','','','','',''),(16,'','','','','',''),(17,'','','','','',''),(18,'','','https://twitter.com/exatacargo','','http://facebook.com/exatacargo','https://instagram.com/exatacargo'),(19,'','','','','https://faebook.com/kikomonetario',''),(20,'','','','','',''),(21,'','','','','',''),(22,'','','','','',''),(23,'https://www.bemol.com.br','https://www.googlemais.com','','','https://www.facebook.com/bemol','https://www.instagran.com/bemol'),(24,'','','','','',''),(25,'','','','','http://facebook.com/sammyxs4',''),(26,'','','','','','');

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idcategoria` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `IDCATEGORIA_UNIQUE` (`idcategoria`),
  UNIQUE KEY `DESCRICAO_UNIQUE` (`descricao`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `categoria` VALUES (9,'AutomaÃ§Ã£o'),(2,'Casa'),(3,'Esporte'),(7,'EstÃ©tica & Beleza'),(8,'FinanÃ§as'),(4,'InformÃ¡tica'),(5,'VeÃ­culo');

DROP TABLE IF EXISTS `endereco`;
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

INSERT INTO `endereco` VALUES (1,'69059160','Rua 17 De MarÃ§o','71','Santa Etelvina','Manaus','AM',''),(2,'69005110','Rua Quintino BocaiÃºva','Manaus','Centro','AM','31',''),(3,'69005350','Rua Governador VitÃ³rio','Manaus','Centro','AM','31',''),(4,'69057170','Rua Feliciana Costa','Manaus','Nossa Senhora Das GraÃ§as','AM','45','apto 7'),(5,'32065060','Rua Dos Bem-te-vis','897','Solar Do Madeira','Contagem','MG',''),(6,'69010060','Rua 10 De Julho','61','Centro','Manaus','AM',''),(7,'69059260','Avenida 17 De MarÃ§o','134','Santa Etelvina','Manaus','AM',''),(8,'69059000','Rua Professor IsaÃ­as Filho','11535','Santa Etelvina','Manaus','AM',''),(9,'4','69059260','Avenida 17','35','Santa Etelvina','Ma','AM'),(10,'1','69059160','Rua 17 De ','786','Santa Etelvina','Ma','AM'),(11,'1','69059160','Rua 17 De ','244125','Santa Etelvina','Ma','AM'),(12,'4','69059260','Avenida 17','421','Santa Etelvina','Ma','AM'),(13,'32065060','Rua Dos Bem-te-vis','897','Solar Do Madeira','Contagem','MG',''),(14,'69007020','Rua Ãgua Viva','88','Distrito Industrial II','Manaus','AM',''),(15,'69010040','Rua Saldanha Marinho','752','Centro','Manaus','AM',''),(16,'69010040','Rua Saldanha Marinho','752','Centro','Manaus','AM',''),(17,'69005310','Rua Bernardo Ramos','665','Centro','Manaus','AM',''),(18,'69009365','Rua Rio Jacamim','6456','Puraquequara','Manaus','AM',''),(19,'69010060','Rua 10 De Julho','9595','Centro','Manaus','AM',''),(20,'69010040','Rua Saldanha Marinho','88','Centro','Manaus','AM',''),(21,'69010040','Rua Saldanha Marinho','88','Centro','Manaus','AM',''),(22,'69005310','Rua Bernardo Ramos','646','Centro','Manaus','AM',''),(23,'69007020','Rua Ãgua Viva','6','Distrito Industrial II','Manaus','AM',''),(24,'69010060','Rua 10 De Julho','61','Centro','Manaus','AM',''),(25,'69005440','Travessa Vivaldo Lima','789','Centro','Manaus','AM','casa'),(26,'69010001','Avenida Eduardo Ribeiro','356','Centro','Manaus','AM',''),(27,'69007020','Rua Ãgua Viva','45','Distrito Industrial II','Manaus','AM',''),(28,'69005100','Rua Pedro Botelho','789','Centro','Manaus','AM',''),(29,'69010040','Rua Saldanha Marinho','53','Centro','Manaus','AM',''),(30,'69010040','Rua Saldanha Marinho','251','Centro','Manaus','AM',''),(31,'69010040','Rua Saldanha Marinho','45','Centro','Manaus','AM',''),(32,'69010001','Avenida Eduardo Ribeiro','789','Centro','Manaus','AM',''),(33,'69009365','Rua Rio Jacamim','789','Puraquequara','Manaus','AM',''),(34,'69059000','Rua Professor IsaÃ­as Filho','11535','Santa Etelvina','Manaus','AM',''),(35,'69050001','Avenida Constantino Nery','A24','Chapada','Manaus','AM',''),(36,'69005310','Rua Bernardo Ramos','4778','Centro','Manaus','AM',''),(37,'69058120','Avenida Tancredo Neves','654','Flores','Manaus','AM','casa'),(38,'69058120','Avenida Tancredo Neves','64','Flores','Manaus','AM',''),(39,'69058120','Avenida Tancredo Neves','544','Flores','Manaus','AM',''),(40,'69059160','Rua 17 De MarÃ§o','888','Santa Etelvina','Manaus','AM',''),(41,'69005015','Avenida LourenÃ§o Da Silva Braga','178','Centro','Manaus','AM','Residencial Vilas 2'),(42,'69005140','Avenida 7 De Setembro','67','Centro','Manaus','AM','Casa azul'),(43,'69050001','Avenida Constantino Nery','67','Chapada','Manaus','AM',''),(44,'69097305','Avenida Margarita','567','Nova Cidade','Manaus','AM','Shopping Nova Cidade'),(45,'69073530','Beco HemetÃ©rio Cabrinha','67','SÃ£o LÃ¡zaro','Manaus','AM','Apt'),(46,'69010060','Rua 10 De Julho','878','Centro','Manaus','AM',''),(47,'69007020','Rua Ãgua Viva','97','Distrito Industrial II','Manaus','AM',''),(48,'69005100','Rua Pedro Botelho','223','Centro','Manaus','AM',''),(49,'69050001','Avenida Constantino Nery','2229','Chapada','Manaus','AM','Conj Tocantins');

DROP TABLE IF EXISTS `administrador`;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `administrador` VALUES (1,'Administrador PadrÃ£o','admin','827ccb0eea8a706c4c34a16891f84e7b',1,1,'2019-06-01 07:00:17'),(2,'Sammy Da Silva Melo','sammy','MTIzNDU=',1,1,'2019-06-08 20:29:37'),(3,'Dalyana Cavalcante','daly','827ccb0eea8a706c4c34a16891f84e7b',1,1,'2019-06-09 19:54:11'),(4,'Heloyse Ferreira','heloyse','MTIzNDU=',1,1,'2019-06-09 19:54:49');

DROP TABLE IF EXISTS `areaatuacao`;
CREATE TABLE `areaatuacao` (
  `idarea` int(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `categoria` int(6) NOT NULL,
  PRIMARY KEY (`idarea`),
  UNIQUE KEY `IDAREA_UNIQUE` (`idarea`),
  UNIQUE KEY `DESCRICAO_UNIQUE` (`descricao`),
  KEY `fk_areaatuacao_categoria` (`categoria`),
  CONSTRAINT `fk_areaatuacao_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO `areaatuacao` VALUES (1,'Eletricista',2),(2,'Pintor',2),(3,'Ãrbitro De Futebol',3),(5,'TÃ©cnico Em InformÃ¡tica',4),(6,'Instalador de Internet',4),(7,'Analista Redes De Computadores',4),(8,'MecÃ¢nico Geral',5),(9,'Lanternagem e Pintura',5),(10,'Manicure & Pedicure',7),(11,'Massagista Corporal',7),(12,'Instalador De PortÃµes',9),(13,'Lavador De VeÃ­culos',5),(14,'Jardinagem',2);

DROP TABLE IF EXISTS `cliente`;
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `cliente` VALUES (1,'57606646031','1560387734.jpg','Sammy Melo ','92995549994','sam@gmail.com','renan','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-28 04:29:28',1),(2,'07472951072','1560089965.jpg','Luan Santos','92988484415','luan@hotmail.com','luan','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-05-28 04:31:36',2),(3,'98077026079','1560281225.jpg','Rafael MendonÃ§a','92984745616','rafael@exatacargo.com.br','rafael','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-28 04:34:05',3),(4,'65622726026','laura1559018146.jpg','Laura GuimarÃ£es','92993310836','lenesilva@hotmail.com','laura','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-28 04:35:47',4),(5,'41307540090','heloyse1559094487.jpg','Heloyse Ferreira','98796098989','heloyse@email.com','heloyse','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-05-29 01:48:09',5),(6,'66485403035','reinaldo1559367032.jpg','Reinaldo Lourival','92978867271','kiko@email.com.br','reinaldo','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 05:30:34',6),(7,'58410939088','1560114595.jpg','Sammy Da Silva Melo','92987685756','silva@email.com.br','kotilin','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 06:29:03',7),(8,'12326826086','ciclano1559370619.jpg','Ciclano Da Silva','92929292922','ciclano@email.com.br','ciclano','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-01 06:30:20',8),(9,'99995424096','teste11559412053.jpg','Teste 1','92984236655','teste1@email.com','venus','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 18:00:54',14),(10,'81643732064','1559436440.jpg','Teste 2','92984858686','teste2@email.com','teste2','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-01 18:15:31',15),(13,'22617406032','teste31559413305.jpg','Teste3','92998749494','teste3@email.com','teste3','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 18:21:46',18),(14,'69091784083','teste41559413371.jpg','Teste4','92945956459','teste4@email.com','teste4','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 18:22:52',19),(17,'67328020032','teste51559416396.jpg','Teste 5','92911984749','teste5@eail.com','teste5','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-01 19:13:17',22),(18,'84800181003','teste61559416453.jpg','Teste 06 ','92894449994','teste6@email.com','mercurio','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-01 19:14:14',23),(19,'00803709269','teste1221559607497.jpg','Teste8 Silva','35442677367','qdww@dwdw.com','teste122','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-04 00:18:18',35),(20,'55632641066','josival1560091911.jpg','Josival Lima','92992995466','josival@email.com','josival','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-09 14:51:52',37),(21,'03004916207','roberto.silva1560121658.jpg','Rovervaldo Martins Silva','92994270054','roberto@hotmail.com','roberto.silva','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-09 23:07:39',41),(22,'03065246279','Luisa 1560126681.jpg','Heloisa Garcia ','92993476557','ferreira@gmail.com','luisa ','e10adc3949ba59abbe56e057f20f883e',2,1,'2019-06-10 00:31:22',42),(23,'90745377076','Luiza1560215314.jpg','Fulana','92994568680','teste@gmaol.com','luiza','827ccb0eea8a706c4c34a16891f84e7b',2,1,'2019-06-11 01:08:36',45),(24,'93003518003','1560363297.jpg','Kiko Do Chavez','92978867275','kiko@email.com.br','kikochavez','827ccb0eea8a706c4c34a16891f84e7b',2,2,'2019-06-12 18:13:53',46);

DROP TABLE IF EXISTS `fisico`;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `fisico` VALUES (5,'FaÃ§o serviÃ§o de gandula para jogos profissionais e amadores. Aceito pagamento em dinheiro ou cartÃ£o.','','92993388766','fernandogomesf@icloud.com','Luis Coelho','81643732064','jokin1559372080.jpg','jokin','827ccb0eea8a706c4c34a16891f84e7b',3,2,'2019-06-01 06:54:42',13,3,5,NULL),(6,'ServiÃ§os de Lanternagem  e pintura com tecnologia inovadora, preÃ§os acessÃ­veis. \r\nAtendimento de segunda Ã  sÃ¡bado das 8h Ã s 18.\r\nGarantimos a qualidade do serviÃ§o! ','','92294372947','hamilton@email.com','Lanternagem E Pintura Do Hamilton','57606646031','teste1f1559418208.jpg','teste1f','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 19:43:29',24,9,6,NULL),(7,'Teste','','92978969856','qadad@sf.muo','Beltrano Kontrol','13576421050','teste2f1559422134.jpg','teste2f','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 20:48:55',25,2,7,NULL),(8,'Todos os tipos de Massagem corporal .','9292929244','97977867678','jbbnjn@c.co','Sammy Das Silva','00803709269','samm1559605010.jpg','sammys','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-03 23:36:51',34,2,17,NULL),(9,'InstalaÃ§Ã§ao De Internet Com Bom Atendimento E Garantia E Qualidade No ServiÃ§o','','92988484554','kikomonetario@email.com','Kiko Monetario','96230882051','kikomonetario1560092945.jpg','kikomonetario','827ccb0eea8a706c4c34a16891f84e7b',3,3,'2019-06-09 15:09:06',38,6,19,NULL),(10,'Teste De CriaÃ§Ã£o De Perfil Fisico','','92993993939','joao@email.com','Joao Pe De Feijao','72669314015','Waffer1560115172.jpg','waffer','827ccb0eea8a706c4c34a16891f84e7b',3,2,'2019-06-09 21:19:33',40,5,21,NULL),(11,'Teste','','29848444879','falcao@email.com','Falcao ','53527510079','Falcao1560209016.jpg','falcao','827ccb0eea8a706c4c34a16891f84e7b',3,3,'2019-06-10 23:23:38',43,7,22,NULL),(12,'ServiÃ§o De MecÃ¢nica De Carro Grande','','92949848449','exata@eamil.com','Exata Cargo Tste','40888955090','exatas1560363505.jpg','exatas','827ccb0eea8a706c4c34a16891f84e7b',3,3,'2019-06-12 18:18:27',47,8,24,NULL),(13,'ServiÃ§os De Infraestruturas, Lan Hoje As Ã© Etc','','92982500060','dalyanacavalcante@gmail.com','Dalyana Cavalcante','96586460263','dalyana1560388392.jpg','dalyana','e10adc3949ba59abbe56e057f20f883e',3,1,'2019-06-13 01:13:13',49,7,26,NULL);

DROP TABLE IF EXISTS `juridico`;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO `juridico` VALUES (1,'Etete','','97496948469','teste1j@email.com','Teste1j','teste1j1559427833.jpg','Teste1j','67.809.441/000','Teste1j','teste1j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:23:54',26,7,9,NULL),(2,'Test','','62649649494','teste2j@email.com','Teste2j','teste2j1559428049.jpg','Teste2j','82.629.822/000','Teste2j','teste2j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:27:31',27,8,10,NULL),(3,'Tesdte','','95999529529','teste3j@email.com','Teste3 J','teste3j1559428207.jpg','Teste3 J','13.940.568/000','Teste3 J','teste3j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:30:09',28,6,11,NULL),(6,'Fs','','92995223984','silvasammy@outlook.com','Sfs','3tetgwet1559428584.jpg','Sfsf','67809441000100','Sfsf','3tetgwet','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:36:25',31,2,14,NULL),(8,'Realizamos serviços de funilaria e pinturas polimentos embelezamentos  etc,de automoveis ,temos os melhores preços do mercado ,melhor atendimento ,em tempo record ,realizamos orçamento pelo wts ou imail, serviços com total garantia , parcelamos em ate 12 veses no cartao de creditos.','','24250825235','teste4j@email.com','Teste4j','teste4j1559428765.jpg','Teste4j','48209382000194','Teste4j','teste4j','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-01 22:39:26',33,9,16,NULL),(9,'FormataÃ§Ã£o De Computadores, ManutenÃ§Ã£o Preventiva E Resolutiva.','','92929295944','comercial@exatacargo.com.br','Manoel Paiva','exatacargo1559867707.jpg','Exata Catgo','06186733000220','Exata Cargo LTDA','exatacargo','827ccb0eea8a706c4c34a16891f84e7b',3,1,'2019-06-07 00:35:08',36,6,18,NULL),(10,'Lorem Ipsum Lacinia A Dapibus In Curabitur Ullamcorper Id Auctor Pretium Curae, Nec Taciti Ac Litora Amet Leo Varius Fermentum Quisque Quis. Eleifend Lorem Eu Habitant Consectetur Nibh Blandit Lectus Egestas Etiam, Commodo Suspendisse Urna Semper Platea Nullam Porta Eu Non Neque, Nibh Orci Felis At Ultricies Aliquam Nullam Mi. Blandit Molestie Varius Eget Pellentesque Odio Eget Interdum Nunc Ante Turpis Nibh Curabitur, Viverra Nam Habitant Phasellus Nisl Vehicula Dui Massa Aenean ','','92984984848','unick@email.com','Leandro Beiga','unick1560094524.jpg','Unick','26015922000166','Unick ','unick','827ccb0eea8a706c4c34a16891f84e7b',3,3,'2019-06-09 15:35:25',39,7,20,NULL),(11,'Trabalho Com InstalaÃ§Ã£o De Equipamentos De Internet.','9232343667','92982557678','antonio@bemol.com','ANTONIO BECHIMOL','bemol1560209732.jpg','BEMOL MANAUS','04565289003596','BENCHIMOL IRMAO & CIA LTDA','bemol','d1999a2caf49c63987d19e2ee981ead8',3,3,'2019-06-10 23:35:33',44,6,23,NULL),(12,'Limpeza E Tudo Mais','','93222945949','marcio@lavajato.com','Marcio Tavares','fisico11560363868.jpg','Lava Jato Juca','28960741000133','Lava Jato Juca','fisico1','827ccb0eea8a706c4c34a16891f84e7b',3,3,'2019-06-12 18:24:29',48,9,25,NULL);

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `idservico` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` longtext NOT NULL,
  `dtinicio` date NOT NULL,
  `dtfim` date DEFAULT NULL,
  `valor` double(8,2) DEFAULT '0.00',
  `nota` tinyint(1) DEFAULT NULL,
  `comentario` longtext,
  `status_` tinyint(1) NOT NULL DEFAULT '1',
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `servico` VALUES (2,'Algum profissional massagista que possa atender em domicilio nas redondezas do centro ? Pagamento em dinheiro.','2019-06-10','2019-06-12',50.00,NULL,NULL,4,1,8,NULL,11,1),(3,'teste','2019-06-10',NULL,0.00,NULL,NULL,1,1,NULL,NULL,10,1),(4,'teste2','2019-06-10',NULL,0.00,NULL,NULL,1,1,NULL,NULL,11,1),(5,'preciso que configurem meu roteador para pegar o sinal do outro roteador','2019-06-10',NULL,0.00,NULL,NULL,1,1,NULL,NULL,6,1),(6,'Formatar meu notebook.','2019-06-10',NULL,0.00,NULL,NULL,1,23,NULL,NULL,6,45),(7,'massagem corporal ','2019-06-11',NULL,0.00,NULL,NULL,1,3,NULL,NULL,11,3),(8,'teste','2019-06-11','2019-06-12',152.00,NULL,NULL,3,3,8,NULL,11,3),(9,'Preciso de um orÃ§amento para a pintura de um carro palio 2007.','2019-06-11',NULL,0.00,NULL,NULL,1,3,NULL,NULL,9,3),(10,'Preciso de massagista para quinta-feira, que atenda em domicilio','2019-06-11','2019-06-12',60.00,4,'servico de primeira, so nao gostei muito do valor',3,1,8,NULL,11,1),(11,'preciso que configurem meu modem, urgente','2019-06-12',NULL,0.00,NULL,NULL,1,1,NULL,NULL,6,1),(12,'Preciso instalar um portÃ£o na minha casa','2019-06-12',NULL,0.00,NULL,NULL,1,1,NULL,NULL,12,1),(13,'Resetar switch da empresa bemol.','2019-06-12',NULL,0.00,NULL,NULL,1,5,NULL,NULL,7,5),(14,'Configurar roteador','2019-06-12',NULL,0.00,NULL,NULL,1,5,NULL,NULL,7,5),(15,'Projeto','2019-06-12',NULL,20.00,NULL,NULL,2,5,13,NULL,7,5);

DELIMITER ;;
CREATE  PROCEDURE `SP_CADASTRAR_CLIENTE`(
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

DELIMITER ;;
CREATE PROCEDURE `SP_CADASTRAR_FISICO`(
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

DELIMITER ;;
CREATE PROCEDURE `SP_CADASTRAR_JURIDICO`(
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

DELIMITER ;;
CREATE PROCEDURE `SP_CARREGAR_USUARIO`(plogin varchar(15))
BEGIN

	select login,perfil,senha,status_,dtcadastro from cliente
	where login = plogin
	union all 
	select login,perfil,senha,status_,dtcadastro from fisico
	where login = plogin
	union all
	select login,perfil,senha,status_,dtcadastro from juridico
	where login = plogin
	union all 
	select login,perfil,senha,status_,dtcadastro from administrador
	where login = plogin;

END ;;
DELIMITER ;

DELIMITER ;;
CREATE PROCEDURE `SP_EDITAR_CLIENTE`(
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

DELIMITER ;;
CREATE PROCEDURE `SP_EDITAR_FISICO`(
									pidfisico int(6),
									pdescricao	longtext,
									pfixo	varchar(10),
									pfone	varchar(11),
									pemail	varchar(60),
									pnome	varchar(50),
									pcpf	varchar(11),
									pfoto	varchar(30),
									pstatus_ tinyint(1),
									parea int(6),
									
                                    pendereco int(6),
									pcep 	varchar(8),
									plogradouro	varchar(50),
									pnumero	varchar(10),
									pbairro varchar(40),
									pcidade varchar(40),
									pestado	varchar(2),
									pcomplemento varchar(50),
									
                                    ppagina int(6),
									psite 		varchar(50),
									pgoogle 	varchar(50),
									ptwitter 	varchar(50),
									ppinterest 	varchar(50),
									pfacebook 	varchar(50),
									pinstagram 	varchar(50)
								  )
BEGIN
        
        UPDATE pagina SET
						facebook 	= pfacebook,
						instagram 	= pinstagram,
						pinterest 	= ppinterest,
						twitter 	= ptwitter,
						google 		= pgoogle,
						site 		= psite
			WHERE idpagina = ppagina;
						
        UPDATE fisico SET
						cpf 		= pcpf,
						nome 		= pnome,
						descricao 	= pdescricao,
						email 		= pemail,
						fone 		= pfone,
						fixo 		= pfixo,
						status_ 	= pstatus_,
						foto 		= pfoto,
                        area 		= parea
				  WHERE 
						idfisico = pidfisico;

        UPDATE endereco SET
							cep 		= pcep,
							logradouro 	= plogradouro,
							cidade 		= pcidade,
							bairro 		= pbairro,
							estado 		= pestado,
							numero 		= pnumero,
							complemento = pcomplemento
			   WHERE
							idendereco  = pendereco;
							
		SELECT * FROM fisico f
        WHERE f.idfisico = pidfisico;
        
END ;;
DELIMITER ;

DELIMITER ;;
CREATE PROCEDURE `SP_LISTAR_USUARIOS`()
BEGIN
	
    select idadmin as id, perfil, nome as nome, login, status_ as status_ from administrador
    union all
    select idcliente as id, perfil, nome as nome, login, status_ as status_ from cliente
    union all
    select idfisico as id, perfil, nome as nome, login, status_ as status_ from fisico
    union all
    select idjuridico as id,perfil, razaosocial as nome, login, status_ as status_ from juridico;

    
END ;;
DELIMITER ;

DELIMITER ;;
CREATE PROCEDURE `SP_REALIZAR_LOGIN`(plogin varchar(15), psenha varchar(100))
BEGIN

	DECLARE vidadmin 	int;
    DECLARE vidcliente 	int;
    DECLARE vidfisico 	int;
    DECLARE vidjuridico int;
    
    SET vidadmin 	= 0;
    SET vidcliente  = 0;
    SET vidfisico 	= 0;
    SET vidjuridico = 0;
    
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
