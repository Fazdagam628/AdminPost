-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table adminpost.cache: ~5 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('admin_post_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:4;', 1752720715),
	('admin_post_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1752720715;', 1752720715),
	('admin_post_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1752811864),
	('admin_post_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1752811864;', 1752811864),
	('admin_post_cache_spatie.permission.cache', 'a:3:{s:5:"alias";a:4:{s:1:"a";s:2:"id";s:1:"b";s:4:"name";s:1:"c";s:10:"guard_name";s:1:"r";s:5:"roles";}s:11:"permissions";a:42:{i:0;a:4:{s:1:"a";i:1;s:1:"b";s:11:"view_cerpen";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:1;a:4:{s:1:"a";i:2;s:1:"b";s:15:"view_any_cerpen";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:2;a:4:{s:1:"a";i:3;s:1:"b";s:13:"create_cerpen";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:3;a:4:{s:1:"a";i:4;s:1:"b";s:13:"update_cerpen";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:4;a:4:{s:1:"a";i:5;s:1:"b";s:14:"restore_cerpen";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:5;a:4:{s:1:"a";i:6;s:1:"b";s:18:"restore_any_cerpen";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:6;a:4:{s:1:"a";i:7;s:1:"b";s:16:"replicate_cerpen";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:7;a:4:{s:1:"a";i:8;s:1:"b";s:14:"reorder_cerpen";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:8;a:4:{s:1:"a";i:9;s:1:"b";s:13:"delete_cerpen";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:2;}}i:9;a:4:{s:1:"a";i:10;s:1:"b";s:17:"delete_any_cerpen";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:10;a:4:{s:1:"a";i:11;s:1:"b";s:19:"force_delete_cerpen";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:11;a:4:{s:1:"a";i:12;s:1:"b";s:23:"force_delete_any_cerpen";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:12;a:4:{s:1:"a";i:13;s:1:"b";s:9:"view_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:13;a:4:{s:1:"a";i:14;s:1:"b";s:13:"view_any_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:14;a:4:{s:1:"a";i:15;s:1:"b";s:11:"create_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:15;a:4:{s:1:"a";i:16;s:1:"b";s:11:"update_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:16;a:4:{s:1:"a";i:17;s:1:"b";s:12:"restore_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:17;a:4:{s:1:"a";i:18;s:1:"b";s:16:"restore_any_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:18;a:4:{s:1:"a";i:19;s:1:"b";s:14:"replicate_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:19;a:4:{s:1:"a";i:20;s:1:"b";s:12:"reorder_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:20;a:4:{s:1:"a";i:21;s:1:"b";s:11:"delete_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:21;a:4:{s:1:"a";i:22;s:1:"b";s:15:"delete_any_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:22;a:4:{s:1:"a";i:23;s:1:"b";s:17:"force_delete_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:23;a:4:{s:1:"a";i:24;s:1:"b";s:21:"force_delete_any_game";s:1:"c";s:3:"web";s:1:"r";a:2:{i:0;i:1;i:1;i:3;}}i:24;a:4:{s:1:"a";i:25;s:1:"b";s:9:"view_role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:25;a:4:{s:1:"a";i:26;s:1:"b";s:13:"view_any_role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:26;a:4:{s:1:"a";i:27;s:1:"b";s:11:"create_role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:27;a:4:{s:1:"a";i:28;s:1:"b";s:11:"update_role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:28;a:4:{s:1:"a";i:29;s:1:"b";s:11:"delete_role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:29;a:4:{s:1:"a";i:30;s:1:"b";s:15:"delete_any_role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:30;a:4:{s:1:"a";i:31;s:1:"b";s:9:"view_user";s:1:"c";s:3:"web";s:1:"r";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:31;a:4:{s:1:"a";i:32;s:1:"b";s:13:"view_any_user";s:1:"c";s:3:"web";s:1:"r";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:32;a:4:{s:1:"a";i:33;s:1:"b";s:11:"create_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:33;a:4:{s:1:"a";i:34;s:1:"b";s:11:"update_user";s:1:"c";s:3:"web";s:1:"r";a:3:{i:0;i:1;i:1;i:2;i:2;i:3;}}i:34;a:4:{s:1:"a";i:35;s:1:"b";s:12:"restore_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:35;a:4:{s:1:"a";i:36;s:1:"b";s:16:"restore_any_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:36;a:4:{s:1:"a";i:37;s:1:"b";s:14:"replicate_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:37;a:4:{s:1:"a";i:38;s:1:"b";s:12:"reorder_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:38;a:4:{s:1:"a";i:39;s:1:"b";s:11:"delete_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:39;a:4:{s:1:"a";i:40;s:1:"b";s:15:"delete_any_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:40;a:4:{s:1:"a";i:41;s:1:"b";s:17:"force_delete_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:41;a:4:{s:1:"a";i:42;s:1:"b";s:21:"force_delete_any_user";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}}s:5:"roles";a:3:{i:0;a:3:{s:1:"a";i:1;s:1:"b";s:11:"super_admin";s:1:"c";s:3:"web";}i:1;a:3:{s:1:"a";i:2;s:1:"b";s:4:"user";s:1:"c";s:3:"web";}i:2;a:3:{s:1:"a";i:3;s:1:"b";s:4:"game";s:1:"c";s:3:"web";}}}', 1752898208);

-- Dumping data for table adminpost.cache_locks: ~0 rows (approximately)

-- Dumping data for table adminpost.cerpens: ~4 rows (approximately)
INSERT INTO `cerpens` (`id`, `user_id`, `judul`, `keterangan`, `created_at`, `updated_at`, `deleted_at`, `views`) VALUES
	(3, 3, 'fdgdfgrtetrert', 'sdfgedtertertert4567', '2025-05-28 06:27:36', '2025-07-15 03:15:43', NULL, 3),
	(4, 2, 'Lorem', 'Ipsumda sadadad', '2025-06-19 04:46:25', '2025-06-19 04:46:25', NULL, 0),
	(5, 2, 'loriasfoihaohow', '425245646468', '2025-06-19 11:25:56', '2025-06-19 11:25:56', NULL, 0),
	(6, 3, 'waerafs', 'asdawf', '2025-06-19 11:32:13', '2025-07-14 02:49:16', NULL, 1);

-- Dumping data for table adminpost.failed_jobs: ~0 rows (approximately)

-- Dumping data for table adminpost.games: ~3 rows (approximately)
INSERT INTO `games` (`id`, `name`, `keterangan`, `image`, `kategori`, `created_at`, `updated_at`, `deleted_at`, `views`, `img_ss`, `link_download`, `link_youtube`, `creator`) VALUES
	(1, 'Fauzan Mas\'ud', 'Laboris ad aute fugiat ea eu esse consequat dolore occaecat id dolor do commodo ullamco. Mollit nulla aliqua deserunt enim irure laborum consequat. Id dolor sint dolor ut excepteur ut aliqua consectetur proident mollit. Ipsum voluptate eu veniam consectetur proident sit ut minim sunt laborum enim eu nostrud. Reprehenderit ullamco commodo officia incididunt exercitation tempor.', 'games/covers/01JZQNJ3DXGXT90J11HEGXPJBC.jpg', '[{"kategori": "RPG"}, {"kategori": "FPS"}, {"kategori": "3D"}]', '2025-05-27 20:07:03', '2025-07-16 11:44:35', NULL, 2, '["games\\/preview\\/01JZQNWRKANKDJ8139JEWF952T.jpg","games\\/preview\\/01JZQNWRKN57YV5D6T17KYAKZN.jpg","games\\/preview\\/01JZQNWRM03KXNMEN84N0SKKED.jpg"]', 'https://drive.google.com/file/d/1jRmzQj2CCr_rH-Eri6J2yrJ7PiNgR0AP/view?usp=sharing', 'https://www.youtube.com/watch?v=6ItqiEnTBAU&list=RD6nJnJ0hTgis&index=8', 'Raffi'),
	(2, 'game 1', 'gsadjioajdoawdaodioj', '01JY314FJP0AF2F2TZK6EJYS8E.png', '[{"kategori": "RPG"}, {"kategori": "SANDBOX"}, {"kategori": "3D"}]', '2025-06-19 02:43:52', '2025-07-17 03:02:34', NULL, 2, '["games\\/preview\\/01K08M80QGN6QRK84G9SB58CSC.jpg","games\\/preview\\/01K08M80QPSY2Q0EY2H3P6E8YF.jpg","games\\/preview\\/01K08M80QW1V05N7MG9KEETW4T.jpg"]', 'https://www.youtube.com/watch?v=6-1NaOtLsF8', 'https://www.youtube.com/watch?v=6-1NaOtLsF8', 'Bima'),
	(3, 'Zenless Zone Zero', 'Zenless Zone Zero adalah permainan bermain peran aksi fantasi perkotaan yang dikembangkan dan diterbitkan oleh miHoYo di Tiongkok dan diterbitkan secara global oleh Cognosphere. Permainan ini dirilis di Microsoft Windows, iOS, Android dan PlayStation 5 pada tanggal 4 Juli 2024.', 'games/covers/01JZQPMBN70PHSJ2T4JQKEZZ74.png', '[{"kategori": "RPG"}, {"kategori": "ADVENTURE"}]', '2025-07-09 13:40:03', '2025-07-17 03:03:09', NULL, 5, '["games\\/preview\\/01JZQPMC5JK0Q2KJX75PQ6P4FY.png","games\\/preview\\/01JZQPMCBCYHHWZQNB9F8AHDP5.png","games\\/preview\\/01JZQPMCCASD64N9FCGWNQDA6T.png"]', 'https://drive.google.com/file/d/1-F1Dt3KqSajttIEKKC7Bl3Pd8quCSLKe/view?usp=sharing', 'https://www.youtube.com/watch?v=MCVkMmYL-aY&t=8432s', 'Aruna'),
	(4, 'Genshin', 'Game Petualangan', 'games/covers/01K09GNAD1F3BTVAZZA9MF5BDZ.png', '[{"kategori": "MMORPG"}, {"kategori": "ADVENTURE"}]', '2025-07-16 08:19:13', '2025-07-17 03:03:32', NULL, 0, '["games\\/preview\\/01K09GNADF3DK4T6QQEDFZBYFN.png","games\\/preview\\/01K09GNADT54N9VZFX5SVK19AM.png","games\\/preview\\/01K09GNAE7GSYSX01WSR1KAHV1.png"]', 'https://www.youtube.com/watch?v=RhdPeEVS1lk', 'https://www.youtube.com/watch?v=RhdPeEVS1lk', 'Hoyoverse'),
	(5, 'Game', 'Ldnoafom', 'games/covers/01K0B4S4S4MXW4DFWMHW21R7MT.png', '[{"kategori": "FPS"}, {"kategori": "3D"}, {"kategori": "2D"}, {"kategori": "SANDBOX"}]', '2025-07-17 02:52:53', '2025-07-17 03:01:48', NULL, 0, '["games\\/preview\\/01K0B4S4SD63RW410R4WCQFC39.png","games\\/preview\\/01K0B4S4SVVGYA3YFM14DSRC02.png","games\\/preview\\/01K0B4S4T9FS83VT7QBR9NABRZ.png"]', 'https://drive.google.com/drive/folders/1YOyIm4Ns8z8s89J74AgE5bptLi4dF4hf?usp=sharing', 'https://www.youtube.com/watch?v=HcSxWPHV9xw&list=RDMMlcKHfqerPYY&index=28', 'Jamal');

-- Dumping data for table adminpost.jobs: ~0 rows (approximately)

-- Dumping data for table adminpost.job_batches: ~0 rows (approximately)

-- Dumping data for table adminpost.migrations: ~8 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2025_05_27_114037_create_cerpens_table', 1),
	(5, '2025_05_27_114102_create_games_table', 1),
	(6, '2025_05_27_123851_add_soft_deleted_to_user_table', 1),
	(7, '2025_05_28_185708_add_views_to_cerpens_table', 2),
	(8, '2025_05_28_193908_add_views_to_games_table', 3),
	(10, '2025_05_28_205057_create_permission_tables', 4),
	(11, '2025_07_09_195322_add_image_ss_link_download_link_youtube_to_games', 5),
	(12, '2025_07_16_101840_add_creator_to_game_table', 6),
	(13, '2025_07_16_145416_change_kategori_column_on_games_table', 7);

-- Dumping data for table adminpost.model_has_permissions: ~0 rows (approximately)

-- Dumping data for table adminpost.model_has_roles: ~2 rows (approximately)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 3),
	(3, 'App\\Models\\User', 5);

