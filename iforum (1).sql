-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220729.9c9ae5069e
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 07, 2022 at 03:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `time`) VALUES
(1, 'Javascript', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use JavaScript on the client side for web page behavior, often incorporating third-party libraries.', '2022-07-26 03:44:25'),
(2, 'Python', 'Python is a high-level, interpreted, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected. ', '2022-07-26 03:47:28'),
(3, 'PHP', 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994. The PHP reference implementation is now produced by The PHP Group.', '2022-07-26 03:48:14'),
(4, 'C#\r\n', 'C# is a general-purpose, multi-paradigm programming language. C# encompasses static typing, strong typing, lexically scoped, imperative, declarative, functional, generic, object-oriented, and component-oriented programming disciplines.', '2022-07-26 03:48:42'),
(5, 'Java', 'ava is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2022-07-26 03:49:27'),
(6, 'Ruby', 'Ruby is an interpreted, high-level, general-purpose programming language which supports multiple programming paradigms. It was designed with an emphasis on programming productivity and simplicity. In Ruby, everything is an object, including primitive data types.', '2022-07-26 03:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_user` varchar(25) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_user`, `comment_content`, `thread_id`, `time`) VALUES
(1, '0', 'first comment', 2, '2022-07-30 20:29:13'),
(2, '0', 'javascript comment', 2, '2022-07-30 20:30:59'),
(3, '0', 'pyton commnet', 15, '2022-07-30 20:32:38'),
(4, '0', 'pyton commnet', 15, '2022-07-30 20:38:44'),
(5, '0', 'pyton commnet', 15, '2022-07-30 20:41:35'),
(6, '0', 'pyton commnet', 15, '2022-07-30 20:41:53'),
(7, '0', 'pyton commnet', 15, '2022-07-30 20:41:56'),
(8, '0', 'pyton commnet', 15, '2022-07-30 20:43:08'),
(9, '0', 'pyton commnet', 15, '2022-07-30 20:45:40'),
(10, '0', 'pyton commnet', 15, '2022-07-30 20:46:01'),
(11, '0', '', 15, '2022-07-30 20:46:06'),
(12, '0', '', 15, '2022-07-30 20:46:09'),
(13, '0', '', 15, '2022-07-30 20:46:22'),
(14, '0', '', 15, '2022-07-30 20:46:28'),
(15, '0', 'pyton second comment', 15, '2022-07-30 20:47:03'),
(16, '0', 'aa', 4, '2022-07-30 20:48:10'),
(17, '0', 'aa', 4, '2022-07-30 20:48:14'),
(18, '0', 'aa', 4, '2022-07-30 20:48:17'),
(19, '0', 'aa', 4, '2022-07-30 20:48:21'),
(20, '0', 'aa', 4, '2022-07-30 20:52:55'),
(21, '0', 'aa', 4, '2022-07-30 20:53:17'),
(22, '0', 'aa', 4, '2022-07-30 20:53:44'),
(23, '0', 'aa', 4, '2022-07-30 20:55:18'),
(24, '0', 'aa', 4, '2022-07-30 20:55:20'),
(25, '0', 'bb', 4, '2022-07-30 20:55:27'),
(26, '0', 'bb', 4, '2022-07-30 20:55:31'),
(27, '0', 'bb', 4, '2022-07-30 21:06:10'),
(28, '0', 'bb', 4, '2022-07-30 21:06:12'),
(29, '0', 'second comment', 2, '2022-07-30 21:13:37'),
(30, '0', 'second comment', 2, '2022-07-30 21:13:43'),
(31, '0', 'sdadasda', 2, '2022-07-30 21:22:27'),
(32, '0', 'sdadasda', 2, '2022-07-30 21:22:38'),
(33, '0', 'sdadasda', 2, '2022-07-30 21:23:11'),
(34, '0', 'sdadasda', 2, '2022-07-30 21:23:14'),
(35, '0', 'aaa', 2, '2022-07-30 21:23:19'),
(36, '0', 'aaa', 2, '2022-07-30 21:24:05'),
(37, '0', 'sdadasda', 2, '2022-07-30 21:24:13'),
(38, '0', 'sdadasda', 2, '2022-07-30 21:27:39'),
(39, '0', 'aa', 3, '2022-07-30 21:31:54'),
(40, '0', 'aa', 3, '2022-07-30 21:31:57'),
(41, '0', 'aa', 3, '2022-07-30 21:34:39'),
(42, '0', 'aa', 3, '2022-07-30 21:35:37'),
(43, '0', 'aa', 3, '2022-07-30 21:36:02'),
(44, '0', 'aa', 3, '2022-07-30 21:37:03'),
(45, '0', 'aa', 3, '2022-07-30 21:38:43'),
(46, '0', 'aa', 3, '2022-07-30 21:39:48'),
(47, '0', 'aa', 3, '2022-07-30 22:09:42'),
(48, '0', 'Testing', 3, '2022-07-30 22:09:55'),
(49, '0', 'Testing', 3, '2022-07-30 22:11:02'),
(50, '0', 'Testing', 3, '2022-07-30 22:11:42'),
(51, '0', 'test123', 3, '2022-07-30 22:14:38'),
(52, '0', '1231', 3, '2022-07-30 22:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `thread_list`
--

CREATE TABLE `thread_list` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_time` datetime NOT NULL DEFAULT current_timestamp(),
  `thread_user_id` int(11) NOT NULL,
  `thread_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread_list`
--

INSERT INTO `thread_list` (`thread_id`, `thread_title`, `thread_desc`, `thread_time`, `thread_user_id`, `thread_cat_id`) VALUES
(1, 'Javascript syntax issues', 'javascript not doing well ', '2022-07-26 03:57:47', 0, 1),
(2, 'Javascript logic issue', 'this logic is very tough ', '2022-07-26 04:43:39', 0, 1),
(3, 'new title', 'new desc', '2022-07-27 02:33:44', 0, 1),
(4, 'new', 'new', '2022-07-27 02:41:05', 0, 1),
(6, 'new', 'new', '2022-07-27 02:41:37', 0, 1),
(7, 'new', 'new', '2022-07-27 02:44:39', 0, 1),
(8, 'new', 'new', '2022-07-27 02:45:05', 0, 1),
(9, 'new', 'new', '2022-07-27 02:47:29', 0, 1),
(10, 'new', 'nmnmbmn', '2022-07-27 02:47:40', 0, 1),
(11, 'aaa', 'aaaa', '2022-07-27 18:13:00', 0, 1),
(12, 'aaa', 'aaaa', '2022-07-27 18:13:50', 0, 1),
(13, 'aaa', 'aaaa', '2022-07-27 18:14:24', 0, 1),
(14, 'pyton syntax issue', 'sadasdasdasdas', '2022-07-30 20:32:06', 0, 2),
(15, 'pyton syntax issue', 'sadasdasdasdas', '2022-07-30 20:32:10', 0, 2),
(16, 'eeasea', 'sadasd', '2022-07-30 21:07:28', 0, 1),
(17, 'eeasea', 'sadasd', '2022-07-30 21:07:32', 0, 1),
(18, 'new22', 'new22', '2022-07-30 22:16:51', 0, 1),
(19, 'aaaa111', 'aaaa111', '2022-07-30 22:17:33', 0, 1),
(20, 'aaaa111', 'aaaa111', '2022-07-30 22:17:37', 0, 1),
(21, 'aaaa111', 'aaaa111', '2022-07-30 22:17:49', 0, 1),
(22, 'aaaa111', 'aaaa111', '2022-07-30 22:18:09', 0, 1),
(23, '111112222', '111112222', '2022-07-30 22:18:21', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_email`, `user_password`, `time`) VALUES
(1, 'admin@gmail.com', '123', '2022-08-06 02:46:23'),
(2, 'admin1@gmail.com', '123', '2022-08-06 03:11:52'),
(3, 'admin1@gmail.com', '123', '2022-08-06 06:06:07'),
(4, 'admin22@gmail.com', '123', '2022-08-06 06:06:53'),
(5, 'admin22@gmail.com', '123', '2022-08-06 06:08:10'),
(6, 'admin23@gmail.com', '123', '2022-08-06 06:08:17'),
(7, '12@gmail.com', '12', '2022-08-06 06:09:46'),
(8, '11@gmail.com', '1', '2022-08-06 06:14:32'),
(9, '111@gmail.com', '1', '2022-08-06 06:14:58'),
(10, 'admin@1.com', '$2y$10$o7MXasIMApG7jO2kqEUjQeeZzTZBR3cDaxx7fMKF6xi99PUS6BTDe', '2022-08-06 06:25:49'),
(11, '11@11.com', '$2y$10$pAQz8RB57EnuMaSvujtf6.JWlBlbCaQ67CRAbbFrKWgqS2Kvc06lK', '2022-08-06 07:20:07'),
(12, '123@1.com', '$2y$10$hrymvsAiWlqjcEg3Qyez3.AsTlxcaikbI5Mv090SwI8cyfbnp4h/q', '2022-08-07 04:36:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `thread_list`
--
ALTER TABLE `thread_list`
  ADD PRIMARY KEY (`thread_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `thread_list`
--
ALTER TABLE `thread_list`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
