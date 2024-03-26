-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 05:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan_inti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity_log`
--

CREATE TABLE `tbl_activity_log` (
  `id_activity` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `activity` varchar(500) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data`
--

CREATE TABLE `tbl_data` (
  `no` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `kode_rekening` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `nama_lokasi` varchar(500) NOT NULL,
  `pelaksana` varchar(50) NOT NULL,
  `singkatan_pelaksana` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `pemborong` varchar(50) NOT NULL,
  `wilayah` varchar(50) NOT NULL,
  `abt` varchar(50) NOT NULL,
  `kepala_uptd` varchar(100) NOT NULL,
  `diambil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data`
--

INSERT INTO `tbl_data` (`no`, `tanggal`, `kode_rekening`, `nomor`, `kegiatan`, `nama_lokasi`, `pelaksana`, `singkatan_pelaksana`, `jenis_pekerjaan`, `pemborong`, `wilayah`, `abt`, `kepala_uptd`, `diambil`) VALUES
(1, '01/19/2022', '02.2.46.140\r\n02.2.1.46.35\r\n02.2.01.46.36', '', 'Test Daya Dukung Tanah (Sondir)', 'Proyek Pemasangan Bronjong SP Kali Kelapa Karaba Indah Kecamatan Telukjambe Timur', 'CV. ASPIRASI LUHUR,\r\nCV. KARYA GEMILANG,\r\nCV. QIYA', '', 'Sondir', 'Aris', 'KRW', '(ABT)', 'DWI JULYANTO, S.H.', '01/19/2022'),
(2, '01/26/2022', '', '', 'Test CBR Lapangan', 'Proyek Pembangunan Jalan dan Jembatan Kampus UNSIKA 2 Karawang', 'PT. LIAN SURYA', '', 'CBR Lapangan', 'Ibnu', 'KRW', 'Swasta', 'DWI JULYANTO, S.H.', '01/26/2022'),
(3, '01/28/2022', '', '', 'Test Daya Dukung Tanah', 'Proyek Pembangunan Jembatan KW 6 Karawang Barat', 'CV. ARS JR SEJAHTERA', '', 'Sondir', 'Hendro', 'KRW', '', 'DWI JULYANTO, S.H.', '01/28/2022'),
(4, '04/13/2022', '02.2.02.14.130', '', 'Penurapan Saluran Tersier', 'Dusun Karokrok Selatan Desa Kalijaya', 'CV. HARAPAN JAYA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(5, '04/13/2022', '02.2.02.14.222', '', 'Penurapan Sodetan', 'Kalen Tasrip Desa Tegalsari', 'CV. JELITA PELITA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(6, '04/13/2022', '02.2.02.14.121', '', 'Penurapan Saluran SS Buaya', 'Desa Cadas Kertajaya', 'CV. JELITA PELITA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(7, '04/13/2022', '02.2.02.14.122', '', 'Penurapan Saluran Tersier', 'Bodeman Desa Kalijaya', 'CV. HARAPAN JAYA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(8, '04/13/2022', '06.2.01.14.25', '', 'Normalisasi Drainase', 'Dusun Paris Desa Bayurlor', 'CV. HARAPAN JAYA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(9, '01/19/2022', '02.2.46.140 02.2.1.46.35 02.2.01.46.36', '', 'Test Daya Dukung Tanah (Sondir)', 'Proyek Pemasangan Bronjong SP Kali Kelapa Karaba Indah Kecamatan Telukjambe Timur', 'CV. ASPIRASI LUHUR, CV. KARYA GEMILANG, CV. QIYAMU', '', 'Sondir', 'Aris', 'KRW', '(ABT)', 'DWI JULYANTO, S.H.', '01/19/2022'),
(10, '01/26/2022', '', '', 'Test CBR Lapangan', 'Proyek Pembangunan Jalan dan Jembatan Kampus UNSIKA 2 Karawang', 'PT. LIAN SURYA', '', 'CBR Lapangan', 'Ibnu', 'KRW', 'Swasta', 'DWI JULYANTO, S.H.', '01/26/2022'),
(11, '01/28/2022', '', '', 'Test Daya Dukung Tanah', 'Proyek Pembangunan Jembatan KW 6 Karawang Barat', 'CV. ARS JR SEJAHTERA', '', 'Sondir', 'Hendro', 'KRW', '', 'DWI JULYANTO, S.H.', '01/28/2022'),
(12, '04/13/2022', '02.2.02.14.130', '', 'Penurapan Saluran Tersier', 'Dusun Karokrok Selatan Desa Kalijaya', 'CV. HARAPAN JAYA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(13, '04/13/2022', '02.2.02.14.222', '', 'Penurapan Sodetan', 'Kalen Tasrip Desa Tegalsari', 'CV. JELITA PELITA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(14, '04/13/2022', '02.2.02.14.121', '', 'Penurapan Saluran SS Buaya', 'Desa Cadas Kertajaya', 'CV. JELITA PELITA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(15, '04/13/2022', '02.2.02.14.122', '', 'Penurapan Saluran Tersier', 'Bodeman Desa Kalijaya', 'CV. HARAPAN JAYA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(16, '04/13/2022', '06.2.01.14.25', '', 'Normalisasi Drainase', 'Dusun Paris Desa Bayurlor', 'CV. HARAPAN JAYA ABADI', '', 'Turap', 'Wawan Ara', 'TLG', '', 'DWI JULYANTO, S.H.', '04/13/2022'),
(19, '28/1/2022', '', '', 'Test CBR Lapangan', 'Proyek Pembangunan Jalan dan Jembatan Kampus UNSIKA 2 Karawang', 'PT. LIAN SURYA', '', 'CBR Lapangan', 'Ibnu', 'KRW', 'Swasta', 'DWI JULYANTO, S.H.', '2022-01-26 00:00:00'),
(20, '22/4/2022', '', '', 'Test Daya Dukung Tanah', 'Proyek Pembangunan Jembatan KW 6 Karawang Barat', 'CV. ARS JR SEJAHTERA', '', 'Sondir', 'Hendro', 'KRW', '', 'DWI JULYANTO, S.H.', '2022-01-28 00:00:00'),
(21, '22/4/2022', ' ', '', 'Peningkatan Emplacement', 'SDN Sukatani III Kecamatan Cilamaya Wetan', '', '', 'R', '', 'TLG', '', 'DWI JULYANTO, S.H.', '2022-04-22 00:00:00'),
(22, '22/4/2022', '', '', 'Peningkatan Emplacement', 'SMK PGRI Cilamaya', '', '', 'R', '', 'TLG', '', 'DWI JULYANTO, S.H.', '2022-04-22 00:00:00'),
(23, '18/5/2022', '', '', 'Peningkatan Emplacement', 'Masjid Agung Al-Falah', '', '', 'R', '', 'TLG', '', 'DWI JULYANTO, S.H.', '2022-04-22 00:00:00'),
(24, '26/1/2022', '', '', 'Peningkatan Jalan', 'Jalan Tegaloa - Cicangor Desa Kutamaneuh', '', '', 'Sondir', 'Dinas', 'KRW', '', 'DWI JULYANTO, S.H.', '2022-05-18 00:00:00'),
(25, '28/1/2022', '', '', 'Test CBR Lapangan', 'Proyek Pembangunan Jalan dan Jembatan Kampus UNSIKA 2 Karawang', 'PT. LIAN SURYA', '', 'CBR Lapangan', 'Ibnu', 'KRW', 'Swasta', 'DWI JULYANTO, S.H.', '2022-01-26 00:00:00'),
(26, '22/4/2022', '', '', 'Test Daya Dukung Tanah', 'Proyek Pembangunan Jembatan KW 6 Karawang Barat', 'CV. ARS JR SEJAHTERA', '', 'Sondir', 'Hendro', 'KRW', '', 'DWI JULYANTO, S.H.', '2022-01-28 00:00:00'),
(27, '22/4/2022', ' ', '', 'Peningkatan Emplacement', 'SDN Sukatani III Kecamatan Cilamaya Wetan', '', '', 'R', '', 'TLG', '', 'DWI JULYANTO, S.H.', '2022-04-22 00:00:00'),
(28, '22/4/2022', '', '', 'Peningkatan Emplacement', 'SMK PGRI Cilamaya', '', '', 'R', '', 'TLG', '', 'DWI JULYANTO, S.H.', '2022-04-22 00:00:00'),
(29, '18/5/2022', '', '', 'Peningkatan Emplacement', 'Masjid Agung Al-Falah', '', '', 'R', '', 'TLG', '', 'DWI JULYANTO, S.H.', '2022-04-22 00:00:00'),
(30, '18/05/2022', '', '', 'Peningkatan Jalan', 'Jalan Tegaloa - Cicangor Desa Kutamaneuh', '', '', 'Sondir', 'Dinas', 'KRW', '', 'DWI JULYANTO, S.H.', '2022-05-18 00:00:00'),
(31, '26/06/2022', '10.01.02.08245', '620.04', 'KERJA BAKTI', 'jl Sukaseuri no 4, kec Cikampek', 'CV Garuda Indonesia 88', 'GI88', 'H + BC', 'Yusup', 'Cikampek', '(abt)', 'DWI JULYANTO, S.H.', '26/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_laporan`
--

CREATE TABLE `tbl_jenis_laporan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_modified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_laporan`
--

INSERT INTO `tbl_jenis_laporan` (`id`, `jenis`, `nomor`, `date_created`, `date_modified`) VALUES
(1, 'laporan jalan', '620.04', '23/06/2022', ''),
(2, 'laporan emplacement', '620.4.04', '23/06/2022', ''),
(3, 'laporan turap (sda)', '611.31.04', '23/06/2022', ''),
(4, 'laporan turap (jalan (tpt))', '621.98.04', '23/06/2022', ''),
(5, 'laporan sondir (jembatan)', '630.04', '23/06/2022', ''),
(6, 'laporan sondir (bangunan)', '640.04', '23/06/2022', ''),
(7, 'laporan swasta', '600.04', '23/06/2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_hotmix_analisabutir`
--

CREATE TABLE `tbl_master_hotmix_analisabutir` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `ukuran_saringan` varchar(100) NOT NULL,
  `tertahan_saringan` varchar(100) NOT NULL,
  `jumlah_tertahan` varchar(100) NOT NULL,
  `tertahan` varchar(100) NOT NULL,
  `lolos` varchar(100) NOT NULL,
  `spec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_master_hotmix_analisabutir`
--

INSERT INTO `tbl_master_hotmix_analisabutir` (`id`, `jenis`, `ukuran_saringan`, `tertahan_saringan`, `jumlah_tertahan`, `tertahan`, `lolos`, `spec`) VALUES
(1, 'Hotmix AC. BC', '1 1/2', '', '', '', '', ''),
(2, 'Hotmix AC. WC', '1 1/2', '', '', '', '', ''),
(3, 'Hotmix AC. BC', '1', '0', '0', '0', '100', '100'),
(4, 'Hotmix AC. WC', '1', '', '', '', '', ''),
(5, 'Hotmix AC. BC', '3/4', '20,1', '20,1', '4,28', '95,72', '90 - 100'),
(6, 'Hotmix AC. WC', '3/4', '0', '0', '0', '100', '100'),
(7, 'Hotmix AC. BC', '1/2', '65.8', '85.9', '18.27270793', '81.72729207', '75 - 90'),
(8, 'Hotmix AC. BC', '1/2', '65.8', '85.9', '18.27270793', '81.72729207', '75 - 90'),
(9, 'Hotmix AC. WC', '1/2', '28.1', '28.1', '5.987641168', '94.01235883', '90 - 100'),
(10, 'Hotmix AC. BC', '3/8', '46.8', '132.7', '28.22803659', '71.77196341', '66 - 82'),
(11, 'Hotmix AC. WC', '3/8', '62.8', '90.9', '19.36927339', '80.63072661', '77 - 90'),
(12, 'Hotmix AC. BC', '4', '87.5', '220.2', '46.84109764', '53.15890236', '46 - 64'),
(13, 'Hotmix AC. WC', '4', '104.5', '195.4', '41.63647986', '58.36352014', '53 - 69'),
(14, 'Hotmix AC. BC', '8', '65.5', '285.7', '60.77430334', '39.22569666', '30 - 49'),
(15, 'Hotmix AC. WC', '8', '65.5', '260.9', '55.59343703', '44.40656297', '33 - 53'),
(16, 'Hotmix AC. BC', '16', '83.1', '368.8', '78.45139332', '21.54860668', '18 - 38'),
(17, 'Hotmix AC. WC', '16', '83.1', '344', '73.30066056', '26.69933944', '21 - 40'),
(18, 'Hotmix AC. BC', '30', '23.7', '392.5', '83.49287386', '16.50712614', '12 - 28'),
(19, 'Hotmix AC. WC', '30', '25.1', '369.1', '78.64905178', '21.35094822', '14 - 30'),
(20, 'Hotmix AC. BC', '50', '10.8', '403.3', '85.79025739', '14.20974261', '7 - 20'),
(21, 'Hotmix AC. WC', '50', '12.7', '381.8', '81.35520989', '18.64479011', '9 - 22'),
(22, 'Hotmix AC. BC', '70', '0', '0', '0', '0', ''),
(23, 'Hotmix AC. WC', '70', '0', '0', '0', '0', ''),
(24, 'Hotmix AC. BC', '100', '29.5', '422', '89.76813444', '10.23186556', '5 - 13'),
(25, 'Hotmix AC. WC', '100', '25.5', '407.3', '86.78883443', '13.21116557', '6 - 15'),
(26, 'Hotmix AC. BC', '200', '18.2', '440.2', '93.63965114', '6.360348862', '4 - 8'),
(27, 'Hotmix AC. WC', '200', '29.2', '436.5', '93.01086725', '6.989132751', '4 - 9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_hotmix_botol`
--

CREATE TABLE `tbl_master_hotmix_botol` (
  `jenis_botol` varchar(100) DEFAULT NULL,
  `berat_pasir` double DEFAULT NULL,
  `berat_isi_pasir` double DEFAULT NULL,
  `d_maksimum` double DEFAULT NULL,
  `kadar_air_optimum` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_master_hotmix_botol`
--

INSERT INTO `tbl_master_hotmix_botol` (`jenis_botol`, `berat_pasir`, `berat_isi_pasir`, `d_maksimum`, `kadar_air_optimum`) VALUES
('Botol 1', 1675, 1.56, 2.16, 5.9),
('Botol 2', 1650, 1.593, 2.16, 5.9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_hotmix_detail`
--

CREATE TABLE `tbl_master_hotmix_detail` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `berat_contoh_sebelum_extraksi` varchar(100) NOT NULL,
  `berat_filter_sebelum_extraksi` varchar(100) NOT NULL,
  `berat_contoh_sesudah_extraksi` varchar(100) NOT NULL,
  `berat_filter_sesudah_extraksi` varchar(100) NOT NULL,
  `berat_total_agregat` varchar(100) NOT NULL,
  `berat_aspal` varchar(100) NOT NULL,
  `kadar_aspal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_master_hotmix_detail`
--

INSERT INTO `tbl_master_hotmix_detail` (`id`, `jenis`, `berat_contoh_sebelum_extraksi`, `berat_filter_sebelum_extraksi`, `berat_contoh_sesudah_extraksi`, `berat_filter_sesudah_extraksi`, `berat_total_agregat`, `berat_aspal`, `kadar_aspal`) VALUES
(1, 'Hotmix AC. BC', '500', '13,5', '470,1', '14,3', '470,9', '29,1', '5,82'),
(2, 'Hotmix AC. WC', '500', '13,8', '469,3', '14,3', '469,8', '30,2', '6,04'),
(3, 'Uji coba', '2', '3', '4', '5', '6', '7', '90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_master_hotmix_grafik`
--

CREATE TABLE `tbl_master_hotmix_grafik` (
  `id` int(11) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `spec_1` varchar(100) DEFAULT NULL,
  `spec_2` varchar(100) DEFAULT NULL,
  `lolos` varchar(100) DEFAULT NULL,
  `ukuran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_master_hotmix_grafik`
--

INSERT INTO `tbl_master_hotmix_grafik` (`id`, `jenis`, `detail`, `spec_1`, `spec_2`, `lolos`, `ukuran`) VALUES
(1, 'Hotmix AC. BC', '500', '4', '8', '6.2', '200'),
(2, 'Hotmix AC. WC', '500', '4', '9', '6.99', '200'),
(3, 'Hotmix AC. BC', '13.8', '5', '13', '10.08', '100'),
(4, 'Hotmix AC. WC', '13.8', '6', '15', '13.21', '100'),
(5, 'Hotmix AC. BC', '469.3', '7', '20', '14.06', '50'),
(6, 'Hotmix AC. WC', '469.3', '9', '22', '18.64', '50'),
(7, 'Hotmix AC. BC', '14.3', '12', '28', '16.36', '30'),
(8, 'Hotmix AC. WC', '14.3', '14', '30', '21.35', '30'),
(9, 'Hotmix AC. BC', '469.8', '18', '38', '21.41', '16'),
(10, 'Hotmix AC. WC', '469.8', '21', '40', '26.7', '16'),
(11, 'Hotmix AC. BC', '30.2', '30', '49', '39.12', '8'),
(12, 'Hotmix AC. WC', '30.2', '33', '53', '44.41', '8'),
(13, 'Hotmix AC. BC', '6.04', '46', '64', '53.08', '4'),
(14, 'Hotmix AC. WC', '6.04', '53', '69', '58.36', '4'),
(15, 'Hotmix AC. BC', '0', '66', '82', '71.72', '3/8'),
(16, 'Hotmix AC. WC', '0', '77', '90', '80.63', '3/8'),
(17, 'Hotmix AC. BC', '0', '75', '90', '81.7', '1/2'),
(18, 'Hotmix AC. WC', '0', '90', '100', '94.01', '1/2'),
(19, 'Hotmix AC. BC', '0', '90', '100', '95.72', '3/4'),
(20, 'Hotmix AC. WC', '0', '100', '100', '100', '3/4'),
(21, 'Hotmix AC. BC', '0', '100', '100', '100', '1'),
(22, 'Hotmix AC. WC', '0', '#N/A', '#N/A', '#N/A', '1'),
(23, 'Hotmix AC. BC', '0', '#N/A', '#N/A', '#N/A', '1.5'),
(24, 'Hotmix AC. WC', '0', '#N/A', '#N/A', '#N/A', '1.5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugaslab`
--

CREATE TABLE `tbl_petugaslab` (
  `id_petugasLab` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `wilayah` varchar(100) NOT NULL,
  `date_created` varchar(50) NOT NULL,
  `date_modified` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_petugaslab`
--

INSERT INTO `tbl_petugaslab` (`id_petugasLab`, `nip`, `nama`, `wilayah`, `date_created`, `date_modified`) VALUES
(1, '19760217 200701 1 006', 'SAEPUDIN BASRI', 'RDK', '', ''),
(2, '19660208 200701 1 008', 'SATIBI, SH', 'KRW', '', ''),
(3, '19720220 200701 1 009', 'AKUM SUPRIADI', 'CKP', '', ''),
(4, '19760217 200701 1 006', 'SAEPUDIN BASRI', 'TLG', '', ''),
(6, '123.345.5678', 'SILPI', 'KRW', '26/06/2022 9:43 am', '27/06/2022 10:16 am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `role`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `NIP` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `status_akun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `NIP`, `username`, `nama`, `gender`, `alamat`, `divisi`, `posisi`, `status_akun`) VALUES
(1, '', 'silviana', 'Silviana Putri', 'wanita', 'Klari, kab. Karawang', 'Admin', 'THL/Honorer', 'aktif'),
(2, '19780715 201010 1 001', 'DWI_JULYANTO', 'DWI JULYANTO, S.H.', 'pria', 'Karawang', 'Ketua', 'Kepala UPTD', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `tbl_data`
--
ALTER TABLE `tbl_data`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_jenis_laporan`
--
ALTER TABLE `tbl_jenis_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_hotmix_analisabutir`
--
ALTER TABLE `tbl_master_hotmix_analisabutir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_hotmix_detail`
--
ALTER TABLE `tbl_master_hotmix_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_master_hotmix_grafik`
--
ALTER TABLE `tbl_master_hotmix_grafik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_petugaslab`
--
ALTER TABLE `tbl_petugaslab`
  ADD PRIMARY KEY (`id_petugasLab`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity_log`
--
ALTER TABLE `tbl_activity_log`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_data`
--
ALTER TABLE `tbl_data`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_jenis_laporan`
--
ALTER TABLE `tbl_jenis_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_master_hotmix_analisabutir`
--
ALTER TABLE `tbl_master_hotmix_analisabutir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_master_hotmix_detail`
--
ALTER TABLE `tbl_master_hotmix_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_master_hotmix_grafik`
--
ALTER TABLE `tbl_master_hotmix_grafik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_petugaslab`
--
ALTER TABLE `tbl_petugaslab`
  MODIFY `id_petugasLab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
