-- Server version: 4.0.18
-- PHP Version: 4.3.10RC1
-- 
-- Database: `bank`
-- 

DROP DATABASE IF EXISTS `bank`;
CREATE DATABASE `bank`;

USE `bank`;

-- --------------------------------------------------------

-- 
-- Table structure for table `acct_no`
-- 

CREATE TABLE `acct_no` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `used` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `acct` (`acct`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `acct_no`
-- 

INSERT INTO `acct_no` VALUES (1, '000-111-1212', 'no');
INSERT INTO `acct_no` VALUES (2, '000-222-1212', 'no');
INSERT INTO `acct_no` VALUES (3, '000-333-1212', 'no');
INSERT INTO `acct_no` VALUES (4, '000-444-1212', 'no');
INSERT INTO `acct_no` VALUES (5, '000-555-1212', 'no');

-- --------------------------------------------------------

-- 
-- Table structure for table `event`
-- 

CREATE TABLE `event` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `depo` int(15) NOT NULL default '0',
  `event` varchar(20) NOT NULL default '',
  `time` varchar(30) NOT NULL default '',
  `day` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=20 ;

-- 
-- Dumping data for table `event`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `card` varchar(30) NOT NULL default '',
  `name` varchar(30) NOT NULL default '',
  `pword` varchar(80) NOT NULL default '',
  `role` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `acct` (`acct`),
  UNIQUE KEY `card` (`card`)
) TYPE=MyISAM AUTO_INCREMENT=14 ;

-- 
-- Dumping data for table `login`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `myacct`
-- 

CREATE TABLE `myacct` (
  `id` int(4) NOT NULL auto_increment,
  `acct` varchar(20) NOT NULL default '',
  `card` varchar(30) NOT NULL default '',
  `name` varchar(30) NOT NULL default '',
  `depo` int(15) NOT NULL default '0',
  `day` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `acct` (`acct`),
  UNIQUE KEY `card` (`card`)
) TYPE=MyISAM AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `myacct`
-- 
