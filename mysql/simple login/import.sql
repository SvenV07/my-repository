DROP DATABASE IF EXISTS `netland`;
CREATE DATABASE `netland`;

USE `netland`;

CREATE TABLE `gebruikers` (
   id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(255) NOT NULL,
   password VARCHAR(255) NOT NULL
);

INSERT INTO `gebruikers` (`username`, `password`) VALUES 
('Admin', 'Password');
