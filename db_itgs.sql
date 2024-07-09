-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 11:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_itgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `U_ID` int(100) NOT NULL,
  `ID` int(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`U_ID`, `ID`, `Name`, `Password`) VALUES
(3, 101, 'Jesus', '12345'),
(1, 203, 'Marc', 'qwerty'),
(2, 204, 'Eric', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_candidates`
--

CREATE TABLE `tbl_candidates` (
  `Candidate_ID` int(11) NOT NULL,
  `Candidate_Name` varchar(50) NOT NULL,
  `Candidate_Position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_candidates`
--

INSERT INTO `tbl_candidates` (`Candidate_ID`, `Candidate_Name`, `Candidate_Position`) VALUES
(101, 'George', 'Principal'),
(201, 'Eric', 'Assistant_Headboy'),
(203, 'Marc', 'Headboy'),
(206, 'Jesus', 'Headboy');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_polls`
--

CREATE TABLE `tbl_polls` (
  `Candidate_ID` int(11) NOT NULL,
  `Candidate_Name` text NOT NULL,
  `Candidate_Position` varchar(100) NOT NULL,
  `Poll` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_polls`
--

INSERT INTO `tbl_polls` (`Candidate_ID`, `Candidate_Name`, `Candidate_Position`, `Poll`) VALUES
(101, 'George', 'Principal', 1),
(201, 'Eric', 'Assistant_Headboy', 2),
(203, 'Marc', 'Headboy', 6),
(206, 'Jesus', 'Headboy', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `Position_ID` int(11) NOT NULL,
  `Position_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`Position_ID`, `Position_Name`) VALUES
(1, 'Headboy'),
(2, 'Assistant_Headboy'),
(3, 'Principal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `Voter_ID` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Email_ID` text NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`Voter_ID`, `First_Name`, `Last_Name`, `Gender`, `Email_ID`, `Date_Of_Birth`, `Password`) VALUES
(1, 'Marc', 'Crasto', 'Male', 'awe50me@rocketmail.com', '2002-03-08', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `T_ID` int(100) NOT NULL,
  `Teacher_ID` int(50) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `Email_ID` text NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`T_ID`, `Teacher_ID`, `First_Name`, `Last_Name`, `Gender`, `Email_ID`, `Date_Of_Birth`, `Password`) VALUES
(1, 203, 'Marc', 'Crasto', 'Male', 'awe50me@rocketmail.com', '0000-00-00', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_votes`
--

CREATE TABLE `tbl_votes` (
  `ID` int(11) NOT NULL,
  `Voter_ID` int(11) NOT NULL,
  `Candidate_Position` text NOT NULL,
  `Candidate_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `U_ID` (`U_ID`);

--
-- Indexes for table `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  ADD PRIMARY KEY (`Candidate_ID`);

--
-- Indexes for table `tbl_polls`
--
ALTER TABLE `tbl_polls`
  ADD PRIMARY KEY (`Candidate_ID`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`Voter_ID`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD UNIQUE KEY `T_ID` (`T_ID`);

--
-- Indexes for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Voting` (`Voter_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `U_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_candidates`
--
ALTER TABLE `tbl_candidates`
  MODIFY `Candidate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `Voter_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `T_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_votes`
--
ALTER TABLE `tbl_votes`
  ADD CONSTRAINT `Voting` FOREIGN KEY (`Voter_ID`) REFERENCES `tbl_staff` (`Teacher_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
