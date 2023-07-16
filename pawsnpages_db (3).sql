-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 05:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawsnpages_db`
--
CREATE DATABASE IF NOT EXISTS `pawsnpages_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pawsnpages_db`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(11) NOT NULL,
  `LotNo_Street` varchar(1000) NOT NULL,
  `Barangay` varchar(100) NOT NULL,
  `City` varchar(200) NOT NULL,
  `Province` varchar(200) NOT NULL,
  `ZIPCode` varchar(20) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`AddressID`, `LotNo_Street`, `Barangay`, `City`, `Province`, `ZIPCode`, `UserID`) VALUES
(1, '220 Katipunan Ave, Project 4', 'Blue Ridge A', 'Quezon City', 'NCR', '1109 ', 2),
(6, '3124 Limay Street', '137404139', 'Quezon City', 'NCR', '1012', 11),
(12, '3509 Taft Avenue', 'Amihan', 'Quezon City', 'NCR', '1234', 14),
(22, '123 Bahay ni Ning', 'Ni Ning', 'City Ning', 'Kusing', '1111', 20),
(23, 'Zinnia Towers', 'Katipunan', 'Quezon City', 'NCR', '1105', 21),
(24, 'Zinnia Towers 3', 'Blue Ridge B', 'Quezon City', 'NCR', '3443', 22),
(25, 'Sample Towers 2', 'Blue Ridge B', 'Quezon City', 'NCR', '1334', 23),
(29, '3124 Limay Street', 'Batasan Hills', 'Quezon City', 'NCR', '3455', 27),
(34, 'Janicabs Street', 'Blue Ridge B', 'Quezon City', 'NCR', '2341', 32),
(35, 'Manila Residences Tower 2', 'Botocan', 'Quezon City', 'NCR', '1004', 34),
(36, 'Manila Residences Tower 2', 'Blue Ridge A', 'Quezon City', 'NCR', '1004', 35),
(37, '12341', 'Aurora', 'Quezon City', 'NCR', '34534', 36),
(38, '1152 E Rodriguez Sr. Ave, New Manila,', 'Mariana', 'Quezon City', 'NCR', '1112', 37),
(39, '#3 T and K Bldg. Congressional Ave. EDSA', 'Del Monte', 'Quezon City', 'NCR', '1105', 38);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppointmentID` int(11) NOT NULL,
  `Notes` varchar(1000) DEFAULT NULL,
  `PreferredDate` date NOT NULL,
  `PreferredTime` time NOT NULL,
  `AppointmentStatus` varchar(100) DEFAULT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `AvailedServices` varchar(5000) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Appointment_RefNo` varchar(200) NOT NULL,
  `ClinicID` int(11) DEFAULT NULL,
  `DateTimeBooked` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`AppointmentID`, `Notes`, `PreferredDate`, `PreferredTime`, `AppointmentStatus`, `Remarks`, `AvailedServices`, `UserID`, `Appointment_RefNo`, `ClinicID`, `DateTimeBooked`) VALUES
(23, '', '2023-06-30', '09:00:00', 'Confirmed', '', 'Parasite Control', 2, 'PNP230627154', 1, '2023-06-27 06:32:21'),
(24, '', '2023-06-29', '21:40:00', 'Confirmed', '', 'Vaccination', 2, 'PNP23062756215', 1, '2023-06-27 06:37:23'),
(25, '', '2023-07-20', '13:00:00', 'Processing', '', 'Grooming, Parasite Control', 2, 'PNP23070144168', 1, '2023-07-01 01:32:39'),
(26, '', '2023-07-07', '13:00:00', 'Confirmed', '', 'Grooming', 2, 'PNP23070342603', 1, '2023-07-04 02:00:36'),
(27, '', '2023-07-09', '17:00:00', 'Processing', NULL, 'Vaccination', 2, 'PNP23070799193', 1, '2023-07-08 12:26:36'),
(28, '', '2023-07-15', '13:00:00', 'Processing', NULL, 'Grooming, Vaccination', 35, 'PNP23071346660', 1, '2023-07-13 12:27:00'),
(29, '', '2023-07-18', '07:00:00', 'Processing', NULL, 'Parasite Control', 36, 'PNP23071382385', 1, '2023-07-13 06:16:18'),
(30, 'fsedgs', '2023-07-21', '09:32:00', 'Processing', NULL, 'Parasite Control', 36, 'PNP23071312481', 1, '2023-07-13 07:33:04'),
(31, '', '2023-07-28', '13:00:00', 'Confirmed', '', 'Pet Export Assistance, Preventive Care', 35, 'PNP23071450702', 1, '2023-07-14 07:10:25'),
(32, '', '2023-07-22', '14:00:00', 'Cancelled', '', 'Pet Export Assistance', 35, 'PNP23071423045', 1, '2023-07-14 07:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE `barangay` (
  `BarangayID` int(11) NOT NULL,
  `BarangayName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`BarangayID`, `BarangayName`) VALUES
