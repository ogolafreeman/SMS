-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 01:09 PM
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
  `std_id` int(6) NOT NULL,
  `year` varchar(5) NOT NULL,
  `term` varchar(9) NOT NULL,
  `sub_id` int(3) NOT NULL,
  `marks` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `al_absent_tbl`
--

CREATE TABLE `al_absent_tbl` (
  `id` int(10) NOT NULL,
  `std_id` int(6) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `class_id` int(2) NOT NULL,
  `year` int(5) NOT NULL,
  `term` varchar(9) NOT NULL,
  `sub_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `al_marks_tbl`
--

CREATE TABLE `al_marks_tbl` (
  `id` int(10) NOT NULL,
  `std_id` int(6) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `class_id` int(2) NOT NULL,
  `year` int(5) NOT NULL,
  `term` varchar(9) NOT NULL,
  `sub_id` int(3) NOT NULL,
  `marks` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `al_marks_tbl`
--

INSERT INTO `al_marks_tbl` (`id`, `std_id`, `grade_id`, `class_id`, `year`, `term`, `sub_id`, `marks`) VALUES
(477, 11, 12, 9, 2023, '1st Term', 1, '87'),
(478, 11, 12, 9, 2023, '1st Term', 2, '81'),
(479, 11, 12, 9, 2023, '1st Term', 3, '79'),
(480, 11, 12, 9, 2023, '1st Term', 29, '67'),
(481, 12, 12, 9, 2023, '1st Term', 1, '45'),
(482, 12, 12, 9, 2023, '1st Term', 2, '76'),
(483, 12, 12, 9, 2023, '1st Term', 3, '76'),
(484, 12, 12, 9, 2023, '1st Term', 29, '47'),
(485, 13, 12, 9, 2023, '1st Term', 1, '45'),
(486, 13, 12, 9, 2023, '1st Term', 2, '78'),
(487, 13, 12, 9, 2023, '1st Term', 3, '65'),
(488, 13, 12, 9, 2023, '1st Term', 29, '75'),
(489, 11, 12, 9, 2023, '2nd Term', 1, '84'),
(490, 11, 12, 9, 2023, '2nd Term', 2, '98'),
(491, 11, 12, 9, 2023, '2nd Term', 3, '87'),
(492, 11, 12, 9, 2023, '2nd Term', 29, '67'),
(493, 12, 12, 9, 2023, '2nd Term', 1, '45'),
(494, 12, 12, 9, 2023, '2nd Term', 2, '78'),
(495, 12, 12, 9, 2023, '2nd Term', 3, '65'),
(496, 12, 12, 9, 2023, '2nd Term', 29, '47'),
(497, 13, 12, 9, 2023, '2nd Term', 1, '75'),
(498, 13, 12, 9, 2023, '2nd Term', 2, '78'),
(499, 13, 12, 9, 2023, '2nd Term', 3, '98'),
(500, 13, 12, 9, 2023, '2nd Term', 29, '87'),
(501, 11, 12, 9, 2023, '3rd Term', 1, '82'),
(502, 11, 12, 9, 2023, '3rd Term', 2, '94'),
(503, 11, 12, 9, 2023, '3rd Term', 3, '78'),
(504, 11, 12, 9, 2023, '3rd Term', 29, '61'),
(505, 12, 12, 9, 2023, '3rd Term', 1, '45'),
(506, 12, 12, 9, 2023, '3rd Term', 2, '78'),
(507, 12, 12, 9, 2023, '3rd Term', 3, '67'),
(508, 12, 12, 9, 2023, '3rd Term', 29, '71'),
(509, 13, 12, 9, 2023, '3rd Term', 1, '67'),
(510, 13, 12, 9, 2023, '3rd Term', 2, '87'),
(511, 13, 12, 9, 2023, '3rd Term', 3, '78'),
(512, 13, 12, 9, 2023, '3rd Term', 29, '88');

-- --------------------------------------------------------

--
-- Table structure for table `al_marks_update_tbl`
--

CREATE TABLE `al_marks_update_tbl` (
  `id` int(10) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `term` varchar(9) NOT NULL,
  `year` year(4) NOT NULL,
  `entered_by` int(10) NOT NULL,
  `released_date` varchar(20) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `last_updated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `al_subjects_tbl`
--

CREATE TABLE `al_subjects_tbl` (
  `al_sub_id` int(3) NOT NULL,
  `sub_id` int(3) NOT NULL,
  `stream_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `al_subjects_tbl`
--

INSERT INTO `al_subjects_tbl` (`al_sub_id`, `sub_id`, `stream_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 1),
(5, 3, 2),
(6, 4, 2),
(7, 5, 6),
(8, 5, 3),
(9, 5, 7),
(10, 5, 5),
(11, 21, 2),
(12, 6, 3),
(13, 7, 3),
(14, 8, 5),
(15, 8, 6),
(16, 9, 6),
(17, 10, 6),
(18, 11, 5),
(19, 12, 5),
(20, 13, 5),
(21, 14, 5),
(22, 15, 5),
(23, 16, 5),
(24, 17, 5),
(25, 18, 5),
(26, 19, 5),
(27, 20, 5),
(28, 21, 5),
(29, 22, 5),
(30, 23, 5),
(31, 24, 5),
(32, 25, 5),
(33, 1, 7),
(34, 2, 7),
(35, 5, 4),
(36, 6, 4),
(37, 21, 4),
(38, 26, 4),
(39, 27, 5),
(40, 28, 5),
(47, 21, 7),
(48, 21, 3),
(49, 9, 3),
(50, 16, 6),
(51, 19, 6),
(52, 12, 6),
(53, 28, 6),
(54, 30, 6),
(55, 21, 6),
(56, 17, 6),
(57, 13, 6),
(58, 8, 3),
(60, 29, 1),
(61, 29, 2),
(62, 29, 3),
(63, 29, 4),
(64, 29, 5),
(65, 29, 6);

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
-- Table structure for table `class_stream_tbl`
--

CREATE TABLE `class_stream_tbl` (
  `id` int(11) NOT NULL,
  `class_id` int(2) NOT NULL,
  `stream_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_stream_tbl`
--

INSERT INTO `class_stream_tbl` (`id`, `class_id`, `stream_id`) VALUES
(1, 9, 1),
(2, 10, 1),
(3, 11, 2),
(4, 12, 2),
(5, 13, 3),
(6, 14, 3),
(7, 15, 6),
(8, 16, 6),
(9, 17, 5),
(10, 18, 5);

-- --------------------------------------------------------

--
-- Table structure for table `class_tbl`
--

CREATE TABLE `class_tbl` (
  `class_id` int(10) NOT NULL,
  `class_name` varchar(60) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_tbl`
--

INSERT INTO `class_tbl` (`class_id`, `class_name`, `type`) VALUES
(1, 'A', 0),
(2, 'B', 0),
(3, 'C', 0),
(4, 'D', 0),
(5, 'E', 0),
(6, 'F', 0),
(7, 'G', 0),
(8, 'H', 0),
(9, 'Maths - 1', 1),
(10, 'Maths - 2', 1),
(11, 'Bio - 1', 1),
(12, 'Bio - 2', 1),
(13, 'ET - 1', 1),
(14, 'ET - 2', 1),
(15, 'Com - 1', 1),
(16, 'Com - 2', 1),
(17, 'Art - 1', 1),
(18, 'Art - 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade_class_tbl`
--

CREATE TABLE `grade_class_tbl` (
  `grade_class_id` int(10) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `class_id` int(2) NOT NULL,
  `year` varchar(5) NOT NULL,
  `staff_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_class_tbl`
--

INSERT INTO `grade_class_tbl` (`grade_class_id`, `grade_id`, `class_id`, `year`, `staff_id`) VALUES
(23, 13, 9, '2023', 14),
(24, 13, 11, '2023', 15),
(25, 13, 13, '2023', 16),
(26, 13, 15, '2023', 17),
(27, 13, 17, '2023', 18);

-- --------------------------------------------------------

--
-- Table structure for table `grade_subject_tbl`
--

CREATE TABLE `grade_subject_tbl` (
  `id` int(10) NOT NULL,
  `grade_id` int(2) NOT NULL,
  `stream_id` int(1) NOT NULL,
  `year` varchar(5) NOT NULL,
  `sub_id` int(3) NOT NULL,
  `order_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_subject_tbl`
--

INSERT INTO `grade_subject_tbl` (`id`, `grade_id`, `stream_id`, `year`, `sub_id`, `order_id`) VALUES
(255, 13, 1, '2023', 1, 1),
(256, 13, 1, '2023', 2, 2),
(257, 13, 1, '2023', 3, 3),
(258, 13, 1, '2023', 29, 4),
(259, 13, 2, '2023', 2, 2),
(260, 13, 2, '2023', 3, 3),
(261, 13, 2, '2023', 4, 1),
(262, 13, 2, '2023', 29, 4),
(263, 13, 3, '2023', 5, 3),
(264, 13, 3, '2023', 6, 2),
(265, 13, 3, '2023', 7, 1),
(266, 13, 3, '2023', 29, 4),
(267, 13, 5, '2023', 5, 6),
(268, 13, 5, '2023', 11, 1),
(269, 13, 5, '2023', 16, 4),
(270, 13, 5, '2023', 17, 2),
(271, 13, 5, '2023', 18, 3),
(272, 13, 5, '2023', 19, 5),
(273, 13, 5, '2023', 28, 7),
(274, 13, 5, '2023', 29, 8),
(275, 13, 6, '2023', 5, 4),
(276, 13, 6, '2023', 8, 3),
(277, 13, 6, '2023', 9, 2),
(278, 13, 6, '2023', 10, 1),
(279, 13, 6, '2023', 29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `grade_tbl`
--

CREATE TABLE `grade_tbl` (
  `grade_id` int(10) NOT NULL,
  `grade_name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_tbl`
--

INSERT INTO `grade_tbl` (`grade_id`, `grade_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13');

-- --------------------------------------------------------

--
-- Table structure for table `guardian_tbl`
--

CREATE TABLE `guardian_tbl` (
  `guardian_id` int(10) NOT NULL,
  `std_id` int(10) NOT NULL,
  `g_name` varchar(100) NOT NULL,
  `g_phone` varchar(12) NOT NULL,
  `g_address` varchar(255) NOT NULL,
  `g_dob` varchar(12) NOT NULL,
  `g_job` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message_tbl`
--

CREATE TABLE `message_tbl` (
  `id` int(11) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `sec_id` int(5) NOT NULL,
  `sec_name` varchar(10) NOT NULL
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
-- Table structure for table `staff_tbl`
--

CREATE TABLE `staff_tbl` (
  `staff_id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `staff_no` varchar(10) NOT NULL,
  `app_date` date NOT NULL,
  `rc_app_date` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `app_subject` varchar(3) NOT NULL,
  `qualifications` varchar(150) NOT NULL,
  `sec_id` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`staff_id`, `first_name`, `last_name`, `nic`, `dob`, `staff_no`, `app_date`, `rc_app_date`, `email`, `app_subject`, `qualifications`, `sec_id`, `status`, `profile_pic`) VALUES
(1, 'Admin', '', '123456789', '2004-08-19', 'T-001', '2009-06-17', '2020-06-07', 'admin@richmondcollege.lk', '5', 'MSc. in Software Engineering', 4, 1, ''),
(12, 'Avatar', 'Roku', '789456123', '2004-08-19', 'T-002', '2014-08-04', '2020-08-24', 'jdchdcb@host.com', '1', 'BSc. in Mathematics', 4, 0, '../uploads/789456123.jpg'),
(13, 'Avatar', 'Roku', '987654321', '2004-02-09', 'T-002', '2020-05-19', '2022-06-21', 'testmail@host.com', '1', 'BSc. in Mathematics', 4, 1, '../uploads/987654321.jpg'),
(14, 'Dasun', 'Nethsara', '123789456', '2004-05-19', 'T-003', '2019-11-11', '2023-06-04', 't@host.com', '5', 'BSc. in Web Engineering', 4, 1, '../uploads/123789456.com_wallpaper'),
(15, 'Tony', 'Stark', '789123456', '1988-05-21', 'T-004', '2013-07-10', '2022-11-23', 'tony@starkindustries.com', '2', 'Phd in Physics, MSc. in Ethical Hacking, Msc. in Elecrical Engineering', 4, 1, '../uploads/789123456.com_wallpaper (1)'),
(16, 'Bruce', 'Wayne', '741852963', '1989-08-06', 'T-005', '2020-01-06', '2023-05-17', 'wayne@host.com', '18', 'MSc. in Engineering', 4, 1, '../uploads/741852963.jpg'),
(17, 'Clark', 'Kent', '963852741', '1988-05-06', 'T-006', '2016-07-18', '2019-12-08', 'kent@host.com', '8', 'Dip. in Econ', 4, 1, '../uploads/963852741.jpg'),
(18, 'Phil', 'Colson', '852741963', '1988-05-09', 'T-007', '2013-02-10', '2017-07-09', 'colson@shield.net', '16', 'Dip. in Geography', 4, 1, '../uploads/852741963.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_tbl`
--

CREATE TABLE `student_class_tbl` (
  `id` int(10) NOT NULL,
  `std_id` int(6) NOT NULL,
  `grade_class_id` int(5) NOT NULL,
  `sec_id` int(1) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class_tbl`
--

INSERT INTO `student_class_tbl` (`id`, `std_id`, `grade_class_id`, `sec_id`, `year`) VALUES
(47, 11, 23, 4, '2023'),
(48, 12, 23, 4, '2023'),
(49, 13, 23, 4, '2023'),
(50, 18, 24, 4, '2023'),
(51, 20, 26, 4, '2023'),
(52, 21, 26, 4, '2023'),
(53, 22, 26, 4, '2023'),
(54, 23, 27, 4, '2023'),
(55, 24, 27, 4, '2023'),
(56, 25, 27, 4, '2023'),
(57, 14, 25, 4, '2023'),
(58, 15, 25, 4, '2023'),
(59, 16, 25, 4, '2023'),
(62, 17, 24, 4, '2023'),
(63, 19, 24, 4, '2023');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks_watched_tbl`
--

CREATE TABLE `student_marks_watched_tbl` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `year` varchar(5) NOT NULL,
  `term` varchar(20) NOT NULL,
  `is_watched` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_tbl`
--

CREATE TABLE `student_tbl` (
  `std_id` int(10) NOT NULL,
  `admission_no` int(6) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `name_with_initials` varchar(70) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no_1` varchar(12) NOT NULL,
  `phone_no_2` varchar(12) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `d_o_admission` date NOT NULL,
  `date_added` date NOT NULL,
  `date_updated` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tbl`
--

INSERT INTO `student_tbl` (`std_id`, `admission_no`, `full_name`, `name_with_initials`, `address`, `phone_no_1`, `phone_no_2`, `dob`, `email`, `d_o_admission`, `date_added`, `date_updated`, `status`) VALUES
(11, 13736, 'Anthony Edward Stark', 'A. E. Stark', '10880, Malibu Point, California, USA', '1111111111', '1111111111', '1989-05-20', 'ironman@avengers.com', '2012-04-27', '2023-06-05', '2023-06-30', 1),
(12, 13737, 'Steve Rogers', 'S. Rogers', '569, Leaman Place, USA', '2222222222', '2222222222', '1920-04-07', 'captainamerica@avengers.com', '2012-04-27', '2023-06-05', '2023-06-30', 1),
(13, 13738, 'Stephen Vincent Strange', 'S. V. Strange', '177A, Bleecker Street, New York, USA', '3333333333', '3333333333', '1930-11-18', 'doctorstrange@avengers.com', '2016-08-21', '2023-06-05', '2023-06-30', 1),
(14, 13739, 'Peter Benjamin Parker', 'P. B. Parker', '20, Ingram Street, New York, USA', '4444444444', '4444444444', '2001-08-10', 'spiderman@avengers.com', '2016-11-06', '2023-06-05', '2023-06-30', 1),
(15, 13740, 'Clinton Francis Barton', 'C. F. Barton', 'Bedford-Stuyvesant, Brooklyn, New York, USA', '5555555555', '5555555555', '1975-10-01', 'Hawkeye@avengers.com', '2012-04-27', '2023-06-05', '2023-06-30', 1),
(16, 13741, 'Robert Bruce Banner', 'R. B. Banner', 'Stark Gamma Laborotories, California, USA', '6666666666', '6666666666', '1969-12-18', 'hulk@avengers.com', '2012-04-27', '2023-06-05', '2023-06-30', 1),
(17, 13742, 'Sam Wilson', 'S. Wilson', 'Avengers Facilities, Up State, New York, USA', '7777777777', '7777777777', '1989-09-21', 'falcon@avengers.com', '2015-06-13', '2023-06-30', '0000-00-00', 1),
(18, 13743, 'James Rhodes', 'J. Rhodes', 'Avengers Facilities, Up State, New York, USA', '8888888888', '8888888888', '1988-05-26', 'warmachine68@starkindustries.com', '2015-05-30', '2023-06-30', '0000-00-00', 1),
(19, 13744, 'Vision', 'Vision', 'Avengers Facilities, Up State, New York, USA', '9999999999', '9999999999', '2015-02-16', 'vision@avengers.com', '2015-03-10', '2023-06-30', '0000-00-00', 1),
(20, 13745, 'Pietro Maximoff', 'P. Maximoff', 'No. 65, Socovia', '1010101010', '1010101010', '1999-07-06', 'quicksilver@avengers.com', '2015-10-08', '2023-06-30', '0000-00-00', 1),
(21, 13746, 'Thor Odinson', 'T. Odinson', 'Asgard', '1111111111', '1111111111', '1880-04-04', 'thor@avengers.com', '2012-04-27', '2023-06-30', '0000-00-00', 1),
(22, 13747, 'Loki Odinson', 'O. Loki', 'Jyortonheim', '1212121212', '1212121212', '1890-11-04', '', '2011-05-11', '2023-06-30', '0000-00-00', 1),
(23, 13748, 'Scott Lang', 'S. Lang', 'Queens, California, USA', '1313131313', '1313131313', '1990-05-19', 'antman@avengers.com', '2016-06-14', '2023-06-30', '0000-00-00', 1),
(24, 13749, 'TChalla', 'TChalla', 'Wakanda', '1313131313', '1313131313', '1994-06-10', 'blackpanther@avengers.com', '2016-08-09', '2023-06-30', '0000-00-00', 1),
(25, 13750, 'Hank Pym', 'H. Pym', 'New York, USA', '1515151515', '1515151515', '1986-03-19', 'hankpym@pymindustries.com', '2004-09-16', '2023-06-30', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `sub_id` int(10) NOT NULL,
  `sub_code` varchar(10) NOT NULL,
  `sub_name` varchar(60) NOT NULL
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
  `staff_id` int(10) NOT NULL,
  `grade_class_id` int(10) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_tbl`
--

CREATE TABLE `teacher_subject_tbl` (
  `staff_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL
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
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `admission_no` varchar(6) DEFAULT NULL,
  `nic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `role_id`, `admission_no`, `nic`) VALUES
(1, 'admin', '$2y$10$fpviFK0rrFRmWFioB93ZwuiiRTUH2BaTQCzTiht7pz9RTkQA0iwY6', 1, 'NULL', '123456789'),
(25, '789456123', '$2y$10$VXwp.OIvlS3VN9DaKGs0M.bDmPNQjQcLJXR61jdFwoHXKU/U0MfxO', 2, '', '789456123'),
(26, '987654321', '$2y$10$GwAX.u7Lw2QxlXRMj5lXo.ddsao8blaYXHPqS6GNiqCGRfR7202iS', 2, '', '987654321'),
(27, '123789456', '$2y$10$qr.DJOCxDQZtS8DmJeS/ee4xXjLXHOA6Uto6Kt9p9IQZe6pmXY3ne', 4, '', '123789456'),
(28, '789123456', '$2y$10$qfiBEo8n3r4GE66y.nRBqeKYebil93HCzelQAEQ7J4OY8PRXPnyU6', 4, '', '789123456'),
(29, '13736', '$2y$10$FBQXX1PXvbZx5/gBwWdYKedz8CvhyrBYh1l7HmGw/fHByTTpyphai', 5, '13736', NULL),
(30, '13737', '$2y$10$7GwSVhJBql/.gHvUGOegN.vLDSno8ZPYstQd1tgTQzjgBEuSnyQ5y', 5, '13737', NULL),
(31, '13738', '$2y$10$9ya5kl4sLYrx0mfZitBWyeISWVzZmI47R8PY2VfcdKO.OERa.vKcG', 5, '13738', NULL),
(32, '13739', '$2y$10$Ag.6.BV2aOWCzuQjld1jiOnPQ2ZdOElX/CNFKoDS1SCHb4NhUOe1W', 5, '13739', NULL),
(33, '13740', '$2y$10$ONUMQgTj1F9I6KZzEFH3O.cl8eOTi3cUsNcnDUH/nfBLYdLXXPrJO', 5, '13740', NULL),
(34, '13741', '$2y$10$RiEeXeUt6OglXR7O/tWHA.qNRgdSeegl3f8iR5BB9dlfaHYB0jnka', 5, '13741', NULL),
(35, '741852963', '$2y$10$s1pAcTSlXu15Ctoczdj2MuCat2Ftgz0vJCniUriwmk//i5h0Z4jhS', 4, '', '741852963'),
(36, '13742', '$2y$10$CWGboCjzmhivuvdF3Wkw/OuvOtqassd45/ZhFdbZPkMxy7gGcx9IK', 5, '13742', NULL),
(37, '13743', '$2y$10$kSXeGRLjWhrOsZjeW59iDePNsm2RX.t2u49H37k4.NPNr1OSJFR/6', 5, '13743', NULL),
(38, '13744', '$2y$10$rRZ8wjf721Iv3SPr5.liU.gvTzrRnSt54KoByzISUgWYZskbM3d76', 5, '13744', NULL),
(39, '13745', '$2y$10$M1zI.OCn9r80CTmLGleZ.ub.vLZqEw8OJSFNUiRqEVVbex2P/i6MO', 5, '13745', NULL),
(40, '13746', '$2y$10$pndpQO.8PHXcXEB59qGu0.ngAVT0EWyBwzzKkC0ARgGzMtoKxKh6.', 5, '13746', NULL),
(41, '13747', '$2y$10$OVG5QKDyuyqUJDIWh6l9..49KapCyW3MYAXmS7wT6ad4rl5nDfMBa', 5, '13747', NULL),
(42, '13748', '$2y$10$BfHgZ5YbLnrTyAqHso8gUOFrSwVEjaqeFkyEOTR.SsvM.6YErgdsa', 5, '13748', NULL),
(43, '13749', '$2y$10$fQQP7yYv6O9qziigBcfhq.b1.vWK4gnfBRttKzK2LOwczywX.Q/Ym', 5, '13749', NULL),
(44, '13750', '$2y$10$/p/r2kC2gGEclGTVwBtd9.iv5FXIQVnWDZEje3byUCT4OSQYISTNe', 5, '13750', NULL),
(45, '963852741', '$2y$10$Gmh/sCxaJZflQbGd2FPIc.sUfD37Qz/.Mknhh6fNvWrw/vsFv.L.i', 4, '', '963852741'),
(46, '852741963', '$2y$10$jJ.hkLcFRCUEPpzjbQV6KuWZYZb2gvIW4pO/WmRJEBlaeBoyh45FS', 4, '', '852741963');

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
-- Indexes for table `al_absent_tbl`
--
ALTER TABLE `al_absent_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `al_marks_update_tbl`
--
ALTER TABLE `al_marks_update_tbl`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `class_stream_tbl`
--
ALTER TABLE `class_stream_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`,`stream_id`),
  ADD KEY `stream_id` (`stream_id`);

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
  ADD KEY `teacher_id` (`staff_id`);

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
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD PRIMARY KEY (`guardian_id`),
  ADD KEY `std_id` (`std_id`);

--
-- Indexes for table `message_tbl`
--
ALTER TABLE `message_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `sec_id` (`sec_id`);

--
-- Indexes for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `teacher_id` (`staff_id`),
  ADD KEY `nic` (`nic`),
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
-- Indexes for table `student_marks_watched_tbl`
--
ALTER TABLE `student_marks_watched_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`);

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
  ADD KEY `teacher_id` (`staff_id`),
  ADD KEY `grade_class_id` (`grade_class_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `teacher_subject_tbl`
--
ALTER TABLE `teacher_subject_tbl`
  ADD KEY `sub_id` (`sub_id`),
  ADD KEY `staff_id` (`staff_id`);

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
-- AUTO_INCREMENT for table `al_absent_tbl`
--
ALTER TABLE `al_absent_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT for table `al_marks_update_tbl`
--
ALTER TABLE `al_marks_update_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `al_subjects_tbl`
--
ALTER TABLE `al_subjects_tbl`
  MODIFY `al_sub_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `al_subject_stream_tbl`
--
ALTER TABLE `al_subject_stream_tbl`
  MODIFY `stream_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_stream_tbl`
--
ALTER TABLE `class_stream_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  MODIFY `grade_class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `grade_tbl`
--
ALTER TABLE `grade_tbl`
  MODIFY `grade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  MODIFY `guardian_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message_tbl`
--
ALTER TABLE `message_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `sec_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_marks_watched_tbl`
--
ALTER TABLE `student_marks_watched_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student_tbl`
--
ALTER TABLE `student_tbl`
  MODIFY `std_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role_tbl`
--
ALTER TABLE `user_role_tbl`
  MODIFY `role_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
-- Constraints for table `al_absent_tbl`
--
ALTER TABLE `al_absent_tbl`
  ADD CONSTRAINT `al_absent_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `al_absent_tbl_ibfk_3` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `al_marks_tbl`
--
ALTER TABLE `al_marks_tbl`
  ADD CONSTRAINT `al_marks_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `al_marks_tbl_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `al_subjects_tbl`
--
ALTER TABLE `al_subjects_tbl`
  ADD CONSTRAINT `al_subjects_tbl_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `al_subjects_tbl_ibfk_2` FOREIGN KEY (`stream_id`) REFERENCES `al_subject_stream_tbl` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_stream_tbl`
--
ALTER TABLE `class_stream_tbl`
  ADD CONSTRAINT `class_stream_tbl_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_tbl` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_stream_tbl_ibfk_2` FOREIGN KEY (`stream_id`) REFERENCES `al_subject_stream_tbl` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_class_tbl`
--
ALTER TABLE `grade_class_tbl`
  ADD CONSTRAINT `grade_class_tbl_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_tbl` (`class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_class_tbl_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade_tbl` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_class_tbl_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff_tbl` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade_subject_tbl`
--
ALTER TABLE `grade_subject_tbl`
  ADD CONSTRAINT `grade_subject_tbl_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_subject_tbl_ibfk_2` FOREIGN KEY (`stream_id`) REFERENCES `al_subject_stream_tbl` (`stream_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_subject_tbl_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade_tbl` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `guardian_tbl`
--
ALTER TABLE `guardian_tbl`
  ADD CONSTRAINT `guardian_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD CONSTRAINT `sec_id_from_section_tbl` FOREIGN KEY (`sec_id`) REFERENCES `section_tbl` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_class_tbl`
--
ALTER TABLE `student_class_tbl`
  ADD CONSTRAINT `student_class_tbl_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_class_tbl_ibfk_2` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class_tbl` (`grade_class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_class_tbl_ibfk_3` FOREIGN KEY (`sec_id`) REFERENCES `section_tbl` (`sec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_marks_watched_tbl`
--
ALTER TABLE `student_marks_watched_tbl`
  ADD CONSTRAINT `std_id_from_student` FOREIGN KEY (`std_id`) REFERENCES `student_tbl` (`std_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_class_tbl`
--
ALTER TABLE `teacher_class_tbl`
  ADD CONSTRAINT `teacher_class_tbl_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_tbl` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_class_tbl_ibfk_2` FOREIGN KEY (`grade_class_id`) REFERENCES `grade_class_tbl` (`grade_class_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_subject_tbl`
--
ALTER TABLE `teacher_subject_tbl`
  ADD CONSTRAINT `teacher_subject_tbl_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff_tbl` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_subject_tbl_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject_tbl` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `user_tbl_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role_tbl` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_tbl_ibfk_2` FOREIGN KEY (`nic`) REFERENCES `staff_tbl` (`nic`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
