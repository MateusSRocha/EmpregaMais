create schema projeto;

use projeto;

create table curriculo(
	email varchar(100) primary key,
	nome varchar(200) not null,
    telefone varchar(30) not null,
    datanasc date not null,
    genero enum('M','F','O') not null,
    endereco varchar(50) not null,
    area varchar(300) not null,
    temptrab varchar(30) not null
    
);

create table cliente(
	email varchar(100) primary key,
           senha varchar(100) not null,
           foreign key(email) references curriculo(email)
);
    
    


create table empresa(
	cnpj varchar(50) primary key,
    endereco varchar(100) not null,
    nome varchar(100) not null,
    telefone varchar(50) not null
);
