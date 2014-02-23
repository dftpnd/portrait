-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 23 2014 г., 16:42
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
-- Структура таблицы `assignments`
--

CREATE TABLE IF NOT EXISTS `assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `assignments`
--

INSERT INTO `assignments` (`itemname`, `userid`, `bizrule`, `data`) VALUES
('Authority', '1', '', 's:0:"";'),
('Authority', '65', '', 's:0:"";');

-- --------------------------------------------------------

--
-- Структура таблицы `authassignment`
--

CREATE TABLE IF NOT EXISTS `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `authitem`
--

CREATE TABLE IF NOT EXISTS `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authitem`
--

INSERT INTO `authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Administrator', 2, NULL, NULL, NULL),
('Authority', 2, NULL, NULL, NULL),
('Create Post', 0, NULL, NULL, NULL),
('Create User', 0, NULL, NULL, NULL),
('Delete Post', 0, NULL, NULL, NULL),
('Delete User', 0, NULL, NULL, NULL),
('Edit Post', 0, NULL, NULL, NULL),
('Edit User', 0, NULL, NULL, NULL),
('Post Manager', 1, NULL, NULL, NULL),
('User', 2, NULL, NULL, NULL),
('User Manager', 1, NULL, NULL, NULL),
('View Post', 0, NULL, NULL, NULL),
('View User', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `authitemchild`
--

CREATE TABLE IF NOT EXISTS `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Структура таблицы `gr_upload`
--

CREATE TABLE IF NOT EXISTS `gr_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `home_id` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Структура таблицы `itemchildren`
--

CREATE TABLE IF NOT EXISTS `itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `itemchildren`
--

