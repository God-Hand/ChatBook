-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2018 at 07:08 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `commented_by`, `body`, `commented_time`, `deleted`, `post_id`) VALUES
(1, 'jitrendra_sharma1543819574', 'hi', '2018-12-05 12:37:13', 0, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`request_id`, `user_from`, `user_to`, `request_time`, `accepted`, `deleted`) VALUES
(1, 'deepak_singh1543819622', 'jitrendra_sharma1543819574', '2018-12-03 12:19:01', NULL, 1),
(2, 'deepak_singh1543819622', 'jitrendra_sharma1543819574', '2018-12-03 13:57:29', NULL, 1),
(3, 'deepak_singh1543819622', 'jitrendra_sharma1543819574', '2018-12-03 13:57:31', 1, 1),
(4, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-05 12:39:27', NULL, 1),
(5, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:39', NULL, 1),
(6, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:41', NULL, 1),
(7, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:42', NULL, 1),
(8, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:42', NULL, 1),
(9, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:42', NULL, 1),
(10, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:43', NULL, 1),
(11, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', '2018-12-06 07:06:45', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `user_from`, `user_to`, `message_body`, `time`, `deleted`) VALUES
(1, 'jitrendra_sharma1543819574', 'deepak_singh1543819622', 'done', '2018-12-05 12:39:58', 0),
(2, 'deepak_singh1543819622', 'jitrendra_sharma1543819574', 'hi', '2018-12-06 07:07:40', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_from`, `user_to`, `body`, `image`, `posted_time`, `deleted`) VALUES
(1, 'deepak_singh1543819622', '', '', 'assets/images/post_pics/deepak_singh15438196221543819653.png', '2018-12-03 12:17:40', 1),
(2, 'deepak_singh1543819622', '', 'See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg See jvdvdbf f f d fd rgfdg', 'assets/images/post_pics/deepak_singh15438196221543826815.png', '2018-12-03 14:17:14', 1),
(3, 'deepak_singh1543819622', '', '', 'assets/images/post_pics/deepak_singh15438196221543832180.png', '2018-12-03 15:46:21', 1),
(4, 'jitrendra_sharma1543819574', '', 'see this', 'assets/images/post_pics/jitrendra_sharma15438195741543993596.png', '2018-12-05 12:36:42', 0);

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
('jitrendra_sharma1543819574', 0, 4);

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
  `verification_token` varchar(8) DEFAULT NULL,
  `forgot_token` varchar(8) DEFAULT NULL,
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

INSERT INTO `users` (`first_name`, `last_name`, `username`, `email`, `password`, `verification_token`, `forgot_token`, `signup_date`, `profile_pic`, `cover_pic`, `deactivate_account`, `friend_array`, `phone_no`, `gender`, `birthday`, `city`, `state`, `country`, `school`, `college`, `bio`, `is_online`) VALUES
('Jitendra', 'Sharma', 'jitendra_sharma1544202659', 'jks9536097795@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL, '6NZ8Fjht', '2018-12-07 17:10:58', 'assets/images/profile_pics/defaults/profile_pic.png', 'assets/images/cover_pics/defaults/cover_pic.jpg', 0, ',', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
