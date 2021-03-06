-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 23-Fev-2016 às 23:02
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `biosconsultori3`
--
CREATE DATABASE IF NOT EXISTS `biosconsultori3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `biosconsultori3`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `id_arquivo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT NULL,
  `extensao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_arquivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_perfil`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_AGENCIA_AMBIENTAL`
--

CREATE TABLE IF NOT EXISTS `TB_AGENCIA_AMBIENTAL` (
  `ID_AGENCIA_AMBIENTAL` int(11) NOT NULL AUTO_INCREMENT,
  `NM_AGENCIA_AMBIENTAL` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_AGENCIA_AMBIENTAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Extraindo dados da tabela `TB_AGENCIA_AMBIENTAL`
--

INSERT INTO `TB_AGENCIA_AMBIENTAL` (`ID_AGENCIA_AMBIENTAL`, `NM_AGENCIA_AMBIENTAL`) VALUES
(1, 'SUPRAM CENTRAL METROPOLITANA'),
(2, 'SUPRAM SUL DE MINAS'),
(3, 'IEF VARGINHA'),
(4, 'BIOS'),
(5, 'SMMA PBH'),
(6, 'SUPRAM ALTO SAO FRANCISCO'),
(7, 'SEDUMA CONTAGEM'),
(8, 'CAMARA DE VEREADORES'),
(9, 'IGAM'),
(10, 'IEF - BH'),
(11, 'SEPLAN - MG'),
(12, 'IBAMA - SUPER MG BH'),
(13, 'IEF LAVRAS'),
(14, 'ANA - AGENCIA NACIONAL DE AGUAS'),
(15, 'COPASA'),
(16, 'CLIENTE'),
(17, 'IPHAN'),
(18, 'SEMEIA - BETIM'),
(19, 'INPI - REGISTRO MARCAS'),
(20, 'SMA Sabará'),
(22, 'DPF - DEP. DE POLICIA FEDERAL'),
(23, 'SMMA CONTAGEM'),
(66, 'SERVIÇO DE LIMPEZA URBANA - SLU'),
(98, 'SUPRAM NORTE'),
(99, 'IBAMA BRASÍLIA'),
(100, 'SEDRU - '),
(101, 'SUPRAM LESTE'),
(102, 'NOISE'),
(103, 'BIOSLAB'),
(104, 'TRANSCON'),
(105, 'SMA Nova Lima'),
(106, 'SMA Sete Lagoas'),
(107, 'SEMACE Agencia Ambiental Ceará'),
(108, 'BHTRANS'),
(109, 'COMPUR'),
(110, 'SUPRAM TRIANGULO MINEIRO'),
(111, 'PEQUI'),
(112, 'IAP - Inst Amb Paraná'),
(113, 'INSTITUTO DE AGUAS DO PARANA'),
(114, 'INEA - INST ESTADUAL DO AMBIENTE'),
(115, 'INEMA'),
(116, 'CETESB'),
(118, 'SEC MA RIO DE JANEIRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_CLIENTE`
--

