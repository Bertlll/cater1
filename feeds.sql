-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 10:37 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feeds`
--

-- --------------------------------------------------------

--
-- Table structure for table `cater_folder`
--

CREATE TABLE `cater_folder` (
  `id_number` int(11) NOT NULL,
  `folder_num` int(2) NOT NULL,
  `title` varchar(25) NOT NULL,
  `description` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cater_folder`
--

INSERT INTO `cater_folder` (`id_number`, `folder_num`, `title`, `description`) VALUES
(109, 50, 'Wedding', 'A beautiful wedding in red. Congratulations to the lovely couple.');

-- --------------------------------------------------------

--
-- Table structure for table `cater_profile`
--

CREATE TABLE `cater_profile` (
  `id_number` int(11) NOT NULL,
  `profile_pic` blob NOT NULL,
  `url_pic` varchar(60) NOT NULL,
  `banner` blob NOT NULL,
  `url_banner` varchar(60) NOT NULL,
  `tagline` varchar(600) NOT NULL,
  `about` varchar(1200) NOT NULL,
  `text1` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cater_profile`
--

INSERT INTO `cater_profile` (`id_number`, `profile_pic`, `url_pic`, `banner`, `url_banner`, `tagline`, `about`, `text1`) VALUES
(109, 0x3432303634365f3337313530383138393533343532315f313434333435323137365f6e2e6a7067, '../images/1394177339.jpg', 0x36393734323539315f3332393933333831313130383337385f363234373639323233373436333837393638305f6e2e6a7067, '../images/190687495.jpg', 'sdsd', 'sdsdaqwdsd', '');

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `city_list` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`city_list`) VALUES
('Caloocan'),
('Las Pinas'),
('Makati'),
('Malabon'),
('Mandaluyong'),
('City of Manila'),
('Marikina'),
('Muntinlupa'),
('Navotas'),
('Paranaque'),
('Pasay'),
('Pasig'),
('Pateros'),
('Quezon City'),
('San Juan'),
('Taguig'),
('Valenzuela');

-- --------------------------------------------------------

--
-- Table structure for table `image_folder`
--

CREATE TABLE `image_folder` (
  `folder_num` int(2) NOT NULL,
  `img_name` blob NOT NULL,
  `url` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_folder`
--

INSERT INTO `image_folder` (`folder_num`, `img_name`, `url`) VALUES
(50, 0x37303231383432375f323430333238313332333233303133305f323538353737343237353839333931393734345f6e2e6a7067, '../images/1993328086.jpg'),
(50, 0x37303839323338305f323430333238313935393839363733335f383239373930373734333933313439383439365f6f2e6a7067, '../images/553082651.jpg'),
(50, 0x37303930363431385f323430333238313431393839363738375f383839373335313137313137383439363030305f6f2e6a7067, '../images/1460352493.jpg'),
(50, 0x37313039373836395f323430333238313539393839363736395f323430363939383037383936393038353935325f6f2e6a7067, '../images/323651972.jpg'),
(50, 0x37313130333037315f323430333238313534333233303130385f333530353631333034363432323730303033325f6f2e6a7067, '../images/1257941481.jpg'),
(50, 0x37313437303736345f323430333238313232393839363830365f383230323431383136313234313239323830305f6f2e6a7067, '../images/1197210582.jpg'),
(50, 0x37313439313030335f323430333238313733363536333432325f3638393132363431363031363437343131325f6f2e6a7067, '../images/1838877007.jpg'),
(50, 0x37313735393830305f323430333238323038363536333338375f343233393536343537313532333637383230385f6f2e6a7067, '../images/1488251024.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `info_cater`
--

CREATE TABLE `info_cater` (
  `id_number` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `comp_name` varchar(30) NOT NULL,
  `landline_num` varchar(15) NOT NULL,
  `mobile_num` varchar(15) NOT NULL,
  `address_1` varchar(60) NOT NULL,
  `address_2` varchar(60) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `active` int(1) NOT NULL,
  `price` int(10) NOT NULL,
  `token` varchar(34) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_cater`
--

INSERT INTO `info_cater` (`id_number`, `email`, `comp_name`, `landline_num`, `mobile_num`, `address_1`, `address_2`, `city`, `zip_code`, `active`, `price`, `token`) VALUES
(50, '', 'qqq', '22', '+639151823615', 'efefe', 'fefe', 'Quezon City', 22, 1, 5000, ''),
(109, 'pau.agawin@gmail.com', 'cater', '132', '+639452175670', '', '', 'Caloocan', 0, 1, 0, '16ddf7d8b5af6f6121e7');

-- --------------------------------------------------------

--
-- Table structure for table `info_client`
--

CREATE TABLE `info_client` (
  `id_number` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  `mobile_num` varchar(15) NOT NULL,
  `address_1` varchar(160) NOT NULL,
  `address_2` varchar(160) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `city` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_client`
--

INSERT INTO `info_client` (`id_number`, `email`, `fname`, `lname`, `mobile_num`, `address_1`, `address_2`, `zip_code`, `city`) VALUES
(52, 'notyouridealcat@gmail.com', 'paige', 'agawin', '2323', 'bgbg', '', 55, 'Makati');

-- --------------------------------------------------------

--
-- Table structure for table `province_list`
--

CREATE TABLE `province_list` (
  `province_list` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_number` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `email` varchar(34) NOT NULL,
  `password` varchar(34) NOT NULL,
  `level` varchar(10) NOT NULL,
  `token` varchar(34) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_number`, `created`, `email`, `password`, `level`, `token`, `active`) VALUES
(50, '2019-09-27 22:24:59', 'agawingabrielle@gmail.com', '$2y$10$FKjZcrdprEG3.ECPFFuw7OXELGm', 'cater', 'b05235b38a19b8e870d8', 1),
(52, '2019-09-28 00:47:05', 'notyouridealcat@gmail.com', '$2y$10$kFp3A7dp5BIeseUheqEuUuqeRUx', 'client', '493159f01eb802ffe0f0', 1),
(109, '2019-10-07 12:53:03', 'pau.agawin@gmail.com', 'pkJ3zQWE', 'cater', '16ddf7d8b5af6f6121e7', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cater_folder`
--
ALTER TABLE `cater_folder`
  ADD PRIMARY KEY (`folder_num`),
  ADD KEY `id_number` (`id_number`);

--
-- Indexes for table `cater_profile`
--
ALTER TABLE `cater_profile`
  ADD KEY `id_number` (`id_number`);

--
-- Indexes for table `image_folder`
--
ALTER TABLE `image_folder`
  ADD KEY `folder_num` (`folder_num`);

--
-- Indexes for table `info_cater`
--
ALTER TABLE `info_cater`
  ADD KEY `id_number` (`id_number`);

--
-- Indexes for table `info_client`
--
ALTER TABLE `info_client`
  ADD KEY `id_number` (`id_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_number`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cater_folder`
--
ALTER TABLE `cater_folder`
  MODIFY `folder_num` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cater_folder`
--
ALTER TABLE `cater_folder`
  ADD CONSTRAINT `cater_folder_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `users` (`id_number`) ON DELETE CASCADE;

--
-- Constraints for table `cater_profile`
--
ALTER TABLE `cater_profile`
  ADD CONSTRAINT `cater_profile_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `users` (`id_number`) ON DELETE CASCADE;

--
-- Constraints for table `image_folder`
--
ALTER TABLE `image_folder`
  ADD CONSTRAINT `image_folder_ibfk_1` FOREIGN KEY (`folder_num`) REFERENCES `cater_folder` (`folder_num`) ON DELETE CASCADE;

--
-- Constraints for table `info_cater`
--
ALTER TABLE `info_cater`
  ADD CONSTRAINT `info_cater_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `users` (`id_number`) ON DELETE CASCADE;

--
-- Constraints for table `info_client`
--
ALTER TABLE `info_client`
  ADD CONSTRAINT `info_client_ibfk_1` FOREIGN KEY (`id_number`) REFERENCES `users` (`id_number`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
