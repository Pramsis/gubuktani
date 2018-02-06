-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 07:03 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
(7, 'Wahyu Ananda', 'wahyu@gmail.com', 'okelah', '2018-01-31 23:31:38', NULL);

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
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `kurun_sewa` varchar(10) NOT NULL,
  `fasilitas_irigasi` varchar(60) NOT NULL,
  `fasilitas_tanah` varchar(60) NOT NULL,
  `fasilitas_jalan` varchar(60) NOT NULL,
  `fasilitas_pemandangan` varchar(60) NOT NULL,
  `foto_lahan` varchar(255) NOT NULL,
  `create_at` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `id_user`, `id_kategori`, `judul`, `alamat_lahan`, `luas`, `sertifikasi`, `deskripsi`, `harga`, `kurun_sewa`, `fasilitas_irigasi`, `fasilitas_tanah`, `fasilitas_jalan`, `fasilitas_pemandangan`, `foto_lahan`, `create_at`, `update_at`) VALUES
(10, 39, 12, 'Disewakan Sawah Harga Murah Di Jalan Sepanjang Sidoarjo', 'Jl, Sepanjang , Sidoarjo', '4000', 'SHM - Sertifikat Hak Milik', 'Disewakan sawah harga murah dekat jalan raya dan pasar induk.', 20000000, 'Tahunan', 'Melewati Saluran Kecil', 'Gambut', 'Pinggir Jalan Raya', 'Latar Belakang Gunung', '310120182158441518_2.jpg', '2018-01-31 21:58:44', '2018-01-31 21:59:10'),
(11, 39, 12, 'Disewakan Sawah Harga Murah Di Taman Sidoarjo', 'Jl. Taman Sidoarjo', '3000', 'HGB - Hak Guna Bangunan', 'Disewakan lahan kdua saya di taman sidoarjo lokasi strategis . udah angkut aja', 3000000, 'Tahunan', 'Menggunakan Pompa Air', 'Gambut', 'Pinggir Jalan Raya', 'Tidak Ada', '31012018220252290049184_1_644x461_tanah-disewakan-utk-usaha-karanganyar-kab.jpg', '2018-01-31 22:02:52', NULL),
(12, 36, 13, 'Disewakan Kebun Sawit Wilayah Kalimantan Dijamin Profit', 'Jl, Sapuan , Pangkalanbun', '120000', 'HGB - Hak Guna Bangunan', 'Kebun Sawit ini adalah kebun paling profit di kalimantan dan dapat menghasilkan banyak sekali buah kelapa sawit dalam satu kali panen', 15000000, 'Tahunan', 'Melewati Saluran Kecil', 'Gambut', 'Pinggir Jalan Raya', 'Tidak Ada', '31012018221529images (1).jpg', '2018-01-31 22:15:29', NULL),
(13, 36, 14, 'Hutan Produksi Jati Paling Ciamik Bisa Disewakan', 'Jl. Nasional Solo Jogja , Kab Magelang', '5000', 'Lainnya (PPJB,Girik,Adat,dll)', 'Lahan ini milik desa sumbersari kecamatan bendol kab magelang , disewakan karena ingin menambah kas desa', 10000000, 'Tahunan', 'Melewati Saluran Kecil', 'Gambut', 'Pinggir Jalan Raya', 'Tidak Ada', '31012018222047tanah-disewakan-di-jakarta-timur.jpg', '2018-01-31 22:20:47', NULL),
(14, 40, 17, 'Tanah Kosong Daerah Jati Rawa Kecamatan Bondol Kab Sukoharjo', 'Jl. Jatirawa 22 Kec Bondol Kab Sukoharjo', '2500', 'SHM - Sertifikat Hak Milik', 'Okelah', 2000000, 'Tahunan', 'Langsung Dari Parit', 'Liat', 'Pinggir Jalan Raya', 'Tidak Ada', '31012018223445C0mCsJOVEAAdoTB.jpg', '2018-01-31 22:34:45', NULL),
(15, 40, 17, 'Disewakan Tanah Kosong Lagi Milik Saya', 'Jl. Kapasan 1 , Sambikerep , Surabaya', '3500', 'SHM - Sertifikat Hak Milik', 'Siplah', 3000000, 'Tahunan', 'Melewati Saluran Kecil', 'Gambut', 'Melewati Jalan Setapak Sawah', 'Tidak Ada', '31012018223721big765186.jpg', '2018-01-31 22:36:17', '2018-01-31 22:37:34');

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
(36, 'Dimas', 'Pramudya', 'dimasrajawali76@gmail.com', '$2y$10$XjYWrdBNTHoyRR2JlIDj3esoUB2VZU.K6GcP4Y.nRTaIc9cWtA7t6', 'Jl. Manukan Rejo III 1C No 8 , Manukan Kulon Surabaya', '085733695414', 'Pegawai Negeri', '3101201821305924384249.jpg', '2018-01-31 21:02:01', '2018-01-31 21:30:59'),
(37, 'Suwondo', '', 'suwondo@gmail.com', '$2y$10$/m84H3G183E.Xx5huaaxKuym5/JWTP7XMv8z2kcPduNz6NB2PlSEq', 'Jl. Wonorejo, Pasar Kembang, Surabaya', '089123333221', 'Pegawai Negeri', '31012018213426125x125.jpg', '2018-01-31 21:34:26', NULL),
(39, 'Riyan', 'Supriatna', 'riyan@gmail.com', '$2y$10$rJpHyl67Wd9c5cco62eRou5TQUmjdTMi46JvOpFUG/kAC28qfBcMO', 'Jl. Adiwicaksana, Sedati, Sidoarjo', '08322212321', 'Pedagang', '310120182140024.jpg', '2018-01-31 21:40:02', NULL),
(40, 'Wahyu', 'Ananda', 'wahyu@gmail.com', '$2y$10$dXy4cpJCFY.uQLdKNXhxhOh8qlydALWw2HoKft7.Rvex31tXMeoza', 'Jl. Jetis, Wates, Kediri', '089222345312', 'Petani', '310120182224242.jpg', '2018-01-31 22:24:24', NULL);

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
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
