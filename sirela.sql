-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2022 pada 18.27
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirela`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `kode_kegiatan` varchar(40) NOT NULL,
  `nama_kegiatan` varchar(100) DEFAULT NULL,
  `kode_kegiatan_sub1` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`kode_kegiatan`, `nama_kegiatan`, `kode_kegiatan_sub1`) VALUES
('523111', 'Belanja Biaya Pemeliharaan Gedung', 'A'),
('523121', 'Belanja Biaya Pemeliharaan Peralatan dan Mesin', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_sub1`
--

CREATE TABLE `tb_kegiatan_sub1` (
  `kode_kegiatan_sub1` varchar(40) NOT NULL,
  `nama_kegiatan_sub1` varchar(100) DEFAULT NULL,
  `kode_kegiatan_sub2` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan_sub1`
--

INSERT INTO `tb_kegiatan_sub1` (`kode_kegiatan_sub1`, `nama_kegiatan_sub1`, `kode_kegiatan_sub2`) VALUES
('A', 'Pemeliharaan Sarana Perkantoran', '004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_sub2`
--

CREATE TABLE `tb_kegiatan_sub2` (
  `kode_kegiatan_sub2` varchar(40) NOT NULL,
  `nama_kegiatan_sub2` varchar(100) DEFAULT NULL,
  `kode_kegiatan_sub3` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan_sub2`
--

INSERT INTO `tb_kegiatan_sub2` (`kode_kegiatan_sub2`, `nama_kegiatan_sub2`, `kode_kegiatan_sub3`) VALUES
('004', 'Dukungan Operasional Penyelenggaraan Pendidikan', '2642.001,0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_sub3`
--

CREATE TABLE `tb_kegiatan_sub3` (
  `kode_kegiatan_sub3` varchar(40) NOT NULL,
  `nama_kegiatan_sub3` varchar(100) DEFAULT NULL,
  `kode_kegiatan_sub4` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan_sub3`
--

INSERT INTO `tb_kegiatan_sub3` (`kode_kegiatan_sub3`, `nama_kegiatan_sub3`, `kode_kegiatan_sub4`) VALUES
('2642.001,0001', 'Operasional dan Pemeliharaan Perkantoran', '2642,001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_sub4`
--

CREATE TABLE `tb_kegiatan_sub4` (
  `kode_kegiatan_sub4` varchar(40) NOT NULL,
  `nama_kegiatan_sub4` varchar(100) DEFAULT NULL,
  `kode_kegiatan_sub5` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan_sub4`
--

INSERT INTO `tb_kegiatan_sub4` (`kode_kegiatan_sub4`, `nama_kegiatan_sub4`, `kode_kegiatan_sub5`) VALUES
('2642,001', 'Layanan Perkantoran Satker', '2642');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_sub5`
--

CREATE TABLE `tb_kegiatan_sub5` (
  `kode_kegiatan_sub5` varchar(40) NOT NULL,
  `nama_kegiatan_sub5` varchar(100) DEFAULT NULL,
  `kode_kegiatan_sub6` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan_sub5`
--

INSERT INTO `tb_kegiatan_sub5` (`kode_kegiatan_sub5`, `nama_kegiatan_sub5`, `kode_kegiatan_sub6`) VALUES
('2642', 'Penyediaan Dana Bantuan Operasional untuk Perguruan Tinggi Negeri ', '01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan_sub6`
--

CREATE TABLE `tb_kegiatan_sub6` (
  `kode_kegiatan_sub6` varchar(40) NOT NULL,
  `nama_kegiatan_sub6` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_kegiatan_sub6`
--

INSERT INTO `tb_kegiatan_sub6` (`kode_kegiatan_sub6`, `nama_kegiatan_sub6`) VALUES
('01', 'Program Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_realisasi`
--

CREATE TABLE `tb_realisasi` (
  `kode_realisasi` int(7) NOT NULL,
  `kode_unit` int(4) DEFAULT NULL,
  `kode_akun` varchar(40) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `pagu` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL,
  `sisa_dana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_realisasi`
--

INSERT INTO `tb_realisasi` (`kode_realisasi`, `kode_unit`, `kode_akun`, `tahun`, `pagu`, `realisasi`, `sisa_dana`) VALUES
(11, 2, '523121', '2020', 5000000, 4500000, 500000),
(12, 2, '523121', '2020', 6000000, 4000000, 2000000),
(13, 2, '523111', '2020', 7500000, 5000000, 2500000),
(14, 1, '523111', '2020', 2000000, 1000000, 1000000),
(15, 1, '523111', '2020', 4000000, 2000000, 2000000);

--
-- Trigger `tb_realisasi`
--
DELIMITER $$
CREATE TRIGGER `revisi_anggaran` AFTER UPDATE ON `tb_realisasi` FOR EACH ROW BEGIN
INSERT INTO tb_revisi_anggaran (tgl_perubahan,kode_realisasi,kode_unit,kode_akun,tahun,pagu,pagu_baru,realisasi,realisasi_baru,sisa_dana,sisa_dana_baru)
VALUES (NOW(),NEW.kode_realisasi,NEW.kode_unit,NEW.kode_akun,NEW.tahun,OLD.pagu,NEW.pagu,OLD.realisasi,NEW.realisasi,OLD.sisa_dana,NEW.sisa_dana);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sisa_dana_insert` BEFORE INSERT ON `tb_realisasi` FOR EACH ROW BEGIN
	SET NEW.sisa_dana=IF(NEW.sisa_dana IS NULL, NEW.pagu - NEW.realisasi, NEW.sisa_dana);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sisa_dana_update` BEFORE UPDATE ON `tb_realisasi` FOR EACH ROW BEGIN
	SET NEW.sisa_dana=IF(NEW.sisa_dana <=> OLD.sisa_dana, NEW.pagu - NEW.realisasi, NEW.sisa_dana);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_revisi_anggaran`
--

CREATE TABLE `tb_revisi_anggaran` (
  `log_code` int(5) NOT NULL,
  `tgl_perubahan` date DEFAULT NULL,
  `kode_realisasi` int(7) DEFAULT NULL,
  `kode_unit` int(4) DEFAULT NULL,
  `kode_akun` varchar(40) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `pagu` int(11) DEFAULT NULL,
  `pagu_baru` int(11) DEFAULT NULL,
  `realisasi` int(11) DEFAULT NULL,
  `realisasi_baru` int(11) DEFAULT NULL,
  `sisa_dana` int(11) DEFAULT NULL,
  `sisa_dana_baru` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_revisi_anggaran`
--

INSERT INTO `tb_revisi_anggaran` (`log_code`, `tgl_perubahan`, `kode_realisasi`, `kode_unit`, `kode_akun`, `tahun`, `pagu`, `pagu_baru`, `realisasi`, `realisasi_baru`, `sisa_dana`, `sisa_dana_baru`) VALUES
(2, '2020-03-02', 11, 2, '523121', '2020', 5000000, 5000000, 4500000, 4800000, 500000, 200000),
(3, '2020-03-02', 11, 2, '523121', '2020', 5000000, 5000000, 4800000, 4500000, 200000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unit`
--

CREATE TABLE `tb_unit` (
  `kode_unit` int(4) NOT NULL,
  `unit_kerja` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_unit`
--

INSERT INTO `tb_unit` (`kode_unit`, `unit_kerja`) VALUES
(1, 'Umum'),
(2, 'SPI'),
(3, 'Akademik'),
(4, 'PPPM'),
(5, 'TM'),
(6, 'TE'),
(7, 'TI'),
(8, 'TPPL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(15) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `role` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `role`) VALUES
('abdau', '1234', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_realisasi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_realisasi` (
`Unit Kerja` varchar(25)
,`Kegiatan/ Akun` varchar(100)
,`Tahun` varchar(4)
,`Pagu (Sub Total)` decimal(32,0)
,`Realisasi (Sub Total)` decimal(32,0)
,`Sisa Dana (Sub Total)` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_revisi_anggaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_revisi_anggaran` (
`Tanggal Diubah` date
,`Unit Kerja` varchar(25)
,`Akun` varchar(100)
,`Tahun` varchar(4)
,`Pagu (Lama)` int(11)
,`Pagu (Baru)` int(11)
,`Realisasi (Lama)` int(11)
,`Realisasi (Baru)` int(11)
,`Sisa Dana (Lama)` int(11)
,`Sisa Dana (Baru)` int(11)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_realisasi`
--
DROP TABLE IF EXISTS `v_realisasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dau`@`%` SQL SECURITY DEFINER VIEW `v_realisasi`  AS  select `tb_unit`.`unit_kerja` AS `Unit Kerja`,`tb_kegiatan`.`nama_kegiatan` AS `Kegiatan/ Akun`,`tb_realisasi`.`tahun` AS `Tahun`,sum(`tb_realisasi`.`pagu`) AS `Pagu (Sub Total)`,sum(`tb_realisasi`.`realisasi`) AS `Realisasi (Sub Total)`,sum(`tb_realisasi`.`sisa_dana`) AS `Sisa Dana (Sub Total)` from ((`tb_realisasi` join `tb_kegiatan` on((`tb_realisasi`.`kode_akun` = `tb_kegiatan`.`kode_kegiatan`))) join `tb_unit` on((`tb_unit`.`kode_unit` = `tb_realisasi`.`kode_unit`))) group by `tb_unit`.`unit_kerja`,`tb_kegiatan`.`nama_kegiatan`,`tb_realisasi`.`tahun` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_revisi_anggaran`
--
DROP TABLE IF EXISTS `v_revisi_anggaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`dau`@`%` SQL SECURITY DEFINER VIEW `v_revisi_anggaran`  AS  select `tb_revisi_anggaran`.`tgl_perubahan` AS `Tanggal Diubah`,`tb_unit`.`unit_kerja` AS `Unit Kerja`,`tb_kegiatan`.`nama_kegiatan` AS `Akun`,`tb_revisi_anggaran`.`tahun` AS `Tahun`,`tb_revisi_anggaran`.`pagu` AS `Pagu (Lama)`,`tb_revisi_anggaran`.`pagu_baru` AS `Pagu (Baru)`,`tb_revisi_anggaran`.`realisasi` AS `Realisasi (Lama)`,`tb_revisi_anggaran`.`realisasi_baru` AS `Realisasi (Baru)`,`tb_revisi_anggaran`.`sisa_dana` AS `Sisa Dana (Lama)`,`tb_revisi_anggaran`.`sisa_dana_baru` AS `Sisa Dana (Baru)` from ((`tb_revisi_anggaran` join `tb_unit` on((`tb_revisi_anggaran`.`kode_unit` = `tb_unit`.`kode_unit`))) join `tb_kegiatan` on((`tb_revisi_anggaran`.`kode_akun` = `tb_kegiatan`.`kode_kegiatan`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`kode_kegiatan`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_sub1`
--
ALTER TABLE `tb_kegiatan_sub1`
  ADD PRIMARY KEY (`kode_kegiatan_sub1`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_sub2`
--
ALTER TABLE `tb_kegiatan_sub2`
  ADD PRIMARY KEY (`kode_kegiatan_sub2`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_sub3`
--
ALTER TABLE `tb_kegiatan_sub3`
  ADD PRIMARY KEY (`kode_kegiatan_sub3`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_sub4`
--
ALTER TABLE `tb_kegiatan_sub4`
  ADD PRIMARY KEY (`kode_kegiatan_sub4`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_sub5`
--
ALTER TABLE `tb_kegiatan_sub5`
  ADD PRIMARY KEY (`kode_kegiatan_sub5`) USING BTREE;

--
-- Indexes for table `tb_kegiatan_sub6`
--
ALTER TABLE `tb_kegiatan_sub6`
  ADD PRIMARY KEY (`kode_kegiatan_sub6`) USING BTREE;

--
-- Indexes for table `tb_realisasi`
--
ALTER TABLE `tb_realisasi`
  ADD PRIMARY KEY (`kode_realisasi`) USING BTREE;

--
-- Indexes for table `tb_revisi_anggaran`
--
ALTER TABLE `tb_revisi_anggaran`
  ADD PRIMARY KEY (`log_code`) USING BTREE;

--
-- Indexes for table `tb_unit`
--
ALTER TABLE `tb_unit`
  ADD PRIMARY KEY (`kode_unit`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_realisasi`
--
ALTER TABLE `tb_realisasi`
  MODIFY `kode_realisasi` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_revisi_anggaran`
--
ALTER TABLE `tb_revisi_anggaran`
  MODIFY `log_code` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_unit`
--
ALTER TABLE `tb_unit`
  MODIFY `kode_unit` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
