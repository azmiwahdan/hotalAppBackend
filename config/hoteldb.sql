-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2022 at 09:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoteldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `message` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `customer_id`, `customer_email`, `topic`, `message`) VALUES
(1, 6, 'askjd@alsjkd.com', 'hello', 'again'),
(3, 6, 'ashjd@akskd.com', 'ksksk', 'hello'),
(5, 6, 'ajkshd', 'aksjhd', 'akjshd'),
(8, 6, 'jkhdskf', 'ksdhfk', 'sjdhfkjsdhfksdf'),
(9, 6, 'kjahsdkas', 'akjshdakd', 'kjashdkajsd');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(12) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_username` varchar(20) NOT NULL,
  `customer_password` varchar(15) NOT NULL,
  `customer_visa` varchar(15) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `dateOfBirth` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_username`, `customer_password`, `customer_visa`, `customer_phone`, `dateOfBirth`) VALUES
(6, 'Abdallah Jabr', 'abood00', 'abood11', '123456789', '0568419121', '5-2-2001');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `name`, `username`, `password`, `email`, `phone`) VALUES
(1, 'Azmi Wahdan', 'azmi00', 'azmi11', 'azmi.00@fmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `book_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `start_date` varchar(30) DEFAULT NULL,
  `end_date` varchar(30) DEFAULT NULL,
  `customer_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`book_id`, `customer`, `room`, `start_date`, `end_date`, `customer_message`) VALUES
(2, 6, 3, '14-1-2022', '19-2-2022', 'this is the first time ');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `book_id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `customer_message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`book_id`, `customer`, `room`, `start_date`, `end_date`, `customer_message`) VALUES
(3, 6, 3, '20-10-2022', '21-10-2022', 'Hi this is the first'),
(5, 6, 3, '20-10-2022', '21-10-2022', 'Hi this is my first message'),
(6, 6, 3, '25-10-2024', '30-10-2024', 'Hi this is the second message'),
(7, 6, 3, '20-10-2022', '2121-10-2020222', 'ajkshdkajhdasd'),
(8, 6, 3, '2022-10-2022', '2121-10-2020222', 'ajkshdkajhdasdasdfasdasfasdasd'),
(9, 6, 3, '30-10-2025', '39-10-2025', 'Hi this is a toast test'),
(10, 6, 2, '25-12-2022', '30-12-2022', 'This is a is_reserve test'),
(11, 6, 2, '25-12-2022', '30-12-2022', 'This is a is_reserve test'),
(12, 6, 2, '25-11-2020', '30-11-2020', 'This is another is_reserve test'),
(13, 6, 2, '25-11-2020', '30-11-2020', 'This is another is_reserve test'),
(14, 6, 2, '15-9-2021', '20-9-2021', 'Hi this is the third test on is_reserve column');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(4) NOT NULL,
  `room_number` varchar(4) NOT NULL,
  `room_type` varchar(15) NOT NULL,
  `room_price` int(4) NOT NULL,
  `imageUrl` varchar(50) NOT NULL,
  `room_description` varchar(100) NOT NULL,
  `room_reserve` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_number`, `room_type`, `room_price`, `imageUrl`, `room_description`, `room_reserve`) VALUES
(2, '20', 'double', 90, 'r2.jpg', 'nice room', 'true'),
(3, '001', 'single', 200, 'r1.jpg', 'has Tv', 'true'),
(11, '66', 'double', 230, 'r1.jpg', 'nice', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_id` (`book_id`),
  ADD UNIQUE KEY `customer` (`customer`),
  ADD UNIQUE KEY `room` (`room`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `customer` (`customer`),
  ADD KEY `room` (`room`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_id` (`room_id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD CONSTRAINT `contact_form_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`room`) REFERENCES `room` (`room_id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`customer`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
  ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `reserved_ibfk_2` FOREIGN KEY (`room`) REFERENCES `room` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
