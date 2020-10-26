-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 09:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `films_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_focused` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`, `icon_focused`) VALUES
(1, 'Биография', 'images/genre_icons/genre_icons_1.jpg', 'images/genre_icons/genre_icons_1_focused.jpg'),
(2, 'Боевик', 'images/genre_icons/genre_icons_2.jpg', 'images/genre_icons/genre_icons_2_focused.jpg'),
(3, 'Детектив', 'images/genre_icons/genre_icons_3.jpg', 'images/genre_icons/genre_icons_3_focused.jpg'),
(4, 'Документальный', 'images/genre_icons/genre_icons_4.jpg', 'images/genre_icons/genre_icons_4_focused.jpg'),
(5, 'Драма', 'images/genre_icons/genre_icons_5.jpg', 'images/genre_icons/genre_icons_5_focused.jpg'),
(6, 'Комедия', 'images/genre_icons/genre_icons_6.jpg', 'images/genre_icons/genre_icons_6_focused.jpg'),
(7, 'Мелодрама', 'images/genre_icons/genre_icons_7.jpg', 'images/genre_icons/genre_icons_7_focused.jpg'),
(8, 'Мультфильмы', 'images/genre_icons/genre_icons_8.jpg', 'images/genre_icons/genre_icons_8_focused.jpg'),
(9, 'Приключения', 'images/genre_icons/genre_icons_9.jpg', 'images/genre_icons/genre_icons_9_focused.jpg'),
(10, 'Семейный', 'images/genre_icons/genre_icons_10.jpg', 'images/genre_icons/genre_icons_10_focused.jpg'),
(11, 'Спорт', 'images/genre_icons/genre_icons_11.jpg', 'images/genre_icons/genre_icons_11_focused.jpg'),
(12, 'Триллер', 'images/genre_icons/genre_icons_12.jpg', 'images/genre_icons/genre_icons_12_focused.jpg'),
(13, 'Ужасы', 'images/genre_icons/genre_icons_13.jpg', 'images/genre_icons/genre_icons_13_focused.jpg'),
(14, 'Фантастика', 'images/genre_icons/genre_icons_14.jpg', 'images/genre_icons/genre_icons_14_focused.jpg'),
(15, 'Фэнтези', 'images/genre_icons/genre_icons_15.jpg', 'images/genre_icons/genre_icons_15_focused.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment__item`
--

CREATE TABLE `comment__item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment__item`
--

