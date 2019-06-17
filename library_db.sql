-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2016 at 10:03 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `book_link` varchar(512) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`book_id`, `title`, `author`, `book_link`, `category`) VALUES
(1, 'Intro To Physics', 'ABCD', '../uploaded_books/1', 'Physics'),
(2, 'Intro To Chemistry', 'ABCDE', '../uploaded_books/2', 'Chemistry'),
(3, 'Intro To Math', 'ABCDEF', '../uploaded_books/3', 'Math'),
(4, 'Intro to Database', 'Mehraj', '../uploaded_books/4', 'Database'),
(6, 'Chrome', 'Chrome', '../uploaded_books/6', 'Chrome'),
(7, 'Sample', 'Sample', '../uploaded_books/7', 'Sample'),
(8, 'Sample', 'Sample', '../uploaded_books/8', 'Sample'),
(9, 'Sample', 'Sample', '../uploaded_books/9', 'Sample'),
(10, 'Sample', 'Sample', '../uploaded_books/10', 'Sample'),
(11, 'Sample', 'Sample', '../uploaded_books/11', 'Sample'),
(12, 'Sample', 'Sample', '../uploaded_books/12', 'Sample'),
(13, 'Sample', 'Sample', '../uploaded_books/13', 'Sample'),
(14, 'Sample', 'Sample', '../uploaded_books/14', 'Sample'),
(15, 'Sample', 'Sample', '../uploaded_books/15', 'Sample'),
(16, 'Sample', 'Sample', '../uploaded_books/16', 'Sample'),
(17, 'Sample', 'Sample', '../uploaded_books/17', 'Sample'),
(18, 'Sample', 'Sample', '../uploaded_books/18', 'Sample'),
(19, 'Sample', 'Sample', '../uploaded_books/19', 'Sample'),
(20, 'Sample', 'Sample', '../uploaded_books/20', 'Sample'),
(21, 'Showmen', 'Showmen', '../uploaded_books/21', 'Showmen'),
(22, 'Showmen', 'Showmen', '../uploaded_books/22', 'Showmen'),
(23, 'Showmen', 'Showmen', '../uploaded_books/23', 'Showmen'),
(25, 'Anatomy of cats and dogs', 'DOG', '../uploaded_books/25', 'DOG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
