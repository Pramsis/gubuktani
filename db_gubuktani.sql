-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2018 at 07:51 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gubuktani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `create_at` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `email`, `create_at`, `update_at`) VALUES
(24, 'Administrator', 'admin', '$2y$12$SZV1LzPOvKSGKldbtAgTQu9OSHWJZP7dC29.OtMwN64iVYOUg2wqi', 'super@admin.com', NULL, NULL),
(33, 'Hartono', 'admin123', '$2y$10$wWoaMNVC6Q32XbkMfr41dO2Yg2BHBTefc9Cw76k9IhibwA.5rdudS', 'htono@gmail.com', '2018-01-31 20:53:20', NULL),
(34, 'Muhammad Imron', 'admin77', '$2y$10$CENk41MxzldykvJxPOmoVujwfPNg8N834buICAJEbxr3cZfivaQCi', 'imronbonek@gmail.com', '2018-01-31 20:53:41', NULL),
(35, 'Mey Purnama Sari', 'admin76', '$2y$10$1n9M.xkUm2wCPl8CVWmJmuk98tuNYn3GGsgqd3JMhMFYTI6GSxape', 'meysari13@gmail.com', '2018-01-31 20:54:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pesan` varchar(300) NOT NULL,
  `create_at` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`id_feedback`, `nama`, `email`, `pesan`, `create_at`, `update_at`) VALUES
(6, 'Wahyu Ananda', 'wahyu@gmail.com', 'Isinya Bagus Mas', '2018-01-31 23:25:10', NULL),
(7, 'Wahyu Ananda', 'wahyu@gmail.com', 'okelah', '2018-01-31 23:31:38', NULL),
(8, 'Dimas Pramudya Sumarsis', 'dimasrajawali76@gmail.com', '', '2018-02-06 22:29:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `create_at` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `create_at`, `update_at`) VALUES
(12, 'Pertanian', '2018-01-31 21:13:46', NULL),
(13, 'Perkebunan', '2018-01-31 21:13:54', NULL),
(14, 'Hutan Produksi', '2018-01-31 21:14:07', NULL),
(15, 'Toga', '2018-01-31 21:14:11', NULL),
(16, 'Hidroponik', '2018-01-31 21:15:37', NULL),
(17, 'Tanah Kosong', '2018-01-31 21:15:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lahan`
--

CREATE TABLE `tb_lahan` (
  `id_lahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `alamat_lahan` varchar(100) NOT NULL,
  `luas` varchar(7) NOT NULL,
  `sertifikasi` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `kurun_sewa` varchar(10) NOT NULL,
  `fasilitas_irigasi` varchar(60) NOT NULL,
  `fasilitas_tanah` varchar(60) NOT NULL,
  `fasilitas_jalan` varchar(60) NOT NULL,
  `fasilitas_pemandangan` varchar(60) NOT NULL,
  `foto_lahan` varchar(255) NOT NULL,
  `fieldCreate_at` varchar(100) DEFAULT NULL,
  `fieldUpdate_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `id_user`, `id_kategori`, `judul`, `alamat_lahan`, `luas`, `sertifikasi`, `deskripsi`, `harga`, `kurun_sewa`, `fasilitas_irigasi`, `fasilitas_tanah`, `fasilitas_jalan`, `fasilitas_pemandangan`, `foto_lahan`, `fieldCreate_at`, `fieldUpdate_at`) VALUES
(16, 41, 12, 'Disewakan Sawah Dekat Jalan Lintas Surabaya Solo', 'Jl. Peterongan, Desa Gurah, Kec Canggu Kab Nganjuk', '2000', 'SHM - Sertifikat Hak Milik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2000000, 'Tahunan', 'Langsung Dari Parit', 'Gambut', 'Pinggir Jalan Raya', 'Terasering', '06022018185320s3.jpg', '2018-02-06 16:14:07', '2018-02-06 22:57:40'),
(17, 41, 12, 'Disewakan Sawah Daerah Kletek Sidoarjo', 'Jl.Sememi Jaya Utara', '2500', 'SHM - Sertifikat Hak Milik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 5000000, 'Tahunan', 'Melewati Saluran Kecil', 'Gambut', 'Pinggir Jalan Raya', 'Tidak Ada', '06022018194925sawah5.jpg', '2018-02-06 19:49:25', '2018-02-06 22:57:14'),
(18, 41, 13, 'Disewakan Kebun Jeruk Di Daerah Prigen Pasuruan', 'Jl . Puncak Prigen Kab Pasuruan', '3000', 'SHM - Sertifikat Hak Milik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing \r\nelit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing \r\nelit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 20000000, 'Tahunan', 'Langsung Dari Parit', 'Gambut', 'Melewati Jalan Setapak Sawah', 'Tidak Ada', '06022018195507kebun4.jpg', '2018-02-06 19:55:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(8) NOT NULL,
  `nama_depan` varchar(15) NOT NULL,
  `nama_belakang` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `profesi` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `create_at` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `password`, `alamat`, `telepon`, `profesi`, `foto`, `create_at`, `update_at`) VALUES
(41, 'Dimas', 'Pramudya Sumarsis', 'dimasrajawali76@gmail.com', '$2y$10$UoT2V8yP3B5FHEXji1LGh.xJpo670nAym1RvPMHZTo6TRYGSGcne2', 'Jl Manukan Rejo III 1C / 8', '085881824590', 'Wirausaha', '0602201816042624384249.jpg', '2018-02-06 16:04:26', '2018-02-06 19:51:10'),
(42, 'ali', 'alino', 'alino@gamail.com', '$2y$10$n0eFnPyvmL2OwQ4e5y2z8.3uUTaYypZTjA4Nx49r4SaLMWxy4lkRW', 'jerman', '089727265', 'Pedagang', '06022018223215sawah1.jpg', '2018-02-06 22:32:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  ADD PRIMARY KEY (`id_lahan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
