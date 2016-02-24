-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 19-Fev-2016 às 20:33
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

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
-- Estrutura da tabela `tblfunc`
--

CREATE TABLE IF NOT EXISTS `tblfunc` (
  `F_CodFunc` int(11) NOT NULL AUTO_INCREMENT,
  `F_Func` varchar(90) DEFAULT NULL,
  `F_dddC` varchar(2) NOT NULL,
  `F_Celular` varchar(60) DEFAULT NULL,
  `F_dddB` varchar(2) NOT NULL,
  `F_Ramal` varchar(60) DEFAULT NULL,
  `F_email` varchar(240) DEFAULT NULL,
  `F_emailb` varchar(240) NOT NULL,
  `F_endereco` varchar(500) NOT NULL,
  `F_bairro` varchar(90) NOT NULL,
  `F_cep` varchar(8) NOT NULL,
  `F_cpf` varchar(11) NOT NULL,
  `F_id` varchar(10) NOT NULL,
  `F_nascimento` date NOT NULL,
  `F_registroprof` varchar(11) NOT NULL,
  `F_ctfibama` int(9) NOT NULL,
  `F_msn` varchar(90) NOT NULL,
  `F_BM` varchar(36) DEFAULT NULL,
  `F_Login` varchar(18) DEFAULT NULL,
  `F_familia` varchar(90) NOT NULL,
  `F_dddF` varchar(2) NOT NULL,
  `F_contatof` varchar(10) NOT NULL,
  PRIMARY KEY (`F_CodFunc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Extraindo dados da tabela `tblfunc`
--

INSERT INTO `tblfunc` (`F_CodFunc`, `F_Func`, `F_dddC`, `F_Celular`, `F_dddB`, `F_Ramal`, `F_email`, `F_emailb`, `F_endereco`, `F_bairro`, `F_cep`, `F_cpf`, `F_id`, `F_nascimento`, `F_registroprof`, `F_ctfibama`, `F_msn`, `F_BM`, `F_Login`, `F_familia`, `F_dddF`, `F_contatof`) VALUES
(1, 'z*', '', '', '', '#', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'z*', '74', '', '', ''),
(2, 'Paulo PRADO Costa', '31', '9167-9252', '31', '3582-2685', 'ppradocosta@gmail.com', 'paulo@biosconsultoria.com.br', 'Rua Manoel Gomes Pereira, 52 apto 701', 'Serra', '30220220', '40288480678', 'MG 758663', '1958-12-19', 'CRA 7373', 0, 'biosconsultoria@hotmail.com', 'PAULO', '30220', 'Maria de Lujan Seabra de Carvalho Costa', '31', '35822685'),
(3, 'Enilda de Paula Avelar', '31', '9982-7029', '31', '9296-3097', 'enildaavelar@yahoo.com.br', 'enildaavelar@biosconsultoria.com.br', 'Rua Niquel, 268 AP 200', 'Serra', '30220280', '47503750634', 'M-2.511.97', '1963-02-18', 'CREA 36690', 1563, 'enildaavelar', 'NIL', 'NIL', 'Neibert Gelape', '31', '99569659'),
(5, 'z* Breno', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Breno', '123', '', '', ''),
(7, 'Fabiana nogueira Morais', '31', '93604986', '', '', 'fabi_n_morais@hotmail.com', 'fabiana@biosconsultoria.com.br', 'Rua PIAUÍ, 761 apt 303', 'SAnta efigênia', '30150320', '33736826818', '439153736', '1987-12-09', '68358/04-d', 5270997, 'fabi_n_morais@hotmail.com', 'fabiana', 'bios11', 'carmen', '17', '33243807'),
(9, 'MARIA DE Lujan SEABRA DE CARVALHO COSTA', '', '31 9167-9253', '', '31 3582-2685', 'lujan@biosconsultoria.com.br', 'lujan@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'lujan', '123456', '', '', ''),
(11, 'z* Rafael Farnese', '', '31 83083587', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'z* Rafael Farnese', 'q8q84r6g', '', '', ''),
(12, 'z - Flávia Peres Nunes', '31', '31 87882984', '31', '3184511880', 'ppradocosta@uol.com.br', 'ppradocosta@uol.com.br', 'Rua Nísio Batista de Oliveira 429', 'São Lucas', '30140090', '03945415616', 'MG10731690', '1978-04-06', 'CRBio 37137', 1035844, 'flavia_pnunes@hotmail.com', 'flavia', 'paulao', 'aparecida peres', '31', '36742984'),
(13, 'Giselle SARAIVA DE Melo', '31', '97197478', '31', '84560063', 'giselle@biosconsultoria.com.br', 'giselle@biosconsultoria.com.br', 'rua gentil portugal do brasil, 55 bloco 52 apt 304', 'camargos', '30520540', '82911827600', 'M6608151', '1974-05-15', '40161', 3583150, 'meninadamontanha', 'Giselle', 'gisa1625', 'Márcia Abreu', '31', '34177478'),
(15, 'Cláudia Mendonça', '', '31 9217 1908', '', '31 32847671', 'integrartec.claudia@gmail.com', 'integrartec.claudia@gmail.com', '', '', '', '48943509634', '', '0000-00-00', '', 0, '', 'Claudia', 'bo123', '', '', ''),
(16, 'Marcela Teixeira Lopes Silva', '31', '8773-3632', '31', '8456-0065', 'marcela@biosconsultoria.com.br', 'marcela@biosconsultoria.com.br', 'Rua Anita Garibaldi, 145 - apto 501', 'Luxemburgo', '30380230', '06904685638', '14008849', '1985-04-26', '110760', 3252455, 'marcelatlsbios@hotmail.com', 'marcela', 'garraf', 'Manoel  (pai) / Stella (mãe)', '35', '34218438'),
(17, 'Gabriela', '', '31 ', '31', '83640972', 'gabriela@biosconsultoria.com.br', 'gabriela@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', '2012', 'LINHARES', '', '', ''),
(18, 'GABRIELA ', '31', '', '31', '32621488', '', 'admin@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'GABRIELA', 'AG1510', '', '31', ''),
(21, 'Sandra CRISTINA DEODORO', '31', '91487034', '', '', 'sdeodoro@hotmail.com', 'sandra@biosconsultoria.com.br', 'Rua da Bahia, 478, apto 1905', 'Centro', '30160010', '04298239675', 'MG11210436', '1981-04-07', 'CREA104941', 3084795, 'sandrageog@hotmail.com', 'Sandrageo', 'ufmg', 'Paulo Antônio', '31', '88966734'),
(22, 'Z   paula quissakZ ', '55', '31 84499466', '55', '3132621488', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'PAULAQ', 'BIOS15', '', '', ''),
(23, 'z* Izabella Fernandes França', '', '35413513', '', '92192497', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'izabella', '', '', '', ''),
(24, 'Maria Lúcia Prado Costa', '31', '36576278', '', '31 84710192', 'luciacosta@paraguassu.com.br', 'luciaprado@biosconsultoria.com.br', 'rua ceará 1004 apt. 1002', 'funcionários', '30150311', '60958910600', 'mg-749497', '1957-11-21', '2.199', 1032815, 'lucia47', 'LUCIA', '191258', 'Francisco prado Costa', '31', '36576278'),
(25, 'Bianca Massula Santos', '31', '87318070', '', '', 'biancamassula@yahoo.com.br', 'bianca@biosconsultoria.com.br', 'Rua Conde de Linhares, 55, Ap 402', 'Cidade Jardim', '30380030', '01612988695', 'MG11388615', '1987-04-25', 'Crea 131719', 5274877, 'biancamassula', 'bianca', 'bianca', 'Kátia Maria Paixão Massula Santos', '31', '95062886'),
(26, 'André Carvalho Pfeilsticker', '31', '91787522', '', 'RAMAL 214 ', 'andre_pfeil@hotmail.com', 'andre.pfeilsticker@biosconsultoria.com.br', 'Rua Dom Aristídes Porto', 'Coração Eucarístico', '30535450', '', 'mg12142723', '1982-07-06', '04.9.000014', 5889184, 'andre_pfeil@hotmail.com', 'andre p', 'bios20', '', '', ''),
(27, 'Marcelo', '31', '85788909', '31', '32621488', 'marcelo@biosconsultoria.com.br', 'marcelo@biosconsultoria.com.br', 'Rua Davi Campista', 'Floresta', '30150090', '05882017661', '11268040', '1987-01-22', '', 5449801, 'celoa.xavier@hotmail.com', 'Marcelo', 'fumec', 'Maria Cristina Rocha Machado', '31', '85788008'),
(29, 'CAROLINA de Carvalho Alvim', '31', '87742184', '', '', 'carolalvim@yahoo.com.br', 'docmanager@biosconsultoria.com.br', 'Rua Tavares Bastos, 248/402', 'Cidade Jardim', '30380170', '01450531644', 'MG21223753', '1981-10-22', '', 0, 'linaseabra@hotmail.com', 'Carol', 'ibm', 'Silvia', '31', '88663010'),
(30, 'Daniel Costa', '', '', '', '', 'daniel@biosconsultoria.com.br', 'd.carvalhocosta@gmail.com', '', '', '', '', '', '0000-00-00', '', 0, '', 'daniel', '30220220', '', '', ''),
(31, 'Aron Rener Caldeira e Silva', '31', '93770467', '', '', 'aronrener@yahoo.com.br', 'aron@biosconsultoria.com.br', 'Rua Catete 708 Apto 201', 'Alto Barroca', '30431016', '09031503606', 'MG 1188818', '1987-10-07', '', 5131983, 'aron@biosconsultoria.com.br', 'aron', 'aron19', 'Norah Roselie Caldeira e Silva (Mãe)', '33', '34214406'),
(32, 'z*  Errado', '', '31 35822685', '', '', 'pdecarvalhocosta@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Pedro', '123', '', '', ''),
(33, 'z*  Carla Rubinger', '', '31 87461606', '', '31 30477149', 'crubinger@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Carla ', 'bios10', '', '', ''),
(34, 'z*  Matheus Fonseca', '', '3227.0118  ', '', '9785-0127', 'matheus@biosconsultoria.com.br', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Matheus', 'fumec10', '', '', ''),
(35, 'z*  Elaine', '', '91966046', '', '84649975', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'elaine', 'cecon10', '', '', ''),
(36, 'Rayssa', '', '31 96841465', '', '31 34885608', 'rayssa@biosconsultoria.com.br', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Rayssa', 'bios10', '', '', ''),
(37, 'z* Carla Rubinger', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'z* Carla Rubinger', '', '', '', ''),
(38, 'Biólogo campo', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'BIOCAMPO', '2015', '', '', ''),
(39, 'Técnico  química ', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'TECQUI', '2015', '', '', ''),
(40, 'Jardineiros', '', '', '', '', 'ppradocosta@gmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'JARDIM', '2015', '', '', ''),
(41, 'jose paulo cambraia', '31', '32229822', '', '', 'josepcambraia@gmail.com', 'JOSEPCAMBRAIA@GMAIL.COM', '', '', '', '', '', '0000-00-00', '', 0, '', 'JPCAMBRAIA', 'BIOS15', '', '', ''),
(42, 'JARDINEIROS PEQUI', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'TC2', 'tc2', '', '', ''),
(43, 'Diretoria', '', '', '', '', 'lujancarvalhocosta@hotmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'DIR', 'dir', '', '', ''),
(45, 'Assistente Administrativo 2', '', '', '', '', 'nessavelar@hotmail.com', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'AADM2', 'aadm2', '', '', ''),
(46, 'Assistente Administrativo 1', '', '', '', '', 'alice_ssilva@yahoo.com.br', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'AADM1', 'aadm1', '', '', ''),
(47, 'Vanessa SOUZA AVELAR', '31', '91398778', '31', '84649975', 'vanessa@biosconsultoria.com.br', 'vanessa@biosconsultoria.com.br', 'Rua Jose Antenor,551', 'Heliopolis', '31760040', '05567125607', '12.297.428', '1981-04-01', '', 0, 'vanessa.bios', 'VANESSA', 'BIOS14', 'Enio', '31', '99618858'),
(49, 'Natália Pereira Matheus', '31', '84841459', '', '', 'nataliapmatheus@hotmail.com', 'natalia@biosconsultoria.com.br', 'Rua Carlos Peixoto, 186', 'Santa Efigênia', '30240460', '06741873694', 'mg13122844', '1985-09-08', '', 0, '', 'Naty', 'Xxxxxx', 'Andréa Pereira 9648-0214', '31', '33732247'),
(50, 'Pedro Henrique Lacerda', '31', '86481764', '31', '32621488', 'pedro@biosconsultoria.com.br', 'pedro@biosconsultoria.com.br', 'Rua Dante, 61 - casa', 'São Lucas', '30240290', '08029169612', '10680991', '1987-09-27', '', 5465392, 'pedrohenrique.lacerda', 'pedrolacerda', '913507', 'Rozianni (tia Sagrada Família)', '31', '34829151'),
(51, 'EX Lucas', '', '9312-4937 ', '', '3411-9462 ', 'lucas@biosconsultoria.com.br', 'lucas@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'Lucas', 'lucas2011', '', '', ''),
(52, 'z* Ivan', '', '3267-1703	', '', '8453-1053	', 'ivanruela25@yahoo.com.br	', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Ivan', 'viado', '', '', ''),
(53, 'Marianne', '', '35 99925738', '', '35 33441236', 'mariannecbarros@hotmail.com', '', '', '', '', '01165563665', '', '0000-00-00', '', 0, '', 'Mari', 'bios2011', '', '', ''),
(54, 'Z - Andrea', '31', '88961669', '31', '33443320', 'andrea@biosconsultoria.com.br', 'flavia@biosconsultoria.com.br', '', '', '30140-09', '', '', '0000-00-00', '', 0, '', 'Andrea', 'bios12', '', '', ''),
(55, 'Sincero DOS sANTOS DUMONT FILHO', '31', '997013834', '31', '984898896', 'SINCEROFILHO@GMAIL.COM', 'sincero@biosconsultoria.com.br', 'RUA ITANHANDU 263 AP101', 'CARLOS PRATES', '30710500', '76790614672', '5694652', '1974-01-31', '', 0, '', 'SINCERO', 'GEO12', 'FLAVIA DUMONT', '31', '997012513'),
(56, 'Anna Karina Saint Clair dos Santos', '31', '84683636', '', '', 'akscs@hotmail.com', 'anna@biosconsultoria.com.br', 'Rua Maria Angélica Ximenes, 604', 'São Benedito', '33120280', '10583994628', 'MG12031664', '1991-03-02', '', 5970453, 'annasaintclair', 'Anna', 'anna2929', 'Heloisa Saint Clair', '31', '36371155'),
(57, 'z* Sandra Fragroso', '', '', '', '', 'sandrafragoso@biosconsultoria.com.br', 'sandrafragoso@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'Sandra F', 'bios2012', '', '', ''),
(58, 'Rafaela PEDROSA', '31', '9771-3011', '', 'RAMAL 220', 'rafaelapedrosa@hotmail.com.br', 'rafaela@biosconsultoria.com.br', 'Rua Campo Alto, 08 - Nova Lima/MG', 'Centro', '34000000', '09773655652', '11725380', '1989-11-07', 'CREA 148845', 5525748, 'rafaelabios', 'Rafaela', 'bios2012', 'Jorge', '31', '35413044'),
(59, 'Marcia aparecida coutinho shimabukuro', '31', '96736770', '', 'ramal 205', 'marcia.shimabukuro@gmail.com', 'marcia@biosconsultoria.com.br', 'Rua Florália, 214 ap. 801', 'Anchieta', '30310690', '04902095645', '12222246', '1981-12-11', '80230/04-D', 5139824, 'mArcia.bios', 'MARCIA', 'ORQUIDEA&22', 'diego henrique rodrigues', '31', '97035658'),
(60, 'Z - Carolina Marta de magalhães pinto aun', '31', ' 97254515', '31', '32754159', 'auncarol@hotmail.com', 'carolina_aun@biosconsultoria.com.br', 'rua francisco feio 70/1001', 'gutierrez', '30430310', '01370603606', 'mg7796195', '1974-05-02', '', 5607169, 'auncarol@hotmail.com', 'AUN cAROL', '2014', 'otávio', '31', '91346004'),
(61, 'LIDER DE CAMPO', '', '', '', '', 'ppradocosta@uol.com.br', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'LIDER', '123', '', '', ''),
(62, 'Violeta Andrade Assir', '', '', '', '', 'violetaassir@gmail.com', 'violetaassir@gmail.com', '', '', '', '', '', '0000-00-00', '', 0, '', 'VIOLETA', 'TUNICO', '', '', ''),
(63, 'Z*Lívia Ferreira Miranda', '31', '91361696', '', '', 'livia.engambiental@gmail.com', 'docmanager@biosconsultoria.com.br', 'R. Icaraí 789 / 303', 'Caiçara', '30770160', '10281958696', 'MG13184777', '1989-02-01', '157089/MG', 5660588, 'livia.bios@hotmail.com', 'Livia', 'bios2013', 'Fatima Miranda', '31', '92015005'),
(64, 'Adrienne CECILIA MARTINS', '31', '9226-9906', '', 'ramal 214', 'adriennerodrigues@gmail.com', 'adrienne@biosconsultoria.com.br', 'Avenida Men de Sá, 225, apto 402, Bloco 3', 'Santa Efigênia', '30260270', '06923610656', 'MG10910274', '1985-11-22', '', 5497995, 'Adrienne Rodrigues', 'Adrienne', 'drigeo', 'Aquiles', '31', '91070171'),
(65, 'z* cancelado', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'z* cancelado', '', '', '', ''),
(66, 'Marcela ROBERTA Martins', '31', '96546982', '', '', 'marcela.martins@biosconsultoria.com.br', 'marcela.martins@biosconsultoria.com.br', 'Rua São Francisco,56', 'Centro', '34505100', '08181415655', 'MG12023372', '1988-02-11', '087816', 5612702, 'marcelamartins.bios@hotmail.com', 'MMARTINS', '087816', 'Júlia e Ivani', '31', '36711053'),
(67, 'Lucinéia RODRIGUES Correia', '31', '91507006', '', '', 'LRODCORREIA@HOTMAIL.COM', 'lucineia@biosconsultoria.com.br', '', '', '', '01410901629', '11363950', '0000-00-00', '', 0, '', '8080', '8080', '', '', ''),
(68, 'Maria Sílvia Cambraia', '', '', '', '', 'mariasilviacambraia@yahoo.com.br', 'mariasilviacambraia@yahoo.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'Maria Silvia', '', '', '', ''),
(69, 'z - Pedro Costa', '31', '35822685', '31', '3132621488', 'pdecarvalhocosta@gmail.com', 'pedro.costa@biosconsultoria.com.br', 'Rua Manoel Gomes Pereira, 52 apto 701', 'Serra', '30220220', '', '', '0000-00-00', '', 0, '', 'Pedro Costa', 'ufmg2013', '', '31', '91679252'),
(70, 'Marcelo Carlos', '31', '86667453', '', '', 'scmpuc@yahoo.com.br', 'marcelo.silva@biosconsultoria.com.br', 'RUA VARGEM GRANDE, 234', 'J. TERESÓPOLIS', '32681280', '01168837669', '7118063', '1977-06-17', 'CREA 107833', 5811539, 'marcelo.carlos77', 'MARCELO S', 'BIOS20', 'Patricia', '31', '85697453'),
(71, 'Philipe Zam', '', '', '', '', 'philipe@biosconsultoria.com.br', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'Philipe', 'zanmed12', '', '', ''),
(72, 'Adriano Luiz Tibães', '31', '9218-3434', '', '', 'tibaesbiologo@gmail.com', 'adriano@biosconsultoria.com.br', 'Rua engenheiro zoroastro torres, nº517, apto:304', 'santo antônio', '30350260', '07690769632', 'mg10075782', '1986-09-13', '', 5299138, 'adrianotibaes', 'adriano', 'bios13', 'silvia Aparecida alves ferreira', '38', '91922282'),
(73, 'Lillyan Kelly Oliveira Higino DE AQUINO', '33', '9905-3776', '33', '32621488', 'lillyanhigino@yahoo.com.br', 'propostas@biosconsultoria.com.br', 'Rua Petrolina, 795', 'Sagrada Família', '3103030', '08857376605', 'M7671483', '1988-11-30', 'CRA01050426', 0, 'lillyan.aquino', 'LILLYAN', 'BIOS15', 'Leonardo Teixeira de Aquino ( Marido)', '33', '99651431'),
(75, 'z - MARCELO DELVAUX', '', '', '', '', 'marcelodelvaux@yahoo.com.br', 'marcelodelvaux@yahoo.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'Delvaux', 'bios2013', '', '', ''),
(76, 'richardson DE OLIVEIRA silva', '31', '36744335', '31', '84901627', 'ricksabara@oi.com.br', 'RICHARDSON@BIOSCONSULTORIA.COM.BR', 'Rua tomaz Gonzaga, 17', 'São Francisco', '34505160', '87170590620', 'MG6450312', '1972-12-18', 'MG150007D', 5866891, '', 'richardson', 'biosrick59', 'Daniela ', '31', '87318890'),
(78, 'andre coutinho de Oliveira Castro', '31', '9161-7050', '', 'RAMAL 213', '', '', 'rua bom jesus da penha, 769 - ap 403 - bl 45', 'santa terezinha', '31365190', '08484896676', 'MG15407041', '2013-12-17', '162231/D', 5830275, 'andrecoutinhodeoliveira', 'ANDRE', 'biscoi', 'rayssa macedo silva', '31', '92162337'),
(79, 'Marcela chinelato', '31', '85313346', '', '', 'marcelachinelato@hotmail.com', 'docmanager @biosconsultoria.com.br', 'rua guaiba, 156', 'alipio de melo', '30830370', '01565101626', 'mg12043001', '1990-01-06', '', 0, 'marcelachinelato@hotmail.com', 'CHINMAR', '2014', 'neize aparecida de freitas costa', '31', '96042648'),
(80, 'Z* Silas gOMES DA sILVA', '31', '97265127', '', 'RAMAL 214', 'silasgsilva@hotmail.com', 'SILAS@BIOSCONSULTORIA.COM.BR', 'rua vitório marçola 859/1001', 'anchieta', '30310360', '07886820673', 'mg12177838', '1990-04-10', '', 0, '', 'Silas', 'bios2013', 'jordane gomes da silva', '31', '99750219'),
(81, 'katia', '31', '88047953', '', '', 'ktialucas@yahoo.com.br', 'katia@biosconsultoria.com.br', 'rua agostinianos , n° 73', 'bandeirantes', '32240420', '01588474999', 'mg14071653', '1988-07-14', '', 0, 'katiabios', 'katia', 'bios2013', 'elton', '31', '99576955'),
(82, 'raidan CRISTIAN SANTANA', '31', '8898-3212', '31', '8449-6795', 'raidan_cristian@hotmail.com', 'financeiro@biosconsultoria.com.br', 'rua oiapoque, 137', 'morro das bicas', '34400000', '09834049684', 'mg11101461', '0000-00-00', '', 0, 'raidan.bios', 'financeiro', 'bios2013', 'maria angela da silva(mãe)', '31', '99398008'),
(83, 'ERIKA henriques pacheco', '31', '9664-8804', '', '', 'bioerikahp@hotmail.com', 'ERIKA@PEQUI.ECO.BR', 'rua raimundo vaz de melo 109/301', 'dona clara', '31260120', '04746706603', 'MG7130756', '1981-01-08', '', 6035856, 'BIOERIKAHP@HOTMAIL.COM', 'erika', '2014', 'CLeLTON FALEIRO PACHECO', '31', '91434205'),
(84, 'paulo henrique Silva Araújo', '31', '88955370', '', 'ramal 214', '', 'PAULO. HENRIQUE@BIOSCONSULTORIA.COM.BR', 'Rua Nelson', 'união', '31170770', '07891181659', '12458867', '1986-09-18', '', 0, 'pahesiar', 'phenrique', 'bios2014', 'silvania maria silva araújo', '31', '93080282'),
(85, 'MARIANA pEREIRA CHIARADIA', '31', '98700856', '', '', 'm.CHIARADIA.EQ@GMAIL.COM', 'MARIANA@PEQUI.ECO.BR', 'rua herval, 587/301', 'serra', '30240010', '07176919690', '8631280', '1985-07-31', '', 0, 'MARIANA.PEREIRA.CHIARADIA', 'MARIANA', '192631', 'pollyanna', '31', '99855800'),
(86, 'z*NAThALIA BONFIM QUINTAS', '31', '87452468', '', 'RAMAL 215', 'nathalia.bonfim@biosconsultoria.com.br', 'nathalia.bonfim@biosconsultoria.com.br', 'rUA cARVALHO DE BRITO 927', 'GENERAL CARNEIRO', '34585570', '06593368636', 'MG11627465', '1983-06-12', '', 6054402, 'NATHALIA.BONFIM3', 'N.BONFIM', 'BIOS2014', 'JEANE F. BONFIM QUINTAS', '31', '36710494'),
(87, 'NELLY STAFLEU FROES DE OLIVEIRA', '31', '93268961', '', '', 'nellystafleu@hotmail.com', 'NELLY@BIOSCONSULTORIA.COM.BR', 'rua serra do cipó', 'conjunto ribeiro de abreu', '31872280', '11527791688', 'mg12906005', '1994-01-26', '', 6131937, 'nelly.froes', 'NELLY', '260194', 'ivete inácio froes de oliveira', '31', '95502660'),
(89, 'iandra KELLY DOS SANTOS valInNa', '31', '99958192', '', '', 'iandra_valina@hotmail.com', 'iandra@biosconsultoria.com.br', 'rua manoel magalhães 129', 'coqueiros', '30881080', '08658050670', 'mg15513964', '1989-04-17', '87823/04', 5596065, 'iandra.valina', 'IANDRA', '010914', 'tereza gomes dos santos ', '31', '34730905'),
(90, 'LAIS DOS SANTOS SOUSA', '31', '93937778', '31', '84496795', 'lais.santossousa@hotmail.com', 'TECSEG@PEQUI.ECO.BR', 'rua: b - numero 199', 'colorado', '32143290', '09261339697', 'mg15661478', '1989-11-20', '', 0, '', 'LAIS', 'PEQUI', 'Luiza', '31', '33938560'),
(91, 'josé paulo cambraia', '', '', '', '', 'jpcambraia@gmail.com', 'JPCAMBRAIA@GMAIL.COM', '', '', '', '', '', '0000-00-00', '', 0, '', 'josepcambrai', 'bios15', '', '', ''),
(92, 'luiz otávio', '31', '99641992', '', '', 'luizoliveiralopes@gmail.com', 'luizotavio@biosconsultoria.com.br', 'Rua dos arquitetos, 634', 'alípio de melo', '30840160', '10680412697', 'mg15926290', '1992-07-26', '', 0, 'luiz.bios', 'LUIZ OTÁVIO', 'bios2015', '', '31', '34711695'),
(93, 'POLLYANNA CRISTINA DE MIRANDA SILVA', '31', '88711770', '', '', 'POLLYANNA.ENGENHEIRA@YAHOO.COM.BR', 'POLLYANNA@BIOSCONSULTORIA.COM.BR', 'rUA ALOISIO DE AZEVEDO 110 BL10 AP402', 'SANTA MONICA', '31525410', '07874441621', 'MG13053696', '1987-10-15', '', 0, 'POLLYANNA.BIOS', 'POLLYANNA', 'BIOS15', 'DENISE', '31', '98393155'),
(94, 'Maísa Mendes Braga', '31', '98675-9717', '', '', 'MAISA.MENDESB@GMAIL.COM', 'MAISA@BIOSCONSULTORIA.COM.BR', 'CRUZ ALTA, 750 - AP 302 (BLOCO 1)', 'ALTO DOS PINHEIROS', '30530150', '08430677640', '15850774', '1988-04-17', '', 0, 'MAISABRAGA17', 'MAISA', '1704', 'CARLOS JUNIOR', '31', '996766091'),
(95, 'paula b quissak', '', '84499466', '31', '94120204', '', 'PAULA.QUISSAK@BIOSCONSULTORIA.COM.BR', '', '', '', '', '', '0000-00-00', '', 0, '', 'PAULABQ', 'BIOS15', '', '', ''),
(96, 'ANDRE WEBER', '', '', '', '', 'aaweber87@gmail.com', 'AAWEBER87@GMAIL.COM', '', '', '', '', '', '0000-00-00', '', 0, '', 'ANDRE_w', 'BIOS2015', '', '', ''),
(98, 'MILENE PAULA NEVES', '31', '93968807', '', '', 'mipaulaneves@hotmail.com', 'milene@biosconsultoria.com.br', 'rUA rONY gARZON gOMES, N° 32, APTO. 02', 'OSWALDO BARBOSA PENA II', '34000000', '05214943628', 'MG12589826', '1982-11-12', '', 0, 'MILENE NEVES', 'MILENE', '2015', 'Guilherme (Marido)', '31', '87668423'),
(99, 'ADRIANE DA SILVA MARTINO PINHO', '31', '997444382', '', '', 'asmpinho@gmail.com', 'adriane.pinho@biosconsultoria.com.br', 'praça marino mendes campos, 12 apt 603', 'anchieta', '30310460', '11361744600', 'mg16157727', '1993-02-20', '', 6326321, 'adriane.pinho', 'ADRIANE', 'edwiges', 'shirley mara araujo da silva', '31', '99578150'),
(101, 'MARIANE ALINY OLIVEIRA SOUZA', '33', '91325224', '', '', 'marianeaos91@gmail.com', 'mariane.souza@biosconsultoria.com.br', 'Av. flávio dos santos, 394 ap 101', 'floresta', '31015150', '10879429690', 'mg17430904', '1991-07-30', 'CRea 180495', 6122634, 'marianeaos', 'MARIANE', '2016', 'natália oliveira souza', '31', '83508473'),
(102, 'JOAO RAIMUNDO DE CARVALHO LOPES', '', '', '', '', 'joaordecl@gmail.com', 'joaordecl@gmail.com', 'rua haiti, 256 apto 502', 'sion', '', '', '', '0000-00-00', '', 0, '', 'JOAO LOPES', '2015', '', '', ''),
(103, 'LUCAS MICHEL FERREIRA', '37', '99448617', '', '', 'machaerion@gmail.com', 'LUCAS.FERREIRA@BIOSCONSULTORIA.COM.BR', 'RUA MESSIAS MACEDO 194 ', 'CENTRO', '35588000', '08976134656', 'MG15293352', '1988-05-14', '', 0, 'LUCASBIO', 'LUCAS', '2016', 'ieda (mae)', '37', '33521351'),
(104, 'Carine PEREIRA faioli', '31', '94336940', '31', '32621488', '', 'tecseg@biosconsultoria.com.br', 'rod mg005 km 13', 'rosario', '34565900', '03645904670', '', '1979-10-09', '', 0, 'carine.bios', 'CARINE', '2015', 'joao', '31', '88364689'),
(105, 'thays EMANUELLE SOUZA nunes', '31', '85926803', '', 'RAMAL 213', 'thaysemanuellesn@hotmail.com', 'THAYS@BIOSCONSULTORIA.COM.BR', 'Rua sete de abril, 142 a', 'josé de almeida', '34000000', '08872754607', 'Mg16043733', '1991-01-25', '', 0, 'THAYS_282', 'THAYS', '202020', 'JÚNIO CRISTIANO REZENDE', '31', '88191308'),
(106, 'BERNARDO CUNHA DE GODOY', '31', '998426369', '', '', 'bernardo@biosconsultoria.com.br', 'BERNARDO@BIOSCONSULTORIA.COM.BR', '', '', '', '', '', '0000-00-00', '', 0, '', 'BERNARDO', 'BIOS15', '', '', ''),
(107, 'MAGNO naoli santos miranda', '31', '93783287', '', '', 'magno@biosconsultoria.com.br', 'MAGNO@BIOSCONSULTORIA.COM.BR', 'rua jade ', 'prado', '30411088', '08622554651', 'mg14942123', '1992-08-27', 'estagiário', 0, 'magno@biosconsultoria.com.br', 'MAGNO', 'BIOS15', 'moacir do nascimento miranda jr', '31', '91090688'),
(108, 'VEICULO 4X4', '', '', '', '', 'logistica@biosconsultoria.com.br', 'logistica@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'FROTA', 'FROTA', '', '', ''),
(109, 'VEICULO basico', '', '', '', '', 'logistica@biosconsultoria.com.br', 'logistica@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'FROTA', 'FROTA', '', '', ''),
(110, 'hospedagem', '', '', '', '', 'logistica@biosconsultoria.com.br', 'logistica@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'hotel', 'hotel', '', '', ''),
(111, 'transporte (avião, onibus, etc)', '', '', '', '', 'logistica@biosconsultoria.com.br', 'logistica@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'FROTA', 'FROTA', '', '', ''),
(112, 'aereo', '', '', '', '', '', 'logistica@biosconsultoria.com.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'AEREO', '2012', '', '', ''),
(113, 'André docm', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'ANDRE1', '12345', '', '', ''),
(114, 'TIAGO DA COSTA OLIVEIRA', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 0, '', 'TIAGO', '012015', '', '', ''),
(115, 'PAULA BASTOS', '', '', '', '', '', 'paula@pequi.eco.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'PAULA', '12345', '', '', ''),
(116, 'EDNA SIMÕES', '', '', '', '', '', 'edna@pequi.eco.br', '', '', '', '', '', '0000-00-00', '', 0, '', 'EDNA', '12345', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
