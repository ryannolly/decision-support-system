-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 19, 2021 at 11:00 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_dss_mis`
--

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
-- Indexes for table `tbl_data_siswa`
--
ALTER TABLE `tbl_data_siswa`
  ADD PRIMARY KEY (`induk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;