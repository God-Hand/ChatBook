-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2018 at 06:46 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `commented_by`, `body`, `commented_time`, `user_closed`, `deleted`, `post_id`) VALUES
(14, 'deepak_thakur1541695563', 'hi', '2018-11-08 22:40:46', 0, 0, 46),
(15, 'deepak_thakur1541695563', 'bye', '2018-11-08 23:00:01', 0, 0, 46),
(16, 'deepak_thakur1541695563', 'good night', '2018-11-08 23:26:51', 0, 0, 46),
(17, 'deepak_thakur1541695563', 'good night', '2018-11-08 23:27:30', 0, 0, 46),
(18, 'deepak_thakur1541695563', 'is it', '2018-11-08 23:28:45', 0, 0, 47);

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

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`username`, `liked`, `comment_id`) VALUES
('deepak_thakur1541695563', 0, 14);

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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`request_id`, `user_from`, `user_to`, `request_time`, `accepted`, `deleted`) VALUES
(90, 'deepak_thakur1541695563', 'jitrendra_sharma1541694954', '2018-11-08 22:21:24', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) NOT NULL,
  `user_to` varchar(60) NOT NULL,
  `message_body` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
  `opened` tinyint(1) NOT NULL DEFAULT '0',
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
  `user_closed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_from`, `user_to`, `body`, `image`, `posted_time`, `user_closed`, `deleted`) VALUES
(44, 'jitrendra_sharma1541694954', '', 'hi everyone', 'assets/images/post_pics/jitrendra_sharma15416949541541695102.png', '2018-11-08 22:08:23', 0, 0),
(45, 'deepak_thakur1541695563', '', 'hi', '', '2018-11-08 22:40:29', 0, 1),
(46, 'deepak_thakur1541695563', '', 'hi', '', '2018-11-08 22:40:40', 0, 0),
(47, 'deepak_thakur1541695563', '', 'hello everyone', '', '2018-11-08 23:14:20', 0, 0),
(48, 'deepak_thakur1541695563', '', 'see', '', '2018-11-08 23:14:42', 0, 0),
(49, 'deepak_thakur1541695563', '', '', 'assets/images/post_pics/deepak_thakur15416955631541699168.png', '2018-11-08 23:16:09', 0, 1);

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

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`username`, `liked`, `post_id`) VALUES
('deepak_thakur1541695563', 1, 46),
('deepak_thakur1541695563', 1, 47),
('deepak_thakur1541695563', 1, 48),
('deepak_thakur1541695563', 1, 49);

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
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `cover_pic`, `deactivate_account`, `friend_array`, `phone_no`, `gender`, `birthday`, `city`, `state`, `country`, `school`, `college`, `bio`, `is_online`) VALUES
('deepak', 'thakur', 'deepak_thakur1541695563', 'deepak.singh_cs16@gla.ac.in', '25f9e794323b453885f5181f1b624d0b', '2018-11-08 16:46:03', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('jitrendra', 'Sharma', 'jitrendra_sharma1541694954', 'Jks9536097795@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-11-08 16:35:54', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
