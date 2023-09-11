/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_sekolah
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_sekolah` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `db_sekolah`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

INSERT  INTO `admin`(`id`,`email`,`username`,`password`) VALUES 
(1,'irvanda@gmail.com','irvanda','123'),
(4,'siapa@gmail.com','admin','202cb962ac59075b964b07152d234b70'),
(7,'idnssquad89@gmail.com','admin','202cb962ac59075b964b07152d234b70');

/*Table structure for table `alokasi_mapel` */

DROP TABLE IF EXISTS `alokasi_mapel`;

CREATE TABLE `alokasi_mapel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_mapel` INT(11) DEFAULT NULL,
  `id_kelas` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mapel` (`id_mapel`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `alokasi_mapel_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`),
  CONSTRAINT `alokasi_mapel_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `alokasi_mapel` */

INSERT  INTO `alokasi_mapel`(`id`,`id_mapel`,`id_kelas`) VALUES 
(1,1,1),
(3,2,1),
(4,2,3);

/*Table structure for table `guru` */

DROP TABLE IF EXISTS `guru`;

CREATE TABLE `guru` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_guru` VARCHAR(255) DEFAULT NULL,
  `nik` VARCHAR(255) DEFAULT NULL,
  `gender` VARCHAR(255) DEFAULT NULL,
  `id_mapel` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mapel` (`id_mapel`),
  CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `guru` */

INSERT  INTO `guru`(`id`,`nama_guru`,`nik`,`gender`,`id_mapel`) VALUES 
(1,'Test','123','-',1),
(2,'Guru 2','0797665','-',2);

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `tingkat_kelas` VARCHAR(255) DEFAULT NULL,
  `jurusan_kelas` VARCHAR(255) DEFAULT NULL,
  `id_sekolah` INT(11) DEFAULT NULL,
  `id_guru_walikelas` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sekolah` (`id_sekolah`),
  KEY `id_walikelas` (`id_guru_walikelas`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id`),
  CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_guru_walikelas`) REFERENCES `guru` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `kelas` */

INSERT  INTO `kelas`(`id`,`tingkat_kelas`,`jurusan_kelas`,`id_sekolah`,`id_guru_walikelas`) VALUES 
(1,'XII','TKJ',1,1),
(3,'XII','TBSM',1,2);

/*Table structure for table `mapel` */

DROP TABLE IF EXISTS `mapel`;

CREATE TABLE `mapel` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_mapel` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `mapel` */

INSERT  INTO `mapel`(`id`,`nama_mapel`) VALUES 
(1,'IPA'),
(2,'Matematika');

/*Table structure for table `sekolah` */

DROP TABLE IF EXISTS `sekolah`;

CREATE TABLE `sekolah` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_sekolah` VARCHAR(255) DEFAULT NULL,
  `alamat_sekolah` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sekolah` */

INSERT  INTO `sekolah`(`id`,`nama_sekolah`,`alamat_sekolah`) VALUES 
(1,'SMK Bina Nusantara','Jl. Kemantren Raya, Jawa Tengah.'),
(15,'SMP Negeri 13 Semarang','123');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama_siswa` VARCHAR(255) DEFAULT NULL,
  `nisn` VARCHAR(255) DEFAULT NULL,
  `gender` VARCHAR(255) DEFAULT NULL,
  `id_kelas` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kelas` (`id_kelas`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `siswa` */

INSERT  INTO `siswa`(`id`,`nama_siswa`,`nisn`,`gender`,`id_kelas`) VALUES 
(1,'Secondta Ardiansyah','0986323','Laki-Laki',1),
(2,'Irvanda Ibrahim','0815212','Laki-Laki',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
