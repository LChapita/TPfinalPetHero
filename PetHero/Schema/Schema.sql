CREATE DATABASE pethero;

USE pethero;

create table owner(
    email varchar(100) not NULL,
    password varchar(10) not NULL,
    id_Owner int not NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) not NULL,
    surname varchar(50) not NULL,
    dni int not NULL
)Engine=InnoDB;

create table keeper(
    email varchar(100) not NULL,
    password varchar(10) not NULL,
    id_Keeper int not NULL AUTO_INCREMENT PRIMARY KEY,
	
    name varchar(50) not NULL,
    lastaname varchar(50) not NULL,
    photo varchar(1000) not NULL,
    DNI int not NULL,
    tuition int not NULL,
    sizePet varchar(20) not NULL,
    price float not NULL,
    sex varchar(10) not NULL,
    age int not NULL,
    dateStart DATE,
    dateFinish DATE,
    Dt_FORMATTED as (convert(varchar(255),dateStart,112)),
    Dt_FORMATTED as (convert(varchar(255),dateFinish,112))
)Engine=InnoDB;

create table pet(
    photo text(65535) not NULL,
    id_Pet int not NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) not NULL,
    vaccinationSchedule text(65535) not NULL,
    race varchar(30) not NULL,
    video text(65535) not NULL,
    sizePet varchar(20) not NULL,
    id_Owner int not null,
    constraint FK_pet_Onwer foreign key (id_Owner) references owner(id_Owner)
)Engine=InnoDB;

CREATE TABLE reserv
(
	idReserv INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id_Pet int not null,
    idKeeper INT NOT NULL,
    dateStart DATE,
    dateFinish DATE,
    confirm varchar(10);
)Engine=InnoDB;

DROP procedure IF EXISTS `Owner_Add`;

DELIMITER $$

CREATE PROCEDURE Owner_Add(
    IN email varchar(100),
    IN password varchar(10),
    IN id_Owner int,
    IN name varchar(50),
    IN surname varchar(50),
    IN dni int)
BEGIN
	INSERT INTO owner
        (owner.email,
        owner.password,
        owner.id_Owner,
        owner.name,
        owner.surname,
        owner.dni
        )
    VALUES
        (email,password,id_Owner,name,surname,dni);
END$$

DELIMITER ;

DROP procedure IF EXISTS `Keeper_Add`;

DELIMITER $$

CREATE PROCEDURE Keeper_Add(
    IN email varchar(100),
    IN password varchar(10),
    IN id_Keeper int,

    IN name varchar(50),
    IN lastaname varchar(50),
    IN photo varchar(100),
    IN DNI int,
    IN tuition int,
    IN sizePet varchar(20),
    IN price float,
    IN sex varchar(10),
    IN age int,
    IN dateStart DATE,
    IN dateFinish DATE
    )
BEGIN
	INSERT INTO keeper
        (
            keeper.email,
            keeper.password,
            keeper.id_Keeper,
            keeper.name,
            keeper.lastaname,
            keeper.photo,
            keeper.DNI,
            keeper.tuition,
            keeper.sex,
            keeper.age,
            keeper.price,
            keeper.sizePet,
            keeper.dateStart,
            keeper.dateFinish
            )
    VALUES
        (email,
        password,
        id_Keeper,
        name,
        lastaname,
        photo,
        DNI,
        tuition,
        sex,
        age,
        price,
        sizePet,
        dateStart,
        dateFinish);
END$$


DELIMITER ;

DROP procedure IF EXISTS `Pet_Add`;

DELIMITER $$

CREATE PROCEDURE Pet_Add(
    IN photo text(65535), 
    IN id_Pet INT, 
    IN name varchar(50), 
    IN vaccinationSchedule text(65535), 
    IN race varchar(30), 
    IN video text(65535),
    IN sizePet varchar(20),
    IN id_Owner int
    )
BEGIN
	INSERT INTO pet
        (pet.photo,pet.id_Pet,pet.name,pet.vaccinationSchedule,pet.race,pet.video,pet.sizePet,pet.id_Owner)
    VALUES
        (photo,id_Pet,name,vaccinationSchedule,race,video,sizePet,id_Owner);
END$$


DELIMITER ;



DROP procedure IF EXISTS `Stays_Add`;

DELIMITER $$

CREATE PROCEDURE Stays_Add(IN id_Keeper INT,IN dateStart DATE,IN dateFinish DATE)
BEGIN
    UPDATE keeper k
    SET k.dateStart = dateStart,
    k.dateFinish=dateFinish 
    WHERE k.id_Keeper = id_Keeper ;
	
END$$


DELIMITER ;


DROP procedure IF EXISTS `Reserv_Add`;

DELIMITER $$

CREATE PROCEDURE Reserv_Add(IN idReserv INT, IN idOwner INT, IN idKeeper INT, IN dateStart DATE,IN dateFinish DATE)
BEGIN
	INSERT INTO reserv
        (reserv.idReserv, reserv.idOwner, reserv.idKeeper, reserv.dateStart,reserv.dateFinish)
    VALUES
        (idReserv,idOwner,idKeeper,dateStart,dateFinish);
END$$


DELIMITER ;


select * from owner;
select * from keeper;
select * from pet;
select * from reserv;

delete from pet where id_Pet=23;
delete from reserv where idReserv=3;

drop table owner;
DROP table keeper;
DROP table pet;
drop table reserv;