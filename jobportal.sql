-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 12:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `JobSeekerUserName` varchar(255) NOT NULL,
  `JobId` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applyforfreelance`
--

CREATE TABLE `applyforfreelance` (
  `JobSeekerUserName` varchar(255) NOT NULL,
  `freelanceID` int(11) NOT NULL,
  `date` date NOT NULL,
  `Isaccepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applyforintern`
--

CREATE TABLE `applyforintern` (
  `JobSeekerUserName` varchar(255) NOT NULL,
  `internID` int(11) NOT NULL,
  `date` date NOT NULL,
  `Isaccepted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applyforjob`
--

CREATE TABLE `applyforjob` (
  `JobSeekerUserName` varchar(255) NOT NULL,
  `JobId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `IsAccepted` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `UserName` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`UserName`, `Name`, `location`, `mobile`) VALUES
('google', 'google', 'cairo', '01122429344'),
('micro', 'micro', 'Giza', '01122429362'),
('Raya', 'Raya', 'Alexandria', '01075437892');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `FreelanceId` int(11) DEFAULT NULL,
  `IsAccepted` int(1) NOT NULL,
  `deadline` date NOT NULL,
  `money` int(11) NOT NULL,
  `JobSeekerUserName` varchar(255) DEFAULT NULL,
  `paymentInterval` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `UserName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`UserName`, `department`) VALUES
('google', 'Department of Finance'),
('google', 'Legal'),
('google', 'Management'),
('micro', 'accounting'),
('micro', 'engineering'),
('micro', 'HR'),
('micro', 'sales'),
('Raya', 'Human Resources'),
('Raya', 'Information Technology'),
('Raya', 'Management'),
('Raya', 'Marketing ');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `UserName` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `years` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `jobseekerusername` varchar(255) NOT NULL,
  `jobid` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelance`
--

CREATE TABLE `freelance` (
  `id` int(11) NOT NULL,
  `CompanyUserName` varchar(255) NOT NULL,
  `AnnouncementDate` date NOT NULL,
  `task` varchar(255) NOT NULL,
  `field` varchar(255) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `freelance`
--

INSERT INTO `freelance` (`id`, `CompanyUserName`, `AnnouncementDate`, `task`, `field`, `deleted`) VALUES
(5, 'micro', '2022-12-28', 'I need a wordpress plugin to cloak some pages.\r\n\r\nI would like to choose pages where Google bot would see the content and where the user will be redirected to a different page with a redirection.\r\n', 'plugin development', 0),
(6, 'google', '2022-12-28', 'need someone to make a company website', 'web development', 0);

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `id` int(11) NOT NULL,
  `CompanyUserName` varchar(255) NOT NULL,
  `AnnouncementDate` date NOT NULL,
  `period` int(11) NOT NULL,
  `age` int(2) NOT NULL,
  `StartingDate` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`id`, `CompanyUserName`, `AnnouncementDate`, `period`, `age`, `StartingDate`, `title`, `deleted`) VALUES
(6, 'micro', '2022-12-28', 5, 18, '2023-01-25', 'Business Development', 0),
(7, 'google', '2022-12-28', 4, 20, '2023-01-01', 'C++ Software Engineering', 0),
(8, 'Raya', '2022-12-28', 6, 25, '2022-12-31', 'Content Creator', 0);

-- --------------------------------------------------------

--
-- Table structure for table `internskills`
--

CREATE TABLE `internskills` (
  `id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internskills`
--

INSERT INTO `internskills` (`id`, `skill`) VALUES
(6, 'Excellent command of English '),
(6, 'Sales & Marketing background'),
(7, 'Algorithms'),
(7, 'c++'),
(7, 'programming'),
(8, 'social media'),
(8, 'writing skills');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `JobseekerUserName` varchar(255) DEFAULT NULL,
  `JobId` int(11) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `CompanyUserName` varchar(255) NOT NULL,
  `AnnouncemnetDate` date NOT NULL,
  `YearsOfExperince` int(11) NOT NULL,
  `age` int(2) NOT NULL,
  `indoor_outdoor` varchar(255) NOT NULL,
  `full_partTime` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `describition` varchar(500) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `CompanyUserName`, `AnnouncemnetDate`, `YearsOfExperince`, `age`, `indoor_outdoor`, `full_partTime`, `title`, `department`, `describition`, `deleted`) VALUES