INSERT INTO `itemchildren` (`parent`, `child`) VALUES
('User Manager', 'CrudAdmin'),
('User Manager', 'CrudCreate'),
('User Manager', 'CrudDelete'),
('User Manager', 'CrudIndex'),
('User Manager', 'CrudUpdate'),
('User Manager', 'CrudView'),
('User Manager', 'srbac@AuthitemAssign'),
('User Manager', 'srbac@AuthitemAssignments'),
('User Manager', 'srbac@AuthitemAuto'),
('User Manager', 'srbac@AuthitemAutocomplete'),
('User Manager', 'srbac@AuthitemAutoCreateItems'),
('User Manager', 'srbac@AuthitemAutoDeleteItems'),
('User Manager', 'srbac@AuthitemClearObsolete'),
('User Manager', 'srbac@AuthitemConfirm'),
('User Manager', 'srbac@AuthitemCreate'),
('User Manager', 'srbac@AuthitemDelete'),
('User Manager', 'srbac@AuthitemDeleteObsolete'),
('User Manager', 'srbac@AuthitemEditAllowed'),
('User Manager', 'srbac@AuthitemFrontPage'),
('User Manager', 'srbac@AuthitemGetCleverOpers'),
('User Manager', 'srbac@AuthitemGetOpers'),
('User Manager', 'srbac@AuthitemGetRoles'),
('User Manager', 'srbac@AuthitemGetTasks'),
('User Manager', 'srbac@AuthitemGetUsers'),
('User Manager', 'srbac@AuthitemInstall'),
('User Manager', 'srbac@AuthitemList'),
('User Manager', 'srbac@AuthitemManage'),
('User Manager', 'srbac@AuthitemSaveAllowed'),
('User Manager', 'srbac@AuthitemScan'),
('User Manager', 'srbac@AuthitemShow'),
('User Manager', 'srbac@AuthitemShowAssignments'),
('User Manager', 'srbac@AuthitemUpdate'),
('Authority', 'User Manager'),
('User Manager', 'userAdmin@AdminAbout'),
('User Manager', 'userAdmin@AdminAddCharge'),
('User Manager', 'userAdmin@AdminAddRequirements'),
('User Manager', 'userAdmin@AdminContacts'),
('User Manager', 'userAdmin@AdminCreateSleder'),
('User Manager', 'userAdmin@AdminCreateVacancy'),
('User Manager', 'userAdmin@AdminDeleteCharge'),
('User Manager', 'userAdmin@AdminDeleteEquipment'),
('User Manager', 'userAdmin@AdminDeleteFileEquipment'),
('User Manager', 'userAdmin@AdminDeleteFilePortfolio'),
('User Manager', 'userAdmin@AdminDeleteLargeImg'),
('User Manager', 'userAdmin@AdminDeleteMiniImg'),
('User Manager', 'userAdmin@AdminDeletePg'),
('User Manager', 'userAdmin@AdminDeletePortfolio'),
('User Manager', 'userAdmin@AdminDeleteRequirements'),
('User Manager', 'userAdmin@AdminDeleteSlide'),
('User Manager', 'userAdmin@AdminDeleteTag'),
('User Manager', 'userAdmin@AdminDeleteVacancy'),
('User Manager', 'userAdmin@AdminDownloadFile'),
('User Manager', 'userAdmin@AdminDownloadImg'),
('User Manager', 'userAdmin@AdminDownloadLargeImgId'),
('User Manager', 'userAdmin@AdminDownloadMiniImgId'),
('User Manager', 'userAdmin@AdminIndex'),
('User Manager', 'userAdmin@AdminInfo'),
('User Manager', 'userAdmin@AdminMain'),
('User Manager', 'userAdmin@AdminPositionSlide'),
('User Manager', 'userAdmin@AdminPositionVacancy'),
('User Manager', 'userAdmin@AdminProducts'),
('User Manager', 'userAdmin@AdminSaveEqText'),
('User Manager', 'userAdmin@AdminSaveEquipment'),
('User Manager', 'userAdmin@AdminSavePortfolio'),
('User Manager', 'userAdmin@AdminSaveProductsGroup'),
('User Manager', 'userAdmin@AdminSaveSledePosition'),
('User Manager', 'userAdmin@AdminSaveTag'),
('User Manager', 'userAdmin@AdminsContacts'),
('User Manager', 'userAdmin@AdminService'),
('User Manager', 'userAdmin@AdminUpdateAboutMaine'),
('User Manager', 'userAdmin@AdminUpdateLarge'),
('User Manager', 'userAdmin@AdminUpdatePlusMaine'),
('User Manager', 'userAdmin@AdminUpdatePortfolio'),
('User Manager', 'userAdmin@AdminUpdateService'),
('User Manager', 'userAdmin@AdminUpdateVacancy'),
('User Manager', 'userAdmin@AdminWorks'),
('User Manager', 'View Post'),
('User Manager', 'View User');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('Authority', 2, NULL, NULL, NULL),
('CrudAdmin', 0, NULL, NULL, 'N;'),
('CrudCreate', 0, NULL, NULL, 'N;'),
('CrudDelete', 0, NULL, NULL, 'N;'),
('CrudIndex', 0, NULL, NULL, 'N;'),
('CrudUpdate', 0, NULL, NULL, 'N;'),
('CrudView', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAssign', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAssignments', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAuto', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutocomplete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutoCreateItems', 0, NULL, NULL, 'N;'),
('srbac@AuthitemAutoDeleteItems', 0, NULL, NULL, 'N;'),
('srbac@AuthitemClearObsolete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemConfirm', 0, NULL, NULL, 'N;'),
('srbac@AuthitemCreate', 0, NULL, NULL, 'N;'),
('srbac@AuthitemDelete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemDeleteObsolete', 0, NULL, NULL, 'N;'),
('srbac@AuthitemEditAllowed', 0, NULL, NULL, 'N;'),
('srbac@AuthitemFrontPage', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetCleverOpers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetOpers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetRoles', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetTasks', 0, NULL, NULL, 'N;'),
('srbac@AuthitemGetUsers', 0, NULL, NULL, 'N;'),
('srbac@AuthitemInstall', 0, NULL, NULL, 'N;'),
('srbac@AuthitemList', 0, NULL, NULL, 'N;'),
('srbac@AuthitemManage', 0, NULL, NULL, 'N;'),
('srbac@AuthitemSaveAllowed', 0, NULL, NULL, 'N;'),
('srbac@AuthitemScan', 0, NULL, NULL, 'N;'),
('srbac@AuthitemShow', 0, NULL, NULL, 'N;'),
('srbac@AuthitemShowAssignments', 0, NULL, NULL, 'N;'),
('srbac@AuthitemUpdate', 0, NULL, NULL, 'N;'),
('User Manager', 1, NULL, NULL, NULL),
('userAdmin@AdminAbout', 0, NULL, NULL, 'N;'),
('userAdmin@AdminAddCharge', 0, NULL, NULL, 'N;'),
('userAdmin@AdminAddRequirements', 0, NULL, NULL, 'N;'),
('userAdmin@AdminContacts', 0, NULL, NULL, 'N;'),
('userAdmin@AdminCreateSleder', 0, NULL, NULL, 'N;'),
('userAdmin@AdminCreateVacancy', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteCharge', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteEquipment', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteFileEquipment', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteFilePortfolio', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteLargeImg', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteMiniImg', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeletePg', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeletePortfolio', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteRequirements', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteSlide', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteTag', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDeleteVacancy', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDownloadFile', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDownloadImg', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDownloadLargeImgId', 0, NULL, NULL, 'N;'),
('userAdmin@AdminDownloadMiniImgId', 0, NULL, NULL, 'N;'),
('userAdmin@AdminIndex', 0, NULL, NULL, 'N;'),
('userAdmin@AdminInfo', 0, NULL, NULL, 'N;'),
('userAdmin@AdminMain', 0, NULL, NULL, 'N;'),
('userAdmin@AdminPositionSlide', 0, NULL, NULL, 'N;'),
('userAdmin@AdminPositionVacancy', 0, NULL, NULL, 'N;'),
('userAdmin@AdminProducts', 0, NULL, NULL, 'N;'),
('userAdmin@AdminSaveEqText', 0, NULL, NULL, 'N;'),
('userAdmin@AdminSaveEquipment', 0, NULL, NULL, 'N;'),
('userAdmin@AdminSavePortfolio', 0, NULL, NULL, 'N;'),
('userAdmin@AdminSaveProductsGroup', 0, NULL, NULL, 'N;'),
('userAdmin@AdminSaveSledePosition', 0, NULL, NULL, 'N;'),
('userAdmin@AdminSaveTag', 0, NULL, NULL, 'N;'),
('userAdmin@AdminsContacts', 0, NULL, NULL, 'N;'),
('userAdmin@AdminService', 0, NULL, NULL, 'N;'),
('userAdmin@AdminUpdateAboutMaine', 0, NULL, NULL, 'N;'),
('userAdmin@AdminUpdateLarge', 0, NULL, NULL, 'N;'),
('userAdmin@AdminUpdatePlusMaine', 0, NULL, NULL, 'N;'),
('userAdmin@AdminUpdatePortfolio', 0, NULL, NULL, 'N;'),
('userAdmin@AdminUpdateService', 0, NULL, NULL, 'N;'),
('userAdmin@AdminUpdateVacancy', 0, NULL, NULL, 'N;'),
('userAdmin@AdminWorks', 0, NULL, NULL, 'N;'),
('View Post', 0, NULL, NULL, NULL),
('View User', 0, NULL, NULL, NULL);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `authassignment`
--
ALTER TABLE `authassignment`
  ADD CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `authitemchild`
--
ALTER TABLE `authitemchild`
  ADD CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `itemchildren`
--
ALTER TABLE `itemchildren`
  ADD CONSTRAINT `itemchildren_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itemchildren_ibfk_2` FOREIGN KEY (`child`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
