-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2025 at 06:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broadcastinformation`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `ID_Departemen` bigint UNSIGNED NOT NULL,
  `Nama_Departemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`ID_Departemen`, `Nama_Departemen`) VALUES
(4030000001, 'Hubin'),
(4030000002, 'BK'),
(4030000003, 'Perpustakaan'),
(4030000004, 'Kurikulum'),
(4030000005, 'Kesiswaan');

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
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `ID_Guru` bigint UNSIGNED NOT NULL,
  `Nama_Guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`ID_Guru`, `Nama_Guru`, `name`) VALUES
(1979011219, 'Yusuf Maulana', 'Yusuf Maulana'),
(1980041519, 'Budi Santoso', 'Budi Santoso'),
(1983070919, 'Siti Aminah', 'Siti Aminah'),
(1984062119, 'Rudi Hartono', 'Rudi Hartono'),
(1986021619, 'Rina Kurniawati', 'Rina Kurniawati');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `IDInformasi` bigint UNSIGNED NOT NULL,
  `IDOperator` bigint UNSIGNED NOT NULL,
  `IDKategoriInformasi` bigint UNSIGNED NOT NULL,
  `IDUser` bigint UNSIGNED NOT NULL,
  `Judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalPublikasi` date NOT NULL,
  `TargetDepartemen` enum('Umum','Khusus') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` enum('IsDeclined','IsAccepted','IsPending') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_informasi`
--

CREATE TABLE `kategori_informasi` (
  `IDKategoriInformasi` bigint UNSIGNED NOT NULL,
  `NamaKategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_informasi`
--

INSERT INTO `kategori_informasi` (`IDKategoriInformasi`, `NamaKategori`, `Deskripsi`) VALUES
(1, 'Announcements', 'Informasi resmi dan pengumuman terbaru untuk seluruh warga sekolah.'),
(2, 'Academic', 'Berisi hal-hal terkait kegiatan belajar mengajar, jadwal ujian, dan akademik lainnya.'),
(3, 'Events', ' Informasi tentang acara, kegiatan, atau program yang akan diselenggarakan oleh sekolah.'),
(4, 'News', 'Berita terbaru tentang perkembangan, prestasi, atau kegiatan sekolah.'),
(5, 'Achievements', 'Penghargaan, prestasi siswa maupun guru di tingkat lokal, nasional, maupun internasional.'),
(6, 'Facilities', ' Informasi tentang sarana dan prasarana yang tersedia di lingkungan sekolah.'),
(7, 'Religion', 'Kegiatan keagamaan, peringatan hari besar agama, dan pembinaan kerohanian.'),
(8, 'Health', ' Informasi kesehatan, tips menjaga kebugaran, dan kampanye kesehatan sekolah.'),
(9, 'Emergency', 'Pemberitahuan penting terkait keadaan darurat, keselamatan, atau bencana.');

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
(2, '0001_01_01_000001_create_users_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_25_020531_create_departemen_table', 1),
(5, '2025_04_25_020558_create_guru_table', 1),
(6, '2025_04_25_020558_create_siswa_table', 1),
(7, '2025_04_25_020559_create_operator_departemen_table', 1),
(8, '2025_04_25_020560_create_kategori_informasi_table', 1),
(9, '2025_04_25_020600_create_informasi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator_departemen`
--

CREATE TABLE `operator_departemen` (
  `IDOperator` bigint UNSIGNED NOT NULL,
  `ID_Departemen` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaOperatorDepartemen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operator_departemen`
--

INSERT INTO `operator_departemen` (`IDOperator`, `ID_Departemen`, `IDuser`, `NamaOperatorDepartemen`) VALUES
(1000000001, 4030000002, 'Dedi Kurniawan', 'Dedi Kurniawan'),
(1000000002, 4030000001, 'Tika Melani', 'Tika Melani'),
(1000000003, 4030000003, 'Bagus Setiawan', 'Bagus Setiawan'),
(1000000004, 4030000004, 'Lina Oktaviana', 'Lina Oktaviana'),
(1000000005, 4030000005, 'Budi Santoso', 'Budi Santoso');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `ID_Siswa` bigint UNSIGNED NOT NULL,
  `Nama_Siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`ID_Siswa`, `Nama_Siswa`, `name`) VALUES
