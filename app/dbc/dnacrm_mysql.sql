-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Ago-2014 às 15:46
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dnacrm`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `permissoes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `nome`, `permissoes`) VALUES
(1, 'usuario', ''),
(2, 'Administrador', '{"admin! :1}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) DEFAULT 'user.jpg',
  `email` varchar(255) DEFAULT NULL,
  `tel_fixo` varchar(15) DEFAULT NULL,
  `tel_cel` varchar(15) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `obs` text NOT NULL,
  `data_atualizado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=58 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `foto`, `email`, `tel_fixo`, `tel_cel`, `data_cadastro`, `obs`, `data_atualizado`, `nome`) VALUES
(3, 'user.jpg', 'uga@buga.com', '2312-1231', '91233-3123', '2014-07-24 20:02:21', 'Isto Ã© uma vergonha!', '0000-00-00 00:00:00', 'Uga'),
(4, 'user.jpg', 'meuemail@mic.com', '5534-8778', '96455-6521', '2014-07-24 21:05:53', 'Sei lÃ¡, qualquer coisa!', '2013-11-23 13:45:21', 'Nada'),
(9, 'user.jpg', 'paulinho@sorrentino.com', '4534-3464', '93455-3878', '2014-07-25 16:24:40', 'Shoryuken!', '2014-07-25 16:24:40', 'Paulinho'),
(10, 'user.jpg', 'vinicius@sorrentino.com', '4534-3464', '93455-3878', '2014-07-26 23:40:01', 'Tatsumakisenpuukyakuu!', '2014-07-27 00:44:53', 'Vinicius'),
(11, 'user.jpg', 'arnaldo@silva.com', '16 3245-9687', '16 98768-8475', '2014-07-27 16:23:35', 'An array defining the arguments. A valid key is a string containing a variable name and a valid value is either a filter type, or an array optionally specifying the filter, flags and options. If the value is an array, valid keys are filter which specifies the filter type, flags which specifies any flags that apply to the filter, and options which specifies any options that apply to the filter. See the example below for a better understanding.', '2014-07-27 16:23:35', 'Arnaldo da Silva'),
(12, 'user.jpg', 'renatodosreis@sorrentino.com', '19 2193-8909', '19 98579-8778', '2014-07-27 16:29:27', 'When I run the script on my linux box (php 5.2.10) the output of &#34;Example #1 A filter_var_array() example&#34;\nis actually: More information about php.net URL shortcuts by visiting our URL howto page.', '2014-07-27 16:29:27', 'Renato dos Reis Sorrentino'),
(15, 'user.jpg', 'vinicius@vlbrasil.com.br', '1637215129', '16 98137-7784', '2014-07-28 09:59:32', '', '2014-07-28 09:59:32', 'Vinicius Sorrentino'),
(16, 'user.jpg', 'dante@dmc.com', '112211221122', '112211221122', '2014-07-28 17:43:33', 'Devil May Cry!', '2014-07-28 17:43:33', 'Dante'),
(17, 'user.jpg', 'marocas@live.com', '16 3245-9687', '928282828', '2014-07-28 23:36:50', 'Testes com Banco de dados\r\n', '2014-07-28 23:36:50', 'Marocas da Silva'),
(18, 'user.jpg', 'marocas@live.com', '16 3245-9687', '928282828', '2014-07-28 23:37:37', 'Testes com Banco de dados\r\n', '2014-07-28 23:37:37', 'Marocas da Silva'),
(20, 'user.jpg', 'marocas@live.com', '16 3245-9687', '928282828', '2014-07-28 23:39:13', 'Testes com Banco de dados\r\n', '2014-07-28 23:39:13', 'Marocas da Silva'),
(21, 'user.jpg', 'biruta@cab.com', '1637215129', '16 98137-7780', '2014-07-29 00:13:44', '16 98137-7780', '2014-07-29 00:13:44', 'Sou eu!'),
(23, 'user.jpg', 'marcos@live.com', '21212121', '921212121', '2014-07-29 00:28:22', 'Maluco!', '2014-07-29 00:28:22', 'Marcos Palmeiras'),
(24, 'user.jpg', 'arm@lerolero.com', '12121212', '21212121', '2014-08-02 21:03:21', 'Testes com Banco de dados', '2014-08-02 21:03:21', 'Armando Lero'),
(30, 'user.jpg', 'macarena@messias.com.br', '1637215129', '131313132', '2014-08-02 21:31:14', 'Alguma coisa! CoraÃ§Ã£o de papelÃ£o!', '2014-08-02 21:31:14', '&#34;Mamonas Assassinas&#34;'),
(31, 'user.jpg', 'macarena@messias.com.br', '1637215129', '1313131322', '2014-08-02 21:32:30', 'Alguma coisa! CoraÃ§Ã£o de papelÃ£o!', '2014-08-02 21:32:30', '&#34;Mamonas Assassinas&#34;'),
(32, 'brasil.jpg', 'macarena@messias.com.br', '1637215129', '13131313222', '2014-08-02 21:33:52', 'Alguma coisa! CoraÃ§Ã£o de papelÃ£o!', '2014-08-02 21:33:52', '&#34;Mamonas Assassinas&#34;'),
(33, 'user.jpg', 'maria@zinha.com.br', '00000000', '000000000000', '2014-08-02 21:40:55', 'Peidfasdfasdfa sd fas  dfasfda sfa!!!!', '2014-08-02 21:40:55', 'Mariazinha do Bolebole'),
(38, 'perfil_1358322903_0.jpg', 'mar@manjo.com', '99999999', '999999999', '2014-08-04 10:23:14', 'Armando !!', '2014-08-04 10:23:14', 'Armando'),
(43, 'user.jpg', 'mar@manjo.com', '99999999', '999999999063', '2014-08-04 10:57:54', 'MamÃ£o com aÃ§Ãºcar!! ', '2014-08-04 10:57:54', 'Armando'),
(44, 'perfil_profissional.jpg', 'mamao@com.uk', '33333333', '3333333322', '2014-08-04 10:59:08', 'Ã‰ muito fÃ¡cil!!!!', '2014-08-04 10:59:08', 'MamÃ£o'),
(45, 'perfil_user.jpg', 'batm@n.com', '66666666', '6666666699', '2014-08-04 11:03:16', 'Gotham City Vigilante!', '2014-08-04 11:03:16', 'Bruce Wayne'),
(53, 'perfil_superman-injustice.jpg', 'kal-el@krypton.com', '87878787', '8787878733', '2014-08-04 11:34:06', 'Forever Kryptonian!!', '2014-08-04 11:34:06', 'Clark Kent'),
(54, 'user.jpg', 'kal-el@krypton.com', '87878787', '87878787334', '2014-08-04 11:34:32', 'Forever Kryptonian!!', '2014-08-04 11:34:32', 'Clark Kent'),
(57, 'perfil_470626_10151197671048986_1545804432_o.jpg', 'morgana@goth.com', '66679999', '966679999', '2014-08-04 14:50:55', 'The Dark Escence of a Day Nightmare...\r\n', '2014-08-04 14:50:55', 'Morgana');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_atualizado` datetime NOT NULL,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`, `salt`, `nome_usuario`, `data_cadastro`, `data_atualizado`, `grupo`) VALUES
(1, 'vinicius', 'Testando', 'salt', 'Paulinho', '2014-07-29 00:26:01', '2014-07-29 00:26:01', 1),
(2, 'Marcos', '21212121', 'salt', 'Paulinho', '2014-07-29 00:28:38', '2014-07-29 00:28:38', 1),
(3, 'admin', '767f79abd8058fb5c4c58ba0918146dd40fa0e84bbd9df87c7044ab985e3df89', '3.5^·þÆ2$T¡ù?;&Ovè€ê	côò»)', 'Administrator', '2014-08-01 15:23:17', '0000-00-00 00:00:00', 1),
(4, 'zelda', '2effe55c7642bb8b7dfe82d5a066550b18c4dc29d9a75a058b348d82a673b45f', 'Ùh(¤zñ<"tÌ\\5Õ	ì×ùZ·!À™—ÓýuqF''ï', 'Zelda', '2014-08-02 19:00:02', '0000-00-00 00:00:00', 1),
(5, 'alex', 'c9cd9d0f5207cdd043260f54b7e9a113c16964feefc935519df7ebe326b21e11', '^’S-¤–ÅØ~6R\nŠIðÒ¼€¤´g"’xÌU6‡', 'Alex Garrett', '2014-08-02 19:01:53', '0000-00-00 00:00:00', 1),
(10, 'inshideru', 'ff8396f42feb4daa1084143d17f737c553caa126b53bef61e5c8199a6cabb728', 'Xú|áñÝøƒçX-OåæQJ`SxEz)d¯àìø”', 'Ninja Spider', '2014-08-04 15:27:21', '2014-08-04 15:27:21', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
