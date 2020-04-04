-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 11:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newflashybuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`) VALUES
(1, 'Fair&Lovely', 'Fair&Lovely'),
(2, 'Samsung', 'Samsung'),
(3, 'Motorola', 'Motorola'),
(4, 'Nikkon', 'Nikkon');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `featured` varchar(11) NOT NULL DEFAULT 'N',
  `top` varchar(11) NOT NULL DEFAULT 'N',
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `banner`, `icon`, `slug`, `featured`, `top`, `meta_title`, `meta_description`) VALUES
(6, 'Men\'s Appearel', '', '', 'Men\'s-Appearel', 'N', 'N', 'Men\'s Appearel', 'Men\'s Appearel'),
(8, 'Home and garden', '', '', 'Home-and-garden', 'N', 'N', 'Home-and-garden', 'Men\'s Appearel'),
(9, 'Women Appearel\'s', '', '', 'Women-Appearel\'s', 'N', 'N', 'Women Appearel\'s', 'Women Appearel\'s'),
(10, 'Health & Personal Care', '', '', 'Health-&-Personal-Care', 'N', 'N', 'Health - Personal Care', 'Health & Personal Care\r\n\r\nHealth & Personal Care\r\n\r\nHealth & Personal Care\r\n\r\nHealth & Personal Care\r\n\r\nHealth & Personal Care\r\n\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealt'),
(11, 'Health & Personal Care', '', '', 'Health-&-Personal-Care', 'N', 'N', 'Health - Personal Care', 'Health & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Personal Care\r\nHealth & Person'),
(13, 'Hamza', '', '', 'Hamza', 'N', 'N', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaa'),
(14, 'Mubeen S', '', '', 'Mubeen-S', 'N', 'N', 'vvvvvvvvvvvvvvvvvvvv', 'ffffffffffffffffffff');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `sub_sub_cat_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `sku` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `ven_id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `selling_price` int(11) DEFAULT NULL,
  `market_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `courier_size` varchar(255) DEFAULT NULL,
  `exclusive` varchar(255) NOT NULL DEFAULT 'N',
  `approved` varchar(255) NOT NULL DEFAULT 'N',
  `active` varchar(255) DEFAULT 'N',
  `disable` varchar(255) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `cat_id`, `sub_cat_id`, `sub_sub_cat_id`, `description`, `sku`, `image1`, `image2`, `image3`, `image4`, `ven_id`, `brand`, `selling_price`, `market_price`, `quantity`, `width`, `height`, `length`, `courier_size`, `exclusive`, `approved`, `active`, `disable`) VALUES
(33, 'Facial Set', 6, 1, 2, 'dddddddddddddddddddd', 'Facial-Set', '', '', '', '', 0, '1', 0, 0, 0, '45', '90', '45', NULL, 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `product_id` int(11) NOT NULL,
  `first_variation_name` varchar(255) DEFAULT NULL,
  `first_variation_value` varchar(255) DEFAULT NULL,
  `second_variation_name` varchar(255) DEFAULT NULL,
  `second_variation_value` varchar(255) DEFAULT NULL,
  `second_variation_img` varchar(255) DEFAULT NULL,
  `first_variation_img` varchar(255) DEFAULT NULL,
  `third_variation_name` varchar(255) DEFAULT NULL,
  `third_variation_value` varchar(255) DEFAULT NULL,
  `third_variation_img` varchar(255) DEFAULT NULL,
  `mk_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT 'Y',
  `disable` varchar(255) NOT NULL DEFAULT 'N',
  `comments` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`product_id`, `first_variation_name`, `first_variation_value`, `second_variation_name`, `second_variation_value`, `second_variation_img`, `first_variation_img`, `third_variation_name`, `third_variation_value`, `third_variation_img`, `mk_price`, `price`, `quantity`, `active`, `disable`, `comments`) VALUES
(33, 'color', 'Black', 'size', 'small', NULL, NULL, NULL, NULL, NULL, 420, 460, 23, 'Y', 'N', NULL),
(33, 'color', 'red', 'size', 'Small', NULL, NULL, NULL, NULL, NULL, 400, 440, 34, 'Y', 'N', NULL),
(33, 'color', 'Red', 'size', 'Large', NULL, NULL, NULL, NULL, NULL, 400, 460, 20, 'Y', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `name`, `category_id`, `slug`, `meta_title`, `meta_description`) VALUES
(1, 'Skin Care Masks', 6, 'Skin-Care-Masks', 'Skin Care', 'Skin care Products'),
(6, 'Mubeen Sardar', 8, 'Mubeen-Sardar', 'Men\'s Appearel', 'vbnm'),
(7, 'under garments men', 6, 'Skin-Care-Masks', 'Skin Care', 'Skin care Products');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `sub_sub_cat` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`sub_sub_cat`, `name`, `sub_category_id`, `slug`, `variation_id`, `meta_title`, `meta_description`) VALUES
(2, 'Creams', 1, 'Creams', 4, 'sad', 'sadsadsad'),
(3, 'Tibet', 6, 'Tibet', 7, 'Demo Seller Shop', 'dsssssssssssssss'),
(4, 'face washes', 1, 'face-washes', 4, 'sad', 'sadsadsad');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(11) NOT NULL,
  `variation_name` varchar(255) NOT NULL,
  `image_approval` varchar(255) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `variation_name`, `image_approval`) VALUES
(4, 'Colors', 'N'),
(7, 'Size', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product`
--

CREATE TABLE `vendor_product` (
  `id` int(11) NOT NULL,
  `ven_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `mk_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`sub_sub_cat`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_product`
--
ALTER TABLE `vendor_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `sub_sub_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor_product`
--
ALTER TABLE `vendor_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
