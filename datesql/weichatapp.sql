/*
Navicat MySQL Data Transfer

Source Server         : forlocalhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : weichatapp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-12 18:26:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for wei_admins
-- ----------------------------
DROP TABLE IF EXISTS `wei_admins`;
CREATE TABLE `wei_admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `password` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wei_admins
-- ----------------------------
INSERT INTO `wei_admins` VALUES ('1', 'admin', '69aa8ce43643a5be881f05823b110604b32b5bdf');

-- ----------------------------
-- Table structure for wei_industry
-- ----------------------------
DROP TABLE IF EXISTS `wei_industry`;
CREATE TABLE `wei_industry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '行业名  ',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '1  表示示行业或者种类 1 行业  2 种类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wei_industry
-- ----------------------------

-- ----------------------------
-- Table structure for wei_messages
-- ----------------------------
DROP TABLE IF EXISTS `wei_messages`;
CREATE TABLE `wei_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL COMMENT '用户id',
  `requirementid` int(10) unsigned NOT NULL COMMENT '需求id',
  `content` text COMMENT '留言内容',
  `time` datetime DEFAULT NULL COMMENT '留言时间',
  `response` text COMMENT '回复内容',
  `recovery` datetime DEFAULT NULL COMMENT '回复时间',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '类型 1 普通  2 私密',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '状态  1 待回复  2 已回复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wei_messages
-- ----------------------------

-- ----------------------------
-- Table structure for wei_requirements
-- ----------------------------
DROP TABLE IF EXISTS `wei_requirements`;
CREATE TABLE `wei_requirements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL COMMENT '平台或者行业',
  `industry` int(10) unsigned DEFAULT NULL COMMENT '行业',
  `species` int(10) unsigned DEFAULT NULL COMMENT '种类',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `time` datetime DEFAULT NULL COMMENT '时间',
  `clicks` int(10) unsigned DEFAULT NULL COMMENT '点击数',
  `creator` varchar(50) DEFAULT NULL COMMENT '创建者',
  `messages` int(10) unsigned DEFAULT NULL COMMENT '留言数',
  `update` datetime DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '状态 1 待审核  2 已审核',
  `delete` tinyint(3) unsigned DEFAULT NULL COMMENT '删除标记  0  为删除 1 删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wei_requirements
-- ----------------------------

-- ----------------------------
-- Table structure for wei_users
-- ----------------------------
DROP TABLE IF EXISTS `wei_users`;
CREATE TABLE `wei_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(200) DEFAULT NULL COMMENT 'openid微信',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `nickname` varchar(60) DEFAULT NULL COMMENT '昵称',
  `position` varchar(50) DEFAULT NULL COMMENT '职位',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '状态  1 已注册  0未注册',
  `company` varchar(100) DEFAULT NULL COMMENT '公司名字',
  `industry` int(10) unsigned DEFAULT NULL COMMENT '行业 id',
  `classify` varchar(20) DEFAULT NULL COMMENT '分类',
  `isdelete` tinyint(3) unsigned DEFAULT '0' COMMENT '删除是否   1 删除  0 否',
  `product` varchar(50) DEFAULT NULL COMMENT '公司主营业务或产品',
  `public` tinyint(3) unsigned DEFAULT '0' COMMENT '是否公开联系方式 0 否 1  公开  默认 0 ',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '用户注册类型  1  前台注册  2 后台模拟',
  `checks` tinyint(3) unsigned DEFAULT NULL COMMENT '剩余查看  用户数量',
  `messages` tinyint(3) unsigned DEFAULT NULL COMMENT '剩余留言次数',
  `honemessages` tinyint(3) unsigned DEFAULT NULL COMMENT '非注册用户主页信息剩余条数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wei_users
-- ----------------------------
