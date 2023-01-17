-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jan 2023 pada 02.57
-- Versi server: 10.5.16-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20154699_db_hippocampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id_cart` int(5) UNSIGNED NOT NULL,
  `kode_cart` varchar(50) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_course` int(5) NOT NULL,
  `status_cart` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_cart`
--

INSERT INTO `tb_cart` (`id_cart`, `kode_cart`, `id_user`, `id_course`, `status_cart`, `created_at`, `updated_at`) VALUES
(1, 'CART-0120234', 4, 1, 'non-active', '2023-01-16 08:10:20', '2023-01-16 08:10:33'),
(2, 'CART-0120234', 4, 1, 'non-active', '2023-01-16 08:11:38', '2023-01-16 08:11:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(5) UNSIGNED NOT NULL,
  `nama_category` varchar(50) NOT NULL,
  `parent_category` int(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `nama_category`, `parent_category`, `created_at`, `updated_at`) VALUES
(1, 'Saintek', 0, '2023-01-16 07:43:59', '2023-01-16 07:43:59'),
(2, 'Soshum', 0, '2023-01-16 07:44:03', '2023-01-16 07:44:03'),
(3, 'Fisika', 1, '2023-01-16 07:44:11', '2023-01-16 07:44:11'),
(4, 'Kimia', 1, '2023-01-16 07:44:16', '2023-01-16 07:44:16'),
(5, 'Biologi', 1, '2023-01-16 07:44:21', '2023-01-16 07:44:21'),
(6, 'Matematika', 1, '2023-01-16 07:44:27', '2023-01-16 07:44:27'),
(7, 'Sosiologi', 2, '2023-01-16 07:44:39', '2023-01-16 07:44:39'),
(8, 'Sejarah', 2, '2023-01-16 07:44:49', '2023-01-16 07:44:49'),
(9, 'Geografi', 2, '2023-01-16 07:45:00', '2023-01-16 07:45:00'),
(10, 'Ekonomi', 2, '2023-01-16 07:45:07', '2023-01-16 07:45:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_course`
--

