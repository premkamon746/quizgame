/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : m6star

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-23 22:30:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `answer`
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `answer` varchar(2000) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `picture` varchar(10) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('60', '36', null, '1', 'tset', '1', '19_11.jpg', '2017-08-06 12:16:17', '1', null);
INSERT INTO `answer` VALUES ('61', '37', null, '1', 'dd', '1', '19_2.jpg', '2017-08-06 12:22:07', '1', null);
INSERT INTO `answer` VALUES ('62', '38', null, '1', 'as', '1', '19_31.jpg', '2017-08-06 12:23:07', '1', null);
INSERT INTO `answer` VALUES ('71', '41', '21', '1', 'ณเดช คูกิมิยะ', '0', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('72', '41', '21', '2', 'เจมส์ จิรายุ', '1', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('73', '41', '21', '3', 'มาริโอ้ เมาเร่อ', '0', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('74', '41', '21', '4', 'เจมส์ มาร์', '0', '', '2017-08-10 01:37:51', '1', null);
INSERT INTO `answer` VALUES ('75', '42', '21', '1', 'เจมส์ มาร์', '0', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('76', '42', '21', '2', 'เจมส์ จิรายุ', '0', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('77', '42', '21', '3', 'ณเดช คูกิมิยะ', '0', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('78', '42', '21', '4', 'ติ๊ก เจษฎาพร', '1', '', '2017-08-10 01:38:56', '1', null);
INSERT INTO `answer` VALUES ('79', '43', '21', '1', 'ซ่าร่า คอร์เนอร์', '0', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('80', '43', '21', '2', 'มิว นิษฐา', '0', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('81', '43', '21', '3', 'คิมเบอร์ลี่', '0', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('82', '43', '21', '4', 'ใหม่ ดาวิกา', '1', '', '2017-08-10 01:42:35', '1', null);
INSERT INTO `answer` VALUES ('83', '44', '21', '1', 'เชียร์ ฑิฆัมพร ', '1', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('84', '44', '21', '2', 'มิว นิษฐา', '0', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('85', '44', '21', '3', 'มาร์กี้', '0', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('86', '44', '21', '4', 'มิ้น ชาลิดา', '0', '', '2017-08-10 01:44:28', '1', null);
INSERT INTO `answer` VALUES ('142', '40', '21', '1', 'ณเดช คูกิมิยะ', '0', '', '2017-08-14 16:46:11', '1', null);
INSERT INTO `answer` VALUES ('143', '40', '21', '2', 'เจมส์ จิรายุ', '0', '', '2017-08-14 16:46:11', '1', null);
INSERT INTO `answer` VALUES ('144', '40', '21', '3', 'มาริโอ้ เมาเร่อ', '1', '', '2017-08-14 16:46:11', '1', null);
INSERT INTO `answer` VALUES ('145', '40', '21', '4', 'เจมส์ มาร์', '0', '', '2017-08-14 16:46:11', '1', null);
INSERT INTO `answer` VALUES ('149', '39', '21', '1', 'มาริโอ้ เมาเร่อ', '0', '', '2017-08-14 16:48:19', '1', null);
INSERT INTO `answer` VALUES ('150', '39', '21', '2', 'แอนดริว เกร็กสัน', '0', '', '2017-08-14 16:48:19', '1', null);
INSERT INTO `answer` VALUES ('151', '39', '21', '3', 'บริบูรณ์', '1', '', '2017-08-14 16:48:19', '1', null);
INSERT INTO `answer` VALUES ('152', '39', '21', '4', 'วิลลี่ แม็คอินทอช', '0', '', '2017-08-14 16:48:19', '1', null);
INSERT INTO `answer` VALUES ('155', '45', '22', '1', 'คนนิสัยเสีย - อ้อน ลัคนา', '1', '', '2017-08-17 12:12:48', '1', null);
INSERT INTO `answer` VALUES ('156', '45', '22', '2', 'เก็บเอาไว้ - เอิญ จิรวรรณ', '0', '', '2017-08-17 12:12:48', '1', null);
INSERT INTO `answer` VALUES ('157', '45', '22', '3', 'จนกว่าวันนั้น -  ลิเดีย', '0', '', '2017-08-17 12:12:48', '1', null);
INSERT INTO `answer` VALUES ('158', '45', '22', '4', 'ฉันจะจำเธอแบบนี้ - โบ สุนิตา', '0', '', '2017-08-17 12:12:49', '1', null);
INSERT INTO `answer` VALUES ('165', '46', '22', '1', 'น้อยใจ - ลิฟ-ออย', '0', '', '2017-08-17 16:20:01', '1', null);
INSERT INTO `answer` VALUES ('166', '46', '22', '2', 'คำเดียว - แร็พเตอร์', '1', '', '2017-08-17 16:20:01', '1', null);
INSERT INTO `answer` VALUES ('167', '46', '22', '3', 'สมมุติ - โดม ปกรณ์ ลัม', '0', '', '2017-08-17 16:20:01', '1', null);
INSERT INTO `answer` VALUES ('168', '46', '22', '4', 'ทุกวินาที - เจมส์ เรืองศักดิ์', '0', '', '2017-08-17 16:20:01', '1', null);

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
  `title` varchar(4000) CHARACTER SET utf8 NOT NULL,
  `detail` varchar(4000) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `viewcount` int(11) DEFAULT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `timelimit_type` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `choice_layout` int(11) DEFAULT NULL,
  `background` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES ('17', '1', 'test', '', 'img_59746228c1560.jpg', 'active', '0000-00-00 00:00:00', '2017-07-23 15:45:28', null, null, null, null, null);
INSERT INTO `game` VALUES ('18', '1', 'sdf', '', 'img_5975b3dd0f301.jpg', 'active', '2017-07-24 15:46:21', '2017-07-24 15:42:29', null, null, null, null, null);
INSERT INTO `game` VALUES ('19', '1', 'ทดสอบ', 'testasdfasdfcvaxcasdsdfsdf', 'img_59872ea2eddbd.jpg', 'unpublic', '2017-08-13 22:20:11', '2017-07-24 17:30:49', null, '10', 'questlimit', null, null);
INSERT INTO `game` VALUES ('20', '2', 'test', '', 'img_5976e3a0a5ac2.jpg', 'create', '2017-07-25 13:22:24', '2017-07-25 13:14:58', null, null, null, null, null);
INSERT INTO `game` VALUES ('21', '1', 'รูปดาราตอนเด็ก ๆ ดูออกหรือเปล่าว่าใครเป็นใคร', 'ลองดูกันซิว่า คุณแยกได้หรือเปล่าว่า ใครเป็นใคร', 'img_598b5435781db.jpg', 'public', '2017-08-20 09:03:54', '2017-08-10 01:28:05', null, '5', 'questlimit', null, null);
INSERT INTO `game` VALUES ('22', '1', 'ท่อนฮุค เพลงดังในอดีต คนยุค 90 คือเพลงอะไร', 'มาลองดูซิว่า เพลงต่าง ๆ เหล่านี้จะสกิดความทรงจำของคุณได้มากแค่ไหน', 'img_599523538058c.jpg', 'public', '2017-08-19 13:15:20', '2017-08-17 11:45:10', null, '5', 'questlimit', null, null);

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `email` varchar(500) CHARACTER SET utf8 NOT NULL,
  `fbid` varchar(40) CHARACTER SET utf8 NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'Premkamon Kumboonruang', 'premkamon746@gmail.com', '10206280170514147', 'active', '0000-00-00 00:00:00', '2017-07-22 14:46:50', null);
INSERT INTO `member` VALUES ('2', 'Withther Aryof', 'noonoonnaja@gmail.com', '1449543645126278', 'active', '0000-00-00 00:00:00', '2017-07-25 13:14:20', null);

-- ----------------------------
-- Table structure for `mission`
-- ----------------------------
DROP TABLE IF EXISTS `mission`;
CREATE TABLE `mission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `detail` text,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mission
-- ----------------------------

-- ----------------------------
-- Table structure for `mission_game`
-- ----------------------------
DROP TABLE IF EXISTS `mission_game`;
CREATE TABLE `mission_game` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `mission_no` int(11) DEFAULT NULL,
  `mission_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mission_game
-- ----------------------------

-- ----------------------------
-- Table structure for `play_result`
-- ----------------------------
DROP TABLE IF EXISTS `play_result`;
CREATE TABLE `play_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `result` text NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of play_result
-- ----------------------------
INSERT INTO `play_result` VALUES ('1', '1', '22', '0', 'โง่ ควายเอ้ย', '2017-08-17 22:27:43');
INSERT INTO `play_result` VALUES ('2', '1', '21', '6', 'เลี้ยงเสียข้าวสุก', '2017-08-18 22:28:59');
INSERT INTO `play_result` VALUES ('3', '1', '0', '6', 'เลี้ยงเสียข้าวสุก', '2017-08-18 23:17:40');

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `question` varchar(4000) CHARACTER SET utf8 NOT NULL,
  `answer` text CHARACTER SET utf8 NOT NULL,
  `picture` varchar(10) CHARACTER SET utf8 NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('36', '19', '1', '1', 'test', '', '19_1.jpg', '2017-08-06 12:21:46', '2017-08-06 12:16:17', null);
INSERT INTO `question` VALUES ('37', '19', '1', '2', 'dd', '', '19_2.jpg', '2017-08-06 12:22:52', '2017-08-06 12:22:07', null);
INSERT INTO `question` VALUES ('38', '19', '1', '3', 'sss', '', '19_3.jpg', '0000-00-00 00:00:00', '2017-08-06 12:23:07', null);
INSERT INTO `question` VALUES ('39', '21', '1', '1', '', '', '21_1.jpg', '2017-08-14 16:48:19', '2017-08-10 01:35:07', null);
INSERT INTO `question` VALUES ('40', '21', '1', '2', '', '', '21_2.jpg', '2017-08-14 16:51:29', '2017-08-10 01:36:54', null);
INSERT INTO `question` VALUES ('41', '21', '1', '3', '', '', '21_3.jpg', '0000-00-00 00:00:00', '2017-08-10 01:37:51', null);
INSERT INTO `question` VALUES ('42', '21', '1', '4', '', '', '21_4.jpg', '2017-08-14 00:52:55', '2017-08-10 01:38:56', null);
INSERT INTO `question` VALUES ('43', '21', '1', '5', '', '', '21_5.jpg', '2017-08-14 00:52:58', '2017-08-10 01:42:35', null);
INSERT INTO `question` VALUES ('44', '21', '1', '6', '', '', '21_7.jpg', '2017-08-14 14:59:30', '2017-08-10 01:44:28', null);
INSERT INTO `question` VALUES ('45', '22', '1', '1', 'ถ้าหากว่ารักกัน มันยากขนาดนี้  \r\nก็จบกันไป จะดีกว่าไหมเธอ อย่าฝืนเลย\r\n', '', '', '2017-08-17 12:12:48', '2017-08-17 12:07:31', null);
INSERT INTO `question` VALUES ('46', '22', '1', '2', 'โปรดอย่าหลอกว่ายังมีฉัน ทั้งที่มันมีแล้วในใจ ถ้าหวังดีจริงๆใช่ไหม บอกไม่รักฉันคำเดียวพอแล้ว', '', '', '2017-08-17 16:20:01', '2017-08-17 14:52:27', null);

-- ----------------------------
-- Table structure for `result`
-- ----------------------------
DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `start_score` int(11) DEFAULT NULL,
  `end_score` int(11) DEFAULT NULL,
  `result` text,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of result
-- ----------------------------
INSERT INTO `result` VALUES ('12', '21', '0', '1', 'โง่ ควายเอ้ย', null, null, '1');
INSERT INTO `result` VALUES ('13', '21', '2', '3', 'ดักดาน', null, null, '1');
INSERT INTO `result` VALUES ('14', '21', '4', '5', 'ไถนา', null, null, '1');
INSERT INTO `result` VALUES ('15', '21', '6', '7', 'เลี้ยงเสียข้าวสุก', null, null, '1');
INSERT INTO `result` VALUES ('16', '22', '0', '1', 'โง่ ควายเอ้ย', null, null, '1');
INSERT INTO `result` VALUES ('17', '22', '2', '3', 'โง่ ควายเอ้ย', null, null, '1');
