-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2025 at 09:19 PM
-- Server version: 10.5.28-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missionsitedb`
--

-- Grant privileges to admin user
GRANT ALL PRIVILEGES on *.* TO 'admin'@'%';

USE ms_db;

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` varchar(36) NOT NULL,
  `title` varchar(128) NOT NULL,
  `blurb` varchar(512) NOT NULL,
  `url` varchar(64) NOT NULL,
  `img_url` varchar(64) NOT NULL,
  `edition` date NOT NULL,
  `author` varchar(32) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `published_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `title`, `blurb`, `url`, `img_url`, `edition`, `author`, `published`, `published_date`) VALUES
('04084d74-d42f-11ed-9238-e14bd446de8b', 'March Update', 'Happy spring! I\'m so thankful that it looks like we\'ll be getting warmer weather for Easter this weekend', '', '/2023/03/images/ski-party.jpeg', '2023-03-01', 'Zach Hofmeister', 1, '2023-04-05'),
('089e1945-e34d-11ef-95f7-ec7a9fb094d5', 'January Update', 'It\'s good to be back! Our students didn\'t start class \'til the 21st, but a lot has been going on! Over break we had the SEEK conference and', '', '/2025/01/images/dinner.jpeg', '2025-01-01', 'Zach Hofmeister', 1, '2025-02-04'),
('0dab09d3-ffce-11ef-95f7-ec7a9fb094d5', 'February Update', 'Happy March! I hope lent is going well for you! I\'m excited to share the highlights from mission this past month with you! Thank you so much', '', '/2025/02/images/awake-group.jpeg', '2025-02-01', 'Zach Hofmeister', 1, '2025-03-13'),
('272e8297-ffcf-11ef-95f7-ec7a9fb094d5', 'Christmas Card', 'I have so much to thank the Lord for this year, in my personal life and in our mission to the students here at CMU', '', '/2024/12/images/1.jpeg', '2024-12-01', 'Zach Hofmeister', 1, '2024-12-25'),
('2be0755c-b6d2-11ee-934d-e4590f4320d9', 'January Update', 'Happy New Year! After a great break with my family, I started my year with the SEEK conference in St. Louis, followed by', '', '/2024/01/images/seek-arch.jpeg', '2024-01-01', 'Zach Hofmeister', 1, '2024-01-31'),
('31443d1a-687d-11ee-9451-e765462f1af5', 'September Update', 'I hope that you had a great September! Thank you for being a part of this mission! This month, God has blessed me with', '', '/2023/09/images/moab-rosary.jpeg', '2023-09-01', 'Zach Hofmeister', 1, '2023-10-11'),
('40f2d3f1-1b05-11f0-b81b-dca6328b0bca', 'March Update', 'I hope that you are doing well! This March was good, refreshing, and challenging all at the same time. Lent started, and', '', '/2025/03/images/sunday.jpeg', '2025-03-01', 'Zach Hofmeister', 1, '2025-04-16'),
('412ee215-fd1f-11ee-9680-dca6328b0bca', 'March Update', 'He is risen! I hope you\'re having a blessed Easter! Much of March was spent preparing for and going on our mission trip to Peru', '', '/2024/03/images/peru-group.jpeg', '2024-03-01', 'Zach Hofmeister', 1, '2024-04-17'),
('4474bf35-960d-11ee-9451-e765462f1af5', 'November Update', 'I hope you had a great November and a happy Thanksgiving! I am so thankful for this mission that we get to be on together!', '', '/2023/11/images/bowling.jpeg', '2023-11-01', 'Zach Hofmeister', 1, '2023-12-08'),
('7991a33d-bdac-11ef-95f7-ec7a9fb094d5', 'November + December Update', 'I hope that you had a great Thanksgiving with family and are enjoying the season of Advent! As you prepare your heart', '', '/2024/11/images/mass.jpeg', '2024-11-01', 'Zach Hofmeister', 1, '2024-12-18'),
('950c9369-341c-11ee-8457-dca6328b0bca', 'May + Summer Update', 'What a year it has been! I hope that you\'ve had a good summer so far! Thank you for', '', '/2023/05/images/camping-hike.jpeg', '2023-05-01', 'Zach Hofmeister', 1, '2023-08-05'),
('a310468a-7c35-11ef-9467-e7674b447272', 'August Update', 'I hope you are doing well! It has been a while since my last update, but I am excited to share with you how our mission at Mesa has been starting out', '', '/2024/08/images/smores.jpeg', '2024-08-01', 'Zach Hofmeister', 1, '2024-09-26'),
('a4325ce9-4d36-11ee-9451-e765462f1af5', 'August Update', 'Thank you for your continued prayers and support for the mission! The semester has been off to a great start', '', '/2023/08/images/team-retreat.jpeg', '2023-08-01', 'Zach Hofmeister', 1, '2023-09-06'),
('a4c466bd-acee-11ed-b6c5-dca6328b0bcb', 'August Update', 'Hello friends! I am so excited to bring you an update from this first month of being on mission at the Air Force Academy!', '/2022/08/newsletter.html', '/2022/08/cliff-jumping.jpeg', '2022-08-01', 'Zach Hofmeister', 1, '2022-08-24'),
('a4c64b47-acee-11ed-b6c5-dca6328b0bcb', 'September Update', 'Hello again, and happy fall! I\'m excited to share some of my highlights from this past month with you!', '/2022/09/newsletter.html', '/2022/09/retreat-all.jpg', '2022-09-01', 'Zach Hofmeister', 1, '2022-09-21'),
('a4c924c5-acee-11ed-b6c5-dca6328b0bcb', 'October Update', 'I hope that your October has gone well! Colorado has gone through quite a beautiful transformation', '/2022/10/newsletter.html', '/2022/10/camping-mass.jpg', '2022-10-01', 'Zach Hofmeister', 1, '2022-10-31'),
('a4caed7f-acee-11ed-b6c5-dca6328b0bcb', 'November Update', 'I hope you had a great Thanksgiving! I have no shortage of things to be thankful for this year, but I am especially grateful for', '/2022/11/newsletter.html', '/2022/11/dallas-victory.jpeg', '2022-11-01', 'Zach Hofmeister', 1, '2022-11-30'),
('a4ccb542-acee-11ed-b6c5-dca6328b0bcb', 'Christmas Card', 'Thank you so much for your prayers and support throughout this year!', '/2022/12/newsletter.html', '/2022/12/1.jpeg', '2022-12-01', 'Zach Hofmeister', 1, '2022-12-24'),
('a4ce7c38-acee-11ed-b6c5-dca6328b0bcb', 'January Update', 'Happy New Year! I hope that you all had a very Merry Christmas and that the Lord fills 2023 with blessings for you!', '/2023/01/newsletter.html', '/2023/01/seek-reunion.jpeg', '2023-01-01', 'Zach Hofmeister', 1, '2023-01-25'),
('b503bce5-996f-11ef-940b-e66238ef095d', 'September + October Update', 'I hope that you have been doing well this Autumn! I\'m excited to catch you up on some of the ways that God has been working in our lives', '', '/2024/09/images/retreat-group.jpeg', '2024-09-01', 'Zach Hofmeister', 1, '2024-11-02'),
('b6ea45f6-b2ec-11ee-94ca-e86b609df5f4', 'Christmas Card', 'My first semester at Colorado Mesa has been so amazing', '', '/2023/12/images/team.jpeg', '2023-12-01', 'Zach Hofmeister', 1, '2024-01-14'),
('bbf946d9-ed6a-11ed-9238-e14bd446de8b', 'April Update', 'Christ is Risen! I hope that you had a wonderful celebration and are still filled with Easter joy throughout the season!', '', '/2023/04/images/easter-vigil.jpeg', '2023-04-01', 'Zach Hofmeister', 1, '2023-05-08'),
('bf142d18-b6bd-11ed-8ff1-dca6328b0bcb', 'February Update', 'I hope that you are doing well! I am excited to tell you about some of the highlights from February here at the academy!', '', '/2023/02/images/vp-group.jpeg', '2023-02-01', 'Zach Hofmeister', 1, '2023-03-02'),
('ce7ad44e-7949-11ee-9451-e765462f1af5', 'October Update', 'I hope that you have had such a blessed October! The semester is flying by so fast, and there is so much happening in our mission!', '', '/2023/10/images/st-francis.jpeg', '2023-10-01', 'Zach Hofmeister', 1, '2023-11-02'),
('e9086055-159d-11ef-9680-dca6328b0bca', 'April + May Update', 'Happy Pentecost! I pray that you all are doing well! I am excited to share about how God has been working in our lives these last two months', '', '/2024/04/images/easter-vigil.jpeg', '2024-04-01', 'Zach Hofmeister', 1, '2024-05-18'),
('f8c52f90-da68-11ee-9680-dca6328b0bca', 'February Update', 'I hope that February has gone well for you! So much has happened this month, from our first Upper Room meeting', '', '/2024/02/images/upperroom.jpeg', '2024-02-01', 'Zach Hofmeister', 1, '2024-03-04');

--
-- Triggers `newsletters`
--
DELIMITER $$
CREATE TRIGGER `newsletters_before_insert` BEFORE INSERT ON `newsletters` FOR EACH ROW IF NEW.id IS NULL THEN
	SET NEW.id = UUID();
END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
