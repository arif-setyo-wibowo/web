-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2024 pada 16.23
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
-- Database: `presentasikarya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `komentar`) VALUES
(1, 'Siti Aisyahaisyah', 'sitiaisyahbima373@gmail.com', ''),
(2, 'Siti Aisyahaisyah', 'sitiaisyahbima373@gmail.com', 'haiii'),
(3, 'Siti Aisyahaisyah', 'sitiaisyahbima373@gmail.com', 'haiii'),
(4, 'siti aisyah', 'aisyah@123.com', 'produk anda kurang menarik'),
(5, 'Siti Aisyahaisyah', 'fidyah@gmail.com', '  hwwbehwgeuch  ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar`
--

INSERT INTO `daftar` (`id`, `nama`, `email`, `password`) VALUES
(7, 'siti aisyah', 'sitiaisyahbima373@gmail.com', '123'),
(9, 'Fidyah', 'fidyah@gmai.com', '123'),
(10, 'siti aisyah', 'aisyah@123', '123'),
(11, 'siti aisyah', 'aisyah@123', '123'),
(12, 'siti aisyah', 'aisya@111.com', '12345'),
(13, 'ana puspita', 'ana@gmail.com', '9010'),
(14, 'ana puspita', 'ana@gmail.com', '9010'),
(15, 'airin', 'airin@gmail.com', '$2y$10$FNF8NBgzCKLZ.SBVF1We.uovsC1zj4YQ5qVaU8nmUIwgrVKXAw1/6'),
(16, 'nani', 'nani@gmail.com', '1234567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `link_shopee` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `foto`, `nama`, `harga`, `keterangan`, `link_shopee`) VALUES
(17, 'Pupuk NPK_1703907075.jpg', 'Pupuk NPK', 10098, 'Tingkat kelarutan tinggi, meningkatkan mutu buah/umbi, meningkatkan kekuatan tanaman, pertumbuhan tanaman lebih serempak dan meningkatkan produktivitas tanaman. Manfaat pupuk NPK yang dimaksudkan adalah mampu memaksimalkan pertumbuhan daun, mengokohkan batang, ranting, akar, serta merangsang pertumbuhan bunga dan buah.', 'https://shopee.co.id/Pupuk-DGW-npk-compaction-15-15-15-TE-500gr-repack-i.18401868.5300557677?sp_atk=a8f59095-783b-4b39-a0b9-c1213e399e83&xptdk=a8f59095-783b-4b39-a0b9-c1213e399e83'),
(18, 'explore_1703906955.jpeg', 'explore', 39500, 'EXPLORE adalah fungisida sistemik dan sebagai zat pengatur tumbuh berwarna kuning kecoklatan berbentuk pekatan yang dapat diemulsikan untuk mengendalikan penyakit pada tanaman padi sawah, cabai, tomat, bawang merah, jagung, kentang, jeruk, kacang panjang, kedelai, krisan, semangka karet, kelapa sawit, tembakau dan mangga.', 'https://shopee.co.id/Fungisida-Explore-250-EC-isi-80-ml-i.388591402.19423416986?sp_atk=f3dd968a-075a-4572-bb78-73dfc44fa6ee&xptdk=f3dd968a-075a-4572-bb78-73dfc44fa6ee'),
(20, 'Dangke_1703906455.jpeg', 'Dangke', 23000, 'Bahan aktif metomil yang terkandung pada insektisida Dangke 40 WP berfungsi untuk mengendalikan hama pada tanaman bawang merah, kedelai, cabai, kacang panjang, kakao, tomat, kacang hijau, kubis dan kelapa sawit. Dangke juga bisa di gunakan untuk tanaman padi, yang berguna dalam mengendalikan ulat penggerek batang yang terkenal sulit untuk di kendalikan.', 'https://shopee.co.id/insektisida-DANGKE-40WP-100gr-i.602307888.20570208533?sp_atk=740b1a97-6ca4-4404-ba4b-d80d0abdbd20&xptdk=740b1a97-6ca4-4404-ba4b-d80d0abdbd20'),
(22, 'Corona_1703811925.jpg', 'Corona', 20000, 'Corona 325 EC adalah fungisida sistemik yang bersifat preventif dan kuratif berbentuk pekatan suspensi berwarna putih krem untuk mengendalikan penyakit pada tanaman bawang merah, mangga, jagung, cabai dan padi. \r\nKeunggulan: Bersifat SISTEMIK sehingga mam', 'https://shopee.co.id/CORONA-325-SC-100-ML-250-ML-FUNGISIDA-DAN-ZPT-Pestisida-Fungisida-Sistemik-Preventif-dan-Kuratif-i.507835529.9494497141'),
(23, 'Abolisi_1703909509.jpg', 'Abolisi', 57500, 'Mampu mengendalikan gulma berdaun lebar, berdaun sempit dan teki. Bersifat SISTEMIK, sehingga dapat mengendalikan gulma sampai ke akar-akarnya. Tidak menimbulkan efek FITOTOKSISITAS pada tanaman selama digunakan sesuai dosis anjuran.Dapat dicampur dengan herbisida lain untuk memperluas SPEKTRUM PENGENDALIAN terhadap gulma.', 'https://shopee.co.id/ABOLISI-865SL-DIMETIL-AMINA-865g-l-HERBISIDA-LAWATAN-GRINTING-400ML-i.682201419.14061423649?sp_atk=9f17adf8-d34b-40f1-aed6-4eeac20a2319&xptdk=9f17adf8-d34b-40f1-aed6-4eeac20a2319');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
