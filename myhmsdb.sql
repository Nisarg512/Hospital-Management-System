-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 11:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myhmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointmenttb`
--

CREATE TABLE `appointmenttb` (
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `doctor` varchar(30) NOT NULL,
  `docFees` int(5) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `userStatus` int(5) NOT NULL,
  `doctorStatus` int(5) NOT NULL,
  `payment_status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointmenttb`
--

INSERT INTO `appointmenttb` (`pid`, `ID`, `fname`, `lname`, `gender`, `email`, `contact`, `doctor`, `docFees`, `appdate`, `apptime`, `userStatus`, `doctorStatus`, `payment_status`) VALUES
(4, 1, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-14', '10:00:00', 1, 0, 'Pending'),
(4, 2, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '10:00:00', 0, 1, 'Pending'),
(4, 3, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Amit', 1000, '2020-02-19', '03:00:00', 0, 1, 'Pending'),
(11, 4, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'ashok', 500, '2020-02-29', '20:00:00', 1, 1, 'Pending'),
(4, 5, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-02-28', '12:00:00', 1, 1, 'Pending'),
(4, 6, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '2020-02-26', '15:00:00', 0, 1, 'Pending'),
(2, 8, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'Ganesh', 550, '2020-03-21', '10:00:00', 1, 1, 'Pending'),
(5, 9, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'Ganesh', 550, '2020-03-19', '20:00:00', 1, 0, 'Pending'),
(4, 10, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Ganesh', 550, '0000-00-00', '14:00:00', 1, 0, 'Pending'),
(4, 11, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'Dinesh', 700, '2020-03-27', '15:00:00', 1, 1, 'Pending'),
(9, 12, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Kumar', 800, '2020-03-26', '12:00:00', 1, 1, 'Pending'),
(9, 13, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'Tiwary', 450, '2020-03-26', '14:00:00', 1, 1, 'Pending'),
(1, 14, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'Amit', 1000, '2024-10-04', '10:00:00', 1, 1, 'Paid'),
(12, 15, 'nisarg', 'patel', 'Male', 'patelnisarg11223@gmail.com', '1255855557', 'arun', 600, '2024-10-25', '08:00:00', 1, 1, 'Pending'),
(1, 18, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'arun', 600, '2024-11-19', '16:00:00', 1, 1, 'Paid'),
(1, 19, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'vijay', 300, '2024-11-18', '14:00:00', 1, 1, 'Paid'),
(1, 20, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'Ganesh', 550, '2024-11-19', '08:00:00', 1, 1, 'Paid'),
(1, 21, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'arun', 600, '2024-11-18', '16:00:00', 1, 1, 'Paid'),
(1, 22, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ritesh', 150, '2024-11-19', '12:00:00', 1, 1, 'Paid'),
(1, 23, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'Ganesh', 550, '2024-11-23', '16:00:00', 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` int(11) NOT NULL,
  `bed_number` varchar(100) NOT NULL,
  `room_number` varchar(100) NOT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `status` enum('Empty','Occupied') DEFAULT 'Empty'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `bed_number`, `room_number`, `patient_name`, `status`) VALUES
