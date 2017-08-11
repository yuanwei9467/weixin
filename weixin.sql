/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : weixin

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-08-11 16:44:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(255) NOT NULL,
  `from_user` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `msgid` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', 'yuanwei', 'yuanwei', '1496454353', 'text', 'test', '123');

-- ----------------------------
-- Table structure for `message_image`
-- ----------------------------
DROP TABLE IF EXISTS `message_image`;
CREATE TABLE `message_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_url` varchar(255) NOT NULL,
  `media_id` varchar(100) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_image
-- ----------------------------

-- ----------------------------
-- Table structure for `message_text`
-- ----------------------------
DROP TABLE IF EXISTS `message_text`;
CREATE TABLE `message_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_text
-- ----------------------------

-- ----------------------------
-- Table structure for `message_video`
-- ----------------------------
DROP TABLE IF EXISTS `message_video`;
CREATE TABLE `message_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` varchar(100) NOT NULL,
  `thumb_media_id` varchar(100) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_video
-- ----------------------------

-- ----------------------------
-- Table structure for `message_voice`
-- ----------------------------
DROP TABLE IF EXISTS `message_voice`;
CREATE TABLE `message_voice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` varchar(100) NOT NULL,
  `format` varchar(50) NOT NULL,
  `message_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message_voice
-- ----------------------------
