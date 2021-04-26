-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 04:55 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `personal_bin`
--

CREATE TABLE `personal_bin` (
  `id` int(11) NOT NULL,
  `u_nic_no` varchar(12) NOT NULL,
  `update_date` datetime NOT NULL,
  `plastic_q` double NOT NULL,
  `plastic_sell` tinyint(1) NOT NULL,
  `organic_q` double NOT NULL,
  `organic_sell` double NOT NULL,
  `polythene_q` tinyint(1) NOT NULL,
  `polythene_sell` tinyint(1) NOT NULL,
  `metal_q` double NOT NULL,
  `metal_sell` tinyint(1) NOT NULL,
  `paper_q` double NOT NULL,
  `paper_sell` tinyint(1) NOT NULL,
  `coconut_shell_q` double NOT NULL,
  `coconut_shell_sell` tinyint(1) NOT NULL,
  `glass_q` double NOT NULL,
  `glass_sell` tinyint(1) NOT NULL,
  `fabric_q` double NOT NULL,
  `fabric_sell` tinyint(1) NOT NULL,
  `e-waste_q` double NOT NULL,
  `e-waste_sell` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_bin`
--

INSERT INTO `personal_bin` (`id`, `u_nic_no`, `update_date`, `plastic_q`, `plastic_sell`, `organic_q`, `organic_sell`, `polythene_q`, `polythene_sell`, `metal_q`, `metal_sell`, `paper_q`, `paper_sell`, `coconut_shell_q`, `coconut_shell_sell`, `glass_q`, `glass_sell`, `fabric_q`, `fabric_sell`, `e-waste_q`, `e-waste_sell`) VALUES
(1, '970221603v', '2021-04-25 19:57:26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '970221603v', '2021-04-25 19:58:23', 12, 0, 3, 0, 4, 0, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '970221603v', '2021-04-25 19:59:03', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '970221603v', '2021-04-25 20:00:53', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '970221603v', '2021-04-25 20:01:26', 23, 1, 34, 1, 33, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '', '0000-00-00 00:00:00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '970221603v', '2021-04-26 03:50:31', 23, 1, 34, 1, 33, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '970221603v', '2021-04-26 03:51:02', 23, 1, 34, 1, 33, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `personal_bin`
--
ALTER TABLE `personal_bin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personal_bin`
--
ALTER TABLE `personal_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
