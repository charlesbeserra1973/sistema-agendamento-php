-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Set-2018 às 01:48
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escritorio_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamento`
--

DROP TABLE IF EXISTS `tb_agendamento`;
CREATE TABLE IF NOT EXISTS `tb_agendamento` (
  `id_agenda` int(11) NOT NULL AUTO_INCREMENT,
  `cod_dadosC` int(11) NOT NULL,
  `dt_agenda` date NOT NULL,
  `local_agenda` varchar(30) NOT NULL,
  `data_agenda` date NOT NULL,
  `horario_agenda` varchar(5) NOT NULL,
  `status_agenda` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_agenda`),
  KEY `cod_dadosC` (`cod_dadosC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

DROP TABLE IF EXISTS `tb_contato`;
CREATE TABLE IF NOT EXISTS `tb_contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `nome_contato` varchar(120) NOT NULL,
  `telefone_contato` varchar(11) DEFAULT NULL,
  `email_contato` varchar(60) DEFAULT NULL,
  `assunto_contato` varchar(30) DEFAULT NULL,
  `mensagem_contato` varchar(600) NOT NULL,
  `data_contato` date DEFAULT NULL,
  PRIMARY KEY (`id_contato`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_dadoscliente`
--

DROP TABLE IF EXISTS `tb_dadoscliente`;
CREATE TABLE IF NOT EXISTS `tb_dadoscliente` (
  `cod_dadosC` int(11) DEFAULT NULL,
  `login_dadosC` varchar(60) NOT NULL,
  `nome_dadosC` varchar(120) NOT NULL,
  `telefone_dadosC` varchar(11) NOT NULL,
  `rg_dadosC` int(9) NOT NULL,
  `dt_nasc_dadosC` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE IF NOT EXISTS `tb_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `data_login` date NOT NULL,
  `nome_login` varchar(120) DEFAULT NULL,
  `email_login` varchar(60) DEFAULT NULL,
  `senha_login` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notificacoes`
--

DROP TABLE IF EXISTS `tb_notificacoes`;
CREATE TABLE IF NOT EXISTS `tb_notificacoes` (
  `id_notifica` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_notifica` varchar(30) NOT NULL,
  `texto_notifica` varchar(60) NOT NULL,
  `data_notifica` date NOT NULL,
  `status_notifica` varchar(20) NOT NULL,
  PRIMARY KEY (`id_notifica`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
