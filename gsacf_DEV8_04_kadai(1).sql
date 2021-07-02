-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 02 日 07:07
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_DEV8_04_kadai`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `user_touroku`
--

CREATE TABLE `user_touroku` (
  `id` int(12) NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiiki` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kijutu` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `user_touroku`
--

INSERT INTO `user_touroku` (`id`, `username`, `mail`, `chiiki`, `age`, `kijutu`) VALUES
(7, 'こあら', 'mail', '女性', '100', 'あさごはん'),
(8, 'かめ', 'ggg', '男性', '36', 'みどり'),
(9, 'かえる', 'sxz', '女性', '３４', 'あさごはん'),
(11, 'とかげ', 'keienne0513@icloud.com', '北海道', '９０', 'しっぽ'),
(12, 'かわせ', 'aaa', '神奈川県', '1', 'しっぽ');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `user_touroku`
--
ALTER TABLE `user_touroku`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `user_touroku`
--
ALTER TABLE `user_touroku`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
