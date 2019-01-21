-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 10:38 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.2.14-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `user_id`, `details`, `image`, `created`, `status`) VALUES
(3, 5, '&lt;p&gt;Some Text 2&lt;/p&gt;', 'ccbe234006ca02e6db3bd4951b6276ea46dfbe4d_592e53455f4f3a26cabdc3397852e613ccb9d27e.png', 1548021711, 'pending'),
(4, 5, '&lt;p&gt;Some Text 2&lt;/p&gt;', 'ccbe234006ca02e6db3bd4951b6276ea46dfbe4d_592e53455f4f3a26cabdc3397852e613ccb9d27e.png', 1548021711, 'enabled'),
(5, 5, '&lt;p&gt;dfafadsfasd&lt;/p&gt;', 'd753ec3d24a5931cc846b3446315ac79221df1b3_286b9c053a91b1d596caf2bc5d6ddeb9556e6a0f.jpg', 1548067711, 'enabled'),
(6, 5, '&lt;p&gt;Some Text 2&lt;/p&gt;', 'c6aca37d6e86b6cacf3567c8b8ec6dabf9084e7a_0b8e6dae6148f4df9f5d4d11fdb06ea4c4a5ed03.jpg', 1548068819, 'enabled'),
(7, 5, '&lt;p&gt;Some text here&lt;/p&gt;', '83a1b33e3c66283b92f246cd80d47210be67938c_c6fefa3c270ecb20475eddbc5d1561b2c84d5309.png', 1548101480, 'enabled'),
(8, 5, '&lt;p&gt;Mohammed Elattar&lt;/p&gt;', 'f9655ba0bd6f3d9720694dc1bb813dea041350c3_f5d94c453e53886563d0f8345114cb0f6450d81a.png', 1548102486, 'enabled');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`) VALUES
(9, 'site_name', 'My Blog'),
(10, 'site_email', 'admin@my-blog.com'),
(11, 'site_status', 'enabled'),
(12, 'site_close_msg', '&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size:48px&quot;&gt;Site Now Is IN Maintainance Mode&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(96) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `created` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `code` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `users_group_id`, `first_name`, `last_name`, `email`, `password`, `image`, `gender`, `created`, `status`, `ip`, `code`) VALUES
(1, 1, 'Daniel', 'le', 'daniel.le@metronom-external.com', '$2y$10$HnmbFOUfQTRMzn8b/YHS1ugAl6.GlYZwpw8ktYoVSkbmiMVMGomNS', '03dbe5a3b87726bfa8c4a7b6a6059e1738c2ee9c_72faaff29ec7c9d04413eb8ffb23697c1a59b095.jpg', 'male', 1471429381, 'enabled', '', '80a315d99d01b28e68e58c0c899bc4ce2197c524'),
(5, 2, 'Mohammed', 'Elattar', 'mseel3ttar@gmail.com', '$2y$10$i.CPjjrqFlZXkqmQRsN4Yehw9z7DRgPe57dHv/vLjQP6/x.zT30me', '8e2695d566a688e8c136da2250767dd0978b5f33_e5c20f7f0d4003952304cf697d2b6f2be8477d85.jpg', 'male', 1548021711, 'enabled', '::1', '2047b3a45411ed69f64d242cb334f753a3ffafff'),
(7, 2, 'Rabab', 'Ahmed', 'rababahmed88@gmail.com', '$2y$10$QdTrqAqd30Q5Gl10z0V82e.uusTHFnNSHXYy7Us9UHSo4kf3Zq3b6', '7b465dc51b57a3eda5e4c79d36a56dd2aac619b1_8b4436659c42d9e29af5d850d4f18e20f609bb02.png', 'male', 1548102009, 'enabled', '::1', '631654d99ba841c9218c4025774a2e3615dc9b16');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `name`) VALUES
(1, 'Super Administrators'),
(2, 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `users_group_permissions`
--

CREATE TABLE `users_group_permissions` (
  `id` int(11) NOT NULL,
  `users_group_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_group_permissions`
--

INSERT INTO `users_group_permissions` (`id`, `users_group_id`, `page`) VALUES
(46, 2, '/admin/login'),
(47, 2, '/admin/login/submit'),
(48, 0, '/admin/login'),
(49, 0, '/admin/login/submit'),
(50, 0, '/admin'),
(51, 0, '/admin/dashboard'),
(52, 0, '/admin/submit'),
(53, 0, '/admin/users'),
(54, 0, '/admin/users/add'),
(55, 0, '/admin/users/submit'),
(56, 0, '/admin/users/edit/:id'),
(57, 0, '/admin/users/save/:id'),
(58, 0, '/admin/users/delete/:id'),
(60, 0, '/admin/users-groups'),
(61, 0, '/admin/users-groups/add'),
(62, 0, '/admin/users-groups/submit'),
(63, 0, '/admin/users-groups/edit/:id'),
(64, 0, '/admin/users-groups/save/:id'),
(65, 0, '/admin/users-groups/delete/:id'),
(82, 0, '/admin/settings'),
(83, 0, '/admin/settings/save'),
(93, 0, '/admin/logout'),
(94, 0, '/admin/login'),
(95, 0, '/admin/login/submit'),
(96, 0, '/admin'),
(97, 0, '/admin/dashboard'),
(98, 0, '/admin/submit'),
(99, 0, '/admin/users'),
(100, 0, '/admin/users/add'),
(101, 0, '/admin/users/submit'),
(102, 0, '/admin/users/edit/:id'),
(103, 0, '/admin/users/save/:id'),
(104, 0, '/admin/users/delete/:id'),
(106, 0, '/admin/users-groups'),
(107, 0, '/admin/users-groups/add'),
(108, 0, '/admin/users-groups/submit'),
(109, 0, '/admin/users-groups/edit/:id'),
(110, 0, '/admin/users-groups/save/:id'),
(111, 0, '/admin/users-groups/delete/:id'),
(128, 0, '/admin/settings'),
(129, 0, '/admin/settings/save'),
(139, 0, '/admin/logout'),
(140, 1, '/admin/login'),
(141, 1, '/admin/login/submit'),
(142, 1, '/admin'),
(143, 1, '/admin/dashboard'),
(144, 1, '/admin/submit'),
(145, 1, '/admin/users'),
(146, 1, '/admin/users/add'),
(147, 1, '/admin/users/submit'),
(148, 1, '/admin/users/edit/:id'),
(149, 1, '/admin/users/save/:id'),
(150, 1, '/admin/users/delete/:id'),
(151, 1, '/admin/profile/update'),
(152, 1, '/admin/users-groups'),
(153, 1, '/admin/users-groups/add'),
(154, 1, '/admin/users-groups/submit'),
(155, 1, '/admin/users-groups/edit/:id'),
(156, 1, '/admin/users-groups/save/:id'),
(157, 1, '/admin/users-groups/delete/:id'),
(174, 1, '/admin/settings'),
(175, 1, '/admin/settings/save'),
(185, 1, '/admin/logout'),
(186, 1, '/admin/guestbook'),
(187, 1, '/admin/guestbook/submit'),
(188, 1, '/admin/guestbook/edit/:id'),
(189, 1, '/admin/guestbook/save/:id');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_group_id` (`users_group_id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users_group_permissions`
--
ALTER TABLE `users_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD CONSTRAINT `guestbook_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`users_group_id`) REFERENCES `users_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
