-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2015 at 09:08 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
  `IDBEASISWA` int(11) NOT NULL,
  `NAMA_ASPEK` varchar(255) DEFAULT NULL,
  `STATUSFAKTOR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aspekpenilai`
--

INSERT INTO `aspekpenilai` (`IDASPEK`, `IDBEASISWA`, `NAMA_ASPEK`, `STATUSFAKTOR`) VALUES
(1, 2, 'IPK', 'NCF'),
(2, 2, 'Penghasilan Orang Tua', 'NSF'),
(3, 1, 'Rekening Listrik', 'NCF');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beasiswa`
--

CREATE TABLE IF NOT EXISTS `detail_beasiswa` (
`ID` int(10) NOT NULL,
  `IDINFO` int(11) DEFAULT NULL,
  `IDASPEK` int(11) NOT NULL,
  `BOBOT` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `detail_beasiswa`
--

INSERT INTO `detail_beasiswa` (`ID`, `IDINFO`, `IDASPEK`, `BOBOT`) VALUES
(1, 1, 2, 2),
(2, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `faktorpenilai`
--

CREATE TABLE IF NOT EXISTS `faktorpenilai` (
`IDFAKTOR` int(11) NOT NULL,
  `IDASPEK` int(11) NOT NULL,
  `NAMA_FAKTOR` varchar(255) DEFAULT NULL,
  `BOBOTNILAI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `faktorpenilai`
--

INSERT INTO `faktorpenilai` (`IDFAKTOR`, `IDASPEK`, `NAMA_FAKTOR`, `BOBOTNILAI`) VALUES
(1, 1, '<2.5', '1'),
(2, 1, '>2.75 <= 3', '2'),
(3, 1, '>3 <= 3.5', '3'),
(4, 1, '>3.5 ', '4'),
(5, 2, '<100.000', '4'),
(7, 2, '>3.000.000 <= 5.000.000', '2'),
(8, 2, '>5.000.000', '1'),
(9, 3, '<100.000', '4'),
(11, 3, '>300.000 <=500.000', '2'),
(12, 3, '>500.000', '1'),
(13, 3, '>100.000 <=300.000', '3');

-- --------------------------------------------------------

--
-- Table structure for table `infobeasiswa`
--

