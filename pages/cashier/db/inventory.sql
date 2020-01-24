-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2017 at 05:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(10) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`cashier_id`, `cashier_name`, `position`, `username`, `password`) VALUES
(1, 'Rizaldy Loren', 'Cashier', 'noy', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`transaction_id`, `date`, `name`, `invoice`, `amount`, `remarks`, `balance`) VALUES
(1, '12/21/2016', 'RS-2327234', 'IN-37963726', '420', 'paid 12/21/2016', 0),
(2, '12/21/2016', 'RS-3382237', 'IN-668204', '120', 'paid 12/21/2016', 0),
(3, '12/21/2016', 'RS-8220282', 'IN-2223663', '360', 'paid 12/21/2016', 0),
(4, '12/21/2016', 'RS-3022', 'IN-3362750', '75', '', 30),
(5, '12/21/2016', 'RS-3022', 'IN-2333722', '30', 'paid 12/21/2016', 0),
(6, '01/06/2017', 'RS-86033', 'IN-22233332', '100', 'balance 60', 60),
(7, '01/06/2017', 'RS-203433', 'IN-02222322', '30', 'balance 30', 30),
(8, '01/07/2017', 'RS-000733', 'IN-300223', '30', 'balance 30', 30),
(10, '01/07/2017', 'RS-203433', 'IN-3492920', '30', 'paid ', 0),
(11, '01/07/2017', 'RS-000733', 'IN-230234', '30', 'paid', 0),
(12, '01/07/2017', 'RS-86033', 'IN-323302', '60', 'paid', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`) VALUES
(1, 'Carl Francis Villanueva', 'Bacolod City', '495 4382', '00001'),
(2, 'Renzy Ivan Loren', 'Silay City', '712 0632', '00002'),
(3, 'Rica Gelera', 'Victorias City', '495 3697', '00003'),
(4, 'Lourdelyn Bibas', 'Talisay City', '714 2355', '00004'),
(5, 'Donard Ytienza', 'Bacolod City', '712 5596', '00005'),
(6, 'Ronnel De La Torre', 'Bacolod City', 'None', '00006'),
(7, 'Rizaldy Loren', 'Silay City', '412 5275', '00007'),
(8, 'Crislou Malinao', 'Silay City', '1231231231', '00008');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `cost`, `price`, `supplier`, `qty`, `category`) VALUES
(1, '001', 'Dove', '50', '60', 'Unilever', 98, 'Bath Soap'),
(2, '002', 'Lm (Pancit Canton Extra Hot)', '10', '12', 'Consuelo', 80, 'Noodles'),
(3, '003', 'Lm (Pancit Canton Chilimansi)', '10', '12', 'Consuelo', 70, 'Noodles'),
(4, '004', 'Century Tuna (adobo)', '30', '32', 'Consuelo', 60, 'canned goods'),
(5, '005', 'Head and Shoulder (500ml)', '75', '85', 'Unilever', 95, 'Shampoo');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`transaction_id`, `invoice_number`, `date`, `suplier`, `remarks`) VALUES
(1, '001', '2016-12-17', 'Consuelo', '12/20/2016'),
(3, '002', '2016-12-21', 'Unilever', '12/22/2016');

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE `purchases_item` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases_item`
--

INSERT INTO `purchases_item` (`id`, `name`, `qty`, `cost`, `invoice`) VALUES
(1, '002', 55, '660', '001'),
(3, '001', 100, '6000', '002');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL,
  `cash` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `due_date`, `name`, `balance`, `cash`) VALUES
