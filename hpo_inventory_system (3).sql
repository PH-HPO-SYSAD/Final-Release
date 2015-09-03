-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2015 at 10:19 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hpo_inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
`asset_id` int(10) unsigned NOT NULL,
  `tag_number` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `asset_history` varchar(75) NOT NULL,
  `model` varchar(75) DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `serial_number` varchar(45) DEFAULT NULL,
  `control_number` varchar(45) DEFAULT NULL,
  `color` varchar(75) DEFAULT NULL,
  `warranty` tinyint(1) DEFAULT '0',
  `status` enum('working','defective') NOT NULL DEFAULT 'working',
  `remarks` varchar(255) DEFAULT NULL,
  `warranty_end` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `tag_number`, `description`, `category_id`, `asset_history`, `model`, `brand_id`, `serial_number`, `control_number`, `color`, `warranty`, `status`, `remarks`, `warranty_end`, `created_at`, `updated_at`) VALUES
(18, 'MOUSE-GENIUS-0030', NULL, 12, '', NULL, 1, NULL, NULL, 'Black', 0, 'working', NULL, NULL, '2015-09-03 03:05:51', '0000-00-00 00:00:00'),
(19, 'MOUSE-GENIUS-4655', NULL, 12, '', NULL, 1, NULL, NULL, NULL, 0, 'working', NULL, NULL, '2015-09-03 05:50:37', '0000-00-00 00:00:00'),
(20, 'TABLE-CUBICLE', '', 18, 'Brand New', '', 7, '12312312', '', 'Brown', 0, 'working', NULL, '0000-00-00', '2015-09-02 23:17:26', '2015-09-02 23:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `asset_tags`
--

CREATE TABLE IF NOT EXISTS `asset_tags` (
`asset_tag_id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asset_users`
--

CREATE TABLE IF NOT EXISTS `asset_users` (
`asset_user_id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL,
  `name` varchar(75) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brand_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Genius', '2015-08-10 03:46:47', '0000-00-00 00:00:00'),
(2, 'Samsung', '2015-08-10 03:46:47', '0000-00-00 00:00:00'),
(3, 'AOC', '2015-08-19 23:54:10', '0000-00-00 00:00:00'),
(4, 'ACER', '2015-08-19 23:54:21', '0000-00-00 00:00:00'),
(5, 'View Sonic', '2015-08-19 23:54:32', '0000-00-00 00:00:00'),
(6, 'LG', '2015-08-19 23:54:42', '0000-00-00 00:00:00'),
(7, 'Cubicle', '2015-08-28 05:41:50', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`category_id` int(10) unsigned NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CPU', 'Desktop', '2015-08-19 23:46:25', '0000-00-00 00:00:00'),
(2, 'HR', 'Handheld Radio', '2015-08-19 23:47:16', '0000-00-00 00:00:00'),
(3, 'IPC', 'IP Camera', '2015-08-19 23:47:38', '0000-00-00 00:00:00'),
(4, 'LPT', 'Laptop', '2015-08-19 23:48:02', '0000-00-00 00:00:00'),
(5, 'MIC', 'Microphone', '2015-08-19 23:48:40', '0000-00-00 00:00:00'),
(6, 'NS', 'Network Switch', '2015-08-19 23:49:10', '0000-00-00 00:00:00'),
(7, 'NR', 'Network Router', '2015-08-19 23:49:26', '0000-00-00 00:00:00'),
(8, 'PRNTR', 'Printer', '2015-08-19 23:50:03', '0000-00-00 00:00:00'),
(9, 'SOFT', 'Software', '2015-08-19 23:50:43', '0000-00-00 00:00:00'),
(10, 'HDST', 'Headset', '2015-08-19 23:51:10', '0000-00-00 00:00:00'),
(11, 'KYBRD', 'Keyboard', '2015-08-19 23:51:31', '0000-00-00 00:00:00'),
(12, 'MSE', 'Mouse', '2015-08-19 23:51:50', '0000-00-00 00:00:00'),
(13, 'OFFS', 'Office Station', '2015-08-19 23:52:12', '0000-00-00 00:00:00'),
(14, 'PRJR', 'Projector', '2015-08-19 23:52:43', '0000-00-00 00:00:00'),
(15, 'SPKR', 'Speaker', '2015-08-19 23:53:01', '0000-00-00 00:00:00'),
(16, 'PSU', 'Power Supply', '2015-08-19 23:53:24', '0000-00-00 00:00:00'),
(17, 'MNTR', 'Monitor', '2015-08-20 00:55:24', '0000-00-00 00:00:00'),
(18, 'TABLE', 'Cubicle', '2015-08-28 05:40:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `computers`
--

CREATE TABLE IF NOT EXISTS `computers` (
`computer_id` int(10) unsigned NOT NULL,
  `computer_number` varchar(5) NOT NULL,
  `location` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `computers`
--

INSERT INTO `computers` (`computer_id`, `computer_number`, `location`, `created_at`, `updated_at`) VALUES
(1, '026', '3rd Floor', '2015-08-07 07:07:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `computer_assets`
--

CREATE TABLE IF NOT EXISTS `computer_assets` (
`computer_asset_id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL,
  `computer_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `computer_specifications`
--

CREATE TABLE IF NOT EXISTS `computer_specifications` (
`computer_specification_id` int(10) unsigned NOT NULL,
  `computer_id` int(10) unsigned NOT NULL,
  `specification_id` int(10) unsigned NOT NULL,
  `description` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `computer_users`
--

CREATE TABLE IF NOT EXISTS `computer_users` (
  `computer_user_id` int(11) NOT NULL,
  `computer_id` int(10) unsigned NOT NULL,
  `name` varchar(75) NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
`department_id` int(10) unsigned NOT NULL,
  `code` varchar(15) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `deployment`
--

CREATE TABLE IF NOT EXISTS `deployment` (
`id` int(10) unsigned NOT NULL,
  `asset_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `employee_id` int(10) unsigned NOT NULL,
  `location_id` int(10) unsigned NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `department`, `created_at`, `updated_at`) VALUES
(1, 'Rosemale-John II', 'WebDev', '2015-09-03 03:21:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st Floor', '2015-09-01 02:03:47', '0000-00-00 00:00:00'),
(2, '2nd Floor', '2015-09-01 02:03:47', '0000-00-00 00:00:00'),
(3, '3rd Floor', '2015-09-01 02:03:59', '0000-00-00 00:00:00'),
(4, '4th Floor', '2015-09-01 02:03:59', '0000-00-00 00:00:00'),
(5, 'Stock room', '2015-09-01 02:04:06', '0000-00-00 00:00:00');

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
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operatingsystems`
--

CREATE TABLE IF NOT EXISTS `operatingsystems` (
`operatingsystems_id` int(10) unsigned NOT NULL,
  `name` varchar(75) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pincode_request`
--

CREATE TABLE IF NOT EXISTS `pincode_request` (
`id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `conf_pincode` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pincode_request`
--

INSERT INTO `pincode_request` (`id`, `pincode`, `conf_pincode`) VALUES
(1, 1998, 1998);

-- --------------------------------------------------------

--
-- Table structure for table `specifications`
--

CREATE TABLE IF NOT EXISTS `specifications` (
`specification_id` int(11) unsigned NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`tag_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `name`, `created_at`, `updated_at`) VALUES
(1, '0', '2015-08-10 07:29:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `account_type` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `account_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Jayson R. Alanano', 'jayson0098', '$2y$10$YwSnJa6E80Wvvq.bCEFnW.gacz.TntOjGw25I0NKi8gdUReFxf816', 'admin', 'oXVv2v2ZfqY7aJpTYHKwGaMcHfNiworXHGngb68A9ukzMqViYFqD3CP5DhpY', '2015-08-18 23:12:49', '2015-08-27 21:24:00'),
(4, 'Standard User', 'staff01', '$2y$10$olJwXOUd0lX3O.hO7Kg/dukS7yhE8Dh6/3aBwkxmgwCVqOR9jYHIa', 'user', 'lYhJD6d9XePnA6CnqnYdwj4VgmOHa02Uxl9sM0TaT7VDFv6CLZ9Ha8AVPx99', '2015-08-19 20:29:06', '2015-08-25 17:42:22'),
(5, 'Rosemale-John', 'rosemalejohn', '$2y$10$pJlijXx/QXVH4URP1xh2Oe3HvBO/skdM8Cpx6wwZF5YtDTH9oUGbW', 'admin', '5S7ozEMhI8FsfA6SB2rXlnStgDhm8RXtnq4dQBkePBO1d9feuuvjhRVzw5PJ', '2015-08-31 17:53:22', '2015-09-01 18:36:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
 ADD PRIMARY KEY (`asset_id`), ADD UNIQUE KEY `serial_number` (`serial_number`,`control_number`), ADD KEY `brand_id` (`brand_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `asset_tags`
--
ALTER TABLE `asset_tags`
 ADD PRIMARY KEY (`asset_tag_id`), ADD KEY `asset_id` (`asset_id`), ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `asset_users`
--
ALTER TABLE `asset_users`
 ADD PRIMARY KEY (`asset_user_id`), ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `computers`
--
ALTER TABLE `computers`
 ADD PRIMARY KEY (`computer_id`), ADD UNIQUE KEY `computer_number` (`computer_number`);

--
-- Indexes for table `computer_assets`
--
ALTER TABLE `computer_assets`
 ADD PRIMARY KEY (`computer_asset_id`), ADD KEY `asset_id` (`asset_id`), ADD KEY `computer_id` (`computer_id`);

--
-- Indexes for table `computer_specifications`
--
ALTER TABLE `computer_specifications`
 ADD PRIMARY KEY (`computer_specification_id`), ADD KEY `computer_id` (`computer_id`), ADD KEY `specification_id` (`specification_id`);

--
-- Indexes for table `computer_users`
--
ALTER TABLE `computer_users`
 ADD KEY `computer_id` (`computer_id`), ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
 ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `deployment`
--
ALTER TABLE `deployment`
 ADD PRIMARY KEY (`id`), ADD KEY `asset_id` (`asset_id`), ADD KEY `assigned_asset_id` (`parent_id`), ADD KEY `parent_id` (`parent_id`), ADD KEY `employee_id` (`employee_id`), ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `operatingsystems`
--
ALTER TABLE `operatingsystems`
 ADD PRIMARY KEY (`operatingsystems_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pincode_request`
--
ALTER TABLE `pincode_request`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
 ADD PRIMARY KEY (`specification_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
MODIFY `asset_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `asset_tags`
--
ALTER TABLE `asset_tags`
MODIFY `asset_tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `asset_users`
--
ALTER TABLE `asset_users`
MODIFY `asset_user_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `computers`
--
ALTER TABLE `computers`
MODIFY `computer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `computer_assets`
--
ALTER TABLE `computer_assets`
MODIFY `computer_asset_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `computer_specifications`
--
ALTER TABLE `computer_specifications`
MODIFY `computer_specification_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
MODIFY `department_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deployment`
--
ALTER TABLE `deployment`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `operatingsystems`
--
ALTER TABLE `operatingsystems`
MODIFY `operatingsystems_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pincode_request`
--
ALTER TABLE `pincode_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
MODIFY `specification_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `tag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
ADD CONSTRAINT `assets_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `assets_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asset_tags`
--
ALTER TABLE `asset_tags`
ADD CONSTRAINT `asset_tags_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `asset_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asset_users`
--
ALTER TABLE `asset_users`
ADD CONSTRAINT `asset_users_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer_assets`
--
ALTER TABLE `computer_assets`
ADD CONSTRAINT `computer_assets_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `computer_assets_ibfk_2` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`computer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer_specifications`
--
ALTER TABLE `computer_specifications`
ADD CONSTRAINT `computer_specifications_ibfk_1` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`computer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `computer_specifications_ibfk_2` FOREIGN KEY (`specification_id`) REFERENCES `specifications` (`specification_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `computer_users`
--
ALTER TABLE `computer_users`
ADD CONSTRAINT `computer_users_ibfk_1` FOREIGN KEY (`computer_id`) REFERENCES `computers` (`computer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `computer_users_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deployment`
--
ALTER TABLE `deployment`
ADD CONSTRAINT `deployment_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `assets` (`asset_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `deployment_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `assets` (`asset_id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `deployment_ibfk_3` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `deployment_ibfk_4` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
