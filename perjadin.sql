-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2021 at 07:21 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perjadin`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `output` varchar(100) NOT NULL,
  `komponen` varchar(50) NOT NULL,
  `kegiatan` varchar(500) NOT NULL,
  `volume` int(8) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tmp_volume` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `output`, `komponen`, `kegiatan`, `volume`, `satuan`, `tanggal_mulai`, `tanggal_selesai`, `tmp_volume`) VALUES
(1, 'LAPORAN PENYELENGGARAAN SISTEM STATISTIK NASIONAL (SSN)', ' PENGUMPULAN DATA ', 'Transport lokal dalam rangka pendataan metadata kegiatan statistik sektoral/khusus  ', 5, 'O-K', '2021-01-01', '2021-12-31', NULL),
(2, 'LAPORAN DISEMINASI DAN METADATA STATISTIK', ' PENGUMPULAN DATA ', 'Perjalanan dinas lebih dari 8 jam pengumpulan data publikasi kabupaten/kota dalam angka dan kecamatan', 22, 'O-H', '2021-01-01', '2021-12-31', NULL),
(10, 'LAPORAN PENYELENGGARAAN SISTEM STATISTIK NASIONAL (SSN) ', ' PENGUMPULAN DATA ', 'Transport lokal pendataan Survei Kebutuhan Data (SKD) kabupaten/kota (kunjungan ke instansi)', 7, 'O-K', '2021-01-01', '2021-12-31', NULL),
(11, 'LAPORAN DISEMINASI DAN METADATA STATISTIK ', ' PENGUMPULAN DATA ', 'Fullday FGD pembahasan data publikasi kabupaten/kota dalam angka dan kecamatan dalam angka', 30, 'O-H', '2021-01-01', '2021-12-31', NULL),
(12, 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN', ' PENGUMPULAN DATA ', 'Perjalanan dinas lebih dari 8 jam pengawasan SKRRT ', 9, 'O-H', '2021-01-01', '2021-12-31', NULL),
(13, 'PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', ' PENGUMPULAN DATA ', 'Perjalanan dinas lebih dari 8 jam pencacahan SMAK ', 6, 'O-H', '2021-01-01', '2021-12-31', NULL),
(14, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan SMAK ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(15, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan Survei Penyusunan Disagregasi PMTB ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(17, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan Survei Penyusunan Disagregasi PMTB ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(18, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan SKPPI ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(19, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan SKPPI ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(20, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam updating direktori LNPRT ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(21, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan SKLNPRT ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(22, ' PUBLIKASI/LAPORAN STATISTIK NERACA PENGELUARAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan SKLNPRT ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(23, ' PUBLIKASI/LAPORAN NERACA PRODUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam inentarisasi dara sekunder sektor barang dan jasa regional ', 0, 'O-H', '2021-01-01', '2021-12-31', 3),
(24, ' DOKUMEN, LAPORAN, DAN PUBLIKASI PENGEMBANGAN METODOLOGI SENSUS DAN SURVEI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam groundcheck pemutakhiran peta wilayah kerja statistik ke kecamatan  ', 3, 'O-H', '2021-01-01', '2021-12-31', 3),
(25, ' PUBLIKASI/LAPORAN STATISTIK DISTRIBUSI YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas pengawasan BPS kab/kota ke kecamatan KOMPILASI DATA TRANSPORTASI  ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(26, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Transport lokas pencacahan SHK SVK dan SVPEB icp SHK dan SVPEB  ', 289, 'O-K', '2021-01-01', '2021-12-31', NULL),
(27, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Perjalanan dinas pengawasan SHK SVK dan SVPEB icp SHK dan SVPEB  ', 5, 'O-H', '2021-01-01', '2021-12-31', NULL),
(28, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan dari kab/kota ke kecamatan  SHK dan SVPEB  ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(29, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan ke kecamatan IKK ', 0, 'O-H', '2021-01-01', '2021-12-31', 1),
(30, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Supervisi/pengawasan dari kab/kota ke kec/BS ', 34, 'O-H', '2021-01-01', '2021-12-31', NULL),
(31, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Transport lokal pencacahan updating blok sensus kab/kota  ', 180, 'O-K', '2021-01-01', '2021-12-31', NULL),
(32, ' PUBLIKASI/LAPORAN STATISTIK HARGA ', 'PENGUMPULAN DATA', ' Transport lokal pengawasan updating blok sensus kab/kota  ', 90, 'O-K', '2021-01-01', '2021-12-31', NULL),
(33, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam revisit survei pertambangan ', 0, 'O-H', '2021-01-01', '2021-01-26', 1),
(34, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan pemeriksaan revisit Survei Konstruksi  ', 46, 'O-H', '2021-01-01', '2021-12-31', NULL),
(35, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pemeriksaan hasil pencacahan di kab/kota  ', 18, 'O-H', '2021-01-01', '2021-12-31', NULL),
(36, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan VIMK 2021 tahunan  ', 15, 'O-H', '2021-01-01', '2021-12-31', NULL),
(37, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pemeriksaan hasil pencacahan VIMK 2021 tahunan  ', 33, 'O-H', '2021-01-01', '2021-12-31', NULL),
(38, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Pemeriksaan survei industri bulanan  ', 7, 'O-H', '2021-01-01', '2021-12-31', NULL),
(39, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Revisit Survei Industri Besar dan Sedang Bulanan  ', 8, 'O-H', '2021-01-01', '2021-12-31', NULL),
(40, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Revisit hasil survei ibs tahunan di kabupaten  ', 21, 'O-H', '2021-01-01', '2021-12-31', NULL),
(41, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan IBS tahunan  ', 42, 'O-H', '2021-01-01', '2021-12-31', NULL),
(42, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Pencacahan Survei Pertambangan  ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(43, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Listing blok sensus dan pemeriksaan VIMK 2021 tahunan  ', 27, 'O-H', '2021-01-01', '2021-12-31', NULL),
(44, ' PUBLIKASI/LAPORAN SAKERNAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan updating listing blok sensus Sakernas Semesteran ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(45, ' PUBLIKASI/LAPORAN SAKERNAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan updating listing blok sensus Sakernas Tahunan ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(46, ' PUBLIKASI/LAPORAN SAKERNAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pencacahan rumahtangga Sakernas Semesteran ', 68, 'O-H', '2021-01-01', '2021-12-31', NULL),
(47, ' PUBLIKASI/LAPORAN SAKERNAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pencacahan rumahtangga Sakernas Tahunan ', 6, 'O-H', '2021-01-01', '2021-12-31', NULL),
(48, ' PUBLIKASI/LAPORAN SENSUS PENDUDUK ', ' PELAKSANAAN SENSUS SAMPEL ', ' Perjalanan pelatihan inda di Provinsi ', 3, 'O-P', '2021-01-01', '2021-12-31', 5),
(49, ' PUBLIKASI/LAPORAN SENSUS PENDUDUK ', ' PELAKSANAAN SENSUS SAMPEL ', ' Perjalanan dinas lebih dari 8 jam kab ke kec verifikasi kematian ibu  ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(50, ' PUBLIKASI/LAPORAN SUSENAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pendataan lapangan Susenas Maret 2021 ', 25, 'O-H', '2021-01-01', '2021-12-31', NULL),
(51, ' PUBLIKASI/LAPORAN STATISTIK INDUSTRI, PERTAMBANGAN DAN PENGGALIAN, ENERGI, DAN KONSTRUKSI ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan survei industri bulanan  ', 15, 'O-H', '2021-01-01', '2021-12-31', NULL),
(53, ' PUBLIKASI/LAPORAN SUSENAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pendataan lapangan Susenas MSBP ', 8, 'O-H', '2021-01-01', '2021-12-31', NULL),
(54, ' PUBLIKASI/LAPORAN SUSENAS ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pendataan lapangan Susenas MSBP ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(55, ' PUBLIKASI/LAPORAN SUSENAS ', 'PENGUMPULAN DATA', ' Supervisi pendataan lapangan Susenas MSBP ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(56, ' PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Pengawasan SPTK ', 12, 'O-H', '2021-01-01', '2021-12-31', NULL),
(57, ' PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengumpulan data Statistik POLKAM ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(58, ' PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pengumpulan data Statistik POLKAM ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(59, ' PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengumpulan data SPAK ', 8, 'O-H', '2021-01-01', '2021-12-31', NULL),
(60, ' PUBLIKASI/LAPORAN STATISTIK KETAHANAN SOSIAL ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan pengumpulan data SPAK ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(61, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam konfirmasi data ke dinas terkait  ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(62, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan ke desa ', 4, 'O-H', '2021-01-01', '2021-12-31', 4),
(63, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan podes-kec ', 4, 'O-H', '2021-01-01', '2021-12-31', NULL),
(64, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan podes-kab ', 1, 'O-H', '2021-01-01', '2021-12-31', 1),
(65, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pemeriksaan podes kec ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(66, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pemeriksaan podes desa ', 8, 'O-H', '2021-01-01', '2021-12-31', NULL),
(67, ' PUBLIKASI/LAPORAN PENDATAAN PODES ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan BPS kab/kota ke kecamatan ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(68, ' PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan dan pemeriksaan bumd kabupaten Survei Badan Usaha dan Pasar Modal  ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(69, ' PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan SBJ Pariwisata  ', 222, 'O-H', '2021-01-01', '2021-12-31', NULL),
(70, ' PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pemeriksaan SBJ Pariwisata  ', 72, 'O-H', '2021-01-01', '2021-12-31', NULL),
(71, ' PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan dan pemeriksaan survei statistik keuangan pemda  ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(72, ' PUBLIKASI/LAPORAN STATISTIK KEUANGAN, TEKNOLOGI INFORMASI, DAN PARIWISATA YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam Pengawasan kab/kota ke kecamatan SBJ Pariwisata  ', 2, 'O-H', '2021-01-01', '2021-12-31', NULL),
(73, ' PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengumpulan data perusahaan peternakan dan RPH/TPH ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(74, ' PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pendataan dan Pemeriksaan Perusahaan Kehutanan  ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(75, ' PUBLIKASI/LAPORAN STATISTIK PETERNAKAN, PERIKANAN, DAN KEHUTANAN YANG TERBIT TEPAT WAKTU ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pengawasan BPS kab/kota ke kecamatan ', 3, 'O-H', '2021-01-01', '2021-12-31', NULL),
(76, ' PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pencacahan tahunan SKB  ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(77, ' PUBLIKASI/LAPORAN STATISTIK HORTIKULTURA DAN PERKEBUNAN ', 'PENGUMPULAN DATA', ' Perjalanan dinas lebih dari 8 jam pemeriksaan tahunan SKB  ', 1, 'O-H', '2021-01-01', '2021-12-31', NULL),
(78, ' PUBLIKASI/ LAPORAN STATISTIK TANAMAN PANGAN TERINTEGRASI DENGAN KERANGKA SAMPEL AREA ', 'PENGUMPULAN DATA', ' Perjadin lebih dari 8 jam pengawasan kab/kota ke kecamatan  ', 5, 'O-H', '2021-01-01', '2021-12-31', NULL),
(79, 'CONTOH DOKUMEN, LAPORAN, DAN PUBLIKASI PENGEMBANGAN METODOLOGI SENSUS DAN SURVEI ', 'PENGUMPULAN DATA', 'INI CONTOH TMP VOL', 0, 'O-H', '2021-01-01', '2021-12-31', 8),
(80, 'CONTOH TANGGAL MULAI DAN SELESAI', 'PENGUMPULAN DATA', 'Tanggal Mulai dan Selesai', 8, 'O-H', '2021-06-01', '2021-07-31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rencana_perjadin`
--

CREATE TABLE `rencana_perjadin` (
  `id_rencana` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_kegiatan` int(10) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_pulang` date NOT NULL,
  `due_date` date DEFAULT NULL,
  `tanggal_pengumpulan` date DEFAULT NULL,
  `total_volume` int(10) NOT NULL,
  `laporan` varchar(255) DEFAULT NULL,
  `status` varchar(5) NOT NULL DEFAULT '1',
  `notif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana_perjadin`
--

INSERT INTO `rencana_perjadin` (`id_rencana`, `id_user`, `id_kegiatan`, `tanggal_berangkat`, `tanggal_pulang`, `due_date`, `tanggal_pengumpulan`, `total_volume`, `laporan`, `status`, `notif`) VALUES
(1, 2, 79, '2021-01-28', '2021-01-30', '2021-02-13', '2021-01-27', 3, 'Laporan_Perjadin_(5).xlsx', '1', 2),
(2, 3, 79, '2021-01-27', '2021-01-27', '2021-02-10', '2021-01-26', 1, NULL, '1', 0),
(3, 3, 79, '2021-01-27', '2021-01-29', '2021-02-12', '2021-01-26', 3, 'Laporan_Perjadin.xlsx', '1', 0),
(4, 8, 79, '2021-02-01', '2021-02-01', '2021-02-15', NULL, 1, NULL, '1', 0),
(8, 23, 29, '2021-02-05', '2021-02-05', '2021-02-19', '2021-01-26', 1, 'LAPORAN_PKL_(FEBRIANTHI_INTAN_NURZAMZIAH_-_SYAHRIN_KUSUMA_ARBIYANTI)-COVER.pdf', '1', 2),
(9, 2, 33, '2021-01-25', '2021-01-25', '2021-02-08', '2021-01-29', 1, NULL, '1', 2),
(10, 2, 33, '2021-01-29', '2021-01-29', '2021-02-12', '2021-01-26', 1, NULL, '1', 0),
(11, 9, 48, '2021-01-29', '2021-01-30', '2021-02-13', '2021-01-26', 2, 'Laporan_Perjadin_(1).xlsx', '1', 0),
(12, 2, 23, '2021-01-28', '2021-01-30', '2021-02-13', '2021-01-27', 3, NULL, '1', 1),
(13, 3, 80, '2021-01-01', '2021-01-02', '2021-01-16', '2021-01-29', 2, NULL, '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `jabatan`, `email`, `password`, `pendidikan`, `level`) VALUES
(1, 'Drs. Sunaryo, M.Si', '196310041991021001', 'Kepala', 'naryo@bps.go.id', '12345', 'S2', 'supervisor'),
(2, 'Rony Mugiartono', '196510051988031002', 'Kasubbag Umum', 'rmugi@bps.go.id', '12345', 'D3', 'admin'),
(3, 'Henry Soeryaning Handoko, SST', '197509301999011001', 'Koordinator Fungsional', 'henrys@bps.go.id', '12345', 'D-IV', 'supervisor'),
(4, 'Ir. Agustina Martha, M.M.', '196808231994012001', 'Koordinator Fungsional', 'agustina.martha@bps.go.id', '12345', 'S2', 'supervisor'),
(5, 'Ir. Dwi Handayani Prasetyawati, M.AP', '196810281994012001', 'Koordinator Fungsional', 'dwi.handayani@bps.go.id', '12345', 'S2', 'supervisor'),
(6, 'Ir. Ernawaty, M.M.', '196701091992032001', 'Koordinator Fungsional', 'ernawaty@bps.go.id', '12345', 'S2', 'supervisor'),
(7, 'Heru Prasetyo, SE', '196312041990031001', 'Koordinator Fungsional', 'heruprasetyo@bps.go.id', '12345', 'S1', 'supervisor'),
(8, 'Rachmad Widi Wijayanto', '197704042006041016', 'Fungsional Umum', 'rachmadwidi@bps.go.id', '12345', 'SMA', 'operator'),
(9, 'Eka Prahara Resbiyanti, A.Md', '198510202011012017', 'Bendahara', 'eka.prahara@bps.go.id', '12345', 'D-III', 'admin'),
(10, 'Satria Candra Wibawa, A.Md', '198810282011011004', 'Statistisi Pelaksana Lanjutan', 'satria.wibawa@bps.go.id', '12345', 'D-III', 'operator'),
(11, 'Windi Wijayanti, S.Si, M.E', '198712182011012022', 'Statistisi Pertama', 'windi.wijayanti@bps.go.id', '12345', 'S2', 'operator'),
(12, 'Rhyke Chrisdiana Novita, S.E.', '198404122005022001', 'Statistisi Pertama', 'rhyke.novita@bps.go.id', '12345', 'S1', 'operator'),
(13, 'Ratri Adhipradani Ratih, S.Si', '198510022009022012', 'Statistisi Muda', 'ratri@bps.go.id', '12345', 'S1', 'operator'),
(14, 'Ir. Rahmi Veronika', '196604101994012001', 'Statistisi Pelaksana Lanjutan', 'rahmi.veronika@bps.go.id', '12345', 'S1', 'operator'),
(15, 'Rizky Maulidya, SST', '199109302014102001', 'Statistisi Pertama', 'rizky.maulidya@bps.go.id', '12345', 'D4', 'operator'),
(16, 'Saras Wati Utami, S.Si, M.E', '198803302010122002', 'Statistisi Pertama', 'saras.wati@bps.go.id', '12345', 'S1', 'operator'),
(17, 'Christiayu Natalia, SST', '199109162014102002', 'Statistisi Pertama', 'christiayu@bps.go.id', '12345', 'D4', 'operator'),
(18, 'Soekesi Irawati, S.Psi.,M.M', '197009251994012001', 'Statistisi Muda', 'soekesi.irawati@bps.go.id', '12345', 'S2', 'operator'),
(19, 'Ir. Lies Alfiah', '196604241992032002', 'Statistisi Muda', 'lies.alfiah@bps.go.id', '12345', 'S1', 'operator'),
(20, 'Tasmilah, SST', '198309102006022001', 'Statistisi Muda', 'tasmilah@bps.go.id', '12345', 'D4', 'operator'),
(21, 'Saruni Gincahyo, SE', '196802281989031003', 'Statistisi Penyelia', 'saruni.gincahyo@bps.go.id', '12345', 'S1', 'operator'),
(22, 'Yusuf Fatoni, SE', '197012251997031004', 'Fungsional Umum', 'yusuf.fatoni@bps.go.id', '12345', 'S1', 'operator'),
(23, 'Rendra Anandhika, A.Md.', '198802292011011005', 'Statistisi Pelaksana', 'rendra@bps.go.id', '12345', 'D3', 'operator'),
(24, 'administrator', '21334234324', 'Staff', 'administrator@bps.go.id', '12345', 'D3', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `rencana_perjadin`
--
ALTER TABLE `rencana_perjadin`
  ADD PRIMARY KEY (`id_rencana`),
  ADD KEY `id_user` (`id_user`,`id_kegiatan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rencana_perjadin`
--
ALTER TABLE `rencana_perjadin`
  MODIFY `id_rencana` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rencana_perjadin`
--
ALTER TABLE `rencana_perjadin`
  ADD CONSTRAINT `rencana_perjadin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `rencana_perjadin_ibfk_2` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
