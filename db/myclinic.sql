-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Apr 2021 pada 09.37
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myclinic`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `parameter`
--

CREATE TABLE `parameter` (
  `aplication_name` varchar(50) NOT NULL,
  `initial` varchar(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parameter`
--

INSERT INTO `parameter` (`aplication_name`, `initial`, `address`, `telp`) VALUES
('My Clinic', 'MC', 'Jln. Andakasa Gang V, Denpasar - Bali', '(0361)112233');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank`
--

CREATE TABLE `tb_bank` (
  `fs_id_bank` int(11) NOT NULL,
  `fs_kd_bank` varchar(10) NOT NULL,
  `fs_nm_bank` varchar(50) NOT NULL,
  `fs_kd_jenis_kartu` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`fs_id_bank`, `fs_kd_bank`, `fs_nm_bank`, `fs_kd_jenis_kartu`, `fb_aktif`) VALUES
(1, 'BN0001', 'BCA DEBIT', 1, 1),
(2, 'BN0002', 'BCA CREDIT', 2, 1),
(3, 'BN0003', 'MANDIRI DEBIT', 1, 1),
(4, 'BN0004', 'MANDIRI CREDIT', 2, 1),
(5, 'BN0005', 'BNI DEBIT', 1, 1),
(6, 'BN0006', 'BNI CREDIT', 2, 1),
(7, 'BN0007', 'BRI DEBIT', 1, 1),
(8, 'BN0008', 'BRI CREDIT', 2, 1),
(9, 'BN0001', 'PANIN DEBIT', 1, 1),
(10, 'BN0002', 'PANIN CREDIT', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `fs_id_barang` int(11) NOT NULL,
  `fs_kd_barang` varchar(10) NOT NULL,
  `fs_kd_barcode` varchar(100) NOT NULL,
  `fs_nm_barang` varchar(100) NOT NULL,
  `fs_id_golongan` int(11) NOT NULL,
  `fs_id_group` int(11) NOT NULL,
  `fs_id_satuan` int(11) NOT NULL,
  `fs_id_rekapcetak` int(11) NOT NULL,
  `fs_id_etiket` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_hna` int(11) NOT NULL,
  `fn_profit` int(11) NOT NULL,
  `fn_harga_jual` int(11) NOT NULL,
  `fn_stok` int(11) NOT NULL,
  `fn_stok_min` int(11) NOT NULL,
  `fn_stok_max` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`fs_id_barang`, `fs_kd_barang`, `fs_kd_barcode`, `fs_nm_barang`, `fs_id_golongan`, `fs_id_group`, `fs_id_satuan`, `fs_id_rekapcetak`, `fs_id_etiket`, `fn_harga_beli`, `fn_hna`, `fn_profit`, `fn_harga_jual`, `fn_stok`, `fn_stok_min`, `fn_stok_max`, `fb_aktif`) VALUES
