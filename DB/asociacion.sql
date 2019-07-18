/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : asociacion

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2019-07-18 00:28:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `asistencia`
-- ----------------------------
DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,
  `idTitular` int(11) DEFAULT NULL,
  `idReunion` int(11) DEFAULT NULL,
  `idPresencia` int(11) DEFAULT NULL,
  `horaAsistio` date DEFAULT NULL,
  `justificacion` varchar(255) DEFAULT NULL,
  `nroRecibo` char(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAsistencia`),
  KEY `titular_asistencia` (`idTitular`),
  KEY `usuario_asistencia` (`idUsuario`),
  CONSTRAINT `usuario_asistencia` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `titular_asistencia` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asistencia
-- ----------------------------

-- ----------------------------
-- Table structure for `cuota`
-- ----------------------------
DROP TABLE IF EXISTS `cuota`;
CREATE TABLE `cuota` (
  `idCuota` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoCuota` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `idMes` int(11) DEFAULT NULL,
  `monto` decimal(10,0) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCuota`),
  KEY `usuario_cuota` (`idUsuario`),
  CONSTRAINT `usuario_cuota` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuota
-- ----------------------------

-- ----------------------------
-- Table structure for `diccionario`
-- ----------------------------
DROP TABLE IF EXISTS `diccionario`;
CREATE TABLE `diccionario` (
  `idDiccionario` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` int(11) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `valor` varchar(100) DEFAULT NULL,
  `ubicacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idDiccionario`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of diccionario
-- ----------------------------
INSERT INTO `diccionario` VALUES ('1', '1', '1', 'AVENIDA', 'idCalle');
INSERT INTO `diccionario` VALUES ('2', '1', '2', 'JIRON', 'idCalle');
INSERT INTO `diccionario` VALUES ('3', '1', '3', 'CALLE', 'idCalle');
INSERT INTO `diccionario` VALUES ('4', '1', '4', 'PROLONGACION', 'idCalle');
INSERT INTO `diccionario` VALUES ('5', '2', '1', 'PERMANENTE', 'idVivencia');
INSERT INTO `diccionario` VALUES ('6', '2', '2', 'REGULAR', 'idVivencia');
INSERT INTO `diccionario` VALUES ('7', '2', '3', 'INTERDARIO', 'idVivencia');
INSERT INTO `diccionario` VALUES ('8', '2', '4', 'UNA VEZ A LA SEMANA', 'idVivencia');
INSERT INTO `diccionario` VALUES ('9', '2', '5', 'UNA VEZ AL MES', 'idVivencia');
INSERT INTO `diccionario` VALUES ('10', '2', '6', 'UNA VEZ AL AÑO', 'idVivencia');
INSERT INTO `diccionario` VALUES ('11', '2', '7', 'CASI NUNCA', 'idVivencia');
INSERT INTO `diccionario` VALUES ('12', '3', '1', 'CONSTRUIDA', 'idCasa');
INSERT INTO `diccionario` VALUES ('13', '3', '2', 'ESTERA', 'idCasa');
INSERT INTO `diccionario` VALUES ('14', '3', '3', 'PREFABRICADA', 'idCasa');
INSERT INTO `diccionario` VALUES ('15', '3', '4', 'SIN CONSTRUCCION', 'idCasa');
INSERT INTO `diccionario` VALUES ('16', '4', '1', 'SILO', 'idSSHH');
INSERT INTO `diccionario` VALUES ('17', '4', '2', 'DESAGUE', 'idSSHH');
INSERT INTO `diccionario` VALUES ('18', '4', '3', 'SIN SERVICIO', 'idSSHH');
INSERT INTO `diccionario` VALUES ('19', '5', '1', 'PRIMARIA COMPLETA', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('20', '5', '2', 'PRIMARIA INCOMPLETA', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('21', '5', '3', 'SECUNDARIA COMPLETA', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('22', '5', '4', 'SECUNDARIA INCOMPLETA', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('23', '5', '5', 'SUPERIOR TÉCNICA COMPLETA', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('24', '5', '6', 'SUPERIOR TÉCNICA INCOMPLETA', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('25', '5', '7', 'UNIVERSITARIO COMPLETO', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('26', '5', '8', 'UNIVERSITARIO INCOMPLETO', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('27', '5', '9', 'POSGRADO', 'idInstruccion');
INSERT INTO `diccionario` VALUES ('28', '6', '1', 'SOLTERO', 'idCivil');
INSERT INTO `diccionario` VALUES ('29', '6', '2', 'CASADO', 'idCivil');
INSERT INTO `diccionario` VALUES ('30', '6', '3', 'VIUDO', 'idCivil');
INSERT INTO `diccionario` VALUES ('31', '6', '4', 'DIVORCIADO', 'idCivil');
INSERT INTO `diccionario` VALUES ('32', '7', '1', 'ADJUDICACIÓN', 'idIngreso');
INSERT INTO `diccionario` VALUES ('33', '7', '2', 'SUBDIVISIÓN', 'idIngreso');
INSERT INTO `diccionario` VALUES ('34', '7', '3', 'UNIFICACIÓN', 'idIngreso');
INSERT INTO `diccionario` VALUES ('35', '7', '4', 'TRANSFERENCIA', 'idIngreso');
INSERT INTO `diccionario` VALUES ('36', '8', '1', 'PADRE', 'idRelacion');
INSERT INTO `diccionario` VALUES ('37', '8', '2', 'MADRE', 'idRelacion');
INSERT INTO `diccionario` VALUES ('38', '8', '3', 'HIJO', 'idRelacion');
INSERT INTO `diccionario` VALUES ('39', '8', '4', 'TIO', 'idRelacion');
INSERT INTO `diccionario` VALUES ('40', '8', '5', 'HERMANO', 'idRelacion');
INSERT INTO `diccionario` VALUES ('41', '8', '6', 'PRIMO', 'idRelacion');
INSERT INTO `diccionario` VALUES ('42', '8', '7', 'ABUELO', 'idRelacion');
INSERT INTO `diccionario` VALUES ('43', '8', '8', 'ESPOSO', 'idRelacion');
INSERT INTO `diccionario` VALUES ('44', '8', '9', 'OTROS', 'idRelacion');
INSERT INTO `diccionario` VALUES ('45', '9', '1', 'PRESIDENTE', 'idCargo');
INSERT INTO `diccionario` VALUES ('46', '9', '2', 'SECRETARIO', 'idCargo');
INSERT INTO `diccionario` VALUES ('47', '9', '3', 'VOCAL', 'idCargo');
INSERT INTO `diccionario` VALUES ('48', '9', '4', 'FISCAL', 'idCargo');
INSERT INTO `diccionario` VALUES ('49', '9', '5', 'OTRO', 'idCargo');
INSERT INTO `diccionario` VALUES ('50', '10', '1', 'LEGAL', 'idTipoCuota');
INSERT INTO `diccionario` VALUES ('51', '10', '2', 'CUOTA ADMINISTRATIVA', 'idTipoCuota');
INSERT INTO `diccionario` VALUES ('52', '10', '3', 'CUOTA EXTRAORDINARIA', 'idTipoCuota');
INSERT INTO `diccionario` VALUES ('53', '11', '1', 'ENERO', 'idMes');
INSERT INTO `diccionario` VALUES ('54', '11', '2', 'FEBRERO', 'idMes');
INSERT INTO `diccionario` VALUES ('55', '11', '3', 'MARZO', 'idMes');
INSERT INTO `diccionario` VALUES ('56', '11', '4', 'ABRIL', 'idMes');
INSERT INTO `diccionario` VALUES ('57', '11', '5', 'MAYO', 'idMes');
INSERT INTO `diccionario` VALUES ('58', '11', '6', 'JUNIO', 'idMes');
INSERT INTO `diccionario` VALUES ('59', '11', '7', 'JULIO', 'idMes');
INSERT INTO `diccionario` VALUES ('60', '11', '8', 'AGOSTO', 'idMes');
INSERT INTO `diccionario` VALUES ('61', '11', '9', 'SETIEMBRE', 'idMes');
INSERT INTO `diccionario` VALUES ('62', '11', '10', 'OCTUBRE', 'idMes');
INSERT INTO `diccionario` VALUES ('63', '11', '11', 'NOVIEMBRE', 'idMes');
INSERT INTO `diccionario` VALUES ('64', '11', '12', 'DICIEMBRE', 'idMes');
INSERT INTO `diccionario` VALUES ('65', '12', '1', 'SALIDA', 'idTipoReunion');
INSERT INTO `diccionario` VALUES ('66', '12', '2', 'ASAMBLEA', 'idTipoReunion');
INSERT INTO `diccionario` VALUES ('67', '12', '3', 'FAENA', 'idTipoReunion');
INSERT INTO `diccionario` VALUES ('68', '13', '1', 'ASISTIO', 'idPreferencia');
INSERT INTO `diccionario` VALUES ('69', '13', '2', 'JUSTIFICO', 'idPreferencia');
INSERT INTO `diccionario` VALUES ('70', '13', '3', 'FALTO', 'idPreferencia');

-- ----------------------------
-- Table structure for `expediente`
-- ----------------------------
DROP TABLE IF EXISTS `expediente`;
CREATE TABLE `expediente` (
  `idExpediente` int(11) NOT NULL AUTO_INCREMENT,
  `nroExpediente` char(255) DEFAULT NULL,
  `area` decimal(10,0) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idManzana` int(11) DEFAULT NULL,
  `nrLote` char(255) DEFAULT NULL,
  `nroSubLote` char(255) DEFAULT NULL,
  `idCalle` int(11) DEFAULT NULL,
  `nomDireccion` varchar(255) DEFAULT NULL,
  `idVivencia` int(11) DEFAULT NULL,
  `idCasa` int(11) DEFAULT NULL,
  `idSSHH` int(11) DEFAULT NULL,
  `idPlantas` char(255) DEFAULT NULL,
  `idTendero` char(255) DEFAULT NULL,
  `idLuz` char(255) DEFAULT NULL,
  `idRadio` char(255) DEFAULT NULL,
  `idRefrigerador` char(255) DEFAULT NULL,
  `idTelevisor` char(255) DEFAULT NULL,
  `idSonido` char(255) DEFAULT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `aPlano` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idExpediente`),
  KEY `manzanas_expediente` (`idManzana`),
  KEY `usuario_expediente` (`idUsuario`),
  CONSTRAINT `usuario_expediente` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `manzanas_expediente` FOREIGN KEY (`idManzana`) REFERENCES `manzanas` (`idManzana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of expediente
-- ----------------------------

-- ----------------------------
-- Table structure for `frontend`
-- ----------------------------
DROP TABLE IF EXISTS `frontend`;
CREATE TABLE `frontend` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Categoria` int(11) NOT NULL,
  `Tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Imagen_principal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contenido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Estado` int(11) NOT NULL,
  `FechaIngreso` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of frontend
-- ----------------------------

-- ----------------------------
-- Table structure for `grupo`
-- ----------------------------
DROP TABLE IF EXISTS `grupo`;
CREATE TABLE `grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `nomGrupo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grupo
-- ----------------------------

-- ----------------------------
-- Table structure for `hijos`
-- ----------------------------
DROP TABLE IF EXISTS `hijos`;
CREATE TABLE `hijos` (
  `idHijo` int(11) NOT NULL AUTO_INCREMENT,
  `idTitular` int(11) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHijo`),
  KEY `persona_hijos` (`idPersona`),
  KEY `titular_hijos` (`idTitular`),
  CONSTRAINT `titular_hijos` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`),
  CONSTRAINT `persona_hijos` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hijos
-- ----------------------------

-- ----------------------------
-- Table structure for `manzanas`
-- ----------------------------
DROP TABLE IF EXISTS `manzanas`;
CREATE TABLE `manzanas` (
  `idManzana` int(11) NOT NULL AUTO_INCREMENT,
  `nomManzana` char(255) DEFAULT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idManzana`),
  KEY `grupo_manzanas` (`idGrupo`),
  CONSTRAINT `grupo_manzanas` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of manzanas
-- ----------------------------

-- ----------------------------
-- Table structure for `miembro_hogar`
-- ----------------------------
DROP TABLE IF EXISTS `miembro_hogar`;
CREATE TABLE `miembro_hogar` (
  `idMiembro` int(11) NOT NULL AUTO_INCREMENT,
  `idTitular` int(11) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idRelacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMiembro`),
  KEY `persona_miembro_hogar` (`idPersona`),
  CONSTRAINT `persona_miembro_hogar` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of miembro_hogar
-- ----------------------------

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('5', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('6', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('7', '2019_06_20_030304_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('8', '2019_06_20_030857_create_role_user_table', '1');
INSERT INTO `migrations` VALUES ('9', '2019_06_27_052846_create_modulos_table', '1');
INSERT INTO `migrations` VALUES ('10', '2019_06_27_055429_create_paginas_table', '1');
INSERT INTO `migrations` VALUES ('11', '2019_07_05_010724_create_frontend_table', '1');

-- ----------------------------
-- Table structure for `modulo`
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(200) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Orden` int(11) DEFAULT NULL,
  `Icono` varchar(200) DEFAULT NULL,
  `Link` varchar(100) DEFAULT NULL,
  `LinkExterno` int(11) DEFAULT NULL,
  `Route` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'Dasboard', 'Dasboard', '1', '1', '<i class=\"feather icon-home\"></i>', null, '0', 'admin/dashboard', null, null);
INSERT INTO `modulo` VALUES ('2', 'Titular', 'Titular', '1', '4', '<i class=\"feather icon-box\"></i>', null, '0', 'admin/titular', '2019-07-16 23:41:37', null);
INSERT INTO `modulo` VALUES ('3', 'Usuario', 'Usuario', '1', '3', '<i class=\"feather icon-settings\"></i>', 'http://google.com', '0', 'admin/usuario', '2019-07-16 23:41:50', null);
INSERT INTO `modulo` VALUES ('4', 'Configuraciòn', 'Modulo de configuración', '0', '2', '<i class=\"feather icon-settings\"></i>', null, '0', 'admin/configuracion', null, null);
INSERT INTO `modulo` VALUES ('7', 'Cuotas', 'Cuotas', '1', '5', '<i class=\"feather icon-box\"></i>', null, '0', 'admin/cuota', '2019-06-27 17:02:24', '2019-06-27 16:45:47');
INSERT INTO `modulo` VALUES ('8', 'Expediente', 'Expediente', '1', '6', '<i class=\"feather icon-sidebar\"></i>', '#', '0', 'admin/expediente', '2019-07-16 23:58:44', '2019-07-03 23:25:48');
INSERT INTO `modulo` VALUES ('9', 'Pagos', 'Pagos', '1', '7', '<i class=\"feather icon-sidebar\"></i>', null, '0', 'admin/pagos', '2019-07-03 23:25:48', '2019-07-03 23:25:48');
INSERT INTO `modulo` VALUES ('10', 'Reporte', 'Reporte', '1', '8', '<i class=\"feather icon-sidebar\"></i>', null, '0', 'admin/reporte', '2019-07-03 23:25:48', '2019-07-03 23:25:48');

-- ----------------------------
-- Table structure for `pagina`
-- ----------------------------
DROP TABLE IF EXISTS `pagina`;
CREATE TABLE `pagina` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Padre` char(5) DEFAULT NULL,
  `ModuloID` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Ruta` varchar(200) DEFAULT NULL,
  `Slug` varchar(200) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Visible` int(11) DEFAULT NULL,
  `Orden` int(11) DEFAULT NULL,
  `FechaIngreso` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_Modulo` (`ModuloID`),
  CONSTRAINT `FK_Modulo` FOREIGN KEY (`ModuloID`) REFERENCES `modulo` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pagina
-- ----------------------------
INSERT INTO `pagina` VALUES ('1', '1', '1', 'Principal', 'dashboard', null, '1', '1', '1', '2019-06-24 23:05:15', null, null);
INSERT INTO `pagina` VALUES ('2', '1', '2', 'Listado', '-', '-', '0', '1', '2', '2019-06-24 23:05:12', null, null);
INSERT INTO `pagina` VALUES ('3', '1', '2', 'listado', 'titular/lista', '-', '1', '1', '3', null, '2019-07-17 01:09:11', null);
INSERT INTO `pagina` VALUES ('4', '0', '4', 'Menú', 'configuracion/menu', '-', '1', '1', '1', null, null, null);
INSERT INTO `pagina` VALUES ('5', null, '1', 'aaaaa', 'Asco. Prop. El lucumo Mz J Lot', null, '1', null, '4', null, '2019-07-01 19:05:08', '2019-07-01 19:05:08');
INSERT INTO `pagina` VALUES ('6', null, '3', 'listado', 'usuario/lista', null, '1', null, '5', null, '2019-07-17 01:09:02', '2019-07-01 19:05:30');
INSERT INTO `pagina` VALUES ('7', null, '8', 'Listado', 'expediente/lista', null, '1', null, '6', null, '2019-07-17 01:09:26', '2019-07-03 23:26:17');
INSERT INTO `pagina` VALUES ('8', null, '7', 'Listado', 'cuota/lista', null, '1', null, '7', null, '2019-07-17 01:09:19', '2019-07-17 00:59:03');
INSERT INTO `pagina` VALUES ('9', null, '9', 'listado', 'pagos/lista', null, '1', null, '8', null, '2019-07-17 01:09:32', '2019-07-17 01:05:11');
INSERT INTO `pagina` VALUES ('10', null, '10', 'Listado', 'reporte/lista', null, '1', null, '9', null, '2019-07-17 01:09:52', '2019-07-17 01:09:52');

-- ----------------------------
-- Table structure for `pago_cuota`
-- ----------------------------
DROP TABLE IF EXISTS `pago_cuota`;
CREATE TABLE `pago_cuota` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `idTitular` int(11) DEFAULT NULL,
  `idCuota` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  `fechaPago` date DEFAULT NULL,
  `nroRecibo` char(255) DEFAULT NULL,
  `anioGestion` char(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPago`),
  KEY `titular_pago_cuota` (`idTitular`),
  KEY `cuota_pago_cuota` (`idCuota`),
  CONSTRAINT `cuota_pago_cuota` FOREIGN KEY (`idCuota`) REFERENCES `cuota` (`idCuota`),
  CONSTRAINT `titular_pago_cuota` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pago_cuota
-- ----------------------------

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `persona`
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellidoPaterno` varchar(255) DEFAULT NULL,
  `apellidoMaterno` varchar(255) DEFAULT NULL,
  `fechaNacimiento` datetime DEFAULT NULL,
  `dni` char(255) DEFAULT NULL,
  `sexo` char(255) DEFAULT NULL,
  `idInstruccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persona
-- ----------------------------

-- ----------------------------
-- Table structure for `reunion`
-- ----------------------------
DROP TABLE IF EXISTS `reunion`;
CREATE TABLE `reunion` (
  `idReunion` int(11) NOT NULL AUTO_INCREMENT,
  `idTipoReunion` int(11) DEFAULT NULL,
  `nomReunion` varchar(255) DEFAULT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `horaInicio` datetime DEFAULT NULL,
  `horaFin` datetime DEFAULT NULL,
  `multa` decimal(10,0) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReunion`),
  KEY `usuario_reunion` (`idUsuario`),
  CONSTRAINT `usuario_reunion` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reunion
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'Administrator', '2019-07-05 01:14:11', '2019-07-05 01:14:11');
INSERT INTO `roles` VALUES ('2', 'user', 'User', '2019-07-05 01:14:11', '2019-07-05 01:14:11');
INSERT INTO `roles` VALUES ('3', 'editor', 'Editor', '2019-07-05 01:14:11', '2019-07-05 01:14:11');

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(10) unsigned NOT NULL,
  `user_id` bigint(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkuser` (`user_id`) USING BTREE,
  KEY `fkroles` (`role_id`) USING BTREE,
  CONSTRAINT `fkuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fkroles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '2', '1', '2019-07-05 01:16:00', '2019-07-05 01:16:00');

-- ----------------------------
-- Table structure for `subtitular`
-- ----------------------------
DROP TABLE IF EXISTS `subtitular`;
CREATE TABLE `subtitular` (
  `idSubtitular` int(11) NOT NULL AUTO_INCREMENT,
  `idTitular` int(11) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idUbigeo` int(11) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `idCivil` int(11) DEFAULT NULL,
  `idRelacion` int(11) DEFAULT NULL,
  `telefono` char(255) DEFAULT NULL,
  PRIMARY KEY (`idSubtitular`),
  KEY `persona_subtitular` (`idPersona`),
  KEY `ubigeo_subtitular` (`idUbigeo`),
  KEY `titular` (`idTitular`),
  CONSTRAINT `titular` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`),
  CONSTRAINT `persona_subtitular` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `ubigeo_subtitular` FOREIGN KEY (`idUbigeo`) REFERENCES `ubigeo` (`idUbigeo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subtitular
-- ----------------------------

-- ----------------------------
-- Table structure for `titular`
-- ----------------------------
DROP TABLE IF EXISTS `titular`;
CREATE TABLE `titular` (
  `idTitular` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) DEFAULT NULL,
  `nroExpediente` int(11) DEFAULT NULL,
  `idCivil` int(11) DEFAULT NULL,
  `idUbigeo` int(11) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `telefonoFijo` char(255) DEFAULT NULL,
  `telefonoCelular` char(255) DEFAULT NULL,
  `aFotografia` varchar(255) DEFAULT NULL,
  `idIngreso` int(11) DEFAULT NULL,
  `estadoSocio` char(255) DEFAULT NULL,
  `anioGestion` int(11) DEFAULT NULL,
  `nroRecibo` char(255) DEFAULT NULL,
  `fechaIngreso` datetime DEFAULT NULL,
  `entregoCarnet` char(255) DEFAULT NULL,
  `codigoTarjeta` char(255) DEFAULT NULL,
  `codigoTarjetero` char(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `aDNI` varchar(255) DEFAULT NULL,
  `aExpediente` varchar(255) DEFAULT NULL,
  `aCartaRenuncia` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idTitular`),
  KEY `FK_Persona` (`idPersona`),
  KEY `ubigeo_titular` (`idUbigeo`),
  KEY `usuario_titular` (`idUsuario`),
  CONSTRAINT `usuario_titular` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  CONSTRAINT `FK_Persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `ubigeo_titular` FOREIGN KEY (`idUbigeo`) REFERENCES `ubigeo` (`idUbigeo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of titular
-- ----------------------------

-- ----------------------------
-- Table structure for `ubigeo`
-- ----------------------------
DROP TABLE IF EXISTS `ubigeo`;
CREATE TABLE `ubigeo` (
  `idUbigeo` int(11) NOT NULL AUTO_INCREMENT,
  `ubigeo` char(255) DEFAULT NULL,
  `distrito` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUbigeo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ubigeo
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Junior', 'zkated@gmail.com', null, '$2y$10$tGXNkEofrIBARimWOo/s5.UBYnyPv8n5wjlMZRdHKgLcN3jbk4k8a', null, '2019-07-05 01:16:00', '2019-07-05 01:16:00');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` int(11) DEFAULT NULL,
  `nombreUsuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `idCargo` int(11) DEFAULT NULL,
  `anioGestion` char(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `persona_usuario` (`idPersona`),
  CONSTRAINT `persona_usuario` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
