-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 08:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visiondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert_router`
--

CREATE TABLE `advert_router` (
  `ID` int(11) NOT NULL,
  `Client_Name` varchar(250) NOT NULL,
  `Airing_Time` varchar(250) NOT NULL,
  `Payment_Status` varchar(250) NOT NULL,
  `DCA` varchar(250) NOT NULL,
  `Remark` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advert_timing`
--

CREATE TABLE `advert_timing` (
  `ID` int(11) NOT NULL,
  `Advert_ID` varchar(50) NOT NULL,
  `AdvertName` varchar(250) NOT NULL,
  `Slot_ID` varchar(50) NOT NULL,
  `Slot_1` varchar(50) NOT NULL,
  `Slot_2` varchar(50) DEFAULT NULL,
  `Slot_3` varchar(50) DEFAULT NULL,
  `Slot_4` varchar(50) DEFAULT NULL,
  `Slot_5` varchar(50) DEFAULT NULL,
  `Slot_6` varchar(50) DEFAULT NULL,
  `Slot_7` varchar(50) DEFAULT NULL,
  `Slot_8` varchar(50) DEFAULT NULL,
  `Slot_9` varchar(50) DEFAULT NULL,
  `Slot_10` varchar(50) DEFAULT NULL,
  `Slot_11` varchar(50) DEFAULT NULL,
  `Slot_12` varchar(50) DEFAULT NULL,
  `Slot_13` varchar(50) DEFAULT NULL,
  `Slot_14` varchar(50) DEFAULT NULL,
  `Slot_15` varchar(50) DEFAULT NULL,
  `Slot_16` varchar(50) DEFAULT NULL,
  `Slot_17` varchar(50) DEFAULT NULL,
  `Slot_18` varchar(50) DEFAULT NULL,
  `Slot_19` varchar(50) DEFAULT NULL,
  `Slot_20` varchar(50) DEFAULT NULL,
  `Slot_21` varchar(50) DEFAULT NULL,
  `Slot_22` varchar(50) DEFAULT NULL,
  `Slot_23` varchar(50) DEFAULT NULL,
  `Slot_24` varchar(50) DEFAULT NULL,
  `Time_1` varchar(50) NOT NULL,
  `Time_2` varchar(50) DEFAULT NULL,
  `Time_3` varchar(50) DEFAULT NULL,
  `Time_4` varchar(50) DEFAULT NULL,
  `Time_5` varchar(50) DEFAULT NULL,
  `Time_6` varchar(50) DEFAULT NULL,
  `Time_7` varchar(50) DEFAULT NULL,
  `Time_8` varchar(50) DEFAULT NULL,
  `Time_9` varchar(50) DEFAULT NULL,
  `Time_10` varchar(50) DEFAULT NULL,
  `Time_11` varchar(50) DEFAULT NULL,
  `Time_12` varchar(50) DEFAULT NULL,
  `Time_13` varchar(50) DEFAULT NULL,
  `Time_14` varchar(50) DEFAULT NULL,
  `Time_15` varchar(50) DEFAULT NULL,
  `Time_16` varchar(50) DEFAULT NULL,
  `Time_17` varchar(50) DEFAULT NULL,
  `Time_18` varchar(50) DEFAULT NULL,
  `Time_19` varchar(50) DEFAULT NULL,
  `Time_20` varchar(50) DEFAULT NULL,
  `Time_21` varchar(50) DEFAULT NULL,
  `Time_22` varchar(50) DEFAULT NULL,
  `Time_23` varchar(50) DEFAULT NULL,
  `Time_24` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `advert_t_day`
--

CREATE TABLE `advert_t_day` (
  `ID` int(11) NOT NULL,
  `AdvertName` varchar(50) NOT NULL,
  `Monday` varchar(50) NOT NULL,
  `Tuesday` varchar(50) NOT NULL,
  `Wednesday` varchar(50) NOT NULL,
  `Thursday` varchar(50) NOT NULL,
  `Friday` varchar(50) NOT NULL,
  `Saturday` varchar(50) NOT NULL,
  `Sunday` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `ID` int(11) NOT NULL,
  `Client_ID` varchar(50) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `Type` varchar(50) DEFAULT NULL,
  `Payment_Mode` varchar(50) DEFAULT NULL,
  `First_Payment` varchar(50) DEFAULT NULL,
  `Second_Payment` varchar(50) DEFAULT NULL,
  `Third_Payment` varchar(50) DEFAULT NULL,
  `Sec_pay_Due` varchar(50) DEFAULT NULL,
  `Third_Pay_Due` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ended_adverts`
--

CREATE TABLE `ended_adverts` (
  `ID` int(200) NOT NULL,
  `Advert_ID` varchar(100) NOT NULL,
  `Advert_Name` varchar(100) NOT NULL,
  `Date_Played` varchar(100) NOT NULL,
  `Time_Played` varchar(100) NOT NULL,
  `Station_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `User_Name` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Img` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `User_Name`, `Password`, `Img`) VALUES
(1, 'Kamal', '@systemadmin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mon_end_adv`
--

CREATE TABLE `mon_end_adv` (
  `ID` int(11) NOT NULL,
  `Advert_ID` varchar(100) NOT NULL,
  `Advert_Name` varchar(200) NOT NULL,
  `Date_Played` varchar(100) NOT NULL,
  `Time_Played` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paginate`
--

CREATE TABLE `paginate` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `ID` int(11) NOT NULL,
  `Prog_Name` varchar(100) NOT NULL,
  `Prog_Type` varchar(100) DEFAULT NULL,
  `Guest_one` varchar(100) DEFAULT NULL,
  `Guest_one_num` varchar(100) DEFAULT NULL,
  `Guest_two` varchar(100) DEFAULT NULL,
  `Guest_two_num` varchar(100) DEFAULT NULL,
  `Guest_three` varchar(100) DEFAULT NULL,
  `Guest_three_num` varchar(100) DEFAULT NULL,
  `Guest_four` varchar(100) DEFAULT NULL,
  `Guest_four_num` varchar(100) DEFAULT NULL,
  `Guest_five` varchar(100) DEFAULT NULL,
  `Guest_five_num` varchar(100) DEFAULT NULL,
  `Guest_six` varchar(100) DEFAULT NULL,
  `Guest_six_num` varchar(100) DEFAULT NULL,
  `Prog_Date` varchar(100) DEFAULT NULL,
  `Prog_Time` varchar(100) DEFAULT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`ID`, `Prog_Name`, `Prog_Type`, `Guest_one`, `Guest_one_num`, `Guest_two`, `Guest_two_num`, `Guest_three`, `Guest_three_num`, `Guest_four`, `Guest_four_num`, `Guest_five`, `Guest_five_num`, `Guest_six`, `Guest_six_num`, `Prog_Date`, `Prog_Time`, `Station_ID`) VALUES
(1, 'Babbar Magana', 'Live', 'Salisu Mohammed', '08069156969', 'Abdullahi Aliyu', '08038201916', '', '', '', '', '', '', '', '', '2018-03-29', '10:00 AM', 'VKAT4050'),
(2, 'Babbar Magana', 'Live', 'Malam Dauda kurfi', '', 'Murtala Ibrahim Kafur', '', '', '', '', '', '', '', '', '', '2018-04-02', '10:00 AM', 'VKAT4050'),
(3, 'Majalisar Miya faru', 'Live', 'Umar Sabiu', '07065540609', 'Abdurahman Kabir Jani', '08038840655', 'Imran Hamisu Matazu', '08067718772', '', '', '', '', '', '', '2018-04-01', '11:00 AM', 'VKAT4050'),
(4, 'ina Mafita', 'Live', 'Alhaji Mustafa Lawal', '08037816752', 'Hajiya Jamila Sulaiman', '08131548815', '', '', '', '', '', '', '', '', '2018-04-02', '03:00 PM', 'VKAT4050'),
(5, 'kOWA YA GYARA', 'Live', 'aLHAJI mUSTAFA mAIKUDI', '', '', '', '', '', '', '', '', '', '', '', '2018-04-06', '04:30 PM', 'VKAT4050'),
(6, 'Malajisar mi ya faru', 'Live', 'Imrana Hamisu Matazu', '08067718772', 'Abdurahman Kabir Jani', '08038840655', 'Umar Sabiu Ahmed', '07065540609', '', '', '', '', '', '', '2018-04-01', '11:00 AM', 'VKAT4050'),
(7, 'Sports news review', 'Live', 'Umar Sabiu', '08065853632', 'Mohammed Babangida', '08035264503', '', '', '', '', '', '', '', '', '2018-04-02', '01:00 PM', 'VKAT4050'),
(8, 'Ina Mafita', 'Live', 'Alhaji Mustafa Lawal', '08037818752', 'Hajiya Jamila Sulaiman ', '08131548875', '', '', '', '', '', '', '', '', '2018-04-02', '03:00 PM', 'VKAT4050'),
(9, 'Law and Order', 'Live', 'Paul Terve Gbande', '07038168800', '', '', '', '', '', '', '', '', '', '', '2018-04-03', '01:00 PM', 'VKAT4050'),
(10, 'Ina Mafita', 'Live', 'Malam Tukur Isa Mani', '0703037337', 'Alhaji Muhammad Ali Madugu', '09035970687', '', '', '', '', '', '', '', '', '2018-04-09', '03:00 PM', 'VKAT4050'),
(11, 'filin Wasa Kwakwalwa', 'Live', 'Ibrahim Adam', '08035320597', 'Sulaiman Maikaji', '08063969366', 'Hafsat Sani Jibia', '07033917025', 'Hadiza Sani Jibia', '08069277769', '', '', '', '', '2018-04-07', '05:00 PM', 'VKAT4050'),
(12, 'Majalisar Mi ya faru', 'Program Type', 'Mohammed Babangida', '08035264530', 'Mohammed Chedi', '', '', '', '', '', '', '', '', '', '2018-04-08', '11:00 PM', 'VKAT4050'),
(13, 'Babbar magana ', 'Live', 'Shehu Usman Bala Zango', '07034656392', 'Alhaji Sani Garba Riko', '08035930119', '', '', '', '', '', '', '', '', '2018-04-12', '10:05 AM', 'VKAT4050'),
(14, 'Babbar Magana ', 'Live', 'Samaila Balarabe', '08036185648', 'Abdullahi Bala Husaini', '08032982092', 'Ibrahim Balarabe', '08033120250', '', '', '', '', '', '', '2018-04-13', '11:00 AM', 'VKAT4050'),
(15, 'Babbar magana', 'Live', 'Abdullahi Aliyu', '08038201916', 'Umar Sabiu Ahmed', '07065540690', '', '', '', '', '', '', '', '', '2018-04-11', '10:00 AM', 'VKAT4050'),
(16, 'Ko Wane Tsuntsu', 'Recorded', 'Murtala Ibrahim Kafur', '07046222225', '', '', '', '', '', '', '', '', '', '', '2018-04-11', '08:30 PM', 'VKAT4050'),
(17, 'Ko wanu Tsuntsu', 'Recorded', 'Yushau Abubakar Mani', '08038856868', 'Alhaji Murtala Ibrahim Kafur', '07046222225', '', '', '', '', '', '', '', '', '2018-04-11', '10:05 AM', 'VKAT4050'),
(18, 'Babbar Magana ', 'Live', 'Nura Aliyu Batsari', '08037380052', 'Mansur Halilu', '08032470629', '', '', '', '', '', '', '', '', '2018-04-16', '10:05 AM', 'VKAT4050'),
(19, 'Zauren Majal1isa', 'Live', 'Al Amin Lawal Batsari', '07033331948', 'Abbas Tukur', '09037857055', '', '', '', '', '', '', '', '', '2018-04-14', '02:00 PM', 'VKAT4050'),
(20, 'Babbar Magana', 'Live', 'Alhaji Jibril Ibrahim Zarewa', '', 'Nura Aliyu Bbatsari', '', '', '', '', '', '', '', '', '', '2018-04-03', '10:00 AM', 'VKAT4050'),
(21, 'Babbar Magaga', 'Live', 'Samaila Balarabe', '', 'Husaini Bala Abdullahi', '', 'Ibrahim Balarabe', '', '', '', '', '', '', '', '2018-04-09', '10:00 AM', 'VKAT4050'),
(22, 'Duniyar Matasa', 'Live', 'Ibrahim Tijjani', '08036576286', 'Yazid Na-Sudan', '08060767379', '', '', '', '', '', '', '', '', '2018-04-17', '09:00 PM', 'VKAT4050'),
(23, 'Babbar Magana', 'Live', 'Abdulaziz Maituraka', '08022068788', 'Sani Garba Riko', '08035930119', '', '', '', '', '', '', '', '', '2018-04-20', '10:05 AM', 'VKAT4050'),
(24, 'Kowa ya gyara', 'Live', 'Alhaji Mustafa Maikudi', '08036057045', '', '', '', '', '', '', '', '', '', '', '2018-04-20', '4.30pm', 'VKAT4050'),
(25, 'majalisar mi ya faru', 'Live', 'Mohammed Babangida', '08035264503', 'Umar Sabiu', '07065540690', '', '', '', '', '', '', '', '', '2018-04-22', '11:00 AM', 'VKAT4050'),
(26, 'Taurari', 'Live', 'Aliyu Isa Nata', '08172705199', '', '', '', '', '', '', '', '', '', '', '2018-04-21', '10:00 AM', 'VKAT4050'),
(27, 'Babbar Magana', 'Live', 'Bar. Sada Abdullahi', '08036920761', 'Gambo Garba', '08036989635', '', '', '', '', '', '', '', '', '2018-04-23', '10:00 AM', 'VKAT4050'),
(28, 'Health is Wealth', 'Recorded', 'Malam Abdulhadi Abdulkadir', '08060821551', '', '', '', '', '', '', '', '', '', '', '2018-04-21', '12:30 PM', 'VKAT4050'),
(29, 'Achievers corner', 'Recorded', 'Aliyu Sabiu Muduru', '08068660667', '', '', '', '', '', '', '', '', '', '', '2018-04-23', '8.30am', 'VKAT4050'),
(30, 'Ina Mafita', 'Live', 'Malam Zakariya', '08062212033', '', '', '', '', '', '', '', '', '', '', '2018-04-23', '03:00 PM', 'VKAT4050'),
(31, 'Babbar Magana', 'Live', 'Salisu Mohammed', '08069156969', 'Comr. Abba Sada', '08036472731', '', '', '', '', '', '', '', '', '2018-04-24', '10:00 AM', 'VKAT4050'),
(32, 'Law and Order', 'Live', 'Mustapha Maikudi', '08036057045', '', '', '', '', '', '', '', '', '', '', '2018-04-24', '01:00 PM', 'VKAT4050'),
(33, 'Babbar Magana', 'Live', 'Saifullahi Kabir', '08032331255', 'Abdullahi Muhammad', '08036592306', '', '', '', '', '', '', '', '', '2018-04-25', '10:00 AM', 'VKAT4050'),
(34, 'Babbar Magana', 'Live', 'Dr Badamasi Charanci. Commisioner of education', '07067780008', '', '', '', '', '', '', '', '', '', '', '2018-04-26', '10:00 AM', 'VKAT4050'),
(35, 'Aladar Aure', 'Recorded', 'Hajiya Amina Dahiru Muhammed', '08163602753', 'Malama Zainab Ismail Baba', '08035891239', '', '', '', '', '', '', '', '', '2018-04-25', '02:30 PM', 'VKAT4050'),
(36, 'Dana Gaba', 'Recorded', 'Abdu Abdullahi Charanci', '', '', '', '', '', '', '', '', '', '', '', '2018-04-26', '', 'VKAT4050'),
(37, 'lABARIN wASSANNI', 'Live', 'Mohammed Babangida', '08035264503', 'Mohammed Habib Umar', '09062621526', '', '', '', '', '', '', '', '', '2018-04-26', '05:00 PM', 'VKAT4050'),
(38, 'Babbar Magana', 'Live', 'Isa Saidu Barda', '08130696966', '', '', '', '', '', '', '', '', '', '', '2018-04-27', '10:00 AM', 'VKAT4050'),
(39, 'Hasken Musulunci', 'Recorded', 'Ibrahim Sabiu Jibia', '', '', '', '', '', '', '', '', '', '', '', '2018-04-27', '08:00 AM', 'VKAT4050'),
(40, 'Kowa ya gyara', 'Recorded', 'Alhaji Bashir Dangambo', '08030629699', 'Malam Aminu Malumfashi', '', '', '', '', '', '', '', '', '', '2018-04-27', '4.30pm', 'VKAT4050'),
(41, 'Kowa ya Gyara', 'Live', 'Mustafa Maikudi', '08036057045', '', '', '', '', '', '', '', '', '', '', '2018-04-27', '4.30pm', 'VKAT4050'),
(42, 'Taurari', 'Live', 'Mahbub Sani Ala', '08134996627', '', '', '', '', '', '', '', '', '', '', '2018-04-28', '', 'VKAT4050'),
(43, 'Health is Wealth', 'Live', 'Mahbub Sani Ala', '08134996627', '', '', '', '', '', '', '', '', '', '', '2018-04-28', '12:30 PM', 'VKAT4050'),
(44, 'Reggae Rock Steady', 'Recorded', '', '', '', '', '', '', '', '', '', '', '', '', '2018-04-28', '12:00 PM', 'VKAT4050'),
(45, 'Majalisar mi ya Faru', 'Live', 'Sani Garba Riko', '08064041363', '', '', '', '', '', '', '', '', '', '', '2018-04-28', '02:00 PM', 'VKAT4050'),
(46, 'Noma na Duke', 'Recorded', 'Alhaji Abdulaziz Lawal', '08149952827', '', '', '', '', '', '', '', '', '', '', '2018-04-25', '01:00 PM', 'VKAT4050'),
(47, 'Hanjin Jimina', 'Recorded', 'Aishatu Bare-Bare', '09071173235', 'Aminu Lawal Koshe', '09071173235', '', '', '', '', '', '', '', '', '2018-04-28', '11:00 PM', 'VKAT4050'),
(48, 'Wasa Kwakwalwa', 'Live', 'Rufai Abubakar', '08066279193', 'Abdurrahman Jarmai', '08140715970', 'Lubabatu Auta Ingawa', '08061303659', '', '', '', '', '', '', '2018-04-28', '05:00 PM', 'VKAT4050'),
(49, 'Majalisar Miya Faru', 'Live', 'Mohammed Habib', '08062621526', 'Abdurahman Jani', '08038840655', 'Muhammed Babangida', '08038254503', '', '', '', '', '', '', '2018-04-29', '11:00 AM', 'VKAT4050'),
(50, 'Hattara Da Hanya', 'Live', 'Jamilu Isyaku', '07060752555', '', '', '', '', '', '', '', '', '', '', '2018-04-29', '02:00 PM', 'VKAT4050'),
(51, 'Filin Fatawa', 'Recorded', 'Dr Muhammad Muslim Ibrahim', '0816943888', '', '', '', '', '', '', '', '', '', '', '2018-04-28', '06:00 PM', 'VKAT4050'),
(52, 'Hanjin Jimina', 'Recorded', 'Aishatu Bare-Bare', '', '', '', '', '', '', '', '', '', '', '', '2018-04-29', '11:00 PM', 'VKAT4050'),
(53, 'Babbar Magana', 'Live', 'Malam Husamatu Mohammed Abbas', ' 07037417785', 'Bar. Muhammad Zakariya', '08067043058', '', '', '', '', '', '', '', '', '2018-04-30', '10:00 AM', 'VKAT4050'),
(54, 'Tafiya da Gwanin Ka', 'Recorded', 'Alhaji Ibrahim Shehu Musawa', '', '', '', '', '', '', '', '', '', '', '', '2018-04-30', '09:30 AM', 'VKAT4050'),
(55, 'Babbar Magana', 'Live', 'Abubakar Yusuf', '08065527437', 'Dr Abdussalam Abubakar', '07065770247', '', '', '', '', '', '', '', '', '2018-05-01', '10:00 AM', 'VKAT4050'),
(56, 'B abbar Magana', 'Live', 'Aliyu Abdullahi Matazu', '08036780716', 'Tanimu Lawal Saulawa', '08035861454', '', '', '', '', '', '', '', '', '2018-05-02', '10:00 AM', 'VKAT4050'),
(57, 'Duniyar Matasa', 'Recorded', 'Malam Aminu Sulaiman', '08034583748', 'Mansir Halilu', '08032470629', '', '', '', '', '', '', '', '', '2018-05-01', '09:00 PM', 'VKAT4050'),
(58, 'Munji mun Gani', 'Recorded', 'Zahradden Dutsen-Kura', '', '', '', '', '', '', '', '', '', '', '', '2018-05-02', '8.30am', 'VKAT4050'),
(59, 'Noma na duke', 'Recorded', 'Dr Aliyu Yahaya', '08189232425', '', '', '', '', '', '', '', '', '', '', '2018-05-02', '01:00 PM', 'VKAT4050'),
(60, 'Aladar Aure', 'Recorded', 'Abdurazak Umar', '08032758932', '', '', '', '', '', '', '', '', '', '', '2018-05-02', '03:00 PM', 'VKAT4050'),
(61, 'Babbar Magana', 'Recorded', 'Dr  Muktar Alkasim', '08039674173', 'Ibrahim Balarabe', '08033120250', '', '', '', '', '', '', '', '', '2018-05-03', '10:05 AM', 'VKAT4050'),
(62, 'Taurari', 'Live', 'Aliyu Inuwa Aleega', '08164952568', '', '', '', '', '', '', '', '', '', '', '2018-05-05', '11:00 AM', 'VKAT4050'),
(63, 'Majalisar Miya Faru', 'Live', 'Nuraddin Aliyu Batsari', '08026428088', 'Sani Garaba Riko', '08035930119', '', '', '', '', '', '', '', '', '2018-05-05', '12:00 PM', 'VKAT4050'),
(64, 'Mu san addinin mu', 'Live', 'Malam Aminu Yammawa', '', '', '', '', '', '', '', '', '', '', '', '2018-05-05', '03:00 PM', 'VKAT4050'),
(65, 'Health is Wealth', 'Recorded', 'Dr Yahaya Muhammad', '07035724971', 'Adeyanju Adeyinka', '', '', '', '', '', '', '', '', '', '2018-05-05', '12:30 PM', 'VKAT4050'),
(66, 'Babbar Magana', 'Live', 'Abubakar Ahmed Danbaiwa', '08034772923', 'Kabir Ahmad Rimi', '08034501338', '', '', '', '', '', '', '', '', '2018-05-07', '10:00 AM', 'VKAT4050'),
(67, 'Achievers Corner', 'Recorded', 'Dr Muttaka Rabe Darmma', '08099999415', '', '', '', '', '', '', '', '', '', '', '2018-05-07', '8.30am', 'VKAT4050'),
(68, 'Law and Order', 'Live', ' Jibril Ibrahim Zarewa                                 Zarewa', '08037006603', '', '', '', '', '', '', '', '', '', '', '2018-05-08', '01:00 PM', 'VKAT4050'),
(69, 'Babbar Magana ', 'Live', 'Samaila Balarabe', '08036185648', 'Janaidu Abdulkadir', '08064300646', '', '', '', '', '', '', '', '', '2018-05-09', '10:00 AM', 'VKAT4050'),
(70, 'Duniyar Matasa', 'Live', 'Jabir Lawal Kankiya', '08033697926', 'Naufal Ahmad', '08132277510', '', '', '', '', '', '', '', '', '2018-05-08', '09:00 PM', 'VKAT4050'),
(71, 'Filin Fatawa', 'Live', 'Dr Muhammad Muslim Ibrahim', '08160943888', '', '', '', '', '', '', '', '', '', '', '2018-05-05', '', 'VKAT4050'),
(72, 'Babbar Magana', 'Live', 'Malam Musa Muhammed Al kashinawi', '08035651970', 'Dr Muhammed Al Makky Hassan R/Dadi', '08088010737', '', '', '', '', '', '', '', '', '2018-05-10', '10:00 AM', 'VKAT4050'),
(73, 'Taurari', 'Live', 'Isa Bawa Doro', '08067880459', '', '', '', '', '', '', '', '', '', '', '2018-05-12', '10:00 AM', 'VKAT4050'),
(74, 'Zauren Majalisa', 'Live', 'Aminu Ibrahim', '08035873273', 'Abbas Tukur', '09037857055', '', '', '', '', '', '', '', '', '2018-05-12', '02:00 PM', 'VKAT4050'),
(75, 'Majalisar Miya Faru', 'Live', 'Abdurahman Jani', '08033840655', 'Mohammed Habib', '08062621526', '', '', '', '', '', '', '', '', '2018-05-13', '11:00 AM', 'VKAT4050'),
(76, 'Don Marayu', 'Recorded', 'Malam Jamilu', '08135585851', '', '', '', '', '', '', '', '', '', '', '2018-05-13', '01:00 PM', 'VKAT4050'),
(77, 'Babbar Magana', 'Live', 'Sani Garba Riko', '08064041363', 'Yushau Mani', '08020910006', '', '', '', '', '', '', '', '', '2018-05-14', '10:00 AM', 'VKAT4050'),
(78, 'Achiever\'s Corner', 'Recorded', 'Muttaka Rabe Darma ', '0809999415', '', '', '', '', '', '', '', '', '', '', '2018-05-14', '8.30am', 'VKAT4050'),
(79, 'Dana Gaba', 'Recorded', 'Malam Rabiu Ladan', '08130502147', '', '', '', '', '', '', '', '', '', '', '2018-05-12', '08:00 PM', 'VKAT4050'),
(80, 'Babbar Magana', 'Live', 'Mohammed Alsalafi', '08031644933', 'Malam Abu Amar', '08032875596', '', '', '', '', '', '', '', '', '2018-05-16', '10:00 AM', 'VKAT4050'),
(81, 'Babbar Magana', 'Live', 'Ibrahim Balarabe', '08033120250', 'Sani Garba Riko', '08036830119', '', '', '', '', '', '', '', '', '2018-05-21', '06:10 AM', 'VKAT4050'),
(82, 'Babbar Magana', 'Live', 'Dr Bashir Aliyu Sallau', '', 'Ibrahim Yunusa', '08160725697', '', '', '', '', '', '', '', '', '2018-05-22', '06:10 AM', 'VKAT4050'),
(83, 'Babbar Magana', 'Live', 'Alhgaji Sada Mohammed Sada', '08037040854', 'Dr Aliyu Mohd El Ladan', '08035264503', '', '', '', '', '', '', '', '', '2018-05-23', '10:00 AM', 'VKAT4050'),
(84, 'Babbar Magana', 'Live', 'Samaila Balarabe', '08036185648', 'Abdulbaki Jari', '08035424321', '', '', '', '', '', '', '', '', '2018-06-18', '10:00 AM', 'VKAT4050'),
(85, 'Babbar Magana', 'Live', 'Abubakar Rafidadi', '08034421749', '', '', '', '', '', '', '', '', '', '', '2018-06-19', '10:00 AM', 'VKAT4050'),
(86, 'Ina Mafita', 'Live', 'Malam Zakariya Aliyu', '08062212033', '', '', '', '', '', '', '', '', '', '', '2018-06-18', '03:00 PM', 'VKAT4050'),
(87, 'Startimes World Cup 2018', 'Live', 'Mohammed Babangida', '08035264503', 'Mohammed Habib', '07043435597', '', '', '', '', '', '', '', '', '2018-06-19', '12:00 PM', 'VKAT4050'),
(88, 'Babbar Magana', 'Live', 'DrMujtaba Muhammed', '08036277391', 'Zainab Labaran', '08061188284', '', '', '', '', '', '', '', '', '2018-06-20', '10:00 AM', 'VKAT4050'),
(89, 'Babbar Magana', 'Live', 'Aminu Ibrahim El Ladan', '08035873273', 'Sabiu Yau Abdullahi', '08069767816', '', '', '', '', '', '', '', '', '2018-06-21', '10:00 AM', 'VKAT4050'),
(90, 'Babbar Magana', 'Live', 'Jamilu Abdusalam', '08069289697', 'Murtala Kafur', '08032795261', '', '', '', '', '', '', '', '', '2018-06-22', '10:00 AM', 'VKAT4050'),
(91, 'Road to Russia', 'Live', 'Umar Sabiu', '08065853632', 'Mohammed Babangida', '08035264503', 'Mohammed Habib', '08062621626', '', '', '', '', '', '', '2018-06-22', '12:00 PM', 'VKAT4050'),
(92, 'Musan addinin mu', 'Live', 'Sheihk Aminu Yammawa', '08065627714', '', '', '', '', '', '', '', '', '', '', '2018-06-23', '3.00pm', 'VKAT4050'),
(93, 'Zauren Majalisa', 'Live', 'Kabir Ahmed Rimi', '08034501338', 'Bishir Dauda', '08165270879', '', '', '', '', '', '', '', '', '2018-06-23', '02:00 PM', 'VKAT4050'),
(94, 'Health is Wealth ', 'Recorded', 'Dr Mohammed Ahmad Qabasiyu', '08033230365', '', '', '', '', '', '', '', '', '', '', '2018-06-23', '11:00 AM', 'VKAT4050'),
(95, 'Achievers Corner', 'Recorded', 'Dr Dikko Radda', '', '', '', '', '', '', '', '', '', '', '', '2018-06-25', '08:30 AM', 'VKAT4050'),
(96, 'Babbar Msgana', 'Live', 'Bilkisu Yusuf Ali', '08064159965', 'Rabi Mohammed', '08065279626', '', '', '', '', '', '', '', '', '2018-06-25', '10:00 AM', 'VKAT4050'),
(97, 'Taurari', 'Live', 'Isa Bawa Doro', '08067880489', '', '', '', '', '', '', '', '', '', '', '2018-06-23', '10:00 AM', 'VKAT4050'),
(98, 'Ina Mafita', 'Live', 'Saminu Abdullai (Kamale)', '09039042256', '', '', '', '', '', '', '', '', '', '', '2018-06-25', '03:00 PM', 'VKAT4050'),
(99, 'Babbar Magana', 'Live', 'Murtala Ibrahim Kafur', '08032795261', 'Barr. Abubakar Muktar', '08036082001', '', '', '', '', '', '', '', '', '2018-06-26', '10:00 AM', 'VKAT4050'),
(100, 'Star times Russia talk', 'Program Type', 'Umar Sabiu Ahmed', '0706550690', 'Mohammed Habib', '08052521526', '', '', '', '', '', '', '', '', '2018-06-26', '12:00 PM', 'VKAT4050'),
(101, 'Law and Order', 'Live', 'J P Israeal', '09065032419', '', '', '', '', '', '', '', '', '', '', '2018-06-26', '01:00 PM', 'VKAT4050'),
(102, 'Duniyar Matasa', 'Live', 'Hamza Saulawa', '08133061333', 'Kabir Shehu Yandaki', '08066344417', '', '', '', '', '', '', '', '', '2018-06-26', '09:00 PM', 'VKAT4050'),
(103, 'Babbar Magana', 'Live', 'Alhaji Mustafa Maikudi', '08036057045', 'Ibrahim Balarabe', '08033120250', '', '', '', '', '', '', '', '', '2018-06-27', '10:00 AM', 'VKAT4050'),
(104, 'Noma na Duke', 'Recorded', 'Malam Abdurahman Baure', '', '', '', '', '', '', '', '', '', '', '', '2018-06-27', '01:00 PM', 'VKAT4050'),
(105, 'Aladar Aure', 'Recorded', 'Malam Isa Dahiru', '08167300983', '', '', '', '', '', '', '', '', '', '', '2018-06-27', '03:00 PM', 'VKAT4050'),
(106, 'Babbar Magana', 'Live', 'Murtala Ibrahim Kafur', '07046222225', 'Dr Muktar El Qasim', '0803964171', '', '', '', '', '', '', '', '', '2018-06-28', '10:00 AM', 'VKAT4050'),
(107, 'Zaman mutum da sanaarsa', 'Recorded', 'Aljhaji Mainasara Marayu Comm.', '08036867156', 'Abdulganiyu Na Barhama', '08034378624', 'Malam Kabir mai Nama', '08035579605', '', '', '', '', '', '', '2018-06-27', '4.30pm', 'VKAT4050'),
(108, 'Babbar Magana', 'Live', 'Alhaji Yusuf M/fashi', '08035264503', 'Dr Baba Bala Katsina', '07064716151', '', '', '', '', '', '', '', '', '2018-06-29', '10:00 AM', 'VKAT4050'),
(109, 'Special Program on coming of President Buhari to Katsina.', 'Live', 'Abdulaziz Maituraka', '08036253912', '', '', '', '', '', '', '', '', '', '', '2018-06-28', '10:00 PM', 'VKAT4050'),
(110, 'Ina Mafita', 'Live', 'Commrade Bashir Dauda', '08165270879', 'Salisu Shehu Namaska', '08032393802', '', '', '', '', '', '', '', '', '2018-07-02', '03:00 PM', 'VKAT4050'),
(111, 'Babbar Magana', 'Live', 'Dr Ahmed Adamu', '08188949144', 'Dikko Bala K/Sauri', '08036972442', '', '', '', '', '', '', '', '', '2018-07-02', '10:00 AM', 'VKAT4050'),
(112, 'Musan Addinin mu', 'Live', 'Dr Nasir Abdurrahman', '08060771096', 'Sheihk Abdulkadir Khalifa', '09030327397', '', '', '', '', '', '', '', '', '2018-07-27', '09:00 PM', 'VKAT4050'),
(113, 'Road to Russia (Star Times)', 'Live', 'Mohammed Habib', '08062621526', 'Mohammed Babangida', '08035264503', 'Umar Sabiu Ahmed', '08065853662', '', '', '', '', '', '', '2018-07-02', '12:00 PM', 'VKAT4050'),
(114, 'Babbar magana', 'Live', 'Aminu Ibrahim', '08035873273', 'Bashir Dauda', '08165270879', '', '', '', '', '', '', '', '', '2018-07-03', '10:00 AM', 'VKAT4050'),
(115, 'Babbar Magana', 'Live', 'Mustapha Radda', '07033411459', 'Abdulaziz Maituraka', '08036253912', '', '', '', '', '', '', '', '', '2018-07-04', '10:00 AM', 'VKAT4050'),
(116, 'Babbar Magana', 'Live', 'Dr Al Maki Hassan Rafindadi', '08134824489', 'Ibrahim Balarabe', '08033120250', '', '', '', '', '', '', '', '', '2018-07-05', '10:00 AM', 'VKAT4050'),
(117, 'Babbar Magana', 'Live', 'YUshau Mani', '08065471100', 'Babangida Shinkafi', '08038856868', '', '', '', '', '', '', '', '', '2018-07-06', '10:00 AM', 'VKAT4050'),
(118, 'Babbar Magana', 'Live', 'Salisu Haladu Hapijo', '0806599746', 'Musa Amadu', '08029134064', '', '', '', '', '', '', '', '', '2018-07-09', '07:15 AM', 'VKAT4050'),
(119, 'Zauren Majalisa', 'Live', 'Abbs  Tukur ', '09037857055', 'Aliyu Batsari', '08037380052', '', '', '', '', '', '', '', '', '2018-07-07', '01:00 PM', 'VKAT4050'),
(120, 'Ina Mafita', 'Live', 'Malam Safiyu Alkasim', '07037883193', '', '', '', '', '', '', '', '', '', '', '2018-07-09', '03:00 PM', 'VKAT4050'),
(121, 'Babbar Magana', 'Live', 'Sada Abdullahi', '08036929761', 'Salisu Mohammed', '08069156969', '', '', '', '', '', '', '', '', '2018-07-10', '10:00 AM', 'VKAT4050'),
(122, 'Babbar Magana', 'Live', 'Dr Elmaky Hassan R/Dadi', '08134824489', 'Bashir Bala Funtua', '08164731622', '', '', '', '', '', '', '', '', '2018-07-12', '10:00 AM', 'VKAT4050'),
(123, 'Babbar Magana', 'Live', 'Mariatu Bala Usman', '0817690885', 'Dr Sani Sulaiman', '08036303431', '', '', '', '', '', '', '', '', '2018-07-13', '10:00 AM', 'VKAT4050'),
(124, 'Babbar Magana', 'Live', 'Malam Hamza Usman', '08045886413', 'Kabir Ahmed Rimi', '08034501338', '', '', '', '', '', '', '', '', '2018-07-16', '10:00 AM', 'VKAT4050'),
(125, 'ina mafita', 'Live', 'Malam Zakariya Aliyu', '08052212033', '', '', '', '', '', '', '', '', '', '', '2018-07-16', '03:00 PM', 'VKAT4050'),
(126, 'Babbar Magana', 'Live', 'Saidu Ibrahim Danja', '08036638338', 'Sulaiman Iguda Ladan', '08169805626', '', '', '', '', '', '', '', '', '2018-07-17', '10:05 AM', 'VKAT4050'),
(127, 'Duniyar Matasa', 'Live', 'Naufal Ahmad', '08132277510', 'Abdulbaki Jari', '08035424321', '', '', '', '', '', '', '', '', '2018-07-17', '09:00 PM', 'VKAT4050'),
(128, 'Babbar Magana', 'Live', 'Abdulaziz maituraka', '08136253912', 'Mustafa Radda', '08036253912', '', '', '', '', '', '', '', '', '2018-07-18', '10:00 AM', 'VKAT4050'),
(129, 'Babbar Magana', 'Live', 'Alh. Ibrahim Tukur J/kamshi', '08032873529', 'Dr Sabiu Yau', '08069767816', '', '', '', '', '', '', '', '', '2018-07-19', '10:00 AM', 'VKAT4050'),
(130, 'Babbar magana', 'Live', 'Amb Gidado Farfaru', '08069589766', 'Bashir Dauda', '08165270879', '', '', '', '', '', '', '', '', '2018-07-20', '10:00 AM', 'VKAT4050'),
(131, 'Startimes Talkshow', 'Live', 'Hassan Usman', '08172398600', 'Zahraddin Lawal', '08038864215', '', '', '', '', '', '', '', '', '2018-07-21', '04:30 PM', 'VKAT4050'),
(132, 'babbar magana', 'Live', 'Abdullahi Aliyu', '08038201916', '', '', '', '', '', '', '', '', '', '', '2018-07-23', '10:00 AM', 'VKAT4050'),
(133, 'Babbar Magana', 'Live', 'Alh. Iliyan Wake', ' 08036964395', 'Bishir Dauda ', '08165270879', '', '', '', '', '', '', '', '', '2018-07-24', '10:00 AM', 'VKAT4050'),
(134, 'Babbar Magana', 'Live', 'Malam Sabo Musa', '08035888693', 'Dauda Kurfi', '08035867605', 'Jamilu Abdulsalam', '08069289697', '', '', '', '', '', '', '2018-07-25', '10:00 AM', 'VKAT4050'),
(135, 'Babbar Magana', 'Live', 'Alhj Abu Rimi', '07035027971', 'Dr Aliyu Kurfi Danmasani', '08036352423', '', '', '', '', '', '', '', '', '2018-07-26', '10:00 AM', 'VKAT4050'),
(136, 'Labarin Wasanni', 'Live', 'Abubakar Maisaida', '08060414190', '', '', '', '', '', '', '', '', '', '', '2018-07-26', '05:00 PM', 'VKAT4050'),
(137, 'Babbar Magana', 'Live', 'Dr Muktar Al-kasim', '080396741', 'Aminu Ibrahim', '08068904439', '', '', '', '', '', '', '', '', '2018-07-27', '10:05 AM', 'VKAT4050'),
(138, 'Law and Order', 'Live', 'Dr Ibrahim Adegbite', '08033780288', '', '', '', '', '', '', '', '', '', '', '2018-07-27', '02:00 PM', 'VKAT4050'),
(139, 'Dan Marayu', 'Recorded', 'Malam Nura A Yaradua Assalafi', '08031364493', '', '', '', '', '', '', '', '', '', '', '2018-07-18', '12:30 PM', 'VKAT4050'),
(140, 'Taurari', 'Live', 'Maryam Yahaya', '07033322661', '', '', '', '', '', '', '', '', '', '', '2018-07-28', '10:00 AM', 'VKAT4050'),
(141, 'Babbar Magana', 'Live', 'Ibrahim Balarabe', '08033120250', 'Abduraham Kabir', '08038840655', '', '', '', '', '', '', '', '', '2018-07-30', '10:00 AM', 'VKAT4050'),
(142, 'Babbar Magana', 'Live', 'Hajiya Badiya Hassan Mashi', '08036254876', 'Zainab Ibrahim', '08033253862', '', '', '', '', '', '', '', '', '2018-07-31', '10:00 AM', 'VKAT4050'),
(143, 'Babbar Magana', 'Live', 'Dr AlMaky Hassan R/dadi', '08134824489', 'Malam Usman Danladi', '09082065794', '', '', '', '', '', '', '', '', '2018-08-01', '10:00 AM', 'VKAT4050'),
(144, 'Babbar Magana', 'Live', 'Mohammed Nurudeen', '08036950454', 'Saidu Ibrahim Danja', '08036638338', '', '', '', '', '', '', '', '', '2018-08-02', '10:00 AM', 'VKAT4050'),
(145, 'Good Morning Katsina', 'Live', 'Ismael Bello', '08067118336', '', '', '', '', '', '', '', '', '', '', '2018-08-02', '07:00 AM', 'VKAT4050'),
(146, 'Labarin Wasanni', 'Live', 'Abubakar Maisaida', '08060414190', 'Umar Sabiu', '08065853632', '', '', '', '', '', '', '', '', '2018-08-02', '05:00 PM', 'VKAT4050'),
(147, 'Babbar Magana', 'Live', 'Halima Lawal Usman', '08035930969', 'Hadiza Bilyaminu', '08055986067', '', '', '', '', '', '', '', '', '2018-08-03', '10:00 AM', 'VKAT4050'),
(148, 'Zauren Majalisa', 'Live', 'Salisu Majigiri', '08163362339', '', '', '', '', '', '', '', '', '', '', '2018-08-04', '01:00 PM', 'VKAT4050'),
(149, 'Sports News Review', 'Live', 'Mustafa S Dauda', '08033674119', 'Umar Sabiu', '080853632', '', '', '', '', '', '', '', '', '2018-08-04', '03:00 PM', 'VKAT4050'),
(150, 'Mu Leka PLBC', 'Recorded', 'Muttaka Rabe Darma', '0809999915', '', '', '', '', '', '', '', '', '', '', '2018-08-03', '04:00 PM', 'VKAT4050'),
(151, 'Health is Wealth', 'Live', 'Zainab Abdulhadi Aliyu', '08067992213', '', '', '', '', '', '', '', '', '', '', '2018-08-04', '02:00 PM', 'VKAT4050'),
(152, 'Hanyar Tsira', 'Live', 'Muhammad Yusuf Said', '08061188055', '', '', '', '', '', '', '', '', '', '', '2018-08-05', '10:00 AM', 'VKAT4050'),
(153, 'Majalisar miya faru', 'Live', 'Abdullahi Fikra', '08030582869', 'Abdurahman Jani', '08038840655', '', '', '', '', '', '', '', '', '2018-08-05', '11:00 AM', 'VKAT4050'),
(154, 'Babbar Magana', 'Live', 'Dahiru Mani', '08065725998', 'Salisu Muhammad', '08069156969', '', '', '', '', '', '', '', '', '2018-08-06', '10:00 AM', 'VKAT4050'),
(155, 'iNA mAFITA', 'Live', 'mALAM aBU aMAR', '08032875596', '', '', '', '', '', '', '', '', '', '', '2018-08-06', '03:00 PM', 'VKAT4050'),
(156, 'Babbar Magana', 'Live', 'Samaila Balarabe', '08036185648', '', '', '', '', '', '', '', '', '', '', '2018-08-06', '10:00 AM', 'VKAT4050'),
(157, 'Babbar Magana', 'Live', 'Dr Sabiu Yau ', '08069767816', '', '', '', '', '', '', '', '', '', '', '2018-08-07', '10:00 AM', 'VKAT4050'),
(158, 'Good Morning Katsina', 'Live', 'Usman Danladi', '09082065794', '', '', '', '', '', '', '', '', '', '', '2018-08-07', '07:00 AM', 'VKAT4050'),
(159, 'Don Marayu', 'Recorded', 'Malam Lawal Abdullahi', '09031263258', '', '', '', '', '', '', '', '', '', '', '2018-08-08', '12:30 PM', 'VKAT4050'),
(160, 'Babbara Magana', 'Live', 'Alhaji Usman Nadada', '08035867125', '', '', '', '', '', '', '', '', '', '', '2018-08-09', '10:00 AM', 'VKAT4050'),
(161, 'Babbar Magana', 'Live', 'Mariya Bala Usman', '08037879522', 'Zainab Abdullah Tafashiya', '08067992213', '', '', '', '', '', '', '', '', '2018-08-11', '10:00 AM', 'VKAT4050'),
(162, 'Zauren Majalisa', 'Program Type', 'Nura Aliyu', '08037380052', 'Kabir Ahmed Rimi', '08034501338', '', '', '', '', '', '', '', '', '2018-08-12', '11:00 AM', 'VKAT4050'),
(163, 'Taurari', 'Live', 'Musa Africa', '08130696966', '', '', '', '', '', '', '', '', '', '', '2018-08-12', '10:00 AM', 'VKAT4050'),
(164, 'Health is Wealth', 'Recorded', 'Husaini Usman', '08039212660', '', '', '', '', '', '', '', '', '', '', '2018-08-12', '02:00 PM', 'VKAT4050'),
(165, 'Mintuna 15 da Dr Ahmed Adamu', 'Recorded', 'Dr Ahmed Adamu', '08189232425', '', '', '', '', '', '', '', '', '', '', '2018-08-12', '12:00 PM', 'VKAT4050'),
(166, 'Dogaro da Kai', 'Recorded', 'Zulaihatu Jamilu Usman', '08130502147', '', '', '', '', '', '', '', '', '', '', '2018-08-09', '04:00 PM', 'VKAT4050'),
(167, 'Star times talk show', 'Live', 'HassanUsman', '08069382635', '', '', '', '', '', '', '', '', '', '', '2018-08-11', '04:30 PM', 'VKAT4050'),
(168, 'Majalisar Miya Faru', 'Live', 'Umar Sabiu', '08065853632', 'Abdurahman Jani', '08038840655', '', '', '', '', '', '', '', '', '2018-08-12', '11:00 AM', 'VKAT4050'),
(169, 'Babbar Magana', 'Live', 'Lukman Umar Kankia', '08031826001', 'Bashir Dauda', '08165270879', '', '', '', '', '', '', '', '', '2018-08-14', '10:00 AM', 'VKAT4050'),
(170, 'Babbar Magana', 'Live', 'Aminu Ibrahim', '08035873273', 'Dr Muktar Al Kasim', '08039674173', '', '', '', '', '', '', '', '', '2018-08-14', '10:00 AM', 'VKAT4050'),
(171, 'Babbar Magana', 'Live', 'Malam Zakariya Aliyu', '08062212033', 'Malama Yalwati Bature Abdullahi', '08038648760', '', '', '', '', '', '', '', '', '2018-08-15', '10:00 AM', 'VKAT4050'),
(172, 'Goodmorning Katsina', 'Live', 'Dr Ahmads Adamu', '08188949144', '', '', '', '', '', '', '', '', '', '', '2018-08-15', '07:00 AM', 'VKAT4050'),
(173, 'Babbar Magana<li>Minene tasirin koyon kananan sanaoi da bunkasa su a ci gaban tattalin arzikin kasa ', 'Live', 'Yusuf Muazu M/Fashi', '080655770700', 'Bello Maiwada Darma', '08139769242', '', '', '', '', '', '', '', '', '2018-08-16', '10:00 AM', 'VKAT4050'),
(174, 'Goodmorning Katsina<li>Taking Drugs within the vicinity of ponds around Katsina abuse a</li>', 'Live', 'Mustafa Maikudi', '08036057045', '', '', '', '', '', '', '', '', '', '', '2018-08-167', '07:00 AM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `programes`
--

CREATE TABLE `programes` (
  `ID` int(11) NOT NULL,
  `ProID` varchar(50) NOT NULL,
  `ProName` varchar(250) NOT NULL,
  `Monday` varchar(50) NOT NULL,
  `Tuesday` varchar(50) NOT NULL,
  `Wednesday` varchar(50) NOT NULL,
  `Thursday` varchar(50) NOT NULL,
  `Friday` varchar(50) NOT NULL,
  `Saturday` varchar(50) NOT NULL,
  `Sunday` varchar(50) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `H_Remaining` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p_fri`
--

CREATE TABLE `p_fri` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_fri`
--

INSERT INTO `p_fri` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(2, 'Prog', '30 Min', 'pro', '', '08:00 PM', '08:30 PM', 'VABU8429'),
(3, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(4, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(5, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(6, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(7, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(8, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(9, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(10, 'Babbar magana', '60 Min', '', '', '10:00 AM', '11:00 AM', 'VKEB6464'),
(11, 'Burgami', '60 Min', '', '', '11:00 AM', '12:00 PM', 'VKEB6464'),
(12, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(13, 'Najeriya a yau', '45 Min', '', '', '04:00 PM', '04:45 PM', 'VKEB6464'),
(14, 'Yara Yara', '30 Min', '', '', '07:00 PM', '07:30 PM', 'VKEB6464'),
(15, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(16, 'Ko wane tsuntsu', '30 Min', '', '', '08:30 PM', '09:00 PM', 'VKEB6464'),
(17, 'Daga marubutan mu', '15 Min', '', '', '10:00 PM', '10:15 PM', 'VKEB6464'),
(18, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(19, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(20, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(21, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(22, '30mnts with Yasir faraga', '30 Min', '', '', '07:30 AM', '08:00 AM', 'VKEB6464'),
(23, 'Once upon a child', '60 Min', '', '', '12:00 PM', '01:00 PM', 'VKEB6464'),
(24, 'Quranic recitation', '30 Min', '', '', '01:30 PM', '02:00 PM', 'VKEB6464'),
(25, 'Religious songs', '30 Min', '', '', '02:00 PM', '02:30 PM', 'VKEB6464'),
(26, 'Islamic in focus', '30 Min', '', '', '02:30 PM', '03:00 PM', 'VKEB6464'),
(27, 'Zaben sada zumunta', '28 Min', '', '', '03:30 PM', '03:58PM', 'VKEB6464'),
(28, 'Tsarabar jumaa', '60 Min', '', '', '04:30PM', '05:30 PM', 'VKEB6464'),
(29, 'Kundin tarihi', '30 Min', '', '', '05:30 PM', '06:00 PM', 'VKEB6464'),
(30, 'Yara yara gaisuwar jumaa', '60 Min', '', '', '07:00 PM', '08:00 PM', 'VKEB6464'),
(31, 'Kowane tsuntsu rpt', '30 Min', '', '', '08:30 PM', '09:00 PM', 'VKEB6464'),
(32, 'Al adun mu', '30 Min', '', '', '09:00 PM', '09:30PM', 'VKEB6464'),
(33, 'Daga makwabtan mu', '30 Min', '', '', '09:30PM', '10:00 PM', 'VKEB6464'),
(34, 'Chanji leka gidan kowa', '45 Min', '', '', '10:15 PM', '11:00 PM', 'VKEB6464'),
(35, 'Random tunes', '30 Min', '', '', '07:30 AM', '08:00 AM', 'VKEB6464'),
(36, 'Garabasar Rufaida drinks', '750 Min', '', '', '10:00 AM', '10:30PM', 'VKEB6464'),
(37, 'Ina muka dosa rpt', '60 Min', '', '', '11:00 AM', '12:00 PM', 'VKEB6464'),
(38, 'News update hausa', '10 Min', '', '', '12:00 PM', '12:10PM', 'VKEB6464'),
(39, 'News update english', '10 Min', '', '', '12:10PM', '12:20PM', 'VKEB6464'),
(40, 'Random music', '40 Min', '', '', '12:20PM', '01:00 PM', 'VKEB6464'),
(41, 'Kiddies talk show', '60 Min', '', '', '01:00 PM', '02:00 PM', 'VKEB6464'),
(42, 'Reggae Dubs', '60 Min', '', '', '02:00 PM', '03:00 PM', 'VKEB6464'),
(43, 'Tarihin kebbi rpt', '30 Min', '', '', '03:30 PM', '04:00 PM', 'VKEB6464'),
(44, 'Wasa kwakwalwa', '60 Min', '', '', '04:00 PM', '05:00 PM', 'VKEB6464'),
(45, 'Zauren demokradiyya', '45 Min', '', '', '05:00 PM', '05:45PM', 'VKEB6464'),
(46, 'Na Duke/star times', '30 Min', '', '', '06:00 PM', '06:30 PM', 'VKEB6464'),
(47, 'Da bazar mu', '60 Min', '', '', '06:30 PM', '07:30 PM', 'VKEB6464'),
(48, 'Zare da abawa rpt', '30 Min', '', '', '07:30 PM', '08:00 PM', 'VKEB6464'),
(49, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(50, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(51, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(52, 'News Update [English]', '5 Min', 'News and Current Affairs', '', '09:00 AM', '09:05 AM', 'VKAT4050'),
(54, 'Burgami', '60 Min', 'Mother Station Abuja', '', '11:00 AM', '12:00 PM', 'VKAT4050'),
(55, 'Mai Talla', '-705 Min', 'Sponsored', 'Nasiru Sadi', '12:00 PM', '12:15AM', 'VKAT4050'),
(56, 'News Update [Hausa]', '15 Min', 'News and Current Affairs', '', '12:15PM', '12:30 PM', 'VKAT4050'),
(57, 'Najeriya Ayau', '45 Min', 'Mother Station Abuja', '', '07:00 PM', '07:45 PM', 'VKAT4050'),
(58, 'Labarun Vision ', '15 Min', 'News and Current Affairs', '', '08:00 PM', '08:15PM', 'VKAT4050'),
(59, 'Kowane Tsuntsu', '30 Min', 'Abdulrahaman Kabir Jani', 'Abdulrahman Kabir, Kabir Hassan.', '08:30 PM', '09:00 PM', 'VKAT4050'),
(60, '15 Minutes Dr Ahmad', '15 Min', 'Sponsored', 'Abdulrahman Kabir', '10:15 PM', '10:30PM', 'VKAT4050'),
(61, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(62, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(63, 'Tukunyarki Sirrinki', '30 Min', 'Basira Sani Bala', 'Basira Sani Bala', '04:30PM', '05:00 PM', 'VKAT4050'),
(64, 'Hasken Musulunci', '30 Min', 'Sponsored', '', '08:00 AM', '08:30', 'VKAT4050'),
(65, 'Mu leka PLBC', '30 Min', 'Sponsored', 'Ibrahim Yunusa D/ma', '08:30AM', '09:00 AM', 'VKAT4050'),
(66, 'Light Of Islam', '15 Min', 'Aliyu Halliru Matazu', 'Aliyu Halliru Matazu', '01:30 PM', '01:45PM', 'VKAT4050'),
(67, 'Chua Chua', '30 Min', 'Mother Station Auja', '', '04:00 PM', '04:30PM', 'VKAT4050'),
(68, 'Yaba Kyauta', '30 Min', 'Sponsor', '', '05:00 PM', '05:30 PM', 'VKAT4050'),
(69, 'Dogaro Da Kai', '15 Min', 'Malan Ibrahim Balarabe', 'Malan Ibrahim Balarabe', '06:15PM', '06:30 PM', 'VKAT4050'),
(70, 'RIsalat', '30 Min', 'Malan Liman Ratibi', 'Malan Liman Ratibi', '06:30 PM', '07:00 PM', 'VKAT4050'),
(71, 'Zauren Malamai', '60 Min', 'Aliyu Halliru Matazu', 'Aliyu Halliru Matazu', '09:00 PM', '10:00 PM', 'VKAT4050'),
(72, 'Mukoyi Larabci', '15 Min', 'Sponsor', '', '10:15 PM', '10:30PM', 'VKAT4050'),
(73, 'Babbar magana', '60 Min', 'Abdrahman Kabir Jani/Mohammed Babangida', 'Abdurahman Kabir Jani, Kabir Saidu Dandagor, Mohammed Habib Umar', '10:00 AM', '11:00 AM', 'VKAT4050'),
(74, 'Babbar magana', '60 Min', 'Abdrahman Kabir Jani/Mohammed Babangida', 'Abdurahman Kabir Jani, Kabir Saidu Dandagor, Mohammed Habib Umar', '10:00 AM', '11:00 AM', 'VKAT4050'),
(75, 'Oldies', '30 Min', 'Cynthia', '', '02:30 PM', '03:00 PM', 'VKAT4050'),
(76, 'Low And Order', '30 Min', 'Cynthia', 'Cynthia', '02:00 PM', '02:30 PM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `p_mon`
--

CREATE TABLE `p_mon` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_mon`
--

INSERT INTO `p_mon` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(2, 'vision sports', '30 Min', '', '', '07:30 AM', '08:00 AM', 'VABU8429'),
(3, 'Daybreak abuja', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VABU8429'),
(4, 'Vision news', '25 Min', '', '', '06:00 AM', '6:25am', 'VABU8429'),
(5, 'Opening formality', '25240625 Min', '', '', '5:00 am', '5:05 am', 'VABU8429'),
(6, 'Morning melodies', '50 Min', '', '', '5:05am', '5:55am', 'VABU8429'),
(7, 'Adverts/Station ID/PSA', '5 Min', '', '', '5:55AM', '06:00 AM', 'VABU8429'),
(8, 'Adverts/Station ID/PSA', '5 Min', '', '', '6:25am', '06:30 AM', 'VABU8429'),
(9, 'Wake up to trafic', '25 Min', '', '', '06:30 AM', '6:55am', 'VABU8429'),
(10, 'Daybreak abuja', '30 Min', '', 'Mariam muhammed', '07:00 AM', '07:30 AM', 'VABU8429'),
(11, 'Burgami', '55 Min', '', 'Mariam muhammed', '08:00 AM', '8:55am', 'VABU8429'),
(12, 'Musicals ', '10 Min', '', '', '09:00 AM', '9:10am', 'VABU8429'),
(13, 'Inspirational talk', '25240905 Min', '', 'Mariam muhammed', '9;10am', '9:45am', 'VABU8429'),
(14, 'News brief', '5 Min', '', '', '10:00 AM', '10:05 AM', 'VABU8429'),
(15, 'NYSC TODAY', '50 Min', '', 'Mariam Muhammed', '10:05 AM', '10:55am', 'VABU8429'),
(16, 'Amazing woman(Gender related issues)', '30 Min', '', 'Joy Jayesimi', '11:00 AM', '11:30am', 'VABU8429'),
(17, 'Musicals ', '30 Min', '', '', '11:30am', '12:00 PM', 'VABU8429'),
(18, 'Reak talk on vision', '25 Min', '', '', '12:30 PM', '12:55pm', 'VABU8429'),
(19, 'Labarai (Hausa news)', '10 Min', '', '', '01:05 PM', '01:15pm', 'VABU8429'),
(20, 'Nijeria Ayau (current affairs)', '45 Min', '', '', '01:15pm', '02:00 PM', 'VABU8429'),
(21, 'Duniyar mamaki (Fresh)', '30 Min', '', '', '02:30 PM', '03:00 PM', 'VABU8429'),
(22, 'Ilimi abin nema', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VABU8429'),
(23, 'Daga kin gaskiya', '30 Min', '', '', '03:30 PM', '04:00 PM', 'VABU8429'),
(24, 'Zare da abawa', '55 Min', '', '', '04:00 PM', '04:55PM', 'VABU8429'),
(25, 'Idon mikiya (fresh edition)', '50 Min', '', '  ', '05:00 PM', '05:50PM', 'VABU8429'),
(26, 'Vision news', '25 Min', '', '', '06:00 PM', '06:25PM', 'VABU8429'),
(27, 'Neigbour my neighbour (BBC)', '30 Min', '', '', '06:30 PM', '07:00 PM', 'VABU8429'),
(28, 'Ayakata Assembly', '60 Min', '', 'Apeh John', '07:00 PM', '08:00 PM', 'VABU8429'),
(29, 'Music talk show (Request show)', '55 Min', '', '', '08:00 PM', '08:55PM', 'VABU8429'),
(30, 'Weathering the storm', '55 Min', '', 'Apeh john', '10:00 PM', '10:55PM', 'VABU8429'),
(31, 'Cool blues music', '55 Min', '', '', '11:00 PM', '11:55PM', 'VABU8429'),
(32, 'Closing formalities', '-1435 Min', '', '', '11:55 PM', '12:00AM', 'VABU8429'),
(33, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(34, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(35, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(36, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(37, '30mnt with yasir fazaga', '30 Min', '', '', '07:30 AM', '08:00 AM', 'VKEB6464'),
(38, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(39, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(40, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(41, 'Babbar magana', '60 Min', '', '', '10:00 AM', '11:00 AM', 'VKEB6464'),
(42, 'Burgami', '60 Min', '', '', '11:00 AM', '12:00 PM', 'VKEB6464'),
(43, 'Sport Review', '30 Min', '', '', '02:00 PM', '02:30 PM', 'VKEB6464'),
(44, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(45, 'Labarun Wasanni', '30 Min', '', '', '03:30 PM', '04:00 PM', 'VKEB6464'),
(46, 'Najeriya a yau', '45 Min', '', '', '04:00 PM', '04:45 PM', 'VKEB6464'),
(47, 'Yara Yara', '30 Min', '', '', '07:00 PM', '07:30 PM', 'VKEB6464'),
(48, 'Tafsir malam Abdulrahman jega', '30 Min', '', '', '07:30 PM', '08:00 PM', 'VKEB6464'),
(49, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(50, 'Ko wane tsuntsu', '30 Min', '', '', '08:30 PM', '09:00 PM', 'VKEB6464'),
(51, 'Kyautar shan-shani', '60 Min', '', '', '10:15 PM', '11:15PM', 'VKEB6464'),
(52, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(53, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(54, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(55, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(56, 'Zauren demokradiyya', '60 Min', '', '', '12:00 PM', '01:00 PM', 'VKEB6464'),
(57, 'Once upon a child', '60 Min', '', '', '01:00 PM', '02:00 PM', 'VKEB6464'),
(58, 'Naija Hip hop', '30 Min', '', '', '02:30 PM', '03:00 PM', 'VKEB6464'),
(59, 'Wakokin illon kalgo', '15 Min', '', '', '04:45 PM', '05:00 PM', 'VKEB6464'),
(60, 'Lafiya jarin mai ita', '60 Min', '', '', '05:00 PM', '06:00 PM', 'VKEB6464'),
(61, 'Labarun Visionn', '30 Min', '', '', '06:00 PM', '06:30 PM', 'VKEB6464'),
(62, 'Vision news', '30 Min', '', '', '06:30 PM', '07:00 PM', 'VKEB6464'),
(63, 'Idon mikiya', '60 Min', '', '', '09:00 PM', '10:00 PM', 'VKEB6464'),
(64, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(65, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(66, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(67, 'Achievers Corner', '-690 Min', 'Zainab Isah Sulaian', 'Zainab Isah Sulaiman', '08:30 PM', '09:00 AM', 'VKAT4050'),
(68, 'News Update [English]', '5 Min', 'News and Current Affairs', '', '09:00 AM', '09:05 AM', 'VKAT4050'),
(69, 'CBN', '25 Min', 'Mother Station Abuja', '', '09:05 AM', '09:30 AM', 'VKAT4050'),
(71, 'Burgami', '60 Min', 'Mother Station Abuja', '', '11:00 AM', '12:00 PM', 'VKAT4050'),
(72, 'Mai Talla', '-705 Min', 'Sponsored', 'Nasiru Sadi', '12:00 PM', '12:15AM', 'VKAT4050'),
(73, 'News Update [Hausa]', '15 Min', 'News and Current Affairs', '', '12:15PM', '12:30 PM', 'VKAT4050'),
(74, 'Taskar Vision', '30 Min', 'Exchange Program', '', '12:30 PM', '01:00 PM', 'VKAT4050'),
(75, 'Zaben Sada Zumunta', '30 Min', 'Hadiza Kabir', 'Aliyu Arebia Basiru Dayi Nasir Sadi', '02:00 PM', '02:30 PM', 'VKAT4050'),
(76, 'Ina Mafita', '60 Min', 'Abubakar S Gfe', 'Abubakar S Gefe', '03:00 PM', '04:00 PM', 'VKAT4050'),
(77, 'Vision News', '-705 Min', 'News and Current Affairs', '', '06:00 PM', '06:15AM', 'VKAT4050'),
(78, 'Mazan Jiya', '15 Min', 'Muhammad Babangida', 'Aisha Abubakar Umar Babangida Muhammad', '06:45 PM', '07:00 PM', 'VKAT4050'),
(79, 'Najeriya Ayau', '45 Min', 'Mother Station Abuja', '', '07:00 PM', '07:45 PM', 'VKAT4050'),
(80, 'Labarun Vision ', '15 Min', 'News and Current Affairs', '', '08:00 PM', '08:15PM', 'VKAT4050'),
(81, 'Kowane Tsuntsu', '30 Min', 'Abdulrahaman Kabir Jani', 'Abdulrahman Kabir, Kabir Hassan.', '08:30 PM', '09:00 PM', 'VKAT4050'),
(82, 'Idon Mikiya', '45 Min', 'Mother Station Abuja', '', '09:00 PM', '09:45PM', 'VKAT4050'),
(83, '15 Minutes Dr Ahmad', '15 Min', 'Sponsored', 'Abdulrahman Kabir', '10:15 PM', '10:30PM', 'VKAT4050'),
(84, 'Zaben Sada Zumunta', '30 Min', 'Hadiza Kabir ', 'Aliyu Arebia Basiru Dayi Nasir Sadi', '10:30PM', '11:00 PM', 'VKAT4050'),
(85, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(86, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(87, 'Police Is Our Friend', '30 Min', 'Umar Sabiu Ahmad', 'Zainab Isah Sulaiman', '08:00 AM', '08:30AM', 'VKAT4050'),
(88, 'Babbar magana', '60 Min', 'Abdrahman Kabir Jani/Mohammed Babangida', 'Abdurahman Kabir Jani, Kabir Saidu Dandagor, Mohammed Habib Umar', '10:00 AM', '11:00 AM', 'VKAT4050'),
(89, 'Oldies', '30 Min', 'Cynthia', '', '02:30 PM', '03:00 PM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `p_sat`
--

CREATE TABLE `p_sat` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_sat`
--

INSERT INTO `p_sat` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(1, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(2, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(3, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(4, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(5, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(6, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(7, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(8, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(9, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(10, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(11, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(12, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(13, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(14, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(15, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(16, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(18, 'Zaben Sada Zumunta', '30 Min', 'Hadiza Kabir ', 'Aliyu Arebia Basiru Dayi Nasir Sadi', '10:30PM', '11:00 PM', 'VKAT4050'),
(19, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(20, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(21, 'Mai Kamar Zuwa', '30 Min', 'Sponsored', 'Kabir Hassan', '02:30 PM', '03:00 PM', 'VKAT4050'),
(22, 'Wasa Kwakwalwa', '60 Min', 'Ibrahim Abdullahi', 'Ibrahim Abdullahi Abdulrazaq Yusuf', '05:00 PM', '06:00 PM', 'VKAT4050'),
(23, 'Tarbiyya A Musulunci', '30 Min', 'Sponsored', '', '06:30 PM', '07:00 PM', 'VKAT4050'),
(24, 'Waiwaye Adon Tafiya', '30 Min', 'Ibrahim Abdullahi', 'Abdulrazaq Yusuf', '09:30PM', '10:00 PM', 'VKAT4050'),
(25, 'Kid Hour Spelling Bee', '765 Min', 'Nelson Omokhaye', 'Muhammad Habib', '08:00 AM', '08:45PM', 'VKAT4050'),
(26, 'Raggae Rock Steady', '30 Min', 'Nelson Omokhaye', 'Nelson Omokahaye', '12:00 PM', '12:30 PM', 'VKAT4050'),
(27, 'Musan Addinin Mu', '60 Min', 'Aliyu Halliru Matazu', 'Aliyu Halliru Matazu', '03:00 PM', '04:00 PM', 'VKAT4050'),
(28, 'Mazan Jiya', '15 Min', 'Muhammad Babangida', 'Aisha Abubakar Umar Babangida Muhammad', '06:45 PM', '07:00 PM', 'VKAT4050'),
(29, 'Kwalliya', '30 Min', 'Sponsor', 'Kabir Hasssan Iyatawa', '09:00 PM', '09:30PM', 'VKAT4050'),
(30, 'Hanjin Jimina', '45 Min', 'Ibrahim Abdullahi', 'Ibrahim Abdullahi', '11:00 PM', '11:45 PM', 'VKAT4050'),
(31, 'Zauren Majalisa', '60 Min', 'Kabir Saidu', 'Umar Sabiu Ahmad', '02:00 PM', '03:00 PM', 'VKAT4050'),
(32, 'Health is Wealth', '60 Min', 'Zainab Isa Sulaiman', '', '12.30pm', '1.00pm', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `p_sun`
--

CREATE TABLE `p_sun` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_sun`
--

INSERT INTO `p_sun` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(1, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(2, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(3, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(4, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(5, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(6, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(7, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(8, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(9, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(10, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(11, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(12, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(13, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(14, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(15, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(16, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(18, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(19, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(20, 'Majalisar Mai Yafaru', '60 Min', 'Muhammad Habib', 'Muhammad Habib  Abubakar S Gefe Umar Sabiu Ahmad', '11:00 AM', '12:00 PM', 'VKAT4050'),
(21, 'Aikin Dan Sanda', '30 Min', 'Umar Sabiu Ahmad', 'Kabir Hassan', '08:00 PM', '08:30 PM', 'VKAT4050'),
(22, 'Musicals Interlude', '30 Min', 'OAP', '', '03:30 PM', '04:00 PM', 'VKAT4050'),
(23, 'Hattara Da Hanya', '60 Min', 'Abdulrahman Kabir', 'Abdulrahman Kabir Abdulrazaq Yusuf', '02:00 PM', '03:00 PM', 'VKAT4050'),
(24, 'Majalisar mi ya faru', '60 Min', 'Mohammed Habib Umar', '', '11:00 AM', '12:00 PM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `p_thu`
--

CREATE TABLE `p_thu` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_thu`
--

INSERT INTO `p_thu` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(2, 'Prog', '30 Min', 'pro', '', '08:00 PM', '08:30 PM', 'VABU8429'),
(3, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(4, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(5, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(6, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(7, '30mnt with yasir fazaga', '30 Min', '', '', '07:30 AM', '08:00 AM', 'VKEB6464'),
(8, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(9, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(10, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(11, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(12, 'Labarun Wasanni', '30 Min', '', '', '03:30 PM', '04:00 PM', 'VKEB6464'),
(13, 'Tafsir malam Abdulrahman jega', '30 Min', '', '', '07:30 PM', '08:00 PM', 'VKEB6464'),
(14, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(15, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(16, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(17, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(18, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(19, 'Walwalar kowa', '765 Min', '', '', '09:00 AM', '09:45PM', 'VKEB6464'),
(20, 'Takaitattun labaru', '15 Min', '', '', '12:30 PM', '12:45PM', 'VKEB6464'),
(21, 'News update', '15 Min', '', '', '12:30 PM', '12:45pm', 'VKEB6464'),
(22, 'Hip hop', '30 Min', '', '', '01:30 PM', '02:00 PM', 'VKEB6464'),
(23, 'Dialog', '30 Min', '', '', '01:30 PM', '02:00 PM', 'VKEB6464'),
(24, 'News in pidgin', '10 Min', '', '', '02:50PM', '03:00 PM', 'VKEB6464'),
(25, 'Ba maraya', '30 Min', '', '', '03:30 PM', '04:00 PM', 'VKEB6464'),
(26, 'Wakokin dan anace', '15 Min', '', '', '04:45 PM', '05:00 PM', 'VKEB6464'),
(27, 'Zare da abawa', '30 Min', '', '', '05:30 PM', '06:00 PM', 'VKEB6464'),
(28, 'Labarun vision', '30 Min', '', '', '06:00 PM', '06:30 PM', 'VKEB6464'),
(29, 'Vision news', '30 Min', '', '', '06:30 PM', '07:00 PM', 'VKEB6464'),
(30, 'Yara Yara', '60 Min', '', '', '07:00 PM', '08:00 PM', 'VKEB6464'),
(31, 'Idon mikiya', '60 Min', '', '', '09:00 PM', '10:00 PM', 'VKEB6464'),
(32, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(33, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(34, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(35, 'News Update [English]', '5 Min', 'News and Current Affairs', '', '09:00 AM', '09:05 AM', 'VKAT4050'),
(37, 'Burgami', '60 Min', 'Mother Station Abuja', '', '11:00 AM', '12:00 PM', 'VKAT4050'),
(38, 'Mai Talla', '-705 Min', 'Sponsored', 'Nasiru Sadi', '12:00 PM', '12:15AM', 'VKAT4050'),
(39, 'News Update [Hausa]', '15 Min', 'News and Current Affairs', '', '12:15PM', '12:30 PM', 'VKAT4050'),
(40, 'Vision News', '-705 Min', 'News and Current Affairs', '', '06:00 PM', '06:15AM', 'VKAT4050'),
(41, 'Najeriya Ayau', '45 Min', 'Mother Station Abuja', '', '07:00 PM', '07:45 PM', 'VKAT4050'),
(42, 'Labarun Vision ', '15 Min', 'News and Current Affairs', '', '08:00 PM', '08:15PM', 'VKAT4050'),
(43, 'Idon Mikiya', '45 Min', 'Mother Station Abuja', '', '09:00 PM', '09:45PM', 'VKAT4050'),
(44, 'Zaben Sada Zumunta', '30 Min', 'Hadiza Kabir ', 'Aliyu Arebia Basiru Dayi Nasir Sadi', '10:30PM', '11:00 PM', 'VKAT4050'),
(45, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(46, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(47, 'Duniya Mai Juyi', '30 Min', 'Sponsored', '', '08:00 AM', '08:30AM', 'VKAT4050'),
(48, 'Karatun Littafin Ashfa', '60 Min', 'Sponsored', '', '11:00 AM', '12:00 PM', 'VKAT4050'),
(49, 'Sadarwa A Tafin Hannu', '30 Min', 'Mother Station Abuja', '', '12:30 PM', '01:00 PM', 'VKAT4050'),
(50, 'Daga Fadar Shugaban Kasa', '60 Min', 'Mother Station Abuja', '', '03:00 PM', '04:00 PM', 'VKAT4050'),
(51, 'Issues And Situation', '30 Min', 'Muhammad Babangida', 'Cynthia Ijoma Izeala', '06:30 PM', '07:00 PM', 'VKAT4050'),
(52, 'Babbar magana', '60 Min', 'Abdrahman Kabir Jani/Mohammed Babangida', 'Abdurahman Kabir Jani, Kabir Saidu Dandagor, Mohammed Habib Umar', '10:00 AM', '11:00 AM', 'VKAT4050'),
(53, 'Da Naga Ba', '30 Min', 'Surajo Danlami', 'Surajo Danlami', '03:00 PM', '03:30 PM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `p_tue`
--

CREATE TABLE `p_tue` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_tue`
--

INSERT INTO `p_tue` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(1, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(2, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(3, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(4, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(5, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(6, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(7, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(8, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(9, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(10, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(11, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(12, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(13, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(14, '30mnts with yasir fazaga', '30 Min', '', '', '07:30 AM', '08:00 AM', 'VKEB6464'),
(15, 'Tambaya mabudin ilimi', '750 Min', '', '', '08:00 AM', '08:30PM', 'VKEB6464'),
(16, 'Sanwa adon mata', '30 Min', '', '', '12:00 PM', '12:30 PM', 'VKEB6464'),
(17, 'Takaitattun labarai', '15 Min', '', '', '12:30 PM', '12:45PM', 'VKEB6464'),
(18, 'News update', '15 Min', '', '', '12:45PM', '01:00 PM', 'VKEB6464'),
(19, 'Say hello', '30 Min', '', '', '01:00 PM', '01:30 PM', 'VKEB6464'),
(20, 'Na you talk am', '30 Min', '', '', '01:30 PM', '02:00 PM', 'VKEB6464'),
(21, 'Zaben sada zumunta', '28 Min', '', '', '03:30 PM', '03:58PM', 'VKEB6464'),
(22, 'Mu shakata', '15 Min', '', '', '04:45 PM', '05:00 PM', 'VKEB6464'),
(23, 'Idon mikiya rpt', '60 Min', '', '', '05:00 PM', '06:00 PM', 'VKEB6464'),
(24, 'Labarun vision', '30 Min', '', '', '06:00 PM', '06:30 PM', 'VKEB6464'),
(25, 'Vision news', '30 Min', '', '', '06:30 PM', '07:00 PM', 'VKEB6464'),
(26, 'Sadarwa a tafin hannu', '60 Min', '', '', '07:00 PM', '08:00 PM', 'VKEB6464'),
(27, 'Advert/musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(28, 'Kowani tsuntsu', '30 Min', '', '', '08:30 PM', '09:00 PM', 'VKEB6464'),
(29, 'Ina muka dosa', '60 Min', '', '', '09:00 PM', '10:00 PM', 'VKEB6464'),
(30, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(31, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(32, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(33, 'News Update [English]', '5 Min', 'News and Current Affairs', '', '09:00 AM', '09:05 AM', 'VKAT4050'),
(35, 'Burgami', '60 Min', 'Mother Station Abuja', '', '11:00 AM', '12:00 PM', 'VKAT4050'),
(36, 'Mai Talla', '-705 Min', 'Sponsored', 'Nasiru Sadi', '12:00 PM', '12:15AM', 'VKAT4050'),
(37, 'News Update [Hausa]', '15 Min', 'News and Current Affairs', '', '12:15PM', '12:30 PM', 'VKAT4050'),
(38, 'Vision News', '-705 Min', 'News and Current Affairs', '', '06:00 PM', '06:15AM', 'VKAT4050'),
(39, 'Najeriya Ayau', '45 Min', 'Mother Station Abuja', '', '07:00 PM', '07:45 PM', 'VKAT4050'),
(40, 'Labarun Vision ', '15 Min', 'News and Current Affairs', '', '08:00 PM', '08:15PM', 'VKAT4050'),
(41, 'Zaben Sada Zumunta', '30 Min', 'Hadiza Kabir ', 'Aliyu Arebia Basiru Dayi Nasir Sadi', '10:30PM', '11:00 PM', 'VKAT4050'),
(42, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(43, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(44, 'Health is Wealth', '30 Min', 'Zainab Isa Sulaiman', '', '12.30pm', '1.00pm', 'VKAT4050'),
(45, 'Hanyar Tsira', '30 Min', 'Sponsored', 'Abubakar S Gefe', '01:30 PM', '02:00 PM', 'VKAT4050'),
(46, 'Mai Kamar Zuwa', '30 Min', 'Sponsored', 'Kabir Hassan', '02:30 PM', '03:00 PM', 'VKAT4050'),
(47, 'Hasken Makaranta', '30 Min', 'Sponsored', 'Bilkisu Dauda', '03:30 PM', '04:00 PM', 'VKAT4050'),
(48, 'Tukunyarki Sirrinki', '30 Min', 'Basira Sani Bala', 'Basira Sani Bala', '04:30PM', '05:00 PM', 'VKAT4050'),
(49, 'Zaman Gaskiya', '30 Min', 'Sponsored', '', '10:30PM', '11:00 PM', 'VKAT4050'),
(50, 'Filin Murausaya', '45 Min', 'Abubakar S Gefe', 'Abubakar S Gefe', '11:00 PM', '11:45 PM', 'VKAT4050'),
(51, 'Babbar magana', '60 Min', 'Abdrahman Kabir Jani/Mohammed Babangida', 'Abdurahman Kabir Jani, Kabir Saidu Dandagor, Mohammed Habib Umar', '10:00 AM', '11:00 AM', 'VKAT4050'),
(52, 'Filin Mu Rausaya', '45 Min', 'Abubakar S Gefe', 'Abubakar S Gefe', '11:00 PM', '11:45 PM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `p_wed`
--

CREATE TABLE `p_wed` (
  `ID` int(11) NOT NULL,
  `P_Name` varchar(100) NOT NULL,
  `Duration` varchar(100) NOT NULL,
  `Producer` varchar(100) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `T_From` varchar(100) NOT NULL,
  `T_To` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_wed`
--

INSERT INTO `p_wed` (`ID`, `P_Name`, `Duration`, `Producer`, `Presenters`, `T_From`, `T_To`, `Station_ID`) VALUES
(1, 'Opening formalities', '10 Min', '', '', '06:00 AM', '06:10 AM', 'VKEB6464'),
(2, 'Reading from the Holy Quran', '20 Min', '', '', '06:10 AM', '06:30 AM', 'VKEB6464'),
(3, 'Aa muka tashi', '30 Min', '', '', '06:30 AM', '07:00 AM', 'VKEB6464'),
(4, 'who don wake up', '30 Min', '', '', '07:00 AM', '07:30 AM', 'VKEB6464'),
(5, 'Tambaya Mabudin Ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(6, 'Adverts/Musicals', '30 Min', '', '', '08:30AM', '09:00 AM', 'VKEB6464'),
(7, 'Siffatus salat', '30 Min', '', '', '09:00 AM', '09:30 AM', 'VKEB6464'),
(8, 'Adverts/Musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(9, 'Adverts/Musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(10, 'Kyautar shan-shani', '60 Min', '', '', '10:15 PM', '11:15PM', 'VKEB6464'),
(11, 'Mu kwan lafiya', '30 Min', '', '', '11:15PM', '11:45 PM', 'VKEB6464'),
(12, 'DCA SIGN OUT', '3 Min', '', '', '11:45 PM', '11:48PM', 'VKEB6464'),
(13, 'Reading from the holy Quran', '-1430 Min', '', '', '11:48PM', '11:58M', 'VKEB6464'),
(14, 'Closing formalities', '-1438 Min', '', '', '11:58PM', '12:00AM', 'VKEB6464'),
(15, 'Tambaya mabudin ilimi', '30 Min', '', '', '08:00 AM', '08:30AM', 'VKEB6464'),
(16, 'Mai talla', '30 Min', '', '', '12:00 PM', '12:30 PM', 'VKEB6464'),
(17, 'Takaitattun labaru', '15 Min', '', '', '12:30 PM', '12:45PM', 'VKEB6464'),
(18, 'News update', '15 Min', '', '', '12:45PM', '01:00 PM', 'VKEB6464'),
(19, 'Inside our MDAs', '60 Min', '', '', '01:00 PM', '02:00 PM', 'VKEB6464'),
(20, 'Guest of the moment', '45 Min', '', '', '02:00 PM', '02:45PM', 'VKEB6464'),
(21, 'Adverts/musicals', '30 Min', '', '', '03:00 PM', '03:30 PM', 'VKEB6464'),
(22, 'Zaben sada zumunta', '28 Min', '', '', '03:30 PM', '03:58PM', 'VKEB6464'),
(23, 'Najeriya a yau', '45 Min', '', '', '04:00 PM', '04:45 PM', 'VKEB6464'),
(24, 'Mu shakata', '15 Min', '', '', '04:45 PM', '05:00 PM', 'VKEB6464'),
(25, 'Mai haja', '45 Min', '', '', '05:00 PM', '05:45PM', 'VKEB6464'),
(26, 'Wakokin gargajiya', '15 Min', '', '', '05:45PM', '06:00 PM', 'VKEB6464'),
(27, 'Labarun vision ', '30 Min', '', '', '06:00 PM', '06:30 PM', 'VKEB6464'),
(28, 'Vision news', '60 Min', '', '', '06:30 PM', '07:30 PM', 'VKEB6464'),
(29, 'Advert/musicals', '30 Min', '', '', '08:00 PM', '08:30 PM', 'VKEB6464'),
(30, 'Tarihin kebbi', '30 Min', '', '', '08:30 PM', '09:00 PM', 'VKEB6464'),
(31, 'Duniyar matasa', '30 Min', '', '', '09:00 PM', '09:30PM', 'VKEB6464'),
(32, 'Makwarwa', '30 Min', '', '', '09:30PM', '10:00 PM', 'VKEB6464'),
(33, 'Opening Formalities', '5 Min', 'Station Identification', '', '06:00 AM', '06:05AM', 'VKAT4050'),
(34, 'Program Parade/Station ID', '5 Min', 'OAP', '', '06:05AM', '06:10 AM', 'VKAT4050'),
(35, 'Tafsir Sheik Daurawa', '30 Min', 'Sponsored', '', '07:00 AM', '07:30 AM', 'VKAT4050'),
(36, 'News Update [English]', '5 Min', 'News and Current Affairs', '', '09:00 AM', '09:05 AM', 'VKAT4050'),
(38, 'Burgami', '60 Min', 'Mother Station Abuja', '', '11:00 AM', '12:00 PM', 'VKAT4050'),
(39, 'Mai Talla', '-705 Min', 'Sponsored', 'Nasiru Sadi', '12:00 PM', '12:15AM', 'VKAT4050'),
(40, 'News Update [Hausa]', '15 Min', 'News and Current Affairs', '', '12:15PM', '12:30 PM', 'VKAT4050'),
(41, 'Vision News', '-705 Min', 'News and Current Affairs', '', '06:00 PM', '06:15AM', 'VKAT4050'),
(42, 'Najeriya Ayau', '45 Min', 'Mother Station Abuja', '', '07:00 PM', '07:45 PM', 'VKAT4050'),
(43, 'Labarun Vision ', '15 Min', 'News and Current Affairs', '', '08:00 PM', '08:15PM', 'VKAT4050'),
(44, 'Kowane Tsuntsu', '30 Min', 'Abdulrahaman Kabir Jani', 'Abdulrahman Kabir, Kabir Hassan.', '08:30 PM', '09:00 PM', 'VKAT4050'),
(45, '15 Minutes Dr Ahmad', '15 Min', 'Sponsored', 'Abdulrahman Kabir', '10:15 PM', '10:30PM', 'VKAT4050'),
(46, 'Barkwanci', '45 Min', 'OAP', '', '11:00 PM', '11:45 PM', 'VKAT4050'),
(47, 'Closing Formalities', '-1435 Min', 'Station Identification', '', '11:55 PM', '12:00AM', 'VKAT4050'),
(48, 'Albarka Tana Gona', '30 Min', 'Sponsored', '', '08:00 AM', '08:30AM', 'VKAT4050'),
(49, 'Munji Mun Gana', '30 Min', 'Sponsored', '', '08:30AM', '09:00 AM', 'VKAT4050'),
(50, 'Madubi', '15 Min', 'BBC Media', '', '09:30 AM', '09:45AM', 'VKAT4050'),
(51, 'Noma Na Duke', '30 Min', 'Ibrahim Abdullahi', 'Ibrahim Abdullahi', '01:00 PM', '01:30 PM', 'VKAT4050'),
(52, 'Kowaya Gyara', '30 Min', 'Abdulrahaman Kabir Jani', 'Abdulrahman Kabir', '02:00 PM', '02:30 PM', 'VKAT4050'),
(53, 'Wasa Kwakwalwa', '60 Min', 'Ibrahim Abdullahi', 'Ibrahim Abdullahi Abdulrazaq Yusuf', '05:00 PM', '06:00 PM', 'VKAT4050'),
(54, 'Tarbiyya A Musulunci', '30 Min', 'Sponsored', '', '06:30 PM', '07:00 PM', 'VKAT4050'),
(55, 'Shugabanci Drama', '30 Min', 'Mother Station Abuja', '', '09:00 PM', '09:30PM', 'VKAT4050'),
(56, 'Waiwaye Adon Tafiya', '30 Min', 'Ibrahim Abdullahi', 'Abdulrazaq Yusuf', '09:30PM', '10:00 PM', 'VKAT4050'),
(57, 'Dandalin Masoya', '45 Min', 'Muhammad Habib', 'Abubakar S Gefe', '10:15PM', '11:00 PM', 'VKAT4050'),
(58, 'Mu leka PLBC', '30 Min', 'Sponsored', 'Ibrahim Yunusa D/ma', '08:30AM', '09:00 AM', 'VKAT4050'),
(59, 'Don Marayu', '30 Min', 'Hadiza Kabir', 'Hadiza Kabir ', '02:30 PM', '03:00 PM', 'VKAT4050'),
(60, 'Aladar Aure', '30 Min', 'Malan Ibrahim Balarabe', 'Malan Ibrahim Balarabe', '03:00 PM', '03:30 PM', 'VKAT4050'),
(61, 'Babbar magana', '60 Min', 'Abdrahman Kabir Jani/Mohammed Babangida', 'Abdurahman Kabir Jani, Kabir Saidu Dandagor, Mohammed Habib Umar', '10:00 AM', '11:00 AM', 'VKAT4050'),
(62, 'Oldies', '30 Min', 'Cynthia', '', '02:30 PM', '03:00 PM', 'VKAT4050'),
(63, 'Don Marayu', '30 Min', 'Hadiza Kabir', 'Hadiza Kabir', '12:30 PM', '01:00 PM', 'VKAT4050'),
(64, 'Dogaro Da Kai', '30 Min', 'Ibrahim Balarabe', 'Ibrahim Balarabe', '06:30 PM', '07:00 PM', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `register_advert`
--

CREATE TABLE `register_advert` (
  `ID` int(11) NOT NULL,
  `Advert_ID` varchar(250) NOT NULL,
  `Client_Name` varchar(250) NOT NULL,
  `Client_Type` varchar(50) NOT NULL,
  `Client_Number` varchar(250) NOT NULL,
  `Advert_Name` varchar(100) NOT NULL,
  `Advert_Type` varchar(250) NOT NULL,
  `Payment_Mode` varchar(50) DEFAULT NULL,
  `Second_Pay_Due` varchar(50) DEFAULT NULL,
  `Third_Pay_Due` varchar(50) DEFAULT NULL,
  `Per_Slot` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Paid` int(11) DEFAULT NULL,
  `Second_Pay_Amt` int(11) DEFAULT NULL,
  `Third_Pay_Amt` int(11) DEFAULT NULL,
  `Balance` int(11) NOT NULL,
  `Duration` varchar(50) DEFAULT NULL,
  `Slot` int(11) NOT NULL,
  `Start_Date` varchar(50) NOT NULL,
  `End_Date` varchar(50) NOT NULL,
  `Num_Days` int(11) NOT NULL,
  `Remarks` varchar(50) NOT NULL,
  `Reg_By` varchar(100) NOT NULL,
  `Reg_Date` date NOT NULL,
  `Commision` varchar(50) DEFAULT NULL,
  `CommisionAmount` int(11) DEFAULT NULL,
  `Agencypay` varchar(50) DEFAULT NULL,
  `AgencypayAmount` int(11) DEFAULT NULL,
  `Modeofpay` varchar(100) DEFAULT NULL,
  `Source` varchar(100) DEFAULT NULL,
  `Netamount` int(11) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_advert`
--

INSERT INTO `register_advert` (`ID`, `Advert_ID`, `Client_Name`, `Client_Type`, `Client_Number`, `Advert_Name`, `Advert_Type`, `Payment_Mode`, `Second_Pay_Due`, `Third_Pay_Due`, `Per_Slot`, `Amount`, `Paid`, `Second_Pay_Amt`, `Third_Pay_Amt`, `Balance`, `Duration`, `Slot`, `Start_Date`, `End_Date`, `Num_Days`, `Remarks`, `Reg_By`, `Reg_Date`, `Commision`, `CommisionAmount`, `Agencypay`, `AgencypayAmount`, `Modeofpay`, `Source`, `Netamount`, `Station_ID`) VALUES
(22, 'BA6487', 'State Emergency management agency', 'Government', '0', 'BABA BUHARI', 'Advert', '', '', '', 1500, 15000, 20000, NULL, NULL, -5000, '60 Sec', 10, '2018-06-27', '2018-06-28', 1, 'Over Paid', 'Mb Mafara', '2018-06-28', '2000%', 0, '0%', 0, 'Cash', 'Ibrahim Balarabe', 15000, 'VKAT4050'),
(23, 'YA8824', 'Yalo House', 'Individual', '0', 'Yalo House', 'Advert', '', '', '', 2000, 20000, 20000, NULL, NULL, 0, '60 Sec', 10, '2018-06-27', '2018-06-30', 3, 'Paid', 'Mb Mafara', '2018-06-28', '%', 2000, '0%', 0, 'Cash', '', 18000, 'VKAT4050'),
(24, 'NA6940', 'Nawda University', 'Individual', '0', 'Nawda University', 'Advert', '', '', '', 1500, 22500, 22500, NULL, NULL, 0, '60 Sec', 15, '2018-06-27', '2018-07-03', 6, 'Paid', 'Mb Mafara', '2018-06-28', '%', 2250, '0%', 0, 'Cash', '', 20250, 'VKAT4050'),
(25, 'S 7319', 'S A Girls Child', 'Individual', '0', 'S A Girls Child', 'Advert', '', '', '', 1400, 9800, 10000, 10000, NULL, -200, '5 Sec', 7, '2018-06-26', '2018-06-27', 1, 'Over Paid', 'Mb Mafara', '2018-06-28', '%', 1000, '0%', 0, 'Cash', '', 8800, 'VKAT4050'),
(26, 'ZA6396', 'Zaman mutum da sanaarsa', '', '0', 'Zaman mutum da sanaarsa', 'Advert', '', '', '', 10000, 10000, 10000, NULL, NULL, 0, '15 Min', 1, '2018-06-27', '2018-06-27', 0, 'Paid', 'Mb Mafara', '2018-06-28', '%', 0, '0%', 0, 'Cash', '', 10000, 'VKAT4050'),
(27, 'TA9969', 'Tafseer Bawan Allah', 'Individual', '0', 'Tafseer Bawan Allah', 'Recorded Programe', '2', '2018-07-02', '', 8300, 249000, 125000, NULL, NULL, 124000, '30 Min', 30, '2018-05-17', '2018-06-15', 29, 'Not Paid', 'Mb Mafara', '2018-06-30', '%', 12500, '0%', 0, 'Cash', 'Mohammed Habib Umar', 236500, 'VKAT4050'),
(28, 'TR1813', 'Ahaji Muhammadu ', 'Individual', '0', 'Trade Fair announcement ', 'Advert', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '40 Sec', 2, '2018-06-28', '2018-06-28', 0, 'Paid', 'Mb Mafara', '2018-06-30', '%', 0, '0%', 0, 'Cash', 'Alhaji Muhammadu ', 4000, 'VKAT4050'),
(29, 'SO4486', 'Abubakar Tsanni', 'Individual', '0', 'Soja', 'Advert', '1', '', '', 2000, 8000, 8000, NULL, NULL, 0, '60 Sec', 4, '2018-06-28', '2018-06-29', 1, 'Paid', 'Mb Mafara', '2018-06-30', '%', 800, '0%', 0, 'Cash', 'Ibrahim Abdullahi Dutsin ma', 7200, 'VKAT4050'),
(30, 'AU3122', 'Abdurrahmnan ', 'Individual', '0', 'Aure 33', 'Advert', '1', '', '', 1500, 4500, 5000, NULL, NULL, -500, '60 Sec', 3, '2018-06-28', '2018-06-29', 1, 'Over Paid', 'Mb Mafara', '2018-06-30', '%', 0, '0%', 0, 'Cash', 'Abdurrahman Kabir Jani', 4500, 'VKAT4050'),
(31, 'CH8450', 'P.R.O RUWASSA', 'Individual', '0', 'CHERISH COLLEGE', 'Advert', '1', '', '', 3000, 18000, 18000, NULL, NULL, 0, '60 Sec', 6, '2018-07-01', '2018-07-07', 6, 'Paid', 'Mb Mafara', '2018-06-30', '%', 1800, '0%', 0, 'Cash', 'Mohammed Babangida', 16200, 'VKAT4050'),
(32, 'TA3988', 'HAMZA YUNUSA JIBIA', 'Individual', '0', 'TARON MATASA', 'Advert', '1', '', '', 2000, 16000, 16000, NULL, NULL, 0, '60 Sec', 8, '2018-06-29', '2018-07-01', 2, 'Paid', 'Mb Mafara', '2018-06-30', '%', 1600, '0%', 0, 'Cash', 'IBRAHIM ABDULAHI YUNUSA', 14400, 'VKAT4050'),
(33, 'BA6765', 'Baba Buhari jingle', 'Individual', '0', 'baba buhari jingle', 'Advert', '', '', '', 2000, 20000, 0, NULL, NULL, 20000, '60 Sec', 10, '27-06-2018', '28-06-2018', 1, 'Not Paid', 'Mb Mafara', '2018-07-03', '%', 2000, '0%', 0, 'Cash', 'Dutsin ma', 18000, 'VKAT4050'),
(34, 'TR7722', 'Trade fair ', 'Individual', '0', 'Trade fair annaouncement', 'Advert', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '40 Sec', 2, '28-06-2018', '', 5, 'Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(35, 'SO2617', 'Abubakar Tsanni', 'Individual', '0', 'Soja', 'Advert', '', '', '', 1500, 6000, 8000, NULL, NULL, -2000, '55 Sec', 4, '28-06-2018', '29-06-2018', 1, 'Over Paid', 'Mb Mafara', '2018-07-03', '%', 800, '0%', 0, 'Cash', 'Dutsin ma', 5200, 'VKAT4050'),
(36, 'CH6856', 'cherish college', 'Individual', '0', 'cherish college', 'Advert', '1', '', '', 3000, 18000, 0, NULL, NULL, 18000, '60 Sec', 6, '1-07-2018', '7-07-2018', 6, 'Not Paid', 'Mb Mafara', '2018-07-03', '%', 1800, '0%', 0, 'Cash', '', 16200, 'VKAT4050'),
(37, 'WE8995', 'Wedding invitation', 'Individual', '0', 'Wedding invitation', 'Advert', '', '', '', 1500, 4500, 4500, NULL, NULL, 0, '', 3, '28-06-2018', '29-06-2018', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', 'babangida', 4500, 'VKAT4050'),
(38, 'TA2760', 'Taron Matasa', 'Individual', '0', 'Taron Matasa', 'Advert', '1', '', '', 2000, 16000, 16000, NULL, NULL, 0, '60 Sec', 8, '2018-06-29', '2018-06-30', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 1600, '0%', 0, 'Cash', 'Dutsinma', 14400, 'VKAT4050'),
(39, 'AL1145', 'Algon PMB Visit', 'Individual', '0', 'Algon PMB Visit', 'Advert', '1', '', '', 2000, 16000, 16000, NULL, NULL, 0, '60 Sec', 8, '2018-06-29', '2018-06-30', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 1600, '0%', 0, 'Cash', 'Baba Abu', 14400, 'VKAT4050'),
(40, 'KO6635', 'Kowane Tsuntsu', 'Individual', '0', 'Kowane Tsuntsu', 'Recorded Programe', '1', '', '', 15000, 15000, 15000, NULL, NULL, 0, '20 Min', 1, '2018-06-29', '2018-06-29', 0, 'Paid', 'Mb Mafara', '2018-07-03', '%', 1500, '0%', 0, 'Cash', 'Iyatawa', 13500, 'VKAT4050'),
(41, 'MA3654', 'Mai Talla', 'Individual', '0', 'Mai Talla', 'Advert', '1', '', '', 676, 17576, 17600, NULL, NULL, -24, '2 Min', 26, '2018-07-01', '2018-07-26', 25, 'Over Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', 'Bello Rawayau', 17576, 'VKAT4050'),
(42, 'DA3299', 'Dan Baiwa', 'Individual', '0', 'Dan Baiwa', 'Advert', '1', '', '', 1666, 49980, 50000, NULL, NULL, -20, '4 Min', 30, '2018-06-29', '2018-07-29', 30, 'Over Paid', 'Mb Mafara', '2018-07-03', '%', 5000, '0%', 0, 'Cash', 'Jani', 44980, 'VKAT4050'),
(43, 'GR6570', 'Green House', 'Individual', '0', 'Green House Updated', 'Advert', '1', '', '', 2000, 120000, 120000, NULL, NULL, 0, '30 Sec', 60, '2018-07-01', '2018-07-30', 29, 'Paid', 'Mb Mafara', '2018-07-03', '%', 12000, '0%', 0, 'Cash', 'Bello Rawayau', 108000, 'VKAT4050'),
(44, 'WA9948', 'Wapa Yoghourt', 'Individual', '0', 'Wapa Yoghourt', 'Advert', '1', '', '', 1333, 39990, 40000, NULL, NULL, -10, '60 Sec', 30, '2018-07-01', '2018-07-30', 29, 'Over Paid', 'Mb Mafara', '2018-07-03', '%', 4000, '0%', 0, 'Cash', 'Bello Rawayau', 35990, 'VKAT4050'),
(45, 'ER6473', 'Erisco Foods', 'Individual', '0', 'Erisco Foods', 'Advert', '1', '', '', 2586, 80166, 80000, NULL, NULL, 166, '60 Sec', 31, '2018-07-01', '2018-07-31', 30, 'Not Paid', 'Mb Mafara', '2018-07-03', '%', 8000, '0%', 0, 'Cash', 'Umar Sabiu', 72166, 'VKAT4050'),
(46, 'DA9856', 'Dadin Kowa', 'Individual', '0', 'Dadin Kowa', 'Advert', '2', '2018-07-17', '', 2000, 60000, 3000, NULL, NULL, 57000, '', 30, '2018-07-01', '2018-07-30', 29, 'Not Paid', 'Mb Mafara', '2018-07-03', '%', 3000, '0%', 0, 'Cash', 'Abubakar Masanawa', 57000, 'VKAT4050'),
(47, 'AP8158', 'APC MUntari', 'Individual', '0', 'APC MUntari', 'Advert', '1', '', '', 2000, 8000, 8000, NULL, NULL, 0, '60 Sec', 4, '2018-07-02', '2018-07-03', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 800, '0%', 0, 'Cash', 'Bahaushe', 7200, 'VKAT4050'),
(48, 'DA1411', 'Darika', 'Individual', '0', 'Darika', 'Recorded Programe', '1', '', '', 2000, 4000, 0, NULL, NULL, 4000, '30 Min', 2, '2018-07-03', '2018-07-10', 7, 'Not Paid', 'Mb Mafara', '2018-07-03', '%', 4000, '0%', 0, 'Cash', 'Dutsin Ma', 0, 'VKAT4050'),
(49, 'WE3172', 'wedding invitation', 'Individual', '0', 'wedding invitation', 'Advert', '1', '', '', 2000, 4000, 4000, NULL, NULL, 0, '45 Sec', 2, '2018-07-04', '2018-07-05', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(50, 'AN8955', 'Lost of child', 'Individual', '0', 'Announcement', 'Advert', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '25 Sec', 1, '2018-07-02', '2018-07-02', 0, 'Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(51, 'AN8641', 'S. A GIRLS CHILD EDUCATION', 'Individual', '0', 'ANNOUNCEMENT S.A GIRLS CHILD', 'Advert', '1', '', '', 2500, 5000, 5000, NULL, NULL, 0, '50 Sec', 2, '2018-07-02', '2018-07-03', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 500, '0%', 0, 'Cash', '', 4500, 'VKAT4050'),
(52, 'TA1762', 'TAFSEER KALA KATO', 'Individual', '0', 'TAFSEER KALA KATO', 'Recorded Programe', '2', '2018-07-26', '', 0, 0, 150000, NULL, NULL, -150000, '30 Min', 0, '2018-07-03', '2018-09-03', 62, 'Over Paid', 'Mb Mafara', '2018-07-03', '%', 15000, '0%', 0, 'Cash', 'kAFIN SOLI', -15000, 'VKAT4050'),
(53, 'S-8572', 'S- POWER', 'Individual', '0', 'S- POWER', 'Advert', '1', '', '', 2000, 18000, 18000, NULL, NULL, 0, '55 Sec', 9, '2018-07-02', '2018-07-04', 2, 'Paid', 'Mb Mafara', '2018-07-03', '%', 1800, '0%', 0, 'Cash', 'Dutsin Ma', 16200, 'VKAT4050'),
(54, 'UL2422', 'Ulul Albab', 'Individual', '0', 'Ulul Albab', 'Advert', '1', '', '', 2300, 9200, 9200, NULL, NULL, 0, '40 Sec', 4, '2018-07-08', '2018-07-09', 1, 'Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', 'Babangida', 9200, 'VKAT4050'),
(55, 'TR4794', 'Trade fair announcement', 'Individual', '0', 'Trade fair announcement', 'Advert', '1', '', '', 1500, 3000, 3000, NULL, NULL, 0, '35 Sec', 2, '2018-07-03', '2018-07-03', 0, 'Paid', 'Mb Mafara', '2018-07-03', '%', 0, '0%', 0, 'Cash', 'Babangida', 3000, 'VKAT4050'),
(56, 'BA9156', 'Barda ', 'Individual', '0', 'Barda jingle', 'Advert', '1', '', '', 0, 0, 60000, NULL, NULL, -60000, '60 Min', 30, '2018-07-04', '2018-08-03', 30, 'Over Paid', 'Mb Mafara', '2018-07-09', '%', 6000, '0%', 0, 'Cash', 'Jani', -6000, 'VKAT4050'),
(57, 'KO4758', 'Kowanne Tsuntsu', 'Individual', '0', 'Kowanne Tsuntsu', 'Recorded Programe', '1', '', '', 0, 0, 0, NULL, NULL, 0, '25 Min', 1, '2018-07-02', '2018-07-02', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 7000, '0%', 0, 'Cash', 'Iyatawa', -7000, 'VKAT4050'),
(58, 'MI6338', 'Dr Ahmed Adamu', 'Individual', '0', 'Mintuna Goma Sha Biyar', 'Recorded Programe', '1', '', '', 1500, 15000, 150000, NULL, NULL, -135000, '15 Min', 10, '2018-07-02', '2018-09-03', 63, 'Over Paid', 'Mb Mafara', '2018-07-09', '%', 15000, '0%', 0, 'Cash', 'Dutsin Ma', 0, 'VKAT4050'),
(59, 'KO7532', 'Kowane Tsuntsu', 'Individual', '0', 'Kowane Tsuntsu', 'Recorded Programe', '1', '', '', 0, 0, 50000, NULL, NULL, -50000, '20 Sec', 1, '2018-07-03', '2018-07-03', 0, 'Over Paid', 'Mb Mafara', '2018-07-09', '%', 5000, '0%', 0, 'Cash', 'Iyatawa', -5000, 'VKAT4050'),
(60, 'KA6292', 'Arch Faisal Rafin Dadi', 'Individual', '0', 'Katsina Gallery', 'Recorded Programe', '1', '', '', 0, 0, 30000, NULL, NULL, -30000, '30 Min', 1, '2018-07-03', '2018-07-03', 0, 'Over Paid', 'Mb Mafara', '2018-07-09', '%', 3000, '0%', 0, 'Cash', 'Babangida', -3000, 'VKAT4050'),
(61, 'IN9191', 'Ingawa', 'Individual', '0', 'Ingawa PMB jINGLE', 'Advert', '1', '', '', 1800, 5400, 5400, NULL, NULL, 0, '40 Sec', 3, '2018-07-03', '2018-07-04', 1, 'Paid', 'Mb Mafara', '2018-07-09', '%', 500, '0%', 0, 'Cash', 'M. Habib', 4900, 'VKAT4050'),
(62, 'FI4868', 'Fityanul Islam', 'Individual', '0', 'Fityanul Islam', 'Advert', '1', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-07-04', '2018-07-05', 1, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Dutsin Ma', 4000, 'VKAT4050'),
(63, 'DE1243', 'Death announcement', 'Individual', '0', 'death announcment', 'Advert', '1', '', '', 1000, 1000, 1000, NULL, NULL, 0, '40 Sec', 1, '2018-07-04', '2018-07-04', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Babangida', 1000, 'VKAT4050'),
(64, 'AL9332', 'Alqalam University', 'Individual', '0', 'Alqalam', 'Advert', '1', '', '', 1500, 30000, 30000, NULL, NULL, 0, '55 Sec', 20, '2018-07-04', '2018-07-23', 19, 'Paid', 'Mb Mafara', '2018-07-09', '%', 3000, '0%', 0, 'Cash', 'Rabi Runka', 27000, 'VKAT4050'),
(65, 'ZA8178', 'zaman mutum da sana arsa', 'Individual', '0', 'zaman mutum da sanaarsa', 'Live Program', '1', '', '', 0, 0, 10000, NULL, NULL, -10000, '15 Sec', 1, '2018-07-04', '2018-07-04', 0, 'Over Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Fikira', 0, 'VKAT4050'),
(66, 'HA2141', 'State Pilgrims welfare board', 'Individual', '0', 'Hajj', 'Advert', '1', '', '', 2000, 6000, 6000, NULL, NULL, 0, '45 Sec', 3, '2018-07-04', '2018-07-06', 2, 'Paid', 'Mb Mafara', '2018-07-09', '%', 600, '0%', 0, 'Cash', 'Jikamshi', 5400, 'VKAT4050'),
(67, 'TR1516', 'Trade Fair', 'Individual', '0', 'Trade Fair', 'Advert', '', '', '', 2, 3000, 3000, NULL, NULL, 0, '40 Sec', 1500, '2018-07-04', '2018-07-05', 1, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Babangida', 3000, 'VKAT4050'),
(68, 'KO5161', 'kowane tsuntsu', 'Individual', '0', 'kowane tsuntsu', 'Advert', '1', '', '', 8000, 8000, 8000, NULL, NULL, 0, '10 Sec', 1, '2018-07-04', '2018-07-04', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 800, '0%', 0, 'Cash', 'Iyatawa', 7200, 'VKAT4050'),
(69, 'LO5371', 'lost o properties', 'Individual', '0', 'lost properties', 'Advert', '', '', '', 1000, 2000, 2000, NULL, NULL, 0, '35 Sec', 2, '2018-07-05', '2018-07-05', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Amina', 2000, 'VKAT4050'),
(70, 'HA4823', 'Halima Adamu', 'Individual', '0', 'Halima Adamu ', 'Advert', '1', '', '', 2000, 10000, 10000, NULL, NULL, 0, '55 Sec', 5, '2018-07-05', '2018-07-09', 4, 'Paid', 'Mb Mafara', '2018-07-09', '%', 1000, '0%', 0, 'Cash', 'Surajo Malumfashi', 9000, 'VKAT4050'),
(71, 'KT1683', 'Katsina Forum', 'Individual', '0', 'KTN F9', 'Advert', '1', '', '', 2000, 14000, 14000, NULL, NULL, 0, '60 Sec', 7, '2018-07-05', '2018-07-07', 2, 'Paid', 'Mb Mafara', '2018-07-09', '%', 1400, '0%', 0, 'Cash', 'Dutsin Ma', 12600, 'VKAT4050'),
(72, 'KA4392', 'Katsina Gallery and exhibition', 'Individual', '0', 'Katsina gallery jingle', 'Advert', '1', '', '', 4000, 60000, 60000, NULL, NULL, 0, '55 Sec', 15, '2018-07-05', '2018-07-19', 14, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Babangida', 60000, 'VKAT4050'),
(73, 'MI8122', 'Missing child', 'Individual', '0', 'Missing child', 'Advert', '', '', '', 1500, 1500, 1500, NULL, NULL, 0, '25 Sec', 1, '2018-07-06', '2018-07-06', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Babangida', 1500, 'VKAT4050'),
(74, 'MA1375', 'Almusic ventures', 'Individual', '0', 'Mai talla', 'Recorded Programe', '', '', '', 0, 0, 30000, NULL, NULL, -30000, '60 Sec', 30, '', '', 0, 'Over Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Jani', 0, 'VKAT4050'),
(75, 'MI6644', 'Missing child', 'Individual', '0', 'missing child', 'Advert', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '25 Sec', 1, '2018-07-07', '2018-07-07', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(76, 'MA6821', 'Apaka Mai kayan kamshi', 'Individual', '0', 'mai talla', 'Advert', '1', '', '', 500, 2500, 2000, NULL, NULL, 500, '55 Sec', 5, '', '', 0, 'Not Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'Dutsen amare ', 2500, 'VKAT4050'),
(77, 'MA7470', 'MDR Computer', 'Individual', '0', 'mai talla', 'Advert', '1', '', '', 500, 2500, 2000, NULL, NULL, 500, '55 Sec', 5, '', '', 0, 'Not Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'dutsen amare', 2500, 'VKAT4050'),
(78, 'MA8077', 'Saukawa Joinery', 'Individual', '0', 'mai tallah', 'Advert', '1', '', '', 500, 2500, 2000, NULL, NULL, 500, '60 Sec', 5, '', '', 0, 'Not Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'dutsen amare', 2500, 'VKAT4050'),
(79, 'MA1581', 'Muhsin store', 'Individual', '0', 'maitalla', 'Advert', '1', '', '', 500, 2000, 1600, NULL, NULL, 400, '60 Sec', 4, '', '', 0, 'Not Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'dutsen amare', 2000, 'VKAT4050'),
(80, 'MA1272', 'Al Ansar ', 'Individual', '0', 'mai tallah', 'Advert', '', '', '', 400, 800, 800, NULL, NULL, 0, '60 Sec', 2, '', '', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'dutsen amare', 800, 'VKAT4050'),
(81, 'MA5077', 'al maansho', 'Individual', '0', 'mai talla', 'Advert', '', '', '', 400, 400, 400, NULL, NULL, 0, '60 Sec', 1, '', '', 0, 'Paid', 'Mb Mafara', '2018-07-09', '%', 0, '0%', 0, 'Cash', 'dutsen amare', 400, 'VKAT4050'),
(82, 'MA3116', 'Trade fair', '', '0', 'madagol', 'Advert', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '60 Sec', 2, '2018-07-09', '2018-07-09', 0, 'Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(83, 'JA5971', 'Jaiz Bank', '', '0', 'Jaiz Bank', 'Advert', '', '', '', 56000, 56000, 56000, NULL, NULL, 0, '', 1, '2018-07-09', '2018-07-17', 8, 'Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 56000, 'VKAT4050'),
(84, 'KO8720', 'ko wane tsuntsu', '', '0', 'ko wane tsuntsu', 'Recorded Programe', '', '', '', 0, 0, 30000, NULL, NULL, -30000, '', 0, '2018-07-10', '2018-07-10', 0, 'Over Paid', 'Ameena', '2018-07-23', '%', 3000, '0%', 0, 'Cash', '', -3000, 'VKAT4050'),
(85, 'KO7974', 'ko wane tsuntsu', '', '0', 'ko wane tsuntsu', 'Recorded Programe', '', '', '', 0, 0, 30000, NULL, NULL, -30000, '', 0, '2018-07-10', '2018-07-10', 0, 'Over Paid', 'Ameena', '2018-07-23', '%', 3000, '0%', 0, 'Cash', '', -3000, 'VKAT4050'),
(86, 'BA8888', 'basiru dayi', '', '0', 'basiru dayi', 'Advert', '', '', '', 0, 0, 2000, NULL, NULL, -2000, '', 4, '2018-07-10', '2018-07-14', 4, 'Over Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(87, 'JI5322', 'MUNTARI LAWAL', '', '0', 'JIBWIS', 'Advert', '', '', '', 0, 0, 5000, NULL, NULL, -5000, '', 3, '2018-07-11', '2018-07-13', 2, 'Over Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(88, 'AL9356', 'ALMUZIC VENTURES', '', '0', 'ALMUSIZ VENTURES', 'Advert', '', '', '', 0, 0, 90000, NULL, NULL, -90000, '60 Sec', 60, '2018-07-11', '2018-09-10', 61, 'Over Paid', 'Ameena', '2018-07-23', '%', 9000, '0%', 0, 'Cash', '', -9000, 'VKAT4050'),
(89, 'AL6938', 'AL HUDA', '', '0', 'AL HUDA', 'Advert', '', '', '', 0, 0, 5500, NULL, NULL, -5500, '60 Sec', 3, '2018-07-12', '2018-07-14', 2, 'Over Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(90, 'KO3230', 'KO WANE TSUNTSU', '', '0', 'KO WANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 50000, NULL, NULL, -50000, '', 0, '2018-07-12', '2018-07-12', 0, 'Over Paid', 'Ameena', '2018-07-23', '%', 5000, '0%', 0, 'Cash', '', -5000, 'VKAT4050'),
(91, 'AL6076', 'ALHAZAI ANNOUNCEMENT', '', '0', 'ALHAZAI ANNOUNCEMENT', 'Advert', '', '', '', 0, 0, 2000, NULL, NULL, -2000, '', 1, '2018-07-12', '2018-07-12', 0, 'Over Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(92, 'PH5051', 'PHCA', '', '0', 'PHCA', 'Advert', '', '', '', 0, 0, 120000, NULL, NULL, -120000, '', 60, '2018-07-13', '2018-08-01', 19, 'Over Paid', 'Ameena', '2018-07-23', '%', 12000, '0%', 0, 'Cash', '', -12000, 'VKAT4050'),
(93, 'AR1185', 'ARABIC COLLEGE', '', '0', 'ARABIC COLLEGE', 'Advert', '', '', '', 3000, 15000, 15000, NULL, NULL, 0, '', 5, '2018-07-25', '2018-07-27', 2, 'Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 15000, 'VKAT4050'),
(94, 'MI5176', 'MISSING CHILD', '', '0', 'MISSING CHILD', '', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-07-13', '2018-07-13', 0, 'Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(95, 'UM2465', 'UMYUK', '', '0', 'UMYUK', 'Advert', '', '', '', 0, 0, 18000, NULL, NULL, -18000, '', 7, '2018-07-14', '2018-07-15', 1, 'Over Paid', 'Ameena', '2018-07-23', '%', 1800, '0%', 0, 'Cash', '', -1800, 'VKAT4050'),
(96, 'UM7988', 'UMYUK', '', '0', 'UMYUK', 'Advert', '', '', '', 0, 0, 18000, NULL, NULL, -18000, '', 7, '2018-07-14', '2018-07-15', 1, 'Over Paid', 'Ameena', '2018-07-23', '%', 1800, '0%', 0, 'Cash', '', -1800, 'VKAT4050'),
(97, 'CO5919', 'CORPORATE AFFAIRS', '', '0', 'CORPORATE AFFAIRS', 'Advert', '', '', '', 0, 0, 30000, NULL, NULL, -30000, '60 Sec', 10, '2018-07-14', '2018-07-17', 3, 'Over Paid', 'Ameena', '2018-07-23', '%', 3000, '0%', 0, 'Cash', '', -3000, 'VKAT4050'),
(98, 'CB7569', 'CBN', '', '0', 'CBN', 'Live Program', '', '', '', 0, 0, 100000, NULL, NULL, -100000, '', 0, '2018-07-16', '2018-07-16', 0, 'Over Paid', 'Ameena', '2018-07-23', '%', 10000, '0%', 0, 'Cash', '', -10000, 'VKAT4050'),
(99, 'MA3787', 'MAI TALLA', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 0, 0, 1600, NULL, NULL, -1600, '', 4, '2018-07-16', '2018-07-19', 3, 'Over Paid', 'Ameena', '2018-07-23', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(100, ' M6768', 'SALISU INVESTMENT', '', '0', ' MAI TALLA', 'Recorded Programe', '', '', '', 0, 0, 2500, NULL, NULL, -2500, '', 0, '2018-07-16', '2018-07-20', 4, 'Over Paid', 'Ameena', '2018-07-23', '%', 500, '0%', 0, 'Cash', '', -500, 'VKAT4050'),
(101, 'IB5159', 'IBRAHIM TEXTILE', '', '0', 'IBRAHIM TEXTILE', 'Advert', '', '', '', 0, 0, 20000, NULL, NULL, -20000, '', 10, '2018-07-26', '2018-07-20', 4, 'Paid', 'Ameena', '2018-07-23', '%', 2000, '0%', 0, 'Cash', '', -2000, 'VKAT4050'),
(102, 'IB4034', 'IBRAHIM TEXTILE', '', '0', 'IBRAHIM TEXTILE', 'Advert', '', '', '', 2000, 20000, 20000, NULL, NULL, 0, '60 Sec', 10, '2018-07-16', '2018-07-26', 10, 'Paid', 'Ameena', '2018-07-24', '%', 2000, '0%', 0, 'Cash', '', 18000, 'VKAT4050'),
(103, 'KA6642', 'KAMFANIN KAJI', '', '0', 'KAMFANIN KAJI', 'Advert', '', '', '', 2000, 14000, 14000, NULL, NULL, 0, '', 7, '2018-07-17', '2018-07-19', 2, 'Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 14000, 'VKAT4050'),
(104, 'DE4310', 'TAAZIYYA', '', '0', 'DEATH ANNOUNCEMENT', 'Advert', '', '', '', 0, 0, 2000, NULL, NULL, -2000, '', 2, '2018-07-17', '2018-07-17', 0, 'Over Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(105, 'MI4970', 'MISSING PERSON', '', '0', 'MISSING CHILD', 'Advert', '', '', '', 1500, -1500, 1500, NULL, NULL, -3000, '', -1, '2018-07-17', '2018-07-17', 0, 'Over Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', -1500, 'VKAT4050'),
(106, 'FU4618', 'FUDMA', '', '0', 'FUDMA', 'Advert', '', '', '', 2000, 8000, 8000, NULL, NULL, 0, '', 4, '2018-07-17', '2018-07-20', 3, 'Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 8000, 'VKAT4050'),
(107, 'MI4886', 'MISSING ITEMS', '', '0', 'MISSING ITEMS', '', '', '', '', 0, 0, 3000, NULL, NULL, -3000, '', 3, '2018-07-17', '2018-07-25', 8, 'Over Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(108, 'ZA3771', 'ZAMAN MUTUM DA SANAARSA', '', '0', 'ZAMAN MUTUM DA SANAARSA', 'Advert', '', '', '', 0, 0, 10000, NULL, NULL, -10000, '', 0, '2018-07-18', '2018-07-18', 0, 'Over Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(109, 'TR1989', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Advert', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-07-18', '2018-07-18', 0, 'Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(110, 'KA7651', 'KATSINA INSTITUTE', '', '0', 'KATSINA INSTITUTE', 'Advert', '', '', '', 2000, 12000, 12000, NULL, NULL, 0, '', 6, '2018-07-19', '2018-07-24', 5, 'Paid', 'Ameena', '2018-07-24', '%', 1200, '0%', 0, 'Cash', '', 10800, 'VKAT4050'),
(111, 'MU6417', 'MUNAZZAMU FITYANU', '', '0', 'MUNAZZAMU FITYANU', 'Advert', '', '', '', 2000, 6000, 5000, NULL, NULL, 1000, '', 3, '2018-07-19', '2018-07-20', 1, 'Not Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 6000, 'VKAT4050'),
(112, 'KO9948', 'KO WANE TSUNTSU', '', '0', 'KO WANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 40000, NULL, NULL, -40000, '', 0, '2018-07-20', '2018-07-20', 0, 'Over Paid', 'Ameena', '2018-07-24', '%', 4000, '0%', 0, 'Cash', '', -4000, 'VKAT4050'),
(113, 'KU3271', 'KUNGIYAR YABO', '', '0', 'KUNGIYAR YABO', 'Advert', '', '', '', 2000, 6000, 6000, NULL, NULL, 0, '', 3, '2018-07-20', '2018-07-21', 1, 'Paid', 'Ameena', '2018-07-24', '%', 600, '0%', 0, 'Cash', '', 5400, 'VKAT4050'),
(114, 'CR6876', 'CREATIVE MOGUL', '', '0', 'CREATIVE MOGUL', 'Advert', '', '', '', 0, 0, 6000, NULL, NULL, -6000, '', 3, '2018-07-21', '2018-07-22', 1, 'Over Paid', 'Ameena', '2018-07-24', '%', 600, '0%', 0, 'Cash', '', -600, 'VKAT4050'),
(115, 'TA9062', 'TAAZIYYA', '', '0', 'TAAZIYA', 'Announcement', '', '', '', 2000, 8000, 8000, NULL, NULL, 0, '', 4, '2018-07-22', '2018-07-23', 1, 'Paid', 'Ameena', '2018-07-24', '%', 800, '0%', 0, 'Cash', '', 7200, 'VKAT4050'),
(116, 'KU4678', 'KUNGIYAR MASU DABINO', '', '0', 'KUNGIYAR MASU DABINO', 'Advert', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-07-22', '2018-07-22', 0, 'Paid', 'Ameena', '2018-07-24', '%', 400, '0%', 0, 'Cash', '', 3600, 'VKAT4050'),
(117, 'AW6923', 'AWARENESS JINGLE', '', '0', 'AWARENESS JINGLE', 'Advert', '', '', '', 2000, 6000, 6000, NULL, NULL, 0, '', 3, '2018-07-22', '2018-07-23', 1, 'Paid', 'Ameena', '2018-07-24', '%', 600, '0%', 0, 'Cash', '', 5400, 'VKAT4050'),
(118, 'MA3475', 'AMINCI STORE', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-07-23', '2018-07-27', 4, 'Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(119, 'MA2263', 'HADID METALS', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-07-23', '2018-07-27', 4, 'Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(120, 'MI9682', 'MISSING CHILD', '', '0', 'MISSING CHILD', 'Advert', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-07-23', '2018-07-23', 0, 'Paid', 'Ameena', '2018-07-24', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(121, 'NA4841', 'NAL COMMUNICATIONS', '', '0', 'NAL COMMUNICATIONS', 'Announcement', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-07-23', '2018-07-24', 1, 'Paid', 'Ameena', '2018-07-24', '%', 400, '0%', 0, 'Cash', '', 3600, 'VKAT4050'),
(122, 'KO5116', 'KO WANE TSUNTSU', '', '0', 'KO WANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 20000, NULL, NULL, -20000, '', 0, '2018-07-23', '2018-07-23', 0, 'Over Paid', 'Ameena', '2018-07-24', '%', 2000, '0%', 0, 'Cash', '', -2000, 'VKAT4050'),
(123, 'RA3388', 'RAJI', '', '0', 'RAJI', '', '', '', '', 2000, 6000, 6000, NULL, NULL, 0, '', 3, '2018-07-24', '2018-07-24', 0, 'Paid', 'Ameena', '2018-07-25', '%', 600, '0%', 0, 'Cash', '', 5400, 'VKAT4050'),
(124, 'MA8246', 'IBRAHIM TEXTILE', '', '0', 'MAI TALLA', 'Advert', '', '', '', 0, 0, 2000, NULL, NULL, -2000, '', 5, '2018-07-24', '2018-07-29', 5, 'Over Paid', 'Ameena', '2018-07-25', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(125, 'MA4456', 'AIG', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 0, 0, 2000, NULL, NULL, -2000, '', 0, '2018-07-24', '2018-07-29', 5, 'Over Paid', 'Ameena', '2018-07-25', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(126, 'KO7769', 'KOWANE TSUNTSU', '', '0', 'KOWANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 14000, NULL, NULL, -14000, '', 0, '2018-07-24', '2018-07-24', 0, 'Over Paid', 'Ameena', '2018-08-01', '%', 1400, '0%', 0, 'Cash', '', -1400, 'VKAT4050'),
(127, 'MI4055', 'MISSING CHILD', '', '0', 'MISSING CILD', 'Announcement', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-07-25', '2018-07-25', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(128, 'ZA8486', 'ZAMAN MUTUM A SANARSA', '', '0', 'ZAMAN MUTUM DA SANARSA', 'Recorded Programe', '', '', '', 0, 0, 10000, NULL, NULL, -10000, '', 0, '2018-07-25', '2018-08-25', 31, 'Over Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(129, 'FA8291', 'FAMILY SUPPORT`', '', '0', 'FAMILY SUPPORT', 'Announcement', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-07-25', '2018-07-25', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(130, 'KO3777', 'KOWANE TSUNTSU', '', '0', 'KOWANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 8000, NULL, NULL, -8000, '', 0, '2018-07-26', '2018-08-26', 31, 'Over Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(131, 'SH6283', 'SHEIK DAURAWA', '', '0', 'SHEIK DAURAWA', 'Recorded Programe', '', '', '', 0, 0, 300000, NULL, NULL, -300000, '', 0, '', '', 0, 'Over Paid', 'Ameena', '2018-08-01', '%', 30000, '0%', 0, 'Cash', '', -30000, 'VKAT4050'),
(132, 'KA5182', 'KALGOSA', '', '0', 'KALGOSA', 'Recorded Programe', '', '', '', 2000, 4000, 0, NULL, NULL, 4000, '', 2, '2018-07-26', '2018-08-26', 31, 'Not Paid', 'Ameena', '2018-08-01', '%', 200, '0%', 0, 'Cash', '', 3800, 'VKAT4050'),
(133, 'PD2647', 'PDP ANNOUNCEMENT ', '', '0', 'PDP ANNOUNCEMENT', 'Announcement', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-07-27', '2018-07-27', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(134, 'FC4055', 'FCE', '', '0', 'FCE', 'Announcement', '', '', '', 0, 0, 10500, NULL, NULL, -10500, '', 7, '2018-07-27', '2018-08-27', 31, 'Over Paid', 'Ameena', '2018-08-01', '%', 500, '0%', 0, 'Cash', '', -500, 'VKAT4050'),
(135, 'TR4297', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Advert', '', '', '', 2000, 6000, 6000, NULL, NULL, 0, '', 3, '2018-07-27', '2018-07-27', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 6000, 'VKAT4050'),
(136, 'TR7110', 'NA GAMJI ', '', '0', 'TRADE FAIR', 'Advert', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-07-27', '2018-07-27', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(137, 'TR2632', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Advert', '', '', '', 2000, 12000, 12000, NULL, NULL, 0, '', 6, '2018-07-28', '2018-07-29', 1, 'Paid', 'Ameena', '2018-08-01', '%', 1200, '0%', 0, 'Cash', '', 10800, 'VKAT4050'),
(138, 'MI7511', 'MISSING PERSON', '', '0', 'MISSING PESON', 'Announcement', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-07-28', '2018-07-28', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(139, 'GW6420', 'GWAJO GWAJO', '', '0', 'GWAJO GWAJO', 'Live Program', '', '', '', 0, 0, 50000, NULL, NULL, -50000, '', 0, '2018-07-28', '2018-08-28', 31, 'Over Paid', 'Ameena', '2018-08-01', '%', 5000, '0%', 0, 'Cash', '', -5000, 'VKAT4050'),
(140, 'TR5735', 'NA GAMJI', '', '0', 'TRADE FAIR', 'Advert', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-07-28', '2018-07-28', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(141, 'TR5982', 'TRADE FAIR', '', '0', 'TRADE FAIIR', 'Advert', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-07-28', '2018-07-28', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(142, 'TR2843', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Advert', '', '', '', 2000, 6000, 6000, NULL, NULL, 0, '', 3, '2018-07-29', '2018-07-29', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 6000, 'VKAT4050'),
(143, 'SO1934', 'SOJA JINGLE', '', '0', 'SOJA JINGLE', 'Advert', '', '', '', 3000, 3000, 3000, NULL, NULL, 0, '', 1, '2018-07-29', '2018-07-29', 0, 'Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, '', '', 3000, 'VKAT4050'),
(144, 'WE5830', 'WEDDING ANNOUNCEMENT', '', '0', 'WEDDING ANOUNCEMENT', 'Announcement', '', '', '', 0, 0, 5000, NULL, NULL, -5000, '', 4, '2018-07-30', '2018-07-30', 0, 'Over Paid', 'Ameena', '2018-08-01', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(145, 'MA5953', 'DAN BEKUTA', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-07-30', '', 9, 'Paid', 'Ameena', '2018-08-08', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(146, 'MA1277', 'BISHIR KAMSHI', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 1200, 1200, NULL, NULL, 0, '', 3, '2018-07-30', '', 9, 'Paid', 'Ameena', '2018-08-08', '%', 0, '0%', 0, 'Cash', '', 1200, 'VKAT4050'),
(147, 'MA5898', 'YUSUF TRADING', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 1200, 1200, NULL, NULL, 0, '', 3, '2018-07-30', '', 9, 'Paid', 'Ameena', '2018-08-08', '%', 0, '0%', 0, 'Cash', '', 1200, 'VKAT4050'),
(148, 'NA3084', 'TRADE FAIR', '', '0', 'NA GAMJI', 'Jingle', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-07-30', '2018-07-30', 0, 'Paid', 'Ameena', '2018-08-11', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(149, 'GO8274', 'GOBARAU ACADEMY', '', '0', 'GOBARAU ACADEMY', 'Jingle', '', '', '', 2000, 8000, 8000, NULL, NULL, 0, '', 4, '2018-07-31', '2018-08-01', 1, 'Paid', 'Ameena', '2018-08-11', '%', 800, '0%', 0, 'Cash', '', 7200, 'VKAT4050'),
(150, 'WO6886', 'WOMEN INNITIATIVE', '', '0', 'WOMEN INNITIATIVE', 'Announcement', '', '', '', 0, 0, 6000, NULL, NULL, -6000, '', 4, '2018-07-31', '2018-08-01', 1, 'Over Paid', 'Ameena', '2018-08-11', '%', 600, '0%', 0, 'Cash', '', -600, 'VKAT4050'),
(151, 'MA1610', 'ALH ABDULAZIZ', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-07-31', '', 11, 'Paid', 'Ameena', '2018-08-11', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(152, 'MA1626', 'MAKARANTA', '', '0', 'MAKARANTA', 'Jingle', '', '', '', 2500, 5000, 5000, NULL, NULL, 0, '', 2, '2018-08-01', '2018-08-01', 0, 'Paid', 'Ameena', '2018-08-11', '%', 0, '0%', 0, 'Cash', '', 5000, 'VKAT4050'),
(153, 'DE7658', 'DEATH ANNOUNCEMNT', '', '0', 'DEATH ANNOUNCEMENT', 'Announcement', '', '', '', 1000, 2000, 2000, NULL, NULL, 0, '', 2, '2018-08-01', '2018-08-01', 0, 'Paid', 'Ameena', '2018-08-11', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(154, 'HA4252', 'HAJJ ', '', '0', 'HAJJ', 'Announcement', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-08-01', '2018-08-01', 0, 'Paid', 'Ameena', '2018-08-11', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(155, 'WA9249', 'WAPA RUWA', '', '0', 'WAPA RUWA', 'Jingle', '', '', '', 2000, 18000, 18000, NULL, NULL, 0, '', 9, '2018-08-03', '2018-08-11', 8, 'Paid', 'Ameena', '2018-08-11', '%', 1800, '0%', 0, 'Cash', '', 16200, 'VKAT4050'),
(156, 'GR9750', 'GREEN HOUSE', '', '0', 'GREEN HOUSE', 'Jingle', '', '', '', 0, 0, 124000, NULL, NULL, -124000, '', 31, '2018-08-03', '2018-09-02', 30, 'Over Paid', 'Ameena', '2018-08-11', '%', 12000, '0%', 0, 'Cash', '', -12000, 'VKAT4050'),
(157, 'TA3940', 'TARO FUNTUA', '', '0', 'TARO FUNTUA', 'Jingle', '', '', '', 2000, 10000, 10000, NULL, NULL, 0, '', 5, '2018-08-03', '2018-08-07', 4, 'Paid', 'Ameena', '2018-08-11', '%', 1000, '0%', 0, 'Cash', '', 9000, 'VKAT4050'),
(158, 'KO9716', 'KOWANE TSUNTSU', '', '0', 'KOWANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 40000, NULL, NULL, -40000, '', 0, '2018-08-03', '2018-08-03', 0, 'Over Paid', 'Ameena', '2018-08-11', '%', 4000, '0%', 0, 'Cash', '', -4000, 'VKAT4050'),
(159, 'KA2785', 'KANKIA', '', '0', 'KANKIA', 'Jingle', '', '', '', 2000, 22000, 24000, NULL, NULL, -2000, '', 11, '2018-08-03', '2018-08-08', 5, 'Over Paid', 'Ameena', '2018-08-11', '%', 0, '0%', 0, 'Cash', '', 22000, 'VKAT4050'),
(160, 'BL8217', 'BLIND SCHOOL', '', '0', 'BLIND SCHOOL', 'Jingle', '', '', '', 2000, 10000, 10000, NULL, NULL, 0, '', 5, '2018-08-03', '2018-08-04', 1, 'Paid', 'Ameena', '2018-08-11', '%', 1000, '0%', 0, 'Cash', '', 9000, 'VKAT4050'),
(161, 'TA4621', 'TAFSIR S/UNGUWA', '', '0', 'TAFSIR S/UNGUWA', 'Recorded Programe', '', '', '', 0, 0, 100000, NULL, NULL, -100000, '', 0, '2018-08-04', '', 7, 'Over Paid', 'Ameena', '2018-08-11', '%', 10000, '0%', 0, 'Cash', '', -10000, 'VKAT4050'),
(162, 'IB9972', 'IBRAHIM TEXTILE', '', '0', 'IBRAHIM TEXTILE', 'Jingle', '', '', '', 2000, 6000, 6000, NULL, NULL, 0, '', 3, '2018-08-04', '2018-08-07', 3, 'Paid', 'Ameena', '2018-08-11', '%', 500, '0%', 0, 'Cash', '', 5500, 'VKAT4050'),
(163, 'GR5927', 'GREEN ABAYA', '', '0', 'GREEN ABAYA', 'Jingle', '', '', '', 1500, 45000, 45000, NULL, NULL, 0, '', 30, '2018-08-04', '', 9, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 45000, 'VKAT4050'),
(164, 'GO1265', 'GOBARAU ACADEMY', '', '0', 'GOBARAU ACDEMY', 'Jingle', '', '', '', 2000, 8000, 8000, NULL, NULL, 0, '', 4, '2018-08-06', '2018-08-07', 1, 'Paid', 'Ameena', '2018-08-13', '%', 800, '0%', 0, 'Cash', '', 7200, 'VKAT4050'),
(165, 'MS9746', 'MS KAKA', '', '0', 'MS KAKA', 'Recorded Programe', '', '', '', 400, 1200, 1200, NULL, NULL, 0, '', 3, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 1200, 'VKAT4050'),
(166, 'MA7725', 'ALH MARHABABUKA', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(167, 'MA9798', 'AL ANSAR', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(168, 'MA8717', 'GREEN HOUSE', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 16000, 16000, NULL, NULL, 0, '', 40, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 16000, 'VKAT4050'),
(169, 'WA1280', 'WAIWAYE ADON  TAFIYA', '', '0', 'WAIWAYE ADON TAFIYA', 'Recorded Programe', '', '', '', 0, 0, 100000, NULL, NULL, -100000, '', 0, '2018-08-06', '', 7, 'Over Paid', 'Ameena', '2018-08-13', '%', 10000, '0%', 0, 'Cash', '', -10000, 'VKAT4050'),
(170, 'DA7183', 'DAN BAIWA', '', '0', 'DAN BAIWA', 'Jingle', '', '', '', 0, 0, 25000, NULL, NULL, -25000, '', 0, '2018-08-06', '', 7, 'Over Paid', 'Ameena', '2018-08-13', '%', 2500, '0%', 0, 'Cash', '', -2500, 'VKAT4050'),
(171, 'TR2951', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Jingle', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, '', '2000', 2000, 'VKAT4050'),
(172, 'SA5260', 'SAHEL MEDICARE', '', '0', 'SAHEL MEDICARE', 'Jingle', '', '', '', 2000, 60000, 60000, NULL, NULL, 0, '', 30, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 6000, '0%', 0, 'Cash', '', 54000, 'VKAT4050'),
(173, 'SU1211', 'SURAJ YAZID', '', '0', 'SURAJ YAZID', 'Jingle', '', '', '', 2000, 30000, 30000, NULL, NULL, 0, '', 15, '2018-08-06', '', 7, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 30000, 'VKAT4050'),
(174, 'WU7997', 'WUSHASHA', '', '0', 'WUSHASHA', 'Jingle', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-08-07', '', 6, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(175, 'HU4317', 'HUK', '', '0', 'HUK', 'Announcement', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-08-07', '', 6, 'Paid', 'Ameena', '2018-08-13', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(176, 'KO8565', 'KOWANE TSUNTSU', '', '0', 'KOWANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 8000, NULL, NULL, -8000, '', 0, '2018-08-07', '', 7, 'Over Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(177, 'BO9734', 'BONANZA', '', '0', 'BONANZA', 'Announcement', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-08-07', '', 7, 'Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(178, 'TA3615', 'TAAZIYA', '', '0', 'TAZIYYA', 'Announcement', '', '', '', 0, 0, 1000, NULL, NULL, -1000, '', 1, '2018-08-08', '', 6, 'Over Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(179, 'KA7996', 'KASUWA', '', '0', 'KASUWA', 'Jingle', '', '', '', 2000, 10000, 10000, NULL, NULL, 0, '', 5, '2018-08-08', '', 6, 'Paid', 'Ameena', '2018-08-14', '%', 1000, '0%', 0, 'Cash', '', 9000, 'VKAT4050'),
(180, 'MA2654', 'ERISCO', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 2000, 2000, NULL, NULL, 0, '', 5, '2018-08-08', '', 6, 'Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(181, 'ZA6766', 'ZAMAN MUTUM DA SANARSA', '', '0', 'ZAMAN MUTUM DA SANARSA', 'Recorded Programe', '', '', '', 0, 0, 10000, NULL, NULL, -10000, '', 0, '2018-08-08', '', 6, 'Over Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(182, 'KO5366', 'KOWANE TSUNTSU', '', '0', 'KOWANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 30000, NULL, NULL, -30000, '', 0, '2018-08-09', '', 5, 'Over Paid', 'Ameena', '2018-08-14', '%', 3000, '0%', 0, 'Cash', '', -3000, 'VKAT4050'),
(183, 'IN8954', 'INEC', '', '0', 'INEC', 'Jingle', '', '', '', 5000, 15000, 15000, NULL, NULL, 0, '', 3, '2018-08-09', '', 5, 'Paid', 'Ameena', '2018-08-14', '%', 1500, '0%', 0, 'Cash', '', 13500, 'VKAT4050'),
(184, 'KW8345', 'KWANKWASO', '', '0', 'KWANKWASO', 'Jingle', '', '', '', 3000, 12000, 12000, NULL, NULL, 0, '', 4, '2018-08-09', '', 5, 'Paid', 'Ameena', '2018-08-14', '%', 1200, '0%', 0, 'Cash', '', 10800, 'VKAT4050'),
(185, 'WE4189', 'WEDDING ANNOUNCEMENT', '', '0', 'WEDDING ANNOUNCEMENT', 'Announcement', '', '', '', 1500, 1500, 1500, NULL, NULL, 0, '', 1, '2018-08-09', '', 5, 'Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 1500, 'VKAT4050'),
(186, 'MI4547', 'MISSING ITEM', '', '0', 'MISSING ITEM', 'Announcement', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-08-10', '2018-08-10', 0, 'Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(187, 'UM2954', 'UMYUK', '', '0', 'UMYUK', 'Announcement', '', '', '', 2000, 12000, 12000, NULL, NULL, 0, '', 6, '2018-08-10', '', 4, 'Paid', 'Ameena', '2018-08-14', '%', 1000, '0%', 0, 'Cash', '', 11000, 'VKAT4050'),
(188, 'HS6126', 'HSMB', '', '0', 'HSMB', 'Announcement', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-08-10', '', 4, 'Paid', 'Ameena', '2018-08-14', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(189, 'MI7559', 'MISSING ITEMS', '', '0', 'MISSING ITEMS', 'Announcement', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-08-10', '2018-08-10', 0, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(190, 'MI6059', 'MISSING ITEMS', '', '0', 'MISSING ITEMS', 'Announcement', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-08-10', '2018-08-10', 0, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(191, 'KO6083', 'KOWANETSUNTSU', '', '0', 'KOWANE TSUNTSU', 'Recorded Programe', '', '', '', 0, 0, 30000, NULL, NULL, -30000, '', 0, '2018-08-10', '2018-08-10', 0, 'Paid', 'Ameena', '2018-08-15', '%', 3000, '0%', 0, 'Cash', '', -3000, 'VKAT4050'),
(192, 'HA8096', 'HAJJ', '', '0', 'HAJJ', 'Announcement', '', '', '', 2500, 5000, 5000, NULL, NULL, 0, '', 2, '2018-08-10', '2018-08-10', 0, 'Paid', 'Ameena', '2018-08-15', '%', 500, '0%', 0, 'Cash', '', 4500, 'VKAT4050'),
(193, 'JI3973', 'JINGLE CALL', '', '0', 'JINGLE CALL', 'Jingle', '', '', '', 3000, 9000, 9000, NULL, NULL, 0, '', 3, '2018-08-13', '', 2, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 9000, 'VKAT4050'),
(194, 'MI8843', 'MISSING ITEM', '', '0', 'MISSING ITEM', 'Announcement', '', '', '', 1000, 1000, 1000, NULL, NULL, 0, '', 1, '2018-08-12', '2018-08-12', 0, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 1000, 'VKAT4050'),
(195, 'KU7290', 'KUNGIYAR MASU FANKE', '', '0', 'KUNGIYAR MASU FANKE', 'Announcement', '', '', '', 2000, 4000, 4000, NULL, NULL, 0, '', 2, '2018-08-12', '2018-08-12', 0, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 4000, 'VKAT4050'),
(196, 'TR9996', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Jingle', '', '', '', 2000, 2000, 2000, NULL, NULL, 0, '', 1, '2018-08-13', '2018-08-13', 0, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 2000, 'VKAT4050'),
(197, 'BA4595', 'BABA OGUN', '', '0', 'BABA OGUN', 'Recorded Programe', '', '', '', 6000, 42000, 42000, NULL, NULL, 0, '', 7, '2018-08-13', '2018-08-19', 6, 'Paid', 'Ameena', '2018-08-15', '%', 4000, '0%', 0, 'Cash', '', 38000, 'VKAT4050'),
(198, 'MA7638', 'EL BASH CHIPS', '', '0', 'MAI TALLA', 'Recorded Programe', '', '', '', 400, 1200, 1200, NULL, NULL, 0, '', 3, '2018-08-13', '2018-08-13', 0, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 1200, 'VKAT4050'),
(199, 'DA7924', 'DADIN KOWA', '', '0', 'DADIN KOWA', 'Jingle', '', '', '', 0, 0, 40000, NULL, NULL, -40000, '', 0, '2018-08-13', '', 2, 'Over Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 0, 'VKAT4050'),
(200, 'TR1514', 'TRADE FAIR', '', '0', 'TRADE FAIR', 'Jingle', '', '', '', 2000, 8000, 8000, NULL, NULL, 0, '', 4, '2018-08-13', '2018-08-16', 3, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 8000, 'VKAT4050'),
(201, 'WO9641', 'WOMEN AFFAIRS', '', '0', 'WOMEN AFFAIRS', 'Jingle', '', '', '', 2500, 20000, 20000, NULL, NULL, 0, '', 8, '2018-08-13', '', 2, 'Paid', 'Ameena', '2018-08-15', '%', 2000, '0%', 0, 'Cash', '', 18000, 'VKAT4050'),
(202, 'AM5588', 'AMAL SHOW', '', '0', 'AMAL SHOW', 'Jingle', '', '', '', 2000, 10000, 10000, NULL, NULL, 0, '', 5, '2018-08-14', '2018-08-15', 1, 'Paid', 'Ameena', '2018-08-15', '%', 0, '0%', 0, 'Cash', '', 10000, 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `register_oap`
--

CREATE TABLE `register_oap` (
  `ID` int(11) NOT NULL,
  `Oap_ID` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `P_Number` varchar(100) NOT NULL,
  `Station` varchar(100) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Programs` varchar(250) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register_program`
--

CREATE TABLE `register_program` (
  `ID` int(11) NOT NULL,
  `Program_ID` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Duration` varchar(50) NOT NULL,
  `Presenters` varchar(100) NOT NULL,
  `Monday` varchar(100) DEFAULT NULL,
  `Tuesday` varchar(100) DEFAULT NULL,
  `Wednesday` varchar(100) DEFAULT NULL,
  `Thursday` varchar(100) DEFAULT NULL,
  `Friday` varchar(100) DEFAULT NULL,
  `Saturday` varchar(100) DEFAULT NULL,
  `Sunday` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `set_slot`
--

CREATE TABLE `set_slot` (
  `ID` int(11) NOT NULL,
  `Advert_ID` varchar(100) NOT NULL,
  `Num_Slots` int(11) NOT NULL,
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_slot`
--

INSERT INTO `set_slot` (`ID`, `Advert_ID`, `Num_Slots`, `Station_ID`) VALUES
(1, 'IN4265', 38, 'VABU8429'),
(2, 'PL4432', 540, 'VKAT4050'),
(3, 'PL8684', 540, 'VKAT4050'),
(4, 'PL3527', 360, 'VKAT4050'),
(5, 'PL3260', 360, 'VKAT4050'),
(6, 'PL7867', 262, 'VKAT4050'),
(7, 'PL5485', 360, 'VKAT4050'),
(8, 'PL7298', 346, 'VKAT4050'),
(9, 'PL4791', 360, 'VKAT4050'),
(10, 'PL8615', 360, 'VKAT4050'),
(11, 'PL4132', 213, 'VKAT4050'),
(12, 'MA8847', 8, 'VKAT4050'),
(13, 'MS8188', 6, 'VKAT4050'),
(14, 'BA2285', 0, 'VKAT4050'),
(15, 'SH2278', 6, 'VKAT4050'),
(16, 'DA6016', 6, 'VKAT4050'),
(17, 'GR6686', 6, 'VKAT4050'),
(18, 'KA4121', 3, 'VKAT4050'),
(19, 'MA7071', 30, 'VKAT4050'),
(20, 'MA1822', 2, 'VKAT4050'),
(21, 'PL7014', 0, 'VKAT4050'),
(22, 'MA1665', 0, 'VKAT4050'),
(23, 'BA9294', 0, 'VKAT4050'),
(24, 'GR8668', 0, 'VKAT4050'),
(25, 'DO8844', 0, 'VKAT4050'),
(26, 'DO6971', 0, 'VKAT4050'),
(27, 'DA5598', 0, 'VKAT4050'),
(28, 'MA2099', 0, 'VKAT4050'),
(29, 'AR8211', 0, 'VKAT4050'),
(30, 'AR9376', 2, 'VKAT4050'),
(31, 'BA3139', 8, 'VKAT4050'),
(32, 'BA9524', 3, 'VKAT4050'),
(33, 'BA6855', 8, 'VKAT4050'),
(34, 'BA4557', 3, 'VKAT4050'),
(35, 'BA3060', 3, 'VKAT4050'),
(36, 'BA1923', 8, 'VKAT4050'),
(37, 'BA8221', 3, 'VKAT4050'),
(38, '204964', 3, 'VKAT4050'),
(39, '201254', 3, 'VKAT4050'),
(40, 'BA4735', 1, 'VKAT4050'),
(41, 'BA7517', 0, 'VKAT4050'),
(42, 'BA1794', 1, 'VKAT4050'),
(43, 'BA8681', 0, 'VKAT4050'),
(44, 'BA6679', 0, 'VKAT4050'),
(45, 'BA2399', 0, 'VKAT4050'),
(46, 'ED4121', 1, 'VKAT4050'),
(47, 'PL5641', 0, 'VKAT4050'),
(48, 'PL7079', 3, 'VKAT4050'),
(49, 'BA7670', 0, 'VKAT4050'),
(50, 'BA3937', 60, 'VKAT4050'),
(51, 'BA1288', 9, 'VKAT4050'),
(52, 'DA3828', 9, 'VKAT4050'),
(53, 'DA4798', 2, 'VKAT4050'),
(54, 'S 6154', 0, 'VKAT4050'),
(55, 'DO7273', 6, 'VKAT4050'),
(56, 'GR4882', 6, 'VKAT4050'),
(57, 'SE1346', 9, 'VKAT4050'),
(58, 'MA7787', 9, 'VKAT4050'),
(59, 'CO9362', 6, 'VKAT4050'),
(60, 'SA3866', 0, 'VKAT4050'),
(61, 'CO6291', 6, 'VKAT4050'),
(62, 'ED4976', 0, 'VKAT4050'),
(63, 'ED9497', 15, 'VKAT4050'),
(64, 'GA7165', 8, 'VKAT4050'),
(65, 'DA5061', 14, 'VKAT4050'),
(66, 'IR6677', 6, 'VKAT4050'),
(67, 'JA8231', 33, 'VKAT4050'),
(68, 'BA6487', 10, 'VKAT4050'),
(69, 'YA8824', 10, 'VKAT4050'),
(70, 'NA6940', 15, 'VKAT4050'),
(71, 'S 7319', 7, 'VKAT4050'),
(72, 'ZA6396', 1, 'VKAT4050'),
(73, 'TA9969', 30, 'VKAT4050'),
(74, 'TR1813', 2, 'VKAT4050'),
(75, 'SO4486', 4, 'VKAT4050'),
(76, 'AU3122', 3, 'VKAT4050'),
(77, 'CH8450', 6, 'VKAT4050'),
(78, 'TA3988', 8, 'VKAT4050'),
(79, 'BA6765', 10, 'VKAT4050'),
(80, 'TR7722', 2, 'VKAT4050'),
(81, 'SO2617', 4, 'VKAT4050'),
(82, 'CH6856', 6, 'VKAT4050'),
(83, 'WE8995', 3, 'VKAT4050'),
(84, 'TA2760', 8, 'VKAT4050'),
(85, 'AL1145', 8, 'VKAT4050'),
(86, 'KO6635', 1, 'VKAT4050'),
(87, 'MA3654', 26, 'VKAT4050'),
(88, 'DA3299', 30, 'VKAT4050'),
(89, 'GR6570', 60, 'VKAT4050'),
(90, 'WA9948', 30, 'VKAT4050'),
(91, 'ER6473', 31, 'VKAT4050'),
(92, 'DA9856', 30, 'VKAT4050'),
(93, 'AP8158', 4, 'VKAT4050'),
(94, 'DA1411', 2, 'VKAT4050'),
(95, 'WE3172', 2, 'VKAT4050'),
(96, 'AN8955', 1, 'VKAT4050'),
(97, 'AN8641', 2, 'VKAT4050'),
(98, 'TA1762', 0, 'VKAT4050'),
(99, 'S-8572', 9, 'VKAT4050'),
(100, 'UL2422', 4, 'VKAT4050'),
(101, 'TR4794', 2, 'VKAT4050'),
(102, 'BA9156', 30, 'VKAT4050'),
(103, 'KO4758', 1, 'VKAT4050'),
(104, 'MI6338', 10, 'VKAT4050'),
(105, 'KO7532', 1, 'VKAT4050'),
(106, 'KA6292', 1, 'VKAT4050'),
(107, 'IN9191', 3, 'VKAT4050'),
(108, 'FI4868', 2, 'VKAT4050'),
(109, 'DE1243', 1, 'VKAT4050'),
(110, 'AL9332', 20, 'VKAT4050'),
(111, 'ZA8178', 1, 'VKAT4050'),
(112, 'HA2141', 3, 'VKAT4050'),
(113, 'TR1516', 1500, 'VKAT4050'),
(114, 'KO5161', 1, 'VKAT4050'),
(115, 'LO5371', 2, 'VKAT4050'),
(116, 'HA4823', 5, 'VKAT4050'),
(117, 'KT1683', 7, 'VKAT4050'),
(118, 'KA4392', 15, 'VKAT4050'),
(119, 'MI8122', 1, 'VKAT4050'),
(120, 'MA1375', 30, 'VKAT4050'),
(121, 'MI6644', 1, 'VKAT4050'),
(122, 'MA6821', 5, 'VKAT4050'),
(123, 'MA7470', 5, 'VKAT4050'),
(124, 'MA8077', 5, 'VKAT4050'),
(125, 'MA1581', 4, 'VKAT4050'),
(126, 'MA1272', 2, 'VKAT4050'),
(127, 'MA5077', 1, 'VKAT4050'),
(128, 'MA3116', 2, 'VKAT4050'),
(129, 'JA5971', 1, 'VKAT4050'),
(130, 'KO8720', 0, 'VKAT4050'),
(131, 'KO7974', 0, 'VKAT4050'),
(132, 'BA8888', 4, 'VKAT4050'),
(133, 'JI5322', 3, 'VKAT4050'),
(134, 'AL9356', 60, 'VKAT4050'),
(135, 'AL6938', 3, 'VKAT4050'),
(136, 'KO3230', 0, 'VKAT4050'),
(137, 'AL6076', 1, 'VKAT4050'),
(138, 'PH5051', 60, 'VKAT4050'),
(139, 'AR1185', 5, 'VKAT4050'),
(140, 'MI5176', 1, 'VKAT4050'),
(141, 'UM2465', 7, 'VKAT4050'),
(142, 'UM7988', 7, 'VKAT4050'),
(143, 'CO5919', 10, 'VKAT4050'),
(144, 'CB7569', 0, 'VKAT4050'),
(145, 'MA3787', 4, 'VKAT4050'),
(146, ' M6768', 0, 'VKAT4050'),
(147, 'IB5159', 10, 'VKAT4050'),
(148, 'IB4034', 10, 'VKAT4050'),
(149, 'KA6642', 7, 'VKAT4050'),
(150, 'DE4310', 2, 'VKAT4050'),
(151, 'MI4970', -1, 'VKAT4050'),
(152, 'FU4618', 4, 'VKAT4050'),
(153, 'MI4886', 3, 'VKAT4050'),
(154, 'ZA3771', 0, 'VKAT4050'),
(155, 'TR1989', 1, 'VKAT4050'),
(156, 'KA7651', 6, 'VKAT4050'),
(157, 'MU6417', 3, 'VKAT4050'),
(158, 'KO9948', 0, 'VKAT4050'),
(159, 'KU3271', 3, 'VKAT4050'),
(160, 'CR6876', 3, 'VKAT4050'),
(161, 'TA9062', 4, 'VKAT4050'),
(162, 'KU4678', 2, 'VKAT4050'),
(163, 'AW6923', 3, 'VKAT4050'),
(164, 'MA3475', 5, 'VKAT4050'),
(165, 'MA2263', 5, 'VKAT4050'),
(166, 'MI9682', 1, 'VKAT4050'),
(167, 'NA4841', 2, 'VKAT4050'),
(168, 'KO5116', 0, 'VKAT4050'),
(169, 'RA3388', 3, 'VKAT4050'),
(170, 'MA8246', 5, 'VKAT4050'),
(171, 'MA4456', 0, 'VKAT4050'),
(172, 'KO7769', 0, 'VKAT4050'),
(173, 'MI4055', 1, 'VKAT4050'),
(174, 'ZA8486', 0, 'VKAT4050'),
(175, 'FA8291', 1, 'VKAT4050'),
(176, 'KO3777', 0, 'VKAT4050'),
(177, 'SH6283', 0, 'VKAT4050'),
(178, 'KA5182', 2, 'VKAT4050'),
(179, 'PD2647', 1, 'VKAT4050'),
(180, 'FC4055', 7, 'VKAT4050'),
(181, 'TR4297', 3, 'VKAT4050'),
(182, 'TR7110', 1, 'VKAT4050'),
(183, 'TR2632', 6, 'VKAT4050'),
(184, 'MI7511', 1, 'VKAT4050'),
(185, 'GW6420', 0, 'VKAT4050'),
(186, 'TR5735', 1, 'VKAT4050'),
(187, 'TR5982', 2, 'VKAT4050'),
(188, 'TR2843', 3, 'VKAT4050'),
(189, 'SO1934', 1, 'VKAT4050'),
(190, 'WE5830', 4, 'VKAT4050'),
(191, 'MA5953', 5, 'VKAT4050'),
(192, 'MA1277', 3, 'VKAT4050'),
(193, 'MA5898', 3, 'VKAT4050'),
(194, 'NA3084', 1, 'VKAT4050'),
(195, 'GO8274', 4, 'VKAT4050'),
(196, 'WO6886', 4, 'VKAT4050'),
(197, 'MA1610', 5, 'VKAT4050'),
(198, 'MA1626', 2, 'VKAT4050'),
(199, 'DE7658', 2, 'VKAT4050'),
(200, 'HA4252', 2, 'VKAT4050'),
(201, 'WA9249', 9, 'VKAT4050'),
(202, 'GR9750', 31, 'VKAT4050'),
(203, 'TA3940', 5, 'VKAT4050'),
(204, 'KO9716', 0, 'VKAT4050'),
(205, 'KA2785', 11, 'VKAT4050'),
(206, 'BL8217', 5, 'VKAT4050'),
(207, 'TA4621', 0, 'VKAT4050'),
(208, 'IB9972', 3, 'VKAT4050'),
(209, 'GR5927', 30, 'VKAT4050'),
(210, 'GO1265', 4, 'VKAT4050'),
(211, 'MS9746', 3, 'VKAT4050'),
(212, 'MA7725', 5, 'VKAT4050'),
(213, 'MA9798', 5, 'VKAT4050'),
(214, 'MA8717', 40, 'VKAT4050'),
(215, 'WA1280', 0, 'VKAT4050'),
(216, 'DA7183', 0, 'VKAT4050'),
(217, 'TR2951', 1, 'VKAT4050'),
(218, 'SA5260', 30, 'VKAT4050'),
(219, 'SU1211', 15, 'VKAT4050'),
(220, 'WU7997', 1, 'VKAT4050'),
(221, 'HU4317', 2, 'VKAT4050'),
(222, 'KO8565', 0, 'VKAT4050'),
(223, 'BO9734', 1, 'VKAT4050'),
(224, 'TA3615', 1, 'VKAT4050'),
(225, 'KA7996', 5, 'VKAT4050'),
(226, 'MA2654', 5, 'VKAT4050'),
(227, 'ZA6766', 0, 'VKAT4050'),
(228, 'KO5366', 0, 'VKAT4050'),
(229, 'IN8954', 3, 'VKAT4050'),
(230, 'KW8345', 4, 'VKAT4050'),
(231, 'WE4189', 1, 'VKAT4050'),
(232, 'MI4547', 1, 'VKAT4050'),
(233, 'UM2954', 6, 'VKAT4050'),
(234, 'HS6126', 2, 'VKAT4050'),
(235, 'MI7559', 1, 'VKAT4050'),
(236, 'MI6059', 1, 'VKAT4050'),
(237, 'KO6083', 0, 'VKAT4050'),
(238, 'HA8096', 2, 'VKAT4050'),
(239, 'JI3973', 3, 'VKAT4050'),
(240, 'MI8843', 1, 'VKAT4050'),
(241, 'KU7290', 2, 'VKAT4050'),
(242, 'TR9996', 1, 'VKAT4050'),
(243, 'BA4595', 7, 'VKAT4050'),
(244, 'MA7638', 3, 'VKAT4050'),
(245, 'DA7924', 0, 'VKAT4050'),
(246, 'TR1514', 4, 'VKAT4050'),
(247, 'WO9641', 8, 'VKAT4050'),
(248, 'AM5588', 5, 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `ID` int(11) NOT NULL,
  `Station_ID` varchar(100) NOT NULL,
  `S_Name` varchar(100) NOT NULL,
  `S_Location` varchar(100) NOT NULL,
  `S_Address` varchar(250) NOT NULL,
  `S_Contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`ID`, `Station_ID`, `S_Name`, `S_Location`, `S_Address`, `S_Contact`) VALUES
(1, 'VABU8429', 'Vision FM', 'Abuja', 'Wuse II Abuja', '080'),
(2, 'VKEB6464', 'Vision FM', 'Kebbi', 'Kebbi Satate', '080'),
(3, 'VKAT4050', 'Vision FM', 'Katsina', 'No 13 Kebram Plaza Mani Road Katsina', '08065853632');

-- --------------------------------------------------------

--
-- Table structure for table `t_friday`
--

CREATE TABLE `t_friday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `F_Date` varchar(100) DEFAULT NULL,
  `F_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_monday`
--

CREATE TABLE `t_monday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `M_Date` varchar(100) DEFAULT NULL,
  `M_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_saturday`
--

CREATE TABLE `t_saturday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `S_Date` varchar(100) DEFAULT NULL,
  `S_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_sunday`
--

CREATE TABLE `t_sunday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `S_Date` varchar(100) DEFAULT NULL,
  `S_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_thursday`
--

CREATE TABLE `t_thursday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `T_Date` varchar(100) DEFAULT NULL,
  `T_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_tuesday`
--

CREATE TABLE `t_tuesday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `T_Date` varchar(100) DEFAULT NULL,
  `T_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_wednesday`
--

CREATE TABLE `t_wednesday` (
  `ID` int(11) NOT NULL,
  `Advert_Name` varchar(100) DEFAULT NULL,
  `Advert_ID` varchar(100) DEFAULT NULL,
  `W_Date` varchar(100) DEFAULT NULL,
  `W_Time` varchar(100) DEFAULT NULL,
  `Re_peat` int(11) NOT NULL DEFAULT '0',
  `Station_ID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vsn_staff`
--

CREATE TABLE `vsn_staff` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(100) NOT NULL,
  `C_Name` varchar(200) NOT NULL,
  `C_Number` varchar(100) NOT NULL,
  `C_Email` varchar(100) DEFAULT NULL,
  `C_State` varchar(100) NOT NULL,
  `C_Lga` varchar(100) NOT NULL,
  `C_Address` varchar(250) NOT NULL,
  `C_Dateofbirth` varchar(50) NOT NULL,
  `C_Maritalstatus` varchar(50) NOT NULL,
  `C_Gender` varchar(50) NOT NULL,
  `C_Qualification` varchar(200) NOT NULL,
  `C_Title` varchar(100) NOT NULL,
  `C_Level` varchar(50) DEFAULT NULL,
  `Station_ID` varchar(50) NOT NULL,
  `C_Bank` varchar(100) DEFAULT NULL,
  `C_AccName` varchar(100) DEFAULT NULL,
  `C_AccNumber` varchar(100) DEFAULT NULL,
  `C_Nationality` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vsn_staff`
--

INSERT INTO `vsn_staff` (`ID`, `Staff_ID`, `C_Name`, `C_Number`, `C_Email`, `C_State`, `C_Lga`, `C_Address`, `C_Dateofbirth`, `C_Maritalstatus`, `C_Gender`, `C_Qualification`, `C_Title`, `C_Level`, `Station_ID`, `C_Bank`, `C_AccName`, `C_AccNumber`, `C_Nationality`) VALUES
(2, 'NE2541', 'NELSON OHINE OMOKHAYE ', '08136410355', 'ohinel247@gmail.com', 'EDO STATE', 'OWAN EAST', 'SABON TITIN KWADO KATSINA', '1983-11-14', 'Single', 'Male', 'COMPUTER SCIENCE', 'Account/Admin Manager', '', 'VKAT4050', 'First Bank', 'Nelson Omokhaye', '3059240388', 'NIGERIAN'),
(3, '7425UN', 'Hadiza Kabir Unguwar Yari', '09031263258', 'Hadizakabiryari@gmail.com', 'Katsina', 'Katsina', 'Unguwar Yari Katsina', '1981-06-03', 'Single', 'Female', 'WAEC', 'Presenter', '', 'VKAT4050', 'Keystone Bank', 'Hadiza Kabir', '6019750109', 'Nigerian'),
(4, 'UM8496', 'Umar Sabi\'u Ahmad ', '08065853632', 'Umarsabiuahmad24@gmail.com', 'Katsina', 'Katsina', 'Kofar Marusa Katsina', '2015-02-28', 'Maried', 'Male', 'Degree', 'Senior Producer', '', 'VKAT4050', 'Jaiz Bank', 'Umar Sabi\'u Ahmad', '0002507628', 'Nigeria'),
(91, '3116CY', 'Cynthia Ijeoma Ezeala', '08168826472, 08051912727', 'Cynthiaezealaijeoma@gmail.com', 'Imo State', 'Orlu', 'No 39 Goldcost Road Sabon Gari Kano State.', '1994-09-24', 'Single', 'Female', 'Bsc. Mass Communication ', ' Presenter, Reporter and Newscaster.', '', 'VKAT4050', 'First Bank', 'Cynthia Ijeoma Ezeala', '3058252629', 'Nigerian '),
(92, 'AB5683', 'ABDULRAHMAN KABIR', '08038840655', 'abduljani104@gmail.com', 'KATSINA', 'MANI LG', 'JANI, MANI LGA', '2018-03-13', 'Single', 'Male', 'DEGREE', 'Presenter', '', '', 'United Bank for Africa', 'ABDULRAHMAN KABIR', '2062128869', 'NIGERIA'),
(93, '7787AM', 'AMINA UMAR DAURA', '08138352118', 'dauraamina6@gmail.com', 'KATSINA', 'DAURA', 'KWADO BEHIND AFDIN FILLING STATION', '1992-12-25', 'Single', 'Female', 'DEGREE', 'Reporter', '', 'VKAT4050', 'First Bank', 'AMINA UMAR DAURA', '3044113376', 'NIGERIAN'),
(94, 'IB8431', 'ibrahim Balarabe', '08033120250', 'irobala3@gmail.com', 'Katsina', 'Katsina', '4 Rogogo St. K/Kaura New Layout Katsina.', '23.2.58', 'Married', 'Male', 'BA MA HNC GRAD CERT. EDUC', 'Manager Programs', '', 'VKAT4050', 'UNITY BANK', 'Ibrahim Balarabe', '', 'Nigerian'),
(95, '6637MB', 'MOHAMMED BABANGIDA', '08035264503', 'mbmafara6@gmail.com', 'ZAMFARA', 'TALATA MAFARA', 'FIRST BANK STREET, MAMMAN MORAI ROAD LOW COST, TALATA MAFARA ZAMFARA', '1989-10-10', 'Single', 'Male', 'HND', 'Editor', '', 'VKAT4050', 'JAIZ Bank', 'MOHAMMED BABANGIDA', '', 'NIGERIAN'),
(96, '1416FA', 'Fatima Idris Abubakar', '08039634487', '', 'Katsina', 'Katsina', 'Unguwar Alkali katsina', '1990-10-10', 'Maried', 'Female', 'Diploma', 'Producer', '', 'VKAT4050', 'JAIZ Bank', 'fatima Idris Abubakar', '0002542607', 'Nigerian'),
(97, '9593AK', 'Abdulrahman Kabir', '08038840655', 'abduljani104@gmail.com', 'Katsina', 'Mani', 'Jani, Mani L/G', '1993-09-02', 'Single', 'Male', 'Degree', 'Reporter', '', 'VKAT4050', 'United Bank for Africa', 'Abdulrahman kabir', '2062128869', 'Nigeria'),
(98, 'NA4849', 'NASIRU SADI DUTSIN AMARE', '08103311426', 'nasirsadidamare@gmail.com', 'katsina', 'Katsina', 'Dutsin amare', '1995-05-26', 'Single', 'Male', 'Secondary certificate', 'Presenter', '', 'VKAT4050', 'union bank', 'Nasiru Sadi', '0071006269', 'Nigeria'),
(99, 'BA9611', 'Basiru Haruna ', '08163778975', 'basirudayi@gmail.com', 'katsina', 'Katsina', 'Tafkin kankia', '1995-01-01', 'Single', 'Male', 'diploma', 'Presenter', '', 'VKAT4050', 'Access Bank', 'basiru haruna', '0765654171', 'Nigeria'),
(100, 'EN9639', 'Engr Umar Bala Ashura', '08037339440', 'umarbalaashura@gmail.com', 'Katsina', 'Katsina', 'Tsohuwar Kasuwa Katsina ', '1984-02-14', 'Maried', 'Male', 'HND', 'Engineer', '', 'VKAT4050', 'JAIZ Bank', 'Umar Bala Ashura', '0002517364', 'Nigeria'),
(101, '3683AI', 'AISHA ABUBAKAR  UMAR', '08069365314', 'ayshaoumar@gmail.com', 'KATSINA', 'KATSNA', 'SABUWAR KASUWA SOKOTO ROAD KATSINA', '1988-01-28', 'Single', 'Female', 'HND', 'Presenter', '', 'VKAT4050', 'Diamond Bank', 'AISHA ABUBAKAR UMAR', '0071006825', 'Nigeria'),
(102, '2936NA', 'Ibrahim Abdullahi Yunusa', '08189232425', 'namaijingari@gmail.com', 'Katsina', 'Dutsin-ma', 'No 15 Turare Road Barhim Housing Estate Katsina', '1988-01-14', 'Single', 'Male', 'Natsional Diploma in Mass Communication', 'Producer', '', 'VKAT4050', 'First Bank', 'Ibrahim Abdullahi Yunusa', '3072814113', 'Nigerian'),
(103, '6610KA', 'Abdulrazak Ibrahim Y Kafinsoli', '08032758932', 'a', 'Katsina', 'Kankia', 'Behind Al-bustan Hotel K/kwaya Katsina ', '1995-12-05', 'Single', 'Male', 'National Diploma in Mass communication', 'Presenter', '', 'VKAT4050', 'First Bank', 'Ibrahim yusuf', '3023591908', 'Nigeri\'a'),
(104, '8342ZA', 'Zainab Isa Sulaiman', '07035724971', 'zeezerh742@gmail.com', 'Katsina', 'Batsari', 'Batagarawa Lowcost Katsina', '1993-04-12', 'Single', 'Female', 'National Diploma', 'Presenter', '', 'VKAT4050', 'JAIZ Bank', 'Zainab Isa Sulaiman', '0002246716', 'Nigerian'),
(105, '2011RA', 'Rabiatu Kabir Runka', '08130696966', 'queenrabiatu@gmail.com', 'Katsina', 'Safana', 'Shararra Pipe Katsina', '1994-12-20', 'Single', 'Female', 'Diploma', 'Presenter', '', 'VKAT4050', 'Access Bank', 'Rabiatu Kabir', '0056515657', 'Nigerian'),
(106, '8218BA', 'Basira Sani Bala', '09060567639', 'basirasanibala@gmail.com', 'Katsina', 'Katsina', 'Shararar Pipe Kofar Kaura Katsina', '1996-04-04', 'Maried', 'Female', 'Diploma', 'Presenter', '', 'VKAT4050', 'JAIZ Bank', 'Basira Sani Bala', '0002676207', 'Nigerian'),
(107, '8154IB', 'Ibrahim Safiyanu Jikamshi', '08037294882', 'ibrojikamshi@yahoo.com', 'Katsina', 'Musawa', 'Near Muhammadu Dikko Stadium Mani Road KatsinaBehind Vision FM Katsina', '1973-04-04', 'Maried', 'Male', 'National Diploma', 'Reporter', '', 'VKAT4050', 'JAIZ Bank', 'Ibrahim Safiyanu', '', 'Nigerian '),
(108, '4034AB', 'Abdulrahman Abubakar', '08068370489', 'Nill', 'Katsina State', 'Katsina State', 'Kofar Bai', '1987-06-17', 'Maried', 'Male', 'Secoundary', 'Cleaner', '', 'VKAT4050', 'JAIZ Bank', 'Abdulrahman Abubakar', '0003045363', 'Nigeria'),
(109, 'SA8681', 'SALISU AHMAD BATURE', '08068194545', 'Sabature24@gmail.com', 'KANO', 'DAWAKIN TOFA', 'NO 10 HOSPITAL ROAD MARATAI QUARTERS', '1989-09-26', 'Single', 'Male', 'DIPLOMA IN MASS COMMUNICATION', 'Head of MARKETING', '', 'VKAT4050', 'JAIZ Bank', 'SALISU AHMAD BATURE', '0001232659', 'NIGERIA'),
(110, '3090EN', 'Abdullahi Bature', '08063283272', 'engraba222@gmail.com', 'Katsina State', 'Katsina', 'Tsohuwar kasuwa Danmarna Area Katsina', '1983-07-04', 'Maried', 'Male', 'HND Electrical Electronics Engineering', 'Engineer', '', 'VKAT4050', 'JAIZ Bank', 'Abdullahi Bature', '0002514064', 'Nigeria'),
(111, '3873BI', 'BINTA MUHAMMED YUSUF', '09063874417', 'NAZIRU56@GMAIL.COM', 'KATSINA', 'KATSINA', 'ABDULLAHI SARKI MUKHTAR ROAD ,KOFAR MARUSA', '1968-01-01', 'Maried', 'Female', 'SECONDARY SCHOOL CERTIFICATE', 'Cleaner', '', 'VKAT4050', 'JAIZ Bank', '0002742555', '0002742555', 'NIGERIA'),
(112, '4344FI', 'Abdullahi ya\'u', '08030582869', 'abdullahifikira@yahoo.com', 'Katsina State', 'funtua', 'filin samji katsina state', '1979-01-01', 'Maried', 'Male', 'diploma in computer', 'Presenter', '', 'VKAT4050', 'Zenith Bank', 'Abdullahi yau fikra dodo', '2004176244', 'Nigeria'),
(113, '8946AB', 'Abubakar  Ahmed', '08061230480', 'abubakarahmed0461', 'Katsina State', 'Katsina', 'Kofar Bai', '1988-01-01', 'Maried', 'Male', 'diploma', 'Driver', '', 'VKAT4050', 'JAIZ Bank', 'Abubakar ahmed', '0002497817', 'Nigeria'),
(114, '9063EN', 'Aminu Abdullahi', '07064237585', 'aminudozo5@gmail.com', 'Katsina', 'Katsina', 'Alh iro maikwai galadinci quarters near barau yaro hause katsina', '1978-05-14', 'Maried', 'Male', 'Trade test certificate of electricians', 'Engineer', '', 'VKAT4050', 'JAIZ Bank', 'Aminu abdullahi', '0002497594', 'Nigeria'),
(115, 'AB4282', 'Abubakar S Gefe', '08035627363', 'abubakarogagefe@gmail.com', 'Katsina', 'Katsina', 'Sabon Titin Kwado', '29.5.1980', 'Maried', 'Male', 'Secondary school Cert.', 'Producer', '', 'VKAT4050', 'JAIZ Bank', '0000695499', '', 'Nigerian');

-- --------------------------------------------------------

--
-- Table structure for table `vsn_staff_expr`
--

CREATE TABLE `vsn_staff_expr` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(50) NOT NULL,
  `Skill_1` varchar(100) DEFAULT NULL,
  `SkillDesc_1` varchar(250) DEFAULT NULL,
  `Skill_2` varchar(100) DEFAULT NULL,
  `SkillDesc_2` varchar(250) DEFAULT NULL,
  `Skill_3` varchar(100) DEFAULT NULL,
  `SkillDesc_3` varchar(250) DEFAULT NULL,
  `Skill_4` varchar(100) DEFAULT NULL,
  `SkillDesc_4` varchar(250) DEFAULT NULL,
  `Skill_5` varchar(100) DEFAULT NULL,
  `SkillDesc_5` varchar(250) DEFAULT NULL,
  `Job_1` varchar(100) DEFAULT NULL,
  `JobCom_1` varchar(100) DEFAULT NULL,
  `JobFrom_1` varchar(50) DEFAULT NULL,
  `JobTo_1` varchar(50) DEFAULT NULL,
  `Job_2` varchar(100) DEFAULT NULL,
  `JobCom_2` varchar(100) DEFAULT NULL,
  `JobFrom_2` varchar(50) DEFAULT NULL,
  `JobTo_2` varchar(50) DEFAULT NULL,
  `Job_3` varchar(100) DEFAULT NULL,
  `JobCom_3` varchar(100) DEFAULT NULL,
  `JobFrom_3` varchar(50) DEFAULT NULL,
  `JobTo_3` varchar(50) DEFAULT NULL,
  `Job_4` varchar(100) DEFAULT NULL,
  `JobCom_4` varchar(100) DEFAULT NULL,
  `JobFrom_4` varchar(50) DEFAULT NULL,
  `JobTo_4` varchar(50) DEFAULT NULL,
  `Job_5` varchar(100) DEFAULT NULL,
  `JobCom_5` varchar(100) DEFAULT NULL,
  `JobFrom_5` varchar(50) DEFAULT NULL,
  `JobTo_5` varchar(50) DEFAULT NULL,
  `Station_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vsn_staff_expr`
--

INSERT INTO `vsn_staff_expr` (`ID`, `Staff_ID`, `Skill_1`, `SkillDesc_1`, `Skill_2`, `SkillDesc_2`, `Skill_3`, `SkillDesc_3`, `Skill_4`, `SkillDesc_4`, `Skill_5`, `SkillDesc_5`, `Job_1`, `JobCom_1`, `JobFrom_1`, `JobTo_1`, `Job_2`, `JobCom_2`, `JobFrom_2`, `JobTo_2`, `Job_3`, `JobCom_3`, `JobFrom_3`, `JobTo_3`, `Job_4`, `JobCom_4`, `JobFrom_4`, `JobTo_4`, `Job_5`, `JobCom_5`, `JobFrom_5`, `JobTo_5`, `Station_ID`) VALUES
(1, '7425UN ', 'DCA studio management ', ' ', 'Production/Prsentation', 'Programs Presentation.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(2, 'UM8496 ', 'NGO\'S WHO', 'Supervisor', 'Teaching', 'Volunteer', '', '', '', '', '', '', 'NGO\'S', 'WHO', '2012-02-14', '2015-05-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(3, '9593AK ', 'Communication skills', 'English, Hausa, French', 'Presentation', 'Ability to prepare and present programs both in English and Hausa Language', 'News Casting', 'Both English and Hausa Language', 'Translation', 'Translation ability from English text to Hausa ', '', '', 'Reporter', 'Companion FM katsina', '2014-01-02', '2017-01-12', 'presenter', 'Companion FM katsina', '2014-01-02', '2017-01-12', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(4, '1416FA ', 'Communication', 'Ability to communicate', 'Producer', 'Ability to producer any type of program', '', '', '', '', '', '', 'Presenter', 'Radio Nigeria compion ', '2013-09-02', '2014-01-21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(5, '', 'Computer Literate, Reporter/ Newscaster, Good Communication Skills.', 'I can operate a computer as well as edit audio files, I am good in newscasting and reporting , I have good communication skills which include oral and writting in hausa and English Language.', 'OAP, Keeping organization secret,working under pressure and deadlines, Acting, Teaching.', 'I  am very creative, innovative and Imaginative. I am good at keeping information strictly meant for the organization. I try to put in all efforts in all i do to ensure the successful achievement of the organization.', '', '', '', '', '', '', 'Newscaster and Reporter', 'BUK FM 98.9 Kano', '2012-06-24', '2015-12-19', '', '', '', '', 'Reporter ', 'W.T.O Mock Summit and research group (GENEVA 2014) Bayero University Kano.', '2014-07-22', '2014-12-25', 'English language and Literature In English Teacher, FormTeacher.  ', 'Trimph Model College', '2016-01-07', '2016-11-22', 'OAP, Newscaster, and Reporter.', 'Vision FM 92.1 Katsina ( NYSC)', '2016-12-01', '2017-11-03', ''),
(6, '3116CY', 'Computer Literate, Good communication skills, Reporter/Newscasting,Team work.', 'I can operate computer and also edit audio files, Excellent written and verbal communication skills. ', 'OAP,  keeping organization secrets,Ability to work under pressure and deadlines,  Adaptability,Time ', 'I can express myself clearly In hausa and English Language, am very creative, Imaginative and Innovative, I can keep information secret strictly for the orgaanization.', '', '', '', '', '', '', 'presenter, Newscaster, Reporter. ', 'VISION FM Katsina.(NYSC)', '2016-12-17', '2017-11-03', 'Reporter', 'W.T.O Mock Summit Research Group (GENEVA)', '2014-08-18', '2014-08-23', 'staff', 'CG Tracy group of company', '2016-02-12', '2016-03-12', 'OAP, Newscaster.', 'BUK FM 98.9', '2012-01-10', '2015-12-20', '', '', '', '', 'VKAT4050'),
(7, '6637MB', 'Team work', 'Have the ability to organize colleagues and work as a team even in the most challenging moment.  ', 'EFFECTIVE COMMUNICATION and CREATIVITY', 'My experience in both print and broadcast media has availed me the opportunity to communicate effectively in both written and spoken words. I also have a strong knack for creativity knowing fully that ', '', '', '', '', '', '', 'News reporter', 'WEEKLY LEGACY NEWSPAPER', '2008-09-21', '2009-02-09', 'News reporter/ news caster/ Translator', 'Radio Nigeria Globe FM, Bauchi', '2015-07-04', '2016-04-15', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(8, 'NA4849 ', 'Editing programs', 'I edit some of the programs like Mai tallah, mata da sana\'o\'i and etc.', 'presenting programs', 'I have experience of presenting a programs like zaben sada zumunta and Duniyar Mamaki', '', '', '', '', '', '', 'MECHANIC', 'MAL. SADI ', '2004-03-03', '2015-03-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(9, 'BA9611 ', 'Mechanic', 'MECHANIC OF MOTORS', 'Mechanic', 'MECHANIC OF MOTORCYCLE', '', '', '', '', '', '', 'Mechanic', 'Mashasha Garage', '2014-06-07', '2016-07-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(10, 'EN9639 ', 'Techinical Officer', 'Hard working and exprience electritian', 'Techinical Officer', 'Hardworking and exprience electritian', '', '', '', '', '', '', 'Techinical Officer', 'SB and CO Tax Consultant', '2012-07-22', '2015-08-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(11, '7787AM', 'Communication', 'Ability to communicate fluently in English', 'Computer Literate', 'Ability to operate Computer', '', '', '', '', '', '', 'Sim Registration', 'MTN ', '2016-01-15', '2016-03-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(12, 'NE2541', 'Administrative ', 'providing support to the managers and employees, assisting in daily office needs and managing the company\'s general administrative activities.', 'Graphic art, 3D Animations, film production', 'Productions', '', '', '', '', '', '', 'Administrative  Assistant', 'Mobility Aid & Research Development Center. (M.A.A.R.D.E.C)  ', '2009-04-09', '2010-04-05', 'Productions', 'Daar Communication Plc (AIT / Ray power)Katsina                  ', '2013-07-06', '2015-01-01', '(Productions Heads) /Administrative', 'Vision Media Services (Vision FM 92.1 Katsina)                         ', '2015-01-01', '2018-03-16', '', '', '', '', '', '', '', '', 'VKAT4050'),
(13, '3683AI', 'COMMUNICATION', 'ENGLISH, HAUSA', '', '', '', '', '', '', '', '', 'REPORTER\\NEWS CASTER', 'KASINA STATE TELEVISION SERVICE', '2011-03-03', '2013-03-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(14, '2936NA ', 'Producer/DCA', 'Gathering materials, Guests, and other relevant Materials. Edit and produce the programme.', 'Reporter/ Newscaster ', 'Scouting for news items and present to news editor to edit.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(15, '6610KA ', 'Communication', 'English/Hausa', '', '', '', '', '', '', '', '', 'presenter,DCA,Producer', 'Katsina stste Radio', '2016-02-05', '2017-05-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(16, '2011RA ', 'Ability To Work Effectively In a team', 'Working With Different Media Station Gives me expriances on how to intract with one another.', 'Access With Microsoft Office', 'My Diploma in Computer Application and Appreciation improve my Skill on how to operate Computer generally.', '', '', '', '', '', '', 'Translation', 'Kaduna State Media Corporation', '2012-09-20', '2013-02-14', 'DCA', 'Katsina State Radio Station', '2013-10-17', '2015-01-02', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(17, '8218BA ', 'Commmunication', 'Can Communicate fluently', 'Producer and Presenter', 'Ability to Present and produce any kind of Program', '', '', '', '', '', '', 'Jingle', 'State Radio Katsina', '2014-05-14', '2015-02-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(18, '8154IB ', 'Communication', 'Eglish, Hausa', '', '', '', '', '', '', '', '', 'Clerical Officer', 'National Identity Management Commission', '2002-08-08', '2013-08-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(19, '8342ZA', 'Team Work', 'Ability to facilitate working as a team with respective colleagues and come up with a substantial and effective result.', 'Perseverance', 'Ability to persevere in offering a qualitative service despite challenges and difficulties or delay in achieving a certain goal.', '', '', '', '', '', '', 'Industrial Attachment', 'Turai Yaradua Maternity and Children Hospital Katsina', '2014-01-04', '2014-12-10', '', '', '', '', '', '', '', '', 'Community Reporter', 'Equal Access International', '2017-02-01', '2018-01-12', '', '', '', '', 'VKAT4050'),
(20, '4034AB ', 'Mechanic', 'Motorcycle', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(21, '3873BI ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(22, '3090EN', '3 month Industrial Training (SIWES) at PHCN Katsina', 'Fault finding on 33KV, 11KV & 415/220V. Electrical fault Tracing on Transformer J&P feeder filler ETC  ', 'Nine (9) Years worked with Dana Steel Rolling Company Ltd. Katsina.', 'Co-ordinate Electrical Repairs    on Machinery and Utility Equipment. Design, Contractions and Installation of Electrical control Panel. Preventive and corrective Maintenance on all Installed Electrical Equipment in the Company.      ', '', '', '5 Years  with RE-Machatronix Engineering co. ', 'Co-ordinate New Electrical Installation for Domestic and Industry. Solar system Installation. Fabrication of control panels. Fabrication of Intelligent control panels.  ', '', '', 'Electrical Supervisor ', 'Dana Steel Rolling Company ', '2005-04-01', '2014-05-01', 'Engineer', 'RE-machatronix CO.', '2010-07-05', '2015-01-07', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(23, 'IB8431', 'News editing, production, presentation, interviewing, editing of stories brought reporters and gener', 'Editing raw stories for news bulletin, interviwing guests for production of programs recording and also presenting programs after production.', 'Translation ', 'translating News bulletins from English language to Hausa and vice-versa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(24, '4344FI ', 'printig press', 'printing press', '', '', '', '', '', '', '', '', 'graphic desing', 'fikira press', '2002-05-20', '2006-01-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(25, '9063EN ', '', '', '', '', '', '', '', '', '', '', 'Electricians/Arieal Rigger', 'Katsina State Television ', '2014-02-06', '2016-09-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(26, '8946AB', '', '', '', '', '', '', '', '', '', '', 'Driving', 'standard driving school', '2006-02-02', '2008-06-24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(27, 'AB4282 ', 'Production, Editing, presentation', 'Cool editing and Adobe and DCA', ' DCA', 'Controlling the Consul', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `vsn_staff_next`
--

CREATE TABLE `vsn_staff_next` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(50) NOT NULL,
  `C_Next_of_kin` varchar(100) DEFAULT NULL,
  `C_Relation` varchar(50) DEFAULT NULL,
  `C_Number` varchar(50) DEFAULT NULL,
  `C_Address` varchar(200) DEFAULT NULL,
  `C_Refreeone` varchar(100) DEFAULT NULL,
  `C_Refreeone_Tit` varchar(100) DEFAULT NULL,
  `C_Refreeone_Num` varchar(50) DEFAULT NULL,
  `C_Refreeone_Add` varchar(200) DEFAULT NULL,
  `C_Refreetwo` varchar(100) DEFAULT NULL,
  `C_Refreetwo_Tit` varchar(50) DEFAULT NULL,
  `C_Refreetwo_Num` varchar(50) DEFAULT NULL,
  `C_Refreetwo_Add` varchar(200) DEFAULT NULL,
  `C_Refreethree` varchar(100) DEFAULT NULL,
  `C_Refreethree_Tit` varchar(50) DEFAULT NULL,
  `C_Refreethree_Num` varchar(50) DEFAULT NULL,
  `C_Refreethree_Add` varchar(200) DEFAULT NULL,
  `Station_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vsn_staff_next`
--

INSERT INTO `vsn_staff_next` (`ID`, `Staff_ID`, `C_Next_of_kin`, `C_Relation`, `C_Number`, `C_Address`, `C_Refreeone`, `C_Refreeone_Tit`, `C_Refreeone_Num`, `C_Refreeone_Add`, `C_Refreetwo`, `C_Refreetwo_Tit`, `C_Refreetwo_Num`, `C_Refreetwo_Add`, `C_Refreethree`, `C_Refreethree_Tit`, `C_Refreethree_Num`, `C_Refreethree_Add`, `Station_ID`) VALUES
(1, '7425UN ', 'Khalifa Abubakar', 'Son', '080', 'Unguwar Alkali Katsina', 'Lawal Tukur Mani', 'Health Service Management Board Katsina', '08095586348', '', 'Gidado Tinau', 'Teacher', '08067987875', 'Unguwar Madawaki Katsina', '', '', '', '', 'VKAT4050'),
(2, 'UM8496 ', 'Aliyu Sabi\'u Ahmad', 'Brother', '07038981138', 'Kofar Marusa', 'Alh Hamisu Abubakar Matazu', 'Contractor', '08034159114', 'K/ marusa ', 'Late Mal Sabi\'u Ahmad ', 'Civil Sarvant', 'Nill', 'K/ MARUSA', 'Abubakar Kabir Matazu', 'Managing Director', '07030358857', 'Garama Quaters', 'VKAT4050'),
(3, '9593AK ', 'Alh Tanimu Kabir', 'Elder Brother', '08060574008', 'Jani, Mani local gov\'t', 'Lawal Gwanda', 'Head of news, Radio Nigeria Companion Fm ', '08061596723', 'Companion fm katsina,Batsari Road.', 'Ibrahim Kankia', 'Editor', '08069521608', 'Companion fm katsina,Batsari Road.', 'Abbdullahi Garba', 'Reporter', '07034656392', 'Katsina State Radio', 'VKAT4050'),
(4, 'NA4849 ', 'Mustapha Sadi', 'Brother', '07037407211', 'dutsin amare katsina', 'mal. sadi dutsin amare', 'mechanic', '08163421540', 'dutsin amare', 'mal. dahiru', 'tsangaya school teacher', '08103703259', 'dutsin amare', 'Abubakar sadi', 'student', '08142564044', 'dutsin amare', 'VKAT4050'),
(5, 'BA9611 ', 'NURA IBRAHIM', 'Brother', '07038507968', 'MANI LOCAL GOVERNMENT', 'MAL USMAN ', 'DIRIVER', '', 'TAFKIN KANKIA', 'Mal. Dahiru', 'TSANGAYA SCHOOL TEACHER', '08165079118', 'DUTSIN AMARE', '', '', '', '', 'VKAT4050'),
(6, '1416FA', 'Ismail Abbah', 'Husband', '08032412275', 'Rafindadi', 'Murtala idris', 'Police Force', '09033851853', 'Mopal 9 Fanshekara', 'Ismail Abba Masanawa', 'Journalist', '08032412275', 'Rafindadi', 'Abdul Yusuf', 'journalist', '08036980730', 'Nwala', 'VKAT4050'),
(7, 'EN9639 ', 'Aisha Sulaiman', 'Wife', '08068376971', 'Tsohuwar Kasuwa Katsina', 'Alh Bala Ashura', 'Pensioner', '08129636289', 'Tsohuwar Katsina', 'Aisha Sulaiman', 'Student', '08068376971', 'Tsohuwar Kasuwa Katsina', 'Bishir Bala Ashura', 'Civil Sarvant', '08032665965', 'Tsohuwar Kasuwa', 'VKAT4050'),
(8, '7787AM', 'Umar Shehu Daura', 'Father', '08068699958', 'No 5. Royal Palm Crescent, Nyanya Federal Housing, Abuja', 'Usman Shehu ', 'Civil Servant', '08036460129', 'Kwado, behind Afdin Filling Station', 'Yazid Abdulmalik', 'Civil Servant', '08060309653', 'Sabuwar Unguwa Katsina', 'Nura Ismail', 'Civil Servant', '08093857919', 'GRA, Opposite Inter Governmental office, Katsina', 'VKAT4050'),
(9, 'NE2541', 'Enda Vincent Obaro', 'Fiance', '08037415182', '17 Angwa uku, Off ado panel beater kano kano state', 'Mr. K.E Agada', ' Captain, (35 battalion Nigerian Army)', '07038163630', '35 battalion Nigerian Army nansinta jibiya road katsina', 'Abubakar Matazu', 'Managing Director. (Vision Media Services Ltd)', '07030358857', '13, kebram Plaza Mani Road katsina', 'Mr. Utang Okaba', 'News & Current affairs (Daar Communications Plc)', '08034515713', 'kado Estate  kubwa abuja', 'VKAT4050'),
(10, '2936NA ', 'Muhammad Abdullahi Bawale', 'Elder Brother', '0812880898', 'Katsina', 'Alhaji Nasiru Isma\'il Kirah', 'Director Programme Depertment', '08036047963', 'No 8 Takanda Road Barhim Hausing Estate, Katsina.', 'Alhaji Musa Waziri Hardawa', 'Director Programme Department Radio Nigeria Kaduna', '08034509130/08076556536', 'Bauchi', 'Alhaji Umar Babani Isah Mani', 'Sarkin Gabas of Katsina District Head of Mani.', '08035999684/08139689998', 'Kangiwa, Mani', 'VKAT4050'),
(11, '3683AI', 'ABUBAKAR B UA', 'FATHER', '08O96718876', 'SABUWAR KASUWA SOKOTO ROAD KATSINA', 'AMINU RABE INUWA', 'EXAMINATION OFFICER ,GOVERNMENT BOYS COLLEGE MANI', '09069612871', 'KADARKO ESTATE KWADO KATSINA', 'UMAR D UMAR ', 'PRINCIPLE , GOVERNMENT DAYSECONDARY SCHOOLSTANNI.', '08038581509', 'RIMI LOCAL GOVERNMENT KATSINA', '', '', '', '', 'VKAT4050'),
(12, '6610KA ', 'Ibrahim yusuf kafinsoli', 'father', '08032758932', 'ministy of social development training centre Katsina', 'Hashim Barau', 'sergent officer', '08038115539', 'Nigeri\'an Defence Acadamy Kaduna', '', '', '', '', '', '', '', '', 'VKAT4050'),
(13, '6637MB', 'BILYAMINU MOHAMMED ', 'BROTHER', '07060710633', 'MAMMAN MORAI ROAD, LOW COST HOUSING TALATA MAFARA', 'MALAM SAMA\'ILA BALARABE', 'SENIOR LECTURER, MASS COMMUNCIATION DEPARTMENT, HASSAN USMAN KATSINA POLYTECHNIC', '08036185648', 'RAFIN DADI AREA, KATSINA', 'MALAM HASSAN BAKO', 'DIRECTOR/ NEWS REPORTER KATSINA STATE RADIO', 'O8036986305', 'ALBABA FAMILY HOUSE, RAFIN DADI KATSINA', 'GAMBO MARYAM GALADIMA', 'PHARMACIST', '08162309243', 'MAMMAN MORAI ROAD, LOW COST HOUSING TALATA MAFARA', 'VKAT4050'),
(14, '2011RA ', 'Muhammad Kabir Runka', 'Brother', '08063732573', 'Kofar Fada Runka', 'Ahmed Muhammad Runka', 'Enviromentalist', '08067333403', 'Malali quaters Kaduna', 'Shafaatu Kabir Runka', 'Community Health Worker', '07068724487', 'Shararra Pipes Katsina', 'Bello Kabir Runka', 'Business', '08066341688', 'Kofar Fada Runka', 'VKAT4050'),
(15, '3116CY', 'MR. Felix C. Ezeala (JP)', 'Father', '08163817722, 08058217272.', 'No 39 Goldcoast Road sabon gari kano state.', 'MR. Felix C. Ezeala (JP)', '', '08163817722, 08058217272.', 'No 39 Goldcoast Road sabon gari kano state.', 'Barrister Segun Olabode', 'Legal practitioner', '08023306345, 08069190365', '7C Murtala Muhammed Way kano state.(5th Floor) Liberty chambers.', '', '', '', '', 'VKAT4050'),
(16, '8218BA ', 'Hamisu Chairman', 'Father', '07035831130', 'Shararrar Pipe Kofar Kaura', 'Halima Sani Bala', 'Teacher', '08060405558', 'Dutsin Safe Lowcost Katsina', 'Abubakar Gambo Yamen', 'Civil Servant', '08034821379', 'Batagarawa ', 'Ibrahim Sani Mahmud', 'Civil Servant', '07031650643', 'Rijiyar Lemu Kano', 'VKAT4050'),
(17, '8154IB ', 'Muhammed Ibrahim Jikamshi', 'Son', '08032302032', 'Behind Vision FM Dikko Stadium Katsina', 'Abubakar Kabir Matazu', 'Managing Director Vision Media Services', '07030358857', 'Vision FM Abuja', 'Sulaiman Abubakar Matazu', 'Lecturer Hassan Usman Katsina Polytechnic', '08036303815', 'Hassan Usman Katsina Polytechnic', 'Aminu Safiyanu Jikamshi', 'Nigerian Army', '08158040205', 'Life camp Abuja ', 'VKAT4050'),
(18, '8342ZA', 'SARATU ISA SULAIMAN', 'SISTER', '08131380109', 'KWADO, KATSINA, KATSINA STATE.', 'SAMAILA SULAIMAN', 'ASST REG. HUK POLY KATSINA', '08031177753', 'BATAGARAWA LOWCOST KATSINA', 'MUHAMMAD ABU RIMI', 'EXECUTIVE DIRECTOR, PILGRIMS WELFARE BOARD', '08148585385', 'GRA KATSINA', 'ABUBAKAR KABIR MATAZU', 'MD, VISION MEDIA SERVICES', '07030358857', 'GWARINPA ESTATE, ABUJA', 'VKAT4050'),
(19, '4034AB', 'Fatima Abdulrahman', 'Daugther', '08068370489', 'Kofar Bai', 'Salisu Ibrahim', 'Civil Defence', '07032057077', 'Tudun Wada Katsina', 'Aminu Ibrahim', 'Civil Defence', '08060305015', 'Kofar Bai Katsina', 'Kamal Abba', 'Teacher', '08035299616', 'Kayalwa Katsina', 'VKAT4050'),
(20, '3873BI ', 'BISHIR AHMED', 'SON', '08036187966', 'MASANAWA', 'BELLO YUSUF', 'CIVIL SERVANT', '08063376986', 'RAFUKA', 'ALI YA\'U DAGA', 'POLITICIAN', '08035894542', 'DAGA,JIBIA LOCAL GOVERNMENT', 'AMIRU TANIMU', 'BUSINESS', '08130406278', 'RAFUKA , KATSINA', 'VKAT4050'),
(21, '3090EN', 'Abdurrahaman  Bature', 'Brother', '08063283272', 'Tsohuwar Kasuwa Danmarna Area Katsina', 'Nasir Mohmammed Abdulbaki', 'Managing Director Sahel Group Wuse 11 Abuja', '08031135265', 'Gorangida katsina', 'Sulaiman Muhammed ', 'Director Finace Ministry of Agric Katsina', '07068292033', 'GRA katsina', 'Yusuf Maiwada', 'Project coordinator Electrical Dep.HUK Poly ', '08032807347', 'Albaba', 'VKAT4050'),
(22, 'IB8431', 'Ibrahim Ibrahim Balarabe', 'Son', '08033120250', 'No 4 Rogogo Street, K/Kaura New Layout, Katsina.', 'Shehu Musa Dan Daura', 'SOcial Worker/Businessman', '08031113199', 'Barhim Quarters Katsina.', 'Abubakar Matazu', 'Managing Director', '08051102220', 'Gwarinpa Housing Estate, Abuja.', 'Wada Maida', 'Chairman NAN Board', '', 'GRA Quarters Katsiana', 'VKAT4050'),
(23, '4344FI ', 'Hon Badamasi barau', 'brother', '08065537534', 'filin samji katsina', 'Alhj sulaiman agaji', 'chairman jibwis national headquarter jos', '08035060831', 'mai unguwar kofar marusa katsina state', '', '', '', '', '', '', '', '', 'VKAT4050'),
(24, '9063EN ', 'Samaila Idris', 'Brother', '08038505509', 'Tudun Wada Katsina', 'Nuradeen Ibrahim', 'mr', '08036641943', 'Galadinci Katsina', 'Samaila Idris', 'mr', '08038505509', 'Tudun Wada Katsina', 'Tahir Umar Bakiyawa', 'mr', '08035799473', 'Bakiyawa Katsina', 'VKAT4050'),
(25, '8946AB', 'Muhammad ahmed', 'Junior brother', '09031359209', 'Kofar bai quaters', 'Janaidu ilyasu', 'distric head of tudun wada', '', 'tudun wada', 'Alh.Abdullahi ado ', 'business man', '', 'kofar keke', '', '', '', '', 'VKAT4050'),
(26, 'AB4282 ', 'Hafsat Abubakar S Gefe', 'Daughter', '08035627363', 'Sabon Titin Kwado', 'Malam Abdullahi Shehu', 'School teacher', '08032057899', 'Hassu Anko Girls Secondary School Katsina', 'Malam Mansur Usman', 'Civil Defence Staff', '08032060659', 'Sabon Titin Kwado Katsina', 'Aminu Bala ', 'Tailor', '07064643484', 'Sabon Titin Kwado, Katsinaa', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `vsn_staff_schools`
--

CREATE TABLE `vsn_staff_schools` (
  `ID` int(11) NOT NULL,
  `Staff_ID` varchar(50) NOT NULL,
  `C_Prm` varchar(150) DEFAULT NULL,
  `C_PrmQual` varchar(150) DEFAULT NULL,
  `C_PrmFrom` varchar(50) DEFAULT NULL,
  `C_PrmTo` varchar(50) DEFAULT NULL,
  `C_Sec` varchar(150) DEFAULT NULL,
  `C_SecQual` varchar(150) DEFAULT NULL,
  `C_SecFrom` varchar(50) DEFAULT NULL,
  `C_SecTo` varchar(50) DEFAULT NULL,
  `C_Ter` varchar(150) DEFAULT NULL,
  `C_TerQual` varchar(150) DEFAULT NULL,
  `C_TerFrom` varchar(50) DEFAULT NULL,
  `C_TerTo` varchar(50) DEFAULT NULL,
  `C_ScOne` varchar(150) DEFAULT NULL,
  `C_ScOneQual` varchar(150) DEFAULT NULL,
  `C_ScOneFrom` varchar(50) DEFAULT NULL,
  `C_ScOneTo` varchar(50) DEFAULT NULL,
  `C_ScTwo` varchar(150) DEFAULT NULL,
  `C_ScTwoQual` varchar(150) DEFAULT NULL,
  `C_ScTwoFrom` varchar(50) DEFAULT NULL,
  `C_ScTwoTo` varchar(50) DEFAULT NULL,
  `C_ScThree` varchar(150) DEFAULT NULL,
  `C_ScThreeQual` varchar(150) DEFAULT NULL,
  `C_ScThreeFrom` varchar(50) DEFAULT NULL,
  `C_ScThreeTo` varchar(50) DEFAULT NULL,
  `C_ScFour` varchar(150) DEFAULT NULL,
  `C_ScFourQual` varchar(150) DEFAULT NULL,
  `C_ScFourFrom` varchar(50) DEFAULT NULL,
  `C_ScFourTo` varchar(50) DEFAULT NULL,
  `C_ScFive` varchar(150) DEFAULT NULL,
  `C_ScFiveQual` varchar(150) DEFAULT NULL,
  `C_ScFiveFrom` varchar(50) DEFAULT NULL,
  `C_ScFiveTo` varchar(50) DEFAULT NULL,
  `Station_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vsn_staff_schools`
--

INSERT INTO `vsn_staff_schools` (`ID`, `Staff_ID`, `C_Prm`, `C_PrmQual`, `C_PrmFrom`, `C_PrmTo`, `C_Sec`, `C_SecQual`, `C_SecFrom`, `C_SecTo`, `C_Ter`, `C_TerQual`, `C_TerFrom`, `C_TerTo`, `C_ScOne`, `C_ScOneQual`, `C_ScOneFrom`, `C_ScOneTo`, `C_ScTwo`, `C_ScTwoQual`, `C_ScTwoFrom`, `C_ScTwoTo`, `C_ScThree`, `C_ScThreeQual`, `C_ScThreeFrom`, `C_ScThreeTo`, `C_ScFour`, `C_ScFourQual`, `C_ScFourFrom`, `C_ScFourTo`, `C_ScFive`, `C_ScFiveQual`, `C_ScFiveFrom`, `C_ScFiveTo`, `Station_ID`) VALUES
(1, 'NE2541 ', 'BLESSED DAY NURSERY AND PRIMARY SCHOOL', 'FSLC', '1990-05-05', '1999-07-12', 'SANYA GRAMMER SCHOOL', 'WASC', '1997-09-06', '2006-09-03', 'FEDERAL UNIVERSITY OF TECHNOLOGY OWERRI (FUTO)', 'B.TECH COMPUTER SCIENCE', '2004-05-04', '2009-12-22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(2, '7425UN ', 'Gobarau Primary School Katsina', 'Primary School Leaving Certificate', '1987-01-01', '1992-11-01', 'Government Girls Secondary School Katsina', 'Senior Secondary School Certificate', '1992-01-01', '1998-01-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(3, 'UM8496 ', 'Waziri Zayyana Science Model', 'Testimonial', '1994-03-04', '2000-06-05', 'Government College Katsina', 'Senior Secondary School Cerficate', '2000-01-09', '2006-08-07', 'National Open University', 'Bsc', '2016-03-10', '2018-09-28', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(4, '3116CY ', 'Methodist Nursery and Primary School', 'primary school leaving certificate.', '1996-01-10', '2005-07-20', 'Federal Government Girls college kazaure, Jigawa State.', 'WASSCE', '2005-10-02', '2010-07-18', 'Bayero University Kano ', 'BSC. Mass Communication', '2011-01-24', '2016-02-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(5, 'IB8431 ', 'Farin Yaro Primary School Katsina', 'School leaving Certificate', '1964', '1972', 'Arabic Teachers College Katsina', 'Grade ii Teachers Certificate', '1972', '1976', 'School for General Studies, BUK University of Bradford (UK) College for Further Education (London)_ ', 'General Studies Certificate. BA. Grad Cert Educ', '1977', '1982', '', '', '', '', 'University of Bradford (UK)', 'MA PEACE STUDIES', '1994', '1996', 'College for Higher Education East Ham (London)', 'HNC(Business Information Technology)', '1995', '1996', '', '', '', '', '', '', '', '', 'VKAT4050'),
(6, '6637MB ', 'DR ABUBAKAR DOGO MODEL PRIMARY SCHOOL', 'PRIMARY SCHOOL LEAVING CERTIFCATE', '1995-12-07', '2000-09-11', 'FEDERAL GOVERNMNENT COLLEGE ANKA', 'SECONDARY SCHOOL CERTIFICATE', '2000-12-11', '2007-05-25', 'HASSAN USMAN KATSINA POLYTECHNIC', 'HND', '2013-01-01', '2014-02-10', '', '', '', '', 'ABDU GUSAU POLYTECHNIC', 'ND', '2008-07-01', '2010-02-10', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(7, '1416FA ', 'police Children school', 'Primary School Certificate', '1997-07-03', '2003-07-04', 'Keyway International school', 'Senior Secondary School Certificate', '2005-05-16', '2011-07-04', 'Hassan Usman katsina polytecnic', 'National Diploma', '2013-08-14', '2015-08-16', '', '', '', '', 'Ika Computer Institute Katsina', 'Certificate', '2010-03-01', '2010-09-03', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(8, '9593AK ', 'Jani Model Primary school', 'Primary Certificate', '1999-09-02', '2005-09-05', 'Government Day Secondary school', 'SecondrySchool Certificate', '2005-12-24', '2011-07-21', 'Ummaru Musa Yar,adua University', 'BSC,Political Science', '2015-01-15', '2018-02-07', '', '', '', '', 'Hassan Usman Polytechnic ', 'ND Mass Communication ', '2011-10-05', '2013-12-10', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(9, 'NA4849 ', 'Amadu Coomasi science modal pramary school', 'FSLC', '2006-05-05', '2012-05-05', 'MODOJI COMMUNITY DAY JUNIOR SECONDARY SCHOOL', 'WAEC', '2012-06-06', '2018-06-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(10, 'BA9611 ', 'Amadu coomasi modal primary school', 'Primary School Leaving Certificate', '2002-01-01', '2008-01-01', 'Government college Katsina', 'Senior Secondary School Certificate', '2008-01-01', '2014-01-01', 'Katsina community islamic college', 'Diploma', '2016-12-10', '2018-12-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(11, 'EN9639 ', 'Danja Model Primary School', 'Primary School Certificate', '1987-02-18', '1992-02-29', 'Government Techinical Mashi', 'Senior Secondary School Cerficate', '2001-07-17', '2003-02-17', 'Kano State Polytechinic', 'HND', '2004-02-05', '2009-08-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(12, '7787AM', 'Hayatul Islam Nursery Primary School', 'primary School Certificate', '1998-06-06', '2004-07-23', 'Government Secondary School', 'Secondary School Certificate', '2004-09-03', '2010-07-13', 'Umaru Musa Yaradua University Katsina', 'Degree', '2011-10-11', '2016-05-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(13, '3683AI ', 'ISAH KAITA QUR,ANIC MODEL PRIMARY SCHOOL', 'Primary School Certificate', '1993-09-20', '1999-08-06', 'GOVERNMENT GIRLS SECONDARY SCHOOL AJIWA', 'Senior Secondary School Certificate', '2000-09-19', '2005-06-10', 'HASSAN USMAN KATSINA POLYTECTNIC', 'H N D MASS COMMUNICATION', '20011-02-09', '20015-02-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(14, '2936NA ', 'Shaikh Abubakar Muhamud Gumi Primary School Dutsin-ma.', 'Primary Certificate', '1997-02-15', '2003-10-03', 'Government Day Secondary School Dutsin-ma.', 'SSCE Certificate', '2003-11-02', '2009-09-07', 'Hassan Usman Katsina Polytechnic, Katsina.', 'National Diploma in Mass Communication.', '2012-12-06', '2014-10-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(15, '6610KA ', 'waziri zayyana science model primary school katsina ', 'Primary school testimonial', '2002-01-02', '2008-01-02', 'Government colleage senior daywing katsina', 'Secondry school testimonial', '2009-05-05', '2011-04-05', 'Hassan Usman Katsina Poly Pechnic', 'ND Mass Communication', '2015-01-02', '2017-05-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(16, '8342ZA ', 'Dariq International School Kaduna', 'Primary School Leaving Certificate', '1998-03-01', '2004-05-01', 'Clara International School Kaduna', 'Senior Secondary School Certificate', '2004-09-01', '2010-05-01', 'Hassan  Usman Katsina Polytechnic', 'Diploma', '2013-11-01', '2016-12-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(17, '2011RA ', 'Yandaka  Model Primary Dutsinma', 'Primary Certificate', '1998-01-01', '2004-09-09', 'Government Girl\'s Pilot Kankia', 'SecondrySchool Certificate', '2004-03-25', '2010-09-12', 'Hassan Usman Katsina Polytechnic, Katsina.', 'National Diploma in Mass Communication.', '2011-02-20', '2013-09-20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(18, '8218BA ', 'Isa Kaita Extension Primary School', 'Primary School Leaving Certificate', '2001-02-05', '2007-03-06', 'Government Day Kofar Yandaka', 'Senior Secondary School Certificate', '2007-08-08', '2013-07-10', 'Pinnacle  View ICT ', 'Diploma', '2014-01-03', '2014-06-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(19, '8154IB ', 'Jikamshi Pilot Primary School', 'Primary School Leaving Certificate', '1978-04-01', '1984-08-12', 'Government Vocational Training Center Musawa', 'Senior Secondary School Certificate', '1984-09-04', '1990-08-10', 'Kano State Polytechnic', 'National Diploma in Public Administration', '2005-10-02', '2006-09-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(20, '4034AB ', 'Kayalwa Primary School Katsina State', 'Primary School Leaving Certificate', '1997-09-15', '2000-07-05', 'Katsina College Katsina', 'NECO Result', '2002-09-12', '2007-07-06', 'Nill', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(21, '3873BI ', 'GIDADO PRIMARY SCHOOL RAFUKA', 'PRIMARY SCHOOL LEAVING CERTIFCATE', '1980-03-06', '1986-10-05', 'COLLEGE OF ARABIC AND ISLAMIC STUDIES KAFUR', 'SECONDARY SCHOOL CERTIFICATE', '2013-02-04', '2017-04-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(22, '3090EN ', 'Rafindadi Model Primary School ', 'Primary School Leaving Certificate', '1989-01-12', '1995-08-12', 'Government Science Secondary School Dutsinma', 'Senior Secondary School Certificate', '', '2002-11-12', 'Hassan  Usman Katsina Polytechnic', 'H N D Electrical Electronics ', '2008-01-01', '2010-12-01', '', '', '', '', 'Trend Multimedia Computer  ', 'Computer Certificate  ', '2009-02-01', '2009-08-01', 'Umaru Musa Yaradua University ', 'Solar PV Installation Supervisor Certificate ', '2016-04-03', '2016-07-01', '', '', '', '', '', '', '', '', 'VKAT4050'),
(23, '4344FI ', 'shehu primary school funtua', 'certificate', '1985-08-19', '1991-11-11', 'gov day secondry school funtua', 'certificate', '1996-03-31', '', 'college of administration funtua ', 'Diploma in computer', '2003-02-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(24, '9063EN ', 'Dandagoro Primary School', 'Primary School Certificate ', '1988-02-12', '1993-02-12', 'Katsina College Katsina', 'Senior Secondary School Certificate', '1994-03-10', '2000-03-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(25, '8946AB', 'Amadu coomassie model science primary school', 'Testimonial', '1992-09-19', '1997-02-12', 'Katsina college Katsina', 'Testimonial', '2001-05-22', '2003-06-25', 'Hassan  Usman Katsina Polytechnic', 'Result', '2009-02-19', '2011-06-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050'),
(26, 'AB4282 ', 'Danwaire Primary School Batsari', 'School Cert.', '1987', '1994', 'Danwaire Secondary Batsari', 'Senior Secondary School Certiificate', '1996', '2002', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'VKAT4050');

-- --------------------------------------------------------

--
-- Table structure for table `vsn_sub_users`
--

CREATE TABLE `vsn_sub_users` (
  `ID` int(11) NOT NULL,
  `Sub_User_ID` varchar(100) NOT NULL,
  `V_S_username` varchar(100) NOT NULL,
  `V_S_password` varchar(100) NOT NULL,
  `V_S_Location` varchar(100) NOT NULL,
  `Station_ID` varchar(100) NOT NULL,
  `Created_By` varchar(100) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vsn_sub_users`
--

INSERT INTO `vsn_sub_users` (`ID`, `Sub_User_ID`, `V_S_username`, `V_S_password`, `V_S_Location`, `Station_ID`, `Created_By`, `Created_At`) VALUES
(1, '4612NA', 'Naziru56', 'bakor111', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-08 00:42:19'),
(2, '6637MB', 'MB Mafara', '1989', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-08 00:48:41'),
(3, '6610KA', 'Kafin soli', '1996', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-08 00:58:40'),
(4, '7425UN', 'Unguwar Yari', '0065', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-08 01:06:15'),
(5, '3683AI', 'Aisha', '2020', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-10 01:11:25'),
(8, '6046AK', 'AKJANI', '3884', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-10 01:47:21'),
(13, '8218BA', 'Basira', '69069', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-12 20:26:27'),
(14, '3116CY', 'Cynthia', 'CYNTHIA1234', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-12 21:00:02'),
(15, '1416FA', 'Fatima', 'idris', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-12 23:36:26'),
(16, '7787AM', 'Amina', 'daura', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-12 23:36:57'),
(17, '9593AK', 'AK JANI', '3884', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-14 19:49:39'),
(18, '7575AK', 'AK JANI', '3884', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-14 19:49:47'),
(19, '2936NA', 'Namijin Gari', '2425', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-15 20:56:57'),
(20, '8342ZA', 'Zainab', 'zeezerh743', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-16 01:23:46'),
(21, '2011RA', 'Rabiatu', '7865', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-16 16:14:05'),
(22, '8154IB', 'Ibrahim', '4545', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-19 17:37:19'),
(23, '4034AB', 'Abdurrahman', '0000', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-19 18:48:14'),
(24, '3873BI', 'Binta', '12345', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-19 21:31:29'),
(25, '8946AB', 'Abubakar', '123456', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-19 23:22:01'),
(26, '4344FI', 'Fikira', 'fikira', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-20 00:08:58'),
(27, '3090EN', 'Engr Abdul', '08063283272', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-20 22:10:35'),
(28, '9063EN', 'ENGRAMINU', '123456', 'Katsina', 'VKAT4050', 'Nelson', '2018-03-30 23:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `vsn_users`
--

CREATE TABLE `vsn_users` (
  `ID` int(11) NOT NULL,
  `V_S_Location` varchar(100) NOT NULL,
  `V_User_Name` varchar(100) NOT NULL,
  `V_User_Password` varchar(100) NOT NULL,
  `V_Status` varchar(150) NOT NULL,
  `Station_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vsn_users`
--

INSERT INTO `vsn_users` (`ID`, `V_S_Location`, `V_User_Name`, `V_User_Password`, `V_Status`, `Station_ID`) VALUES
(1, 'Abuja', 'Muslim', 'muslim', 'IT Engr', 'VABU8429'),
(2, 'Kebbi', 'Muslim', 'muslim', 'IT', 'VKEB6464'),
(6, 'Katsina', 'Ibrahim Balarabe', 'balarabe', 'Manager Programs', 'VKAT4050'),
(7, 'Katsina', 'Mb Mafara', '1989', 'Head of Marketing', 'VKAT4050'),
(8, 'Katsina', 'Ishaq`', '4742', 'EDITOR', 'VKAT4050'),
(9, 'Katsina', 'Ishaq', '4742', 'EDITOR', 'VKAT4050'),
(10, 'Katsina', 'Naziru', 'bakori', 'EDITOR', 'VKAT4050'),
(11, 'Katsina', 'US Ahmad', '6585', 'Assistant Program Manager', 'VKAT4050'),
(12, 'Katsina', 'Farooq', '6585', 'Assistant Program Manager', 'VKAT4050'),
(13, 'Katsina', 'Iskeel', 'muhammad', 'GM', 'VKAT4050'),
(14, 'Katsina', 'Ameena', 'daura', 'Acting Marketing Manager', 'VKAT4050');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert_router`
--
ALTER TABLE `advert_router`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `advert_timing`
--
ALTER TABLE `advert_timing`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `advert_t_day`
--
ALTER TABLE `advert_t_day`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ended_adverts`
--
ALTER TABLE `ended_adverts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mon_end_adv`
--
ALTER TABLE `mon_end_adv`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paginate`
--
ALTER TABLE `paginate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `programes`
--
ALTER TABLE `programes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_fri`
--
ALTER TABLE `p_fri`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_mon`
--
ALTER TABLE `p_mon`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_sat`
--
ALTER TABLE `p_sat`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_sun`
--
ALTER TABLE `p_sun`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_thu`
--
ALTER TABLE `p_thu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_tue`
--
ALTER TABLE `p_tue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `p_wed`
--
ALTER TABLE `p_wed`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register_advert`
--
ALTER TABLE `register_advert`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register_oap`
--
ALTER TABLE `register_oap`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register_program`
--
ALTER TABLE `register_program`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `set_slot`
--
ALTER TABLE `set_slot`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_friday`
--
ALTER TABLE `t_friday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_monday`
--
ALTER TABLE `t_monday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_saturday`
--
ALTER TABLE `t_saturday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_sunday`
--
ALTER TABLE `t_sunday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_thursday`
--
ALTER TABLE `t_thursday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_tuesday`
--
ALTER TABLE `t_tuesday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_wednesday`
--
ALTER TABLE `t_wednesday`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vsn_staff`
--
ALTER TABLE `vsn_staff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vsn_staff_expr`
--
ALTER TABLE `vsn_staff_expr`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vsn_staff_next`
--
ALTER TABLE `vsn_staff_next`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vsn_staff_schools`
--
ALTER TABLE `vsn_staff_schools`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vsn_sub_users`
--
ALTER TABLE `vsn_sub_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vsn_users`
--
ALTER TABLE `vsn_users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert_router`
--
ALTER TABLE `advert_router`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advert_timing`
--
ALTER TABLE `advert_timing`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advert_t_day`
--
ALTER TABLE `advert_t_day`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ended_adverts`
--
ALTER TABLE `ended_adverts`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mon_end_adv`
--
ALTER TABLE `mon_end_adv`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paginate`
--
ALTER TABLE `paginate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `programes`
--
ALTER TABLE `programes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_fri`
--
ALTER TABLE `p_fri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `p_mon`
--
ALTER TABLE `p_mon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `p_sat`
--
ALTER TABLE `p_sat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `p_sun`
--
ALTER TABLE `p_sun`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `p_thu`
--
ALTER TABLE `p_thu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `p_tue`
--
ALTER TABLE `p_tue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `p_wed`
--
ALTER TABLE `p_wed`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `register_advert`
--
ALTER TABLE `register_advert`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `register_oap`
--
ALTER TABLE `register_oap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register_program`
--
ALTER TABLE `register_program`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_slot`
--
ALTER TABLE `set_slot`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_friday`
--
ALTER TABLE `t_friday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_monday`
--
ALTER TABLE `t_monday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_saturday`
--
ALTER TABLE `t_saturday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_sunday`
--
ALTER TABLE `t_sunday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_thursday`
--
ALTER TABLE `t_thursday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tuesday`
--
ALTER TABLE `t_tuesday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_wednesday`
--
ALTER TABLE `t_wednesday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vsn_staff`
--
ALTER TABLE `vsn_staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `vsn_staff_expr`
--
ALTER TABLE `vsn_staff_expr`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `vsn_staff_next`
--
ALTER TABLE `vsn_staff_next`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vsn_staff_schools`
--
ALTER TABLE `vsn_staff_schools`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `vsn_sub_users`
--
ALTER TABLE `vsn_sub_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `vsn_users`
--
ALTER TABLE `vsn_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
