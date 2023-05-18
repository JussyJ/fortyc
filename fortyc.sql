-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.4.28-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for fortyc
CREATE DATABASE IF NOT EXISTS `fortyc` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `fortyc`;


-- Dumping structure for procedure fortyc.getmsg
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `getmsg`()
BEGIN
SELECT * FROM message;
END//
DELIMITER ;


-- Dumping structure for table fortyc.logs
CREATE TABLE IF NOT EXISTS `logs` (
  `seqid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `action_details` longtext DEFAULT NULL,
  `action_by` varchar(50) DEFAULT NULL,
  `ipaddress` varchar(50) DEFAULT NULL,
  `rs` int(11) DEFAULT 1,
  PRIMARY KEY (`seqid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.


-- Dumping structure for table fortyc.message
CREATE TABLE IF NOT EXISTS `message` (
  `objid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime DEFAULT NULL,
  `createby` varchar(50) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `rs` int(11) DEFAULT 1,
  PRIMARY KEY (`objid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.


-- Dumping structure for table fortyc.user
CREATE TABLE IF NOT EXISTS `user` (
  `seqid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `hobby` longtext DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  `rs` varchar(50) DEFAULT '1',
  PRIMARY KEY (`seqid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Data exporting was unselected.


-- Dumping structure for procedure fortyc.userinfo
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `userinfo`(IN `pseqid` INT)
BEGIN

SELECT * from user where seqid = pseqid;

END//
DELIMITER ;


-- Dumping structure for procedure fortyc.userlogin
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `userlogin`(IN `pemail` LONGTEXT, IN `ppwd` LONGTEXT, IN `pactionby` LONGTEXT, IN `pipadd` LONGTEXT)
BEGIN

	SET @userlgn = (select seqid from user where email = pemail and password = MD5(ppwd) and rs = 1);
	
	IF @userlgn != '' THEN
		UPDATE user SET lastlogin = NOW() where seqid = @userlgn;
		INSERT INTO logs (datetime, action, action_details, action_by, ipaddress) VALUES (NOW(), 'LOGIN', CONCAT('LOGIN USER - ', pemail), pactionby, pipadd);
		select 'Successfully Login' as msg, 1 as rscode, @userlgn as uid;
	ELSE
		select 'Email andd Password Incorrct' as msg, 0 as rscode;
	END IF;
	
END//
DELIMITER ;


-- Dumping structure for procedure fortyc.usermngt
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `usermngt`(IN `spcat` INT, IN `pName` vARCHAR(50), IN `pEmail` vARCHAR(50), IN `pPwd` LONGTEXT, IN `pactionby` LONGTEXT, IN `pipadd` LONGTEXT)
BEGIN
	IF spcat = 1 THEN
		INSERT INTO user (name, email, password) VALUES (pName, pEmail, MD5(pPwd));
		INSERT INTO logs (datetime, action, action_details, action_by, ipaddress) VALUES (NOW(), 'CREATE', CONCAT('CREATE USER - ', pEmail), pactionby, pipadd);
		SELECT 'Successfully Submitted.' as msg;
	END IF;
END//
DELIMITER ;


-- Dumping structure for procedure fortyc.validateEmail
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `validateEmail`(IN `emailAdd` lONGTEXT)
BEGIN

		SET @isreg = (select COUNT(*) from user where email = emailAdd and rs = 1);
		
		if @isreg = 0 THEN
			SELECT '' as msg, 1 as rcode;
		ELSE
			select 'Already Registered!' as msg, 0 as rcode;
		END IF;

END//
DELIMITER ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
