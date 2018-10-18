-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2018 at 02:34 PM
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
  `ChairContactNumber` text NOT NULL,
  `Participants` text NOT NULL,
  `ActivityVenue` text NOT NULL,
  `ProposalType1` text NOT NULL,
  `Partners` text NOT NULL,
  `ProposalType2` text NOT NULL,
  `NonAcademicType` text NOT NULL,
  `Specified` text NOT NULL,
  `ProposalStatus` text NOT NULL,
  `OfficeProposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_proposal`
--

INSERT INTO `activity_proposal` (`Proposal_ID`, `Account_ID`, `ActivityName`, `DateActivity`, `StartTime`, `EndTime`, `Nature`, `Rationale`, `ActivityChair`, `ChairContactNumber`, `Participants`, `ActivityVenue`, `ProposalType1`, `Partners`, `ProposalType2`, `NonAcademicType`, `Specified`, `ProposalStatus`, `OfficeProposal`) VALUES
('1413', 'BITS', 'adsa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('4585', 'BITS', 'fsdfsd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('4769', 'BITS', 'dadas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('4969', 'BITS', 'Trend Micro Conference', '2018-12-09', '13:00', '17:00', 'Trend Micro', 'foo', 'Emman Cayabyab', '+639055577298', 'San Beda University I.T. students', 'EDSA Shangri-la', 'Independent', '', 'Academic', '', '', 'PENDING', 'SC_SG'),
('7927', 'BITS', 'yeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('8495', 'BITS', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9074', 'BITS', 'Sample', '8888-12-06', '02:02', '07:07', 'jkhuhjkh', 'jhjk', ',jnjh', 'mnj,nnbm', 'nmbmn', 'nbmbmn', 'Independent', '', 'Academic', '', '', 'PENDING', 'OPSA_APP'),
('9188', 'BITS', 'dlakdl;sk', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9474', 'SBRL', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9545', 'SBRL', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9589', 'SBRL', 'dasdad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9901', 'PSSBU', 'Aethan’s Birthday Parties', '2018-10-12', '12:32', '01:33', 'Hardy', 'yee', 'Aethan', '0918619911', 'Aethan himself', 'Kids worl', 'Independent', '', 'Academic', '', '', 'UNDER REVISION', 'OPSA_APP');

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

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `Proposal_ID`, `Account_ID`, `Field`, `Comment`) VALUES
('5426', '9901', 'OPSA_APP', 'Activity Name', 'Pakiayos naman ung title gago naman to');

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
('1007', '9589', 'SBRL', '', 0, 0, 0, '', '', ''),
('2026', '1413', 'BITS', '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `LogID` int(11) NOT NULL,
  `Activity` varchar(100) NOT NULL,
  `ActivityType` int(11) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`LogID`, `Activity`, `ActivityType`, `DateTime`) VALUES
(9, 'User BITS logged in', 1, '2018-10-17 10:10:17'),
(10, 'User SBRL created the proposal 9589', 8, '2018-10-17 10:19:46'),
(11, 'User BITS logged out', 0, '2018-10-17 10:32:40'),
(12, 'User SBRL logged in', 1, '2018-10-17 10:32:52'),
(13, 'User SBRL logged out', 0, '2018-10-17 10:33:04');

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
('7459', '1413', 'BITS', '', 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_tracker`
--

CREATE TABLE IF NOT EXISTS `proposal_tracker` (
  `Proposal_ID` varchar(30) NOT NULL,
  `Account_ID` varchar(30) NOT NULL,
  `SC_TR` text NOT NULL,
  `SC_SG` text NOT NULL,
  `SC_P` text NOT NULL,
  `OPSA_APP` text NOT NULL,
  `OPSA_APN` text NOT NULL,
  `OPSA_P` text NOT NULL,
  `OD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proposal_tracker`
--

INSERT INTO `proposal_tracker` (`Proposal_ID`, `Account_ID`, `SC_TR`, `SC_SG`, `SC_P`, `OPSA_APP`, `OPSA_APN`, `OPSA_P`, `OD`) VALUES
('4969', 'BITS', '', 'PENDING', '', '', '', '', ''),
('9901', 'PSSBU', '', 'APPROVED', 'APPROVED', 'UNDER REVISION', '', '', ''),
('9074', 'BITS', '', 'APPROVED', 'APPROVED', 'PENDING', '', '', '');

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
('4969', '2018-10-12', '', '2018-10-12 03:54:24pm', '', '', '', '', '', ''),
('9901', '2018-10-12', '', '2018-10-12 03:53:58pm', '2018-10-12 03:57:11pm', '2018-10-12 03:57:54pm', '', '', '', ''),
('9074', '2018-10-12', '', '2018-10-12 03:45:29pm', '2018-10-12 01:04:07pm', '2018-10-12 03:59:49pm', '', '', '', ''),
('9545', '2018-10-12', '', '', '', '', '', '', '', ''),
('9474', '2018-10-12', '', '', '', '', '', '', '', ''),
('9188', '2018-10-12', '', '', '', '', '', '', '', ''),
('8495', '2018-10-17', '', '', '', '', '', '', '', ''),
('4585', '2018-10-17', '', '', '', '', '', '', '', ''),
('7927', '2018-10-17', '', '', '', '', '', '', '', ''),
('4769', '2018-10-17', '', '', '', '', '', '', '', ''),
('1413', '2018-10-17', '', '', '', '', '', '', '', ''),
('9589', '2018-10-17', '', '', '', '', '', '', '', '');

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
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `operating_expenses`
--
ALTER TABLE `operating_expenses`
  ADD PRIMARY KEY (`OE_ID`),
  ADD KEY `Proposal_ID` (`Proposal_ID`,`Account_ID`),
  ADD KEY `Account_ID` (`Account_ID`);

--
-- Indexes for table `proposal_tracker`
--
ALTER TABLE `proposal_tracker`
  ADD KEY `Proposal_ID` (`Proposal_ID`);

--
-- Indexes for table `timestamp`
--
ALTER TABLE `timestamp`
  ADD KEY `Proposal_ID` (`Proposal_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
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
-- Constraints for table `operating_expenses`
--
ALTER TABLE `operating_expenses`
  ADD CONSTRAINT `operating_expenses_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `accounts` (`Account_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `operating_expenses_ibfk_2` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal_tracker`
--
ALTER TABLE `proposal_tracker`
  ADD CONSTRAINT `proposal_tracker_ibfk_1` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timestamp`
--
ALTER TABLE `timestamp`
  ADD CONSTRAINT `timestamp_ibfk_1` FOREIGN KEY (`Proposal_ID`) REFERENCES `activity_proposal` (`Proposal_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
