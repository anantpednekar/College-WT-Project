-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2019 at 05:25 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `16co63`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(10) COLLATE utf8_bin NOT NULL,
  `password` varchar(16) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
('anant63', 'Roll123456');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(4) NOT NULL,
  `question` longtext COLLATE utf8_bin,
  `is_active` enum('0','1') COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `is_active`) VALUES
(1, 'Nobel prize is awarded for which of the following disciplines : ', '0'),
(2, 'Entomology studies what?', '0'),
(3, 'Galileo was an astronomer who ', '0'),
(4, 'who is the father of geometry?', '0'),
(5, 'Who is popularly called as the Iron Man of India ?', '0'),
(6, 'When was telephone invented ?', '0'),
(7, 'Who authored the \'Forbidden Verses\' ?', '0'),
(8, 'J.B. Dunlop is popular for which of the following inventons ?', '0'),
(9, 'Which of the following item was introduces by James Watt ?', '0'),
(10, 'Vikram Seth wrote, which of the following books ?', '0');

-- --------------------------------------------------------

--
-- Table structure for table `questionchoices`
--

DROP TABLE IF EXISTS `questionchoices`;
CREATE TABLE IF NOT EXISTS `questionchoices` (
  `choice_id` int(4) NOT NULL,
  `question_id` int(4) NOT NULL,
  `choice` text COLLATE utf8_bin NOT NULL,
  `is_right_choice` enum('0','1') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`choice_id`),
  KEY `f1k` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `questionchoices`
--

INSERT INTO `questionchoices` (`choice_id`, `question_id`, `choice`, `is_right_choice`) VALUES
(1, 1, 'Literature,Peace and Economics', '0'),
(2, 1, 'Chemistry and Physics', '0'),
(3, 1, 'Medicine and Physiology', '0'),
(4, 1, 'All of the above', '1'),
(5, 2, 'Behavior of Human Being', '0'),
(6, 2, 'Insects', '1'),
(7, 2, 'History of Scientific terms', '0'),
(8, 2, 'Formation of Rocks', '0'),
(9, 3, 'Developed the Telescope', '0'),
(10, 3, 'Discovered four satellites of Jupiter', '1'),
(11, 3, 'Discovered that the movement of pendulum produces a rugular time measurement', '0'),
(12, 3, 'All of the above', '0'),
(13, 4, 'Aristotle', '0'),
(14, 4, 'Euclid', '1'),
(15, 4, 'Pythagoras', '0'),
(16, 4, 'Kepler', '0'),
(17, 5, 'Subhash Chandra Bose', '0'),
(18, 5, 'Sardar Vallabhbhai Patel', '1'),
(19, 5, 'Jawaharlal Nehru', '0'),
(20, 5, 'Govind Ballabh Pant', '0'),
(21, 6, '1870s', '1'),
(22, 6, '1880s', '0'),
(23, 6, '1850s', '0'),
(24, 6, '1860s', '0'),
(25, 7, 'D.H. Lawrence', '0'),
(26, 7, 'Salman RushDie', '0'),
(27, 7, 'Ms. Taslima Nasrin', '0'),
(28, 7, 'Abu Nuwas', '1'),
(29, 8, 'Model airplanes', '0'),
(30, 8, 'Pneumatic rubber tire', '1'),
(31, 8, 'Rubber boot', '0'),
(32, 8, 'Automobile wheel rim', '0'),
(33, 9, 'Hot air balloon', '0'),
(34, 9, 'Steam boat', '0'),
(35, 9, 'Diving bell', '0'),
(36, 9, 'Rotary Steam Engine', '1'),
(37, 10, 'A Suitable Boy', '1'),
(38, 10, 'Islamic Bomb', '0'),
(39, 10, 'My God Died Young', '0'),
(40, 10, ' Look Back in Anger', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `user_email` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `user_phone` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `user_pass` varchar(17) COLLATE utf8_bin DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_pass`, `user_dob`) VALUES
(1, 'Anant Pednekar', 'anantpednekar6', '7507079775', 'Pass1234567', '1998-10-18'),
(2, 'SomeshNarvekar', 'som1@gmail.com', '1231231234', 'Somy1122', '1998-07-18'),
(3, 'JociaMendes', 'Jmendes12@gm.com', '1122334444', 'Jmendes1122', '1998-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `userq&a`
--

DROP TABLE IF EXISTS `userq&a`;
CREATE TABLE IF NOT EXISTS `userq&a` (
  `qa_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `question_id` int(4) NOT NULL,
  `choice_id` int(4) NOT NULL,
  `is_right` enum('0','1') COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`qa_id`),
  KEY `FK2` (`choice_id`),
  KEY `FK4` (`user_id`),
  KEY `FK5` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userq&a`
--

INSERT INTO `userq&a` (`qa_id`, `user_id`, `question_id`, `choice_id`, `is_right`) VALUES
(1, 1, 1, 4, '1'),
(2, 1, 2, 8, '0'),
(3, 1, 3, 12, '0'),
(4, 1, 4, 16, '0'),
(5, 1, 5, 20, '0'),
(6, 1, 6, 24, '0'),
(7, 1, 7, 28, '1'),
(8, 1, 8, 32, '0'),
(9, 1, 9, 36, '1'),
(10, 1, 10, 40, '0'),
(11, 2, 1, 4, '1'),
(12, 2, 2, 8, '0'),
(13, 2, 3, 12, '0'),
(14, 2, 4, 16, '0'),
(15, 2, 5, 20, '0'),
(16, 2, 6, 24, '0'),
(17, 2, 7, 28, '1'),
(18, 2, 8, 32, '0'),
(19, 2, 9, 36, '1'),
(20, 2, 10, 40, '0'),
(21, 3, 1, 4, '1'),
(22, 3, 2, 6, '1'),
(23, 3, 3, 9, '0'),
(24, 3, 4, 14, '1'),
(25, 3, 5, 18, '1'),
(26, 3, 6, 22, '0'),
(27, 3, 7, 26, '0'),
(28, 3, 8, 29, '0'),
(29, 3, 9, 34, '0'),
(30, 3, 10, 37, '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questionchoices`
--
ALTER TABLE `questionchoices`
  ADD CONSTRAINT `FK` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `userq&a`
--
ALTER TABLE `userq&a`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`choice_id`) REFERENCES `questionchoices` (`choice_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `FK5` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
