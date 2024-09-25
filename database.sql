-- CREATE DATABASE crud;

-- -- Selecionando o banco de dados
-- USE crud;

-- Criação da tabela Persons
CREATE TABLE IF NOT EXISTS persons (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(15)
);
INSERT INTO persons (name, email, phone) VALUES ('João', 'joao@gmail.com' , '45999338406');