-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2021 at 06:53 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_php_001`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint NOT NULL,
  `author_name` varchar(180) NOT NULL,
  `dob` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `dob`, `created_at`) VALUES
(1, 'Robin Sharma', '1989-09-03', '2021-03-18 18:18:55'),
(2, 'Test001', '1981-03-02', '2021-03-18 18:17:07'),
(3, 'Test002', '1984-03-18', '2021-03-18 18:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` bigint NOT NULL,
  `book_publisher` int DEFAULT NULL,
  `book_edition` varchar(20) DEFAULT NULL,
  `book_year` year NOT NULL,
  `book_language` varchar(20) DEFAULT NULL,
  `book_description` varchar(45) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_author`, `book_publisher`, `book_edition`, `book_year`, `book_language`, `book_description`, `is_available`, `created_at`) VALUES
(1, 'the 5 am club', 1, 2, '1st', 2015, NULL, NULL, 1, '2021-02-24 19:09:00'),
(2, 'Test001', 2, 2, '1', 2015, NULL, NULL, 1, '2021-02-24 19:17:24'),
(3, 'Test002', 2, 3, '1', 2016, NULL, NULL, 1, '2021-02-24 19:17:24'),
(4, 'Book 001', 2, NULL, NULL, 2021, 'English', 'Description 001', 1, '2021-03-10 19:30:04'),
(5, 'Book 003', 2, NULL, NULL, 2021, 'English', 'Description 001', 1, '2021-03-10 19:30:21'),
(6, 'Book 002', 3, NULL, NULL, 2023, 'english', 'description 002', 1, '2021-03-10 19:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_country` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `publisher_name`, `publisher_country`, `created_at`) VALUES
(2, 'Claude Publishing', 'Lebanon', '2021-02-24 19:15:52'),
(3, 'Ralph Publishing House', 'Lebanon', '2021-02-24 19:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Amin', 'amin@amin.com', '+96171222222'),
(2, 'David', 'david@amin.com', '+96171222223');

-- --------------------------------------------------------

--
-- Table structure for table `user_rental`
--

CREATE TABLE `user_rental` (
  `id` bigint NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `book_id` bigint DEFAULT NULL,
  `date_picked` datetime DEFAULT NULL,
  `date_to_return` datetime DEFAULT NULL,
  `date_returned` datetime DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_rental`
--

INSERT INTO `user_rental` (`id`, `user_id`, `book_id`, `date_picked`, `date_to_return`, `date_returned`, `is_available`) VALUES
(1, 1, 1, NULL, NULL, NULL, 0),
(2, 2, 2, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_publisher_index` (`book_publisher`),
  ADD KEY `fk_book_author` (`book_author`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_rental`
--
ALTER TABLE `user_rental`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_index` (`user_id`),
  ADD KEY `book_index` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_rental`
--
ALTER TABLE `user_rental`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `book_publisher_index` FOREIGN KEY (`book_publisher`) REFERENCES `publishers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_book_author` FOREIGN KEY (`book_author`) REFERENCES `authors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_rental`
--
ALTER TABLE `user_rental`
  ADD CONSTRAINT `book_index` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `user_index` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
