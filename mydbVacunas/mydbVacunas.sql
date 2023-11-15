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
  `id` INT NOT NULL auto_increment,
  `nombre` VARCHAR(150) NULL DEFAULT NULL,
  `FechaNacimiento` DATE NULL DEFAULT NULL,
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
insert into User values('2','fafi','user','examle2@correo.com','$2y$10$ekpW/Y2KnXXMwaVUXveU3.HyV1m.VhT/KD6mDgYzKX2Pw1OAEZ4MG','1','null'),('1','rafael','admin','examle3@correo.com','$2y$10$2GKBB5QXkAypiof4drhwpOJ.zur4njTdpq01Iq0Soec7dP7A5MAQW','2','null'),('3', 'Ricardo', 'UseR-1', 'example4@correo.com', '$2y$10$INUrk34z0.OzzwAu25XvceLGwXw0q3ORKH4WBss9kXfF.W2O8rDpm', '1', 'null'),('4', 'Ricardo', 'admin-2', 'example5@correo.com', '$2y$10$INUrk34z0.OzzwAu25XvceLGwXw0q3ORKH4WBss9kXfF.W2O8rDpm', '2', 'null');
insert into TipoMascota (id,nombre, EdadEquivalenteInfante, EdadEquivalenteJoven, EdadEquivalenteAdolecente, EdadAdulto) value('1','gato','2','5','8','10'), ('2','perro','3','6','12','18');
insert into TamanosMascota value('1','mini'),('2','pequeno'),('3','mediano'),('4','grande'),('5','gigante');
-- -----------------------------------------------------------------------------##
-- Razas Perros
-- -----------------------------------------------------------------------------##
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('1','Papillón','2','1'),('2','Spitz Japonés Mini','2','1');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('3','Chihuahua','2','2'),('4','Jack Russel Terrier','2','2'),('5','Fox Terrier','2','2'),('6','Pomerania','2','2'),('7','Bichón maltés','2','2'),('8','Beagle','2','2'),('9','Caniche','2','2'), ('10','Bulldog Francés','2','2'),('11','Corgi','2','2'),('12','Schnauzer','2','2');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('13','Shih tzu','2','2'), ('14','Jack Russell Terrier','2','2');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('15','Border Collie','2','3'),('16','Boxer','2','3'),('17','Cocker Spaniel Inglés','2','3'),('18','Setter Irlandés','2','3'),('19','Shiba Inu','2','3'),('20','Labradoodle','2','3'),('21','Shar pei','2','3'),('22','Podenco andaluz','2','3'), ('23','Bull Terrier','2','3');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('24','Podenco','2','3'), ('25','Spaniel bretón','2','3');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('26','Braco de Weimar','2','4'),('27','Pastor alemán','2','4'),('28','Setter inglés','2','4'),('29','Bullmastiff','2','4'),('30','San Bernardo','2','4'),('31','Gran Danés','2','4'),('32','Mastín Inglés','2','4'),('33','Bobtail','2','4'),('34','Dálmata','2','4');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('35','Mastín italiano','2','4'),('36','Dogo argentino','2','4'),('37','Pitbull','2','4'),('38','Rottweiler','2','4'),('39','Akita Inu','2','4') ,('40','Mastín del Pirineo','2','4'),('41','Boyero de Berna','2','4'),('42','Samoyedo','2','4'),('43','Mastín español','2','4');
insert into raza (id, nombre, TipoMascota_id, TamanoMascota_id) values ('44','Malamute de Alaska','2','4'),('45','Boyero de Berna','2','4'),('46','Galgo','2','4'),('47','Labrador','2','4') ,('48','Bloodhound','2','4'),('49','Boyero de Berna','2','4');
insert into Vacunas (id,nombre, tipomascota_id, Aplicacion) values ('1','Parvovirosis','2','45'),('2','Pentavalente ','2','60'),('3','Pentavalente + coronavirus','2','75'),('4','Pentavalente + coronavirus','2','90 '),('5','Rabia ','2','120'),('6','Tos de perreras','2','0');
insert into Vacunas (id,nombre, tipomascota_id, Aplicacion) values ('7','Polivalente ','2','180'),('8','Triple felina','1','90'),('9','Triple felina','1','195'),('10','Rabia','1','135 '),('11','Leucemia ','1','150'),('12','Triple felina','1','365'),('13','Leucemia ','1','0'),('14','Rabia ','1','365');
-- -----------------------------------------------------------------------------##
-- Razas Gatos
-- -----------------------------------------------------------------------------##
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values ('Abisinio','1','3'),('Americano de pelo duro','1','4'),('Asiático','1','4'),('Azul ruso','1','4'),('Balinés','1','3'),('Bengalí','1','4'),('Birmano','1','3'),('Bobtail japonés de pelo corto','1','2');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values ('Bobtail japonés de pelo largo','1','3'),('Bombay','1','3'),('Bosque de Noruega','1','3'),('Bosque de Siberia','1','4'),('Británico de pelo corto','1','4'),('Burmés','1','3'),('Burmilla','1','3'),('Chinchilla','1','3');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values ('Cornish rex','1','3'),('Cymric','1','4'),('Devon Rex','1','2'),('Exótico de pelo corto','1','3'),('Fold escocés','1','3'),('Khao Manee','1','3'),('Korat','1','3'),('Laperm','1','3'),('Maine coon','1','5'),('Manx','1','4');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values ('Mau egipcio','1','3'),('Mist australiano','1','3'),('Munchkin','1','3'),('Ocigato','1','3'),('Oriental de pelo corto','1','3'),('Oriental de pelo largo','1','3'),('Persa de pelo largo','1','3'),('Pixie bob','1','4');
insert into raza (nombre, TipoMascota_id, TamanoMascota_id) values ('Ragdoll','1','4'),('Savannah','1','3'),('Selkirk rex','1','3'),('Siamés','1','3'),('Singapura','1','2'),('Snowshoe','1','3'),('Somalí','1','3'),('Sphynx','1','3'),('Tiffanie','1','3'),('Tonquinés','1','3'),('Van turco','1','4');
-- https://www.purina.es/encuentra-mascota/razas-de-gato
-- -----------------------------------------------------------------------------##
-- Mascotas Gatos
-- -----------------------------------------------------------------------------##
insert into mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) values('tula','2015-05-15','4','1','50'),('peka','2015-05-15','4','1','67'),('luis','2015-05-15','3','1','93'),('nacho','2015-05-15','3','1','55'),('pepa','2015-05-15','3','1','85'),('michulais','2015-05-15','1','1','73'); 
-- -----------------------------------------------------------------------------##
-- Mascotas perros
-- -----------------------------------------------------------------------------##
insert into mascota (nombre, FechaNacimiento, User_id, TipoMascota_id, Raza_id) values('luca','2015-05-15','4','2','5'),('donkan','2015-05-15','4','2','45'),('silvestre','2015-05-15','3','2','3'),('paco','2015-05-15','3','2','15'),('miguel','2015-05-15','3','2','89'),('firulais','2015-05-15','1','2','5'); 
-- -----------------------------------------------------------------------------##
-- Control Vacunas
-- -----------------------------------------------------------------------------##
insert into controlvacunas values ('1','2','2015-05-15');
-- -----------------------------------------------------------------------------##
-- CONSULTAS
-- -----------------------------------------------------------------------------##
  select count(m.Raza_id) as 'countRaza', tm.nombre as 'tm.nombre', r.nombre as 'r.nombre', t.tamano as "t.tamano", m.nombre as 'nombre mascota'  from mascota as m left join raza as r on m.Raza_id = r.id  left join TamanosMascota as t on t.id = r.TamanoMascota_id left join TipoMascota as tm on m.TipoMascota_id = tm.id group by  m.TipoMascota_id, r.nombre, t.tamano;
