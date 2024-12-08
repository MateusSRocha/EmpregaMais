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
    objetivo TEXT NOT NULL, 
    formacao TEXT NOT NULL, 
    experiencia TEXT NOT NULL, 
    habilidades TEXT NOT NULL,
    idiomas VARCHAR(200),
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

CREATE TABLE candidatura (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    id_usuario INT NOT NULL,          
    id_vaga INT NOT NULL,              
    data_candidatura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  
    status ENUM('pendente', 'confirmada', 'rejeitada') DEFAULT 'pendente', 
    FOREIGN KEY (id_usuario) REFERENCES usuario(id), 
    FOREIGN KEY (id_vaga) REFERENCES vaga(id)        
);

CREATE TABLE entrevistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL,
    id_usuario INT NOT NULL,
    id_vaga INT NOT NULL,
    data_entrevista DATE NOT NULL,
    status VARCHAR(20) DEFAULT 'Aguardando Resposta',
    FOREIGN KEY (id_empresa) REFERENCES empresa(id),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id),
    FOREIGN KEY (id_vaga) REFERENCES vaga(id)
); 