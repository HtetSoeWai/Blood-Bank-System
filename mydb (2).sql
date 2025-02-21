-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 03:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `blood_search` (IN `blood` VARCHAR(50))   SELECT * FROM blood_bank WHERE blood_type=blood and receiver_id=0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_blood_bank` ()   SELECT * from blood_bank$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_donate_history` (IN `email` VARCHAR(100))   SELECT donor_blood,donor_date FROM donor_detail WHERE donor_email=email and donor_about='read'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_donor_list` ()   SELECT * from donor_detail$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_need_blood` (IN `blood` VARCHAR(50))   SELECT * from donor_detail JOIN blood_bank ON donor_detail.donor_id=blood_bank.donor_id  WHERE blood_bank.receiver_id=0 AND blood_bank.blood_type=blood$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_receiver_list` ()   SELECT * from receiver_detail$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `view_receive_history` (IN `email` VARCHAR(100))   SELECT receiver_blood,receiver_date FROM receiver_detail WHERE receiver_email=email and receiver_about='read'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `aid` int(11) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`aid`, `aemail`, `apassword`) VALUES
(1, 'chocomoco123@gmail.com', 'c123456');

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `blood_type` varchar(50) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`blood_type`, `total`) VALUES
('A+', 1),
('A-', 1),
('AB+', 1),
('AB-', 2),
('B+', 4),
('B-', 0),
('O+', 0),
('O-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE `blood_bank` (
  `blood_id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `donation_date` varchar(100) NOT NULL,
  `receive_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`blood_id`, `donor_id`, `blood_type`, `receiver_id`, `donation_date`, `receive_date`) VALUES
(1, 1, 'A+', 1, '2023-02-15 20:15:47', '2023-02-15 15:01:00'),
(2, 2, 'AB+', 0, '2023-02-15 20:23:41', 'NULL'),
(3, 3, 'B+', 0, '2023-02-15 21:32:16', 'NULL'),
(4, 4, 'A-', 0, '2023-02-15 21:32:19', 'NULL'),
(5, 5, 'AB-', 0, '2023-02-15 21:32:24', 'NULL'),
(6, 6, 'B+', 0, '2023-02-15 21:32:27', 'NULL'),
(7, 7, 'AB-', 0, '2023-02-15 21:32:35', 'NULL'),
(8, 8, 'B+', 0, '2023-02-15 21:32:41', 'NULL'),
(9, 9, 'B+', 2, '2023-02-15 21:32:45', '2023-02-15 17:16:52'),
(10, 10, 'A+', 0, '2023-02-16 07:24:07', 'NULL'),
(11, 11, 'AB+', 3, '2023-02-16 07:24:10', '2023-02-16 01:54:22'),
(12, 12, 'B+', 0, '2023-02-16 07:24:13', 'NULL');

--
-- Triggers `blood_bank`
--
DELIMITER $$
CREATE TRIGGER `retrieve_blood` AFTER UPDATE ON `blood_bank` FOR EACH ROW UPDATE blood SET total=total-1 WHERE blood_type=new.blood_type
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_receiver_detail` AFTER UPDATE ON `blood_bank` FOR EACH ROW UPDATE receiver_detail   SET receiver_about='read' WHERE receiver_id=new.receiver_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `donor_detail`
--

