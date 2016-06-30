# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: TestDB
# Generation Time: 2016-06-30 07:31:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Account`;

CREATE TABLE `Account` (
  `ACC_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `ACC_Role` varchar(50) DEFAULT NULL,
  `PER_ID_FK` int(11) DEFAULT NULL,
  `ACC_User` varchar(50) DEFAULT NULL,
  `ACC_Pass` varchar(50) DEFAULT NULL,
  `ACC_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ACC_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`ACC_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table Address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Address`;

CREATE TABLE `Address` (
  `ADDR_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `ADDR_Line1` varchar(100) DEFAULT NULL,
  `ADDR_Line2` varchar(100) DEFAULT NULL,
  `ADDR_SubDist` varchar(50) DEFAULT NULL,
  `ADDR_Dist` varchar(50) DEFAULT NULL,
  `ADDR_Prov` varchar(50) DEFAULT NULL,
  `ADDR_ZipCode` varchar(50) DEFAULT NULL,
  `ADDR_Geo` varchar(50) DEFAULT NULL,
  `ADDR_Email` varchar(50) DEFAULT NULL,
  `ADDR_ContType1` varchar(50) DEFAULT NULL,
  `ADDR_ContNum1` varchar(50) DEFAULT NULL,
  `ADDR_ContType2` varchar(50) DEFAULT NULL,
  `ADDR_ContNum2` varchar(50) DEFAULT NULL,
  `ADDR_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ADDR_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`ADDR_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table AddressContType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AddressContType`;

CREATE TABLE `AddressContType` (
  `ADDR_ContType_ID_PK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ADDR_ContTypeName_TH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_ContTypeName_EN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDR_ContType_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ADDR_ContType_UpdatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`ADDR_ContType_ID_PK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table buddhism_geo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `buddhism_geo`;

CREATE TABLE `buddhism_geo` (
  `bgeo_id` int(11) NOT NULL AUTO_INCREMENT,
  `bgeo_name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`bgeo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table districts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `DISTRICT_ID` int(5) NOT NULL AUTO_INCREMENT,
  `DISTRICT_CODE` varchar(4) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DISTRICT_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DISTRICT_NAME_ENG` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `GEO_ID` int(5) NOT NULL DEFAULT '0',
  `PROVINCE_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`DISTRICT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table geography
# ------------------------------------------------------------

DROP TABLE IF EXISTS `geography`;

CREATE TABLE `geography` (
  `GEO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `GEO_NAME` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`GEO_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';



# Dump of table Personal
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Personal`;

CREATE TABLE `Personal` (
  `PER_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `PER_Salu` varchar(50) DEFAULT NULL,
  `PER_FName` varchar(50) DEFAULT NULL,
  `PER_MName` varchar(50) DEFAULT NULL,
  `PER_LName` varchar(50) DEFAULT NULL,
  `PER_DOB` date DEFAULT NULL,
  `PER_CardType` varchar(50) DEFAULT NULL,
  `PER_CardNo` varchar(50) DEFAULT NULL,
  `PER_ExpDate` date DEFAULT NULL,
  `PER_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `PER_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`PER_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table PersonalCardType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PersonalCardType`;

CREATE TABLE `PersonalCardType` (
  `PER_CardType_ID_PK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `PER_CardType_Name_TH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PER_CardType_Name_EN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PER_CardType_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `PER_CardType_UpdatedBy` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`PER_CardType_ID_PK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table PersonalSaluType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PersonalSaluType`;

CREATE TABLE `PersonalSaluType` (
  `PER_Salu_ID_PK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `PER_Salu_TH` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `PER_Salu_EN` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `PER_Salu_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `PER_Salu_UpdatedBy` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`PER_Salu_ID_PK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table Policy
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Policy`;

CREATE TABLE `Policy` (
  `POL_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `POL_MasPolNum` varchar(50) DEFAULT NULL,
  `POL_QuoNum` varchar(11) DEFAULT NULL,
  `POL_Num` varchar(11) DEFAULT NULL,
  `POL_Cat` varchar(50) DEFAULT NULL,
  `POL_ReFlag` varchar(50) DEFAULT NULL,
  `POL_Status_ID_FK` int(11) DEFAULT NULL COMMENT 'TPK_PolicyStatus[POL_Status_ID_PK]',
  `POL_EffDate` datetime DEFAULT NULL,
  `POL_ExpDate` datetime DEFAULT NULL,
  `POL_QuoCreateDate` datetime DEFAULT NULL COMMENT 'create&save',
  `POL_QuoDate` datetime DEFAULT NULL COMMENT 'submit',
  `POL_ProDate` datetime DEFAULT NULL,
  `POL_AppReceivedDate` datetime DEFAULT NULL,
  `POL_IssueDate` datetime DEFAULT NULL,
  `POL_IssueBy` varchar(50) DEFAULT NULL,
  `POL_AgentCode` varchar(50) DEFAULT NULL,
  `POL_PROD_ID_FK` int(11) DEFAULT NULL COMMENT 'TPK_Product[PROD_ID_PK]',
  `POL_PREM_ID_FK` int(11) DEFAULT NULL,
  `POL_CUS_ID_FK_PHD` int(11) DEFAULT NULL COMMENT 'PolicyHolder',
  `POL_CUS_Addr_ID_PHD` int(11) DEFAULT NULL COMMENT 'TPK_Address[PolicyHolder''s address ID]',
  `POL_CUS_ID_FK_INS` int(11) DEFAULT NULL COMMENT 'Insured Person',
  `POL_CUS_Addr_ID_INS` int(11) DEFAULT NULL,
  `POL_VEH_ID_FK` int(11) DEFAULT NULL,
  `POL_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `POL_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`POL_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table PolicyLog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PolicyLog`;

CREATE TABLE `PolicyLog` (
  `POL_LOG_ID_FK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `POL_LOG_Tran_ID_FK` int(11) DEFAULT NULL,
  `POL_LOG_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `POL_LOG_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`POL_LOG_ID_FK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table PolicyStatus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `PolicyStatus`;

CREATE TABLE `PolicyStatus` (
  `POL_Status_ID_PK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `POL_StatusName_EN` varchar(50) DEFAULT NULL,
  `POL_StatusName_TH` varchar(50) DEFAULT NULL,
  `POL_StatusDesc` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `POL_Status_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `POL_Status_UpdatedBy` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`POL_Status_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table Premium
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Premium`;

CREATE TABLE `Premium` (
  `PREM_ID_PK` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `PREM_StdNet` double DEFAULT NULL COMMENT 'เบี้ยสุทธิ',
  `PREM_StdVat` double DEFAULT NULL COMMENT 'ภาษีมูลค่าเพิ่ม',
  `PREM_StdStampDuty` double DEFAULT NULL COMMENT 'อากรสแตมป์',
  `PREM_StdTotal` double DEFAULT NULL COMMENT 'เบี้ยรวม',
  `PREM_PercentVat` int(11) DEFAULT '7' COMMENT '% อากร',
  `PREM_PerDiscount` double DEFAULT NULL COMMENT '% ส่วนลด',
  `PREM_DiscountFlag` char(1) DEFAULT NULL COMMENT 'ลด? [Y/N]',
  `PREM_Discount` double DEFAULT NULL COMMENT 'ส่วนลด',
  `PREM_Net` double DEFAULT NULL COMMENT 'เบี้ยสุทธิ (หลักคำนวณส่วนลด)',
  `PREM_StampDuty` double DEFAULT NULL COMMENT 'อากรสแตมป์ (หลักคำนวณส่วนลด)',
  `PREM_Vat` double DEFAULT NULL COMMENT 'ภาษีมูลค่าเพิ่ม (หลักคำนวณส่วนลด)',
  `PREM_Total` double DEFAULT NULL COMMENT 'เบี้ยรวม (หลักคำนวณส่วนลด)',
  `PREM_QuoNumRef` varchar(50) DEFAULT NULL COMMENT 'TPK_Policy[POL_QuoNum]',
  `PREM_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `PREM_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin',
  PRIMARY KEY (`PREM_ID_PK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;



# Dump of table Product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product` (
  `PROD_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `PROD_Code` varchar(50) DEFAULT NULL,
  `PROD_Name_EN` varchar(50) DEFAULT NULL,
  `PROD_Name_TH` varchar(50) DEFAULT NULL,
  `PROD_CoverType` varchar(50) DEFAULT NULL,
  `PROD_Limit` varchar(50) DEFAULT NULL,
  `PROD_Desc` varchar(100) DEFAULT NULL,
  `POL_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `POL_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`PROD_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table provinces
# ------------------------------------------------------------

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `PROVINCE_ID` int(5) NOT NULL AUTO_INCREMENT,
  `PROVINCE_CODE` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCE_NAME_ENG` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GEO_ID` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`PROVINCE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table Redbook
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Redbook`;

CREATE TABLE `Redbook` (
  `RED_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `RED_Key` varchar(50) DEFAULT NULL,
  `RED_Make` varchar(50) DEFAULT NULL COMMENT 'ชื่อรถ',
  `RED_Model` varchar(100) DEFAULT NULL COMMENT 'รุ่นรถ',
  `RED_Year` varchar(4) DEFAULT NULL COMMENT 'ปี',
  `RED_Desc` varchar(100) DEFAULT NULL COMMENT 'ประเภท',
  `RED_AvgWholesale` double DEFAULT NULL,
  `RED_AvgRetail` double DEFAULT NULL,
  `RED_GoodWholesale` double DEFAULT NULL,
  `RED_GoodRetail` double DEFAULT NULL,
  `RED_NewPrice` double DEFAULT NULL,
  `RED_Group` char(1) DEFAULT NULL,
  `RED_Type` char(1) DEFAULT NULL,
  `RED_JanpaneseCar` char(1) DEFAULT NULL,
  `RED_ECO` char(1) DEFAULT NULL,
  `RED_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `RED_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`RED_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table subdistricts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subdistricts`;

CREATE TABLE `subdistricts` (
  `SUBDISTRICT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBDISTRICT_CODE` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `SUBDISTRICT_NAME` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '',
  `SUBDISTRICT_NAME_ENG` varchar(150) COLLATE utf8_bin NOT NULL DEFAULT '',
  `DISTRICT_ID` int(11) NOT NULL DEFAULT '0',
  `PROVINCE_ID` int(11) NOT NULL DEFAULT '0',
  `GEO_ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`SUBDISTRICT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';



# Dump of table Tariff
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tariff`;

CREATE TABLE `Tariff` (
  `TAR_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `TAR_VehCode_PK` varchar(50) NOT NULL DEFAULT '',
  `TAR_BodyName_EN` varchar(50) DEFAULT NULL,
  `TAR_BodyName_TH` varchar(50) DEFAULT NULL COMMENT 'แบบตัวถัง',
  `TAR_SubBodyName_EN` varchar(50) DEFAULT NULL,
  `TAR_SubBodyName_TH` varchar(50) DEFAULT NULL,
  `TAR_UsageName_EN` varchar(50) DEFAULT NULL,
  `TAR_UsageName_TH` varchar(50) DEFAULT NULL,
  `TAR_CC_Min` varchar(50) DEFAULT NULL,
  `TAR_CC_Max` varchar(50) DEFAULT NULL,
  `TAR_Seat_Min` varchar(50) DEFAULT NULL,
  `TAR_Seat_Max` varchar(50) DEFAULT NULL,
  `TAR_Ton_Min` varchar(50) DEFAULT NULL,
  `TAR_Ton_Max` varchar(50) DEFAULT NULL,
  `TAR_Prem` double DEFAULT NULL,
  `TAR_StampDuty` double DEFAULT NULL,
  `TAR_Vat` double DEFAULT NULL,
  `TAR_TotalPrem` double DEFAULT NULL,
  `TAR_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `TAR_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`TAR_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table Tariff_Old
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tariff_Old`;

CREATE TABLE `Tariff_Old` (
  `TAR_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `TAR_VehCode_PK` varchar(50) NOT NULL DEFAULT '',
  `TAR_PowerName_EN` varchar(50) DEFAULT NULL,
  `TAR_PowerName_TH` varchar(50) DEFAULT NULL,
  `TAR_BodyName_EN` varchar(50) DEFAULT NULL,
  `TAR_BodyName_TH` varchar(50) DEFAULT NULL COMMENT 'แบบตัวถัง',
  `TAR_SubBodyName_EN` varchar(50) DEFAULT NULL,
  `TAR_SubBodyName_TH` varchar(50) DEFAULT NULL,
  `TAR_UsageName_EN` varchar(50) DEFAULT NULL,
  `TAR_UsageName_TH` varchar(50) DEFAULT NULL,
  `TAR_CC_Min` varchar(50) DEFAULT NULL,
  `TAR_CC_Max` varchar(50) DEFAULT NULL,
  `TAR_Seat_Min` varchar(50) DEFAULT NULL,
  `TAR_Seat_Max` varchar(50) DEFAULT NULL,
  `TAR_Ton_Min` varchar(50) DEFAULT NULL,
  `TAR_Ton_Max` varchar(50) DEFAULT NULL,
  `TAR_Prem` double DEFAULT NULL,
  `TAR_Vat` double DEFAULT NULL,
  `TAR_StampDuty` double DEFAULT NULL,
  `TAR_TotalPrem` double DEFAULT NULL,
  `TAR_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `TAR_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`TAR_ID_PK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table TestTable
# ------------------------------------------------------------

DROP TABLE IF EXISTS `TestTable`;

CREATE TABLE `TestTable` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table Vehical
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Vehical`;

CREATE TABLE `Vehical` (
  `VEH_ID_PK` int(11) NOT NULL AUTO_INCREMENT,
  `VEH_TAR_VehCode_FK` varchar(11) DEFAULT NULL COMMENT 'รหัสรถ',
  `VEH_RED_KEY_FK` varchar(50) DEFAULT NULL COMMENT 'รหัสรถ',
  `VEH_LicenseNum` varchar(50) DEFAULT NULL COMMENT 'เลขทะเบียน',
  `VEH_ChassisNum` varchar(50) DEFAULT NULL COMMENT 'เลขตัวถัง',
  `VEH_Capacity` int(11) DEFAULT NULL COMMENT 'ขนาดเครื่องยนต์',
  `VEH_Seat` varchar(50) DEFAULT NULL COMMENT 'จำนวนที่นั่ง',
  `VEH_Weight` varchar(50) DEFAULT NULL COMMENT 'นำ้หนักรวม',
  `VEH_EngineNum` varchar(50) DEFAULT NULL,
  `VEH_NewCar` char(1) DEFAULT NULL,
  `VEH_DriveArea` varchar(50) DEFAULT NULL,
  `VEH_Prov_ID_FK` int(11) DEFAULT NULL,
  `VEH_Color` varchar(50) DEFAULT '',
  `VEH_Country` varchar(50) DEFAULT '',
  `VEH_QuoNumRef` varchar(50) DEFAULT NULL COMMENT 'TPK_Policy[POL_QuoNum]',
  `VEH_UpdatedDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `VEH_UpdatedBy` varchar(50) NOT NULL DEFAULT 'Admin ',
  PRIMARY KEY (`VEH_ID_PK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;



# Dump of table zipcodes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `zipcodes`;

CREATE TABLE `zipcodes` (
  `zipcode_id` int(11) NOT NULL AUTO_INCREMENT,
  `subdistrict_code` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '',
  `zipcode` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`zipcode_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
