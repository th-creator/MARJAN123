create database marjan;
use marjan;
create table users(
	users_id int(11) AUTO_INCREMENT PRIMARY KEY,
    users_uid  varchar(256),
    users_email  varchar(256),
    users_pwd  varchar(256),
    users_role varchar(256)
);
create table serveur (
	srv_id int(11) AUTO_INCREMENT PRIMARY KEY,
    Série  varchar(256),
    BARRE  varchar(256),
    MONTANT  varchar(256),
    MODELE  varchar(256),
    disponibilite  varchar(256),
    DATE  varchar(256),
    RAM  varchar(256),
    OS  varchar(256),
    PROCESSEUR  varchar(256),
    IP  varchar(256),
    MAC  varchar(256),
    VERSION  varchar(256),
    ANTIVIRUS  varchar(256),
    C  varchar(256),
    D  varchar(256),
    E  varchar(256),
    F  varchar(256),
    SERVEUR  varchar(256),
    AFFECTATION  varchar(256),
    type  varchar(256)
);
create table PC (
	PC_id int(11) AUTO_INCREMENT PRIMARY KEY,
    Série  varchar(256),
    BARRE  varchar(256),
    MONTANT  varchar(256),
    MODELE  varchar(256),
    DATE  varchar(256),
    RAM  varchar(256),
    OS  varchar(256),
    PROCESSEUR  varchar(256),
    IP  varchar(256),
    MAC  varchar(256),
    VERSION  varchar(256),
    ANTIVIRUS  varchar(256),
    CAPACITE  varchar(256),
    PC  varchar(256),
    AFFECTATION  varchar(256),
    type  varchar(256)
);
create table impr (
	impr_id int(11) AUTO_INCREMENT PRIMARY KEY,
    Série  varchar(256),
    BARRE  varchar(256),
    MONTANT  varchar(256),
    MODELE  varchar(256),
    IP  varchar(256),
    MAC  varchar(256),
    AFFECTATION  varchar(256),
    PRODUCTION  varchar(256),
    type  varchar(256)
);
create table points (
	point_id int(11) AUTO_INCREMENT PRIMARY KEY,
    Série  varchar(256),
    BARRE  varchar(256),
    MONTANT  varchar(256),
    MODELE  varchar(256),
    IP  varchar(256),
    MAC  varchar(256),
    EMPLACEMENT  varchar(256),
    PRODUCTION  varchar(256),
    type  varchar(256)
);
create table controle (
	cntr_id int(11) AUTO_INCREMENT PRIMARY KEY,
    Série  varchar(256),
    BARRE  varchar(256),
    MONTANT  varchar(256),
    MODELE  varchar(256),
    IP  varchar(256),
    MAC  varchar(256),
    EMPLACEMENT  varchar(256),
    PRODUCTION  varchar(256),
    type  varchar(256)
);
create table enregist (
	cntr_id int(11) AUTO_INCREMENT PRIMARY KEY,
    Série  varchar(256),
    BARRE  varchar(256),
    MONTANT  varchar(256),
    MODELE  varchar(256),
    AFFECTATION  varchar(256),
    PRODUCTION  varchar(256),
    type  varchar(256)
);