(12, 'micro', '2022-12-28', 3, 30, 'In-door', 'Full time', 'HR Generalist', 'HR', 'Recruitment full cycle (Qualification, Screening, Interview, References, Evaluation, Shortlisting, Contracting).\r\nPersonnel, Employee Insurance, and Taxes.\r\nTeam Building Activities (internal and external activities to increase employee loyalty)\r\nEmployees Appraisals and incentives process.\r\nManage Employee\'s Medical Insurance.', 0),
(13, 'micro', '2022-12-28', 5, 25, 'Out-door', 'Full time', ' Site Engineer', 'accounting', 'Have an experience in Steel Construction \r\nOrganizing materials and ensuring sites are safe and clean.\r\nPreparing cost estimates and ensuring appropriate materials and tools are available.\r\nProviding technical advice and suggestions for improvement on particular projects.\r\nDiagnosing and troubleshooting equipment as required.\r\nNegotiating with suppliers and vendors to ensure the best contracts.', 0),
(14, 'google', '2022-12-28', 4, 30, 'In-door', 'Full time', ' Database Administrator', 'Management', 'Oracle Apps DBA is required to support our development / stage and Production Oracle EBS and Core instances in 24*7 shift support model. The Oracle APPS DBA will be responsible for installation, configuration, upgrading, administrating, monitoring, ', 0),
(15, 'Raya', '2022-12-28', 3, 30, 'In-door', 'Full time', 'Accountant', 'Management', 'dealing with important financial transactions of AlMashariq.  He is responsible for ensuring accuracy in general ledger processing, reconcile accounts, processing a weekly payroll, managing cash, preparing Zakat related documents, and actively participating in budgeting and forecasting activities', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `UserName` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `GraduationFlag` varchar(255) DEFAULT NULL,
  `WorkFlag` varchar(255) DEFAULT NULL,
  `currentDegree` varchar(255) DEFAULT NULL,
  `IsUploaded` tinyint(1) DEFAULT NULL,
  `addres` varchar(255) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobseekerskills`
--

CREATE TABLE `jobseekerskills` (
  `UserName` varchar(255) NOT NULL,
  `Skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `JobSeekerUserName` varchar(255) NOT NULL,
  `JobId` int(11) NOT NULL,
  `date` date NOT NULL,
  `Isaccepted` tinyint(1) NOT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `JobId` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`JobId`, `number`, `text`) VALUES
(14, 0, 'why do you need this job ??');

-- --------------------------------------------------------

--
-- Table structure for table `requirments`
--

