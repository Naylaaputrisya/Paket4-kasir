-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Feb 2024 pada 07.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `Detail_id` int(11) NOT NULL,
  `Penjualan_id` int(11) NOT NULL,
  `Produk_id` int(11) NOT NULL,
  `Jumlah_Produk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`Detail_id`, `Penjualan_id`, `Produk_id`, `Jumlah_Produk`, `Subtotal`) VALUES
(0, 1, 0, 1, '25000.00'),
(0, 2, 0, 1, '0.00'),
(3, 3, 0, 1, '0.00'),
(4, 4, 0, 1, '0.00'),
(5, 5, 0, 1, '0.00'),
(5, 6, 1111, 1, '0.00'),
(6, 7, 1111, 2, '0.00'),
(7, 8, 1111, 2, '0.00'),
(8, 9, 1111, 2, '0.00'),
(9, 10, 1111, 2, '10000.00'),
(10, 11, 4444, 1, '15000.00'),
(10, 12, 0, 2, '25000.00'),
(11, 13, 2222, 1, '15000.00'),
(12, 14, 1111, 2, '10000.00'),
(13, 15, 8888, 3, '10000.00'),
(14, 16, 9999, 2, '30000.00'),
(15, 17, 2222, 1, '15000.00'),
(15, 18, 3333, 1, '10000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Pelanggan_id` int(11) NOT NULL,
  `Nama_Pelanggan` varchar(255) NOT NULL,
  `No_meja` int(11) NOT NULL,
  `Nomor_Pelanggan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`Pelanggan_id`, `Nama_Pelanggan`, `No_meja`, `Nomor_Pelanggan`) VALUES
(0, 'Naya', 1, ''),
(2, 'Naya', 1, ''),
(3, 'Naya', 1, ''),
(4, 'ka', 1, ''),
(5, 'Nayla', 2, ''),
(6, 'naya', 2, ''),
(7, 'naya', 3, ''),
(8, 'naya', 3, ''),
(9, 'naya', 3, ''),
(10, 'ichsan', 2, ''),
(11, 'kia', 3, ''),
(12, 'kiiii', 2, ''),
(13, 'kiya', 80, ''),
(14, 'cinay', 20, ''),
(15, 'naya', 3, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `Penjualan_id` int(11) NOT NULL,
  `Tanggal_Penjualan` date NOT NULL,
  `Total_Harga` decimal(10,2) NOT NULL,
  `Pelanggan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`Penjualan_id`, `Tanggal_Penjualan`, `Total_Harga`, `Pelanggan_id`) VALUES
(1, '2024-02-27', '0.00', 0),
(2, '2024-02-27', '0.00', 0),
(3, '2024-02-27', '0.00', 0),
(4, '2024-02-27', '0.00', 0),
(5, '2024-02-27', '0.00', 0),
(6, '2024-02-27', '0.00', 0),
(7, '2024-02-28', '0.00', 0),
(8, '2024-02-28', '0.00', 0),
(9, '2024-02-28', '0.00', 0),
(10, '2024-02-28', '0.00', 0),
(11, '2024-02-28', '0.00', 0),
(12, '2024-02-28', '0.00', 0),
(13, '2024-02-28', '0.00', 0),
(14, '2024-02-28', '0.00', 0),
(15, '2024-02-28', '0.00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `Produk_id` int(11) NOT NULL,
  `Nama_Produk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Terjual` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`Produk_id`, `Nama_Produk`, `Harga`, `Stok`, `Terjual`, `foto`) VALUES
(2222, 'Makaroni', '15000.00', 23, 2, '27022024073709.jpg'),
(3333, 'Jus Alpukat', '10000.00', 19, 1, '27022024073747.jpg'),
(6777, 'mie spagheti', '6000.00', 3, 0, '28022024075739.jpg'),
(8888, 'Spaghetti', '10000.00', 22, 3, '28022024032113.jpg'),
(9999, 'Iga Bakar', '30000.00', 28, 2, '28022024032500.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`User_id`, `Username`, `Password`, `level`) VALUES
(1111, 'admin', '202cb962ac59075b964b07152d234b70', 'Admin'),
(3333, 'Nayla', '202cb962ac59075b964b07152d234b70', 'Petugas'),
(12345, 'petugas', '202cb962ac59075b964b07152d234b70', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`Penjualan_id`),
  ADD KEY `Penjualan_id` (`Penjualan_id`),
  ADD KEY `Produk_id` (`Produk_id`),
  ADD KEY `Detail_id` (`Detail_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Pelanggan_id`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`Penjualan_id`),
  ADD KEY `Pelanggan_id` (`Pelanggan_id`),
  ADD KEY `Penjualan_id` (`Penjualan_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Produk_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `Penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `Penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`Pelanggan_id`) REFERENCES `pelanggan` (`Pelanggan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
