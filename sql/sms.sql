-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 08:08 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `1-11_marks_tbl`
--

CREATE TABLE `1-11_marks_tbl` (
  `id` int(10) NOT NULL,
  `std_id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `al_marks_tbl`
--

CREATE TABLE `al_marks_tbl` (
  `id` int(10) NOT NULL,
  `std_id` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  `term` varchar(255) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade_class_tbl`
--

CREATE TABLE `grade_class_tbl` (
  `grade_class_id` int(10) NOT NULL,
  `grade_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade_subject_tbl`
--

CREATE TABLE `grade_subject_tbl` (
  `id` int(10) NOT NULL,
  `sec_id` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade_tbl`
--

CREATE TABLE `grade_tbl` (
  `grade_id` int(10) NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `grade_head` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `guardian_tbl`
--

CREATE TABLE `guardian_tbl` (
  `guardian_id` int(10) NOT NULL,
  `std_id` int(10) NOT NULL,
  `g_name` varchar(255) NOT NULL,
  `g_phone` varchar(255) NOT NULL,
  `g_address` varchar(255) NOT NULL,
  `g_dob` varchar(255) NOT NULL,
  `g_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `sec_id` varchar(255) NOT NULL,
  `sec_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_class_tbl`
--

CREATE TABLE `student_class_tbl` (
  `id` int(10) NOT NULL,
  `std_id` int(10) NOT NULL,
  `grade_class_id` int(10) NOT NULL,
  `sec_id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `std_id` int(10) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `full-name` varchar(255) NOT NULL,
  `name_with_initials` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no_1` varchar(255) NOT NULL,
  `phone_no_2` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `d_o_admission` date NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `sub_id` int(10) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_tbl`
--

CREATE TABLE `teacher_class_tbl` (
  `id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `grade_class_id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_tbl`
--

CREATE TABLE `teacher_subject_tbl` (
  `teacher_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `teacher_id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `teacher_no` varchar(255) NOT NULL,
  `app_date` date NOT NULL,
  `rc_app_date` date NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_role_tbl`
--

CREATE TABLE `user_role_tbl` (
  `role_id` int(1) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role_tbl`
--

INSERT INTO `user_role_tbl` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'Principal'),
(3, 'Section Head'),
(4, 'Teacher'),
(5, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `admission_no` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `role_id`, `admission_no`, `nic`, `status`) VALUES
(1, 'admin', '$2y$10$vp.zGwQNHDpjfewb3B1eHOBClW2ZshRnZOSQouQhky52vAO6uzglO', 1, '', '123456789', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1-11_marks_tbl`
--
ALTER TABLE `1-11_marks_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  ADD PRIMARY KEY (`grade_class_id`);

--
-- Indexes for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_tbl`
--
ALTER TABLE `grade_tbl`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD PRIMARY KEY (`guardian_id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grade_class_id` (`grade_class_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_subject_tbl`
--
ALTER TABLE `teacher_subject_tbl`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `1-11_marks_tbl`
--
ALTER TABLE `1-11_marks_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  MODIFY `grade_class_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_tbl`
--
ALTER TABLE `grade_tbl`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `std_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_subject_tbl`
--
ALTER TABLE `teacher_subject_tbl`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  ADD CONSTRAINT `student_class_tbl_ibfk_1` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class_tbl` (`grade_class_id`);

--
-- Constraints for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  ADD CONSTRAINT `teacher_class_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`);

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role_tbl` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
