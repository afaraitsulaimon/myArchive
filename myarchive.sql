-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2019 at 03:16 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myarchive`
--

-- --------------------------------------------------------

--
-- Table structure for table `storefile`
--

DROP TABLE IF EXISTS `storefile`;
CREATE TABLE IF NOT EXISTS `storefile` (
  `storeFile_id` int(11) NOT NULL AUTO_INCREMENT,
  `storeFileNo` varchar(20) NOT NULL,
  `dept_StoreFile` text NOT NULL,
  `assignedUsers` text NOT NULL,
  `storePickerId` varchar(15) NOT NULL,
  `pickUpDate` timestamp NOT NULL,
  PRIMARY KEY (`storeFile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storefile`
--

INSERT INTO `storefile` (`storeFile_id`, `storeFileNo`, `dept_StoreFile`, `assignedUsers`, `storePickerId`, `pickUpDate`) VALUES
(9, 'ZNV233-6775884', 'Non-Valid', 'broda shaggi', '2', '2019-11-26 12:05:14'),
(10, 'HYUI-67637855', 'Non-Valid', 'hl golden', '2', '2019-11-26 12:08:14'),
(13, 'XXXIO-342167', 'Non-Valid', 'broda shaggi', '2', '2019-11-26 12:13:44'),
(15, 'nxp05789544', 'Export', 'ronaldo jon', '13', '2019-11-26 14:29:10'),
(16, 'nxp05353545', 'Export', 'oluwa messi', '13', '2019-11-26 14:29:20'),
(17, 'nxp05555556', 'Export', 'ronaldo jon', '13', '2019-11-26 14:29:44'),
(18, 'nxp07777777', 'Export', 'oluwa messi', '13', '2019-11-26 14:29:53'),
(19, 'gfhgfhftjt55', 'Export', 'ronaldo jon', '12', '2019-11-28 11:39:26'),
(20, 'vvvvvnjnjjj', 'Export', 'ronaldo jon', '12', '2019-11-28 11:40:06'),
(21, 'zb1111111', 'Bills', 'Ajose Aseyori', '1', '2019-11-28 14:39:01'),
(22, 'zbc123456', 'Bills', 'rererere rere', '1', '2019-11-28 14:39:13'),
(23, 'zbc45895', 'Bills', 'makem mekem', '1', '2019-11-28 14:41:13'),
(24, 'ZBCDEOL693214', 'Bills', 'makem mekem', '4', '2019-11-28 14:41:56'),
(25, 'ZBCIOLPRR543', 'Bills', 'Ajose Aseyori', '4', '2019-11-28 14:42:11'),
(26, 'ZXIOUUUUU33', 'Bills', 'makem mekem', '4', '2019-11-28 14:42:23'),
(27, 'xdert43333', 'Export', 'oluwa messi', '14', '2019-11-29 14:23:41'),
(28, 'zlc011-201952', 'LC', 'crest repo', '6', '2019-12-07 11:31:31'),
(29, 'zlc222-852963', 'LC', 'robin hood', '6', '2019-12-07 11:31:45'),
(30, 'zlc111-34987', 'LC', 'Ajose Aseyori', '7', '2019-12-07 11:32:26'),
(31, 'zlc222-098765', 'LC', 'robin hood', '7', '2019-12-07 11:32:41'),
(32, 'zlc999-44444', 'LC', 'crest repo', '7', '2019-12-07 11:32:55'),
(33, 'zlc666-001122', 'LC', 'robin hood', '7', '2019-12-07 11:33:09'),
(34, 'zlc080-32716181', 'LC', 'crest repo', '8', '2019-12-07 11:34:04'),
(35, 'zlc080-56897423', 'LC', 'robin hood', '8', '2019-12-07 11:34:17'),
(36, 'zlc081-86657295', 'LC', 'crest repo', '8', '2019-12-07 11:34:39'),
(37, 'zlc090-445599', 'LC', 'robin hood', '8', '2019-12-07 11:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `store_admin`
--

DROP TABLE IF EXISTS `store_admin`;
CREATE TABLE IF NOT EXISTS `store_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `store_userFullName` text NOT NULL,
  `store_username` varchar(30) NOT NULL,
  `store_user_email` varchar(30) NOT NULL,
  `store_user_dept` enum('Bills','LC','Non-Valid','Export','Invisible') NOT NULL,
  `store_user_password` varchar(64) NOT NULL,
  `store_user_regDate` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_admin`
--

INSERT INTO `store_admin` (`id`, `store_userFullName`, `store_username`, `store_user_email`, `store_user_dept`, `store_user_password`, `store_user_regDate`) VALUES
(1, 'trevor james', 'trevorman', 'trevorman_james@yahoo.com', 'Invisible', 'c930zmmc7h4cws0wo0cg88wo00kcg8w', '2019-12-08 12:56:04'),
(2, 'Bamiyo Owolabi', 'owoplentymoney', 'bamiowo@yahoo.com', 'Bills', 'owolabi123', '2019-12-08 13:21:59'),
(3, 'Mokeli Mokeli', 'mokeli123', 'mokeli@yahoo.com', 'Export', 'mokeli123', '2019-12-08 12:56:04'),
(4, 'shetima bilal', 'shetimaguy', 'shetima@yahoo.com', 'Non-Valid', 'shetima123', '2019-12-08 12:56:04'),
(5, 'oluwabery oluwabre', 'owoplenty', 'oluwabe@yahoo.com', 'Bills', 'oluwabe123', '2019-12-08 12:56:04'),
(6, 'graham Abraham', 'graham_cel', 'graham_cel123@aol.com', 'LC', 'graham_cel123', '2019-12-08 12:56:04'),
(7, 'Felix ajona', 'fel777ix77', 'fel777@aol.com', 'Bills', 'fel777ix77', '2019-12-08 12:56:04'),
(8, 'Danniel akujo', 'dannyBoy', 'daniel_akujo@yahoo.com', 'LC', 'dannyBoy123', '2019-12-08 12:56:04'),
(9, 'asogwa moses', 'asogwa_moses', 'asogwa123@yahoo.co.uk', 'LC', 'asogwa123', '2019-12-08 13:23:43'),
(10, 'Femi sesan', 'femi_sesi', 'femi_sesi321@yahoo.com', 'Invisible', 'femi_sesi321', '2019-12-08 12:56:04'),
(11, 'Kolade porko', 'kolade_porko', 'kolade_porko@aol.com', 'Export', 'kola_mem1', '2019-12-08 12:56:04'),
(12, 'imeh omoah', 'imeh_omoah', 'imeh_omoah234@gmail.com', 'Bills', 'imeh_omoah234', '2019-12-08 12:56:04'),
(13, 'Madueke Aliyu', 'MaduekeAliyu456', 'MaduekeAliyu@mail.com', 'LC', 'MaduekeAliyu456', '2019-12-08 12:56:04'),
(14, 'funny funjebe', 'funnyfunjebe123', 'funnyfunjebe@yahoo.ca', 'Non-Valid', 'funnyfunjebe', '2019-12-08 12:56:04'),
(15, 'tola omoreke', 'tola_omoreke147', 'tola_omoreke@yahoo.com', 'Invisible', 'tola_omoreke147', '2019-12-08 12:56:04'),
(16, 'kekere ajewo', 'kekere_ajewo', 'kekere_ajewo@aol.com', 'Export', 'kekere-owo963', '2019-12-08 12:56:04'),
(17, 'kayoney kayode', 'kaypumpy', 'kaypumpy@yahoo.com', 'Bills', 'kaypumpy987', '2019-12-08 12:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_FullName` text NOT NULL,
  `usersUsername` varchar(30) NOT NULL,
  `users_email` varchar(64) NOT NULL,
  `users_department` enum('Bills','LC','Non-Valid','Export','Invisible','ADA-Scan') NOT NULL,
  `usersPassword` varchar(32) NOT NULL,
  `usersRegDate` timestamp NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `usersUsername` (`usersUsername`),
  UNIQUE KEY `users_email` (`users_email`),
  UNIQUE KEY `usersPassword` (`usersPassword`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `users_FullName`, `usersUsername`, `users_email`, `users_department`, `usersPassword`, `usersRegDate`) VALUES
