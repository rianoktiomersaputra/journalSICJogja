-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2019 at 03:52 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sicjurnal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin1', '1234', 'admin'),
(2, 'admin2', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `nama_ortu` varchar(255) NOT NULL,
  `nohp_ortu` varchar(12) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_lengkap`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `Alamat`, `nama_ortu`, `nohp_ortu`, `sekolah`, `nis`, `jurusan`, `username`, `password`) VALUES
(15, 'Rian Oktio Mersa Putra', '085257718266', 'Jambi', '1996-10-18', 'laki-laki', 'Jalan Palagan Km. 10', 'Syafril Hadi', '081366390057', 'Universitas Islam Indonesia', '14523281', 'T. Informatika', 'rianoktiomp', 'rian'),
(16, 'Ulvi Zasvia', '08123456789', 'Jambi', '1997-11-03', 'laki-laki', 'Jl. Hos Cokroaminoto', 'Ermayati Arifin', '', 'Universitas Padjadjaran', '240513', 'Farmasi', 'ulvizasvia', 'ulvi');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_isi_jurnal`
--

CREATE TABLE `tabel_isi_jurnal` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `uraian` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('Proses','Disetujui') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_isi_jurnal`
--

INSERT INTO `tabel_isi_jurnal` (`id`, `id_siswa`, `tanggal`, `jam_mulai`, `jam_selesai`, `uraian`, `gambar`, `status`) VALUES
(1, 15, '2019-08-30', '16:00:00', '19:00:00', 'Memperbaiki website SIC Jurnal ', '30082019135133', 'Disetujui'),
(2, 16, '2019-08-30', '18:30:00', '19:00:00', 'Belanja kebutuhan SIC Jurnal', '30082019140758', 'Proses'),
(3, 15, '2019-08-30', '19:00:00', '20:30:00', 'Memperbaiki Webiste SIC Jurnal', '30082019152453', 'Proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tabel_isi_jurnal`
--
ALTER TABLE `tabel_isi_jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tabel_isi_jurnal`
--
ALTER TABLE `tabel_isi_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_isi_jurnal`
--
ALTER TABLE `tabel_isi_jurnal`
  ADD CONSTRAINT `tabel_isi_jurnal_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
