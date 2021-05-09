-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2021 at 10:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovamedika`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `nama`, `email`, `wilayah`, `password`, `level`) VALUES
(1, 'rudi', 'admin@admin.com', 'bogor', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Pegawai'),
(6, 'Alfian', 'alfian2@gmail.com', 'Malang', '82bd39df864bb7162b616f478d3f5fff9bef2941d27e2575b89dd17af6939355', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `jenis_obat` varchar(255) NOT NULL,
  `kegunaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `jenis_obat`, `kegunaan`) VALUES
(5, 'Paracetamol', 'Analgesik', 'meredakan rasa nyeri ringan hingga sedang akibat sakit kepala, sakit gigi, menstruasi, sakit punggung, hingga terkilir'),
(6, 'Decongestan', 'Pelega pernapasan', 'Meredakan hidung tersumbat yang disebabkan oleh flu, pilek, sinusitis, atau alergi');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `umur` int(11) NOT NULL,
  `wilayah` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `obat` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama_pasien`, `umur`, `wilayah`, `diagnosa`, `nama_dokter`, `obat`, `tindakan`, `pembayaran`, `tanggal_daftar`) VALUES
(6, 'Ucup', 22, 'Bogor', 'Nyeri', 'Budi', 'Ibu Profen', 'Pemberian obat anti nyeri', 'Sukses', '2021-05-12'),
(8, 'Ujang', 23, 'Malang', 'Demam', '', '', 'Pemberian obat analgesik', 'Pending', '2021-05-11'),
(9, 'Adam', 22, 'Bogor', 'Batuk', 'Natali', 'OBH', 'pemberian obat batuk', 'Sukses', '2021-05-08'),
(10, 'Rina', 23, 'Malang', 'Nyeri', '', '', '', 'Sukses', '2021-05-08'),
(11, 'Sabrina', 21, 'Malang', 'Pusing', 'Iwan', 'Paramex', 'Pemberian Obat Pereda Pusing', 'Pending', '2021-05-12'),
(12, 'Riski', 32, 'Bogor', 'Radang tenggorokan', '', '', '', 'Pending', '2021-05-12'),
(13, 'Farid', 18, 'Malang', 'Panas dalam', '', '', '', 'Pending', '2021-05-11'),
(14, 'Nia', 28, 'Bogor', 'Demam', '', '', 'Pemberian obat analgesik', 'Pending', '2021-05-11'),
(15, 'Dini', 22, 'Malang', 'Pusing', '', '', '', 'Sukses', '2021-05-03'),
(16, 'Novi', 45, 'Bogor', 'Pusing', '', '', '', 'Pending', '2021-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `penanganan` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `penanganan`, `diagnosa`) VALUES
(1, 'Pemberian obat analgesik', 'Demam'),
(3, 'Pemberian obat analgesik', 'Migrain');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id` int(11) NOT NULL,
  `nama_wilayah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id`, `nama_wilayah`) VALUES
(2, 'Bogor'),
(3, 'Malang'),
(4, 'Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
