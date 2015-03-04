-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 09:57 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'students', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'administratior', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_02_26_083032_create_classes_table', 1),
('2015_02_26_083032_create_groups_table', 1),
('2015_02_26_083032_create_periods_table', 1),
('2015_02_26_083032_create_schools_table', 1),
('2015_02_26_083032_create_streams_table', 1),
('2015_02_26_083032_create_subjects_table', 1),
('2015_02_26_083032_create_users_table', 1),
('2015_02_26_083034_add_foreign_keys_to_classes_table', 1),
('2015_02_26_083034_add_foreign_keys_to_periods_table', 1),
('2015_02_26_083034_add_foreign_keys_to_streams_table', 1),
('2015_02_26_083034_add_foreign_keys_to_subjects_table', 1);

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
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `school_id` (`school_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE IF NOT EXISTS `school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manager_full_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `add_1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `add_2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `registration_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_for_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_for_teachers` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_for_students` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `registration_date` date NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `newsletter` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`voter_id`),
  KEY `permissions` (`permissions`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `voter_id`, `email`, `email_updated_at`, `password`, `password_temp`, `password_updated_at`, `code`, `active`, `dob`, `sex`, `marriage_status`, `relative_id`, `relation_with_person`, `mobile_number`, `mobile_verified`, `mobile_updated_at`, `home_number`, `add_1`, `add_2`, `city`, `state`, `country`, `pin_code`, `address_updated_at`, `pic`, `pic_updated_at`, `permissions`, `newsletter`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(14, 'Sumit', '', 'Prasad', 'cCHzFniZhT', 'summmmit44@gmail.com', '2015-02-27 06:41:21', '$2y$10$lc3MO0UKO3r7Mq13FyYJ3.vpUGcnpEDmJqjkj5rXz294i17KsPAUy', '', '2015-02-27 06:41:21', '', 1, '0000-00-00', 1, 0, '', 0, 0, 0, '0000-00-00 00:00:00', 0, '', '', 'ghaziabad', 'uttar pradesh', '', '', '2015-02-27 06:41:21', '', '0000-00-00 00:00:00', 2, 0, 'E23uLmpcp8uTPe5nQuGOOEVkXBPK7RVPHU3hx8aoLQiW3gBIKmHNRdncYlew', '0000-00-00 00:00:00', '2015-02-26 21:41:21', '2015-03-01 23:51:40');

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
  ADD CONSTRAINT `periods_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `school_session` (`id`),
  ADD CONSTRAINT `periods_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`id`);

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permissions`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
