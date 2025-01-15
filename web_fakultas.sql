-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 08:37 AM
-- Server version: 10.4.11-MariaDB-log
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_fakultas`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`id_akademik`, `judul_akademik`, `file_akademik`, `keterangan_akademik`, `type_akademik`, `created_at`) VALUES
(1, 'Kalender Akademik', 'Picture1.png', 'Kalender Akademik 2024', 'Akademik', '2024-10-02 16:42:37'),
(2, 'Denah Ruang Kuliah', 'Screenshot 2024-09-26 134330.png', 'Keterangan Denah', 'Denah Ruang Kuliah', '2024-10-02 16:43:31'),
(3, 'Jadwal Perkuliahan', 'Screenshot 2024-09-27 093738.png', 'Keterangan Jadwal Perkuliahan 2024', 'Jadwal Perkuliahan', '2024-10-02 16:44:01');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `fullname_dosen` text NOT NULL,
  `foto_dosen` varchar(500) NOT NULL,
  `prodi_dosen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `fullname_dosen`, `foto_dosen`, `prodi_dosen`) VALUES
(1, 'Dr. Wisnu Widyantoro, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(2, 'Firman Hidayat, M.Kep., Ns.Sp.Kep.J', '', 'S1 ILMU KEPERAWATAN'),
(3, 'Agus Budianto, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(4, 'Khodijah, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(5, 'Susi Muryani, MNS', '', 'S1 ILMU KEPERAWATAN'),
(6, 'Deni Irawan, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(7, 'Arif Rakhman, MAN', '', 'S1 ILMU KEPERAWATAN'),
(8, 'Ikawati Setyaningrum, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(9, 'Nurhakim Yudhi Wibowo, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(10, 'Yessy Pramita Widodo, M.Kep.', '', 'S1 ILMU KEPERAWATAN'),
(11, 'Ratna Widhiastuti, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(12, 'Eka Diana Permatasari, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(13, 'Novi Aprilia KD, M.Kep', '', 'S1 ILMU KEPERAWATAN'),
(14, 'Umi Salamah, S.Pd.MH', '', 'S1 ILMU KEPERAWATAN'),
(15, 'Dr. Angkatno, M.Pd. ', '', 'S1 ILMU KEPERAWATAN'),
(16, 'Dr. Sutikno, M.Pd. ', '', 'S1 ILMU KEPERAWATAN'),
(17, 'Agung Laksana Hendra Pamungkas, M.Kep.', '', 'S1 ILMU KEPERAWATAN'),
(18, 'Syarifudin Bakhtiar, M.Kep.', '', 'S1 ILMU KEPERAWATAN'),
(19, 'Natiqotul Fatkhiyah, S.ST.,M.Kes', '', 'D3 KEBIDANAN'),
(20, 'Siswati, S.Si.T.,M.Kes', '', 'D3 KEBIDANAN'),
(21, 'Tri Agustina H, S.ST.,M.Kes', '', 'D3 KEBIDANAN'),
(22, 'Yuni Fitriani, S.Si.T.,M.PH', '', 'D3 KEBIDANAN'),
(23, 'Ike Putri Setyatama, S.ST.,M.Kes', '', 'D3 KEBIDANAN'),
(24, 'Ika Esti Anggraeni, S.ST.,M.Kes', '', 'D3 KEBIDANAN'),
(25, 'Masturoh, S.ST.,MPH', '', 'D3 KEBIDANAN'),
(26, 'Sri Tanjung Rejeki, S.ST.,MPH', '', 'D3 KEBIDANAN'),
(27, 'Adrestia Rifki N, S.Si.T.,MPH', '', 'D3 KEBIDANAN'),
(28, 'Rina Febri W, S.Si.T.,M.Keb.', '', 'D3 KEBIDANAN'),
(29, 'Dr. Risnanto, M.Kes', '', 'D3 KEPERAWATAN'),
(30, 'Ita Nur Itsna, MAN', '', 'D3 KEPERAWATAN'),
(31, 'Sri Hidayati, M.Kep., Ns. Sp. KMB', '', 'D3 KEPERAWATAN'),
(32, 'Arifin Dwi Atmaja, M.Kep.', '', 'D3 KEPERAWATAN'),
(33, 'Anisa Oktiawati, M.Kep.', '', 'D3 KEPERAWATAN'),
(34, 'Uswatun Insani, M.Kep.', '', 'D3 KEPERAWATAN'),
(35, 'Jumrotun Ni’mah, M.Kep.', '', 'D3 KEPERAWATAN'),
(36, 'Ramadhan Putra Satria, M.Kep.', '', 'D3 KEPERAWATAN'),
(37, 'Theodora Rosaria G, M. Kep', '', 'D3 KEPERAWATAN'),
(38, 'Ani Ratnaningsih, M. Kep', '', 'D3 KEPERAWATAN'),
(39, 'Arriani Indrastuti, SKM,M.Kes', '', 'D3 KEPERAWATAN'),
(40, 'Dr.Imam Syafi’I, M.H (NIDK)', '', 'D3 KEPERAWATAN'),
(41, 'Dr. Faisaluddin, M.Psi', '', 'D3 KEPERAWATAN'),
(42, 'Woro Hapsari, M. Kep', '', 'D3 KEPERAWATAN'),
(43, 'apt. Endang Istriningsih, M.Clin.Pharm', '', 'S1 FARMASI'),
(44, 'apt. Oktariani Pramiastuti, M.Sc', '', 'S1 FARMASI'),
(45, 'apt. Lailiana Garna Nurhidayati, M.Pharm.,Sci.', '', 'S1 FARMASI'),
(46, 'apt. Agung Nur Cahyanta, M.Farm', '', 'S1 FARMASI'),
(47, 'apt. Osie Listina, M.Sc. ', '', 'S1 FARMASI'),
(48, 'apt. Arifina Fahamsya, M.Sc.', '', 'S1 FARMASI'),
(49, 'apt. Fika Rizqiyana, M.Farm.', '', 'S1 FARMASI'),
(50, 'Prihastini Setyo Wulandari, M.Farm.', '', 'S1 FARMASI'),
(51, 'apt. Shofa Khoirun Nida, M.Farm', '', 'S1 FARMASI'),
(52, 'Girly Risma Firsty, M. Farm.', '', 'S1 FARMASI'),
(53, 'Desi Sri Rejeki, M.Si.', '', 'S1 FARMASI'),
(54, 'Ery Nourika Alfiraza, M.Sc.', '', 'S1 FARMASI'),
(55, 'Fiqih Kartika Murti, M.Pd', '', 'S1 FARMASI'),
(56, 'apt. Farida Fakhrunnisa, M.Farm', '', 'S1 FARMASI'),
(57, 'Dr. Musrifah, MA', '', 'S1 FARMASI'),
(58, 'Apt. Rima Harsa Atqiya Alquraisi, S.Farm', '', 'S1 FARMASI'),
(59, 'Apt. Afina Nurfauziah, S.Farm', '', 'S1 FARMASI'),
(60, 'Dr. Sugiarto, M.Si.', '', 'K3'),
(61, 'Triyono Rakhmadi, S.K.M., M.KKK.', '', 'K3'),
(62, 'Erna Agustin Sukmandari, S.K.M., M.P.H.', '', 'K3'),
(63, 'Agung Tyas Subekti, S.Kep., M.A.', '', 'K3'),
(64, 'Anggit Pratiwi, S.Si., M.P.H.', '', 'K3');

-- --------------------------------------------------------

--
-- Table structure for table `file_sertifikat`
--

CREATE TABLE `file_sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `fullname_sertifikat` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_sertifikat`
--

INSERT INTO `file_sertifikat` (`id_sertifikat`, `fullname_sertifikat`, `sertifikat`, `is_publish`) VALUES
(2, 'Sertifikat Akreditasi', '0793-127-Sertifikat_SARJANA_TERAPAN_-_KESELAMATAN_DAN_KESEHATAN_KERJA_-_UNIVERSITAS_BHAMADA_SLAWI__TEGAL.pdf', 1),
(3, 'Surat Keputusan Akreditasi S1 Ilmu Keperawatan Univ Bhamada Slawi', 'SK-Akred-S1-Ilmu-Kep-Univ.Bhamada-Slawi.pdf', 1),
(4, 'Surat Keputusan Akreditasi S1 Farmasi Univ Bhamada Slawi', 'SK-Akred-S1-Farmasi-Univ.Bhamada-Slawi.pdf', 1),
(5, 'Surat Keputusan Akreditasi S1 Profesi Ners Univ Bhamada Slawi', 'SK-Akred-Profesi-Ners-Univ.Bhamada-Slawi.pdf', 1),
(6, 'Surat Keputusan Akreditasi D3 Kebidanan Univ Bhamada Slawi', 'SK-Akreditasi-D3-Kebidanan.pdf', 1),
(7, 'Surat Keputusan Akreditasi D4 K3 Univ Bhamada Slawi', 'SK-Akred-D4-K3-Univ.-Bhamada-Slawi.pdf', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form_unduh`
--

INSERT INTO `form_unduh` (`id_form`, `jenis_form`, `caption_form`, `file_form`, `is_publish`) VALUES
(1, 'Layanan Mahasiswa', 'Form Cuti Mahasiswa', 'sample.pdf', 1),
(2, 'Layanan Dosen', 'Form Cuti Dosen', 'sampledosen.pdf', 1),
(4, 'Layanan Dosen', 'Form Cuti Dosen', 'sampledosen.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galery_photo`
--

CREATE TABLE `galery_photo` (
  `id_galery_photo` int(11) NOT NULL,
  `caption` text NOT NULL,
  `file_galery_photo` varchar(500) NOT NULL,
  `is_publish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galery_photo`
--

INSERT INTO `galery_photo` (`id_galery_photo`, `caption`, `file_galery_photo`, `is_publish`) VALUES
(1, 'Foto Kampus', 'Gallery_Kampus_III_21082013115837_01a.jpg', 1),
(2, 'Area Pelayanan Fikes', 'humas-unpad-2016_08_22-EOS-6D-06_03_22-00128560.jpg', 1),
(3, 'Dekanat', 'gedung-dekanat.jpg', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_home`
--

CREATE TABLE `header_home` (
  `id` int(11) NOT NULL,
  `caption_header` text DEFAULT NULL,
  `photo_header` varchar(255) DEFAULT NULL,
  `is_publish` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_home`
--

INSERT INTO `header_home` (`id`, `caption_header`, `photo_header`, `is_publish`) VALUES
(7, 'Welcome Fikes Bhamada', '66f652f970311.jpg', 1),
(8, 'Univ Bhamada', '66f6531a1717f.jpg', 1),
(9, 'Fakultas Ilmu Kesehatan Univ Bhamada', '66f65355ed0e9.jpg', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `komite_etik`
--

CREATE TABLE `komite_etik` (
  `id_komite_etik` int(11) NOT NULL,
  `keterangan_komite_etik` text NOT NULL,
  `file_komite_etik` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `file_logo` varchar(500) NOT NULL,
  `caption_logo` text NOT NULL,
  `is_publish` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id_logo`, `file_logo`, `caption_logo`, `is_publish`) VALUES
(1, 'fikes-white.png', 'Logo Fikes Bhamada', 1),
(2, 'gedung-dekanat.jpg', 'Gedung Dekanat', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id_ps`, `kaprodi_fullname`, `sekprodi_fullname`, `is_prodi`, `lokasi_ps`, `kontak_ps`, `vmts_ps`, `bid_peminatan_ps`, `lulusan_ps`, `capaian_pembelajaran`, `is_publish`) VALUES
(1, 'Dr. Wisnu Widyantoro, M.Kep', 'Firman Hidayat, M.Kep., Ns.Sp.Kep.J', 'Profesi Ners', 'Gedung Lantai 1 Bhamada', '021-123-123-321', 'Visi Prodi Ners Universitas Bhamada adalah menjadi program studi yang unggul, mandiri, dan berdaya saing global pada tahun 2040.', 'Test Bidan Peminatanan', 'Lulusan', 'Capaian Pembelajaran', 1),
(8, 'asd', 'assd', 'Keselamatan dan Kesehatan Kerja', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id_struktur`, `fullname`, `jabatan`, `keterangan_satu`, `keterangan_dua`, `keterangan_tiga`) VALUES
(3, 'Prof. Ari Kuncoro, S.E., M.A., Ph.D', 'Rektor UI ( 2019-2024)', 'photoya.jpg', 'Guru Besar dalam Ilmu Ekonomi dengan Google H-Index 14, yang juga bermakna peringkat pertama di Indonesia untuk sitasi karya ilmiah versi RePEC. Sebelum menduduki jabatan sebagai Rektor UI 2019-2024, beliau menjabat Dekan fakultas Ekonomi dan Bisnis.  Selain aktivitas akademik di FEB UI, beliau menjadi anggota East Asian Economist Association dan menjadi profesor tamu di beberapa kampus terkemuka di Australia dan Amerika Serikat.', ''),
(4, 'Prof. Dr. Ir. Dedi Priadi, DEA', 'Plt. Wakil Rektor Bidang Akademik dan Kemahasiswaan', 'Warek_4-400x400.jpg', 'Pengajar di Fakultas Teknik UI ini selain menjabat Wakil Rektor Bidang SDM dan Kerjasama, beliau juga mendapat amanah menjabat Plt. Wakil Rektor Bidang Akademik dan Kemahasiswaan.', ''),
(5, 'Vita Silvira, S.E., MBA.', 'Wakil Rektor Bidang Keuangan dan Logistik', 'Warek_2-400x400.jpg', 'Pengajar di Departemen Akuntansi. Sebelum ditunjuk untuk menjabat posisi Wakil Rektor, Beliau menjabat sebagai Wakil Dekan Fakultas Ekonomi dan Bisnis.', ''),
(6, 'drg. Nurtami, Ph.D., Sp,OF(K)', 'Wakil Rektor Bidang Riset dan Inovasi', 'Warek_3-400x400.jpg', 'Pengajar di Fakultas Kedokteran Gigi Universitas Indonesia. Sebelum ditunjuk untuk menjabat posisi Wakil Rektor, beliau sempat menjabat sebagai Direktur di Direktorat Riset dan Inovasi.', ''),
(7, 'dr. Agustin Kusumayati, M.Sc., Ph.D', 'Sekretaris Universitas', 'SekretarisUmum-400x400.jpg', 'Beliau adalah pakar di bidang Penyehatan Makanan, Kesehatan Ibu dan Anak, Kesehatan Reproduksi Remaja. Sebelum dikukuhkan sebagai Sekretaris Universitas, beliau menjabat sebagai Dekan Fakultas Kesehatan Masyarakat.', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_profile_about`
--

CREATE TABLE `sub_profile_about` (
  `id` int(11) NOT NULL,
  `point_text_sub_profile_about` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `keterangan_survey` varchar(500) NOT NULL,
  `link_survey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id_survey`, `keterangan_survey`, `link_survey`) VALUES
(1, 'Penilaian_Pelayanan-FIKES', 'https://bit.ly/Penilaian_Pelayanan-FIKES'),
(2, 'Penilaian Layanan Sarpras  [ Untuk Mahasiswa/Mahasiswi ]', 'https://bit.ly/Penilaian_Pelayanan-FIKES'),
(3, 'Penilaian Layanan Sarpras [ Untuk Karyawan/Pegawai ]', 'https:///google.com');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_ahli`
--

CREATE TABLE `tenaga_ahli` (
  `id_tenaga_ahli` int(11) NOT NULL,
  `fullname_tenaga_ahli` varchar(500) NOT NULL,
  `level_tenaga_ahli` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `sejarah`, `visi_misi`, `foto_struktur_organisasi`, `caption_struktur_organisasi`) VALUES
(1, '<p>Universitas Bhamada Slawi adalah lembaga pendidikan tinggi di bawah Yayasan Pendidikan Tri Sanja Husada Slawi yang berdiri pada 19 Juli 2021 sebagai perubahan bentuk dari STIKes Bhakti Mandala Husada Slawi.</p><p><br>Awalnya, STIKes Bhakti Mandala Husada Slawi merupakan sebuah institusi pendidikan tinggi yang fokus mencetak tenaga kesehatan handal dan profesional yang berdiri pada tahun 2005. Sebelumnya merupakan penggabungan dua lembaga pendidikan tinggi yaitu Akbid Bhamada Slawi dan Akper Bhamada Slawi yang berdiri sejak tahun 1995.</p><p><br>Sesuai dengan ijin perubahan bentuk menjadi Universitas Bhamada Slawi mengelola beberapa fakultas seperti, Fakultas Ilmu Kesehatan (FIKES), Fakultas Ekonomi dan Bisnis (FEB) dan Fakultas Informatika (FIKOM).</p><p>Fakultas Ilmu Kesehatan (FIKES) sebagai embrio berdirinya Universitas Bhamada Slawi, menyelenggarakan beberapa prodi diantaranya Prodi Diploma III Keperawatan, Prodi Diploma III Kebidanan, Prodi Sarjana Keperawatan dan Profesi Ners, Prodi Sarjana Farmasi dan Prodi Diploma IV Keselamatan Kesehatan Kerja yang telah terakreditasi LAMP-PT Kesehatan dengan Kriteria Baik Sekali dan terakreditasi BAN-PT dengan Kriteria Baik Sekali.</p>', '<br><b><u>VISI<br></u></b>Terwujudnya\r\nfakultas yang unggul dalam menghasilkan tenaga kesehatan yang berakhlak mulia,\r\nberkemampuan IPTEKs dan berjiwa wirausaha tahun 2030.<br>&nbsp;<br><b><u>MISI<br></u></b>1. Menyelenggarakan pendidikan dan\r\npengajaran di bidang ilmu kesehatan mengacu kepada Kurikulum Kerangka\r\nKualifikasi Nasional Indonesia.<br>2. Menyelenggarakan proses pendidikan dan\r\nmenghasilkan lulusan yang berakhlak mulia, berkemampuan IPTEKs dan berjiwa\r\nwirausaha.<br>3. Menyelenggarakan dan mengembangkan ilmu\r\npengetahuan dan riset di bidang kesehatan.<br> 4. Menyelenggarakan dan mengembangkan\r\npengabdian kepada masyarakat di bidang kesehatan.<br>5. Mengembangkan jaringan kerja sama untuk\r\nmeningkatkan kapasitas dan daya saing FIKes.<br>&nbsp;<br><b><u>TUJUAN<br></u></b>1. Terwujudnya proses pendidikan ilmu\r\nkesehatan dengan mengacu kepada Kurikulum Kerangka Kualifikasi Nasional\r\nIndonesia sehingga menghasilkan lulusan yang profesional.<br>2. Terselenggaranya layanan akademik yang\r\nberkualitas serta proses pembelajaran yang bermutu berdasarkan penciri\r\ninstitusi.<br>3. Terselengaranya kegiatan dan\r\npengembangan ilmu pengetahuan dan riset di bidang kesehatan.<br>4. Terselenggaranya kegiatan dan\r\npengembangan pengabdian kepada masyarakat di bidang kesehatan.<br>5. Terselenggaranya kerjasama dengan\r\nberbagai institusi untuk memperkuat kapasitas dan daya saing Fakultas Ilmu\r\nKesehatan.<br>&nbsp;<br><b><u>SASARAN<br></u></b>1. Meningkatnya\r\nmutu pembelajaran.<br>2. Meningkatnya\r\nlayanan di bidang kemahasiswaan.<br>3. Meningkatnya\r\nkompetensi dosen dan mahasiswa melalui kegiatan pembelajaran yang bersumber\r\ndari hasil-hasil penelitian.<br>4. Meningkatnya\r\nhasil penelitian yang berbasis IPTEKs.<p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p></p>', 'tentang/uploads/66fceaff5fa86.png', '<p></p><h2>Periode 2024 -\r\n2025&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2><blockquote><h4></h4><h1><b>SK Rektor Universitas Bhamada\r\nSlawi&nbsp;</b></h1><h4></h4><h3><b>Nomor\r\n030/Univ.BHAMADA/KEP/V/2024</b></h3></blockquote>&nbsp;<br>Dekan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:\r\nRosmalia, S.T.,M.Kes.<br>Wakil Dekan\r\nBidang Akademik&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Siswati,\r\nS.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Adum&amp;Keu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Sri\r\nHidayati, Ns.,M.Kep.,Sp.Kep.MB.<br>Wakil Dekan\r\nBidang Kemahasiswaan&nbsp; &nbsp; : Deni Irawan,\r\nNs.,M.Kep.<br>&nbsp;<br>&nbsp;<br><br><h2>Periode 2023 -\r\n2024&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br></h2><blockquote><h4></h4><h1><b>SK Rektor Universitas Bhamada\r\nSlawi&nbsp;</b></h1><h4></h4><h3><b>Nomor\r\n059/Univ.BHAMADA/KEP/VIII/2023</b></h3></blockquote>&nbsp;<br>Dekan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:\r\nDwi Budi Prastiani, Ns.,M.Kep.,Sp.Kep.Kom<br>Wakil Dekan\r\nBidang Akademik&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Siswati,\r\nS.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Adum&amp;Keu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Arifin\r\nDwi Atmaja, Ns.,M.Kep.<br>Wakil Dekan\r\nBidang Kemahasiswaan&nbsp; &nbsp; &nbsp; : Deni Irawan,\r\nNs.,M.Kep.<br>&nbsp;<br><br><h2>Periode 2021 - 2023&nbsp; &nbsp; &nbsp;&nbsp;</h2><blockquote><h1><b>SK Ketua Yayasan Pendidikan Tri Sanja Husada</b><span><b>&nbsp;</b><br></span></h1><h4><b>Nomor 009/KP/YPTSH/VIII/2021</b></h4></blockquote>&nbsp;<br>Dekan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:\r\nNatiqotul Fatkhiyah, S.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Akademik&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Siswati,\r\nS.Si.T.,Bdn.,M.Kes.<br>Wakil Dekan\r\nBidang Adum&amp;Keu&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;:&nbsp;Arifin\r\nDwi Atmaja, Ns.,M.Kep.<br>Wakil Dekan\r\nBidang Kemahasiswaan&nbsp; &nbsp; &nbsp;: Deni Irawan,\r\nNs.,M.Kep.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama_ukm`, `logo_ukm`, `ketua_ukm`, `keterangan_ukm`, `pembina_ukm`, `periode_ukm`, `jenis_ukm`, `created_at`) VALUES
(1, 'UKM BMB (Bina Muslim Bhamada)', '1728052871_dpm.png', 'Ketua ya', 'Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking', 'Uswatun Insani, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:42'),
(2, 'UKM PRAMUKA', '', '', '', 'Ratna Widhiastuti, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:43'),
(3, 'UKM KSR(Korps Suka Rela)', '', '', '', 'Agung Tyas Subekti, S.Kep,M.A.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:44'),
(4, 'UKM PIK.R', '', '', '', 'Masturoh, S.ST.,M.P.H.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:45'),
(5, 'UKM BEC (Bhamada English Club)', '', '', '', 'Fiqih Kartika Murti, M.Pd.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:46'),
(6, 'UKM SILAT', '', '', '', 'Ery Nourika Alfiraza, S.Si.,M.Sc.', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:47'),
(7, 'UKM KARATE', '', '', '', 'Dwi Atmoko, M. Pd.', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:48'),
(8, 'UKM BHAPALA(Bhamada Pencinta Alam)', '', '', '', 'Nurhakim Yudhi Wibowo, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:49'),
(9, 'UKM JURNALIKA', '', '', '', 'Ikawati Setyaningrum, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:50'),
(10, 'UKM BASKET', '', '', '', 'Adrestia  Rifki Naharani, S.ST.,M.P.H.', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:51'),
(11, 'UKM SENTRAMADA', '', '', '', 'Anggit Pratiwi, S.Si.,M.P.H.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:52'),
(12, 'UKM VOLI', '', '', '', 'Sri Tanjung Rejeki, S.ST., M.P.H.', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:53'),
(13, 'UKM VOICE', '', '', '', 'Yessy Pramita Widodo, Ns.,M.Kep.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:54'),
(14, 'UKM BADMINTON', '', '', '', 'Ani Ratnaningsih, Ns.,M.Kep.', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:55'),
(15, 'UKM BAC', '', '', '', 'Desi Sri Rejeki, M.Si.', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:56'),
(16, 'UKM FUTSAL', '', '', '', 'Mohamad Azwar Fikri Muttaqien, S.H', '2024-2025', 'UKM-OLAHRAGA', '2024-10-17 09:05:57'),
(17, 'UKM BHAKTI', '', '', '', 'Haries Anom Susetyo Aji Nugroho, M.Kom.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:58'),
(18, 'UKM KWU', '', '', '', 'Wiliyanto, MM.', '2024-2025', 'UKM-SOFTSKILL', '2024-10-17 09:05:59'),
(19, 'BEM Badan Eksekutif Mahasiswa', '', 'Mohamad Anggie Ristian (D3 Keperawatan)', '-', 'Firman Hidayat, Ns.,M.Kep.,Sp.Kep.J.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(20, 'DPM Dewan Pembina Mahasiswa', '1728356224_Picture1.png', 'Salsabila Fitriyani (S1 Farmasi)', '-', 'Firman Hidayat, Ns.,M.Kep.,Sp.Kep.J.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(21, 'HIMIKA Himpunan Mahasiswa S1 Ilmu Keperawatan', '', '', '', 'Khodijah, Ns.,M.Kep.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(22, 'HIMAFARDA Himpunan Mahasiswa S1 Farmasi', '', '', '', 'apt. Endang Istriningsih, M.Clin.Pharm.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(23, 'HIMASADA Himpunan Mahasiswa D4 K3', '', '', '', 'Erna Agustin Sukmandari, S.KM.,MPH', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(24, 'HIMADIKA Himpunan Mahasiswa D3 Keperawatan', '1728356193_Picture3.png', 'Satriyo Fajar Nugroho', '-', 'Ita Nur Itsna, Ns.,M.A.N.', '2024-2025', 'HIM', '0000-00-00 00:00:00'),
(25, 'HIMADAN Himpunan Mahasiswa D3 Kebidanan', '', '', '', 'Yuni Fitriani, S.Si.T.,M.P.H.', '2024-2025', 'HIM', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_kategories`
--
ALTER TABLE `course_kategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `file_sertifikat`
--
ALTER TABLE `file_sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_unduh`
--
ALTER TABLE `form_unduh`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
