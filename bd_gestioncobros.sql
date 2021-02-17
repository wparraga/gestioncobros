/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : 127.0.0.1:3306
 Source Schema         : bd_gestioncobros

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 16/02/2021 21:10:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for abonos
-- ----------------------------
DROP TABLE IF EXISTS `abonos`;
CREATE TABLE `abonos`  (
  `abo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cuo_codigo` int(11) NULL DEFAULT NULL,
  `abo_fecha` datetime(0) NULL DEFAULT NULL,
  `abo_valor` decimal(18, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`abo_codigo`) USING BTREE,
  INDEX `fk_cu_abo`(`cuo_codigo`) USING BTREE,
  CONSTRAINT `fk_cu_abo` FOREIGN KEY (`cuo_codigo`) REFERENCES `cuotas` (`cuo_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_cedula` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_nombres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_telefono` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_dirdomicilio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_dirtrabajo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cli_referencia` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cli_codigo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for cuotas
-- ----------------------------
DROP TABLE IF EXISTS `cuotas`;
CREATE TABLE `cuotas`  (
  `cuo_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `pre_codigo` int(11) NULL DEFAULT NULL,
  `cuo_numero` int(11) NULL DEFAULT NULL,
  `cuo_fechapago` date NULL DEFAULT NULL,
  `cuo_fechacobro` datetime(0) NULL DEFAULT NULL,
  `cuo_montocuota` decimal(18, 2) NULL DEFAULT NULL,
  `cuo_abonocuota` decimal(18, 2) NULL DEFAULT NULL,
  `cuo_estado` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuo_formapago` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuo_observacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuo_cobrador` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cuo_codigo`) USING BTREE,
  INDEX `fk_pre_cuo`(`pre_codigo`) USING BTREE,
  CONSTRAINT `fk_pre_cuo` FOREIGN KEY (`pre_codigo`) REFERENCES `prestamos` (`pre_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for prestamos
-- ----------------------------
DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE `prestamos`  (
  `pre_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_codigo` int(11) NULL DEFAULT NULL,
  `pre_numero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pre_fecha` date NULL DEFAULT NULL,
  `pre_monto` decimal(18, 2) NULL DEFAULT NULL,
  `pre_nrocuotas` decimal(18, 0) NULL DEFAULT NULL,
  `pre_interes` decimal(18, 2) NULL DEFAULT NULL,
  `pre_montopagar` decimal(18, 2) NULL DEFAULT NULL,
  `pre_montototal` decimal(18, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`pre_codigo`) USING BTREE,
  INDEX `fk_cli_pre`(`cli_codigo`) USING BTREE,
  CONSTRAINT `fk_cli_pre` FOREIGN KEY (`cli_codigo`) REFERENCES `clientes` (`cli_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s name, unique',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s password in salted and hashed format',
  `user_email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s email, unique',
  `date_added` datetime(0) NOT NULL,
  `user_king` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_status` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_foto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE,
  UNIQUE INDEX `user_email`(`user_email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'user data' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'XAVIER', 'PÁRRAGA', 'ADMIN', '$2y$10$QixbhhnYKhUK0KplDjeNzee.3C5lhrGd0zzebR5kVPhfUQlI9Nz9S', '', '2021-02-08 09:06:00', 'Administrador', 'Habilitado', 'ADMIN.jpg');
INSERT INTO `users` VALUES (2, 'WALTER', 'DANIEL', 'DANIEL', '$2y$10$NqhfVIrSMkrxBlBZRD5G1.AEeJuodS46cX3lC/d82ogih4l4ubs5u', 'sincorreo@gmail.com', '2021-02-11 15:34:59', 'Cobrador', 'Habilitado', NULL);

-- ----------------------------
-- View structure for vis_abonosrealizados
-- ----------------------------
DROP VIEW IF EXISTS `vis_abonosrealizados`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vis_abonosrealizados` AS select 
ab.abo_fecha,
cu.cuo_numero,
cl.cli_nombres,
ab.abo_valor,
cu.cuo_cobrador
from
clientes cl,
prestamos pr,
cuotas cu,
abonos ab
where
cl.cli_codigo=pr.cli_codigo and pr.pre_codigo=cu.pre_codigo and cu.cuo_codigo=ab.cuo_codigo ;

-- ----------------------------
-- View structure for vis_pagospendientes
-- ----------------------------
DROP VIEW IF EXISTS `vis_pagospendientes`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vis_pagospendientes` AS select 
cl.cli_cedula,
cl.cli_nombres,
cl.cli_telefono,
cl.cli_dirdomicilio,
cl.cli_dirtrabajo,
cl.cli_referencia,
p.pre_numero,
p.pre_fecha,
p.pre_monto,
p.pre_nrocuotas,
p.pre_interes,
p.pre_montopagar,
p.pre_montototal,
cu.cuo_numero,
cu.cuo_fechapago,
cu.cuo_fechacobro,
cu.cuo_montocuota,
cu.cuo_estado,
cu.cuo_formapago,
cu.cuo_cobrador
from clientes cl,prestamos p, cuotas cu
where cl.cli_codigo=p.cli_codigo and p.pre_codigo=cu.pre_codigo and cu.cuo_estado='PENDIENTE' ;

-- ----------------------------
-- View structure for vis_pagosrealizados
-- ----------------------------
DROP VIEW IF EXISTS `vis_pagosrealizados`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vis_pagosrealizados` AS select 
cl.cli_cedula,
cl.cli_nombres,
cl.cli_telefono,
cl.cli_dirdomicilio,
cl.cli_dirtrabajo,
cl.cli_referencia,
p.pre_numero,
p.pre_fecha,
p.pre_monto,
p.pre_nrocuotas,
p.pre_interes,
p.pre_montopagar,
p.pre_montototal,
cu.cuo_numero,
cu.cuo_fechapago,
cu.cuo_fechacobro,
cu.cuo_montocuota,
cu.cuo_abonocuota,
cu.cuo_estado,
cu.cuo_formapago,
cu.cuo_cobrador
from clientes cl,prestamos p, cuotas cu
where cl.cli_codigo=p.cli_codigo and p.pre_codigo=cu.pre_codigo and cu.cuo_abonocuota>0 ;

-- ----------------------------
-- View structure for vis_prestamos
-- ----------------------------
DROP VIEW IF EXISTS `vis_prestamos`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vis_prestamos` AS select 
prestamos.pre_codigo,
prestamos.pre_numero,
prestamos.pre_fecha,
clientes.cli_cedula,
clientes.cli_nombres,
clientes.cli_telefono,
clientes.cli_dirdomicilio,
clientes.cli_dirtrabajo,
clientes.cli_referencia,
prestamos.pre_monto,
prestamos.pre_nrocuotas,
prestamos.pre_interes,prestamos.pre_montopagar,
prestamos.pre_montototal
from prestamos,clientes where prestamos.cli_codigo=clientes.cli_codigo ;

SET FOREIGN_KEY_CHECKS = 1;
