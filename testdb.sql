-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2019 at 10:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(12) NOT NULL,
  `userid` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address1` varchar(40) NOT NULL,
  `address2` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `userid`, `name`, `address1`, `address2`, `city`, `state`, `pincode`, `mobile`) VALUES
(8, 30, 'Anoop P', 'Mubarak House', 'Adakaputhur', 'Palakkad', 'kerala', '679521', '9746364612'),
(9, 31, 'Aiswarya', 'Panthalil House', 'Manisseri Post', 'Palakkad', 'kerala', '679521', '9746364612'),
(10, 31, 'Aiswarya Anoop', 'Panthalil House', 'Manisseri Post', 'Palakkad', 'kerala', '679521', '9746364612'),
(11, 30, 'Muhammad Mubarak K', 'Koorikkattil house', 'Veeramangalam post', 'Palakkad', 'Kerala', '679503', '9567474709'),
(13, 32, 'Sadeeq Muhammad', 'Kwakwachi Kofar Arewa, Gwarzo LGA', ' ', 'kano', 'kano state', '704101', '8101749564'),
(14, 32, 'Sadeeq Muhammad', '213 Hausa Quater, Warri Sapele Road', 'wwwwww', 'Warri', 'Delta', '332231', '8101749564'),
(15, 32, 'Sadeeq Muhammad', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'wwww', 'kano', 'kano state', '704101', '8101749564');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(8) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(2) NOT NULL DEFAULT 1,
  `mtotal` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `quantity`, `mtotal`) VALUES
(8, 31, 1, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`, `description`) VALUES
(1, 'Tablets', 'Image result for tablets drugs description\r\nTablets may be defined as the solid unit dosage form of medicament or medicaments with suitable excipients and prepared either by molding or by compression.'),
(2, 'Capsule', 'Capsules are easier to swallow and are used by manufacturers when the drug cannot be compacted into a solid tablet.'),
(3, 'Injection', 'Injection Drug Use. A method of illicit drug use. The drugs are injected directly into the body—into a vein, into a muscle, or under the skin—with a needle and syringe.'),
(4, 'Inhealer', 'An inhaler (also known as a puffer, pump or allergy spray) is a medical device used for delivering medication into the body via the lungs.'),
(16, 'Syrup', 'Medical Definition of syrup\r\n: a thick sticky liquid consisting of a concentrated solution of sugar and water with or without the addition of a flavoring agent or medicinal substance syrup of codeine.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(12) NOT NULL,
  `userid` int(8) NOT NULL,
  `items` text NOT NULL,
  `addressid` int(12) NOT NULL,
  `total` int(6) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `items`, `addressid`, `total`, `status`) VALUES
(4, 30, ' 1x Med 4(4)-Rs.400  2x Med 6(6)-Rs.100  ', 8, 600, 0),
(5, 32, ' 3x Med 1(1)-Rs.100  1x Med 2(2)-Rs.200  1x Med 3(3)-Rs.300  1x Med 6(6)-Rs.100  ', 13, 900, 0),
(6, 32, ' 1x Med 1(1)-Rs.100  1x Med 2(2)-Rs.200  1x Med 3(3)-Rs.300  ', 13, 600, 0),
(15, 32, ' 1x Med 2(2)-Rs.200  ', 13, 200, 0),
(16, 32, ' 1x Med 2(2)-Rs.200  ', 13, 200, 0),
(17, 32, ' 1x Med 3(3)-Rs.300  ', 13, 300, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL,
  `scount` int(11) NOT NULL DEFAULT 0,
  `ocount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cname`, `description`, `price`, `image`, `scount`, `ocount`) VALUES
