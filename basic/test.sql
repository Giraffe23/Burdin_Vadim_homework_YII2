-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 19 2018 г., 16:20
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id`, `note_id`, `user_id`) VALUES
(1, 5, 1),
(2, 2, 1),
(3, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `backend_migration`
--

CREATE TABLE `backend_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `backend_migration`
--

INSERT INTO `backend_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1526459233),
('m180516_072314_user', 1526459240),
('m180516_075407_note', 1526459240),
('m180516_081312_access', 1526459356);

-- --------------------------------------------------------

--
-- Структура таблицы `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `creator_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `note`
--

INSERT INTO `note` (`id`, `text`, `creator_id`, `created_at`) VALUES
(1, 'Hello!', 1, 12321),
(2, 'Hi!', 3, 12354),
(3, 'What\'s up?', 4, 45666414),
(4, 'Very well!', 1, 1232154),
(5, 'Good job!', 2, 1265577858),
(6, 'just do it now!', 3, 1233458),
(7, 'We are who we choose to be', 2, NULL),
(8, 'The best reading is re-reading', 3, NULL),
(9, 'ПИНС!', 1, NULL),
(11, 'ПУМС!', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `password_hash`, `access_token`, `auth_key`, `created_at`, `updated_at`) VALUES
(1, 'Giraffe', 'Vadim', 'Burdin', '555', NULL, NULL, NULL, NULL),
(2, 'Pitkin', 'Ivan', 'Ivanov', '222', NULL, NULL, NULL, NULL),
(3, 'Pushkin', 'Alexandr', 'Block', '333', NULL, NULL, NULL, NULL),
(4, 'Bond', 'James', 'Brown', '444', NULL, NULL, NULL, NULL),
(5, 'Arny', 'Arnold', 'Strong', '999', NULL, NULL, NULL, NULL),
(6, 'Ovi', 'Alexandr', 'Ovechkin', '888', NULL, NULL, NULL, NULL),
(7, 'Beard', 'Leo', 'Tolstoy', '777', NULL, NULL, NULL, NULL),
(8, 'Spiderman', 'Nikolai', 'Sididomanegulaj\r\n', '777', NULL, NULL, NULL, NULL),
(9, 'Dubliner', 'James', 'Joice', '232323', NULL, NULL, NULL, NULL),
(10, 'Rodrigez', 'James', 'Rodrigez', '122211', '', '', NULL, NULL),
(11, 'Pilot', 'Joseph', 'Heller', '323232', NULL, NULL, NULL, NULL),
(12, 'SpacePilot', 'Luke', 'Skywalker', '555555', '', '', NULL, NULL),
(13, 'Pilot', 'Joseph', 'Heller', '323232', NULL, NULL, NULL, NULL),
(14, 'Cuckoo\\\'s nest', 'Ken', 'Kesey', '33333', NULL, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `note_id` (`note_id`);

--
-- Индексы таблицы `backend_migration`
--
ALTER TABLE `backend_migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `access_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `note` (`id`);

--
-- Ограничения внешнего ключа таблицы `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
