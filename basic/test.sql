-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2018 г., 22:32
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
(8, 8, 1),
(11, 17, 21),
(13, 16, 30),
(16, 6, 1),
(17, 6, 1),
(18, 6, 1),
(21, 31, 1),
(22, 31, 1),
(23, 31, 3),
(24, 31, 7),
(26, 32, 6),
(27, 32, 20),
(28, 32, 30),
(34, 18, 2),
(37, 23, 2),
(45, 29, 2),
(48, 29, 5);

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
(5, 'Good job!', 2, 1265577858),
(6, 'just do it now!', 3, 1233458),
(7, 'We are who we choose to be', 2, NULL),
(8, 'The best reading is re-reading', 3, NULL),
(12, 'testing behaviors', 1, 1526981930),
(16, 'Круто!!!', 1, 1527278735),
(17, 'successfully loaded', 1, 1527279700),
(18, 'wonderfully', 1, 1527279734),
(20, 'Что-то пошло не так!', 1, 1527347701),
(21, 'Note from Luntik', 21, 1527350439),
(22, 'balance', 1, 1527354398),
(23, 'Guten abend, mein Freund!', 1, 1527355935),
(25, 'привет', 1, 1527542602),
(26, 'привет2-2', 1, 1527542647),
(27, 'Yes', 1, 1527580884),
(28, 'hi!', 21, 1527585654),
(29, 'fun!fun!fun!', 1, 1527585763),
(30, 'true', 21, 1527585885),
(31, 'speak-spoke-spoken', 21, 1527622283),
(32, 'duck-duck-goose', 1, 1527624050),
(33, 'one more time!', 1, 1527695320),
(36, 'БТФ', 1, 1527703667),
(37, 'ghgh', 1, 1527708466);

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
(1, 'Giraffe', 'Vadim', 'Burdin', '$2y$13$WqHQNd5G2y/MELEiYjcTCu2xBd.JppiIlqDtIfz4BWECg91g56oEq', NULL, NULL, NULL, NULL),
(2, 'Pitkin', 'Ivan', 'Ivanov', '$2y$13$xUlhHZdUPnep.B0oDozzU.83j8QVuWRmxqJBH9Br3ytm4BdrxM3AC', NULL, NULL, NULL, NULL),
(3, 'Pushkin', 'Alexandr', 'Pushkin', '$2y$13$6VDhAA1wXOHM65vUn3TXjeW7/f/u9Or8BNUmaZXh0ta/.lgwGP4xC', NULL, NULL, NULL, 1527022938),
(4, 'Bond', 'James', 'Brown', '$2y$13$jTrW55KHoLeLLcfH7NrQu.RxSPXUDotGRju6Nr.OsyAM5QIij8C3q', NULL, NULL, NULL, NULL),
(5, 'terminator', 'Arnold', 'Strong', '$2y$13$CPXrKcbg/ZOAJJ2ha6UDFuzOR/0HOKh7HW7mdvmmg8ZUwk/sElAm.', NULL, NULL, NULL, 1527060960),
(6, 'NHL', 'Alexandr', 'Ovechkin', '$2y$13$JRwJ8h/AujPtczh/DQq5AuvQGpT2xbxtuwQ9/lJhUrg4/Y1UR4cN2', NULL, NULL, NULL, 1527061006),
(7, 'Leo', 'Leo', 'Tolstoy', '$2y$13$nP2.TybzFiZXBGwhd.5pAOhzmU5I0p16H3D/F.ycHT15880K1UT1a', NULL, NULL, NULL, 1527060875),
(10, 'Rodrigez', 'James', 'RodrigeZZ', '$2y$13$hMLOc9bbmYayQjtCgGgWEe07eNGxdZQ45AqPLqQ7IBzYlU6B3jI8C', '', '', NULL, 1527148195),
(19, 'mariangel', 'Maria', 'Angel', '$2y$13$OYyLgu2RLbdF/UPkZGspsepQ4LQoY0MwLY97caj6Q8zTq2hbjb7tm', NULL, '57MRViwS0RMo5SH2Q02w6HDzqnjQjM6Y', 1527014910, 1527015821),
(20, 'mama', 'Natasha', 'Great', '$2y$13$m8Y6/.S/crHbtbyDVJfqI.Nn14B1Y5bmycO1cntGD.wyqbZVl.17.', NULL, '7Ta5u9Skm768YqIP02-bsbQ7CW__ph0_', 1527015083, 1527015751),
(21, 'Luntik', 'Luntik', 'Luntik', '$2y$13$JeQiQMuVC9bw.RLtOqkYC.HTyeTaHVOKUMw6P6kr9QResrk5AS.nO', NULL, '2lLRsoFpEJ6xwPMFTQtbA-t97TFMxi8l', 1527015874, 1527015874),
(22, 'max', 'max', 'max', '$2y$13$UhJoiIVkRxX1ukDz17LxLuKvUy7iV0MJXzhesQKHaNejbVA7snUsi', NULL, '7KZTja2o3lDFjEKvm0DiW9MBsahJ1jpT', 1527021539, 1527021539),
(23, 'nik', 'nik', 'nik', '$2y$13$670eqnvm7PmYmWEronY2jOGxXje9CcQvy.SR4h2lhys.S2ULX0c2y', NULL, 'Z1kCwZBNFWLgbtErv4gggvn7tPyHZLFN', 1527021641, 1527021641),
(25, 'Nike', 'Nike', 'Borzov', '$2y$13$ASM3AYyKB09BqGNV0/MDj.2NlRVZjsxcdHdFAq3JEqtcqvcBAbiVy', NULL, 'f0_jQRKPLkotUtHK2daTG9mOnoFGeICE', 1527021846, 1527345015),
(27, 'gik', 'ghjdk', 'sdf', '$2y$13$tPfIyW6jUaLcHHWR9iOYxOZaQXpe8VEaM22KdxySkN.jXT2wl7422', NULL, 'Kv3vFF9hi9mn-pwG89fWnvZtiZylT8Tz', 1527060442, 1527060442),
(29, 'new', 'gfdskljf', 'adf', '$2y$13$k1tnl7URok3ZBMoKLqogleTeaAQLD2OZOrYiVBHn0WLMySslSAs6m', NULL, 'GAkCX1GGAJdj6OYwEIGnAaKDWxQVcDXn', 1527064317, 1527064317),
(30, 'nike', 'Maria', 'Friend', '$2y$13$7wuSji7CKwli1j2.2ntroOpV6lfXBy5OyTwvZBjgVUQPkVHsyLwla', NULL, '3lUVKW81HepXZgOu39hiE71dWygGLWQ3', 1527148374, 1527148393),
(31, 'new', 'adidas', 'Skywalker', '$2y$13$EZQEkYtxdooGsHAlo7sQLefpqPP5WAl/5CcItQodBBDRoSrCy29gm', NULL, 'RXs9vJfJAxF3wxnze7B_DXj0JQh1sSt2', 1527148615, 1527148630),
(32, 'Uber', 'Van', 'Dammy', '$2y$13$4jG9hbh5iO6Z4ah3F2AEBuRJES/Fo9USU5p4GdYQU6vbn4Eb47TBy', NULL, '6O_pnFXZcWMIZPUB_IA_ZYk_xsxVdmA-', 1527148829, 1527345333),
(33, 'mariangel', 'Natasha', 'Angel', '$2y$13$AzsGoZijqSVkvlZJ4VNpCeqq1T0CSSgmWo0MhNXwp75u.iNX6kwcS', NULL, 'MXQTnIuVgBZNDc0KDVgi2UkXIu_aaE8l', 1527148906, 1527148906),
(34, 'Типи', 'Типи', 'Дрипи', '$2y$13$y67zksQOfon27iIHY8/n7uuUg.XEtEJiiLsjykL2q4wIBQphxpRdC', NULL, 'i65vAJ62sN01ySKcaQxJm4IEM8CX2cGU', 1527345248, 1527345248);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
