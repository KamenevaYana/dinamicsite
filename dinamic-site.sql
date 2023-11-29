-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 29 2023 г., 16:54
-- Версия сервера: 8.0.31
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dinamic-site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `status` tinyint DEFAULT '0',
  `page` int NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `status`, `page`, `email`, `comment`, `created_date`) VALUES
(1, 1, 8, 'as@sa.ru', '<p>rem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mol</p>', '2023-11-27 22:32:30'),
(2, 1, 8, 'lun@tic.ru', '<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volupt</p>', '2023-11-27 23:15:37'),
(3, 1, 25, 'grower@gmail.com', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in volupt', '2023-11-27 23:15:51'),
(4, 1, 25, 'grower@gmail.com', 'or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some adva', '2023-11-27 23:16:26'),
(5, 1, 25, 'as@sa.ru', 'or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some adva', '2023-11-27 23:16:36'),
(6, 0, 25, 'as@sa.ru', 'or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some adva', '2023-11-27 23:23:33'),
(8, 1, 8, 'koko@moo.com', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehend', '2023-11-28 00:17:51'),
(9, 1, 8, 'grower@gmail.com', 'olor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt m', '2023-11-28 01:21:27');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `id_topic` int DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `title`, `img`, `content`, `status`, `id_topic`, `created_date`) VALUES
(8, 41, 'Кошачий пикачу', '1701030003_png-transparent-pokemon-pikachu-illustration-pokxe9mon-pikachu-ash-ketchum-pokxe9mon-i-choose-you-pikachu-game-leaf-dog-like-mammal-thumbnail.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 5, '2023-11-24 22:31:37'),
(25, 41, 'Учеба была нелегкой', '1701030037_945073540.jpg', '<p>\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"</p>', 1, 2, '2023-11-25 18:01:35'),
(27, 41, 'Python на степике', '1701030064_72ace33598b5b4771378da67f025d385.jpg', '<p>\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"</p>', 1, 6, '2023-11-26 21:58:00'),
(28, 41, 'Хочется играть в Atomic Heart, а не вот это всё', '1701030343_1625501616_15-phonoteka-org-p-anime-kiberpank-na-rabochii-stol-krasivo-o-16.jpg', '<p>В HTML некоторые символы имеют особый смысл и должны быть представлены в виде HTML-сущностей, чтобы сохранить их значение. Эта функция возвращает строку, над которой проведены эти преобразования. Если вам нужно преобразовать все возможные сущности, используйте <a href=\"https://www.php.net/manual/ru/function.htmlentities.php\">htmlentities()</a>.</p><p>Если входная строка, переданная в эту функцию и результирующий документ используют одинаковую кодировку символов, то этой функции достаточно, чтобы подготовить данные для вставки в большинство частей HTML-документа. Однако, если данные содержат символы, не определённые в кодировке символов результирующего документа и вы ожидаете сохранения этих символов (как числовые или именованные сущности), то вам недостаточно будет этой и <a href=\"https://www.php.net/manual/ru/function.htmlentities.php\">htmlentities()</a> функций (которые только преобразуют подстроки с соответствующими сущностями). Необходимо использовать функцию <a href=\"https://www.php.net/manual/ru/function.mb-encode-numericentity.php\">mb_encode_numericentity()</a>.</p>', 1, 1, '2023-11-26 23:17:35'),
(29, 41, 'Счастливое далёко', '1701030415_f7TczbDF6v0.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', 1, 6, '2023-11-26 23:26:55');

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(1, 'PHP', 'О учебе ЯП PHP'),
(2, 'HTML', 'btrrtn'),
(5, 'Котики спасут мир =)', 'Посты о котах всех пород'),
(6, 'Путешествия', 'городские');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `admin` tinyint NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `admin`, `user_name`, `email`, `password`, `created`) VALUES
(20, 0, 'MikaROOT', 'japan@gmail.com', '$2y$10$ezPcL71LlSGh8RA.vz5NjeMCDHJmFirm0PtyAgfQmFCD5GiI6/GPa', '2023-11-20 17:30:02'),
(21, 0, 'Kevin', 'fvolsdkvo@gmail.com', '$2y$10$4IQXFCOJCzDQCln2L.c1U.VDUbquQ7YrwYJwGYLrNTr.S3ZqwxFnm', '2023-11-20 17:35:51'),
(23, 0, 'Kamush', 'kunc@mail.com', '$2y$10$9uAn4AkODnmKSm9Xzc1JZ./6t2.S2XrOaiKpRKRxmtxvmKHuPQPrq', '2023-11-20 20:17:17'),
(24, 0, 'Steik', 'steik@moof.com', '$2y$10$FjeP0odBk6Q9v7zgfjrlL.IquDlIxp/uFVpq/9ZcQOB/pE/mcb1sG', '2023-11-20 20:26:00'),
(25, 0, 'Hamus', 'kuchiro@miii.com', '$2y$10$Z.YJTkQRCjRBUZUMVc/58ekBZhHmdx.ecSWE953RnDzpGKqbPimVS', '2023-11-20 20:28:46'),
(30, 0, 'lololosh', 'ololo@lol.ru', '$2y$10$R.t4EuCFDWmBrMq9V63iSugdl0CpsMJpw1gxTJyA5lsjifJhJlJbu', '2023-11-21 13:15:22'),
(32, 0, 'LinLin', 'lin@lin.com', '$2y$10$SOZwBxxyOMPdtjm0/06D2eAUsy/eiH2gOps4001ATj0Pt5R5EnzJG', '2023-11-21 13:24:24'),
(33, 0, 'miumiu', 'miu@miu.com', '$2y$10$dk2QT41QX0vw87M5TSh5UuYUDDy3kmU6LmFwBNZWFum4Ibtz.yPKy', '2023-11-21 13:25:15'),
(34, 0, 'Actor', 'actor@mail.com', '$2y$10$0fGa8.J09DjljLQh463Ln.P1i0HvbTJwYnIJdYIh7eGrHFUzCQ7bi', '2023-11-21 13:48:24'),
(35, 0, 'chichi', 'chi@mail.com', '$2y$10$34ekhGYMwqK6Xwt3v4QhPOl1Y8J0AufH2b4ZsMnAk34dDbtf3q2Gq', '2023-11-21 13:59:37'),
(36, 0, 'krokro', 'kro@mail.ru', '$2y$10$ndnDFT5XIBgEsYh6LrBQreveMwCsa2NTxudYqRuDrTzqRNQNMePkK', '2023-11-21 14:15:34'),
(37, 0, 'luntik', 'lun@tic.ru', '$2y$10$EoEcRX9VcZng5VPVE50n/uNNeU51jcVQV1NvA21k4jpzvFCa4bwpq', '2023-11-21 14:56:42'),
(38, 0, 'kurochka', 'ku@roch.ka', '$2y$10$jWXqjg3Z8K2klGBj2mI4Z.Fl9E1VgJjYuu/4EWVM/0S.oUdx9bnfy', '2023-11-21 15:12:38'),
(39, 1, 'kuroch', 'ku@rochhh.ka', '$2y$10$vLwlA5.41IugQ..Ur/gBc.dG2KPPfRsYovjIuy7yYE4jQIoUBZdsK', '2023-11-21 15:22:58'),
(40, 1, 'luntikOFF', 'off@off.com', '$2y$10$RbvA4LLjsYynkJRcxVtq6uEgr4uBYH714ZAI.iiEVJpRCm6Q73P0K', '2023-11-21 15:41:05'),
(41, 1, 'Assa', 'as@sa.ru', '$2y$10$370vbx1/gqee6q78ctQDn..0Pzbl5ZGuokfqSSqOVg/OvWZmZ/RWG', '2023-11-23 15:38:47'),
(42, 0, 'Test11', 'testovoe@test.ru', '$2y$10$l5VKa4fD3PscK.tgL1ixWeGVJsEZpneIA4fNwI2iGzvHaYhFFgTGi', '2023-11-25 16:27:17'),
(43, 1, 'korova', 'koko@moo.com', '$2y$10$Qg2A2DZWaUBBymcssrdDO.Vhv4lOQZjB5ey7dHkKKcGvNqg8KeqgK', '2023-11-25 16:29:36');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_topic` (`id_topic`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
