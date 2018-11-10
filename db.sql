-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2018 at 09:46 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commented_by` varchar(60) NOT NULL,
  `body` tinytext NOT NULL,
  `commented_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_closed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `post_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

DROP TABLE IF EXISTS `comment_likes`;
CREATE TABLE IF NOT EXISTS `comment_likes` (
  `username` varchar(60) NOT NULL,
  `liked` tinyint(1) NOT NULL DEFAULT '1',
  `comment_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`username`,`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
CREATE TABLE IF NOT EXISTS `friend_requests` (
  `request_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `request_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`request_id`, `user_from`, `user_to`, `request_time`, `accepted`, `deleted`) VALUES
(59, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', '2018-11-10 05:03:46', 1, 1),
(60, 'arpit_gupta1541808987', 'deepak_thakur1541806323', '2018-11-10 05:46:50', NULL, 0),
(61, 'arpit_gupta1541808987', 'jitendra_sharma1541806301', '2018-11-10 05:51:34', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `message_body` tinytext NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_from`, `user_to`, `message_body`, `time`, `deleted`) VALUES
(87, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', 'hi', '2018-11-10 05:05:43', 1),
(88, 'deepak_thakur1541806323', 'jitendra_sharma1541806301', 'hi bro', '2018-11-10 05:05:52', 1),
(89, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', 'so, is everything alright', '2018-11-10 05:06:17', 1),
(90, 'deepak_thakur1541806323', 'jitendra_sharma1541806301', 'yes', '2018-11-10 05:06:27', 1),
(91, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', 'gn', '2018-11-10 05:06:37', 1),
(92, 'deepak_thakur1541806323', 'jitendra_sharma1541806301', 'bye', '2018-11-10 05:09:27', 1),
(93, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', 'sweet dreams', '2018-11-10 05:18:47', 1),
(94, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', 'bye', '2018-11-10 05:19:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `type` varchar(10) NOT NULL,
  `notification_body` tinytext NOT NULL,
  `link` varchar(255) NOT NULL,
  `notification_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_from`, `user_to`, `body`, `image`, `posted_time`, `deleted`) VALUES
(14, 'jitendra_sharma1541806301', '', '', 'assets/images/post_pics/jitendra_sharma15418063011541806360.png', '2018-11-10 05:02:41', 0),
(15, 'deepak_thakur1541806323', '', '', 'assets/images/post_pics/deepak_thakur15418063231541806370.png', '2018-11-10 05:02:51', 0),
(16, 'jitendra_sharma1541806301', 'deepak_thakur1541806323', 'hi deepak', '', '2018-11-10 05:04:42', 0),
(17, 'deepak_thakur1541806323', 'jitendra_sharma1541806301', 'ok', '', '2018-11-10 05:04:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE IF NOT EXISTS `post_likes` (
  `username` varchar(60) NOT NULL,
  `liked` tinyint(1) NOT NULL DEFAULT '1',
  `post_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`username`,`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(255) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `deactivate_account` tinyint(1) NOT NULL DEFAULT '0',
  `friend_array` text,
  `phone_no` varchar(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `bio` tinytext,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `cover_pic`, `deactivate_account`, `friend_array`, `phone_no`, `gender`, `birthday`, `city`, `state`, `country`, `school`, `college`, `bio`) VALUES
('arpit', 'gupta', 'arpit_gupta1541808987', 'arpit.gupta_cs16@gla.ac.in', '25f9e794323b453885f5181f1b624d0b', '2018-11-10 00:16:26', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bas name hi kaafi hai'),
('deepak', 'thakur', 'deepak_thakur1541806323', 'deepak.singh_cs16@gla.ac.in', '25f9e794323b453885f5181f1b624d0b', '2018-11-09 23:32:03', 'assets/images/profile_pics/deepak_thakur15418063231541808911.png', 'assets/images/cover_pics/deepak_thakur15418063231541808945.png', 0, ',jitendra_sharma1541806301,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Jitendra', 'Sharma', 'jitendra_sharma1541806301', 'Jks9536097795@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-11-09 23:31:40', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',deepak_thakur1541806323,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
