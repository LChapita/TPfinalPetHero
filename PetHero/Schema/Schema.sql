CREATE DATABASE PetHero;

USE PetHero;

CREATE TABLE reserv
(
	idReserv INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idOwner INT NOT NULL,
    idKeeper INT NOT NULL,
    dateStart DATETIME,
    dateFinish DATETIME
)Engine=InnoDB;

