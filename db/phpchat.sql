-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 14, 2021 at 02:28 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpchat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(9) NOT NULL,
  `user_id` int(6) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `user_id`, `message`, `created_at`) VALUES
(1, 1, 'Boooonjour', '2021-03-01 17:18:25'),
(2, 2, 'Hello', '2021-03-01 17:18:48'),
(3, 1, 'chi è questo impostore?', '2021-03-01 17:19:13'),
(4, 2, 'D:', '2021-03-01 17:19:24'),
(5, 1, 'Ciao sono Giovanna', '2021-03-08 15:08:30'),
(6, 1, 'UwU', '2021-03-08 16:17:07'),
(7, 1, 'orario', '2021-03-08 17:18:56'),
(8, 1, 'yey funziona l\'orario', '2021-03-08 17:19:12'),
(9, 2, 'Yeee', '2021-03-08 17:52:39'),
(10, 2, 'Messaggio più lungo', '2021-03-08 17:53:12'),
(11, 1, 'hey ciao, ma questa chat è ancora viva?', '2021-04-14 15:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `code` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `code`) VALUES
(1, 'Giovanna', '0ffe1abd1a08215353c233d6e009613e95eec4253832a761af28ff37ac5a150c'),
(2, 'Daniele', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
