/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : smkn

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 25/05/2022 14:00:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for guru
-- ----------------------------
DROP TABLE IF EXISTS `guru`;
CREATE TABLE `guru`  (
  `nip` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('l','p') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98765435 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guru
-- ----------------------------
INSERT INTO `guru` VALUES (98765433, 'Deden Siagian', 'Jalan serta Yesus', 'l', 'Deden@example.co.id', 'HINDU', '1989-12-31', '2022-05-24 16:18:15', '2022-05-24 16:18:15');
INSERT INTO `guru` VALUES (98765434, 'Yuli Chan', 'Jalan setapak', 'p', 'Yuli@example.co.id', 'ISLAM', '1990-12-31', '2022-05-24 16:18:15', '2022-05-24 16:18:15');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES (1, 'XII RPL', '2021/2022', NULL, NULL);
INSERT INTO `kelas` VALUES (2, 'XII Perhotelan', '2021/2022', NULL, NULL);

-- ----------------------------
-- Table structure for mata_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mata_pelajaran_guru_id_foreign`(`guru_id`) USING BTREE,
  INDEX `mata_pelajaran_kelas_id_foreign`(`kelas_id`) USING BTREE,
  CONSTRAINT `mata_pelajaran_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`nip`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `mata_pelajaran_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mata_pelajaran
-- ----------------------------
INSERT INTO `mata_pelajaran` VALUES (1, 'Memasak', 'Masak Masak Asik', 98765433, 2, NULL, NULL);
INSERT INTO `mata_pelajaran` VALUES (2, 'Mulmed', 'Multimedia', 98765434, 1, NULL, NULL);

-- ----------------------------
-- Table structure for materi_pembelajaran
-- ----------------------------
DROP TABLE IF EXISTS `materi_pembelajaran`;
CREATE TABLE `materi_pembelajaran`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matpel_id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `berkas_materi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `materi_pembelajaran_matpel_id_foreign`(`matpel_id`) USING BTREE,
  CONSTRAINT `materi_pembelajaran_matpel_id_foreign` FOREIGN KEY (`matpel_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materi_pembelajaran
-- ----------------------------
INSERT INTO `materi_pembelajaran` VALUES (2, 2, 1, 'belajar html css', 'asiks', 'materi/Zdp7CUy1mEfo7ndTZlM3BNFQcaqQnp629l6WEWhY.docx', '2022-05-24 17:00:12', '2022-05-24 17:00:12');
INSERT INTO `materi_pembelajaran` VALUES (3, 1, 2, 'mengmasak enaks', 'enakss', 'materi/V5b3k7P0DaQO0Vuqgfi32TEMfjlYV6y7hqyHDnUS.pdf', '2022-05-25 01:46:35', '2022-05-25 01:46:35');
INSERT INTO `materi_pembelajaran` VALUES (4, 2, 1, 'belajar make cmd', 'belajar ajah', 'materi/FQZ6viyEXWLfSXnAz7pGVDaI4VzlEDCuuGPRoNxi.pdf', '2022-05-25 03:18:40', '2022-05-25 03:18:40');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, '2022_05_16_124824_create_kelas_table', 1);
INSERT INTO `migrations` VALUES (3, '2022_05_17_120059_create_siswa_table', 1);
INSERT INTO `migrations` VALUES (4, '2022_05_17_150631_create_guru_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_05_17_151050_craete_operator_sekolah_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_05_18_115718_create_pengguna_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_05_18_134840_create_mata_pelajaran_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_05_18_155412_create_tugas_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_05_19_081806_create_materi_pembelajaran_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_05_24_161615_create_pengumpulan_tugas_table', 1);

-- ----------------------------
-- Table structure for operator_sekolah
-- ----------------------------
DROP TABLE IF EXISTS `operator_sekolah`;
CREATE TABLE `operator_sekolah`  (
  `id_operator` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('l','p') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_operator`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8765435 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of operator_sekolah
-- ----------------------------
INSERT INTO `operator_sekolah` VALUES (8765433, 'Operator manurung', 'operatorm@example.co.id', 'l', '2022-05-24 16:18:15', '2022-05-24 16:18:15');
INSERT INTO `operator_sekolah` VALUES (8765434, 'Operator sitinjak', 'operators@example.co.id', 'p', '2022-05-24 16:18:15', '2022-05-24 16:18:15');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `id_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` enum('g','s','o') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nip` int(10) UNSIGNED NULL DEFAULT NULL,
  `nisn` int(10) UNSIGNED NULL DEFAULT NULL,
  `id_operator` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`) USING BTREE,
  UNIQUE INDEX `pengguna_username_unique`(`username`) USING BTREE,
  INDEX `pengguna_nip_foreign`(`nip`) USING BTREE,
  INDEX `pengguna_nisn_foreign`(`nisn`) USING BTREE,
  INDEX `pengguna_id_operator_foreign`(`id_operator`) USING BTREE,
  CONSTRAINT `pengguna_id_operator_foreign` FOREIGN KEY (`id_operator`) REFERENCES `operator_sekolah` (`id_operator`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengguna_nip_foreign` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengguna_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES (1, 'o', 'operator123', '$2y$10$ltOeaCdNqcARvn..1104pecCZmmyvrGkwjYU6lSLGeV8ruGkCpBry', '2022-05-24 16:18:15', '2022-05-24 16:18:15', NULL, NULL, 8765433);
INSERT INTO `pengguna` VALUES (2, 'o', 'operator12345', '$2y$10$fkmgtRVgrQTUkARw.BO/8.coFk20V2nH8Htb5/aVRhJTQci9z4jri', '2022-05-24 16:18:15', '2022-05-24 16:18:15', NULL, NULL, 8765434);
INSERT INTO `pengguna` VALUES (3, 'g', 'guru123', '$2y$10$AFZ7JDLac.F6uLMaMSSTH.UzYazLJNVRMxJ2FGYYUhGVfdXWiq.1i', '2022-05-24 16:18:15', '2022-05-24 16:18:15', 98765433, NULL, NULL);
INSERT INTO `pengguna` VALUES (4, 'g', 'guru12356', '$2y$10$hALVHpVnYD2Nz4kG0Vw02.sLbJUeQJKWy7PrIMVNdXMmCq2yDRMcy', '2022-05-24 16:18:15', '2022-05-24 16:18:15', 98765434, NULL, NULL);
INSERT INTO `pengguna` VALUES (5, 's', 'siswa123', '$2y$10$m2DtTWdWazQ9503aa.f7Qu7f9CWSkTUCsVYRTssv66F3VVyQqkCKu', '2022-05-24 16:18:15', '2022-05-24 17:34:48', NULL, 1234565, NULL);
INSERT INTO `pengguna` VALUES (6, 's', 'siswa12345', '$2y$10$Nj8FwG99YHejq5v4vpmoJ.w8yot2w295t/pE5sPQ3qmrDei.j2tu.', '2022-05-24 16:18:15', '2022-05-24 17:34:53', NULL, 1234566, NULL);

-- ----------------------------
-- Table structure for pengumpulan_tugas
-- ----------------------------
DROP TABLE IF EXISTS `pengumpulan_tugas`;
CREATE TABLE `pengumpulan_tugas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tugas_id` bigint(20) UNSIGNED NOT NULL,
  `nisn` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diupload_pada` datetime NOT NULL,
  `nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pengumpulan_tugas_tugas_id_foreign`(`tugas_id`) USING BTREE,
  INDEX `pengumpulan_tugas_nisn_foreign`(`nisn`) USING BTREE,
  CONSTRAINT `pengumpulan_tugas_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `siswa` (`nisn`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pengumpulan_tugas_tugas_id_foreign` FOREIGN KEY (`tugas_id`) REFERENCES `tugas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengumpulan_tugas
-- ----------------------------
INSERT INTO `pengumpulan_tugas` VALUES (1, 3, 1234565, 'pengumpulan_tugas/E2LUBxZbaloDf93bp6WWIjirwYyA0DnYfEw1v7Uk.zip', '2022-05-25 02:34:25', '85');

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa`  (
  `nisn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `jenis_kelamin` enum('l','p') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nisn`) USING BTREE,
  INDEX `siswa_kelas_id_foreign`(`kelas_id`) USING BTREE,
  CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1234567 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES (1234565, 'Donny Silaen', 1, 'l', 'Jalan jalan', 'Donny@example.co.id', 'KONGHUCU', '2004-12-31', '2022-05-24 16:18:15', '2022-05-24 17:34:48');
INSERT INTO `siswa` VALUES (1234566, 'Ongki Sijabat', 2, 'p', 'Jalanan', 'ongki@example.co.id', 'HINDU', '2002-12-31', '2022-05-24 16:18:15', '2022-05-24 17:34:53');

-- ----------------------------
-- Table structure for tugas
-- ----------------------------
DROP TABLE IF EXISTS `tugas`;
CREATE TABLE `tugas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `matpel_id` bigint(20) UNSIGNED NOT NULL,
  `berkas_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_tugas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` timestamp NOT NULL,
  `end_at` timestamp NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tugas_matpel_id_foreign`(`matpel_id`) USING BTREE,
  CONSTRAINT `tugas_matpel_id_foreign` FOREIGN KEY (`matpel_id`) REFERENCES `mata_pelajaran` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tugas
-- ----------------------------
INSERT INTO `tugas` VALUES (2, 1, 'tugas/xEx2qEosHaYucjStWzZmQIGdkt0fWSE9fxow4cDH.doc', 'mengmasak', '2022-05-25 12:00:00', '2022-05-26 15:00:00');
INSERT INTO `tugas` VALUES (3, 2, 'tugas/hSIvYH1r30DdQsqaClMiWtXJiekdojY1N3KcP9Zs.doc', 'mengowdink', '2022-05-25 18:00:00', '2022-05-26 12:00:00');

SET FOREIGN_KEY_CHECKS = 1;
