-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2022 at 01:13 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iphoneshop_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `idaccount` int(45) NOT NULL,
  `idcustomer` int(11) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`idaccount`, `idcustomer`, `name`, `email`, `password`, `phone`, `address`) VALUES
(4, 63316115, 'Thanarat ', 'abc@gmail.com', '12345', '0954590469', '77/14'),
(5, 15223, 'Pannawadee', 'p@gmail.com', '0000', '0665552563', '256/6'),
(8, 15562, 'lju9ii9', 't@gmail.com', '456789', '0665552563', '256/6'),
(15, 63316115, 'Thanarat ', 'tt@gmail.com', '0000', '0954590469', '77/14');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `adname` varchar(45) DEFAULT NULL,
  `ademail` varchar(45) DEFAULT NULL,
  `adpassword` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `adname`, `ademail`, `adpassword`) VALUES
(1, 'admin', 'admin@gmail.com', '123456'),
(5, 'aa', 'aa@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `idcapacity` int(11) NOT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `capacityname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`idcapacity`, `idproduct`, `capacityname`) VALUES
(1, 0, '64GB'),
(2, 0, '128GB'),
(3, 0, '256GB'),
(4, 0, '512GB'),
(5, 0, '1TB');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `idcolor` int(11) NOT NULL,
  `colorname` varchar(45) DEFAULT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`idcolor`, `colorname`, `idproduct`) VALUES
