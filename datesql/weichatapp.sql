/*
Navicat MySQL Data Transfer

Source Server         : forlocalhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : weichatapp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-25 15:23:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for table_admins
-- ----------------------------
DROP TABLE IF EXISTS `table_admins`;
CREATE TABLE `table_admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(40) NOT NULL,
  `password` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of table_admins
-- ----------------------------
INSERT INTO `table_admins` VALUES ('1', 'admin', '69aa8ce43643a5be881f05823b110604b32b5bdf');

-- ----------------------------
-- Table structure for table_industrys
-- ----------------------------
DROP TABLE IF EXISTS `table_industrys`;
CREATE TABLE `table_industrys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '行业名  ',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '1  表示示行业或者种类 1 行业  2 种类',
  `deleted` tinyint(1) unsigned DEFAULT '0' COMMENT '0，正常，1：删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of table_industrys
-- ----------------------------
INSERT INTO `table_industrys` VALUES ('1', '美容', '1', '1');
INSERT INTO `table_industrys` VALUES ('2', '美发1111', '2', '0');
INSERT INTO `table_industrys` VALUES ('3', '整容', '1', '0');
INSERT INTO `table_industrys` VALUES ('4', '整形', '2', '0');
INSERT INTO `table_industrys` VALUES ('5', '医疗', '2', '0');
INSERT INTO `table_industrys` VALUES ('6', '运动', '2', '0');
INSERT INTO `table_industrys` VALUES ('7', '餐饮', '2', '0');
INSERT INTO `table_industrys` VALUES ('8', '娱乐', '1', '0');
INSERT INTO `table_industrys` VALUES ('9', 'qwerewew', '1', '0');

-- ----------------------------
-- Table structure for table_messages
-- ----------------------------
DROP TABLE IF EXISTS `table_messages`;
CREATE TABLE `table_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `requirement_id` int(10) unsigned NOT NULL COMMENT '需求id',
  `content` text COMMENT '留言内容',
  `created` datetime DEFAULT NULL COMMENT '留言时间',
  `response` text COMMENT '回复内容',
  `recovery` datetime DEFAULT NULL COMMENT '回复时间',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '类型 1 普通  2 私密',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '状态  1 待回复  2 已回复',
  `deleted` tinyint(3) unsigned DEFAULT NULL COMMENT '删除标记  0  为删除 1 删除',
  PRIMARY KEY (`id`),
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of table_messages
-- ----------------------------
INSERT INTO `table_messages` VALUES ('1', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '1');
INSERT INTO `table_messages` VALUES ('2', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '1');
INSERT INTO `table_messages` VALUES ('3', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '1');
INSERT INTO `table_messages` VALUES ('4', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '1');
INSERT INTO `table_messages` VALUES ('5', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('6', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('7', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('8', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('9', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('10', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('11', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('12', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('13', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('14', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('15', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '2', '1', '0');
INSERT INTO `table_messages` VALUES ('16', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('17', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('18', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '2', '2', '0');
INSERT INTO `table_messages` VALUES ('19', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('20', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('21', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '2', '2', '0');
INSERT INTO `table_messages` VALUES ('22', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('23', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('24', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '2', '1', '0');
INSERT INTO `table_messages` VALUES ('25', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('26', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('27', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '2', '1', '0');
INSERT INTO `table_messages` VALUES ('28', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('29', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('30', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '1', '1', '0');
INSERT INTO `table_messages` VALUES ('31', '5', '3', 'adsfdsfds', '2017-09-15 10:37:36', 'erwqfdaf', '2017-09-15 10:37:43', '2', '1', '0');
INSERT INTO `table_messages` VALUES ('32', '43', '10', '踢死', '2017-09-20 02:26:49', '11rqfsdafdsfd', '2017-09-20 02:47:33', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('33', '43', '10', '踢死', '2017-09-20 02:27:32', '11rqfsdafdsfd', '2017-09-20 02:47:47', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('34', '43', '10', '踢死', '2017-09-20 03:25:22', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('35', '1', '10', '踢死', '2017-09-20 03:26:42', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('36', '6', '10', '踢死', '2017-09-20 03:29:49', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('37', '6', '10', '踢死', '2017-09-20 03:58:13', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('38', '6', '10', '踢死', '2017-09-20 03:58:15', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('39', '6', '10', '踢死', '2017-09-20 03:58:35', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('40', '6', '10', '踢死', '2017-09-20 03:58:37', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('41', '6', '10', '踢死', '2017-09-20 03:58:38', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('42', '6', '10', '踢死', '2017-09-20 03:58:39', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('43', '6', '10', '踢死', '2017-09-20 03:58:40', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('44', '6', '10', '踢死', '2017-09-20 03:59:04', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('45', '6', '10', '踢死', '2017-09-20 03:59:15', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('46', '1', '10', '踢死', '2017-09-20 08:01:40', '4444444444444444444444444', '2017-09-20 09:24:32', '1', '2', '0');
INSERT INTO `table_messages` VALUES ('47', '2', '2', 'qqq111111', '2017-09-20 09:18:55', null, null, '1', '1', '0');
INSERT INTO `table_messages` VALUES ('48', '57', '33', '13434', '2017-09-25 07:14:05', '3322332332', '2017-09-25 07:19:06', '1', '2', '0');

-- ----------------------------
-- Table structure for table_requirements
-- ----------------------------
DROP TABLE IF EXISTS `table_requirements`;
CREATE TABLE `table_requirements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(10) unsigned NOT NULL COMMENT '用户或者  平台发布   1 表示用户  2  表示平台（后台手动添加的账户）',
  `industry_id` int(10) unsigned DEFAULT NULL COMMENT '行业',
  `species_id` int(10) unsigned DEFAULT NULL COMMENT '种类',
  `title` varchar(200) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `created` datetime DEFAULT NULL COMMENT '时间',
  `clicks` int(10) unsigned DEFAULT NULL COMMENT '点击数',
  `user_id` varchar(50) DEFAULT NULL COMMENT '创建者',
  `messages` int(10) unsigned DEFAULT NULL COMMENT '留言数',
  `updated` datetime DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(3) unsigned DEFAULT '1' COMMENT '状态 1 待审核  2 已审核',
  `deleted` tinyint(3) unsigned DEFAULT NULL COMMENT '删除标记  0  为删除 1 删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of table_requirements
-- ----------------------------
INSERT INTO `table_requirements` VALUES ('1', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '1');
INSERT INTO `table_requirements` VALUES ('2', '2', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '223', '28', '34', '2017-09-20 09:18:55', '2', '1');
INSERT INTO `table_requirements` VALUES ('3', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('4', '2', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('5', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('6', '2', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('7', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('8', '2', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('9', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('10', '2', '3', '6', '杀人啊啊', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '34', '2017-09-20 08:01:40', '2', '0');
INSERT INTO `table_requirements` VALUES ('11', '1', '3', '6', '杀人啊啊', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('12', '2', '3', '6', '杀人啊啊', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '1');
INSERT INTO `table_requirements` VALUES ('13', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('14', '1', '3', '6', '杀人啊啊', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('15', '12', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('16', '1', '3', '6', '杀人啊啊', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('17', '2', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('18', '1', '3', '6', '杀人啊啊', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('19', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('20', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('21', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('22', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('23', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('24', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('25', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('26', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '2', '0');
INSERT INTO `table_requirements` VALUES ('27', '1', '3', '6', 'qwerqewr', 'bcbfssdfgdfsgf', '2017-09-14 15:33:49', '222', '28', '33', '2017-09-14 15:34:14', '1', '0');
INSERT INTO `table_requirements` VALUES ('28', '2', '8', '5', '13421', '12424', '2017-09-22 01:41:11', '0', null, '0', '2017-09-22 01:41:11', '2', '0');
INSERT INTO `table_requirements` VALUES ('29', '2', '3', '5', '124', '124', '2017-09-22 01:41:43', '0', null, '0', '2017-09-22 01:41:43', '2', '0');
INSERT INTO `table_requirements` VALUES ('30', '2', '8', '5', '21341', '1241', '2017-09-22 01:50:55', '0', '53', '0', '2017-09-22 01:50:55', '2', '0');
INSERT INTO `table_requirements` VALUES ('31', '2', '8', '5', 'qwerew', 'qwerew', '2017-09-22 01:51:25', '0', '52', '0', '2017-09-22 01:51:25', '2', '0');
INSERT INTO `table_requirements` VALUES ('32', '2', '8', '4', '23534', '35234524', '2017-09-22 03:14:23', '0', '54', '0', '2017-09-22 03:14:23', '2', '0');
INSERT INTO `table_requirements` VALUES ('33', '1', '2', '5', '12434sfasdfdsafadsfsd', 'SADDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD', '2017-09-25 06:59:13', '5', '57', '1', '2017-09-25 07:14:05', '1', '0');

-- ----------------------------
-- Table structure for table_users
-- ----------------------------
DROP TABLE IF EXISTS `table_users`;
CREATE TABLE `table_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(200) DEFAULT NULL COMMENT 'openid微信',
  `avatar` varchar(200) DEFAULT NULL COMMENT '头像',
  `nickname` varchar(60) DEFAULT NULL COMMENT '昵称',
  `position` varchar(50) DEFAULT NULL COMMENT '职位',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号',
  `status` tinyint(3) unsigned DEFAULT NULL COMMENT '状态  1 已注册  0未注册',
  `company_name` varchar(100) DEFAULT NULL COMMENT '公司名字',
  `industry_id` int(10) unsigned DEFAULT NULL COMMENT '行业 id',
  `company_classify` varchar(20) DEFAULT NULL COMMENT '分类',
  `product_info` varchar(50) DEFAULT NULL COMMENT '公司主营业务或产品',
  `public` tinyint(3) unsigned DEFAULT '0' COMMENT '是否公开联系方式 0 否 1  公开  默认 0 ',
  `type` tinyint(3) unsigned DEFAULT NULL COMMENT '用户注册类型  1  前台注册  2 后台模拟',
  `checks` tinyint(3) unsigned DEFAULT NULL COMMENT '剩余查看  用户数量',
  `messages` tinyint(3) unsigned DEFAULT NULL COMMENT '剩余留言次数',
  `deleted` tinyint(3) unsigned DEFAULT NULL COMMENT '删除标记  0  为删除 1 删除',
  `updated` datetime DEFAULT NULL COMMENT '更新时间',
  `created` datetime DEFAULT NULL COMMENT ' 注册时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  UNIQUE KEY `openid` (`openid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of table_users
-- ----------------------------
INSERT INTO `table_users` VALUES ('1', '1', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '2', '12423', '124', '1', '1', '1', '8', '1', '2017-09-20 08:01:40', null);
INSERT INTO `table_users` VALUES ('2', '2', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '3', '12423', '124', '0', '2', '0', '9', '1', '2017-09-25 06:14:25', '2017-09-20 17:36:41');
INSERT INTO `table_users` VALUES ('3', '3', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '4', '12423', '124', '1', '1', '1', '1', '1', '0000-00-00 00:00:00', '2017-09-20 17:36:28');
INSERT INTO `table_users` VALUES ('4', '4', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '5', '12423', '124', '0', '2', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('5', '5', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '6', '12423', '124', '1', '2', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('6', '6', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '7', '12423', '124', '0', '1', '1', '0', '0', '2017-09-20 03:59:15', '2017-09-20 17:36:35');
INSERT INTO `table_users` VALUES ('7', '7', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '1', '12423', '124', '1', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('8', '8', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '0', '43124', '2', '12423', '124', '1', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('9', '9', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '3', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('10', '10', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '4', '12423', '124', '1', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('11', '11', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('12', '12', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('13', '13', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('14', '14', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('15', '15', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('16', '16', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('17', '17', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('18', '18', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('19', '19', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('20', '20', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('21', '21', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('22', '22', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('23', '23', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('24', '24', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('25', '25', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('26', '26', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('27', '27', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('28', '28', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '肖大爷', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('29', '29', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('30', '30', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('31', '31', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('32', '32', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '1', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('33', '33', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('34', '34', 'https://ss0.baidu.com/73F1bjeh1BF3odCf/it/u=61955112,4113279104&fm=85&s=5AAC3C626173FC2A5B44DDC30200A0B1', '124', '124', '314', '134', '43124', '124', '12423', '124', '0', '1', '1', '1', '0', '0000-00-00 00:00:00', null);
INSERT INTO `table_users` VALUES ('35', null, '/storage/app/images/mzSsAw5KTEQ8QTJb0BH9w7YuM9bz3f8b2fwQwB6e.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', '2017-09-19 14:09:17', null);
INSERT INTO `table_users` VALUES ('36', null, '/storage/app/images/Q0W9ZokEuJxasDikiglBkzAASdgREn88k5hKB3Ql.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', '2017-09-14 14:09:20', null);
INSERT INTO `table_users` VALUES ('37', null, '/storage/app/images/J03uRP4ZF7x4bVpJighs3FmuBLpbtIJVTseTnWrv.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', null, null);
INSERT INTO `table_users` VALUES ('38', null, '/storage/app/images/xLF7zsoz5PJYqGEMi3uB2JrUmK8doHY60KyJNdIC.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', null, null);
INSERT INTO `table_users` VALUES ('39', null, '/storage/app/images/8Mh2j8715iENTxx0XGyNRWmR81Ie7JBhQRw2C0Et.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', null, null);
INSERT INTO `table_users` VALUES ('40', null, '/storage/app/images/WaBJAfF9EylHYDfWscUB7OwKX3O77czuE1gVqMMd.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', null, null);
INSERT INTO `table_users` VALUES ('41', null, '/storage/app/images/LOCymOd28NwBhC93BvRh36KbvvOBiweoAfZJ7pLD.jpeg', '14', '1324', '1234', '1', '134', '1', '1432', '124', '1', '2', null, null, '0', null, null);
INSERT INTO `table_users` VALUES ('42', null, '/storage/app/images/bC5HLmcj395XeK6COJ8AhkEbu4jZiBl2S3i3bZ9Y.png', 'asdf', 'asdf', 'asdf', '1', 'asdf', '1', 'asdf', 'asdfdf', '1', '2', null, null, '0', null, null);
INSERT INTO `table_users` VALUES ('43', '43', '/storage/app/images/EbAsovpfGdLGjUqfuoZElzbmilQPMNXcgojSBF6K.gif', '测试', '总经理', '18482100575', '1', '天降', '3', '你说呢', '杀人', '1', '2', null, '9', '0', '2017-09-20 03:25:22', null);
INSERT INTO `table_users` VALUES ('44', 'qazwsxedc', null, null, null, null, null, null, null, null, null, '0', null, null, null, null, '2014-08-16 00:00:00', null);
INSERT INTO `table_users` VALUES ('45', '1505902955', '/storage/app/images/xwmT6FENLT2yOImgbVLwzjaBITlt18bHHzo8077u.jpeg', 'qwer', 'qwer', 'qwer', '1', 'qwer', null, 'qwer', 'qwer', '1', '2', null, null, '0', null, '2017-09-20 10:22:35');
INSERT INTO `table_users` VALUES ('46', '1505974167', '/storage/app/public/2017-09-21-06-09-27-59c357979a7f0.png', '113', '124', '124', '1', '134', '3', '134', '234', '1', '2', null, null, '0', null, '2017-09-21 06:09:27');
INSERT INTO `table_users` VALUES ('47', '1505974204', '/storage/app/public/2017-09-21-06-10-04-59c357bca8ee0.jpg', '113', '214', '124', '1', '124', '8', '123', '1234', '1', '2', null, null, '0', null, '2017-09-21 06:10:04');
INSERT INTO `table_users` VALUES ('48', '1505974242', '/weichatapp/storage/app/public/2017-09-21-06-10-42-59c357e2c2da3.png', 'qwerq', 'qewr', 'qwer', '1', 'qwer', '8', 'qwer', 'qwe', '1', '2', null, null, '0', null, '2017-09-21 06:10:42');
INSERT INTO `table_users` VALUES ('49', '1505974266', '/weichatapp/storage/app/public/2017-09-21-06-11-06-59c357fa9dd4f.jpg', '1243', '1324134', '1234', '1', '124', '8', '124', '124', '1', '2', null, null, '0', null, '2017-09-21 06:11:06');
INSERT INTO `table_users` VALUES ('50', '1505974313', '/storage/app/public/2017-09-21-06-11-53-59c358294bf6c.jpg', '231', '124124', '123', '1', '1234', '8', '1234', '1234', '1', '2', null, null, '0', null, '2017-09-21 06:11:53');
INSERT INTO `table_users` VALUES ('51', '1505974357', '/weichatapp/storage/app/public/2017-09-21-06-12-37-59c3585591eb1.jpg', '124', '124', '124', '1', '14', '8', '124', '14', '1', '2', null, null, '0', null, '2017-09-21 06:12:37');
INSERT INTO `table_users` VALUES ('52', '1506044163', 'http://localhost/weichatapp/public/uploads/2017-09-22-01-36-03-59c46903e873f.jpg', '124', '1', '123', '1', '124', '8', '1234', '241', '0', '2', null, null, '0', null, '2017-09-22 01:36:03');
INSERT INTO `table_users` VALUES ('53', '1506044181', 'http://localhost/weichatapp/public/uploads/2017-09-22-01-36-21-59c4691552785.png', '23542', '34525', '23542', '1', '2352', '3', '2345', '2352', '0', '2', null, null, '0', null, '2017-09-22 01:36:21');
INSERT INTO `table_users` VALUES ('54', '1506050042', 'http://localhost/uploads/2017-09-22-03-14-02-59c47ffa25b9d.png', '1241', '2341', '17748499189', '1', '14', '9', '14', '14', '0', '2', null, null, '0', null, '2017-09-22 03:14:02');
INSERT INTO `table_users` VALUES ('55', 'qazwsx123456', null, null, null, null, '0', null, null, null, null, '0', '1', null, null, '0', '2017-09-25 06:08:01', '2017-09-25 06:08:01');
INSERT INTO `table_users` VALUES ('56', 'sdfgfsdgsdfgsfdfg', null, null, null, null, '0', null, null, null, null, '0', '1', null, null, '0', '2017-09-25 06:11:39', '2017-09-25 06:11:39');
INSERT INTO `table_users` VALUES ('57', 'asdfasdfasfdsafasfasd', null, null, '3425234', '18482100575', '1', null, null, null, null, '0', '1', '4', '9', '0', '2017-09-25 07:14:05', '2017-09-25 06:29:45');
