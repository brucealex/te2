-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jun-2014 às 22:16
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `receitas_culinarias`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `sobrenome`, `ativo`, `cadastrado_em`) VALUES
(1, 'Bruno', 'Alexandre', 1, '2014-06-02 15:45:29'),
(2, 'João', 'Silva', 1, '2014-06-02 15:45:29'),
(3, 'Maria', 'Carmo', 1, '2014-06-02 18:18:47'),
(4, 'Jose', 'Souza', 1, '2014-06-02 18:19:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  `slug_categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `slug_categoria`) VALUES
(1, 'Sobremesas', 'sobremesas'),
(2, 'Tortas e bolos', 'tortas-e-bolos'),
(3, 'Massas', 'massas'),
(4, 'Carnes', 'carnes'),
(5, 'Peixes', 'peixes'),
(6, 'Receitas Rápidas', 'receitas-rapidas'),
(7, 'Receitas Light', 'receitas-light'),
(8, 'Sopas', 'sopas'),
(9, 'Vegetarianas', 'vegetarianas');

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
('5249e94ad381c20d9d95cec84770eb66', '0.0.0.0', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.114 Safari/537.36', 1401738904, 'a:3:{s:9:"user_data";s:0:"";s:7:"usuario";s:5:"bruno";s:6:"logado";b:1;}');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `aluno`, `objetivo`, `descricao`) VALUES
(2, 2, 'ganho de pesso gordura alterado', 'descricao gordura alterado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE IF NOT EXISTS `receitas` (
  `id_receita` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `slug_receita` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `categoria` int(10) unsigned NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `adicionada_quando` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_receita`),
  KEY `FK_receitas_categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`id_receita`, `nome`, `slug_receita`, `texto`, `categoria`, `foto`, `adicionada_quando`) VALUES
(1, 'Ovo Pochê', 'ovo-poche', 'Ingredientes\r\n4 unidade(s) de ovo\r\n1/2 litro(s) de água\r\n2 colher(es) (chá) de sal\r\n1 colher(es) (sobremesa) de vinagre branco\r\n\r\nModo de preparo\r\n1- Coloque a água numa panela e leve ao fogo para ferver, temperando-a com sal e vinagre, assim que isto aconteça. Quebre um ovo numa vasilha à parte e despeje sobre a água fervente. Observe que a água cobre quase todo o ovo, deixando apenas a parte superior da gema descoberta. Isso porque eu queria preparar as gemas moles. Caso as queira duras, coloque mais água.\r\n\r\n2- Deixe-os cozinhar por cerca de um minuto, até que a clara esteja bem branca, sem partes cruas e retire com o auxílio de uma escumadeira. Se gostar, moa pimenta do reino, na hora, sobre os ovos. ', 6, 'ovo-poche.jpg', '2012-01-15 18:50:57'),
(2, 'Gelatina de laranja com chantilly', 'gelatina-de-laranja-com-chantilly', 'Ingredientes\r\n\r\n    500ml de suco de laranja coado\r\n    200g de açúcar\r\n    4 folhas de gelatina\r\n    4 colheres (sopa) de licor de laranja\r\n    100ml de creme de leite fresco\r\n    Ramos de hortelã\r\n    Óleo de amendoim\r\n\r\nModo de preparo\r\n\r\nColoque a gelatina em água fria por alguns minutos, escorra e esprema bem.\r\nLeve ao fogo 100ml de suco de laranja.\r\nQuando aquecer, acrescente a gelatina e deixe dissolver, mexendo sempre.\r\nAdicione o açúcar e mais 100ml de suco e cozinhe em fogo baixo, misturando de vez em quando.Retire do fogo antes de ferver e junto o suco restante e o licor de laranja.\r\nCoe o líquido em um coador forrado com um pano limpo e deixe amornar.\r\nDivida a gelatina em 4 forminhas ligeiramente untadas com o óleo, deixe esfriar e leve à geladeira por 2 horas.\r\nPouco antes de servir, bata o creme de leite em ponto de chantili e lave as folhas de hortelã.\r\nDesenforme as gelatinas nos pratos e decore com o creme e a hortelã.', 1, 'gelatina-laranja-chantilly.jpg', '2012-01-15 19:00:40'),
(3, 'Almôndegas de microondas', 'almondegas-de-microondas', 'Ingredientes\r\n\r\nCarne:\r\n1/2 kg de carne moída\r\n1 ovo\r\n1 cebola pequena bem picada\r\n3 colheres (sopa) de salsa picada\r\n1 colher (sopa) de queijo parmesão ralado\r\n2 dentes de alho\r\nSal e pimenta do reino a gosto\r\n\r\nMolho:\r\n1 cebola média picada\r\n1 lata de molho de tomate\r\n1/2 xícara (chá) de água\r\n1 pitada de açúcar\r\nSal e pimenta do reino a gosto\r\n\r\nModo de Preparo\r\n\r\nMisture com as mãos a carne moída com o restante dos ingredientes\r\nTempere com sal e pimenta-do-reino a gosto\r\nFaça bolinhos e achate levemente\r\nColoque-os em um refratário e regue com óleo\r\nLeve ao microondas em potência alta por 8 minutos, pare na metade do tempo para mexer\r\nPrepare o molho e cubra as almôndegas\r\nVolte ao forno por 2 minutos\r\nSirva a seguir', 6, 'almondegas-de-microondas.jpg', '2012-01-15 19:09:10'),
(4, 'Onion Rings (Anéis Temperados de Cebola)', 'onion-rings', 'Ingredientes\r\n\r\n2 cebolas grandes\r\n2 xícaras de farinha de trigo\r\n2 colheres chá de sal\r\n1 colher chá de pimenta do reino\r\n1/2 xícara maisena\r\n1 xícara de água fria\r\n2 gemas\r\nÓleo suficiente para fritar\r\n1 limão cortado em quatro\r\n\r\nModo de Preparo\r\n\r\nFatie as cebolas em anéis\r\nEm uma tigela média, junte 1/2 xícara de farinha com o sal e a pimenta\r\nPolvilhe os anéis de cebola com a farinha temperada\r\nEm outra tigela, junte o resto da farinha, a maizena, a água e as gemas dos ovos, fazendo uma massa homogênia\r\nEsquente o óleo em uma temperatura de mais ou menos 180º graus\r\nMergulhe na massa os anéis polvilhados\r\nRetire o excesso de massa\r\nMergulhe os anéis no óleo para fritar por 2 a 3 minutos, até ficarem dourados\r\nFica igual aos servidos em churrascarias', 6, 'onion-rings.jpg', '2012-01-15 19:15:56'),
(5, 'Sopa de Legumes', 'sopa-de-legumes', 'Ingredientes\r\n1 tomate\r\n1 cebola\r\n2 batatas\r\n2 cenouras\r\n1 caldo de legumes\r\n1 colher de chá de margarina\r\nSal a gosto\r\n\r\nModo de Preparo\r\n\r\nCozinhe todas os legumes em 1,5 litros de água.\r\nBata tudo no liquidificador e leve ao fogo novamente para ferver com o caldo e a margarina.', 8, 'sopa-de-legumes.jpg', '2012-01-15 19:20:52'),
(9, 'Carne boa', 'carneboa', 'receita rsrserasrasd', 4, '518028d83d23c70be2a975affe68398e.jpg', '2014-06-02 17:02:12');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`, `ativo`, `cadastrado_em`) VALUES
(1, 'mestrecuca', 'cozinhar123', 1, '2012-01-23 23:55:26'),
(2, 'bruno', '123', 1, '2014-06-02 18:32:22');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `FK_receitas_categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id_categoria`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
