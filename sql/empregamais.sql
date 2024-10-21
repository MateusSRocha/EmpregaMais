CREATE SCHEMA empregamais;

USE empregamais;

CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(100) NOT NULL UNIQUE,
    nome TEXT NOT NULL,
    telefone TEXT NOT NULL,
    senha VARCHAR(100) NOT NULL,
    genero ENUM('M', 'F', 'O') NOT NULL,
    datacadastro DATE,
    PRIMARY KEY (id)
);
CREATE TABLE curriculo (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    area VARCHAR(300) NOT NULL,
    temptrab VARCHAR(30) NOT NULL,
    objetivo TEXT NOT NULL, 
    formacao TEXT NOT NULL, 
    experiencia TEXT NOT NULL, 
    habilidades TEXT NOT NULL,
    idiomas VARCHAR(200),
    cursos TEXT, 
    linkedin VARCHAR(255), 
    PRIMARY KEY (id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

CREATE TABLE empresa (
    id INT NOT NULL AUTO_INCREMENT,
    cnpj VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(50) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(50) NOT NULL,
    datacadastro DATE,
    PRIMARY KEY (id)
);

CREATE TABLE vaga (
    id INT NOT NULL AUTO_INCREMENT,
    id_empresa INT NOT NULL, 
    quantidade INT NOT NULL,
    tipo_vaga VARCHAR(100) NOT NULL,
    experiencia INT NOT NULL, 
    nivel_escolaridade VARCHAR(100) NOT NULL,
    detalhes TEXT NOT NULL,
    data_publicacao DATE,
    PRIMARY KEY (id),
    FOREIGN KEY (id_empresa) REFERENCES empresa(id)
);
