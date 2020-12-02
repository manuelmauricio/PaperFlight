
CREATE DATABASE IF NOT EXISTS  `paperflightdb`;
USE `paperflightdb`;

DROP TABLE IF EXISTS  `scoretable`;
CREATE TABLE `scoretable` (
  `score_id` int unsigned NOT NULL AUTO_INCREMENT,
  `score_total` float NOT NULL,
  `player_name` varchar(70)  NOT NULL,
  `level_number` tinyint NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
   PRIMARY KEY (`score_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;











