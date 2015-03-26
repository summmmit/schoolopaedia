-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2015 at 09:43 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `school_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'class-1', 1, '0000-00-00 00:00:00', '2015-03-05 15:00:00', '2015-03-05 15:00:00'),
(2, 'class-2', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'class-3', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'class-4', 1, '0000-00-00 00:00:00', '2015-03-11 15:49:18', '2015-03-11 15:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'students', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'administratior', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `session_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `activate`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manager_full_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `add_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `add_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pin_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `registration_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_for_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_for_teachers` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_for_students` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `activate`
--

INSERT INTO `school` (`id`, `name`, `manager_full_name`, `phone_number`, `email`, `add_1`, `add_2`, `city`, `state`, `country`, `pin_code`, `registration_code`, `code_for_admin`, `code_for_teachers`, `code_for_students`, `registration_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'DPS Public School', 'Sumit Singh', '', '', '259/68', 'New Defence Colony, Muradnagar', 'Ghaziabad', 'UP', 'India', '', '', '', '', '', '2015-03-06 00:00:00', '0000-00-00 00:00:00', '2015-03-05 15:00:00', '2015-03-05 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school_session`
--

CREATE TABLE IF NOT EXISTS `school_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_start` date NOT NULL,
  `session_end` date NOT NULL,
  `school_id` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(15) NOT NULL,
  `class_id` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE IF NOT EXISTS `streams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stream_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream_name`, `school_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'science', 1, '0000-00-00 00:00:00', '2015-03-11 15:00:00', '2015-03-11 15:00:00'),
(2, 'comerce', 1, '0000-00-00 00:00:00', '2015-03-11 15:00:00', '2015-03-11 15:00:00'),
(43, 'arts', 1, '0000-00-00 00:00:00', '2015-03-11 22:43:09', '2015-03-11 22:43:09'),
(44, 'sss', 1, '0000-00-00 00:00:00', '2015-03-11 22:43:50', '2015-03-11 22:43:50'),
(45, 'asdgasdgasdg', 1, '0000-00-00 00:00:00', '2015-03-11 23:07:54', '2015-03-11 23:07:54'),
(46, 'asdgasgd', 1, '0000-00-00 00:00:00', '2015-03-11 23:13:40', '2015-03-11 23:13:40'),
(47, 'science', 1, '0000-00-00 00:00:00', '2015-03-11 23:20:25', '2015-03-11 23:20:25'),
(48, 'asdgasdgasasgasdgafgasdgasdgas', 1, '0000-00-00 00:00:00', '2015-03-11 23:21:10', '2015-03-11 23:21:10'),
(49, 'asdgasdgasdg', 1, '0000-00-00 00:00:00', '2015-03-11 23:23:28', '2015-03-11 23:23:28'),
(50, 'XZCvZV', 1, '0000-00-00 00:00:00', '2015-03-11 23:25:07', '2015-03-11 23:25:07'),
(51, 'science', 1, '0000-00-00 00:00:00', '2015-03-11 23:26:51', '2015-03-11 23:26:51'),
(52, 'XZCvZV', 1, '0000-00-00 00:00:00', '2015-03-11 23:27:02', '2015-03-11 23:27:02'),
(53, 'sciencerrr', 1, '0000-00-00 00:00:00', '2015-03-11 23:28:43', '2015-03-11 23:28:43'),
(54, 'asdgasdgasdgwerwert', 1, '0000-00-00 00:00:00', '2015-03-11 23:29:06', '2015-03-11 23:29:06'),
(55, 'XZCvZVaqgdg', 1, '0000-00-00 00:00:00', '2015-03-11 23:29:17', '2015-03-11 23:29:17'),
(56, 'ssdfhsdhsdh', 1, '0000-00-00 00:00:00', '2015-03-11 23:29:43', '2015-03-11 23:29:43'),
(57, 'sdfgsdfg', 1, '0000-00-00 00:00:00', '2015-03-11 23:30:44', '2015-03-11 23:30:44'),
(58, 'sdfhsdfhsd', 1, '0000-00-00 00:00:00', '2015-03-11 23:31:10', '2015-03-11 23:31:10'),
(59, 'sdfgsdfgh', 1, '0000-00-00 00:00:00', '2015-03-11 23:34:10', '2015-03-11 23:34:10'),
(60, 'asdgasdg', 1, '0000-00-00 00:00:00', '2015-03-11 23:35:05', '2015-03-11 23:35:05'),
(61, 'zxcbzxbc', 1, '0000-00-00 00:00:00', '2015-03-11 23:37:32', '2015-03-11 23:37:32'),
(62, 'asdgasgd', 1, '0000-00-00 00:00:00', '2015-03-11 23:38:25', '2015-03-11 23:38:25'),
(63, 'asdgasgd', 1, '0000-00-00 00:00:00', '2015-03-11 23:38:42', '2015-03-11 23:38:42'),
(64, 'artsasdga', 1, '0000-00-00 00:00:00', '2015-03-11 23:38:48', '2015-03-11 23:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `voter_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email_updated_at` datetime NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password_temp` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password_updated_at` datetime NOT NULL,
  `code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `marriage_status` tinyint(1) NOT NULL,
  `relative_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `relation_with_person` tinyint(1) NOT NULL,
  `mobile_number` bigint(20) NOT NULL,
  `mobile_verified` tinyint(1) NOT NULL,
  `mobile_updated_at` datetime NOT NULL,
  `home_number` bigint(20) NOT NULL,
  `add_1` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `add_2` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pin_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address_updated_at` datetime NOT NULL,
  `pic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pic_updated_at` datetime NOT NULL,
  `permissions` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`voter_id`),
  KEY `permissions` (`permissions`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `voter_id`, `email`, `email_updated_at`, `password`, `password_temp`, `password_updated_at`, `code`, `active`, `dob`, `sex`, `marriage_status`, `relative_id`, `relation_with_person`, `mobile_number`, `mobile_verified`, `mobile_updated_at`, `home_number`, `add_1`, `add_2`, `city`, `state`, `country`, `pin_code`, `address_updated_at`, `pic`, `pic_updated_at`, `permissions`, `school_id`, `newsletter`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 'Sumit', '', 'Prasad', 'cCHzFniZhT', 'summmmit44@gmail.com', '2015-02-27 06:41:21', '$2y$10$lc3MO0UKO3r7Mq13FyYJ3.vpUGcnpEDmJqjkj5rXz294i17KsPAUy', '', '2015-02-27 06:41:21', '', 1, '0000-00-00', 1, 0, '', 0, 0, 0, '0000-00-00 00:00:00', 0, '', '', 'ghaziabad', 'uttar pradesh', '', '', '2015-02-27 06:41:21', '', '0000-00-00 00:00:00', 2, 1, 0, 'E23uLmpcp8uTPe5nQuGOOEVkXBPK7RVPHU3hx8aoLQiW3gBIKmHNRdncYlew', '0000-00-00 00:00:00', '2015-02-26 12:41:21', '2015-03-01 14:51:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `periods`
--
ALTER TABLE `periods`
  ADD CONSTRAINT `periods_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`),
  ADD CONSTRAINT `periods_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `school_session` (`id`);

--
-- Constraints for table `school_session`
--
ALTER TABLE `school_session`
  ADD CONSTRAINT `school_session_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `streams`
--
ALTER TABLE `streams`
  ADD CONSTRAINT `streams_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`),
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permissions`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
