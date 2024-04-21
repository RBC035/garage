-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 08:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `carproblem`
--

CREATE TABLE `carproblem` (
  `problemID` int(11) NOT NULL,
  `problemName` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `typeOfCar` varchar(45) NOT NULL,
  `customerID` varchar(45) NOT NULL,
  `problemType` varchar(50) NOT NULL,
  `region` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `shehia` varchar(30) NOT NULL,
  `street` varchar(50) NOT NULL,
  `problemDate` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carproblem`
--

INSERT INTO `carproblem` (`problemID`, `problemName`, `description`, `typeOfCar`, `customerID`, `problemType`, `region`, `district`, `shehia`, `street`, `problemDate`, `status`) VALUES
(7, 'human resource management', 'x', 'Automatic', 'HAKA6156', 'c', 'Kaskazini Pemba', 'Micheweni', 'Tumbe', 'kwa gowa', '2023-07-03 16:27:06', 'Solved'),
(8, 'Information and communication technology', 'cv', 'Automatic', 'HAKA6156', 'cx', 'Kusini Pemba', 'Chake Chake', 'Chongaa', 'kwa gowa', '2023-07-03 16:27:35', 'Pending'),
(9, 'cxn,vcxv', 'df', 'Automatic', 'HAKA6156', 'd', 'Kaskazini Unguja', 'Kaskazini B', 'Kitope', 'kwa gowa', '2023-07-03 16:28:05', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `checkedproblem`
--

CREATE TABLE `checkedproblem` (
  `checkedID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  `garageID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` varchar(45) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `registerDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `firstName`, `lastName`, `phoneNumber`, `registerDate`) VALUES
('ALKH5529', 'ali', 'khamis', '+255 773 074 020', '2023-06-30 10:22:58'),
('BABI8412', 'bahati', 'Bilali', '+255 773 017 278', '2023-06-30 10:24:21'),
('BIHA1449', 'Bilal', 'Haji', '0774216585', '2023-07-02 14:32:35'),
('HAKA6156', 'Hamida', 'Kassim', '+255 753 374 028', '2023-06-30 10:22:02'),
('ILRA2783', 'ilham', 'rashid', '+255 773 074 020', '2023-06-30 10:23:47'),
('MABA2756', 'mashavu', 'bakari', '+255 773 074 020', '2023-06-30 13:13:11'),
('MOSA3161', 'mohammed', 'salum', '+255 715 307 056', '2023-06-30 10:20:56'),
('MUMA4569', 'muhidini', 'makame', '+255 773 074 020', '2023-06-30 10:22:40'),
('MUSU2339', 'mustafah', 'suleiman', '+255 678 678 608', '2023-06-30 10:23:28'),
('MWHI4205', 'Mwashamba', 'hija', '+255 773 074 020', '2023-06-30 13:40:34'),
('MWJU2586', 'mwana-khamis', 'juma', '+255 715 307 056', '2023-06-30 13:39:09'),
('MWMU7531', 'mwana-hawa', 'mudathir', '+255 785 307 056', '2023-06-30 13:39:54'),
('SAMU0469', 'salmini', 'muhidini', '+255 715 307 056', '2023-06-30 13:18:57'),
('SHSA1304', 'shamail', 'sadiki', '+255 773 174 020', '2023-06-30 13:34:57'),
('SUKA3796', 'Suleiman', 'Kassim', '+255 773 074 020', '2023-06-30 14:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `districtName` varchar(45) NOT NULL,
  `regioName` varchar(45) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`districtName`, `regioName`, `status`) VALUES
('Chake Chake', 'Kusini Pemba', 'Enable'),
('Kaskazini A', 'Kaskazini Unguja', 'Enable'),
('Kaskazini B', 'Kaskazini Unguja', 'Enable'),
('Kati', 'Kusini Unguja', 'Enable'),
('Kusini', 'Kusini Unguja', 'Enable'),
('Micheweni', 'Kaskazini Pemba', 'Enable'),
('Mjini', 'Mjini Magharibi', 'Enable'),
('Mjini Magharibi A', 'Mjini Magharibi', 'Enable'),
('Mjini Magharibi B', 'Mjini Magharibi', 'Enable'),
('Mkoani', 'Kusini Pemba', 'Enable'),
('Wete', 'Kaskazini Pemba', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `garage`
--

CREATE TABLE `garage` (
  `garageID` varchar(50) NOT NULL,
  `garageName` varchar(50) NOT NULL,
  `region` varchar(45) NOT NULL,
  `district` varchar(45) NOT NULL,
  `shehia` varchar(30) NOT NULL,
  `street` varchar(50) NOT NULL,
  `officeNumber` varchar(30) NOT NULL,
  `ownerID` varchar(50) NOT NULL,
  `registereDate` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garage`
--

INSERT INTO `garage` (`garageID`, `garageName`, `region`, `district`, `shehia`, `street`, `officeNumber`, `ownerID`, `registereDate`, `status`) VALUES
('64A01D47B2D1C', 'Autospare part garage', 'Mjini Magharibi', 'Mjini', 'Raha leo', 'Raha leo', '+255 788 930 163', 'HAKH388475', '2023-07-01 14:34:15', 'Enable'),
('64A01E9CF13AB', '24 hours garage', 'Kaskazini Unguja', 'Kaskazini A', 'Mkwajuni', 'Banda la mbao', '+255 717 317 906', 'JUSH719494', '2023-07-01 14:39:56', 'Enable'),
('64A01ED540DAA', 'karibu tukuhudumie', 'Mjini Magharibi', 'Mjini Magharibi A', 'Kama', 'Kilimani bar', '+255 783 074 630', 'JUSH719494', '2023-07-01 14:40:53', 'Enable'),
('64A01FEEA86CC', 'Jambo garage services', 'Kusini Unguja', 'Kati', 'Bambi', 'Kilimani juu', '+255 673 555 045', 'SIHA823919', '2023-07-01 14:45:34', 'Enable'),
('64A06DCDB031C', 'jangombe car garage', 'Mjini Magharibi', 'Mjini', 'Jang`ombe', 'jangombe', '+255 773 074 020', 'KAIS323394', '2023-07-01 20:17:49', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ownerID` varchar(50) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ownerID`, `firstName`, `lastName`, `phoneNumber`) VALUES
('HAKH388475', 'halid', 'khamis', '+255 655 768 134'),
('HAMU550194', 'hassan', 'mudathir', '+255 653 994 020'),
('HAMU921146', 'hashim', 'mustafah', '+255 678 678 678'),
('JUSH719494', 'juma', 'shabaani', '+255 753 874 768'),
('KAIS323394', 'Kassim', 'Issa', '+255 678 678 678'),
('MWMA623508', 'mwana-hawa', 'makame', '+255 773 030 983'),
('SAMA081478', 'salum', 'mahmood', '+255 773 074 654'),
('SIHA823919', 'sikujua', 'hamadi', '+255 773 230 674');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `paiDate` datetime NOT NULL,
  `customerID` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Registration fees'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `regionName` varchar(45) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`regionName`, `status`) VALUES
('Kaskazini Pemba', 'Enable'),
('Kaskazini Unguja', 'Enable'),
('Kusini Pemba', 'Enable'),
('Kusini Unguja', 'Enable'),
('Mjini Magharibi', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(80) NOT NULL,
  `serviceType` varchar(50) NOT NULL,
  `decription` text NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Enable',
  `garageID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `serviceType`, `decription`, `status`, `garageID`) VALUES
(1, 'a warning light shows name', 'a warning light shows type', 'a warning light shows descriptions', 'Enable', '64A01E9CF13AB'),
(2, 'the engine is sputtering 6-7', 'the engine is sputtering 07-8768', 'the engine is sputtering the engine is sputtering\r\nthe engine is sputtering\r\nthe engine is sputtering\r\nthe engine is sputtering', 'Enable', '64A01E9CF13AB'),
(3, 'the engine is sputtering', 'the engine is sputtering', 'the engine is sputtering', 'Enable', '64A01ED540DAA'),
(4, 'The steering wheel is shaking', 'The steering wheel is shaking', 'The steering wheel is shaking', 'Enable', '64A01ED540DAA'),
(5, 'the brake pads are worn', 'the brake pads are worn', 'the brake pads are worn', 'Enable', '64A01E9CF13AB'),
(6, 'delete', 'details', 'delete', 'Enable', '64A01E9CF13AB'),
(7, 'the brakes are squeking or grinding', 'the brakes are squeking or grinding', 'the brakes are squeking or grinding the', 'Enable', '64A01D47B2D1C'),
(8, 'the tyres are flat', 'the tyres are flat', 'the tyres are flat the tyres are flat the tyres are flat', 'Enable', '64A01D47B2D1C'),
(9, 'the tyres are wearing unevenly', 'the tyres are wearing unevenly', 'the tyres are wearing unevenly', 'Enable', '64A01D47B2D1C'),
(10, 'the alternator is failing', 'the alternator is failing', 'the alternator is failing', 'Enable', '64A01D47B2D1C'),
(13, 'the radiator is leaking', 'the radiator is leaking', 'the radiator is leaking', 'Enable', '64A06DCDB031C');

-- --------------------------------------------------------

--
-- Table structure for table `shehia`
--

CREATE TABLE `shehia` (
  `shehiaID` int(11) NOT NULL,
  `shehiaName` varchar(45) NOT NULL,
  `districtName` varchar(45) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shehia`
--

INSERT INTO `shehia` (`shehiaID`, `shehiaName`, `districtName`, `status`) VALUES
(1, 'Amani', 'Mjini', 'Enable'),
(2, 'Chumbuni', 'Mjini', 'Enable'),
(3, 'Jang`ombe', 'Mjini', 'Enable'),
(4, 'Raha leo', 'Mjini', 'Enable'),
(5, 'Vikokotoni', 'Mjini', 'Enable'),
(6, 'Sebleni', 'Mjini', 'Enable'),
(7, 'Bambi', 'Kati', 'Enable'),
(8, 'Binguni', 'Kati', 'Enable'),
(9, 'Chwaka', 'Kati', 'Enable'),
(10, 'Charawe', 'Kati', 'Enable'),
(11, 'Dunga', 'Kati', 'Enable'),
(12, 'Jumbi', 'Kati', 'Enable'),
(13, 'Chuini', 'Mjini Magharibi A', 'Enable'),
(14, 'Bububu', 'Mjini Magharibi A', 'Enable'),
(15, 'Mbuzini', 'Mjini Magharibi A', 'Enable'),
(16, 'Kikaangoni', 'Mjini Magharibi A', 'Enable'),
(17, 'Kihinani', 'Mjini Magharibi A', 'Enable'),
(18, 'Mfenesini', 'Mjini Magharibi A', 'Enable'),
(19, 'Kama', 'Mjini Magharibi A', 'Enable'),
(20, 'Bumbwisudi', 'Mjini Magharibi A', 'Enable'),
(21, 'Mkanyageni', 'Mjini Magharibi A', 'Enable'),
(22, 'Kitundu', 'Mjini Magharibi A', 'Enable'),
(23, 'Mazizini', 'Mjini Magharibi B', 'Enable'),
(24, 'Kisaka saka', 'Mjini Magharibi B', 'Enable'),
(25, 'Maungani', 'Mjini Magharibi B', 'Enable'),
(26, 'Fumba', 'Mjini Magharibi B', 'Enable'),
(27, 'Kiembe samaki', 'Mjini Magharibi B', 'Enable'),
(28, 'Kisauni', 'Mjini Magharibi B', 'Enable'),
(29, 'Chachani', 'Chake Chake', 'Enable'),
(30, 'Changaani', 'Chake Chake', 'Enable'),
(31, 'Chongaa', 'Chake Chake', 'Enable'),
(32, 'Kilindi', 'Chake Chake', 'Enable'),
(33, 'Wara', 'Chake Chake', 'Enable'),
(34, 'Matale', 'Chake Chake', 'Enable'),
(35, 'Chambani', 'Mkoani', 'Enable'),
(36, 'Chokocho', 'Mkoani', 'Enable'),
(37, 'Kengeja - Kiwani', 'Mkoani', 'Enable'),
(38, 'Ukutini', 'Mkoani', 'Enable'),
(39, 'Mkanyageni', 'Mkoani', 'Enable'),
(40, 'Shakani', 'Mkoani', 'Enable'),
(41, 'Donge', 'Kaskazini B', 'Enable'),
(42, 'Mahonda', 'Kaskazini B', 'Enable'),
(43, 'Muwanda', 'Kaskazini B', 'Enable'),
(44, 'Kitope', 'Kaskazini B', 'Enable'),
(45, 'Kiwengwa', 'Mjini Magharibi B', 'Enable'),
(46, 'Upenja', 'Kaskazini B', 'Enable'),
(47, 'Chaani', 'Kaskazini A', 'Enable'),
(48, 'Kijini', 'Kaskazini A', 'Enable'),
(49, 'Mkwajuni', 'Kaskazini A', 'Enable'),
(50, 'Nungwi', 'Kaskazini A', 'Enable'),
(51, 'Banda maji', 'Kaskazini A', 'Enable'),
(52, 'Potoa', 'Kaskazini A', 'Enable'),
(53, 'Finya', 'Micheweni', 'Enable'),
(54, 'Knyasini', 'Micheweni', 'Enable'),
(55, 'Micheweni', 'Micheweni', 'Enable'),
(56, 'Kinowe', 'Micheweni', 'Enable'),
(57, 'Wingwi', 'Micheweni', 'Enable'),
(58, 'Tumbe', 'Micheweni', 'Enable'),
(59, 'Ole', 'Wete', 'Enable'),
(60, 'Kojani', 'Wete', 'Enable'),
(61, 'Kisiwani', 'Wete', 'Enable'),
(62, 'Jadida', 'Wete', 'Enable'),
(63, 'Gando', 'Wete', 'Enable'),
(64, 'Fundo', 'Wete', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `solvedproblem`
--

CREATE TABLE `solvedproblem` (
  `solvedID` int(11) NOT NULL,
  `problemID` int(11) NOT NULL,
  `garageID` varchar(45) NOT NULL,
  `solveDate` datetime NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`username`, `password`, `status`) VALUES
('admin', '$2y$10$uievQxKE7MBcyghNbpw/iuSJ7GaHnVUpAGQTTzFgvNVpF90MRMzoC', 'Admin'),
('ALKH5529', '$2y$10$5.SOPKui3ZG83sIA49KIL.EjPmPOqHdsRZCFfw1WaoY0.VKiBoLJ2', 'Customer'),
('BABI8412', '$2y$10$oamHrEbB0veLcfKqvoa5y.ZzpAk8UCXPjTU2QUYWx1BU7WNozQCQG', 'Customer'),
('BIHA1449', '$2y$10$cTvi8MpRm7kgHY09/arXIe4hzgmcMxK3ZNCIzAHtIdIEJJp3.OLO6', 'Customer'),
('HAKA6156', '$2y$10$ImuLxaa27WmEnw10e8j1R.hE.fBz.alMd5yW068vCNiv49r0SR5O6', 'Customer'),
('HAKH388475', '$2y$10$AQkymJor4rXD4lCF4DHDTOpNo8bJnAJdqpUQdh.BQRgHl4J0vwWyG', 'Owner'),
('HAMU550194', '$2y$10$oMPiqRwBsCSOVeWvr.qOcuBLMLfFWPN7c8YWMgpNFdZo9GckZY7oG', 'Owner'),
('HAMU921146', '$2y$10$vqnHBv7bMxs5fYSWonvNgu2DZ5vih/pYwio6Nau0rYWRQrFuH4J.a', 'Owner'),
('ILRA2783', '$2y$10$FVS2j42zS2iXeX8CJDadueCMUxpcUlptAh8bsVOuZDmvhtRx.DsVS', 'Customer'),
('JUSH719494', '$2y$10$7hjOeb8PnIofPbroKDKoAuYsQTRcprWIRp8rrz8DGkTy915bfNmKy', 'Owner'),
('KAIS323394', '$2y$10$N3mUr9Xd5uROO1xX6Op6AeySxqO9am6qQmVJg9215EWbP9jyrvuLK', 'Owner'),
('MABA2756', '$2y$10$uCRuoPCBJvrUyzhsk.pUwODVflfbfBylgPtMcdQ5IqFg.S2/zgbdW', 'Customer'),
('MOSA3161', '$2y$10$0lQ8HBtW.Arvws43Pg8VP.XjPKtWHs1d9NPXfSjjC48eB3pEHJkzG', 'Customer'),
('MUMA4569', '$2y$10$ai63uLIx4opx1NxP8s.WhumBSeSlG/alkzw1HWDuGZpkJsFPOX7Ye', 'Customer'),
('MUSU2339', '$2y$10$GpAmUYTCu4Z374mk5dr5Wu/12wkavPw48PhDVjtpKS2f.kIhFEBIm', 'Customer'),
('MWHI4205', '$2y$10$5Abdc2J1YJDPcpd.AhXbC.9MtYLMvvML7kwg7t9HSJhiaWewS4CEO', 'Customer'),
('MWJU2586', '$2y$10$2rbh8XTkBxjwuTRrF9CHJePFcPMZLl0kNBMJtgG9XoQ9Yfml12mCO', 'Customer'),
('MWMA623508', '$2y$10$ETPS8l.8KU2FUNmGI/4w1OuXgiV0GupilyqEVF20ieyzrLxmT3yXe', 'Owner'),
('MWMU7531', '$2y$10$E6mUU.KwWY3KcY4G5IkaKuxDY1d0JJUtETYRRUR3c8PgsuzPpYlY6', 'Customer'),
('SAMA081478', '$2y$10$8aOWQ9kKxATKsWv9c2HJHOssSiT54cA3RsTwHpHkZbfda9wG1X/8e', 'Owner'),
('SAMU0469', '$2y$10$A/1DERlNiYEqS01rjQiGLO/jrB2ZwbW.dbaLWE4gUiCTZ4b/zP/FK', 'Customer'),
('SHSA1304', '$2y$10$uzGquxzjVegoVz5V99FQnehPAF86/XA/Wa7NibWfAjbqHKM3bMC9m', 'Customer'),
('SIHA823919', '$2y$10$k5g/f3zooOmei8iFQRBq/uUiX3EUENsectDGKhRVIlurLtSUQrg1i', 'Owner'),
('SUKA3796', '$2y$10$ejneM4cQBAVnMgdQsMbdSeu.CTArK5jDE13eJIPE1BJHDmT62.doe', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carproblem`
--
ALTER TABLE `carproblem`
  ADD PRIMARY KEY (`problemID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `checkedproblem`
--
ALTER TABLE `checkedproblem`
  ADD PRIMARY KEY (`checkedID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`districtName`),
  ADD KEY `regioName` (`regioName`);

--
-- Indexes for table `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`garageID`),
  ADD KEY `ownerID` (`ownerID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ownerID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`regionName`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`),
  ADD KEY `garageID` (`garageID`);

--
-- Indexes for table `shehia`
--
ALTER TABLE `shehia`
  ADD PRIMARY KEY (`shehiaID`),
  ADD KEY `districtName` (`districtName`);

--
-- Indexes for table `solvedproblem`
--
ALTER TABLE `solvedproblem`
  ADD PRIMARY KEY (`solvedID`),
  ADD KEY `problemID` (`problemID`),
  ADD KEY `garageID` (`garageID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carproblem`
--
ALTER TABLE `carproblem`
  MODIFY `problemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `checkedproblem`
--
ALTER TABLE `checkedproblem`
  MODIFY `checkedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shehia`
--
ALTER TABLE `shehia`
  MODIFY `shehiaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `solvedproblem`
--
ALTER TABLE `solvedproblem`
  MODIFY `solvedID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carproblem`
--
ALTER TABLE `carproblem`
  ADD CONSTRAINT `carproblem_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`regioName`) REFERENCES `region` (`regionName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `garage`
--
ALTER TABLE `garage`
  ADD CONSTRAINT `garage_ibfk_1` FOREIGN KEY (`ownerID`) REFERENCES `owner` (`ownerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`garageID`) REFERENCES `garage` (`garageID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shehia`
--
ALTER TABLE `shehia`
  ADD CONSTRAINT `shehia_ibfk_1` FOREIGN KEY (`districtName`) REFERENCES `district` (`districtName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `solvedproblem`
--
ALTER TABLE `solvedproblem`
  ADD CONSTRAINT `solvedproblem_ibfk_1` FOREIGN KEY (`problemID`) REFERENCES `carproblem` (`problemID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solvedproblem_ibfk_2` FOREIGN KEY (`garageID`) REFERENCES `garage` (`garageID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
