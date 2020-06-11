-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 11:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mum`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `name`, `image`, `rank`, `date_added`) VALUES
(1, 'Katy Perry', 'katyperry.jpg_large', 0, '2020-06-07'),
(2, 'Demi Lovato', '', 0, '2020-06-07'),
(3, 'Ali Gatie', '', 0, '2020-06-07'),
(4, 'K-391', '', 0, '2020-06-07'),
(5, 'Lady Gaga', '', 0, '2020-06-07'),
(6, 'Doja Cat', '', 0, '2020-06-07'),
(7, 'Taylor Swift', '', 0, '2020-06-07'),
(8, 'Post Malone', 'Post Malone.jpg', 1, '2020-06-07'),
(9, 'Billie Eilish', 'Billie Eilish.jfif', 2, '2020-06-07'),
(10, 'Gunna', 'Gunna.jpg', 3, '2020-06-07'),
(11, 'The 1975', 'The 1975.jpg', 4, '2020-06-07'),
(12, 'The Weeknd', 'The Weeknd.jpg', 5, '2020-06-07'),
(13, 'Agust D', 'Agust D.jpg', 6, '2020-06-07'),
(14, 'Drake', 'Drake.jpg', 7, '2020-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `release_date` date NOT NULL DEFAULT current_timestamp(),
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `title`, `image`, `artist_id`, `release_date`, `date_added`) VALUES
(1, 'Never Worn White', 'Katy Perry - Never Worn White.jpg', 1, '2020-03-05', '2020-06-07'),
(2, 'I love Me', 'Demi Lovato - I Love Me.png', 2, '2020-03-06', '2020-06-07'),
(3, 'What If I Told You That I Love You', 'Ali Gatie - What If I Told You That I Love You.jpg', 3, '2020-01-24', '2020-06-07'),
(4, 'End Of Time', 'K-391 - End of Time.jpg', 4, '2020-03-06', '0000-00-00'),
(5, 'Lady Gaga - Stupid Love', 'Lady Gaga - Stupid Love.jpg', 5, '2020-02-28', '0000-00-00'),
(6, 'Doja Cat - Say So', 'Doja Cat - Say So.jpg', 6, '2020-01-28', '0000-00-00'),
(7, 'Taylor Swift - The Man', 'Taylor Swift - The Man.jpg', 7, '2020-01-27', '0000-00-00'),
(8, 'Iggy Pop - The Bowie Years', 'The Bowie Years.jpg', 15, '2020-05-29', '0000-00-00'),
(16, 'Hinds - The Prettiest Curse', 'The Prettiest Curse.jpg', 16, '2020-06-05', '0000-00-00'),
(17, 'Muzz - Muzz', 'Muzz.jpg', 17, '2020-06-05', '0000-00-00'),
(18, 'Rolling Blackouts Coastal Fever - Sideways To New Italy', 'Sideways To New Italy.jpeg', 18, '2020-06-05', '0000-00-00'),
(19, 'Sports Team - Deep Down Happy', 'Deep Down Happy.jpg', 19, '2020-04-03', '0000-00-00'),
(20, 'Brigid Mae Power - Head Above The Water', 'Head Above The Water.jpg', 20, '2020-06-05', '0000-00-00'),
(21, 'Westerman - Your Hero Is Not Dead', 'Your Hero Is Not Dead.jpg', 21, '2020-04-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Hash` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
