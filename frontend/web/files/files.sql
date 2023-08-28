-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 24 2023 г., 13:57
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `smk`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date_at` int(11) DEFAULT NULL,
  `date_end` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_id_update` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`id`, `name`, `title`, `date_at`, `date_end`, `user_id`, `user_id_update`, `department_id`) VALUES
(1, '20230719-084822-3938-4051.eml', NULL, 1690193836, NULL, 1, NULL, 5),
(2, 'app (3).log', NULL, 1690193837, NULL, 1, NULL, 5),
(3, '64b779406a1d3.data', NULL, 1690193837, NULL, 1, NULL, 5),
(4, 'app (2).log', '788778787878', 1690193837, 1690194136, 1, 1, 5),
(5, 'app (1).log', 'Статистика CRM', 1690193837, 1690194163, 1, 1, 3),
(6, 'app.log', '56555555', 1690193837, 1690194090, 1, 1, NULL),
(7, 'app (3).log', 'Фотка', 1690193980, 1690193999, 1, 1, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
