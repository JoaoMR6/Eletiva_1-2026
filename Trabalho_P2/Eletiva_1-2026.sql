-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema locadora_carros
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `locadora_carros` DEFAULT CHARACTER SET utf8 ;
USE `locadora_carros` ;

-- -----------------------------------------------------
-- Table `locadora_carros`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora_carros`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(14) NULL,   -- Agora aceita nulo caso seja uma empresa
  `cnpj` VARCHAR(18) NULL,  -- Nova coluna CNPJ adicionada!
  `telefone` VARCHAR(20) NULL,
  `email` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora_carros`.`veiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora_carros`.`veiculos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(100) NOT NULL,
  `modelo` VARCHAR(100) NOT NULL,
  `placa` VARCHAR(10) NOT NULL,
  `ano` INT NOT NULL,
  `valor_carro` DECIMAL(10,2) NOT NULL,
  `status` ENUM('disponivel', 'alugado', 'manutencao') NOT NULL DEFAULT 'disponivel',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `placa_UNIQUE` (`placa` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora_carros`.`contratos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora_carros`.`contratos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` ENUM('diaria', 'semanal', 'mensal') NOT NULL,
  `valor_base` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `locadora_carros`.`alugueis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `locadora_carros`.`alugueis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `valor_total` DECIMAL(10,2) NULL, 
  `cliente_id` INT NOT NULL,
  `veiculo_id` INT NOT NULL,
  `contrato_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_aluguel_cliente_idx` (`cliente_id` ASC),
  INDEX `fk_aluguel_veiculo_idx` (`veiculo_id` ASC),
  INDEX `fk_aluguel_contrato_idx` (`contrato_id` ASC),
  CONSTRAINT `fk_aluguel_cliente`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `locadora_carros`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluguel_veiculo`
    FOREIGN KEY (`veiculo_id`)
    REFERENCES `locadora_carros`.`veiculos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aluguel_contrato`
    FOREIGN KEY (`contrato_id`)
    REFERENCES `locadora_carros`.`contratos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;