(1, 'Med 1', 'Tablets', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 100, 'uploads/Category1/59628a8cc04a37.23226975.jpg', 0, 0),
(2, 'Med 2', 'Tablets', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 200, 'uploads/Category1/59628aa05c8614.65609891.jp', 0, 0),
(3, 'Med 3', 'Tablets', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category1/59628aba081943.66317496.jpg', 0, 0),
(4, 'Med 4', 'Tablets', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 400, 'uploads/Category1/59628ad076b467.23989870.jpg', 0, 0),
(5, 'Med 5', 'Tablets', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 500, 'uploads/Category1/59628aee114f62.74718230.jpg', 0, 0),
(6, 'Med 6', 'Capsule', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 100, 'uploads/Category1/59628afc7caab2.02893779.jpg', 0, 0),
(7, 'Med 7', 'Capsule', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 200, 'uploads/Category1/59628b17ad5b09.54611184.jpg', 0, 0),
(8, 'Med 8', 'Capsule', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category1/59628b36e1c095.75840941.jpg', 0, 0),
(9, 'Med 9', 'Capsule', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 200, 'uploads/Category1/59628b48a0dfe5.97079706.jpg', 0, 0),
(10, 'Med 10', 'Capsule', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category1/59628b6ae54f83.80321098.jpg', 0, 0),
(11, 'Med 11', 'Inhealer', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category1/59628b831a2b67.05737334.jpg', 0, 0),
(12, 'Med 12', 'Inhealer', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 800, 'uploads/Category1/59628b9fdb5ab3.70192761.jpg', 0, 0),
(13, 'Med 13', 'Inhealer', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 600, 'uploads/Category1/59628bb1bda595.33546451.jpg', 0, 0),
(14, 'Med 14', 'Inhealer', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 800, 'uploads/Category1/59628bc7b16f28.50210713.jp', 0, 0),
(15, 'Med 15', 'Inhealer', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category2/59628bec467fb9.14652317.jpg', 0, 0),
(16, 'Med 16', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 500, 'uploads/Category2/59628bfa082825.75591196.jpg', 0, 0),
(17, 'Med 17', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category2/59628c119b6523.71407466.jpg', 0, 0),
(18, 'Med 18', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 400, 'uploads/Category2/59628c35ca1584.16506727.jp', 0, 0),
(19, 'Med 19', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 700, 'uploads/Category2/59628c4a307ef7.97713460.jpg', 0, 0),
(20, 'Med 20', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 600, 'uploads/Category2/59628c60313f83.91803422.jpg', 0, 0),
(21, 'Med 21', 'Syrup', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 600, 'uploads/Category2/59628c7086a814.02343278.jpg', 0, 0),
(22, 'Med 22', 'Syrup', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 500, 'uploads/Category2/59628c86b946c4.07621259.jpg', 0, 0),
(23, 'Med 23', 'Syrup', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 900, 'uploads/Category2/59628c9522a992.62176354.jpg', 0, 0),
(24, 'Med 24', 'Syrup', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category2/59628ca4b78736.51126033.jpg', 0, 0),
(25, 'Med 25', 'Syrup', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 300, 'uploads/Category2/59628cb5a5dc90.76310735.jpg', 0, 0),
(26, 'Med 26', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 600, 'uploads/Category2/59628cce7b3980.26615939.jp', 0, 0),
(27, 'Med 27', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 200, 'uploads/Category2/59628e5bbd70b6.61047456.jpg', 0, 0),
(29, 'Med 28', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 200, 'uploads/Category2/59628e9b5ad761.05683629.jp', 0, 0),
(30, 'Med 29', 'Injection', 'This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,This is a text for testing my site,', 200, 'uploads/Category2/59628eac13b914.61404939.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(30, 'Anoop P', 'mubarak@gmail.com', 'c93ccd78b2076528346216b3b2f701e6'),
(31, 'Aiswarya', 'ashi@gmail.com', 'c93ccd78b2076528346216b3b2f701e6'),
(32, 'Sadeeq Muhammad', 'sadeeq@gmail.com', 'b4af804009cb036a4ccdc33431ef9ac9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userproduct` (`userid`,`productid`),
  ADD KEY `userid` (`userid`,`productid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`,`addressid`),
  ADD KEY `adressid` (`addressid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cname` (`cname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `email_3` (`email`),
  ADD KEY `email_4` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`addressid`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cname`) REFERENCES `category` (`cname`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
