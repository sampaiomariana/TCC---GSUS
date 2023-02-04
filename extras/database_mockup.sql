use db_mockup;

CREATE TABLE usuario (
    id INT(6) AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    data_inicio DATE NOT NULL,
    data_fim DATE,
    is_admin BOOLEAN NOT NULL DEFAULT false
);


CREATE TABLE cidadao (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(11) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    data_cadastro DATETIME NOT NULL
    
);


CREATE TABLE gestor (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone VARCHAR(11) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    data_cadastro DATETIME NOT NULL
    id_posto INT,
    senha VARCHAR(4) NOT NULL,
    constraint  fk_gestorpostodesaude foreign key(id_posto) references postodesaude(id_posto)
    
);

CREATE TABLE postodesaude(
	id_posto INT AUTO_INCREMENT PRIMARY KEY,
	email VARCHAR(50) UNIQUE NOT NULL,
    identificacao VARCHAR(50) UNIQUE NOT NULL,
    estado VARCHAR(50) UNIQUE NOT NULL,
    cidade VARCHAR(50) UNIQUE NOT NULL,
    horario_funcionamento VARCHAR(50) UNIQUE NOT NULL,
    endereco VARCHAR(50) UNIQUE NOT NULL,
	cep VARCHAR(50) UNIQUE NOT NULL,
    numero VARCHAR(50) UNIQUE NOT NULL,
    UF VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE telefone_postodesaude(
	id_telefone INT(6) AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(50) UNIQUE NOT NULL,
    id_posto INT(6),
    constraint  fk_telefonepostodesaude foreign key(id_posto) references postodesaude(id_posto)
);

CREATE TABLE exame_postodesaude(
	id_exame INT(6) AUTO_INCREMENT PRIMARY KEY,
	id_posto INT(6),
    exame VARCHAR(50) UNIQUE NOT NULL,
	constraint  fk_examepostodesaude  foreign key(id_posto) references postodesaude(id_posto)
);

CREATE TABLE medicamento(
	id_posto INT,
	id_medicamento INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) UNIQUE NOT NULL,
    classificacao_medicamento VARCHAR(50) UNIQUE NOT NULL,
    informacoes VARCHAR(50) UNIQUE NOT NULL,
    preco VARCHAR(50) UNIQUE NOT NULL,
    constraint  fk_medicamentopostodesaude foreign key(id_posto) references postodesaude(id_posto)
);

CREATE TABLE dosagem_medicamento(
	id_medicamento INT,
    id_faixaetaria INT AUTO_INCREMENT PRIMARY KEY,
    informacoes VARCHAR(50) UNIQUE NOT NULL,
    dosagem VARCHAR(50) UNIQUE NOT NULL,
    tipo_usario VARCHAR(50) UNIQUE NOT NULL,
    faixaetaria VARCHAR(50) UNIQUE NOT NULL,
    constraint  fk_dosagemmedicamento foreign key(id_medicamento) references medicamento(id_medicamento)
);

CREATE TABLE gestor(
	id_posto INT(6),
	matricula INT(6) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    data_admissao DATE NOT NULL,
    data_demissao DATE,
    ativo BOOLEAN NOT NULL DEFAULT false,
    constraint  fk_gestorpostodesaude foreign key(id_posto) references postodesaude(id_posto)
);

CREATE TABLE cidadao(
	id_cidadao INT AUTO_INCREMENT PRIMARY KEY,
    cpf VARCHAR(50) UNIQUE NOT NULL,
    nome VARCHAR(50) UNIQUE NOT NULL,
    data_nascimento DATE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    endereco VARCHAR(100) UNIQUE NOT NULL,
    cep VARCHAR(50) UNIQUE NOT NULL,
    UF VARCHAR(50) UNIQUE NOT NULL,
    numero VARCHAR(50) UNIQUE NOT NULL,
    id_posto INT,
	constraint  fk_cidadaopostodesaude foreign key(id_posto) references postodesaude(id_posto)	
);


CREATE TABLE telefone_cidadao(
	id_telefone INT AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(50) UNIQUE NOT NULL,
    id_cidadao INT,
    constraint  fk_telefonecidadao foreign key(id_cidadao) references cidadao(id_cidadao)
);


CREATE TABLE farmacia (
	id_farmacia INT AUTO_INCREMENT PRIMARY KEY,
    identificacao VARCHAR(50) UNIQUE NOT NULL,
    cidade VARCHAR(50) UNIQUE NOT NULL,
    UF VARCHAR(50) UNIQUE NOT NULL,
    endereco VARCHAR(50) UNIQUE NOT NULL,
    cep VARCHAR(50) UNIQUE NOT NULL,
    numero VARCHAR(50) UNIQUE NOT NULL,
    id_medicamento INT,
    constraint  fk_medicamentofarmacia foreign key(id_medicamento) references medicamento(id_medicamento)
);


CREATE TABLE telefone_farmacia(
	id_telefone INT AUTO_INCREMENT PRIMARY KEY,
    telefone VARCHAR(50) UNIQUE NOT NULL,
    id_farmacia INT,
    constraint  fk_telefonefarmacia foreign key(id_farmacia) references farmacia(id_farmacia)
);