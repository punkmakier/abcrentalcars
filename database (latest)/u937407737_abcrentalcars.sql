-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 02:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u937407737_abcrentalcars`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `license` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `requirement` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `license`, `profile`, `surname`, `firstname`, `middlename`, `email`, `contact`, `username`, `password`, `user_type`, `requirement`, `status`, `date`) VALUES
(1, '', '', 'Dela Cruz', 'Juan', 'Smith', 'juandelacruz@gmail.com', '09956425669', 'administrator', '$2y$10$mUhlzh2wmduOngliRT.oj.NI2Msbhxwx6Bde.HKPskDikimNmExca', 'Administrator', '', 1, '2022-06-07 18:59:03'),
(7, '012001', '', 'Reroma', 'Ansel John', 'Alolod', 'ajreroma@gmail.com', '09213782648', 'ajreroma', '$2y$10$3rLibf6KBFsClbO38BvB0..eVxrxRQC4qaD5GzvqezxGj7BsD7iKi', 'Customer', 'id.jpg', 1, '2022-06-21 23:12:52'),
(8, '10987654321234567890', '', 'Hernandez', 'Nick', 'Liwag', 'nick@gmail.com', '09217384917', 'nickhernandez', '$2y$10$mGAHsziD4cqTHGy4Uobi4OZhwMYao/Vo2P4jlps8ePnd5wsNUb3X.', 'Macro', 'id2.jpg', 1, '2022-06-21 23:15:47'),
(9, '', '', 'Bravo', 'Johny', 'Stephenson', 'johnybravo@gmail.com', '09217384619', 'johnybravo242', '$2y$10$HaVX3/8iheDLBTXmhAZWtOQPfI/L2jxjipHC7nB1qPhHR/6HpJODW', 'Micro', 'id3.jpg', 1, '2022-06-21 23:55:59'),
(10, '', '', 'Lorenzo', 'Gian', 'Pasusani', 'Gian_lorenzo@gmail.om', '09217384917', 'gian123', '$2y$10$rKT1Kwt/fHcOJcvSxvRpHeeA.kENhqF8d/7hbLME4NtcSmt2pGUGy', 'Customer', 'id2.jpg', 1, '2022-06-22 02:14:10'),
(11, '4-19', '', 'Ricardo', 'Raven Faith', 'Santos', 'raven@gmail.com', '09217384917', 'raven', '$2y$10$kvzcN2wmZxKl5fCmW57Tqe6WIRakE8WvW3UYqxz3PyuPuRRKfCPny', 'Customer', 'id3.jpg', 1, '2022-06-22 03:09:30'),
(12, '', '', 'Ramos', 'Mary Stephanie', 'Roxas', 'mary@gmail.com', '09214619385', 'mary', '$2y$10$LFCptvhyo2OM8TJUeFM9CeJz3rJcPpooViU35Gfd.1lmspo0UqC2W', 'Macro', 'permit1.jpg', 1, '2022-06-22 03:18:52'),
(13, '', '', 'Santos', 'Jillian Marie', 'Lopez', 'jillian@gmail.com', '09128461937', 'jillian', '$2y$10$7kVMwmxHPQwtJHamj47Ay.RWimVTDPfw20OU4j0Q3ojNsvTiAw2RK', 'Customer', 'license1.jpg', 1, '2022-06-22 03:22:53'),
(14, '', '', 'Divina', 'Maria Francheska', 'Divina', 'mariafrancheska@gmail.com', '09214619385', 'mariafrancheska', '$2y$10$3nnJVIAq1eIPEH8vgI.LQeTQCO6/PVyHouIpgzNtp2lJqYZeFFElW', 'Customer', 'id5.png', 1, '2022-06-22 15:26:40'),
(15, '', '', 'Reyes', 'John Mark', 'Lozano', 'johnmark@gmail.com', '09214619385', 'johnmarklozano', '$2y$10$wI/y7Do5i1JjcXJaKbDCee5CtTf.lLDtEHJ3WqCkaFMTPRYgbwyIC', 'Macro', 'permit3.jpg', 1, '2022-06-22 15:29:31'),
(16, '', '', 'Magsaysay', 'Mae Ann', 'Laguna', 'mae@gmail.com', '09214619385', 'mae', '$2y$10$kQJrfBD6.z8VIcx2ekBNJe0caUmXVfpra3QQpZrFOiFDg2w.v4GpW', 'Micro', 'id7.jpg', 1, '2022-06-23 01:57:10'),
(17, '', '', 'Manalad', 'Keane', 'Ryane', 'ryane@gmail.com', '09214619385', 'kay', '$2y$10$SdK5B4o4h.12w6eGNp8RXOBYgmzSSnNERLw7eiECJRTuolp1KDU4K', 'Customer', 'id5.png', 1, '2022-06-23 02:26:37'),
(18, '', '', 'Santos', 'Maria', 'Klorena', 'maeannee@gmail.com', '09214619385', 'mayan', '$2y$10$cSaomZ1H.ZyMdV/ZteZEU.ZPvxM1AtOn8rw2MY88IVLe8aAO/kTX6', 'Micro', 'permit1.jpg', 1, '2022-06-23 02:29:50'),
(19, '', '', 'Placido', 'Franzell', 'Sales', 'franzelle@gmail.com', '09214619385', 'franzelle', '$2y$10$HqbuT1beMNvzUBe1mXZj..geWa2ueDDcKD/aHAi14IeQqdc5Du7YG', 'Customer', 'id7.jpg', 1, '2022-06-24 01:43:20'),
(20, '', '', 'Reyes', 'Kate', 'Flores', 'kate@gmail.com', '09214619385', 'kate', '$2y$10$FV038JxT7Lq2bdNFCEebION5pcXXPKq3feOhc7/HIMLHuYji61wwy', 'Macro', 'permit4.jpg', 1, '2022-06-24 01:47:50'),
(21, '', '', 'Caranza', 'Cherry', 'Sonas', 'cherry@gmail.com', '09214619385', 'cherry', '$2y$10$nkhz6zHvlXRkhy6epSj7vuiKPT8R49ZPuS0bDkZ4Nrvu.odeyxuoq', 'Customer', 'id6.jpg', 0, '2022-06-24 02:48:46'),
(22, '', '', 'wdadw', 'awdwd', 'wadad', 'dwad@gmail.com', '09214619385', 'master', '$2y$10$1yF0cD/JhnhcMyruv5m9cetsVBwYZ0vn7umckwymx108eQDLAzduW', 'Customer', 'license2.jpg', 0, '2022-06-24 08:34:51'),
(23, '', '', 'Pedro', 'Juan', 'Dela Cruz', 'juan@gmail.com', '09213849313', 'juan', '$2y$10$mby1yeQRHl14Ju4RKPFo2exAqhNguXyISMR9Q3hRG49Y5J31bhaAe', 'Customer', 'UMID_EMV_sample.png', 1, '2022-10-01 02:39:42'),
(24, '', '', 'Ramos', 'Mari', 'Reyes', 'maria@gmail.com', '09213828374', 'maria', '$2y$10$ACb/Dpo/O.lVdMmHol4zOOXYRy8SkHoJ9HOX41MsFLHzCFHAh6CV2', 'Micro', 'img_20191011_073704.jpg', 1, '2022-10-01 02:44:11'),
(25, '', '', 'Chan', 'Jackie', 'Torres', 'jackie@gmail.com', '09213456789', 'jackie', '$2y$10$Vh9Ejwm9bXhQkAJuhbwSSO2QKKuMYBr75oe3M8k9Xuby4Ue2.lW0m', 'Customer', 'license1.jpg', 1, '2022-10-01 08:08:22'),
(27, '', '', 'Bravo', 'Johny', 'Markus', 'johnybravo1999@gmail.com', '09213419283', 'markus', '$2y$10$rcNVCCCxMVVLe1LNa84sLuRDhZ2vISx1BSjefK7UGMKhJ0ZGVgLFS', 'Customer', 'license1.jpg', 1, '2022-10-07 23:35:18'),
(28, '', '', 'Lacson', 'Ping', 'Marathon', 'ping@gmail.com', '09167762069', 'ping', '$2y$10$PqlwYnZynpl1zB1G6Jr5ieJIJxACEOG688IhasNOqJCMzHWmuHv/m', 'Micro', 'permit3.jpg', 0, '2022-10-08 05:38:46'),
(32, '', '', 'starl', 'bryan', 'sorar', 'staff@email.com', '09123456789', 'sorar', '$2y$10$hGbwcn1JWPBKyLWcVcXRJukfAEZbvHnOUYQez.IjWBRlrhtHuM9AK', 'Customer', '1000_F_183484490_GjRqLzGxKSKsXhvX0HSZ48dAv28Cbo6i.jpg', 1, '2022-10-20 03:40:33'),
(33, '1234567890', '', 'dwad', 'Johny', 'Stephenson', 'adwd@gmail.com', 'fesfes', 'nickhernandez', '$2y$10$GfRY9EFeLAIQJIbLQiRBCO84oq7Y3SMNRvXD291JRZpTZDR1sx4qa', 'Customer', 'permit1.jpg', 0, '2022-11-24 08:10:51'),
(34, '123456678', '', 'Ramos', 'Johny', 'Raven', 'ramso@gmail.com', '09123456789', 'ramos', '$2y$10$3LA7zX2aINMPaGrUDq82qOblpjqfU0iM3esz7jfTZsSpFjT7/lI6G', 'Customer', '184-1844338_2017-2018-holiday-closures-christmas-decorations-clipart-png.png', 0, '2022-11-26 11:23:53'),
(35, '1234567909', '', 'Santos', 'Jillian', 'Lopez', 'jillianlopez@gmail.com', '0912345789', 'jillian', '$2y$10$MxYXyzoaqtgiQg1npwFeouxZ9qaZ7gIV5FDUHVK/WcN/KXg.AZ/4a', 'Customer', 'images_1667221822038.jpeg', 0, '2022-11-30 01:02:23'),
(36, '9999', '', 'Doe', 'John', 'F', 'd@d.com', '', 'joe', '$2y$10$8Om5PoB7sZBmKo2aLI4iHOxeVBHTko8vPfsV3nLBzdd81Tpm.FCaK', 'Customer', 'cat.jpg', 0, '2022-12-05 09:34:18'),
(37, '9999', '', 'Doe', 'John', 'F', 'jedriesie@gmail.com', '', 'dj', '$2y$10$QNEMaQ3H87bo/mUgBCOmmeQtHFKO6TX/Bu7iuAbic25fOxES3WSTe', 'Customer', 'cat.jpg', 0, '2022-12-05 09:41:11'),
(38, 'Abctest1234', '', 'Virtudazo', 'Louise', 'Test', 'louisevirtudazo@gmail.com', '09214376236', 'testuser', '$2y$10$8hOAvvkAUNeHcu0cMJHpRegVYbHZOYGUK672dAdHODnwVH6NgXRWW', 'Customer', 'inbound4508353513020999282.jpg', 1, '2022-12-12 02:11:28'),
(39, 'Abc123test', '', 'TestMacro Lastname', 'TestMacro Firstname', 'TestMacro Middlename', 'TestMacro@test.com', '123456789', 'testmacro', '$2y$10$GSykYpaylykk/rO0ALGZXO3KSBhUtxksJaDEziMejsn9qYbeDAgJW', 'Macro', 'Maroon and Green Greyscale Photo Basketball Stats UAAPNCAA Instagram Post.png', 1, '2022-12-12 02:19:52'),
(40, 'testmacro', '', 'testmacro', 'testmacro', 'testmacro', 'testmacro1@test.com', '1234567', 'testmacro', '$2y$10$p3aPsvRL5XcEvh9zUEZrGujRhG81xZgMwsARLwStjKh7kUlgo.NVm', 'Macro', 'Maroon and Green Greyscale Photo Basketball Stats UAAPNCAA Instagram Post.png', 1, '2022-12-12 02:24:02'),
(41, 'Abc123test', '', 'testmicro', 'testmicro', 'testmicro', 'testmicro@test.com', '12345', 'testmicro', '$2y$10$.RVRbOuqtPJcUAGUDf4FMe7l4.IxGc4sWiW4f9B8sl/FZTTIeqC8e', 'Micro', 'Maroon and Green Greyscale Photo Basketball Stats UAAPNCAA Instagram Post.png', 1, '2022-12-12 03:17:03'),
(42, 'customer', '', 'c', 'c', 'c', 'carbamark123@gmail.com', '+639471559441', 'customer', '$2y$10$XcKGv41U7wTv9TKWuRSTNOFH02vpVe.HA1Lz5JiRzMxQS/IERWRqm', 'Customer', 'Capture.PNG', 1, '2022-12-15 09:34:50'),
(43, '123', '', 'macro', 'm', 'm', 'punkmakier18@gmail.com', '123', 'macro', '$2y$10$mTd8hDqdKVSh4INh5TiqbuZTBEffK0OfGbgpjIJjOYzsYpDMEfixW', 'Macro', 'f.PNG', 1, '2022-12-15 09:48:35'),
(45, 'a', '', 's', 's', 's', 'klintoiyas@gmail.com', '232', 'd', '$2y$10$qcV9hbtLpBVrcY86r4VQSelyQN6seQYUYJazv2IO4NDTkUURGjehS', 'Customer', 'Mahindra-Scorpio-N-300620221053.jpg', 1, '2022-12-15 10:41:56'),
(46, '123456test', '', 'Reroma', 'Aj', 'Sample', 'carbamark@gmail.com', '+639471559441', 'aj', '$2y$10$Y2Wzt59PJLp.Wjb0hoQfpudbb2dKotutkU759rZzwMNiSKrzHRiRa', 'Micro', 'f.PNG', 1, '2022-12-28 12:17:38'),
(47, 'customerTestOnly', '', 'Ctest', 'TestCustomer', 'T', 'punkmakier19@gmail.com', '56151561', 'customer1', '$2y$10$/My385RmdkdM6.SjuymIo.SUVP.6.SgxNXngCpihO7NhZnwOKQG.C', 'Customer', 'bg-hompage.jpg', 1, '2022-12-28 12:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `accounts_id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `no_of_doors` int(11) NOT NULL,
  `fuel_tank_capacity` varchar(255) NOT NULL,
  `seating_capacity` varchar(255) NOT NULL,
  `transmission_type` varchar(255) NOT NULL,
  `gear_box` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `rulesandregulations` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `accounts_id`, `images`, `manufacturer`, `no_of_doors`, `fuel_tank_capacity`, `seating_capacity`, `transmission_type`, `gear_box`, `model`, `color`, `year`, `rate`, `fuel_type`, `rulesandregulations`, `date`) VALUES
