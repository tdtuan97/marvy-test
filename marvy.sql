-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.2-dmr - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- --------------------------------------------------------

-- Dumping database structure for marvy
DROP DATABASE IF EXISTS `marvy`;
CREATE DATABASE IF NOT EXISTS `marvy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `marvy`;

-- Dumping structure for table marvy.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Dumping structure for table marvy.tbl_game
CREATE TABLE IF NOT EXISTS `tbl_game` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping structure for table marvy.tbl_user_game
CREATE TABLE IF NOT EXISTS `tbl_user_game` (
    `id` bigint(20) NOT NULL AUTO_INCREMENT,
    `user_id` bigint(20) NOT NULL,
    `game_id` bigint(20) NOT NULL,
    `point` bigint(20) NOT NULL,
    `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `created_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `updated_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
    PRIMARY KEY (`id`),
    UNIQUE KEY `unique_user_id_game_id` (`user_id`,`game_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping Common Game
INSERT INTO tbl_game (id, name) VALUES
    (1, 'Game 1'),
    (2, 'Game 2'),
    (3, 'Game 3'),
    (4, 'Game 4'),
    (5, 'Game 5'),
    (6, 'Game 6'),
    (7, 'Game 7'),
    (8, 'Game 8'),
    (9, 'Game 9'),
    (10, 'Game 10')
;

-- Dumping Common User
INSERT INTO tbl_user (id, full_name, phone_number) VALUES
    (1, 'Test User', '0123456789')
;

-- Dumping Common Point
INSERT INTO tbl_user_game (id, user_id, game_id) VALUES
    (1, 1, 1)
;