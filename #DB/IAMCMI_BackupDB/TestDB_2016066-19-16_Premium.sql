# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: TestDB
# Generation Time: 2016-06-19 03:50:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Premium
# ------------------------------------------------------------

CREATE TABLE `Premium` (
  `PREM_ID_PK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `PREM_StdNet` double DEFAULT NULL COMMENT 'เบี้ยประกันภัย',
  `PREM_StdVat` double DEFAULT NULL COMMENT 'อากรสแตมป์',
  `PREM_StdStampDuty` double DEFAULT NULL COMMENT 'อากรสแตมป์',
  `PREM_StdTotal` double DEFAULT NULL COMMENT 'เบี้ยรวม',
  `PREM_PercentVat` int(11) DEFAULT '7',
  `PREM_PerDiscount` double DEFAULT NULL COMMENT 'ส่วนลด',
  `PREM_DiscountFlag` char(1) DEFAULT NULL COMMENT 'ส่วนลด',
  `PREM_Discount` double DEFAULT NULL COMMENT 'ส่วนลด',
  `PREM_Net` double DEFAULT NULL COMMENT 'เบี้ยสุทธิ',
  `PREM_StampDuty` double DEFAULT NULL COMMENT 'อากรสแตมป์',
  `PREM_Vat` double DEFAULT NULL COMMENT 'ภาษีมูลค่าเพิ่ม',
  `PREM_Total` double DEFAULT NULL COMMENT 'เบี้ยรวม',
  `PREM_QuoNumRef` varchar(50) DEFAULT NULL,
  `PREM_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `PREM_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`PREM_ID_PK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
