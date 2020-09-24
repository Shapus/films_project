-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 24 2020 г., 10:25
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
(3, 'Детектив', NULL),
(4, 'Документальный', NULL),
(5, 'Драма', NULL),
(6, 'Комедия', NULL),
(7, 'Мелодрама', NULL),
(8, 'Мультфильмы', NULL),
(9, 'Приключения', NULL),
(10, 'Семейный', NULL),
(11, 'Спорт', NULL),
(12, 'Триллер', NULL),
(13, 'Ужасы', NULL),
(14, 'Фантастика', NULL),
(15, 'Фэнтези', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_item`
--

CREATE TABLE `favorite_item` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `season_number` int(11) DEFAULT NULL,
  `seria_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_serial` tinyint(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` set('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `category_id`, `is_serial`, `title`, `image`, `rating`, `year`, `description`, `source`) VALUES
(1, 1, 0, 'Богемская рапсодия', 'Bohemian_Rhapsody.jpg', '8', 2018, 'Чествование группы Queen, их музыки и их выдающегося вокалиста Фредди Меркьюри, который бросил вызов стереотипам и победил условности, чтобы стать одним из самых любимых артистов на планете. Фильм прослеживает головокружительный путь группы к успеху благодаря их культовым песням и революционному звуку, практически распад коллектива, поскольку образ жизни Меркьюри выходит из-под контроля, и их триумфальное воссоединение накануне концерта Live Aid, ставшим одним из величайших выступлений в истории рок-музыки.', NULL),
(2, 2, 0, 'Test', 'cat_1.jpg', '6', 2019, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tincidunt dolor at felis auctor, in hendrerit tellus commodo. Vestibulum vulputate ultricies nunc vitae porttitor. Cras rhoncus molestie felis eu auctor. Curabitur id lectus volutpat tortor semper iaculis at ut risus. Donec aliquet et erat eget viverra. Phasellus tincidunt auctor ultricies. Proin quis tempus mauris. Nam quis magna ac metus congue dictum eu sed lectus. Vestibulum auctor ultricies nulla vitae sollicitudin. Ut varius condimentum lorem eu interdum. ', 'https://www.youtube.com/embed/yuFI5KSPAt4'),
(3, 15, 1, 'Игра престолов', 'Game_of_Thrones.jpg', '9', 2011, 'К концу подходит время благоденствия, и лето, длившееся почти десятилетие, угасает. Вокруг средоточия власти Семи королевств, Железного трона, зреет заговор, и в это непростое время король решает искать поддержки у друга юности Эддарда Старка. В мире, где все — от короля до наемника — рвутся к власти, плетут интриги и готовы вонзить нож в спину, есть место и благородству, состраданию и любви. Между тем, никто не замечает пробуждение тьмы из легенд далеко на Севере — и лишь Стена защищает живых к югу от нее.', NULL),
(4, 13, 1, 'Ходячие мертвецы', 'The_Walking_Dead.jpg', '8', 2010, 'Сериал рассказывает историю жизни семьи шерифа после того, как «зомби» - эпидемия апокалиптических масштабов захлестнула земной шар. Шериф Рик Граймс путешествует со своей семьей и небольшой группой выживших в поисках безопасного места для жизни. Но постоянный страх смерти каждый день приносит тяжелые потери, заставляя героев почувствовать глубины человеческой жестокости. Рик пытается спасти свою семью, и открывает для себя, что всепоглощающий страх тех, кто выжил, может быть опаснее бессмысленных мертвецов, бродящих по земле.', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `season`
--

CREATE TABLE `season` (
  `id` int(11) NOT NULL,
  `serial_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `season`
--

INSERT INTO `season` (`id`, `serial_id`, `number`, `image`, `description`, `rating`) VALUES
(1, 3, 1, 'Game_of_Thrones.jpg', 'История происходит в вымышленном мире, на континентах Вестерос и Эссос. Дворянина Эддарда Старка по прозвищу Нед просят стать главным советником правителя Семи Королевств — Десницей. В это же время Нед узнает, что предыдущий советник был отравлен, и убил его кто-то из дома Ланнистеров, которых тот пытался разоблачить в использовании темных сил. Эддард принимает предложение, вступает в должность и узнает, что у короны огромные долги, стена, защищающая Семь Королевств, скоро падет и вот-вот начнется война.', '0'),
(2, 3, 2, 'Game_of_Thrones.jpg', 'Робб Старк, старший сын убитого Неда, стал правителем Севера. Вся семья Старков, желая отомстить за смерть главы семейства, воюет с домом Ланнистеров. Трон Семи королевств не пустует — его занимает Джоффри Баратеон. Но это не мешает его братьям Ренли и Станнису объявить себя королями и начать войну. Где-то на Севере небольшая армия Ночного Дозора заходит на заснеженные земли за Стеной и сталкивается с одичалыми и враждебными дикарями. Они называют себя вольным народом и уже долгие годы воюют с чёрными братьями и лордами Севера. Джон Сноу отправляется в разведку за Стену и попадает в плен.', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `seria`
--

CREATE TABLE `seria` (
  `id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '0',
  `description` text DEFAULT NULL,
  `source` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `seria`
--

INSERT INTO `seria` (`id`, `season_id`, `number`, `title`, `image`, `rating`, `description`, `source`) VALUES
(1, 1, 1, 'Зима близко', NULL, '10', NULL, 'https://www.youtube.com/embed/YYKAUhcDYzA'),
(2, 1, 2, 'Королевский тракт', NULL, '10', NULL, 'https://www.youtube.com/embed/Pzc3bro4FFA');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `favorite_item`
--
ALTER TABLE `favorite_item`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

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
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `seria`
--
ALTER TABLE `seria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favorite_item`
--
ALTER TABLE `favorite_item`
  ADD CONSTRAINT `favorite_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `favorite_item_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

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
