-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema abmr
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `abmr` ;

-- -----------------------------------------------------
-- Schema abmr
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `abmr` DEFAULT CHARACTER SET utf8 ;
USE `abmr` ;

-- -----------------------------------------------------
-- Table `abmr`.`sexo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`sexo` ;

CREATE TABLE IF NOT EXISTS `abmr`.`sexo` (
  `idsexo` INT NOT NULL,
  `sexo` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`idsexo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `abmr`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`usuario` ;

CREATE TABLE IF NOT EXISTS `abmr`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(128) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `idsexo` INT NULL,
  `foto_usuario` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuarios_sexo1_idx` (`idsexo` ASC),
  CONSTRAINT `fk_usuarios_sexo1`
    FOREIGN KEY (`idsexo`)
    REFERENCES `abmr`.`sexo` (`idsexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `abmr`.`imovel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`imovel` ;

CREATE TABLE IF NOT EXISTS `abmr`.`imovel` (
  `idimovel` INT NOT NULL AUTO_INCREMENT,
  `latitude` DOUBLE NOT NULL,
  `longitude` DOUBLE NOT NULL,
  `cep` INT NOT NULL,
  `logradouro` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NULL,
  `bloco` VARCHAR(5) NULL,
  `numero_apartamento` VARCHAR(5) NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(20) NOT NULL,
  `estado` VARCHAR(30) NOT NULL,
  `idproprietario` INT NULL,
  `foto_imovel` VARCHAR(45) NULL,
  PRIMARY KEY (`idimovel`),
  INDEX `fk_imoveis_usuarios1_idx` (`idproprietario` ASC),
  CONSTRAINT `fk_imoveis_usuarios1`
    FOREIGN KEY (`idproprietario`)
    REFERENCES `abmr`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `abmr`.`avaliacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`avaliacao` ;

