-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 01:40 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
(7, 'Carmhie Mey', 'Dialogo', 'Majuelo', 'admin2', 'admin2', '2904be2275fd56a752f0feb1d23ca217.jpg', 2, 1, 1);

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
(1, 'BS Information Technology', 1),
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
  `user_evaluated` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_evaluation`
--

INSERT INTO `tbl_evaluation` (`id`, `prof`, `academicYear`, `date`, `val1`, `val2`, `val3`, `val4`, `val5`, `val6`, `val7`, `val8`, `val9`, `val10`, `val11`, `val12`, `val13`, `val14`, `val15`, `val16`, `val17`, `val18`, `val19`, `val20`, `comments`, `user_evaluated`, `status`) VALUES
(42, 12, 3, '2017-05-07', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Mark Adrian Pader', 3),
(57, 5, 1, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, '', 'Rene Generosa', 3),
(68, 10, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Danbeth Ho', 3),
(69, 10, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Maybelle Ruth Fajardo', 3),
(70, 10, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Jomari Urbano', 3),
(71, 17, 1, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Liedon Pineda', 3),
(72, 10, 3, '2017-05-08', 3, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Ma Anthonette Pareja', 3),
(73, 22, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Ma Anthonette Pareja', 3),
(74, 22, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Danbeth Ho', 3),
(75, 18, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Danbeth Ho', 3),
(76, 22, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Maybelle Ruth Fajardo', 3),
(77, 18, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Maybelle Ruth Fajardo', 3),
(78, 19, 2, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Irish Josel Natividad', 3),
(79, 23, 1, '2017-05-08', 5, 5, 5, 5, 4, 4, 4, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, '', 'Mark Querubin San Miguel', 3),
(80, 23, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'John Dominic Deocariza', 3),
(81, 23, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Harvey Borja', 3),
(82, 17, 3, '2017-05-08', 5, 4, 4, 5, 4, 5, 4, 4, 5, 5, 5, 5, 4, 4, 5, 5, 4, 3, 5, 5, '', 'Levilyn Gastardo', 3),
(83, 9, 3, '2017-05-08', 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 4, 4, 5, 5, '', 'Mary Jane Pal', 3),
(84, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 4, 4, 4, 5, 5, 5, '', 'Kristal Cassandra Fortes', 3),
(85, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Honey Grace Adorna', 3),
(86, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 4, '', 'Rinalyn Salazar', 3),
(87, 23, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Irisk Joy Dacillo', 3),
(88, 17, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Joven Carlo De Guzman', 3),
(89, 23, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Micca Ella Bugarin', 3),
(90, 23, 3, '2017-05-08', 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 3, 5, 5, '', 'Jeany Abe Abe', 3),
(91, 10, 2, '2017-05-08', 5, 4, 5, 5, 5, 4, 5, 5, 4, 4, 5, 5, 5, 5, 4, 4, 3, 4, 5, 5, '', 'Eric John Roque', 3),
(92, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Alberto Macaraeg', 3),
(93, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Leonel Merjilla', 3),
(94, 9, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Ryan Joseph Jose', 3),
(95, 23, 3, '2017-05-08', 5, 5, 5, 5, 4, 5, 5, 5, 4, 5, 5, 5, 5, 4, 4, 4, 5, 4, 5, 5, '', 'Michelle De Los Santos', 3),
(96, 23, 3, '2017-05-08', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Cristine Palma', 3),
(97, 23, 1, '2017-05-09', 5, 5, 5, 5, 4, 5, 4, 4, 5, 5, 4, 5, 4, 4, 5, 4, 4, 5, 5, 5, '', 'Michael John Liwanag', 3),
(98, 10, 1, '2017-05-09', 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, '', 'Billy Joe Macaraeg', 3),
(99, 15, 1, '2017-05-09', 5, 3, 3, 5, 5, 5, 5, 3, 1, 3, 5, 5, 5, 5, 5, 5, 3, 3, 3, 5, '', 'Ivan Taperla', 3),
(100, 15, 1, '2017-05-09', 5, 5, 4, 4, 5, 4, 4, 5, 5, 5, 4, 4, 3, 4, 5, 4, 3, 5, 2, 5, '', 'Joshua Noel Virtus', 3),
(101, 15, 1, '2017-05-09', 3, 5, 3, 3, 5, 3, 3, 3, 4, 5, 3, 3, 5, 5, 5, 5, 5, 3, 5, 3, '', 'Manny Taperia', 3),
(102, 15, 1, '2017-05-09', 3, 5, 5, 3, 5, 2, 4, 5, 5, 5, 5, 5, 3, 5, 2, 5, 5, 3, 5, 3, '', 'Jenelyn Panganiban', 3),
(103, 13, 2, '2017-05-09', 3, 3, 5, 5, 3, 3, 5, 5, 5, 4, 3, 5, 5, 3, 5, 5, 3, 3, 3, 5, '', 'Mary Cris Aban', 3),
(104, 14, 1, '2017-05-09', 4, 3, 5, 3, 4, 3, 3, 3, 5, 4, 5, 5, 5, 3, 4, 4, 2, 2, 4, 5, '', 'Joshua Miguel Borja', 3),
(105, 21, 1, '2017-05-09', 4, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, '', 'Jedidiah Santonia', 3),
(106, 18, 1, '2017-05-09', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Anjanette Vasquez', 3),
(107, 11, 1, '2017-05-09', 5, 5, 5, 4, 3, 4, 4, 5, 5, 5, 4, 4, 3, 5, 4, 5, 5, 5, 4, 5, '', 'Lorrielyn Ola', 3),
(108, 15, 1, '2017-05-09', 1, 5, 3, 4, 5, 3, 4, 5, 3, 3, 3, 4, 2, 4, 3, 1, 5, 5, 5, 4, '', 'Anna Lina Limos', 3),
(109, 14, 1, '2017-05-09', 3, 3, 4, 4, 4, 3, 3, 3, 4, 3, 5, 4, 5, 3, 2, 5, 3, 3, 3, 5, '', 'Jessica Aldava', 3),
(110, 14, 1, '2017-05-09', 3, 4, 4, 3, 3, 4, 4, 4, 5, 4, 4, 3, 3, 3, 3, 3, 3, 4, 3, 4, '', 'Czarina Monces', 3),
(111, 23, 1, '2017-05-09', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, '', 'Aldrin Jhon Selga', 3),
(112, 23, 1, '2017-05-09', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Mar Jason Donesa', 3),
(113, 23, 1, '2017-05-09', 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Wendel Lloyd Nicolasora', 3),
(114, 9, 1, '2017-05-09', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 3, 5, 5, '', 'Jassele Mae Alvarez', 3),
(115, 23, 1, '2017-05-09', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '', 'Cedric Jhon Rojas', 3),
(117, 10, 3, '2017-05-10', 5, 4, 4, 5, 5, 4, 5, 5, 2, 1, 2, 2, 2, 2, 1, 5, 5, 5, 5, 5, 'hi mam :) heart heart <3 ', 'mae dss', 3),
(118, 23, 3, '2017-05-10', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 'iloveyou sir. pasa mo po kami . please po . ', 'mae dss', 3),
(119, 14, 1, '2017-05-10', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 'gdsjdosjdosajds', 'angelo celon', 3),
(120, 10, 1, '2017-05-11', 5, 5, 5, 5, 4, 5, 5, 4, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 5, 5, 'gfhgshs', 'sdsfsdd rttyt', 3),
(124, 19, 1, '2017-05-11', 5, 5, 5, 5, 5, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, '', 'Irish Josel Natividad', 3);

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
(9, 'Dean Abelardo S. Reyes', 1, '30572e4a6a49ea36a7843ca4d46413c0.jpg', 2),
(10, 'Annaliza E. Collado', 2, '91e3f054f5a46ca32b9bc4ee19eb5bb9.jpg', 1),
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
(22, 'Mark Arlo L. Beltran', 6, 'c61733411234a8fe5fb63e96833bbeff.jpg', 1),
(23, 'Engr. Mike Perez', 1, '8a9c639199a4ce0b220e688fae8666f4.jpg', 1);

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
(48, '14001513300', 'borja', 'Harvey', 'R', 'Borja', 1, 3, 2, 1, 1),
(49, '10001204900', 'sanmiguel', 'Mark Querubin', 'M', 'San Miguel', 1, 3, 2, 1, 1),
(50, '13000555600', 'gastardo', 'Levilyn', 'M', 'Gastardo', 5, 3, 2, 1, 1),
(51, '12001743600', 'adorna', 'Honey Grace', 'A', 'Adorna', 5, 3, 2, 1, 1),
(52, '15001354600', 'fortes', 'Kristal Cassandra', 'A', 'Fortes', 5, 3, 2, 1, 1),
(53, '14000389900', 'pal', 'Mary Jane', 'P', 'Pal', 5, 3, 2, 1, 1),
(54, '12002005200', 'salazar', 'Rinalyn', 'B', 'Salazar', 2, 3, 2, 1, 1),
(55, '15000330400', 'bugarin', 'Micca Ella', 'C', 'Bugarin', 1, 2, 2, 1, 1),
(56, '15000142300', 'deguzman', 'Joven Carlo', 'D', 'De Guzman', 1, 3, 2, 1, 1),
(57, '12001981600', 'dacillo', 'Irisk Joy', 'E', 'Dacillo', 5, 3, 2, 1, 1),
(58, '12002621100', 'abeabe', 'Jeany', 'C', 'Abe Abe', 5, 3, 2, 1, 1),
(59, '16001494800', 'roque', 'Eric John', 'M', 'Roque', 2, 2, 2, 1, 1),
(60, '14001391800', 'macaraeg', 'Alberto', 'C', 'Macaraeg', 2, 3, 2, 1, 1),
(61, '15001358400', 'merjilla', 'Leonel', 'B', 'Merjilla', 2, 3, 2, 1, 1),
(62, '11002316700', 'jose', 'Ryan Joseph', 'R', 'Jose', 2, 3, 2, 1, 1),
(63, '16000633300', 'delossantos', 'Michelle', 'A', 'De Los Santos', 1, 3, 2, 1, 1),
(64, '15001053100', 'palma', 'Cristine', 'P', 'Palma', 1, 3, 2, 1, 1),
(65, '16001813600', 'liwanag', 'Michael John', 'Flores', 'Liwanag', 1, 2, 2, 1, 1),
(66, '16000444000', 'macaraeg', 'Billy Joe', 'Abling', 'Macaraeg', 1, 2, 2, 1, 1),
(67, '16001623900', 'vasquez', 'Manny', 'B', 'Taperia', 1, 1, 2, 1, 1),
(68, '15002559500', 'taperla', 'Ivan', 'P', 'Taperla', 1, 1, 2, 1, 1),
(69, '16005258500', 'virtus', 'Joshua Noel', 'M', 'Virtus', 1, 1, 2, 1, 1),
(70, '15003047000', 'panganiban', 'Jenelyn', 'M', 'Panganiban', 1, 1, 2, 1, 1),
(71, '15002463500', 'aban', 'Mary Cris', 'A', 'Aban', 6, 1, 2, 1, 1),
(72, '15002759200', 'borja', 'Joshua Miguel', 'E', 'Borja', 6, 1, 2, 1, 1),
(73, '15000823300', 'vasquez', 'Anjanette', 'C', 'Vasquez', 5, 3, 2, 1, 1),
(74, '15000828600', 'santonia', 'Jedidiah', 'D', 'Santonia', 5, 3, 2, 1, 1),
(75, '15002583500', 'ola', 'Lorrielyn', 'A', 'Ola', 6, 1, 2, 1, 1),
(76, '16000504000', 'limos', 'Anna Lina', 'F', 'Limos', 6, 1, 2, 1, 1),
(77, '15002583700', 'monces', 'Czarina', 'C', 'Monces', 6, 1, 2, 1, 1),
(78, '150031157000', 'aldava', 'Jessica', 'I', 'Aldava', 6, 1, 2, 1, 1),
(79, '15003115700', 'aldava', 'Jessica', 'I', 'Aldava', 6, 1, 2, 1, 1),
(80, '15000595700', 'selga', 'Aldrin Jhon', 'A', 'Selga', 1, 3, 2, 1, 1),
(81, '15000830900', 'donesa', 'Mar Jason', 'L', 'Donesa', 1, 3, 2, 1, 1),
(82, '14000173200', 'alvarez', 'Jassele Mae', 'D', 'Alvarez', 2, 2, 2, 1, 1),
(83, '13000987500', 'nicolasora', 'Wendel Lloyd', 'G', 'Nicolasora', 2, 3, 2, 1, 1),
(84, '15000363300', 'rojas', 'Cedric Jhon', 'C', 'Rojas', 1, 3, 2, 1, 1),
(85, '16002053500', 'pascual', 'John Kenneth', 'L', 'Pascual', 1, 3, 2, 1, 1),
(86, '1000500700', 'dialogo', 'Carmhie Mey', 'M', 'Dialogo', 1, 3, 2, 1, 1),
(88, '10000500701', 'dialogo1', 'Camz', 'majuelo', 'Dialogo', 1, 3, 2, 1, 1),
(89, '10000500708', 'dialogos', 'mae', 'mam', 'dss', 1, 3, 2, 1, 1),
(90, '10000500800', 'celon', 'angelo', 'p', 'celon', 1, 2, 2, 1, 1),
(91, '10000500710', 'dialoss', 'sdsfsdd', 't', 'rttyt', 1, 1, 2, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_professors`
--
ALTER TABLE `tbl_professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tbl_yearlevel`
--
ALTER TABLE `tbl_yearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
