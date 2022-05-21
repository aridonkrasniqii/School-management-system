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





create database aca;

use aca;


drop table if exists student;
	create table student(
	  student_id integer primary key AUTO_INCREMENT,
	  student_name varchar(100) ,
	  student_role varchar(100),
	  student_username varchar(100) not null,
	  student_email varchar(100) not null ,
	  student_password varchar(255) not null,
	  student_salt varchar(20) default null,
	  student_index varchar(100)
	);


drop table if exists teacher;
	create table teacher(
	  teacher_id integer primary key AUTO_INCREMENT,
	  teacher_name varchar(100) ,
	  teacher_role varchar(100),
	  teacher_username varchar(100) not null ,
	  teacher_email varchar(100) not null ,
	  teacher_password varchar(255) not null,
	  teacher_salt varchar(20) default null,
	  teacher_index varchar(100)
	);




drop table if exists subject;

create table subject(
  subject_id integer primary key AUTO_INCREMENT,
  subject_name varchar(100),
  subject_credits integer,
  subject_created_at date default now(),
  subject_date date,
  subject_created_by integer,
  foreign key (subject_created_by) references teacher(teacher_id)
);

drop table if exists subject_lectured_by;

create table subject_lectured_by (
lecture_id integer primary key AUTO_INCREMENT,
subject_id integer,
teacher_id integer,
foreign key (teacher_id) references teacher(teacher_id),
foreign key (subject_id) references subject(subject_id)
);

drop table if exists exam;

create table exam(
  exam_id integer primary key AUTO_INCREMENT,
  exam_subject varchar(100),
  exam_created_at date default now(),
  exam_date date,
  exam_created_by integer,
  foreign key(exam_created_by) references teacher(teacher_id)
);

drop table if exists exam_result;

create table exam_result(
  eresult_id integer primary key AUTO_INCREMENT,
  student_id integer,
  eresult_passed varchar(3) check (eresult_passed = "yes" or eresult_passed = "no"),
  eresult_points decimal(3,2),
  eresult_grade integer,
  eresult_date date default now(),
  foreign key (student_id) references student(student_id)
);





insert into exam_result() values(1, 1, 'yes',80,9,now());


drop table if exists homework;

create table homework(
  homework_id integer primary key AUTO_INCREMENT,
  homework_name varchar(100),
  homework_description varchar(1000),
  homework_max_points integer,
  homework_created_at date default now(),
  homework_deadline date,
  homework_created_by integer,
  foreign key(homework_created_by) references teacher(teacher_id)
);


// FIXME:
create table attachedhomework ( )


drop table if exists homework_result;

create table homework_result(
  hresult_id integer primary key AUTO_INCREMENT,
  hhomework_id integer ,
  hresult_student_id integer,
  hresult_points decimal(3,2),
  delivered_on_time varchar(3) check (delivered_on_time = "yes" or delivered_on_time = "no"),
  hresult_date date default now(),
  foreign key (hhomework_id) references homework(homework_id),
  foreign key(hresult_student_id) references student(student_id)
);


drop table if exists parent;

create table parent(
  parent_id integer primary key AUTO_INCREMENT,
  parent_name varchar(100),
  parent_email varchar(100),
  parent_occupation varchar(100)
);

drop table if exists parent_of;

create table parent_of(
  parent_of_id integer primary key AUTO_INCREMENT,
  parent_id integer,
  student_id integer,
  foreign key(parent_id) references parent(parent_id),
  foreign key(student_id) references student(student_id));









