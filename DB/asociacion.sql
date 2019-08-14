/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : asco

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-08-12 23:11:25
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
  CONSTRAINT `titular_asistencia` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`),
  CONSTRAINT `usuario_asistencia` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
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
  `motivo` varchar(100) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  PRIMARY KEY (`idCuota`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cuota
-- ----------------------------

-- ----------------------------
-- Table structure for `departamento`
-- ----------------------------
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of departamento
-- ----------------------------
INSERT INTO `departamento` VALUES ('1', 'AMAZONAS', '1');
INSERT INTO `departamento` VALUES ('2', 'ANCASH', '1');
INSERT INTO `departamento` VALUES ('3', 'APURIMAC', '1');
INSERT INTO `departamento` VALUES ('4', 'AREQUIPA', '1');
INSERT INTO `departamento` VALUES ('5', 'AYACUCHO', '1');
INSERT INTO `departamento` VALUES ('6', 'CAJAMARCA', '1');
INSERT INTO `departamento` VALUES ('7', 'CUSCO', '1');
INSERT INTO `departamento` VALUES ('8', 'HUANCAVELICA', '1');
INSERT INTO `departamento` VALUES ('9', 'HUANUCO', '1');
INSERT INTO `departamento` VALUES ('10', 'ICA', '1');
INSERT INTO `departamento` VALUES ('11', 'JUNIN', '1');
INSERT INTO `departamento` VALUES ('12', 'LA LIBERTAD', '1');
INSERT INTO `departamento` VALUES ('13', 'LAMBAYEQUE', '1');
INSERT INTO `departamento` VALUES ('14', 'LIMA', '1');
INSERT INTO `departamento` VALUES ('15', 'LORETO', '1');
INSERT INTO `departamento` VALUES ('16', 'MADRE DE DIOS', '1');
INSERT INTO `departamento` VALUES ('17', 'MOQUEGUA', '1');
INSERT INTO `departamento` VALUES ('18', 'PASCO', '1');
INSERT INTO `departamento` VALUES ('19', 'PIURA', '1');
INSERT INTO `departamento` VALUES ('20', 'PUNO', '1');
INSERT INTO `departamento` VALUES ('21', 'SAN MARTIN', '1');
INSERT INTO `departamento` VALUES ('22', 'TACNA', '1');
INSERT INTO `departamento` VALUES ('23', 'TUMBES', '1');
INSERT INTO `departamento` VALUES ('24', 'CALLAO', '1');
INSERT INTO `departamento` VALUES ('25', 'UCAYALI', '1');
INSERT INTO `departamento` VALUES ('99', 'SIN INFORMACION', '1');

-- ----------------------------
-- Table structure for `detalle_cuota`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_cuota`;
CREATE TABLE `detalle_cuota` (
  `idCuotaDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idCuota` int(11) DEFAULT NULL,
  `idMes` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCuotaDetalle`),
  KEY `detalle_cuota` (`idCuota`),
  KEY `usuario_decouota` (`idUsuario`),
  CONSTRAINT `detalle_cuota` FOREIGN KEY (`idCuota`) REFERENCES `cuota` (`idCuota`),
  CONSTRAINT `usuario_decouota` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_cuota
-- ----------------------------

-- ----------------------------
-- Table structure for `detalle_reunion`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_reunion`;
CREATE TABLE `detalle_reunion` (
  `idDetalleReunion` int(11) NOT NULL AUTO_INCREMENT,
  `idReunion` int(11) DEFAULT NULL,
  `multa` decimal(10,2) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetalleReunion`),
  KEY `fk` (`idReunion`),
  KEY `det` (`idDetalleReunion`),
  KEY `usuario_detallereu` (`idUsuario`),
  CONSTRAINT `fkdetreuni` FOREIGN KEY (`idReunion`) REFERENCES `reunion` (`idReunion`),
  CONSTRAINT `usuario_detallereu` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_reunion
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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

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
INSERT INTO `diccionario` VALUES ('71', '14', '1', 'LOMAS', 'idGrupo');
INSERT INTO `diccionario` VALUES ('72', '14', '2', 'VENCEDORES', 'idGrupo');
INSERT INTO `diccionario` VALUES ('73', '14', '3', 'VEGONIAS', 'idGrupo');
INSERT INTO `diccionario` VALUES ('74', '14', '4', 'ROSALES', 'idGrupo');
INSERT INTO `diccionario` VALUES ('75', '14', '5', 'EDEN', 'idGrupo');

-- ----------------------------
-- Table structure for `distrito`
-- ----------------------------
DROP TABLE IF EXISTS `distrito`;
CREATE TABLE `distrito` (
  `distID` int(11) NOT NULL AUTO_INCREMENT,
  `provId` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`distID`),
  KEY `cst_prov_dist` (`provId`) USING BTREE,
  CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`provId`) REFERENCES `provincia` (`provID`)
) ENGINE=InnoDB AUTO_INCREMENT=1832 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of distrito
-- ----------------------------
INSERT INTO `distrito` VALUES ('1', '1', 'CHACHAPOYAS', '1');
INSERT INTO `distrito` VALUES ('2', '1', 'ASUNCION', '1');
INSERT INTO `distrito` VALUES ('3', '1', 'BALSAS', '1');
INSERT INTO `distrito` VALUES ('4', '1', 'CHETO', '1');
INSERT INTO `distrito` VALUES ('5', '1', 'CHILIQUIN', '1');
INSERT INTO `distrito` VALUES ('6', '1', 'CHUQUIBAMBA', '1');
INSERT INTO `distrito` VALUES ('7', '1', 'GRANADA', '1');
INSERT INTO `distrito` VALUES ('8', '1', 'HUANCAS', '1');
INSERT INTO `distrito` VALUES ('9', '1', 'LA JALCA', '1');
INSERT INTO `distrito` VALUES ('10', '1', 'LEIMEBAMBA', '1');
INSERT INTO `distrito` VALUES ('11', '1', 'LEVANTO', '1');
INSERT INTO `distrito` VALUES ('12', '1', 'MAGDALENA', '1');
INSERT INTO `distrito` VALUES ('13', '1', 'MARISCAL CASTILLA', '1');
INSERT INTO `distrito` VALUES ('14', '1', 'MOLINOPAMPA', '1');
INSERT INTO `distrito` VALUES ('15', '1', 'MONTEVIDEO', '1');
INSERT INTO `distrito` VALUES ('16', '1', 'OLLEROS', '1');
INSERT INTO `distrito` VALUES ('17', '1', 'QUINJALCA', '1');
INSERT INTO `distrito` VALUES ('18', '1', 'SAN FRANCISCO DE DAGUAS', '1');
INSERT INTO `distrito` VALUES ('19', '1', 'SAN ISIDRO DE MAINO', '1');
INSERT INTO `distrito` VALUES ('20', '1', 'SOLOCO', '1');
INSERT INTO `distrito` VALUES ('21', '1', 'SONCHE', '1');
INSERT INTO `distrito` VALUES ('22', '2', 'LA PECA', '1');
INSERT INTO `distrito` VALUES ('23', '2', 'ARAMANGO', '1');
INSERT INTO `distrito` VALUES ('24', '2', 'COPALLIN', '1');
INSERT INTO `distrito` VALUES ('25', '2', 'EL PARCO', '1');
INSERT INTO `distrito` VALUES ('26', '2', 'IMAZA', '1');
INSERT INTO `distrito` VALUES ('27', '3', 'JUMBILLA', '1');
INSERT INTO `distrito` VALUES ('28', '3', 'CHISQUILLA', '1');
INSERT INTO `distrito` VALUES ('29', '3', 'CHURUJA', '1');
INSERT INTO `distrito` VALUES ('30', '3', 'COROSHA', '1');
INSERT INTO `distrito` VALUES ('31', '3', 'CUISPES', '1');
INSERT INTO `distrito` VALUES ('32', '3', 'FLORIDA', '1');
INSERT INTO `distrito` VALUES ('33', '3', 'JAZAN', '1');
INSERT INTO `distrito` VALUES ('34', '3', 'RECTA', '1');
INSERT INTO `distrito` VALUES ('35', '3', 'SAN CARLOS', '1');
INSERT INTO `distrito` VALUES ('36', '3', 'SHIPASBAMBA', '1');
INSERT INTO `distrito` VALUES ('37', '3', 'VALERA', '1');
INSERT INTO `distrito` VALUES ('38', '3', 'YAMBRASBAMBA', '1');
INSERT INTO `distrito` VALUES ('39', '4', 'NIEVA', '1');
INSERT INTO `distrito` VALUES ('40', '4', 'EL CENEPA', '1');
INSERT INTO `distrito` VALUES ('41', '4', 'RIO SANTIAGO', '1');
INSERT INTO `distrito` VALUES ('42', '5', 'LAMUD', '1');
INSERT INTO `distrito` VALUES ('43', '5', 'CAMPORREDONDO', '1');
INSERT INTO `distrito` VALUES ('44', '5', 'COCABAMBA', '1');
INSERT INTO `distrito` VALUES ('45', '5', 'COLCAMAR', '1');
INSERT INTO `distrito` VALUES ('46', '5', 'CONILA', '1');
INSERT INTO `distrito` VALUES ('47', '5', 'INGUILPATA', '1');
INSERT INTO `distrito` VALUES ('48', '5', 'LONGUITA', '1');
INSERT INTO `distrito` VALUES ('49', '5', 'LONYA CHICO', '1');
INSERT INTO `distrito` VALUES ('50', '5', 'LUYA', '1');
INSERT INTO `distrito` VALUES ('51', '5', 'LUYA VIEJO', '1');
INSERT INTO `distrito` VALUES ('52', '5', 'MARIA', '1');
INSERT INTO `distrito` VALUES ('53', '5', 'OCALLI', '1');
INSERT INTO `distrito` VALUES ('54', '5', 'OCUMAL', '1');
INSERT INTO `distrito` VALUES ('55', '5', 'PISUQUIA', '1');
INSERT INTO `distrito` VALUES ('56', '5', 'PROVIDENCIA', '1');
INSERT INTO `distrito` VALUES ('57', '5', 'SAN CRISTOBAL', '1');
INSERT INTO `distrito` VALUES ('58', '5', 'SAN FRANCISCO DEL YESO', '1');
INSERT INTO `distrito` VALUES ('59', '5', 'SAN JERONIMO', '1');
INSERT INTO `distrito` VALUES ('60', '5', 'SAN JUAN DE LOPECANCHA', '1');
INSERT INTO `distrito` VALUES ('61', '5', 'SANTA CATALINA', '1');
INSERT INTO `distrito` VALUES ('62', '5', 'SANTO TOMAS', '1');
INSERT INTO `distrito` VALUES ('63', '5', 'TINGO', '1');
INSERT INTO `distrito` VALUES ('64', '5', 'TRITA', '1');
INSERT INTO `distrito` VALUES ('65', '6', 'SAN NICOLAS', '1');
INSERT INTO `distrito` VALUES ('66', '6', 'CHIRIMOTO', '1');
INSERT INTO `distrito` VALUES ('67', '6', 'COCHAMAL', '1');
INSERT INTO `distrito` VALUES ('68', '6', 'HUAMBO', '1');
INSERT INTO `distrito` VALUES ('69', '6', 'LIMABAMBA', '1');
INSERT INTO `distrito` VALUES ('70', '6', 'LONGAR', '1');
INSERT INTO `distrito` VALUES ('71', '6', 'MARISCAL BENAVIDES', '1');
INSERT INTO `distrito` VALUES ('72', '6', 'MILPUC', '1');
INSERT INTO `distrito` VALUES ('73', '6', 'OMIA', '1');
INSERT INTO `distrito` VALUES ('74', '6', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('75', '6', 'TOTORA', '1');
INSERT INTO `distrito` VALUES ('76', '6', 'VISTA ALEGRE', '1');
INSERT INTO `distrito` VALUES ('77', '7', 'BAGUA GRANDE', '1');
INSERT INTO `distrito` VALUES ('78', '7', 'CAJARURO', '1');
INSERT INTO `distrito` VALUES ('79', '7', 'CUMBA', '1');
INSERT INTO `distrito` VALUES ('80', '7', 'EL MILAGRO', '1');
INSERT INTO `distrito` VALUES ('81', '7', 'JAMALCA', '1');
INSERT INTO `distrito` VALUES ('82', '7', 'LONYA GRANDE', '1');
INSERT INTO `distrito` VALUES ('83', '7', 'YAMON', '1');
INSERT INTO `distrito` VALUES ('84', '8', 'HUARAZ', '1');
INSERT INTO `distrito` VALUES ('85', '8', 'COCHABAMBA', '1');
INSERT INTO `distrito` VALUES ('86', '8', 'COLCABAMBA', '1');
INSERT INTO `distrito` VALUES ('87', '8', 'HUANCHAY', '1');
INSERT INTO `distrito` VALUES ('88', '8', 'INDEPENDENCIA', '1');
INSERT INTO `distrito` VALUES ('89', '8', 'JANGAS', '1');
INSERT INTO `distrito` VALUES ('90', '8', 'LA LIBERTAD', '1');
INSERT INTO `distrito` VALUES ('91', '8', 'OLLEROS', '1');
INSERT INTO `distrito` VALUES ('92', '8', 'PAMPAS', '1');
INSERT INTO `distrito` VALUES ('93', '8', 'PARIACOTO', '1');
INSERT INTO `distrito` VALUES ('94', '8', 'PIRA', '1');
INSERT INTO `distrito` VALUES ('95', '8', 'TARICA', '1');
INSERT INTO `distrito` VALUES ('96', '9', 'AIJA', '1');
INSERT INTO `distrito` VALUES ('97', '9', 'CORIS', '1');
INSERT INTO `distrito` VALUES ('98', '9', 'HUACLLAN', '1');
INSERT INTO `distrito` VALUES ('99', '9', 'LA MERCED', '1');
INSERT INTO `distrito` VALUES ('100', '9', 'SUCCHA', '1');
INSERT INTO `distrito` VALUES ('101', '10', 'LLAMELLIN', '1');
INSERT INTO `distrito` VALUES ('102', '10', 'ACZO', '1');
INSERT INTO `distrito` VALUES ('103', '10', 'CHACCHO', '1');
INSERT INTO `distrito` VALUES ('104', '10', 'CHINGAS', '1');
INSERT INTO `distrito` VALUES ('105', '10', 'MIRGAS', '1');
INSERT INTO `distrito` VALUES ('106', '10', 'SAN JUAN DE RONTOY', '1');
INSERT INTO `distrito` VALUES ('107', '11', 'CHACAS', '1');
INSERT INTO `distrito` VALUES ('108', '11', 'ACOCHACA', '1');
INSERT INTO `distrito` VALUES ('109', '12', 'CHIQUIAN', '1');
INSERT INTO `distrito` VALUES ('110', '12', 'ABELARDO PARDO LEZAMETA', '1');
INSERT INTO `distrito` VALUES ('111', '12', 'ANTONIO RAYMONDI', '1');
INSERT INTO `distrito` VALUES ('112', '12', 'AQUIA', '1');
INSERT INTO `distrito` VALUES ('113', '12', 'CAJACAY', '1');
INSERT INTO `distrito` VALUES ('114', '12', 'CANIS', '1');
INSERT INTO `distrito` VALUES ('115', '12', 'COLQUIOC', '1');
INSERT INTO `distrito` VALUES ('116', '12', 'HUALLANCA', '1');
INSERT INTO `distrito` VALUES ('117', '12', 'HUASTA', '1');
INSERT INTO `distrito` VALUES ('118', '12', 'HUAYLLACAYAN', '1');
INSERT INTO `distrito` VALUES ('119', '12', 'LA PRIMAVERA', '1');
INSERT INTO `distrito` VALUES ('120', '12', 'MANGAS', '1');
INSERT INTO `distrito` VALUES ('121', '12', 'PACLLON', '1');
INSERT INTO `distrito` VALUES ('122', '12', 'SAN MIGUEL DE CORPANQUI', '1');
INSERT INTO `distrito` VALUES ('123', '12', 'TICLLOS', '1');
INSERT INTO `distrito` VALUES ('124', '13', 'CARHUAZ', '1');
INSERT INTO `distrito` VALUES ('125', '13', 'ACOPAMPA', '1');
INSERT INTO `distrito` VALUES ('126', '13', 'AMASHCA', '1');
INSERT INTO `distrito` VALUES ('127', '13', 'ANTA', '1');
INSERT INTO `distrito` VALUES ('128', '13', 'ATAQUERO', '1');
INSERT INTO `distrito` VALUES ('129', '13', 'MARCARA', '1');
INSERT INTO `distrito` VALUES ('130', '13', 'PARIAHUANCA', '1');
INSERT INTO `distrito` VALUES ('131', '13', 'SAN MIGUEL DE ACO', '1');
INSERT INTO `distrito` VALUES ('132', '13', 'SHILLA', '1');
INSERT INTO `distrito` VALUES ('133', '13', 'TINCO', '1');
INSERT INTO `distrito` VALUES ('134', '13', 'YUNGAR', '1');
INSERT INTO `distrito` VALUES ('135', '14', 'SAN LUIS', '1');
INSERT INTO `distrito` VALUES ('136', '14', 'SAN NICOLAS', '1');
INSERT INTO `distrito` VALUES ('137', '14', 'YAUYA', '1');
INSERT INTO `distrito` VALUES ('138', '15', 'CASMA', '1');
INSERT INTO `distrito` VALUES ('139', '15', 'BUENA VISTA ALTA', '1');
INSERT INTO `distrito` VALUES ('140', '15', 'COMANDANTE NOEL', '1');
INSERT INTO `distrito` VALUES ('141', '15', 'YAUTAN', '1');
INSERT INTO `distrito` VALUES ('142', '16', 'CORONGO', '1');
INSERT INTO `distrito` VALUES ('143', '16', 'ACO', '1');
INSERT INTO `distrito` VALUES ('144', '16', 'BAMBAS', '1');
INSERT INTO `distrito` VALUES ('145', '16', 'CUSCA', '1');
INSERT INTO `distrito` VALUES ('146', '16', 'LA PAMPA', '1');
INSERT INTO `distrito` VALUES ('147', '16', 'YANAC', '1');
INSERT INTO `distrito` VALUES ('148', '16', 'YUPAN', '1');
INSERT INTO `distrito` VALUES ('149', '17', 'HUARI', '1');
INSERT INTO `distrito` VALUES ('150', '17', 'ANRA', '1');
INSERT INTO `distrito` VALUES ('151', '17', 'CAJAY', '1');
INSERT INTO `distrito` VALUES ('152', '17', 'CHAVIN DE HUANTAR', '1');
INSERT INTO `distrito` VALUES ('153', '17', 'HUACACHI', '1');
INSERT INTO `distrito` VALUES ('154', '17', 'HUACCHIS', '1');
INSERT INTO `distrito` VALUES ('155', '17', 'HUACHIS', '1');
INSERT INTO `distrito` VALUES ('156', '17', 'HUANTAR', '1');
INSERT INTO `distrito` VALUES ('157', '17', 'MASIN', '1');
INSERT INTO `distrito` VALUES ('158', '17', 'PAUCAS', '1');
INSERT INTO `distrito` VALUES ('159', '17', 'PONTO', '1');
INSERT INTO `distrito` VALUES ('160', '17', 'RAHUAPAMPA', '1');
INSERT INTO `distrito` VALUES ('161', '17', 'RAPAYAN', '1');
INSERT INTO `distrito` VALUES ('162', '17', 'SAN MARCOS', '1');
INSERT INTO `distrito` VALUES ('163', '17', 'SAN PEDRO DE CHANA', '1');
INSERT INTO `distrito` VALUES ('164', '17', 'UCO', '1');
INSERT INTO `distrito` VALUES ('165', '18', 'HUARMEY', '1');
INSERT INTO `distrito` VALUES ('166', '18', 'COCHAPETI', '1');
INSERT INTO `distrito` VALUES ('167', '18', 'CULEBRAS', '1');
INSERT INTO `distrito` VALUES ('168', '18', 'HUAYAN', '1');
INSERT INTO `distrito` VALUES ('169', '18', 'MALVAS', '1');
INSERT INTO `distrito` VALUES ('170', '19', 'CARAZ', '1');
INSERT INTO `distrito` VALUES ('171', '19', 'HUALLANCA', '1');
INSERT INTO `distrito` VALUES ('172', '19', 'HUATA', '1');
INSERT INTO `distrito` VALUES ('173', '19', 'HUAYLAS', '1');
INSERT INTO `distrito` VALUES ('174', '19', 'MATO', '1');
INSERT INTO `distrito` VALUES ('175', '19', 'PAMPAROMAS', '1');
INSERT INTO `distrito` VALUES ('176', '19', 'PUEBLO LIBRE', '1');
INSERT INTO `distrito` VALUES ('177', '19', 'SANTA CRUZ', '1');
INSERT INTO `distrito` VALUES ('178', '19', 'SANTO TORIBIO', '1');
INSERT INTO `distrito` VALUES ('179', '19', 'YURACMARCA', '1');
INSERT INTO `distrito` VALUES ('180', '20', 'PISCOBAMBA', '1');
INSERT INTO `distrito` VALUES ('181', '20', 'CASCA', '1');
INSERT INTO `distrito` VALUES ('182', '20', 'ELEAZAR GUZMAN BARRON', '1');
INSERT INTO `distrito` VALUES ('183', '20', 'FIDEL OLIVAS ESCUDERO', '1');
INSERT INTO `distrito` VALUES ('184', '20', 'LLAMA', '1');
INSERT INTO `distrito` VALUES ('185', '20', 'LLUMPA', '1');
INSERT INTO `distrito` VALUES ('186', '20', 'LUCMA', '1');
INSERT INTO `distrito` VALUES ('187', '20', 'MUSGA', '1');
INSERT INTO `distrito` VALUES ('188', '21', 'OCROS', '1');
INSERT INTO `distrito` VALUES ('189', '21', 'ACAS', '1');
INSERT INTO `distrito` VALUES ('190', '21', 'CAJAMARQUILLA', '1');
INSERT INTO `distrito` VALUES ('191', '21', 'CARHUAPAMPA', '1');
INSERT INTO `distrito` VALUES ('192', '21', 'COCHAS', '1');
INSERT INTO `distrito` VALUES ('193', '21', 'CONGAS', '1');
INSERT INTO `distrito` VALUES ('194', '21', 'LLIPA', '1');
INSERT INTO `distrito` VALUES ('195', '21', 'SAN CRISTOBAL DE RAJAN', '1');
INSERT INTO `distrito` VALUES ('196', '21', 'SAN PEDRO', '1');
INSERT INTO `distrito` VALUES ('197', '21', 'SANTIAGO DE CHILCAS', '1');
INSERT INTO `distrito` VALUES ('198', '22', 'CABANA', '1');
INSERT INTO `distrito` VALUES ('199', '22', 'BOLOGNESI', '1');
INSERT INTO `distrito` VALUES ('200', '22', 'CONCHUCOS', '1');
INSERT INTO `distrito` VALUES ('201', '22', 'HUACASCHUQUE', '1');
INSERT INTO `distrito` VALUES ('202', '22', 'HUANDOVAL', '1');
INSERT INTO `distrito` VALUES ('203', '22', 'LACABAMBA', '1');
INSERT INTO `distrito` VALUES ('204', '22', 'LLAPO', '1');
INSERT INTO `distrito` VALUES ('205', '22', 'PALLASCA', '1');
INSERT INTO `distrito` VALUES ('206', '22', 'PAMPAS', '1');
INSERT INTO `distrito` VALUES ('207', '22', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('208', '22', 'TAUCA', '1');
INSERT INTO `distrito` VALUES ('209', '23', 'POMABAMBA', '1');
INSERT INTO `distrito` VALUES ('210', '23', 'HUAYLLAN', '1');
INSERT INTO `distrito` VALUES ('211', '23', 'PAROBAMBA', '1');
INSERT INTO `distrito` VALUES ('212', '23', 'QUINUABAMBA', '1');
INSERT INTO `distrito` VALUES ('213', '24', 'RECUAY', '1');
INSERT INTO `distrito` VALUES ('214', '24', 'CATAC', '1');
INSERT INTO `distrito` VALUES ('215', '24', 'COTAPARACO', '1');
INSERT INTO `distrito` VALUES ('216', '24', 'HUAYLLAPAMPA', '1');
INSERT INTO `distrito` VALUES ('217', '24', 'LLACLLIN', '1');
INSERT INTO `distrito` VALUES ('218', '24', 'MARCA', '1');
INSERT INTO `distrito` VALUES ('219', '24', 'PAMPAS CHICO', '1');
INSERT INTO `distrito` VALUES ('220', '24', 'PARARIN', '1');
INSERT INTO `distrito` VALUES ('221', '24', 'TAPACOCHA', '1');
INSERT INTO `distrito` VALUES ('222', '24', 'TICAPAMPA', '1');
INSERT INTO `distrito` VALUES ('223', '25', 'CHIMBOTE', '1');
INSERT INTO `distrito` VALUES ('224', '25', 'CACERES DEL PERU', '1');
INSERT INTO `distrito` VALUES ('225', '25', 'COISHCO', '1');
INSERT INTO `distrito` VALUES ('226', '25', 'MACATE', '1');
INSERT INTO `distrito` VALUES ('227', '25', 'MORO', '1');
INSERT INTO `distrito` VALUES ('228', '25', 'NEPEÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('229', '25', 'SAMANCO', '1');
INSERT INTO `distrito` VALUES ('230', '25', 'SANTA', '1');
INSERT INTO `distrito` VALUES ('231', '25', 'NUEVO CHIMBOTE', '1');
INSERT INTO `distrito` VALUES ('232', '26', 'SIHUAS', '1');
INSERT INTO `distrito` VALUES ('233', '26', 'ACOBAMBA', '1');
INSERT INTO `distrito` VALUES ('234', '26', 'ALFONSO UGARTE', '1');
INSERT INTO `distrito` VALUES ('235', '26', 'CASHAPAMPA', '1');
INSERT INTO `distrito` VALUES ('236', '26', 'CHINGALPO', '1');
INSERT INTO `distrito` VALUES ('237', '26', 'HUAYLLABAMBA', '1');
INSERT INTO `distrito` VALUES ('238', '26', 'QUICHES', '1');
INSERT INTO `distrito` VALUES ('239', '26', 'RAGASH', '1');
INSERT INTO `distrito` VALUES ('240', '26', 'SAN JUAN', '1');
INSERT INTO `distrito` VALUES ('241', '26', 'SICSIBAMBA', '1');
INSERT INTO `distrito` VALUES ('242', '27', 'YUNGAY', '1');
INSERT INTO `distrito` VALUES ('243', '27', 'CASCAPARA', '1');
INSERT INTO `distrito` VALUES ('244', '27', 'MANCOS', '1');
INSERT INTO `distrito` VALUES ('245', '27', 'MATACOTO', '1');
INSERT INTO `distrito` VALUES ('246', '27', 'QUILLO', '1');
INSERT INTO `distrito` VALUES ('247', '27', 'RANRAHIRCA', '1');
INSERT INTO `distrito` VALUES ('248', '27', 'SHUPLUY', '1');
INSERT INTO `distrito` VALUES ('249', '27', 'YANAMA', '1');
INSERT INTO `distrito` VALUES ('250', '28', 'ABANCAY', '1');
INSERT INTO `distrito` VALUES ('251', '28', 'CHACOCHE', '1');
INSERT INTO `distrito` VALUES ('252', '28', 'CIRCA', '1');
INSERT INTO `distrito` VALUES ('253', '28', 'CURAHUASI', '1');
INSERT INTO `distrito` VALUES ('254', '28', 'HUANIPACA', '1');
INSERT INTO `distrito` VALUES ('255', '28', 'LAMBRAMA', '1');
INSERT INTO `distrito` VALUES ('256', '28', 'PICHIRHUA', '1');
INSERT INTO `distrito` VALUES ('257', '28', 'SAN PEDRO DE CACHORA', '1');
INSERT INTO `distrito` VALUES ('258', '28', 'TAMBURCO', '1');
INSERT INTO `distrito` VALUES ('259', '29', 'ANDAHUAYLAS', '1');
INSERT INTO `distrito` VALUES ('260', '29', 'ANDARAPA', '1');
INSERT INTO `distrito` VALUES ('261', '29', 'CHIARA', '1');
INSERT INTO `distrito` VALUES ('262', '29', 'HUANCARAMA', '1');
INSERT INTO `distrito` VALUES ('263', '29', 'HUANCARAY', '1');
INSERT INTO `distrito` VALUES ('264', '29', 'HUAYANA', '1');
INSERT INTO `distrito` VALUES ('265', '29', 'KISHUARA', '1');
INSERT INTO `distrito` VALUES ('266', '29', 'PACOBAMBA', '1');
INSERT INTO `distrito` VALUES ('267', '29', 'PACUCHA', '1');
INSERT INTO `distrito` VALUES ('268', '29', 'PAMPACHIRI', '1');
INSERT INTO `distrito` VALUES ('269', '29', 'POMACOCHA', '1');
INSERT INTO `distrito` VALUES ('270', '29', 'SAN ANTONIO DE CACHI', '1');
INSERT INTO `distrito` VALUES ('271', '29', 'SAN JERONIMO', '1');
INSERT INTO `distrito` VALUES ('272', '29', 'SAN MIGUEL DE CHACCRAMPA', '1');
INSERT INTO `distrito` VALUES ('273', '29', 'SANTA MARIA DE CHICMO', '1');
INSERT INTO `distrito` VALUES ('274', '29', 'TALAVERA', '1');
INSERT INTO `distrito` VALUES ('275', '29', 'TUMAY HUARACA', '1');
INSERT INTO `distrito` VALUES ('276', '29', 'TURPO', '1');
INSERT INTO `distrito` VALUES ('277', '29', 'KAQUIABAMBA', '1');
INSERT INTO `distrito` VALUES ('278', '30', 'ANTABAMBA', '1');
INSERT INTO `distrito` VALUES ('279', '30', 'EL ORO', '1');
INSERT INTO `distrito` VALUES ('280', '30', 'HUAQUIRCA', '1');
INSERT INTO `distrito` VALUES ('281', '30', 'JUAN ESPINOZA MEDRANO', '1');
INSERT INTO `distrito` VALUES ('282', '30', 'OROPESA', '1');
INSERT INTO `distrito` VALUES ('283', '30', 'PACHACONAS', '1');
INSERT INTO `distrito` VALUES ('284', '30', 'SABAINO', '1');
INSERT INTO `distrito` VALUES ('285', '31', 'CHALHUANCA', '1');
INSERT INTO `distrito` VALUES ('286', '31', 'CAPAYA', '1');
INSERT INTO `distrito` VALUES ('287', '31', 'CARAYBAMBA', '1');
INSERT INTO `distrito` VALUES ('288', '31', 'CHAPIMARCA', '1');
INSERT INTO `distrito` VALUES ('289', '31', 'COLCABAMBA', '1');
INSERT INTO `distrito` VALUES ('290', '31', 'COTARUSE', '1');
INSERT INTO `distrito` VALUES ('291', '31', 'HUAYLLO', '1');
INSERT INTO `distrito` VALUES ('292', '31', 'JUSTO APU SAHUARAURA', '1');
INSERT INTO `distrito` VALUES ('293', '31', 'LUCRE', '1');
INSERT INTO `distrito` VALUES ('294', '31', 'POCOHUANCA', '1');
INSERT INTO `distrito` VALUES ('295', '31', 'SAN JUAN DE CHACÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('296', '31', 'SAÃƒÆ’Ã¢â‚¬ËœAYCA', '1');
INSERT INTO `distrito` VALUES ('297', '31', 'SORAYA', '1');
INSERT INTO `distrito` VALUES ('298', '31', 'TAPAIRIHUA', '1');
INSERT INTO `distrito` VALUES ('299', '31', 'TINTAY', '1');
INSERT INTO `distrito` VALUES ('300', '31', 'TORAYA', '1');
INSERT INTO `distrito` VALUES ('301', '31', 'YANACA', '1');
INSERT INTO `distrito` VALUES ('302', '32', 'TAMBOBAMBA', '1');
INSERT INTO `distrito` VALUES ('303', '32', 'COTABAMBAS', '1');
INSERT INTO `distrito` VALUES ('304', '32', 'COYLLURQUI', '1');
INSERT INTO `distrito` VALUES ('305', '32', 'HAQUIRA', '1');
INSERT INTO `distrito` VALUES ('306', '32', 'MARA', '1');
INSERT INTO `distrito` VALUES ('307', '32', 'CHALLHUAHUACHO', '1');
INSERT INTO `distrito` VALUES ('308', '33', 'CHINCHEROS', '1');
INSERT INTO `distrito` VALUES ('309', '33', 'ANCO-HUALLO', '1');
INSERT INTO `distrito` VALUES ('310', '33', 'COCHARCAS', '1');
INSERT INTO `distrito` VALUES ('311', '33', 'HUACCANA', '1');
INSERT INTO `distrito` VALUES ('312', '33', 'OCOBAMBA', '1');
INSERT INTO `distrito` VALUES ('313', '33', 'ONGOY', '1');
INSERT INTO `distrito` VALUES ('314', '33', 'URANMARCA', '1');
INSERT INTO `distrito` VALUES ('315', '33', 'RANRACANCHA', '1');
INSERT INTO `distrito` VALUES ('316', '34', 'CHUQUIBAMBILLA', '1');
INSERT INTO `distrito` VALUES ('317', '34', 'CURPAHUASI', '1');
INSERT INTO `distrito` VALUES ('318', '34', 'GAMARRA', '1');
INSERT INTO `distrito` VALUES ('319', '34', 'HUAYLLATI', '1');
INSERT INTO `distrito` VALUES ('320', '34', 'MAMARA', '1');
INSERT INTO `distrito` VALUES ('321', '34', 'MICAELA BASTIDAS', '1');
INSERT INTO `distrito` VALUES ('322', '34', 'PATAYPAMPA', '1');
INSERT INTO `distrito` VALUES ('323', '34', 'PROGRESO', '1');
INSERT INTO `distrito` VALUES ('324', '34', 'SAN ANTONIO', '1');
INSERT INTO `distrito` VALUES ('325', '34', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('326', '34', 'TURPAY', '1');
INSERT INTO `distrito` VALUES ('327', '34', 'VILCABAMBA', '1');
INSERT INTO `distrito` VALUES ('328', '34', 'VIRUNDO', '1');
INSERT INTO `distrito` VALUES ('329', '34', 'CURASCO', '1');
INSERT INTO `distrito` VALUES ('330', '35', 'AREQUIPA', '1');
INSERT INTO `distrito` VALUES ('331', '35', 'ALTO SELVA ALEGRE', '1');
INSERT INTO `distrito` VALUES ('332', '35', 'CAYMA', '1');
INSERT INTO `distrito` VALUES ('333', '35', 'CERRO COLORADO', '1');
INSERT INTO `distrito` VALUES ('334', '35', 'CHARACATO', '1');
INSERT INTO `distrito` VALUES ('335', '35', 'CHIGUATA', '1');
INSERT INTO `distrito` VALUES ('336', '35', 'JACOBO HUNTER', '1');
INSERT INTO `distrito` VALUES ('337', '35', 'LA JOYA', '1');
INSERT INTO `distrito` VALUES ('338', '35', 'MARIANO MELGAR', '1');
INSERT INTO `distrito` VALUES ('339', '35', 'MIRAFLORES', '1');
INSERT INTO `distrito` VALUES ('340', '35', 'MOLLEBAYA', '1');
INSERT INTO `distrito` VALUES ('341', '35', 'PAUCARPATA', '1');
INSERT INTO `distrito` VALUES ('342', '35', 'POCSI', '1');
INSERT INTO `distrito` VALUES ('343', '35', 'POLOBAYA', '1');
INSERT INTO `distrito` VALUES ('344', '35', 'QUEQUEÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('345', '35', 'SABANDIA', '1');
INSERT INTO `distrito` VALUES ('346', '35', 'SACHACA', '1');
INSERT INTO `distrito` VALUES ('347', '35', 'SAN JUAN DE SIGUAS', '1');
INSERT INTO `distrito` VALUES ('348', '35', 'SAN JUAN DE TARUCANI', '1');
INSERT INTO `distrito` VALUES ('349', '35', 'SANTA ISABEL DE SIGUAS', '1');
INSERT INTO `distrito` VALUES ('350', '35', 'SANTA RITA DE SIGUAS', '1');
INSERT INTO `distrito` VALUES ('351', '35', 'SOCABAYA', '1');
INSERT INTO `distrito` VALUES ('352', '35', 'TIABAYA', '1');
INSERT INTO `distrito` VALUES ('353', '35', 'UCHUMAYO', '1');
INSERT INTO `distrito` VALUES ('354', '35', 'VITOR', '1');
INSERT INTO `distrito` VALUES ('355', '35', 'YANAHUARA', '1');
INSERT INTO `distrito` VALUES ('356', '35', 'YARABAMBA', '1');
INSERT INTO `distrito` VALUES ('357', '35', 'YURA', '1');
INSERT INTO `distrito` VALUES ('358', '35', 'JOSE LUIS BUSTAMANTE Y RIVERO', '1');
INSERT INTO `distrito` VALUES ('359', '36', 'CAMANA', '1');
INSERT INTO `distrito` VALUES ('360', '36', 'JOSE MARIA QUIMPER', '1');
INSERT INTO `distrito` VALUES ('361', '36', 'MARIANO NICOLAS VALCARCEL', '1');
INSERT INTO `distrito` VALUES ('362', '36', 'MARISCAL CACERES', '1');
INSERT INTO `distrito` VALUES ('363', '36', 'NICOLAS DE PIEROLA', '1');
INSERT INTO `distrito` VALUES ('364', '36', 'OCOÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('365', '36', 'QUILCA', '1');
INSERT INTO `distrito` VALUES ('366', '36', 'SAMUEL PASTOR', '1');
INSERT INTO `distrito` VALUES ('367', '37', 'CARAVELI', '1');
INSERT INTO `distrito` VALUES ('368', '37', 'ACARI', '1');
INSERT INTO `distrito` VALUES ('369', '37', 'ATICO', '1');
INSERT INTO `distrito` VALUES ('370', '37', 'ATIQUIPA', '1');
INSERT INTO `distrito` VALUES ('371', '37', 'BELLA UNION', '1');
INSERT INTO `distrito` VALUES ('372', '37', 'CAHUACHO', '1');
INSERT INTO `distrito` VALUES ('373', '37', 'CHALA', '1');
INSERT INTO `distrito` VALUES ('374', '37', 'CHAPARRA', '1');
INSERT INTO `distrito` VALUES ('375', '37', 'HUANUHUANU', '1');
INSERT INTO `distrito` VALUES ('376', '37', 'JAQUI', '1');
INSERT INTO `distrito` VALUES ('377', '37', 'LOMAS', '1');
INSERT INTO `distrito` VALUES ('378', '37', 'QUICACHA', '1');
INSERT INTO `distrito` VALUES ('379', '37', 'YAUCA', '1');
INSERT INTO `distrito` VALUES ('380', '38', 'APLAO', '1');
INSERT INTO `distrito` VALUES ('381', '38', 'ANDAGUA', '1');
INSERT INTO `distrito` VALUES ('382', '38', 'AYO', '1');
INSERT INTO `distrito` VALUES ('383', '38', 'CHACHAS', '1');
INSERT INTO `distrito` VALUES ('384', '38', 'CHILCAYMARCA', '1');
INSERT INTO `distrito` VALUES ('385', '38', 'CHOCO', '1');
INSERT INTO `distrito` VALUES ('386', '38', 'HUANCARQUI', '1');
INSERT INTO `distrito` VALUES ('387', '38', 'MACHAGUAY', '1');
INSERT INTO `distrito` VALUES ('388', '38', 'ORCOPAMPA', '1');
INSERT INTO `distrito` VALUES ('389', '38', 'PAMPACOLCA', '1');
INSERT INTO `distrito` VALUES ('390', '38', 'TIPAN', '1');
INSERT INTO `distrito` VALUES ('391', '38', 'UÃƒÆ’Ã¢â‚¬ËœON', '1');
INSERT INTO `distrito` VALUES ('392', '38', 'URACA', '1');
INSERT INTO `distrito` VALUES ('393', '38', 'VIRACO', '1');
INSERT INTO `distrito` VALUES ('394', '39', 'CHIVAY', '1');
INSERT INTO `distrito` VALUES ('395', '39', 'ACHOMA', '1');
INSERT INTO `distrito` VALUES ('396', '39', 'CABANACONDE', '1');
INSERT INTO `distrito` VALUES ('397', '39', 'CALLALLI', '1');
INSERT INTO `distrito` VALUES ('398', '39', 'CAYLLOMA', '1');
INSERT INTO `distrito` VALUES ('399', '39', 'COPORAQUE', '1');
INSERT INTO `distrito` VALUES ('400', '39', 'HUAMBO', '1');
INSERT INTO `distrito` VALUES ('401', '39', 'HUANCA', '1');
INSERT INTO `distrito` VALUES ('402', '39', 'ICHUPAMPA', '1');
INSERT INTO `distrito` VALUES ('403', '39', 'LARI', '1');
INSERT INTO `distrito` VALUES ('404', '39', 'LLUTA', '1');
INSERT INTO `distrito` VALUES ('405', '39', 'MACA', '1');
INSERT INTO `distrito` VALUES ('406', '39', 'MADRIGAL', '1');
INSERT INTO `distrito` VALUES ('407', '39', 'SAN ANTONIO DE CHUCA', '1');
INSERT INTO `distrito` VALUES ('408', '39', 'SIBAYO', '1');
INSERT INTO `distrito` VALUES ('409', '39', 'TAPAY', '1');
INSERT INTO `distrito` VALUES ('410', '39', 'TISCO', '1');
INSERT INTO `distrito` VALUES ('411', '39', 'TUTI', '1');
INSERT INTO `distrito` VALUES ('412', '39', 'YANQUE', '1');
INSERT INTO `distrito` VALUES ('413', '39', 'MAJES', '1');
INSERT INTO `distrito` VALUES ('414', '40', 'CHUQUIBAMBA', '1');
INSERT INTO `distrito` VALUES ('415', '40', 'ANDARAY', '1');
INSERT INTO `distrito` VALUES ('416', '40', 'CAYARANI', '1');
INSERT INTO `distrito` VALUES ('417', '40', 'CHICHAS', '1');
INSERT INTO `distrito` VALUES ('418', '40', 'IRAY', '1');
INSERT INTO `distrito` VALUES ('419', '40', 'RIO GRANDE', '1');
INSERT INTO `distrito` VALUES ('420', '40', 'SALAMANCA', '1');
INSERT INTO `distrito` VALUES ('421', '40', 'YANAQUIHUA', '1');
INSERT INTO `distrito` VALUES ('422', '41', 'MOLLENDO', '1');
INSERT INTO `distrito` VALUES ('423', '41', 'COCACHACRA', '1');
INSERT INTO `distrito` VALUES ('424', '41', 'DEAN VALDIVIA', '1');
INSERT INTO `distrito` VALUES ('425', '41', 'ISLAY', '1');
INSERT INTO `distrito` VALUES ('426', '41', 'MEJIA', '1');
INSERT INTO `distrito` VALUES ('427', '41', 'PUNTA DE BOMBON', '1');
INSERT INTO `distrito` VALUES ('428', '42', 'COTAHUASI', '1');
INSERT INTO `distrito` VALUES ('429', '42', 'ALCA', '1');
INSERT INTO `distrito` VALUES ('430', '42', 'CHARCANA', '1');
INSERT INTO `distrito` VALUES ('431', '42', 'HUAYNACOTAS', '1');
INSERT INTO `distrito` VALUES ('432', '42', 'PAMPAMARCA', '1');
INSERT INTO `distrito` VALUES ('433', '42', 'PUYCA', '1');
INSERT INTO `distrito` VALUES ('434', '42', 'QUECHUALLA', '1');
INSERT INTO `distrito` VALUES ('435', '42', 'SAYLA', '1');
INSERT INTO `distrito` VALUES ('436', '42', 'TAURIA', '1');
INSERT INTO `distrito` VALUES ('437', '42', 'TOMEPAMPA', '1');
INSERT INTO `distrito` VALUES ('438', '42', 'TORO', '1');
INSERT INTO `distrito` VALUES ('439', '43', 'AYACUCHO', '1');
INSERT INTO `distrito` VALUES ('440', '43', 'ACOCRO', '1');
INSERT INTO `distrito` VALUES ('441', '43', 'ACOS VINCHOS', '1');
INSERT INTO `distrito` VALUES ('442', '43', 'CARMEN ALTO', '1');
INSERT INTO `distrito` VALUES ('443', '43', 'CHIARA', '1');
INSERT INTO `distrito` VALUES ('444', '43', 'OCROS', '1');
INSERT INTO `distrito` VALUES ('445', '43', 'PACAYCASA', '1');
INSERT INTO `distrito` VALUES ('446', '43', 'QUINUA', '1');
INSERT INTO `distrito` VALUES ('447', '43', 'SAN JOSE DE TICLLAS', '1');
INSERT INTO `distrito` VALUES ('448', '43', 'SAN JUAN BAUTISTA', '1');
INSERT INTO `distrito` VALUES ('449', '43', 'SANTIAGO DE PISCHA', '1');
INSERT INTO `distrito` VALUES ('450', '43', 'SOCOS', '1');
INSERT INTO `distrito` VALUES ('451', '43', 'TAMBILLO', '1');
INSERT INTO `distrito` VALUES ('452', '43', 'VINCHOS', '1');
INSERT INTO `distrito` VALUES ('453', '43', 'JESUS NAZARENO', '1');
INSERT INTO `distrito` VALUES ('454', '44', 'CANGALLO', '1');
INSERT INTO `distrito` VALUES ('455', '44', 'CHUSCHI', '1');
INSERT INTO `distrito` VALUES ('456', '44', 'LOS MOROCHUCOS', '1');
INSERT INTO `distrito` VALUES ('457', '44', 'MARIA PARADO DE BELLIDO', '1');
INSERT INTO `distrito` VALUES ('458', '44', 'PARAS', '1');
INSERT INTO `distrito` VALUES ('459', '44', 'TOTOS', '1');
INSERT INTO `distrito` VALUES ('460', '45', 'SANCOS', '1');
INSERT INTO `distrito` VALUES ('461', '45', 'CARAPO', '1');
INSERT INTO `distrito` VALUES ('462', '45', 'SACSAMARCA', '1');
INSERT INTO `distrito` VALUES ('463', '45', 'SANTIAGO DE LUCANAMARCA', '1');
INSERT INTO `distrito` VALUES ('464', '46', 'HUANTA', '1');
INSERT INTO `distrito` VALUES ('465', '46', 'AYAHUANCO', '1');
INSERT INTO `distrito` VALUES ('466', '46', 'HUAMANGUILLA', '1');
INSERT INTO `distrito` VALUES ('467', '46', 'IGUAIN', '1');
INSERT INTO `distrito` VALUES ('468', '46', 'LURICOCHA', '1');
INSERT INTO `distrito` VALUES ('469', '46', 'SANTILLANA', '1');
INSERT INTO `distrito` VALUES ('470', '46', 'SIVIA', '1');
INSERT INTO `distrito` VALUES ('471', '46', 'LLOCHEGUA', '1');
INSERT INTO `distrito` VALUES ('472', '47', 'SAN MIGUEL', '1');
INSERT INTO `distrito` VALUES ('473', '47', 'ANCO', '1');
INSERT INTO `distrito` VALUES ('474', '47', 'AYNA', '1');
INSERT INTO `distrito` VALUES ('475', '47', 'CHILCAS', '1');
INSERT INTO `distrito` VALUES ('476', '47', 'CHUNGUI', '1');
INSERT INTO `distrito` VALUES ('477', '47', 'LUIS CARRANZA', '1');
INSERT INTO `distrito` VALUES ('478', '47', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('479', '47', 'TAMBO', '1');
INSERT INTO `distrito` VALUES ('480', '48', 'PUQUIO', '1');
INSERT INTO `distrito` VALUES ('481', '48', 'AUCARA', '1');
INSERT INTO `distrito` VALUES ('482', '48', 'CABANA', '1');
INSERT INTO `distrito` VALUES ('483', '48', 'CARMEN SALCEDO', '1');
INSERT INTO `distrito` VALUES ('484', '48', 'CHAVIÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('485', '48', 'CHIPAO', '1');
INSERT INTO `distrito` VALUES ('486', '48', 'HUAC-HUAS', '1');
INSERT INTO `distrito` VALUES ('487', '48', 'LARAMATE', '1');
INSERT INTO `distrito` VALUES ('488', '48', 'LEONCIO PRADO', '1');
INSERT INTO `distrito` VALUES ('489', '48', 'LLAUTA', '1');
INSERT INTO `distrito` VALUES ('490', '48', 'LUCANAS', '1');
INSERT INTO `distrito` VALUES ('491', '48', 'OCAÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('492', '48', 'OTOCA', '1');
INSERT INTO `distrito` VALUES ('493', '48', 'SAISA', '1');
INSERT INTO `distrito` VALUES ('494', '48', 'SAN CRISTOBAL', '1');
INSERT INTO `distrito` VALUES ('495', '48', 'SAN JUAN', '1');
INSERT INTO `distrito` VALUES ('496', '48', 'SAN PEDRO', '1');
INSERT INTO `distrito` VALUES ('497', '48', 'SAN PEDRO DE PALCO', '1');
INSERT INTO `distrito` VALUES ('498', '48', 'SANCOS', '1');
INSERT INTO `distrito` VALUES ('499', '48', 'SANTA ANA DE HUAYCAHUACHO', '1');
INSERT INTO `distrito` VALUES ('500', '48', 'SANTA LUCIA', '1');
INSERT INTO `distrito` VALUES ('501', '49', 'CORACORA', '1');
INSERT INTO `distrito` VALUES ('502', '49', 'CHUMPI', '1');
INSERT INTO `distrito` VALUES ('503', '49', 'CORONEL CASTAÃƒÆ’Ã‚?EDA', '1');
INSERT INTO `distrito` VALUES ('504', '49', 'PACAPAUSA', '1');
INSERT INTO `distrito` VALUES ('505', '49', 'PULLO', '1');
INSERT INTO `distrito` VALUES ('506', '49', 'PUYUSCA', '1');
INSERT INTO `distrito` VALUES ('507', '49', 'SAN FRANCISCO DE RAVACAYCO', '1');
INSERT INTO `distrito` VALUES ('508', '49', 'UPAHUACHO', '1');
INSERT INTO `distrito` VALUES ('509', '50', 'PAUSA', '1');
INSERT INTO `distrito` VALUES ('510', '50', 'COLTA', '1');
INSERT INTO `distrito` VALUES ('511', '50', 'CORCULLA', '1');
INSERT INTO `distrito` VALUES ('512', '50', 'LAMPA', '1');
INSERT INTO `distrito` VALUES ('513', '50', 'MARCABAMBA', '1');
INSERT INTO `distrito` VALUES ('514', '50', 'OYOLO', '1');
INSERT INTO `distrito` VALUES ('515', '50', 'PARARCA', '1');
INSERT INTO `distrito` VALUES ('516', '50', 'SAN JAVIER DE ALPABAMBA', '1');
INSERT INTO `distrito` VALUES ('517', '50', 'SAN JOSE DE USHUA', '1');
INSERT INTO `distrito` VALUES ('518', '50', 'SARA SARA', '1');
INSERT INTO `distrito` VALUES ('519', '51', 'QUEROBAMBA', '1');
INSERT INTO `distrito` VALUES ('520', '51', 'BELEN', '1');
INSERT INTO `distrito` VALUES ('521', '51', 'CHALCOS', '1');
INSERT INTO `distrito` VALUES ('522', '51', 'CHILCAYOC', '1');
INSERT INTO `distrito` VALUES ('523', '51', 'HUACAÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('524', '51', 'MORCOLLA', '1');
INSERT INTO `distrito` VALUES ('525', '51', 'PAICO', '1');
INSERT INTO `distrito` VALUES ('526', '51', 'SAN PEDRO DE LARCAY', '1');
INSERT INTO `distrito` VALUES ('527', '51', 'SAN SALVADOR DE QUIJE', '1');
INSERT INTO `distrito` VALUES ('528', '51', 'SANTIAGO DE PAUCARAY', '1');
INSERT INTO `distrito` VALUES ('529', '51', 'SORAS', '1');
INSERT INTO `distrito` VALUES ('530', '52', 'HUANCAPI', '1');
INSERT INTO `distrito` VALUES ('531', '52', 'ALCAMENCA', '1');
INSERT INTO `distrito` VALUES ('532', '52', 'APONGO', '1');
INSERT INTO `distrito` VALUES ('533', '52', 'ASQUIPATA', '1');
INSERT INTO `distrito` VALUES ('534', '52', 'CANARIA', '1');
INSERT INTO `distrito` VALUES ('535', '52', 'CAYARA', '1');
INSERT INTO `distrito` VALUES ('536', '52', 'COLCA', '1');
INSERT INTO `distrito` VALUES ('537', '52', 'HUAMANQUIQUIA', '1');
INSERT INTO `distrito` VALUES ('538', '52', 'HUANCARAYLLA', '1');
INSERT INTO `distrito` VALUES ('539', '52', 'HUAYA', '1');
INSERT INTO `distrito` VALUES ('540', '52', 'SARHUA', '1');
INSERT INTO `distrito` VALUES ('541', '52', 'VILCANCHOS', '1');
INSERT INTO `distrito` VALUES ('542', '53', 'VILCAS HUAMAN', '1');
INSERT INTO `distrito` VALUES ('543', '53', 'ACCOMARCA', '1');
INSERT INTO `distrito` VALUES ('544', '53', 'CARHUANCA', '1');
INSERT INTO `distrito` VALUES ('545', '53', 'CONCEPCION', '1');
INSERT INTO `distrito` VALUES ('546', '53', 'HUAMBALPA', '1');
INSERT INTO `distrito` VALUES ('547', '53', 'INDEPENDENCIA', '1');
INSERT INTO `distrito` VALUES ('548', '53', 'SAURAMA', '1');
INSERT INTO `distrito` VALUES ('549', '53', 'VISCHONGO', '1');
INSERT INTO `distrito` VALUES ('550', '54', 'CAJAMARCA', '1');
INSERT INTO `distrito` VALUES ('551', '54', 'ASUNCION', '1');
INSERT INTO `distrito` VALUES ('552', '54', 'CHETILLA', '1');
INSERT INTO `distrito` VALUES ('553', '54', 'COSPAN', '1');
INSERT INTO `distrito` VALUES ('554', '54', 'ENCAÃƒÆ’Ã¢â‚¬ËœADA', '1');
INSERT INTO `distrito` VALUES ('555', '54', 'JESUS', '1');
INSERT INTO `distrito` VALUES ('556', '54', 'LLACANORA', '1');
INSERT INTO `distrito` VALUES ('557', '54', 'LOS BAÃƒÆ’Ã¢â‚¬ËœOS DEL INCA', '1');
INSERT INTO `distrito` VALUES ('558', '54', 'MAGDALENA', '1');
INSERT INTO `distrito` VALUES ('559', '54', 'MATARA', '1');
INSERT INTO `distrito` VALUES ('560', '54', 'NAMORA', '1');
INSERT INTO `distrito` VALUES ('561', '54', 'SAN JUAN', '1');
INSERT INTO `distrito` VALUES ('562', '55', 'CAJABAMBA', '1');
INSERT INTO `distrito` VALUES ('563', '55', 'CACHACHI', '1');
INSERT INTO `distrito` VALUES ('564', '55', 'CONDEBAMBA', '1');
INSERT INTO `distrito` VALUES ('565', '55', 'SITACOCHA', '1');
INSERT INTO `distrito` VALUES ('566', '56', 'CELENDIN', '1');
INSERT INTO `distrito` VALUES ('567', '56', 'CHUMUCH', '1');
INSERT INTO `distrito` VALUES ('568', '56', 'CORTEGANA', '1');
INSERT INTO `distrito` VALUES ('569', '56', 'HUASMIN', '1');
INSERT INTO `distrito` VALUES ('570', '56', 'JORGE CHAVEZ', '1');
INSERT INTO `distrito` VALUES ('571', '56', 'JOSE GALVEZ', '1');
INSERT INTO `distrito` VALUES ('572', '56', 'MIGUEL IGLESIAS', '1');
INSERT INTO `distrito` VALUES ('573', '56', 'OXAMARCA', '1');
INSERT INTO `distrito` VALUES ('574', '56', 'SOROCHUCO', '1');
INSERT INTO `distrito` VALUES ('575', '56', 'SUCRE', '1');
INSERT INTO `distrito` VALUES ('576', '56', 'UTCO', '1');
INSERT INTO `distrito` VALUES ('577', '56', 'LA LIBERTAD DE PALLAN', '1');
INSERT INTO `distrito` VALUES ('578', '57', 'CHOTA', '1');
INSERT INTO `distrito` VALUES ('579', '57', 'ANGUIA', '1');
INSERT INTO `distrito` VALUES ('580', '57', 'CHADIN', '1');
INSERT INTO `distrito` VALUES ('581', '57', 'CHIGUIRIP', '1');
INSERT INTO `distrito` VALUES ('582', '57', 'CHIMBAN', '1');
INSERT INTO `distrito` VALUES ('583', '57', 'CHOROPAMPA', '1');
INSERT INTO `distrito` VALUES ('584', '57', 'COCHABAMBA', '1');
INSERT INTO `distrito` VALUES ('585', '57', 'CONCHAN', '1');
INSERT INTO `distrito` VALUES ('586', '57', 'HUAMBOS', '1');
INSERT INTO `distrito` VALUES ('587', '57', 'LAJAS', '1');
INSERT INTO `distrito` VALUES ('588', '57', 'LLAMA', '1');
INSERT INTO `distrito` VALUES ('589', '57', 'MIRACOSTA', '1');
INSERT INTO `distrito` VALUES ('590', '57', 'PACCHA', '1');
INSERT INTO `distrito` VALUES ('591', '57', 'PION', '1');
INSERT INTO `distrito` VALUES ('592', '57', 'QUEROCOTO', '1');
INSERT INTO `distrito` VALUES ('593', '57', 'SAN JUAN DE LICUPIS', '1');
INSERT INTO `distrito` VALUES ('594', '57', 'TACABAMBA', '1');
INSERT INTO `distrito` VALUES ('595', '57', 'TOCMOCHE', '1');
INSERT INTO `distrito` VALUES ('596', '57', 'CHALAMARCA', '1');
INSERT INTO `distrito` VALUES ('597', '58', 'CONTUMAZA', '1');
INSERT INTO `distrito` VALUES ('598', '58', 'CHILETE', '1');
INSERT INTO `distrito` VALUES ('599', '58', 'CUPISNIQUE', '1');
INSERT INTO `distrito` VALUES ('600', '58', 'GUZMANGO', '1');
INSERT INTO `distrito` VALUES ('601', '58', 'SAN BENITO', '1');
INSERT INTO `distrito` VALUES ('602', '58', 'SANTA CRUZ DE TOLED', '1');
INSERT INTO `distrito` VALUES ('603', '58', 'TANTARICA', '1');
INSERT INTO `distrito` VALUES ('604', '58', 'YONAN', '1');
INSERT INTO `distrito` VALUES ('605', '59', 'CUTERVO', '1');
INSERT INTO `distrito` VALUES ('606', '59', 'CALLAYUC', '1');
INSERT INTO `distrito` VALUES ('607', '59', 'CHOROS', '1');
INSERT INTO `distrito` VALUES ('608', '59', 'CUJILLO', '1');
INSERT INTO `distrito` VALUES ('609', '59', 'LA RAMADA', '1');
INSERT INTO `distrito` VALUES ('610', '59', 'PIMPINGOS', '1');
INSERT INTO `distrito` VALUES ('611', '59', 'QUEROCOTILLO', '1');
INSERT INTO `distrito` VALUES ('612', '59', 'SAN ANDRES DE CUTERVO', '1');
INSERT INTO `distrito` VALUES ('613', '59', 'SAN JUAN DE CUTERVO', '1');
INSERT INTO `distrito` VALUES ('614', '59', 'SAN LUIS DE LUCMA', '1');
INSERT INTO `distrito` VALUES ('615', '59', 'SANTA CRUZ', '1');
INSERT INTO `distrito` VALUES ('616', '59', 'SANTO DOMINGO DE LA CAPILLA', '1');
INSERT INTO `distrito` VALUES ('617', '59', 'SANTO TOMAS', '1');
INSERT INTO `distrito` VALUES ('618', '59', 'SOCOTA', '1');
INSERT INTO `distrito` VALUES ('619', '59', 'TORIBIO CASANOVA', '1');
INSERT INTO `distrito` VALUES ('620', '60', 'BAMBAMARCA', '1');
INSERT INTO `distrito` VALUES ('621', '60', 'CHUGUR', '1');
INSERT INTO `distrito` VALUES ('622', '60', 'HUALGAYOC', '1');
INSERT INTO `distrito` VALUES ('623', '61', 'JAEN', '1');
INSERT INTO `distrito` VALUES ('624', '61', 'BELLAVISTA', '1');
INSERT INTO `distrito` VALUES ('625', '61', 'CHONTALI', '1');
INSERT INTO `distrito` VALUES ('626', '61', 'COLASAY', '1');
INSERT INTO `distrito` VALUES ('627', '61', 'HUABAL', '1');
INSERT INTO `distrito` VALUES ('628', '61', 'LAS PIRIAS', '1');
INSERT INTO `distrito` VALUES ('629', '61', 'POMAHUACA', '1');
INSERT INTO `distrito` VALUES ('630', '61', 'PUCARA', '1');
INSERT INTO `distrito` VALUES ('631', '61', 'SALLIQUE', '1');
INSERT INTO `distrito` VALUES ('632', '61', 'SAN FELIPE', '1');
INSERT INTO `distrito` VALUES ('633', '61', 'SAN JOSE DEL ALTO', '1');
INSERT INTO `distrito` VALUES ('634', '61', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('635', '62', 'SAN IGNACIO', '1');
INSERT INTO `distrito` VALUES ('636', '62', 'CHIRINOS', '1');
INSERT INTO `distrito` VALUES ('637', '62', 'HUARANGO', '1');
INSERT INTO `distrito` VALUES ('638', '62', 'LA COIPA', '1');
INSERT INTO `distrito` VALUES ('639', '62', 'NAMBALLE', '1');
INSERT INTO `distrito` VALUES ('640', '62', 'SAN JOSE DE LOURDES', '1');
INSERT INTO `distrito` VALUES ('641', '62', 'TABACONAS', '1');
INSERT INTO `distrito` VALUES ('642', '63', 'PEDRO GALVEZ', '1');
INSERT INTO `distrito` VALUES ('643', '63', 'CHANCAY', '1');
INSERT INTO `distrito` VALUES ('644', '63', 'EDUARDO VILLANUEVA', '1');
INSERT INTO `distrito` VALUES ('645', '63', 'GREGORIO PITA', '1');
INSERT INTO `distrito` VALUES ('646', '63', 'ICHOCAN', '1');
INSERT INTO `distrito` VALUES ('647', '63', 'JOSE MANUEL QUIROZ', '1');
INSERT INTO `distrito` VALUES ('648', '63', 'JOSE SABOGAL', '1');
INSERT INTO `distrito` VALUES ('649', '64', 'SAN MIGUEL', '1');
INSERT INTO `distrito` VALUES ('650', '64', 'BOLIVAR', '1');
INSERT INTO `distrito` VALUES ('651', '64', 'CALQUIS', '1');
INSERT INTO `distrito` VALUES ('652', '64', 'CATILLUC', '1');
INSERT INTO `distrito` VALUES ('653', '64', 'EL PRADO', '1');
INSERT INTO `distrito` VALUES ('654', '64', 'LA FLORIDA', '1');
INSERT INTO `distrito` VALUES ('655', '64', 'LLAPA', '1');
INSERT INTO `distrito` VALUES ('656', '64', 'NANCHOC', '1');
INSERT INTO `distrito` VALUES ('657', '64', 'NIEPOS', '1');
INSERT INTO `distrito` VALUES ('658', '64', 'SAN GREGORIO', '1');
INSERT INTO `distrito` VALUES ('659', '64', 'SAN SILVESTRE DE COCHAN', '1');
INSERT INTO `distrito` VALUES ('660', '64', 'TONGOD', '1');
INSERT INTO `distrito` VALUES ('661', '64', 'UNION AGUA BLANCA', '1');
INSERT INTO `distrito` VALUES ('662', '65', 'SAN PABLO', '1');
INSERT INTO `distrito` VALUES ('663', '65', 'SAN BERNARDINO', '1');
INSERT INTO `distrito` VALUES ('664', '65', 'SAN LUIS', '1');
INSERT INTO `distrito` VALUES ('665', '65', 'TUMBADEN', '1');
INSERT INTO `distrito` VALUES ('666', '66', 'SANTA CRUZ', '1');
INSERT INTO `distrito` VALUES ('667', '66', 'ANDABAMBA', '1');
INSERT INTO `distrito` VALUES ('668', '66', 'CATACHE', '1');
INSERT INTO `distrito` VALUES ('669', '66', 'CHANCAYBAÃƒÆ’Ã¢â‚¬ËœOS', '1');
INSERT INTO `distrito` VALUES ('670', '66', 'LA ESPERANZA', '1');
INSERT INTO `distrito` VALUES ('671', '66', 'NINABAMBA', '1');
INSERT INTO `distrito` VALUES ('672', '66', 'PULAN', '1');
INSERT INTO `distrito` VALUES ('673', '66', 'SAUCEPAMPA', '1');
INSERT INTO `distrito` VALUES ('674', '66', 'SEXI', '1');
INSERT INTO `distrito` VALUES ('675', '66', 'UTICYACU', '1');
INSERT INTO `distrito` VALUES ('676', '66', 'YAUYUCAN', '1');
INSERT INTO `distrito` VALUES ('677', '67', 'CUSCO', '1');
INSERT INTO `distrito` VALUES ('678', '67', 'CCORCA', '1');
INSERT INTO `distrito` VALUES ('679', '67', 'POROY', '1');
INSERT INTO `distrito` VALUES ('680', '67', 'SAN JERONIMO', '1');
INSERT INTO `distrito` VALUES ('681', '67', 'SAN SEBASTIAN', '1');
INSERT INTO `distrito` VALUES ('682', '67', 'SANTIAGO', '1');
INSERT INTO `distrito` VALUES ('683', '67', 'SAYLLA', '1');
INSERT INTO `distrito` VALUES ('684', '67', 'WANCHAQ', '1');
INSERT INTO `distrito` VALUES ('685', '68', 'ACOMAYO', '1');
INSERT INTO `distrito` VALUES ('686', '68', 'ACOPIA', '1');
INSERT INTO `distrito` VALUES ('687', '68', 'ACOS', '1');
INSERT INTO `distrito` VALUES ('688', '68', 'MOSOC LLACTA', '1');
INSERT INTO `distrito` VALUES ('689', '68', 'POMACANCHI', '1');
INSERT INTO `distrito` VALUES ('690', '68', 'RONDOCAN', '1');
INSERT INTO `distrito` VALUES ('691', '68', 'SANGARARA', '1');
INSERT INTO `distrito` VALUES ('692', '69', 'ANTA', '1');
INSERT INTO `distrito` VALUES ('693', '69', 'ANCAHUASI', '1');
INSERT INTO `distrito` VALUES ('694', '69', 'CACHIMAYO', '1');
INSERT INTO `distrito` VALUES ('695', '69', 'CHINCHAYPUJIO', '1');
INSERT INTO `distrito` VALUES ('696', '69', 'HUAROCONDO', '1');
INSERT INTO `distrito` VALUES ('697', '69', 'LIMATAMBO', '1');
INSERT INTO `distrito` VALUES ('698', '69', 'MOLLEPATA', '1');
INSERT INTO `distrito` VALUES ('699', '69', 'PUCYURA', '1');
INSERT INTO `distrito` VALUES ('700', '69', 'ZURITE', '1');
INSERT INTO `distrito` VALUES ('701', '70', 'CALCA', '1');
INSERT INTO `distrito` VALUES ('702', '70', 'COYA', '1');
INSERT INTO `distrito` VALUES ('703', '70', 'LAMAY', '1');
INSERT INTO `distrito` VALUES ('704', '70', 'LARES', '1');
INSERT INTO `distrito` VALUES ('705', '70', 'PISAC', '1');
INSERT INTO `distrito` VALUES ('706', '70', 'SAN SALVADOR', '1');
INSERT INTO `distrito` VALUES ('707', '70', 'TARAY', '1');
INSERT INTO `distrito` VALUES ('708', '70', 'YANATILE', '1');
INSERT INTO `distrito` VALUES ('709', '71', 'YANAOCA', '1');
INSERT INTO `distrito` VALUES ('710', '71', 'CHECCA', '1');
INSERT INTO `distrito` VALUES ('711', '71', 'KUNTURKANKI', '1');
INSERT INTO `distrito` VALUES ('712', '71', 'LANGUI', '1');
INSERT INTO `distrito` VALUES ('713', '71', 'LAYO', '1');
INSERT INTO `distrito` VALUES ('714', '71', 'PAMPAMARCA', '1');
INSERT INTO `distrito` VALUES ('715', '71', 'QUEHUE', '1');
INSERT INTO `distrito` VALUES ('716', '71', 'TUPAC AMARU', '1');
INSERT INTO `distrito` VALUES ('717', '72', 'SICUANI', '1');
INSERT INTO `distrito` VALUES ('718', '72', 'CHECACUPE', '1');
INSERT INTO `distrito` VALUES ('719', '72', 'COMBAPATA', '1');
INSERT INTO `distrito` VALUES ('720', '72', 'MARANGANI', '1');
INSERT INTO `distrito` VALUES ('721', '72', 'PITUMARCA', '1');
INSERT INTO `distrito` VALUES ('722', '72', 'SAN PABLO', '1');
INSERT INTO `distrito` VALUES ('723', '72', 'SAN PEDRO', '1');
INSERT INTO `distrito` VALUES ('724', '72', 'TINTA', '1');
INSERT INTO `distrito` VALUES ('725', '73', 'SANTO TOMAS', '1');
INSERT INTO `distrito` VALUES ('726', '73', 'CAPACMARCA', '1');
INSERT INTO `distrito` VALUES ('727', '73', 'CHAMACA', '1');
INSERT INTO `distrito` VALUES ('728', '73', 'COLQUEMARCA', '1');
INSERT INTO `distrito` VALUES ('729', '73', 'LIVITACA', '1');
INSERT INTO `distrito` VALUES ('730', '73', 'LLUSCO', '1');
INSERT INTO `distrito` VALUES ('731', '73', 'QUIÃƒÆ’Ã¢â‚¬ËœOTA', '1');
INSERT INTO `distrito` VALUES ('732', '73', 'VELILLE', '1');
INSERT INTO `distrito` VALUES ('733', '74', 'ESPINAR', '1');
INSERT INTO `distrito` VALUES ('734', '74', 'CONDOROMA', '1');
INSERT INTO `distrito` VALUES ('735', '74', 'COPORAQUE', '1');
INSERT INTO `distrito` VALUES ('736', '74', 'OCORURO', '1');
INSERT INTO `distrito` VALUES ('737', '74', 'PALLPATA', '1');
INSERT INTO `distrito` VALUES ('738', '74', 'PICHIGUA', '1');
INSERT INTO `distrito` VALUES ('739', '74', 'SUYCKUTAMBO', '1');
INSERT INTO `distrito` VALUES ('740', '74', 'ALTO PICHIGUA', '1');
INSERT INTO `distrito` VALUES ('741', '75', 'SANTA ANA', '1');
INSERT INTO `distrito` VALUES ('742', '75', 'ECHARATE', '1');
INSERT INTO `distrito` VALUES ('743', '75', 'HUAYOPATA', '1');
INSERT INTO `distrito` VALUES ('744', '75', 'MARANURA', '1');
INSERT INTO `distrito` VALUES ('745', '75', 'OCOBAMBA', '1');
INSERT INTO `distrito` VALUES ('746', '75', 'QUELLOUNO', '1');
INSERT INTO `distrito` VALUES ('747', '75', 'KIMBIRI', '1');
INSERT INTO `distrito` VALUES ('748', '75', 'SANTA TERESA', '1');
INSERT INTO `distrito` VALUES ('749', '75', 'VILCABAMBA', '1');
INSERT INTO `distrito` VALUES ('750', '75', 'PICHARI', '1');
INSERT INTO `distrito` VALUES ('751', '76', 'PARURO', '1');
INSERT INTO `distrito` VALUES ('752', '76', 'ACCHA', '1');
INSERT INTO `distrito` VALUES ('753', '76', 'CCAPI', '1');
INSERT INTO `distrito` VALUES ('754', '76', 'COLCHA', '1');
INSERT INTO `distrito` VALUES ('755', '76', 'HUANOQUITE', '1');
INSERT INTO `distrito` VALUES ('756', '76', 'OMACHA', '1');
INSERT INTO `distrito` VALUES ('757', '76', 'PACCARITAMBO', '1');
INSERT INTO `distrito` VALUES ('758', '76', 'PILLPINTO', '1');
INSERT INTO `distrito` VALUES ('759', '76', 'YAURISQUE', '1');
INSERT INTO `distrito` VALUES ('760', '77', 'PAUCARTAMBO', '1');
INSERT INTO `distrito` VALUES ('761', '77', 'CAICAY', '1');
INSERT INTO `distrito` VALUES ('762', '77', 'CHALLABAMBA', '1');
INSERT INTO `distrito` VALUES ('763', '77', 'COLQUEPATA', '1');
INSERT INTO `distrito` VALUES ('764', '77', 'HUANCARANI', '1');
INSERT INTO `distrito` VALUES ('765', '77', 'KOSÑIPATA', '1');
INSERT INTO `distrito` VALUES ('766', '78', 'URCOS', '1');
INSERT INTO `distrito` VALUES ('767', '78', 'ANDAHUAYLILLAS', '1');
INSERT INTO `distrito` VALUES ('768', '78', 'CAMANTI', '1');
INSERT INTO `distrito` VALUES ('769', '78', 'CCARHUAYO', '1');
INSERT INTO `distrito` VALUES ('770', '78', 'CCATCA', '1');
INSERT INTO `distrito` VALUES ('771', '78', 'CUSIPATA', '1');
INSERT INTO `distrito` VALUES ('772', '78', 'HUARO', '1');
INSERT INTO `distrito` VALUES ('773', '78', 'LUCRE', '1');
INSERT INTO `distrito` VALUES ('774', '78', 'MARCAPATA', '1');
INSERT INTO `distrito` VALUES ('775', '78', 'OCONGATE', '1');
INSERT INTO `distrito` VALUES ('776', '78', 'OROPESA', '1');
INSERT INTO `distrito` VALUES ('777', '78', 'QUIQUIJANA', '1');
INSERT INTO `distrito` VALUES ('778', '79', 'URUBAMBA', '1');
INSERT INTO `distrito` VALUES ('779', '79', 'CHINCHERO', '1');
INSERT INTO `distrito` VALUES ('780', '79', 'HUAYLLABAMBA', '1');
INSERT INTO `distrito` VALUES ('781', '79', 'MACHUPICCHU', '1');
INSERT INTO `distrito` VALUES ('782', '79', 'MARAS', '1');
INSERT INTO `distrito` VALUES ('783', '79', 'OLLANTAYTAMBO', '1');
INSERT INTO `distrito` VALUES ('784', '79', 'YUCAY', '1');
INSERT INTO `distrito` VALUES ('785', '80', 'HUANCAVELICA', '1');
INSERT INTO `distrito` VALUES ('786', '80', 'ACOBAMBILLA', '1');
INSERT INTO `distrito` VALUES ('787', '80', 'ACORIA', '1');
INSERT INTO `distrito` VALUES ('788', '80', 'CONAYCA', '1');
INSERT INTO `distrito` VALUES ('789', '80', 'CUENCA', '1');
INSERT INTO `distrito` VALUES ('790', '80', 'HUACHOCOLPA', '1');
INSERT INTO `distrito` VALUES ('791', '80', 'HUAYLLAHUARA', '1');
INSERT INTO `distrito` VALUES ('792', '80', 'IZCUCHACA', '1');
INSERT INTO `distrito` VALUES ('793', '80', 'LARIA', '1');
INSERT INTO `distrito` VALUES ('794', '80', 'MANTA', '1');
INSERT INTO `distrito` VALUES ('795', '80', 'MARISCAL CACERES', '1');
INSERT INTO `distrito` VALUES ('796', '80', 'MOYA', '1');
INSERT INTO `distrito` VALUES ('797', '80', 'NUEVO OCCORO', '1');
INSERT INTO `distrito` VALUES ('798', '80', 'PALCA', '1');
INSERT INTO `distrito` VALUES ('799', '80', 'PILCHACA', '1');
INSERT INTO `distrito` VALUES ('800', '80', 'VILCA', '1');
INSERT INTO `distrito` VALUES ('801', '80', 'YAULI', '1');
INSERT INTO `distrito` VALUES ('802', '80', 'ASCENSION', '1');
INSERT INTO `distrito` VALUES ('803', '81', 'ACOBAMBA', '1');
INSERT INTO `distrito` VALUES ('804', '81', 'ANDABAMBA', '1');
INSERT INTO `distrito` VALUES ('805', '81', 'ANTA', '1');
INSERT INTO `distrito` VALUES ('806', '81', 'CAJA', '1');
INSERT INTO `distrito` VALUES ('807', '81', 'MARCAS', '1');
INSERT INTO `distrito` VALUES ('808', '81', 'PAUCARA', '1');
INSERT INTO `distrito` VALUES ('809', '81', 'POMACOCHA', '1');
INSERT INTO `distrito` VALUES ('810', '81', 'ROSARIO', '1');
INSERT INTO `distrito` VALUES ('811', '82', 'LIRCAY', '1');
INSERT INTO `distrito` VALUES ('812', '82', 'ANCHONGA', '1');
INSERT INTO `distrito` VALUES ('813', '82', 'CALLANMARCA', '1');
INSERT INTO `distrito` VALUES ('814', '82', 'CCOCHACCASA', '1');
INSERT INTO `distrito` VALUES ('815', '82', 'CHINCHO', '1');
INSERT INTO `distrito` VALUES ('816', '82', 'CONGALLA', '1');
INSERT INTO `distrito` VALUES ('817', '82', 'HUANCA-HUANCA', '1');
INSERT INTO `distrito` VALUES ('818', '82', 'HUAYLLAY GRANDE', '1');
INSERT INTO `distrito` VALUES ('819', '82', 'JULCAMARCA', '1');
INSERT INTO `distrito` VALUES ('820', '82', 'SAN ANTONIO DE ANTAPARCO', '1');
INSERT INTO `distrito` VALUES ('821', '82', 'SANTO TOMAS DE PATA', '1');
INSERT INTO `distrito` VALUES ('822', '82', 'SECCLLA', '1');
INSERT INTO `distrito` VALUES ('823', '83', 'CASTROVIRREYNA', '1');
INSERT INTO `distrito` VALUES ('824', '83', 'ARMA', '1');
INSERT INTO `distrito` VALUES ('825', '83', 'AURAHUA', '1');
INSERT INTO `distrito` VALUES ('826', '83', 'CAPILLAS', '1');
INSERT INTO `distrito` VALUES ('827', '83', 'CHUPAMARCA', '1');
INSERT INTO `distrito` VALUES ('828', '83', 'COCAS', '1');
INSERT INTO `distrito` VALUES ('829', '83', 'HUACHOS', '1');
INSERT INTO `distrito` VALUES ('830', '83', 'HUAMATAMBO', '1');
INSERT INTO `distrito` VALUES ('831', '83', 'MOLLEPAMPA', '1');
INSERT INTO `distrito` VALUES ('832', '83', 'SAN JUAN', '1');
INSERT INTO `distrito` VALUES ('833', '83', 'SANTA ANA', '1');
INSERT INTO `distrito` VALUES ('834', '83', 'TANTARA', '1');
INSERT INTO `distrito` VALUES ('835', '83', 'TICRAPO', '1');
INSERT INTO `distrito` VALUES ('836', '84', 'CHURCAMPA', '1');
INSERT INTO `distrito` VALUES ('837', '84', 'ANCO', '1');
INSERT INTO `distrito` VALUES ('838', '84', 'CHINCHIHUASI', '1');
INSERT INTO `distrito` VALUES ('839', '84', 'EL CARMEN', '1');
INSERT INTO `distrito` VALUES ('840', '84', 'LA MERCED', '1');
INSERT INTO `distrito` VALUES ('841', '84', 'LOCROJA', '1');
INSERT INTO `distrito` VALUES ('842', '84', 'PAUCARBAMBA', '1');
INSERT INTO `distrito` VALUES ('843', '84', 'SAN MIGUEL DE MAYOCC', '1');
INSERT INTO `distrito` VALUES ('844', '84', 'SAN PEDRO DE CORIS', '1');
INSERT INTO `distrito` VALUES ('845', '84', 'PACHAMARCA', '1');
INSERT INTO `distrito` VALUES ('846', '85', 'HUAYTARA', '1');
INSERT INTO `distrito` VALUES ('847', '85', 'AYAVI', '1');
INSERT INTO `distrito` VALUES ('848', '85', 'CORDOVA', '1');
INSERT INTO `distrito` VALUES ('849', '85', 'HUAYACUNDO ARMA', '1');
INSERT INTO `distrito` VALUES ('850', '85', 'LARAMARCA', '1');
INSERT INTO `distrito` VALUES ('851', '85', 'OCOYO', '1');
INSERT INTO `distrito` VALUES ('852', '85', 'PILPICHACA', '1');
INSERT INTO `distrito` VALUES ('853', '85', 'QUERCO', '1');
INSERT INTO `distrito` VALUES ('854', '85', 'QUITO-ARMA', '1');
INSERT INTO `distrito` VALUES ('855', '85', 'SAN ANTONIO DE CUSICANCHA', '1');
INSERT INTO `distrito` VALUES ('856', '85', 'SAN FRANCISCO DE SANGAYAICO', '1');
INSERT INTO `distrito` VALUES ('857', '85', 'SAN ISIDRO', '1');
INSERT INTO `distrito` VALUES ('858', '85', 'SANTIAGO DE CHOCORVOS', '1');
INSERT INTO `distrito` VALUES ('859', '85', 'SANTIAGO DE QUIRAHUARA', '1');
INSERT INTO `distrito` VALUES ('860', '85', 'SANTO DOMINGO DE CAPILLAS', '1');
INSERT INTO `distrito` VALUES ('861', '85', 'TAMBO', '1');
INSERT INTO `distrito` VALUES ('862', '86', 'PAMPAS', '1');
INSERT INTO `distrito` VALUES ('863', '86', 'ACOSTAMBO', '1');
INSERT INTO `distrito` VALUES ('864', '86', 'ACRAQUIA', '1');
INSERT INTO `distrito` VALUES ('865', '86', 'AHUAYCHA', '1');
INSERT INTO `distrito` VALUES ('866', '86', 'COLCABAMBA', '1');
INSERT INTO `distrito` VALUES ('867', '86', 'DANIEL HERNANDEZ', '1');
INSERT INTO `distrito` VALUES ('868', '86', 'HUACHOCOLPA', '1');
INSERT INTO `distrito` VALUES ('869', '86', 'HUANDO', '1');
INSERT INTO `distrito` VALUES ('870', '86', 'HUARIBAMBA', '1');
INSERT INTO `distrito` VALUES ('871', '86', 'ÑAHUIMPUQUIO', '1');
INSERT INTO `distrito` VALUES ('872', '86', 'PAZOS', '1');
INSERT INTO `distrito` VALUES ('873', '86', 'QUISHUAR', '1');
INSERT INTO `distrito` VALUES ('874', '86', 'SALCABAMBA', '1');
INSERT INTO `distrito` VALUES ('875', '86', 'SALCAHUASI', '1');
INSERT INTO `distrito` VALUES ('876', '86', 'SAN MARCOS DE ROCCHAC', '1');
INSERT INTO `distrito` VALUES ('877', '86', 'SURCUBAMBA', '1');
INSERT INTO `distrito` VALUES ('878', '86', 'TINTAY PUNCU', '1');
INSERT INTO `distrito` VALUES ('879', '87', 'HUANUCO', '1');
INSERT INTO `distrito` VALUES ('880', '87', 'AMARILIS', '1');
INSERT INTO `distrito` VALUES ('881', '87', 'CHINCHAO', '1');
INSERT INTO `distrito` VALUES ('882', '87', 'CHURUBAMBA', '1');
INSERT INTO `distrito` VALUES ('883', '87', 'MARGOS', '1');
INSERT INTO `distrito` VALUES ('884', '87', 'QUISQUI', '1');
INSERT INTO `distrito` VALUES ('885', '87', 'SAN FRANCISCO DE CAYRAN', '1');
INSERT INTO `distrito` VALUES ('886', '87', 'SAN PEDRO DE CHAULAN', '1');
INSERT INTO `distrito` VALUES ('887', '87', 'SANTA MARIA DEL VALLE', '1');
INSERT INTO `distrito` VALUES ('888', '87', 'YARUMAYO', '1');
INSERT INTO `distrito` VALUES ('889', '87', 'PILLCO MARCA', '1');
INSERT INTO `distrito` VALUES ('890', '88', 'AMBO', '1');
INSERT INTO `distrito` VALUES ('891', '88', 'CAYNA', '1');
INSERT INTO `distrito` VALUES ('892', '88', 'COLPAS', '1');
INSERT INTO `distrito` VALUES ('893', '88', 'CONCHAMARCA', '1');
INSERT INTO `distrito` VALUES ('894', '88', 'HUACAR', '1');
INSERT INTO `distrito` VALUES ('895', '88', 'SAN FRANCISCO', '1');
INSERT INTO `distrito` VALUES ('896', '88', 'SAN RAFAEL', '1');
INSERT INTO `distrito` VALUES ('897', '88', 'TOMAY KICHWA', '1');
INSERT INTO `distrito` VALUES ('898', '88', 'LA UNION', '1');
INSERT INTO `distrito` VALUES ('899', '88', 'CHUQUIS', '1');
INSERT INTO `distrito` VALUES ('900', '88', 'MARIAS', '1');
INSERT INTO `distrito` VALUES ('901', '88', 'PACHAS', '1');
INSERT INTO `distrito` VALUES ('902', '88', 'QUIVILLA', '1');
INSERT INTO `distrito` VALUES ('903', '88', 'RIPAN', '1');
INSERT INTO `distrito` VALUES ('904', '88', 'SHUNQUI', '1');
INSERT INTO `distrito` VALUES ('905', '88', 'SILLAPATA', '1');
INSERT INTO `distrito` VALUES ('906', '88', 'YANAS', '1');
INSERT INTO `distrito` VALUES ('907', '90', 'HUACAYBAMBA', '1');
INSERT INTO `distrito` VALUES ('908', '90', 'CANCHABAMBA', '1');
INSERT INTO `distrito` VALUES ('909', '90', 'COCHABAMBA', '1');
INSERT INTO `distrito` VALUES ('910', '90', 'PINRA', '1');
INSERT INTO `distrito` VALUES ('911', '91', 'LLATA', '1');
INSERT INTO `distrito` VALUES ('912', '91', 'ARANCAY', '1');
INSERT INTO `distrito` VALUES ('913', '91', 'CHAVIN DE PARIARCA', '1');
INSERT INTO `distrito` VALUES ('914', '91', 'JACAS GRANDE', '1');
INSERT INTO `distrito` VALUES ('915', '91', 'JIRCAN', '1');
INSERT INTO `distrito` VALUES ('916', '91', 'MIRAFLORES', '1');
INSERT INTO `distrito` VALUES ('917', '91', 'MONZON', '1');
INSERT INTO `distrito` VALUES ('918', '91', 'PUNCHAO', '1');
INSERT INTO `distrito` VALUES ('919', '91', 'PUÃƒÆ’Ã¢â‚¬ËœOS', '1');
INSERT INTO `distrito` VALUES ('920', '91', 'SINGA', '1');
INSERT INTO `distrito` VALUES ('921', '91', 'TANTAMAYO', '1');
INSERT INTO `distrito` VALUES ('922', '92', 'RUPA-RUPA', '1');
INSERT INTO `distrito` VALUES ('923', '92', 'DANIEL ALOMIA ROBLES', '1');
INSERT INTO `distrito` VALUES ('924', '92', 'HERMILIO VALDIZAN', '1');
INSERT INTO `distrito` VALUES ('925', '92', 'JOSE CRESPO Y CASTILLO', '1');
INSERT INTO `distrito` VALUES ('926', '92', 'LUYANDO', '1');
INSERT INTO `distrito` VALUES ('927', '92', 'MARIANO DAMASO BERAUN', '1');
INSERT INTO `distrito` VALUES ('928', '92', 'TINGO MARIA', '1');
INSERT INTO `distrito` VALUES ('929', '93', 'HUACRACHUCO', '1');
INSERT INTO `distrito` VALUES ('930', '93', 'CHOLON', '1');
INSERT INTO `distrito` VALUES ('931', '93', 'SAN BUENAVENTURA', '1');
INSERT INTO `distrito` VALUES ('932', '94', 'PANAO', '1');
INSERT INTO `distrito` VALUES ('933', '94', 'CHAGLLA', '1');
INSERT INTO `distrito` VALUES ('934', '94', 'MOLINO', '1');
INSERT INTO `distrito` VALUES ('935', '94', 'UMARI', '1');
INSERT INTO `distrito` VALUES ('936', '95', 'PUERTO INCA', '1');
INSERT INTO `distrito` VALUES ('937', '95', 'CODO DEL POZUZO', '1');
INSERT INTO `distrito` VALUES ('938', '95', 'HONORIA', '1');
INSERT INTO `distrito` VALUES ('939', '95', 'TOURNAVISTA', '1');
INSERT INTO `distrito` VALUES ('940', '95', 'YUYAPICHIS', '1');
INSERT INTO `distrito` VALUES ('941', '96', 'JESUS', '1');
INSERT INTO `distrito` VALUES ('942', '96', 'BAÃƒÆ’Ã¢â‚¬ËœOS', '1');
INSERT INTO `distrito` VALUES ('943', '96', 'JIVIA', '1');
INSERT INTO `distrito` VALUES ('944', '96', 'QUEROPALCA', '1');
INSERT INTO `distrito` VALUES ('945', '96', 'RONDOS', '1');
INSERT INTO `distrito` VALUES ('946', '96', 'SAN FRANCISCO DE ASIS', '1');
INSERT INTO `distrito` VALUES ('947', '96', 'SAN MIGUEL DE CAURI', '1');
INSERT INTO `distrito` VALUES ('948', '97', 'CHAVINILLO', '1');
INSERT INTO `distrito` VALUES ('949', '97', 'CAHUAC', '1');
INSERT INTO `distrito` VALUES ('950', '97', 'CHACABAMBA', '1');
INSERT INTO `distrito` VALUES ('951', '97', 'APARICIO POMARES', '1');
INSERT INTO `distrito` VALUES ('952', '97', 'JACAS CHICO', '1');
INSERT INTO `distrito` VALUES ('953', '97', 'OBAS', '1');
INSERT INTO `distrito` VALUES ('954', '97', 'PAMPAMARCA', '1');
INSERT INTO `distrito` VALUES ('955', '97', 'CHORAS', '1');
INSERT INTO `distrito` VALUES ('956', '98', 'ICA', '1');
INSERT INTO `distrito` VALUES ('957', '98', 'LA TINGUIÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('958', '98', 'LOS AQUIJES', '1');
INSERT INTO `distrito` VALUES ('959', '98', 'OCUCAJE', '1');
INSERT INTO `distrito` VALUES ('960', '98', 'PACHACUTEC', '1');
INSERT INTO `distrito` VALUES ('961', '98', 'PARCONA', '1');
INSERT INTO `distrito` VALUES ('962', '98', 'PUEBLO NUEVO', '1');
INSERT INTO `distrito` VALUES ('963', '98', 'SALAS', '1');
INSERT INTO `distrito` VALUES ('964', '98', 'SAN JOSE DE LOS MOLINOS', '1');
INSERT INTO `distrito` VALUES ('965', '98', 'SAN JUAN BAUTISTA', '1');
INSERT INTO `distrito` VALUES ('966', '98', 'SANTIAGO', '1');
INSERT INTO `distrito` VALUES ('967', '98', 'SUBTANJALLA', '1');
INSERT INTO `distrito` VALUES ('968', '98', 'TATE', '1');
INSERT INTO `distrito` VALUES ('969', '98', 'YAUCA DEL ROSARIO', '1');
INSERT INTO `distrito` VALUES ('970', '99', 'CHINCHA ALTA', '1');
INSERT INTO `distrito` VALUES ('971', '99', 'ALTO LARAN', '1');
INSERT INTO `distrito` VALUES ('972', '99', 'CHAVIN', '1');
INSERT INTO `distrito` VALUES ('973', '99', 'CHINCHA BAJA', '1');
INSERT INTO `distrito` VALUES ('974', '99', 'EL CARMEN', '1');
INSERT INTO `distrito` VALUES ('975', '99', 'GROCIO PRADO', '1');
INSERT INTO `distrito` VALUES ('976', '99', 'PUEBLO NUEVO', '1');
INSERT INTO `distrito` VALUES ('977', '99', 'SAN JUAN DE YANAC', '1');
INSERT INTO `distrito` VALUES ('978', '99', 'SAN PEDRO DE HUACARPANA', '1');
INSERT INTO `distrito` VALUES ('979', '99', 'SUNAMPE', '1');
INSERT INTO `distrito` VALUES ('980', '99', 'TAMBO DE MORA', '1');
INSERT INTO `distrito` VALUES ('981', '100', 'NAZCA', '1');
INSERT INTO `distrito` VALUES ('982', '100', 'CHANGUILLO', '1');
INSERT INTO `distrito` VALUES ('983', '100', 'EL INGENIO', '1');
INSERT INTO `distrito` VALUES ('984', '100', 'MARCONA', '1');
INSERT INTO `distrito` VALUES ('985', '100', 'VISTA ALEGRE', '1');
INSERT INTO `distrito` VALUES ('986', '101', 'PALPA', '1');
INSERT INTO `distrito` VALUES ('987', '101', 'LLIPATA', '1');
INSERT INTO `distrito` VALUES ('988', '101', 'RIO GRANDE', '1');
INSERT INTO `distrito` VALUES ('989', '101', 'SANTA CRUZ', '1');
INSERT INTO `distrito` VALUES ('990', '101', 'TIBILLO', '1');
INSERT INTO `distrito` VALUES ('991', '102', 'PISCO', '1');
INSERT INTO `distrito` VALUES ('992', '102', 'HUANCANO', '1');
INSERT INTO `distrito` VALUES ('993', '102', 'HUMAY', '1');
INSERT INTO `distrito` VALUES ('994', '102', 'INDEPENDENCIA', '1');
INSERT INTO `distrito` VALUES ('995', '102', 'PARACAS', '1');
INSERT INTO `distrito` VALUES ('996', '102', 'SAN ANDRES', '1');
INSERT INTO `distrito` VALUES ('997', '102', 'SAN CLEMENTE', '1');
INSERT INTO `distrito` VALUES ('998', '102', 'TUPAC AMARU INCA', '1');
INSERT INTO `distrito` VALUES ('999', '103', 'HUANCAYO', '1');
INSERT INTO `distrito` VALUES ('1000', '103', 'CARHUACALLANGA', '1');
INSERT INTO `distrito` VALUES ('1001', '103', 'CHACAPAMPA', '1');
INSERT INTO `distrito` VALUES ('1002', '103', 'CHICCHE', '1');
INSERT INTO `distrito` VALUES ('1003', '103', 'CHILCA', '1');
INSERT INTO `distrito` VALUES ('1004', '103', 'CHONGOS ALTO', '1');
INSERT INTO `distrito` VALUES ('1005', '103', 'CHUPURO', '1');
INSERT INTO `distrito` VALUES ('1006', '103', 'COLCA', '1');
INSERT INTO `distrito` VALUES ('1007', '103', 'CULLHUAS', '1');
INSERT INTO `distrito` VALUES ('1008', '103', 'EL TAMBO', '1');
INSERT INTO `distrito` VALUES ('1009', '103', 'HUACRAPUQUIO', '1');
INSERT INTO `distrito` VALUES ('1010', '103', 'HUALHUAS', '1');
INSERT INTO `distrito` VALUES ('1011', '103', 'HUANCAN', '1');
INSERT INTO `distrito` VALUES ('1012', '103', 'HUASICANCHA', '1');
INSERT INTO `distrito` VALUES ('1013', '103', 'HUAYUCACHI', '1');
INSERT INTO `distrito` VALUES ('1014', '103', 'INGENIO', '1');
INSERT INTO `distrito` VALUES ('1015', '103', 'PARIAHUANCA', '1');
INSERT INTO `distrito` VALUES ('1016', '103', 'PILCOMAYO', '1');
INSERT INTO `distrito` VALUES ('1017', '103', 'PUCARA', '1');
INSERT INTO `distrito` VALUES ('1018', '103', 'QUICHUAY', '1');
INSERT INTO `distrito` VALUES ('1019', '103', 'QUILCAS', '1');
INSERT INTO `distrito` VALUES ('1020', '103', 'SAN AGUSTIN', '1');
INSERT INTO `distrito` VALUES ('1021', '103', 'SAN JERONIMO DE TUNAN', '1');
INSERT INTO `distrito` VALUES ('1022', '103', 'SAÑO', '1');
INSERT INTO `distrito` VALUES ('1023', '103', 'SAPALLANGA', '1');
INSERT INTO `distrito` VALUES ('1024', '103', 'SICAYA', '1');
INSERT INTO `distrito` VALUES ('1025', '103', 'SANTO DOMINGO DE ACOBAMBA', '1');
INSERT INTO `distrito` VALUES ('1026', '103', 'VIQUES', '1');
INSERT INTO `distrito` VALUES ('1027', '104', 'CONCEPCION', '1');
INSERT INTO `distrito` VALUES ('1028', '104', 'ACO', '1');
INSERT INTO `distrito` VALUES ('1029', '104', 'ANDAMARCA', '1');
INSERT INTO `distrito` VALUES ('1030', '104', 'CHAMBARA', '1');
INSERT INTO `distrito` VALUES ('1031', '104', 'COCHAS', '1');
INSERT INTO `distrito` VALUES ('1032', '104', 'COMAS', '1');
INSERT INTO `distrito` VALUES ('1033', '104', 'HEROINAS TOLEDO', '1');
INSERT INTO `distrito` VALUES ('1034', '104', 'MANZANARES', '1');
INSERT INTO `distrito` VALUES ('1035', '104', 'MARISCAL CASTILLA', '1');
INSERT INTO `distrito` VALUES ('1036', '104', 'MATAHUASI', '1');
INSERT INTO `distrito` VALUES ('1037', '104', 'MITO', '1');
INSERT INTO `distrito` VALUES ('1038', '104', 'NUEVE DE JULIO', '1');
INSERT INTO `distrito` VALUES ('1039', '104', 'ORCOTUNA', '1');
INSERT INTO `distrito` VALUES ('1040', '104', 'SAN JOSE DE QUERO', '1');
INSERT INTO `distrito` VALUES ('1041', '104', 'SANTA ROSA DE OCOPA', '1');
INSERT INTO `distrito` VALUES ('1042', '105', 'CHANCHAMAYO', '1');
INSERT INTO `distrito` VALUES ('1043', '105', 'PERENE', '1');
INSERT INTO `distrito` VALUES ('1044', '105', 'PICHANAQUI', '1');
INSERT INTO `distrito` VALUES ('1045', '105', 'SAN LUIS DE SHUARO', '1');
INSERT INTO `distrito` VALUES ('1046', '105', 'SAN RAMON', '1');
INSERT INTO `distrito` VALUES ('1047', '105', 'VITOC', '1');
INSERT INTO `distrito` VALUES ('1048', '106', 'JAUJA', '1');
INSERT INTO `distrito` VALUES ('1049', '106', 'ACOLLA', '1');
INSERT INTO `distrito` VALUES ('1050', '106', 'APATA', '1');
INSERT INTO `distrito` VALUES ('1051', '106', 'ATAURA', '1');
INSERT INTO `distrito` VALUES ('1052', '106', 'CANCHAYLLO', '1');
INSERT INTO `distrito` VALUES ('1053', '106', 'CURICACA', '1');
INSERT INTO `distrito` VALUES ('1054', '106', 'EL MANTARO', '1');
INSERT INTO `distrito` VALUES ('1055', '106', 'HUAMALI', '1');
INSERT INTO `distrito` VALUES ('1056', '106', 'HUARIPAMPA', '1');
INSERT INTO `distrito` VALUES ('1057', '106', 'HUERTAS', '1');
INSERT INTO `distrito` VALUES ('1058', '106', 'JANJAILLO', '1');
INSERT INTO `distrito` VALUES ('1059', '106', 'JULCAN', '1');
INSERT INTO `distrito` VALUES ('1060', '106', 'LEONOR ORDOÑEZ', '1');
INSERT INTO `distrito` VALUES ('1061', '106', 'LLOCLLAPAMPA', '1');
INSERT INTO `distrito` VALUES ('1062', '106', 'MARCO', '1');
INSERT INTO `distrito` VALUES ('1063', '106', 'MASMA', '1');
INSERT INTO `distrito` VALUES ('1064', '106', 'MASMA CHICCHE', '1');
INSERT INTO `distrito` VALUES ('1065', '106', 'MOLINOS', '1');
INSERT INTO `distrito` VALUES ('1066', '106', 'MONOBAMBA', '1');
INSERT INTO `distrito` VALUES ('1067', '106', 'MUQUI', '1');
INSERT INTO `distrito` VALUES ('1068', '106', 'MUQUIYAUYO', '1');
INSERT INTO `distrito` VALUES ('1069', '106', 'PACA', '1');
INSERT INTO `distrito` VALUES ('1070', '106', 'PACCHA', '1');
INSERT INTO `distrito` VALUES ('1071', '106', 'PANCAN', '1');
INSERT INTO `distrito` VALUES ('1072', '106', 'PARCO', '1');
INSERT INTO `distrito` VALUES ('1073', '106', 'POMACANCHA', '1');
INSERT INTO `distrito` VALUES ('1074', '106', 'RICRAN', '1');
INSERT INTO `distrito` VALUES ('1075', '106', 'SAN LORENZO', '1');
INSERT INTO `distrito` VALUES ('1076', '106', 'SAN PEDRO DE CHUNAN', '1');
INSERT INTO `distrito` VALUES ('1077', '106', 'SAUSA', '1');
INSERT INTO `distrito` VALUES ('1078', '106', 'SINCOS', '1');
INSERT INTO `distrito` VALUES ('1079', '106', 'TUNAN MARCA', '1');
INSERT INTO `distrito` VALUES ('1080', '106', 'YAULI', '1');
INSERT INTO `distrito` VALUES ('1081', '106', 'YAUYOS', '1');
INSERT INTO `distrito` VALUES ('1082', '107', 'JUNIN', '1');
INSERT INTO `distrito` VALUES ('1083', '107', 'CARHUAMAYO', '1');
INSERT INTO `distrito` VALUES ('1084', '107', 'ONDORES', '1');
INSERT INTO `distrito` VALUES ('1085', '107', 'ULCUMAYO', '1');
INSERT INTO `distrito` VALUES ('1086', '108', 'SATIPO', '1');
INSERT INTO `distrito` VALUES ('1087', '108', 'COVIRIALI', '1');
INSERT INTO `distrito` VALUES ('1088', '108', 'LLAYLLA', '1');
INSERT INTO `distrito` VALUES ('1089', '108', 'MAZAMARI', '1');
INSERT INTO `distrito` VALUES ('1090', '108', 'PAMPA HERMOSA', '1');
INSERT INTO `distrito` VALUES ('1091', '108', 'PANGOA', '1');
INSERT INTO `distrito` VALUES ('1092', '108', 'RIO NEGRO', '1');
INSERT INTO `distrito` VALUES ('1093', '108', 'RIO TAMBO', '1');
INSERT INTO `distrito` VALUES ('1094', '109', 'TARMA', '1');
INSERT INTO `distrito` VALUES ('1095', '109', 'ACOBAMBA', '1');
INSERT INTO `distrito` VALUES ('1096', '109', 'HUARICOLCA', '1');
INSERT INTO `distrito` VALUES ('1097', '109', 'HUASAHUASI', '1');
INSERT INTO `distrito` VALUES ('1098', '109', 'LA UNION', '1');
INSERT INTO `distrito` VALUES ('1099', '109', 'PALCA', '1');
INSERT INTO `distrito` VALUES ('1100', '109', 'PALCAMAYO', '1');
INSERT INTO `distrito` VALUES ('1101', '109', 'SAN PEDRO DE CAJAS', '1');
INSERT INTO `distrito` VALUES ('1102', '109', 'TAPO', '1');
INSERT INTO `distrito` VALUES ('1103', '110', 'LA OROYA', '1');
INSERT INTO `distrito` VALUES ('1104', '110', 'CHACAPALPA', '1');
INSERT INTO `distrito` VALUES ('1105', '110', 'HUAY-HUAY', '1');
INSERT INTO `distrito` VALUES ('1106', '110', 'MARCAPOMACOCHA', '1');
INSERT INTO `distrito` VALUES ('1107', '110', 'MOROCOCHA', '1');
INSERT INTO `distrito` VALUES ('1108', '110', 'PACCHA', '1');
INSERT INTO `distrito` VALUES ('1109', '110', 'SANTA BARBARA DE CARHUACAYA', '1');
INSERT INTO `distrito` VALUES ('1110', '110', 'SANTA ROSA DE SACCO', '1');
INSERT INTO `distrito` VALUES ('1111', '110', 'SUITUCANCHA', '1');
INSERT INTO `distrito` VALUES ('1112', '110', 'YAULI', '1');
INSERT INTO `distrito` VALUES ('1113', '111', 'CHUPACA', '1');
INSERT INTO `distrito` VALUES ('1114', '111', 'AHUAC', '1');
INSERT INTO `distrito` VALUES ('1115', '111', 'CHONGOS BAJO', '1');
INSERT INTO `distrito` VALUES ('1116', '111', 'HUACHAC', '1');
INSERT INTO `distrito` VALUES ('1117', '111', 'HUAMANCACA CHICO', '1');
INSERT INTO `distrito` VALUES ('1118', '111', 'SAN JUAN DE ISCOS', '1');
INSERT INTO `distrito` VALUES ('1119', '111', 'SAN JUAN DE JARPA', '1');
INSERT INTO `distrito` VALUES ('1120', '111', 'TRES DE DICIEMBRE', '1');
INSERT INTO `distrito` VALUES ('1121', '111', 'YANACANCHA', '1');
INSERT INTO `distrito` VALUES ('1122', '112', 'TRUJILLO', '1');
INSERT INTO `distrito` VALUES ('1123', '112', 'EL PORVENIR', '1');
INSERT INTO `distrito` VALUES ('1124', '112', 'FLORENCIA DE MORA', '1');
INSERT INTO `distrito` VALUES ('1125', '112', 'HUANCHACO', '1');
INSERT INTO `distrito` VALUES ('1126', '112', 'LA ESPERANZA', '1');
INSERT INTO `distrito` VALUES ('1127', '112', 'LAREDO', '1');
INSERT INTO `distrito` VALUES ('1128', '112', 'MOCHE', '1');
INSERT INTO `distrito` VALUES ('1129', '112', 'POROTO', '1');
INSERT INTO `distrito` VALUES ('1130', '112', 'SALAVERRY', '1');
INSERT INTO `distrito` VALUES ('1131', '112', 'SIMBAL', '1');
INSERT INTO `distrito` VALUES ('1132', '112', 'VICTOR LARCO HERRERA', '1');
INSERT INTO `distrito` VALUES ('1133', '113', 'ASCOPE', '1');
INSERT INTO `distrito` VALUES ('1134', '113', 'CHICAMA', '1');
INSERT INTO `distrito` VALUES ('1135', '113', 'CHOCOPE', '1');
INSERT INTO `distrito` VALUES ('1136', '113', 'MAGDALENA DE CAO', '1');
INSERT INTO `distrito` VALUES ('1137', '113', 'PAIJAN', '1');
INSERT INTO `distrito` VALUES ('1138', '113', 'RAZURI', '1');
INSERT INTO `distrito` VALUES ('1139', '113', 'SANTIAGO DE CAO', '1');
INSERT INTO `distrito` VALUES ('1140', '113', 'CASA GRANDE', '1');
INSERT INTO `distrito` VALUES ('1141', '114', 'BOLIVAR', '1');
INSERT INTO `distrito` VALUES ('1142', '114', 'BAMBAMARCA', '1');
INSERT INTO `distrito` VALUES ('1143', '114', 'CONDORMARCA', '1');
INSERT INTO `distrito` VALUES ('1144', '114', 'LONGOTEA', '1');
INSERT INTO `distrito` VALUES ('1145', '114', 'UCHUMARCA', '1');
INSERT INTO `distrito` VALUES ('1146', '114', 'UCUNCHA', '1');
INSERT INTO `distrito` VALUES ('1147', '115', 'CHEPEN', '1');
INSERT INTO `distrito` VALUES ('1148', '115', 'PACANGA', '1');
INSERT INTO `distrito` VALUES ('1149', '115', 'PUEBLO NUEVO', '1');
INSERT INTO `distrito` VALUES ('1150', '116', 'JULCAN', '1');
INSERT INTO `distrito` VALUES ('1151', '116', 'CALAMARCA', '1');
INSERT INTO `distrito` VALUES ('1152', '116', 'CARABAMBA', '1');
INSERT INTO `distrito` VALUES ('1153', '116', 'HUASO', '1');
INSERT INTO `distrito` VALUES ('1154', '117', 'OTUZCO', '1');
INSERT INTO `distrito` VALUES ('1155', '117', 'AGALLPAMPA', '1');
INSERT INTO `distrito` VALUES ('1156', '117', 'CHARAT', '1');
INSERT INTO `distrito` VALUES ('1157', '117', 'HUARANCHAL', '1');
INSERT INTO `distrito` VALUES ('1158', '117', 'LA CUESTA', '1');
INSERT INTO `distrito` VALUES ('1159', '117', 'MACHE', '1');
INSERT INTO `distrito` VALUES ('1160', '117', 'PARANDAY', '1');
INSERT INTO `distrito` VALUES ('1161', '117', 'SALPO', '1');
INSERT INTO `distrito` VALUES ('1162', '117', 'SINSICAP', '1');
INSERT INTO `distrito` VALUES ('1163', '117', 'USQUIL', '1');
INSERT INTO `distrito` VALUES ('1164', '118', 'SAN PEDRO DE LLOC', '1');
INSERT INTO `distrito` VALUES ('1165', '118', 'GUADALUPE', '1');
INSERT INTO `distrito` VALUES ('1166', '118', 'JEQUETEPEQUE', '1');
INSERT INTO `distrito` VALUES ('1167', '118', 'PACASMAYO', '1');
INSERT INTO `distrito` VALUES ('1168', '118', 'SAN JOSE', '1');
INSERT INTO `distrito` VALUES ('1169', '119', 'TAYABAMBA', '1');
INSERT INTO `distrito` VALUES ('1170', '119', 'BULDIBUYO', '1');
INSERT INTO `distrito` VALUES ('1171', '119', 'CHILLIA', '1');
INSERT INTO `distrito` VALUES ('1172', '119', 'HUANCASPATA', '1');
INSERT INTO `distrito` VALUES ('1173', '119', 'HUAYLILLAS', '1');
INSERT INTO `distrito` VALUES ('1174', '119', 'HUAYO', '1');
INSERT INTO `distrito` VALUES ('1175', '119', 'ONGON', '1');
INSERT INTO `distrito` VALUES ('1176', '119', 'PARCOY', '1');
INSERT INTO `distrito` VALUES ('1177', '119', 'PATAZ', '1');
INSERT INTO `distrito` VALUES ('1178', '119', 'PIAS', '1');
INSERT INTO `distrito` VALUES ('1179', '119', 'SANTIAGO DE CHALLAS', '1');
INSERT INTO `distrito` VALUES ('1180', '119', 'TAURIJA', '1');
INSERT INTO `distrito` VALUES ('1181', '119', 'URPAY', '1');
INSERT INTO `distrito` VALUES ('1182', '120', 'HUAMACHUCO', '1');
INSERT INTO `distrito` VALUES ('1183', '120', 'CHUGAY', '1');
INSERT INTO `distrito` VALUES ('1184', '120', 'COCHORCO', '1');
INSERT INTO `distrito` VALUES ('1185', '120', 'CURGOS', '1');
INSERT INTO `distrito` VALUES ('1186', '120', 'MARCABAL', '1');
INSERT INTO `distrito` VALUES ('1187', '120', 'SANAGORAN', '1');
INSERT INTO `distrito` VALUES ('1188', '120', 'SARIN', '1');
INSERT INTO `distrito` VALUES ('1189', '120', 'SARTIMBAMBA', '1');
INSERT INTO `distrito` VALUES ('1190', '121', 'SANTIAGO DE CHUCO', '1');
INSERT INTO `distrito` VALUES ('1191', '121', 'ANGASMARCA', '1');
INSERT INTO `distrito` VALUES ('1192', '121', 'CACHICADAN', '1');
INSERT INTO `distrito` VALUES ('1193', '121', 'MOLLEBAMBA', '1');
INSERT INTO `distrito` VALUES ('1194', '121', 'MOLLEPATA', '1');
INSERT INTO `distrito` VALUES ('1195', '121', 'QUIRUVILCA', '1');
INSERT INTO `distrito` VALUES ('1196', '121', 'SANTA CRUZ DE CHUCA', '1');
INSERT INTO `distrito` VALUES ('1197', '121', 'SITABAMBA', '1');
INSERT INTO `distrito` VALUES ('1198', '122', 'CASCAS', '1');
INSERT INTO `distrito` VALUES ('1199', '122', 'LUCMA', '1');
INSERT INTO `distrito` VALUES ('1200', '122', 'MARMOT', '1');
INSERT INTO `distrito` VALUES ('1201', '122', 'SAYAPULLO', '1');
INSERT INTO `distrito` VALUES ('1202', '123', 'VIRU', '1');
INSERT INTO `distrito` VALUES ('1203', '123', 'CHAO', '1');
INSERT INTO `distrito` VALUES ('1204', '123', 'GUADALUPITO', '1');
INSERT INTO `distrito` VALUES ('1205', '124', 'CHICLAYO', '1');
INSERT INTO `distrito` VALUES ('1206', '124', 'CHONGOYAPE', '1');
INSERT INTO `distrito` VALUES ('1207', '124', 'ETEN', '1');
INSERT INTO `distrito` VALUES ('1208', '124', 'ETEN PUERTO', '1');
INSERT INTO `distrito` VALUES ('1209', '124', 'JOSE LEONARDO ORTIZ', '1');
INSERT INTO `distrito` VALUES ('1210', '124', 'LA VICTORIA', '1');
INSERT INTO `distrito` VALUES ('1211', '124', 'LAGUNAS', '1');
INSERT INTO `distrito` VALUES ('1212', '124', 'MONSEFU', '1');
INSERT INTO `distrito` VALUES ('1213', '124', 'NUEVA ARICA', '1');
INSERT INTO `distrito` VALUES ('1214', '124', 'OYOTUN', '1');
INSERT INTO `distrito` VALUES ('1215', '124', 'PICSI', '1');
INSERT INTO `distrito` VALUES ('1216', '124', 'PIMENTEL', '1');
INSERT INTO `distrito` VALUES ('1217', '124', 'REQUE', '1');
INSERT INTO `distrito` VALUES ('1218', '124', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('1219', '124', 'SAÃƒÆ’Ã¢â‚¬ËœA', '1');
INSERT INTO `distrito` VALUES ('1220', '124', 'CAYALTI', '1');
INSERT INTO `distrito` VALUES ('1221', '124', 'PATAPO', '1');
INSERT INTO `distrito` VALUES ('1222', '124', 'POMALCA', '1');
INSERT INTO `distrito` VALUES ('1223', '124', 'PUCALA', '1');
INSERT INTO `distrito` VALUES ('1224', '124', 'TUMAN', '1');
INSERT INTO `distrito` VALUES ('1225', '125', 'FERREÑAFE', '1');
INSERT INTO `distrito` VALUES ('1226', '125', 'CAÑARIS', '1');
INSERT INTO `distrito` VALUES ('1227', '125', 'INCAHUASI', '1');
INSERT INTO `distrito` VALUES ('1228', '125', 'MANUEL ANTONIO MESONES MURO', '1');
INSERT INTO `distrito` VALUES ('1229', '125', 'PITIPO', '1');
INSERT INTO `distrito` VALUES ('1230', '125', 'PUEBLO NUEVO', '1');
INSERT INTO `distrito` VALUES ('1231', '126', 'LAMBAYEQUE', '1');
INSERT INTO `distrito` VALUES ('1232', '126', 'CHOCHOPE', '1');
INSERT INTO `distrito` VALUES ('1233', '126', 'ILLIMO', '1');
INSERT INTO `distrito` VALUES ('1234', '126', 'JAYANCA', '1');
INSERT INTO `distrito` VALUES ('1235', '126', 'MOCHUMI', '1');
INSERT INTO `distrito` VALUES ('1236', '126', 'MORROPE', '1');
INSERT INTO `distrito` VALUES ('1237', '126', 'MOTUPE', '1');
INSERT INTO `distrito` VALUES ('1238', '126', 'OLMOS', '1');
INSERT INTO `distrito` VALUES ('1239', '126', 'PACORA', '1');
INSERT INTO `distrito` VALUES ('1240', '126', 'SALAS', '1');
INSERT INTO `distrito` VALUES ('1241', '126', 'SAN JOSE', '1');
INSERT INTO `distrito` VALUES ('1242', '126', 'TUCUME', '1');
INSERT INTO `distrito` VALUES ('1243', '127', 'LIMA', '1');
INSERT INTO `distrito` VALUES ('1244', '127', 'ANCON', '1');
INSERT INTO `distrito` VALUES ('1245', '127', 'ATE', '1');
INSERT INTO `distrito` VALUES ('1246', '127', 'BARRANCO', '1');
INSERT INTO `distrito` VALUES ('1247', '127', 'BREÑA', '1');
INSERT INTO `distrito` VALUES ('1248', '127', 'CARABAYLLO', '1');
INSERT INTO `distrito` VALUES ('1249', '127', 'CHACLACAYO', '1');
INSERT INTO `distrito` VALUES ('1250', '127', 'CHORRILLOS', '1');
INSERT INTO `distrito` VALUES ('1251', '127', 'CIENEGUILLA', '1');
INSERT INTO `distrito` VALUES ('1252', '127', 'COMAS', '1');
INSERT INTO `distrito` VALUES ('1253', '127', 'EL AGUSTINO', '1');
INSERT INTO `distrito` VALUES ('1254', '127', 'INDEPENDENCIA', '1');
INSERT INTO `distrito` VALUES ('1255', '127', 'JESUS MARIA', '1');
INSERT INTO `distrito` VALUES ('1256', '127', 'LA MOLINA', '1');
INSERT INTO `distrito` VALUES ('1257', '127', 'LA VICTORIA', '1');
INSERT INTO `distrito` VALUES ('1258', '127', 'LINCE', '1');
INSERT INTO `distrito` VALUES ('1259', '127', 'LOS OLIVOS', '1');
INSERT INTO `distrito` VALUES ('1260', '127', 'LURIGANCHO', '1');
INSERT INTO `distrito` VALUES ('1261', '127', 'LURIN', '1');
INSERT INTO `distrito` VALUES ('1262', '127', 'MAGDALENA DEL MAR', '1');
INSERT INTO `distrito` VALUES ('1263', '127', 'MAGDALENA VIEJA', '1');
INSERT INTO `distrito` VALUES ('1264', '127', 'MIRAFLORES', '1');
INSERT INTO `distrito` VALUES ('1265', '127', 'PACHACAMAC', '1');
INSERT INTO `distrito` VALUES ('1266', '127', 'PUCUSANA', '1');
INSERT INTO `distrito` VALUES ('1267', '127', 'PUENTE PIEDRA', '1');
INSERT INTO `distrito` VALUES ('1268', '127', 'PUNTA HERMOSA', '1');
INSERT INTO `distrito` VALUES ('1269', '127', 'PUNTA NEGRA', '1');
INSERT INTO `distrito` VALUES ('1270', '127', 'RIMAC', '1');
INSERT INTO `distrito` VALUES ('1271', '127', 'SAN BARTOLO', '1');
INSERT INTO `distrito` VALUES ('1272', '127', 'SAN BORJA', '1');
INSERT INTO `distrito` VALUES ('1273', '127', 'SAN ISIDRO', '1');
INSERT INTO `distrito` VALUES ('1274', '127', 'SAN JUAN DE LURIGANCHO', '1');
INSERT INTO `distrito` VALUES ('1275', '127', 'SAN JUAN DE MIRAFLORES', '1');
INSERT INTO `distrito` VALUES ('1276', '127', 'SAN LUIS', '1');
INSERT INTO `distrito` VALUES ('1277', '127', 'SAN MARTIN DE PORRES', '1');
INSERT INTO `distrito` VALUES ('1278', '127', 'SAN MIGUEL', '1');
INSERT INTO `distrito` VALUES ('1279', '127', 'SANTA ANITA', '1');
INSERT INTO `distrito` VALUES ('1280', '127', 'SANTA MARIA DEL MAR', '1');
INSERT INTO `distrito` VALUES ('1281', '127', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('1282', '127', 'SANTIAGO DE SURCO', '1');
INSERT INTO `distrito` VALUES ('1283', '127', 'SURQUILLO', '1');
INSERT INTO `distrito` VALUES ('1284', '127', 'VILLA EL SALVADOR', '1');
INSERT INTO `distrito` VALUES ('1285', '127', 'VILLA MARIA DEL TRIUNFO', '1');
INSERT INTO `distrito` VALUES ('1286', '127', 'PUEBLO LIBRE', '1');
INSERT INTO `distrito` VALUES ('1287', '128', 'BARRANCA', '1');
INSERT INTO `distrito` VALUES ('1288', '128', 'PARAMONGA', '1');
INSERT INTO `distrito` VALUES ('1289', '128', 'PATIVILCA', '1');
INSERT INTO `distrito` VALUES ('1290', '128', 'SUPE', '1');
INSERT INTO `distrito` VALUES ('1291', '128', 'SUPE PUERTO', '1');
INSERT INTO `distrito` VALUES ('1292', '129', 'CAJATAMBO', '1');
INSERT INTO `distrito` VALUES ('1293', '129', 'COPA', '1');
INSERT INTO `distrito` VALUES ('1294', '129', 'GORGOR', '1');
INSERT INTO `distrito` VALUES ('1295', '129', 'HUANCAPON', '1');
INSERT INTO `distrito` VALUES ('1296', '129', 'MANAS', '1');
INSERT INTO `distrito` VALUES ('1297', '130', 'CANTA', '1');
INSERT INTO `distrito` VALUES ('1298', '130', 'ARAHUAY', '1');
INSERT INTO `distrito` VALUES ('1299', '130', 'HUAMANTANGA', '1');
INSERT INTO `distrito` VALUES ('1300', '130', 'HUAROS', '1');
INSERT INTO `distrito` VALUES ('1301', '130', 'LACHAQUI', '1');
INSERT INTO `distrito` VALUES ('1302', '130', 'SAN BUENAVENTURA', '1');
INSERT INTO `distrito` VALUES ('1303', '130', 'SANTA ROSA DE QUIVES', '1');
INSERT INTO `distrito` VALUES ('1304', '131', 'SAN VICENTE DE CAÑETE', '1');
INSERT INTO `distrito` VALUES ('1305', '131', 'ASIA', '1');
INSERT INTO `distrito` VALUES ('1306', '131', 'CALANGO', '1');
INSERT INTO `distrito` VALUES ('1307', '131', 'CERRO AZUL', '1');
INSERT INTO `distrito` VALUES ('1308', '131', 'CHILCA', '1');
INSERT INTO `distrito` VALUES ('1309', '131', 'COAYLLO', '1');
INSERT INTO `distrito` VALUES ('1310', '131', 'IMPERIAL', '1');
INSERT INTO `distrito` VALUES ('1311', '131', 'LUNAHUANA', '1');
INSERT INTO `distrito` VALUES ('1312', '131', 'MALA', '1');
INSERT INTO `distrito` VALUES ('1313', '131', 'NUEVO IMPERIAL', '1');
INSERT INTO `distrito` VALUES ('1314', '131', 'PACARAN', '1');
INSERT INTO `distrito` VALUES ('1315', '131', 'QUILMANA', '1');
INSERT INTO `distrito` VALUES ('1316', '131', 'SAN ANTONIO', '1');
INSERT INTO `distrito` VALUES ('1317', '131', 'SAN LUIS', '1');
INSERT INTO `distrito` VALUES ('1318', '131', 'SANTA CRUZ DE FLORES', '1');
INSERT INTO `distrito` VALUES ('1319', '131', 'ZUÃƒÆ’Ã¢â‚¬ËœIGA', '1');
INSERT INTO `distrito` VALUES ('1320', '132', 'HUARAL', '1');
INSERT INTO `distrito` VALUES ('1321', '132', 'ATAVILLOS ALTO', '1');
INSERT INTO `distrito` VALUES ('1322', '132', 'ATAVILLOS BAJO', '1');
INSERT INTO `distrito` VALUES ('1323', '132', 'AUCALLAMA', '1');
INSERT INTO `distrito` VALUES ('1324', '132', 'CHANCAY', '1');
INSERT INTO `distrito` VALUES ('1325', '132', 'IHUARI', '1');
INSERT INTO `distrito` VALUES ('1326', '132', 'LAMPIAN', '1');
INSERT INTO `distrito` VALUES ('1327', '132', 'PACARAOS', '1');
INSERT INTO `distrito` VALUES ('1328', '132', 'SAN MIGUEL DE ACOS', '1');
INSERT INTO `distrito` VALUES ('1329', '132', 'SANTA CRUZ DE ANDAMARCA', '1');
INSERT INTO `distrito` VALUES ('1330', '132', 'SUMBILCA', '1');
INSERT INTO `distrito` VALUES ('1331', '132', 'VEINTISIETE DE NOVIEMBRE', '1');
INSERT INTO `distrito` VALUES ('1332', '133', 'MATUCANA', '1');
INSERT INTO `distrito` VALUES ('1333', '133', 'ANTIOQUIA', '1');
INSERT INTO `distrito` VALUES ('1334', '133', 'CALLAHUANCA', '1');
INSERT INTO `distrito` VALUES ('1335', '133', 'CARAMPOMA', '1');
INSERT INTO `distrito` VALUES ('1336', '133', 'CHICLA', '1');
INSERT INTO `distrito` VALUES ('1337', '133', 'CUENCA', '1');
INSERT INTO `distrito` VALUES ('1338', '133', 'HUACHUPAMPA', '1');
INSERT INTO `distrito` VALUES ('1339', '133', 'HUANZA', '1');
INSERT INTO `distrito` VALUES ('1340', '133', 'HUAROCHIRI', '1');
INSERT INTO `distrito` VALUES ('1341', '133', 'LAHUAYTAMBO', '1');
INSERT INTO `distrito` VALUES ('1342', '133', 'LANGA', '1');
INSERT INTO `distrito` VALUES ('1343', '133', 'LARAOS', '1');
INSERT INTO `distrito` VALUES ('1344', '133', 'MARIATANA', '1');
INSERT INTO `distrito` VALUES ('1345', '133', 'RICARDO PALMA', '1');
INSERT INTO `distrito` VALUES ('1346', '133', 'SAN ANDRES DE TUPICOCHA', '1');
INSERT INTO `distrito` VALUES ('1347', '133', 'SAN ANTONIO', '1');
INSERT INTO `distrito` VALUES ('1348', '133', 'SAN BARTOLOME', '1');
INSERT INTO `distrito` VALUES ('1349', '133', 'SAN DAMIAN', '1');
INSERT INTO `distrito` VALUES ('1350', '133', 'SAN JUAN DE IRIS', '1');
INSERT INTO `distrito` VALUES ('1351', '133', 'SAN JUAN DE TANTARANCHE', '1');
INSERT INTO `distrito` VALUES ('1352', '133', 'SAN LORENZO DE QUINTI', '1');
INSERT INTO `distrito` VALUES ('1353', '133', 'SAN MATEO', '1');
INSERT INTO `distrito` VALUES ('1354', '133', 'SAN MATEO DE OTAO', '1');
INSERT INTO `distrito` VALUES ('1355', '133', 'SAN PEDRO DE CASTA', '1');
INSERT INTO `distrito` VALUES ('1356', '133', 'SAN PEDRO DE HUANCAYRE', '1');
INSERT INTO `distrito` VALUES ('1357', '133', 'SANGALLAYA', '1');
INSERT INTO `distrito` VALUES ('1358', '133', 'SANTA CRUZ DE COCACHACRA', '1');
INSERT INTO `distrito` VALUES ('1359', '133', 'SANTA EULALIA', '1');
INSERT INTO `distrito` VALUES ('1360', '133', 'SANTIAGO DE ANCHUCAYA', '1');
INSERT INTO `distrito` VALUES ('1361', '133', 'SANTIAGO DE TUNA', '1');
INSERT INTO `distrito` VALUES ('1362', '133', 'SANTO DOMINGO DE LOS OLLERO', '1');
INSERT INTO `distrito` VALUES ('1363', '133', 'SURCO', '1');
INSERT INTO `distrito` VALUES ('1364', '134', 'HUACHO', '1');
INSERT INTO `distrito` VALUES ('1365', '134', 'AMBAR', '1');
INSERT INTO `distrito` VALUES ('1366', '134', 'CALETA DE CARQUIN', '1');
INSERT INTO `distrito` VALUES ('1367', '134', 'CHECRAS', '1');
INSERT INTO `distrito` VALUES ('1368', '134', 'HUALMAY', '1');
INSERT INTO `distrito` VALUES ('1369', '134', 'HUAURA', '1');
INSERT INTO `distrito` VALUES ('1370', '134', 'LEONCIO PRADO', '1');
INSERT INTO `distrito` VALUES ('1371', '134', 'PACCHO', '1');
INSERT INTO `distrito` VALUES ('1372', '134', 'SANTA LEONOR', '1');
INSERT INTO `distrito` VALUES ('1373', '134', 'SANTA MARIA', '1');
INSERT INTO `distrito` VALUES ('1374', '134', 'SAYAN', '1');
INSERT INTO `distrito` VALUES ('1375', '134', 'VEGUETA', '1');
INSERT INTO `distrito` VALUES ('1376', '135', 'OYON', '1');
INSERT INTO `distrito` VALUES ('1377', '135', 'ANDAJES', '1');
INSERT INTO `distrito` VALUES ('1378', '135', 'CAUJUL', '1');
INSERT INTO `distrito` VALUES ('1379', '135', 'COCHAMARCA', '1');
INSERT INTO `distrito` VALUES ('1380', '135', 'NAVAN', '1');
INSERT INTO `distrito` VALUES ('1381', '135', 'PACHANGARA', '1');
INSERT INTO `distrito` VALUES ('1382', '136', 'YAUYOS', '1');
INSERT INTO `distrito` VALUES ('1383', '136', 'ALIS', '1');
INSERT INTO `distrito` VALUES ('1384', '136', 'AYAUCA', '1');
INSERT INTO `distrito` VALUES ('1385', '136', 'AYAVIRI', '1');
INSERT INTO `distrito` VALUES ('1386', '136', 'AZANGARO', '1');
INSERT INTO `distrito` VALUES ('1387', '136', 'CACRA', '1');
INSERT INTO `distrito` VALUES ('1388', '136', 'CARANIA', '1');
INSERT INTO `distrito` VALUES ('1389', '136', 'CATAHUASI', '1');
INSERT INTO `distrito` VALUES ('1390', '136', 'CHOCOS', '1');
INSERT INTO `distrito` VALUES ('1391', '136', 'COCHAS', '1');
INSERT INTO `distrito` VALUES ('1392', '136', 'COLONIA', '1');
INSERT INTO `distrito` VALUES ('1393', '136', 'HONGOS', '1');
INSERT INTO `distrito` VALUES ('1394', '136', 'HUAMPARA', '1');
INSERT INTO `distrito` VALUES ('1395', '136', 'HUANCAYA', '1');
INSERT INTO `distrito` VALUES ('1396', '136', 'HUANGASCAR', '1');
INSERT INTO `distrito` VALUES ('1397', '136', 'HUANTAN', '1');
INSERT INTO `distrito` VALUES ('1398', '136', 'HUAÑEC', '1');
INSERT INTO `distrito` VALUES ('1399', '136', 'LARAOS', '1');
INSERT INTO `distrito` VALUES ('1400', '136', 'LINCHA', '1');
INSERT INTO `distrito` VALUES ('1401', '136', 'MADEAN', '1');
INSERT INTO `distrito` VALUES ('1402', '136', 'MIRAFLORES', '1');
INSERT INTO `distrito` VALUES ('1403', '136', 'OMAS', '1');
INSERT INTO `distrito` VALUES ('1404', '136', 'PUTINZA', '1');
INSERT INTO `distrito` VALUES ('1405', '136', 'QUINCHES', '1');
INSERT INTO `distrito` VALUES ('1406', '136', 'QUINOCAY', '1');
INSERT INTO `distrito` VALUES ('1407', '136', 'SAN JOAQUIN', '1');
INSERT INTO `distrito` VALUES ('1408', '136', 'SAN PEDRO DE PILAS', '1');
INSERT INTO `distrito` VALUES ('1409', '136', 'TANTA', '1');
INSERT INTO `distrito` VALUES ('1410', '136', 'TAURIPAMPA', '1');
INSERT INTO `distrito` VALUES ('1411', '136', 'TOMAS', '1');
INSERT INTO `distrito` VALUES ('1412', '136', 'TUPE', '1');
INSERT INTO `distrito` VALUES ('1413', '136', 'VIÃƒÆ’Ã¢â‚¬ËœAC', '1');
INSERT INTO `distrito` VALUES ('1414', '136', 'VITIS', '1');
INSERT INTO `distrito` VALUES ('1415', '138', 'IQUITOS', '1');
INSERT INTO `distrito` VALUES ('1416', '138', 'ALTO NANAY', '1');
INSERT INTO `distrito` VALUES ('1417', '138', 'FERNANDO LORES', '1');
INSERT INTO `distrito` VALUES ('1418', '138', 'INDIANA', '1');
INSERT INTO `distrito` VALUES ('1419', '138', 'LAS AMAZONAS', '1');
INSERT INTO `distrito` VALUES ('1420', '138', 'MAZAN', '1');
INSERT INTO `distrito` VALUES ('1421', '138', 'NAPO', '1');
INSERT INTO `distrito` VALUES ('1422', '138', 'PUNCHANA', '1');
INSERT INTO `distrito` VALUES ('1423', '138', 'PUTUMAYO', '1');
INSERT INTO `distrito` VALUES ('1424', '138', 'TORRES CAUSANA', '1');
INSERT INTO `distrito` VALUES ('1425', '138', 'BELEN', '1');
INSERT INTO `distrito` VALUES ('1426', '138', 'SAN JUAN BAUTISTA', '1');
INSERT INTO `distrito` VALUES ('1427', '139', 'YURIMAGUAS', '1');
INSERT INTO `distrito` VALUES ('1428', '139', 'BALSAPUERTO', '1');
INSERT INTO `distrito` VALUES ('1429', '139', 'BARRANCA', '1');
INSERT INTO `distrito` VALUES ('1430', '139', 'CAHUAPANAS', '1');
INSERT INTO `distrito` VALUES ('1431', '139', 'JEBEROS', '1');
INSERT INTO `distrito` VALUES ('1432', '139', 'LAGUNAS', '1');
INSERT INTO `distrito` VALUES ('1433', '139', 'MANSERICHE', '1');
INSERT INTO `distrito` VALUES ('1434', '139', 'MORONA', '1');
INSERT INTO `distrito` VALUES ('1435', '139', 'PASTAZA', '1');
INSERT INTO `distrito` VALUES ('1436', '139', 'SANTA CRUZ', '1');
INSERT INTO `distrito` VALUES ('1437', '139', 'TENIENTE CESAR LOPEZ ROJAS', '1');
INSERT INTO `distrito` VALUES ('1438', '140', 'NAUTA', '1');
INSERT INTO `distrito` VALUES ('1439', '140', 'PARINARI', '1');
INSERT INTO `distrito` VALUES ('1440', '140', 'TIGRE', '1');
INSERT INTO `distrito` VALUES ('1441', '140', 'TROMPETEROS', '1');
INSERT INTO `distrito` VALUES ('1442', '140', 'URARINAS', '1');
INSERT INTO `distrito` VALUES ('1443', '141', 'RAMON CASTILLA', '1');
INSERT INTO `distrito` VALUES ('1444', '141', 'PEBAS', '1');
INSERT INTO `distrito` VALUES ('1445', '141', 'YAVARI', '1');
INSERT INTO `distrito` VALUES ('1446', '141', 'SAN PABLO', '1');
INSERT INTO `distrito` VALUES ('1447', '142', 'REQUENA', '1');
INSERT INTO `distrito` VALUES ('1448', '142', 'ALTO TAPICHE', '1');
INSERT INTO `distrito` VALUES ('1449', '142', 'CAPELO', '1');
INSERT INTO `distrito` VALUES ('1450', '142', 'EMILIO SAN MARTIN', '1');
INSERT INTO `distrito` VALUES ('1451', '142', 'MAQUIA', '1');
INSERT INTO `distrito` VALUES ('1452', '142', 'PUINAHUA', '1');
INSERT INTO `distrito` VALUES ('1453', '142', 'SAQUENA', '1');
INSERT INTO `distrito` VALUES ('1454', '142', 'SOPLIN', '1');
INSERT INTO `distrito` VALUES ('1455', '142', 'TAPICHE', '1');
INSERT INTO `distrito` VALUES ('1456', '142', 'JENARO HERRERA', '1');
INSERT INTO `distrito` VALUES ('1457', '142', 'YAQUERANA', '1');
INSERT INTO `distrito` VALUES ('1458', '143', 'CONTAMANA', '1');
INSERT INTO `distrito` VALUES ('1459', '143', 'INAHUAYA', '1');
INSERT INTO `distrito` VALUES ('1460', '143', 'PADRE MARQUEZ', '1');
INSERT INTO `distrito` VALUES ('1461', '143', 'PAMPA HERMOSA', '1');
INSERT INTO `distrito` VALUES ('1462', '143', 'SARAYACU', '1');
INSERT INTO `distrito` VALUES ('1463', '143', 'VARGAS GUERRA', '1');
INSERT INTO `distrito` VALUES ('1464', '144', 'TAMBOPATA', '1');
INSERT INTO `distrito` VALUES ('1465', '144', 'INAMBARI', '1');
INSERT INTO `distrito` VALUES ('1466', '144', 'LAS PIEDRAS', '1');
INSERT INTO `distrito` VALUES ('1467', '144', 'LABERINTO', '1');
INSERT INTO `distrito` VALUES ('1468', '145', 'MANU', '1');
INSERT INTO `distrito` VALUES ('1469', '145', 'FITZCARRALD', '1');
INSERT INTO `distrito` VALUES ('1470', '145', 'MADRE DE DIOS', '1');
INSERT INTO `distrito` VALUES ('1471', '145', 'HUEPETUHE', '1');
INSERT INTO `distrito` VALUES ('1472', '146', 'IÃƒÆ’Ã‚?APARI', '1');
INSERT INTO `distrito` VALUES ('1473', '146', 'IBERIA', '1');
INSERT INTO `distrito` VALUES ('1474', '146', 'TAHUAMANU', '1');
INSERT INTO `distrito` VALUES ('1475', '147', 'MOQUEGUA', '1');
INSERT INTO `distrito` VALUES ('1476', '147', 'CARUMAS', '1');
INSERT INTO `distrito` VALUES ('1477', '147', 'CUCHUMBAYA', '1');
INSERT INTO `distrito` VALUES ('1478', '147', 'SAMEGUA', '1');
INSERT INTO `distrito` VALUES ('1479', '147', 'SAN CRISTOBAL', '1');
INSERT INTO `distrito` VALUES ('1480', '147', 'TORATA', '1');
INSERT INTO `distrito` VALUES ('1481', '148', 'OMATE', '1');
INSERT INTO `distrito` VALUES ('1482', '148', 'CHOJATA', '1');
INSERT INTO `distrito` VALUES ('1483', '148', 'COALAQUE', '1');
INSERT INTO `distrito` VALUES ('1484', '148', 'ICHUÃƒÆ’Ã‚?A', '1');
INSERT INTO `distrito` VALUES ('1485', '148', 'LA CAPILLA', '1');
INSERT INTO `distrito` VALUES ('1486', '148', 'LLOQUE', '1');
INSERT INTO `distrito` VALUES ('1487', '148', 'MATALAQUE', '1');
INSERT INTO `distrito` VALUES ('1488', '148', 'PUQUINA', '1');
INSERT INTO `distrito` VALUES ('1489', '148', 'QUINISTAQUILLAS', '1');
INSERT INTO `distrito` VALUES ('1490', '148', 'UBINAS', '1');
INSERT INTO `distrito` VALUES ('1491', '148', 'YUNGA', '1');
INSERT INTO `distrito` VALUES ('1492', '149', 'ILO', '1');
INSERT INTO `distrito` VALUES ('1493', '149', 'EL ALGARROBAL', '1');
INSERT INTO `distrito` VALUES ('1494', '149', 'PACOCHA', '1');
INSERT INTO `distrito` VALUES ('1495', '150', 'CHAUPIMARCA', '1');
INSERT INTO `distrito` VALUES ('1496', '150', 'HUACHON', '1');
INSERT INTO `distrito` VALUES ('1497', '150', 'HUARIACA', '1');
INSERT INTO `distrito` VALUES ('1498', '150', 'HUAYLLAY', '1');
INSERT INTO `distrito` VALUES ('1499', '150', 'NINACACA', '1');
INSERT INTO `distrito` VALUES ('1500', '150', 'PALLANCHACRA', '1');
INSERT INTO `distrito` VALUES ('1501', '150', 'PAUCARTAMBO', '1');
INSERT INTO `distrito` VALUES ('1502', '150', 'SAN FCO.DE ASIS DE YARUSYAC', '1');
INSERT INTO `distrito` VALUES ('1503', '150', 'SIMON BOLIVAR', '1');
INSERT INTO `distrito` VALUES ('1504', '150', 'TICLACAYAN', '1');
INSERT INTO `distrito` VALUES ('1505', '150', 'TINYAHUARCO', '1');
INSERT INTO `distrito` VALUES ('1506', '150', 'VICCO', '1');
INSERT INTO `distrito` VALUES ('1507', '150', 'YANACANCHA', '1');
INSERT INTO `distrito` VALUES ('1508', '151', 'YANAHUANCA', '1');
INSERT INTO `distrito` VALUES ('1509', '151', 'CHACAYAN', '1');
INSERT INTO `distrito` VALUES ('1510', '151', 'GOYLLARISQUIZGA', '1');
INSERT INTO `distrito` VALUES ('1511', '151', 'PAUCAR', '1');
INSERT INTO `distrito` VALUES ('1512', '151', 'SAN PEDRO DE PILLAO', '1');
INSERT INTO `distrito` VALUES ('1513', '151', 'SANTA ANA DE TUSI', '1');
INSERT INTO `distrito` VALUES ('1514', '151', 'TAPUC', '1');
INSERT INTO `distrito` VALUES ('1515', '151', 'VILCABAMBA', '1');
INSERT INTO `distrito` VALUES ('1516', '152', 'OXAPAMPA', '1');
INSERT INTO `distrito` VALUES ('1517', '152', 'CHONTABAMBA', '1');
INSERT INTO `distrito` VALUES ('1518', '152', 'HUANCABAMBA', '1');
INSERT INTO `distrito` VALUES ('1519', '152', 'PALCAZU', '1');
INSERT INTO `distrito` VALUES ('1520', '152', 'POZUZO', '1');
INSERT INTO `distrito` VALUES ('1521', '152', 'PUERTO BERMUDEZ', '1');
INSERT INTO `distrito` VALUES ('1522', '152', 'VILLA RICA', '1');
INSERT INTO `distrito` VALUES ('1523', '153', 'PIURA', '1');
INSERT INTO `distrito` VALUES ('1524', '153', 'CASTILLA', '1');
INSERT INTO `distrito` VALUES ('1525', '153', 'CATACAOS', '1');
INSERT INTO `distrito` VALUES ('1526', '153', 'CURA MORI', '1');
INSERT INTO `distrito` VALUES ('1527', '153', 'EL TALLAN', '1');
INSERT INTO `distrito` VALUES ('1528', '153', 'LA ARENA', '1');
INSERT INTO `distrito` VALUES ('1529', '153', 'LA UNION', '1');
INSERT INTO `distrito` VALUES ('1530', '153', 'LAS LOMAS', '1');
INSERT INTO `distrito` VALUES ('1531', '153', 'TAMBO GRANDE', '1');
INSERT INTO `distrito` VALUES ('1532', '154', 'AYABACA', '1');
INSERT INTO `distrito` VALUES ('1533', '154', 'FRIAS', '1');
INSERT INTO `distrito` VALUES ('1534', '154', 'JILILI', '1');
INSERT INTO `distrito` VALUES ('1535', '154', 'LAGUNAS', '1');
INSERT INTO `distrito` VALUES ('1536', '154', 'MONTERO', '1');
INSERT INTO `distrito` VALUES ('1537', '154', 'PACAIPAMPA', '1');
INSERT INTO `distrito` VALUES ('1538', '154', 'PAIMAS', '1');
INSERT INTO `distrito` VALUES ('1539', '154', 'SAPILLICA', '1');
INSERT INTO `distrito` VALUES ('1540', '154', 'SICCHEZ', '1');
INSERT INTO `distrito` VALUES ('1541', '154', 'SUYO', '1');
INSERT INTO `distrito` VALUES ('1542', '155', 'HUANCABAMBA', '1');
INSERT INTO `distrito` VALUES ('1543', '155', 'CANCHAQUE', '1');
INSERT INTO `distrito` VALUES ('1544', '155', 'EL CARMEN DE LA FRONTERA', '1');
INSERT INTO `distrito` VALUES ('1545', '155', 'HUARMACA', '1');
INSERT INTO `distrito` VALUES ('1546', '155', 'LALAQUIZ', '1');
INSERT INTO `distrito` VALUES ('1547', '155', 'SAN MIGUEL DE EL FAIQUE', '1');
INSERT INTO `distrito` VALUES ('1548', '155', 'SONDOR', '1');
INSERT INTO `distrito` VALUES ('1549', '155', 'SONDORILLO', '1');
INSERT INTO `distrito` VALUES ('1550', '156', 'CHULUCANAS', '1');
INSERT INTO `distrito` VALUES ('1551', '156', 'BUENOS AIRES', '1');
INSERT INTO `distrito` VALUES ('1552', '156', 'CHALACO', '1');
INSERT INTO `distrito` VALUES ('1553', '156', 'LA MATANZA', '1');
INSERT INTO `distrito` VALUES ('1554', '156', 'MORROPON', '1');
INSERT INTO `distrito` VALUES ('1555', '156', 'SALITRAL', '1');
INSERT INTO `distrito` VALUES ('1556', '156', 'SAN JUAN DE BIGOTE', '1');
INSERT INTO `distrito` VALUES ('1557', '156', 'SANTA CATALINA DE MOSSA', '1');
INSERT INTO `distrito` VALUES ('1558', '156', 'SANTO DOMINGO', '1');
INSERT INTO `distrito` VALUES ('1559', '156', 'YAMANGO', '1');
INSERT INTO `distrito` VALUES ('1560', '157', 'PAITA', '1');
INSERT INTO `distrito` VALUES ('1561', '157', 'AMOTAPE', '1');
INSERT INTO `distrito` VALUES ('1562', '157', 'ARENAL', '1');
INSERT INTO `distrito` VALUES ('1563', '157', 'COLAN', '1');
INSERT INTO `distrito` VALUES ('1564', '157', 'LA HUACA', '1');
INSERT INTO `distrito` VALUES ('1565', '157', 'TAMARINDO', '1');
INSERT INTO `distrito` VALUES ('1566', '157', 'VICHAYAL', '1');
INSERT INTO `distrito` VALUES ('1567', '158', 'SULLANA', '1');
INSERT INTO `distrito` VALUES ('1568', '158', 'BELLAVISTA', '1');
INSERT INTO `distrito` VALUES ('1569', '158', 'IGNACIO ESCUDERO', '1');
INSERT INTO `distrito` VALUES ('1570', '158', 'LANCONES', '1');
INSERT INTO `distrito` VALUES ('1571', '158', 'MARCAVELICA', '1');
INSERT INTO `distrito` VALUES ('1572', '158', 'MIGUEL CHECA', '1');
INSERT INTO `distrito` VALUES ('1573', '158', 'QUERECOTILLO', '1');
INSERT INTO `distrito` VALUES ('1574', '158', 'SALITRAL', '1');
INSERT INTO `distrito` VALUES ('1575', '159', 'PARIÃƒÆ’Ã¢â‚¬ËœAS', '1');
INSERT INTO `distrito` VALUES ('1576', '159', 'EL ALTO', '1');
INSERT INTO `distrito` VALUES ('1577', '159', 'LA BREA', '1');
INSERT INTO `distrito` VALUES ('1578', '159', 'LOBITOS', '1');
INSERT INTO `distrito` VALUES ('1579', '159', 'LOS ORGANOS', '1');
INSERT INTO `distrito` VALUES ('1580', '159', 'MANCORA', '1');
INSERT INTO `distrito` VALUES ('1581', '160', 'SECHURA', '1');
INSERT INTO `distrito` VALUES ('1582', '160', 'BELLAVISTA DE LA UNION', '1');
INSERT INTO `distrito` VALUES ('1583', '160', 'BERNAL', '1');
INSERT INTO `distrito` VALUES ('1584', '160', 'CRISTO NOS VALGA', '1');
INSERT INTO `distrito` VALUES ('1585', '160', 'VICE', '1');
INSERT INTO `distrito` VALUES ('1586', '160', 'RINCONADA LLICUAR', '1');
INSERT INTO `distrito` VALUES ('1587', '161', 'PUNO', '1');
INSERT INTO `distrito` VALUES ('1588', '161', 'ACORA', '1');
INSERT INTO `distrito` VALUES ('1589', '161', 'AMANTANI', '1');
INSERT INTO `distrito` VALUES ('1590', '161', 'ATUNCOLLA', '1');
INSERT INTO `distrito` VALUES ('1591', '161', 'CAPACHICA', '1');
INSERT INTO `distrito` VALUES ('1592', '161', 'CHUCUITO', '1');
INSERT INTO `distrito` VALUES ('1593', '161', 'COATA', '1');
INSERT INTO `distrito` VALUES ('1594', '161', 'HUATA', '1');
INSERT INTO `distrito` VALUES ('1595', '161', 'MAÃƒÆ’Ã¢â‚¬ËœAZO', '1');
INSERT INTO `distrito` VALUES ('1596', '161', 'PAUCARCOLLA', '1');
INSERT INTO `distrito` VALUES ('1597', '161', 'PICHACANI', '1');
INSERT INTO `distrito` VALUES ('1598', '161', 'PLATERIA', '1');
INSERT INTO `distrito` VALUES ('1599', '161', 'SAN ANTONIO', '1');
INSERT INTO `distrito` VALUES ('1600', '161', 'TIQUILLACA', '1');
INSERT INTO `distrito` VALUES ('1601', '161', 'VILQUE', '1');
INSERT INTO `distrito` VALUES ('1602', '162', 'AZANGARO', '1');
INSERT INTO `distrito` VALUES ('1603', '162', 'ACHAYA', '1');
INSERT INTO `distrito` VALUES ('1604', '162', 'ARAPA', '1');
INSERT INTO `distrito` VALUES ('1605', '162', 'ASILLO', '1');
INSERT INTO `distrito` VALUES ('1606', '162', 'CAMINACA', '1');
INSERT INTO `distrito` VALUES ('1607', '162', 'CHUPA', '1');
INSERT INTO `distrito` VALUES ('1608', '162', 'JOSE DOMINGO CHOQUEHUANCA', '1');
INSERT INTO `distrito` VALUES ('1609', '162', 'MUÃƒÆ’Ã¢â‚¬ËœANI', '1');
INSERT INTO `distrito` VALUES ('1610', '162', 'POTONI', '1');
INSERT INTO `distrito` VALUES ('1611', '162', 'SAMAN', '1');
INSERT INTO `distrito` VALUES ('1612', '162', 'SAN ANTON', '1');
INSERT INTO `distrito` VALUES ('1613', '162', 'SAN JOSE', '1');
INSERT INTO `distrito` VALUES ('1614', '162', 'SAN JUAN DE SALINAS', '1');
INSERT INTO `distrito` VALUES ('1615', '162', 'SANTIAGO DE PUPUJA', '1');
INSERT INTO `distrito` VALUES ('1616', '162', 'TIRAPATA', '1');
INSERT INTO `distrito` VALUES ('1617', '163', 'MACUSANI', '1');
INSERT INTO `distrito` VALUES ('1618', '163', 'AJOYANI', '1');
INSERT INTO `distrito` VALUES ('1619', '163', 'AYAPATA', '1');
INSERT INTO `distrito` VALUES ('1620', '163', 'COASA', '1');
INSERT INTO `distrito` VALUES ('1621', '163', 'CORANI', '1');
INSERT INTO `distrito` VALUES ('1622', '163', 'CRUCERO', '1');
INSERT INTO `distrito` VALUES ('1623', '163', 'ITUATA', '1');
INSERT INTO `distrito` VALUES ('1624', '163', 'OLLACHEA', '1');
INSERT INTO `distrito` VALUES ('1625', '163', 'SAN GABAN', '1');
INSERT INTO `distrito` VALUES ('1626', '163', 'USICAYOS', '1');
INSERT INTO `distrito` VALUES ('1627', '164', 'JULI', '1');
INSERT INTO `distrito` VALUES ('1628', '164', 'DESAGUADERO', '1');
INSERT INTO `distrito` VALUES ('1629', '164', 'HUACULLANI', '1');
INSERT INTO `distrito` VALUES ('1630', '164', 'KELLUYO', '1');
INSERT INTO `distrito` VALUES ('1631', '164', 'PISACOMA', '1');
INSERT INTO `distrito` VALUES ('1632', '164', 'POMATA', '1');
INSERT INTO `distrito` VALUES ('1633', '164', 'ZEPITA', '1');
INSERT INTO `distrito` VALUES ('1634', '165', 'ILAVE', '1');
INSERT INTO `distrito` VALUES ('1635', '165', 'CAPAZO', '1');
INSERT INTO `distrito` VALUES ('1636', '165', 'PILCUYO', '1');
INSERT INTO `distrito` VALUES ('1637', '165', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('1638', '165', 'CONDURIRI', '1');
INSERT INTO `distrito` VALUES ('1639', '166', 'HUANCANE', '1');
INSERT INTO `distrito` VALUES ('1640', '166', 'COJATA', '1');
INSERT INTO `distrito` VALUES ('1641', '166', 'HUATASANI', '1');
INSERT INTO `distrito` VALUES ('1642', '166', 'INCHUPALLA', '1');
INSERT INTO `distrito` VALUES ('1643', '166', 'PUSI', '1');
INSERT INTO `distrito` VALUES ('1644', '166', 'ROSASPATA', '1');
INSERT INTO `distrito` VALUES ('1645', '166', 'TARACO', '1');
INSERT INTO `distrito` VALUES ('1646', '166', 'VILQUE CHICO', '1');
INSERT INTO `distrito` VALUES ('1647', '167', 'LAMPA', '1');
INSERT INTO `distrito` VALUES ('1648', '167', 'CABANILLA', '1');
INSERT INTO `distrito` VALUES ('1649', '167', 'CALAPUJA', '1');
INSERT INTO `distrito` VALUES ('1650', '167', 'NICASIO', '1');
INSERT INTO `distrito` VALUES ('1651', '167', 'OCUVIRI', '1');
INSERT INTO `distrito` VALUES ('1652', '167', 'PALCA', '1');
INSERT INTO `distrito` VALUES ('1653', '167', 'PARATIA', '1');
INSERT INTO `distrito` VALUES ('1654', '167', 'PUCARA', '1');
INSERT INTO `distrito` VALUES ('1655', '167', 'SANTA LUCIA', '1');
INSERT INTO `distrito` VALUES ('1656', '167', 'VILAVILA', '1');
INSERT INTO `distrito` VALUES ('1657', '168', 'AYAVIRI', '1');
INSERT INTO `distrito` VALUES ('1658', '168', 'ANTAUTA', '1');
INSERT INTO `distrito` VALUES ('1659', '168', 'CUPI', '1');
INSERT INTO `distrito` VALUES ('1660', '168', 'LLALLI', '1');
INSERT INTO `distrito` VALUES ('1661', '168', 'MACARI', '1');
INSERT INTO `distrito` VALUES ('1662', '168', 'NUÃƒÆ’Ã¢â‚¬ËœOA', '1');
INSERT INTO `distrito` VALUES ('1663', '168', 'ORURILLO', '1');
INSERT INTO `distrito` VALUES ('1664', '168', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('1665', '168', 'UMACHIRI', '1');
INSERT INTO `distrito` VALUES ('1666', '169', 'MOHO', '1');
INSERT INTO `distrito` VALUES ('1667', '169', 'CONIMA', '1');
INSERT INTO `distrito` VALUES ('1668', '169', 'HUAYRAPATA', '1');
INSERT INTO `distrito` VALUES ('1669', '169', 'TILALI', '1');
INSERT INTO `distrito` VALUES ('1670', '170', 'PUTINA', '1');
INSERT INTO `distrito` VALUES ('1671', '170', 'ANANEA', '1');
INSERT INTO `distrito` VALUES ('1672', '170', 'PEDRO VILCA APAZA', '1');
INSERT INTO `distrito` VALUES ('1673', '170', 'QUILCAPUNCU', '1');
INSERT INTO `distrito` VALUES ('1674', '170', 'SINA', '1');
INSERT INTO `distrito` VALUES ('1675', '171', 'JULIACA', '1');
INSERT INTO `distrito` VALUES ('1676', '171', 'CABANA', '1');
INSERT INTO `distrito` VALUES ('1677', '171', 'CABANILLAS', '1');
INSERT INTO `distrito` VALUES ('1678', '171', 'CARACOTO', '1');
INSERT INTO `distrito` VALUES ('1679', '172', 'SANDIA', '1');
INSERT INTO `distrito` VALUES ('1680', '172', 'CUYOCUYO', '1');
INSERT INTO `distrito` VALUES ('1681', '172', 'LIMBANI', '1');
INSERT INTO `distrito` VALUES ('1682', '172', 'PATAMBUCO', '1');
INSERT INTO `distrito` VALUES ('1683', '172', 'PHARA', '1');
INSERT INTO `distrito` VALUES ('1684', '172', 'QUIACA', '1');
INSERT INTO `distrito` VALUES ('1685', '172', 'SAN JUAN DEL ORO', '1');
INSERT INTO `distrito` VALUES ('1686', '172', 'YANAHUAYA', '1');
INSERT INTO `distrito` VALUES ('1687', '172', 'ALTO INAMBARI', '1');
INSERT INTO `distrito` VALUES ('1688', '173', 'YUNGUYO', '1');
INSERT INTO `distrito` VALUES ('1689', '173', 'ANAPIA', '1');
INSERT INTO `distrito` VALUES ('1690', '173', 'COPANI', '1');
INSERT INTO `distrito` VALUES ('1691', '173', 'CUTURAPI', '1');
INSERT INTO `distrito` VALUES ('1692', '173', 'OLLARAYA', '1');
INSERT INTO `distrito` VALUES ('1693', '173', 'TINICACHI', '1');
INSERT INTO `distrito` VALUES ('1694', '191', 'CALLAO', '1');
INSERT INTO `distrito` VALUES ('1695', '191', 'BELLAVISTA', '1');
INSERT INTO `distrito` VALUES ('1696', '191', 'CARMEN DE LA LEGUA', '1');
INSERT INTO `distrito` VALUES ('1697', '191', 'LA PERLA', '1');
INSERT INTO `distrito` VALUES ('1698', '191', 'LA PUNTA', '1');
INSERT INTO `distrito` VALUES ('1699', '191', 'VENTANILLA', '1');
INSERT INTO `distrito` VALUES ('1700', '999', 'SIN INFORMACION', '1');
INSERT INTO `distrito` VALUES ('1701', '182', 'TARAPOTO', '1');
INSERT INTO `distrito` VALUES ('1702', '182', 'CACATACHI', '1');
INSERT INTO `distrito` VALUES ('1703', '182', 'CHIPURANA', '1');
INSERT INTO `distrito` VALUES ('1704', '182', 'JUAN GUERRA', '1');
INSERT INTO `distrito` VALUES ('1705', '182', 'MORALES', '1');
INSERT INTO `distrito` VALUES ('1706', '182', 'PAPAPLAYA', '1');
INSERT INTO `distrito` VALUES ('1707', '182', 'SAN ANTONIO', '1');
INSERT INTO `distrito` VALUES ('1708', '182', 'SAUCE', '1');
INSERT INTO `distrito` VALUES ('1709', '182', 'SHAPAJA', '1');
INSERT INTO `distrito` VALUES ('1710', '182', 'HUIMBAYOC', '1');
INSERT INTO `distrito` VALUES ('1711', '182', 'BANDA DE SHILCAYO', '1');
INSERT INTO `distrito` VALUES ('1712', '182', 'CABO ALBERTO LEVEAU', '1');
INSERT INTO `distrito` VALUES ('1713', '182', 'EL PORVENIR', '1');
INSERT INTO `distrito` VALUES ('1714', '89', 'LA UNION', '1');
INSERT INTO `distrito` VALUES ('1717', '89', 'CHUQUIS', '1');
INSERT INTO `distrito` VALUES ('1718', '89', 'MARIAS', '1');
INSERT INTO `distrito` VALUES ('1719', '89', 'PACHAS', '1');
INSERT INTO `distrito` VALUES ('1720', '89', 'QUIVILLA', '1');
INSERT INTO `distrito` VALUES ('1721', '89', 'RIPAN', '1');
INSERT INTO `distrito` VALUES ('1722', '89', 'SHUNQUI', '1');
INSERT INTO `distrito` VALUES ('1723', '89', 'SILLAPATA', '1');
INSERT INTO `distrito` VALUES ('1724', '89', 'YANAS', '1');
INSERT INTO `distrito` VALUES ('1725', null, null, null);
INSERT INTO `distrito` VALUES ('1727', '175', 'BELLAVISTA', '1');
INSERT INTO `distrito` VALUES ('1728', '175', 'ALTO BIAVO', '1');
INSERT INTO `distrito` VALUES ('1729', '175', 'BAJO BIAVO', '1');
INSERT INTO `distrito` VALUES ('1730', '175', 'HUALLAGA', '1');
INSERT INTO `distrito` VALUES ('1731', '175', 'SAN PABLO', '1');
INSERT INTO `distrito` VALUES ('1732', '175', 'SAN RAFAEL', '1');
INSERT INTO `distrito` VALUES ('1733', '176', 'SAN JOSE DE SISA', '1');
INSERT INTO `distrito` VALUES ('1734', '176', 'AGUA BLANCA', '1');
INSERT INTO `distrito` VALUES ('1735', '176', 'SAN MARTIN', '1');
INSERT INTO `distrito` VALUES ('1736', '176', 'SANTA ROSA', '1');
INSERT INTO `distrito` VALUES ('1737', '176', 'SHATOJA', '1');
INSERT INTO `distrito` VALUES ('1738', '177', 'SAPOSOA', '1');
INSERT INTO `distrito` VALUES ('1739', '177', 'ALTO SAPOSOA', '1');
INSERT INTO `distrito` VALUES ('1740', '177', 'EL ESLABON', '1');
INSERT INTO `distrito` VALUES ('1741', '177', 'PISCOYACU', '1');
INSERT INTO `distrito` VALUES ('1742', '177', 'SACANCHE', '1');
INSERT INTO `distrito` VALUES ('1743', '177', 'TINGO DE SAPOSOA', '1');
INSERT INTO `distrito` VALUES ('1744', '178', 'LAMAS', '1');
INSERT INTO `distrito` VALUES ('1745', '178', 'ALONSO DE ALVARADO', '1');
INSERT INTO `distrito` VALUES ('1746', '178', 'BARRANQUITA', '1');
INSERT INTO `distrito` VALUES ('1747', '178', 'CAYNARACHI', '1');
INSERT INTO `distrito` VALUES ('1748', '178', 'CUÐUMBUQUI', '1');
INSERT INTO `distrito` VALUES ('1749', '178', 'PINTO RECODO', '1');
INSERT INTO `distrito` VALUES ('1750', '178', 'RUMISAPA', '1');
INSERT INTO `distrito` VALUES ('1751', '178', 'SAN ROQUE DE CUMBAZA', '1');
INSERT INTO `distrito` VALUES ('1752', '178', 'SHANAO', '1');
INSERT INTO `distrito` VALUES ('1753', '178', 'TABALOSOS', '1');
INSERT INTO `distrito` VALUES ('1754', '178', 'ZAPATERO', '1');
INSERT INTO `distrito` VALUES ('1755', '179', 'JUANJUI', '1');
INSERT INTO `distrito` VALUES ('1756', '179', 'CAMPANILLA', '1');
INSERT INTO `distrito` VALUES ('1757', '179', 'HUICUNGO', '1');
INSERT INTO `distrito` VALUES ('1758', '179', 'PACHIZA', '1');
INSERT INTO `distrito` VALUES ('1759', '179', 'PAJARILLO', '1');
INSERT INTO `distrito` VALUES ('1760', '174', 'MOYOBAMBA', '1');
INSERT INTO `distrito` VALUES ('1761', '174', 'CALZADA', '1');
INSERT INTO `distrito` VALUES ('1762', '174', 'HABANA', '1');
INSERT INTO `distrito` VALUES ('1763', '174', 'JEPELACIO', '1');
INSERT INTO `distrito` VALUES ('1764', '174', 'SORITOR', '1');
INSERT INTO `distrito` VALUES ('1765', '174', 'YANTALO', '1');
INSERT INTO `distrito` VALUES ('1766', '180', 'PICOTA', '1');
INSERT INTO `distrito` VALUES ('1767', '180', 'BUENOS AIRES', '1');
INSERT INTO `distrito` VALUES ('1768', '180', 'CASPISAPA', '1');
INSERT INTO `distrito` VALUES ('1769', '180', 'PILLUANA', '1');
INSERT INTO `distrito` VALUES ('1770', '180', 'PUCACACA', '1');
INSERT INTO `distrito` VALUES ('1771', '180', 'SAN CRISTOBAL', '1');
INSERT INTO `distrito` VALUES ('1772', '183', 'TOCACHE', '1');
INSERT INTO `distrito` VALUES ('1773', '183', 'NUEVO PROGRESO', '1');
INSERT INTO `distrito` VALUES ('1774', '183', 'POLVORA', '1');
INSERT INTO `distrito` VALUES ('1775', '183', 'SHUNTE', '1');
INSERT INTO `distrito` VALUES ('1776', '183', 'UCHIZA', '1');
INSERT INTO `distrito` VALUES ('1777', '185', 'CANDARAVE', '1');
INSERT INTO `distrito` VALUES ('1778', '185', 'CAIRANI', '1');
INSERT INTO `distrito` VALUES ('1779', '185', 'CAMILACA', '1');
INSERT INTO `distrito` VALUES ('1780', '185', 'CURIBAYA', '1');
INSERT INTO `distrito` VALUES ('1781', '185', 'HUANUARA', '1');
INSERT INTO `distrito` VALUES ('1782', '185', 'QUILAHUANI', '1');
INSERT INTO `distrito` VALUES ('1783', '186', 'LOCUMBA', '1');
INSERT INTO `distrito` VALUES ('1784', '186', 'ILABAYA', '1');
INSERT INTO `distrito` VALUES ('1785', '186', 'ITE', '1');
INSERT INTO `distrito` VALUES ('1786', '184', 'TACNA', '1');
INSERT INTO `distrito` VALUES ('1787', '184', 'ALTO DE LA ALIANZA', '1');
INSERT INTO `distrito` VALUES ('1788', '184', 'CALANA', '1');
INSERT INTO `distrito` VALUES ('1789', '184', 'CIUDAD NUEVA', '1');
INSERT INTO `distrito` VALUES ('1790', '184', 'INCLAN', '1');
INSERT INTO `distrito` VALUES ('1791', '184', 'PACHIA', '1');
INSERT INTO `distrito` VALUES ('1792', '184', 'PALCA', '1');
INSERT INTO `distrito` VALUES ('1793', '184', 'POCOLLAY', '1');
INSERT INTO `distrito` VALUES ('1794', '184', 'SAMA', '1');
INSERT INTO `distrito` VALUES ('1795', '184', 'CORONEL GREGORIO ALBARRACIN LANCHIP', '1');
INSERT INTO `distrito` VALUES ('1796', '187', 'TARATA', '1');
INSERT INTO `distrito` VALUES ('1797', '187', 'HEROES ALBARRACIN', '1');
INSERT INTO `distrito` VALUES ('1798', '187', 'ESTIQUE', '1');
INSERT INTO `distrito` VALUES ('1799', '187', 'ESTIQUE-PAMPA', '1');
INSERT INTO `distrito` VALUES ('1800', '187', 'SITAJARA', '1');
INSERT INTO `distrito` VALUES ('1801', '187', 'SUSAPAYA', '1');
INSERT INTO `distrito` VALUES ('1802', '187', 'TARUCACHI', '1');
INSERT INTO `distrito` VALUES ('1803', '187', 'TICACO', '1');
INSERT INTO `distrito` VALUES ('1804', '189', 'ZORRITOS', '1');
INSERT INTO `distrito` VALUES ('1805', '189', 'CASITAS', '1');
INSERT INTO `distrito` VALUES ('1806', '189', 'CANOAS DE PUNTA SAL', '1');
INSERT INTO `distrito` VALUES ('1807', '188', 'TUMBES', '1');
INSERT INTO `distrito` VALUES ('1808', '188', 'CORRALES', '1');
INSERT INTO `distrito` VALUES ('1809', '188', 'LA CRUZ', '1');
INSERT INTO `distrito` VALUES ('1810', '188', 'PAMPAS DE HOSPITAL', '1');
INSERT INTO `distrito` VALUES ('1811', '188', 'SAN JACINTO', '1');
INSERT INTO `distrito` VALUES ('1812', '188', 'SAN JUAN DE LA VIRGEN', '1');
INSERT INTO `distrito` VALUES ('1813', '190', 'ZARUMILLA', '1');
INSERT INTO `distrito` VALUES ('1814', '190', 'AGUAS VERDES', '1');
INSERT INTO `distrito` VALUES ('1815', '190', 'MATAPALO', '1');
INSERT INTO `distrito` VALUES ('1816', '190', 'PAPAYAL', '1');
INSERT INTO `distrito` VALUES ('1817', '193', 'RAYMONDI', '1');
INSERT INTO `distrito` VALUES ('1818', '193', 'SEPAHUA', '1');
INSERT INTO `distrito` VALUES ('1819', '193', 'TAHUANIA', '1');
INSERT INTO `distrito` VALUES ('1820', '193', 'YURUA', '1');
INSERT INTO `distrito` VALUES ('1821', '192', 'CALLERIA', '1');
INSERT INTO `distrito` VALUES ('1822', '192', 'CAMPOVERDE', '1');
INSERT INTO `distrito` VALUES ('1823', '192', 'IPARIA', '1');
INSERT INTO `distrito` VALUES ('1824', '192', 'MASISEA', '1');
INSERT INTO `distrito` VALUES ('1825', '192', 'YARINACOCHA', '1');
INSERT INTO `distrito` VALUES ('1826', '192', 'NUEVA REQUENA', '1');
INSERT INTO `distrito` VALUES ('1827', '192', 'MANANTAY', '1');
INSERT INTO `distrito` VALUES ('1828', '194', 'PADRE ABAD', '1');
INSERT INTO `distrito` VALUES ('1829', '194', 'IRAZOLA', '1');
INSERT INTO `distrito` VALUES ('1830', '194', 'CURIMANA', '1');
INSERT INTO `distrito` VALUES ('1831', '195', 'PURUS', '1');

-- ----------------------------
-- Table structure for `expediente`
-- ----------------------------
DROP TABLE IF EXISTS `expediente`;
CREATE TABLE `expediente` (
  `idExpediente` int(11) NOT NULL AUTO_INCREMENT,
  `nroExpediente` char(255) DEFAULT NULL,
  `area` decimal(10,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nrLote` char(255) DEFAULT NULL,
  `nroSubLote` char(255) DEFAULT NULL,
  `idCalle` int(11) DEFAULT NULL,
  `nomDireccion` varchar(255) DEFAULT NULL,
  `idVivencia` int(11) DEFAULT NULL,
  `idCasa` int(11) DEFAULT NULL,
  `idSSHH` int(11) DEFAULT NULL,
  `idPlantas` char(255) DEFAULT '',
  `idTendero` char(255) DEFAULT NULL,
  `idLuz` char(255) DEFAULT NULL,
  `idRadio` char(255) DEFAULT NULL,
  `idRefrigerador` char(255) DEFAULT NULL,
  `idTelevisor` char(255) DEFAULT NULL,
  `idSonido` char(255) DEFAULT NULL,
  `otros` varchar(255) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `aPlano` varchar(255) DEFAULT NULL,
  `nroPadron` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `anexo` varchar(100) DEFAULT NULL,
  `sector` varchar(100) DEFAULT NULL,
  `vimprimida` varchar(100) DEFAULT NULL,
  `vrecibida` varchar(100) DEFAULT NULL,
  `ccanjeada` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idExpediente`),
  KEY `usuario_expediente` (`idUsuario`),
  CONSTRAINT `usuario_expediente` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of grupo
-- ----------------------------
INSERT INTO `grupo` VALUES ('1', 'LOMAS\r\n');
INSERT INTO `grupo` VALUES ('2', 'VENCEDORES\r\n');
INSERT INTO `grupo` VALUES ('3', 'VEGONIAS\r\n');
INSERT INTO `grupo` VALUES ('4', 'ROSALES\r\n');
INSERT INTO `grupo` VALUES ('5', 'EDEN\r\n');

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
  CONSTRAINT `persona_hijos` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `titular_hijos` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`)
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
  `idExpediente` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idManzana`),
  KEY `grupo_manzanas` (`idGrupo`),
  KEY `manzana_expediente` (`idExpediente`),
  CONSTRAINT `grupo_manzanas` FOREIGN KEY (`idGrupo`) REFERENCES `grupo` (`idGrupo`),
  CONSTRAINT `manzana_expediente` FOREIGN KEY (`idExpediente`) REFERENCES `expediente` (`idExpediente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'Dasboard', 'Dasboard', '1', '1', '<i class=\"feather icon-home\"></i>', null, '0', 'admin/dashboard', null, null);
