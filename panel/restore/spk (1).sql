-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2014 at 11:33 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspekpenilai`
--

CREATE TABLE IF NOT EXISTS `aspekpenilai` (
  `IDASPEK` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_ASPEK` varchar(255) DEFAULT NULL,
  `BOBOT` float DEFAULT NULL,
  `STATUSFAKTOR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDASPEK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aspekpenilai`
--

INSERT INTO `aspekpenilai` (`IDASPEK`, `NAMA_ASPEK`, `BOBOT`, `STATUSFAKTOR`) VALUES
(1, 'IPK', 0.6, 'NCF'),
(2, 'penghasilan_orangtua', 0.4, 'NSF'),
(3, 'rekening_listrik', 0.1, 'NCF');

-- --------------------------------------------------------

--
-- Table structure for table `faktorpenilai`
--

CREATE TABLE IF NOT EXISTS `faktorpenilai` (
  `IDFAKTOR` int(11) NOT NULL AUTO_INCREMENT,
  `IDASPEK` int(11) NOT NULL,
  `NAMA_FAKTOR` varchar(255) DEFAULT NULL,
  `BOBOTNILAI` varchar(255) DEFAULT NULL,
  `GAP` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDFAKTOR`),
  KEY `IDASPEK` (`IDASPEK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `faktorpenilai`
--

INSERT INTO `faktorpenilai` (`IDFAKTOR`, `IDASPEK`, `NAMA_FAKTOR`, `BOBOTNILAI`, `GAP`) VALUES
(1, 1, '<2.5', '1', 2),
(2, 1, '>2.75 <= 3', '2', 2),
(3, 1, '>3 <= 3.5', '3', 2),
(4, 1, '>3.5 ', '4', 2),
(5, 2, '<100.000', '4', 3),
(7, 2, '>3.000.000 <= 5.000.000', '2', 3),
(8, 2, '>5.000.000', '1', 3),
(9, 3, '<100.000', '4', 3),
(11, 3, '>300.000 <=500.000', '2', 3),
(12, 3, '>500.000', '1', 3),
(13, 3, '>100.000 <=300.000', '3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE IF NOT EXISTS `histori` (
  `nrp` char(7) NOT NULL,
  `histori` int(11) NOT NULL,
  PRIMARY KEY (`nrp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`nrp`, `histori`) VALUES
('6311239', 1);

-- --------------------------------------------------------

--
-- Table structure for table `infobeasiswa`
--

CREATE TABLE IF NOT EXISTS `infobeasiswa` (
  `IDINFO` int(11) NOT NULL,
  `IDBEASISWA` int(11) NOT NULL,
  `IDPETUGAS` int(11) NOT NULL,
  `DESKRIPSIINFO` varchar(500) DEFAULT NULL,
  `TANGGAL_AWAL` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  PRIMARY KEY (`IDINFO`),
  KEY `IDBEASISWA` (`IDBEASISWA`),
  KEY `IDPETUGAS` (`IDPETUGAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infobeasiswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `jenisbeasiswa`
--

CREATE TABLE IF NOT EXISTS `jenisbeasiswa` (
  `IDBEASISWA` int(11) NOT NULL,
  `NAMA_BEASISWA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDBEASISWA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisbeasiswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `IDJURUSAN` int(11) NOT NULL AUTO_INCREMENT,
  `IDPRODI` int(11) NOT NULL,
  `NAMA_JURUSAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDJURUSAN`),
  KEY `IDPRODI` (`IDPRODI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`IDJURUSAN`, `IDPRODI`, `NAMA_JURUSAN`) VALUES
(1, 1, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `IDKELAS` int(11) NOT NULL,
  `NAMA_KELAS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDKELAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`IDKELAS`, `NAMA_KELAS`) VALUES
(1, '3TI5');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NRP` char(7) NOT NULL,
  `IDPRODI` int(11) NOT NULL,
  `NAMAMHS` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `ALAMATMHS` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELPONMHS` varchar(20) DEFAULT NULL,
  `PASSWORDMHS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NRP`),
  KEY `IDPRODI` (`IDPRODI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP`, `IDPRODI`, `NAMAMHS`, `JK`, `ALAMATMHS`, `EMAIL`, `TELPONMHS`, `PASSWORDMHS`) VALUES
('6311239', 1, 'Fajar Abby Hydro Prasetyo', 'Laki-Laki', 'Bandung', 'fajar@gmail.com', '0857217987991', '2011');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `id_aspek` int(11) NOT NULL,
  `nrp` int(7) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_aspek` (`id_aspek`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_aspek`, `nrp`, `nilai`) VALUES
(1, 3, 6311238, '3.5'),
(2, 2, 6311238, '1000000'),
(3, 1, 6311238, '500.000');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranmahasiswa`
--

CREATE TABLE IF NOT EXISTS `pendaftaranmahasiswa` (
  `IDDAFTAR` int(11) NOT NULL AUTO_INCREMENT,
  `NRP` char(7) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `STATUS_PROSES` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDDAFTAR`),
  KEY `NRP` (`NRP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pendaftaranmahasiswa`
--

INSERT INTO `pendaftaranmahasiswa` (`IDDAFTAR`, `NRP`, `TANGGAL`, `FOTO`, `STATUS_PROSES`) VALUES
(1, '6311239', '2014-08-12', 'muri.jpg', 'Sedang Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `penilaianmahasiswa`
--

CREATE TABLE IF NOT EXISTS `penilaianmahasiswa` (
  `IDPENILAIAN` int(11) NOT NULL AUTO_INCREMENT,
  `IDDAFTAR` int(11) NOT NULL,
  `STATUS_PERSETUJUAN` varchar(255) DEFAULT NULL,
  `TANGGAL_PENILAIAN` date DEFAULT NULL,
  `HASIL_PENILAIAN` float DEFAULT NULL,
  PRIMARY KEY (`IDPENILAIAN`),
  KEY `IDDAFTAR` (`IDDAFTAR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `penilaianmahasiswa`
--


-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `IDPETUGAS` int(11) NOT NULL AUTO_INCREMENT,
  `NAMAPETUGAS` varchar(255) DEFAULT NULL,
  `JKPETUGAS` varchar(255) DEFAULT NULL,
  `ALAMATPETUGAS` varchar(255) DEFAULT NULL,
  `EMAILPETUGAS` varchar(255) DEFAULT NULL,
  `TELPONPETUGAS` varchar(255) DEFAULT NULL,
  `PASSWORDPETUGAS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDPETUGAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`IDPETUGAS`, `NAMAPETUGAS`, `JKPETUGAS`, `ALAMATPETUGAS`, `EMAILPETUGAS`, `TELPONPETUGAS`, `PASSWORDPETUGAS`) VALUES
(1, 'fajar', 'laki-laki', 'margahayu', 'fajar@gmail.com', '091111111', 'fajar'),
(2, 'Ika', 'Perempuan', 'Bandung										', 'ika@gmail.com', '123451', 'ika'),
(3, 'lpkia', 'Perempuan', 'Soekarno Hatta', 'lpkia@gmail.com', '989898089', 'adminjaya'),
(4, 'asd', 'Perempuan', 'Soekarno Hatta', 'lpkia@gmail.com', '9767678', 'jayaadmin');

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `petunjuk_pendaftaran` (
  `tata_cara` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petunjuk_pendaftaran`
--


-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `IDPRODI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PRODI` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDPRODI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`IDPRODI`, `NAMA_PRODI`) VALUES
(1, 'Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `IDSEMESTER` int(11) NOT NULL AUTO_INCREMENT,
  `NRP` char(7) NOT NULL,
  `IDKELAS` int(11) NOT NULL,
  `NAMA_SEMESTER` varchar(255) DEFAULT NULL,
  `TAHUNAJARAN` varchar(20) DEFAULT NULL,
  `IDJURUSAN` int(11) NOT NULL,
  PRIMARY KEY (`IDSEMESTER`),
  KEY `IDKELAS` (`IDKELAS`),
  KEY `IDJURUSAN` (`IDJURUSAN`),
  KEY `NRP` (`NRP`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`IDSEMESTER`, `NRP`, `IDKELAS`, `NAMA_SEMESTER`, `TAHUNAJARAN`, `IDJURUSAN`) VALUES
(1, '6311239', 1, 'genap', '2014', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktorpenilai`
--
ALTER TABLE `faktorpenilai`
  ADD CONSTRAINT `faktorpenilai_ibfk_2` FOREIGN KEY (`IDASPEK`) REFERENCES `aspekpenilai` (`IDASPEK`);

--
-- Constraints for table `histori`
--
ALTER TABLE `histori`
  ADD CONSTRAINT `histori_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `pendaftaranmahasiswa` (`NRP`);

--
-- Constraints for table `infobeasiswa`
--
ALTER TABLE `infobeasiswa`
  ADD CONSTRAINT `infobeasiswa_ibfk_1` FOREIGN KEY (`IDBEASISWA`) REFERENCES `jenisbeasiswa` (`IDBEASISWA`),
  ADD CONSTRAINT `infobeasiswa_ibfk_2` FOREIGN KEY (`IDPETUGAS`) REFERENCES `petugas` (`IDPETUGAS`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`IDPRODI`) REFERENCES `prodi` (`IDPRODI`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`IDPRODI`) REFERENCES `prodi` (`IDPRODI`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `aspekpenilai` (`IDASPEK`);

--
-- Constraints for table `pendaftaranmahasiswa`
--
ALTER TABLE `pendaftaranmahasiswa`
  ADD CONSTRAINT `pendaftaranmahasiswa_ibfk_1` FOREIGN KEY (`NRP`) REFERENCES `mahasiswa` (`NRP`);

--
-- Constraints for table `penilaianmahasiswa`
--
ALTER TABLE `penilaianmahasiswa`
  ADD CONSTRAINT `penilaianmahasiswa_ibfk_1` FOREIGN KEY (`IDDAFTAR`) REFERENCES `pendaftaranmahasiswa` (`IDDAFTAR`);

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`IDKELAS`) REFERENCES `kelas` (`IDKELAS`),
  ADD CONSTRAINT `semester_ibfk_2` FOREIGN KEY (`IDJURUSAN`) REFERENCES `jurusan` (`IDJURUSAN`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `semester_ibfk_3` FOREIGN KEY (`NRP`) REFERENCES `mahasiswa` (`NRP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
