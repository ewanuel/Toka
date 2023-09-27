-- Primeiro, exclua o banco de dados se ele existir
DROP DATABASE IF EXISTS cadastro_de_itens;

-- Em seguida, crie um novo banco de dados e use-o
CREATE DATABASE cadastro_de_itens;
USE cadastro_de_itens;

-- Crie a tabela de produtos (se ela já não existir)
CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Img_pdt VARCHAR(255) NOT NULL,
    Preço DECIMAL(10, 2) NOT NULL,
    dscr TEXT NOT NULL,
    tags VARCHAR(255) NOT NULL,
    espec TEXT NOT NULL,
    catg VARCHAR(255) NOT NULL
);