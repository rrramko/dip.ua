-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 18 2015 г., 22:04
-- Версия сервера: 5.1.70-community-log
-- Версия PHP: 5.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `diplom`
--
CREATE DATABASE IF NOT EXISTS `diplom` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `diplom`;

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` text NOT NULL,
  `all_hours` int(11) NOT NULL,
  `ind_hours` int(11) NOT NULL,
  `l_hours` int(11) NOT NULL,
  `pr_hours` int(11) NOT NULL,
  `sem_hours` int(11) NOT NULL,
  `lab_hours` int(11) NOT NULL,
  `stud_hours` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `all_hours`, `ind_hours`, `l_hours`, `pr_hours`, `sem_hours`, `lab_hours`, `stud_hours`, `active`) VALUES
(1, 'предмент', 108, 10, 22, 0, 20, 0, 56, 1),
(2, '1111', 11, 11, 11, 11, 11, 11, 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_name` text NOT NULL,
  `hour` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_name`, `hour`) VALUES
(1, 'Лучка Роман', 900),
(2, 'Петров петро', 900),
(3, '11', 111),
(4, '222', 222),
(5, '222', 222),
(6, '222', 222);

-- --------------------------------------------------------

--
-- Структура таблицы `teach_subj`
--

CREATE TABLE IF NOT EXISTS `teach_subj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `subject` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `teach_subj`
--

INSERT INTO `teach_subj` (`id`, `teacher_id`, `subject`) VALUES
(1, 1, 'предмент'),
(2, 1, '1111'),
(3, 1, '1111'),
(10, 1, 'предмент'),
(11, 1, '1111'),
(12, 1, 'предмент'),
(13, 2, 'предмент'),
(14, 2, '1111');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
