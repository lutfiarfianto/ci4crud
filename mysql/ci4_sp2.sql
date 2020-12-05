-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2020 pada 10.28
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_sp2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'administrator', 'admin sistem'),
(2, 'member', 'user member mahasiswa'),
(3, 'pengajar', 'pengajar siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'lutfiarfianto@gmail.com', 1, '2020-11-13 20:25:50', 0),
(2, '::1', 'lutfiarfianto@gmail.com', 1, '2020-11-13 20:46:35', 0),
(3, '::1', 'lutfiarfianto@gmail.com', NULL, '2020-11-13 22:41:16', 0),
(4, '::1', 'lutfiarfianto@gmail.com', 1, '2020-11-13 22:41:30', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1605307389, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_diskusi`
--

CREATE TABLE `sp_diskusi` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `judul_diskusi` text DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `gambar_soal` text DEFAULT NULL,
  `rating_soal` float(255,0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publishing` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_diskusi_reply`
--

CREATE TABLE `sp_diskusi_reply` (
  `id` int(11) UNSIGNED NOT NULL,
  `diskusi_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `publishing` varchar(255) DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `gambar_reply` text DEFAULT NULL,
  `video_reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_jawaban_soal_tryout`
--

CREATE TABLE `sp_jawaban_soal_tryout` (
  `id` int(11) UNSIGNED NOT NULL,
  `siswa_id` int(11) DEFAULT NULL COMMENT ':user_id',
  `judul_tryout_id` int(11) DEFAULT NULL,
  `skor_tryout_id` int(11) DEFAULT NULL,
  `soal_tryout_id` int(11) DEFAULT NULL,
  `jawaban_pilihan` varchar(255) DEFAULT NULL,
  `skor_pilihan` int(11) DEFAULT NULL,
  `jawaban_esay` text DEFAULT NULL,
  `skor_esay` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_judul_tryout`
--

CREATE TABLE `sp_judul_tryout` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul_tryout` varchar(255) DEFAULT NULL,
  `waktu_tryout` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `mata_kuliah_id` int(11) DEFAULT NULL,
  `status_tryout` varchar(255) DEFAULT NULL COMMENT '=publish,draft,pending',
  `tipe_tryout` varchar(255) DEFAULT NULL COMMENT '=multiplechoice,esay',
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sp_judul_tryout`
--

INSERT INTO `sp_judul_tryout` (`id`, `judul_tryout`, `waktu_tryout`, `semester`, `mata_kuliah_id`, `status_tryout`, `tipe_tryout`, `created_at`, `updated_at`, `deleted_at`, `last_user_id`) VALUES
(1, 'Libero natus iste iusto dolore pariatur ut.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:55.000000', '2020-11-15 23:31:55.000000', NULL, NULL),
(2, 'Enim dignissimos optio vel nihil eos rerum neque.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(3, 'Et dolores numquam iusto esse accusamus cumque.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(4, 'Sit aut consequatur et tempora repudiandae excepturi magnam.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(5, 'A et excepturi omnis alias omnis aliquid qui.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(6, 'Ut labore possimus nulla doloremque.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(7, 'Eaque ut fugit tenetur facilis fugit omnis.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(8, 'Velit ipsa maxime iure aspernatur ullam illum.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(9, 'Nihil impedit quae placeat iure officiis incidunt nostrum.', 120, 1, 1, 'published', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL),
(10, 'Nulla ducimus voluptas possimus officia.', 120, 1, 1, '0', 'ganda', '2020-11-15 23:31:56.000000', '2020-11-15 23:31:56.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_kontak`
--

CREATE TABLE `sp_kontak` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kontak` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sp_kontak`
--

INSERT INTO `sp_kontak` (`id`, `nama_kontak`, `no_hp`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Gabrielle Hickups 3', '(692) 895-1092 x61354', 'hamill.katelyn@hotmail.com', NULL, NULL, NULL),
(3, 'Dr. Griffin O\'Conner', '(353) 587-2831 x408', 'lucienne.wolff@hotmail.com', NULL, NULL, NULL),
(4, 'Dallin Monahan VII', '+1-704-398-0848', 'gudrun.schmeler@yahoo.com', NULL, NULL, NULL),
(5, 'Prof. Shany Cummings', '560-417-8962 x97963', 'cortez.russel@gmail.com', NULL, NULL, NULL),
(6, 'Weston Franecki', '(325) 406-0503 x929', 'zdaniel@yahoo.com', NULL, NULL, NULL),
(12, 'Marjono', '0812345678', 'obsecrostudio@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_mata_kuliah`
--

CREATE TABLE `sp_mata_kuliah` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_mata_kuliah` varchar(255) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sp_mata_kuliah`
--

INSERT INTO `sp_mata_kuliah` (`id`, `nama_mata_kuliah`, `uraian`, `created_at`, `updated_at`, `deleted_at`, `last_user_id`) VALUES
(1, 'kalkulus', NULL, NULL, NULL, NULL, NULL),
(2, 'fisika dasar', NULL, NULL, NULL, NULL, NULL),
(3, 'kimia dasar', 'kimia dasar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_materi`
--

CREATE TABLE `sp_materi` (
  `id` int(11) UNSIGNED NOT NULL,
  `mata_kuliah_id` int(11) DEFAULT NULL,
  `semester` int(255) DEFAULT NULL,
  `judul_materi` varchar(255) DEFAULT NULL,
  `uraian_ringkas` text DEFAULT NULL,
  `url_video` text DEFAULT NULL,
  `url_pdf` text DEFAULT NULL,
  `pengajar` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sp_materi`
--

INSERT INTO `sp_materi` (`id`, `mata_kuliah_id`, `semester`, `judul_materi`, `uraian_ringkas`, `url_video`, `url_pdf`, `pengajar`, `created_at`, `updated_at`, `deleted_at`, `last_user_id`) VALUES
(1, 1, 1, 'Quo laudantium dolor amet autem.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(2, 1, 1, 'Odio nobis et deserunt.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(3, 1, 1, 'Quidem illum deserunt nostrum sit omnis sed.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(4, 1, 1, 'Neque cum rem vitae repellat natus et.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(5, 1, 1, 'Explicabo ipsa laborum facere ex eius eos consequuntur.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(6, 1, 1, 'Dolorum officia architecto soluta.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(7, 1, 1, 'Repudiandae est dicta ex assumenda.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(8, 1, 1, 'Vero sint voluptates ut voluptas.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(9, 1, 1, 'Quia reiciendis minima vitae similique consequuntur fugit.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(10, 1, 1, 'Omnis aut doloribus quae unde et esse.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(11, 2, 1, 'Nisi alias est quod inventore necessitatibus.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(12, 2, 1, 'Iste repellat occaecati dicta.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(13, 2, 1, 'Quam vel corrupti ut sint inventore delectus.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(14, 2, 1, 'Fuga corrupti sit optio in necessitatibus.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(15, 2, 1, 'Ad consectetur quam ea.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(16, 2, 1, 'Est odit totam non veniam minima consequatur.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:56.000000', '2020-11-15 23:54:56.000000', NULL, NULL),
(17, 2, 1, 'Consequatur beatae dolorem culpa quo non optio.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(18, 2, 1, 'Fuga tempora dolorem illo beatae illum cum nisi.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(19, 2, 1, 'Aspernatur voluptas qui fuga quae sint et accusantium porro.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(20, 2, 1, 'Excepturi nam quia ex.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(21, 3, 1, 'Quia quasi incidunt sint minima.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(22, 3, 1, 'Et assumenda et aut nostrum nihil repudiandae asperiores.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(23, 3, 1, 'Asperiores aperiam quia consequuntur.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(24, 3, 1, 'Nihil dolores veniam quasi nostrum odit impedit.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(25, 3, 1, 'Blanditiis qui asperiores quae beatae nostrum.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(26, 3, 1, 'Porro facere eaque maiores maxime molestias.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(27, 3, 1, 'Repudiandae consequuntur voluptas ab.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(28, 3, 1, 'Qui recusandae aperiam suscipit vel sit.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(29, 3, 1, 'Nostrum architecto itaque vero dolorem.', NULL, NULL, NULL, 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL),
(30, 1, 1, 'Quo qui corporis voluptas natus et aspernatur sequi.', 'lorem imsum', '', '', 'Profesor', '2020-11-15 23:54:57.000000', '2020-11-15 23:54:57.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_member_program`
--

CREATE TABLE `sp_member_program` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_pengajar`
--

CREATE TABLE `sp_pengajar` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mata_kuliah_id` int(11) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_pengajar_matakuliah`
--

CREATE TABLE `sp_pengajar_matakuliah` (
  `id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_program`
--

CREATE TABLE `sp_program` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_program` varchar(255) DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sp_program`
--

INSERT INTO `sp_program` (`id`, `nama_program`, `uraian`, `created_at`, `updated_at`, `deleted_at`, `last_user_id`) VALUES
(1, '1 Semester', '1 semester', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_skor_tryout`
--

CREATE TABLE `sp_skor_tryout` (
  `id` int(11) UNSIGNED NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `judul_tryout_id` int(11) DEFAULT NULL,
  `semester` int(255) DEFAULT NULL,
  `waktu_tryout` datetime(6) DEFAULT NULL,
  `skor_tryout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_soal_tryout`
--

CREATE TABLE `sp_soal_tryout` (
  `id` int(11) UNSIGNED NOT NULL,
  `judul_tryout_id` int(11) DEFAULT NULL,
  `no_soal` int(11) DEFAULT NULL,
  `soal` text DEFAULT NULL,
  `gambar_soal` text DEFAULT NULL,
  `pilihan_ganda` text DEFAULT NULL COMMENT 'dipisah crlf',
  `gambar_pilihan_ganda` text DEFAULT NULL,
  `jawaban_soal_ganda` varchar(255) DEFAULT NULL,
  `jawaban_soal_esay` text DEFAULT NULL,
  `pembahasan_soal` text DEFAULT NULL,
  `gambar_pembahasan_soal` text DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL,
  `last_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sp_testimoni`
--

CREATE TABLE `sp_testimoni` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `testimoni` text DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `kritik` text DEFAULT NULL,
  `post_status` varchar(255) DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL,
  `update_at` datetime(6) DEFAULT NULL,
  `deleted_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sp_testimoni`
--

INSERT INTO `sp_testimoni` (`id`, `user_id`, `testimoni`, `saran`, `kritik`, `post_status`, `created_at`, `update_at`, `deleted_at`) VALUES
(1, 8, 'Error delectus aut quia ea.', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 9, 'Magnam et enim quam consequatur.', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 10, 'Ea eveniet quam expedita a ex quas fugit optio.', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 11, 'Id molestias mollitia id earum.', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 12, 'Earum reiciendis ducimus temporibus dolor voluptatem et.', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 13, 'Rerum hic molestias consequatur consequuntur impedit nemo enim.', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 14, 'Voluptate sint esse et et omnis delectus.', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 15, 'Natus eaque et cumque voluptatem dolorem blanditiis.', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 16, 'Ea voluptates ut saepe iste.', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 17, 'Debitis in molestias sequi sint rerum vero neque.', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lutfiarfianto@gmail.com', 'admin', '$2y$10$G7BqV5A10n4G8qUvvimT1euZKRQbaJvDxeAfDJGnDpn02qGr7VIbO', NULL, NULL, NULL, 'dd9e845546ad2b2f3eb1b670ec10b9ae', '', NULL, 1, 0, '2020-11-13 20:21:01', '2020-11-13 20:21:01', NULL),
(2, 'smartprivat@gmail.com', 'adminSmartPrivat', '$2y$10$pTUGvDmql3x1fyQ4MkYfce1kPH7zee6zTcfDf/.w3qopodG.OrXhW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2020-11-13 23:26:05', '2020-11-13 23:26:05', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_diskusi`
--
ALTER TABLE `sp_diskusi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_diskusi_reply`
--
ALTER TABLE `sp_diskusi_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_jawaban_soal_tryout`
--
ALTER TABLE `sp_jawaban_soal_tryout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_judul_tryout`
--
ALTER TABLE `sp_judul_tryout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_kontak`
--
ALTER TABLE `sp_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_mata_kuliah`
--
ALTER TABLE `sp_mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_materi`
--
ALTER TABLE `sp_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_member_program`
--
ALTER TABLE `sp_member_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_pengajar`
--
ALTER TABLE `sp_pengajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_pengajar_matakuliah`
--
ALTER TABLE `sp_pengajar_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_program`
--
ALTER TABLE `sp_program`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_skor_tryout`
--
ALTER TABLE `sp_skor_tryout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_soal_tryout`
--
ALTER TABLE `sp_soal_tryout`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sp_testimoni`
--
ALTER TABLE `sp_testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sp_diskusi`
--
ALTER TABLE `sp_diskusi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_diskusi_reply`
--
ALTER TABLE `sp_diskusi_reply`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_jawaban_soal_tryout`
--
ALTER TABLE `sp_jawaban_soal_tryout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_judul_tryout`
--
ALTER TABLE `sp_judul_tryout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `sp_kontak`
--
ALTER TABLE `sp_kontak`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sp_mata_kuliah`
--
ALTER TABLE `sp_mata_kuliah`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sp_materi`
--
ALTER TABLE `sp_materi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `sp_member_program`
--
ALTER TABLE `sp_member_program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_pengajar`
--
ALTER TABLE `sp_pengajar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_pengajar_matakuliah`
--
ALTER TABLE `sp_pengajar_matakuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_program`
--
ALTER TABLE `sp_program`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sp_skor_tryout`
--
ALTER TABLE `sp_skor_tryout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_soal_tryout`
--
ALTER TABLE `sp_soal_tryout`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sp_testimoni`
--
ALTER TABLE `sp_testimoni`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
