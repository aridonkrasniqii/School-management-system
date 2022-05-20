-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 06:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aca`
--

create database aca;
use aca;


  create table student(
  student_id integer primary key AUTO_INCREMENT,
  student_name varchar(100) ,
  student_role varchar(100),
  student_username varchar(100) not null unique,
  student_email varchar(100) not null unique,
  student_password varchar(255) not null,
  student_salt varchar(20) default null,
  student_index varchar(100)
);


create table teacher(
  teacher_id integer primary key AUTO_INCREMENT,
  teacher_name varchar(100) ,
  teacher_role varchar(100),
  teacher_username varchar(100) not null unique,
  teacher_email varchar(100) not null unique,
  teacher_password varchar(255) not null,
  teacher_salt varchar(20) default null,
  teacher_index varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`) VALUES
('admin', 'admin123@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `name` varchar(20) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `English` int(20) NOT NULL,
  `Biology` int(20) NOT NULL,
  `Physics` int(20) NOT NULL,
  `Chemistry` int(20) NOT NULL,
  `Mathematics` int(20) NOT NULL,
  `ComputerSciences` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`name`, `roll_no`, `English`, `Biology`, `Physics`, `Chemistry`, `Mathematics`, `ComputerSciences`) VALUES
('student1 ', '1001', 91, 0, 99, 92, 80, 89),
('student12', '1002', 67, 68, 70, 69, 71, 0),
('student4', '1004', 90, 0, 100, 100, 100, 98);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll_no` int(20) NOT NULL,
  `name` text NOT NULL,
  `father_name` text NOT NULL,
  `class` int(20) NOT NULL,
  `mobile` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` int(20) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll_no`, `name`, `father_name`, `class`, `mobile`, `email`, `password`, `remark`) VALUES
(1, 'student1 ', 'father student1 ', 11, 1234567890, 'student1@gmail.com', 1234567890, 'good !but  better lu');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_name` text NOT NULL,
  `class_teacher` int(20) NOT NULL,
  `teacher_subject` text NOT NULL,
  `mobile_no` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_name`, `class_teacher`, `teacher_subject`, `mobile_no`, `email`, `password`, `gender`) VALUES
('teacher1', 12, 'mathematics ', 1234567893, 'teacher1@gmail.com', 'teacher1', 'F'),
('teacher2', 0, 'English', 1234567890, 'teacher2@gmail.com', 'teacher2', 'F'),
('teacher3', 13, 'Biology ', 1234567890, 'teacher3@gmail.com', 'teacher3', 'F');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