INSERT INTO `modulo` VALUES ('2', 'Titular', 'Titular', '1', '4', '<i class=\"feather icon-box\"></i>', null, '0', 'admin/titular', '2019-07-16 23:41:37', null);
INSERT INTO `modulo` VALUES ('3', 'Usuario', 'Usuario', '1', '3', '<i class=\"feather icon-settings\"></i>', 'http://google.com', '0', 'admin/usuario', '2019-07-16 23:41:50', null);
INSERT INTO `modulo` VALUES ('4', 'Configuraciòn', 'Modulo de configuración', '0', '2', '<i class=\"feather icon-settings\"></i>', null, '0', 'admin/configuracion', null, null);
INSERT INTO `modulo` VALUES ('7', 'Cuotas', 'Cuotas', '1', '7', '<i class=\"feather icon-box\"></i>', null, '0', 'admin/cuota', '2019-06-27 17:02:24', '2019-06-27 16:45:47');
INSERT INTO `modulo` VALUES ('8', 'Expediente', 'Expediente', '1', '5', '<i class=\"feather icon-sidebar\"></i>', '#', '0', 'admin/expediente', '2019-07-16 23:58:44', '2019-07-03 23:25:48');
INSERT INTO `modulo` VALUES ('9', 'Pagos', 'Pagos', '1', '8', '<i class=\"feather icon-sidebar\"></i>', null, '0', 'admin/pagos', '2019-07-03 23:25:48', '2019-07-03 23:25:48');
INSERT INTO `modulo` VALUES ('10', 'Reporte', 'Reporte', '1', '9', '<i class=\"feather icon-sidebar\"></i>', null, '0', 'admin/reporte', '2019-07-03 23:25:48', '2019-07-03 23:25:48');
INSERT INTO `modulo` VALUES ('11', 'Reuniones', 'Reuniones', '1', '6', '<i class=\"feather icon-home\"></i>', null, '0', 'admin/reuniones', '2019-08-08 18:31:31', '2019-08-08 18:31:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pagina
-- ----------------------------
INSERT INTO `pagina` VALUES ('1', '1', '1', 'Principal', 'dashboard', null, '1', '1', '1', '2019-06-24 23:05:15', null, null);
INSERT INTO `pagina` VALUES ('2', '1', '2', 'Listado', '-', '-', '0', '1', '2', '2019-06-24 23:05:12', null, null);
INSERT INTO `pagina` VALUES ('3', '1', '2', 'listado', 'titular/lista', '-', '1', '1', '3', null, '2019-07-17 01:09:11', null);
INSERT INTO `pagina` VALUES ('4', '0', '4', 'Menú', 'configuracion/menu', '-', '1', '1', '1', null, null, null);
INSERT INTO `pagina` VALUES ('6', null, '3', 'listado', 'usuario/lista', null, '1', null, '5', null, '2019-07-17 01:09:02', '2019-07-01 19:05:30');
INSERT INTO `pagina` VALUES ('7', null, '8', 'Listado', 'expediente/lista', null, '1', null, '6', null, '2019-07-17 01:09:26', '2019-07-03 23:26:17');
INSERT INTO `pagina` VALUES ('8', null, '7', 'Listado', 'cuota/lista', null, '1', null, '7', null, '2019-07-17 01:09:19', '2019-07-17 00:59:03');
INSERT INTO `pagina` VALUES ('9', null, '9', 'Buscar', 'pagos/pago/buscar', null, '1', null, '8', null, '2019-08-08 23:39:31', '2019-07-17 01:05:11');
INSERT INTO `pagina` VALUES ('10', null, '10', 'Lista de socios', 'reporte/lista', null, '1', null, '9', null, '2019-08-10 00:49:36', '2019-07-17 01:09:52');
INSERT INTO `pagina` VALUES ('11', null, '11', 'Listado', 'reuniones/lista', null, '1', null, '10', null, '2019-08-08 18:32:35', '2019-08-08 18:32:35');
INSERT INTO `pagina` VALUES ('12', null, '10', 'Historial de expediente', 'reporte/expediente', null, '0', null, '11', null, '2019-08-10 02:42:14', '2019-08-10 00:51:48');

-- ----------------------------
-- Table structure for `pago`
-- ----------------------------
DROP TABLE IF EXISTS `pago`;
CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) DEFAULT NULL,
  `Tipo` varchar(100) DEFAULT NULL,
  `Presencia` int(11) DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `FechaTipo` datetime DEFAULT NULL,
  `FechaPago` datetime DEFAULT NULL,
  `motivo` varchar(500) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idCodigo` int(11) DEFAULT NULL,
  `identificador` varchar(5) DEFAULT NULL,
  `origen` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idPago`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pago
