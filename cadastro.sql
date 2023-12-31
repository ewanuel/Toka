-- Primeiro, exclua o banco de dados se ele existir
DROP DATABASE IF EXISTS cadastro;

-- Em seguida, crie um novo banco de dados
CREATE DATABASE cadastro;

-- Use o novo banco de dados
USE cadastro;

-- Crie a tabela de usuários (se ela já não existir)
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    sobrenome VARCHAR(255) NOT NULL,
    cpf CHAR(14) NOT NULL UNIQUE, -- Adicione UNIQUE aqui
    cep CHAR(9) NOT NULL,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

-- Insira aqui qualquer outra instrução que você deseja executar no novo banco de dados

-- Consulta para verificar o conteúdo da tabela após a criação
SELECT * FROM usuarios;