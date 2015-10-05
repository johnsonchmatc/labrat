//Create database
create database labrat;

//Create table

CREATE TABLE `Assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` text,
  `AssetID` varchar(255) DEFAULT NULL,
  `SerialNumber` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);


