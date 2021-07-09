-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2021 pada 03.25
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
  `fs_id_bank_group` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank`
--

INSERT INTO `tb_bank` (`fs_id_bank`, `fs_kd_bank`, `fs_nm_bank`, `fs_kd_jenis_kartu`, `fs_id_bank_group`, `fb_aktif`) VALUES
(1, 'BN0001', 'BCA DEBIT', 1, 3, 1),
(2, 'BN0002', 'BCA CREDIT', 2, 3, 1),
(3, 'BN0003', 'MANDIRI DEBIT', 1, 5, 1),
(4, 'BN0004', 'MANDIRI CREDIT', 2, 5, 1),
(5, 'BN0005', 'BNI DEBIT', 1, 6, 1),
(6, 'BN0006', 'BNI CREDIT', 2, 6, 1),
(7, 'BN0007', 'BRI DEBIT', 1, 4, 1),
(8, 'BN0008', 'BRI CREDIT', 2, 4, 1),
(9, 'BN0001', 'PANIN DEBIT', 1, 7, 1),
(10, 'BN0002', 'PANIN CREDIT', 2, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bank_group`
--

CREATE TABLE `tb_bank_group` (
  `fs_id_bank_group` int(11) NOT NULL,
  `fs_kd_bank_group` varchar(10) NOT NULL,
  `fs_nm_bank_group` varchar(50) NOT NULL,
  `fn_no_rekening` int(11) NOT NULL,
  `fb_aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bank_group`
--

INSERT INTO `tb_bank_group` (`fs_id_bank_group`, `fs_kd_bank_group`, `fs_nm_bank_group`, `fn_no_rekening`, `fb_aktif`) VALUES
(1, 'BANK000002', 'BANK BCA', 112233, 0),
(2, 'BANK000003', 'BANK BRI', 223344, 0),
(3, 'BANK000001', 'BANK BCA', 112233, 1),
(4, 'BANK000002', 'BANK BRI', 223344, 1),
(5, 'BANK000003', 'BANK MANDIRI', 334455, 1),
(6, 'BANK000004', 'BANK BNI', 445566, 1),
(7, 'BANK000005', 'BANK PANIN', 556677, 1);

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
(1, 'BR0001', '111111', 'Amoxilin', 1, 1, 11, 2, 3, 1000, 1100, 0, 2000, 130, 10, 100, 1),
(2, 'BR0002', '222222', 'Asam Mefenamat', 1, 1, 11, 2, 3, 2000, 2000, 0, 3000, 150, 10, 100, 1),
(3, 'BR000003', '333333', 'Bodrex', 1, 1, 11, 2, 3, 1000, 1100, 10, 0, 180, 10, 100, 1),
(4, 'BR000004', '444444', 'Paracetamol', 4, 1, 11, 2, 3, 6000, 9000, 20, 0, 190, 10, 100, 1),
(5, 'BR000005', '555555', 'Sanmol Drop', 1, 1, 10, 2, 3, 5000, 5000, 20, 0, 195, 10, 100, 1),
(6, 'BR000006', '666666', 'Panadol', 1, 1, 13, 2, 5, 5000, 5000, 25, 0, 195, 10, 100, 1),
(7, 'BR000007', 'BR000007', 'Konidin', 2, 1, 12, 2, 0, 1000, 1000, 20, 0, 95, 10, 100, 1),
(8, 'BR000008', '888888', 'Kursi Roda', 4, 3, 7, 2, 0, 9000000, 9000000, 0, 15000000, 1, 1, 10, 1),
(9, 'BR000009', 'BR000009', 'Konidin Box', 1, 1, 8, 2, 3, 10000, 11000, 20, 0, 150, 10, 100, 1);

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
-- Struktur dari tabel `tb_repack`
--

CREATE TABLE `tb_repack` (
  `fs_id_repack` int(11) NOT NULL,
  `fs_kd_repack` varchar(10) NOT NULL,
  `fs_id_material` int(11) NOT NULL,
  `fn_qty_material` int(11) NOT NULL,
  `fn_total_hpp_material` int(11) NOT NULL,
  `fn_id_hasil` int(11) NOT NULL,
  `fn_qty_hasil` int(11) NOT NULL,
  `fn_hpp_hasil` int(11) NOT NULL,
  `fs_keterangan_repack` text NOT NULL,
  `fd_tgl_repack` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_repack`
--

INSERT INTO `tb_repack` (`fs_id_repack`, `fs_kd_repack`, `fs_id_material`, `fn_qty_material`, `fn_total_hpp_material`, `fn_id_hasil`, `fn_qty_hasil`, `fn_hpp_hasil`, `fs_keterangan_repack`, `fd_tgl_repack`, `fs_id_user`) VALUES
(1, 'RP00000001', 9, 1, 10000, 7, 10, 1000, '1 box isi 10', '2021-04-10', 1),
(2, 'RP00000002', 9, 4, 40000, 7, 40, 1000, '1 box isi 10', '2021-04-10', 1);

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
(2, 'PB00000008', 1, 217800, 0, 217800, 1, 'Akan di bayarkan bulan depan', '2021-04-24', '2021-03-24', '0000-00-00', 1),
(3, 'PB00000009', 3, 9000000, 0, 9000000, 1, 'lunas', '2021-04-01', '2021-04-01', '0000-00-00', 1),
(4, 'PB00000010', 3, 77000, 0, 77000, 1, 'Pembayaran bulan depan', '2021-05-01', '2021-04-01', '0000-00-00', 1),
(5, 'PB00000011', 3, 100000, 0, 100000, 1, '', '2021-04-10', '2021-04-10', '0000-00-00', 1),
(6, 'PB00000012', 3, 3467000, 0, 3467000, 2, '', '2021-05-20', '2021-05-20', '0000-00-00', 1),
(7, 'PB00000013', 3, 180000, 0, 180000, 2, '', '2021-07-24', '2021-06-24', '0000-00-00', 1),
(8, 'PB00000014', 2, 1100000, 0, 1100000, 2, '', '2021-07-24', '2021-06-24', '2021-06-24', 1),
(9, 'PB00000015', 2, 1350000, 0, 1350000, 2, '', '2021-07-24', '2021-06-24', '0000-00-00', 1),
(10, 'PB00000016', 3, 572000, 0, 572000, 2, 'Pembayaran bulan depan', '2021-07-30', '2021-06-30', '0000-00-00', 1),
(11, 'PB00000017', 3, 385000, 0, 385000, 2, 'Pembayaran bulan depan', '2021-07-30', '2021-06-30', '2021-06-30', 1),
(12, 'PB00000018', 3, 505000, 0, 505000, 2, 'Pembayaran bulan depan', '2021-07-30', '2021-06-30', '0000-00-00', 1);

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
(9, 4, 3, 1000, 10, 0, 10, 1100, 11000),
(10, 5, 9, 10000, 10, 0, 0, 10000, 100000),
(11, 6, 9, 10000, 127, 0, 0, 10000, 1270000),
(12, 6, 6, 5000, 119, 0, 0, 5000, 595000),
(13, 6, 5, 5000, 89, 0, 0, 5000, 445000),
(14, 6, 4, 6000, 123, 0, 0, 6000, 738000),
(15, 6, 3, 1000, 99, 0, 0, 1000, 99000),
(16, 6, 2, 2000, 120, 0, 0, 2000, 240000),
(17, 6, 1, 1000, 80, 0, 0, 1000, 80000),
(18, 7, 7, 1000, 50, 0, 0, 1000, 50000),
(19, 7, 6, 5000, 10, 0, 0, 5000, 50000),
(20, 7, 5, 5000, 10, 0, 0, 5000, 50000),
(21, 7, 3, 1000, 30, 0, 0, 1000, 30000),
(22, 8, 6, 5000, 100, 0, 0, 5000, 500000),
(23, 8, 5, 5000, 50, 0, 0, 5000, 250000),
(24, 8, 4, 6000, 50, 0, 0, 6000, 300000),
(25, 8, 3, 1000, 50, 0, 0, 1000, 50000),
(26, 9, 6, 5000, 100, 0, 0, 5000, 500000),
(27, 9, 5, 5000, 100, 0, 0, 5000, 500000),
(28, 9, 4, 6000, 50, 0, 0, 6000, 300000),
(29, 9, 3, 1000, 50, 0, 0, 1000, 50000),
(30, 10, 9, 10000, 50, 0, 10, 11000, 550000),
(31, 10, 1, 1000, 20, 0, 10, 1100, 22000),
(32, 11, 4, 6000, 50, 0, 10, 6600, 330000),
(33, 11, 3, 1000, 50, 0, 10, 1100, 55000),
(34, 12, 4, 6000, 50, 0, 50, 9000, 450000),
(35, 12, 3, 1000, 50, 0, 10, 1100, 55000);

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
(78, 'PJ00000078', 55, 75000, 108850, 0, 108850, '2021-04-08', '0000-00-00', 1),
(79, 'PJ00000079', 56, 100000, 129275, 0, 129275, '2021-04-08', '0000-00-00', 1),
(80, 'PJ00000080', 57, 65000, 85250, 0, 85250, '2021-04-09', '0000-00-00', 1),
(81, 'PJ00000081', 62, 90000, 126375, 0, 126375, '2021-04-17', '0000-00-00', 1),
(82, 'PJ00000082', 63, 31000, 40205, 0, 40205, '2021-04-17', '0000-00-00', 1),
(83, 'PJ00000083', 68, 60000, 87480, 0, 87480, '2021-05-04', '0000-00-00', 1),
(84, 'PJ00000084', 67, 22000, 28880, 0, 28880, '2021-05-06', '0000-00-00', 1),
(85, 'PJ00000085', 69, 12000, 15130, 0, 15130, '2021-05-06', '0000-00-00', 1),
(86, 'PJ00000086', 70, 20000, 32000, 0, 32000, '2021-05-06', '0000-00-00', 1),
(87, 'PJ00000087', 71, 20000, 30000, 0, 30000, '2021-05-06', '0000-00-00', 1),
(88, 'PJ00000088', 72, 28000, 35205, 0, 35205, '2021-05-19', '0000-00-00', 1),
(89, 'PJ00000089', 73, 70000, 83000, 0, 83000, '2021-05-20', '0000-00-00', 1),
(90, 'PJ00000090', 74, 400000, 485000, 0, 485000, '2021-05-20', '0000-00-00', 1),
(91, 'PJ00000091', 80, 66000, 79350, 0, 79350, '2021-06-17', '0000-00-00', 1),
(92, 'PJ00000092', 81, 63000, 76950, 0, 76950, '2021-06-17', '0000-00-00', 1),
(93, 'PJ00000093', 82, 70000, 83000, 0, 83000, '2021-06-22', '0000-00-00', 1),
(94, 'PJ00000094', 96, 125000, 187350, 0, 187350, '2021-07-06', '0000-00-00', 1),
(95, 'PJ00000095', 96, 10000, 12100, 0, 12100, '2021-07-06', '0000-00-00', 1);

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
(200, 78, 52, 7, 0, 1000, 1320, 10, 0, 13200),
(201, 79, 0, 4, 3, 6000, 7920, 5, 0, 39600),
(202, 79, 0, 3, 3, 1000, 1210, 10, 0, 12100),
(203, 79, 53, 7, 0, 1000, 1320, 10, 0, 13200),
(204, 79, 53, 6, 0, 5000, 6875, 5, 0, 34375),
(205, 79, 53, 5, 0, 5000, 6000, 5, 0, 30000),
(206, 80, 0, 4, 3, 6000, 7920, 10, 0, 79200),
(207, 80, 0, 3, 3, 1000, 1210, 5, 0, 6050),
(208, 81, 0, 2, 3, 2000, 3000, 10, 0, 30000),
(209, 81, 0, 1, 3, 1000, 2000, 10, 0, 20000),
(210, 81, 54, 7, 0, 1000, 1200, 10, 0, 12000),
(211, 81, 54, 6, 0, 5000, 6875, 5, 0, 34375),
(212, 81, 54, 5, 0, 5000, 6000, 5, 0, 30000),
(213, 82, 0, 4, 3, 6000, 7920, 1, 0, 7920),
(214, 82, 0, 3, 3, 1000, 1210, 1, 0, 1210),
(215, 82, 55, 7, 0, 1000, 1200, 1, 0, 1200),
(216, 82, 55, 6, 0, 5000, 6875, 1, 0, 6875),
(217, 82, 55, 5, 0, 5000, 6000, 1, 0, 6000),
(218, 82, 56, 2, 0, 2000, 3000, 1, 0, 3000),
(219, 82, 56, 1, 0, 1000, 2000, 1, 0, 2000),
(220, 82, 56, 9, 0, 10000, 12000, 1, 0, 12000),
(221, 83, 0, 2, 3, 2000, 3000, 9, 0, 27000),
(222, 83, 0, 4, 3, 6000, 7920, 4, 0, 31680),
(223, 83, 58, 1, 0, 1000, 2000, 9, 0, 18000),
(224, 83, 58, 7, 0, 1000, 1200, 9, 0, 10800),
(225, 84, 0, 6, 5, 5000, 6875, 2, 0, 13750),
(226, 84, 0, 5, 3, 5000, 6000, 1, 0, 6000),
(227, 84, 0, 4, 3, 6000, 7920, 1, 0, 7920),
(228, 84, 0, 3, 3, 1000, 1210, 1, 0, 1210),
(229, 85, 0, 5, 3, 5000, 6000, 1, 0, 6000),
(230, 85, 0, 4, 3, 6000, 7920, 1, 0, 7920),
(231, 85, 0, 3, 3, 1000, 1210, 1, 0, 1210),
(232, 86, 0, 1, 3, 1000, 2000, 10, 0, 20000),
(233, 86, 0, 7, 0, 1000, 1200, 10, 0, 12000),
(234, 87, 0, 2, 3, 2000, 3000, 10, 0, 30000),
(235, 88, 0, 4, 3, 6000, 7920, 1, 0, 7920),
(236, 88, 0, 3, 3, 1000, 1210, 1, 0, 1210),
(237, 88, 59, 9, 0, 10000, 12000, 1, 0, 12000),
(238, 88, 59, 7, 0, 1000, 1200, 1, 0, 1200),
(239, 88, 59, 6, 0, 5000, 6875, 1, 0, 6875),
(240, 88, 59, 5, 0, 5000, 6000, 1, 0, 6000),
(241, 89, 0, 4, 3, 6000, 7200, 10, 0, 72000),
(242, 89, 0, 3, 3, 1000, 1100, 10, 0, 11000),
(243, 90, 0, 9, 3, 10000, 12000, 30, 0, 360000),
(244, 90, 0, 6, 5, 5000, 6250, 20, 0, 125000),
(245, 91, 0, 4, 3, 6000, 7200, 10, 0, 72000),
(246, 91, 60, 6, 0, 5000, 6250, 1, 0, 6250),
(247, 91, 60, 3, 0, 1000, 1100, 1, 0, 1100),
(248, 92, 0, 7, 0, 1000, 1200, 9, 0, 10800),
(249, 92, 0, 6, 5, 5000, 6250, 9, 0, 56250),
(250, 92, 0, 3, 3, 1000, 1100, 9, 0, 9900),
(251, 93, 0, 4, 3, 6000, 7200, 10, 0, 72000),
(252, 93, 0, 3, 3, 1000, 1100, 10, 0, 11000),
(253, 94, 0, 4, 3, 6000, 10800, 10, 0, 108000),
(254, 94, 0, 3, 3, 1000, 1210, 10, 0, 12100),
(255, 94, 61, 7, 0, 1000, 1200, 5, 0, 6000),
(256, 94, 61, 6, 0, 5000, 6250, 5, 0, 31250),
(257, 94, 61, 5, 0, 5000, 6000, 5, 0, 30000),
(258, 95, 0, 3, 3, 1000, 1210, 10, 0, 12100);

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
(52, 78, 'RCK0000052', 'Racik Obat Demam', 7, 10, 5, 40000, 63200, '2021-04-08', '0000-00-00', 1),
(53, 79, 'RCK0000053', 'Racik Panas', 12, 10, 3, 60000, 77575, '2021-04-08', '0000-00-00', 1),
(54, 81, 'RCK0000055', 'Racik Nyeri', 12, 20, 3, 60000, 76375, '2021-04-17', '0000-00-00', 1),
(55, 82, 'RCK0000056', 'Racik Panas', 12, 10, 3, 11000, 14075, '2021-04-17', '0000-00-00', 1),
(56, 82, 'RCK0000057', 'Racik Nyeri', 12, 10, 3, 13000, 17000, '2021-04-17', '0000-00-00', 1),
(58, 83, 'RCK0000059', 'Racik Panas', 12, 5, 3, 18000, 28800, '2021-05-04', '0000-00-00', 1),
(59, 88, 'RCK0000060', 'Racik Panas', 13, 5, 3, 21000, 26075, '2021-05-19', '0000-00-00', 1),
(60, 91, 'RCK0000061', 'Racik Panas', 12, 10, 3, 6000, 7350, '2021-06-17', '0000-00-00', 1),
(61, 94, 'RCK0000062', 'Racik Demam', 12, 10, 1, 55000, 67250, '2021-07-06', '0000-00-00', 1);

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
(110, 52, 78, 7, 0, 1000, 1320, 10, 0, 13200, 1),
(111, 53, 79, 7, 0, 1000, 1320, 10, 0, 13200, 1),
(112, 53, 79, 6, 0, 5000, 6875, 5, 0, 34375, 1),
(113, 53, 79, 5, 0, 5000, 6000, 5, 0, 30000, 1),
(114, 54, 81, 7, 0, 1000, 1200, 10, 0, 12000, 1),
(115, 54, 81, 6, 0, 5000, 6875, 5, 0, 34375, 1),
(116, 54, 81, 5, 0, 5000, 6000, 5, 0, 30000, 1),
(117, 55, 82, 7, 0, 1000, 1200, 1, 0, 1200, 1),
(118, 55, 82, 6, 0, 5000, 6875, 1, 0, 6875, 1),
(119, 55, 82, 5, 0, 5000, 6000, 1, 0, 6000, 1),
(120, 56, 82, 2, 0, 2000, 3000, 1, 0, 3000, 1),
(121, 56, 82, 1, 0, 1000, 2000, 1, 0, 2000, 1),
(122, 56, 82, 9, 0, 10000, 12000, 1, 0, 12000, 1),
(125, 58, 83, 1, 0, 1000, 2000, 9, 0, 18000, 1),
(126, 58, 83, 7, 0, 1000, 1200, 9, 0, 10800, 1),
(127, 59, 88, 9, 0, 10000, 12000, 1, 0, 12000, 1),
(128, 59, 88, 7, 0, 1000, 1200, 1, 0, 1200, 1),
(129, 59, 88, 6, 0, 5000, 6875, 1, 0, 6875, 1),
(130, 59, 88, 5, 0, 5000, 6000, 1, 0, 6000, 1),
(131, 60, 91, 6, 0, 5000, 6250, 1, 0, 6250, 1),
(132, 60, 91, 3, 0, 1000, 1100, 1, 0, 1100, 1),
(133, 61, 94, 7, 0, 1000, 1200, 5, 0, 6000, 1),
(134, 61, 94, 6, 0, 5000, 6250, 5, 0, 31250, 1),
(135, 61, 94, 5, 0, 5000, 6000, 5, 0, 30000, 1);

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
-- Struktur dari tabel `t_hutang`
--

CREATE TABLE `t_hutang` (
  `fs_id_hutang` int(11) NOT NULL,
  `fs_kd_hutang` varchar(10) NOT NULL,
  `fd_tgl_hutang` date NOT NULL,
  `fs_id_distributor` int(11) NOT NULL,
  `fs_id_pembelian` int(11) NOT NULL,
  `fn_hutang` int(11) NOT NULL,
  `fn_sisa_hutang` int(11) NOT NULL,
  `fs_id_order_hutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hutang`
--

INSERT INTO `t_hutang` (`fs_id_hutang`, `fs_kd_hutang`, `fd_tgl_hutang`, `fs_id_distributor`, `fs_id_pembelian`, `fn_hutang`, `fn_sisa_hutang`, `fs_id_order_hutang`) VALUES
(1, 'HT00000001', '2021-06-24', 3, 7, 180000, 0, 0),
(2, 'HT00000002', '2021-06-24', 2, 9, 1350000, 0, 0),
(3, 'HT00000003', '2021-06-30', 3, 10, 572000, 0, 0),
(4, 'HT00000004', '2021-06-30', 3, 12, 505000, 0, 0);

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
(1, 'Laki-laki'),
(2, 'Perempuan');

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
-- Struktur dari tabel `t_lab_antigen`
--

CREATE TABLE `t_lab_antigen` (
  `fs_id_trs` int(11) NOT NULL,
  `fs_id_rm` int(11) NOT NULL,
  `fd_tgl_trs` date NOT NULL,
  `fs_tipe_spesimen` varchar(200) NOT NULL,
  `fn_no_spesimen` int(11) NOT NULL,
  `fd_tgl_ambil` date NOT NULL,
  `fd_tgl_proses` date NOT NULL,
  `fd_tgl_lapor` date NOT NULL,
  `fs_jam_lapor` varchar(10) NOT NULL,
  `fs_nm_test` varchar(200) NOT NULL,
  `fn_hasil_test` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL,
  `fd_tgl_void` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_lab_antigen`
--

INSERT INTO `t_lab_antigen` (`fs_id_trs`, `fs_id_rm`, `fd_tgl_trs`, `fs_tipe_spesimen`, `fn_no_spesimen`, `fd_tgl_ambil`, `fd_tgl_proses`, `fd_tgl_lapor`, `fs_jam_lapor`, `fs_nm_test`, `fn_hasil_test`, `fs_id_user`, `fd_tgl_void`) VALUES
(7, 18, '2021-07-07', 'Nosopharyngeal Sweb', 10, '2021-07-07', '2021-07-07', '2021-07-07', '15:15', 'Antigen Rapid Diagnostic Test (Ag-RDT) SARS-CoV2', 1, 1, '0000-00-00'),
(8, 10, '2021-07-09', 'Test Spesimen', 120, '2021-07-09', '2021-07-09', '2021-07-09', '9:15', 'Test Antigen', 2, 1, '0000-00-00');

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
('BANK', 'BANK GROUP', 6),
('BN', 'BANK', 3),
('BR', 'BARANG', 10),
('CT', 'CATATAN TERINTEGRASI (SOAP)', 33),
('DS', 'DISTRIBUTOR', 4),
('DX', 'PEMBAYARAN TRANSAKSI', 85),
('ET', 'ETIKET', 6),
('GL', 'GOLONGAN', 5),
('GR', 'GROUP', 5),
('HT', 'HUTANG', 5),
('JM', 'JAMINAN', 5),
('KC', 'KARCIS', 7),
('KP', 'KOMPONEN TARIF', 7),
('LY', 'LAYANAN', 8),
('OH', 'ORDER HUTANG', 4),
('OP', 'ORDER PIUTANG', 22),
('PB', 'PEMBELIAN BARANG', 19),
('PG', 'PEGAWAI', 4),
('PH', 'PELUNASAN HUTANG', 8),
('PJ', 'PENJUALAN BARANG', 96),
('PP', 'PELUNASAN PIUTANG', 21),
('PT', 'PIUTANG', 15),
('RC', 'REKAP CETAK', 7),
('RCK', 'RACIK', 63),
('RG', 'REGISTER', 97),
('RM', 'REKAM MEDIS', 10),
('RP', 'REPACK BARANG', 3),
('RU', 'RETUR', 8),
('SM', 'SATUAN MEDIS', 6),
('ST', 'SATUAN BARANG', 14),
('TM', 'TINDAKAN MEDIS', 17),
('TU', 'TINDAKAN UMUM', 110);

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
-- Struktur dari tabel `t_piutang`
--

CREATE TABLE `t_piutang` (
  `fs_id_piutang` int(11) NOT NULL,
  `fs_kd_piutang` varchar(10) NOT NULL,
  `fd_tgl_piutang` date NOT NULL,
  `fs_id_jaminan` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_piutang` int(11) NOT NULL,
  `fn_sisa_piutang` int(11) NOT NULL,
  `fs_id_order_piutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_piutang`
--

INSERT INTO `t_piutang` (`fs_id_piutang`, `fs_kd_piutang`, `fd_tgl_piutang`, `fs_id_jaminan`, `fs_id_registrasi`, `fn_piutang`, `fn_sisa_piutang`, `fs_id_order_piutang`) VALUES
(1, 'PT00000001', '2021-06-23', 4, 83, 571000, 0, 0),
(2, 'PT00000002', '2021-06-23', 4, 85, 550000, 0, 0),
(3, 'PT00000007', '2021-06-24', 4, 86, 700000, 0, 0),
(4, 'PT00000007', '2021-06-24', 4, 87, 400000, 0, 0),
(5, 'PT00000009', '2021-06-24', 1, 88, 550000, 0, 0),
(6, 'PT00000009', '2021-06-24', 1, 89, 384000, 0, 0),
(7, 'PT00000009', '2021-06-24', 2, 90, 350000, 0, 0),
(8, 'PT00000013', '2021-06-24', 2, 91, 200000, 200000, 0),
(9, 'PT00000013', '2021-06-28', 4, 92, 550000, 520000, 0),
(10, 'PT00000013', '2021-06-29', 4, 93, 700000, 700000, 0),
(11, 'PT00000013', '2021-06-29', 4, 94, 850000, 850000, 0),
(12, 'PT00000014', '2021-06-29', 4, 95, 850000, 850000, 0);

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
(10, 'RM0000001', 'Teguh Syahrian', 1, 'Negara', '1990-10-09', 'Jembrana ', '081999123660', '123123', 1, '2020-10-16', '2020-11-23', 1, 1, 1),
(11, 'RM0000002', 'Budi Gunawan Candra', 1, 'Karangasem', '1988-01-01', 'Karangasem', '08177887766', '112233', 2, '2020-10-16', '0000-00-00', 1, 1, 1),
(12, 'RM0000003', 'Nia Ramadhan', 2, 'Jakarta', '2000-02-14', 'Jln Jakarta', '(0361) 112233', '112233', 3, '2020-10-16', '0000-00-00', 1, 0, 1),
(13, 'RM0000004', 'Rahmat Andara', 1, 'Negara', '1990-07-01', 'Gianyar', '0819995566', '445566', 1, '2020-10-20', '0000-00-00', 1, 1, 1),
(14, 'RM0000005', 'Hendra Rama', 1, 'Negara', '2020-11-23', 'Tabanan', '08199912366', '123123', 2, '2020-11-23', '2020-11-23', 1, 1, 1),
(15, 'RM0000006', 'Hasan Ansori', 1, 'Negara', '2020-11-09', 'Denpasar', '081999123660', '123123', 2, '2020-11-23', '2020-11-23', 1, 1, 1),
(16, 'RM0000007', 'Tamara', 2, 'Jakarta', '2020-11-25', 'Denpasar', '081999123660', '123123', 5, '2020-11-23', '0000-00-00', 1, 0, 1),
(17, 'RM0000008', 'Martha', 2, 'Negara', '1997-01-28', 'Denpasar', '081999123660', '112233', 1, '2020-12-28', '0000-00-00', 1, 1, 1),
(18, 'RM0000009', 'Adi Rabka', 1, 'Banyuwangi', '1992-02-01', 'Denpasar', '081999123660', '9090909090', 1, '2021-01-14', '0000-00-00', 1, 1, 1);

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
(9, 'CT00000017', 10, 58, 'Sakit kepala', 'TD : 110/90\nSH : 36*\nTB : 160 cm\nBB : 60 kg', 'Kemungkinan stress', 'Di berikan obat untuk penyembuhan', 1, '2021-04-10', '0000-00-00', 1, 1),
(10, 'CT00000018', 10, 58, 'Demam', 'TD : 110/90 \nSH : 36* \nTB : 160 cm \nBB : 60 kg', 'Kecapean', 'Minum obat dan istirahat', 1, '2021-04-12', '0000-00-00', 1, 1),
(11, 'CT00000019', 10, 59, 'Sakit pada luka kaki', 'TD : 110/90 \nSH : 36* \nTB : 160 cm \nBB : 60 kg', 'Infeksi luka', 'Pemberian obat antiobiotk', 1, '2021-04-12', '0000-00-00', 1, 1),
(12, 'CT00000020', 15, 57, 'Badan terasa sakit dan lemas', 'TD : 110/80\nBB : 80kg\nTB : 180\nST : 36.7 C', 'Terlalu capek bekerja', 'Ke fisioterapi dan di beri obat pengilang sakit badan', 1, '2021-04-13', '0000-00-00', 1, 1),
(13, 'CT00000021', 15, 57, 'Sesak Nafas dan pusing', 'TD : 110/90\nBB : 80kg \nTB : 180 \nST : 36.7 C', 'Infeksi saluran pernafasan dan sakit kepala', 'minum obat asma soho dan obat sakit kepala', 1, '2021-04-13', '2021-04-15', 1, 0),
(14, 'CT00000023', 10, 59, 'Lutut sakit , nyeri dan bengkak', 'TD : 110/90 \nSH : 36* T\nB : 160 cm \nBB : 60 kg', 'kemungkinan rematik', 'cek lab dan minum obat rematik', 1, '2021-04-13', '2021-05-03', 1, 1),
(15, 'CT00000024', 10, 59, 'Pusing, mual dan demam', 'TD : 110/90 SH : 36* T B : 160 cm BB : 60 kg', 'gejala mata minus', 'cek ke poli mata', 1, '2021-04-13', '2021-04-15', 1, 0),
(16, 'CT00000025', 16, 62, 'Sakit pada bagian perut kiri', 'TD = 110/90\nTB = 160 cm\nBB = 50 kg\nSB = 36.7 C', 'Appendix', 'Rujuk ke RS untuk cek lab dan radiologi', 1, '2021-04-17', '0000-00-00', 1, 1),
(17, 'CT00000026', 10, 64, '', 'kahksjdh\nkashdkj\najhsdkja\nkajhds\n', '', '', 1, '2021-04-19', '2021-04-19', 1, 0),
(18, 'CT00000027', 12, 56, 'Pusing', 'TB :  150 cm\nBB :  55 kg\nST :  36,7 *C\nTD : 110/90\n                        ', 'Gejala migrain', 'di berikan obat bodrex', 1, '2021-04-29', '2021-04-29', 1, 1),
(19, 'CT00000028', 12, 67, 'kontrol luka kena air panas pada tangan  scala nyeri 4[0-10]\n', 'Tekanan darah : mm/Hg\nNadi : 90 x/mnt\nRespirasi : 24 x/mnt\nSuhu : 36.5 ?C\nTinggi badan : cm\nBerat badan : kg\nLingkar Kepala : cm\nIsian : luka masih basah dirawat dg sufratule dan ditutup . resiko jatuh sedang .', 'gg integritas jaringan .\n', 'setelah diberikan askep selama 1x15 mnt klg pasien paham .\n', 1, '2021-05-03', '0000-00-00', 1, 1),
(20, 'CT00000029', 10, 68, 'kontrol luka kena air panas pada tangan scala nyeri 4[0-10]', 'Tekanan darah   :  110/90  mm/Hg\nNadi                       :  90  x/mnt \nRespirasi               :  60  x/mnt\nSuhu                      :   37.5 *C\nTinggi badan       :   165 cm\nBerat badan        :   70 kg\nIsian                       :\n                        ', 'gg integritas jaringan .\n', 'setelah diberikan askep selama 1x15 mnt klg pasien paham .\n', 1, '2021-05-04', '0000-00-00', 1, 1),
(21, 'CT00000030', 10, 72, 'kontrol luka kena air panas pada tangan scala nyeri 4[0-10]', 'Tekanan darah   :  110/90  mm/Hg\nNadi                       :  90  x/mnt \nRespirasi               :  60  x/mnt\nSuhu                      :   37.5 *C\nTinggi badan       :   165 cm\nBerat badan        :   70 kg\nIsian                       :\n                        ', 'gg integritas jaringan .\n', 'setelah diberikan askep selama 1x15 mnt klg pasien paham .\n', 1, '2021-05-19', '0000-00-00', 1, 1),
(22, 'CT00000031', 16, 82, 'Pusing pada kepala dan demam', 'Tekanan darah: 110/70  mm/Hg\nNadi:  60 x/mnt \nRespirasi: 40  x/mnt\nSuhu:  36.7*C\nTinggi badan: 170 cm\nBerat badan: 70  kg\n\nIsian:\nSemua masih normal\n                        ', 'Dengue Fever', 'Diberikan obat demam dan sakit kepala', 1, '2021-06-22', '0000-00-00', 1, 1),
(23, 'CT00000032', 10, 96, 'Badan meriang dan demam', 'Tekanan darah:  110/ 90mm/Hg\nNadi: 90 x/mnt \nRespirasi: 60 x/mnt\nSuhu:  37,5 *C\nTinggi badan: 160 cm\nBerat badan:  55 kg\n\nIsian:\nTensi masih normal\n                        ', 'Badan meriang karena masuk angin', 'Di beikan obat paracetamol', 1, '2021-07-06', '0000-00-00', 1, 1);

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
(36, 34, 2),
(37, 33, 8);

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
(148, 55, 'PJ00000078', 108850, 0, 108850, '2021-04-08'),
(149, 56, 'RG00000050', 100000, 0, 100000, '2021-04-08'),
(150, 56, 'TU00000066', 171000, 0, 171000, '2021-04-08'),
(151, 56, 'TU00000067', 140000, 0, 140000, '2021-04-08'),
(152, 56, 'PJ00000079', 129275, 0, 129275, '2021-04-08'),
(153, 57, 'RG00000051', 100000, 0, 100000, '2021-04-09'),
(154, 57, 'TU00000068', 321000, 0, 321000, '2021-04-09'),
(155, 57, 'PJ00000080', 85250, 0, 85250, '2021-04-09'),
(156, 58, 'RG00000052', 100000, 0, 100000, '2021-04-10'),
(157, 58, 'TU00000069', 321000, 0, 321000, '2021-04-12'),
(159, 57, 'TU00000070', 350000, 0, 350000, '2021-04-15'),
(164, 62, 'RG00000056', 10000, 0, 10000, '2021-04-17'),
(165, 62, 'TU00000073', 250000, 0, 250000, '2021-04-17'),
(166, 62, 'PJ00000081', 126375, 0, 126375, '2021-04-17'),
(167, 63, 'RG00000057', 100000, 0, 100000, '2021-04-17'),
(168, 63, 'PJ00000082', 40205, 0, 40205, '2021-04-17'),
(169, 63, 'TU00000074', 471000, 0, 471000, '2021-04-17'),
(170, 64, 'RG00000058', 100000, 0, 100000, '2021-04-19'),
(171, 64, 'TU00000076', 250000, 0, 250000, '2021-04-20'),
(172, 64, 'TU00000077', 150000, 0, 150000, '2021-04-20'),
(173, 65, 'RG00000059', 5000, 0, 5000, '2021-04-20'),
(174, 66, 'RG00000060', 50000, 0, 50000, '2021-04-20'),
(183, 66, 'TU00000078', 400000, 0, 400000, '2021-04-20'),
(184, 67, 'RG00000061', 10000, 0, 10000, '2021-05-03'),
(185, 68, 'RG00000062', 5000, 0, 5000, '2021-05-03'),
(186, 68, 'TU00000080', 321000, 0, 321000, '2021-05-04'),
(187, 68, 'PJ00000083', 87480, 0, 87480, '2021-05-04'),
(188, 67, 'TU00000081', 471000, 0, 471000, '2021-05-06'),
(189, 67, 'PJ00000084', 28880, 0, 28880, '2021-05-06'),
(190, 69, 'RG00000063', 100000, 0, 100000, '2021-05-06'),
(191, 70, 'RG00000064', 100000, 0, 100000, '2021-05-06'),
(192, 71, 'RG00000065', 100000, 0, 100000, '2021-05-06'),
(193, 69, 'TU00000082', 480000, 0, 480000, '2021-05-06'),
(194, 70, 'TU00000083', 250000, 0, 250000, '2021-05-06'),
(195, 71, 'TU00000084', 260000, 0, 260000, '2021-05-06'),
(196, 69, 'PJ00000085', 15130, 0, 15130, '2021-05-06'),
(197, 70, 'PJ00000086', 32000, 0, 32000, '2021-05-06'),
(198, 71, 'PJ00000087', 30000, 0, 30000, '2021-05-06'),
(199, 72, 'RG00000066', 10000, 0, 10000, '2021-05-19'),
(200, 72, 'TU00000085', 250000, 0, 250000, '2021-05-19'),
(201, 72, 'PJ00000088', 35205, 0, 35205, '2021-05-19'),
(202, 73, 'RG00000067', 100000, 0, 100000, '2021-05-20'),
(203, 74, 'RG00000068', 100000, 0, 100000, '2021-05-20'),
(204, 73, 'TU00000086', 471000, 0, 471000, '2021-05-20'),
(205, 74, 'TU00000087', 250000, 0, 250000, '2021-05-20'),
(206, 73, 'PJ00000089', 83000, 0, 83000, '2021-05-20'),
(207, 74, 'PJ00000090', 485000, 0, 485000, '2021-05-20'),
(208, 75, 'RG00000069', 100000, 0, 100000, '2021-05-21'),
(209, 75, 'TU00000088', 321000, 0, 321000, '2021-06-16'),
(210, 76, 'RG00000070', 10000, 0, 10000, '2021-06-16'),
(211, 76, 'TU00000089', 500000, 0, 500000, '2021-06-16'),
(212, 77, 'RG00000071', 100000, 0, 100000, '2021-06-16'),
(213, 77, 'TU00000090', 471000, 0, 471000, '2021-06-16'),
(214, 78, 'RG00000072', 100000, 0, 100000, '2021-06-17'),
(215, 79, 'RG00000073', 100000, 0, 100000, '2021-06-17'),
(216, 78, 'TU00000091', 471000, 0, 471000, '2021-06-17'),
(217, 79, 'TU00000092', 500000, 0, 500000, '2021-06-17'),
(218, 80, 'RG00000074', 100000, 0, 100000, '2021-06-17'),
(219, 80, 'TU00000093', 250000, 0, 250000, '2021-06-17'),
(220, 80, 'PJ00000091', 79350, 0, 79350, '2021-06-17'),
(221, 81, 'RG00000075', 100000, 0, 100000, '2021-06-17'),
(222, 81, 'TU00000094', 471000, 0, 471000, '2021-06-17'),
(223, 81, 'PJ00000092', 76950, 0, 76950, '2021-06-17'),
(224, 82, 'RG00000076', 10000, 0, 10000, '2021-06-22'),
(225, 82, 'TU00000095', 500000, 0, 500000, '2021-06-22'),
(226, 82, 'PJ00000093', 83000, 0, 83000, '2021-06-22'),
(227, 83, 'RG00000077', 100000, 0, 100000, '2021-06-23'),
(228, 83, 'TU00000096', 471000, 0, 471000, '2021-06-23'),
(229, 84, 'RG00000078', 100000, 0, 100000, '2021-06-23'),
(230, 84, 'TU00000097', 150000, 0, 150000, '2021-06-23'),
(231, 85, 'RG00000079', 100000, 0, 100000, '2021-06-23'),
(232, 85, 'TU00000098', 450000, 0, 450000, '2021-06-23'),
(233, 86, 'RG00000080', 100000, 0, 100000, '2021-06-24'),
(234, 87, 'RG00000081', 100000, 0, 100000, '2021-06-24'),
(235, 86, 'TU00000099', 600000, 0, 600000, '2021-06-24'),
(236, 87, 'TU00000100', 300000, 0, 300000, '2021-06-24'),
(237, 88, 'RG00000082', 100000, 0, 100000, '2021-06-24'),
(238, 89, 'RG00000083', 100000, 0, 100000, '2021-06-24'),
(239, 90, 'RG00000084', 100000, 0, 100000, '2021-06-24'),
(240, 88, 'TU00000101', 450000, 0, 450000, '2021-06-24'),
(241, 89, 'TU00000102', 284000, 0, 284000, '2021-06-24'),
(242, 90, 'TU00000103', 250000, 0, 250000, '2021-06-24'),
(243, 91, 'RG00000085', 5000, 0, 5000, '2021-06-24'),
(244, 91, 'TU00000104', 320000, 0, 320000, '2021-06-24'),
(245, 92, 'RG00000086', 100000, 0, 100000, '2021-06-28'),
(246, 92, 'TU00000105', 450000, 0, 450000, '2021-06-28'),
(247, 93, 'RG00000087', 100000, 0, 100000, '2021-06-29'),
(248, 94, 'RG00000088', 100000, 0, 100000, '2021-06-29'),
(249, 93, 'TU00000106', 600000, 0, 600000, '2021-06-29'),
(250, 94, 'TU00000107', 750000, 0, 750000, '2021-06-29'),
(251, 95, 'RG00000089', 100000, 0, 100000, '2021-06-29'),
(252, 95, 'TU00000108', 750000, 0, 750000, '2021-06-29'),
(253, 96, 'RG00000090', 0, 0, 0, '2021-07-06'),
(254, 96, 'TU00000109', 1500000, 0, 1500000, '2021-07-06'),
(255, 96, 'PJ00000094', 187350, 0, 187350, '2021-07-06'),
(256, 96, 'PJ00000095', 12100, 0, 12100, '2021-07-06'),
(257, 97, 'RG00000091', 5000, 0, 5000, '2021-07-07'),
(258, 98, 'RG00000092', 5000, 0, 5000, '2021-07-07'),
(259, 99, 'RG00000093', 100000, 0, 100000, '2021-07-07'),
(260, 100, 'RG00000094', 100000, 0, 100000, '2021-07-07'),
(261, 101, 'RG00000095', 100000, 0, 100000, '2021-07-07'),
(262, 102, 'RG00000096', 100000, 0, 100000, '2021-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_order_hutang`
--

CREATE TABLE `t_trs_order_hutang` (
  `fs_id_order_hutang` int(11) NOT NULL,
  `fs_kd_order_hutang` varchar(10) NOT NULL,
  `fs_id_distributor` int(11) NOT NULL,
  `fn_nilai_order` int(11) NOT NULL,
  `fd_tgl_order_hutang` date NOT NULL,
  `fs_id_pelunasan_hutang` int(11) NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_order_hutang`
--

INSERT INTO `t_trs_order_hutang` (`fs_id_order_hutang`, `fs_kd_order_hutang`, `fs_id_distributor`, `fn_nilai_order`, `fd_tgl_order_hutang`, `fs_id_pelunasan_hutang`, `fd_tgl_void`, `fs_id_user`) VALUES
(2, 'OH00000001', 3, 180000, '2021-06-28', 5, '0000-00-00', 1),
(3, 'OH00000002', 2, 1350000, '2021-06-28', 6, '0000-00-00', 1),
(4, 'OH00000003', 3, 1077000, '2021-06-30', 7, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_order_hutang_cart`
--

CREATE TABLE `t_trs_order_hutang_cart` (
  `fs_id_cart_order_hutang` int(11) NOT NULL,
  `fs_id_hutang` int(11) NOT NULL,
  `fs_id_pembelian` int(11) NOT NULL,
  `fn_nilai_hutang` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_order_hutang_detail`
--

CREATE TABLE `t_trs_order_hutang_detail` (
  `fs_id_order_hutang_detail` int(11) NOT NULL,
  `fs_id_order_hutang` int(11) NOT NULL,
  `fs_id_hutang` int(11) NOT NULL,
  `fs_id_pembelian` int(11) NOT NULL,
  `fn_nilai_hutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_order_hutang_detail`
--

INSERT INTO `t_trs_order_hutang_detail` (`fs_id_order_hutang_detail`, `fs_id_order_hutang`, `fs_id_hutang`, `fs_id_pembelian`, `fn_nilai_hutang`) VALUES
(1, 2, 1, 7, 180000),
(2, 3, 2, 9, 1350000),
(3, 4, 4, 12, 505000),
(4, 4, 3, 10, 572000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_order_piutang`
--

CREATE TABLE `t_trs_order_piutang` (
  `fs_id_order_piutang` int(11) NOT NULL,
  `fs_kd_order_piutang` varchar(10) NOT NULL,
  `fs_id_jaminan` int(11) NOT NULL,
  `fn_nilai_order` int(11) NOT NULL,
  `fd_tgl_order_piutang` date NOT NULL,
  `fs_id_pelunasan_piutang` int(11) NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_order_piutang`
--

INSERT INTO `t_trs_order_piutang` (`fs_id_order_piutang`, `fs_kd_order_piutang`, `fs_id_jaminan`, `fn_nilai_order`, `fd_tgl_order_piutang`, `fs_id_pelunasan_piutang`, `fd_tgl_void`, `fs_id_user`) VALUES
(16, 'OP00000015', 4, 1121000, '2021-06-23', 12, '0000-00-00', 1),
(17, 'OP00000016', 4, 471000, '2021-06-24', 20, '0000-00-00', 1),
(18, 'OP00000017', 4, 1100000, '2021-06-24', 17, '0000-00-00', 1),
(19, 'OP00000018', 4, 100000, '2021-06-24', 19, '0000-00-00', 1),
(20, 'OP00000019', 2, 350000, '2021-06-24', 24, '0000-00-00', 1),
(21, 'OP00000020', 1, 934000, '2021-06-24', 22, '0000-00-00', 1),
(22, 'OP00000021', 4, 550000, '2021-06-29', 23, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_order_piutang_cart`
--

CREATE TABLE `t_trs_order_piutang_cart` (
  `fs_id_cart_order_piutang` int(11) NOT NULL,
  `fs_id_piutang` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_nilai_piutang` int(11) NOT NULL,
  `fs_id_order_piutang` int(11) NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_order_piutang_detail`
--

CREATE TABLE `t_trs_order_piutang_detail` (
  `fs_id_order_piutang_detail` int(11) NOT NULL,
  `fs_id_order_piutang` int(11) NOT NULL,
  `fs_id_piutang` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_nilai_piutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_order_piutang_detail`
--

INSERT INTO `t_trs_order_piutang_detail` (`fs_id_order_piutang_detail`, `fs_id_order_piutang`, `fs_id_piutang`, `fs_id_registrasi`, `fn_nilai_piutang`) VALUES
(20, 16, 2, 85, 550000),
(21, 16, 1, 83, 571000),
(22, 17, 2, 85, 250000),
(23, 17, 1, 83, 221000),
(24, 18, 4, 87, 400000),
(25, 18, 3, 86, 700000),
(26, 19, 4, 87, 50000),
(27, 19, 3, 86, 50000),
(28, 20, 7, 90, 350000),
(29, 21, 6, 89, 384000),
(30, 21, 5, 88, 550000),
(31, 22, 9, 92, 550000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_pelunasan_hutang`
--

CREATE TABLE `t_trs_pelunasan_hutang` (
  `fs_id_pelunasan_hutang` int(11) NOT NULL,
  `fs_kd_pelunasan_hutang` varchar(10) NOT NULL,
  `fs_id_distributor` int(11) NOT NULL,
  `fs_id_order_hutang` int(11) NOT NULL,
  `fs_id_bank_group` int(11) NOT NULL,
  `fn_subtotal` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_grandtotal` int(11) NOT NULL,
  `fd_tgl_pelunasan_hutang` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_pelunasan_hutang`
--

INSERT INTO `t_trs_pelunasan_hutang` (`fs_id_pelunasan_hutang`, `fs_kd_pelunasan_hutang`, `fs_id_distributor`, `fs_id_order_hutang`, `fs_id_bank_group`, `fn_subtotal`, `fn_diskon`, `fn_grandtotal`, `fd_tgl_pelunasan_hutang`, `fd_tgl_void`, `fs_id_user`) VALUES
(5, 'PH00000005', 3, 2, 3, 180000, 0, 180000, '2021-06-30', '0000-00-00', 1),
(6, 'PH00000006', 2, 3, 3, 1350000, 0, 1350000, '2021-06-30', '0000-00-00', 1),
(7, 'PH00000007', 3, 4, 3, 1077000, 0, 1077000, '2021-06-30', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_pelunasan_hutang_detail`
--

CREATE TABLE `t_trs_pelunasan_hutang_detail` (
  `fs_id_pelunasan_hutang_detail` int(11) NOT NULL,
  `fs_id_pelunasan_hutang` int(11) NOT NULL,
  `fs_id_hutang` int(11) NOT NULL,
  `fs_id_pembelian` int(11) NOT NULL,
  `fn_nilai_pelunasan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_pelunasan_hutang_detail`
--

INSERT INTO `t_trs_pelunasan_hutang_detail` (`fs_id_pelunasan_hutang_detail`, `fs_id_pelunasan_hutang`, `fs_id_hutang`, `fs_id_pembelian`, `fn_nilai_pelunasan`) VALUES
(1, 5, 1, 7, 180000),
(2, 6, 2, 9, 1350000),
(3, 7, 4, 12, 505000),
(4, 7, 3, 10, 572000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_pelunasan_piutang`
--

CREATE TABLE `t_trs_pelunasan_piutang` (
  `fs_id_pelunasan_piutang` int(11) NOT NULL,
  `fs_kd_pelunasan_piutang` varchar(10) NOT NULL,
  `fs_id_jaminan` int(11) NOT NULL,
  `fs_id_order_piutang` int(11) NOT NULL,
  `fs_id_bank_group` int(11) NOT NULL,
  `fn_subtotal` int(11) NOT NULL,
  `fn_diskon` int(11) NOT NULL,
  `fn_grandtotal` int(11) NOT NULL,
  `fd_tgl_pelunasan_piutang` date NOT NULL,
  `fd_tgl_void` date NOT NULL,
  `fs_id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_pelunasan_piutang`
--

INSERT INTO `t_trs_pelunasan_piutang` (`fs_id_pelunasan_piutang`, `fs_kd_pelunasan_piutang`, `fs_id_jaminan`, `fs_id_order_piutang`, `fs_id_bank_group`, `fn_subtotal`, `fn_diskon`, `fn_grandtotal`, `fd_tgl_pelunasan_piutang`, `fd_tgl_void`, `fs_id_user`) VALUES
(12, 'PP00000008', 4, 16, 3, 650000, 0, 650000, '2021-06-23', '0000-00-00', 1),
(13, 'PP00000009', 4, 17, 3, 471000, 0, 471000, '2021-06-24', '0000-00-00', 1),
(14, 'PP00000010', 4, 17, 3, 471000, 0, 471000, '2021-06-24', '2021-06-24', 1),
(15, 'PP00000011', 4, 17, 3, 471000, 0, 471000, '2021-06-24', '0000-00-00', 1),
(16, 'PP00000012', 4, 17, 3, 471000, 0, 471000, '2021-06-24', '0000-00-00', 1),
(17, 'PP00000013', 4, 18, 3, 1000000, 0, 1000000, '2021-06-24', '0000-00-00', 1),
(18, 'PP00000014', 4, 19, 3, 100000, 0, 100000, '2021-06-24', '2021-06-24', 1),
(19, 'PP00000015', 4, 19, 3, 100000, 0, 100000, '2021-06-24', '0000-00-00', 1),
(20, 'PP00000016', 4, 17, 3, 471000, 0, 471000, '2021-06-24', '0000-00-00', 1),
(21, 'PP00000017', 1, 21, 3, 934000, 0, 934000, '2021-06-24', '2021-06-24', 1),
(22, 'PP00000018', 1, 21, 3, 934000, 0, 934000, '2021-06-24', '0000-00-00', 1),
(23, 'PP00000019', 4, 22, 3, 30000, 0, 30000, '2021-06-29', '0000-00-00', 1),
(24, 'PP00000020', 2, 20, 3, 350000, 0, 350000, '2021-06-30', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_trs_pelunasan_piutang_detail`
--

CREATE TABLE `t_trs_pelunasan_piutang_detail` (
  `fs_id_pelunasan_piutang_detail` int(11) NOT NULL,
  `fs_id_pelunasan_piutang` int(11) NOT NULL,
  `fs_id_piutang` int(11) NOT NULL,
  `fs_id_registrasi` int(11) NOT NULL,
  `fn_nilai_pelunasan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_pelunasan_piutang_detail`
--

INSERT INTO `t_trs_pelunasan_piutang_detail` (`fs_id_pelunasan_piutang_detail`, `fs_id_pelunasan_piutang`, `fs_id_piutang`, `fs_id_registrasi`, `fn_nilai_pelunasan`) VALUES
(20, 12, 2, 85, 300000),
(21, 12, 1, 83, 350000),
(22, 13, 2, 85, 250000),
(23, 13, 1, 83, 221000),
(24, 14, 2, 85, 250000),
(25, 14, 1, 83, 221000),
(26, 15, 2, 85, 250000),
(27, 15, 1, 83, 221000),
(28, 16, 2, 85, 250000),
(29, 16, 1, 83, 221000),
(30, 17, 4, 87, 350000),
(31, 17, 3, 86, 650000),
(32, 18, 4, 87, 50000),
(33, 18, 3, 86, 50000),
(34, 19, 4, 87, 50000),
(35, 19, 3, 86, 50000),
(36, 20, 2, 85, 250000),
(37, 20, 1, 83, 221000),
(38, 21, 5, 88, 550000),
(39, 21, 6, 89, 384000),
(40, 22, 5, 88, 550000),
(41, 22, 6, 89, 384000),
(42, 23, 9, 92, 30000),
(43, 24, 7, 90, 350000);

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
(55, 'RG00000049', 18, 8, 1, 1, '123123', 6, 100000, 4, '2021-04-08', '2021-04-08', '3000-01-01', 1, 1),
(56, 'RG00000050', 12, 8, 1, 2, '12312312', 6, 100000, 4, '2021-04-08', '2021-04-29', '3000-01-01', 1, 1),
(57, 'RG00000051', 15, 8, 1, 3, '', 6, 100000, 2, '2021-04-09', '2021-04-16', '3000-01-01', 1, 1),
(58, 'RG00000052', 10, 8, 2, 3, '', 6, 100000, 2, '2021-04-10', '2021-04-12', '3000-01-01', 1, 1),
(59, 'RG00000053', 10, 5, 2, 1, '123123', 5, 0, 1, '2021-04-12', '3000-01-01', '2021-04-17', 1, 0),
(60, 'RG00000054', 11, 2, 1, 3, '', 2, 10000, 2, '2021-04-17', '3000-01-01', '3000-01-01', 1, 0),
(61, 'RG00000055', 14, 2, 1, 3, '', 2, 10000, 2, '2021-04-17', '3000-01-01', '3000-01-01', 1, 0),
(62, 'RG00000056', 16, 2, 1, 1, '112233', 2, 10000, 3, '2021-04-17', '2021-04-17', '3000-01-01', 1, 1),
(63, 'RG00000057', 12, 8, 2, 1, '112233', 6, 100000, 2, '2021-04-17', '2021-04-17', '3000-01-01', 1, 1),
(64, 'RG00000058', 10, 8, 1, 3, '', 6, 100000, 2, '2021-04-19', '2021-05-03', '3000-01-01', 1, 1),
(65, 'RG00000059', 13, 8, 1, 4, '', 1, 5000, 2, '2021-04-20', '2021-04-30', '3000-01-01', 1, 1),
(66, 'RG00000060', 17, 7, 2, 2, '', 5, 50000, 2, '2021-04-20', '2021-04-30', '3000-01-01', 1, 1),
(67, 'RG00000061', 12, 3, 1, 4, '', 2, 10000, 3, '2021-05-03', '2021-05-06', '3000-01-01', 1, 1),
(68, 'RG00000062', 10, 8, 1, 3, '', 1, 5000, 3, '2021-05-03', '2021-05-04', '3000-01-01', 1, 1),
(69, 'RG00000063', 13, 5, 2, 4, '556677', 6, 100000, 3, '2021-05-06', '2021-05-06', '3000-01-01', 1, 1),
(70, 'RG00000064', 18, 2, 2, 4, '123123123', 6, 100000, 3, '2021-05-06', '2021-05-06', '3000-01-01', 1, 1),
(71, 'RG00000065', 11, 7, 1, 4, '898989', 6, 100000, 3, '2021-05-06', '2021-05-06', '3000-01-01', 1, 1),
(72, 'RG00000066', 10, 2, 2, 1, '131312313123', 2, 10000, 3, '2021-05-19', '2021-05-19', '3000-01-01', 1, 1),
(73, 'RG00000067', 10, 8, 1, 1, '13212312', 6, 100000, 3, '2021-05-20', '2021-05-20', '3000-01-01', 1, 1),
(74, 'RG00000068', 13, 8, 2, 1, '1312312312', 6, 100000, 3, '2021-05-20', '2021-05-20', '3000-01-01', 1, 1),
(75, 'RG00000069', 10, 8, 1, 1, '12312312', 6, 100000, 2, '2021-05-21', '2021-06-16', '3000-01-01', 1, 1),
(76, 'RG00000070', 17, 2, 1, 1, '45454545', 2, 10000, 2, '2021-06-16', '2021-06-16', '3000-01-01', 1, 1),
(77, 'RG00000071', 18, 8, 1, 4, '9898989', 6, 100000, 2, '2021-06-16', '2021-06-16', '3000-01-01', 1, 1),
(78, 'RG00000072', 11, 8, 1, 4, '13213132', 6, 100000, 2, '2021-06-17', '2021-06-17', '3000-01-01', 1, 1),
(79, 'RG00000073', 16, 8, 2, 4, '98989', 6, 100000, 2, '2021-06-17', '2021-06-17', '3000-01-01', 1, 1),
(80, 'RG00000074', 11, 2, 1, 4, '878787878', 6, 100000, 4, '2021-06-17', '2021-06-17', '3000-01-01', 1, 1),
(81, 'RG00000075', 14, 8, 1, 4, '121212', 6, 100000, 4, '2021-06-17', '2021-06-22', '3000-01-01', 1, 1),
(82, 'RG00000076', 16, 2, 1, 1, '123123123', 2, 10000, 3, '2021-06-22', '2021-06-22', '3000-01-01', 1, 1),
(83, 'RG00000077', 12, 8, 1, 4, '1212121', 6, 100000, 2, '2021-06-23', '2021-06-23', '3000-01-01', 1, 1),
(84, 'RG00000078', 18, 8, 2, 3, '', 6, 100000, 2, '2021-06-23', '2021-06-23', '3000-01-01', 1, 1),
(85, 'RG00000079', 13, 8, 2, 4, '', 6, 100000, 2, '2021-06-23', '2021-06-23', '3000-01-01', 1, 1),
(86, 'RG00000080', 10, 8, 1, 4, '123123', 6, 100000, 2, '2021-06-24', '2021-06-24', '3000-01-01', 1, 1),
(87, 'RG00000081', 17, 2, 2, 4, '123123', 6, 100000, 2, '2021-06-24', '2021-06-24', '3000-01-01', 1, 1),
(88, 'RG00000082', 16, 2, 2, 1, '123123', 6, 100000, 2, '2021-06-24', '2021-06-24', '3000-01-01', 1, 1),
(89, 'RG00000083', 15, 8, 1, 1, '', 6, 100000, 2, '2021-06-24', '2021-06-24', '3000-01-01', 1, 1),
(90, 'RG00000084', 11, 7, 1, 2, '', 6, 100000, 2, '2021-06-24', '2021-06-24', '3000-01-01', 1, 1),
(91, 'RG00000085', 14, 5, 1, 2, '343434', 1, 5000, 2, '2021-06-24', '2021-06-24', '3000-01-01', 1, 1),
(92, 'RG00000086', 11, 8, 1, 4, '12121', 6, 100000, 2, '2021-06-28', '2021-06-28', '3000-01-01', 1, 1),
(93, 'RG00000087', 10, 8, 1, 4, '1121212', 6, 100000, 2, '2021-06-29', '2021-06-29', '3000-01-01', 1, 1),
(94, 'RG00000088', 13, 8, 1, 4, '878787', 6, 100000, 2, '2021-06-29', '2021-06-29', '3000-01-01', 1, 1),
(95, 'RG00000089', 17, 8, 1, 4, '123', 6, 100000, 2, '2021-06-29', '2021-06-29', '3000-01-01', 1, 1),
(96, 'RG00000090', 10, 8, 2, 4, '12312312', 6, 0, 3, '2021-07-06', '3000-01-01', '2021-07-07', 1, 1),
(97, 'RG00000091', 13, 7, 2, 1, '1212121', 1, 5000, 1, '2021-07-07', '3000-01-01', '3000-01-01', 1, 1),
(98, 'RG00000092', 14, 5, 1, 3, '', 1, 5000, 1, '2021-07-07', '3000-01-01', '3000-01-01', 1, 1),
(99, 'RG00000093', 17, 2, 1, 3, '', 6, 100000, 1, '2021-07-07', '3000-01-01', '3000-01-01', 1, 1),
(100, 'RG00000094', 18, 8, 1, 4, '1212', 6, 100000, 1, '2021-07-07', '3000-01-01', '3000-01-01', 1, 1),
(101, 'RG00000095', 11, 8, 2, 2, '12121', 6, 100000, 1, '2021-07-07', '3000-01-01', '3000-01-01', 1, 1),
(102, 'RG00000096', 15, 8, 1, 1, '2121', 6, 100000, 1, '2021-07-07', '3000-01-01', '3000-01-01', 1, 1);

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
(30, 52, 699775, 0, '2021-04-05', 1),
(33, 53, 679200, 0, '2021-04-06', 1),
(34, 54, 303225, 0, '2021-04-08', 1),
(35, 51, 749225, 0, '2021-04-08', 1),
(37, 55, 529850, 0, '2021-04-08', 1),
(39, 58, 421000, 0, '2021-04-12', 1),
(40, 57, 856250, 0, '2021-04-16', 1),
(41, 62, 386375, 0, '2021-04-17', 1),
(42, 63, 611205, 0, '2021-04-17', 1),
(43, 56, 540275, 0, '2021-04-29', 1),
(44, 65, 5000, 0, '2021-04-30', 1),
(45, 66, 450000, 0, '2021-04-30', 1),
(46, 64, 500000, 0, '2021-05-03', 1),
(47, 68, 413480, 0, '2021-05-04', 1),
(48, 67, 509880, 0, '2021-05-06', 1),
(49, 69, 595130, 0, '2021-05-06', 1),
(50, 70, 382000, 0, '2021-05-06', 1),
(51, 71, 390000, 0, '2021-05-06', 1),
(52, 72, 295205, 0, '2021-05-19', 1),
(53, 73, 654000, 0, '2021-05-20', 1),
(54, 74, 835000, 0, '2021-05-20', 1),
(55, 75, 421000, 0, '2021-06-16', 1),
(56, 76, 510000, 0, '2021-06-16', 1),
(57, 77, 571000, 0, '2021-06-16', 1),
(58, 78, 571000, 0, '2021-06-17', 1),
(59, 79, 600000, 0, '2021-06-17', 1),
(61, 80, 429350, 0, '2021-06-17', 1),
(63, 81, 647950, 147950, '2021-06-22', 1),
(64, 82, 593000, 0, '2021-06-22', 1),
(65, 83, 571000, 0, '2021-06-23', 1),
(66, 84, 250000, 0, '2021-06-23', 1),
(67, 85, 550000, 0, '2021-06-23', 1),
(68, 86, 700000, 0, '2021-06-24', 1),
(69, 87, 400000, 0, '2021-06-24', 1),
(70, 88, 550000, 0, '2021-06-24', 1),
(71, 89, 384000, 0, '2021-06-24', 1),
(72, 90, 350000, 0, '2021-06-24', 1),
(73, 91, 325000, 0, '2021-06-24', 1),
(74, 92, 550000, 0, '2021-06-28', 1),
(75, 93, 700000, 0, '2021-06-29', 1),
(76, 94, 850000, 0, '2021-06-29', 1),
(77, 95, 850000, 0, '2021-06-29', 1);

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
  `fn_diskon_regout` int(11) NOT NULL,
  `fd_tgl_bayar` date NOT NULL,
  `fs_id_order_piutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_trs_regout2`
--

INSERT INTO `t_trs_regout2` (`fs_id_regout2`, `fs_kd_regout2`, `fs_id_regout`, `fs_id_registrasi`, `fn_cash`, `fs_id_bank_debit`, `fn_no_debit`, `fn_debit`, `fs_id_bank_credit`, `fn_no_credit`, `fn_credit`, `fs_id_jaminan`, `fn_klaim`, `fn_diskon_regout`, `fd_tgl_bayar`, `fs_id_order_piutang`) VALUES
(16, 'DX00000011', 22, 42, 444910, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(17, 'DX00000012', 23, 43, 400000, 0, 0, 0, 0, 0, 0, 1, 0, 0, '0000-00-00', 0),
(18, 'DX00000013', 24, 45, 676900, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(19, 'DX00000014', 25, 46, 155000, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(20, 'DX00000015', 26, 47, 5000, 0, 0, 0, 0, 0, 0, 1, 0, 0, '0000-00-00', 0),
(21, 'DX00000016', 27, 48, 100000, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(22, 'DX00000017', 28, 49, 10000, 0, 0, 0, 0, 0, 0, 4, 0, 0, '0000-00-00', 0),
(23, 'DX00000018', 29, 50, 50000, 0, 0, 0, 0, 0, 0, 4, 0, 0, '0000-00-00', 0),
(24, 'DX00000019', 30, 52, 650000, 0, 0, 0, 0, 0, 0, 2, 0, 0, '0000-00-00', 0),
(27, 'DX00000022', 33, 53, 679200, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(28, 'DX00000024', 34, 54, 303225, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(29, 'DX00000025', 35, 51, 749225, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(31, 'DX00000027', 37, 55, 529850, 0, 0, 0, 0, 0, 0, 1, 0, 0, '0000-00-00', 0),
(33, 'DX00000029', 39, 58, 421000, 0, 0, 0, 0, 0, 0, 3, 0, 0, '0000-00-00', 0),
(34, 'DX00000030', 40, 57, 500000, 1, 112233, 200000, 4, 445566, 100000, 1, 50000, 0, '2021-04-16', 6),
(35, 'DX00000031', 40, 57, 6250, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-16', 6),
(36, 'DX00000032', 30, 52, 49775, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-16', 0),
(37, 'DX00000033', 41, 62, 86375, 1, 112233, 100000, 0, 0, 0, 1, 0, 0, '2021-04-17', 0),
(38, 'DX00000034', 41, 62, 50000, 0, 0, 0, 2, 66778899, 150000, 0, 0, 0, '2021-04-17', 0),
(39, 'DX00000035', 42, 63, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '2021-04-17', 0),
(40, 'DX00000036', 42, 63, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-19', 0),
(41, 'DX00000037', 42, 63, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-19', 0),
(42, 'DX00000038', 42, 63, 200000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-28', 0),
(43, 'DX00000039', 42, 63, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-29', 0),
(44, 'DX00000040', 42, 63, 60000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-29', 0),
(45, 'DX00000041', 42, 63, 15500, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-29', 0),
(46, 'DX00000042', 42, 63, 5500, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-29', 0),
(47, 'DX00000043', 42, 63, 80205, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-29', 0),
(48, 'DX00000044', 43, 56, 540275, 0, 0, 0, 0, 0, 0, 2, 0, 0, '2021-04-29', 0),
(49, 'DX00000045', 44, 65, 5000, 0, 0, 0, 0, 0, 0, 4, 0, 0, '2021-04-30', 0),
(50, 'DX00000046', 45, 66, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, '2021-04-30', 0),
(51, 'DX00000047', 45, 66, 125500, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-04-30', 0),
(52, 'DX00000048', 46, 64, 500000, 0, 0, 0, 0, 0, 0, 3, 0, 0, '2021-05-03', 0),
(53, 'DX00000049', 45, 66, 324500, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-04', 0),
(54, 'DX00000050', 47, 68, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, '2021-05-04', 0),
(55, 'DX00000051', 48, 67, 0, 0, 0, 0, 0, 0, 0, 4, 509880, 0, '2021-05-06', 3),
(56, 'DX00000052', 49, 69, 0, 0, 0, 0, 0, 0, 0, 4, 595130, 0, '2021-05-06', 3),
(57, 'DX00000053', 50, 70, 0, 0, 0, 0, 0, 0, 0, 1, 382000, 0, '2021-05-06', 5),
(58, 'DX00000054', 51, 71, 0, 0, 0, 0, 0, 0, 0, 1, 390000, 0, '2021-05-06', 4),
(59, 'DX00000055', 47, 68, 413480, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-08', 0),
(60, 'DX00000056', 52, 72, 0, 0, 0, 0, 0, 0, 0, 1, 295205, 0, '2021-05-19', 0),
(61, 'DX00000057', 53, 73, 0, 0, 0, 0, 0, 0, 0, 1, 654000, 0, '2021-05-20', 0),
(62, 'DX00000058', 54, 74, 0, 0, 0, 0, 0, 0, 0, 1, 835000, 0, '2021-05-20', 0),
(63, 'DX00000059', 55, 75, 0, 0, 0, 0, 0, 0, 0, 1, 421000, 0, '2021-06-16', 9),
(64, 'DX00000060', 56, 76, 0, 0, 0, 0, 0, 0, 0, 1, 510000, 0, '2021-06-16', 10),
(65, 'DX00000061', 57, 77, 0, 0, 0, 0, 0, 0, 0, 4, 571000, 0, '2021-06-16', 11),
(66, 'DX00000062', 58, 78, 0, 0, 0, 0, 0, 0, 0, 4, 571000, 0, '2021-06-17', 11),
(67, 'DX00000063', 59, 79, 0, 0, 0, 0, 0, 0, 0, 4, 600000, 0, '2021-06-17', 11),
(69, 'DX00000065', 61, 80, 0, 0, 0, 0, 0, 0, 0, 4, 300000, 0, '2021-06-17', 12),
(70, 'DX00000066', 61, 80, 129350, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-06-17', 12),
(72, 'DX00000069', 63, 81, 0, 0, 0, 0, 0, 0, 0, 4, 400000, 0, '2021-06-22', 0),
(73, 'DX00000070', 64, 82, 0, 0, 0, 0, 0, 0, 0, 1, 593000, 0, '2021-06-22', 0),
(74, 'DX00000071', 65, 83, 0, 0, 0, 0, 0, 0, 0, 4, 571000, 0, '2021-06-23', 13),
(75, 'DX00000072', 66, 84, 250000, 0, 0, 0, 0, 0, 0, 3, 0, 0, '2021-06-23', 0),
(76, 'DX00000073', 67, 85, 0, 0, 0, 0, 0, 0, 0, 4, 550000, 0, '2021-06-23', 0),
(77, 'DX00000074', 68, 86, 0, 0, 0, 0, 0, 0, 0, 4, 700000, 0, '2021-06-24', 0),
(78, 'DX00000075', 69, 87, 0, 0, 0, 0, 0, 0, 0, 4, 400000, 0, '2021-06-24', 0),
(79, 'DX00000076', 70, 88, 0, 0, 0, 0, 0, 0, 0, 1, 550000, 0, '2021-06-24', 0),
(80, 'DX00000077', 71, 89, 0, 0, 0, 0, 0, 0, 0, 1, 384000, 0, '2021-06-24', 0),
(81, 'DX00000078', 72, 90, 0, 0, 0, 0, 0, 0, 0, 2, 350000, 0, '2021-06-24', 0),
(82, 'DX00000079', 73, 91, 125000, 0, 0, 0, 0, 0, 0, 2, 200000, 0, '2021-06-24', 0),
(83, 'DX00000080', 63, 81, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-06-24', 0),
(84, 'DX00000081', 74, 92, 0, 0, 0, 0, 0, 0, 0, 4, 550000, 0, '2021-06-28', 0),
(85, 'DX00000082', 75, 93, 0, 0, 0, 0, 0, 0, 0, 4, 700000, 0, '2021-06-29', 0),
(86, 'DX00000083', 76, 94, 0, 0, 0, 0, 0, 0, 0, 4, 850000, 0, '2021-06-29', 0),
(87, 'DX00000084', 77, 95, 0, 0, 0, 0, 0, 0, 0, 4, 850000, 0, '2021-06-29', 0);

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
(53, 'TU00000065', 55, 8, 321000, 321000, 0, '2021-04-08', '0000-00-00', 1),
(54, 'TU00000066', 56, 8, 171000, 171000, 0, '2021-04-08', '0000-00-00', 1),
(55, 'TU00000067', 56, 7, 140000, 140000, 0, '2021-04-08', '0000-00-00', 1),
(56, 'TU00000068', 57, 8, 321000, 321000, 0, '2021-04-09', '0000-00-00', 1),
(57, 'TU00000069', 58, 8, 321000, 321000, 0, '2021-04-12', '0000-00-00', 1),
(58, 'TU00000070', 57, 7, 350000, 350000, 0, '2021-04-15', '0000-00-00', 1),
(59, 'TU00000071', 60, 2, 250000, 250000, 0, '2021-04-17', '2021-04-17', 1),
(60, 'TU00000072', 61, 2, 250000, 250000, 0, '2021-04-17', '2021-04-17', 1),
(61, 'TU00000073', 62, 2, 250000, 250000, 0, '2021-04-17', '0000-00-00', 1),
(62, 'TU00000074', 63, 8, 471000, 471000, 0, '2021-04-17', '0000-00-00', 1),
(63, 'TU00000076', 64, 8, 250000, 250000, 0, '2021-04-20', '0000-00-00', 1),
(64, 'TU00000077', 64, 8, 150000, 150000, 0, '2021-04-20', '0000-00-00', 1),
(66, 'TU00000079', 65, 8, 321000, 321000, 0, '2021-04-23', '2021-04-28', 1),
(73, 'TU00000078', 66, 8, 400000, 400000, 0, '2021-04-20', '0000-00-00', 1),
(74, 'TU00000080', 68, 8, 321000, 321000, 0, '2021-05-04', '0000-00-00', 1),
(75, 'TU00000081', 67, 8, 471000, 471000, 0, '2021-05-06', '0000-00-00', 1),
(76, 'TU00000082', 69, 5, 480000, 480000, 0, '2021-05-06', '0000-00-00', 1),
(77, 'TU00000083', 70, 2, 250000, 250000, 0, '2021-05-06', '0000-00-00', 1),
(78, 'TU00000084', 71, 7, 260000, 260000, 0, '2021-05-06', '0000-00-00', 1),
(79, 'TU00000085', 72, 2, 250000, 250000, 0, '2021-05-19', '0000-00-00', 1),
(80, 'TU00000086', 73, 8, 471000, 471000, 0, '2021-05-20', '0000-00-00', 1),
(81, 'TU00000087', 74, 8, 250000, 250000, 0, '2021-05-20', '0000-00-00', 1),
(82, 'TU00000088', 75, 8, 321000, 321000, 0, '2021-06-16', '0000-00-00', 1),
(83, 'TU00000089', 76, 2, 500000, 500000, 0, '2021-06-16', '0000-00-00', 1),
(84, 'TU00000090', 77, 8, 471000, 471000, 0, '2021-06-16', '0000-00-00', 1),
(85, 'TU00000091', 78, 8, 471000, 471000, 0, '2021-06-17', '0000-00-00', 1),
(86, 'TU00000092', 79, 8, 500000, 500000, 0, '2021-06-17', '0000-00-00', 1),
(87, 'TU00000093', 80, 2, 250000, 250000, 0, '2021-06-17', '0000-00-00', 1),
(88, 'TU00000094', 81, 8, 471000, 471000, 0, '2021-06-17', '0000-00-00', 1),
(89, 'TU00000095', 82, 2, 500000, 500000, 0, '2021-06-22', '0000-00-00', 1),
(90, 'TU00000096', 83, 8, 471000, 471000, 0, '2021-06-23', '0000-00-00', 1),
(91, 'TU00000097', 84, 8, 150000, 150000, 0, '2021-06-23', '0000-00-00', 1),
(92, 'TU00000098', 85, 8, 450000, 450000, 0, '2021-06-23', '0000-00-00', 1),
(93, 'TU00000099', 86, 8, 600000, 600000, 0, '2021-06-24', '0000-00-00', 1),
(94, 'TU00000100', 87, 2, 300000, 300000, 0, '2021-06-24', '0000-00-00', 1),
(95, 'TU00000101', 88, 2, 450000, 450000, 0, '2021-06-24', '0000-00-00', 1),
(96, 'TU00000102', 89, 8, 284000, 284000, 0, '2021-06-24', '0000-00-00', 1),
(97, 'TU00000103', 90, 7, 250000, 250000, 0, '2021-06-24', '0000-00-00', 1),
(98, 'TU00000104', 91, 5, 320000, 320000, 0, '2021-06-24', '0000-00-00', 1),
(99, 'TU00000105', 92, 8, 450000, 450000, 0, '2021-06-28', '0000-00-00', 1),
(100, 'TU00000106', 93, 8, 600000, 600000, 0, '2021-06-29', '0000-00-00', 1),
(101, 'TU00000107', 94, 8, 750000, 750000, 0, '2021-06-29', '0000-00-00', 1),
(102, 'TU00000108', 95, 8, 750000, 750000, 0, '2021-06-29', '0000-00-00', 1),
(103, 'TU00000109', 96, 8, 1500000, 1500000, 0, '2021-07-06', '0000-00-00', 1);

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
(99, 53, 40, 1, 0, 100000, 100000),
(100, 54, 43, 1, 0, 71000, 71000),
(101, 54, 40, 1, 0, 100000, 100000),
(102, 55, 41, 1, 0, 70000, 70000),
(103, 55, 38, 1, 0, 70000, 70000),
(104, 55, 36, 1, 0, 70000, 70000),
(105, 56, 45, 1, 0, 150000, 150000),
(106, 56, 43, 1, 0, 71000, 71000),
(107, 56, 40, 1, 0, 100000, 100000),
(108, 57, 45, 1, 0, 150000, 150000),
(109, 57, 43, 1, 0, 71000, 71000),
(110, 57, 40, 1, 0, 100000, 100000),
(111, 58, 41, 3, 0, 70000, 210000),
(112, 58, 38, 2, 0, 70000, 140000),
(113, 59, 34, 1, 0, 100000, 100000),
(114, 59, 33, 1, 0, 150000, 150000),
(115, 60, 34, 1, 0, 100000, 100000),
(116, 60, 33, 1, 0, 150000, 150000),
(117, 61, 34, 1, 0, 100000, 100000),
(118, 61, 33, 1, 0, 150000, 150000),
(119, 62, 45, 1, 0, 150000, 150000),
(120, 62, 43, 1, 0, 71000, 71000),
(121, 62, 40, 1, 0, 100000, 100000),
(122, 62, 33, 1, 0, 150000, 150000),
(123, 0, 40, 1, 0, 100000, 100000),
(124, 0, 33, 1, 0, 150000, 150000),
(125, 63, 40, 1, 0, 100000, 100000),
(126, 63, 33, 1, 0, 150000, 150000),
(127, 64, 45, 1, 0, 150000, 150000),
(132, 66, 43, 1, 0, 71000, 71000),
(133, 66, 40, 1, 0, 100000, 100000),
(134, 66, 33, 1, 0, 150000, 150000),
(154, 73, 45, 1, 0, 150000, 150000),
(155, 73, 40, 1, 0, 100000, 100000),
(156, 73, 33, 1, 0, 150000, 150000),
(157, 74, 43, 1, 0, 71000, 71000),
(158, 74, 40, 1, 0, 100000, 100000),
(159, 74, 33, 1, 0, 150000, 150000),
(160, 75, 45, 1, 0, 150000, 150000),
(161, 75, 43, 1, 0, 71000, 71000),
(162, 75, 40, 1, 0, 100000, 100000),
(163, 75, 33, 1, 0, 150000, 150000),
(164, 76, 45, 1, 0, 150000, 150000),
(165, 76, 37, 1, 0, 80000, 80000),
(166, 76, 34, 1, 0, 100000, 100000),
(167, 76, 33, 1, 0, 150000, 150000),
(168, 77, 34, 1, 0, 100000, 100000),
(169, 77, 33, 1, 0, 150000, 150000),
(170, 78, 42, 1, 0, 50000, 50000),
(171, 78, 41, 1, 0, 70000, 70000),
(172, 78, 38, 1, 0, 70000, 70000),
(173, 78, 36, 1, 0, 70000, 70000),
(174, 79, 34, 1, 0, 100000, 100000),
(175, 79, 33, 1, 0, 150000, 150000),
(176, 80, 45, 1, 0, 150000, 150000),
(177, 80, 43, 1, 0, 71000, 71000),
(178, 80, 40, 1, 0, 100000, 100000),
(179, 80, 33, 1, 0, 150000, 150000),
(180, 81, 40, 1, 0, 100000, 100000),
(181, 81, 33, 1, 0, 150000, 150000),
(182, 82, 43, 1, 0, 71000, 71000),
(183, 82, 40, 1, 0, 100000, 100000),
(184, 82, 33, 1, 0, 150000, 150000),
(185, 83, 34, 2, 0, 100000, 200000),
(186, 83, 33, 2, 0, 150000, 300000),
(187, 84, 45, 1, 0, 150000, 150000),
(188, 84, 43, 1, 0, 71000, 71000),
(189, 84, 40, 1, 0, 100000, 100000),
(190, 84, 33, 1, 0, 150000, 150000),
(191, 85, 45, 1, 0, 150000, 150000),
(192, 85, 43, 1, 0, 71000, 71000),
(193, 85, 40, 1, 0, 100000, 100000),
(194, 85, 33, 1, 0, 150000, 150000),
(195, 86, 40, 2, 0, 100000, 200000),
(196, 86, 33, 2, 0, 150000, 300000),
(197, 87, 34, 1, 0, 100000, 100000),
(198, 87, 33, 1, 0, 150000, 150000),
(199, 88, 45, 1, 0, 150000, 150000),
(200, 88, 43, 1, 0, 71000, 71000),
(201, 88, 40, 1, 0, 100000, 100000),
(202, 88, 33, 1, 0, 150000, 150000),
(203, 89, 34, 2, 0, 100000, 200000),
(204, 89, 33, 2, 0, 150000, 300000),
(205, 90, 45, 1, 0, 150000, 150000),
(206, 90, 43, 1, 0, 71000, 71000),
(207, 90, 40, 1, 0, 100000, 100000),
(208, 90, 33, 1, 0, 150000, 150000),
(209, 91, 33, 1, 0, 150000, 150000),
(210, 92, 33, 3, 0, 150000, 450000),
(211, 93, 33, 4, 0, 150000, 600000),
(212, 94, 34, 3, 0, 100000, 300000),
(213, 95, 33, 3, 0, 150000, 450000),
(214, 96, 43, 4, 0, 71000, 284000),
(215, 97, 42, 5, 0, 50000, 250000),
(216, 98, 37, 4, 0, 80000, 320000),
(217, 99, 33, 3, 0, 150000, 450000),
(218, 100, 33, 4, 0, 150000, 600000),
(219, 101, 45, 5, 0, 150000, 750000),
(220, 102, 33, 5, 0, 150000, 750000),
(221, 103, 45, 10, 0, 150000, 1500000);

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
  `fs_id_user` int(11) NOT NULL,
  `fs_id_tindakan` int(11) NOT NULL
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
(3, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'Ian Ec', 'Denpasar', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`fs_id_bank`);

--
-- Indeks untuk tabel `tb_bank_group`
--
ALTER TABLE `tb_bank_group`
  ADD PRIMARY KEY (`fs_id_bank_group`);

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
-- Indeks untuk tabel `tb_repack`
--
ALTER TABLE `tb_repack`
  ADD PRIMARY KEY (`fs_id_repack`);

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
-- Indeks untuk tabel `t_hutang`
--
ALTER TABLE `t_hutang`
  ADD PRIMARY KEY (`fs_id_hutang`);

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
-- Indeks untuk tabel `t_lab_antigen`
--
ALTER TABLE `t_lab_antigen`
  ADD PRIMARY KEY (`fs_id_trs`);

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
-- Indeks untuk tabel `t_piutang`
--
ALTER TABLE `t_piutang`
  ADD PRIMARY KEY (`fs_id_piutang`);

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
-- Indeks untuk tabel `t_trs_order_hutang`
--
ALTER TABLE `t_trs_order_hutang`
  ADD PRIMARY KEY (`fs_id_order_hutang`);

--
-- Indeks untuk tabel `t_trs_order_hutang_cart`
--
ALTER TABLE `t_trs_order_hutang_cart`
  ADD PRIMARY KEY (`fs_id_cart_order_hutang`);

--
-- Indeks untuk tabel `t_trs_order_hutang_detail`
--
ALTER TABLE `t_trs_order_hutang_detail`
  ADD PRIMARY KEY (`fs_id_order_hutang_detail`);

--
-- Indeks untuk tabel `t_trs_order_piutang`
--
ALTER TABLE `t_trs_order_piutang`
  ADD PRIMARY KEY (`fs_id_order_piutang`);

--
-- Indeks untuk tabel `t_trs_order_piutang_cart`
--
ALTER TABLE `t_trs_order_piutang_cart`
  ADD PRIMARY KEY (`fs_id_cart_order_piutang`);

--
-- Indeks untuk tabel `t_trs_order_piutang_detail`
--
ALTER TABLE `t_trs_order_piutang_detail`
  ADD PRIMARY KEY (`fs_id_order_piutang_detail`);

--
-- Indeks untuk tabel `t_trs_pelunasan_hutang`
--
ALTER TABLE `t_trs_pelunasan_hutang`
  ADD PRIMARY KEY (`fs_id_pelunasan_hutang`);

--
-- Indeks untuk tabel `t_trs_pelunasan_hutang_detail`
--
ALTER TABLE `t_trs_pelunasan_hutang_detail`
  ADD PRIMARY KEY (`fs_id_pelunasan_hutang_detail`);

--
-- Indeks untuk tabel `t_trs_pelunasan_piutang`
--
ALTER TABLE `t_trs_pelunasan_piutang`
  ADD PRIMARY KEY (`fs_id_pelunasan_piutang`);

--
-- Indeks untuk tabel `t_trs_pelunasan_piutang_detail`
--
ALTER TABLE `t_trs_pelunasan_piutang_detail`
  ADD PRIMARY KEY (`fs_id_pelunasan_piutang_detail`);

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
-- AUTO_INCREMENT untuk tabel `tb_bank_group`
--
ALTER TABLE `tb_bank_group`
  MODIFY `fs_id_bank_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `fs_id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT untuk tabel `tb_repack`
--
ALTER TABLE `tb_repack`
  MODIFY `fs_id_repack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `fs_id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_pembelian_detail`
--
ALTER TABLE `tb_trs_pembelian_detail`
  MODIFY `fs_id_pembelian_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_penjualan`
--
ALTER TABLE `tb_trs_penjualan`
  MODIFY `fs_id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_penjualan_detail`
--
ALTER TABLE `tb_trs_penjualan_detail`
  MODIFY `fs_id_penjualan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_racik`
--
ALTER TABLE `tb_trs_racik`
  MODIFY `fs_id_racik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `tb_trs_racik_detail`
--
ALTER TABLE `tb_trs_racik_detail`
  MODIFY `fs_id_racik_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

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
-- AUTO_INCREMENT untuk tabel `t_hutang`
--
ALTER TABLE `t_hutang`
  MODIFY `fs_id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT untuk tabel `t_lab_antigen`
--
ALTER TABLE `t_lab_antigen`
  MODIFY `fs_id_trs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT untuk tabel `t_piutang`
--
ALTER TABLE `t_piutang`
  MODIFY `fs_id_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `fs_id_soap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `t_tarif`
--
ALTER TABLE `t_tarif`
  MODIFY `fs_id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `t_tarif_layanan`
--
ALTER TABLE `t_tarif_layanan`
  MODIFY `fs_id_tarif_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `t_tarif_nilai_dtl`
--
ALTER TABLE `t_tarif_nilai_dtl`
  MODIFY `fs_id_tarif_nilai_dtl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `t_trs_billing`
--
ALTER TABLE `t_trs_billing`
  MODIFY `fs_id_trs_billing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT untuk tabel `t_trs_order_hutang`
--
ALTER TABLE `t_trs_order_hutang`
  MODIFY `fs_id_order_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_trs_order_hutang_detail`
--
ALTER TABLE `t_trs_order_hutang_detail`
  MODIFY `fs_id_order_hutang_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_trs_order_piutang`
--
ALTER TABLE `t_trs_order_piutang`
  MODIFY `fs_id_order_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `t_trs_order_piutang_detail`
--
ALTER TABLE `t_trs_order_piutang_detail`
  MODIFY `fs_id_order_piutang_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `t_trs_pelunasan_hutang`
--
ALTER TABLE `t_trs_pelunasan_hutang`
  MODIFY `fs_id_pelunasan_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_trs_pelunasan_hutang_detail`
--
ALTER TABLE `t_trs_pelunasan_hutang_detail`
  MODIFY `fs_id_pelunasan_hutang_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `t_trs_pelunasan_piutang`
--
ALTER TABLE `t_trs_pelunasan_piutang`
  MODIFY `fs_id_pelunasan_piutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `t_trs_pelunasan_piutang_detail`
--
ALTER TABLE `t_trs_pelunasan_piutang_detail`
  MODIFY `fs_id_pelunasan_piutang_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `t_trs_registrasi`
--
ALTER TABLE `t_trs_registrasi`
  MODIFY `fs_id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `t_trs_regout`
--
ALTER TABLE `t_trs_regout`
  MODIFY `fs_id_regout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `t_trs_regout2`
--
ALTER TABLE `t_trs_regout2`
  MODIFY `fs_id_regout2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `t_trs_tindakan`
--
ALTER TABLE `t_trs_tindakan`
  MODIFY `fs_id_trs_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT untuk tabel `t_trs_tindakan2`
--
ALTER TABLE `t_trs_tindakan2`
  MODIFY `fs_id_tindakan2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

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
