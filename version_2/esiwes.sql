-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2023 at 11:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esiwes`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `countryid` int(255) NOT NULL,
  `countryname` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countryid`, `countryname`) VALUES
(1, 'AFGHANISTAN'),
(2, 'ALBANIA'),
(3, 'ALGERIA'),
(4, 'ANDORRA'),
(5, 'ANGUILLA'),
(7, 'ARGENTINA'),
(8, 'ARMENIA'),
(9, 'ARUBA'),
(10, 'AUSTRALIA'),
(11, 'AUSTRIA'),
(12, 'AZERBAIJAN'),
(13, 'AZORES'),
(14, 'BAHAMAS'),
(15, 'BAHRAIN'),
(16, 'BANGLADESH'),
(17, 'BARBADOS'),
(18, 'BELGIUM'),
(19, 'BELIZE'),
(20, 'BENIN'),
(21, 'BERMUDA'),
(22, 'BHUTAN'),
(23, 'BOLIVIA'),
(24, 'BOSNIA'),
(25, 'BOTSWANA'),
(26, 'BRAZIL'),
(28, 'BRUNEI'),
(29, 'BULGARIA'),
(30, 'BURKINA FASO'),
(31, 'BURUNDI'),
(32, 'BYELARUS'),
(33, 'CAMBODIA'),
(34, 'CAMEROON'),
(35, 'CANADA'),
(36, 'CANARY ISLANDS'),
(37, 'CAPE VERDE'),
(38, 'CAYMAN ISLANDS'),
(40, 'CHAD'),
(41, 'CHILE'),
(42, 'CHINA'),
(43, 'COLOMBIA'),
(44, 'COMOROS'),
(45, 'CONGO BRAZZAVILLE'),
(46, 'CORAL SEA ISLANDS'),
(47, 'COSTA RICA'),
(48, 'COTE DIVOIRE'),
(49, 'CROATIA'),
(50, 'CUBA'),
(51, 'CYPRUS'),
(52, 'CZECH REPUBLIC'),
(53, 'DENMARK'),
(54, 'DJIBOUTI'),
(55, 'DOMINICA'),
(56, 'DOMINICAN REPUBLIC'),
(57, 'ECUADOR'),
(58, 'EGYPT'),
(59, 'EL SALVADOR'),
(60, 'EQUATORIAL GUINEA'),
(61, 'ERITREA'),
(62, 'ESTONIA'),
(63, 'ETHIOPIA'),
(64, 'FIJI'),
(65, 'FINLAND'),
(66, 'FRANCE'),
(67, 'FRENCH GUIANA'),
(68, 'FRENCH POLYNESIA'),
(69, 'GABON'),
(70, 'GAMBIA'),
(71, 'GAZA STRIP'),
(72, 'GEORGIA'),
(73, 'GERMANY'),
(74, 'GHANA'),
(75, 'GREECE'),
(76, 'GREENLAND'),
(77, 'GRENADA'),
(78, 'GUADELOUPE'),
(79, 'GUAM'),
(80, 'GUATEMALA'),
(81, 'GUINEA'),
(82, 'GUINEA-BISSAU'),
(83, 'GUYANA'),
(84, 'HAITI'),
(85, 'HONDURAS'),
(86, 'HONG KONG'),
(87, 'HUNGARY'),
(88, 'ICELAND'),
(89, 'INDIA'),
(90, 'INDONESIA'),
(91, 'IRAN'),
(92, 'IRAQ'),
(93, 'IRELAND'),
(94, 'ISRAEL'),
(95, 'ITALY'),
(96, 'JAMAICA'),
(97, 'JAPAN'),
(98, 'JORDAN'),
(100, 'KENYA'),
(101, 'KIRIBATI'),
(102, 'KOREA'),
(103, 'KOREA, REPUBLIC OF'),
(104, 'KUWAIT'),
(105, 'KYRGYZSTAN'),
(106, 'LAOS'),
(107, 'LATVIA'),
(108, 'LEBANON'),
(110, 'LESOTHO'),
(111, 'LIBYA'),
(112, 'LIECHTENSTEIN'),
(113, 'LITHUANIA'),
(114, 'LUXEMBOURG'),
(115, 'MACAU'),
(116, 'MACEDONIA'),
(117, 'MADAGASCAR'),
(118, 'MALAWI'),
(119, 'MALAYSIA'),
(120, 'MALDIVES'),
(121, 'MALI'),
(122, 'MALTA & GOZO'),
(123, 'MARSHAL ISLANDS'),
(124, 'MARTINIQUE'),
(125, 'MAURITANIA'),
(126, 'MAURITIUS'),
(127, 'MEXICO'),
(128, 'MICRONESIA'),
(129, 'MIDWAY ISLANDS'),
(130, 'MOLDOVA'),
(131, 'MONACO'),
(132, 'MONGOLIA'),
(133, 'MONTENEGRO'),
(134, 'MOROCCO'),
(135, 'MOZAMBIQUE'),
(136, 'MYANMAR'),
(137, 'NAMIBIA'),
(138, 'NAURU'),
(139, 'NEPAL'),
(140, 'NETHERLANDS'),
(142, 'NEW ZEALAND'),
(143, 'NICARAGUA'),
(144, 'NIGER'),
(145, 'NIGERIA'),
(146, 'NIUE'),
(147, 'OMAN'),
(148, 'PAKISTAN'),
(149, 'PALAU'),
(150, 'PANAMA'),
(151, 'PAPUA NEW GUINEA'),
(152, 'PARAGUAY'),
(153, 'PERU'),
(154, 'PHILIPPINES'),
(155, 'PITCAIRN ISLANDS'),
(156, 'POLAND'),
(157, 'PORTUGAL'),
(158, 'PUERTO RICO'),
(159, 'QATAR'),
(160, 'ROMANIA'),
(161, 'RUSSIA'),
(162, 'RWANDA'),
(163, 'SAO TAMOE'),
(164, 'SAUDI ARABIA'),
(165, 'SENEGAL'),
(166, 'SERBIA'),
(167, 'SEYCHELLES'),
(168, 'SIERRA LEONE'),
(169, 'SINGAPORE'),
(170, 'SLOVAKIA'),
(171, 'SLOVENIA'),
(172, 'SOLOMON ISLANDS'),
(173, 'SOMALIA'),
(174, 'SOUTH AFRICA'),
(175, 'SPAIN'),
(176, 'SRI LANKA'),
(177, 'ST. LUCIA'),
(179, 'SUDAN'),
(180, 'SURINAME'),
(181, 'SWAZILAND'),
(182, 'SWEDEN'),
(183, 'SWITZERLAND'),
(184, 'SYRIA'),
(185, 'TAIWAN'),
(186, 'TAJIKISTAN'),
(187, 'TANZANIA'),
(188, 'THAILAND'),
(189, 'TOGO'),
(190, 'TONGA'),
(192, 'TUNISIA'),
(193, 'TURKEY'),
(194, 'TURKMENISTAN'),
(195, 'UGANDA'),
(196, 'UKRAINE'),
(197, 'U.A.E'),
(198, 'UNITED KINGDOM'),
(199, 'UNITED STATES'),
(200, 'URUGUAY'),
(201, 'UZBEKISTAN'),
(203, 'VENEZUELA'),
(204, 'VIETNAM'),
(205, 'VIETNAM, NORTH'),
(208, 'WEST BANK'),
(209, 'WESTERN SAHARA'),
(210, 'WESTERN SAMOA'),
(211, 'YEMEN'),
(212, 'ZAIRE'),
(213, 'ZAMBIA'),
(214, 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `logbookId` int(255) NOT NULL,
  `logbookMat` varchar(255) NOT NULL,
  `logbookDesc` text NOT NULL,
  `logbookAttach` varchar(255) NOT NULL,
  `logbookComment` text NOT NULL,
  `logDeleteReason` varchar(255) NOT NULL,
  `logbookDelete` varchar(255) NOT NULL,
  `logbookDate` date NOT NULL,
  `logbookTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`logbookId`, `logbookMat`, `logbookDesc`, `logbookAttach`, `logbookComment`, `logDeleteReason`, `logbookDelete`, `logbookDate`, `logbookTime`) VALUES
(3, '150523', '<p>just testing again</p>', '150523 2023_05_16 11_05_02 cu120069 2015-05-17 (49).pdf', '', '', '', '2023-05-16', '2011-05-01 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reglist`
--

CREATE TABLE `reglist` (
  `matno` int(255) NOT NULL,
  `fno` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `yog` int(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `studentshipStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reglist`
--

INSERT INTO `reglist` (`matno`, `fno`, `fname`, `sname`, `mname`, `sex`, `college`, `dept`, `program`, `yog`, `level`, `studentshipStatus`) VALUES
(150523, 150523, 'James', 'Bond', '', 'Male', '', '', 'Computer Science', 2023, '300', '');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(255) NOT NULL,
  `roleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `roleName`) VALUES
(1, 'Super Admin'),
(2, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `siwespost`
--

CREATE TABLE `siwespost` (
  `siwesPostId` int(255) NOT NULL,
  `siwesOfficer` varchar(255) NOT NULL,
  `siwesMat` varchar(255) NOT NULL,
  `siwesCompName` varchar(255) NOT NULL,
  `siwesCompAdd` text NOT NULL,
  `siwesCompCountry` varchar(255) NOT NULL,
  `siwesCompState` varchar(255) NOT NULL,
  `siwesCompDate` date NOT NULL,
  `siwesCompTime` time NOT NULL,
  `siwesCompLetter` varchar(255) NOT NULL,
  `siwesSupervisor` varchar(255) NOT NULL,
  `siwesSupervisorNo` varchar(255) NOT NULL,
  `siwesSupervisorSkype` varchar(255) NOT NULL,
  `siwesStudentSkype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siwespost`
--

INSERT INTO `siwespost` (`siwesPostId`, `siwesOfficer`, `siwesMat`, `siwesCompName`, `siwesCompAdd`, `siwesCompCountry`, `siwesCompState`, `siwesCompDate`, `siwesCompTime`, `siwesCompLetter`, `siwesSupervisor`, `siwesSupervisorNo`, `siwesSupervisorSkype`, `siwesStudentSkype`) VALUES
(1, '50001', '150523', 'Lafarge', '27b Gerrard Road, Ikoyi 100261, Lagos', 'Nigeria', 'Lagos', '2023-05-08', '00:00:00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `stafflist`
--

CREATE TABLE `stafflist` (
  `staffId` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `college` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stafflist`
--

INSERT INTO `stafflist` (`staffId`, `fname`, `sname`, `mname`, `sex`, `college`, `dept`, `program`) VALUES
(50001, 'Tunji', 'James', '', 'Male', '', '', ''),
(90001, 'Major', 'Major', '', 'Male', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `staffrole`
--

CREATE TABLE `staffrole` (
  `staffRoleId` int(255) NOT NULL,
  `staffNum` varchar(255) NOT NULL,
  `staffRoleNo` int(255) NOT NULL,
  `loginTime` datetime NOT NULL,
  `staffDelete` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffrole`
--

INSERT INTO `staffrole` (`staffRoleId`, `staffNum`, `staffRoleNo`, `loginTime`, `staffDelete`) VALUES
(1, '90001', 1, '2023-05-16 00:46:19', ''),
(4, '50001', 2, '2023-05-16 11:07:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`stateid`, `statename`) VALUES
(1, 'Abuja'),
(2, 'Abia'),
(3, 'Adamawa'),
(4, 'Akwa Ibom'),
(5, 'Anambra'),
(6, 'Bauchi'),
(7, 'Bayelsa'),
(8, 'Benue'),
(9, 'Borno'),
(10, 'Cross River'),
(11, 'Delta'),
(12, 'Ebonyi'),
(13, 'Edo'),
(14, 'Ekiti'),
(15, 'Enugu'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nassarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(30, 'Osun'),
(29, 'Ondo'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`logbookId`);

--
-- Indexes for table `reglist`
--
ALTER TABLE `reglist`
  ADD PRIMARY KEY (`matno`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `siwespost`
--
ALTER TABLE `siwespost`
  ADD PRIMARY KEY (`siwesPostId`);

--
-- Indexes for table `stafflist`
--
ALTER TABLE `stafflist`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `staffrole`
--
ALTER TABLE `staffrole`
  ADD PRIMARY KEY (`staffRoleId`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`stateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `countryid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `logbookId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siwespost`
--
ALTER TABLE `siwespost`
  MODIFY `siwesPostId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stafflist`
--
ALTER TABLE `stafflist`
  MODIFY `staffId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90002;

--
-- AUTO_INCREMENT for table `staffrole`
--
ALTER TABLE `staffrole`
  MODIFY `staffRoleId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
