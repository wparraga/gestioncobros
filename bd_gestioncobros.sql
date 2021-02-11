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

 Date: 11/02/2021 14:13:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, '1311002263', 'ZAMBRANO PONCE ANA MARIA', '0993212218', 'WALTON GARCÍA', 'CALLE AMAZONAS', 'MUNICIPIO');
INSERT INTO `clientes` VALUES (2, '1310978422', 'GARCIA LOOR JUAN PABLO', '0993733648', 'CDLA. WALTON GARCIA', 'CALLE AMAZONAS FRENTE AL PARQUE A LADO DE LA IGLESIA LOCAL LA PALETERIA', '');
INSERT INTO `clientes` VALUES (3, '1302435969', 'ALAVA VERA RODY ORLANDO', '0992038239', 'AV. ELOY ALFARO FRENTE AL AGUSTO SOLORZANO', 'AV. AMAZONAS EN EL HOSPITAL AREA DE EMERGENCIA', '');

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
  `cuo_estado` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuo_formapago` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuo_observacion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuo_cobrador` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cuo_codigo`) USING BTREE,
  INDEX `fk_pre_cuo`(`pre_codigo`) USING BTREE,
  CONSTRAINT `fk_pre_cuo` FOREIGN KEY (`pre_codigo`) REFERENCES `prestamos` (`pre_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of cuotas
-- ----------------------------
INSERT INTO `cuotas` VALUES (1, 1, 1, '2021-02-10', '2021-02-10 18:14:16', 90.00, 'PAGADO', 'DIARIA', NULL, 'ADMIN');
INSERT INTO `cuotas` VALUES (2, 1, 2, '2021-02-11', '2021-02-11 14:54:07', 90.00, 'PAGADO', 'DIARIA', NULL, 'ADMIN');
INSERT INTO `cuotas` VALUES (3, 1, 3, '2021-02-12', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (4, 1, 4, '2021-02-13', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (5, 1, 5, '2021-02-14', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (6, 1, 6, '2021-02-15', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (7, 1, 7, '2021-02-16', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (8, 1, 8, '2021-02-17', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (9, 1, 9, '2021-02-18', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (10, 1, 10, '2021-02-19', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (11, 1, 11, '2021-02-20', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (12, 1, 12, '2021-02-21', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (13, 1, 13, '2021-02-22', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (14, 1, 14, '2021-02-23', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (15, 1, 15, '2021-02-24', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (16, 1, 16, '2021-02-25', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (17, 1, 17, '2021-02-26', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (18, 1, 18, '2021-02-27', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (19, 1, 19, '2021-02-28', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (20, 1, 20, '2021-03-01', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (21, 1, 21, '2021-03-02', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (22, 1, 22, '2021-03-03', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (23, 1, 23, '2021-03-04', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (24, 1, 24, '2021-03-05', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (25, 1, 25, '2021-03-06', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (26, 1, 26, '2021-03-07', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (27, 1, 27, '2021-03-08', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (28, 1, 28, '2021-03-09', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (29, 1, 29, '2021-03-10', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (30, 1, 30, '2021-03-11', NULL, 90.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (31, 2, 1, '2021-02-10', '2021-02-10 22:31:31', 18.00, 'PAGADO', 'DIARIA', NULL, 'ADMIN');
INSERT INTO `cuotas` VALUES (32, 2, 2, '2021-02-11', '2021-02-11 14:55:00', 18.00, 'PAGADO', 'DIARIA', NULL, 'ADMIN');
INSERT INTO `cuotas` VALUES (33, 2, 3, '2021-02-12', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (34, 2, 4, '2021-02-13', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (35, 2, 5, '2021-02-14', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (36, 2, 6, '2021-02-15', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (37, 2, 7, '2021-02-16', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (38, 2, 8, '2021-02-17', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (39, 2, 9, '2021-02-18', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (40, 2, 10, '2021-02-19', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (41, 2, 11, '2021-02-20', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (42, 2, 12, '2021-02-21', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (43, 2, 13, '2021-02-22', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (44, 2, 14, '2021-02-23', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (45, 2, 15, '2021-02-24', NULL, 18.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (46, 3, 1, '2021-02-11', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (47, 3, 2, '2021-02-12', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (48, 3, 3, '2021-02-13', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (49, 3, 4, '2021-02-14', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (50, 3, 5, '2021-02-15', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (51, 3, 6, '2021-02-16', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (52, 3, 7, '2021-02-17', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (53, 3, 8, '2021-02-18', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (54, 3, 9, '2021-02-19', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (55, 3, 10, '2021-02-20', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (56, 3, 11, '2021-02-21', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (57, 3, 12, '2021-02-22', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (58, 3, 13, '2021-02-23', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (59, 3, 14, '2021-02-24', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);
INSERT INTO `cuotas` VALUES (60, 3, 15, '2021-02-25', NULL, 12.00, 'PENDIENTE', 'DIARIA', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of prestamos
-- ----------------------------
INSERT INTO `prestamos` VALUES (1, 2, '1', '2021-02-09', 2000.00, 30, 35.00, 2700.00, 2520.00);
INSERT INTO `prestamos` VALUES (2, 1, '2', '2021-02-09', 200.00, 15, 35.00, 270.00, 234.00);
INSERT INTO `prestamos` VALUES (3, 3, '3', '2021-02-10', 100.00, 15, 80.00, 180.00, 180.00);

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
INSERT INTO `users` VALUES (1, 'XAVIER', 'PÁRRAGA', 'ADMIN', '$2y$10$6ntdjcXggeNnKDN2xIXa3uxNvDAW7Ch2UITZ2NyMZu1g21fJZtGhG', '', '2021-02-08 09:06:00', 'Administrador', 'Habilitado', 'ADMIN.jpg');
INSERT INTO `users` VALUES (2, 'WALTER', 'DANIEL', 'DANIEL', '$2y$10$NqhfVIrSMkrxBlBZRD5G1.AEeJuodS46cX3lC/d82ogih4l4ubs5u', 'sincorreo@gmail.com', '2021-02-11 15:34:59', 'Cobrador', 'Habilitado', NULL);

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
cu.cuo_estado,
cu.cuo_formapago,
cu.cuo_cobrador
from clientes cl,prestamos p, cuotas cu
where cl.cli_codigo=p.cli_codigo and p.pre_codigo=cu.pre_codigo and cu.cuo_estado='PAGADO' ;

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
