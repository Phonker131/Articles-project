-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 21 2024 г., 11:16
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `articles_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_name` varchar(32) NOT NULL,
  `article_content` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`article_id`, `article_name`, `article_content`) VALUES
(12, 'dfdfdfdfdfdfddfdfddddd', 'sdsdsdsdadfa fdas dfsdfs sf sdf sdf '),
(15, 'wsiuhjdfaa', ''),
(16, 'fdfdfdfd', ''),
(17, 'fdfdfdfd', ''),
(18, 'dffd', '111111111'),
(22, 'wsiuhjdfaa', ''),
(23, 'fdfdfdfd', ''),
(24, 'fdfdfdfd', ''),
(26, 'test111', 'test'),
(27, 'test111', 'test'),
(28, 'test name smth', 'Do to be agreeable conveying oh assurance. Wicket longer admire do barton vanity itself do in it. Preferred to sportsmen it engrossed listening. Park gate sell they west hard for the. Abode stuff noisy manor blush yet the far. Up colonel so between removed so do. Years use place decay sex worth drift age. Men lasting out end article express fortune demands own charmed. About are are money ask how seven.              dfdgjkdfnigjdfhgidjfghdfijghdfijghdfgijdghdijfghdifjghdfighdfguidfhgudhfgijdfghdifughdfiughdfiughdfgiudfghdfiughdfiguhdfgiudfhgidufghdiughdiughdifughdifughdfiughdifughdiufghdiughdifughdiufghdifughdifughdfiughdi\r\n\r\nggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggffgfggggggggggggggggggggggggggggggggggggffgfggggggggggggggggggggggggggggggggggggffgfgggggggggggggggggggggg'),
(29, 'wsiuhjdf', '11111111'),
(30, 'dfdfdfdfdfdfddfdfddddd', 'sdsdsdsdadfa fdas dfsdfs sf sdf sdf '),
(31, 'dffd', '111111111'),
(32, 'test111', 'test'),
(33, 'Take My Breath', '[Verse 1]\r\nI saw the fire in your eyes\r\nI saw the fire when I look into your eyes\r\nYou tell me things you wanna try (Uh)\r\nI know temptation is the devil in disguise\r\nYou risk it all to feel alive, oh yeah\r\nYou&#039;re offering yourself to me like sacrifice\r\nYou said you do this all the time\r\nTell me you love me if I bring you to the light\r\n\r\n\r\n\r\n\r\n[Pre-Chorus]\r\nIt&#039;s like a dream what she feels with me\r\nShe loves to be on the edge\r\nHer fantasy is okay with me\r\nThen suddenly, baby says\r\n\r\n[Chorus]\r\nTake my breath away\r\nAnd make it last forever, babe\r\nDo it now or never, babe (Ah)\r\nTake my breath away\r\nNobody does it better, babe\r\nBring me close to&mdash;\r\n\r\n[Verse 2]\r\nWant me to hold on to you tight\r\nYou pull me closer, feel the heat between your thighs (Uh, say)\r\nYou&#039;re way too young to end your life (Huh)\r\nGirl, I don&#039;t wanna be the one who pays the price\r\nYou might also like\r\nFE!N\r\nTravis Scott\r\nAll Of The Girls You Loved Before\r\nTaylor Swift\r\nMELTDOWN\r\nTravis Scott\r\n[Pre-Chorus]\r\nOoh, it&#039'),
(34, 'Halda', 'tyjrdfdddddddddddddddddddddddgdgdgdg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
