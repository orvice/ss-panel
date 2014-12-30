-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ss_admin`;
CREATE TABLE `ss_admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ss_admin` (`uid`, `admin_name`, `email`, `pass`) VALUES
(1,	'admin',	'admin@gmail.com',	'25d55ad283aa400af464c76d713c07ad');

-- 2014-12-29 15:34:18
