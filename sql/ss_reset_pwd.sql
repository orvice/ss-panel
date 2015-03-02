-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ss_reset_pwd`;
CREATE TABLE `ss_reset_pwd` (
  `id` int(11) NOT NULL,
  `init_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `uni_char` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `ss_reset_pwd`
MODIFY `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT;

INSERT INTO `ss_reset_pwd` (`id`, `init_time`, `expire_time`, `user_id`, `uni_char`) VALUES
(0,	1424448190,	1424534590,	1,	'2MzU5ODFkYzM4MmVkZTM2ZTdjNGNhNDI');

-- 2015-02-22 09:55:41
