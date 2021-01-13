-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2021 at 06:31 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql books`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(30) NOT NULL,
  `author_email` varchar(20) NOT NULL,
  `cover_picture` varchar(10) DEFAULT NULL,
  `dt_publish` date NOT NULL,
  `review` text NOT NULL,
  `isbn_number` text NOT NULL,
  `price` float NOT NULL,
  `type` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `is_paperback` bit(1) NOT NULL,
  `is_hardback` bit(1) NOT NULL,
  `is_ebook` bit(1) NOT NULL,
  `in_stock` bit(1) NOT NULL,
  `dt_modified` timestamp NOT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `author_email`, `cover_picture`, `dt_publish`, `review`, `isbn_number`, `price`, `type`, `rating`, `is_paperback`, `is_hardback`, `is_ebook`, `in_stock`, `dt_modified`) VALUES
(101, 'hamlet', 'abcd@gmail.com', 'def.jpeg', '2021-01-19', 'bestest book', '567689098907455667788909', 678, 1, 5, b'0', b'1', b'0', b'1', '2021-01-19 18:28:10'),
(106, 'sherlock holmes', 'holme@gmail.com', NULL, '2020-06-17', 'one of the famous books ', '65786349211', 700, 1, 4, b'1', b'0', b'1', b'1', '2020-03-12 14:13:11'),
(107, 'chanakya\'s chant', 'chanakya@gmail.com', NULL, '2020-04-01', 'the best book', '5765876897', 400, 3, 2, b'0', b'1', b'1', b'1', '2020-11-18 14:19:54'),
(108, 'ramayanaa', 'valmiki@gmail.com', NULL, '2020-09-09', 'the best book', '789797075667', 700, 2, 4, b'1', b'0', b'1', b'1', '2020-11-27 14:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
CREATE TABLE IF NOT EXISTS `book_categories` (
  `bkcat_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`bkcat_id`),
  KEY `category` (`book_id`),
  KEY `category2` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2008 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`bkcat_id`, `book_id`, `cat_id`) VALUES
(2005, 106, 204),
(2006, 107, 203),
(2007, 108, 201);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`) VALUES
(201, 'Drama'),
(202, 'thriller'),
(203, 'historical'),
(204, 'thriller');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD CONSTRAINT `category` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
