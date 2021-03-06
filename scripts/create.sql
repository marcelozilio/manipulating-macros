CREATE DATABASE `manipulating-macros`;

USE `manipulating-macros`;

CREATE TABLE USUARIO(
    ID_USUARIO INT AUTO_INCREMENT,
    EMAIL VARCHAR(80) UNIQUE NOT NULL,
    NOME VARCHAR(60) NOT NULL,
    ALTURA INT NOT NULL,
    PESO DECIMAL NOT NULL,
    IDADE INT NOT NULL,
    SEXO VARCHAR(9) NOT NULL,
    CALORIAS INT,
    OBJETIVO VARCHAR(40),
    SENHA VARCHAR(20),
    PRIMARY KEY (ID_USUARIO)
);

CREATE TABLE MACROS(
    ID_MACROS INT AUTO_INCREMENT,
    ID_USUARIO INT NOT NULL,
    PROTEINA INT,
    CARBOIDRATO INT,
    GORDURA INT,
    PRIMARY KEY (ID_MACROS),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE DIA(
    ID_DIA INT AUTO_INCREMENT,
    ID_USUARIO INT NOT NULL,
    DESCRICAO VARCHAR(500),
    DATA_DIA DATE NOT NULL,
    CALORIAS_TOTAIS_DIA INT,
    PRIMARY KEY (ID_DIA),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);

CREATE TABLE REFEICAO(
    ID_REFEICAO INT AUTO_INCREMENT,
    ID_DIA INT NOT NULL,
    DESCRICAO VARCHAR(50) NOT NULL,
    CALORIAS INT,
    PRIMARY KEY (ID_REFEICAO),
    FOREIGN KEY (ID_DIA) REFERENCES DIA (ID_DIA)
);

CREATE TABLE CATEGORIA(
    ID_CATEGORIA INT NOT NULL,
    DESCRICAO_CATEGORIA VARCHAR(50) NOT NULL,
    PRIMARY KEY (ID_CATEGORIA)
);

CREATE TABLE ALIMENTO(
    ID_ALIMENTO INT AUTO_INCREMENT,
    ID_CATEGORIA INT NOT NULL,
    DESCRICAO VARCHAR(150) NOT NULL,
    PROTEINA DECIMAL NOT NULL,
    CARBOIDRATO DECIMAL NOT NULL,
    LIPIDEOS DECIMAL NOT NULL,
    KCAL INT NOT NULL,
    PRIMARY KEY (ID_ALIMENTO),
    FOREIGN KEY (ID_CATEGORIA) REFERENCES CATEGORIA (ID_CATEGORIA)
);

CREATE TABLE REFEICAO_ALIMENTO(
    ID_REFEICAO_ALIMENTO INT AUTO_INCREMENT,
    ID_REFEICAO INT NOT NULL,
    ID_ALIMENTO INT NOT NULL,
    QUANTIDADE DECIMAL NOT NULL,
    CALORIAS DECIMAL,
    PRIMARY KEY (ID_REFEICAO_ALIMENTO),
    FOREIGN KEY (ID_REFEICAO) REFERENCES REFEICAO (ID_REFEICAO),
    FOREIGN KEY (ID_ALIMENTO) REFERENCES ALIMENTO (ID_ALIMENTO)
);

CREATE TABLE USUARIO_PESO(
    ID_USUARIO_PESO INT AUTO_INCREMENT,
    ID_USUARIO INT NOT NULL,
    PESO DECIMAL NOT NULL,
    DATA_PESAGEM DATE NOT NULL,
    PRIMARY KEY (ID_USUARIO_PESO),
    FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO (ID_USUARIO)
);