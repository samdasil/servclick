-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbservclick
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbservclick
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbservclick` DEFAULT CHARACTER SET utf8 ;
USE `dbservclick` ;

-- -----------------------------------------------------
-- Table `dbservclick`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`categoria` (
  `idcategoria` INT(6) NOT NULL,
  `descricao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idcategoria`),
  UNIQUE INDEX `descricao_UNIQUE` (`descricao` ASC),
  UNIQUE INDEX `idcategoria_UNIQUE` (`idcategoria` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbservclick`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`cliente` (
  `idcliente` INT(6) NOT NULL AUTO_INCREMENT,
  `cpf` BIGINT(11) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `fone` VARCHAR(11) NOT NULL,
  `login` VARCHAR(15) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  `perfil` SMALLINT NOT NULL DEFAULT 2,
  `foto` VARCHAR(20) NOT NULL,
  `status` TINYINT NOT NULL,
  `dtcadastro` TIMESTAMP NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  UNIQUE INDEX `idcliente_UNIQUE` (`idcliente` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB
COMMENT = '                 ';


-- -----------------------------------------------------
-- Table `dbservclick`.`pagina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`pagina` (
  `idpagina` INT(6) NOT NULL,
  `facebook` VARCHAR(50) NULL,
  `instagram` VARCHAR(50) NULL,
  `pinterest` VARCHAR(50) NULL,
  `twitter` VARCHAR(50) NULL,
  `google` VARCHAR(50) NULL,
  `site` VARCHAR(50) NULL,
  PRIMARY KEY (`idpagina`),
  UNIQUE INDEX `idcategoria_UNIQUE` (`idpagina` ASC))
ENGINE = InnoDB
COMMENT = '                 ';


-- -----------------------------------------------------
-- Table `dbservclick`.`administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`administrador` (
  `idadmin` INT(6) NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  `login` VARCHAR(15) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  `status` TINYINT NOT NULL,
  `dtcadastro` TIMESTAMP NOT NULL,
  `perfil` SMALLINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`idadmin`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  UNIQUE INDEX `idadmin_UNIQUE` (`idadmin` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbservclick`.`juridico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`juridico` (
  `idjuridico` INT(6) NOT NULL AUTO_INCREMENT,
  `cnpj` BIGINT(14) NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `fone` VARCHAR(11) NOT NULL,
  `fixo` VARCHAR(10) NULL,
  `status` TINYINT NOT NULL,
  `razaosocial` VARCHAR(80) NOT NULL,
  `nomefantasia` VARCHAR(80) NOT NULL,
  `responsavel` VARCHAR(50) NOT NULL,
  `logo` VARCHAR(20) NOT NULL,
  `login` VARCHAR(15) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  `perfil` SMALLINT NOT NULL DEFAULT 3,
  `idpagina` INT NULL,
  `idadmin` INT NULL,
  `dtcadastro` TIMESTAMP NOT NULL,
  INDEX `fk_profissional_pagina_idx` (`idpagina` ASC),
  PRIMARY KEY (`idjuridico`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  INDEX `fk_juridico_administrador1_idx` (`idadmin` ASC),
  UNIQUE INDEX `idjuridico_UNIQUE` (`idjuridico` ASC),
  CONSTRAINT `fk_profissional_pagina`
    FOREIGN KEY (`idpagina`)
    REFERENCES `dbservclick`.`pagina` (`idpagina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_juridico_administrador1`
    FOREIGN KEY (`idadmin`)
    REFERENCES `dbservclick`.`administrador` (`idadmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '                 ';


-- -----------------------------------------------------
-- Table `dbservclick`.`fisico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`fisico` (
  `idfisico` INT(6) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `descricao` LONGTEXT NOT NULL,
  `email` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NOT NULL COMMENT 'Senha',
  `fone` VARCHAR(11) NOT NULL COMMENT 'Perfil',
  `fixo` VARCHAR(10) NULL,
  `status` TINYINT NOT NULL,
  `foto` VARCHAR(100) NOT NULL,
  `login` VARCHAR(15) NOT NULL,
  `senha` VARCHAR(15) NOT NULL,
  `perfil` SMALLINT NOT NULL DEFAULT 3,
  `idpagina` INT NULL,
  `idadmin` INT NULL,
  `dtcadastro` TIMESTAMP NOT NULL,
  INDEX `fk_profissional_pagina_idx` (`idpagina` ASC),
  PRIMARY KEY (`idfisico`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC),
  INDEX `fk_fisico_administrador1_idx` (`idadmin` ASC),
  UNIQUE INDEX `idfisico_UNIQUE` (`idfisico` ASC),
  CONSTRAINT `fk_profissional_pagina0`
    FOREIGN KEY (`idpagina`)
    REFERENCES `dbservclick`.`pagina` (`idpagina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fisico_administrador1`
    FOREIGN KEY (`idadmin`)
    REFERENCES `dbservclick`.`administrador` (`idadmin`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '                 ';


-- -----------------------------------------------------
-- Table `dbservclick`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`servico` (
  `idservico` INT NOT NULL AUTO_INCREMENT,
  `descricao` LONGTEXT NOT NULL,
  `data` DATE NOT NULL,
  `datafim` DATE NULL,
  `valor` DOUBLE(8,2) NOT NULL DEFAULT 0,
  `status` TINYINT NOT NULL,
  `cliente` BIGINT(11) NOT NULL,
  `fisico` INT(6) NOT NULL,
  `categoria` INT(6) NOT NULL,
  `juridico` INT(6) NOT NULL,
  PRIMARY KEY (`idservico`),
  INDEX `fk_Servico_cliente1_idx` (`cliente` ASC),
  INDEX `fk_Servico_fisico1_idx` (`fisico` ASC),
  INDEX `fk_servico_categoria1_idx` (`categoria` ASC),
  INDEX `fk_servico_juridico1_idx` (`juridico` ASC),
  CONSTRAINT `fk_Servico_cliente1`
    FOREIGN KEY (`cliente`)
    REFERENCES `dbservclick`.`cliente` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Servico_fisico1`
    FOREIGN KEY (`fisico`)
    REFERENCES `dbservclick`.`fisico` (`idfisico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `dbservclick`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_servico_juridico1`
    FOREIGN KEY (`juridico`)
    REFERENCES `dbservclick`.`juridico` (`idjuridico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbservclick`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`endereco` (
  `idendereco` INT(6) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `logradouro` VARCHAR(50) NOT NULL,
  `cidade` VARCHAR(30) NOT NULL,
  `bairro` VARCHAR(30) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `numero` VARCHAR(10) NULL,
  `complemento` VARCHAR(30) NULL,
  `cliente` BIGINT(11) NULL,
  `fisico` INT(6) NULL,
  `servico` INT(6) NULL,
  `juridico` INT(6) NULL,
  UNIQUE INDEX `cnpj_UNIQUE` (`idendereco` ASC),
  PRIMARY KEY (`idendereco`),
  INDEX `fk_endereco_cliente1_idx` (`cliente` ASC),
  INDEX `fk_endereco_fisico1_idx` (`fisico` ASC),
  INDEX `fk_endereco_servico1_idx` (`servico` ASC),
  UNIQUE INDEX `cep_UNIQUE` (`cep` ASC),
  INDEX `fk_endereco_juridico1_idx` (`juridico` ASC),
  CONSTRAINT `fk_endereco_cliente1`
    FOREIGN KEY (`cliente`)
    REFERENCES `dbservclick`.`cliente` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_fisico1`
    FOREIGN KEY (`fisico`)
    REFERENCES `dbservclick`.`fisico` (`idfisico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_servico1`
    FOREIGN KEY (`servico`)
    REFERENCES `dbservclick`.`servico` (`idservico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_endereco_juridico1`
    FOREIGN KEY (`juridico`)
    REFERENCES `dbservclick`.`juridico` (`idjuridico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '                 ';


-- -----------------------------------------------------
-- Table `dbservclick`.`fisicocategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`fisicocategoria` (
  `fisico` INT(6) NOT NULL,
  `categoria` INT(6) NOT NULL,
  PRIMARY KEY (`fisico`, `categoria`),
  INDEX `fk_fisico_has_categoria_categoria1_idx` (`categoria` ASC),
  INDEX `fk_fisico_has_categoria_fisico1_idx` (`fisico` ASC),
  CONSTRAINT `fk_fisico_has_categoria_fisico1`
    FOREIGN KEY (`fisico`)
    REFERENCES `dbservclick`.`fisico` (`idfisico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fisico_has_categoria_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `dbservclick`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbservclick`.`juridicocategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbservclick`.`juridicocategoria` (
  `juridico` INT(6) NOT NULL,
  `categoria` INT(6) NOT NULL,
  PRIMARY KEY (`juridico`, `categoria`),
  INDEX `fk_juridico_has_categoria_categoria1_idx` (`categoria` ASC),
  INDEX `fk_juridico_has_categoria_juridico1_idx` (`juridico` ASC),
  CONSTRAINT `fk_juridico_has_categoria_juridico1`
    FOREIGN KEY (`juridico`)
    REFERENCES `dbservclick`.`juridico` (`idjuridico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_juridico_has_categoria_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `dbservclick`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
