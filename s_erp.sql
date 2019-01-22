-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 06:00 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounce_head`
--

CREATE TABLE `accounce_head` (
  `head_id` int(11) NOT NULL,
  `acc_type` int(11) DEFAULT NULL,
  `head_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_flow_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `acc_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission_exam_date`
--

CREATE TABLE `admission_exam_date` (
  `id` int(11) NOT NULL,
  `class_name` varchar(250) NOT NULL,
  `admission_exam_date` date NOT NULL,
  `admission_exam_time_start` time(6) NOT NULL,
  `admission_exam_time_end` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admission_time_date`
--

CREATE TABLE `admission_time_date` (
  `id` int(11) NOT NULL,
  `exam_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `application_start_date` date DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `application_end_date` date DEFAULT NULL,
  `admission_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `admission_test_details` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `breaking_news`
--

CREATE TABLE `breaking_news` (
  `id` int(20) NOT NULL,
  `news` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(20) NOT NULL,
  `class_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_teacher` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Not assigned'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `class_teacher`) VALUES
(1, 'test', 'Not assigned');

-- --------------------------------------------------------

--
-- Table structure for table `daily_logs`
--

CREATE TABLE `daily_logs` (
  `id` int(255) NOT NULL,
  `s_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_class` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_section` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `exit_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entry_log`
--

CREATE TABLE `entry_log` (
  `id` int(255) NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_card_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `logged_time` timestamp NULL DEFAULT NULL,
  `sync_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_term`
--

CREATE TABLE `exam_term` (
  `exam_id` int(11) NOT NULL,
  `term_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `exam_date` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `class_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_term`
--

INSERT INTO `exam_term` (`exam_id`, `term_name`, `exam_date`, `year`, `class_id`) VALUES
(1, 'Summer 2018 Admission Test', '2018-07-18', '2018', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ex_student`
--

CREATE TABLE `ex_student` (
  `id` int(11) NOT NULL,
  `class` int(11) DEFAULT NULL,
  `section` int(50) DEFAULT NULL,
  `student_id` int(20) DEFAULT NULL,
  `details` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machine_start`
--

CREATE TABLE `machine_start` (
  `id` int(20) NOT NULL,
  `start_date_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `daily_start_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `daily_end_time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(28) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `details` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `details`) VALUES
(1, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(11, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(12, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(13, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(14, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(15, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(16, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(18, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(19, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(20, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(21, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(22, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(23, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” '),
(24, 'সেই শহর আর সেই আকাশস্পর্শী', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” ');

-- --------------------------------------------------------

--
-- Table structure for table `online_admission`
--

CREATE TABLE `online_admission` (
  `id` int(30) NOT NULL,
  `ad_group` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subj4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subj5` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subj6` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `optional` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bloodgroup` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quota` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_profession` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_profession` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_nationalID` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_nationalID` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postOffice` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `annualincome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localguardian` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `localguardian_district` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yourrelation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thana_upojela` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobileOfLG` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homeaddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nameOfExam` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `examroll` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passingYear` int(10) DEFAULT NULL,
  `registrationNo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `board` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GPA` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `notified` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(20) DEFAULT NULL,
  `pay_method` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_gallery`
--

CREATE TABLE `photo_gallery` (
  `id` int(20) NOT NULL,
  `image` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo_gallery`
--

INSERT INTO `photo_gallery` (`id`, `image`) VALUES
(11, '4.jpg'),
(10, '9.jpg'),
(12, '2.jpg'),
(13, '3.jpg'),
(14, '4.jpg'),
(15, '5.jpg'),
(16, '6.jpg'),
(17, '7.jpg'),
(18, '6.jpg'),
(19, '7.jpg'),
(20, '8.jpg'),
(21, '11.jpg'),
(22, '12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `receive_payment`
--

CREATE TABLE `receive_payment` (
  `inv_id` int(11) NOT NULL,
  `inv_num` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rec_category` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `student` int(11) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `curr_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `final_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'Paid',
  `pay_method` int(11) DEFAULT NULL,
  `identity` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(100) NOT NULL,
  `s_id` int(20) DEFAULT NULL,
  `term_id` int(20) DEFAULT NULL,
  `sub_id` int(20) DEFAULT NULL,
  `mark` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `s_id`, `term_id`, `sub_id`, `mark`) VALUES
(1, 18101, 1, 1, '90'),
(2, 18101, 1, 2, '80'),
(3, 18201, 21, 31, '98');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `time` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `school_info_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_1st_line` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_2nd_line` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bannar` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`school_info_id`, `name`, `phone`, `address_1st_line`, `address_2nd_line`, `logo`, `signature`, `bannar`) VALUES
(1, 'Beta Name', '01700000000', 'Beta Address 1', 'Beta Address 2', 'school_logo.png', 'signature.png', 'banner.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(50) NOT NULL,
  `class_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `section_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `section_limit` int(100) DEFAULT NULL,
  `student_number` int(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `class_id`, `section_name`, `section_limit`, `student_number`) VALUES
(1, '1', 'mango', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`) VALUES
(1, 'Demo1', '116129326_image-slider-2.jpg'),
(2, 'Demo2', '83528956_mountains1.jpg'),
(3, 'Demo3', '108805817_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `sms_id` int(20) NOT NULL,
  `user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sms_rate` int(10) DEFAULT '1',
  `sms_entry_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sms_exit_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sender` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `api` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `eng_long_prefix` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance_check_api` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`sms_id`, `user_name`, `password`, `sms_rate`, `sms_entry_text`, `sms_exit_text`, `sender`, `api`, `eng_long_prefix`, `balance_check_api`) VALUES
(1, '0', '0', 1, 'has come at school', 'exit at', 'DBNLTD', 'http://api.zaman-it.com/api/v3/sendsms/plain?', 'user=$user_name&password=$password&sender=$sender&SMSText=$sms_text&GSM=$number&type=longSMS', 'http://api.zaman-it.com/api/command?username=$user_name&password=$password&cmd=Credits');

-- --------------------------------------------------------

--
-- Table structure for table `speech`
--

CREATE TABLE `speech` (
  `id` int(11) NOT NULL,
  `identifier` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speech`
--

INSERT INTO `speech` (`id`, `identifier`, `title`, `speech`, `image`) VALUES
(1, 'Left 1st', 'প্রধান শিক্ষক', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” ', '21101.svg'),
(2, 'Left 2nd', 'চেয়ারম্যান', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” ', '21102.svg'),
(3, 'Right 1st', 'পরিচালক', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” ', '21103.svg'),
(4, 'Right 2nd', 'উপাধ্যক্ষ', 'এই সেই স্থান যেখানে প্রভু সমস্ত পৃথিবীর এক ভাষাকে অনেক ভাষাতে বিভ্রান্ত করলেন| তাই এই স্থানটির নাম হলো বাবিল| এইভাবে প্রভু তাঁদের সেই স্থান থেকে পৃথিবীর বিভিন্ন স্থানে ছড়িয়ে দিলেন|তারা বলল, “আমরা মাটি দিয়ে ইঁট তৈরী করব, তারপর আরও শক্ত করার জন্যে ইঁটগুলো পোড়াব|” তখন মানুষ পাথরের বদলে ইঁট দিয়ে বাড়ী তৈরী করল| আর গাঁথনি শক্ত করার জন্যে সিমেন্টের বদলে আলকাতরা ব্যবহার করল| তারা বলল, “এস আমরা আমাদের জন্যে এক বড় শহর বানাই| আর এমন একটি উঁচু স্তম্ভ বানাই যা আকাশ স্পর্শ করবে| তাহলে আমরা বিখ্যাত হব এবং এটা আমাদের এক সঙ্গে ধরে রাখবে| সারা পৃথিবীতে আমরা ছড়িয়ে থাকব না|” ', '21104.svg');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `st_id` int(100) NOT NULL,
  `s_f_name` varchar(100) DEFAULT NULL,
  `s_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_class` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_section` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_roll` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fat_name` varchar(100) DEFAULT NULL,
  `fat_mobile` varchar(20) DEFAULT NULL,
  `mot_name` varchar(20) DEFAULT NULL,
  `mot_mobile` varchar(14) DEFAULT NULL,
  `s_dob` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_sex` varchar(6) DEFAULT NULL,
  `s_reli` varchar(20) DEFAULT NULL,
  `s_per_add` varchar(50) DEFAULT NULL,
  `s_image` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`st_id`, `s_f_name`, `s_id`, `s_class`, `s_section`, `s_roll`, `fat_name`, `fat_mobile`, `mot_name`, `mot_mobile`, `s_dob`, `s_sex`, `s_reli`, `s_per_add`, `s_image`, `pass`) VALUES
(1, 'Test Student', '18101', '1', '1', '54', 'Demo father', '8801525656521', 'Demo mother', '8801525656521', '2018-07-12', 'Male', 'Islam', 'fgdfgfdgfdgfdgfdgdf', '18101.png', NULL),
(2, 'Test Student', '18102', '1', '1', '54', 'Demo father', '8801525656521', 'Demo mother', '88015256565215', '2018-07-11', 'Male', 'Islam', 'fgjdbdfjgbdgdfjgdfjhgfjkd', '18102.jpg', NULL),
(3, 'Test Student', 'dgdf', '1', '1', '34543', 'Demo father', '88015256565215655', 'Demo mother', '88015256565215', '2018-07-12', 'Other', 'Islam', 'fhfghfghfghfghfgfhgf', 'dgdf.jpg', NULL),
(4, 'MD. Abdul Korim', '18201', '11', '21', '25', 'MD. Abdul Rohim', '880100000000', 'MS. Sayma Katun', '880100000000', '1990-03-15', 'Male', 'Islam', 'Dhaka', '18201.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(50) NOT NULL,
  `subject_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_type` int(11) DEFAULT NULL,
  `sub_mark` int(11) DEFAULT NULL,
  `full_marks` int(11) DEFAULT NULL,
  `subject_group` int(11) DEFAULT NULL,
  `class_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_type`, `sub_mark`, `full_marks`, `subject_group`, `class_id`) VALUES
(1, 'Test', 1, 1, 1, 0, '1'),
(2, 'Bangla', 1, 1, 1, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject_admission_4`
--

CREATE TABLE `subject_admission_4` (
  `id_4` int(11) NOT NULL,
  `group_id_4` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_name_4` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_admission_4`
--

INSERT INTO `subject_admission_4` (`id_4`, `group_id_4`, `subject_name_4`) VALUES
(1, 'SCIENCE', 'Physics'),
(2, 'BUSINESS_STUDIES', 'Accounting'),
(3, 'HUMANITIES', 'Economics'),
(4, 'HUMANITIES', 'Civics'),
(5, 'HUMANITIES', 'Social Sciences'),
(6, 'HUMANITIES', 'Islamic History'),
(7, 'HUMANITIES', 'Geography and Logic');

-- --------------------------------------------------------

--
-- Table structure for table `subject_admission_5`
--

CREATE TABLE `subject_admission_5` (
  `id_5` int(11) NOT NULL,
  `group_id_5` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_name_5` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_admission_5`
--

INSERT INTO `subject_admission_5` (`id_5`, `group_id_5`, `subject_name_5`) VALUES
(1, 'SCIENCE', 'Chemistry'),
(2, 'BUSINESS_STUDIES', 'Management'),
(3, 'HUMANITIES', 'Economics'),
(4, 'HUMANITIES', 'Civics'),
(5, 'HUMANITIES', 'Social Sciences'),
(6, 'HUMANITIES', 'Islamic History'),
(7, 'HUMANITIES', 'Geography and Logic');

-- --------------------------------------------------------

--
-- Table structure for table `subject_admission_6`
--

CREATE TABLE `subject_admission_6` (
  `id_6` int(11) NOT NULL,
  `group_id_6` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_name_6` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_admission_6`
--

INSERT INTO `subject_admission_6` (`id_6`, `group_id_6`, `subject_name_6`) VALUES
(1, 'SCIENCE', 'Biology'),
(2, 'SCIENCE', 'Mathematics'),
(3, 'BUSINESS_STUDIES', 'Finance, Banking and Insurance'),
(4, 'HUMANITIES', 'Economics'),
(5, 'HUMANITIES', 'Civics'),
(6, 'HUMANITIES', 'Social Sciences'),
(7, 'HUMANITIES', 'Islamic History'),
(8, 'HUMANITIES', 'Geography and Logic');

-- --------------------------------------------------------

--
-- Table structure for table `subject_admission_7`
--

CREATE TABLE `subject_admission_7` (
  `id_7` int(11) NOT NULL,
  `group_id_7` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_name_7` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_admission_7`
--

INSERT INTO `subject_admission_7` (`id_7`, `group_id_7`, `subject_name_7`) VALUES
(1, 'SCIENCE', 'Biology'),
(2, 'SCIENCE', 'Mathematics '),
(3, 'SCIENCE', 'Psychology '),
(4, 'SCIENCE', 'Statistics '),
(5, 'SCIENCE', 'Accounting '),
(6, 'SCIENCE', 'Geography '),
(7, 'BUSINESS_STUDIES', 'Statistics'),
(8, 'HUMANITIES', 'Logic'),
(9, 'HUMANITIES', 'Mathematics'),
(10, 'HUMANITIES', 'Geography'),
(11, 'HUMANITIES', 'Psychology'),
(12, 'HUMANITIES', 'Statistics'),
(13, 'HUMANITIES', 'Arabic and Islamic Studies');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(50) NOT NULL,
  `teacher_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_dob` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_sex` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_religion` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_blood_group` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_present_address` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_phone` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `t_salary` int(20) DEFAULT NULL,
  `t_password` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '8cb2237d0679ca88db6464eac60da96345513964',
  `t_image_path` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `t_name`, `t_dob`, `t_sex`, `t_religion`, `t_blood_group`, `t_present_address`, `t_phone`, `t_salary`, `t_password`, `t_image_path`) VALUES
(1, '3534', 'Teacher', '2018-06-13', 'Male', 'Hinduism', 'A+', 'fhfghfghfghfg', '01730974883', 201212122, '8cb2237d0679ca88db6464eac60da96345513964', '3534.jpg'),
(2, '666', 'hgfhfg', '2018-07-11', 'Male', 'Hinduism', 'B+', 'hvfgngjfghgtfujg', '436456456547657657657567567', 2147483647, '8cb2237d0679ca88db6464eac60da96345513964', '666_null');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `id` int(12) NOT NULL,
  `teacher_id` int(12) NOT NULL,
  `t_class_id` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`id`, `teacher_id`, `t_class_id`) VALUES
(1, 666, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `u_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `roll` int(10) DEFAULT NULL,
  `avatar` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `u_name`, `pass`, `roll`, `avatar`, `created_at`) VALUES
(6, 'Rifat Hasan', 'Teacher', '8cb2237d0679ca88db6464eac60da96345513964', 2, NULL, '2018-02-04 11:02:36.000000'),
(7, 'Admin', 'Admin', '8cb2237d0679ca88db6464eac60da96345513964', 1, 'city.png', '2018-02-04 12:58:32.000000'),
(8, 'Accounce', 'Accounce', '8cb2237d0679ca88db6464eac60da96345513964', 4, NULL, '2018-02-04 12:59:09.000000'),
(9, 'Anowar', 'Student', '8cb2237d0679ca88db6464eac60da96345513964', 3, NULL, '2018-02-15 12:59:40.000000'),
(10, 'Ismail Ahmed', 'Ismail', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, NULL, '2018-02-06 00:00:00.000000'),
(11, 'School Admin', 's_admin', '8cb2237d0679ca88db6464eac60da96345513964', 5, 'city.png', '2018-02-06 00:00:00.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounce_head`
--
ALTER TABLE `accounce_head`
  ADD PRIMARY KEY (`head_id`);

--
-- Indexes for table `admission_exam_date`
--
ALTER TABLE `admission_exam_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_time_date`
--
ALTER TABLE `admission_time_date`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breaking_news`
--
ALTER TABLE `breaking_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_logs`
--
ALTER TABLE `daily_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_log`
--
ALTER TABLE `entry_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_term`
--
ALTER TABLE `exam_term`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `ex_student`
--
ALTER TABLE `ex_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine_start`
--
ALTER TABLE `machine_start`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_admission`
--
ALTER TABLE `online_admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_payment`
--
ALTER TABLE `receive_payment`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`school_info_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `speech`
--
ALTER TABLE `speech`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`st_id`),
  ADD UNIQUE KEY `s_id` (`s_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_admission_4`
--
ALTER TABLE `subject_admission_4`
  ADD PRIMARY KEY (`id_4`);

--
-- Indexes for table `subject_admission_5`
--
ALTER TABLE `subject_admission_5`
  ADD PRIMARY KEY (`id_5`);

--
-- Indexes for table `subject_admission_6`
--
ALTER TABLE `subject_admission_6`
  ADD PRIMARY KEY (`id_6`);

--
-- Indexes for table `subject_admission_7`
--
ALTER TABLE `subject_admission_7`
  ADD PRIMARY KEY (`id_7`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounce_head`
--
ALTER TABLE `accounce_head`
  MODIFY `head_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admission_exam_date`
--
ALTER TABLE `admission_exam_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `admission_time_date`
--
ALTER TABLE `admission_time_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `breaking_news`
--
ALTER TABLE `breaking_news`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `daily_logs`
--
ALTER TABLE `daily_logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `entry_log`
--
ALTER TABLE `entry_log`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exam_term`
--
ALTER TABLE `exam_term`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ex_student`
--
ALTER TABLE `ex_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `machine_start`
--
ALTER TABLE `machine_start`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `online_admission`
--
ALTER TABLE `online_admission`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photo_gallery`
--
ALTER TABLE `photo_gallery`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `receive_payment`
--
ALTER TABLE `receive_payment`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `school_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `sms_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `speech`
--
ALTER TABLE `speech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `st_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject_admission_4`
--
ALTER TABLE `subject_admission_4`
  MODIFY `id_4` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subject_admission_5`
--
ALTER TABLE `subject_admission_5`
  MODIFY `id_5` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subject_admission_6`
--
ALTER TABLE `subject_admission_6`
  MODIFY `id_6` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject_admission_7`
--
ALTER TABLE `subject_admission_7`
  MODIFY `id_7` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
