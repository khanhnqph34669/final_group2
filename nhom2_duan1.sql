-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2023 at 01:39 PM
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
-- Table structure for table `postcomments`
--

CREATE TABLE `postcomments` (
  `PostId` int NOT NULL,
  `UserId` int NOT NULL,
  `Comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedAt` timestamp NULL DEFAULT NULL,
  `ModifiesAt` timestamp NULL DEFAULT NULL,
  `ModifiedBy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `postcomments`
--

INSERT INTO `postcomments` (`PostId`, `UserId`, `Comment`, `CreatedAt`, `ModifiedAt`, `ModifiesAt`, `ModifiedBy`) VALUES
(1, 1, 'Great post!', '2023-11-12 05:14:55', NULL, NULL, NULL),
(1, 2, 'Interesting insights.', '2023-11-12 05:14:55', NULL, NULL, NULL),
(2, 1, 'Looking forward to more content.', '2023-11-12 05:14:55', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` int NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ImageUrl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Status` int NOT NULL,
  `VoteCount` int DEFAULT '0',
  `VoteAvg` decimal(3,2) DEFAULT '0.00',
  `ViewCount` int DEFAULT '0',
  `CreateAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Authorld` int NOT NULL,
  `CreatedBy` int NOT NULL,
  `ModifiesAt` timestamp NULL DEFAULT NULL,
  `ModifiedBy` int DEFAULT NULL,
  `ApprovedAt` timestamp NULL DEFAULT NULL,
  `RejectedAt` timestamp NULL DEFAULT NULL,
  `ApprovedBy` int DEFAULT NULL,
  `RejectedBy` int DEFAULT NULL,
  `RejectionComment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `Title`, `Content`, `ImageUrl`, `Status`, `VoteCount`, `VoteAvg`, `ViewCount`, `CreateAt`, `Authorld`, `CreatedBy`, `ModifiesAt`, `ModifiedBy`, `ApprovedAt`, `RejectedAt`, `ApprovedBy`, `RejectedBy`, `RejectionComment`) VALUES
(1, 'First Post', 'This is the content of the first post.', NULL, 1, 0, '0.00', 0, '2023-11-12 05:14:55', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Second Post', 'This is the content of the second post.', NULL, 2, 0, '0.00', 0, '2023-11-12 05:14:55', 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id` int NOT NULL,
  `roles_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id`, `roles_name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Author');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `Id` int NOT NULL,
  `StatusName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`Id`, `StatusName`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `roles_id` int NOT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ModifiedAt` timestamp NULL DEFAULT NULL,
  `ModifiedBy` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Status`, `Email`, `Phone`, `Password`, `Address`, `roles_id`, `CreatedAt`, `ModifiedAt`, `ModifiedBy`) VALUES
(1, 'John Doe', 'Active', 'john@example.com', NULL, 'password123', NULL, 1, '2023-11-12 05:14:55', NULL, NULL),
(2, 'Jane Smith', 'Active', 'jane@example.com', NULL, 'pass456', NULL, 2, '2023-11-12 05:14:55', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `postcomments`
--
ALTER TABLE `postcomments`
  ADD PRIMARY KEY (`PostId`,`UserId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `ModifiedBy` (`ModifiedBy`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Status` (`Status`),
  ADD KEY `Authorld` (`Authorld`),
  ADD KEY `CreatedBy` (`CreatedBy`),
  ADD KEY `ModifiedBy` (`ModifiedBy`),
  ADD KEY `ApprovedBy` (`ApprovedBy`),
  ADD KEY `RejectedBy` (`RejectedBy`);

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
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `postcomments`
--
ALTER TABLE `postcomments`
  ADD CONSTRAINT `postcomments_ibfk_1` FOREIGN KEY (`PostId`) REFERENCES `posts` (`Id`),
  ADD CONSTRAINT `postcomments_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `postcomments_ibfk_3` FOREIGN KEY (`ModifiedBy`) REFERENCES `users` (`Id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`Status`) REFERENCES `statuses` (`Id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`Authorld`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `posts_ibfk_4` FOREIGN KEY (`ModifiedBy`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `posts_ibfk_5` FOREIGN KEY (`ApprovedBy`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `posts_ibfk_6` FOREIGN KEY (`RejectedBy`) REFERENCES `users` (`Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
