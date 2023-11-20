drop database if exists qcep;
create database qcep character set utf8mb4 collate utf8mb4_spanish_ci;

use qcep;

create table proces(
	id int primary key auto_increment,
    usuari_username varchar(50) not null,
	nom varchar(100) not null,
    tipus varchar(100) not null,
    objectiu varchar(400) not null,
    foreign key(usuari_username) references usuari(username)
);

create table document(
	id int primary key auto_increment,
    proces_nom int not null,
    nom varchar(100) not null,
    tipus varchar(100) not null,
    link varchar(100) not null,
    foreign key(proces_nom) references proces(nom)
);

create table usuari(
	id int primary key auto_increment,
    username varchar(50) not null,
    email varchar(100) not null,
    es_administrador boolean not null
);