(1, '1', '1', 'jay', 'Empty');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `appointment_id` int(100) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `appointment_id`, `sender`, `message`, `doctor`, `timestamp`) VALUES
(23, 0, 'Ram Kumar', '2', 'ritesh', '2024-11-08 08:47:26'),
(24, 0, 'Ram Kumar', '3', 'ritesh', '2024-11-08 08:47:38'),
(25, 0, 'Ram Kumar', '4', 'ritesh', '2024-11-08 08:48:10'),
(27, 0, 'Alia Bhatt', '5', 'vaishvik', '2024-11-08 08:52:04'),
(28, 0, 'Alia Bhatt', '6', 'vaishvik', '2024-11-08 08:52:16'),
(29, 0, 'Ram Kumar', '66', 'vaishvik', '2024-11-08 08:53:07'),
(30, 0, 'Alia Bhatt', '3', 'vishal', '2024-11-08 08:55:23'),
(31, 0, 'Alia Bhatt', '6', 'vijay', '2024-11-08 09:00:18'),
(32, 0, 'Alia Bhatt', '7', 'vijay', '2024-11-08 09:00:26'),
(33, 0, 'Alia Bhatt', '8', 'vaishvik', '2024-11-08 09:00:36'),
(34, 0, 'Alia Bhatt', '8', 'vijay', '2024-11-08 09:01:04'),
(35, 0, 'Ram Kumar', '9', 'vishal', '2024-11-08 09:01:20'),
(36, 0, 'Alia Bhatt', '5', 'ritesh', '2024-11-08 11:41:15'),
(37, 0, 'Ram Kumar', '512', 'vijay', '2024-11-08 11:42:17'),
(38, 0, 'Alia Bhatt', 'hii', 'nisarg', '2024-11-08 12:04:28'),
(39, 0, 'Alia Bhatt', 'i am nisarg', 'ritesh', '2024-11-08 12:14:52'),
(53, 0, 'doctor', 'n14', 'Alia Bhatt', '2024-11-08 12:09:20'),
(64, 0, 'Ram Kumar', 'nice', 'ritesh', '2024-11-08 17:25:07'),
(65, 0, 'ritesh', '55555', 'Ram Kumar', '2024-11-08 17:27:28'),
(66, 0, 'ritesh', 'hello', 'Ram Kumar', '2024-11-08 17:29:23'),
(67, 0, 'ritesh', 'hello', 'Ram Kumar', '2024-11-08 17:38:34'),
(68, 0, 'Alia Bhatt', '2222', 'ritesh', '2024-11-09 00:53:08'),
(69, 0, 'Ram Kumar', '512', 'ritesh', '2024-11-09 01:31:20'),
(70, 0, 'ritesh', 'send', 'Ram Kumar', '2024-11-09 01:40:56'),
(71, 0, 'Ram Kumar', '1111', 'ritesh', '2024-11-09 07:54:57'),
(72, 0, 'ritesh', '123', 'Ram Kumar', '2024-11-09 07:56:20'),
(73, 0, 'ritesh', 'hello', 'Ram Kumar', '2024-11-09 08:07:01'),
(74, 0, 'ritesh', 'hello123', 'Ram Kumar', '2024-11-09 08:07:14'),
(75, 0, 'ritesh', '1111122222', 'Ram Kumar', '2024-11-09 08:11:33'),
(76, 0, 'ritesh', '125', 'Ram Kumar', '2024-11-09 08:15:24'),
(77, 0, 'Ram Kumar', '11122233334444', 'ritesh', '2024-11-09 08:15:40'),
(78, 0, 'ritesh', 'nisarg', 'Ram Kumar', '2024-11-09 08:16:58'),
(79, 0, 'Ram Kumar', 'nisarg2', 'ritesh', '2024-11-09 08:17:03'),
(80, 0, 'Ram Kumar', 'hii', 'ritesh', '2024-11-09 08:21:56'),
(81, 0, 'Alia Bhatt', '1122', 'ritesh', '2024-11-09 08:29:46'),
(82, 0, 'Alia Bhatt', 'aa', 'ritesh', '2024-11-09 08:31:21'),
(83, 0, 'ritesh', '1212121212121121', 'Ram Kumar', '2024-11-09 08:39:10'),
(84, 0, 'Ram Kumar', 'nice', 'ritesh', '2024-11-09 08:40:00'),
(85, 0, 'ritesh', '11', 'Ram Kumar', '2024-11-09 08:41:57'),
(86, 0, 'Ram Kumar', '22', 'ritesh', '2024-11-09 08:42:04'),
(87, 0, 'Ram Kumar', '33', 'ritesh', '2024-11-09 08:44:27'),
(88, 0, 'Ram Kumar', '44', 'ritesh', '2024-11-09 08:46:09'),
(89, 0, 'ritesh', 'hii', 'Ram Kumar', '2024-11-10 06:02:03'),
(90, 0, 'ritesh', 'hello', 'Ram Kumar', '2024-11-10 06:09:16'),
(91, 0, 'ritesh', '5122', 'Ram Kumar', '2024-11-10 06:11:24'),
(95, 0, 'ritesh', 'n5', 'Ram Kumar', '2024-11-10 07:08:02'),
(96, 0, 'ritesh', 'n6', 'Ram Kumar', '2024-11-10 07:08:53'),
(97, 0, 'ritesh', 'n10', 'Alia Bhatt', '2024-11-10 07:11:13'),
(98, 0, 'Ram Kumar', 'n7', 'ritesh', '2024-11-10 07:13:44'),
(99, 0, 'ritesh', 'hello', 'Ram Kumar', '2024-11-10 07:45:17'),
(100, 0, 'ritesh', 'n5', 'Ram Kumar', '2024-11-10 08:31:45'),
(101, 0, 'Ram Kumar', 'n9', 'ritesh', '2024-11-11 13:29:04'),
(102, 0, 'ritesh', '10', 'Ram Kumar', '2024-11-11 13:30:47'),
(103, 0, 'Ram Kumar', '11', 'ritesh', '2024-11-11 13:30:50'),
(104, 0, 'Ram Kumar', '12', 'arun', '2024-11-11 13:31:02'),
(105, 0, 'Ram Kumar', 'hiiii', 'vaishvik', '2024-11-12 06:20:33'),
(106, 0, 'Ram Kumar', 'hello', 'ritesh', '2024-11-12 06:20:58'),
(107, 0, 'ritesh', 'n11', 'Ram Kumar', '2024-11-12 06:23:40'),
(108, 0, 'ritesh', 'nn', 'Ram Kumar', '2024-11-12 06:23:57'),
(109, 0, 'ritesh', 'nnnnnn', 'Ram Kumar', '2024-11-12 06:24:57'),
(110, 0, 'Ram Kumar', '12112', 'ritesh', '2024-11-12 06:25:07'),
(111, 0, 'ritesh', '11', 'Ram Kumar', '2024-11-12 06:25:49'),
(112, 0, 'Ram Kumar', '1221', 'ritesh', '2024-11-12 06:25:54'),
(113, 0, 'Ram Kumar', '113', 'ritesh', '2024-11-12 06:35:21'),
(114, 0, 'Ram Kumar', '114', 'ritesh', '2024-11-12 06:36:39'),
(115, 0, 'Ram Kumar', '1111', 'ritesh', '2024-11-12 06:37:45'),
(116, 0, 'ritesh', 'ok', 'Ram Kumar', '2024-11-12 06:38:12'),
(117, 0, 'ritesh', '11', 'Ram Kumar', '2024-11-12 06:38:28'),
(118, 0, 'Ram Kumar', '11111', 'ritesh', '2024-11-12 12:12:49'),
(119, 0, 'ritesh', '2222', 'Ram Kumar', '2024-11-12 12:12:54'),
(120, 0, 'Ram Kumar', 'sa', 'ritesh', '2024-11-12 14:14:57'),
(121, 0, 'ritesh', 'asa', 'Ram Kumar', '2024-11-12 14:14:59'),
(122, 0, 'Ram Kumar', 'hii', 'ritesh', '2024-11-13 08:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `contact` varchar(10) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `contact`, `message`) VALUES
('Anu', 'anu@gmail.com', '7896677554', 'Hey Admin'),
(' Viki', 'viki@gmail.com', '9899778865', 'Good Job, Pal'),
('Ananya', 'ananya@gmail.com', '9997888879', 'How can I reach you?'),
('Aakash', 'aakash@gmail.com', '8788979967', 'Love your site'),
('Mani', 'mani@gmail.com', '8977768978', 'Want some coffee?'),
('Karthick', 'karthi@gmail.com', '9898989898', 'Good service'),
('Abbis', 'abbis@gmail.com', '8979776868', 'Love your service'),
('Asiq', 'asiq@gmail.com', '9087897564', 'Love your service. Thank you!'),
('Jane', 'jane@gmail.com', '7869869757', 'I love your service!');

-- --------------------------------------------------------

--
-- Table structure for table `doctb`
--

CREATE TABLE `doctb` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `spec` varchar(50) NOT NULL,
  `docFees` int(10) NOT NULL,
  `status` varchar(10) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctb`
--

INSERT INTO `doctb` (`username`, `password`, `email`, `spec`, `docFees`, `status`) VALUES
('arun', 'arun123', 'arun@gmail.com', 'Cardiologist', 600, 'approved'),
('Dinesh', 'dinesh123', 'dinesh@gmail.com', 'General', 700, 'approved'),
('Ganesh', 'ganesh123', 'ganesh@gmail.com', 'Pediatrician', 550, 'approved'),
('Abbis', 'abbis123', 'abbis@gmail.com', 'Neurologist', 1500, 'approved'),
('Tiwary', 'tiwary123', 'tiwary@gmail.com', 'Pediatrician', 450, 'rejected'),
('vishal', '123', 'vishal@gmail.com', 'Neurologist', 200, 'approved'),
('nisarg', 'nisarg123', 'nisarg@gmail.com', 'Neurologist', 1000, 'rejected'),
('vijay', 'vijay123', 'vijay@gmail.com', 'General', 300, 'approved'),
('vaishvik', 'vaishvik123', 'vaishvik@gmail.com', 'General', 200, 'approved'),
('vaishvik', 'vaishvik123', 'vaishvik@gmail.com', 'orthopadic', 200, 'pending'),
('ritesh', 'ritesh123', 'ritesh@gmail.com', 'Dentalist', 150, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `total_value` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price`) STORED,
  `expiration_date` date DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `item_code`, `category`, `quantity`, `unit_price`, `expiration_date`, `supplier`, `created_at`, `updated_at`) VALUES
