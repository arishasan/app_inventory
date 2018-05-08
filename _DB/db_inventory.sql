-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Apr 2018 pada 08.00
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `pb_no_siswa` varchar(20) NOT NULL,
  `pb_nama_siswa` varchar(100) DEFAULT NULL,
  `status_peminjaman` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`pb_no_siswa`, `pb_nama_siswa`, `status_peminjaman`) VALUES
('S001', 'Aris', 1),
('S002', 'Hasan', 0),
('S003', 'Ubaidillah', 1),
('S004', 'Nanda', 1),
('S005', 'Rifaturrahman', 1),
('S006', 'John Doe', 1),
('S007', 'Natalia', 1),
('S008', 'Clojure', 1),
('S009', 'Cloes', 1),
('S010', 'Sam White', 1),
('S011', 'Caroline Jr.', 1),
('S012', 'Black Plagues', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `td_peminjaman_barang`
--

CREATE TABLE `td_peminjaman_barang` (
  `pbd_id` varchar(20) NOT NULL,
  `pb_id` varchar(20) DEFAULT NULL,
  `br_kode` varchar(12) DEFAULT NULL,
  `pdb_tgl` datetime DEFAULT NULL,
  `pdb_sts` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `td_peminjaman_barang`
--

INSERT INTO `td_peminjaman_barang` (`pbd_id`, `pb_id`, `br_kode`, `pdb_tgl`, `pdb_sts`) VALUES
('PJ201711001001', 'PJ201711001', 'BRG0001', '2017-11-01 19:37:51', '0'),
('PJ201711001002', 'PJ201711001', 'BRG0002', '2017-11-01 19:37:51', '0'),
('PJ201711002001', 'PJ201711002', 'BRG0003', '2017-11-02 21:08:10', '0'),
('PJ201711002002', 'PJ201711002', 'BRG0004', '2017-11-02 21:08:10', '0'),
('PJ201711003001', 'PJ201711003', 'BRG0009', '2017-11-02 22:28:27', '0'),
('PJ201711003002', 'PJ201711003', 'BRG0008', '2017-11-02 22:28:27', '0'),
('PJ201711004001', 'PJ201711004', 'BRG0003', '2017-11-03 06:15:39', '0'),
('PJ201711004002', 'PJ201711004', 'BRG0004', '2017-11-03 06:15:39', '0'),
('PJ201711005001', 'PJ201711005', 'BRG0003', '2017-11-03 07:25:23', '0'),
('PJ201711005002', 'PJ201711005', 'BRG0004', '2017-11-03 07:25:23', '0'),
('PJ201711006001', 'PJ201711006', 'BRG0003', '2017-11-03 07:52:03', '0'),
('PJ201711006002', 'PJ201711006', 'BRG0004', '2017-11-03 07:52:03', '0'),
('PJ201711007001', 'PJ201711007', 'BRG0005', '2017-11-05 00:06:44', '0'),
('PJ201711007002', 'PJ201711007', 'BRG0006', '2017-11-05 00:06:44', '0'),
('PJ201711008001', 'PJ201711008', 'INV2017002', '2017-11-06 20:20:54', '0'),
('PJ201711008002', 'PJ201711008', 'INV2017001', '2017-11-06 20:20:54', '0'),
('PJ201711008003', 'PJ201711008', 'BRG0009', '2017-11-06 20:20:54', '0'),
('PJ201711009001', 'PJ201711009', 'BRG0001', '2017-11-06 20:26:50', '0'),
('PJ201711009002', 'PJ201711009', 'BRG0002', '2017-11-06 20:26:50', '0'),
('PJ201711010001', 'PJ201711010', 'BRG0008', '2017-11-06 20:54:55', '0'),
('PJ201711011001', 'PJ201711011', 'INV2017006', '2017-11-07 08:16:20', '0'),
('PJ201711011002', 'PJ201711011', 'INV2017005', '2017-11-07 08:16:20', '0'),
('PJ201801012001', 'PJ201801012', 'INV2017002', '2018-01-30 09:26:27', '0'),
('PJ201801012002', 'PJ201801012', 'INV2017003', '2018-01-30 09:26:27', '0'),
('PJ201801012003', 'PJ201801012', 'INV2017004', '2018-01-30 09:26:27', '0'),
('PJ201804013001', 'PJ201804013', 'BRG0001', '2018-04-11 19:05:10', '1'),
('PJ201804013002', 'PJ201804013', 'BRG0002', '2018-04-11 19:05:10', '1'),
('PJ201804013003', 'PJ201804013', 'BRG0003', '2018-04-11 19:05:10', '1');

--
-- Trigger `td_peminjaman_barang`
--
DELIMITER $$
CREATE TRIGGER `ubah_peminjaman_stat_parent` AFTER UPDATE ON `td_peminjaman_barang` FOR EACH ROW BEGIN 

	UPDATE tm_peminjaman SET pb_stat= '0' WHERE pb_id = NEW.pb_id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_barang_inventaris`
--

CREATE TABLE `tm_barang_inventaris` (
  `br_kode` varchar(12) NOT NULL,
  `jns_brg_kode` varchar(5) DEFAULT NULL,
  `user_id` varchar(110) DEFAULT NULL,
  `br_nama` varchar(50) DEFAULT NULL,
  `br_tgl_terima` date DEFAULT NULL,
  `br_tgl_entry` datetime DEFAULT NULL,
  `br_status` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_barang_inventaris`
--

INSERT INTO `tm_barang_inventaris` (`br_kode`, `jns_brg_kode`, `user_id`, `br_nama`, `br_tgl_terima`, `br_tgl_entry`, `br_status`) VALUES
('BRG0001', 'J001', '4', 'Buku Aladin', '2017-10-30', '2018-01-30 09:23:15', '1'),
('BRG0002', 'J002', '4', 'Komputer Zyrex', '2017-10-30', '2018-01-30 09:23:38', '1'),
('BRG0003', 'J003', '1', 'Laptop MSI', '2017-10-30', '2017-10-30 09:00:00', '1'),
('BRG0004', 'J004', '1', 'Rak Buku Besi', '2017-10-30', '2017-10-30 09:00:00', '1'),
('BRG0005', 'J005', '1', 'Buku Absen XII RPL 1', '2017-10-30', '2017-10-30 09:00:00', '1'),
('BRG0006', 'J006', '1', 'Mikroskop RT-02', '2017-10-30', '2017-10-30 09:00:00', '1'),
('BRG0007', 'J007', '1', 'Papan Tulis Putih KONI', '2017-10-31', '2017-10-31 09:00:00', '1'),
('BRG0008', 'J008', '1', 'Spidol Cap kaki tiga', '2017-10-31', '2017-10-31 09:00:00', '1'),
('BRG0009', 'J009', '1', 'TV Burem 3x', '2017-10-31', '2017-10-31 09:00:00', '2'),
('BRG0010', 'J010', '1', 'Penggaris Lentur', '2017-10-31', '2017-10-31 09:00:00', '3'),
('BRG0011', 'J006', '1', 'RT-11123', '2017-11-10', '2017-11-05 00:59:53', '0'),
('INV2017001', 'J001', '1', 'Buku One Piece', '2017-11-05', '2017-11-05 01:29:25', '1'),
('INV2017002', 'J001', '1', 'Buku Bleach', '2017-11-05', '2017-11-05 01:29:43', '1'),
('INV2017003', 'J001', '1', 'Buku Pemrograman WEB', '2017-11-07', '2017-11-07 08:00:45', '1'),
('INV2017004', 'J002', '1', 'PC Rakitan AMD Ryzen 5', '2017-11-07', '2017-11-07 08:01:03', '1'),
('INV2017005', 'J003', '1', 'Razer Cortex 3D Manauver', '2017-11-07', '2017-11-07 08:01:24', '1'),
('INV2017006', 'J007', '1', 'Black board', '2017-11-07', '2017-11-07 08:01:36', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_peminjaman`
--

CREATE TABLE `tm_peminjaman` (
  `pb_id` varchar(20) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `pb_tgl` datetime DEFAULT NULL,
  `pb_no_siswa` varchar(20) DEFAULT NULL,
  `pb_harus_kembali_tgl` datetime DEFAULT NULL,
  `pb_stat` varchar(2) DEFAULT NULL COMMENT '''0 untuk record hapus'',''1 sedang pinjam'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_peminjaman`
--

INSERT INTO `tm_peminjaman` (`pb_id`, `user_id`, `pb_tgl`, `pb_no_siswa`, `pb_harus_kembali_tgl`, `pb_stat`) VALUES
('PJ201711001', '1', '2017-11-01 19:37:51', 'S001', '2017-11-05 00:37:00', '0'),
('PJ201711002', '1', '2017-11-02 21:08:10', 'S002', '2017-11-02 00:08:00', '0'),
('PJ201711003', '1', '2017-11-02 22:28:27', 'S002', '2017-11-02 15:28:00', '0'),
('PJ201711004', '1', '2017-11-03 06:15:39', 'S002', '2017-11-08 00:00:00', '0'),
('PJ201711005', '1', '2017-11-03 07:25:23', 'S002', '2017-11-06 00:25:00', '0'),
('PJ201711006', '1', '2017-11-03 07:52:03', 'S002', '2017-11-06 00:51:00', '0'),
('PJ201711007', '1', '2017-11-05 00:06:44', 'S010', '2017-11-09 17:06:00', '0'),
('PJ201711008', '4', '2017-11-06 20:20:54', 'S001', '2017-11-11 13:20:00', '0'),
('PJ201711009', '4', '2017-11-06 20:26:50', 'S004', '2017-11-12 13:26:00', '0'),
('PJ201711010', '4', '2017-11-06 20:43:58', 'S002', '2017-11-13 13:49:00', '0'),
('PJ201711011', '4', '2017-11-07 08:02:49', 'S012', '2017-11-10 20:16:00', '0'),
('PJ201801012', '4', '2018-01-30 09:26:27', 'S002', '2018-02-03 10:00:00', '0'),
('PJ201804013', '4', '2018-04-11 19:05:10', 'S007', '2018-04-18 22:00:00', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_pengembalian`
--

CREATE TABLE `tm_pengembalian` (
  `kembali_id` varchar(20) NOT NULL,
  `pb_id` varchar(20) DEFAULT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `kembali_tgl` datetime DEFAULT NULL,
  `kembali_sts` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_pengembalian`
--

INSERT INTO `tm_pengembalian` (`kembali_id`, `pb_id`, `user_id`, `kembali_tgl`, `kembali_sts`) VALUES
('KB201711001', 'PJ201711002', '1', '2017-11-02 22:24:18', '1'),
('KB201711002', 'PJ201711003', '1', '2017-11-02 22:30:17', '1'),
('KB201711003', 'PJ201711004', '1', '2017-11-03 06:16:11', '1'),
('KB201711004', 'PJ201711005', '1', '2017-11-03 07:51:01', '1'),
('KB201711005', 'PJ201711006', '4', '2017-11-06 20:17:57', '1'),
('KB201711006', 'PJ201711001', '4', '2017-11-06 20:19:11', '1'),
('KB201801007', 'PJ201711007', '4', '2018-01-25 17:36:37', '1'),
('KB201801008', 'PJ201711008', '4', '2018-01-25 17:36:43', '1'),
('KB201801009', 'PJ201711009', '4', '2018-01-25 17:36:48', '1'),
('KB201801010', 'PJ201711010', '4', '2018-01-25 17:36:52', '1'),
('KB201801011', 'PJ201711011', '4', '2018-01-25 17:36:57', '1'),
('KB201804012', 'PJ201801012', '4', '2018-04-11 19:05:39', '1');

--
-- Trigger `tm_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `update_peminjaman_barang` AFTER INSERT ON `tm_pengembalian` FOR EACH ROW BEGIN 

	UPDATE td_peminjaman_barang SET pdb_sts= '0' WHERE pb_id = NEW.pb_id;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tm_user`
--

CREATE TABLE `tm_user` (
  `user_id` int(10) NOT NULL,
  `user_nama` varchar(50) DEFAULT NULL,
  `user_pass` varchar(90) DEFAULT NULL,
  `user_hak` varchar(2) DEFAULT NULL,
  `user_sts` varchar(2) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tm_user`
--

INSERT INTO `tm_user` (`user_id`, `user_nama`, `user_pass`, `user_hak`, `user_sts`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'superuser', '$2y$10$IwncZhiXWeB7cgnlr53.cuzmHAxMfkDGX2.dDvJwasVR6AsxeImeq', 'su', '1', '2017-11-04 14:14:22', '2017-11-04 14:14:22', 'GLEnXD6spJcmJP74hjygBewWa5MaWajH4K8EZ4ghUryvB9kABJgSmT58YyIL'),
(2, 'user', '$2y$10$7QMsAVEP3fXlJi0ElVgpgOJNdC8DD7KL3iW6kkJeCbS.WGMHAK2HW', 'us', '1', '2017-11-04 14:14:23', '2017-11-04 14:14:23', 'Y0P7NmaXgJLfWHzxzYD3hCofQHQhaoxmPyxvP5ES43J9ElUcsTfD5Wxzwvjo'),
(3, 'admin', '$2y$10$VY4nK9cupZLOmBZ4xM1RJ.5vungkyUlfz.Nu4TtMue3YdX9nCTi.2', 'ad', '1', '2017-11-04 14:14:23', '2017-11-04 14:14:23', '9Uksky37otBtH27Yvt823iGccgeyVoPEFd2wqihDZmHtXWIScmmCk0lBvP0g'),
(4, 'aris', '$2y$10$JvjH5yNK/1uvvN9AKIIZZ.iV9rKscFY98V3mcAdBq7Eu/G.JMJsIa', 'su', '1', '2017-11-05 08:52:35', '2017-11-05 08:40:57', '8LKF6oSYU892u6pRF7n8vWoAhKiE3CXWg8yIVUI6yJNN9VlLojJQbsDkegxU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_jenis_barang`
--

CREATE TABLE `tr_jenis_barang` (
  `jns_brg_kode` varchar(5) NOT NULL,
  `jns_brg_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_jenis_barang`
--

INSERT INTO `tr_jenis_barang` (`jns_brg_kode`, `jns_brg_nama`) VALUES
('J001', 'Buku'),
('J002', 'Komputer'),
('J003', 'Laptop'),
('J004', 'Rak Buku'),
('J005', 'Buku Absen'),
('J006', 'Mikroskop'),
('J007', 'Papan Tulis'),
('J008', 'Spidol'),
('J009', 'TV'),
('J010', 'Penggaris'),
('J011', 'Perkakas'),
('J012', 'Cleaner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`pb_no_siswa`);

--
-- Indexes for table `td_peminjaman_barang`
--
ALTER TABLE `td_peminjaman_barang`
  ADD PRIMARY KEY (`pbd_id`);

--
-- Indexes for table `tm_barang_inventaris`
--
ALTER TABLE `tm_barang_inventaris`
  ADD PRIMARY KEY (`br_kode`);

--
-- Indexes for table `tm_peminjaman`
--
ALTER TABLE `tm_peminjaman`
  ADD PRIMARY KEY (`pb_id`);

--
-- Indexes for table `tm_pengembalian`
--
ALTER TABLE `tm_pengembalian`
  ADD PRIMARY KEY (`kembali_id`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tr_jenis_barang`
--
ALTER TABLE `tr_jenis_barang`
  ADD PRIMARY KEY (`jns_brg_kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
