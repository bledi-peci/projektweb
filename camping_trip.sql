-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2024 at 01:23 PM
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
-- Table structure for table `about_us_data`
--

CREATE TABLE `about_us_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us_data`
--

INSERT INTO `about_us_data` (`id`, `title`, `description`, `image_url`) VALUES
(1, 'Welcome to Camping Trip', 'Welcome to Camping Trip\r\n\r\nCamping Trip embarked on its journey in 2015 with a mission to make camping adventures accessible to all. Our team is comprised of outdoor enthusiasts who are passionate about helping people experience the beauty of the great outdoors.\r\n\r\nOver the years, we have achieved significant milestones, becoming a trusted name in the camping industry. We pride ourselves on our commitment to providing top-quality camping gear, exceptional customer service, and fostering a sense of community among campers.\r\n\r\nOur Philosophy\r\n\r\nAt Camping Trip, we believe in the core values of adventure, affordability, and quality. These principles guide us in creating camping gear that is not only reliable but also budget-friendly, ensuring that everyone can enjoy the thrill of camping.\r\n\r\nMeet the Team\r\n\r\n- Bledi Peci: As our founder and chief adventurer, Bledi brings a wealth of outdoor experience and a deep love for nature to the team.\r\n\r\n- Jon Rafuna: Our head of product development, Jon, is dedicated to designing innovative and durable camping gear that enhances the camping experience.\r\n\r\nJoin Our Journey\r\n\r\nWe\'re always looking to expand our horizons and explore new camping destinations. If you share our passion for camping and outdoor exploration, we\'d love to have you join us. Together, we\'ll continue to provide camping enthusiasts with the tools they need to embark on unforgettable Camping Trips.\r\n', './assets/uploads/aboutus.jpg');

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_by`, `created_at`) VALUES
(129, 'Best supplies for camping', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', '/assets/uploads/camp-gear.jpg', 129, '2024-01-30 10:44:41'),
(130, 'A weekend with Camping Trip', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', 'assets/uploads/65b8d44521034.jpeg', 130, '2024-01-30 10:49:41');

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
(8, 'Tent 2', 'Spacious Interior: Experience the perfect balance between coziness and\r\n        ample space. The interior of the tent is roomy enough to comfortably\r\n        accommodate your sleeping gear while providing sufficient headroom,\r\n        allowing you to move freely and enjoy your time indoors. Ventilation\r\n        Mastery: Our tent is equipped with strategically placed ventilation\r\n        panels and mesh windows to enhance airflow and minimize condensation.\r\n        Say goodbye to stuffiness and hello to a refreshing, breathable\r\n        environment that connects you to the natural world.', '/assets/uploads/tent2.jpeg', NULL, 129, '2024-01-23 13:52:14'),
(9, 'Tent 3', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', '/assets/uploads/tent3.jpg', NULL, 129, '2024-01-23 13:52:14'),
(10, 'Tent 4', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', '/assets/uploads/camp-gear.jpg', NULL, 129, '2024-01-23 13:52:14'),
(12, 'Tent 5', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', '/assets/uploads/hero-image.jpg', NULL, 130, '2024-01-24 22:35:06'),
(14, 'Tent 6', 'Easy Setup: No need to be a seasoned outdoorsman to pitch this tent.\r\n        The intuitive design and color-coded components make setup a breeze,\r\n        ensuring that you spend less time assembling and more time soaking in\r\n        the beauty of your surroundings. Adaptable for All Seasons: Whether\r\n        you\'re camping in the warm embrace of summer or braving the crisp\r\n        chill of winter, the VentureRise Expedition Tent is your reliable\r\n        companion. With its versatile design, it adapts to diverse climates,\r\n        keeping you comfortable year-round. Innovative Storage Solutions:\r\n        Thoughtfully integrated pockets and gear loft provide convenient\r\n        storage options, keeping your essentials organized and within arm\'s\r\n        reach. Now you can focus on your adventure without the hassle of\r\n        rummaging through your belongings.', 'assets/uploads/65b194033c14a.png', NULL, 130, '2024-01-24 22:49:39');

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
(129, 'blerimhasani', 'blerim123', 'blerimhasani@gmail.com', 'user', '2024-01-10 16:48:01', 'Blerim Hasani', 'male', '2024-01-12'),
(130, 'daolinajeti', '$2y$10$xhTOeI8AHQSqviML3ZQFBebEK3sMpMbJypj4wdbXyS1dhYJ7y98gG', 'daolinajeti@gmail.com', 'admin', '2024-01-24 14:49:12', 'Daolin Ajeti', 'female', '2024-01-15'),
(131, 'artonsopjani', '$2y$10$AAMg1LtCihB1OXbiBiJmDubKk5o/pewkJzQBd6OOVTcXOo4NwYX7i', 'artonsopjani@gmail.com', 'user', '2024-01-24 21:40:35', 'Arton Sopjani', 'male', '2024-01-16'),
(132, 'astritpeci', '$2y$10$K7EfbTNc0CdVKN6EE8ubruz1gdJzEyBFXGRwm6VhLgRHCEeTGY4SW', 'astritpeci@gmail.com', 'user', '2024-01-30 11:49:21', 'Astrit Peci', 'male', '2024-01-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us_data`
--
ALTER TABLE `about_us_data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `about_us_data`
--
ALTER TABLE `about_us_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_inquiries`
--
ALTER TABLE `contact_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

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
