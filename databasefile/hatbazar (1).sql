-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2017 at 07:26 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
(4, 'Grocery'),
(5, 'Vegetable'),
(6, 'Meets'),
(7, 'Fruits'),
(8, 'Fish');

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
(10, 'miraz', 'miraz@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1342534');

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
(32, 'mahmud@gmail.com', '422.00');

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
(1, 'Sugar', 4, 'a sweet crystallizable material that consists wholly or essentially of sucrose, is colorless or white when pure tending to brown when less refined, is obtained commercially from sugarcane or sugar beet and less extensively from sorghum, maples, and palms, and is important as a source of dietary carbohydrate and as a sweetener and preservative of other foods', '1', 'suger.jpg', '200.00'),
(10, 'jelly', 4, '', '10', 'jelly.jpg', '80.00'),
(11, 'imperial_125gm', 4, '', '11', 'imperial_125gm.jpg', '55.00'),
(12, 'honey', 4, 'Honey is the substance made when the nectar and sweet deposits from plants are gathered, modified and stored in the honeycomb by honey bees. The definition of honey stipulates a pure product that does not allow for the addition of any other substance. This includes, but is not limited to, water or other sweeteners', '12', 'honey.jpg', '200.00'),
(13, 'ghee', 4, '', '13', 'ghee.jpg', '150.00'),
(14, 'Fresh-Sugar_2kg', 4, 'A usually whitish crystalline solid, chiefly sodium chloride, used extensively in ground or granulated form as a food seasoning and preservative. Also called common salt, table salt. 2. An ionic chemical compound formed by replacing all or part of the hydrogen ions of an acid with metal ions or other cations.', '14', 'Fresh-Sugar_2kg.png', '60.00'),
(15, 'cracker', 4, '', '15', 'cracker.jpg', '200.00'),
(16, 'coffee', 4, 'Espresso is actually a method of brewing that employs hot water “pressed” through finely ground coffee. ... Espresso Roast is a specific roast to a certain degree of darkness (proprietary) to decrease the acidity and bring out the best flavor of the coffees used in the blend.', '16', 'coffee.jpg', '200.00'),
(17, 'clear_shampo', 4, 'Clear Complete Scalp Care Anti Dandruff Shampoo and Conditioner relieve your scalp. Our Cucumber and Mint infused formulas silken hair, and contain Zinc Pyrithione to help eliminate flakes. ... Massage into scalp, then rinse.', '17', 'clear_shampo.jpg', '250.00'),
(18, 'biscuit', 4, '- These biscuits have a flavor that cannot easily be placed: slightly cocoa-ish, a bit mysterious yet tasty enough to keep an eater ... Combine the sour cream and 1/4 cup of the Coca-Cola in a small bowl.', '18', 'biscuit.jpg', '30.00'),
(19, 'Bean', 5, ' The common bean, Phaseolus vulgaris, is an herbaceous annual plant in the family Fabaceae which is grown as a pulse and green vegetable. The common bean can be bushy, vine-like or climbing depending on the variety being grown.', '19', 'Bean.jpg', '25.00'),
(2, 'rice', 4, 'the starchy seeds of an annual southeast Asian cereal grass (Oryza sativa) that are cooked and used for food\r\n', '2', 'rice1.jpg', '55.00'),
(20, 'brinjal', 5, 'Eggplant (American English) or aubergine (British English), is a species of nightshade, Solanum melongena, grown for its edible fruit. Eggplant is the common name in North America and Australia, but British English uses the French word aubergine. It is known in South Asia, Southeast Asia and South Africa as brinjal.', '20', 'brinjal.jpg', '40.00'),
(21, 'cabbage', 5, '', '21', 'cabbage.jpg', '32.00'),
(22, 'carrot', 5, 'Daucus carota, is an edible, biennial herb in the family Apiaceae grown for its edible root. The carrot plant produces a rosette of 8–12 leaves above ground and a fleshy conical taproot below ground. The plant produces small (2 mm) flowers which are white, red or purple in color.', '22', 'carrot.jpg', '26.00'),
(23, 'cauliflower', 5, 'Cauliflower is one of several vegetables in the species Brassica oleracea in the genus Brassica, which is in the family Brassicaceae. ... The cauliflower head is composed of a white inflorescence meristem. Cauliflower heads resemble those in broccoli, which differs in having flower buds as the edible portion.', '23', 'cauliflower.jpg', '34.00'),
(24, 'green_brinjal', 5, 'Eggplant (American English) or aubergine (British English), is a species of nightshade, Solanum melongena, grown for its edible fruit. ... It is known in South Asia, Southeast Asia and South Africa as brinjal. The fruit is widely used in cooking.', '24', 'green_brinjal.jpg', '20.00'),
(25, 'jalpai', 5, '', '25', 'jalpai.jpg', '60.00'),
(26, 'KAKROL', 5, 'Spiny Gourd or Kantola is a vegetable, which is normally seen in the Indian markets in the season of monsoon. It has many health benefits and that is the reason why it is started to crop up all around the world besides Indian subcontinent. It has tiny spines all over its body and that is why it has got its name as “Spiny Gourd”. It is also known as Teasle gourd, Kakrol, Kankro, Kartoli, Kantoli and Bhat korola. It is mainly cultivated in the mountain regions of India. It is easily cultivated on unfertile soil and its vine has only 3 to 4 months life span.', '26', 'KAKROL.jpg', '15.00'),
(27, 'khacha_morich', 5, '', '27', 'khacha_morich.jpg', '40.00'),
(28, 'korola', 5, '', '28', 'korola.jpg', '24.00'),
(29, 'ladis_finger', 5, '', '29', 'ladis_finger.jpg', '30.00'),
(3, 'Egg', 4, 'chicken egg\r\nEgg size = Medium\r\n \r\n', '3', 'egg.jpg', '9.00'),
(30, 'lemon', 5, '', '30', 'lemon.jpg', '5.00'),
(31, 'misti_kumra', 5, '', '31', 'misti_kumra.jpg', '40.00'),
(32, 'onion', 5, '', '32', 'onion.jpg', '50.00'),
(33, 'potato', 5, '', '33', 'potato.jpg', '22.00'),
(34, 'pui_shak', 5, '', '34', 'pui_shak.jpg', '10.00'),
(35, 'ribbed gourd', 5, '', '35', 'ribbed gourd.jpg', '20.00'),
(36, 'staring bean', 5, '', '36', 'staring bean.jpg', '60.00'),
(38, 'tomato', 5, '', '38', 'tomato.jpg', '35.00'),
(4, 'soybean_oil', 4, 'Soybean oil is a vegetable oil extracted from the seeds of the soybean (Glycine max). It is one of the most widely consumed cooking oils. As a drying oil, processed soybean oil is also used as a base for printing inks (soy ink) and oil paints.', '4', 'soybean_oil.png', '500.00'),
(45, 'amloki', 7, '', '45', 'amloki.jpg', '100.00'),
(46, 'anaros', 7, '', '46', 'anaros.jpg', '20.00'),
(47, 'apple', 7, '', '47', 'apple.jpg', '150.00'),
(48, 'jackFruit', 7, '', '48', 'jackFruit.jpg', '200.00'),
(49, 'lichu', 7, '', '49', 'lichu.jpg', '200.00'),
(5, 'tea', 4, 'Tea is an aromatic beverage commonly prepared by pouring hot or boiling water over cured leaves of the Camellia sinensis, an evergreen shrub native to Asia.[3] After water, it is the most widely consumed drink in the world.[4] There are many different types of tea; some teas, like Darjeeling and Chinese greens, have a cooling, slightly bitter, and astringent flavour,[5] while others have vastly different profiles that include sweet, nutty, floral or grassy notes.', '5', 'tea.jpg', '75.00'),
(50, 'mango', 7, '', '50', 'mango.jpg', '100.00'),
(51, 'orange', 7, '', '51', 'orange.jpg', '80.00'),
(52, 'pepe', 7, '', '52', 'pepe.jpg', '70.00'),
(53, 'strawberry', 7, '', '53', 'strawberry.jpg', '150.00'),
(54, '', 7, '', '54', 'tormuj.jpg', '150.00'),
(55, 'chicken', 6, '', '55', 'chicken.jpg', '200.00'),
(56, 'Goat_Meat', 6, '', '56', 'Goat_Meat.jpg', '700.00'),
(57, 'mutton', 6, '', '57', 'mutton.jpg', '500.00'),
(58, 'bagda', 8, '', '58', 'bagda.jpg', '800.00'),
(59, 'batase', 8, '', '59', 'batase.jpg', '500.00'),
(6, 'tissue', 4, 'Biology. an aggregate of similar cells and cell products forming a definite kind of structural material with a specific function, in a multicellular organism.', '6', 'tissue.jpg', '22.00'),
(60, 'ilish', 8, '', '60', 'ilish.jpg', '1000.00'),
(61, 'koi', 8, '', '61', 'koi.jpg', '500.00'),
(62, 'rui', 8, '', '62', 'rui.jpg', '400.00'),
(63, 'shing', 8, '', '63', 'shing.jpg', '550.00'),
(64, 'tangra', 8, '', '64', 'tangra.jpg', '400.00'),
(65, 'tilapia', 8, '', '65', 'tilapia.jpg', '200.00'),
(7, 'paneer', 4, 'Paneer (pronounced [p?ni?r]) is a fresh cheese common in South Asia, especially in Indian, Pakistani, Afghan, Nepali, Sri Lankan, and Bangladeshi cuisines. It is an unaged, acid-set, non-melting farmer cheese or curd cheese made by curdling heated milk with lemon juice, vinegar, or any other food acids. Its crumbly and moist form is called chhena in eastern India and in Bangladesh.', '7', 'paneer.jpg', '150.00'),
(8, 'noodles', 4, 'Acorn noodles, also known as dotori guksu (?????) in Korean, are made of acorn meal, wheat flour, wheat germ, and salt. Olchaeng-chi guksu, meaning tadpole noodles, are made of corn soup put through a noodle maker right into cold water. It was named for its features.', '8', 'noodles.jpg', '130.00'),
(9, 'keya_soap', 4, 'Keya cosmetics ltd has been standing as an emblem of the purity and cleanliness and offering the purest and cleanest and most effective cosmetics and toiletries products to its huge and vast markets throughout home and abroad.', '9', 'keya_soap.jpg', '20.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id` (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
