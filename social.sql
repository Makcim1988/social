-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Сен 10 2024 г., 17:11
-- Версия сервера: 8.0.35
-- Версия PHP: 8.3.6

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
  `to_id` int NOT NULL,
  `message_from` text COLLATE utf8mb4_general_ci NOT NULL,
  `message_to` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `to_id` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `wallmessage`
--

INSERT INTO `wallmessage` (`id`, `from_id`, `to_id`, `message`, `date_message`) VALUES
(71, 24, 24, 'Вася', '2024-09-10 13:39:31'),
(72, 24, 24, 'Вася', '2024-09-10 13:39:39'),
(73, 24, 24, 'Вася лох', '2024-09-10 13:40:01'),
(74, 26, 25, 'Валера - лох!', '2024-09-10 13:46:37'),
(75, 24, 25, 'Валера лошок', '2024-09-10 13:50:49'),
(76, 25, 26, 'Вася - пидр!', '2024-09-10 13:53:42'),
(77, 24, 26, 'Вася - пидр', '2024-09-10 13:55:16'),
(78, 24, 25, 'Валера, как жизнь?', '2024-09-10 13:58:32'),
(79, 25, 25, 'Заебись', '2024-09-10 13:59:16'),
(80, 24, 24, 'Вася - бык!', '2024-09-10 14:05:26'),
(81, 24, 24, 'Вася - бык', '2024-09-10 14:05:58'),
(82, 24, 24, 'asd', '2024-09-10 14:07:35');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `wallmessage`
--
ALTER TABLE `wallmessage`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
