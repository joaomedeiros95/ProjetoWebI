-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 12/05/2015 às 12:55
-- Versão do servidor: 5.5.41-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `hospital_web`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE IF NOT EXISTS `especialidade` (
  `id_especialidade` int(11) NOT NULL,
  `denominacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id_especialidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `especialidade`
--

INSERT INTO `especialidade` (`id_especialidade`, `denominacao`) VALUES
(1, 'Cirurgião'),
(2, 'Dentista'),
(3, 'Ortopedista'),
(4, 'Cardiologista'),
(5, 'Clínico');

-- --------------------------------------------------------

--
-- Estrutura para tabela `e_auxilia`
--

CREATE TABLE IF NOT EXISTS `e_auxilia` (
  `cpf_enfermeira` int(11) NOT NULL,
  `procedimento_extra_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `e_realiza`
--

CREATE TABLE IF NOT EXISTS `e_realiza` (
  `cpf_enfermeira` int(11) NOT NULL,
  `exame_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `fornecedor` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_solicitacao_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `material`
--

INSERT INTO `material` (`codigo`, `tipo`, `quantidade`, `lote`, `fornecedor`, `nome`, `id_solicitacao_pessoa`) VALUES
(201548, 'Escritório', 10, 201501, 'FaberCaschina', 'Lapis', 923257845),
(201566, 'Hospitalar', 500, 201502, 'HosParaguai', 'Injeção', 923257845),
(2015502, 'Escritorio', 5000, 201501, 'Chinatorio', 'Papel A4', 2147483647),
(2015698, 'Alimentação', 500, 201504, 'Chinaflango', 'Pastel de Frango', 2147483647),
(201506785, 'Hospital', 800, 201302, 'ChinaLab', 'Luvas', 923257845);

-- --------------------------------------------------------

--
-- Estrutura para tabela `medico_especialidade`
--

CREATE TABLE IF NOT EXISTS `medico_especialidade` (
  `id_especialidade` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `medico_especialidade`
--

INSERT INTO `medico_especialidade` (`id_especialidade`, `id_medico`) VALUES
(1, 923257845),
(5, 923257845);

-- --------------------------------------------------------

--
-- Estrutura para tabela `necessita`
--

CREATE TABLE IF NOT EXISTS `necessita` (
  `operacao_codigo` int(11) NOT NULL,
  `material_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `necessita`
--

INSERT INTO `necessita` (`operacao_codigo`, `material_codigo`) VALUES
(1, 201548),
(2, 201548),
(3, 201566),
(4, 2015502),
(5, 2015698);

-- --------------------------------------------------------

--
-- Estrutura para tabela `operacao`
--

CREATE TABLE IF NOT EXISTS `operacao` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `duracao` decimal(10,0) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `operacao`
--

INSERT INTO `operacao` (`codigo`, `tipo`, `duracao`) VALUES
(1, 'Cirurgia Dentária', 30),
(2, 'Remoção de Cisto', 15),
(3, 'Cirurgia de Catarata', 60),
(4, 'Remoção de Ciso', 40),
(5, 'Estética', 60);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `cidade_estado` varchar(50) DEFAULT NULL,
  `rg` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` int(11) NOT NULL,
  `id_tipo_pessoa` int(11) NOT NULL,
  `nivel_enfermeira` int(11) NOT NULL,
  `hentrada_funcionario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hsaida_funcionario` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `carga_horaria_semanal_funcionario` int(11) NOT NULL,
  `supervisor_funcionario` int(11) NOT NULL,
  `plano_saude_paciente` varchar(30) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `folgas_funcionario` varchar(45) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pessoa`
--

INSERT INTO `pessoa` (`cpf`, `nome`, `endereco`, `cidade_estado`, `rg`, `data_nascimento`, `email`, `telefone`, `id_tipo_pessoa`, `nivel_enfermeira`, `hentrada_funcionario`, `hsaida_funcionario`, `carga_horaria_semanal_funcionario`, `supervisor_funcionario`, `plano_saude_paciente`, `senha`, `folgas_funcionario`) VALUES
(70007, 'James Bond', 'Rua dos bois', 'Bond''s Land', 7000007, '0707-00-07', 'bond007@gmail.com', 3272007, 5, 0, '2015-05-06 18:42:44', '0000-00-00 00:00:00', 20, 0, 'BondeCare', '007', ''),
(12312323, 'Josefina da Costa', 'Rua das Concordias', 'Natal RN ', 1234567878, '0000-00-00', 'josefa100%legal@gmail.com', 36450045, 2, 10, '2015-05-06 18:53:01', '0000-00-00 00:00:00', 40, 70007, 'UNIMED', 'jo123', ''),
(708090601, 'Gabriel "O Pensador"', 'Rua dos Pensamentos', 'Rio de Janeiro ', 123343536, '0000-00-00', 'pensador@gmail.com', 36455021, 4, 0, '2015-05-06 19:01:14', '0000-00-00 00:00:00', 44, 0, 'HAPVIDA', '654321', ''),
(923257845, 'Gustavo Henrique', 'Rua dos Afogados', 'Jerere', 2037961, '0000-00-00', 'gustavo@gmail.com', 32727987, 1, 0, '2015-05-06 18:30:41', '0000-00-00 00:00:00', 20, 0, '', '123456', ''),
(1234566768, 'Roberval da Silva', 'Rua Martelo Machado', 'Natal RN', 123123456, '2010-06-18', 'rob@gmail.com', 98874562, 3, 0, '2015-05-06 18:58:02', '0000-00-00 00:00:00', 40, 70007, 'SMILE', '504060', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pe_realiza`
--

CREATE TABLE IF NOT EXISTS `pe_realiza` (
  `id_procedimento_extra` int(11) NOT NULL,
  `operacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relacionamento entre procedimento extra e operação.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `plantao`
--

CREATE TABLE IF NOT EXISTS `plantao` (
  `codigo` int(11) NOT NULL,
  `especialidade` int(11) NOT NULL,
  `hentrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hsaida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `plantao`
--

INSERT INTO `plantao` (`codigo`, `especialidade`, `hentrada`, `hsaida`, `id_funcionario`) VALUES
(58965, 1, '2015-05-06 18:46:54', '2015-10-10 04:50:10', 70007),
(256844, 4, '2015-05-06 18:47:17', '0000-00-00 00:00:00', 2147483647),
(488484, 2, '2015-05-06 18:48:01', '0000-00-00 00:00:00', 923257845),
(554865, 3, '2015-05-06 18:47:25', '0000-00-00 00:00:00', 923257845),
(555888, 1, '2015-05-06 18:46:10', '0000-00-00 00:00:00', 70007),
(589244, 2, '2015-05-06 18:47:06', '0000-00-00 00:00:00', 923257845),
(4875635, 4, '2015-05-06 18:47:52', '0000-00-00 00:00:00', 2147483647);

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

CREATE TABLE IF NOT EXISTS `procedimento` (
  `nome` varchar(45) NOT NULL,
  `Hentrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Hsaida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `codigo` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_atendente` int(11) NOT NULL,
  `id_tipo_exame` int(11) NOT NULL,
  `exame_tipo` varchar(45) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_enfermeira` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `procedimento`
--

INSERT INTO `procedimento` (`nome`, `Hentrada`, `Hsaida`, `codigo`, `id_paciente`, `id_atendente`, `id_tipo_exame`, `exame_tipo`, `id_medico`, `id_enfermeira`) VALUES
('cirurgia no braço', '2015-05-06 18:55:08', '0000-00-00 00:00:00', 78755, 70007, 12312323, 3, 'basico', 923257845, 12312323),
('massagem cardiaca', '2015-05-06 18:53:15', '0000-00-00 00:00:00', 558947, 2147483647, 2147483647, 1, 'basico', 70007, 923257845),
('cirurgia de olho', '2015-05-06 18:52:09', '0000-00-00 00:00:00', 4787955, 923257845, 2147483647, 2, 'avançada', 70007, 923257845),
('cirurgia de mão', '2015-05-06 18:56:20', '0000-00-00 00:00:00', 7787854, 70007, 12312323, 5, 'avançado', 2147483647, 923257845),
('Cirurgia do pé', '2015-05-06 18:51:07', '0000-00-00 00:00:00', 548785656, 7, 70007, 3, 'basico', 70007, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `realiza_operacao`
--

CREATE TABLE IF NOT EXISTS `realiza_operacao` (
  `operacao_codigo` int(11) NOT NULL,
  `procedimento_extra_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resultado`
--

CREATE TABLE IF NOT EXISTS `resultado` (
  `examinado` varchar(45) NOT NULL,
  `laudo` text NOT NULL,
  `id_procedimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sistema_ponto`
--

CREATE TABLE IF NOT EXISTS `sistema_ponto` (
  `codigo` int(11) NOT NULL,
  `hentrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hsaida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_pessoa` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_exame`
--

CREATE TABLE IF NOT EXISTS `tipo_exame` (
  `id_tipo_exame` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_exame`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_exame`
--

INSERT INTO `tipo_exame` (`id_tipo_exame`, `nome`) VALUES
(1, 'Sangue'),
(2, 'Raio X'),
(3, 'Tomografia'),
(4, 'Vista'),
(5, 'Coração');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_pessoa`
--

CREATE TABLE IF NOT EXISTS `tipo_pessoa` (
  `id_tipo_pessoa` int(11) NOT NULL,
  `denominacao` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_pessoa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipo_pessoa`
--

INSERT INTO `tipo_pessoa` (`id_tipo_pessoa`, `denominacao`) VALUES
(1, 'Médico'),
(2, 'Enfermeira'),
(3, 'Atendente'),
(4, 'Paciente'),
(5, 'Administrador');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;