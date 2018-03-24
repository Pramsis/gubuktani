-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mar 2018 pada 15.13
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `tb_admin`
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
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`, `email`, `create_at`, `update_at`) VALUES
(24, 'Administrator', 'admin', '$2y$12$SZV1LzPOvKSGKldbtAgTQu9OSHWJZP7dC29.OtMwN64iVYOUg2wqi', 'super@admin.com', NULL, NULL),
(34, 'Tutus Risda Sabillah', 'Admin210', '$2y$10$CENk41MxzldykvJxPOmoVujwfPNg8N834buICAJEbxr3cZfivaQCi', 'tutusrs210@yahoo.co.id', '2018-01-31 20:53:41', '2018-03-22 20:20:51'),
(35, 'Mey Purnama Sari', 'admin13', '$2y$12$kGxoLII4nw8FPx8Z6WcvXeLf9UwwUPRx4HZ5IVmklhZk.3Y3J1tna', 'meysari13@gmail.com', '2018-01-31 20:54:15', '2018-03-21 18:47:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_feedback`
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
-- Dumping data untuk tabel `tb_feedback`
--

INSERT INTO `tb_feedback` (`id_feedback`, `nama`, `email`, `pesan`, `create_at`, `update_at`) VALUES
(9, 'Dimas Pramudya Sumarsis', 'dimasrajawali76@gmail.com', 'Terima Kasih admin gubuktani.co.id telah memberikan kemudahan dalam mengiklankan , saran lebih ditingkatkan lagi fitur dan tampilannya', '2018-03-22 20:11:58', NULL),
(10, 'Imron rosyadi', 'rosyadi@gmail.com', 'Website ini bagus jarang ada di Indonesia , kalo ada ini yang paling perfect :)', '2018-03-22 20:14:01', NULL),
(11, 'Hendra Fachrur Rojjy', 'hendra123@gmail.com', 'Membantu sekali dalam mengiklankan lahan pertanian saya yang selama ini tidak saya urus, Saran lebih ditingkatkan lagi Thx', '2018-03-22 20:17:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `create_at` varchar(100) DEFAULT NULL,
  `update_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `create_at`, `update_at`) VALUES
(12, 'Pertanian', '2018-01-31 21:13:46', NULL),
(13, 'Perkebunan', '2018-01-31 21:13:54', NULL),
(14, 'Hutan Produksi', '2018-01-31 21:14:07', NULL),
(15, 'Toga', '2018-01-31 21:14:11', NULL),
(16, 'Hidroponik', '2018-01-31 21:15:37', NULL),
(17, 'Tanah Kosong', '2018-01-31 21:15:57', '2018-02-16 13:55:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lahan`
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
  `status` varchar(20) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `fasilitas_irigasi` varchar(60) NOT NULL,
  `fasilitas_tanah` varchar(60) NOT NULL,
  `fasilitas_jalan` varchar(60) NOT NULL,
  `fasilitas_pemandangan` varchar(60) NOT NULL,
  `foto_lahan` varchar(255) NOT NULL,
  `fieldCreate_at` varchar(100) DEFAULT NULL,
  `fieldUpdate_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_lahan`
--

INSERT INTO `tb_lahan` (`id_lahan`, `id_user`, `id_kategori`, `judul`, `alamat_lahan`, `luas`, `sertifikasi`, `deskripsi`, `harga`, `kurun_sewa`, `status`, `kondisi`, `fasilitas_irigasi`, `fasilitas_tanah`, `fasilitas_jalan`, `fasilitas_pemandangan`, `foto_lahan`, `fieldCreate_at`, `fieldUpdate_at`) VALUES
(24, 41, 14, 'Disewakan cepat sawah , gak rewel gak ribet SHM', 'Jl. Nasional Solo Jogja , Kab Magelang', '3000', 'SHM - Sertifikat Hak Milik', 'Sip', 20000000, 'Tahunan', 'Terverifikasi', 'Tersedia', 'Menggunakan Pompa Air', 'Liat', 'Melewati Jalan Setapak Sawah', 'Tidak Ada', '22022018074226sawah6.jpg', '2018-02-15 22:52:04', '2018-03-20 17:17:36'),
(25, 44, 12, 'Sewakan Sawah Murah Dikaki Bukit Simo Cocok Untuk Wisata', 'Jl Wisata Bukit Simo Petak 6 Wonogiri', '100', 'HGB - Hak Guna Bangunan', 'tanpa perantara', 350000, 'Tahunan', 'Terverifikasi', 'Tersewa', 'Menggunakan Pompa Air', 'Humus', 'Melewati Jalan Setapak Sawah', 'Terasering', '22022018090802sawah3.jpg', '2018-02-22 09:08:02', '2018-03-21 22:46:58'),
(26, 44, 12, 'Disewakan Sawah Dengan Cepat Daerah Kedung Baruk', 'Jl. Lintas kedung baruk Desa Wonopinus Klaten', '1000', 'HGB - Hak Guna Bangunan', 'Disewakan Tanah Dekat Desa Secepatnya Dekat Gunung Merapi Cocok Untuk Wisata\r\n\r\nTertarik ? hubungi aja Matur Suwon', 2000000, 'Tahunan', 'Terverifikasi', 'Tersewa', 'Langsung Dari Parit', 'Liat', 'Pinggir Jalan Raya', 'Latar Belakang Gunung', '21032018230602sawah1.jpg', '2018-02-22 09:10:19', '2018-03-21 23:06:02'),
(27, 45, 13, 'Butuh Kebun ? Disewakan Segera Kebun Jeruk Mojoagung', 'Desa SumberIjo Kecamatan Wates Kota Mojoagung', '2000', 'Lainnya (PPJB,Girik,Adat,dll)', 'Disewakan Gunung Cocok Untuk Wisata', 4000000, 'Tahunan', 'Terverifikasi', 'Tersedia', 'Melewati Saluran Kecil', 'Alluvial', 'Melewati Jalan Setapak Sawah', 'Latar Belakang Gunung', '22022018175920kebun4.jpg', '2018-02-22 17:59:20', '2018-03-22 20:37:43'),
(28, 48, 12, 'Sewakan Sawah Murah Desa Sememi Jaya Panen Ok', 'Jl. Lambe Roni Desa Sememi', '250', 'SHM - Sertifikat Hak Milik', 'Disewakan cepat sawah milik sendiri\r\n-cocok buat menanam padi dan palawija panen 4 kali setahun\r\n-cuaca mendukung\r\n-suasana sejuk dekat telaga\r\nminat hubungi saya ok :)', 3000000, 'Tahunan', 'Terverifikasi', 'Tersedia', 'Melewati Saluran Kecil', 'Humus', 'Melewati Jalan Setapak Sawah', 'Tidak Ada', '21032018232405sawah4.jpg', '2018-03-21 23:24:05', '2018-03-21 23:24:59'),
(29, 47, 13, 'Disewakan perkebunan pribadi lahan minimalis profit besar', 'Jl Wonorejo Timur Surabaya', '150', 'SHM - Sertifikat Hak Milik', 'Disewakan perkebunan pribadi milik saya sendiri\r\n- tanah minimalis gak ribet\r\n- dekat jalan besar\r\n- irigasi lancar dari pompa\r\n- disewakan karena saya sibuk mengajar di sekolah dari pada enggak keurus\r\nminat telepon saya nomer ada di bawah', 3500000, 'Tahunan', 'Terverifikasi', 'Tersewa', 'Menggunakan Pompa Air', 'Liat', 'Pinggir Jalan Raya', 'Tidak Ada', '21032018233112kebun5.jpg', '2018-03-21 23:31:12', '2018-03-21 23:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
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
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_depan`, `nama_belakang`, `email`, `password`, `alamat`, `telepon`, `profesi`, `foto`, `create_at`, `update_at`) VALUES
(41, 'Dimas', 'Pramudya Sumarsis', 'dimasrajawali76@gmail.com', '$2y$10$UoT2V8yP3B5FHEXji1LGh.xJpo670nAym1RvPMHZTo6TRYGSGcne2', 'Jl Manukan Rejo III 1C / 8', '085881824590', 'Wirausaha', '2103201822253124384249.jpg', '2018-02-06 16:04:26', '2018-03-21 22:25:31'),
(44, 'Imron', 'rosyadi', 'rosyadi@gmail.com', '$2y$10$bY6.DhLaFQtPJHnxvmee8.vEyoxoF1qhI4Hc4d9A7ASiTUoCU9C6O', 'Jl Simo Hilir Baru XV , Desa Simo Hilir.', '0838265543214', 'Wirausaha', '21032018225404kismet.jpg', '2018-02-22 09:04:30', '2018-03-21 23:20:04'),
(45, 'Hendra', 'Fachrur Rojjy', 'hendra123@gmail.com', '$2y$10$M.Ypd9cFLpurrpiGIG.BD.ABwneVRL.X1QtjyWMbhWIQ/kVIibWXi', 'Simorejo', '081675323445', 'Swasta', '23022018214241123.jpg', '2018-02-22 16:56:53', '2018-03-22 20:28:40'),
(46, 'Hartono', '', 'htono@gmail.com', '$2y$10$3m3.2tu50.yt0Hh74l4UxuY0Mga0b3apJGjWp26rihfaSDM/.QwWi', 'Jl Kedungklinter Desa Kedung Doro Kec Tegalsari', '085623222134', 'Swasta', '210320182227532.jpg', '2018-03-21 22:27:53', NULL),
(47, 'Suwondo', '', 'suwondo@gmail.com', '$2y$10$Y0Fz6Bv.R6dMUiH8x/Lrg.qq2OWmnftB1VirdS8LQeaPOlbvXwM4O', 'Jl Wonorejo Desa Tegalsari', '085433221876', 'Pegawai Negeri', '21032018222908125x125.jpg', '2018-03-21 22:29:08', NULL),
(48, 'Andri', 'Nur Hidayat', 'andri@gmail.com', '$2y$10$eamkIT8h766FDZZ.oh8pa.qGy/n5MjiBZTB5Sdut0/zRxmfX/GciG', 'Jl Uka Desa Benowo', '081232527624', 'Petani', '210320182232384.jpg', '2018-03-21 22:32:38', NULL);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_lahan`
--
ALTER TABLE `tb_lahan`
  MODIFY `id_lahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
