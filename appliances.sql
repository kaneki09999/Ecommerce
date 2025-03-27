import React, { useState, useRef, useEffect } from 'react';
import { Modal, Button } from 'react-bootstrap';
import logo from '../assets/logo jobsync2.png';

const TermsAndConditions = ({ show, onClose }) => {
  const [isTextVisible, setIsTextVisible] = useState(false);
  const lastParagraphRef = useRef(null); // Reference to the last paragraph

  const handleVisibility = (entries) => {
    const entry = entries[0];
    setIsTextVisible(entry.isIntersecting);
  };

  useEffect(() => {
    if (show) { // Only set up observer when modal is shown
      const observer = new IntersectionObserver(handleVisibility, {
        root: null, // observing relative to the viewport
        threshold: 0.8, // 80% of the element is visible
      });

      if (lastParagraphRef.current) {
        observer.observe(lastParagraphRef.current);
      }

      // Clean up observer when modal is hidden or component is unmounted
      return () => {
        if (lastParagraphRef.current) {
          observer.unobserve(lastParagraphRef.current);
        }
      };
    }
  }, [show]); // This effect runs every time 'show' changes

  // Reset the visibility state when the modal closes
  useEffect(() => {
    if (!show) {
      setIsTextVisible(false); // Reset the button state when modal is closed
    }
  }, [show]);

  return (
    <Modal
      show={show}
      onHide={onClose}
      size="lg"
      centered
      backdrop="static"
      keyboard={false}
    >
      <Modal.Header style={{ backgroundColor: '#1863b9' }} closeButton={false}>
        <div style={{ display: 'flex', alignItems: 'center' }}>
          <img
            src={logo}
            alt="Logo"
            style={{ width: '60px', height: '60px', marginRight: '10px' }}
          />
          <Modal.Title style={{ color: 'white' }}>Terms and Conditions</Modal.Title>
        </div>
      </Modal.Header>
      <Modal.Body
        style={{
          padding: '20px 40px',
          maxHeight: '60vh',
          overflowY: 'auto',
          scrollBehavior: 'smooth',
        }}
      >
        <h5>Effective Date: [Insert Date]</h5>
        <p style={{ textAlign: 'justify' }}>
          Welcome to JobSync: Advanced Recruitment Platform with Integrated Video Interviewing and Face ID
          Verification ("JobSync"). By registering as an employer and using our platform, you agree to comply with and be
          bound by these Terms and Conditions. Please read them carefully.
        </p>

        <h6>1. Acceptance of Terms</h6>
        <p style={{ textAlign: 'justify' }}>
          By creating an employer account and posting job opportunities on JobSync, you acknowledge that you have read, understood, and agreed to
          these Terms and Conditions. If you do not agree, please do not use our services.
        </p>

        -- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 04:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appliances`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`no`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(3, 1, 'SpinMaster Pro', 3000, 1, 'washing1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datas`
--

CREATE TABLE `datas` (
  `no` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `phonenumber` double NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Triggers `datas`
--
DELIMITER $$
CREATE TRIGGER `delete_for_user_data` AFTER DELETE ON `datas` FOR EACH ROW DELETE FROM `users`WHERE OLD.no = OLD.no
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `for_user_data` AFTER INSERT ON `datas` FOR EACH ROW INSERT INTO `users`(`no`, `firstname`, `lastname`, `email`, `phonenumber`, `username`, `password`) 
VALUES (NEW.no, NEW.firstname, NEW.lastname, NEW.email, NEW.phonenumber, NEW.username, NEW.password)
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'SpinMaster Pro', 'The SpinMaster Pro is engineered for ultimate performance with advanced spin technology. It ensures faster drying and a superior cleaning experience, saving time and energy with every wash. Perfect for those who value efficiency and innovation in their laundry routine.', 'Laundry Appliances', 3000, 'washing1.jpg'),
(2, 'BreezeBake Oven', 'The BreezeBake Oven combines the power of convection with air frying technology, ensuring food is cooked evenly with a fraction of the oil. From baking delicate pastries to crispy fries, this oven is your all-in-one solution for quick and tasty meals.', 'Air Fryers & Ovens', 2600, 'oven2.jpg'),
(3, 'CleanSweep Vacuum', 'The CleanSweep Vacuum is designed to give you powerful suction and deep cleaning performance for every surface in your home. With advanced filtration and multi-surface capabilities, this vacuum ensures your home is spotless with minimal effort.', 'Vacuum Cleaners', 1200, 'vacuum1.jpg'),
(4, 'SterilizePro Dish Sterilizer', 'The SterilizePro Dish Sterilizer uses high-temperature steam to disinfect your dishes, killing bacteria and germs without the need for harsh chemicals. Perfect for keeping your kitchen safe and hygienic.', 'Dish Sterilizers', 800, 'dishsterilizer1.jpg'),
(5, 'InsectGuard Sterilizer', 'The InsectGuard Sterilizer uses UV light to eliminate insects and pests, providing a safe and chemical-free solution for your home or office. Effective against flies, mosquitoes, and other common pests.', 'Insect Sterilizers', 950, 'insect1.jpg'),
(6, 'FrostFree Fridge', 'The FrostFree Fridge offers spacious storage with energy-efficient cooling technology. Its advanced features like quick freeze and odor protection keep your food fresh for longer.', 'Refrigerators', 4500, 'ref1.jpg'),
(7, 'BrewMaster Coffee Maker', 'The BrewMaster Coffee Maker provides the perfect brew every time with customizable strength and size. Whether you prefer a quick espresso or a full pot, this machine has you covered.', 'Coffee Makers', 1200, 'coffeemaker1.jpg'),
(8, 'BlendMax Pro', 'The BlendMax Pro is a powerful blender that can handle everything from smoothies to soups with ease. Featuring multiple speed settings and a durable design, it ensures smooth results every time.', 'Blenders & Mixers', 1500, 'blender1.jpg'),
(9, 'QuickDry Clothes Dryer', 'The QuickDry Clothes Dryer dries your clothes faster while being gentle on fabrics. Featuring energy-efficient technology, it saves both time and electricity while maintaining top-notch performance.', 'Clothes Dryers', 2200, 'dryer1.jpg'),
(10, 'PressPerfect Iron', 'The PressPerfect Iron is designed for precision, offering steam and dry settings for a wrinkle-free experience. Its non-stick soleplate and quick heat-up time make ironing fast and efficient.', 'Irons', 850, 'iron1.jpg'),
(11, 'CoolBreeze Air Conditioner', 'The CoolBreeze Air Conditioner provides effective cooling with energy-saving features. Whether for your home or office, it offers quiet operation and adjustable settings for personalized comfort.', 'Air Conditioners', 7500, 'aircon1.jpg'),
(12, 'BreezeCool Fan', 'The BreezeCool Fan is designed to deliver a refreshing breeze with adjustable speed and oscillation. Its quiet operation and sleek design make it a perfect addition to any room.', 'Fans', 900, 'fan3.jpg'),
(13, 'VisionX 4K TV', 'The VisionX 4K TV brings stunning picture quality and vibrant colors to your living room. With smart features and streaming capabilities, it is the perfect entertainment hub for all your needs.', 'Televisions', 10000, 'tv1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `no` int(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` double NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_airconditioners`
--

CREATE TABLE `z_airconditioners` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_airconditioners`
--

INSERT INTO `z_airconditioners` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'CoolBreeze Air Conditioner', 'The CoolBreeze Air Conditioner provides effective cooling with energy-saving features. Whether for your home or office, it offers quiet operation and adjustable settings for personalized comfort.', 'Air Conditioners', 7500, 'aircon1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_airfryer_ovens`
--

CREATE TABLE `z_airfryer_ovens` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_airfryer_ovens`
--

INSERT INTO `z_airfryer_ovens` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'BreezeBake Oven', 'The BreezeBake Oven combines the power of convection with air frying technology, ensuring food is cooked evenly with a fraction of the oil. From baking delicate pastries to crispy fries, this oven is your all-in-one solution for quick and tasty meals.', 'Air Fryers & Ovens', 2600, 'oven1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_audiosystem`
--

CREATE TABLE `z_audiosystem` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_blender_mixers`
--

CREATE TABLE `z_blender_mixers` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_blender_mixers`
--

INSERT INTO `z_blender_mixers` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'BlendMax Pro', 'The BlendMax Pro is a powerful blender that can handle everything from smoothies to soups with ease. Featuring multiple speed settings and a durable design, it ensures smooth results every time.', 'Blenders & Mixers', 1500, 'blender1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_coffeemaker`
--

CREATE TABLE `z_coffeemaker` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_coffeemaker`
--

INSERT INTO `z_coffeemaker` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'BrewMaster Coffee Maker', 'The BrewMaster Coffee Maker provides the perfect brew every time with customizable strength and size. Whether you prefer a quick espresso or a full pot, this machine has you covered.', 'Coffee Makers', 1200, 'coffeemaker1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_dishsterilizer`
--

CREATE TABLE `z_dishsterilizer` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_dishsterilizer`
--

INSERT INTO `z_dishsterilizer` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'SterilizePro Dish Sterilizer', 'The SterilizePro Dish Sterilizer uses high-temperature steam to disinfect your dishes, killing bacteria and germs without the need for harsh chemicals. Perfect for keeping your kitchen safe and hygienic.', 'Dish Sterilizers', 800, 'dishsterilizer1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_dryer`
--

CREATE TABLE `z_dryer` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_dryer`
--

INSERT INTO `z_dryer` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'QuickDry Clothes Dryer', 'The QuickDry Clothes Dryer dries your clothes faster while being gentle on fabrics. Featuring energy-efficient technology, it saves both time and electricity while maintaining top-notch performance.', 'Clothes Dryers', 2200, 'dryer1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_fans`
--

CREATE TABLE `z_fans` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_fans`
--

INSERT INTO `z_fans` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'BreezeCool Fan', 'The BreezeCool Fan is designed to deliver a refreshing breeze with adjustable speed and oscillation. Its quiet operation and sleek design make it a perfect addition to any room.', 'Fans', 900, 'fan1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_gameconsole`
--

CREATE TABLE `z_gameconsole` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_heater`
--

CREATE TABLE `z_heater` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `z_insectsterilizer`
--

CREATE TABLE `z_insectsterilizer` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_insectsterilizer`
--

INSERT INTO `z_insectsterilizer` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'InsectGuard Sterilizer', 'The InsectGuard Sterilizer uses UV light to eliminate insects and pests, providing a safe and chemical-free solution for your home or office. Effective against flies, mosquitoes, and other common pests.', 'Insect Sterilizers', 950, 'insect1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_irons`
--

CREATE TABLE `z_irons` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_irons`
--

INSERT INTO `z_irons` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'PressPerfect Iron', 'The PressPerfect Iron is designed for precision, offering steam and dry settings for a wrinkle-free experience. Its non-stick soleplate and quick heat-up time make ironing fast and efficient.', 'Irons', 850, 'iron1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_refrigerator`
--

CREATE TABLE `z_refrigerator` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_refrigerator`
--

INSERT INTO `z_refrigerator` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'FrostFree Fridge', 'The FrostFree Fridge offers spacious storage with energy-efficient cooling technology. Its advanced features like quick freeze and odor protection keep your food fresh for longer.', 'Refrigerators', 4500, 'ref1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_television`
--

CREATE TABLE `z_television` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_television`
--

INSERT INTO `z_television` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'VisionX 4K TV', 'The VisionX 4K TV brings stunning picture quality and vibrant colors to your living room. With smart features and streaming capabilities, it is the perfect entertainment hub for all your needs.', 'Televisions', 10000, 'tv1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_vacuum`
--

CREATE TABLE `z_vacuum` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_vacuum`
--

INSERT INTO `z_vacuum` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'CleanSweep Vacuum', 'The CleanSweep Vacuum is designed to give you powerful suction and deep cleaning performance for every surface in your home. With advanced filtration and multi-surface capabilities, this vacuum ensures your home is spotless with minimal effort.', 'Vacuum Cleaners', 1200, 'vacuum1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `z_washingmachine`
--

CREATE TABLE `z_washingmachine` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(25) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `z_washingmachine`
--

INSERT INTO `z_washingmachine` (`id`, `name`, `description`, `category`, `price`, `image`) VALUES
(1, 'SpinMaster Pro', 'The SpinMaster Pro is engineered for ultimate performance with advanced spin technology. It ensures faster drying and a superior cleaning experience, saving time and energy with every wash. Perfect for those who value efficiency and innovation in their laundry routine.', 'Laundry Appliances', 3000, 'washing1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`no`);

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
-- Indexes for table `z_airconditioners`
--
ALTER TABLE `z_airconditioners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_airfryer_ovens`
--
ALTER TABLE `z_airfryer_ovens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_audiosystem`
--
ALTER TABLE `z_audiosystem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_blender_mixers`
--
ALTER TABLE `z_blender_mixers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_coffeemaker`
--
ALTER TABLE `z_coffeemaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_dishsterilizer`
--
ALTER TABLE `z_dishsterilizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_dryer`
--
ALTER TABLE `z_dryer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_fans`
--
ALTER TABLE `z_fans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_gameconsole`
--
ALTER TABLE `z_gameconsole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_heater`
--
ALTER TABLE `z_heater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_insectsterilizer`
--
ALTER TABLE `z_insectsterilizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_irons`
--
ALTER TABLE `z_irons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_refrigerator`
--
ALTER TABLE `z_refrigerator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_television`
--
ALTER TABLE `z_television`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_vacuum`
--
ALTER TABLE `z_vacuum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `z_washingmachine`
--
ALTER TABLE `z_washingmachine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `datas`
--
ALTER TABLE `datas`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `z_airconditioners`
--
ALTER TABLE `z_airconditioners`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_airfryer_ovens`
--
ALTER TABLE `z_airfryer_ovens`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_audiosystem`
--
ALTER TABLE `z_audiosystem`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_blender_mixers`
--
ALTER TABLE `z_blender_mixers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_coffeemaker`
--
ALTER TABLE `z_coffeemaker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_dishsterilizer`
--
ALTER TABLE `z_dishsterilizer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_dryer`
--
ALTER TABLE `z_dryer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_fans`
--
ALTER TABLE `z_fans`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_gameconsole`
--
ALTER TABLE `z_gameconsole`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_heater`
--
ALTER TABLE `z_heater`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `z_insectsterilizer`
--
ALTER TABLE `z_insectsterilizer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_irons`
--
ALTER TABLE `z_irons`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_refrigerator`
--
ALTER TABLE `z_refrigerator`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_television`
--
ALTER TABLE `z_television`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_vacuum`
--
ALTER TABLE `z_vacuum`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `z_washingmachine`
--
ALTER TABLE `z_washingmachine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_incomplete_rows_event` ON SCHEDULE EVERY 2 SECOND STARTS '2025-03-27 15:12:15' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `datas` WHERE `firstname` = '' OR `lastname`='' OR `phonenumber`='' OR `gender`='' OR `birthdate`='' OR `age`=''
  OR `street`='' OR `city`='' OR `province`='' OR `barangay`='' OR `username`='' OR `email`='' OR `password`=''$$

CREATE DEFINER=`root`@`localhost` EVENT `delete_incomplete_rows_event_for_user` ON SCHEDULE EVERY 2 SECOND STARTS '2025-03-27 15:12:15' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `users` WHERE `firstname` = '' OR `lastname`='' OR `phonenumber`='' OR `username`='' OR `email`='' OR `password`=''$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


        <p ref={lastParagraphRef} style={{ textAlign: 'justify' }}>
          By using JobSync, you confirm that you have read and agreed to these Terms and Conditions.
        </p>
      </Modal.Body>
      <Modal.Footer style={{ justifyContent: 'center' }}>
        <Button
          variant="primary"
          onClick={onClose}
          disabled={!isTextVisible}
          style={{
            padding: '8px 30px',
            fontSize: '1.1rem',
            transition: 'opacity 0.3s ease',
          }}
        >
          Agree
        </Button>
      </Modal.Footer>
    </Modal>
  );
};

export default TermsAndConditions;
