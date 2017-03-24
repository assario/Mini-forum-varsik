-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 24 2017 г., 09:29
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `forum`
--
CREATE DATABASE `forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  `author` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_post` varchar(20) NOT NULL,
  `topic` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Главная страница. Разделы' AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `section`
--

INSERT INTO `section` (`id`, `last_post`, `topic`) VALUES
(1, 'нен', 1),
(2, 'привет', 0),
(3, 'дада', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `name` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `last_post` varchar(20) NOT NULL,
  `close` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `topic`
--

INSERT INTO `topic` (`id`, `section`, `data`, `name`, `author`, `last_post`, `close`) VALUES
(1, 1, '2017-03-15 00:00:00', 'Тема 1', 'Betty', 'спать', 0),
(2, 1, '2017-03-15 00:00:00', 'Тема 2', 'Betty', 'спать', 1),
(3, 2, '2017-03-22 00:00:00', 'Тема 2', '7', 'лдлдл', 0),
(4, 2, '2017-03-22 00:00:00', 'Тема 2', '7', 'лдлдл', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `photo` varchar(23) NOT NULL,
  `role` char(1) NOT NULL,
  PRIMARY KEY (`user_id`,`email`,`phone`),
  UNIQUE KEY `nickname` (`nickname`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `nickname`, `password`, `email`, `phone`, `photo`, `role`) VALUES
(1, '747474', '50438d8fca45a9bf20d72774430047', '747474@f.r', '74747474', '', 'A'),
(2, '11112222', '821f3157e1a3456bfe1a000a1adf08', '11112222@www.r', '1111222233', '', 'U'),
(3, '7', '8f14e45fceea167a5a36dedd4bea25', '7@r.e', '2147483647', '', 'U'),
(4, '8', 'c9f0f895fb98ab9159f51fd0297e23', '88@r.e', '8888888888', '', 'U'),
(21, 'Mel', 'd41d8cd98f00b204e9800998ecf8427e', 'fjfjfj@e.t', '7878785656', '', 'U'),
(6, '4', 'a87ff679a2f3e71d9181a67b754212', '44@q.w', '4444444444', '', 'A'),
(7, '12', '15', '123@f.r', '1234564567', '', 'U'),
(8, 'Liza', 'md5(13)', '13@g.t', '1313131313', '', 'U'),
(9, '123', '202cb962ac59075b964b07152d234b', '123@f.rw', '1231231230', '', 'U'),
(10, '456', '250cf8b51c773f3f8dc8b4be867a9a', '456@fhfhf.r', '4564564567', '', 'A'),
(11, '', '789', '789@dhdh.r', '7897897895', '', 'U'),
(12, '147', '147', '147@r.e', '1478963250', '', 'U'),
(13, 'user', '777', 'nic@i.ua', '5412369870', '', 'A'),
(18, 'Nastya', '45', 'rere@fr.e', '1212454565', '', 'U'),
(15, 'rvk', '789', 'kvn@q.r', '7897894561', '', 'A'),
(16, 'Anna', '111b92c576e28524fd7b745f463ab39c', 'r@e.r', '7878784545', '', 'A'),
(17, 'cat', '7e598df94474f5d13a19548a0ecb4ad4', 'red@e.r', '1199977333', '', 'A'),
(22, 'qwerty', '111b92c576e28524fd7b745f463ab39c', 'dhdhdh@e.t', '4446668822', '', 'U'),
(23, 'Натали', '4edfe8019626eb0fe268b9d4ebb16b2f', 'nata@i.ua', '1166773344', '', 'A'),
(24, 'fkffk', '8f2bb236cceb6327c3849cd7ce919d93', 'elele@e.r', '7417747174', '', 'U'),
(25, 'krkrkrk', '83a788768472863c66920492a23ac744', 'eeh@f.r', '7412365849', '', 'U'),
(26, 'hfhff', '732ed790ebb474a95f2b5161e37625b0', 'webuine1@ukr.net', '0101010104', '', 'A'),
(27, 'mam', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'wine1@ukr.net', '7474141445', '', 'A'),
(28, 'lika', 'efe6398127928f1b2e9ef3207fb82663', 'q@r.e', '7777777776', '', 'U'),
(58, 'kl', '16ec114932520d2b9c18a28121d515af', 'kl@r.e', '0000000035', '1', 'A'),
(30, 'www', '4eae35f1b35977a00ebd8086c259d4c9', 'www@e.r', '0000000001', '', 'U'),
(31, 'mys', 'c798cf2f72704a7ef75ae09db3687de7', 'qwqw@e.r', '0000000002', '', 'A'),
(32, 'Liza12', 'b2ca678b4c936f905fb82f2733f5297f', 'q@r.ee', '0000000003', '', 'U'),
(33, 'qwqw', 'e110fb45bc4f7cc5d367b06bfbc8e5c3', 'qwqw@e.d', '0000000004', '', 'A'),
(34, 'rewq', 'ca092c71d6be4e9dd735fbceb0890093', 'q@r.ew', '0000000005', '', 'A'),
(35, 'r', '4b43b0aee35624cd95b910189b3dc231', 'r@g.r', '0000000006', '', 'A'),
(36, '121', '4c56ff4ce4aaf9573aa5dff913df997a', '121@e.w', '0000000007', '', 'A'),
(37, 'wwww', 'e34a8899ef6468b74f8a1048419ccc8b', 'w@e.w', '0000000100', '', 'A'),
(43, 'mmmm', '9de37a0627c25684fdd519ca84073e34', 'mmmm@r.e', '1111111744', '', 'U'),
(45, 'Lizajkjkj', '0af64c1905619dfe89db3ef502a657a9', 'qwqwee@e.d', '0000000021', '', 'U'),
(56, 'k', '8ce4b16b22b58894aa86c421e8759df3', 'k@e.r', '0000000029', '0', 'U'),
(57, 'rokki', 'd41d8cd98f00b204e9800998ecf8427e', 's@q.s', '0000000031', '0', 'U'),
(51, 'qasw', 'aa25770fa35b8b458abd9945003a6bd0', 'qasw@g.e', '1478521478', '1', 'U'),
(52, 'qazxsw', '3f230640b78d7e71ac5514e57935eb69', 'qasw@g.er', '1111111478', '1', 'U'),
(53, 'qwsa', '53c1df01e11ec01bcf9ced4ccae8c667', 'qwsa@w.q', '1245879636', '1', 'U'),
(59, 'jki', 'f70add67369e1797af277925d29544ce', 'j@w.s', '0000000472', '0', 'U'),
(55, 'уруру', '9256e7499dc1de61f0f8f8d3d443d804', 'qwqqw@e.r', '0000000030', '0', 'U');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
