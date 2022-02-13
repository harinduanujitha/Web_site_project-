-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 07:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comm_No` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Comment` text NOT NULL,
  `Likes` int(11) NOT NULL,
  `Dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comm_No`, `U_ID`, `Date`, `Comment`, `Likes`, `Dislikes`) VALUES
(1, 2, '2022-02-07 12:16:58', 'testing \r\n', 4, 0),
(2, 2, '2022-02-07 12:17:32', 'second test comment\r\n', 5, 0),
(3, 2, '2022-02-07 12:27:32', 'comment test 3\r\n', 0, 0),
(4, 2, '2022-02-07 12:32:18', 'kk', 0, 0),
(5, 2, '2022-02-07 12:33:08', 'hgh', 0, 0),
(6, 2, '2022-02-07 12:34:20', 'ff', 0, 0),
(7, 2, '2022-02-07 15:40:45', 'comment test 4', 0, 0),
(8, 2, '2022-02-07 15:40:45', 'comment test 4', 2, 0),
(9, 2, '2022-02-12 18:50:49', 'another reply', 0, 0),
(10, 2, '2022-02-12 18:50:49', 'another reply', 0, 0),
(11, 2, '2022-02-12 18:50:49', 'another reply', 0, 0),
(12, 2, '2022-02-12 18:50:49', 'another reply', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `Reply_No` int(11) NOT NULL,
  `Comm_No` int(11) NOT NULL,
  `U_ID` int(11) NOT NULL,
  `Date` int(11) DEFAULT NULL,
  `Reply` text NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT 0,
  `Dislikes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`Reply_No`, `Comm_No`, `U_ID`, `Date`, `Reply`, `Likes`, `Dislikes`) VALUES
(5, 8, 1, 2022, 'Does the reply system works?', 0, 0),
(6, 8, 1, 2022, 'Does the reply system works?', 0, 0),
(8, 8, 1, 2022, 'does the reply system work? is the grammatically correct way', 0, 0),
(9, 2, 1, 2022, 'can i submit a reply?', 0, 0),
(10, 2, 1, 2022, 'can i submit a reply?', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_ID` int(11) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `L_Name` varchar(30) NOT NULL,
  `U_Name` varchar(20) NOT NULL,
  `E_Mail` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Gender` enum('male','female') NOT NULL,
  `Batch` float NOT NULL,
  `Faculty` enum('computing','business','science','engineering') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_ID`, `F_Name`, `L_Name`, `U_Name`, `E_Mail`, `Password`, `Gender`, `Batch`, `Faculty`) VALUES
(1, 'chamith', 'DanneNaa', 'ChamithChamith', 'chamith@gmail.com', 'boo321', 'male', 21, 'computing'),
(2, 'Prasitha', 'Samaraarachchi', 'Developer7', 'prasithajeevadya@gmail.com', 'boo123', 'male', 21, 'computing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comm_No`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`Reply_No`),
  ADD KEY `Comm_No` (`Comm_No`),
  ADD KEY `U_ID` (`U_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comm_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `Reply_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`Comm_No`) REFERENCES `comments` (`Comm_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`U_ID`) REFERENCES `users` (`U_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
