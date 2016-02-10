-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `user_token`;
CREATE TABLE `user_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `expire_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_token` (`id`, `token`, `user_id`, `create_time`, `expire_time`) VALUES
(14,	'ar9DfZZhN9eL1PbETj1YnmKsSgPaefMye8J5YPTfriHgrLmIL7hSGoy8O5w2IKQY',	1,	1455114361,	1455719161);

-- 2016-02-10 15:38:15