(1, 'BR0001', '111111', 'Amoxilin', 1, 1, 11, 2, 3, 1000, 1100, 0, 2000, 60, 10, 100, 1),
(2, 'BR0002', '222222', 'Asam Mefenamat', 1, 1, 11, 2, 3, 2000, 2200, 0, 3000, 60, 10, 100, 1),
(3, 'BR000003', '333333', 'Bodrex', 1, 1, 11, 2, 3, 1000, 1100, 10, 0, 20, 10, 100, 1),
(4, 'BR000004', '444444', 'Paracetamol', 4, 1, 11, 2, 3, 6000, 6600, 20, 0, 30, 10, 100, 1),
(5, 'BR000005', '555555', 'Sanmol Drop', 1, 1, 10, 2, 3, 5000, 5000, 20, 0, 15, 10, 100, 1),
(6, 'BR000006', '666666', 'Panadol', 1, 1, 13, 2, 5, 5000, 5500, 25, 0, 15, 10, 100, 1),
(7, 'BR000007', 'BR000007', 'Konidin', 2, 1, 12, 2, 0, 1000, 1100, 20, 0, 50, 10, 100, 1),
(8, 'BR000008', '888888', 'Kursi Roda', 4, 3, 7, 2, 4, 9000000, 9000000, 0, 15000000, 1, 1, 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_distributor`
--

CREATE TABLE `tb_distributor` (
  `fs_id_distributor` int(11) NOT NULL,
  `fs_kd_distributor` varchar(10) NOT NULL,
  `fs_nm_distributor` varchar(100) NOT NULL,
  `fs_telp_distributor` varchar(20) NOT NULL,
  `fs_alamat_distributor` text NOT NULL,
  `fs_deskripsi_distributor` text NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_distributor`
--

INSERT INTO `tb_distributor` (`fs_id_distributor`, `fs_kd_distributor`, `fs_nm_distributor`, `fs_telp_distributor`, `fs_alamat_distributor`, `fs_deskripsi_distributor`, `fb_aktif`) VALUES
(1, 'DS0001', 'Kimia Farma', '(0361)112233', 'Jln. Diponegoro, Denpasar', 'Distributor obat-obatan', 1),
(2, 'DS0002', 'AAM', '(021)667788', 'Jln. Sudirman, Jakarta Utara', 'Suplier Alkes', 1),
(3, 'DS0003', 'Apotik Bintang', '(0361)5566677', 'Denpasar', 'Dist Obat dan ALKES', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_etiket`
--

CREATE TABLE `tb_etiket` (
  `fs_id_etiket` int(11) NOT NULL,
  `fs_kd_etiket` varchar(10) NOT NULL,
  `fs_nm_etiket` text NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_etiket`
--

INSERT INTO `tb_etiket` (`fs_id_etiket`, `fs_kd_etiket`, `fs_nm_etiket`, `fb_aktif`) VALUES
(1, 'ET0001', 'Diminum 1 x sehari setelah makan ', 1),
(2, 'ET0002', 'Diminum 2 x sehari setelah makan ', 1),
(3, 'ET0003', 'Diminum 3 x sehari setelah makan', 1),
(4, 'ET0004', 'Dioleskan pada bagian yang luka', 1),
(5, 'ET0005', 'Diminum setiap 6 jam', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `fs_id_golongan` int(11) NOT NULL,
  `fs_kd_golongan` varchar(10) NOT NULL,
  `fs_nm_golongan` varchar(100) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_golongan`
--

INSERT INTO `tb_golongan` (`fs_id_golongan`, `fs_kd_golongan`, `fs_nm_golongan`, `fb_aktif`) VALUES
(1, 'GL0001', 'Antibiotik', 1),
(2, 'GL0002', 'Antivirus', 1),
(3, 'GL0003', 'Infus', 1),
(4, 'GL0004', 'Analgetik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_group`
--

CREATE TABLE `tb_group` (
  `fs_id_group` int(11) NOT NULL,
  `fs_kd_group` varchar(10) NOT NULL,
  `fs_nm_group` varchar(100) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_group`
--

INSERT INTO `tb_group` (`fs_id_group`, `fs_kd_group`, `fs_nm_group`, `fb_aktif`) VALUES
(1, 'GR0001', 'Generik', 1),
(2, 'GR0002', 'Non Generik', 1),
(3, 'GR0003', 'Non obat', 1),
(4, 'GR0004', 'ATK (Alat Tulis Kantor)', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `fs_id_satuan` int(11) NOT NULL,
  `fs_kd_satuan` varchar(10) NOT NULL,
  `fs_nm_satuan` varchar(100) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`fs_id_satuan`, `fs_kd_satuan`, `fs_nm_satuan`, `fb_aktif`) VALUES
(7, 'ST0007', 'Pcs', 1),
(8, 'ST0008', 'Box', 1),
(9, 'ST0009', 'Ampul', 1),
(10, 'ST0010', 'Botol', 1),
(11, 'ST0011', 'Tablet', 1),
(12, 'ST0012', 'Kapsul', 1),
(13, 'ST0013', 'Pepel', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_adjustment`
--

CREATE TABLE `tb_trs_adjustment` (
  `fs_id_adjustment` int(11) NOT NULL,
  `fs_kd_adjustment` varchar(10) NOT NULL,
  `fs_id_pegawai` int(11) NOT NULL,
  `fn_total_nilai_beli` int(11) NOT NULL,
  `fn_jenis_bayar` int(11) NOT NULL,
  `fs_keterangan` text NOT NULL,
  `fd_tgl_adjustment` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_adjustment`
--

INSERT INTO `tb_trs_adjustment` (`fs_id_adjustment`, `fs_kd_adjustment`, `fs_id_pegawai`, `fn_total_nilai_beli`, `fn_jenis_bayar`, `fs_keterangan`, `fd_tgl_adjustment`, `fd_tgl_void`, `fs_id_user`) VALUES
(4, 'AJ00000005', 3, 500000, 0, '', '2021-03-10', '0000-00-00', 1),
(5, 'AJ00000006', 3, 110000, 0, 'Barang salah di keluarkan', '2021-04-01', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_adjustment_detail`
--

CREATE TABLE `tb_trs_adjustment_detail` (
  `fs_id_adjustment_detail` int(11) NOT NULL,
  `fs_id_adjustment` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fn_stok_awal` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_stok_akhir` int(11) NOT NULL,
  `fn_total_harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_adjustment_detail`
--

INSERT INTO `tb_trs_adjustment_detail` (`fs_id_adjustment_detail`, `fs_id_adjustment`, `fs_id_barang`, `fn_stok_awal`, `fn_harga_beli`, `fn_qty`, `fn_stok_akhir`, `fn_total_harga_beli`) VALUES
(5, 4, 5, 0, 5000, 100, 100, 500000),
(6, 5, 5, 40, 5000, 10, 50, 50000),
(7, 5, 6, 40, 5000, 10, 50, 50000),
(8, 5, 7, 90, 1000, 10, 100, 10000);

--
-- Trigger `tb_trs_adjustment_detail`
--
DELIMITER $$
CREATE TRIGGER `stok_adjust` AFTER INSERT ON `tb_trs_adjustment_detail` FOR EACH ROW BEGIN
	UPDATE tb_barang SET  fn_stok = fn_stok + NEW.fn_qty
    WHERE fs_id_barang = NEW.fs_id_barang;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_cart_adjustment`
--

CREATE TABLE `tb_trs_cart_adjustment` (
  `fs_id_cart_adjustment` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_stok` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_stok_akhir` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_cart_pembelian`
--

CREATE TABLE `tb_trs_cart_pembelian` (
  `fs_id_cart_pembelian` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_pajak` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_cart_penjualan`
--

CREATE TABLE `tb_trs_cart_penjualan` (
  `fs_id_cart_penjualan` int(11) NOT NULL,
  `fs_id_barang` varchar(11) NOT NULL,
  `fs_id_etiket` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_harga_jual` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_cart_racik`
--

CREATE TABLE `tb_trs_cart_racik` (
  `fs_id_cart_racik` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fs_id_etiket` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_harga_jual` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_cart_retur`
--

CREATE TABLE `tb_trs_cart_retur` (
  `fs_id_cart_retur` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_pembelian`
--

CREATE TABLE `tb_trs_pembelian` (
  `fs_id_pembelian` int(11) NOT NULL,
  `fs_kd_pembelian` varchar(10) NOT NULL,
  `fs_id_distributor` int(11) NOT NULL,
  `fn_nilai_beli` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_total_nilai_beli` int(11) NOT NULL,
  `fn_jenis_bayar` int(11) NOT NULL,
  `fs_keterangan` text NOT NULL,
  `fd_tgl_bayar` date NOT NULL,
  `fd_tgl_pembelian` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_pembelian`
--

INSERT INTO `tb_trs_pembelian` (`fs_id_pembelian`, `fs_kd_pembelian`, `fs_id_distributor`, `fn_nilai_beli`, `fn_diskon`, `fn_total_nilai_beli`, `fn_jenis_bayar`, `fs_keterangan`, `fd_tgl_bayar`, `fd_tgl_pembelian`, `fd_tgl_void`, `fs_id_user`) VALUES
(1, 'PB00000007', 3, 115500, 0, 115500, 1, '', '2021-03-24', '2021-03-24', '0000-00-00', 1),
(2, 'PB00000008', 1, 217800, 0, 217800, 2, 'Akan di bayarkan bulan depan', '2021-04-24', '2021-03-24', '0000-00-00', 1),
(3, 'PB00000009', 3, 9000000, 0, 9000000, 1, 'lunas', '2021-04-01', '2021-04-01', '0000-00-00', 1),
(4, 'PB00000010', 3, 77000, 0, 77000, 2, 'Pembayaran bulan depan', '2021-05-01', '2021-04-01', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_pembelian_detail`
--

CREATE TABLE `tb_trs_pembelian_detail` (
  `fs_id_pembelian_detail` int(11) NOT NULL,
  `fs_id_pembelian` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon_harga_beli` int(11) NOT NULL,
  `fn_pajak_beli` int(11) NOT NULL,
  `fn_hna` int(11) NOT NULL,
  `fn_total_harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_pembelian_detail`
--

INSERT INTO `tb_trs_pembelian_detail` (`fs_id_pembelian_detail`, `fs_id_pembelian`, `fs_id_barang`, `fn_harga_beli`, `fn_qty`, `fn_diskon_harga_beli`, `fn_pajak_beli`, `fn_hna`, `fn_total_harga_beli`) VALUES
(1, 1, 4, 6000, 15, 0, 10, 6600, 99000),
(2, 1, 3, 1000, 15, 0, 10, 1100, 16500),
(3, 2, 7, 1000, 15, 0, 10, 1100, 16500),
(4, 2, 6, 5000, 30, 0, 10, 5500, 165000),
(5, 2, 2, 2000, 11, 0, 10, 2200, 24200),
(6, 2, 1, 1000, 11, 0, 10, 1100, 12100),
(7, 3, 8, 9000000, 1, 0, 0, 9000000, 9000000),
(8, 4, 4, 6000, 10, 0, 10, 6600, 66000),
(9, 4, 3, 1000, 10, 0, 10, 1100, 11000);

--
-- Trigger `tb_trs_pembelian_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_plus` AFTER INSERT ON `tb_trs_pembelian_detail` FOR EACH ROW BEGIN
	UPDATE tb_barang SET  fn_stok = fn_stok + NEW.fn_qty, fn_harga_beli = NEW.fn_harga_beli, fn_hna = NEW.fn_hna
    WHERE fs_id_barang = NEW.fs_id_barang;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_penjualan`
--

CREATE TABLE `tb_trs_penjualan` (
  `fs_id_penjualan` int(11) NOT NULL,
  `fs_kd_penjualan` varchar(10) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_nilai_beli` int(11) NOT NULL,
  `fn_nilai_jual` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_total_nilai_jual` int(11) NOT NULL,
  `fd_tgl_penjualan` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_penjualan`
--

INSERT INTO `tb_trs_penjualan` (`fs_id_penjualan`, `fs_kd_penjualan`, `fs_id_registrasi`, `fn_nilai_beli`, `fn_nilai_jual`, `fn_diskon`, `fn_total_nilai_jual`, `fd_tgl_penjualan`, `fd_tgl_void`, `fs_id_user`) VALUES
(64, 'PJ00000063', 42, 78000, 94910, 0, 94910, '2021-03-10', '0000-00-00', 1),
(65, 'PJ00000064', 45, 60000, 76900, 0, 76900, '2021-03-16', '0000-00-00', 1),
(66, 'PJ00000065', 51, 90000, 113075, 0, 113075, '2021-04-01', '2021-04-01', 1),
(67, 'PJ00000066', 51, 425000, 549375, 0, 549375, '2021-04-01', '2021-04-01', 1),
(68, 'PJ00000067', 51, 77000, 99790, 0, 99790, '2021-04-01', '0000-00-00', 1),
(69, 'PJ00000068', 51, 128000, 176860, 0, 176860, '2021-04-01', '0000-00-00', 1),
(70, 'PJ00000069', 51, 9000000, 14000000, 0, 14000000, '2021-04-01', '2021-04-01', 1),
(71, 'PJ00000071', 51, 2000, 2420, 0, 2420, '2021-04-03', '0000-00-00', 1),
(72, 'PJ00000072', 51, 8000, 9680, 0, 9680, '2021-04-03', '0000-00-00', 1),
(73, 'PJ00000073', 51, 125000, 162275, 0, 162275, '2021-04-03', '0000-00-00', 1),
(74, 'PJ00000074', 52, 70000, 76300, 6300, 70000, '2021-04-05', '0000-00-00', 1),
(75, 'PJ00000075', 52, 185000, 238775, 0, 238775, '2021-04-05', '0000-00-00', 1),
(76, 'PJ00000076', 53, 150000, 194200, 0, 194200, '2021-04-06', '0000-00-00', 1),
(77, 'PJ00000077', 54, 105000, 143225, 0, 143225, '2021-04-07', '0000-00-00', 1),
(78, 'PJ00000078', 55, 75000, 108850, 0, 108850, '2021-04-08', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_penjualan_detail`
--

CREATE TABLE `tb_trs_penjualan_detail` (
  `fs_id_penjualan_detail` int(11) NOT NULL,
  `fs_id_penjualan` int(11) NOT NULL,
  `fs_id_racik` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fs_id_etiket` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_harga_jual` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon_harga_jual` int(11) NOT NULL,
  `fn_total_harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_penjualan_detail`
--

INSERT INTO `tb_trs_penjualan_detail` (`fs_id_penjualan_detail`, `fs_id_penjualan`, `fs_id_racik`, `fs_id_barang`, `fs_id_etiket`, `fn_harga_beli`, `fn_harga_jual`, `fn_qty`, `fn_diskon_harga_jual`, `fn_total_harga_jual`) VALUES
(145, 64, 0, 4, 0, 6000, 7200, 7, 0, 50400),
(146, 64, 0, 3, 3, 1000, 1210, 6, 0, 7260),
(147, 64, 41, 7, 0, 1000, 1200, 5, 0, 6000),
(148, 64, 41, 6, 0, 5000, 6250, 5, 0, 31250),
(149, 65, 0, 6, 5, 5000, 6250, 5, 0, 31250),
(150, 65, 42, 4, 0, 6000, 7920, 5, 0, 39600),
(151, 65, 42, 3, 0, 1000, 1210, 5, 0, 6050),
(152, 66, 0, 5, 3, 5000, 6000, 10, 0, 60000),
(153, 66, 0, 3, 3, 1000, 1210, 10, 0, 12100),
(154, 66, 43, 7, 0, 1000, 1320, 5, 0, 6600),
(155, 66, 43, 6, 0, 5000, 6875, 5, 0, 34375),
(156, 67, 0, 5, 3, 5000, 6000, 40, 0, 240000),
(157, 67, 0, 6, 5, 5000, 6875, 45, 0, 309375),
(158, 68, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(159, 68, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(160, 68, 44, 7, 0, 1000, 1320, 2, 0, 2640),
(161, 68, 44, 6, 0, 5000, 6875, 4, 0, 27500),
(162, 68, 44, 5, 0, 5000, 6000, 4, 0, 24000),
(163, 69, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(164, 69, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(165, 69, 46, 6, 0, 5000, 6875, 6, 0, 41250),
(166, 69, 46, 5, 0, 5000, 6000, 6, 0, 36000),
(167, 69, 47, 2, 0, 2000, 3000, 10, 0, 30000),
(168, 69, 47, 1, 0, 1000, 2000, 10, 0, 20000),
(169, 69, 47, 7, 0, 1000, 1320, 3, 0, 3960),
(170, 70, 0, 8, 4, 9000000, 15000000, 1, 1000000, 14000000),
(171, 0, 0, 7, 0, 1000, 1320, 10, 0, 13200),
(172, 71, 0, 3, 3, 1000, 1210, 2, 0, 2420),
(173, 72, 0, 3, 3, 1000, 1210, 8, 0, 9680),
(174, 73, 0, 4, 3, 6000, 7920, 10, 0, 79200),
(175, 73, 0, 3, 3, 1000, 1210, 10, 0, 12100),
(176, 73, 48, 7, 0, 1000, 1320, 5, 0, 6600),
(177, 73, 48, 6, 0, 5000, 6875, 5, 0, 34375),
(178, 73, 48, 5, 0, 5000, 6000, 5, 0, 30000),
(179, 74, 0, 4, 3, 6000, 7920, 10, 1000, 69200),
(180, 74, 0, 3, 3, 1000, 1210, 10, 500, 7100),
(181, 75, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(182, 75, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(183, 75, 49, 5, 0, 5000, 6000, 15, 0, 90000),
(184, 75, 49, 6, 0, 5000, 6875, 15, 0, 103125),
(185, 76, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(186, 76, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(187, 76, 50, 7, 0, 1000, 1320, 15, 0, 19800),
(188, 76, 50, 6, 0, 5000, 6875, 10, 0, 68750),
(189, 76, 50, 5, 0, 5000, 6000, 10, 0, 60000),
(190, 77, 0, 5, 3, 5000, 6000, 5, 0, 30000),
(191, 77, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(192, 77, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(193, 77, 51, 1, 0, 1000, 2000, 10, 0, 20000),
(194, 77, 51, 7, 0, 1000, 1320, 10, 0, 13200),
(195, 77, 51, 6, 0, 5000, 6875, 5, 0, 34375),
(196, 78, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(197, 78, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(198, 78, 52, 2, 0, 2000, 3000, 10, 0, 30000),
(199, 78, 52, 1, 0, 1000, 2000, 10, 0, 20000),
(200, 78, 52, 7, 0, 1000, 1320, 10, 0, 13200);

--
-- Trigger `tb_trs_penjualan_detail`
--
DELIMITER $$
CREATE TRIGGER `stok_min` AFTER INSERT ON `tb_trs_penjualan_detail` FOR EACH ROW BEGIN
	UPDATE tb_barang SET  fn_stok = fn_stok - NEW.fn_qty
    WHERE fs_id_barang = NEW.fs_id_barang;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_racik`
--

CREATE TABLE `tb_trs_racik` (
  `fs_id_racik` int(11) NOT NULL,
  `fs_id_penjualan` int(11) NOT NULL,
  `fs_kd_racik` varchar(10) NOT NULL,
  `fs_nm_racik` varchar(100) NOT NULL,
  `fs_id_satuan` int(11) NOT NULL,
  `fn_qty_racik` int(11) NOT NULL,
  `fs_id_etiket` int(11) NOT NULL,
  `fn_nilai_beli_racik` int(11) NOT NULL,
  `fn_nilai_jual_racik` int(11) NOT NULL,
  `fd_tgl_racik` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_racik`
--

INSERT INTO `tb_trs_racik` (`fs_id_racik`, `fs_id_penjualan`, `fs_kd_racik`, `fs_nm_racik`, `fs_id_satuan`, `fn_qty_racik`, `fs_id_etiket`, `fn_nilai_beli_racik`, `fn_nilai_jual_racik`, `fd_tgl_racik`, `fd_tgl_void`, `fs_id_user`) VALUES
(41, 64, 'RCK0000041', 'Racik 1', 12, 10, 3, 30000, 37250, '2021-03-10', '0000-00-00', 1),
(42, 65, 'RCK0000042', 'Racik 1', 13, 10, 4, 35000, 45650, '2021-03-16', '0000-00-00', 1),
(43, 66, 'RCK0000043', 'Racik Panas', 12, 10, 3, 30000, 40975, '2021-04-01', '0000-00-00', 1),
(44, 68, 'RCK0000044', 'Racik Panas', 12, 10, 3, 42000, 54140, '2021-04-01', '0000-00-00', 1),
(46, 69, 'RCK0000046', 'Racik 1', 13, 10, 5, 60000, 77250, '2021-04-01', '0000-00-00', 1),
(47, 69, 'RCK0000047', 'Racik 2', 12, 10, 4, 33000, 53960, '2021-04-01', '0000-00-00', 1),
(48, 73, 'RCK0000048', 'Racik Demam', 12, 20, 3, 55000, 70975, '2021-04-03', '0000-00-00', 1),
(49, 75, 'RCK0000049', 'Racik Panas', 12, 10, 3, 150000, 193125, '2021-04-05', '0000-00-00', 1),
(50, 76, 'RCK0000050', 'Racik Panas', 12, 20, 3, 115000, 148550, '2021-04-06', '0000-00-00', 1),
(51, 77, 'RCK0000051', 'Racik demam', 12, 20, 3, 45000, 67575, '2021-04-07', '0000-00-00', 1),
(52, 78, 'RCK0000052', 'Racik Obat Demam', 7, 10, 5, 40000, 63200, '2021-04-08', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_racik_detail`
--

CREATE TABLE `tb_trs_racik_detail` (
  `fs_id_racik_detail` int(11) NOT NULL,
  `fs_id_racik` int(11) NOT NULL,
  `fs_id_penjualan` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fs_id_etiket` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_harga_jual` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_racik_detail`
--

INSERT INTO `tb_trs_racik_detail` (`fs_id_racik_detail`, `fs_id_racik`, `fs_id_penjualan`, `fs_id_barang`, `fs_id_etiket`, `fn_harga_beli`, `fn_harga_jual`, `fn_qty`, `fn_diskon`, `fn_total`, `fs_id_user`) VALUES
(81, 41, 64, 7, 0, 1000, 1200, 5, 0, 6000, 1),
(82, 41, 64, 6, 0, 5000, 6250, 5, 0, 31250, 1),
(83, 42, 65, 4, 0, 6000, 7920, 5, 0, 39600, 1),
(84, 42, 65, 3, 0, 1000, 1210, 5, 0, 6050, 1),
(85, 43, 66, 7, 0, 1000, 1320, 5, 0, 6600, 1),
(86, 43, 66, 6, 0, 5000, 6875, 5, 0, 34375, 1),
(87, 44, 68, 7, 0, 1000, 1320, 2, 0, 2640, 1),
(88, 44, 68, 6, 0, 5000, 6875, 4, 0, 27500, 1),
(89, 44, 68, 5, 0, 5000, 6000, 4, 0, 24000, 1),
(92, 46, 69, 6, 0, 5000, 6875, 6, 0, 41250, 1),
(93, 46, 69, 5, 0, 5000, 6000, 6, 0, 36000, 1),
(94, 47, 69, 2, 0, 2000, 3000, 10, 0, 30000, 1),
(95, 47, 69, 1, 0, 1000, 2000, 10, 0, 20000, 1),
(96, 47, 69, 7, 0, 1000, 1320, 3, 0, 3960, 1),
(97, 48, 73, 7, 0, 1000, 1320, 5, 0, 6600, 1),
(98, 48, 73, 6, 0, 5000, 6875, 5, 0, 34375, 1),
(99, 48, 73, 5, 0, 5000, 6000, 5, 0, 30000, 1),
(100, 49, 75, 5, 0, 5000, 6000, 15, 0, 90000, 1),
(101, 49, 75, 6, 0, 5000, 6875, 15, 0, 103125, 1),
(102, 50, 76, 7, 0, 1000, 1320, 15, 0, 19800, 1),
(103, 50, 76, 6, 0, 5000, 6875, 10, 0, 68750, 1),
(104, 50, 76, 5, 0, 5000, 6000, 10, 0, 60000, 1),
(105, 51, 77, 1, 0, 1000, 2000, 10, 0, 20000, 1),
(106, 51, 77, 7, 0, 1000, 1320, 10, 0, 13200, 1),
(107, 51, 77, 6, 0, 5000, 6875, 5, 0, 34375, 1),
(108, 52, 78, 2, 0, 2000, 3000, 10, 0, 30000, 1),
(109, 52, 78, 1, 0, 1000, 2000, 10, 0, 20000, 1),
(110, 52, 78, 7, 0, 1000, 1320, 10, 0, 13200, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_retur`
--

CREATE TABLE `tb_trs_retur` (
  `fs_id_retur` int(11) NOT NULL,
  `fs_kd_retur` varchar(10) NOT NULL,
  `fs_id_distributor` int(11) NOT NULL,
  `fn_total_nilai_beli` int(11) NOT NULL,
  `fn_jenis_bayar` int(11) NOT NULL,
  `fs_keterangan` text NOT NULL,
  `fd_tgl_retur` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_retur`
--

INSERT INTO `tb_trs_retur` (`fs_id_retur`, `fs_kd_retur`, `fs_id_distributor`, `fn_total_nilai_beli`, `fn_jenis_bayar`, `fs_keterangan`, `fd_tgl_retur`, `fd_tgl_void`, `fs_id_user`) VALUES
(1, 'RU00000007', 3, 10000, 2, 'Barang sudah expired', '2021-04-01', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trs_retur_detail`
--

CREATE TABLE `tb_trs_retur_detail` (
  `fs_id_retur_detail` int(11) NOT NULL,
  `fs_id_retur` int(11) NOT NULL,
  `fs_id_barang` int(11) NOT NULL,
  `fn_harga_beli` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_total_harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_trs_retur_detail`
--

INSERT INTO `tb_trs_retur_detail` (`fs_id_retur_detail`, `fs_id_retur`, `fs_id_barang`, `fn_harga_beli`, `fn_qty`, `fn_total_harga_beli`) VALUES
(1, 1, 1, 1000, 10, 10000);

--
-- Trigger `tb_trs_retur_detail`
--
DELIMITER $$
CREATE TRIGGER `stok_min_retur` AFTER INSERT ON `tb_trs_retur_detail` FOR EACH ROW BEGIN
	UPDATE tb_barang SET  fn_stok = fn_stok - NEW.fn_qty
    WHERE fs_id_barang = NEW.fs_id_barang;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_agama`
--

CREATE TABLE `t_agama` (
  `fs_kd_agama` int(11) NOT NULL,
  `fs_nm_agama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_agama`
--

INSERT INTO `t_agama` (`fs_kd_agama`, `fs_nm_agama`) VALUES
(1, 'Islam'),
(2, 'Hindu'),
(3, 'Khatolik'),
(4, 'Kristen'),
(5, 'Budha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jaminan`
--

CREATE TABLE `t_jaminan` (
  `fs_id_jaminan` int(11) NOT NULL,
  `fs_kd_jaminan` varchar(10) NOT NULL,
  `fs_nm_jaminan` varchar(100) NOT NULL,
  `fs_alamat` varchar(100) NOT NULL,
  `fs_telp` varchar(50) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jaminan`
--

INSERT INTO `t_jaminan` (`fs_id_jaminan`, `fs_kd_jaminan`, `fs_nm_jaminan`, `fs_alamat`, `fs_telp`, `fb_aktif`) VALUES
(1, 'JM0001', 'BPJS', 'Jln. Hayam Wuruk Denpasar', '(0361) 112233', 1),
(2, 'JM0002', 'Prudential', 'Jln. Gunung Agung', '(021)667788', 1),
(3, 'JM0003', 'Umum / Pribadi', '---', '---', 1),
(4, 'JM0004', 'Jasa Raharja', 'Jln Gunung Agung', '(021)667788', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jns_kelamin`
--

CREATE TABLE `t_jns_kelamin` (
  `fs_kd_kelamin` int(11) NOT NULL,
  `fs_nm_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_jns_kelamin`
--

INSERT INTO `t_jns_kelamin` (`fs_kd_kelamin`, `fs_nm_kelamin`) VALUES
(1, 'Pria'),
(2, 'Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karcis`
--

CREATE TABLE `t_karcis` (
  `fs_id_karcis` int(11) NOT NULL,
  `fs_kd_karcis` varchar(10) NOT NULL,
  `fs_nm_karcis` varchar(100) NOT NULL,
  `fs_id_rekapcetak` int(11) NOT NULL,
  `fn_nilai` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_karcis`
--

INSERT INTO `t_karcis` (`fs_id_karcis`, `fs_kd_karcis`, `fs_nm_karcis`, `fs_id_rekapcetak`, `fn_nilai`, `fb_aktif`) VALUES
(1, 'KC0001', 'Karcis Rawat Jalan', 6, 5000, 1),
(2, 'KC0002', 'Karcis Poli Dalam', 6, 10000, 1),
(3, 'KC0003', 'Karcis Poli Bedah', 1, 100000, 0),
(4, 'KC0004', 'Karcis Poli Bedah', 1, 100000, 0),
(5, 'KC0005', 'Karcis Poli Bedah', 6, 50000, 1),
(6, 'KC0006', 'Karcis Poli Urologi', 6, 100000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komponen`
--

CREATE TABLE `t_komponen` (
  `fs_id_komponen` int(11) NOT NULL,
  `fs_kd_komponen` varchar(10) NOT NULL,
  `fs_nm_komponen` varchar(100) NOT NULL,
  `fb_medis` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_komponen`
--

INSERT INTO `t_komponen` (`fs_id_komponen`, `fs_kd_komponen`, `fs_nm_komponen`, `fb_medis`, `fb_aktif`) VALUES
(1, 'KP0001', 'Jasa Sarana', 0, 1),
(2, 'KP0002', 'Jasa Dr Spesialist', 1, 1),
(3, 'KP0003', 'Jasa Pelayanan', 0, 1),
(4, 'KP0005', 'Laboratorium', 0, 1),
(5, 'KP0006', 'Jasa Perawat', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_layanan`
--

CREATE TABLE `t_layanan` (
  `fs_id_layanan` int(11) NOT NULL,
  `fs_kd_layanan` varchar(10) NOT NULL,
  `fs_nm_layanan` varchar(50) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_layanan`
--

INSERT INTO `t_layanan` (`fs_id_layanan`, `fs_kd_layanan`, `fs_nm_layanan`, `fb_aktif`) VALUES
(2, 'LY0001', 'Poli Dalam', 1),
(3, 'LY0002', 'Poli Obgyn', 1),
(4, 'LY0003', 'Poli Mata', 1),
(5, 'LY0004', 'Poli Umum', 1),
(6, 'LY0005', 'Radiologi', 1),
(7, 'LY0006', 'Laboratorium', 1),
(8, 'LY0007', 'Poli Bedah Urologi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_no`
--

CREATE TABLE `t_no` (
  `fs_trs` varchar(10) NOT NULL,
  `fs_nm_trs` varchar(50) NOT NULL,
  `fn_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_no`
--

INSERT INTO `t_no` (`fs_trs`, `fs_nm_trs`, `fn_no`) VALUES
('AJ', 'ADJUSTMENT', 7),
('BN', 'BANK', 3),
('BR', 'BARANG', 9),
('CT', 'CATATAN TERINTEGRASI (SOAP)', 14),
('DS', 'DISTRIBUTOR', 4),
('DX', 'PEMBAYARAN TRANSAKSI', 28),
('ET', 'ETIKET', 6),
('GL', 'GOLONGAN', 5),
('GR', 'GROUP', 5),
('JM', 'JAMINAN', 5),
('KC', 'KARCIS', 7),
('KP', 'KOMPONEN TARIF', 7),
('LY', 'LAYANAN', 8),
('PB', 'PEMBELIAN BARANG', 11),
('PG', 'PEGAWAI', 4),
('PJ', 'PENJUALAN BARANG', 79),
('RC', 'REKAP CETAK', 7),
('RCK', 'RACIK', 53),
('RG', 'REGISTER', 50),
('RM', 'REKAM MEDIS', 10),
('RU', 'RETUR', 8),
('SM', 'SATUAN MEDIS', 6),
('ST', 'SATUAN BARANG', 14),
('TM', 'TINDAKAN MEDIS', 17),
('TU', 'TINDAKAN UMUM', 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `fs_id_pegawai` int(11) NOT NULL,
  `fs_kd_pegawai` varchar(10) NOT NULL,
  `fs_nm_pegawai` varchar(100) NOT NULL,
  `fs_kd_kelamin` int(11) NOT NULL,
  `fd_tgl_lahir` date NOT NULL,
  `fs_alamat` text NOT NULL,
  `fs_telp` varchar(50) NOT NULL,
  `fs_id_satgas` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pegawai`
--

INSERT INTO `t_pegawai` (`fs_id_pegawai`, `fs_kd_pegawai`, `fs_nm_pegawai`, `fs_kd_kelamin`, `fd_tgl_lahir`, `fs_alamat`, `fs_telp`, `fs_id_satgas`, `fb_aktif`) VALUES
(1, 'PG00001', 'dr. Royan', 1, '1986-06-17', 'Jln denpasar', '081999123660', 1, 1),
(2, 'PG00002', 'dr. Musafa', 1, '2020-11-18', 'Denpasar', '081999123660', 1, 1),
(3, 'PG00003', 'Risa', 2, '1995-06-28', 'Jln. Gunung Karang, Denpasar', '081222333444', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rekapcetak`
--

CREATE TABLE `t_rekapcetak` (
  `fs_id_rekapcetak` int(11) NOT NULL,
  `fs_kd_rekapcetak` varchar(10) NOT NULL,
  `fs_nm_rekapcetak` varchar(100) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rekapcetak`
--

INSERT INTO `t_rekapcetak` (`fs_id_rekapcetak`, `fs_kd_rekapcetak`, `fs_nm_rekapcetak`, `fb_aktif`) VALUES
(1, 'RC0001', 'Tindakan Medis', 1),
(2, 'RC0002', 'Obat', 1),
(3, 'RC0003', 'Laboratorium', 1),
(4, 'RC0004', 'Radiologi', 1),
(5, 'RC0005', 'Tindakan Bedah', 1),
(6, 'RC0006', 'Karcis Pendaftaran', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rm`
--

CREATE TABLE `t_rm` (
  `fs_id_rm` int(11) NOT NULL,
  `fs_kd_rm` varchar(20) NOT NULL,
  `fs_nm_pasien` varchar(100) NOT NULL,
  `fs_kd_kelamin` int(11) NOT NULL,
  `fs_tmpt_lahir` varchar(50) NOT NULL,
  `fd_tgl_lahir` date NOT NULL,
  `fs_alamat` text NOT NULL,
  `fs_telp` varchar(20) NOT NULL,
  `fs_identitas` varchar(20) NOT NULL,
  `fs_kd_agama` int(11) NOT NULL,
  `fd_tgl_rm` date NOT NULL,
  `fd_tgl_update` date NOT NULL,
  `fs_kd_user` int(11) NOT NULL,
  `fb_aktif_reg` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_rm`
--

INSERT INTO `t_rm` (`fs_id_rm`, `fs_kd_rm`, `fs_nm_pasien`, `fs_kd_kelamin`, `fs_tmpt_lahir`, `fd_tgl_lahir`, `fs_alamat`, `fs_telp`, `fs_identitas`, `fs_kd_agama`, `fd_tgl_rm`, `fd_tgl_update`, `fs_kd_user`, `fb_aktif_reg`, `fb_aktif`) VALUES
(10, 'RM0000001', 'Teguh Syahrian', 1, 'Negara', '1990-10-09', 'Jembrana ', '081999123660', '123123', 1, '2020-10-16', '2020-11-23', 1, 0, 1),
(11, 'RM0000002', 'Budi Gunawan Candra', 1, 'Karangasem', '1988-01-01', 'Karangasem', '08177887766', '112233', 2, '2020-10-16', '0000-00-00', 1, 0, 1),
(12, 'RM0000003', 'Nia Ramadhan', 2, 'Jakarta', '2000-02-14', 'Jln Jakarta', '(0361) 112233', '112233', 3, '2020-10-16', '0000-00-00', 1, 0, 1),
(13, 'RM0000004', 'Rahmat Andara', 1, 'Negara', '1990-07-01', 'Gianyar', '0819995566', '445566', 1, '2020-10-20', '0000-00-00', 1, 0, 1),
(14, 'RM0000005', 'Hendra Rama', 1, 'Negara', '2020-11-23', 'Tabanan', '08199912366', '123123', 2, '2020-11-23', '2020-11-23', 1, 0, 1),
(15, 'RM0000006', 'Hasan Ansori', 1, 'Negara', '2020-11-09', 'Denpasar', '081999123660', '123123', 2, '2020-11-23', '2020-11-23', 1, 0, 1),
(16, 'RM0000007', 'Tamara', 2, 'Jakarta', '2020-11-25', 'Denpasar', '081999123660', '123123', 5, '2020-11-23', '0000-00-00', 1, 0, 1),
(17, 'RM0000008', 'Martha', 2, 'Negara', '1997-01-28', 'Denpasar', '081999123660', '112233', 1, '2020-12-28', '0000-00-00', 1, 0, 1),
(18, 'RM0000009', 'Adi Rabka', 1, 'Banyuwangi', '1992-02-01', 'Denpasar', '081999123660', '9090909090', 1, '2021-01-14', '0000-00-00', 1, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_satgas`
--

CREATE TABLE `t_satgas` (
  `fs_id_satgas` int(11) NOT NULL,
  `fs_kd_satgas` varchar(10) NOT NULL,
  `fs_nm_satgas` varchar(50) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_satgas`
--

INSERT INTO `t_satgas` (`fs_id_satgas`, `fs_kd_satgas`, `fs_nm_satgas`, `fb_aktif`) VALUES
(1, 'SM00001', 'Dokter', 1),
(2, 'SM00002', 'Perawat', 1),
(3, 'SM00003', 'Apoteker', 1),
(4, 'SM00004', 'Kasir', 1),
(5, 'SM00005', 'Staff', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_soap`
--

CREATE TABLE `t_soap` (
  `fs_id_soap` int(11) NOT NULL,
  `fs_kd_soap` varchar(10) NOT NULL,
  `fs_id_rm` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fs_subjective` text NOT NULL,
  `fs_objective` text NOT NULL,
  `fs_assesment` text NOT NULL,
  `fs_planing` text NOT NULL,
  `fs_id_pegawai` int(11) NOT NULL,
  `fd_tgl_soap` date NOT NULL,
  `fd_tgl_update` date NOT NULL,
  `fs_id_user` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_soap`
--

INSERT INTO `t_soap` (`fs_id_soap`, `fs_kd_soap`, `fs_id_rm`, `fs_id_registrasi`, `fs_subjective`, `fs_objective`, `fs_assesment`, `fs_planing`, `fs_id_pegawai`, `fd_tgl_soap`, `fd_tgl_update`, `fs_id_user`, `fb_aktif`) VALUES
(1, 'CT00000009', 10, 9, 'asjdaklj daldjal asld ald salk', 'alsd aljd ald la dlas jd', 'la dla dla dla dl', 'asd ald asld ad asl d', 1, '2020-12-02', '0000-00-00', 1, 1),
(2, 'CT00000010', 10, 10, 'jahdaskjd aksjd akjsd hsk ', ' akd akd ', 'd kah dkas dk', ' dkass dkas kdah sdk', 1, '2020-12-02', '0000-00-00', 1, 1),
(3, 'CT00000011', 10, 9, 'Kepala terasa pusing ', 'Suhu : 36.5\"\nTensi : 110/90\nBerat badan : 70kg\nTiinggi badan : 180cm', 'Gejala masuk angin', 'Diberikan obat masuk angin', 1, '2020-12-02', '0000-00-00', 1, 1),
(4, 'CT00000012', 10, 9, 'Kelapa sakit dan dada sesak', 'Suhu : 37.5*\nTinggi : 180 cm\nBerat : 70kg\nTensi : 110/90', 'Gejala covid', 'Swab Test', 1, '2020-12-02', '0000-00-00', 1, 1),
(5, 'CT00000013', 10, 9, 'kahdkjahdkj akhak dk', 'ak akdh akd akdh ', 'akdakdh akd ak dh', 'kasd kaj dkas dk', 1, '2020-12-02', '0000-00-00', 1, 1),
(6, 'CT00000014', 11, 25, 'kkkmzkxmzk', 'kxmkmskmd', 'skmksm', 'kmk', 0, '2020-12-11', '0000-00-00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif`
--

CREATE TABLE `t_tarif` (
  `fs_id_tarif` int(11) NOT NULL,
  `fs_kd_tarif` varchar(10) NOT NULL,
  `fs_nm_tarif` varchar(100) NOT NULL,
  `fs_id_rekapcetak` int(11) NOT NULL,
  `fn_nilai_tarif` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tarif`
--

INSERT INTO `t_tarif` (`fs_id_tarif`, `fs_kd_tarif`, `fs_nm_tarif`, `fs_id_rekapcetak`, `fn_nilai_tarif`, `fb_aktif`) VALUES
(33, 'TM000001', 'Tindakan Keperawatan', 1, 150000, 1),
(34, 'TM000002', 'Tindakan DR Spesialis', 1, 100000, 1),
(35, 'TM000003', 'Abdomen', 4, 50000, 1),
(36, 'TM000004', 'USG', 3, 70000, 1),
(37, 'TM000005', 'Rawat luka', 1, 80000, 1),
(38, 'TM000006', 'Darah Lengkap', 3, 70000, 1),
(39, 'TM000007', 'CT Scan', 4, 40000, 1),
(40, 'TM000008', 'Tindakan Urologi', 1, 100000, 1),
(41, 'TM000009', 'Pemeriksaan Eritrosit', 3, 70000, 1),
(42, 'TM000010', 'Cek Urine Lengkap', 3, 50000, 1),
(43, 'TM000011', 'Tindakan BEdah Ringan', 1, 71000, 1),
(44, 'TM000015', 'Rontgen', 4, 160000, 1),
(45, 'TM000016', 'Debridement', 1, 150000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif_cart`
--

CREATE TABLE `t_tarif_cart` (
  `fs_id_cart` int(11) NOT NULL,
  `fs_id_komponen` int(11) NOT NULL,
  `fn_nilai` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif_cart_layanan`
--

CREATE TABLE `t_tarif_cart_layanan` (
  `fs_id_cart_layanan` int(11) NOT NULL,
  `fs_id_layanan` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif_layanan`
--

CREATE TABLE `t_tarif_layanan` (
  `fs_id_tarif_layanan` int(11) NOT NULL,
  `fs_id_tarif` int(11) NOT NULL,
  `fs_id_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tarif_layanan`
--

INSERT INTO `t_tarif_layanan` (`fs_id_tarif_layanan`, `fs_id_tarif`, `fs_id_layanan`) VALUES
(15, 33, 5),
(16, 34, 5),
(17, 35, 6),
(18, 36, 7),
(19, 37, 5),
(26, 38, 7),
(27, 39, 6),
(28, 40, 8),
(29, 41, 7),
(30, 42, 7),
(31, 43, 8),
(32, 44, 6),
(33, 45, 8),
(34, 45, 5),
(35, 33, 2),
(36, 34, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_tarif_nilai_dtl`
--

CREATE TABLE `t_tarif_nilai_dtl` (
  `fs_id_tarif_nilai_dtl` int(11) NOT NULL,
  `fs_id_tarif` int(11) NOT NULL,
  `fs_id_komponen` int(11) NOT NULL,
  `fn_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_tarif_nilai_dtl`
--

INSERT INTO `t_tarif_nilai_dtl` (`fs_id_tarif_nilai_dtl`, `fs_id_tarif`, `fs_id_komponen`, `fn_nilai`) VALUES
(54, 33, 3, 100000),
(55, 34, 1, 60000),
(56, 34, 2, 40000),
(57, 35, 1, 10000),
(58, 35, 3, 40000),
(59, 36, 1, 30000),
(60, 36, 3, 40000),
(61, 37, 1, 50000),
(62, 37, 3, 30000),
(65, 38, 1, 50000),
(66, 38, 3, 20000),
(67, 39, 1, 10000),
(68, 39, 3, 30000),
(69, 40, 1, 60000),
(70, 40, 2, 40000),
(71, 41, 1, 70000),
(72, 42, 1, 50000),
(74, 43, 1, 70000),
(75, 43, 1, 1000),
(76, 33, 2, 50000),
(77, 44, 1, 100000),
(78, 44, 3, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_billing`
--

CREATE TABLE `t_trs_billing` (
  `fs_id_trs_billing` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fs_kd_trs` varchar(10) NOT NULL,
  `fn_subtotal` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_grandtotal` int(11) NOT NULL,
  `fd_tgl_trs` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_billing`
--

INSERT INTO `t_trs_billing` (`fs_id_trs_billing`, `fs_id_registrasi`, `fs_kd_trs`, `fn_subtotal`, `fn_diskon`, `fn_grandtotal`, `fd_tgl_trs`) VALUES
(108, 42, 'RG00000036', 100000, 0, 100000, '2021-03-10'),
(109, 43, 'RG00000037', 0, 0, 0, '2021-03-10'),
(110, 42, 'TU00000053', 250000, 0, 250000, '2021-03-10'),
(111, 42, 'PJ00000063', 94910, 0, 94910, '2021-03-10'),
(112, 45, 'RG00000039', 100000, 0, 100000, '2021-03-15'),
(113, 46, 'RG00000040', 5000, 0, 5000, '2021-03-15'),
(114, 46, 'TU00000054', 150000, 0, 150000, '2021-03-15'),
(115, 45, 'TU00000055', 180000, 0, 180000, '2021-03-16'),
(116, 45, 'TU00000056', 70000, 0, 70000, '2021-03-16'),
(117, 45, 'PJ00000064', 76900, 0, 76900, '2021-03-16'),
(118, 47, 'RG00000041', 5000, 0, 5000, '2021-03-23'),
(119, 48, 'RG00000042', 100000, 0, 100000, '2021-03-23'),
(120, 49, 'RG00000043', 10000, 0, 10000, '2021-03-23'),
(121, 43, 'TU00000057', 420000, 20000, 400000, '2021-03-24'),
(122, 45, 'TU00000058', 250000, 0, 250000, '2021-03-24'),
(123, 50, 'RG00000044', 50000, 0, 50000, '2021-03-24'),
(124, 51, 'RG00000045', 5000, 0, 5000, '2021-04-01'),
(125, 51, 'TU00000059', 200000, 0, 200000, '2021-04-01'),
(128, 51, 'PJ00000067', 99790, 0, 99790, '2021-04-01'),
(129, 51, 'PJ00000068', 176860, 0, 176860, '2021-04-01'),
(130, 51, 'PJ00000070', 13200, 0, 13200, '2021-04-03'),
(131, 51, 'PJ00000071', 2420, 0, 2420, '2021-04-03'),
(132, 51, 'PJ00000072', 9680, 0, 9680, '2021-04-03'),
(133, 51, 'PJ00000073', 162275, 0, 162275, '2021-04-03'),
(134, 51, 'TU00000060', 100000, 20000, 80000, '2021-04-03'),
(135, 52, 'RG00000046', 100000, 0, 100000, '2021-04-05'),
(136, 52, 'TU00000061', 90000, 20000, 70000, '2021-04-05'),
(137, 52, 'PJ00000074', 76300, 6300, 70000, '2021-04-05'),
(138, 52, 'TU00000062', 221000, 0, 221000, '2021-04-05'),
(139, 52, 'PJ00000075', 238775, 0, 238775, '2021-04-05'),
(140, 53, 'RG00000047', 5000, 0, 5000, '2021-04-06'),
(141, 53, 'TU00000063', 480000, 0, 480000, '2021-04-06'),
(142, 53, 'PJ00000076', 194200, 0, 194200, '2021-04-06'),
(143, 54, 'RG00000048', 10000, 0, 10000, '2021-04-07'),
(144, 54, 'TU00000064', 150000, 0, 150000, '2021-04-07'),
(145, 54, 'PJ00000077', 143225, 0, 143225, '2021-04-07'),
(146, 55, 'RG00000049', 100000, 0, 100000, '2021-04-08'),
(147, 55, 'TU00000065', 321000, 0, 321000, '2021-04-08'),
(148, 55, 'PJ00000078', 108850, 0, 108850, '2021-04-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_registrasi`
--

CREATE TABLE `t_trs_registrasi` (
  `fs_id_registrasi` int(11) NOT NULL,
  `fs_kd_registrasi` varchar(10) NOT NULL,
  `fs_id_rm` int(11) NOT NULL,
  `fs_id_layanan` int(11) NOT NULL,
  `fs_id_pegawai` int(11) NOT NULL,
  `fs_id_jaminan` int(11) NOT NULL,
  `fn_no_polis` varchar(50) NOT NULL,
  `fs_id_karcis` int(11) NOT NULL,
  `fn_nilai` int(11) NOT NULL,
  `fs_id_status_pasien` int(11) NOT NULL,
  `fd_tgl_registrasi` date NOT NULL,
  `fd_tgl_keluar` date NOT NULL,
  `fd_tgl_update` date NOT NULL,
  `fs_id_user` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_registrasi`
--

INSERT INTO `t_trs_registrasi` (`fs_id_registrasi`, `fs_kd_registrasi`, `fs_id_rm`, `fs_id_layanan`, `fs_id_pegawai`, `fs_id_jaminan`, `fn_no_polis`, `fs_id_karcis`, `fn_nilai`, `fs_id_status_pasien`, `fd_tgl_registrasi`, `fd_tgl_keluar`, `fd_tgl_update`, `fs_id_user`, `fb_aktif`) VALUES
(42, 'RG00000036', 10, 8, 1, 3, '', 6, 100000, 3, '2021-03-10', '2021-03-10', '3000-01-01', 1, 1),
(43, 'RG00000037', 13, 5, 2, 1, '123123123', 2, 0, 2, '2021-03-10', '2021-04-01', '2021-03-24', 1, 1),
(44, 'RG00000038', 10, 2, 2, 2, '9898989', 2, 10000, 1, '2021-03-10', '3000-01-01', '3000-01-01', 1, 0),
(45, 'RG00000039', 10, 8, 1, 3, '', 6, 100000, 2, '2021-03-15', '2021-04-01', '3000-01-01', 1, 1),
(46, 'RG00000040', 17, 8, 2, 3, '', 1, 5000, 2, '2021-03-15', '2021-04-01', '3000-01-01', 1, 1),
(47, 'RG00000041', 18, 4, 1, 1, '909090909090', 1, 5000, 1, '2021-03-23', '2021-04-01', '3000-01-01', 1, 1),
(48, 'RG00000042', 11, 2, 2, 3, '', 6, 100000, 1, '2021-03-23', '2021-04-01', '3000-01-01', 1, 1),
(49, 'RG00000043', 14, 8, 1, 4, '45454545', 2, 10000, 1, '2021-03-23', '2021-04-01', '3000-01-01', 1, 1),
(50, 'RG00000044', 15, 7, 2, 4, '1231313123', 5, 50000, 1, '2021-03-24', '2021-04-01', '3000-01-01', 1, 1),
(51, 'RG00000045', 10, 5, 1, 3, '', 1, 5000, 4, '2021-04-01', '2021-04-08', '3000-01-01', 1, 1),
(52, 'RG00000046', 13, 8, 2, 2, '12121212', 6, 100000, 3, '2021-04-05', '2021-04-05', '3000-01-01', 1, 1),
(53, 'RG00000047', 16, 5, 1, 3, '', 1, 5000, 4, '2021-04-06', '2021-04-06', '3000-01-01', 1, 1),
(54, 'RG00000048', 17, 2, 2, 3, '', 2, 10000, 4, '2021-04-07', '2021-04-08', '3000-01-01', 1, 1),
(55, 'RG00000049', 18, 8, 1, 1, '123123', 6, 100000, 4, '2021-04-08', '2021-04-08', '3000-01-01', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_regout`
--

CREATE TABLE `t_trs_regout` (
  `fs_id_regout` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_grandtotal` int(11) NOT NULL,
  `fn_hutang` int(11) NOT NULL,
  `fd_tgl_regout` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_regout`
--

INSERT INTO `t_trs_regout` (`fs_id_regout`, `fs_id_registrasi`, `fn_grandtotal`, `fn_hutang`, `fd_tgl_regout`, `fs_id_user`) VALUES
(22, 42, 444910, 0, '2021-03-10', 1),
(23, 43, 400000, 0, '2021-04-01', 1),
(24, 45, 676900, 0, '2021-04-01', 1),
(25, 46, 155000, 0, '2021-04-01', 1),
(26, 47, 5000, 0, '2021-04-01', 1),
(27, 48, 100000, 0, '2021-04-01', 1),
(28, 49, 10000, 0, '2021-04-01', 1),
(29, 50, 50000, 0, '2021-04-01', 1),
(30, 52, 699775, 49775, '2021-04-05', 1),
(33, 53, 679200, 0, '2021-04-06', 1),
(34, 54, 303225, 0, '2021-04-08', 1),
(35, 51, 749225, 0, '2021-04-08', 1),
(37, 55, 529850, 0, '2021-04-08', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_regout2`
--

CREATE TABLE `t_trs_regout2` (
  `fs_id_regout2` int(11) NOT NULL,
  `fs_kd_regout2` varchar(10) NOT NULL,
  `fs_id_regout` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_cash` int(11) NOT NULL,
  `fs_id_bank_debit` int(11) NOT NULL,
  `fn_no_debit` int(11) NOT NULL,
  `fn_debit` int(11) NOT NULL,
  `fs_id_bank_credit` int(11) NOT NULL,
  `fn_no_credit` int(11) NOT NULL,
  `fn_credit` int(11) NOT NULL,
  `fs_id_jaminan` int(11) NOT NULL,
  `fn_klaim` int(11) NOT NULL,
  `fn_diskon_regout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_regout2`
--

INSERT INTO `t_trs_regout2` (`fs_id_regout2`, `fs_kd_regout2`, `fs_id_regout`, `fs_id_registrasi`, `fn_cash`, `fs_id_bank_debit`, `fn_no_debit`, `fn_debit`, `fs_id_bank_credit`, `fn_no_credit`, `fn_credit`, `fs_id_jaminan`, `fn_klaim`, `fn_diskon_regout`) VALUES
(16, 'DX00000011', 22, 42, 444910, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(17, 'DX00000012', 23, 43, 400000, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(18, 'DX00000013', 24, 45, 676900, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(19, 'DX00000014', 25, 46, 155000, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(20, 'DX00000015', 26, 47, 5000, 0, 0, 0, 0, 0, 0, 1, 0, 0),
(21, 'DX00000016', 27, 48, 100000, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(22, 'DX00000017', 28, 49, 10000, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(23, 'DX00000018', 29, 50, 50000, 0, 0, 0, 0, 0, 0, 4, 0, 0),
(24, 'DX00000019', 30, 52, 650000, 0, 0, 0, 0, 0, 0, 2, 0, 0),
(27, 'DX00000022', 33, 53, 679200, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(28, 'DX00000024', 34, 54, 303225, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(29, 'DX00000025', 35, 51, 749225, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(31, 'DX00000027', 37, 55, 529850, 0, 0, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_tindakan`
--

CREATE TABLE `t_trs_tindakan` (
  `fs_id_trs_tindakan` int(11) NOT NULL,
  `fs_kd_trs_tindakan` varchar(10) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fs_id_layanan` int(11) NOT NULL,
  `fn_subtotal_tindakan` int(11) NOT NULL,
  `fn_nilai_tindakan` int(11) NOT NULL,
  `fn_diskon_tindakan` int(11) NOT NULL,
  `fd_tgl_trs` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_tindakan`
--

INSERT INTO `t_trs_tindakan` (`fs_id_trs_tindakan`, `fs_kd_trs_tindakan`, `fs_id_registrasi`, `fs_id_layanan`, `fn_subtotal_tindakan`, `fn_nilai_tindakan`, `fn_diskon_tindakan`, `fd_tgl_trs`, `fd_tgl_void`, `fs_id_user`) VALUES
(41, 'TU00000053', 42, 8, 250000, 250000, 0, '2021-03-10', '0000-00-00', 1),
(42, 'TU00000054', 46, 8, 150000, 150000, 0, '2021-03-15', '0000-00-00', 1),
(43, 'TU00000055', 45, 8, 180000, 180000, 0, '2021-03-16', '0000-00-00', 1),
(44, 'TU00000056', 45, 7, 70000, 70000, 0, '2021-03-16', '0000-00-00', 1),
(45, 'TU00000057', 43, 5, 420000, 400000, 20000, '2021-03-24', '0000-00-00', 1),
(46, 'TU00000058', 45, 8, 250000, 250000, 0, '2021-03-24', '0000-00-00', 1),
(47, 'TU00000059', 51, 5, 200000, 200000, 0, '2021-04-01', '0000-00-00', 1),
(48, 'TU00000060', 51, 5, 100000, 80000, 20000, '2021-04-03', '0000-00-00', 1),
(49, 'TU00000061', 52, 8, 90000, 70000, 20000, '2021-04-05', '0000-00-00', 1),
(50, 'TU00000062', 52, 8, 221000, 221000, 0, '2021-04-05', '0000-00-00', 1),
(51, 'TU00000063', 53, 5, 480000, 480000, 0, '2021-04-06', '0000-00-00', 1),
(52, 'TU00000064', 54, 2, 150000, 150000, 0, '2021-04-07', '0000-00-00', 1),
(53, 'TU00000065', 55, 8, 321000, 321000, 0, '2021-04-08', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_tindakan2`
--

CREATE TABLE `t_trs_tindakan2` (
  `fs_id_tindakan2` int(11) NOT NULL,
  `fs_id_tindakan` int(11) NOT NULL,
  `fs_id_tarif` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_nilai_tarif` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_tindakan2`
--

INSERT INTO `t_trs_tindakan2` (`fs_id_tindakan2`, `fs_id_tindakan`, `fs_id_tarif`, `fn_qty`, `fn_diskon`, `fn_nilai_tarif`, `fn_total`) VALUES
(73, 41, 34, 1, 0, 100000, 100000),
(74, 41, 33, 1, 0, 150000, 150000),
(75, 42, 45, 1, 0, 150000, 150000),
(76, 43, 37, 1, 0, 80000, 80000),
(77, 43, 34, 1, 0, 100000, 100000),
(78, 44, 38, 1, 0, 70000, 70000),
(79, 45, 36, 2, 10000, 70000, 120000),
(80, 45, 35, 1, 0, 50000, 50000),
(81, 45, 34, 1, 0, 100000, 100000),
(82, 45, 33, 1, 0, 150000, 150000),
(83, 46, 34, 1, 0, 100000, 100000),
(84, 46, 33, 1, 0, 150000, 150000),
(85, 47, 34, 1, 50000, 100000, 50000),
(86, 47, 33, 1, 0, 150000, 150000),
(87, 48, 33, 1, 50000, 150000, 100000),
(88, 49, 40, 1, 10000, 100000, 90000),
(89, 50, 45, 1, 0, 150000, 150000),
(90, 50, 43, 1, 0, 71000, 71000),
(91, 51, 45, 1, 0, 150000, 150000),
(92, 51, 37, 1, 0, 80000, 80000),
(93, 51, 33, 1, 0, 150000, 150000),
(94, 51, 34, 1, 0, 100000, 100000),
(95, 52, 34, 1, 0, 100000, 100000),
(96, 52, 33, 1, 100000, 150000, 50000),
(97, 53, 45, 1, 0, 150000, 150000),
(98, 53, 43, 1, 0, 71000, 71000),
(99, 53, 40, 1, 0, 100000, 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_tindakan_cart`
--

CREATE TABLE `t_trs_tindakan_cart` (
  `fs_id_tindakan_cart` int(11) NOT NULL,
  `fs_id_tarif` int(11) NOT NULL,
  `fs_id_rekapcetak` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_nilai_tarif` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_total` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_tindakan_cart2`
--

CREATE TABLE `t_trs_tindakan_cart2` (
  `fs_id_tindakan_cart2` int(11) NOT NULL,
  `fs_id_tindakan_cart` int(11) NOT NULL,
  `fs_id_tarif` int(11) NOT NULL,
  `fs_id_komponen` int(11) NOT NULL,
  `fn_qty` int(11) NOT NULL,
  `fn_nilai` int(11) NOT NULL,
  `fs_id_pegawai` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin, 2:kasir'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Teguh Syahrian', 'Denpasar, Bali, Indonesia', 1),
(3, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Ian Ec', 'Denpasar', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`fs_id_bank`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`fs_id_barang`);

--
-- Indeks untuk tabel `tb_distributor`
--
ALTER TABLE `tb_distributor`
  ADD PRIMARY KEY (`fs_id_distributor`);

--
-- Indeks untuk tabel `tb_etiket`
--
ALTER TABLE `tb_etiket`
  ADD PRIMARY KEY (`fs_id_etiket`);

--
-- Indeks untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`fs_id_golongan`);

--
-- Indeks untuk tabel `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`fs_id_group`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`fs_id_satuan`);

--
-- Indeks untuk tabel `tb_trs_adjustment`
--
ALTER TABLE `tb_trs_adjustment`
  ADD PRIMARY KEY (`fs_id_adjustment`),
  ADD UNIQUE KEY `fs_kd_pembelian` (`fs_kd_adjustment`);

--
-- Indeks untuk tabel `tb_trs_adjustment_detail`
--
ALTER TABLE `tb_trs_adjustment_detail`
  ADD PRIMARY KEY (`fs_id_adjustment_detail`);

--
-- Indeks untuk tabel `tb_trs_cart_adjustment`
--
ALTER TABLE `tb_trs_cart_adjustment`
  ADD PRIMARY KEY (`fs_id_cart_adjustment`);

--
-- Indeks untuk tabel `tb_trs_cart_pembelian`
--
ALTER TABLE `tb_trs_cart_pembelian`
  ADD PRIMARY KEY (`fs_id_cart_pembelian`);

--
-- Indeks untuk tabel `tb_trs_cart_penjualan`
--
ALTER TABLE `tb_trs_cart_penjualan`
  ADD PRIMARY KEY (`fs_id_cart_penjualan`);

--
-- Indeks untuk tabel `tb_trs_cart_racik`
--
ALTER TABLE `tb_trs_cart_racik`
  ADD PRIMARY KEY (`fs_id_cart_racik`);

--
-- Indeks untuk tabel `tb_trs_cart_retur`
--
ALTER TABLE `tb_trs_cart_retur`
  ADD PRIMARY KEY (`fs_id_cart_retur`);

--
-- Indeks untuk tabel `tb_trs_pembelian`
--
ALTER TABLE `tb_trs_pembelian`
  ADD PRIMARY KEY (`fs_id_pembelian`),
  ADD UNIQUE KEY `fs_kd_pembelian` (`fs_kd_pembelian`);

--
-- Indeks untuk tabel `tb_trs_pembelian_detail`
--
ALTER TABLE `tb_trs_pembelian_detail`
  ADD PRIMARY KEY (`fs_id_pembelian_detail`);

--
-- Indeks untuk tabel `tb_trs_penjualan`
--
ALTER TABLE `tb_trs_penjualan`
  ADD PRIMARY KEY (`fs_id_penjualan`),
  ADD UNIQUE KEY `fs_kd_pembelian` (`fs_kd_penjualan`);

--
-- Indeks untuk tabel `tb_trs_penjualan_detail`
--
ALTER TABLE `tb_trs_penjualan_detail`
  ADD PRIMARY KEY (`fs_id_penjualan_detail`);

--
-- Indeks untuk tabel `tb_trs_racik`
--
ALTER TABLE `tb_trs_racik`
  ADD PRIMARY KEY (`fs_id_racik`);

--
-- Indeks untuk tabel `tb_trs_racik_detail`
--
ALTER TABLE `tb_trs_racik_detail`
  ADD PRIMARY KEY (`fs_id_racik_detail`);

--
-- Indeks untuk tabel `tb_trs_retur`
--
ALTER TABLE `tb_trs_retur`
  ADD PRIMARY KEY (`fs_id_retur`),
  ADD UNIQUE KEY `fs_kd_pembelian` (`fs_kd_retur`);

--
-- Indeks untuk tabel `tb_trs_retur_detail`
--
ALTER TABLE `tb_trs_retur_detail`
  ADD PRIMARY KEY (`fs_id_retur_detail`);

--
-- Indeks untuk tabel `t_agama`
--
ALTER TABLE `t_agama`
  ADD PRIMARY KEY (`fs_kd_agama`);

--
-- Indeks untuk tabel `t_jaminan`
--
ALTER TABLE `t_jaminan`
  ADD PRIMARY KEY (`fs_id_jaminan`);

--
-- Indeks untuk tabel `t_jns_kelamin`
--
ALTER TABLE `t_jns_kelamin`
  ADD PRIMARY KEY (`fs_kd_kelamin`);

--
-- Indeks untuk tabel `t_karcis`
--
ALTER TABLE `t_karcis`
  ADD PRIMARY KEY (`fs_id_karcis`);

--
-- Indeks untuk tabel `t_komponen`
--
ALTER TABLE `t_komponen`
  ADD PRIMARY KEY (`fs_id_komponen`);

--
-- Indeks untuk tabel `t_layanan`
--
ALTER TABLE `t_layanan`
  ADD PRIMARY KEY (`fs_id_layanan`);

--
-- Indeks untuk tabel `t_no`
--
ALTER TABLE `t_no`
  ADD UNIQUE KEY `fs_trs` (`fs_trs`);

--
-- Indeks untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`fs_id_pegawai`);

--
-- Indeks untuk tabel `t_rekapcetak`
--
ALTER TABLE `t_rekapcetak`
  ADD PRIMARY KEY (`fs_id_rekapcetak`);

--
-- Indeks untuk tabel `t_rm`
--
ALTER TABLE `t_rm`
  ADD PRIMARY KEY (`fs_id_rm`);

--
-- Indeks untuk tabel `t_satgas`
--
ALTER TABLE `t_satgas`
  ADD PRIMARY KEY (`fs_id_satgas`);

--
-- Indeks untuk tabel `t_soap`
--
ALTER TABLE `t_soap`
  ADD PRIMARY KEY (`fs_id_soap`);

--
-- Indeks untuk tabel `t_tarif`
--
ALTER TABLE `t_tarif`
  ADD PRIMARY KEY (`fs_id_tarif`);

--
-- Indeks untuk tabel `t_tarif_cart`
--
ALTER TABLE `t_tarif_cart`
  ADD PRIMARY KEY (`fs_id_cart`);

--
-- Indeks untuk tabel `t_tarif_cart_layanan`
--
ALTER TABLE `t_tarif_cart_layanan`
  ADD PRIMARY KEY (`fs_id_cart_layanan`);

--
-- Indeks untuk tabel `t_tarif_layanan`
--
ALTER TABLE `t_tarif_layanan`
  ADD PRIMARY KEY (`fs_id_tarif_layanan`);

--
-- Indeks untuk tabel `t_tarif_nilai_dtl`
--
ALTER TABLE `t_tarif_nilai_dtl`
  ADD PRIMARY KEY (`fs_id_tarif_nilai_dtl`);

--
-- Indeks untuk tabel `t_trs_billing`
--
ALTER TABLE `t_trs_billing`
  ADD PRIMARY KEY (`fs_id_trs_billing`);

--
-- Indeks untuk tabel `t_trs_registrasi`
--
ALTER TABLE `t_trs_registrasi`
  ADD PRIMARY KEY (`fs_id_registrasi`);

--
-- Indeks untuk tabel `t_trs_regout`
--
ALTER TABLE `t_trs_regout`
  ADD PRIMARY KEY (`fs_id_regout`);

--
-- Indeks untuk tabel `t_trs_regout2`
--
ALTER TABLE `t_trs_regout2`
  ADD PRIMARY KEY (`fs_id_regout2`),
  ADD UNIQUE KEY `fs_id_regout2` (`fs_id_regout2`);

--
-- Indeks untuk tabel `t_trs_tindakan`
--
ALTER TABLE `t_trs_tindakan`
  ADD PRIMARY KEY (`fs_id_trs_tindakan`),
  ADD UNIQUE KEY `fs_kd_trs_tindakan` (`fs_kd_trs_tindakan`);

--
-- Indeks untuk tabel `t_trs_tindakan2`
--
ALTER TABLE `t_trs_tindakan2`
  ADD PRIMARY KEY (`fs_id_tindakan2`);

--
-- Indeks untuk tabel `t_trs_tindakan_cart`
--
ALTER TABLE `t_trs_tindakan_cart`
  ADD PRIMARY KEY (`fs_id_tindakan_cart`);

--
-- Indeks untuk tabel `t_trs_tindakan_cart2`
--
ALTER TABLE `t_trs_tindakan_cart2`
  ADD PRIMARY KEY (`fs_id_tindakan_cart2`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `fs_id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `fs_id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_distributor`
--
ALTER TABLE `tb_distributor`
  MODIFY `fs_id_distributor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_etiket`
--
ALTER TABLE `tb_etiket`
  MODIFY `fs_id_etiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `fs_id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `fs_id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `fs_id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_adjustment`
--
ALTER TABLE `tb_trs_adjustment`
  MODIFY `fs_id_adjustment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_adjustment_detail`
--
ALTER TABLE `tb_trs_adjustment_detail`
  MODIFY `fs_id_adjustment_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_pembelian`
--
ALTER TABLE `tb_trs_pembelian`
  MODIFY `fs_id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_pembelian_detail`
--
ALTER TABLE `tb_trs_pembelian_detail`
  MODIFY `fs_id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_penjualan`
--
ALTER TABLE `tb_trs_penjualan`
  MODIFY `fs_id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_penjualan_detail`
--
ALTER TABLE `tb_trs_penjualan_detail`
  MODIFY `fs_id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_racik`
--
ALTER TABLE `tb_trs_racik`
  MODIFY `fs_id_racik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_racik_detail`
--
ALTER TABLE `tb_trs_racik_detail`
  MODIFY `fs_id_racik_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_retur`
--
ALTER TABLE `tb_trs_retur`
  MODIFY `fs_id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_retur_detail`
--
ALTER TABLE `tb_trs_retur_detail`
  MODIFY `fs_id_retur_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_jaminan`
--
ALTER TABLE `t_jaminan`
  MODIFY `fs_id_jaminan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_karcis`
--
ALTER TABLE `t_karcis`
  MODIFY `fs_id_karcis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_komponen`
--
ALTER TABLE `t_komponen`
  MODIFY `fs_id_komponen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_layanan`
--
ALTER TABLE `t_layanan`
  MODIFY `fs_id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `t_pegawai`
--
ALTER TABLE `t_pegawai`
  MODIFY `fs_id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `t_rekapcetak`
--
ALTER TABLE `t_rekapcetak`
  MODIFY `fs_id_rekapcetak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_rm`
--
ALTER TABLE `t_rm`
  MODIFY `fs_id_rm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `t_satgas`
--
ALTER TABLE `t_satgas`
  MODIFY `fs_id_satgas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_soap`
--
ALTER TABLE `t_soap`
  MODIFY `fs_id_soap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `t_tarif`
--
ALTER TABLE `t_tarif`
  MODIFY `fs_id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `t_tarif_layanan`
--
ALTER TABLE `t_tarif_layanan`
  MODIFY `fs_id_tarif_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `t_tarif_nilai_dtl`
--
ALTER TABLE `t_tarif_nilai_dtl`
  MODIFY `fs_id_tarif_nilai_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `t_trs_billing`
--
ALTER TABLE `t_trs_billing`
  MODIFY `fs_id_trs_billing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `t_trs_registrasi`
--
ALTER TABLE `t_trs_registrasi`
  MODIFY `fs_id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `t_trs_regout`
--
ALTER TABLE `t_trs_regout`
  MODIFY `fs_id_regout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `t_trs_regout2`
--
ALTER TABLE `t_trs_regout2`
  MODIFY `fs_id_regout2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `t_trs_tindakan`
--
ALTER TABLE `t_trs_tindakan`
  MODIFY `fs_id_trs_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `t_trs_tindakan2`
--
ALTER TABLE `t_trs_tindakan2`
  MODIFY `fs_id_tindakan2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `t_trs_tindakan_cart2`
--
ALTER TABLE `t_trs_tindakan_cart2`
  MODIFY `fs_id_tindakan_cart2` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
