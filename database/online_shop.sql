-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2015 at 10:10 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.21-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `vendor`) VALUES
(1, 'Acer'),
(2, 'Apple\r\n'),
(3, 'Asus'),
(4, 'Dell'),
(5, 'Hp'),
(6, 'Lenovo'),
(7, 'Samsung'),
(8, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_cus` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `first_name`, `last_name`, `password`, `level`) VALUES
(1, 'pendi', 'pendi', 'setiawan', '5f4dcc3b5aa765d61d8327deb882cf99', 'super admin'),
(2, 'admin', 'admin', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_order` varchar(20) NOT NULL,
  `id_cus` varchar(20) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_order_temp` varchar(50) NOT NULL,
  `id_product` varchar(20) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_order_temp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `stock` int(3) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `type`, `price`, `description`, `stock`, `image`, `category_id`, `status`) VALUES
('ACFAF001', 'Acer Aspire', 'E5-411-C02F-DOS-White', 3896000, 'Intel Dual Core Processor N2830 2.16 GHz, Intel HD Graphics, 14" resolution up to 1366 x 768, 2GB RAM, 320GB HDD, USB 3.0, DOS.', 5, '../image/product/acer-aspire-e5-411-c02f-dos-white-233.png', 1, 2),
('ACFAF002', 'Acer Aspire', 'E5-411-C2S2-DOS-Black', 3752500, 'Intel Dual Core Processor N2830 2.16 GHz, Intel HD Graphics, 14" resolution up to 1366 x 768, 2GB RAM, 320GB HDD, USB 3.0, DOS.', 1, '../image/product/acer-aspire-e5-411-c2s2-dos-black-5.png', 1, 2),
('ASCBA001', 'Asus', 'A450CA- WX106D WX107D WX219D i3-3217U-DOS-Gray', 4869900, 'Intel Core i3-3217U, VGA Intel HD Graphics 3000, 14" Resolution up to 1366 x 768, 2GB DDR3, 500GB HDD, DVD RW, WiFi, Camera, DOS.', 2, '../image/product/asus-a450ca-wx107d-wx219d-i3-3217u-or-2gb-or-500gb-dos-gray-1.png', 3, 2),
('ASCBA002', 'Asus', 'X200CA-KX184D KX185D KX186D KX187D DOS - Blue', 3220000, 'Intel Celeron 1007U 1.50 GHz, Intel HD Graphics, 11.6" resolution up to 1366 x 768, 2GB RAM 1600MHz, 500GB HDD, WiFi, DOS.', 3, '../image/product/asus-x200ca-kx184d-kx185d-kx186d-kx187d-dos-blue-1.png', 3, 1),
('DEABD001', 'Dell', 'Inspiron 14 3421-1017U DOS - Black', 3190000, 'Intel 1017U 1.6GHz, Intel HD 4000 Graphics, 14" resolution up to 1366 x 768, 2GB RAM, 500GB HDD, USB 3.0, DOS.', 2, '../image/product/dell-inspiron-14-3421-1017u-dos-black-1.png', 4, 1),
('HPCCE001', 'HP Compaq', '14-d010AU E1-2100-DOS-Black', 3407300, 'AMD Dual Core E1-2100, AMD Radeon HD 8210G (Shared), 14" Resolution up to 1366x768px, 2GB DDR3, 320GB HDD, DVD±RW, NIC, WiFi, Non OS.', 1, '../image/product/hp-14-d010au-e1-2100-or-2gb-or-320gb-dos-black-1.png', 5, 2),
('SABEC001', 'Samsung', 'NP275E4V-K02ID K03ID K04ID-Black', 4136400, 'AMD Dual-Core E1-1500 Processor (1.48GHz, Cache 1MB) , AMD Radeon™ HD 7310 VGA, 14" Resolution up to 1366 x 768, 2GB DDR3 RAM, 500GB HDD, WiFi, Bluetooth, Camera, DOS.', 3, '../image/product/samsung.png', 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` varchar(20) NOT NULL,
  `id_product` varchar(100) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
