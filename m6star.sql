-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 02:14 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m6star`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `answer` varchar(2000) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `picture` varchar(10) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `game_id`, `no`, `answer`, `point`, `picture`, `create_date`, `member_id`, `update_date`) VALUES
(60, 36, NULL, 1, 'tset', 1, '19_11.jpg', '2017-08-06 12:16:17', 1, NULL),
(61, 37, NULL, 1, 'dd', 1, '19_2.jpg', '2017-08-06 12:22:07', 1, NULL),
(62, 38, NULL, 1, 'as', 1, '19_31.jpg', '2017-08-06 12:23:07', 1, NULL),
(71, 41, 21, 1, 'ณเดช คูกิมิยะ', 0, '', '2017-08-10 01:37:51', 1, NULL),
(72, 41, 21, 2, 'เจมส์ จิรายุ', 1, '', '2017-08-10 01:37:51', 1, NULL),
(73, 41, 21, 3, 'มาริโอ้ เมาเร่อ', 0, '', '2017-08-10 01:37:51', 1, NULL),
(74, 41, 21, 4, 'เจมส์ มาร์', 0, '', '2017-08-10 01:37:51', 1, NULL),
(75, 42, 21, 1, 'เจมส์ มาร์', 0, '', '2017-08-10 01:38:56', 1, NULL),
(76, 42, 21, 2, 'เจมส์ จิรายุ', 0, '', '2017-08-10 01:38:56', 1, NULL),
(77, 42, 21, 3, 'ณเดช คูกิมิยะ', 0, '', '2017-08-10 01:38:56', 1, NULL),
(78, 42, 21, 4, 'ติ๊ก เจษฎาพร', 1, '', '2017-08-10 01:38:56', 1, NULL),
(79, 43, 21, 1, 'ซ่าร่า คอร์เนอร์', 0, '', '2017-08-10 01:42:35', 1, NULL),
(80, 43, 21, 2, 'มิว นิษฐา', 0, '', '2017-08-10 01:42:35', 1, NULL),
(81, 43, 21, 3, 'คิมเบอร์ลี่', 0, '', '2017-08-10 01:42:35', 1, NULL),
(82, 43, 21, 4, 'ใหม่ ดาวิกา', 1, '', '2017-08-10 01:42:35', 1, NULL),
(83, 44, 21, 1, 'เชียร์ ฑิฆัมพร ', 1, '', '2017-08-10 01:44:28', 1, NULL),
(84, 44, 21, 2, 'มิว นิษฐา', 0, '', '2017-08-10 01:44:28', 1, NULL),
(85, 44, 21, 3, 'มาร์กี้', 0, '', '2017-08-10 01:44:28', 1, NULL),
(86, 44, 21, 4, 'มิ้น ชาลิดา', 0, '', '2017-08-10 01:44:28', 1, NULL),
(142, 40, 21, 1, 'ณเดช คูกิมิยะ', 0, '', '2017-08-14 16:46:11', 1, NULL),
(143, 40, 21, 2, 'เจมส์ จิรายุ', 0, '', '2017-08-14 16:46:11', 1, NULL),
(144, 40, 21, 3, 'มาริโอ้ เมาเร่อ', 1, '', '2017-08-14 16:46:11', 1, NULL),
(145, 40, 21, 4, 'เจมส์ มาร์', 0, '', '2017-08-14 16:46:11', 1, NULL),
(149, 39, 21, 1, 'มาริโอ้ เมาเร่อ', 0, '', '2017-08-14 16:48:19', 1, NULL),
(150, 39, 21, 2, 'แอนดริว เกร็กสัน', 0, '', '2017-08-14 16:48:19', 1, NULL),
(151, 39, 21, 3, 'บริบูรณ์', 1, '', '2017-08-14 16:48:19', 1, NULL),
(152, 39, 21, 4, 'วิลลี่ แม็คอินทอช', 0, '', '2017-08-14 16:48:19', 1, NULL),
(155, 45, 22, 1, 'คนนิสัยเสีย - อ้อน ลัคนา', 1, '', '2017-08-17 12:12:48', 1, NULL),
(156, 45, 22, 2, 'เก็บเอาไว้ - เอิญ จิรวรรณ', 0, '', '2017-08-17 12:12:48', 1, NULL),
(157, 45, 22, 3, 'จนกว่าวันนั้น -  ลิเดีย', 0, '', '2017-08-17 12:12:48', 1, NULL),
(158, 45, 22, 4, 'ฉันจะจำเธอแบบนี้ - โบ สุนิตา', 0, '', '2017-08-17 12:12:49', 1, NULL),
(165, 46, 22, 1, 'น้อยใจ - ลิฟ-ออย', 0, '', '2017-08-17 16:20:01', 1, NULL),
(166, 46, 22, 2, 'คำเดียว - แร็พเตอร์', 1, '', '2017-08-17 16:20:01', 1, NULL),
(167, 46, 22, 3, 'สมมุติ - โดม ปกรณ์ ลัม', 0, '', '2017-08-17 16:20:01', 1, NULL),
(168, 46, 22, 4, 'ทุกวินาที - เจมส์ เรืองศักดิ์', 0, '', '2017-08-17 16:20:01', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'quiz'),
(2, 'photo_hunt'),
(3, 'news'),
(4, 'video'),
(5, 'photo');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `title` varchar(4000) COLLATE utf8_croatian_ci NOT NULL,
  `detail` varchar(4000) COLLATE utf8_croatian_ci NOT NULL,
  `picture` varchar(100) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `viewcount` int(11) DEFAULT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `timelimit_type` varchar(10) COLLATE utf8_croatian_ci DEFAULT NULL,
  `choice_layout` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `member_id`, `title`, `detail`, `picture`, `status`, `update_date`, `create_date`, `viewcount`, `time_limit`, `timelimit_type`, `choice_layout`) VALUES
(17, 1, 'test', '', 'img_59746228c1560.jpg', 'active', '0000-00-00 00:00:00', '2017-07-23 15:45:28', NULL, NULL, NULL, NULL),
(18, 1, 'sdf', '', 'img_5975b3dd0f301.jpg', 'active', '2017-07-24 15:46:21', '2017-07-24 15:42:29', NULL, NULL, NULL, NULL),
(19, 1, 'ทดสอบ', 'testasdfasdfcvaxcasdsdfsdf', 'img_59872ea2eddbd.jpg', 'unpublic', '2017-08-13 22:20:11', '2017-07-24 17:30:49', NULL, 10, 'questlimit', NULL),
(20, 2, 'test', '', 'img_5976e3a0a5ac2.jpg', 'create', '2017-07-25 13:22:24', '2017-07-25 13:14:58', NULL, NULL, NULL, NULL),
(21, 1, 'รูปดาราตอนเด็ก ๆ ดูออกหรือเปล่าว่าใครเป็นใคร', 'ลองดูกันซิว่า คุณแยกได้หรือเปล่าว่า ใครเป็นใคร', 'img_598b5435781db.jpg', 'public', '2017-08-17 17:51:41', '2017-08-10 01:28:05', NULL, 10, 'questlimit', NULL),
(22, 1, 'ท่อนฮุค เพลงดังในอดีต คนยุค 90 คือเพลงอะไร', 'มาลองดูซิว่า เพลงต่าง ๆ เหล่านี้จะสกิดความทรงจำของคุณได้มากแค่ไหน', 'img_599523538058c.jpg', 'public', '2017-08-17 17:54:14', '2017-08-17 11:45:10', NULL, 20, 'questlimit', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_croatian_ci NOT NULL,
  `fbid` varchar(40) COLLATE utf8_croatian_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `fbid`, `status`, `update_date`, `create_date`) VALUES
(1, 'Premkamon Kumboonruang', 'premkamon746@gmail.com', '10206280170514147', 'active', '0000-00-00 00:00:00', '2017-07-22 14:46:50'),
(2, 'Withther Aryof', 'noonoonnaja@gmail.com', '1449543645126278', 'active', '0000-00-00 00:00:00', '2017-07-25 13:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `play_result`
--

CREATE TABLE `play_result` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `question` varchar(4000) COLLATE utf8_croatian_ci NOT NULL,
  `answer` text COLLATE utf8_croatian_ci NOT NULL,
  `picture` varchar(10) COLLATE utf8_croatian_ci NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `create_by` varchar(100) COLLATE utf8_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `game_id`, `member_id`, `no`, `question`, `answer`, `picture`, `update_date`, `create_date`, `create_by`) VALUES
(36, 19, 1, 1, 'test', '', '19_1.jpg', '2017-08-06 12:21:46', '2017-08-06 12:16:17', NULL),
(37, 19, 1, 2, 'dd', '', '19_2.jpg', '2017-08-06 12:22:52', '2017-08-06 12:22:07', NULL),
(38, 19, 1, 3, 'sss', '', '19_3.jpg', '0000-00-00 00:00:00', '2017-08-06 12:23:07', NULL),
(39, 21, 1, 1, '', '', '21_1.jpg', '2017-08-14 16:48:19', '2017-08-10 01:35:07', NULL),
(40, 21, 1, 2, '', '', '21_2.jpg', '2017-08-14 16:51:29', '2017-08-10 01:36:54', NULL),
(41, 21, 1, 3, '', '', '21_3.jpg', '0000-00-00 00:00:00', '2017-08-10 01:37:51', NULL),
(42, 21, 1, 4, '', '', '21_4.jpg', '2017-08-14 00:52:55', '2017-08-10 01:38:56', NULL),
(43, 21, 1, 5, '', '', '21_5.jpg', '2017-08-14 00:52:58', '2017-08-10 01:42:35', NULL),
(44, 21, 1, 6, '', '', '21_7.jpg', '2017-08-14 14:59:30', '2017-08-10 01:44:28', NULL),
(45, 22, 1, 1, 'ถ้าหากว่ารักกัน มันยากขนาดนี้  \r\nก็จบกันไป จะดีกว่าไหมเธอ อย่าฝืนเลย\r\n', '', '', '2017-08-17 12:12:48', '2017-08-17 12:07:31', NULL),
(46, 22, 1, 2, 'โปรดอย่าหลอกว่ายังมีฉัน ทั้งที่มันมีแล้วในใจ ถ้าหวังดีจริงๆใช่ไหม บอกไม่รักฉันคำเดียวพอแล้ว', '', '', '2017-08-17 16:20:01', '2017-08-17 14:52:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `start_score` int(11) DEFAULT NULL,
  `end_score` int(11) DEFAULT NULL,
  `result` text,
  `create_date` varchar(255) DEFAULT NULL,
  `update_date` varchar(255) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `game_id`, `start_score`, `end_score`, `result`, `create_date`, `update_date`, `member_id`) VALUES
(12, 21, 0, 1, 'โง่ ควายเอ้ย', NULL, NULL, 1),
(13, 21, 2, 3, 'ดักดาน', NULL, NULL, 1),
(14, 21, 4, 5, 'ไถนา', NULL, NULL, 1),
(15, 21, 6, 7, 'เลี้ยงเสียข้าวสุก', NULL, NULL, 1),
(16, 22, 0, 1, 'โง่ ควายเอ้ย', NULL, NULL, 1),
(17, 22, 2, 3, 'เลี้ยงเสียข้าวสุก', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `play_result`
--
ALTER TABLE `play_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `play_result`
--
ALTER TABLE `play_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
