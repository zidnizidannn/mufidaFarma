-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Mar 2024 pada 07.28
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mufida_farma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `idobat` int(11) NOT NULL,
  `namaObat` varchar(100) DEFAULT NULL,
  `desObat` varchar(255) DEFAULT NULL,
  `hargaObat` float NOT NULL,
  `gambarObat` varchar(50) NOT NULL,
  `idkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`idobat`, `namaObat`, `desObat`, `hargaObat`, `gambarObat`, `idkategori`) VALUES
(1, 'Paracetamol Mef 500mg Tablet (per Strip)', 'Paracetamol (Acetaminophen) yaitu zat aktif yang memiliki aktivitas sebagai penurun demam/antipiretik dan pereda nyeri/analgesik yang bekerja dengan cara menghambat pembentukan prostaglandin yaitu zat yang memicu nyeri dan demam di hipotalamus untuk menin', 4.939, 'Paracetamol Mef 500mg Tablet (per Strip).jpg', 2),
(2, 'Betadine Sol 5ml (per Botol)', 'larutan untuk membersihkan, mengobati, desinfektan pada luka', 7.199, 'Betadine Sol 5ml (per Botol).jpg', 1),
(3, 'Sanmol Sirup 120mg/5ml (per Botol)', 'Sanmol Sirup 60 ml mengandung zat aktif Paracetamol (Acetaminophen) yaitu zat aktif yang memiliki aktivitas sebagai penurun demam/antipiretik dan pereda nyeri/analgesik yang bekerja dengan cara menghambat pembentukan prostaglandin yaitu zat yang memicu ny', 23.143, 'Sanmol Sirup 120mg/5ml (per Botol).jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idobat`),
  ADD KEY `fk_obat_kategori1_idx` (`idkategori`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `fk_obat_kategori1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