-- Dumping data for table adminpost.password_reset_tokens: ~0 rows (approximately)

-- Dumping data for table adminpost.permissions: ~42 rows (approximately)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'view_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(2, 'view_any_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(3, 'create_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(4, 'update_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(5, 'restore_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(6, 'restore_any_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(7, 'replicate_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(8, 'reorder_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(9, 'delete_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(10, 'delete_any_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(11, 'force_delete_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(12, 'force_delete_any_cerpen', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(13, 'view_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(14, 'view_any_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(15, 'create_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(16, 'update_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(17, 'restore_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(18, 'restore_any_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(19, 'replicate_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(20, 'reorder_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(21, 'delete_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(22, 'delete_any_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(23, 'force_delete_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(24, 'force_delete_any_game', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(25, 'view_role', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(26, 'view_any_role', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(27, 'create_role', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(28, 'update_role', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(29, 'delete_role', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(30, 'delete_any_role', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(31, 'view_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(32, 'view_any_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(33, 'create_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(34, 'update_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(35, 'restore_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(36, 'restore_any_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(37, 'replicate_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(38, 'reorder_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(39, 'delete_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(40, 'delete_any_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(41, 'force_delete_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(42, 'force_delete_any_user', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54');

-- Dumping data for table adminpost.roles: ~2 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2025-05-28 14:31:54', '2025-05-28 14:31:54'),
	(2, 'user', 'web', '2025-05-28 15:08:57', '2025-05-28 15:08:57'),
	(3, 'game', 'web', '2025-06-19 02:22:49', '2025-06-19 02:22:49');

-- Dumping data for table adminpost.role_has_permissions: ~66 rows (approximately)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(1, 2),
	(2, 2),
	(3, 2),
	(4, 2),
	(5, 2),
	(9, 2),
	(31, 2),
	(32, 2),
	(34, 2),
	(13, 3),
	(14, 3),
	(15, 3),
	(16, 3),
	(17, 3),
	(18, 3),
	(19, 3),
	(20, 3),
	(21, 3),
	(22, 3),
	(23, 3),
	(24, 3),
	(31, 3),
	(32, 3),
	(34, 3);

-- Dumping data for table adminpost.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('oqheoL8SlhZvkX9ZJpZhwXeuECYtuaCr3Lyh4pCd', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiREdiclAwZks2aGlvR2lTbHlZbldnempXbExRT1dlNEU5cjV0ZVc0ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkaWZQU28yb0ZWODVMTEhNRXFNdG83T0dUNnFCSy5qTkdBQlJGVnk4M041ZUhwbWhseTA4QXUiO30=', 1752811881);

-- Dumping data for table adminpost.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$ifPSo2oFV85LLHMEqMto7OGT6qBK.jNGABRFVy83N5eHpmhly08Au', NULL, '2025-05-27 20:05:52', '2025-05-27 20:05:52', NULL),
	(2, 'Fauzan', 'fauzanmasud628@gmail.com', NULL, '$2y$12$VX6RmH68sQf08AORR75O4.rv.bxesXmljKkTYj4OoUR38Y2tJTbee', NULL, '2025-05-28 03:34:40', '2025-05-28 15:30:58', NULL),
	(3, 'tes', 'tes@gmail.com', NULL, '$2y$12$a1Qr14Gj4mtC0HtxWX24T.B5wUjFEQlrFL5SX/59QxfmoeR0xQDCW', NULL, '2025-05-28 06:26:44', '2025-05-28 15:30:46', NULL),
	(5, 'tes1', 'tes1@gmail.com', NULL, '$2y$12$k9VIdvfUVCbc3FnKfJe7dOkCtz.jS66WHzoMP3T617QT0FkN0DYUG', NULL, '2025-06-19 02:41:41', '2025-06-19 02:41:41', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
