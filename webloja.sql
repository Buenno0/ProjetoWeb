CREATE DATABASE IF NOT EXISTS webloja;


USE webloja;


CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    cpf VARCHAR(11),
    senha VARCHAR(255) NOT NULL,
    dtNasc DATE NOT NULL,
    tipo_usuario ENUM('comum', 'adm') NOT NULL DEFAULT 'comum'
);


CREATE TABLE enderecos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT, 
    rua VARCHAR(255) NOT NULL,
    numero VARCHAR(10), 
    numero_apartamento VARCHAR(10), 
    bloco VARCHAR(20), 
    cidade VARCHAR(255) NOT NULL,
    estado VARCHAR(50) NOT NULL,
    cep VARCHAR(9) NOT NULL,
    
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);



CREATE TABLE categorias (
    categoria_id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    quantidade_estoque INT NOT NULL,
    categoria_id INT,
    prodImg VARCHAR(255),
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id) ON DELETE SET NULL
);
