-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2018 at 03:52 AM
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
('BBS', '$2y$12$g41bvQ2v9OUcQApDNX/2OOKvKnORWD.7HnADufZfDA58NDICCOM0i', 'Bedan Business Spectrum', 'bbsf@sanbeda.edu.ph', '639186054395', 'Joseph Howard Stalin', '2018-2019', 'NonPro', 'Representative'),
('BDT', '$2y$12$1X0PJ7r/CG7eoEMEWEvLIOcov1VxKqWn8kxnsujdCqlv8F03/0Cpm', 'Bedan Dance Theatre', 'bdt@sanbeda.edu.ph', '+639055356312', 'Juan Gabriel Pedro', '2018-2019', 'NonPro', 'Representative'),
('BITS', '$2y$12$.Nvxa0xvWjqajbKiXbLYCut2wj7QIpI2IG87SXFfb6Fa90wtvOPH6', 'Bedan Information Technology Society', 'bits@sanbeda.edu.ph', '+639055577298', 'Aethan Matthew Ilagan', '2018-2019', 'Pro', 'Representative'),
('BMC', '$2y$12$Q5s1X64bPp5uNUUS9oqqhuD1sjXmQvzW7wcvoCcFCTUySBps2DFP.', 'Bedan Mathematics Circle', 'bmc@sanbeda.edu.ph', '+639123456789', 'Don Diego Fernando', '2018-2019', 'NonPro', 'Representative'),
('BMG', '$2y$12$VpSI/CyxgYmUA4nmO5BKkuYC4rE8w/wMa3MncdTim/GgKRuBuvr0e', 'Bedan Musicians Guild', 'bmg@sanbeda.edu.ph', '639185748392', 'Monique Patalinghug', '2018-2019', 'NonPro', 'Representative'),
('BSG', '$2y$12$llbS6RwwbSzK2Nh7fz6ORuwfLZ6Wm1DsJxTR/fnANOu.tZOoGkUUy', 'Bedan Scholars'' Guild', 'bsg@sanbeda.edu.ph', '+639876543210', 'Dwight Howard', '2018-2019', 'NonPro', 'Representative'),
('BV', '$2y$12$Xp9pfmPBteAq3fUBzsB1c./UaTfKDOOy9fJb2o6KtgqLu4Ls4ChAm', 'Bedan Volunteers', 'bv@sanbeda.edu.ph', '639176859403', 'Angelika Gabrielle Corpuz', '2018-2019', 'NonPro', 'Representative'),
('HRDMS', '$2y$12$4N6X0.K1JAVGyWtVXHZUse.NvvhZD7IWIc7L1Zi.FH6TpB8pw3tjy', 'Human Resource Development Management Society', 'hrdms@sanbeda.edu.ph', '6399867594123', 'Gabrielle Jonah Santos', '2018-2019', 'Pro', 'Representative'),
('JBLC', '$2y$12$VEun91RZA4zIkhyeroLpm.1M0dZj3Tonr3CIcpBWqHx/inbUJ.QM.', 'Junior Bedan Law Circle', 'jblc@sanbeda.edu.ph', '6391567891013', 'Nicole Jaime Gatchalian', '2018-2019', 'Pro', 'Representative'),
('JFINMA', '$2y$12$m8jmHfsLScITt54BG5pWouIyJ1t8F1vSX1b1OP0C1FVzMbSHtkgPa', 'Junior Financial Management Association', 'jfm@sanbeda.edu.ph', '639762345610', 'Henry Harold Sy', '2018-2019', 'Pro', 'Representative'),
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
('4969', 'BITS', 'Trend Micro Conference', '2018-12-09', '13:00', '17:00', 'Trend Micro', 'foo', 'Emman Cayabyab', '+639055577298', 'San Beda University I.T. students', 'EDSA Shangri-la', 'Independent', '', 'Academic', '', '', 'PENDING', 'SC_P'),
('5137', 'BITS', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('6112', 'BITS', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('6127', 'BITS', 'Foo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('7927', 'BITS', 'yeee', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('8495', 'BITS', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9074', 'BITS', 'Sample', '8888-12-06', '02:02', '07:07', 'jkhuhjkh', 'jhjk', ',jnjh', 'mnj,nnbm', 'nmbmn', 'nbmbmn', 'Independent', '', 'Academic', '', '', 'APPROVED', 'OD'),
('9474', 'SBRL', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9545', 'SBRL', 'Test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A'),
('9589', 'SBRL', 'dasdad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DRAFT', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` varchar(10) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `FullName`, `Pass`) VALUES
('TS_BITS', 'Aethan Matthew Ilagan', '$2y$12$.Nvxa0xvWjqajbKiXbLYCut2wj7QIpI2IG87SXFfb6Fa90wtvOPH6');

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
) ENGINE=InnoDB AUTO_INCREMENT=386 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`LogID`, `Activity`, `ActivityType`, `DateTime`) VALUES
(9, 'User BITS logged in', 1, '2018-10-17 10:10:17'),
(10, 'User SBRL created the proposal 9589', 8, '2018-10-17 10:19:46'),
(11, 'User BITS logged out', 0, '2018-10-17 10:32:40'),
(12, 'User SBRL logged in', 1, '2018-10-17 10:32:52'),
(13, 'User SBRL logged out', 0, '2018-10-17 10:33:04'),
(14, 'User PSSBU logged in', 1, '2018-10-17 10:37:22'),
(15, 'User PSSBU viewed the proposal 9901', 2, '2018-10-17 10:37:28'),
(16, 'User PSSBU logged out', 0, '2018-10-17 10:37:41'),
(17, 'User UNESCO logged in', 1, '2018-10-17 10:45:17'),
(18, 'User UNESCO created the proposal 3678', 8, '2018-10-17 10:45:30'),
(19, 'User UNESCO logged out', 0, '2018-10-17 10:45:44'),
(20, 'User BITS logged in', 1, '2018-10-17 10:45:48'),
(21, 'User BITS viewed the proposal 4969', 2, '2018-10-17 10:45:53'),
(22, 'User BITS logged in', 1, '2018-10-18 07:53:07'),
(23, 'User BITS logged out', 0, '2018-10-18 08:34:45'),
(24, 'User BITS logged in', 1, '2018-10-18 04:34:32'),
(25, 'User BITS logged out', 0, '2018-10-18 04:40:41'),
(26, 'User PSSBU logged in', 1, '2018-10-18 04:51:25'),
(27, 'User PSSBU logged out', 0, '2018-10-18 04:51:30'),
(28, 'User BITS logged in', 1, '2018-10-18 04:52:56'),
(29, 'User BITS logged out', 0, '2018-10-18 04:54:12'),
(30, 'User SBRL logged in', 1, '2018-10-18 04:56:30'),
(31, 'User JPIA logged in', 1, '2018-10-18 05:00:12'),
(32, 'User JPIA logged out', 0, '2018-10-18 05:00:35'),
(33, 'User BITS logged in', 1, '2018-10-18 05:00:43'),
(34, 'User BITS viewed the proposal 4969', 2, '2018-10-18 05:01:07'),
(35, 'User BITS logged out', 0, '2018-10-18 05:01:39'),
(36, 'User SBRL logged out', 0, '2018-10-18 05:05:06'),
(37, 'User BITS logged in', 1, '2018-10-18 05:05:51'),
(38, 'User BITS logged out', 0, '2018-10-18 05:09:49'),
(39, 'User BITS logged in', 1, '2018-10-18 05:13:21'),
(40, 'User BITS logged out', 0, '2018-10-18 05:15:17'),
(41, 'User BITS logged in', 1, '2018-10-18 05:15:22'),
(42, 'User BITS logged in', 1, '2018-10-18 05:15:31'),
(43, 'User BITS logged out', 0, '2018-10-18 05:15:35'),
(44, 'User BITS logged in', 1, '2018-10-18 05:19:34'),
(45, 'User BITS logged out', 0, '2018-10-18 05:19:37'),
(46, 'User BITS logged in', 1, '2018-10-18 05:21:41'),
(47, 'User BITS logged out', 0, '2018-10-18 05:21:46'),
(48, 'User PSSBU logged in', 1, '2018-10-18 05:22:39'),
(49, 'User PSSBU viewed the proposal 9901', 2, '2018-10-18 05:22:45'),
(50, 'User PSSBU logged out', 0, '2018-10-18 05:22:49'),
(51, 'User BITS logged in', 1, '2018-10-18 05:30:58'),
(52, 'User BITS logged out', 0, '2018-10-18 05:31:04'),
(53, 'User BITS logged in', 1, '2018-10-18 05:31:21'),
(54, 'User BITS logged in', 1, '2018-10-18 07:39:55'),
(55, 'User BITS logged out', 0, '2018-10-18 07:53:45'),
(56, 'User SC_P logged in', 1, '2018-10-18 07:53:51'),
(57, 'User SC_P logged out', 0, '2018-10-18 07:53:57'),
(58, 'User OPSA_APP logged in', 1, '2018-10-18 07:54:06'),
(59, 'User OPSA_APP viewed the proposal 9074', 2, '2018-10-18 07:54:09'),
(60, 'User OPSA_APP approved the proposal 9074', 3, '2018-10-18 07:54:12'),
(61, 'User OPSA_APP viewed the proposal 9074', 2, '2018-10-18 07:54:12'),
(62, 'User OPSA_APP logged out', 0, '2018-10-18 07:54:16'),
(63, 'User OPSA_P logged in', 1, '2018-10-18 07:54:28'),
(64, 'User OPSA_P viewed the proposal 9074', 2, '2018-10-18 07:54:31'),
(65, 'User OPSA_P approved the proposal 9074', 3, '2018-10-18 07:54:34'),
(66, 'User OPSA_P viewed the proposal 9074', 2, '2018-10-18 07:54:34'),
(67, 'User OPSA_P logged out', 0, '2018-10-18 07:54:39'),
(68, 'User OPSA_APP logged in', 1, '2018-10-18 07:54:45'),
(69, 'User OPSA_APP logged out', 0, '2018-10-18 07:54:53'),
(70, 'User OD logged in', 1, '2018-10-18 07:54:57'),
(71, 'User OD viewed the proposal 9074', 2, '2018-10-18 07:55:00'),
(72, 'User OD approved the proposal 9074', 3, '2018-10-18 07:55:03'),
(73, 'User OD viewed the proposal 9074', 2, '2018-10-18 07:55:04'),
(74, 'User OD logged out', 0, '2018-10-18 07:55:08'),
(75, 'User BITS logged in', 1, '2018-10-18 07:55:12'),
(76, 'User BITS logged out', 0, '2018-10-18 07:59:52'),
(77, 'User PSSBU logged in', 1, '2018-10-18 07:59:58'),
(78, 'User PSSBU logged out', 0, '2018-10-18 08:02:56'),
(79, 'User BITS logged in', 1, '2018-10-18 08:03:00'),
(80, 'User BITS logged out', 0, '2018-10-18 08:15:16'),
(81, 'User PSSBU logged in', 1, '2018-10-18 08:15:19'),
(82, 'User PSSBU logged out', 0, '2018-10-18 08:27:31'),
(83, 'User BITS logged in', 1, '2018-10-18 08:27:34'),
(84, 'User BITS created the proposal 6127', 8, '2018-10-18 08:29:10'),
(85, 'User BITS created the proposal 5137', 8, '2018-10-18 08:35:37'),
(86, 'User BITS viewed the proposal 9074', 2, '2018-10-18 08:40:15'),
(87, 'User BITS viewed the proposal 4969', 2, '2018-10-18 08:40:57'),
(88, 'User BITS logged out', 0, '2018-10-18 08:43:57'),
(89, 'User SC_SG logged in', 1, '2018-10-18 08:44:02'),
(90, 'User SC_SG logged out', 0, '2018-10-18 08:46:01'),
(91, 'User BITS logged in', 1, '2018-10-18 08:46:06'),
(92, 'User BITS logged out', 0, '2018-10-18 08:46:19'),
(93, 'User OD logged in', 1, '2018-10-18 08:46:22'),
(94, 'User OD logged out', 0, '2018-10-18 08:46:36'),
(95, 'User BITS logged in', 1, '2018-10-19 11:03:36'),
(96, 'User BITS viewed the proposal 9074', 2, '2018-10-19 11:05:10'),
(97, 'User BITS viewed the proposal 4969', 2, '2018-10-19 11:05:21'),
(98, 'User BITS viewed the proposal 9074', 2, '2018-10-19 11:05:26'),
(99, 'User BITS viewed the proposal 9074', 2, '2018-10-19 11:05:35'),
(100, 'User BITS viewed the proposal 4969', 2, '2018-10-19 11:10:12'),
(101, 'User BITS logged out', 0, '2018-10-19 11:10:35'),
(102, 'User SC_SG logged in', 1, '2018-10-19 11:13:18'),
(103, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 11:13:26'),
(104, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 11:14:40'),
(105, 'User SC_SG logged out', 0, '2018-10-19 11:14:49'),
(106, 'User BITS logged in', 1, '2018-10-19 11:14:53'),
(107, 'User BITS viewed the proposal 4969', 2, '2018-10-19 11:14:58'),
(108, 'User BITS viewed the proposal 9074', 2, '2018-10-19 11:15:05'),
(109, 'User BITS viewed the proposal 9074', 2, '2018-10-19 11:17:03'),
(110, 'User BITS logged out', 0, '2018-10-19 11:17:11'),
(111, 'User OD logged in', 1, '2018-10-19 11:17:18'),
(112, 'User OD logged out', 0, '2018-10-19 11:17:22'),
(113, 'User SC_P logged in', 1, '2018-10-19 11:17:30'),
(114, 'User SC_P logged out', 0, '2018-10-19 11:34:38'),
(115, 'User BITS logged in', 1, '2018-10-19 11:34:41'),
(116, 'User BITS logged out', 0, '2018-10-19 11:37:27'),
(117, 'User SC_P logged in', 1, '2018-10-19 11:37:32'),
(118, 'User SC_P logged out', 0, '2018-10-19 11:39:42'),
(119, 'User BITS logged in', 1, '2018-10-19 11:39:46'),
(120, 'User BITS viewed the proposal 9074', 2, '2018-10-19 11:39:59'),
(121, 'User BITS logged out', 0, '2018-10-19 11:40:35'),
(122, 'User SC_SG logged in', 1, '2018-10-19 11:40:40'),
(123, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 11:58:03'),
(124, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:05:39'),
(125, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:06:05'),
(126, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:06:32'),
(127, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:06:43'),
(128, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:06:52'),
(129, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:07:49'),
(130, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:08:13'),
(131, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:08:21'),
(132, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:08:33'),
(133, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:08:44'),
(134, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:08:53'),
(135, 'User SC_SG viewed the proposal 9074', 2, '2018-10-19 12:09:10'),
(136, 'User SC_SG logged out', 0, '2018-10-19 12:09:15'),
(137, 'User SC_P logged in', 1, '2018-10-19 12:09:20'),
(138, 'User SC_P logged out', 0, '2018-10-19 12:09:34'),
(139, 'User OD logged in', 1, '2018-10-19 12:09:37'),
(140, 'User OD logged out', 0, '2018-10-19 12:09:46'),
(141, 'User PSSBU logged in', 1, '2018-10-19 12:10:36'),
(142, 'User PSSBU logged out', 0, '2018-10-19 12:11:07'),
(143, 'User BITS logged in', 1, '2018-10-19 12:11:11'),
(144, 'User BITS logged out', 0, '2018-10-19 12:11:16'),
(145, 'User SC_SG logged in', 1, '2018-10-19 12:11:19'),
(146, 'User SC_SG logged out', 0, '2018-10-19 12:11:27'),
(147, 'User SC_P logged in', 1, '2018-10-19 12:11:46'),
(148, 'User SC_P logged out', 0, '2018-10-19 12:16:39'),
(149, 'User SC_SG logged in', 1, '2018-10-19 12:16:45'),
(150, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:16:47'),
(151, 'User SC_SG approved the proposal 4969', 3, '2018-10-19 12:16:48'),
(152, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:16:48'),
(153, 'User SC_SG logged out', 0, '2018-10-19 12:17:41'),
(154, 'User BITS logged in', 1, '2018-10-19 12:17:44'),
(155, 'User BITS logged out', 0, '2018-10-19 12:20:50'),
(156, 'User PSSBU logged in', 1, '2018-10-19 12:20:57'),
(157, 'User PSSBU logged out', 0, '2018-10-19 12:21:18'),
(158, 'User SC_SG logged in', 1, '2018-10-19 12:21:22'),
(159, 'User SC_SG viewed the proposal 9901', 2, '2018-10-19 12:26:34'),
(160, 'User SC_SG viewed the proposal 4969', 2, '2018-10-19 12:27:02'),
(161, 'User SC_SG viewed the proposal 9901', 2, '2018-10-19 12:27:13'),
(162, 'User SC_SG logged out', 0, '2018-10-19 12:28:32'),
(163, 'User OPSA_P logged in', 1, '2018-10-19 12:28:37'),
(164, 'User OPSA_P logged out', 0, '2018-10-19 12:28:40'),
(165, 'User OPSA_APP logged in', 1, '2018-10-19 12:28:46'),
(166, 'User OPSA_APP logged out', 0, '2018-10-19 12:28:49'),
(167, 'User OPSA_APN logged in', 1, '2018-10-19 12:28:57'),
(168, 'User OPSA_APN logged out', 0, '2018-10-19 12:29:00'),
(169, 'User PSSBU logged in', 1, '2018-10-19 12:29:08'),
(170, 'User PSSBU viewed the proposal 9901', 2, '2018-10-19 12:29:11'),
(171, 'User PSSBU revised the proposal 9901', 6, '2018-10-19 12:29:19'),
(172, 'User PSSBU viewed the proposal 9901', 2, '2018-10-19 12:29:21'),
(173, 'User PSSBU viewed the proposal 9901', 2, '2018-10-19 12:31:45'),
(174, 'User PSSBU viewed the proposal 9901', 2, '2018-10-19 12:32:22'),
(175, 'User PSSBU viewed the proposal 9901', 2, '2018-10-19 12:32:29'),
(176, 'User PSSBU logged out', 0, '2018-10-19 12:32:33'),
(177, 'User OPSA_APP logged in', 1, '2018-10-19 12:32:36'),
(178, 'User OPSA_APP logged out', 0, '2018-10-19 12:33:10'),
(179, 'User BITS logged in', 1, '2018-10-19 12:33:13'),
(180, 'User BITS logged out', 0, '2018-10-19 12:33:17'),
(181, 'User SC_P logged in', 1, '2018-10-19 12:33:27'),
(182, 'User SC_P logged out', 0, '2018-10-19 12:35:29'),
(183, 'User BITS logged in', 1, '2018-10-19 12:35:37'),
(184, 'User BITS logged out', 0, '2018-10-19 12:36:04'),
(185, 'User PSSBU logged in', 1, '2018-10-19 12:36:07'),
(186, 'User PSSBU logged out', 0, '2018-10-19 12:36:14'),
(187, 'User BITS logged in', 1, '2018-10-19 12:38:59'),
(188, 'User BITS logged out', 0, '2018-10-19 12:39:14'),
(189, 'User SC_SG logged in', 1, '2018-10-19 12:40:49'),
(190, 'User SC_SG logged out', 0, '2018-10-19 12:45:20'),
(191, 'User OPSA_APP logged in', 1, '2018-10-19 12:45:24'),
(192, 'User OPSA_APP viewed the proposal 9901', 2, '2018-10-19 12:45:33'),
(193, 'User OPSA_APP viewed the proposal 9901', 2, '2018-10-19 12:46:16'),
(194, 'User OPSA_APP logged out', 0, '2018-10-19 12:46:27'),
(195, 'User OD logged in', 1, '2018-10-19 12:46:30'),
(196, 'User OD logged out', 0, '2018-10-19 12:58:03'),
(197, 'User OPSA_P logged in', 1, '2018-10-19 12:58:09'),
(198, 'User OPSA_P logged out', 0, '2018-10-19 12:58:13'),
(199, 'User OPSA_APP logged in', 1, '2018-10-19 12:58:18'),
(200, 'User OPSA_APP logged out', 0, '2018-10-19 12:58:24'),
(201, 'User SC_P logged in', 1, '2018-10-19 12:58:28'),
(202, 'User SC_P logged out', 0, '2018-10-19 01:00:04'),
(203, 'User OD logged in', 1, '2018-10-19 01:00:06'),
(204, 'User OD logged out', 0, '2018-10-19 01:00:19'),
(205, 'User SC_SG logged in', 1, '2018-10-19 01:00:22'),
(206, 'User SC_SG viewed the proposal 9901', 2, '2018-10-19 01:06:29'),
(207, 'User SC_SG logged out', 0, '2018-10-19 01:11:55'),
(208, 'User BITS logged in', 1, '2018-10-19 01:11:59'),
(209, 'User BITS logged out', 0, '2018-10-19 01:12:08'),
(210, 'User PSSBU logged in', 1, '2018-10-19 01:12:11'),
(211, 'User PSSBU logged out', 0, '2018-10-19 01:12:38'),
(212, 'User SBRL logged in', 1, '2018-10-19 01:12:41'),
(213, 'User SBRL logged out', 0, '2018-10-19 01:13:07'),
(214, 'User BITS logged in', 1, '2018-10-19 01:28:39'),
(215, 'User BITS viewed the proposal 4969', 2, '2018-10-19 01:31:38'),
(216, 'User BITS logged out', 0, '2018-10-19 01:31:51'),
(217, 'User BITS logged in', 1, '2018-10-20 05:54:46'),
(218, 'User BITS logged out', 0, '2018-10-20 05:59:21'),
(219, 'User SC_SG logged in', 1, '2018-10-20 05:59:29'),
(220, 'User SC_SG logged out', 0, '2018-10-20 06:00:06'),
(221, 'User PSSBU logged in', 1, '2018-10-20 06:00:09'),
(222, 'User PSSBU logged out', 0, '2018-10-20 06:00:14'),
(223, 'User BBSF logged in', 1, '2018-10-20 06:00:45'),
(224, 'User BBSF logged out', 0, '2018-10-20 06:00:56'),
(225, 'User BITS logged in', 1, '2018-10-20 06:15:20'),
(226, 'User BITS logged in', 1, '2018-10-21 08:41:51'),
(227, 'User BITS viewed the proposal 4969', 2, '2018-10-21 08:51:25'),
(228, 'User BITS viewed the proposal 4969', 2, '2018-10-21 08:52:01'),
(229, 'User BITS viewed the proposal 4969', 2, '2018-10-21 08:52:06'),
(230, 'User BITS viewed the proposal 9074', 2, '2018-10-21 08:52:13'),
(231, 'User BITS created the proposal 6112', 8, '2018-10-21 08:52:43'),
(232, 'User BITS logged out', 0, '2018-10-21 08:55:02'),
(233, 'User SC_SG logged in', 1, '2018-10-21 08:55:08'),
(234, 'User SC_SG logged out', 0, '2018-10-21 09:14:38'),
(235, 'User PSSBU logged in', 1, '2018-10-21 09:14:42'),
(236, 'User PSSBU created the proposal 6687', 8, '2018-10-21 09:14:46'),
(237, 'User PSSBU deleted a draft proposal', 11, '2018-10-21 09:15:18'),
(238, 'User PSSBU logged out', 0, '2018-10-21 09:15:37'),
(239, 'User BITS logged in', 1, '2018-10-21 09:17:02'),
(240, 'User BITS logged out', 0, '2018-10-21 09:21:19'),
(241, 'User BITS logged in', 1, '2018-10-21 09:21:35'),
(242, 'User BITS logged out', 0, '2018-10-21 09:21:44'),
(243, 'User BITS logged in', 1, '2018-10-21 09:22:49'),
(244, 'User BITS logged out', 0, '2018-10-21 09:23:40'),
(245, 'User BITS logged in', 1, '2018-10-21 09:26:08'),
(246, 'User BITS logged out', 0, '2018-10-21 09:26:23'),
(247, 'User PSSBU logged in', 1, '2018-10-21 09:26:27'),
(248, 'User PSSBU viewed the proposal 9901', 2, '2018-10-21 09:26:43'),
(249, 'User PSSBU logged out', 0, '2018-10-21 09:28:32'),
(250, 'User BMG logged in', 1, '2018-10-21 09:33:24'),
(251, 'User BMG logged out', 0, '2018-10-21 09:34:16'),
(252, 'User BSG logged in', 1, '2018-10-21 09:34:20'),
(253, 'User BSG logged out', 0, '2018-10-21 09:34:30'),
(254, 'User BDT logged in', 1, '2018-10-21 09:36:04'),
(255, 'User BDT logged out', 0, '2018-10-21 09:51:15'),
(256, 'User JPIA logged in', 1, '2018-10-21 09:51:24'),
(257, 'User JPIA logged out', 0, '2018-10-21 09:52:16'),
(258, 'User JPIA logged in', 1, '2018-10-21 09:54:51'),
(259, 'User JPIA logged out', 0, '2018-10-21 09:55:16'),
(260, 'User BBSF logged in', 1, '2018-10-21 09:55:22'),
(261, 'User SC logged in', 1, '2018-10-21 09:57:10'),
(262, 'User SC logged out', 0, '2018-10-21 09:57:19'),
(263, 'User SBRL logged in', 1, '2018-10-21 09:57:23'),
(264, 'User SBRL logged out', 0, '2018-10-21 09:57:28'),
(265, 'User SC logged in', 1, '2018-10-21 09:58:34'),
(266, 'User SC logged out', 0, '2018-10-21 09:58:40'),
(267, 'User JPIA logged in', 1, '2018-10-21 09:58:44'),
(268, 'User JPIA logged out', 0, '2018-10-21 09:59:03'),
(269, 'User OPSA_P logged in', 1, '2018-10-21 09:59:15'),
(270, 'User OPSA_P logged out', 0, '2018-10-21 10:02:37'),
(271, 'User BITS logged in', 1, '2018-10-21 10:02:40'),
(272, 'User BITS logged out', 0, '2018-10-21 10:08:03'),
(273, 'User BITS logged in', 1, '2018-10-21 10:08:08'),
(274, 'User BITS logged out', 0, '2018-10-21 10:08:11'),
(275, 'User OD logged in', 1, '2018-10-21 10:08:15'),
(276, 'User OD logged out', 0, '2018-10-21 10:10:37'),
(277, 'User PSSBU logged in', 1, '2018-10-21 10:10:43'),
(278, 'User PSSBU logged out', 0, '2018-10-21 10:10:48'),
(279, 'User BITS logged in', 1, '2018-10-21 10:10:58'),
(280, 'User BITS logged out', 0, '2018-10-21 10:11:03'),
(281, 'User OD logged in', 1, '2018-10-21 10:12:30'),
(282, 'User OD logged out', 0, '2018-10-21 10:15:47'),
(283, 'User OPSA_APN logged in', 1, '2018-10-21 10:16:03'),
(284, 'User OPSA_APN logged out', 0, '2018-10-21 10:16:15'),
(285, 'User SC_P logged in', 1, '2018-10-21 10:16:19'),
(286, 'User SC_P logged out', 0, '2018-10-21 10:16:39'),
(287, 'User BMG logged in', 1, '2018-10-21 10:16:45'),
(288, 'User BMG logged out', 0, '2018-10-21 10:16:52'),
(289, 'User MANSOC logged in', 1, '2018-10-21 10:16:57'),
(290, 'User MANSOC logged out', 0, '2018-10-21 10:17:19'),
(291, 'User PSSBU logged in', 1, '2018-10-21 10:17:32'),
(292, 'User PSSBU logged out', 0, '2018-10-21 10:17:43'),
(293, 'User SC_TR logged in', 1, '2018-10-21 10:17:51'),
(294, 'User SC_TR logged out', 0, '2018-10-21 10:18:11'),
(295, 'User SC_SG logged in', 1, '2018-10-21 10:18:16'),
(296, 'User SC_SG logged out', 0, '2018-10-21 10:18:38'),
(297, 'User BITS logged in', 1, '2018-10-21 11:52:24'),
(298, 'User BITS logged out', 0, '2018-10-21 11:52:31'),
(299, 'User BITS logged in', 1, '2018-10-21 12:23:53'),
(300, 'User BITS logged out', 0, '2018-10-21 12:24:00'),
(301, 'User BITS logged in', 1, '2018-10-21 12:44:34'),
(302, 'User BITS viewed the proposal 4969', 2, '2018-10-21 12:54:29'),
(303, 'User BITS viewed the proposal 4969', 2, '2018-10-21 01:15:59'),
(304, 'User BITS viewed the proposal 9074', 2, '2018-10-21 01:16:07'),
(305, 'User BITS logged out', 0, '2018-10-21 01:16:20'),
(306, 'User PSSBU logged in', 1, '2018-10-21 01:16:27'),
(307, 'User PSSBU logged out', 0, '2018-10-21 01:16:35'),
(308, 'User SC logged in', 1, '2018-10-21 01:16:39'),
(309, 'User SC logged out', 0, '2018-10-21 01:16:59'),
(310, 'User OD logged in', 1, '2018-10-21 01:17:03'),
(311, 'User OD logged out', 0, '2018-10-21 01:18:34'),
(312, 'User SC_SG logged in', 1, '2018-10-21 01:18:38'),
(313, 'User BITS logged in', 1, '2018-10-21 01:25:05'),
(314, 'User BITS logged out', 0, '2018-10-21 01:27:21'),
(315, 'User SBRL logged in', 1, '2018-10-21 01:27:25'),
(316, 'User SBRL created the proposal 6167', 8, '2018-10-21 01:27:35'),
(317, 'User SBRL deleted a draft proposal', 11, '2018-10-21 01:29:23'),
(318, 'User SBRL logged out', 0, '2018-10-21 01:29:45'),
(319, 'User BDT logged in', 1, '2018-10-21 01:35:36'),
(320, 'User BDT logged out', 0, '2018-10-21 01:54:31'),
(321, 'User BITS logged in', 1, '2018-10-21 02:03:31'),
(322, 'User BITS logged out', 0, '2018-10-21 02:03:34'),
(323, 'User BITS logged in', 1, '2018-10-21 02:08:08'),
(324, 'User BITS logged in', 1, '2018-10-21 02:08:15'),
(325, 'User BITS logged out', 0, '2018-10-21 02:08:19'),
(326, 'User BITS logged in', 1, '2018-10-21 02:08:29'),
(327, 'User BITS logged in', 1, '2018-10-21 02:09:56'),
(328, 'User BITS logged out', 0, '2018-10-21 02:12:00'),
(329, 'User BITS logged in', 1, '2018-10-21 02:12:11'),
(330, 'User  logged out', 0, '2018-10-21 02:12:14'),
(331, 'User SC_SG logged in', 1, '2018-10-21 02:12:49'),
(332, 'User  logged out', 0, '2018-10-21 02:12:53'),
(333, 'User  logged out', 0, '2018-10-21 02:13:40'),
(334, 'User BiTS logged in', 1, '2018-10-21 02:13:53'),
(335, 'User  logged out', 0, '2018-10-21 02:13:55'),
(336, 'User TS_BITS logged in', 1, '2018-10-21 02:16:54'),
(337, 'User BITS logged in', 1, '2018-10-21 02:17:27'),
(338, 'User BITS logged out', 0, '2018-10-21 02:17:39'),
(339, 'User TS_BITS logged in', 1, '2018-10-21 02:18:53'),
(340, 'User  logged out', 0, '2018-10-21 02:19:13'),
(341, 'User BITS logged in', 1, '2018-10-21 02:24:43'),
(342, 'User BITS logged out', 0, '2018-10-21 02:24:46'),
(343, 'User TS_BITS logged in', 1, '2018-10-21 02:24:53'),
(344, 'User  logged out', 0, '2018-10-21 02:25:34'),
(345, 'User BITS logged in', 1, '2018-10-21 02:26:12'),
(346, 'User BITS logged out', 0, '2018-10-21 02:26:15'),
(347, 'User tS_BITS logged in', 1, '2018-10-21 02:26:44'),
(348, 'User  logged out', 0, '2018-10-21 02:26:53'),
(349, 'User TS_BITS logged in', 1, '2018-10-21 02:27:26'),
(350, 'User  logged out', 0, '2018-10-21 02:27:29'),
(351, 'User BITS logged in', 1, '2018-10-21 02:29:42'),
(352, 'User BITS logged out', 0, '2018-10-21 02:29:44'),
(353, 'User TS_BITS logged in', 1, '2018-10-21 02:29:52'),
(354, 'User TS_BITS logged out', 0, '2018-10-21 02:30:10'),
(355, 'User TS_BITS logged in', 1, '2018-10-21 02:42:59'),
(356, 'User TS_BITS logged out', 0, '2018-10-21 02:43:03'),
(357, 'User BITS logged in', 1, '2018-10-21 05:00:00'),
(358, 'User TS_BITS logged in', 1, '2018-10-21 05:00:12'),
(359, 'User TS_BITS logged out', 0, '2018-10-21 05:00:22'),
(360, 'User TS_BITS logged in', 1, '2018-10-21 05:00:27'),
(361, 'User BITS logged out', 0, '2018-10-21 05:00:34'),
(362, 'User OD logged in', 1, '2018-10-22 11:45:36'),
(363, 'User OD viewed the proposal 9074', 2, '2018-10-22 11:45:47'),
(364, 'User OD viewed the proposal 9074', 2, '2018-10-22 11:46:25'),
(365, 'User unesco logged in', 1, '2018-10-22 03:50:52'),
(366, 'User unesco logged out', 0, '2018-10-22 03:50:57'),
(367, 'User BITS logged in', 1, '2018-10-22 09:32:38'),
(368, 'User BITS logged out', 0, '2018-10-22 09:32:45'),
(369, 'User TS_BITS logged in', 1, '2018-10-22 09:32:57'),
(370, 'User TS_BITS logged out', 0, '2018-10-22 09:33:00'),
(371, 'User BITS logged in', 1, '2018-10-22 10:37:05'),
(372, 'User BITS logged out', 0, '2018-10-22 10:37:15'),
(373, 'User TS_BITS logged in', 1, '2018-10-22 10:37:24'),
(374, 'User TS_BITS logged out', 0, '2018-10-22 10:38:00'),
(375, 'User TS_BITS logged in', 1, '2018-10-22 10:52:33'),
(376, 'User TS_BITS logged in', 1, '2018-10-23 09:53:04'),
(377, 'User TS_BITS logged out', 0, '2018-10-23 10:12:46'),
(378, 'User TS_BITS logged in', 1, '2018-10-23 10:14:34'),
(379, 'User TS_BITS logged out', 0, '2018-10-23 10:15:21'),
(380, 'User BITS logged in', 1, '2018-10-23 03:41:16'),
(381, 'User  logged out', 0, '2018-10-23 09:06:58'),
(382, 'User BITS logged in', 1, '2018-10-23 09:33:38'),
(383, 'User BITS logged out', 0, '2018-10-23 09:34:21'),
(384, 'User SBRL logged in', 1, '2018-10-23 09:34:25'),
(385, 'User SBRL viewed the proposal 9074', 2, '2018-10-23 09:35:12');

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
('4969', 'BITS', '', 'APPROVED', 'PENDING', '', '', '', ''),
('9074', 'BITS', '', 'APPROVED', 'APPROVED', 'APPROVED', '', 'APPROVED', 'APPROVED');

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
('4969', '2018-10-12', '', '2018-10-19 12:16:47pm', '00-00-0000 00:00:00am', '', '', '', '', ''),
('9074', '2018-10-12', '', '2018-10-19 12:08:21pm', '2018-10-12 01:04:07pm', '2018-10-18 07:54:12pm', '', '2018-10-18 07:54:34pm', '2018-10-18 07:55:04pm', '2018-10-18 07:55:03pm'),
('9545', '2018-10-12', '', '', '', '', '', '', '', ''),
('9474', '2018-10-12', '', '', '', '', '', '', '', ''),
('8495', '2018-10-17', '', '', '', '', '', '', '', ''),
('4585', '2018-10-17', '', '', '', '', '', '', '', ''),
('7927', '2018-10-17', '', '', '', '', '', '', '', ''),
('4769', '2018-10-17', '', '', '', '', '', '', '', ''),
('1413', '2018-10-17', '', '', '', '', '', '', '', ''),
('9589', '2018-10-17', '', '', '', '', '', '', '', ''),
('6127', '2018-10-18', '', '', '', '', '', '', '', ''),
('5137', '2018-10-18', '', '', '', '', '', '', '', ''),
('6112', '2018-10-21', '', '', '', '', '', '', '', '');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

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
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=386;
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
