/*
Navicat MySQL Data Transfer

Source Server         : Mysql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : roles

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-26 17:37:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_06_20_030304_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_06_20_030857_create_role_user_table', '1');

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'Dasboard', 'Dasboard', '1', '1', '<i class=\"feather icon-home\"></i>', null, '0', 'admin/dashboard');
INSERT INTO `modulo` VALUES ('2', 'Galeria', 'Galerias', '1', '1', '<i class=\"feather icon-box\"></i>', null, '0', null);
INSERT INTO `modulo` VALUES ('3', 'Perfil', 'Perfil', '0', '1', '<i class=\"feather icon-settings\"></i>', 'http://google.com', '0', null);
INSERT INTO `modulo` VALUES ('4', 'Configuraciòn', 'Modulo de configuración', '1', '1', '<i class=\"feather icon-settings\"></i>', null, '0', 'admin/configuracion');

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
  PRIMARY KEY (`ID`),
  KEY `FK_Modulo` (`ModuloID`),
  CONSTRAINT `FK_Modulo` FOREIGN KEY (`ModuloID`) REFERENCES `modulo` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pagina
-- ----------------------------
INSERT INTO `pagina` VALUES ('1', '1', '1', 'Principal', 'dashboard', null, '1', '1', '1', '2019-06-24 23:05:15');
INSERT INTO `pagina` VALUES ('2', '1', '2', 'Listado', '-', '-', '1', '1', '2', '2019-06-24 23:05:12');
INSERT INTO `pagina` VALUES ('3', '1', '2', 'Registro', '-', '-', '1', '1', '3', null);
INSERT INTO `pagina` VALUES ('4', '0', '4', 'Menú', 'configuracion/menu', '-', '1', '1', '1', null);

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
INSERT INTO `roles` VALUES ('1', 'admin', 'Administrator', '2019-06-20 21:53:03', '2019-06-20 21:53:03');
INSERT INTO `roles` VALUES ('2', 'user', 'User', '2019-06-20 21:53:03', '2019-06-20 21:53:03');
INSERT INTO `roles` VALUES ('3', 'editor', 'Editor', '2019-06-20 21:53:03', '2019-06-20 21:53:03');

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', '1', '2019-06-20 21:55:53', '2019-06-20 21:55:53');

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
INSERT INTO `users` VALUES ('1', 'Junior', 'zkated@gmail.com', null, '$2y$10$Aq4BPeJ0w3qyhMYxneRRkuHin9l.2tQjBHucEzfMKrz.Erup4z80G', null, '2019-06-20 21:55:52', '2019-06-20 21:55:52');
