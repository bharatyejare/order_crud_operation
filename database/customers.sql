-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_mobile` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2021-08-04 10:59:37