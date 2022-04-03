-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 06:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(1, 'jhfjhjfgjgf', 'gfjghfjfg', 'jgfjgjgj', 'banner_201080227520220317_104330.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 03:43:30'),
(7, '', '', '', 'banner_153921593120220317_113306.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:33:06'),
(8, '', '', '', 'banner_14494388020220317_113659.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:36:59'),
(9, '', '', '', 'banner_49816991320220317_113849.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:38:49'),
(10, '', '', '', 'banner_120183235720220317_115131.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:51:31'),
(11, '', '', '', 'banner_65196858420220317_115244.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:52:44'),
(12, '', '', '', 'banner_177118633420220317_115314.gif', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:53:14'),
(13, '', '', '', 'banner_197845703220220317_115401.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:54:01'),
(14, '', '', '', 'banner_204980909420220317_115451.jpg', '', '0000-00-00 00:00:00', '1', '2022-03-17 04:54:51'),
(16, '', '', '', 'banner_203398734720220317_120919.png', '', '0000-00-00 00:00:00', '1', '2022-03-17 05:09:19'),
(17, 'gsdgsdgsdfgd', 'sfgdsgfdgsdfgsdfgsdf', 'fgdsgsdfgdsgd', 'banner_189744865920220317_121543.jpg', 'gsdgdsfgdsf', '0000-00-00 00:00:00', '1', '2022-03-17 05:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `id` int(11) NOT NULL,
  `e_user` int(11) NOT NULL,
  `et_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `e_detail` text CHARACTER SET utf8 NOT NULL,
  `e_address` varchar(250) CHARACTER SET utf8 NOT NULL,
  `e_link` text CHARACTER SET utf8 NOT NULL,
  `start` varchar(30) CHARACTER SET utf8 NOT NULL,
  `end` varchar(30) CHARACTER SET utf8 NOT NULL,
  `time_start` varchar(30) CHARACTER SET utf8 NOT NULL,
  `time_end` varchar(30) CHARACTER SET utf8 NOT NULL,
  `e_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`id`, `e_user`, `et_id`, `title`, `e_detail`, `e_address`, `e_link`, `start`, `end`, `time_start`, `time_end`, `e_update`) VALUES
(86, 1, 1, 'fdfdfdf', '', '', '', '2022-03-21T00:00', '2022-03-24T00:00', '00:00', '00:00', '2022-03-20 05:39:07');

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
  `t_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `f_detail` text NOT NULL,
  `f_by` text NOT NULL,
  `f_file` text NOT NULL,
  `f_status` enum('1','0') NOT NULL,
  `f_date` date NOT NULL,
  `f_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`f_id`, `f_name`, `f_group`, `t_id`, `u_id`, `f_detail`, `f_by`, `f_file`, `f_status`, `f_date`, `f_update`) VALUES
(2, 'fdasfsafasfsa', '3', 1, 1, 'fsadfsadfsdafsdaf', 'assfsad', 'doc_88190082320220317_144925.pdf', '1', '2022-03-17', '2022-03-17 07:49:25');

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
(1, 'PDF', '2022-02-27 04:16:38'),
(2, 'DOC', '2022-02-27 04:23:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `g_id` int(11) NOT NULL,
  `g_name` text NOT NULL,
  `g_detail` text NOT NULL,
  `g_status` enum('1','0') NOT NULL,
  `g_user` text NOT NULL,
  `g_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`g_id`, `g_name`, `g_detail`, `g_status`, `g_user`, `g_date`) VALUES
(4, 'กิจกรรมวิชาการศึกษา', '', '0', '', '0000-00-00'),
(5, 'km;lm', '', '0', '', '0000-00-00'),
(6, 'asdasd', '', '0', '', '0000-00-00'),
(7, 'asdasd', '', '0', '', '0000-00-00'),
(8, 'hello world', '', '0', '', '0000-00-00'),
(9, 'test', '', '1', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `i_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `i_name` text NOT NULL,
  `i_create` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`i_id`, `g_id`, `i_name`, `i_create`) VALUES
