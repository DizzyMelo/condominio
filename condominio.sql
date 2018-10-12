-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Out-2018 às 01:44
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `condominio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arrecadacoes`
--

CREATE TABLE `arrecadacoes` (
  `id` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `competencia_id` int(11) NOT NULL,
  `condominio_id` int(11) NOT NULL,
  `unico_boleto` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arrecadacoes`
--

INSERT INTO `arrecadacoes` (`id`, `dia`, `competencia_id`, `condominio_id`, `unico_boleto`) VALUES
(1, 10, 1, 4, 1),
(2, 10, 1, 4, 0),
(4, 11, 1, 4, 1),
(5, 11, 1, 4, 0),
(6, 14, 1, 4, 1),
(7, 14, 1, 4, 1),
(8, 15, 2, 4, 1),
(9, 12, 1, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `competencia`
--

CREATE TABLE `competencia` (
  `id` int(11) NOT NULL,
  `competencia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `competencia`
--

INSERT INTO `competencia` (`id`, `competencia`) VALUES
(1, 'Mês anterior ao vencimento'),
(2, 'Mês do vencimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominio`
--

CREATE TABLE `condominio` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `identificacao` varchar(50) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(100) DEFAULT NULL,
  `inscricao_estadual` varchar(20) DEFAULT NULL,
  `inscricao_municipal` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefone` varchar(40) DEFAULT NULL,
  `celular` varchar(40) DEFAULT NULL,
  `sts` int(11) NOT NULL,
  `usr_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `condominio`
--

INSERT INTO `condominio` (`id`, `cnpj`, `identificacao`, `nome`, `nome_fantasia`, `inscricao_estadual`, `inscricao_municipal`, `email`, `telefone`, `celular`, `sts`, `usr_id`) VALUES
(4, '234.523.452/3452-34', 'STAFF', 'CONDOMINIO DA MARIA', 'CONDOMINIO DA MARIA', '23452345', '23452345', 'daniel.melo42@outlook.com', '23452345', '34563456', 1, 1),
(5, '293.748.562/9387-45', 'BELAS ARTES', 'CONDOMINIO BELAS ARTES', 'CONDOMINIO BELAS ARTES', '34563456346', '245235423', 'staff@gmail.com', '13123123', '456456456', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `grupo_conta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `conta`, `descricao`, `grupo_conta_id`) VALUES
(1, '1.1', 'Cotas do Mes', 2),
(2, '1.2', 'Juros', 2),
(3, '1.3', 'Multas', 2),
(4, '1.4', 'Descontos', 2),
(5, '1.5', 'Tarifa Bancaria', 2),
(6, '1.6', 'Rendimento de Poupanca', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id`, `cep`, `rua`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
(1, '59108120', 'Avenida Paulistana', '', 'Potengi', 'Natal', 20),
(2, '59108120', 'Avenida Paulistana', '', 'Potengi', 'Natal', 20),
(3, '59138615', 'Rua Cristina Melo', '', 'Lagoa Azul', 'Natal', 20),
(4, '59108120', 'Avenida Paulistana', '', 'Potengi', 'Natal', 20),
(5, '59108120', 'Avenida Paulistana', '', 'Potengi', 'Natal', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_conta`
--

CREATE TABLE `grupo_conta` (
  `id` int(11) NOT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `grupo_conta`
--

INSERT INTO `grupo_conta` (`id`, `conta`, `descricao`, `condominio_id`) VALUES
(2, '1', 'Receitas', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `inadinplencia`
--

CREATE TABLE `inadinplencia` (
  `id` int(11) NOT NULL,
  `honorario_advogado` decimal(10,2) DEFAULT NULL,
  `dias_para_inadinplencia` int(11) NOT NULL,
  `dias_para_processar` int(11) NOT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inadinplencia`
--

INSERT INTO `inadinplencia` (`id`, `honorario_advogado`, `dias_para_inadinplencia`, `dias_para_processar`, `condominio_id`) VALUES
(2, '20.00', 3, 4, 4),
(3, '23.00', 4, 5, 4),
(4, '22.00', 4, 5, 4),
(5, '21.00', 3, 4, 4),
(6, '21.00', 4, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrucao_acordo`
--

CREATE TABLE `instrucao_acordo` (
  `id` int(11) NOT NULL,
  `primeira_linha` varchar(500) DEFAULT NULL,
  `segunda_linha` varchar(500) DEFAULT NULL,
  `terceira_linha` varchar(500) DEFAULT NULL,
  `quarta_linha` varchar(500) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instrucao_acordo`
--

INSERT INTO `instrucao_acordo` (`id`, `primeira_linha`, `segunda_linha`, `terceira_linha`, `quarta_linha`, `condominio_id`) VALUES
(1, 'qwe1', 'qwe2', 'qwe3', 'qwe4', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instrucao_boleto`
--

CREATE TABLE `instrucao_boleto` (
  `id` int(11) NOT NULL,
  `primeira_linha` varchar(500) DEFAULT NULL,
  `segunda_linha` varchar(500) DEFAULT NULL,
  `terceira_linha` varchar(500) DEFAULT NULL,
  `quarta_linha` varchar(500) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `instrucao_boleto`
--

INSERT INTO `instrucao_boleto` (`id`, `primeira_linha`, `segunda_linha`, `terceira_linha`, `quarta_linha`, `condominio_id`) VALUES
(1, 'primeira', 'segunda', 'terceira', 'quarta', 4),
(2, 'asd1', 'asd2', 'asd3', 'asd4', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `juro`
--

CREATE TABLE `juro` (
  `id` int(11) NOT NULL,
  `juro` decimal(10,2) NOT NULL,
  `prd` tinyint(1) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `juro`
--

INSERT INTO `juro` (`id`, `juro`, `prd`, `condominio_id`) VALUES
(1, '4.00', 1, 4),
(3, '4.00', 0, 4),
(4, '5.00', 1, 4),
(5, '5.00', 1, 4),
(6, '5.00', 1, 4),
(7, '5.00', 1, 4),
(8, '5.00', 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencao`
--

CREATE TABLE `manutencao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `periodicidade` int(11) NOT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `manutencao`
--

INSERT INTO `manutencao` (`id`, `nome`, `periodicidade`, `condominio_id`) VALUES
(1, 'Elevador', 6, 4),
(2, 'Extintor', 12, 4),
(3, 'Caixa de agua', 6, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `manutencoes_realizadas`
--

CREATE TABLE `manutencoes_realizadas` (
  `manutencao_id` int(11) NOT NULL,
  `fornecedor_id` int(11) NOT NULL,
  `date_manutencao` date DEFAULT NULL,
  `realizada` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `multa`
--

CREATE TABLE `multa` (
  `id` int(11) NOT NULL,
  `taxa` decimal(10,2) NOT NULL,
  `condominio_id` int(11) NOT NULL,
  `uvp` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `multa`
--

INSERT INTO `multa` (`id`, `taxa`, `condominio_id`, `uvp`) VALUES
(2, '6.00', 4, 1),
(3, '6.00', 4, 1),
(4, '6.00', 4, 1),
(5, '6.00', 4, 1),
(6, '6.00', 4, 1),
(7, '6.00', 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagador_boleros`
--

CREATE TABLE `pagador_boleros` (
  `id` int(11) NOT NULL,
  `eou_inquilino` tinyint(1) DEFAULT NULL,
  `nome_inquilino` tinyint(1) DEFAULT NULL,
  `apenas_nome_inquilino` tinyint(1) DEFAULT NULL,
  `sacador_numero` tinyint(1) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagador_boleros`
--

INSERT INTO `pagador_boleros` (`id`, `eou_inquilino`, `nome_inquilino`, `apenas_nome_inquilino`, `sacador_numero`, `condominio_id`) VALUES
(1, 1, 0, 1, 1, 4),
(2, 1, 0, 0, 0, 4),
(3, 0, 1, 0, 0, 4),
(4, 0, 0, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `rg` varchar(30) DEFAULT NULL,
  `cpf` varchar(30) DEFAULT NULL,
  `dtnascimento` date DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `unidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`id`, `nome`, `rg`, `cpf`, `dtnascimento`, `telefone`, `celular`, `email`, `unidade_id`) VALUES
(1, 'Daniel Freitas de Melo', '34563456', '25234523', '1994-10-20', '34563456', '24234234', 'daniel.melo42@outlook.com', 1),
(2, 'Kaynara Suzane dos Santos Silva Melo', '23452354', '35463456', '1996-12-13', '23452345', '23452354', 'kss_susu@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE `uf` (
  `id` int(11) NOT NULL,
  `uf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`id`, `uf`) VALUES
(1, 'AC'),
(2, 'AL'),
(3, 'AP'),
(4, 'AM'),
(5, 'BA'),
(6, 'CE'),
(7, 'DF'),
(8, 'ES'),
(9, 'GO'),
(10, 'MA'),
(11, 'MT'),
(12, 'MS'),
(13, 'MG'),
(14, 'PA'),
(15, 'PB'),
(16, 'PR'),
(17, 'PE'),
(18, 'PI'),
(19, 'RJ'),
(20, 'RN'),
(21, 'RS'),
(22, 'RO'),
(23, 'RR'),
(24, 'SC'),
(25, 'SP'),
(26, 'SE'),
(27, 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `unidade` varchar(20) DEFAULT NULL,
  `bloco` varchar(20) DEFAULT NULL,
  `area` decimal(10,2) DEFAULT NULL,
  `fracao` decimal(10,2) DEFAULT NULL,
  `abatimento` decimal(10,2) DEFAULT '0.00',
  `condominio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `unidade`, `bloco`, `area`, `fracao`, `abatimento`, `condominio_id`) VALUES
(1, '1003', 'B', '300.00', '4.00', '3.00', 4),
(2, '1003', 'B', '400.00', '4.00', '4.00', 4),
(3, '1003', 'B', '300.00', '5.00', '3.00', 4),
(4, '1003', 'B', '100.00', '3.00', '30.00', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Daniel Melo', 'daniel.melo42@outlook.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_adicional`
--

CREATE TABLE `usuario_adicional` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `condominio_id` int(11) NOT NULL,
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_adicional`
--

INSERT INTO `usuario_adicional` (`id`, `email`, `nome`, `senha`, `condominio_id`, `sts`) VALUES
(1, 'daniel.melo42@outlook.com', 'Daniel', '123', 4, 1),
(2, 'teste@teste.com', 'Teste', '123', 4, 1),
(3, 'daniel.melo42@outlook.com', 'Daniel', '123', 4, 1),
(4, 'staffteste@gmail.com', 'Staff', '123', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arrecadacoes`
--
ALTER TABLE `arrecadacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competencia_id` (`competencia_id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `condominio`
--
ALTER TABLE `condominio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_conta_id` (`grupo_conta_id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uf` (`uf`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupo_conta`
--
ALTER TABLE `grupo_conta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `inadinplencia`
--
ALTER TABLE `inadinplencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `instrucao_acordo`
--
ALTER TABLE `instrucao_acordo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `instrucao_boleto`
--
ALTER TABLE `instrucao_boleto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `juro`
--
ALTER TABLE `juro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `manutencao`
--
ALTER TABLE `manutencao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `manutencoes_realizadas`
--
ALTER TABLE `manutencoes_realizadas`
  ADD PRIMARY KEY (`manutencao_id`,`fornecedor_id`),
  ADD KEY `fornecedor_id` (`fornecedor_id`);

--
-- Indexes for table `multa`
--
ALTER TABLE `multa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `pagador_boleros`
--
ALTER TABLE `pagador_boleros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unidade_id` (`unidade_id`);

--
-- Indexes for table `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_adicional`
--
ALTER TABLE `usuario_adicional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `condominio_id` (`condominio_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrecadacoes`
--
ALTER TABLE `arrecadacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `competencia`
--
ALTER TABLE `competencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `condominio`
--
ALTER TABLE `condominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupo_conta`
--
ALTER TABLE `grupo_conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inadinplencia`
--
ALTER TABLE `inadinplencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `instrucao_acordo`
--
ALTER TABLE `instrucao_acordo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `instrucao_boleto`
--
ALTER TABLE `instrucao_boleto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `juro`
--
ALTER TABLE `juro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `manutencao`
--
ALTER TABLE `manutencao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `multa`
--
ALTER TABLE `multa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pagador_boleros`
--
ALTER TABLE `pagador_boleros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario_adicional`
--
ALTER TABLE `usuario_adicional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arrecadacoes`
--
ALTER TABLE `arrecadacoes`
  ADD CONSTRAINT `arrecadacoes_ibfk_1` FOREIGN KEY (`competencia_id`) REFERENCES `competencia` (`id`),
  ADD CONSTRAINT `arrecadacoes_ibfk_2` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `condominio`
--
ALTER TABLE `condominio`
  ADD CONSTRAINT `condominio_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`grupo_conta_id`) REFERENCES `grupo_conta` (`id`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`uf`) REFERENCES `uf` (`id`);

--
-- Limitadores para a tabela `grupo_conta`
--
ALTER TABLE `grupo_conta`
  ADD CONSTRAINT `grupo_conta_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `inadinplencia`
--
ALTER TABLE `inadinplencia`
  ADD CONSTRAINT `inadinplencia_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `instrucao_acordo`
--
ALTER TABLE `instrucao_acordo`
  ADD CONSTRAINT `instrucao_acordo_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `instrucao_boleto`
--
ALTER TABLE `instrucao_boleto`
  ADD CONSTRAINT `instrucao_boleto_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `juro`
--
ALTER TABLE `juro`
  ADD CONSTRAINT `juro_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `manutencao`
--
ALTER TABLE `manutencao`
  ADD CONSTRAINT `manutencao_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `manutencoes_realizadas`
--
ALTER TABLE `manutencoes_realizadas`
  ADD CONSTRAINT `manutencoes_realizadas_ibfk_1` FOREIGN KEY (`manutencao_id`) REFERENCES `manutencao` (`id`),
  ADD CONSTRAINT `manutencoes_realizadas_ibfk_2` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`);

--
-- Limitadores para a tabela `multa`
--
ALTER TABLE `multa`
  ADD CONSTRAINT `multa_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `pagador_boleros`
--
ALTER TABLE `pagador_boleros`
  ADD CONSTRAINT `pagador_boleros_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `proprietario`
--
ALTER TABLE `proprietario`
  ADD CONSTRAINT `proprietario_ibfk_1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`);

--
-- Limitadores para a tabela `unidade`
--
ALTER TABLE `unidade`
  ADD CONSTRAINT `unidade_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);

--
-- Limitadores para a tabela `usuario_adicional`
--
ALTER TABLE `usuario_adicional`
  ADD CONSTRAINT `usuario_adicional_ibfk_1` FOREIGN KEY (`condominio_id`) REFERENCES `condominio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
