-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Fev-2023 às 05:24
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gsus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidadao`
--

CREATE TABLE `cidadao` (
  `id_cidadao` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `senha` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cidadao`
--

INSERT INTO `cidadao` (`id_cidadao`, `nome`, `email`, `telefone`, `data_nascimento`, `data_cadastro`, `senha`) VALUES
(1, 'Cidadao', 'cidadao@gmail.com', '61956641234', '1995-12-15', '2023-02-04 13:16:09', 'teste'),
(2, 'João', 'joao@teste.com', '61923441234', '1996-02-17', '2023-02-07 00:05:04', 'abc'),
(3, 'Maria Teste', 'maria@teste.com', '61984561234', '1985-02-25', '2023-02-07 00:08:09', 'abc'),
(4, 'Maria', 'maria@teste.com', '61956311234', '1990-01-08', '2023-02-07 00:20:38', 'abc'),
(5, 'jose', 'jose@gmail.com', '61978511245', '1996-06-14', '2023-02-07 00:24:09', 'abc'),
(6, 'Maria Tereza', 'mariatereza@gmail.com', '61985351145', '1985-07-05', '2023-02-07 00:59:36', 'teste'),
(7, 'Mario', 'mario@gmail.com', '61996511546', '1998-07-14', '2023-02-07 01:07:37', 'abcd'),
(8, 'Maria Clara', 'maria@gmail.com', '61987114313', '1998-02-17', '2023-02-07 01:11:52', 'abcd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta_postodesaude`
--

CREATE TABLE `consulta_postodesaude` (
  `id_consulta` int(6) NOT NULL,
  `consulta` varchar(50) NOT NULL,
  `id_posto` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `farmacia`
--

CREATE TABLE `farmacia` (
  `id_farmacia` int(11) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `UF` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

CREATE TABLE `gestor` (
  `id_gestor` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `senha` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id_gestor`, `nome`, `email`, `telefone`, `data_nascimento`, `data_cadastro`, `senha`) VALUES
(1, 'Gestor', 'gestor@gsus.com', '61956432134', '1995-12-15', '2023-02-04 13:27:25', 'test'),
(2, 'Gestor Teste', 'gestorteste@gsus.com', '61984514789', '1990-06-15', '2023-02-07 00:40:33', 'abc'),
(3, 'Gestor Cadastro', 'gestorcadastro@gsus.cm', '61965213564', '1996-10-25', '2023-02-07 01:01:56', 'test'),
(4, 'Mariana', 'marianagestora@gsus.com', '61986111546', '1995-12-15', '2023-02-07 01:09:22', 'tcc'),
(5, 'Mariana', 'mariana@gsus.com', '61998126567', '1995-12-15', '2023-02-07 01:13:18', 'tcc');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `classificacao_medicamento` varchar(100) NOT NULL,
  `informacoes` varchar(100) NOT NULL,
  `preco` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_posto` int(11) NOT NULL,
  `id_farmacia` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nome`, `classificacao_medicamento`, `informacoes`, `preco`, `quantidade`, `id_posto`, `id_farmacia`) VALUES
(4, 'Cloridrato de fluoxetina', '20 mg', 'cápsula', '10,00', 15, 0, 0),
(5, 'Cloridrato de hidralazina', '50 mg', 'comprimido', '8,00', 10, 0, 0),
(6, 'Cloridrato de lidocaína + glicose', '50 mg/mL + 75 mg/mL (5% + 7,5%)', 'solução injetável', '15,00', 15, 0, 0),
(7, 'Cloridrato de lidocaína + hemitartarato de epinefrina', '2% + 1:80.000', 'solução injetável', '25,22', 35, 0, 0),
(8, 'cloridrato de metformina  ', '500 mg', 'comprimido', '10,25', 25, 0, 0),
(9, 'Cloridrato de metoclopramida', '5 mg/mL', 'solução injetável', '25,22', 20, 0, 0),
(10, 'Cloridrato de nortriptilina', '25 mg ', 'cápsula', '14,25', 33, 0, 0),
(11, 'glicose 50 mg/mL  ', '(5%) solução injetável', ' 100 mg/mL (10%)', '25,14', 25, 0, 0),
(12, 'glicose', '500 mg/mL (50%)', 'solução injetável', '14,75', 15, 0, 0),
(13, 'cloreto de sódio  ', '0,9% (0,154 mEq/mL)', 'solução injetável', '14,77', 25, 0, 0),
(14, 'fosfato de oseltamivir   ', '30 mg', 'cápsula', '54,12', 25, 0, 0),
(15, 'fumarato de tenofovir desoproxila  ', '300 mg', 'comprimido', '25,65', 32, 0, 0),
(16, 'fumarato de tenofovir desoproxila + lamivudina + efavirenz ', '300 mg + 300 mg + 600 mg ', 'comprimido', '26,00', 34, 0, 0),
(17, 'imunoglobulina humana anti-hepatite B ', '180 - 200 UI/mL', ' solução injetável', '25,32', 15, 0, 0),
(18, 'imunoglobulina humana antivaricela zoster ', '125 UI/ 2,5 mL', ' solução injetável', '25,23', 23, 0, 0),
(19, 'sulfato de quinina', ' 500 mg ', 'comprimido', '15,12', 15, 0, 0),
(21, 'paracetamol ', '200 mg/mL', ' solução oral', '25,64', 28, 0, 0),
(22, 'paracetamol', '500 mg ', 'comprimido', '47,05', 29, 0, 0),
(24, 'sulfadiazina ', '500 mg ', 'comprimido', '26,28', 29, 0, 0),
(25, 'talidomida ', '100 mg', ' comprimido', '65,47', 26, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postodesaude`
--

CREATE TABLE `postodesaude` (
  `id_posto` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `identificacao` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `horario_funcionamento` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `UF` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_cidadao`
--

CREATE TABLE `telefone_cidadao` (
  `id_telefone` int(11) NOT NULL,
  `id_cidadao` int(11) NOT NULL,
  `telefone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_farmacia`
--

CREATE TABLE `telefone_farmacia` (
  `id_telefone` int(11) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `id_farmacia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_postodesaude`
--

CREATE TABLE `telefone_postodesaude` (
  `id_telefone` int(6) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `id_posto` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina_postodesaude`
--

CREATE TABLE `vacina_postodesaude` (
  `id_vacina` int(6) NOT NULL,
  `vacina` varchar(50) NOT NULL,
  `id_posto` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidadao`
--
ALTER TABLE `cidadao`
  ADD PRIMARY KEY (`id_cidadao`);

--
-- Índices para tabela `consulta_postodesaude`
--
ALTER TABLE `consulta_postodesaude`
  ADD PRIMARY KEY (`id_consulta`),
  ADD UNIQUE KEY `consulta` (`consulta`),
  ADD KEY `fk_consultapostodesaude` (`id_posto`);

--
-- Índices para tabela `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`id_farmacia`),
  ADD UNIQUE KEY `identificacao` (`identificacao`),
  ADD UNIQUE KEY `cidade` (`cidade`),
  ADD UNIQUE KEY `UF` (`UF`),
  ADD UNIQUE KEY `endereco` (`endereco`),
  ADD UNIQUE KEY `cep` (`cep`),
  ADD UNIQUE KEY `numero` (`numero`);

--
-- Índices para tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id_gestor`);

--
-- Índices para tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Índices para tabela `postodesaude`
--
ALTER TABLE `postodesaude`
  ADD PRIMARY KEY (`id_posto`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `identificacao` (`identificacao`),
  ADD UNIQUE KEY `estado` (`estado`),
  ADD UNIQUE KEY `cidade` (`cidade`),
  ADD UNIQUE KEY `horario_funcionamento` (`horario_funcionamento`),
  ADD UNIQUE KEY `endereco` (`endereco`),
  ADD UNIQUE KEY `cep` (`cep`),
  ADD UNIQUE KEY `numero` (`numero`),
  ADD UNIQUE KEY `UF` (`UF`);

--
-- Índices para tabela `telefone_cidadao`
--
ALTER TABLE `telefone_cidadao`
  ADD PRIMARY KEY (`id_telefone`),
  ADD KEY `fktelefonecidadao` (`id_cidadao`);

--
-- Índices para tabela `telefone_farmacia`
--
ALTER TABLE `telefone_farmacia`
  ADD PRIMARY KEY (`id_telefone`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD KEY `fk_telefonefarmacia` (`id_farmacia`);

--
-- Índices para tabela `telefone_postodesaude`
--
ALTER TABLE `telefone_postodesaude`
  ADD PRIMARY KEY (`id_telefone`),
  ADD UNIQUE KEY `telefone` (`telefone`),
  ADD KEY `fk_telefonepostodesaude` (`id_posto`);

--
-- Índices para tabela `vacina_postodesaude`
--
ALTER TABLE `vacina_postodesaude`
  ADD PRIMARY KEY (`id_vacina`),
  ADD UNIQUE KEY `vacina` (`vacina`),
  ADD KEY `fk_vacinapostodesaude` (`id_posto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidadao`
--
ALTER TABLE `cidadao`
  MODIFY `id_cidadao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `consulta_postodesaude`
--
ALTER TABLE `consulta_postodesaude`
  MODIFY `id_consulta` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id_gestor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `postodesaude`
--
ALTER TABLE `postodesaude`
  MODIFY `id_posto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone_cidadao`
--
ALTER TABLE `telefone_cidadao`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone_farmacia`
--
ALTER TABLE `telefone_farmacia`
  MODIFY `id_telefone` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone_postodesaude`
--
ALTER TABLE `telefone_postodesaude`
  MODIFY `id_telefone` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vacina_postodesaude`
--
ALTER TABLE `vacina_postodesaude`
  MODIFY `id_vacina` int(6) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consulta_postodesaude`
--
ALTER TABLE `consulta_postodesaude`
  ADD CONSTRAINT `fk_consultapostodesaude` FOREIGN KEY (`id_posto`) REFERENCES `postodesaude` (`id_posto`);

--
-- Limitadores para a tabela `telefone_cidadao`
--
ALTER TABLE `telefone_cidadao`
  ADD CONSTRAINT `fktelefonecidadao` FOREIGN KEY (`id_cidadao`) REFERENCES `cidadao` (`id_cidadao`);

--
-- Limitadores para a tabela `telefone_farmacia`
--
ALTER TABLE `telefone_farmacia`
  ADD CONSTRAINT `fk_telefonefarmacia` FOREIGN KEY (`id_farmacia`) REFERENCES `farmacia` (`id_farmacia`);

--
-- Limitadores para a tabela `telefone_postodesaude`
--
ALTER TABLE `telefone_postodesaude`
  ADD CONSTRAINT `fk_telefonepostodesaude` FOREIGN KEY (`id_posto`) REFERENCES `postodesaude` (`id_posto`);

--
-- Limitadores para a tabela `vacina_postodesaude`
--
ALTER TABLE `vacina_postodesaude`
  ADD CONSTRAINT `fk_vacinapostodesaude` FOREIGN KEY (`id_posto`) REFERENCES `postodesaude` (`id_posto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
