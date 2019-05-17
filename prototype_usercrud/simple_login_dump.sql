﻿--
-- Script was generated by Devart dbForge Studio for MySQL, Version 6.3.358.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 1/12/2017 12:25:17 PM
-- Server version: 5.5.50-0ubuntu0.12.04.1
-- Client version: 4.1
--


--
-- Disable foreign keys
--
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
--
-- Set SQL mode
--
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE simple_login;

--
-- Definition for table activity_log
--
DROP TABLE IF EXISTS activity_log;
CREATE TABLE activity_log (
  log_id INT(11) NOT NULL AUTO_INCREMENT,
  fk_user_id INT(11) NOT NULL,
  activity TEXT DEFAULT NULL,
  module VARCHAR(255) DEFAULT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (log_id),
  UNIQUE INDEX log_id (log_id),
  CONSTRAINT FK_activity_log_user_user_id FOREIGN KEY (fk_user_id)
    REFERENCES user(user_id) ON DELETE RESTRICT ON UPDATE RESTRICT
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 5461
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Definition for table user
--
DROP TABLE IF EXISTS user;
CREATE TABLE user (
  user_id INT(11) NOT NULL AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) DEFAULT NULL,
  name VARCHAR(50) DEFAULT NULL,
  role VARCHAR(25) NOT NULL,
  status TINYINT(1) DEFAULT 1,
  created_at DATETIME DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Dumping data for table activity_log
--
INSERT INTO activity_log VALUES
(1, 1, 'add new user user@gmail.com', 'User Management', '2017-01-12 04:14:54'),
(2, 1, 'update user user@gmail.com`s details (user@gmail.com to user@gmail.com, User 1 to User One,user to user)', 'User Management', '2017-01-12 04:21:55');

--
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'admin@admin.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'Admin', 'admin', 1, '2017-01-12 12:07:57', '2017-01-12 12:07:59'),
(2, 'user@gmail.com', 'f6fdffe48c908deb0f4c3bd36c032e72', 'User One', 'user', 1, '2017-01-12 04:14:51', '2017-01-12 04:23:26');

--
-- Restore previous SQL mode
--
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

--
-- Enable foreign keys
--
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
