-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.33-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para holly
CREATE DATABASE IF NOT EXISTS `holly` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `holly`;

-- Copiando estrutura para tabela holly.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `id_adm` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.categoria: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_categoria`, `nome_categoria`) VALUES
	(1, 'masculino'),
	(2, 'feminino'),
	(3, 'infantil'),
	(4, 'esporte'),
	(6, 'inspiracao'),
	(7, 'outlet');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cidade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.cidade: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(255) NOT NULL AUTO_INCREMENT,
  `id_cidade` int(255) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `data_criada` datetime DEFAULT NULL,
  `atualizacao` datetime DEFAULT NULL,
  `CPF` varchar(15) DEFAULT NULL,
  `RG` varchar(15) DEFAULT NULL,
  `Data_de_nacimento` varchar(50) NOT NULL,
  `Fone` int(14) DEFAULT NULL,
  `Login` varchar(50) NOT NULL,
  `Senha` varchar(100) NOT NULL,
  `CEP` int(20) DEFAULT NULL,
  `Bairro` varchar(60) DEFAULT NULL,
  `numero_da_casa` int(12) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `id_cidade` (`id_cidade`),
  CONSTRAINT `id_cidade` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.clientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.forma_pagamento
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `id_pagamento` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pagamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.forma_pagamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.itenspedido
CREATE TABLE IF NOT EXISTS `itenspedido` (
  `id_iten_pedido` int(255) NOT NULL AUTO_INCREMENT,
  `id_produto` int(255) NOT NULL,
  `id_pedido` int(255) NOT NULL,
  PRIMARY KEY (`id_iten_pedido`),
  KEY `id_produto` (`id_produto`),
  KEY `id_pedido` (`id_pedido`),
  CONSTRAINT `id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.itenspedido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itenspedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itenspedido` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int(255) NOT NULL AUTO_INCREMENT,
  `id_login` int(255) unsigned NOT NULL,
  `id_pagamento` int(255) NOT NULL,
  `Frete` double(255,0) NOT NULL,
  `Total` double(255,0) NOT NULL,
  `id_status` int(255) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_pagamento` (`id_pagamento`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `id_pagamento` FOREIGN KEY (`id_pagamento`) REFERENCES `forma_pagamento` (`id_pagamento`),
  CONSTRAINT `id_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.pedidos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `preco` float(255,0) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `id_categoria` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.produtos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela holly.status
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(255) NOT NULL AUTO_INCREMENT,
  `Situacao` varchar(100) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela holly.status: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