-- ----------------------------

-- ----------------------------
-- Table structure for `pago_reunion`
-- ----------------------------
DROP TABLE IF EXISTS `pago_reunion`;
CREATE TABLE `pago_reunion` (
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
-- Records of pago_reunion
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('1', 'Juan', 'Perez', 'Perez', '1999-07-29 22:04:15', '11111111', 'M', '9');

-- ----------------------------
-- Table structure for `provincia`
-- ----------------------------
DROP TABLE IF EXISTS `provincia`;
CREATE TABLE `provincia` (
  `provID` int(11) NOT NULL AUTO_INCREMENT,
  `depId` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`provID`),
  KEY `fk_dep_int_id` (`depId`) USING BTREE,
  CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`depId`) REFERENCES `departamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of provincia
-- ----------------------------
INSERT INTO `provincia` VALUES ('1', '1', 'CHACHAPOYAS', '1');
INSERT INTO `provincia` VALUES ('2', '1', 'BAGUA', '1');
INSERT INTO `provincia` VALUES ('3', '1', 'BONGARA', '1');
INSERT INTO `provincia` VALUES ('4', '1', 'CONDORCANQUI', '1');
INSERT INTO `provincia` VALUES ('5', '1', 'LUYA', '1');
INSERT INTO `provincia` VALUES ('6', '1', 'RODRIGUEZ DE MENDOZA', '1');
INSERT INTO `provincia` VALUES ('7', '1', 'UTCUBAMBA', '1');
INSERT INTO `provincia` VALUES ('8', '2', 'HUARAZ', '1');
INSERT INTO `provincia` VALUES ('9', '2', 'AIJA', '1');
INSERT INTO `provincia` VALUES ('10', '2', 'ANTONIO RAYMONDI', '1');
INSERT INTO `provincia` VALUES ('11', '2', 'ASUNCION', '1');
INSERT INTO `provincia` VALUES ('12', '2', 'BOLOGNESI', '1');
INSERT INTO `provincia` VALUES ('13', '2', 'CARHUAZ', '1');
INSERT INTO `provincia` VALUES ('14', '2', 'CARLOS F. FITZCARRALD', '1');
INSERT INTO `provincia` VALUES ('15', '2', 'CASMA', '1');
INSERT INTO `provincia` VALUES ('16', '2', 'CORONGO', '1');
INSERT INTO `provincia` VALUES ('17', '2', 'HUARI', '1');
INSERT INTO `provincia` VALUES ('18', '2', 'HUARMEY', '1');
INSERT INTO `provincia` VALUES ('19', '2', 'HUAYLAS', '1');
INSERT INTO `provincia` VALUES ('20', '2', 'MARISCAL LUZURIAGA', '1');
INSERT INTO `provincia` VALUES ('21', '2', 'OCROS', '1');
INSERT INTO `provincia` VALUES ('22', '2', 'PALLASCA', '1');
INSERT INTO `provincia` VALUES ('23', '2', 'POMABAMBA', '1');
INSERT INTO `provincia` VALUES ('24', '2', 'RECUAY', '1');
INSERT INTO `provincia` VALUES ('25', '2', 'SANTA', '1');
INSERT INTO `provincia` VALUES ('26', '2', 'SIHUAS', '1');
INSERT INTO `provincia` VALUES ('27', '2', 'YUNGAY', '1');
INSERT INTO `provincia` VALUES ('28', '3', 'ABANCAY', '1');
INSERT INTO `provincia` VALUES ('29', '3', 'ANDAHUAYLAS', '1');
INSERT INTO `provincia` VALUES ('30', '3', 'ANTABAMBA', '1');
INSERT INTO `provincia` VALUES ('31', '3', 'AYMARAES', '1');
INSERT INTO `provincia` VALUES ('32', '3', 'COTABAMBAS', '1');
INSERT INTO `provincia` VALUES ('33', '3', 'CHINCHEROS', '1');
INSERT INTO `provincia` VALUES ('34', '3', 'GRAU', '1');
INSERT INTO `provincia` VALUES ('35', '4', 'AREQUIPA', '1');
INSERT INTO `provincia` VALUES ('36', '4', 'CAMANA', '1');
INSERT INTO `provincia` VALUES ('37', '4', 'CARAVELI', '1');
INSERT INTO `provincia` VALUES ('38', '4', 'CASTILLA', '1');
INSERT INTO `provincia` VALUES ('39', '4', 'CAYLLOMA', '1');
INSERT INTO `provincia` VALUES ('40', '4', 'CONDESUYOS', '1');
INSERT INTO `provincia` VALUES ('41', '4', 'ISLAY', '1');
INSERT INTO `provincia` VALUES ('42', '4', 'LA UNION', '1');
INSERT INTO `provincia` VALUES ('43', '5', 'HUAMANGA', '1');
INSERT INTO `provincia` VALUES ('44', '5', 'CANGALLO', '1');
INSERT INTO `provincia` VALUES ('45', '5', 'HUANCA SANCOS', '1');
INSERT INTO `provincia` VALUES ('46', '5', 'HUANTA', '1');
INSERT INTO `provincia` VALUES ('47', '5', 'LA MAR', '1');
INSERT INTO `provincia` VALUES ('48', '5', 'LUCANAS', '1');
INSERT INTO `provincia` VALUES ('49', '5', 'PARINACOCHAS', '1');
INSERT INTO `provincia` VALUES ('50', '5', 'PAUCAR DEL SARA SARA', '1');
INSERT INTO `provincia` VALUES ('51', '5', 'SUCRE', '1');
INSERT INTO `provincia` VALUES ('52', '5', 'VICTOR FAJARDO', '1');
INSERT INTO `provincia` VALUES ('53', '5', 'VILCAS HUAMAN', '1');
INSERT INTO `provincia` VALUES ('54', '6', 'CAJAMARCA', '1');
INSERT INTO `provincia` VALUES ('55', '6', 'CAJABAMBA', '1');
INSERT INTO `provincia` VALUES ('56', '6', 'CELENDIN', '1');
INSERT INTO `provincia` VALUES ('57', '6', 'CHOTA', '1');
INSERT INTO `provincia` VALUES ('58', '6', 'CONTUMAZA', '1');
INSERT INTO `provincia` VALUES ('59', '6', 'CUTERVO', '1');
INSERT INTO `provincia` VALUES ('60', '6', 'HUALGAYOC', '1');
INSERT INTO `provincia` VALUES ('61', '6', 'JAEN', '1');
INSERT INTO `provincia` VALUES ('62', '6', 'SAN IGNACIO', '1');
INSERT INTO `provincia` VALUES ('63', '6', 'SAN MARCOS', '1');
INSERT INTO `provincia` VALUES ('64', '6', 'SAN MIGUEL', '1');
INSERT INTO `provincia` VALUES ('65', '6', 'SAN PABLO', '1');
INSERT INTO `provincia` VALUES ('66', '6', 'SANTA CRUZ', '1');
INSERT INTO `provincia` VALUES ('67', '7', 'CUSCO', '1');
INSERT INTO `provincia` VALUES ('68', '7', 'ACOMAYO', '1');
INSERT INTO `provincia` VALUES ('69', '7', 'ANTA', '1');
INSERT INTO `provincia` VALUES ('70', '7', 'CALCA', '1');
INSERT INTO `provincia` VALUES ('71', '7', 'CANAS', '1');
INSERT INTO `provincia` VALUES ('72', '7', 'CANCHIS', '1');
INSERT INTO `provincia` VALUES ('73', '7', 'CHUMBIVILCAS', '1');
INSERT INTO `provincia` VALUES ('74', '7', 'ESPINAR', '1');
INSERT INTO `provincia` VALUES ('75', '7', 'LA CONVENCION', '1');
INSERT INTO `provincia` VALUES ('76', '7', 'PARURO', '1');
INSERT INTO `provincia` VALUES ('77', '7', 'PAUCARTAMBO', '1');
INSERT INTO `provincia` VALUES ('78', '7', 'QUISPICANCHI', '1');
INSERT INTO `provincia` VALUES ('79', '7', 'URUBAMBA', '1');
INSERT INTO `provincia` VALUES ('80', '8', 'HUANCAVELICA', '1');
INSERT INTO `provincia` VALUES ('81', '8', 'ACOBAMBA', '1');
INSERT INTO `provincia` VALUES ('82', '8', 'ANGARAES', '1');
INSERT INTO `provincia` VALUES ('83', '8', 'CASTROVIRREYNA', '1');
INSERT INTO `provincia` VALUES ('84', '8', 'CHURCAMPA', '1');
INSERT INTO `provincia` VALUES ('85', '8', 'HUAYTARA', '1');
INSERT INTO `provincia` VALUES ('86', '8', 'TAYACAJA', '1');
INSERT INTO `provincia` VALUES ('87', '9', 'HUANUCO', '1');
INSERT INTO `provincia` VALUES ('88', '9', 'AMBO', '1');
INSERT INTO `provincia` VALUES ('89', '9', 'DOS DE MAYO', '1');
INSERT INTO `provincia` VALUES ('90', '9', 'HUACAYBAMBA', '1');
INSERT INTO `provincia` VALUES ('91', '9', 'HUAMALIES', '1');
INSERT INTO `provincia` VALUES ('92', '9', 'LEONCIO PRADO', '1');
INSERT INTO `provincia` VALUES ('93', '9', 'MARAÑON', '1');
INSERT INTO `provincia` VALUES ('94', '9', 'PACHITEA', '1');
INSERT INTO `provincia` VALUES ('95', '9', 'PUERTO INCA', '1');
INSERT INTO `provincia` VALUES ('96', '9', 'LAURICOCHA', '1');
INSERT INTO `provincia` VALUES ('97', '9', 'YAROWILCA', '1');
INSERT INTO `provincia` VALUES ('98', '10', 'ICA', '1');
INSERT INTO `provincia` VALUES ('99', '10', 'CHINCHA', '1');
INSERT INTO `provincia` VALUES ('100', '10', 'NAZCA', '1');
INSERT INTO `provincia` VALUES ('101', '10', 'PALPA', '1');
INSERT INTO `provincia` VALUES ('102', '10', 'PISCO', '1');
INSERT INTO `provincia` VALUES ('103', '11', 'HUANCAYO', '1');
INSERT INTO `provincia` VALUES ('104', '11', 'CONCEPCION', '1');
INSERT INTO `provincia` VALUES ('105', '11', 'CHANCHAMAYO', '1');
INSERT INTO `provincia` VALUES ('106', '11', 'JAUJA', '1');
INSERT INTO `provincia` VALUES ('107', '11', 'JUNIN', '1');
INSERT INTO `provincia` VALUES ('108', '11', 'SATIPO', '1');
INSERT INTO `provincia` VALUES ('109', '11', 'TARMA', '1');
INSERT INTO `provincia` VALUES ('110', '11', 'YAULI', '1');
INSERT INTO `provincia` VALUES ('111', '11', 'CHUPACA', '1');
INSERT INTO `provincia` VALUES ('112', '12', 'TRUJILLO', '1');
INSERT INTO `provincia` VALUES ('113', '12', 'ASCOPE', '1');
INSERT INTO `provincia` VALUES ('114', '12', 'BOLIVAR', '1');
INSERT INTO `provincia` VALUES ('115', '12', 'CHEPEN', '1');
INSERT INTO `provincia` VALUES ('116', '12', 'JULCAN', '1');
INSERT INTO `provincia` VALUES ('117', '12', 'OTUZCO', '1');
INSERT INTO `provincia` VALUES ('118', '12', 'PACASMAYO', '1');
INSERT INTO `provincia` VALUES ('119', '12', 'PATAZ', '1');
INSERT INTO `provincia` VALUES ('120', '12', 'SANCHEZ CARRION', '1');
INSERT INTO `provincia` VALUES ('121', '12', 'SANTIAGO DE CHUCO', '1');
INSERT INTO `provincia` VALUES ('122', '12', 'GRAN CHIMU', '1');
INSERT INTO `provincia` VALUES ('123', '12', 'VIRU', '1');
INSERT INTO `provincia` VALUES ('124', '13', 'CHICLAYO', '1');
INSERT INTO `provincia` VALUES ('125', '13', 'FERREÑAFE', '1');
INSERT INTO `provincia` VALUES ('126', '13', 'LAMBAYEQUE', '1');
INSERT INTO `provincia` VALUES ('127', '14', 'LIMA', '1');
INSERT INTO `provincia` VALUES ('128', '14', 'BARRANCA', '1');
INSERT INTO `provincia` VALUES ('129', '14', 'CAJATAMBO', '1');
INSERT INTO `provincia` VALUES ('130', '14', 'CANTA', '1');
INSERT INTO `provincia` VALUES ('131', '14', 'CAÑETE', '1');
INSERT INTO `provincia` VALUES ('132', '14', 'HUARAL', '1');
INSERT INTO `provincia` VALUES ('133', '14', 'HUAROCHIRI', '1');
INSERT INTO `provincia` VALUES ('134', '14', 'HUAURA', '1');
INSERT INTO `provincia` VALUES ('135', '14', 'OYON', '1');
INSERT INTO `provincia` VALUES ('136', '14', 'YAUYOS', '1');
INSERT INTO `provincia` VALUES ('138', '15', 'MAYNAS', '1');
INSERT INTO `provincia` VALUES ('139', '15', 'ALTO AMAZONAS', '1');
INSERT INTO `provincia` VALUES ('140', '15', 'LORETO', '1');
INSERT INTO `provincia` VALUES ('141', '15', 'MARISCAL RAMON CASTILLA', '1');
INSERT INTO `provincia` VALUES ('142', '15', 'REQUENA', '1');
INSERT INTO `provincia` VALUES ('143', '15', 'UCAYALI', '1');
INSERT INTO `provincia` VALUES ('144', '16', 'TAMBOPATA', '1');
INSERT INTO `provincia` VALUES ('145', '16', 'MANU', '1');
INSERT INTO `provincia` VALUES ('146', '16', 'TAHUAMANU', '1');
INSERT INTO `provincia` VALUES ('147', '17', 'MARISCAL NIETO', '1');
INSERT INTO `provincia` VALUES ('148', '17', 'GENERAL SANCHEZ CERRO', '1');
INSERT INTO `provincia` VALUES ('149', '17', 'ILO', '1');
INSERT INTO `provincia` VALUES ('150', '18', 'PASCO', '1');
INSERT INTO `provincia` VALUES ('151', '18', 'DANIEL ALCIDES CARRION', '1');
INSERT INTO `provincia` VALUES ('152', '18', 'OXAPAMPA', '1');
INSERT INTO `provincia` VALUES ('153', '19', 'PIURA', '1');
INSERT INTO `provincia` VALUES ('154', '19', 'AYABACA', '1');
INSERT INTO `provincia` VALUES ('155', '19', 'HUANCABAMBA', '1');
INSERT INTO `provincia` VALUES ('156', '19', 'MORROPON', '1');
INSERT INTO `provincia` VALUES ('157', '19', 'PAITA', '1');
INSERT INTO `provincia` VALUES ('158', '19', 'SULLANA', '1');
INSERT INTO `provincia` VALUES ('159', '19', 'TALARA', '1');
INSERT INTO `provincia` VALUES ('160', '19', 'SECHURA', '1');
INSERT INTO `provincia` VALUES ('161', '20', 'PUNO', '1');
INSERT INTO `provincia` VALUES ('162', '20', 'AZANGARO', '1');
INSERT INTO `provincia` VALUES ('163', '20', 'CARABAYA', '1');
INSERT INTO `provincia` VALUES ('164', '20', 'CHUCUITO', '1');
INSERT INTO `provincia` VALUES ('165', '20', 'EL COLLAO', '1');
INSERT INTO `provincia` VALUES ('166', '20', 'HUANCANE', '1');
INSERT INTO `provincia` VALUES ('167', '20', 'LAMPA', '1');
INSERT INTO `provincia` VALUES ('168', '20', 'MELGAR', '1');
INSERT INTO `provincia` VALUES ('169', '20', 'MOHO', '1');
INSERT INTO `provincia` VALUES ('170', '20', 'SAN ANTONIO DE PUTINA', '1');
INSERT INTO `provincia` VALUES ('171', '20', 'SAN ROMAN', '1');
INSERT INTO `provincia` VALUES ('172', '20', 'SANDIA', '1');
INSERT INTO `provincia` VALUES ('173', '20', 'YUNGUYO', '1');
INSERT INTO `provincia` VALUES ('174', '21', 'MOYOBAMBA', '1');
INSERT INTO `provincia` VALUES ('175', '21', 'BELLAVISTA', '1');
INSERT INTO `provincia` VALUES ('176', '21', 'EL DORADO', '1');
INSERT INTO `provincia` VALUES ('177', '21', 'HUALLAGA', '1');
INSERT INTO `provincia` VALUES ('178', '21', 'LAMAS', '1');
INSERT INTO `provincia` VALUES ('179', '21', 'MARISCAL CACERES', '1');
INSERT INTO `provincia` VALUES ('180', '21', 'PICOTA', '1');
INSERT INTO `provincia` VALUES ('181', '21', 'RIOJA', '1');
INSERT INTO `provincia` VALUES ('182', '21', 'SAN MARTIN', '1');
INSERT INTO `provincia` VALUES ('183', '21', 'TOCACHE', '1');
INSERT INTO `provincia` VALUES ('184', '22', 'TACNA', '1');
INSERT INTO `provincia` VALUES ('185', '22', 'CANDARAVE', '1');
INSERT INTO `provincia` VALUES ('186', '22', 'JORGE BASADRE', '1');
INSERT INTO `provincia` VALUES ('187', '22', 'TARATA', '1');
INSERT INTO `provincia` VALUES ('188', '23', 'TUMBES', '1');
INSERT INTO `provincia` VALUES ('189', '23', 'CONTRALMIRANTE VILLAR', '1');
INSERT INTO `provincia` VALUES ('190', '23', 'ZARUMILLA', '1');
INSERT INTO `provincia` VALUES ('191', '24', 'CALLAO', '1');
INSERT INTO `provincia` VALUES ('192', '25', 'CORONEL PORTILLO', '1');
INSERT INTO `provincia` VALUES ('193', '25', 'ATALAYA', '1');
INSERT INTO `provincia` VALUES ('194', '25', 'PADRE ABAD', '1');
INSERT INTO `provincia` VALUES ('195', '25', 'PURUS', '1');
INSERT INTO `provincia` VALUES ('999', '99', 'SIN INFORMACION', '1');

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
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idReunion`),
  KEY `usuario_reunion` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
  CONSTRAINT `fkroles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `fkuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '2', '1', '2019-07-05 01:16:00', '2019-07-05 01:16:00');
