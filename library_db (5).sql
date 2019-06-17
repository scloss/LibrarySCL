-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2016 at 11:11 AM
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
(1, 'Edge Core Training', 'Base IT', '../uploaded_books/1', 'Networking'),
(2, 'Networking basics and terminology', 'N/A', '../uploaded_books/2', 'Networking'),
(3, 'Optical Communication', 'Narottam Das', '../uploaded_books/3', 'Networking'),
(4, 'Optical Fiber Communications', 'JOHN M. SENIOR', '../uploaded_books/4', 'Networking'),
(5, 'Optical Networks 3rd Edition', 'Rajiv Ramaswami, Kumar N. Sivarjan, Galen H. Sasaki', '../uploaded_books/5', 'Networking'),
(6, 'PHP 5 for Dummies', 'Janet Valade', '../uploaded_books/6', 'Web Development'),
(7, 'MySQL Tutorial 5.1', 'N/A', '../uploaded_books/7', 'Web Development'),
(8, 'Java for Dummies', 'Barry Burd', '../uploaded_books/8', 'Application Development'),
(9, 'Javascript for Dummies', 'Emily Vander Veer', '../uploaded_books/9', 'Web Development'),
(10, 'Linux Fundamentals', 'Paul Cobbaut', '../uploaded_books/10', 'Operating System'),
(11, 'Red Hat Enterprise Linux 7 Guide', 'N/A', '../uploaded_books/11', 'Operating System'),
(12, 'Computer Networking : Principles, Protocols and Practice', 'Olivier Bonaventure', '../uploaded_books/12', 'Networking'),
(13, 'Fundamentals of Electric Circuits', 'Charles K. Alexander, Matthew n. o. Sadiku', '../uploaded_books/13', 'Electric CIrcuits'),
(14, 'Fundamentals of Telecommunications', 'Roger L. Freeman', '../uploaded_books/14', 'Telecommunication'),
(15, 'Node.js Tutorial', 'Tutorialspoint', '../uploaded_books/15', 'Web Development'),
(16, 'JQuery for Dummies', 'Lynn Beighley', '../uploaded_books/16', 'Web Development'),
(17, 'Python for Dummies', 'Stef Maruch, Aahz Maruch', '../uploaded_books/17', 'Programming Language'),
(18, 'Introduction to Robotics', 'Vikram Kapila', '../uploaded_books/18', 'Robotics'),
(19, 'HTML Tutorial', 'Tutorialspoint', '../uploaded_books/19', 'Web Development'),
(20, 'CSS for Dummies', 'Richard Mansfield', '../uploaded_books/20', 'Web Development'),
(21, 'Easy Laravel 5', 'W.Jason Gilmore', '../uploaded_books/21', 'Web Development');

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
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
