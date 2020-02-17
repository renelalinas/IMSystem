-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 05:45 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_iceplant`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch_owner`
--

CREATE TABLE `branch_owner` (
  `branchAssignID` varchar(150) NOT NULL,
  `branchID` int(11) NOT NULL,
  `userID` varchar(15) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_owner`
--

INSERT INTO `branch_owner` (`branchAssignID`, `branchID`, `userID`, `createdDate`) VALUES
('10a05d1edc58c70fd8e7e268fd5a6e74', 3, '00002', '2020-02-05 00:12:49'),
('e2a6a1ace352668000aed191a817d143', 1, '00001', '2020-02-04 18:36:55'),
('ee8f208b135d4940dbb80d0335e20a1f', 2, '00001', '2020-02-04 18:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE `branch_tbl` (
  `branchID` int(11) NOT NULL,
  `branchName` varchar(45) DEFAULT NULL,
  `houseNumber` varchar(45) DEFAULT NULL,
  `Street` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Province` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`branchID`, `branchName`, `houseNumber`, `Street`, `City`, `Province`, `Country`, `createdDate`) VALUES
(1, 'Carmona Branch', '1255', 'Milagrosa', 'Carmona', 'Cavite', 'Philippines', '2020-02-01 15:24:13'),
(2, 'GMA Branch', '1234', 'Pinag', 'GMA', 'Cavite', 'Philippines', '2020-02-01 15:25:12'),
(3, 'Silang Branch', '123', 'Bulihan', 'Silang', 'Cavite', 'Philippines', '2020-02-02 06:38:44'),
(4, 'Quezon City Branch', '123', 'instruccion', 'Manila', 'Cavite', 'Philippines', '2020-02-05 05:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `category_incident`
--

CREATE TABLE `category_incident` (
  `incidentCategoryID` int(11) NOT NULL,
  `incidentName` varchar(45) DEFAULT NULL,
  `incidentDescription` varchar(100) DEFAULT NULL,
  `idTag` varchar(3) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_incident`
--

INSERT INTO `category_incident` (`incidentCategoryID`, `incidentName`, `incidentDescription`, `idTag`, `createdDate`) VALUES
(1, 'Rage Customer', 'Unexpected Behavior of Customer', 'RC', '2020-02-01 15:15:31'),
(2, 'Machine Malfunction', 'Machine Error', 'MM', '2020-02-01 15:20:28'),
(3, 'Out of Sacks', 'ran out of sacks for ice packaging', 'OS', '2020-02-05 05:39:28'),
(4, 'employee injury', 'injured employee during machine repair', 'EI', '2020-02-05 05:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `customerID` int(11) NOT NULL,
  `customerFullName` varchar(45) DEFAULT NULL,
  `contactNumber` varchar(11) DEFAULT NULL,
  `plateNumber` varchar(45) DEFAULT NULL,
  `customerAddress` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`customerID`, `customerFullName`, `contactNumber`, `plateNumber`, `customerAddress`) VALUES
(1, 'Sheryll Minas', '09123456789', 'ABC-123', 'Carmona,Cavite'),
(2, 'Renel Alinas', '09558702757', 'ABD-12345', 'Milagrosa, Carmona'),
(3, 'Walk - In', '-----------', '-----------', '-----------'),
(4, 'Yvone Bruel', '09091230808', 'qwe 12x', 'instruccion');

-- --------------------------------------------------------

--
-- Table structure for table `havest_tbl`
--

CREATE TABLE `havest_tbl` (
  `harvestID` int(11) NOT NULL,
  `configID` int(11) DEFAULT NULL,
  `harvestDateTime` datetime DEFAULT NULL,
  `harvestCount` int(11) DEFAULT NULL,
  `harvestAmount` float DEFAULT NULL,
  `harvestDescription` varchar(100) DEFAULT NULL,
  `userID` varchar(45) DEFAULT NULL,
  `branchID` int(11) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `havest_tbl`
--

INSERT INTO `havest_tbl` (`harvestID`, `configID`, `harvestDateTime`, `harvestCount`, `harvestAmount`, `harvestDescription`, `userID`, `branchID`, `createdDate`) VALUES
(1, NULL, '2020-02-04 23:59:00', 2, 210, 'good', '00001', 1, '2020-02-04 15:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `incident_status`
--

CREATE TABLE `incident_status` (
  `recordID` int(11) NOT NULL,
  `incidentID` varchar(20) DEFAULT NULL,
  `incidentDateTime` datetime DEFAULT NULL,
  `incidentStatus` varchar(45) DEFAULT NULL,
  `userID` varchar(15) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_status`
--

INSERT INTO `incident_status` (`recordID`, `incidentID`, `incidentDateTime`, `incidentStatus`, `userID`, `createdDate`) VALUES
(1, 'RC-20200201-0001', '2020-02-01 01:01:01', 'PENDING', '00001', '2020-02-01 15:36:41'),
(2, 'RC-20200201-0001', '2020-02-01 01:01:02', 'INPROGRESS', '00001', '2020-02-01 15:38:02'),
(3, 'RC-20200202-0002', '2020-02-02 23:50:00', 'PENDING', '00001', '2020-02-02 15:26:23'),
(4, 'MM-20200202-0003', '2020-02-01 23:30:00', 'PENDING', '00001', '2020-02-02 15:29:04'),
(8, 'MM-20200202-0003', '2020-02-03 18:54:53', 'REJECTED', '00000', '2020-02-02 16:19:16'),
(9, 'MM-20200204-0004', '2020-01-27 20:02:00', 'PENDING', '00001', '2020-02-04 12:02:12'),
(10, 'RC-20200202-0002', '2020-02-03 20:00:00', 'COMPLETED', '00000', '2020-02-04 12:04:04'),
(11, 'MM-20200202-0003', '2020-02-05 06:37:55', 'INPROGRESS', '00000', '2020-02-05 05:37:55'),
(12, 'EI-20200205-0005', '2020-02-03 23:31:00', 'PENDING', '00001', '2020-02-05 05:55:21');

-- --------------------------------------------------------

--
-- Table structure for table `incident_tbl`
--

CREATE TABLE `incident_tbl` (
  `incidentID` varchar(20) NOT NULL,
  `incidentCategoryID` int(11) DEFAULT NULL,
  `incidentDescription` varchar(100) DEFAULT NULL,
  `branchID` int(11) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incident_tbl`
--

INSERT INTO `incident_tbl` (`incidentID`, `incidentCategoryID`, `incidentDescription`, `branchID`, `createdDate`) VALUES
('EI-20200205-0005', 4, 'Sample', 2, '2020-02-05 05:55:21'),
('MM-20200202-0003', 2, 'wq', 1, '2020-02-02 15:29:04'),
('MM-20200204-0004', 2, 'Sample', 1, '2020-02-04 12:02:12'),
('RC-20200201-0001', 1, 'Unexpected behavior of customer', 1, '2020-02-01 13:05:12'),
('RC-20200202-0002', 1, 'sample', 1, '2020-02-02 15:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `settings_tbl`
--

CREATE TABLE `settings_tbl` (
  `configID` int(11) NOT NULL,
  `weight` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `units` varchar(45) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings_tbl`
--

INSERT INTO `settings_tbl` (`configID`, `weight`, `price`, `units`, `createdDate`) VALUES
(1, 12, 105, 'Kg', '2020-02-04 15:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_tbl`
--

CREATE TABLE `transaction_tbl` (
  `transactionID` int(11) NOT NULL,
  `customerID` int(11) DEFAULT NULL,
  `branchID` int(11) DEFAULT NULL,
  `userID` varchar(45) DEFAULT NULL,
  `transactionDateTime` datetime DEFAULT NULL,
  `transactionDescription` varchar(100) DEFAULT NULL,
  `transactionAmount` float DEFAULT NULL,
  `itemCount` int(11) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_tbl`
--

INSERT INTO `transaction_tbl` (`transactionID`, `customerID`, `branchID`, `userID`, `transactionDateTime`, `transactionDescription`, `transactionAmount`, `itemCount`, `createdDate`) VALUES
(1, 2, 1, '00001', '2020-02-02 23:30:00', 'qwe', 315, 3, '2020-02-04 16:36:22'),
(2, NULL, 2, '00001', '2020-02-04 19:13:18', NULL, NULL, NULL, '2020-02-04 18:13:18'),
(3, 4, 3, '00002', '2020-02-02 17:30:00', '  ', 2100, 20, '2020-02-05 05:47:55'),
(4, 3, NULL, '', '2020-01-31 20:00:00', '  ', 10500, 100, '2020-02-05 05:48:29'),
(5, 3, 2, '00001', '2020-01-25 20:02:00', 'qw', 10500, 100, '2020-02-05 05:49:46'),
(6, 3, 1, '00001', '2020-03-12 23:30:00', 'wqe', 21000, 200, '2020-02-05 05:51:35'),
(7, 3, 2, '00001', '2019-10-11 20:02:00', 'sa', 10500, 100, '2020-02-05 05:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `userID` varchar(15) NOT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `userPassword` varchar(45) DEFAULT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `userAddress` varchar(100) DEFAULT NULL,
  `contactNumber` varchar(20) DEFAULT NULL,
  `userRole` varchar(45) DEFAULT NULL,
  `branchID` int(11) DEFAULT NULL,
  `createdDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`userID`, `userName`, `userPassword`, `firstName`, `middleName`, `lastName`, `birthDate`, `userAddress`, `contactNumber`, `userRole`, `branchID`, `createdDate`) VALUES
('00000', 'admin', 'admin', 'Admin', 'Admin', 'Admin', '2020-02-02', 'Carmona Cavite', '12345678901', 'Admin', NULL, '2020-02-01 15:23:26'),
('00001', 'dispatch1', 'dispatch1', 'Renel', 'Apuntar', 'Alinas', '1994-04-27', 'Carmona Cavite', '09559702751', 'Dispatcher', 1, '2020-02-01 15:22:47'),
('00002', 'user', 'user', 'Fabian', 'Middle', 'Last', '1994-04-27', '1259 Milagrosa, Carmona Cavite', '09558702757', 'Main Branch Secretary', 2, '2020-02-02 13:13:13'),
('00003', 'user123', 'user123', 'FirstName', 'MiddleName', 'Lastname', '2020-02-03', 'carmona', '09558702757', 'Dispatcher', 3, '2020-02-04 12:04:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch_owner`
--
ALTER TABLE `branch_owner`
  ADD PRIMARY KEY (`branchAssignID`);

--
-- Indexes for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `category_incident`
--
ALTER TABLE `category_incident`
  ADD PRIMARY KEY (`incidentCategoryID`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `havest_tbl`
--
ALTER TABLE `havest_tbl`
  ADD PRIMARY KEY (`harvestID`);

--
-- Indexes for table `incident_status`
--
ALTER TABLE `incident_status`
  ADD PRIMARY KEY (`recordID`);

--
-- Indexes for table `incident_tbl`
--
ALTER TABLE `incident_tbl`
  ADD PRIMARY KEY (`incidentID`);

--
-- Indexes for table `settings_tbl`
--
ALTER TABLE `settings_tbl`
  ADD PRIMARY KEY (`configID`);

--
-- Indexes for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  MODIFY `branchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_incident`
--
ALTER TABLE `category_incident`
  MODIFY `incidentCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `havest_tbl`
--
ALTER TABLE `havest_tbl`
  MODIFY `harvestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `incident_status`
--
ALTER TABLE `incident_status`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings_tbl`
--
ALTER TABLE `settings_tbl`
  MODIFY `configID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaction_tbl`
--
ALTER TABLE `transaction_tbl`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
