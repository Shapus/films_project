-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 04 2020 г., 14:11
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
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Биография'),
(2, 'Боевик'),
(3, 'Детектив'),
(4, 'Документальный'),
(5, 'Драма'),
(6, 'Комедия'),
(7, 'Мелодрама'),
(8, 'Мультфильмы'),
(9, 'Приключения'),
(10, 'Семейный'),
(11, 'Спорт'),
(12, 'Триллер'),
(13, 'Ужасы'),
(14, 'Фантастика'),
(15, 'Фэнтези');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `videoplayer_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `videoplayer_id`, `user_name`, `date`, `text`, `hidden`) VALUES
(9, 15, 6, 'alex', '2020-10-28', 'Потрясающе!', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `favorite_item`
--

CREATE TABLE `favorite_item` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `rating` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '0',
  `number` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `item`
--

INSERT INTO `item` (`id`, `type`, `category_id`, `title`, `image`, `rating`, `number`, `year`, `parent_id`) VALUES
(3, 1, 1, 'Богемская рапсодия', 'Bohemian_Rhapsody.jpg', '8', NULL, 2018, 3),
(4, 2, 2, 'Во все тяжкие', 'Breaking_Bad.jpg', '8', NULL, 2008, 4),
(5, 2, 6, 'Друзья', 'Friends.jpg', '9', NULL, 1994, 5),
(6, 2, 15, 'Игра престолов', 'Game_of_Thrones.jpg', '10', NULL, 2011, 6),
(7, 1, 14, 'Начало', 'Inception.jpg', '7', NULL, 2010, 7),
(8, 1, 2, 'Криминальное чтиво', 'Pulp_Fiction.jpg', '10', NULL, 1994, 8),
(9, 1, 2, 'Джентельмены', 'The_Gentlemen.jpg', '7', NULL, 2019, 9),
(10, 1, 5, 'Побег из Шоушенка', 'The_Shawshank_Redemption.jpg', '10', NULL, 1994, 10),
(11, 2, 13, 'Ходячие мертвецы', 'The_Walking_Dead.jpg', '9', NULL, 2010, 11),
(12, 3, 15, NULL, NULL, '0', 1, NULL, 6),
(13, 3, 15, NULL, NULL, '0', 2, NULL, 6),
(14, 4, 15, 'Зима близко', 'Game_of_Thrones_1_1.jpg', '10', 1, NULL, 12),
(15, 4, 15, 'Королевский тракт', 'Game_of_Thrones_1_2.jpg', '10', 2, NULL, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'film'),
(2, 'serial'),
(3, 'season'),
(4, 'seria');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `registration_date`, `status`) VALUES
(11, 'Alex', 'mail@mail.ru', '$2y$10$qHtHIb.pn1xe/NYcZdNrTuTTcfJXM8/Ck9B1EMQLSPEAtXJHf.NK2', '2020-10-26', 1),
(12, 'Shapus', 'a@a.com', '$2y$10$NFDuhR7utd99sIENI4CuGeg5qeL0EQhM3IXfCftIb9BQ7XSoT2B9a', '2020-10-26', 1),
(14, 'user', 'user@mail.com', '$2y$10$7rluzc7uI7PzehS4R9xlSuniF.5NihKe5Ad3XT05cCLl2AvOvY3yy', '2020-10-27', 1),
(15, 'alex', 'mail@mail.com', '$2y$10$PLMwB/hlIINDHT3.l4e95uFqmiOVjqhUBTrIf.qyfjUG4sC/OjWb2', '2020-10-28', 1),
(17, 'admin', 'admin@admin.com', '$2y$10$r1dZGLJidue4.J2osZnZoe8o7zMYkswgNTWxCG6yAg2ExEYKwWvau', '2020-11-04', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `videoplayer`
--

CREATE TABLE `videoplayer` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `source` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `videoplayer`
--

INSERT INTO `videoplayer` (`id`, `description`, `source`, `parent_id`) VALUES
(1, 'Чествование группы Queen, их музыки и их выдающегося вокалиста Фредди Меркьюри, который бросил вызов стереотипам и победил условности, чтобы стать одним из самых любимых артистов на планете. Фильм прослеживает головокружительный путь группы к успеху благодаря их культовым песням и революционному звуку, практически распад коллектива, поскольку образ жизни Меркьюри выходит из-под контроля, и их триумфальное воссоединение накануне концерта Live Aid, ставшим одним из величайших выступлений в истории рок-музыки.', 'https://www.youtube.com/embed/6FhTNWJiu5k', 3),
(2, 'Один ушлый американец ещё со студенческих лет приторговывал наркотиками, а теперь придумал схему нелегального обогащения с использованием поместий обедневшей английской аристократии и очень неплохо на этом разбогател. Другой пронырливый журналист приходит к Рэю, правой руке американца, и предлагает тому купить киносценарий, в котором подробно описаны преступления его босса при участии других представителей лондонского криминального мира - партнёра-еврея, китайской диаспоры, чернокожих спортсменов и даже русского олигарха.', 'https://www.youtube.com/embed/Ify9S7hj480', 9),
(3, 'Кобб – талантливый вор, лучший из лучших в опасном искусстве извлечения: он крадет ценные секреты из глубин подсознания во время сна, когда человеческий разум наиболее уязвим. Редкие способности Кобба сделали его ценным игроком в привычном к предательству мире промышленного шпионажа, но они же превратили его в извечного беглеца и лишили всего, что он когда-либо любил.\\r\\n\\r\\nИ вот у Кобба появляется шанс исправить ошибки. Его последнее дело может вернуть все назад, но для этого ему нужно совершить невозможное – инициацию. Вместо идеальной кражи Кобб и его команда спецов должны будут провернуть обратное. Теперь их задача – не украсть идею, а внедрить ее. Если у них получится, это и станет идеальным преступлением.\\r\\n\\r\\nНо никакое планирование или мастерство не могут подготовить команду к встрече с опасным противником, который, кажется, предугадывает каждый их ход. Врагом, увидеть которого мог бы лишь Кобб.', 'https://www.youtube.com/embed/85Zz1CCXyDI', 7),
(4, 'Бухгалтер Энди Дюфрейн обвинён в убийстве собственной жены и её любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решётки. Каждый, кто попадает в эти стены, становится их рабом до конца жизни. Но Энди, обладающий живым умом и доброй душой, находит подход как к заключённым, так и к охранникам, добиваясь их особого к себе расположения.', 'https://www.youtube.com/embed/kgAeKpAPOYk', 10),
(5, 'Двое бандитов Винсент Вега и Джулс Винфилд ведут философские беседы в перерывах между разборками и решением проблем с должниками криминального босса Марселласа Уоллеса.\\r\\n\\r\\nВ первой истории Винсент проводит незабываемый вечер с женой Марселласа Мией. Во второй рассказывается о боксёре Бутче Кулидже, купленном Уоллесом, чтобы сдать бой. В третьей истории Винсент и Джулс по нелепой случайности попадают в неприятности.', 'https://www.youtube.com/embed/vBADUmfa9Q4', 8),
(6, 'Один из разведчиков покидает свой пост, чтобы оповестить своего лорда об опасности со стороны так называемых Белых Ходоков. Он делает это невзирая на то, что за оставление своего поста полагается смертная казнь. Более того, Эддард Старк, лорд Винтерфелла, услышав его слова, не верит ему. Лорд был непреклонен в своём решении по поводу дезертира...\r\n\r\nВскоре в замок Винтерфелл прибывает король Роберт Баратеон со своей свитой.\r\n\r\nА меж тем на другом материке Визерис Таргариен, являющийся сыном свергнутого короля, планирует выдать свою сестру Дейенерис за некоего кхала Дрого, чтобы заручиться его поддержкой и отвоевать трон.', 'https://www.youtube.com/embed/YYKAUhcDYzA', 14),
(7, 'После печальных событий в первой серии мать Брана не отходит от своего сына. Многие не верят, что мальчик останется жив, но леди Кейтилин Старк продолжает надеяться на самое лучшее. Но даже в собственном замке и под охраной они не находится в абсолютной безопасности. Таким образом, покушение на Брана не заставляет себя долго ждать.\r\n\r\nДжон Сноу уходит из Винтерфелла, чтобы начать свою службу на Стене. Это значит, что его жизнь больше никогда не будет прежней, и он больше никогда не увидит своих родных и близких.\r\n\r\nТакже зрителей познакомят поближе с принцем Джоффри, который повздорит с Арьей. Их конфликт чуть было не заканчивается смертью Джоффри.\r\n\r\nА Визерис Таргариен продолжает мечтать о том, как заручится поддержкой дикарей и завоюет столицу.', 'https://www.youtube.com/embed/Pzc3bro4FFA', 15);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `videoplayer_id` (`videoplayer_id`);

--
-- Индексы таблицы `favorite_item`
--
ALTER TABLE `favorite_item`
  ADD PRIMARY KEY (`user_id`,`item_id`,`type`),
  ADD KEY `type` (`type`),
  ADD KEY `item_id` (`item_id`);

--
-- Индексы таблицы `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`,`type`),
  ADD KEY `type` (`type`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `videoplayer`
--
ALTER TABLE `videoplayer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `videoplayer`
--
ALTER TABLE `videoplayer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`videoplayer_id`) REFERENCES `videoplayer` (`id`);

--
-- Ограничения внешнего ключа таблицы `favorite_item`
--
ALTER TABLE `favorite_item`
  ADD CONSTRAINT `favorite_item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorite_item_ibfk_3` FOREIGN KEY (`type`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `favorite_item_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Ограничения внешнего ключа таблицы `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `item_ibfk_4` FOREIGN KEY (`parent_id`) REFERENCES `item` (`id`);

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Ограничения внешнего ключа таблицы `videoplayer`
--
ALTER TABLE `videoplayer`
  ADD CONSTRAINT `videoplayer_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `item` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
