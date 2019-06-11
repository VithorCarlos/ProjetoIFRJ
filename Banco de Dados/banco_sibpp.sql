-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sibpp
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `sibpp` ;

-- -----------------------------------------------------
-- Schema sibpp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sibpp` DEFAULT CHARACTER SET utf8 ;
USE `sibpp` ;

-- -----------------------------------------------------
-- Table `sibpp`.`pedido_oracao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sibpp`.`pedido_oracao` (
  `cod_pedido` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_membro` VARCHAR(35) NOT NULL,
  `email` VARCHAR(50) NULL,
  `telefone` CHAR(11) NOT NULL,
  `desc_pedido` TEXT(250) NOT NULL,
  PRIMARY KEY (`cod_pedido`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sibpp`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sibpp`.`endereco` (
  `cod_endereco` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cep` VARCHAR(8) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `cidade` VARCHAR(50) NOT NULL,
  `bairro` VARCHAR(20) NOT NULL,
  `rua` VARCHAR(150) NOT NULL,
  `complemento` VARCHAR(45) NULL,
  PRIMARY KEY (`cod_endereco`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sibpp`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sibpp`.`eventos` (
  `cod_eventos` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_evento` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(50) NULL,
  `data` DATE NOT NULL,
  `hora` TIME(3) NULL,
  `duracao` VARCHAR(30) NULL,
  `descricao` VARCHAR(300) NOT NULL,
  `endereco_cod_endereco` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cod_eventos`),
  INDEX `fk_eventos_endereco1_idx` (`endereco_cod_endereco` ASC),
  CONSTRAINT `fk_eventos_endereco1`
    FOREIGN KEY (`endereco_cod_endereco`)
    REFERENCES `sibpp`.`endereco` (`cod_endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sibpp`.`gestor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sibpp`.`gestor` (
  `cod_administrador` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_gestor` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `cpf` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NOT NULL,
  `eventos_cod_eventos` INT UNSIGNED NOT NULL,
  `endereco_cod_endereco` INT UNSIGNED NOT NULL,
  `pedido_oracao_cod_pedido` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cod_administrador`),
  INDEX `fk_gestor_eventos_idx` (`eventos_cod_eventos` ASC),
  INDEX `fk_gestor_endereco1_idx` (`endereco_cod_endereco` ASC),
  INDEX `fk_gestor_pedido_oracao1_idx` (`pedido_oracao_cod_pedido` ASC),
  CONSTRAINT `fk_gestor_eventos`
    FOREIGN KEY (`eventos_cod_eventos`)
    REFERENCES `sibpp`.`eventos` (`cod_eventos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gestor_endereco1`
    FOREIGN KEY (`endereco_cod_endereco`)
    REFERENCES `sibpp`.`endereco` (`cod_endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gestor_pedido_oracao1`
    FOREIGN KEY (`pedido_oracao_cod_pedido`)
    REFERENCES `sibpp`.`pedido_oracao` (`cod_pedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
