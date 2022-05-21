-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 09:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'ta@gmail.com', '$2y$10$PRfLW9EIr83/YmnRt5GQlO1dp2NCRXywB9TDZ2OpuUR3fgfD9KrZ2');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `currently_working` text NOT NULL,
  `designation` text NOT NULL,
  `degrees` text NOT NULL,
  `phone_no` text NOT NULL,
  `password` varchar(99) NOT NULL DEFAULT '123456789',
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `email`, `first_name`, `last_name`, `currently_working`, `designation`, `degrees`, `phone_no`, `password`, `creation_date`) VALUES
(2, 'mh@gmail.com', 'Moshaarof', 'Hasan', 'DMC', 'Assistant professor', 'MS ', '01454545554', '$2y$10$jXjcFMqh5qFM8aqw4.1XkeCYfyO0dlZqwg2ihw3oNAiJZ5LR2xF.u', '2022-04-27 13:21:00'),
(3, 'kh@gmail.com', 'Kamal', 'Hossain', 'CMC', 'Head of dept', 'FRCP ', '01111111111', '$2y$10$8RHPrrBekHYiyNSJ2iHKcOkLPYl.QI8lf8kWm8Z.ZUwIua.ppWEc6', '2022-05-06 14:04:53'),
(4, 'nd@gmail.com', 'Nibedita', 'Das', 'KMC', 'Assistant professor', 'MRCS-surgery ', '04154562656', '$2y$10$.ZbWSElzvQxCFEJg15dFseh.4ShjH9dd6Eqx.CB1FTrb4uskPoUO6', '2022-05-06 14:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `doc_name` text NOT NULL,
  `meds_name` text NOT NULL,
  `indication` text NOT NULL,
  `usage` text NOT NULL,
  `sideeffects` text NOT NULL,
  `meds_type` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `doc_name`, `meds_name`, `indication`, `usage`, `sideeffects`, `meds_type`, `date`) VALUES
