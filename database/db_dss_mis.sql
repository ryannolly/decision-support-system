-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 27, 2021 at 01:24 AM
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
(1, '107519651', 4),
(2, '98851627', 4),
(3, '105350190', 4),
(4, '98988968', 4),
(5, '84322819', 4),
(6, '94415015', 4),
(7, '91418428', 2),
(8, '93090617', 4),
(9, '98910810', 4),
(10, '96035988', 4),
(11, '82490622', 4),
(12, '92189146', 4),
(13, '91799868', 5);

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
('1208175703090001', '91418428', 'Karina Fatika Sari Saragih', 'Pematangsiantar', 'Laki-laki', '2010-06-17'),
('1208282902080002', '84322819', 'Exel Haiqal Azmy', 'Pematangsiantar', 'Perempuan', '2010-04-04'),
('1272060202090003', '98988968', 'Ahmad Fahrezi', 'Pematangsiantar', 'Laki-laki', '2010-12-12'),
('1272060609090002', '98910810', 'Muhammad Nur Ramadhan', 'Pematangsiantar', 'Perempuan', '2012-08-23'),
('1272060906090002', '96035988', 'Naek Martua Ambarita', 'Pematangsiantar', 'Perempuan', '2011-10-29'),
('1272061207100001', '105350190', 'Ahmad Da\'iman Manurung', 'Pematangsiantar', 'Perempuan', '2011-09-04'),
('1272061609090002', '98851627', 'Adlyzsan Ramadhan', 'Pematangsiantar', 'Laki-laki', '2012-01-01'),
('1272062708090001', '93090617', 'Misko Kurniawan', 'Pematangsiantar', 'Perempuan', '2011-03-22'),
('1272064511090001', '94415015', 'Hanita Triyani', 'Karang Bangun', 'Laki-laki', '2010-02-25'),
('1272065011090001', '92189146', 'Nurul Isabelah', 'Pematangsiantar', 'Laki-laki', '2011-01-25'),
('1272076208080002', '82490622', 'Naysila Alifa Wibawani', 'Pematangsiantar', 'Laki-laki', '2011-03-22'),
('1403091503100001', '107519651', 'Abiyyu Zaidan Firas Batubara', 'Pematangsiantar', 'Laki-laki', '2011-12-23'),
('2171128807090003', '91799868', 'Revi Mariska', 'Pematangsiantar', 'laki-laki', '2011-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_keagamaan`
--

CREATE TABLE `tbl_nilai_keagamaan` (
  `id` int(10) NOT NULL,
  `nisn` varchar(36) NOT NULL,
  `mapel` varchar(225) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilai_keagamaan`
--

INSERT INTO `tbl_nilai_keagamaan` (`id`, `nisn`, `mapel`, `nilai`) VALUES
(1, '107519651', 'Al-Qur\'an Hadist', 81),
(2, '107519651', 'Akidah Akhlak', 81),
(3, '107519651', 'Fikih', 82),
(5, '107519651', 'Bahasa Arab', 84),
(6, '98851627', 'Al-Qur\'an Hadist', 80),
(7, '98851627', 'Akidah Akhlak', 62),
(8, '98851627', 'Fikih', 80),
(10, '98851627', 'Bahasa Arab', 79),
(11, '105350190', 'Al-Qur\'an Hadist', 79),
(12, '105350190', 'Akidah Akhlak', 78),
(13, '105350190', 'Fikih', 79),
(15, '105350190', 'Bahasa Arab', 82),
(16, '98988968', 'Al-Qur\'an Hadist', 86),
(17, '98988968', 'Akidah Akhlak', 84),
(18, '98988968', 'Fikih', 86),
(20, '98988968', 'Bahasa Arab', 68),
(21, '84322819', 'Al-Qur\'an Hadist', 80.35),
(22, '84322819', 'Akidah Akhlak', 81.6),
(23, '84322819', 'Fikih', 79.1667),
(25, '84322819', 'Bahasa Arab', 80.95),
(26, '94415015', 'Al-Qur\'an Hadist', 77.1333),
(27, '94415015', 'Akidah Akhlak', 76.8833),
(28, '94415015', 'Fikih', 78.8167),
(30, '94415015', 'Bahasa Arab', 80.8333),
(31, '91418428', 'Al-Qur\'an Hadist', 76.9667),
(32, '91418428', 'Akidah Akhlak', 75.7167),
(33, '91418428', 'Fikih', 77.2333),
(35, '91418428', 'Bahasa Arab', 80.2333),
(36, '93090617', 'Al-Qur\'an Hadist', 79.7),
(37, '93090617', 'Akidah Akhlak', 80.45),
(38, '93090617', 'Fikih', 81.2167),
(40, '93090617', 'Bahasa Arab', 83.5167),
(41, '98910810', 'Al-Qur\'an Hadist', 80.75),
(42, '98910810', 'Akidah Akhlak', 81),
(43, '98910810', 'Fikih', 81.6),
(45, '98910810', 'Bahasa Arab', 80.6833),
(46, '96035988', 'Al-Qur\'an Hadist', 83.3167),
(47, '96035988', 'Akidah Akhlak', 80.3167),
(48, '96035988', 'Fikih', 83.5167),
(50, '96035988', 'Bahasa Arab', 82.7167),
(51, '82490622', 'Al-Qur\'an Hadist', 77.2333),
(52, '82490622', 'Akidah Akhlak', 75.7333),
(53, '82490622', 'Fikih', 78.5333),
(55, '82490622', 'Bahasa Arab', 80.2),
(56, '92189146', 'Al-Qur\'an Hadist', 81.5),
(57, '92189146', 'Akidah Akhlak', 80),
(58, '92189146', 'Fikih', 80.1167),
(60, '92189146', 'Bahasa Arab', 81.1667),
(61, '91799868', 'Al-Qur\'an Hadist', 84.5333),
(62, '91799868', 'Akidah Akhlak', 86.7),
(63, '91799868', 'Fikih', 85.5),
(65, '91799868', 'Bahasa Arab', 85.0833);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_non_keagamaan`
--

CREATE TABLE `tbl_nilai_non_keagamaan` (
  `id` int(10) NOT NULL,
  `nisn` varchar(36) NOT NULL,
  `mapel` varchar(225) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_nilai_non_keagamaan`
--

INSERT INTO `tbl_nilai_non_keagamaan` (`id`, `nisn`, `mapel`, `nilai`) VALUES
(1, '107519651', 'PKN', 86.6667),
(2, '107519651', 'Bahasa Indonesia', 88.6667),
(3, '107519651', 'Matematika', 83),
(4, '107519651', 'IPA', 89.5),
(5, '107519651', 'IPS', 87.0833),
(6, '107519651', 'Seni Budaya', 88.8333),
(7, '107519651', 'Penjasorkes', 89.3),
(8, '107519651', 'Bahasa Inggris', 85.1667),
(9, '98851627', 'PKN', 85.5),
(10, '98851627', 'Bahasa Indonesia', 84),
(11, '98851627', 'Matematika', 81.5),
(12, '98851627', 'IPA', 85.1667),
(13, '98851627', 'IPS', 86.0833),
(14, '98851627', 'Seni Budaya', 79.5),
(15, '98851627', 'Penjasorkes', 85.3333),
(16, '98851627', 'Bahasa Inggris', 80.5),
(17, '105350190', 'PKN', 84.5),
(18, '105350190', 'Bahasa Indonesia', 83.25),
(19, '105350190', 'Matematika', 83.8333),
(20, '105350190', 'IPA', 87.3333),
(21, '105350190', 'IPS', 82.5833),
(22, '105350190', 'Seni Budaya', 83.8333),
(23, '105350190', 'Penjasorkes', 88.6667),
(24, '105350190', 'Bahasa Inggris', 81.6667),
(25, '98988968', 'PKN', 89),
(26, '98988968', 'Bahasa Indonesia', 88.5),
(27, '98988968', 'Matematika', 82.8333),
(28, '98988968', 'IPA', 91),
(29, '98988968', 'IPS', 87.5),
(30, '98988968', 'Seni Budaya', 81.6667),
(31, '98988968', 'Penjasorkes', 91),
(32, '98988968', 'Bahasa Inggris', 86),
(33, '84322819', 'PKN', 87.5333),
(34, '84322819', 'Bahasa Indonesia', 85.7833),
(35, '84322819', 'Matematika', 82.5),
(36, '84322819', 'IPA', 90.1667),
(37, '84322819', 'IPS', 86.4167),
(38, '84322819', 'Seni Budaya', 84.85),
(39, '84322819', 'Penjasorkes', 84.7),
(40, '84322819', 'Bahasa Inggris', 80.45),
(41, '94415015', 'PKN', 82.3333),
(42, '94415015', 'Bahasa Indonesia', 86.0833),
(43, '94415015', 'Matematika', 77.5),
(44, '94415015', 'IPA', 82.3333),
(45, '94415015', 'IPS', 79.4167),
(46, '94415015', 'Seni Budaya', 78.4167),
(47, '94415015', 'Penjasorkes', 84.25),
(48, '94415015', 'Bahasa Inggris', 80),
(49, '91418428', 'PKN', 83.9167),
(50, '91418428', 'Bahasa Indonesia', 82.6667),
(51, '91418428', 'Matematika', 78.9167),
(52, '91418428', 'IPA', 81.6667),
(53, '91418428', 'IPS', 79.8333),
(54, '91418428', 'Seni Budaya', 84.5),
(55, '91418428', 'Penjasorkes', 84.5),
(56, '91418428', 'Bahasa Inggris', 80.25),
(57, '93090617', 'PKN', 89.5),
(58, '93090617', 'Bahasa Indonesia', 88.25),
(59, '93090617', 'Matematika', 83.4167),
(60, '93090617', 'IPA', 88.6667),
(61, '93090617', 'IPS', 87.5),
(62, '93090617', 'Seni Budaya', 84.3333),
(63, '93090617', 'Penjasorkes', 87.1667),
(64, '93090617', 'Bahasa Inggris', 82.4167),
(65, '98910810', 'PKN', 83.1667),
(66, '98910810', 'Bahasa Indonesia', 82.6667),
(67, '98910810', 'Matematika', 83.6667),
(68, '98910810', 'IPA', 84.1667),
(69, '98910810', 'IPS', 84.3333),
(70, '98910810', 'Seni Budaya', 82.1667),
(71, '98910810', 'Penjasorkes', 83.25),
(72, '98910810', 'Bahasa Inggris', 78),
(73, '96035988', 'PKN', 85),
(74, '96035988', 'Bahasa Indonesia', 85),
(75, '96035988', 'Matematika', 82.5),
(76, '96035988', 'IPA', 86.3333),
(77, '96035988', 'IPS', 84.0833),
(78, '96035988', 'Seni Budaya', 86.1667),
(79, '96035988', 'Penjasorkes', 87.8333),
(80, '96035988', 'Bahasa Inggris', 83.75),
(81, '82490622', 'PKN', 84.2667),
(82, '82490622', 'Bahasa Indonesia', 82.0833),
(83, '82490622', 'Matematika', 76.1167),
(84, '82490622', 'IPA', 77.7667),
(85, '82490622', 'IPS', 77.7833),
(86, '82490622', 'Seni Budaya', 83.4333),
(87, '82490622', 'Penjasorkes', 80.2667),
(88, '82490622', 'Bahasa Inggris', 78.2667),
(89, '92189146', 'PKN', 84.0833),
(90, '92189146', 'Bahasa Indonesia', 88.6667),
(91, '92189146', 'Matematika', 81.1667),
(92, '92189146', 'IPA', 86.3333),
(93, '92189146', 'IPS', 86.0833),
(94, '92189146', 'Seni Budaya', 85.3333),
(95, '92189146', 'Penjasorkes', 82),
(96, '92189146', 'Bahasa Inggris', 80.5),
(97, '91799868', 'PKN', 85.5),
(98, '91799868', 'Bahasa Indonesia', 85.8667),
(99, '91799868', 'Matematika', 84.3333),
(100, '91799868', 'IPA', 84.8333),
(101, '91799868', 'IPS', 84.9167),
(102, '91799868', 'Seni Budaya', 91.5),
(103, '91799868', 'Penjasorkes', 88.0833),
(104, '91799868', 'Bahasa Inggris', 84.25);

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
(1, '107519651', 'B', 'A', 'B', 'B'),
(2, '98851627', 'B', 'B', 'B', 'B'),
(3, '105350190', 'B', 'B', 'B', 'B'),
(4, '98988968', 'B', 'B', 'B', 'B'),
(5, '84322819', 'B', 'B', 'B', 'B'),
(6, '94415015', 'B', 'B', 'B', 'B'),
(7, '91418428', 'B', 'B', 'B', 'B'),
(8, '93090617', 'B', 'B', 'B', 'B'),
(9, '98910810', 'B', 'B', 'B', 'B'),
(10, '96035988', 'B', 'B', 'B', 'B'),
(11, '82490622', 'B', 'B', 'B', 'B'),
(12, '92189146', 'B', 'B', 'B', 'B'),
(13, '91799868', 'A', 'A', 'B', 'A');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_nilai_keagamaan`
--
ALTER TABLE `tbl_nilai_keagamaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_nilai_non_keagamaan`
--
ALTER TABLE `tbl_nilai_non_keagamaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_nilai_perilaku`
--
ALTER TABLE `tbl_nilai_perilaku`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
