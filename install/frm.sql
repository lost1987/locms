/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : locms

 Target Server Type    : MySQL
 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 01/05/2013 22:19:52 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `lo_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lo_admin`;
CREATE TABLE `lo_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(32) NOT NULL,
  `passwd` varchar(32) NOT NULL,
  `truename` varchar(32) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


-- ----------------------------
-- Table structure for `arctype`
-- ----------------------------
DROP TABLE IF EXISTS `lo_arctype`;
CREATE TABLE `lo_arctype` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `reid` smallint(6) NOT NULL DEFAULT '0',
  `typename` varchar(30) NOT NULL DEFAULT '',
  `typedir` varchar(100) NOT NULL DEFAULT '',
  `templist` varchar(60) NOT NULL DEFAULT '',
  `temparticle` varchar(60) NOT NULL DEFAULT '',
  `description` varchar(200) NOT NULL DEFAULT '',
  `keywords` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `reid` (`reid`),
  KEY `typename` (`typename`),
  KEY `typedir` (`typedir`),
  KEY `keywords` (`keywords`),
  KEY `temparticle` (`temparticle`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `lo_article`;
CREATE TABLE `lo_article` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `typeid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `flag` varchar(30) NOT NULL DEFAULT '',
  `click` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` char(60) NOT NULL DEFAULT '',
  `shorttitle` varchar(500) NOT NULL DEFAULT '',
  `color` char(7) NOT NULL DEFAULT '',
  `writer` char(20) NOT NULL DEFAULT '',
  `source` char(30) NOT NULL DEFAULT '',
  `litpic` varchar(80) NOT NULL DEFAULT '',
  `pubdate` int(10) unsigned NOT NULL DEFAULT '0',
  `keywords` char(100) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `postnum` int(11) NOT NULL DEFAULT '0',
  `mclick` int(11) NOT NULL DEFAULT '0',
  `wclick` int(11) NOT NULL DEFAULT '0',
  `tag` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `publisher` varchar(32) NOT NULL,
  `publisher_id` int(11),
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  KEY `mainindex` (`typeid`,`flag`),
  KEY `click` (`click`),
  KEY `pubdate` (`pubdate`),
  KEY `typeid` (`typeid`),
  KEY `title` (`title`),
  KEY `shorttitle` (`shorttitle`),
  KEY `keywords` (`keywords`),
  KEY `postnum` (`postnum`),
  KEY `mclick` (`mclick`),
  KEY `wclick` (`wclick`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `lo_articlebody`
-- ----------------------------
DROP TABLE IF EXISTS `lo_articlebody`;
CREATE TABLE `lo_articlebody` (
  `aid` int(11) NOT NULL DEFAULT '0',
  `body` mediumtext NOT NULL,
  PRIMARY KEY (`aid`),
  UNIQUE KEY `aid` (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `lo_tag`
-- ----------------------------
DROP TABLE IF EXISTS `lo_tag`;
CREATE TABLE `lo_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tagname` varchar(30) NOT NULL DEFAULT '',
  `normbody` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagname` (`tagname`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for `lo_zt`
-- ----------------------------
DROP TABLE IF EXISTS `lo_zt`;
CREATE TABLE `lo_zt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aids` varchar(200) NOT NULL,
  `pubdate` int(11) DEFAULT NULL,
  `ztname` varchar(50) NOT NULL,
  `desp` varchar(1000) DEFAULT NULL,
  `litpic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

