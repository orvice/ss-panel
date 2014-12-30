-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ss_node`;
CREATE TABLE `ss_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_name` varchar(128) NOT NULL,
  `node_type` int(3) NOT NULL,
  `node_server` varchar(128) NOT NULL,
  `node_info` varchar(128) NOT NULL,
  `node_status` varchar(128) NOT NULL,
  `node_order` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ss_node` (`id`, `node_name`, `node_type`, `node_server`, `node_info`, `node_status`, `node_order`) VALUES
(1,	'美国1号',	0,	'node.cattt.com',	'节点描述',	'可用',	0);

-- 2014-12-29 15:21:43
