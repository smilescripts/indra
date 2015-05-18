-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2014 at 03:58 PM
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
  `IDASPEK` int(11) NOT NULL,
  `NAMA_ASPEK` varchar(255) DEFAULT NULL,
  `BOBOT` float DEFAULT NULL,
  `STATUSFAKTOR` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDASPEK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aspekpenilai`
--

INSERT INTO `aspekpenilai` (`IDASPEK`, `NAMA_ASPEK`, `BOBOT`, `STATUSFAKTOR`) VALUES
(1, 'IPK', 0.6, 'CF');

-- --------------------------------------------------------

--
-- Table structure for table `faktorpenilai`
--

CREATE TABLE IF NOT EXISTS `faktorpenilai` (
  `IDFAKTOR` int(11) NOT NULL,
  `IDPENILAIAN` int(11) NOT NULL,
  `IDASPEK` int(11) NOT NULL,
  `NAMA_FAKTOR` varchar(255) DEFAULT NULL,
  `BOBOTNILAI` varchar(255) DEFAULT NULL,
  `GAP` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDFAKTOR`),
  KEY `IDPENILAIAN` (`IDPENILAIAN`),
  KEY `IDASPEK` (`IDASPEK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktorpenilai`
--

INSERT INTO `faktorpenilai` (`IDFAKTOR`, `IDPENILAIAN`, `IDASPEK`, `NAMA_FAKTOR`, `BOBOTNILAI`, `GAP`) VALUES
(1, 1, 1, '<2.5', '1', 2);

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
('6311238', 1, 'b', 'Laki-Laki', 'Cimahi', 'b@gmail.com', '8789789723', '2011'),
('6311239', 1, 'Rika Kurniawati', 'Perempuan', 'Bandung', 'rika@gmail.com', '0857217987991', '2011'),
('6311289', 1, 'a', 'Perempuan', 'Jakarta', 'a@gmail.com', '898989889', '2011');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pendaftaranmahasiswa`
--

INSERT INTO `pendaftaranmahasiswa` (`IDDAFTAR`, `NRP`, `TANGGAL`, `FOTO`, `STATUS_PROSES`) VALUES
(1, '6311239', '2014-07-20', 'governor.jpg', 'Sedang Diproses'),
(2, '6311289', '2014-08-07', 'abcde.jpg', 'Sedang Diproses'),
(3, '6311238', '2014-08-07', 'bbde.jpg', 'Sedang Diproses');

-- --------------------------------------------------------

--
-- Table structure for table `penilaianmahasiswa`
--

CREATE TABLE IF NOT EXISTS `penilaianmahasiswa` (
  `IDPENILAIAN` int(11) NOT NULL,
  `IDDAFTAR` int(11) NOT NULL,
  `STATUS_PERSETUJUAN` varchar(255) DEFAULT NULL,
  `HISTORI` int(11) DEFAULT NULL,
  `TANGGAL_PENILAIAN` date DEFAULT NULL,
  `HASIL_PENILAIAN` float DEFAULT NULL,
  PRIMARY KEY (`IDPENILAIAN`),
  KEY `IDDAFTAR` (`IDDAFTAR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaianmahasiswa`
--

INSERT INTO `penilaianmahasiswa` (`IDPENILAIAN`, `IDDAFTAR`, `STATUS_PERSETUJUAN`, `HISTORI`, `TANGGAL_PENILAIAN`, `HASIL_PENILAIAN`) VALUES
(1, 1, 'null', 0, '0000-00-00', 0);

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
  ADD CONSTRAINT `faktorpenilai_ibfk_1` FOREIGN KEY (`IDPENILAIAN`) REFERENCES `penilaianmahasiswa` (`IDPENILAIAN`),
  ADD CONSTRAINT `faktorpenilai_ibfk_2` FOREIGN KEY (`IDASPEK`) REFERENCES `aspekpenilai` (`IDASPEK`);

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
