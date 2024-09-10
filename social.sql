-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 10 2024 г., 20:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE `chat` (
  `id` int NOT NULL,
  `from_id` int NOT NULL,
  `name_from` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `secondname_from` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `to_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `from_id`, `name_from`, `secondname_from`, `to_id`, `message`, `message_time`) VALUES
(1, 24, 'Василий', 'Теркин', 25, 'Привет Валера', '2024-09-10 17:32:44'),
(2, 24, 'Василий', 'Теркин', 25, 'Валера Здорова', '2024-09-10 17:35:44'),
(3, 25, 'Валера', 'Длинный', 24, 'Здорова, Вася', '2024-09-10 17:41:33'),
(4, 24, 'Василий', 'Теркин', 26, 'Здорофф, Митяжофф', '2024-09-10 17:44:41'),
(5, 26, 'Василий ', 'Митяжов', 24, 'Здоров, Василий', '2024-09-10 17:46:28');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `name` varchar(32) NOT NULL,
  `secondname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `day` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `month` varchar(16) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `year` varchar(12) NOT NULL,
  `date_registration` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `secondname`, `email`, `day`, `month`, `year`, `date_registration`) VALUES
(24, 'koksik', '$2y$10$d16wxQBnulqpSUuM1B2H4eOgPC2ZNumKqCfmU44B.Vva7L2VJpoAS', 'Василий', 'Теркин', 'mitiay@mail.ru', ' . 9 . ', ' . сентября . ', ' . 2005 . ', '2024-09-10 15:24:33'),
(25, 'baksik', '$2y$10$af6wcMTvNE3GGFpA4YumMuVpHdA4eSZw11vm1JNWWMQda/7BOikyC', 'Валера', 'Длинный', 'vdlinnyy@gmail.com', ' . 14 . ', ' . июля . ', ' . 1982 . ', '2024-09-10 15:37:27'),
(26, 'uassia', '$2y$10$L9bsy3EpHANiH3CUygbC/OPsNInUEZGMdH6cQHma.qLU346JiACt6', 'Василий ', 'Митяжов', 'gena@gena.com', ' . 9 . ', ' . октября . ', ' . 1993 . ', '2024-09-10 16:45:10');

-- --------------------------------------------------------

--
-- Структура таблицы `wallmessage`
--

CREATE TABLE `wallmessage` (
  `id` int NOT NULL,
  `from_id` int NOT NULL,
  `name_from` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `secondname_from` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `to_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `wallmessage`
--

INSERT INTO `wallmessage` (`id`, `from_id`, `name_from`, `secondname_from`, `to_id`, `message`, `date_message`) VALUES
(84, 24, 'Василий', 'Теркин', 24, 'Привет - я Вася!', '2024-09-10 16:27:09'),
(90, 24, 'Василий', 'Теркин', 25, 'Привет, Валера!', '2024-09-10 16:47:03'),
(91, 25, 'Валера', 'Длинный', 26, 'Митижофф, хто гудит?', '2024-09-10 17:17:36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `wallmessage`
--
ALTER TABLE `wallmessage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `wallmessage`
--
ALTER TABLE `wallmessage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
