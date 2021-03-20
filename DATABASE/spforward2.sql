-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 09:14 PM
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
-- Database: `spforward2`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `kode_gejala` varchar(20) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(3, 'G01', 'Warna kulit menjadi merah'),
(4, 'G02', 'Kulit seperti bersisik'),
(5, 'G03', 'Terasa gatal yang tidak tertahan'),
(6, 'G04', 'Rasa gatal pada malam hari'),
(7, 'G05', 'Kondisi kulit yang berubah'),
(8, 'G06', 'Tumbuh benjolan dipermukaan kulit'),
(9, 'G07', 'Tumbuh benjolan merah kecoklatan'),
(10, 'G08', 'Kulit meradang'),
(11, 'G09', 'Kulit melepuh'),
(12, 'G10', 'Gatal dibagian selangkangan kaki/ketiak/leher/bokong/punggung'),
(13, 'G11', 'Muncul benjolan merah'),
(14, 'G12', 'Kulit terasa perih'),
(15, 'G13', 'Tumbuh benjolan kecil agak memutih'),
(16, 'G14', 'Kulit terasa berminyak'),
(17, 'G15', 'Rasa gatal yang panas'),
(18, 'G16', 'Rasa gatal yang perih'),
(19, 'G17', 'Tumbuh benjolan berisi nanah');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Admin','Dokter','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'Admin'),
(11, 'Irul Marpoyah', 'user', 'user', 'User'),
(12, 'dr. Asal Kuliah, SpAK', 'dokter', 'dokter', 'Dokter'),
(14, 'Joni', 'user2', 'user2', 'User'),
(15, 'Jono', 'user3', 'user3', 'User'),
(16, 'Keke', 'user3', 'user3', 'User'),
(17, 'Gunawan', 'user4', 'user4', 'User'),
(18, 'Tri', 'user5', 'user5', 'User'),
(19, 'Sari', 'user6', 'user6', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `kode_penyakit` varchar(20) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`) VALUES
(1, 'P01', 'Melanoma', 'Penyakit melanoma disebabkan oleh radiasi sinar matahari yang berlebihan. Sinar UV matahari yang menembus kulit membakar dan menghancurkan sel-sel pigmen, menciptakan sel-sel kanker yang mudah menyebar.', 'Melanoma susah diobati, tetapi penyakitnya bisa dicegah. Satu-satunya cara mencegah melanoma adalah dengan selalu menggunakan sunscreen sebelum pergi keluar rumah.'),
(2, 'P02', 'Kudis', 'Gejala dan penyebab penyakit kudis tidak jauh dengan kurap. Orang-orang yang tinggal di lingkungan kumuh lebih rentan terserang penyakit kudis karena banyaknya bakteri yang berterbangan di udara.', 'Apabila kamu mengidap penyakit kudis, hindari kontak fisik dengan keluarga atau teman-teman dekat karena penyakitnya bisa menular.'),
(3, 'P03', 'Kurap', 'Kurap merupakan salah satu macam penyakit kulit yang sering diderita banyak orang. Penyebab kurap adalah jamur atau bakteri yang menempel pada lapisan kulit luar.', 'Karena disebabkan oleh kamur, cara mengobati kurap yang paling ampuh adalah dengan menjaga kebersihan diri. Mandi sehari dua kali, dan oleskan salep anti jamur pada area kulit yang terpapar kurap tiga kali sehari.'),
(4, 'P04', 'Herpes', 'Jenis-jenis penyakit kulit yang dialami banyak orang berikutnya adalah herpes. Herpes adalah penyakit kulit yang disebabkan oleh virus HSV. Virusnya menyerang lapisan kulit luar dan dalam, membuatnya meradang sampai akhirnya melepuh.', 'Obat herpes yang diberikan dokter biasanya berupa salep khusus dan antibiotik.'),
(5, 'P05', 'Bisul', 'Saking sakitnya, terkadang bisa menyebabkan sakit kepala. Bisul disebabkan oleh kondisi kulit kotor yang terpapar bakteri stafilokokus aureus. Bakteri stafilokokus aureus menutup kelenjar keringan dan menimbunnya di dalam kulit, sehingga muncul benjolan merah yang terasa perih.', 'Mengompres bisul dengan air hangat 4 kali sehari bisa mengempeskan benjolan. Namun, agar bisul benar-benar hilang, kamu membutuhkan sabun atau salep antiseptik yang mampu mencairkan nanah dari dalam.'),
(6, 'P06', 'Jerawat', 'Jerawat memang tidak separang jenis penyakit kulit lainnya. Namun, proses penyembuhan permasalahan kulit ini cukup sulit dan memerlukan waktu yang lama. Cara menghilangkan jerawat harus dimulai dari kerajinan diri sendiri.', 'Kamu harus rutin merawat kulit dan menjaga kebersihannya. Jika tidak, sebum, kotoran, dan minyak yang menempel pada permukaan kulit luar bisa menyumbat pori-pori dan menyebabkan munculnya jerawat.'),
(7, 'P07', 'Eksim', 'Eksim merupakan satu dari puluhan macam penyakit kulit yang disebabkan oleh reaksi alergi. Reaksi alergi yang dimaksud bisa disebabkan oleh makanan, obat-obatan, sampai produk kosmetik. Eksim juga bisa disebabkan oleh horman tubuh yang tidak stabil dan cuaca panas.', 'Penyakit eksim bisa dihindari dengan menjaga kebersihan tubuh dan menghindari jenis alergi yang kita miliki. Untuk obat, sayangnya penyakit kulit ini tidak bisa disembuhi di rumah. Obat yang kamu butuhkan hanya bisa didapatkan di apotek, seperti kortikosteroid, antibiotik, atau antihistamin yang juga harus disarankan oleh dokter kulit.');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_penyakit` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_pengguna`, `id_penyakit`, `tanggal`) VALUES
(7, 11, 2, '2020-09-25'),
(8, 11, NULL, '2020-09-25'),
(9, 11, 2, '2020-09-25'),
(10, 11, NULL, '2020-09-25'),
(11, 11, 1, '2020-09-25'),
(12, 11, NULL, '2020-09-25'),
(13, 11, 1, '2020-09-25'),
(14, 11, 2, '2020-09-25'),
(15, 11, NULL, '2020-09-25'),
(16, 11, NULL, '2020-09-25'),
(17, 11, NULL, '2020-09-25'),
(18, 11, NULL, '2020-09-25'),
(19, 11, NULL, '2020-09-25'),
(20, 11, 1, '2020-09-25'),
(21, 11, 3, '2020-09-25'),
(26, 11, 3, '2020-09-25'),
(27, 11, 3, '2020-09-25'),
(28, 11, 1, '2020-09-25'),
(29, 11, 1, '2020-09-25'),
(30, 11, 1, '2020-09-25'),
(31, 11, NULL, '2020-09-25'),
(32, 11, 1, '2020-09-25'),
(33, 11, 1, '2020-09-25'),
(34, 11, 1, '2020-09-25'),
(35, 11, NULL, '2020-09-25'),
(36, 11, NULL, '2020-09-25'),
(37, 11, NULL, '2020-09-25'),
(38, 11, 1, '2020-09-25'),
(39, 11, 1, '2020-09-25'),
(40, 11, NULL, '2020-09-25'),
(41, 15, 1, '2020-09-25'),
(42, 15, 2, '2020-09-25'),
(43, 17, 1, '2020-09-25'),
(44, 17, 7, '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE `rule` (
  `id_rule` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `id_penyakit`, `id_gejala`) VALUES
(36, 1, 3),
(37, 1, 4),
(38, 1, 5),
(39, 2, 3),
(40, 2, 4),
(41, 2, 5),
(42, 2, 6),
(43, 3, 7),
(44, 3, 8),
(45, 3, 9),
(46, 4, 10),
(47, 4, 11),
(48, 4, 12),
(51, 6, 13),
(52, 6, 15),
(53, 6, 16),
(54, 7, 17),
(55, 7, 18),
(56, 7, 19),
(57, 5, 13),
(58, 5, 14),
(59, 5, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id_rule`),
  ADD KEY `id_penyakit` (`id_penyakit`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rule`
--
ALTER TABLE `rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `rule`
--
ALTER TABLE `rule`
  ADD CONSTRAINT `rule_ibfk_1` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `rule_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
