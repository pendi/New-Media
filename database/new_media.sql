-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2014 at 03:52 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_media`
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
-- Table structure for table `coba`
--

CREATE TABLE IF NOT EXISTS `coba` (
  `id_tamu` varchar(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `pesan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coba`
--

INSERT INTO `coba` (`id_tamu`, `nama`, `pesan`) VALUES
('AP001', 'pendi', 'sdknsjdfvns');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_cus` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone_number` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_cus`, `name`, `address`, `phone_number`, `email`) VALUES
(1, 'Fadil', 'Pondok Gede', 123456789, 'bla@gmail.com'),
(2, 'Dony', 'Bekasi', 999999999, 'nnnnnn'),
(3, 'Tirta', 'Tambun', 77777777, 'hhhhhhh'),
(4, 'wwwwww', 'gggggggggggg', 2147483647, 'bbbbbbbbbbb'),
(5, 'pendi', '', 0, ''),
(6, '', '', 0, ''),
(7, 'hhhhhhhh', '', 0, ''),
(8, 'mmmmmmmmmm', '', 0, ''),
(9, 'bbbbbbb', '', 0, ''),
(10, 'iiiiiiiiiii', '', 0, ''),
(11, 'llllllllll', '', 0, ''),
(12, 'vvvvvvvv', '', 0, ''),
(13, 'nhjk', '', 0, ''),
(14, 'bh', '', 0, ''),
(15, 'Pendi Setiawan', 'Pondok Ungu Permai', 2147483647, 'sacktiawan@gmail.com'),
(16, 'dsdfafa', 'fasfafa', 3353545, ''),
(17, 'Herman', 'Bekasi', 111111, 'rrrrrrrrrrrrrrrr'),
(18, 'Herman', 'hhhhhhhh', 0, ''),
(19, 'Nida R', '', 0, ''),
(20, 'Gilang', 'daasdsdsd', 989090, 'jnjnk'),
(21, 'rido', 'mkmkmk', 98989, 'km'),
(22, 'ssds', 'scddfdf', 0, 'dsfcdf'),
(23, 'gtgt', 'bghhn', 34343, 'gbgbg'),
(24, 'jnjn', 'jnjnkjn', 9897989, 'jkjnk');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id_image`, `filename`, `location`) VALUES
(1, 'Logo', 'gambar/logo.png'),
(2, 'Delete', 'gambar/glyphicons_016_bin.png'),
(3, 'Edit', 'gambar/glyphicons_030_pencil.png'),
(4, 'Cart', 'gambar/glyphicons_202_shopping_cart.png'),
(5, 'Logo Fb', 'gambar/facebook_logo_detail.png'),
(6, 'Logo Twitter', 'gambar/Twitter_logo.png');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `first_name`, `last_name`, `password`, `level`) VALUES
(1, 'pendi', 'pendi', 'setiawan', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(2, 'nida', 'nida', 'rahmani', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(3, 'admin', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(4, 'adm', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(6, 'ichan', 'ichan', '02', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(7, 'udin', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(9, 'fadil', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin');

-- --------------------------------------------------------

--
-- Table structure for table `login1`
--

CREATE TABLE IF NOT EXISTS `login1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login1`
--

INSERT INTO `login1` (`id`, `username`, `password`) VALUES
(1, 'pendi', '05-09-10'),
(2, 'nida', 'nidapendi'),
(3, 'reza', '1234'),
(4, 'q', '1'),
(5, 'qq', '12'),
(6, 'fadil', '222'),
(7, 'aa', '55'),
(8, 'ff', 'ff'),
(9, 'adoel', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cus` int(11) NOT NULL,
  `id_product` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `method` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_cus`, `id_product`, `quantity`, `method`) VALUES
(1, 0, 'AC001', 0, ''),
(2, 0, 'AC002', 0, ''),
(3, 0, 'AC001', 0, ''),
(4, 0, 'AC002', 0, ''),
(5, 0, 'AC002', 3, ''),
(6, 0, 'AC002', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_order` varchar(50) NOT NULL,
  `id_product` varchar(20) NOT NULL,
  `id_session` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `method` varchar(30) NOT NULL DEFAULT 'bca',
  PRIMARY KEY (`id_order`)
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
  `specification` text NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `type`, `price`, `description`, `stock`, `image`, `category_id`, `status`, `specification`) VALUES