(1, 'Alicia'),
(2, 'Amihan'),
(3, 'Apolonio Samson'),
(4, 'Aurora'),
(5, 'Baesa'),
(6, 'Bagbag'),
(7, 'Bagong Lipunan Ng Crame'),
(8, 'Bagong Pag-asa'),
(9, 'Bagong Silangan'),
(10, 'Bagumbayan'),
(11, 'Bagumbuhay'),
(12, 'Bahay Toro'),
(13, 'Balingasa'),
(14, 'Balong Bato'),
(15, 'Batasan Hills'),
(16, 'Bayanihan'),
(17, 'Blue Ridge A'),
(18, 'Blue Ridge B'),
(19, 'Botocan'),
(20, 'Bungad'),
(21, 'Camp Aguinaldo'),
(22, 'Capri'),
(23, 'Central'),
(24, 'Claro'),
(25, 'Commonwealth'),
(26, 'Culiat'),
(27, 'Damar'),
(28, 'Damayan'),
(29, 'Damayang Lagi'),
(30, 'Del Monte'),
(31, 'Dioquino Zobel'),
(32, 'Doña Imelda'),
(33, 'Doña Josefa'),
(34, 'Don Manuel'),
(35, 'Duyan-Duyan'),
(36, 'East Kamias'),
(37, 'E. Rodriguez'),
(38, 'Escopa I'),
(39, 'Escopa II'),
(40, 'Escopa III'),
(41, 'Escopa IV'),
(42, 'Fairview'),
(43, 'Greater Lagro'),
(44, 'Gulod'),
(45, 'Holy Spirit'),
(46, 'Horseshoe'),
(47, 'Immaculate Concepcion'),
(48, 'Kaligayahan'),
(49, 'Kalusugan'),
(50, 'Kamuning'),
(51, 'Katipunan'),
(52, 'Kaunlaran'),
(53, 'Kristong Hari'),
(54, 'Krus Na Ligas'),
(55, 'Laging Handa'),
(56, 'Libis'),
(57, 'Lourdes'),
(58, 'Loyola Heights'),
(59, 'Maharlika'),
(60, 'Malaya'),
(61, 'Mangga'),
(62, 'Manresa'),
(63, 'Mariana'),
(64, 'Mariblo'),
(65, 'Marilag'),
(66, 'Masagana'),
(67, 'Masambong'),
(68, 'Matandang Balara'),
(69, 'Milagrosa'),
(70, 'Nagkaisang Nayon'),
(71, 'Nayong Kanluran'),
(72, 'New Era (Constitution Hills)'),
(73, 'North Fairview'),
(74, 'Novaliches Proper'),
(75, 'N.S. Amoranto (Gintong Silahis)'),
(76, 'Obrero'),
(77, 'Old Capitol Site'),
(78, 'Paang Bundok'),
(79, 'Pag-ibig Sa Nayon'),
(80, 'Paligsahan'),
(81, 'Paltok'),
(82, 'Pansol'),
(83, 'Paraiso'),
(84, 'Pasong Putik Proper (Pasong Putik)'),
(85, 'Pasong Tamo'),
(86, 'Payatas'),
(87, 'Phil-Am'),
(88, 'Pinagkaisahan'),
(89, 'Pinyahan'),
(90, 'Project 6'),
(91, 'Quirino 2-A'),
(92, 'Quirino 2-B'),
(93, 'Quirino 2-C'),
(94, 'Quirino 3-A'),
(95, 'Ramon Magsaysay'),
(96, 'Roxas'),
(97, 'Sacred Heart'),
(98, 'Saint Ignatius'),
(99, 'Saint Peter'),
(100, 'Salvacion'),
(101, 'San Agustin'),
(102, 'San Antonio'),
(103, 'San Bartolome'),
(104, 'Sangandaan'),
(105, 'San Isidro'),
(106, 'San Isidro Labrador'),
(107, 'San Jose'),
(108, 'San Martin De Porres'),
(109, 'San Roque'),
(110, 'Santa Cruz'),
(111, 'Santa Lucia'),
(112, 'Santa Monica'),
(113, 'Santa Teresita'),
(114, 'Santo Cristo'),
(115, 'Santo Domingo (Matalahib)'),
(116, 'Santol'),
(117, 'Santo Niño'),
(118, 'San Vicente'),
(119, 'Sauyo'),
(120, 'Sienna'),
(121, 'Sikatuna Village'),
(122, 'Silangan'),
(123, 'Socorro'),
(124, 'South Triangle'),
(125, 'Tagumpay'),
(126, 'Talayan'),
(127, 'Talipapa'),
(128, 'Tandang Sora'),
(129, 'Tatalon'),
(130, 'Teachers Village East'),
(131, 'Teachers Village West'),
(132, 'Ugong Norte'),
(133, 'Unang Sigaw'),
(134, 'U.P. Campus'),
(135, 'U.P. Village'),
(136, 'Valencia'),
(137, 'Vasra'),
(138, 'Veterans Village'),
(139, 'Villa Maria Clara'),
(140, 'West Kamias'),
(141, 'West Triangle'),
(142, 'White Plains');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `ClinicID` int(11) NOT NULL,
  `ClinicName` varchar(250) NOT NULL,
  `ClinicImage` varchar(500) NOT NULL,
  `BusinessPermit` varchar(500) NOT NULL,
  `BusinessNameReg` varchar(500) NOT NULL,
  `CertificateOfReg` varchar(500) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `SubscriptionNo` varchar(200) DEFAULT NULL,
  `SubscriptionType` varchar(200) NOT NULL,
  `DateOfSubscription` date DEFAULT NULL,
  `ExpiryDateOfSub` date DEFAULT NULL,
  `SubscriptionStatus` varchar(200) DEFAULT NULL,
  `OpeningTime` time NOT NULL,
  `ClosingTime` time NOT NULL,
  `OperatingDays` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`ClinicID`, `ClinicName`, `ClinicImage`, `BusinessPermit`, `BusinessNameReg`, `CertificateOfReg`, `UserID`, `SubscriptionNo`, `SubscriptionType`, `DateOfSubscription`, `ExpiryDateOfSub`, `SubscriptionStatus`, `OpeningTime`, `ClosingTime`, `OperatingDays`) VALUES
