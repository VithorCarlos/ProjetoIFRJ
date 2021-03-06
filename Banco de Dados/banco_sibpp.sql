DROP DATABASE IF EXISTS sibpp;
CREATE DATABASE IF NOT EXISTS sibpp;

USE sibpp;


CREATE TABLE pedido_oracao ( 
  cod_pedido INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_pedido VARCHAR(20) NOT NULL,
  email_pedido VARCHAR(50) NOT NULL,
  telefone_pedido VARCHAR(15) NOT NULL,
  desc_pedido TEXT NOT NULL,
  PRIMARY KEY (cod_pedido)
  )ENGINE = innodb;


CREATE TABLE evento ( 
  cod_evento INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_evento VARCHAR(150) NOT NULL,
  data_evento DATE NOT NULL,
  hora_evento TIME NOT NULL,
  imagem_evento VARCHAR (200) NOT NULL,
  desc_evento TEXT NOT NULL,
  cep_evento VARCHAR(8) NOT NULL,
  estado_evento VARCHAR(2) NOT NULL,
  cidade_evento VARCHAR(50) NOT NULL,
  bairro_evento VARCHAR(20) NOT NULL,
  rua_evento VARCHAR(150) NOT NULL,
  complemento_evento VARCHAR(45) NOT NULL,
  PRIMARY KEY (cod_evento)
  )ENGINE = innodb;


CREATE TABLE membro (
  cod_membro INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_membro VARCHAR(20) NOT NULL,
  email_membro VARCHAR(50) NOT NULL,
  cpf_membro VARCHAR(11) NOT NULL,
  senha_membro VARCHAR(15) NOT NULL,
  telefone_membro VARCHAR (15) NOT NULL,
  PRIMARY KEY (cod_membro),
  Fk_Evento_2 INT UNSIGNED,
  FOREIGN KEY Fk_Evento_2 (Fk_Evento_2) REFERENCES evento (cod_evento) ON UPDATE CASCADE ON DELETE RESTRICT
  ) ENGINE = innodb;


CREATE TABLE administrador (
  cod_administrador INT UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_adm VARCHAR(20) NOT NULL,
  email_adm VARCHAR(50) NOT NULL,
  cpf_adm VARCHAR(11) NOT NULL,
  senha_adm VARCHAR(15) NOT NULL,
  telefone_adm VARCHAR (15) NOT NULL,
  PRIMARY KEY (cod_administrador),
  Fk_Evento INT UNSIGNED,
  Fk_Membro INT UNSIGNED,
  FOREIGN KEY Fk_Evento (Fk_Evento) REFERENCES evento (cod_evento) ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY Fk_Membro (Fk_Membro) REFERENCES membro (cod_membro) ON UPDATE CASCADE ON DELETE RESTRICT
  ) ENGINE = innodb;