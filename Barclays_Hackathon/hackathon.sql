-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2015 at 06:48 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `merchant_reg`
--

CREATE TABLE IF NOT EXISTS `merchant_reg` (
`org_id` int(5) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_reg`
--

INSERT INTO `merchant_reg` (`org_id`, `org_name`, `email`, `password`) VALUES
(1, 'Amazon', 'amazon@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Flipkart', 'flipkart@gmail.com', '5972793cc1718423517639938aae9100'),
(3, 'Airtel', 'airtel@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(4, 'Rohan', 'rohansewaney456@gmail.com', '68053af2923e00204c3ca7c6a3150cf7'),
(5, 'Royal Heritage', 'royalheritage@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'Vodafone', 'vodafone@gmail.com', '84bc7eaa45ea2645f030a98e7866f34c'),
(7, 'Rudra', 'rudra.mishra35@gmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'Rocket Perks', 'rocketperks@gmail.com', '289dff07669d7a23de0ef88d2f7129e7'),
(9, 'Purswani', 'rohansewaney456@gmail.com', '68053af2923e00204c3ca7c6a3150cf7'),
(10, 'Dalwani and Sons.', 'sarupstud@dalwani.com', 'bca2438df82b734a871b82d512db30d7');

-- --------------------------------------------------------

--
-- Table structure for table `pay_gateway`
--

CREATE TABLE IF NOT EXISTS `pay_gateway` (
`pay_id` int(5) NOT NULL,
  `pay_name` varchar(30) NOT NULL,
  `thumbnail` varchar(50) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_gateway`
--

INSERT INTO `pay_gateway` (`pay_id`, `pay_name`, `thumbnail`) VALUES
(1, 'Barclaycard', 'images/barclaycard.jpg'),
(2, 'Samsung Pay', 'images/samsung.jpg'),
(3, 'Google Pay', 'images/googlewallet.png'),
(4, 'PayPal', 'images/paypal.png'),
(5, 'Apple Pay', 'images/apple.png'),
(6, 'PayUMoney', 'images/payu.png'),
(7, 'VISA', 'images/visa.png'),
(8, 'Bitcoin', 'images/bitcoin.png');

-- --------------------------------------------------------

--
-- Table structure for table `pay_merchant`
--

CREATE TABLE IF NOT EXISTS `pay_merchant` (
  `transaction_id` varchar(30) NOT NULL,
  `pay_op_id` int(5) NOT NULL,
  `amount` int(20) NOT NULL,
  `merchant_id` int(5) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `prod_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_merchant`
--

INSERT INTO `pay_merchant` (`transaction_id`, `pay_op_id`, `amount`, `merchant_id`, `cust_name`, `prod_name`) VALUES
('7b2f48be4f3e0b380e71', 6, 50000, 1, 'iPhone6', 'iPhone6');

-- --------------------------------------------------------

--
-- Table structure for table `pay_options`
--

CREATE TABLE IF NOT EXISTS `pay_options` (
  `orgid` int(5) NOT NULL,
  `pay_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_options`
--

INSERT INTO `pay_options` (`orgid`, `pay_id`) VALUES
(7, 4),
(2, 7),
(2, 5),
(3, 4),
(3, 2),
(5, 3),
(5, 6),
(1, 6),
(7, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `merchant_reg`
--
ALTER TABLE `merchant_reg`
 ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `pay_gateway`
--
ALTER TABLE `pay_gateway`
 ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `pay_merchant`
--
ALTER TABLE `pay_merchant`
 ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merchant_reg`
--
ALTER TABLE `merchant_reg`
MODIFY `org_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pay_gateway`
--
ALTER TABLE `pay_gateway`
MODIFY `pay_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