(1, 'Vets In Practice', 'vip-qc.png', '', '', '', 2, 'SUBNO1232', 'Monthly', '2023-07-06', '2023-08-06', 'Active', '08:00:00', '20:00:00', 'Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday'),
(2, 'Hello Clinic', '', '', '', '', 3, 'SUBNO8947', '', '0000-00-00', '0000-00-00', 'Inactive', '08:00:00', '20:00:00', 'Sunday, Monday, Tuesday, Wednesday, Thursday, Friday'),
(5, 'Ospital ng Maynila', '', 'boba u4 silent tactile.png', 'xv sti kit catalog.pdf', '111021944_1000752330359701_9174086897199949797_n.png', 11, 'SUBNO94576', 'Monthly', '0000-00-00', '0000-00-00', 'Inactive', '08:00:00', '20:00:00', 'Sunday, Monday, Tuesday, Wednesday, Thursday, Friday'),
(9, 'Charina Veterinary Clinic', 'boba u4 silent tactile.png', 'brutal60 wkl.png', 'buwaya.jpg', 'Bootstrap-Checklist.jpg', 22, 'PNPSUB51995', 'Monthly', NULL, NULL, 'Inactive', '08:00:00', '17:00:00', 'Monday, Tuesday, Wednesday, Thursday, Friday'),
(10, 'Samples 2 Clinic', 'brutal60 wkl.png', 'boba u4 silent tactile.png', 'Bootstrap-Checklist.jpg', '111021944_1000752330359701_9174086897199949797_n.png', 23, 'PNPSUB19340', 'Annually', NULL, NULL, 'Inactive', '05:00:00', '17:00:00', 'Tuesday, Thursday, Saturday'),
(14, 'SMO Clinic', '283966880_8367795423246259_4702970044629262241_n.jpg', 'IMG_5184-1024x673.jpg', '2008_subaru_forester_sports_xt_15650743965d565ef66e7dffDSC_0966-1320x880.jpg', '308870988_928388228549817_1811241137682632162_n.jpg', 27, 'PNPSUB74134', 'Annually', NULL, NULL, 'Inactive', '08:00:00', '18:00:00', 'Monday, Wednesday, Friday, Saturday'),
(19, 'Metropolitan Vet Clinic', 'metrovc.jpg', 'MVH_BuildingSM.png', 'MVH_BuildingSM.png', 'MVH_BuildingSM.png', 37, 'PNPSUB87391', 'Annually', '0000-00-00', '0000-00-00', 'Active', '08:00:00', '20:00:00', 'Monday, Tuesday, Wednesday, Thursday, Friday'),
(20, 'Doc Ferds Animal Wellness', 'ferds.png', 'ferds.png', 'ferds.png', 'ferds.png', 38, 'PNPSUB26685', 'Annually', '0000-00-00', '0000-00-00', 'Active', '08:00:00', '18:00:00', 'Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_billing`
--

CREATE TABLE `clinic_billing` (
  `BillingID` int(11) NOT NULL,
  `BillingImage` varchar(1000) DEFAULT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clinic_billing`
--

INSERT INTO `clinic_billing` (`BillingID`, `BillingImage`, `ClinicID`) VALUES
(1, 'ferds_gcash.jpg', 20),
(4, 'ferds_gcash.jpg', 20),
(5, 'meto_gcash.jpg', 19),
(6, 'vipqcqr.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `Rating` float NOT NULL,
  `OverallFeedback` varchar(5000) DEFAULT NULL,
  `DateTimeRated` datetime DEFAULT NULL,
  `ClinicID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `Rating`, `OverallFeedback`, `DateTimeRated`, `ClinicID`, `UserID`, `OrderID`) VALUES
(2, 5, NULL, '2023-07-13 03:35:24', 1, 2, 13),
(3, 5, NULL, '2023-07-13 11:51:34', 1, 2, 4),
(4, 4, 'Very nice!', '2023-07-13 11:53:31', 1, 2, 6),
(5, 5, 'great!', '2023-07-13 07:17:30', 19, 35, 26);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailsID` int(11) NOT NULL,
  `SupplyID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailsID`, `SupplyID`, `UserID`, `Quantity`, `Price`, `ClinicID`) VALUES
(74, 16, 36, 1, 500.00, 1),
(75, 27, 37, 1, 129.00, 19),
(77, 31, 35, 2, 718.00, 19),
(78, 28, 37, 1, 99.00, 19),
(80, 46, 38, 1, 899.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `Order_RefNo` varchar(250) DEFAULT NULL,
  `OrderedProducts` varchar(5000) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `DateTimeCheckedOut` datetime NOT NULL,
  `ShippingTo` varchar(2000) NOT NULL,
  `ProofOfPayment` varchar(1000) NOT NULL,
  `Proof_RefNo` varchar(200) NOT NULL,
  `OrderPrescription` varchar(1000) DEFAULT NULL,
  `OrderStatus` varchar(500) DEFAULT NULL,
  `OrderRemarks` varchar(1000) DEFAULT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Order_RefNo`, `OrderedProducts`, `UserID`, `TotalPrice`, `DateTimeCheckedOut`, `ShippingTo`, `ProofOfPayment`, `Proof_RefNo`, `OrderPrescription`, `OrderStatus`, `OrderRemarks`, `ClinicID`) VALUES
