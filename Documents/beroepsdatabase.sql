-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 11:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beroepsdatabase`
--
CREATE DATABASE IF NOT EXISTS `beroepsdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beroepsdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `bedrijven`
--

CREATE TABLE `bedrijven` (
  `BedrijfID` int(11) NOT NULL,
  `NaamBedrijf` varchar(64) NOT NULL,
  `Plaats` varchar(64) NOT NULL,
  `Link` varchar(64) NOT NULL,
  `ContactPersoon` varchar(64) NOT NULL,
  `ContractDatum` varchar(64) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evaluatie`
--

CREATE TABLE `evaluatie` (
  `EvaluatieID` int(11) NOT NULL,
  `CijferBegeleiding` float NOT NULL,
  `CijferGeleerdeTech` float NOT NULL,
  `AlgemeenCijfer` float NOT NULL,
  `Opmerking` text NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mentoren`
--

CREATE TABLE `mentoren` (
  `MentorID` int(11) NOT NULL,
  `Naam` varchar(64) NOT NULL,
  `Klas` varchar(64) NOT NULL,
  `Wachtwoord` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentoren`
--

INSERT INTO `mentoren` (`MentorID`, `Naam`, `Klas`, `Wachtwoord`) VALUES
(1, 'Jan de Jong', 'i2b', '28d4b311a4d256906382e82e7a31abec'),
(2, 'Niels Pietersen', 'i2a', '90b4079463d12a8f43a44902827d4bdf');

-- --------------------------------------------------------

--
-- Table structure for table `studenten`
--

CREATE TABLE `studenten` (
  `StudentID` int(11) NOT NULL,
  `Naam` varchar(64) NOT NULL,
  `Klas` varchar(64) NOT NULL,
  `StudentNummer` int(11) NOT NULL,
  `Wachtwoord` varchar(64) NOT NULL,
  `Mentor_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenten`
--

INSERT INTO `studenten` (`StudentID`, `Naam`, `Klas`, `StudentNummer`, `Wachtwoord`, `Mentor_ID`) VALUES
(1, 'Thom Veldhuis', 'i2b', 84843, 'sudo1234', 1),
(2, 'Niko Kazmierczak', 'i2b', 85378, 'patatjezaak', 1),
(3, 'Pieter Pietersma', 'i2a', 86832, 'sudo1234', 2),
(4, 'Karel Dijkhof', 'i2a', 83821, 'sudo1234', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bedrijven`
--
ALTER TABLE `bedrijven`
  ADD PRIMARY KEY (`BedrijfID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `evaluatie`
--
ALTER TABLE `evaluatie`
  ADD PRIMARY KEY (`EvaluatieID`),
  ADD KEY `Student_ID` (`Student_ID`);

--
-- Indexes for table `mentoren`
--
ALTER TABLE `mentoren`
  ADD PRIMARY KEY (`MentorID`);

--
-- Indexes for table `studenten`
--
ALTER TABLE `studenten`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `Mentor_ID` (`Mentor_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bedrijven`
--
ALTER TABLE `bedrijven`
  MODIFY `BedrijfID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluatie`
--
ALTER TABLE `evaluatie`
  MODIFY `EvaluatieID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentoren`
--
ALTER TABLE `mentoren`
  MODIFY `MentorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studenten`
--
ALTER TABLE `studenten`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bedrijven`
--
ALTER TABLE `bedrijven`
  ADD CONSTRAINT `bedrijven_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `studenten` (`StudentID`);

--
-- Constraints for table `evaluatie`
--
ALTER TABLE `evaluatie`
  ADD CONSTRAINT `evaluatie_ibfk_1` FOREIGN KEY (`Student_ID`) REFERENCES `studenten` (`StudentID`);

--
-- Constraints for table `studenten`
--
ALTER TABLE `studenten`
  ADD CONSTRAINT `studenten_ibfk_1` FOREIGN KEY (`Mentor_ID`) REFERENCES `mentoren` (`MentorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
