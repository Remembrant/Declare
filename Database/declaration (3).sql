-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 03:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `declaration`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL,
  `serial_num` varchar(255) NOT NULL,
  `item_nam` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `stud_num` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `lost` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `read_mesg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `serial_num`, `item_nam`, `description`, `stud_num`, `file`, `lost`, `role`, `status`, `date`, `read_mesg`) VALUES
(95, 'QWERTY12345', 'Laptop', 'Black Acer with 500GB HDD ', 215734838, '9088-doc_42.pdf', 0, 0, 1, '2020-07-30 02:04:37.147926', 1),
(96, 'QWERTY12345j', 'Computer', 'Black HP Computer with 1TB core i7 ', 215734838, '4820-doc_38.pdf', 0, 0, 2, '2020-07-30 02:05:14.441183', 1),
(97, 'QWERTY12345S', 'Stove', 'Last seen Rese', 215734838, '1027-doc_41.pdf', 1, 1, 1, '2020-08-26 23:26:52.523618', 1),
(98, 'QWERTY12345LO', 'Laptop', 'Gaming laptop 2TB core i7', 215734838, '1837-doc_21.pdf', 1, 0, 1, '2020-08-13 16:41:35.366908', 1),
(99, 'QWERTY12345G', 'Laptop', 'Black 500GB HDD core i7', 215734838, '8027-doc_22.pdf', 0, 0, 2, '2020-08-13 16:43:57.515527', 1),
(100, 'QWERTY12345GGG', 'Laptop', 'Black Acer', 215734838, '5004-doc_8.pdf', 0, 1, 1, '2020-07-31 08:56:19.059614', 1),
(101, 'QWERTYKHG', 'Laptop', 'Black Acer with 500GB HDD ', 215734840, '9088-doc_42.pdf', 0, 0, 1, '2020-07-30 02:04:37.147926', 1),
(102, 'QWERTY12JHG', 'Computer', 'Black HP Computer with 1TB core i7 ', 215734831, '4820-doc_38.pdf', 0, 0, 2, '2020-07-30 02:05:14.441183', 1),
(103, 'QWERTY1234JYUHG', 'Stove', 'Last seen Rese', 215734840, '1027-doc_41.pdf', 1, 1, 1, '2020-08-26 23:26:52.523618', 1),
(104, 'QWERTY1234JVGHV', 'Laptop', 'Gaming laptop 2TB core i7', 215734841, '1837-doc_21.pdf', 1, 0, 1, '2020-08-13 16:41:35.366908', 1),
(105, 'QWERTY12345G', 'Laptop', 'Black 500GB HDD core i7', 215734838, '8027-doc_22.pdf', 0, 0, 2, '2020-08-13 16:43:57.515527', 1),
(106, 'QWERTY12345GGJBJH', 'Laptop', 'Black Acer', 215734846, '5004-doc_8.pdf', 0, 1, 1, '2020-07-31 08:56:19.059614', 1),
(107, 'QWERTY123JHV', 'Laptop', 'Black Acer with 500GB HDD ', 215734834, '9088-doc_42.pdf', 0, 0, 1, '2020-07-30 02:04:37.147926', 1),
(108, 'QWERTY1234jHGG', 'Computer', 'Black HP Computer with 1TB core i7 ', 215734842, '4820-doc_38.pdf', 0, 0, 2, '2020-07-30 02:05:14.441183', 1),
(109, 'JHGHB', 'Stove', 'Last seen Rese', 215734846, '1027-doc_41.pdf', 1, 1, 1, '2020-08-26 23:26:52.523618', 1),
(110, 'QWERTY12345HVGJV', 'Laptop', 'Gaming laptop 2TB core i7', 215734843, '1837-doc_21.pdf', 1, 0, 1, '2020-08-13 16:41:35.366908', 1),
(111, 'QWERTY123hFCFU', 'Laptop', 'Black 500GB HDD core i7', 215734831, '8027-doc_22.pdf', 0, 0, 2, '2020-08-13 16:43:57.515527', 1),
(112, 'QWERTY12HVV', 'Laptop', 'Black Acer', 215734838, '5004-doc_8.pdf', 0, 1, 1, '2020-07-31 08:56:19.059614', 1),
(113, 'QWERTYKHGGJGJ', 'Laptop', 'Black Acer with 500GB HDD ', 123456789, '9088-doc_42.pdf', 0, 0, 1, '2020-07-30 02:04:37.147926', 1),
(114, 'QWERTY12GVJ', 'Computer', 'Black HP Computer with 1TB core i7 ', 215734833, '4820-doc_38.pdf', 0, 0, 2, '2020-07-30 02:05:14.441183', 1),
(115, 'QWERTY1234JYGCFG', 'Stove', 'Last seen Rese', 215734840, '1027-doc_41.pdf', 1, 1, 1, '2020-08-26 23:26:52.523618', 1),
(116, 'QWERTY1234JVGCFHC', 'Laptop', 'Gaming laptop 2TB core i7', 215734843, '1837-doc_21.pdf', 1, 0, 1, '2020-08-13 16:41:35.366908', 1),
(117, 'QWERTY1234GC', 'Laptop', 'Black 500GB HDD core i7', 215734831, '8027-doc_22.pdf', 0, 0, 2, '2020-08-13 16:43:57.515527', 1),
(118, 'QWERTY12345GGJ', 'Laptop', 'Black Acer', 215734832, '5004-doc_8.pdf', 0, 1, 1, '2020-07-31 08:56:19.059614', 1),
(119, 'QWERTY12345GVGJHV', 'Computer', 'LJBVKJBLJBJKBL', 215734832, '4416-doc.pdf', 0, 0, 0, '2020-08-27 13:22:40.631040', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `stud_num` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `serial_num` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `fullname`, `stud_num`, `message`, `serial_num`, `date`, `status`) VALUES
(24, 'X Shongwe', 215734832, 'was trying to declare someone else item or lost item', 'QWERTY12345', '2020-08-27 13:22:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reset_p`
--

