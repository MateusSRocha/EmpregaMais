create schema empregamais;

use empregamais;

CREATE TABLE curriculo (
	id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    nome VARCHAR(200) NOT NULL,
    telefone VARCHAR(30) NOT NULL UNIQUE,
    datanasc DATE NOT NULL,
    genero ENUM('M', 'F', 'O') NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    area VARCHAR(300) NOT NULL,
    temptrab VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE cliente (
	id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (email)
        REFERENCES curriculo (email)
);

CREATE TABLE empresa (
	id INT NOT NULL AUTO_INCREMENT,
    cnpj VARCHAR(50) NOT NULL UNIQUE,
    endereco VARCHAR(100) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    PRIMARY KEY (id)
);