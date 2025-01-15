-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2025 at 02:37 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u481187344_db_fikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE `akademik` (
  `id_akademik` int(11) NOT NULL,
  `judul_akademik` varchar(500) NOT NULL,
  `file_akademik` varchar(500) NOT NULL,
  `keterangan_akademik` text NOT NULL,
  `type_akademik` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `judul_akademik`, `file_akademik`, `keterangan_akademik`, `type_akademik`, `created_at`) VALUES
(8, ' PRODI  DIII KEBIDANAN - Jadwal Kuliahn Semester I Tahun Akademik 2024.2025', 'Jadwal Kuliah Ganjil.xls', 'JADWAL KULIAH SEMESTER I PRODI  DIII KEBIDANAN TAHUN AKADEMIK 2024/2025', 'Jadwal Perkuliahan', '2025-01-13 01:26:48'),
(9, ' PRODI  DIII KEBIDANAN - Kalender Akademik Tahun 2024.2025', 'KALDIK BIDAN TA. 2024.2025.xlsx', 'TAHUN AKADEMIK 2024/2025', 'Kalender Akademik', '2025-01-13 01:28:01'),
(10, ' PRODI  DIII KEBIDANAN - Struktur Program Prodi Ganjil 2024.2025', 'Struktur program Prodi Bidan Ganjil 2024.2025.xls', 'Struktur program Prodi Bidan Ganjil 2024.2025', 'Kalender Akademik', '2025-01-13 01:30:37'),
(11, ' PROGRAM STUDI D-IV K3 - Kalender Akademik Tahun 2024.2025', 'KALENDER AKADEMIK  2024.2025 PRODI DIV K3.pdf', 'KALENDER AKADEMIK  2024.2025 PRODI DIV K3', 'Kalender Akademik', '2025-01-13 01:45:43'),
(12, ' PROGRAM STUDI D-IV K3 - Struktur Program Tahun 2024.2025', 'PROGRAM STUDI D-IV K3 - Struktur Program Tahun 2024.2025.pdf', ' PROGRAM STUDI D-IV K3 - Struktur Program Tahun 2024.2025', 'Kalender Akademik', '2025-01-13 03:09:25'),
(13, 'PROGRAM STUDI D-IV K3 - Jadwal Perkuliahan Semester Ganjil Tahun 2024.2025.pdf', 'PROGRAM STUDI D-IV K3 - Jadwal Perkuliahan Semester Ganjil Tahun 2024.2025.pdf', 'PROGRAM STUDI D-IV K3 - Jadwal Perkuliahan Semester Ganjil Tahun 2024.2025.pdf', 'Jadwal Perkuliahan', '2025-01-13 03:12:33'),
(14, 'PROGRAM STUDI S1  FARMASI - Struktur Program semester ganjil 2024.2025', 'PRODI FARMASI S1 - Struktur Program semester ganjil 2425.xlsx', 'PRODI FARMASI S1 - Struktur Program semester ganjil 2024.2025', 'Kalender Akademik', '2025-01-13 03:14:34'),
(15, 'PROGRAM STUDI S1 FARMASI - DENAH LABORATORIUM TERPADU LANTAI I', 'DENAH LABORATORIUM TERPADU LANTAI I.pdf', 'DENAH LABORATORIUM TERPADU LANTAI I', 'Denah Ruang Kuliah', '2025-01-13 03:18:44'),
(17, 'PRODI KEPERAWATAN S1 - Kalender Akademik, Struktur Program dan Jadwal Perkuliahan', 'KALDIK_STRUKTUR PROGRAM_JADWAL PERKULIAHAN TA 24-25.xlsx', 'PRODI FARMASI S1 KEPERAWATAN - Kalender Akademik, Struktur Progra dan Jadwal Perkuliahan', 'Kalender Akademik', '2025-01-14 03:43:35'),
(18, 'PROGRAM STUDI D3 KEPERAWATAN - Kalender Akademik', 'Kaldik D3 Keperawatan 2024-2025.xlsx', 'PROGRAM STUDI D3 KEPERAWATAN - Kalender Akademik', 'Kalender Akademik', '2025-01-15 02:14:18'),
(19, 'PROGRAM STUDI D3 KEPERAWATAN - Jadwal Kuliah Ganjil 2024.2025', 'Jadwal ganjil TA. 2024-2025.xlsx', 'PROGRAM STUDI D3 KEPERAWATAN - Jadwal Kuliah Ganjil 2024.2025', 'Jadwal Perkuliahan', '2025-01-15 02:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `course_kategories`
--

CREATE TABLE `course_kategories` (
  `id` int(11) NOT NULL,
  `photo_course` varchar(255) DEFAULT NULL,
  `title_course` varchar(255) DEFAULT NULL,
  `total_course` int(11) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `fullname_dosen` text NOT NULL,
  `foto_dosen` varchar(500) NOT NULL,
  `prodi_dosen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `fullname_dosen`, `foto_dosen`, `prodi_dosen`) VALUES
(1, 'Dr. Wisnu Widyantoro, M.Kep', 'foto_1730876258.JPG', 'S1 ILMU KEPERAWATAN'),
(2, 'Firman Hidayat, M.Kep., Ns.Sp.Kep.J', 'foto_1730876303.JPG', 'D3 KEPERAWATAN'),
(3, 'Agus Budianto, M.Kep', 'foto_1730876314.JPG', 'S1 ILMU KEPERAWATAN'),
(4, 'Khodijah, M.Kep', 'foto_1730876343.JPG', 'S1 ILMU KEPERAWATAN'),
(5, 'Susi Muryani, MNS', 'foto_1730876365.JPG', 'S1 ILMU KEPERAWATAN'),
(6, 'Deni Irawan, M.Kep', 'foto_1730876378.JPG', 'S1 ILMU KEPERAWATAN'),
(7, 'Arif Rakhman, MAN', 'foto_1730876454.JPG', 'S1 ILMU KEPERAWATAN'),
(8, 'Ikawati Setyaningrum, M.Kep', 'foto_1730876471.JPG', 'S1 ILMU KEPERAWATAN'),
(9, 'Nurhakim Yudhi Wibowo, M.Kep', 'foto_1730876480.JPG', 'S1 ILMU KEPERAWATAN'),
(10, 'Yessy Pramita Widodo, M.Kep.', 'foto_1730876489.JPG', 'S1 ILMU KEPERAWATAN'),
(11, 'Ratna Widhiastuti, M.Kep', 'foto_1730876501.JPG', 'S1 ILMU KEPERAWATAN'),
(12, 'Eka Diana Permatasari, M.Kep', 'foto_1730876514.JPG', 'S1 ILMU KEPERAWATAN'),
(13, 'Novi Aprilia KD, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(14, 'Umi Salamah, S.Pd.MH', 'foto_1730876672.JPG', 'S1 ILMU KEPERAWATAN'),
(15, 'Dr. Angkatno, M.Pd. ', '', 'S1 ILMU KEPERAWATAN'),
(17, 'Agung Laksana Hendra Pamungkas, M.Kep.', '', 'S1 ILMU KEPERAWATAN'),
(18, 'Syarifudin Bakhtiar, M.Kep.', '', 'S1 ILMU KEPERAWATAN'),
(19, 'Natiqotul Fatkhiyah, S.ST.,M.Kes', 'foto_1730876691.JPG', 'D3 KEBIDANAN'),
(20, 'Siswati, S.Si.T.,M.Kes', 'foto_1730876704.JPG', 'D3 KEBIDANAN'),
(21, 'Tri Agustina H, S.ST.,M.Kes', 'foto_1730876737.JPG', 'D3 KEBIDANAN'),
(22, 'Yuni Fitriani, S.Si.T.,M.PH', 'foto_1730876749.JPG', 'D3 KEBIDANAN'),
(23, 'Ike Putri Setyatama, S.ST.,M.Kes', 'foto_1730876760.JPG', 'D3 KEBIDANAN'),
(24, 'Ika Esti Anggraeni, S.ST.,M.Kes', 'foto_1730876774.JPG', 'D3 KEBIDANAN'),
(25, 'Masturoh, S.ST.,MPH', 'foto_1730876787.JPG', 'D3 KEBIDANAN'),
(26, 'Sri Tanjung Rejeki, S.ST.,MPH', 'foto_1730876844.JPG', 'D3 KEBIDANAN'),
(27, 'Adrestia Rifki N, S.Si.T.,MPH', 'foto_1730876863.JPG', 'D3 KEBIDANAN'),
(28, 'Rina Febri W, S.Si.T.,M.Keb.', 'foto_1730876874.JPG', 'D3 KEBIDANAN'),
(29, 'Dr. Risnanto, M.Kes', 'foto_1730876889.JPG', 'D3 KEPERAWATAN'),
(30, 'Ita Nur Itsna, MAN', 'foto_1730876913.JPG', 'D3 KEPERAWATAN'),
(31, 'Sri Hidayati, M.Kep., Ns. Sp. KMB', 'foto_1730876929.JPG', 'D3 KEPERAWATAN'),
(32, 'Arifin Dwi Atmaja, M.Kep.', 'foto_1730876940.JPG', 'D3 KEPERAWATAN'),
(33, 'Anisa Oktiawati, M.Kep.', 'foto_1730876949.JPG', 'D3 KEPERAWATAN'),
(34, 'Uswatun Insani, M.Kep.', 'foto_1730876963.JPG', 'D3 KEPERAWATAN'),
(35, 'Jumrotun Ni’mah, M.Kep.', 'foto_1730876974.JPG', 'D3 KEPERAWATAN'),
(36, 'Ramadhan Putra Satria, M.Kep.', 'foto_1730876985.JPG', 'D3 KEPERAWATAN'),
(37, 'Theodora Rosaria G, M. Kep', '', 'D3 KEPERAWATAN'),
(38, 'Ani Ratnaningsih, M. Kep', 'foto_1730877078.JPG', 'D3 KEPERAWATAN'),
(39, 'Arriani Indrastuti, SKM,M.Kes', 'foto_1730877298.JPG', 'D3 KEPERAWATAN'),
(40, 'Dr.Imam Syafi’I, M.H (NIDK)', '', 'D3 KEPERAWATAN'),
(41, 'Dr. Faisaluddin, M.Psi', 'foto_1730877311.JPG', 'D3 KEPERAWATAN'),
(42, 'Woro Hapsari, M. Kep', 'foto_1730877322.JPG', 'D3 KEPERAWATAN'),
(43, 'apt. Endang Istriningsih, M.Clin.Pharm', 'foto_1730877344.JPG', 'S1 FARMASI'),
(44, 'apt. Oktariani Pramiastuti, M.Sc', 'foto_1730877356.JPG', 'S1 FARMASI'),
(45, 'apt. Lailiana Garna Nurhidayati, M.Pharm.,Sci.', 'foto_1730877384.JPG', 'S1 FARMASI'),
(46, 'apt. Agung Nur Cahyanta, M.Farm', 'foto_1730877393.JPG', 'S1 FARMASI'),
(47, 'apt. Osie Listina, M.Sc. ', 'foto_1730877403.JPG', 'S1 FARMASI'),
(48, 'apt. Arifina Fahamsya, M.Sc.', 'foto_1730877418.JPG', 'S1 FARMASI'),
(49, 'apt. Fika Rizqiyana, M.Farm.', 'foto_1730877442.JPG', 'S1 FARMASI'),
(50, 'Prihastini Setyo Wulandari, M.Farm.', 'foto_1730877455.JPG', 'S1 FARMASI'),
(51, 'apt. Shofa Khoirun Nida, M.Farm', 'foto_1730877531.JPG', 'S1 FARMASI'),
(52, 'Girly Risma Firsty, M. Farm.', 'foto_1730877542.JPG', 'S1 FARMASI'),
(53, 'Desi Sri Rejeki, M.Si.', 'foto_1730877591.JPG', 'S1 FARMASI'),
(54, 'Ery Nourika Alfiraza, M.Sc.', 'foto_1730877602.JPG', 'S1 FARMASI'),
(55, 'Fiqih Kartika Murti, M.Pd', 'foto_1730877617.JPG', 'S1 FARMASI'),
(56, 'apt. Farida Fakhrunnisa, M.Farm', '', 'S1 FARMASI'),
(57, 'Dr. Musrifah, MA', '', 'S1 FARMASI'),
(58, 'Apt. Rima Harsa Atqiya Alquraisi, S.Farm', 'foto_1730877673.JPG', 'S1 FARMASI'),
(59, 'Apt. Afina Nurfauziah, S.Farm', 'foto_1730877691.JPG', 'S1 FARMASI'),
(60, 'Dr. Sugiarto, M.Si.', '', 'K3'),
(61, 'Triyono Rakhmadi, S.K.M., M.KKK.', '', 'K3'),
(62, 'Erna Agustin Sukmandari, S.K.M., M.P.H.', 'foto_1730877708.JPG', 'K3'),
(63, 'Agung Tyas Subekti, S.Kep., M.A.', 'foto_1730877719.JPG', 'K3'),
(64, 'Anggit Pratiwi, S.Si., M.P.H.', 'foto_1730877729.JPG', 'K3'),
(67, ' apt. Rifki Very Balfas, M. Farm', '', 'PRODI D IV KESELAMATAN DAN KESEHATAN KERJA (K3)'),
(68, 'Dwi Atmoko, M. Pd', 'foto_1730962688.JPG', 'K3'),
(69, 'apt. Rifqi Verry Balfas, M.Farm', '', 'S1 FARMASI'),
(70, 'Maeliya Unayah, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(71, 'Fenny Dwi Anggraeni, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(72, 'Rosmalia, ST, M.Kes', 'foto_1736742197.JPG', 'K3'),
(73, 'Maeliya Unayah, M.Kep', '', 'PRODI ILMU KEPERAWATAN DAN NERS'),
(74, 'Fenny Dwi Anggraeni, M.Kep', '', 'PRODI ILMU KEPERAWATAN DAN NERS');

-- --------------------------------------------------------

--
-- Table structure for table `file_sertifikat`
--

CREATE TABLE `file_sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `fullname_sertifikat` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file_sertifikat`
--

INSERT INTO `file_sertifikat` (`id_sertifikat`, `fullname_sertifikat`, `sertifikat`, `is_publish`) VALUES
(2, 'Sertifikat Akreditasi  Kelselamatan dan Kesehatan Kerja K3', '0793-127-Sertifikat_SARJANA_TERAPAN_-_KESELAMATAN_DAN_KESEHATAN_KERJA_-_UNIVERSITAS_BHAMADA_SLAWI__TEGAL.pdf', 1),
(3, 'Surat Keputusan Akreditasi S1 Ilmu Keperawatan Univ Bhamada Slawi', 'SK-Akred-S1-Ilmu-Kep-Univ.Bhamada-Slawi.pdf', 1),
(4, 'Surat Keputusan Akreditasi S1 Farmasi Univ Bhamada Slawi', 'SK-Akred-S1-Farmasi-Univ.Bhamada-Slawi.pdf', 1),
(5, 'Surat Keputusan Akreditasi  Profesi Ners Univ Bhamada Slawi', 'SK-Akred-Profesi-Ners-Univ.Bhamada-Slawi.pdf', 1),
(6, 'Surat Keputusan Akreditasi D3 Kebidanan Univ Bhamada Slawi', 'SK-Akreditasi-D3-Kebidanan.pdf', 1),
(7, 'Surat Keputusan Akreditasi D4 K3 Univ Bhamada Slawi', 'SK-Akred-D4-K3-Univ.-Bhamada-Slawi.pdf', 1),
(9, 'Sertifikat Akreditasi Farmasi universitas bhamada ', 'Sertifikat Akreditasi Farmasi universitas bhamada .pdf', 1),
(10, 'Sertifikat Akreditasi Profesi Ners', 'Sertifikat-Akreditasi-Profesi-Ners-2021.pdf', 1),
(11, 'Sertifikat Akreditasi  S1 Keperawatan', 'Sertifikat-Akreditasi-Prodi-S1-Ilmu-Keperawatan-2021.pdf', 1),
(12, 'Sertifikat Akreditasi D3 Keperawatan', 'Sertifikat-Akreditasi-Prodi-D3-Keperawatan-2021.pdf', 1),
(14, 'Surat Keputusan Akreditasi D3 Ilmu Keperawatan', 'SK-Prodi-D3-Keperawatan-2021.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_unduh`
--

CREATE TABLE `form_unduh` (
  `id_form` int(11) NOT NULL,
  `jenis_form` varchar(500) NOT NULL,
  `caption_form` text NOT NULL,
  `file_form` text NOT NULL,
  `is_publish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_unduh`
--

INSERT INTO `form_unduh` (`id_form`, `jenis_form`, `caption_form`, `file_form`, `is_publish`) VALUES
(1, 'Layanan Mahasiswa', 'Form Cuti Mahasiswa', 'FORM CUTI.pdf', 1),
(5, 'Layanan Mahasiswa', 'Form Pengunduran Diri Mahasiswa', 'FORM PENGUNDURAN DIRI.pdf', 1),
(6, 'Layanan Mahasiswa', 'FORM PERMOHONAN IJIN MELANJUTKAN STUDI', 'FORM PERMOHONAN IJIN MELANJUTKAN STUDI.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galery_photo`
--

CREATE TABLE `galery_photo` (
  `id_galery_photo` int(11) NOT NULL,
  `caption` text NOT NULL,
  `file_galery_photo` varchar(500) NOT NULL,
  `is_publish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galery_photo`
--

INSERT INTO `galery_photo` (`id_galery_photo`, `caption`, `file_galery_photo`, `is_publish`) VALUES
(1, 'Gedung Lab Terpadu', 'LAB TERPADU.jpg', 1),
(2, 'Gedung Rektorat', 'REKTORAT.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `header_about`
--

CREATE TABLE `header_about` (
  `id` int(11) NOT NULL,
  `icon_sub_header_about` varchar(255) DEFAULT NULL,
  `title_sub_header_about` varchar(255) DEFAULT NULL,
  `caption_header_about` text DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_home`
--

CREATE TABLE `header_home` (
  `id` int(11) NOT NULL,
  `caption_header` text DEFAULT NULL,
  `photo_header` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_home`
--

INSERT INTO `header_home` (`id`, `caption_header`, `photo_header`, `is_publish`) VALUES
(7, 'Dosen Prodi Ilmu Keperawatan dan Ners Fakultas Ilmu Kesehatan Universitas Bhamada Slawi Melaksanakan Tugas Tridharma Pengabdian Masyarakat', '672dd26d4d190.jpeg', 1),
(8, 'KEGIATAN BHAKTI SOSIAL KOLABORASI PRAMUKA PEDULI (PRAMULI) DENGAN PRODI DIII KEPERAWATAN', '672dd3182ec2f.jpeg', 1),
(9, 'KULIAH PAKAR “IMPLEMENTASI SAFETY DI PELAYANAN KESEHATAN” FAKULTAS ILMU KESEHATAN – UNIVERSITAS BHAMADA SLAWI', '672dd42a55d2b.jpeg', 1),
(10, 'Para Kader Desa Penusupan mendapatkan Pelatihan Kejang Demam oleh Dosen S1 Ilmu Keperawatan dan Ners Fakultas Ilmu Kesehatan Universitas Bhamada Slawi', '672dd45a720a0.jpeg', 1),
(11, 'Dosen Prodi DIII Keperawatan Universitas Bhamada Slawi bersama mahasiswa laksanakan tugas Tridharma Pengabdian Masyarakat', '672dd494c95dd.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `introduction_about`
--

CREATE TABLE `introduction_about` (
  `id` int(11) NOT NULL,
  `photo_introduction` varchar(255) DEFAULT NULL,
  `sosial_media_introduction` varchar(255) DEFAULT NULL,
  `fullname_introduction` varchar(255) DEFAULT NULL,
  `position_introduction` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komite_etik`
--

CREATE TABLE `komite_etik` (
  `id_komite_etik` int(11) NOT NULL,
  `keterangan_komite_etik` text NOT NULL,
  `file_komite_etik` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `file_logo` varchar(500) NOT NULL,
  `caption_logo` text NOT NULL,
  `is_publish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `file_logo`, `caption_logo`, `is_publish`) VALUES
(1, 'fikes-white.png', 'Logo Universitas Bhamada', 1),
(3, 'LOGO FAKULTAS.png', 'Logo Fakultas Ilmu Kesehatan Universitas Bhamada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `jenis_prestasi` varchar(500) NOT NULL,
  `nama_mahasiswa` varchar(500) NOT NULL,
  `keterangan_satu` varchar(500) NOT NULL,
  `keterangan_dua` varchar(500) NOT NULL,
  `waktu_perolehan` date NOT NULL,
  `photo_prestasi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `jenis_prestasi`, `nama_mahasiswa`, `keterangan_satu`, `keterangan_dua`, `waktu_perolehan`, `photo_prestasi`) VALUES
(1, 'Juara MMA ', 'Jeka Saragih', 'Jeka Asparido Saragih adalah atlet seni bela diri campuran Indonesia. Ia sebelumnya bertanding untuk One Pride MMA pada divisi kelas ringan. Jeka Saragih merupakan petarung Indonesia pertama yang dikontrak oleh Ultimate Fighting Championship.', '', '2024-09-24', 'suasana-panas-timbang-badan-jeka-saragih-dan-anshul-jubli-4_169.jpeg'),
(2, 'Juara Dunia', 'Khabib Nurmagomedov', '\r\nindoposonline.id – Dustin Poirier membayar lunas kekalahan atas Conor McGregor. Itu setelah The Diamond menumbangkan McGregor pada ajang UFC 257, di Etihat Arena, Abu Dhabi, Minggu (24/1/2021). The Notorious julukan McGregor menyerah dengan KO pada ronde kedua.\r\n\r\nSebetulnya, partai utama Poirier vs McGregor merupakan rematch pada UFC 257. Maklum, kedua petarung pernah berseteru di Las Vegas, Amerika Serikat (AS) pada 2014. Kala itu, McGregor sukses memecundangi Poirier. McGregor  dengan tengi', '', '2024-07-10', 'G_stL2vh_400x400.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_about`
--

CREATE TABLE `profile_about` (
  `id` int(11) NOT NULL,
  `photo_profile_about` varchar(255) DEFAULT NULL,
  `title_profile_about` varchar(255) DEFAULT NULL,
  `caption_text_profile_about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id_ps` int(11) NOT NULL,
  `kaprodi_fullname` text NOT NULL,
  `sekprodi_fullname` text NOT NULL,
  `is_prodi` varchar(500) NOT NULL,
  `lokasi_ps` text NOT NULL,
  `kontak_ps` varchar(255) NOT NULL,
  `vmts_ps` text NOT NULL,
  `bid_peminatan_ps` text NOT NULL,
  `lulusan_ps` varchar(255) NOT NULL,
  `capaian_pembelajaran` text NOT NULL,
  `is_publish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_ps`, `kaprodi_fullname`, `sekprodi_fullname`, `is_prodi`, `lokasi_ps`, `kontak_ps`, `vmts_ps`, `bid_peminatan_ps`, `lulusan_ps`, `capaian_pembelajaran`, `is_publish`) VALUES
(1, 'Khodijah, M.Kep', 'Susi Muryani, MNS', 'Profesi Ners', 'Gedung Lantai 1 Bhamada', '+62 877-4990-0575', '', 'Keperawatan', 'Lulusan', 'Capaian Pembelajaran', 1),
(9, 'Khodijah, S.Kep., Ns.,M.Kep.', 'Susi Muryani, M.N.S', 'Ilmu Keperawatan', 'Universitas Bhamada Slawi', '+62 878-5812-0025', '&lt;img alt=&quot;&quot;&gt;', 'S1 Keperawatan', '-', 'Dosen', 1),
(10, 'Endang Istriningsih, M.Clin, Pharm,Apt.', 'Oktariani Pramiastuti, M.Sc., Apt', 'Farmasi', 'Universitas Bhamada Slawi - Gedung Farmasi', '+62 857-2752-8010', '', 'S1 Farmasi', '-', 'Dosen', 1),
(11, 'Ita Nur Itsna, S.Kep.,Ns, M.A.N', 'Ikawati Setyaningrum, M.Kep', 'Diploma Keperawatan', 'Universitas Bhamada Slawi - Gedung Selatan', '+62 815-7939-892', '', 'D3 Keperawatan', '-', 'Dosen', 1),
(12, 'Yuni Fitriani, S.SiT, MPH.', 'Ike Putri Setyatama, SST.,M.Kes', 'Kebidanan', 'Universitas Bhamada Slawi', '+62 853-2872-2448', '', 'D3 Kebidanan', '-', 'Dosen', 1),
(13, 'Erna Agustin Sukmandari, SKM, M.P.H', 'Agung Tyas Subekti, MA', 'Keselamatan dan Kesehatan Kerja', 'Universitas Bhamada Slawi', '+62 815-6833-1393', '', 'D3 Keselamatan dan Kesehatan Kerja', '-', 'Dosen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id_struktur` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `jabatan` varchar(500) NOT NULL,
  `keterangan_satu` text NOT NULL,
  `keterangan_dua` varchar(500) NOT NULL,
  `keterangan_tiga` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id_struktur`, `fullname`, `jabatan`, `keterangan_satu`, `keterangan_dua`, `keterangan_tiga`) VALUES
(3, 'Dr. H. Maufur, M.Pd', 'Rektor Universitas Bhamada Slawi', 'PAK REKTOR.jpeg', '', ''),
(4, ' Dr. Risnanto, M.Kes', 'Wakil Rektor Bidang Akademik', 'Dr. Risnanto, SST., M.Kes._DSC00241.JPG', '', ''),
(5, 'Ns. Agus Budianto, S.Kep., M.Kep', 'Wakil Rektor Bidang Keuangan dan Logistik', '9.DSC00121_Agus Budianto, S.Kep.Ns.,M.Kep.JPG', '', ''),
(6, 'Ns. Firman Hidayat, S.Kep., M.Kep, Sp.J', 'Wakil Rektor Bidang Kemahasiswaan', '8.DSC00119_Firman Hidayat,S.Kep.Ns., M.Kep. Sp.Kep.J.JPG', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sub_header_home`
--

CREATE TABLE `sub_header_home` (
  `id` int(11) NOT NULL,
  `icon_sub_header_home` varchar(255) DEFAULT NULL,
  `title_sub_header_home` varchar(255) DEFAULT NULL,
  `caption_sub_header_home` text DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_profile_about`
--

CREATE TABLE `sub_profile_about` (
  `id` int(11) NOT NULL,
  `point_text_sub_profile_about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `keterangan_survey` varchar(500) NOT NULL,
  `link_survey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `keterangan_survey`, `link_survey`) VALUES
(1, 'Penilaian Pelayanan FIKES', 'https://bit.ly/Penilaian_Pelayanan-FIKES'),
(2, 'Penilaian Pelayanan Sarpras  [ Untuk Mahasiswa/Mahasiswi ]', 'https://bit.ly/Penilaian_Pelayanan-FIKES'),
(3, 'Penilaian Pelayanan Sarpras [ Untuk Karyawan/Pegawai ]', 'https://bit.ly/Penilaian_Pelayanan-FIKES');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_ahli`
--

CREATE TABLE `tenaga_ahli` (
  `id_tenaga_ahli` int(11) NOT NULL,
  `fullname_tenaga_ahli` varchar(500) NOT NULL,
  `level_tenaga_ahli` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenaga_ahli`
--

INSERT INTO `tenaga_ahli` (`id_tenaga_ahli`, `fullname_tenaga_ahli`, `level_tenaga_ahli`) VALUES
(1, 'Munti Rosyiani, SP', 'Staf Fakultas dan Prodi'),
(2, 'Aghafiana Dewi Maharani, A.Md.Kom', 'Staf Fakultas dan Prodi'),
(3, 'Serviatri Jayanti, S.M', 'Staf Fakultas dan Prodi'),
(4, 'Adit Ahmad Munandar, Amd', 'Staf Fakultas dan Prodi'),
(5, 'Endro Dwiantoro, S.Pd', 'Staf Fakultas dan Prodi'),
(6, 'Dian Mahendra Yusuf, SE', 'Staf Fakultas dan Prodi'),
(7, 'Tredy Harlianto', 'Staf Fakultas dan Prodi'),
(8, 'Indah Dwi Pebriani, A.Md.Ak', 'Staf Fakultas dan Prodi'),
(9, 'Untung Purbowasesa, S.Kep., Ns', 'Laboratorium Keperawatan'),
(10, 'Devva Sapta Maharani, S.Kep', 'Laboratorium Keperawatan'),
(11, 'Maulana Aenul Yakin, S.Kep', 'Laboratorium Keperawatan'),
(12, 'Putri Aprilia Khoerun Nisa, S.Kep', 'Laboratorium Keperawatan'),
(13, 'Desi Widyastuti, S.Tr.Keb', 'Laboratorium Kebidanan'),
(14, 'Evi Dwi Mulyanti, S.ST', 'Laboratorium Kebidanan'),
(15, 'Desi Purnama Sari, S.Si', 'Laboratorium Farmasi'),
(16, 'Eti Purwatih, S.Farm', 'Laboratorium Farmasi'),
(17, 'Aditya Yulindra AP, S.Farm', 'Laboratorium Farmasi'),
(18, 'Shofa Khoirun Nida, S.Farm., Apt', 'Laboratorium Farmasi'),
(19, 'Kaka Uki Azkiya, Amd. Farm', 'Laboratorium Farmasi'),
(20, 'Sudiono, Amd.Farm', 'Laboratorium Farmasi'),
(21, 'Subekti Sulistiani, S.KM', 'Laboratorium K3');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `sejarah` text NOT NULL,
  `visi_misi` text NOT NULL,
  `foto_struktur_organisasi` varchar(500) NOT NULL,
  `caption_struktur_organisasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `sejarah`, `visi_misi`, `foto_struktur_organisasi`, `caption_struktur_organisasi`) VALUES
(1, '<p>Universitas Bhamada Slawi adalah lembaga pendidikan tinggi di bawah Yayasan Pendidikan Tri Sanja Husada Slawi yang berdiri pada 19 Juli 2021 sebagai perubahan bentuk dari STIKes Bhakti Mandala Husada Slawi.</p><p><br>Awalnya, STIKes Bhakti Mandala Husada Slawi merupakan sebuah institusi pendidikan tinggi yang fokus mencetak tenaga kesehatan handal dan profesional yang berdiri pada tahun 2005. Sebelumnya merupakan penggabungan dua lembaga pendidikan tinggi yaitu Akbid Bhamada Slawi dan Akper Bhamada Slawi yang berdiri sejak tahun 1995.</p><p><br>Sesuai dengan ijin perubahan bentuk menjadi Universitas Bhamada Slawi mengelola beberapa fakultas seperti, Fakultas Ilmu Kesehatan (FIKES), Fakultas Ekonomi dan Bisnis (FEB) dan Fakultas Informatika (FIKOM).</p><p>Fakultas Ilmu Kesehatan (FIKES) sebagai embrio berdirinya Universitas Bhamada Slawi, menyelenggarakan beberapa prodi diantaranya Prodi Diploma III Keperawatan, Prodi Diploma III Kebidanan, Prodi Sarjana Keperawatan dan Profesi Ners, Prodi Sarjana Farmasi dan Prodi Diploma IV Keselamatan Kesehatan Kerja yang telah terakreditasi LAMP-PT Kesehatan dengan Kriteria Baik Sekali dan terakreditasi BAN-PT dengan Kriteria Baik Sekali.</p>', '<br><b><u>VISI<br></u></b>Terwujudnya\r\nfakultas yang unggul dalam menghasilkan tenaga kesehatan yang berakhlak mulia,\r\nberkemampuan IPTEKs dan berjiwa wirausaha tahun 2030.<br>&nbsp;<br><b><u>MISI<br></u></b>1. Menyelenggarakan pendidikan dan\r\npengajaran di bidang ilmu kesehatan mengacu kepada Kurikulum Kerangka\r\nKualifikasi Nasional Indonesia.<br>2. Menyelenggarakan proses pendidikan dan\r\nmenghasilkan lulusan yang berakhlak mulia, berkemampuan IPTEKs dan berjiwa\r\nwirausaha.<br>3. Menyelenggarakan dan mengembangkan ilmu\r\npengetahuan dan riset di bidang kesehatan.<br> 4. Menyelenggarakan dan mengembangkan\r\npengabdian kepada masyarakat di bidang kesehatan.<br>5. Mengembangkan jaringan kerja sama untuk\r\nmeningkatkan kapasitas dan daya saing FIKes.<br>&nbsp;<br><b><u>TUJUAN<br></u></b>1. Terwujudnya proses pendidikan ilmu\r\nkesehatan dengan mengacu kepada Kurikulum Kerangka Kualifikasi Nasional\r\nIndonesia sehingga menghasilkan lulusan yang profesional.<br>2. Terselenggaranya layanan akademik yang\r\nberkualitas serta proses pembelajaran yang bermutu berdasarkan penciri\r\ninstitusi.<br>3. Terselengaranya kegiatan dan\r\npengembangan ilmu pengetahuan dan riset di bidang kesehatan.<br>4. Terselenggaranya kegiatan dan\r\npengembangan pengabdian kepada masyarakat di bidang kesehatan.<br>5. Terselenggaranya kerjasama dengan\r\nberbagai institusi untuk memperkuat kapasitas dan daya saing Fakultas Ilmu\r\nKesehatan.<br>&nbsp;<br><b><u>SASARAN<br></u></b>1. Meningkatnya\r\nmutu pembelajaran.<br>2. Meningkatnya\r\nlayanan di bidang kemahasiswaan.<br>3. Meningkatnya\r\nkompetensi dosen dan mahasiswa melalui kegiatan pembelajaran yang bersumber\r\ndari hasil-hasil penelitian.<br>4. Meningkatnya\r\nhasil penelitian yang berbasis IPTEKs.<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p></p>', 'tentang/uploads/66fceaff5fa86.png', '<p></p><h2>Periode 2024 -\r\n2025&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><h2></h2><h4></h4><b>SK Rektor Universitas Bhamada\r\nSlawi&nbsp;</b><h4></h4><h3><b>Nomor\r\n030/Univ.BHAMADA/KEP/V/2024</b></h3>Dekan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;:\r\nRosmalia, S.T.,M.Kes.<br>Wakil Dekan\r\nBidang Akademik&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; : Siswati,\r\nS.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Adum&amp;Keu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;: Sri\r\nHidayati, Ns.,M.Kep.,Sp.Kep.MB.<br>Wakil Dekan\r\nBidang Kemahasiswaan&nbsp; &nbsp;&nbsp; : Deni Irawan,\r\nNs.,M.Kep.<br>&nbsp;<br>&nbsp;<br><br><h2>Periode 2023 -\r\n2024&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></h2><blockquote><h4></h4><h2><b>SK Rektor Universitas Bhamada\r\nSlawi&nbsp;</b></h2><h4></h4><h3><b>Nomor\r\n059/Univ.BHAMADA/KEP/VIII/2023</b></h3></blockquote>Dekan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; :\r\nDwi Budi Prastiani, Ns.,M.Kep.,Sp.Kep.Kom<br>Wakil Dekan\r\nBidang Akademik&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Siswati,\r\nS.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Adum&amp;Keu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Arifin\r\nDwi Atmaja, Ns.,M.Kep.<br>Wakil Dekan\r\nBidang Kemahasiswaan&nbsp; &nbsp; &nbsp; : Deni Irawan,\r\nNs.,M.Kep.<br>&nbsp;<br><br><h2>Periode 2021 - 2023&nbsp; &nbsp; &nbsp;&nbsp;</h2><h2><b>SK Ketua Yayasan Pendidikan Tri Sanja Husada</b><span><b>&nbsp;</b><br></span></h2><h4><b>Nomor 009/KP/YPTSH/VIII/2021</b></h4>Dekan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:\r\nNatiqotul Fatkhiyah, S.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Akademik&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Siswati,\r\nS.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Adum&amp;Keu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;Arifin\r\nDwi Atmaja, Ns.,M.Kep.<br>Wakil Dekan\r\nBidang Kemahasiswaan&nbsp; &nbsp; &nbsp;: Deni Irawan,\r\nNs.,M.Kep.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id_ukm` int(11) NOT NULL,
  `nama_ukm` varchar(500) NOT NULL,
  `logo_ukm` varchar(500) NOT NULL,
  `ketua_ukm` varchar(500) NOT NULL,
  `keterangan_ukm` text NOT NULL,
  `pembina_ukm` varchar(500) NOT NULL,
  `periode_ukm` varchar(255) NOT NULL,
  `jenis_ukm` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama_ukm`, `logo_ukm`, `ketua_ukm`, `keterangan_ukm`, `pembina_ukm`, `periode_ukm`, `jenis_ukm`, `created_at`) VALUES
(1, 'UKM BMB (Bina Muslim Bhamada)', '1736410785_BINA MUSLIM BHAMADA (BMB).png', 'Nabila Eka Juniarti (S1 Farmasi)', 'Deskripsi: meningkatkan kecerdasan spiritual mahasiswa supaya tidak terjerumus dalam penyimpangan terhadap sikap keberagamaan dan sosial, serta pendampingan, pengarahan, pengkajian, dan pengaplikasian nilai-nilai keIslaman dalam dirinya sehingga memiliki budi pekerti dan akhlak mulia.', 'Uswatun Insani, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:42'),
(3, 'UKM KSR(Korps Suka Rela)', '1736410642_KORPS SUKA RELA BHAMADA (KSR).jpg', 'Irma Biastama (S1 Ilmu Keperawatan)', 'Deskripsi: Merupakan kesatuan unit PMI yang menjadi wadah bagi mahasiswa utuk membantu pelayanan sosial, kesehatan masyarakat, dan penanggulagan bencana.', 'Agung Tyas Subekti, S.Kep,M.A.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:44'),
(4, 'UKM PIK.R', '1736410741_PUSAT INFORMASI DAN KONSELING (PIK SMART BHAMADA).jpg', 'Winda Amalia Putri (S1 Keperawatan)', 'Deskripsi: Wadah kegiatan program dari BKKBN yang dikelola dari, oleh, dan untuk mahasiswa guna memberikan pelayanan informasi dan konseling tentang perencanaan Kehidupan Berkeluarga Bagi Remaja serta kegiatan-kegiatan penunjang lainnya. Tujuannya memberikan informasi Penyiapan Kehidupan Berkeluarga bagi Remaja (PKBR), Pendewasaan Usia Perkawinan, Keterampilan Hidup (Life Skills), Pelayanan Konseling dan Rujukan PKBR.', 'Masturoh, S.ST.,M.P.H.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:45'),
(5, 'UKM BEC (Bhamada English Club)', '1736410994_BHAMADA ENGLISH CLUB (BEC).png', 'Nahdiyatul Ulya (S1 Farmasi)', 'Deskripsi: wadah mahasiswa untuk menyalurkan minat dan bakat serta pengetahuan di bidang Bahasa Inggris. Bertujuan untuk meningkatkan kemampuan individu mengenai Bahasa Inggris terutama keterampilan dalam public speaking.', 'Fiqih Kartika Murti, M.Pd.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:46'),
(6, 'UKM SILAT', '1736743060_UKM Silat Bh.jpeg', 'Fawwaz Athif Amrullah- D3 Keperawatan', 'UKM SILAT', 'Ery Nourika Alfiraza, S.Si.,M.Sc.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:47'),
(7, 'UKM KARATE', '1736411284_KARATE.png', 'Zainul Kemal Ramadhan (S1 Keperawatan)', 'PSHT', 'Dwi Atmoko, M. Pd.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:48'),
(8, 'UKM BHAPALA(Bhamada Pencinta Alam)', '1736410683_BHAMADA PECINTA ALAM (BHAPALA).jpg', 'Devi Rizka Dwi Setiyarini (S1 Ilmu Keperawatan)', 'Deskripsi: Wadah mahasiswa untuk dapat menjaga kelestarian lingkungan hidup dengan melakukan edukasi dan sosialisasi kepada masyarakat, menambah pengetahuan, ketrampilan, ketangkasan, dan hubungan sosial antar mahasiswa.', 'Nurhakim Yudhi Wibowo, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:49'),
(9, 'UKM JURNALIKA', '1736411047_JURNALISTIK MAHASISWA (JURNALIKA).jpg', 'Faiq Nabil Zahroni (S1 Ilmu Keprawatan)', 'Deskripsi: wadah untuk mengembangkan ketrampilan jusnalistik dan melatih mahasiswa dalam penyampaian informasi, peliputan, fotografi, serta media kepada khalayak umum. Informasi yang diberitakan merupakan kegiatan mahasiswa secara internal atau eksternal kampus.', 'Ikawati Setyaningrum, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:50'),
(10, 'UKM BASKET', '1736411349_BASKET.png', 'Radhitya Haydar Maulana (S1 Keperawatan)', 'BASKET BHAMADA', 'Adrestia  Rifki Naharani, S.ST.,M.P.H.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:51'),
(11, 'UKM SENTRAMADA', '1736410839_SENI TARI BHAMADA (SENTRAMADA).png', 'Anis Solihah (S1 Farmasi)', 'Deskripsi: Wadah minat dan bakat mahasiswa untuk belajar memadukan unsur seperti raga, irama, dan rasa pada tarian, serta menghayati dan mempelajari filosofi tarian, koreografi dari jenis tarian mulai dari tradisional sampai modern. ', 'Anggit Pratiwi, S.Si.,M.P.H.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:52'),
(12, 'UKM VOLI', '1736411487_VOLLY.jpg', 'Anggun Tiara Suci (D3 Keperawatan)', 'VOLLY BHAMADA', 'Sri Tanjung Rejeki, S.ST., M.P.H.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:53'),
(13, 'UKM VOICE', '1736743147_UKM BMV.jpeg', 'Dini Susanti - S1 Farmasi', 'Minat dan bakat mahasiswa dalam olah suara, pengembangan teknik vocal dan menyelaraskan nada dengan berbagai karakter suara, menciptakan harmonisasi lagu untuk penampilan di berbagai acara.', 'Yessy Pramita Widodo, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:54'),
(14, 'UKM BADMINTON', '1736411381_BADMINTON CLUB BHAMADA.png', 'Syafiqoh Khairunnisa (S1 Keperawatan)', 'UKM BADMINTON', 'Ani Ratnaningsih, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:55'),
(15, 'UKM BAC', '1736411436_BHAMADA ARCHERY CLUB (BAC).jpg', 'Anisa Meiliya Rahmawati (S1 Keperawatan)', 'UKM BAC', 'Desi Sri Rejeki, M.Si.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:56'),
(16, 'UKM FUTSAL', '1736411320_FUTSAL.png', 'Yogi Tri Ardianto (D3 Keperawatan)', 'FUTSAL BHAMADA\r\n', 'Mohamad Azwar Fikri Muttaqien, S.H', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:57'),
(17, 'UKM BHAKTI', '1736411157_BHAMADA TEKNOLOGI INFORMATIKA (BHAKTI) .jpg', 'Fawwaz Athif Amrullah (S1 Informatika)', 'BHAMADA TEKNOLOGI INFORMATIKA (BHAKTI) \r\nDeskripsi: Wadah mahasiswa yg memiliki minat pada teknologi robotik, pemrograman, dan aplikasi dalam teknologi informatika. \r\n', 'Haries Anom Susetyo Aji Nugroho, M.Kom.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:58'),
(18, 'UKM KWU', '', 'Wiliyanto, MM.', 'Wiliyanto, MM.', 'Wiliyanto, MM.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:59'),
(19, 'BEM Badan Eksekutif Mahasiswa', '1736409669_BEM.jpg', ': Mohamad Anggie Ristian (D3 Keperawatan)', ': Mohamad Anggie Ristian (D3 Keperawatan)', 'Firman Hidayat, Ns.,M.Kep.,Sp.Kep.J.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(20, 'DPM Dewan Pembina Mahasiswa', '1728356224_Picture1.png', '1728356224_Picture1.png', 'Salsabila Fitriyani (S1 Farmasi)', 'Firman Hidayat, Ns.,M.Kep.,Sp.Kep.J.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(21, 'HIMIKA Himpunan Mahasiswa S1 Ilmu Keperawatan', '1736409753_HIMIKA.png', 'Rahma Aulia Pramesti', 'Rahma Aulia Pramesti', 'Khodijah, Ns.,M.Kep.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(22, 'HIMAFARDA Himpunan Mahasiswa S1 Farmasi', '1736410473_HIMAFARDA.jpg', 'Rizad Pradivta', 'Rizad Pradivta', 'apt. Endang Istriningsih, M.Clin.Pharm.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(23, 'HIMASADA Himpunan Mahasiswa D4 K3', '1736410517_HIMASADA.jpg', 'Faqih Asri Fatahillah', 'Faqih Asri Fatahillah', 'Erna Agustin Sukmandari, S.KM.,MPH', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(24, 'HIMADIKA Himpunan Mahasiswa D3 Keperawatan', '1728356193_Picture3.png', 'Satriyo Fajar Nugroho', 'Satriyo Fajar Nugroho', 'Ita Nur Itsna, Ns.,M.A.N.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(25, 'HIMADAN Himpunan Mahasiswa D3 Kebidanan', '1736410393_HIMADAN.jpg', 'Sania Alifatimah', 'Sania Alifatimah', 'Yuni Fitriani, S.Si.T.,M.P.H.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(26, 'UKM PRAMUKA', '1736742943_PRAMUKA.jpg', 'KDR PUTRA: M. Aji Asy’ari (D3 Keperawatan) ', 'Deskripsi: Racana adalah satuan gerak untuk golongan pramuka pandega. Satya Darma Pramuka dan Tri Satya sebagai pedoman anggota Pramuka diselaraskan dengan Tri Dharma Perguruan Tinggi membentuk sinergitas yang baik untuk menggembleng mahasiswa agar tangguh ditengah pergaulan dan perkembangan masyarakat yang semakin kompleks', 'Ratna Widhiastuti, Ns.,M.Kep.  dan Ramadhan Putra Satria, M.Kep', '2024-2025', 'UKM-SOFTSKILL', '2025-01-13 04:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `level`, `is_active`) VALUES
(1, 'Admin', 'admin', '$2y$10$1BiNnRSzDU.sPY0vdNhWnuMADPQQo24IGMtJDvKjXA0f740Rys9YW', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik`
--
ALTER TABLE `akademik`
  ADD PRIMARY KEY (`id_akademik`);

--
-- Indexes for table `course_kategories`
--
ALTER TABLE `course_kategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `file_sertifikat`
--
ALTER TABLE `file_sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indexes for table `form_unduh`
--
ALTER TABLE `form_unduh`
  ADD PRIMARY KEY (`id_form`);

--
-- Indexes for table `galery_photo`
--
ALTER TABLE `galery_photo`
  ADD PRIMARY KEY (`id_galery_photo`);

--
-- Indexes for table `header_about`
--
ALTER TABLE `header_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_home`
--
ALTER TABLE `header_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `introduction_about`
--
ALTER TABLE `introduction_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komite_etik`
--
ALTER TABLE `komite_etik`
  ADD PRIMARY KEY (`id_komite_etik`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `profile_about`
--
ALTER TABLE `profile_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id_ps`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `sub_header_home`
--
ALTER TABLE `sub_header_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_profile_about`
--
ALTER TABLE `sub_profile_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `tenaga_ahli`
--
ALTER TABLE `tenaga_ahli`
  ADD PRIMARY KEY (`id_tenaga_ahli`);

--
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD UNIQUE KEY `id_tentang` (`id_tentang`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik`
--
ALTER TABLE `akademik`
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `course_kategories`
--
ALTER TABLE `course_kategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `file_sertifikat`
--
ALTER TABLE `file_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `form_unduh`
--
ALTER TABLE `form_unduh`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galery_photo`
--
ALTER TABLE `galery_photo`
  MODIFY `id_galery_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `header_about`
--
ALTER TABLE `header_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_home`
--
ALTER TABLE `header_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `introduction_about`
--
ALTER TABLE `introduction_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komite_etik`
--
ALTER TABLE `komite_etik`
  MODIFY `id_komite_etik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_about`
--
ALTER TABLE `profile_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_header_home`
--
ALTER TABLE `sub_header_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_profile_about`
--
ALTER TABLE `sub_profile_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenaga_ahli`
--
ALTER TABLE `tenaga_ahli`
  MODIFY `id_tenaga_ahli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