('ACFAF001', 'Acer Aspire', 'E5-411-C02F-DOS-White', 3896000, 'Intel Dual Core Processor N2830 2.16 GHz, Intel HD Graphics, 14" resolution up to 1366 x 768, 2GB RAM, 320GB HDD, USB 3.0, DOS.', 3, '../aplikasi/image/acer-aspire-e5-411-c02f-dos-white-233.png', 1, 2, ''),
('ACFAF002', 'Acer Aspire', 'E5-411-C2S2-DOS-Black', 3752500, 'Intel Dual Core Processor N2830 2.16 GHz, Intel HD Graphics, 14" resolution up to 1366 x 768, 2GB RAM, 320GB HDD, USB 3.0, DOS.', 3, '../aplikasi/image/acer-aspire-e5-411-c2s2-dos-black-5.png', 1, 2, ''),
('ASCBA001', 'Asus', 'A450CA- WX106D WX107D WX219D i3-3217U-DOS-Gray', 4869900, 'Intel Core i3-3217U, VGA Intel HD Graphics 3000, 14" Resolution up to 1366 x 768, 2GB DDR3, 500GB HDD, DVD RW, WiFi, Camera, DOS.', 3, '../aplikasi/image/asus-a450ca-wx107d-wx219d-i3-3217u-or-2gb-or-500gb-dos-gray-1.png', 3, 2, ''),
('HPCCE001', 'HP Compaq', '14-d010AU E1-2100-DOS-Black', 3407300, 'AMD Dual Core E1-2100, AMD Radeon HD 8210G (Shared), 14" Resolution up to 1366x768px, 2GB DDR3, 320GB HDD, DVD±RW, NIC, WiFi, Non OS.', 2, '../aplikasi/image/hp-14-d010au-e1-2100-or-2gb-or-320gb-dos-black-1.png', 5, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `product2`
--

CREATE TABLE IF NOT EXISTS `product2` (
  `id_product` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `stock` int(3) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `specification` text NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product2`
--

INSERT INTO `product2` (`id_product`, `name`, `type`, `price`, `description`, `stock`, `image`, `category_id`, `status`, `specification`) VALUES
('BGIP0001', 'eses', 'ffsdsfv', 4444444, 'zszfzsfasafads', 3, '', 2, 1, ''),
('IP0001', 'sdas', 'adsd', 434, 'vxvxfvxvxvfx', 7, '', 2, 1, ''),
('IPOJ0002', 'frf', 'rggee', 565, 'frhzdhzdthzde', 1, '', 4, 1, ''),
('IPVD0001', 'dssdf', 'sdfsf', 43, 'zdfzdvzdfsd', 5, '', 1, 1, ''),
('JTIP0002', 'asa', 'frgdgd', 56665, 'sssrgsgr', 7, '', 3, 1, ''),
('QSIP0001', 'Acer Aspire', 'asasas', 54, 'ssfssf', 5, '', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE IF NOT EXISTS `specification` (
  `id` int(11) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `processor_onboard` int(11) NOT NULL,
  `standard_memory` int(11) NOT NULL,
  `video_type` int(11) NOT NULL,
  `display_size` int(11) NOT NULL,
  `display_max_resolution` int(11) NOT NULL,
  `display_technology` int(11) NOT NULL,
  `audio_type` int(11) NOT NULL,
  `hard_drive_type` int(11) NOT NULL,
  `optical_drive_type` int(11) NOT NULL,
  `networking` int(11) NOT NULL,
  `network_speed` int(11) NOT NULL,
  `wireless_network_type` int(11) NOT NULL,
  `wireless_network_protocol` int(11) NOT NULL,
  `card_reader_provided` int(11) NOT NULL,
  `interface_provided` int(11) NOT NULL,
  `o/s_provided` int(11) NOT NULL,
  `battery_type` int(11) NOT NULL,
  `power_supply` int(11) NOT NULL,
  `standard_warranty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
