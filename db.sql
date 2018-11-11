-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2018 at 10:23 AM
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
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `post_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `commented_by`, `body`, `commented_time`, `deleted`, `post_id`) VALUES
(3, 'deepak_thakur1541893581', 'ok', '2018-11-11 05:20:03', 1, 130),
(4, 'jitendra_sharma1541893582', 'hi', '2018-11-11 15:20:58', 0, 130),
(5, 'deepak_thakur1541893581', 'hi', '2018-11-11 15:21:49', 1, 130),
(6, 'deepak_thakur1541893581', 'hi', '2018-11-11 15:24:41', 0, 130);

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
('deepak_thakur1541893581', 1, 6),
('jitendra_sharma1541893582', 1, 3),
('jitendra_sharma1541893582', 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`request_id`, `user_from`, `user_to`, `request_time`, `accepted`, `deleted`) VALUES
(143, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', '2018-11-11 05:16:46', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_from`, `user_to`, `message_body`, `time`, `deleted`) VALUES
(136, 'deepak_thakur1541893581', 'jitendra_sharma1541893582', 'hi', '2018-11-11 05:17:47', 1),
(137, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', 'hi', '2018-11-11 05:17:51', 1),
(138, 'deepak_thakur1541893581', 'jitendra_sharma1541893582', 'what are u doing?', '2018-11-11 05:18:03', 1),
(139, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', 'nothing', '2018-11-11 05:18:10', 1),
(140, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', 'do we have to complete our assignment', '2018-11-11 05:18:37', 1),
(141, 'deepak_thakur1541893581', 'jitendra_sharma1541893582', 'no', '2018-11-11 05:18:43', 1),
(142, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', 'why', '2018-11-11 05:18:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_from` varchar(60) DEFAULT NULL,
  `user_to` varchar(60) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `notification_body` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `notification_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `viewed` tinyint(1) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_from`, `user_to`, `type`, `notification_body`, `link`, `notification_time`, `viewed`, `deleted`) VALUES
(102, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', 'post', 'Share a post on your profile', 'profile.php?profile_username=jitendra_sharma1541893582&post_id=130', '2018-11-11 05:19:44', 1, 1),
(103, 'deepak_thakur1541893581', 'jitendra_sharma1541893582', 'post', 'Share a post on your profile', 'profile.php?profile_username=deepak_thakur1541893581&post_id=131', '2018-11-11 05:21:09', 1, 1),
(104, 'deepak_thakur1541893581', 'jitendra_sharma1541893582', 'post', 'Share a post', 'index.php?post_id=132', '2018-11-11 15:53:00', 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_from`, `user_to`, `body`, `image`, `posted_time`, `deleted`) VALUES
(130, 'jitendra_sharma1541893582', 'deepak_thakur1541893581', 'you see', '', '2018-11-11 05:19:44', 0),
(131, 'deepak_thakur1541893581', 'jitendra_sharma1541893582', 'now my turn', '', '2018-11-11 05:21:09', 1),
(132, 'deepak_thakur1541893581', '', '', 'assets/images/post_pics/deepak_thakur15418935811541931778.png', '2018-11-11 15:53:00', 0);

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
('deepak_thakur1541893581', 1, 130),
('jitendra_sharma1541893582', 1, 130);

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
('deepak', 'thakur', 'deepak_thakur1541893581', 'deepak.singh_cs16@gla.ac.in', '25f9e794323b453885f5181f1b624d0b', '2018-11-10 23:46:20', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',jitendra_sharma1541893582,', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('Jitendra', 'Sharma', 'jitendra_sharma1541893582', 'Jks9536097795@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-11-10 23:46:21', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',deepak_thakur1541893581,', '9536097795', 'male', '1999-08-06', 'mathura', 'uttar pradesh', 'India', 'Shriji baba saraswati vidya mandir', 'Gla university', 'Despacito awesome!!!...');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
