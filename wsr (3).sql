-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2016 at 08:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_application_dtls`
--

CREATE TABLE IF NOT EXISTS `t_application_dtls` (
  `tad_roll` varchar(20) DEFAULT NULL,
  `tad_Application` varchar(20) NOT NULL DEFAULT '',
  `tad_med_refno` varchar(200) DEFAULT NULL,
  `tad_med_date` datetime DEFAULT NULL,
  `tad_batch_no` varchar(20) DEFAULT NULL,
  `tad_religion` varchar(20) DEFAULT NULL,
  `tad_category` varchar(20) DEFAULT NULL,
  `tad_high_quali` varchar(100) DEFAULT NULL,
  `tad_DOJ` datetime DEFAULT NULL,
  `tad_med_sts` int(3) NOT NULL,
  `tad_act_flg` int(11) DEFAULT NULL,
  `tad_crt_by` varchar(10) DEFAULT NULL,
  `tad_crt_ts` datetime DEFAULT NULL,
  `tad_upd_by` varchar(10) DEFAULT NULL,
  `tad_upd_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`tad_Application`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_application_dtls`
--

INSERT INTO `t_application_dtls` (`tad_roll`, `tad_Application`, `tad_med_refno`, `tad_med_date`, `tad_batch_no`, `tad_religion`, `tad_category`, `tad_high_quali`, `tad_DOJ`, `tad_med_sts`, `tad_act_flg`, `tad_crt_by`, `tad_crt_ts`, `tad_upd_by`, `tad_upd_ts`) VALUES
('1222', '11111', '3333333', '2016-08-01 00:00:00', '4444444', '5555555555555', '38', '66666', '2016-08-17 00:00:00', 43, 1, 'Admin', '2016-10-09 17:58:44', 'Admin', '2016-10-16 18:17:59'),
('2', '1122', '2434', '2016-10-12 00:00:00', '444444', 'Hindu', '42', 'matric', '2016-10-22 00:00:00', 0, 1, 'Admin', '2016-10-16 17:24:52', 'Admin', '2016-10-16 17:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE IF NOT EXISTS `t_bank` (
  `tb_roll` varchar(20) NOT NULL DEFAULT '',
  `tb_bankNm` varchar(100) DEFAULT NULL,
  `tb_ac_no` int(20) DEFAULT NULL,
  `tb_branch` varchar(100) DEFAULT NULL,
  `tb_stu_name` varchar(100) DEFAULT NULL,
  `tb_ifsc_code` varchar(15) DEFAULT NULL,
  `tb_crt_by` varchar(10) DEFAULT NULL,
  `tb_crt_ts` datetime DEFAULT NULL,
  `tb_upd_by` varchar(10) DEFAULT NULL,
  `tb_upd_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`tb_roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`tb_roll`, `tb_bankNm`, `tb_ac_no`, `tb_branch`, `tb_stu_name`, `tb_ifsc_code`, `tb_crt_by`, `tb_crt_ts`, `tb_upd_by`, `tb_upd_ts`) VALUES
('1222', 'HDFC bank', 2147483647, 'Telco', 'Srikant', 'HDFC003766', 'Admin', '2016-07-31 11:55:43', 'Admin', '2016-07-31 11:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `t_deployment`
--

CREATE TABLE IF NOT EXISTS `t_deployment` (
  `td_roll` varchar(20) NOT NULL DEFAULT '',
  `td_slno` int(11) NOT NULL,
  `td_dep_area` varchar(100) DEFAULT NULL,
  `td_dep_code` varchar(20) DEFAULT NULL,
  `td_dep_type` varchar(20) DEFAULT NULL,
  `td_dep_line` varchar(100) DEFAULT NULL,
  `td_dep_date` datetime DEFAULT NULL,
  `td_dep_upto` datetime DEFAULT NULL,
  `td_supv_name` varchar(100) DEFAULT NULL,
  `td_sup_cont` int(10) DEFAULT NULL,
  `td_sup_email` varchar(100) DEFAULT NULL,
  `td_mgm_name` varchar(100) DEFAULT NULL,
  `td_mgm_cont` int(10) DEFAULT NULL,
  `td_mgm_email` varchar(100) DEFAULT NULL,
  `td_crt_by` varchar(10) DEFAULT NULL,
  `td_crt_ts` datetime DEFAULT NULL,
  `td_upd_by` varchar(10) DEFAULT NULL,
  `td_upd_ts` datetime DEFAULT NULL,
  `td_act_flg` int(11) NOT NULL,
  PRIMARY KEY (`td_roll`,`td_slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_deployment`
--

INSERT INTO `t_deployment` (`td_roll`, `td_slno`, `td_dep_area`, `td_dep_code`, `td_dep_type`, `td_dep_line`, `td_dep_date`, `td_dep_upto`, `td_supv_name`, `td_sup_cont`, `td_sup_email`, `td_mgm_name`, `td_mgm_cont`, `td_mgm_email`, `td_crt_by`, `td_crt_ts`, `td_upd_by`, `td_upd_ts`, `td_act_flg`) VALUES
('1222', 1, 'Area 1', 'code1', 'Type 1', 'Line 1', '2016-07-02 00:00:00', '2016-07-19 00:00:00', 'Srikant', 2147483647, 'sdk258741@tatamotors.com', 'Sanjeev Kumar', 2147483647, 'sdk258741@tatamotors.com', 'Admin', '2016-07-31 11:06:51', 'Admin', '2016-09-04 00:23:33', 0),
('1222', 2, 'Area 2', 'code2', 'Type 2', 'Line 2', NULL, NULL, 'sanjeev', 2147483647, 'sdk2@tatamotors.com', 'Rahul Kumar', 908898980, 'rk@tatamotors.com', 'Admin', '2016-09-04 00:23:34', 'Admin', '2016-10-16 18:18:44', 0),
('1222', 3, 'Area 2', 'code2', 'Type 2', 'Line 2', '2016-01-01 00:00:00', '2017-06-30 00:00:00', 'sanjeev', 2147483647, 'sdk2@tatamotors.com', 'Rahul Kumar', 908898980, 'rk@tatamotors.com', 'Admin', '2016-10-16 18:18:45', 'Admin', '2016-10-16 18:23:51', 0),
('1222', 4, 'Area 2', 'code2', 'Type 2', 'Line 2', '2016-10-15 00:00:00', '2017-02-28 00:00:00', 'sanjeev', 2147483647, 'sdk2@tatamotors.com', 'Rahul Kumar', 908898980, 'rk@tatamotors.com', 'Admin', '2016-10-16 18:23:52', 'Admin', '2016-10-16 18:23:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_doc`
--

