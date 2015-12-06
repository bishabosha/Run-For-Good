-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema runforgood
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema runforgood
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `runforgood` DEFAULT CHARACTER SET latin1 ;
USE `runforgood` ;

-- -----------------------------------------------------
-- Table `runforgood`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`event` (
  `Eid` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Name` VARCHAR(100) NOT NULL COMMENT '',
  `Location` VARCHAR(100) NOT NULL COMMENT '',
  `Date` VARCHAR(8) NOT NULL COMMENT '',
  `Length` DOUBLE NOT NULL COMMENT '',
  `Pic` LONGTEXT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`Eid`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`hero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`hero` (
  `Hid` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Name` VARCHAR(100) NOT NULL COMMENT '',
  `Surame` VARCHAR(100) NOT NULL COMMENT '',
  `DateOfBirth` VARCHAR(8) NOT NULL COMMENT '',
  `Bio` VARCHAR(250) NULL DEFAULT NULL COMMENT '',
  `Pic` LONGTEXT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`Hid`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`runnerstarter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`runnerstarter` (
  `RSid` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Name` VARCHAR(100) NOT NULL COMMENT '',
  `Surname` VARCHAR(100) NOT NULL COMMENT '',
  `DateOfBirth` VARCHAR(8) NOT NULL COMMENT '',
  `Email` VARCHAR(250) NOT NULL COMMENT '',
  `Pic` LONGTEXT NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`RSid`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`step`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`step` (
  `Sid` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `HeroId` INT(11) NOT NULL COMMENT '',
  `EventId` INT(11) NOT NULL COMMENT '',
  `Timestamp` VARCHAR(17) NOT NULL COMMENT '',
  `Distance` DOUBLE NOT NULL COMMENT '',
  `Hr` DOUBLE NOT NULL COMMENT '',
  PRIMARY KEY (`Sid`)  COMMENT '',
  INDEX `HeroStep_idx` (`HeroId` ASC)  COMMENT '',
  INDEX `Eventstep_idx` (`EventId` ASC)  COMMENT '',
  CONSTRAINT `Eventstep`
    FOREIGN KEY (`EventId`)
    REFERENCES `runforgood`.`event` (`Eid`)
    ON UPDATE CASCADE,
  CONSTRAINT `HeroStep`
    FOREIGN KEY (`HeroId`)
    REFERENCES `runforgood`.`hero` (`Hid`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`supporttype`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`supporttype` (
  `SUPid` INT(11) NOT NULL COMMENT '',
  `Name` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`SUPid`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`support`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`support` (
  `SUid` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Amount` VARCHAR(45) NOT NULL COMMENT '',
  `Messagge` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `Date` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `GameId` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `TargetDuration` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `TargetLength` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `TargetHr` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `RunnerStarterId` INT(11) NOT NULL COMMENT '',
  `HeroID` INT(11) NOT NULL COMMENT '',
  `EventID` INT(11) NULL DEFAULT NULL COMMENT '',
  `FromMile` DOUBLE NULL DEFAULT NULL COMMENT '',
  `ToMile` DOUBLE NULL DEFAULT NULL COMMENT '',
  `SupportType` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`SUid`)  COMMENT '',
  INDEX `Supporter_idx` (`RunnerStarterId` ASC)  COMMENT '',
  INDEX `Supported_idx` (`HeroID` ASC)  COMMENT '',
  INDEX `Supporting_idx` (`EventID` ASC)  COMMENT '',
  INDEX `Type_idx` (`SupportType` ASC)  COMMENT '',
  CONSTRAINT `Supported`
    FOREIGN KEY (`HeroID`)
    REFERENCES `runforgood`.`hero` (`Hid`)
    ON UPDATE CASCADE,
  CONSTRAINT `Supporter`
    FOREIGN KEY (`RunnerStarterId`)
    REFERENCES `runforgood`.`runnerstarter` (`RSid`)
    ON UPDATE CASCADE,
  CONSTRAINT `Supporting`
    FOREIGN KEY (`EventID`)
    REFERENCES `runforgood`.`event` (`Eid`)
    ON UPDATE CASCADE,
  CONSTRAINT `Type`
    FOREIGN KEY (`SupportType`)
    REFERENCES `runforgood`.`supporttype` (`SUPid`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`takespart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`takespart` (
  `Tid` INT(11) NOT NULL COMMENT '',
  `HeroId` INT(11) NOT NULL COMMENT '',
  `EventId` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`Tid`)  COMMENT '',
  INDEX `herotakes_idx` (`HeroId` ASC)  COMMENT '',
  INDEX `Eventtaken_idx` (`EventId` ASC)  COMMENT '',
  CONSTRAINT `Eventtaken`
    FOREIGN KEY (`EventId`)
    REFERENCES `runforgood`.`event` (`Eid`)
    ON UPDATE CASCADE,
  CONSTRAINT `herotakes`
    FOREIGN KEY (`HeroId`)
    REFERENCES `runforgood`.`hero` (`Hid`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `runforgood`.`train`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `runforgood`.`train` (
  `Tid` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `Date` VARCHAR(8) NOT NULL COMMENT '',
  `Duration` DOUBLE NOT NULL COMMENT '',
  `Length` DOUBLE NOT NULL COMMENT '',
  `AvgHr` DOUBLE NOT NULL COMMENT '',
  `HeroId` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`Tid`)  COMMENT '',
  INDEX `Does_idx` (`HeroId` ASC)  COMMENT '',
  CONSTRAINT `Does`
    FOREIGN KEY (`HeroId`)
    REFERENCES `runforgood`.`hero` (`Hid`)
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
