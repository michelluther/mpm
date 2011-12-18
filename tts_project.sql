-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema tts_project_work
--

CREATE DATABASE IF NOT EXISTS tts_project_work;
USE tts_project_work;
CREATE TABLE  `tts_project_work`.`tts_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL DEFAULT '0',
  `last_activity` varchar(10) NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Sessiondaten';
INSERT INTO `tts_project_work`.`tts_ci_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES 
 ('98b1ba2e2ffeeab06025497e00f9e34e','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:7.0.1) Gecko/2010','1317826677','a:2:{s:5:\"uname\";s:1:\"b\";s:9:\"logged_in\";b:1;}'),
 ('1a17d11f5d8d9ea4bc3716636bd6dce7','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:7.0.1) Gecko/2010','1318009394','a:2:{s:5:\"uname\";s:1:\"b\";s:9:\"logged_in\";b:1;}'),
 ('f41b3cf21aa5cf61809c3c8ced9ec004','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:7.0.1) Gecko/2010','1317938728','a:2:{s:5:\"uname\";s:1:\"b\";s:9:\"logged_in\";b:1;}'),
 ('b61394e4e78a52fd67c22530a4056de5','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:7.0.1) Gecko/2010','1317841459','a:2:{s:5:\"uname\";s:1:\"b\";s:9:\"logged_in\";b:1;}'),
 ('c548b039ef1a52d5e798b9ce3523de2b','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:7.0.1) Gecko/2010','1317833190','a:2:{s:5:\"uname\";s:1:\"b\";s:9:\"logged_in\";b:1;}');
CREATE TABLE  `tts_project_work`.`tts_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
INSERT INTO `tts_project_work`.`tts_customer` (`id`,`name`) VALUES 
 (1,'TT Knowledge Products'),
 (2,'PriceWaterhouseCoopers');
CREATE TABLE  `tts_project_work`.`tts_hours` (
  `project` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `date` date NOT NULL,
  `hours` smallint(6) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`project`,`position`,`employee`,`date`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `tts_project_work`.`tts_hours` (`project`,`position`,`employee`,`date`,`hours`,`description`) VALUES 
 (1,1,123,'2011-07-20',8,'Schreiben der Anwendung in schön'),
 (1,1,123,'2011-09-20',8,'Irgendwas getan');
CREATE TABLE  `tts_project_work`.`tts_people` (
  `pernr` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `uname` char(1) NOT NULL,
  PRIMARY KEY (`pernr`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Menschen im TTS-System';
INSERT INTO `tts_project_work`.`tts_people` (`pernr`,`first_name`,`last_name`,`uname`) VALUES 
 (123,'michel','luther','b');
CREATE TABLE  `tts_project_work`.`tts_project_person_assignments` (
  `project` int(11) NOT NULL,
  `person` int(11) NOT NULL,
  PRIMARY KEY (`project`,`person`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
INSERT INTO `tts_project_work`.`tts_project_person_assignments` (`project`,`person`) VALUES 
 (1,123),
 (2,123);
CREATE TABLE  `tts_project_work`.`tts_project_position` (
  `project` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `unit` tinyint(4) NOT NULL,
  PRIMARY KEY (`project`,`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Position f. Stundenerfassung';
INSERT INTO `tts_project_work`.`tts_project_position` (`project`,`id`,`name`,`unit`) VALUES 
 (1,2,'Reisekostenpauschale',2),
 (1,1,'Programmierung Senior',1),
 (2,2,'Projektleitung',1),
 (2,1,'Applikationsberatung',1);
CREATE TABLE  `tts_project_work`.`tts_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `customer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
INSERT INTO `tts_project_work`.`tts_projects` (`id`,`name`,`customer`) VALUES 
 (1,'TTKF Integration mit LSO',1),
 (2,'Referentenportal',2);
CREATE TABLE  `tts_project_work`.`tts_role_content` (
  `id` char(20) NOT NULL,
  `description` text NOT NULL,
  `navigation` tinyint(1) NOT NULL,
  `activity` char(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Role contents';
INSERT INTO `tts_project_work`.`tts_role_content` (`id`,`description`,`navigation`,`activity`) VALUES 
 ('resource_overview','Ressourcenüberblick',1,'mpm/resource_overview'),
 ('maintain_project','Projektplanung',1,'mpm/maintain_project'),
 ('maintain_hours_perso','Stunden erfassen',1,'mpm/maintain_hours_personal'),
 ('change_user','User ändern',1,'admin/change_user'),
 ('add_user','User anlegen',1,'admin/create_user'),
 ('project_work','Projektarbeit',0,'mpm/project_work'),
 ('mpm_home','Überblick',0,'mpm/home');
CREATE TABLE  `tts_project_work`.`tts_role_content_assignments` (
  `role_id` char(20) NOT NULL,
  `content_id` char(20) NOT NULL,
  `index` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`role_id`,`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Content of roles';
INSERT INTO `tts_project_work`.`tts_role_content_assignments` (`role_id`,`content_id`,`index`) VALUES 
 ('project_member','maintain_hours_perso',2),
 ('project_member','project_work',1),
 ('project_member','mpm_home',0);
CREATE TABLE  `tts_project_work`.`tts_role_user_assignments` (
  `role_id` char(20) NOT NULL,
  `uname` char(20) NOT NULL,
  PRIMARY KEY (`role_id`,`uname`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Role Assignments';
INSERT INTO `tts_project_work`.`tts_role_user_assignments` (`role_id`,`uname`) VALUES 
 ('project_manager','m'),
 ('project_member','b');
CREATE TABLE  `tts_project_work`.`tts_roles` (
  `role_id` char(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Roles';
INSERT INTO `tts_project_work`.`tts_roles` (`role_id`,`description`) VALUES 
 ('project_manager','Pojektleiter'),
 ('project_member','Projektmitglied'),
 ('administrator','Administrator'),
 ('team_lead','Team Lead');
CREATE TABLE  `tts_project_work`.`tts_units` (
  `id` tinyint(4) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Einheiten';
INSERT INTO `tts_project_work`.`tts_units` (`id`,`name`) VALUES 
 (1,'Stunden');
CREATE TABLE  `tts_project_work`.`tts_users` (
  `uname` char(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` text NOT NULL,
  `locked` tinyint(1) NOT NULL,
  `salt` char(10) NOT NULL,
  `failed_attempts` smallint(6) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Benutzer im TTS-System';
INSERT INTO `tts_project_work`.`tts_users` (`uname`,`date_created`,`password`,`locked`,`salt`,`failed_attempts`) VALUES 
 ('m','2011-06-30 18:35:33','c72b138341977362290cba9dd71f4793',0,'983619895',0),
 ('n','2011-06-30 18:38:56','ebeb18caf3ac8c8116bf0496ac913e4f',0,'141221003',0),
 ('b','2011-07-01 12:27:21','50b8f1337196b8037d8bae4aa364f7a2',0,'2081225274',0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
