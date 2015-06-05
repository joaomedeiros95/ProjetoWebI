-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 04/06/2015 às 21:20
-- Versão do servidor: 5.5.43-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.9

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
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_material` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `fornecedor` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `id_solicitacao_pessoa` bigint(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `codigo` (`codigo`),
  KEY `fk_tipo_material_idx` (`id_tipo_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=201506787 ;

--
-- Fazendo dump de dados para tabela `material`
--

INSERT INTO `material` (`codigo`, `id_tipo_material`, `quantidade`, `lote`, `fornecedor`, `nome`, `id_solicitacao_pessoa`) VALUES
(1, 3, 12347, 12345, 'Skol', 'MudandoNome', 5948160505),
(201548, 1, 6, 201501, 'FaberCaschina', 'Lapis', 923257845),
(201566, 2, 501, 201502, 'HosParaguai', 'InjeÃ§Ã£o', 923257845),
(2015502, 1, 4998, 201501, 'Chinatorio', 'Papel A4', 923257845),
(2015698, 3, 502, 201504, 'Chinaflango', 'Pastel de Frango', 923257845),
(201506785, 2, 800, 201302, 'ChinaLab', 'Luvas', 923257845),
(201506786, 2, 125, 13, 'ABC', 'ABC', 5948160505);

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
(708090601, 'Gabriel O Pensador', 'Rua dos Pensamentos', 'Rio de Janeiro ', 123343536, '0000-00-00', 'pensador@gmail.com', 36455021, 4, 0, '2015-05-06 19:01:14', '0000-00-00 00:00:00', 44, 0, 'HAPVIDA', '654321', ''),
(923257845, 'Gustavo Henrique', 'Rua dos Afogados', 'Jerere', 2037961, '0000-00-00', 'gustavo@gmail.com', 32727987, 1, 0, '2015-05-06 18:30:41', '0000-00-00 00:00:00', 20, 0, '', '123456', ''),
(1234566768, 'Roberval da Silva', 'Rua Martelo Machado', 'Natal RN', 123123456, '2010-06-18', 'rob@gmail.com', 98874562, 3, 0, '2015-05-06 18:58:02', '0000-00-00 00:00:00', 40, 70007, 'SMILE', '504060', ''),
(5948160505, 'João Eduardo Medeiros', 'Qualquer', 'Natal', 2079035304, '1995-06-24', 'joaoribeiromedeiros@gmail.com', 2147483647, 5, 0, '2015-05-30 17:29:53', '0000-00-00 00:00:00', 0, 0, 'BRADESCO', '', ''),
(10449431493, 'Danilo Damasceno', 'X', 'Natal-Rn', 3855581, '0000-00-00', 'danilo.g.d@hotmail.com', 2147483647, 5, 0, '2015-06-04 19:07:58', '0000-00-00 00:00:00', 40, 0, '', '', ''),
(10449431494, 'Danilo Damasceno', 'X', 'Natal-Rn', 3855581, '0000-00-00', 'danilo.g.d@hotmail.com', 2147483647, 5, 0, '2015-06-04 19:07:31', '0000-00-00 00:00:00', 40, 0, '', '', ''),
(10449431495, 'Danilo Damasceno', 'X', 'Natal-Rn', 3855581, '0000-00-00', 'danilo.g.d@hotmail.com', 2147483647, 5, 0, '2015-06-04 19:01:21', '0000-00-00 00:00:00', 40, 0, '', '', ''),
(12312345677, 'Gustavo Henrique', 'aoinnfaoin', 'Natal/RN', 2079035304, '0000-00-00', 'joaomedeiros@gmail.com', 2147483647, 4, 0, '2015-06-04 19:58:59', '0000-00-00 00:00:00', 0, 0, 'Bradesco', '', '');

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
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `especialidade` int(11) NOT NULL,
  `hentrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hsaida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_funcionario` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4875640 ;

--
-- Fazendo dump de dados para tabela `plantao`
--

INSERT INTO `plantao` (`codigo`, `especialidade`, `hentrada`, `hsaida`, `id_funcionario`) VALUES
(1, 4, '2015-06-20 14:12:11', '0000-00-00 00:00:00', 2147483647),
(58965, 1, '2015-05-06 18:46:54', '2015-10-10 04:50:10', 70007),
(256844, 4, '2015-05-06 18:47:17', '0000-00-00 00:00:00', 2147483647),
(488484, 2, '2015-05-06 18:48:01', '0000-00-00 00:00:00', 923257845),
(554865, 3, '2015-05-06 18:47:25', '0000-00-00 00:00:00', 923257845),
(555888, 1, '2015-05-06 18:46:10', '0000-00-00 00:00:00', 70007),
(589244, 2, '2015-05-06 18:47:06', '0000-00-00 00:00:00', 923257845),
(4875635, 4, '2015-05-06 18:47:52', '0000-00-00 00:00:00', 2147483647),
(4875636, 4, '2015-04-12 16:12:13', '2015-04-12 20:12:13', 2147483647),
(4875637, 4, '2015-05-20 14:12:11', '2015-05-20 14:56:11', 2147483647),
(4875638, 10, '2015-07-20 14:12:11', '2015-07-20 14:12:11', 70008),
(4875639, 12, '2015-06-20 14:12:11', '2015-06-20 14:40:11', 70007);

-- --------------------------------------------------------

--
-- Estrutura para tabela `procedimento`
--

