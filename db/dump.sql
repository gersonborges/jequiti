-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ecommerce` ;

-- -----------------------------------------------------
-- Schema ecommerce
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 ;
USE `ecommerce` ;

-- -----------------------------------------------------
-- Table `ecommerce`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`fornecedor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(14) NULL,
  `razao_social` VARCHAR(45) NULL,
  `nome_fantasia` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC),
  UNIQUE INDEX `razao_social_UNIQUE` (`razao_social` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ecommerce`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `codigo_barras` VARCHAR(13) NULL,
  `nome` VARCHAR(45) NULL,
  `preco_compra` REAL NULL,
  `preco_venda` REAL NULL,
  `quantidade_estoque` INT NULL,
  `volume` REAL NULL,
  `unidade_medida` VARCHAR(45) NULL,
  `categoria_id` INT NOT NULL,
  `fornecedor_id` INT NOT NULL,
  `foto` VARCHAR(80) NULL,
  PRIMARY KEY (`id`, `categoria_id`, `fornecedor_id`),
  UNIQUE INDEX `codigo_barras_UNIQUE` (`codigo_barras` ASC),
  INDEX `fk_produto_categoria_idx` (`categoria_id` ASC),
  INDEX `fk_produto_fornecedor1_idx` (`fornecedor_id` ASC),
  CONSTRAINT `fk_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `ecommerce`.`categoria` (`id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_fornecedor`
    FOREIGN KEY (`fornecedor_id`)
    REFERENCES `ecommerce`.`fornecedor` (`id`)
    ON DELETE CASCADE
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

USE `ecommerce` ;

-- -----------------------------------------------------
-- Placeholder table for view `ecommerce`.`ver_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ecommerce`.`ver_produto` (`id` INT, `codigo_barras` INT, `nome` INT, `preco_compra` INT, `preco_venda` INT, `quantidade_estoque` INT, `volume` INT, `unidade_medida` INT, `foto` INT, `categoria_id` INT, `categoria_nome` INT, `fornecedor_id` INT, `cnpj` INT, `razao_social` INT, `fornecedor_nome` INT, `nome_fantasia` INT);

-- -----------------------------------------------------
-- procedure inserir
-- -----------------------------------------------------

DELIMITER $$
USE `ecommerce`$$
CREATE PROCEDURE inserir()
BEGIN
INSERT INTO `categoria` (`id`, `nome`) VALUES
(NULL, 'Bebidas');

INSERT INTO `fornecedor` (`id`, `cnpj`, `razao_social`, `nome_fantasia`) VALUES
(NULL, '45997418000153', 'Coca Cola Industrias Ltda', 'Coca-Cola');

INSERT INTO `produto` (`id`, `codigo_barras`, `nome`, `preco_compra`, `preco_venda`, `quantidade_estoque`, `volume`, `unidade_medida`, `categoria_id`, `fornecedor_id`) VALUES
(NULL, '7894900700046', 'Refrigerante Coca Cola Lata 350ml', 3.2, 4.5, 12, 335, 'ml', 1, 1),
(NULL, '7894900011517', 'Refrigerante Coca Cola Pet 2l', 8.35, 11, 12, 2, 'litros', 1, 1);
END$$

DELIMITER ;

-- -----------------------------------------------------
-- View `ecommerce`.`ver_produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ecommerce`.`ver_produto`;
USE `ecommerce`;
CREATE  OR REPLACE VIEW `ver_produto` AS
select 
  p.id,
  p.codigo_barras,
  p.nome,
  p.preco_compra,
  p.preco_venda,
  p.quantidade_estoque,
  p.volume,
  p.unidade_medida,
  p.foto,
  p.categoria_id,
  c.nome AS categoria_nome,
  p.fornecedor_id,
  f.cnpj,
  f.razao_social,
  f.razao_social AS fornecedor_nome,
  f.nome_fantasia
  
  from produto p 
  join categoria c on c.id = p.categoria_id 
  join fornecedor f on f.id = p.fornecedor_id;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
