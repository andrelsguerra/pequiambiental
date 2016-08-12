-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Ago-2016 às 01:40
-- Versão do servidor: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biosconsultori3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_PERMISSAO`
--

CREATE TABLE IF NOT EXISTS `TB_PERMISSAO` (
  `ID_PERMISSAO` int(11) NOT NULL,
  `DS_PAGINA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `TB_PERMISSAO`
--

INSERT INTO `TB_PERMISSAO` (`ID_PERMISSAO`, `DS_PAGINA`) VALUES
(1, 'add-cliente'),
(2, 'add-contato'),
(3, 'add-noticia'),
(4, 'add-operador'),
(5, 'add-pcp'),
(6, 'add-plano-acao'),
(8, 'add-projeto'),
(7, 'add-projeto-operador'),
(9, 'add-ramo-atividade'),
(10, 'add-servico'),
(11, 'add-status-projeto'),
(12, 'add-tipo-projeto'),
(16, 'add-tipo-servico'),
(15, 'delete-cliente'),
(18, 'delete-contato'),
(17, 'delete-noticia'),
(19, 'delete-operador'),
(20, 'delete-pcp'),
(21, 'delete-plano-acao'),
(22, 'delete-projeto'),
(23, 'delete-ramo-atividade'),
(24, 'delete-servico'),
(25, 'delete-status-projeto'),
(26, 'delete-tipo-projeto'),
(27, 'delete-tipo-servico'),
(28, 'edit-alterar-perfil'),
(29, 'edit-cliente'),
(30, 'edit-contato'),
(31, 'edit-noticia'),
(32, 'edit-operador'),
(33, 'edit-pcp'),
(34, 'edit-plano-acao'),
(35, 'edit-projeto'),
(36, 'edit-ramo-atividade'),
(37, 'edit-servico'),
(38, 'edit-status-projeto'),
(39, 'edit-tipo-projeto'),
(40, 'edit-tipo-servico'),
(41, 'lista-cliente'),
(42, 'lista-contato'),
(43, 'lista-noticia'),
(45, 'lista-operador'),
(44, 'lista-operador-simples'),
(46, 'lista-pcp'),
(47, 'lista-plano-acao'),
(54, 'lista-projeto'),
(48, 'lista-projeto-cliente'),
(49, 'lista-projeto-contato'),
(50, 'lista-projeto-operador'),
(51, 'lista-projeto-pcp'),
(52, 'lista-projeto-plano-acao'),
(53, 'lista-projeto-servico'),
(55, 'lista-ramo-atividade'),
(56, 'lista-servico'),
(57, 'lista-status-projeto'),
(58, 'lista-tipo-projeto'),
(59, 'lista-tipo-servico'),
(60, 'noticia'),
(61, 'noticias'),
(62, 'permissao'),
(63, 'projeto-plano-acao');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TB_PERMISSAO`
--
ALTER TABLE `TB_PERMISSAO`
  ADD PRIMARY KEY (`ID_PERMISSAO`),
  ADD UNIQUE KEY `DS_PAGINA_UNIQUE` (`DS_PAGINA`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TB_PERMISSAO`
--
ALTER TABLE `TB_PERMISSAO`
  MODIFY `ID_PERMISSAO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
