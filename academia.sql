-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jun-2014 às 20:49
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) DEFAULT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1',
  `cadastrado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `sobrenome`, `ativo`, `cadastrado_em`) VALUES
(3, 'Maria 2 alt', 'Carmo', 1, '2014-06-02 21:18:47'),
(4, 'Jose', 'Souza', 1, '2014-06-02 21:19:20'),
(6, 'pedro', 'jose', 1, '2014-06-03 18:24:26'),
(7, 'antonio', 'carlos', 1, '2014-06-03 18:49:51'),
(8, 'Maria ', 'Antonia', 1, '2014-06-03 18:50:20'),
(12, 'Maria 2 alt', 'Carmo', 1, '2014-06-03 20:16:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('8747f42d531c60f1f8611e48ce645c51', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', 1401820640, 'a:3:{s:9:"user_data";s:0:"";s:7:"usuario";s:5:"admin";s:6:"logado";b:1;}'),
('db6e9ff11c05b7c2f7e2224f9a1c1b50', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', 1401821192, 'a:3:{s:9:"user_data";s:0:"";s:7:"usuario";s:5:"bruno";s:6:"logado";b:1;}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ficha`
--

CREATE TABLE IF NOT EXISTS `ficha` (
  `id_ficha` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) NOT NULL,
  `objetivo` varchar(45) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id_ficha`),
  KEY `aluno` (`aluno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `aluno`, `objetivo`, `descricao`) VALUES
(3, 3, 'ganho de pesso gordura', 'fsafsafsadfsad'),
(5, 7, 'ganho de gordura pesada', 'gordura pesada é muito ruim'),
(6, 4, 'antonio objetivo d', 'descricao antonio d');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `cadastrado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`, `ativo`, `cadastrado_em`) VALUES
(2, 'bruno', '123', 1, '2014-06-02 21:32:22'),
(3, 'admin', '123', 1, '2014-06-03 21:28:32'),
(4, 'admininistrador', 'admin', 1, '2014-06-03 18:48:20');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