CREATE TABLE `tb_course` (
  `id_course` int(5) UNSIGNED NOT NULL,
  `nama_course` varchar(50) NOT NULL,
  `desc_course` text NOT NULL,
  `harga_course` double NOT NULL,
  `thumb_course` varchar(50) NOT NULL DEFAULT 'def-course-thumb.png',
  `id_category` int(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_course`
--

INSERT INTO `tb_course` (`id_course`, `nama_course`, `desc_course`, `harga_course`, `thumb_course`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Saintek', '&lt;p&gt;Saintek sendiri merupakan kependekan dari “Sains dan Teknologi”. Maka pengertian saintek adalah&amp;nbsp;&lt;font color=&quot;#202124&quot; face=&quot;arial, sans-serif&quot;&gt;&lt;span style=&quot;background-color: rgb(255, 255, 255);&quot;&gt;kelompok ujian masuk perguruan tinggi yang masih berhubungan dengan dunia sains serta teknologi&lt;/span&gt;&lt;/font&gt;.&lt;br&gt;&lt;/p&gt;', 200000, '16012023014613.jpg', 1, '2023-01-16 07:46:13', '2023-01-16 07:46:13'),
(2, 'Soshum', '&lt;p&gt;soshum&amp;nbsp;merupakan bidang keilmuan yang membahas tentang manusia dan kehidupan sosial mereka&lt;br&gt;&lt;/p&gt;', 150000, '16012023014820.jpg', 2, '2023-01-16 07:48:20', '2023-01-16 07:48:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lesson`
--

CREATE TABLE `tb_lesson` (
  `id_lesson` int(5) UNSIGNED NOT NULL,
  `nama_lesson` varchar(50) NOT NULL,
  `desc_lesson` text NOT NULL,
  `type_lesson` varchar(20) NOT NULL,
  `attr_lesson` varchar(50) NOT NULL,
  `id_section` int(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_lesson`
--

INSERT INTO `tb_lesson` (`id_lesson`, `nama_lesson`, `desc_lesson`, `type_lesson`, `attr_lesson`, `id_section`, `created_at`, `updated_at`) VALUES
(1, 'Tubuh Manusia ', 'BAB 1', '', '16012023015407.pdf', 3, '2023-01-16 07:54:07', '2023-01-16 07:54:07'),
(2, 'Hewan', 'BAB 2', '', '16012023015419.pdf', 3, '2023-01-16 07:54:19', '2023-01-16 07:54:19'),
(3, 'Tumbuhan', 'BAB 3', '', '16012023015431.pdf', 3, '2023-01-16 07:54:31', '2023-01-16 07:54:31'),
(4, 'Mikroorganisme', 'BAB 4', '', '16012023015444.pdf', 3, '2023-01-16 07:54:44', '2023-01-16 07:54:44'),
(5, 'Sel dan Jaringan', 'BAB 5', '', '16012023015500.pdf', 3, '2023-01-16 07:55:00', '2023-01-16 07:55:00'),
(6, 'Mekanika', 'BAB 1', '', '16012023015524.pdf', 1, '2023-01-16 07:55:24', '2023-01-16 07:55:24'),
(7, 'Fluida', 'BAB 2', '', '16012023015535.pdf', 1, '2023-01-16 07:55:35', '2023-01-16 07:55:35'),
(8, 'Getaran dan gelombang', 'BAB 3', '', '16012023015553.pdf', 1, '2023-01-16 07:55:53', '2023-01-16 07:55:53'),
(9, 'Gravitasi', 'BAB 4', '', '16012023015613.pdf', 1, '2023-01-16 07:56:13', '2023-01-16 07:56:13'),
(10, 'Listrik statis dan dinamis', 'BAB 5', '', '16012023015626.pdf', 1, '2023-01-16 07:56:26', '2023-01-16 07:56:26'),
(11, 'Stoikiometri', 'BAB 1', '', '16012023015655.pdf', 2, '2023-01-16 07:56:55', '2023-01-16 07:56:55'),
(12, 'Larutan Asam dan Basa', 'BAB 2', '', '16012023015711.pdf', 2, '2023-01-16 07:57:11', '2023-01-16 07:57:11'),
(13, 'Laju reaksi', 'BAB 3', '', '16012023015725.pdf', 2, '2023-01-16 07:57:25', '2023-01-16 07:57:25'),
(14, 'Koloid', 'BAB 4', '', '16012023015751.pdf', 2, '2023-01-16 07:57:51', '2023-01-16 07:57:51'),
(15, 'Kimia Unsur', 'BAB 5', '', '16012023015823.pdf', 2, '2023-01-16 07:58:23', '2023-01-16 07:58:23'),
(16, 'Eksponen', 'BAB 1', '', '16012023015852.pdf', 4, '2023-01-16 07:58:52', '2023-01-16 07:58:52'),
(17, 'Logaritma', 'BAB 2', '', '16012023015907.pdf', 4, '2023-01-16 07:59:07', '2023-01-16 07:59:07'),
(18, 'Komposisi dan Invers', 'BAB 3', '', '16012023015932.pdf', 4, '2023-01-16 07:59:32', '2023-01-16 07:59:32'),
(19, 'Persamaan Kuadrat', 'BAB 4', '', '16012023015952.pdf', 4, '2023-01-16 07:59:52', '2023-01-16 07:59:52'),
(20, 'Fungsi Kuadrat', 'BAB 5', '', '16012023020011.pdf', 4, '2023-01-16 08:00:11', '2023-01-16 08:00:11'),
(21, 'Masalah Ekonomi', 'BAB 1', '', '16012023020037.pdf', 6, '2023-01-16 08:00:37', '2023-01-16 08:00:37'),
(22, 'Kegiatan Ekonomi dan Pelaku Ekonomi', 'BAB 2', '', '16012023020056.pdf', 6, '2023-01-16 08:00:56', '2023-01-16 08:00:56'),
(23, 'Permintaan dan Penawaran', 'BAB 3', '', '16012023020132.pdf', 6, '2023-01-16 08:01:32', '2023-01-16 08:01:32'),
(24, 'Kebijakan Pemerintah', 'BAB 4 ', '', '16012023020156.pdf', 6, '2023-01-16 08:01:56', '2023-01-16 08:01:56'),
(25, 'Bentuk-bentuk pasar', 'BAB 5', '', '16012023020209.pdf', 6, '2023-01-16 08:02:09', '2023-01-16 08:02:09'),
(26, 'Konsep Dasar Geografi', 'BAB 1', '', '16012023020253.pdf', 7, '2023-01-16 08:02:53', '2023-01-16 08:02:53'),
(27, 'Litosfer', 'BAB 2', '', '16012023020306.pdf', 7, '2023-01-16 08:03:06', '2023-01-16 08:03:06'),
(28, 'Atmosfer', 'BAB 3', '', '16012023020318.pdf', 7, '2023-01-16 08:03:18', '2023-01-16 08:03:18'),
(29, 'Hidrosfer', 'BAB 4', '', '16012023020333.pdf', 7, '2023-01-16 08:03:33', '2023-01-16 08:03:33'),
(30, 'Laut dan Pesisir', 'BAB 5', '', '16012023020348.pdf', 7, '2023-01-16 08:03:48', '2023-01-16 08:03:48'),
(31, 'Islam di Indonesia', 'BAB 1', '', '16012023020412.pdf', 8, '2023-01-16 08:04:12', '2023-01-16 08:04:12'),
(32, 'Hindu dan Budha ', 'BAB 2', '', '16012023020433.pdf', 8, '2023-01-16 08:04:33', '2023-01-16 08:04:33'),
(33, 'Sejarah pemikiran eropa', 'BAB 3', '', '16012023020453.pdf', 8, '2023-01-16 08:04:53', '2023-01-16 08:04:53'),
(34, 'Peradaban Kuno', 'BAB 4', '', '16012023020509.pdf', 8, '2023-01-16 08:05:09', '2023-01-16 08:05:09'),
(35, 'Zama Prasajarah', 'BAB 5', '', '16012023020527.pdf', 8, '2023-01-16 08:05:27', '2023-01-16 08:05:27'),
(36, 'Ilmu sosiologi dan Penelitian sosial', 'BAB 1', '', '16012023020557.pdf', 5, '2023-01-16 08:05:57', '2023-01-16 08:05:57'),
(37, 'Nilai dan Norma Sosial', 'BAB 2', '', '16012023020616.pdf', 5, '2023-01-16 08:06:16', '2023-01-16 08:06:16'),
(38, 'Interaksi sosial dan Sosialisasi', 'BAB 3', '', '16012023020642.pdf', 5, '2023-01-16 08:06:42', '2023-01-16 08:06:42'),
(39, 'Keteraturan dan Konflik sosial', 'BAB 4', '', '16012023020704.pdf', 5, '2023-01-16 08:07:04', '2023-01-16 08:07:04'),
(40, 'Perilaku Menyimpang ', 'BAB 5 ', '', '16012023020726.pdf', 5, '2023-01-16 08:07:26', '2023-01-16 08:07:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(5) UNSIGNED NOT NULL,
  `nama_role` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-01-16 07:42:08', '2023-01-16 07:42:08'),
(2, 'User', '2023-01-16 07:42:08', '2023-01-16 07:42:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_section`
--

CREATE TABLE `tb_section` (
  `id_section` int(5) UNSIGNED NOT NULL,
  `nama_section` varchar(50) NOT NULL,
  `desc_section` text NOT NULL,
  `id_course` int(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_section`
--

INSERT INTO `tb_section` (`id_section`, `nama_section`, `desc_section`, `id_course`, `created_at`, `updated_at`) VALUES
(1, 'Fisika', 'fisika yaitu sebuah ilmu pengetahuan dimana didalamnya mempelajari tentang sifat dan fenomena alam atau gejala alam dan seluruh interaksi yang terjadi didalamnya.', 1, '2023-01-16 07:49:49', '2023-01-16 07:49:49'),
(2, 'Kimia', 'Kimia adalah ilmu yang mempelajari mengenai komposisi, struktur, dan sifat zat atau materi dari skala atom hingga molekul serta transformasi dan interaksi mereka untuk membentuk materi yang ditemukan di kehidupan sehari-hari', 1, '2023-01-16 07:50:30', '2023-01-16 07:50:30'),
(3, 'Biologi ', 'Biologi dapat diartikan sebagai ilmu yang mempelajari tentang makhluk hidup', 1, '2023-01-16 07:51:00', '2023-01-16 07:51:00'),
(4, 'Matematika', 'Matematika adalah ilmu tentang logika mengenai bentuk, susunan, besaran dan konsep-konsep yang berhubungan satu dengan yang lainnya dengan jumlah yang banyak dan terbagi kedalam tiga bidang, yaitu aljabar, analisis dan geometri.', 1, '2023-01-16 07:51:27', '2023-01-16 07:51:27'),
(5, 'Sosiologi', 'Sosiologi adalah Ilmu yang menyelidiki tentang susunan-susunan dan proses kehidupan social sebagai suatu keseluruhan / suatu sistem.', 2, '2023-01-16 07:52:16', '2023-01-16 07:52:16'),
(6, 'Ekonomi', 'Ekonomi adalah lmu yang mempelajari bagaimana cara manusia untuk memenuhi kebutuhan hidup mereka dengan menggunakan sumber daya yang tersedia.', 2, '2023-01-16 07:52:43', '2023-01-16 07:52:43'),
(7, 'Geografi', 'Geografi adalah ilmu yang mempelajari segala aktifitas manusia dan alam serta interaksi diantara keduanya melalui perspektif ruang hingga terbentuk pola ruang tertentu.', 2, '2023-01-16 07:53:16', '2023-01-16 07:53:16'),
(8, 'Sejarah', 'Sejarah adalah suatu ilmu pengetahuan yang disusun atas hasil penyelidikan beberapa peristiwa yang dapat dibuktikan dengan bahan kenyataan', 2, '2023-01-16 07:53:35', '2023-01-16 07:53:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trans`
--

CREATE TABLE `tb_trans` (
  `id_trans` int(5) UNSIGNED NOT NULL,
  `kode_trans` varchar(50) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_course` int(5) NOT NULL,
  `status_trans` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_trans`
--

INSERT INTO `tb_trans` (`id_trans`, `kode_trans`, `id_user`, `id_course`, `status_trans`, `created_at`, `updated_at`) VALUES
(1, 'CART-0120234', 4, 1, 'success', '2023-01-16 08:10:33', '2023-01-16 08:14:50'),
(2, 'CART-0120234', 4, 1, 'success', '2023-01-16 08:11:41', '2023-01-16 08:14:50'),
(3, 'CART-0120234', 4, 1, 'success', '2023-01-16 08:11:41', '2023-01-16 08:14:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `firstname_user` varchar(50) NOT NULL,
  `lastname_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `foto_user` varchar(50) NOT NULL DEFAULT '-',
  `bio_user` text NOT NULL,
  `id_role` int(5) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `firstname_user`, `lastname_user`, `email_user`, `password_user`, `foto_user`, `bio_user`, `id_role`, `created_at`, `updated_at`) VALUES
(2, 'hippocampus', 'admin', 'hippoadmin@gmail.com', 'c1f2315f63d67e3aa990983e1e1e3e4c', '-', '-', 1, '2023-01-16 07:43:05', '2023-01-16 07:43:20'),
(3, 'nadine', 'cans', 'nadine@example.com', '8f5c853566391602f1a56b305e1d9cd5', '-', '-', 2, '2023-01-16 08:09:12', '2023-01-16 08:09:12'),
(4, 'zulfa mutirara', 'ramadhani', 'zulfamut@gmail.com', '2ae15d26473a85e8e5f4a055b32827f6', '-', '-', 2, '2023-01-16 08:10:03', '2023-01-16 08:10:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indeks untuk tabel `tb_lesson`
--
ALTER TABLE `tb_lesson`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_section`
--
ALTER TABLE `tb_section`
  ADD PRIMARY KEY (`id_section`);

--
-- Indeks untuk tabel `tb_trans`
--
ALTER TABLE `tb_trans`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id_cart` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_course`
--
ALTER TABLE `tb_course`
  MODIFY `id_course` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_lesson`
--
ALTER TABLE `tb_lesson`
  MODIFY `id_lesson` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `id_section` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_trans`
--
ALTER TABLE `tb_trans`
  MODIFY `id_trans` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