(2, 'mh@gmail.com', 'Napa Extend', 'Paracetamol is indicated for fever, common cold and influenza, headache, toothache, earache, bodyache, myalgia, neuralgia, dysmenorrhoea, sprains, colic pain, back pain, post-operative pain, postpartum pain, inflammatory pain and post vaccination pain in children. It is also indicated for rheumatic & osteoarthritic pain and stiffness of joints.', 'Adult: 1-2 tablets every 4 to 6 hours up to a maximum of 4 gm (8 tablets) daily.\nChildren (6-12 years): ½ to 1 tablet 3 to 4 times daily. For long term treatment it is wise not to exceed the dose beyond 2.6 gm/day.', 'Patients who have taken barbiturates, tricyclic antidepressants and alcohol may show diminished ability to metabolise large doses of Paracetamol. Alcohol can increase the hepatotoxicity of Paracetamol overdosage. Chronic ingestion of anticonvulsants or oral steroid contraceptives induce liver enzymes and may prevent attainment of therapeutic Paracetamol levels by increasing first-pass metabolism or clearance.', 'Tablet', '2022-04-27 23:03:52'),
(3, 'mh@gmail.com', '1stCef', 'It is indicated for the treatment of upper respiratory tract infections (pharyngitis and tonsillitis) caused by Streptococcus pyogenes (group-A beta-hemolytic Streptococci) and Streptococcus pneumoniae; urinary tract infections caused by E. coli, Proteus mirabilis, and Klebsiella species and skin & soft tissue infections caused by Staphylococci (including penicillinase producing bacteria) and Streptococci.', 'Adult:\r\nPharyngitis and Tonsillitis: 1 g per day in one or two divided doses.\r\nUrinary Tract Infections: 1 or 2 g per day in one or two divided doses.\r\nSkin and Skin Structure Infections: 1 g per day in one or two divided doses.\r\nChildren: 30 mg/kg daily in divided doses every 12 hours.\r\n\r\nIt may be taken with meals or on empty stomach. Administration with food may be helpful in diminishing potential gastrointestinal complaints.', 'Generally Cefadroxil is well tolerated. However, the most commonly reported side effects are gastrointestinal disturbances and hypersensitivity phenomena.', 'Capsules', '2022-04-27 23:05:26'),
(5, 'nd@gmail.com', '3RD Cef', 'Cefixime is indicated in the treatment of the following infections when caused by the susceptible strains of the designated microorganisms:\r\nUncomplicated urinary tract infections caused by Escherichia coli and Proteus mirabilis.\r\nOtitis Media caused by Haemophilus influenzae, Moraxella catarrhalis and Streptococcus pyogenes.\r\nPharyngitis and tonsillitis caused by Streptococcus pyogenes.\r\nAcute bronchitis and acute exacerbations of chronic bronchitis caused by Streptococcus pneumoniae and Haemophilus influenzae.\r\nUncomplicated gonorrhoea (cervical/urethral) caused by Neisseria gonorrhoeae.', '\r\nAdult and children over 12 years: The recommended adult dose is 200-400 mg (1 to 2 capsules) daily, given either as a single dose or in two divided doses.\r\nChildren (6 month or older): Usually 8 mg/kg/day given as a single dose or in two divided doses or may be given as following\r\n½-1 year: 75 mg daily.\r\n1-4 years: 100 mg daily.\r\n5-10 years: 200 mg daily.\r\n11-12 years: 300 mg daily\r\nIn typhoid fever, dosage should be 10 mg/kg/day for 14 days.', 'The drug is generally well tolerated. The most frequent side effects are diarrhoea and stool changes; that have been more commonly associated with higher doses. Other side effects are nausea, abdominal pain, dyspepsia, vomiting, flatulence, headache and dizziness. Allergies in the form of rash, pruritus, urticaria, drug fever and arthralgia have been reported. These reactions usually subsided upon dicontinuation of therapy.', 'Tablet', '2022-05-06 15:55:23'),
(6, 'nd@gmail.com', '3-C', 'Cefixime is indicated in the treatment of the following infections when caused by the susceptible strains of the designated microorganisms:\r\nUncomplicated urinary tract infections caused by Escherichia coli and Proteus mirabilis.\r\nOtitis Media caused by Haemophilus influenzae, Moraxella catarrhalis and Streptococcus pyogenes.\r\nPharyngitis and tonsillitis caused by Streptococcus pyogenes.\r\nAcute bronchitis and acute exacerbations of chronic bronchitis caused by Streptococcus pneumoniae and Haemophilus influenzae.\r\nUncomplicated gonorrhoea (cervical/urethral) caused by Neisseria gonorrhoeae.', 'Adult and children over 12 years: The recommended adult dose is 200-400 mg (1 to 2 capsules) daily, given either as a single dose or in two divided doses. For the treatment of uncomplicated cervical/urethral gonococcal infections, a single oral dose of Cefixime 400 mg is recommended.\r\n\r\nChildren (6 month or older): Usually 8 mg/kg/day given as a single dose or in two divided doses or may be given as following\r\n½-1 year: 75 mg daily.\r\n1-4 years: 100 mg daily.\r\n5-10 years: 200 mg daily.\r\n11-12 years: 300 mg daily\r\nIn typhoid fever, dosage should be 10 mg/kg/day for 14 days', 'The drug is generally well tolerated. The most frequent side effects are diarrhoea and stool changes; that have been more commonly associated with higher doses. Other side effects are nausea, abdominal pain, dyspepsia, vomiting, flatulence, headache and dizziness. Allergies in the form of rash, pruritus, urticaria, drug fever and arthralgia have been reported. These reactions usually subsided upon dicontinuation of therapy.', 'Capsules', '2022-05-06 15:55:45'),
(8, 'nd@gmail.com', 'Acne-Aid ', 'Bar Cleanser for acne & greasy skin. Liquid cleanser Soap-free cleanser for acne prone and oily skin conditions.', 'Use on the face or other affected areas. Wash as with an ordinary soap and massage the creamy lather into the skin. Wet skin, apply & rinse off w/ water once or bid. Using warm water, gently rub the soap on the skin until a rich lather is formed. Massage briskly and rinse thoroughly.\r\n\r\nThis Liquid cleanser can be used both with water and without water for face. If the cleanser is used with water, apply liberal amount of cleanser to the skin. Massage gently in circular motion. Rinse with water. In case it is used without water, apply cleanser to the skin and massage gently in circular motion, remove excess with soft tissue or cotton wool.', 'Mild irritation, skin sensitization', 'Tablet', '2022-05-06 15:57:38'),
(9, 'nd@gmail.com', 'Actemra', 'Tocilizumab is an interleukin-6 (IL-6) receptor antagonist indicated for treatment of:\r\nRheumatoid Arthritis (RA): Adult patients with moderately to severely active rheumatoid arthritis who have had an inadequate response to one or more Disease-Modifying Anti-Rheumatic Drugs (DMARDs).\r\nGiant Cell Arteritis (GCA): Adult patients with giant cell arteritis.\r\nSystemic Sclerosis-Associated Interstitial Lung Disease (SSc-ILD): Slowing the rate of decline in pulmonary function in adult patients with systemic sclerosis-associated ... Read more', 'Patients less than 100 kg weight: 162 mg administered subcutaneously every other week, followed by an increase to every week based on clinical response\r\nPatients at or above 100 kg weight: 162 mg administered subcutaneously every week.', 'Most common adverse reactions (incidence of at least 5%): upper respiratory tract infections, nasopharyngitis, headache, hypertension, increased ALT, injection site reactions.', 'Injections', '2022-05-06 15:58:07'),
(10, 'nd@gmail.com', 'Zostiva ', 'Valacyclovir is indicated for the treatment of Herpes zoster (shingles). It is indicated for the treatment or suppression of genital herpes in immuno-competent individuals and for the suppression of recurrent genital herpes in HIV infected individuals. It is also indicated for the treatment of cold sores (Herpes labialis).', 'Adult Dosage:\r\nCold Sores: 2 grams every 12 hours for 1 day\r\nGenital Herpes:\r\n\r\nInitial episode: 1 gram twice daily for 10 days\r\nRecurrent episodes: 500 mg twice daily for 3 days Suppressive therapy\r\nImmunocompetent patients: 1 gram once daily\r\nAlternate dose in patients with < 9 recurrences/year: 500 mg once daily\r\nHIV-infected patients: 500 mg twice daily\r\nReduction of transmission: 500 mg once daily\r\nHerpes Zoster: 1 gram 3 times daily for 7 days\r\n\r\nPediatric Dosage:\r\nCold Sores (> 12 years of age): 2 grams every 12 hours for 1 day\r\nChickenpox (2 to < 18 years of age): 20 mg/kg 3 times daily for 5 days; not to exceed 1 gram 3 times daily', 'The most frequently reported adverse reactions were nausea (15%), headache (14%), vomiting (6%), dizziness (3%) and abdominal pain (3%)', 'Tablet', '2022-05-06 15:58:51'),
(11, 'nd@gmail.com', 'Zosert', 'Sertraline is indicated for the treatment of-\r\nMajor depressive disorder (MDD)\r\nObsessive-compulsive disorder (OCD)\r\nPanic disorder (PD)\r\nPost-traumatic stress disorder (PTSD)\r\nSocial anxiety disorder (SAD)\r\nPremenstrual dysphoric disorder (PMDD).', 'Adults-\r\nMajor depressive disorder:\r\nStarting Dose: 50 mg\r\nTherapeutic Range: 50-200 mg\r\nObsessive-compulsive disorder:\r\nStarting Dose: 50 mg\r\nTherapeutic Range: 50-200 mg\r\nPanic disorder, Post-traumatic stress disorder, Social anxiety disorder:\r\nStarting Dose: 25 mg\r\nTherapeutic Range: 50-200 mg\r\nPediatric Patients (ages 6-12 years old)-\r\nObsessive-compulsive disorder:\r\nStarting Dose: 25 mg\r\nTherapeutic Range: 50-200 mg\r\nThe recommended interval between dose changes is one week.', 'Sertraline may cause side effects like upset stomach, diarrhoea, constipation, vomiting, dry mouth, loss of appetite, weight changes, drowsiness, dizziness, headache, pain, burning or tingling in the hands or feet, excitement, sore throat etc.', 'Tablet', '2022-05-06 15:59:12'),
(12, 'nd@gmail.com', 'Zox ', 'Nitazoxanide is indicated for the treatment of diarrhea caused by Cryptosporidium parvum, Giardia lamblia and Entamoeba histolytica.', 'Age 1-3 years: 1 tea-spoonfull or 5 ml suspension every 12 hours for 3 days.\r\nAge 4-11 years: 2 tea-spoonfulls or 10 ml suspension every 12 hours for 3 days.\r\nAge 12 years or above: 5 tea-spoonfulls (25 ml) suspension or 1 tablet every 12 hours for 3 days.\r\n', 'The most frequent side effects, reported by Nitazoxanide are abdominal pain, vomiting and headache. These side effects are typically mild and transient in nature. Very rare side effects include- nausea, anorexia, flatulence, increased appetite, enlarged salivary glands, increased creatinine & SGPT level, pruritus, rhinitis, sweating, dizziness, discolored urine etc.', 'Tablet', '2022-05-06 15:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `age` text NOT NULL,
  `address` text NOT NULL,
  `gender` text NOT NULL,
  `patient_data` text NOT NULL,
  `phone` text NOT NULL,
  `assign_doctor` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `first_name`, `last_name`, `email`, `age`, `address`, `gender`, `patient_data`, `phone`, `assign_doctor`, `date`) VALUES