(44, 43, 'Mahindra-Scorpio-N-300620221053.jpg', 'Hyundai', 5, '30', '8', 'Automatic', 'test', 'test', 'green', 2020, 6100, 'Diesel', '<p>Good nice and test</p>\r\n', '2022-12-15 09:51:02'),
(45, 43, 'BYD-Atto-3-111020221714.jpg', 'Honda', 4, '25', '4', 'Manual', 'ge', 'testttt', 'blue', 2019, 2500, 'Gas', '<p>testing</p>\r\n', '2022-12-15 10:12:59'),
(46, 46, 'White-Volkswagen-Car-PNG-Free-File-Download.png', 'Volkswagen', 5, '30', '6', 'Manual', 'test', 'Test Model', 'White', 2020, 9500, 'Diesel', '<p>Nice car test sample.</p>\r\n', '2022-12-28 12:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `position` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `reference`, `sender`, `receiver`, `message`, `position`, `date`) VALUES
(1, 'ADL541944', 'John David Lozano', 'David James Sadia Lozano', 'Thank you for your reservation. Your reference code is ADL541944', 0, '2022-06-16 08:43:29'),
(8, 'ADL541944', 'David James Sadia Lozano', 'John David Lozano', 'zxczxc23213', 1, '2022-06-16 09:15:43'),
(9, 'ADL541944', 'David James Sadia Lozano', 'John David Lozano', 'This is it', 1, '2022-06-16 09:15:53'),
(10, 'ADL806694', 'David James Sadia Lozano', 'John David Lozano', 'Hello', 1, '2022-06-16 09:16:10'),
(11, 'ADL113174', 'John David Lozano', 'David James Sadia Lozano', 'Thank you for your reservation. Your reference code is ADL113174', 0, '2022-06-16 09:57:17'),
(12, 'ADL820584', 'John David Lozano', 'David James Sadia Lozano', 'Thank you for your reservation. Your reference code is ADL820584', 0, '2022-06-16 11:10:53'),
(13, 'ADL820584', 'John David Lozano2', 'John David Lozano', 'this is great', 1, '2022-06-16 11:46:24'),
(14, 'ADL820584', 'John David Lozano', 'John David Lozano', 'zxczxc', 0, '2022-06-16 11:54:25'),
(15, 'ADL820584', 'John David Lozano2', 'John David Lozano', '1231231231', 1, '2022-06-16 11:54:47'),
(16, 'ADL820584', 'John David Lozano', 'John David Lozano', 'Hello world', 0, '2022-06-16 12:03:50'),
(17, 'ADL820584', 'John David Lozano', 'John David Lozano', 'test', 0, '2022-06-16 12:04:12'),
(18, 'ADL820584', 'John David Lozano', 'John David Lozano', 'zxc', 0, '2022-06-16 12:21:48'),
(19, 'ADL724204', 'Nick Liwag Hernandez', 'Gian Pasusani Lorenzo', 'Thank you for your reservation. Your reference code is ADL724204', 0, '2022-06-22 02:15:46'),
(20, 'ADL724204', 'Gian Pasusani Lorenzo', 'Nick Liwag Hernandez', 'fsdfsdf', 1, '2022-06-22 02:16:03'),
(21, 'ADL724204', 'Nick Liwag Hernandez', 'Nick Liwag Hernandez', 'reter', 0, '2022-06-22 02:16:38'),
(22, 'ADL724204', 'Gian Pasusani Lorenzo', 'Nick Liwag Hernandez', 'hiii', 1, '2022-06-22 02:41:40'),
(23, 'ADL677815', 'Nick Liwag Hernandez', 'Calixto Olaaga Olago', 'Thank you for your reservation. Your reference code is ADL677815', 0, '2022-06-22 03:12:24'),
(24, 'ADL677815', 'Calixto Olaaga Olago', 'Nick Liwag Hernandez', 'hoy', 1, '2022-06-22 03:13:02'),
(25, 'ADL677815', 'Nick Liwag Hernandez', 'Nick Liwag Hernandez', 'hoy ka rin', 0, '2022-06-22 03:13:15'),
(26, 'ADL632685', 'Mary Marife Gagala', 'Joey Benitez Vergom', 'Thank you for your reservation. Your reference code is ADL632685', 0, '2022-06-22 03:25:42'),
(27, 'ADL632685', 'Joey Benitez Vergom', 'Mary Marife Gagala', 'Hi\r\n', 1, '2022-06-22 03:26:15'),
(28, 'ADL632685', 'Joey Benitez Vergom', 'Mary Marife Gagala', 'Hello', 1, '2022-06-22 03:26:23'),
(29, 'ADL632685', 'Mary Marife Gagala', 'Mary Marife Gagala', 'Thank you!', 0, '2022-06-22 03:26:32'),
(30, 'ADL632685', 'Joey Benitez Vergom', 'Mary Marife Gagala', 'I want to cancel', 1, '2022-06-22 03:27:02'),
(31, 'ADL632685', 'Mary Marife Gagala', 'Mary Marife Gagala', 'Okay Sir', 0, '2022-06-22 03:27:22'),
(32, 'ADL936555', 'Nick Liwag Hernandez', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL936555', 0, '2022-06-22 10:32:22'),
(33, 'ADL632685', 'Mary Stephanie Roxas Ramos', 'Mary Stephanie Roxas Ramos', 'Hello', 0, '2022-06-22 12:55:36'),
(34, 'ADL995144', 'John Mark Lozano Reyes', 'Maria Francheska Divina Divina', 'Thank you for your reservation. Your reference code is ADL995144', 0, '2022-06-22 15:33:14'),
(35, 'ADL995144', 'Maria Francheska Divina Divina', 'John Mark Lozano Reyes', 'Hello', 1, '2022-06-22 15:34:26'),
(36, 'ADL995144', 'John Mark Lozano Reyes', 'John Mark Lozano Reyes', 'Hi', 0, '2022-06-22 15:34:37'),
(37, 'ADL995144', 'Maria Francheska Divina Divina', 'John Mark Lozano Reyes', 'can I pay in Gcash?', 1, '2022-06-22 15:35:45'),
(38, 'ADL195844', 'Maria Klorena Santos', 'Keane Ryane Manalad', 'Thank you for your reservation. Your reference code is ADL195844', 0, '2022-06-23 02:33:13'),
(39, 'ADL195844', 'Keane Ryane Manalad', 'Maria Klorena Santos', 'Hello Sir', 1, '2022-06-23 02:33:36'),
(40, 'ADL195844', 'Maria Klorena Santos', 'Maria Klorena Santos', 'Hi', 0, '2022-06-23 02:33:45'),
(41, 'ADL555308', 'Mae Ann Laguna Magsaysay', 'Keane Ryane Manalad', 'Thank you for your reservation. Your reference code is ADL555308', 0, '2022-06-23 02:55:24'),
(42, 'ADL755330', 'Mae Ann Laguna Magsaysay', 'Franzell Sales Placido', 'Thank you for your reservation. Your reference code is ADL755330', 0, '2022-06-24 02:26:27'),
(43, 'ADL755330', 'Mae Ann Laguna Magsaysay', 'Mae Ann Laguna Magsaysay', 'Hi', 0, '2022-06-24 02:26:54'),
(44, 'ADL755330', 'Franzell Sales Placido', 'Mae Ann Laguna Magsaysay', 'Hi\r\n', 1, '2022-06-24 02:26:59'),
(45, 'ADL161130', 'Nick Liwag Hernandez', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL161130', 0, '2022-06-24 03:37:43'),
(46, 'ADL611690', 'Nick Liwag Hernandez', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL611690', 0, '2022-06-24 03:38:05'),
(47, 'ADL662072', 'Johny Stephenson Bravo', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL662072', 0, '2022-06-24 03:39:43'),
(48, 'ADL613241', 'Mae Ann Laguna Magsaysay', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL613241', 0, '2022-06-24 03:45:24'),
(49, 'ADL545026', 'Nick Liwag Hernandez', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL545026', 0, '2022-06-24 03:46:05'),
(50, 'ADL931135', 'Mae Ann Laguna Magsaysay', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL931135', 0, '2022-06-24 04:01:11'),
(51, 'ADL118638', 'Maria Klorena Santos', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL118638', 0, '2022-06-24 04:04:34'),
(52, '36400', 'Nick Liwag Hernandez', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is 36400', 0, '2022-06-24 04:08:56'),
(53, '100100', 'Nick Liwag Hernandez', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is 100100', 0, '2022-06-24 04:09:11'),
(54, '22000', 'Mary Stephanie Roxas Ramos', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is 22000', 0, '2022-06-24 04:10:26'),
(55, 'ADL620696', 'Maria Klorena Santos', 'Ansel John Alolod Reroma', 'Thank you for your reservation. Your reference code is ADL620696', 0, '2022-06-24 04:10:46'),
(56, 'ADL791758', 'Mae Ann Laguna Magsaysay', 'Juan Dela Cruz Pedro', 'Thank you for your reservation. Your reference code is ADL791758', 0, '2022-10-01 02:46:56'),
(57, 'ADL791758', 'Juan Dela Cruz Pedro', 'Mae Ann Laguna Magsaysay', 'Thank you', 1, '2022-10-01 02:49:37'),
(58, 'ADL791758', 'Mae Ann Laguna Magsaysay', 'Mae Ann Laguna Magsaysay', 'Ok', 0, '2022-10-01 02:49:44'),
(59, 'ADL490889', 'Nick Liwag Hernandez', 'Jackie Torres Chan', 'Thank you for your reservation. Your reference code is ADL490889', 0, '2022-10-01 08:11:34'),
(60, 'ADL440110', 'Nick Liwag Hernandez', 'Jackie Torres Chan', 'Thank you for your reservation. Your reference code is ADL440110', 0, '2022-10-01 08:13:19'),
(61, 'ADL543034', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL543034', 0, '2022-11-10 04:48:46'),
(62, 'ADL548164', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL548164', 0, '2022-11-10 04:57:20'),
(63, 'ADL171682', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL171682', 0, '2022-11-10 04:59:27'),
(64, 'ADL288334', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL288334', 0, '2022-11-10 05:02:33'),
(65, 'ADL889514', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL889514', 0, '2022-11-10 05:05:39'),
(66, 'ADL691198', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL691198', 0, '2022-11-10 05:11:42'),
(67, 'ADL978939', 'Nick Liwag Hernandez', 'bryan sorar starl', 'Thank you for your reservation. Your reference code is ADL978939', 0, '2022-11-10 05:13:58'),
(68, 'ADL519484', 'Nick Liwag Hernandez', 'Raven Faith Santos Ricardo', 'Thank you for your reservation. Your reference code is ADL519484', 0, '2022-11-17 00:25:48'),
(69, 'ADL641488', 'Nick Liwag Hernandez', 'Raven Faith Santos Ricardo', 'Thank you for your reservation. Your reference code is ADL641488', 0, '2022-12-08 10:43:04'),
(70, 'ABC344946', 'Nick Liwag Hernandez', 'Raven Faith Santos Ricardo', 'Thank you for your reservation. Your reference code is ABC344946', 0, '2022-12-08 15:17:21'),
(71, 'ABC996649', 'Nick Liwag Hernandez', 'Raven Faith Santos Ricardo', 'Thank you for your reservation. Your reference code is ABC996649', 0, '2022-12-08 15:38:46'),
(72, 'ABC970222', 'Mae Ann Laguna Magsaysay', 'Louise Test Virtudazo', 'Thank you for your reservation. Your reference code is ABC970222', 0, '2022-12-12 02:17:37'),
(73, 'ABC970222', 'Louise Test Virtudazo', 'Mae Ann Laguna Magsaysay', 'Test Chat', 1, '2022-12-12 02:18:09'),
(74, 'ABC576494', 'testmicro testmicro testmicro', 'Louise Test Virtudazo', 'Thank you for your reservation. Your reference code is ABC576494', 0, '2022-12-12 03:20:11'),
(75, 'ABC244600', 'Nick Liwag Hernandez', 'c c c', 'Thank you for your reservation. Your reference code is ABC244600', 0, '2022-12-15 09:45:00'),
(76, 'ABC614028', 'm m macro', 'c c c', 'Thank you for your reservation. Your reference code is ABC614028', 0, '2022-12-15 09:54:58'),
(77, 'ABC614028', 'm m macro', 'm m macro', 'Hi', 0, '2022-12-15 09:55:48'),
(78, 'ABC614028', 'c c c', 'm m macro', 'hello', 1, '2022-12-15 09:56:01'),
(79, 'ABC709852', 'm m macro', 'c c c', 'Thank you for your reservation. Your reference code is ABC709852', 0, '2022-12-15 10:27:30'),
(80, 'ABC114914', 'Aj Sample Reroma', 'TestCustomer T Ctest', 'Thank you for your reservation. Your reference code is ABC114914', 0, '2022-12-28 12:33:16'),
(81, 'ABC376492', 'm m macro', 'TestCustomer T Ctest', 'Thank you for your reservation. Your reference code is ABC376492', 0, '2022-12-28 12:47:06'),
(82, 'ABC692453', 'm m macro', 'TestCustomer T Ctest', 'Thank you for your reservation. Your reference code is ABC692453', 0, '2022-12-28 12:48:28'),
(83, 'ABC796139', 'Aj Sample Reroma', 's s s', 'Thank you for your reservation. Your reference code is ABC796139', 0, '2022-12-28 12:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `editpage`
--

CREATE TABLE `editpage` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editpage`
--

INSERT INTO `editpage` (`id`, `content`) VALUES
(1, '<h2>We, at ABC Car Rental, are committed in providing you excellent cheap van and car rental in Sampaloc V , Bucal, Dasmari&ntilde;as City, Cavite, Philippines. We provide you flexible offerings including transport services, car rental, van rentals, long and short term leases.</h2>\r\n'),
(2, '<h2>Don&#39;t hesitate to message us if you have concerns, problems, or inquiries about Car Rentals.<br />\r\n<br />\r\nAddress: Sampaloc V, Bucal, Dasmarinas City, Cavite<br />\r\nPhone: 09675712345<br />\r\nEmail: carrentalcavite@gmail.com</h2>\r\n'),
(3, '<h2>Frequently Asked Questions (FAQs)</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Q: What documents are needed for account registration?</p>\r\n\r\n<p>A: For customers, a valid and not expired Philippine Driver&#39;s license is required. For Car owners, a business permit is required. Take note that there is an account verification for account registration.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Q: What should I do if I damage the car?</p>\r\n\r\n<p>A; Any damage or scratches will be charged to the customer.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, '<p><strong>Personal information and data used in the form will be handled in accordance with the Data Privacy Act of 2012 (DPA), its Implementing Rules and Regulations (IRR), and other relevant laws.</strong></p>\r\n\r\n<p>By filling up this form, I agree that the information provided with this form are true, complete, and accurate.</p>\r\n'),
(5, '<p><strong>Personal information and data used in the form will be handled in accordance with the Data Privacy Act of 2012 (DPA), its Implementing Rules and Regulations (IRR), and other relevant laws.</strong></p>\r\n\r\n<p>By filling up this form, I agree that the information provided with this form are true, complete, and accurate.</p>\r\n'),
(6, '<p><strong>Personal information and data used in the form will be handled in accordance with the Data Privacy Act of 2012 (DPA), its Implementing Rules and Regulations (IRR), and other relevant laws.</strong></p>\r\n\r\n<p>By filling up this form, I agree that the information provided with this form are true, complete, and accurate.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer`, `logo`) VALUES
(1, 'Mitsubishi', ''),
(2, 'Honda', ''),
(3, 'Toyota', ''),
(4, 'Suzuki', ''),
(5, 'Isuzu', ''),
(6, 'Nissan', ''),
(7, 'Kia', ''),
(8, 'Hyundai', ''),
(9, 'Foton', ''),
(10, 'Chevrolet', ''),
(11, 'Mazda', ''),
(12, 'Ford', ''),
(13, 'MG', ''),
(14, 'Chery', ''),
(15, 'BMW', ''),
(16, 'Audi', ''),
(17, 'Geely', ''),
(18, 'Volvo', ''),
(19, 'Volkswagen', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `owners_id` int(11) NOT NULL,
  `cars_id` int(11) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `rate_per_day` int(11) NOT NULL,
  `days_rented` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `reference` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reason` longtext DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `owners_id`, `cars_id`, `destination`, `purpose`, `from`, `to`, `rate_per_day`, `days_rented`, `total`, `reference`, `status`, `reason`, `date`) VALUES
(52, 42, 43, 44, 'Moalboal', 'Going home', '12/15/2022', '12/20/2022', 6100, 5, 30500, 'ABC614028', 'Approved', 'test', '2022-12-16 09:54:58'),
(53, 42, 43, 44, 'Moalboal', 'Travel', '12/15/2022', '12/19/2022', 6100, 5, 20000, 'ABC709852', 'Approved', NULL, '2022-12-16 16:00:00'),
(54, 47, 46, 46, 'Moalboal', 'Unwind', '12/28/2022', '12/31/2022', 9500, 4, 38000, 'ABC114914', 'Approved', NULL, '2022-12-28 12:33:16'),
(55, 47, 43, 44, 'Iloilo', 'Travelling', '12/28/2022', '12/30/2022', 6100, 3, 18300, 'ABC376492', 'Pending', NULL, '2022-12-28 12:47:06'),
(56, 47, 43, 45, 'Moalboal', 'TOR,Hon. Dismissal,Good Moral and I like to ask my NSTP Serial Num req. sch', '01/01/2023', '01/07/2023', 2500, 7, 17500, 'ABC692453', 'Pending', NULL, '2022-12-28 12:48:28'),
(57, 45, 46, 46, 'Moalboal', 'Travel', '01/15/2023', '01/18/2023', 9500, 4, 38000, 'ABC796139', 'Cancelled', 'just cancel', '2022-12-28 12:55:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editpage`
--
ALTER TABLE `editpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `editpage`
--
ALTER TABLE `editpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
