-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 01:34 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resumesite`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(4) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `type` enum('award','certification') NOT NULL DEFAULT 'award'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `title`, `link`, `type`) VALUES
(1, 'Programming for Everybody (Getting Started with Python)', '', 'certification'),
(2, 'Python Data Structures	', '', 'certification');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subTitle` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `fromDate` varchar(50) NOT NULL,
  `toDate` varchar(50) NOT NULL,
  `gpa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `title`, `subTitle`, `content`, `fromDate`, `toDate`, `gpa`) VALUES
(14, 'KERMANSHAH UNIVERSITY OF TECHNOLOGY', 'KUT', 'Computer Engineer - Web Development Track\r\n', '2021', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subTitle` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `fromDate` varchar(50) NOT NULL,
  `toDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `subTitle`, `content`, `fromDate`, `toDate`) VALUES
(11, 'PHP', 'Design resumes website', 'this is my resumes website that develop with php programming language\r\n', '', ''),
(12, 'Word Presss', 'thezoom internet media', 'site address : thezoom.ir', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `genaral_info`
--

CREATE TABLE `genaral_info` (
  `firstName` varchar(100) NOT NULL,
  `webTitle` varchar(20) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `about` text NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `interest` text NOT NULL,
  `id` int(4) NOT NULL,
  `lastName` varchar(11) NOT NULL,
  `profilePic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `genaral_info`
--

INSERT INTO `genaral_info` (`firstName`, `webTitle`, `tel`, `mail`, `address`, `about`, `facebook`, `linkedin`, `twitter`, `instagram`, `interest`, `id`, `lastName`, `profilePic`) VALUES
('first Name', 'Website Title', '0987654321', 'exapmle28@gmail.com', 'your address', 'Back-End web developer with php programing language', 'https://www.facebook.com/', 'https://www.linkedin.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'I am a PHP programmer with 6 months of work experience in software development and web development. I have a strong interest in working in team-oriented environments.', 1, 'last Name', 'uploads/profile_10446.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `id` int(15) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(4) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `skills_tools`
--

CREATE TABLE `skills_tools` (
  `id` int(4) NOT NULL,
  `logo` text NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `skills_tools`
--

INSERT INTO `skills_tools` (`id`, `logo`, `title`) VALUES
(3, 'fa-html5    ', 'fa-html5    '),
(4, 'fa-css3-alt    ', 'fa-css3-alt    '),
(5, 'fa-wordpress    ', 'fa-wordpress    '),
(6, 'fa-python    ', 'fa-python    '),
(7, 'fa-php    ', 'fa-php    ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'c93ccd78b2076528346216b3b2f701e6', 'example@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genaral_info`
--
ALTER TABLE `genaral_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills_tools`
--
ALTER TABLE `skills_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genaral_info`
--
ALTER TABLE `genaral_info`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills_tools`
--
ALTER TABLE `skills_tools`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
