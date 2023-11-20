-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2023 at 02:40 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhom2_duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorypost`
--

CREATE TABLE `categorypost` (
  `id` int NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `categorypost`
--

INSERT INTO `categorypost` (`id`, `Name`) VALUES
(1, 'Technology'),
(2, 'Science'),
(3, 'Art');

-- --------------------------------------------------------

--
-- Table structure for table `postcomments`
--

CREATE TABLE `postcomments` (
  `PostId` int DEFAULT NULL,
  `UserId` int DEFAULT NULL,
  `Comment` text COLLATE utf8mb4_vietnamese_ci,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `postcomments`
--

INSERT INTO `postcomments` (`PostId`, `UserId`, `Comment`, `CreatedAt`) VALUES
(1, 1, 'Great article!', '2023-11-19 14:38:01'),
(1, 2, 'I have a question about database normalization.', '2023-11-19 14:38:01'),
(2, 1, 'Awesome tips!', '2023-11-19 14:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` int NOT NULL,
  `Title` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Content` text COLLATE utf8mb4_vietnamese_ci,
  `ImageUrl` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Status` int DEFAULT NULL,
  `VoteCount` int DEFAULT NULL,
  `VoteAvg` decimal(3,2) DEFAULT NULL,
  `ViewCount` int DEFAULT NULL,
  `CreateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `author_Id` int DEFAULT NULL,
  `RejectContent` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `categoryPost_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `Title`, `Content`, `ImageUrl`, `Status`, `VoteCount`, `VoteAvg`, `ViewCount`, `CreateAt`, `author_Id`, `RejectContent`, `categoryPost_id`) VALUES
(1, 'Introduction to Database Design', 'This is a sample content about database design.', 'sample-image.jpg', 1, 10, '4.50', 100, '2023-11-19 14:38:01', 1, 'Rejected for some reason', 1),
(2, 'Web Development Best Practices', 'Learn about best practices in web development.', 'web-dev-image.jpg', 2, 20, '4.80', 150, '2023-11-19 14:38:01', 2, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `poststatus`
--

CREATE TABLE `poststatus` (
  `Id` int NOT NULL,
  `StatusName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `poststatus`
--

INSERT INTO `poststatus` (`Id`, `StatusName`) VALUES
(1, 'Draft'),
(2, 'Pending'),
(3, 'Published'),
(4, 'Archived');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id` int NOT NULL,
  `roles_name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id`, `roles_name`) VALUES
(1, 'Admin'),
(2, 'Author'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `Id` int NOT NULL,
  `StatusName` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`Id`, `StatusName`) VALUES
(1, 'Active'),
(2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int NOT NULL,
  `Name` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Status` int DEFAULT NULL,
  `Email` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Phone` int DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Address` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `roles_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Status`, `Email`, `Phone`, `Password`, `Address`, `roles_id`) VALUES
(1, 'Nguyen Van A', 1, 'nguyenvana@gmail.com', 123456789, 'password123', 'Hanoi', 2),
(2, 'Tran Thi B', 1, 'tranthib@gmail.com', 987654321, 'securepass', 'HCMC', 1),
(3, 'Le Van C', 1, 'levanc@gmail.com', 987654321, 'securepass', 'Da Nang', 2),
(4, 'Pham Thi D', 1, 'phamthid@gmail.com', 123456789, 'password123', 'Hanoi', 2),
(5, 'Hoang Van E', 1, 'hoangve@gmail.com', 987654321, 'securepass', 'HCMC', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorypost`
--
ALTER TABLE `categorypost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postcomments`
--
ALTER TABLE `postcomments`
  ADD KEY `PostId` (`PostId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Status` (`Status`),
  ADD KEY `author_ld` (`author_Id`),
  ADD KEY `categoryPost_id` (`categoryPost_id`);

--
-- Indexes for table `poststatus`
--
ALTER TABLE `poststatus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Status` (`Status`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorypost`
--
ALTER TABLE `categorypost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poststatus`
--
ALTER TABLE `poststatus`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `postcomments`
--
ALTER TABLE `postcomments`
  ADD CONSTRAINT `postcomments_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `posts` (`Id`),
  ADD CONSTRAINT `postcomments_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Status`) REFERENCES `poststatus` (`Id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author_Id`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`categoryPost_id`) REFERENCES `categorypost` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Status`) REFERENCES `statuses` (`Id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