CREATE TABLE IF NOT EXISTS `abmr`.`avaliacao` (
  `idavaliacao` INT NOT NULL AUTO_INCREMENT,
  `avaliacao_textual` VARCHAR(140) NULL,
  `nota_geral` INT NULL,
  `quantidade_curtidas` INT NULL,
  `foi_morador` VARCHAR(1) NOT NULL,
  `idusuario` INT NOT NULL,
  `idimovel` INT NOT NULL,
  `data_avaliacao` DATE NULL,
  PRIMARY KEY (`idavaliacao`, `idusuario`, `idimovel`),
  INDEX `fk_avaliacoes_usuarios1_idx` (`idusuario` ASC),
  INDEX `fk_avaliacoes_imoveis1_idx` (`idimovel` ASC),
  CONSTRAINT `fk_avaliacoes_usuarios1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `abmr`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliacoes_imoveis1`
    FOREIGN KEY (`idimovel`)
    REFERENCES `abmr`.`imovel` (`idimovel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `abmr`.`itens_avaliacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`itens_avaliacao` ;

CREATE TABLE IF NOT EXISTS `abmr`.`itens_avaliacao` (
  `iditens_avaliacao` INT NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`iditens_avaliacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `abmr`.`notas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`notas` ;

CREATE TABLE IF NOT EXISTS `abmr`.`notas` (
  `valor_nota` INT NOT NULL,
  `idavaliacao` INT NOT NULL,
  `iditens_avaliacao` INT NOT NULL,
  PRIMARY KEY (`idavaliacao`, `iditens_avaliacao`),
  INDEX `fk_notas_itens_avaliacao1_idx` (`iditens_avaliacao` ASC),
  CONSTRAINT `fk_notas_itens_avaliacao1`
    FOREIGN KEY (`iditens_avaliacao`)
    REFERENCES `abmr`.`itens_avaliacao` (`iditens_avaliacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_notas_avaliacoes1`
    FOREIGN KEY (`idavaliacao`)
    REFERENCES `abmr`.`avaliacao` (`idavaliacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `abmr`.`comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `abmr`.`comentario` ;

CREATE TABLE IF NOT EXISTS `abmr`.`comentario` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `idavaliacao` INT NOT NULL,
  `idusuario` INT NOT NULL,
  `comentario` VARCHAR(250) NULL,
  `idresponde_comentario` INT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_comentario_comentario1_idx` (`idresponde_comentario` ASC),
  INDEX `fk_comentario_usuario1_idx` (`idusuario` ASC),
  INDEX `fk_comentario_avaliacao1_idx` (`idavaliacao` ASC),
  CONSTRAINT `fk_comentario_comentario1`
    FOREIGN KEY (`idresponde_comentario`)
    REFERENCES `abmr`.`comentario` (`idcomentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `abmr`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_avaliacao1`
    FOREIGN KEY (`idavaliacao`)
    REFERENCES `abmr`.`avaliacao` (`idavaliacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `abmr`.`sexo`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `abmr`.`sexo` (`idsexo`, `sexo`) VALUES (1, 'Masculino');
INSERT INTO `abmr`.`sexo` (`idsexo`, `sexo`) VALUES (2, 'Feminino');
INSERT INTO `abmr`.`sexo` (`idsexo`, `sexo`) VALUES (3, 'Outros');

COMMIT;


-- -----------------------------------------------------
-- Data for table `abmr`.`itens_avaliacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `abmr`.`itens_avaliacao` (`iditens_avaliacao`, `descricao`) VALUES (1, 'Conservação do Imóvel');
INSERT INTO `abmr`.`itens_avaliacao` (`iditens_avaliacao`, `descricao`) VALUES (2, 'Isolamento Acústico');
INSERT INTO `abmr`.`itens_avaliacao` (`iditens_avaliacao`, `descricao`) VALUES (3, 'Umidade, posição solar e ventilação');
INSERT INTO `abmr`.`itens_avaliacao` (`iditens_avaliacao`, `descricao`) VALUES (4, 'Custo-benefício de aluguel e condomínio');
INSERT INTO `abmr`.`itens_avaliacao` (`iditens_avaliacao`, `descricao`) VALUES (5, 'Contato com o proprietário ou imobiliária');
INSERT INTO `abmr`.`itens_avaliacao` (`iditens_avaliacao`, `descricao`) VALUES (6, 'Avaliação Geral');

COMMIT;

-- -----------------------------------------------------
-- Data for table `abmr`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `abmr`.`usuario` (`nome`, `email`, `senha`, `data_cadastro`, `data_nasc`, `cidade`, `idsexo`, `foto_usuario`) VALUES ('Bruno', 'bruno@abmr.com.br', 'devBruno', '2021-02-02', '1987-02-02', 'Florianópolis', 1, 'brunito.png');
INSERT INTO `abmr`.`usuario` (`nome`, `email`, `senha`, `data_cadastro`, `data_nasc`, `cidade`, `idsexo`, `foto_usuario`) VALUES ('Marlon', 'marlon@abmr.com.br', 'devMarlon', '2021-03-03', '1998-03-03', 'Joinville', 1, 'marlonwhats.png');
INSERT INTO `abmr`.`usuario` (`nome`, `email`, `senha`, `data_cadastro`, `data_nasc`, `cidade`, `idsexo`, `foto_usuario`) VALUES ('Raquel', 'raquel@abmr.com.br', 'devRaquel', '2021-04-04', '1990-04-04', 'Florianópolis', 2, 'rachella.png');

COMMIT;

-- -----------------------------------------------------
-- Data for table `abmr`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `abmr`;
INSERT INTO `usuario` (`nome`, `email`, `senha`, `data_cadastro`, `data_nasc`, `cidade`, `idsexo`, `foto_usuario`) VALUES
('Ademir Borges Neto', 'neto_borges55@gmail.com', 'hf54562', '2022-01-17', '1969-03-25', 'Florianópolis', 1, NULL),
('Jaqueline Andrea Palhano da Silva', 'jaque.sbt.19@hotmail.com', 'jaqueline17', '2022-03-08', '1975-01-09', 'Fraiburgo', 2, NULL),
('Ruth Cornellis Rosa', 'ruth.cornellis@hotmail.com', 'pl3735?', '2022-02-13', '1971-12-02', 'Medianeira', 2, NULL),
('Larissa Nunes', 'lari_nunes2@gmail.com', 'gales1234', '2022-03-06', '1992-07-01', 'Florianópolis', 2, NULL),
('Julio Matheus de Melo', 'julio_melo@hotmail.com', 'melojulio441', '2022-02-20', '1998-05-28', 'São José', 1, NULL);