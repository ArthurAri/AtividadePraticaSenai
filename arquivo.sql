-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS GerenciamentoEscolar;
USE GerenciamentoEscolar;
-- Tabela para armazenar os professores
CREATE TABLE Professores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL
);
-- Tabela para armazenar as turmas
CREATE TABLE Turmas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    professor_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    FOREIGN KEY (professor_id) REFERENCES Professores(id) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Tabela para armazenar as atividades
CREATE TABLE Atividades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    turma_id INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    descricao TEXT,
    data_entrega DATE,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (turma_id) REFERENCES Turmas(id) ON DELETE CASCADE ON UPDATE CASCADE
);
-- Inserção de exemplo
INSERT INTO Professores (nome, email, senha) VALUES ('João Silva', 'joao.silva@example.com', '123');
INSERT INTO Turmas (professor_id, nome) VALUES (1, 'Turma A'), (1, 'Turma B');
INSERT INTO Atividades (turma_id, titulo, descricao, data_entrega) 
VALUES 
    (1, 'Atividade 1', 'Descrição da primeira atividade', '2024-12-01'),
    (2, 'Atividade 2', 'Descrição da segunda atividade', '2024-12-15');