(1, 'Africa child', 'afriii', 'african@aol.com', 'Invisible', 'kilode1', '2019-10-16 12:59:19'),
(2, 'broda shaggi', 'shagii', 'brodashaggi@yahoo.com', 'Non-Valid', 'shagi123456', '2019-11-06 12:42:05'),
(3, 'hl golden', 'hl_golden', 'golden@aol.com', 'Non-Valid', 'kilode123456', '2019-11-06 12:42:52'),
(4, 'Ajose Aseyori', 'ajose_aseyori', 'aj_as@aol.com', 'Bills', 'aseyori12', '2019-11-06 12:43:53'),
(6, 'fred ajegbe', 'fred_ajegbe', 'fred_ajegbe@aol.com', 'Invisible', 'yeso123', '2019-11-26 12:22:14'),
(7, 'Ajose Aseyori', 'AjoseAseyori', 'AjoseAseyori@yahoo.com', 'LC', '123456789', '2019-11-26 12:23:21'),
(8, 'crest repo', 'crest_repo', 'crest_repo@aol.com', 'LC', 'crest123', '2019-11-26 12:24:40'),
(9, 'robin hood', 'robin_hood', 'robin_hood@aol.com', 'LC', 'robin8888', '2019-11-26 12:25:35'),
(10, 'ronaldo jon', 'jonro', 'jonronaldo@aol.com', 'Export', 'ronaldo123456', '2019-11-26 12:26:30'),
(11, 'oluwa messi', 'messilomo', 'messilomo@aol.com', 'Export', 'messimessi', '2019-11-26 12:27:03'),
(12, 'makem mekem', 'makeitmakit', 'makeitmakit@aol.com', 'Bills', 'makeitmakit', '2019-11-28 14:40:05'),
(13, 'rererere rere', 'rererere', 'rererere@yahoo.com', 'Bills', 'rererere', '2019-11-28 14:40:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
