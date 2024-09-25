CREATE DATABASE crud;

-- Selecionando o banco de dados
USE crud;

-- Criação da tabela Persons
CREATE TABLE persons (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15)
);