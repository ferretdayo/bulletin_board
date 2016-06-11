-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 6 朁E12 日 01:53
-- サーバのバージョン： 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bbs`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bbs`
--

CREATE TABLE IF NOT EXISTS `bbs` (
`id` int(50) unsigned NOT NULL,
  `userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `bbs_comment`
--

CREATE TABLE IF NOT EXISTS `bbs_comment` (
`id` int(50) unsigned NOT NULL,
  `bbs_id` int(50) unsigned NOT NULL,
  `userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `userid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `birth` date DEFAULT NULL,
  `userpass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bbs`
--
ALTER TABLE `bbs`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`);

--
-- Indexes for table `bbs_comment`
--
ALTER TABLE `bbs_comment`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`), ADD KEY `bbs_id` (`bbs_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bbs`
--
ALTER TABLE `bbs`
MODIFY `id` int(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `bbs_comment`
--
ALTER TABLE `bbs_comment`
MODIFY `id` int(50) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `bbs`
--
ALTER TABLE `bbs`
ADD CONSTRAINT `bbs_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `bbs_comment`
--
ALTER TABLE `bbs_comment`
ADD CONSTRAINT `bbs_comment_ibfk_1` FOREIGN KEY (`bbs_id`) REFERENCES `bbs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `bbs_comment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `registration` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
