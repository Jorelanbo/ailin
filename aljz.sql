/*
Navicat MySQL Data Transfer

Source Server         : phpStudy_localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : aljz

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-10 18:22:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `password_hash` varchar(225) DEFAULT NULL,
  `password_reset_token` varchar(225) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_key` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(100) DEFAULT NULL,
  `updated_at` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('2', 'jorelanbo', '$2y$13$K5sO.uD6Y.dPQFKSkwpWMuxJRCJy8wtJ4Co/9qTWunqdm7E8hQpDW', null, 'jorelanbo@126.com', 'pjpDTgbqebLct5iW3eaWqmjdVbVeWOa0', '10', '1489730012', '1489730012');

-- ----------------------------
-- Table structure for employee
-- ----------------------------
DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `age` int(20) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `identify_num` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '可调度状态\r\n1：可调度1；\r\n2：可调度2；\r\n3：可调度3；\r\n4：可调度4；\r\n5：可调度5；\r\n6：可调度6。',
  `check_in_time` int(20) NOT NULL,
  `updated_at` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of employee
-- ----------------------------
INSERT INTO `employee` VALUES ('1', '张大妈', '46', '2', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXX', '孝感孝南', '1', '1231312333', '1490589403');
INSERT INTO `employee` VALUES ('2', '李大姐', '43', '2', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXX', '白沙', '1', '1490586764', '1490586764');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `password_hash` varchar(225) DEFAULT NULL,
  `password_reset_token` varchar(225) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `auth_key` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(100) DEFAULT NULL,
  `updated_at` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'jorelanbo', '$2y$13$K5sO.uD6Y.dPQFKSkwpWMuxJRCJy8wtJ4Co/9qTWunqdm7E8hQpDW', null, 'jorelanbo@126.com', 'pjpDTgbqebLct5iW3eaWqmjdVbVeWOa0', '10', '1489730012', '1489730012');
