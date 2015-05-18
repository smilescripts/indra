DROP TABLE histori;

CREATE TABLE `histori` (
  `nrp` char(7) NOT NULL,
  `histori` int(11) NOT NULL,
  PRIMARY KEY (`nrp`),
  CONSTRAINT `histori_ibfk_1` FOREIGN KEY (`nrp`) REFERENCES `pendaftaranmahasiswa` (`NRP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO histori VALUES("6311238","1");



DROP TABLE infobeasiswa;

CREATE TABLE `infobeasiswa` (
  `IDINFO` int(11) NOT NULL,
  `IDBEASISWA` int(11) NOT NULL,
  `IDPETUGAS` int(11) NOT NULL,
  `TANGGAL_AWAL` date DEFAULT NULL,
  `TANGGAL_AKHIR` date DEFAULT NULL,
  `infobeasiswa` varchar(111) NOT NULL,
  PRIMARY KEY (`IDINFO`),
  KEY `IDBEASISWA` (`IDBEASISWA`),
  KEY `IDPETUGAS` (`IDPETUGAS`),
  CONSTRAINT `infobeasiswa_ibfk_2` FOREIGN KEY (`IDPETUGAS`) REFERENCES `petugas` (`IDPETUGAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO infobeasiswa VALUES("1","1","4","2014-06-02","2014-07-01","syarat Yang harus dikumpulkan paling lambat dari tanggal");



DROP TABLE jenisbeasiswa;

CREATE TABLE `jenisbeasiswa` (
  `IDBEASISWA` int(11) NOT NULL,
  `NAMA_BEASISWA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDBEASISWA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE jurusan;

CREATE TABLE `jurusan` (
  `IDJURUSAN` int(11) NOT NULL AUTO_INCREMENT,
  `IDPRODI` int(11) NOT NULL,
  `NAMA_JURUSAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDJURUSAN`),
  KEY `IDPRODI` (`IDPRODI`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`IDPRODI`) REFERENCES `prodi` (`IDPRODI`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO jurusan VALUES("1","1","Teknik Informatika");



DROP TABLE kelas;

CREATE TABLE `kelas` (
  `IDKELAS` int(11) NOT NULL,
  `NAMA_KELAS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDKELAS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO kelas VALUES("1","3TI5");



DROP TABLE mahasiswa;

CREATE TABLE `mahasiswa` (
  `NRP` char(7) NOT NULL,
  `IDPRODI` int(11) NOT NULL,
  `NAMAMHS` varchar(255) DEFAULT NULL,
  `JK` varchar(255) DEFAULT NULL,
  `ALAMATMHS` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TELPONMHS` varchar(20) DEFAULT NULL,
  `PASSWORDMHS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`NRP`),
  KEY `IDPRODI` (`IDPRODI`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`IDPRODI`) REFERENCES `prodi` (`IDPRODI`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO mahasiswa VALUES("6311238","1","Fajar","laki-laki","margahayu","fajar99@fellow.lpkia.ac.id","0857217986","2011");



DROP TABLE pendaftaranmahasiswa;

CREATE TABLE `pendaftaranmahasiswa` (
  `IDDAFTAR` int(11) NOT NULL AUTO_INCREMENT,
  `NRP` char(7) NOT NULL,
  `TANGGAL` date DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `STATUS_PROSES` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDDAFTAR`),
  KEY `NRP` (`NRP`),
  CONSTRAINT `pendaftaranmahasiswa_ibfk_1` FOREIGN KEY (`NRP`) REFERENCES `mahasiswa` (`NRP`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO pendaftaranmahasiswa VALUES("1","6311238","2014-08-13","petugas.png","Disetujui");



DROP TABLE penilaianmahasiswa;

CREATE TABLE `penilaianmahasiswa` (
  `IDPENILAIAN` int(11) NOT NULL AUTO_INCREMENT,
  `IDDAFTAR` int(11) NOT NULL,
  `STATUS_PERSETUJUAN` varchar(255) DEFAULT NULL,
  `TANGGAL_PENILAIAN` date DEFAULT NULL,
  `HASIL_PENILAIAN` float DEFAULT NULL,
  PRIMARY KEY (`IDPENILAIAN`),
  KEY `IDDAFTAR` (`IDDAFTAR`),
  CONSTRAINT `penilaianmahasiswa_ibfk_1` FOREIGN KEY (`IDDAFTAR`) REFERENCES `pendaftaranmahasiswa` (`IDDAFTAR`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO penilaianmahasiswa VALUES("1","1","Disetujui","2014-08-13","4.35");



DROP TABLE petugas;

CREATE TABLE `petugas` (
  `IDPETUGAS` int(11) NOT NULL AUTO_INCREMENT,
  `NAMAPETUGAS` varchar(255) DEFAULT NULL,
  `JKPETUGAS` varchar(255) DEFAULT NULL,
  `ALAMATPETUGAS` varchar(255) DEFAULT NULL,
  `EMAILPETUGAS` varchar(255) DEFAULT NULL,
  `TELPONPETUGAS` varchar(255) DEFAULT NULL,
  `PASSWORDPETUGAS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDPETUGAS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO petugas VALUES("1","fajar","laki-laki","margahayu","fajar@gmail.com","091111111","fajar");
INSERT INTO petugas VALUES("2","Ika","Perempuan","Bandung										","ika@gmail.com","123451","ika");
INSERT INTO petugas VALUES("3","lpkia","Perempuan","Soekarno Hatta","lpkia@gmail.com","989898089","adminjaya");
INSERT INTO petugas VALUES("4","asd","Perempuan","Soekarno Hatta","lpkia@gmail.com","9767678","jayaadmin");



DROP TABLE petunjuk_pendaftaran;

CREATE TABLE `petunjuk_pendaftaran` (
  `tata_cara` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE prodi;

CREATE TABLE `prodi` (
  `IDPRODI` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA_PRODI` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDPRODI`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO prodi VALUES("1","Manajemen Informatika");



DROP TABLE semester;

CREATE TABLE `semester` (
  `IDSEMESTER` int(11) NOT NULL AUTO_INCREMENT,
  `NRP` char(7) NOT NULL,
  `IDKELAS` int(11) NOT NULL,
  `NAMA_SEMESTER` varchar(255) DEFAULT NULL,
  `TAHUNAJARAN` varchar(20) DEFAULT NULL,
  `IDJURUSAN` int(11) NOT NULL,
  PRIMARY KEY (`IDSEMESTER`),
  KEY `IDKELAS` (`IDKELAS`),
  KEY `IDJURUSAN` (`IDJURUSAN`),
  KEY `NRP` (`NRP`),
  CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`IDKELAS`) REFERENCES `kelas` (`IDKELAS`),
  CONSTRAINT `semester_ibfk_2` FOREIGN KEY (`IDJURUSAN`) REFERENCES `jurusan` (`IDJURUSAN`) ON UPDATE NO ACTION,
  CONSTRAINT `semester_ibfk_3` FOREIGN KEY (`NRP`) REFERENCES `mahasiswa` (`NRP`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO semester VALUES("1","6311238","1","Ganjil","2014","1");