CREATE TABLE IF NOT EXISTS `procedimento` (
  `nome` varchar(45) NOT NULL,
  `Hentrada` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Hsaida` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL,
  `id_atendente` int(11) DEFAULT NULL,
  `id_tipo_exame` int(11) DEFAULT NULL,
  `id_medico` bigint(12) DEFAULT NULL,
  `id_enfermeira` bigint(12) DEFAULT NULL,
  `id_tipo_procedimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=548785663 ;

--
-- Fazendo dump de dados para tabela `procedimento`
--

INSERT INTO `procedimento` (`nome`, `Hentrada`, `Hsaida`, `codigo`, `id_paciente`, `id_atendente`, `id_tipo_exame`, `id_medico`, `id_enfermeira`, `id_tipo_procedimento`) VALUES
('cirurgia no braço', '2015-05-06 18:55:08', '0000-00-00 00:00:00', 78755, 70007, 12312323, 0, 923257845, 12312323, 1),
('massagem cardiaca', '2015-05-06 18:53:15', '0000-00-00 00:00:00', 558947, 2147483647, 2147483647, 0, 70007, 923257845, 1),
('cirurgia de olho', '2015-05-06 18:52:09', '0000-00-00 00:00:00', 4787955, 923257845, 2147483647, 2, 70007, 923257845, 0),
('cirurgia de mão', '2015-05-06 18:56:20', '0000-00-00 00:00:00', 7787854, 70007, 12312323, 5, 2147483647, 923257845, 0),
('Cirurgia do pé', '2015-06-04 18:51:02', '0000-00-00 00:00:00', 548785656, 70007, 70007, 3, 5948160505, 5948160505, 1),
('akofihsadinasodashon', '2015-06-05 22:00:00', '2015-06-05 23:57:00', 548785657, 708090601, 2147483647, NULL, 923257845, NULL, 2),
('afasdasda', '2015-06-11 00:00:00', '2015-06-11 03:27:00', 548785658, 708090601, 2147483647, 4, NULL, 12312323, NULL),
('nada', '2015-07-15 18:01:00', '2015-07-15 20:02:00', 548785659, 0, 2147483647, 32, NULL, 0, NULL),
('Furunculo', '2015-07-05 16:13:00', '2015-07-05 17:13:00', 548785660, 708090601, 2147483647, NULL, 923257845, NULL, 2),
('dor', '2015-07-10 15:11:00', '2015-07-10 15:34:00', 548785661, 2147483647, 2147483647, 2, NULL, 0, NULL),
('nada', '2015-11-13 08:54:00', '2015-11-13 10:54:00', 548785662, 708090601, 2147483647, 33, NULL, 0, NULL);

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

--
-- Fazendo dump de dados para tabela `resultado`
--

INSERT INTO `resultado` (`examinado`, `laudo`, `id_procedimento`) VALUES
('Gustavo', 'Muito mal', 2),
('maria', 'ta sÃ³ o resto', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sistema_ponto`
--

CREATE TABLE IF NOT EXISTS `sistema_ponto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `hentrada` timestamp NULL DEFAULT NULL,
  `hsaida` timestamp NULL DEFAULT NULL,
  `id_pessoa` bigint(11) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_sistema_ponto_login_idx` (`id_pessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Fazendo dump de dados para tabela `sistema_ponto`
--

INSERT INTO `sistema_ponto` (`codigo`, `hentrada`, `hsaida`, `id_pessoa`) VALUES
(5, '2015-05-31 01:37:56', '2015-05-31 01:38:12', 5948160505),
(6, '2015-05-31 01:38:13', '2015-05-31 01:38:38', 5948160505),
(7, '2015-06-01 18:33:10', '2015-06-01 18:33:31', 5948160505),
(8, '2015-06-01 18:33:49', '2015-06-01 18:34:00', 5948160505),
(9, '2015-06-01 19:41:23', '2015-06-01 19:41:33', 5948160505),
(10, '2015-06-03 19:07:36', '2015-06-03 19:07:43', 5948160505),
(11, '2015-06-03 19:07:44', NULL, 5948160505),
(12, '2015-06-04 17:07:46', '2015-06-04 17:07:56', 5948160505),
(13, '2015-06-04 17:08:08', NULL, 5948160505),
(14, '2015-06-04 20:10:08', '2015-06-04 20:10:10', 10449431495),
(15, '2015-06-04 20:10:31', '2015-06-04 20:10:33', 10449431493);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_exame`
--

CREATE TABLE IF NOT EXISTS `tipo_exame` (
  `id_tipo_exame` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_exame`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Fazendo dump de dados para tabela `tipo_exame`
--

INSERT INTO `tipo_exame` (`id_tipo_exame`, `nome`) VALUES
(1, 'Sangue'),
(2, 'Raio X'),
(3, 'Tomografia'),
(4, 'Vista'),
(5, 'Coração'),
(32, 'Prostata'),
(33, 'Olheira'),
(34, 'Ferragem');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_material`
--

CREATE TABLE IF NOT EXISTS `tipo_material` (
  `id_tipo_material` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Fazendo dump de dados para tabela `tipo_material`
--

INSERT INTO `tipo_material` (`id_tipo_material`, `descricao`) VALUES
(1, 'Escritório'),
(2, 'Hospitalar'),
(3, 'Alimentação');

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_procedimento`
--

CREATE TABLE IF NOT EXISTS `tipo_procedimento` (
  `id_tipo_procedimento` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text NOT NULL,
  PRIMARY KEY (`id_tipo_procedimento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `tipo_procedimento`
--

INSERT INTO `tipo_procedimento` (`id_tipo_procedimento`, `descricao`) VALUES
(2, 'Cirurgia do PÃ©'),
(3, 'Massagem');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_tipo_material` FOREIGN KEY (`id_tipo_material`) REFERENCES `tipo_material` (`id_tipo_material`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `sistema_ponto`
--
ALTER TABLE `sistema_ponto`
  ADD CONSTRAINT `fk_sistema_ponto_login` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
