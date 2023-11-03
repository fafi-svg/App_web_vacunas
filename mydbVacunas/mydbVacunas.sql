-- MySQL Workbench Forward Engineering
drop database if exists mydbVacunas;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydbVacunas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydbVacunas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydbVacunas` DEFAULT CHARACTER SET utf8 ;
USE `mydbVacunas` ;

-- -----------------------------------------------------
-- Table `mydbVacunas`.`TamañosMascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`tamanosmascota` (
  `id` INT NOT NULL,
  `tamano` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`tipomascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`tipomascota` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL,
  `EdadEquivalenteInfante` INT NULL DEFAULT NULL,
  `EdadEquivalenteJoven` INT NULL DEFAULT NULL,
  `EdadEquivalenteAdolecente` INT NULL DEFAULT NULL,
  `EdadAdulto` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`raza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`raza` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NULL DEFAULT NULL,
  `TipoMascota_id` INT NOT NULL,
  `TamanoMascota_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Raza_TipoMascota_idx` (`TipoMascota_id` ASC) VISIBLE,
  INDEX `fk_raza_TamanosMascota1_idx` (`TamanoMascota_id` ASC) VISIBLE,
  CONSTRAINT `fk_raza_TamanosMascota1`
    FOREIGN KEY (`TamanoMascota_id`)
    REFERENCES `mydbvacunas`.`tamanosmascota` (`id`),
  CONSTRAINT `fk_Raza_TipoMascota`
    FOREIGN KEY (`TipoMascota_id`)
    REFERENCES `mydbvacunas`.`tipomascota` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 50
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`role` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `username` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(200) NULL DEFAULT NULL,
  `Role_id` INT NOT NULL,
  `foto` BLOB NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username` ASC) VISIBLE,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_User_Role1_idx` (`Role_id` ASC) VISIBLE,
  CONSTRAINT `fk_User_Role1`
    FOREIGN KEY (`Role_id`)
    REFERENCES `mydbvacunas`.`role` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`mascota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`mascota` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(150) NULL DEFAULT NULL,
  `FechaNacimiento` DATETIME NULL DEFAULT NULL,
  `foto` BLOB NULL DEFAULT NULL,
  `User_id` INT NOT NULL,
  `TipoMascota_id` INT NOT NULL,
  `Raza_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Mascota_User1_idx` (`User_id` ASC) VISIBLE,
  INDEX `fk_Mascota_TipoMascota1_idx` (`TipoMascota_id` ASC) VISIBLE,
  INDEX `fk_Mascota_Raza1_idx` (`Raza_id` ASC) VISIBLE,
  CONSTRAINT `fk_Mascota_Raza1`
    FOREIGN KEY (`Raza_id`)
    REFERENCES `mydbvacunas`.`raza` (`id`),
  CONSTRAINT `fk_Mascota_TipoMascota1`
    FOREIGN KEY (`TipoMascota_id`)
    REFERENCES `mydbvacunas`.`tipomascota` (`id`),
  CONSTRAINT `fk_Mascota_User1`
    FOREIGN KEY (`User_id`)
    REFERENCES `mydbvacunas`.`user` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`vacuna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`vacunas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `aplicacion` VARCHAR(45) NULL,
  `tipomascota_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_vacunas_tipomascota1_idx` (`tipomascota_id` ASC) VISIBLE,
  CONSTRAINT `fk_vacunas_tipomascota1`
    FOREIGN KEY (`tipomascota_id`)
    REFERENCES `mydbvacunas`.`tipomascota` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `mydbvacunas`.`controlvacuna`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydbvacunas`.`controlvacunas` (
  `Mascota_id` INT NOT NULL,
  `Vacuna_id` INT NOT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`Mascota_id`, `Vacuna_id`),
  INDEX `fk_Mascota_has_Vacuna_Vacuna1_idx` (`Vacuna_id` ASC) VISIBLE,
  INDEX `fk_Mascota_has_Vacuna_Mascota1_idx` (`Mascota_id` ASC) VISIBLE,
  CONSTRAINT `fk_Mascota_has_Vacuna_Mascota1`
    FOREIGN KEY (`Mascota_id`)
    REFERENCES `mydbvacunas`.`mascota` (`id`),
  CONSTRAINT `fk_Mascota_has_Vacuna_Vacuna1`
    FOREIGN KEY (`Vacuna_id`)
    REFERENCES `mydbvacunas`.`vacunas` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

insert into Role values('2','admin'), ('1','user');
insert into User values('2','fafi','user','examle2@correo.com','$2y$10$ekpW/Y2KnXXMwaVUXveU3.HyV1m.VhT/KD6mDgYzKX2Pw1OAEZ4MG','1','null'),('1','rafael','admin','examle3@correo.com','$2y$10$2GKBB5QXkAypiof4drhwpOJ.zur4njTdpq01Iq0Soec7dP7A5MAQW','2','null'),('3', 'Ricardo', 'UseR-1', 'example4@correo.com', '$2y$10$INUrk34z0.OzzwAu25XvceLGwXw0q3ORKH4WBss9kXfF.W2O8rDpm', '1', 'null');
insert into TipoMascota (id,nombre, EdadEquivalenteInfante, EdadEquivalenteJoven, EdadEquivalenteAdolecente, EdadAdulto) value('1','gato','2','5','8','10'), ('2','perro','3','6','12','18');
insert into TamanosMascota value('1','mini'),('2','pequeno'),('3','mediano'),('4','grande'),('5','gigante');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values('Papillón','2','1'),('Spitz Japonés Mini','2','1');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values('Chihuahua','2','2'),('Jack Russel Terrier','2','2'),('Fox Terrier','2','2'),('Pomerania','2','2'),('Bichón maltés','2','2'),('Beagle','2','2'),('Caniche','2','2'), ('Bulldog Francés','2','2'),('Corgi','2','2'),('Schnauzer','2','2'),('Shih tzu','2','2'), ('Jack Russell Terrier','2','2');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values('Border Collie','2','3'),('Boxer','2','3'),('Cocker Spaniel Inglés','2','3'),('Setter Irlandés','2','3'),('Shiba Inu','2','3'),('Labradoodle','2','3'),('Shar pei','2','3'),('Podenco andaluz','2','3'), ('Bull Terrier','2','3'),('Podenco','2','3'), ('Spaniel bretón','2','3');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values('Braco de Weimar','2','4'),('Pastor alemán','2','4'),('Setter inglés','2','4'),('Bullmastiff','2','4'),('San Bernardo','2','4'),('Gran Danés','2','4'),('Mastín Inglés','2','4'),('Bobtail','2','4'),('Dálmata','2','4'),('Mastín italiano','2','4'),('Dogo argentino','2','4'),('Pitbull','2','4'),('Rottweiler','2','4'),('Akita Inu','2','4') ,('Mastín del Pirineo','2','4'),('Boyero de Berna','2','4'),('Samoyedo','2','4'),('Mastín español','2','4') ,('Malamute de Alaska','2','4'),('Boyero de Berna','2','4'),('Galgo','2','4'),('Labrador','2','4') ,('Bloodhound','2','4'),('Boyero de Berna','2','4');
insert into Vacunas (id,nombre, tipomascota_id, Aplicacion) value('1','Parvovirosis','2','45'),('2','Pentavalente ','2','60'),('3','Pentavalente + coronavirus','2','75'),('4','Pentavalente + coronavirus','2','90 '),('5','Rabia ','2','120'),('6','Tos de perreras','2','0'),('7','Polivalente ','2','180'),('8','Triple felina','1','90'),('9','Triple felina','1','195'),('10','Rabia','1','135 '),('11','Leucemia ','1','150'),('12','Triple felina','1','365'),('13','Leucemia ','1','0'),('14','Rabia ','1','365');
select * from Vacunas ;
-- select count(id) from Vacunas ;
SELECT v.id as ID, v.nombre as 'Nombre Vacuna', v.aplicacion as 'Dias Aplicacion', v.tipomascota_id as 'Tipo Mascota', count(c.vacuna_id) as count FROM vacunas as v 
left join controlvacunas as c
on c.vacuna_id = v.id
group by  v.id , v.nombre,  v.aplicacion , v.tipomascota_id;
-- select * from User where username = 'user3';
-- DELETE FROM User WHERE id = 2;
-- insert into User values('3','fafi','UseR-2','examle4@correo.com','$2y$10$ekpW/Y2KnXXMwaVUXveU3.HyV1m.VhT/KD6mDgYzKX2Pw1OAEZ4MG','1','null');
-- select * from user where username like binary "%UseR-2%";