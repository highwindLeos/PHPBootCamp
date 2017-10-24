-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 17-10-24 04:23
-- 서버 버전: 5.7.19
-- PHP 버전: 7.0.23

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
  `footerlink` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `allview` varchar(30) DEFAULT NULL,
  `count` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `article`
--

INSERT INTO `article` (`id`, `icon`, `article`, `footerlink`, `date`, `allview`, `count`) VALUES
(1, 'img/icon/iconarticle01.png', NULL, NULL, NULL, NULL, NULL),
(2, 'img/icon/iconarticle02.png', NULL, NULL, '2017-10-24 11:09:29', NULL, NULL),
(3, 'img/icon/iconarticle03.png', NULL, NULL, '2017-10-24 11:09:29', NULL, NULL),
(4, 'img/icon/iconarticle04.png', NULL, NULL, '2017-10-24 11:10:18', NULL, NULL),
(5, NULL, '좋아요', NULL, '2017-10-24 11:10:18', NULL, NULL),
(6, NULL, '문구 더보기', NULL, '2017-10-24 11:11:31', NULL, NULL),
(7, NULL, '댓글', NULL, '2017-10-24 11:11:31', NULL, NULL),
(8, NULL, 'Lorem, ipsum dolor sit amet consectetur adipisicing.', NULL, '2017-10-24 11:12:26', NULL, NULL),
(9, NULL, NULL, 'INSTAGRAM 정보', '2017-10-24 11:12:26', NULL, NULL),
(10, NULL, NULL, '지원', '2017-10-24 11:14:44', NULL, NULL),
(11, NULL, NULL, '블로그', '2017-10-24 11:15:13', NULL, NULL),
(12, NULL, NULL, '홍보 센터', '2017-10-24 11:14:44', NULL, NULL),
(13, NULL, NULL, 'API', '2017-10-24 11:14:44', NULL, NULL),
(14, NULL, NULL, '채용', '2017-10-24 11:14:44', NULL, NULL),
(15, NULL, NULL, '개인정보처리방침', '2017-10-24 11:14:44', NULL, NULL),
(16, NULL, NULL, '약관', '2017-10-24 11:14:44', NULL, NULL),
(17, NULL, NULL, '디렉토리', '2017-10-24 11:14:44', NULL, NULL),
(18, NULL, NULL, '언어', '2017-10-24 11:14:44', NULL, NULL),
(19, NULL, NULL, NULL, '2017-10-24 11:16:49', '<a href=\"#\"> 모두 보기</a>', NULL),
(20, NULL, NULL, NULL, '2017-10-24 11:20:09', NULL, 50);

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
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `article`
--
ALTER TABLE `article`
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
-- 테이블의 AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 테이블의 AUTO_INCREMENT `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
