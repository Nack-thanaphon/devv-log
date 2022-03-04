-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 03:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mugh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(200) NOT NULL,
  `b_detail` text NOT NULL,
  `b_link` varchar(200) NOT NULL,
  `b_image` text NOT NULL,
  `b_by` text NOT NULL,
  `b_date` datetime NOT NULL,
  `b_status` enum('1','0','','') NOT NULL,
  `b_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`b_id`, `b_title`, `b_detail`, `b_link`, `b_image`, `b_by`, `b_date`, `b_status`, `b_update`) VALUES
(4, '', 'sdgsdfgsdg', 'gfsdgsdfg', 'banner_116959751320220228_041505.png', 'sdgdfsgsd', '2022-02-28 00:00:00', '1', '2022-02-27 21:15:05'),
(5, 'เหกดเดหก', 'sdfgdfsgsdf', 'dfgsdgsdfg', 'banner_81890425720220228_041750.png', 'dsfgdsfgs', '2022-02-28 00:00:00', '1', '2022-02-27 21:17:50'),
(6, 'gfsdgdf', 'gsdgsdgsdgsfdgsdfgfsd', 'gfsdgsdfg', 'banner_168485131220220228_042008.png', 'gsdfgdfs', '2022-02-28 00:00:00', '1', '2022-02-27 21:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `e_user` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `e_detail` text CHARACTER SET utf8 NOT NULL,
  `e_address` varchar(250) CHARACTER SET utf8 NOT NULL,
  `e_file` text CHARACTER SET utf8 NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `e_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events_type`
--

CREATE TABLE `tbl_events_type` (
  `et_id` int(11) NOT NULL,
  `et_name` text NOT NULL,
  `et_create` datetime NOT NULL,
  `et_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_events_type`
--

INSERT INTO `tbl_events_type` (`et_id`, `et_name`, `et_create`, `et_update`) VALUES
(1, 'กิจกรรมประชุม', '2022-03-03 20:11:39', '2022-03-03 19:12:15'),
(2, 'กิจกรรมมหาวิทยาลัย', '2022-03-03 20:12:21', '2022-03-03 19:14:56'),
(4, 'กิจกรรมทั่วไป', '2022-03-03 20:12:21', '2022-03-03 19:12:38'),
(5, 'กิจกรรมสัมมนาวิชาการ', '2022-03-03 20:12:41', '2022-03-03 19:12:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `f_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `f_group` text NOT NULL,
  `f_type` varchar(20) NOT NULL,
  `f_detail` text NOT NULL,
  `f_by` text NOT NULL,
  `f_file` text NOT NULL,
  `f_status` enum('1','0','','') NOT NULL,
  `f_date` date NOT NULL,
  `f_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`f_id`, `f_name`, `f_group`, `f_type`, `f_detail`, `f_by`, `f_file`, `f_status`, `f_date`, `f_update`) VALUES
(9, 'งานวิชาการ', '1', '3', '', '', 'doc_77394025720220228_133349.pdf', '0', '2022-02-28', '2022-02-28 06:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_group`
--