-- SELECT  m.nombre, u.nombre, count(c.Mascota_id), m.TipoMascota_id,m.FechaNacimiento FROM mascota as m  left join user as u  on u.id = m.User_id left join controlvacunas as c on c.Mascota_id = m.id  group by   m.nombre, u.nombre, m.TipoMascota_id, m.FechaNacimiento;
-- select * from Vacunas ;
-- select * from user;
-- select * from controlvacunas;
-- select * from mascota;
-- select * from raza;
-- select * from TamanosMascota;
-- select count(id) from Vacunas ;
-- SELECT v.id, v.nombre, v.aplicacion, v.tipomascota_id, count(c.vacuna_id) as countVacuna FROM vacunas as v left join controlvacunas as c on c.vacuna_id = v.id group by  v.id , v.nombre,  v.aplicacion , v.tipomascota_id;
-- SELECT v.id as ID, v.nombre as 'Nombre Vacuna', v.aplicacion as 'Dias Aplicacion', v.tipomascota_id as 'Tipo Mascota', count(c.vacuna_id) as count FROM vacunas as v left join controlvacunas as c on c.vacuna_id = v.id group by  v.id , v.nombre,  v.aplicacion , v.tipomascota_id;
-- select t.nombre from tipomascota as t left join vacunas as v on v.tipomascota_id = t.id group by t.nombre;
-- 	select t.nombre from tipomascota as t;
-- select * from User where username = 'user3';
-- DELETE FROM User WHERE id = 2;
-- insert into User values('3','fafi','UseR-2','examle4@correo.com','$2y$10$ekpW/Y2KnXXMwaVUXveU3.HyV1m.VhT/KD6mDgYzKX2Pw1OAEZ4MG','1','null');
-- select * from user where username like binary "%UseR-2%";
-- update Vacunas set nombre='Parvovirosis2' where id = 1;
-- SELECT v.id as ID, v.nombre as 'Nombre Vacuna', v.aplicacion as 'Dias Aplicacion', v.tipomascota_id as 'Tipo Mascota', count(c.vacuna_id) as 'Vacunas Usadas' FROM vacunas as v left join controlvacunas as c on c.vacuna_id = v.id where v.tipomascota_id like '%2%' group by  v.id , v.nombre,  v.aplicacion , v.tipomascota_id ;