-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2017 at 03:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restaurant_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bread`
--

CREATE TABLE IF NOT EXISTS `Bread` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `content` text,
  `picture` varchar(100) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bread`
--

INSERT INTO `Bread` (`id`, `title`, `price`, `content`, `picture`, `availability`) VALUES
(1, 'Naan', '30.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li></li>\r\n<li>7g dried active baking yeast</li>\r\n<li>1 1/2 teaspoons dried active baking yeast</li>\r\n<li>225ml warm water</li>\r\n<li>250g flour</li>\r\n<li>1 teaspoons salt</li>\r\n<li>4 tablespoons caster sugar</li>\r\n<li>140ml water</li>\r\n<li>3 tablespoons milk</li>\r\n<li>2 tablespoons ghee</li>\r\n<li>1 egg, beaten</li>\r\n<li>2 tsp salt</li>\r\n<li>800g flour</li>\r\n<li>2 cloves garlic, minced (optional)</li>\r\n<li>50g butter, melted</li>\r\n</ul>', 'Naand19a98cd-4025-45dc-83bb-c7d668f18b94.jpg', 1),
(2, 'Kalonji Naan', '25.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>175ml warm water (45 degrees C)</li>\r\n<li>1 teaspoon dried active baking yeast</li>\r\n<li>1 teaspoon caster sugar</li>\r\n<li>250g plain flour</li>\r\n<li>1 teaspoon salt</li>\r\n<li>4 tablespoons ghee</li>\r\n<li>2 tablespoons plain curd</li>\r\n<li>2 teaspoons kalonji (onion seed)</li>\r\n</ul>', 'Kalonji Naanc6e8976e-fc80-4e22-9321-10bce4cc0867.jpg', 1),
(3, 'Stuffed Gobhi Paratha', '30.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>1 cup wheat flour</li>\r\n<li>1/2 cup water</li>\r\n<li>1/2 tsp salt</li>\r\n<li>1/2 tsp pomegrante seeds(anardana)</li>\r\n<li>1/2 tsp red chili powder</li>\r\n<li>1/2 tsp coriander powder</li>\r\n<li>1/2 tsp mango powder(amchoor)</li>\r\n<li>1/4 tsp garam masala</li>\r\n<li>1 tsp fresh ginger (crushed)</li>\r\n<li>1 sprig coriander leaves</li>\r\n<li>1 cup grated cauliflower</li>\r\n<li>1/4 tsp ajwain seeds (optional)</li>\r\n<li>vegetable oil</li>\r\n</ul>', 'Stuffed Gobhi Parathaa0eb3b28-c6c8-4c45-a652-72f1db538716.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Dessert`
--

CREATE TABLE IF NOT EXISTS `Dessert` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `content` text,
  `picture` varchar(100) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Dessert`
--

INSERT INTO `Dessert` (`id`, `title`, `price`, `content`, `picture`, `availability`) VALUES
(1, 'Key Lime Pie', '50.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>1 (9 inch) prepared graham cracker crust</li>\r\n<li>3 cups sweetened condensed milk</li>\r\n<li>1/2 cup sour cream</li>\r\n<li>3/4 cup key lime juice</li>\r\n<li>1 tablespoon grated lime zest</li>\r\n</ul>', 'Key Lime Pie231388.jpg', 0),
(2, 'Eggless Mousse', '50.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>2 bars of dark chocolate (70% cocoa solids taste best)</li>\r\n<li>284ml cream</li>\r\n</ul>', 'Eggless Moussefc374104-c771-4858-ba5d-918c41304d6e.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `MainCourse`
--

CREATE TABLE IF NOT EXISTS `MainCourse` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `content` text,
  `picture` varchar(100) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MainCourse`
--

INSERT INTO `MainCourse` (`id`, `title`, `price`, `content`, `picture`, `availability`) VALUES
(1, 'Shahi Nawabi Biryani', '200.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li></li>\r\n<li>&frac12; kg Basmati Rice (semi-cooked)</li>\r\n<li>1 kg Boneless Meat (washed and chopped into square pieces)</li>\r\n<li>500 gm Curd</li>\r\n<li>4-6 tsp Ginger-Garlic Paste</li>\r\n<li>4-6 Green Chilli</li>\r\n<li>8-10 Big Onions (sliced)</li>\r\n<li>&frac14; cup Lime Juice</li>\r\n<li>&frac12; tsp Red Chilli Powder</li>\r\n<li>&frac12; A pinch of Caraway Seeds (Shahi Zeera)</li>\r\n<li>5-6 twigs Coriander Leaves (chopped)</li>\r\n<li>5-6 twigs Mint Leaves (chopped)</li>\r\n<li>2-4 pinch Saffron,pods Cardamom, Cinnamon</li>\r\n<li>2-3 drops Saffron Color</li>\r\n<li>1-2 pods Clove</li>\r\n<li>2 cup Oil</li>\r\n<li>2 tsp Ghee</li>\r\n<li>Salt to taste</li>\r\n</ul>', 'Shahi Nawabi Biryania86c75d8-fc6a-41ce-8759-9d0ad7b486b5.jpg', 1),
(2, 'Aloo Potala Rasa', '100.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li></li>\r\n<li>12 to 15 parwal</li>\r\n<li>1 1/2 cup diced potatoes</li>\r\n<li>3/4 cup chopped onion</li>\r\n<li>3/4 cup chopped tomato</li>\r\n<li>1/4 tsp cumin seeds</li>\r\n<li>1 tbsp coriander powder</li>\r\n<li>1/2 tsp cummin powder</li>\r\n<li>1/8 tsp sugar</li>\r\n<li>1/4 tsp chilli powder</li>\r\n<li>1/4 tsp turmeric powder</li>\r\n<li>1 tsp garlic ginger paste</li>\r\n<li>1/2 tsp garam masala</li>\r\n<li>3 tbsp mustard oil (see the note)</li>\r\n<li>1/2 tsp himalayan salt or salt to taste.</li>\r\n</ul>', 'Aloo Potala Rasafae53810-2f09-40eb-b767-e672a19c38d8.jpg', 0),
(3, 'Doi Maach', '150.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>5-6 medium large rohu fish/aar/bhetki</li>\r\n<li>salt to taste</li>\r\n<li>2 teaspoon holud powder (turmeric powder)</li>\r\n<li>2-3 medium sized onions</li>\r\n<li>3-4 pods garlic</li>\r\n<li>1/2 teaspoon ginger paste</li>\r\n<li>4 tablespoons oil</li>\r\n<li>4 green chilies</li>\r\n<li>2 tablespoons plain yogurt</li>\r\n<li>10 kismis (raisins)</li>\r\n<li>1 tej pata (bay leaf)</li>\r\n<li>1/2 stick darchini (cinnamon)</li>\r\n<li>4 lobongo (cloves)</li>\r\n<li>3 choto elanch (green cardamom)</li>\r\n<li>1 teaspoon jeera powder (cumin powder)</li>\r\n<li>1 teaspoon dhone powder (coriander powder)</li>\r\n<li>1 cup water</li>\r\n<li>1 teaspoon sugar</li>\r\n</ul>', 'Doi Maach0fe6ba35-8577-4e27-a1a6-53dbb7e49821.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Starters`
--

CREATE TABLE IF NOT EXISTS `Starters` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `content` text,
  `picture` varchar(100) NOT NULL,
  `availability` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Starters`
--

INSERT INTO `Starters` (`id`, `title`, `price`, `content`, `picture`, `availability`) VALUES
(1, 'Hot N Sour Soup', '80.00', '<p>&nbsp;</p>\r\n<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>750ml chicken stock</li>\r\n<li>100ml water</li>\r\n<li>200g sliced fresh mushrooms</li>\r\n<li>50g bamboo shoots</li>\r\n<li>3 slices fresh ginger</li>\r\n<li>2 cloves garlic, crushed</li>\r\n<li>2 tsp soy sauce</li>\r\n<li>1/4 teaspoon dried crushed chillies</li>\r\n<li>500g skinless, boneless chicken breast fillets - cut into strips</li>\r\n<li>1 tablespoon sesame oil</li>\r\n<li>2 green onions, chopped</li>\r\n<li>handful chopped fresh coriander (optional)</li>\r\n<li>3 tablespoons white wine vinegar</li>\r\n<li>2 tablespoons cornflour</li>\r\n<li>1 egg, beaten</li>\r\n</ul>', 'Hot N Sour Soup005808a5-8811-46d3-996a-1cbf672e2cbf.jpg', 1),
(2, 'Vietnamese Spring Rolls', '100.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li></li>\r\n<li>50g rice vermecilli or rice noodles</li>\r\n<li>8 spring roll rice wrappers</li>\r\n<li>8 large cooked prawns - peeled, deveined and cut in half</li>\r\n<li>1 1/3 tablespoons chopped fresh Thai basil</li>\r\n<li>3 tablespoons chopped fresh mint leaves</li>\r\n<li>3 tablespoons chopped fresh coriander</li>\r\n<li>2 leaves lettuce, chopped</li>\r\n<li>4 tsp fish sauce</li>\r\n<li>50ml water</li>\r\n<li>2 tablespoons fresh lime juice</li>\r\n<li>1 clove garlic, minced</li>\r\n<li>2 tablespoons caster sugar</li>\r\n<li>1/2 teaspoon garlic chilli sauce</li>\r\n<li>3 tablespoons hoisin sauce</li>\r\n<li>1 teaspoon finely chopped peanuts</li>\r\n</ul>', 'Vietnamese Spring Rolls5c235f1d-60e4-4ce7-a75b-52b5b51bc5c8.jpg', 1),
(3, 'Black Pepper Chicken', '150.00', '<p><strong>Ingredients:</strong></p>\r\n<ul>\r\n<li>2 spoons of Garlic Paste,</li>\r\n<li>2 spoons of Ginger,</li>\r\n<li>1 bowl of Chicken pieces (Thigh and breast pieces preferably)</li>\r\n<li>Olive or any refined vegetable oil,</li>\r\n<li>Dry masalas: Cloves, Black pepper balls (handful), 4-6 Green cardamoms, 2-3 bay leaves, 2-3 Cinnamon</li>\r\n<li>salt (according to taste)</li>\r\n</ul>', 'Black Pepper Chicken57d23947-44f3-4e31-a4e8-518d84908bac.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bread`
--
ALTER TABLE `Bread`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Dessert`
--
ALTER TABLE `Dessert`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MainCourse`
--
ALTER TABLE `MainCourse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Starters`
--
ALTER TABLE `Starters`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bread`
--
ALTER TABLE `Bread`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Dessert`
--
ALTER TABLE `Dessert`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `MainCourse`
--
ALTER TABLE `MainCourse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Starters`
--
ALTER TABLE `Starters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
