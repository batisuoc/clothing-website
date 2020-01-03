-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 30, 2019 at 04:04 AM
-- Server version: 8.0.18
-- PHP Version: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` char(20) NOT NULL,
  `pass` char(156) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `pass`) VALUES
('admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `customer_name` varchar(256) NOT NULL,
  `phone` char(10) NOT NULL,
  `customer_address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goods_received_bill`
--

CREATE TABLE `goods_received_bill` (
  `bill_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `bill_status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_status` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_pic` varchar(256) DEFAULT NULL,
  `product_description` text,
  `product_calc_unit` char(10) DEFAULT NULL,
  `product_prize` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_pic`, `product_description`, `product_calc_unit`, `product_prize`, `product_amount`) VALUES
(1, 'Áo tay dài', 1, 'images/product/02ef26d447bdbee3e7ac.jpg', '- Đây là một chiếc áo tay dài.\r\n- Có đủ loại màu và size các kiểu.', 'Chiếc', 300000, 12),
(2, 'Quần dài', 2, 'images/product/5fa5fca7e1ce189041df.jpg', '- Đây là chiếc quần dài.\r\n- Có nhiều màu sắc và kích thước khác nhau.', 'Chiếc', 500000, 23),
(3, 'Đầm dài', 3, 'images/product/90c5e310f07909275068.jpg', '- Đây là chiếc quần dài.\r\n- Có nhiều kích cỡ khác nhau.', 'Chiếc', 100000, 10),
(4, 'Áo đầm dài', 3, 'images/product/874a9688a2e15bbf02f0.jpg', '- Đây là chiếc đầm dài.\r\n- Có phần áo ở trên.\r\n- Có nhiều kích cỡ khác nhau.', 'Chiếc', 100000, 10),
(5, 'Áo tay dài có hoa văn', 1, 'images/product/68ef4fdd2eb4d7ea8ea5.jpg', '- Đây là chiếc áo tay dài.\r\n- Có hoa văn sặc sỡ.\r\n- Có nhiều kích cỡ khác nhau.', 'Chiếc', 55000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`product_id`, `size_id`) VALUES
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 3),
(3, 4),
(3, 5),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `prod_type_id` int(11) NOT NULL,
  `prod_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`prod_type_id`, `prod_name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Váy / Đầm');

-- --------------------------------------------------------

--
-- Table structure for table `received_bill_details`
--

CREATE TABLE `received_bill_details` (
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(3, 'L'),
(2, 'M'),
(1, 'S'),
(4, 'XL'),
(5, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `staff_name` varchar(256) NOT NULL,
  `day_of_birth` date NOT NULL,
  `staff_address` text,
  `phone` char(10) NOT NULL,
  `started_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_action`
--

CREATE TABLE `staff_action` (
  `action_id` int(11) NOT NULL,
  `action_name` text NOT NULL,
  `action_code` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff_action`
--

INSERT INTO `staff_action` (`action_id`, `action_name`, `action_code`) VALUES
(1, 'Create Account', 'CREATE_ACC'),
(2, 'Edit Account', 'EDIT_ACC'),
(3, 'Delete Account', 'DEL_ACC'),
(4, 'Edit role', 'EDIT_ROLE'),
(5, 'Delete role', 'DEL_ROLE'),
(6, 'Create product', 'CREATE_PROD'),
(7, 'Edit product', 'EDIT_PROD'),
(8, 'Delete Product', 'DEL_PROD'),
(9, 'Print Bill', 'PRINT_BILL'),
(10, 'Create good received bill Management', 'CREATE_GRB'),
(11, 'Edit good received bill Management', 'EDIT_GRB'),
(12, 'Delete good received bill Management', 'DEL_GRB');

-- --------------------------------------------------------

--
-- Table structure for table `staff_role`
--

CREATE TABLE `staff_role` (
  `role_id` int(11) NOT NULL,
  `role_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff_role`
--

INSERT INTO `staff_role` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `staff_role_action`
--

CREATE TABLE `staff_role_action` (
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff_role_action`
--

INSERT INTO `staff_role_action` (`role_id`, `action_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_customer_acc` (`username`);

--
-- Indexes for table `goods_received_bill`
--
ALTER TABLE `goods_received_bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `fk_grb_staff` (`staff_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `fk_invoice_customer` (`customer_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`invoice_id`,`product_id`),
  ADD KEY `fk_invdetail_product` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `fk_product_type` (`product_type`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD KEY `fk_ps_prod` (`product_id`),
  ADD KEY `fk_ps_size` (`size_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`prod_type_id`);

--
-- Indexes for table `received_bill_details`
--
ALTER TABLE `received_bill_details`
  ADD PRIMARY KEY (`bill_id`,`product_id`),
  ADD KEY `fk_rbd_product` (`product_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`),
  ADD UNIQUE KEY `size_name` (`size_name`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `fk_staff_acc` (`username`),
  ADD KEY `fk_staff_role` (`role_id`);

--
-- Indexes for table `staff_action`
--
ALTER TABLE `staff_action`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `staff_role`
--
ALTER TABLE `staff_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staff_role_action`
--
ALTER TABLE `staff_role_action`
  ADD PRIMARY KEY (`role_id`,`action_id`),
  ADD KEY `fk_ra_action` (`action_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goods_received_bill`
--
ALTER TABLE `goods_received_bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `prod_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_action`
--
ALTER TABLE `staff_action`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `staff_role`
--
ALTER TABLE `staff_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_acc` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `goods_received_bill`
--
ALTER TABLE `goods_received_bill`
  ADD CONSTRAINT `fk_grb_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `fk_invdetail_invoice` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `fk_invdetail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_type` FOREIGN KEY (`product_type`) REFERENCES `product_type` (`prod_type_id`);

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `fk_ps_prod` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `fk_ps_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`);

--
-- Constraints for table `received_bill_details`
--
ALTER TABLE `received_bill_details`
  ADD CONSTRAINT `fk_rbd_bill` FOREIGN KEY (`bill_id`) REFERENCES `goods_received_bill` (`bill_id`),
  ADD CONSTRAINT `fk_rbd_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_acc` FOREIGN KEY (`username`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `fk_staff_role` FOREIGN KEY (`role_id`) REFERENCES `staff_role` (`role_id`);

--
-- Constraints for table `staff_role_action`
--
ALTER TABLE `staff_role_action`
  ADD CONSTRAINT `fk_ra_action` FOREIGN KEY (`action_id`) REFERENCES `staff_action` (`action_id`),
  ADD CONSTRAINT `fk_ra_role` FOREIGN KEY (`role_id`) REFERENCES `staff_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
