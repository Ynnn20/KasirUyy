-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 08:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_order`
--

CREATE TABLE `tb_detail_order` (
  `id_dorder` int(11) NOT NULL,
  `check_available` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `keterangan_dorder` text DEFAULT NULL,
  `jumlah_dorder` int(11) NOT NULL,
  `hartot_dorder` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_dorder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_detail_order`
--

INSERT INTO `tb_detail_order` (`id_dorder`, `check_available`, `id_order`, `id_masakan`, `keterangan_dorder`, `jumlah_dorder`, `hartot_dorder`, `id_user`, `status_dorder`) VALUES
(98, 1, 'ORD0001', 29, '', 2, 40000, 2, 1),
(99, 1, 'ORD0001', 18, '', 2, 10000, 2, 1),
(100, 2, 'ORD0002', 31, '', 3, 66000, 2, 1),
(101, 2, 'ORD0002', 17, '', 3, 30000, 2, 1),
(102, 3, 'ORD0003', 30, '', 3, 60000, 2, 1),
(103, 3, 'ORD0003', 19, '', 3, 15000, 2, 1),
(104, 4, 'ORD0004', 30, '', 3, 60000, 2, 1),
(105, 4, 'ORD0004', 18, '', 3, 21000, 2, 1),
(107, 5, 'ORD0005', 13, 'bagian paha atas\r\n', 1, 30000, 2, 1),
(108, 6, 'ORD0006', 14, '', 1, 40000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, 'Administrator'),
(2, 'Waiter'),
(3, 'Kasir'),
(4, 'Owner'),
(5, 'Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masakan`
--

CREATE TABLE `tb_masakan` (
  `id_masakan` int(11) NOT NULL,
  `kategori_masakan` varchar(128) NOT NULL,
  `nama_masakan` varchar(128) NOT NULL,
  `harga_masakan` int(128) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_masakan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_masakan`
--

INSERT INTO `tb_masakan` (`id_masakan`, `kategori_masakan`, `nama_masakan`, `harga_masakan`, `foto`, `status_masakan`) VALUES
(12, 'Makanan', 'Ayam Geprek', 25000, '27022020052629yuk-buat-ayam-geprek-pedas-cocok-untuk-buka-puasa-bareng-keluarga-z1VHhnEl4n.jpg', 1),
(13, 'Makanan', 'Ayam Bakar', 30000, '27022020052639bakar.jpg', 1),
(14, 'Makanan', 'Ayam Betutu', 40000, '27022020052709vetutu.jpg', 1),
(15, 'Makanan', 'Ayam Goreng', 20000, '27022020052721goreng.png', 1),
(16, 'Minuman', 'Jus Mangga', 10000, '27022020052834mangga.jpg', 1),
(17, 'Minuman', 'Jus Alpukat', 10000, '27022020052842alpukat.webp', 1),
(18, 'Minuman', 'Es Teh ', 7000, '27022020052850esteh.png', 1),
(19, 'Minuman', 'Teh Panas', 5000, '27022020052903tehpanas.jpg', 1),
(20, 'Minuman', 'Jus Jeruk', 10000, '27022020052912jus-jeruk.jpg', 1),
(21, 'Makanan', 'Ayam Penyet', 25000, '27022020052734penyet.jpg', 1),
(22, 'Makanan', 'Ayam Taliwang', 35000, '29022020063639taliwang.jpg', 1),
(23, 'Makanan', 'Ayam Teriyaki', 30000, '29022020063702teriyaki.jpg', 1),
(24, 'Makanan', 'Ayam Rica-Rica', 33000, '29022020063741rica.jpg', 1),
(25, 'Minuman', 'Jus Jambu', 10000, '29022020064540jambu.jpg', 1),
(26, 'Minuman', 'Jus Strawberri', 10000, '29022020064611stro.jpg', 1),
(27, 'Minuman', 'Es Campur', 13000, '08062020122131campur.png', 1),
(28, 'Makanan', 'Ayam sambal ijo', 23000, '23032024213039sambal ijo.jpeg', 1),
(29, 'Makanan', 'Sate Ayam', 20000, '25032024094021sate ayam.jfif', 1),
(30, 'Makanan', 'Sate Sapi', 20000, '25032024094044sate sapi.jpg', 1),
(31, 'Makanan', 'Sate Madura', 22000, '25032024094143sate madura.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `meja_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`meja_id`, `status`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 1),
(7, 0),
(8, 0),
(9, 0),
(10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` varchar(50) NOT NULL,
  `meja_order` int(11) NOT NULL,
  `tanggal_order` int(11) NOT NULL,
  `aTanggal_order` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `keterangan_order` text DEFAULT NULL,
  `status_order` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `meja_order`, `tanggal_order`, `aTanggal_order`, `id_user`, `keterangan_order`, `status_order`) VALUES
('ORD0001', 1, 1711335500, '25-03-2024', 2, 'tambah es batu', '1'),
('ORD0002', 2, 1711338178, '25-03-2024', 2, 'jus jangan terlalu manis', '1'),
('ORD0003', 3, 1711341922, '25-03-2024', 2, '', '1'),
('ORD0004', 4, 1711347839, '25-03-2024', 2, '', '1'),
('ORD0005', 5, 1711348754, '25-03-2024', 2, 'Donny Abie', '1'),
('ORD0006', 6, 1711351241, '25-03-2024', 2, 'ahmad', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_order` varchar(50) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  `aTanggal_transaksi` varchar(50) NOT NULL,
  `hartot_transaksi` int(11) NOT NULL,
  `diskon_transaksi` int(11) NOT NULL,
  `totbar_transaksi` int(11) NOT NULL,
  `uang_transaksi` int(11) NOT NULL,
  `kembalian_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_user`, `id_order`, `tanggal_transaksi`, `aTanggal_transaksi`, `hartot_transaksi`, `diskon_transaksi`, `totbar_transaksi`, `uang_transaksi`, `kembalian_transaksi`) VALUES
(35, 16, 'ORD0001', 1711335569, '25-03-2024', 50000, 20, 40000, 50000, 10000),
(36, 17, 'ORD0002', 1711338281, '25-03-2024', 96000, 20, 76800, 80000, 3200),
(37, 18, 'ORD0003', 1711342041, '25-03-2024', 75000, 20, 60000, 100000, 40000),
(38, 19, 'ORD0004', 1711347916, '25-03-2024', 81000, 20, 64800, 80000, 15200),
(39, 17, 'ORD0005', 1711348803, '25-03-2024', 30000, 0, 30000, 30000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `id_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_user`, `id_level`) VALUES
(1, 'admin', '123', 'LeBron James', 1),
(2, 'waiter', '123', 'Kyrie Irving', 2),
(6, 'kasir', '123', 'Anthony Samsul ', 3),
(7, 'owner', '123', 'Kareem Jajong', 4),
(8, 'wawan', '123', 'Philips Wawan', 5),
(9, 'orle', '123', 'Orlee stars', 5),
(16, 'olap', '123', 'Onglap', 5),
(17, 'romo', '123', 'Romo', 5),
(18, 'juki', '123', 'Austin Juki', 5),
(19, 'donny', '123', 'Donny Abie', 5),
(20, 'ahmad', '123', 'ahmad', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  ADD PRIMARY KEY (`id_dorder`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD PRIMARY KEY (`meja_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_order`
--
ALTER TABLE `tb_detail_order`
  MODIFY `id_dorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_masakan`
--
ALTER TABLE `tb_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_meja`
--
ALTER TABLE `tb_meja`
  MODIFY `meja_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