(4, '11', '111', '2', 5, 12.00, '2024-11-20', 'unkown', '2024-11-13 02:00:32', '2024-11-13 02:00:32');

-- --------------------------------------------------------

--
-- Table structure for table `patreg`
--

CREATE TABLE `patreg` (
  `pid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cpassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patreg`
--

INSERT INTO `patreg` (`pid`, `fname`, `lname`, `gender`, `email`, `contact`, `password`, `cpassword`) VALUES
(1, 'Ram', 'Kumar', 'Male', 'ram@gmail.com', '9876543210', 'ram123', 'ram123'),
(2, 'Alia', 'Bhatt', 'Female', 'alia@gmail.com', '8976897689', 'alia123', 'alia123'),
(3, 'Shahrukhan', 'khan', 'Male', 'shahrukh@gmail.com', '8976898463', 'shahrukh123', 'shahrukh123'),
(4, 'Kishan', 'Lal', 'Male', 'kishansmart0@gmail.com', '8838489464', 'kishan123', 'kishan123'),
(5, 'Gautam', 'Shankararam', 'Male', 'gautam@gmail.com', '9070897653', 'gautam123', 'gautam123'),
(6, 'Sushant', 'Singh', 'Male', 'sushant@gmail.com', '9059986865', 'sushant123', 'sushant123'),
(7, 'Nancy', 'Deborah', 'Female', 'nancy@gmail.com', '9128972454', 'nancy123', 'nancy123'),
(8, 'Kenny', 'Sebastian', 'Male', 'kenny@gmail.com', '9809879868', 'kenny123', 'kenny123'),
(9, 'William', 'Blake', 'Male', 'william@gmail.com', '8683619153', 'william123', 'william123'),
(10, 'Peter', 'Norvig', 'Male', 'peter@gmail.com', '9609362815', 'peter123', 'peter123'),
(11, 'Shraddha', 'Kapoor', 'Female', 'shraddha@gmail.com', '9768946252', 'shraddha123', 'shraddha123'),
(12, 'nisarg', 'patel', 'Male', 'patelnisarg11223@gmail.com', '1255855557', 'nisarg123', 'nisarg123');

-- --------------------------------------------------------

--
-- Table structure for table `prestb`
--

CREATE TABLE `prestb` (
  `doctor` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `appdate` date NOT NULL,
  `apptime` time NOT NULL,
  `disease` varchar(250) NOT NULL,
  `allergy` varchar(250) NOT NULL,
  `prescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prestb`
--

INSERT INTO `prestb` (`doctor`, `pid`, `ID`, `fname`, `lname`, `appdate`, `apptime`, `disease`, `allergy`, `prescription`) VALUES
('Dinesh', 4, 11, 'Kishan', 'Lal', '2020-03-27', '15:00:00', 'Cough', 'Nothing', 'Just take a teaspoon of Benadryl every night'),
('Ganesh', 2, 8, 'Alia', 'Bhatt', '2020-03-21', '10:00:00', 'Severe Fever', 'Nothing', 'Take bed rest'),
('Kumar', 9, 12, 'William', 'Blake', '2020-03-26', '12:00:00', 'Sever fever', 'nothing', 'Paracetamol -> 1 every morning and night'),
('Tiwary', 9, 13, 'William', 'Blake', '2020-03-26', '14:00:00', 'Cough', 'Skin dryness', 'Intake fruits with more water content'),
('ritesh', 0, 0, '', '', '0000-00-00', '00:00:00', 'cough', 'no allergies', 'take rest'),
('ritesh', 0, 0, '', '', '0000-00-00', '00:00:00', 'no', 'no', 'no'),
('ritesh', 0, 0, '', '', '0000-00-00', '00:00:00', 'not', 'not', 'not'),
('ritesh', 1, 22, 'Ram', 'Kumar', '2024-11-19', '12:00:00', 'n5', 'm2', 'null1'),
('ritesh', 1, 22, 'Ram', 'Kumar', '2024-11-19', '12:00:00', 'n5', 'm2', 'null1');

-- --------------------------------------------------------

--
-- Table structure for table `spectb`
--

CREATE TABLE `spectb` (
  `id` int(11) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spectb`
--

INSERT INTO `spectb` (`id`, `specialization`) VALUES
(1, 'General'),
(5, 'Cardiologist'),
(18, 'Neurologist'),
(19, 'orthopadic'),
(20, 'Dentalist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_code` (`item_code`);

--
-- Indexes for table `patreg`
--
ALTER TABLE `patreg`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `spectb`
--
ALTER TABLE `spectb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmenttb`
--
ALTER TABLE `appointmenttb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `patreg`
--
ALTER TABLE `patreg`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `spectb`
--
ALTER TABLE `spectb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
