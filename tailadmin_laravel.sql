-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2026 at 12:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailadmin_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nup` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` date DEFAULT NULL,
  `jenis_barang` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `satuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'buah',
  `lokasi` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab_id` bigint UNSIGNED DEFAULT NULL,
  `status_kondisi` enum('Baik','Rusak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Baik',
  `spesifikasi` text COLLATE utf8mb4_unicode_ci,
  `foto_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `kode_barang`, `nama_barang`, `merk_type`, `nup`, `tgl_terima`, `jenis_barang`, `satuan`, `lokasi`, `penanggung_jawab_id`, `status_kondisi`, `spesifikasi`, `foto_barang`) VALUES
(1, 'BRG-001', 'Laptop Operasional', 'Lenovo ThinkPad T14', '001', '2023-01-10', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(2, 'BRG-002', 'Laptop Operasional', 'Lenovo ThinkPad T14', '002', '2023-01-10', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(3, 'BRG-003', 'Laptop Operasional', 'Lenovo ThinkPad T14', '003', '2023-01-10', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(4, 'BRG-004', 'Laptop Operasional', 'Lenovo ThinkPad T14', '004', '2023-01-10', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(5, 'BRG-005', 'Laptop Operasional', 'Lenovo ThinkPad T14', '005', '2023-01-10', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(6, 'BRG-006', 'Laptop Operasional', 'Lenovo ThinkPad T14', '006', '2023-01-10', 'Elektronik', 'buah', 'Ruang Bidang Umum', 3, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(7, 'BRG-007', 'Laptop Operasional', 'Lenovo ThinkPad T14', '007', '2023-01-10', 'Elektronik', 'buah', 'Ruang Bidang Umum', 3, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(8, 'BRG-008', 'Laptop Operasional', 'Lenovo ThinkPad T14', '008', '2023-01-10', 'Elektronik', 'buah', 'Ruang Bidang Umum', 3, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(9, 'BRG-009', 'Laptop Operasional', 'Lenovo ThinkPad T14', '009', '2023-01-10', 'Elektronik', 'buah', 'Ruang Bidang Umum', 3, 'Baik', 'Intel Core i5, 16GB RAM, 512GB SSD', NULL),
(10, 'BRG-010', 'Laptop Operasional', 'Lenovo ThinkPad T14', '010', '2023-01-10', 'Elektronik', 'buah', 'Ruang Bidang Umum', 3, 'Rusak', 'Layar bergaris, Intel Core i5', NULL),
(11, 'BRG-011', 'PC Desktop', 'Dell OptiPlex 7090', '011', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(12, 'BRG-012', 'PC Desktop', 'Dell OptiPlex 7090', '012', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(13, 'BRG-013', 'PC Desktop', 'Dell OptiPlex 7090', '013', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(14, 'BRG-014', 'PC Desktop', 'Dell OptiPlex 7090', '014', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(15, 'BRG-015', 'PC Desktop', 'Dell OptiPlex 7090', '015', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(16, 'BRG-016', 'PC Desktop', 'Dell OptiPlex 7090', '016', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(17, 'BRG-017', 'PC Desktop', 'Dell OptiPlex 7090', '017', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(18, 'BRG-018', 'PC Desktop', 'Dell OptiPlex 7090', '018', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(19, 'BRG-019', 'PC Desktop', 'Dell OptiPlex 7090', '019', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Rusak', 'Mati total, PSU bermasalah', NULL),
(20, 'BRG-020', 'PC Desktop', 'Dell OptiPlex 7090', '020', '2023-03-15', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Intel Core i7, 8GB RAM, 1TB HDD', NULL),
(21, 'BRG-021', 'Printer InkTank', 'Epson L3110', '021', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Print, Scan, Copy', NULL),
(22, 'BRG-022', 'Printer InkTank', 'Epson L3110', '022', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Print, Scan, Copy', NULL),
(23, 'BRG-023', 'Printer InkTank', 'Epson L3110', '023', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Print, Scan, Copy', NULL),
(24, 'BRG-024', 'Printer InkTank', 'Epson L3110', '024', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Print, Scan, Copy', NULL),
(25, 'BRG-025', 'Printer InkTank', 'Epson L3110', '025', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Print, Scan, Copy', NULL),
(26, 'BRG-026', 'Printer InkTank', 'Epson L3110', '026', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Print, Scan, Copy', NULL),
(27, 'BRG-027', 'Printer InkTank', 'Epson L3110', '027', '2024-02-20', 'Elektronik', 'buah', 'Ruang Tata Usaha', 3, 'Rusak', 'Head buntu, tinta tidak keluar', NULL),
(28, 'BRG-028', 'Printer InkTank', 'Epson L3110', '028', '2024-02-20', 'Elektronik', 'buah', 'Ruang Rapat', 1, 'Baik', 'Print, Scan, Copy', NULL),
(29, 'BRG-029', 'Printer InkTank', 'Epson L3110', '029', '2024-02-20', 'Elektronik', 'buah', 'Ruang Rapat', 1, 'Baik', 'Print, Scan, Copy', NULL),
(30, 'BRG-030', 'Printer InkTank', 'Epson L3110', '030', '2024-02-20', 'Elektronik', 'buah', 'Ruang Rapat', 1, 'Baik', 'Print, Scan, Copy', NULL),
(31, 'BRG-031', 'Monitor 24 Inch', 'LG 24MP400', '031', '2023-05-11', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(32, 'BRG-032', 'Monitor 24 Inch', 'LG 24MP400', '032', '2023-05-11', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(33, 'BRG-033', 'Monitor 24 Inch', 'LG 24MP400', '033', '2023-05-11', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(34, 'BRG-034', 'Monitor 24 Inch', 'LG 24MP400', '034', '2023-05-11', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(35, 'BRG-035', 'Monitor 24 Inch', 'LG 24MP400', '035', '2023-05-11', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(36, 'BRG-036', 'Monitor 24 Inch', 'LG 24MP400', '036', '2023-05-11', 'Elektronik', 'buah', 'Ruang Pelayanan', 3, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(37, 'BRG-037', 'Monitor 24 Inch', 'LG 24MP400', '037', '2023-05-11', 'Elektronik', 'buah', 'Ruang Pelayanan', 3, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(38, 'BRG-038', 'Monitor 24 Inch', 'LG 24MP400', '038', '2023-05-11', 'Elektronik', 'buah', 'Ruang Pelayanan', 3, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(39, 'BRG-039', 'Monitor 24 Inch', 'LG 24MP400', '039', '2023-05-11', 'Elektronik', 'buah', 'Ruang Pelayanan', 3, 'Rusak', 'Layar retak/pecah', NULL),
(40, 'BRG-040', 'Monitor 24 Inch', 'LG 24MP400', '040', '2023-05-11', 'Elektronik', 'buah', 'Ruang Pelayanan', 3, 'Baik', 'IPS Panel, 75Hz, FHD', NULL),
(41, 'BRG-041', 'Proyektor', 'Epson EB-X06', '041', '2023-08-05', 'Elektronik', 'buah', 'Ruang Rapat Utama', 1, 'Baik', '3600 Lumens, XGA', NULL),
(42, 'BRG-042', 'Proyektor', 'Epson EB-X06', '042', '2023-08-05', 'Elektronik', 'buah', 'Ruang Rapat Utama', 1, 'Baik', '3600 Lumens, XGA', NULL),
(43, 'BRG-043', 'Proyektor', 'Epson EB-X06', '043', '2023-08-05', 'Elektronik', 'buah', 'Ruang Rapat Utama', 1, 'Baik', '3600 Lumens, XGA', NULL),
(44, 'BRG-044', 'Proyektor', 'Epson EB-X06', '044', '2023-08-05', 'Elektronik', 'buah', 'Ruang Aula', 1, 'Baik', '3600 Lumens, XGA', NULL),
(45, 'BRG-045', 'Proyektor', 'Epson EB-X06', '045', '2023-08-05', 'Elektronik', 'buah', 'Ruang Aula', 1, 'Baik', '3600 Lumens, XGA', NULL),
(46, 'BRG-046', 'Proyektor', 'Epson EB-X06', '046', '2023-08-05', 'Elektronik', 'buah', 'Ruang Bidang', 2, 'Rusak', 'Lampu proyektor redup', NULL),
(47, 'BRG-047', 'Proyektor', 'Epson EB-X06', '047', '2023-08-05', 'Elektronik', 'buah', 'Ruang Bidang', 2, 'Baik', '3600 Lumens, XGA', NULL),
(48, 'BRG-048', 'Proyektor', 'Epson EB-X06', '048', '2023-08-05', 'Elektronik', 'buah', 'Ruang Bidang', 2, 'Baik', '3600 Lumens, XGA', NULL),
(49, 'BRG-049', 'Proyektor', 'Epson EB-X06', '049', '2023-08-05', 'Elektronik', 'buah', 'Ruang Bidang', 2, 'Baik', '3600 Lumens, XGA', NULL),
(50, 'BRG-050', 'Proyektor', 'Epson EB-X06', '050', '2023-08-05', 'Elektronik', 'buah', 'Ruang Bidang', 2, 'Baik', '3600 Lumens, XGA', NULL),
(51, 'BRG-051', 'Switch Jaringan', 'Cisco Catalyst 2960', '051', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', '24 Port Gigabit, Managed', NULL),
(52, 'BRG-052', 'Switch Jaringan', 'Cisco Catalyst 2960', '052', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', '24 Port Gigabit, Managed', NULL),
(53, 'BRG-053', 'Switch Jaringan', 'Cisco Catalyst 2960', '053', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', '24 Port Gigabit, Managed', NULL),
(54, 'BRG-054', 'Switch Jaringan', 'Cisco Catalyst 2960', '054', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', '24 Port Gigabit, Managed', NULL),
(55, 'BRG-055', 'Switch Jaringan', 'Cisco Catalyst 2960', '055', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', '24 Port Gigabit, Managed', NULL),
(56, 'BRG-056', 'Router Board', 'MikroTik RB750Gr3', '056', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', 'Hex, 5 Port Gigabit', NULL),
(57, 'BRG-057', 'Router Board', 'MikroTik RB750Gr3', '057', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', 'Hex, 5 Port Gigabit', NULL),
(58, 'BRG-058', 'Router Board', 'MikroTik RB750Gr3', '058', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Rusak', 'Port 1 terbakar', NULL),
(59, 'BRG-059', 'Router Board', 'MikroTik RB750Gr3', '059', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', 'Hex, 5 Port Gigabit', NULL),
(60, 'BRG-060', 'Router Board', 'MikroTik RB750Gr3', '060', '2024-01-20', 'Jaringan', 'buah', 'Ruang Server', 2, 'Baik', 'Hex, 5 Port Gigabit', NULL),
(61, 'BRG-061', 'Kursi Kerja', 'Ergotec 808', '061', '2022-11-10', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(62, 'BRG-062', 'Kursi Kerja', 'Ergotec 808', '062', '2022-11-10', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(63, 'BRG-063', 'Kursi Kerja', 'Ergotec 808', '063', '2022-11-10', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(64, 'BRG-064', 'Kursi Kerja', 'Ergotec 808', '064', '2022-11-10', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(65, 'BRG-065', 'Kursi Kerja', 'Ergotec 808', '065', '2022-11-10', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(66, 'BRG-066', 'Kursi Kerja', 'Ergotec 808', '066', '2022-11-10', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Rusak', 'Roda patah', NULL),
(67, 'BRG-067', 'Kursi Kerja', 'Ergotec 808', '067', '2022-11-10', 'Furnitur', 'buah', 'Ruang IT', 2, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(68, 'BRG-068', 'Kursi Kerja', 'Ergotec 808', '068', '2022-11-10', 'Furnitur', 'buah', 'Ruang IT', 2, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(69, 'BRG-069', 'Kursi Kerja', 'Ergotec 808', '069', '2022-11-10', 'Furnitur', 'buah', 'Ruang IT', 2, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(70, 'BRG-070', 'Kursi Kerja', 'Ergotec 808', '070', '2022-11-10', 'Furnitur', 'buah', 'Ruang IT', 2, 'Baik', 'Kursi hidrolik, jaring hitam', NULL),
(71, 'BRG-071', 'Meja Kerja', 'IKEA Bekant', '071', '2022-11-15', 'Furnitur', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Meja putih 120x80cm', NULL),
(72, 'BRG-072', 'Meja Kerja', 'IKEA Bekant', '072', '2022-11-15', 'Furnitur', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Meja putih 120x80cm', NULL),
(73, 'BRG-073', 'Meja Kerja', 'IKEA Bekant', '073', '2022-11-15', 'Furnitur', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Meja putih 120x80cm', NULL),
(74, 'BRG-074', 'Meja Kerja', 'IKEA Bekant', '074', '2022-11-15', 'Furnitur', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Meja putih 120x80cm', NULL),
(75, 'BRG-075', 'Meja Kerja', 'IKEA Bekant', '075', '2022-11-15', 'Furnitur', 'buah', 'Ruang Pelayanan', 1, 'Baik', 'Meja putih 120x80cm', NULL),
(76, 'BRG-076', 'Meja Kerja', 'IKEA Bekant', '076', '2022-11-15', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Meja putih 120x80cm', NULL),
(77, 'BRG-077', 'Meja Kerja', 'IKEA Bekant', '077', '2022-11-15', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Meja putih 120x80cm', NULL),
(78, 'BRG-078', 'Meja Kerja', 'IKEA Bekant', '078', '2022-11-15', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Meja putih 120x80cm', NULL),
(79, 'BRG-079', 'Meja Kerja', 'IKEA Bekant', '079', '2022-11-15', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Meja putih 120x80cm', NULL),
(80, 'BRG-080', 'Meja Kerja', 'IKEA Bekant', '080', '2022-11-15', 'Furnitur', 'buah', 'Ruang Tata Usaha', 3, 'Baik', 'Meja putih 120x80cm', NULL),
(81, 'BRG-081', 'Scanner Dokumen', 'Fujitsu ScanSnap', '081', '2023-06-25', 'Elektronik', 'buah', 'Ruang Arsip', 3, 'Baik', 'ADF Scanner 50ppm', NULL),
(82, 'BRG-082', 'Scanner Dokumen', 'Fujitsu ScanSnap', '082', '2023-06-25', 'Elektronik', 'buah', 'Ruang Arsip', 3, 'Baik', 'ADF Scanner 50ppm', NULL),
(83, 'BRG-083', 'Scanner Dokumen', 'Fujitsu ScanSnap', '083', '2023-06-25', 'Elektronik', 'buah', 'Ruang Arsip', 3, 'Baik', 'ADF Scanner 50ppm', NULL),
(84, 'BRG-084', 'Scanner Dokumen', 'Fujitsu ScanSnap', '084', '2023-06-25', 'Elektronik', 'buah', 'Ruang Arsip', 3, 'Rusak', 'Roll penarik kertas macet', NULL),
(85, 'BRG-085', 'Scanner Dokumen', 'Fujitsu ScanSnap', '085', '2023-06-25', 'Elektronik', 'buah', 'Ruang Arsip', 3, 'Baik', 'ADF Scanner 50ppm', NULL),
(86, 'BRG-086', 'AC Split', 'Daikin 1 PK', '086', '2021-09-01', 'Elektronik', 'buah', 'Ruang Rapat', 1, 'Baik', 'Inverter R32', NULL),
(87, 'BRG-087', 'AC Split', 'Daikin 1 PK', '087', '2021-09-01', 'Elektronik', 'buah', 'Ruang Rapat', 1, 'Baik', 'Inverter R32', NULL),
(88, 'BRG-088', 'AC Split', 'Daikin 1 PK', '088', '2021-09-01', 'Elektronik', 'buah', 'Ruang Server', 2, 'Baik', 'Inverter R32', NULL),
(89, 'BRG-089', 'AC Split', 'Daikin 1 PK', '089', '2021-09-01', 'Elektronik', 'buah', 'Ruang Server', 2, 'Rusak', 'Bocor Freon', NULL),
(90, 'BRG-090', 'AC Split', 'Daikin 1 PK', '090', '2021-09-01', 'Elektronik', 'buah', 'Ruang IT', 2, 'Baik', 'Inverter R32', NULL),
(91, 'BRG-091', 'UPS', 'APC Back-UPS', '091', '2023-11-20', 'Elektronik', 'buah', 'Ruang Server', 2, 'Baik', '1200VA', NULL),
(92, 'BRG-092', 'UPS', 'APC Back-UPS', '092', '2023-11-20', 'Elektronik', 'buah', 'Ruang Server', 2, 'Baik', '1200VA', NULL),
(93, 'BRG-093', 'UPS', 'APC Back-UPS', '093', '2023-11-20', 'Elektronik', 'buah', 'Ruang Server', 2, 'Baik', '1200VA', NULL),
(94, 'BRG-094', 'UPS', 'APC Back-UPS', '094', '2023-11-20', 'Elektronik', 'buah', 'Ruang Server', 2, 'Baik', '1200VA', NULL),
(95, 'BRG-095', 'UPS', 'APC Back-UPS', '095', '2023-11-20', 'Elektronik', 'buah', 'Ruang Server', 2, 'Baik', '1200VA', NULL),
(96, 'BRG-096', 'UPS', 'APC Back-UPS', '096', '2023-11-20', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', '1200VA', NULL),
(97, 'BRG-097', 'UPS', 'APC Back-UPS', '097', '2023-11-20', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', '1200VA', NULL),
(98, 'BRG-098', 'UPS', 'APC Back-UPS', '098', '2023-11-20', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', '1200VA', NULL),
(99, 'BRG-099', 'UPS', 'APC Back-UPS', '099', '2023-11-20', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Rusak', 'Baterai drop', NULL),
(100, 'BRG-100', 'UPS', 'APC Back-UPS', '100', '2023-11-20', 'Elektronik', 'buah', 'Ruang Pelayanan', 1, 'Baik', '1200VA', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banjar_captchas`
--

CREATE TABLE `banjar_captchas` (
  `id` bigint UNSIGNED NOT NULL,
  `kata_banjar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arti_indonesia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banjar_captchas`
--

INSERT INTO `banjar_captchas` (`id`, `kata_banjar`, `arti_indonesia`, `created_at`, `updated_at`) VALUES
(1, 'Banyu', 'Air', NULL, NULL),
(2, 'Ganal', 'Besar', NULL, NULL),
(3, 'Rancak', 'Sering', NULL, NULL),
(4, 'Bepander', 'Bicara', NULL, NULL),
(5, 'Supan', 'Malu', NULL, NULL),
(6, 'Bujur', 'Benar', NULL, NULL),
(7, 'Iwak', 'Ikan', NULL, NULL),
(8, 'Kuitan', 'Orang tua', NULL, NULL),
(9, 'Dangsanak', 'Saudara', NULL, NULL),
(10, 'Tapas', 'Cuci', NULL, NULL),
(11, 'Ampih', 'Berhenti / Selesai', NULL, NULL),
(12, 'Anum', 'Muda', NULL, NULL),
(13, 'Hanyar', 'Baru', NULL, NULL),
(14, 'Arap', 'Harap / Mengira', NULL, NULL),
(15, 'Awak', 'Badan / Tubuh', NULL, NULL),
(16, 'Ayungku', 'Milik saya / Kepunyaan saya', NULL, NULL),
(17, 'Baelang', 'Bertamu / Berkunjung', NULL, NULL),
(18, 'Bahindang', 'Berkilau / Menyala terang', NULL, NULL),
(19, 'Bakarah', 'Bertengkar / Berselisih', NULL, NULL),
(20, 'Bakul', 'Keranjang anyaman', NULL, NULL),
(21, 'Balajar', 'Belajar', NULL, NULL),
(22, 'Balik', 'Kembali / Pulang', NULL, NULL),
(23, 'Bapandir', 'Berbicara / Mengobrol', NULL, NULL),
(24, 'Barakat', 'Berkat / Manfaat', NULL, NULL),
(25, 'Batakun', 'Bertanya', NULL, NULL),
(26, 'Bauntung', 'Beruntung / Mujur', NULL, NULL),
(27, 'Bungas', 'Cantik / Tampan / Rupawan', NULL, NULL),
(28, 'Calap', 'Tergenang air / Banjir dangkal', NULL, NULL),
(29, 'Cangkal', 'Rajin / Giat / Ulet', NULL, NULL),
(30, 'Cucuk', 'Cocok / Sesuai / Pas', NULL, NULL),
(31, 'Cuntan', 'Curi / Mencuri', NULL, NULL),
(32, 'Daling', 'Miring / Condong', NULL, NULL),
(33, 'Gair', 'Takut / Cemas / Khawatir', NULL, NULL),
(34, 'Gancang', 'Kuat / Bertenaga / Kencang', NULL, NULL),
(35, 'Garit', 'Gores / Cakar', NULL, NULL),
(36, 'Guring', 'Tidur', NULL, NULL),
(37, 'Handak', 'Mau / Ingin / Hendak', NULL, NULL),
(38, 'Haram', 'Diam / Tenang / Tidak berkutik', NULL, NULL),
(39, 'Haur', 'Sibuk / Banyak urusan', NULL, NULL),
(40, 'Himung', 'Senang / Gembira / Bahagia', NULL, NULL),
(41, 'Inya', 'Dia / Ia', NULL, NULL),
(42, 'Jagau', 'Jagoan / Pemberani', NULL, NULL),
(43, 'Jaka', 'Seandainya / Jikalau', NULL, NULL),
(44, 'Jumbatan', 'Jembatan', NULL, NULL),
(45, 'Kada', 'Tidak / Bukan', NULL, NULL),
(46, 'Kaina', 'Nanti / Sebentar lagi', NULL, NULL),
(47, 'Kancang', 'Erat / Kuat / Kencang', NULL, NULL),
(48, 'Kawa', 'Bisa / Sanggup / Mampu', NULL, NULL),
(49, 'Ketuju', 'Suka / Gemar / Senang', NULL, NULL),
(50, 'Kiwa', 'Kiri', NULL, NULL),
(51, 'Kuyahi', 'Memberi garam / Membumbui', NULL, NULL),
(52, 'Lawas', 'Lama / Kuno', NULL, NULL),
(53, 'Lawang', 'Pintu', NULL, NULL),
(54, 'Lunuk', 'Lembek / Lunak', NULL, NULL),
(55, 'Mandi', 'Mandi', NULL, NULL),
(56, 'Maras', 'Kasihan / Iba', NULL, NULL),
(57, 'Mun', 'Kalau / Jika', NULL, NULL),
(58, 'Nang', 'Yang (kata hubung)', NULL, NULL),
(59, 'Nyaman', 'Enak / Sedap / Nyaman', NULL, NULL),
(60, 'Padah', 'Beritahu / Bilang', NULL, NULL),
(61, 'Paluh', 'Keringat', NULL, NULL),
(62, 'Pamalar', 'Pelit / Kikir', NULL, NULL),
(63, 'Pian', 'Anda / Kamu (bentuk sopan)', NULL, NULL),
(64, 'Rigat', 'Kotor', NULL, NULL),
(65, 'Rakat', 'Rukun / Akur / Guyub', NULL, NULL),
(66, 'Saing', 'Saing / Bersaing', NULL, NULL),
(67, 'Sambat', 'Sebut / Ucapkan', NULL, NULL),
(68, 'Sangkal', 'Kesal / Jengkel / Gondok', NULL, NULL),
(69, 'Sungsang', 'Terbalik / Jungkir balik', NULL, NULL),
(70, 'Tapih', 'Sarung', NULL, NULL),
(71, 'Tulak', 'Berangkat / Pergi', NULL, NULL),
(72, 'Ulun', 'Saya / Hamba (bentuk santun)', NULL, NULL),
(73, 'Unda', 'Aku / Gua (ragam akrab)', NULL, NULL),
(74, 'Wadai', 'Kue tradisional', NULL, NULL),
(75, 'Waluh', 'Labu parang / Dusta (slang)', NULL, NULL),
(76, 'Abut', 'Ribut / Gaduh / Heboh', NULL, NULL),
(77, 'Acan', 'Terasi', NULL, NULL),
(78, 'Ading', 'Adik', NULL, NULL),
(79, 'Ambin', 'Teras / Serambi rumah', NULL, NULL),
(80, 'Ampah', 'Arah / Menuju ke', NULL, NULL),
(81, 'Ampar', 'Hampar / Membentangkan tikar', NULL, NULL),
(82, 'Ancap', 'Cepat / Lekas / Bergegas', NULL, NULL),
(83, 'Andak', 'Meletakkan / Menaruh', NULL, NULL),
(84, 'Angsul', 'Uang kembalian belanja', NULL, NULL),
(85, 'Apik', 'Rapi / Bersih / Cermat', NULL, NULL),
(86, 'Aruh', 'Kenduri / Selamatan / Pesta', NULL, NULL),
(87, 'Asaan', 'Canggung / Segan / Ragu-ragu', NULL, NULL),
(88, 'Awit', 'Awet / Tahan lama', NULL, NULL),
(89, 'Baaci', 'Bersiap-siap / Memulai sungguh-sungguh', NULL, NULL),
(90, 'Baampik', 'Bertepuk tangan', NULL, NULL),
(91, 'Babaya', 'Hampir / Nyaris / Bersamaan', NULL, NULL),
(92, 'Badadas', 'Bersegera / Terburu-buru', NULL, NULL),
(93, 'Bagana', 'Diam / Tinggal / Menetap', NULL, NULL),
(94, 'Bahimat', 'Bersungguh-sungguh / Sekuat tenaga', NULL, NULL),
(95, 'Bahari', 'Zaman dahulu / Kuno', NULL, NULL),
(96, 'Baisukan', 'Pagi hari', NULL, NULL),
(97, 'Bajuang', 'Berjuang / Bekerja keras', NULL, NULL),
(98, 'Bakuliling', 'Berkeliling / Memutar', NULL, NULL),
(99, 'Balalah', 'Bepergian / Merantau / Keluyuran', NULL, NULL),
(100, 'Baluman', 'Belum', NULL, NULL),
(101, 'Bapara', 'Mendekat / Menghampiri', NULL, NULL),
(102, 'Bapicik', 'Memijat / Menekan', NULL, NULL),
(103, 'Barinjam', 'Meminjam', NULL, NULL),
(104, 'Basanga', 'Menggoreng', NULL, NULL),
(105, 'Basaruan', 'Mengundang / Hajatan', NULL, NULL),
(106, 'Batatapas', 'Mencuci pakaian', NULL, NULL),
(107, 'Baunggut', 'Mengangguk-angguk', NULL, NULL),
(108, 'Bini', 'Istri / Perempuan', NULL, NULL),
(109, 'Buhannya', 'Mereka / Rombongan mereka', NULL, NULL),
(110, 'Bungkar', 'Bongkar / Membuka paksa', NULL, NULL),
(111, 'Butah', 'Buta / Tidak melihat', NULL, NULL),
(112, 'Cangang', 'Menatap / Memandang tajam', NULL, NULL),
(113, 'Cangkar', 'Keras / Kaku', NULL, NULL),
(114, 'Cariu', 'Nyaring / Melengking (suara)', NULL, NULL),
(115, 'Cilum', 'Menyelam', NULL, NULL),
(116, 'Culik', 'Mencolek / Mengambil sedikit', NULL, NULL),
(117, 'Dalu', 'Larut malam / Tengah malam', NULL, NULL),
(118, 'Damini', 'Sekarang / Masa kini', NULL, NULL),
(119, 'Dingin', 'Dingin / Sejuk', NULL, NULL),
(120, 'Duduk', 'Duduk', NULL, NULL),
(121, 'Dusta', 'Bohong / Tidak benar', NULL, NULL),
(122, 'Gagah', 'Kuat / Gagah perkasa', NULL, NULL),
(123, 'Gani\'i', 'Membantu / Menemani', NULL, NULL),
(124, 'Garunum', 'Bergumam / Menggerutu', NULL, NULL),
(125, 'Gigi', 'Gigi', NULL, NULL),
(126, 'Gumbili', 'Singkong / Ubi kayu', NULL, NULL),
(127, 'Guyur', 'Menyiram / Mengguyur air', NULL, NULL),
(128, 'Halu', 'Alu / Penumbuk padi', NULL, NULL),
(129, 'Halus', 'Kecil / Halus', NULL, NULL),
(130, 'Hanta', 'Tawar / Kurang rasa / Hambar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_bidang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `nama_bidang`) VALUES
(1, 'Umum (Tata Usaha)'),
(2, 'Pengawasan'),
(3, 'Regulasi'),
(4, 'Sumber Daya Manusia');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba', 'i:1;', 1793758177),
('laravel-cache-5c785c036466adea360111aa28563bfd556b5fba:timer', 'i:1793758177;', 1793758177),
('laravel-cache-dashboard_admin_metrics', 'a:15:{s:13:\"totalIncident\";i:115;s:12:\"totalRequest\";i:92;s:14:\"statusIncident\";a:4:{s:15:\"Belum diperiksa\";i:31;s:15:\"Sedang diproses\";i:23;s:7:\"Selesai\";i:35;s:7:\"Ditolak\";i:26;}s:10:\"statsDelta\";a:2:{s:8:\"incident\";a:2:{s:5:\"value\";i:1;s:5:\"delta\";d:0;}s:7:\"request\";a:2:{s:5:\"value\";i:3;s:5:\"delta\";d:200;}}s:12:\"totalSelesai\";i:53;s:15:\"selesaiIncident\";i:35;s:14:\"selesaiRequest\";i:18;s:11:\"last6Months\";a:6:{i:0;s:8:\"Jun 2026\";i:1;s:8:\"Jul 2026\";i:2;s:8:\"Agt 2026\";i:3;s:8:\"Sep 2026\";i:4;s:8:\"Okt 2026\";i:5;s:8:\"Nov 2026\";}s:13:\"incidentTrend\";a:6:{i:0;i:15;i:1;i:22;i:2;i:16;i:3;i:19;i:4;i:15;i:5;i:1;}s:12:\"requestTrend\";a:6:{i:0;i:11;i:1;i:13;i:2;i:12;i:3;i:14;i:4;i:19;i:5;i:3;}s:14:\"resolutionData\";a:2:{s:6:\"labels\";a:2:{i:0;s:7:\"mandiri\";i:1;s:10:\"Pihak ke-3\";}s:4:\"data\";a:2:{i:0;i:27;i:1;i:31;}}s:11:\"layananData\";a:2:{s:6:\"labels\";a:7:{i:0;s:7:\"Lainnya\";i:1;s:13:\"Konsultasi IT\";i:2;s:12:\"Zoom Meeting\";i:3;s:14:\"Operator Rapat\";i:4;s:14:\"Reset Password\";i:5;s:11:\"Tambah Akun\";i:6;s:13:\"Akun Aplikasi\";}s:4:\"data\";a:7:{i:0;i:11;i:1;i:1;i:2;i:40;i:3;i:2;i:4;i:1;i:5;i:1;i:6;i:36;}}s:17:\"requestStatusData\";a:2:{s:6:\"labels\";a:4:{i:0;s:8:\"Diajukan\";i:1;s:8:\"Diproses\";i:2;s:7:\"Selesai\";i:3;s:7:\"Ditolak\";}s:4:\"data\";a:4:{i:0;i:32;i:1;i:24;i:2;i:18;i:3;i:18;}}s:16:\"jenisKendalaData\";a:2:{s:6:\"labels\";a:2:{i:0;s:17:\"Aset / Barang TIK\";i:1;s:18:\"Lainnya (Non-Aset)\";}s:4:\"data\";a:2:{i:0;i:115;i:1;i:0;}}s:14:\"availableYears\";a:3:{i:0;i:2026;i:1;i:2025;i:2;i:2024;}}', 1793760162);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jabatan` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`) VALUES
(1, 'Kepala Bidang'),
(2, 'Kasubag'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_bases`
--

CREATE TABLE `knowledge_bases` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ringkasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `solusi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `helpful_yes` int UNSIGNED NOT NULL DEFAULT '0',
  `helpful_no` int UNSIGNED NOT NULL DEFAULT '0',
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `created_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `knowledge_bases`
--

INSERT INTO `knowledge_bases` (`id`, `judul`, `slug`, `kategori`, `ringkasan`, `solusi`, `gambar`, `is_published`, `helpful_yes`, `helpful_no`, `views`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cara Mengatasi Printer Canon / Epson Status Offline pada Windows', 'cara-mengatasi-printer-status-offline-windows', 'Hardware & Printer', 'Panduan cepat mengatasi printer yang terdeteksi \"Offline\" atau antrean cetak tersangkut (spooler error).', 'Kendala printer offline sering kali disebabkan oleh kabel USB/koneksi LAN longgar, atau layanan print spooler Windows yang berhenti berjalan.\n\nBerikut langkah perbaikan mandiri:\n1. **Periksa Fisik Kabel & Daya**:\n   - Pastikan kabel daya printer menyala (lampu indikator hijau stabil).\n   - Cabut dan pasang kembali kabel USB printer ke port USB yang berbeda di komputer/laptop.\n2. **Restart Layanan Print Spooler**:\n   - Tekan tombol **Windows + R** pada keyboard.\n   - Ketik `services.msc` lalu tekan **Enter**.\n   - Cari layanan bernama **Print Spooler**.\n   - Klik kanan pada **Print Spooler**, lalu pilih **Restart**.\n3. **Ubah Status Printer Menjadi Online**:\n   - Buka **Control Panel > Devices and Printers** (atau *Settings > Bluetooth & devices > Printers & scanners*).\n   - Klik kanan pada printer Anda, pilih **See what\'s printing**.\n   - Pada menu bar jendela antrean, klik tab **Printer**, dan pastikan opsi **Use Printer Offline** TIDAK dicentang.\n4. **Coba Cetak Test Page**:\n   - Lakukan cetak dokumen percobaan. Jika kertas keluar normal, kendala telah teratasi.', NULL, 1, 12, 1, 45, 1, '2026-10-20 19:39:56', '2026-10-20 19:39:56'),
(2, 'Panduan Menghubungkan Laptop Pegawai ke Jaringan Wi-Fi BPOM-Secure', 'panduan-koneksi-wifi-bpom-secure', 'Jaringan & Internet', 'Langkah autentikasi Wi-Fi resmi kantor BPOM menggunakan akun NIP / email pegawai.', 'Jaringan Wi-Fi BPOM-Secure menggunakan protokol keamanan WPA2-Enterprise yang mewajibkan autentikasi akun resmi pegawai BPOM.\n\nLangkah-langkah koneksi:\n1. Klik ikon Wi-Fi di pojok kanan bawah taskbar Windows.\n2. Pilih SSID **BPOM-Secure** lalu klik **Connect**.\n3. Saat diminta kredensial:\n   - **Username**: Masukkan NIP Anda (tanpa spasi).\n   - **Password**: Masukkan kata sandi akun email/portal SSO BPOM Anda.\n4. Jika muncul notifikasi sertifikat server (*Continue connecting?*), klik tombol **Connect / Lanjutkan**.\n5. Tunggu 5-10 detik hingga status berubah menjadi **Connected, secured**.\n6. Apabila gagal terhubung (status *Can\'t connect to this network*), klik kanan SSID BPOM-Secure, pilih **Forget**, lalu hubungkan ulang dari langkah 1.', NULL, 1, 28, 0, 89, 1, '2026-10-20 19:39:56', '2026-10-20 19:39:56'),
(3, 'Tata Cara Reset Mandiri Password Akun Aplikasi SSO BPOM', 'tata-cara-reset-mandiri-password-sso-bpom', 'Akun & Akses', 'Prosedur pemulihan kata sandi akun SSO mandiri bila lupa sandi atau akun terkunci.', 'Jika Anda lupa kata sandi akun SSO BPOM, Anda dapat meresetnya secara mandiri tanpa harus menunggu tiket IT diproses:\n\nLangkah-langkah reset kata sandi:\n1. Buka portal login resmi BPOM di peramban (browser).\n2. Di bawah form isian login, klik tautan **Lupa Password?** atau *Forgot Password*.\n3. Masukkan **NIP** atau **Email resmi BPOM** Anda yang terdaftar pada sistem kepegawaian.\n4. Masukkan kode Captcha yang tampil di layar, lalu klik tombol **Kirim Tautan Reset**.\n5. Buka kotak masuk email dinas Anda (cek juga folder *Spam / Junk*).\n6. Buka email dari *Admin IT BPOM* dan klik tautan **Atur Ulang Kata Sandi**.\n7. Buat kata sandi baru dengan ketentuan:\n   - Minimal 8 karakter.\n   - Mengandung kombinasi huruf besar, huruf kecil, dan angka.\n8. Simpan dan coba login kembali dengan kata sandi yang baru.', NULL, 1, 19, 2, 67, 1, '2026-10-20 19:39:57', '2026-10-21 17:29:31'),
(4, 'Solusi Suara & Audio Zoom Meeting Tidak Terdengar saat Rapat Daring', 'solusi-audio-zoom-meeting-tidak-terdengar', 'Aplikasi BPOM', 'Mengatasi masalah speaker tidak bersuara atau mikrofon tidak masuk pada aplikasi Zoom Meeting.', 'Masalah suara pada Zoom sering terjadi karena perangkat output/input salah terpilih atau belum diberikan izin akses audio di Windows.\n\nLangkah-langkah penyelesaian:\n1. **Periksa Sambungan Audio Zoom**:\n   - Di pojok kiri bawah jendela Zoom, lihat ikon mikrofon.\n   - Jika ikonnya berupa headphone dengan panah hijau bertuliskan **Join Audio**, klik tombol tersebut dan pilih **Join with Computer Audio**.\n2. **Pilih Speaker yang Tepat**:\n   - Klik tanda panah kecil (^) di sebelah ikon Mikrofon.\n   - Di bagian **Select a Speaker**, pastikan dicentang ke speaker yang sedang aktif (misalnya *Realtek(R) Audio* atau *Headphones*, bukan monitor HDMI).\n   - Klik **Test Speaker & Microphone...** untuk mendengarkan nada dering uji coba.\n3. **Periksa Pengaturan Volume Windows**:\n   - Pastikan volume Windows tidak dalam kondisi Mute.\n   - Klik kanan ikon speaker di taskbar Windows > pilih **Open Volume Mixer** > pastikan slider volume untuk aplikasi Zoom berada di atas 70%.\n4. **Perizinan Mikrofon Windows**:\n   - Buka **Settings > Privacy & Security > Microphone**.\n   - Pastikan opsi **Microphone access** dan **Let desktop apps access your microphone** berada dalam posisi **ON**.', NULL, 1, 16, 1, 55, 1, '2026-10-20 19:39:57', '2026-10-26 16:06:13'),
(5, 'Panduan Mengatasi Browser Cache & Kendala Login Aplikasi Portal BPOM', 'panduan-mengatasi-browser-cache-portal-bpom', 'Aplikasi BPOM', 'Solusi tampilan halaman berantakan (*blank screen*) atau gagal login karena cache lama browser.', 'Ketika aplikasi web BPOM baru saja diperbarui versinya, browser sering kali masih menyimpan cache kode lama (*outdated scripts*), yang menyebabkan tombol tidak merespons atau halaman putih.\n\nLangkah-langkah membersihkan cache:\n1. **Hard Refresh Halaman**:\n   - Buka halaman portal aplikasi BPOM yang bermasalah.\n   - Tekan kombinasi tombol **Ctrl + F5** (atau **Ctrl + Shift + R**) secara bersamaan. Halaman akan dimuat ulang dengan aset terbaru.\n2. **Buka Melalui Mode Penyamaran (Incognito)**:\n   - Tekan **Ctrl + Shift + N** di Google Chrome / Microsoft Edge.\n   - Buka alamat portal aplikasi. Jika di mode Incognito berhasil normal, kendala dipastikan akibat cache browser lama.\n3. **Bersihkan Cache & Cookie Browser**:\n   - Di Google Chrome / Edge, tekan tombol **Ctrl + Shift + Delete**.\n   - Pilih rentang waktu: **All time (Semua waktu)**.\n   - Centang opsi:\n     - *Cookies and other site data*\n     - *Cached images and files*\n   - Klik tombol **Clear data (Hapus data)**.\n   - Tutup seluruh jendela browser, buka kembali, dan coba login.', NULL, 1, 24, 0, 80, 1, '2026-10-20 19:39:57', '2026-10-26 16:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `lokasis`
--

CREATE TABLE `lokasis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lokasi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasis`
--

INSERT INTO `lokasis` (`id`, `nama_lokasi`, `bidang_id`, `created_at`, `updated_at`) VALUES
(1, 'Ruang Staff Tata Usaha', 1, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(2, 'Ruang Staff Pengawasan', 2, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(3, 'Ruang Staff Regulasi', 3, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(4, 'Ruang Staff SDM', 4, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(5, 'Ruang Rapat Bidang Pengawasan', 2, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(6, 'Ruang Rapat Bidang Regulasi', 3, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(7, 'Ruang Rapat Utama', NULL, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(8, 'Aula BPOM', NULL, '2026-10-12 17:37:15', '2026-10-12 17:37:15'),
(9, 'Luar Kantor', NULL, '2026-10-12 17:37:15', '2026-10-12 17:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '2026_09_28_021525_create_sessions_table', 1),
(3, '2026_09_30_000001_create_itsm_schema_tables', 1),
(4, '2026_10_06_000000_add_soft_deletes_to_tickets_table', 2),
(5, '2026_10_06_000001_create_service_request_resolutions_table', 3),
(6, '2026_10_06_000002_add_foto_profil_to_users_table', 4),
(7, '2026_10_06_000200_make_arti_indonesia_nullable_on_banjar_captchas', 5),
(8, '2026_10_07_014633_create_notifications_table', 6),
(9, '2026_10_11_164604_add_email_and_password_to_req_detail_akun_table', 7),
(10, '2026_10_12_000001_create_service_request_chats_table', 8),
(11, '2026_10_12_000002_add_chat_control_and_completion_to_service_requests_table', 9),
(12, '2026_10_13_000001_create_lokasis_table', 10),
(13, '2026_10_14_000001_add_reported_by_to_tickets_and_service_requests', 11),
(14, '2026_10_19_000001_add_konfirmasi_selesai_to_service_requests_table', 12),
(15, '2026_10_19_000002_update_jenis_penyelesaian_in_ticket_resolutions_table', 13),
(16, '2026_10_20_000001_remove_vendor_and_estimasi_biaya_from_ticket_resolutions_table', 14),
(17, '2026_10_20_000002_add_tgl_acara_to_req_detail_zoom_table', 15),
(18, '2026_10_20_000003_cleanup_service_request_resolutions_columns_table', 15),
(19, '2026_10_21_000001_create_knowledge_bases_table', 16),
(20, '2026_10_21_042445_create_jobs_table', 17),
(21, '2026_10_21_042719_create_failed_jobs_table', 17),
(22, '2026_10_21_042725_create_settings_table', 17),
(23, '2026_10_22_000001_add_jenis_kendala_and_make_asset_id_nullable_on_tickets_table', 18),
(24, '2026_10_26_000001_drop_lokasi_from_service_requests_table', 19),
(25, '2026_10_27_000001_drop_zoom_columns_from_service_request_resolutions_table', 20),
(26, '2026_10_27_000002_update_service_requests_schema_and_clean_peminjaman', 21),
(27, '2026_10_27_000003_add_konfirmasi_selesai_to_tickets_table', 22),
(28, '2026_10_28_033610_drop_unused_columns_from_req_detail_akun_table', 23),
(29, '2026_10_29_000001_add_completed_at_and_is_konfirmasi_otomatis', 24);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('03b94033-5b95-4ac2-b9d9-d4ccfa733322', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan PNS membuat laporan kendala baru (TIK-20261007-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/103\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-06 22:28:49', '2026-10-06 22:28:49'),
('05db04df-9fba-4ea8-be0b-6658f345390f', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261014-0003) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/108\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-14 21:54:05', '2026-10-14 21:54:05'),
('063584f2-c4cc-4bf0-b05b-032dc4805db9', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261021-0004).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/120\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-20 21:08:38', '2026-10-20 21:08:38'),
('08a2547d-1d1f-491f-af14-4276a4d24808', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261102-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8001\\/requests\\/128\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8001\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-01 17:36:11', '2026-11-01 17:36:11'),
('0a275398-5fe0-4327-bd87-e0427c88b195', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261014-0006) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/113\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-18 22:55:01', '2026-10-18 22:55:01'),
('0e8f496d-6c7e-4bd2-a994-1203bfaa06f5', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0004).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/125\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:54:48', '2026-10-26 17:54:48'),
('11bb102d-d258-4c28-9f53-83ed6bd8dcf9', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/122\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:51:46', '2026-10-26 17:51:46'),
('129fedb2-170e-4061-ac10-fa12f9e3eb05', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan PNS membuat aduan kendala baru (TIK-20261104-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/118\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-11-03 18:13:32', '2026-11-03 18:13:32'),
('15d2b064-0546-4afa-8170-745fe9fde499', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261104-0001) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/118\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-11-03 18:29:17', '2026-11-03 18:29:17'),
('1e1c92ee-cbb0-4f02-9d1e-51ad800f7eca', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261014-0005).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/112\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:37:35', '2026-10-13 16:37:35'),
('1e5fc8e5-919f-47c3-8b84-f03373fdf9c5', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261027-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/117\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 18:18:56', '2026-10-26 18:18:56'),
('22e3999d-a56e-4024-8e73-6b42566048ef', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261014-0002).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/106\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:35:29', '2026-10-13 16:35:29'),
('23bedc18-9f3b-45a7-9557-549d6d19497f', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 1, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261105-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/119\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', '2026-11-04 16:52:22', '2026-11-04 16:49:56', '2026-11-04 16:52:22'),
('28903463-5976-4751-94ab-3b59c5ec91dc', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261015-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/114\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-14 23:12:22', '2026-10-14 23:12:22'),
('299fec47-4ebe-42a6-9dec-1b0bc2975695', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261014-0001).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/105\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:35:29', '2026-10-13 16:35:29'),
('2c41ea9f-c3f0-4683-8c7b-7f7754116e7d', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 1, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261109-0001) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-11-08 19:42:04', '2026-11-08 19:42:04'),
('3508e9a7-2b02-4f8a-8965-4650e73c9a97', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan PNS membuat aduan kendala baru (TIK-20261104-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/118\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-11-03 18:13:32', '2026-11-03 18:13:32'),
('35a25e5b-1277-4e17-872e-9b2cd3916731', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261029-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/126\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-28 21:31:03', '2026-10-28 21:31:03'),
('3b5d6086-7a97-4043-91bb-3d363d513368', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261027-0002) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/123\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-26 18:03:35', '2026-10-26 18:03:35'),
('417303ac-96e2-482f-87f0-1b0cfb5362d5', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261027-0003) kini berstatus: Ditolak\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/124\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-26 18:07:35', '2026-10-26 18:07:35'),
('417e502a-2fb8-47ea-816a-69126889cfcc', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan layanan baru (REQ-20261014-0004).\",\"url\":\"http:\\/\\/localhost\\/requests\\/109\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:37:35', '2026-10-13 16:37:35'),
('491f6df5-6207-4cdd-acdd-184e6799eabc', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 1, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261105-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/130\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-04 16:49:36', '2026-11-04 16:49:36'),
('4b6b62ec-5ebc-4d8e-bce9-3a57d389ded9', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261007-0002) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/104\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-06 22:53:25', '2026-10-06 22:53:25'),
('54089bce-c126-4845-8fef-3a2197120af0', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261102-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8001\\/requests\\/127\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8001\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-01 17:35:37', '2026-11-01 17:35:37'),
('54ce92ad-df7c-41bb-9454-8b0d5cfcda2b', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/123\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:52:41', '2026-10-26 17:52:41'),
('55775866-abc6-4465-b38a-a5448155066b', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/122\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:51:46', '2026-10-26 17:51:46'),
('5c08ac4d-24e0-4d2e-8a26-657f04ee15ac', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan PNS membuat laporan kendala baru (TIK-20261007-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/104\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-06 22:29:14', '2026-10-06 22:29:14'),
('60297ba0-dfda-403b-a717-a0003fc3c1a5', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261021-0002).\",\"url\":\"http:\\/\\/localhost\\/requests\\/118\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-20 21:06:47', '2026-10-20 21:06:47'),
('608011fc-0c18-4a4e-a7ca-d1327b8b9b33', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261105-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/130\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-04 16:49:36', '2026-11-04 16:49:36'),
('61e7b6b5-88ca-4706-a281-cd8d9f4ec239', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261027-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/117\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 18:18:56', '2026-10-26 18:18:56'),
('63cc29ae-35aa-4187-8280-4175be42e874', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan PNS membuat aduan kendala baru (TIK-20261021-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/116\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-20 21:11:15', '2026-10-20 21:11:15'),
('645d8211-2ee3-4b34-8b38-e2b172d1ac86', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261021-0002) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/116\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-20 21:38:27', '2026-10-20 21:38:27'),
('64d6fd57-8c91-4e4e-9f58-29252b0e5c8b', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan layanan baru (REQ-20261007-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/102\",\"user_name\":\"sultan PNS\",\"type\":\"new_ticket\"}', NULL, '2026-10-06 18:04:29', '2026-10-06 18:04:29'),
('66b34caf-d020-41c4-82b5-21331d4138db', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261014-0004).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/111\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:37:35', '2026-10-13 16:37:35'),
('6fcb7dbd-a460-40b7-8027-6115414ebd85', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0003).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/124\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:54:32', '2026-10-26 17:54:32'),
('7ed76130-d6fd-4aa4-a1f1-3758136e1c24', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261014-0004) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/111\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-19 19:24:09', '2026-10-19 19:24:09'),
('7f70a8b6-4fc5-4f34-a3c9-645165ab1ccb', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 1, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261109-0001) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-11-08 19:42:53', '2026-11-08 19:42:53'),
('80ba292b-bedb-4d37-8986-c5379582b43f', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261105-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/130\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-04 16:49:36', '2026-11-04 16:49:36'),
('84704af9-f204-4e96-b44d-5f26ffd70f34', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261025-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/121\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-24 22:26:54', '2026-10-24 22:26:54'),
('8678f694-f233-427b-81eb-d68ad9dbba8b', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/123\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:52:41', '2026-10-26 17:52:41'),
('926aaa13-41d5-4c71-bc78-495b31a68de0', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan PNS membuat laporan kendala baru (TIK-20261014-0003).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/110\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:36:27', '2026-10-13 16:36:27'),
('9441cbcf-96ba-4986-b5fd-f3cb05d36132', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan layanan baru (REQ-20261015-0001).\",\"url\":\"https:\\/\\/milwaukee-towns-babies-lightning.trycloudflare.com\\/requests\\/112\",\"user_name\":\"sultan admin\",\"user_avatar\":\"https:\\/\\/milwaukee-towns-babies-lightning.trycloudflare.com\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-14 21:19:36', '2026-10-14 21:19:36'),
('95d6d362-2bc2-4f96-a6a0-1171c88ad470', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan PNS membuat aduan kendala baru (TIK-20261021-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/115\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-20 20:51:11', '2026-10-20 20:51:11'),
('9a0e06ac-7493-45b3-bf16-f464a28c818a', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261104-0001) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/129\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-11-03 18:21:26', '2026-11-03 18:21:26'),
('9f360e4d-764d-4374-b702-fec5b58cfcd5', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin (atas nama sultan PNS) mengajukan layanan baru (REQ-20261014-0003).\",\"url\":\"http:\\/\\/localhost\\/requests\\/108\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:37:35', '2026-10-13 16:37:35'),
('a619e2cf-e6b8-47a4-b1d8-7b7bb5f69d38', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261027-0002) kini berstatus: Diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/123\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-26 17:59:48', '2026-10-26 17:59:48'),
('a91638e3-e61b-48c5-92f1-a39a09bc43d1', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0004).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/125\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:54:48', '2026-10-26 17:54:48'),
('ab21d90a-865e-43c2-a9f1-233e2d4a9a6e', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261109-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-08 19:41:23', '2026-11-08 19:41:23'),
('b1758e6f-0012-4ec5-99b3-19f365a213b6', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261104-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/129\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-11-03 18:17:15', '2026-11-03 18:17:15'),
('b41e9982-4089-4f02-8bef-a5bfb5fd55d6', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan layanan baru (REQ-20261014-0002).\",\"url\":\"http:\\/\\/localhost\\/requests\\/105\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:35:30', '2026-10-13 16:35:30'),
('b44e6253-739b-4d5e-870f-f1610a390601', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261014-0001).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/108\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:36:27', '2026-10-13 16:36:27'),
('baf9f1e4-661e-4731-8f11-8372a2573ab9', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261105-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/119\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-04 16:49:56', '2026-11-04 16:49:56'),
('bd73ee18-f925-4eae-be7b-758a8dd5cfd4', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 1, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261104-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/129\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', '2026-11-03 18:34:39', '2026-11-03 18:17:15', '2026-11-03 18:34:39'),
('c03c6193-f362-4af4-8f26-6f711c352872', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan layanan baru (REQ-20261014-0002).\",\"url\":\"http:\\/\\/localhost\\/requests\\/107\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:36:28', '2026-10-13 16:36:28'),
('c05700c1-7824-4ca0-8286-cd85edc32172', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin (atas nama sultan PNS) mengajukan layanan baru (REQ-20261014-0001).\",\"url\":\"http:\\/\\/localhost\\/requests\\/104\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:35:30', '2026-10-13 16:35:30'),
('cb10aa8b-980f-48b8-b52e-cd07985aca1d', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan layanan baru (REQ-20261015-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/116\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-14 22:50:23', '2026-10-14 22:50:23'),
('cb54240a-b1b4-4197-a7c2-a07bf0945c78', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261021-0003).\",\"url\":\"http:\\/\\/localhost\\/requests\\/119\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-20 21:06:48', '2026-10-20 21:06:48'),
('cb7de722-1795-45f7-b1d1-f5220323210b', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 1, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan PNS membuat aduan kendala baru (TIK-20261104-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/118\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-11-03 18:13:32', '2026-11-03 18:13:32'),
('cdce137b-02b7-4832-b62c-add8e52c5fa1', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261021-0002) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/116\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-20 21:45:42', '2026-10-20 21:45:42'),
('cdd0a41d-c03c-4e78-bfbb-722fb86884d4', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin (atas nama sultan PNS) mengajukan layanan baru (REQ-20261014-0001).\",\"url\":\"http:\\/\\/localhost\\/requests\\/106\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:36:28', '2026-10-13 16:36:28'),
('d2b06c91-7927-4397-9c24-cb5271c9c000', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261105-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/119\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-04 16:49:56', '2026-11-04 16:49:56'),
('d3dcb41d-0f78-411e-94d5-d61d4f27821e', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261021-0004) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-20 21:12:37', '2026-10-20 21:12:37'),
('d4c49d42-4c89-4d5a-a46e-aa9ab5375fd6', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261021-0001).\",\"url\":\"http:\\/\\/localhost\\/requests\\/117\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-20 21:00:37', '2026-10-20 21:00:37'),
('d71bbd61-df5b-4006-a828-ede68a124f27', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261102-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8001\\/requests\\/128\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8001\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-01 17:36:11', '2026-11-01 17:36:11'),
('e0f8f409-6e67-4b64-9df8-195653e963ac', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan PNS membuat laporan kendala baru (TIK-20261014-0003).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/107\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:35:29', '2026-10-13 16:35:29'),
('e5adb847-6286-4009-8743-aa362f403236', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261102-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8001\\/requests\\/127\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8001\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-01 17:35:37', '2026-11-01 17:35:37'),
('e5ec7325-3dd5-4109-b251-3cbe61fb1336', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261104-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/129\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-11-03 18:17:15', '2026-11-03 18:17:15'),
('e6e517fb-c054-495e-98e2-81a0e82488aa', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 1, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261109-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-08 19:41:23', '2026-11-08 19:41:23'),
('e8f3043d-3089-4a42-ae0e-42fe66f707af', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261021-0004) kini berstatus: Diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-20 21:12:24', '2026-10-20 21:12:24'),
('e9960114-1999-4ad4-b3ad-75cf0ff6f106', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan layanan baru (REQ-20261007-0002).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/103\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-06 23:18:50', '2026-10-06 23:18:50'),
('e9a385f1-cc8e-4666-aae1-baf9e2b0a2c0', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261029-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/126\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-28 21:31:03', '2026-10-28 21:31:03'),
('ec9e8233-20f8-4739-8a23-205da1888d6d', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan PNS membuat laporan kendala baru (TIK-20261014-0006).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/113\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:37:35', '2026-10-13 16:37:35'),
('ecb928ce-2b6d-408e-bf3f-43831b583ae0', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Aduan Kendala Baru\",\"message\":\"sultan admin membuat aduan kendala baru (TIK-20261109-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/120\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-11-08 19:41:23', '2026-11-08 19:41:23'),
('f2a60541-18f5-4f32-b048-7871bf6c85c1', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 2, '{\"title\":\"Laporan Kendala Baru\",\"message\":\"sultan admin membuat laporan kendala baru (TIK-20261014-0002).\",\"url\":\"http:\\/\\/localhost\\/incidents\\/109\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/localhost\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-13 16:36:27', '2026-10-13 16:36:27'),
('f3e6f414-f1c3-48d8-beb5-33a4de124869', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan PNS mengajukan permintaan layanan baru (REQ-20261027-0003).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/124\",\"user_name\":\"sultan PNS\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/d87vkKzskZvnKRPAaJkJ.jpeg\",\"type\":\"new_ticket\"}', NULL, '2026-10-26 17:54:32', '2026-10-26 17:54:32'),
('f7c9fd58-3ebe-4090-a03e-5a14a3ad2093', 'App\\Notifications\\NewTicketNotification', 'App\\Models\\User', 6, '{\"title\":\"Permintaan Layanan Baru\",\"message\":\"sultan admin mengajukan permintaan layanan baru (REQ-20261025-0001).\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/121\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"new_ticket\"}', NULL, '2026-10-24 22:26:54', '2026-10-24 22:26:54'),
('f8155108-a0bd-49cd-a0d7-2589dbb844d1', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261104-0001) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/118\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-11-03 18:27:33', '2026-11-03 18:27:33'),
('fdefce08-4632-4084-b336-0fab9cd1df4d', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261014-0002) kini berstatus: Selesai\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/107\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-18 23:08:34', '2026-10-18 23:08:34'),
('fed71331-4af3-43e0-b92e-530da333d5eb', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Aduan Diperbarui\",\"message\":\"Aduan Anda (TIK-20261021-0001) kini berstatus: Sedang diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/incidents\\/115\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-21 16:38:26', '2026-10-21 16:38:26'),
('ff3a6d3f-27a4-4245-a26c-8cc46628e6dc', 'App\\Notifications\\TicketStatusUpdatedNotification', 'App\\Models\\User', 3, '{\"title\":\"Status Request Diperbarui\",\"message\":\"Request Anda (REQ-20261014-0004) kini berstatus: Diproses\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/requests\\/109\",\"user_name\":\"sultan admin\",\"user_avatar\":\"http:\\/\\/127.0.0.1:8000\\/storage\\/profiles\\/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg\",\"type\":\"status_update\"}', NULL, '2026-10-18 23:07:19', '2026-10-18 23:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `panggol`
--

CREATE TABLE `panggol` (
  `id` bigint UNSIGNED NOT NULL,
  `pangkat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panggol`
--

INSERT INTO `panggol` (`id`, `pangkat`, `golongan`) VALUES
(1, 'Pembina Utama Muda', 'IV/c'),
(2, 'Pembina', 'IV/a'),
(3, 'Penata', 'III/c');

-- --------------------------------------------------------

--
-- Table structure for table `req_detail_akun`
--

CREATE TABLE `req_detail_akun` (
  `id` bigint UNSIGNED NOT NULL,
  `request_id` bigint UNSIGNED NOT NULL,
  `jenis_pengajuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sistem_tujuan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `req_detail_akun`
--

INSERT INTO `req_detail_akun` (`id`, `request_id`, `jenis_pengajuan`, `sistem_tujuan`) VALUES
(1, 9, 'Buat Akun Baru', 'E-Office'),
(2, 10, 'Reset Password', 'E-Office'),
(3, 16, 'Buat Akun Baru', 'Srikandi'),
(4, 18, 'Hapus Akses', 'SIMPEG'),
(5, 20, 'Reset Password', 'E-Office'),
(6, 21, 'Hapus Akses', 'Srikandi'),
(7, 22, 'Reset Password', 'SIPT'),
(8, 23, 'Hapus Akses', 'SIMPEG'),
(9, 25, 'Buat Akun Baru', 'Srikandi'),
(10, 26, 'Reset Password', 'SIPT'),
(11, 30, 'Reset Password', 'E-Office'),
(12, 31, 'Buat Akun Baru', 'SIPT'),
(13, 39, 'Reset Password', 'SIPT'),
(14, 40, 'Reset Password', 'Srikandi'),
(15, 43, 'Reset Password', 'SIPT'),
(16, 48, 'Buat Akun Baru', 'E-Office'),
(17, 58, 'Buat Akun Baru', 'E-Office'),
(18, 59, 'Buat Akun Baru', 'Srikandi'),
(19, 60, 'Buat Akun Baru', 'Srikandi'),
(20, 64, 'Buat Akun Baru', 'SIMPEG'),
(21, 65, 'Reset Password', 'SIMPEG'),
(22, 67, 'Reset Password', 'E-Office'),
(23, 69, 'Hapus Akses', 'E-Office'),
(24, 71, 'Reset Password', 'SIMPEG'),
(25, 75, 'Hapus Akses', 'SIMPEG'),
(26, 77, 'Buat Akun Baru', 'Srikandi'),
(27, 79, 'Reset Password', 'E-Office'),
(28, 80, 'Hapus Akses', 'SIMPEG'),
(29, 86, 'Hapus Akses', 'SIMPEG'),
(30, 87, 'Reset Password', 'SIMPEG'),
(31, 88, 'Hapus Akses', 'SIPT'),
(32, 90, 'Buat Akun Baru', 'E-Office'),
(33, 91, 'Buat Akun Baru', 'Srikandi'),
(34, 92, 'Reset Password', 'E-Office'),
(35, 98, 'Hapus Akses', 'SIMPEG'),
(36, 103, 'Reset Password', 'Srikandi'),
(38, 127, 'Reset Password', 'Srikandi'),
(39, 128, 'Tambah Akun Baru', 'Email BPOM'),
(40, 132, 'Reset Password', 'Srikandi'),
(41, 134, 'Tambah Akun Baru', 'SIPT');

-- --------------------------------------------------------

--
-- Table structure for table `req_detail_zoom`
--

CREATE TABLE `req_detail_zoom` (
  `id` bigint UNSIGNED NOT NULL,
  `request_id` bigint UNSIGNED NOT NULL,
  `bidang_id` bigint UNSIGNED DEFAULT NULL,
  `tgl_acara` date DEFAULT NULL,
  `nama_acara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `butuh_operator` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tidak',
  `bentuk_ruangan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_kursi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `req_detail_zoom`
--

INSERT INTO `req_detail_zoom` (`id`, `request_id`, `bidang_id`, `tgl_acara`, `nama_acara`, `jam_mulai`, `jam_selesai`, `butuh_operator`, `bentuk_ruangan`, `jumlah_kursi`) VALUES
(1, 3, 1, NULL, 'Ad ex quia totam.', '09:00:00', '11:00:00', 'Ya', 'Theater', 12),
(2, 4, 2, NULL, 'Quis sunt eligendi perspiciatis.', '09:00:00', '11:00:00', 'Tidak', 'Classroom', 9),
(3, 5, 3, NULL, 'Vitae dolorum ducimus sunt.', '09:00:00', '11:00:00', 'Ya', 'Theater', 8),
(4, 11, 1, NULL, 'Aut excepturi quibusdam harum.', '09:00:00', '11:00:00', 'Tidak', 'Theater', 11),
(5, 13, 1, NULL, 'Ut ex repellat et.', '09:00:00', '11:00:00', 'Ya', 'Theater', 42),
(6, 14, 2, NULL, 'Velit rem incidunt magnam ea.', '09:00:00', '11:00:00', 'Tidak', 'Theater', 28),
(7, 17, 3, NULL, 'Laboriosam aut delectus.', '09:00:00', '11:00:00', 'Ya', 'Theater', 37),
(8, 24, 2, NULL, 'Eveniet soluta quia accusantium.', '09:00:00', '11:00:00', 'Ya', 'Classroom', 44),
(9, 32, 1, NULL, 'Nostrum fugiat excepturi corrupti.', '09:00:00', '11:00:00', 'Ya', 'Theater', 34),
(10, 33, 4, NULL, 'Enim commodi et dolorum.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 22),
(11, 34, 2, NULL, 'Quidem veniam impedit delectus.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 26),
(12, 35, 2, NULL, 'Nisi rerum sit quia.', '09:00:00', '11:00:00', 'Tidak', 'Theater', 10),
(13, 37, 1, NULL, 'Perferendis voluptatem quis sapiente.', '09:00:00', '11:00:00', 'Ya', 'Theater', 13),
(14, 42, 3, NULL, 'Ea ut nesciunt aliquam.', '09:00:00', '11:00:00', 'Ya', 'Shape U', 7),
(15, 44, 4, NULL, 'Repellat blanditiis autem aut.', '09:00:00', '11:00:00', 'Tidak', 'Theater', 31),
(16, 45, 1, NULL, 'Qui et quas.', '09:00:00', '11:00:00', 'Ya', 'Classroom', 35),
(17, 46, 3, NULL, 'Quis et culpa.', '09:00:00', '11:00:00', 'Ya', 'Shape U', 26),
(18, 50, 3, NULL, 'Sunt corporis ex.', '09:00:00', '11:00:00', 'Tidak', 'Classroom', 36),
(19, 52, 2, NULL, 'Enim nihil eligendi.', '09:00:00', '11:00:00', 'Ya', 'Classroom', 13),
(20, 53, 1, NULL, 'Accusantium ex accusantium reiciendis.', '09:00:00', '11:00:00', 'Ya', 'Theater', 35),
(21, 55, 4, NULL, 'Est non natus aliquid.', '09:00:00', '11:00:00', 'Ya', 'Classroom', 46),
(22, 56, 3, NULL, 'Quia vel ipsum.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 49),
(23, 57, 2, NULL, 'Quo voluptatem ad itaque.', '09:00:00', '11:00:00', 'Ya', 'Classroom', 24),
(24, 61, 1, NULL, 'In explicabo adipisci.', '09:00:00', '11:00:00', 'Tidak', 'Classroom', 18),
(25, 66, 4, NULL, 'Est omnis delectus occaecati.', '09:00:00', '11:00:00', 'Tidak', 'Classroom', 17),
(26, 70, 4, NULL, 'Natus consequuntur omnis consequuntur.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 43),
(27, 73, 1, NULL, 'Est et provident.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 34),
(28, 82, 1, NULL, 'Molestiae est a doloremque.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 10),
(29, 83, 1, NULL, 'Ea id eius.', '09:00:00', '11:00:00', 'Tidak', 'Theater', 19),
(30, 84, 4, NULL, 'Qui veritatis nulla.', '09:00:00', '11:00:00', 'Tidak', 'Theater', 39),
(31, 89, 3, NULL, 'Qui labore dolore vel.', '09:00:00', '11:00:00', 'Tidak', 'Shape U', 23),
(32, 94, 3, NULL, 'Et ut autem.', '09:00:00', '11:00:00', 'Ya', 'Theater', 10),
(33, 95, 1, NULL, 'Quia consectetur occaecati.', '09:00:00', '11:00:00', 'Ya', 'Shape U', 45),
(34, 96, 1, NULL, 'Omnis itaque quam.', '09:00:00', '11:00:00', 'Ya', 'Shape U', 15),
(35, 97, 2, NULL, 'Fuga optio.', '09:00:00', '11:00:00', 'Ya', 'Theater', 34),
(36, 99, 1, NULL, 'Nesciunt sit fuga provident.', '09:00:00', '11:00:00', 'Tidak', 'Classroom', 7),
(40, 119, 1, '2026-10-25', 'Rapat Koordinasi IT', '09:00:00', '11:00:00', 'Tidak', NULL, NULL),
(41, 123, 1, '2026-10-28', 'rapat 2', '07:00:00', '14:00:00', 'Tidak', NULL, NULL),
(42, 126, 1, '2026-10-30', 'kkjnkjnk', '17:00:00', '20:00:00', 'Tidak', NULL, NULL),
(43, 129, 1, '2026-11-04', 'rapat team tatausaha', '11:00:00', '12:00:00', 'Tidak', NULL, NULL),
(44, 131, 1, '2026-11-13', 'Rapat Koordinasi Pengawasan Terpadu', '09:00:00', '12:00:00', 'Ya', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_request` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `reported_by` bigint UNSIGNED DEFAULT NULL,
  `layanan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_request` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `status` enum('Diajukan','Diproses','Selesai','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Diajukan',
  `completed_at` timestamp NULL DEFAULT NULL,
  `konfirmasi_selesai_at` timestamp NULL DEFAULT NULL,
  `is_konfirmasi_otomatis` tinyint(1) NOT NULL DEFAULT '0',
  `is_chat_closed` tinyint(1) NOT NULL DEFAULT '0',
  `chat_closed_at` timestamp NULL DEFAULT NULL,
  `chat_closed_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `nomor_request`, `user_id`, `reported_by`, `layanan`, `tgl_request`, `deskripsi`, `status`, `completed_at`, `konfirmasi_selesai_at`, `is_konfirmasi_otomatis`, `is_chat_closed`, `chat_closed_at`, `chat_closed_by`, `created_at`) VALUES
(3, 'REQ-20260717-0003', 3, NULL, 'zoom', '2026-07-17', 'Excepturi corporis debitis sed et dignissimos.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-07-16 23:26:19'),
(4, 'REQ-20260907-0004', 2, NULL, 'zoom', '2026-09-07', 'Error doloremque rerum et ut recusandae.', 'Selesai', '2026-09-06 22:53:36', NULL, 0, 0, NULL, NULL, '2026-09-06 20:53:36'),
(5, 'REQ-20260605-0005', 3, NULL, 'zoom', '2026-06-05', 'Accusamus nihil autem numquam quidem illum placeat.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-06-05 03:12:38'),
(9, 'REQ-20260913-0009', 3, NULL, 'akun', '2026-09-13', 'Deserunt sed distinctio hic quos sed.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-09-12 22:09:07'),
(10, 'REQ-20260428-0010', 1, NULL, 'akun', '2026-04-28', 'Enim non architecto veniam qui aut quia.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-04-28 10:09:41'),
(11, 'REQ-20260613-0011', 3, NULL, 'zoom', '2026-06-13', 'Sed incidunt qui eveniet ipsam et.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-06-13 07:10:31'),
(13, 'REQ-20260410-0013', 3, NULL, 'zoom', '2026-04-10', 'Sed beatae sed qui magni.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-04-10 04:11:34'),
(14, 'REQ-20260817-0014', 2, NULL, 'zoom', '2026-08-17', 'Aut aut maxime quo.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-08-17 12:39:31'),
(16, 'REQ-20260801-0016', 2, NULL, 'akun', '2026-08-01', 'Nemo nemo repellat voluptatem earum est.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-07-31 18:33:55'),
(17, 'REQ-20260702-0017', 2, NULL, 'zoom', '2026-07-02', 'Provident et veritatis aut nostrum optio voluptate.', 'Selesai', '2026-07-02 05:30:07', NULL, 0, 0, NULL, NULL, '2026-07-02 03:30:07'),
(18, 'REQ-20260519-0018', 1, NULL, 'akun', '2026-05-19', 'Suscipit ipsa nostrum est illo.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-05-19 07:57:39'),
(20, 'REQ-20260702-0020', 3, NULL, 'akun', '2026-07-02', 'Repellendus blanditiis voluptatibus repudiandae.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-07-01 20:42:55'),
(21, 'REQ-20260627-0021', 1, NULL, 'akun', '2026-06-27', 'Velit sequi et ab labore saepe.', 'Selesai', '2026-06-26 23:58:10', NULL, 0, 0, NULL, NULL, '2026-06-26 21:58:10'),
(22, 'REQ-20260503-0022', 1, NULL, 'akun', '2026-05-03', 'Reiciendis iusto omnis accusamus vitae.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-05-02 20:57:05'),
(23, 'REQ-20260427-0023', 1, NULL, 'akun', '2026-04-27', 'Soluta veniam adipisci unde sint eum.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-04-26 23:38:50'),
(24, 'REQ-20260719-0024', 3, NULL, 'zoom', '2026-07-19', 'Culpa sed soluta voluptatem sequi et.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-07-19 11:54:01'),
(25, 'REQ-20260530-0025', 2, NULL, 'akun', '2026-05-30', 'Doloremque laboriosam aut facilis ducimus nostrum.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-05-30 15:56:28'),
(26, 'REQ-20260907-0026', 1, NULL, 'akun', '2026-09-07', 'Dolore excepturi magnam excepturi ut totam itaque.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-09-07 03:27:01'),
(30, 'REQ-20260905-0030', 1, NULL, 'akun', '2026-09-05', 'In esse aliquam consequatur.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-09-05 06:54:44'),
(31, 'REQ-20260817-0031', 2, NULL, 'akun', '2026-08-17', 'Sint rerum doloremque praesentium.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-08-16 19:01:47'),
(32, 'REQ-20260802-0032', 2, NULL, 'zoom', '2026-08-02', 'Id porro veritatis iure suscipit rerum nostrum.', 'Selesai', '2026-08-02 01:26:01', NULL, 0, 0, NULL, NULL, '2026-08-01 23:26:01'),
(33, 'REQ-20260813-0033', 1, NULL, 'zoom', '2026-08-13', 'Dolore consectetur tenetur ullam nihil.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-08-12 23:48:39'),
(34, 'REQ-20260620-0034', 1, NULL, 'zoom', '2026-06-20', 'Magni mollitia error et et.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-06-20 03:09:10'),
(35, 'REQ-20260517-0035', 1, NULL, 'zoom', '2026-05-17', 'Quas a amet quia.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-05-17 05:32:50'),
(37, 'REQ-20260413-0037', 1, NULL, 'zoom', '2026-04-13', 'Voluptatem aperiam et ut et.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-04-13 13:21:48'),
(39, 'REQ-20260423-0039', 1, NULL, 'akun', '2026-04-23', 'Eum nostrum voluptas exercitationem distinctio aliquid qui.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-04-23 13:26:24'),
(40, 'REQ-20260410-0040', 3, NULL, 'akun', '2026-04-10', 'Debitis animi veniam accusantium quis ut.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-04-09 19:26:41'),
(42, 'REQ-20260902-0042', 3, NULL, 'zoom', '2026-09-02', 'Optio inventore voluptate odio nobis perspiciatis.', 'Selesai', '2026-09-02 00:37:39', NULL, 0, 0, NULL, NULL, '2026-09-01 22:37:39'),
(43, 'REQ-20260805-0043', 3, NULL, 'akun', '2026-08-05', 'Sapiente repellat laborum occaecati vitae magnam.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-08-05 06:16:59'),
(44, 'REQ-20260812-0044', 2, NULL, 'zoom', '2026-08-12', 'Autem sapiente ut quae.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-08-11 17:56:12'),
(45, 'REQ-20260718-0045', 2, NULL, 'zoom', '2026-07-18', 'Consequuntur et odit vel sunt ut.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-07-18 04:11:09'),
(46, 'REQ-20260409-0046', 1, NULL, 'zoom', '2026-04-09', 'Dolorem omnis non perferendis dolore doloribus esse.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-04-08 21:02:19'),
(48, 'REQ-20260706-0048', 2, NULL, 'akun', '2026-07-06', 'Architecto quaerat harum deleniti minus.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-07-06 00:11:41'),
(50, 'REQ-20260817-0050', 3, NULL, 'zoom', '2026-08-17', 'Architecto quidem tempore veritatis voluptas.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-08-17 14:24:01'),
(52, 'REQ-20260703-0052', 2, NULL, 'zoom', '2026-07-03', 'Quasi quasi dicta sit non expedita.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-07-03 04:47:18'),
(53, 'REQ-20260509-0053', 2, NULL, 'zoom', '2026-05-09', 'Et dolores et ratione voluptatum sit.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-05-08 21:37:56'),
(55, 'REQ-20260620-0055', 2, NULL, 'zoom', '2026-06-20', 'Reiciendis assumenda et odit qui.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-06-20 07:34:21'),
(56, 'REQ-20260422-0056', 1, NULL, 'zoom', '2026-04-22', 'Perspiciatis ut eos non tenetur reprehenderit.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-04-22 09:35:22'),
(57, 'REQ-20260920-0057', 3, NULL, 'zoom', '2026-09-20', 'Nihil possimus dolores repellat eaque.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-09-20 08:00:06'),
(58, 'REQ-20260704-0058', 1, NULL, 'akun', '2026-07-04', 'Dolorum dolores commodi suscipit at.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-07-03 23:42:29'),
(59, 'REQ-20260911-0059', 2, NULL, 'akun', '2026-09-11', 'Reiciendis reiciendis expedita non odit ut quidem.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-09-11 13:25:52'),
(60, 'REQ-20261003-0060', 2, NULL, 'akun', '2026-10-03', 'In illo explicabo et.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-10-03 07:59:33'),
(61, 'REQ-20260811-0061', 2, NULL, 'zoom', '2026-08-11', 'Ut quam omnis unde.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-08-11 01:04:33'),
(64, 'REQ-20260524-0064', 3, NULL, 'akun', '2026-05-24', 'Laborum laboriosam tempore aut sapiente et itaque.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-05-23 22:30:32'),
(65, 'REQ-20260907-0065', 2, NULL, 'akun', '2026-09-07', 'Et et id sunt aspernatur atque.', 'Selesai', '2026-09-06 22:06:10', NULL, 0, 0, NULL, NULL, '2026-09-06 20:06:10'),
(66, 'REQ-20260413-0066', 3, NULL, 'zoom', '2026-04-13', 'Ipsum dolorem aliquid facere laudantium laudantium est.', 'Selesai', '2026-04-13 04:58:06', NULL, 0, 0, NULL, NULL, '2026-04-13 02:58:06'),
(67, 'REQ-20260710-0067', 2, NULL, 'akun', '2026-07-10', 'Corporis illo ad hic quia.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-07-10 06:23:16'),
(69, 'REQ-20260910-0069', 3, NULL, 'akun', '2026-09-10', 'Id eius accusamus voluptas.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-09-10 00:04:35'),
(70, 'REQ-20260603-0070', 2, NULL, 'zoom', '2026-06-03', 'Molestiae ut voluptatibus aliquam nisi aut.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-06-02 18:18:48'),
(71, 'REQ-20260910-0071', 1, NULL, 'akun', '2026-09-10', 'Aliquid sit ut quia veniam.', 'Selesai', '2026-09-10 04:27:58', NULL, 0, 0, NULL, NULL, '2026-09-10 02:27:58'),
(73, 'REQ-20260617-0073', 3, NULL, 'zoom', '2026-06-17', 'Quis voluptatem animi qui et.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-06-16 19:58:15'),
(75, 'REQ-20260616-0075', 1, NULL, 'akun', '2026-06-16', 'Est corrupti nisi quibusdam omnis adipisci numquam.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-06-16 14:49:27'),
(77, 'REQ-20260612-0077', 3, NULL, 'akun', '2026-06-12', 'Et tempore perferendis ut ut sed.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-06-12 02:13:12'),
(79, 'REQ-20260613-0079', 3, NULL, 'akun', '2026-06-13', 'Iusto sed qui suscipit amet vel.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-06-13 03:27:52'),
(80, 'REQ-20260925-0080', 3, NULL, 'akun', '2026-09-25', 'Aut consequatur ipsum laborum.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-09-25 05:10:08'),
(82, 'REQ-20260802-0082', 1, NULL, 'zoom', '2026-08-02', 'Ut dicta iure nostrum.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-08-01 20:51:26'),
(83, 'REQ-20260716-0083', 1, NULL, 'zoom', '2026-07-16', 'Voluptate delectus vel eligendi eaque aut.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-07-16 11:13:00'),
(84, 'REQ-20260609-0084', 3, NULL, 'zoom', '2026-06-09', 'Facere odio nesciunt quo minima.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-06-09 05:25:37'),
(86, 'REQ-20260514-0086', 3, NULL, 'akun', '2026-05-14', 'Iusto excepturi possimus rem cupiditate est aut.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-05-14 04:20:13'),
(87, 'REQ-20260519-0087', 2, NULL, 'akun', '2026-05-19', 'Maxime in sed et iure maxime.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-05-19 11:25:41'),
(88, 'REQ-20260701-0088', 2, NULL, 'akun', '2026-07-01', 'Eum et quaerat facere ea molestias.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-06-30 18:50:42'),
(89, 'REQ-20260512-0089', 1, NULL, 'zoom', '2026-05-12', 'Ut et optio veniam quidem reprehenderit quia.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-05-11 22:53:26'),
(90, 'REQ-20260429-0090', 2, NULL, 'akun', '2026-04-29', 'Ipsa cum iure nisi.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-04-29 08:37:38'),
(91, 'REQ-20260828-0091', 1, NULL, 'akun', '2026-08-28', 'Doloremque sint rem neque consectetur.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-08-28 15:19:50'),
(92, 'REQ-20260811-0092', 3, NULL, 'akun', '2026-08-11', 'Dolor enim repudiandae nam alias.', 'Selesai', '2026-08-10 21:59:02', '2026-10-26 18:12:07', 0, 0, NULL, NULL, '2026-08-10 19:59:02'),
(94, 'REQ-20260722-0094', 1, NULL, 'zoom', '2026-07-22', 'Ut temporibus sequi repellendus consequatur dolores.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-07-22 00:03:18'),
(95, 'REQ-20260504-0095', 2, NULL, 'zoom', '2026-05-04', 'Ad ad veniam similique.', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-05-04 00:11:00'),
(96, 'REQ-20260904-0096', 3, NULL, 'zoom', '2026-09-04', 'Id reprehenderit quos et consectetur et.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-09-03 18:14:42'),
(97, 'REQ-20260921-0097', 3, NULL, 'zoom', '2026-09-21', 'Ut consequatur doloremque molestias dolore qui repellat.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-09-20 18:45:08'),
(98, 'REQ-20260901-0098', 2, NULL, 'akun', '2026-09-01', 'Molestiae porro unde id minima illo ullam.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-09-01 09:52:50'),
(99, 'REQ-20260716-0099', 3, NULL, 'zoom', '2026-07-16', 'Earum nam aut nulla sed.', 'Selesai', '2026-07-16 01:34:25', NULL, 0, 0, NULL, NULL, '2026-07-15 23:34:25'),
(101, 'REQ-20261005-0001', 1, NULL, 'rapat', '2026-10-05', 'adsasdasdasd', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-10-04 21:53:57'),
(102, 'REQ-20261007-0001', 3, NULL, 'lainnya', '2026-10-07', 'downgrade windows ke windows 10', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-06 18:04:24'),
(103, 'REQ-20261007-0002', 1, NULL, 'akun', '2026-10-07', 'hhj', 'Selesai', '2026-10-18 23:09:16', NULL, 0, 0, NULL, NULL, '2026-10-06 23:18:49'),
(106, 'REQ-20261014-0001', 3, 1, 'lainnya', '2026-10-14', 'Testing permohonan layanan atas nama orang lain', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-13 16:36:28'),
(107, 'REQ-20261014-0002', 3, NULL, 'lainnya', '2026-10-14', 'Testing pelapor mencoba spoof user_id pada request', 'Selesai', '2026-10-18 23:08:34', NULL, 0, 0, NULL, NULL, '2026-10-13 16:36:28'),
(108, 'REQ-20261014-0003', 3, 1, 'lainnya', '2026-10-14', 'Testing permohonan layanan atas nama orang lain', 'Selesai', '2026-10-14 21:54:05', '2026-10-18 22:13:25', 0, 0, NULL, NULL, '2026-10-13 16:37:35'),
(109, 'REQ-20261014-0004', 3, NULL, 'lainnya', '2026-10-14', 'Testing pelapor mencoba spoof user_id pada request', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-10-13 16:37:35'),
(112, 'REQ-20261015-0001', 1, NULL, 'lainnya', '2026-10-15', 'hgchchjgchchvcgcgfcgfcghcghcgv', 'Selesai', '2026-10-14 21:47:50', NULL, 0, 1, '2026-10-14 23:04:42', 1, '2026-10-14 21:19:35'),
(117, 'REQ-20261021-0001', 1, NULL, 'lainnya', '2026-10-21', 'Testing pembuatan request layanan lainnya', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-20 21:00:36'),
(118, 'REQ-20261021-0002', 1, NULL, 'lainnya', '2026-10-21', 'Testing submit request lainnya via automated test', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-20 21:06:47'),
(119, 'REQ-20261021-0003', 1, NULL, 'zoom', '2026-10-21', NULL, 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-20 21:06:48'),
(120, 'REQ-20261021-0004', 3, NULL, 'lainnya', '2026-10-21', 'lhytvdty ytvvfyvfhfvjhvg dghgfbvybfybf gfhgfhbtfv', 'Selesai', '2026-10-20 21:12:37', NULL, 0, 0, NULL, NULL, '2026-10-20 21:08:38'),
(121, 'REQ-20261025-0001', 1, NULL, 'lainnya', '2026-10-25', 'uyhuybnuhbniuhjnujinjin', 'Selesai', '2026-10-24 22:27:41', NULL, 0, 0, NULL, NULL, '2026-10-24 22:26:48'),
(122, 'REQ-20261027-0001', 3, NULL, 'lainnya', '2026-10-27', '1', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-10-26 17:51:40'),
(123, 'REQ-20261027-0002', 3, NULL, 'zoom', '2026-10-27', '2', 'Selesai', '2026-10-26 18:03:35', '2026-10-27 16:49:43', 0, 0, NULL, NULL, '2026-10-26 17:52:40'),
(124, 'REQ-20261027-0003', 3, NULL, 'konsultasi', '2026-10-27', '3', 'Ditolak', NULL, NULL, 0, 0, NULL, NULL, '2026-10-26 17:54:32'),
(125, 'REQ-20261027-0004', 3, NULL, 'rapat', '2026-10-27', '5', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-26 17:54:48'),
(126, 'REQ-20261029-0001', 1, NULL, 'zoom', '2026-10-29', 'iujknjkn', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-10-28 21:30:57'),
(127, 'REQ-20261102-0001', 1, NULL, 'reset_password', '2026-11-02', 'sfsfsdfsdf', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-11-01 17:35:32'),
(128, 'REQ-20261102-0002', 1, NULL, 'tambah_akun', '2026-11-02', 'dfxzczxczxc', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-11-01 17:36:11'),
(129, 'REQ-20261104-0001', 3, NULL, 'zoom', '2026-11-04', 'persiapkan lebih awal', 'Selesai', '2026-11-03 18:21:26', '2026-11-03 18:22:40', 0, 0, NULL, NULL, '2026-11-03 18:17:15'),
(130, 'REQ-20261105-0001', 1, NULL, 'lainnya', '2026-11-05', 'zczxcaszdazsdx', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-11-04 16:49:34'),
(131, '001/PLTIK/BBPOM/11/2026', 3, NULL, 'zoom', '2026-11-11', '[Dummy Uji] Permohonan link Zoom rapat evaluasi pengawasan obat & makanan triwulan.', 'Diajukan', NULL, NULL, 0, 0, NULL, NULL, '2026-11-10 16:20:24'),
(132, '002/PLTIK/BBPOM/11/2026', 3, NULL, 'reset_password', '2026-11-11', '[Dummy Uji] Permohonan reset password akun Srikandi pegawai yang terkunci.', 'Diproses', NULL, NULL, 0, 0, NULL, NULL, '2026-11-10 16:20:24'),
(133, '003/PLTIK/BBPOM/11/2026', 3, NULL, 'konsultasi', '2026-11-11', '[Dummy Uji] Konsultasi keamanan akses jaringan dan penataan arsip digital bidang.', 'Selesai', '2026-11-10 14:20:24', NULL, 0, 0, NULL, NULL, '2026-11-10 16:20:25'),
(134, '004/PLTIK/BBPOM/11/2026', 3, NULL, 'tambah_akun', '2026-11-11', '[Dummy Uji] Permohonan penambahan akun baru pegawai mutasi pada aplikasi SIPT.', 'Selesai', '2026-11-10 04:20:24', '2026-11-10 12:20:24', 0, 0, NULL, NULL, '2026-11-10 16:20:25'),
(135, '005/PLTIK/BBPOM/11/2026', 3, NULL, 'lainnya', '2026-11-11', '[Dummy Uji] Permintaan perapihan kabel jaringan LAN di ruang kerja bagian Tata Usaha.', 'Selesai', '2026-11-07 16:20:24', NULL, 0, 0, NULL, NULL, '2026-11-10 16:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_chats`
--

CREATE TABLE `service_request_chats` (
  `id` bigint UNSIGNED NOT NULL,
  `request_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_chats`
--

INSERT INTO `service_request_chats` (`id`, `request_id`, `user_id`, `pesan`, `is_system`, `created_at`) VALUES
(1, 102, 1, 'bang nicholas saputra?', 0, '2026-10-12 00:36:18'),
(2, 102, 3, 'bukan saya sultan', 0, '2026-10-12 00:36:53'),
(3, 102, 1, 'oh iya mirip soalnya, salken bang', 0, '2026-10-12 00:38:20'),
(4, 102, 3, 'oh iya bang', 0, '2026-10-12 00:38:39'),
(5, 102, 3, 'tes', 0, '2026-10-12 02:03:41'),
(6, 102, 3, 'tes', 0, '2026-10-12 02:03:42'),
(7, 102, 1, 'tes', 0, '2026-10-12 02:04:01'),
(8, 102, 1, 'tes', 0, '2026-10-12 02:33:50'),
(9, 102, 3, 'tes', 0, '2026-10-12 02:34:07'),
(10, 102, 3, 'tes', 0, '2026-10-12 02:34:09'),
(11, 102, 3, 'tes', 0, '2026-10-12 03:50:20'),
(14, 102, 3, 'p', 0, '2026-10-11 21:10:36'),
(15, 102, 1, 'p', 0, '2026-10-11 21:10:48'),
(16, 102, 1, 'p', 0, '2026-10-11 21:11:11'),
(17, 102, 3, 'p', 0, '2026-10-11 21:11:58'),
(18, 102, 1, 'p', 0, '2026-10-11 21:12:03'),
(19, 102, 1, 'p', 0, '2026-10-11 21:12:10'),
(20, 102, 3, 'p', 0, '2026-10-11 21:12:13'),
(21, 102, 3, 'kayapa habar', 0, '2026-10-11 21:13:57'),
(22, 102, 1, 'aman aja alhamdulillah baik', 0, '2026-10-11 21:14:11'),
(23, 102, 3, 'hiih alhamdulillah', 0, '2026-10-11 21:14:25'),
(24, 102, 3, 'mama kayapa habar', 0, '2026-10-11 21:14:36'),
(25, 102, 1, 'baik haja mang ai', 0, '2026-10-11 21:14:46'),
(26, 102, 3, 'hiih alhamdulillah aja sehatan berataan', 0, '2026-10-11 21:15:02'),
(27, 102, 1, 'hiih  mang ai', 0, '2026-10-11 21:15:13'),
(28, 102, NULL, 'Sesi diskusi telah dihentikan/dikunci oleh Operator (sultan admin).', 1, '2026-10-11 22:29:21'),
(29, 102, NULL, 'Sesi diskusi telah dibuka kembali oleh Operator (sultan admin).', 1, '2026-10-11 22:38:46'),
(30, 102, 1, 'hhhh', 0, '2026-10-11 22:39:01'),
(31, 102, NULL, 'Sesi diskusi telah dihentikan/dikunci oleh Operator (sultan admin).', 1, '2026-10-11 22:43:12'),
(32, 102, NULL, 'Sesi diskusi telah dibuka kembali oleh Operator (sultan admin).', 1, '2026-10-11 22:43:19'),
(33, 101, 1, 'p', 0, '2026-10-11 22:44:01'),
(34, 101, NULL, 'Tiket dibuka kembali otomatis oleh sistem karena Pelapor mengirim konfirmasi/kendala lanjutan.', 1, '2026-10-11 22:44:01'),
(37, 112, 1, 'p', 0, '2026-10-14 21:48:11'),
(38, 112, 1, 'p', 0, '2026-10-14 21:50:52'),
(39, 108, 1, 'ppppppp', 0, '2026-10-14 21:54:15'),
(40, 108, 3, 'p', 0, '2026-10-14 21:54:29'),
(41, 108, 1, 'p', 0, '2026-10-14 21:54:34'),
(43, 112, NULL, 'Sesi diskusi telah dihentikan/dikunci oleh Operator (sultan admin).', 1, '2026-10-14 23:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_resolutions`
--

CREATE TABLE `service_request_resolutions` (
  `id` bigint UNSIGNED NOT NULL,
  `request_id` bigint UNSIGNED NOT NULL,
  `petugas_id` bigint UNSIGNED DEFAULT NULL,
  `tgl_tindak_lanjut` date DEFAULT NULL,
  `tindak_lanjut` text COLLATE utf8mb4_unicode_ci,
  `alasan_penolakan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_request_resolutions`
--

INSERT INTO `service_request_resolutions` (`id`, `request_id`, `petugas_id`, `tgl_tindak_lanjut`, `tindak_lanjut`, `alasan_penolakan`, `created_at`) VALUES
(1, 103, 1, '2026-10-07', '-', NULL, '2026-10-07 07:24:45'),
(3, 112, 1, '2026-10-15', 'dasdasdawdasdawd', NULL, '2026-10-15 05:47:50'),
(4, 108, 1, '2026-10-15', 'kjbkjbkjzkjhsdkjbkjsbjsbv', NULL, '2026-10-15 05:54:05'),
(6, 109, 1, '2026-10-19', 'wdassasasdadadas', NULL, '2026-10-19 07:07:19'),
(7, 107, 1, '2026-10-19', 'asZzxcADAdasdasxzc', NULL, '2026-10-19 07:08:34'),
(8, 101, 1, '2026-10-19', 'cZczxcZczxcxzcZXcZx', NULL, '2026-10-19 07:09:58'),
(9, 120, 1, '2026-10-21', 'pjjbxzvbbxcbvnxc vjnxc vx cvhxv', NULL, '2026-10-21 05:12:24'),
(10, 121, 1, '2026-10-25', 'ionijknkjnkjnjknkjnjk', NULL, '2026-10-25 06:27:29'),
(11, 122, 1, '2026-10-27', 'sedang diperiksa', NULL, '2026-10-27 01:55:52'),
(12, 123, 1, '2026-10-27', 'sudah diselesaikan', NULL, '2026-10-27 01:59:47'),
(13, 124, 1, '2026-10-27', NULL, 'gak jelas', '2026-10-27 02:07:35'),
(14, 129, 1, '2026-11-04', 'gfhgfhg', NULL, '2026-11-04 02:20:47'),
(15, 132, 2, '2026-11-11', 'Sedang dilakukan verifikasi akun dan reset kredensial melalui admin Srikandi.', NULL, '2026-11-11 00:20:24'),
(16, 133, 2, '2026-11-11', 'Telah diberikan pendampingan konfigurasi hak akses folder bersama dan panduan backup berkala.', NULL, '2026-11-11 00:20:25'),
(17, 134, 2, '2026-11-11', 'Akun SIPT baru telah diaktifkan dan informasi login telah dikirimkan kepada pemohon.', NULL, '2026-11-11 00:20:25'),
(18, 135, 2, '2026-11-11', 'Kabel LAN sudah di-crimping ulang, diberi label port, dan diuji konektivitasnya.', NULL, '2026-11-11 00:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0gXaAtTnwse3WCyCqHyfpAlcNLonzmceeBzAEK0k', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUDRqbm5KRkp1dHRBUG03ME5UY1YzSDNuWTZoUGhlT1ViSEVla2lWRyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3JlcXVlc3RzLzEwMyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVxdWVzdHMvMTAzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1793751108),
('FWDSNXhZgev4wWeoA5Owi5FgCOO2DX8RpQTvIgbO', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWRPWVJycHE3NHpwQ3JhN1ZaRnl1cExVQzZXYzlraXpic0V0enFSZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1793761600),
('PlfxaN1WuYG9cSCqGeSr56nVwmaTbxtHBew7Hh5z', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWUwyaUJIRTR4eG5ZbjhUazhqQWxzeklTZ3dBOEZ4RlkxdWhEN1R1QiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvaW5jaWRlbnRzLzExOCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1793759709),
('u8MVKlIxRUjkzeXqgrHHu0jtmkXnmE773d1e4fD8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/156.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidTBDQjlNMm1ySVVDUmtwZnhkWXlLVUxGMUhaQ3NucXRBSzRLNXZNTSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDEvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1793596491);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'string',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `group`, `type`, `description`, `created_at`, `updated_at`) VALUES
(1, 'fonnte_token', 'SczcdmPFCL8K7dKT9s6n', 'whatsapp', 'string', 'Token API akun Fonnte WhatsApp Gateway', '2026-10-20 20:28:24', '2026-10-20 20:47:47'),
(2, 'fonnte_enabled', 'true', 'whatsapp', 'boolean', 'Status aktif integrasi WhatsApp Gateway', '2026-10-20 20:28:24', '2026-10-20 20:28:24'),
(3, 'fonnte_target_admin', '089692562998', 'whatsapp', 'string', 'Nomor WhatsApp tambahan atau ID grup Tim IT BPOM (dipisahkan koma)', '2026-10-20 20:28:24', '2026-10-21 16:09:39'),
(4, 'email_notification_enabled', 'false', 'notification', 'boolean', 'Status aktif notifikasi email saat status tiket selesai', '2026-10-20 20:28:25', '2026-10-20 20:28:25'),
(7, 'fonnte_use_queue_worker', 'false', 'whatsapp', 'boolean', 'Gunakan antrean worker database (queue:work)', '2026-10-20 20:47:47', '2026-10-20 20:47:47'),
(8, 'fonnte_sender_device', '6285172136998', 'whatsapp', 'string', 'Nomor WhatsApp perangkat pengirim', '2026-10-21 16:10:00', '2026-10-21 16:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_aduan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kendala` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lainnya',
  `asset_id` bigint UNSIGNED DEFAULT NULL,
  `pelapor_id` bigint UNSIGNED NOT NULL,
  `reported_by` bigint UNSIGNED DEFAULT NULL,
  `tgl_pelaporan` date NOT NULL,
  `deskripsi_masalah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_kendala` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Belum diperiksa','Sedang diproses','Selesai','Ditolak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum diperiksa',
  `completed_at` timestamp NULL DEFAULT NULL,
  `konfirmasi_selesai_at` timestamp NULL DEFAULT NULL,
  `is_konfirmasi_otomatis` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `nomor_aduan`, `jenis_kendala`, `asset_id`, `pelapor_id`, `reported_by`, `tgl_pelaporan`, `deskripsi_masalah`, `foto_kendala`, `status`, `completed_at`, `konfirmasi_selesai_at`, `is_konfirmasi_otomatis`, `created_at`, `deleted_at`) VALUES
(1, 'TIK-20260614-0001', 'aset', 2, 2, NULL, '2026-06-14', 'Et molestiae consequatur reiciendis aut quis et. Voluptatibus sunt corrupti impedit quia. Nesciunt libero aut nulla aut. Expedita accusantium nemo quasi maiores et odio sed. Qui ducimus temporibus quia magni dolorum possimus nesciunt aut.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-06-14 13:15:25', NULL),
(2, 'TIK-20260708-0002', 'aset', 80, 3, NULL, '2026-07-08', 'Quo est minima molestias hic similique. Sequi eos voluptate delectus omnis vel ex eum magni. Veniam aut soluta officiis est dicta. Alias fugit qui sint qui ea libero quibusdam blanditiis.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-07-08 13:21:27', NULL),
(3, 'TIK-20260529-0003', 'aset', 51, 1, NULL, '2026-05-29', 'Et dicta animi excepturi enim soluta ut. Aspernatur et velit occaecati excepturi ratione. Voluptas amet alias recusandae hic eligendi quia.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-05-29 09:14:18', NULL),
(4, 'TIK-20260415-0004', 'aset', 65, 2, NULL, '2026-04-15', 'Eos perferendis dolorum ut dolores cumque. Sit non qui assumenda. Alias est ut incidunt a commodi est delectus quia. Quo error molestiae quae ullam repellat minima id.', 'dummy_38abda4d-54f8-35f1-a2f7-e13e7c678ee8.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-04-15 11:33:05', NULL),
(5, 'TIK-20260614-0005', 'aset', 47, 1, NULL, '2026-06-14', 'Iusto unde rerum consequatur quo id animi ut. Deleniti earum autem tenetur. Consequatur dolorum quidem nam ullam dicta neque.', NULL, 'Selesai', '2026-06-14 12:08:00', NULL, 0, '2026-06-14 12:08:00', NULL),
(6, 'TIK-20260906-0006', 'aset', 75, 2, NULL, '2026-09-06', 'Quisquam dicta nihil et cupiditate harum aliquam aut. Occaecati suscipit voluptatem voluptatem nam autem excepturi pariatur. Error deleniti incidunt exercitationem soluta.', 'dummy_b6739aec-6602-3364-8813-3d893641ac9f.jpg', 'Ditolak', NULL, NULL, 0, '2026-09-06 00:15:02', NULL),
(7, 'TIK-20260719-0007', 'aset', 55, 2, NULL, '2026-07-19', 'Praesentium quae officiis laudantium. Voluptatem et architecto qui. Iusto sunt iure necessitatibus nisi in labore ab.', 'dummy_79720f1a-b4fc-3317-bce0-1fd097a5fe6c.jpg', 'Ditolak', NULL, NULL, 0, '2026-07-18 19:08:09', NULL),
(8, 'TIK-20260918-0008', 'aset', 39, 3, NULL, '2026-09-18', 'Consequatur sed ratione sapiente harum autem quibusdam qui. Ratione vitae quae quo nemo eos earum animi. Iste laudantium numquam laboriosam qui ab fugit.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-18 06:21:12', NULL),
(9, 'TIK-20260706-0009', 'aset', 67, 1, NULL, '2026-07-06', 'Maxime sed aliquam aliquid provident vel. Magnam exercitationem et est hic error cupiditate vitae. Velit voluptatem est eligendi veritatis dolores molestias.', NULL, 'Ditolak', NULL, NULL, 0, '2026-07-06 01:27:13', NULL),
(10, 'TIK-20260530-0010', 'aset', 74, 2, NULL, '2026-05-30', 'Ut libero maxime adipisci repudiandae et eligendi nostrum. Aut non dicta tenetur id et at accusantium.', NULL, 'Selesai', '2026-05-30 01:00:00', NULL, 0, '2026-05-30 01:00:00', NULL),
(11, 'TIK-20260421-0011', 'aset', 60, 3, NULL, '2026-04-21', 'Est mollitia consequatur sunt veniam soluta. Et recusandae veritatis consequatur laudantium enim. Officiis aut officia libero voluptate accusantium ut nobis. Aliquid quo praesentium quia blanditiis qui explicabo voluptatibus.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-04-20 19:16:36', NULL),
(12, 'TIK-20260725-0012', 'aset', 73, 3, NULL, '2026-07-25', 'Sint totam quidem ut minima corrupti qui id. Harum amet ea sed aut. Pariatur hic tenetur qui rerum. Qui est quia eveniet quo placeat libero.', NULL, 'Ditolak', NULL, NULL, 0, '2026-07-25 02:30:44', NULL),
(13, 'TIK-20260413-0013', 'aset', 25, 2, NULL, '2026-04-13', 'Quasi recusandae commodi aut quis totam reprehenderit. Ea quidem aliquid sunt. Excepturi modi magnam adipisci quisquam dolorum. Mollitia voluptate aut enim quo. Corporis vero qui rem qui quas.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-04-13 05:53:38', NULL),
(14, 'TIK-20260917-0014', 'aset', 50, 2, NULL, '2026-09-17', 'Nisi molestiae inventore sequi nihil expedita corporis. Ut laboriosam pariatur aut aut. Ab dolores sed quia voluptas nemo pariatur.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-09-17 02:41:37', NULL),
(15, 'TIK-20260522-0015', 'aset', 98, 3, NULL, '2026-05-22', 'Ipsum ducimus minus nesciunt qui. Expedita minus assumenda repellendus natus. Excepturi omnis incidunt nostrum accusamus. Aut rem quia et assumenda omnis.', NULL, 'Selesai', '2026-05-22 12:31:52', NULL, 0, '2026-05-22 12:31:52', NULL),
(16, 'TIK-20260905-0016', 'aset', 11, 1, NULL, '2026-09-05', 'Veritatis sed veniam ipsam voluptatibus. Quis sunt eaque ipsum consequatur est consequatur porro. Ut et quibusdam libero non est eum repellendus corrupti. Ut eos vitae accusamus dolorem maiores veritatis.', NULL, 'Selesai', '2026-09-05 06:03:19', NULL, 0, '2026-09-05 06:03:19', NULL),
(17, 'TIK-20260924-0017', 'aset', 58, 3, NULL, '2026-09-24', 'Consequatur ipsa magni quia ut. Consequuntur praesentium incidunt et id itaque quos.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-09-24 09:17:43', NULL),
(18, 'TIK-20260408-0018', 'aset', 49, 2, NULL, '2026-04-08', 'A omnis ullam autem enim libero libero neque. Reiciendis a excepturi sit dolorem iste quis in et. Qui error quaerat sint aut dolorem sapiente quasi. Non sunt molestias dolor deserunt sunt vitae fugit.', NULL, 'Selesai', '2026-04-07 20:36:42', NULL, 0, '2026-04-07 20:36:42', NULL),
(19, 'TIK-20260605-0019', 'aset', 22, 1, NULL, '2026-06-05', 'Quas quisquam illum officiis. Beatae illo officiis dicta omnis maiores. Laudantium sint inventore facere totam dolor.', 'dummy_cb2be985-b9c3-3d4c-8f97-bc38bdec17e0.jpg', 'Ditolak', NULL, NULL, 0, '2026-06-05 00:54:26', NULL),
(20, 'TIK-20260818-0020', 'aset', 100, 2, NULL, '2026-08-18', 'Non possimus et quia. Sapiente fugiat harum molestiae saepe consectetur a velit. Quis est expedita quasi ipsam laboriosam voluptatem quas. Qui ut dolor qui fugit.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-08-17 22:02:54', NULL),
(21, 'TIK-20260417-0021', 'aset', 20, 1, NULL, '2026-04-17', 'Explicabo suscipit deserunt quas placeat voluptas rerum quidem. Repudiandae adipisci eos nemo animi dignissimos sit quae. Quos nemo voluptatibus hic aut aliquam labore omnis.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-04-17 12:40:29', NULL),
(22, 'TIK-20260527-0022', 'aset', 64, 3, NULL, '2026-05-27', 'Et culpa consectetur voluptate perferendis aut ut possimus repellendus. Aut autem vel excepturi deleniti neque explicabo et. Occaecati ab molestiae nesciunt voluptatum.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-05-27 05:21:30', NULL),
(23, 'TIK-20260723-0023', 'aset', 89, 1, NULL, '2026-07-23', 'Quis aut non quibusdam facilis. Voluptatem molestias dolor consequuntur exercitationem est est et. Commodi ad facilis praesentium adipisci.', NULL, 'Selesai', '2026-07-23 11:34:21', NULL, 0, '2026-07-23 11:34:21', NULL),
(24, 'TIK-20260523-0024', 'aset', 45, 3, NULL, '2026-05-23', 'Quia qui nisi aspernatur autem. Quis illo quidem autem dolorem nam est ea sit.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-05-23 04:30:16', NULL),
(25, 'TIK-20260703-0025', 'aset', 4, 3, NULL, '2026-07-03', 'Ut voluptate voluptate sunt omnis et modi. Et voluptas repellat velit dicta beatae voluptas vitae natus. Debitis quibusdam repudiandae ut magnam omnis. Et aut dolorem temporibus repellendus ut.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-07-02 20:21:58', NULL),
(26, 'TIK-20260722-0026', 'aset', 25, 2, NULL, '2026-07-22', 'Repellat at sed aut doloribus veritatis in. Pariatur cupiditate ipsam sequi quia explicabo quod aut.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-07-22 04:21:40', NULL),
(27, 'TIK-20260821-0027', 'aset', 92, 1, NULL, '2026-08-21', 'Quo aliquam nulla ipsa blanditiis molestias voluptatem. Nostrum provident ea sunt. Necessitatibus id at rerum nihil quod. Veritatis et temporibus qui soluta.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-08-21 09:42:12', NULL),
(28, 'TIK-20260602-0028', 'aset', 84, 1, NULL, '2026-06-02', 'Ullam quia veniam et dolorem corporis totam mollitia vitae. Aut corporis suscipit recusandae suscipit. Fugit natus et quo perspiciatis quae ipsam eum. Enim pariatur voluptas praesentium dolor voluptas.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-06-02 15:51:23', NULL),
(29, 'TIK-20260613-0029', 'aset', 57, 2, NULL, '2026-06-13', 'Odit possimus perspiciatis dolore voluptatem ut accusantium modi. Qui iure quis voluptates voluptatem totam. Libero atque omnis officia voluptas qui occaecati voluptas laboriosam.', NULL, 'Ditolak', NULL, NULL, 0, '2026-06-13 06:33:56', NULL),
(30, 'TIK-20260927-0030', 'aset', 95, 2, NULL, '2026-09-27', 'Est excepturi veritatis sunt id. Debitis ut et inventore quia unde quos. Ut accusamus impedit voluptas ab molestiae qui laudantium. Sapiente deserunt unde quo corporis. Animi qui ut id non ipsum architecto voluptates.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-09-26 16:44:53', NULL),
(31, 'TIK-20260820-0031', 'aset', 31, 1, NULL, '2026-08-20', 'Ipsa velit debitis sequi dolores qui sit. Illum voluptatem in nisi asperiores placeat eum. Dolorem aliquid dolorem ullam quasi maiores qui et id. Eum sequi ipsa laboriosam ut. Dolores velit sequi tempora placeat assumenda error.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-08-19 23:04:03', NULL),
(32, 'TIK-20260929-0032', 'aset', 5, 2, NULL, '2026-09-29', 'Consequatur amet nobis numquam necessitatibus vero velit nesciunt laudantium. Ducimus voluptatum vel consequatur laborum sit quia inventore. Ipsam doloribus rerum qui aut labore pariatur.', 'dummy_7bf1cb3c-5cef-33ac-bbc7-a0ee3b31d2df.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-09-28 22:55:52', NULL),
(33, 'TIK-20260417-0033', 'aset', 57, 2, NULL, '2026-04-17', 'Tempore impedit similique omnis laborum qui. Omnis vel minima voluptatum aut dolorum dicta sint. Ut dolores tempore perspiciatis delectus inventore sed ipsa cumque.', 'dummy_d1969d6c-4784-3cba-b892-4fe32a767d6f.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-04-17 11:58:38', NULL),
(34, 'TIK-20260416-0034', 'aset', 32, 2, NULL, '2026-04-16', 'Illum praesentium atque aut. Ex et labore quaerat. Accusamus non soluta et culpa dolor ut et voluptas.', NULL, 'Ditolak', NULL, NULL, 0, '2026-04-16 09:58:45', NULL),
(35, 'TIK-20260826-0035', 'aset', 63, 1, NULL, '2026-08-26', 'Qui sit adipisci rem. Qui sit iusto illo reiciendis id laboriosam labore. Quidem odit itaque dolor aperiam. Eveniet laborum eligendi non nobis.', NULL, 'Ditolak', NULL, NULL, 0, '2026-08-26 14:30:31', NULL),
(36, 'TIK-20260929-0036', 'aset', 77, 3, NULL, '2026-09-29', 'Expedita rem et et dolorem molestiae enim a. Iusto architecto ipsam hic non. Aut non ut ut nihil sit aut aut.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-09-28 19:35:53', NULL),
(37, 'TIK-20260715-0037', 'aset', 51, 3, NULL, '2026-07-15', 'Quia quis corrupti nemo voluptatem. Molestiae explicabo numquam repudiandae quae vero iste aut voluptas. Sequi vero beatae distinctio animi accusantium sint facere.', 'dummy_672676a5-147e-3469-8787-8a4fd6e11ad1.jpg', 'Selesai', '2026-07-15 13:57:36', NULL, 0, '2026-07-15 13:57:36', NULL),
(38, 'TIK-20260511-0038', 'aset', 22, 3, NULL, '2026-05-11', 'Et qui consequatur id fuga in veritatis illo praesentium. Magni quo placeat excepturi omnis. Ut expedita rerum voluptate quaerat et et. Esse qui ipsum quia quasi.', NULL, 'Selesai', '2026-05-11 03:28:55', NULL, 0, '2026-05-11 03:28:55', NULL),
(39, 'TIK-20261002-0039', 'aset', 33, 1, NULL, '2026-10-02', 'Mollitia nihil provident omnis deleniti id deleniti sed. Et enim quas nesciunt voluptas repellendus perferendis est vel. Quo enim dolorem deserunt libero praesentium.', NULL, 'Selesai', '2026-10-02 09:08:43', NULL, 0, '2026-10-02 09:08:43', NULL),
(40, 'TIK-20260822-0040', 'aset', 9, 1, NULL, '2026-08-22', 'Quis laborum eveniet cupiditate impedit dicta. Quisquam ea omnis dolor at tempore eum nam. Ut esse qui repellendus aliquid et. Animi nihil labore aliquam omnis aut.', NULL, 'Selesai', '2026-08-22 12:15:58', NULL, 0, '2026-08-22 12:15:58', NULL),
(41, 'TIK-20260718-0041', 'aset', 14, 1, NULL, '2026-07-18', 'Nisi officia sunt nam quidem fugit dolores voluptas. Dolor tempora inventore vero dignissimos delectus sed. Provident beatae molestias porro rerum omnis vitae.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-07-18 03:19:00', NULL),
(42, 'TIK-20260605-0042', 'aset', 47, 3, NULL, '2026-06-05', 'Libero rerum veritatis quaerat numquam perspiciatis aut unde. Ipsam aut quia quasi quibusdam. Et in aut voluptatum cum ex.', 'dummy_af8c419d-d42a-362f-b0ff-8762c94cfa5f.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-06-05 06:09:57', NULL),
(43, 'TIK-20260914-0043', 'aset', 15, 2, NULL, '2026-09-14', 'Omnis cum nihil illum perspiciatis. Illo cupiditate quis dolores dolor voluptate facere. Accusamus nemo cumque dolor et ut accusamus et. Aperiam cum voluptatem ad numquam quia.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-14 12:43:04', NULL),
(44, 'TIK-20260729-0044', 'aset', 13, 2, NULL, '2026-07-29', 'Deleniti occaecati eos alias id. Quas exercitationem quas temporibus voluptas. Velit id qui tempore alias aperiam.', NULL, 'Selesai', '2026-07-29 01:58:11', NULL, 0, '2026-07-29 01:58:11', NULL),
(45, 'TIK-20260406-0045', 'aset', 48, 2, NULL, '2026-04-06', 'Et dolor voluptatem minus qui dignissimos voluptas laborum. Culpa velit consectetur occaecati quos nulla. Harum hic sit harum. Placeat et itaque sequi non dicta nihil doloribus.', 'dummy_43a545d3-04ff-36aa-9917-46354d495b87.jpg', 'Selesai', '2026-04-06 13:35:03', NULL, 0, '2026-04-06 13:35:03', NULL),
(46, 'TIK-20260706-0046', 'aset', 97, 2, NULL, '2026-07-06', 'Eaque ea unde laudantium voluptate omnis illum expedita veritatis. Cumque dolorem accusantium consequatur et rerum.', 'dummy_2098bbd9-7aca-30db-b707-fa0291c877a5.jpg', 'Ditolak', NULL, NULL, 0, '2026-07-06 09:41:44', NULL),
(47, 'TIK-20260915-0047', 'aset', 38, 3, NULL, '2026-09-15', 'Possimus omnis voluptas ipsum. Optio sunt sapiente eos et ad incidunt est. Voluptatem minus velit repellendus quisquam laborum sit.', NULL, 'Selesai', '2026-09-15 10:30:00', '2026-09-17 10:30:00', 1, '2026-09-15 10:30:00', NULL),
(48, 'TIK-20260630-0048', 'aset', 75, 3, NULL, '2026-06-30', 'Fugit voluptas possimus nihil consectetur exercitationem voluptas. Adipisci voluptas accusantium incidunt repudiandae. Assumenda ut non minima qui.', NULL, 'Selesai', '2026-06-29 19:45:42', NULL, 0, '2026-06-29 19:45:42', NULL),
(49, 'TIK-20260808-0049', 'aset', 15, 1, NULL, '2026-08-08', 'Sed officiis reprehenderit esse non consequuntur nam autem. In esse officiis odio nulla ducimus.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-08-07 22:30:08', NULL),
(50, 'TIK-20260929-0050', 'aset', 32, 2, NULL, '2026-09-29', 'Dolor dignissimos voluptas deleniti vitae sequi sit quia. Dolor non quis error ipsam tempora autem. Quae aliquid fugit fugit.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-29 04:59:50', NULL),
(51, 'TIK-20260419-0051', 'aset', 39, 3, NULL, '2026-04-19', 'Omnis doloribus sit optio autem aperiam architecto. Sint ut ut quisquam. Consequuntur laboriosam assumenda animi ratione soluta rerum.', NULL, 'Ditolak', NULL, NULL, 0, '2026-04-19 01:19:14', NULL),
(52, 'TIK-20260827-0052', 'aset', 90, 3, NULL, '2026-08-27', 'Quas iusto dignissimos odio. Aliquid suscipit aut facere consequuntur consequatur quo incidunt.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-08-27 05:56:06', NULL),
(53, 'TIK-20260814-0053', 'aset', 13, 2, NULL, '2026-08-14', 'Rerum id nihil corporis est aut in et. Earum quasi rem est optio maxime. Aspernatur assumenda et non dicta. Aut tempore rerum veritatis cupiditate mollitia doloribus vel. Quos molestias impedit nisi quisquam ea.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-08-14 03:54:05', NULL),
(54, 'TIK-20260709-0054', 'aset', 76, 3, NULL, '2026-07-09', 'Qui nemo totam eaque ab consequatur illo possimus. Explicabo placeat est est temporibus excepturi soluta. Et dolores consequatur ducimus accusantium recusandae ad. Reprehenderit impedit velit itaque eum.', 'dummy_f858192b-0832-30b7-87e3-9c5dc9461b5b.jpg', 'Selesai', '2026-07-09 05:54:36', NULL, 0, '2026-07-09 05:54:36', NULL),
(55, 'TIK-20260923-0055', 'aset', 19, 1, NULL, '2026-09-23', 'Aut praesentium dolor deleniti dolore deleniti perspiciatis. Saepe animi voluptas eligendi qui. Inventore et quaerat aliquid omnis repellendus unde.', NULL, 'Selesai', '2026-09-22 21:10:43', NULL, 0, '2026-09-22 21:10:43', NULL),
(56, 'TIK-20260809-0056', 'aset', 16, 2, NULL, '2026-08-09', 'Repudiandae itaque error dignissimos odit voluptatem quia. Quam dolores et sint necessitatibus quo deleniti. Et quia vel est dolorem.', 'dummy_4d8c9d08-87b3-3ebf-a3c6-7ecf94a39e4c.jpg', 'Sedang diproses', NULL, NULL, 0, '2026-08-09 09:18:52', NULL),
(57, 'TIK-20260824-0057', 'aset', 44, 1, NULL, '2026-08-24', 'Minima et aut sit consectetur aspernatur. Aut atque sunt fuga voluptatem. Fugit fugiat sapiente eum adipisci aut. Itaque laborum explicabo explicabo quae harum corporis in voluptates.', NULL, 'Selesai', '2026-08-23 17:18:08', NULL, 0, '2026-08-23 17:18:08', NULL),
(58, 'TIK-20260504-0058', 'aset', 95, 3, NULL, '2026-05-04', 'Ab dolores nihil veritatis unde. Magnam dicta iusto libero et debitis veniam. Maxime explicabo est aut minus.', NULL, 'Selesai', '2026-05-04 14:47:26', NULL, 0, '2026-05-04 14:47:26', NULL),
(59, 'TIK-20260823-0059', 'aset', 61, 3, NULL, '2026-08-23', 'Eum soluta et fuga minus qui. Praesentium architecto debitis iusto velit numquam in. Quis earum et aut aspernatur nihil non. Quia ut quas distinctio temporibus magnam.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-08-22 19:09:45', NULL),
(60, 'TIK-20260510-0060', 'aset', 94, 3, NULL, '2026-05-10', 'Est tenetur aut maxime culpa rem. Et illo iure voluptates quae omnis aliquid magni. Corporis rem aut sequi commodi dolor. Ea rerum qui vel incidunt blanditiis.', NULL, 'Ditolak', NULL, NULL, 0, '2026-05-09 18:41:19', NULL),
(61, 'TIK-20260719-0061', 'aset', 29, 2, NULL, '2026-07-19', 'Eos distinctio dolor id voluptatum. Iste consequatur dolorum vel delectus praesentium est. Maxime voluptatum eius dolores est. Aperiam laborum autem voluptatem illo.', NULL, 'Ditolak', NULL, NULL, 0, '2026-07-19 09:07:30', NULL),
(62, 'TIK-20260921-0062', 'aset', 88, 2, NULL, '2026-09-21', 'Quaerat quibusdam voluptatem est culpa nam ea explicabo sit. Asperiores vitae nesciunt eveniet et ab debitis.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-09-21 01:40:18', NULL),
(63, 'TIK-20260512-0063', 'aset', 1, 2, NULL, '2026-05-12', 'Ipsam at iure voluptate aliquam ad. Voluptates eaque dolores labore. Officia explicabo quis et qui omnis tempore.', NULL, 'Ditolak', NULL, NULL, 0, '2026-05-12 04:28:40', NULL),
(64, 'TIK-20260608-0064', 'aset', 78, 1, NULL, '2026-06-08', 'Dicta laboriosam fugiat ut eos at sit. Iure saepe rerum minus eum recusandae magni voluptas quisquam. Beatae id mollitia debitis vel placeat est. Aut molestiae magni sequi quo.', NULL, 'Selesai', '2026-06-08 05:16:24', NULL, 0, '2026-06-08 05:16:24', NULL),
(65, 'TIK-20260413-0065', 'aset', 26, 1, NULL, '2026-04-13', 'Tempore cupiditate harum modi reprehenderit eos ut recusandae et. Ea dolor voluptas consequatur neque. Rerum quis fuga perferendis maiores.', 'dummy_1bdac745-b264-356d-8bc1-131b67a59c2e.jpg', 'Selesai', '2026-04-13 11:54:58', NULL, 0, '2026-04-13 11:54:58', NULL),
(66, 'TIK-20260410-0066', 'aset', 77, 2, NULL, '2026-04-10', 'Perspiciatis suscipit magni nulla qui odio adipisci qui ratione. Sint sit temporibus eligendi quos inventore porro unde. Beatae quia dolorem alias minima sed. Molestiae adipisci sapiente architecto commodi in deleniti repellat nemo.', 'dummy_2384da52-e5ca-304b-be81-0d1d21b8cc1e.jpg', 'Sedang diproses', NULL, NULL, 0, '2026-04-09 22:19:56', NULL),
(67, 'TIK-20260916-0067', 'aset', 33, 1, NULL, '2026-09-16', 'Animi rerum qui quo. Qui sed vero explicabo ut facilis et distinctio et. Architecto odit maiores voluptates.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-09-16 04:11:58', NULL),
(68, 'TIK-20260818-0068', 'aset', 82, 1, NULL, '2026-08-18', 'Doloribus cumque ex possimus enim rerum. Incidunt aut labore nulla. Voluptatem perferendis eligendi voluptatem sunt accusamus enim dolor. Accusantium ducimus ea sunt repellendus voluptate qui dicta. Dolorum sit delectus id suscipit quam.', NULL, 'Ditolak', NULL, NULL, 0, '2026-08-18 03:12:55', NULL),
(69, 'TIK-20260429-0069', 'aset', 70, 2, NULL, '2026-04-29', 'Error ut vero quam. Ut quos est blanditiis. Est adipisci perferendis numquam laboriosam ut. Harum impedit vero quis ratione repudiandae deserunt.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-04-29 11:54:24', NULL),
(70, 'TIK-20260421-0070', 'aset', 60, 3, NULL, '2026-04-21', 'Et aliquam impedit ut architecto velit. Impedit tempora placeat aliquid atque vero laboriosam ipsa. Dicta consequuntur eos et.', 'dummy_8ead6248-4dc1-31fd-9653-4612fd18eeab.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-04-20 17:28:44', NULL),
(71, 'TIK-20260712-0071', 'aset', 81, 1, NULL, '2026-07-12', 'Rem animi laborum facere repellat vero optio sed eos. Asperiores inventore ullam placeat. Tempore veniam sit sunt. Et eius veniam et et possimus qui tempore.', NULL, 'Selesai', '2026-07-12 02:48:13', NULL, 0, '2026-07-12 02:48:13', NULL),
(72, 'TIK-20260517-0072', 'aset', 61, 3, NULL, '2026-05-17', 'Sed perspiciatis nobis tempora voluptas. Alias iusto harum placeat nobis. Est praesentium nobis voluptatum blanditiis beatae modi ipsam. Et rerum ipsa minus saepe.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-05-17 10:52:49', NULL),
(73, 'TIK-20260717-0073', 'aset', 48, 1, NULL, '2026-07-17', 'Est qui eaque repellat aut modi repudiandae. Error quae occaecati minus ad quidem autem voluptas. Placeat ullam sit in. Laboriosam in dignissimos assumenda atque esse aut nobis.', NULL, 'Ditolak', NULL, NULL, 0, '2026-07-16 23:40:43', NULL),
(74, 'TIK-20260611-0074', 'aset', 43, 3, NULL, '2026-06-11', 'Beatae occaecati sit id minus. Fugiat facere sint quis nostrum nam dolore qui minus. Voluptatibus tempore veniam impedit iure eaque fugit eos. Quasi itaque aspernatur quasi commodi.', NULL, 'Selesai', '2026-06-11 15:28:18', NULL, 0, '2026-06-11 15:28:18', NULL),
(75, 'TIK-20260621-0075', 'aset', 36, 3, NULL, '2026-06-21', 'Atque fuga nihil alias fugiat magni illo. Dolore veniam nesciunt enim tenetur quam neque. Iste suscipit molestiae minus occaecati ut et qui. Earum in odio quaerat.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-06-21 06:16:45', NULL),
(76, 'TIK-20260627-0076', 'aset', 76, 2, NULL, '2026-06-27', 'Ea omnis eaque quisquam vel asperiores. Repellendus qui dolore tenetur deserunt aut. Rerum aut illo ratione consequuntur voluptate consequatur. Aliquam voluptatem dolores iusto ut.', NULL, 'Ditolak', NULL, NULL, 0, '2026-06-27 01:26:20', NULL),
(77, 'TIK-20260817-0077', 'aset', 39, 1, NULL, '2026-08-17', 'Vero modi quo ut vero. Fugiat rem voluptatibus quisquam. Perspiciatis vero dolor non ea iure ut.', 'dummy_e58582a3-7737-3aa2-abab-08ec3388736e.jpg', 'Sedang diproses', NULL, NULL, 0, '2026-08-17 13:00:47', NULL),
(78, 'TIK-20260713-0078', 'aset', 42, 3, NULL, '2026-07-13', 'Cum tenetur atque alias nam sit. Ullam consectetur praesentium aut exercitationem cumque. Necessitatibus id minus esse qui.', NULL, 'Ditolak', NULL, NULL, 0, '2026-07-13 08:50:41', NULL),
(79, 'TIK-20260608-0079', 'aset', 50, 1, NULL, '2026-06-08', 'Aut amet autem quae at itaque rerum dolores est. Alias excepturi voluptas dolor error est quo ut. Distinctio recusandae excepturi maiores voluptas. Voluptatem ratione et recusandae quo sint nobis.', 'dummy_1570e51b-e34f-3594-ae7b-51e5486126cd.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-06-08 04:09:57', NULL),
(80, 'TIK-20260511-0080', 'aset', 62, 1, NULL, '2026-05-11', 'Officiis doloremque temporibus dolorum veritatis aut in distinctio. Ad voluptatem consectetur et. Voluptatem est atque est sed. Fuga aut non rerum alias quod velit.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-05-11 12:55:36', NULL),
(81, 'TIK-20260714-0081', 'aset', 10, 2, NULL, '2026-07-14', 'Eum repudiandae sequi aut voluptates tenetur velit. Vel rerum aliquid ipsum est ipsum ullam non. Magnam saepe perferendis dolores dolor earum.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-07-13 19:47:58', NULL),
(82, 'TIK-20260515-0082', 'aset', 70, 2, NULL, '2026-05-15', 'Earum dolorem et sed enim itaque et voluptas. Est omnis ipsam nisi fugiat. Tenetur quidem nam consectetur id nesciunt. Eum corporis et voluptate a est doloremque.', NULL, 'Selesai', '2026-05-15 08:36:18', NULL, 0, '2026-05-15 08:36:18', NULL),
(83, 'TIK-20260915-0083', 'aset', 38, 2, NULL, '2026-09-15', 'Ut totam eos cum reprehenderit occaecati laboriosam in molestias. Dignissimos reiciendis est qui necessitatibus eveniet quia. Fugiat rerum sed neque et. Harum odit similique sunt molestias.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-14 22:13:08', NULL),
(84, 'TIK-20260919-0084', 'aset', 65, 3, NULL, '2026-09-19', 'Quis voluptatem doloremque vitae ratione voluptates quidem quis. Optio odit facere molestiae ad doloremque libero. Incidunt ea dolorem sunt aut harum non veritatis.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-18 19:33:54', NULL),
(85, 'TIK-20260703-0085', 'aset', 9, 1, NULL, '2026-07-03', 'Sit itaque temporibus vel commodi dolores voluptatem beatae. Et similique molestiae voluptate voluptatum necessitatibus ducimus. Alias autem voluptas illum consectetur. Molestiae molestias itaque quos atque dolorum quisquam qui.', NULL, 'Selesai', '2026-07-02 18:32:28', NULL, 0, '2026-07-02 18:32:28', NULL),
(86, 'TIK-20260823-0086', 'aset', 45, 1, NULL, '2026-08-23', 'Magni officia eum veritatis. Nulla iusto id est. Incidunt provident quae asperiores veritatis corrupti qui culpa. Quisquam consequatur ad necessitatibus blanditiis magni atque et.', NULL, 'Selesai', '2026-08-23 05:12:25', NULL, 0, '2026-08-23 05:12:25', NULL),
(87, 'TIK-20260826-0087', 'aset', 19, 2, NULL, '2026-08-26', 'Debitis magnam velit officiis et et. Quidem ut quia beatae rerum fugiat recusandae recusandae. Consequatur temporibus assumenda dolor ratione id.', 'dummy_9c76c9ff-4092-30cf-b80d-545d0f4fc06f.jpg', 'Sedang diproses', NULL, NULL, 0, '2026-08-25 18:58:50', NULL),
(88, 'TIK-20260821-0088', 'aset', 41, 3, NULL, '2026-08-21', 'Blanditiis qui ut voluptatem et veritatis praesentium. Quia quis nihil maiores voluptatem voluptas nihil. Ipsam voluptatibus consequatur aut deleniti consequuntur reprehenderit.', NULL, 'Selesai', '2026-08-21 00:27:06', NULL, 0, '2026-08-21 00:27:06', NULL),
(89, 'TIK-20260627-0089', 'aset', 94, 1, NULL, '2026-06-27', 'Molestiae saepe sint laboriosam libero. Ratione excepturi quo corrupti. Consequatur mollitia nemo nemo officiis accusantium aut. Et perferendis iste corrupti ut. Et laudantium et quidem temporibus necessitatibus.', NULL, 'Selesai', '2026-06-26 18:08:24', NULL, 0, '2026-06-26 18:08:24', NULL),
(90, 'TIK-20260917-0090', 'aset', 35, 2, NULL, '2026-09-17', 'Perferendis quia architecto voluptates rerum iusto. Deleniti harum numquam itaque accusantium. Sed cupiditate doloribus voluptates eveniet maiores. Illum et vero recusandae eaque.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-17 09:37:56', NULL),
(91, 'TIK-20260430-0091', 'aset', 72, 2, NULL, '2026-04-30', 'Molestiae quam aut perferendis assumenda quos harum. Laboriosam doloribus qui nisi distinctio libero a ex. Quod et occaecati sint molestiae aliquam. Dolor eius veniam odit expedita.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-04-30 06:41:14', NULL),
(92, 'TIK-20260706-0092', 'aset', 33, 1, NULL, '2026-07-06', 'Autem molestiae qui nemo optio. Natus quam quos dicta.', NULL, 'Selesai', '2026-07-06 07:49:03', NULL, 0, '2026-07-06 07:49:03', NULL),
(93, 'TIK-20260605-0093', 'aset', 94, 2, NULL, '2026-06-05', 'Omnis quas sed distinctio expedita est voluptas libero impedit. Numquam qui numquam dolorem iusto quaerat provident. Qui vel delectus atque odio.', NULL, 'Ditolak', NULL, NULL, 0, '2026-06-05 00:28:04', NULL),
(94, 'TIK-20260622-0094', 'aset', 95, 3, NULL, '2026-06-22', 'Eum doloremque similique magnam dolorem. Ullam sit libero eius dignissimos quae. Unde quia voluptatem nisi accusantium et et. Sed exercitationem eum in debitis iure et tempora praesentium. Voluptates soluta unde dolorem ducimus officiis veritatis.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-06-21 20:07:06', NULL),
(95, 'TIK-20260527-0095', 'aset', 35, 1, NULL, '2026-05-27', 'Et quis dignissimos magnam est doloribus omnis saepe. Doloremque at voluptatum ipsum autem in magni et. Nisi sequi odio nulla in et recusandae.', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-05-26 19:45:36', NULL),
(96, 'TIK-20260715-0096', 'aset', 68, 1, NULL, '2026-07-15', 'Aliquid nostrum eligendi magni labore ad aut pariatur. Amet laboriosam dicta ad ad culpa. Expedita quos sequi reiciendis accusantium assumenda hic. Velit commodi quos facere tempora.', 'dummy_0977908e-0fc8-30f8-ba6c-cd421fc00a7d.jpg', 'Ditolak', NULL, NULL, 0, '2026-07-15 06:59:02', NULL),
(97, 'TIK-20260706-0097', 'aset', 86, 3, NULL, '2026-07-06', 'Possimus dolor exercitationem laboriosam mollitia quasi ut facere. Dignissimos occaecati sed aut minus neque. Et facere adipisci inventore ex.', 'dummy_f58c3a41-ed75-3570-95e7-fa8b0443b2ff.jpg', 'Belum diperiksa', NULL, NULL, 0, '2026-07-06 02:26:20', NULL),
(98, 'TIK-20260710-0098', 'aset', 32, 1, NULL, '2026-07-10', 'Voluptatum et id aliquid minima. Quo eos corporis voluptatem odio modi asperiores molestias. Qui dicta aut quia qui veniam voluptates eos totam. Soluta esse commodi autem ullam autem debitis laudantium.', NULL, 'Selesai', '2026-07-09 16:12:31', NULL, 0, '2026-07-09 16:12:31', NULL),
(99, 'TIK-20260924-0099', 'aset', 88, 2, NULL, '2026-09-24', 'Velit quod magni est aliquam molestiae quia dolorum. Tempore tempora et dolor tempore. Non iusto vel qui qui rerum molestias corporis. Qui voluptates inventore quibusdam id quasi commodi. Impedit mollitia quia dolores vel in a voluptatum.', NULL, 'Selesai', '2026-09-24 07:33:46', NULL, 0, '2026-09-24 07:33:46', NULL),
(100, 'TIK-20260922-0100', 'aset', 84, 3, NULL, '2026-09-22', 'Dolorum officia consequuntur et exercitationem dolorem sit quam. Consequatur maxime nesciunt velit facere. Enim ut architecto sed aut veniam quo consequatur.', NULL, 'Ditolak', NULL, NULL, 0, '2026-09-22 10:20:09', NULL),
(101, 'TIK-20261005-0001', 'aset', 11, 1, NULL, '2026-10-05', 'pc meledak gabisa dipake', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-10-04 18:59:08', NULL),
(102, 'TIK-20261006-0001', 'aset', 21, 1, NULL, '2026-10-06', 'printer meledak', NULL, 'Selesai', '2026-10-05 22:24:32', NULL, 0, '2026-10-05 22:24:32', NULL),
(103, 'TIK-20261007-0001', 'aset', 85, 3, NULL, '2026-10-07', 'sdasdasdasdasdasd', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-10-06 22:28:48', NULL),
(104, 'TIK-20261007-0002', 'aset', 3, 3, NULL, '2026-10-07', 'sxaxaswedwedwsxwsx', 'kendala_photos/eZxLEMiPZHLgQNHBTgyVzx5qhRHY6Dyq7IwFnqVG.png', 'Sedang diproses', NULL, NULL, 0, '2026-10-06 22:29:14', NULL),
(108, 'TIK-20261014-0001', 'aset', 1, 3, 1, '2026-10-14', 'Testing tiket atas nama pegawai lain oleh admin', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-10-13 16:36:27', NULL),
(109, 'TIK-20261014-0002', 'aset', 1, 1, NULL, '2026-10-14', 'Testing tiket admin melaporkan dirinya sendiri', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-10-13 16:36:27', NULL),
(110, 'TIK-20261014-0003', 'aset', 1, 3, NULL, '2026-10-14', 'Testing pelapor mencoba spoof pelapor_id', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-10-13 16:36:27', NULL),
(111, 'TIK-20261014-0004', 'aset', 1, 3, 1, '2026-10-14', 'Testing tiket atas nama pegawai lain oleh admin', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-10-13 16:37:35', NULL),
(112, 'TIK-20261014-0005', 'aset', 1, 1, NULL, '2026-10-14', 'Testing tiket admin melaporkan dirinya sendiri', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-10-13 16:37:35', NULL),
(113, 'TIK-20261014-0006', 'aset', 1, 3, NULL, '2026-10-14', 'Testing pelapor mencoba spoof pelapor_id', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-10-13 16:37:35', NULL),
(114, 'TIK-20261015-0001', 'aset', 4, 1, NULL, '2026-10-15', 'ga bisa chrge', NULL, 'Selesai', '2026-10-14 23:12:22', NULL, 0, '2026-10-14 23:12:22', NULL),
(115, 'TIK-20261021-0001', 'aset', 26, 3, NULL, '2026-10-21', 'dfssdvavdfdsfbdgbfsfsdfsdf', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-10-20 20:51:05', NULL),
(116, 'TIK-20261021-0002', 'aset', 3, 3, NULL, '2026-10-21', 'jSNdfianvabnasjnscnicnsjjsn', NULL, 'Selesai', '2026-10-20 21:11:15', '2026-10-22 21:11:15', 1, '2026-10-20 21:11:15', NULL),
(117, 'TIK-20261027-0001', 'aset', 30, 1, NULL, '2026-10-27', 'tidak bisa ngeprint', 'kendala_photos/TBUfmIZlnudb2F4sAWQXnzcNVSi8HieiE5MgClZ2.png', 'Selesai', '2026-10-26 18:18:56', '2026-10-28 18:18:56', 1, '2026-10-26 18:18:56', NULL),
(118, 'TIK-20261104-0001', 'aset', 1, 3, NULL, '2026-11-04', 'ramnya bermasalah', NULL, 'Selesai', '2026-11-03 18:29:17', NULL, 0, '2026-11-03 18:13:21', NULL),
(119, 'TIK-20261105-0001', 'lainnya', NULL, 1, NULL, '2026-11-05', 'asdqweqweaws', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-11-04 16:49:56', NULL),
(120, 'TIK-20261109-0001', 'aset', 7, 1, NULL, '2026-11-09', 'meledak duarrrrr', NULL, 'Selesai', '2026-11-08 19:42:53', '2026-11-08 19:43:02', 0, '2026-11-08 19:41:20', NULL),
(121, '001/SPTIK/BBPOM/11/2026', 'aset', 1, 3, NULL, '2026-11-11', '[Dummy Uji] Monitor komputer tidak tampil gambar saat dinyalakan (indikator lampu berkedip).', NULL, 'Belum diperiksa', NULL, NULL, 0, '2026-11-10 16:20:24', NULL),
(122, '002/SPTIK/BBPOM/11/2026', 'aset', 2, 3, NULL, '2026-11-11', '[Dummy Uji] Printer laserjet kantor mengalami paper jam permanen dan fuser rusak perlu perbaikan vendor Pihak ke-3.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-11-10 16:20:24', NULL),
(123, '003/SPTIK/BBPOM/11/2026', 'lainnya', NULL, 3, NULL, '2026-11-11', '[Dummy Uji] Akses Wi-Fi BPOM-Secure di ruang laboratorium sering terputus tiap 15 menit.', NULL, 'Sedang diproses', NULL, NULL, 0, '2026-11-10 16:20:24', NULL),
(124, '004/SPTIK/BBPOM/11/2026', 'lainnya', NULL, 3, NULL, '2026-11-11', '[Dummy Uji] Akun email dinas BBPOM gagal sinkronisasi pada aplikasi Outlook desktop.', NULL, 'Selesai', '2026-11-10 13:20:24', NULL, 0, '2026-11-10 16:20:24', NULL),
(125, '005/SPTIK/BBPOM/11/2026', 'aset', 3, 3, NULL, '2026-11-11', '[Dummy Uji] UPS Server ruangan lab berbunyi beep terus-menerus dan baterai drop.', NULL, 'Selesai', '2026-11-09 20:20:24', '2026-11-10 11:20:24', 0, '2026-11-10 16:20:24', NULL),
(126, '006/SPTIK/BBPOM/11/2026', 'lainnya', NULL, 3, NULL, '2026-11-11', '[Dummy Uji] Aplikasi pelaporan internal tidak dapat mencetak PDF karena popup terblokir.', NULL, 'Selesai', '2026-11-07 16:20:24', NULL, 0, '2026-11-10 16:20:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_histories`
--

CREATE TABLE `ticket_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `status_label` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_histories`
--

INSERT INTO `ticket_histories` (`id`, `ticket_id`, `status_label`, `keterangan`, `created_at`) VALUES
(1, 1, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-14 13:15:25'),
(2, 2, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-08 13:21:27'),
(3, 3, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-29 09:14:18'),
(4, 4, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-15 11:33:05'),
(5, 5, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-14 12:08:00'),
(6, 5, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:47'),
(7, 6, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-06 00:15:02'),
(8, 7, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-18 19:08:09'),
(9, 8, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-18 06:21:12'),
(10, 9, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-06 01:27:13'),
(11, 10, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-30 01:00:00'),
(12, 10, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(13, 11, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-20 19:16:36'),
(14, 11, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(15, 12, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-25 02:30:44'),
(16, 13, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-13 05:53:38'),
(17, 14, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-17 02:41:37'),
(18, 14, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(19, 15, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-22 12:31:52'),
(20, 15, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(21, 16, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-05 06:03:19'),
(22, 16, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(23, 17, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-24 09:17:43'),
(24, 17, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(25, 18, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-07 20:36:42'),
(26, 18, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(27, 19, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-05 00:54:26'),
(28, 20, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-17 22:02:54'),
(29, 20, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(30, 21, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-17 12:40:29'),
(31, 21, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(32, 22, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-27 05:21:30'),
(33, 23, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-23 11:34:21'),
(34, 23, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(35, 24, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-23 04:30:16'),
(36, 25, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-02 20:21:58'),
(37, 26, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-22 04:21:40'),
(38, 26, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(39, 27, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-21 09:42:12'),
(40, 28, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-02 15:51:23'),
(41, 29, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-13 06:33:56'),
(42, 30, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-26 16:44:53'),
(43, 30, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(44, 31, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-19 23:04:03'),
(45, 32, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-28 22:55:52'),
(46, 33, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-17 11:58:38'),
(47, 34, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-16 09:58:45'),
(48, 35, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-26 14:30:31'),
(49, 36, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-28 19:35:53'),
(50, 36, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(51, 37, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-15 13:57:36'),
(52, 37, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(53, 38, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-11 03:28:55'),
(54, 38, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(55, 39, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-10-02 09:08:43'),
(56, 39, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(57, 40, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-22 12:15:58'),
(58, 40, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(59, 41, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-18 03:19:00'),
(60, 41, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(61, 42, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-05 06:09:57'),
(62, 43, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-14 12:43:04'),
(63, 44, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-29 01:58:11'),
(64, 44, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(65, 45, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-06 13:35:03'),
(66, 45, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(67, 46, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-06 09:41:44'),
(68, 47, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-15 10:30:00'),
(69, 47, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(70, 48, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-29 19:45:42'),
(71, 48, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(72, 49, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-07 22:30:08'),
(73, 50, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-29 04:59:50'),
(74, 51, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-19 01:19:14'),
(75, 52, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-27 05:56:06'),
(76, 52, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(77, 53, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-14 03:54:05'),
(78, 54, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-09 05:54:36'),
(79, 54, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(80, 55, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-22 21:10:43'),
(81, 55, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(82, 56, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-09 09:18:52'),
(83, 56, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(84, 57, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-23 17:18:08'),
(85, 57, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(86, 58, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-04 14:47:26'),
(87, 58, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(88, 59, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-22 19:09:45'),
(89, 60, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-09 18:41:19'),
(90, 61, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-19 09:07:30'),
(91, 62, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-21 01:40:18'),
(92, 63, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-12 04:28:40'),
(93, 64, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-08 05:16:24'),
(94, 64, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(95, 65, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-13 11:54:58'),
(96, 65, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(97, 66, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-09 22:19:56'),
(98, 66, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(99, 67, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-16 04:11:58'),
(100, 68, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-18 03:12:55'),
(101, 69, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-29 11:54:24'),
(102, 69, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(103, 70, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-20 17:28:44'),
(104, 71, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-12 02:48:13'),
(105, 71, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(106, 72, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-17 10:52:49'),
(107, 73, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-16 23:40:43'),
(108, 74, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-11 15:28:18'),
(109, 74, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(110, 75, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-21 06:16:45'),
(111, 75, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(112, 76, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-27 01:26:20'),
(113, 77, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-17 13:00:47'),
(114, 77, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(115, 78, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-13 08:50:41'),
(116, 79, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-08 04:09:57'),
(117, 80, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-11 12:55:36'),
(118, 81, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-13 19:47:58'),
(119, 82, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-15 08:36:18'),
(120, 82, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(121, 83, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-14 22:13:08'),
(122, 84, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-18 19:33:54'),
(123, 85, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-02 18:32:28'),
(124, 85, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(125, 86, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-23 05:12:25'),
(126, 86, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(127, 87, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-25 18:58:50'),
(128, 87, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(129, 88, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-08-21 00:27:06'),
(130, 88, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(131, 89, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-26 18:08:24'),
(132, 89, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(133, 90, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-17 09:37:56'),
(134, 91, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-04-30 06:41:14'),
(135, 91, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh teknisi.', '2026-10-04 18:37:48'),
(136, 92, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-06 07:49:03'),
(137, 92, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(138, 93, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-05 00:28:04'),
(139, 94, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-06-21 20:07:06'),
(140, 95, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-05-26 19:45:36'),
(141, 96, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-15 06:59:02'),
(142, 97, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-06 02:26:20'),
(143, 98, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-07-09 16:12:31'),
(144, 98, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(145, 99, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-24 07:33:46'),
(146, 99, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh teknisi.', '2026-10-04 18:37:48'),
(147, 100, 'aduan dibuat', 'Tiket dibuat oleh sistem (dummy data).', '2026-09-22 10:20:09'),
(148, 101, 'aduan dibuat', 'Tiket dibuat oleh Admin ITSM.', '2026-10-04 18:59:08'),
(149, 102, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-10-05 22:24:32'),
(150, 102, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Selesai\" oleh sultan admin.', '2026-10-06 19:11:57'),
(151, 103, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-10-06 22:28:48'),
(152, 104, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-10-06 22:29:14'),
(153, 104, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-06 22:53:25'),
(154, 102, 'tindak lanjut direvisi', 'Catatan tindak lanjut direvisi oleh sultan admin.', '2026-10-07 23:54:44'),
(158, 108, 'aduan dibuat', 'Tiket dibuat oleh sultan admin atas nama sultan PNS.', '2026-10-13 16:36:27'),
(159, 109, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-10-13 16:36:27'),
(160, 110, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-10-13 16:36:27'),
(161, 111, 'aduan dibuat', 'Tiket dibuat oleh sultan admin atas nama sultan PNS.', '2026-10-13 16:37:35'),
(162, 112, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-10-13 16:37:35'),
(163, 113, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-10-13 16:37:35'),
(165, 114, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-10-14 23:12:22'),
(166, 114, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-14 23:21:39'),
(167, 114, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-10-14 23:47:04'),
(168, 114, 'status diubah', 'Status diubah dari \"Sedang diproses\" menjadi \"Selesai\" oleh sultan admin.', '2026-10-14 23:47:52'),
(169, 112, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-18 17:27:14'),
(170, 112, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-10-18 17:27:50'),
(171, 113, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-18 22:54:55'),
(172, 113, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-10-19 18:06:49'),
(173, 113, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-10-19 18:09:01'),
(174, 111, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-19 19:24:03'),
(175, 115, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-10-20 20:51:05'),
(176, 116, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-10-20 21:11:15'),
(177, 116, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-20 21:38:21'),
(178, 116, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-10-20 21:41:05'),
(179, 116, 'status diubah', 'Status diubah dari \"Sedang diproses\" menjadi \"Selesai\" oleh sultan admin.', '2026-10-20 21:45:41'),
(180, 115, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-21 16:38:20'),
(181, 108, 'status diubah', 'Tiket diambil dan mulai ditangani oleh sultan admin.', '2026-10-21 18:51:19'),
(182, 117, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-10-26 18:18:56'),
(183, 117, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-10-26 18:24:13'),
(184, 117, 'status diubah', 'Status diubah dari \"Sedang diproses\" menjadi \"Selesai\" oleh sultan admin.', '2026-10-26 18:24:56'),
(185, 118, 'aduan dibuat', 'Tiket dibuat oleh sultan PNS.', '2026-11-03 18:13:22'),
(186, 118, 'data diperbarui', 'Data aduan diperbarui oleh sultan PNS.', '2026-11-03 18:14:57'),
(187, 118, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-11-03 18:27:33'),
(188, 118, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-11-03 18:28:03'),
(189, 118, 'status diubah', 'Status diubah dari \"Sedang diproses\" menjadi \"Selesai\" oleh sultan admin.', '2026-11-03 18:29:17'),
(190, 119, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-11-04 16:49:56'),
(191, 120, 'aduan dibuat', 'Tiket dibuat oleh sultan admin.', '2026-11-08 19:41:20'),
(192, 120, 'status diubah', 'Status diubah dari \"Belum diperiksa\" menjadi \"Sedang diproses\" oleh sultan admin.', '2026-11-08 19:42:04'),
(193, 120, 'tindak lanjut diperbarui', 'Data analisa dan tindak lanjut diperbarui oleh sultan admin.', '2026-11-08 19:42:16'),
(194, 120, 'status diubah', 'Status diubah dari \"Sedang diproses\" menjadi \"Selesai\" oleh sultan admin.', '2026-11-08 19:42:53'),
(195, 121, 'aduan dibuat', 'Tiket dummy dibuat untuk pengujian pembaruan.', '2026-11-10 16:20:24'),
(196, 122, 'aduan dibuat', 'Tiket dummy dibuat untuk pengujian pembaruan.', '2026-11-10 16:20:24'),
(197, 122, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh Teknisi IT.', '2026-11-10 16:20:24'),
(198, 123, 'aduan dibuat', 'Tiket dummy dibuat untuk pengujian pembaruan.', '2026-11-10 16:20:24'),
(199, 123, 'status diubah', 'Status diubah menjadi \'Sedang diproses\' oleh Teknisi IT.', '2026-11-10 16:20:24'),
(200, 124, 'aduan dibuat', 'Tiket dummy dibuat untuk pengujian pembaruan.', '2026-11-10 16:20:24'),
(201, 124, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh Teknisi IT.', '2026-11-10 16:20:24'),
(202, 125, 'aduan dibuat', 'Tiket dummy dibuat untuk pengujian pembaruan.', '2026-11-10 16:20:24'),
(203, 125, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh Teknisi IT.', '2026-11-10 16:20:24'),
(204, 126, 'aduan dibuat', 'Tiket dummy dibuat untuk pengujian pembaruan.', '2026-11-10 16:20:24'),
(205, 126, 'status diubah', 'Status diubah menjadi \'Selesai\' oleh Teknisi IT.', '2026-11-10 16:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_resolutions`
--

CREATE TABLE `ticket_resolutions` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `pemeriksa_id` bigint UNSIGNED DEFAULT NULL,
  `jenis_penyelesaian` enum('mandiri','Pihak ke-3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'mandiri',
  `tgl_analisa` date DEFAULT NULL,
  `analisa_teknis` text COLLATE utf8mb4_unicode_ci,
  `tgl_tindak_lanjut` date DEFAULT NULL,
  `tindak_lanjut_teknis` text COLLATE utf8mb4_unicode_ci,
  `tgl_hasil` date DEFAULT NULL,
  `hasil` text COLLATE utf8mb4_unicode_ci,
  `file_surat_justifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_resolutions`
--

INSERT INTO `ticket_resolutions` (`id`, `ticket_id`, `pemeriksa_id`, `jenis_penyelesaian`, `tgl_analisa`, `analisa_teknis`, `tgl_tindak_lanjut`, `tindak_lanjut_teknis`, `tgl_hasil`, `hasil`, `file_surat_justifikasi`) VALUES
(1, 5, 2, 'mandiri', '2026-07-15', 'Non quia nihil fugiat. Exercitationem aliquam blanditiis perspiciatis eos recusandae debitis.', '2026-07-17', 'Nostrum ab omnis iusto sed. Est saepe itaque quidem temporibus et.', '2026-07-22', 'Laborum voluptatem asperiores et molestias assumenda consequuntur nemo rem. Et aut quia illo rem enim. Neque quis atque rem harum fugiat eum qui ut.', NULL),
(2, 10, 1, 'Pihak ke-3', '2026-07-22', 'Quia reprehenderit praesentium ut molestias tempore. Explicabo quaerat rerum cum laborum debitis ex. Cumque aliquid nobis eius sequi.', '2026-07-24', 'Consequatur qui minima consequatur. Possimus perspiciatis consequatur et atque fugiat.', '2026-07-29', 'Debitis corrupti eveniet blanditiis pariatur. Corrupti omnis nobis quos impedit qui quae voluptatem. Voluptatum sapiente cum harum accusantium vero.', 'justifikasi_ac1a8ee8-e2cd-3204-b71e-24abef258e4c.pdf'),
(3, 11, 1, 'Pihak ke-3', '2026-09-04', 'Cumque magnam fugit voluptate non dolorem possimus. Illum eveniet culpa sed pariatur minima.', '2026-09-06', 'Consequatur perferendis accusamus vero repellat ipsum. Nisi voluptatum corporis autem qui.', NULL, NULL, 'justifikasi_eb5a8751-65cc-3ed6-9081-89f68921f4a1.pdf'),
(4, 14, 1, 'mandiri', '2026-09-19', 'Consectetur id deserunt dolore libero amet dolorum eveniet. Eveniet reiciendis culpa possimus omnis sed molestiae aut.', '2026-09-21', 'Ab fugiat consequuntur quia dolor odit ducimus nobis. Omnis amet facilis voluptas.', NULL, NULL, NULL),
(5, 15, 2, 'mandiri', '2026-08-28', 'Ut ea illo aut voluptatum nostrum. Eligendi quo voluptatibus reprehenderit ipsa. Perspiciatis distinctio harum et.', '2026-08-30', 'Quo fugit sint hic quia. Eum qui eos nostrum adipisci ullam fugit et exercitationem. Quia sed quidem vitae aut sapiente ad qui.', '2026-09-04', 'Eum et velit eius distinctio cum rerum sunt. Aut aliquam adipisci amet amet debitis sint quidem sequi. Enim voluptas quo illo.', NULL),
(6, 16, 1, 'Pihak ke-3', '2026-09-15', 'Quis numquam iste quibusdam molestias. Error enim est doloremque at error. Dolore impedit animi est distinctio qui odio.', '2026-09-17', 'Ea et nulla voluptatibus fuga non. Voluptatibus omnis ut consectetur nihil ipsum voluptas sapiente. Sit non ab in nobis neque.', '2026-09-22', 'Enim recusandae eligendi voluptatem aspernatur perferendis saepe. Nihil ut perferendis accusantium sed possimus ut. Quia ut sed nihil eaque officiis.', 'justifikasi_7550cabd-2c39-3e36-ae42-d177398fdbc0.pdf'),
(7, 17, 1, 'Pihak ke-3', '2026-10-01', 'Ipsa et perferendis aut qui aut. Excepturi nesciunt optio quia officia facere. Distinctio fugit totam quaerat ipsa quibusdam officia eaque.', '2026-10-03', 'Deleniti suscipit eum voluptatem qui omnis quo. Soluta veritatis sit voluptas mollitia qui debitis nihil excepturi.', NULL, NULL, 'justifikasi_33e138fb-ad44-3aae-b778-3c5c5aff783e.pdf'),
(8, 18, 1, 'mandiri', '2026-07-15', 'Quasi est qui ipsam. Aut facere ipsa facere cumque hic voluptate. Id hic ullam sunt quae iusto.', '2026-07-17', 'Omnis odio ratione dolores. Similique officiis eos harum laborum.', '2026-07-22', 'Harum voluptatem eligendi quia a aut. Quia non voluptas perferendis quaerat nemo ducimus quo laudantium. Eum dolorem quaerat mollitia maiores culpa blanditiis sapiente.', NULL),
(9, 20, 2, 'Pihak ke-3', '2026-09-06', 'Cupiditate provident quae ut consequatur. Et itaque quae eum officia.', '2026-09-08', 'Illum omnis dolore voluptatibus maiores molestiae eos quo ab. Corporis harum quis consequatur nobis nihil quo. Ea neque soluta rerum aut.', NULL, NULL, 'justifikasi_b09ca8f4-7400-30b5-83b6-cafb2798df00.pdf'),
(10, 21, 1, 'mandiri', '2026-07-20', 'Provident est debitis deleniti animi sed sunt. Est deleniti explicabo aut nihil sint voluptas reprehenderit.', '2026-07-22', 'Harum deleniti qui et. Delectus et ut voluptatibus reprehenderit doloribus totam fugit voluptas. Voluptate assumenda quidem hic quae.', NULL, NULL, NULL),
(11, 23, 2, 'Pihak ke-3', '2026-09-24', 'Est qui incidunt sit vero porro. Ut expedita assumenda rerum nesciunt fuga consequatur.', '2026-09-26', 'Doloribus facere aspernatur nihil sapiente. Deserunt sit consequatur odio perspiciatis ut natus debitis eligendi. Cum ratione et omnis accusantium consequatur.', '2026-10-01', 'Quia molestias ut quia enim quod. Inventore sit quia libero laudantium nisi in doloremque. Et dolore veritatis numquam accusamus eos est commodi.', 'justifikasi_bfc0beb6-95cb-3e6d-bd45-62d1372877be.pdf'),
(12, 26, 1, 'Pihak ke-3', '2026-09-14', 'Vel qui necessitatibus voluptas quo optio. In eos est aspernatur eligendi tenetur autem possimus voluptas.', '2026-09-16', 'Culpa nobis et at et. Et sint dolorem tempora fuga optio corrupti odio.', NULL, NULL, 'justifikasi_191150c2-7c8c-33e6-a0b6-893ff7261908.pdf'),
(13, 30, 1, 'mandiri', '2026-09-29', 'Aliquam enim qui inventore. Reprehenderit cumque expedita enim tempora et harum quis.', '2026-10-01', 'Ab commodi sit cumque tempora ullam corrupti sed. Commodi sed quasi enim sed. Quas sapiente accusantium ducimus officiis veniam id.', NULL, NULL, NULL),
(14, 36, 1, 'Pihak ke-3', '2026-10-04', 'Nostrum consequatur aperiam commodi corporis voluptatem modi. Vitae et corrupti officia et officiis. Autem ratione natus dolorem nihil dolorem.', '2026-10-06', 'Enim sed quis in placeat optio ut. Consequatur quis sint et quisquam assumenda.', NULL, NULL, 'justifikasi_a90566af-cc65-306e-8708-e32b2c57486c.pdf'),
(15, 37, 2, 'Pihak ke-3', '2026-10-02', 'Qui ea eum est explicabo. Qui consequatur vitae quas architecto nobis ut.', '2026-10-04', 'A nesciunt sequi culpa ducimus. Reprehenderit eos molestias ea ad sunt facere et. Suscipit totam aut a sint reprehenderit explicabo.', '2026-10-09', 'Hic est dolorum mollitia mollitia cum rerum quia sit. Iure et et dignissimos veniam.', 'justifikasi_434e9783-5c8b-3550-81a9-595372a0aed4.pdf'),
(16, 38, 1, 'mandiri', '2026-07-09', 'Rerum inventore quas quos harum. Voluptas animi et nemo velit.', '2026-07-11', 'Voluptas amet consequatur odio numquam occaecati facilis. Vel et iure adipisci nobis in magni. Numquam non necessitatibus sunt quo velit.', '2026-07-16', 'Optio qui iusto voluptatem placeat aut ipsam. Repellendus quia sed ipsam natus suscipit atque. Non sit totam aspernatur laborum similique quod.', NULL),
(17, 39, 1, 'mandiri', '2026-10-02', 'Excepturi aut maiores id aperiam molestias. Sit eum molestiae voluptates rem dignissimos sit.', '2026-10-04', 'Dolor sed et molestiae est. Expedita possimus sapiente voluptate minima sint aut ullam. Enim consequatur quasi sunt fugiat quod doloribus.', '2026-10-09', 'Molestiae quia similique explicabo molestiae. Tempora ea voluptatum hic libero.', NULL),
(18, 40, 2, 'mandiri', '2026-09-11', 'Corporis aut quo velit dolorem. Nihil velit porro nemo tenetur fuga. Voluptatum incidunt maxime qui repellendus.', '2026-09-13', 'Earum voluptatem nihil enim in sit fugit. Magni consequatur ut id.', '2026-09-18', 'Saepe rerum voluptatem quisquam atque nisi eos. Non eos eos occaecati sit tenetur magni. Nulla labore dolorem corporis in.', NULL),
(19, 41, 2, 'Pihak ke-3', '2026-07-26', 'Delectus voluptates sint alias fugit provident. Eos qui occaecati et ipsam excepturi est qui labore. Quia fugiat dolorem vel facilis nesciunt.', '2026-07-28', 'Inventore neque et illum reprehenderit architecto atque delectus eius. Repellat facere voluptatem nulla et vero sed. Ut amet ad aliquam consectetur corrupti dolores ex quidem.', NULL, NULL, 'justifikasi_8747a50d-c44f-34dc-8b36-11feedeacf4f.pdf'),
(20, 44, 2, 'Pihak ke-3', '2026-08-08', 'Fuga enim dolor sunt aut. Distinctio quidem quasi enim fugiat.', '2026-08-10', 'Temporibus voluptatem voluptas in iure. Ut quis et nihil quas hic et. Quasi iure architecto autem rem.', '2026-08-15', 'Alias minima incidunt totam velit eveniet. Atque fugit et temporibus similique exercitationem repudiandae.', 'justifikasi_b4a7bb6f-9d28-3bbe-be15-e6e747b3f12d.pdf'),
(21, 45, 2, 'Pihak ke-3', '2026-04-21', 'Vel temporibus consequatur voluptatum adipisci consequatur. Rerum iste non minus est porro et veniam.', '2026-04-23', 'Eaque ipsa harum suscipit atque error id. Earum nihil quia dolorem sunt. Eum sit harum maxime inventore ad eum expedita laudantium.', '2026-04-28', 'Eos adipisci molestiae adipisci ut eos aut voluptas est. Unde et facilis ea cum necessitatibus sequi.', 'justifikasi_85911aeb-adf8-35de-aceb-640ba9a2dfd6.pdf'),
(22, 47, 1, 'mandiri', '2026-10-04', 'Ex asperiores rerum placeat autem amet. Voluptatibus ut ipsa omnis voluptas ipsam perspiciatis qui. Occaecati doloribus quia repudiandae et.', '2026-10-06', 'Voluptatem earum debitis voluptate. Esse et sequi sit nisi soluta voluptas reiciendis dolor. Et illo vitae mollitia at.', '2026-10-11', 'Non ex quos ab sunt illum. Nostrum eius deserunt laudantium cum et error et molestiae.', NULL),
(23, 48, 2, 'Pihak ke-3', '2026-07-30', 'Est quos nobis dolore magnam laboriosam repellat et. Perspiciatis cumque repudiandae temporibus.', '2026-08-01', 'Dolorem numquam quia quidem debitis non qui officiis. Nesciunt dolorem et ea voluptatem consequatur beatae.', '2026-08-06', 'Sed et sunt vel hic repellat numquam fugiat. Culpa autem officiis soluta sed.', 'justifikasi_b2b80d2d-731c-388d-a28c-75ae2cfb2700.pdf'),
(24, 52, 2, 'mandiri', '2026-09-01', 'Voluptate reprehenderit ipsa et maiores eveniet. Placeat aspernatur quis ut molestiae facere aut in. Minus ut molestiae omnis.', '2026-09-03', 'Libero perferendis quam fugit recusandae. Et omnis ut ipsam sed. Tenetur et repellat esse qui voluptatibus architecto aperiam.', NULL, NULL, NULL),
(25, 54, 1, 'Pihak ke-3', '2026-08-14', 'Quidem non minus natus. Commodi id explicabo et temporibus dolor ut similique.', '2026-08-16', 'Quibusdam quaerat temporibus aspernatur cumque voluptatibus enim. A sequi tempore aut illum natus.', '2026-08-21', 'Ab accusamus enim laboriosam autem. Exercitationem molestias ipsam nisi molestiae commodi. Blanditiis et culpa deleniti quia.', 'justifikasi_6c93ca68-6264-3533-8378-f089eec60f32.pdf'),
(26, 55, 1, 'Pihak ke-3', '2026-10-01', 'Qui consectetur explicabo cupiditate sit sequi voluptatum. Voluptatem debitis explicabo architecto harum omnis aut.', '2026-10-03', 'In magni similique incidunt molestiae nulla rerum quae inventore. Explicabo alias ratione omnis dolores dolore sint ea sit. Dignissimos vitae quibusdam expedita illum animi in a nemo.', '2026-10-08', 'Aut provident nihil vel sit. Fugit placeat unde voluptatibus vitae fugiat autem. Reiciendis temporibus commodi velit maiores in tempora.', 'justifikasi_f95d2a8e-1702-3d06-b96a-1545bbb33e12.pdf'),
(27, 56, 1, 'mandiri', '2026-09-20', 'Quam ullam labore accusantium repudiandae aliquid. Quaerat quod omnis provident aut id nostrum possimus. Sint dolorem nisi molestiae esse et aut consequatur.', '2026-09-22', 'Id inventore quos soluta eum aut dolor laboriosam sed. Rerum non dicta ut dolores alias commodi.', NULL, NULL, NULL),
(28, 57, 1, 'Pihak ke-3', '2026-09-08', 'Dicta facilis et error enim similique labore et. Eum suscipit atque aliquam ducimus tempora. Ut placeat amet porro quisquam quos.', '2026-09-10', 'Adipisci quia nostrum quae rerum. Deleniti magni non reprehenderit iste.', '2026-09-15', 'Asperiores nihil quia cum sed. Vitae autem molestiae perferendis necessitatibus vel eum ut. Aliquid ex eum necessitatibus consequuntur quisquam sed.', 'justifikasi_36d262cf-4b8f-38cd-bc7a-94758d9b64a5.pdf'),
(29, 58, 2, 'mandiri', '2026-08-08', 'Error et deserunt aliquid asperiores impedit commodi et. Vero debitis quod ea. Quae mollitia impedit eum.', '2026-08-10', 'Soluta tenetur sed ad iusto placeat rerum eos. Voluptatibus sed ut maxime quod pariatur. Maxime ea non est est voluptatem officiis consequuntur.', '2026-08-15', 'Quasi eos rem voluptas optio ad voluptas accusantium. Veniam corrupti repudiandae vel earum. Est officiis odit voluptatum autem debitis voluptatem impedit ea.', NULL),
(30, 64, 1, 'Pihak ke-3', '2026-07-31', 'Sunt quod dolor aperiam repudiandae. Recusandae veritatis maiores minima voluptas ab voluptate. Autem voluptas harum corrupti ullam corporis minus.', '2026-08-02', 'Assumenda autem quis quam maxime. Non laborum dolor maiores nemo temporibus animi. Facilis ut quisquam officia.', '2026-08-07', 'Expedita sint quia expedita eum. Quaerat provident laborum qui.', 'justifikasi_a0458a37-14a4-3ab1-b9fc-7173c9599889.pdf'),
(31, 65, 1, 'mandiri', '2026-05-23', 'Ducimus qui a provident rerum dicta quia. Laboriosam ullam aut enim.', '2026-05-25', 'Magni voluptas facere qui expedita eos et. Occaecati pariatur aut corrupti rerum et. Nobis magnam possimus aut fugiat dolores illo ut.', '2026-05-30', 'Qui quos officiis ex accusamus. Ut quam est voluptatem molestiae id sint exercitationem. Mollitia earum id eligendi ratione.', NULL),
(32, 66, 1, 'mandiri', '2026-08-31', 'Sit placeat aut doloremque alias. Deleniti explicabo laudantium et et eligendi voluptatem dolorum. Sit qui placeat eos et nisi.', '2026-09-02', 'Delectus non consequuntur sed. Recusandae sequi ipsum veniam id laboriosam.', NULL, NULL, NULL),
(33, 69, 2, 'Pihak ke-3', '2026-09-23', 'Repellendus eos magnam quia unde voluptate accusantium ipsa. Mollitia et et est molestias et nihil. Ad in accusantium perspiciatis porro quae sint sit.', '2026-09-25', 'Est vel itaque qui itaque culpa rem. Libero molestiae non adipisci quae velit dolorum perspiciatis. Repellat deleniti et rerum.', NULL, NULL, 'justifikasi_4f8ccaac-db1f-3bda-8e6e-09c2c97d66a2.pdf'),
(34, 71, 1, 'Pihak ke-3', '2026-09-26', 'Doloremque hic blanditiis et ullam. Ad ipsum odit laudantium sed placeat consequatur.', '2026-09-28', 'Consectetur est omnis qui iusto dolores ea sequi. Et fugiat voluptatem distinctio. Unde qui ducimus numquam dolorem repellat.', '2026-10-03', 'Unde vitae fugit amet nostrum cupiditate qui alias. Id incidunt voluptates labore nihil itaque. Aperiam et laudantium itaque.', 'justifikasi_31373726-778d-30ea-ae0d-316485ead646.pdf'),
(35, 74, 1, 'mandiri', '2026-06-28', 'Et tempore qui nostrum qui rem quos et. Quo et aut minus molestias porro facere.', '2026-06-30', 'Dolores aut neque ullam voluptas quisquam. Delectus aut facilis nesciunt occaecati. Incidunt a qui enim veniam ut porro similique.', '2026-07-05', 'Et et ipsum laboriosam repellendus. Praesentium voluptatibus doloremque aut eum tempora. Voluptatum dolore possimus perferendis libero enim provident quisquam.', NULL),
(36, 75, 1, 'Pihak ke-3', '2026-07-03', 'Eligendi vel voluptas cumque quis repellat molestiae et. Laboriosam maxime reiciendis dolorem laudantium voluptatem necessitatibus voluptas mollitia. Praesentium magnam corporis quaerat odio voluptates voluptatem.', '2026-07-05', 'Ut aspernatur eligendi incidunt. Nostrum voluptatem nisi necessitatibus tenetur voluptate minima praesentium. Dolor error vel quam sunt mollitia.', NULL, NULL, 'justifikasi_76b837bd-fcac-36d2-92b1-cb32c3a8ac03.pdf'),
(37, 77, 1, 'mandiri', '2026-09-24', 'Dolores amet sit aut est non. Deserunt accusamus facere adipisci quia omnis.', '2026-09-26', 'Ea id et repudiandae maxime aliquid sint. In nihil qui ad ab laudantium tempora.', NULL, NULL, NULL),
(38, 82, 2, 'Pihak ke-3', '2026-08-09', 'Odio natus quasi voluptas eaque. Ut unde natus esse laborum. Iste temporibus dolorem tempore sequi neque velit.', '2026-08-11', 'Possimus voluptas et ea molestiae quam. Non autem ut blanditiis quo quidem minima. Possimus esse non voluptatum veritatis corporis ea.', '2026-08-16', 'Et facilis tenetur est nesciunt occaecati. Recusandae asperiores quia error quia ipsa. Minima qui quidem officiis officia dolor.', 'justifikasi_62371d7d-6524-35ab-9385-f2641c2e066a.pdf'),
(39, 85, 1, 'Pihak ke-3', '2026-07-06', 'Et id sit qui commodi. Quo alias non consequuntur et commodi suscipit reprehenderit voluptatem.', '2026-07-08', 'Sed dicta quis maiores in. Delectus libero fuga vel optio pariatur.', '2026-07-13', 'Neque ut voluptatibus quaerat molestiae animi. Tempora eum provident sit quis quam non sed.', 'justifikasi_b7070216-a736-3f48-90e3-b8d6978fed6e.pdf'),
(40, 86, 1, 'mandiri', '2026-08-31', 'Et et consequatur optio repudiandae aliquid voluptates modi. Temporibus sapiente distinctio maxime eveniet et sit. Nostrum recusandae quia molestias dignissimos illo.', '2026-09-02', 'Sit dolores repellat occaecati ipsum quaerat nulla odio. Velit labore deserunt voluptatibus eius ex sint possimus nesciunt.', '2026-09-07', 'Mollitia aspernatur laborum quis praesentium molestiae laboriosam. Fugiat hic soluta eius sunt earum assumenda.', NULL),
(41, 87, 2, 'mandiri', '2026-10-03', 'Nemo hic voluptatem et quibusdam aperiam qui similique. Debitis ex nisi consectetur nisi ullam perspiciatis. Aut et qui reiciendis consequatur praesentium reiciendis.', '2026-10-05', 'Non quaerat non omnis rerum tempore. Excepturi laboriosam cupiditate sit harum inventore qui porro. Quaerat praesentium reiciendis mollitia provident id voluptate.', NULL, NULL, NULL),
(42, 88, 1, 'mandiri', '2026-10-01', 'Voluptatem ad provident maxime et explicabo molestiae ut qui. Dolorem qui placeat enim ut quos hic.', '2026-10-03', 'Illum perferendis explicabo est est esse. Nemo sit minus quo fuga enim ducimus et similique.', '2026-10-08', 'Saepe debitis vel veritatis suscipit. Quidem nostrum harum eligendi ad et quis dicta enim. Unde ipsum sunt facilis vel.', NULL),
(43, 89, 1, 'mandiri', '2026-07-05', 'Itaque deserunt facere quaerat et. Similique tempore quod ipsum itaque maiores. Quia minus consectetur dolores ipsam.', '2026-07-07', 'Rerum sed rem cum voluptatum. Dolore voluptatum deleniti aut quia quia ducimus sunt ad.', '2026-07-12', 'Enim ea officia ullam temporibus quaerat modi. Enim laborum aut non est omnis exercitationem error non. Eligendi optio veritatis eos nihil voluptas adipisci quas animi.', NULL),
(44, 91, 1, 'Pihak ke-3', '2026-08-05', 'Id ullam quidem quos et ex dolores est corporis. Facilis magnam fugit vero quaerat et enim. Reiciendis excepturi vitae fuga minus nisi sint aut eum.', '2026-08-07', 'Minus laudantium nostrum et mollitia quaerat aliquam. Excepturi facilis quaerat voluptas eius rem tenetur voluptatem. Aliquid et error facere delectus est.', NULL, NULL, 'justifikasi_2de9962b-399c-3c41-a009-f92a37fdf556.pdf'),
(45, 92, 2, 'Pihak ke-3', '2026-07-12', 'Voluptas qui aut cum perspiciatis aut. Nisi omnis ut et modi odio deserunt. At deserunt quibusdam excepturi distinctio qui.', '2026-07-14', 'Assumenda voluptate est ut sed nisi eius. Hic qui consequuntur occaecati aut placeat omnis. Eveniet quo sed rerum ex ea voluptate magnam.', '2026-07-19', 'Aut consequuntur alias eius eos. Corporis quia laudantium consequatur incidunt. Necessitatibus quia qui animi ullam.', 'justifikasi_6bdc286b-624c-3edd-87fd-c631c6d31072.pdf'),
(46, 98, 2, 'mandiri', '2026-07-21', 'Inventore dignissimos at eaque exercitationem quia animi aut quidem. In architecto quaerat explicabo blanditiis qui molestiae aut. Atque quia occaecati accusantium ipsam.', '2026-07-23', 'Quaerat cum dolor minima. Architecto similique sit et et blanditiis.', '2026-07-28', 'Nemo voluptate nobis eius excepturi error. Cupiditate explicabo voluptas nemo ut fuga et.', NULL),
(47, 99, 2, 'Pihak ke-3', '2026-10-01', 'Quia doloribus aut eos. Iste expedita similique sint et asperiores illum.', '2026-10-03', 'Quia sequi ea natus consequatur. Adipisci id nihil sed consequatur dolorem sapiente.', '2026-10-08', 'Quia consequatur qui eligendi eum quasi. Qui sint voluptas sunt esse in numquam omnis placeat. Dolore reprehenderit officia et soluta debitis nobis.', 'justifikasi_ceec7b66-2667-3da2-b5d2-6bcd2c8f43a5.pdf'),
(48, 102, 1, 'Pihak ke-3', '2026-10-07', 'cxczxczxzxczxczxczxczxczc', '2026-10-07', 'zxczxczxczxczczxczxczxczxczz', '1123-03-13', 'zxczxczxczxczxczxczxczxczxc', NULL),
(49, 104, 1, 'mandiri', '2026-10-07', 'hhhqsqaqsqaqa', '2026-10-07', 'qaqasqsqasqasqas', '2026-10-15', 'qaqasqasqasqasqs', NULL),
(52, 114, 1, 'Pihak ke-3', '2026-10-15', 'charger rusak', '2026-10-15', 'dibawa k tempat servis', '2026-10-18', 'sudah bagus', NULL),
(54, 112, 1, 'Pihak ke-3', '2026-10-19', 'fsdasdasdasdasd', '2026-10-19', 'asdasdasdasdasdasdad', NULL, NULL, NULL),
(55, 113, 1, 'mandiri', '2026-10-19', 'sdfdasdasdadadad', '2026-10-19', 'asdasdasdasdadsasd', NULL, NULL, NULL),
(56, 111, 1, 'mandiri', '2026-10-20', 'asddasdasddaD', '2026-10-20', 'aADasdadadasdsdfssfsdf', NULL, NULL, NULL),
(57, 116, 1, 'Pihak ke-3', '2026-10-21', 'rusak', '2026-10-22', 'servis abc', '2026-10-22', 'selesai', NULL),
(58, 115, 1, 'Pihak ke-3', '2026-10-22', 'ccxzczxczxczxc', '2026-10-22', 'zxczxczxczxczxczxc', NULL, NULL, NULL),
(59, 108, 1, 'mandiri', NULL, NULL, '2026-10-22', NULL, NULL, NULL, NULL),
(60, 117, 1, 'mandiri', '2026-10-27', 'paper jam', '2026-10-27', 'kertas nyangkut sudah di lepas', '2026-10-27', 'problem solve', NULL),
(61, 118, 1, 'Pihak ke-3', '2026-11-04', 'ram kotor', '2026-11-04', 'service keluar', '2026-11-11', 'ram sudah di service', NULL),
(62, 120, 1, 'Pihak ke-3', '2026-11-09', 'fleksibel lcd lepas', '2026-11-09', 'service', '2026-11-17', 'selesai', NULL),
(63, 122, 2, 'Pihak ke-3', '2026-11-11', 'Fuser unit aus dan roller penarik kertas patah. Tidak tersedia suku cadang internal.', '2026-11-11', 'Disiapkan Surat Permintaan Perbaikan BMN untuk diteruskan ke vendor pihak ke-3.', NULL, NULL, NULL),
(64, 123, 2, 'mandiri', '2026-11-11', 'Ditemukan interferensi kanal pada Access Point lantai 2 dan lease DHCP penuh.', '2026-11-11', 'Sedang dilakukan reset lease DHCP dan penyesuaian kanal AP.', NULL, NULL, NULL),
(65, 124, 2, 'mandiri', '2026-11-10', 'Token OAuth / password aplikasi Outlook kedaluwarsa setelah pembaruan kebijakan keamanan.', '2026-11-10', 'Dilakukan re-autentikasi profil Outlook dan pembaruan kredensial IMAP/SMTP.', '2026-11-11', 'Email dinas sudah kembali terhubung dan dapat mengirim/menerima pesan normal.', NULL),
(66, 125, 2, 'Pihak ke-3', '2026-11-09', 'Sel baterai internal UPS sudah melewati umur pakai (tegangan di bawah ambang normal).', '2026-11-10', 'Penggantian unit baterai UPS melalui rekanan Pihak ke-3.', '2026-11-11', 'Baterai baru telah terpasang, UPS kembali menyuplai daya cadangan normal.', NULL),
(67, 126, 2, 'mandiri', '2026-11-07', 'Pengaturan popup blocker browser memblokir tab cetak laporan.', '2026-11-08', 'Ditambahkan pengecualian (whitelist) domain internal pada browser.', '2026-11-08', 'Cetak laporan PDF sudah berjalan normal.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenkel` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kepegawaian` enum('PNS','PPPK','Honorer','Lainnya') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pernikahan` enum('Belum Menikah','Menikah','Janda','Duda') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_fungsional` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bidang_id` bigint UNSIGNED DEFAULT NULL,
  `jabatan_id` bigint UNSIGNED DEFAULT NULL,
  `panggol_id` bigint UNSIGNED DEFAULT NULL,
  `role` enum('pelapor','teknisi','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pelapor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `email`, `email_verified_at`, `password`, `foto_profil`, `remember_token`, `tempat_lahir`, `tanggal_lahir`, `jenkel`, `status_kepegawaian`, `status_pernikahan`, `no_telp`, `alamat`, `jabatan_fungsional`, `bidang_id`, `jabatan_id`, `panggol_id`, `role`, `created_at`, `updated_at`) VALUES
(1, '001', 'sultan admin', 'admin@bpom.test', NULL, '$2y$12$wJfB.i10T6JxtbVk7aE1LOGdSXSL2xj2d4ax9t/I2QBsKPBLEDs4e', 'profiles/vNC8QHTE6U2b1ATHtGbEMJTtp8orIK.jpg', NULL, 'Banjarmasin', '2008-03-14', 'L', 'PNS', 'Belum Menikah', '089692562998', 'Jl. A. Yani No. 1, Banjarmasin', 'Pranata Komputer', 1, 3, 2, 'admin', '2026-09-29 18:23:33', '2026-10-21 16:09:39'),
(2, '002', 'Teknisi IT', 'teknisi@bpom.test', NULL, '$2y$12$ANgAghrWCjCZHqASOtJQTO/MARcMdp4OHQsBlEvec4rM/LWaH9VhK', NULL, NULL, 'Banjarmasin', '1990-01-01', 'L', 'PNS', 'Menikah', '081234567890', 'Jl. A. Yani No. 1, Banjarmasin', NULL, 1, 3, 2, 'teknisi', '2026-09-29 18:23:33', '2026-09-29 18:23:33'),
(3, '003', 'sultan PNS', 'pelapor@bpom.test', '2016-10-04 06:52:16', '$2y$12$HBDYl5KlMnyDudsSGfEvGeiEd31Jkjb1pqIwrr0ggyzR.RDqnJNGO', 'profiles/d87vkKzskZvnKRPAaJkJ.jpeg', NULL, 'Banjarmasin', '2005-03-14', 'L', 'PNS', 'Belum Menikah', '089692562998', 'Jl. Pondok Jeruk Komplek Griya Mulia Asri no.12', NULL, 1, 3, 2, 'pelapor', '2026-09-29 18:23:33', '2026-10-20 21:05:36'),
(6, '999999998', 'Ziad Sultan Rafi', 'admin2@bpom.test', NULL, '$2y$12$hXx2zNquFnEzeve6/4FYVOGfrA61nfrETFzaozrY2nhZR/.fHVHom', NULL, NULL, 'Banjarmasin', '1995-01-01', 'L', 'PNS', 'Belum Menikah', '-', '-', NULL, 4, NULL, NULL, 'admin', '2026-10-21 18:50:16', '2026-10-21 18:50:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_penanggung_jawab_id_foreign` (`penanggung_jawab_id`);

--
-- Indexes for table `banjar_captchas`
--
ALTER TABLE `banjar_captchas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `knowledge_bases_slug_unique` (`slug`),
  ADD KEY `knowledge_bases_created_by_foreign` (`created_by`);

--
-- Indexes for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasis_bidang_id_foreign` (`bidang_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `panggol`
--
ALTER TABLE `panggol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_detail_akun`
--
ALTER TABLE `req_detail_akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `req_detail_akun_request_id_unique` (`request_id`);

--
-- Indexes for table `req_detail_zoom`
--
ALTER TABLE `req_detail_zoom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `req_detail_zoom_request_id_unique` (`request_id`),
  ADD KEY `req_detail_zoom_bidang_id_foreign` (`bidang_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_requests_nomor_request_unique` (`nomor_request`),
  ADD KEY `service_requests_user_id_foreign` (`user_id`),
  ADD KEY `service_requests_chat_closed_by_foreign` (`chat_closed_by`),
  ADD KEY `service_requests_reported_by_foreign` (`reported_by`);

--
-- Indexes for table `service_request_chats`
--
ALTER TABLE `service_request_chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_request_chats_request_id_foreign` (`request_id`),
  ADD KEY `service_request_chats_user_id_foreign` (`user_id`);

--
-- Indexes for table `service_request_resolutions`
--
ALTER TABLE `service_request_resolutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_request_resolutions_request_id_unique` (`request_id`),
  ADD KEY `service_request_resolutions_petugas_id_foreign` (`petugas_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`),
  ADD KEY `settings_group_index` (`group`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_nomor_aduan_unique` (`nomor_aduan`),
  ADD KEY `tickets_asset_id_foreign` (`asset_id`),
  ADD KEY `tickets_pelapor_id_foreign` (`pelapor_id`),
  ADD KEY `tickets_reported_by_foreign` (`reported_by`);

--
-- Indexes for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_histories_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `ticket_resolutions`
--
ALTER TABLE `ticket_resolutions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_resolutions_ticket_id_unique` (`ticket_id`),
  ADD KEY `ticket_resolutions_pemeriksa_id_foreign` (`pemeriksa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_bidang_id_foreign` (`bidang_id`),
  ADD KEY `users_jabatan_id_foreign` (`jabatan_id`),
  ADD KEY `users_panggol_id_foreign` (`panggol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `banjar_captchas`
--
ALTER TABLE `banjar_captchas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `panggol`
--
ALTER TABLE `panggol`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `req_detail_akun`
--
ALTER TABLE `req_detail_akun`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `req_detail_zoom`
--
ALTER TABLE `req_detail_zoom`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `service_request_chats`
--
ALTER TABLE `service_request_chats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `service_request_resolutions`
--
ALTER TABLE `service_request_resolutions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `ticket_resolutions`
--
ALTER TABLE `ticket_resolutions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_penanggung_jawab_id_foreign` FOREIGN KEY (`penanggung_jawab_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `knowledge_bases`
--
ALTER TABLE `knowledge_bases`
  ADD CONSTRAINT `knowledge_bases_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD CONSTRAINT `lokasis_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `req_detail_akun`
--
ALTER TABLE `req_detail_akun`
  ADD CONSTRAINT `req_detail_akun_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `req_detail_zoom`
--
ALTER TABLE `req_detail_zoom`
  ADD CONSTRAINT `req_detail_zoom_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `req_detail_zoom_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_chat_closed_by_foreign` FOREIGN KEY (`chat_closed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `service_requests_reported_by_foreign` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `service_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_request_chats`
--
ALTER TABLE `service_request_chats`
  ADD CONSTRAINT `service_request_chats_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_request_chats_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `service_request_resolutions`
--
ALTER TABLE `service_request_resolutions`
  ADD CONSTRAINT `service_request_resolutions_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `service_request_resolutions_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_asset_id_foreign` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_pelapor_id_foreign` FOREIGN KEY (`pelapor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_reported_by_foreign` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `ticket_histories`
--
ALTER TABLE `ticket_histories`
  ADD CONSTRAINT `ticket_histories_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_resolutions`
--
ALTER TABLE `ticket_resolutions`
  ADD CONSTRAINT `ticket_resolutions_pemeriksa_id_foreign` FOREIGN KEY (`pemeriksa_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ticket_resolutions_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `bidang` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `users_panggol_id_foreign` FOREIGN KEY (`panggol_id`) REFERENCES `panggol` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