(1, 'ODRN23062759917', '(7x) Leash, (2x) Testing 1, (14x) Testing 2, (7x) Testing 3, ', 2, 56361.00, '2023-06-27 05:56:02', 'B12 L14 Regency Drive Street, Sampaloc II, Dasmarinas, Cavite, 4114', 'Coquilla-PROJ3(Part 1).JPG', 'GCASH1234', NULL, 'Order Received', NULL, 1),
(3, 'ODRN23062871917', '(7x) Leash, (14x) Testing 2, (7x) Testing 3, ', 2, 53361.00, '2023-06-28 12:14:23', '4489 Limay Avenue, NCR, Quezon City, Botocan, 5565', 'IMG_2803.JPG', 'GCASH9807', NULL, 'Pending', NULL, 1),
(4, 'ODRN23062857148', '(7x) Leash, (14x) Testing 2, ', 2, 31500.00, '2023-06-28 12:16:05', 'B13 L15 Sultan Sanctum Street, White Plains, Quezon City, NCR, 1234', 'IMG_2804.JPG', 'GCASH98475', NULL, 'Completed', NULL, 1),
(5, 'ODRN23062889335', '(5x) Leash, ', 2, 1000.00, '2023-06-28 12:18:18', '7899 Roxas Crest, NCR, Quezon City, Blue Ridge A, 6755', 'Coquilla-PROJ3.JPG', 'GCASHFYEFGIE', NULL, 'Pending', NULL, 1),
(6, 'ODRN23062869', '(1x) Leash, (3x) Testing 2, (15x) Test test, ', 2, 60500.00, '2023-06-28 05:53:41', 'B12 L14 Regency Drive Street, Sampaloc II, Dasmarinas, Cavite, 4114', 'IMG_2804.JPG', 'GCASH1234', NULL, 'Completed', NULL, 1),
(7, 'ODRN23062872595', '(3x) Leash, ', 2, 600.00, '2023-06-28 06:04:32', '7899 Roxas Crest, NCR, Quezon City, Blue Ridge A, 6755', 'Coquilla-PROJ3 (Part 2).JPG', 'GCASHFYEFGIE', NULL, 'Denied', NULL, 1),
(8, 'ODRN23062878528', '(6x) Testing 2, ', 2, 12900.00, '2023-06-28 06:08:27', '4489 Limay Avenue, NCR, Quezon City, Botocan, 5565', 'Coquilla-PROJ3(Part 1).JPG', 'GCASH1234', NULL, 'Completed', NULL, 1),
(9, 'ODRN23062862683', '(2x) Leash, ', 2, 400.00, '2023-06-28 06:12:27', '4489 Limay Avenue, NCR, Quezon City, Botocan, 5565', 'Coquilla-PROJ3(Part 1).JPG', 'GCASH98475', NULL, 'Pending', NULL, 1),
(10, 'ODRN23062850545', '(2x) Leash, ', 2, 400.00, '2023-06-28 06:13:13', '4489 Limay Avenue, NCR, Quezon City, Botocan, 5565', 'Coquilla-PROJ3(Part 1).JPG', 'GCASH98475', NULL, 'Pending', NULL, 1),
(11, 'ODRN23062899312', '(20x) Test test, ', 2, 71800.00, '2023-06-28 06:15:04', 'B12 L14 Regency Drive Street, Sampaloc II, Dasmarinas, Cavite, 4114', 'Coquilla-PROJ3(Part 1).JPG', 'GCASHFYEFGIE', NULL, 'Pending', NULL, 1),
(12, 'ODRN23062878370', '(2x) Leash, (5x) Testing 2, (10x) Testing 3, ', 2, 42380.00, '2023-06-28 06:19:51', '4489 Limay Avenue, NCR, Quezon City, Botocan, 5565', 'Coquilla-PROJ3(Part 1).JPG', 'GCASHFYEFGIE', NULL, 'Pending', NULL, 1),
(13, 'ODRN23062890681', '(3x) Leash, ', 2, 600.00, '2023-06-28 06:21:58', '4489 Limay Avenue, NCR, Quezon City, Botocan, 5565', 'Coquilla-PROJ3(Part 1).JPG', 'GCASH9807', NULL, 'Completed', NULL, 1),
(14, 'ODRN23070128065', '(2x) Testing 2, ', 11, 4300.00, '2023-07-01 12:56:20', '3124 Limay Street, 137404139, Quezon City, NCR, 1012', 'boba u4 silent tactile.png', 'GCASH98475', NULL, 'To Ship', NULL, 1),
(15, 'ODRN2307012995', '(1x) Testing 3, (5x) Leash, ', 2, 4123.00, '2023-07-01 01:30:04', 'B12 L14 Regency Drive Street, Camp Aguinaldo, Quezon City, NCR, 4114', 'Bootstrap-Checklist.jpg', 'GCASH1234', NULL, 'Pending', NULL, 1),
(16, 'ODRN23070316332', '(7x) Testing 2, ', 2, 15050.00, '2023-07-03 06:00:10', 'B12 L14 Regency Drive Street, Camp Aguinaldo, Quezon City, NCR, 4114', 'xv sti kit catalog.pdf', 'GCASH1234', NULL, 'Pending', NULL, 1),
(17, 'ODRN23070493873', '(4x) leashyleash, (8x) Testing 2, ', 2, 19200.00, '2023-07-04 02:48:32', '', 'applications.html', 'GCASH98475', NULL, 'Pending', NULL, 1),
(18, 'ODRN23070425889', '(3x) Testing 3, ', 2, 9369.00, '2023-07-04 03:04:16', '', 'favicon.ico', 'GCASH98475', NULL, 'Pending', NULL, 1),
(19, 'ODRN23070433786', '(4x) Test test, ', 2, 14360.00, '2023-07-04 03:07:36', 'Blk. 12 Lt. 14 Regency Executive Townhomes, NCR, Quezon City, Bungad, 4114', 'index.php', 'GCASHFYEFGIE', NULL, 'Pending', NULL, 1),
(20, 'ODRN23070463858', '(2x) Hello, ', 2, 71810.00, '2023-07-04 03:21:07', 'Manila Residences Tower 2, NCR, Quezon City, , 1004', 'favicon.ico', 'GCASHFYEFGIE', NULL, 'Pending', NULL, 1),
(21, 'ODRN23071320722', '(1x) leashyleash, (2x) Testing 2, ', 2, 4800.00, '2023-07-13 02:32:56', 'B12 L14 Regency Drive Street, Escopa I, Quezon City, NCR, 4114', 'IMG_5187-1024x683.jpg', 'GCASH1234', '119563488_3555066684514313_4594871893662924149_n.jpg', 'Pending', NULL, 1),
(22, 'ODRN23071382903', '(4x) leashyleash, ', 2, 2000.00, '2023-07-13 11:43:19', 'B12 L14 Regency Drive Street, Escopa I, Quezon City, NCR, 4114', '119563488_3555066684514313_4594871893662924149_n.jpg', 'asdasdasd', '119563488_3555066684514313_4594871893662924149_n.jpg', 'Pending', NULL, 1),
(23, 'ODRN23071314842', '(2x) Testing 2, (3x) Testing 3, ', 2, 13669.00, '2023-07-13 11:44:33', 'B12 L14 Regency Drive Street, Escopa I, Quezon City, NCR, 4114', '308870988_928388228549817_1811241137682632162_n.jpg', 'GCASH1234', '79771315_2871373759550279_5194240337186390016_n.jpg', 'Approved', NULL, 1),
(24, 'ODRN23071356931', '(4x) Test test, ', 2, 14360.00, '2023-07-13 11:55:03', 'B12 L14 Regency Drive Street, Escopa I, Quezon City, NCR, 4114', '93013842_3131008436920142_5528901233953210368_n.jpg', 'GCASH98475', 'IMG_5187-1024x683.jpg', 'Denied', NULL, 1),
(25, 'ODRN23071372377', '(8x) Hello, ', 35, 287240.00, '2023-07-13 12:14:38', 'Manila Residences Tower 2, Blue Ridge A, Quezon City, NCR, 1004', '283966880_8367795423246259_4702970044629262241_n.jpg', 'GCASH98475', 'IMG_5184-1024x673.jpg', 'Approved', NULL, 1),
(26, 'ODRN23071338518', '(6x) Doggo Pet Brush Bristle and Metal Pin Non-Slip Han, ', 35, 2154.00, '2023-07-13 07:14:56', 'Manila Residences Tower 2, Blue Ridge A, Quezon City, NCR, 1004', '2.png', '3525255', '4.png', 'Completed', NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `petassessment`
--

CREATE TABLE `petassessment` (
  `AssessmentID` int(11) NOT NULL,
  `Remarks` varchar(5000) NOT NULL,
  `DateAssessed` date NOT NULL,
  `AssessedBy` varchar(1000) DEFAULT NULL,
  `Prescription` varchar(1000) DEFAULT NULL,
  `PetID` int(11) DEFAULT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petassessment`
--

INSERT INTO `petassessment` (`AssessmentID`, `Remarks`, `DateAssessed`, `AssessedBy`, `Prescription`, `PetID`, `ClinicID`) VALUES
(1, 'healthy', '2023-06-14', 'hehehe', NULL, 11, NULL),
(2, 'ertertertdfgdfg', '2023-06-14', 'sdfgsdg', 'retro PC.png', 4, 2),
(3, 'sample', '2023-06-17', 'bian bian', NULL, 16, 5),
(4, 'Healthy, no difficulty in breathing at all, very nice heartbeat', '2023-07-04', 'Czarina Bianca', 'Bootstrap-Checklist.jpg', 30, 1),
(9, 'Hello!', '2023-07-05', 'Czarina Bianca', 'pawsnpages_db.sql.zip', 30, 1),
(10, 'Very good! Remarkable vitals', '2023-06-30', 'Patrick Allan', 'brutal60 wkl.png', 31, 1),
(11, 'She has a flu, gave antibiotics ', '2023-07-16', 'Julio Ros', 'amoxiclav.jpeg', 33, 19);

-- --------------------------------------------------------

--
-- Table structure for table `petbooklet`
--

CREATE TABLE `petbooklet` (
  `BookletID` int(11) NOT NULL,
  `Payment_Proof` varchar(500) NOT NULL,
  `RefNo_Input` varchar(200) NOT NULL,
  `NoOfPets` int(11) NOT NULL,
  `AmountToPay` varchar(200) DEFAULT NULL,
  `PaymentStatus` varchar(200) NOT NULL,
  `Remarks` varchar(500) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petbooklet`
--

INSERT INTO `petbooklet` (`BookletID`, `Payment_Proof`, `RefNo_Input`, `NoOfPets`, `AmountToPay`, `PaymentStatus`, `Remarks`, `UserID`) VALUES
(1, 'Bootstrap-Checklist.jpg', 'GCASH1234', 0, '₱49.00', 'Pending', '', 2),
(2, 'Bootstrap-Checklist.jpg', 'GCASH1234', 2, '₱98.00', 'Pending', '', 7),
(3, 'buwaya.jpg', 'GCASH1234', 0, '₱49.00', 'Approved', '', 2),
(4, 'pawsnpages_db.sql.zip', 'GCASH1234', 1, '₱49.00', 'Pending', '', 2),
(5, '317805492_5980368191981502_6137864911419465180_n.jpg', '5895858', 8, '₱392.00', 'Approved', '', 36),
(6, 'rec.jpg', '47474774', 12, '₱588.00', 'Pending', '', 37),
(7, 'sxq1.jpg', '352523', 1, '₱98.00', 'Approved', '', 35);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `PetID` int(11) NOT NULL,
  `PetImage` varchar(1000) NOT NULL,
  `PetName` varchar(300) NOT NULL,
  `Species` varchar(200) NOT NULL,
  `Breed` varchar(200) NOT NULL,
  `BirthDate` date NOT NULL,
  `Color` varchar(150) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `PetUniqueID` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`PetID`, `PetImage`, `PetName`, `Species`, `Breed`, `BirthDate`, `Color`, `UserID`, `PetUniqueID`) VALUES
(1, '', 'Fluffy', 'Dog', 'Pomeranian', '2023-06-21', 'Cute Brown', 3, ''),
(4, 'boc.png', 'Zazzy', 'Dog', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(5, 'brutal60 wkl.png', 'Blake', 'Doggi', 'Pomeranianssss', '2019-01-01', 'Green', 2, ''),
(6, 'boba u4 silent tactile.png', 'Fluffy', 'Doggi', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(7, '', 'Bronnie', 'Doggi', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(8, '', 'Muji', 'Dog', 'Chow-chow', '0000-00-00', 'Beige', 3, ''),
(10, '', 'Lexy', 'Doggi', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(11, '', 'Gilbvs', 'Doggi', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(12, '', 'Gilbs', 'IDK', 'Hehe', '0000-00-00', 'Bornw', 3, ''),
(15, '', 'Bian', 'Doggi', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(16, '111021944_1000752330359701_9174086897199949797_n.png', 'Janicabicabs', 'Doggi', 'Pomeranian', '2019-01-01', 'Green', 2, ''),
(30, 'buwaya.jpg', 'Janicabs', 'Canine', 'Dog', '2019-01-01', 'Black', 2, 'PNPYXA41034'),
(31, 'buwaya.jpg', 'Gilbs', 'Crocodile', 'IDK', '2019-01-01', 'Black', 2, 'PNPTAE68163'),
(32, 'favicon.ico', 'Bagong Pet', 'Dogidog', 'Pomeranian', '2003-11-01', 'Black', 2, 'PNPSOW44703'),
(33, '2lah.jpg', 'Thullah', 'dog', 'beagle', '2023-07-05', 'white', 35, 'PNPFZM96077');

-- --------------------------------------------------------

--
-- Table structure for table `petsupplies`
--

CREATE TABLE `petsupplies` (
  `SupplyID` int(11) NOT NULL,
  `SupplyImage` varchar(500) NOT NULL,
  `SupplyName` varchar(500) NOT NULL,
  `SupplyDescription` varchar(5000) NOT NULL,
  `SupplyPrice` decimal(10,2) NOT NULL,
  `Stocks` int(11) NOT NULL,
  `NeedPrescription` varchar(11) NOT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petsupplies`
--

INSERT INTO `petsupplies` (`SupplyID`, `SupplyImage`, `SupplyName`, `SupplyDescription`, `SupplyPrice`, `Stocks`, `NeedPrescription`, `ClinicID`) VALUES
(16, '27.png', 'Zee.Dog Vortex Fly Dog Harness', '2 straps quick fit system with one click put on and off design\r\nSmooth car-belt-like webbings\r\nSolid control handle for improved dog guidance in case of necessity\r\nRainbow reflective front strap and 360° reflective binding\r\n', 1895.00, 0, 'No', 1),
(27, '1.png', 'Pet Plus Bone Doggie Biscuits 200g Dog Treats', 'Great tasting and nutritious dog treats for your pets to enjoy.\r\nAvailable in different great flavors and shapes.', 129.00, 100, 'No', 19),
(28, '2.png', 'Play Pets Skin Doctor No More Itch 20mL', 'No More Itch-provides mild but quick relief from all kinds of skin irritations due to heat, insects, allergies, cuts and scratches.', 99.00, 3, 'No', 19),
(29, '3.png', 'Pet Plus Train and Reward 350g (Mix Sandwich Biscu', 'Ingredients: Cereals (wheat flour), oils and fats (poultry fat), various sugars, vitamins and minerals, meat and animal derivatives.', 184.00, 99, 'No', 19),
(30, '4.png', 'Play Pets Detangling Conditioner 1000ml For All Ty', 'Directions:\r\nSqueeze the bottle and put an ample amount of play pets shampoo with conditioner on your pet.\r\nLeave on for 3-5 minutes.\r\nEnjoy it’s bubbling and cleansing agent and rinse your pet very well.\r\n ', 418.00, 49, 'No', 19),
(31, '5.png', 'Doggo Pet Brush Bristle and Metal Pin Non-Slip Han', 'This doggo pet brush bristle and metal pin non-slip handle is a specially designed brush for pets that is both durable and comfortable.', 359.00, 9, 'No', 19),
(32, '6.png', 'Ocean Free XO Ever Red Enhance Strong Redness Deve', 'Feeding will increase the spread of redness on your flowerhorn. Redness can be more intense and brighter.', 399.00, 10, 'No', 19),
(36, '24.png', 'Best Friends by Sheri Meow Hut Gray Fur Covered Pet Bed', 'Made for the ultimate snuggling experience\r\nCan be used by dogs and cats (Small - up to 6.8kg weight; Medium - up to 11.3kg weight)\r\nPadded insert provides a soft and comfortable space for relaxation', 2450.00, 124, 'No', 1),
(37, '25.png', 'Taste of the Wild Canyon River with Trout and Smoked Salmon Grain-Free Cat Dry Food', 'MADE IN THE USA\r\nFormulated for all life stages of cats\r\nNO filler, artificial flavors, colors or preservatives\r\nNatural recipe with vitamins and antioxidants supports overall health\r\nWith omega-6 and omega-3 fatty acids to support healthy skin and shiny coat', 890.00, 13, 'No', 1),
(38, '10.png', 'Ruffsack Dale Navy Pet Backpack', 'Bark-pack and harness in 1', 1126.00, 5, 'No', 20),
(39, '11.png', 'Hamster Cage', 'Allows for expansion of critter trail habitats.\r\nIncludes variety of funnel Connector tubes and connector rings.\r\nFor hamsters, mice, gerbils or other small animals.\r\nEach kit contains everything you need to expand your critter trail home.\r\n', 349.00, 8, 'No', 20),
(40, '12.png', 'Whiskas Cat Food Dry Junior Ocean Fish Flavour With Milk 1.1kg', 'WHISKAS dry cat food is complete and balanced, specially designed to fulfil your cat’s needs at their life stage\r\nMilky Pockets - Crunchy on the outside with a creamy delicious texture in the centre. \r\nThe kibbles and pockets of WHISKAS Dry cat food will help promote their oral care\r\nEnriched with calcium and phosphorus, including vitamin D for healthy bone and body growth\r\nContains natural antioxidants based upon vitamin E for healthy immune system\r\nSelected quality protein and fat to provide energy for play.', 349.00, 150, 'No', 20),
(41, '13.png', 'Vitality High Energy Lamb And Beef Dry Dog Food, Promotes Shiny Coat And Healthy Skin Dog Food, Dry Dog Food', 'Vitality high energy is specially formulated to give growing and active dogs the best nutrition and the higher energy they need to maintain their active lifestyle.\r\nPower-up your puppy or active dog with the increased energy they need for growing strong muscles, quick reflexes, clear vision plus increased stamina.\r\nYour dog deserves vitality high energy dog food.', 274.00, 120, 'No', 20),
(42, '14.png', 'Doggo Rattan Ball Rubber with Bell (Large) Toy for Dog', 'Products made for you and your lovely doggos!\r\nDoggo : We are made to provide you with quality you deserve.\r\nFun, cute, love : Doggo, paw-fectly made!\r\nComfort and style : Quality products that instantly make you smile.', 189.00, 12, 'No', 20),
(43, '15.png', 'Michiko Flat Bone Aqua Blue', 'Made of durable rubber\r\nQuality toys for dogs\r\nDogs enjoy squeaky toys because they resemble real prey, the squeak and crinkle noise satisfies natural instincts and gives \"payoff\" for your pets hard work.', 184.00, 9, 'No', 20),
(44, '16.png', 'Floxabactin 15mg Tablets for Cats n Dogs', 'In cats: treatment of upper respiratory tract infections\r\n\r\nIn dogs: treatment of lower urinary tract infections (associated or not with prostatitis) and upper urinary tract infections caused by Escherichia coli or Proteus mirabilis, and treatment of superficial and deep pyoderma.', 499.00, 10, 'Yes', 20),
(45, '17.png', 'LC-Vit Syrup 120ml (Multivitamins) for Dogs and Cats', 'INDICATION\r\nImproves appetite and general health. Prevents and treats vitamin deficiencies during stress conditions in dogs, cats, poultry, rabbits, hamsters and chinchilla.\r\n\r\nDOSAGE AND ADMINISTRATION\r\nDogs & Cats: 1mL/5kg bodyweight\r\n\r\nRabbits/Hamster/Chinchilla:\r\n15 drops mixed in the drinking water\r\n\r\nPoultry: 5mL/liter of drinking water', 299.00, 99, 'No', 20),
(46, '18.png', 'Amoxibactin 250mg Tablets For Dogs and Cats', 'Treatment of primary and secondary infections of the airways, such as rhinitis caused by Pasteurella spp. and Streptococcus spp., and bronchopneumonia caused by Pasteurella spp., Escherichia coli and Gram-positive cocci. Treatment of primary infections of the urogenital tract, such as pyelonephritis and infections of the lower urinary tract caused by Escherichia coli, Proteus spp. and Gram-positive cocci, endometritis caused by Escherichia coli, Streptococcus canis and Proteus spp., and vaginitis as a result of mixed infections. Treatment of mastitis caused by Gram-positive cocci and Escherichia coli. Treatment of local skin infections caused by Streptococcus spp.', 899.00, 100, 'Yes', 20),
(47, '19.png', 'Papi Pyrantel Pet Dewormer (1 tablet)', 'COMPOSITION:\r\nPraziquantel – 40mg \r\nLevamisole HydroChloride – 35mg \r\n\r\nINDICATION: Levamisole has activity against roundworms (nematodes) specifically active against adults and larvae of most gastro-intestinal roundworms, lungworms, hookworms and whipworms. With it’s low-dose formulation, levamisole is easily excreted by pet hence, it is safe for use. Best of all, it has an immune-stimulating effect via a non-specific activation of lymphocyte function. Praziquantel is highly effective against tapeworms (cestodes). Following exposure of the tapeworms to the drug, it is readily digested and removed from the body of the animal. \r\n\r\nDOSAGE AND ADMINISTRATION: \r\nDogs – administer 1 tablet / 10kg body weight \r\nTreat dogs in hydatid areas every 6 weeks. \r\nFor the control of tapeworms – treat every 3 months \r\nFor the control of Roundworms and Hookworms – treat at 2, 4, 8 and 12 weeks of age and then every 3 months. \r\nFor Whipworms – treat every 6-8 weeks after 3 months of age. \r\n\r\nPRESENTATION: 1 tablet ', 99.00, 2, 'Yes', 20),
(48, '26.png', 'Purina Pro Plan Adult Urinary 1.5kg Cat Dry Food', 'MADE IN AUSTRALIA\r\nReal chicken #1 ingredient\r\nGuaranteed live probiotics for digestive and immune health\r\nHelps maintain urinary health by reducing urinary pH\r\nHelps protect teeth from plaque and tartar build-up\r\nMaintain healthy skin and glossy coat', 975.00, 76, 'No', 1),
(49, '28.png', 'Marine Lab 5kg Saltwater Mix', 'MADE IN THE USA\r\nNO Phosphate or Nitrate\r\nPerfect for marine fish only aquariums\r\nApproximately makes 31.25 L per 1 kg\r\n', 310.00, 20, 'No', 1),
(50, '29.png', 'Nursing Kit', 'for babies', 310.00, 33, 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `petvaccine`
--

CREATE TABLE `petvaccine` (
  `VaccineID` int(11) NOT NULL,
  `VaccineName` varchar(25) NOT NULL,
  `Brand` varchar(25) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Dosage` varchar(15) NOT NULL,
  `LotNo` varchar(15) NOT NULL,
  `DateVaccinated` date NOT NULL,
  `ExpirationDate` date NOT NULL,
  `Vaccinator` varchar(50) NOT NULL,
  `PetID` int(11) DEFAULT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petvaccine`
--

INSERT INTO `petvaccine` (`VaccineID`, `VaccineName`, `Brand`, `Description`, `Dosage`, `LotNo`, `DateVaccinated`, `ExpirationDate`, `Vaccinator`, `PetID`, `ClinicID`) VALUES
(1, 'sample', 'sample', 'asldkfjlsdkjfoiqwj', '199g', '102938shjdflk', '2023-06-15', '2023-06-29', 'hello', 11, NULL),
(2, 'eesdfwert', 'ertert', 'dfgdfgdf', 'dfg', 'ertter', '2023-06-08', '2023-06-30', 'esrger', 4, 2),
(3, 'Sample', 'Pfizer', 'Boosts immunity', '5 mg', '122A345489', '2023-07-03', '2023-07-30', 'John Gilbert', 30, 1),
(4, 'Sampler', 'Sinovac', 'Quite effective', '10 mg', 'ac123bnj', '2023-07-04', '2023-08-30', 'Allan Peter Baquiran', 31, 1),
(5, 'Anti-rabies', 'Nobivac', '', '1', '730830', '2023-07-16', '2024-07-04', 'Julio Ros', 33, 19);

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `Sender` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `DateTimeReported` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ReportID`, `Sender`, `Email`, `Title`, `Message`, `DateTimeReported`) VALUES
(1, 'test paz', 'shirleymaypaz@gmail.com', 'test', 'EIDTGHJNSWETGHNWSIKLOETG', '2023-07-13 07:19:48'),
(2, '3252sgtvsed', 'thullahnft@gmail.com', 'sedgtsedtgs', 'tgsrwtgswrtgsrtg', '2023-07-13 07:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `ServiceID` int(11) NOT NULL,
  `ServiceName` varchar(500) NOT NULL,
  `ServiceDescription` varchar(5000) NOT NULL,
  `ServicePrice` decimal(10,2) NOT NULL,
  `ClinicID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`ServiceID`, `ServiceName`, `ServiceDescription`, `ServicePrice`, `ClinicID`) VALUES
(1, 'Grooming', 'Improves pet\'s hygiene and well-being', 350.00, 1),
(2, 'Vaccination', 'Gives immunity to pets', 3000.00, 2),
(5, 'Parasite Control', 'To control parasite', 4500.00, 1),
(6, 'Vaccination', 'Vaccine', 1300.00, 1),
(8, 'Vaccination', 'Vaccine', 3200.00, 5),
(12, 'Grooming', 'Takes care of pets well-being', 499.00, 19),
(13, 'Vaccination', 'Boosts immunity of pets', 800.00, 19),
(14, 'Pet Check-in', 'Hotel for pets', 3500.00, 19),
(15, 'Pet Export Assistance', 'If you are planning on transporting your pets overseas, whether you are vacationing or relocating, we may be able to advise you on international quarantine regulations for your destination. We can also help fulfill the medical requirements for your pet’s travel, like rabies antibody titer testing, pre-departure preparation and veterinary certification.', 15000.00, 1),
(16, 'Preventive Care', 'Prevention is the key to your pet’s health. Our wellness programs start with a comprehensive physical exam and includes a vaccination program, internal and external parasite control and prevention, and advice on general pet care and nutrition for all life stages.', 8000.00, 1),
(19, 'Veterinary Consultation', 'with Doc Ferds', 1499.00, 20),
(20, 'Grooming Services', 'Experience top-notch pet grooming services at their finest with our professional Grooming Services. Our skilled and caring groomers are dedicated to pampering your furry companions, providing a range of services including bathing, haircuts, nail trimming, and more. Using gentle techniques and high-quality products, we ensure that your pets not only look their best but also feel comfortable and relaxed throughout the grooming process. Whether your pet needs a simple touch-up or a complete makeover, our Grooming Services deliver exceptional care, leaving your furry friends feeling refreshed and looking fabulous. Treat your pets to a spa-like experience they deserve with our reliable and personalized grooming services.', 899.00, 20),
(21, 'Pet Boarding', 'per Overnight Stay', 3999.00, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Birth_Date` date DEFAULT NULL,
  `UserType` varchar(50) NOT NULL,
  `Username` varchar(150) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DateTimeModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `MiddleName`, `LastName`, `ContactNo`, `Birth_Date`, `UserType`, `Username`, `Email`, `Password`, `DateTimeModified`) VALUES
(2, 'John Gilbert', 'Marababol', 'Coquilla', '09064254917', '2000-08-22', 'Clinic Administrator', 'gilbertcoquilla', 'jhnglbrt1922@gmail.com', '$2y$10$KqGmBRecL.tApsoVi/m66Oo17M14Yz3qTq/Uuz8OhuU.qK8VlnUHK', '2023-07-13 04:42:51'),
(3, 'Czarina Bianca', 'Pagdonsolan', 'Ongkingco', '09151879481', NULL, 'Administrator', 'czarinabianca', 'czarinabianca.ongkingco@benilde.edu.ph', '$2y$10$94LZeWWctM5jntI9IX1xQ.CX0A2sgjEE0M0w6zxeXgHpjkeJZNlK2', '2023-07-13 04:44:09'),
(5, 'Joshua', 'Lim', 'Coki', '0912', NULL, 'Pet Owner', 'joshcoki', 'joshcoki@gmail.com', '$2y$10$QWDgKGicUTg2vtWUEJMNFu4v/3zQikRVeqfltjTm7/OLaKjxO38gW', '2023-07-14 00:24:41'),
(7, 'Bryan', 'Coki', 'Phil', '0934', NULL, 'Pet Owner', 'brycoki', 'brycoki@gmail.com', '$2y$10$IzWQbz5arucUEJEh6dyTeO29Rfi0H95LTgYPXe62NSYF2uIYBAcDq', '2023-07-14 00:20:44'),
(8, 'jeg', 'mara', 'babol', '0123', NULL, 'Clinic Administrator', 'hehe', 'hehe@gmail.com', 'hehehe', NULL),
(9, 'Jegz', 'Marab', 'Coq', '0123', '0000-00-00', 'Pet Owner', 'jegz', 'jegz@gmail.com', 'jegz', NULL),
(10, 'Bian', 'Ca', 'Ong', '345', NULL, 'Clinic Administrator', 'bian', 'bian@gmail.com', 'bian', NULL),
(11, 'Sam', 'Pol', 'Name', '3124', NULL, 'Clinic Administrator', 'sampol', 'sampol@gmail.com', 'sampol', NULL),
(12, 'biang', 'kita', 'ong', '0915', NULL, 'Clinic Administrator', 'biangkita', 'biangkita@gmail.com', 'biangkita', NULL),
(13, 'kita', 'biang', 'ong', '345', NULL, 'Clinic Administrator', 'kitabiang', 'kitabiang@yahoo.com', 'kitabiang', NULL),
(14, 'Gibo', 'Ong', 'Bagoong', '567', NULL, 'Clinic Administrator', 'gibooong', 'giboong@gmail.com', 'giboong', NULL),
(15, 'John Christopher', 'Sitjar', 'Coquilla', '092777777', '1968-07-06', 'Administrator', 'jonvonkok', 'jc@ymail.com', 'divinebeing', NULL),
(20, 'Muning', 'Ning', 'Ningaling', '09151879411', '2002-11-27', 'Pet Owner', 'ningningningning', 'ningningning@gmail.com', 'luningning', NULL),
(21, 'Juan', 'Gilbs', 'Gilberto', '09342234534', '2000-08-30', 'Pet Owner', 'juangilberto', 'juangilberto@gmail.com', 'gilbsbagoong22', NULL),
(22, 'Charina', 'Janicabs', 'Ongkingco', '09151879411', '2001-09-04', 'Clinic Administrator', 'charinajanicabs', 'charinajanicabs@gmail.com', 'Charina123', NULL),
(23, 'Sample', 'Sample', 'Sample', '09883457876', '2001-12-01', 'Clinic Administrator', 'samples2', 'samples2@gmail.com', 'Sampolsample2', NULL),
(27, 'Stephen', 'Mark', 'Ongkingco', '09348809232', '1998-09-05', 'Clinic Administrator', 'steeephenmark', 'stephenmark@gmail.com', 'Pomballs88', NULL),
(32, 'Jani', 'Ong', 'Cabs', '09812736817', '2002-12-01', 'Pet Owner', 'janicabs', 'janicabs@gmail.com', 'Janicabs0409', NULL),
(34, 'Jani', 'Bert', 'Coki', '09123789162', '1990-12-01', 'Pet Owner', 'janibert', 'janibert@gmail.com', '$2y$10$FvRZsn5/6uhgak/RvXnTR.l0SGO/tcmDec.DwpNKPjmwTk27qwPpS', NULL),
(35, 'Bert', 'Jani', 'Cabs', '09151879481', '1994-12-01', 'Pet Owner', 'bertjani', 'okcbia@gmail.com', '$2y$10$PLcOx4yI0JnpFmr.Rrjb1.09WtLh8RxIyPEhQlP6o4ATDdSf5c2eG', '2023-07-13 02:32:48'),
(36, 'shir', 'paz', 'paz', '09617626162', '2023-06-08', 'Pet Owner', 'shirpaz', 'shirpaz@gmail.com', '$2y$10$eZHU8VSM6L8yOW7sdIsqNOBwjRkIRFMhcSNUE8ci6YNRZRLh.pzTG', NULL),
(37, 'shir', 'may', 'paz', '09617626162', '2021-03-03', 'Clinic Administrator', 'thullah', 'shirleymaypaz@gmail.com', '$2y$10$DNKb62OV9TCrSnf.SqqYduScCP95d/0EGGa0U5HZV3dMwbf0EW34K', NULL),
(38, 'Ferds', 'D', 'Chu', '09089353352', '2002-02-01', 'Clinic Administrator', 'docferds', 'bigben911respond@gmail.com', '$2y$10$47jhfKOdtmN6gjGruTX6I.jZ853W1erpYIm.L3xv3cxU6zTcI7MkS', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `fk_address_users` (`UserID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `fk_appointments_service` (`AvailedServices`(768)),
  ADD KEY `fk_appointments_user` (`UserID`),
  ADD KEY `fk_appointments_clinic` (`ClinicID`);

--
-- Indexes for table `barangay`
--
ALTER TABLE `barangay`
  ADD PRIMARY KEY (`BarangayID`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`ClinicID`),
  ADD KEY `fk_clinics_user` (`UserID`);

--
-- Indexes for table `clinic_billing`
--
ALTER TABLE `clinic_billing`
  ADD PRIMARY KEY (`BillingID`),
  ADD KEY `fk_billing_clinic` (`ClinicID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`),
  ADD KEY `fk_feedback_clinic` (`ClinicID`),
  ADD KEY `fk_feedback_user` (`UserID`),
  ADD KEY `fk_feedback_order` (`OrderID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailsID`),
  ADD KEY `fk_details_supply` (`SupplyID`),
  ADD KEY `fk_details_user` (`UserID`),
  ADD KEY `fk_details_clinics` (`ClinicID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk_orders_user` (`UserID`),
  ADD KEY `fk_orders_clinics` (`ClinicID`);

--
-- Indexes for table `petassessment`
--
ALTER TABLE `petassessment`
  ADD PRIMARY KEY (`AssessmentID`),
  ADD KEY `fk_assessment_pet` (`PetID`),
  ADD KEY `fk_assessment_clinic` (`ClinicID`);

--
-- Indexes for table `petbooklet`
--
ALTER TABLE `petbooklet`
  ADD PRIMARY KEY (`BookletID`),
  ADD KEY `fk_booklet_users` (`UserID`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`PetID`),
  ADD KEY `fk_pets_user` (`UserID`);

--
-- Indexes for table `petsupplies`
--
ALTER TABLE `petsupplies`
  ADD PRIMARY KEY (`SupplyID`),
  ADD KEY `fk_supplies_clinic` (`ClinicID`);

--
-- Indexes for table `petvaccine`
--
ALTER TABLE `petvaccine`
  ADD PRIMARY KEY (`VaccineID`),
  ADD KEY `fk_vaccine_pet` (`PetID`),
  ADD KEY `fk_vaccine_clinic` (`ClinicID`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceID`),
  ADD KEY `fk_services_clinic` (`ClinicID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `barangay`
--
ALTER TABLE `barangay`
  MODIFY `BarangayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `ClinicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clinic_billing`
--
ALTER TABLE `clinic_billing`
  MODIFY `BillingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `petassessment`
--
ALTER TABLE `petassessment`
  MODIFY `AssessmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `petbooklet`
--
ALTER TABLE `petbooklet`
  MODIFY `BookletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `PetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `petsupplies`
--
ALTER TABLE `petsupplies`
  MODIFY `SupplyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `petvaccine`
--
ALTER TABLE `petvaccine`
  MODIFY `VaccineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_users` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_appointments_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`),
  ADD CONSTRAINT `fk_appointments_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `clinics`
--
ALTER TABLE `clinics`
  ADD CONSTRAINT `fk_clinics_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `clinic_billing`
--
ALTER TABLE `clinic_billing`
  ADD CONSTRAINT `fk_billing_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`),
  ADD CONSTRAINT `fk_feedback_order` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `fk_feedback_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_details_clinics` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`),
  ADD CONSTRAINT `fk_details_supply` FOREIGN KEY (`SupplyID`) REFERENCES `petsupplies` (`SupplyID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_details_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_clinics` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`),
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `petassessment`
--
ALTER TABLE `petassessment`
  ADD CONSTRAINT `fk_assessment_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`),
  ADD CONSTRAINT `fk_assessment_pet` FOREIGN KEY (`PetID`) REFERENCES `pets` (`PetID`);

--
-- Constraints for table `petbooklet`
--
ALTER TABLE `petbooklet`
  ADD CONSTRAINT `fk_booklet_users` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `fk_pets_user` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `petsupplies`
--
ALTER TABLE `petsupplies`
  ADD CONSTRAINT `fk_supplies_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`);

--
-- Constraints for table `petvaccine`
--
ALTER TABLE `petvaccine`
  ADD CONSTRAINT `fk_vaccine_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`),
  ADD CONSTRAINT `fk_vaccine_pet` FOREIGN KEY (`PetID`) REFERENCES `pets` (`PetID`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_services_clinic` FOREIGN KEY (`ClinicID`) REFERENCES `clinics` (`ClinicID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
