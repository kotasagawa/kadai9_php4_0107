-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 12 日 17:52
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadai2`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_gs_table`
--

CREATE TABLE `gs_gs_table` (
  `id` int(12) NOT NULL COMMENT 'id',
  `content1` varchar(256) NOT NULL,
  `content2` varchar(256) NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- テーブルのデータのダンプ `gs_gs_table`
--

INSERT INTO `gs_gs_table` (`id`, `content1`, `content2`, `indate`) VALUES
(10, 'fantastic', 'すばらしい', '2023-01-02 20:27:10'),
(11, 'experience', '経験', '2023-01-02 20:25:18'),
(13, 'apple', 'アップル', '2023-01-05 22:38:56'),
(16, 'trend', 'トレンド', '2023-01-13 01:17:18');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0),
(4, 'test@gmail.com', '1', '$2y$10$RdPeSxIgRcOyXMYWAI7ui.Vzs1dtdxx/ShKCc3Y9guT5JWW06AswW', 0, 0),
(5, 'test2@gmail.com', '22', '$2y$10$s.KH0D9PUP6PEyH.8UvJMeW7uYPnr8Xh/HnU/w7kI33SY6ZEji7ce', 0, 0),
(6, 'world', 'test3@gmail.com', '$2y$10$WQFX2HBJdPPsN1/7tHPQtOrF9y8v.eq7ic2hUXqO30VA2cQqMDXN.', 0, 0),
(7, 'mymy', '1@gmail.com', '111', 0, 0),
(8, 'me', '111@gmail.com', '111', 0, 0),
(9, 'hello', 'testst@gmail.com', 'ppp', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_gs_table`
--
ALTER TABLE `gs_gs_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_gs_table`
--
ALTER TABLE `gs_gs_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