INSERT INTO `comment__item` (`id`, `user_id`, `user_name`, `item_id`, `date`, `text`, `hidden`) VALUES
(12, 12, 'Shapus', 5, '2020-10-26', 'Отличный фильм!\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 1),
(13, 11, 'Alex', 5, '2020-10-26', 'Хо-хо-хо\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment__seria`
--

CREATE TABLE `comment__seria` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `seria_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `text` text NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite__item`
--

CREATE TABLE `favorite__item` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite__season`
--

CREATE TABLE `favorite__season` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorite__seria`
--

CREATE TABLE `favorite__seria` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `seria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` enum('film','serial') NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` set('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '0',
  `year` int(11) NOT NULL,
  `description` text NOT NULL,
  `source` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `category_id`, `type`, `title`, `image`, `rating`, `year`, `description`, `source`) VALUES
(1, 1, 'film', 'Богемская рапсодия', 'Bohemian_Rhapsody.jpg', '8', 2018, 'Чествование группы Queen, их музыки и их выдающегося вокалиста Фредди Меркьюри, который бросил вызов стереотипам и победил условности, чтобы стать одним из самых любимых артистов на планете. Фильм прослеживает головокружительный путь группы к успеху благодаря их культовым песням и революционному звуку, практически распад коллектива, поскольку образ жизни Меркьюри выходит из-под контроля, и их триумфальное воссоединение накануне концерта Live Aid, ставшим одним из величайших выступлений в истории рок-музыки.', NULL),
(3, 15, 'serial', 'Игра престолов', 'Game_of_Thrones.jpg', '9', 2011, 'К концу подходит время благоденствия, и лето, длившееся почти десятилетие, угасает. Вокруг средоточия власти Семи королевств, Железного трона, зреет заговор, и в это непростое время король решает искать поддержки у друга юности Эддарда Старка. В мире, где все — от короля до наемника — рвутся к власти, плетут интриги и готовы вонзить нож в спину, есть место и благородству, состраданию и любви. Между тем, никто не замечает пробуждение тьмы из легенд далеко на Севере — и лишь Стена защищает живых к югу от нее.', NULL),
(4, 13, 'serial', 'Ходячие мертвецы', 'The_Walking_Dead.jpg', '8', 2010, 'Сериал рассказывает историю жизни семьи шерифа после того, как «зомби» - эпидемия апокалиптических масштабов захлестнула земной шар. Шериф Рик Граймс путешествует со своей семьей и небольшой группой выживших в поисках безопасного места для жизни. Но постоянный страх смерти каждый день приносит тяжелые потери, заставляя героев почувствовать глубины человеческой жестокости. Рик пытается спасти свою семью, и открывает для себя, что всепоглощающий страх тех, кто выжил, может быть опаснее бессмысленных мертвецов, бродящих по земле.', NULL),
(5, 2, 'film', 'Джентельмены', 'The_Gentlemen.jpg', '0', 2019, 'Один ушлый американец ещё со студенческих лет приторговывал наркотиками, а теперь придумал схему нелегального обогащения с использованием поместий обедневшей английской аристократии и очень неплохо на этом разбогател. Другой пронырливый журналист приходит к Рэю, правой руке американца, и предлагает тому купить киносценарий, в котором подробно описаны преступления его босса при участии других представителей лондонского криминального мира - партнёра-еврея, китайской диаспоры, чернокожих спортсменов и даже русского олигарха.', 'https://www.youtube.com/embed/Ify9S7hj480'),
(6, 14, 'film', 'Начало', 'Inception.jpg', '0', 2010, 'Кобб – талантливый вор, лучший из лучших в опасном искусстве извлечения: он крадет ценные секреты из глубин подсознания во время сна, когда человеческий разум наиболее уязвим. Редкие способности Кобба сделали его ценным игроком в привычном к предательству мире промышленного шпионажа, но они же превратили его в извечного беглеца и лишили всего, что он когда-либо любил.\r\n\r\nИ вот у Кобба появляется шанс исправить ошибки. Его последнее дело может вернуть все назад, но для этого ему нужно совершить невозможное – инициацию. Вместо идеальной кражи Кобб и его команда спецов должны будут провернуть обратное. Теперь их задача – не украсть идею, а внедрить ее. Если у них получится, это и станет идеальным преступлением.\r\n\r\nНо никакое планирование или мастерство не могут подготовить команду к встрече с опасным противником, который, кажется, предугадывает каждый их ход. Врагом, увидеть которого мог бы лишь Кобб.\r\n\r\nРейтинг фил', NULL),
(7, 6, 'serial', 'Друзья', 'Friends.jpg', '0', 1994, '\r\nСериал Друзья/Friends 10 сезон онлайн\r\nЕсть ли люди, блистающие большим обаянием, чем Фиби, Росс, Рейчел, Моника, Чандлер и Джоуи? Да есть, вот только про них никто не знает, а вот зато про эту партию стандартных американских подростков с далеких пор - знает вся планета. Рейчел примечательна своим сугубо ветреным характером, Чандлер – настоящий балагур и стопроцентная душа любой компании, Монике не всегда везет с парнями, что, тем не менее, совсем не заставляет ее унывать. Джоуи блещет красотой и мечтает об артистической карьере в своей жизни, Фиби любит поплакать над сентиментальными ситуациями, а Росс – обычный умный парень, начитанный и серьезно относящийся ко всему научному. Стандартный набор из американских подростков, который, тем не менее, приковал к себя многомиллионные взоры, как за океаном, так и на собственной родине.\r\n', NULL),
(8, 2, 'serial', 'Во все тяжкие', 'Breaking_Bad.jpg', '0', 2008, 'Получив известие о том, что он смертельно болен раком, недооцененный химик-гений, работающий простым школьным учителем, решает использовать свои знания для заработка денег, которые будут держать его семью на плаву даже после его смерти. Не найдя лучшего решения, он начинает изготавливать и продавать амфетамин высочайшего качества.', NULL),
(9, 5, 'film', 'Побег из Шоушенка', 'The_Shawshank_Redemption.jpg', '0', 1994, 'Бухгалтер Энди Дюфрейн обвинён в убийстве собственной жены и её любовника. Оказавшись в тюрьме под названием Шоушенк, он сталкивается с жестокостью и беззаконием, царящими по обе стороны решётки. Каждый, кто попадает в эти стены, становится их рабом до конца жизни. Но Энди, обладающий живым умом и доброй душой, находит подход как к заключённым, так и к охранникам, добиваясь их особого к себе расположения.', NULL),
(10, 2, 'film', 'Криминальное чтиво', 'Pulp_Fiction.jpg\r\n', '0', 1994, 'Двое бандитов Винсент Вега и Джулс Винфилд ведут философские беседы в перерывах между разборками и решением проблем с должниками криминального босса Марселласа Уоллеса.\r\n\r\nВ первой истории Винсент проводит незабываемый вечер с женой Марселласа Мией. Во второй рассказывается о боксёре Бутче Кулидже, купленном Уоллесом, чтобы сдать бой. В третьей истории Винсент и Джулс по нелепой случайности попадают в неприятности.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `season`
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
-- Dumping data for table `season`
--

INSERT INTO `season` (`id`, `serial_id`, `number`, `image`, `description`, `rating`) VALUES
(1, 3, 1, 'Game_of_Thrones.jpg', 'История происходит в вымышленном мире, на континентах Вестерос и Эссос. Дворянина Эддарда Старка по прозвищу Нед просят стать главным советником правителя Семи Королевств — Десницей. В это же время Нед узнает, что предыдущий советник был отравлен, и убил его кто-то из дома Ланнистеров, которых тот пытался разоблачить в использовании темных сил. Эддард принимает предложение, вступает в должность и узнает, что у короны огромные долги, стена, защищающая Семь Королевств, скоро падет и вот-вот начнется война.', '0'),
(2, 3, 2, 'Game_of_Thrones.jpg', 'Робб Старк, старший сын убитого Неда, стал правителем Севера. Вся семья Старков, желая отомстить за смерть главы семейства, воюет с домом Ланнистеров. Трон Семи королевств не пустует — его занимает Джоффри Баратеон. Но это не мешает его братьям Ренли и Станнису объявить себя королями и начать войну. Где-то на Севере небольшая армия Ночного Дозора заходит на заснеженные земли за Стеной и сталкивается с одичалыми и враждебными дикарями. Они называют себя вольным народом и уже долгие годы воюют с чёрными братьями и лордами Севера. Джон Сноу отправляется в разведку за Стену и попадает в плен.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `seria`
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
-- Dumping data for table `seria`
--

INSERT INTO `seria` (`id`, `season_id`, `number`, `title`, `image`, `rating`, `description`, `source`) VALUES
(1, 1, 1, 'Зима близко', 'Game_of_Thrones_1_1.jpg', '10', 'Один из разведчиков покидает свой пост, чтобы оповестить своего лорда об опасности со стороны так называемых Белых Ходоков. Он делает это невзирая на то, что за оставление своего поста полагается смертная казнь. Более того, Эддард Старк, лорд Винтерфелла, услышав его слова, не верит ему. Лорд был непреклонен в своём решении по поводу дезертира...\r\n\r\nВскоре в замок Винтерфелл прибывает король Роберт Баратеон со своей свитой.\r\n\r\nА меж тем на другом материке Визерис Таргариен, являющийся сыном свергнутого короля, планирует выдать свою сестру Дейенерис за некоего кхала Дрого, чтобы заручиться его поддержкой и отвоевать трон.', 'https://www.youtube.com/embed/YYKAUhcDYzA'),
(2, 1, 2, 'Королевский тракт', NULL, '10', NULL, 'https://www.youtube.com/embed/Pzc3bro4FFA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `status` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `registration_date`, `status`) VALUES
(11, 'Alex', 'mail@mail.ru', '$2y$10$qHtHIb.pn1xe/NYcZdNrTuTTcfJXM8/Ck9B1EMQLSPEAtXJHf.NK2', '2020-10-26', 'user'),
(12, 'Shapus', 'a@a.com', '$2y$10$NFDuhR7utd99sIENI4CuGeg5qeL0EQhM3IXfCftIb9BQ7XSoT2B9a', '2020-10-26', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comment__item`
--
ALTER TABLE `comment__item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `comment__seria`
--
ALTER TABLE `comment__seria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seria_id` (`seria_id`);

--
-- Indexes for table `favorite__item`
--
ALTER TABLE `favorite__item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `favorite__season`
--
ALTER TABLE `favorite__season`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `favorite__seria`
--
ALTER TABLE `favorite__seria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `seria_id` (`seria_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `season`
--
ALTER TABLE `season`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_id` (`serial_id`);

--
-- Indexes for table `seria`
--
ALTER TABLE `seria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comment__item`
--
ALTER TABLE `comment__item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comment__seria`
--
ALTER TABLE `comment__seria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `favorite__item`
--
ALTER TABLE `favorite__item`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `favorite__season`
--
ALTER TABLE `favorite__season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorite__seria`
--
ALTER TABLE `favorite__seria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `season`
--
ALTER TABLE `season`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seria`
--
ALTER TABLE `seria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment__item`
--
ALTER TABLE `comment__item`
  ADD CONSTRAINT `comment__item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment__item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `comment__seria`
--
ALTER TABLE `comment__seria`
  ADD CONSTRAINT `comment__seria_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment__seria_ibfk_2` FOREIGN KEY (`seria_id`) REFERENCES `seria` (`id`);

--
-- Constraints for table `favorite__item`
--
ALTER TABLE `favorite__item`
  ADD CONSTRAINT `favorite__item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorite__item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `favorite__season`
--
ALTER TABLE `favorite__season`
  ADD CONSTRAINT `favorite__season_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorite__season_ibfk_2` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);

--
-- Constraints for table `favorite__seria`
--
ALTER TABLE `favorite__seria`
  ADD CONSTRAINT `favorite__seria_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorite__seria_ibfk_2` FOREIGN KEY (`seria_id`) REFERENCES `seria` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `season`
--
ALTER TABLE `season`
  ADD CONSTRAINT `season_ibfk_1` FOREIGN KEY (`serial_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `seria`
--
ALTER TABLE `seria`
  ADD CONSTRAINT `seria_ibfk_1` FOREIGN KEY (`season_id`) REFERENCES `season` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
