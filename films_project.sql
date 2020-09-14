-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 14 2020 г., 07:58
-- Версия сервера: 10.4.14-MariaDB
-- Версия PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `films_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `is_serial` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` set('0','1','2','3','4','5','6','7','8','9') DEFAULT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `is_serial`, `title`, `image`, `rating`, `year`, `description`, `source`) VALUES
(1, 0, 'Title_1', '', NULL, 2000, 'Vivamus rutrum quis lorem a dictum. Mauris feugiat magna eget lorem dictum, vel euismod dolor imperdiet. In porta ornare porta. Pellentesque fermentum tincidunt elit, eget suscipit lorem luctus et. Fusce molestie, erat quis consequat dignissim, tortor ipsum egestas ante, ut pretium sem metus ac augue. Donec tristique nulla neque, id maximus lacus interdum id. Aliquam tortor lectus, dictum non volutpat in, rutrum non mi. Vivamus sed ex in neque auctor fringilla eget vel justo. Morbi consequat tellus non odio imperdiet blandit. Proin eget lorem sit amet leo imperdiet finibus semper ut est. Cras id rhoncus enim, ut sodales ligula. Morbi a lectus auctor, efficitur lorem quis, mattis leo. ', NULL),
(2, 0, 'Title_2', '', '6', 2019, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt dolor at felis auctor, in hendrerit tellus commodo. Vestibulum vulputate ultricies nunc vitae porttitor. Cras rhoncus molestie felis eu auctor. Curabitur id lectus volutpat tortor semper iaculis at ut risus. Donec aliquet et erat eget viverra. Phasellus tincidunt auctor ultricies. Proin quis tempus mauris. Nam quis magna ac metus congue dictum eu sed lectus. Vestibulum auctor ultricies nulla vitae sollicitudin. Ut varius condimentum lorem eu interdum. ', 'images/cat_1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `serial_id` int(11) NOT NULL,
  `season_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `seria`
--

CREATE TABLE `seria` (
  `id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `series_number` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `rating` enum('0','1','2','3','4','5','6','7','8','9') DEFAULT NULL,
  `description` text NOT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_id` (`serial_id`);

--
-- Индексы таблицы `seria`
--
ALTER TABLE `seria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `season_id` (`season_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `seria`
--
ALTER TABLE `seria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`serial_id`) REFERENCES `item` (`id`);

--
-- Ограничения внешнего ключа таблицы `seria`
--
ALTER TABLE `seria`
  ADD CONSTRAINT `seria_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
