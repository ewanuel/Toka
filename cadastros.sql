-- Primeiro, exclua o banco de dados se ele existir
DROP DATABASE IF EXISTS cadastros;

-- Em seguida, crie um novo banco de dados e use-o
CREATE DATABASE cadastros;
USE cadastros;

-- Crie a tabela de produtos (se ela já não existir)
CREATE TABLE cadastros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(255) NOT NULL,
    Img_pdt blob,
    Img_pdt2 blob,
    Img_pdt3 blob,
    Img_pdt4 blob,
    Img_pdt5 blob,
    Video_pdt blob,
    Preço DECIMAL(10, 2) NOT NULL,
    dscr TEXT NOT NULL,
    tags VARCHAR(255) NOT NULL,
    espec TEXT NOT NULL,
    catg VARCHAR(255) NOT NULL,
    estq DECIMAL NOT NULL
);

CREATE TABLE comentarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT,
    usuario VARCHAR(50),
    comentario TEXT,
    data_postagem TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
