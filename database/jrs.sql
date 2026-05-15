-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 15, 2026 at 04:14 AM
-- Server version: 8.0.44
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_myself`
--

CREATE TABLE `about_myself` (
  `aid` int NOT NULL,
  `jobseek_id` int NOT NULL,
  `about_me` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_myself`
--

INSERT INTO `about_myself` (`aid`, `jobseek_id`, `about_me`) VALUES
(6, 4, 'Michel Jackson|| Chaling  ||  Bhaktapur|| Experience:|| Accountant||finance Manager||Marketing|| dipikathapa@gmail.com||  9870653642||  23 years old|| female ||BBA|| MBA ||Tribhuvan University || 85 percentage.'),
(13, 3, 'Nick Wine || Surabinayak Bhaktapur lecturer||front end developer||Web developer||React Js||HTML5||CSS3 Kp@gmail.com 1234567890 23 years old Female BSC CSIT BE.Computer Engineering Kathmandu University 80 percentage.'),
(14, 5, 'abc bkt bkt ASDF nbn@gmail.com 9812870775 0 years old ASDFAS ASDF    percentage.'),
(15, 6, 'algo algo algo alogo - expereience algo@gmail.com 2325 14 years old Male algo - qualification    percentage.'),
(16, 7, 'Arjan Bhattarai Kathmandu Kathmandu Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Access shesh@gmail.com 9812870775 21 years old Male CSIT CSIT Kathmandu Model Collage 60 percentage.'),
(17, 8, 'Saroj  Kathmandu Kathmandu I am familiaer with CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) i have strong knowledge in front end  development and i know all the tags of html HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router saroj@gmail.com 9812870775 25 years old Male CS CS Kathmandu Model Collage 77 percentage.'),
(18, 10, 'sanam dudhpati bhaktapur  sanam@gmail.com 9878767888 23 years old male Bachelor in CSIT    percentage.'),
(19, 12, 'Json Beaumont Beaumont  json@lamar.edu 40672355 26 years old Male MS CS    percentage.'),
(20, 13, 'Mac 1290 Oregon ave Beaumont  mac@gmail.com 405678904 25 years old Male MS    percentage.'),
(21, 14, 'Nabin B 9870 oregon ave Beaumont  nbn@gmail.com 605671888 28 years old Male MSCS    percentage.');

--
-- Triggers `about_myself`
--
DELIMITER $$
CREATE TRIGGER `after_delete_trigger` AFTER DELETE ON `about_myself` FOR EACH ROW insert into  about_myself(jobseek_id, about_me) VALUES (
                                    3, 'KIran Prajapati Surabinayak Bhaktapur lecturer||front end developer||Web developer||React Js||HTML5||CSS3 Kp@gmail.com 1234567890 23 years old Female BSC CSIT BE.Computer Engineering Kathmandu University 80 percentage.'
                                     )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_email`, `admin_pass`, `admin_username`) VALUES
(1, 'nabin@admin.com', '123', 'nabin');

-- --------------------------------------------------------

--
-- Table structure for table `application_master`
--

CREATE TABLE `application_master` (
  `ApplicationId` int NOT NULL,
  `JobSeekId` int NOT NULL,
  `JobId` int NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_master`
--

INSERT INTO `application_master` (`ApplicationId`, `JobSeekId`, `JobId`, `Status`, `Description`) VALUES
(1, 3, 2, 'Call Latter Send', 'You are invited on interview on &th march'),
(2, 3, 3, 'Call Latter Send', 'I will call you later'),
(3, 3, 4, 'Apply', 'No Message'),
(4, 3, 5, 'Apply', 'No Message'),
(5, 3, 6, 'Call Latter Send', 'Please visit our office tommorrow at 9am'),
(6, 4, 2, 'Apply', 'No Message'),
(7, 3, 21, 'Apply', 'No Message'),
(8, 13, 24, 'Call Latter Send', 'You are selected for interview.'),
(9, 13, 21, 'Apply', 'No Message'),
(10, 14, 27, 'Call Latter Send', 'You are selected and we will send you another update for your interview. ');

