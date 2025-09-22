CREATE DATABASE quiz;
 
 
CREATE TABLE perguntas (
id INT AUTO_INCREMENT PRIMARY KEY,
pergunta TEXT NOT NULL,
alternativa_a VARCHAR(255),
alternativa_b VARCHAR(255),
alternativa_c VARCHAR(255),
alternativa_d VARCHAR
correta CHAR(1)
);
 
 
 
CREATE TABLE ranking (
id INT AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
pontuacao INT NOT NULL,
data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);