CREATE TABLE `reset_p` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `stud_num` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `campus` varchar(255) NOT NULL,
  `uPass` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verified` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`stud_num`, `fullname`, `email`, `phone`, `campus`, `uPass`, `usertype`, `vkey`, `verified`, `date`) VALUES
(123456789, 'Thandi Nkosi Admin', 'admin@gmail.com', '0762153658', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'admin', '', 1, '2020-04-20 19:46:22.700696'),
(215734831, 'Member Shongwe', '215734838@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:24.582659'),
(215734832, 'X Shongwe', '215734838@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:30.511411'),
(215734833, 'B Shongwe', '215734838@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:35.080544'),
(215734834, 'XXX Shongwe', '215734834@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:39.299417'),
(215734835, 'Velly Shongwe', '215734835@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:42.603757'),
(215734836, 'B Shongwe', '215734836@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:49.711542'),
(215734837, 'Mfanakazane Remembrant Shongwe', 'mfanakazane@gmail.com', '0711969659', 'Soshanguve North Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'c1d6f93a899d07b8986d88f25d40315c', 1, '2020-07-30 01:57:24.120134'),
(215734838, 'Mfanakazane Remembrant Shongwe', 'mfanakazane65@gmail.com', '0711969659', 'Soshanguve North Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'c1d6f93a899d07b8986d88f25d40315c', 1, '2020-07-30 01:57:24.120134'),
(215734839, 'Bobo Shongwe', '215734839@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:00:54.002852'),
(215734840, 'X Shongwe', '215734840@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 0, '2020-08-27 12:46:56.667724'),
(215734841, 'B Shongwe', '215734841@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 0, '2020-08-27 12:46:56.667724'),
(215734842, 'XXX Shongwe', '215734842@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:01:13.288129'),
(215734843, 'Velly Shongwe', '215734835@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:01:08.936469'),
(215734844, 'B Shongwe', '215734844@tut4life.ac.za', '0797427654', 'Soshanguve South Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'd550f55f5b2b9127e3df53c3808d10f3', 1, '2020-08-27 13:01:05.528419'),
(215734845, 'Mfanakazane Remembrant Shongwe', 'mfanakazane45@gmail.com', '0711969659', 'Soshanguve North Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'c1d6f93a899d07b8986d88f25d40315c', 1, '2020-07-30 01:57:24.120134'),
(215734846, 'Mfanakazane Remembrant Shongwe', 'mfanakazane46@gmail.com', '0711969659', 'Soshanguve North Campus', 'e33b0f3cba2c4c8ddbb00bd0f650cae6', 'user', 'c1d6f93a899d07b8986d88f25d40315c', 1, '2020-07-30 01:57:24.120134');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`,`serial_num`),
  ADD KEY `stud_num` (`stud_num`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_p`
--
ALTER TABLE `reset_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`stud_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reset_p`
--
ALTER TABLE `reset_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`stud_num`) REFERENCES `users` (`stud_num`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
