-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2021 at 05:47 AM
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
(108, 'Virat', 43, 'Male', 'Heart Specialist', '8074740478', 'virat27@gmail.com', 'Apollo Hospital, Benz circle, Vijayawada'),
(109, 'Abhishek', 27, 'Male', 'Cardio Surgeon', '7995106864', 'abhi03@gmail.com', 'Care Hospital, Waltair road, Visakhapatnam'),
(113, 'Srujana', 43, 'Female', 'Heart Surgeon', '9876567898', 'srujana03@gmail.com', 'Padmaja Hospital, Visakhapatanam'),
(114, 'Tarun Sai', 46, 'Male', 'Heart Surgeon', '9876543111', 'tarunsai02@gmail.com', 'Rajiv Gandhi Hospital, Vijayawada');

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
(4, 'Bhaskar', 'Good application, got perfect analysis results for my family members', '2021/04/08', '16:00'),
(5, 'Siri', 'Accurate prediction results, Thank you.', '2021/04/12', '14:54'),
(6, 'Archana', 'Showing perfect results ', '2021/04/21', '18:37'),
(8, 'Sukumar', 'Got accurate result for my parents report ', '2021/04/21', '18:38'),
(86, 'Pawan Kalyan', 'Good application, working well !! \r\nGot accurate results. ', '2021/06/03', '08:05'),
(87, 'Shiva', 'Good application. Got accurate results !!!', '2021/06/18', '08:58'),
(88, 'Ramya', 'Got accuracte result for my parents', '2021/06/18', '13:25'),
(89, 'Abhishek', 'Good application!!', '2021/06/19', '12:25');

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
('101', 'NEGATIVE', '23.46%'),
('103', 'NEGATIVE', '16.91%'),
('104', 'NEGATIVE', '20.98%'),
('106', 'POSITIVE', '76.33%'),
('107', 'NEGATIVE', '19.96%'),
('108', 'POSITIVE', '63.42%'),
('110', 'POSITIVE', '54.06%'),
('111', 'POSITIVE', '54.65%');

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
('102', 'LaxmanRao', 'User@102', 49, 'Male', '9876567898', 'laxman30@gmail.com', 'dedrfdgvcxz'),
('103', 'Ramya', 'User@103', 29, 'Female', '6786456787', 'ramy02@gmail.com', 'ergthygfcxdsasdrftghjbn'),
('104', 'RamLaxmi', 'User@104', 49, 'Female', '8987654345', 'ramlaxmi85@gmail.com', 'PM Palem, Visakhapatnam'),
('105', 'Vijaya Laxmi', 'User@105', 46, 'Female', '7659851646', 'vijaya74@gmail.com', 'HP Nagar, Visakhapatnam'),
('106', 'Ratnamala', 'User@106', 60, 'Female', '6543456654', 'ratna50@gmail.com', 'Madhurwada, Visakhapatnam'),
('107', 'Sarika', 'User@107', 43, 'Female', '8765432345', 'sarika637@gmail.com', 'LB Nagar, Hyderabad'),
('108', 'Kuldeep', 'User@108', 44, 'Male', '8756890976', 'kuldeep76@gmail.com', 'Church Gate Road, Mumbai'),
('109', 'Susheel Kumar', 'User@109', 37, 'Male', '8987654323', 'susheel890@gmail.com', 'Neklace road area , Hyderabad'),
('110', 'Arjun Prasad', 'User@110', 49, 'Male', '7987654456', 'arjunpras059@gmail.com', 'Gajuwaka, Visakhapatnam'),
('111', 'Abhishek', 'User@111', 50, 'Male', '9876545678', 'abhi@gamil.com', 'Visakhapatnam');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
