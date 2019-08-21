-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2017 at 08:03 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hatbazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(4, 'Laptop'),
(5, 'Desktop'),
(6, 'Printer'),
(7, 'Network Accessories'),
(8, 'Notebook');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(255) NOT NULL,
  `c_date` datetime NOT NULL,
  `p_id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `message` longtext NOT NULL,
  `likes` int(3) NOT NULL,
  `dislikes` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_date`, `p_id`, `username`, `message`, `likes`, `dislikes`) VALUES
(4, '2017-07-12 03:21:12', 10, 'hasan@gmail.com', 'it is good :)', 3, 4),
(17, '2017-07-31 02:47:50', 10, 'rupok@gmail.com', 'what a color', 4, 0),
(18, '2017-07-31 02:52:30', 12, 'rupok@gmail.com', 'it is beautiful', 0, 0),
(19, '2017-08-05 00:28:08', 8, 'hasan@gmail.com', 'it is beautiful', 0, 0),
(20, '2017-08-05 03:18:13', 10, 'hasan@gmail.com', 'it will be my priveledge', 0, 2),
(24, '2017-08-05 23:08:15', 11, 'hasan@gmail.com', 'it is a classy product', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `commentvotes`
--

CREATE TABLE `commentvotes` (
  `v_id` int(11) NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `liked` int(11) NOT NULL,
  `disliked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentvotes`
--

INSERT INTO `commentvotes` (`v_id`, `customer_id`, `c_id`, `liked`, `disliked`) VALUES
(1, 'hasan@gmail.com', 4, 1, 0),
(3, 'miraz@gmail.com', 4, 1, 0),
(4, 'rupok@gmail.com', 4, 1, 0),
(5, 'rupok@gmail.com', 17, 1, 0),
(15, 'hasan@gmail.com', 20, 1, 0),
(16, 'hasan@gmail.com', 4, 0, 1),
(17, 'hasan@gmail.com', 4, 1, 0),
(18, 'hasan@gmail.com', 4, 1, 0),
(20, 'hasan@gmail.com', 17, 1, 0),
(21, 'hasan@gmail.com', 4, 1, 0),
(22, 'hasan@gmail.com', 4, 0, 1),
(23, 'hasan@gmail.com', 4, 0, 1),
(24, 'hasan@gmail.com', 20, 0, 1),
(25, 'rupok@gmail.com', 24, 0, 1),
(27, 'rupok@gmail.com', 20, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`) VALUES
(8, 'hasan', 'hasan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '034938'),
(11, 'Himu', 'himu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '017948592'),
(3, 'hasann', 'hjb@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '08744'),
(7, 'imran', 'imran@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01932'),
(12, 'mahfujur rahman', 'mahfujma811@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0883ui23'),
(1, 'mahmud', 'mahmud@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01764855456'),
(6, 'Imran Hossain', 'md.imran.h021@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01796998911'),
(10, 'miraz', 'miraz@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1342534'),
(13, 'rupok', 'rupok@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0145');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `l_id` int(11) NOT NULL,
  `c_id` int(10) NOT NULL,
  `c_like` int(10) NOT NULL,
  `dislike` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`l_id`, `c_id`, `c_like`, `dislike`) VALUES
(1, 10, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `p_id` varchar(60) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `email`, `product_code`, `product_qty`, `product_name`) VALUES
(21, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(22, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(23, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(24, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(25, 'hasan@gmail.com', '12', 1, 'Accer_Blue');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `total` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `email`, `total`) VALUES
(25, 'mahmud@gmail.com', '422.00'),
(26, 'imran@gmail.com', '1532.00'),
(27, 'imran@gmail.com', '200.00'),
(28, 'imran@gmail.com', '200.00'),
(30, 'mahfujma811@gmail.com', '1271.00'),
(31, 'mahmud@gmail.com', '333.00'),
(32, 'mahmud@gmail.com', '422.00'),
(53, 'hasan@gmail.com', '37790.00');

-- --------------------------------------------------------

--
-- Table structure for table `products_list`
--

CREATE TABLE `products_list` (
  `id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `product_name`, `cat_id`, `product_desc`, `product_code`, `product_image`, `product_price`) VALUES
(1, 'PC_G2R7-1 ', 5, 'Details \r\n\r\n Model - PC G2R7-1, Processor - AMD RYZEN 7 1700, RAM - G.Skill Trident Z 8GB, Chipset - MSI B350M GAMING PRO DDR4, RAM Type - DDR4 3000 BUS, HDD - Toshiba DT01ACA100 1TB, HDD Type - SATA 7200RPM, Monitor Type - IPS Borderless Monitor, Monitor Brand & Size - Asus VX229H/HJ 21.5 Inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - MSI GEFORCE GTX 1050 TI GAMING X, Speaker - Creative SBS A60, Keyboard - Logitech MK345 Combo Wireless Keyboard Mouse, Casing - In Win 703 Mid Tower Gaming Black & RED, Others - Mouse Pad, Installation and Customization ', '1', 'PC_G2R7-1.jpg', '87150.00'),
(10, 'Accer_A22', 4, 'Details\r\n\r\nModel - Acer Aspire V3-574G, Processor - 5th Gen. Intel Core i7 5500U, Processor Clock Speed - 2.40GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR3L, HDD - 2TB HDD, Graphics Chipset - Nvidia Geforce 940M, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 4 Cell Lithium-ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.40Kg, Color - Black Silver, Warranty - 1 year\r\n', '10', 'Accer_A22.jpg', '59000.00'),
(11, 'Accer_A23', 4, 'Details\r\n\r\nModel - Acer TravelMate TMP246-MG, Processor - 5th Gen. Intel Core i5 5200U, Processor Clock Speed - 2.20GHz, CPU Cache - 3MB, Display Size - 14", Display Type - LED Display, RAM - 4GB, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - NVIDIA GeForce 820M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 1 x USB3.0, 2 X USB2.0, Battery - 4 Cell Li-Ion, Backup Time - Up to 4 Hrs., Operating System - Free Dos, Weight - 2.10Kg, Color - Black, Maximum RMA - 25 days, Part No - NX.V9USI.002, Warranty - 1 year\r\n', '11', 'Accer_A23.jpg', '41000.00'),
(12, 'Accer_Blue', 4, 'Details\r\n\r\nModel - Asus X441UA, Processor - 7th Gen. Intel Core i3 7100U, Processor Clock Speed - 2.40GHz, CPU Cache - 3MB, Display Size - 14", Display Type - LED Display, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 16GB, HDD - 1TB HDD, Graphics Chipset - Intel HD 620, Graphics Memory - Shared, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, VGA Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 1 x USB3.0, 1 x USB2.0, 1 x USB3.1 TYPE C, Finger Print - No, Keyboard Back-lit - No, Battery - 3 Cell, Backup Time - Up to 4 Hrs., Operating System - FreeDos, Weight - 1.75Kg, Color - Aqua Blue, Warranty - 2 year (Battery, Adapter 1 year), Country of Origin - Taiwan\r\n', '12', 'Accer_Blue.jpg', '34000.00'),
(13, 'Accer_G85', 4, 'Details\r\n\r\nModel - HP OMEN 15-AX221TX, Processor - Intel Core i7 7700HQ, Generation - 7th Gen, Processor Clock Speed - 2.8-3.8GHz, CPU Cache - 6MB, Display Size - 15.6", Display Type - diagonal FHD IPS UWVA anti-glare WLED-backlit, Display Resolution - 1920 x 1080, RAM - 16GB, RAM Type - DDR4 2400MHz SDRAM, RAM Slot - 2, Max RAM Support - 2 x 16 GB, HDD - 1TB 7200RPM HDD, 128GB M.2 SSD, Graphics Chipset - Nvidia GeForce 1050Ti, Graphics Memory - 4GB, Networking - LAN, WiFi, Bluetooth, Card Reader, Display Port - 1 x HDMI, Audio Port - Combo, USB Port - 1 x USB 2.0, 2 x USB 3.1 Gen 1, Keyboard Back-lit - Yes, Battery - 4-cell, 63.3 Wh Li-ion, Backup Time - Upto 2.5Hrs In Gaming, Upto 5Hrs General Computing (Both Depends on Load), Power plugin mode is recommended to get performance while gaming, Operating System - Win-10 Home, Weight - 2.2Kg, Color - Black, Others - Keyboard: Full-size island-style backlit keyboard with numeric keypad, Pointing device: HP Image pad with multi-touch gesture support, Power supply type: 150 W AC power adapter, Audio features: Bang & Olufsen, HP Audio Boost, Dual speakers, Part No - 1DE92PA, Warranty - 2 year (Battery, Adapter 1 year)', '13', 'Accer_G85.jpg', '127000.00'),
(14, 'Accer_Red', 4, 'Details\r\n\r\nModel - Acer Aspire E5-573G-71CA, Processor - 5th Gen. Intel Core i7 5500U, Processor Clock Speed - 2.40GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - NVidia GeForce GT 940M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 4 Cell Li-Ion, Backup Time - Up to 5 Hrs., Operating System - Free Dos, Weight - 2.40Kg, Color - RED, Warranty - 1 year\r\n', '14', 'Accer_Red.jpg', '51000.00'),
(15, 'Accer_Silver', 4, 'Details\r\n\r\nModel - Acer Aspire F5-573, Processor - 6th Gen. Intel Core i3 6100U, Processor Clock Speed - 2.30GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 4GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - Intel HD 520, Graphics Memory - Shared, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, 1 x USB Type-C, Battery - 4 Cell Lithium Ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.30Kg, Color - Sparkly Silver, Specialty - Backlit Keyboard, Warranty - 1 year\r\n', '15', 'Accer_Silver.jpg', '36000.00'),
(16, 'Asus_black', 4, 'Details\r\n\r\nModel - Asus P2540UV, Processor - Intel Core i5 7200U, Generation - 7th Gen, Processor Clock Speed - 2.5GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - FHD LED Display, Display Resolution - 1920 x 1080, RAM - 8GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 16GB, HDD - 1TB, Graphics Chipset - Nvidia GT 920M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 3 x USB3.0, 1 x USB2.0, Finger Print - Yes, Battery - 6 Cell Li-Ion, Operating System - Endless OS, Weight - 2.06Kg, Color - Black, Part No - DM0052, Warranty - 2 year (Battery, Adapter 1 Yr Warranty)\r\n', '16', 'Asus_black.jpg', '54000.00'),
(17, 'Asus_G750', 4, 'Details\r\n\r\nModel - Asus ROG GL702VM, Processor - Intel Core i7 7700HQ, Generation - 7th, Processor Clock Speed - 2.80- 3.8GHz, CPU Cache - 6MB, Display Size - 17.3", Display Type - FHD LED, Display Resolution - 1920 X 1080, RAM - 16GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 32GB, HDD - 1TB HDD + 256GB SSD, Graphics Chipset - NVIDIA GTX 1060 Graphics, Graphics Memory - 6GB, Networking - LAN, WiFi, Bluetooth, Card Reader, Display Port - 1 x HDMI, Audio Port - Combo, USB Port - 3 x USB 3.0, 1 x USB3.1, 1 x USB3.1, Battery - 76WHrs, 4S1P, 4-cell Li-ion, Operating System - Win-10 Home , Weight - 2.43KG, Color - Titanium Gold, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '17', 'Asus_G750.jpg', '160300.00'),
(18, 'Asus_G751', 4, 'Details\r\n\r\nModel - Asus ROG GL553VD, Processor - Intel Core i5 7300HQ, Generation - 7th Gen, Processor Clock Speed - 2.50GHz, Display Size - 15.6", Display Type - FHD, Display Resolution - 1920x1080, RAM - 8GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 32GB, HDD - 128GB SSD+1TB HDD, Graphics Chipset - NVIDIA GTX 1050, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, HD Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.1, 2 x USB3.0, 1 x USB2.0, Battery - 4 Cells, Operating System - Endless, Weight - 2.5Kg, Color - Black Metal, Part No - FY139, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '18', 'Asus_G751.jpg', '85000.00'),
(19, 'Asus_G752', 4, 'Details\r\n\r\nModel - Asus K401UQ, Processor - Intel Core i7 7500U, Generation - 7th, Processor Clock Speed - 2.70-3.5GHz, CPU Cache - 4MB, Display Size - 14", Display Type - FHD LED, Display Resolution - 1920 X 1080, RAM - 8GB, RAM Type - DDR4, RAM Slot - 1, Max RAM Support - 16GB, HDD - 512GB SSD, Graphics Chipset - Nvidia GT 940MX, Graphics Memory - 2GB, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - 1 x HDMI, Audio Port - Combo, USB Port - 2 x USB 2.0, 2 x USB 3.0, Battery - 48WHrs, 3S1P, 3-cell Li-ion, Operating System - Free Dos, Weight - 1.65Kg, Color - Gray Metal, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '19', 'Asus_G752.jpg', '76000.00'),
(2, 'PC_G2R7-2', 5, 'Details\r\n\r\nModel - HP AIO 20-r225L, Processor - 6th Gen. Intel Core i3 6100T, Processor Clock Speed - 3.20GHz, CPU Cache - 3MB, Chipset - Intel H110, Monitor - 19.5" LED Monitor, RAM - 4GB, RAM Type - DDR3 1600MHz, HDD - 1TB HDD, HDD Type - SATA 7200 rpm, SSD - No SSD, Graphics Chipset - Intel HD 530, Graphics Memory - Shared, Optical Device - DVD RW, Audio Chipset - Realtek ALC3228-CG, Speaker - 2-Watt speakers, Keyboard - USB Keyboard, Mouse - USB Mouse, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo In Out, USB Port - 2 x USB3.0, 3 x USB2.0, Operating System - Free Dos, Part No - T0R33AA, Warranty - 1 year\r\n', '2', 'PC_G2R7-2.jpg ', '45000.00'),
(20, 'Asus_Zen', 4, 'Details\r\n\r\nModel - Asus P2430UJ, Processor - 6th Gen. Intel Core i3 6100U, Processor Clock Speed - 2.30GHz, CPU Cache - 3MB, Display Size - 14", Display Type - LED Display, RAM - 4GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - NVIDIA GeForce 920M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, VGA Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 3 x USB3.0, 1 x USB2.0, Battery - 6 Cell Li-ion, Backup Time - Up to 4 Hrs., Operating System - Free Dos, Weight - 1.95Kg, Color - Silver, Warranty - 3 year (Battery, Adapter 1 year)\r\n', '20', 'Asus_Zen.jpg', '42000.00'),
(21, 'DELL_inspiron', 4, 'Details\r\n\r\nModel - Dell INSPIRON 15-5567, Processor - 7th Gen Intel Core i7 7500U, Processor Clock Speed - 2.70GHz, CPU Cache - 4MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - AMD RADEON R7 M445, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 3 Cell Prismatic, Backup Time - Up to 4 Hrs., Operating System - Free DOS, Weight - 2.30Kg, Color - FOG-GRAY, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '21', 'DELL_inspiron.jpg', '64000.00'),
(22, 'Hp_Blue', 4, 'Details\r\n\r\nModel - HP X360 11-AB028TU, Processor - Intel PQC N3710, Processor Clock Speed - 1.6-2.56GHz, CPU Cache - 2MB, Display Size - 11.6", Display Type - WLED, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR3L 1600MHz, RAM Slot - 1, HDD - 500GB, Graphics Chipset - Intel HD Graphics 405, Graphics Memory - Shared, Networking - WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.1, 2 x USB2.0, Battery - 3-cell Li-ion, Operating System - Win-10 Home, Weight - 1.45Kg, Color - Blue, Specialty - 360 Degree Convertible, Part No - 1DF68PA, Warranty - 1 year\r\n', '22', 'Hp_Blue.jpg', '37000.00'),
(23, 'Accer_N1', 8, 'Details\r\n\r\nModel - Acer Spin 513-51, Processor - Intel Core i5 7200U, Generation - 7th Gen, Processor Clock Speed - 2.5-3.1GHz, CPU Cache - 3MB, Display Size - 13.3", Display Type - FHD, Display Resolution - 1920x1080, RAM - 8GB, RAM Type - DDR4, HDD - 512GB SSD, Graphics Chipset - Intel HD, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, USB Port - 2 x USB2.0, 1 x USB3.0, Keyboard Back-lit - Yes, Operating System - Win-10 Home, Weight - 1.6 Kg, Color - Black, Specialty - 360 Degree Flip-able, Part No - NX.GK4SI.016, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '23', 'Accer_N1.jpg', '71000.00'),
(24, 'Accer_N2', 8, 'Details\r\n\r\nModel - Acer Switch SW1-011, Processor - Intel Atom X5-Z83002M, Processor Clock Speed - 1.44GHz-1.84GHz, CPU Cache - 2MB, Display Size - 10.1", Display Type - LED, Display Resolution - 1280 x 800, RAM - 2GB Onboard, RAM Type - DDR3L, HDD - 32GB eMMC, 500GB, Graphics Chipset - Intel? HD Graphics, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.0, 1 x USB2.0, Battery - 2-cell, Backup Time - Up to 5.5 hrs backup, Operating System - Win-10 Home, Weight - 1.26 kg, Color - Grey, Others - LED Multi-touch Screen, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '24', 'Accer_N2.jpg', '24000.00'),
(25, 'Accer_N3', 8, 'Details\r\n\r\nModel - Acer Predator G9-793, Processor - Intel Core i7 7700HQ, Generation - 7th Gen, Processor Clock Speed - 2.8-3.8GHz, CPU Cache - 6MB, Display Size - 17.3", Display Type - FHD Display, Display Resolution - 1920 x 1080, RAM - 16GB, RAM Type - DDR4, RAM Slot - 4, Max RAM Support - 64GB, HDD - 1TB HDD + 128GB SSD, Graphics Chipset - NVIDIA Geforce GTX 1060, Graphics Memory - 6GB GDDR5, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, USB Port - 4 x USB3.0, 1 x USB3.1 Type C, Battery - 8 Cell Li-Ion, Backup Time - Up to 3 Hrs., Operating System - Free Dos, Weight - 9.26lbs, Color - Abyssal Black, Part No - NH.Q1VSI.003, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '25', 'Accer_N3.jpg', '160500.00'),
(26, 'Dell_N1', 8, 'Details\r\n\r\nModel - Dell INSPIRON 15-5567, Processor - 7th Gen Intel Core i7 7500U, Processor Clock Speed - 2.70GHz, CPU Cache - 4MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - AMD RADEON R7 M445, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 3 Cell Prismatic, Backup Time - Up to 4 Hrs., Operating System - Free DOS, Weight - 2.30Kg, Color - FOG-GRAY, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '26', 'Dell_N1.jpg', '64000.00'),
(27, 'Dell_N2.jpg', 8, 'Details\r\n\r\nModel - Dell Inspiron 13-5368, Processor - Intel Core I3 6100U, Generation - 6th Gen, Processor Clock Speed - 2.30GHz, CPU Cache - 3MB, Display Size - 13.3", Display Type - Touch LED Display, Display Resolution - 1920 x 1080, RAM - 4GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - Intel HD 520, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reade, HD Webcame, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 3 Cell, Backup Time - Up to 4 Hrs., Operating System - Free Dos, Weight - 1.62Kg, Color - Gray, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '27', 'Dell_N2.jpg', '50000.00'),
(28, 'Dell_N3', 8, 'Details\r\n\r\nModel - Acer Aspire V3-574G, Processor - 5th Gen. Intel Core i7 5500U, Processor Clock Speed - 2.40-3.0GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - Nvidia Geforce 940M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 4 Cell Lithium-ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.40Kg, Color - Black Silver, Warranty - 1 year\r\n', '28', 'Dell_N3.jpg', '57000.00'),
(3, 'PC_G2R7-3', 5, 'Details\r\n\r\nModel - PC H177-2, Processor - Intel Kaby Lake Core i7 7700 3.60-4.20GHz 8MB Cache, RAM - G.Skill Trident Z 8GB, Chipset - Gigabyte GA-Z270-Gaming K3 DDR4, RAM Type - DDR4 3200MHz, HDD - Toshiba DT01ACA300V 3TB, HDD Type - SATA 5400RPM, Monitor Type - LED Monitor, Monitor Brand & Size - HP LV2011 20 inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - Onboard, Audio - Onboard, Speaker - Logitech X50 Mobile Boombox Yellow Speaker, Keyboard - A4 Tech KR-85 USB Bangla Keyboard, Mouse - A4 Tech OP-620D USB Optical Mouse, Casing - Delux DLC-MV888 ATX Casing, Others - Mouse Pad, Dust Cover\r\n', '3', 'PC_G2R7-3.jpg', '64450.00'),
(4, 'PC_G2R7-4', 5, 'Details\r\n\r\nModel - PC H1C0-1, Processor - Built-In, RAM - Cheval 4GB, Chipset - Asus N3050I-C Intel Celeron processor & Mainboard, RAM Type - DDR3 1600 BUS, HDD - Toshiba DT01ACA050 500GB, HDD Type - SATA 7200RPM, Monitor Type - Wide Screen LED, Monitor Brand & Size - HP V194 18.5", Optical Device - Asus DRW-24D5MT 24X, Graphics - Onboard, Audio - Onboard, Speaker - Microlab B 16 (2.0) Speaker, Keyboard - Delux DLK-6010U Keyboard, Mouse - Delux DLM-137BU Optical USB Mouse, Casing - Space 180F ATX\r\n', '4', 'PC_G2R7-4.jpg', '22000.00'),
(5, 'PC_G2R7-5', 5, 'Details\r\n\r\nModel - PC H134-1, Processor - Intel Core i3 4170 3.70GHz 3MB Cache, RAM - Cheval 4GB, Chipset - Gigabyte GA-H81M-S2PV-WP DDR3, RAM Type - DDR3 1600 BUS, HDD - Toshiba DT01ACA050 500GB, HDD Type - SATA, Monitor Type - LED Monitor, Monitor Brand & Size - Samsung S19F350 18.5 Inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - Onboard, Audio - Onboard, Speaker - Creative Basic SBS A120 Speaker, Keyboard - A4 Tech KR-85 USB Bangla Keyboard, Mouse - A4 Tech OP-620D USB Optical Mouse, Casing - Space 180F ATX Casing\r\n', '5', 'PC_G2R7-5.jpg', '33000.00'),
(6, 'PC_G2R7-6', 5, 'Details\r\n\r\nModel - PC G157-1, Processor - Intel Kaby Lake Core i5 7500, 3.40-3.80GHz, RAM - G.Skill Ripjaws V 8GB, Chipset - Asus ROG STRIX B250F GAMING, RAM Type - DDR4 2400 BUS, HDD - Toshiba DT01ACA100 1TB, HDD Type - SATA, Monitor Type - LED Borderless Monitor, Monitor Brand & Size - Dell S2216H 21.5", Optical Device - Liteon 24X Dual Layer, Graphics - ZOTAC GeForce GTX 1050, 2GB, Audio - OnBoard, Speaker - Microlab M-108 2:1, Keyboard - A4 Tech B328 Bloody Gaming keyboard, Mouse - A4 Tech Bloody V3M Gamming mouse, Casing - In Win G7 Mid Tower Glass Window Gaming, Power Supply - Thermaltake SPS-530MPCBEU Smart SE 530W Modular Power Supply, Cooler - Thermaltake CLP0587 Frio\r\n', '6', 'PC_G2R7-6.jpg', '72000.00'),
(7, 'PC_G2R7-7', 5, 'Details\r\n\r\nModel - PC H137-1, Processor - Intel Kaby Lake Core i3 7100, RAM - G.Skill 4GB, Chipset - Gigabyte GA-GAMING B8, RAM Type - DDR4 2400 BUS, HDD - Toshiba DT01ACA100 1TB, HDD Type - SATA 7200RPM, Monitor Type - LED Monitor, Monitor Brand & Size - Dell E2016HV 19.5 Inch, Optical Device - Liteon 24X, Speaker - Creative SBS A60, Keyboard - Logitech K120 ENU AP Bangla Keyboard, Mouse - Logitech B100 Optical USB Mouse, Casing - Space 2101, Others - Installation and Customization, Mouse Pad, Dust Cover\r\n', '7', 'PC_G2R7-7.jpg', '38000.00'),
(8, 'PC_G2R7-8', 5, 'Details\r\n\r\nModel - PC B176-1, Processor - Intel Skylake Core i7 6700K 4.0GHz 8MB Cache, RAM - G.Skill Ripjaws V 16GB, Chipset - MSI Z170A gaming M5 DDR4, RAM Type - DDR4 2400 Bus, HDD - Toshiba DT01ACA200 2TB, HDD Type - SATA, Monitor Type - IPS Panel Monitor with Built-in Speaker, Monitor Brand & Size - LG 22MP68VQ-P 21.5 Inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - ZOTAC GeForce GTX 1050 Ti Edition 4GB GDDR5, Audio - Onboard, Speaker - F&D A520U 2.1 Multimedia Speaker, Keyboard - A4 Tech KR-85 USB Bangla Keyboard, Mouse - A4 Tech OP-620D USB Optical Mouse, Casing - Thermaltake VO700A1N3N Versa II Black Casing, Power Supply - Thermaltake SPS-630MPCBEU Smart SE 630W Modular Power Supply, Cooler - Thermaltake CLP0607 NIC C4 (120mm) Air CPU Cooler\r\n', '8', 'PC_G2R7-8.jpg', '105000.00'),
(9, 'Accer_A21', 4, 'Details\r\n\r\nModel - Acer Aspire F5-573, Processor - 7th Gen Intel Core i5 7200U, Processor Clock Speed - 2.5-3.10GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR4, HDD - 2TB HDD, Graphics Chipset - Intel HD 520, Graphics Memory - Shared, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, 1 x USB Type-C, Keyboard Back-lit - Yes, Battery - 4 Cell Lithium Ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.30Kg, Color - Sparkly Silver, Warranty - 2 year (Battery, Adapter 1 year) for sell from 11 Feb 2017 and 1 year (before 11 Feb 2017), Part No - NX.GD7SI.003 / NX.GD7SI.012\r\n', '9', 'Accer_A21', '47000.00');

-- --------------------------------------------------------

--
-- Table structure for table `vcomments`
--

CREATE TABLE `vcomments` (
  `vc_id` int(11) NOT NULL,
  `vc_date` date NOT NULL,
  `v_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vcommentvotes`
--

CREATE TABLE `vcommentvotes` (
  `videovote_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `v_id` int(11) NOT NULL,
  `vliked` int(11) NOT NULL,
  `vdisliked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `v_id` int(11) NOT NULL,
  `vtitle` varchar(100) NOT NULL,
  `vdate` date NOT NULL,
  `vlink` varchar(200) NOT NULL,
  `vlikes` int(5) NOT NULL,
  `vdislikes` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`v_id`, `vtitle`, `vdate`, `vlink`, `vlikes`, `vdislikes`) VALUES
(1, 'VivoBook Pro N552VW', '2017-08-15', 'https://www.youtube.com/embed/vtM0UyCLDoU', 0, 0),
(2, 'Asus Zenbook UX305', '2017-02-13', 'https://www.youtube.com/embed/Yve9TB-fXV8', 0, 0),
(3, 'Dell Inspiron 5000 5558', '2017-06-20', 'https://www.youtube.com/embed/JTwADtjmEh8', 0, 0),
(4, 'Dell Inspiron 7560', '2017-08-15', 'https://www.youtube.com/embed/tbpaU7M8PAA', 0, 0),
(5, 'Dell 7560', '2017-05-09', 'https://www.youtube.com/embed/oNN7bhazTEY', 0, 0),
(6, 'Dell Inspiron 7000', '2015-06-17', 'https://www.youtube.com/embed/G5vZfGxNSzA', 0, 0),
(7, 'Apple MacBook Pro 13', '2016-10-20', 'https://www.youtube.com/embed/zKbnsAh27Qc', 0, 0),
(8, 'Macbook Air', '2017-04-19', 'https://www.youtube.com/embed/d_U7NT-oVas', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `commentvotes`
--
ALTER TABLE `commentvotes`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `products_list`
--
ALTER TABLE `products_list`
  ADD PRIMARY KEY (`product_code`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `vcomments`
--
ALTER TABLE `vcomments`
  ADD PRIMARY KEY (`vc_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `vcommentvotes`
--
ALTER TABLE `vcommentvotes`
  ADD PRIMARY KEY (`videovote_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `commentvotes`
--
ALTER TABLE `commentvotes`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `vcomments`
--
ALTER TABLE `vcomments`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vcommentvotes`
--
ALTER TABLE `vcommentvotes`
  MODIFY `videovote_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentvotes`
--
ALTER TABLE `commentvotes`
  ADD CONSTRAINT `commentvotes_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `commentvotes_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `comments` (`c_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products_list` (`product_code`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`email`);

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`),
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`product_code`) REFERENCES `products_list` (`product_code`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`email`) REFERENCES `customer` (`email`);

--
-- Constraints for table `products_list`
--
ALTER TABLE `products_list`
  ADD CONSTRAINT `products_list_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE SET NULL;

--
-- Constraints for table `vcomments`
--
ALTER TABLE `vcomments`
  ADD CONSTRAINT `vcomments_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `video` (`v_id`),
  ADD CONSTRAINT `vcomments_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`email`);

--
-- Constraints for table `vcommentvotes`
--
ALTER TABLE `vcommentvotes`
  ADD CONSTRAINT `vcommentvotes_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `video` (`v_id`),
  ADD CONSTRAINT `vcommentvotes_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
