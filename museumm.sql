-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 20 2026 г., 13:46
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `museum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bio`
--

CREATE TABLE `bio` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя героя',
  `header_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Заголовок',
  `star_week` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Дата жизни '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bio`
--

INSERT INTO `bio` (`id`, `name`, `header_title`, `star_week`) VALUES
(1, 'Зоя Космодемьянская', '\"Мне не страшно\": жизнь, принципы и подвиг Зои Космодемьянской', '1923-1941');

-- --------------------------------------------------------

--
-- Структура таблицы `bio_content`
--

CREATE TABLE `bio_content` (
  `id` int(11) NOT NULL,
  `bio_id` int(11) NOT NULL COMMENT 'id героя, к которому относится этот блок',
  `content_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Тип блока(title, text, photo)',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Содержимое блока',
  `sort_order` int(11) NOT NULL COMMENT 'Порядковый номер'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bio_content`
--

INSERT INTO `bio_content` (`id`, `bio_id`, `content_type`, `content`, `sort_order`) VALUES
(1, 1, 'title', 'Детство и юность', 1),
(2, 1, 'text', 'Зоя Космодемьянская родилась в селе Осиновые Гаи Тамбовской области 13 сентября 1923 года. Ее мать Любовь Тимофеевна была учительницей, а отец Анатолий Петрович заведовал избой-читальней и библиотекой, а еще ставил спектакли в местном драмкружке. Анатолий был выходцем из духовного сословия и его фамилия (на церковнославянском языке она писалась как Козьмодемьянский) происходит, как большинство подобных фамилий, от названия церкви (святых Космы и Дамиана), где служил их предок. Спустя меньше чем два года родился младший брат Зои – Шура. Они были очень дружны. В 1929 году семья перебралась в Сибирь, по одной версии – спасаясь от  доноса, по другой – захотелось перемены мест. Но там Космодемьянские прожили недолго: с помощью сестры Любови Тимофеевны перебрались в Москву и поселились на окраине – возле станции Подмосковная в районе Тимирязевского парка.', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `repeat_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `email`, `password`, `repeat_password`) VALUES
(4, 'fgjf', 'fgjfj', 'fjjfg@hmk', '1234', '1234'),
(5, 'abra kadabra', 'myLogin', 'myEmail@mail.ru', 'password', 'password'),
(6, 'chelovek', 'chelove', 'chelovek@mail.ru', 'chelovek', '');

-- --------------------------------------------------------

--
-- Структура таблицы `zaiavki`
--

CREATE TABLE `zaiavki` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `user` varchar(255) NOT NULL,
  `people` int(11) NOT NULL,
  `tablenumber` int(11) NOT NULL,
  `wishes` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bio`
--
ALTER TABLE `bio`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zaiavki`
--
ALTER TABLE `zaiavki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bio`
--
ALTER TABLE `bio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `zaiavki`
--
ALTER TABLE `zaiavki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `zaiavki`
--
ALTER TABLE `zaiavki`
  ADD CONSTRAINT `zaiavki_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
