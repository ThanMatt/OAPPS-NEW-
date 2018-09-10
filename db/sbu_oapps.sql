-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2018 at 01:50 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbu_oapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `Account_ID` varchar(10) NOT NULL,
  `Pass` text NOT NULL,
  `Organization` varchar(50) NOT NULL,
  `EmailAddress` text NOT NULL,
  `ContactNumber` text NOT NULL,
  `FullName` text NOT NULL,
  `Batch` text NOT NULL,
  `Type` text NOT NULL,
  `Position` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Pass`, `Organization`, `EmailAddress`, `ContactNumber`, `FullName`, `Batch`, `Type`, `Position`) VALUES
('BACES', '$2y$12$ciJ9IYWYxjHdDxeYHd.jZ.8Irk3iN.cEV/XM1IT2HwV2VMvq74ba6', 'Bedan Advocacy and Consciousness Enhancement Socie', 'baces@sanbeda.edu.ph', '639186758493', 'Don Pedro Fernando', '2018-2019', 'NonPro', 'Representative'),
('BBSF', '$2y$12$g41bvQ2v9OUcQApDNX/2OOKvKnORWD.7HnADufZfDA58NDICCOM0i', 'Bedan Business Spectrum Federation', 'bbsf@sanbeda.edu.ph', '639186054395', 'Joseph Howard Stalin', '2018-2019', 'NonPro', 'Representative'),
('BDT', '$2y$12$1X0PJ7r/CG7eoEMEWEvLIOcov1VxKqWn8kxnsujdCqlv8F03/0Cpm', 'Bedan Dance Theatre', 'bdt@sanbeda.edu.ph', '+639055356312', 'Juan Gabriel Pedro', '2018-2019', 'NonPro', 'Representative'),
('BITS', '$2y$12$.Nvxa0xvWjqajbKiXbLYCut2wj7QIpI2IG87SXFfb6Fa90wtvOPH6', 'Bedan Information Technology Society', 'bits@sanbeda.edu.ph', '+639055577298', 'Aethan Matthew Ilagan', '2018-2019', 'Pro', 'Representative'),
('BMC', '$2y$12$Q5s1X64bPp5uNUUS9oqqhuD1sjXmQvzW7wcvoCcFCTUySBps2DFP.', 'Bedan Mathematics Circle', 'bmc@sanbeda.edu.ph', '+639123456789', 'Don Diego Fernando', '2018-2019', 'NonPro', 'Representative'),
('BMG', '$2y$12$VpSI/CyxgYmUA4nmO5BKkuYC4rE8w/wMa3MncdTim/GgKRuBuvr0e', 'Bedan Musicians Guild', 'bmg@sanbeda.edu.ph', '639185748392', 'Monique Patalinghug', '2018-2019', 'NonPro', 'Representative'),
('BSG', '$2y$12$llbS6RwwbSzK2Nh7fz6ORuwfLZ6Wm1DsJxTR/fnANOu.tZOoGkUUy', 'Bedan Scholars'' Guild', 'bsg@sanbeda.edu.ph', '+639876543210', 'Dwight Howard', '2018-2019', 'NonPro', 'Representative'),
('BV', '$2y$12$Xp9pfmPBteAq3fUBzsB1c./UaTfKDOOy9fJb2o6KtgqLu4Ls4ChAm', 'Bedan Volunteers', 'bv@sanbeda.edu.ph', '639176859403', 'Angelika Gabrielle Corpuz', '2018-2019', 'NonPro', 'Representative'),
('HRDMS', '$2y$12$4N6X0.K1JAVGyWtVXHZUse.NvvhZD7IWIc7L1Zi.FH6TpB8pw3tjy', 'Human Resource Development Management Society', 'hrdms@sanbeda.edu.ph', '6399867594123', 'Gabrielle Jonah Santos', '2018-2019', 'Pro', 'Representative'),
('JBLC', '$2y$12$VEun91RZA4zIkhyeroLpm.1M0dZj3Tonr3CIcpBWqHx/inbUJ.QM.', 'Junior Bedan Law Circle', 'jblc@sanbeda.edu.ph', '6391567891013', 'Nicole Jaime Gatchalian', '2018-2019', 'Pro', 'Representative'),
('JFM', '$2y$12$m8jmHfsLScITt54BG5pWouIyJ1t8F1vSX1b1OP0C1FVzMbSHtkgPa', 'Junior Financial Management', 'jfm@sanbeda.edu.ph', '639762345610', 'Henry Harold Sy', '2018-2019', 'Pro', 'Representative'),
('JPIA', '$2y$12$25ZnYEy.4cCI18nh9YAXk.5fXaYms6vgZuTPvOD8u/68RqjbibV7a', 'Junior Philippine Institute of Accountants', 'jpia@sanbeda.edu.ph', '+639077298534', 'Mei Cruz', '2018-2019', 'Pro', 'Representative'),
('KASB', '$2y$12$e9jXjcxa3vTvRSXHC7VaLu4TIicCndQzD13uQhekXQHu1.TOfGbie', 'Kapisanang Agham ng San Beda', 'kasb@sanbeda.edu.ph', '639768654789', 'Don Juan Fernando', '2018-2019', 'Pro', 'Representative'),
('ManSoc', '$2y$12$Fw3UKBs3LdUCUG5012hBZesk6zKGzSCL414p0qqyUe2YQq/3ox.Ia', 'Management and Entrepreneurship Society', 'mansoc@sanbeda.edu.ph', '639156799102', 'Reagan James Ronald', '2018-2019', 'Pro', 'Representative'),
('OD', '$2y$12$2WTJLFnQcbHmf84YR1gNROGzP8dGtiBqBPhnIbau7zIt062zCp8D2', 'Office of the Dean', 'dean_cas@sanbeda.edu.ph', '+639192847560', 'Christian Brian Bustamante', '2018-2019', 'N/A', 'Dean'),
('OPSA_APN', '$2y$12$VMmSZC86GS7AfiDs5APxBu2HFgBPflbc44Ytcg6f0epbkFwADzcZK', 'Office of the Prefect of Student Activities', 'opsa_ap1@sanbeda.edu.ph', '+639119922888', 'Sybil Agreda', '2018-2019', 'N/A', 'Assistant Prefect (Non-Professional)'),
('OPSA_APP', '$2y$12$2kR/g.q5v9vpAH0DTMplU.06at9APbFCCzKVrR0FkrOqdG/fvVwru', 'Office of the Prefect of Student Activities', 'opsa_app@sanbeda.edu.ph', '+639955887733', 'Julius Tutor', '2018-2019', 'N/A', 'Assistant Prefect (Professional)'),
('OPSA_P', '$2y$12$aGc.JZ.156Pjl/8qoD0louTqrf/1h.Qe3yRA1RAYhCsXmp8PIapuG', 'Office of the Prefect of Student Activities', 'opsa_prefect@sanbeda.edu.ph', '+639981276345', 'Marvin Reyes', '2018-2019', 'N/A', 'Prefect'),
('PSSBU', '$2y$12$dXt6UMrAsbESX1hKBAoI5uNEx1VHP8FJLebSjkg8icaU9e.ZlWpkK', 'Psychology Society of San Beda University', 'pssbu@sanbeda.edu.ph', '639776584321', 'Angelika Gabrielle Corpuz', '2018-2019', 'Pro', 'Representative'),
('SBDS', '$2y$12$oX5VwDHJEpP5o7xDwyO3/OWcCxBevgja9zR/tRkp2WftaA7vFoJDu', 'San Beda Debate Society', 'sbds@sanbeda.edu.ph', '639156783920', 'Joaquin Holala Oasis', '2018-2019', 'NonPro', 'Representative'),
('SBEC', '$2y$12$Q2WOOCO3fxlrfaxV3oFkh.eiNIXGpJyLRY1ld/9R5RE/XvwRl/A6q', 'San Beda English Club', 'sbec@sanbeda.edu.ph', '639177586943', 'John Doe', '2018-2019', 'NonPro', 'Representative'),
('SBES', '$2y$12$hVWw/qHcQOQJvymezxNAj.AKIiZ4SQId3pZwhE1QiRpRIYbCwt0nK', 'San Beda Economics Society', 'sbes@sanbeda.edu.ph', '639156789102', 'Melchora Aquino', '2018-2019', 'Pro', 'Representative'),
('SBJMA', '$2y$12$S7FAyiUOkGHTjc5TgZq5T.tIYFK6avBHeZhLFSNzCW2MKRwtcZFwO', 'San Beda Junior Marketing Association', 'sbjma@sanbeda.edu.ph', '639177685932', 'John Doe', '2018-2019', 'Pro', 'Representative'),
('SBRL', '$2y$12$v/aKCONnwxBvBPqLGpDVh.Ztv6v4gAArYCmasmD6FeHF/cbRMY8GW', 'San Beda Red Lens', 'sbrl@sanbeda.edu.ph', '639778901234', 'Macxmil De Ramos', '2018-2019', 'NonPro', 'Representative'),
('SC', '$2y$12$Q5i25i7zpxND.k10BfIK9uUhgjq5EmBCWgiTzoK/a.Hu0usrBPUrC', 'Student Council', 'representative_sc@sanbeda.edu.ph', '+639155356312', 'Emman Cayabyab', '2018-2019', 'Pro', 'Representative'),
('SC_P', '$2y$12$8Rr4mvXZeDTYkhsfXuY7deb6y9Bnpv8HxNDsMnauFcpIqvM4W.zWS', 'Student Council', 'sc_pres@sanbeda.edu.ph', '+639876567890', 'Arapat Mustapha', '2018-2019', 'N/A', 'President'),
('SC_SG', '$2y$12$.YHBgu4wH20b9Mq5NXulVu/aKs0WjDpBXBZWpt41smt8.fIvzALZG', 'Student Council', 'sc_sec@sanbeda.edu.ph', '+639876567432', 'Chavi Levine Reyes', '2018-2019', 'N/A', 'Secretary-General'),
('SC_TR', '$2y$12$3VenrxD2BQy0147s0WSA8O8e.cgC22bmPEc0Eb.e7H/zt287QMTge', 'Student Council', 'sc_tr@sanbeda.edu.ph', '+639156391022', 'Aaron Darnell Salonga', '2018-2019', 'N/A', 'Treasurer'),
('SOMS', '$2y$12$KdMYQjXr.S8nHQhUZil2AuGyG.SlYdDey69oC6.t7lOoZcPlJhFLm', 'Society of Operations Management Students', 'soms@sanbeda.edu.ph', '639156789012', 'Derrick Henry Rose', '2018-2019', 'Pro', 'Representative'),
('SSHA', '$2y$12$eCQoRm4JAEH6/bO2L0yzS.WMOZVmyFwch6lHW6abLgACqz9GvWYwq', 'Social Sciences and Humanities Association', 'ssha@sanbeda.edu.ph', '639102349123', 'Timothy James Buan', '2018-2019', 'NonPro', 'Representative'),
('UNESCO', '$2y$12$y1GdY9JleSg42CVeImV7IuSP6xldvUDafK6D21B0E6QKeg15wuF3W', 'UNESCO Youth Club of San Beda', 'josephgutierrez@sanbeda.edu.ph', '09178506008', 'Joseph Gutierrez', '2018-2019', 'NonPro', 'Representative');

-- --------------------------------------------------------

--
-- Table structure for table `activity_proposal`
--

CREATE TABLE IF NOT EXISTS `activity_proposal` (
  `Proposal_ID` varchar(10) NOT NULL,
  `Account_ID` varchar(10) NOT NULL,
  `ActivityName` text NOT NULL,
  `DateActivity` text NOT NULL,
  `StartTime` text NOT NULL,
  `EndTime` text NOT NULL,
  `Nature` text NOT NULL,
  `Rationale` text NOT NULL,
  `ActivityChair` text NOT NULL,
  `Participants` text NOT NULL,
  `ActivityVenue` text NOT NULL,
  `ProposalStatus` text NOT NULL,
  `OfficeProposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_proposal`
--

INSERT INTO `activity_proposal` (`Proposal_ID`, `Account_ID`, `ActivityName`, `DateActivity`, `StartTime`, `EndTime`, `Nature`, `Rationale`, `ActivityChair`, `Participants`, `ActivityVenue`, `ProposalStatus`, `OfficeProposal`) VALUES
('1017', 'UNESCO', 'dasdasda', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('4056', 'UNESCO', 'Test', '1997-12-19', '00:00', '12:00', 'foo', 'bar', 'baz', 'qux', 'quux', 'PENDING', 'President'),
('7271', 'BITS', 'test', '1000-12-19', '00:00', '12:00', 'foo', 'bar', 'baz', 'qux', 'quux', 'PENDING', 'Secretary-General'),
('8966', 'BITS', 'IT FAIR', '1997-12-19', '00:00', '12:00', 'foo', 'bar', 'baz', 'qux', 'quux', 'APPROVED', 'Dean');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `CommentID` varchar(50) NOT NULL,
  `Proposal_ID` varchar(50) NOT NULL,
  `Account_ID` varchar(50) NOT NULL,
  `Field` text NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_assets_requirements`
