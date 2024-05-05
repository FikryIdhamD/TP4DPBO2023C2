-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 06:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `phone`, `join_date`) VALUES
(15, 'Pal Tamer 1', 'pal.tamer@gmail.com', '1111111111', '2024-05-05'),
(16, 'Pal Tamer 2', 'paltamer2@gmail.com', '222222222222', '2024-05-05'),
(17, 'Pal Tamer Newbie', 'paltamernew@gmail.com', '33333333333333', '2024-05-05'),
(18, 'Pal Tamer Pro', 'PalTamerPro@gmail.com', '4444444444', '2024-05-05'),
(20, 'ini_Test', 'fikri@.com', '4444444444', '2024-05-05');

--
-- Triggers `members`
--
DELIMITER $$
CREATE TRIGGER `set_join_date` BEFORE INSERT ON `members` FOR EACH ROW BEGIN
    SET NEW.join_date = CURDATE();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pals`
--

CREATE TABLE `pals` (
  `id_pal` int(11) NOT NULL,
  `pal_name` varchar(255) NOT NULL,
  `id_member` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pals`
--

INSERT INTO `pals` (`id_pal`, `pal_name`, `id_member`) VALUES
(15, 'Cattiva', 15),
(16, 'Fuack', 16),
(17, 'Teafant', 17),
(18, 'Jormuntide', 18),
(21, 'asdasdas', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pals`
--
ALTER TABLE `pals`
  ADD PRIMARY KEY (`id_pal`),
  ADD KEY `fk_member_id` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pals`
--
ALTER TABLE `pals`
  MODIFY `id_pal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pals`
--
ALTER TABLE `pals`
  ADD CONSTRAINT `fk_member_id` FOREIGN KEY (`id_member`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
