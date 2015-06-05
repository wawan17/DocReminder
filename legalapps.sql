-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 05:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `legalapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `no_doc` varchar(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `email` text,
  `status` char(1) DEFAULT 'o',
  `create_date` date DEFAULT NULL,
  `last_edit_date` date DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `last_edited_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`no_doc`, `title`, `description`, `from_date`, `to_date`, `email`, `status`, `create_date`, `last_edit_date`, `created_by`, `last_edited_by`) VALUES
('106465', 'SPK', 'TES', '2014-05-28', '2015-05-28', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('123151', 'TDL', 'TARIF DASAR LISTRIK', '2014-05-20', '2014-07-20', 'wawan.setiawan@mpm-rent.com', 'c', '2015-02-23', '2015-02-25', 'administrator', '127.0.0.1'),
('125478', 'TES', 'TES', '2014-05-31', '2015-05-31', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', '2015-02-23', 'administrator', '127.0.0.1'),
('132213', 'PARIWISATA', 'TES', '2014-05-24', '2015-05-24', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('166395', 'JALAN JALAN', 'AU AH GELAP', '2014-05-22', '2015-05-22', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('167943', 'TES', 'TES', '2014-06-03', '2015-06-03', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', '2015-02-23', 'administrator', '127.0.0.1'),
('197358', 'TES', 'TES', '2014-06-02', '2015-06-02', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', '2015-02-25', 'administrator', '127.0.0.1'),
('220100', 'TES', 'TES', '2014-05-30', '2015-05-30', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('244560', 'TES', 'TES', '2014-06-02', '2015-06-02', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('256985', 'DINAS AJAH', 'TES', '2014-05-25', '2015-05-25', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', '2015-02-23', 'administrator', '127.0.0.1'),
('265984', 'UPAH BURUH', 'TES', '2014-05-27', '2015-05-27', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', '2015-02-23', 'administrator', '127.0.0.1'),
('268594', 'MASALAH BURUH', 'TES', '2014-05-26', '2015-05-26', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', '2015-02-23', 'administrator', '127.0.0.1'),
('325896', 'TES', 'TES', '2014-05-30', '2015-05-30', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('356542', 'PARIWISATA', 'TES', '2014-05-24', '2015-05-24', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('365479', 'SPK', 'TES', '2014-05-28', '2015-05-28', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('410083', 'TES', 'TES', '2014-06-03', '2015-06-03', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('464654', 'UANG JAJAN', 'ASAL', '2014-05-21', '2015-05-21', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('541040', 'UPAH BURUH', 'TES', '2014-05-27', '2015-05-27', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('547684', 'JALAN JALAN', 'AU AH GELAP', '2014-05-22', '2015-05-22', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('608336', 'DINAS AJAH', 'TES', '2014-05-25', '2015-05-25', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('632981', 'SPK', 'TES', '2014-06-01', '2015-06-01', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('683881', 'SPK', 'TES', '2014-06-01', '2015-06-01', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('698715', 'MELANCONG', 'ANAK ALAY BERWISATA', '2014-05-23', '2015-05-23', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', ''),
('724387', 'TDL', 'TARIF DASAR LISTRIK', '2014-05-20', '2015-05-20', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('831143', 'TES', 'TES', '2014-05-31', '2015-05-31', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('864227', 'TES', 'TES', '2014-05-29', '2015-05-29', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('941448', 'UANG JAJAN', 'ASAL', '2014-05-21', '2015-05-21', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('947052', 'MASALAH BURUH', 'TES', '2014-05-26', '2015-05-26', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('960176', 'MELANCONG', 'ANAK ALAY BERWISATA', '2014-05-23', '2015-05-23', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-24', NULL, 'user', ''),
('963214', 'TES', 'TES', '2014-05-29', '2015-05-29', 'wawan.setiawan@mpm-rent.com', 'o', '2015-02-23', NULL, 'administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attemps`
--

CREATE TABLE IF NOT EXISTS `login_attemps` (
`id_login` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_group_id`, `username`, `password`, `name`) VALUES
(1, 1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'administrator'),
(6, 2, 'user1', '12dea96fec20593566ab75692c9949596833adc9', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE IF NOT EXISTS `user_access` (
`id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `user_group_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `module_id`, `user_group_id`) VALUES
(43, 1, 1),
(44, 12, 1),
(45, 2, 1),
(46, 3, 1),
(47, 4, 1),
(48, 5, 1),
(49, 6, 1),
(50, 7, 1),
(51, 8, 1),
(52, 9, 1),
(53, 10, 1),
(54, 11, 1),
(67, 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
`user_group_id` int(11) NOT NULL,
  `user_group_name` varchar(50) NOT NULL,
  `remark` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `user_group_name`, `remark`) VALUES
(1, 'administrator', 'akses penuh'),
(2, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_module`
--

CREATE TABLE IF NOT EXISTS `user_module` (
`module_id` int(11) NOT NULL,
  `module_group_id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `module_desc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_module`
--

INSERT INTO `user_module` (`module_id`, `module_group_id`, `module_name`, `file`, `module_desc`) VALUES
(1, 4, 'input user', 'user', 'modul untuk menambah data user, mengedit dan menghapus data user'),
(2, 4, 'input user group', 'user_group', 'mengatur akses tiap grup pengguna'),
(3, 1, 'input client', 'client', 'module untuk menambah, menghapus, mengubah dan melihat penerimaan kas'),
(4, 1, 'input department', 'departmen', 'module untuk menambah, menghapus, mengubah dan melihat pengeluaran kas'),
(5, 1, 'input subdepartment', 'subdepartment', 'module untuk validasi penerimaan kas'),
(6, 1, 'input document category', 'document_category', 'module untuk validasi pengeluaran kas'),
(7, 3, 'penutupan kontrak', 'report/laporan_penerimaan_kas', 'module untuk melihat laporan penerimaan kas'),
(8, 3, 'perpanjangan kontrak', 'report/laporan_pengeluaran_kas', 'module untuk melihat laporan pengeluaran kas'),
(12, 2, 'input document', 'document', 'modul untuk menambah, menghapus, mengedit dan melihat kode perkiraan');

-- --------------------------------------------------------

--
-- Table structure for table `user_module_group`
--

CREATE TABLE IF NOT EXISTS `user_module_group` (
`module_group_id` int(11) NOT NULL,
  `module_group_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_module_group`
--

INSERT INTO `user_module_group` (`module_group_id`, `module_group_name`) VALUES
(1, 'master'),
(2, 'transaction'),
(3, 'report'),
(4, 'user management');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
 ADD PRIMARY KEY (`no_doc`);

--
-- Indexes for table `login_attemps`
--
ALTER TABLE `login_attemps`
 ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
 ADD PRIMARY KEY (`user_group_id`);

--
-- Indexes for table `user_module`
--
ALTER TABLE `user_module`
 ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `user_module_group`
--
ALTER TABLE `user_module_group`
 ADD PRIMARY KEY (`module_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attemps`
--
ALTER TABLE `login_attemps`
MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_module`
--
ALTER TABLE `user_module`
MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_module_group`
--
ALTER TABLE `user_module_group`
MODIFY `module_group_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
