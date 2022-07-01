-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 08:39 AM
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `projects_id`, `activity_title`, `activity_date`, `timestamp`) VALUES
(19, '1008', 'Youth Vulnerability to Violent Extremism: A Follow-through Study in the BARMM', '2022-01-22', '2022-06-28 04:17:55'),
(20, '1001', 'Forum and Round Table Discussion on BTA BILL No.58 - An Act Providing for the Bangsamoro Local Governance Code', '2022-02-17', '2022-06-28 05:37:52'),
(21, '1008', 'IPS Summit: Road towards genuine recognition', '2022-04-20', '2022-06-28 05:47:05'),
(22, '1007', 'Bangsamoro Civil Society Consultation-Workshop on Human Rights Advocacy', '2021-12-13', '2021-12-11 08:54:18');

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
(33, 20, 'Ronald Hallid', 'Torres', '0000-00-00', '36 - 45', 'Male', 'Maguindanaon', 'Cotabato City', 'Maguindanao', '09178423424', 'none@email.com', 'Post Graduate (PhD, EdD)', '', 'BARMM BUSINESS COUNCIL', 'CHAIRPERSON', 'NA', 'NA');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `projectcode`
--
ALTER TABLE `projectcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
