-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 12, 2013 as 03:06 PM
-- Versão do Servidor: 5.5.25
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `brservec_siteteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cidade` int(11) NOT NULL DEFAULT '0',
  `nome` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `bairros`
--

INSERT INTO `bairros` (`id`, `id_cidade`, `nome`) VALUES
(1, 4, 'Itaim Paulista'),
(2, 4, 'SÃ£o Miguel Paulista'),
(3, 4, 'Ermelindo Matarazzo'),
(4, 4, 'Itaquera'),
(5, 2, 'LAGOA DA CONCEIÇÃO'),
(6, 3, 'LAGOA DA CONCEIÇÃO'),
(7, 3, 'JURERÊ INTERNACIONAL'),
(8, 3, 'CANASVEIRAS'),
(9, 3, 'CostÃ£o do Santinho'),
(10, 3, 'INGLESES'),
(11, 4, 'Avenida Paulista'),
(12, 5, 'Coral'),
(13, 5, 'Centro'),
(14, 5, 'SÃ£o CristovÃ£o'),
(15, 5, 'Caravagio'),
(16, 3, 'teste'),
(17, 4, 'teste3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `nome`, `imagem`, `url`) VALUES
(36, 'teste 1', '/capa/23091113167974881316797488banner01.jpg', '3'),
(35, 'teste4', '/capa/23091113167974441316797444banner03.jpg', '#');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `codigochat` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chat`
--

INSERT INTO `chat` (`codigochat`) VALUES
('<iframe src="http://settings.messenger.live.com/Conversation/IMMe.aspx?invitee=9af8e72db796c37f@apps.messenger.live.com&mkt=pt-BR&useTheme=true&themeName=gray&foreColor=676769&backColor=DBDBDB&linkColor=444444&borderColor=8D8D8D&buttonForeColor=99CC33&buttonBackColor=676769&buttonBorderColor=99CC33&buttonDisabledColor=F1F1F1&headerForeColor=729527&headerBackColor=B2B2B2&menuForeColor=676769&menuBackColor=BBBBBB&chatForeColor=99CC33&chatBackColor=EAEAEA&chatDisabledColor=B2B2B2&chatErrorColor=760502&chatLabelColor=6E6C6C" width="800" height="600" style="border: solid 1px black; width: 800px; height: 600px;" frameborder="0" scrolling="no"></iframe>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `nome` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `id_estado`, `nome`) VALUES
(3, 1, 'FlorianÃ³polis'),
(4, 2, 'SÃ£o Paulo'),
(5, 1, 'Lages');

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `tema` varchar(100) NOT NULL,
  `palavrachave` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`tema`, `palavrachave`) VALUES
('laranja', 'casas, flats, apartamentos, lofts, coberturas, duplex, condomÃ­nios, homedevice, webdevice, conjuntos comerciais, terrenos, ImÃ³veis, imoveis, imÃ³vel, imovel, imobiliÃ¡rias, imobiliarias, imobiliÃ¡ria , imobiliaria, lote, lotes, corretor de imÃ³veis, corretor de imoveis, corretor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_imobiliaria`
--

CREATE TABLE IF NOT EXISTS `dados_imobiliaria` (
  `nome` varchar(250) NOT NULL,
  `slogan` varchar(250) NOT NULL,
  `telefone1` varchar(50) NOT NULL,
  `telefone2` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `creci` varchar(10) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `logo_grande` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados_imobiliaria`
--

INSERT INTO `dados_imobiliaria` (`nome`, `slogan`, `telefone1`, `telefone2`, `email`, `creci`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `logo_grande`) VALUES
('HomeDevice', 'Sua imobiliÃ¡ria na internet', '(49)8801-2224', '4988012224', 'contato@homedevice.com.br', '00000', 'Av 1 de maio, 505', 'caravagio', 'Lages', 'Santa Catarina', '88509-510', '/capa/23091113167830111316783011logo.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`) VALUES
(1, 'Santa Catarina'),
(2, 'SÃ£o Paulo'),
(3, 'ParanÃ¡');

-- --------------------------------------------------------

--
-- Estrutura da tabela `google_analytics`
--

CREATE TABLE IF NOT EXISTS `google_analytics` (
  `codigoanalytics` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `google_analytics`
--

INSERT INTO `google_analytics` (`codigoanalytics`, `email`, `senha`) VALUES
('<script type="text/javascript">\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([''_setAccount'', ''UA-25976323-1'']);\r\n  _gaq.push([''_trackPageview'']);\r\n\r\n  (function() {\r\n    var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;\r\n    ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';\r\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n</script>', 'contato@brserve.com.br', '25sr4wejuywerw15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `google_maps`
--

CREATE TABLE IF NOT EXISTS `google_maps` (
  `codigomaps` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `google_maps`
--

INSERT INTO `google_maps` (`codigomaps`) VALUES
('erwert3r35987365dw');

-- --------------------------------------------------------

--
-- Estrutura da tabela `google_webmaster`
--

CREATE TABLE IF NOT EXISTS `google_webmaster` (
  `metatag` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `google_webmaster`
--

INSERT INTO `google_webmaster` (`metatag`) VALUES
('<meta name="google-site-verification" content="D5qzy-WkpmHRRcm_aRYNdbJ1nuTxXhY5GpWu8aJe3Og" />');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `acao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `id_usuario`, `data`, `acao`) VALUES
(31, 1, '2011-09-26 18:32:59', 'alterou na tabela imoveis'),
(32, 1, '2011-09-26 18:34:59', 'excluiu na tabela imovel_acompanhe_galeria'),
(33, 1, '2011-09-26 18:38:14', 'cadastrou na tabela imovel_galeria'),
(34, 0, '2011-09-26 18:39:08', 'cadastrou na tabela imovel_plantas'),
(35, 1, '2011-09-26 18:39:22', 'excluiu na tabela imovel_plantas'),
(36, 1, '2011-09-26 18:39:45', 'cadastrou na tabela imovel_acompanhe_data'),
(37, 1, '2011-09-26 18:40:14', 'cadastrou na tabela imovel_acompanhe_galeria'),
(38, 1, '2011-09-26 18:40:18', 'excluiu na tabela imovel_acompanhe_galeria'),
(39, 1, '2011-09-26 18:40:26', 'excluiu na tabela imovel_acompanhe_data'),
(40, 1, '2011-09-26 19:09:39', 'alterou na tabela google_analytics'),
(41, 1, '2011-09-27 08:52:37', 'alterou na tabela google_analytics'),
(42, 1, '2011-09-27 09:01:09', 'alterou na tabela google_webmaster'),
(43, 1, '2011-09-27 10:04:12', 'alterou na tabela config'),
(44, 1, '2011-09-27 10:04:58', 'alterou na tabela config'),
(45, 1, '2011-09-27 10:05:08', 'alterou na tabela config'),
(46, 1, '2011-09-27 16:41:00', 'alterou na tabela config'),
(47, 1, '2011-09-27 16:41:11', 'alterou na tabela dados_imobiliaria'),
(48, 1, '2011-09-27 16:42:11', 'alterou na tabela google_webmaster'),
(49, 1, '2011-09-27 16:43:41', 'alterou na tabela google_webmaster'),
(50, 1, '2011-09-27 16:46:36', 'alterou na tabela google_webmaster'),
(51, 1, '2011-09-27 16:53:30', 'alterou na tabela google_maps'),
(52, 1, '2011-09-27 16:57:42', 'alterou na tabela google_analytics'),
(53, 1, '2011-09-27 17:00:12', 'alterou na tabela pagina_sobre'),
(54, 1, '2011-09-27 17:00:34', 'alterou na tabela pagina_sobre'),
(55, 1, '2011-09-27 17:02:26', 'alterou na tabela pagina_servico'),
(56, 1, '2011-09-27 17:02:32', 'alterou na tabela pagina_sobre'),
(57, 1, '2011-09-27 17:02:58', 'alterou na tabela pagina_sobre'),
(58, 1, '2011-09-27 17:03:20', 'alterou na tabela pagina_sobre'),
(59, 1, '2011-09-27 17:03:40', 'alterou na tabela pagina_servico'),
(60, 1, '2011-09-27 17:04:26', 'alterou na tabela dados_imobiliaria'),
(61, 1, '2011-09-27 17:15:57', 'alterou na tabela dados_imobiliaria'),
(62, 1, '2011-09-28 17:43:49', 'cadastrou na tabela imoveis'),
(63, 1, '2011-09-28 17:44:00', 'excluiu na tabela imoveis'),
(64, 5, '2011-09-29 11:43:53', 'cadastrou na tabela usuario'),
(65, 5, '2011-09-29 11:46:01', 'excluiu na tabela usuario'),
(66, 5, '2011-09-29 11:46:23', 'cadastrou na tabela usuario'),
(67, 5, '2011-09-29 11:46:28', 'excluiu na tabela usuario'),
(68, 7, '2011-09-29 12:01:21', 'cadastrou na tabela imoveis');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imoveis`
--

CREATE TABLE IF NOT EXISTS `imoveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL DEFAULT '0',
  `id_bairro` int(11) NOT NULL DEFAULT '0',
  `id_tipo_imovel` int(11) NOT NULL DEFAULT '0',
  `id_tipo_negocio` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `estagio_obra` int(11) NOT NULL DEFAULT '0',
  `area_total` varchar(6) DEFAULT NULL,
  `area_construida` varchar(6) DEFAULT NULL,
  `area_lazer` varchar(6) DEFAULT NULL,
  `quartos` int(11) DEFAULT NULL,
  `salas` int(11) DEFAULT NULL,
  `vagas_garagem` int(11) DEFAULT NULL,
  `elevadores` int(11) DEFAULT NULL,
  `andares` int(11) DEFAULT NULL,
  `unidades_por_andar` int(11) DEFAULT NULL,
  `banheiro` int(11) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `numero` varchar(7) DEFAULT NULL,
  `complemento` varchar(11) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `descricao_resum` varchar(255) NOT NULL DEFAULT '',
  `descricao` text,
  `foto` varchar(100) NOT NULL,
  `cod_imob` varchar(50) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT '',
  `destaque` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `imoveis`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel_acompanhe_data`
--

CREATE TABLE IF NOT EXISTS `imovel_acompanhe_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) NOT NULL,
  `data` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `imovel_acompanhe_data`
--

INSERT INTO `imovel_acompanhe_data` (`id`, `id_imovel`, `data`) VALUES
(9, 11, '13/07/2011'),
(8, 11, '12/07/2011'),
(3, 0, '03/03/2003'),
(4, 0, '01/01/2001'),
(5, 0, '0305054'),
(6, 0, '01325'),
(7, 6, '09/07/2011'),
(10, 11, '14/05/2011'),
(11, 11, '08/07/2011'),
(12, 10, '13/07/2011'),
(13, 12, '29/07/2011'),
(14, 13, '28/07/2011'),
(15, 14, '28/07/2011'),
(16, 0, '28/07/2011'),
(18, 13, '12/12/2011');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel_acompanhe_galeria`
--

CREATE TABLE IF NOT EXISTS `imovel_acompanhe_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) NOT NULL,
  `id_data` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `thumb` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Extraindo dados da tabela `imovel_acompanhe_galeria`
--

INSERT INTO `imovel_acompanhe_galeria` (`id`, `id_imovel`, `id_data`, `imagem`, `thumb`) VALUES
(35, 11, 10, '/fotos_acompanhe/g/imagem_130720111310559954a5db64d5bf4ba330558977708aa7efbc.jpg', '/fotos_acompanhe/p/thumb_130720111310559955cfcaaf364514f9b16f771943a7665823.jpg'),
(36, 11, 10, '/fotos_acompanhe/g/imagem_130720111310559957f5663e1c80ae1f74bd5f0323b25558b0.jpg', '/fotos_acompanhe/p/thumb_130720111310559958b91830370923d24a3b5633249935fc4d.jpg'),
(37, 11, 11, '/fotos_acompanhe/g/imagem_130720111310559979ef4b54c50a86c31a318ca8f1d5b82486.jpg', '/fotos_acompanhe/p/thumb_13072011131055998036fcad318a7c7dd356d40bb9aa3b9fbf.jpg'),
(38, 11, 11, '/fotos_acompanhe/g/imagem_130720111310559981f003c464b48e35bf47e993fca755c7eb.jpg', '/fotos_acompanhe/p/thumb_130720111310559982ff318fcfc4d48f92582124d65a2bdc21.jpg'),
(39, 11, 11, '/fotos_acompanhe/g/imagem_1307201113105599847e18305a672e84ab49b894aa86d6b2c5.jpg', '/fotos_acompanhe/p/thumb_130720111310559985ed08f0637c95b8c052abfec03405fb75.jpg'),
(40, 11, 11, '/fotos_acompanhe/g/imagem_130720111310559986b87d95a33d7c0463f24ca0662d50fb41.jpg', '/fotos_acompanhe/p/thumb_130720111310559987f8bb8455f27c5ad1c5885776a0c197bb.jpg'),
(41, 11, 11, '/fotos_acompanhe/g/imagem_1307201113105599899733ad2c13772c068deabf5b6c17d5b4.jpg', '/fotos_acompanhe/p/thumb_130720111310559990874c24f766b27dbfb72d4fdbbdc0f90b.jpg'),
(42, 11, 11, '/fotos_acompanhe/g/imagem_13072011131055999216a630def2f73a97e605fca760a6e50a.jpg', '/fotos_acompanhe/p/thumb_13072011131055999309954f20df68b5e120269b9c1de4867f.jpg'),
(43, 11, 11, '/fotos_acompanhe/g/imagem_1307201113105599947d76fd02328d127cd506d5921ef0083b.jpg', '/fotos_acompanhe/p/thumb_13072011131055999546c3e84aae72e82092c878758459820d.jpg'),
(44, 11, 11, '/fotos_acompanhe/g/imagem_130720111310559997bb7a55d9bd319ba3d098c6b8b4045e70.jpg', '/fotos_acompanhe/p/thumb_1307201113105599987a97d497ace0a5bf92b6aa62116a22ac.jpg'),
(45, 11, 11, '/fotos_acompanhe/g/imagem_13072011131055999944c9b56daf56b70f07204232e9d28a59.jpg', '/fotos_acompanhe/p/thumb_130720111310560000ecfc67cb5fdf809d4f2e693f0271925b.jpg'),
(46, 11, 11, '/fotos_acompanhe/g/imagem_13072011131056000210fc52ab752498af977ef457f540d383.jpg', '/fotos_acompanhe/p/thumb_1307201113105600036ebf7f1c39cdf1c9c76ae442989c7516.jpg'),
(47, 11, 11, '/fotos_acompanhe/g/imagem_1307201113105600056e605e2861a766e99c1a0965b2b53904.jpg', '/fotos_acompanhe/p/thumb_1307201113105600067664882229b3ae3fb27d8be32597a4bd.jpg'),
(48, 10, 12, '/fotos_acompanhe/g/imagem_130720111310567952d486f4ca6383ec67312920a40637ed27.jpg', '/fotos_acompanhe/p/thumb_1307201113105679533f3c6365e9db9f524e3e27864430f256.jpg'),
(49, 10, 12, '/fotos_acompanhe/g/imagem_130720111310567955699aeb4e66b9d0b81ef25f46ca2de8b6.gif', '/fotos_acompanhe/p/thumb_130720111310567956c303165df63cf9dd6e76f32baa8de5fa.gif'),
(50, 10, 12, '/fotos_acompanhe/g/imagem_130720111310567957d3a589c87e088cb2056147532bbcd08e.jpg', '/fotos_acompanhe/p/thumb_130720111310567958957eaeacab2405326551eb5bfe417ccb.jpg'),
(51, 10, 12, '/fotos_acompanhe/g/imagem_130720111310567960a0e11bf1b2f45e608985e84fe08bb377.jpg', '/fotos_acompanhe/p/thumb_13072011131056796117ff9b0ce5d56409cdbfbdc20797e619.jpg'),
(53, 12, 13, '/fotos_acompanhe/g/imagem_2907201113119653717855da3de93494b3c450b7e6bd71f051.jpg', '/fotos_acompanhe/p/thumb_290720111311965372a99b90585f255bee0c1013bf58024242.jpg'),
(54, 13, 14, '/fotos_acompanhe/g/imagem_29072011131196597980c34149f31a090f0b344cd1ea23821c.jpg', '/fotos_acompanhe/p/thumb_290720111311965980f5e43d27d9439e37767033fc6077b441.jpg'),
(55, 13, 14, '/fotos_acompanhe/g/imagem_2907201113119659950861f6337a1aaa7a0f37c2b164a89023.jpg', '/fotos_acompanhe/p/thumb_2907201113119659964d544b875f7205f71ce59d294ae1e821.jpg'),
(59, 14, 15, '/fotos_acompanhe/g/imagem_29072011131196650028decad312ebc404184ac6f67deeaeb5.jpg', '/fotos_acompanhe/p/thumb_29072011131196650192a02df09836a4dc0f2d4c210eed8a86.jpg'),
(60, 14, 15, '/fotos_acompanhe/g/imagem_29072011131196650556aef0ba84aff8ec6589311374a092e8.jpg', '/fotos_acompanhe/p/thumb_29072011131196650695e14e20902a260ccbd08b74038802fa.jpg'),
(61, 14, 15, '/fotos_acompanhe/g/imagem_290720111311966511a8a9d910601cdcf02e1db684522e3cf7.jpg', '/fotos_acompanhe/p/thumb_2907201113119665125759f1ae1c799510bcc2b1330fe4cbfc.jpg'),
(63, 14, 15, '/fotos_acompanhe/g/imagem_2907201113119665290cfb18dff2c2eec1f8b54bf40fff7565.jpg', '/fotos_acompanhe/p/thumb_29072011131196653074ff5634e142e60c4dd125970e70f454.jpg'),
(64, 14, 15, '/fotos_acompanhe/g/imagem_290720111311966534ab6e6b0022c51b866c0f7f8c9596c330.jpg', '/fotos_acompanhe/p/thumb_290720111311966535316d4f79e777fdce7d6138fe4424d612.jpg'),
(65, 14, 15, '/fotos_acompanhe/g/imagem_29072011131196654214cc583d9abf42393d1ed62313df1967.jpg', '/fotos_acompanhe/p/thumb_290720111311966543494a2833eb893664f50b26c0cce108be.jpg'),
(66, 14, 15, '/fotos_acompanhe/g/imagem_29072011131196654847431893519a9cce434d75b97a0920f9.jpg', '/fotos_acompanhe/p/thumb_290720111311966549dbabf7dfbd44663a96d2bfab1dbc7155.jpg'),
(67, 14, 15, '/fotos_acompanhe/g/imagem_2907201113119665559d82a07e86c997341c3b4e1ccbb5e551.jpg', '/fotos_acompanhe/p/thumb_290720111311966556e3899acb62b61bb4f643a04b95c1881e.jpg'),
(69, 14, 15, '/fotos_acompanhe/g/imagem_2907201113119665673c778297ccd40d33ff6a3c2767b6d679.jpg', '/fotos_acompanhe/p/thumb_29072011131196656895c929bed83a1dad6e6d9cbe723941d5.jpg'),
(74, 14, 15, '/fotos_acompanhe/g/imagem_29072011131196660949153a9ddfe5d78d4388c05daca68e2b.jpg', '/fotos_acompanhe/p/thumb_290720111311966610f2cd75692acdfebf7d85fac4eb2fdd7e.jpg'),
(77, 14, 15, '/fotos_acompanhe/g/imagem_290720111311966646540a5b1e082e14061db78f5fac617b32.jpg', '/fotos_acompanhe/p/thumb_290720111311966647a219b1f5c38afe173b4e65b8b3403993.jpg'),
(78, 14, 15, '/fotos_acompanhe/g/imagem_290720111311966656d4c10e4d691614e6df18558127bb99ab.jpg', '/fotos_acompanhe/p/thumb_290720111311966657afdab146168c4258907fce6065a8db9c.jpg'),
(80, 0, 18, '/fotos_acompanhe/g/imagem_210920111316611636551e246826a67943a306101200d75442.jpg', '/fotos_acompanhe/p/thumb_210920111316611637050a76364bae8eb990c24e22198e552f.jpg'),
(81, 0, 18, '/fotos_acompanhe/g/imagem_210920111316611638750524a5d2200e9397fe4fd7ce54a30f.jpg', '/fotos_acompanhe/p/thumb_2109201113166116399f138042aad13e070974f1e3e82855f9.jpg'),
(82, 0, 18, '/fotos_acompanhe/g/imagem_21092011131661164059571f89c239af02bcf116089b1ec584.jpg', '/fotos_acompanhe/p/thumb_210920111316611641a719941b6de64fcea8b7b7308f750e87.jpg'),
(83, 0, 18, '/fotos_acompanhe/g/imagem_2109201113166117609bf38421c5b950e2cfd0d8a596a12125.jpg', '/fotos_acompanhe/p/thumb_210920111316611761125092a52f790e6064947d1e0519cfdb.jpg'),
(84, 0, 18, '/fotos_acompanhe/g/imagem_2109201113166118728c719ae609e2d0d4721c102d0866145d.jpg', '/fotos_acompanhe/p/thumb_2109201113166118735e5b2e45242df2e23043a3053a07c8f5.jpg'),
(86, 13, 18, '/fotos_acompanhe/g/imagem_210920111316612003fc6f904e5cb16a146871e5463d284c4d.jpg', '/fotos_acompanhe/p/thumb_21092011131661200428ccfa5ef47c32d839399a25cd952182.jpg'),
(87, 13, 18, '/fotos_acompanhe/g/imagem_210920111316612005f2843b736f11066bbf14b77a2192bdc4.jpg', '/fotos_acompanhe/p/thumb_2109201113166120062f547e604b10e2e6bf04e6dbf5e97325.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel_cronograma`
--

CREATE TABLE IF NOT EXISTS `imovel_cronograma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) NOT NULL,
  `pronto` int(11) NOT NULL,
  `obra` int(11) NOT NULL,
  `escavacao` int(11) NOT NULL,
  `contencao` int(11) NOT NULL,
  `fundacao` int(11) NOT NULL,
  `estrutura` int(11) NOT NULL,
  `alvenaria` int(11) NOT NULL,
  `instalacao` int(11) NOT NULL,
  `rinterno` int(11) NOT NULL,
  `rexterno` int(11) NOT NULL,
  `acabamento` int(11) NOT NULL,
  `finalizacao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `imovel_cronograma`
--

INSERT INTO `imovel_cronograma` (`id`, `id_imovel`, `pronto`, `obra`, `escavacao`, `contencao`, `fundacao`, `estrutura`, `alvenaria`, `instalacao`, `rinterno`, `rexterno`, `acabamento`, `finalizacao`) VALUES
(1, 13, 90, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 100),
(7, 12, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 27, 9, 1, 2, 3, 4, 5, 6, 7, 8, 9, 7, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel_galeria`
--

CREATE TABLE IF NOT EXISTS `imovel_galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `thumb` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `imovel_galeria`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel_plantas`
--

CREATE TABLE IF NOT EXISTS `imovel_plantas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `thumb` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Extraindo dados da tabela `imovel_plantas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel_video`
--

CREATE TABLE IF NOT EXISTS `imovel_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imovel` int(11) NOT NULL,
  `video` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `imovel_video`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_servico`
--

CREATE TABLE IF NOT EXISTS `pagina_servico` (
  `texto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagina_servico`
--

INSERT INTO `pagina_servico` (`texto`) VALUES
('<div>\r\n<div>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et augue nisl, et laoreet purus. Phasellus eros dui, tristique a fermentum sit amet, adipiscing ut ligula. Morbi vel libero tellus, consequat luctus purus. Proin condimentum felis ac justo varius adipiscing. Integer sodales dignissim erat, eget tristique lorem volutpat ac. Fusce euismod, nibh id blandit sagittis, turpis neque facilisis nibh, ut egestas neque ligula at neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed dapibus scelerisque leo, a placerat velit bibendum ac. Quisque nec nulla quis quam cursus sollicitudin id ac leo. Nulla feugiat, massa et gravida dignissim, lorem nunc cursus nisi, id cursus orci lectus et nisl.</p>\r\n<p>&nbsp;</p>\r\n<p>In vel augue vitae neque consequat bibendum. Maecenas lobortis felis quis dolor</p>\r\n<p>eleifend in varius urna fringilla. Mauris convallis tincidunt ipsum, et viverra urna consectetur id. Cras imperdiet porttitor lectus, quis iaculis nisi auctor sed. Praesent a eros risus. Suspendisse et lobortis quam. Vestibulum at libero est. Nunc rutrum sollicitudin sem, nec sollicitudin nisi elementum ac. Fusce lorem enim, posuere quis tempus eu, tristique sit amet justo. Integer quis justo purus, sit amet tempus eros. Nullam cursus neque vel lorem semper ac bibendum mi vulputate. Aenean lacus libero, tempus eget tristique id, volutpat id velit. Cras interdum, mauris non scelerisque pellentesque, mi augue elementum mauris, ac accumsan libero orci vestibulum nibh. Maecenas luctus, turpis a ullamcorper ultrices, neque ligula varius augue, vel tristique libero urna sit amet velit. Nunc id urna eu libero rutrum suscipit. Suspendisse mattis laoreet malesuada.</p>\r\n<p>&nbsp;</p>\r\n<p>Phasellus eros urna, molestie vel lobortis nec, porta ac augue. Integer scelerisque gravida porttitor. Mauris ullamcorper sodales massa, eu pulvinar tortor adipiscing non. Mauris et volutpat ante. Duis consequat gravida urna, ac molestie nisi fermentum rhoncus. Suspendisse volutpat metus sed nibh ornare quis fermentum mauris gravida. Aenean laoreet, lacus ac iaculis congue, orci ante suscipit arcu, et convallis eros justo ac ligula. Proin adipiscing feugiat neque, at dapibus tortor mattis id. Nulla interdum rhoncus nisl, ut malesuada leo sollicitudin sit amet. Nullam ac euismod eros. Morbi eleifend malesuada porta. Ut consectetur neque magna.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis porttitor nisi ac tellus elementum quis porttitor leo bibendum. Pellentesque leo mauris, vehicula quis rutrum tristique, lobortis ut urna. In at velit a mi tincidunt volutpat ut sed magna. Aenean pretium orci in velit tristique tincidunt. Nam eu mi ut tellus viverra lobortis nec at diam. Sed dignissim viverra est sit amet convallis. Nullam mollis facilisis mauris eu ornare. Vivamus rhoncus, neque et tincidunt iaculis, orci massa pellentesque elit, vitae imperdiet massa lectus ut ante. Fusce ut quam id diam interdum gravida a quis libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris tempor mattis cursus.</p>\r\n</div>\r\n</div>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagina_sobre`
--

CREATE TABLE IF NOT EXISTS `pagina_sobre` (
  `texto` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagina_sobre`
--

INSERT INTO `pagina_sobre` (`texto`) VALUES
('<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et augue nisl, et laoreet purus. Phasellus eros dui, tristique a fermentum sit amet, adipiscing ut ligula. Morbi vel libero tellus, consequat luctus purus. Proin condimentum felis ac justo varius adipiscing. Integer sodales dignissim erat, eget tristique lorem volutpat ac. Fusce euismod, nibh id blandit sagittis, turpis neque facilisis nibh, ut egestas neque ligula at neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed dapibus scelerisque leo, a placerat velit bibendum ac. Quisque nec nulla quis quam cursus sollicitudin id ac leo. Nulla feugiat, massa et gravida dignissim, lorem nunc cursus nisi, id cursus orci lectus et nisl.</p>\r\n<p>&nbsp;</p>\r\n<p>In vel augue vitae neque consequat bibendum. Maecenas lobortis felis quis dolor eleifend in varius urna fringilla. Mauris convallis tincidunt ipsum, et viverra urna consectetur id. Cras imperdiet porttitor lectus, quis iaculis nisi auctor sed. Praesent a eros risus. Suspendisse et lobortis quam. Vestibulum at libero est. Nunc rutrum sollicitudin sem, nec sollicitudin nisi elementum ac. Fusce lorem enim, posuere quis tempus eu, tristique sit amet justo. Integer quis justo purus, sit amet tempus eros. Nullam cursus neque vel lorem semper ac bibendum mi vulputate. Aenean lacus libero, tempus eget tristique id, volutpat id velit. Cras interdum, mauris non scelerisque pellentesque, mi augue elementum mauris, ac accumsan libero orci vestibulum nibh. Maecenas luctus, turpis a ullamcorper ultrices, neque ligula varius augue, vel tristique libero urna sit amet velit. Nunc id urna eu libero rutrum suscipit. Suspendisse mattis laoreet malesuada.</p>\r\n<p>&nbsp;</p>\r\n<p>Phasellus eros urna, molestie vel lobortis nec, porta ac augue. Integer scelerisque gravida porttitor. Mauris ullamcorper sodales massa, eu pulvinar tortor adipiscing non. Mauris et volutpat ante. Duis consequat gravida urna, ac molestie nisi fermentum rhoncus. Suspendisse volutpat metus sed nibh ornare quis fermentum mauris gravida. Aenean laoreet, lacus ac iaculis congue, orci ante suscipit arcu, et convallis eros justo ac ligula. Proin adipiscing feugiat neque, at dapibus tortor mattis id. Nulla interdum rhoncus nisl, ut malesuada leo sollicitudin sit amet. Nullam ac euismod eros. Morbi eleifend malesuada porta. Ut consectetur neque magna.</p>\r\n<p>&nbsp;</p>\r\n<p>Duis porttitor nisi ac tellus elementum quis porttitor leo bibendum. Pellentesque leo mauris, vehicula quis rutrum tristique, lobortis ut urna. In at velit a mi tincidunt volutpat ut sed magna. Aenean pretium orci in velit tristique tincidunt. Nam eu mi ut tellus viverra lobortis nec at diam. Sed dignissim viverra est sit amet convallis. Nullam mollis facilisis mauris eu ornare. Vivamus rhoncus, neque et tincidunt iaculis, orci massa pellentesque elit, vitae imperdiet massa lectus ut ante. Fusce ut quam id diam interdum gravida a quis libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris tempor mattis cursus.</p>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `redessociais`
--

CREATE TABLE IF NOT EXISTS `redessociais` (
  `youtube` text NOT NULL,
  `orkut` text NOT NULL,
  `twitter` text NOT NULL,
  `facebook` text NOT NULL,
  `msn` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `redessociais`
--

INSERT INTO `redessociais` (`youtube`, `orkut`, `twitter`, `facebook`, `msn`) VALUES
('teste', 'teste', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_imovel`
--

CREATE TABLE IF NOT EXISTS `tipo_imovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`id`, `nome`) VALUES
(4, 'CASA'),
(6, 'LOJA'),
(5, 'APARTAMENTO'),
(7, 'TERRENO'),
(10, 'CHACARAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_negocio`
--

CREATE TABLE IF NOT EXISTS `tipo_negocio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fixo` int(1) NOT NULL,
  `nome` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tipo_negocio`
--

INSERT INTO `tipo_negocio` (`id`, `fixo`, `nome`) VALUES
(1, 0, 'Comprar'),
(2, 0, 'Alugar'),
(3, 1, 'Temporada'),
(4, 1, 'Empreendimento');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `login` varchar(20) NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `senha` char(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nivel` int(2) DEFAULT '0',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `login`, `imagem`, `senha`, `email`, `nivel`) VALUES
(7, 'Tiago Maccartney', 'admin', '/capa/29091113173075831317307583charlie-sheen.jpg', '21232f297a57a5a743894a0e4a801fc3', 'contato@brserve.com.br', 1);
