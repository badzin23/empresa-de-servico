CREATE DATABASE solicitacoes_db;

USE solicitacoes_db;

-- Tabela de Clientes
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL
);

-- Tabela de Funcionários (opcional para atribuir responsáveis)
CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Tabela de Solicitações
CREATE TABLE solicitacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    descricao TEXT NOT NULL,
    urgencia ENUM('baixa', 'média', 'alta') NOT NULL,
    status ENUM('pendente', 'em andamento', 'finalizada') DEFAULT 'pendente',
    data_abertura DATETIME DEFAULT CURRENT_TIMESTAMP,
    funcionario_id INT NULL,
    FOREIGN KEY (cliente_id) REFERENCES clientes (id),
    FOREIGN KEY (funcionario_id) REFERENCES funcionarios (id)
);
