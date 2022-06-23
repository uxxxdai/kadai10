-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2022 at 07:51 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otoshimono_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', 'test1', 1, 0),
(2, 'テスト2一般', 'test2', 'test2', 0, 0),
(3, 'テスト３', 'test3', 'test3', 0, 0),
(4, '1234', 'test4', 'test4', 0, 0),
(5, 'テスト10', 'test5', 'test5', 0, 0),
(6, 'テスト10', 'test6', 'test6', 0, 0),
(7, 'テスト10', '', '', 0, 0),
(8, 'テスト10', 'test7', 'test7', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `komainu_finder_table`
--

CREATE TABLE `komainu_finder_table` (
  `id` int(12) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `hinmei` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `delete_flag` int(12) NOT NULL,
  `login_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `otoshimono_table`
--

CREATE TABLE `otoshimono_table` (
  `id` int(12) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `hinmei` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `delete_flag` int(12) NOT NULL,
  `login_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otoshimono_table`
--

INSERT INTO `otoshimono_table` (`id`, `file_name`, `file_path`, `hinmei`, `color`, `size`, `brand`, `description`, `insert_date`, `update_date`, `latitude`, `longitude`, `delete_flag`, `login_id`) VALUES
(71, '7f505dcb-p.jpg', 'images/202206030404347f505dcb-p.jpg', '人形', '', '', '', '公園のベンチにそのまま置いてきました', '2022-06-03 13:04:34', '2022-06-09 19:05:37', '35.6590', '139.7217', 0, '0'),
(72, '2022060903335420220603040558shutterstock_662409262.jpg', 'images/202206090404042022060903335420220603040558shutterstock_662409262.jpg', '財布', '黒', '普通', 'プラダ', '麹町警察に届けた', '2022-06-03 13:05:58', '2022-06-09 19:14:02', '35.67', '139.73', 0, '0'),
(73, '落とし物.jpg', 'images/20220603041243落とし物.jpg', 'お金', '', '', '', 'とりあえず家に持ち帰りました。', '2022-06-03 13:12:43', '2022-06-08 13:08:39', '36.6590242', '139.9017861', 1, '0'),
(74, '落とし物.jpg', 'images/20220604041356落とし物.jpg', 'ddd', '', '', '', 'ddd', '2022-06-04 13:13:56', '2022-06-08 13:08:37', '35.6691299', '139.7029154', 1, '0'),
(75, 'shutterstock_662409262.jpg', 'images/20220604065501shutterstock_662409262.jpg', 'さいふ', '', '', '', 'もってかえりました', '2022-06-04 15:55:01', '2022-06-08 13:05:09', '35.6691267', '139.7028992', 1, '0'),
(76, 'pushpin2.png', 'images/20220607105757pushpin2.png', 'pushpin', 'あお', 'ちいさい', '不明', 'そのまま放置', '2022-06-07 19:57:57', '2022-06-08 13:03:16', '35.6590242', '139.7217861', 1, '0'),
(77, 'pushpin2.png', 'images/20220608035417pushpin2.png', 'ddd', '', '', '', 'ddd', '2022-06-08 12:54:17', '2022-06-08 13:04:21', '35.6590242', '139.7217861', 1, '0'),
(78, '20220603041243落とし物.jpg', 'images/2022060910041120220603041243落とし物.jpg', 'お金', '5万円', '', '', 'とりあえず持ち帰りました。', '2022-06-09 13:07:50', '2022-06-09 19:06:11', '35.66', '139.7', 0, '0'),
(79, 'jimen-no-fan_1000.jpg', 'images/20220609100840jimen-no-fan_1000.jpg', 'バナナの皮', '黄色黒', '', '', 'そのままにしました。', '2022-06-09 19:08:40', '2022-06-09 19:12:25', '35.6614682', '139.7295799', 0, '0'),
(80, 'sekishiro-special-01ss.jpg', 'images/20220609100950sekishiro-special-01ss.jpg', 'Suica', '普通のいろ', '', '', '六本木ヒルズの受付に届けました', '2022-06-09 19:09:50', '2022-06-09 19:12:32', '35.6604200', '139.7395666', 0, '0'),
(81, 'sekishiro-special-02.jpg', 'images/20220609101019sekishiro-special-02.jpg', '水菜dayo', 'みどり', '', '', '持って帰って食べるところです。', '2022-06-09 19:10:19', '2022-06-15 18:35:16', '35.6604682', '139.7298300', 0, '0'),
(82, 'sekishiro-special-02.jpg', 'images/20220610001512sekishiro-special-02.jpg', 'ddd', '', '', '', 'dd', '2022-06-10 09:15:12', '2022-06-10 09:15:40', '35.6603992', '139.7295617', 1, '0'),
(83, '20220609033812202206030404347f505dcb-p.jpg', 'images/2022061514135520220609033812202206030404347f505dcb-p.jpg', 'にんぎょう', '', '', '', 'ddddddd', '2022-06-15 23:13:55', '2022-06-15 23:13:55', '35.6604653', '139.729574', 0, 'test6'),
(84, 'sekishiro-special-04.jpg', 'images/20220622031019sekishiro-special-04.jpg', 'スーツケース', '黒', '', '', 'そのままおいてきた。', '2022-06-22 12:10:19', '2022-06-22 12:10:19', '35.6590242', '139.7217861', 0, ''),
(85, 'sekishiro-special-01ss.jpg', 'images/20220622032612sekishiro-special-01ss.jpg', 'suica', '', '', '', '交番に届けた', '2022-06-22 12:26:12', '2022-06-22 12:26:12', '35.6590242', '139.7217861', 0, 'non-login_user'),
(86, 'jimen-no-fan_1000.jpg', 'images/20220622032715jimen-no-fan_1000.jpg', 'ばなな', '', '', '', '滑った', '2022-06-22 12:27:15', '2022-06-22 12:27:15', '35.6605477', '139.729266', 0, 'test7'),
(87, '20220603040558shutterstock_662409262.jpg', 'images/2022062204273920220603040558shutterstock_662409262.jpg', 'さいふ', '', '', '', 'わかんない', '2022-06-22 13:27:39', '2022-06-22 13:27:39', '35.6590242', '139.7217861', 0, 'non-login_user'),
(88, '20220603040558shutterstock_662409262.jpg', 'images/2022062204361120220603040558shutterstock_662409262.jpg', 'さいふ', '', '', '', 'わかんない', '2022-06-22 13:36:11', '2022-06-22 13:36:11', '35.6590242', '139.7217861', 0, 'non-login_user'),
(89, '20220603040558shutterstock_662409262.jpg', 'images/2022062204362220220603040558shutterstock_662409262.jpg', 'さいふ', '', '', '', 'わかんない', '2022-06-22 13:36:22', '2022-06-22 13:36:22', '35.6590242', '139.7217861', 0, 'non-login_user'),
(90, '20220603040558shutterstock_662409262.jpg', 'images/2022062204363420220603040558shutterstock_662409262.jpg', 'ddd', '', '', '', 'ggg', '2022-06-22 13:36:34', '2022-06-22 13:36:34', '35.6590242', '139.7217861', 0, 'non-login_user'),
(91, '2022060902364220220603040558shutterstock_662409262.jpg', 'images/202206220459262022060902364220220603040558shutterstock_662409262.jpg', 'fffgggg', '', '', '', 'ggggdddd', '2022-06-22 13:59:26', '2022-06-22 13:59:26', '35.660556', '139.7292737', 0, 'non-login_user'),
(92, '20220609034744202206030404347f505dcb-p.jpg', 'images/2022062204595720220609034744202206030404347f505dcb-p.jpg', 'ｄｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 13:59:57', '2022-06-22 13:59:57', '35.660556', '139.7292737', 0, 'non-login_user'),
(93, '20220603040558shutterstock_662409262.jpg', 'images/2022062206360420220603040558shutterstock_662409262.jpg', 'ｆｆｆ', '', '', '', 'ｄｄ', '2022-06-22 15:36:04', '2022-06-22 15:36:04', '35.6590242', '139.7217861', 0, 'non-login_user'),
(94, '20220609100840jimen-no-fan_1000.jpg', 'images/2022062206365420220609100840jimen-no-fan_1000.jpg', 'ｄｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 15:36:54', '2022-06-22 15:36:54', '35.6590242', '139.7217861', 0, 'non-login_user'),
(95, '20220603040558shutterstock_662409262.jpg', 'images/2022062206480720220603040558shutterstock_662409262.jpg', 'ｄｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 15:48:07', '2022-06-22 15:48:07', '35.6590242', '139.7217861', 0, 'non-login_user'),
(96, '20220603040558shutterstock_662409262.jpg', 'images/2022062206492820220603040558shutterstock_662409262.jpg', 'ddd', '', '', '', 'ggg', '2022-06-22 15:49:28', '2022-06-22 15:49:28', '35.6590242', '139.7217861', 0, 'non-login_user'),
(97, '20220603040558shutterstock_662409262.jpg', 'images/2022062206515820220603040558shutterstock_662409262.jpg', 'ddd', '', '', '', 'ddd', '2022-06-22 15:51:58', '2022-06-22 15:51:58', '35.6590242', '139.7217861', 0, 'non-login_user'),
(98, '20220603040558shutterstock_662409262.jpg', 'images/2022062206530320220603040558shutterstock_662409262.jpg', 'fff', '', '', '', 'ggg', '2022-06-22 15:53:03', '2022-06-22 15:53:03', '35.6590242', '139.7217861', 0, 'test4'),
(99, '20220603040558shutterstock_662409262.jpg', 'images/2022062206542820220603040558shutterstock_662409262.jpg', 'ddd', '', '', '', 'ggg', '2022-06-22 15:54:28', '2022-06-22 15:54:28', '35.6605477', '139.7292665', 0, 'test4'),
(100, '20220603040558shutterstock_662409262.jpg', 'images/2022062206570920220603040558shutterstock_662409262.jpg', 'ｄｄｄ', '', '', '', 'eee', '2022-06-22 15:57:09', '2022-06-22 15:57:09', '35.6605472', '139.7292569', 0, 'test4'),
(101, '20220603041243落とし物.jpg', 'images/2022062206584220220603041243落とし物.jpg', 'ddd', '', '', '', 'ggg', '2022-06-22 15:58:42', '2022-06-22 15:58:42', '35.6590242', '139.7217861', 0, 'test4'),
(102, '20220610001512sekishiro-special-02.jpg', 'images/2022062207015620220610001512sekishiro-special-02.jpg', 'gdgd', '', '', '', 'gdgd', '2022-06-22 16:01:56', '2022-06-22 16:01:56', '35.6590242', '139.7217861', 0, 'test4'),
(103, '20220604040844落とし物.jpg', 'images/2022062207020620220604040844落とし物.jpg', 'ddd', '', '', '', 'ggg', '2022-06-22 16:02:06', '2022-06-22 16:02:06', '35.6605536', '139.7292551', 0, 'test4'),
(104, '20220609100840jimen-no-fan_1000.jpg', 'images/2022062208043220220609100840jimen-no-fan_1000.jpg', 'ｄｄ', '', '', '', 'ｇｇ', '2022-06-22 17:04:32', '2022-06-22 17:06:25', '35.6605741', '139.7292423', 1, 'test1'),
(105, '20220609100840jimen-no-fan_1000.jpg', 'images/2022062208064920220609100840jimen-no-fan_1000.jpg', 'ｄｄｄ', '', '', '', 'ｄｄｄ', '2022-06-22 17:06:49', '2022-06-22 17:06:49', '35.6590242', '139.7217861', 0, 'test1'),
(106, '20220604041356落とし物.jpg', 'images/2022062208074720220604041356落とし物.jpg', 'ｄｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 17:07:47', '2022-06-22 17:07:47', '35.6590242', '139.7217861', 0, 'test1'),
(107, '20220609101019sekishiro-special-02.jpg', 'images/2022062208084520220609101019sekishiro-special-02.jpg', 'ｄｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 17:08:45', '2022-06-22 17:08:45', '35.6590242', '139.7217861', 0, 'test1'),
(108, 'rapaa.jpg', 'images/20220622082737rapaa.jpg', 'らっぱ', '', '', '', 'そのまま', '2022-06-22 17:27:38', '2022-06-22 17:27:38', '35.6590242', '139.7217861', 0, 'test1'),
(109, 'rapaa.jpg', 'images/20220622083045rapaa.jpg', 'ｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 17:30:45', '2022-06-22 17:30:45', '35.6590242', '139.7217861', 0, 'test1'),
(110, '20220616070421jimen-no-fan_1000.jpg', 'images/2022062208362520220616070421jimen-no-fan_1000.jpg', '４４４', '', '', '', 'ｄｄｄ', '2022-06-22 17:36:25', '2022-06-22 17:36:25', '35.6590242', '139.7217861', 0, 'test1'),
(111, '2022062208362520220616070421jimen-no-fan_1000.jpg', 'images/202206220836532022062208362520220616070421jimen-no-fan_1000.jpg', 'ｄｄｄ', '', '', '', 'ｇｇｇ', '2022-06-22 17:36:53', '2022-06-22 17:36:53', '35.6590242', '139.7217861', 0, 'test1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komainu_finder_table`
--
ALTER TABLE `komainu_finder_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otoshimono_table`
--
ALTER TABLE `otoshimono_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komainu_finder_table`
--
ALTER TABLE `komainu_finder_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otoshimono_table`
--
ALTER TABLE `otoshimono_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
