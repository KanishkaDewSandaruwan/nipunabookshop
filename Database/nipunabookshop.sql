-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 09:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nipunabookshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `author_name`, `email`, `phone`) VALUES
(6, 'Martin Wickramasingha', 'marting@gmail.com', 743664071);

-- --------------------------------------------------------

--
-- Table structure for table `bookorder`
--

CREATE TABLE `bookorder` (
  `order_id` int(11) NOT NULL,
  `book_ids` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `accept` varchar(255) NOT NULL,
  `shipped` varchar(100) NOT NULL,
  `deliver` varchar(100) NOT NULL,
  `paid` varchar(100) NOT NULL,
  `trn_date` datetime NOT NULL,
  `customer_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookorder`
--

INSERT INTO `bookorder` (`order_id`, `book_ids`, `amount`, `payment_type`, `address`, `accept`, `shipped`, `deliver`, `paid`, `trn_date`, `customer_id`) VALUES
(2, '15,16', 740, 'COD', 'Banwalgodalla, Kosmulla', 'Accepted', 'Shipped', 'Diliverd', 'Paid', '2021-04-01 04:11:52', '2'),
(3, '15', 390, 'COD', 'Banwalgodalla, Kosmulla', 'Accepted', 'Shipped', 'Diliverd', 'Paid', '2021-04-01 04:19:06', '2'),
(4, '15,16', 740, 'COD', 'Banwalgodalla, Kosmulla', 'Accepted', 'Shipped', 'Diliverd', 'Pending', '2021-04-01 04:19:52', '2'),
(5, '15,17,18', 1090, 'COD', 'Banwalgodalla, Kosmulla', 'Accepted', 'Shipped', 'Diliverd', 'Paid', '2021-04-01 04:20:08', '2'),
(6, '15,20,21', 1090, 'COD', 'Banwalgodalla, Kosmulla', 'Pending', 'Pending', 'Pending', 'Pending', '2021-04-01 04:20:24', '2');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_price` int(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `author_id` int(255) NOT NULL,
  `cat_id` int(255) NOT NULL,
  `qnt` int(255) NOT NULL,
  `trn_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `spc_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_price`, `description`, `author_id`, `cat_id`, `qnt`, `trn_date`, `image`, `spc_price`) VALUES
(15, 'Madol Duwa', 250, 'covod have', 6, 8, 10, '2021-03-31', '220px-MadolDoova.jpg', 350);

-- --------------------------------------------------------

--
-- Table structure for table `books_backup`
--

CREATE TABLE `books_backup` (
  `back_id` int(11) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `book_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_backup`
--

INSERT INTO `books_backup` (`back_id`, `book_title`, `description`, `image`, `book_id`) VALUES
(1, 'Logitec Keyboard', 'Order your foods', 'bg3.jpg', '18'),
(2, 'White Catchers Gift Wall decor', 'covod have', 'bg2.jpg', '17'),
(3, 'Handmade Dream  Catchers  for vehicle', 'covod have', 'bg2.jpg', '19'),
(4, 'White Catchers Gift Wall decor', 'covod have', 'bg2.jpg', '20'),
(5, 'Handmade Dream  Catchers  medium Gift Wall deco ', 'Order your foods', 'bg2.jpg', '21'),
(7, 'Handmade Dream  Catchers  medium Gift Wall deco ', 'covod have', 'bg2.jpg', '22'),
(8, 'White Catchers Gift Wall decor', 'covod have', 'bg2.jpg', '23'),
(9, 'White Catchers Gift Wall decor', 'covod have', 'bg2.jpg', '24');

-- --------------------------------------------------------

--
-- Table structure for table `book_cat`
--

CREATE TABLE `book_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_cat`
--

INSERT INTO `book_cat` (`cat_id`, `cat_name`, `cat_image`) VALUES
(8, 'Navals', '38904779_1983560601707699_6189612872188821504_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `book_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nic` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `email`, `address`, `password`, `nic`) VALUES
(2, 'Kanishka Dew Sandaruwan', 713664071, 'Kanishkadewsandaruwan1@gmail.com', 'Banwalgodalla, Kosmulla', 'e10adc3949ba59abbe56e057f20f883e', '962670423V');

-- --------------------------------------------------------

--
-- Table structure for table `customer_backup`
--

CREATE TABLE `customer_backup` (
  `backup_id` int(11) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_backup`
--

INSERT INTO `customer_backup` (`backup_id`, `customer_id`, `name`, `phone`, `email`, `trn_date`) VALUES
(3, '3', 'Kanishka Dew Sandaruwan', '713664072', 'kanishkadewsandaruwan@gmail.com', '2020-12-24 12:18:02'),
(4, '8', 'Kanishka Sandaruwan', '713664071', 'kaniya@gmail.com', '2020-12-27 12:09:52'),
(5, '1', ' ', '713664071', 'kanishkadewsandaruwan@gmail.com', '2021-04-01 04:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `editor_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`editor_id`, `full_name`, `address`, `phone_number`, `email`, `gender`, `password`, `username`) VALUES
(5, '', '', 0, '', '', 'e10adc3949ba59abbe56e057f20f883e', 'admin'),
(6, 'Kanishka', 'Banwalgodalla, Kosmulla, Neluwa', 743664071, 'kanishkadewsandaruwan1@gmail.com', 'Male', '827ccb0eea8a706c4c34a16891f84e7b', 'dew');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `oder_date` date NOT NULL,
  `state` int(100) NOT NULL,
  `sum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slider_banner`
--

CREATE TABLE `slider_banner` (
  `slider_banner_id` int(11) NOT NULL,
  `slider_banner_01` varchar(255) NOT NULL,
  `slider_banner_02` varchar(255) NOT NULL,
  `slider_banner_03` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_banner`
--

INSERT INTO `slider_banner` (`slider_banner_id`, `slider_banner_01`, `slider_banner_02`, `slider_banner_03`, `title`, `description`) VALUES
(22, 'bg1.jpg', 'bg2.jpg', 'bg3.jpg', 'Welcome! Nipuna Bookshop', 'Hello');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `bookorder`
--
ALTER TABLE `bookorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_backup`
--
ALTER TABLE `books_backup`
  ADD PRIMARY KEY (`back_id`);

--
-- Indexes for table `book_cat`
--
ALTER TABLE `book_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_backup`
--
ALTER TABLE `customer_backup`
  ADD PRIMARY KEY (`backup_id`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`editor_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `slider_banner`
--
ALTER TABLE `slider_banner`
  ADD PRIMARY KEY (`slider_banner_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookorder`
--
ALTER TABLE `bookorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `books_backup`
--
ALTER TABLE `books_backup`
  MODIFY `back_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_cat`
--
ALTER TABLE `book_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_backup`
--
ALTER TABLE `customer_backup`
  MODIFY `backup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `editor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_banner`
--
ALTER TABLE `slider_banner`
  MODIFY `slider_banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
