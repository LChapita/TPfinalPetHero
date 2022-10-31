CREATE DATABASE pethero;

USE pethero;

CREATE TABLE reserv
(
	idReserv INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idOwner INT NOT NULL,
    idKeeper INT NOT NULL,
    dateStart DATETIME,
    dateFinish DATETIME
)Engine=InnoDB;



DROP procedure IF EXISTS `Reserv_Add`;

DELIMITER $$

CREATE PROCEDURE Reserv_Add(IN idReserv INT, IN idOwner INT, IN idKeeper INT, IN dateStart DATETIME,IN dateFinish DATETIME)
BEGIN
	INSERT INTO reserv
        (reserv.idReserv, reserv.idOwner, reserv.idKeeper, reserv.dateStart,reserv.dateFinish)
    VALUES
        (idReserv,idOwner,idKeeper,dateStart,dateFinish);
END$$


DELIMITER ;

delete from reserv where idReserv=3;

select * from reserv;