(2301234567, 'Mosses Aryo Bimo', 'Mosses Aryo Bimo'),
(2302345678, 'Riani Destianti', 'Riani Destianti'),
(2303456789, 'Nadhip Rahmatillah', 'Nadhip Rahmatillah'),
(2304567890, 'Evi Restiyani', 'Evi Restiyani'),
(2305678901, 'Fajar Sidiq', 'Fajar Sidiq');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Riani Destianti', 'rianidestiantii@gmail.com', '2025-04-02 04:05:27', 'deefb9817b388f2374e96ef4683e67b1', NULL, '2025-04-23 04:05:27', '2025-04-09 04:05:27'),
(2, 'Evi Restiyani', 'evirestiyani@gmail.com', '2025-04-16 04:07:51', '9bbec31042a0470defd027d93eb054f5', NULL, '2025-04-30 04:07:51', '2025-04-30 04:07:51'),
(3, 'Mosses Aryo Bimo', 'mosessaryobimo@gmail.com', '2025-04-29 04:09:25', '19fac44daf142287c525b63c8b144b36', NULL, '2025-04-29 04:09:25', '2025-04-29 04:09:25'),
(4, 'Fajar Sidiq', 'fajarsidiq@gmail.com', '2025-04-30 04:10:45', '7bedc9fd30769590c992b8f7f23738f7', NULL, '2025-04-14 04:10:45', '2025-04-24 04:10:45'),
(5, 'Nadhip Rahmatillah', 'nadhiprahmatillah@gmail.com', '2025-04-10 04:11:38', '88e03f517dc36d84074dcdb44b8880bb', NULL, '2025-04-29 04:11:38', '2025-04-29 04:11:38'),
(6, 'Budi Santoso', 'budi.santoso@smkn11bdg.sch.id', '2025-04-17 04:44:13', '9c5fa085ce256c7c598f6710584ab25d', NULL, '2025-04-09 04:44:13', '2025-04-29 04:44:13'),
(7, 'Siti Aminah', 'siti.aminah@smkn11bdg.sch.id', '2025-04-23 04:44:13', '5c2e4a2563f9f4427955422fe1402762', NULL, '2025-04-29 04:44:13', '2025-04-23 04:44:13'),
(8, 'Rina Kurniawati', 'rina.kurniawati@smkn11bdg.sch.id', '2025-04-22 04:47:59', '9a1591b6e5317fb71c6032eedd5c051a', NULL, '2025-04-30 04:47:59', '2025-04-16 04:47:59'),
(9, 'Yusuf Maulana', 'yusuf.maulana@smkn11bdg.sch.id', '2025-04-24 04:47:59', 'add3deb05fc6625aae939041e4131624', NULL, '2025-04-23 04:47:59', '2025-04-09 04:47:59'),
(10, 'Rudi Hartono', 'rudi.hartono@smkn11bdg.sch.id', '2025-04-23 04:50:11', 'bfcd3eee9746714ca4fcba684344bbc0', NULL, '2025-04-17 04:50:11', '2025-04-23 04:50:11'),
(11, 'Dedi Kurniawan', 'dedi.k@smkn11bdg.sch.id', '2025-04-02 05:52:17', '711ccac10b1be72d703acdb209b1d892', NULL, '2025-04-23 05:52:17', '2025-04-24 05:52:17'),
(12, 'Tika Melani', 'tika.m@smkn11bdg.sch.id', '2025-04-09 05:53:51', '7a9c9826cf4184fa8baa132c0bf57c81', NULL, '2025-04-10 05:53:51', '2025-04-23 05:53:51'),
(13, 'Bagus Setiawan', 'bagus.s@smkn11bdg.sch.id', '2025-04-30 05:55:19', 'a89407b9014f6f6d9a85f2d5b6a2c118', NULL, '2025-04-30 05:55:19', '2025-04-30 05:55:19'),
(14, 'Lina Oktaviana', 'lina.o@smkn11bdg.sch.id', '2025-04-30 05:56:15', '528a3c500e49e8d14159dd2935ee36a1', NULL, '2025-04-30 05:56:15', '2025-04-21 05:56:15'),
(15, 'Budi Santoso', 'budi.s@smkn11bdg.sch.id', '2025-04-23 05:56:15', '9c5fa085ce256c7c598f6710584ab25d', NULL, '2025-04-24 05:56:15', '2025-04-18 05:56:15');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`ID_Departemen`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`ID_Guru`),
  ADD KEY `guru_name_foreign` (`name`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`IDInformasi`),
  ADD KEY `informasi_idoperator_foreign` (`IDOperator`),
  ADD KEY `informasi_idkategoriinformasi_foreign` (`IDKategoriInformasi`),
  ADD KEY `informasi_iduser_foreign` (`IDUser`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_informasi`
--
ALTER TABLE `kategori_informasi`
  ADD PRIMARY KEY (`IDKategoriInformasi`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator_departemen`
--
ALTER TABLE `operator_departemen`
  ADD PRIMARY KEY (`IDOperator`),
  ADD KEY `operator_departemen_id_departemen_foreign` (`ID_Departemen`),
  ADD KEY `operator_departemen_name_foreign` (`name`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`ID_Siswa`),
  ADD KEY `siswa_name_foreign` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_name_index` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `ID_Departemen` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4030000006;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `ID_Guru` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198602161997062010;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `IDInformasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_informasi`
--
ALTER TABLE `kategori_informasi`
  MODIFY `IDKategoriInformasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `operator_departemen`
--
ALTER TABLE `operator_departemen`
  MODIFY `IDOperator` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000006;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `ID_Siswa` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2305678902;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_name_foreign` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE;

--
-- Constraints for table `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_idkategoriinformasi_foreign` FOREIGN KEY (`IDKategoriInformasi`) REFERENCES `kategori_informasi` (`IDKategoriInformasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `informasi_idoperator_foreign` FOREIGN KEY (`IDOperator`) REFERENCES `operator_departemen` (`IDOperator`) ON DELETE CASCADE,
  ADD CONSTRAINT `informasi_iduser_foreign` FOREIGN KEY (`IDUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `operator_departemen`
--
ALTER TABLE `operator_departemen`
  ADD CONSTRAINT `operator_departemen_id_departemen_foreign` FOREIGN KEY (`ID_Departemen`) REFERENCES `departemen` (`ID_Departemen`) ON DELETE CASCADE,
  ADD CONSTRAINT `operator_departemen_name_foreign` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_name_foreign` FOREIGN KEY (`name`) REFERENCES `users` (`name`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
