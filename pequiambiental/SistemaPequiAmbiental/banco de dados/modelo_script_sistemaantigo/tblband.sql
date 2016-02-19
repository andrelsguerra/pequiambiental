-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Máquina: mysql02.biosconsultoria.com.br
-- Data de Criação: 18-Fev-2016 às 17:09
-- Versão do servidor: 5.1.54-rel12.6-log
-- versão do PHP: 5.6.14-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `biosconsultori`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblband`
--

CREATE TABLE IF NOT EXISTS `tblband` (
  `B_CodBand` int(11) NOT NULL AUTO_INCREMENT,
  `B_Band` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`B_CodBand`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `tblband`
--

INSERT INTO `tblband` (`B_CodBand`, `B_Band`) VALUES
(1, 'Atividades Minerárias'),
(2, 'Indústria Metalúrgica'),
(3, 'Indústira Química'),
(4, 'Indústria Alimentícia e Bebidas'),
(5, 'Atividades de Infra-Estrutura'),
(6, 'Serviços e Comércio Atacadista'),
(7, 'Atividades Agrossilvipastoris'),
(8, 'Geral'),
(9, 'Empresas de Consultoria'),
(10, 'Empresas públicas e Prefeituras'),
(11, 'Industria Gráfica'),
(29, 'Posto de Gasolina'),
(30, 'Transportes e Logistica'),
(31, 'Serviços de Saude'),
(32, 'Serviços Educacionais'),
(35, 'Cemitério'),
(36, 'Indústria Autopeças'),
(40, 'Usina Hidreletrica'),
(48, 'Atividades Imobiliarias'),
(49, 'Indústria Eletro Eletronica'),
(50, 'Lavanderia Industrial'),
(51, 'PEQUI AMBIENTAL');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
