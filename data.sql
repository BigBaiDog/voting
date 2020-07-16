-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-07-01 04:49:27
-- 服务器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `voting`
--

-- --------------------------------------------------------

--
-- 表的结构 `voying_admin`
--

CREATE TABLE `voying_admin` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '管理员编号',
  `admin` varchar(255) NOT NULL COMMENT '管理员账号',
  `password` varchar(255) NOT NULL COMMENT '管理员密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `voying_admin`
--

INSERT INTO `voying_admin` (`id`, `admin`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `voying_count`
--

CREATE TABLE `voying_count` (
  `vid` int(10) DEFAULT NULL COMMENT '投票',
  `uid` int(10) DEFAULT NULL COMMENT '用户',
  `choose` int(3) DEFAULT NULL COMMENT '选项'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `voying_count`
--

INSERT INTO `voying_count` (`vid`, `uid`, `choose`) VALUES
(1, 3, 2),
(1, 5, 0),
(1, 2, 2),
(1, 1, 0),
(1, 2, 1),
(1, 4, 5),
(1, 6, 9),
(1, 7, 2),
(1, 8, 3),
(1, 9, 0),
(1, 10, 2),
(1, 11, 3);

-- --------------------------------------------------------

--
-- 表的结构 `voying_user`
--

CREATE TABLE `voying_user` (
  `id` int(10) NOT NULL COMMENT '用户编号',
  `email` varchar(255) NOT NULL COMMENT '用户账号',
  `name` varchar(255) NOT NULL COMMENT '用户昵称',
  `password` varchar(255) NOT NULL COMMENT '用户密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `voying_user`
--

INSERT INTO `voying_user` (`id`, `email`, `name`, `password`) VALUES
(2, '123456@qq.com', '阿达', 'e10adc3949ba59abbe56e057f20f883e'),
(3, '4545@qq.com', '小东', ''),
(4, '4444@gmail.com', '阿飞', ''),
(5, '435234@qq.com', '阿发', ''),
(6, 'fafwe456454@gmail.com', '张三', ''),
(7, '4545115@168.com', '张丰', ''),
(8, '481451@qq.com', '阿汤哥', ''),
(9, '4654756@qq.com', '华威', ''),
(10, '3545@outlook.com', '吖吖', ''),
(11, '47854hfgh@139.com', '琳琳', ''),
(12, 'yuan@mail.com', '小远', '');

-- --------------------------------------------------------

--
-- 表的结构 `voying_visitor`
--

CREATE TABLE `voying_visitor` (
  `num` int(11) NOT NULL COMMENT '访客量'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `voying_visitor`
--

INSERT INTO `voying_visitor` (`num`) VALUES
(27);

-- --------------------------------------------------------

--
-- 表的结构 `voying_vote`
--

CREATE TABLE `voying_vote` (
  `id` int(10) NOT NULL COMMENT '投票编号',
  `title` varchar(32) DEFAULT NULL COMMENT '标题',
  `more` varchar(255) DEFAULT NULL COMMENT '内容',
  `option` varchar(255) DEFAULT NULL COMMENT '选项'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `voying_vote`
--

INSERT INTO `voying_vote` (`id`, `title`, `more`, `option`) VALUES
(1, '大学生毕业后的打算', '大学毕业后您对未来有什么打算呢？欢迎您进入关于大学生毕业后的打算的调查问卷', '报考研究生/报考公务员/找工作/已拿到office/自主创业/报名参军/出国留学/回家继承家业/先旅游几个月再作打算/其他');

--
-- 转储表的索引
--

--
-- 表的索引 `voying_admin`
--
ALTER TABLE `voying_admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `voying_user`
--
ALTER TABLE `voying_user`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `voying_vote`
--
ALTER TABLE `voying_vote`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `voying_admin`
--
ALTER TABLE `voying_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理员编号', AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `voying_user`
--
ALTER TABLE `voying_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '用户编号', AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `voying_vote`
--
ALTER TABLE `voying_vote`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '投票编号', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
