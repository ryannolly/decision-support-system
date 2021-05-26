-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 26, 2021 at 08:21 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_dss_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id` int(10) NOT NULL,
  `nisn` varchar(36) NOT NULL,
  `nilai_absensi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id`, `nisn`, `nilai_absensi`) VALUES
(1, '0098851627', 5),
(2, '0107519651', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_siswa`
--

CREATE TABLE `tbl_data_siswa` (
  `induk` varchar(36) NOT NULL,
  `nisn` varchar(36) DEFAULT NULL,
  `nama_siswa` varchar(225) DEFAULT NULL,
  `tempat_lahir` varchar(225) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_data_siswa`
--

INSERT INTO `tbl_data_siswa` (`induk`, `nisn`, `nama_siswa`, `tempat_lahir`, `jenis_kelamin`, `tanggal_lahir`) VALUES
('1272061609090002', '0098851627', 'Adlyzsan Ramadhan', 'Pematangsiantar', 'Laki-laki', '2012-01-01'),
('1403091503100001', '0107519651', 'Abiyyu Zaidan Firas Batubara', 'Pematangsiantar', 'Laki-laki', '2011-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_keagamaan`
--

CREATE TABLE `tbl_nilai_keagamaan` (
  `id` int(10) NOT NULL,
  `nisn` varchar(36) NOT NULL,
  `mapel` varchar(225) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilai_keagamaan`
--

INSERT INTO `tbl_nilai_keagamaan` (`id`, `nisn`, `mapel`, `nilai`) VALUES
(1, '0098851627', 'Al-Qur\'an Hadist', 90),
(2, '0098851627', 'Akidah Ahlak', 90),
(3, '0098851627', 'Fikih', 90),
(4, '0098851627', 'SKI', 90),
(5, '0098851627', 'Bahasa Arab', 90),
(6, '0107519651', 'Al-Qur\'an Hadist', 80),
(7, '0107519651', 'Akidah Ahlak', 80),
(8, '0107519651', 'Fikih', 80),
(9, '0107519651', 'SKI', 80),
(10, '0107519651', 'Bahasa Arab', 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_non_keagamaan`
--

CREATE TABLE `tbl_nilai_non_keagamaan` (
  `id` int(10) NOT NULL,
  `nisn` varchar(36) NOT NULL,
  `mapel` varchar(225) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilai_non_keagamaan`
--

INSERT INTO `tbl_nilai_non_keagamaan` (`id`, `nisn`, `mapel`, `nilai`) VALUES
(1, '0098851627', 'PKN', 92),
(2, '0098851627', 'Bahasa Indonesia', 92),
(3, '0098851627', 'Matematika', 93),
(4, '0098851627', 'IPA', 93),
(5, '0098851627', 'IPS', 94),
(6, '0098851627', 'Seni Budaya', 94),
(7, '0098851627', 'Penjasorkes', 95),
(8, '0098851627', 'Bahasa Inggris', 95),
(9, '0107519651', 'PKN', 91),
(10, '0107519651', 'Bahasa Indonesia', 92),
(11, '0107519651', 'Matematika', 93),
(12, '0107519651', 'IPA', 94),
(13, '0107519651', 'IPS', 95),
(14, '0107519651', 'Seni Budaya', 96),
(15, '0107519651', 'Penjasorkes', 97),
(16, '0107519651', 'Bahasa Inggris', 98);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_perilaku`
--

CREATE TABLE `tbl_nilai_perilaku` (
  `id` int(10) NOT NULL,
  `nisn` varchar(36) NOT NULL,
  `nilai_kelakuan` varchar(1) NOT NULL,
  `nilai_kerajinan` varchar(1) NOT NULL,
  `nilai_kedisiplinan` varchar(1) NOT NULL,
  `nilai_kerapian` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilai_perilaku`
--

INSERT INTO `tbl_nilai_perilaku` (`id`, `nisn`, `nilai_kelakuan`, `nilai_kerajinan`, `nilai_kedisiplinan`, `nilai_kerapian`) VALUES
(3, '0107519651', 'A', 'B', 'A', 'A'),
(4, '0098851627', 'B', 'B', 'B', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `uuid` varchar(36) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `nama_admin` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `uuid`, `email`, `password`, `nama_admin`) VALUES
(1, '', 'rananda61@gmail.com', 'Password123', 'Ryan Ananda Nolly');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_siswa`
--
ALTER TABLE `tbl_data_siswa`
  ADD PRIMARY KEY (`induk`);

--
-- Indexes for table `tbl_nilai_keagamaan`
--
ALTER TABLE `tbl_nilai_keagamaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai_non_keagamaan`
--
ALTER TABLE `tbl_nilai_non_keagamaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai_perilaku`
--
ALTER TABLE `tbl_nilai_perilaku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_nilai_keagamaan`
--
ALTER TABLE `tbl_nilai_keagamaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_nilai_non_keagamaan`
--
ALTER TABLE `tbl_nilai_non_keagamaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_nilai_perilaku`
--
ALTER TABLE `tbl_nilai_perilaku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
