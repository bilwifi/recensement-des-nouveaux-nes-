-- MySQL Script generated by MySQL Workbench
-- m5. 25 apl 2019 15:33:26 WAT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema izambadb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema izambadb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `izambadb` DEFAULT CHARACTER SET utf8 ;
USE `izambadb` ;

-- -----------------------------------------------------
-- Table `izambadb`.`communes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`communes` (
  `idcommune` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  PRIMARY KEY (`idcommune`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`quartiers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`quartiers` (
  `idquartier` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  `idcommune` INT NULL,
  PRIMARY KEY (`idquartier`),
  INDEX `fk_quartiers_communes1_idx` (`idcommune` ASC),
  CONSTRAINT `fk_quartiers_communes1`
    FOREIGN KEY (`idcommune`)
    REFERENCES `izambadb`.`communes` (`idcommune`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`avenues`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`avenues` (
  `idavenue` INT NOT NULL AUTO_INCREMENT,
  `lib` VARCHAR(45) NULL,
  `idquartier` INT NULL,
  PRIMARY KEY (`idavenue`),
  INDEX `fk_avenues_quartiers_idx` (`idquartier` ASC),
  CONSTRAINT `fk_avenues_quartiers`
    FOREIGN KEY (`idquartier`)
    REFERENCES `izambadb`.`quartiers` (`idquartier`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`adresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`adresses` (
  `idadresse` INT NOT NULL AUTO_INCREMENT,
  `num` VARCHAR(10) NULL,
  `idavenue` INT NULL,
  PRIMARY KEY (`idadresse`),
  INDEX `fk_adresses_avenues1_idx` (`idavenue` ASC),
  CONSTRAINT `fk_adresses_avenues1`
    FOREIGN KEY (`idavenue`)
    REFERENCES `izambadb`.`avenues` (`idavenue`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`personnes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`personnes` (
  `idpersonne` INT NOT NULL AUTO_INCREMENT,
  `numeronIdent` VARCHAR(45) NULL,
  `nom` VARCHAR(45) NOT NULL,
  `postnom` VARCHAR(45) NULL,
  `prenom` VARCHAR(45) NULL,
  `lieuNaissance` VARCHAR(45) NULL,
  `dateNaissance` DATE NULL,
  `idadresse` INT NULL,
  ` telephone` VARCHAR(45) NULL,
  `profession` VARCHAR(45) NULL,
  `nationalite` VARCHAR(45) NULL,
  PRIMARY KEY (`idpersonne`),
  INDEX `fk_personnes_adresses1_idx` (`idadresse` ASC),
  CONSTRAINT `fk_personnes_adresses1`
    FOREIGN KEY (`idadresse`)
    REFERENCES `izambadb`.`adresses` (`idadresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`etablissements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`etablissements` (
  `idetablissement` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NULL,
  `abbr` VARCHAR(45) NULL,
  `idadresse` INT NULL,
  `slug` VARCHAR(45) NULL,
  PRIMARY KEY (`idetablissement`),
  INDEX `fk_etablissements_adresses1_idx` (`idadresse` ASC),
  CONSTRAINT `fk_etablissements_adresses1`
    FOREIGN KEY (`idadresse`)
    REFERENCES `izambadb`.`adresses` (`idadresse`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`roles` (
  `idrole` INT NOT NULL AUTO_INCREMENT,
  `lib` VARCHAR(45) NULL,
  `level` INT NULL,
  PRIMARY KEY (`idrole`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`users_etablissements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`users_etablissements` (
  `idusersetablissement` INT NOT NULL AUTO_INCREMENT,
  `idpersonne` INT NULL,
  `pseudo` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `idrole` INT NULL,
  PRIMARY KEY (`idusersetablissement`),
  INDEX `fk_users_etablissements_personnes1_idx` (`idpersonne` ASC),
  INDEX `fk_users_etablissements_roles1_idx` (`idrole` ASC),
  CONSTRAINT `fk_users_etablissements_personnes1`
    FOREIGN KEY (`idpersonne`)
    REFERENCES `izambadb`.`personnes` (`idpersonne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_etablissements_roles1`
    FOREIGN KEY (`idrole`)
    REFERENCES `izambadb`.`roles` (`idrole`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`declarations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`declarations` (
  `iddeclaration` INT NOT NULL AUTO_INCREMENT,
  `idpere` INT NULL,
  `idmere` INT NULL,
  `idenfant` INT NOT NULL,
  `iddeclarant` INT NULL,
  `cituation_matrimonial_parent` VARCHAR(45) NULL,
  `cituation_amoureuse_parent` VARCHAR(45) NULL,
  PRIMARY KEY (`iddeclaration`),
  INDEX `fk_declarations_personnes1_idx` (`idpere` ASC),
  INDEX `fk_declarations_personnes2_idx` (`idmere` ASC),
  INDEX `fk_declarations_personnes3_idx` (`idenfant` ASC),
  INDEX `fk_declarations_personnes4_idx` (`iddeclarant` ASC),
  CONSTRAINT `fk_declarations_personnes1`
    FOREIGN KEY (`idpere`)
    REFERENCES `izambadb`.`personnes` (`idpersonne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_declarations_personnes2`
    FOREIGN KEY (`idmere`)
    REFERENCES `izambadb`.`personnes` (`idpersonne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_declarations_personnes3`
    FOREIGN KEY (`idenfant`)
    REFERENCES `izambadb`.`personnes` (`idpersonne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_declarations_personnes4`
    FOREIGN KEY (`iddeclarant`)
    REFERENCES `izambadb`.`personnes` (`idpersonne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `izambadb`.`agents_communes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `izambadb`.`agents_communes` (
  `idagents_commune` INT NOT NULL AUTO_INCREMENT,
  `idpersonne` INT NULL,
  `idcommune` INT NULL,
  `pseudo` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`idagents_commune`),
  INDEX `fk_agents_communes_communes1_idx` (`idcommune` ASC),
  INDEX `fk_agents_communes_personnes1_idx` (`idpersonne` ASC),
  CONSTRAINT `fk_agents_communes_communes1`
    FOREIGN KEY (`idcommune`)
    REFERENCES `izambadb`.`communes` (`idcommune`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agents_communes_personnes1`
    FOREIGN KEY (`idpersonne`)
    REFERENCES `izambadb`.`personnes` (`idpersonne`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
