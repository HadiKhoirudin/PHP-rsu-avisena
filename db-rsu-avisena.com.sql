/*
Navicat MySQL Data Transfer

Source Server         : MySQL-Localhost
Source Server Version : 50505
Source Host           : 127.1.1.0:3306
Source Database       : db_rskat

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-21 14:20:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `akses` varchar(20) DEFAULT NULL,
  `nama` varchar(26) DEFAULT NULL,
  `no_ponsel` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'admin', 'admin', 'Admin', 'Ini Nama Saya Admin', '081xxxxxxx');
INSERT INTO `login` VALUES ('2', 'user', 'user', 'User', 'User Aja Nama Saya Mah', '089793843315');

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(20) DEFAULT NULL,
  `no_transaksi` varchar(15) DEFAULT NULL,
  `nama_pasien` varchar(30) DEFAULT NULL,
  `guna_bayar` varchar(30) DEFAULT NULL,
  `nominal` varchar(15) DEFAULT NULL,
  `jumlah` varchar(15) DEFAULT NULL,
  `total` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi
-- ----------------------------
INSERT INTO `transaksi` VALUES ('160', '2018-05-21', 'NOT-0001', 'Ny Ernawati', 'Ruang inap kamar mawar A', '250000', '1', '250000');
INSERT INTO `transaksi` VALUES ('161', '2018-05-21', 'NOT-0002', 'Rika Rahmawati', 'Peralatan Operasi Mawar kelas ', '3700000', '1', '3700000');
INSERT INTO `transaksi` VALUES ('162', '2018-05-21', 'NOT-0003', 'Yudi Apriadi', 'Peralatan rumah sakit Kelas A', '5000000', '1', '5000000');
INSERT INTO `transaksi` VALUES ('163', '2018-05-21', 'NOT-0004', 'Agus Nugraha', 'Jarum suntik', '30000', '2', '60000');
