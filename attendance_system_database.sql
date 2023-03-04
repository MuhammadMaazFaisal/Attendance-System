-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 06:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance system`
--

-- --------------------------------------------------------

--
-- Table structure for table `adjustment`
--

CREATE TABLE `adjustment` (
  `adjustment_id` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `adjustment_type` varchar(100) NOT NULL,
  `adjustment_date` varchar(50) NOT NULL,
  `adjustment_reason` varchar(255) NOT NULL,
  `requested_on` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adjustment`
--

INSERT INTO `adjustment` (`adjustment_id`, `user_id`, `adjustment_type`, `adjustment_date`, `adjustment_reason`, `requested_on`, `status`) VALUES
(7, 'ETPDJD002', 'Forgot Card', '06/12/2022', 'dasd', '06/12/2022', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `user_id` varchar(50) NOT NULL,
  `leave_id` int(11) NOT NULL,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `leave_type` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`user_id`, `leave_id`, `start_time`, `end_time`, `reason`, `leave_type`, `date`, `duration`, `status`, `employee_name`) VALUES
('ETPDJD002', 55, '13/12/2022', '14/12/2022', 'dsad', 'Full Day', '12/12/2022', '1  day', 'Rejected', 'Muhammad Maaz Faisal');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(255) NOT NULL,
  `n_title` varchar(100) NOT NULL,
  `n_message` varchar(100) NOT NULL,
  `read_status` varchar(50) NOT NULL,
  `n_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `auto` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Signin` varchar(50) NOT NULL,
  `Status` text NOT NULL,
  `Signout_Status` text NOT NULL,
  `Signout` varchar(50) NOT NULL,
  `activity` text NOT NULL,
  `Date` varchar(15) NOT NULL,
  `attendance` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`auto`, `user_id`, `Name`, `Signin`, `Status`, `Signout_Status`, `Signout`, `activity`, `Date`, `attendance`) VALUES
(1667, 'ETPDJD001', 'Musadiq Mustafa', '06:51:46pm', 'On Time', 'Early going', '06:54:05pm', 'Signed Out', '2, 24, 2023', 'Present'),
(1668, 'ETPDJD002', 'Muhammad Maaz Faisal', '06:54:12pm', 'On Time', 'Early going', '06:54:22pm', 'Signed Out', '2, 24, 2023', 'Present'),
(1669, 'ETPDJD001', 'Musadiq Mustafa', '06:54:17pm', 'Welcome Back', 'Early going', '06:54:29pm', 'Signed Out', '2, 24, 2023', '-'),
(1670, 'ETPDJD002', 'Muhammad Maaz Faisal', '06:54:34pm', 'Welcome Back', 'Early going', '06:54:44pm', 'Signed Out', '2, 24, 2023', '-'),
(1671, 'ETPDJD001', 'Musadiq Mustafa', '06:54:39pm', 'Welcome Back', 'Early going', '07:31:51pm', 'Signed Out', '2, 24, 2023', '-'),
(1673, 'ETPDJD001', 'Musadiq Mustafa', '07:31:57pm', 'Welcome Back', 'Early going', '07:44:28pm', 'Signed Out', '2, 24, 2023', '-'),
(1674, 'ETPDJD002', 'Muhammad Maaz Faisal', '07:32:20pm', 'Welcome Back', '-', '', 'Signed in', '2, 24, 2023', '-');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_name`, `department`, `gender`, `email`, `current_address`, `user_access`, `password`, `designation`, `joining_date`, `qualification`, `contact_number`, `cnic`, `date_of_birth`, `martial_status`, `user_image`, `user_status`, `user_shift`, `time_in`, `time_out`) VALUES
('admin', 'Shoaib', 'Administration', 'Male', '', '', 'Administrator', 'admin', 'Director', '', '', '', '', '', 'Married', '', 'Active', '', '', ''),
('ETFSSE001', 'Muhammad Usman Alam', 'Sales', 'Male', 'alamusman693@gmail.com', 'Sector 11-A(A-175), North Karachi', 'Employee', '123', 'Sales Executive', '1/1/2020', 'Bachelors in Ecnomics', '0315-8992956', '42101-3531909-9', '18/11/1998', 'Single', '../uploads/613681group-people-working-out-business-plan-office.jpg', 'Active', 'Full Time', '06:00:00pm', '12:00:00am'),
('ETFSSE002', 'Muhammad Kaif Khan', 'Sales', 'Male', 'muhammadkaifkhan736@gmail.com', 'A97/1 Alfalah Society, Shah Faisal Colony, Karachi', 'Employee', '123', 'Sales Executive', '1/1/2020', 'inter', '0347-6320619', '42201-2535351-7', '01/04/2004', 'Single', '../uploads/613681group-people-working-out-business-plan-office.jpg', 'Active', 'Full Time', '07:00:00pm', '01:00:00am'),
('ETFSSE003', 'Syed Muhammad Tahir Hussaini', 'Sales', 'Male', 'syedtahirhussain773@gmail.com', 'Flat No 21 A Saleem square near Shama shopping center', 'Employee', '123', 'Sales Executive', '1/1/2020', 'Bachelors in Computer Science', '03432077567', '42201-3188317-7', '02/10/1991', 'Single', '../uploads/401620group-people-working-out-business-plan-office.jpg', 'Active', 'Full Time', '06:00:00pm', '01:00:00am'),
('ETPDJD001', 'Musadiq Mustafa', 'Development', 'Male', 'musadiqmustafa461@gmail.com', 'Flat 1005, 10th floor, Pearl Classic', 'Employee', '123', 'Junior Developer', '1/1/2020', 'Bachelors in Computer Science', '0341-7181026', '42101-2188151-5', '14/09/2001', 'Single', '../uploads/180402group-people-working-out-business-plan-office.jpg', 'Active', 'Part Time', '08:00:00pm', '02:00:00am'),
('ETPDJD002', 'Muhammad Maaz Faisal', 'Development', 'Male', 'm.maazfaisal0301@gmail.com', 'R-380, Block B, Saima Arabian Villas, Karachi', 'Employee', '123', 'Junior Developer', '1/1/2020', 'Bachelors in Computer Science', '0312-2345662', '42101-9525558-5', '09/02/2002', 'Single', '../uploads/695473group-people-working-out-business-plan-office.jpg', 'Active', 'Part Time', '08:00:00pm', '02:00:00am'),
('ETPGSGD001', 'Usama Raza', 'Graphics', 'Male', 'usamaraza332@gmail.com', 'B-41 block-19 f.b area roshan bagh society karachi pakistan', 'Employee', '123', 'Senior Graphic Designer', '1/1/2020', 'Inter     ', '0303-2600430', '42101-4859629-5', '13/04/1998', 'Single', '../uploads/849297group-people-working-out-business-plan-office.jpg', 'Active', 'Part Time', '06:00:00pm', '12:00:00am'),
('ETRSSH004', 'Syed Aaqib Ali', 'Sales', 'Male', 'syedaaqibali64@gmail.com', 'R-65,66 Block I, North Nazimabad, Karachi', 'Employee', '123', 'Sales Head', '1/1/2020', 'BSCS from Hamdard University', '03369066949', '42101-4783203-1', '05-12-2003', 'Single', '../uploads/252213group-people-working-out-business-plan-office.jpg', 'Active', 'Remote', '06:00:00pm', '12:00:00am');

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
  MODIFY `adjustment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `n_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `auto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1675;

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
