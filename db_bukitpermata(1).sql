-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mar 2019 pada 01.12
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bukitpermata`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewSaldoOn`()
    COMMENT 'Mutasi saldo penerimaan & Keluar'
BEGIN
set @s:=0;
SELECT tglflow,alokasi,@k:=if(type="K",nominal,0) as Kredit,@d:=if(type="D",nominal,0) as
 debet, abs(@s:=@s+@k-@d) as saldo from tbl_cash_flow  GROUP BY idcashflow ORDER BY tglflow,idcashflow aSC;
 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `saldobymonth`
--
CREATE TABLE IF NOT EXISTS `saldobymonth` (
`tahun` int(4)
,`DebitJan` double
,`KreditJan` double
,`DebitFeb` double
,`KreditFeb` double
,`DebitMar` double
,`KreditMar` double
,`DebitApr` double
,`KreditApr` double
,`DebitMei` double
,`KreditMei` double
,`DebitJun` double
,`KreditJun` double
,`DebitJul` double
,`KreditJul` double
,`DebitAgus` double
,`KreditAgus` double
,`DebitSep` double
,`KreditSep` double
,`DebitOkto` double
,`KreditOkto` double
,`DebitNov` double
,`KreditNov` double
,`DebitDes` double
,`KreditDes` double
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cash_flow`
--

CREATE TABLE IF NOT EXISTS `tbl_cash_flow` (
`idcashflow` int(11) NOT NULL,
  `no_trx` char(20) DEFAULT NULL,
  `tglflow` date DEFAULT NULL,
  `createflow` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` enum('K','D') DEFAULT NULL,
  `alokasi` text,
  `nominal` double DEFAULT NULL,
  `iduser` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `tbl_cash_flow`
--

INSERT INTO `tbl_cash_flow` (`idcashflow`, `no_trx`, `tglflow`, `createflow`, `type`, `alokasi`, `nominal`, `iduser`) VALUES
(1, 'BJP/CF/0203190001', '2019-03-01', '2019-03-02 17:36:21', 'D', 'Saldo Awal', 10000000, 1),
(2, 'BJP/CF/0203190002', '2019-03-03', '2019-03-02 15:09:05', 'K', 'Pembelian Batu bata', 400000, 1),
(3, 'BJP/CF/0203190003', '2019-03-04', '2019-03-02 15:16:40', 'K', 'Pembelian Pasir', 350000, 1),
(4, 'BJP/CF/0203190004', '2019-03-01', '2019-03-02 17:26:50', 'D', 'DP Unit L02', 2400000, 1),
(5, 'BJP/CF/0203190005', '2019-03-03', '2019-03-02 17:34:36', 'K', 'PEMBAYARAN LISTRIK BULAN FEBRUARI', 320000, 1),
(6, 'BJP/CF/0203190006', '2019-03-01', '2019-03-02 17:35:39', 'D', 'DP BAPAK JUNET UNIT L04', 3500000, 1),
(8, 'BJP/CF/0403190001', '2019-03-04', '2019-03-04 19:04:34', 'D', 'DP BAPAK SALIM', 5000000, 1),
(9, 'BJP/CF/0403190002', '2019-03-04', '2019-03-04 19:05:43', 'K', 'PEMBAYARAN LISTRIK BULAN MARET', 300000, 1),
(10, 'BJP/CF/0403190003', '2019-03-04', '2019-03-04 19:15:56', 'K', 'MAKAN SIANG 2 ORANG', 30000, 1),
(11, 'BJP/CF/0403190004', '2019-03-04', '2019-03-04 19:16:29', 'K', 'BELI AIR MINUM DAIRA', 18000, 1),
(12, 'BJP/CF/0503190001', '2019-03-05', '2019-03-05 10:33:57', 'D', 'DP', 2000000, 1),
(13, 'BJP/CF/0503190002', '2019-03-05', '2019-03-05 10:40:13', 'D', 'DP BAPAK RUDI', 2500000, 1),
(15, 'BJP/CF/0503190003', '2019-03-05', '2019-03-05 10:41:16', 'D', 'DP BAPAK HERI', 4000000, 1),
(16, 'BJP/CF/0503190004', '2019-03-05', '2019-03-05 10:42:02', 'D', 'DP BAPAK JOHAN', 5000000, 1),
(17, 'BJP/CF/0503190005', '2019-03-05', '2019-03-05 10:45:04', 'D', 'DP', 6000000, 1),
(19, 'BJP/CF/0503190007', '2019-03-05', '2019-03-05 11:01:59', 'D', 'PEMBELIAN PIRING 2 LUSIN', 120000, 1),
(20, 'BJP/CF/0503190008', '2019-03-05', '2019-03-05 11:37:10', 'D', 'DP', 100000, 1);

--
-- Trigger `tbl_cash_flow`
--
DELIMITER //
CREATE TRIGGER `SALDODELETE` BEFORE DELETE ON `tbl_cash_flow`
 FOR EACH ROW BEGIN

IF OLD.type='D' THEN

UPDATE tbl_saldo SET saldo=saldo - OLD.nominal;

END IF;

IF OLD.type='K' THEN

UPDATE tbl_saldo SET saldo=saldo + OLD.nominal;

END IF;

END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `SALDOTRIGGER` AFTER INSERT ON `tbl_cash_flow`
 FOR EACH ROW BEGIN

IF NEW.type='D' THEN

UPDATE tbl_saldo SET saldo=saldo + NEW.nominal;

END IF;

IF NEW.type='K' THEN

UPDATE tbl_saldo SET saldo=saldo - NEW.nominal;

END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_trans`
--

CREATE TABLE IF NOT EXISTS `tbl_detail_trans` (
`iddetail` int(10) NOT NULL,
  `idmaterial` int(5) NOT NULL,
  `idtransaksi` int(10) NOT NULL,
  `source` char(20) NOT NULL,
  `volume` char(20) NOT NULL,
  `harga_satuan` double NOT NULL,
  `type` enum('in','out') NOT NULL,
  `status_detail` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Dumping data untuk tabel `tbl_detail_trans`
--

INSERT INTO `tbl_detail_trans` (`iddetail`, `idmaterial`, `idtransaksi`, `source`, `volume`, `harga_satuan`, `type`, `status_detail`) VALUES
(1, 2, 1, 'Gudang', '2', 48000, 'out', '1'),
(2, 2, 2, 'Gudang', '2', 48000, 'out', '1'),
(3, 2, 3, 'Gudang', '2', 48000, 'out', '1'),
(4, 2, 4, 'Gudang', '2', 48000, 'out', '1'),
(5, 2, 5, 'Gudang', '2', 48000, 'out', '1'),
(6, 13, 5, 'Gudang', '1', 18000, 'out', '1'),
(7, 43, 5, 'Gudang', '3', 8000, 'out', '1'),
(8, 41, 5, 'Gudang', '2', 75000, 'out', '1'),
(9, 2, 6, 'Gudang', '2', 48000, 'out', '1'),
(10, 34, 7, 'Gudang', '2', 10000, 'out', '1'),
(11, 34, 8, 'Gudang', '2', 10000, 'out', '1'),
(15, 2, 13, 'Gudang', '2', 48000, 'out', '1'),
(16, 2, 14, 'Gudang', '2', 48000, 'out', '1'),
(17, 9, 15, 'Gudang', '15', 72000, 'out', '1'),
(18, 10, 15, 'Gudang', '7', 2000, 'out', '1'),
(19, 3, 16, 'Gudang', '25', 55000, 'out', '1'),
(20, 8, 16, 'Gudang', '1', 250000, 'out', '1'),
(21, 2, 17, 'Gudang', '1', 48000, 'out', '1'),
(22, 2, 18, 'Gudang', '2', 48000, 'out', '1'),
(23, 2, 19, 'Gudang', '2', 48000, 'out', '1'),
(24, 3, 20, 'Gudang', '25', 55000, 'out', '1'),
(25, 4, 20, 'Gudang', '8', 25000, 'out', '1'),
(26, 2, 21, 'Gudang', '2', 48000, 'out', '1'),
(27, 2, 22, 'Gudang', '2', 48000, 'out', '1'),
(28, 2, 23, 'Gudang', '2', 48000, 'out', '1'),
(29, 2, 24, 'Gudang', '1', 48000, 'out', '1'),
(30, 2, 25, 'Gudang', '1', 48000, 'out', '1'),
(31, 2, 26, 'Gudang', '2', 48000, 'out', '1'),
(32, 2, 27, 'Gudang', '1', 48000, 'out', '1'),
(33, 2, 28, 'Gudang', '3', 48000, 'out', '1'),
(34, 11, 29, 'Gudang', '1', 20000, 'out', '1'),
(35, 2, 30, 'Gudang', '3', 48000, 'out', '1'),
(37, 12, 30, 'Gudang', '1.5', 18000, 'out', '1'),
(38, 2, 31, 'Gudang', '1', 48000, 'out', '1'),
(39, 14, 31, 'Gudang', '1', 18000, 'out', '1'),
(40, 13, 31, 'Gudang', '1', 18000, 'out', '1'),
(41, 10, 32, 'Gudang', '5', 2000, 'out', '1'),
(42, 2, 32, 'Gudang', '2', 48000, 'out', '1'),
(43, 2, 33, 'Gudang', '2', 48000, 'out', '1'),
(44, 2, 34, 'Gudang', '2', 48000, 'out', '1'),
(45, 2, 35, 'Gudang', '2', 48000, 'out', '1'),
(46, 2, 36, 'Gudang', '2', 48000, 'out', '1'),
(47, 6, 37, 'Gudang', '15', 45000, 'out', '1'),
(48, 5, 37, 'Gudang', '18', 75000, 'out', '1'),
(49, 2, 38, 'Gudang', '1', 48000, 'out', '1'),
(50, 2, 39, 'Gudang', '2', 48000, 'out', '1'),
(51, 2, 40, 'Gudang', '2', 48000, 'out', '1'),
(52, 2, 41, 'Gudang', '2', 48000, 'out', '1'),
(53, 2, 42, 'Gudang', '2', 48000, 'out', '1'),
(54, 43, 42, 'Gudang', '3', 8000, 'out', '1'),
(55, 13, 42, 'Gudang', '1', 18000, 'out', '1'),
(56, 2, 43, 'Gudang', '2', 48000, 'out', '1'),
(57, 2, 44, 'Gudang', '2', 48000, 'out', '1'),
(58, 2, 45, 'Gudang', '2', 48000, 'out', '1'),
(59, 2, 46, 'Gudang', '3', 48000, 'out', '1'),
(60, 2, 47, 'Gudang', '2', 48000, 'out', '1'),
(61, 2, 48, 'Gudang', '2', 48000, 'out', '1'),
(62, 2, 49, 'Gudang', '1', 48000, 'out', '1'),
(63, 2, 50, 'Gudang', '2', 48000, 'out', '1'),
(64, 5, 51, '', '34', 75000, 'in', '1'),
(65, 6, 51, '', '5', 45000, 'in', '1'),
(66, 7, 51, '', '1250', 200, 'in', '1'),
(67, 8, 51, '', '3', 250000, 'in', '1'),
(68, 3, 51, '', '96', 55000, 'in', '1'),
(69, 32, 51, '', '2', 135000, 'in', '1'),
(70, 45, 51, '', '79', 65000, 'in', '1'),
(71, 47, 51, '', '225', 20000, 'in', '1'),
(72, 27, 51, '', '2', 80000, 'in', '1'),
(73, 48, 51, '', '5', 85000, 'in', '1'),
(74, 26, 51, '', '15', 135000, 'in', '1'),
(75, 9, 52, 'Gudang', '10', 72000, 'out', '1'),
(76, 10, 52, 'Gudang', '6', 2000, 'out', '1'),
(77, 2, 53, 'Gudang', '2', 48000, 'out', '1'),
(78, 7, 54, 'Gudang', '250', 200, 'out', '1'),
(79, 5, 54, 'Gudang', '16', 75000, 'out', '1'),
(80, 6, 54, 'Gudang', '15', 45000, 'out', '1'),
(81, 2, 55, 'Gudang', '2', 48000, 'out', '1'),
(82, 2, 56, 'Gudang', '2', 48000, 'out', '1'),
(83, 2, 57, 'Gudang', '2', 48000, 'out', '1'),
(84, 2, 58, '', '150', 48000, 'in', '1'),
(89, 9, 59, '', '250', 72000, 'in', '1'),
(90, 10, 59, '', '105', 2000, 'in', '1'),
(91, 11, 59, '', '18', 20000, 'in', '1'),
(92, 60, 59, '', '55', 10000, 'in', '1'),
(93, 65, 60, 'Gudang', '1', 45000, 'out', '1'),
(94, 64, 60, 'Gudang', '1', 15000, 'out', '1'),
(95, 67, 60, 'Gudang', '5', 3000, 'out', '1'),
(96, 69, 60, 'Gudang', '10', 1000, 'out', '1'),
(97, 70, 60, 'Gudang', '1', 10000, 'out', '1'),
(98, 63, 60, 'Gudang', '1', 15000, 'out', '1'),
(99, 61, 60, 'Gudang', '5', 1000, 'out', '1'),
(100, 2, 61, 'Gudang', '2', 48000, 'out', '1'),
(101, 2, 62, 'Gudang', '3', 48000, 'out', '1'),
(102, 2, 63, 'Gudang', '2', 48000, 'out', '1'),
(103, 3, 64, 'Gudang', '25', 55000, 'out', '1'),
(104, 8, 64, 'Gudang', '1', 250000, 'out', '1'),
(105, 2, 65, 'Gudang', '2', 48000, 'out', '1'),
(106, 2, 66, 'Gudang', '2', 48000, 'out', '1'),
(113, 63, 67, 'Gudang', '1', 15000, 'out', '1'),
(114, 65, 67, 'Gudang', '1', 45000, 'out', '1'),
(115, 64, 67, 'Gudang', '1', 15000, 'out', '1'),
(116, 67, 67, 'Gudang', '5', 3000, 'out', '1'),
(117, 69, 67, 'Gudang', '10', 1000, 'out', '1'),
(118, 70, 67, 'Gudang', '1', 10000, 'out', '1'),
(119, 61, 67, 'Gudang', '5', 1000, 'out', '1'),
(120, 60, 67, 'Gudang', '5', 10000, 'out', '1'),
(121, 2, 68, 'Gudang', '1', 48000, 'out', '1'),
(122, 2, 69, 'Gudang', '1', 48000, 'out', '1'),
(123, 2, 70, 'Gudang', '2', 48000, 'out', '1'),
(124, 60, 71, 'Gudang', '10', 10000, 'out', '1'),
(125, 2, 72, 'Gudang', '2', 48000, 'out', '1'),
(126, 30, 72, 'Gudang', '2', 125000, 'out', '1'),
(127, 72, 72, 'Gudang', '2', 10000, 'out', '1'),
(128, 3, 73, 'Gudang', '25', 55000, 'out', '1'),
(129, 4, 73, 'Gudang', '8', 25000, 'out', '1'),
(130, 56, 73, 'Gudang', '10', 55000, 'out', '1'),
(131, 72, 73, 'Gudang', '1', 10000, 'out', '1'),
(132, 2, 74, 'Gudang', '2', 48000, 'out', '1'),
(133, 2, 75, 'Gudang', '2', 48000, 'out', '1'),
(134, 2, 76, 'Gudang', '2', 48000, 'out', '1'),
(135, 2, 77, 'Gudang', '2', 48000, 'out', '1'),
(136, 2, 78, 'Gudang', '2', 48000, 'out', '1'),
(137, 2, 79, 'Gudang', '2', 48000, 'out', '1'),
(138, 30, 79, 'Gudang', '2', 125000, 'out', '1'),
(139, 72, 79, 'Gudang', '2', 10000, 'out', '1'),
(140, 30, 80, 'Gudang', '2', 125000, 'out', '1'),
(141, 72, 80, 'Gudang', '1', 10000, 'out', '1'),
(142, 2, 81, 'Gudang', '2', 48000, 'out', '1'),
(143, 3, 82, 'Gudang', '25', 55000, 'out', '1'),
(144, 8, 82, 'Gudang', '1', 250000, 'out', '1'),
(145, 2, 83, 'Gudang', '2', 48000, 'out', '1'),
(146, 2, 84, 'Gudang', '2', 48000, 'out', '1'),
(147, 4, 85, 'Gudang', '8', 25000, 'out', '1'),
(148, 2, 86, 'Gudang', '2', 48000, 'out', '1'),
(149, 2, 87, 'Gudang', '2', 48000, 'out', '1'),
(150, 30, 87, 'Gudang', '1', 125000, 'out', '1'),
(151, 2, 88, '', '100', 48000, 'in', '1'),
(155, 38, 89, '', '21', 250000, 'in', '1'),
(156, 59, 89, '', '20', 3000, 'in', '1'),
(157, 9, 90, 'Gudang', '20', 72000, 'out', '1'),
(158, 10, 90, 'Gudang', '5', 2000, 'out', '1'),
(159, 11, 90, 'Gudang', '1', 20000, 'out', '1'),
(160, 30, 91, 'Gudang', '1', 125000, 'out', '1'),
(161, 9, 92, 'Gudang', '10', 72000, 'out', '1'),
(162, 11, 92, 'Gudang', '0.5', 20000, 'out', '1'),
(163, 10, 92, 'Gudang', '3', 2000, 'out', '1'),
(164, 9, 93, 'Gudang', '20', 72000, 'out', '1'),
(165, 10, 93, 'Gudang', '10', 2000, 'out', '1'),
(166, 11, 93, 'Gudang', '1', 20000, 'out', '1'),
(167, 60, 93, 'Gudang', '2', 10000, 'out', '1');

--
-- Trigger `tbl_detail_trans`
--
DELIMITER //
CREATE TRIGGER `TRIGGER_MINUS_OUT` AFTER INSERT ON `tbl_detail_trans`
 FOR EACH ROW BEGIN

 IF NEW.type ='out' AND NEW.source='Gudang' AND NEW.status_detail='0' THEN
 
 UPDATE tbl_material SET stock_quantity=stock_quantity-NEW.volume

 WHERE idmaterial=NEW.idmaterial;
 
 END IF;

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_group`
--

CREATE TABLE IF NOT EXISTS `tbl_group` (
`idgroup` int(5) NOT NULL,
  `group_rumah` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `luas_tanah` varchar(20) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_group`
--

INSERT INTO `tbl_group` (`idgroup`, `group_rumah`, `alamat`, `luas_tanah`, `aktif`) VALUES
(1, 'Madani Permai', 'Lubuk Tanjung', '105000', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis`
--

CREATE TABLE IF NOT EXISTS `tbl_jenis` (
`idjenis` int(5) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`idjenis`, `jenis`, `aktif`) VALUES
(2, 'Bahan Pasangan', '1'),
(3, 'Lapis Lantai/Dinding', '1'),
(4, 'Bahan Atap', '1'),
(5, 'Bahan Kayu', '1'),
(6, 'Bahan Besi', '1'),
(7, 'Bahan Kaca & Pengunci', '1'),
(8, 'Bahan Cat', '1'),
(9, 'Bahan Sanitasi', '1'),
(10, 'Bahan Plavon', '1'),
(11, 'Bahan Listrik', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_material`
--

CREATE TABLE IF NOT EXISTS `tbl_material` (
`idmaterial` int(5) NOT NULL,
  `idjenis` int(5) NOT NULL,
  `kode_material` varchar(50) NOT NULL,
  `nama_material` varchar(200) NOT NULL,
  `harga_material` double NOT NULL,
  `stock_quantity` char(10) NOT NULL,
  `idsatuan` int(3) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data untuk tabel `tbl_material`
--

INSERT INTO `tbl_material` (`idmaterial`, `idjenis`, `kode_material`, `nama_material`, `harga_material`, `stock_quantity`, `idsatuan`, `aktif`) VALUES
(2, 2, 'MTR001', 'SEMEN MERAH PUTIH 40 KG', 48000, '209', 4, '1'),
(3, 4, 'MTR002', 'SENG SUPERDEX', 55000, '0', 6, '1'),
(4, 4, 'MTR003', 'PRABUNG SENG WARNA', 25000, '61', 6, '1'),
(5, 4, 'MTR004', 'CANAL KUDA-KUDA', 75000, '0', 11, '1'),
(6, 4, 'MTR005', 'RENG BAJA RINGAN', 45000, '15', 11, '1'),
(7, 4, 'MTR006', 'BAUT CANAL DAN RENG', 200, '750', 2, '1'),
(8, 4, 'MTR007', 'BAUT ATAP DAN LISPLANG', 250000, '1', 9, '1'),
(9, 6, 'MTR008', 'BESI 10''', 72000, '140', 11, '1'),
(10, 6, 'MTR009', 'BESI 6''', 2000, '64', 11, '1'),
(11, 6, 'MTR010', 'KAWAT BETON', 20000, '13', 1, '1'),
(12, 6, 'MTR011', 'PAKU 2.5''', 18000, '17', 1, '1'),
(13, 6, 'MTR012', 'PAKU 3''', 18000, '15', 1, '1'),
(14, 6, 'MTR013', 'PAKU 4''', 18000, '0', 1, '1'),
(15, 7, 'MTR014', 'KUNCI LAK', 100000, '0', 2, '1'),
(16, 7, 'MTR015', 'ENGSEL PINTU', 15000, '6', 12, '1'),
(21, 7, 'MTR016', 'ENGSE4L JENDELA', 10000, '4', 12, '1'),
(22, 7, 'MTR017', 'KAIT ANGIN JENDELA', 3000, '0', 12, '1'),
(23, 7, 'MTR018', 'GRENDEL JENDELA', 10000, '3', 12, '1'),
(24, 7, 'MTR019', 'HANDLE JENDELA', 3000, '11', 2, '1'),
(25, 8, 'MTR020', 'CAT MINYAK (KAYU)', 60000, '0', 16, '1'),
(26, 8, 'MTR021', 'CAT AIR DINDING', 135000, '17', 5, '1'),
(27, 8, 'MTR022', 'CAT AIR PLAFOND', 80000, '2', 5, '1'),
(28, 8, 'MTR023', 'CAT AIR LISPLANG', 80000, '0', 5, '1'),
(29, 8, 'MTR024', 'TINER', 25000, '0', 3, '1'),
(30, 8, 'MTR025', 'MORTAR (PLAMIR)', 125000, '-1', 4, '1'),
(31, 8, 'MTR026', 'CAT DINDING WARNA MERAH', 135000, '3', 5, '1'),
(32, 8, 'MTR027', 'CAT DINDING WARNA HITAM', 135000, '3', 5, '1'),
(33, 8, 'MTR028', 'KUAS 4''', 12000, '0', 2, '1'),
(34, 8, 'MTR029', 'KUAS 3''', 10000, '1', 2, '1'),
(35, 8, 'MTR030', 'KUAS 2''', 8000, '0', 2, '1'),
(36, 8, 'MTR031', 'ROL CAT', 20000, '0', 2, '1'),
(37, 9, 'MTR032', 'CLOSET JONGKOK', 125000, '3', 2, '1'),
(38, 9, 'MTR033', 'PINTU DAN KUSEN PVC KM/WC', 250000, '21', 2, '1'),
(39, 9, 'MTR034', 'PIPA PVC 4''', 85000, '16', 7, '1'),
(40, 9, 'MTR035', 'PIPA PVC 2.5''', 60000, '5', 11, '1'),
(41, 9, 'MTR036', 'PIPA PVC 3''', 75000, '-2', 11, '1'),
(42, 9, 'MTR037', 'L.BOW 4''', 15000, '26', 2, '1'),
(43, 9, 'MTR038', 'L.BOW 3''', 8000, '108', 2, '1'),
(44, 9, 'MTR039', 'L.BOW 2.5''', 8000, '9', 2, '1'),
(45, 10, 'MTR040', 'GYPSUM', 75000, '79', 6, '1'),
(46, 10, 'MTR041', 'GGRC', 75000, '4', 6, '1'),
(47, 10, 'MTR042', 'HOLO', 20000, '233', 11, '1'),
(48, 10, 'MTR043', 'KOMPONE', 85000, '6', 4, '1'),
(49, 10, 'MTR044', 'LAKBAN GYPSUM', 15000, '12', 10, '1'),
(50, 3, 'MTR045', 'KERAMIK LANTAI 40 X 40 CM', 55000, '0', 14, '1'),
(51, 3, 'MTR046', 'KERMIK LANTAI WC 40 X 40 CM', 65000, '2', 14, '1'),
(52, 2, 'MTR047', 'BATU BATA MERAH', 550, '', 2, '1'),
(53, 2, 'MTR048', 'PASIR', 116666, '', 15, '1'),
(54, 2, 'MTR049', 'BATU PONDASI', 108333, '', 15, '1'),
(55, 2, 'MTR050', 'KORAL', 350000, '', 15, '1'),
(56, 5, 'MTR051', 'LISPLANG', 55000, '1', 13, '1'),
(57, 2, 'MTR052', 'EMBER BESAR', 12000, '2', 2, '1'),
(58, 2, 'MTR053', 'EMBER KECIL ', 6000, '1', 2, '1'),
(59, 2, 'MTR054', 'BENANG', 3000, '22', 10, '1'),
(60, 11, 'MTR055', 'PIPA LISTRIK', 10000, '46', 11, '1'),
(61, 11, 'MTR056', 'MANGKOK LISTRIK', 1000, '30', 2, '1'),
(62, 11, 'MTR057', 'KABEL NYA', 15000, '40', 7, '1'),
(63, 11, 'MTR058', 'KABEL NYM', 15000, '1', 7, '1'),
(64, 11, 'MTR059', 'BOX NCB', 15000, '4', 2, '1'),
(65, 11, 'MTR060', 'NCB', 45000, '4', 2, '1'),
(66, 11, 'MTR061', 'FITTING LAMPU', 10000, '21', 2, '1'),
(67, 11, 'MTR062', 'TEDUS', 3000, '17', 2, '1'),
(68, 11, 'MTR063', 'ISOLASI LISTRIK', 10000, '2', 2, '1'),
(69, 11, 'MTR064', 'L.BOW LISTRIK', 1000, '118', 2, '1'),
(70, 11, 'MTR065', 'KLEM NO 17', 10000, '2', 8, '1'),
(71, 11, 'MTR066', 'KLEM NO 12', 10000, '8', 8, '1'),
(72, 8, 'MTR067', 'SEKRAP', 10000, '-1', 2, '1'),
(73, 10, 'MTR068', 'BAUT GYPSUM', 0, '5', 9, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_revisi_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_revisi_stock` (
`idrevisi` int(10) NOT NULL,
  `idmaterial` int(5) NOT NULL,
  `tglrevisi` date NOT NULL,
  `iduser` int(5) NOT NULL,
  `tiperevisi` enum('min','plus') NOT NULL,
  `stock_on_hand` char(15) NOT NULL,
  `nilai_qty` char(15) NOT NULL,
  `alasan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_saldo`
--

CREATE TABLE IF NOT EXISTS `tbl_saldo` (
`idsaldo` int(1) NOT NULL,
  `saldo` double DEFAULT NULL,
  `flag` char(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`idsaldo`, `saldo`, `flag`) VALUES
(1, 39202000, 'K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE IF NOT EXISTS `tbl_satuan` (
`idsatuan` int(3) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`idsatuan`, `satuan`, `aktif`) VALUES
(1, 'KG', '1'),
(2, 'BH', '1'),
(3, 'BTL', '1'),
(4, 'ZAK', '1'),
(5, 'GLN', '1'),
(6, 'LBR', '1'),
(7, 'MTR', '1'),
(8, 'BKS', '1'),
(9, 'KTK', '1'),
(10, 'GLNG', '1'),
(11, 'BTG', '1'),
(12, 'PSG', '1'),
(13, 'KPG', '1'),
(14, 'DUS', '1'),
(15, 'M3', '1'),
(16, 'KLG', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_set_rab`
--

CREATE TABLE IF NOT EXISTS `tbl_set_rab` (
  `idmaterial` int(5) NOT NULL,
  `idunit` int(5) NOT NULL,
  `tahun_rab` year(4) NOT NULL,
  `validasi` enum('0','1') NOT NULL DEFAULT '1',
  `quantity` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_trans_warehouse`
--

CREATE TABLE IF NOT EXISTS `tbl_trans_warehouse` (
`idtransaksi` int(10) NOT NULL,
  `idunit` int(5) NOT NULL,
  `no_transaksi` char(20) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `nopol` char(10) NOT NULL,
  `nama_driver` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `type_transaksi` enum('in','out') NOT NULL,
  `total_harga` double DEFAULT NULL,
  `status_transaksi` enum('finish','cancel') NOT NULL DEFAULT 'finish',
  `reason_cancel` text NOT NULL,
  `tgl_batal` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data untuk tabel `tbl_trans_warehouse`
--

INSERT INTO `tbl_trans_warehouse` (`idtransaksi`, `idunit`, `no_transaksi`, `tgl_transaksi`, `nama_supplier`, `nopol`, `nama_driver`, `remark`, `type_transaksi`, `total_harga`, `status_transaksi`, `reason_cancel`, `tgl_batal`) VALUES
(1, 6, 'BJP/OUT/1902190001', '2019-02-19', '', 'BG 4145 HK', 'ALENG', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(2, 3, 'BJP/OUT/1902190002', '2019-02-19', '', 'BG 4124 HY', 'JUNAI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(3, 18, 'BJP/OUT/1902190003', '2019-02-19', '', 'BG 4357 GF', 'KOKO', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(4, 19, 'BJP/OUT/1902190004', '2019-02-19', '', 'BG 4076 CG', 'EDI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(5, 20, 'BJP/OUT/1902190005', '2019-02-19', '', 'BG 3443 YG', 'HERI', '', 'out', 288000, 'finish', '', '0000-00-00 00:00:00'),
(6, 16, 'BJP/OUT/1902190006', '2019-02-19', '', 'BG 2331 FB', 'TAUFIK', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(7, 21, 'BJP/OUT/1902190007', '2019-02-19', '', 'BD 1143 YK', 'MADIYAH', 'FINISHING RUMAH', 'out', 20000, 'finish', '', '0000-00-00 00:00:00'),
(8, 22, 'BJP/OUT/1902190008', '2019-02-19', '', 'BD 1143 YK', 'MADIYAH', 'FINISHING RUMAH', 'out', 20000, 'finish', '', '0000-00-00 00:00:00'),
(9, 18, 'BJP/OUT/1902190009', '2019-02-19', '', 'BG 1556 KJ', 'DEDE', '', 'out', 170000, 'finish', '', '0000-00-00 00:00:00'),
(10, 14, 'BJP/OUT/1902190010', '2019-02-19', '', 'BG 3887 DF', 'BAMBANG', 'PENGELUARAN TANGGAL 14 FEBRUARI 2019', 'out', 266000, 'finish', '', '0000-00-00 00:00:00'),
(13, 1, 'BJP/OUT/1902190011', '2019-02-19', '', 'BG 3887 DF', 'HERMAN', 'PENGELUARAN TANGGAL 14 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(14, 6, 'BJP/OUT/1902190012', '2019-02-19', '', 'BG 5476 GK', 'AAN', 'PENGELUARAN TANGGAL 14 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(15, 4, 'BJP/OUT/2002190001', '2019-02-20', '', 'BG 2112 DU', 'APRI', 'PENGELUARAN TANGGAL 14 FEBRUARI 2019', 'out', 1094000, 'finish', '', '0000-00-00 00:00:00'),
(16, 11, 'BJP/OUT/2002190002', '2019-02-20', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 14 FEBRUARI 2019', 'out', 1625000, 'finish', '', '0000-00-00 00:00:00'),
(17, 2, 'BJP/OUT/2002190003', '2019-02-20', '', 'BG 4021 HZ', 'YAN', 'PENGELUARAN TANGGAL 14 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(18, 6, 'BJP/OUT/2002190004', '2019-02-20', '', 'BG 4390 LK', 'EEN', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(19, 4, 'BJP/OUT/2002190005', '2019-02-20', '', 'BG 3520 HF', 'APRI', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(20, 11, 'BJP/OUT/2002190006', '2019-02-20', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 1575000, 'finish', '', '0000-00-00 00:00:00'),
(21, 15, 'BJP/OUT/2002190007', '2019-02-20', '', 'BG 4357 GF', 'KOKO', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(22, 14, 'BJP/OUT/2002190008', '2019-02-20', '', 'BG 6790 CZ', 'ZAINAL', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(23, 4, 'BJP/OUT/2002190009', '2019-02-20', '', 'BG 3520 HF', 'APRI', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(24, 16, 'BJP/OUT/2002190010', '2019-02-20', '', 'BG 2331 FB', 'TAUFIK', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(25, 4, 'BJP/OUT/2002190011', '2019-02-20', '', 'BG 3520 HF', 'APRI', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(26, 23, 'BJP/OUT/2002190012', '2019-02-20', '', 'BG 7809 FU', 'DEDEK', 'PENGELUARAN TANGGAL 16 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(27, 4, 'BJP/OUT/2002190013', '2019-02-20', '', 'BG 3520 HF', 'APRI', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(28, 14, 'BJP/OUT/2002190014', '2019-02-20', '', 'BG 6790 CZ', 'ZAINAL', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 144000, 'finish', '', '0000-00-00 00:00:00'),
(29, 2, 'BJP/OUT/2002190015', '2019-02-20', '', 'BG 8982 JH', 'ENDANG', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 20000, 'finish', '', '0000-00-00 00:00:00'),
(30, 5, 'BJP/OUT/2002190016', '2019-02-20', '', 'BG 5670 KW', 'HARIS', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 171000, 'finish', '', '0000-00-00 00:00:00'),
(31, 19, 'BJP/OUT/2002190017', '2019-02-20', '', 'BG 4076 CG', 'EDI', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 84000, 'finish', '', '0000-00-00 00:00:00'),
(32, 23, 'BJP/OUT/2002190018', '2019-02-20', '', 'BG 3885 ZD', 'JUMADI', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 106000, 'finish', '', '0000-00-00 00:00:00'),
(33, 20, 'BJP/OUT/2002190019', '2019-02-20', '', 'BG 2398 TY', 'YUSMAN', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(34, 14, 'BJP/OUT/2002190020', '2019-02-20', '', 'BG 4357 GF', 'KOKO', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(35, 3, 'BJP/OUT/2002190021', '2019-02-20', '', 'BG 4124 HY', 'APRI', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(36, 25, 'BJP/OUT/2002190022', '2019-02-20', '', 'BG 3736 HC', 'RAHMAD', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(37, 10, 'BJP/OUT/2002190023', '2019-02-20', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 2025000, 'finish', '', '0000-00-00 00:00:00'),
(38, 2, 'BJP/OUT/2002190024', '2019-02-20', '', 'BG 4668 DS', 'YAN', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(39, 6, 'BJP/OUT/2002190025', '2019-02-20', '', 'BG 4145 HK', 'ALENG', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(40, 3, 'BJP/OUT/2002190026', '2019-02-20', '', 'BG 4124 HY', 'JUNAI', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(41, 16, 'BJP/OUT/2002190027', '2019-02-20', '', 'BG 2331 FB', 'TAUFIK', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(42, 20, 'BJP/OUT/2002190028', '2019-02-20', '', 'BG 3443 YG', 'HERI', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 138000, 'finish', '', '0000-00-00 00:00:00'),
(43, 19, 'BJP/OUT/2002190029', '2019-02-20', '', 'BG 4076 CG', 'EDI', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(44, 18, 'BJP/OUT/2002190030', '2019-02-20', '', 'BG 4357 GK', 'KOKO', 'PENGELUARAN TANGGAL 19 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(45, 19, 'BJP/OUT/2002190031', '2019-02-20', '', 'BG 4076 CG', 'EDI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(46, 6, 'BJP/OUT/2002190032', '2019-02-20', '', 'BG 4145 HK', 'ALENG', '', 'out', 144000, 'finish', '', '0000-00-00 00:00:00'),
(47, 3, 'BJP/OUT/2002190033', '2019-02-20', '', 'BG 4124 HY', 'JUNAI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(48, 24, 'BJP/OUT/2002190034', '2019-02-20', '', 'BG 6360 WT', 'HARIS', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(49, 25, 'BJP/OUT/2002190035', '2019-02-20', '', 'BG 3736 HC', 'RAHMAD', '', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(50, 4, 'BJP/OUT/2002190036', '2019-02-20', '', 'BG 2773 GP', 'JUNAI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(51, 0, 'BJP/IN/2002190037', '2019-02-20', 'TOKO CAKRA JAYA', 'BD 8273 GK', 'DORA', 'CAT MERAH 1 GALON TIDAK ADA\r\nGYPSUM DIKIRIM 60 KEPING TETAPI RUSAK 1 KEPING', 'in', 21570000, 'finish', '', '0000-00-00 00:00:00'),
(52, 2, 'BJP/OUT/2102190001', '2019-02-21', '', 'BG 8982 JH', 'ENDANG', 'PENGELUARAN TANGGAL 18 FEBRUARI 2019', 'out', 732000, 'finish', '', '0000-00-00 00:00:00'),
(53, 3, 'BJP/OUT/2102190002', '2019-02-21', '', 'BG 4124 HY', 'JUNAI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(54, 9, 'BJP/OUT/2102190003', '2019-02-21', '', 'BG 4822 HW', 'RUSLAN', '', 'out', 1925000, 'finish', '', '0000-00-00 00:00:00'),
(55, 14, 'BJP/OUT/2102190004', '2019-02-21', '', 'BG 4357 GF', 'KOKO', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(56, 19, 'BJP/OUT/2102190005', '2019-02-21', '', 'BG 4076 CG', 'EDI', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(57, 20, 'BJP/OUT/2102190006', '2019-02-21', '', 'BG 2398 TY', 'YUSMAN', '', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(58, 0, 'BJP/IN/2702190001', '2019-02-27', 'TOKO CAKRA JAYA', 'BD 8033 GU', 'YAY', 'MATERIAL MASUK TANGGAL 26 FEBRUARI 2019', 'in', 7200000, 'finish', '', '0000-00-00 00:00:00'),
(59, 0, 'BJP/IN/0203190001', '2019-03-02', 'PT. CAKRA JAYA', 'BD 8006 GU', 'ALEX', 'MATERIAL MASUK TANGGAL 26 FEBRUARI 2019', 'in', 19120000, 'finish', '', '0000-00-00 00:00:00'),
(60, 12, 'BJP/OUT/0203190002', '2019-03-02', '', 'BG 4365 HB', 'ADENAN', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 115000, 'finish', '', '0000-00-00 00:00:00'),
(61, 3, 'BJP/OUT/0503190001', '2019-03-05', '', 'BG 4124 HY', 'APRI', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(62, 24, 'BJP/OUT/0503190002', '2019-03-05', '', 'BG 6360 FT', 'HARIS', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 144000, 'finish', '', '0000-00-00 00:00:00'),
(63, 14, 'BJP/OUT/0503190003', '2019-03-05', '', 'BG 4570 HZ', 'BAMBANG', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(64, 10, 'BJP/OUT/0503190004', '2019-03-05', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 1625000, 'finish', '', '0000-00-00 00:00:00'),
(65, 4, 'BJP/OUT/0503190005', '2019-03-05', '', 'BG 3520 HF', 'APRI', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(66, 6, 'BJP/OUT/0503190006', '2019-03-05', '', 'BG 4145 HK', 'ALENG', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(67, 13, 'BJP/OUT/0503190007', '2019-03-05', '', 'BG 4365 HB', 'ADENAN', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 165000, 'finish', '', '0000-00-00 00:00:00'),
(68, 15, 'BJP/OUT/0503190008', '2019-03-05', '', 'BG 4357 GF', 'KOKO', 'PENGELUARAN TANGGAL 23 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(69, 25, 'BJP/OUT/0503190009', '2019-03-05', '', 'BG 3736 HC', 'RAHMAD', 'PENGELUARAN TANGGAL 23 FEBRUARI 2019', 'out', 48000, 'finish', '', '0000-00-00 00:00:00'),
(70, 14, 'BJP/OUT/0503190010', '2019-03-05', '', 'BG 6790 CZ', 'ZAINAL', 'PENGELUARAN TANGGAL 23 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(71, 12, 'BJP/OUT/0503190011', '2019-03-05', '', 'BG 4365 HB', 'ADENAN', 'PENGELUARAN TANGGAL 22 FEBRUARI 2019', 'out', 100000, 'finish', '', '0000-00-00 00:00:00'),
(72, 13, 'BJP/OUT/0503190012', '2019-03-05', '', 'BG 4648 HE', 'YAN', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 366000, 'finish', '', '0000-00-00 00:00:00'),
(73, 10, 'BJP/OUT/0503190013', '2019-03-05', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 2135000, 'finish', '', '0000-00-00 00:00:00'),
(74, 15, 'BJP/OUT/0503190014', '2019-03-05', '', 'BG 6360 FT', 'BAMBANG', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(75, 19, 'BJP/OUT/0503190015', '2019-03-05', '', 'BG 4076 GM', 'EDI', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(76, 16, 'BJP/OUT/0503190016', '2019-03-05', '', 'BG 2331 FB', 'TAUFIK', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(77, 4, 'BJP/OUT/0503190017', '2019-03-05', '', 'BG 3520 HF', 'APRI', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(78, 14, 'BJP/OUT/0503190018', '2019-03-05', '', 'BG 4570 HZ', 'BAMBANG', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(79, 11, 'BJP/OUT/0503190019', '2019-03-05', '', 'BG 4145 HK', 'ALENG', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 366000, 'finish', '', '0000-00-00 00:00:00'),
(80, 10, 'BJP/OUT/0503190020', '2019-03-05', '', 'BG 2398 TY', 'YUSMAN', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 260000, 'finish', '', '0000-00-00 00:00:00'),
(81, 24, 'BJP/OUT/0503190021', '2019-03-05', '', 'BG 6360 FT', 'HARIS', 'PENGELUARAN TANGGAL 25 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(82, 9, 'BJP/OUT/0503190022', '2019-03-05', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 26 FEBRUARI 2019', 'out', 1625000, 'finish', '', '0000-00-00 00:00:00'),
(83, 14, 'BJP/OUT/0503190023', '2019-03-05', '', 'BG 4570 HZ', 'BAMBANG', 'PENGELUARAN TANGGAL 26 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(84, 19, 'BJP/OUT/0503190024', '2019-03-05', '', 'BG 4076 GM', 'EDI', 'PENGELUARAN TANGGAL 26 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(85, 9, 'BJP/OUT/0503190025', '2019-03-05', '', 'BG 2112 DU', 'RUSLAN', 'PENGELUARAN TANGGAL 27 FEBRUARI 2019', 'out', 200000, 'finish', '', '0000-00-00 00:00:00'),
(86, 11, 'BJP/OUT/0503190026', '2019-03-05', '', 'BG 4145 HK', 'ALENG', 'PENGELUARAN TANGGAL 27 FEBRUARI 2019', 'out', 96000, 'finish', '', '0000-00-00 00:00:00'),
(87, 10, 'BJP/OUT/0503190027', '2019-03-05', '', 'BG 3443 YG', 'HERI', 'PENGELUARAN TANGGAL 27 FEBRUARI 2019', 'out', 221000, 'finish', '', '0000-00-00 00:00:00'),
(88, 0, 'BJP/IN/0603190001', '2019-03-06', 'TOKO CAKRA JAYA', 'BD 8033 GU', 'YAY', 'PEMASUKAN TANGGAL 26 FEBRUARI 2019', 'in', 4800000, 'finish', '', '0000-00-00 00:00:00'),
(89, 0, 'BJP/IN/0603190002', '2019-03-06', 'TOKO CAKRA JAYA', 'BD 8006 GU', 'ALEX', 'PENGELUARAN TANGGAL 26 FEBRUARI 2019', 'in', 5310000, 'finish', '', '0000-00-00 00:00:00'),
(90, 14, 'BJP/OUT/0603190003', '2019-03-06', '', 'BG 4570 HZ', 'BAMBANG', 'PENGELUARAN TANGGAL 01 MARET 2019', 'out', 1470000, 'finish', '', '0000-00-00 00:00:00'),
(91, 13, 'BJP/OUT/0603190004', '2019-03-06', '', 'BG 4648 HF', 'YAN', 'PENGELUARAN TANGGAL 01 MARET 2019', 'out', 125000, 'finish', '', '0000-00-00 00:00:00'),
(92, 24, 'BJP/OUT/0603190005', '2019-03-06', '', 'BG 6360 FT', 'HARIS', 'PENGELUARAN TANGGAL 01 MARET 2019', 'out', 736000, 'finish', '', '0000-00-00 00:00:00'),
(93, 20, 'BJP/OUT/0603190006', '2019-03-06', '', 'BG 3443 YG', 'HERI', 'PENGLUARAN TANGGAL 01 MARET 2019', 'out', 1500000, 'finish', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_unit`
--

CREATE TABLE IF NOT EXISTS `tbl_unit` (
`idunit` int(5) NOT NULL,
  `idgroup` int(5) NOT NULL,
  `nama_unit` varchar(30) NOT NULL,
  `type_unit` char(20) NOT NULL,
  `luas_unit` char(20) NOT NULL,
  `luas_bangunan` char(20) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `tbl_unit`
--

INSERT INTO `tbl_unit` (`idunit`, `idgroup`, `nama_unit`, `type_unit`, `luas_unit`, `luas_bangunan`, `aktif`) VALUES
(1, 1, 'L.01', '36', '167', '36', '1'),
(2, 1, 'L.02', '36', '150', '36', '1'),
(3, 1, 'L.20', '36', '150', '36', '1'),
(4, 1, 'L.21', '36', '158', '36', '1'),
(5, 1, 'M.01', '36', '168', '36', '1'),
(6, 1, 'M.02', '36', '150', '36', '1'),
(7, 1, 'M.03', '36', '150', '36', '1'),
(8, 1, 'M.04', '36', '150', '36', '1'),
(9, 1, 'M.05', '36', '150', '36', '1'),
(10, 1, 'M.06', '36', '150', '36', '1'),
(11, 1, 'M.07', '36', '150', '36', '1'),
(12, 1, 'M.08', '36', '150', '36', '1'),
(13, 1, 'M.09', '36', '192', '36', '1'),
(14, 1, 'M.11', '36', '150', '36', '1'),
(15, 1, 'M.12', '36', '150', '36', '1'),
(16, 1, 'N.07', '36', '150', '36', '1'),
(17, 1, 'N.08', '36', '150', '36', '1'),
(18, 1, 'M.15', '36', '150', '36', '1'),
(19, 1, 'M.10', '36', '204', '36', '1'),
(20, 1, 'M.14', '36', '150', '36', '1'),
(21, 1, 'L.19', '36', '150', '36', '1'),
(22, 1, 'L.13', '36', '150', '36', '1'),
(23, 1, 'M.13', '36', '150', '36', '1'),
(24, 1, 'M.01', '36', '168', '36', '1'),
(25, 1, 'N.06', '36', '150', '36', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`iduser` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1',
  `level` enum('administrator','admin keluar','admin masuk','supervisi','pimpinan') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`iduser`, `nama`, `email`, `aktif`, `level`, `username`, `password`) VALUES
(1, 'Administrator', 'administrator@localhost.com', '1', 'administrator', 'administrator', '$2y$10$CxozOZr/qeFpIdtJnYWjL.NsAyZGwgsTMelr/uU0znq4QmKk7sNOC'),
(2, 'WIWID', 'wiwidnovi1020@gmail.com', '1', 'supervisi', 'WIWID', '$2y$10$P6cUPiwcFeo7rZyebapHEOvhn5lz9wbH2Af9cqnvEfQOQtoYiHq6u'),
(3, 'MADANI', 'BJP@gmail.com', '1', 'admin masuk', 'BJP_IN', '$2y$10$pFFEZ18gPxsHSaqvmFQaperCelunzA2GoqS7AOs40l.yM90gEikqS'),
(4, 'MADANI', 'BJP@gmail.com', '1', 'admin keluar', 'BJP_OUT', '$2y$10$GypGdn5YQMDGxcdmZl/kPeWXc1pEsyA2lUJiuaoeVWrIFefjBqTQC'),
(5, 'Muhammad Fikri', 'BJP@gmail.com', '1', 'pimpinan', 'FIKRI', '$2y$10$XcDe161aaFag.zEyYOQ4oujjn7Yn8eQvbuY0HqobKetOVuVGuFa9a');

-- --------------------------------------------------------

--
-- Struktur untuk view `saldobymonth`
--
DROP TABLE IF EXISTS `saldobymonth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `saldobymonth` AS select year(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) AS `tahun`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 1) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitJan`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 1) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditJan`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 2) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitFeb`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 2) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditFeb`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 3) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitMar`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 3) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditMar`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 4) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitApr`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 4) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditApr`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 5) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitMei`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 5) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditMei`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 6) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitJun`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 6) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditJun`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 7) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitJul`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 7) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditJul`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 8) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitAgus`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 8) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditAgus`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 9) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitSep`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 9) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditSep`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 10) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitOkto`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 10) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditOkto`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 11) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitNov`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 11) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditNov`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 12) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'D')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `DebitDes`,sum((case when ((month(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`) = 12) and (`db_bukitpermata`.`tbl_cash_flow`.`type` = 'K')) then `db_bukitpermata`.`tbl_cash_flow`.`nominal` else 0 end)) AS `KreditDes` from `db_bukitpermata`.`tbl_cash_flow` group by year(`db_bukitpermata`.`tbl_cash_flow`.`tglflow`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cash_flow`
--
ALTER TABLE `tbl_cash_flow`
 ADD PRIMARY KEY (`idcashflow`), ADD UNIQUE KEY `no_trx` (`no_trx`);

--
-- Indexes for table `tbl_detail_trans`
--
ALTER TABLE `tbl_detail_trans`
 ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
 ADD PRIMARY KEY (`idgroup`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
 ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
 ADD PRIMARY KEY (`idmaterial`), ADD UNIQUE KEY `kode_material` (`kode_material`);

--
-- Indexes for table `tbl_revisi_stock`
--
ALTER TABLE `tbl_revisi_stock`
 ADD PRIMARY KEY (`idrevisi`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
 ADD PRIMARY KEY (`idsaldo`);

--
-- Indexes for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
 ADD PRIMARY KEY (`idsatuan`);

--
-- Indexes for table `tbl_trans_warehouse`
--
ALTER TABLE `tbl_trans_warehouse`
 ADD PRIMARY KEY (`idtransaksi`), ADD UNIQUE KEY `no_transaksi` (`no_transaksi`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
 ADD PRIMARY KEY (`idunit`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`iduser`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cash_flow`
--
ALTER TABLE `tbl_cash_flow`
MODIFY `idcashflow` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_detail_trans`
--
ALTER TABLE `tbl_detail_trans`
MODIFY `iddetail` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=168;
--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
MODIFY `idgroup` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
MODIFY `idjenis` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
MODIFY `idmaterial` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tbl_revisi_stock`
--
ALTER TABLE `tbl_revisi_stock`
MODIFY `idrevisi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
MODIFY `idsaldo` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
MODIFY `idsatuan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_trans_warehouse`
--
ALTER TABLE `tbl_trans_warehouse`
MODIFY `idtransaksi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
MODIFY `idunit` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `iduser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
