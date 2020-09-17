-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 17 2020 г., 10:13
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.2.31

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
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(1, 'Биография', NULL),
(2, 'Боевик', NULL),
(4, 'Детектив', NULL),
(5, 'Документальный', NULL),
(6, 'Драма', NULL),
(7, 'Комедия', NULL),
(8, 'Мелодрама', NULL),
(9, 'Мультфильмы', NULL),
(10, 'Приключения', NULL),
(11, 'Семейный', NULL),
(12, 'Спорт', NULL),
(13, 'Триллер', NULL),
(14, 'Ужасы', NULL),
(15, 'Фантастика', NULL),
(16, 'Фэнтези', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` set('0','1','2','3','4','5','6','7','8','9') DEFAULT NULL,
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `source` varchar(255) DEFAULT NULL,
  `season_id` int(11) DEFAULT NULL,
  `seria_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `category_id`, `title`, `image`, `rating`, `year`, `description`, `source`, `season_id`, `seria_number`) VALUES
(1, 0, 'Title_1', '', NULL, 2000, 'Vivamus rutrum quis lorem a dictum. Mauris feugiat magna eget lorem dictum, vel euismod dolor imperdiet. In porta ornare porta. Pellentesque fermentum tincidunt elit, eget suscipit lorem luctus et. Fusce molestie, erat quis consequat dignissim, tortor ipsum egestas ante, ut pretium sem metus ac augue. Donec tristique nulla neque, id maximus lacus interdum id. Aliquam tortor lectus, dictum non volutpat in, rutrum non mi. Vivamus sed ex in neque auctor fringilla eget vel justo. Morbi consequat tellus non odio imperdiet blandit. Proin eget lorem sit amet leo imperdiet finibus semper ut est. Cras id rhoncus enim, ut sodales ligula. Morbi a lectus auctor, efficitur lorem quis, mattis leo. ', NULL, NULL, NULL),
(2, 0, 'Title_2', 'images/cat_1.jpg', '6', 2019, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt dolor at felis auctor, in hendrerit tellus commodo. Vestibulum vulputate ultricies nunc vitae porttitor. Cras rhoncus molestie felis eu auctor. Curabitur id lectus volutpat tortor semper iaculis at ut risus. Donec aliquet et erat eget viverra. Phasellus tincidunt auctor ultricies. Proin quis tempus mauris. Nam quis magna ac metus congue dictum eu sed lectus. Vestibulum auctor ultricies nulla vitae sollicitudin. Ut varius condimentum lorem eu interdum. ', 'https://www.youtube.com/embed/yuFI5KSPAt4', NULL, NULL);

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
-- Структура таблицы `serial`
--

CREATE TABLE `serial` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `year_start` int(11) NOT NULL,
  `year_end` int(11) DEFAULT NULL,
  `description` text NOT NULL
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `season_id` (`season_id`);

--
-- Индексы таблицы `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_id` (`serial_id`);

--
-- Индексы таблицы `serial`
--
ALTER TABLE `serial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT для таблицы `serial`
--
ALTER TABLE `serial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);

--
-- Ограничения внешнего ключа таблицы `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`serial_id`) REFERENCES `serial` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
