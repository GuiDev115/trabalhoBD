CREATE DATABASE agenda;

USE agenda;

CREATE TABLE dados_pessoais (
  codigo   int(5)      NOT NULL auto_increment PRIMARY KEY,
  nome     varchar(30) NOT NULL,
  ddd      tinyint(2)  NOT NULL,
  telefone int(9)      NOT NULL
);