CREATE TABLE IF NOT EXISTS `TB_CLIENTE` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NM_CLIENTE` varchar(100) DEFAULT NULL,
  `NR_CNPJ` varchar(45) DEFAULT NULL,
  `TX_OBSERVACAO` text,
  `NM_LOGRADOURO` varchar(100) DEFAULT NULL,
  `NR_NUMERO` varchar(45) DEFAULT NULL,
  `DS_COMPLEMENTO` varchar(45) DEFAULT NULL,
  `NM_BAIRRO` varchar(100) DEFAULT NULL,
  `NR_CEP` varchar(45) DEFAULT NULL,
  `NM_CIDADE` varchar(45) DEFAULT NULL,
  `NM_UF` varchar(45) DEFAULT NULL,
  `DT_ATUALIZACAO` datetime DEFAULT NULL,
  `FK_RAMO_ATIVIDADE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  KEY `fk_TB_CLIENTE_TB_RAMO_ATIVIDADE1_idx` (`FK_RAMO_ATIVIDADE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=634 ;

--
-- Extraindo dados da tabela `TB_CLIENTE`
--

INSERT INTO `TB_CLIENTE` (`ID_CLIENTE`, `NM_CLIENTE`, `NR_CNPJ`, `TX_OBSERVACAO`, `NM_LOGRADOURO`, `NR_NUMERO`, `DS_COMPLEMENTO`, `NM_BAIRRO`, `NR_CEP`, `NM_CIDADE`, `NM_UF`, `DT_ATUALIZACAO`, `FK_RAMO_ATIVIDADE`) VALUES
(1, 'AÇOFORJa', '16716417000', 'Enilda Escrever o nome dos Contatos - Marco Aurélio e ....', 'ENGENHEIRO JANUÁRIO ALVARENGA SANTOS', '300', '', 'DISTRITO INDUSTRIAL CELSO MELO SANTA', '33040220', 'SANTA LUZIA', 'MG', NULL, 2),
(2, 'COSTA CAFÉ COMÉRCIOO EXP. IMPORTAÇÃO', '54122775000', 'Armazem de Café em Varginha.\r\nProjeto Armazem de Beneficiamento de Café com AAF e, posteriormente, requerer  LO de expansão com o processo de rebeneficio', 'AMADOR BUENO FLORENCE,', '274', NULL, 'AEROPORTO', '13990000', 'ESPIRITO SANTO DO PINHAL', 'SP', NULL, 7),
(3, 'DOCMANAGER - ROBERTO MURTA', '', '25/01/2008 - Test Drive da versão web RETA FINAL', 'MARCO AURÉLIO DE MIRANDA', '87', '01', 'BURITIS', '304770', 'BELO HORIZONTE', 'MG', NULL, 8),
(4, 'TRANSPORTADORA COMETA S/A', '10970887000609', '01/02: Novo email Claudinei\r\n\r\nAgência COMAC - LOC RCA/PCA', 'SAGITÁRIO, 410', NULL, NULL, 'DISTRITO INDUSTRIAL RIACHO DAS PEDRAS', '32242210', 'CONTAGEM', 'MG', NULL, 6),
(5, 'SEMPER S/A SERVIÇO MÉDICO PERMANENTE', '17312976000100', '27/02: Soliocitei a Vera verificar se Wania recebeu email e se será necessário marcar uma reunião p/ discutir a proposta. Marcada reunião c/ Wania p/ sexta-feira 9:30h', 'ALAMEDA EZEQUIEL DIAS', ' 389', '', 'SANTA EFIGÊNIA', '30130110', 'BELO HORIZONTE', 'MG', NULL, 6),
(6, 'TRANSPORTADORA AMERICANA LTDA', '43244631000754', 'Enviado e-mail relembrando prazo 14 de março para protocolo IC.\r\nProcesso 0459/01-02-LOC-AG:SMA Contagem.', 'SETE, 290', NULL, NULL, 'DISTRITO INDUSTRIAL RIACHO DAS PEDRAS', '32250060', 'CONTAGEM', 'MG', NULL, 6),
(7, 'ZANINI INDUSTRIA DE AUTO PEÇAS LTDA', '02232278000110', 'Cleber Gerente SGI - Tentar vender auditoria\r\nGilsimar', 'RUA MOACIR JARDIM', '355', '', 'NOSSA SENHORA DO ROSÁRIO', '35670000', 'MATEUS LEME', 'MG', NULL, 2),
(8, 'CNH industrial- case new holland', '02232278000110', '', ' GAL. DAVID SARNOFF', '', '', 'INCOFIDENTES', '35670000', 'CONTAGEM ', 'MG', NULL, 2),
(9, 'POSTO ANGOLA LTDA', '25290396000180', 'Indicaçao Milton Casério', 'ROSÁRIO ', '1001', '', 'ANGOLA', '32630000', 'BETIM', 'MG', NULL, 29),
(10, 'POSTO PICA PAU LTDA', '86675105000166', NULL, 'HELENA VASCONCELOS COSTA', '4447', NULL, 'BETÁCULAS PEROBAS', '32340000', 'CONTAGEM', 'MG', NULL, 6),
(11, 'AUTO POSTO TIBIRIÇÁ LTDA', '03061316000181', 'Indicaçao Milton Casério', 'JUIZ MARCO TÚLIO ISACC', '4200', NULL, 'JARDIM DAS ALTEROSAS', '32651000', 'BETIM', 'MG', NULL, 29),
(12, 'TREVO DERIVADOS DE PETRÓLEO LTDA.', '14486153000871', '', 'ANEL RODOVIÁRIO LESTE', ' km 5005', '', 'independência', '39400000', 'MONTES CLAROS', 'MG', NULL, 1),
(13, 'PREFEITURA MUNICIPAL DE SABARA', '18715441000135', '', 'DOM PEDRO II', '200', '', 'CENTRO', '', 'SABARÁ', 'MG', NULL, 10),
(14, 'ALSTOM', '', NULL, 'ALVARES CABRAL', NULL, NULL, 'LOURDES', '30000000', 'BELO HORIZONTE', 'MG', NULL, 8),
(15, 'JABIL CIRCUIT', '04854120000298', 'Eletro eletronico: celulares, impressoras, periféricos, terminal de débito - Nova sede em Betim.\r\nEm setembro 2007 o Coelho volta para o lugar do Geraldo.', 'RODOVIA FERNÃO DIAS', '', 'BR-381 KM 433', 'JARDIM DAS ALTEROSAS', '32536000', 'BETIM', 'MG', NULL, 2),
(16, 'BIOS', '07630454000195', '', 'RIO GRANDE DO NORTE', '726', 'SALA 1605', 'SAVASSI', '30130131', 'BELO HORIZONTE', 'MG', NULL, 9),
(19, 'SEMAD', '23253867000154', NULL, 'ESPIRIITO SANTO', '433', NULL, 'CENTRO', '3000000', NULL, NULL, NULL, 10),
(20, 'CONSÓRCIO HIDRELÉTRICA DE AIMORÉS - CHA', '02995825000119', '', 'FAZENDA VIÇOSA', 's/n', NULL, 'DISTRITO DE STO ANTÔNIO DO RIO DOCE', '', 'AIMORÉS', 'MG', NULL, 40),
(21, 'GEORGES BROEMME AROMAS E FRAGRÂNCIAS LTDA', '19405166000116', 'Cliente indicado pelo Joao Qualieng', 'ANTIGA ESTRADA CARMO DA MATA PARA ITAPECIRICA', 'Km 3', NULL, 'FAZENDA BOA ESPERANÇA', '347000', 'CARMO DA MATA', 'MG', NULL, 3),
(24, 'LABORME PARTICIPAÇÕES E EMPREENDIMENTOS', '02711179000110', '', 'BERNARDO MONTEIRO', '96', NULL, 'FLORESTA', '30150280', 'BELO HORIZONTE', 'MG', NULL, 48),
(25, 'CANAA LAVANDERIA INDUSTRIAL', '012303000118', 'Daniela e Rodolfo (35) 3435-4461\r\nAntônio Marcos e Silvana\r\n(11) 6674-5052\r\nIBAMA LOGIN = 01255303/0001-18 senha tadzwfrr', 'FERNAO DIAS', 'km 889,5', '', 'RURAL', '30130131', 'EXTREMA', 'MG', NULL, 3),
(26, 'LEGGETT & PLATT (ADMINISTRATIVO)', '03213075000572', '27/02: Enviei email solicitando docs, inf e prjetos. Informei sobre vistoria da Raquel - APA Fernão Dias.', 'DOM AGUIRRE', '3125', NULL, 'VILA ÁLVARO SOARES', '18090005', 'SOROCABA', 'MG', NULL, 2),
(27, 'UNIMINAS AGROINDUSTRIAL LTDA', '', NULL, 'RODOVIA FERNÃO DIAS BR 381 ', 'km 901', NULL, 'DISTRITO INDUSTRIAL', '', 'CAMANDUCAIA', 'MG', NULL, 3),
(28, 'GRAN VIVER', '01464823000130', 'Sr. Marcio, Sr Fernando e Graciela (31) 3516.6600', 'PERNAMBUCO ', '453', '', 'Funcionários', '', 'BELO HORIZONTE', 'MG', NULL, 48),
(30, 'RONA GRÁFICA E EDITORA', '23253867000154', NULL, 'MEM DE SÁ', NULL, NULL, 'SANTA EFIGENIA', '30000000', 'BELO HORIZONTE', 'MG', NULL, 6),
(31, 'PERENE LTDA', '18328153000128', '', 'AFONSO PENA', '941', '3o Andar', '', '30130002', 'BH', 'MG', NULL, 6),
(32, 'SERRA MORENA EMPREENDIMENTOS', '23253867000154', 'Nelson Rigoto de Gouvea e Nelsinho\r\nMarcos Vinicius consultor imobiliario', 'DAVID CAMPISTA, ....', '236', NULL, 'FLORESTA', '', 'BELO HORIZONTE', 'MG', NULL, 48),
(33, 'POSTO ALBATROZ', '23253867000154', NULL, 'AFONSO PENA', NULL, NULL, NULL, '', 'BELO HORIZONTE', 'MG', NULL, 6),
(35, 'CLIMA TERMO', '00850146000126', 'Condominio das Amendoeiras depois do quebra molas.\r\nCliente indicadc pela Claudia BO - proposta enviada para LO e SGASGI visita agendada', 'JOÃO AZEREDO COUTINHO ', '100', NULL, 'JARDIM IPÊ', '33400000', 'BELO HORIZONTE', 'MG', NULL, 8),
(36, 'BELGO BEKAERT ARAME LTDA', '61074506000130', 'VERIFICAR CADASTRO SUPERBUY', 'GENERAL DAVID SARNOFF', '909 ', 'A', 'CIDADE INDUSTRIAL', '32210110', 'CONTAGEM', 'MG', NULL, 2),
(37, 'AMBEV', '', '', 'MG 050', 'KM 46 e 47', '', 'JUATUBA', '', 'JUATUBA', 'MG', NULL, 4),
(38, 'ALVO ARTES GRÁFICAS', '05680664000162', '26/02: Alfredo ligou, está aguardando os projetos para marcarmos reunião.', 'AQUILES LOBO, 479C', '', NULL, 'FLORESTA', '30150160', 'BH', 'MG', NULL, 11),
(39, 'MAGNETI MARELLI', '', '15/02: Edir vai amanhã à COPASA e vai enviar os docs para serem protocolados na SMC. O contato será assinado em 15 dias. Não há laudo de baixa, conforme Tadeu. Prazo 12 de março', 'JOAO CÉSAR DE OLIVEIRA', '6261', NULL, 'VILA BEATRIZ', '', 'CONTAGEM', 'MG', NULL, 3),
(40, 'POSTO KEPLER', '00998121000174', '', 'KEPLER', '241', '', 'SANTA LÚCIA', '', 'BELO HORIZONTE', 'MG', NULL, 8),
(41, 'U&M MINERAÇÃO E CONSTRUÇÃO S/A', '18540906001136', 'Licença de operação - AG: FEAM. Protocolo 015248/2006-24/02/2006.\r\n\r\n27/02: Processo em analíse técnica.', 'MARTINS DA COSTA,', '156', NULL, 'PARÁ', '1', 'ITABIRA', 'MG', NULL, 1),
(43, 'PROEMA AUTOMOTIVA S/A', '04450767000254', 'Riccardo Paparoni', 'ENGENHEIRO GERHARD ETT', 'S/Nº  -  LT 09', NULL, 'DISTRITO INDUSTRIAL ', '32530480', 'BETIM', 'MG', NULL, 2),
(44, 'MAGNETI MARELLI COFAP - FABRICANTE DE PEÇAS', '51597433001502', '', 'FERNÃO DIAS - BR 381', 'km 429', '', '', '32560460', 'BETIM', 'MG', NULL, 2),
(45, 'MERCANTIL BANDEIRANTE POSTO PARANAÍBA', '01789453000101', NULL, 'TEREZA CRISTINA, ', '2650', NULL, 'PADRE EUSTAQUIO', '30720230', 'BELO HORIZONTE', 'MG', NULL, 6),
(46, 'MINERAÇÃO LAGOA SECA', '19791615000373', NULL, 'PROFESSOR CRISTOVAN DOS SANTOS', '444', NULL, 'BELVEDERE', '', 'BELO HORIZONTE', 'MG', NULL, 1),
(47, 'FARIA BRAGA ASSOCIADOS S/C', '', '', 'PADRE ROLIM', '133 ', ' 8 andar', 'FUNCIONÁRIOS', '', 'BELO HORIZONTE', 'MG', NULL, 8),
(48, 'VERCON', '', NULL, 'JUIZ MARCO TÚLIO ISAAC', '2777', NULL, 'RIACHO DAS AREIAS', '', 'BETIM', 'MG', NULL, 8),
(49, 'GRUPO BVL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 8),
(50, 'MARLIN EMPREENDIMENTOS LTDA', '', NULL, 'AMÉRICO VESPÚCIO', '501', NULL, 'PQ RIACHUELO', '', 'BELO HORIZONTE', 'MG', NULL, 8),
(51, 'SEMAE - SERVIÇO MUNICIPAL DE AGUA E ESGOTO DE OURO PRETO', '07758228000194', 'Nayana é diretora?', 'MECÂNICO JOSÉ PORTUGUÊS', '240', NULL, 'SÃO CRISTÓVÃO', '35400000', 'OURO PRETO', 'MG', NULL, 10),
(52, 'CICLOPE', '71337356000163', NULL, 'BR 265 ', 'KM 142', NULL, 'SANTA CRUZ', '37200000', 'LAVRAS', 'MG', NULL, 2),
(53, 'CNH INDUSTRIAL - iveco', '', '', 'MG 238', 'KM 74', '', '', '35703900', 'SETE LAGOAS', 'MG', NULL, 36),
(54, 'USIFAST LOGISTICA INDUSTRIAL', '', NULL, 'DAS INDUSTRIAS', '136', NULL, 'PARQUE SAO JOAO', '32341490', 'CONTAGEM', 'MG', NULL, 6),
(55, 'GEO AVALIAR', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 9),
(56, 'SONOCO', '00496586001360', NULL, 'ALBERTO VIEIRA ROMÃO', '1700', NULL, 'DISTRITO INDUSTRIAL', '37230000', 'ALFENAS', 'MG', NULL, 6),
(58, 'HERCULES AUTOMOTIVE', '71102099000180', NULL, 'PREFEITO ALBERTO MOURA', '7570', NULL, 'BAIRRO DAS INDÚSTRIAS', '35702216', 'SETE LAGOAS', '0G', NULL, 2),
(59, 'PRINTT', '', NULL, 'PREFEITO ALBERTO MOURA', NULL, NULL, NULL, '', 'SETE LAGOAS', 'MG', NULL, 2),
(60, 'DENSO MAQUINAS ROTANTES', '', '', 'CAMPO DE OURIQUE ', '401', '', 'JARDIM ALTEROSAS', '', 'BETIM', 'MG', NULL, 2),
(61, 'HERBOFLORA', '', NULL, NULL, NULL, NULL, NULL, '', 'MACHADO', NULL, NULL, 4),
(62, 'RIMA', '', 'Indicacao do Marco Aurelio Acoforja', 'ANEL RODOVIÁRIO', 'KM 4,5', NULL, NULL, '31950640', 'BELO HORIZONTE', 'MG', NULL, 2),
(63, 'JV SELEÇÕES', '02480405000280', 'Endereço para correspondência: Av. Abílio Machado, 1264. Bairro Alípio de Melo - CEP 30830-000. Belo Horizonte/MG\r\nVania esposa', 'SANTO ANTÔNIO', '202', NULL, 'NOSSA SENHORA APARECIDA', '35690000', 'BELO HORIZONTE', 'MG', NULL, 6),
(64, 'algar', '', '', '', '', '', '', '', 'UBERLANDIA', 'MG', NULL, 6),
(65, 'AMBIENTAL BRASIL TECNOLOGIA', '', NULL, 'PROF. MARIO WERNECK 2170 ', 'SALA 701', NULL, 'BURITIS', '', 'BELO HORIZONTE', 'MG', NULL, 9),
(66, 'FIBRAV', '', NULL, 'JOAQUIM ANDRÉ DE CARVALHO', '1.800', NULL, NULL, '37480000', 'LAMBARI', 'MG', NULL, 8),
(67, 'CONVAÇO -  CONSTRUTORA VALE DO AÇO LTDA', '', NULL, 'BRASIL', '130', NULL, 'IGUAÇU', '35162036', 'IPATINGA', 'MG', NULL, 2),
(68, 'SAAD S.A.', '', NULL, NULL, NULL, NULL, NULL, '', 'LONDRINA', 'PR', NULL, 6),
(69, 'SEBRAE MG', '', NULL, 'BARÃO HOMEN DE MELO', '329', NULL, 'JARDIM AMÉRICA', '30460090', 'BELO HORIZONTE', 'MG', NULL, 10),
(70, 'SISTRAC SISTEMAS ACÚSTICOS LTDA', '06087511000179', '', 'JOÃO AZEREDO COUTINHO', '100 ', 'B ', 'JARDIM IPÊ', '33400000', '', '', NULL, 8),
(71, 'EGESA', '', 'Construtora', '', '', '', 'OLHOS DÁGUA', '', 'BELO HORIZONTE', 'mg', NULL, 5),
(72, 'FRUM - TECNOLOGIA EM FREIOS', '', NULL, 'FERNÃO DIAS KM 883,5', NULL, NULL, NULL, '37640000', 'EXTREMA', 'MG', NULL, 8),
(73, 'CONSÓRCIO UHE BAGUARI', '07884280000197', '', 'CONTORNO', ' 7069', 'sala 605 ', 'SANTO ANTÔNIO', '30110000', 'BELO HORIZONTE', 'MG', NULL, 40),
(74, 'EGESA - ENGENHARIA', '', NULL, 'ADELINO TESTI, 50', NULL, NULL, 'OLHOS D ÁGUA', '30390070', 'BELO HORIZONTE', 'MG', NULL, 6),
(75, 'MINASPETRO', '', NULL, 'AMOROSO COSTA', '144', NULL, NULL, '30350570', 'SANTA LUZIA', 'MG', NULL, 6),
(76, 'FUNDAMAR', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(77, 'MERCOMOLAS LAVRAS', '', 'Fazer Contato', '', '', NULL, '', '', '', '', NULL, 36),
(78, 'TIM (VIDA TELECOM)', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(79, 'FUNED - FUNDAÇÃO EZEQUIEL DIAS', '17503475000101', NULL, 'CONDE PEREIRA DOS CARNEIRO', '80', NULL, 'GAMELEIRA', '30150010', 'BELO HORIZONTE', 'MG', NULL, 10),
(80, 'LINUS PAULING LTDA', '', NULL, 'RUA FLORIANO PEREIRA NETO', '176', NULL, 'DISTRITO INDUSTRIAL', '35720000', 'MATOZINHOS', 'MG', NULL, 3),
(82, 'MINASPLASTIC', '', NULL, 'MG 050', NULL, NULL, NULL, '', 'MATEUS LEME', 'MG', NULL, 2),
(84, 'VALE MANGANÊS E LIGAS', '', '', 'MOACIR MORAIS', '225', NULL, 'MORRO DA MINA', '36400000', 'CONSELHEIRO LAFAIETE', 'MG', NULL, 1),
(85, 'ITAMBÉ', '', NULL, 'ITAMBÉ, 40 ', NULL, NULL, 'FLORESTA', '30150150', 'BELO HORIZONTE', 'MG', NULL, 4),
(87, 'LEGGETT & PLATT DO BRASIL', '03213075000149', '', 'GENÉSIO VARGAS', '1425', '', 'CUBATÃO', '37650000', 'CAMANDUCAIA', 'MG', NULL, 2),
(88, 'ALMG - GABINETE WANDER BORGES', '', NULL, 'RODRIGUES CALDAS', '30', NULL, 'SANTO AGOSTINHO', '30190921', NULL, NULL, NULL, 10),
(89, 'MULTILASER', '', 'Endereco em Camanducaia\r\nNomes do sócios', 'ROBERT BOSCH', '469', NULL, 'BARRA FUNDA', '01141010', 'SÃO PAULO', 'SP', NULL, 49),
(90, 'ATE II TRANSMISSORA DE ENERGIA', '', '', 'MAL. CÂMARA 160', 'salas 1536/37', NULL, '', '', 'RIO DE JANEIRO', 'RJ', NULL, 40),
(91, 'CAMPOS DE CATAGUÁ EMPREENDIMENTOS IMOBILIÁRIOS LTDA ', '', 'Pai da Isabella', 'FELIPE DOS SANTOS 260', '101', NULL, 'CENTRO', '', 'BETIM', 'MG', NULL, 48),
(92, 'KA SOLUTION TECNOLOGIA EM SOFTWARE LTDA', '', '', 'BACAETAVA, 396', '', NULL, 'MORUMBI', '', '', '', NULL, 8),
(93, 'INSTITUTO DE PESQUISA E PLANIFICAÇÃO DA CIDADE', '', '', '', '', NULL, '', '', 'SÃO LUÍS', 'MA', NULL, 10),
(94, 'NANSEN S.A. INSTRUMENTOS DE PRECISÃO', '171276000141', '', 'JOSÉ PEDRO ARAÚJO', '960', '', 'CINCO', '32341560', 'CONTAGEM', 'MG', NULL, 8),
(95, 'ELSTER MEDIÇÃO DE ENERGIA LTDA', '', '', 'MARCOS WAINSTEIN ', '447', NULL, '', '94930360', 'CACHOEIRINHA', 'RS', NULL, 2),
(96, 'ABSOLUTA ENGENHARIA AMBIENTAL LTDA', '', '', 'SERGIPE, 925', 'sala 1102', NULL, 'SAVASSI', '30130171', 'BELO HORIZONTE', 'MG', NULL, 9),
(97, 'UNIMED BH ', '', 'Cooperativa de Trabalho Médio', 'AV. FRANCISCO SALES', '', '', 'SANTA EFIGÊNIA', '', 'BELO HORIZONTE', 'MG', NULL, 31),
(99, 'DDZOOM AMBIENTAL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(100, 'REDE EDITORA GRÁFICA LTDA', '06914474000125', NULL, 'AQUILES LOBO', '469', NULL, 'FLORESTA', '', 'BELO HORIZONTE', 'MG', NULL, 11),
(101, 'AMBIENTE RURAL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(102, 'LOCALIZA fleet s/a', '02286479000108', 'gestao  de frotas da localiza', 'ava ber', '', '', '', '', '', '', NULL, 6),
(103, 'CANOPUS', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(104, 'OCUPACIONAL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(105, 'SHOPPISCINAS ICL', '', 'José Geraldo', '', '', NULL, '', '', 'BETIM', '', NULL, 8),
(106, 'SAS CERTIFICADORA', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(107, 'BRASIL PCH', '', 'Indicacao do Alexandre Queiroz \r\nMonte Serrat ', 'RUA SANTO ANTONIO ', '250', '', '', '', 'TRES RIOS', 'RJ', NULL, 40),
(108, 'REDE POSTOS IGÁS ', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(109, 'PCH BRASIL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(110, 'TRANSCON', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 1),
(114, 'UNIFENAS CAMPUS ITAPOAN', '', 'Universidade e Centro de Especialidades Médicas', 'LIBANO', '66', NULL, 'ITAPOAN', '', 'BELO HORIZONTE', 'MG', NULL, 32),
(116, 'VOTORANTIM METAIS ZINCO S/A', '', '', '', '', '', '', '', 'Três Marias', 'MG', '2008-06-06 08:02:42', 2),
(117, 'BRASS BRASIL', '', '', 'AVENIDA DO CONTORNO', ' 5351 ', 'SALA 410', ' FUNCIONÁRIOS', '', '', '', '2008-06-11 09:19:24', 1),
(118, 'CONSORCIO BAGUARI PACUERA', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:21:43', 8),
(119, 'FLAVIO ADJUNTO', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:22:35', 8),
(120, 'MAGOTTEAUX', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:23:20', 8),
(121, 'SUNCOKE', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:23:42', 8),
(122, 'ME DELETE', '', '', '', '', '', '', '', '', '', '2008-06-11 09:23:59', 8),
(123, 'PLASCAR', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:24:25', 8),
(124, 'GELATGEL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:24:42', 8),
(125, 'EQUIPEX', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:25:06', 8),
(126, 'IGARAPE', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:25:24', 8),
(127, 'RAPIDÃO COMETA', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:25:38', 8),
(128, 'POSTO MARLIM', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:26:13', 8),
(129, 'POSTO ESTORIL', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:26:36', 8),
(130, 'OURO PRETO', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:26:53', 8),
(131, 'POSTO IGAS TUPI', '', '', '', '', '', '', '', '', '', '2008-06-11 09:27:08', 29),
(132, 'METRON ACUSTICA', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-06-11 09:27:25', 8),
(133, 'VALLOUREC & SUMITOMO TUBOS DO BRASIL LTDA', '', NULL, 'OLINTO MEIRELES', '65-L7Q131', NULL, 'BARREIRO DE BAIXO', '30640010', 'BELO HORIZONTE', 'MG', '2008-07-22 09:23:28', 1),
(134, 'GELOSO PARTICIPAÇOES', '42963165000109', 'Junior\r\nsecretária Lucimar \r\nLoteamento Trilhas do Ouro em Rio Acima. \r\nJazida de Argila no DNPM - Geologo Paulo Rangel\r\ngeólogo Paulo Nantes(97535066) Caso Argila', 'AFONSO PENA, 4200', NULL, NULL, 'MANGABEIRAS', '30130009', 'BELO HORIZONTE', 'MG', '2008-09-03 08:26:48', 5),
(135, 'HAZTEC ', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '2008-12-04 06:16:37', 8),
(136, 'GENERAL ELETRIC DO BRASIL', '', 'FABRICANTE DE COMPONENTES ELETRICOS', ' GENERAL DAVID SARNOFF', '4650', '', 'CIDADE INDUSTRIAL', '32210110', 'CONTAGEM', 'MG', '2009-01-09 13:28:11', 2),
(138, 'SADA TRANSPORTES E ARMAZENAGEM SA', '', 'Garagem e Oficina de Veiculos - Cegonheiros', 'GUSTAF DALEN', '151', '', 'DI PAULO CAMILO', '32530510', 'BETIM', 'mg', '2009-01-14 13:52:25', 30),
(139, 'HOSPITAL LIFE CENTER', '', 'Hospital Geral', 'CONTORDO', NULL, NULL, 'SERRA', '', 'BELO HORIZONTE', 'MG', '2009-01-26 07:59:59', 31),
(140, 'CEMITÉRIO PARQUE CRISTO REDENTOR', '', 'Cemitério Parque em Ribeirao das Neves ', '', '', NULL, '', '', 'RIBEIRÃO DAS NEVES', 'MG', '2009-01-28 07:29:43', 35),
(141, 'FUNDEP - FUNDAÇÃO DE DESENVOLVIMENTO E PESQUISA', '', 'Comprador: FERNANDA MATOS   (31) 3459-3312   fernandamatos@hrtn.fundep.ufmg.br\r\n', '', '', NULL, '', '', '', '', '2009-02-05 07:19:37', 31),
(142, 'FUNDAÇAO JOAO PINHEIRO', '', '', 'DAS ACASSIAS', '', NULL, 'SAO LUIS', '', 'BELO HORIZONTE', 'MG', '2009-02-05 13:33:09', 10),
(143, 'AEL ENGENHARIA', '', '', '', '', '', '', '', '', '', '2009-02-11 11:22:56', 5),
(144, 'MAGNETI MARELLI PEDALEIRA', '', 'LIGADA A COFAP', '', '', NULL, '', '', '', '', '2009-02-18 13:06:25', 36),
(145, 'MAGNETI MARELLI PEDALEIRA', '', 'LIGADA COFAP', '', '', NULL, '', '', '', '', '2009-02-18 13:07:27', 36),
(146, '* cliente cancelado', '', 'Cancelado este registro', '', '', '', '', '', '', '', '2009-03-03 11:45:36', 8),
(147, 'CIA. CEDRO CACHOEIRA', '', 'Hidreletrica Cipó', 'PARAÍBA', '', NULL, '', '', 'BELO HORIZONTE', '', '2009-03-09 15:30:05', 8),
(150, 'CONDOMÍNIO TIRADENTES - Associação', '', 'Condominio residencial semi implantado', '', '', '', '', '', 'SAO JOSE DA LAPA', 'mg', '2009-03-13 14:04:58', 48),
(151, 'CIA DE FIAÇAO E TECIDOS CEDRO E CACHOEIRA', '17245234000100', 'PCH Usina Vau da Lagoa - Santana do Riacho', 'POLICENA MASCARENHAS', '680', NULL, 'SAO GERALDO', '35700184', 'SETE LAGOAS', 'MG', '2009-03-13 14:57:18', 40),
(152, 'ENDESA GERAÇÃO BRASIL', '', 'Indicaçao Claudia Castro', 'LEONI RAMOS', 'N. 01', NULL, 'SÃO DOMINGOS', '', 'NITEROI', 'RJ', '2009-03-18 08:16:43', 40),
(153, 'CF GOMMA', '', 'Multinacional - fornecedoras de autopeças plásticas por extrusão', 'KM 430', '', NULL, 'JD TERESOPOLIS', '32664000', 'BETIM', 'MG', '2009-03-23 12:55:57', 36),
(154, 'CF GOMMA BRASIL LTDA', '02184524000105', '', 'BR 381', 'KM 430', NULL, 'JARDIM TERESOPOLIS', '32663250', 'BETIM', 'MG', '2009-03-27 07:39:10', 36),
(155, 'POSTO LUXEMBURGO', '', 'Posto BR', '', '', NULL, '', '', 'BELO HORIZONTE', '', '2009-05-11 08:30:21', 8),
(156, 'SANTO ANTONIO ENERGIA', '', 'Hidreletrica Rio Madeira', 'LAURO SODRÉ', '2800', NULL, 'NACIONAL', '76802449', 'PORTO VELHO', 'RO', '2009-05-11 09:18:44', 8),
(157, 'MMMMMM', '', '', '', '', '', '', '', '', '', '2009-05-11 09:18:43', 8),
(158, 'EMBRAPACK EMBALAGENS LTDA. ', '', 'Tel.: (31) 3529.2900\r\nFax: ( 31) 3529.2945\r\nLuiz Antonio - Seg e MA', 'RUA GRACYRA RESSE DE GOUVEIA', '1791 ', '', 'JARDIM PIEMONT', '32680610', 'BETIM', 'MG', '2009-05-13 13:14:50', 3),
(159, 'CEMIG - CIA ENERGÉTICA DE MINAS GERAIS', '', '', 'AV. BARBACENA', '', NULL, '', '', '', '', '2009-06-27 07:18:43', 40),
(160, 'LUCIANO SETTE DE ABRIL - POSTO SETTE', '04136764634', '', '', '', NULL, '', '', 'GUANHAES', 'mg', '2009-07-01 11:14:31', 29),
(161, 'ASACORP EMPREENDIMENTOS E PARTICIPAÇÕES S/A', '09163921000140', '', 'RUA ALVARENGA PEIXOTO (31)3298-8063', '1455', '', 'SANTO AGOSTINHO', '30180121', 'BELO HORIZONTE', 'MG', '2009-07-08 15:58:58', 48),
(162, 'JCMG ADVOGADOS E CONSULTORES', '', 'Contato Dr. Luiz Otavio e Bernado estagiario (colega do Rodrigo)\r\nRepresentantes de um fundo de pensao britanico que pretende investir em Silvicutura ', '', '', NULL, '', '', 'BELO HORIZONTE', 'MG', '2009-07-15 16:11:07', 7),
(163, 'FERLIG FERRO LIGA LTDA', '', 'Contato da Flávia Peres e Ricardo Barata', '', '', NULL, '', '', '', '', '2009-07-21 11:35:01', 2),
(164, 'ORTENG MCT', '', 'Unidade fabricante de Geradores', 'RUA JOSÉ PEDRO DE ARAÚJO', '981', NULL, 'CINCO', '32341560', 'CONTAGEM', 'MG', '2009-08-03 14:13:43', 8),
(165, 'GEOECONOMICA CONSULTORIA', '', 'consultoria de Mineracao e Recursos Hidriocos.\r\nwww.geoeconomica.com.br\r\nDiretor Jorge Raggi\r\nIndicacao da Sandra- colega', '', '', NULL, '', '', 'BELO HORIZONTE', '', '2009-08-06 09:35:56', 48),
(166, '* cliente invalido - repetido', '', 'cadastro cancelado', '', '', '', '', '', 'SETE LAGOAS', 'MG', NULL, 4),
(167, 'COOPERAUTO', '', 'POSTO DE ABASTECIMENTO NAS INSTALAÇÕES DA GERDAU AÇOMINAS', 'AV. SERRA DE OURO BRANCO', 'S/N', NULL, '', '', 'CONGONHAS', 'MG', '2009-08-10 15:42:29', 29),
(168, 'THYSSENKRUPP BILSTEIN BRASIL LTDA', '', '', 'AV INDUSTRIAL', '1850', '', 'JD DAS ROSAS', '32400000', 'IBIRITÉ', 'MG', '2009-08-11 11:23:05', 36),
(169, 'MOBILE LTDA', '26260513000125', 'B-10-06-5 - FABRICAÇÃO DE MÓVEIS DE METAL COM COM TRATAMENTO QUÍMICO SUPERFICIAL E/OU PINTURA POR ASPERSÃO', 'RUA ULHOA CINTRA', ' 32', '', 'SANTA EFIGENIA', '34000000', 'NOVA LIMA', 'MG', '2009-08-21 10:04:25', 8),
(170, 'PERENE LTDA', '', 'Moteis Sabará', '', '', NULL, '', '', 'BELO HORIZONTE', '', '2009-08-25 10:05:16', 48),
(171, 'PERENE LTDA', '', 'Moteis Sabará', '', '', NULL, '', '', 'BELO HORIZONTE', '', '2009-08-31 09:08:32', 6),
(172, 'FREE TIME HOTEL', '', 'Contato Free Time Turismo 31 87262827 Julio César - Educacao Ambiental', '', '', NULL, '', '', '', '', '2009-08-31 17:47:37', 6),
(173, 'ESCO SOLDERING COMÉRCIO E INDÚSTRIA LTDA.', '', 'Indicação Faria Braga', 'AV. ENGENHEIRO GERHARD ETT ', ' 1.215', '', 'DISTRITO INDUSTRIAL', '32530260', 'BETIM', 'MG', '2009-09-02 15:42:09', 49),
(174, 'CLARO LAVANDERIA', '05968963000115', '', 'RUA ESTORI, 124', '', NULL, 'SÃO FRANCISCO', '312180', 'BELO HORIZONTE', 'MG', '2009-09-02 17:33:20', 8),
(175, 'RAMOS IMPORTAÇÃO & EXPORTAÇÃO LTDA', '05055635000371', 'CONTATO FEITO VIA NET', 'AV DELTA', '433', '', 'VILA PARIS', '32372070', 'CONTAGEM', 'MG', '2009-09-09 14:57:33', 4),
(176, 'RAMOS IMPORTAÇÃO & EXPORTAÇÃO LTDA', '05055635000371', 'CONTATO VIA NET', 'AV DELTA, 433', '', NULL, 'VILA PARIS', '32372070', 'CONTAGEM', 'MG', '2009-09-09 15:01:40', 4),
(177, 'joao', '', '', '', '', '', '', '', '', '', '2009-10-06 19:57:38', 7),
(178, 'joao teste', '', '', '', '', '', '', '', '', '', '2009-10-06 19:58:15', 35),
(179, 'JOAO TESTE 2', '', 'ASDFASDFASDF', 'ASDFASDF', 'ASDF', 'ASDF', 'SDFASDF', '', '', '', '2009-10-06 19:59:52', 8),
(180, 'JOAO TESTE 2', '', '', '', '', '', '', '', '', '', '2009-10-06 20:08:58', 9),
(181, 'ST.JUDE MEDICAL CENTER', '', 'Indicaçao do Joao Batista -Qualieng', '', '', '', '', '', '', '', '2009-10-07 09:26:10', 31),
(182, 'teste', '', '', '', '', '', '', '', '', '', '2009-10-07 09:49:50', 9),
(183, 'CONSÓRCIO UHE FUNIL', '', '', 'RUA DONA INÁCIA', '15', '', 'CENTRO', '37200000', 'LAVRAS', 'MG', '2009-10-07 17:10:35', 40),
(184, 'ASSOCIAÇÃO BRASILEIRA DE ODONTOLOGIA', '', '', 'RUA TENENTE RENATO CESAR', '106', '', 'CIDADE JARDIM', '30380110', 'BELO HORIZONTE', 'MG', '2009-10-07 17:27:13', 8),
(185, 'POSTO ALLGÁS LTDA', '05351360000151', 'juliano@igas.com.br ', 'AV SARAMENHA', '1632', '', 'TUPI', '31840220', 'BELO HORIZONTE', 'MG', '2009-10-21 08:47:12', 29),
(186, 'UHE Funil', '', 'Bióloga do STP - Responsável técnica de campo UHE Funil', '', '', '', '', '', 'Lavras', '', '2009-10-28 13:58:19', 40),
(187, 'VILLAGRAN ', '', 'Indicado pelo Marcus Vinicius', 'Rua Vereadro Joaquim Costa 65 - Nutril', '31 99811971', '', 'Campina Verde', '32150240', 'contagem', 'MG', '2009-11-25 11:34:52', 48),
(188, 'UNIFENAS CAMPUS BOAVENTURA', '', 'Campus Universitário', 'Rua Boaventura', '', '', '', '', '', '', '2009-12-04 10:16:14', 32),
(189, 'Sadia', '', 'Ervio', '', '3071188', '', 'Pampulha', '', 'Belo Horizonte', 'MG', '2009-12-07 08:29:41', 4),
(190, 'Usina Gurinhatã/FLE Empreendimentos Ltda.', '', 'Usina de Alcool e cogeracao', '', '', '', '', '', '', '', '2010-01-08 16:12:39', 40),
(191, 'Grupo Ápia', '', 'Usinas de Asfalto', '', '', '', '', '', '', '', '2010-01-11 09:04:37', 5),
(192, 'Claro Aviaçao', '08067614000100', 'Hangar aeronaves', 'Rua Boaventura', '2312', 'Hangar 08', 'Pampulha', '31270-210', 'Belo Horizonte', 'mg', '2010-01-12 14:11:43', 8),
(193, 'FIDENS ENGENHARIA', '', 'Empresa de Engenharia', '', '', '', '', '', 'Belo Horizonte', 'MG', '2010-02-17 08:42:12', 5),
(194, 'UNIAO RIO EMPREENDIEM', '', 'Luiz Antonio', 'Avenida Getúlio Vargas', '447', '12o andar', 'Funcionários', '30112-020', 'BELO HORIZONTE', 'MG', '2010-03-08 10:07:25', 48),
(195, 'ÉPOCA COMÉRCIO E DISTRIBUIÇÃO	', '', 'Condomínio ', 'Via Vereador Joaquim da Costa', '1405', '', 'Campina Verde', '', 'contagem', 'MG', '2010-03-08 10:26:03', 6),
(196, 'UFMG - Laboratório de Bentos ICB', '', 'Laboratório ', 'Campus UFMG', '', '', '', '', '', '', '2010-03-11 10:36:20', 31),
(197, 'BEPREM Beneficência da Prefeitura de BH ', '', 'entrada pela Goitacazes\r\nLicenciamento do Clube dos Funcionários da PBH em Lagoa Santa', 'Rua Paracatu ', '214', '', 'CENTRO', '', 'Belo Horizonte', 'MG', '2010-03-19 17:32:19', 31),
(198, 'BEPREM Beneficência da Prefeitura de BH ', '', '', 'Rua Paracatu ', '214', '', 'BARRO PRETO', '', 'BELO HORIZONTE', '', '2010-03-19 17:36:13', 31),
(199, 'INTERPLANTA SERRARIA LTDA-ME', '25646274000183', 'indicacao Edinha\r\nCODIGO DE ATIVIDADE ECONOMICA PRINCIPAL 16.10-2-01- SERRARIAS COM DESDOBRAMENTO DE MADEIRA\r\nNATUREZA JURIDICA 206-2 SOCIEDADE EMPRESARIAL LIMITADA\r\n', '', '', '', '', '', 'Camanducaia', 'MG', '2010-03-22 18:43:52', 8),
(200, 'Viação Paraense', '', '', '', '', '', 'Milionários', '', 'BELO HORIZONTE', 'MG', '2010-03-23 08:49:12', 30),
(201, 'Grupo Lider Recreio', '', 'Site da Prefeitura', 'Avenida Barão Homem De Melo', '3535', '', 'Estoril', '30494275', 'Belo Horizonte', 'MG', '2010-03-26 17:04:59', 6),
(202, 'MINAS ATIVIDADES LTDA', '23195100000116', '', 'ESTRADA ANTIGA SANTA LUZIA SABARÁ', 'KM 3', '', 'FAZENDA DO CORDEIROS', '33010970', 'SANTA LUZIA', 'MG', '2010-03-30 15:53:09', 48),
(203, 'FURNAS CENTRAIS ELÉTRICAS S.A.', '23274194000119', 'FURNAS CENTRAIS ELÉTRICAS S.A.\r\nDepartamento de Aquisição – DAQ.G.\r\n(021) 2528-3582\r\ndccpg.@furnas.com.br\r\nwww.furnas.com.br', 'Rua Real Grandeza', '219 ', 'Bloco C – Sala 703.', 'Botafogo', '22283900', 'Rio de Janeiro', 'RJ', '2010-04-16 11:27:47', 40),
(204, 'IPÊ CONSULTORIA', '', 'Indicação Adir - projeto de incêndio', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2010-04-22 08:58:53', 9),
(205, 'HOTEL BARBOSA', '', '(27) 3732-1036\r\n', 'Rua Dez de Abril', '338', '', '', '', 'Baixo Guandu', 'ES', '2010-04-22 15:34:33', 8),
(206, 'Electrocoating', '00192247000157', 'Pintura de autopecas - no site da Magneti Marelli Cofap\r\nEdson de Sa Feitosa', 'Via Vereador Joaquim da Costa', '', '', '', '', 'contagem', '', '2010-05-03 14:19:04', 36),
(207, 'FERROUS', '', '', 'AVENIDA ALVARES CABRAL', '1777', '5°, 6° e 7° andar', 'Loudes ', '30170001', 'Belo Horizonte', 'MG', '2010-05-04 11:15:38', 8),
(208, 'Ferrous', '', 'Enfrente ao MacDonald Assembleia\r\nEdificio Emblema Tower', 'Av Alvares Cabral 1777 ', '1777', '5o andar', '', '', 'Belo Horizonte', '', '2010-05-04 11:21:35', 8),
(209, 'FERROUS', '', '', 'AVENIDA ALVARES CABRAL', '1777', '', '5°, 6° e 7° andar', '30170001', 'Belo Horizonte', 'MG', '2010-05-04 11:22:46', 8),
(210, 'FERROUS', '', '', 'AVENIDA ALVARES CABRAL', '1777', '5°, 6° e 7° andar', 'Loudes ', '30170001', 'Belo Horizonte', 'MG', '2010-05-04 11:26:50', 1),
(211, 'SEMAD/FEAM/IEF/IGAM no Centro Administrativo', '', '', '', '', '', '', '', '', '', '2010-05-20 10:49:48', 8),
(212, 'CONSELHO NACIONAL DO MEIO AMBIENTE-CONAMA', '', '', '', '', '', '', '', '', '', '2010-05-21 09:22:24', 8),
(213, 'GNV Lagoa', '', '', '', '', '', '', '', '', '', '2010-06-07 09:07:00', 29),
(214, 'ACOPLATION ICO LTDA.', '', 'Fabrica de Andaimes e abracadeiras 40 pessoas 3000 metros\r\n31 30362979  Contagem Welison 84681390', 'rua Manoel Eusébio 600', '600', '', 'Agua Santa', '', 'Baldim', 'MG', '2010-06-22 11:10:26', 2),
(215, 'UHE Igarapava', '', 'usina hidreletrica CEMIG Ana Paula Peres - Técnica Ambiental\r\nConsórcio da Usina Hidrelétrica de Igarapava\r\nFone / Fax: 16 3172 3140\r\nFone: 34 3314 7135\r\nwww.uhe-igarapava.com.br\r\n', '', '', '', '', '', 'igarapava', 'sp', '2010-07-06 11:30:39', 40),
(216, 'MIP ENGENHARIA', '', '', '', '', '', '', '', '', '', '2010-07-23 10:30:16', 5),
(217, 'CONSTRUTORA NORBERTO ODEBRECHT', '', '\r\n\r\n', 'Praia de Botafogo ', '300', '2o Andar', 'Botafogo', '22250040', 'Rio de janeiro', 'RJ', '2010-07-23 10:42:15', 5),
(218, 'VITAL ENGENHARIA  CTR MACAUBAS', '', 'Adriana A. Martins\r\nBióloga\r\nCTR Macaúbas S/A\r\nTel.: (31)3036-6300 / 3036-6324\r\nFax.: (31)3036-6316 \r\n \r\n', '', '', '', '', '', 'SABARÁ', 'MG', '2010-08-09 11:10:03', 5),
(219, 'PD CASE', '', 'Serviços de Informatica - Danubia  Costa\r\nTel.: (31) 3505-1940 - Fax: (31) 3505-1901\r\nAlameda da Serra, 891 - Sala 708 - Vila da Serra - Cep 34000-000\r\n', 'Alameda da Serra,', '891', 'sala 708', 'Vila da Serra ', '34000-000', 'NOVA LIMA', 'MG', '2010-08-19 10:31:14', 8),
(220, 'ANGLOGOLD', '', 'Tel 55 (031) 3589 2153 Fax 55 (31) 3589 2200 \\\r\nWebsite: www.AngloGoldAshanti.com\r\n', 'Fazenda Rapaunha', 's/numero', 'Galo', 'Galo', '34000000', 'Nova Lima ', 'MG', '2010-08-23 11:34:25', 1),
(221, 'Tecnoforma', '', 'Usinagem e Pintura de peças de maquinas\r\ncontato scheila.souza@yahoo.com.br\r\n31 3651-3553 3651-3553', 'Rua Milton Campos,', '120', '', 'Scharlet', '', '', '', '2010-09-02 12:24:42', 2),
(222, 'Tear Textil', '', 'Adm. Eriverton Martins \r\nTear Têxtil Ind. e Com. Ltda.\r\nMeio Ambiente\r\n&#61482; meioambiente@teartextil.com.br \r\n&#61694; www.teartextil.com.br \r\n&#61480; (31) 2191-4242\r\n', '', '', '', '', '', 'Paraopeba', 'MG', '2010-10-25 15:22:54', 3),
(223, 'CSN - Cia Siderurgica Nacional', '', 'Leonardo Arikawa de Rangel More\r\nGCI - Contratação de Serviços\r\nTel:+55 11 3049 7399\r\ne-mail: leonardo.arikawa@csn.com.br\r\n MARCELO ALEXANDRE RODRIGUES DE MATOS\r\n (31) 3749-1292 –  marcelo.matos@csn.com.br,', '', '', '', '', '', 'Congonhas', '', '2010-11-22 08:15:22', 1),
(224, 'HORIZONTE TEXTIL LTDA', '', 'Proposta comercial Implantação linha Índigo e Conclusão RADA', 'Av. Bernardo Vasconcelos', '638', '', 'Cachoeirinha', '30150000', 'BELO HORIZONTE', 'MG', '2010-11-23 14:30:17', 8),
(225, 'RENOSA', '', 'FABRICA DE COCA COLA', '', '', '', '', '', 'SAO LUIZ', 'MA', '2010-11-26 18:53:14', 4),
(226, 'ELETRONORTE', '', 'Maria de Fátima Lemos Sereno\r\nGER. EST. E PROJ. AMBIENTAIS DE GERAÇÃO - EEMG   \r\n55 (61) 3429- 8682 / 3429-6152  \r\nMaria.Sereno@eletronorte.gov.br\r\n', '', '', '', '', '', 'BRASILIA', 'DF', '2010-12-14 19:03:24', 40),
(227, 'MINAS TENIS CLUBE', '', 'lilian 35161133 - consulta T 187', '', '', '', '', '', '', '', '2011-01-04 09:22:22', 8),
(228, 'SIDERSA - SIDERURGICA SANTO ANTONIO LTDA', '', 'INDICACAO SUPRAM', 'RODOVIA MG 431', 'KM 36', '', '', '', 'ITAUNA', 'MG', '2011-01-12 12:32:25', 8),
(229, 'IGREJA MUNDIAL', '', '', 'Av. Contorno', '', '', 'CENTRO', '', 'Belo Horizonte', '', '2011-02-08 09:39:56', 8),
(230, 'IGREJA MUNDIAL', '', 'Igreja Mundial o Poder de Deus', 'av do Contorno', '', '', '', '', '', '', '2011-02-08 09:43:02', 8),
(231, 'CODEMIG ', '', 'codemig@codemig.com.br \r\nFone: (31) 3207-8900 \r\nFax:   (31) 3273-3060\r\n', 'Rua Aimorés, ', '1.697  ', '', 'lourdes', 'CEP 30140-', 'Belo Horizonte', 'MG', '2011-03-14 15:15:19', 8),
(232, 'FORMITAP INTERNI', '', 'Betim - Minas Gerais - Cep - Brasil\r\nTel:+55 31 2127-6700 Fax:+55 31 2127-6717\r\n', 'Rua Dois , 70 lote 15 ', '', '', ' Distr. Ind. Paulo Camilo', '32530485 ', 'Betim', 'MG', '2011-03-15 09:23:07', 36),
(233, 'Posto Corujao', '', 'Posto Rua do Ouro', '', '', '', '', '', 'BELO HORIZONTE', '', '2011-03-15 09:59:44', 29),
(234, 'Ambiente Integral', '', ' • Centro • Curitiba • Paraná • Brasil \r\nFone/Fax: (41)3022-3315 • contato@ambienteintegral.srv.br \r\n', 'Rua Marechal Deodoro,', '51 •', '14º andar • Conj. 1401', 'CENTRO', '80020.905 ', 'BELO HORIZONTE', 'MG', '2011-03-16 16:30:53', 8),
(235, 'Katal Biotecnológica Indústria e Comércio Ltda ', '', 'A/C Vanessa Mendes\r\nFone: +55 31 3311-3650 - Fax: +55 31 3311-3654\r\n', 'Rua Leiria,', '1160', '', 'SAO FRANCISCO', '31255-100', 'BELO HORIZONTE', 'MG', '2011-03-17 10:21:11', 31),
(236, 'Usinagem Castro', '', '', 'rua Ver. Jurandino Andrade, ', '366', '', 'Jardim Piemonte', '', 'Betim', 'MG', '2011-03-19 09:48:26', 2),
(237, 'SOTREQ -Sociedade de Tratores e Equipamentos Ltda.', '', 'Tel: (31) 3359-6000\r\nFax: (31) 3359-6161/6160', 'Via Gastão Camargos,', '850', '', 'Perobas', '32371-630', 'Contagem', 'MG', '2011-03-20 20:49:33', 36),
(238, 'Transportadora Água Viva_MRL LTDA', '', '(031)3387-2293/ 9948-2188\r\nAna Carolina\r\n', '', '', '', 'das Indústrias', '', 'BELO HORIZONTE', 'MG', '2011-03-24 19:22:30', 30),
(239, 'FUNDAÇÃO FIAT', '', 'Fone: (31) 2123-6514 - Fax: (31) 2123-3525\r\nE-mail: flaviana.pinho@fundacaofiat.com.br \r\n', 'Av. Contorno,,', '3455', '', ' Bairro Paulo Camilo ', '32669900', 'Betim', 'MG', '2011-03-25 11:31:02', 32),
(240, 'SOLUÇÕES USIMINAS', '', 'Daniella - Ex CNH\r\nT 55 31 2125-2666\r\ndaniella.pereira@solucoesusiminas.com\r\n', 'BR 381', 'KM 433', 'S/N', 'Jardim das Alterosas', '32536-000', 'Betim', 'MG', '2011-03-31 16:08:56', 2),
(241, 'CASA BRUMA', '01301955000141', 'sR. Wilson', 'Av. Vigilato Braga, 100 Centro', '100', '', 'CENTRO', '', 'Brumadinho', 'MG', '2011-04-14 11:54:03', 6),
(242, 'LAVANDERIA NOVA LUZ', '', '', '', '', '', '', '', 'TOLEDO', 'MG', '2011-04-14 14:16:19', 8),
(243, 'EPI ENERGIA', '', 'CONTATO:JULIANO SOARES BARBOSA', 'AV.JULIO DE CASTILHO', '440', 'SL-81', 'CENTRO', '90030-130', 'PORTO ALEGRE', 'RS', '2011-05-10 11:38:16', 40),
(244, 'RIO MARINA RESORT', '', 'serviços relativo à elaboração, implantação e monitoramento de PTRF em área de 100.000 m², de propriedade da Rio Marina Resort, no município de Mangaratiba/RJ.', '', '', '', '', '', 'Mangaratiba', 'RJ', '2011-05-16 16:06:38', 8),
(245, 'USIFAST LOGISTICA INDUSTRIAL ', '', 'Centro de Logistica industrial e porto seco  - Indicacao Jabil', '', '', '', '', '', 'Betim', 'MG', '2011-05-23 13:47:58', 6),
(246, 'Vaccinar Indústria e Comércio Ltda.', '', 'Projeto Técnico do Sistema de Efluentes Líquidos não domésticos conforme Convite para Licitação de projeto de das Partes A e B do PRECEND para inclusão do empreendimento localizado.', 'Av. Antônio Carlos', '8005', '', 'São Luiz', '', 'Belo HOrizonte', 'MG', '2011-05-30 14:33:44', 8),
(247, 'Utarp Ltda', '', '', 'Av. Volta redonda', '908', '', '', '', 'Goiania', 'Go', '2011-06-07 17:17:45', 8),
(248, 'Topmix Engenharia e Tecnologia de Concreto S/A', '', 'Serviços de consultoria no processo de renovação de outorga para explotação de água no poço tubular do empreendimento Topmix Engenharia e Tecnologia de Concreto, localizada em Betim/MG.', '', '', '', '', '', 'Betim ', 'MG', '2011-06-09 17:54:48', 8),
(249, 'PRAIA EMPREENDIMENTOS AGROPECUARIOS LTDA ME', '11115899000104', 'Jenner e Arthur', 'Rua Pe Eustaquio', '2636', 'sl-17', 'Padre Eustaquio', '', 'Belo Horizonte', 'MG', '2011-06-09 18:19:57', 48),
(250, 'BiosLab', '', '', '', '', '', '', '', '', '', '2011-06-14 16:38:48', 9),
(251, 'Consórcio Construtor Nova Arena BH', '', 'Elaboração das informações complementares ao RCA e PCA do Mineirão existente com foco na obra de construção da passarela Mineirão / Mineirinho.', 'Av. Antonio Abrahão Caran', '1001', '', 'Pampulha', '', 'Belo Horizonte', 'MG', '2011-06-17 17:32:06', 8),
(252, 'ENGEBIO', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-06-28 15:45:38', 8),
(253, 'Transportadora Trans Várzea Ltda ', '', '', '', '', '', '', '', 'Varzea Paulista', 'SP', '2011-07-01 10:36:21', 30),
(254, 'SAAE-Serviço Autônomo de Água e Esgoto', '', '', '', '', '', '', '', 'Itauna', 'MG', '2011-07-07 16:55:31', 8),
(255, 'SAEE- Mariana', '', '', '', '', '', '', '', 'Mariana', 'MG', '2011-08-09 14:57:25', 8),
(256, 'CRS Esquadrias em Alumínio', '', '', '', '', '', '', '', 'Betim', 'MG', '2011-08-09 15:13:44', 8),
(257, 'Hospital Evangélico', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-08-09 15:55:50', 8),
(258, 'TRIP Linhas Aéreas', '', '', '', '', '', 'Pampulha', '', 'Belo Horizonte', 'MG', '2011-08-09 16:07:44', 8),
(259, 'Shopping Plaza Anchieta', '', '', '', '', '', 'Anchieta', '', 'Belo Horizonte', 'MG', '2011-08-09 16:26:29', 8),
(260, 'Cimentos Liz', '', '', '', '', '', '', '', 'Lagoa Santa', 'MG', '2011-08-09 16:41:00', 8),
(261, 'Construtora Cowan', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-08-09 16:51:31', 5),
(262, 'Hermes Pardini', '', '', 'Rua Aimores ', '66', '', 'Funcionarios', '', 'Belo Horizonte', 'MG', '2011-08-16 11:49:01', 8),
(263, 'IBM', '', 'teste', '', '', '', '', '', 'belo horizonte', '', '2011-08-16 15:11:17', 49),
(264, 'Delta Ind. e Com. de Parafusos Ltda.', '', '', 'Rua da Luz', '21', '', 'Vila Paris', '', 'Contagem ', 'MG', '2011-08-22 14:18:25', 8),
(265, 'Teixeira Extração de Brita', '', '', '', '', '', '', '', 'Teixeiras', 'MG', '2011-08-22 14:39:05', 8),
(266, 'Voltalia Energia do Brasil - PCH Andorinha', '', '', '', '', '', '', '', 'Felixlândia', 'MG', '2011-08-22 14:43:37', 8),
(267, 'Resort Reserva Real ', '', '', '', '', '', '', '', 'Jaboticatubas', 'MG', '2011-08-24 14:24:56', 8),
(268, 'Dytech do Brasil', '', 'Dytech Tecalon \r\nFabio Moreira 3539 8814 - 99358685\r\n', 'Rod. MG 050', 'Km 18,5', 'Rua Juquita Firmino n:80,', 'Av.J,Area 04, Distrito Industrial Renato Azeredo ', '35675-000', 'Juatuba', 'MG', '2011-08-30 09:30:43', 36),
(269, 'ANHANGUERA EdUCACIONAL S.A', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-09-05 14:40:12', 32),
(270, 'DYTECH AUTOMOTIVE', '', '', '', '', '', '', '', '', '', '2011-09-08 17:44:13', 36),
(271, 'CAFÉ DE LA MUSIQUE', '', 'Bar, restaurante e Lounge Contatos - Camila ou Thiago - 2512-3852 e 9862-4265\r\nIndicacao Andréa - Golder', 'Rua Barbara Heliodora', '123', '', 'Lourdes', '', 'Belo Horizonte', 'MG', '2011-09-14 08:45:10', 8),
(272, 'Diagno Comércio e Manipulação de Produtos Químicos Ltda ', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-09-15 09:58:21', 8),
(273, 'COPAGAZ', '', '', '', '', '', '', '', 'Ibirité', 'MG', '2011-09-22 10:58:43', 8),
(274, 'Subcomitê de Bacia Hidrográfica do Rio Itabirito ', '', '', '', '', '', '', '', 'Itabirito', 'MG', '2011-09-26 11:54:07', 8),
(275, 'BUFFET CÉLIA SOUTTO', '', 'Roberto - 35464711 92921800\r\nwww.souttomayor.com.br\r\nroberto@souttomayor.com.br\r\nTelefone: 31.3526.3131\r\nHorário de Funcionamento: Segunda a Sábado de 9 às 18h', 'Rua Marabá', '122', '', 'Santo Antonio', '', 'Belo Horizonte', 'MG', '2011-09-27 08:27:45', 8),
(276, 'JRN CONSTRUTORA', '', 'Indicacao Junior da Linear\r\nMárcia Pedrosa\r\nGerente Financeiro\r\n(31) 3343 65 90\r\n', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-09-28 12:02:46', 48),
(277, 'FBF EMPREENDIMENTOS E PARTICIPACOES S/A', '', 'EMPRESA ASSOCIADA A JRN CONSTRUTORA', 'AV, CARANDAI', '161', 'CJ 401', 'FUNCIONARIOS', '', 'Belo Horizonte', 'MG', '2011-09-28 12:04:34', 48),
(278, 'Empresa Brasileira de Correios e Telégrafos', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2011-10-03 18:04:13', 8),
(279, 'Emam- Emulsões e Transporte Ltda', '', '', '', '', '', '', '', 'Ibirité', 'MG', '2011-10-07 10:59:26', 8),
(280, 'Tecnocal Ltda', '', '', '', '', '', '', '', 'Arcos', 'MG', '2011-10-07 11:32:50', 8),
(281, 'Votorantim Cimentos', '', '', '', '', '', '', '', 'Brasilia', 'DF', '2011-10-07 11:49:34', 8),
(282, 'Indústria e Comércio de Calcário Calcedônia', '', '', '', '', '', '', '', 'Juvenilia', 'MG', '2011-10-17 17:54:07', 8),
(283, 'UHE PARACAMBI', '', 'EMPRESA DA LIGHT - RIO PARACAMBI - ', '', '', '', '', '', '', 'RJ', '2011-10-31 17:06:01', 40),
(284, 'ESPAM LAVANDERIA', '', 'LAVANDERIA INDUSTRIAL - INDICAÇÃO ANESIO', '', '', '', '', '', 'ITAPEVA', 'MG', '2011-11-01 16:50:35', 8),
(285, 'ISOMONTE', '', 'Francisco ex Iluminacao Automotiva', '', '', '', '', '', '', '', '2011-11-02 10:22:45', 8),
(286, 'PRECON INDUSTRIAL S.A', '', '', '', '', '', '', '', 'Pedro Leopoldo', 'MG', '2011-11-07 15:37:51', 8),
(287, 'FIAT POWERTRAIN', '', '', '', '', '', '', '', 'Betim', 'MG', '2011-11-07 16:01:21', 8),
(288, 'HOME OFFICE MOVEIS LTDA', '', 'peter@homeoffice.com.br - 3453-1711', '', '', '', 'venda nova', '', 'Belo Horizonte', '', '2011-11-29 14:56:40', 8),
(289, 'FUNDAÇÃO  Parque Tecnológico Itaipu - FPTI', '', 'Jean Luca Schmitz\r\nFundação Parque Tecnológico Itaipu - FPTI\r\nGestão de Compras e Contratações\r\nTel:  (45) 3576-7177\r\nFax: (45) 3576-7199\r\n', '', '', '', '', '', '', '', '2011-12-13 15:36:23', 8),
(290, 'Fundação Parque Tecnológico Itaipu - FPTI', '', 'Jean Luca Schmitz\r\nGestão de Compras e Contratações\r\nTel:  (45) 3576-7177\r\nFax: (45) 3576-7199\r\n', 'v. Tancredo Neves, ', '6731 ', ' Parque Tecnológico Itaip', '', '', 'Foz do Iguaçu', 'PR', '2011-12-13 15:37:13', 40),
(291, 'GELOSO', '', 'Hudson Vitor.\r\n(31) 3211-1750 / 9863-5185\r\n', 'Av. Afonso Pena', '4200', '', 'Mangabeiras', '30130009', 'Belo Horizonte', 'MG', '2012-01-02 09:46:24', 4),
(292, 'POLICARD', '', '', '', '', '', '', '', '', '', '2012-01-03 14:29:48', 8),
(293, 'CONSORCIO CAPIM  BRANCO ENERGIA-CCBE', '', '', 'AV. CESARIO ALVIM', '137', '', 'CENTRO', '38400096', 'Uberlândia', 'MG', '2012-01-04 16:08:52', 40),
(294, 'Plugminas ', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-06 16:58:09', 8),
(295, 'Embrade- Empresa Brasileira de Desenvolvimento.', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-06 17:12:55', 8),
(296, 'Clamper Indústria e Comércio S.A.', '', '', '', '', '', '', '', 'Betim', 'MG', '2012-01-06 17:48:45', 8),
(297, 'M-I SWACO, A Schlumberger Company', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-09 09:20:55', 8),
(298, 'BRVias S.a', '', '', '', '', '', '', '', 'São Paulo', 'SP', '2012-01-09 09:44:49', 5),
(299, 'IMAGEM MAPS', '', '', 'Rua Itororó, ', '555', '', '', '', 'São José dos Campos ', 'SP', '2012-01-11 16:55:54', 8),
(300, 'RECITEC – Reciclagem Técnica do Brasil Ltda.', '', '', '', '', '', '', '', 'Pedro Leopoldo', 'MG', '2012-01-13 11:40:58', 8),
(301, 'SAAE Itabirito', '', '', '', '', '', '', '', 'Itabirito', 'MG', '2012-01-14 19:22:08', 8),
(302, 'FEDERAÇÃO DAS INDUSTRIAS DE MINAS GERAIS - FIEMG', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-19 16:47:07', 8),
(303, 'Mundial Proteção Ltda', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-19 17:18:30', 8),
(304, 'MTM - Manutenção Tratores e Maquinas Ltda', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-19 17:25:41', 8),
(305, 'Megaware Indústria e Comércio S.A', '', '', '', '', '', '', '', 'Lagoa Santa', 'MG', '2012-01-19 17:37:43', 8),
(306, 'ALS BRASIL', '', '', 'Avenida ou Rua São Paulo, 685. B. Célvia', '685', '', 'Célvia', '33200000', 'VESPASIANO', 'MG', '2012-01-20 10:26:32', 1),
(307, 'AVG Empreendimentos Minerários Ltda', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-27 10:05:27', 1),
(308, 'DME Distribuição S/A - DMED ', '', '', '', '', '', '', '', 'Poços de Calda', 'MG', '2012-01-27 15:50:28', 8),
(309, 'São Cristovão Transporte', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-01-27 16:25:48', 8),
(310, 'Construtora Odebrecht', '', '', '', '', '', '', '', 'Belo Horizonte', '', '2012-02-03 17:34:02', 5),
(311, 'Progeo ', '', '', 'Rua Maria Beatriz ', '894', '', 'Havai', '', '', '', '2012-02-07 14:39:17', 8),
(312, 'Odebrecht', '', 'www.odebrecht.com', '', '', '', '', '', '', '', '2012-02-13 11:45:24', 8),
(313, 'Mineral Engenharia e Meio Ambiente', '', '', '', '', '', '', '', 'São Paulo', 'SP', '2012-03-08 15:56:23', 8),
(314, 'Via Solo Engenharia Ambiental S.A', '', '', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-03-15 17:50:35', 8),
(315, 'GSL Metalúrgica S.A', '', 'www.gls.com.br', 'Rodovia BR 262, Km12 s/n', '', '', 'Distrito Industrial Simão da Cunha', '34725010', 'Sabará', 'MG', '2012-03-20 14:52:57', 8),
(316, 'Jabil Auditoria', '', '', '', '', '', '', '', 'Betim', 'MG', '2012-03-29 17:30:27', 8),
(317, 'RODORÁPIDO TRANSPORTES', '05476044000106', 'INSC. EST.: 13.213.976-6\r\nEND.:  – S/N\r\nBAIRRO: PARQUE VETORASSO\r\nRONDONÓPOLIS – MT\r\nCEP:\r\nCX POSTAL: 1027\r\nTEL./FAX: (66) 3410-2500\r\n', 'AV. RENATO VETORASSO', 's/n', '', 'PARQUE VETORASSO', ' 78746-040', 'Rondonópolis', 'MG', '2012-04-11 11:19:49', 30),
(318, 'RODORÁPIDO TRANSPORTES', '05476044011106', 'INSC. EST.: 13.213.976-6\r\nEND.:\r\nBAIRRO: PARQUE VETORASSO\r\nRONDONÓPOLIS – MT\r\nCEP: 78746-040\r\nCX POSTAL: 1027\r\nTEL./FAX: (66) 3410-2500\r\n', ' AV. RENATO VETORASSO – S/', '', '', '', '', '', '', '2012-04-11 11:22:53', 30),
(319, 'RODORÁPIDO TRANSPORTES', '05476044011106', 'INSC. EST.: 13.213.976-6\r\nEND.:\r\nBAIRRO: PARQUE VETORASSO\r\nRONDONÓPOLIS – MT\r\nCEP: 78746-040\r\nCX POSTAL: 1027\r\nTEL./FAX: (66) 3410-2500\r\n', ' AV. RENATO VETORASSO – S', '', '', '', '', '', '', '2012-04-11 11:22:53', 30),
(320, 'RODORÁPIDO TRANSPORTES ', '05476044000106', 'Contato telefonico Marcela\r\nTEL./FAX: (66) 3410-2500\r\n', ' AV. RENATO VETORASSO', ' – S/N', 'CX POSTAL: 1027', 'PARQUE VETORASSO ', '78746-040', 'Rondonópolis', 'MT', '2012-04-11 11:25:03', 30),
(321, 'BARROCA TENIS CLUBE', '', 'Maria das Graças Vital Fortes\r\nBarroca Tênis Clube\r\nFinanceiro\r\nTel.: 3330-9824/8634-4951\r\n', '', '', '', '', '', 'Belo Horizonte', 'MG', '2012-04-11 11:51:57', 8),
(322, 'SAAE Mariana', '07.711-512/000', '', 'Rua Diogo de Vasconcelos', '101', '', 'Galego', '', 'Mariana', 'MG', '2012-04-12 17:10:24', 10),
(323, 'Prefeitura Municipal de Pedro Leopoldo', '', '', 'Rua Dr. Cristiano Otoni, nº 555 ', '', '', '', '', '', '', '2012-04-12 17:18:51', 8),
(324, 'SESC MINAS ', '', '', 'Rua Tupinambás', '956', 'Sala 413', 'Centro ', '30120906', 'BH', 'MG', '2012-04-19 15:59:31', 8),
(325, 'EMA - Engenharia do Meio Ambiente', '', '', '', '', '', '', '', '', '', '2012-04-19 16:32:44', 9),
(326, 'Glágio do Brasil', '', '', '', '', '', '', '', '', '', '2012-04-19 16:39:30', 8),
(327, 'ICON NEGÓCIOS IMOBILIÁRIOS LTDA', '', '', 'Rua Paraíba', '1352', '907', 'Funcinários', '30130141', 'Belo Horizonte', 'MG', '2012-04-25 11:48:59', 48),
(328, 'SMB Automotive', '', '', 'Rua Pedro de Toldedo', '626', '', '', '', 'Guarulhos', 'SP', '2012-04-26 15:36:21', 36),
(329, 'BIOMM SA', '', '', 'Praça da Tecnologia', '77', '', '', '39400307', 'Montes Claros', 'MG', '2012-05-03 14:41:39', 3),
(330, 'Minas Chapas', '', '', 'Av. Warley Aparecido Martins', '500', '', 'DI Jatobá', '', 'Belo Horizonte', 'MG', '2012-05-03 15:35:06', 2),
(331, 'CONSÓRCIO UHE CANDONGA', '', '\r\n(31) 3817-3071 &#8206;', 'Av. Contorno,', '8000 ', '', 'Santo Antonio', '30110-060', 'Belo Horizonte', 'MG', '2012-05-11 15:17:29', 40),
(332, 'MAGNESITA', '', 'Tel: + 55 31 3368-1660\r\n \r\n | Contagem | MG | Brasil\r\nwww.magnesita.com.br\r\n', 'Praça Louis Ensch,', '240', '', 'Cidade Industrial', '', 'CONTAGEM', 'MG', '2012-05-11 15:28:00', 8),
(333, 'FT LOGISTICA', '09913147000147', 'PROPOSTA LICENCIAMENTO ESTADUAL E CONTAGEM\r\ncontato  Waldimir foned 8316-4503', 'Av. Haeckel Ben Hur Salvador', '', '', '', '', 'CONTAGEM', '', '2012-05-11 15:31:34', 30),
(334, 'CAMARA DOS VEREADORES DE BELO HORIZONTE', '', 'CONTATO Adriana Filetti - fones 3555-1289 e 8861-5301', 'av dos Andradas', '', '', 'Santa Efigenia', '', 'Belo Horizonte', 'MG', '2012-05-11 15:36:13', 8),
(335, 'RMG Empreendimentos', '', 'Indicacao da Linear', '', '', '', '', '', '', '', '2012-05-23 16:54:10', 48),
(336, 'ERM EMPREENDIMENTOS IMOBILIARIOS LTDA.', '', 'loteamento Paraopeba - indicacao Linear', 'rua Trifana ', '330', '', '', '', 'Belo Horizonte', 'MG', '2012-06-01 17:02:55', 48),
(337, 'IMOBILIARIA PRESIDENTE', '', 'INDICACAO JUNIOR LINEAR', 'av Presidente Kubscheck', '', '', 'Bairro Presidente', '', 'Matosinhos', 'MG', '2012-06-06 14:51:25', 48),
(338, 'ECOAR MEDICINA DIAGNOSTICA', '', '', 'Av. do Contorno ', '7.031', '', 'Santo Antonio', '', 'Belo Horizonte', 'MG', '2012-06-11 09:38:27', 31),
(339, 'PREFEITURA DE NOVA LIMA', '', '', '', '', '', '', '', 'Nova Lima ', '', '2012-06-13 12:14:00', 8),
(340, 'Gerance', '', 'Paulo Ferreira Gomes\r\nEngenheiro\r\npaulo.gomes@gerance.com.br\r\nwww.gerance.com.br\r\n', 'rua Netuno', '238', '', 'Santa Lucia', '', 'Belo Horizonte', 'MG', '2012-06-15 16:57:25', 48),
(341, 'VALE FERTILIZANTES', '', 'Indicacao Candonga', '', '', '', '', '', 'Uberaba', 'MG', '2012-06-19 15:03:09', 8),
(342, 'Museu de Arte da Pampulha', '', 'Artista plastica e arquiteta', '', '', '', '', '', 'Belo Horizonte', '', '2012-06-25 17:10:25', 8),
(343, 'ESSENCIS SOLUÇÕES AMBIENTAIS', '', 'Essencis Soluções Ambientais - CTR Betim\r\n&#61479;: (31) 3532-9339\r\n&#61596;: www.essencis.com.br\r\n&#61482;: hstancioli@essencis.com.br\r\n', 'RODOVIA BR 381', '', '', '', '', 'Betim', 'MG', '2012-06-26 11:42:33', 6);
INSERT INTO `TB_CLIENTE` (`ID_CLIENTE`, `NM_CLIENTE`, `NR_CNPJ`, `TX_OBSERVACAO`, `NM_LOGRADOURO`, `NR_NUMERO`, `DS_COMPLEMENTO`, `NM_BAIRRO`, `NR_CEP`, `NM_CIDADE`, `NM_UF`, `DT_ATUALIZACAO`, `FK_RAMO_ATIVIDADE`) VALUES
(344, 'SIBELCO BRASIL', '', '', 'Av. Quatorze de Setembro,', 's/n', '', 'Centro', '35565000', 'Pedra do Indaiá', 'MG', '2012-06-29 09:25:34', 1),
(345, 'EMPRESA ORMIFRIO LTDA', '22333272000146', 'contato telefonico. fabricante montadora de maquinas de refrigeracao\r\nnº de funcionarios 120\r\nArea do Galpão 8.000m² até 10.000m² \r\n \r\n', 'Rua Capelao ', '15', 'BR 262 km 13', 'Simao da Cunha', '34.515-740', 'Sabará', 'MG', '2012-06-29 10:57:16', 2),
(346, 'Prefeitura Municipal de Contagem', '', '', '', '', '', '', '', '', '', '2012-07-04 06:30:14', 10),
(347, 'ADECOAGRO - USINA MONTE ALEGRE', '', 'decoagro es una de las principales empresas productoras de alimentos y energía renovable de Sudamérica. Con presencia en Argentina, Brasil y Uruguay, las actividades a las que se dedica incluyen la producción de cereales, oleaginosas, lácteos, azúcar, etanol, café y algodón.\r\nDesde que se creó en el año 2002, el crecimiento de la empresa se basó en la implementación de un modelo de producción sustentable, trabajando en tierras propias y manejando el riesgo mediante diversificación.\r\nEl equipo humano de Adecoagro es uno de los activos más valiosos de la empresa porque le permiten alcanzar la excelencia en el gerenciamiento gracias al nivel de formación técnica y la capacitación permanente de su gente.\r\n', '', '', '', '', '', 'Areado', 'MG', '2012-07-19 10:06:00', 7),
(348, 'INSTITUTO CHICO MENDES DE CONSERVAÇÃO DA BIODIVERSIDADE - ICMBio', '', 'Carolina Cardoso\r\nSELIC/ICMBio\r\nInstituto Chico Mendes de Conservação da Biodiversidade - ICMBio\r\n(61) 3341-9402\r\n', '', '', '', '', '', 'Brasilia', 'DF', '2012-07-23 17:08:53', 8),
(349, 'PREFEITURA DE GASPAR S/C', '', '', '', '', '', '', '', 'GASPAR', 'SC', '2012-07-24 17:44:46', 35),
(350, 'VERDEMAR SUPERMERCADOS', '', 'Indicação Mauricio Campolina', 'Av. N S do Carmo', '', '', 'Sao Pedro', '', 'BELO HORIZONTE', 'MG', '2012-07-25 16:27:34', 6),
(351, 'Laboratorio Oswaldo Cruz ', '', 'Sandra Cristina\r\nTel. (31)3271-5005\r\nCel. (31)9241-8031   \r\n', 'Assis Chauteaubriand ', '11', '', 'FLORESTA', '', 'BELO HORIZONTE', 'MG', '2012-07-25 17:29:18', 31),
(352, 'CAPITAL HYDRA ENERGY ', '', ' (47) 3275-6877 - Comercial\r\n  (47) 3370-8692 - Comercial\r\n  (47) 3373-8458 - Comercial\r\n   www.capitalenergy.com.br\r\n', 'Rua Ferdinando Pradi ', '277', '3o Andar', 'Centro', '89251580', 'Jaragua do Sul', 'SC', '2012-08-07 16:32:48', 40),
(353, 'AQUASOLIS SOLUCOES CONSTRUTIVAS LTDA ', '', 'FABRICANTE DE FORMAS', 'Rua Antonio Moreira de Olveira', '55', 'Galpao 01', 'Garcias', '32470000', 'MÁRIO CAMPOS', 'MG', '2012-08-09 16:44:33', 2),
(354, 'POSTO MANGABEIRAS', '', '', 'Av. Afonso Pena', '', '', '', '', 'Belo Horizonte', '', '2012-08-09 17:43:07', 29),
(355, 'POSTO OLIMAR COMÉRCIO DE COMBUSTÍVEIS LTDA – POSTO PARANAÍBA', '', 'Sucessor da Mercantil Bandeirante - Posto Paranaiba', 'av. Tereza Cristina', '', '', '', '', 'Belo Horizonte', 'MG', '2012-08-09 17:48:37', 29),
(356, 'MORRO DO PILAR MINERAIS S.A', '', '\r\nA/C Rogerio Barreto Marchesotti\r\nGERENCIA DE SUPRIMENTOS\r\ne-mail: rogerio.barreto_lf@manabibrasil.com.br\r\nRua Bernardo Guimaraes, 245\r\n30140-080 Belo Horizonte –\r\nfone. 55 31 2533-6606\r\nRef.: Proposta comercial de prestação de serviços\r\n0033/2012 – R1', 'Rua Bernardo Guimaraes', '245', '15o Andar', 'Funcionários', '', 'Belo Horizonte', '', '2012-08-13 15:49:45', 8),
(357, 'BRENNAND CIMENTOS', '', 'A/C Luana Scalabrini\r\ne S/N, Zona Rural\r\nCEP: 35.701-970, Sete Lagoas/MG \r\nFone: (31) 2107-7508 /(31) 8444-9005\r\n', 'Fazenda Mata Grand', 's/n', 'Zona Rural', '', '35701970', 'Sete Lagoas', 'MG', '2012-08-16 10:44:38', 1),
(358, 'POIT ENERGY', '09277504000802', '', 'BR 381 ', '2800', 'AO LADO CARREFOUR', '', '', 'CONTAGEM', 'MG', '2012-08-21 16:39:02', 49),
(359, 'TAM Aviação Executiva', '', 'Hangar Pampulha', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2012-10-01 10:16:19', 6),
(360, 'MINASJATO DESENTUPIDORA', '', 'TRANSPORTADORA DE RESIDUOS FOSSA E ETC', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2012-10-04 16:32:58', 6),
(361, 'ESSENCIS SOLUÇÕES AMBIENTAIS s - CTR Juiz de Fora', '', 'CTR Aterro Sanitario e Usina Recicaglem', '', '', '', '', '', 'Juiz de Fora', '', '2012-10-04 17:27:19', 6),
(362, 'FIAT CHRYSLER AMÉRICA LATINA', '', '', 'Av. Contorno', '3455', '', 'DI PAULO CAMILO', '32669900', 'Betim', 'MG', '2012-10-29 11:36:11', 2),
(363, 'SMS SIEMAG', '', 'INDICACAO DO ANDERSON CRISTENES', '', '', '', '', '', 'VESPASIANO', '', '2012-11-02 18:22:18', 2),
(364, 'URBAMAIS DESENVOLVIMENTO URBANO', '', 'EMPRESA DO GRUPO MRV – Grupo MRV\r\nFone: (31) 3348-7152\r\nmarina.lima@urbamais.com.br / www.urbamais.com.br\r\n', '', '', '', '', '', '', '', '2012-11-16 07:07:59', 48),
(365, 'METALSIDER', '', 'Metalsider\r\nA/C Laís Diniz\r\nSão Gonçalo do Abaeté/MG - Escritorio em Betim', '', '', '', '', '', '', '', '2012-11-26 16:26:11', 8),
(366, 'UHE ITACOARA', '', 'A UHE Itaocara I, empreendimento para geração de energia hidrelétrica a ser implantado no baixo médio trecho do rio Paraíba do Sul, divisa de Minas Gerais e Rio de Janeiro, nos municípios de Itaocara, Cantagalo, Aperibé, Pirapetinga e Santo Antônio de Pádua, foi objeto de leilão público para\r\na sua Concessão, vencido pelo Light Sinergias LTDA em 15/03/2001.', 'Rua Marechal Floriano Peixoto,', '152', '', 'Jardim da Aldeia', '28570-000', 'Itacoara', 'RJ', '2012-11-28 15:13:18', 40),
(367, 'CAFE TRES CORAÇOES', '', 'TORREFAÇAO EM SANTA LUZIA', '', '', '', '', '', 'SANTA LUZIA', '', '2012-11-30 15:06:35', 4),
(368, 'SIX SEMI CONDUTORES', '', 'Escopo de trabalho os estudos ambientais para o Licenciamento de operação da fábrica da SIX Semicondutores em Ribeirão das Neves', '', '', '', '', '', '', '', '2012-11-30 18:13:39', 49),
(369, 'BANCO CENTRAL DO BRASIL', '', '', '', '', '', '', '', 'BELO HORIZONTE', '', '2012-11-30 18:59:32', 8),
(370, 'FORGRAF', '', 'Somos uma empresa de distribuição e comercialização de produtos gráficos e suprimentos para comunicação visual em Belo Horizonte.\r\nNossos clientes tem como descarte os químicos, latas, bombonas, panos e diversas embalagens que são consideradas como classe I. \r\n\r\nGostaríamos de montar uma estrutura para coletar e destinar corretamente estes produtos e para isto precisamos de uma empresa para nos auxiliar a retirar os documentos\r\n', '  Rafael Marques Motta   Gerente Comercial    Tel.: (31) 3491-32.34   Cel.: (31) 8663-09.80     ', '', '', '', '', '', '', '2012-12-01 08:27:24', 11),
(371, 'WISE WASTE', '', 'http://www.wisewaste.com.br/', '', '', '', '', '', '', '', '2013-01-07 12:11:41', 32),
(372, 'CEDUS CENTRO AVANÇADO EM DIAGNOSTICO', '', '', 'AV. AMAZONAS', '', '', '', '', 'BELO HORIZONTE', '', '2013-01-11 10:15:51', 31),
(373, 'ARG', '', '', '', '', '', '', '', '', '', '2013-01-18 10:58:29', 8),
(374, 'AR', '', '', '', '', '', '', '', '', '', '2013-01-18 10:58:29', 8),
(375, 'AR', '', '', '', '', '', '', '', '', '', '2013-01-18 10:58:29', 8),
(376, 'AR', '', '', '', '', '', '', '', '', '', '2013-01-18 10:58:29', 8),
(377, 'GRUPO ARG', '', 'ATIVIDADE EXTRAÇAO DE AREIA', '', '', '', '', '', '', '', '2013-01-18 10:59:51', 1),
(378, 'PCH CATUMBI', '', 'Segue informações para sua analise e elaboração do orçamento. O local é rio carinhanha, próximo  montalvania, divisa MG/BA. Serão duas campanhas, e os pontos já estarão selecionados.\r\nDra. Nicolle A.Pesoa\r\n\r\nBiól. Nicolle Albornoz Pesoa\r\nAnalista Ambiental \r\n  \r\nAv Farrapos, 3270/ 301 - Bairro Navegantes \r\nPorto Alegre/ RS - CEP 90220-002\r\n(51) 3073 2857\r\nwww.geocenterconsultoria.com.br\r\n', '', '', '', '', '', '', '', '2013-01-21 15:06:57', 40),
(379, 'FORNO DE MINAS ALIMENTOS S/A', '03870455000407', '03.870.455/0004-07\r\nI.E: 1760864060127\r\n', 'Via de Acesso às Chácaras Campo do Meio, s/ nº  (próximo ao Ceasa)', '', '', 'Chácaras Reunidas Santa Terezinha', '32183683', 'Contagem', 'MG', '2013-01-22 16:47:30', 4),
(380, 'Carrefour Comércio e Indústria Ltda', '', 'Preciso que me encaminhe uma proposta para elaboração do EIV em nome de . área de 6.000,00m².', '', '', '', '', '', '', '', '2013-02-01 17:49:45', 8),
(381, 'IMA INDUSTRIA MECANICA AMARAL', '', 'INDICAÇAO PATRICIA - EX FUNCIONARIA JABIL - FONE 33931053', 'RUA RIO PARAIBA,', '320', '', 'ELDORADINHO', '', 'CONTAGEM', 'MG', '2013-02-17 10:55:04', 2),
(382, 'OMEGA ENERGIA RENOVÁVEL S.A', '', 'Talita Castello Rosa\r\nControladoria\r\nOmega Energia Renovável S.A\r\n \r\nTel: 11 3254-9837\r\nwww.omegaenergia.com.br\r\n', 'Av. São Gabriel', '477', '2o ANDAR', '', '01435001', 'SÃO PAULO', 'SP', '2013-02-19 10:53:41', 40),
(383, 'SANTHER GV', '', '', '', '', '', '', '', '', '', '2013-02-20 18:03:20', 8),
(384, 'ALIANÇA AGRÍCOLA DO CERRADO S.A. | SODRUGESTVO GROUP', '', 'A SODRUGESTVO É AGORA A MAIOR PROCESSADORA DE SOJA DO ESTADO DE SÃO PAULO E UMA DAS MAIORES PROPRIETÁRIAS, E OPERADORAS, DE INSTALAÇÕES DE ARMAZENAMENTO DE GRÃOS NO PAÍS', '', '', '', '', '', 'Uberlandia', 'MG', '2013-02-22 18:02:55', 8),
(385, 'PROINTEC', '', 'BUSCAR PARCERIA PARA O Plano de Gestão de Resíduos Sólidos Urbanos para a Região Metropolitana de Belo Horizonte\r\nRodrigo López\r\nProintec Brasil\r\nTel. (31) 9314 6261\r\n', '', '', '', '', '', '', '', '2013-02-25 12:03:01', 5),
(386, 'UMPRAUM ARQUITETURA E CONSTRUÇÃO', '', 'ARQUITETURA E CONSTRUÇÃO', 'R AMERICO DIAMANTIN', '91', 'SALA 403', 'CRUZEIRO', '', 'BELO HORIZONTE', 'MG', '2013-02-26 14:25:11', 48),
(387, 'FUNDAÇÃO OSWALDO CRUZ – CENTRO DE PESQUISA RENÉ RACHOU', '', '', '', '', '', '', '', 'BELO HORIZONTE', '', '2013-03-05 22:31:35', 31),
(388, 'FUNDAÇÃO OSWALDO CRUZ – CENTRO DE PESQUISA RENÉ RACHOU-', '', 'Objeto de Licenciamento: PESQUISA E DESENVOLVIMENTO EXPERIMENTAL EM CIÊNCIAS FISICAS E NATURAIS, SOCIAIS E HUMANAS E OUTRAS ATIVIDADES DE ENSINO COM DEPÓSITO / ALMOXARIFADO, CENTRO DE TREINAMENTO, REFEITÓRIO / COZINHA E POSTO DE COLETA DE MATERIAL BIOLÓGICO.', '', '', '', '', '', '', '', '2013-03-05 22:36:23', 31),
(389, 'EMRAD ', '', '31151920 AMANDA', 'Rua Padre Rolim 101', '', '', '', '', '', '', '2013-03-06 11:51:14', 8),
(390, 'TECNOWATT ILUMINAÇÃO', '', 'Proposta  para Renovação da Licença Ambiental \r\nFlávio Caldeira\r\nTécnico Químico\r\nflavio@tecnowatt.com.br\r\nhttp://www.tecnowatt.com.br >\r\n+55.31.3359-8237\r\n', '', '', '', '', '', 'CONTAGEM', '', '2013-03-19 17:47:40', 49),
(391, 'TM ENGENHARIA', '', ' 874, sl.1207 - Funcionários, BH/MG | CEP 30110-120  \r\n                                                                                            +55 31 3264 1104 | 3264 1106\r\n', 'av. Getúlio Vargas', '874', 'SALA 1207', 'Funcionáiros', '30110120', 'BELO HORIZONTE', 'MG', '2013-03-21 15:55:21', 48),
(392, 'Tecfor', '', 'Francisco Paula - Francisco de Paula\r\nIndustrial Safety, Health and Environment\r\n\r\nNeumayer Tekfor Automotive Brasil Ltda\r\nAv. Senador Giovanni Agnelli, 800 à 830 - 32681-080  Betim   Brazil \r\nPhone +55 31 3211 7442   Fax +55 31 3211 7410\r\nfrancisco.paula@neumayer-tekfor.com   \r\n', '', '', '', '', '', '', '', '2013-03-28 12:01:13', 36),
(393, 'RESTAURANTE JARDIM DE MINAS', '', 'PRECEND', '', '', '', '', '', '', '', '2013-03-28 12:04:28', 8),
(394, 'Hsieh Empire Participações Ltda', '', 'Rodrigo J.Pereira\r\nMSN: rodrigo@hsieh.com.br\r\nSkype: rodrigo_hsieh_empire\r\nTEL:+ 55 31 3357-5104 \r\nMobile: +55 31 8340 3749 \r\nEndereço/Address: ,799, Bairro Arvoredo, Contagem\r\n', 'Rua CC', '799', '', 'Arvoredo', '', 'CONTAGEM', 'MG', '2013-04-10 17:44:34', 48),
(395, 'ECOSTEEL', '', 'Henrique Mariz\r\nEngenheiro de Meio Ambiente\r\n(31)3403-2350 / 8430- 7843\r\nhenrique.mariz@ecosteelbrasil.com.br\r\nWww.ecosteelbrasil.com.br\r\n', '', '', '', '', '', 'SARZEDO', '', '2013-04-11 18:08:17', 2),
(396, 'TIM MAXITEL CDL MG', '04306050020459', 'Jane Luci Rodrigues\r\nLogística Operações – CDL MG\r\njaner@timmaxitel.com.br  \r\nGSM: 55 31 9101-8437 3368.4615\r\n \r\n', 'RUA JOSÉ MARIA LACERDA', '1900', 'GALPÃO 1 - ARMAZÉM 5', 'CIDADE INDUSTRIAL', '32210120', 'CONTAGEM', 'MG', '2013-04-16 11:27:40', 8),
(397, 'VIABAHIA CONCESSIONÁRIAS DE RODOVIAS', '', '', 'AVENIDA ANTÔNIO CARLOS MAGALHÃES', '3244', '', 'CAMINHO DAS ARVORES', '41820000', 'SALVADOR', 'BA', '2013-04-25 15:04:18', 8),
(398, 'VIABAHIA CONCESSIONÁRIAS DE RODOVIAS', '', '', 'AVENIDA ANTÔNIO CARLOS MAGALHÃES', '3244', '', 'CAMINHO DAS ARVORES', '41820000', 'SALVADOR', 'BA', '2013-04-25 15:10:09', 8),
(399, 'DIAMED LATINO AMÉRICA S.A ( BIO-RAD LABORATORIES)', '', 'SOLICITAÇÃO ENVIADA VIA SITE BIOS, ATRAVÉS DA SRTA. ANA FERREIRA (31)3689-6628 . Email: ana_ferreira@bio-rad.com', 'RUA ALFREDO ALABANO DA COSTA', '100', '', '', '', 'LAGOA SANTA', 'MG', '2013-05-02 14:18:03', 8),
(400, 'AMBEV COnTAGEM', '', 'nayara.barbosa@ambev.com.br  31 3306-0571', '', '', '', '', '', 'CONTAGEM', 'MG', '2013-05-03 10:17:32', 8),
(401, 'AEC RELACIONAMENTO COM RESPONSABILIDADE ', '', 'Adriana Dias Miranda\r\nArquiteta\r\n31 3515 7400 | r. 30611\r\n31 93938844\r\n \r\nUNIDADE ORION', '', '', '', '', '', '', '', '2013-05-06 10:20:03', 8),
(402, 'FS CONSULTORES ', '', 'Pedro Henrique Costa\r\npedro.henrique@fsconsultores.com.br\r\n \r\n\r\n\r\n[31] 3344-0006\r\nRua Professor João Martins, 165 Luxemburgo\r\n30380-580 Belo Horizonte, MG\r\n[FS] Consultores - Planejamento e Gestão\r\nvisite nosso site: www.fsconsultores.com.br', 'Rua Professor João Martins', '165', '', 'Luxemburgo', '30380-580 ', 'BELO HORIZONTE', 'MG', '2013-05-06 13:42:23', 9),
(403, ' Marco Projetos', '89530174000170', 'fabio@marcoprojetos.com.br ', 'RUA DONA LEOPOLDINA', '256', 'TERREO', 'HIGIENOPOLIS', '90550130', 'PORTO ALEGRE', 'RS', '2013-05-09 11:29:18', 8),
(404, 'MARCO PROJETOS', '', ' Marco Projetos que é a construtora da obra da Ambev Uberlandia.\r\nemail: jose.andrade@marcoprojetos.com.br', '', '', '', '', '', '', '', '2013-05-09 11:34:55', 8),
(405, 'TELBRAS CONEXÕES INTELIGENTES', '', 'Bernardo Caldeira Brant \r\nConsultor • Planejamento Engenharia de Rede\r\nTel:+55 (31) 3305 5676\r\nbernardo@telbrax.com.br\r\nwww.telbrax.com.br', '', '', '', '', '', '', '', '2013-05-10 11:38:53', 8),
(406, 'BETIM QUÍMICA', '', 'REGINA ( 31) 9197- 8846', '', '', '', '', '', 'BETIM', 'MG', '2013-05-13 11:13:22', 8),
(407, 'ATIVA LOCAÇÃO DE UBERLÂNDIA', '', 'Paulo/Lyllian,\r\n \r\nO Eduardo da Ativa Locação de Uberlandia solicitou proposta para regularização ambiental da atividade de locação de banheiros químicos, transporte e tratamento.\r\n \r\nO contato é Eduardo@ativalocacao.com.br, telefones: 34 3226-2120 / 9121-7556\r\n \r\nA vazão da ETE é 0,25 m3/s\r\n \r\nConsultei na DN 74:\r\nE-03-06-9 Tratamento de esgoto sanitário.\r\n \r\nPot. Poluidor/Degradador: Ar: P  Água: M       Solo: M        Geral: M\r\n          Porte:\r\n \r\n          Vazão Média Prevista < 50 &#8467;/s                                           : pequeno\r\n          Vazão Média Prevista > 400 &#8467;/s                                          : grande\r\n          Os demais                                                                         :médio\r\n ', '', '', '', '', '', 'UBERLÂNDIA', 'MG', '2013-05-13 12:06:09', 8),
(408, 'Breno Linhares Cunha', '', '(31)-8503-5848', '', '', '', '', '', '', '', '2013-05-17 15:10:47', 8),
(409, 'V & M DO BRASIL - USINA BARREIRO', '', 'Telefone: +55 31 3328 2121\r\nFax: +55 31 3333 4471\r\ncontato@vmtubes.com.br', 'AV. OLINTO MEIRELES', '65', '', 'BARREIRO', '30640-010', 'BELO HORIZONTE', 'MG', '2013-05-23 09:34:57', 8),
(410, 'UNOPAR MURIAÉ', '', '(32) 3722.2602\r\n ', '', '', '', '', '', 'MURIAÉ', 'MG', '2013-05-23 10:07:53', 8),
(411, 'PREFEITURA MUNICIPAL DE JOAQUIM FELÍCIO', '', '', '', '', '', '', '', 'JOAQUIM FELÍCIO', 'MG', '2013-05-24 16:32:25', 8),
(412, 'ALESAT COMBUSTIVEIS', '', 'Karen Louise Rodrigues Motta', '', '', '', '', '', 'BETIM', 'MG', '2013-05-27 11:19:56', 8),
(413, 'JABIL DO BRASIL IND. ELETROELETRÔNICA LTDA.', '', 'Egléia Souza\r\nJabil do Brasil Ind. Eletroeletrônica Ltda.\r\nQualidade\r\n( +55 31 2103 4955 / 7 + 55 31 2103 9370\r\nwww.jabil.com\r\n ', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-05-27 15:50:25', 8),
(414, 'CMP - COMPONENTES E MÓDULOS PLÁSTICOS INDÚSTRIA E COMÉRCIO LTDA', '', '', 'RUA DOMINGOS COSTA', '', '', '', '', 'CONTAGEM', 'MG', '2013-05-29 14:37:05', 8),
(415, 'BERTECH LTDA', '', '', '', '', '', '', '', 'SANTIAGO - CHILE', 'CH', '2013-06-03 14:52:51', 8),
(416, 'ETI INSPEÇÃO E CONTROLE DE QUALIDADE LTDA', '', '', '', '', '', '', '', '', '', '2013-06-05 09:27:05', 8),
(417, 'ETI INSPEÇÃO E CONTROLE DE QUALIDADE LTDA', '', 'Cecília Valladares Moreira\r\nETI Inspeção e Controle de Qualidade Ltda.\r\nDepartamento de Meio Ambiente\r\nFone (31) 3413-9660\r\ncecilia@etiltda.com.br  ', 'RUA ESPINOSA', '385', '', 'CARLOS PRATES', '', 'BELO HORIZONTE', 'MG', '2013-06-05 09:27:55', 8),
(418, 'VITALLIS SAÚDE S.A.', '', '', ' Av. Dr. Álvaro Camargos', '2002', '', 'SÃO JOÃO BATISTA', '', '', '', '2013-06-05 09:40:14', 8),
(419, 'VITALLIS SAÚDE S.A.', '', '', 'Av. DR. ÁLVARO CAMARGOS', '2002', '', 'SÃO JOÃO BATISTA', '', 'VENDA NOVA', 'MG', '2013-06-05 09:41:41', 8),
(420, 'VITALLIS SAÚDE S.A.', '', '', 'Av. DR. ÁLVARO CAMARGOS', '2002', '', 'SÃO JOÃO BATISTA', '', 'VENDA NOVA', 'MG', '2013-06-05 09:41:41', 8),
(421, 'HOSPITAL UNIVERSITÁRIO SÃO JOSÉ - HUSJ', '', '', 'Rua Aimorés', '2.896', '', 'SANTO AGOSTINHO', '', 'BELO HORIZONTE', 'MG', '2013-06-05 09:49:05', 8),
(422, 'DIAMOND MALLl', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-06-10 13:48:48', 8),
(423, 'PREFEITURA MUN. DE SANTA LUZIA', '', '', '', '', '', '', '', 'SANTA LUZIA', 'MG', '2013-06-17 12:13:59', 8),
(424, 'LONAX - Indústria Brasileira de Lonas', '', '', '', '', '', '', '', 'SARZEDO', 'MG', '2013-06-17 15:07:04', 8),
(425, 'BRIGHTSTAR', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2013-06-18 11:29:00', 8),
(426, 'ANGLOGOLD ASHANTIi', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-06-19 09:34:49', 8),
(427, 'HELIO PEREIRA', '16864233000172', '', 'R BANDEIRANTES ', 'S/N', '', 'FIDALGO ', '33.600-000', 'PEDRO LEOPOLDO ', 'MG', '2013-06-25 09:25:13', 8),
(428, 'VIOBRÁS CONSTRUÇÕES LTDA. ', '09629059000118', 'VIOBRÁS CONSTRUÇÕES LTDA. ', 'Estrada Velha Rio - São Paulo, Km. 99,7, Sl. 2 ', '', '', 'PEDREGULHO ', '12308970 ', 'JACAREÍ', 'SP', '2013-06-25 16:33:14', 8),
(429, 'AMBIENTEC CONSULTORIA AMBIENTAL', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-06-28 13:51:24', 8),
(430, 'MAURO MORAES', '', '', '', '', '', '', '', '', '', '2013-07-03 16:37:04', 8),
(431, 'FIBRAER INDÚSTRIA AERONAÚTICA LTDA ', '', '', '', '', '', '', '', '', '', '2013-07-03 17:49:11', 8),
(432, 'FIBRAER INDÚSTRIA AERONÁUTICA LTDA ', '', '', '', '', '', '', '', 'SABARÁ', 'MG', '2013-07-03 17:50:42', 8),
(433, 'MÍNERA EMPREENDIMENTOS MINERÁRIOS', '', '', '', '', '', '', '', 'NOVA LIMA', 'MG', '2013-07-04 14:04:26', 8),
(434, 'MINAS PLAN', '', '', 'Rua Pedra Bonita', '1079', '', 'Alto Barroca', '', 'BELO HORIZONTE', 'MG', '2013-07-09 15:27:37', 8),
(435, 'MINERITA MINERÁRIOS LTDA', '', '', 'PRAÇA AUGUSTO GONÇALVES', '146', '2º ANDAR', '', '35680-054', 'ITAÚNA', 'MG', '2013-07-10 09:35:26', 8),
(436, 'ELAINE CRISTIA DAS NEVES REIS', '', '', 'Av. João César de Oliveira', '3000', '', 'Bairro Santa Cruz Industrial ', '32.340-000', 'CONTAGEM', 'MG', '2013-07-15 10:58:09', 8),
(437, 'Vertical Green do Brasil', '', '', 'Rua 02, Qd. 09, Módulo R-35, ', '', 'Distrito Agroindustrial, ', '', '', 'Senador Canedo', 'GO', '2013-07-15 14:19:47', 8),
(438, 'VERDE MATA ENGENHARIA AMBIENTAL LTDA ', '', '', 'RUA AQUILES LOBO', '111', '2º ANDAR', 'FLORESTA', '30.150-160', 'BELO HORIZONTE', 'MG', '2013-07-17 10:27:23', 8),
(439, 'CONSTRUÇÕES E COMÉRCIO CAMARGO E CORREA LTDA ', '', 'A proposta deverá ser encaminhada por e-mail para\r\nleonidas.azevedo@camargocorrea.com até as 18:00hs do dia 22/07/2013, sendo\r\na via original encaminhada pelos correio aos cuidados do Sr. Leônidas, para: EEFC–\r\nAv. 05, nº 06 – QD. (D), lote 06 – Distrito Industrial 09 - CEP: 65.090-272 -\r\nAltamira-PA.', '', '', '', '', '', 'ALTAMIRA', 'PA', '2013-07-17 14:53:51', 8),
(440, 'PREFEITURA MUNICIPAL DE BELO HORIZONTE', '', '', 'AVENIDA AFONSO PENA', '1212', '', '', '', 'BELO HORIZONTE', 'MG', '2013-07-18 11:40:57', 8),
(441, 'LT CONSULTORIOS MÉDICOS LTDA', '06343734000150', '', 'AVENIDA OLEGÁRIO  MARIEL', '1453', '', 'LOURDES', '', 'BELO HORIZONTE', 'MG', '2013-07-18 13:26:29', 8),
(442, 'QUATRO EMPRESARIAL', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2013-07-19 11:30:00', 8),
(443, 'GNV IGAS LTDA', '04758543000123', '', 'rUA DR. SEBASTIÃO MASCARENHAS', '188', '', 'SÃO GERALDO', '', 'SETE LAGOAS', 'MG', '2013-07-22 07:56:37', 29),
(444, 'SESC/MG - SERVIÇO SOCIAL DO COMÉRCIO ', '03643856/0001-', '', 'RUA TUPINAMBÁS', '956', '', 'CENTRO', '30.920-906', 'BELO HORIZONTE', 'MG', '2013-07-24 11:26:59', 8),
(445, 'ECOBAUEN CONSTRUCOES E PLANEJAMENTO LTDA - ME ', '02757980000105', '', 'R VANCOUVER ', 'S/N', 'QUADRA: 00104; LOTE: 0004', 'JARDIM CANADA', '34.000-000', 'NOVA LIMA ', 'MG', '2013-07-25 15:18:36', 8),
(446, 'AT LOCAÇÕES LTDA - ME', '14189525000121', '', 'RUA. ALEXANDRE DRUMOND', '49 C', '', 'CENTRO', '35.900-010', 'ITABIRA', 'MG', '2013-07-25 16:24:18', 8),
(447, 'SGO - CONSTRUÇÕES ENGENHARIA DE SOLUÇÕES', '', '', 'Rua Desembargador TorreS', '501', '', 'CAIÇARA', '31230-080', 'BELO HORIZONTE', 'MG', '2013-07-31 11:09:06', 8),
(448, 'Ecisa Participações Ltda', '07.749.876/000', '', 'Avenida Afrânio de Melo Franco', '290', 'salas 102, 103 e 104', 'leblon', '', 'rio de janeiro', 'rj', '2013-07-31 12:10:09', 8),
(449, 'Telemont - Engenharia de Telecomunicações S/A', '', '', '', '', '', '', '', '', '', '2013-08-12 11:25:43', NULL),
(450, 'Urbtopo Engenharia e Construções LTDA', '17462219000105', '', 'R JOAQUIM NABUCO ', '59', '', 'JARDIM INDUSTRIAL', '32.215-220', 'CONTAGEM', 'MG', '2013-08-19 15:08:06', NULL),
(451, 'INCA - Incineração e Controle Ambiental Ltda', '07271139000119', '', '', '', '', '', '', 'PRUDENTE DE MORAIS', 'MG', '2013-08-27 10:32:43', NULL),
(452, 'PATRIARCA CONSTRUTORA E INCORPORADORA LTDA', '', '', 'RUA LUTHER KING', '67', '', 'CIDADE NOVA', '31170100', 'BELO HORIZONTE', 'MG', '2013-09-02 09:37:06', NULL),
(453, 'T.I BRASIL INDÚSTRIA E COMÉRCIO LTDA ', '', '', 'Rod. MG 050, km 18', '', '', '', '35.675-000', 'JUATUBA', 'MG', '2013-09-02 11:46:33', NULL),
(454, 'CEFET', '', '', '', '', '', '', '', 'leopoldina', 'MG', '2013-09-05 15:30:43', NULL),
(455, 'bii investimentos imobiliários ltda', '', '', '', '', '', '', '', 'bh', 'MG', '2013-09-16 10:09:21', NULL),
(456, 'samarco ', '', '', 'Mina do Germano', 's/n', '', '', '35420000', 'mariana', 'MG', '2013-09-16 15:13:51', 8),
(457, 'PACKFOODS COMERCIO EMPACOTADORA E BENEFICIADORA LTDA ', '12975962000145', '', 'AV DAS ACACIAS', '256', '', 'CAMPINA VERDE ', '32.150-370', 'CONTAGEM', 'MG', '2013-09-19 08:45:23', NULL),
(458, 'Eccos Indústria Metalurgia Ltda.', '', '', 'Av. Prefeito Alberto Moura', '100', '', 'DISTRITO INDUSTRIAL', '35.702-383', 'SETE LAGOAS', 'MG', '2013-09-26 11:09:07', NULL),
(459, 'gs souto engenharia', '', '', 'rua odilon braga', '1352', '', 'mangabeiras', '30310-390', 'BELO HORIZONTE', 'MG', '2013-10-01 10:49:47', NULL),
(460, 'DILSON SOARES DE QUEIROZ', '', '', '', '', '', '', '', 'RIBEIRÃO DAS NEVES', 'MG', '2013-10-09 09:04:20', NULL),
(461, 'VIAÇÃO ANCHIETA LTDA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-10-09 11:09:39', NULL),
(462, 'MANG HIDRAU LTDA', '17486309000136', '', 'rua paracatu', '10', 'lojas 20 e 30', 'barro preto', '30180-090', 'BELO HORIZONTE', 'MG', '2013-10-09 16:32:08', NULL),
(463, 'ENGINEERING', '', '', '', '', '', '', '', 'SAO PAULO', 'SP', '2013-10-10 15:57:55', NULL),
(464, 'MCA - Auditoria e Gerenciamento Ltda.', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-10-14 10:17:34', NULL),
(465, 'ALEXANDRE MENDONÇA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-10-16 15:29:48', NULL),
(466, 'PREMO SOLUÇÕES CONSTRUTIVAS', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-10-16 17:42:55', NULL),
(467, 'CONDOMÍNIO VILLE DE LAC''S', '', '', '', '', '', '', '', 'NOVA LIMA', 'MG', '2013-10-23 15:13:25', NULL),
(468, 'ArcelorMittal Sabará ', '', '', '', '', '', '', '', 'sabará', 'MG', '2013-10-25 10:53:34', NULL),
(469, 'STAFF AUDIÊNCIAS PÚBLICAS', '', '', 'RUA CANABRAVA', '447', '', 'CENTRO', '38610000', 'UNAÍ', 'MG', '2013-10-28 11:03:10', 8),
(470, 'ECOSOL SOLUÇÕES EM TRATAMENTO DE RESÍDUOS', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-10-31 09:27:36', NULL),
(471, 'AM DESPACHANTE', '', '', 'Avenida Waldomiro Lobo,', '851', '', 'GUARANI', '31814-620', 'BELO HORIZONTE', 'MG', '2013-10-31 09:29:02', NULL),
(472, 'END Industria Aeronáutica Ltda', '', '', 'Avenida Heráclito Mourão de Miranda', '2122', 'GALPÃO 3', 'CASTELO', '31330-382', 'BELO HORIZONTE', 'MG', '2013-11-01 11:44:06', NULL),
(473, 'GE Transportes Ferroviários S/A ', '', '', 'Avenida General David Sarnoff', '4600', '', 'CIDADE INDUSTRIAL', '', 'CONTAGEM', 'MG', '2013-11-04 10:39:01', NULL),
(474, 'BBOSCH GALVANIZAÇÃO', '', '', 'AV.ENG. JOÃO FERNANDES GIMENEZ MOLINA', '50', '', 'DISTRITO INDUSTRIAL', '13213-080', 'JUNDIAÍ', 'SP', '2013-11-06 15:59:10', NULL),
(475, 'PIR2 Consultoria Ambiental', '', '', '', '', '', '', '', 'rio de janeiro', 'rj', '2013-11-14 10:23:47', NULL),
(476, 'INSTITUTO INHOTIM', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-11-27 14:50:27', NULL),
(477, 'GE Healthcare', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2013-12-03 17:19:47', NULL),
(478, 'FAZENDA MACAÚBAS', '', '', '', '', '', '', '', 'SANTA LUZIA', 'MG', '2013-12-16 14:09:34', NULL),
(479, 'A DDTIZA LTDA', '26269308000120', '', 'RUA CONTRIA ', '714', '', 'ALTO BARROCA', '30431-028', 'BELO HORIZONTE', 'MG', '2013-12-18 14:30:15', 8),
(480, ' ISRINGHAUSEN INDUSTRIAL LTDA ', '', '', 'RUA Jacuí', '370', '', 'CAMPANÁRIO', '09930-280 ', 'Diadema', 'SP', '2013-12-19 16:01:34', NULL),
(481, 'JML COMÉRCIO IMPORTAÇÃO E DISTRIBUIÇÃO DE PRODUTOS FARMACÊUTICOS LTDA.-ME', '06271999000190', '', 'RUA MÁUREA DE OLIVEIRA FANTONI', '59', '', 'CANDELÁRIA', '31.535-620', 'BELO HORIZONTE', 'MG', '2013-12-19 16:24:33', NULL),
(482, 'BER - BROOKFIELD ENERGIA RENOVÁVEL', '', '', 'Av. das Américas', '4430', 'salas 303 e 304 ', 'BARRA DA TIJUCA', '22640-102 ', 'rio de janeiro', 'rj', '2014-01-09 16:58:04', NULL),
(483, 'PROSIND - SÍNDICOS PROFISSIONAIS', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-01-16 09:10:50', NULL),
(484, 'POLÍCIA MILITAR DO ESTADO DE MINAS GERAIS 1º BATALHÃO – Centro Odontológico', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'mg', NULL, NULL),
(485, 'EPO - SOLUÇÕES INOVADORAS', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-01-21 14:37:06', NULL),
(486, 'MASB Desenvolvimento Imobiliário S.A.', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-01-22 12:08:54', NULL),
(487, 'IDEAL COSMÉTICOS', '', '', 'RUA SEIS ', '80', '', 'OSWALDO BARBOSA PENNA', ' 34000000', 'NOVA LIMA', 'MG', '2014-01-23 15:17:37', NULL),
(488, 'Nello Aun', '', '99845302', '', '', '', '', '', 'NOVA LIMA', 'MG', '2014-01-27 11:00:10', NULL),
(489, 'Dental Thru Produtos Odontológicos Ltda ', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-01-30 14:19:12', NULL),
(490, 'Elis Christina', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-01-30 14:23:41', NULL),
(491, 'ROVA EQUIPAMENTOS E SERVIÇOS LTDA', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2014-01-30 14:56:31', NULL),
(492, 'ALTERNATIVA DE DEDETIZAÇÃO', '07930532000177', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-02-03 17:11:26', NULL),
(493, 'Alves e Perpetuo Eireli', '00790288000145', '', 'Av. dr. Cristiano Guimaraes', '1787', '', 'PLANALTO', '', 'BELO HORIZONTE', 'MG', '2014-02-04 09:14:44', NULL),
(494, 'YAZAKI AUTOMOTIVE PRODUCTS DO BRASIL, SISTEMAS ELÉTRICOS LTDA', '02095593001114', '', '', '', '', '', '', 'PEDRO LEOPOLDO', 'MG', '2014-02-04 09:34:42', NULL),
(495, 'Lynd Calçados Ltda', '01577578000178', '', '', '', '', '', '', 'NOVA SERRANA ', 'MG', '2014-02-12 14:18:53', NULL),
(496, 'YOKI alimentos s.a', '', '', '', '', '', '', '', 'cambará', 'pr', '2014-02-25 08:42:10', NULL),
(497, 'TRANSNORTE CARGAS E ENCOMENDAS LTDA', '6529338300340', '', 'RUA ARTUR HAAS', '385', '', 'JARDIM MONTANHÊS', '30730690', 'BELO HORIZONTE', 'MG', '2014-02-25 09:27:51', NULL),
(498, 'Cia Industrial H.Carlos Schneider - CISER', '84709955001184', '', 'AV COMENDADOR FRANCISCO ALVES QUINTAS', '123', 'GALPÃO 2', 'DISTRITO INDUSTRIAL ', '32.450-000', 'SARZEDO', 'MG', '2014-02-25 17:08:21', NULL),
(499, 'W M AFIACAO DE FERRAMENTAS LTDA - EPP', '02779103000127', '', 'R SAO MARTINHO', '165', '', 'JAARDIM ALTEROSAS ', '32.660-150', 'BETIM', 'MG', '2014-02-26 09:01:39', NULL),
(500, 'PREFEITURA DE Paraisópolis', '', '', '', '', '', '', '', 'PARAISÓPOLIS', 'MG', '2014-03-12 10:20:32', NULL),
(501, 'SAQUETTO INDUSTRIAL', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2014-03-13 09:53:27', NULL),
(502, 'moreira franco arquitetura', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-03-13 14:01:12', NULL),
(503, 'GRAMADUS ', '', 'Marcílio Martins\r\n+55 31 3396-1511	  	 \r\n analistaambiental@gramadus.com.br \r\n 	www.gramadus.com.br \r\n', 'AVENIDA CENTAURO', '645', '', 'DI RIACHO DAS PEDRAS', '32242000', 'CONTAGEM', '', '2014-03-15 10:13:24', 6),
(504, 'CADETE PROJETOS E CONSULTORIAS', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-03-17 09:19:10', NULL),
(505, 'Concessionária BR040 S/A', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-03-19 10:50:13', NULL),
(506, 'TIROL PLANTAS', '', '', '', '', '', '', '', 'BH', 'MG', '2014-03-19 16:34:14', NULL),
(507, 'Neumayer Tekfor Automotive Brasil Ltda', '', '', 'Av. Arquimedes', '399', '', '', '', 'JUNDIAÍ', 'SP', '2014-03-20 14:40:25', NULL),
(508, 'CONRA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-03-21 09:08:16', NULL),
(509, 'CASA DA MOEDA DO BRASIL', '', '', '', '', '', '', '', 'RIO DE JANEIRO', 'rj', '2014-03-21 11:47:30', NULL),
(510, 'Nacional Gás Butano Distribuidora Ltda Gás Butano Distribuidora Ltda', '', '', '', '', '', '', '', 'betim', 'MG', '2014-03-25 11:37:07', NULL),
(511, 'MSPAR - ENERGIA E PARTICIPAÇÕES', '19088925000164', '', 'Avenida das Nações Unidas', '12399', 'Conjunto 128-A • Edificio', '', '', 'SAO PAULO', 'SP', '2014-03-31 17:19:56', NULL),
(512, 'ALTA - ENGENHARIA MECANICA LTDA - EPP ', '25464355000162', '', 'R TRATOY ', '147', '', 'JARDIM PIEMONT ', '32.678-460', 'Betim', 'MG', '2014-04-08 11:30:12', NULL),
(513, 'PARCELAR URBANISMO', '', '', 'Av. Canadá', '639', '', 'JARDIM CANADA', '', 'NOVA LIMA', 'MG', '2014-04-23 08:45:29', NULL),
(514, 'FORCASA ', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2014-04-25 11:15:55', NULL),
(515, 'Salatini Instalações Elétricas Ltda', '', '', '', '', '', '', '', 'SETE LAGOAS', 'MG', '2014-04-29 16:35:41', NULL),
(516, '', '', '', '', '', '', '', '', '', '', '2014-04-29 16:35:40', NULL),
(517, 'PIEP', '', '', '', '', '', '', '', '', '', '2014-05-05 09:21:50', NULL),
(518, 'PIEP', '', '', '', '', '', '', '', '', '', '2014-05-05 09:21:50', NULL),
(519, 'PIPE SISTEMAS TUBULARES', '', '', 'Via Expressa de Contagem', '3500', '', 'CINCÃO', '', 'CONTAGEM', 'MG', '2014-05-07 10:42:29', NULL),
(520, 'PHILIPS MEDICAL SYSTEMS LTDA ', '58295213001816', '', 'R PREFEITO ELIZEU ALVES DA SILVA ', '', '', 'DIST. IND. GENESCO AP. DE OLIV', '33.400-000', 'LAGOA SANTA ', 'MG', '2014-05-07 17:50:47', NULL),
(521, 'G 4 ', '', '', '', '', '', '', '', 'VIÇOSA', 'MG', '2014-05-13 11:51:08', NULL),
(522, 'neourbanismo ', '', '', 'rua leopoldina ', '48', '', 'santo antônio ', '', 'BELO HORIZONTE', 'MG', '2014-05-15 14:48:58', NULL),
(523, 'SOMAR GESTÃO DE PROJETOS', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-05-20 15:55:22', NULL),
(524, 'jlx mineração ', '', '', '', '', '', '', '', 'montes claros', 'MG', '2014-05-21 09:40:28', NULL),
(525, 'ALTIVO PEDRAS LTDA ', '', '', 'Fazenda São João da Barra', '', '', '', '', 'paraopeba', 'MG', '2014-05-26 16:43:22', NULL),
(526, 'MRS AMBIENTAL', '', '', 'Avenida Praia de Belas', '403', 'SALA 2174', 'MENINO DE DEUS', '90.110-001', 'PORTO ALEGRE', 'RS', '2014-05-29 09:18:04', NULL),
(527, 'NASSAU', '', '', '', '', '', '', '', 'Codó', 'MA', '2014-06-05 10:36:53', NULL),
(528, 'MAGNÍFICO RECEPÇÕES LTDA ME', '14309317000119', '', 'Rua José Gonçalves ', '559', '', 'Barreiro de Baixo', '', 'BELO HORIZONTE', 'MG', '2014-06-09 15:01:46', NULL),
(529, 'CELULOSE IRANI S.A.', '', '', 'Avenida das Indústrias', '2445', '', 'Vila Olga', '33030-510', 'SANTA LUZIA', 'mg', '2014-06-18 14:41:22', NULL),
(530, 'RADIADORES LIDER SERVICOS E COMERCIO LTDA ', '17739750000182', '', 'R ESTORIL', '1449 ', '', 'SAO FRANCISCO', '31.255-190', 'BELO HORIZONTE', 'MG', '2014-06-23 10:55:51', NULL),
(531, 'ANDERSON VINICIUS', '', '', '', '', '', '', '', 'BRUMADINHO', 'MG', '2014-07-09 15:54:22', NULL),
(532, 'GISLAINE GIMENES', '', '', '', '', '', '', '', 'VESPASIANO', 'MG', '2014-07-10 12:20:56', NULL),
(533, 'GISLAINE GIMENES', '', '', '', '', '', '', '', 'VESPASIANO', 'MG', '2014-07-10 12:20:56', NULL),
(534, 'JM SOUTO Engenharia e Consultoria Ltda.', '', '', 'Rua Acaraú', '196', 'Conj.09', '', '30380-020', 'BELO HORIZONTE', 'MG', '2014-07-15 15:24:41', NULL),
(535, 'RHODES S/A', '60657624000701', '', 'ROD MG-5', '651', '', 'GOIANIA', '31.950-000', 'BELO HORIZONTE', 'MG', '2014-07-31 15:20:27', NULL),
(536, 'copasa - cia de saneamento de minas gerais', '17281106000103', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-08-13 10:11:26', NULL),
(537, 'GRUPO SERPA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-08-13 14:44:47', NULL),
(538, 'Verdejá Indústria e Comércio de Fertilizantes Ltda', '', '', '                                Rodovia MG-060, km 112 Zona Rural ', '', '', '', '', 'Abaeté', '', '2014-08-13 14:54:13', NULL),
(539, 'ALTEC TECNOLOGIA NA INDUSTRIALIZACAO DE ALUMINIO LTDA - EPP ', '07490858000120', '', 'R A ', '240', '', 'FERNAO DIAS ', '35.740-000', 'esmeraldas', 'MG', '2014-08-19 15:31:31', NULL),
(540, 'ECOSYSTEM', '', '', '', '', '', '', '', 'ARCOS', 'MG', '2014-08-22 11:03:21', NULL),
(541, 'Tex fund Aluminio Ltda', '', '', '', '', '', '', '', 'Betim', 'MG', '2014-08-25 09:22:51', NULL),
(542, 'MARTINS LANA', '', '', 'FAZENDA RANCHO NOVO ', 'CAIXA 295', '', 'PRAIA', '', 'CONTAGEM', 'MG', '2014-08-26 09:23:08', NULL),
(543, 'RRX 07 INCORPORACOES SPE LTDA ', '20150344000194', '', '', '', '', '', '', 'astolfo dutra', 'MG', '2014-08-26 11:57:39', NULL),
(544, 'FEAM - fUNDAÇÃO ESTADUAL DE MEIO AMBIENTE', '', '', 'RODOVIA PREFEITO AMÉRICO GIANETTI', 'S/N', '', 'SERRA VERDE', '31630900', 'BELO HORIZONTE', 'MG', '2014-09-01 09:49:26', 10),
(545, 'prefeitura de sete lagoas', '', '', 'rua quintino bocaiúva', '618', '', 'jardim cambuí', '35700845', 'sete lagoas', 'MG', '2014-09-01 10:08:55', 10),
(546, 'ultragaz', '', '', 'estrada do petrovale', '150', '', 'distrito industrial marsil', '32400000', 'ibirité', 'MG', '2014-09-01 10:10:17', 8),
(547, 'PRINTFORM INDUSTRIA GRAFICA', '65236036000114', '', 'R CASCAIS', '404', '', 'SAO FRANCISCO', '31255070', 'BELO HORIZONTE', 'MG', '2014-09-02 11:32:28', NULL),
(548, 'LIGHTGER S.A.', '04430725000170', '', 'Av. Marechal Floriano', '168', '', 'centro', '20080-002', 'rio de janeiro', 'rj', '2014-09-05 09:29:55', NULL),
(549, 'FARNESE INDUSTRIA E COMERCIO LTDA - EPP', '26040121000150', '', 'R CALDAS DA RAINHA', '809', '', '', ' 31255-180', 'BELO HORIZONTE', 'MG', '2014-09-10 16:29:48', NULL),
(550, 'ESCALA EMPREENDIMENTOS LTDA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-09-10 16:50:02', NULL),
(551, 'ponto das impressoras', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-09-15 09:15:53', NULL),
(552, 'Philips do Brasil', '', '', '', '', '', '', '', 'lagoa santa', 'MG', '2014-09-15 14:23:39', NULL),
(553, 'MGA ENGENHARIA E GEOLOGIA LTDA', '', '', 'Rua Ludgero Dolabela', '1021', 'SALA 408', 'Gutierrez', '30.441-048', 'BELO HORIZONTE', 'MG', '2014-09-24 15:05:31', NULL),
(554, 'ESAB INDUSTRIA E COMERCIO LTDA', '29799921000148', '', 'R ZEZE CAMARGOS', '117', '', 'CIDADE INDUSTRIAL', '32.210-080', 'contagem', 'MG', '2014-10-07 15:56:17', NULL),
(555, 'REBOQUES UNIAO INDUSTRIA E COMERCIO LTDA - ME ', '01524559000183', '', 'R CALDAS DA RAINHA ', '1256', '', 'SAO FRANCISCO ', '31.255-180', 'BELO HORIZONTE', 'MG', '2014-10-14 17:53:33', NULL),
(556, 'framcap', '', '', '', '', '', '', '', '', '', '2014-10-21 22:58:06', 7),
(557, 'Organizações Francap S/A ', '', '', 'Faz. Santo Antônio/São Francisc', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-10-22 10:42:25', NULL),
(558, 'SENAC - Serviço Nacional de Aprendizagem Comercial ', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2014-10-22 11:20:35', NULL),
(559, 'AMERON POLYPLASTER INDÚSTRIA E COMÉRCIO LTDA', '08575668000179', '', 'Rua Ponte de Lima', 'S/Nº (Esquina com a BR 381 – K', '', 'São João', '32.655-516', 'BETIM', 'MG', '2014-11-11 16:34:10', NULL),
(560, 'antonio alvim medeiros', '00201161000143', '', 'rua marzagao', '115', '', 'renascença', '31130750', 'BELO HORIZONTE', 'mg', '2014-11-13 11:19:45', NULL),
(561, 'aNDRADE VALLADARES ENGENHARIA', '', '', 'RUA TOMÉ DE SOUZA 649', '649', '', '', '', '', '', '2014-11-14 18:20:07', 8),
(562, 'PREFEITURA DE MARIANA', '', '', '', '', '', '', '', 'MARIANA ', 'MG', '2014-11-20 09:25:33', NULL),
(563, 'PROCESSO DORISMAR', '', '', '', '', '', '', '', 'sETE LAGOAS', 'MG', '2014-11-21 11:26:07', NULL),
(564, 'VIENA FAZENDAS REUNIDAS LTDA ', '19527852000160', '', 'ST FAZENDA MARAMBAIA ', 'KM7 ', 'ESTRADA DA UNIAGRO	', '', '39.270-000', 'pirapora', 'MG', '2014-12-03 10:20:16', NULL),
(565, 'MRV Engenharia e Participações S.A.          ', '', '', 'Av. Raja Gabáglia', '2674', '', '', '', 'BELO HORIZONTE', 'MG', '2015-01-05 15:44:45', NULL),
(566, 'aUTO MECANICA ROMULO', '64374523000180', '', 'RUA LEOPOLDINA DE OLIVEIRA', '481', '', 'SENHOR BOM JESUS', '', 'BELO HORIZONTE', 'MG', '2015-01-07 16:03:14', NULL),
(567, 'FAURECIA', '', '', '', '', '', '', '', 'BETIM', 'MG', '2015-01-30 10:48:38', NULL),
(568, 'Ical Energética Ltda- Fazenda Morrinhos ', '', '', 'Fazenda Morrinhos, s/nº', '', 'Distrito de São Bento', '', '', 'TRES MARIAS', 'MG', '2015-01-30 18:02:52', NULL),
(569, 'SIMAO RADIOGRAFIAS DENTARIAS LTDA - EPP', '', '', 'R MATIAS CARDOSO', '63', '', 'SANTO AGOSTINHO', '30.170-914', 'BELO HORIZONTE', 'MG', '2015-02-02 15:49:11', NULL),
(570, 'JM SERVIÇOS', '', '', 'RUA CONSELHEIRO AFONSO PENA', '232', '', 'CENTRO', '35960000', 'SANTA BÁRBARA', 'MG', '2015-02-04 11:09:56', 8),
(571, 'WMB COMÉRCIO ELETRÔNICO LTDA', '14314050000158', '', 'Avenida Tamboré', '267', '6º ao 11º andar', '', '', 'BARUERI', 'SP', '2015-02-05 12:25:34', NULL),
(572, 'COSMA DO BRASIL PRODUTOS E SERVICOS AUTOMOTIVOS LTDA', '02591818000909', '', 'AV INDUSTRIAL', '1850', '', 'JARDIM DAS ROSAS ', '32.400-000', 'IBIRITE', 'MG', '2015-02-05 18:33:07', NULL),
(573, 'INCORPE EMPREENDIMENTOS IMOBILIARIOS LTDA ', '18737322000183', '', 'R UNIVERSO', '36', 'SALA: 202', 'SANTA LUCIA ', '30350612', 'BELO HORIZONTE', 'MG', '2015-02-11 10:41:49', 8),
(574, 'Skill Engenharia Ltda', '02991032000121', '', 'Rua Carlos Von Koseritz', '1067', '', '', '90540-031', 'SAO SEBASTIAO DO CAI', 'rs', '2015-02-20 12:06:06', NULL),
(575, 'PATOGÊ JEANS', '', '', '', '', '', '', '', 'IBIRITE', 'MG', '2015-02-20 14:20:56', NULL),
(576, 'APA CONFECÇÕES S.A.', '33835497000389', '', 'Rua 27 de Abril', '260', '', 'FÁBRICA', '36700-000', 'LEOPOLDINA', 'MG', '2015-03-02 09:34:40', NULL),
(577, 'GRUPO VPA', '', '', 'Av. Contorno', '6664', '6º', '', '', 'BELO HORIZONTE', 'MG', '2015-03-05 09:04:51', NULL),
(578, 'GEOMETA LTDA - ME ', '20614004000410', '', 'OTR CORREGO ITATIAIA ', '', 'FAZENDA DOIS IRMAOS	', '', '35.240-000', 'CONSELHEIRO PENA ', 'MG', '2015-03-05 11:28:15', NULL),
(579, 'VIA MAGNA CONSTRUÇÕES E EMPREENDIMENTOS LTDA', '15157151000106', '', 'RUA SÃO PEDRO DA ALDEIA', '1200', '', 'OLHOS D’ÁGUA ', '30.390-000', 'BELO HORIZONTE', 'MG', '2015-03-12 09:24:51', NULL),
(580, 'A.W. Faber-Castell S.A', '', '', 'Rodovia BR-153', '', 'Km 109+500 m', ' DISTRITO INDUSTRIAL', '38140-000 ', 'PRATA', 'MG', '2015-03-12 10:46:51', NULL),
(581, 'SABOR SEM GLUTEN PRODUTOS NATURAIS LTDA - ME', '21383804000197', '', 'AV FRANCISCO SA', '345', 'LETRA: B;', 'PRADO', '30.411-145', 'BELO HORIZONTE', 'MG', '2015-03-13 09:52:29', NULL),
(582, 'CONSÓRCIO DA USINA HIDRELÉTRICA DE IGARAPAVA', '', '', 'PRAÇA RUI BARBOSA', '300', 'SALA 612', '', '', 'UBERABA', 'MG', '2015-03-18 11:55:14', NULL),
(583, 'FERREIRA ROCHA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2015-03-19 09:34:48', NULL),
(584, 'FLÁVIA DE PAULA SOARES', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2015-03-23 14:45:13', NULL),
(585, 'ALIANÇA GERAÇÃO DE ENERGIA S.A', '12009135000105', '', 'RUA SAPUCAÍ', '383', '', 'FLORESTA', '', 'BELO HORIZONTE', 'MG', '2015-03-24 17:03:41', NULL),
(586, 'ELETROMEC SERVICOS ELETRICOS E MECANICOS LTDA - ME', '14307973000182', '', 'R DOZE', '495', '', 'JARDIM VERONA', '33.821-035', 'rIBEIRÃO DAS NEVES', 'MG', '2015-03-30 14:47:17', NULL),
(587, 'RACIONAL ENGENHARIA', '', '', '', '', '', '', '', 'BH', 'MG', '2015-04-07 11:10:50', NULL),
(588, 'RC TRANSPORTES EXECUTIVOS', '', 'Fone / Fax (19) 38375344 das 09:00 as 20:00\r\nTel. (19) 78039860 / 78058185 / (Nextel) 55*82*48004 / 55*82*7086624Hs\r\nE-Mail: rctransportesexecutivos@bol.com.br\r\nAgendamentos agendamento@rctransportesexecutivos.com.br\r\n', 'AVENIDA ENY PONCE VILELA LIMA', '257', '', 'CRUZEIRO DO SUL', '', 'JAGUARIUNA', 'SP', '2015-04-10 11:34:54', 30),
(589, 'SOFIR DO BRASIL CONSTRUÇÕES INDUSTRIAIS LTDA', '06313403000177', '', 'é Rua Dois', '450', '', 'D.I. Riacho das Pedras', '', 'contagem', 'MG', '2015-04-14 17:24:16', NULL),
(590, 'INTERLIGAÇÃO ELÉTRICA DE MINAS GERAIS S.A', '08580534000227', '', 'ROD BR-040', 'KM 515', '', 'JARDIM COLONIAL', '33.809-007', 'rIBEIRÃO DAS NEVES', 'MG', '2015-04-16 11:13:56', NULL),
(591, 'NOVO NORDISK PRODUCAO FARMACEUTICA DO BRASIL LTDA', '16921603000166', '', 'AV C ', '1413', '', 'DISTRITO INDUSTRIAL ', '39.404-004', 'MONTES CLAROS', 'MG', '2015-04-22 14:50:05', NULL),
(592, 'ISOMONTE S.A', '17666926000113', '', '', '', '', '', '', 'contagem', 'MG', '2015-04-28 10:31:47', NULL),
(593, 'EMAS - EMPRESA JUNIOR DE MEIO AMBIENTE E SANEAMENTO', '06880229000144', '', 'AV PRESIDENTE ANTONIO CARLOS', '6627', 'SALA 113 ', 'CAMPUS UFMG', '31270010', 'BELO HORIZONTE', 'MG', '2015-04-29 17:04:46', NULL),
(594, 'EPC Engenharia Projeto Consultoria S/A', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2015-04-30 15:31:24', NULL),
(595, 'norte energia - usina de belo monte', '', '', '', '', '', '', '', '', 'pa', '2015-05-20 17:53:45', NULL),
(596, 'CONCRESERV CONCRETO & SERVICOS LTDA ', '06262453000172', '', 'R DOUTOR CESAR', '1368', 'sala 301', 'SANTANA ', '', 'são paulo', 'sp', '2015-05-28 17:51:32', NULL),
(597, 'UNITEC SEMICONDUTORES S.A', '07488680000183', '', 'Rodovia BR 0-40, s/n, Km 508,5', '', '', '', '', 'ribeirão das neves', 'mg', '2015-05-29 16:13:15', NULL),
(598, 'EMPRESA CONSTRUTORA BRASIL', '17164435000840', '', 'AV SIGMUND WEISS ', '100', '', 'pilar', '30.390-200', 'belo horizonte', 'mg', '2015-06-08 11:48:14', NULL),
(599, 'GRUPO PLENO', '', '', '', '', '', '', '', 'belo horizonte', 'mg', '2015-06-11 14:47:06', NULL),
(600, 'IA Energia Renovavel Ltda - Imam Ambiente', '08273207000141', '', 'Rua Alameda do Inga', ' 840/508', '', 'Vale do sereno', '', 'NOVA LIMA', 'MG', '2015-06-16 10:16:03', NULL),
(601, 'holcim cimentos do brasil', '', '', '', '', '', '', '', 'belo horizonte', 'MG', '2015-06-16 18:02:06', NULL),
(602, 'GRUPO IBMEC', '', '', 'Rua Rio Grande do Norte, 300', '', '', '', '', 'belo horizonte', 'MG', '2015-07-02 10:21:25', NULL),
(603, 'COLÉGIO ARNALDO', '', '', '', '', '', '', '', 'belo horizonte', 'MG', '2015-07-13 14:47:06', NULL),
(604, 'CONSTRUTORA tierh', '', '', '', '', '', '', '', 'sete lagoas', 'MG', '2015-07-17 12:11:50', NULL),
(605, 'PROTEGE SAUDE LTDA - EPP ', '02360542000109', '', 'R SAO BENTO', '212', '', 'GRAÇA', '31.140-065', 'belo horizonte', 'MG', '2015-07-21 10:33:15', NULL),
(606, 'EMPRESA 1 SISTEMAS DE AUTOMAÇÃO', '01862295000178', '', 'av ant}oni', '', '', '', '', '', '', '2015-08-19 17:54:03', NULL),
(607, 'EMPRESA 1 SISTEMAS DE AUTOMAÇÃO', '01862295000178', '', '', '', '', '', '', 'belo horizonte', 'mg', '2015-08-19 17:56:30', NULL),
(608, 'TEKS ID DO BRASIL LTDA', '00166948120001', '', 'RUA SENADOR GIOVANNI AGNELLI', '', '', '', '', 'BETIM', 'MG', '2015-09-21 15:15:30', NULL),
(609, 'Electrocoating Minas Pinturas', '12138410000182', '', '', '', '', '', '', 'contagem', 'mg', '2015-09-24 17:26:04', NULL),
(610, 'ULETE MOTA SERVICOS, ENGENHARIA E CONSTRUCOES LTDA - ME ', '23193562000102', '', '', '', '', '', '', 'JOAO MONLEVADE', 'MG', '2015-09-25 14:48:20', NULL),
(611, 'jr construções - MANOEL RIBEIRO DA SILVA JUNIOR CONSTRUCOES - ME ', '', '', '', '', '', '', '', 'SAO CAETANO DO SUL', 'sp', '2015-09-25 15:48:40', NULL),
(612, 'DEPARTAMENTO DE OBRAS PÚBLICAS NO ESTADO DE MG', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2015-10-20 15:41:32', NULL),
(613, 'Air Liquide Brasil Ltda ', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2015-10-21 14:04:14', NULL),
(614, 'SUPER POWER AVIATION LTDA - ME', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2015-10-21 14:10:07', NULL),
(615, 'Estática Engenharia de Projetos Ltda', '', '', '', '', '', '', '', 'SÃO PAULO', 'SP', '2015-10-30 11:49:54', NULL),
(616, 'SPE Vila Real Loteamento Ltda', '', '', '', '', '', '', '', 'belo horizonte', 'mg', '2015-11-19 15:15:46', NULL),
(617, 'ISRINGHAUSEN INDUSTRIAL LTDA', '61036141000230', '', '', '', '', '', '', 'SETE LAGOAS', 'MG', '2015-11-23 14:04:03', NULL),
(618, 'Cooperativa Agropecuária de Itaguara Ltda', '', '', '', '', '', '', '', 'ITAGUARA', 'MG', '2015-11-23 15:19:46', NULL),
(619, 'supermercado bh', '', '', '', '', '', '', '', 'bh', 'mg', '2015-12-02 11:30:39', NULL),
(620, 'SUPERMIX', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'mg', '2015-12-02 11:43:51', NULL),
(621, 'correios', '', '', '', '', '', '', '', 'belo horizonte', 'mg', '2015-12-04 09:49:38', NULL),
(622, 'Emccamp Residencial', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2016-01-04 16:37:42', NULL),
(623, 'BH SAÚDE', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2016-01-08 10:30:28', NULL),
(624, 'giro certo', '', '', '', '', '', '', '', 'contagem', 'MG', '2016-01-08 10:58:17', NULL),
(625, 'CUSHMAN & WAKEFIELD CONSULTORIA IMOBILIÁRIA LTDA', '02730611000110', '', '', '', '', '', '', 'sao paulo', 'sp', '2016-01-12 16:37:42', NULL),
(626, 'MINERAÇÃO DE MANGANÊS NOGUEIRA DUARTE LTDA', '2017725900029', '', '', '', '', '', '', 'CONS. LAFAIETE', 'MG', '2016-01-15 10:44:24', NULL),
(627, 'wt goodman', '', '', '', '', '', '', '', 'são paulo', 'sp', '2016-01-15 12:03:58', NULL),
(628, 'HARAS REPOL', '', '', '', '', '', '', '', 'CONTAGEM', 'MG', '2016-01-19 10:57:38', NULL),
(629, 'PRESERVE CONSULTORIA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2016-01-21 10:08:24', NULL),
(630, 'COMANDO DA AERONAUTICA ', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2016-01-21 10:47:19', NULL),
(631, 'METSO BRASIL INDÚSTRIA E COMÉRCIO LTDA', '', '', '', '', '', '', '', 'BELO HORIZONTE', 'MG', '2016-02-01 11:17:51', NULL),
(632, 'SPINOLA VITORIA', '', '', '', '', '', '', '', 'VITORIA', 'ES', '2016-02-15 09:12:09', NULL),
(633, 'MINERAÇÃO NOGUEIRA', '', '', '', '', '', '', '', 'SABARÁ', 'MG', '2016-02-16 16:23:32', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_CONTATO`
--

CREATE TABLE IF NOT EXISTS `TB_CONTATO` (
  `ID_CONTATO` int(11) NOT NULL AUTO_INCREMENT,
  `NM_CONTATO` varchar(45) DEFAULT NULL,
  `NM_CARGO` varchar(45) DEFAULT NULL,
  `NR_TELEFONE` varchar(45) DEFAULT NULL,
  `NR_TELEFONE2` varchar(45) DEFAULT NULL,
  `TX_OBSERVACAO` text,
  `DS_EMAIL` varchar(45) DEFAULT NULL,
  `FK_CLIENTE` int(11) DEFAULT NULL,
  `NM_LOGRADOURO` varchar(100) DEFAULT NULL,
  `NR_ENDERECO` varchar(100) DEFAULT NULL,
  `DS_COMPLEMENTO` varchar(45) DEFAULT NULL,
  `NM_BAIRRO` varchar(100) DEFAULT NULL,
  `NM_UF` varchar(40) DEFAULT NULL,
  `NR_CEP` varchar(45) DEFAULT NULL,
  `FL_AGENDA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_CONTATO`),
  KEY `fk_TB_CONTATO_TB_CLIENTE1_idx` (`FK_CLIENTE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `TB_CONTATO`
--

INSERT INTO `TB_CONTATO` (`ID_CONTATO`, `NM_CONTATO`, `NM_CARGO`, `NR_TELEFONE`, `NR_TELEFONE2`, `TX_OBSERVACAO`, `DS_EMAIL`, `FK_CLIENTE`, `NM_LOGRADOURO`, `NR_ENDERECO`, `DS_COMPLEMENTO`, `NM_BAIRRO`, `NM_UF`, `NR_CEP`, `FL_AGENDA`) VALUES
(1, 'contato nome', '', '', '', '', '', NULL, '', '', '', '', 'AC', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_DOCUMENTOS`
--

CREATE TABLE IF NOT EXISTS `TB_DOCUMENTOS` (
  `ID_DOCUMENTOS` int(11) NOT NULL AUTO_INCREMENT,
  `DS_REFERENCIA` varchar(45) DEFAULT NULL,
  `DT_EMISSAO` datetime DEFAULT NULL,
  `DT_VENCIMENTO` datetime DEFAULT NULL,
  `TP_DESCRICAO` varchar(45) DEFAULT NULL,
  `TX_OBSERVACAO` text,
  `NM_ARQUIVO` varchar(45) DEFAULT NULL,
  `NM_EXTENSAO_ARQUIVO` varchar(45) DEFAULT NULL,
  `FK_PROJETO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_DOCUMENTOS`),
  KEY `fk_TB_DOCUMENTOS_TB_PROJETO1` (`FK_PROJETO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_NOTICIA`
--

CREATE TABLE IF NOT EXISTS `TB_NOTICIA` (
  `ID_NOTICIA` int(11) NOT NULL AUTO_INCREMENT,
  `DS_TITULO` varchar(200) DEFAULT NULL,
  `TX_NOTICIA` longtext,
  `DS_RESUMO` text,
  `FK_ARQUIVO` int(11) DEFAULT NULL,
  `FK_OPERADOR` int(11) DEFAULT NULL,
  `DT_NOTICIA` datetime NOT NULL,
  `FK_TIPO_NOTICIA` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_NOTICIA`),
  KEY `fk_TB_NOTICIA_arquivo1_idx` (`FK_ARQUIVO`),
  KEY `fk_TB_NOTICIA_TB_OPERADOR1_idx` (`FK_OPERADOR`),
  KEY `fk_TB_NOTICIA_TB_TIPO_NOTICIA1_idx` (`FK_TIPO_NOTICIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `TB_NOTICIA`
--

INSERT INTO `TB_NOTICIA` (`ID_NOTICIA`, `DS_TITULO`, `TX_NOTICIA`, `DS_RESUMO`, `FK_ARQUIVO`, `FK_OPERADOR`, `DT_NOTICIA`, `FK_TIPO_NOTICIA`) VALUES
(1, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velitaa', '<p>aa<br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vulputate mauris pellentesque mi convallis, et tincidunt lorem dignissim. Pellentesque aliquam aliquam nulla. Nullam urna metus, tristique non est eu, pretium tempor mi. Vivamus neque ipsum, accumsan ut nunc quis, vehicula iaculis risus. Maecenas a vulputate nisi. Morbi sit amet metus bibendum, sagittis odio at, placerat enim. Integer sit amet suscipit urna, a consequat lectus.<br><br>Fusce varius, est ut cursus auctor, dolor erat euismod turpis, at dapibus dolor purus eget nunc. Donec id euismod nulla. Aliquam sed eros ut enim malesuada dignissim. Fusce ultrices nibh non malesuada euismod. Suspendisse vitae lectus posuere, vehicula nulla quis, varius odio. Suspendisse elementum imperdiet tincidunt. Mauris tempor metus bibendum turpis porta bibendum. Morbi vitae sodales velit. Mauris vitae metus mi.<br><br>Vivamus scelerisque lacus sem, ac porttitor tellus tempus sit amet. Aliquam erat volutpat. Fusce ex lectus, condimentum vel orci in, venenatis eleifend sapien. Fusce tincidunt sit amet augue vitae dignissim. Nullam molestie consequat est ac suscipit. Curabitur tincidunt lacus varius sem vestibulum, non vestibulum turpis vulputate. Donec viverra nulla vitae orci ultrices, eu lobortis lorem euismod. Etiam ut aliquam ex, eu ultricies arcu. Vivamus a velit gravida, egestas erat fringilla, tempus quam. Mauris sit amet dictum diam. Aenean accumsan ac ante a finibus.<br><br>Sed sit amet sollicitudin lacus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris auctor felis eget sapien interdum, dapibus aliquam dolor mollis. Duis ut ex id lorem luctus pretium eget eget neque. Aliquam tincidunt leo nec quam consectetur, at condimentum sem condimentum. Pellentesque non nisi condimentum, scelerisque ligula vel, euismod justo. Vivamus ut purus dolor. Phasellus quis vulputate arcu. Proin nec condimentum erat. Nam justo eros, iaculis in ipsum et, suscipit aliquam velit. Fusce sem massa, gravida eget finibus vitae, accumsan vitae nibh. Praesent semper odio eget lobortis mattis. Mauris at vestibulum odio, vitae sodales neque.<br><br>Phasellus nec mi interdum erat blandit sagittis varius volutpat mi. Ut ornare velit lacus, a dapibus tortor blandit id. Etiam vehicula commodo mollis. Mauris quis diam eget erat mattis eleifend. Phasellus scelerisque arcu ut varius ornare. Quisque volutpat elit purus, sit amet gravida sem hendrerit eu. Quisque tincidunt facilisis orci quis viverra. Praesent ut magna in odio dignissim tempor et eu mauris. Curabitur tristique leo ac lobortis cursus.<br><br>Aenean aliquam augue rutrum turpis mollis, at egestas elit cursus. Nam id leo id arcu rutrum faucibus ut quis dolor. Pellentesque a facilisis est. Donec sed finibus purus. Integer sit amet maximus dui. Maecenas aliquet, massa at iaculis finibus, turpis arcu tempor sapien, ut molestie sem felis tempus leo. Curabitur mollis dolor quis justo egestas, vitae faucibus tellus convallis.<br><br>Aliquam auctor imperdiet ligula. Nam ullamcorper malesuada orci sit amet dignissim. Curabitur aliquet velit eu sem venenatis, in cursus tortor eleifend. Morbi consectetur est a odio maximus mollis. Duis eu interdum turpis. Integer id nisi placerat, luctus magna quis, convallis massa. Nulla interdum in turpis at dignissim. Morbi in blandit mauris. Nunc porttitor ac justo non placerat. Suspendisse consectetur aliquam arcu nec egestas. Fusce quis molestie. <br></p>', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vulputate mauris pellentesque mi convall', NULL, NULL, '2016-02-17 23:26:41', 2),
(4, 'Ut vitae commodo ante, et tempus m', '<p></p><p>\r\nNam ut libero pulvinar, dapibus augue in, interdum leo. Pellentesque \r\nhabitant morbi tristique senectus et netus et malesuada fames ac turpis \r\negestas. Cras eu fringilla nulla. Integer volutpat convallis volutpat. \r\nNam eget felis molestie, posuere enim quis, efficitur nibh. Quisque \r\ninterdum nisl non lobortis mattis. Aliquam consectetur gravida \r\nvestibulum. Sed ligula enim, laoreet vel urna in, iaculis molestie odio.\r\n Nullam at fermentum nisi. Sed eget tincidunt dui. Suspendisse vehicula,\r\n purus bibendum tincidunt facilisis, libero lectus dapibus mauris, ac \r\npretium augue erat sed lectus. Etiam ultricies, justo et tincidunt \r\nauctor, mi ante egestas nibh, vel mollis velit arcu nec purus.\r\n</p>\r\n<p>\r\nUt vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae \r\ngravida enim mattis at. Cras augue magna, gravida tincidunt nunc eget, \r\nmattis tempus neque. Ut efficitur turpis felis, eu tincidunt ex \r\nhendrerit eu. Nam sagittis sollicitudin velit, quis semper massa laoreet\r\n non. Cras mollis aliquam pellentesque. In elementum turpis eu velit \r\neuismod suscipit. Etiam ut tellus dui.\r\n</p>\r\n<p>\r\nSuspendisse tincidunt a eros a fermentum. Vivamus molestie lorem mauris,\r\n a blandit purus bibendum vel. Mauris mollis dui vitae dui consectetur, \r\neu consequat quam pharetra. Nullam molestie tortor eget justo vulputate,\r\n et congue orci molestie. Donec vel ipsum nec neque semper malesuada id \r\nid lorem. Fusce mauris est, semper eu neque ac, gravida lobortis sem. \r\nAliquam erat volutpat. Integer pulvinar, leo sit amet varius porta, \r\nfelis mauris convallis orci, id imperdiet enim eros et orci. In pulvinar\r\n dictum nibh quis venenatis. Suspendisse et eleifend sapien, sit amet \r\ntincidunt nunc. Pellentesque eget ornare urna.\r\n</p>\r\n<p>\r\nMorbi bibendum at eros sed accumsan. Nullam auctor eget lorem vitae \r\naliquet. In non posuere quam. Nam gravida tristique nunc, ut molestie \r\nnibh lacinia nec. Integer et risus ligula. Aliquam vitae lectus \r\nimperdiet, pulvinar purus ac, vehicula mauris. Phasellus tempus laoreet \r\nneque. Nullam sed purus non magna fringilla iaculis volutpat eget leo. \r\nPraesent faucibus purus ut elit auctor fermentum. Vivamus ligula sem, \r\naccumsan dapibus pharetra vel, bibendum sed diam. Phasellus quis magna \r\nac metus condimentum posuere. Donec non aliquam tellus, eget mollis \r\neros. Quisque magna felis, molestie in finibus quis, auctor et risus.\r\n</p><br><p></p>', 'Ut vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae gravida enim mattis at. Cras ', NULL, NULL, '2016-02-17 22:04:03', 1),
(5, 'Ut vitae commodo ante, et tempus m', '<p></p><p>\r\nNam ut libero pulvinar, dapibus augue in, interdum leo. Pellentesque \r\nhabitant morbi tristique senectus et netus et malesuada fames ac turpis \r\negestas. Cras eu fringilla nulla. Integer volutpat convallis volutpat. \r\nNam eget felis molestie, posuere enim quis, efficitur nibh. Quisque \r\ninterdum nisl non lobortis mattis. Aliquam consectetur gravida \r\nvestibulum. Sed ligula enim, laoreet vel urna in, iaculis molestie odio.\r\n Nullam at fermentum nisi. Sed eget tincidunt dui. Suspendisse vehicula,\r\n purus bibendum tincidunt facilisis, libero lectus dapibus mauris, ac \r\npretium augue erat sed lectus. Etiam ultricies, justo et tincidunt \r\nauctor, mi ante egestas nibh, vel mollis velit arcu nec purus.\r\n</p>\r\n<p>\r\nUt vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae \r\ngravida enim mattis at. Cras augue magna, gravida tincidunt nunc eget, \r\nmattis tempus neque. Ut efficitur turpis felis, eu tincidunt ex \r\nhendrerit eu. Nam sagittis sollicitudin velit, quis semper massa laoreet\r\n non. Cras mollis aliquam pellentesque. In elementum turpis eu velit \r\neuismod suscipit. Etiam ut tellus dui.\r\n</p>\r\n<p>\r\nSuspendisse tincidunt a eros a fermentum. Vivamus molestie lorem mauris,\r\n a blandit purus bibendum vel. Mauris mollis dui vitae dui consectetur, \r\neu consequat quam pharetra. Nullam molestie tortor eget justo vulputate,\r\n et congue orci molestie. Donec vel ipsum nec neque semper malesuada id \r\nid lorem. Fusce mauris est, semper eu neque ac, gravida lobortis sem. \r\nAliquam erat volutpat. Integer pulvinar, leo sit amet varius porta, \r\nfelis mauris convallis orci, id imperdiet enim eros et orci. In pulvinar\r\n dictum nibh quis venenatis. Suspendisse et eleifend sapien, sit amet \r\ntincidunt nunc. Pellentesque eget ornare urna.\r\n</p>\r\n<p>\r\nMorbi bibendum at eros sed accumsan. Nullam auctor eget lorem vitae \r\naliquet. In non posuere quam. Nam gravida tristique nunc, ut molestie \r\nnibh lacinia nec. Integer et risus ligula. Aliquam vitae lectus \r\nimperdiet, pulvinar purus ac, vehicula mauris. Phasellus tempus laoreet \r\nneque. Nullam sed purus non magna fringilla iaculis volutpat eget leo. \r\nPraesent faucibus purus ut elit auctor fermentum. Vivamus ligula sem, \r\naccumsan dapibus pharetra vel, bibendum sed diam. Phasellus quis magna \r\nac metus condimentum posuere. Donec non aliquam tellus, eget mollis \r\neros. Quisque magna felis, molestie in finibus quis, auctor et risus.\r\n</p><br><p></p>', 'Ut vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae gravida enim mattis at. Cras ', NULL, NULL, '2016-02-17 22:04:08', 1),
(6, 'Ut vitae commodo ante, et tempus m', '<p></p><p>\r\nNam ut libero pulvinar, dapibus augue in, interdum leo. Pellentesque \r\nhabitant morbi tristique senectus et netus et malesuada fames ac turpis \r\negestas. Cras eu fringilla nulla. Integer volutpat convallis volutpat. \r\nNam eget felis molestie, posuere enim quis, efficitur nibh. Quisque \r\ninterdum nisl non lobortis mattis. Aliquam consectetur gravida \r\nvestibulum. Sed ligula enim, laoreet vel urna in, iaculis molestie odio.\r\n Nullam at fermentum nisi. Sed eget tincidunt dui. Suspendisse vehicula,\r\n purus bibendum tincidunt facilisis, libero lectus dapibus mauris, ac \r\npretium augue erat sed lectus. Etiam ultricies, justo et tincidunt \r\nauctor, mi ante egestas nibh, vel mollis velit arcu nec purus.\r\n</p>\r\n<p>\r\nUt vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae \r\ngravida enim mattis at. Cras augue magna, gravida tincidunt nunc eget, \r\nmattis tempus neque. Ut efficitur turpis felis, eu tincidunt ex \r\nhendrerit eu. Nam sagittis sollicitudin velit, quis semper massa laoreet\r\n non. Cras mollis aliquam pellentesque. In elementum turpis eu velit \r\neuismod suscipit. Etiam ut tellus dui.\r\n</p>\r\n<p>\r\nSuspendisse tincidunt a eros a fermentum. Vivamus molestie lorem mauris,\r\n a blandit purus bibendum vel. Mauris mollis dui vitae dui consectetur, \r\neu consequat quam pharetra. Nullam molestie tortor eget justo vulputate,\r\n et congue orci molestie. Donec vel ipsum nec neque semper malesuada id \r\nid lorem. Fusce mauris est, semper eu neque ac, gravida lobortis sem. \r\nAliquam erat volutpat. Integer pulvinar, leo sit amet varius porta, \r\nfelis mauris convallis orci, id imperdiet enim eros et orci. In pulvinar\r\n dictum nibh quis venenatis. Suspendisse et eleifend sapien, sit amet \r\ntincidunt nunc. Pellentesque eget ornare urna.\r\n</p>\r\n<p>\r\nMorbi bibendum at eros sed accumsan. Nullam auctor eget lorem vitae \r\naliquet. In non posuere quam. Nam gravida tristique nunc, ut molestie \r\nnibh lacinia nec. Integer et risus ligula. Aliquam vitae lectus \r\nimperdiet, pulvinar purus ac, vehicula mauris. Phasellus tempus laoreet \r\nneque. Nullam sed purus non magna fringilla iaculis volutpat eget leo. \r\nPraesent faucibus purus ut elit auctor fermentum. Vivamus ligula sem, \r\naccumsan dapibus pharetra vel, bibendum sed diam. Phasellus quis magna \r\nac metus condimentum posuere. Donec non aliquam tellus, eget mollis \r\neros. Quisque magna felis, molestie in finibus quis, auctor et risus.\r\n</p><br><p></p>', 'Ut vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae gravida enim mattis at. Cras ', NULL, NULL, '2016-02-17 22:04:15', 1),
(7, 'Ut vitae commodo ante, et tempus m', '<p></p><p>\r\n</p>\r\n<p>\r\nUt vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae \r\ngravida enim mattis at. Cras augue magna, gravida tincidunt nunc eget, \r\nmattis tempus neque. Ut efficitur turpis felis, eu tincidunt ex \r\nhendrerit eu. Nam sagittis sollicitudin velit, quis semper massa laoreet\r\n non. Cras mollis aliquam pellentesque. In elementum turpis eu velit \r\neuismod suscipit. Etiam ut tellus dui.\r\n</p>\r\n<p>\r\nSuspendisse tincidunt a eros a fermentum. Vivamus molestie lorem mauris,\r\n a blandit purus bibendum vel. Mauris mollis dui vitae dui consectetur, \r\neu consequat quam pharetra. Nullam molestie tortor eget justo vulputate,\r\n et congue orci molestie. Donec vel ipsum nec neque semper malesuada id \r\nid lorem. Fusce mauris est, semper eu neque ac, gravida lobortis sem. \r\nAliquam erat volutpat. Integer pulvinar, leo sit amet varius porta, \r\nfelis mauris convallis orci, id imperdiet enim eros et orci. In pulvinar\r\n dictum nibh quis venenatis. Suspendisse et eleifend sapien, sit amet \r\ntincidunt nunc. Pellentesque eget ornare urna.\r\n</p>\r\n<p>\r\nMorbi bibendum at eros sed accumsan. Nullam auctor eget lorem vitae \r\naliquet. In non posuere quam. Nam gravida tristique nunc, ut molestie \r\nnibh lacinia nec. Integer et risus ligula. Aliquam vitae lectus \r\nimperdiet, pulvinar purus ac, vehicula mauris. Phasellus tempus laoreet \r\nneque. Nullam sed purus non magna fringilla iaculis volutpat eget leo. \r\nPraesent faucibus purus ut elit auctor fermentum. Vivamus ligula sem, \r\naccumsan dapibus pharetra vel, bibendum sed diam. Phasellus quis magna \r\nac metus condimentum posuere. Donec non aliquam tellus, eget mollis \r\neros. Quisque magna felis, molestie in finibus quis, auctor et risus.\r\n</p><br><p></p>', 'TESTENam ut libero pulvinar, dapibus augue in, interdum leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras eu fringilla nulla. Integer volutpat convallis volutpat. Nam eget felis molestie, posuere enim quis, efficitur nibh. Quisque interdum nisl non lobortis mattis. Aliquam consectetur gravida vestibulum. Sed ligula enim, laoreet vel urna in, iaculis molestie odio. Nullam at fermentum nisi. Sed eget tincidunt dui. Suspendisse vehicula, purus bibendum tincidunt facilisis, libero lectus dapibus mauris, ac pretium augue erat sed lectus. Etiam ultricies, justo et tincidunt auctor, mi ante egestas nibh, vel mollis velit arcu nec purus. ', NULL, NULL, '2016-02-17 23:59:21', 1),
(8, 'tITULO NOTÃCIA', '<p></p><div>\r\n<p>\r\nPellentesque ut hendrerit dolor. Nullam felis arcu, viverra quis \r\nsagittis pulvinar, aliquet sit amet leo. In dapibus leo ac est posuere, \r\nid pellentesque diam rhoncus. Maecenas id elit vel erat interdum porta. \r\nProin vulputate arcu ornare enim lacinia rutrum. Nam rhoncus risus et \r\nmetus volutpat, nec ornare arcu malesuada. Sed sit amet aliquam mauris. \r\nDonec rhoncus id ligula eu tempor. Ut consequat blandit ex, sit amet \r\nlaoreet tortor interdum eu.\r\n</p>\r\n<p>\r\nDonec imperdiet metus sed augue faucibus lobortis. In hac habitasse \r\nplatea dictumst. Phasellus convallis elementum tellus at luctus. Cras ut\r\n tincidunt lacus. Nulla in tempus arcu. Phasellus tellus ex, malesuada a\r\n neque sed, sagittis elementum ligula. Proin ultrices, sem et \r\nconsectetur gravida, eros felis semper nibh, quis placerat tortor nisl \r\nrutrum est. Fusce imperdiet risus ac diam imperdiet, nec bibendum lorem \r\naliquet. In sed porttitor tellus.\r\n</p>\r\n<p>\r\nPraesent interdum purus non nunc eleifend cursus. Pellentesque \r\ncondimentum, leo a tincidunt fringilla, lacus dolor imperdiet dolor, \r\nvitae hendrerit magna velit imperdiet metus. Integer sed scelerisque \r\nrisus. Nunc luctus erat ac nibh tempus, eu laoreet turpis facilisis. \r\nMauris venenatis sed nunc at convallis. Praesent tempus volutpat \r\nultrices. Quisque felis turpis, sagittis non tincidunt eu, ullamcorper \r\nac felis. Vestibulum at erat sit amet sapien semper pretium vitae vel \r\nurna. Phasellus semper cursus nisi nec aliquam. Ut id congue mauris. \r\nMaecenas sollicitudin, turpis vel tristique viverra, diam risus \r\nfacilisis dui, ac tempor odio diam eget risus. Phasellus lacinia ex \r\njusto, sit amet condimentum libero dapibus tincidunt. Phasellus \r\nullamcorper fermentum neque nec tempus. Vivamus imperdiet ultricies \r\nlibero id dictum. Ut quis vestibulum nisi.\r\n</p>\r\n<p>\r\nNam ut libero pulvinar, dapibus augue in, interdum leo. Pellentesque \r\nhabitant morbi tristique senectus et netus et malesuada fames ac turpis \r\negestas. Cras eu fringilla nulla. Integer volutpat convallis volutpat. \r\nNam eget felis molestie, posuere enim quis, efficitur nibh. Quisque \r\ninterdum nisl non lobortis mattis. Aliquam consectetur gravida \r\nvestibulum. Sed ligula enim, laoreet vel urna in, iaculis molestie odio.\r\n Nullam at fermentum nisi. Sed eget tincidunt dui. Suspendisse vehicula,\r\n purus bibendum tincidunt facilisis, libero lectus dapibus mauris, ac \r\npretium augue erat sed lectus. Etiam ultricies, justo et tincidunt \r\nauctor, mi ante egestas nibh, vel mollis velit arcu nec purus.\r\n</p>\r\n<p>\r\nUt vitae commodo ante, et tempus massa. Aenean mattis odio enim, vitae \r\ngravida enim mattis at. Cras augue magna, gravida tincidunt nunc eget, \r\nmattis tempus neque. Ut efficitur turpis felis, eu tincidunt ex \r\nhendrerit eu. Nam sagittis sollicitudin velit, quis semper massa laoreet\r\n non. Cras mollis aliquam pellentesque. In elementum turpis eu velit \r\neuismod suscipit. Etiam ut tellus dui.\r\n</p>\r\n<p>\r\nSuspendisse tincidunt a eros a fermentum. Vivamus molestie lorem mauris,\r\n a blandit purus bibendum vel. Mauris mollis dui vitae dui consectetur, \r\neu consequat quam pharetra. Nullam molestie tortor eget justo vulputate,\r\n et congue orci molestie. Donec vel ipsum nec neque semper malesuada id \r\nid lorem. Fusce mauris est, semper eu neque ac, gravida lobortis sem. \r\nAliquam erat volutpat. Integer pulvinar, leo sit amet varius porta, \r\nfelis mauris convallis orci, id imperdiet enim eros et orci. In pulvinar\r\n dictum nibh quis venenatis. Suspendisse et eleifend sapien, sit amet \r\ntincidunt nunc. Pellentesque eget ornare urna.\r\n</p>\r\n<p>\r\nMorbi bibendum at eros sed accumsan. Nullam auctor eget lorem vitae \r\naliquet. In non posuere quam. Nam gravida tristique nunc, ut molestie \r\nnibh lacinia nec. Integer et risus ligula. Aliquam vitae lectus \r\nimperdiet, pulvinar purus ac, vehicula mauris. Phasellus tempus laoreet \r\nneque. Nullam sed purus non magna fringilla iaculis volutpat eget leo. \r\nPraesent faucibus purus ut elit auctor fermentum. Vivamus ligula sem, \r\naccumsan dapibus pharetra vel, bibendum sed diam. Phasellus quis magna \r\nac metus condimentum posuere. Donec non aliquam tellus, eget mollis \r\neros. Quisque magna felis, molestie in finibus quis, auctor et risus.\r\n</p></div><br><p></p>', 'Nam ut libero pulvinar, dapibus augue in, interdum leo. Pellentesque habitant morbi tristique senect', NULL, NULL, '2016-02-17 23:05:46', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_OPERADOR`
--

CREATE TABLE IF NOT EXISTS `TB_OPERADOR` (
  `ID_OPERADOR` int(11) NOT NULL AUTO_INCREMENT,
  `NM_OPERADOR` varchar(45) DEFAULT NULL,
  `F_dddC` varchar(2) DEFAULT NULL,
  `DS_TELEFONE_PESSOAL` varchar(45) DEFAULT NULL,
  `F_dddB` varchar(2) DEFAULT NULL,
  `DS_TELEFONE_BIOS` varchar(45) DEFAULT NULL,
  `DS_EMAIL_PESSOAL` varchar(45) DEFAULT NULL,
  `DS_EMAIL_BIOS` varchar(45) DEFAULT NULL,
  `DS_ENDERECO` varchar(100) DEFAULT NULL,
  `DS_BAIRRO` varchar(45) DEFAULT NULL,
  `NR_CEP` varchar(45) DEFAULT NULL,
  `NR_CPF` varchar(45) DEFAULT NULL,
  `NR_IDENTIDADE` varchar(45) DEFAULT NULL,
  `DT_NASCIMENTO` date DEFAULT NULL,
  `DS_REGISTRO_PROFISSIONAL` varchar(100) DEFAULT NULL,
  `DS_CTF_IBAM` varchar(100) DEFAULT NULL,
  `DS_SKYPE` varchar(45) DEFAULT NULL,
  `DS_LOGIN` varchar(45) DEFAULT NULL,
  `DS_SENHA` varchar(300) DEFAULT NULL,
  `NM_CONTATO_FAMILIAR` varchar(100) DEFAULT NULL,
  `F_dddF` varchar(2) DEFAULT NULL,
  `NR_TELEFONE_CONTATO_FAMILIAR` varchar(45) DEFAULT NULL,
  `FK_PERFIL` int(11) NOT NULL,
  `FK_ARQUIVO` int(11) DEFAULT NULL,
  `FL_AUTOMATICO_PROJETO` int(11) NOT NULL DEFAULT '0' COMMENT 'Flag responsável em adicionar o usuário no projeto caso ele estiver habilitado com o valor 1-',
  PRIMARY KEY (`ID_OPERADOR`),
  UNIQUE KEY `DS_LOGIN_UNIQUE` (`DS_LOGIN`),
  KEY `fk_TB_OPERADOR_perfil1_idx` (`FK_PERFIL`),
  KEY `fk_TB_OPERADOR_arquivo1_idx` (`FK_ARQUIVO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_PLANO_ACAO`
--

CREATE TABLE IF NOT EXISTS `TB_PLANO_ACAO` (
  `ID_PLANO_ACAO` int(11) NOT NULL AUTO_INCREMENT,
  `DS_ASSUNTO` varchar(100) DEFAULT NULL,
  `TX_PLANO_ACAO` text,
  `FK_PROJETO` int(11) DEFAULT NULL,
  `DT_ATUALIZACAO` datetime DEFAULT NULL,
  `FK_STATUS` int(11) DEFAULT NULL,
  `FK_OPERADOR` int(11) DEFAULT NULL,
  `DT_PREVISAO` datetime DEFAULT NULL,
  `DT_CONCLUSAO` datetime DEFAULT NULL,
  `DT_CONTROLE` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_PLANO_ACAO`),
  KEY `fk_TB_PLANO_ACAO_TB_PROJETO1_idx` (`FK_PROJETO`),
  KEY `fk_TB_PLANO_ACAO_TB_STATUS1_idx` (`FK_STATUS`),
  KEY `fk_TB_PLANO_ACAO_TB_OPERADOR1_idx` (`FK_OPERADOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_PROJETO`
--

CREATE TABLE IF NOT EXISTS `TB_PROJETO` (
  `ID_PROJETO` int(11) NOT NULL AUTO_INCREMENT,
  `NM_PROJETO` varchar(300) DEFAULT NULL,
  `DT_CADASTRO` varchar(45) DEFAULT NULL,
  `FK_AGENCIA_AMBIENTAL` int(11) DEFAULT NULL,
  `NR_CONTRATO` varchar(45) DEFAULT NULL,
  `TX_OBSERVACAO` longtext,
  `FK_CLIENTE` int(11) NOT NULL,
  `FK_STATUS_PROJETO` int(11) NOT NULL,
  `FL_ATIVO` int(11) DEFAULT NULL,
  `FK_INDICACAO` int(11) DEFAULT NULL,
  `Fk_GESTOR` int(11) NOT NULL,
  `FK_TIPO_PROJETO` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PROJETO`),
  KEY `fk_TB_PROJETO_TB_CLIENTE1_idx` (`FK_CLIENTE`),
  KEY `fk_TB_PROJETO_TB_STATUS1_idx` (`FK_STATUS_PROJETO`),
  KEY `fk_TB_PROJETO_TB_OPERADOR1_idx` (`Fk_GESTOR`),
  KEY `fk_TB_PROJETO_TB_TIPO_PROJETO1_idx` (`FK_TIPO_PROJETO`),
  KEY `fk_TB_PROJETO_TB_AGENCIA_AMBIENTAL_idx` (`FK_AGENCIA_AMBIENTAL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_PROJETO_OPERADOR`
--

CREATE TABLE IF NOT EXISTS `TB_PROJETO_OPERADOR` (
  `FK_OPERADOR` int(11) NOT NULL,
  `FK_PROJETO` int(11) NOT NULL,
  PRIMARY KEY (`FK_OPERADOR`,`FK_PROJETO`),
  KEY `fk_TB_OPERADOR_has_TB_PROJETO_TB_PROJETO1_idx` (`FK_PROJETO`),
  KEY `fk_TB_OPERADOR_has_TB_PROJETO_TB_OPERADOR1_idx` (`FK_OPERADOR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_RAMO_ATIVIDADE`
--

CREATE TABLE IF NOT EXISTS `TB_RAMO_ATIVIDADE` (
  `ID_RAMO_ATIVIDADE` int(11) NOT NULL AUTO_INCREMENT,
  `DS_RAMO_ATIVIDADE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_RAMO_ATIVIDADE`),
  UNIQUE KEY `DS_RAMO_ATIVIDADE_UNIQUE` (`DS_RAMO_ATIVIDADE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Extraindo dados da tabela `TB_RAMO_ATIVIDADE`
--

INSERT INTO `TB_RAMO_ATIVIDADE` (`ID_RAMO_ATIVIDADE`, `DS_RAMO_ATIVIDADE`) VALUES
(7, 'Atividades Agrossilvipastoris'),
(5, 'Atividades de Infra-Estrutura'),
(48, 'Atividades Imobiliarias'),
(1, 'Atividades Minerárias'),
(35, 'Cemitério'),
(9, 'Empresas de Consultoria'),
(10, 'Empresas públicas e Prefeituras'),
(8, 'Geral'),
(3, 'Indústira Química'),
(4, 'Indústria Alimentícia e Bebidas'),
(36, 'Indústria Autopeças'),
(49, 'Indústria Eletro Eletronica'),
(11, 'Industria Gráfica'),
(2, 'Indústria Metalúrgica'),
(50, 'Lavanderia Industrial'),
(51, 'PEQUI AMBIENTAL'),
(29, 'Posto de Gasolina'),
(31, 'Serviços de Saude'),
(6, 'Serviços e Comércio Atacadista'),
(32, 'Serviços Educacionais'),
(30, 'Transportes e Logistica'),
(40, 'Usina Hidreletrica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_SERVICO`
--

CREATE TABLE IF NOT EXISTS `TB_SERVICO` (
  `ID_SERVICO` int(11) NOT NULL,
  `DS_SERVICO` tinytext,
  `FK_OPERADOR` int(11) DEFAULT NULL,
  `NR_CARGA_HORARIA` varchar(45) DEFAULT NULL,
  `FK_TIPO_SERVICO` int(11) DEFAULT NULL,
  `DT_SERVICO` date DEFAULT NULL,
  `FK_PROJETO` int(11) DEFAULT NULL,
  `FL_PCP` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_SERVICO`),
  KEY `fk_TB_SERVICO_TB_OPERADOR_idx` (`FK_OPERADOR`),
  KEY `fk_TB_SERVICO_TB_TIPO_SERVICO1_idx` (`FK_TIPO_SERVICO`),
  KEY `fk_TB_SERVICO_TB_PROJETO1_idx` (`FK_PROJETO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_STATUS_PROJETO`
--

CREATE TABLE IF NOT EXISTS `TB_STATUS_PROJETO` (
  `ID_STATUS_PROJETO` int(11) NOT NULL,
  `NM_STATUS_PROJETO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_STATUS_PROJETO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `TB_STATUS_PROJETO`
--

INSERT INTO `TB_STATUS_PROJETO` (`ID_STATUS_PROJETO`, `NM_STATUS_PROJETO`) VALUES
(1, 'DEMANDA CADASTRADA'),
(2, 'ANÁLISE DE VIABILIDADE TÉCNICA'),
(3, '* PERMANENTE'),
(4, '* CONCLUÍDO COM SUCESSO'),
(5, '* ARQUIVADO'),
(6, 'EM ANÁLISE AGÊNCIA AMBIENTAL'),
(7, '* SUSPENSO TEMPORARIAMENTE'),
(8, 'EM ANDAMENTO BIOS'),
(9, 'AGUARDA RESPOSTA DO CLIENTE'),
(10, '* CANCELADO - NÃO APROVADO'),
(11, 'AGUARDANDO APROV. DA DIRETORIA'),
(12, 'PRIORITÁRIO'),
(13, 'ACOMPANHAMENTO FINANCEIRO'),
(14, 'CONTRATATAÇÃO'),
(15, 'enviado para aprovação cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_TIPO_NOTICIA`
--

CREATE TABLE IF NOT EXISTS `TB_TIPO_NOTICIA` (
  `ID_TIPO_NOTICIA` int(11) NOT NULL AUTO_INCREMENT,
  `NM_TIPO_NOTICIA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_NOTICIA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `TB_TIPO_NOTICIA`
--

INSERT INTO `TB_TIPO_NOTICIA` (`ID_TIPO_NOTICIA`, `NM_TIPO_NOTICIA`) VALUES
(1, 'NOTÃCIA'),
(2, 'NOVIDADES'),
(3, 'RECADOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_TIPO_PROJETO`
--

CREATE TABLE IF NOT EXISTS `TB_TIPO_PROJETO` (
  `ID_TIPO_PROJETO` int(11) NOT NULL AUTO_INCREMENT,
  `NM_TIPO_PROJETO` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_TIPO_PROJETO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Extraindo dados da tabela `TB_TIPO_PROJETO`
--

INSERT INTO `TB_TIPO_PROJETO` (`ID_TIPO_PROJETO`, `NM_TIPO_PROJETO`) VALUES
(1, 'LO - Licença de operação'),
(2, 'LOC - Lic Operac.Corretiva'),
(3, 'Gestão de Informação'),
(4, 'AAF AUTORIZ AMBIENTAL FUNCIONA'),
(5, 'PTRF Projeto Tec Rec da Flora'),
(6, 'APEF -Autorizacao Expl. Flores'),
(7, 'Educação Ambiental'),
(9, 'Licença de Adequação - PBH'),
(10, 'Outorga Uso Recursos Hidricos'),
(11, 'PROPOSTA COMERCIAL'),
(12, 'Plano Diretor Participativo'),
(14, 'Implantaçao DocManager'),
(15, 'Outorga - água subterrânea'),
(16, 'Outorga - água superficial'),
(17, 'LP - Licença Prévia '),
(18, 'Licitação'),
(19, 'Legislação Ambiental'),
(20, 'Renovação de Licença Ambiental'),
(21, 'Consultoria SGA'),
(22, 'CTF Cadastro Técnico Federal'),
(23, 'LI - Licença de Instalação'),
(24, 'Informações Técnicas'),
(25, 'Pautas COPAM'),
(26, 'ProjetoTécnico'),
(27, 'Auditoria SGA / SGI'),
(28, 'Monitoramento Ambiental'),
(29, 'Defesa Auto de Infração'),
(30, 'T 187 Copasa'),
(31, 'GERAL '),
(32, 'Controle de Contratos'),
(33, 'Pautas COPAM'),
(34, 'RNC Registro Nao Conformidade'),
(35, 'Averbação Reserva Legal'),
(36, 'Treinamento'),
(37, 'Plano de Fechamento'),
(38, 'RIC  Relat Impacto Viário'),
(45, 'PGRSS - Prog Gest Res Saúde'),
(46, 'Averbação Reserva Legal'),
(47, 'EIA - RIMA'),
(48, 'Regularizaçao SEDRU'),
(49, 'PROPOSTA COMERCIAL BIOSLAB'),
(50, 'Medição Ruído BiosLab'),
(51, 'Certificação ISO 17.025'),
(52, 'Estudo Arqueologico'),
(53, 'EIV Estudo de Impacto Vizinhan'),
(54, 'Inventario Flora/Fauna'),
(55, 'PRAD - Plano de Recuperacao '),
(56, 'Assessoria Ambiental'),
(57, 'Projeto Silviculturais'),
(58, 'LP + LI'),
(59, 'PEQUI'),
(60, 'gestão bios'),
(61, 'ADMINISTRATIVO'),
(62, 'regularização ambiental'),
(63, 'Administrativo'),
(64, 'RIU RELAT IMPACTO VIZINHANÇA'),
(65, 'SISCAR/CAR'),
(66, 'cadastro car/sicar'),
(67, 'PLANTIO FLORESTAL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TB_TIPO_SERVICO`
--

CREATE TABLE IF NOT EXISTS `TB_TIPO_SERVICO` (
  `ID_TIPO_SERVICO` int(11) NOT NULL AUTO_INCREMENT,
  `NM_TIPO_SERVICO` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_SERVICO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `login` varchar(45) NOT NULL,
  `fk_arquivo` int(11) DEFAULT NULL,
  `fk_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `fk_usuario_arquivo1_idx` (`fk_arquivo`),
  KEY `fk_usuario_perfil1_idx` (`fk_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `TB_CLIENTE`
--
ALTER TABLE `TB_CLIENTE`
  ADD CONSTRAINT `fk_TB_CLIENTE_TB_RAMO_ATIVIDADE1` FOREIGN KEY (`FK_RAMO_ATIVIDADE`) REFERENCES `tb_ramo_atividade` (`ID_RAMO_ATIVIDADE`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_CONTATO`
--
ALTER TABLE `TB_CONTATO`
  ADD CONSTRAINT `fk_TB_CONTATO_TB_CLIENTE1` FOREIGN KEY (`FK_CLIENTE`) REFERENCES `tb_cliente` (`ID_CLIENTE`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_DOCUMENTOS`
--
ALTER TABLE `TB_DOCUMENTOS`
  ADD CONSTRAINT `fk_TB_DOCUMENTOS_TB_PROJETO1` FOREIGN KEY (`FK_PROJETO`) REFERENCES `tb_projeto` (`ID_PROJETO`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_NOTICIA`
--
ALTER TABLE `TB_NOTICIA`
  ADD CONSTRAINT `fk_TB_NOTICIA_TB_OPERADOR1` FOREIGN KEY (`FK_OPERADOR`) REFERENCES `tb_operador` (`ID_OPERADOR`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_NOTICIA_TB_TIPO_NOTICIA1` FOREIGN KEY (`FK_TIPO_NOTICIA`) REFERENCES `tb_tipo_noticia` (`ID_TIPO_NOTICIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_NOTICIA_arquivo1` FOREIGN KEY (`FK_ARQUIVO`) REFERENCES `arquivo` (`id_arquivo`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_OPERADOR`
--
ALTER TABLE `TB_OPERADOR`
  ADD CONSTRAINT `fk_TB_OPERADOR_arquivo1` FOREIGN KEY (`FK_ARQUIVO`) REFERENCES `arquivo` (`id_arquivo`) ON DELETE NO ACTION ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_TB_OPERADOR_perfil1` FOREIGN KEY (`FK_PERFIL`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_PLANO_ACAO`
--
ALTER TABLE `TB_PLANO_ACAO`
  ADD CONSTRAINT `fk_TB_PLANO_ACAO_TB_PROJETO1` FOREIGN KEY (`FK_PROJETO`) REFERENCES `tb_projeto` (`ID_PROJETO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_PLANO_ACAO_TB_STATUS1` FOREIGN KEY (`FK_STATUS`) REFERENCES `tb_status_projeto` (`ID_STATUS_PROJETO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_PLANO_ACAO_TB_OPERADOR1` FOREIGN KEY (`FK_OPERADOR`) REFERENCES `tb_operador` (`ID_OPERADOR`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_PROJETO`
--
ALTER TABLE `TB_PROJETO`
  ADD CONSTRAINT `fk_TB_PROJETO_TB_CLIENTE1` FOREIGN KEY (`FK_CLIENTE`) REFERENCES `tb_cliente` (`ID_CLIENTE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_PROJETO_TB_STATUS_PROJETO1` FOREIGN KEY (`FK_STATUS_PROJETO`) REFERENCES `tb_status_projeto` (`ID_STATUS_PROJETO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_PROJETO_TB_OPERADOR1` FOREIGN KEY (`Fk_GESTOR`) REFERENCES `tb_operador` (`ID_OPERADOR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_PROJETO_TB_TIPO_PROJETO1` FOREIGN KEY (`FK_TIPO_PROJETO`) REFERENCES `tb_tipo_projeto` (`ID_TIPO_PROJETO`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_PROJETO_TB_AGENCIA_AMBIENTAL` FOREIGN KEY (`FK_AGENCIA_AMBIENTAL`) REFERENCES `tb_agencia_ambiental` (`ID_AGENCIA_AMBIENTAL`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_PROJETO_OPERADOR`
--
ALTER TABLE `TB_PROJETO_OPERADOR`
  ADD CONSTRAINT `fk_TB_OPERADOR_has_TB_PROJETO_TB_OPERADOR1` FOREIGN KEY (`FK_OPERADOR`) REFERENCES `tb_operador` (`ID_OPERADOR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_OPERADOR_has_TB_PROJETO_TB_PROJETO1` FOREIGN KEY (`FK_PROJETO`) REFERENCES `tb_projeto` (`ID_PROJETO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `TB_SERVICO`
--
ALTER TABLE `TB_SERVICO`
  ADD CONSTRAINT `fk_TB_SERVICO_TB_OPERADOR` FOREIGN KEY (`FK_OPERADOR`) REFERENCES `tb_operador` (`ID_OPERADOR`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_SERVICO_TB_TIPO_SERVICO1` FOREIGN KEY (`FK_TIPO_SERVICO`) REFERENCES `tb_tipo_servico` (`ID_TIPO_SERVICO`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_SERVICO_TB_PROJETO1` FOREIGN KEY (`FK_PROJETO`) REFERENCES `tb_projeto` (`ID_PROJETO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_arquivo1` FOREIGN KEY (`fk_arquivo`) REFERENCES `arquivo` (`id_arquivo`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`fk_perfil`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
