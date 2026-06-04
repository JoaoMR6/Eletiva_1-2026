/* Script do Banco de Dados - Projeto ALucar */

CREATE DATABASE IF NOT EXISTS projetophp;
USE projetophp;

/* Tabela de Usuários (Clientes) */
CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

/* Tabela de Categorias */
CREATE TABLE IF NOT EXISTS categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

/* Tabela de Produtos (Veículos) */
CREATE TABLE IF NOT EXISTS produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    categoria_id INT NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categoria(id)
);

/* Tabela de Contratos (RF3) */
CREATE TABLE IF NOT EXISTS contrato (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    valor DECIMAL(10,2) NOT NULL
);

/* Tabela de Aluguéis (RF4) */
CREATE TABLE IF NOT EXISTS aluguel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    produto_id INT NOT NULL,
    contrato_id INT NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE NOT NULL,
    valor_total DECIMAL(10,2) NOT NULL,
    
    FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    FOREIGN KEY (produto_id) REFERENCES produto(id),
    FOREIGN KEY (contrato_id) REFERENCES contrato(id)
);