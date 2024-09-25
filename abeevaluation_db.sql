-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 08:33 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abeevaluation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `label`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic`
--

CREATE TABLE `tbl_academic` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_academic`
--

INSERT INTO `tbl_academic` (`id`, `label`) VALUES
(1, 'First Trimester '),
(2, 'Second Trimester '),
(3, 'Third Trimester ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilepicture` varchar(100) NOT NULL,
  `position` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `middle_name`, `user_name`, `password`, `profilepicture`, `position`, `user_level`, `status`) VALUES
(1, 'John Christian', 'De Guzman', 'M', 'Registrar', 'registrar', 'aeec903e766c8d91b1290edbde92eb31.jpg', 2, 1, 1),
(2, 'Lady Chartelie ', 'Caraig', 'W', 'HR', 'hr', '8e75a491910fdb68c4ffbc4625113aa8.jpg', 1, 1, 1),
(6, 'Mark Adrian', 'Pader', 'Bermudo', 'admin', 'admin', '9bf36c878a66818a994d5434b46d643a.jpg', 1, 1, 1),
(7, 'Carmhie Mey', 'Dialogo', 'Majuelo', 'admin2', 'admin2', '2904be2275fd56a752f0feb1d23ca217.jpg', 2, 1, 1),
(8, 'vvvv', 'vv', 'vv', '555', '555', '565600352844609e0605186080b41f3f.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `id` int(11) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`id`, `desc`, `status`) VALUES
(1, 'COLLEGE ENROLLMENT April 24 to May 12, 2017 Classes begin May 15, 2017', 1),
(10, 'SHS ENROLLMENT April 3 to June 9, 2017 ORIENTATION May 8, 10, 12, 1017 Classes begin June 10, 2017', 1),
(11, 'April 7, 2017  Completion on IC for the 2nd Trimester SY 2016 - 2017 is until April 21, 2017 only. Failure to comply will automatically fail the subject. The subject, the said completion will no longer be extended.', 1),
(12, 'ATTENTION to all students with no official business do not enter', 1),
(13, 'ATTENTION TO ALL STUDENTS: There will be no consultation to our college Dean and Registrar for this week due to graduation evaluation and verification. All concern will be entertained by next week May 2, 2017. For your information and guidance', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `label`, `status`) VALUES
(1, 'Bs Information Technology', 1),
(2, 'BS Hotel and Restaurant Managemnt', 1),
(5, 'BS Tourism', 1),
(6, 'BS Business Administration', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `label`, `status`) VALUES
(1, 'I.T Department', 1),
(2, 'HRM Department', 1),
(5, 'Tourism Department', 1),
(6, 'B.A Department ', 1),
(7, 'ICT', 1),
(8, 'ABM', 1),
(9, 'GAS ', 1),
(10, 'PE Teacher', 1),
(11, 'English Teacher', 1),
(12, 'Gen. Ed. Teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_evaluation`
--

CREATE TABLE `tbl_evaluation` (
  `id` int(11) NOT NULL,
  `prof` int(11) NOT NULL,
  `academicYear` int(11) NOT NULL,
  `date` date NOT NULL,
  `val1` int(10) NOT NULL,
  `val2` int(11) NOT NULL,
  `val3` int(11) NOT NULL,
  `val4` int(11) NOT NULL,
  `val5` int(11) NOT NULL,
  `val6` int(11) NOT NULL,
  `val7` int(11) NOT NULL,
  `val8` int(11) NOT NULL,
  `val9` int(11) NOT NULL,
  `val10` int(11) NOT NULL,
  `val11` int(11) NOT NULL,
  `val12` int(11) NOT NULL,
  `val13` int(11) NOT NULL,
  `val14` int(11) NOT NULL,
  `val15` int(11) NOT NULL,
  `val16` int(11) NOT NULL,
  `val17` int(11) NOT NULL,
  `val18` int(11) NOT NULL,
  `val19` int(11) NOT NULL,
  `val20` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  `user_evaluated` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_evaluation`
--

INSERT INTO `tbl_evaluation` (`id`, `prof`, `academicYear`, `date`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `val10`, `val11`, `val12`, `val13`, `val14`, `val15`, `val16`, `val17`, `val18`, `val19`, `val20`, `comments`, `user_evaluated`) VALUES
(42, 12, 3, '2017-05-07', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Mark Adrian Pader'),
(43, 11, 3, '2017-05-07', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Mark Adrian Pader'),
(53, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Carmhie Mey Dialogo'),
(54, 5, 3, '2017-05-08', 5, 4, 4, 4, 5, 5, 4, 4, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, '', 'aaa bbb'),
(55, 5, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, '', 'asd asd'),
(56, 5, 3, '2017-05-08', 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Ffff ffff'),
(57, 5, 1, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, '', 'Rene Generosa'),
(58, 5, 3, '2017-05-08', 5, 5, 5, 4, 4, 5, 4, 4, 4, 5, 4, 3, 4, 4, 5, 5, 5, 5, 5, 5, '', 'qw wq'),
(60, 5, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'qw wq'),
(61, 5, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 4, 4, 5, 5, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, '', 'Kenneth Pascual'),
(67, 5, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, '', 'Mark Adrian Pader'),
(68, 10, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Danbeth Ho'),
(69, 10, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Maybelle Ruth Fajardo'),
(70, 10, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Jomari Urbano'),
(71, 17, 1, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Liedon Pineda'),
(72, 10, 3, '2017-05-08', 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Ma Anthonette Pareja'),
(73, 22, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Ma Anthonette Pareja'),
(74, 22, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Danbeth Ho'),
(75, 18, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Danbeth Ho'),
(76, 22, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Maybelle Ruth Fajardo'),
(77, 18, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Maybelle Ruth Fajardo'),
(78, 19, 2, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Irish Josel Natividad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(11) NOT NULL,
  `Position` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `Position`, `status`) VALUES
(1, 'HR', 1),
(2, 'Registrar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_professors`
--

CREATE TABLE `tbl_professors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` int(10) NOT NULL,
  `professorpicture` varchar(150) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_professors`
--

INSERT INTO `tbl_professors` (`id`, `name`, `department`, `professorpicture`, `status`) VALUES
(5, 'Engr. Michael  M.  Perez, MES', 1, '9f7ca38fbc96463ef794fe45690c1fc9.jpg', 1),
(9, 'Dean Abelardo S. Reyes', 1, '0a89ba0164f3a09ade87d9909ce70191.jpg', 1),
(10, 'Annaliza E. Collado', 6, 'bcdfb0546aaa147146f9215f2220ce75.jpg', 1),
(11, 'Nonilon P. Cajandab Jr.', 7, '3540e193dabde7bd0cfa3f60c77e9b2d.jpg', 1),
(12, 'Marie Angel T. Forjes', 8, '609c253459ad421408a1fb44268ad7aa.jpg', 1),
(13, 'Kristine P. Lim', 8, '047af8772c375aedc7129f80659463b9.jpg', 1),
(14, 'Erliza M. Cortez', 8, 'bf32363c5727df04dbb86f6f5a4cc6b9.jpg', 1),
(15, 'Allona Elan G. Pascua', 9, '5bb505ac80661cc3a187319f2c11ccc0.jpg', 1),
(16, 'Efraim E. Guiang, CPA', 6, 'dc98bc530e2536914b94c8da0da0f330.jpg', 1),
(17, 'Joyce Ann B. Capucion', 1, '09d1e664c0ce6c0775681e040cfdf562.jpg', 1),
(18, 'Aries Gabilo', 11, 'cebb63e71201c8d24ef3811993e44d4a.jpg', 1),
(19, 'Vanessa A. Joaquin', 10, '2ed04c4d363025280264a9344b365702.jpg', 1),
(20, 'Ilonah Mae G. Historillo', 12, '765dfac307e2df06bfdc9b125f69bedc.jpg', 1),
(21, 'Janoah B. Dela Cruz', 2, '0f2429e6ed90bd945e2974fd3b8179df.jpg', 1),
(22, 'Mark Arlo L. Beltran', 6, 'c61733411234a8fe5fb63e96833bbeff.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userlevel`
--

CREATE TABLE `tbl_userlevel` (
  `id` int(11) NOT NULL,
  `label` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_userlevel`
--

INSERT INTO `tbl_userlevel` (`id`, `label`) VALUES
(1, 'Admin'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `usn` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `course` int(10) NOT NULL,
  `yearLevel` int(10) NOT NULL,
  `user_level` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `evaluate_status` int(11) NOT NULL DEFAULT '1' COMMENT '''1 = done, 2 = not'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `usn`, `password`, `first_name`, `middle_name`, `last_name`, `course`, `yearLevel`, `user_level`, `status`, `evaluate_status`) VALUES
(6, '16002053500', 'pascual', 'Kenneth', 'Lazaro', 'Pascual', 1, 3, 2, 1, 1),
(7, '1000500700', 'dialogo', 'Carmhie Mey', 'Majuelo', 'Dialogo', 1, 3, 2, 1, 1),
(8, '11001173900', 'pader', 'Mark Adrian', 'Bermudo', 'Pader', 1, 3, 2, 1, 1),
(39, '20171', 'Generosa', 'Rene', 'O', 'Generosa', 1, 1, 2, 1, 1),
(40, '15000299500', 'ho', 'Danbeth', 'G', 'Ho', 6, 3, 2, 1, 1),
(41, '15000447900', 'fajardo', 'Maybelle Ruth', 'S', 'Fajardo', 6, 3, 2, 1, 1),
(42, '14000497600', 'urbano', 'Jomari', 'V', 'Urbano', 6, 3, 2, 1, 1),
(43, '15001293200', 'pineda', 'Liedon', 'L', 'Pineda', 1, 3, 2, 1, 1),
(44, '15002680700', 'pareja', 'Ma Anthonette', 'V', 'Pareja', 6, 3, 2, 1, 1),
(45, '11000356100', 'velete', 'Rustin', 'C', 'Velete', 1, 3, 2, 1, 1),
(46, '14000838100', 'natividad', 'Irish Josel', 'A', 'Natividad', 1, 3, 2, 1, 1),
(47, '10000919500', 'deocareza', 'John Dominic', 'G', 'Deocariza', 1, 3, 2, 1, 1),
(48, '14001513300', 'borja', 'Harvey', 'R', 'Borja', 1, 3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearlevel`
--

CREATE TABLE `tbl_yearlevel` (
  `id` int(11) NOT NULL,
  `label` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yearlevel`
--

INSERT INTO `tbl_yearlevel` (`id`, `label`, `status`) VALUES
(1, '1st Year College', 1),
(2, '2nd Year College', 1),
(3, '3rd Year College', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_academic`
--
ALTER TABLE `tbl_academic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_evaluation`
--
ALTER TABLE `tbl_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_professors`
--
ALTER TABLE `tbl_professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_academic`
--
ALTER TABLE `tbl_academic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_evaluation`
--
ALTER TABLE `tbl_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_professors`
--
ALTER TABLE `tbl_professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
