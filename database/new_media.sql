-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2014 at 08:24 PM
-- Server version: 5.5.35-0+wheezy1
-- PHP Version: 5.4.4-14+deb7u7

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
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
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
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,
  `kdbrg` char(5) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  PRIMARY KEY (`id_orders_temp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `orders_temp`
--

INSERT INTO `orders_temp` (`id_orders_temp`, `kdbrg`, `jumlah`, `tgl_order_temp`, `jam_order_temp`) VALUES
(3, 'AC001', 6, '2014-02-13', '17:47:47'),
(4, 'AC002', 3, '2014-02-13', '17:53:36'),
(5, 'AC006', 3, '2014-02-14', '15:43:30'),
(6, 'AS001', 1, '2014-02-14', '17:41:05');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kdbrg` char(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`kdbrg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kdbrg`, `nama`, `type`, `harga`, `deskripsi`, `stok`, `gambar`) VALUES
('AC001', 'Acer', '', 2000000, '', 4, ''),
('AC002', 'Acer', '', 1000000, '', 10, ''),
('AC003', 'Notebook Acer', '', 1500000, '', 5, ''),
('AC004', 'Acer', '', 2300000, '', 7, ''),
('AC006', 'mjgv', 'Bekas', 2000000, 'Ancur\r\n', 3, 'gambar/994076_614082505323678_586749833_n.jpg'),
('AS001', 'Asus', '', 1200000, '', 2, ''),
('AS002', 'Asus', '', 1400000, '', 0, ''),
('AS003', 'Asus', 'Terbaru', 4100000, '', 5, ''),
('bjmbg', 'jgfvjgv', 'hjgvhj', 0, 'bkjbhkhb', 0, 'gambar/sub6.jpg'),
('gghgb', 'gvhgv', 'gvgv', 0, 'vbjgvjgbj', 0, 'gambar/Rizky Dana Saputro_108091000006.jpg'),
('HP001', 'Hp', '', 2500000, '', 0, ''),
('HP002', 'Hp', '123', 3200000, '', 3, ''),
('HP003', 'Hp', 'Sdim', 4400000, 'n ,kznjnjbjbfhhjbJ', 2, 'gambar/acer.jpg'),
('uygby', 'hygvu', 'vy', 6565, 'hfcvgfvh', 4, 'gambar/sub7.jpg');

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
