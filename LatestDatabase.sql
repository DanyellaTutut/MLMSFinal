CREATE DATABASE  IF NOT EXISTS `dbholygarden` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `dbholygarden`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: localhost    Database: dbholygarden
-- ------------------------------------------------------
-- Server version	5.6.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblacunit`
--

DROP TABLE IF EXISTS `tblacunit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblacunit` (
  `intUnitID` int(11) NOT NULL AUTO_INCREMENT,
  `strUnitName` varchar(45) NOT NULL,
  `intUnitStatus` int(11) NOT NULL,
  `intCapacity` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intLevelAshID` int(11) NOT NULL,
  PRIMARY KEY (`intUnitID`),
  KEY `fk_tblacunit_intLevelAshID_idx` (`intLevelAshID`),
  CONSTRAINT `fk_tblacunit_intLevelAshID` FOREIGN KEY (`intLevelAshID`) REFERENCES `tbllevelash` (`intLevelAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblacunit`
--

LOCK TABLES `tblacunit` WRITE;
/*!40000 ALTER TABLE `tblacunit` DISABLE KEYS */;
INSERT INTO `tblacunit` VALUES (1,'unit-1',0,0,1,1),(2,'asdfdd',2,0,1,1),(3,'unit-2',1,0,1,1),(4,'unit-1',0,0,1,4),(5,'fasdj',1,0,1,5),(6,'fdas',0,0,1,5),(7,'unit-1',0,0,1,7),(8,'unit-1',0,0,1,6),(9,'A-1',1,2,0,9),(10,'A-2',1,2,0,15),(11,'A-1',0,2,0,15),(12,'A-2',0,2,0,9);
/*!40000 ALTER TABLE `tblacunit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblashcrypt`
--

DROP TABLE IF EXISTS `tblashcrypt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblashcrypt` (
  `intAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strAshName` varchar(45) NOT NULL,
  `intNoOfLevel` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intAshID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblashcrypt`
--

LOCK TABLES `tblashcrypt` WRITE;
/*!40000 ALTER TABLE `tblashcrypt` DISABLE KEYS */;
INSERT INTO `tblashcrypt` VALUES (1,'ac-maginhawa',2,1),(2,'hahah',3,1),(3,'masaya',3,0),(4,'malungkot',1,1),(5,'mapayapa',3,0),(6,'capstone',4,1);
/*!40000 ALTER TABLE `tblashcrypt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblblock`
--

DROP TABLE IF EXISTS `tblblock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblblock` (
  `intBlockID` int(11) NOT NULL AUTO_INCREMENT,
  `strBlockName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intSectionID` int(11) NOT NULL,
  `intTypeID` int(11) NOT NULL,
  PRIMARY KEY (`intBlockID`),
  KEY `fk_tblblock_intSectionID_idx` (`intSectionID`),
  KEY `fk_tblblock_intTypeID_idx` (`intTypeID`),
  CONSTRAINT `fk_tblblock_intSectionID` FOREIGN KEY (`intSectionID`) REFERENCES `tblsection` (`intSectionID`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tblblock_intTypeID` FOREIGN KEY (`intTypeID`) REFERENCES `tbltypeoflot` (`intTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblblock`
--

LOCK TABLES `tblblock` WRITE;
/*!40000 ALTER TABLE `tblblock` DISABLE KEYS */;
INSERT INTO `tblblock` VALUES (1,'je-A',5,1,2,1),(2,'je-B',0,1,1,1),(3,'ge-A',0,1,2,2),(4,'apart-A',0,1,4,3),(6,'ac-A',6,1,1,10),(7,'je-C',3,1,2,1),(8,'ge-B',2,1,1,3),(9,'je-A',2,1,4,1),(10,'je-B',5,1,4,1),(11,'dsfff',2,1,3,11),(12,'JE-A',1,0,3,1),(13,'vhon',4,1,3,12),(14,'jeron love balan',5,1,3,12),(15,'haha',3,1,8,11),(16,'haha',1,1,5,15),(17,'LAWN-A',3,0,10,16),(18,'JE-A',3,1,10,1);
/*!40000 ALTER TABLE `tblblock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldiscount`
--

DROP TABLE IF EXISTS `tbldiscount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldiscount` (
  `intDiscountID` int(11) NOT NULL AUTO_INCREMENT,
  `strDescription` varchar(45) NOT NULL,
  `dblPercent` double NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intServiceID` int(11) NOT NULL,
  PRIMARY KEY (`intDiscountID`),
  KEY `fk_tbldiscount_intServiceID_idx` (`intServiceID`),
  CONSTRAINT `fk_tbldiscount_intServiceID` FOREIGN KEY (`intServiceID`) REFERENCES `tblservice` (`intServiceID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldiscount`
--

LOCK TABLES `tbldiscount` WRITE;
/*!40000 ALTER TABLE `tbldiscount` DISABLE KEYS */;
INSERT INTO `tbldiscount` VALUES (1,'Senior Citizen',0.1,0,1),(2,'4 niches',0.05,1,2),(3,'fadsff',2.12,1,5),(4,'dasf',0.02,1,5),(5,'fdas',0.03,1,4),(6,'d',0.34,1,1);
/*!40000 ALTER TABLE `tbldiscount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblemployee`
--

DROP TABLE IF EXISTS `tblemployee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblemployee` (
  `intEmployeeID` int(11) NOT NULL AUTO_INCREMENT,
  `strUsername` varchar(45) NOT NULL,
  `strPassword` varchar(45) NOT NULL,
  PRIMARY KEY (`intEmployeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblemployee`
--

LOCK TABLES `tblemployee` WRITE;
/*!40000 ALTER TABLE `tblemployee` DISABLE KEYS */;
INSERT INTO `tblemployee` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `tblemployee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstallmentash`
--

DROP TABLE IF EXISTS `tblinstallmentash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstallmentash` (
  `intInstallmentAshID` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) NOT NULL,
  `strUnitName` varchar(45) NOT NULL,
  `strLevelName` varchar(45) NOT NULL,
  `strAshName` varchar(45) NOT NULL,
  `intTerm` int(11) NOT NULL,
  `dblRate` double NOT NULL,
  `dblDownpayment` double NOT NULL,
  `dblBalance` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intReservationAshID` int(11) NOT NULL,
  PRIMARY KEY (`intInstallmentAshID`),
  KEY `fk_intReservationAshID_tblinstallmentash_idx` (`intReservationAshID`),
  CONSTRAINT `fk_intReservationAshID_tblinstallmentash` FOREIGN KEY (`intReservationAshID`) REFERENCES `tblreservationash` (`intReservationAsh_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstallmentash`
--

LOCK TABLES `tblinstallmentash` WRITE;
/*!40000 ALTER TABLE `tblinstallmentash` DISABLE KEYS */;
INSERT INTO `tblinstallmentash` VALUES (1,'2016-07-15','Cruz','Jeron','','A-2','A','masaya',1,0.12,10000,22500,0,5);
/*!40000 ALTER TABLE `tblinstallmentash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinstallmentlot`
--

DROP TABLE IF EXISTS `tblinstallmentlot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinstallmentlot` (
  `intInstallmentLotID` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strLotName` varchar(45) NOT NULL,
  `strBlockName` varchar(45) NOT NULL,
  `strSectionName` varchar(45) NOT NULL,
  `intTerm` int(11) NOT NULL,
  `dblRate` double NOT NULL,
  `dblDownpayment` double NOT NULL,
  `dblBalance` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intReservationLotID` int(11) NOT NULL,
  PRIMARY KEY (`intInstallmentLotID`),
  KEY `fk_intReservationLotID_tblinstallmentlot_idx` (`intReservationLotID`),
  CONSTRAINT `fk_intReservationLotID_tblinstallmentlot` FOREIGN KEY (`intReservationLotID`) REFERENCES `tblreservationlot` (`intReservationLot_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinstallmentlot`
--

LOCK TABLES `tblinstallmentlot` WRITE;
/*!40000 ALTER TABLE `tblinstallmentlot` DISABLE KEYS */;
INSERT INTO `tblinstallmentlot` VALUES (1,'2016-07-15','Cruz','Jeron','','A-1','LAWN-A','east',1,0.12,10000,66230,0,5);
/*!40000 ALTER TABLE `tblinstallmentlot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinterest`
--

DROP TABLE IF EXISTS `tblinterest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinterest` (
  `intInterestID` int(11) NOT NULL AUTO_INCREMENT,
  `intYear` int(11) NOT NULL,
  `dblPercent` double NOT NULL,
  `intTypeID` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intInterestID`),
  KEY `fk_tblInterest_intTypeID_idx` (`intTypeID`),
  CONSTRAINT `fk_tblinterest_intTypeID` FOREIGN KEY (`intTypeID`) REFERENCES `tbltypeoflot` (`intTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinterest`
--

LOCK TABLES `tblinterest` WRITE;
/*!40000 ALTER TABLE `tblinterest` DISABLE KEYS */;
INSERT INTO `tblinterest` VALUES (1,1,0.12,1,0),(2,2,0.13,5,1),(3,3,0.32,11,1),(4,2,0.22,13,1),(5,2,0.02,11,1),(6,1,0.01,15,1),(7,1,0.12,16,0),(8,2,0.14,1,0),(9,2,0.14,16,0),(10,3,0.16,4,1);
/*!40000 ALTER TABLE `tblinterest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblinterestforlevel`
--

DROP TABLE IF EXISTS `tblinterestforlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblinterestforlevel` (
  `intInterestID` int(11) NOT NULL AUTO_INCREMENT,
  `intYear` int(11) NOT NULL,
  `dblPercent` double NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intLevelAshID` int(11) NOT NULL,
  PRIMARY KEY (`intInterestID`),
  KEY `fk_tblinterestforlevel_intLevelAshID_idx` (`intLevelAshID`),
  CONSTRAINT `fk_tblinterestforlevel_intLevelAshID` FOREIGN KEY (`intLevelAshID`) REFERENCES `tbllevelash` (`intLevelAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblinterestforlevel`
--

LOCK TABLES `tblinterestforlevel` WRITE;
/*!40000 ALTER TABLE `tblinterestforlevel` DISABLE KEYS */;
INSERT INTO `tblinterestforlevel` VALUES (1,1,0.12,0,15),(2,2,0.14,0,15);
/*!40000 ALTER TABLE `tblinterestforlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllevelash`
--

DROP TABLE IF EXISTS `tbllevelash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllevelash` (
  `intLevelAshID` int(11) NOT NULL AUTO_INCREMENT,
  `strLevelName` varchar(45) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intAshID` int(11) NOT NULL,
  `intNoOfUnit` int(11) NOT NULL,
  `dblSellingPrice` double NOT NULL,
  PRIMARY KEY (`intLevelAshID`),
  KEY `fk_tblLevelAsh_intAshID_idx` (`intAshID`),
  CONSTRAINT `fk_tblLevelAsh_intAshID` FOREIGN KEY (`intAshID`) REFERENCES `tblashcrypt` (`intAshID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllevelash`
--

LOCK TABLES `tbllevelash` WRITE;
/*!40000 ALTER TABLE `tbllevelash` DISABLE KEYS */;
INSERT INTO `tbllevelash` VALUES (1,'A',1,1,2,123),(2,'qad',1,1,3,123),(3,'b',1,1,2,30000),(4,'a',1,3,2,30000),(5,'a',1,5,1,22.22),(6,'a',1,5,10,30000),(7,'b',1,5,10,75000),(8,'b',1,3,2,300),(9,'A',0,5,2,32500),(10,'b',1,5,1,2),(11,'b',1,5,10,4),(12,'b',1,5,10,4),(13,'b',1,5,2,2),(14,'B',0,5,2,32500),(15,'A',0,3,2,32500),(16,'B',0,3,2,32500),(17,'C',0,5,2,32500),(18,'C',0,3,2,32500);
/*!40000 ALTER TABLE `tbllevelash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbllot`
--

DROP TABLE IF EXISTS `tbllot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbllot` (
  `intLotID` int(11) NOT NULL AUTO_INCREMENT,
  `strLotName` varchar(45) NOT NULL,
  `intLotStatus` int(11) NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  `intBlockID` int(11) NOT NULL,
  PRIMARY KEY (`intLotID`),
  KEY `fk_tbllot_intBlockID_idx` (`intBlockID`),
  CONSTRAINT `fk_tbllot_intBlockID` FOREIGN KEY (`intBlockID`) REFERENCES `tblblock` (`intBlockID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbllot`
--

LOCK TABLES `tbllot` WRITE;
/*!40000 ALTER TABLE `tbllot` DISABLE KEYS */;
INSERT INTO `tbllot` VALUES (1,'a1',2,1,1),(2,'a2',0,1,1),(3,'a3',0,1,1),(4,'a4',1,1,1),(5,'a5',2,1,1),(6,'b1',1,1,2),(7,'a6',0,1,1),(8,'B1',0,1,8),(9,'SAMPLE',1,1,8),(10,'sample',0,1,8),(11,'fdasfjkdhsa',0,1,6),(12,'dasffff',0,1,9),(13,'je-1',0,1,9),(14,'je-2',2,1,9),(15,'A-1',1,0,17),(16,'fadsf',1,1,15),(17,'haha',1,1,16),(18,'A-4',1,0,17),(19,'A-2',0,0,17),(20,'A-3',1,0,17);
/*!40000 ALTER TABLE `tbllot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreservationash`
--

DROP TABLE IF EXISTS `tblreservationash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblreservationash` (
  `intReservationAsh_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strAddress` varchar(100) NOT NULL,
  `strContactNo` varchar(45) NOT NULL,
  `intTypeOfPayment` int(11) NOT NULL,
  `dblReservationFee` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intUnitID` int(11) NOT NULL,
  PRIMARY KEY (`intReservationAsh_id`),
  KEY `fk_tblReservationLot_intUnitID_idx` (`intUnitID`),
  CONSTRAINT `fk_tblReservationAsh_intUnitID` FOREIGN KEY (`intUnitID`) REFERENCES `tblacunit` (`intUnitID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreservationash`
--

LOCK TABLES `tblreservationash` WRITE;
/*!40000 ALTER TABLE `tblreservationash` DISABLE KEYS */;
INSERT INTO `tblreservationash` VALUES (1,'2016-07-03','Cruz','Jeron','','Pasig','099999',0,1000,1,9),(2,'2016-07-04','Santos','Jeff','','Mandaluyong','09090',1,1000,1,9),(3,'2016-07-06','sdaf','sadf','sfaf','asf','43434',0,344.34,1,9),(4,'2016-07-08','Marcelo','Glenn','','Pasig','0909000',0,1000,0,9),(5,'2016-07-11','Cruz','Jeron','','Pasig','09090909090',1,1000,0,10);
/*!40000 ALTER TABLE `tblreservationash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblreservationlot`
--

DROP TABLE IF EXISTS `tblreservationlot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblreservationlot` (
  `intReservationLot_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strAddress` varchar(100) NOT NULL,
  `strContactNo` varchar(45) NOT NULL,
  `intTypeOfPayment` int(11) NOT NULL,
  `dblReservationFee` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intLotID` int(11) NOT NULL,
  PRIMARY KEY (`intReservationLot_id`),
  KEY `fk_tblReservationLot_intUnitID_idx` (`intLotID`),
  CONSTRAINT `fk_tblReservationLot_intLotID` FOREIGN KEY (`intLotID`) REFERENCES `tbllot` (`intLotID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblreservationlot`
--

LOCK TABLES `tblreservationlot` WRITE;
/*!40000 ALTER TABLE `tblreservationlot` DISABLE KEYS */;
INSERT INTO `tblreservationlot` VALUES (1,'2016-07-05','Cruz','Jeron','','Pasig','09090',0,1000,1,15),(2,'2016-07-04','Santos','Jeff','','Pasig','090900',1,1000,1,19),(3,'2016-07-08','adsf','fadsf','fasd','fdas','23434',0,2344.44,1,20),(4,'2016-07-08','Marcelo','Glenn','','Pasig','09000000000',0,1000,0,15),(5,'2016-07-11','Cruz','Jeron','','Pasig','09000000000',1,1000,0,18),(6,'2016-07-16','pambuena','marivie','','quezon city','1234567',1,1000,0,20);
/*!40000 ALTER TABLE `tblreservationlot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsection`
--

DROP TABLE IF EXISTS `tblsection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsection` (
  `intSectionID` int(11) NOT NULL AUTO_INCREMENT,
  `strSectionName` varchar(45) NOT NULL,
  `intNoOfBlock` int(11) NOT NULL,
  `intStatus` tinyint(2) NOT NULL,
  PRIMARY KEY (`intSectionID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsection`
--

LOCK TABLES `tblsection` WRITE;
/*!40000 ALTER TABLE `tblsection` DISABLE KEYS */;
INSERT INTO `tblsection` VALUES (1,'east',1,1),(2,'west',2,1),(3,'center',2,0),(4,'south',2,1),(5,'north',5,0),(6,'dfasasf',5,1),(7,'sdfdf',21,1),(8,'hahaaa',2,1),(9,'haha',1,1),(10,'east',2,0),(11,'west',2,1);
/*!40000 ALTER TABLE `tblsection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblservice`
--

DROP TABLE IF EXISTS `tblservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblservice` (
  `intServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `strServiceName` varchar(45) NOT NULL,
  `dblServicePrice` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intTypeID` int(11) DEFAULT NULL,
  PRIMARY KEY (`intServiceID`),
  KEY `fk_tblservice_intTypeID_idx` (`intTypeID`),
  CONSTRAINT `fk_tblservice_intTypeID` FOREIGN KEY (`intTypeID`) REFERENCES `tbltypeoflot` (`intTypeID`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblservice`
--

LOCK TABLES `tblservice` WRITE;
/*!40000 ALTER TABLE `tblservice` DISABLE KEYS */;
INSERT INTO `tblservice` VALUES (1,'interment service',10000,0,NULL),(2,'cleaning of niches',502220,1,NULL),(3,'painting of niche',1000,1,NULL),(4,'cremation service',10000,1,NULL),(5,'adfasdf',3123,1,NULL),(6,'inurnment service',500,0,NULL),(7,'exhumation',10000,0,NULL),(8,'g',1222.22,1,NULL);
/*!40000 ALTER TABLE `tblservice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblspotashreserve`
--

DROP TABLE IF EXISTS `tblspotashreserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblspotashreserve` (
  `intSpotAshReserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strUnitName` varchar(45) NOT NULL,
  `strLevelName` varchar(45) NOT NULL,
  `strAshName` varchar(45) NOT NULL,
  `dblAmount` double NOT NULL,
  `intStatus` varchar(45) NOT NULL,
  `intReservationAsh_id` int(11) NOT NULL,
  PRIMARY KEY (`intSpotAshReserve_id`),
  KEY `fk_intReservationAsh_id_tblspotashreserve_idx` (`intReservationAsh_id`),
  CONSTRAINT `fk_intReservationAsh_id_tblspotashreserve` FOREIGN KEY (`intReservationAsh_id`) REFERENCES `tblreservationash` (`intReservationAsh_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblspotashreserve`
--

LOCK TABLES `tblspotashreserve` WRITE;
/*!40000 ALTER TABLE `tblspotashreserve` DISABLE KEYS */;
INSERT INTO `tblspotashreserve` VALUES (1,'2016-07-10','Marcelo','Glenn','','unit-1','a','mapayapa',20000,'1',4),(2,'2016-07-14','Marcelo','Glenn','','A-1','A','mapayapa',32500,'0',4);
/*!40000 ALTER TABLE `tblspotashreserve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblspotlotreserve`
--

DROP TABLE IF EXISTS `tblspotlotreserve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblspotlotreserve` (
  `intSpotLotReserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `datDateCreated` date NOT NULL,
  `strLastName` varchar(45) NOT NULL,
  `strFirstName` varchar(45) NOT NULL,
  `strMiddleName` varchar(45) DEFAULT NULL,
  `strLotName` varchar(45) NOT NULL,
  `strBlockName` varchar(45) NOT NULL,
  `strSectionName` varchar(45) NOT NULL,
  `dblAmount` double NOT NULL,
  `intStatus` int(11) NOT NULL,
  `intReservationLot_id` int(11) NOT NULL,
  PRIMARY KEY (`intSpotLotReserve_id`),
  KEY `fk_intReservationLotID_tblspotLotReserve_idx` (`intReservationLot_id`),
  CONSTRAINT `fk_intReservationLotID_tblspotLotReserve` FOREIGN KEY (`intReservationLot_id`) REFERENCES `tblreservationlot` (`intReservationLot_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblspotlotreserve`
--

LOCK TABLES `tblspotlotreserve` WRITE;
/*!40000 ALTER TABLE `tblspotlotreserve` DISABLE KEYS */;
INSERT INTO `tblspotlotreserve` VALUES (1,'2016-07-10','Marcelo','Glenn','','a-1','je-A','center',2310000,1,4),(2,'2016-07-10','Marcelo','Glenn','','a-1','je-A','center',23.1,1,4),(3,'2016-07-14','Marcelo','Glenn','','A-1','JE-A','center',2310000,0,4);
/*!40000 ALTER TABLE `tblspotlotreserve` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltypeoflot`
--

DROP TABLE IF EXISTS `tbltypeoflot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltypeoflot` (
  `intTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `strTypeName` varchar(45) NOT NULL,
  `intNoOfLot` int(11) NOT NULL,
  `dblSellingPrice` double NOT NULL,
  `intStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`intTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltypeoflot`
--

LOCK TABLES `tbltypeoflot` WRITE;
/*!40000 ALTER TABLE `tbltypeoflot` DISABLE KEYS */;
INSERT INTO `tbltypeoflot` VALUES (1,'junior estate',24,2310000,0),(2,'garden estate',12,1155000.01,1),(3,'garden 3 lots',3,220500,1),(4,'senior niche',4,329175,0),(5,'lawn',1,15246,1),(6,'abcd',1,2,1),(7,'afadsf',1,10000000,1),(8,'fasdfs',1,1,1),(9,'dsafdas',1,1,1),(10,'fasdfsdfsaff',1,1,1),(11,'fsadkhasfk',12,123,1),(12,'fdasf',3,22000,1),(13,'aabb',5,30000,1),(14,'ahahaha',2,22,1),(15,'haha',1,2,1),(16,'lawn',1,76230,0),(17,'garden 3 lots',3,220500,1);
/*!40000 ALTER TABLE `tbltypeoflot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'dbholygarden'
--

--
-- Dumping routines for database 'dbholygarden'
--
/*!50003 DROP PROCEDURE IF EXISTS `checkBlockCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkBlockCount`(IN intID INT)
BEGIN
	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intBlockID) INTO curr FROM tblblock WHERE intSectionID = intID AND intStatus = 0;
	SELECT intNoOfBlock INTO max FROM tblsection WHERE intSectionID = intID;

	SELECT curr, max;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLevel`(IN intID INT)
BEGIN

	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intLevelAshID) INTO curr FROM tbllevelash WHERE intAshID = intID AND intStatus = 0;
	SELECT intNoOfLevel INTO max FROM tblashcrypt WHERE intAshID = intID;

	SELECT curr, max;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkLotCount` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkLotCount`(intID INT)
BEGIN

	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intLotID) INTO curr FROM tblLot WHERE intBlockID = intID AND intStatus = 0;
	SELECT intNoOfLot INTO max FROM tblBlock WHERE intBlockID = intID;

	SELECT curr, max;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `checkUnit` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkUnit`(IN intID INT)
BEGIN

	DECLARE max INT;
	DECLARE curr INT;

	SELECT COUNT(intUnitID) INTO curr FROM tblacunit WHERE intLevelAshID = intID AND intStatus = 0;
	SELECT intNoOfUnit INTO max FROM tbllevelash WHERE intLevelAshID = intID;


	SELECT curr, max;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateAshCrypt` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateAshCrypt`(IN ashID INT)
BEGIN


	UPDATE tblashcrypt set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tbllevelash set intStatus = 1 WHERE intAshID = ashID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID IN(select intLevelAshID from tbllevelash
														where intAshID = ashID);



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateBlock` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateBlock`(IN blockID INT)
BEGIN
	UPDATE tblblock set intStatus = 1 WHERE intBlockID = blockID;

	UPDATE tbllot set intStatus = 1 WHERE intBlockID = blockID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateLevel` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateLevel`(IN LevelAshID INT)
BEGIN


	UPDATE tbllevelash set intStatus = 1 WHERE intLevelAshID = LevelAshID;

	UPDATE tblacunit set intStatus = 1 WHERE intLevelAshID = LevelAshID;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateLotType` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateLotType`(IN typeID INT)
BEGIN

	
	UPDATE tbltypeoflot set intStatus = 1 WHERE intTypeID = typeID;

	UPDATE tblinterest set intStatus = 1 WHERE intTypeID = typeID;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateSection` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateSection`(IN sectionId INT)
BEGIN

	UPDATE tblsection set intStatus = 1 where intSectionID = sectionId;

	update tblBlock set intStatus = 1 where intSectionID = sectionId;

	update tblLot set intStatus = 1 where intBlockID IN(select intBlockID from tblBlock
														where intSectionID = sectionId);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `deactivateService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `deactivateService`(IN serviceID INT)
BEGIN
	UPDATE tblservice set intStatus = 1 WHERE intServiceID = serviceID;

	UPDATE tbldiscount set intStatus = 1 WHERE intServiceID = serviceID;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-18 13:24:45
