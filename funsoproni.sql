# Host: localhost  (Version: 5.5.19)
# Date: 2016-05-24 00:39:18
# Generator: MySQL-Front 5.3  (Build 1.7)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

DROP DATABASE IF EXISTS `funsoproni`;
CREATE DATABASE `funsoproni` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `funsoproni`;

#
# Source for table "cargos"
#

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) DEFAULT NULL,
  `tipo_rol` smallint(1) DEFAULT NULL COMMENT '1:Especializado 2:Directivo 3:Administrativo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "cargos"
#

INSERT INTO `cargos` VALUES (1,'ANALISTA DE PROYECTO',2);

#
# Source for table "etnias"
#

DROP TABLE IF EXISTS `etnias`;
CREATE TABLE `etnias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `etnia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "etnias"
#

INSERT INTO `etnias` VALUES (1,'Arawak'),(2,'Guambiano'),(3,'Awá');

#
# Source for table "comunidades"
#

DROP TABLE IF EXISTS `comunidades`;
CREATE TABLE `comunidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comunidad` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `poblacion` bigint(11) DEFAULT NULL,
  `etnias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comunidades_etnias1_idx` (`etnias_id`),
  CONSTRAINT `fk_comunidades_etnias1` FOREIGN KEY (`etnias_id`) REFERENCES `etnias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "comunidades"
#

INSERT INTO `comunidades` VALUES (2,'PUEBLOS INDIGENAS ARAWAK ORIENTE','Comunidad ubicada cerca a la isla indigena colombiana',1000,1),(3,'comunidad 2','descripcion communidad',3,2),(4,'ccccc','Cccccc',444,3);

#
# Source for table "comunidad_representante"
#

DROP TABLE IF EXISTS `comunidad_representante`;
CREATE TABLE `comunidad_representante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo_electronico` varchar(200) DEFAULT NULL,
  `comunidades_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comunidad_representante_comunidades1_idx` (`comunidades_id`),
  CONSTRAINT `fk_comunidad_representante_comunidades1` FOREIGN KEY (`comunidades_id`) REFERENCES `comunidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "comunidad_representante"
#


#
# Source for table "ninos"
#

DROP TABLE IF EXISTS `ninos`;
CREATE TABLE `ninos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL COMMENT '1=Hombre;2=Mujer',
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `comunidades_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ninos_comunidades1_idx` (`comunidades_id`),
  CONSTRAINT `fk_ninos_comunidades1` FOREIGN KEY (`comunidades_id`) REFERENCES `comunidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "ninos"
#

INSERT INTO `ninos` VALUES (6,'6666','Bbbbb',NULL,NULL,NULL,NULL,NULL,2),(7,'pepe','el pelusa',NULL,NULL,NULL,NULL,NULL,2),(11,'ttt','fff',NULL,NULL,NULL,NULL,NULL,2),(12,'yy','hhh',NULL,NULL,NULL,NULL,NULL,2),(13,'pepe','pelusa',NULL,NULL,NULL,NULL,NULL,3),(14,'gg','gggg',NULL,NULL,NULL,NULL,NULL,2);

#
# Source for table "temas"
#

DROP TABLE IF EXISTS `temas`;
CREATE TABLE `temas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "temas"
#

INSERT INTO `temas` VALUES (1,'SOCIAL'),(2,'ECONOMICO'),(3,'CULTURAL');

#
# Source for table "usuarios"
#

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `profesion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `salario` bigint(20) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contrasna` varchar(100) DEFAULT NULL,
  `cargos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_cargos1_idx` (`cargos_id`),
  CONSTRAINT `fk_usuarios_cargos1` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "usuarios"
#

INSERT INTO `usuarios` VALUES (3,'JESSICA','OLAVE','3151232345','114323454','AV 14 CON 23','INGENIERA','JE@HOTMAIL.COM',1500000,NULL,'je','123456',1);

#
# Source for table "proyectos"
#

DROP TABLE IF EXISTS `proyectos`;
CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `alcance` varchar(255) DEFAULT NULL,
  `presupuesto` bigint(11) DEFAULT NULL,
  `fecha_inicial` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `evaluacion_final` decimal(10,0) DEFAULT NULL,
  `estado_final` tinyint(1) DEFAULT NULL,
  `temas_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_temas1_idx` (`temas_id`),
  KEY `fk_proyectos_usuarios1_idx` (`usuarios_id`),
  CONSTRAINT `fk_proyectos_temas1` FOREIGN KEY (`temas_id`) REFERENCES `temas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "proyectos"
#

INSERT INTO `proyectos` VALUES (2,'CONSTRUCCION DE CASAS','PLAN DE CONSTRUCCION DE VIVIENDAS PARA LOS BENEFICIADOS DE ESTE PROYECTO','1',1,NULL,NULL,NULL,NULL,NULL,1,3),(3,'aaaaaaaaaaaaaaa','assssssssssssss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,3),(4,'tttttttt','ttttttttttttt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,3);

#
# Source for table "proyectos_profesionales"
#

DROP TABLE IF EXISTS `proyectos_profesionales`;
CREATE TABLE `proyectos_profesionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyectos_id` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_has_usuarios_usuarios1_idx` (`usuarios_id`),
  KEY `fk_proyectos_has_usuarios_proyectos1_idx` (`proyectos_id`),
  CONSTRAINT `fk_proyectos_has_usuarios_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "proyectos_profesionales"
#


#
# Source for table "proyectos_profesionales_tareas"
#

DROP TABLE IF EXISTS `proyectos_profesionales_tareas`;
CREATE TABLE `proyectos_profesionales_tareas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarea` varchar(100) DEFAULT NULL,
  `cantidad_dias` smallint(6) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `proyectos_has_usuarios_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_profesionales_tareas_proyectos_has_usuarios1_idx` (`proyectos_has_usuarios_id`),
  CONSTRAINT `fk_proyectos_profesionales_tareas_proyectos_has_usuarios1` FOREIGN KEY (`proyectos_has_usuarios_id`) REFERENCES `proyectos_profesionales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "proyectos_profesionales_tareas"
#


#
# Source for table "proyectos_comunidades"
#

DROP TABLE IF EXISTS `proyectos_comunidades`;
CREATE TABLE `proyectos_comunidades` (
  `proyectos_id` int(11) NOT NULL,
  `comunidades_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `fk_proyectos_has_comunidades_comunidades1_idx` (`comunidades_id`),
  KEY `fk_proyectos_has_comunidades_proyectos1_idx` (`proyectos_id`),
  CONSTRAINT `fk_proyectos_has_comunidades_comunidades1` FOREIGN KEY (`comunidades_id`) REFERENCES `comunidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proyectos_has_comunidades_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "proyectos_comunidades"
#


#
# Source for table "objetivos"
#

DROP TABLE IF EXISTS `objetivos`;
CREATE TABLE `objetivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objetivo` varchar(100) DEFAULT NULL,
  `porcentaje` decimal(10,0) DEFAULT NULL,
  `proyectos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_objetivos_proyectos1_idx` (`proyectos_id`),
  CONSTRAINT `fk_objetivos_proyectos1` FOREIGN KEY (`proyectos_id`) REFERENCES `proyectos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "objetivos"
#


/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
