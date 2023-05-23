-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 09:54 PM
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
  `grade_class_id` int(11) NOT NULL,
  `year` int(10) NOT NULL,
  `term` varchar(255) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `al_marks_tbl`
--

INSERT INTO `al_marks_tbl` (`id`, `std_id`, `grade_class_id`, `year`, `term`, `sub_id`, `marks`) VALUES
(31, 9, 12, 2024, '1st Term', 5, 0),
(32, 9, 12, 2024, '1st Term', 6, 53),
(33, 9, 12, 2024, '1st Term', 7, 58),
(34, 9, 12, 2024, '1st Term', 21, 48),
(35, 10, 12, 2024, '1st Term', 5, 98),
(36, 10, 12, 2024, '1st Term', 6, 94),
(37, 10, 12, 2024, '1st Term', 7, 89),
(38, 10, 12, 2024, '1st Term', 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `al_subjects_tbl`
--

CREATE TABLE `al_subjects_tbl` (
  `al_sub_id` int(3) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `stream_id` int(2) NOT NULL,
  `order_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `al_subjects_tbl`
--

INSERT INTO `al_subjects_tbl` (`al_sub_id`, `sub_id`, `stream_id`, `order_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 3),
(3, 2, 2, 3),
(4, 3, 1, 2),
(5, 3, 2, 2),
(6, 4, 2, 1),
(7, 5, 6, 2),
(8, 5, 3, 3),
(9, 5, 7, 3),
(10, 5, 5, 3),
(11, 21, 2, 3),
(12, 6, 3, 2),
(13, 7, 3, 1),
(14, 8, 5, 1),
(15, 8, 6, 3),
(16, 9, 6, 2),
(17, 10, 6, 1),
(18, 11, 5, 1),
(19, 12, 5, 2),
(20, 13, 5, 1),
(21, 14, 5, 1),
(22, 15, 5, 3),
(23, 16, 5, 2),
(24, 17, 5, 3),
(25, 18, 5, 2),
(26, 19, 5, 2),
(27, 20, 5, 1),
(28, 21, 5, 3),
(29, 22, 5, 1),
(30, 23, 5, 1),
(31, 24, 5, 1),
(32, 25, 5, 1),
(33, 1, 7, 1),
(34, 2, 7, 2),
(35, 5, 4, 0),
(36, 6, 4, 0),
(37, 21, 4, 0),
(38, 26, 4, 0),
(39, 27, 5, 1),
(40, 28, 5, 2),
(47, 21, 7, 3),
(48, 21, 3, 0),
(49, 9, 3, 3),
(50, 16, 6, 1),
(51, 19, 6, 1),
(52, 12, 6, 0),
(53, 28, 6, 0),
(54, 30, 6, 0),
(55, 21, 6, 2),
(56, 17, 6, 2),
(57, 13, 6, 3),
(58, 8, 3, 3),
(60, 29, 1, 4),
(61, 29, 2, 4),
(62, 29, 3, 4),
(63, 29, 4, 4),
(64, 29, 5, 4),
(65, 29, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `al_subject_stream_tbl`
--

CREATE TABLE `al_subject_stream_tbl` (
  `stream_id` int(2) NOT NULL,
  `stream_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `al_subject_stream_tbl`
--

INSERT INTO `al_subject_stream_tbl` (`stream_id`, `stream_name`) VALUES
(1, 'Physical Sciences'),
(2, 'Biosciences'),
(3, 'Engineering Technology'),
(4, 'Bio System Technology'),
(5, 'Arts'),
(6, 'Commerce'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_tbl`
--

INSERT INTO `class_tbl` (`class_id`, `class_name`) VALUES
(1, 'ET 1'),
(2, 'ET 2'),
(3, 'Maths - 1'),
(4, 'Maths - 2'),
(5, 'Bio - 1');

-- --------------------------------------------------------

--
-- Table structure for table `grade_class_tbl`
--

CREATE TABLE `grade_class_tbl` (
  `grade_class_id` int(10) NOT NULL,
  `grade_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `year` varchar(4) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_class_tbl`
--

INSERT INTO `grade_class_tbl` (`grade_class_id`, `grade_id`, `class_id`, `year`, `teacher_id`) VALUES
(11, 2, 1, '2023', 2),
(12, 1, 1, '2024', 8);

-- --------------------------------------------------------

--
-- Table structure for table `grade_subject_tbl`
--

CREATE TABLE `grade_subject_tbl` (
  `id` int(10) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `stream_id` int(5) NOT NULL,
  `year` varchar(4) NOT NULL,
  `sub_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_subject_tbl`
--

INSERT INTO `grade_subject_tbl` (`id`, `grade_id`, `stream_id`, `year`, `sub_id`) VALUES
(168, 1, 3, '2024', 5),
(169, 1, 3, '2024', 6),
(170, 1, 3, '2024', 7),
(171, 1, 3, '2024', 21),
(172, 2, 3, '2023', 5),
(173, 2, 3, '2023', 6),
(174, 2, 3, '2023', 7),
(175, 2, 5, '2023', 5),
(176, 2, 5, '2023', 11),
(177, 2, 5, '2023', 16),
(178, 2, 5, '2023', 17),
(179, 2, 5, '2023', 18),
(180, 2, 5, '2023', 28),
(181, 1, 5, '2024', 5),
(182, 1, 5, '2024', 11),
(183, 1, 5, '2024', 13),
(184, 1, 5, '2024', 14),
(185, 1, 5, '2024', 16),
(186, 1, 5, '2024', 17),
(187, 1, 5, '2024', 18),
(188, 1, 5, '2024', 19),
(189, 1, 5, '2024', 28),
(191, 1, 5, '2024', 23),
(192, 1, 5, '2024', 24),
(193, 1, 5, '2024', 25),
(194, 2, 3, '2023', 29);

-- --------------------------------------------------------

--
-- Table structure for table `grade_tbl`
--

CREATE TABLE `grade_tbl` (
  `grade_id` int(10) NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `teacher_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_tbl`
--

INSERT INTO `grade_tbl` (`grade_id`, `grade_name`, `teacher_id`) VALUES
(1, '12', 2),
(2, '13', 8);

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
  `sec_id` int(5) NOT NULL,
  `sec_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`sec_id`, `sec_name`) VALUES
(1, '1 - 5'),
(2, '6 - 9'),
(3, '10 - 11'),
(4, '12 - 13');

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

--
-- Dumping data for table `student_class_tbl`
--

INSERT INTO `student_class_tbl` (`id`, `std_id`, `grade_class_id`, `sec_id`, `year`) VALUES
(5, 5, 11, 4, '2023'),
(6, 8, 11, 4, '2023'),
(7, 6, 11, 4, '2023'),
(8, 9, 12, 4, '2024'),
(9, 10, 12, 4, '2024');

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `std_id` int(10) NOT NULL,
  `admission_no` varchar(6) NOT NULL,
  `full_name` varchar(255) NOT NULL,
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

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`std_id`, `admission_no`, `full_name`, `name_with_initials`, `address`, `phone_no_1`, `phone_no_2`, `dob`, `email`, `d_o_admission`, `date_added`, `date_updated`, `status`) VALUES
(1, '13736', 'Anthony Edward Stark', 'A. E. Stark', '10880, Malibu Point, California, USA', '123123123', '123123123', '1990-12-27', 'tonystark@ironman.com', '2012-04-12', '2023-05-02', '2023-05-02', 0),
(5, '13737', 'Steven Grant Rogers', 'S. G. Rogers', 'New Jersey, USA', '456456456', '456456456', '1920-04-27', 'captainamerica@avengers.com', '2012-04-27', '2023-05-02', '2023-05-02', 1),
(6, '13738', 'Stephen Strange', 'S. Strange', 'Bleaker Street, New York, USA', '789789789', '789789789', '1989-11-28', 'drstrange@avengers.com', '2018-05-24', '2023-05-02', '2023-05-02', 1),
(8, '13739', 'Anthony Edward Stark', 'A. E. Stark', '10880, Malibu Point, California', '123456789', '123456789', '1980-05-18', 'tony@starkindustries.com', '2012-04-27', '2023-05-21', '2023-05-21', 1),
(9, '13740', 'Clint Barton', 'C. Barton', 'Avengers Facilities, Up State, New York', '4545454545', '4545454545', '1983-06-13', 'hawkeye@avengers.com', '2012-04-27', '2023-05-23', '0000-00-00', 1),
(10, '19741', 'Peter Benjamin Parker ', 'P. B. Parker', 'California, USA', '78787878', '78787878', '1993-10-11', 'spiderman@avengers.com', '2016-07-20', '2023-05-23', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `sub_id` int(10) NOT NULL,
  `sub_code` varchar(255) NOT NULL,
  `sub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`sub_id`, `sub_code`, `sub_name`) VALUES
(1, '', 'Combined Mathematics'),
(2, '', 'Physics '),
(3, '', 'Chemistry'),
(4, '', 'Biology'),
(5, 'ICT', 'Information and Communication Technology'),
(6, 'SFT', 'Science For Technology'),
(7, 'ET', 'Engineering Technology '),
(8, 'Econ', 'Economics'),
(9, 'BS', 'Business Studies'),
(10, 'Acc', 'Accounting'),
(11, 'SIN', 'Sinhala'),
(12, 'EN', 'English'),
(13, 'FRf', 'French'),
(14, 'JP', 'Japanese'),
(15, 'CH', 'Chinese'),
(16, 'GEO', 'Geography'),
(17, 'POL', 'Political Science'),
(18, 'MEDIA', 'Communication & Media Studies'),
(19, 'LOGIC', 'Logic & Scientific Method'),
(20, 'HS', 'Home Science'),
(21, 'AGR', 'Agriculture'),
(22, 'ART', 'Art'),
(23, 'EM', 'Eastern Music'),
(24, 'WM', 'Western Music'),
(25, 'DR', 'Drama'),
(26, 'BST', 'Bio System Technology'),
(27, 'DN', 'Dancing'),
(28, 'BC', 'Buddhist Culture'),
(29, 'GEN', 'General English'),
(30, 'CHR', 'Christianity'),
(31, 'HIS', 'History');

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

--
-- Dumping data for table `teacher_class_tbl`
--

INSERT INTO `teacher_class_tbl` (`id`, `teacher_id`, `grade_class_id`, `year`) VALUES
(2, 2, 11, '2023'),
(3, 8, 12, '2024');

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
  `dob` varchar(10) NOT NULL,
  `teacher_no` varchar(255) NOT NULL,
  `app_date` date NOT NULL,
  `rc_app_date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `app_subject` varchar(100) NOT NULL,
  `sec_id` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `first_name`, `last_name`, `nic`, `dob`, `teacher_no`, `app_date`, `rc_app_date`, `email`, `app_subject`, `sec_id`, `status`) VALUES
(2, 'Dasun', 'Nethsara', '123456789', '2004-08-19', 'T-02', '2022-01-01', '2023-05-26', 'hehe@host.lk', 'Subject 2', 'TECH', 1),
(8, 'Naveen', 'Balasooriya', '789456123', '2004-04-08', 'T-03', '2015-12-02', '2019-02-10', 'gg@gmail.com', 'Subject 4', 'TECH', 1),
(9, 'Lasith', 'Randil', '456789124', '2004-11-15', 'T-04', '2023-05-09', '2023-05-25', 't@host.com', 'Subject 5', 'TECH', 1),
(10, 'kiiiiiii', 'isvluvhnujil', '456123788', '2023-05-09', 'T-05', '2023-05-14', '2023-05-17', 'hg@host.com', 'Subject 1', 'TECH', 1),
(11, 'Dhananjya', 'Lakshan', '11111111', '1990-05-04', 'T-06', '2014-07-05', '2020-11-21', 'djcgh@host.com', 'Subject 1', 'Maths', 1);

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
  `admission_no` varchar(6) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `role_id`, `admission_no`, `nic`) VALUES
(1, 'admin', '$2y$10$vp.zGwQNHDpjfewb3B1eHOBClW2ZshRnZOSQouQhky52vAO6uzglO', 1, 'NULL', '123456789'),
(3, '123456788', '$2y$10$qSN1EAOrm7nK.aihSSVzEuYfFm3Fofg39Yfw7hQWUrRDF9Iq.9r7m', 4, 'NULL', '123456789'),
(9, '789456123', '$2y$10$7g9rAWQVVg1ZfnJqrB3KPeXtCRQKIWkouUrh8/WAN6ofsZjNs0giK', 4, 'NULL', '789456123'),
(10, '456789124', '$2y$10$lz9QJOOja4ZAhew8t.AjDu/oF1ptd8tT63eVMzkavIhhJmmzcurAK', 4, 'NULL', '456789124'),
(11, '456123789', '$2y$10$p0EVNlQmuyL1zWIq5muIQe7ZE6bLHKExSUxjx4rSOb4jhjMU0EG56', 4, 'NULL', '456123788'),
(15, '13736', '$2y$10$XBTqxLNKLkcfL72yXcF6tOhIGT2A6y6L6Uf2OOGuLwKLNoPOl6ekS', 5, '13736', NULL),
(16, '13737', '$2y$10$Os8hHXEJk6Ze1e0BU9bLp.rqyptQd.9/f.cXFuV505AG7.gqTYcdC', 5, '13737', NULL),
(17, '13738', '$2y$10$cDs940Vbi.0JgcsftPmLCemWfamVFJboS.gysNBO1Kk.dVfma/XgO', 5, '13738', NULL),
(20, '13739', '$2y$10$MLJj/mP3zoRaKlu8bdh/xOwzfjE2oy7K9yEl116jZnrPbfRdTbZ5a', 5, '13739', NULL),
(21, '13740', '$2y$10$89pAfmtI8b5xTf3yyHV9vefMJHbgm1BtDoKNV1d8J7jZcrQgpkluq', 5, '13740', NULL),
(22, '19741', '$2y$10$t5dsU0RTWo3Fd4H/RmrZGuWvedqbdDktw9gbQZjwg7g6aDZbiqHUW', 5, '19741', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `1-11_marks_tbl`
--
ALTER TABLE `1-11_marks_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `grade_class_id` (`grade_class_id`);

--
-- Indexes for table `al_subjects_tbl`
--
ALTER TABLE `al_subjects_tbl`
  ADD PRIMARY KEY (`al_sub_id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `al_subject_stream_tbl`
--
ALTER TABLE `al_subject_stream_tbl`
  ADD PRIMARY KEY (`stream_id`);

--
-- Indexes for table `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  ADD PRIMARY KEY (`grade_class_id`),
  ADD KEY `grade_class_id` (`grade_class_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `stream_id` (`stream_id`);

--
-- Indexes for table `grade_tbl`
--
ALTER TABLE `grade_tbl`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `sec_id` (`sec_id`);

--
-- Indexes for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `grade_class_id` (`grade_class_id`),
  ADD KEY `sec_id` (`sec_id`);

--
-- Indexes for table `student_tbl`
--
ALTER TABLE `student_tbl`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `admission_no` (`admission_no`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `grade_class_id` (`grade_class_id`);

--
-- Indexes for table `teacher_subject_tbl`
--
ALTER TABLE `teacher_subject_tbl`
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `sec_id` (`sec_id`),
  ADD KEY `nic` (`nic`);

--
-- Indexes for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `admission_no` (`admission_no`),
  ADD KEY `nic` (`nic`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `al_subjects_tbl`
--
ALTER TABLE `al_subjects_tbl`
  MODIFY `al_sub_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `al_subject_stream_tbl`
--
ALTER TABLE `al_subject_stream_tbl`
  MODIFY `stream_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  MODIFY `grade_class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `grade_tbl`
--
ALTER TABLE `grade_tbl`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  MODIFY `guardian_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `sec_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `std_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `1-11_marks_tbl`
--
ALTER TABLE `1-11_marks_tbl`
  ADD CONSTRAINT `1-11_marks_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `1-11_marks_tbl_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  ADD CONSTRAINT `al_marks_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `al_marks_tbl_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `al_marks_tbl_ibfk_3` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class_tbl` (`grade_class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `al_subjects_tbl`
--
ALTER TABLE `al_subjects_tbl`
  ADD CONSTRAINT `al_subjects_tbl_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `al_subjects_tbl_ibfk_2` FOREIGN KEY (`stream_id`) REFERENCES `al_subject_stream_tbl` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  ADD CONSTRAINT `grade_class_tbl_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_tbl` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_class_tbl_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade_tbl` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_class_tbl_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  ADD CONSTRAINT `grade_subject_tbl_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_subject_tbl_ibfk_2` FOREIGN KEY (`stream_id`) REFERENCES `al_subject_stream_tbl` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_subject_tbl_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade_tbl` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_tbl`
--
ALTER TABLE `grade_tbl`
  ADD CONSTRAINT `grade_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD CONSTRAINT `guardian_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  ADD CONSTRAINT `student_class_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_class_tbl_ibfk_2` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class_tbl` (`grade_class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_class_tbl_ibfk_3` FOREIGN KEY (`sec_id`) REFERENCES `section_tbl` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  ADD CONSTRAINT `teacher_class_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_class_tbl_ibfk_2` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class_tbl` (`grade_class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_subject_tbl`
--
ALTER TABLE `teacher_subject_tbl`
  ADD CONSTRAINT `teacher_subject_tbl_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_tbl` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_subject_tbl_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role_tbl` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tbl_ibfk_2` FOREIGN KEY (`nic`) REFERENCES `teacher_tbl` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