CREATE TABLE `tbl_file_group` (
  `g_id` int(11) NOT NULL,
  `g_name` text NOT NULL,
  `g_detail` text NOT NULL,
  `g_address` text NOT NULL,
  `g_status` enum('1','0','','') NOT NULL,
  `g_date` date DEFAULT NULL,
  `g_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file_group`
--

INSERT INTO `tbl_file_group` (`g_id`, `g_name`, `g_detail`, `g_address`, `g_status`, `g_date`, `g_update`) VALUES
(1, 'เอกสารวิชาการ', 'เอกสารสถานบันวิจัยอาเซียน', 'เอกสารสถานบันวิจัยอาเซียน', '0', '0000-00-00', '2022-02-26 20:10:27'),
(2, 'เอกสารงานประชุม', 'เอกสารสถานบันวิจัยอาเซียน', 'เอกสารสถานบันวิจัยอาเซียน', '1', '0000-00-00', '2022-02-26 20:11:48'),
(3, 'เอกสาร MOU', 'เอกสารสถานบันวิจัยอาเซียน', 'เอกสารสถานบันวิจัยอาเซียน', '1', '0000-00-00', '2022-02-26 20:12:00'),
(4, 'เอกสารงานวิจัย', 'เอกสารสถานบันวิจัยอาเซียนnbvn', 'เอกสารสถานบันวิจัยอาเซียน', '1', '0000-00-00', '2022-02-26 20:11:25'),
(30, 'เอกสารทั่วไป', '', 'เอกสารสถานบันวิจัยอาเซียน', '1', '2022-02-27', '2022-02-27 03:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_type`
--

CREATE TABLE `tbl_file_type` (
  `t_id` int(11) NOT NULL,
  `t_name` text NOT NULL,
  `t_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file_type`
--

INSERT INTO `tbl_file_type` (`t_id`, `t_name`, `t_date`) VALUES
(1, 'PDF(เอกสาร)', '2022-02-27 04:16:38'),
(2, 'DOC (เอกสาร)', '2022-02-27 04:23:43'),
(3, 'อื่นๆ', '2022-02-27 10:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `n_id` int(11) NOT NULL,
  `n_type` enum('1','2','3') NOT NULL,
  `n_name` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `n_detail` text DEFAULT NULL,
  `slug` text NOT NULL,
  `n_image` varchar(400) NOT NULL,
  `n_views` int(11) NOT NULL,
  `n_date` date NOT NULL,
  `n_status` enum('1','0','','') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_counter`
--

CREATE TABLE `tbl_news_counter` (
  `nc_id` int(11) NOT NULL,
  `nc_visiter` text NOT NULL COMMENT 'นับจำนวนผู้เข้าชม',
  `nc_page` text NOT NULL COMMENT 'หน้าที่เข้าชม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_type`
--

CREATE TABLE `tbl_news_type` (
  `n_type_id` int(11) NOT NULL,
  `n_type` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news_type`
--

INSERT INTO `tbl_news_type` (`n_type_id`, `n_type`, `create_at`, `update_at`) VALUES
(1, 'ข่าวประจำเดือน', '2022-01-28 07:10:46', '2022-01-28 07:10:46'),
(2, 'ข่าวกิจกรรม', '2022-01-28 07:10:46', '2022-01-28 07:10:46'),
(3, 'ข่าวประจำสัปดาห์', '2022-02-27 13:25:31', '2022-02-27 13:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `full_name` text CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_password` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `user_image` text NOT NULL,
  `user_role_id` varchar(20) CHARACTER SET utf8 NOT NULL,
  `user_status` enum('1','0') CHARACTER SET utf8 NOT NULL,
  `token` text CHARACTER SET utf8 DEFAULT NULL,
  `salt` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `full_name`, `user_email`, `user_password`, `user_name`, `user_image`, `user_role_id`, `user_status`, `token`, `salt`) VALUES
(22, 'จริยา ศรีกลัด', 'jariya@gmail.com', '61b9da061eb76f39354a0a95c9c6a2ab', 'Jariya srikud', '', '2', '1', '15a8ba7494e42f3f0c7fbf43fe3fe811', '7m12hjPSyV'),
(27, 'ธนพล กัลปพฤกษ์', 'e21bvz@hotmail.com', 'cf26b68d975f74373fce89bb5870c60a', 'ธนพล กัลปพฤกษ์', '', '1', '1', '57363c72156f407e99bfb8fb1a48410f', '4GLH9N7ju9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE `tbl_user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_role_id`, `user_role`, `create_at`) VALUES
(1, 'superadmin', '2022-01-20 01:25:09'),
(2, 'admin', '2022-01-20 01:25:09'),
(3, 'editer', '2022-01-20 01:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor_counter`
--

CREATE TABLE `tbl_visitor_counter` (
  `id` int(11) NOT NULL,
  `visitor_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visitor_counter`
--

INSERT INTO `tbl_visitor_counter` (`id`, `visitor_counter`) VALUES
(1, 281);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_events_type`
--
ALTER TABLE `tbl_events_type`
  ADD PRIMARY KEY (`et_id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `tbl_file_group`
--
ALTER TABLE `tbl_file_group`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbl_file_type`
--
ALTER TABLE `tbl_file_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tbl_news_counter`
--
ALTER TABLE `tbl_news_counter`
  ADD PRIMARY KEY (`nc_id`);

--
-- Indexes for table `tbl_news_type`
--
ALTER TABLE `tbl_news_type`
  ADD PRIMARY KEY (`n_type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `tbl_visitor_counter`
--
ALTER TABLE `tbl_visitor_counter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_events_type`
--
ALTER TABLE `tbl_events_type`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_file_group`
--
ALTER TABLE `tbl_file_group`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_file_type`
--
ALTER TABLE `tbl_file_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_news_counter`
--
ALTER TABLE `tbl_news_counter`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news_type`
--
ALTER TABLE `tbl_news_type`
  MODIFY `n_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_visitor_counter`
--
ALTER TABLE `tbl_visitor_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
