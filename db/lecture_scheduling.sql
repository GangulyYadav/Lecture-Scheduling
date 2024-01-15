-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 12:52 PM
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
-- Database: `lecture_scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `batch` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `course_id`, `batch`) VALUES
(2, 8, 'Morning'),
(3, 8, 'Morning'),
(4, 8, 'Morning'),
(5, 8, 'Morning'),
(6, 15, 'Morning'),
(7, 15, 'Evening');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `level`, `description`, `image`) VALUES
(1, 'a', 'b', 'c', '../uploads/pxfuel.jpg'),
(2, 'a', 'bc', 'def', '../uploads/SKY WATER PUMP.png'),
(3, 'a', 'bc', 'def', '../uploads/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-free-vector.jpg'),
(4, 'Python', 'Begginer', 'Python course', 'python image'),
(5, 'Java', 'Intermediate', 'Learn Java', 'Java image'),
(6, 'React Js', 'Expert', 'Learn React with us', 'C:fakepathSKY WATER PUMP.png'),
(7, 'React Native ', 'Intermediate', 'Learn React Native', '../uploads/SKY WATER PUMP.png'),
(8, 'Django', 'Expert', 'In this course we are going to learn django at expert level', '../uploads/django.png'),
(9, 'Rust', 'Beginner', 'Learn Rust from beginning ', '../uploads/online-shopping-on-phone-buy-sell-business-digital-web-banner-application-money-advertising-payment-ecommerce-illustration-search-free-vector.jpg'),
(10, 'Demo', 'd', 'd', '../uploads/pxfuel.jpg'),
(11, 'Demo2', 'd', 'd', '../uploads/pxfuel.jpg'),
(12, 'NA', 'NA', 'NA', '../uploads/pxfuel.jpg'),
(13, 'NA2', 'NA', 'NA', '../uploads/Screenshot 2024-01-13 194016.png'),
(14, 'Demo3', 'NA', 'NA', '../uploads/pxfuel.jpg'),
(15, 'C', 'Expert', 'In this course we will learn c from scratch', '../uploads/pxfuel.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ganguly Yadav', 'yadavganguly77@gmail.com', '$2y$10$pJyJfWbbgbaCIEsmA/46keaCC9cfMvO/fQDbs9ySn6mD0zL6EEFRy'),
(2, 'Kundan Mahajan', 'kundanmahajan18@gmail.com', '$2y$10$Our96dDf9ROeMjx/bGEOQOEhL/CfqRVBTz78JVLRRroG./cronxcK'),
(3, 'Rahul Mishra', 'rahulmishra01@gmail.com', '$2y$10$B/rwL6lwcy2cUwG1WcED7.mI5UaTjTTgXakG6vRhLn9PahmXTAFg.'),
(4, 'Prathamesh Dhande', 'prathamdhande2@gmail.com', '$2y$10$upvEBQM.GzSPyHeqo1REquHsSXBDqCJ0TsMooOHnHkOH6vGkT2j6y'),
(5, 'demo', 'demo@gmail.com', '$2y$10$wk5EtnXPQLgLucap0QUXOu0JERD8uNH0ElR9o7HpyshuT6hrzTzxC'),
(6, 'New', 'new@gmail.com', '$2y$10$6bQVNYMIXnF9b7Sayg.tq.tZ4DqmX3r4trfiaNu2VWqutfav2/td2'),
(7, 'ABC', 'abc@gmail.com', '$2y$10$j3zTuDF66fhVWDvHT1l50.liOyPkkUHqR7Cn/YAQj30T0N4k/t8u6');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `course_id`, `instructor_id`, `date`) VALUES
(1, 1, 0, '2024-01-01'),
(2, 1, 0, '2024-01-01'),
(3, 5, 0, '2024-01-01'),
(4, 5, 0, '2024-01-01'),
(5, 5, 0, '2024-01-01'),
(6, 5, 0, '2024-01-01'),
(7, 5, 0, '2024-01-02'),
(8, 5, 0, '2024-01-02'),
(9, 5, 0, '2024-01-02'),
(10, 5, 0, '2024-01-02'),
(15, 4, 0, '2024-01-21'),
(16, 4, 0, '2024-01-21'),
(17, 4, 0, '2024-01-14'),
(18, 4, 0, '2024-01-14'),
(19, 7, 1, '2024-01-07'),
(20, 6, 1, '2024-01-21'),
(21, 6, 1, '2024-01-15'),
(22, 6, 1, '2024-01-15'),
(23, 5, 1, '2024-01-14'),
(24, 5, 1, '2024-01-14'),
(25, 5, 1, '2024-01-14'),
(26, 5, 1, '2024-01-14'),
(27, 6, 1, '2024-01-14'),
(28, 6, 1, '2024-01-14'),
(29, 6, 1, '2024-01-14'),
(30, 6, 1, '2024-01-14'),
(31, 6, 1, '2024-01-14'),
(32, 6, 1, '2024-01-14'),
(33, 6, 1, '2024-01-14'),
(34, 6, 1, '2024-01-14'),
(35, 6, 1, '2024-01-14'),
(36, 6, 1, '2024-01-14'),
(46, 6, 1, '2024-01-16'),
(47, 5, 1, '2024-01-22'),
(48, 8, 2, '2024-01-16'),
(49, 14, 6, '2024-01-14'),
(50, 14, 6, '2024-01-08'),
(51, 15, 7, '2024-01-22'),
(52, 15, 7, '2024-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
