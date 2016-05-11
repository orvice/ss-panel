/*
Navicat MySQL Data Transfer

Source Server         : 本地服务器
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : vpn

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-05-11 10:18:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sp_config
-- ----------------------------
DROP TABLE IF EXISTS `sp_config`;
CREATE TABLE `sp_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(128) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_config
-- ----------------------------
INSERT INTO `sp_config` VALUES ('1', 'analytics-code', '', '2016-05-10 13:28:55', '0000-00-00 00:00:00');
INSERT INTO `sp_config` VALUES ('2', 'home-code', '', '2016-05-10 13:28:55', '0000-00-00 00:00:00');
INSERT INTO `sp_config` VALUES ('3', 'app-name', '墙外的世界', '2016-05-10 13:28:55', '0000-00-00 00:00:00');
INSERT INTO `sp_config` VALUES ('4', 'user-index', '', '2016-05-10 13:28:55', '0000-00-00 00:00:00');
INSERT INTO `sp_config` VALUES ('5', 'user-node', '', '2016-05-10 13:28:55', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for sp_email_verify
-- ----------------------------
DROP TABLE IF EXISTS `sp_email_verify`;
CREATE TABLE `sp_email_verify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expire_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_email_verify
-- ----------------------------

-- ----------------------------
-- Table structure for sp_log
-- ----------------------------
DROP TABLE IF EXISTS `sp_log`;
CREATE TABLE `sp_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(16) NOT NULL,
  `msg` text NOT NULL,
  `created_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sp_log
-- ----------------------------

-- ----------------------------
-- Table structure for ss_checkin_log
-- ----------------------------
DROP TABLE IF EXISTS `ss_checkin_log`;
CREATE TABLE `ss_checkin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `checkin_at` int(11) NOT NULL,
  `traffic` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ss_checkin_log
-- ----------------------------

-- ----------------------------
-- Table structure for ss_chg_code
-- ----------------------------
DROP TABLE IF EXISTS `ss_chg_code`;
CREATE TABLE `ss_chg_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(128) NOT NULL,
  `time` int(11) NOT NULL,
  `traffic` bigint(20) NOT NULL,
  `tag` varchar(64) NOT NULL,
  `add_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `use_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ss_chg_code
-- ----------------------------

-- ----------------------------
-- Table structure for ss_invite_code
-- ----------------------------
DROP TABLE IF EXISTS `ss_invite_code`;
CREATE TABLE `ss_invite_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '2015-11-01 08:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ss_invite_code
-- ----------------------------

-- ----------------------------
-- Table structure for ss_node
-- ----------------------------
DROP TABLE IF EXISTS `ss_node`;
CREATE TABLE `ss_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `type` int(3) NOT NULL,
  `server` varchar(128) NOT NULL,
  `method` varchar(64) NOT NULL,
  `custom_method` tinyint(1) NOT NULL DEFAULT '0',
  `traffic_rate` float NOT NULL DEFAULT '1',
  `info` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL,
  `offset` int(11) NOT NULL DEFAULT '0',
  `sort` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ss_node
-- ----------------------------

-- ----------------------------
-- Table structure for ss_node_info_log
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_info_log`;
CREATE TABLE `ss_node_info_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL,
  `uptime` float NOT NULL,
  `load` varchar(32) NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ss_node_info_log
-- ----------------------------

-- ----------------------------
-- Table structure for ss_node_online_log
-- ----------------------------
DROP TABLE IF EXISTS `ss_node_online_log`;
CREATE TABLE `ss_node_online_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) NOT NULL,
  `online_user` int(11) NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ss_node_online_log
-- ----------------------------

-- ----------------------------
-- Table structure for ss_package
-- ----------------------------
DROP TABLE IF EXISTS `ss_package`;
CREATE TABLE `ss_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `money` varchar(128) DEFAULT NULL,
  `flow` varchar(128) DEFAULT NULL,
  `desc` text,
  `money_type` enum('RMB','USD') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ss_package
-- ----------------------------
INSERT INTO `ss_package` VALUES ('1', '流量套餐A', '2.98', '20', '已使用锐速黑科技加速,可享1080P高清视频观看', 'USD');

-- ----------------------------
-- Table structure for ss_password_reset
-- ----------------------------
DROP TABLE IF EXISTS `ss_password_reset`;
CREATE TABLE `ss_password_reset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) NOT NULL,
  `token` varchar(128) NOT NULL,
  `init_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ss_password_reset
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `passwd` varchar(16) NOT NULL,
  `t` int(11) NOT NULL DEFAULT '0',
  `u` bigint(20) NOT NULL,
  `d` bigint(20) NOT NULL,
  `transfer_enable` bigint(20) NOT NULL,
  `port` int(11) NOT NULL,
  `switch` tinyint(4) NOT NULL DEFAULT '1',
  `enable` tinyint(4) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `last_get_gift_time` int(11) NOT NULL DEFAULT '0',
  `last_check_in_time` int(11) NOT NULL DEFAULT '0',
  `last_rest_pass_time` int(11) NOT NULL DEFAULT '0',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invite_num` int(8) NOT NULL DEFAULT '0',
  `is_admin` int(2) NOT NULL DEFAULT '0',
  `ref_by` int(11) NOT NULL DEFAULT '0',
  `expire_time` int(11) NOT NULL DEFAULT '0',
  `method` varchar(64) NOT NULL DEFAULT 'rc4-md5',
  `is_email_verify` tinyint(4) NOT NULL DEFAULT '0',
  `reg_ip` varchar(128) NOT NULL DEFAULT '127.0.0.1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `port` (`port`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'admin', 'backtrack843@163.com', '4414a0c9e9f39fd5f196299acbc7a4df62ea3e99a67550cb920f1acfd2f3d40e', '9B3np5', '1462855200', '0', '8951484', '2251292672', '21568', '1', '1', '1', '0', '1462810171', '0', '2016-05-09 15:50:18', '0', '1', '0', '0', 'rc4-md5', '0', '127.0.0.1');

-- ----------------------------
-- Table structure for user_token
-- ----------------------------
DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_token
-- ----------------------------

-- ----------------------------
-- Table structure for user_traffic_log
-- ----------------------------
DROP TABLE IF EXISTS `user_traffic_log`;
CREATE TABLE `user_traffic_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  `node_id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `traffic` varchar(32) NOT NULL,
  `log_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_traffic_log
-- ----------------------------
