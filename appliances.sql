SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 05:15 PM
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
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `no` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text(2000) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` float(25) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`


--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--


--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/* Tables for Cleaning Appliances*/

CREATE TABLE `z_vacuum` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_dishsterilizer` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_insectsterilizer` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tables for Kitchen Appliances*/

CREATE TABLE `z_refrigerator` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_coffeemaker` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_airfryer_ovens` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_blender_mixers` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tables for Laundry Appliances*/

CREATE TABLE `z_washingmachine` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_dryer` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_irons` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tables for Climate Control Appliances*/

CREATE TABLE `z_airconditioners` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_heater` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_fans` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tables for Multimedia Appliances*/

CREATE TABLE `z_television` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_audiosystem` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `z_gameconsole` (
    `id` int(100) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `category` varchar(100) NOT NULL,
    `price` int(25) NOT NULL,
    `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;






CREATE TABLE `datas` (
    `no` int(11) NOT NULL,
    `firstname` varchar(25) NOT NULL,
    `middlename` varchar(25) NOT NULL,
    `lastname` varchar(25) NOT NULL,
    `phonenumber` float(25) NOT NULL,
    `gender` varchar(25) NOT NULL,
    `birthdate` date NOT NULL,
    `age` int(25) NOT NULL,
    `street` varchar(100) NOT NULL,
    `city` varchar(100) NOT NULL,
    `province` varchar(100) NOT NULL,
    `barangay` varchar(100) NOT NULL,
    `username` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




ALTER TABLE `datas`
    ADD PRIMARY KEY (`no`);

ALTER TABLE `datas`
    MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

CREATE TRIGGER `for_user_data` AFTER INSERT ON `datas` FOR EACH ROW 
INSERT INTO `users`(`no`, `firstname`, `lastname`, `email`, `phonenumber`, `username`, `password`) 
VALUES (NEW.no, NEW.firstname, NEW.lastname, NEW.email, NEW.phonenumber, NEW.username, NEW.password);

CREATE TRIGGER `delete_for_user_data` AFTER DELETE ON `datas` FOR EACH ROW 
DELETE FROM `users`WHERE OLD.no = OLD.no;


SET GLOBAL event_scheduler="ON";

CREATE EVENT delete_incomplete_rows_event
ON SCHEDULE EVERY 2 SECOND
STARTS CURRENT_TIMESTAMP
DO
  DELETE FROM `datas` WHERE `firstname` = '' OR `lastname`='' OR `phonenumber`='' OR `gender`='' OR `birthdate`='' OR `age`=''
  OR `street`='' OR `city`='' OR `province`='' OR `barangay`='' OR `username`='' OR `email`='' OR `password`='';


CREATE EVENT delete_incomplete_rows_event_for_user
ON SCHEDULE EVERY 2 SECOND
STARTS CURRENT_TIMESTAMP
DO
  DELETE FROM `users` WHERE `firstname` = '' OR `lastname`='' OR `phonenumber`='' OR `username`='' OR `email`='' OR `password`='';






/*INSERT INTO users (no, firstname, lastname, email, phonenumber, username, password) VALUES (NEW.no, NEW.firstname, NEW.lastname, NEW.email, NEW.phonenumber, NEW.username, NEW.password)*/