(1, '(PRODUCT)RED', 11),
(2, 'green', 0),
(3, 'purple', 0),
(4, 'yellow', 0),
(5, 'white', 0),
(6, 'black', 0),
(7, 'blue', 0),
(8, 'pink', 0),
(9, 'sierra blue', 0),
(10, 'money', 0),
(11, 'gold', 0),
(12, 'graphite', 0),
(13, 'starlight', 0),
(14, 'midnight', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `idaccount` int(11) DEFAULT NULL,
  `idpayment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer_has_product`
--

CREATE TABLE `customer_has_product` (
  `idcustomer` varchar(45) NOT NULL,
  `idproduct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `idmodel` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `modelname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`idmodel`, `idproduct`, `modelname`) VALUES
(1, 0, 'iPhone 11'),
(2, 0, 'iPhone SE'),
(3, 0, 'iPhone 12'),
(4, 0, 'iPhone 12 mini'),
(5, 0, 'iPhone 13'),
(6, 0, 'iPhone 13 mini'),
(7, 0, 'iPhone 13 Pro'),
(8, 0, 'iPhone 13 Pro Max');

-- --------------------------------------------------------

--
-- Table structure for table `order1`
--

CREATE TABLE `order1` (
  `idorder` int(11) NOT NULL,
  `idaccount` int(11) DEFAULT NULL,
  `idproduct` int(11) DEFAULT NULL,
  `credit` varchar(45) DEFAULT NULL,
  `option` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order1`
--

INSERT INTO `order1` (`idorder`, `idaccount`, `idproduct`, `credit`, `option`, `date`, `time`) VALUES
(13, 5, 56, 'Cash', 'cash', '2022-03-10', '01:43:00'),
(14, 5, 1, '256663366', 'credit', '2022-03-10', '01:44:00'),
(15, 8, 53, '0568959847', 'bank', '2022-03-10', '02:30:00'),
(19, 4, 1, '255562', 'credit', '2022-03-10', '07:44:00'),
(21, 15, 27, '0568959847', 'bank', '2022-03-10', '15:59:00'),
(22, 15, 3, '0568959847', 'bank', '2022-03-10', '16:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `idmodel` int(11) DEFAULT NULL,
  `idcolor` int(11) DEFAULT NULL,
  `idcapacity` int(11) DEFAULT NULL,
  `productname` varchar(100) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idproduct`, `idmodel`, `idcolor`, `idcapacity`, `productname`, `price`) VALUES
(1, 1, 3, 1, 'iPhone 11,purple,64GB', '20,000'),
(2, 1, 2, 1, 'iPhone 11,green,64GB', '19,500'),
(3, 1, 4, 1, 'iPhone 11,yellow,64GB', '19,500'),
(4, 1, 5, 1, 'iPhone 11,White,64GB', '19,500'),
(5, 1, 6, 1, 'iPhone 11,black,64GB', '19,500'),
(6, 1, 1, 1, 'iPhone 11,(PRODUCT)RED,64GB', '19,500'),
(7, 1, 3, 2, 'iPhone 11 ,purple,128GB', '21,500'),
(8, 1, 2, 2, 'iPhone 11,green,128GB', '21,500'),
(9, 1, 4, 2, 'iPhone 11,yellow,128GB', '21,500'),
(10, 1, 5, 2, 'iPhone 11,white,128GB', '21,500'),
(11, 1, 6, 2, 'iPhone 11,black,128GB', '21,500'),
(12, 1, 1, 2, 'iPhone 11,(PRODUCT)RED,128GB', '21,500'),
(13, 2, 5, 1, 'iPhone SE,white,64GB', '14,900'),
(14, 2, 6, 1, 'iPhone SE,black,64GB', '14,900'),
(15, 2, 1, 1, 'iPhone SE,(PRODUCT)RED,64GB', '14,900'),
(16, 2, 5, 2, 'iPhone SE,white,128GB', '16,900'),
(17, 2, 6, 2, 'iPhone SE,black,128GB', '16,900'),
(18, 2, 1, 2, 'iPhone SE,(PRODUCT)RED,128GB', '16,900'),
(19, 3, 3, 1, 'iPhone 12,purple,64GB', '25,900'),
(20, 3, 7, 1, 'iPhone 12,blue,64GB', '25,900'),
(21, 3, 2, 1, 'iPhone 12,green,64GB', '25,900'),
(22, 3, 5, 1, 'iPhone 12,white,64GB', '25,900'),
(23, 3, 6, 1, 'iPhone 12,black,64GB', '25,900'),
(24, 3, 1, 1, 'iPhone 12,(PRODUCT)RED,64GB', '25,900'),
(25, 3, 3, 2, 'iPhone 12,purple,128GB', '27,900'),
(26, 3, 7, 2, 'iPhone 12,blue,128GB', '27,900'),
(27, 3, 2, 2, 'iPhone 12,green,128GB', '27,900'),
(28, 3, 5, 2, 'iPhone 12,white,128GB', '27,900'),
(29, 3, 6, 2, 'iPhone 12,black,128GB', '27,900'),
(30, 3, 1, 2, 'iPhone 12,(PRODUCT)RED,128GB', '27,900'),
(31, 3, 3, 3, 'iPhone 12,purple,256GB', '31,900'),
(32, 3, 7, 3, 'iPhone 12,blue,256GB', '31,900'),
(33, 3, 2, 3, 'iPhone 12,green,256GB', '31,900'),
(34, 3, 5, 3, 'iPhone 12,white,256GB', '31,900'),
(35, 3, 6, 3, 'iPhone 12,black,125GB', '31,900'),
(36, 3, 1, 3, 'iPhone 12,(PRODUCT)RED,256GB', '31,900'),
(37, 4, 3, 1, 'iPhone 12 mini,purple,64GB', '21,900'),
(38, 4, 7, 1, 'iPhone 12 mini,blue,64GB', '21,900'),
(39, 4, 2, 1, 'iPhone 12 mini,green,64GB', '21,900'),
(40, 4, 5, 1, 'iPhone 12 mini,white,64GB', '21,900'),
(41, 4, 6, 1, 'iPhone 12 mini,black,64GB', '21,900'),
(42, 4, 1, 1, 'iPhone 12 mini,(PRODUCT)RED,64GB', '21,900'),
(43, 4, 3, 2, 'iPhone 12 mini,purple,128GB', '23,900'),
(44, 4, 7, 2, 'iPhone 12 mini,blue,128GB', '23,900'),
(45, 4, 2, 2, 'iPhone 12 mini,green,128GB', '23,900'),
(46, 4, 5, 2, 'iPhone 12 mini,white,128GB', '23,900'),
(47, 4, 6, 2, 'iPhone 12 mini,black,128GB', '23,900'),
(48, 4, 1, 2, 'iPhone 12 mini,(PRODUCT)RED,128GB', '23,900'),
(49, 4, 3, 3, 'iPhone 12 mini,purple,256GB', '27,900'),
(50, 4, 7, 3, 'iPhone 12 mini,blue,256GB', '27,900'),
(51, 4, 2, 3, 'iPhone 12 mini,green,256GB', '27,900'),
(52, 4, 5, 3, 'iPhone 12 mini,white,256GB', '27,900'),
(53, 4, 6, 3, 'iPhone 12 mini,black,256GB', '27,900'),
(54, 4, 1, 3, 'iPhone 12 mini,(PRODUCT)RED,256GB', '27,900'),
(55, 5, 8, 2, 'iPhone 13,pink,128GB', '29,900'),
(56, 5, 7, 2, 'iPhone 13,blue,128GB', '29,900'),
(57, 5, 14, 2, 'iPhone 13,midnight,128GB', '29,900'),
(58, 5, 13, 2, 'iPhone 13,starlight,128GB', '29,900'),
(59, 5, 1, 2, 'iPhone 13,(PRODUCT)RED,128GB', '29,900'),
(60, 5, 8, 3, 'iPhone 13,pink,256GB', '33,900'),
(61, 5, 7, 3, 'iPhone 13,blue,256GB', '33,900'),
(62, 5, 14, 3, 'iPhone 13,midnight,256GB', '33,900'),
(63, 5, 13, 3, 'iPhone 13,starlight,256GB', '33,900'),
(64, 5, 1, 3, 'iPhone 13,(PRODUCT)RED,256GB', '33,900'),
(65, 5, 8, 4, 'iPhone 13,pink,512GB', '41,900'),
(66, 5, 7, 4, 'iPhone 13,blue,512GB', '41,900'),
(67, 5, 14, 4, 'iPhone 13,midnight,512GB', '41,900'),
(68, 5, 13, 4, 'iPhone 13,starlight,512GB', '41,900'),
(69, 5, 1, 4, 'iPhone 13,(PRODUCT)RED,512GB', '41,900'),
(70, 6, 8, 2, 'iPhone 13 mini,pink,128GB', '25,900'),
(71, 6, 7, 2, 'iPhone 13 mini,blue,128GB', '25,900'),
(72, 6, 14, 2, 'iPhone 13 mini,midnight,128GB', '25,900'),
(73, 6, 13, 2, 'iPhone 13 mini,starlight,128GB', '25,900'),
(74, 6, 1, 2, 'iPhone 13 mini,(PRODUCT)RED,128GB', '25,900'),
(75, 6, 8, 3, 'iPhone 13 mini,pink,256GB', '29,900'),
(76, 6, 7, 3, 'iPhone 13 mini,blue,256GB', '29,900'),
(77, 6, 14, 3, 'iPhone 13 mini,midnight,256GB', '29,900'),
(78, 6, 13, 3, 'iPhone 13 mini,starlight,256GB', '29,900'),
(79, 6, 1, 3, 'iPhone 13 mini,(PRODUCT)RED,256GB', '29,900'),
(80, 6, 8, 4, 'iPhone 13 mini,pink,512GB', '37,900'),
(81, 6, 7, 4, 'iPhone 13 mini,blue,512GB', '37,900'),
(82, 6, 14, 4, 'iPhone 13 mini,midnight,512GB', '37,900'),
(83, 6, 13, 4, 'iPhone 13 mini,starlight,512GB', '37,900'),
(84, 6, 1, 4, 'iPhone 13 mini,(PRODUCT)RED,512GB', '37,900'),
(85, 7, 9, 2, 'iPhone 13 Pro,sierra blue,128GB', '38,900'),
(86, 7, 10, 2, 'iPhone 13 Pro,money,128GB', '38,900'),
(87, 7, 11, 2, 'iPhone 13 Pro,gold,128GB', '38,900'),
(88, 7, 12, 2, 'iPhone 13 Pro,graphite,128GB', '38,900'),
(89, 7, 9, 3, 'iPhone 13 Pro,sierra blue,256GB', '42,900'),
(90, 7, 10, 3, 'iPhone 13 Pro,money,256GB', '42,900'),
(91, 7, 11, 3, 'iPhone 13 Pro,gold,256GB', '42,900'),
(92, 7, 12, 3, 'iPhone 13 Pro,graphite,256GB', '42,900'),
(93, 7, 9, 4, 'iPhone 13 Pro,sierra blue,512GB', '50,900'),
(94, 7, 10, 4, 'iPhone 13 Pro,money,512GB', '50,900'),
(95, 7, 11, 4, 'iPhone 13 Pro,gold,512GB', '50,900'),
(96, 7, 12, 4, 'iPhone 13 Pro,graphite,512GB', '50,900'),
(97, 7, 9, 5, 'iPhone 13 Pro,sierra blue,1 TB', '58,900'),
(98, 7, 10, 5, 'iPhone 13 Pro,money,1 TB', '58,900'),
(99, 7, 11, 5, 'iPhone 13 Pro,gold,1 TB', '58,900'),
(100, 7, 12, 5, 'iPhone 13 Pro,graphite,1 TB', '58,900'),
(101, 8, 9, 2, 'iPhone 13 Pro Max,sierra blue,128GB', '42,900'),
(102, 8, 10, 2, 'iPhone 13 Pro Max,money,128GB', '42,900'),
(103, 8, 11, 2, 'iPhone 13 Pro Max,gold,128GB', '42,900'),
(104, 8, 12, 2, 'iPhone 13 Pro Max,graphite,128GB', '42,900'),
(105, 8, 9, 3, 'iPhone 13 Pro Max,sierra blue,256GB', '46,900'),
(106, 8, 10, 3, 'iPhone 13 Pro Max,money,256GB', '46,900'),
(107, 8, 11, 3, 'iPhone 13 Pro Max,gold,256GB', '46,900'),
(108, 8, 12, 3, 'iPhone 13 Pro Max,graphite,256GB', '46,900'),
(109, 8, 9, 4, 'iPhone 13 Pro Max,sierra blue,512GB', '54,900'),
(110, 8, 10, 4, 'iPhone 13 Pro Max,money,512GB', '54,900'),
(111, 8, 11, 4, 'iPhone 13 Pro Max,gold,512GB', '54,900'),
(112, 8, 12, 4, 'iPhone 13 Pro Max,graphite,512GB', '54,900'),
(113, 8, 99, 5, 'iPhone 13 Pro Max,sierra blue,1 TB', '62,900'),
(114, 8, 10, 5, 'iPhone 13 Pro Max,money,1 TB', '62,900'),
(115, 8, 11, 5, 'iPhone 13 Pro Max,gold,1 TB', '62,900'),
(116, 8, 12, 5, 'iPhone 13 Pro Max,graphite,1 TB', '62,900'),
(124, 4, 8, 5, 'iPhone 12 mini,Pink,1TB ', '50,000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idaccount`,`idcustomer`),
  ADD KEY `account_FKIndex1` (`idcustomer`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`idcapacity`),
  ADD KEY `capacity_FKIndex1` (`idproduct`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`idcolor`),
  ADD KEY `color_FKIndex1` (`idproduct`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indexes for table `customer_has_product`
--
ALTER TABLE `customer_has_product`
  ADD PRIMARY KEY (`idcustomer`,`idproduct`),
  ADD KEY `customer_has_product_FKIndex1` (`idcustomer`),
  ADD KEY `customer_has_product_FKIndex2` (`idproduct`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`idmodel`),
  ADD KEY `model_FKIndex1` (`idproduct`);

--
-- Indexes for table `order1`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `order1_FKIndex1` (`idaccount`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `idaccount` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `idcapacity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `idcolor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `idmodel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order1`
--
ALTER TABLE `order1`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
