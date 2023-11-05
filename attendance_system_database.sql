-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2023 at 10:10 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustment`
--

CREATE TABLE `adjustment` (
  `adjustment_id` int NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `adjustment_type` varchar(100) NOT NULL,
  `adjustment_date` varchar(50) NOT NULL,
  `adjustment_reason` varchar(255) NOT NULL,
  `requested_on` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `employee_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `a_id` int NOT NULL,
  `a_message` varchar(255) NOT NULL,
  `a_date` varchar(50) NOT NULL,
  `a_title` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `read_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `user_id` varchar(50) NOT NULL,
  `leave_id` int NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int NOT NULL,
  `n_title` varchar(100) NOT NULL,
  `n_message` varchar(100) NOT NULL,
  `read_status` varchar(50) NOT NULL,
  `n_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `auto` int NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Signin` varchar(50) NOT NULL,
  `Status` text NOT NULL,
  `Signout_Status` text NOT NULL,
  `Signout` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `Date` varchar(15) NOT NULL,
  `attendance` text NOT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `overtime` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`auto`, `user_id`, `Name`, `Signin`, `Status`, `Signout_Status`, `Signout`, `activity`, `Date`, `attendance`, `hours`, `overtime`) VALUES
(2638, 'ETPDJD001', 'Musadiq Mustafa', '04:16:31pm', 'On Time', 'Hours Completed', '01:33:05am', 'Signed Out', '10, 30, 2023', 'Present', '10:3:56', '7:0:0'),
(2639, 'ETPDJD002', 'Muhammad Maaz ', '04:16:38pm', 'On Time', 'Half day', '04:21:52pm', 'Signed Out', '10, 30, 2023', 'Present', '0:5:14', NULL),
(2640, 'ETPDJD003', 'Abdul Rafay', '04:16:58pm', 'On Time', 'Half day', '01:19:22am', 'Signed Out', '10, 30, 2023', 'Present', '10:9:43', '7:0:0'),
(2641, 'ETPDJD004', 'Amash', '04:17:07pm', 'On Time', 'Half day', '01:20:23am', 'Signed Out', '10, 30, 2023', 'Present', '10:7:9', NULL),
(2642, 'ETPGSGD001', 'Usama Raza', '04:17:18pm', 'On Time', 'Half day', '04:03:40am', 'Signed Out', '10, 30, 2023', 'Present', '0:53:49', '7:0:0'),
(2643, 'ETPSSE006', 'Yahya Rafiq', '04:17:25pm', 'On Time', 'Over Time', '01:22:32am', 'Signed Out', '10, 30, 2023', 'Present', '9:58:14', '7:0:0'),
(2644, 'ETPSSE007', 'Syed Ebad', '04:17:30pm', 'On Time', 'Over Time', '01:24:49am', 'Signed Out', '10, 30, 2023', 'Present', '7:40:49', NULL),
(2681, 'ETPSSE009', 'Shanzeh Rizvi', '-', '-', 'Half day', '-', '-', '10, 30, 2023', 'Absent', '22:19:46', NULL),
(2682, 'ETPSSE010', 'Tuba', '-', '-', 'Early going', '-', '-', '10, 30, 2023', 'Absent', '6:0:45', NULL),
(2683, 'ETPSSE011', 'Bisma ', '-', '-', 'Early going', '-', '-', '10, 30, 2023', 'Absent', '5:51:58', NULL),
(2685, 'ETPSSM005', 'Syed Muhammad Mohib', '-', '-', 'Over Time', '-', '-', '10, 30, 2023', 'Absent', '8:33:11', NULL),
(2714, 'ETPDJD001', 'Musadiq Mustafa', '04:21:44pm', 'On Time', 'Half day', '01:18:15am', 'Signed Out', '10, 1, 2023', 'Present', '10:3:56', '7:0:0'),
(2716, 'ETPDJD004', 'Amash', '04:22:12pm', 'On Time', 'Half day', '01:26:14am', 'Signed Out', '11, 1, 2023', 'Present', '10:7:9', NULL),
(2717, 'ETPGSGD001', 'Usama Raza', '04:22:22pm', 'On Time', 'Half day', '01:27:20am', 'Signed Out', '11, 1, 2023', 'Present', '0:53:49', '7:0:0'),
(2852, 'ETPSSE007', 'Syed Ebad', '04:09:45pm', 'On Time', 'Over Time', '01:22:32am', 'Signed Out', '11, 1, 2023', 'Present', '7:40:49', NULL),
(2854, 'ETPSSE008', 'Rahim', '04:31:16pm', 'On Time', 'Over Time', '01:31:44am', 'Signed Out', '11, 1, 2023', 'Present', '9:40:53', NULL),
(2855, 'ETPSSE009', 'Shanzeh Rizvi', '04:31:26pm', 'On Time', 'Half day', '01:34:11am', 'Signed Out', '11, 1, 2023', 'Present', '22:19:46', NULL),
(2895, 'ETPSSE010', 'Tuba', '07:42:11pm', 'On Time', 'Early going', '01:42:56am', 'Signed Out', '11, 1, 2023', 'Present', '6:0:45', NULL),
(2919, 'ETPSSM005', 'Syed Muhammad Mohib', '05:47:33pm', 'On Time', 'Over Time', '02:20:44am', 'Signed Out', '11, 1, 2023', 'Present', '8:33:11', NULL),
(2920, 'ETPDJD003', 'Abdul Rafay', '-', '-', 'Half day', '-', '-', '11, 1, 2023', 'Absent', '10:9:43', '7:0:0'),
(2921, 'ETPSSE006', 'Yahya Rafiq', '-', '-', 'Over Time', '-', '-', '11, 1, 2023', 'Absent', '9:58:14', '03:12:25'),
(2922, 'ETPSSE011', 'Bisma ', '-', '-', '-', '-', '-', '11, 1, 2023', 'Absent', '-', NULL),
(2924, 'ETPDJD004', 'Amash', '06:30:09pm', 'On Time', 'Half day', '01:34:38am', 'Signed Out', '11, 2, 2023', 'Present', '10:7:9', NULL),
(2925, 'ETPGSGD001', 'Usama Raza', '06:30:19pm', 'On Time', 'Half day', '01:35:10am', 'Signed Out', '11, 2, 2023', 'Present', '0:53:49', '7:0:0'),
(2926, 'ETPSSE007', 'Syed Ebad', '06:30:23pm', 'On Time', 'Hours Completed', '01:37:18am', 'Signed Out', '11, 2, 2023', 'Present', '7:40:49', NULL),
(2927, 'ETPSSE008', 'Rahim', '06:30:29pm', 'On Time', 'Over Time', '04:50:09pm', 'Signed Out', '10, 2, 2023', 'Present', '9:40:53', NULL),
(2928, 'ETPSSE009', 'Shanzeh Rizvi', '06:30:34pm', 'On Time', 'Half day', '04:50:20pm', 'Signed Out', '11, 2, 2023', 'Present', '22:19:46', NULL),
(2929, 'ETPDJD003', 'Abdul Rafay', '06:30:39pm', 'On Time', 'Half day', '01:41:17am', 'Signed Out', '11, 2, 2023', 'Present', '6:20:41', '11:20:41'),
(2930, 'ETPSSE006', 'Yahya Rafiq', '06:30:44pm', 'On Time', 'Over Time', '01:43:21am', 'Signed Out', '11, 2, 2023', 'Present', '9:58:14', '01:06:32'),
(2934, 'ETPSSE010', 'Tuba', '-', '-', '-', '-', '-', '11, 2, 2023', 'Absent', '-', NULL),
(2935, 'ETPSSE011', 'Bisma ', '-', '-', '-', '-', '-', '11, 2, 2023', 'Absent', '-', NULL),
(2936, 'ETPSSM005', 'Syed Muhammad Mohib', '-', '-', '-', '-', '-', '11, 2, 2023', 'Absent', '-', NULL),
(3024, 'ETPDJD003', 'Abdul Rafay', '05:22:20pm', 'On Time', 'Over Time', '01:46:51am', 'Signed Out', '11, 3, 2023', 'Present', '6:6:25', '12:06:25'),
(3025, 'ETPDJD001', 'Musadiq Mustafa', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3026, 'ETPDJD004', 'Amash', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3027, 'ETPGSGD001', 'Usama Raza', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3028, 'ETPSSE006', 'Yahya Rafiq', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3029, 'ETPSSE007', 'Syed Ebad', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3030, 'ETPSSE008', 'Rahim', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3031, 'ETPSSE009', 'Shanzeh Rizvi', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3032, 'ETPSSE010', 'Tuba', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3033, 'ETPSSE011', 'Bisma ', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3034, 'ETPSSM005', 'Syed Muhammad Mohib', '-', '-', '-', '-', '-', '11, 3, 2023', 'Absent', '-', NULL),
(3036, 'ETPDJD003', 'Abdul Rafay', '04:10:15pm', 'On Time', 'Over Time', '12:08:33am', 'Signed Out', '11, 4, 2023', 'Present', '7:58:18', '01:58:18'),
(3037, 'ETPDJD001', 'Musadiq Mustafa', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3038, 'ETPDJD004', 'Amash', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3039, 'ETPGSGD001', 'Usama Raza', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3040, 'ETPSSE006', 'Yahya Rafiq', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3041, 'ETPSSE007', 'Syed Ebad', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3042, 'ETPSSE008', 'Rahim', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3043, 'ETPSSE009', 'Shanzeh Rizvi', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3044, 'ETPSSE010', 'Tuba', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3045, 'ETPSSE011', 'Bisma ', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3046, 'ETPSSM005', 'Syed Muhammad Mohib', '-', '-', '-', '-', '-', '11, 4, 2023', 'Absent', '-', NULL),
(3047, 'ETPDJD003', 'Abdul Rafay', '05:10:38pm', 'On Time', 'Over Time', '01:04:50am', 'Signed Out', '11, 5, 2023', 'Present', '7:54:12', '01:54:12'),
(3048, 'ETPDJD001', 'Musadiq Mustafa', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3049, 'ETPDJD004', 'Amash', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3050, 'ETPGSGD001', 'Usama Raza', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3051, 'ETPSSE006', 'Yahya Rafiq', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3052, 'ETPSSE007', 'Syed Ebad', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3053, 'ETPSSE008', 'Rahim', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3054, 'ETPSSE009', 'Shanzeh Rizvi', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3055, 'ETPSSE010', 'Tuba', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3056, 'ETPSSE011', 'Bisma ', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL),
(3057, 'ETPSSM005', 'Syed Muhammad Mohib', '-', '-', '-', '-', '-', '11, 5, 2023', 'Absent', '-', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `current_address` varchar(255) NOT NULL,
  `user_access` varchar(100) NOT NULL,
  `password` varchar(15) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `date_of_birth` varchar(100) NOT NULL,
  `martial_status` varchar(100) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_shift` varchar(50) NOT NULL,
  `time_in` varchar(50) NOT NULL,
  `time_out` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_name`, `department`, `gender`, `email`, `current_address`, `user_access`, `password`, `designation`, `joining_date`, `qualification`, `contact_number`, `cnic`, `date_of_birth`, `martial_status`, `user_image`, `user_status`, `user_shift`, `time_in`, `time_out`) VALUES
('admin', 'Shahrukh', 'Administration', 'Male', '', '', 'Administrator', 'admin', 'Director', '', '', '', '', '', 'Married', '', 'Active', '', '', ''),
('admin123', 'user123', 'Administration', 'Male', '', '', 'Administrator', 'mrlonely000', 'Director', '', '', '', '', '', 'Married', '', 'Active', '', '', ''),
('ETFSSE001', 'Muhammad Usman Alam', 'Sales', 'Male', 'alamusman693@gmail.com', 'Sector 11-A(A-175), North Karachi', 'Employee', '123', 'Sales Executive', '1/1/2020', 'Bachelors in Ecnomics', '0315-8992956', ' 42101-3531909-9', '18/11/1998', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Full Time', '06:00:00pm', '12:00:00am'),
('ETFSSE002', 'Muhammad Kaif Khan', 'Sales', 'Male', 'muhammadkaifkhan736@gmail.com', 'A97/1 Alfalah Society, Shah Faisal Colony, Karachi', 'Employee', '123', 'Sales Executive', '1/1/2020', 'inter', '0347-6320619', ' 42201-2535351-7', '01/04/2004', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Full Time', '07:00:00pm', '02:00:00am'),
('ETFSSE003', 'Syed Muhammad Tahir Hussaini', 'Sales', 'Male', 'syedtahirhussain773@gmail.com', 'Flat No 21 A Saleem square near Shama shopping center', 'Employee', '123', 'Sales Executive', '1/1/2020', 'Bachelors in Computer Science', '03432077567', ' 42201-3188317-7', '02/10/1991', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Full Time', '07:00:00pm', '02:00:00am'),
('ETPDJD001', 'Musadiq Mustafa', 'Development', 'Male', 'musadiqmustafa461@gmail.com', 'Flat 1005, 10th floor, Pearl Classic', 'Employee', '123', 'Junior Developer', '1/1/2020', 'Bachelors in Computer Science', '0341-7181026', '42101-2188151-5', '14/09/2001', 'Single', '../uploads/Rfjphc.png', 'Active', 'Part Time', '08:00:00pm', '02:00:00am'),
('ETPDJD002', 'Muhammad Maaz ', 'Development', 'Male', 'm.maazfaisal0301@gmail.com', 'R-380, Block B, Saima Arabian Villas, Karachi', 'Employee', '123', 'Junior Developer', '1/1/2020', 'Bachelors in Computer Science', '0312-2345662', '  42101-9525558-5', '09/02/2002', 'Single', '../uploads/722299astronaut.jpg', 'Inactive', 'Part Time', '05:00:00pm', '01:15:00am'),
('ETPDJD003', 'Abdul Rafay', 'Development', 'Male', 'abdulrafay99910@gmail.com', '', 'Employee', '123456', 'Senior Developer', '9/1/2023', 'BSCS', '03102214648', '     42501-5288304-9', '05/24/2001', 'Single', '../uploads/5406631.png', 'Active', 'Part Time', '08:00:00pm', '01:00:00am'),
('ETPDJD004', 'Amash', 'Development', 'Male', '', '', 'Employee', '12345678', 'Junior Developer', '6/1/2023', 'BSCS from UIT University', '', '', '', 'Single', '../uploads/729132bitcoin.jpg', 'Active', 'Part Time', '07:00:00pm', '01:00:00am'),
('ETPGSGD001', 'Usama Raza', 'Graphics', 'Male', 'usamaraza332@gmail.com', 'B-41 block-19 f.b area roshan bagh society karachi pakistan', 'Employee', '123', 'Senior Graphic Designer', '1/1/2020', 'Inter     ', '0303-2600430', '42101-4859629-5', '13/04/1998', 'Single', '../uploads/Rfjphc.png', 'Active', 'Part Time', '06:00:00pm', '12:00:00am'),
('ETPSSE006', 'Yahya Rafiq', 'Sales', 'Male', '', '', 'Employee', '12345678', 'Sales Executive', '5/1/2023', 'ADC ', '0318-3807460', '', '30/12/1999', 'Single', '../uploads/892924bitcoin.jpg', 'Active', 'Part Time', '05:15:00pm', '05:00:00am'),
('ETPSSE007', 'Syed Ebad', 'Sales', 'Male', '', '', 'Employee', '12345678', 'Sales Executive', '6/1/2023', '', '0330-3426719', '', '', 'Single', '../uploads/282673bitcoin.jpg', 'Active', 'Part Time', '05:00:00pm', '06:00:00am'),
('ETPSSE008', 'Rahim', 'Sales', 'Male', '', '', 'Employee', '12345678', 'Sales Executive', '10/1/2023', '', '', ' ', '', 'Single', '../uploads/386826bitcoin.jpg', 'Active', 'Part Time', '05:00:00pm', '06:00:00am'),
('ETPSSE009', 'Shanzeh Rizvi', 'Sales', 'Female', '', '', 'Employee', '12345678', 'Sales Executive', '10/1/2023', '', '', '', '', 'Single', '../uploads/694566bitcoin.jpg', 'Active', 'Part Time', '05:15:00pm', '06:00:00am'),
('ETPSSE010', 'Tuba', 'Sales', 'Female', '', '', 'Employee', '12345678', 'Sales Executive', '10/1/2023', '', '', '', '', 'Single', '../uploads/802642bitcoin.jpg', 'Active', 'Part Time', '05:15:00pm', '05:00:00pm'),
('ETPSSE011', 'Bisma ', 'Sales', 'Female', '', '', 'Employee', '12345678', 'Sales Executive', '10/1/2023', '', '', '', '', 'Single', '../uploads/839231bitcoin.jpg', 'Active', 'Part Time', '05:15:00pm', '05:00:00am'),
('ETPSSM005', 'Syed Muhammad Mohib', 'Sales', 'Male', '', '', 'Employee', '12345678', 'Sales Manager', '9/1/2022', 'BSCS', '0347-2499421', '', '', 'Single', '../uploads/29407bitcoin.jpg', 'Active', 'Part Time', '05:00:00pm', '05:00:00am'),
('ETRSSH004', 'Syed Aaqib Ali', 'Sales', 'Male', 'syedaaqibali64@gmail.com', 'R-65,66 Block I, North Nazimabad, Karachi', 'Employee', '123', 'Sales Head', '1/1/2020', 'BSCS from Hamdard University', '03369066949', ' 42101-4783203-1', '05-12-2003', 'Single', '../uploads/Rfjphc.png', 'Inactive', 'Remote', '07:00:00pm', '02:00:00am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adjustment`
--
ALTER TABLE `adjustment`
  ADD PRIMARY KEY (`adjustment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`auto`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adjustment`
--
ALTER TABLE `adjustment`
  MODIFY `adjustment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `a_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `auto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3058;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adjustment`
--
ALTER TABLE `adjustment`
  ADD CONSTRAINT `adjustment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `signin`
--
ALTER TABLE `signin`
  ADD CONSTRAINT `signin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
