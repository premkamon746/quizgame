/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : m6star

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-06 21:47:31
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of answer
-- ----------------------------
INSERT INTO `answer` VALUES ('60', '36', '1', 'tset', '1', '19_11.jpg', '2017-08-06 12:16:17', '1', null);
INSERT INTO `answer` VALUES ('61', '37', '1', 'dd', '1', '19_2.jpg', '2017-08-06 12:22:07', '1', null);
INSERT INTO `answer` VALUES ('62', '38', '1', 'as', '1', '19_31.jpg', '2017-08-06 12:23:07', '1', null);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES ('17', '1', 'test', '', 'img_59746228c1560.jpg', 'active', '0000-00-00 00:00:00', '2017-07-23 15:45:28', null, null, null);
INSERT INTO `game` VALUES ('18', '1', 'sdf', '', 'img_5975b3dd0f301.jpg', 'active', '2017-07-24 15:46:21', '2017-07-24 15:42:29', null, null, null);
INSERT INTO `game` VALUES ('19', '1', 'ทดสอบ', '', 'img_59777179f3c5f.jpg', 'active', '2017-08-06 14:30:48', '2017-07-24 17:30:49', null, null, null);
INSERT INTO `game` VALUES ('20', '2', 'test', '', 'img_5976e3a0a5ac2.jpg', 'create', '2017-07-25 13:22:24', '2017-07-25 13:14:58', null, null, null);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('36', '19', '1', '1', 'test', '', '19_1.jpg', '2017-08-06 12:21:46', '2017-08-06 12:16:17');
INSERT INTO `question` VALUES ('37', '19', '1', '2', 'dd', '', '19_2.jpg', '2017-08-06 12:22:52', '2017-08-06 12:22:07');
INSERT INTO `question` VALUES ('38', '19', '1', '3', 'sss', '', '19_3.jpg', '0000-00-00 00:00:00', '2017-08-06 12:23:07');