(21, 'RS-0203323', 'Renzy', '01/06/2017', 'cash', '60', '', 'Rizaldy Loren', '', '60'),
(22, 'RS-86033', 'Renzy', '01/07/2017', 'credit', '160', '01/07/2017', 'Donard Ytienza', '0', ''),
(23, 'RS-203433', 'Renzy', '01/06/2017', 'credit', '60', '01/08/2017', 'Rica Gelera', '0', ''),
(24, 'RS-202729', 'Renzy', '01/06/2017', 'cash', '36', '', 'Lourdelyn Bibas', '', '40'),
(25, 'RS-000733', 'Renzy', '01/07/2017', 'credit', '60', '01/07/2017', 'Crislou Malinao', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `name`, `price`, `discount`, `category`) VALUES
(1, 'RS-3323240', '001', '10', '100', 'Dove', '13', '3', 'Bath Soap'),
(2, 'RS-0228233', '001', '10', '120', 'Dove', '13', '1', 'Bath Soap'),
(3, 'RS-26202092', '002', '10', '120', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(4, 'RS-26202092', '001', '5', '300', 'Dove', '60', '0', 'Bath Soap'),
(5, 'RS-8220282', '001', '5', '300', 'Dove', '60', '0', 'Bath Soap'),
(6, 'RS-8220282', '002', '5', '60', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(7, 'RS-2327234', '002', '10', '120', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(8, 'RS-2327234', '001', '5', '300', 'Dove', '60', '0', 'Bath Soap'),
(9, 'RS-323903', '002', '10', '120', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(10, 'RS-323903', '001', '3', '180', 'Dove', '60', '0', 'Bath Soap'),
(11, 'RS-0223332', '002', '10', '120', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(12, 'RS-3382237', '002', '10', '120', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(13, 'RS-23402', '001', '55', '3300', 'Dove', '60', '0', 'Bath Soap'),
(14, 'RS-340308', '003', '10', '120', 'Lm (Pancit Canton Chilimansi)', '12', '0', 'Noodles'),
(16, 'RS-2222332', '003', '5', '60', 'Lm (Pancit Canton Chilimansi)', '12', '0', 'Noodles'),
(19, 'RS-022355', '002', '1', '12', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(20, 'RS-3022', '003', '15', '105', 'Lm (Pancit Canton Chilimansi)', '12', '5', 'Noodles'),
(21, 'RS-22002549', '004', '10', '320', 'Century Tuna (adobo)', '32', '0', 'canned goods'),
(22, 'RS-22002549', '001', '5', '300', 'Dove', '60', '0', 'Bath Soap'),
(23, 'RS-22002', '004', '10', '320', 'Century Tuna (adobo)', '32', '0', 'canned goods'),
(24, 'RS-22002', '002', '5', '60', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(25, 'RS-2062523', '004', '10', '320', 'Century Tuna (adobo)', '32', '0', 'canned goods'),
(26, 'RS-3602332', '001', '20', '1200', 'Dove', '60', '0', 'Bath Soap'),
(28, 'RS-5362723', '002', '1', '12', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(29, 'RS-5362723', '001', '1', '60', 'Dove', '60', '0', 'Bath Soap'),
(30, 'RS-33033303', '005', '5', '425', 'Head and Shoulder (500ml)', '85', '0', 'Shampoo'),
(31, 'RS-843330', '001', '1', '60', 'Dove', '60', '0', 'Bath Soap'),
(32, 'RS-0730732', '002', '5', '60', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(33, 'RS-039225', '004', '5', '160', 'Century Tuna (adobo)', '32', '0', 'canned goods'),
(34, 'RS-0203323', '001', '1', '60', 'Dove', '60', '0', 'Bath Soap'),
(35, 'RS-86033', '004', '5', '160', 'Century Tuna (adobo)', '32', '0', 'canned goods'),
(36, 'RS-203433', '002', '5', '60', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(37, 'RS-202729', '002', '3', '36', 'Lm (Pancit Canton Extra Hot)', '12', '0', 'Noodles'),
(38, 'RS-000733', '001', '1', '60', 'Dove', '60', '0', 'Bath Soap');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`) VALUES
(1, 'Unilever', 'Bacolod City', '441 3251', 'dina'),
(2, 'Consuelo', 'Talisay City', '441 3896', 'rey');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `position`) VALUES
(1, 'admin', 'admin', 'Renzy', 'admin'),
(2, 'carl', 'carl', 'Carl', 'cashier'),
(3, 'moi', '12345', 'rendylle loren', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
