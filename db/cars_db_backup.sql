-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 04:22 PM
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
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `price` varchar(9) COLLATE utf8_polish_ci NOT NULL,
  `promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `description`, `price`, `promo`) VALUES
(1, 'nissan', 'Nissan Skyline R34 2.5 200HP AWD', '150 000', 10),
(2, 'm6', 'BMW M6 Coupe 4.4 560HP RWD', '560 000', 5),
(3, 'rs6', 'Audi RS6 4.2 480HP AWD', '380 000', 8),
(4, 'golf', 'VW Golf 7 2.0 300HP AWD', '120 000', 15),
(5, 'bugatti', 'Bugatti Chiron 8.0 1500HP AWD', '12 000 00', 5),
(6, 'passat', 'VW Passat 1.9 110HP FWD', '1 000 000', 10),
(7, 'lambo', 'Lamborghini Huracan 5.2 640HP AWD', '1 200 000', 5),
(8, 'ferrari', 'Ferrari 488 GTB 3.9 661HP', '600 000', 15),
(9, 'mustang', 'Ford Mustang 5.0 460HP RWD', '300 000', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
