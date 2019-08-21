-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2017 at 01:35 AM
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
-- Table structure for table `comment on news`
--

CREATE TABLE `comment on news` (
  `CommentID` int(11) NOT NULL,
  `NewsID` int(11) NOT NULL,
  `Comment` varchar(1000) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `Modification Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment on news`
--

INSERT INTO `comment on news` (`CommentID`, `NewsID`, `Comment`, `Email`, `customer_id`, `Modification Date`, `Status`) VALUES
(1, 3, 'Vivamus congue turpis in augue pellentesque scelerisque. Pellentesque aliquam laoreet sem nec ultrices. Fusce blandit nunc vehicula massa vehicula tincidunt. Nam venenatis cursus urna sed gravida. Ut tincidunt elit ut quam malesuada consequat. Sed semper purus sit amet lorem elementum faucibus.', 'hasan@gmail.com', 8, '2017-08-16 23:21:14', 1),
(2, 3, 'I like this device.', 'rupok@gmail.com', 13, '2017-08-16 03:05:47', 1),
(3, 3, 'I am going to buy this device very soon :)', 'miraz@gmail.com', 10, '2017-08-16 04:43:05', 1),
(4, 3, 'No, I have changed my decision, I am not going to buy this :(', 'hasan@gmail.com', 8, '2017-08-16 04:43:48', 1);

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
(4, '2017-07-12 03:21:12', 10, 'hasan@gmail.com', 'it is good :)', 2, 5),
(17, '2017-07-31 02:47:50', 10, 'rupok@gmail.com', 'what a color', 4, 0),
(18, '2017-07-31 02:52:30', 12, 'rupok@gmail.com', 'it is beautiful', 0, 1),
(19, '2017-08-05 00:28:08', 8, 'hasan@gmail.com', 'it is beautiful', 3, 2),
(20, '2017-08-05 03:18:13', 10, 'hasan@gmail.com', 'it will be my priveledge', 4, 2),
(24, '2017-08-05 23:08:15', 11, 'hasan@gmail.com', 'it is a classy product', 0, 2),
(25, '2017-08-27 04:41:20', 26, 'hasan@gmail.com', 'it is very mmuch attractive :P', 1, 0);

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
(3, 'miraz@gmail.com', 4, 1, 0),
(4, 'rupok@gmail.com', 4, 1, 0),
(5, 'rupok@gmail.com', 17, 1, 0),
(25, 'rupok@gmail.com', 24, 0, 1),
(27, 'rupok@gmail.com', 20, 0, 1),
(30, 'hasan@gmail.com', 18, 0, 1),
(45, 'hasan@gmail.com', 20, 0, 1),
(46, 'hasan@gmail.com', 17, 1, 0),
(47, 'hasan@gmail.com', 4, 0, 1),
(49, 'hasan@gmail.com', 24, 0, 1),
(50, 'hasan@gmail.com', 25, 1, 0);

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
(14, 'miraz', 'miraz@hotmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '3405234'),
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
  `NewsID` int(11) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Body` varchar(3000) NOT NULL,
  `Image` varchar(300) NOT NULL,
  `Modified_By` varchar(50) NOT NULL,
  `Modification Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsID`, `Subject`, `Body`, `Image`, `Modified_By`, `Modification Date`, `Status`) VALUES
(1, '\r\nThe 8th City IT Computer Fair - with the slogan ''IT leads the flow of change''', 'Commerce Minister Faruk Khan will inaugurate the nine-day fair.\r\n\r\nA total of 156 business establishments will take part in the fair that will remain open daily from 10am to 7pm.\r\n\r\nThe entry-fee for the fair is Tk 10 per person, but entry will be free for school students and the disabled.\r\n\r\nOrganisers said the last year''s Computer City IT Fair had a turnover of more than Tk 100 crore.\r\n will begin Thursday at the BCS Computer City in Agargaon.\r\n', 'images/img1.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(2, ' Summer Smartphone & Tab Expo 2017', ' BCSICTWORLD-2008?, a computer fair, will be held at the Bangladesh China Friendship Conference Centre in the capital, Dhaka from November 17 to November 21.\r\n\r\nBangladesh Computer Samity (BCS) in cooperation with ICT Business Promotion Council of the ministry of commerce will organize the five-day event, BCS President Mustafa Jabber said at a press conference on Wednesday.\r\n\r\nThe theme of this year’s fair is: ‘Towards Digital Bangladesh’.\r\n\r\nA total of 65 stalls and 17 pavilions have already been booked for the fair, organizers confirmed.\r\n\r\nBCS, the ICT Industry Association of Bangladesh, expected that a large number of local and foreign companies and organizations would participate in the fair to demonstrate their products and services, they added.\r\n\r\nBBN/SI/SSF/AD/30October08-1:54 AM (BST)', 'images/img2.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(3, 'Acer Predator Helios 300 Gaming Laptop Launched in India Starting Rs. 1,29,999 ', 'After first unveiling it at an event in New York earlier this year, Acer has now launched the Predator Helios 300 gaming laptop in India. The laptop is priced starting at Rs. 1,29,999 and is now available to buy exclusively on Flipkart.\r\n\r\nAnnounced first during the Next@Acer global press conference in New York, the laptop features the company''s new AeroBlade 3D metal blade fans which is said to increase airflow by 35 percent without taking too much space. In the US, it is priced at $1,299 (approximately Rs. 88,300).\r\n\r\nThe Predator Helios 300 is made available in a 15.6-inch full-HD form factor. Specifications include a choice of a seventh generation Intel Core i5 (7300HQ) or Core i7 (7700HQ), an overclockable Nvidia GTX 1050Ti GPU with 4GB GDDR5, 8GB DDR4 RAM upgradeable to 32GB, a 128GB SSD, and a regular 1TB hard drive for storage. Acer has also fitted a compartment underneath the chassis to make it easy for the user to upgrade memory and storage components. The laptop also has Dolby Audio Premium for better quality audio.\r\n\r\nPorts on the Acer Predator Helios 300 include a Gigabit Ethernet port, USB 3.1 Type-C port, a USB 3.0 port, two USB 2.0 ports, a 2-in-1 card reader, and an HDMI 2.0 port as well. There''s also the wireless 802.11ac 2x2 MIMO technology to give you up to two times faster wireless speeds than 1x1 solutions and up to five times faster than traditional 802.11n 1x1 solution.\r\n\r\nCommenting on the launch, Chandrahas Panigrahi, CMO and Consumer Business Head, Acer India said in a statement, "We are thrilled to bring in the new generation of Predator series to India. Predator Helios 300 combines innovative design and unbeatable features that are sure to delight the gaming enthusiasts. Predator will be a brand to beat in the Indian gaming market."\r\n\r\nThe Core i7 processor variant is priced at Rs. 1,49,999 on Flipkart. Both the laptop variants are listed with an exchange offer of up to Rs. 15,000, and an extra 5 percent off on Axis Bank Buzz credit cards as well.\r\n\r\nFor the latest tech news and reviews, follow Gadgets 360 on Twitter, Facebook, and subscribe to our YouTube channel.', 'images/img11.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(4, 'ASUS LAPTOP FAIR 2017\r\nIN SEARCH OF INCREDIBLE', 'ASUSTEK COMPUTER INC. was founded in 2nd April 1989 at Taiwan. It’s a Taiwanese multinational computer hardware and Electronics Company. Asus has a wide range of product line including desktops, laptops, net books, LED/LCD panels, mobile phones, networking equipment, monitors, motherboards, graphics cards, optical storage, multimedia products, servers, workstations, and tablet PCs. In Bangladesh Asus has huge market for motherboard, graphic card, tablet, laptop and other computer hardware.\r\nAsus Laptop in Bangladesh\r\n\r\n\r\nAsus is using toughness motherboard for the laptop. Asus laptop is known as the most qualified to play the game by using ATI Radeon and Nvidia GForce AGP. Most of the Asus Laptop comes with 1 year product warranty in Bangladesh. Please make sure for the warranty information when you purchase from retailers.', 'images/img3.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(5, 'THE ICT INDUSTRY ASSOCIATION OF BANGLADESH', 'Popularly known as BCS, Bangladesh Computer Samity has been seamlessly catalyzing the public and private sectors’ ICT stakeholders of Bangladesh for last three decades. Established in 1987, this was the first of its kind  to emerge as the ICT industry trade association of the country.\r\n\r\nBCS has initiated & successfully led to popularize, expand& leverage ICT in manifolds, not only inside the country, but also crossing the borders and oceans. It represents Bangladesh in the relevant global & regional forums of WITSA, ASOCIO & AFACT.\r\n\r\nBCS’s role to aid in the visionary program of ‘Digital Bangladesh’ announced & spearheaded by the Hon’ble Prime Minister Sheikh Hasina has been extraordinarily remarkable.\r\n\r\nAs such,  Bangladesh Computer Samity is truly the ICT Industry Association of Bangladesh.', 'images/img13.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(6, 'Praesent dapibusneque id cursus faucioibus tortor neque tiegetas augue', 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate.', 'images/img5.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(7, 'TOTOLINK at Bangladesh laptop Fair', 'Nov. 14, 2017, Dhaka--TOTOLINK attended Laptop Fair at Bangabandhu International Conference Center in Dhaka, Bangladesh, which is the largest Laptop & Tab Expo named ‘Winter Laptop Fair-2017’ held on November 12~14, 2017. During the fair, TOTOLINK shows many kinds of Wi-Fi devices to visitors, including A2004NS, AC1200 Wireless Dual Band Gigabit Router, N300RH, 300Mbps Long Range Wireless N Router, N150RT/N300RT, basic Wi-Fi router, some LAN cards and switch etc. Besides, TOTOLINK team prepared special T-shirt with TOTOLINK logo as gift to all visitors, enable people to enjoy fully glamour of us!\r\n\r\n\r\nAfter the fair, TOTOLINK has achieved high popularity on networking area. More and more retailers show their willing to join TOTOLINK. We believe TOTOLINK will grow better and fast in Bangladesh.', 'images/img4.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(10, 'Praesent dapibusn id cursus', 'Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate.', 'images/img5.jpg', 'mahmud@gmail.com', '2017-08-16 00:22:59', 1),
(11, 'dell-xps-13-2-in-1', ' it has a Windows Hello camera, 360-degree hinges, and even digital pen support.', 'dell-xps-13-2-in-1.jpg', 'hasan@gmail.com', '2017-08-26 17:36:33', 1),
(12, 'ZENBOOK 3 Delux', 'The Asus ZenBook 3 felt so close to being a great laptop last year.', 'ZENBOOK 3 Delux.jpg', 'mahmud@gmail.com', '2017-08-26 17:36:33', 1),
(13, 'SAMSUNG CHROMEBOOK PLUS', 'Samsung''s newest Chromebooks were the first that I''d seen with access to the full Google Play store.', 'SAMSUNG CHROMEBOOK PLUS.jpg', 'mahmud@gmail.com', '2017-08-26 17:37:15', 1);

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
(25, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(26, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(27, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(28, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(29, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(30, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(31, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(32, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(33, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(34, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(35, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(36, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(37, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(38, 'mahmud@gmail.com', '19', 1, 'Asus_G752'),
(39, 'mahmud@gmail.com', '16', 1, 'Asus_black'),
(60, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(61, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(62, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(63, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(64, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(65, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(66, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(67, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(68, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(69, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(70, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(71, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(72, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(73, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(74, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(75, 'hasan@gmail.com', '12', 1, 'Accer_Blue'),
(76, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(77, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(78, 'hasan@gmail.com', '10', 1, 'Accer_A22'),
(79, 'hasan@gmail.com', '11', 1, 'Accer_A23'),
(80, 'hasan@gmail.com', '15', 1, 'Accer_Silver');

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
(53, 'hasan@gmail.com', '37790.00'),
(54, 'mahmud@gmail.com', '144350.00'),
(55, 'mahmud@gmail.com', '144350.00'),
(56, 'mahmud@gmail.com', '144350.00'),
(57, 'mahmud@gmail.com', '144350.00'),
(58, 'mahmud@gmail.com', '144350.00'),
(59, 'mahmud@gmail.com', '144350.00'),
(60, 'mahmud@gmail.com', '144350.00'),
(69, 'hasan@gmail.com', '148790.00'),
(70, 'hasan@gmail.com', '148790.00'),
(71, 'hasan@gmail.com', '148790.00'),
(72, 'hasan@gmail.com', '148790.00'),
(73, 'hasan@gmail.com', '148790.00'),
(74, 'hasan@gmail.com', '148790.00'),
(75, 'hasan@gmail.com', '151010.00');

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
  `product_price` decimal(10,2) NOT NULL,
  `Processor` varchar(50) NOT NULL,
  `RAM` int(20) NOT NULL,
  `graficCard` int(50) NOT NULL,
  `batterylifetime` int(11) NOT NULL,
  `size` float NOT NULL,
  `brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_list`
--

INSERT INTO `products_list` (`id`, `product_name`, `cat_id`, `product_desc`, `product_code`, `product_image`, `product_price`, `Processor`, `RAM`, `graficCard`, `batterylifetime`, `size`, `brand`) VALUES
(1, 'PC_G2R7-1 ', 5, 'Details \r\n\r\n Model - PC G2R7-1, Processor - AMD RYZEN 7 1700, RAM - G.Skill Trident Z 8GB, Chipset - MSI B350M GAMING PRO DDR4, RAM Type - DDR4 3000 BUS, HDD - Toshiba DT01ACA100 1TB, HDD Type - SATA 7200RPM, Monitor Type - IPS Borderless Monitor, Monitor Brand & Size - Asus VX229H/HJ 21.5 Inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - MSI GEFORCE GTX 1050 TI GAMING X, Speaker - Creative SBS A60, Keyboard - Logitech MK345 Combo Wireless Keyboard Mouse, Casing - In Win 703 Mid Tower Gaming Black & RED, Others - Mouse Pad, Installation and Customization ', '1', 'PC_G2R7-1.jpg', '87150.00', 'AMD RYZEN 7 1700', 8, 0, 0, 21.5, 'Asus'),
(10, 'Accer_A22', 4, 'Details\r\n\r\nModel - Acer Aspire V3-574G, Processor - 5th Gen. Intel Core i7 5500U, Processor Clock Speed - 2.40GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR3L, HDD - 2TB HDD, Graphics Chipset - Nvidia Geforce 940M, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 4 Cell Lithium-ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.40Kg, Color - Black Silver, Warranty - 1 year\r\n', '10', 'Accer_A22.jpg', '59000.00', '5th Gen. Intel Core i7 5500U', 8, 4, 0, 15.6, 'Accer'),
(11, 'Accer_A23', 4, 'Details\r\n\r\nModel - Acer TravelMate TMP246-MG, Processor - 5th Gen. Intel Core i5 5200U, Processor Clock Speed - 2.20GHz, CPU Cache - 3MB, Display Size - 14", Display Type - LED Display, RAM - 4GB, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - NVIDIA GeForce 820M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 1 x USB3.0, 2 X USB2.0, Battery - 4 Cell Li-Ion, Backup Time - Up to 4 Hrs., Operating System - Free Dos, Weight - 2.10Kg, Color - Black, Maximum RMA - 25 days, Part No - NX.V9USI.002, Warranty - 1 year\r\n', '11', 'Accer_A23.jpg', '41000.00', '5th Gen. Intel Core i5', 4, 2, 4, 14, 'Acer'),
(12, 'Accer_Blue', 4, 'Details\r\n\r\nModel - Asus X441UA, Processor - 7th Gen. Intel Core i3 7100U, Processor Clock Speed - 2.40GHz, CPU Cache - 3MB, Display Size - 14", Display Type - LED Display, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 16GB, HDD - 1TB HDD, Graphics Chipset - Intel HD 620, Graphics Memory - Shared, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, VGA Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 1 x USB3.0, 1 x USB2.0, 1 x USB3.1 TYPE C, Finger Print - No, Keyboard Back-lit - No, Battery - 3 Cell, Backup Time - Up to 4 Hrs., Operating System - FreeDos, Weight - 1.75Kg, Color - Aqua Blue, Warranty - 2 year (Battery, Adapter 1 year), Country of Origin - Taiwan\r\n', '12', 'Accer_Blue.jpg', '34000.00', '', 0, 0, 0, 0, ''),
(13, 'Accer_G85', 4, 'Details\r\n\r\nModel - HP OMEN 15-AX221TX, Processor - Intel Core i7 7700HQ, Generation - 7th Gen, Processor Clock Speed - 2.8-3.8GHz, CPU Cache - 6MB, Display Size - 15.6", Display Type - diagonal FHD IPS UWVA anti-glare WLED-backlit, Display Resolution - 1920 x 1080, RAM - 16GB, RAM Type - DDR4 2400MHz SDRAM, RAM Slot - 2, Max RAM Support - 2 x 16 GB, HDD - 1TB 7200RPM HDD, 128GB M.2 SSD, Graphics Chipset - Nvidia GeForce 1050Ti, Graphics Memory - 4GB, Networking - LAN, WiFi, Bluetooth, Card Reader, Display Port - 1 x HDMI, Audio Port - Combo, USB Port - 1 x USB 2.0, 2 x USB 3.1 Gen 1, Keyboard Back-lit - Yes, Battery - 4-cell, 63.3 Wh Li-ion, Backup Time - Upto 2.5Hrs In Gaming, Upto 5Hrs General Computing (Both Depends on Load), Power plugin mode is recommended to get performance while gaming, Operating System - Win-10 Home, Weight - 2.2Kg, Color - Black, Others - Keyboard: Full-size island-style backlit keyboard with numeric keypad, Pointing device: HP Image pad with multi-touch gesture support, Power supply type: 150 W AC power adapter, Audio features: Bang & Olufsen, HP Audio Boost, Dual speakers, Part No - 1DE92PA, Warranty - 2 year (Battery, Adapter 1 year)', '13', 'Accer_G85.jpg', '127000.00', '', 0, 0, 0, 0, ''),
(14, 'Accer_Red', 4, 'Details\r\n\r\nModel - Acer Aspire E5-573G-71CA, Processor - 5th Gen. Intel Core i7 5500U, Processor Clock Speed - 2.40GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - NVidia GeForce GT 940M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 4 Cell Li-Ion, Backup Time - Up to 5 Hrs., Operating System - Free Dos, Weight - 2.40Kg, Color - RED, Warranty - 1 year\r\n', '14', 'Accer_Red.jpg', '51000.00', '', 0, 0, 0, 0, ''),
(15, 'Accer_Silver', 4, 'Details\r\n\r\nModel - Acer Aspire F5-573, Processor - 6th Gen. Intel Core i3 6100U, Processor Clock Speed - 2.30GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 4GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - Intel HD 520, Graphics Memory - Shared, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, 1 x USB Type-C, Battery - 4 Cell Lithium Ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.30Kg, Color - Sparkly Silver, Specialty - Backlit Keyboard, Warranty - 1 year\r\n', '15', 'Accer_Silver.jpg', '36000.00', '', 0, 0, 0, 0, ''),
(16, 'Asus_black', 4, 'Details\r\n\r\nModel - Asus P2540UV, Processor - Intel Core i5 7200U, Generation - 7th Gen, Processor Clock Speed - 2.5GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - FHD LED Display, Display Resolution - 1920 x 1080, RAM - 8GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 16GB, HDD - 1TB, Graphics Chipset - Nvidia GT 920M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 3 x USB3.0, 1 x USB2.0, Finger Print - Yes, Battery - 6 Cell Li-Ion, Operating System - Endless OS, Weight - 2.06Kg, Color - Black, Part No - DM0052, Warranty - 2 year (Battery, Adapter 1 Yr Warranty)\r\n', '16', 'Asus_black.jpg', '54000.00', '', 0, 0, 0, 0, ''),
(17, 'Asus_G750', 4, 'Details\r\n\r\nModel - Asus ROG GL702VM, Processor - Intel Core i7 7700HQ, Generation - 7th, Processor Clock Speed - 2.80- 3.8GHz, CPU Cache - 6MB, Display Size - 17.3", Display Type - FHD LED, Display Resolution - 1920 X 1080, RAM - 16GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 32GB, HDD - 1TB HDD + 256GB SSD, Graphics Chipset - NVIDIA GTX 1060 Graphics, Graphics Memory - 6GB, Networking - LAN, WiFi, Bluetooth, Card Reader, Display Port - 1 x HDMI, Audio Port - Combo, USB Port - 3 x USB 3.0, 1 x USB3.1, 1 x USB3.1, Battery - 76WHrs, 4S1P, 4-cell Li-ion, Operating System - Win-10 Home , Weight - 2.43KG, Color - Titanium Gold, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '17', 'Asus_G750.jpg', '160300.00', '', 0, 0, 0, 0, ''),
(18, 'Asus_G751', 4, 'Details\r\n\r\nModel - Asus ROG GL553VD, Processor - Intel Core i5 7300HQ, Generation - 7th Gen, Processor Clock Speed - 2.50GHz, Display Size - 15.6", Display Type - FHD, Display Resolution - 1920x1080, RAM - 8GB, RAM Type - DDR4, RAM Slot - 2, Max RAM Support - 32GB, HDD - 128GB SSD+1TB HDD, Graphics Chipset - NVIDIA GTX 1050, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, HD Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.1, 2 x USB3.0, 1 x USB2.0, Battery - 4 Cells, Operating System - Endless, Weight - 2.5Kg, Color - Black Metal, Part No - FY139, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '18', 'Asus_G751.jpg', '85000.00', '', 0, 0, 0, 0, ''),
(19, 'Asus_G752', 4, 'Details\r\n\r\nModel - Asus K401UQ, Processor - Intel Core i7 7500U, Generation - 7th, Processor Clock Speed - 2.70-3.5GHz, CPU Cache - 4MB, Display Size - 14", Display Type - FHD LED, Display Resolution - 1920 X 1080, RAM - 8GB, RAM Type - DDR4, RAM Slot - 1, Max RAM Support - 16GB, HDD - 512GB SSD, Graphics Chipset - Nvidia GT 940MX, Graphics Memory - 2GB, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - 1 x HDMI, Audio Port - Combo, USB Port - 2 x USB 2.0, 2 x USB 3.0, Battery - 48WHrs, 3S1P, 3-cell Li-ion, Operating System - Free Dos, Weight - 1.65Kg, Color - Gray Metal, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '19', 'Asus_G752.jpg', '76000.00', '', 0, 0, 0, 0, ''),
(2, 'PC_G2R7-2', 5, 'Details\r\n\r\nModel - HP AIO 20-r225L, Processor - 6th Gen. Intel Core i3 6100T, Processor Clock Speed - 3.20GHz, CPU Cache - 3MB, Chipset - Intel H110, Monitor - 19.5" LED Monitor, RAM - 4GB, RAM Type - DDR3 1600MHz, HDD - 1TB HDD, HDD Type - SATA 7200 rpm, SSD - No SSD, Graphics Chipset - Intel HD 530, Graphics Memory - Shared, Optical Device - DVD RW, Audio Chipset - Realtek ALC3228-CG, Speaker - 2-Watt speakers, Keyboard - USB Keyboard, Mouse - USB Mouse, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo In Out, USB Port - 2 x USB3.0, 3 x USB2.0, Operating System - Free Dos, Part No - T0R33AA, Warranty - 1 year\r\n', '2', 'PC_G2R7-2.jpg ', '45000.00', '', 0, 0, 0, 0, ''),
(20, 'Asus_Zen', 4, 'Details\r\n\r\nModel - Asus P2430UJ, Processor - 6th Gen. Intel Core i3 6100U, Processor Clock Speed - 2.30GHz, CPU Cache - 3MB, Display Size - 14", Display Type - LED Display, RAM - 4GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - NVIDIA GeForce 920M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, VGA Webcam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 3 x USB3.0, 1 x USB2.0, Battery - 6 Cell Li-ion, Backup Time - Up to 4 Hrs., Operating System - Free Dos, Weight - 1.95Kg, Color - Silver, Warranty - 3 year (Battery, Adapter 1 year)\r\n', '20', 'Asus_Zen.jpg', '42000.00', '', 0, 0, 0, 0, ''),
(21, 'DELL_inspiron', 4, 'Details\r\n\r\nModel - Dell INSPIRON 15-5567, Processor - 7th Gen Intel Core i7 7500U, Processor Clock Speed - 2.70GHz, CPU Cache - 4MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - AMD RADEON R7 M445, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 3 Cell Prismatic, Backup Time - Up to 4 Hrs., Operating System - Free DOS, Weight - 2.30Kg, Color - FOG-GRAY, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '21', 'DELL_inspiron.jpg', '64000.00', '', 0, 0, 0, 0, ''),
(22, 'Hp_Blue', 4, 'Details\r\n\r\nModel - HP X360 11-AB028TU, Processor - Intel PQC N3710, Processor Clock Speed - 1.6-2.56GHz, CPU Cache - 2MB, Display Size - 11.6", Display Type - WLED, Display Resolution - 1366 x 768, RAM - 4GB, RAM Type - DDR3L 1600MHz, RAM Slot - 1, HDD - 500GB, Graphics Chipset - Intel HD Graphics 405, Graphics Memory - Shared, Networking - WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.1, 2 x USB2.0, Battery - 3-cell Li-ion, Operating System - Win-10 Home, Weight - 1.45Kg, Color - Blue, Specialty - 360 Degree Convertible, Part No - 1DF68PA, Warranty - 1 year\r\n', '22', 'Hp_Blue.jpg', '37000.00', '', 0, 0, 0, 0, ''),
(23, 'Accer_N1', 8, 'Details\r\n\r\nModel - Acer Spin 513-51, Processor - Intel Core i5 7200U, Generation - 7th Gen, Processor Clock Speed - 2.5-3.1GHz, CPU Cache - 3MB, Display Size - 13.3", Display Type - FHD, Display Resolution - 1920x1080, RAM - 8GB, RAM Type - DDR4, HDD - 512GB SSD, Graphics Chipset - Intel HD, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, USB Port - 2 x USB2.0, 1 x USB3.0, Keyboard Back-lit - Yes, Operating System - Win-10 Home, Weight - 1.6 Kg, Color - Black, Specialty - 360 Degree Flip-able, Part No - NX.GK4SI.016, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '23', 'Accer_N1.jpg', '71000.00', '', 0, 0, 0, 0, ''),
(24, 'Accer_N2', 8, 'Details\r\n\r\nModel - Acer Switch SW1-011, Processor - Intel Atom X5-Z83002M, Processor Clock Speed - 1.44GHz-1.84GHz, CPU Cache - 2MB, Display Size - 10.1", Display Type - LED, Display Resolution - 1280 x 800, RAM - 2GB Onboard, RAM Type - DDR3L, HDD - 32GB eMMC, 500GB, Graphics Chipset - Intel? HD Graphics, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reader, Display Port - HDMI, Audio Port - Combo, USB Port - 1 x USB3.0, 1 x USB2.0, Battery - 2-cell, Backup Time - Up to 5.5 hrs backup, Operating System - Win-10 Home, Weight - 1.26 kg, Color - Grey, Others - LED Multi-touch Screen, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '24', 'Accer_N2.jpg', '24000.00', '', 0, 0, 0, 0, ''),
(25, 'Accer_N3', 8, 'Details\r\n\r\nModel - Acer Predator G9-793, Processor - Intel Core i7 7700HQ, Generation - 7th Gen, Processor Clock Speed - 2.8-3.8GHz, CPU Cache - 6MB, Display Size - 17.3", Display Type - FHD Display, Display Resolution - 1920 x 1080, RAM - 16GB, RAM Type - DDR4, RAM Slot - 4, Max RAM Support - 64GB, HDD - 1TB HDD + 128GB SSD, Graphics Chipset - NVIDIA Geforce GTX 1060, Graphics Memory - 6GB GDDR5, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, HD Webcam, Display Port - HDMI, USB Port - 4 x USB3.0, 1 x USB3.1 Type C, Battery - 8 Cell Li-Ion, Backup Time - Up to 3 Hrs., Operating System - Free Dos, Weight - 9.26lbs, Color - Abyssal Black, Part No - NH.Q1VSI.003, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '25', 'Accer_N3.jpg', '160500.00', '', 0, 0, 0, 0, ''),
(26, 'Dell_N1', 8, 'Details\r\n\r\nModel - Dell INSPIRON 15-5567, Processor - 7th Gen Intel Core i7 7500U, Processor Clock Speed - 2.70GHz, CPU Cache - 4MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - AMD RADEON R7 M445, Graphics Memory - 4GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 3 Cell Prismatic, Backup Time - Up to 4 Hrs., Operating System - Free DOS, Weight - 2.30Kg, Color - FOG-GRAY, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '26', 'Dell_N1.jpg', '64000.00', '', 0, 0, 0, 0, ''),
(27, 'Dell_N2.jpg', 8, 'Details\r\n\r\nModel - Dell Inspiron 13-5368, Processor - Intel Core I3 6100U, Generation - 6th Gen, Processor Clock Speed - 2.30GHz, CPU Cache - 3MB, Display Size - 13.3", Display Type - Touch LED Display, Display Resolution - 1920 x 1080, RAM - 4GB, RAM Type - DDR4, HDD - 1TB HDD, Graphics Chipset - Intel HD 520, Graphics Memory - Shared, Networking - LAN, WiFi, Bluetooth, Card Reade, HD Webcame, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 3 Cell, Backup Time - Up to 4 Hrs., Operating System - Free Dos, Weight - 1.62Kg, Color - Gray, Warranty - 2 year (Battery, Adapter 1 year)\r\n', '27', 'Dell_N2.jpg', '50000.00', '', 0, 0, 0, 0, ''),
(29, 'Dell XPS 13', 4, 'Dell XPS 13Dell XPS 13Dell XPS 13Dell XPS 13', '29', 'DellXPS13.jpg', '76090.00', '', 0, 0, 0, 0, ''),
(3, 'PC_G2R7-3', 5, 'Details\r\n\r\nModel - PC H177-2, Processor - Intel Kaby Lake Core i7 7700 3.60-4.20GHz 8MB Cache, RAM - G.Skill Trident Z 8GB, Chipset - Gigabyte GA-Z270-Gaming K3 DDR4, RAM Type - DDR4 3200MHz, HDD - Toshiba DT01ACA300V 3TB, HDD Type - SATA 5400RPM, Monitor Type - LED Monitor, Monitor Brand & Size - HP LV2011 20 inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - Onboard, Audio - Onboard, Speaker - Logitech X50 Mobile Boombox Yellow Speaker, Keyboard - A4 Tech KR-85 USB Bangla Keyboard, Mouse - A4 Tech OP-620D USB Optical Mouse, Casing - Delux DLC-MV888 ATX Casing, Others - Mouse Pad, Dust Cover\r\n', '3', 'PC_G2R7-3.jpg', '64450.00', '', 0, 0, 0, 0, ''),
(60, 'Dell_N3', 8, 'Details  Model - Acer Aspire V3-574G, Processor - 5th Gen. Intel Core i7 5500U, Processor Clock Speed - 2.40-3.0GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR3L, HDD - 1TB HDD, Graphics Chipset - Nvidia Geforce 940M, Graphics Memory - 2GB, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, WebCam, Display Port - HDMI, VGA, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, Battery - 4 Cell Lithium-ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.40Kg, Color - Black Silver, Warranty - 1 year', '30', 'Dell_N3.jpg', '50000.00', '', 7, 2, 7, 14.5, 'Dell'),
(4, 'PC_G2R7-4', 5, 'Details\r\n\r\nModel - PC H1C0-1, Processor - Built-In, RAM - Cheval 4GB, Chipset - Asus N3050I-C Intel Celeron processor & Mainboard, RAM Type - DDR3 1600 BUS, HDD - Toshiba DT01ACA050 500GB, HDD Type - SATA 7200RPM, Monitor Type - Wide Screen LED, Monitor Brand & Size - HP V194 18.5", Optical Device - Asus DRW-24D5MT 24X, Graphics - Onboard, Audio - Onboard, Speaker - Microlab B 16 (2.0) Speaker, Keyboard - Delux DLK-6010U Keyboard, Mouse - Delux DLM-137BU Optical USB Mouse, Casing - Space 180F ATX\r\n', '4', 'PC_G2R7-4.jpg', '22000.00', '', 0, 0, 0, 0, ''),
(5, 'PC_G2R7-5', 5, 'Details\r\n\r\nModel - PC H134-1, Processor - Intel Core i3 4170 3.70GHz 3MB Cache, RAM - Cheval 4GB, Chipset - Gigabyte GA-H81M-S2PV-WP DDR3, RAM Type - DDR3 1600 BUS, HDD - Toshiba DT01ACA050 500GB, HDD Type - SATA, Monitor Type - LED Monitor, Monitor Brand & Size - Samsung S19F350 18.5 Inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - Onboard, Audio - Onboard, Speaker - Creative Basic SBS A120 Speaker, Keyboard - A4 Tech KR-85 USB Bangla Keyboard, Mouse - A4 Tech OP-620D USB Optical Mouse, Casing - Space 180F ATX Casing\r\n', '5', 'PC_G2R7-5.jpg', '33000.00', '', 0, 0, 0, 0, ''),
(6, 'PC_G2R7-6', 5, 'Details\r\n\r\nModel - PC G157-1, Processor - Intel Kaby Lake Core i5 7500, 3.40-3.80GHz, RAM - G.Skill Ripjaws V 8GB, Chipset - Asus ROG STRIX B250F GAMING, RAM Type - DDR4 2400 BUS, HDD - Toshiba DT01ACA100 1TB, HDD Type - SATA, Monitor Type - LED Borderless Monitor, Monitor Brand & Size - Dell S2216H 21.5", Optical Device - Liteon 24X Dual Layer, Graphics - ZOTAC GeForce GTX 1050, 2GB, Audio - OnBoard, Speaker - Microlab M-108 2:1, Keyboard - A4 Tech B328 Bloody Gaming keyboard, Mouse - A4 Tech Bloody V3M Gamming mouse, Casing - In Win G7 Mid Tower Glass Window Gaming, Power Supply - Thermaltake SPS-530MPCBEU Smart SE 530W Modular Power Supply, Cooler - Thermaltake CLP0587 Frio\r\n', '6', 'PC_G2R7-6.jpg', '72000.00', '', 0, 0, 0, 0, ''),
(7, 'PC_G2R7-7', 5, 'Details\r\n\r\nModel - PC H137-1, Processor - Intel Kaby Lake Core i3 7100, RAM - G.Skill 4GB, Chipset - Gigabyte GA-GAMING B8, RAM Type - DDR4 2400 BUS, HDD - Toshiba DT01ACA100 1TB, HDD Type - SATA 7200RPM, Monitor Type - LED Monitor, Monitor Brand & Size - Dell E2016HV 19.5 Inch, Optical Device - Liteon 24X, Speaker - Creative SBS A60, Keyboard - Logitech K120 ENU AP Bangla Keyboard, Mouse - Logitech B100 Optical USB Mouse, Casing - Space 2101, Others - Installation and Customization, Mouse Pad, Dust Cover\r\n', '7', 'PC_G2R7-7.jpg', '38000.00', '', 0, 0, 0, 0, ''),
(8, 'PC_G2R7-8', 5, 'Details\r\n\r\nModel - PC B176-1, Processor - Intel Skylake Core i7 6700K 4.0GHz 8MB Cache, RAM - G.Skill Ripjaws V 16GB, Chipset - MSI Z170A gaming M5 DDR4, RAM Type - DDR4 2400 Bus, HDD - Toshiba DT01ACA200 2TB, HDD Type - SATA, Monitor Type - IPS Panel Monitor with Built-in Speaker, Monitor Brand & Size - LG 22MP68VQ-P 21.5 Inch, Optical Device - Asus DRW-24D5MT 24X, Graphics - ZOTAC GeForce GTX 1050 Ti Edition 4GB GDDR5, Audio - Onboard, Speaker - F&D A520U 2.1 Multimedia Speaker, Keyboard - A4 Tech KR-85 USB Bangla Keyboard, Mouse - A4 Tech OP-620D USB Optical Mouse, Casing - Thermaltake VO700A1N3N Versa II Black Casing, Power Supply - Thermaltake SPS-630MPCBEU Smart SE 630W Modular Power Supply, Cooler - Thermaltake CLP0607 NIC C4 (120mm) Air CPU Cooler\r\n', '8', 'PC_G2R7-8.jpg', '105000.00', '', 0, 0, 0, 0, ''),
(9, 'Accer_A21', 4, 'Details\r\n\r\nModel - Acer Aspire F5-573, Processor - 7th Gen Intel Core i5 7200U, Processor Clock Speed - 2.5-3.10GHz, CPU Cache - 3MB, Display Size - 15.6", Display Type - LED Display, RAM - 8GB, RAM Type - DDR4, HDD - 2TB HDD, Graphics Chipset - Intel HD 520, Graphics Memory - Shared, Optical Device - DVD RW, Networking - LAN, WiFi, Bluetooth, Card Reader, Webcam, Display Port - HDMI, Audio Port - Combo, USB Port - 2 x USB3.0, 1 x USB2.0, 1 x USB Type-C, Keyboard Back-lit - Yes, Battery - 4 Cell Lithium Ion, Backup Time - Up to 4.5 Hrs., Operating System - Free Dos, Weight - 2.30Kg, Color - Sparkly Silver, Warranty - 2 year (Battery, Adapter 1 year) for sell from 11 Feb 2017 and 1 year (before 11 Feb 2017), Part No - NX.GD7SI.003 / NX.GD7SI.012\r\n', '9', 'Accer_A21', '47000.00', '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `vcomments`
--

CREATE TABLE `vcomments` (
  `c_id` int(11) NOT NULL,
  `c_date` date NOT NULL,
  `v_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `message` longtext NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vcommentvotes`
--

CREATE TABLE `vcommentvotes` (
  `videovote_id` int(11) NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `v_id` int(11) NOT NULL,
  `liked` int(11) NOT NULL,
  `disliked` int(11) NOT NULL
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
(5, 'Dell 7560', '2017-05-09', 'https://www.youtube.com/embed/oNN7bhazTEY', 1, 0),
(6, 'Dell Inspiron 7000', '2015-06-17', 'https://www.youtube.com/embed/G5vZfGxNSzA', 3, 0),
(7, 'Apple MacBook Pro 13', '2016-10-20', 'https://www.youtube.com/embed/zKbnsAh27Qc', 1, 3),
(8, 'Macbook Air', '2017-04-19', 'https://www.youtube.com/embed/d_U7NT-oVas', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vvotes`
--

CREATE TABLE `vvotes` (
  `vv_id` int(11) NOT NULL,
  `v_id` int(11) NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `liked` int(11) NOT NULL,
  `disliked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vvotes`
--

INSERT INTO `vvotes` (`vv_id`, `v_id`, `customer_id`, `liked`, `disliked`) VALUES
(6, 6, 'rupok@gmail.com', 1, 0),
(7, 7, 'rupok@gmail.com', 0, 1),
(8, 7, 'miraz@gmail.com', 1, 0),
(9, 8, 'himu@gmail.com', 1, 0),
(13, 5, 'hasan@gmail.com', 1, 0),
(19, 8, 'hasan@gmail.com', 0, 1),
(21, 6, 'hasan@gmail.com', 1, 0),
(24, 7, 'hasan@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment on news`
--
ALTER TABLE `comment on news`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `customer_id` (`customer_id`);

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
  ADD PRIMARY KEY (`NewsID`),
  ADD KEY `Modified_By` (`Modified_By`);

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
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `vcommentvotes`
--
ALTER TABLE `vcommentvotes`
  ADD PRIMARY KEY (`videovote_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `username` (`customer_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `vvotes`
--
ALTER TABLE `vvotes`
  ADD PRIMARY KEY (`vv_id`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `username` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comment on news`
--
ALTER TABLE `comment on news`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `commentvotes`
--
ALTER TABLE `commentvotes`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `products_list`
--
ALTER TABLE `products_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `vcomments`
--
ALTER TABLE `vcomments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `vvotes`
--
ALTER TABLE `vvotes`
  MODIFY `vv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`Modified_By`) REFERENCES `customer` (`email`);

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
  ADD CONSTRAINT `vcommentvotes_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`email`);

--
-- Constraints for table `vvotes`
--
ALTER TABLE `vvotes`
  ADD CONSTRAINT `vvotes_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `video` (`v_id`),
  ADD CONSTRAINT `vvotes_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
