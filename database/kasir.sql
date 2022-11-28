-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2022 pada 11.55
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(200) NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `kode_barang`, `nama_barang`, `harga_barang`, `tgl_input`) VALUES
(1, 'BRG001', 'Sabun Lux', 5000, '2022-11-26'),
(3, 'BRG002', 'Baju Kemeja', 5000, '2022-11-26'),
(4, 'BRG003', 'asc', 10000, '2022-11-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_nota` varchar(200) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_keranjang`, `id_nota`, `kode_barang`, `qty`, `sub_total`) VALUES
(4, 'NOTA103', 'BRG001', 1, 5000),
(5, 'NOTA103', 'BRG002', 2, 10000),
(6, 'NOTA104', 'BRG001', 1, 5000),
(7, 'NOTA104', 'BRG002', 3, 15000),
(8, 'NOTA105', 'BRG001', 11, 55000),
(11, 'NOTA105', 'BRG002', 2, 10000),
(12, 'NOTA106', 'BRG001', 1, 5000),
(13, 'NOTA107', 'BRG001', 1, 5000),
(16, 'NOTA107', 'BRG002', 1, 5000),
(17, 'NOTA108', 'BRG001', 1, 5000),
(18, 'NOTA109', 'BRG002', 1, 5000),
(19, 'NOTA110', 'BRG001', 1, 5000),
(20, 'NOTA110', 'BRG003', 7, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_nota` varchar(200) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_nota`, `total`, `bayar`, `kembali`, `tgl_transaksi`) VALUES
(1, 'NOTA103', 15000, 50000, 35000, '2022-11-27'),
(2, 'NOTA104', 20000, 40000, 20000, '2022-11-27'),
(3, 'NOTA105', 65000, 100000, 35000, '2022-11-27'),
(4, 'NOTA106', 0, 6000, 6000, '2022-11-28'),
(5, 'NOTA106', 5000, 6000, 1000, '2022-11-28'),
(6, 'NOTA107', 5000, 15000, 10000, '2022-11-28'),
(7, 'NOTA107', 10000, 15000, 5000, '2022-11-28'),
(8, 'NOTA108', 5000, 10000, 5000, '2022-11-28'),
(9, 'NOTA109', 5000, 10000, 5000, '2022-11-28'),
(10, 'NOTA110', 75000, 100000, 25000, '2022-11-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `nama_toko`, `telepon`, `alamat`, `username`, `password`) VALUES
(1, 'Alfamart', '0812-9238-9150', 'Jln. M Syafe\'i, Kel. Koto Tangah, Kec. Payakumbuh Barat\r\nKota Payakumbuh, Sumatera Barat, ID 26223', 'admin', '$2y$10$1eo2jzDDMLgehBKu5O6GYejbLpIaPJDzbnkn9KOUYuwwEwJHp9vma');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
