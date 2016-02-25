/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50538
 Source Host           : localhost
 Source Database       : db_shopping

 Target Server Type    : MySQL
 Target Server Version : 50538
 File Encoding         : utf-8

 Date: 02/25/2016 20:57:59 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `banner_id` char(5) NOT NULL DEFAULT '' COMMENT 'รหัส',
  `banner_images` varchar(100) DEFAULT NULL COMMENT 'รูปภาพ',
  `status` enum('1','0') DEFAULT NULL COMMENT 'สภานะการแสดง 0 = ''ไม่ให้แสดง'', 1 = ''ให้แสดง''',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บแบนเนอร์';

-- ----------------------------
--  Records of `banner`
-- ----------------------------
BEGIN;
INSERT INTO `banner` VALUES ('00001', 'img1.jpg', '1'), ('00003', 'img3.jpg', '1');
COMMIT;

-- ----------------------------
--  Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) DEFAULT NULL,
  `comment` longtext,
  `pid` varchar(10) DEFAULT NULL,
  `d_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proid` (`product_id`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  CONSTRAINT `productid` FOREIGN KEY (`product_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตาราง Comment สินค้า';

-- ----------------------------
--  Table structure for `logo`
-- ----------------------------
DROP TABLE IF EXISTS `logo`;
CREATE TABLE `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(100) DEFAULT NULL,
  `active` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บโลโก้เว็บ';

-- ----------------------------
--  Table structure for `masuser`
-- ----------------------------
DROP TABLE IF EXISTS `masuser`;
CREATE TABLE `masuser` (
  `id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `oid` char(3) DEFAULT NULL COMMENT 'รหัสคำนำหน้า',
  `pid` char(10) NOT NULL DEFAULT '' COMMENT 'รหัสสมาชิก',
  `password` varchar(8) NOT NULL DEFAULT '' COMMENT 'รหัสผ่าน',
  `name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(100) DEFAULT NULL COMMENT 'นามสกุล',
  `card` char(13) NOT NULL DEFAULT '' COMMENT 'บัตรประชาชน',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT 'อีเมล์',
  `address` varchar(150) DEFAULT NULL COMMENT 'ที่อยู่',
  `tel` char(10) DEFAULT NULL COMMENT 'เบอร์โทร',
  `status` enum('U','A') DEFAULT NULL COMMENT 'สถานะ U=''สมาชิก'',A=''เจ้าหน้าที่''',
  `d_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'วันที่',
  PRIMARY KEY (`pid`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `oid` (`oid`) USING BTREE,
  KEY `pid` (`pid`),
  KEY `password` (`password`) USING BTREE,
  CONSTRAINT `oid` FOREIGN KEY (`oid`) REFERENCES `pername` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='ตารางสมาชิก';

-- ----------------------------
--  Records of `masuser`
-- ----------------------------
BEGIN;
INSERT INTO `masuser` VALUES ('4', '003', '0000000003', '22222222', 'ภาคภูมิ', 'มาแสน', '2334324243242', 'kimniyom_club1@hotmail.com', 'เขื่อนภูมิพล', '2342343243', 'U', '2013-10-15 10:23:46'), ('1', '001', '0000000005', 'admin', 'AdminSystem', 'Admin_SK', '1530600027345', 'admin@gmail.com', 'tak thailand 6300', '0800260943', 'A', '2015-04-07 06:16:56'), ('6', '004', '0000000006', 'user', 'มนัส', 'ผู้ดี', '1530944454666', 'user@gmail.com', 'Tak Thailand 504/5 ตำบล ระแหง อำเภอ เมือง จังหวัด ตาก 63000', '0800300984', 'U', '2013-11-07 01:45:00'), ('8', '006', '0000000008', '00000000', 'วาสนา', 'แสงท้าว', '1304000394044', 'wasana@gmail.com', 'TAK', '0800260943', 'U', '2014-01-31 18:13:02'), ('9', '001', '0000000009', '12345678', 'kimnyom', 'kimniyom', '1430393039303', 'kimniyom01@gmail.com', 'UTT', '9797979797', 'U', '2014-02-02 18:28:23'), ('10', '001', '0000000010', '12345678', 'สมหมาย', 'มโนดี', '1325022232523', 'sk@gmail.com', 'TAK THAILAND 63000', '0822323252', 'U', '2014-11-17 15:19:55'), ('11', '001', '0000000011', '00000000', 'มาโนชน์', 'มาเร็ว', '1532622232565', 'manod@gmail.com', 'BANKTAK THAILAND 63000', '0800232156', 'U', '2014-11-17 15:14:54'), ('12', '001', '0000000012', 'demo', 'demo', 'demo', '1530633356230', 'demo@gmail.com', 'Tak ThaiLand 63000', '0800369888', 'U', '2014-11-17 20:19:55'), ('13', '001', '0000000013', '12345678', 'ปิยพงษ์', 'สิทธิวงค์', '1639900147777', 'tom@gmail.com', 'กดกดหเดกเ', '0956359967', 'U', '2014-11-17 20:48:54'), ('14', '001', '0000000014', '12345678', 'llldsf', 'sdfdsgf', '1234567890989', 'mmmm@gmail.com', 'tfdgdg', '0956359967', 'U', '2014-11-18 10:34:56'), ('15', '002', '0000000015', '12345678', 'อนิตยา', 'สมใจ', '1639900147777', 'moomoo_nog@hotmail.com', 'Tak Thailand', '0866712167', 'U', '2015-03-31 01:55:47'), ('16', '001', '0000000016', '08002609', 'ทรงพล', 'คำสะอาด', '1530600027345', 'kimniyom_club@hotmail.com', '165 ม.7 ต.ไม้งาม อ.เมือง จ.ตาก 63000', '0821684717', 'U', '2015-04-03 16:26:12');
COMMIT;

-- ----------------------------
--  Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `new_id` char(10) NOT NULL DEFAULT '' COMMENT 'รหัสข่าว',
  `new_title` varchar(255) DEFAULT NULL COMMENT 'หัวข้อ',
  `new_detail` text COMMENT 'ikp]tgvupf',
  `new_date` date DEFAULT NULL COMMENT 'วันที่',
  `new_img` varchar(100) DEFAULT NULL COMMENT 'รูปภาพ',
  `pid` char(10) DEFAULT NULL COMMENT 'รหัสผู้บันทึก',
  PRIMARY KEY (`new_id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  CONSTRAINT `pid_mas` FOREIGN KEY (`pid`) REFERENCES `masuser` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางข่าว';

-- ----------------------------
--  Table structure for `notify`
-- ----------------------------
DROP TABLE IF EXISTS `notify`;
CREATE TABLE `notify` (
  `notify_id` int(7) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `order_id` varchar(20) DEFAULT NULL COMMENT 'รหัสการสั่งซื้อ',
  `money` int(7) DEFAULT NULL COMMENT 'ราคา',
  `date_tranfer` date DEFAULT NULL COMMENT 'วันที่ส่ง',
  `bill` varchar(100) DEFAULT NULL COMMENT 'หลักฐาน',
  `time_tranfer` varchar(20) DEFAULT NULL COMMENT 'เวลาที่ส่ง',
  `status` char(1) DEFAULT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`notify_id`),
  KEY `oederid` (`order_id`) USING BTREE,
  CONSTRAINT `order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='ตารางแจ้งเตือนการส่งสินค้า';

-- ----------------------------
--  Records of `notify`
-- ----------------------------
BEGIN;
INSERT INTO `notify` VALUES ('1', '0000002', '500', '2015-03-31', '1573-4.jpg', '15:30', '1'), ('2', '0000006', '700', '2015-04-03', 'kmlogo.png', '16:15', '1'), ('3', '0000012', '2500', '2015-06-02', null, '20:00', null);
COMMIT;

-- ----------------------------
--  Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `order_id` varchar(20) NOT NULL DEFAULT '' COMMENT 'รหัสการสั่งสินค้า',
  `pid` char(10) DEFAULT NULL COMMENT 'รหัสผู้สั่งซื้อ',
  `order_date` date DEFAULT NULL COMMENT 'วันที่สั่งซื้อ',
  `produce_number` int(7) DEFAULT NULL COMMENT 'จำนวนสินค้าที่สั่งซื้อ',
  `price` int(7) DEFAULT NULL COMMENT 'ราคา',
  `status` enum('0','1','2') DEFAULT '0' COMMENT 'สถานะการสั่งซื้อ',
  `produce_id` varchar(20) DEFAULT NULL COMMENT 'รหัสสินค้าที่สั่งซื้อ',
  `postcode` varchar(20) DEFAULT NULL COMMENT 'รหัสเลขไปรษณีย์ที่จัดส่ง',
  `date_send` date DEFAULT NULL COMMENT 'วันที่ส่งของ',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `pid` (`pid`) USING BTREE,
  CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `masuser` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COMMENT='ตารางการสั่งซื้อสินค้ส';

-- ----------------------------
--  Records of `orders`
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES ('5', '0000001', '0000000005', '2015-03-31', '1', '500', '0', '2', null, null), ('6', '0000001', '0000000005', '2015-03-31', '2', '500', '0', '2', null, null), ('7', '0000002', '0000000015', '2015-03-31', '1', '500', '2', '2', 'EMS540989TH', '2015-03-31'), ('8', '0000003', '0000000005', '2015-03-31', '0', '500', '0', '2', null, null), ('9', '0000003', '0000000005', '2015-03-31', '1', '500', '0', '2', null, null), ('10', '0000004', '0000000005', '2015-04-03', '1', '700', '0', '5', null, null), ('11', '0000004', '0000000005', '2015-04-03', '1', '700', '0', '5', null, null), ('12', '0000004', '0000000005', '2015-04-03', '1', '700', '0', '5', null, null), ('13', '0000004', '0000000005', '2015-04-03', '1', '500', '0', '2', null, null), ('14', '0000004', '0000000005', '2015-04-03', '1', '500', '0', '2', null, null), ('15', '0000004', '0000000005', '2015-04-03', '1', '500', '0', '2', null, null), ('16', '0000004', '0000000005', '2015-04-03', '1', '500', '0', '2', null, null), ('31', '0000006', '0000000015', '2015-04-03', '1', '700', '2', '5', 'ETR3049586', '2015-04-03'), ('50', '0000008', '0000000016', '2015-04-03', '1', '500', '0', '2', null, null), ('52', '0000009', null, '2015-04-03', '1', '500', '0', '2', null, null), ('53', '0000010', '0000000016', '2015-04-03', '1', '700', '0', '5', null, null), ('54', '0000010', '0000000016', '2015-04-03', '1', '700', '0', '5', null, null), ('64', '0000011', '0000000016', '2015-04-03', '1', '500', '0', '2', null, null), ('65', '0000011', '0000000016', '2015-04-03', '1', '500', '0', '2', null, null), ('66', '0000012', '0000000005', '2015-06-01', '1', '790', '1', 'P20150408192149', null, null), ('67', '0000012', '0000000005', '2015-06-01', '1', '650', '1', 'P20150408193546', null, null);
COMMIT;

-- ----------------------------
--  Table structure for `pername`
-- ----------------------------
DROP TABLE IF EXISTS `pername`;
CREATE TABLE `pername` (
  `oid` char(3) NOT NULL DEFAULT '' COMMENT 'รหัส',
  `pername` varchar(50) DEFAULT NULL COMMENT 'คำนำหน้า',
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางคำนำหน้าชื้อ';

-- ----------------------------
--  Records of `pername`
-- ----------------------------
BEGIN;
INSERT INTO `pername` VALUES ('001', 'นาย'), ('002', 'นาง'), ('003', 'นางสาว'), ('004', 'ด.ช.'), ('005', 'ด.ญ.'), ('006', 'เด็กชาย'), ('007', 'เด็กหญิง');
COMMIT;

-- ----------------------------
--  Table structure for `produce`
-- ----------------------------
DROP TABLE IF EXISTS `produce`;
CREATE TABLE `produce` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `produce_id` varchar(20) NOT NULL DEFAULT '0' COMMENT 'รหัสสินค้า',
  `produce_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อสินค้า',
  `produce_price` int(7) DEFAULT '0' COMMENT 'ราคา',
  `produce_detail` text COMMENT 'รายละเอียด',
  `product_num` int(5) DEFAULT NULL COMMENT 'จำนวนคงเหลือในระบบ',
  `type_id` char(3) DEFAULT NULL COMMENT 'รหัส ประเภท',
  `d_update` datetime DEFAULT NULL COMMENT 'วันที่',
  PRIMARY KEY (`produce_id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `type_id` (`type_id`),
  CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `produce_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='ตารางสินค้า';

-- ----------------------------
--  Records of `produce`
-- ----------------------------
BEGIN;
INSERT INTO `produce` VALUES ('1', 'P20150407094310', 'ConvesAllStar', '560', '<p><img alt=\"\" src=\"http://localhost/sale_online/assets/ckeditor_upload/upload/files/1429891867_841281-topic-1420445812-9.jpg\" style=\"height:267px; width:200px\" /></p>\n\n<p>&nbsp;</p>\n\n<p><strong>รองเท้าหุ้มส้นสีขาว</strong></p>\n', '3', '005', '2015-06-07 15:10:19'), ('4', 'P20150408191514', 'CONVERS ALL STAR', '600', '<p>CONVERS ALL STAR</p>\n', '1', '005', '2015-04-08 19:15:48'), ('5', 'P20150408192149', 'TEST Convers All Star White', '790', '<p>TEST Convers All Star White</p>\n', '1', '005', '2015-04-08 19:22:27'), ('6', 'P20150408193309', 'M MANGO', '250', '<p>DFDGDGDFGGG</p>\n', '1', '005', '2015-04-08 19:33:33'), ('7', 'P20150408193546', 'kimniyom', '650', '<p>KIMNIYOM</p>\n', '1', '005', '2015-04-08 19:36:06'), ('8', 'P20150607151036', 'ทดสอบ', '400', '<p>ddgdfg</p>\n', '1', '005', '2015-06-07 15:10:52');
COMMIT;

-- ----------------------------
--  Table structure for `produce_images`
-- ----------------------------
DROP TABLE IF EXISTS `produce_images`;
CREATE TABLE `produce_images` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `produce_id` varchar(20) DEFAULT NULL COMMENT 'รหัสสินค้า',
  `images` varchar(100) DEFAULT NULL COMMENT 'รูปภาพ',
  PRIMARY KEY (`id`),
  KEY `proid` (`produce_id`) USING BTREE,
  CONSTRAINT `proid` FOREIGN KEY (`produce_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บรูปภาพสินค้า';

-- ----------------------------
--  Records of `produce_images`
-- ----------------------------
BEGIN;
INSERT INTO `produce_images` VALUES ('1', 'P20150407094310', '094910Screen Shot 2558-04-03 at 13.43.42.png'), ('2', 'P20150407094310', '095149kmlogo.png'), ('3', 'P20150407094310', '095226erroricon.png'), ('5', 'P20150408191514', '191559640.jpg'), ('6', 'P20150408192149', '192234640.jpg'), ('7', 'P20150408193309', '193343Screen Shot 2558-04-03 at 13.43.42.png'), ('8', 'P20150607151036', '151115SM1.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `produce_type`
-- ----------------------------
DROP TABLE IF EXISTS `produce_type`;
CREATE TABLE `produce_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส',
  `type_id` char(3) NOT NULL DEFAULT '' COMMENT 'รหัสประเภท',
  `type_name` varchar(255) DEFAULT NULL COMMENT 'ประเภท',
  PRIMARY KEY (`type_id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='ตารางประเภทสินค้า';

-- ----------------------------
--  Records of `produce_type`
-- ----------------------------
BEGIN;
INSERT INTO `produce_type` VALUES ('20', '003', 'ผ้าและเครื่องแต่งกาย'), ('21', '004', 'ของใช้/ของตกแต่ง'), ('22', '005', 'รองเท้า');
COMMIT;

-- ----------------------------
--  Table structure for `webname`
-- ----------------------------
DROP TABLE IF EXISTS `webname`;
CREATE TABLE `webname` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `webname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บชื่อระบบงาน';

-- ----------------------------
--  Records of `webname`
-- ----------------------------
BEGIN;
INSERT INTO `webname` VALUES ('1', 'KimniyomShopping');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
