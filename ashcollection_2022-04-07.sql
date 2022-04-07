# ************************************************************
# Sequel Ace SQL dump
# Version 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: ashcollection
# Generation Time: 2022-04-07 15:39:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table drivers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `drivers`;

CREATE TABLE `drivers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  `wins` int(4) DEFAULT NULL,
  `poles` int(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `drivers` WRITE;
/*!40000 ALTER TABLE `drivers` DISABLE KEYS */;

INSERT INTO `drivers` (`id`, `name`, `wins`, `poles`, `image`)
VALUES
	(1,'Lewis Hamilton',100,101,'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Lewis_Hamilton_2016_Malaysia_2.jpg/440px-Lewis_Hamilton_2016_Malaysia_2.jpg'),
	(2,'Max Verstappen',17,11,'https://upload.wikimedia.org/wikipedia/commons/7/75/Max_Verstappen_2017_Malaysia_3.jpg'),
	(3,'Jim Clark',25,33,'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Jim_Clark_1965.jpg/440px-Jim_Clark_1965.jpg'),
	(4,'Jochen Rindt',6,10,'https://upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Rindt_at_1970_Dutch_Grand_Prix_%282C%29.jpg/500px-Rindt_at_1970_Dutch_Grand_Prix_%282C%29.jpg'),
	(5,'James Hunt',10,14,'https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/J._Hunt_in_1977_%28cropped%29.jpg/440px-J._Hunt_in_1977_%28cropped%29.jpg');

/*!40000 ALTER TABLE `drivers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
