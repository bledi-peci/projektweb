-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camping_trip`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiries`
--

CREATE TABLE `contact_inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_inquiries`
--

INSERT INTO `contact_inquiries` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Bledi Peci', 'bledipeci@gmail.com', 'test per admin allo123', '2024-01-23 13:58:06'),
(2, 'karapi', 'bledipehjkgjhjhci@gmail.com', 'test per admin allo123mjgjhfghfhgfg', '2024-01-23 14:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image_url`, `price`, `created_by`, `created_at`) VALUES
(7, 'Tent 1', 'Introducing the \"VentureRise Expedition Tent\": Your Gateway to\r\n        Nature\'s Embrace Embark on a journey into the great outdoors with our\r\n        cutting-edge VentureRise Expedition Tent—a pinnacle of innovation and\r\n        comfort designed for the modern explorer. Crafted with precision and\r\n        passion, this tent is more than just a shelter; it\'s a portal to\r\n        unforgettable experiences under the open sky. Durable Design: Built to\r\n        withstand the rigors of nature, the VentureRise Expedition Tent\r\n        features a rugged yet lightweight frame constructed from high-quality\r\n        aluminum alloy. The tear-resistant, waterproof fabric ensures that you\r\n        stay dry and protected in unpredictable weather conditions.', '/assets/uploads/tent1.webp', NULL, 129, '2024-01-23 13:52:14'),
(8, 'Tent 2', 'Spacious Interior: Experience the perfect balance between coziness and\r\n        ample space. The interior of the tent is roomy enough to comfortably\r\n        accommodate your sleeping gear while providing sufficient headroom,\r\n        allowing you to move freely and enjoy your time indoors. Ventilation\r\n        Mastery: Our tent is equipped with strategically placed ventilation\r\n        panels and mesh windows to enhance airflow and minimize condensation.\r\n        Say goodbye to stuffiness and hello to a refreshing, breathable\r\n        environment that connects you to the natural world.', '/assets/uploads/tent2.jpeg', NULL, 129, '2024-01-23 13:52:14'),
(9, 'Tent 3', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', '/assets/uploads/tent3.jpg', NULL, 129, '2024-01-23 13:52:14'),
(10, 'Tent 4', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', '/assets/uploads/camp-gear.jpg', NULL, 129, '2024-01-23 13:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`, `full_name`, `gender`, `birthday`) VALUES
(129, 'blerimhasani', 'blerim123', 'blerimhasani@gmail.com', 'user', '2024-01-10 16:48:01', 'Blerim Hasani', 'male', '2024-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
