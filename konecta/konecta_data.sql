/*
Navicat MySQL Data Transfer

Source Server         : local_xampp
Source Server Version : 100425
Source Host           : localhost:3306
Source Database       : konecta

Target Server Type    : MYSQL
Target Server Version : 100425
File Encoding         : 65001

Date: 2023-07-12 02:12:39
*/


SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES ('1', 'Pasteleria');
INSERT INTO `categorias` VALUES ('2', 'Bebidas');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `precio` int(16) NOT NULL,
  `peso` int(16) NOT NULL,
  `categoria` int(16) NOT NULL,
  `stock` int(16) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES ('1', 'Torta Chocolate', '150', '5000', '15', '1', '0', '2023-07-01 22:22:16');
INSERT INTO `productos` VALUES ('2', 'Torta Vainilla', '250', '5000', '20', '1', '8', '2023-07-07 22:22:21');
INSERT INTO `productos` VALUES ('3', 'Buñuelos', '350', '1000', '25', '1', '3', '2023-07-08 22:22:25');
INSERT INTO `productos` VALUES ('4', 'Tinto', '450', '2000', '30', '2', '0', '2023-07-15 22:22:28');
INSERT INTO `productos` VALUES ('5', 'Gaseosas actualizado', '550', '5000', '40', '1', '10', '2023-07-06 22:22:31');
INSERT INTO `productos` VALUES ('13', 'Tinto', '1644809702', '3500', '2', '1', '2', '2023-07-12 02:08:16');

-- ----------------------------
-- Table structure for ventas
-- ----------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `id_producto` int(16) NOT NULL,
  `cantidad` int(16) NOT NULL,
  `total` int(16) NOT NULL,
  `fecha_venta` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ventas
-- ----------------------------
INSERT INTO `ventas` VALUES ('27', '1', '10', '50000', '2023-07-12 01:50:28');
INSERT INTO `ventas` VALUES ('28', '2', '40', '200000', '2023-07-12 01:51:16');
INSERT INTO `ventas` VALUES ('29', '4', '1', '2000', '2023-07-12 01:51:33');
INSERT INTO `ventas` VALUES ('30', '1', '15', '75000', '2023-07-12 01:51:46');
INSERT INTO `ventas` VALUES ('31', '4', '1', '2000', '2023-07-12 01:52:15');
INSERT INTO `ventas` VALUES ('32', '1', '50', '250000', '2023-07-12 02:07:24');
SET FOREIGN_KEY_CHECKS=1;