CREATE TABLE IF NOT EXISTS `infobeasiswa` (
`IDINFO` int(11) NOT NULL,
  `IDBEASISWA` int(11) NOT NULL,
  `IDPETUGAS` int(11) NOT NULL,
  `NAMA_BEASISWA` varchar(50) NOT NULL,
  `KUOTA` int(11) NOT NULL,
  `DESKRIPSIINFO` varchar(500) DEFAULT NULL,
  `TANGGAL_AWAL` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `FOTO` varchar(10) DEFAULT NULL,
  `STATUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `infobeasiswa`
--

INSERT INTO `infobeasiswa` (`IDINFO`, `IDBEASISWA`, `IDPETUGAS`, `NAMA_BEASISWA`, `KUOTA`, `DESKRIPSIINFO`, `TANGGAL_AWAL`, `TANGGAL_AKHIR`, `FOTO`, `STATUS`) VALUES
(1, 2, 5, 'GUBERNUR', 1, 'shdjshfkjsdfkasnfsalndlksndlkasnkldnsand,ncvx,bvjhdsvkdsnkdsnflsdnflksd', '2015-04-28', '2015-04-30', '1.jpg', 'aktif'),
(2, 1, 5, 'WALIKOTA', 1, 'shdjshfkjsdfkasnfsalndlksndlkasnkldnsand,ncvx,bvjhdsvkdsnkdsnflsdnflksd', '2015-04-28', '2015-04-30', '', 'aktif'),
(3, 1, 5, 'Instansi Swasta', 1, 'sadhsaghasgdjas', '2015-04-29', '2015-04-30', '', 'tidak aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jenisbeasiswa`
--

CREATE TABLE IF NOT EXISTS `jenisbeasiswa` (
  `IDBEASISWA` int(11) NOT NULL,
  `NAMA_BEASISWA` varchar(255) DEFAULT NULL,
  `NCF` int(11) DEFAULT NULL,
  `NSF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisbeasiswa`
--

INSERT INTO `jenisbeasiswa` (`IDBEASISWA`, `NAMA_BEASISWA`, `NCF`, `NSF`) VALUES
(1, 'Tidak Mampu', 60, 40),
(2, 'Berprestasi', 70, 30);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` char(14) NOT NULL,
  `IDPRODI` int(11) NOT NULL,
  `NAMAMHS` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `ALAMATMHS` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELPONMHS` varchar(20) DEFAULT NULL,
  `PASSWORDMHS` varchar(255) DEFAULT NULL,
  `SEMESTER` int(11) NOT NULL,
  `TAHUN_AJARAN` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `IDPRODI`, `NAMAMHS`, `JK`, `ALAMATMHS`, `EMAIL`, `TELPONMHS`, `PASSWORDMHS`, `SEMESTER`, `TAHUN_AJARAN`) VALUES
('12345678912345', 1, 'Nunu', 'laki-laki', 'garut', 'nunu@gmail.com', '12345678', '2011', 8, '2014-2015'),
('41032122121030', 1, 'Fajar Abby Hydro Prasetyo', 'laki-laki', 'Bandung', 'fajar@gmail.com', '123456', '2011', 8, '2014-2015');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaranmahasiswa`
--

CREATE TABLE IF NOT EXISTS `pendaftaranmahasiswa` (
`IDDAFTAR` int(11) NOT NULL,
  `NIM` char(14) NOT NULL,
  `IDINFO` int(11) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `STATUS_PROSES` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1505002 ;

--
-- Dumping data for table `pendaftaranmahasiswa`
--

INSERT INTO `pendaftaranmahasiswa` (`IDDAFTAR`, `NIM`, `IDINFO`, `TANGGAL`, `FOTO`, `STATUS_PROSES`) VALUES
(1505001, '41032122121030', 1, '2015-05-01', '41032122121030.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `penilaianmahasiswa`
--

CREATE TABLE IF NOT EXISTS `penilaianmahasiswa` (
`IDPENILAIAN` int(11) NOT NULL,
  `IDPETUGAS` int(11) NOT NULL,
  `IDDAFTAR` int(11) NOT NULL,
  `STATUS_PERSETUJUAN` varchar(255) DEFAULT NULL,
  `TANGGAL_PENILAIAN` date DEFAULT NULL,
  `HASIL_PENILAIAN` float DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `penilaianmahasiswa`
--

INSERT INTO `penilaianmahasiswa` (`IDPENILAIAN`, `IDPETUGAS`, `IDDAFTAR`, `STATUS_PERSETUJUAN`, `TANGGAL_PENILAIAN`, `HASIL_PENILAIAN`) VALUES
(2, 5, 1505001, '', '2015-05-02', 3.85);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
`IDPETUGAS` int(11) NOT NULL,
  `NAMAPETUGAS` varchar(255) DEFAULT NULL,
  `JKPETUGAS` varchar(255) DEFAULT NULL,
  `ALAMATPETUGAS` varchar(255) DEFAULT NULL,
  `EMAILPETUGAS` varchar(255) DEFAULT NULL,
  `TELPONPETUGAS` varchar(255) DEFAULT NULL,
  `PASSWORDPETUGAS` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`IDPETUGAS`, `NAMAPETUGAS`, `JKPETUGAS`, `ALAMATPETUGAS`, `EMAILPETUGAS`, `TELPONPETUGAS`, `PASSWORDPETUGAS`) VALUES
(1, 'fajar', 'laki-laki', 'margahayu', 'fajar@gmail.com', '091111111', 'fajar'),
(5, 'indra', 'laki-laki', 'antapani', 'indra@gmail.com', '123456789', 'indra');

-- --------------------------------------------------------

--
-- Table structure for table `petunjuk_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `petunjuk_pendaftaran` (
  `tata_cara` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
`IDPRODI` int(11) NOT NULL,
  `NAMA_PRODI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`IDPRODI`, `NAMA_PRODI`) VALUES
(1, 'Matametika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspekpenilai`
--
ALTER TABLE `aspekpenilai`
 ADD PRIMARY KEY (`IDASPEK`), ADD KEY `IDBEASISWA` (`IDBEASISWA`);

--
-- Indexes for table `detail_beasiswa`
--
ALTER TABLE `detail_beasiswa`
 ADD PRIMARY KEY (`ID`), ADD KEY `IDBEASISWA` (`IDINFO`), ADD KEY `IDINFO` (`IDINFO`), ADD KEY `IDBEASISWA_2` (`IDASPEK`), ADD KEY `IDBEASISWA_3` (`IDASPEK`);

--
-- Indexes for table `faktorpenilai`
--
ALTER TABLE `faktorpenilai`
 ADD PRIMARY KEY (`IDFAKTOR`), ADD KEY `IDASPEK` (`IDASPEK`);

--
-- Indexes for table `infobeasiswa`
--
ALTER TABLE `infobeasiswa`
 ADD PRIMARY KEY (`IDINFO`), ADD KEY `IDBEASISWA` (`IDBEASISWA`), ADD KEY `IDPETUGAS` (`IDPETUGAS`);

--
-- Indexes for table `jenisbeasiswa`
--
ALTER TABLE `jenisbeasiswa`
 ADD PRIMARY KEY (`IDBEASISWA`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
 ADD PRIMARY KEY (`NIM`), ADD KEY `IDPRODI` (`IDPRODI`);

--
-- Indexes for table `pendaftaranmahasiswa`
--
ALTER TABLE `pendaftaranmahasiswa`
 ADD PRIMARY KEY (`IDDAFTAR`), ADD KEY `NRP` (`NIM`), ADD KEY `IDINFO` (`IDINFO`);

--
-- Indexes for table `penilaianmahasiswa`
--
ALTER TABLE `penilaianmahasiswa`
 ADD PRIMARY KEY (`IDPENILAIAN`), ADD KEY `IDDAFTAR` (`IDDAFTAR`), ADD KEY `IDPETUGAS` (`IDPETUGAS`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
 ADD PRIMARY KEY (`IDPETUGAS`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`IDPRODI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspekpenilai`
--
ALTER TABLE `aspekpenilai`
MODIFY `IDASPEK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_beasiswa`
--
ALTER TABLE `detail_beasiswa`
MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faktorpenilai`
--
ALTER TABLE `faktorpenilai`
MODIFY `IDFAKTOR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `infobeasiswa`
--
ALTER TABLE `infobeasiswa`
MODIFY `IDINFO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pendaftaranmahasiswa`
--
ALTER TABLE `pendaftaranmahasiswa`
MODIFY `IDDAFTAR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1505002;
--
-- AUTO_INCREMENT for table `penilaianmahasiswa`
--
ALTER TABLE `penilaianmahasiswa`
MODIFY `IDPENILAIAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
MODIFY `IDPETUGAS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
MODIFY `IDPRODI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aspekpenilai`
--
ALTER TABLE `aspekpenilai`
ADD CONSTRAINT `aspekpenilai_ibfk_1` FOREIGN KEY (`IDBEASISWA`) REFERENCES `jenisbeasiswa` (`IDBEASISWA`);

--
-- Constraints for table `detail_beasiswa`
--
ALTER TABLE `detail_beasiswa`
ADD CONSTRAINT `detail_beasiswa_ibfk_1` FOREIGN KEY (`IDINFO`) REFERENCES `infobeasiswa` (`IDINFO`),
ADD CONSTRAINT `detail_beasiswa_ibfk_2` FOREIGN KEY (`IDASPEK`) REFERENCES `aspekpenilai` (`IDASPEK`);

--
-- Constraints for table `faktorpenilai`
--
ALTER TABLE `faktorpenilai`
ADD CONSTRAINT `faktorpenilai_ibfk_2` FOREIGN KEY (`IDASPEK`) REFERENCES `aspekpenilai` (`IDASPEK`);

--
-- Constraints for table `infobeasiswa`
--
ALTER TABLE `infobeasiswa`
ADD CONSTRAINT `infobeasiswa_ibfk_1` FOREIGN KEY (`IDBEASISWA`) REFERENCES `jenisbeasiswa` (`IDBEASISWA`),
ADD CONSTRAINT `infobeasiswa_ibfk_2` FOREIGN KEY (`IDPETUGAS`) REFERENCES `petugas` (`IDPETUGAS`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`IDPRODI`) REFERENCES `prodi` (`IDPRODI`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaranmahasiswa`
--
ALTER TABLE `pendaftaranmahasiswa`
ADD CONSTRAINT `pendaftaranmahasiswa_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
ADD CONSTRAINT `pendaftaranmahasiswa_ibfk_2` FOREIGN KEY (`IDINFO`) REFERENCES `infobeasiswa` (`IDINFO`);

--
-- Constraints for table `penilaianmahasiswa`
--
ALTER TABLE `penilaianmahasiswa`
ADD CONSTRAINT `penilaianmahasiswa_ibfk_1` FOREIGN KEY (`IDDAFTAR`) REFERENCES `pendaftaranmahasiswa` (`IDDAFTAR`),
ADD CONSTRAINT `penilaianmahasiswa_ibfk_2` FOREIGN KEY (`IDPETUGAS`) REFERENCES `petugas` (`IDPETUGAS`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