CREATE TABLE IF NOT EXISTS `t_doc` (
  `td_id` int(11) NOT NULL DEFAULT '0',
  `td_doc_nm` varchar(100) DEFAULT NULL,
  `td_file_path` varchar(200) DEFAULT NULL,
  `td_roll` varchar(20) DEFAULT NULL,
  `td_act_flg` int(11) DEFAULT NULL,
  `td_crt_by` varchar(10) DEFAULT NULL,
  `td_crt_ts` date DEFAULT NULL,
  `td_upd_by` varchar(10) DEFAULT NULL,
  `td_upd_ts` date DEFAULT NULL,
  `td_doc_type` varchar(20) NOT NULL,
  PRIMARY KEY (`td_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_doc`
--

INSERT INTO `t_doc` (`td_id`, `td_doc_nm`, `td_file_path`, `td_roll`, `td_act_flg`, `td_crt_by`, `td_crt_ts`, `td_upd_by`, `td_upd_ts`, `td_doc_type`) VALUES
(1, 'Tulips.jpg', 'docs/Tulips.jpg', '1', 0, 'Admin', '2016-07-27', 'Admin', '2016-09-18', 'Photo'),
(2, 'dsau.png', 'docs/dsau.png', '3', 0, 'Admin', '2016-07-27', 'Admin', '2016-07-27', 'Photo'),
(3, 'Desert.jpg', 'docs/Desert.jpg', '2', 0, 'Admin', '2016-07-27', 'Admin', '2016-07-27', 'Photo'),
(4, 'mypic.PNG', 'docs/mypic.PNG', '1222', 0, 'Admin', '2016-08-29', 'Admin', '2016-09-26', 'Photo'),
(5, 'DSCN3563.JPG', 'http://localhost:8437/schoolproj/docs/DSCN3563.JPG', '1', 0, 'Admin', '2016-09-17', 'Admin', '2016-09-18', 'Photo'),
(6, 'DSCN3567.JPG', 'http://localhost:8437/schoolproj/docs/DSCN3567.JPG', '1', 0, 'Admin', '2016-09-17', 'Admin', '2016-09-18', 'Photo'),
(7, 'DSCN3577.JPG', 'http://localhost:8437/schoolproj/docs/DSCN3577.JPG', '1', 1, 'Admin', '2016-09-18', 'Admin', '2016-09-18', 'Photo'),
(8, 'BBuj5rW.img.png', 'http://localhost:8437/schoolproj/docs/BBuj5rW.img.png', '1222', 1, 'Admin', '2016-09-26', 'Admin', '2016-09-26', 'Photo'),
(9, 'DSCN3577.JPG', 'http://localhost:8437/schoolproj/docs/DSCN3577.JPG', '5674445', 1, 'Admin', '2016-11-11', 'Admin', '2016-11-11', 'Photo');

-- --------------------------------------------------------

--
-- Table structure for table `t_mas_dtls`
--

CREATE TABLE IF NOT EXISTS `t_mas_dtls` (
  `tm_id` int(11) NOT NULL DEFAULT '0',
  `tm_mas_id` int(11) DEFAULT NULL,
  `tm_slno` int(11) DEFAULT NULL,
  `tm_value` varchar(150) DEFAULT NULL,
  `tm_dataType` varchar(100) DEFAULT NULL,
  `tm_act_flg` int(10) DEFAULT NULL,
  `tm_crt_by` varchar(10) DEFAULT NULL,
  `tm_crt_ts` datetime DEFAULT NULL,
  `tm_upd_by` varchar(10) DEFAULT NULL,
  `tm_upd_ts` datetime DEFAULT NULL,
  `tm_locn_id` int(11) DEFAULT NULL,
  `tm_org_id` int(11) DEFAULT NULL,
  `tm_unit_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`tm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_mas_dtls`
--

INSERT INTO `t_mas_dtls` (`tm_id`, `tm_mas_id`, `tm_slno`, `tm_value`, `tm_dataType`, `tm_act_flg`, `tm_crt_by`, `tm_crt_ts`, `tm_upd_by`, `tm_upd_ts`, `tm_locn_id`, `tm_org_id`, `tm_unit_id`) VALUES
(1, NULL, 1, 'Locn', NULL, 1, NULL, '2016-06-19 19:40:50', NULL, '2016-06-19 19:40:50', NULL, NULL, NULL),
(2, NULL, 1, 'Org', NULL, 1, NULL, '2016-06-19 19:41:12', NULL, '2016-06-19 19:41:12', NULL, NULL, NULL),
(3, NULL, 1, 'Unit', NULL, 1, NULL, '2016-06-19 19:41:12', NULL, '2016-06-19 19:41:12', NULL, NULL, NULL),
(4, NULL, 1, 'status flg', NULL, 1, NULL, '2016-06-19 19:41:12', NULL, '2016-06-19 19:41:12', NULL, NULL, NULL),
(5, NULL, 1, 'Session Year', NULL, 1, NULL, '2016-06-19 19:41:12', NULL, '2016-06-19 19:41:12', NULL, NULL, NULL),
(6, NULL, 1, 'Dept', NULL, 1, NULL, '2016-06-19 19:41:12', NULL, '2016-06-19 19:41:12', NULL, NULL, NULL),
(7, NULL, 1, 'Occupation', NULL, 1, NULL, '2016-06-19 19:55:44', NULL, '2016-06-19 19:55:44', NULL, NULL, NULL),
(8, NULL, 1, 'Student Status', NULL, 1, NULL, '2016-06-19 19:55:44', NULL, '2016-06-19 19:55:44', NULL, NULL, NULL),
(9, NULL, 1, 'Category', NULL, 1, NULL, '2016-06-19 22:32:11', NULL, '2016-06-19 22:32:11', NULL, NULL, NULL),
(10, NULL, 1, 'Medical Status', NULL, 1, NULL, '2016-10-16 18:02:07', NULL, '2016-10-16 18:02:07', NULL, NULL, NULL),
(21, 1, 1, 'Jamshedpur', NULL, 1, NULL, '2016-06-19 19:41:44', NULL, '2016-06-19 19:41:44', 1, 1, 1),
(22, 2, 1, 'Tata Motors', NULL, 1, NULL, '2016-06-19 19:41:44', NULL, '2016-06-19 19:41:44', 1, 1, 1),
(23, 3, 1, 'Ext', NULL, 1, NULL, '2016-06-19 19:41:44', 'Admin', '2016-08-07 23:18:36', 1, 1, 1),
(24, 4, 3, 'Review', NULL, 1, NULL, '2016-06-19 19:41:44', 'Admin', '2016-08-07 23:14:13', 1, 1, 1),
(25, 4, 3, 'Review', NULL, 1, NULL, '2016-06-19 19:41:44', 'Admin', '2016-08-07 23:14:13', 1, 1, 1),
(26, 6, 1, 'Administration', NULL, 1, NULL, '2016-06-19 19:41:44', NULL, '2016-06-19 19:41:44', 1, 1, 1),
(27, 5, 2, '2015-2016', NULL, 1, NULL, '2016-06-19 19:41:44', NULL, '2016-06-19 19:41:44', 1, 1, 1),
(28, 5, 1, '2014-2015', NULL, 1, NULL, '2016-06-19 19:41:44', NULL, '2016-06-19 19:41:44', 1, 1, 1),
(29, 5, 3, '2016-2017', NULL, 1, NULL, '2016-06-19 19:41:44', NULL, '2016-06-19 19:41:44', 1, 1, 1),
(30, 7, 1, 'Service', NULL, 1, NULL, '2016-06-19 19:56:09', NULL, '2016-06-19 19:56:09', 1, 1, 1),
(31, 7, 2, 'Bussiness', NULL, 1, NULL, '2016-06-19 19:56:09', NULL, '2016-06-19 19:56:09', 1, 1, 1),
(32, 7, 3, 'House Wife', NULL, 1, NULL, '2016-06-19 19:56:09', NULL, '2016-06-19 19:56:09', 1, 1, 1),
(33, 8, 1, 'Active', NULL, 1, NULL, '2016-06-19 19:58:14', NULL, '2016-06-19 19:58:14', 1, 1, 1),
(34, 8, 2, 'Terminated', NULL, 1, NULL, '2016-06-19 19:58:14', NULL, '2016-06-19 19:58:14', 1, 1, 1),
(35, 8, 3, 'Suspended', NULL, 1, NULL, '2016-06-19 19:58:14', NULL, '2016-06-19 19:58:14', 1, 1, 1),
(36, 8, 4, 'Debarred', NULL, 1, NULL, '2016-06-19 19:58:14', NULL, '2016-06-19 19:58:14', 1, 1, 1),
(37, 8, 5, 'Discontinue', NULL, 1, NULL, '2016-06-19 19:58:14', NULL, '2016-06-19 19:58:14', 1, 1, 1),
(38, 9, 1, 'GEN', NULL, 1, NULL, '2016-06-19 22:32:25', NULL, '2016-06-19 22:32:25', 1, 1, 1),
(39, 9, 2, 'OBC', NULL, 1, NULL, '2016-06-19 22:32:25', NULL, '2016-06-19 22:32:25', 1, 1, 1),
(40, 9, 3, 'SC', NULL, 1, NULL, '2016-09-26 23:32:52', NULL, '2016-09-26 23:32:52', 1, 1, 1),
(41, 9, 4, 'ST', NULL, 1, NULL, '2016-09-26 23:32:52', NULL, '2016-09-26 23:32:52', 1, 1, 1),
(42, 9, 5, 'PH', NULL, 1, NULL, '2016-09-26 23:32:52', NULL, '2016-09-26 23:32:52', 1, 1, 1),
(43, 10, 1, 'Fit', NULL, 1, NULL, '2016-10-16 18:03:53', NULL, '2016-10-16 18:03:53', 1, 1, 1),
(44, 10, 2, 'Unfit', NULL, 1, NULL, '2016-10-16 18:03:53', NULL, '2016-10-16 18:03:53', 1, 1, 1),
(45, 10, 3, 'Temp-Unfit', NULL, 1, NULL, '2016-10-16 18:03:53', NULL, '2016-10-16 18:03:53', 1, 1, 1),
(46, 10, 4, 'Special', NULL, 1, NULL, '2016-10-16 18:03:53', NULL, '2016-10-16 18:03:53', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_med_dtls`
--

CREATE TABLE IF NOT EXISTS `t_med_dtls` (
  `tmd_roll` varchar(20) NOT NULL DEFAULT '',
  `tmd_gender` varchar(5) DEFAULT NULL,
  `tmd_height` varchar(5) DEFAULT NULL,
  `tmd_weight` varchar(5) DEFAULT NULL,
  `tmd_blood_grp` varchar(5) DEFAULT NULL,
  `tmd_prsnt_add` varchar(500) DEFAULT NULL,
  `tmd_pin_code` int(11) DEFAULT NULL,
  `tmd_nationality` varchar(30) DEFAULT NULL,
  `tmd_prmnt_add` varchar(500) DEFAULT NULL,
  `tmd_act_flg` int(11) DEFAULT NULL,
  `tmd_crt_by` varchar(10) DEFAULT NULL,
  `tmd_crt_ts` datetime DEFAULT NULL,
  `tmd_upd_by` varchar(10) DEFAULT NULL,
  `tmd_upd_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`tmd_roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_med_dtls`
--

INSERT INTO `t_med_dtls` (`tmd_roll`, `tmd_gender`, `tmd_height`, `tmd_weight`, `tmd_blood_grp`, `tmd_prsnt_add`, `tmd_pin_code`, `tmd_nationality`, `tmd_prmnt_add`, `tmd_act_flg`, `tmd_crt_by`, `tmd_crt_ts`, `tmd_upd_by`, `tmd_upd_ts`) VALUES
('1', 'M', '6''1"', '67', 'B-', 'Telco', 831010, 'Ind', 'Telco', 1, 'User1', '2016-08-08 20:07:43', 'User1', '2016-08-08 20:07:43'),
('1222', 'F', '6''5"', '45', 'A+', 'Kadma', 831005, 'Indian', 'Kadma', 1, 'Admin', '2016-07-29 23:51:35', 'Admin', '2016-07-30 00:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `t_prev_academy`
--

CREATE TABLE IF NOT EXISTS `t_prev_academy` (
  `tpa_roll` varchar(20) NOT NULL DEFAULT '',
  `tpa_slno` int(11) NOT NULL DEFAULT '0',
  `tpa_std` varchar(20) DEFAULT NULL,
  `tpa_board` varchar(100) DEFAULT NULL,
  `tpa_school` varchar(100) NOT NULL,
  `tpa_dvsn` varchar(5) DEFAULT NULL,
  `tpa_percnt` varchar(5) DEFAULT NULL,
  `tpa_certf_id` varchar(10) DEFAULT NULL,
  `tpa_act_flg` int(11) DEFAULT NULL,
  `tpa_crt_by` varchar(10) DEFAULT NULL,
  `tpa_crt_ts` datetime DEFAULT NULL,
  `tpa_upd_by` varchar(10) DEFAULT NULL,
  `tpa_upd_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`tpa_roll`,`tpa_slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_prev_academy`
--

INSERT INTO `t_prev_academy` (`tpa_roll`, `tpa_slno`, `tpa_std`, `tpa_board`, `tpa_school`, `tpa_dvsn`, `tpa_percnt`, `tpa_certf_id`, `tpa_act_flg`, `tpa_crt_by`, `tpa_crt_ts`, `tpa_upd_by`, `tpa_upd_ts`) VALUES
('1222', 1, 'zxczxczxc', 'zxczxc', 'zxczxc', 'zxczx', 'czxcz', 'xcxzc', 1, 'Admin', '2016-10-11 11:19:59', 'Admin', '2016-10-11 11:19:59'),
('1222', 2, 'zxccdsfsfdf', 'dfsdfsd', 'fsd', 'fsdfs', 'sdfs', 'sdfdff', 1, 'Admin', '2016-10-11 11:19:59', 'Admin', '2016-10-11 11:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `t_relative`
--

CREATE TABLE IF NOT EXISTS `t_relative` (
  `tr_roll` varchar(20) NOT NULL DEFAULT '',
  `tr_slno` int(11) NOT NULL DEFAULT '0',
  `tr_relt_nm` varchar(100) DEFAULT NULL,
  `tr_relt_desg` varchar(200) DEFAULT NULL,
  `tr_relt_dept` varchar(30) DEFAULT NULL,
  `tr_workarea` varchar(20) DEFAULT NULL,
  `tr_contact_no` varchar(20) DEFAULT NULL,
  `tr_act_flg` int(11) DEFAULT NULL,
  `tr_crt_by` varchar(10) DEFAULT NULL,
  `tr_crt_ts` datetime DEFAULT NULL,
  `tr_upd_by` varchar(10) DEFAULT NULL,
  `tr_upd_ts` datetime DEFAULT NULL,
  PRIMARY KEY (`tr_roll`,`tr_slno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_relative`
--

INSERT INTO `t_relative` (`tr_roll`, `tr_slno`, `tr_relt_nm`, `tr_relt_desg`, `tr_relt_dept`, `tr_workarea`, `tr_contact_no`, `tr_act_flg`, `tr_crt_by`, `tr_crt_ts`, `tr_upd_by`, `tr_upd_ts`) VALUES
('1222', 1, 'VM', 'AGM', 'MSD', 'Last Block', '98989899899', 1, 'Admin', '2016-07-30 20:04:35', 'Admin', '2016-07-30 20:04:35'),
('1222', 2, 'RK', 'AGM', 'MSD', 'lolll', '6766555', 1, 'Admin', '2016-07-30 20:04:35', 'Admin', '2016-07-30 20:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `t_student`
--

CREATE TABLE IF NOT EXISTS `t_student` (
  `ts_roll` varchar(20) NOT NULL DEFAULT '',
  `ts_name` varchar(100) DEFAULT NULL,
  `ts_email` varchar(100) DEFAULT NULL,
  `ts_gtpas_no` varchar(20) DEFAULT NULL,
  `ts_uniq_id` varchar(20) DEFAULT NULL,
  `ts_session` varchar(20) NOT NULL,
  `ts_DOB` date DEFAULT NULL,
  `ts_maritial_sts` int(11) DEFAULT NULL,
  `ts_contact1` int(12) DEFAULT NULL,
  `ts_contact2` int(12) DEFAULT NULL,
  `ts_fathernm` varchar(100) DEFAULT NULL,
  `ts_ocup_fath` varchar(30) DEFAULT NULL,
  `ts_cont_fath` int(12) DEFAULT NULL,
  `ts_mom_nm` varchar(100) DEFAULT NULL,
  `ts_ocup_mom` varchar(30) DEFAULT NULL,
  `ts_cont_mom` int(12) DEFAULT NULL,
  `ts_currstatus` int(11) DEFAULT NULL,
  `ts_act_flg` int(11) NOT NULL,
  `ts_crt_by` varchar(10) DEFAULT NULL,
  `ts_crt_ts` date DEFAULT NULL,
  `ts_upd_by` varchar(10) DEFAULT NULL,
  `ts_upd_ts` date DEFAULT NULL,
  `ts_locn_id` int(11) NOT NULL,
  `ts_org_id` int(11) NOT NULL,
  `ts_unit_id` int(11) NOT NULL,
  `ts_med_flg` int(11) DEFAULT NULL,
  `ts_relt_flg` int(11) DEFAULT NULL,
  `ts_deploy_flg` int(11) DEFAULT NULL,
  `ts_acadmy_flg` int(11) DEFAULT NULL,
  `ts_bank_flg` int(11) DEFAULT NULL,
  `ts_app_flg` int(11) NOT NULL,
  PRIMARY KEY (`ts_roll`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_student`
--

INSERT INTO `t_student` (`ts_roll`, `ts_name`, `ts_email`, `ts_gtpas_no`, `ts_uniq_id`, `ts_session`, `ts_DOB`, `ts_maritial_sts`, `ts_contact1`, `ts_contact2`, `ts_fathernm`, `ts_ocup_fath`, `ts_cont_fath`, `ts_mom_nm`, `ts_ocup_mom`, `ts_cont_mom`, `ts_currstatus`, `ts_act_flg`, `ts_crt_by`, `ts_crt_ts`, `ts_upd_by`, `ts_upd_ts`, `ts_locn_id`, `ts_org_id`, `ts_unit_id`, `ts_med_flg`, `ts_relt_flg`, `ts_deploy_flg`, `ts_acadmy_flg`, `ts_bank_flg`, `ts_app_flg`) VALUES
('1', 'Srikant', 'srikant.bhatt@yahoo.com', '90567', '10001', '', '2000-08-01', 1, 2309418, 2147483647, 'S.K.Agarwal', 'Service', 7866535, '', '', 0, 33, 1, 'Admin', '2016-07-10', 'User1', '2016-08-08', 1, 1, 1, 1, 0, 0, 0, 0, 0),
('1222', 'Thomaas', 'thomas@gmail.com', '45321', '3-2016', '27', '1996-06-18', 1, 754218978, 3811, 'Rakesh Kumar', 'Business', 2147483647, 'Kamla', 'House Wife', 854477878, 35, 1, 'Admin', '2016-07-11', 'Admin', '2016-10-16', 1, 1, 1, 1, 1, 1, 1, 1, 1),
('2', 'Aruni', 'Akb@yahoo.com', '234566', '2', '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 33, 1, 'Admin', '2016-07-10', 'Admin', '2016-10-16', 1, 1, 1, 0, 0, 0, 0, 0, 1),
('3', 'Srikant', '1333', '444', '1233', '', '0000-00-00', 1, 3344, 5556, NULL, NULL, NULL, NULL, NULL, NULL, 34, 1, 'Admin', '2016-07-10', 'Admin', '2016-07-10', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('34', '324234', 'werwer', '32423', '23423423', '28', '1999-02-23', 0, 0, 0, 'asdadas', 'sdasdasd', 0, 'dasdasda', 'asdasdas', 0, 34, 1, 'Admin', '2016-09-26', 'Admin', '2016-09-26', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('34234', '324234', 'werwer', '32423', '23423423', '28', '1999-02-23', 0, 0, 0, 'asdadas', 'sdasdasd', 0, 'dasdasda', 'asdasdas', 0, 34, 1, 'Admin', '2016-09-26', 'Admin', '2016-09-26', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('454', 'Raju', 'Raju@gmail.com', '12112121', '454555', '28', '1999-02-25', 0, 2342342, 0, 'sdddd', 'ddddddddddd', 2342423, 'aaaaaaaaaaaa', 'ddd', 0, 37, 1, 'Admin', '2016-09-26', 'Admin', '2016-09-26', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('454545', 'Raju', 'Raju@gmail.com', '12112121', '454555', '28', '1999-02-25', 0, 2342342, 0, 'sdddd', 'ddddddddddd', 2342423, 'aaaaaaaaaaaa', 'ddd', 0, 37, 1, 'Admin', '2016-09-26', 'Admin', '2016-09-26', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('5', 'ddddddddddddddddddddddddddddddd', 'dddddddddddd', '444', '2333', '', '2016-07-27', 0, 344, 0, NULL, NULL, NULL, NULL, NULL, NULL, 35, 1, 'Admin', '2016-07-10', 'Admin', '2016-07-10', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('5674445', 'Sangeeta', 'sfdff@gmail.com', '416273', '8977', '27', '1999-12-02', 0, 2147483647, 0, '', '', 0, '', '', 0, 33, 1, 'Admin', '2016-11-11', 'Admin', '2016-11-11', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('59', 'Ashis Dua', 'Ashis.Dua@gmail.com', '888475', '99887', '27', '1998-01-10', 0, 266777676, 0, 'S. Dua', 'Service', 0, 'M Dua', 'HW', 0, 33, 1, 'Admin', '2016-09-26', 'Admin', '2016-09-26', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('6', 'Raju', 'Raju@gmail.com', '6', '6', '', '0000-00-00', 0, 2147483647, 3811, 'Ravi', 'Business', 2147483647, 'Kunti', 'HF', 0, 36, 1, 'Admin', '2016-07-29', 'Admin', '2016-07-29', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('7', 'bitu', 'bitu@nttf.com', '7', '7', '', '2001-07-17', 0, 1145333222, 0, '', '', 0, '', '', 0, 35, 1, 'Admin', '2016-07-31', 'Admin', '2016-07-31', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('8', 'sri', 'skb@nttf.com', '980', '8', '', '1999-01-01', 0, 0, 0, '', '', 0, '', '', 0, 33, 1, 'Admin', '2016-07-31', 'Admin', '2016-07-31', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('TM/2016/20', 'Manoj Kumar', 'Mango', '342342343', '656346264', '28', '1997-08-21', 0, 2147483647, 0, 'Rajesh Kumar', 'Service', 786542990, 'Sakuntala devi', 'HF', 0, 33, 1, 'Admin', '2016-10-16', 'Admin', '2016-10-16', 1, 1, 1, 0, 0, 0, 0, 0, 0),
('TM/2016/25', 'Manish Sharma', 'Sonari', '5634420', '2016-25', '28', NULL, 0, 2147483647, 0, 'Mr. S. Sharma', 'Business', 797979797, 'Smt. Kunti  Devi', 'House WIfe', 0, 33, 1, 'Admin', '2016-10-16', 'Admin', '2016-10-16', 1, 1, 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
  `tus_pno` varchar(10) NOT NULL,
  `tus_name` varchar(255) NOT NULL,
  `tus_dept_id` int(11) NOT NULL,
  `tus_email_id` varchar(255) NOT NULL,
  `tus_pass` varchar(60) NOT NULL,
  `tus_ext_no` varchar(25) DEFAULT NULL,
  `tus_mobile_no` int(12) DEFAULT NULL,
  `tus_act_flg` int(11) NOT NULL,
  `tus_crt_by` varchar(10) DEFAULT NULL,
  `tus_crt_ts` date DEFAULT NULL,
  `tus_upd_by` varchar(10) DEFAULT NULL,
  `tus_upd_ts` date DEFAULT NULL,
  `tus_locn_id` int(11) NOT NULL,
  `tus_org_id` int(11) NOT NULL,
  `tus_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`tus_pno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`tus_pno`, `tus_name`, `tus_dept_id`, `tus_email_id`, `tus_pass`, `tus_ext_no`, `tus_mobile_no`, `tus_act_flg`, `tus_crt_by`, `tus_crt_ts`, `tus_upd_by`, `tus_upd_ts`, `tus_locn_id`, `tus_org_id`, `tus_unit_id`) VALUES
('111111', '', 26, 'asas@gmail.com', '96e79218965eb72c92a549dd5a330112', '0', 1111111, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('122', '333', 26, '442@adads', 'b59c67bf196a4758191e42f76670ceba', '0', 4444, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('12212', '112332', 26, '1234@gmail.com', 'b0baee9d279d34fa1dfd71aadb908c3f', '0', 534545, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('22222', '', 26, '222@dddd', 'e3ceb5881a0a1fdaad01296d7554868d', '0', 33333333, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('9999', '', 26, '222@dddd', '96e79218965eb72c92a549dd5a330112', '0', 1111111, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('Admin', 'Super Admin', 26, '', '85c2bea17bc69f6f47d4f473fd30c056', '0', 2147483647, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('User1', 'User1', 26, 'skb283smart@gmail.com', '6b908b785fdba05a6446347dae08d8c5', '0', 0, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1),
('User2', 'User2', 26, 'skb283mobile@gmail.com', 'a09bccf2b2963982b34dc0e08d8b582a', '0', 0, 1, NULL, '2016-06-29', NULL, '2016-06-29', 1, 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