-- --------------------------------------------------------

--
-- Table structure for table `employer_reg`
--

CREATE TABLE `employer_reg` (
  `Employer_Id` int NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ContactPerson` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Mobile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Area_Work` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `UserName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Answer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer_reg`
--

INSERT INTO `employer_reg` (`Employer_Id`, `CompanyName`, `ContactPerson`, `Address`, `City`, `Email`, `Mobile`, `Area_Work`, `Status`, `UserName`, `Password`, `Question`, `Answer`) VALUES
(13, 'Ainsoft Limited', 'Mr. Hari Krishna Acharya', 'Balkhu', 'Kathmandu', 'ingo@ainsoft.com', '1234567890', 'Software Company', 'Confirm', 'Hari', 'hari', 'What is your pet Name?', 'Cat'),
(14, 'Broadway Infosys', 'Lio Di Vench', 'Duwakot', 'Bhaktapur', 'broadway@gmail.com', '1234567890', 'Software', 'Confirm', 'ram', 'ram', 'What is your pet Name?', 'ram'),
(15, 'Softech Foundation', 'Harshat', 'Kamalbinayak', 'Bhaktapur', 'info@gmail.com', '1234567890', 'Software Company', 'Confirm', 'Man', 'men', 'What is your pet Name?', 'dog'),
(16, 'abc', 'nbn', 'bkt', 'bkt', 'nbn@gmail.com', '1234567890', 'bch', 'Pending', 'nbn', 'nbn', 'What is your pet Name?', 'sony'),
(17, 'MDIT', 'The jack', 'Katunje ', 'Bhaktapur', 'sanish@gmail.com', '1234567890', 'IT Department', 'Confirm', 'sanish', 'sanish', 'What is your pet Name?', 'cow'),
(18, 'sunrise', 'Leo the Biden', 'Bhaktapur', 'naya pati', 'sanish@yahoo.com', '1234567890', 'It Department', 'Confirm', 'sunrise', 'sunrise', 'What is your pet Name?', 'sunrise'),
(19, 'Texas Electricity Panel', 'Biden Josef', '1290 Beaumont Ave 9th St.', 'Beaumont', 'biden@elec.com', '1234567890', 'HR', 'Confirm', 'biden', 'biden', 'What is your pet Name?', 'rose'),
(20, 'Lamar', 'Hr', 'Beaumont 120 road', 'beaumont', 'lamar@lamar.edu', '909834', 'HR', 'Confirm', 'lamar', 'lamar', 'What is your pet Name?', 'rose'),
(21, 'Amazon', 'Mike ', '1290 oregon ave', 'Beaumont', 'amazon@amazon.com', '12345678', 'CS', 'Confirm', 'mike', 'mike', 'What is your pet Name?', 'tommy');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackId` int NOT NULL,
  `JobSeekId` int NOT NULL,
  `Feedback` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `FeedbakDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackId`, `JobSeekId`, `Feedback`, `FeedbakDate`) VALUES
(6, 5, 'thank you jop portal this site help me to found my dream job in google\r\n', '26/04/15'),
(7, 3, 'as a job seeker i found this site really helpful', '26/04/16'),
(8, 3, 'hi i enjoyed this platform', '26/04/15'),
(9, 3, 'hello there', '26/03/09'),
(10, 3, 'This is the feed back given in 9th may', '26/05/09'),
(11, 3, 'This is the bet job recommendation system i have ever used. Thank you JRS for this', '26/05/11'),
(12, 14, 'This system is really good, I am able to apply for so many positions. ', '26/05/14');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_education`
--

CREATE TABLE `jobseeker_education` (
  `EduId` int NOT NULL,
  `JobSeekId` int NOT NULL,
  `Degree` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `University` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `PassingYear` mediumint NOT NULL,
  `Percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_education`
--

INSERT INTO `jobseeker_education` (`EduId`, `JobSeekId`, `Degree`, `University`, `PassingYear`, `Percentage`) VALUES
(1, 3, 'BE.Computer Engineering', 'Lamar University', 2011, 80),
(2, 4, 'MBA', 'Texas University', 2018, 85),
(4, 3, 'MBA ', 'LIT', 2013, 78),
(6, 3, 'PHD', 'Atlantong university', 2015, 87),
(7, 5, 'BSC', 'The hack university', 2014, 50),
(8, 3, 'BSC', 'Boston University', 1993, 99),
(9, 7, 'CSIT', 'MIT', 1993, 60),
(10, 8, 'CS', 'UMT', 2005, 77),
(11, 10, 'BACHELOR IN COMPUTER SCIENCE', 'Dallas University', 2021, 50),
(12, 8, 'MIT', 'MIT', 1993, 80),
(13, 13, 'MASTERS', 'Lamar Edu', 1993, 70),
(14, 10, 'PHD', 'Lamar Uni', 2021, 80),
(15, 14, 'BACHELOR', 'TU', 2020, 85),
(16, 14, 'MASTERS', 'Lamar University', 2021, 90);

--
-- Triggers `jobseeker_education`
--
DELIMITER $$
CREATE TRIGGER `before_insert` BEFORE INSERT ON `jobseeker_education` FOR EACH ROW SET
                   NEW.Degree=UPPER(NEW.Degree)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_reg`
--

CREATE TABLE `jobseeker_reg` (
  `JobSeekId` int NOT NULL,
  `JobSeekerName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Mobile` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Qualification` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Experience` text COLLATE utf8mb4_general_ci NOT NULL,
  `Gender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `BirthDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `age` int NOT NULL,
  `Resume` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Question` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Answer` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_reg`
--

INSERT INTO `jobseeker_reg` (`JobSeekId`, `JobSeekerName`, `Address`, `City`, `Email`, `Mobile`, `Qualification`, `Experience`, `Gender`, `BirthDate`, `age`, `Resume`, `Status`, `Username`, `Password`, `Question`, `Answer`) VALUES
(3, 'Bimal Raj Shrestha', 'boston', 'Bhaktapur', 'bimalraj@gmail.com', '7777777777', 'MSC IT', 'I am familiaer with CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) i have strong knowledge in front end  development and i know all the tags of html HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router', 'Male', '1997-11-14', 28, 'Syllabus.pdf', 'Confirm', 'bimal', 'bimal', 'What is your pet Name?', 'cat'),
(4, 'Chetan budhathoki', 'sallaghari', 'Bhaktapur', 'chetan@gmail.com', '1234567890', 'BBA', 'Accountant||finance Manager||Marketing', 'Male', '1997-03-19', 23, 'Syllabus.pdf', 'Confirm', 'chetan', 'chetan', 'What is your pet Name?', 'cat'),
(5, 'Nabin Bhandari', 'bkt', 'bkt', 'nbn@gmail.com', '9812870775', 'bbs', 'Accountant||finance Manager||Marketing', 'Male', '2023-04-19', 25, '', 'Confirm', 'nabin', 'nabin', 'What is your pet Name?', 'dog'),
(6, 'algo', 'algo', 'algo', 'algo@gmail.com', '1234567890', 'algo - qualification', 'alogo - expereience', 'Male', '2014-02-18', 14, '', 'Confirm', 'algo', 'algo', 'What is your pet Name?', 'cow'),
(7, 'Arjan Bhattarai', 'Kathmandu', 'Kathmandu', 'shesh@gmail.com', '1234567890', 'CSIT', 'CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries  and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router', 'Male', '2023-02-07', 21, '', 'Confirm', 'arjan', 'arjan', 'What is your pet Name?', 'mice'),
(8, 'Saroj ', 'Kathmandu', 'Kathmandu', 'saroj@gmail.com', '1234567890', 'CS', 'I am familiaer with CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) i have strong knowledge in front end  development and i know all the tags of html HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router', 'Male', '2023-03-22', 25, '', 'Confirm', 'saroj', 'saroj', 'What is your pet Name?', 'rosy'),
(9, 'asdf', 'asdfasdf', 'asdfa', 'sfdasf@gmail.com', '1234567890', 'ASDF', 'bsc pass', 'Male', '', 0, '', 'Pending', 'asdf', 'asdf', 'What is your pet Name?', 'fly'),
(10, 'sanam', 'dudhpati', 'bhaktapur', 'sanam@gmail.com', '1234567890', 'Bachelor in CSIT', 'My name is sanam. I am a motivated and professional Human Resources candidate with a strong interest in HR administration, recruitment, employee relations, onboarding, training coordination, and office management. I have good knowledge of human resource management, job posting, resume screening, interview scheduling, employee records, payroll support, attendance management, leave management, performance management, and HR documentation. I am skilled in communication, staff coordination, department coordination, report writing, data entry, record keeping, Microsoft Word, Microsoft Excel, email communication, and administrative support. I am responsible, detail-oriented, organized, and able to maintain confidentiality while working with employees, staff, students, and management teams. I am interested in working as an HR Assistant or Human Resources Officer where I can support recruitment, employee engagement, policy implementation, conflict resolution, and professional workplace communication.', 'male', '1997-07-23', 23, 'Resume.pdf', 'Confirm', 'sanam', 'sanam', 'What is your pet Name?', 'cat'),
(11, 'Ram Jonchhe', 'Bhaktapur', 'Bhaktapur', 'ram@gmail.com', '1234567890', 'CSIT', '', 'Male', '', 25, '', 'Confirm', 'ram', 'ram', 'What is your pet Name?', 'dog'),
(12, 'Json', 'Beaumont', 'Beaumont', 'json@lamar.edu', '40672355', 'MS CS', '', 'Male', '', 26, 'ResumeTest.pdf', 'Confirm', 'json', 'json', 'What is your pet Name?', 'cat'),
(13, 'Mac', '1290 Oregon ave', 'Beaumont', 'mac@gmail.com', '405678904', 'MS', 'I am a highly energetic and technology-passionate DevOps / CI CD developer from Kathmandu with more than 6 years of work experience in software development, web development, testing, deployment, debugging, and software maintenance. I have completed my BIT degree with above 60 percentage and have strong knowledge of core programming concepts, HTML, CSS, JavaScript, and modern web development practices. I have good practical understanding of Continuous Integration (CI), Continuous Delivery (CD), Infrastructure as Code (IaC), Configuration Management, Cloud Computing, Containers, Docker, Kubernetes, Agile Methodology, DevOps Culture and Practices, Git and Version Control, Monitoring and Logging, Jenkins, Ansible, Chef, Puppet, and Automation Tools. I am interested in working as a DevOps developer where I can use my skills in deployment, automation, cloud infrastructure, CI/CD pipelines, and software delivery to support the company’s technology goals.', 'Male', '', 25, '', 'Confirm', 'mac', 'mac', 'What is your pet Name?', 'rose'),
(14, 'Nabin B', '9870 oregon ave', 'Beaumont', 'nbn@gmail.com', '605671888', 'MSCS', 'My name is Nabin Bhandari. I am a creative Digital Marketing candidate with knowledge of digital marketing, online marketing, social media marketing, Facebook Ads, Google Ads, Instagram marketing, SEO, search engine optimization, email marketing, content creation, content writing, keyword research, and brand promotion. I have experience in campaign planning, lead generation, audience engagement, marketing analytics, website traffic analysis, reporting, Canva, and graphic design basics. I am interested in working as a Digital Marketing Officer where I can manage social media campaigns, improve online visibility, create marketing content, and support business growth.\r\n', 'Male', '2026-05-14', 28, 'GS - Internship Resume.pdf', 'Confirm', 'nabinb', 'nabinb', 'What is your pet Name?', 'rose');

-- --------------------------------------------------------

--
-- Table structure for table `job_master`
--

CREATE TABLE `job_master` (
  `JobId` int NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `JobTitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Age` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Vacancy` int NOT NULL,
  `MinQualification` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Requirement` text COLLATE utf8mb4_general_ci NOT NULL,
  `Description` text COLLATE utf8mb4_general_ci NOT NULL,
  `ExpectedSalary` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_master`
--

INSERT INTO `job_master` (`JobId`, `CompanyName`, `JobTitle`, `Age`, `Vacancy`, `MinQualification`, `Requirement`, `Description`, `ExpectedSalary`) VALUES
(21, 'mdit', 'Frontend dev', '15', 5, 'cs-minqual', 'CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries  and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router', 'we are looking for a very energetic and technology passionate individual for the post of frontend developer in our company, one needs to have good understanding of core programming concepts and must have work in a required field for around or more than 6 years of work experience. Candidate from Kathmandu area will be higly preferable. He/she must be familair with core concept of HTML, CSS and JavaScript (JS). He/She should be above 21 years old and must posses above 60 percentages in related field like CSIT or BIT etc. He/She must have knowledge in CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid React.js Virtual DOM JSX Components State Props Lifecycle methods and deeply understanding in javaScript like Variables Functions Control Flow Arrays Objects. CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS)', '5000'),
(22, 'Bhaktapur Cancer Hospital', 'It Assistant', '22', 3, 'BE Tech', 'Front end developer skills, JavaScript Developer, HTML CSS ', 'we are looking for frontend developer l HTML, CSS and JavaScript (JS).  CSIT or BITCSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid React.js  methods and  Objects.', '50000'),
(23, 'MDIT', 'Frontend Developer ', '20-30', 2, 'Csit', 'CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries  and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router', 'we are looking for a very energetic and technology passionate individual for the post of frontend developer in our company, one needs to have good understanding of core programming concepts and must have work in a required field for around or more than 6 years of work experience. Candidate from Kathmandu area will be higly preferable. He/she must be familair with core concept of HTML, CSS and JavaScript (JS). He/She should be above 21 years old and must posses above 60 percentages in related field like CSIT or BIT etc. He/She must have knowledge in CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid React.js Virtual DOM JSX Components State Props Lifecycle methods and deeply understanding in javaScript like  Variables Functions Control Flow Arrays Objects.', '50000'),
(24, 'sunrise', 'Devops', '20-35', 10, 'MIT', 'Continuous Integration (CI) Continuous Delivery (CD) Infrastructure as Code (IaC) Configuration Management Cloud Computing Containers (Docker, Kubernetes) Agile Methodology DevOps Culture and Practices Git and Version Control Monitoring and Logging Automation Tools (Jenkins, Ansible, Chef, Puppet)', 'we are looking for a very energetic and technology passionate individual for the post of DevOps / CD CI developer in our company, one needs to have good understanding of core programming concepts and must have work in a required field for around or more than 6 years of work experience. Candidate from Kathmandu area will be higly preferable. He/she must be familair with core concept of Web Development including HTML, CSS and JavaScript (JS). He/She should be above 21 years old and must posses above 60 percentages in related field like CSIT or BIT etc. He/She must have knowledge in Web development, testing, deployment, debugging, maintanance of a software. Some of the point should be possessed by a developer Continuous Integration (CI) Continuous Delivery (CD) Infrastructure as Code (IaC) Configuration Management Cloud Computing Containers (Docker, Kubernetes) Agile Methodology DevOps Culture and Practices Git and Version Control Monitoring and Logging Automation Tools (Jenkins, Ansible, Chef, Puppet).', '30000'),
(26, 'Lamar University', 'HR', '30', 2, 'PHD', 'Human Resource Management, HR Administration, Recruitment, Hiring Process, Job Posting, Resume Screening, Interview Scheduling, Onboarding, Employee Records, Payroll Support, Attendance Management, Leave Management, Training Coordination, Performance Management, Employee Relations, Staff Coordination, Administrative Support, Office Management, Communication Skills, Conflict Resolution, Confidentiality, Team Collaboration, Microsoft Office, Excel, Word, Email Communication, Documentation, Report Writing, Organizational Behavior, Labor Law Knowledge, Policy Implementation, Time Management, Problem Solving, Professional Ethics, Leadership Skills, Data Entry, Record Keeping, Department Coordination.', 'We are looking for an energetic and professional Human Resources Officer / HR Assistant to join Lamar University. The candidate should be interested in employee recruitment, staff coordination, employee relations, payroll support, HR documentation, onboarding, training coordination, performance management, and workplace communication. The HR candidate will help manage job postings, screen applications, schedule interviews, maintain employee records, support hiring procedures, assist with attendance and leave management, and communicate with different departments. The person should have good knowledge of human resource management, labor policies, organizational behavior, administrative support, conflict resolution, employee engagement, and office management. The ideal candidate should be responsible, detail-oriented, friendly, confidential, and able to work professionally with faculty, staff, students, and administrative teams.', '80000'),
(27, 'Amazon', 'creative Digital Marketing Officer', '30', 2, 'MS', '\r\nDigital Marketing, Online Marketing, Social Media Marketing, Facebook Ads, Google Ads, Instagram Marketing, SEO, Search Engine Optimization, Email Marketing, Content Creation, Content Writing, Keyword Research, Brand Promotion, Campaign Planning, Lead Generation, Audience Engagement, Marketing Analytics, Website Traffic Analysis, Reporting, Canva, Graphic Design Basics, Communication Skills, Creativity.\r\n', 'We are looking for a creative Digital Marketing Officer to manage online marketing, social media campaigns, content creation, search engine optimization, email marketing, brand promotion, and digital advertising. The candidate should understand marketing strategy, audience engagement, campaign planning, analytics, reporting, and lead generation. The ideal candidate should have knowledge of Facebook Ads, Google Ads, Instagram marketing, SEO, content writing, graphic design basics, keyword research, website traffic analysis, and social media management.\r\n', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `job_specification`
--

CREATE TABLE `job_specification` (
  `jobspec_id` int NOT NULL,
  `jobid` int NOT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Specification` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_specification`
--

INSERT INTO `job_specification` (`jobspec_id`, `jobid`, `job_title`, `Specification`) VALUES
(3, 6, 'Supervisor required', 'We are looking for a experienced  Supervisor required who are willing to work at our company and expand their knowledge. The candidate must be of age group 25-30. They must  at least have degree of MSC IT. Additional requirement include : Degree in computer science, IT or similar,Degree or completed courses in business administration would be advantageous.,Practical experience installing and maintaining systems is recommended., At least 2 year experience as it Supervisor.'),
(4, 3, 'Marketing Executive', 'We are looking for a experienced  Marketing Executive who are willing to work at our company and expand their knowledge. The candidate must be of age group 25-35. They must  at least have degree of BBS. Additional requirement include : should be proficent in marketing, should have at least 3 year experience of marketing manager.'),
(5, 5, 'Accountant', 'We are looking for a experienced  Accountant who are willing to work at our company and expand their knowledge. The candidate must be of age group 20-28. They must  at least have degree of BBA. Additional requirement include : working experience at bank or any financial institution for at least 1 year,  shoud have good knowlege of accounting.'),
(6, 7, 'Java Developer', 'We are looking for a experienced  Java Developer who are willing to work at our company located at located at Balkhu , Kathmandu and expand their knowledge. The candidate must be of age group 20-30. They must  at least have degree of BIT. Additional requirement include : klsdjdfhdjnvnhdfj.'),
(8, 12, 'Graphics designer', 'We are looking for a experienced  Graphics designer who are willing to work at our company located at \r\n    located at  ,  and expand their knowledge. \r\n    The candidate must be of age group 20-30. \r\n    They must  at least have degree of BIT. Additional requirement include : fjnkfvfbhf.'),
(11, 2, 'Software Professional Required', 'We are looking for a experienced  Software Professional Required who are willing to work at our company and expand their knowledge. The candidate must be of age group 20-30. They must  at least have degree of MIT. Additional requirement include : 2 years experience as  IT officer,  should have knowledge of software pragrams etc.'),
(21, 4, 'Social Media Marketing', 'We are looking for a experienced  Social Media Marketing who are willing to work at our company and expand their knowledge. The candidate must be of age group 23-28. They must  at least have degree of B.C.A. Additional requirement include : Bachelor’s or master’s degree in marketing or a related field ,Proven working experience in digital marketing, particularly within the industry ,Demonstrable experience leading and managing SEO/SEM, marketing database, and social media advertising campaigns, Solid knowledge of website and marketing analytics tools (e.g., Google Analytics, NetInsight, Omniture, WebTrends, SEMRush, etc.),Experience in setting up and optimizing PPC campaigns on all major search engines,Working knowledge of HTML, CSS, and JavaScript development and constraints.'),
(22, 21, 'sanish', 'We are looking for a experienced  sanish who are willing to work at our company located at located at Katunje  , Bhaktapur and expand their knowledge. The candidate must be of age group 15. They must  at least have degree of cs-minqual. Additional requirement include : CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries  and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router.'),
(23, 23, 'Frontend Developer ', 'We are looking for a experienced  Frontend Developer  who are willing to work at our company located at located at Katunje  , Bhaktapur and expand their knowledge. The candidate must be of age group 20-30. They must  at least have degree of Csit. Additional requirement include : CSS Cascading Style Sheets (CSS) Box Model Responsive Design Media Queries Flexbox Grid Layout CSS Preprocessors (e.g., SASS, LESS) CSS Frameworks (e.g., Bootstrap, Materialize) HTML HyperText Markup Language (HTML) Semantic HTML Document Object Model (DOM) Accessibility Forms and Input Semantic Web Web Standards Browser Compatibility JavaScript JavaScript (JS) Variables Functions Control Flow Arrays Objects Scope Callbacks Asynchronous Programming Libraries  and Frameworks (e.g., jQuery, Node.js, Angular.js) React.js React.js Virtual DOM JSX Components State Props Lifecycle methods Hooks Redux React Router.'),
(24, 24, 'Devops', 'We are looking for a experienced  Devops who are willing to work at our company located at located at Bhaktapur , naya pati and expand their knowledge. The candidate must be of age group 20-35. They must  at least have degree of MIT. Additional requirement include : Continuous Integration (CI) Continuous Delivery (CD) Infrastructure as Code (IaC) Configuration Management Cloud Computing Containers (Docker, Kubernetes) Agile Methodology DevOps Culture and Practices Git and Version Control Monitoring and Logging Automation Tools (Jenkins, Ansible, Chef, Puppet).'),
(25, 25, 'Sr. electrician', 'We are looking for a experienced  Sr. electrician who are willing to work at our company located at located at 1290 Beaumont Ave 9th St. , Beaumont and expand their knowledge. The candidate must be of age group 22-30. They must  at least have degree of PHD. Additional requirement include : Graduate form Lamar.'),
(26, 27, 'creative Digital Marketing Officer', 'We are looking for a experienced  creative Digital Marketing Officer who are willing to work at our company located at located at 1290 oregon ave , Beaumont and expand their knowledge. The candidate must be of age group 30. They must  at least have degree of MS. Additional requirement include : \r\nDigital Marketing, Online Marketing, Social Media Marketing, Facebook Ads, Google Ads, Instagram Marketing, SEO, Search Engine Optimization, Email Marketing, Content Creation, Content Writing, Keyword Research, Brand Promotion, Campaign Planning, Lead Generation, Audience Engagement, Marketing Analytics, Website Traffic Analysis, Reporting, Canva, Graphic Design Basics, Communication Skills, Creativity.\r\n.');

-- --------------------------------------------------------

--
-- Table structure for table `news_master`
--

CREATE TABLE `news_master` (
  `NewsId` int NOT NULL,
  `News` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `NewsDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news_master`
--

INSERT INTO `news_master` (`NewsId`, `News`, `NewsDate`) VALUES
(2, 'Vacancy data extented by Global IME Bank to December 25th 2023', '2026-05-12'),
(4, 'BMC JOB Station announce new web application. Application will lunch on new year 2080', '2026-01-01'),
(5, 'test', '2026-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_master`
--

CREATE TABLE `walkin_master` (
  `WalkInId` int NOT NULL,
  `CompanyName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `JobTitle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Vacancy` int NOT NULL,
  `MinQualification` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `InterviewDate` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `InterviewTime` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_master`
--

INSERT INTO `walkin_master` (`WalkInId`, `CompanyName`, `JobTitle`, `Vacancy`, `MinQualification`, `Description`, `InterviewDate`, `InterviewTime`) VALUES
(0, 'Ainsoft Limited', 'Cleaner', 23, 'Graduate', 'sfd', '2023-05-25', '16:07'),
(1, 'Lamar', 'Hr', 1, 'Graduate', 'Please bring your necessary docs', '2026-05-23', '15:53'),
(2, 'Amazon', 'Creative Digital Marketing Officer for SD', 1, 'Graduate', 'We are looking for a creative Digital Marketing Officer to manage online marketing, social media campaigns, content creation, search engine optimization, email marketing, brand promotion, and digital advertising. ', '2026-05-22', '16:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_myself`
--
ALTER TABLE `about_myself`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `jobseek_id` (`jobseek_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_master`
--
ALTER TABLE `application_master`
  ADD PRIMARY KEY (`ApplicationId`);

--
-- Indexes for table `employer_reg`
--
ALTER TABLE `employer_reg`
  ADD PRIMARY KEY (`Employer_Id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackId`),
  ADD KEY `JobSeekId` (`JobSeekId`);

--
-- Indexes for table `jobseeker_education`
--
ALTER TABLE `jobseeker_education`
  ADD PRIMARY KEY (`EduId`),
  ADD KEY `JobSeekId` (`JobSeekId`);

--
-- Indexes for table `jobseeker_reg`
--
ALTER TABLE `jobseeker_reg`
  ADD PRIMARY KEY (`JobSeekId`);

--
-- Indexes for table `job_master`
--
ALTER TABLE `job_master`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `job_specification`
--
ALTER TABLE `job_specification`
  ADD PRIMARY KEY (`jobspec_id`);

--
-- Indexes for table `news_master`
--
ALTER TABLE `news_master`
  ADD PRIMARY KEY (`NewsId`);

--
-- Indexes for table `walkin_master`
--
ALTER TABLE `walkin_master`
  ADD PRIMARY KEY (`WalkInId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_myself`
--
ALTER TABLE `about_myself`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_master`
--
ALTER TABLE `application_master`
  MODIFY `ApplicationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employer_reg`
--
ALTER TABLE `employer_reg`
  MODIFY `Employer_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jobseeker_education`
--
ALTER TABLE `jobseeker_education`
  MODIFY `EduId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jobseeker_reg`
--
ALTER TABLE `jobseeker_reg`
  MODIFY `JobSeekId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `job_master`
--
ALTER TABLE `job_master`
  MODIFY `JobId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `job_specification`
--
ALTER TABLE `job_specification`
  MODIFY `jobspec_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
