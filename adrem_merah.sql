-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2025 pada 04.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adrem_merah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(150) NOT NULL,
  `username_admin` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telepon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `deskripsi_barang` varchar(255) NOT NULL,
  `foto_barang` varchar(255) NOT NULL,
  `link_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `deskripsi_barang`, `foto_barang`, `link_produk`) VALUES
(1, 'Ayam atuk', '20000', 6, 'sdfsdfs', 'Group_2_(3).png', 'fsfsdfs'),
(4, 'ubud', '10000', 3, 'vcvxc', 'Group_7_(1)2.png', 'vxcvxc'),
(5, 'ayam simbah', '10000', 45000, 'dadadadasdasdas', 'jane-austen-penulis-novel-romantis-namun-putuskan-untuk-tak-menikah-F390qXUf5U.jpg', 'asdasda'),
(6, 'Adrem merah', '10000', 5665, 'yryryrt', 'jane-austen-penulis-novel-romantis-namun-putuskan-untuk-tak-menikah-F390qXUf5U.png', 'yrtyrt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` varchar(255) NOT NULL,
  `gambar_berita` varchar(255) NOT NULL,
  `tanggal_berita` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `isi_berita`, `gambar_berita`, `tanggal_berita`) VALUES
(1, 'Ayam tok dalang', 'di makan upin ipin', 'Group_2_(7)1.png', '2025-02-07'),
(2, 'opor opah', 'DASDAS', 'Group_12.png', '2025-02-07'),
(3, 'Ayam tok dalang', 'di makan upin ipin', 'Group_2_(7)4.png', '2025-02-07'),
(4, 'Ayam tok dalang', 'Dimakan upin ipin', 'Group_2_(7)5.png', '2025-02-07'),
(6, 'ayam goreng enak', 'sdasdasdsadas', '38308au2.png', '2025-02-15'),
(7, 'sdasda', 'dasdsad', '38308au.jpg', '2025-02-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `gambar_galeri` varchar(255) NOT NULL,
  `judul_galeri` varchar(255) NOT NULL,
  `tanggal_galeri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `gambar_galeri`, `judul_galeri`, `tanggal_galeri`) VALUES
(0, '38308au3.png', 'Nanana', '2025-02-15'),
(0, 'jane-austen-penulis-novel-romantis-namun-putuskan-untuk-tak-menikah-F390qXUf5U1.jpg', 'Gayung loper', '2025-02-15'),
(0, 'download.png', 'Nanana', '2025-02-15'),
(0, 'zvh6whqnxeo31.jpg', 'uuuulalal', '2025-02-15'),
(0, 'IDWRITERS-WEB-33_(1).png', 'Nanana', '2025-02-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id_logo` int(11) NOT NULL,
  `gambar_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_organisasi`
--

CREATE TABLE `tbl_organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `judul_organisasi` varchar(255) NOT NULL,
  `subjudul_organisasi` varchar(255) NOT NULL,
  `deskripsi_organisasi` varchar(255) NOT NULL,
  `gambar_organisasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_organisasi`
--

INSERT INTO `tbl_organisasi` (`id_organisasi`, `judul_organisasi`, `subjudul_organisasi`, `deskripsi_organisasi`, `gambar_organisasi`) VALUES
(2, 'fdsfs', 'fdsfsd', 'sfsfd', 'download7.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id_profil` int(11) NOT NULL,
  `judul_profil` varchar(255) NOT NULL,
  `subjudul_profil` varchar(255) NOT NULL,
  `deskripsi_profil` varchar(255) NOT NULL,
  `gambar_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_profil`
--

INSERT INTO `tbl_profil` (`id_profil`, `judul_profil`, `subjudul_profil`, `deskripsi_profil`, `gambar_profil`) VALUES
(1, 'doomdada', 'dfadasdddad', 'asdasdasdasdsafssfs', 'download5.png'),
(3, 'dasdd', 'dasdsadas', 'asdsadas7', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sertifikat`
--

CREATE TABLE `tbl_sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `gambar_sertifikat` varchar(255) NOT NULL,
  `deskripsi_sertifikat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_sertifikat`
--

INSERT INTO `tbl_sertifikat` (`id_sertifikat`, `gambar_sertifikat`, `deskripsi_sertifikat`) VALUES
(1, 'sfsdfsf', 'sfsdfsf'),
(2, 'kll', 'kll');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indeks untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indeks untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_organisasi`
--
ALTER TABLE `tbl_organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_sertifikat`
--
ALTER TABLE `tbl_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
