-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2022 at 11:31 PM
-- Server version: 5.6.51-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `impactt`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `projects_id` varchar(255) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `activity_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `projects_id`, `activity_title`, `activity_date`, `timestamp`, `status`) VALUES
(19, '1008', 'Youth Vulnerability to Violent Extremism: A Follow-through Study in the BARMM', '2022-01-22', '2022-06-28 04:17:55', 1),
(20, '1001', 'Forum and Round Table Discussion on BTA BILL No.58 - An Act Providing for the Bangsamoro Local Governance Code', '2022-02-17', '2022-07-18 02:25:58', 1),
(21, '1008', 'IPS Summit: Road towards genuine recognition', '2022-04-20', '2022-06-28 05:47:05', 1),
(22, '1007', 'Bangsamoro Civil Society Consultation-Workshop on Human Rights Advocacy', '2021-12-13', '2021-12-11 08:54:18', 1),
(23, '1008', 'Indigenous Political Structures Summit: Road towards IPS Genuine Recognition', '2022-04-19', '2022-07-04 03:37:18', 1),
(24, '1006', 'Usapang Political Party sa BARMM: Where are the political parties during the Bangsamoro Transition?', '2022-03-25', '2022-07-21 06:32:05', 1),
(25, '1003', 'CSOs Agenda in the Transition and Creation of Technical Working Group', '2021-12-13', '2022-07-21 07:49:01', 1),
(26, '1004', 'Second Manual of Operation Workshop', '2022-01-17', '2022-07-21 07:51:19', 1),
(27, '1004', 'Scuba Diving and PCRA Training', '2022-01-19', '2022-07-21 07:52:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `acty_id` varchar(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `birthday` date NOT NULL,
  `age_range` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `ethnicity` text NOT NULL,
  `ct_municipality` text NOT NULL,
  `provnce` varchar(255) NOT NULL,
  `q1` text NOT NULL,
  `q2` text NOT NULL,
  `q3` text NOT NULL,
  `q4` text NOT NULL,
  `q5` text NOT NULL,
  `q6` text NOT NULL,
  `q7` text NOT NULL,
  `q8` text NOT NULL,
  `q9` text NOT NULL,
  `q10` text NOT NULL,
  `q11` varchar(255) NOT NULL,
  `q12` text NOT NULL,
  `q13` text NOT NULL,
  `q14` text NOT NULL,
  `q15` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `acty_id`, `first_name`, `last_name`, `birthday`, `age_range`, `gender`, `ethnicity`, `ct_municipality`, `provnce`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`) VALUES
