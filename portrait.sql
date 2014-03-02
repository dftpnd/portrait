-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 02 2014 г., 17:39
-- Версия сервера: 5.6.12-log
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `portrait`
--
CREATE DATABASE IF NOT EXISTS `portrait` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `portrait`;

-- --------------------------------------------------------

--
-- Структура таблицы `gr_callback`
--

CREATE TABLE IF NOT EXISTS `gr_callback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `gr_datapick`
--

CREATE TABLE IF NOT EXISTS `gr_datapick` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `datapick` date NOT NULL,
  `created` int(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `home_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Структура таблицы `gr_home`
--

CREATE TABLE IF NOT EXISTS `gr_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `gr_home`
--

INSERT INTO `gr_home` (`id`, `name`, `text`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '3'),
(4, 4, '4'),
(5, 5, '5');

-- --------------------------------------------------------

--
-- Структура таблицы `gr_lookup`
--

CREATE TABLE IF NOT EXISTS `gr_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `gr_lookup`
--

INSERT INTO `gr_lookup` (`id`, `name`, `code`, `type`, `position`) VALUES
(18, 'Новый', 1, 'datapickStatus', 1),
(19, 'Отклоненный', 3, 'datapickStatus', 3),
(20, 'Подтвержденный', 2, 'datapickStatus', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `gr_review`
--

CREATE TABLE IF NOT EXISTS `gr_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `gr_upload`
--

CREATE TABLE IF NOT EXISTS `gr_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `home_id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `mime` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `gr_user`
--

CREATE TABLE IF NOT EXISTS `gr_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=132 ;

--
-- Дамп данных таблицы `gr_user`
--

INSERT INTO `gr_user` (`id`, `password`, `username`, `active`) VALUES
(1, 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
