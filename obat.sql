-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 04:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_mufidafarma`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `idObat` int(11) NOT NULL,
  `namaObat` varchar(100) NOT NULL,
  `desObat` varchar(255) NOT NULL,
  `hargaObat` float NOT NULL,
  `gambarObat` varchar(50) NOT NULL,
  `idKategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`idObat`, `namaObat`, `desObat`, `hargaObat`, `gambarObat`, `idKategori`) VALUES
(1, 'Paracetamol Mef 500mg Tablet (per Strip)', 'Paracetamol (Acetaminophen) yaitu zat aktif yang memiliki aktivitas sebagai penurun demam/antipiretik dan pereda nyeri/analgesik yang bekerja dengan cara menghambat pembentukan prostaglandin yaitu zat yang memicu nyeri dan demam di hipotalamus untuk menin', 4.939, 'Paracetamol Mef 500mg Tablet (per Strip).jpg', 2),
(2, 'Betadine Sol 5ml (per Botol)', 'larutan untuk membersihkan, mengobati, desinfektan pada luka', 7.199, 'Betadine Sol 5ml (per Botol).jpg', 1),
(3, 'Sanmol Sirup 120mg/5ml (per Botol)', 'Sanmol Sirup 60 ml mengandung zat aktif Paracetamol (Acetaminophen) yaitu zat aktif yang memiliki aktivitas sebagai penurun demam/antipiretik dan pereda nyeri/analgesik yang bekerja dengan cara menghambat pembentukan prostaglandin yaitu zat yang memicu ny', 23.143, 'Sanmol Sirup 120mg/5ml (per Botol).jpg', 1),
(4, 'Paratusin Tablet (per Strip)', 'Paratusin adalah obat untuk meringankan gejala flu seperti demam, sakit kepala, hidung tersumbat dan bersin-bersin yang disertain batuk. Obat ini masuk dalam golongan obat bebas terbatas.', 16.968, 'Paratusin Tablet (per Strip).jpg', 2),
(5, 'Balsem Tiger 20g (per Pcs)', 'Balsem yang diindikasikan untuk pegal-pegal, nyeri otot, keseleo, sakit kepala, juga untuk meredakan gatal dan iritasi akibat gigitan serangga.', 22.483, 'Balsem Tiger 20g (per Pcs).png', 4),
(6, 'Degirol Loz 10 Tablet (per Strip)', 'DEGIROL LOZ 10 TABLET merupakan obat preparat mulut dan tenggorokan dengan kandungan dequalinium chloride. Produk ini dapat digunakan untuk sakit tenggorokan, peradangan pada rongga mulut dan tenggorokan, infeksi selaput lendir mulut.', 13.581, 'Degirol Loz 10 Tablet (per Strip).jpg', 2),
(7, 'Tonicard Kapsul Lunak (per Strip)', 'Suplemen untuk memelihara kesehatan jantung', 230.569, 'Tonicard Kapsul Lunak (per Strip).jpg', 3),
(8, 'Stimuno Orange Berry Sirup 60ml (per Botol)', 'STIMUNO ORANGE BERRY SYR 60ML merupakan produk herbal fitofarmaka, yang terbukti berkhasiat dan aman untuk meningkatkan kekebalan tubuh, berguna untuk mencegah sakit dan mempercepat penyembuhan', 30.972, 'Stimuno Orange Berry Sirup 60ml (per Botol).jpg', 1),
(9, 'Erhair Df Hairgrow Serum 8ml (per Pcs)', 'ERHAIR DF HAIRGROW SERUM 8ML 7S merupakan serum yang diformulasikan untuk rambut rontok dan tipis. Diformulasikan untuk mengurangi kerontokan dan menumbuhkan rambut baru.', 32.63, 'Erhair Df Hairgrow Serum 8ml (per Pcs)', 5),
(10, 'Kunir Cap Jamu Iboe (per Botol)', 'Kunir Cap Jamu Iboe merupakan suplemen herbal yang digunakan sebagai terapi penunjang supaya kekebalan sistem imun tubuh meningkat dan tidak mudah jatuh sakit.', 47.607, 'Kunir Cap Jamu Iboe (per Botol).png', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idObat`),
  ADD KEY `idKategori` (`idKategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `idObat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
