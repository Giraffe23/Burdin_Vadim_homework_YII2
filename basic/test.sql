-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2018 г., 09:27
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
-- Структура таблицы `knives`
--

CREATE TABLE `knives` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `createdAt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `knives`
--

INSERT INTO `knives` (`id`, `name`, `price`, `description`, `createdAt`) VALUES
(1, 'morakniv', 1000, 'Модель Morakniv Robust ориентирована на рыбаков и туристов. Это прочный нескладной нож из шведской углеродистой стали. Он в состоянии справиться с серьезными задачами и повседневной работой. Продается эта модель ножа вместе с практичными ножнами из пластика.', 1125465487),
(3, 'steelclaw', 2000, 'Нож «Резервист» от компании Steelclaw представляет собой реплику модели RJ Martin Q-36 Overkill. Он сочетает эргономичность форм, прочность и остроту режущей кромки.Клинок длиной 101.8 мм с толщиной обуха 4 мм выполнен из инструментальной стали D2 (США) с хорошей закалкой, гарантирующей отличный рез на уровне изделий топового класса. Твердость – 60-62 HRC. Клинок имеет высокие вогнутые спуски. Помещен на два роликовых подшипника, обеспечивающих плавный ход, легкость открытия-закрытия и долговечность работы. Имеется возможность регулировки оси. Клинок расположен по центру рамы, которая состоит из 2-х пластин толщиной по 3 мм каждая, в середине – выборка. Замок – Liner Lock, открытие с флипа. Рукоятка – стеклотекстолитовый композит G-10, стойкий к влажности, повреждениям и ультрафиолету. Форма рукояти – эргономичная, нож удобно лежит в руке. Для удобства ношения предусмотрена глубокая клипса. Легко разбирается и собирается благодаря высокому качеству обработки деталей. ', 1232132132),
(4, 'ontarioRAT ', 999, 'ghjflk', 12321321),
(6, 'Noname', 555, 'ghjkjh', 4556545),
(8, 'Blade', 85, 'fdfal', 4565),
(18, 'Bocker', 777, 'Sehr gut', 123215),
(19, 'torinox', 555, 'средний', 8555244),
(29, '111', 777, 'ghjkshkdfjh', 1232132);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `knives`
--
ALTER TABLE `knives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `knives`
--
ALTER TABLE `knives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