(24, '20', 'John Joseph', 'Villotes', '0000-00-00', '26 - 35', 'Male', 'Bisaya', 'Cotabato City', 'Maguindanao', '4', '5', '5', '5', '5', '5', '5', '5', '5', '4', 'Good', 'CONSTITUTIONALITY OF LEGISLATING BANGSAMORO LOCAL GOVERNANCE CODE', '', '', 'Slightly familiar'),
(25, '20', 'Junaidee', 'Jasari', '0000-00-00', '26 - 35', 'Male', 'Iranun', 'Cotabato City', 'Maguindanao', '4', '5', '4', '5', '5', '5', '5', '5', '5', '5', 'Good', 'SIGNIFICANCE OF AUTONOMY ITS ADVANTAGES AND DISADVANTAGES', 'WORK WITH MY MANDATE CONTRIBUTE TO THE BEST OF MY KNOWLEDGE THE IMPLEMENTATION OF THE PROVISION', 'ENHANCE & CAPACITATE MYSELF THROUGH TRAININGS INVOLVE AND PARTICIPATE', 'Slightly familiar'),
(26, '20', 'Ronaldo', 'Ambangan', '0000-00-00', '46 - 55', 'Male', 'Erumanen Menuvu', 'NA', 'NA', '4', '4', '4', '4', '4', '4', '5', '4', '5', '4', 'Good', 'MANDANAS RULING', 'CONSULTATION', 'PARTICIPATION IN VARIOUS BARMM CONSULATION/ACTIVITIES', 'Moderately familiar'),
(27, '20', 'Maria Theresa', 'Diaz', '0000-00-00', '56 - 65', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'Good', '', '', '', 'Moderately familiar'),
(28, '20', 'Alice', 'Original', '0000-00-00', '46 - 55', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '4', '4', '4', '4', '4', '4', '4', '4', '4', '4', 'Good', 'GOVERNANCE', 'READ AND COMPREHEND THE BTA BILL 58', 'VONTINUED ENGAGEMENT EIYH PEOPLE WORKING WITH BARMM/IAG', 'Moderately familiar'),
(29, '20', 'Erlinda', 'Hisug', '0000-00-00', 'Over 65', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '5', '5', '4', '5', '5', '5', '5', '5', '5', '5', 'Good', 'Q AND A AND PRESENTATIONS OF ATTY. LAISA AND THE PANEL OF REACTORS', 'CONDUCT SEMINAR CONVERSTAION IN SMALLER GROUPS', 'ADDITIONAL INFORMATION', 'Very familiar'),
(30, '20', 'Datusikie', 'Ampilan', '0000-00-00', '36 - 45', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Good', 'INPUTS OF ATTY. LAISA', 'RE-ECHOING TO MY CSO COLLEAGUES', 'COPY OF THE PRESENTATION OF ATTY. LAISA AND ATTY. BENNY', 'Very familiar'),
(31, '20', 'Junjun', 'Lakim', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '4', '4', '4', '5', '4', '5', '4', '4', '4', '4', 'Okay', '', '', '', 'Slightly familiar'),
(32, '20', 'Toto', 'Laguialaot', '0000-00-00', '46 - 55', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '4', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Very Good', 'ALL TOPICS ARE INTERESTING FOR THE DEVELOPMENT OF BARMM', 'MEETING, SEMINAR, ADVOCACIES, FORUM/DIALOGUE, FGD', 'FOLLOW THROUGH ACTIVITY ON FORUM & RTD ON BTA BILL 58', 'Very familiar'),
(33, '20', 'Maria Aracelli', 'Juliano', '0000-00-00', '', 'Female', 'Chavacano', 'Cotabato City', 'Maguindanao', '5', '5', '5', '5', '5', '5', '5', '5', '4', '4', 'Very Good', 'REACTOR\'S VIEWS/ Q AND A', 'ACADEMIC FORUM/RESEARCH', 'FURTHER/ADDITIONAL VENUES FOR LEARNING', 'Very familiar'),
(34, '20', 'Samira', 'Usman', '0000-00-00', '36 - 45', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '4', '4', '4', '4', '4', '4', '5', '5', '5', '5', 'Very Good', 'MANDANAS RULING & DECENTRALIZATION PARTICIPATION OF CIVIL SOCIETY', 'ENCOURAGING ALL SECTORS TO PARTICIPATE IN THE CONSULTATION', 'RESOURCE SPEAKER', 'Moderately familiar'),
(35, '20', 'Leodelyn', 'Delosa', '0000-00-00', '46 - 55', 'Female', 'Bisaya', 'Midsayap', 'North Cotabato', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Very Good', 'LOCAL GOVERNMENT CODE AN ACT PROVIDING FOR BLGC', 'BE UPDATED OF THE SAID ISSUE', 'ATTEND SERIES OF FORUM/RTDS', 'Moderately familiar'),
(36, '20', 'Evelyn', 'Abrasando', '0000-00-00', '26 - 35', 'Female', 'Bisaya', 'Midsayap', 'North Cotabato', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Very Good', 'TOPICS ON DECENTRALIZATION AND DISBURSEMENT OF FUND MANAGEMENT', 'DOING FURTHER RESEARCH TO UNDERSTAND MORE THIS BILL AND SHARE TO MY STUDENT', 'RESEARCH AND UNDERSTAND', 'Slightly familiar'),
(37, '20', 'Rigor', 'Pedrosa', '0000-00-00', '26 - 35', 'Male', 'NA', 'Midsayap', 'North Cotabato', '4', '4', '5', '5', '5', '4', '4', '5', '5', '5', 'Very Good', 'DECENTRALIZATION AND DEVOLUTION', 'I GAINED A LOT OF NEW INFORMATION', '', 'Moderately familiar'),
(38, '20', 'Noraida Abdullah', 'Karim', '0000-00-00', '46 - 55', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '5', '4', '4', '5', '4', '4', '4', '4', '4', '4', 'Good', 'the inputs/comments from the panelists', 'information sharing in the small group discussions', 'more familiarity with the sections of the BTA Bill No. 58', 'Very familiar'),
(39, '20', 'Alfred', 'Taboada', '0000-00-00', '46 - 55', 'Male', 'Bisaya', 'Cotabato City', 'Maguindanao', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'Very Good', 'EVERYTHING', '', '', 'Moderately familiar'),
(40, '20', 'Abdul Rahim', 'Balabagan', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '4', '5', '5', '5', '5', '5', '5', '5', '5', '4', 'Very Good', 'LGC IN THE BARMM PRESENTED BY ATTY. ALAMIA & INTRO AND BACKGROUNDER BY ATTY. BACANI', 'COMMUNITY EXTENSION SERVICES', 'RESOURCES BOTH MANPOWER, SKILLS & FINANCIAL', 'Very familiar');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `username`, `password`) VALUES
(1, 'enpold2', 'iag_enpold2');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `act_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `birthdate` date NOT NULL,
  `agerange` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `ethnicity` text NOT NULL,
  `city_municipality` text NOT NULL,
  `province` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `othereduc` varchar(255) NOT NULL,
  `org_office` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `org_no` varchar(255) NOT NULL,
  `org_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `act_id`, `firstname`, `lastname`, `birthdate`, `agerange`, `gender`, `ethnicity`, `city_municipality`, `province`, `mobileno`, `email`, `education`, `othereduc`, `org_office`, `position`, `org_no`, `org_email`) VALUES
(14, 19, 'Nihma Maulod', 'Dompol', '0000-00-00', '15 - 25', 'Female', 'Yakan', 'Lamitan City', 'Basilan', '09276708750', 'nihmadompol27@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Null', 'Null', 'NA', 'NA'),
(15, 19, 'Al-Nasser Taleon', 'Tumacder, Jr.', '0000-00-00', '15 - 25', 'Male', 'Tausug', 'Null', 'Sulu', '09562180207', 'alnasserttjr@gmail.com', 'Graduate Degree (Masters Degree)', '', 'TGYPO', 'President', 'NA', 'NA'),
(16, 19, 'Ruaina Salapi', 'Abdurasid', '0000-00-00', '', 'Female', 'Null', 'Zamboanga City', 'Null', '09278062414', 'none@email.com', 'Bachelors/Baccalaureate Degree', '', 'Null', 'Null', 'NA', 'NA'),
(17, 19, 'Delhana Mustafa', 'Uto', '0000-00-00', '46 - 55', 'Female', 'Tausug', 'Lamitan City', 'Basilan', '09457237397', 'delhanamj@gmail.com', 'Graduate Degree (Masters Degree)', '', 'DepEd', 'TIC', 'NA', 'NA'),
(18, 19, 'Aileen Reyes', 'Aracama', '0000-00-00', '36 - 45', 'Female', 'Tausug', 'Lamitan City', 'Basilan', '09551069957', 'aileen.aracama@deped.gov.ph', 'Bachelors/Baccalaureate Degree', '', 'DepEd', 'Teacher-1', 'NA', 'NA'),
(19, 19, 'Raina Reyes', 'Aracama', '0000-00-00', '15 - 25', 'Female', 'Tausug', 'Lamitan City', 'Basilan', '09364291519', 'itsrainaaracama@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Null', 'Null', 'NA', 'NA'),
(20, 19, 'Parha Abdulla', 'Jainal', '0000-00-00', '36 - 45', 'Female', 'Tausug', 'Lamitan City', 'Basilan', '09355980274', 'parha.jainal@deped.gov.ph', 'Bachelors/Baccalaureate Degree', '', 'DepEd', 'Teacher-1', 'NA', 'NA'),
(21, 19, 'Yahya Nanain', 'Titong', '0000-00-00', '36 - 45', 'Male', 'Tausug', 'Null', 'Sulu', '09552700690', 'tedtitong@gmail.com', 'OtherEducation', 'ILFP, FELLOW', 'Muslim Leaders Asssembly, Inc.', 'President', 'NA', 'NA'),
(22, 19, 'Eddiemer Alih', 'Abuhasim', '0000-00-00', '', 'Male', 'Tausug', 'Null', 'Sulu', '09678116373', 'abuhasimedda@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Null', 'Null', 'NA', 'NA'),
(23, 19, 'Hakim Nanain', 'Titong', '0000-00-00', '26 - 35', 'Male', 'Tausug', 'Null', 'Sulu', '09651280592', 'kim883910@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Null', 'Null', 'NA', 'NA'),
(24, 22, 'Jomar Condaraan', 'Hadji Jalal', '0000-00-00', '15 - 25', 'Male', 'Meranao', 'Marawi City', 'Lanao del Sur', '09109137618', 'jjcmdpages@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Reclaiming Marawi Movement', 'Member', 'NA', 'NA'),
(25, 22, 'Kusain Samama', 'Amino', '0000-00-00', '46 - 55', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09972739906', 'kfpdai@yahoo.com', 'OtherEducation', 'College Level', 'Kadtabanga Foundation for Peace and  Development Advocates Inc.', 'Community Facilitator', 'NA', 'NA'),
(27, 22, 'Celia Mama', 'Rajah', '0000-00-00', 'Over 65', 'Female', 'Meranao', 'Iligan City', 'Lanao del Norte', '09177028099', 'mamacel1964@yahoo.com', 'Bachelors/Baccalaureate Degree', '', 'Mothers for peace Lanao del Norte', 'Area Directress', 'NA', 'NA'),
(28, 22, 'Abdel Ressan Paguital', 'Esmael', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'Sultan Sa Barongis', 'Maguindanao', '09350288299', 'dr.esmael03@yahoo.com', 'Graduate Degree (Masters Degree)', '', 'Tiyakap Kalilintad Inc.', 'Project Officer', 'NA', 'NA'),
(29, 22, 'KJ Mamo', 'Norbe', '0000-00-00', '15 - 25', 'Male', 'Manobo Dulangan', 'Sultan Kudarat', 'Sultan Kudarat', '09759383707', 'kjnorbs@gmail.com', 'OtherEducation', 'Student', 'Kulaman Manobo Dulangan Youth Organization', 'Vice President', 'NA', 'NA'),
(30, 22, 'Raihanah Madale', 'Calandada', '0000-00-00', '15 - 25', 'Female', 'Meranao', 'Cotabato City', 'Maguindanao', '09386447055', 'raicalandada@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Magungaya Mindanao, Inc.', 'Project Coordinator', 'NA', 'NA'),
(31, 20, 'Datusikie Zulia', 'Ampilan', '0000-00-00', '36 - 45', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09350469118', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'MAGUNGAYA MINDANAO', 'EXECUTIVE DIRECTOR', 'NA', 'NA'),
(32, 20, 'Mariam', 'Ali', '0000-00-00', '56 - 65', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09554432897', 'mosep@hotmail.com', 'Graduate Degree (Masters Degree)', '', 'MOSEP, INC.', 'PROGRAM MANAGER', 'NA', 'NA'),
(33, 20, 'Ronald Hallid', 'Torres', '0000-00-00', '36 - 45', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09178423424', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'BARMM BUSINESS COUNCIL', 'CHAIRPERSON', 'NA', 'NA'),
(34, 23, 'Ronnie Mamparaik', 'Manial', '0000-00-00', '26 - 35', 'Male', 'Arumanen ne Menuvu', 'Municipality of Carmen', 'North Cotabato', '.', 'none@email.com', 'OtherEducation', 'NA', 'KAMAL', 'Null', 'NA', 'NA'),
(35, 23, 'Maribeth Mosela', 'Marcelino', '0000-00-00', '36 - 45', 'Female', 'Teduray', 'Cotabato City', 'Maguindanao', '09163537579', 'maribeth.marcelino@deped.gov.ph', 'Bachelors/Baccalaureate Degree', '', 'Schools Division of MAG II', 'Division IPED Focal', '09163537579', 'NA'),
(36, 23, 'Ronaldo', 'Ambangan', '0000-00-00', '36 - 45', 'Male', 'Arumanen ne Menuvu', 'Municipality of Carmen', 'North Cotabato', '.', 'none@email.com', 'OtherEducation', 'NA', 'KAMAL', 'Null', 'NA', 'NA'),
(37, 23, 'Ana', 'Tandoy', '0000-00-00', '15 - 25', 'Female', 'Arumanen ne Menuvu', 'Municipality of Carmen', 'North Cotabato', '.', 'none@email.com', 'OtherEducation', 'NA', 'KAMAL', 'Null', 'NA', 'NA'),
(38, 23, 'Lea', 'Ignacio', '0000-00-00', '15 - 25', 'Female', 'Arumanen ne Menuvu', 'Municipality of Carmen', 'North Cotabato', '.', 'none@email.com', 'OtherEducation', 'NA', 'KAMAL', 'Null', 'NA', 'NA'),
(39, 23, 'Rosito', 'Mantawil', '0000-00-00', '', 'Male', 'Arumanen ne Menuvu', 'Municipality of Carmen', 'North Cotabato', '.', 'none@email.com', 'OtherEducation', 'NA', 'Null', 'Null', 'NA', 'NA'),
(40, 23, 'Anggato', 'Manial', '0000-00-00', '', 'Male', 'Arumanen ne Menuvu', 'Municipality of Carmen', 'North Cotabato', '.', 'none@email.com', 'OtherEducation', 'NA', 'Null', 'Null', 'NA', 'NA'),
(41, 20, 'Samira Caltao', 'Usman', '0000-00-00', '36 - 45', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09673965507', 'samirausman23@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'SUARA KALILINTAD', 'CHAIRWOMEN', 'NA', 'NA'),
(42, 20, 'Noraida Adang Abdullah', 'Karim', '0000-00-00', '46 - 55', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09178444773', 'nakari@cfsi.ph', 'Graduate Degree (Masters Degree)', '', 'CFSI', 'DIRECTOR FOR MINDANAO PROGRAM', 'NA', 'NA'),
(43, 20, 'Alfred', 'Taboada', '0000-00-00', '46 - 55', 'Male', 'Bisaya', 'Cotabato City', 'North Cotabato', '09177704058', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'STI/NDU', '.', 'NA', 'NA'),
(44, 20, 'Abdul Rahim Panabal', 'Balabagan', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'NA', 'North Cotabato', '09057466356', 'abdulrahimbalabagan@gmail.com', 'Graduate Degree (Masters Degree)', '', 'UNYPAD', 'NATIONAL STAFF/P.O', 'NA', 'NA'),
(45, 20, 'Muhammad Farziel Baulo', 'Abutazil', '0000-00-00', '36 - 45', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09174790068', 'farzmana1@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'MILG', 'CLGOO', 'NA', 'NA'),
(46, 20, 'Lo Ivan Reyes', 'Castillon', '0000-00-00', '26 - 35', 'Male', 'Ilonggo', 'Cotabato City', 'Maguindanao', '09285519756', 'ivan8castillon@gmail.com', 'Post Graduate (PhD, EdD)', '', 'Positive VIBES', 'CHAIRPERSON', 'NA', 'NA'),
(47, 20, 'Toto Dading', 'Laguialaot', '0000-00-00', '46 - 55', 'Male', 'Maguindanaon', 'NA', 'North Cotabato', '09753480410', 'toto_laguialaot@yahoo.com.ph', 'Graduate Degree (Masters Degree)', '', 'Federation of Halal Community Based Organization', 'Member', 'NA', 'NA'),
(48, 20, 'Jun Jun Musa', 'Lakim', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'NA', 'North Cotabato', '09975432503', 'none@email.com', 'OtherEducation', 'NA', 'NA', '.', 'NA', 'NA'),
(49, 20, 'Ruffaida Guiamalon', 'Mokalid', '0000-00-00', '26 - 35', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09756357368', 'ruffaidamokalid43@gmail.com', 'OtherEducation', 'UNDER GRAD 4TH YEAR', 'DXMS', 'ANCHOR / NEWS REPORTER', 'NA', 'NA'),
(50, 20, 'Ronaldo Necesito', 'Ambangan', '0000-00-00', '46 - 55', 'Male', 'Erumanen Nu Menuvu', 'NA', 'North Cotabato', '09068301376', 'none@email.com', 'Bachelors/Baccalaureate Degree', '', 'ERUMANEN MENUVU KAMAL', 'SECRETARY GENERAL', 'NA', 'NA'),
(51, 20, 'Johnson Kasim', 'Badawi', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09565324470', 'badawi@hdcentre.org', 'Graduate Degree (Masters Degree)', '', 'CENTRE FOR HUMANITARIAN DIALOGUE', 'PROJECT ASSOCIATE', 'NA', 'NA'),
(52, 20, 'Abdullah', 'Kali', '0000-00-00', '15 - 25', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09154203194', 'abdullahkali@rocketmail.com', 'Graduate Degree (Masters Degree)', '', 'CITY GOVERNMENT OF COTABATO CITY', '.', 'NA', 'NA'),
(53, 20, 'Drema', 'Bravo', '0000-00-00', '26 - 35', 'Female', 'Ilonggo', 'Cotabato City', 'North Cotabato', '09176202061', 'drema.quitayen@yahoo.com', 'Graduate Degree (Masters Degree)', '', 'DXMS', 'ANCHOR', 'NA', 'NA'),
(54, 20, 'John Joseph', 'Villotes', '0000-00-00', '26 - 35', 'Male', 'Bisaya', 'Cotabato City', 'Maguindanao', '09369530729', 'johnjvillotes@gmail.com', 'Post Graduate (PhD, EdD)', '', 'NDRVMCC', 'PROGRAM HEAD', 'NA', 'NA'),
(55, 20, 'Bai Rohayah', 'Mama', '0000-00-00', '26 - 35', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09265815485', 'none@email.com', 'Graduate Degree (Masters Degree)', '', 'UNITED YOUTH OF THE PHILIPPINES WOMEN', 'MEAL OFFICER', 'NA', 'NA'),
(56, 20, 'Maria Fe', 'Gerodias', '0000-00-00', 'Over 65', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '09517986736', 'smafe647@gmail.com', 'Post Graduate (PhD, EdD)', '', 'NDRVMCC', 'SCHOOL PRESIDENT', 'NA', 'NA'),
(57, 20, 'Najem', 'Limbutungan', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09458315679', 'nlimbutungan@gmail.com', 'Post Graduate (PhD, EdD)', '', 'BTA', 'LSO V', 'NA', 'NA'),
(58, 20, 'Sheryan', 'Guialel', '0000-00-00', '26 - 35', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09958623939', 'sheryanguialel@gmail.com', 'Post Graduate (PhD, EdD)', '', 'BTA', 'PAO IV', 'NA', 'NA'),
(59, 20, 'Tarhata', 'Maglangit', '0000-00-00', '56 - 65', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09062240950', 'bwsc18@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'BWSC', 'EXECUTIVE DIRECTOR', 'NA', 'NA'),
(60, 20, 'Musa', 'Damao', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'NA', 'North Cotabato', '09559529130', 'musa_damao@yahoo.com.ph', 'Post Graduate (PhD, EdD)', '', 'MADINA/BDPAJI', 'EXECUTIVE DIRECTOR', 'NA', 'NA'),
(61, 20, 'Romeo', 'Saniel', '0000-00-00', '56 - 65', 'Male', 'Bisaya', 'NA', 'North Cotabato', '09176207142', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'OMI IRD', 'DIRECTOR', 'NA', 'NA'),
(62, 20, 'Razul', 'Ebus', '0000-00-00', '46 - 55', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09972477212', 'none@email.com', 'Post Graduate (PhD, EdD)', '', '1FB', 'CHAIRMAN', 'NA', 'NA'),
(63, 20, 'Maria Araceli', 'Juliano', '0000-00-00', '46 - 55', 'Female', 'Chavacano', 'Cotabato City', 'Maguindanao', '09123456789', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'NDU', 'DEAN', 'NA', 'NA'),
(64, 20, 'Sema', 'Dilna', '0000-00-00', '46 - 55', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09359109607', 'dr_sem01@yahoo.com.ph', 'Post Graduate (PhD, EdD)', '', 'CSU', 'PRESIDENT', 'NA', 'NA'),
(65, 20, 'Solayha', 'Sam', '0000-00-00', '56 - 65', 'Female', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09173014754', 'solayha.ced@gmail.com', 'Post Graduate (PhD, EdD)', '', 'CHED', 'TEACHER', 'NA', 'NA'),
(66, 20, 'Abdul Tunku Junaidee', 'Jasani', '0000-00-00', '26 - 35', 'Male', 'Iranun', 'Cotabato City', 'Maguindanao', '09176216781', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'DEPED', 'TEACHER', 'NA', 'NA'),
(67, 20, 'Alice', 'Orinal', '0000-00-00', '46 - 55', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '09107521596', 'aliceoriginal4@gmail.com', 'Graduate Degree (Masters Degree)', '', 'OND', '.', 'NA', 'NA'),
(68, 20, 'Maria Teresa', 'Diaz', '0000-00-00', '56 - 65', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '09209004935', 'teresa_ond@yahoo.com.ph', 'Graduate Degree (Masters Degree)', '', 'OND', 'GENERAL COUNCILOR / GENERAL SECRETARY', 'NA', 'NA'),
(69, 20, 'Leodelyn', 'Delosa', '0000-00-00', '46 - 55', 'Female', 'Bisaya', 'Midsayap', 'North Cotabato', '09338109802', 'ellendelosa08@gmail.com', 'Graduate Degree (Masters Degree)', '', 'NDMC', 'DIRECTRESS, COMMUNITY EXTENSION', 'NA', 'NA'),
(70, 20, 'Evelyn', 'Albrando', '0000-00-00', '26 - 35', 'Female', 'Bisaya', 'Cotabato City', 'North Cotabato', '09171241957', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'NDMC', 'PROGRAM HEAD FOR CRIMINOLOGY', 'NA', 'NA'),
(71, 20, 'Rigor', 'Pedrosa', '0000-00-00', '26 - 35', 'Male', 'Ilonggo', 'Midsayap', 'North Cotabato', '09503661431', 'pietapedrosa@gmail.com', 'Graduate Degree (Masters Degree)', '', 'NDMC', 'LIBRARIAN', 'NA', 'NA'),
(72, 20, 'Delma', 'Jaranilla', '0000-00-00', '56 - 65', 'Female', 'Bisaya', 'Midsayap', 'North Cotabato', '09195300830', 'none@email.com', 'Bachelors/Baccalaureate Degree', '', 'NDMC', 'CES ASSITANT', 'NA', 'NA'),
(73, 20, 'Sherwin', 'Manuel', '0000-00-00', '36 - 45', 'Male', 'Teduray', 'Cotabato City', 'Maguindanao', '09751330751', 'none@email.com', 'OtherEducation', 'HIGH SCHOOL GRAD', 'COTABATO CITY TRIBAL HOUSING VILLAGE ASSOCIATION', 'MEMBER', 'NA', 'NA'),
(74, 20, 'Amy Lynn', 'Dolores', '0000-00-00', '46 - 55', 'Female', 'Teduray', 'Cotabato City', 'Maguindanao', '09177072776', 'cityipmr12345@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'IP GROUP', 'IPMR', 'NA', 'NA'),
(75, 20, 'Erlinda', 'Hisug', '0000-00-00', 'Over 65', 'Female', 'Bisaya', 'Cotabato City', 'Maguindanao', '09123456789', 'none@email.com', 'Graduate Degree (Masters Degree)', '', 'OND', 'SUPERIOR GENERAL', 'NA', 'NA'),
(78, 22, 'Kusain', 'Amino', '0000-00-00', '46 - 55', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '(+639) 997-273-990', 'kfpdai@yahoo.com', 'OtherEducation', 'College level', 'Kadtabanga Foundation for Peace and  Development Advocates Inc.', 'Community Facilitator', 'NA', 'NA'),
(79, 22, 'Celia', 'Rajah', '0000-00-00', 'Over 65', 'Female', 'Meranao', 'Iligan', 'Lanao del Norte', '(+639) 177-028-099', 'mamacel1964@yahoo.com', 'OtherEducation', 'BSEd', 'Mothers for peace lanao del norte', 'Area Directres 0', 'NA', 'NA'),
(80, 22, 'Abdel Ressan', 'Esmael', '0000-00-00', '26 - 35', 'Male', 'Maguindanaon', 'Sultan Sa Barongis', 'Maguindanao', '(+639) 350-288-299', 'dr.esmael03@yahoo.com', 'Graduate Degree (Masters Degree)', '', 'Tiyakap Kalilintad Inc.', 'Project officer', 'NA', 'NA'),
(81, 22, 'KJ', 'Norbe', '0000-00-00', '15 - 25', 'Male', 'Manobo Dulangan', 'Sultan Kudarat', 'Sultan Kudarat', '(+639) 759-383-707', 'kjnorbs@gmail.com', 'OtherEducation', 'Student', 'Kulaman Manobo Dulangan Youth Organization', 'Vice President', 'NA', 'NA'),
(82, 22, 'Raihanah', 'Calandada', '0000-00-00', '15 - 25', 'Female', 'Meranao', 'Cotabato City', 'Maguindanao', '(+639) 386-447-055', 'raicalandada@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Magungaya Mindanao, Inc.', 'Project Coordinator', 'NA', 'NA'),
(83, 22, 'Rady Boy', 'Pobre', '0000-00-00', '26 - 35', 'Male', 'Erumanen ne Menuvu', 'Kabacan', 'North Cotabato', '(+639) 971-778-144', 'radyboyp@gmail.com', 'OtherEducation', 'College level', 'Kamal Youth', 'Volunteer', 'NA', 'NA'),
(85, 22, 'Anna Maria', 'Bantilan', '0000-00-00', '15 - 25', 'Female', 'Manubo', 'Cotabato City', 'Maguindanao', '(+639) 360-970-250', 'annamaria1@gmai.com', 'OtherEducation', 'BSED2', 'MDTJSG', 'Member', 'NA', 'NA'),
(86, 22, 'Johayna', 'Bogabong', '0000-00-00', '26 - 35', 'Female', 'Meranao', 'Cotabato City', 'Maguindanao', '(+639) 518-872-958', 'bogabongjohayna@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Magungaya Mindanao Incorporated', 'Project Officer/IM', 'NA', 'NA'),
(87, 22, 'Jaliha', 'Abdila', '0000-00-00', '26 - 35', 'Female', 'Kagan', 'Marawi City', 'Lanao del Sur', '(+639) 563-793-646', 'casilenj@gmail.com', 'Bachelors/Baccalaureate Degree', '', 'Rawaten Inc.', 'Member', 'NA', 'NA'),
(88, 22, 'Juanita', 'Mamo', '0000-00-00', '56 - 65', 'Female', 'Manobo Dulangan', 'Sultan Kudarat', 'Maguindanao', '(+639) 955-152-757', 'cj.tab@iag.org.ph', 'OtherEducation', 'ALS', 'Dulangan Manobo Justice', 'Member', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `projectcode`
--

CREATE TABLE `projectcode` (
  `id` int(11) NOT NULL,
  `projects_id` varchar(255) NOT NULL,
  `project_code` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projectcode`
--

INSERT INTO `projectcode` (`id`, `projects_id`, `project_code`, `password`) VALUES
(1, '1001', 'EnPolD2', '1001*iagenpold2'),
(2, '1002', 'WFD', '1002*iagwfd'),
(3, '1003', 'KAS', '1003*iagkas'),
(4, '1004', 'MILAB', '1004*iagmilab'),
(5, '1005', 'IDEA', '1005*iagidea'),
(6, '1006', 'NDI', '1006*iagndi'),
(7, '1007', 'FreedomHouse', '1007*iagfh'),
(8, '1008', 'DFAT', '1008*iagdfat'),
(9, '1009', 'GCERF', '1009*iaggcerf'),
(10, '1010', 'IP Champions', '1010*iagipc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `log_id` (`log_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectcode`
--
ALTER TABLE `projectcode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `projectcode`
--
ALTER TABLE `projectcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
