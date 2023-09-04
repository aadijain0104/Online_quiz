-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 11:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(50) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'english', 1),
(2, 'math', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

CREATE TABLE `mytable` (
  `id` int(255) NOT NULL,
  `question` varchar(250) NOT NULL,
  `option1` varchar(250) NOT NULL,
  `option2` varchar(250) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`, `descriptions`, `status`, `category_id`) VALUES
(1, 'In cardinal utility analysis, the measurement of utility is expressed in:', 'Utils', 'Satisfaction', 'Money', 'Units', 'Utils', NULL, 1, 1),
(2, 'The Law of Diminishing Marginal Utility states that as a consumer consumes more units of a good:', 'Total utility increases at a decreasing rate', 'Total utility increases at a constant rate', 'Total utility remains constant\r\n', 'Total utility decreases at a decreasing rate', 'Total utility increases at a decreasing rate', NULL, 1, 1),
(3, 'The concept of consumer equilibrium is based on:', 'Maximizing total utility', 'Minimizing total expenditure', 'Equalizing marginal utilities of different goods', 'Consuming goods in equal quantities', 'Equalizing marginal utilities of different goods', NULL, 1, 1),
(4, 'Indifference curves are typically:', 'Downward sloping and convex to the origin', 'Upward sloping and convex to the origin', 'Upward sloping and concave to the origin', 'Downward sloping and concave to the origin', 'Downward sloping and concave to the origin', NULL, 1, 1),
(5, 'The marginal rate of substitution (MRS) measures:', 'The change in total utility due to a change in income', 'The change in total utility due to a change in price', 'The rate at which a consumer is willing to substitute one good for another while maintaining the same level of satisfaction', 'The rate at which a consumer\'s income is substituted for goods', 'The rate at which a consumer is willing to substitute one good for another while maintaining the same level of satisfaction', NULL, 1, 1),
(6, 'A consumer is in equilibrium when:', 'Marginal utility is zero', 'Marginal utility is maximized', 'Total utility is maximized', 'Price is minimized', 'Marginal utility is maximized', NULL, 1, 2),
(7, 'The budget line represents:', 'The combinations of goods that a consumer desires', 'The combinations of goods that a consumer can afford given their income and the prices of goods', 'The combinations of goods that a consumer produces', 'The combinations of goods that a consumer sells', 'The combinations of goods that a consumer can afford given their income and the prices of goods', NULL, 1, 2),
(8, 'An indifference curve does NOT depict:', 'Consumer preferences', 'Different combinations of goods that yield the same level of satisfaction', 'Marginal utility', 'Consumer income', 'Marginal utility', NULL, 1, 2),
(9, 'The point where the budget line is tangent to the indifference curve represents:', 'Consumer equilibrium', 'The point of highest total utility', 'A situation where the consumer\'s income is depleted', 'The point where the consumer stops purchasing goods', 'Consumer equilibrium', NULL, 1, 2),
(10, 'The principle of diminishing marginal utility suggests that:', 'The more a good is consumed, the higher its marginal utility becomes', 'The less a good is consumed, the higher its marginal utility becomes', 'The more a good is consumed, the lower its marginal utility becomes', 'The less a good is consumed, the lower its marginal utility becomes', 'The more a good is consumed, the lower its marginal utility becomes', NULL, 1, 2),
(11, 'What is the primary function of the Federal Reserve System in the United States?', 'Fiscal policy', 'Monetary policy', 'Trade regulation', 'Environmental protection', 'Monetary policy', NULL, 1, 1),
(12, 'What does the acronym \"OPEC\" stand for?', 'Oil and Petroleum Exporting Countries', 'Organization of Petrochemical Exporting Countries', 'Organization of Petroleum Exporting Countries', 'Oil Production and Export Coalition', 'Organization of Petroleum Exporting Countries', NULL, 1, 1),
(13, 'In economics, what does \"CPI\" stand for?', 'Consumer Price Index', 'Central Profit Indicator', ' Corporate Productivity Index', 'Currency Price Inflation', 'Consumer Price Index', NULL, 1, 1),
(14, 'Which of the following is a characteristic of a perfectly competitive market?', ' A few large firms dominate the market.', 'Products are differentiated.', 'Barriers to entry are low.', 'Firms have control over market prices.', 'Barriers to entry are low.', NULL, 1, 1),
(15, 'What is the term for the total value of goods and services produced within a country\'s borders, regardless of who owns the production facilities?', 'Gross Domestic Product (GDP)', 'Gross National Product (GNP)', ' Net National Product (NNP)', 'Net Domestic Product (NDP)', 'Gross Domestic Product (GDP)', NULL, 1, 1),
(16, 'In a market economy, what determines the allocation of resources?', 'Government planning and control', 'Consumer preferences and supply', 'Tradition and historical practices', 'Centralized decision-making', 'Consumer preferences and supply', NULL, 1, 2),
(17, 'Which of the following is a characteristic of a monopoly?', 'Many firms selling identical products', 'Free entry and exit in the market', 'Single seller with significant control over price', 'Firms producing differentiated products', 'Single seller with significant control over price', NULL, 1, 2),
(18, 'What is the term for the total market value of all final goods and services produced by the residents of a country in a given time period?', 'Gross Domestic Product (GDP)', 'Gross National Product (GNP)', ' Net Domestic Product (NDP)', 'Net National Product (NNP)', 'Gross Domestic Product (GDP)', NULL, 1, 2),
(19, 'Which economic concept refers to the situation when the wants and needs of people exceed the resources available to satisfy them?', 'Scarcity', 'Abundance', 'Equilibrium', 'Efficiency', 'Scarcity', NULL, 1, 2),
(20, 'In a market with excess demand (shortage), what tends to happen to prices?', 'Prices decrease', 'Prices increase', 'Prices remain unchanged', 'Prices fluctuate randomly', 'Prices increase', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_questions` varchar(255) NOT NULL,
  `total_correct_answers` int(11) NOT NULL DEFAULT 0,
  `total_score` int(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `user_id`, `total_questions`, `total_correct_answers`, `total_score`, `date`) VALUES
(13, NULL, '5', 0, 100, '2023-08-22 10:43:14'),
(16, NULL, '5', 0, 100, '2023-08-22 10:54:17'),
(17, NULL, '10', 0, 90, '2023-08-22 10:55:36'),
(18, NULL, '5', 0, 0, '2023-08-22 10:56:12'),
(19, NULL, '5', 0, 20, '2023-08-22 11:03:09'),
(20, NULL, '5', 0, 20, '2023-08-22 11:04:36'),
(21, NULL, '5', 0, 100, '2023-08-22 11:07:00'),
(22, NULL, '5', 0, 80, '2023-08-22 14:39:27'),
(23, NULL, '5', 0, 80, '2023-08-22 14:41:27'),
(24, NULL, '5', 0, 60, '2023-08-22 14:44:28'),
(25, NULL, '5', 0, 60, '2023-08-22 14:48:17'),
(26, NULL, '5', 3, 60, '2023-08-22 14:51:05'),
(27, NULL, '5', 4, 80, '2023-08-22 15:29:08'),
(28, NULL, '5', 0, 0, '2023-08-23 16:08:21'),
(29, NULL, '10', 0, 0, '2023-08-23 16:13:11'),
(30, NULL, '10', 0, 0, '2023-08-23 16:13:16'),
(31, NULL, '10', 0, 0, '2023-08-23 16:23:43'),
(32, NULL, '5', 0, 0, '2023-08-24 09:19:52'),
(33, NULL, '5', 5, 100, '2023-08-24 14:54:13'),
(34, NULL, '5', 5, 100, '2023-08-24 14:56:59'),
(35, NULL, '5', 5, 100, '2023-08-24 15:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `pwd`) VALUES
(1, 'Arthesh Pareek', 'artheshpareek800@gmail.com', '8fad70ebb3e7330359808b6f26519337');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mytable`
--
ALTER TABLE `mytable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mytable`
--
ALTER TABLE `mytable`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