--

CREATE TABLE IF NOT EXISTS `fixed_assets_requirements` (
  `Far_ID` varchar(50) NOT NULL,
  `Proposal_ID` varchar(50) NOT NULL,
  `Account_ID` varchar(50) NOT NULL,
  `Item` text NOT NULL,
  `Quantity` double NOT NULL,
  `Unit_Price` double NOT NULL,
  `Total_Amount` double NOT NULL,
  `Source` text NOT NULL,
  `ProposalStatus` text NOT NULL,
  `OfficeProposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_assets_requirements`
--

INSERT INTO `fixed_assets_requirements` (`Far_ID`, `Proposal_ID`, `Account_ID`, `Item`, `Quantity`, `Unit_Price`, `Total_Amount`, `Source`, `ProposalStatus`, `OfficeProposal`) VALUES
('1454', '8966', 'BITS', 'Foo', 1219, 123, 149937, 'Human Biology', 'APPROVED', 'Dean'),
('3004', '4056', 'UNESCO', 'tae', 12, 129, 1548, 'Information Technology', 'PENDING', 'President'),
('8453', '7271', 'BITS', 'foo', 12, 19, 228, 'Literature', 'PENDING', 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `LogID` varchar(20) NOT NULL,
  `ProposalID` varchar(20) NOT NULL,
  `Activity` text NOT NULL,
  `ActivityType` text NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`LogID`, `ProposalID`, `Activity`, `ActivityType`, `DateTime`) VALUES
('1190', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:56pm Saturday', 'VIEW', '2018-09-01 05:56:36'),
('1496', '8966', 'The proposal was created on September 1, 2018 5:37pm Saturday', 'CREATE', '2018-09-01 05:37:16'),
('1594', '4056', 'The Treasurer of Student Council approved the proposal on September 2, 2018 5:31pm Sunday', 'APPROVE', '2018-09-02 05:31:45'),
('1765', '4056', 'The Secretary-General of Student Council approved the proposal on September 2, 2018 5:31pm Sunday', 'APPROVE', '2018-09-02 05:31:59'),
('2186', '8966', 'The President of Student Council viewed the proposal on September 1, 2018 6:05pm Saturday', 'VIEW', '2018-09-01 06:05:37'),
('2702', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:53pm Saturday', 'VIEW', '2018-09-01 05:53:55'),
('2845', '8966', 'The Secretary-General of Student Council approved the proposal on September 1, 2018 5:57pm Saturday', 'APPROVE', '2018-09-01 05:57:56'),
('2977', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:56pm Saturday', 'VIEW', '2018-09-01 05:56:33'),
('3001', '8966', 'The Prefect of Office of the Prefect of Student Activities approved the proposal on September 1, 2018 6:12pm Saturday', 'APPROVE', '2018-09-01 06:12:04'),
('3333', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:56pm Saturday', 'VIEW', '2018-09-01 05:56:28'),
('3458', '8966', 'The Assistant Prefect (Professional) of Office of the Prefect of Student Activities approved the proposal on September 1, 2018 6:09pm Saturday', 'APPROVE', '2018-09-01 06:09:18'),
('3926', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:56pm Saturday', 'VIEW', '2018-09-01 05:56:43'),
('4109', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:57pm Saturday', 'VIEW', '2018-09-01 05:57:05'),
('4433', '8966', 'The Dean of Office of the Dean viewed the proposal on September 1, 2018 6:14pm Saturday', 'VIEW', '2018-09-01 06:14:01'),
('4523', '8966', 'The Assistant Prefect (Professional) of Office of the Prefect of Student Activities viewed the proposal on September 1, 2018 6:09pm Saturday', 'VIEW', '2018-09-01 06:09:12'),
('4867', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:56pm Saturday', 'VIEW', '2018-09-01 05:56:30'),
('5040', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:56pm Saturday', 'VIEW', '2018-09-01 05:56:38'),
('5251', '7271', 'The proposal was created on September 8, 2018 7:00pm Saturday', 'CREATE', '2018-09-08 07:00:10'),
('5282', '8966', 'The Prefect of Office of the Prefect of Student Activities viewed the proposal on September 1, 2018 6:11pm Saturday', 'VIEW', '2018-09-01 06:11:59'),
('5392', '4056', 'The Secretary-General of Student Council viewed the proposal on September 2, 2018 5:31pm Sunday', 'VIEW', '2018-09-02 05:31:57'),
('5976', '8966', 'The Treasurer of Student Council approved the proposal on September 1, 2018 5:56pm Saturday', 'APPROVE', '2018-09-01 05:56:39'),
('6559', '4056', 'The Treasurer of Student Council viewed the proposal on September 2, 2018 5:31pm Sunday', 'VIEW', '2018-09-02 05:31:42'),
('6923', '8966', 'The Secretary-General of Student Council viewed the proposal on September 1, 2018 5:57pm Saturday', 'VIEW', '2018-09-01 05:57:50'),
('6929', '8966', 'The Prefect of Office of the Prefect of Student Activities viewed the proposal on September 1, 2018 6:11pm Saturday', 'VIEW', '2018-09-01 06:11:56'),
('6931', '8966', 'The Prefect of Office of the Prefect of Student Activities viewed the proposal on September 1, 2018 6:12pm Saturday', 'VIEW', '2018-09-01 06:12:02'),
('7435', '8966', 'The Dean of Office of the Dean viewed the proposal on September 1, 2018 6:13pm Saturday', 'VIEW', '2018-09-01 06:13:59'),
('7920', '8966', 'The President of Student Council viewed the proposal on September 1, 2018 6:05pm Saturday', 'VIEW', '2018-09-01 06:05:41'),
('8114', '8966', 'The Treasurer of Student Council viewed the proposal on September 1, 2018 5:53pm Saturday', 'VIEW', '2018-09-01 05:53:58'),
('8399', '8966', 'The President of Student Council approved the proposal on September 1, 2018 6:05pm Saturday', 'APPROVE', '2018-09-01 06:05:43'),
('8528', '8966', 'The President of Student Council viewed the proposal on September 1, 2018 6:05pm Saturday', 'VIEW', '2018-09-01 06:05:34'),
('8834', '8966', 'The President of Student Council viewed the proposal on September 1, 2018 6:05pm Saturday', 'VIEW', '2018-09-01 06:05:31'),
('9101', '4056', 'The Treasurer of Student Council viewed the proposal on September 2, 2018 5:31pm Sunday', 'VIEW', '2018-09-02 05:31:41'),
('9433', '8966', 'The Dean of Office of the Dean approved the proposal on September 1, 2018 6:14pm Saturday', 'APPROVE', '2018-09-01 06:14:06'),
('9801', '8966', 'The Assistant Prefect (Professional) of Office of the Prefect of Student Activities viewed the proposal on September 1, 2018 6:09pm Saturday', 'VIEW', '2018-09-01 06:09:15'),
('9850', '8966', 'The Dean of Office of the Dean viewed the proposal on September 1, 2018 6:14pm Saturday', 'VIEW', '2018-09-01 06:14:04'),
('9894', '4056', 'The proposal was created on September 2, 2018 5:14pm Sunday', 'CREATE', '2018-09-02 05:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `operating_expenses`
--

CREATE TABLE IF NOT EXISTS `operating_expenses` (
  `OE_ID` varchar(50) NOT NULL,
  `Proposal_ID` varchar(50) NOT NULL,
  `Account_ID` varchar(50) NOT NULL,
  `Item` text NOT NULL,
  `Quantity` double NOT NULL,
  `Unit_Price` double NOT NULL,
  `Total_Amount` double NOT NULL,
  `Source` text NOT NULL,
  `ProposalStatus` text NOT NULL,
  `OfficeProposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operating_expenses`
--

INSERT INTO `operating_expenses` (`OE_ID`, `Proposal_ID`, `Account_ID`, `Item`, `Quantity`, `Unit_Price`, `Total_Amount`, `Source`, `ProposalStatus`, `OfficeProposal`) VALUES
('4916', '8966', 'BITS', 'yee', 12, 123, 1476, 'Human Biology', 'APPROVED', 'Dean'),
('7178', '4056', 'UNESCO', 'dasd', 123, 123, 15129, 'Human Biology', 'PENDING', 'President'),
('7796', '7271', 'BITS', 'bar', 121, 19, 2299, 'Human Biology', 'PENDING', 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `timestamp`
--

CREATE TABLE IF NOT EXISTS `timestamp` (
  `Proposal_ID` varchar(10) NOT NULL,
  `DateProposed` text NOT NULL,
  `SC_TR_TimeIn` text NOT NULL,
  `SC_SG_TimeIn` text NOT NULL,
  `SC_P_TimeIn` text NOT NULL,
  `OPSA_APP_TimeIn` text NOT NULL,
  `OPSA_APN_TimeIn` text NOT NULL,
  `OPSA_P_TimeIn` text NOT NULL,
  `OD_TimeIn` text NOT NULL,
  `TimeApproved` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timestamp`
--

INSERT INTO `timestamp` (`Proposal_ID`, `DateProposed`, `SC_TR_TimeIn`, `SC_SG_TimeIn`, `SC_P_TimeIn`, `OPSA_APP_TimeIn`, `OPSA_APN_TimeIn`, `OPSA_P_TimeIn`, `OD_TimeIn`, `TimeApproved`) VALUES
('8966', '09/01/2018', '09-01-2018 05:57:05pm', '09-01-2018 05:57:56pm', '09-01-2018 06:05:41pm', '09-01-2018 06:09:15pm', '', '09-01-2018 06:12:02pm', '09-01-2018 06:14:04pm', '09-01-2018 06:14:06pm'),
('4056', '09/02/2018', '09-02-2018 05:31:45pm', '09-02-2018 05:31:59pm', '00-00-0000 00:00:00am', '', '', '', '', ''),
('1017', '09/02/2018', '', '', '', '', '', '', '', ''),
('7271', '09/08/2018', '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Account_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `activity_proposal`
--
ALTER TABLE `activity_proposal`
  ADD PRIMARY KEY (`Proposal_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `Proposal_ID` (`Proposal_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `fixed_assets_requirements`
--
ALTER TABLE `fixed_assets_requirements`
  ADD PRIMARY KEY (`Far_ID`),
  ADD KEY `Proposal_ID` (`Proposal_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `ProposalID` (`ProposalID`);

--
-- Indexes for table `operating_expenses`
--
ALTER TABLE `operating_expenses`
  ADD PRIMARY KEY (`OE_ID`),
  ADD KEY `Proposal_ID` (`Proposal_ID`,`Account_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `timestamp`
--
ALTER TABLE `timestamp`
  ADD KEY `Proposal_ID` (`Proposal_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_proposal`
--
ALTER TABLE `activity_proposal`
  ADD CONSTRAINT `activity_proposal_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fixed_assets_requirements`
--
ALTER TABLE `fixed_assets_requirements`
  ADD CONSTRAINT `fixed_assets_requirements_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fixed_assets_requirements_ibfk_2` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`ProposalID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `operating_expenses`
--
ALTER TABLE `operating_expenses`
  ADD CONSTRAINT `operating_expenses_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operating_expenses_ibfk_2` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timestamp`
--
ALTER TABLE `timestamp`
  ADD CONSTRAINT `timestamp_ibfk_1` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
