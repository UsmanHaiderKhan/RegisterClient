-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 01:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manageclient`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `product_type` varchar(250) DEFAULT NULL,
  `images` varchar(500) DEFAULT NULL,
  `attachments` varchar(500) NOT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `email`, `phone`, `product_type`, `images`, `attachments`, `message`) VALUES
(14, 'Usman Khan', 'usman@bzbee.com', '03014344275', 'font color', 'images/dfa3dfb6693a3a7945931c542a75339eDSC_0065-01.jpeg', 'attachments/89fe5edd0f81b494e804f36e19f0ad142. NS.pdf', 'Yooo Booyyyy'),
(15, 'Arslan Ameer', 'arslan@bzbee.com', '03014344275', 'style type', './images/969f2cf6723bdd4a1911a1c3af5b1e85DSC_0065-01-misdfs).jpg', 'attachments/f3dde5d69c78779ddc3e3a7918b03e2a8. IP-sec.pdf', 'Boyiii'),
(16, 'Arslan Ameer', 'arslan@bzbee.com', '564654655', 'style type', './images/07a9d28d77a325066c82f71f82d6c866DSC_0065-01-misdfs).jpg', 'attachments/b17bf47a5286c5377bed43f8445b252a2. NS.pdf', 'fsfdsfdsfdsfdsfdsfdsfds'),
(17, 'Salman khan', 'arslan@bzbee.com', '564654655', 'style type', './images/5ec478f3ee9bc62573627ce359bb3b41DSC_0065-01-misdfs).jpg', 'attachments/de29b511c3c9111bd55dddf0ec7519662. NS.pdf', 'fsfdsfdsfdsfdsfdsfdsfds'),
(18, 'Salman khan', 'salman@bzbee.com', '03349875662', 'font color', './images/log1-2.png', './attachments/f2725077894f90c587970036dddd4e55', 'salman is good boys'),
(19, 'Salman khan', 'salman@bzbee.com', '03349875662', 'font color', './images/5db7cd8e7a003addb97329b2a529232e', 'attachments/27be8608c7f6f9f4d646e1e768bcd328', 'salman is good boys');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
