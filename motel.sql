-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2021 at 11:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motel`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `rental_code` int(10) NOT NULL COMMENT 'รหัสการเช่า',
  `room_number` int(10) NOT NULL COMMENT 'เลขที่ห้อง',
  `tenant_code` int(10) NOT NULL COMMENT 'รหัสผู้เช่า',
  `contract_date` date NOT NULL COMMENT 'วันทำสัญญา',
  `expiration_date` date NOT NULL COMMENT 'วันสิ้นสุดสัญญา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ห้องเช่า';

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`rental_code`, `room_number`, `tenant_code`, `contract_date`, `expiration_date`) VALUES
(50, 101, 1101, '2021-03-22', '2021-03-22'),
(51, 102, 1102, '2021-03-22', '2021-03-22'),
(52, 103, 1103, '2021-03-22', '2021-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `Room_typeID` int(10) NOT NULL COMMENT 'รหัสประเภทห้อง',
  `Room_type` varchar(255) NOT NULL COMMENT 'ประเภทห้อง',
  `Room_price` int(255) NOT NULL COMMENT 'ราคาห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางประเภทห้อง';

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`Room_typeID`, `Room_type`, `Room_price`) VALUES
(1, 'ห้องพัดลม', 2000),
(2, 'ห้องแอร์', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `tenant_code` int(10) NOT NULL COMMENT 'รหัสผู้เช่า',
  `tenant_fname` varchar(255) NOT NULL COMMENT 'ชื่อผู้เช่า',
  `tenant_lname` varchar(255) NOT NULL COMMENT 'นามสกุลผู้เช่า',
  `house_registration` text NOT NULL COMMENT 'ทะเบียนบ้าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางผู้เช่า';

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tenant_code`, `tenant_fname`, `tenant_lname`, `house_registration`) VALUES
(1101, 'นายก', 'จันทรวิจิตร', '8888'),
(1102, 'นายไชยนุวัติ', 'สิงหประชา', '9999'),
(1103, 'นายกฤษณะ', 'จันทรวิจิตร', '8888');

-- --------------------------------------------------------

--
-- Table structure for table `the_room`
--

CREATE TABLE `the_room` (
  `Room_number` int(10) NOT NULL COMMENT 'เลขห้อง',
  `Room_Status` int(1) NOT NULL COMMENT 'สถานะห้อง',
  `Room_type` int(10) NOT NULL COMMENT 'ประเภทห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `the_room`
--

INSERT INTO `the_room` (`Room_number`, `Room_Status`, `Room_type`) VALUES
(101, 1, 1),
(102, 1, 1),
(103, 1, 1),
(104, 0, 1),
(105, 0, 1),
(201, 0, 2),
(202, 0, 2),
(203, 0, 2),
(204, 0, 2),
(205, 0, 2),
(301, 0, 1),
(302, 0, 1),
(303, 0, 1),
(304, 0, 1),
(305, 0, 1),
(401, 0, 2),
(402, 0, 2),
(403, 0, 2),
(404, 0, 2),
(405, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`rental_code`),
  ADD KEY `Tenant_code` (`tenant_code`),
  ADD KEY `FK_onefix` (`room_number`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`Room_typeID`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_code`);

--
-- Indexes for table `the_room`
--
ALTER TABLE `the_room`
  ADD PRIMARY KEY (`Room_number`),
  ADD KEY `Room_type` (`Room_type`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `rental_code` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสการเช่า', AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `FK_kuyaubestkey` FOREIGN KEY (`tenant_code`) REFERENCES `tenant` (`tenant_code`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_onefix` FOREIGN KEY (`room_number`) REFERENCES `the_room` (`Room_number`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `the_room`
--
ALTER TABLE `the_room`
  ADD CONSTRAINT `FK_type` FOREIGN KEY (`Room_type`) REFERENCES `room_type` (`Room_typeID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
