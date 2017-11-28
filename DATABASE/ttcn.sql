-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2016 at 05:25 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttcn`
--

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE IF NOT EXISTS `hocky` (
  `MaHK` int(11) NOT NULL,
  `TenNH` varchar(11) NOT NULL,
  `TenHK` varchar(50) NOT NULL,
  `Trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`MaHK`, `TenNH`, `TenHK`, `Trangthai`) VALUES
(4, '2015-2016', 'Há»c ká»³ II', 1),
(5, '2015-2016', 'Há»c ká»³ 1', 1),
(6, '2014-2015', 'Há»c ká»³ I', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kqdrl`
--

CREATE TABLE IF NOT EXISTS `kqdrl` (
  `MaKQ` int(11) NOT NULL,
  `TC1` varchar(10) NOT NULL,
  `TC2` varchar(10) NOT NULL,
  `TC3` varchar(10) NOT NULL,
  `TC4` varchar(10) NOT NULL,
  `TC5` varchar(10) NOT NULL,
  `Tongdiem` int(3) NOT NULL,
  `Phanloai` varchar(20) NOT NULL,
  `MSV` varchar(50) NOT NULL,
  `tenthat` varchar(50) NOT NULL,
  `Lop` varchar(10) NOT NULL,
  `MaHK` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kqdrl_cb`
--

CREATE TABLE IF NOT EXISTS `kqdrl_cb` (
  `MaKQDRLCB` int(11) NOT NULL,
  `MSV` varchar(50) NOT NULL,
  `chucvu` tinyint(2) NOT NULL,
  `TC1` varchar(10) NOT NULL,
  `TC1_2` varchar(10) NOT NULL,
  `TC1_3` varchar(10) NOT NULL,
  `TC1_4` varchar(10) NOT NULL,
  `TCB1` varchar(10) NOT NULL,
  `TCB2` varchar(10) NOT NULL,
  `TC2` varchar(10) NOT NULL,
  `TC3` varchar(10) NOT NULL,
  `TC4_1` varchar(10) NOT NULL,
  `TC4_2` varchar(10) NOT NULL,
  `TC4_3` varchar(10) NOT NULL,
  `TC5` varchar(10) NOT NULL,
  `Tongdiem` int(3) NOT NULL,
  `Phanloai` varchar(10) NOT NULL,
  `MaHK` int(11) NOT NULL,
  `lop` varchar(10) NOT NULL,
  `tenthat` varchar(50) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kqdrl_sv`
--

CREATE TABLE IF NOT EXISTS `kqdrl_sv` (
  `MaKQDRLSV` int(11) NOT NULL,
  `MSV` varchar(50) NOT NULL,
  `TC1` varchar(10) NOT NULL,
  `TC1_2` varchar(10) NOT NULL,
  `TC1_3` varchar(10) NOT NULL,
  `TC1_4` varchar(10) NOT NULL,
  `TCB1` varchar(10) NOT NULL,
  `TCB2` varchar(10) NOT NULL,
  `TC2` varchar(10) NOT NULL,
  `TC3` varchar(10) NOT NULL,
  `TC4_1` varchar(10) NOT NULL,
  `TC4_2` varchar(10) NOT NULL,
  `TC4_3` varchar(10) NOT NULL,
  `TC5` varchar(10) NOT NULL,
  `Tongdiem` int(3) NOT NULL,
  `Phanloai` varchar(20) NOT NULL,
  `MaHK` int(11) NOT NULL,
  `lop` varchar(10) NOT NULL,
  `tenthat` varchar(50) NOT NULL,
  `Trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kqdrl_sv`
--

INSERT INTO `kqdrl_sv` (`MaKQDRLSV`, `MSV`, `TC1`, `TC1_2`, `TC1_3`, `TC1_4`, `TCB1`, `TCB2`, `TC2`, `TC3`, `TC4_1`, `TC4_2`, `TC4_3`, `TC5`, `Tongdiem`, `Phanloai`, `MaHK`, `lop`, `tenthat`, `Trangthai`) VALUES
(10, '576794', '', '', '', '', '', '', '', '', '', '', '5', '', 5, 'Yáº¿u', 4, 'K57QLTT', 'HÃ  Kiá»u Linh', 1),
(12, '576787', '', '', '', '', '', '', '', '', '', '', '', '10', 10, 'Yáº¿u', 4, 'K57THB', 'LÃª VÄƒn Huy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE IF NOT EXISTS `lop` (
  `MaL` int(11) NOT NULL,
  `TenL` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaL`, `TenL`) VALUES
(1, 'K60THB'),
(2, 'K57QLTT'),
(3, 'K57THB');

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE IF NOT EXISTS `quantri` (
  `MaQT` int(11) NOT NULL,
  `Taikhoan` varchar(50) NOT NULL,
  `Matkhau` varchar(50) NOT NULL,
  `Trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`MaQT`, `Taikhoan`, `Matkhau`, `Trangthai`) VALUES
(1, 'admin', 'admin1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE IF NOT EXISTS `sinhvien` (
  `MaSV` int(11) NOT NULL,
  `MSV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thoigian_cb`
--

CREATE TABLE IF NOT EXISTS `thoigian_cb` (
  `MaTGCB` int(11) NOT NULL,
  `Tgbatdaucb` date NOT NULL,
  `Tgketthuccb` date NOT NULL,
  `MaHK` int(11) NOT NULL,
  `Trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thoigian_cb`
--

INSERT INTO `thoigian_cb` (`MaTGCB`, `Tgbatdaucb`, `Tgketthuccb`, `MaHK`, `Trangthai`) VALUES
(1, '2016-06-21', '2016-06-25', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thoigian_sv`
--

CREATE TABLE IF NOT EXISTS `thoigian_sv` (
  `MaTGSV` int(11) NOT NULL,
  `Tgbatdausv` date NOT NULL,
  `Tgketthucsv` date NOT NULL,
  `MaHK` int(11) NOT NULL,
  `Trangthai` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thoigian_sv`
--

INSERT INTO `thoigian_sv` (`MaTGSV`, `Tgbatdausv`, `Tgketthucsv`, `MaHK`, `Trangthai`) VALUES
(1, '2016-05-04', '2016-05-05', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tenthat` varchar(30) NOT NULL,
  `chucvu` tinyint(2) NOT NULL,
  `lop` varchar(10) NOT NULL,
  `ngaysinh` int(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`MaHK`);

--
-- Indexes for table `kqdrl`
--
ALTER TABLE `kqdrl`
  ADD PRIMARY KEY (`MaKQ`);

--
-- Indexes for table `kqdrl_cb`
--
ALTER TABLE `kqdrl_cb`
  ADD PRIMARY KEY (`MaKQDRLCB`);

--
-- Indexes for table `kqdrl_sv`
--
ALTER TABLE `kqdrl_sv`
  ADD PRIMARY KEY (`MaKQDRLSV`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaL`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`MaQT`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- Indexes for table `thoigian_cb`
--
ALTER TABLE `thoigian_cb`
  ADD PRIMARY KEY (`MaTGCB`);

--
-- Indexes for table `thoigian_sv`
--
ALTER TABLE `thoigian_sv`
  ADD PRIMARY KEY (`MaTGSV`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hocky`
--
ALTER TABLE `hocky`
  MODIFY `MaHK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kqdrl`
--
ALTER TABLE `kqdrl`
  MODIFY `MaKQ` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kqdrl_cb`
--
ALTER TABLE `kqdrl_cb`
  MODIFY `MaKQDRLCB` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kqdrl_sv`
--
ALTER TABLE `kqdrl_sv`
  MODIFY `MaKQDRLSV` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `MaL` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quantri`
--
ALTER TABLE `quantri`
  MODIFY `MaQT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `MaSV` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thoigian_cb`
--
ALTER TABLE `thoigian_cb`
  MODIFY `MaTGCB` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `thoigian_sv`
--
ALTER TABLE `thoigian_sv`
  MODIFY `MaTGSV` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
