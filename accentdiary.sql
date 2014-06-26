-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 27 2014 г., 18:13
-- Версия сервера: 5.5.37-0ubuntu0.13.10.1
-- Версия PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `accentdiary`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reportCard`
--

CREATE TABLE IF NOT EXISTS `reportCard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idSubject` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `reportCard`
--

INSERT INTO `reportCard` (`id`, `idUser`, `idSubject`, `rate`, `month`) VALUES
(15, 36, 3, 4, 5),
(3, 36, 2, 4, 1),
(4, 36, 10, 1, 1),
(5, 36, 3, 5, 1),
(13, 47, 4, 2, 2),
(14, 36, 1, 3, 6),
(16, 36, 3, 2, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `title`) VALUES
(1, 'Чтение'),
(2, 'Письмо'),
(3, 'Аудирование'),
(4, 'Говорение');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(55) NOT NULL,
  `pass` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `secondName` varchar(55) NOT NULL,
  `thirdName` varchar(55) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `group` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `secondName`, `thirdName`, `role`, `group`, `email`) VALUES
(32, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', '', ''),
(36, '1', '1', 'Адаменко', 'Александрович', 'Артем ', 'user', '124HFT', 'adamenko.artem@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
