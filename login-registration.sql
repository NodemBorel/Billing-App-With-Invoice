-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230703.475871160d
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 09:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login-registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `libelle` varchar(256) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `num_page` int(11) NOT NULL,
  `couleur` int(11) NOT NULL DEFAULT 0,
  `relue` int(11) DEFAULT 0,
  `total` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facture`
--

INSERT INTO `facture` (`id_facture`, `libelle`, `date_time`, `num_page`, `couleur`, `relue`, `total`, `id_client`) VALUES
(89, 'borel', '2023-02-17 20:12:26', 17, 50, 300, 1150, 0),
(90, 'adfsd', '2023-02-17 20:30:36', 171, 50, 300, 8850, 0),
(91, 'adfsd', '2023-02-17 20:31:08', 171, 50, 300, 8850, 0),
(92, 'adfsd', '2023-02-17 20:36:29', 171, 50, 300, 8850, 0),
(93, 'adfsd', '2023-02-17 20:37:27', 171, 50, 300, 8850, 0),
(94, 'adfsd', '2023-02-17 20:38:01', 171, 50, 300, 8850, 0),
(95, 'adfsd', '2023-02-17 20:50:55', 171, 50, 300, 8850, 0),
(96, 'adfsd', '2023-02-17 21:03:41', 171, 50, 300, 8850, 0),
(97, 'borel', '2023-02-17 21:04:59', 171, 50, 300, 8850, 0),
(98, 'borel', '2023-02-17 21:27:46', 171, 50, 300, 8850, 0),
(99, 'borel', '2023-02-17 22:15:50', 171, 50, 300, 8850, 0),
(100, 'livretjava.pdf', '2023-02-17 22:23:11', 0, 50, 300, 300, 0),
(101, 'bnm', '2023-02-17 22:25:01', 17, 50, 300, 1150, 0),
(102, 'borel', '2023-02-17 22:31:47', 171, 50, 300, 8850, 0),
(103, 'borel', '2023-02-18 16:13:08', 171, 50, 300, 8850, 0),
(104, 'borel', '2023-02-18 16:16:22', 171, 50, 300, 8850, 0),
(105, 'borel', '2023-02-18 16:25:06', 171, 50, 300, 8850, 0),
(106, 'borel', '2023-02-18 16:44:29', 171, 50, 300, 8850, 0),
(107, 'wer', '2023-02-18 17:02:40', 171, 25, 0, 4275, 0),
(108, 'borel', '2023-02-18 17:09:55', 171, 50, 300, 8850, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'borel kinj', 'emperialborel@gmail.com', '12345'),
(2, 'email', 'lborel@gmail.com', '123'),
(3, 'email', 'testrel@gmail.com', '123'),
(4, 'borel king', 'el@gmail.com', '123'),
(5, 'borel', 'borelhol@hol.mo', '12345'),
(6, 'borel', 'allowin@gmail.com', 'qwe'),
(7, 'marius', 'marius@gmail.com', 'marius');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
