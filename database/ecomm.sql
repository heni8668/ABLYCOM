-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 10:31 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `slug`, `content`) VALUES
(1, 'Who We Are ?', 'who-we-are', '<p>&nbsp;</p>\r\n\r\n<p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray</p>\r\n\r\n<p>gleams steal into the inner sanctuary, I throw myself down among the tall grass by the trickling stream; and, as I lie close to the earth, a thousand unknown plants are noticed by me .<br />\r\nwhen I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects and flies, then I feel the presence .</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 12, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(10, 'AC Motors', 'ac'),
(11, 'DC Motors', 'dc'),
(12, 'Diode', 'diode'),
(13, 'Integrated Circuits (IC)', 'ic'),
(14, 'Mechines', 'mechines'),
(15, 'Power Supplies', 'power');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(14, 9, 11, 2),
(15, 9, 13, 5),
(16, 9, 3, 2),
(17, 9, 1, 3),
(18, 10, 13, 3),
(19, 10, 2, 4),
(20, 10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subid` int(50) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subid`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`, `location`) VALUES
(35, 10, 17, '1500 Series Wound Motor, Up to 80V', '<ul>\r\n	<li>Current 130 A</li>\r\n	<li>Voltage Up to 80V</li>\r\n	<li>Speed 1500</li>\r\n	<li>Frequency 50/60 HZ</li>\r\n</ul>\r\n', '1500-series-wound-motor-up-80v', 1200, '1500-series-wound-motor-up-80v.jpg', '2022-07-30', 2, 'tgerwte'),
(36, 11, 18, '0.25 Kw Three Phase DC Series Motor, Voltage: 320 V, 1440 Rpm', '<ul>\r\n	<li><strong>Speed </strong>1440 RPM</li>\r\n	<li><strong>Power </strong>0.25 kW</li>\r\n	<li><strong>Voltage </strong>320 V</li>\r\n</ul>\r\n', '0-25-kw-three-phase-dc-series-motor-voltage-320-v-1440-rpm', 2000, '0-25-kw-three-phase-dc-series-motor-voltage-320-v-1440-rpm.jpg', '2022-07-30', 1, 'Addis Ababa'),
(37, 11, 19, '28BYJ-48 5V Mini Stepper Motor', '<ul>\r\n	<li>Rated voltage supply +5V</li>\r\n	<li>No of phase 4</li>\r\n	<li>Stride angle <em>5.625&deg;/64</em></li>\r\n	<li>Speed variation <em>ratio 1/64</em></li>\r\n	<li>Pull-in torque <em>300 gf.cm</em></li>\r\n	<li>Friction torque <em>600-1200 gf.cm</em></li>\r\n</ul>\r\n', '28byj-48-5v-mini-stepper-motor', 9000, '28byj-48-5v-mini-stepper-motor.jpg', '2022-07-22', 1, 'Addis Ababa'),
(38, 11, 19, '50 W Electric PMDC Motor, 220-440 V', '<ul>\r\n	<li>Power Source Electric</li>\r\n	<li>Speed (RPM) 5 to 10,000 RPM</li>\r\n	<li>Voltage 220-440 V</li>\r\n	<li>Power 50 W</li>\r\n</ul>\r\n', '50-w-electric-pmdc-motor-220-440-v', 3400, '50-w-electric-pmdc-motor-220-440-v.png', '2022-07-13', 0, 'Bahirdar'),
(39, 15, 23, 'process control trainer', '<p>The PCT-100, Process Control Trainer, is a fully integrated, self-contained bench top apparatus consisting of a Process Module, and a Control Console with a built in power supply.</p>\r\n', 'process-control-trainer', 3000, 'process-control-trainer.png', '2022-07-30', 2, 'Adama'),
(40, 12, 24, 'M7 Diode', '<ul>\r\n	<li>Voltage 1000V</li>\r\n	<li>Current 1.0A</li>\r\n	<li>Maximum DC Blocking Voltage 50VDC</li>\r\n	<li>Maximum Repetitive Peak Reverse Voltage</li>\r\n</ul>\r\n', 'm7-diode', 400, 'm7-diode.jpg', '2022-07-30', 3, 'Hawasa'),
(41, 12, 24, 'Silicon NPN Phototransistor, RoHS Compliant', '<p>BPW77 is a silicon NPN phototransistor with high radiant<br />\r\nsensitivity in hermetically sealed TO-18 package with base<br />\r\nterminal and glass lens. It is sensitive to visible</p>\r\n', 'silicon-npn-phototransistor-rohs-compliant', 5000, 'silicon-npn-phototransistor-rohs-compliant.jpg', '2022-07-30', 2, 'Hawasa'),
(42, 10, 25, '<2000 RPM PMDC Motor, Voltage: <100 V', '<p><strong>Product Specification</strong></p>\r\n\r\n<ul>\r\n	<li>Voltage &lt;100 V</li>\r\n	<li>Power Source DC MOTOR</li>\r\n	<li>Speed &lt;2000 RPM</li>\r\n	<li>Power 50-150 W</li>\r\n	<li>Commutation Brush</li>\r\n	<li>Output Power 30-400W</li>\r\n</ul>\r\n', '2000-rpm-pmdc-motor-voltage-100-v', 1200, '2000-rpm-pmdc-motor-voltage-100-v.jpg', '2022-07-30', 0, 'fdsdf'),
(44, 13, 21, 'ewreq', '<p>tdsfdg</p>\r\n', 'ewreq', 4532, 'ewreq.png', '2022-07-30', 1, 'rewr');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `slug` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`, `slug`, `photo`) VALUES
(7, 'Project2', '<p><strong>DESCRIPTION</strong><br />\r\nBPW77 is a silicon NPN phototransistor with high radiant<br />\r\nsensitivity in hermetically sealed TO-18 package with base<br />\r\nterminal and glass lens. It is sensitive to visible and near<br />\r\ninfrared radiation.</p>\r\n\r\n<p><strong>FEATURES</strong><br />\r\n&bull; Package type: leaded<br />\r\n&bull; Package form: TO-18<br />\r\n&bull; Dimensions (in mm): &Oslash; 4.7<br />\r\n&bull; High photo sensitivity<br />\r\n&bull; High radiant sensitivity<br />\r\n&bull; Suitable for visible and near infrared radiation<br />\r\n&bull; Fast response times<br />\r\n&bull; Angle of half sensitivity: Ï• = &plusmn; 10&deg;<br />\r\n&bull; Base terminal connected<br />\r\n&bull; Hermetically sealed package<br />\r\n&bull; Lead (Pb)-free component in accordance with<br />\r\nRoHS 2002/95/EC and WEEE 2002/96/EC</p>\r\n\r\n<p><strong>APPLICATIONS</strong><br />\r\n&bull; Detector in electronic control and drive circuits</p>\r\n', 'project2', 'project2_1659168344.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(9, 9, 'PAY-1RT494832H294925RLLZ7TZA', '2018-05-10'),
(10, 9, 'PAY-21700797GV667562HLLZ7ZVY', '2018-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE `sub_catagory` (
  `id` int(50) NOT NULL,
  `sid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`id`, `sid`, `name`) VALUES
(17, 10, 'Sub AC '),
(18, 11, 'Sub DC'),
(19, 11, 'Sub DC2'),
(21, 13, 'Sub IC'),
(23, 15, 'Sub Power'),
(24, 12, 'Sub Diode'),
(25, 10, 'Sub AC 2');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `slug` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `name`, `description`, `slug`, `photo`) VALUES
(5, 'Training1', '<p><strong>Product Specification</strong></p>\r\n\r\n<ul>\r\n	<li>Voltage &lt;100 V</li>\r\n	<li>Power Source DC MOTOR</li>\r\n	<li>Speed &lt;2000 RPM</li>\r\n	<li>Power 50-150 W</li>\r\n	<li>Commutation Brush</li>\r\n	<li>Output Power 30-400W</li>\r\n</ul>\r\n', 'training1', 'training1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `role` varchar(100) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `role`, `activate_code`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$s7BePXTo.mSJyAG0D2SR.O7xiqRR7AhMdojTVFhmrJPnAaHpwVCQy', 1, 'Ably', 'Electronics', '', '', 'logo.png', 1, '', '', 'mANIhOBSZxcnUjw', '2018-05-01'),
(9, 'zeru@gmail.com', '$2y$10$VyLZr4Rivrt.WLXhVVvByO2uZcZku4tECdpcz1pXJOI8QcFsIr80a', 0, 'Zeru', 'Kibret', 'Addis Ababa City', '0935964964', 'IMG_9624===1122.jpg', 1, '', 'k8FBpynQfqsv', 'wzPGkX5IODlTYHg', '2018-05-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
