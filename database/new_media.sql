-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 05:22 PM
-- Server version: 5.5.35-0ubuntu0.12.04.2
-- PHP Version: 5.3.10-1ubuntu3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(2, 'Asus'),
(3, 'Apple'),
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
(24, 'sarip', 'asdfghjkl', 123456789, 'fdfdfdfdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `first_name`, `last_name`, `password`, `level`) VALUES
(1, 'pendi', 'pendi', 'setiawan', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin'),
(2, 'nida', 'nida', 'rahmani', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(3, 'admin', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(4, 'adm', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(6, 'ichan', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(7, 'udin', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(8, 'upin', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(9, 'fadil', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin'),
(10, 'ipin', 'ipin', 'saripudin', '5f4dcc3b5aa765d61d8327deb882cf99', 'co-admin');

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
  `id_product` char(5) NOT NULL,
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
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` char(5) NOT NULL,
  `id_session` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double NOT NULL,
  `method` varchar(30) NOT NULL DEFAULT 'bca',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_order`, `id_product`, `id_session`, `quantity`, `total`, `method`) VALUES
(1, 'AC001', '', 1, 0, 'mandiri'),
(2, 'AC002', 't3qkbl4ne8ct1agja3pvt8n7k3', 5, 0, ''),
(3, 'AC005', 't3qkbl4ne8ct1agja3pvt8n7k3', 2, 0, ''),
(4, 'AC006', 'qs9ievblfn0ntrt3rnip499ki1', 5, 0, ''),
(5, 'AC003', 't3qkbl4ne8ct1agja3pvt8n7k3', 5, 0, ''),
(6, 'AC001', 't3qkbl4ne8ct1agja3pvt8n7k3', 1, 0, ''),
(7, 'AC002', 't3qkbl4ne8ct1agja3pvt8n7k3', 1, 0, ''),
(9, 'AC002', 'oiejsjtsvvvpjm3emjb6mnlq85', 4, 4000000, ''),
(10, 'AC001', '', 1, 2499938, 'mandiri'),
(11, 'AC006', '', 4, 7999938, 'bca'),
(12, 'AC006', '', 3, 5999938, 'bca'),
(13, 'AC006', '26jlmj8a7mpq8rorsgjummj246', 1, 1999938, 'mandiri'),
(14, 'AC001', '26r54f7afj567v7a169v6qeet6', 4, 9999938, 'bca'),
(15, 'AC001', 'qbamechnknkbns3jr4mout4fg6', 2, 4999938, 'bca'),
(38, '', 'tus6obl34997ds94an3kuiv652', 1, 999938, 'bca'),
(40, 'a', '140429121342', 1, 98989, 'bca'),
(41, 'AC005', '140429121342', 1, 5000000, 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` char(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `stock` int(3) NOT NULL,
  `image` text NOT NULL,
  `category_id` int(1) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `type`, `price`, `description`, `stock`, `image`, `category_id`) VALUES
('a', 'hh', 'hh', 98989, 'hhbbj', 8, '', 8),
('AC001', 'Acer', 'D250', 2500000, 'Ram       2GB\r\nProcessor 1Gzh', 5, '../aplikasi/image/C360_2014-02-15-14-33-29-348.jpg', 1),
('AC002', 'Acer33', 'klllllllllll', 1000000, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv\r\nvvvvvvvvvvvvvvvvvv', 10, '../aplikasi/image/images (1).jpg', 1),
('AC003', 'Notebook Acer', '', 1500000, '', 5, '', 1),
('AC004', 'Acer', '', 2300000, '', 7, '', 1),
('AC005', 'Acer', 'D257', 5000000, 'ddddddddddddddd\r\ndddddddddd\r\ndddddddddddddddddddddddddddddd\r\nddddddddddddddd\r\nddddddddddddddddddd\r\nddddddddddddddddddddddddddddddddddddddddd\r\ndddddddddddddddddd', 2, '../aplikasi/image/C360_2014-02-15-14-18-12-686.jpg', 1),
('AC006', 'mjgv', 'Bekas', 2000000, 'Ancur\r\n', 6, '../aplikasi/image/C360_2014-02-15-14-21-48-834.jpg', 0),
('AC007', 'Acer', 'N37', 3000000, 'bla bla bla...\r\nbla bla bla bla...\r\nbla bla bla bla bla...', 9, '', 1),
('AS001', 'Asus', '', 1200000, '', 2, '../aplikasi/image/images (1).jpg', 2),
('AS002', 'Asus', '', 1400000, '', 0, '', 2),
('AS003', 'Asus', 'Terbaru', 4100000, '', 5, '', 2),
('bbbb', 'bbbb', 'bbbb', 0, '', 2, '../aplikasi/image/', 0),
('ccccc', 'cccc', 'ccccccc', 0, 'cccccccc\r\ncccc', 8, '../aplikasi/image/images.jpg', 0),
('gghgb', 'gvhgv', 'gvgv', 0, 'vbjgvjgbj', 4, 'image/Rizky Dana Saputro_108091000006.jpg', 0),
('HP001', 'Hp', '', 2500000, '', 0, '', 5),
('HP002', 'Hp', '123', 3200000, '', 3, '', 5),
('HP003', 'Hp', 'Sdim', 4400000, 'n ,kznjnjbjbfhhjbJ', 2, 'image/acer.jpg', 5),
('jjjjj', 'jjjjjj', 'jjjjj', 0, 'jjjjjjj\r\njjjj\r\njjjjjjjjjjjjjj\r\njjjjjjjj\r\njjjjjjjjjjjjj', 0, '../aplikasi/image/images (2).jpg', 0),
('lllll', 'lllllll', 'llllllll', 0, 'llllllllllllllllll\r\nllllllllllll\r\nllllllllllllllllllllllllllllllllllllllllllllllllllll\r\nlllllllllllllll\r\nllllllllllllllllll\r\nllllllll\r\nllllllllllllllllllllll\r\nllllllllllllllll\r\nll\r\nllllllllll', 45, '../aplikasi/image/images (1).jpg', 0),
('mmmmm', 'mmmmm', 'mmmmmm', 0, 'mmmmmmmmm', 9, '../aplikasi/image/images.jpg', 0),
('nn', '', '', 0, '', 0, '../aplikasi/image/', 0),
('nnnnn', 'nnnnnnn', 'nnnnn', 0, '', 0, 'image/', 0),
('qqqq', 'qqqq', 'qqqqq', 0, '', 0, '../aplikasi/image/', 0),
('uygby', 'hygvu', 'vy', 6565, 'hfcvgfvh', 4, 'image/sub7.jpg', 0),
('v', 'bkj', 'hjbj', 0, 'jbjkhb', 34, '', 2),
('vv', 'vvvv', 'vvvvv', 0, 'vvvvvvvvvvvv', 0, '../aplikasi/image/images (1).jpg', 0),
('vvvv', 'vvvvvv', 'vvvvvv', 0, 'vvvvvvvv\r\nvvvvvvvvv\r\nvvv\r\nvvvvvv\r\nvvvvv', 0, '', 0);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
