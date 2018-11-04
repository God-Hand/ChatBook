-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 03, 2018 at 01:55 PM
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
  `commented_by` varchar(50) NOT NULL,
  `body` tinytext NOT NULL,
  `commented_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_closed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `post_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

DROP TABLE IF EXISTS `comment_likes`;
CREATE TABLE IF NOT EXISTS `comment_likes` (
  `username` varchar(50) NOT NULL,
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
  `user_from` varchar(50) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `request_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `accepted` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(50) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `message_body` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(50) NOT NULL,
  `user_to` varchar(50) NOT NULL,
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
  `user_from` varchar(50) NOT NULL,
  `user_to` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_closed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

DROP TABLE IF EXISTS `post_likes`;
CREATE TABLE IF NOT EXISTS `post_likes` (
  `username` varchar(50) NOT NULL,
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
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `profile_pic` varchar(255) NOT NULL,
  `cover_pic` varchar(255) NOT NULL,
  `deactivate_account` tinyint(1) NOT NULL DEFAULT '0',
  `friend_array` text,
  `moblie` varchar(15) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `home_town` tinytext,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `school` text,
  `college` text,
  `position` text,
  `company` text,
  `bio` tinytext,
  `is_online` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `profile_pic`, `cover_pic`, `deactivate_account`, `friend_array`, `moblie`, `gender`, `birthday`, `home_town`, `city`, `country`, `school`, `college`, `position`, `company`, `bio`, `is_online`) VALUES
('arpit', 'sharma', 'arpit_sharma1541238046', 'arpit_cs@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-11-03 09:40:45', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('jitendra', 'sharma', 'jitrendra_sharma1541174297', 'Jks9536097795@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-11-02 15:58:17', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_durations`
--

DROP TABLE IF EXISTS `user_login_durations`;
CREATE TABLE IF NOT EXISTS `user_login_durations` (
  `username` varchar(50) NOT NULL,
  `login_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`login_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
