-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2024 at 11:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpage`
--

-- --------------------------------------------------------

--
-- Table structure for table `services_products`
--

CREATE TABLE `services_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_products`
--

INSERT INTO `services_products` (`id`, `user_id`, `img_url`, `description`) VALUES
(1, 1, 'https://dreammakeup.in/wp-content/uploads/2024/10/Rhode-Summer-Peptide-Lip-Tints-1200x1200.webp', 'Lip Tints'),
(2, 1, 'https://media.glamour.com/photos/62a0cf615aa782c8a2b9c2cb/master/w_1600%2Cc_limit/RHODE%2520PRPDUCT%2520SHOOT2313.jpg', 'Skincare Kit'),
(3, 1, 'https://berrymenic.com/wp-content/uploads/2024/09/IMG-7062.webp.jpeg', 'Cheek Blush'),
(10, 4, 'https://static.zara.net/assets/public/ba80/c1b4/e739476ebe1f/3c7648abf625/06045333406-p/06045333406-p.jpg?ts=1721664397193', 'Women section'),
(11, 4, 'https://static.zara.net/assets/public/911f/d69c/e5d94404bf49/0ab516dcb052/01564301800-p/01564301800-p.jpg?ts=1722326156430&w=560', 'Men section'),
(12, 4, 'https://i.pinimg.com/236x/a4/c1/10/a4c110191455c087793a2e4d5786f403.jpg', 'Kids section'),
(19, 7, 'https://preview.redd.it/what-netflix-films-would-earn-the-most-money-if-they-all-v0-hdmcxj2i77ia1.jpg?auto=webp&s=4b0b395d9f93105dd2fc42fdc8ad7284c0e487b3', 'Movies'),
(20, 7, 'https://executiveheadlines.com/_next/image?url=https%3A%2F%2Fheadlines.executiveheadlines.com%2Fadmin%2Fmedia%2F1694325356.webp&w=2048&q=75', 'Series'),
(21, 7, 'https://navrangashoka.wordpress.com/wp-content/uploads/2020/10/netflixcartoons.jpg?w=1200', 'Cartoons');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `about_you` text NOT NULL,
  `phone` int(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `service_type` enum('services','products') NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `twitter_link` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `cover_image`, `main_title`, `subtitle`, `about_you`, `phone`, `location`, `service_type`, `linkedin_link`, `facebook_link`, `twitter_link`, `google_link`) VALUES
(1, 'https://cdn.shopify.com/s/files/1/0606/5451/8510/files/Cover-Image.jpg?v=1655295019', 'Rhode', 'Rhode Cosmetics by Hailey Bieber', 'Rhode is a line of curated skincare essentials. Formulated for a variety of skin types and needs with high performance ingredients.', 123456789, 'New York, USA', 'products', 'https://www.linkedin.com/company/rhodeskin/', 'https://www.facebook.com/rhode', 'https://x.com/SkincareRhode', 'https://www.google.com/search?client=safari&rls=en&q=rhode&ie=UTF-8&oe=UTF-8'),
(4, 'https://wallpapersok.com/images/high/aesthetic-zara-fashion-boutique-mzzwbc9bp3d4cs3u.jpg', 'ZARA', 'Clothing brand', 'Zara is a fashion retail subsidiary of the Spanish multinational fashion design, manufacturing, and retailing group Inditex. Zara sells clothing, accessories, beauty products and perfumes. The head office is located at Arteixo in the province of A Coruña, Galicia. In 2020 alone, it launched over twenty new product lines.', 306002, 'New York, USA', 'products', 'https://www.linkedin.com/company/zara-usa/', 'https://www.facebook.com/Zara', 'https://x.com/zara?lang=ar', 'https://www.zara.com'),
(7, 'https://wallpapersok.com/images/hd/netflix-aesthetic-popcorn-z16yswlqxnwom6wk.jpg', 'Netflix', 'Movie & TV shows', 'Unlimited movies, TV shows, and more\r\nStarts at EUR 4.99. Cancel anytime.', 123456789, 'Chicago, USA', 'services', 'https://www.linkedin.com/company/netflix/', 'https://www.facebook.com/netflix', 'https://x.com/netflix', 'https://www.netflix.com/mk/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services_products`
--
ALTER TABLE `services_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services_products`
--
ALTER TABLE `services_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services_products`
--
ALTER TABLE `services_products`
  ADD CONSTRAINT `services_products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
