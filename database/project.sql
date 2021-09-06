# Host: localhost  (Version 5.5.5-10.4.19-MariaDB)
# Date: 2021-09-06 00:30:46
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tbl_student"
#

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_number` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT '',
  `class` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tbl_student"
#

INSERT INTO `tbl_student` VALUES (7,1001001,'BAYU','10','MM'),(10,1001002,'Nina','10','MM');

#
# Structure for table "tbl_users"
#

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `reg_number` int(11) NOT NULL DEFAULT 0,
  `level` varchar(255) NOT NULL DEFAULT 'siswa',
  `login_attemp` int(1) NOT NULL DEFAULT 5,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

#
# Data for table "tbl_users"
#

INSERT INTO `tbl_users` VALUES (1,'Bayu','$2y$10$55sQd2OG30BCU/JJ5zMU7.VWkiA7I4CGQrjDPxZFy/sMjQ1c4WP2u',1001001,'admin',5),(4,'Nina','$2y$10$XWaqMZA72Z/YpPz3f3iScO4Izi87WI69cD/Xkwfzlm.EBi49/cpSm',1001002,'siswa',5);
