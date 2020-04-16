-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2020 at 03:18 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karangtaruna`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `NIK` varchar(16) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `tempatlahir` varchar(50) NOT NULL,
  `tanggallahir` date NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `rw` varchar(5) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `img` text,
  `jabatan` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`NIK`, `nama_anggota`, `tempatlahir`, `tanggallahir`, `tel`, `email`, `alamat`, `rw`, `rt`, `img`, `jabatan`) VALUES
('1147011470114700', 'Arnoldpo', 'Tanjung Duren', '2020-02-22', '081211382132', 'M@ngkok.ku', 'Jalan Tanjung Duren Raya No.359c', '02', '02', 'images.jpg', 2),
('1222222222222222', 'Kuyang', 'Kalimantan', '1970-01-01', '666', 'Kuyang@kalimantan.com', 'Borneo island', '02', '01', 'baby-boy.png', 3),
('1231231231231231', 'asd', 'asd', '2020-02-06', '123141415151', '1sd@sf.s', 'asd', '', '', 'kisspng-businessperson-partnership-company-paper-corporati-5b76cf7aeaf8b4.8952654615345130189625.jpg', 1),
('1233192949912323', 'Jamal Barbar', 'Banten', '2000-03-09', '09301992919', 'jamal@bar.bar', 'asd', '', '', '69010188_471169846947197_598207564031229926_n.jpg', 3),
('2016230000000000', 'Anggini Eka Putri', 'Kalapa Dua', '1998-01-01', '088888888888', 'Angginiep@gmail.com', 'Tinggal dikosan atau di Cibitung', '02', '01', 'ff2f4d29-93c0-44ac-818b-38816deb73a5.jpg', 4),
('3270303049291101', 'Siti Aisyah', 'Bekasi', '2020-02-27', '09099000900', 'aisyah@bule.com', 'Rawa Badak', '', '', 'WhatsApp Image 2019-08-08 at 10.45.09 AM.jpeg', 2),
('3275022706100002', 'Jeannyla Rasyida', 'Jakarta', '2010-06-27', '083892828192', 'jeannylarasyida@gmail.com', 'Jl. Lele No. 65', '01', '01', '10150623_602806736481224_1886962607022713508_n.jpg', 4),
('3275061112990001', 'Nugroho Adi Pratomo', 'Bekasi', '1998-12-11', '087888769662', 'nugroho.adi@gmail.com', 'Rawa Bugel', '01', '01', 'Snapshot 6 (11-9-2015 15-51)-crop.png', 4),
('4204204204204200', 'Pink Guy', 'US', '2009-02-04', '1039301', 'Pinkguy@filthyFrank.tv', 'Shut The Fuck Up', '', '', 'RWYquxnYdozJBBz-400x400-noPad.jpg', 1),
('6969696696969666', 'Rizky Aefarlava', 'Fucek', '2020-02-28', '086969696969', 'Rizky@fu.cek', 'Fucek buat Rizky Aefarlava', '', '', 'Fucek Man Rizky Aefarlava.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `email` varchar(70) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`email`, `timestamp`) VALUES
('pottsed@protonmail.ch', '2020-03-17 10:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(30) NOT NULL,
  `nama_jabatan` varchar(40) NOT NULL,
  `job_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `job_desc`) VALUES
(2, 'Anggota', 'Pengikut yang ngikut'),
(3, 'admin', 'Mengelola data'),
(4, 'Humas', 'Seorang humas yang profesional terkadang juga ikut serta dalam sebuah kegiatan dengan membawa produk atau brand organisasi. Hal tersebut pasti akan semakin memberi pengaruh positif pada nama baik organisasi.');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(10) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `privasi` enum('Internal','Eksternal') NOT NULL,
  `deskripsi` text NOT NULL,
  `NIK` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal`, `mulai`, `selesai`, `status`, `privasi`, `deskripsi`, `NIK`) VALUES
(1, 'Rapat  Bulanan', '2020-03-07', '09:00:00', '13:00:00', 'Reserved', 'Internal', 'Rapat Bulanan dalam rangka evaluasi kinerja pengurus dan anggota karang taruna Ujung Menteng, Jakarta Timur', '3270303049291101'),
(2, 'Haul', '2020-03-04', '08:00:00', '12:00:00', 'Reserved', 'Eksternal', 'asdadadasdasdasdasdasdadasd aasdasdasdasdsadasdadasdasdadasdasdada dasdasdddasdasdasdasdasdasdasdasdasdasda dasda wdsdasdsxawdsdad', '1231231231231231'),
(3, 'besokan', '2020-03-03', '08:00:00', '18:00:00', 'Booked', 'Internal', '....................................................................................................', '3270303049291101'),
(4, 'Evaluasi Kinerja Bulan Maret', '2020-03-31', '09:00:00', '15:00:00', 'Booked', 'Internal', 'Evaluasi Kinerja Bulan Maret. Demi meningkatkan performa kerja pengurus', '1233192949912323');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(10) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `tel` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `keperluan`, `tanggal`, `mulai`, `selesai`, `status`, `deskripsi`, `nama_peminjam`, `tel`) VALUES
(1, 'Hajatan', '2020-03-04', '08:00:00', '15:00:00', 'Reserved', 'asal nikah', 'Ronald', '14045'),
(2, 'Arisan akbar keluarga besar Al Bahri', '2020-03-14', '09:00:00', '21:00:00', 'Booked', 'Arisan akbar keluarga besar Al Bahri sekaligus halal bihalal menjelang Ramadhan mulia', 'Jamal Bahri', '08938892910'),
(3, '', '0000-00-00', '00:00:00', '00:00:00', 'Booked', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rt`
--

CREATE TABLE `rt` (
  `id` int(10) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rt`
--

INSERT INTO `rt` (`id`, `rt`, `rw`) VALUES
(3, '01', '01'),
(4, '01', '02'),
(5, '02', '02');

-- --------------------------------------------------------

--
-- Table structure for table `rw`
--

CREATE TABLE `rw` (
  `rw` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rw`
--

INSERT INTO `rw` (`rw`) VALUES
('01'),
('02');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(10) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level` varchar(15) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `last_activity`) VALUES
(1, 'admin', 'admin', 'admin', '3', '2020-03-17 12:00:15'),
(2, 'Jamal Barbar', '1233192949912323', '1233192949912323', '3', '2020-03-03 02:32:32'),
(3, 'Pink Guy', '4204204204204200', '4204204204204200', '1', '2020-03-03 02:12:11'),
(4, 'Rizky Aefarlava', '6969696696969666', '6969696696969666', '2', '2020-03-03 02:12:11'),
(5, 'Arnoldpo', '1147011470114700', '1147011470114700', '2', '2020-03-04 00:29:41'),
(6, 'Nugroho Adi Pratomo', '3275061112990001', '3275061112990001', '4', '2020-03-17 12:24:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `rt`
--
ALTER TABLE `rt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rw`
--
ALTER TABLE `rw`
  ADD PRIMARY KEY (`rw`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rt`
--
ALTER TABLE `rt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
