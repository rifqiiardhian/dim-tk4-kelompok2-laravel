-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 04 Feb 2023 pada 19.53
-- Versi server: 8.0.30
-- Versi PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp2_datmen`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (`username` VARCHAR(20), `password` VARCHAR(100))   begin
declare hasil varchar (100);
declare nama varchar (50);
declare hak_akses varchar(20);
declare depan varchar (20);
declare belakang varchar (20);
select NamaPengguna, NamaAkses, NamaDepan, NamaBelakang into nama, hak_akses, depan, belakang
from pengguna join hakakses
using(IdAkses)
where NamaPengguna = username
and Password = password;
set hasil = concat('Hallo Selamat Datang',' ', depan, ' ', belakang,' | ','\r\n');
set hasil = concat(hasil, '', 'Anda Terdaftar Sebagai',' ', nama, '\r\n');
select hasil;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idBarang` int NOT NULL,
  `namaBarang` varchar(50) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL,
  `satuan` varchar(20) NOT NULL DEFAULT '',
  `idPengguna` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `keterangan`, `satuan`, `idPengguna`, `created_at`, `updated_at`) VALUES
(1, 'Pop Corn', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Kopi', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Pakaian', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Minuman', '-', 'Botol', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Sayur Bayam', '-', 'Batang', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Buah', '-', 'Butir', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Monitor', '-', 'Unit', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Kabel', '-', 'Meter', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Sepatu', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Kaos Kaki', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Buku Tulis', '-', 'Lusin', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Gelas Pecah Belah', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Lotion', '-', 'Buah', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Masker', '-', 'Kotak', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Kertas Kado', '-', 'Pcs', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Hanger', '-', 'Lusin', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Kodak Colorplus 200', 'Lorem ipsum dolor roll film baru', 'Pcs', 12, '2023-02-04 12:51:44', '2023-02-04 12:51:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakakses`
--

CREATE TABLE `hakakses` (
  `idAkses` int NOT NULL,
  `namaAkses` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `hakakses`
--

INSERT INTO `hakakses` (`idAkses`, `namaAkses`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Produk', 'CRUD Produk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Produk', 'CR Produk', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Pembeli', 'CRUD Pengguna', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Pelanggan', 'CRU Pelanggan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Kategori', 'CRUD Kategori', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Laporan', 'R Laporan', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Pengiriman', 'CRU Pengiriman', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Diskon dan Promosi', 'CRUD Diskon', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Evaluasi', 'CRU Evaluasi', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Pengembalian', 'CRU Pengembalian', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Test Akses Baru', 'Lorem ipsum', '2023-02-04 11:04:57', '2023-02-04 11:04:57'),
(13, 'Test Satu Lagi', NULL, '2023-02-04 11:05:26', '2023-02-04 11:05:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int NOT NULL,
  `jenisBarang` varchar(50) NOT NULL,
  `jumlahBarang` char(8) NOT NULL,
  `hargaBarang` varchar(20) NOT NULL,
  `idPengguna` int NOT NULL,
  `idBarang` int NOT NULL,
  `idPembelian` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `jenisBarang`, `jumlahBarang`, `hargaBarang`, `idPengguna`, `idBarang`, `idPembelian`, `created_at`, `updated_at`) VALUES
(1, 'Minuman', '2', '10000', 5, 4, 1, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(2, 'Pakaian', '5', '150000', 6, 3, 4, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(3, 'Pop Corn', '5', '20000', 6, 1, 2, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(4, 'Kopi', '8', '18000', 6, 2, 3, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(5, 'Minuman', '10', '10000', 5, 4, 5, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(6, 'Pop Corn', '2', '20000', 5, 1, 14, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(7, 'Minuman', '2', '10000', 6, 4, 15, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(8, 'Sayur Bayam', '9', '15000', 5, 5, 6, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(9, 'Kopi', '5', '18000', 5, 2, 16, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(10, 'Buah', '3', '32000', 6, 6, 7, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(11, 'Pakaian', '1', '150000', 5, 3, 17, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(12, 'Monitor', '4', '2500000', 6, 7, 8, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(13, 'Monitor', '6', '2500000', 5, 7, 18, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(14, 'Kabel', '12', '45000', 5, 8, 9, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(15, 'Sepatu', '6', '400000', 6, 9, 10, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(16, 'Sayur Bayam', '6', '15000', 6, 5, 19, '2023-02-04 06:55:00', '2023-02-04 05:57:19'),
(17, 'Minuman', '3', '10000', 5, 4, 20, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(18, 'Kaos Kaki', '7', '8500', 5, 10, 12, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(19, 'Sepatu', '3', '400000', 5, 9, 13, '2023-02-04 06:39:42', '2023-02-04 05:57:19'),
(20, 'Kaos Kaki', '2', '8500', 6, 10, 11, '2023-02-04 06:55:00', '2023-02-04 05:57:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idPembelian` int NOT NULL,
  `jumlahPembelian` int NOT NULL DEFAULT '0',
  `hargaBeli` varchar(50) NOT NULL DEFAULT '0',
  `idPengguna` int NOT NULL,
  `idBarang` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idPembelian`, `jumlahPembelian`, `hargaBeli`, `idPengguna`, `idBarang`) VALUES
(1, 2, '10000', 5, 4),
(2, 5, '20000', 6, 1),
(3, 8, '18000', 6, 2),
(4, 5, '150000', 6, 3),
(5, 10, '10000', 5, 4),
(6, 9, '15000', 5, 5),
(7, 3, '32000', 6, 6),
(8, 4, '2500000', 6, 7),
(9, 12, '45000', 5, 8),
(10, 6, '400000', 6, 9),
(11, 2, '8500', 6, 10),
(12, 7, '8500', 5, 10),
(13, 3, '400000', 5, 9),
(14, 2, '20000', 5, 1),
(15, 2, '10000', 6, 4),
(16, 5, '18000', 5, 2),
(17, 1, '150000', 5, 3),
(18, 6, '2500000', 5, 7),
(19, 6, '15000', 6, 5),
(20, 3, '10000', 5, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` int NOT NULL,
  `namaPengguna` varchar(100) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL DEFAULT '0',
  `namaDepan` varchar(100) NOT NULL DEFAULT '0',
  `namaBelakang` varchar(100) NOT NULL DEFAULT '0',
  `noHp` varchar(100) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `idAkses` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `namaPengguna`, `password`, `namaDepan`, `namaBelakang`, `noHp`, `alamat`, `idAkses`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Oishi', 'Ola', '082242341236', 'Cinere', 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Kurir', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Widya', 'Arum Amalia', '082242341234', 'Pondok Cabe', 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Supplier', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Amalia', 'Solehah', '082242341232', 'Citayam', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Admin Sosprom', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Caramela', 'Raisa', '082242341231', 'Tangerang Selatan', 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Pengguna A', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Dini', 'Miss', '082242341235', 'Grogol', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Pengguna B', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Jendral', 'Sudirman', '082242341237', 'Ciganjur', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Customer Sevices', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Raden', 'Agung', '082242341239', 'Cipete', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Admin Return Produk', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Bagus', 'Adi', '082242341239', 'Cinangka', 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Admin Pengelola Katergori', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Aryo', 'Pamungkas', '08224230234', 'Banyumas', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Manajer', '$2a$12$PmM7nEAXPLbQGGsHcp4kduaH3psCJJbJT3Pzx2JpSaf6HTSJb8wKG', 'Kayyis', 'Putri', '082102341234', 'Purwokerto', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'rifqiiardhian', '$2y$10$WUuA8xc3c2rIXh660bNM8uQq2K2P6bsGmKl1ducESiHHH4/1/1ykC', 'Rifqi', 'Ardhian', '081334457150', 'Jalan Bendungan Wlingi No.30', 1, '2023-02-04 12:13:42', '2023-02-04 12:13:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` int NOT NULL,
  `jumlahPenjualan` int DEFAULT NULL,
  `hargaJual` varchar(50) DEFAULT NULL,
  `idPengguna` int DEFAULT NULL,
  `idBarang` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `jumlahPenjualan`, `hargaJual`, `idPengguna`, `idBarang`) VALUES
(1, 20, '10000', 3, 4),
(2, 15, '18000', 3, 2),
(3, 13, '20000', 3, 1),
(4, 25, '8500', 3, 10),
(5, 20, '2500000', 3, 7),
(6, 100, '150000', 3, 3),
(7, 10, '400000', 3, 9),
(8, 17, '15000', 3, 5),
(9, 30, '32000', 3, 6),
(10, 50, '45000', 3, 8),
(11, 8, '8500', 3, 16),
(12, 10, '12.500', 3, 11),
(13, 5, '2000', 3, 12),
(14, 42, '1000', 3, 15),
(15, 20, '21500', 3, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `idSupplier` int NOT NULL,
  `jumlahSupply` int NOT NULL DEFAULT '0',
  `jenisSupply` varchar(50) NOT NULL,
  `idPengguna` int NOT NULL DEFAULT '0',
  `idBarang` int NOT NULL DEFAULT '0',
  `idPenjualan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`idSupplier`, `jumlahSupply`, `jenisSupply`, `idPengguna`, `idBarang`, `idPenjualan`, `created_at`, `updated_at`) VALUES
(1, 20, 'Minuman', 3, 4, 1, '2023-02-04 06:52:54', '2023-02-04 06:42:13'),
(2, 15, 'Kopi', 3, 2, 2, '2023-02-04 06:52:54', '2023-02-04 06:43:10'),
(3, 13, 'Pop Corn', 3, 1, 3, '2023-02-04 06:52:54', '2023-02-04 06:43:33'),
(4, 25, 'Kaos Kaki', 3, 10, 4, '2023-02-04 06:52:54', '2023-02-04 06:43:38'),
(5, 20, 'Monitor', 3, 7, 5, '2023-02-04 06:52:54', '2023-02-04 06:43:44'),
(6, 100, 'Pakaian', 3, 3, 6, '2023-02-04 06:52:54', '2023-02-04 06:43:47'),
(7, 10, 'Sepatu', 3, 9, 7, '2023-02-04 06:52:54', '2023-02-04 06:43:51'),
(8, 17, 'Sayur Bayam', 3, 5, 8, '2023-02-04 06:52:54', '2023-02-04 06:43:55'),
(9, 30, 'Buah', 3, 6, 9, '2023-02-04 06:52:54', '2023-02-04 06:44:01'),
(10, 50, 'Kabel', 3, 8, 10, '2023-02-04 06:52:54', '2023-02-04 06:44:06'),
(11, 8, 'Hanger', 3, 16, 11, '2023-02-04 06:52:54', '2023-02-04 06:44:10'),
(12, 10, 'Buku Tulis', 3, 11, 12, '2023-02-04 06:52:54', '2023-02-04 06:44:16'),
(13, 5, 'Gelas Pecah Belah', 3, 12, 13, '2023-02-04 06:52:54', '2023-02-04 06:44:22'),
(14, 42, 'Kertas Kado', 3, 15, 14, '2023-02-04 06:52:54', '2023-02-04 06:44:29'),
(15, 20, 'Masker', 3, 14, 15, '2023-02-04 06:52:54', '2023-02-04 06:44:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`) USING BTREE,
  ADD KEY `FK_barang_pengguna` (`idPengguna`) USING BTREE;

--
-- Indeks untuk tabel `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`idAkses`) USING BTREE;

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`) USING BTREE,
  ADD KEY `FK_pelanggan_pengguna` (`idPengguna`) USING BTREE,
  ADD KEY `FK_pelanggan_barang` (`idBarang`) USING BTREE,
  ADD KEY `FK_pelanggan_pembelian` (`idPembelian`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idPembelian`) USING BTREE,
  ADD KEY `FK_pembelian_pengguna` (`idPengguna`) USING BTREE,
  ADD KEY `FK_pembelian_barang` (`idBarang`) USING BTREE;

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`) USING BTREE,
  ADD KEY `FK_pengguna_hakakses` (`idAkses`) USING BTREE;

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`) USING BTREE,
  ADD KEY `FK_penjualan_pengguna` (`idPengguna`) USING BTREE,
  ADD KEY `FK_penjualan_barang` (`idBarang`) USING BTREE;

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idSupplier`) USING BTREE,
  ADD KEY `FK_supplier_pengguna` (`idPengguna`) USING BTREE,
  ADD KEY `FK_supplier_barang` (`idBarang`) USING BTREE,
  ADD KEY `FK_supplier_penjualan` (`idPenjualan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idBarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `idAkses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idPembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idPengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idPenjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idSupplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_barang_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`);

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `FK_pelanggan_pembelian` FOREIGN KEY (`idPembelian`) REFERENCES `pembelian` (`idPembelian`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `FK_pembelian_barang` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `FK_pembelian_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`);

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_pengguna_hakakses` FOREIGN KEY (`idAkses`) REFERENCES `hakakses` (`idAkses`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `FK_penjualan_barang` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`),
  ADD CONSTRAINT `FK_penjualan_pengguna` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`);

--
-- Ketidakleluasaan untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `FK_supplier_penjualan` FOREIGN KEY (`idPenjualan`) REFERENCES `penjualan` (`idPenjualan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