CREATE TABLE `donor_detail` (
  `donor_id` int(11) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `donor_phone` varchar(50) NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  `donor_age` varchar(50) NOT NULL,
  `donor_gender` varchar(50) NOT NULL,
  `donor_blood` varchar(50) NOT NULL,
  `donor_address` varchar(200) NOT NULL,
  `donor_date` varchar(100) NOT NULL,
  `donor_about` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_detail`
--

INSERT INTO `donor_detail` (`donor_id`, `donor_name`, `donor_phone`, `donor_email`, `donor_age`, `donor_gender`, `donor_blood`, `donor_address`, `donor_date`, `donor_about`) VALUES
(1, 'May Thandar Htun', '09784996110', 'may123@gmail.com', '21', 'Female', 'A+', 'Pathein', '2023-02-15', 'read'),
(2, 'Kyi Phyu Htun', '09784996110', 'may123@gmail.com', '23', 'Female', 'AB+', 'Pathein', '2023-02-15', 'read'),
(3, 'Hsu Myat', '09786345876', 'Hsu123@gmail.com', '19', 'Female', 'B+', 'Pathein', '2023-02-15', 'read'),
(4, 'Su Wai', '09789564324', 'su123@gmail.com', '25', 'Female', 'A-', 'Pathein', '2023-02-15', 'read'),
(5, 'Hsu Myat Thiri', '09789564324', 'su123@gmail.com', '22', 'Female', 'AB-', 'Pathein', '2023-02-15', 'read'),
(6, 'Chuu Eain Si', '09777999111', 'chuu123@gmail.com', '22', 'Female', 'B+', 'Pathein', '2023-02-15', 'read'),
(7, 'Nyan Lin Set', '09786321456', 'nyan123@gmail.com', '21', 'Male', 'AB-', 'Pathein', '2023-02-15', 'read'),
(8, 'Nyein Htet Htet Kyaw', '09786321456', 'nyan123@gmail.com', '21', 'Female', 'B+', 'Pathein', '2023-02-15', 'read'),
(9, 'Su Shwe Zin', '09670675432', 'su123@gmail.com', '21', 'Female', 'B+', 'Pathein', '2023-02-15', 'read'),
(10, 'Aung Kyaw Kyaw ', '09784567231', 'akk123@gmail.com', '30', 'Male', 'A+', 'Pathein', '2023-02-16', 'read'),
(11, 'Tin Tin Yu', '09784567231', 'akk123@gmail.com', '32', 'Female', 'AB+', 'Pathein', '2023-02-16', 'read'),
(12, 'Htun Htun Oo', '09675432345', 'htun123@gmail.com', '35', 'Male', 'B+', 'Pathein', '2023-02-16', 'read'),
(13, 'Kyaw Zin Thu', '09786543932', 'kz123@gmail.com', '21', 'Male', 'A-', 'Pathein', '2023-02-16', 'pending'),
(14, 'Khin Pa Pa Thein', '09786453675', 'pa123@gmail.com', '21', 'Female', 'O+', 'Pathein', '2023-02-16', 'pending'),
(15, 'Ei Phyu Khaing', '09786453675', 'pa123@gmail.com', '21', 'Female', 'O+', 'Pathein', '2023-02-16', 'pending');

--
-- Triggers `donor_detail`
--
DELIMITER $$
CREATE TRIGGER `add_blood` AFTER UPDATE ON `donor_detail` FOR EACH ROW UPDATE blood SET total=total+1 WHERE blood_type=new.donor_blood
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `add_blood_bank` AFTER UPDATE ON `donor_detail` FOR EACH ROW INSERT into blood_bank(donor_id,blood_type,receiver_id,donation_date,receive_date) VALUES(new.donor_id,new.donor_blood,0,NOW(),'NULL')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `receiver_detail`
--

CREATE TABLE `receiver_detail` (
  `receiver_id` int(11) NOT NULL,
  `receiver_name` varchar(100) NOT NULL,
  `receiver_phone` varchar(50) NOT NULL,
  `receiver_email` varchar(100) NOT NULL,
  `receiver_age` varchar(50) NOT NULL,
  `receiver_gender` varchar(50) NOT NULL,
  `receiver_blood` varchar(50) NOT NULL,
  `receiver_address` varchar(200) NOT NULL,
  `receiver_date` varchar(100) NOT NULL,
  `receiver_about` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver_detail`
--

INSERT INTO `receiver_detail` (`receiver_id`, `receiver_name`, `receiver_phone`, `receiver_email`, `receiver_age`, `receiver_gender`, `receiver_blood`, `receiver_address`, `receiver_date`, `receiver_about`) VALUES
(1, 'Aung Myint Thu', '09675432345', 'aung123@gmail.com', '25', 'Male', 'A+', 'Pathein', '2023-02-15', 'read'),
(2, 'Hnin Wai', '09786435412', 'hw123@gmail.com', '25', 'Female', 'B+', 'Pathein', '2023-02-15', 'read'),
(3, 'Htun Aung', '09786342543', 'ha123@gmail.com', '25', 'Male', 'AB+', 'Pathein', '2023-02-16', 'read'),
(4, 'ThuZar', '09658432123', 'tz123@gmail.com', '49', 'Female', 'AB+', 'Pathien', '2023-02-16', 'pending'),
(5, 'Pyae Sone', '09679543654', 'ps123@gmail.com', '34', 'Male', 'A+', 'Pathien', '2023-02-16', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `uid` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(50) NOT NULL,
  `upassword1` varchar(100) NOT NULL,
  `upassword2` varchar(100) NOT NULL,
  `ugender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`uid`, `fullname`, `username`, `uemail`, `uphone`, `upassword1`, `upassword2`, `ugender`) VALUES
(1, 'May Thandar Htun', 'may', 'may123@gmail.com', '09784996110', 'May123456#', 'May123456#', 'Female'),
(2, 'Aung Myint Thu', 'aunglay', 'aung123@gmail.com', '09675432345', 'Aung123456#', 'Aung123456#', 'Male'),
(4, 'Hsu Myat', 'hsumyat', 'Hsu123@gmail.com', '09786345876', 'H123456#', 'H123456#', 'Female'),
(5, 'Su Wai', 'suwai', 'su123@gmail.com', '09789564324', 'S123456#', 'S123456#', 'Female'),
(6, 'Chuu Eain Si', 'chuu', 'chuu123@gmail.com', '09777999111', 'C123456#', 'C123456#', 'Female'),
(7, 'Nyan Lin Set', 'nyan_gyi', 'nyan123@gmail.com', '09786321456', 'N123456#', 'N123456#', 'Male'),
(8, 'Su Shwe Zin', 'ah_shwe', 'su123@gmail.com', '09670675432', 'S123456#', 'S123456#', 'Female'),
(9, 'Aung Kyaw Kyaw ', 'akk', 'akk123@gmail.com', '09784567231', 'A123456#', 'A123456#', 'Male'),
(10, 'Htun Htun Oo', 'htun', 'htun123@gmail.com', '09675432345', 'H123456#', 'H123456#', 'Male'),
(11, 'Hnin Wai', 'hninwai', 'hw123@gmail.com', '09786435412', 'H123456#', 'H123456#', 'Female'),
(12, 'Htun Aung', 'ha', 'ha123@gmail.com', '09786342543', 'H123456#', 'H123456#', 'Male'),
(13, 'ThuZar', 'tz', 'tz123@gmail.com', '09658432123', 'T123456#', 'T123456#', 'Female'),
(14, 'Kyaw Zin Thu', 'kz', 'kz123@gmail.com', '09786543932', 'K123456#', 'K123456#', 'Male'),
(15, 'Khin Pa Pa Thein', 'papa', 'pa123@gmail.com', '09786453675', 'P123456#', 'P123456#', 'Female'),
(16, 'Pyae Sone', 'ps', 'ps123@gmail.com', '09679543654', 'P123456#', 'P123456#', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`blood_id`);

--
-- Indexes for table `donor_detail`
--
ALTER TABLE `donor_detail`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `receiver_detail`
--
ALTER TABLE `receiver_detail`
  ADD PRIMARY KEY (`receiver_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `blood_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `donor_detail`
--
ALTER TABLE `donor_detail`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `receiver_detail`
--
ALTER TABLE `receiver_detail`
  MODIFY `receiver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
