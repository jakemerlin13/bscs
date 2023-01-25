-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 09:57 AM
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
-- Database: `bscs`
--

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `bgID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bgimage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`bgID`, `userID`, `bgimage`) VALUES
(1, 19, '63cf7cf82cbc7analyn cover.jpg'),
(2, 30, '63cf66424217edarreil bg.jpg'),
(3, 25, '63cf668058121alexie bg.jpg'),
(4, 26, '63cf676098559juliana bg.jpg'),
(5, 28, '63cf678f4424bephraim bg.png'),
(6, 24, '63cf67cccf155joan bg.jpg'),
(7, 17, '63cf67f2401bamarlo bg.jpg'),
(8, 21, '63cf684e90b02danyel bg.jpg'),
(9, 23, '63cf688e5dd69justin joy bg.jpg'),
(10, 22, '63cf68e728d61kathrina bg.jpg'),
(11, 18, '63cf6929bb7fbclarence bg.jpg'),
(12, 20, '63cf69577c780darlyn bg.jpg'),
(13, 29, '63cf69a76f980alex bg.png'),
(14, 27, '63cf69d43e980manher bg.jpg'),
(15, 15, '63cff5d4256e3cover.jpg'),
(16, 113, '63d0c64d283b7Jake Merlin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `genderID` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`genderID`, `gender`) VALUES
(1, 'MALE'),
(2, 'FEMALE');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `imgID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`imgID`, `userID`, `image`) VALUES
(3, 19, '63cf7d10ec3e3analyn pic.jpg'),
(4, 12, 'site.png\r\n'),
(5, 30, '63cf662a2edecdarreil pic.jpg'),
(6, 25, '63cf6696d6af3alexie pic.jpg'),
(7, 26, '63cf674f57ff1juliana pic.jpg'),
(8, 28, '63cf6788bf6efephraim pic.jpg'),
(9, 24, '63cf67c7b4238joan pic.jpg'),
(10, 17, '63cf67ec044b8marlo pic.jpg'),
(11, 21, '63cf683eb7e0adanyel pic.jpg'),
(12, 23, '63cf6868527e6justin joy pic.jpg'),
(13, 22, '63cf68d633152kathrina pic.jpg'),
(14, 18, '63cf690811d40clarence pic.jpg'),
(15, 20, '63cf6952e0c3edarlyn pic.jpg'),
(16, 29, '63cf69a0dacdaalex pic.jpg'),
(17, 27, '63cf69cc2b146manher pic.jpg'),
(18, 15, '63cff5ccbe508cover2.jpg'),
(19, 113, '63d0c6477b8d9Ako maba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `userID`, `username`, `password`) VALUES
(13, 15, 'jakemerlin', '123123123'),
(14, 17, 'MARLO', 'MENDOZA'),
(15, 18, 'CLARENCE', 'FUERTES'),
(16, 19, 'ANALYN', 'MIRAS'),
(17, 20, 'DARLYN', 'NATAVIO'),
(18, 21, 'DANIEL', 'FERRER'),
(19, 22, 'KATHRINA', 'SUNGA'),
(20, 23, 'JUSTIN', 'LAVARIENTOS'),
(21, 24, 'JOAN', 'ALABASTRO'),
(22, 26, 'juliana ', 'de venecia'),
(23, 27, 'mahner', 'corpuz'),
(24, 28, 'ephraim', 'castrence'),
(25, 25, 'alexie', 'arenajo'),
(26, 29, 'alexander', 'soriano'),
(27, 30, 'darreil', 'abalos'),
(110, 113, 'Akomaba', 'who');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `middle_initial` varchar(1) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `student_id` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstname`, `middle_initial`, `lastname`, `gender`, `contact_number`, `student_id`) VALUES
(15, 'JAKE RUSSEL', 'L', 'MERLIN', 'MALE', '09998108789', '21-0759-836'),
(17, 'MARLO', 'I', 'MENDOZA', 'MALE', '09461910182', '21-0703-716'),
(18, 'CLARENCE', '', 'FUERTES', 'MALE', '09504539920', '21-0886-334'),
(19, 'ANALYN', 'M', 'MIRAS', 'FEMALE', '09156293796', '19-0401-872'),
(20, 'DARLYN', 'C', 'NATAVIO', 'FEMALE', '09167218452', '21-0892-984'),
(21, 'DANIEL', 'A', 'FERRER', 'MALE', '09669120106', '21-0783-230'),
(22, 'KATHRINA MARIE', 'D', 'SUNGA', 'FEMALE', '09451021721', '21-0883-919'),
(23, 'JUSTIN JOY', 'S', 'LAVARIENTOS', 'FEMALE', '09054774657', '21-0863-116'),
(24, 'JOAN', 'M', 'ALABASTRO', 'FEMALE', '09387276401', '21-0321-720'),
(25, 'ALEXIE', 'L', 'Arenajo', 'FEMALE', '09099465840', '21-0230-739'),
(26, 'JULIANA', 'P', 'DE VENECIA', 'FEMALE', '09468060482', '21-0232-427'),
(27, 'Mahner ', 'M', 'Corpuz', 'MALE', '09516676885', '21-1256-304'),
(28, 'EPHRAIM', 'P', 'CASTRENCE', 'MALE', '09666437553', '21-0236-145'),
(29, 'ALEXANDER JAMES', 'M', 'SORIANO', 'MALE', '09455592010', '21-0922-819'),
(30, 'DARREIL', 'N', 'ABALOS', 'MALE', '09295848963', '21-0155-730'),
(113, 'Ako', 'M', 'Who', 'MALE', '09260521447', '18-0539-835');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`bgID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`genderID`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imgID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `bgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `genderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `imgID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
