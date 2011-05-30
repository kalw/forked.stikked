-- MySQL dump 10.13  Distrib 5.5.10, for osx10.6 (i386)
--
-- Host: localhost    Database: stikked
-- ------------------------------------------------------
-- Server version	5.5.10

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
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `session_data` text NOT NULL,
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `code` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES ('c','C'),('css','CSS'),('cpp','C++'),('html4strict','HTML (4 Strict)'),('java','Java'),('perl','Perl'),('php','PHP'),('python','Python'),('ruby','Ruby'),('text','Plain Text'),('asm','ASM (Nasm Syntax)'),('xhtml','XHTML'),('actionscript','Actionscript'),('ada','ADA'),('apache','Apache Log'),('applescript','AppleScript'),('autoit','AutoIT'),('bash','Bash'),('bptzbasic','BptzBasic'),('c_mac','C for Macs'),('csharp','C#'),('ColdFusion','coldfusion'),('delphi','Delphi'),('eiffel','Eiffel'),('fortran','Fortran'),('freebasic','FreeBasic'),('gml','GML'),('groovy','Groovy'),('inno','Inno'),('java5','Java 5'),('javascript','Javascript'),('latex','LaTeX'),('mirc','mIRC'),('mysql','MySQL'),('nsis','NSIS'),('objc','Objective C'),('ocaml','OCaml'),('oobas','OpenOffice BASIC'),('orcale8','Orcale 8 SQL'),('pascal','Pascal'),('plsql','PL/SQL'),('qbasic','Q(uick)BASIC'),('robots','robots.txt'),('scheme','Scheme'),('sdlbasic','SDLBasic'),('smalltalk','Smalltalk'),('smarty','Smarty'),('sql','SQL'),('tcl','TCL'),('vbnet','VB.NET'),('vb','Visual BASIC'),('winbatch','Winbatch'),('xml','XML'),('z80','z80 ASM');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pastes`
--

DROP TABLE IF EXISTS `pastes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pastes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `private` tinyint(1) NOT NULL,
  `paste` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `raw` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(10) NOT NULL,
  `expire` int(10) NOT NULL DEFAULT '0',
  `toexpire` tinyint(1) unsigned NOT NULL,
  `snipurl` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `replyto` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `name` (`name`,`title`,`raw`)
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pastes`
--

LOCK TABLES `pastes` WRITE;
/*!40000 ALTER TABLE `pastes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pastes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-05-30 22:39:39
