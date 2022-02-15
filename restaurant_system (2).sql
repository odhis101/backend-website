-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 08:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(42, 'Ira Kirby', 'zysab', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(43, 'Martha Bennett', 'qupem', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(44, 'Joshua', 'jo', 'e10adc3949ba59abbe56e057f20f883e'),
(45, 'Joshua', 'odhis101', '827ccb0eea8a706c4c34a16891f84e7b'),
(46, 'Guest', 'Guest', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(33, 'Breakfast', 'food_category528.jpg', 'yes', 'yes'),
(36, 'Lunch&Dinner', 'food_category902.jfif', 'yes', 'yes'),
(37, 'Beverages', 'food_category993.jpeg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(47, 'Perspiciatis enim d', 'Eum mollit ad dolore', '966.00', 'food-name234.jpg', 36, 'yes', 'yes'),
(48, 'Velit pariatur Repe', 'Consectetur non at ', '863.00', 'food-name836.jfif', 33, 'yes', 'yes'),
(49, 'Sint qui nostrud qui', 'Voluptatem omnis do', '447.00', 'food-name466.jpg', 36, 'yes', 'yes'),
(50, 'In eius accusamus co', 'Veritatis enim et ac', '302.00', 'food-name320.jpeg', 37, 'yes', 'yes'),
(51, 'Sit veniam tenetur', 'Vel laboris mollit l', '850.00', 'food-name657.jpg', 37, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_adress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_adress`) VALUES
(26, 'Autem', '759.00', 7, '5313.00', '2022-01-28 20:59:22', 'Delivered', 'joshua', '+1 (822) 787-8561', 'topag@mailinator.com', 'Inventore aut vero v'),
(27, 'Autem', '759.00', 7, '5313.00', '2022-01-28 21:00:14', 'Delivered', 'joshua', '+1 (822) 787-8561', 'topag@mailinator.com', 'Inventore aut vero v'),
(28, 'Pancake', '3000.00', 7, '21000.00', '2022-01-28 21:06:16', 'Delivered', 'joshua', '+1 (822) 787-8561', 'topag@mailinator.com', 'Inventore aut vero v'),
(29, 'Autem', '759.00', 7, '5313.00', '2022-01-28 21:07:10', 'Delivered', 'joshua', '+1 (822) 787-8561', 'topag@mailinator.com', 'Inventore aut vero v'),
(30, 'Pancake', '3000.00', 7, '21000.00', '2022-01-29 12:21:26', 'Delivered', 'joshua', '+1 (822) 787-8561', 'topag@mailinator.com', 'Inventore aut vero v'),
(31, 'Perspiciatis', '966.00', 4, '3864.00', '2022-01-31 23:49:04', 'Ordered', 'joshua', '+1 (822) 787-8561', 'topag@mailinator.com', 'Inventore aut vero v'),
(32, 'Velit', '863.00', 226, '195038.00', '2022-02-04 12:25:30', 'Ordered', 'Herman Campos', '+1 (344) 293-8057', 'tiloke@mailinator.com', 'Autem in velit nostr'),
(33, 'Sint', '447.00', 2, '894.00', '2022-02-04 12:58:42', 'Ordered', 'Prescott Roth', '+1 (397) 519-7195', 'meny@mailinator.com', 'In mollitia quam ut '),
(34, 'Sint', '447.00', 367, '164049.00', '2022-02-11 14:16:18', 'Ordered', 'Quail Wooten', '+1 (569) 608-4827', 'zymykison@mailinator.com', 'Est adipisci aut ani'),
(35, 'Sint', '447.00', 462, '206514.00', '2022-02-11 14:16:50', 'Ordered', 'Stacey Vaughan', '+1 (595) 252-9623', 'nanivu@mailinator.com', 'Consequatur ut laud'),
(36, 'Velit', '863.00', 523, '451349.00', '2022-02-14 12:01:44', 'Delivered', 'Phelan Mcleod', '+1 (148) 475-5964', 'moqoc@mailinator.com', 'Fuga Tempore nulla');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teller`
--

CREATE TABLE `tbl_teller` (
  `id` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teller`
--

INSERT INTO `tbl_teller` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Janna Simpson', 'xuxoker', 'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
(2, 'Joshua', 'odhis101', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teller`
--
ALTER TABLE `tbl_teller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_teller`
--
ALTER TABLE `tbl_teller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
