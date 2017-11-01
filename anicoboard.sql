-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 17-11-01 02:09
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
  `id` int(20) NOT NULL,
  `userIcon` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `goodIcon` varchar(50) NOT NULL,
  `commentIcon` varchar(50) NOT NULL,
  `viewCount` int(100) NOT NULL,
  `userId` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `more` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `commentSubmit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `article`
--

INSERT INTO `article` (`id`, `userIcon`, `image`, `goodIcon`, `commentIcon`, `viewCount`, `userId`, `comment`, `more`, `date`, `commentSubmit`) VALUES
(1, 'img/icon/iconarticle01.png', 'img/image/img0.png', 'img/icon/iconarticle02.png', 'img/icon/iconarticle03.png', 30, 'Leos', 'Lorem, ipsum dolor sit amet consectetur adipisicing.', '문구 더보기', '2017-11-01 08:33:49', 'img/icon/iconarticle04.png'),
(2, 'img/icon/iconarticle01.png', 'img/image/img1.png', 'img/icon/iconarticle02.png', 'img/icon/iconarticle03.png', 60, 'Days', 'Lorem, ipsum dolor sit amet ', '문구 더보기', '2017-11-01 08:37:37', 'img/icon/iconarticle04.png'),
(3, 'img/icon/iconarticle01.png', 'img/image/img2.png', 'img/icon/iconarticle02.png', 'img/icon/iconarticle03.png', 90, 'Landing', 'Lorem, ipsum dolor sit amet consectetur adipisicing.ipsum dolor sit amet consectetur adipisicing.', '문구 더보기', '2017-11-01 08:38:03', 'img/icon/iconarticle04.png'),
(4, 'img/icon/iconarticle01.png', 'img/image/img3.png', 'img/icon/iconarticle02.png', 'img/icon/iconarticle03.png', 150, 'Logis', 'Lorem, ipsum dolor sit amet consectetur adipisicing.Lorem, ipsum dolor sit amet consectetur adipisicing.Lorem, ipsum dolor sit amet consectetur adipisicing.', '문구 더보기', '2017-11-01 08:38:24', 'img/icon/iconarticle04.png'),
(5, 'img/icon/iconarticle01.png', 'img/image/img4.png', 'img/icon/iconarticle02.png', 'img/icon/iconarticle03.png', 180, 'PHPcamp', 'Lorem, ipsum dolor ', '문구 더보기', '2017-11-01 08:38:51', 'img/icon/iconarticle04.png');

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
(1, 'highwind26@nate.com', '이승훈', 'highwind', '$2y$11$C4fLbKwxzdXo7xdaiL/ekuw5T3yS1/Jh9yKFe1r83945e6vnbPUXu');

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
-- 테이블의 AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 테이블의 AUTO_INCREMENT `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
