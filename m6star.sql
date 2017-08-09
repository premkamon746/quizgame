/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : m6star

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-10 03:58:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `answer`
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `answer` varchar(2000) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `picture` varchar(10) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('60', '36', '1', 'tset', '1', '19_11.jpg', '2017-08-06 12:16:17', '1', null);
INSERT INTO `answer` VALUES ('61', '37', '1', 'dd', '1', '19_2.jpg', '2017-08-06 12:22:07', '1', null);
INSERT INTO `answer` VALUES ('62', '38', '1', 'as', '1', '19_31.jpg', '2017-08-06 12:23:07', '1', null);
INSERT INTO `answer` VALUES ('63', '39', '1', 'แอนดริว เกร็กสัน', '0', '', '2017-08-10 01:35:07', '1', null);
INSERT INTO `answer` VALUES ('64', '39', '2', 'วิลลี่ แมคอินทอช', '0', '', '2017-08-10 01:35:07', '1', null);
INSERT INTO `answer` VALUES ('65', '39', '3', 'ตั๊ก บริบูรณ์', '1', '', '2017-08-10 01:35:07', '1', null);
INSERT INTO `answer` VALUES ('66', '39', '4', 'มาริโอ้ เมาเร่อ', '0', '', '2017-08-10 01:35:07', '1', null);
INSERT INTO `answer` VALUES ('67', '40', '1', 'ณเดช คูกิมิยะ', '0', '', '2017-08-10 01:36:54', '1', null);
INSERT INTO `answer` VALUES ('68', '40', '2', 'เจมส์ จิรายุ', '0', '', '2017-08-10 01:36:54', '1', null);
INSERT INTO `answer` VALUES ('69', '40', '3', 'มาริโอ้ เมาเร่อ', '1', '', '2017-08-10 01:36:54', '1', null);
INSERT INTO `answer` VALUES ('70', '40', '4', 'เจมส์ มาร์', '0', '', '2017-08-10 01:36:54', '1', null);
INSERT INTO `answer` VALUES ('71', '41', '1', 'ณเดช คูกิมิยะ', '0', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('72', '41', '2', 'เจมส์ จิรายุ', '1', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('73', '41', '3', 'มาริโอ้ เมาเร่อ', '0', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('74', '41', '4', 'เจมส์ มาร์', '0', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('75', '42', '1', 'เจมส์ มาร์', '0', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('76', '42', '2', 'เจมส์ จิรายุ', '0', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('77', '42', '3', 'ณเดช คูกิมิยะ', '0', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('78', '42', '4', 'ติ๊ก เจษฎาพร', '1', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('79', '43', '1', 'ซ่าร่า คอร์เนอร์', '0', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('80', '43', '2', 'มิว นิษฐา', '0', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('81', '43', '3', 'คิมเบอร์ลี่', '0', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('82', '43', '4', 'ใหม่ ดาวิกา', '1', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('83', '44', '1', 'เชียร์ ฑิฆัมพร ', '1', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('84', '44', '2', 'มิว นิษฐา', '0', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('85', '44', '3', 'มาร์กี้', '0', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('86', '44', '4', 'มิ้น ชาลิดา', '0', '', '2017-08-10 01:44:28', '1', null);

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'quiz');
INSERT INTO `category` VALUES ('2', 'photo_hunt');
INSERT INTO `category` VALUES ('3', 'news');
INSERT INTO `category` VALUES ('4', 'video');
INSERT INTO `category` VALUES ('5', 'photo');

-- ----------------------------
-- Table structure for `game`
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `title` varchar(4000) COLLATE utf8_croatian_ci NOT NULL,
  `detail` varchar(4000) COLLATE utf8_croatian_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `viewcount` int(11) DEFAULT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `timelimit_type` varchar(10) COLLATE utf8_croatian_ci DEFAULT NULL,
  `choice_layout` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES ('17', '1', 'test', '', 'img_59746228c1560.jpg', 'active', '0000-00-00 00:00:00', '2017-07-23 15:45:28', null, null, null, null);
INSERT INTO `game` VALUES ('18', '1', 'sdf', '', 'img_5975b3dd0f301.jpg', 'active', '2017-07-24 15:46:21', '2017-07-24 15:42:29', null, null, null, null);
INSERT INTO `game` VALUES ('19', '1', 'ทดสอบ', 'testasdfasdfcvaxcasdsdfsdf', 'img_59872ea2eddbd.jpg', 'public', '2017-08-08 22:11:49', '2017-07-24 17:30:49', null, '10', 'questlimit', null);
INSERT INTO `game` VALUES ('20', '2', 'test', '', 'img_5976e3a0a5ac2.jpg', 'create', '2017-07-25 13:22:24', '2017-07-25 13:14:58', null, null, null, null);
INSERT INTO `game` VALUES ('21', '1', 'รูปดาราตอนเด็ก ๆ ดูออกหรือเปล่าว่าใครเป็นใคร', 'ลองดูกันซิว่า คุณแยกได้หรือเปล่าว่า ใครเป็นใคร', 'img_598b5435781db.jpg', 'public', '2017-08-10 03:45:24', '2017-08-10 01:28:05', null, '5', 'questlimit', null);

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `fbid` varchar(40) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'Premkamon Kumboonruang', 'premkamon746@gmail.com', '10206280170514147', 'active', '0000-00-00 00:00:00', '2017-07-22 14:46:50');
INSERT INTO `member` VALUES ('2', 'Withther Aryof', 'noonoonnaja@gmail.com', '1449543645126278', 'active', '0000-00-00 00:00:00', '2017-07-25 13:14:20');

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `question` varchar(4000) COLLATE utf8_croatian_ci NOT NULL,
  `answer` text COLLATE utf8_croatian_ci NOT NULL,
  `picture` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) COLLATE utf8_croatian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('36', '19', '1', '1', 'test', '', '19_1.jpg', '2017-08-06 12:21:46', '2017-08-06 12:16:17', null);
INSERT INTO `question` VALUES ('37', '19', '1', '2', 'dd', '', '19_2.jpg', '2017-08-06 12:22:52', '2017-08-06 12:22:07', null);
INSERT INTO `question` VALUES ('38', '19', '1', '3', 'sss', '', '19_3.jpg', '0000-00-00 00:00:00', '2017-08-06 12:23:07', null);
INSERT INTO `question` VALUES ('39', '21', '1', '1', '', '', '21_1.jpg', '0000-00-00 00:00:00', '2017-08-10 01:35:07', null);
INSERT INTO `question` VALUES ('40', '21', '1', '2', '', '', '21_2.jpg', '0000-00-00 00:00:00', '2017-08-10 01:36:54', null);
INSERT INTO `question` VALUES ('41', '21', '1', '3', '', '', '21_3.jpg', '0000-00-00 00:00:00', '2017-08-10 01:37:51', null);
INSERT INTO `question` VALUES ('42', '21', '1', '4', '', '', '21_4.jpg', '0000-00-00 00:00:00', '2017-08-10 01:38:56', null);
INSERT INTO `question` VALUES ('43', '21', '1', '5', '', '', '21_5.jpg', '0000-00-00 00:00:00', '2017-08-10 01:42:35', null);
INSERT INTO `question` VALUES ('44', '21', '1', '6', '', '', '21_6.jpg', '0000-00-00 00:00:00', '2017-08-10 01:44:28', null);
