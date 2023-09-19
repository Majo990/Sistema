/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : ventas

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 19/09/2023 17:42:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categoria
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria`  (
  `id_categoria` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `estatus` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categoria
-- ----------------------------

-- ----------------------------
-- Table structure for detalle_ingreso
-- ----------------------------
DROP TABLE IF EXISTS `detalle_ingreso`;
CREATE TABLE `detalle_ingreso`  (
  `id_detalle_ingreso` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_ingreso` int NULL DEFAULT NULL,
  `id_producto` int NULL DEFAULT NULL,
  `cantidad` int NULL DEFAULT NULL,
  `precio_compra` decimal(10, 0) UNSIGNED NULL DEFAULT NULL,
  `precio_venta` decimal(10, 0) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_detalle_ingreso`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detalle_ingreso
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