(9, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (2).jpg', '2022-03-20 02:35:03'),
(10, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (3).jpg', '2022-03-20 02:35:03'),
(11, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (4).jpg', '2022-03-20 02:35:03'),
(12, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (5).jpg', '2022-03-20 02:35:03'),
(13, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy.jpg', '2022-03-20 02:35:03'),
(14, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de.jpg', '2022-03-20 02:35:03'),
(15, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (4).jpg', '2022-03-20 02:45:39'),
(16, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy.jpg', '2022-03-20 02:45:39'),
(17, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (2).jpg', '2022-03-20 02:45:39'),
(18, 5, '../../uploads/gallery/km;lm/photo-1564648351416-3eec9f3e85de - Copy (3).jpg', '2022-03-20 02:45:39'),
(19, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de - Copy (2).jpg', '2022-03-20 02:46:18'),
(20, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de - Copy (2).jpg', '2022-03-20 02:46:37'),
(21, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de - Copy (3).jpg', '2022-03-20 02:46:37'),
(22, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de - Copy (4).jpg', '2022-03-20 02:46:37'),
(23, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de - Copy (5).jpg', '2022-03-20 02:46:37'),
(24, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de - Copy.jpg', '2022-03-20 02:46:37'),
(25, 9, '../../uploads/gallery/test/photo-1564648351416-3eec9f3e85de.jpg', '2022-03-20 02:46:37'),
(26, 9, '../../uploads/gallery/test/1647314868377.jpeg', '2022-03-20 02:47:55');

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
  `user_id` text NOT NULL,
  `n_image` varchar(400) NOT NULL,
  `n_views` int(11) NOT NULL,
  `n_date` date NOT NULL,
  `n_status` enum('1','0','','') NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`n_id`, `n_type`, `n_name`, `url`, `n_detail`, `user_id`, `n_image`, `n_views`, `n_date`, `n_status`, `update_at`, `create_at`) VALUES
(1, '3', 'ดกเดหกเเก', 'ดหเกหเกหเกหเกเ', '<p>                                    เดกเหกเกหดเหก</p>', '1', 'uploads/images/16474946808770.jpg', 0, '2022-03-16', '1', '2022-03-17 05:25:19', '2022-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newsletter`
--

CREATE TABLE `tbl_newsletter` (
  `id` int(11) NOT NULL,
  `n_user_id` int(11) NOT NULL,
  `n_title` text NOT NULL,
  `n_detail` text NOT NULL,
  `n_views` text NOT NULL,
  `n_date` varchar(10) NOT NULL,
  `n_status` enum('1','0') NOT NULL,
  `n_create` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_newsletter`
--

INSERT INTO `tbl_newsletter` (`id`, `n_user_id`, `n_title`, `n_detail`, `n_views`, `n_date`, `n_status`, `n_create`) VALUES
(1, 1, 'fdhfgh', '<p>dfhfd</p>', '0', '0000-00-00', '1', '0000-00-00'),
(4, 2, 'csdcdc', '<p><br></p><p>cdcd<br></p>', '0', 'June-2022', '1', '0000-00-00'),
(5, 2, 'cdcds', '<p>vdvd</p>', '0', '0000-00-00', '1', '2022-03-18'),
(6, 2, 'cscscs', '<table class=\"es-header\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: transparent; border-spacing: 0px; width: 840px; background-repeat: repeat; background-position: center top; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-header-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 10px; margin: 0px;\"><table class=\"es-left\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" style=\"border-spacing: 0px; float: left;\"><tbody><tr><td class=\"es-m-p0r es-m-p20b\" valign=\"top\" align=\"center\" style=\"padding: 0px; margin: 0px; width: 190px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/logo.png\" alt=\"\" width=\"85\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table><table cellspacing=\"0\" cellpadding=\"0\" align=\"right\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px; width: 370px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; font-family: helvetica, &quot;helvetica neue&quot;, arial, verdana, sans-serif; line-height: 52px; color: rgb(11, 83, 148); font-size: 43px;\"><strong>AUN–HPN</strong></p></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\">ASEAN University Network Health Promotion Network</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-content\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: rgb(246, 246, 246); border-spacing: 0px; width: 840px; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-content-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; background-color: rgb(255, 255, 255); width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-spacing: 0px;\"><tbody><tr><td valign=\"top\" align=\"center\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/comunity.jpg\" alt=\"\" width=\"560\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-footer\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: transparent; border-spacing: 0px; width: 840px; background-repeat: repeat; background-position: center top; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-footer-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 10px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(19, 79, 92); background: unset; height: 1px; width: 540px; margin: 0px;\"></td></tr></tbody></table></td></tr><tr><td align=\"center\" style=\"padding: 10px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\"><span style=\"font-size: 22px;\"><strong>Vol. 4 - March 2021</strong><br></span><span style=\"font-size: 11px;\">MHSc in Health Administration, Upcoming Opportunities, and Warmest Wishes&nbsp;from the DLSPH!</span></p></td></tr><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(204, 204, 204); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-content\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: rgb(246, 246, 246); border-spacing: 0px; width: 840px; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-content-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; background-color: rgb(255, 255, 255); width: 600px;\"><tbody><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(255, 255, 255); font-size: 14px; text-align: center;\"><strong>Happy Holidays from the DLSPH</strong></p></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 600px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 0px solid rgb(204, 204, 204); background: unset; height: 1px; width: 560px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/275381895_339888861484798_864844671770398319_n.jpg\" alt=\"\" width=\"550\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(204, 204, 204); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\"><strong>Tell us about yourself; your current work at the School and beyond, and the various positions you hold in your field.</strong></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\">I have been Program Director for the MHSc in Health Administration at IHPME since 1996. Over the last 6-7 years I have been delving deeply into the relationship between&nbsp;<strong>complex adaptive systems</strong>&nbsp;and&nbsp;<strong>healthcare leadership</strong>. In particular, I am fascinated by the influence and interactions between leadership behaviour and individual, organization and system-level outcomes. This has led me to integrate leading research and practice on adult cognitive development, positive psychology, Emotional Intelligence and mindfulness into my teaching at IHPME and beyond.<br><br>Most recently my colleagues and I have been developing the Hub for&nbsp;<strong>Human-centred Leadership and Wellbeing</strong>. Our work focuses on advancing the science of&nbsp;<strong>leadership</strong>&nbsp;in healthcare to support the development of&nbsp;<strong>innovative</strong>&nbsp;and&nbsp;<strong>compassionate</strong>&nbsp;<strong>leaders</strong>&nbsp;able to navigate the complex and dynamic healthcare environment. This includes designing and delivering evidence-informed, context-specific leadership education to the field</p></td></tr><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 3px solid rgb(11, 83, 148); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-content\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: rgb(246, 246, 246); border-spacing: 0px; width: 840px; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-content-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; background-color: rgb(255, 255, 255); width: 600px;\"><tbody><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(255, 255, 255); font-size: 14px; text-align: center;\"><strong>Happy Holidays from the DLSPH</strong></p></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 600px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 0px solid rgb(204, 204, 204); background: unset; height: 1px; width: 560px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/275379664_339953791478305_7469553233844799296_n.jpg\" alt=\"\" width=\"550\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(204, 204, 204); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\"><strong>Tell us about yourself; your current work at the School and beyond, and the various positions you hold in your field.</strong></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\">I have been Program Director for the MHSc in Health Administration at IHPME since 1996. Over the last 6-7 years I have been delving deeply into the relationship between&nbsp;<strong>complex adaptive systems</strong>&nbsp;and&nbsp;<strong>healthcare leadership</strong>. In particular, I am fascinated by the influence and interactions between leadership behaviour and individual, organization and system-level outcomes. This has led me to integrate leading research and practice on adult cognitive development, positive psychology, Emotional Intelligence and mindfulness into my teaching at IHPME and beyond.<br><br>Most recently my colleagues and I have been developing the Hub for&nbsp;<strong>Human-centred Leadership and Wellbeing</strong>. Our work focuses on advancing the science of&nbsp;<strong>leadership</strong>&nbsp;in healthcare to support the development of&nbsp;<strong>innovative</strong>&nbsp;and&nbsp;<strong>compassionate</strong>&nbsp;<strong>leaders</strong>&nbsp;able to navigate the complex and dynamic healthcare environment. This includes designing and delivering evidence-informed, context-specific leadership education to the field</p></td></tr><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 3px solid rgb(11, 83, 148); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-footer\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: transparent; border-spacing: 0px; width: 840px; background-repeat: repeat; background-position: center top; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-footer-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 600px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 0px solid rgb(204, 204, 204); background: unset; height: 1px; width: 560px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 20px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"es-left\" style=\"border-spacing: 0px; float: left;\"><tbody><tr><td class=\"es-m-p20b\" align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 180px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 17px; color: rgb(51, 51, 51); font-size: 11px;\"><strong>ASEAN University Network Health Promotion Network&nbsp;Secretariat</strong></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 15px; color: rgb(51, 51, 51); font-size: 10px;\">Mahidol University,999 Phuttamonthon4,</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 15px; color: rgb(51, 51, 51); font-size: 10px;\">Salaya, Phuttamonthon,NakonPathom Thailand&nbsp;73170</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 15px; color: rgb(51, 51, 51); font-size: 10px;\">Tel.662-441-9044</p></td></tr></tbody></table></td></tr></tbody></table><table cellpadding=\"0\" cellspacing=\"0\" class=\"es-right\" align=\"right\" style=\"border-spacing: 0px; float: right;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px; width: 360px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/logonew6.png\" alt=\"\" width=\"360\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', '0', 'February-2', '1', '0000-00-00'),
(8, 1, 'vssgdfg', '<table class=\"es-header\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: transparent; border-spacing: 0px; width: 840px; background-repeat: repeat; background-position: center top; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-header-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 10px; margin: 0px;\"><table class=\"es-left\" cellspacing=\"0\" cellpadding=\"0\" align=\"left\" style=\"border-spacing: 0px; float: left;\"><tbody><tr><td class=\"es-m-p0r es-m-p20b\" valign=\"top\" align=\"center\" style=\"padding: 0px; margin: 0px; width: 190px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/logo.png\" alt=\"\" width=\"85\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table><table cellspacing=\"0\" cellpadding=\"0\" align=\"right\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px; width: 370px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; font-family: helvetica, &quot;helvetica neue&quot;, arial, verdana, sans-serif; line-height: 52px; color: rgb(11, 83, 148); font-size: 43px;\"><strong>AUN–HPN</strong></p></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\">ASEAN University Network Health Promotion Network</p></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-content\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: rgb(246, 246, 246); border-spacing: 0px; width: 840px; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-content-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; background-color: rgb(255, 255, 255); width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-spacing: 0px;\"><tbody><tr><td valign=\"top\" align=\"center\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/comunity.jpg\" alt=\"\" width=\"560\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-footer\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: transparent; border-spacing: 0px; width: 840px; background-repeat: repeat; background-position: center top; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-footer-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 10px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(19, 79, 92); background: unset; height: 1px; width: 540px; margin: 0px;\"></td></tr></tbody></table></td></tr><tr><td align=\"center\" style=\"padding: 10px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\"><span style=\"font-size: 22px;\"><strong>Vol. 4 - March 2021</strong><br></span><span style=\"font-size: 11px;\">MHSc in Health Administration, Upcoming Opportunities, and Warmest Wishes&nbsp;from the DLSPH!</span></p></td></tr><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(204, 204, 204); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-content\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: rgb(246, 246, 246); border-spacing: 0px; width: 840px; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-content-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; background-color: rgb(255, 255, 255); width: 600px;\"><tbody><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(255, 255, 255); font-size: 14px; text-align: center;\"><strong>Happy Holidays from the DLSPH</strong></p></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 600px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 0px solid rgb(204, 204, 204); background: unset; height: 1px; width: 560px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/275381895_339888861484798_864844671770398319_n.jpg\" alt=\"\" width=\"550\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(204, 204, 204); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\"><strong>Tell us about yourself; your current work at the School and beyond, and the various positions you hold in your field.</strong></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\">I have been Program Director for the MHSc in Health Administration at IHPME since 1996. Over the last 6-7 years I have been delving deeply into the relationship between&nbsp;<strong>complex adaptive systems</strong>&nbsp;and&nbsp;<strong>healthcare leadership</strong>. In particular, I am fascinated by the influence and interactions between leadership behaviour and individual, organization and system-level outcomes. This has led me to integrate leading research and practice on adult cognitive development, positive psychology, Emotional Intelligence and mindfulness into my teaching at IHPME and beyond.<br><br>Most recently my colleagues and I have been developing the Hub for&nbsp;<strong>Human-centred Leadership and Wellbeing</strong>. Our work focuses on advancing the science of&nbsp;<strong>leadership</strong>&nbsp;in healthcare to support the development of&nbsp;<strong>innovative</strong>&nbsp;and&nbsp;<strong>compassionate</strong>&nbsp;<strong>leaders</strong>&nbsp;able to navigate the complex and dynamic healthcare environment. This includes designing and delivering evidence-informed, context-specific leadership education to the field</p></td></tr><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 3px solid rgb(11, 83, 148); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-content\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: rgb(246, 246, 246); border-spacing: 0px; width: 840px; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-content-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; background-color: rgb(255, 255, 255); width: 600px;\"><tbody><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(255, 255, 255); font-size: 14px; text-align: center;\"><strong>Happy Holidays from the DLSPH</strong></p></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 600px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 0px solid rgb(204, 204, 204); background: unset; height: 1px; width: 560px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" bgcolor=\"#0b5394\" style=\"padding: 25px; margin: 0px; background-color: rgb(11, 83, 148);\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 550px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/275379664_339953791478305_7469553233844799296_n.jpg\" alt=\"\" width=\"550\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 20px 20px 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 560px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 1px solid rgb(204, 204, 204); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\"><strong>Tell us about yourself; your current work at the School and beyond, and the various positions you hold in your field.</strong></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 21px; color: rgb(51, 51, 51); font-size: 14px;\">I have been Program Director for the MHSc in Health Administration at IHPME since 1996. Over the last 6-7 years I have been delving deeply into the relationship between&nbsp;<strong>complex adaptive systems</strong>&nbsp;and&nbsp;<strong>healthcare leadership</strong>. In particular, I am fascinated by the influence and interactions between leadership behaviour and individual, organization and system-level outcomes. This has led me to integrate leading research and practice on adult cognitive development, positive psychology, Emotional Intelligence and mindfulness into my teaching at IHPME and beyond.<br><br>Most recently my colleagues and I have been developing the Hub for&nbsp;<strong>Human-centred Leadership and Wellbeing</strong>. Our work focuses on advancing the science of&nbsp;<strong>leadership</strong>&nbsp;in healthcare to support the development of&nbsp;<strong>innovative</strong>&nbsp;and&nbsp;<strong>compassionate</strong>&nbsp;<strong>leaders</strong>&nbsp;able to navigate the complex and dynamic healthcare environment. This includes designing and delivering evidence-informed, context-specific leadership education to the field</p></td></tr><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 3px solid rgb(11, 83, 148); background: unset; height: 1px; width: 520px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><table class=\"es-footer\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\" style=\"color: rgb(0, 0, 0); font-family: arial, &quot;helvetica neue&quot;, helvetica, sans-serif; font-size: medium; background-color: transparent; border-spacing: 0px; width: 840px; background-repeat: repeat; background-position: center top; table-layout: fixed !important;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px;\"><table class=\"es-footer-body\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#ffffff\" align=\"center\" style=\"border-spacing: 0px; width: 600px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 600px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 20px; margin: 0px; font-size: 0px;\"><table border=\"0\" width=\"100%\" height=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td style=\"padding: 0px; border-bottom: 0px solid rgb(204, 204, 204); background: unset; height: 1px; width: 560px; margin: 0px;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr><tr><td align=\"left\" style=\"padding: 20px; margin: 0px;\"><table cellpadding=\"0\" cellspacing=\"0\" align=\"left\" class=\"es-left\" style=\"border-spacing: 0px; float: left;\"><tbody><tr><td class=\"es-m-p20b\" align=\"center\" valign=\"top\" style=\"padding: 0px; margin: 0px; width: 180px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 17px; color: rgb(51, 51, 51); font-size: 11px;\"><strong>ASEAN University Network Health Promotion Network&nbsp;Secretariat</strong></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 15px; color: rgb(51, 51, 51); font-size: 10px;\">Mahidol University,999 Phuttamonthon4,</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 15px; color: rgb(51, 51, 51); font-size: 10px;\">Salaya, Phuttamonthon,NakonPathom Thailand&nbsp;73170</p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; text-size-adjust: none; line-height: 15px; color: rgb(51, 51, 51); font-size: 10px;\">Tel.662-441-9044</p></td></tr></tbody></table></td></tr></tbody></table><table cellpadding=\"0\" cellspacing=\"0\" class=\"es-right\" align=\"right\" style=\"border-spacing: 0px; float: right;\"><tbody><tr><td align=\"left\" style=\"padding: 0px; margin: 0px; width: 360px;\"><table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" role=\"presentation\" style=\"border-spacing: 0px;\"><tbody><tr><td align=\"center\" style=\"padding: 0px; margin: 0px; font-size: 0px;\"><img class=\"adapt-img\" src=\"https://uezkci.stripocdn.email/content/guids/CABINET_12f7915fc0bfc87168451e99daa8b8a7/images/logonew6.png\" alt=\"\" width=\"360\" style=\"display: block; border: 0px; outline: none;\"></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table>', '0', '', '1', '2022-03-20');

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
(3, 'ข่าวสำคัญ', '2022-02-27 13:25:31', '2022-02-27 13:25:31');

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
(1, 'ธนพล กัลปพฤกษ์', 'e21bvz@hotmail.com', '8a74f79ac42b1c4361710c814b05ddf4', 'nack', '', '1', '1', '7b8e3b4ee014f30ea53e01bf355ec23b', 'VkztNO8yhW'),
(2, 'เพียงเพ็ญ แป้นจันทร์', 'e21bvz@gmail.com', 'c54324270418a32b104698049343a197', 'nui', '', '1', '1', 'e971a5b2032b96bc42a1b7190f05fe86', 'HmBH5irzx6');

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
(3, 'editer', '2022-01-20 01:25:29'),
(4, 'user', '2022-03-16 06:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_webstat`
--

CREATE TABLE `tbl_webstat` (
  `c_id` int(30) NOT NULL,
  `c_ip` text NOT NULL,
  `c_nation` varchar(20) NOT NULL,
  `c_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_webstat`
--
ALTER TABLE `tbl_webstat`
  ADD PRIMARY KEY (`c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `tbl_events_type`
--
ALTER TABLE `tbl_events_type`
  MODIFY `et_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_file_group`
--
ALTER TABLE `tbl_file_group`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_file_type`
--
ALTER TABLE `tbl_file_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_newsletter`
--
ALTER TABLE `tbl_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_user_role`
--
ALTER TABLE `tbl_user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_webstat`
--
ALTER TABLE `tbl_webstat`
  MODIFY `c_id` int(30) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
