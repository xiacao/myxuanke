-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-29 09:59:22
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myxuanke`
--

-- --------------------------------------------------------

--
-- 表的结构 `my_admin`
--

CREATE TABLE `my_admin` (
  `id` int(11) NOT NULL,
  `aname` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_admin`
--

INSERT INTO `my_admin` (`id`, `aname`, `password`) VALUES
(10, '123', '123456'),
(8, '58757', '57857');

-- --------------------------------------------------------

--
-- 表的结构 `my_class`
--

CREATE TABLE `my_class` (
  `cid` int(10) NOT NULL COMMENT '班级序号',
  `ctid` int(20) DEFAULT NULL COMMENT '班主任',
  `did` int(20) DEFAULT NULL COMMENT '所属系'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_class`
--

INSERT INTO `my_class` (`cid`, `ctid`, `did`) VALUES
(1, 22, 10001),
(2, 333, 10002);

-- --------------------------------------------------------

--
-- 表的结构 `my_course`
--

CREATE TABLE `my_course` (
  `id` int(11) NOT NULL COMMENT 'id',
  `cno` char(10) NOT NULL COMMENT '课程号',
  `tno` char(20) NOT NULL COMMENT '教师工号',
  `cname` char(50) DEFAULT NULL COMMENT '课程名',
  `ccredit` float DEFAULT NULL COMMENT '学分',
  `cdescribe` text COMMENT '课程描述'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_course`
--

INSERT INTO `my_course` (`id`, `cno`, `tno`, `cname`, `ccredit`, `cdescribe`) VALUES
(1, 'c1001', 't2015003', '物理', 3, '物理好难'),
(2, 'c1002', 't2015002', '外语', 3, '外语也很难'),
(21, '24245', 't2015004', '24524', 24524, '24');

-- --------------------------------------------------------

--
-- 表的结构 `my_sc`
--

CREATE TABLE `my_sc` (
  `id` int(11) NOT NULL COMMENT 'id号',
  `sno` int(10) NOT NULL COMMENT '学号',
  `cno` char(10) NOT NULL COMMENT '课程号',
  `grade` char(10) DEFAULT NULL COMMENT '成绩'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_sc`
--

INSERT INTO `my_sc` (`id`, `sno`, `cno`, `grade`) VALUES
(368, 2015283302, 'c1001', '33'),
(376, 2015283301, 'c1001', NULL),
(370, 2015283302, 'c1002', '52'),
(365, 2015283303, 'c1002', '5'),
(369, 2015283303, 'c1002', '4'),
(357, 2015283301, 'c1002', '55'),
(371, 2015283303, 'c1001', NULL),
(375, 2015283301, '24245', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `my_student`
--

CREATE TABLE `my_student` (
  `id` int(20) NOT NULL COMMENT 'id',
  `sno` int(10) NOT NULL COMMENT '学号',
  `sname` char(20) NOT NULL COMMENT '姓名',
  `ssex` smallint(10) DEFAULT NULL COMMENT '性别',
  `sclass` int(20) DEFAULT NULL COMMENT '班级',
  `pwd` varchar(50) NOT NULL COMMENT '密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_student`
--

INSERT INTO `my_student` (`id`, `sno`, `sname`, `ssex`, `sclass`, `pwd`) VALUES
(16, 2015283301, '张33', 1, 1, '123456'),
(17, 2015283302, '22', 1, 2, '123456'),
(18, 2015283308, '娃娃', 1, 1, '123456'),
(19, 2015283101, '请求', 0, 1, '123456');

-- --------------------------------------------------------

--
-- 表的结构 `my_teacher`
--

CREATE TABLE `my_teacher` (
  `id` int(20) NOT NULL COMMENT 'id',
  `tno` char(20) NOT NULL COMMENT '工号',
  `tname` char(20) DEFAULT NULL COMMENT '姓名',
  `tsex` char(10) DEFAULT NULL COMMENT '性别',
  `tdept` char(20) DEFAULT NULL COMMENT '系别id',
  `temail` char(50) DEFAULT NULL COMMENT '邮箱',
  `pwd` varchar(40) NOT NULL COMMENT '密码'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `my_teacher`
--

INSERT INTO `my_teacher` (`id`, `tno`, `tname`, `tsex`, `tdept`, `temail`, `pwd`) VALUES
(3, 't2015003', '王华', '0', '10001', '12300000045@qq.com', '123456'),
(4, 't2015004', '赵晶晶', '1', '10002', '1558319437@qq.com', '123456'),
(6, 't2015002', '赵晶晶', '1', '10003', '1558319437@qq.com', '123456'),
(9, '4475', '875785', '0', '144', '578578', '123456'),
(13, '8757', '5785', '女', '5785', '578', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_admin`
--
ALTER TABLE `my_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_class`
--
ALTER TABLE `my_class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `my_course`
--
ALTER TABLE `my_course`
  ADD PRIMARY KEY (`id`,`cno`),
  ADD KEY `tno` (`tno`),
  ADD KEY `cno` (`cno`);

--
-- Indexes for table `my_sc`
--
ALTER TABLE `my_sc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_student`
--
ALTER TABLE `my_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sno` (`sno`),
  ADD KEY `sclass` (`sclass`);

--
-- Indexes for table `my_teacher`
--
ALTER TABLE `my_teacher`
  ADD PRIMARY KEY (`id`,`tno`),
  ADD KEY `tno` (`tno`),
  ADD KEY `did` (`tdept`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `my_admin`
--
ALTER TABLE `my_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `my_course`
--
ALTER TABLE `my_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `my_sc`
--
ALTER TABLE `my_sc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id号', AUTO_INCREMENT=377;
--
-- 使用表AUTO_INCREMENT `my_student`
--
ALTER TABLE `my_student`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `my_teacher`
--
ALTER TABLE `my_teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
