-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 13, 2021 at 06:08 PM
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
-- Database: `mysqlbooks1`
--

-- --------------------------------------------------------

--
-- Table structure for table `books2`
--

DROP TABLE IF EXISTS `books2`;
CREATE TABLE IF NOT EXISTS `books2` (
  `book_id` int(10) NOT NULL,
  `book_name` varchar(25) NOT NULL,
  `author_email` varchar(20) NOT NULL,
  `cover_picture` varchar(10) DEFAULT NULL,
  `dt_publish` date NOT NULL,
  `review` text NOT NULL,
  `isbn_number` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `type` int(10) NOT NULL,
  `rating` int(11) NOT NULL,
  `is_paperback` bit(2) NOT NULL,
  `is_hardback` bit(2) NOT NULL,
  `is_ebook` bit(2) NOT NULL,
  `in_stock` bit(2) NOT NULL,
  `dt_modified` timestamp NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books2`
--

INSERT INTO `books2` (`book_id`, `book_name`, `author_email`, `cover_picture`, `dt_publish`, `review`, `isbn_number`, `price`, `type`, `rating`, `is_paperback`, `is_hardback`, `is_ebook`, `in_stock`, `dt_modified`) VALUES
(111, 'jungle book', 'abc@gmail.com', 'abc.jpg', '2020-12-20', 'best book', '46758697234565', 234.00, 1, 4, b'00', b'01', b'00', b'01', '2021-02-02 18:30:01'),
(112, 'hamlet', 'def@gmail.com', 'def.jpg', '2020-11-21', 'nice book', '4677668768567', 256.00, 0, 3, b'01', b'00', b'01', b'01', '2021-02-02 18:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

DROP TABLE IF EXISTS `book_categories`;
CREATE TABLE IF NOT EXISTS `book_categories` (
  `bkcat_id` int(10) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bkcat_id`),
  KEY `book_id` (`book_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`bkcat_id`, `book_id`, `cat_id`) VALUES
(1002, 111, 101),
(1003, 112, 102);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL,
  `category` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`) VALUES
(101, 'novel'),
(102, 'magazine');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