CREATE TABLE `requirments` (
  `JobId` int(11) NOT NULL,
  `requirment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirments`
--

INSERT INTO `requirments` (`JobId`, `requirment`) VALUES
(12, 'microsoft office'),
(12, 'software'),
(13, 'Bachelor\'s degree in engineering, construction, or similar.'),
(13, 'project managment'),
(14, 'Good communication skills'),
(14, 'Working experience in Oracle 11g, 12c and 19c versions.'),
(15, 'accounting'),
(15, 'microsoft office');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserName` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `pass`, `email`, `flag`) VALUES
('google', 'klklk', 'business@gmail.com', 2),
('micro', '12345', 'micro@gmail.com', 2),
('Raya', '12345', 'raya@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`JobSeekerUserName`,`JobId`,`number`),
  ADD KEY `JobId` (`JobId`,`number`);

--
-- Indexes for table `applyforfreelance`
--
ALTER TABLE `applyforfreelance`
  ADD PRIMARY KEY (`JobSeekerUserName`,`freelanceID`),
  ADD KEY `freelanceID` (`freelanceID`);

--
-- Indexes for table `applyforintern`
--
ALTER TABLE `applyforintern`
  ADD PRIMARY KEY (`JobSeekerUserName`,`internID`),
  ADD KEY `internID` (`internID`);

--
-- Indexes for table `applyforjob`
--
ALTER TABLE `applyforjob`
  ADD PRIMARY KEY (`JobSeekerUserName`,`JobId`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobSeekerUserName` (`JobSeekerUserName`),
  ADD KEY `FreelanceId` (`FreelanceId`),
  ADD KEY `FreelanceId_2` (`FreelanceId`,`JobSeekerUserName`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`UserName`,`department`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`UserName`,`jobtitle`,`company`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`jobseekerusername`,`jobid`);

--
-- Indexes for table `freelance`
--
ALTER TABLE `freelance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CompanyUserName` (`CompanyUserName`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CompanyUserName` (`CompanyUserName`);

--
-- Indexes for table `internskills`
--
ALTER TABLE `internskills`
  ADD PRIMARY KEY (`id`,`skill`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`),
  ADD KEY `JobseekerUserName` (`JobseekerUserName`),
  ADD KEY `JobId` (`JobId`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CompanyUserName` (`CompanyUserName`,`department`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `jobseekerskills`
--
ALTER TABLE `jobseekerskills`
  ADD PRIMARY KEY (`UserName`,`Skill`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`JobSeekerUserName`,`JobId`),
  ADD KEY `JobId` (`JobId`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`JobId`,`number`);

--
-- Indexes for table `requirments`
--
ALTER TABLE `requirments`
  ADD PRIMARY KEY (`JobId`,`requirment`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `freelance`
--
ALTER TABLE `freelance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`JobId`,`number`) REFERENCES `questionnaire` (`JobId`, `number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`JobSeekerUserName`,`JobId`) REFERENCES `applyforjob` (`JobSeekerUserName`, `JobId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applyforfreelance`
--
ALTER TABLE `applyforfreelance`
  ADD CONSTRAINT `applyforfreelance_ibfk_1` FOREIGN KEY (`JobSeekerUserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applyforfreelance_ibfk_2` FOREIGN KEY (`freelanceID`) REFERENCES `freelance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applyforintern`
--
ALTER TABLE `applyforintern`
  ADD CONSTRAINT `applyforintern_ibfk_1` FOREIGN KEY (`JobSeekerUserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applyforintern_ibfk_2` FOREIGN KEY (`internID`) REFERENCES `intern` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applyforjob`
--
ALTER TABLE `applyforjob`
  ADD CONSTRAINT `applyforjob_ibfk_1` FOREIGN KEY (`JobSeekerUserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applyforjob_ibfk_2` FOREIGN KEY (`JobId`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`FreelanceId`,`JobSeekerUserName`) REFERENCES `applyforfreelance` (`freelanceID`, `JobSeekerUserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `company` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`jobseekerusername`,`jobid`) REFERENCES `applyforjob` (`JobSeekerUserName`, `JobId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `freelance`
--
ALTER TABLE `freelance`
  ADD CONSTRAINT `freelance_ibfk_1` FOREIGN KEY (`CompanyUserName`) REFERENCES `company` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `intern`
--
ALTER TABLE `intern`
  ADD CONSTRAINT `intern_ibfk_1` FOREIGN KEY (`CompanyUserName`) REFERENCES `company` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `internskills`
--
ALTER TABLE `internskills`
  ADD CONSTRAINT `internskills_ibfk_1` FOREIGN KEY (`id`) REFERENCES `intern` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interview`
--
ALTER TABLE `interview`
  ADD CONSTRAINT `interview_ibfk_1` FOREIGN KEY (`JobseekerUserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `interview_ibfk_2` FOREIGN KEY (`JobId`) REFERENCES `job` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`CompanyUserName`,`department`) REFERENCES `departments` (`UserName`, `department`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD CONSTRAINT `jobseeker_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `user` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobseekerskills`
--
ALTER TABLE `jobseekerskills`
  ADD CONSTRAINT `jobseekerskills_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`JobSeekerUserName`) REFERENCES `jobseeker` (`UserName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`JobId`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`JobId`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `requirments`
--
ALTER TABLE `requirments`
  ADD CONSTRAINT `requirments_ibfk_1` FOREIGN KEY (`JobId`) REFERENCES `job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
