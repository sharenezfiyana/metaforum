-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 04:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metaforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum_category`
--

CREATE TABLE `forum_category` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_category`
--

INSERT INTO `forum_category` (`categoryid`, `categoryname`) VALUES
(10, 'GENERAL'),
(11, 'WORLD'),
(12, 'ART'),
(13, 'ENTERTAIMENT'),
(14, 'VIDEOGAMES'),
(15, 'POLITICS'),
(16, 'OFF-TOPIC');

-- --------------------------------------------------------

--
-- Table structure for table `forum_post`
--

CREATE TABLE `forum_post` (
  `postid` int(11) NOT NULL,
  `ckeditor` text NOT NULL,
  `topicid` int(11) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `createpost` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_post`
--

INSERT INTO `forum_post` (`postid`, `ckeditor`, `topicid`, `username`, `createpost`) VALUES
(44, '<p><strong>Users</strong> can edit or delete their post if it&rsquo;s under 5 minutes old. After 5 minutes, the user can no longer edit or delete their post. Other users can reply to and favorite other people&rsquo;s posts if the thread is not locked, and they&rsquo;re not silenced. If a post has been favorited by a user, it cannot be favorited by the same user again.<strong>Users</strong> can edit or delete their post if it&rsquo;s under 5 minutes old. After 5 minutes, the user can no longer edit or delete their post. Other users can reply to and favorite other people&rsquo;s posts if the thread is not locked, and they&rsquo;re not silenced. If a post has been favorited by a user, it cannot be favorited by the same user again.</p>\r\n', 108, 'sharen1231', '2021-11-24 22:04:34'),
(45, '<p>test</p>\r\n', 109, 'sharen1231', '2021-11-28 16:51:41'),
(46, '<p>test</p>\r\n', 110, 'sharen1231', '2021-11-28 16:51:52'),
(47, '<p>a</p>\r\n', 108, 'bubble___', '2021-11-28 17:06:09');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topic`
--

CREATE TABLE `forum_topic` (
  `topicid` int(11) NOT NULL,
  `categoryid` int(100) NOT NULL,
  `topicname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_topic`
--

INSERT INTO `forum_topic` (`topicid`, `categoryid`, `topicname`) VALUES
(108, 10, 'PRAISE'),
(109, 10, 'RELIGION'),
(110, 10, 'HEALTH'),
(111, 11, 'CULTURE'),
(112, 12, 'LITERATURE'),
(114, 13, 'MUSIC'),
(115, 13, 'MOVIES'),
(116, 14, 'MOBA'),
(117, 14, 'RPG'),
(118, 14, 'FPS'),
(120, 15, 'INTERNATIONAL'),
(121, 15, 'NATIONAL'),
(122, 16, 'JOB-OFFERS'),
(123, 16, 'SOFTWARE'),
(124, 16, 'OTHERS');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `confirmpassword` varchar(200) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `email`, `username`, `password`, `confirmpassword`, `create_date`, `token`) VALUES
(37, 'ezsharen@gmail.com', 'sharen1231', '25d55ad283aa400af464c76d713c07ad', '12345678', '2021-11-18 16:36:13', 'a2f0a4266ebd23fef654bf80aae44144'),
(40, 'ezsharen23@gmail.com', 'edgarrr.rrr', '25d55ad283aa400af464c76d713c07ad', '12345678', '2021-11-24 07:54:23', '1e992226fdda8c03ec4af4549969e56f'),
(41, 'ezsharena@gmail.com', 'bubble___', '25d55ad283aa400af464c76d713c07ad', '12345678', '2021-11-28 10:05:17', 'bda2110e77a39b2fa07d1d351ccd1109');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `replyid` int(100) NOT NULL,
  `postid` int(200) DEFAULT NULL,
  `replytext` text NOT NULL,
  `create_reply` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`replyid`, `postid`, `replytext`, `create_reply`) VALUES
(8, 44, '<p>test</p>\r\n', '2021-11-28 16:51:28'),
(9, 45, '<p>test</p>\r\n', '2021-11-28 16:51:59'),
(10, 46, '<p><strong>test</strong></p>\r\n', '2021-11-28 16:52:09'),
(11, 47, '', '2021-11-28 17:07:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum_category`
--
ALTER TABLE `forum_category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `forum_post`
--
ALTER TABLE `forum_post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`topicid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`replyid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_category`
--
ALTER TABLE `forum_category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `forum_post`
--
ALTER TABLE `forum_post`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `topicid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `replyid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
