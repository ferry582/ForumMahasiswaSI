-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 11:13 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(4, 'programming', 'ini adalah kategori untuk pemrograman'),
(5, 'universitas', 'diskusi seputar kuliah'),
(7, 'yogyakarta', 'forum diskusi seputar kota yogya'),
(8, 'Prodi Sistem informasi', 'forum seputar mahasiswa sistem informasi'),
(9, 'pemrograman web', 'diskusi mengenai mata kuliah pemrograman web');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(8) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  `post_topic` int(8) NOT NULL,
  `post_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_content`, `post_date`, `post_topic`, `post_by`) VALUES
(5, 'ini diskusi tentang python', '2021-06-28 12:11:37', 6, 2),
(15, 'salah satu bahasa pemrograman', '2021-06-28 16:00:25', 11, 2),
(17, 'perbandingan c dan c++', '2021-06-28 16:06:56', 13, 2),
(25, 'halo ', '2021-06-28 16:14:27', 20, 2),
(27, 'css', '2021-06-28 16:33:36', 20, 2),
(33, '<p><em>halo ini diskusi saya</em></p><ol><li><em>satu</em></li></ol><p>dua</p>', '2021-06-29 09:58:58', 23, 4),
(34, 'haloo', '2021-06-29 09:59:25', 23, 4),
(39, 'hello guys', '2021-07-07 20:19:49', 23, 5),
(40, '<p>Bicara tentang website, tentunya ada begitu banyak hal yang dapat menjadi topik pembicaraan. Mulai dari design, user interface, plugin, content management system, hingga ke komponen lainnya yang berada di belakang layar website. Misalkan seperti backend framework. Sebuah backedn framework yang memang sangat banyak membantu para developer dalam pengembangan aplikasi maupun website.<br /><br />Framework backend sendiri digunakan oleh developer untuk membuat program. Dengan mengunakan framewordk developer mengembangkan web atau aplikasi menjadi lebih cepat dan rapi.<br /><br />Nah, Kalau waktu itu Admin bahas tentang fremework terbaik untuk frontend. Sekarang Admin mau rangkum framework terbaik untuk backend.<br /><br />Apa saja ya? Mari kita simak pembahasan dibawah ini!<br /><br /><br />1. Express.js<br />2. Laravel<br />3. Django<br />4.&nbsp;Ruby on Rails<br />5. .NET Core</p>', '2021-07-07 21:05:04', 24, 4),
(41, 'Hi ferry, terdapat juga framework lainnya yang tidak kalah baik, yaitu cakePHP, Flask, dan Phoenix', '2021-07-07 21:08:23', 24, 5),
(42, 'Wah, terimakasih danar atas tambahannya.', '2021-07-07 21:09:21', 24, 4),
(43, 'Flask merupakan framework urutan ke-3 terbanyak digunakan saat ini, seharusnya ferry memasukannya kedalam daftar', '2021-07-07 21:11:38', 24, 6),
(44, '<p>prodi sistem informasi <strong>upn veteran yogyakarta</strong></p>', '2021-07-07 22:40:38', 25, 4),
(45, 'ini komen saya', '2021-07-07 22:41:31', 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` varchar(255) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(6, 'python', '2021-06-28 12:11:37', 4, 2),
(11, 'solidity', '2021-06-28 16:00:25', 4, 2),
(13, 'c vs c++', '2021-06-28 16:06:56', 4, 2),
(20, 'c++', '2021-06-28 16:13:08', 4, 2),
(23, 'programming language', '2021-06-29 09:58:58', 4, 4),
(24, '5 Recomendasi Framework Terbaik Untuk Back End', '2021-07-07 21:05:04', 4, 4),
(25, 'prodi sistem informasi', '2021-07-07 22:40:38', 8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `college` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_level` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `college`, `email`, `password`, `user_level`) VALUES
(2, 'dwianta', 'UPN Veteran Yogyakarta', '12345@gmail.com', 'ferry', 0),
(4, 'ferry', 'ferry', 'ferry@gmail.com', 'ferry', 1),
(5, 'danar', 'ugm jogja', 'danar@gmail.con', 'danar', 0),
(6, 'afi', 'upn', 'afi@gmail.com', 'afi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name_unique` (`cat_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_topic` (`post_topic`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
