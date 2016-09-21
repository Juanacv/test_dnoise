-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.52-0ubuntu0.14.04.1 - (Ubuntu)
-- SO del servidor:              debian-linux-gnu
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para test_dnoise
DROP DATABASE IF EXISTS `test_dnoise`;
CREATE DATABASE IF NOT EXISTS `test_dnoise` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test_dnoise`;


-- Volcando estructura para tabla test_dnoise.empresas
DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `empresa_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`empresa_id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla test_dnoise.empresas_relacion
DROP TABLE IF EXISTS `empresas_relacion`;
CREATE TABLE IF NOT EXISTS `empresas_relacion` (
  `relacion_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  PRIMARY KEY (`relacion_id`),
  UNIQUE KEY `cliente_proveedor` (`cliente_id`,`proveedor_id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `proveedor_id` (`proveedor_id`),
  CONSTRAINT `empresas_relacion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `empresas` (`empresa_id`) ON DELETE CASCADE,
  CONSTRAINT `empresas_relacion_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `empresas` (`empresa_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
