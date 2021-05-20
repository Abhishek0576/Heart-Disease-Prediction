-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 02:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heart_disease`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pwd`) VALUES
('101', 'admin', 'Admin@01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `speciality` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `address` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `age`, `gender`, `speciality`, `mobile`, `email`, `address`) VALUES
(101, 'Manikanta', 31, 'Male', 'Cardiologist', '9957388888', 'mani88@gmail.com', 'ABC Hospital, Gurudwara, Visakhapatnam'),
(107, 'Sai Tarun', 36, 'Male', 'Heart Surgeon', '9876543231', 'tarunsai56@gmail.com', 'Gandhi Hospital, KPHB Colony, Hyderabad'),
(108, 'Virat', 43, 'Male', 'Heart Specialist', '8074740478', 'virat27@gmail.com', 'Apollo Hospital, Benz circle, Vijayawada'),
(109, 'Abhishek', 27, 'Male', 'Cardio Surgeon', '7995106864', 'abhi03@gmail.com', 'Care Hospital, Waltair road, Visakhapatnam'),
(110, 'Anirudh', 33, 'Male', 'Heart Doctor', '8548394569', 'anirudh838@gmail.com', 'CardioSpecial Hospital, Ringroad, Warangal'),
(111, 'Revathi', 39, 'Female', 'Heart Surgeon', '9876567890', 'revathi747@gmail.com', 'KGH Hospital, Visakhapatnam');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `feedback` varchar(120) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`, `date`, `time`) VALUES
(1, 'Ramachandra', 'Got accurate analysis of my heart and also suggested good doctor for consultancy.\r\n', '2021/04/08', '15:55'),
(2, 'Saikumar', 'Nice experience, got my analysis report in less amount of time. Thank you.', '2021/04/08', '15:56'),
(3, 'Aravind', 'Need to have some prior knowledge to use your application', '2021/04/08', '15:58'),
(4, 'Bhaskar', 'Good application, got perfect analysis results for my family members', '2021/04/08', '16:00'),
(5, 'Siri', 'Accurate prediction results, Thank you.', '2021/04/12', '14:54'),
(6, 'Archana', 'Showing perfect results ', '2021/04/21', '18:37'),
(7, 'Archana', 'Showing perfect results ', '2021/04/21', '18:37'),
(8, 'Sukumar', 'Got accurate result for my parents report ', '2021/04/21', '18:38'),
(9, 'Sandhyakumari', 'Good application working fine!!', '2021/04/21', '18:46'),
(10, 'Anonymous', '.....', '2021/04/21', '18:53'),
(11, 'Anonymous', '.....', '2021/04/21', '18:55'),
(12, 'xyz', '..........................', '2021/04/21', '18:55'),
(13, 'xyz', '..........................', '2021/04/21', '18:55'),
(14, 'xasd', 'dfgthyujkl', '2021/04/21', '18:56'),
(15, 'xasd', 'dfgthyujkl', '2021/04/21', '18:56'),
(16, 'xasd', 'dfgthyujkl', '2021/04/21', '18:56'),
(17, 'xasd', 'dfgthyujkl;;;', '2021/04/21', '18:56'),
(18, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(19, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(20, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(21, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(22, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(23, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(24, 'xasd', 'dfgthyujkl;;;,', '2021/04/21', '18:56'),
(25, '....', '....', '2021/04/21', '18:57'),
(26, '////', '////', '2021/04/21', '18:57'),
(27, 'kjhgfeertyhj', 'kl/kjhgfdfghj', '2021/04/21', '18:58'),
(28, 'sdfghjk', 'edrtyuikl;', '2021/04/21', '18:58'),
(29, 'dfghjmk,', 'sdfghjkl', '2021/04/21', '18:59'),
(30, 'Srujana', 'Good application. performing well for everyone.', '2021/05/03', '17:02'),
(31, 'Amulya', 'Need to develop more interms of result prediction ', '2021/05/03', '17:05'),
(32, 'sdfghjnm', 'wegrfthjmkn,jmgfdfghnmj,kjmghfgdrfd', '2021/05/03', '17:09'),
(33, 'efrgthy', 'wefsrgtfyhjn', '2021/05/03', '17:14'),
(34, 'qwertyu', 'wertgyhjk', '2021/05/03', '17:14'),
(35, 'dsfgn', 'vbgnhvnsedfbg', '2021/05/03', '17:16'),
(36, 'fvbg', 'sdvfbgh', '2021/05/03', '17:22'),
(37, 'dfdgfghj', 'ssdfghj', '2021/05/03', '17:23'),
(38, 'fg', 'fdg', '2021/05/03', '17:23'),
(39, 'adfv', 'asdfg', '2021/05/03', '17:24'),
(40, 'dgh', 'sdfgh', '2021/05/03', '17:24'),
(41, 'dgh', 'asdfg', '2021/05/03', '17:25'),
(42, 'fghj', 'dfgvhb', '2021/05/03', '17:26'),
(43, 'sd', 'sd', '2021/05/03', '17:26'),
(44, 'asdfg', 'sdf', '2021/05/03', '17:26'),
(45, 'sdfg', 'dfgh', '2021/05/03', '17:28'),
(46, 'ghjk', 'dcvfgvhb', '2021/05/03', '17:29'),
(47, 'sdfg', 'fbg', '2021/05/03', '17:29'),
(48, 'erdft', 'sedrfgh', '2021/05/03', '17:30'),
(49, 'defsrdgtfyhjk', 'asdfgthjnm', '2021/05/04', '10:04'),
(50, 'sdfg', 'asd', '2021/05/04', '10:05'),
(51, 'sedf', 'sdfg', '2021/05/04', '10:06'),
(52, 'esdrfg', 'awsedfg', '2021/05/04', '10:06'),
(53, 'asdfgh', 'asdfvb', '2021/05/04', '10:07'),
(54, 'szdfg', 'asdf', '2021/05/04', '10:08'),
(55, 'a', 'dxfcv', '2021/05/04', '10:09'),
(56, 'sdfgvb', 'sdfg', '2021/05/04', '10:09'),
(57, 'sdfgh', 'drftyh', '2021/05/04', '10:11'),
(58, 'dxcv', 'sdfg', '2021/05/04', '10:11'),
(59, 'sdfgh', 'sdfgh', '2021/05/04', '10:12'),
(60, 'dfghm', 'sdfg', '2021/05/04', '10:12'),
(61, 'asdfg', 'asdfgvb', '2021/05/04', '10:12'),
(62, 'sdf', 'sdfg', '2021/05/04', '10:13'),
(63, 'asdfghb', 'asdfgbn', '2021/05/04', '10:14'),
(64, 'sdcfvb ', 'asdxfcvb ', '2021/05/04', '10:14'),
(65, 'sdfg', 'asdfgvbn ', '2021/05/04', '10:15'),
(66, 'ASDFCGVB', 'DFGVB', '2021/05/04', '10:15'),
(67, 'asdfg', 'sdfgvhbnm ', '2021/05/04', '10:17'),
(68, 'sdfgvbn', 'sdfgvbn', '2021/05/04', '10:17'),
(69, 'adfgh', 'wsdfgbm', '2021/05/04', '10:18'),
(70, 'scdvfgbn', 'asdfgvbn', '2021/05/04', '10:18'),
(71, 'dfgh', 'sdfghbn', '2021/05/04', '10:18'),
(72, 'dfghnm', 'asdfgm', '2021/05/04', '10:18'),
(73, 'sdfgv', 'sdfcgvb', '2021/05/04', '10:19'),
(74, 'sdfgvb', 'asdfcgvbn', '2021/05/04', '10:19'),
(75, 'sdfg', 'sdfgvbn', '2021/05/04', '10:20'),
(76, 'fghjkm', 'wertghjm,', '2021/05/04', '10:20'),
(77, 'awsedrftgh', 'edrfgh', '2021/05/04', '10:20'),
(78, 'sdfg', 'edfg', '2021/05/04', '10:21'),
(79, 'sdfgvbn', 'edfghbnm ', '2021/05/04', '10:21'),
(80, 'sdfghjn', 'esdrfghjn', '2021/05/04', '10:21'),
(81, 'dfghbnm', 'sdfgb', '2021/05/04', '10:21'),
(82, 'drtyu', 'rtfghjk', '2021/05/04', '10:22'),
(83, 'wert', 'wertgh', '2021/05/04', '10:23'),
(84, 'sdfg', 'sdfgh', '2021/05/04', '10:35'),
(85, 'Lakshmi', 'Got accurate results, Thank you', '2021/05/20', '14:36');

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE `health` (
  `id` varchar(10) NOT NULL,
  `result` varchar(10) NOT NULL,
  `score` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`id`, `result`, `score`) VALUES
('101', 'POSITIVE', '77.8%'),
('107', 'NEGATIVE', '19.96%'),
('110', 'POSITIVE', '54.06%');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pwd`, `age`, `gender`, `mobile`, `email`, `address`) VALUES
('101', 'Arun Kumar', 'user@101', 63, 'Male', '9784874567', 'arun367@gmail.com', 'Madhurwada, Visakhapatnam'),
('102', 'LaxmanRao', 'User@102', 49, 'Male', '9876567898', 'laxman30@gmail.com', 'dedrfdgvcxz'),
('103', 'Ramya', 'User@103', 28, 'Female', '6786456787', 'ramy02@gmail.com', 'ergthygfcxdsasdrftghjbn'),
('104', 'RamLaxmi', 'User@104', 49, 'Female', '8987654345', 'ramlaxmi85@gmail.com', 'PM Palem, Visakhapatnam'),
('105', 'Vijaya Laxmi', 'User@105', 46, 'Female', '7659851646', 'vijaya74@gmail.com', 'HP Nagar, Visakhapatnam'),
('106', 'Ratnamala', 'User@106', 60, 'Female', '6543456654', 'ratna50@gmail.com', 'Madhurwada, Visakhapatnam'),
('107', 'Sarika', 'User@107', 43, 'Female', '8765432345', 'sarika637@gmail.com', 'LB Nagar, Hyderabad'),
('108', 'Kuldeep Yadav', 'User@108', 56, 'Male', '8756890987', 'kuldeep736@gmail.com', 'Anderi Road, Mumbai'),
('109', 'Susheel Kumar', 'User@109', 37, 'Male', '8987654323', 'susheel890@gmail.com', 'Neklace road area , Hyderabad'),
('110', 'Arjun Prasad', 'User@110', 49, 'Male', '7987654456', 'arjunpras059@gmail.com', 'Gajuwaka, Visakhapatnam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health`
--
ALTER TABLE `health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
