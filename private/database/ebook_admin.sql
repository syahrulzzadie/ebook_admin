-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 05, 2022 at 06:46 AM
-- Server version: 10.3.36-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grir5245_masagung`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id_books` bigint(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `kategori` varchar(11) DEFAULT NULL,
  `id_pengguna` bigint(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sampul` varchar(100) DEFAULT NULL,
  `publish` varchar(20) DEFAULT 'draf',
  `lokasi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_books`, `judul`, `sinopsis`, `tanggal`, `kategori`, `id_pengguna`, `nama`, `sampul`, `publish`, `lokasi`) VALUES
(1, 'Riyadusolihin', 'Kitab Kitab Kitab Kitab Kitab Kitab Kitab Kitab Kitab ', '2022-09-29 12:31:24', NULL, 1, 'Muhammad Nurhidayat', 'Kitab_TaLim_MutaAllim.jpg', 'draf', 'https://ia800209.us.archive.org/21/items/maktabana/talimul-mutaallim.pdf'),
(2, 'Aqidatul Awam', 'Aqidatul Awwam merupakan kitab berbentuk nadhom yang membahas Ilmu Tauhid atau Ilmu Kalam. Kitab ini (Aqidatul Awwam PDF Arabic) kerap dipelajari di institusi pendidikan tingkat dasar seperti Madrasah Diniyah karena dinilai ringkas dan mudah untuk dipelajari dan dihafalkan oleh pelajar tingkat dasar. ', '2022-10-04 03:09:02', NULL, 1, 'Muhammad Nurhidayat', 'aqidatul_awam.jpg', 'draf', 'aqidatul awam.pdf'),
(3, 'Aqidatut Tauhid', 'Kitab Aqidah At-Tauhid merupakan kitab tentang kajian dasar-dasar Ilmu Tauhid dengan bentuk mandzumah (kalam nadzam). Kitab ini menjelaskan sifat wajib, mustahil dan jaiz bagi Allah Swt dan para Rasul (alaihumus sholatu wassalam) yang berjumlah 50 sifat.', '2022-10-04 03:31:33', NULL, 1, 'Muhammad Nurhidayat', 'Kitab Aqidatut Tauhid.png', 'draf', 'aqidatut tauhid.pdf'),
(4, 'Kitab Bajuri', 'Keistimewaan lain Hasyiyah Al-Bajuri adalah menjelaskan semua istilah dalam berbagai bidang ilmu sehingga akan sangat memudahkan pembacanya untuk memahami isinya. Jika ada illat shorf pada sebuah kata, maka Al-Bajuri akan menjelaskan wazannya, proses ilalnya, proses ibdalnya, proses pembentukan jamaknya, asal mufrodnya, bentuk mudzakkarnya, dan bentuk muanntasnya. Jika ada ungkapan yang salah dalam Fathu Al-Qorib maka beliau mengoreksinya. Jika ada ungkapan yang kurang jelas maka beliau memperjelasnya. Jadi, Hasyiyah Al-Bajuri itu detail, padat isi, dan luas jangkauannya.', '2022-10-04 03:42:25', NULL, 1, 'Muhammad Nurhidayat', 'bajuri.png', 'draf', 'Kitab Bajuri.pdf'),
(5, 'Bughyatul Adzkiya', 'Pada awal kitab ini, Syaikh Mahfudz memulai kajiannya dengan pendefinisian tentang sosok wali, dan esensi karomahnya, dengan menyadur pendapat al-Imam al-Subki untuk memperkuat argumentasinya.', '2022-10-04 20:07:11', NULL, 1, 'Muhammad Nurhidayat', 'bughyahtarmasi.png', 'draf', 'bughyahtarmasi.pdf'),
(6, 'Bughyatul Mustarsyidin', 'Kitab Bughyatul Mustarsyidin ini banyak mengupas hukum pada permasalahan-permasalahan yang banyak dialami.', '2022-10-04 20:17:36', NULL, 1, 'Muhammad Nurhidayat', 'bughyatul mustarsyidin.jpg', 'draf', 'bughyatul mustarsyidin.pdf'),
(7, 'Daqaiq al-Akhbar', 'Kitab ini berisi banyak kisah kisah, berita berita yang berkaitan dengan hari kiamat seperti yaumul hisab, sifat sifat surga dan kenikmatannya, neraka dan jenis jenis siksaannya. ', '2022-10-04 20:45:06', NULL, 1, 'Muhammad Nurhidayat', 'Daqaiq al-Akhbar.png', 'draf', 'Daqaiq al-Akhbar.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `diskusi`
--

CREATE TABLE `diskusi` (
  `id_diskusi` int(11) NOT NULL,
  `judul` varchar(80) DEFAULT NULL,
  `ket` varchar(200) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_pengguna` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskusi`
--

INSERT INTO `diskusi` (`id_diskusi`, `judul`, `ket`, `tanggal`, `id_pengguna`) VALUES
(1, 'Fiqh Tentang Sholat', 'Bincang mengenai sholat dalam ilmu fiqh', '2022-09-20 07:13:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diskusi_detail`
--

CREATE TABLE `diskusi_detail` (
  `id_detail_diskusi` bigint(20) NOT NULL,
  `id_diskusi` int(11) NOT NULL,
  `id_pengguna` bigint(20) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskusi_detail`
--

INSERT INTO `diskusi_detail` (`id_detail_diskusi`, `id_diskusi`, `id_pengguna`, `isi`, `tanggal`) VALUES
(1, 1, 1, 'Tes', '2022-09-21 04:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `judul` varchar(80) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_pengguna` bigint(20) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `judul`, `ket`, `isi`, `tanggal`, `id_pengguna`, `img`) VALUES
(1, 'Penjian Rutin Malam Rabu', 'Membahas Tuntas kitab Safinatunnajah', 'Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu Pengajian rutinan malam rabu ', '2022-09-27 01:54:51', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karya_tulis`
--

CREATE TABLE `karya_tulis` (
  `id_karya_tulis` bigint(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `sinopsis` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `kategori` varchar(11) DEFAULT NULL,
  `id_pengguna` bigint(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sampul` varchar(100) DEFAULT NULL,
  `publish` varchar(20) DEFAULT 'draf'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karya_tulis`
--

INSERT INTO `karya_tulis` (`id_karya_tulis`, `judul`, `isi`, `sinopsis`, `tanggal`, `kategori`, `id_pengguna`, `nama`, `sampul`, `publish`) VALUES
(1, 'hkjhadka', 'abf,afdf,a', 'dhjkafdhka', '2022-09-28 05:17:06', NULL, 1, 'Muhammad Nurhidayat', NULL, 'draf'),
(2, 'juulll', 'hdjkj jfbbfbd fjfjdjdn ffjfjfnfj ffjfjjfjf fnffjjf fjfjfjfjf fjfjfjfjfnfbf f f f fgf gjffjfjfnf dorngnvjvkg gkgngkfjfofnf fjfjrifbf fjvicnfnfjfofj fjfjfjfijfnf fjfjfkfj ffjfnncjfjfnf fnfkfjfnfbf fjfjfjjfjfnfnf fjfjfjfnfjfjfj', 'jsjs djdjdjd fjdjddjd djdjdjdjdj fffdudjdjrjer djfjfbfjfjf fjdjdjdjdjdjdjd fjfjdjdjdjfjfjdjdjdd djdd d dd f f fddrrf rfff fffff ffffff', '0000-00-00 00:00:00', '2022-09-28', 1, 'Muhammad Nurhidayat', '', 'draf'),
(3, 'juulll', 'hdjkj jfbbfbd fjfjdjdn ffjfjfnfj ffjfjjfjf fnffjjf fjfjfjfjf fjfjfjfjfnfbf f f f fgf gjffjfjfnf dorngnvjvkg gkgngkfjfofnf fjfjrifbf fjvicnfnfjfofj fjfjfjfijfnf fjfjfkfj ffjfnncjfjfnf fnfkfjfnfbf fjfjfjjfjfnfnf fjfjfjfnfjfjfj', 'jsjs djdjdjd fjdjddjd djdjdjdjdj fffdudjdjrjer djfjfbfjfjf fjdjdjdjdjdjdjd fjfjdjdjdjfjfjdjdjdd djdd d dd f f fddrrf rfff fffff ffffff', '0000-00-00 00:00:00', '2022-09-28', 1, 'Muhammad Nurhidayat', '', 'draf'),
(4, 'juulll', 'hdjkj jfbbfbd fjfjdjdn ffjfjfnfj ffjfjjfjf fnffjjf fjfjfjfjf fjfjfjfjfnfbf f f f fgf gjffjfjfnf dorngnvjvkg gkgngkfjfofnf fjfjrifbf fjvicnfnfjfofj fjfjfjfijfnf fjfjfkfj ffjfnncjfjfnf fnfkfjfnfbf fjfjfjjfjfnfnf fjfjfjfnfjfjfj', 'jsjs djdjdjd fjdjddjd djdjdjdjdj fffdudjdjrjer djfjfbfjfjf fjdjdjdjdjdjdjd fjfjdjdjdjfjfjdjdjdd djdd d dd f f fddrrf rfff fffff ffffff', '2022-09-28 20:24:33', 'Fiksi', 1, 'Muhammad Nurhidayat', '', 'draf');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` bigint(20) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `jk`, `foto`, `alamat`, `username`, `password`, `status`) VALUES
(1, 'Muhammad Nurhidayat', 'yyaayyaatt@gmail.com', 'L', NULL, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `perpus`
--

CREATE TABLE `perpus` (
  `id_perpus` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpus`
--

INSERT INTO `perpus` (`id_perpus`, `nama`, `alamat`, `link`, `gambar`) VALUES
(1, 'Perpustakaan Daerah Kota Tegal', 'Jl. KH. Ahmad Dahlan No.12, Mangkukusuman, Kec. Tegal Tim., Kota Tegal, Jawa Tengah 52131', 'https://perpusda.tegalkota.go.id/', 'logo_perpus.png'),
(2, 'Perpustakaan Nasional', 'Jl. Medan Merdeka Sel. No.11, RT.11/RW.2, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110', 'https://www.perpusnas.go.id/', 'LOGO-PERPUSNAS.png'),
(3, 'Perpustakaan Daerah Kabupaten Tegal', 'Jl. Jend. Ahmad Yani No. 51 Kel. Procot Kec. Slawi Kab. Tegal - Telp (0283) - 492242 / Fax (0283) 492455', 'http://simperpusda.tegalkab.go.id/', 'perpustegal.png'),
(4, 'Perpustakaan Daerah Kabupaten Pemalang', 'JL. Alun - Alun Timur, Kebondalem, Pelutan, Kec. Pemalang, Kabupaten Pemalang, Jawa Tengah 52312', 'https://dinpusarda.pemalangkab.go.id/', 'perpuspemalang.png'),
(5, 'Perpustakaan Daerah Purwokerto', 'JL. Jenderal Gatot Subroto, Purwokerto, Kebondalem, Purwokerto Lor, Purwokerto Timur, Banyumas Regency, Central Java 53116', 'https://banyumaskab.sikn.go.id/', 'perpuspwkt.png'),
(6, 'Perpustakaan Daerah Purbalingga', 'JL. DIPOKUSUMO NO. 7 Purbalingga, Purbalingga Lor, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53311', 'https://dinarspus.purbalinggakab.go.id/', NULL),
(7, 'Perpustakaan Daerah Cilacap', 'Jl. Jend. Sudirman No.5, Sidakaya Dua, Sidakaya, Kec. Cilacap Sel., Kabupaten Cilacap, Jawa Tengah 53211', 'https://arpus.cilacapkab.go.id/', NULL),
(8, 'Perpustakaan Provinsi Jawa Tengah', 'PEMERINTAHAN DAN KESEJAHTERAAN KELUARGA, Jl. Sriwijaya No.29a, RW.2, Tegalsari, Kec. Candisari, Kota Semarang, Jawa Tengah 50614', 'https://arpusda.jatengprov.go.id/', NULL),
(9, 'Perpustakaan Daerah Kabupaten Cirebon', 'Jl. Sunan Drajat No.9, Sumber, Plered-Cirebon, Kabupaten Cirebon, Jawa Barat 45611', 'https://cirebonkab.sikn.go.id/', NULL),
(10, 'Perpustakaan Umum Kabupaten Brebes', 'Jl. Jenderal A. Yani No.75, Sangkalputung, Brebes, Kec. Brebes, Kabupaten Brebes, Jawa Tengah 52212', 'http://dinarpus.brebeskab.go.id/', NULL),
(11, 'DINAS PERPUSTAKAAN DAN ARSIP KABUPATEN INDRAMAYU', 'Jl. MT Haryono No.49, Penganjang, Kec. Sindang, Kabupaten Indramayu, Jawa Barat 45222', 'https://disarpus.indramayukab.go.id/', NULL),
(12, 'Kantor Arsip dan Perpusda Kabupaten Wonosobo', 'Jl. Pemuda No.2, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311', 'https://arpusda.wonosobokab.go.id/', NULL),
(13, 'Dinas Kearsipan dan Perpus Kabupaten Purwakarta', 'Jl. Veteran, Purwakarta, Komplek Perum Griya Asri, Jawa Barat, 41118', 'https://disipusda.purwakartakab.go.id/perpustakaan-daerah-kabupaten-purwakarta/', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `isi` text NOT NULL,
  `id_pengguna` bigint(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `isi`, `id_pengguna`, `tanggal`) VALUES
(1, 'JC gdvdhddjdrbgrhrd fbffkfjf fhfjff fhffjjf ffhfjjf', 1, '2022-09-28 21:14:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad nurhidayat', 'yyaayyaatt@gmail.com', NULL, '$2y$10$vG4vxNRIwfxemGKh5LZwCeag46wIFjuV6xGbyzR5dmgwystCuWG6S', NULL, '2022-09-18 14:51:20', '2022-09-18 14:51:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_books`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD PRIMARY KEY (`id_diskusi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `diskusi_detail`
--
ALTER TABLE `diskusi_detail`
  ADD PRIMARY KEY (`id_detail_diskusi`),
  ADD KEY `id_diskusi` (`id_diskusi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `karya_tulis`
--
ALTER TABLE `karya_tulis`
  ADD PRIMARY KEY (`id_karya_tulis`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `perpus`
--
ALTER TABLE `perpus`
  ADD PRIMARY KEY (`id_perpus`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id_books` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diskusi`
--
ALTER TABLE `diskusi`
  MODIFY `id_diskusi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diskusi_detail`
--
ALTER TABLE `diskusi_detail`
  MODIFY `id_detail_diskusi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `karya_tulis`
--
ALTER TABLE `karya_tulis`
  MODIFY `id_karya_tulis` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perpus`
--
ALTER TABLE `perpus`
  MODIFY `id_perpus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON UPDATE CASCADE;

--
-- Constraints for table `diskusi`
--
ALTER TABLE `diskusi`
  ADD CONSTRAINT `diskusi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diskusi_detail`
--
ALTER TABLE `diskusi_detail`
  ADD CONSTRAINT `diskusi_detail_ibfk_1` FOREIGN KEY (`id_diskusi`) REFERENCES `diskusi` (`id_diskusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diskusi_detail_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON UPDATE CASCADE;

--
-- Constraints for table `karya_tulis`
--
ALTER TABLE `karya_tulis`
  ADD CONSTRAINT `karya_tulis_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
