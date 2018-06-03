-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2018 pada 09.26
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `penjualanayam_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(100) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(500) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `stok_barang` int(50) NOT NULL,
  `harga_barang` int(100) NOT NULL,
  `thumbnail` varchar(400) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi_barang`, `stok_barang`, `harga_barang`, `thumbnail`) VALUES
(1, 'Ayam Potong', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 104, 18000, 'ayampotong1.jpg'),
(3, 'Ayam Kampung', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 12, 40000, 'Cari-Dimana-Jual-Ayam-Potong-Kualitas-Terbaik.jpg'),
(13, 'Ayam Bule', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120, 18000, 'ayam-jantan.jpg'),
(14, 'Ayam Bangkok', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 120, 18000, 'ayampotong1.jpg'),
(17, 'Ayam Boiler Jantan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 23, 23000, 'ayampotong1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `jumlah_beli` int(20) NOT NULL,
  `total_bayar` int(80) NOT NULL,
  `status_transaksi` int(5) NOT NULL,
  `bukti` varchar(400) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_barang`, `jumlah_beli`, `total_bayar`, `status_transaksi`, `bukti`, `tanggal`) VALUES
(4, 7, 13, 10, 180000, 0, 'asciicode.jpg', '2018-06-03 06:43:39'),
(6, 7, 3, 4, 160000, 0, 'asciicode.jpg', '2018-06-03 08:22:11'),
(7, 4, 1, 13, 234000, 2, '', '2018-06-03 08:37:12'),
(8, 4, 3, 2, 80000, 2, '', '2018-06-03 09:03:43'),
(11, 9, 1, 16, 288000, 0, 'asciicode.jpg', '2018-06-03 13:56:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `user_profile`
--

INSERT INTO `user_profile` (`id_user`, `nama_user`, `email`, `username`, `password`, `hak_akses`, `tanggal`) VALUES
(3, 'Admin', 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', 'Admin', '2018-06-02 14:30:27'),
(4, 'Mukidi', 'google@mukidi.com', 'mukidi', '47b55511386d44681b64c36aaa7f5fe3', 'pelanggan', '2018-06-02 13:52:03'),
(7, 'Beny', 'begog@mukidi.com', 'begog', '202cb962ac59075b964b07152d234b70', 'pelanggan', '2018-06-02 18:17:12'),
(9, 'Aldi Ansyah', 'aldi@mukidi.com', 'aldi', '5cf15fc7e77e85f5d525727358c0ffc9', 'pelanggan', '2018-06-02 19:12:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
