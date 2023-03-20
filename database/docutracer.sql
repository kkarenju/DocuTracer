-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2017 at 04:05 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docutracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--


CREATE TABLE `admin` (
  `AID` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pic` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `activation` varchar(150) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AID`, `type`, `fname`, `sname`, `gender`, `pic`, `phone`, `mail`, `pass`, `activation`, `state`) VALUES
(1, 'Super', 'Kenneth', 'Kamau', 'Male', 'kenn-director-DocuTracer.jpg', '0700000000', 'admin@mail.com', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `BID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `abbreviation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`BID`, `name`, `abbreviation`) VALUES
(1, 'KCB', NULL),
(2, 'CBA', NULL),
(3, 'Barclays', NULL),
(4, 'Equity', NULL),
(5, 'Chase', NULL),
(6, 'Cooperative', NULL),
(7, 'CBK', NULL),
(8, 'Rafiki', NULL),
(9, 'Stanbic bank', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `CID` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `state` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`CID`, `subject`, `message`, `state`, `date`, `time`, `MID`) VALUES
(1, 'sgfv', 'werf', 1, '2017-02-16', '20:28:57', 2);

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `DID` int(11) NOT NULL,
  `pic` text DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `state` int(11) NOT NULL,
  `date_registered` date DEFAULT NULL,
  `time_registered` time DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `school` varchar(300) DEFAULT NULL,
  `id` varchar(30) DEFAULT NULL,
  `work` varchar(200) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `emp` varchar(30) DEFAULT NULL,
  `BID` int(11) NOT NULL,
  `SMID` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`DID`, `pic`, `type`, `status`, `state`, `date_registered`, `time_registered`, `title`, `author`, `level`, `category`, `school`, `id`, `work`, `country`, `emp`, `BID`, `SMID`, `SID`, `MID`) VALUES
(4, '31633-20170321-4-chrysanthemum.jpg', 'National ID', 'Lost', 0, '2017-03-21', '14:48:35', NULL, NULL, NULL, NULL, NULL, '121', NULL, 'Kenya', NULL, 0, NULL, NULL, 4),
(5, '17668-20170321-4-desert.jpg', 'Driving License', 'Lost', 1, '2017-03-21', '14:48:49', NULL, NULL, NULL, NULL, NULL, '3123', NULL, 'Kenya', NULL, 0, NULL, NULL, 4),
(11, '11297-20170324-3-lighthouse.jpg', 'Certificate', 'Okay', 0, '2017-03-24', '15:49:11', NULL, NULL, 'Kindergaten', NULL, '3223', '23', NULL, NULL, NULL, 0, NULL, NULL, 3),
(13, '1476092015-20230320-3-333351611_759985675557332_1701314719148700205_n.jpg', 'ATM Card', 'Lost', 0, '2023-03-20', '12:37:57', NULL, NULL, NULL, NULL, NULL, '3424234234', NULL, NULL, NULL, 2, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `found`
--

CREATE TABLE `found` (
  `FID` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `pic` text DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `details` text DEFAULT NULL,
  `state` int(2) NOT NULL,
  `status` int(11) NOT NULL,
  `date_reported` date DEFAULT NULL,
  `time_reported` time DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `level` varchar(30) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `school` varchar(300) DEFAULT NULL,
  `id` varchar(30) DEFAULT NULL,
  `work` varchar(200) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `emp` varchar(30) DEFAULT NULL,
  `BID` int(11) NOT NULL,
  `SMID` int(11) DEFAULT NULL,
  `SID` int(11) DEFAULT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `found`
--

INSERT INTO `found` (`FID`, `type`, `pic`, `fname`, `sname`, `details`, `state`, `status`, `date_reported`, `time_reported`, `title`, `author`, `level`, `category`, `school`, `id`, `work`, `country`, `emp`, `BID`, `SMID`, `SID`, `MID`) VALUES
(1, 'ATM Card', '3794-20170327-3-tulips.jpg', 'Eliud', 'Waweru', 'Collect it at Rongai ', 1, 0, '2017-03-27', '11:31:34', NULL, NULL, NULL, NULL, NULL, '1313342', NULL, NULL, NULL, 2, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `LID` int(11) NOT NULL,
  `LNO` varchar(50) NOT NULL,
  `DID` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `date_reported` date NOT NULL,
  `time_reported` time NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`LID`, `LNO`, `DID`, `details`, `date_reported`, `time_reported`, `state`) VALUES
(42, 'lToEx6s2ho/2017-03-24/15:51:08', 11, 'HOG', '2017-03-24', '15:51:08', 0),
(44, 'OT4xzCqY4l/2023-03-20/12:28:54', 12, 'I misplaced the letter in Nairobi CBD on March 2022. It is printed on a blue conqueror paper.', '2023-03-20', '12:28:54', 1),
(45, 'F2wMGAzAFH/2023-03-20/12:31:05', 12, 'I misplaced the letter in Nairobi CBD on March 2022. It is printed on a blue conqueror paper.', '2023-03-20', '12:31:05', 1),
(46, 'wtGiH1xNXe/2023-03-20/12:38:55', 13, 'I lost the ATM in CBD Nairobi on 20th March 2022. If you find it, reach out to me on 0712345098', '2023-03-20', '12:38:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `SMID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`SMID`, `name`) VALUES
(1, 'Gillanis'),
(2, 'Naivas'),
(3, 'Ukwala'),
(4, 'Uchumi'),
(5, 'Tuskys'),
(6, 'Nakumatt'),
(7, 'Tumaini'),
(8, 'Jamaa'),
(9, 'QuickMart'),
(10, 'Carrefour');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MID` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `date_registered` date NOT NULL,
  `time_registered` time NOT NULL,
  `date_activated` date NOT NULL,
  `activation` varchar(80) DEFAULT NULL,
  `activation1` varchar(80) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MID`, `fname`, `sname`, `pic`, `gender`, `dob`, `nid`, `phone`, `mail`, `pass`, `date_registered`, `time_registered`, `date_activated`, `activation`, `activation1`, `status`) VALUES
(2, 'Betty', 'Kariuki', '10828-2017-02-18-4-betty.jpg', 'Female', '1987-09-11', NULL, '0700000001', 'betty@mail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2017-02-18', '10:55:00', '2017-02-18', NULL, NULL, NULL),
(3, 'Kenneth', 'Karenju', '32254-2017-02-22-3-img-20170211-wa0002.jpg', 'Male', '2017-02-04', 1223344556, '0700000000', 'kenn@mail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '2017-02-22', '06:37:20', '2017-02-22', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `SID` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`SID`, `name`) VALUES
(1, 'Kenol Kobil'),
(2, 'Oilybia'),
(3, 'Kobil'),
(4, 'Caltex'),
(5, 'Total'),
(6, 'Total Kenya'),
(7, 'Shell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AID`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`BID`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`DID`);

--
-- Indexes for table `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`SMID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MID`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `nid` (`nid`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `found`
--
ALTER TABLE `found`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `SMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