INSERT INTO `role_user` VALUES ('2', '3', '7', null, null);
INSERT INTO `role_user` VALUES ('3', '2', '8', null, null);

-- ----------------------------
-- Table structure for `subtitular`
-- ----------------------------
DROP TABLE IF EXISTS `subtitular`;
CREATE TABLE `subtitular` (
  `idSubtitular` int(11) NOT NULL AUTO_INCREMENT,
  `idTitular` int(11) DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idUbigeo` varchar(15) DEFAULT NULL,
  `ocupacion` varchar(255) DEFAULT NULL,
  `idCivil` int(11) DEFAULT NULL,
  `idRelacion` int(11) DEFAULT NULL,
  `telefono` char(255) DEFAULT NULL,
  PRIMARY KEY (`idSubtitular`),
  KEY `persona_subtitular` (`idPersona`),
  KEY `ubigeo_subtitular` (`idUbigeo`),
  KEY `titular` (`idTitular`),
  CONSTRAINT `persona_subtitular` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `titular` FOREIGN KEY (`idTitular`) REFERENCES `titular` (`idTitular`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
  `idUbigeo` varchar(15) DEFAULT NULL,
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
  CONSTRAINT `FK_Persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `usuario_titular` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  `idUsuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Tecnologia', 'ti@gmail.com', null, '$2y$10$tGXNkEofrIBARimWOo/s5.UBYnyPv8n5wjlMZRdHKgLcN3jbk4k8a', null, '2019-07-05 01:16:00', '2019-07-05 01:16:00', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', '1', 'admin', '123456', '1', '2019');

-- ----------------------------
-- Function structure for `SPLIT_STRING`
-- ----------------------------
DROP FUNCTION IF EXISTS `SPLIT_STRING`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `SPLIT_STRING`(str VARCHAR(255), delim VARCHAR(12), pos INT) RETURNS varchar(255) CHARSET latin1
RETURN REPLACE(SUBSTRING(SUBSTRING_INDEX(str, delim, pos),
       LENGTH(SUBSTRING_INDEX(str, delim, pos-1)) + 1),
       delim, '')
;;
DELIMITER ;
