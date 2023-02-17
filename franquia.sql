-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema franquia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema franquia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `franquia` DEFAULT CHARACTER SET utf8 ;
USE `franquia` ;

-- -----------------------------------------------------
-- Table `franquia`.`restaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`restaurante` (
  `idrestaurante` INT NOT NULL AUTO_INCREMENT,
  `nomeRest` VARCHAR(30) NOT NULL,
  `cnpj_rest` CHAR(14) NOT NULL,
  `horario_abre` TIME NOT NULL,
  `horario_fecha` TIME NOT NULL,
  `logradouro` VARCHAR(40) NOT NULL,
  `numero` INT NOT NULL,
  `complemento` VARCHAR(30) NULL,
  `cidade` VARCHAR(40) NOT NULL,
  `bairro` VARCHAR(20) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`idrestaurante`),
  UNIQUE INDEX `cnpj_rest_UNIQUE` (`cnpj_rest` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`cliente` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `cpf_cliente` CHAR(14) NOT NULL,
  `data_nasc` DATE NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE INDEX `cpf_cliente_UNIQUE` (`cpf_cliente` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`empregado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`empregado` (
  `idempregado` INT NOT NULL AUTO_INCREMENT,
  `cpf_emp` CHAR(11) NOT NULL,
  `nome_emp` VARCHAR(30) CHARACTER SET 'armscii8' NOT NULL,
  `salario` FLOAT NOT NULL,
  `cargo` VARCHAR(20) NOT NULL,
  `FK_idrestaurante` INT NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NULL,
  PRIMARY KEY (`idempregado`),
  UNIQUE INDEX `cpf_emp_UNIQUE` (`cpf_emp` ASC) VISIBLE,
  INDEX `fk_empregado_restaurante1_idx` (`FK_idrestaurante` ASC) VISIBLE,
  UNIQUE INDEX `FK_idrestaurante_UNIQUE` (`FK_idrestaurante` ASC) VISIBLE,
  CONSTRAINT `fk_empregado_restaurante1`
    FOREIGN KEY (`FK_idrestaurante`)
    REFERENCES `franquia`.`restaurante` (`idrestaurante`)
    ON DELETE RESTRICT
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = armscii8;


-- -----------------------------------------------------
-- Table `franquia`.`ingrediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`ingrediente` (
  `idingrediente` INT NOT NULL AUTO_INCREMENT,
  `nome_ing` VARCHAR(30) NOT NULL,
  `quant_max` INT NULL,
  `quant_atual` INT NOT NULL,
  `quant_min` INT NULL,
  `validade` DATE NOT NULL,
  `descricao_ing` VARCHAR(50) NULL,
  PRIMARY KEY (`idingrediente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `n_serie` INT NOT NULL,
  `valor_total` FLOAT NOT NULL,
  `forma_pagamento` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idpedido`),
  UNIQUE INDEX `n_serie_UNIQUE` (`n_serie` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `valor` FLOAT NOT NULL,
  `descricao_prod` VARCHAR(50) NULL,
  `nome_prod` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`Realiza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`Realiza` (
  `FK_idrestaurante` INT NOT NULL,
  `FK_idpedido` INT NOT NULL,
  `FK_idcliente` INT NOT NULL,
  `data_pedido` DATE NOT NULL,
  `hora_pedido` TIME NOT NULL,
  PRIMARY KEY (`FK_idrestaurante`, `FK_idpedido`, `FK_idcliente`),
  INDEX `fk_restaurante_has_pedido_pedido1_idx` (`FK_idpedido` ASC) VISIBLE,
  INDEX `fk_restaurante_has_pedido_restaurante1_idx` (`FK_idrestaurante` ASC) VISIBLE,
  INDEX `fk_restaurante_has_pedido_cliente1_idx` (`FK_idcliente` ASC) INVISIBLE,
  CONSTRAINT `fk_restaurante_has_pedido_restaurante1`
    FOREIGN KEY (`FK_idrestaurante`)
    REFERENCES `franquia`.`restaurante` (`idrestaurante`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_restaurante_has_pedido_pedido1`
    FOREIGN KEY (`FK_idpedido`)
    REFERENCES `franquia`.`pedido` (`idpedido`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_restaurante_has_pedido_cliente1`
    FOREIGN KEY (`FK_idcliente`)
    REFERENCES `franquia`.`cliente` (`idcliente`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`faz_parte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`faz_parte` (
  `FK_idpedido` INT NOT NULL,
  `FK_idproduto` INT NOT NULL,
  `quantidade_vendida` INT NOT NULL,
  `preco_vendido` FLOAT NOT NULL,
  PRIMARY KEY (`FK_idpedido`, `FK_idproduto`),
  INDEX `fk_pedido_has_produto_produto1_idx` (`FK_idproduto` ASC) VISIBLE,
  INDEX `fk_pedido_has_produto_pedido1_idx` (`FK_idpedido` ASC) VISIBLE,
  CONSTRAINT `fk_pedido_has_produto_pedido1`
    FOREIGN KEY (`FK_idpedido`)
    REFERENCES `franquia`.`pedido` (`idpedido`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedido_has_produto_produto1`
    FOREIGN KEY (`FK_idproduto`)
    REFERENCES `franquia`.`produto` (`idproduto`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`compoe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`compoe` (
  `FK_idproduto` INT NOT NULL,
  `FK_idingrediente` INT NOT NULL,
  PRIMARY KEY (`FK_idproduto`, `FK_idingrediente`),
  INDEX `fk_produto_has_ingrediente_ingrediente1_idx` (`FK_idingrediente` ASC) VISIBLE,
  INDEX `fk_produto_has_ingrediente_produto1_idx` (`FK_idproduto` ASC) VISIBLE,
  CONSTRAINT `fk_produto_has_ingrediente_produto1`
    FOREIGN KEY (`FK_idproduto`)
    REFERENCES `franquia`.`produto` (`idproduto`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_has_ingrediente_ingrediente1`
    FOREIGN KEY (`FK_idingrediente`)
    REFERENCES `franquia`.`ingrediente` (`idingrediente`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`contato_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`contato_cliente` (
  `FK_idcliente` INT NOT NULL,
  `telefone_cliente` CHAR(13) NOT NULL,
  PRIMARY KEY (`FK_idcliente`),
  CONSTRAINT `FK_idcliente`
    FOREIGN KEY (`FK_idcliente`)
    REFERENCES `franquia`.`cliente` (`idcliente`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `franquia`.`contato_restaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `franquia`.`contato_restaurante` (
  `FK_idrestaurante` INT NOT NULL,
  `telefone_restaurante` CHAR(13) NOT NULL,
  PRIMARY KEY (`FK_idrestaurante`),
  CONSTRAINT `fk_contato_restaurante_1`
    FOREIGN KEY (`FK_idrestaurante`)
    REFERENCES `franquia`.`restaurante` (`idrestaurante`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
