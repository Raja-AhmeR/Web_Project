-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 08:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarymanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `bookname` varchar(200) NOT NULL,
  `authorname` varchar(100) NOT NULL,
  `bookimg` varchar(1000) NOT NULL,
  `book` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookname`, `authorname`, `bookimg`, `book`) VALUES
(21, 'C++', 'D.S. Malik', 'books/img/C++.PNG', 'books/C++.pdf'),
(22, 'Assembly language', 'Jeff Duntemann', 'books/img/Assembly Language.PNG', 'books/Assembly language.pdf'),
(24, 'Beginning C', 'Ivor Horton', 'books/img/Begining C.PNG', 'books/Beginning C.pdf'),
(25, 'Cryptography in C and C++', 'Michael Welschenbach', 'books/img/Crypto.PNG', 'books/Crypto in cpp.pdf'),
(26, 'Data Mining Algorithm in C++', 'Timothy Masters', 'books/img/Data Mining.PNG', 'books/DataMining in cpo.pdf'),
(27, 'Deep Learning With Python', 'François Chollet', 'books/img/Deep Learning with Python.PNG', 'books/Deep Learning with Python.pdf'),
(28, 'Digital And Logic Design', 'Morris Mano And Michael D. Ciletti', 'books/img/Digital Logic Design.PNG', 'books/Digital Logic Design.pdf'),
(29, 'The History of Money', 'Jack Weatherford', 'books/img/history of money.jfif', 'books/the-history-of-money-from-sandstone-to-cyberspace-bookspk.net.pdf'),
(30, 'Ancient Asian Civilization', 'Charles F. W. Higham', 'books/img/Ancient Asian Civilization.PNG', 'books/Encyclopedia of ancient Asian civilizations.pdf'),
(31, 'Introduction to Computation And Programming Using Python', 'John V. Guttag', 'books/img/Introduction to Computation and Programming using Python.PNG', 'books/introduction computation programming using python.pdf'),
(32, 'Java', 'Y. Daniel Liang', 'books/img/java.PNG', 'books/Java.pdf'),
(33, 'Socket Programming', 'Sean Wallon', 'books/img/Linux Socket Programming.PNG', 'books/Socket programming.pdf'),
(35, 'The Power of Your Subconscious Mind', 'Dr Joseph Murphy', 'books/img/Power of subconscious Mind.png', 'books/the-power-of-your-subconscious-mind.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bookname` varchar(200) NOT NULL,
  `authorname` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `email`, `bookname`, `authorname`, `status`) VALUES
(3, 'Akash', 'akash@gmail.com', 'Abx', 'WER', 1),
(6, 'Alex', 'dsfnjfn@gmail.com', '123', '98', 0),
(7, 'qwerty', 'zxc@gmail.com', 'poi', 'mnb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first name` varchar(50) NOT NULL,
  `last name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first name`, `last name`, `email`, `password`, `type`) VALUES
(3, 'Ahmer', 'Abbas', '20038@student.riphah.edu.pk', 'ed8b6e740b9f8822cc39ac4c62a211af', 1),
(7, 'Rafay', 'Abbas', 'rafay@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 0),
(10, 'M. Akash', 'Haider', '19744@gmail.com', '314e6ef5dee5ca3a61707d40a0e08d76', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