(8, 'Abdul', 'Kyume', 'abbirtak@gmail.com', '25', 'Jatrabari, Dhaka', 'male', 'fever', '45645646543', 'mh@gmail.com', '2022-04-27 22:50:11'),
(9, 'Abdur', 'Rahman', 'ar@gmail.com', '18', 'Khilgaon,Dhaka', 'male', 'Coughing for 7 days, High Temperature', '45963587962', 'nd@gmail.com', '2022-05-06 15:43:06'),
(10, 'Kazi', 'Fatema', 'kf@gmail.com', '46', 'Jatrabari,Dhaka', 'female', 'Standing Difficulties, Pain in Right shoulder', '86528754564', 'nd@gmail.com', '2022-05-06 15:53:20'),
(11, 'Irfan', 'Azad', 'ia@gmail.com', '24', 'Malibagh, Dhaka', 'male', 'T.B.', '65465465454', 'mh@gmail.com', '2022-05-06 23:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medi_name` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`id`, `patient_id`, `medi_name`, `date`) VALUES
(94, 9, '3RD Cef', '2022-05-06'),
(95, 9, 'Actemra', '2022-05-06'),
(96, 9, 'Zosert', '2022-05-06'),
(199, 10, '3RD Cef', '2022-05-06'),
(200, 10, '3-C', '2022-05-06'),
(201, 10, 'Acne-Aid ', '2022-05-06'),
(206, 11, '1stCef', '2022-05-06'),
(207, 11, 'Napa Extend', '2021-05-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`,`email`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
