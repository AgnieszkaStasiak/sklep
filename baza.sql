-- MySQL dump 10.13  Distrib 5.7.9, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `Adres`
--

DROP TABLE IF EXISTS `Adres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Adres` (
  `idAdres` int(11) NOT NULL AUTO_INCREMENT,
  `Kraj` varchar(45) DEFAULT NULL,
  `Miasto` varchar(45) DEFAULT NULL,
  `Ulica` varchar(45) DEFAULT NULL,
  `Numer` int(11) DEFAULT NULL,
  `KodPocztowy` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAdres`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Adres`
--

LOCK TABLES `Adres` WRITE;
/*!40000 ALTER TABLE `Adres` DISABLE KEYS */;
INSERT INTO `Adres` VALUES (1,'pl',NULL,NULL,NULL,NULL),(2,'Polska','RzeszÃ³','Kr',78,'ee0'),(3,'M','RzeszÃ³','Kr',78,'ee0'),(4,'M','RzeszÃ³','Kr',78,'ee0'),(5,'M','RzeszÃ³','Kr',78,'ee0'),(6,'M','RzeszÃ³','Kr',78,'ee0'),(7,'M','RzeszÃ³','Kr',78,'ee0'),(8,'M','RzeszÃ³','Kr',78,'ee0'),(9,'aaa','aa','aa',0,'aa'),(10,'aaa','aa','aa',0,'aa'),(11,'aaa','aa','aa',0,'aa'),(12,'aaa','aa','aa',0,'aa'),(13,'aaa','aa','aa',0,'aa'),(14,'aaa','aa','aa',0,'aa'),(15,'aaa','aa','aa',0,'aa'),(16,'aaa','aa','aa',0,'aa'),(17,'aaa','aa','aa',0,'aa'),(18,'aaa','aa','aa',0,'aa'),(19,'aaa','aa','aa',0,'aa'),(20,'aaa','aa','aa',0,'aa'),(21,'aaa','aa','aa',0,'aa'),(22,'aaa','aa','aa',0,'aa'),(23,'aaa','aa','aa',0,'aa'),(24,'aaa','aa','aa',0,'aa'),(25,'aaa','aa','aa',0,'aa'),(26,'aaa','aa','aa',0,'aa'),(27,'aaa','aa','aa',0,'aa'),(28,'aaa','aa','aa',0,'aa'),(29,'aaa','aa','aa',0,'aa'),(30,'aaa','aa','aa',0,'aa'),(31,'','','',0,''),(32,'','','',0,''),(33,'Polska','RzeszÃ³w','Kra',999,'45-345'),(34,'Polska','RzeszÃ³w','Kra',999,'45-345'),(35,'Polska','RzeszÃ³w','Kra',999,'45-345'),(36,'Polska','RzeszÃ³w','Kra',999,'45-345'),(37,'Polska','RzeszÃ³w','Kra',999,'45-345'),(38,'','','',0,''),(39,'','','',0,''),(40,'','','',0,''),(41,'','','',0,''),(42,'','','',0,''),(43,'Polska','RzeszÃ³w','k',3,'35-222'),(44,'Polska','RzeszÃ³w','Kr',3,'35-222'),(45,'','','',0,''),(46,'','','',0,''),(47,'','','',0,''),(48,'PPP','XXI','POR',34,'345'),(49,'','','',0,''),(50,'','','',0,''),(51,'','','',0,''),(52,'','','',0,''),(53,'','','',0,''),(54,'','','',0,''),(55,'','','',0,''),(56,'','','',0,''),(57,'','','',0,''),(58,'','','',0,'');
/*!40000 ALTER TABLE `Adres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GrupaProduktow`
--

DROP TABLE IF EXISTS `GrupaProduktow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GrupaProduktow` (
  `idGrupaProduktow` int(11) NOT NULL AUTO_INCREMENT,
  `NazwaG` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idGrupaProduktow`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GrupaProduktow`
--

LOCK TABLES `GrupaProduktow` WRITE;
/*!40000 ALTER TABLE `GrupaProduktow` DISABLE KEYS */;
INSERT INTO `GrupaProduktow` VALUES (14,'ATX'),(15,'min-ATX'),(16,'socket 444'),(17,'socket 444'),(18,'DDR'),(19,'socket 333'),(20,'DDD'),(21,'Socket 1151'),(22,'DDR4-2133 ');
/*!40000 ALTER TABLE `GrupaProduktow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Kategoria`
--

DROP TABLE IF EXISTS `Kategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Kategoria` (
  `idKategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NazwaK` varchar(45) DEFAULT NULL,
  `Produkt_idProdukt` int(11) NOT NULL,
  PRIMARY KEY (`idKategoria`,`Produkt_idProdukt`),
  KEY `fk_Kategoria_Produkt1_idx` (`Produkt_idProdukt`),
  CONSTRAINT `fk_Kategoria_Produkt1` FOREIGN KEY (`Produkt_idProdukt`) REFERENCES `Produkt` (`idProdukt`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Kategoria`
--

LOCK TABLES `Kategoria` WRITE;
/*!40000 ALTER TABLE `Kategoria` DISABLE KEYS */;
INSERT INTO `Kategoria` VALUES (173,'Obudowa',241),(174,'Obudowa',242),(176,'Płyta Główna',243),(178,'Płyta Główna',244),(179,'Płyta Główna',245),(180,'Płyta Główna',246),(181,'Płyta Główna',247),(182,'Płyta Główna',248),(183,'Płyta Główna',249),(184,'Płyta Główna',250),(185,'Płyta Główna',251),(186,'Płyta Główna',252),(187,'Płyta Główna',253),(188,'Płyta Główna',254),(189,'Płyta Główna',255),(190,'Płyta Główna',256),(191,'Płyta Główna',257),(192,'Płyta Główna',258),(193,'Płyta Główna',259),(194,'Płyta Główna',260),(195,'Płyta Główna',261),(196,'Płyta Główna',262),(197,'Płyta Główna',263),(198,'Płyta Główna',264),(199,'Płyta Główna',265),(200,'Płyta Główna',266),(201,'Płyta Główna',267),(202,'Płyta Główna',268),(203,'Płyta Główna',269),(204,'Płyta Główna',270),(205,'Płyta Główna',271),(206,'Płyta Główna',272),(207,'Płyta Główna',273),(208,'Płyta Główna',274),(209,'Płyta Główna',275),(210,'Płyta Główna',276),(211,'Płyta Główna',277),(212,'Płyta Główna',278),(213,'Płyta Główna',279),(214,'Płyta Główna',280),(215,'Płyta Główna',281),(216,'Płyta Główna',282),(217,'Płyta Główna',283),(218,'Płyta Główna',284),(219,'Obudowa',285),(221,'Procesor',286),(222,'Procesor',287),(224,'Pamięć',288),(227,'Procesor',290),(229,'dodNo',292),(230,'Zasilacz',292);
/*!40000 ALTER TABLE `Kategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ListaGrup`
--

DROP TABLE IF EXISTS `ListaGrup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ListaGrup` (
  `idListaGrup` int(11) NOT NULL AUTO_INCREMENT,
  `idProdukt` int(11) NOT NULL,
  `idGrupaProduktow` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idListaGrup`,`idProdukt`,`idGrupaProduktow`),
  KEY `fk_ListaGrup_Produkt1_idx` (`idProdukt`),
  KEY `fk_ListaGrup_GrupaProduktow1_idx` (`idGrupaProduktow`),
  CONSTRAINT `fk_ListaGrup_GrupaProduktow1` FOREIGN KEY (`idGrupaProduktow`) REFERENCES `GrupaProduktow` (`idGrupaProduktow`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ListaGrup_Produkt1` FOREIGN KEY (`idProdukt`) REFERENCES `Produkt` (`idProdukt`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ListaGrup`
--

LOCK TABLES `ListaGrup` WRITE;
/*!40000 ALTER TABLE `ListaGrup` DISABLE KEYS */;
INSERT INTO `ListaGrup` VALUES (7,240,14),(8,241,15),(9,243,16),(10,244,17),(11,244,18),(12,245,19),(13,245,20),(15,282,14),(16,282,14),(17,282,14),(18,282,14),(19,282,14),(20,282,14),(21,282,14),(22,283,14),(23,283,17),(24,283,18),(25,284,15),(26,284,18),(27,284,19),(28,285,14),(29,286,16),(30,286,18),(31,286,19),(32,287,21),(33,287,22),(34,288,22),(35,289,14),(36,289,15),(37,290,14),(38,290,15),(39,290,16),(40,290,17),(41,290,18),(42,290,19),(43,290,20),(44,290,21),(45,290,22),(46,291,14),(47,291,15),(48,292,14),(49,292,15);
/*!40000 ALTER TABLE `ListaGrup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MetodaPlatnosci`
--

DROP TABLE IF EXISTS `MetodaPlatnosci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MetodaPlatnosci` (
  `idMetodaPlatnosci` int(11) NOT NULL,
  `Nazw` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMetodaPlatnosci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MetodaPlatnosci`
--

LOCK TABLES `MetodaPlatnosci` WRITE;
/*!40000 ALTER TABLE `MetodaPlatnosci` DISABLE KEYS */;
/*!40000 ALTER TABLE `MetodaPlatnosci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MetodaPrzesylki`
--

DROP TABLE IF EXISTS `MetodaPrzesylki`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MetodaPrzesylki` (
  `idMetodaPrzesylki` int(11) NOT NULL,
  `Nazwa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMetodaPrzesylki`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MetodaPrzesylki`
--

LOCK TABLES `MetodaPrzesylki` WRITE;
/*!40000 ALTER TABLE `MetodaPrzesylki` DISABLE KEYS */;
/*!40000 ALTER TABLE `MetodaPrzesylki` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Produkt`
--

DROP TABLE IF EXISTS `Produkt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Produkt` (
  `idProdukt` int(11) NOT NULL AUTO_INCREMENT,
  `Nazwa` varchar(45) DEFAULT NULL,
  `iloscSztuk` varchar(45) DEFAULT NULL,
  `Opis` text,
  `Zdjecie` mediumblob,
  `Cena` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idProdukt`)
) ENGINE=InnoDB AUTO_INCREMENT=293 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Produkt`
--

LOCK TABLES `Produkt` WRITE;
/*!40000 ALTER TABLE `Produkt` DISABLE KEYS */;
INSERT INTO `Produkt` VALUES (240,'Obudowa ATX','23',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'22'),(241,'Obudowa min-ATX','25',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'123'),(242,'Obudowa ATX-Z','34',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'234'),(243,'Płyta ATX','345',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'231'),(244,'Płyta ATX-Z','345',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'231'),(245,'Płyta min-ATR','345',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'34'),(246,'Płyta Z','345',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'345'),(247,'Płyta ATX M','3245',' Lorem ipsum dolor sit amet, consectetur adip',NULL,'345'),(248,'Płyta ATX-Z','345','fsfs vw',NULL,'erew'),(249,'Płyta ATX-Z2','345','fsfs vw',NULL,'erew'),(250,'Płyta ATX -Z2Z','43534','dfev frdgfvd',NULL,'er'),(251,'Płyta ATX -Z2Z','3345','fsefsdf',NULL,'34'),(252,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(253,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(254,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(255,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(256,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(257,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(258,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(259,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(260,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(261,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(262,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(263,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(264,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(265,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(266,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(267,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(268,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(269,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(270,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(271,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(272,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(273,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(274,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(275,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(276,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(277,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(278,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(279,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(280,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(281,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(282,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(283,'Płyta ATX -Z2Z3','34','v dfvd',NULL,'3'),(284,'Płyta min-XTR','34','erfewr',NULL,'234'),(285,'Obudowa ATX 02','23','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis erat leo, placerat in consectetur eget, convallis a quam. Vivamus lobortis at massa non mollis. Donec eros libero, mollis eget nisl et, ullamcorper condimentum tortor. Nam in magna vitae dolor porta malesuada euismod ut ligula. Aliquam imperdiet luctus ex, nec viverra nisi faucibus ac. Mauris pretium eget ligula ut malesuada. Suspendisse a arcu ornare odio porttitor convallis a interdum justo. Donec mattis rhoncus tellus, nec luctus metus efficitur eu. Nulla accumsan volutpat enim, sit amet suscipit tellus mattis sit amet. Curabitur ornare, mi vel venenatis faucibus, eros erat mollis risus, et malesuada metus nunc sodales tortor. Donec scelerisque erat sit amet tellus luctus dictum. Quisque porttitor sapien lectus. Vestibulum sed enim id felis rhoncus eleifend. Mauris dignissim, magna sed facilisis tempor, turpis magna interdum nisi, in iaculis lectus tellus non orci. ',NULL,'34'),(286,'Procesor ZS','23','footer ',NULL,'23'),(287,'Intel i5-6500 3.20GHz 6MB','34','Tworzysz własny system przeznaczony do gier? Chcesz jednocześnie grać i udostępniać strumieniowo obraz ze swojego urządzenia? Jeśli pragniesz otrzymać najwyższą wydajność, procesor Intel® Core™ szóstej generacji jest tym, czego potrzebujesz. Z jego pomocą wyposażysz swój nowy system w cztery rdzenie o szybkości taktowania 3,2 GHz (3.6 GHz w trybie Turbo) oraz 6 MB pamięci cache. Przejmij kontrolę nad grą. Zawładnij swoimi przeciwnikami. Ustalaj reguły gry.\r\n',NULL,'905,04'),(288,'HyperX 8GB 2133MHz Fury Black CL14','345','amięci HyperX® FURY DDR4 poradzą sobie nawet w najcięższych bitwach. Automatycznie rozpoznają platformę i zmieniają swoje taktowanie do najwyższej możliwej częstotliwości. Kości pamięci DDR4 pracują pod napięciem 1.2 V  nawet z wysoką częstotliwością, więc cechują się niskimi temperaturami nawet pod dużym obciążeniem. Nie ma potrzeby zmieniać napięcia by osiągnąć większą wydajność co oznacza większe rezerwy mocy dla pozostałych podzespołów komputera. Elegancki, asymetryczny rozpraszacz ciepła pamięci FURY pozwala zachować niższą temperatury pracy, jednocześnie umożliwiając budowe doskonale wyglądającej konfiguracji.',NULL,'139,00'),(289,'Zasialcza','23','Zasilacz',NULL,'23'),(290,'Procesor','23','ILosc',NULL,'34'),(291,'Zasilacz X','34','ewerwq',NULL,'23'),(292,'Zasilacz','43','fsoko',NULL,'34');
/*!40000 ALTER TABLE `Produkt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Role`
--

DROP TABLE IF EXISTS `Role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Role` (
  `idRole` int(11) NOT NULL,
  `Nazwa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='\n	\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Role`
--

LOCK TABLES `Role` WRITE;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` VALUES (1,'user'),(2,'admin');
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SzczegolyZamowienia`
--

DROP TABLE IF EXISTS `SzczegolyZamowienia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SzczegolyZamowienia` (
  `idSzczegolyZamowienia` int(11) NOT NULL,
  `idZamowienie` int(11) NOT NULL,
  `Produkt_idProdukt` int(11) NOT NULL,
  PRIMARY KEY (`idSzczegolyZamowienia`,`Produkt_idProdukt`,`idZamowienie`),
  KEY `fk_SzczegolyZamowienia_Produkt1_idx` (`Produkt_idProdukt`),
  KEY `fk_SzczegolyZamowienia_1_idx` (`idZamowienie`),
  CONSTRAINT `fk_SzczegolyZamowienia_1` FOREIGN KEY (`idZamowienie`) REFERENCES `Zamowienie` (`idZamowienie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SzczegolyZamowienia_Produkt1` FOREIGN KEY (`Produkt_idProdukt`) REFERENCES `Produkt` (`idProdukt`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SzczegolyZamowienia`
--

LOCK TABLES `SzczegolyZamowienia` WRITE;
/*!40000 ALTER TABLE `SzczegolyZamowienia` DISABLE KEYS */;
/*!40000 ALTER TABLE `SzczegolyZamowienia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Uzytkownik`
--

DROP TABLE IF EXISTS `Uzytkownik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Uzytkownik` (
  `idUzytkownik` int(11) NOT NULL AUTO_INCREMENT,
  `Imie` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Login` varchar(45) DEFAULT NULL,
  `Haslo` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Role_idRole` int(11) NOT NULL DEFAULT '0',
  `Adres_idAdres` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idUzytkownik`,`Role_idRole`,`Adres_idAdres`),
  KEY `fk_Uzytkownik_Role1_idx` (`Role_idRole`),
  KEY `fk_Uzytkownik_Adres1_idx` (`Adres_idAdres`),
  CONSTRAINT `fk_Uzytkownik_Adres1` FOREIGN KEY (`Adres_idAdres`) REFERENCES `Adres` (`idAdres`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Uzytkownik_Role1` FOREIGN KEY (`Role_idRole`) REFERENCES `Role` (`idRole`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Uzytkownik`
--

LOCK TABLES `Uzytkownik` WRITE;
/*!40000 ALTER TABLE `Uzytkownik` DISABLE KEYS */;
INSERT INTO `Uzytkownik` VALUES (16,'Agnieszka','Stasiak','Admin','d033e22ae348aeb5660fc2140aec35850c4da997','',2,57),(17,'Ada','Stron','Login','4e5a2893bdcc7d239c1db72e4c4ffbe4bea73174','',1,58);
/*!40000 ALTER TABLE `Uzytkownik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Zamowienie`
--

DROP TABLE IF EXISTS `Zamowienie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Zamowienie` (
  `idZamowienie` int(11) NOT NULL,
  `Data` varchar(45) DEFAULT NULL,
  `idUzytkownik` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Uzytkownik_idUzytkownik` int(11) NOT NULL,
  `MetodaPrzesylki_idMetodaPrzesylki` int(11) NOT NULL,
  `MetodaPlatnosci_idMetodaPlatnosci` int(11) NOT NULL,
  PRIMARY KEY (`idZamowienie`,`Uzytkownik_idUzytkownik`,`MetodaPrzesylki_idMetodaPrzesylki`,`MetodaPlatnosci_idMetodaPlatnosci`),
  KEY `fk_Zamowienie_Uzytkownik1_idx` (`Uzytkownik_idUzytkownik`),
  KEY `fk_Zamowienie_MetodaPrzesylki1_idx` (`MetodaPrzesylki_idMetodaPrzesylki`),
  KEY `fk_Zamowienie_MetodaPlatnosci1_idx` (`MetodaPlatnosci_idMetodaPlatnosci`),
  CONSTRAINT `fk_Zamowienie_MetodaPlatnosci1` FOREIGN KEY (`MetodaPlatnosci_idMetodaPlatnosci`) REFERENCES `MetodaPlatnosci` (`idMetodaPlatnosci`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zamowienie_MetodaPrzesylki1` FOREIGN KEY (`MetodaPrzesylki_idMetodaPrzesylki`) REFERENCES `MetodaPrzesylki` (`idMetodaPrzesylki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Zamowienie_Uzytkownik1` FOREIGN KEY (`Uzytkownik_idUzytkownik`) REFERENCES `Uzytkownik` (`idUzytkownik`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Zamowienie`
--

LOCK TABLES `Zamowienie` WRITE;
/*!40000 ALTER TABLE `Zamowienie` DISABLE KEYS */;
/*!40000 ALTER TABLE `Zamowienie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-16 16:27:16
