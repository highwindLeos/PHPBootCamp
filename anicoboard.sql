-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 17-10-27 01:00
-- 서버 버전: 5.7.19
-- PHP 버전: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `anicoboard`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `icon` varchar(150) DEFAULT NULL,
  `article` text,
  `allview` varchar(30) DEFAULT NULL,
  `count` int(200) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `article`
--

INSERT INTO `article` (`id`, `icon`, `article`, `allview`, `count`, `date`) VALUES
(1, 'img/icon/iconarticle01.png', NULL, NULL, NULL, '2017-10-25 03:55:59'),
(2, 'img/icon/iconarticle02.png', NULL, NULL, NULL, '2017-10-25 03:55:59'),
(3, 'img/icon/iconarticle03.png', NULL, NULL, NULL, '2017-10-25 03:55:59'),
(4, 'img/icon/iconarticle04.png', NULL, NULL, NULL, '2017-10-25 03:55:59'),
(5, NULL, '좋아요', NULL, NULL, '2017-10-25 03:55:59'),
(6, NULL, '문구 더보기', NULL, NULL, '2017-10-25 03:55:59'),
(7, NULL, '댓글', NULL, NULL, '2017-10-25 03:55:59'),
(8, NULL, 'Lorem, ipsum dolor sit amet consectetur adipisicing.', NULL, NULL, '2017-10-25 03:55:59'),
(9, NULL, NULL, ' 모두보기', NULL, '2017-10-25 04:59:44'),
(10, NULL, NULL, NULL, 50, '2017-10-25 04:59:44'),
(11, NULL, NULL, NULL, 25, '2017-10-25 04:59:44');

-- --------------------------------------------------------

--
-- 테이블 구조 `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `register`
--

INSERT INTO `register` (`id`, `email`, `name`, `author`, `password`) VALUES
(27, 'high', '리승훈', 'highwindleo', '$2y$11$RYwlEqhHKDD3eIVJIYf/KuBcF1I0Q4cBc9Xuzv2XLyNtyKXMBkv6G'),
(28, 'high', '리승훈', 'highwindleos', '$2y$11$D/oGBeY6982G0qL3FN9See1cX1zCL/bfe54dNW8WsRzz3.BLzYplK'),
(29, 'highwind26@gmail.com', '리승훈', 'highwindleos', '$2y$11$JFubBNWQnjjavY6yY4TVxuYI2/hjsQYiBVWJLsI1Eu6cGPw/0yple'),
(30, '0', '리승훈', 'highwindleos', '$2y$11$deT.MJ59kfP/VL.Mv//LM.cDaknFTa06ENyhg.DOh8rJ1359755Ym');

-- --------------------------------------------------------

--
-- 테이블 구조 `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `topic`
--

INSERT INTO `topic` (`id`, `title`, `description`, `created`) VALUES
(1, 'html', 'html is...', '2017-10-23 12:08:55'),
(2, 'cascading style sheet', 'css is...', '2017-10-23 12:13:00'),
(4, 'hellow world', '안녕하세요 hi\r\n', '2017-10-23 12:40:45'),
(5, 'pdo', 'pdo is...', '2017-10-24 16:34:55');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 테이블의 AUTO_INCREMENT `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
