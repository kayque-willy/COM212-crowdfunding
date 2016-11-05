-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 05-Nov-2016 às 20:07
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `crowd`
--
CREATE DATABASE IF NOT EXISTS `crowd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `crowd`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codAvaliador` int(11) NOT NULL,
  `codProjeto` int(11) NOT NULL,
  `nomeAvaliador` varchar(255) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codProjeto` (`codProjeto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `criterio`
--

DROP TABLE IF EXISTS `criterio`;
CREATE TABLE IF NOT EXISTS `criterio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `criterio` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `peso` int(11) NOT NULL,
  `categoriaProjeto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `criterio`
--

INSERT INTO `criterio` (`id`, `criterio`, `status`, `peso`, `categoriaProjeto`) VALUES
(9, 'Critério de avaliação de projeto', 0, 5, 'Pesquisa'),
(10, 'Critério 01', 1, 10, 'Pesquisa'),
(11, 'Critério 02', 1, 10, 'Pesquisa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota`
--

DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `id_criterio` int(11) NOT NULL,
  `id_avaliacao` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  `sugestoes` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_criterio`,`id_avaliacao`),
  KEY `avaliacao_notas_fk` (`id_avaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `imagem` blob NOT NULL,
  `video` text,
  `descricao` varchar(250) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `duracao` int(11) NOT NULL,
  `valor` double NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `repasse`
--

DROP TABLE IF EXISTS `repasse`;
CREATE TABLE IF NOT EXISTS `repasse` (
  `codProjeto` int(11) NOT NULL,
  `necessidade` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `valorParcela` float NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`codProjeto`,`necessidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(255) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  `del` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`login`, `senha`, `nome`, `cpf`, `pais`, `cidade`, `estado`, `endereco`, `data_nascimento`, `email`, `tipo`, `categoria`, `del`) VALUES
('admin', '123', 'Administrador', '00000000000', 'Brasil', 'Itajubá', 'MG', 'Unifei', '1992-08-25', 'admin@admin.com.br', 'Administrativo', NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_codProjeto_fk` FOREIGN KEY (`codProjeto`) REFERENCES `projeto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `avaliacao_notas_fk` FOREIGN KEY (`id_avaliacao`) REFERENCES `avaliacao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `criterios_notas_fk` FOREIGN KEY (`id_criterio`) REFERENCES `criterio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `repasse`
--
ALTER TABLE `repasse`
  ADD CONSTRAINT `repasse_ibfk_1` FOREIGN KEY (`codProjeto`) REFERENCES `projeto` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
