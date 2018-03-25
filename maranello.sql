-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 24 2018 г., 23:52
-- Версия сервера: 5.6.37
-- Версия PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `maranello`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_name` varchar(150) NOT NULL,
  `category_text` text,
  `category_text_small` text,
  `category_seo_title` varchar(250) DEFAULT '',
  `category_seo_description` varchar(250) DEFAULT '',
  `category_seo_keywords` varchar(250) DEFAULT '',
  `category_image` varchar(250) DEFAULT '',
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT '1',
  `sort_order` smallint(5) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `category_name`, `category_text`, `category_text_small`, `category_seo_title`, `category_seo_description`, `category_seo_keywords`, `category_image`, `status`, `sort_order`) VALUES
(11, 0, 'Пиццы', 'В нашей пиццерии Вы найдете самый разнообразный перечень вкуснейших пицц, приготовленных прямо в печи.', 'Пиццы', 'пицца', 'пицца', 'пицца', 'maranello1.jpg', 1, 1),
(12, 0, 'Салаты', 'Самые вкусные и самые свежие салаты в городе', 'Салаты', 'салаты', 'салаты', 'салаты', 'salats.jpg', 1, 1),
(13, 0, 'Первые блюда', 'Первые блюда, как дома', 'Первые блюда', 'первые блюда', 'первые блюда', 'первые блюда', 'first.jpg', 1, 1),
(14, 0, 'Вторые блюда', 'Большой выбор вкуснейших вторых блюд', 'Вторые блюда', 'вторые блюда', 'вторые блюда', 'вторые блюда', 'seconds.jpg', 1, 1),
(15, 0, 'Десерты', 'Свежайшие десертики', 'Десерты', 'десерты', 'десерты', 'десерты', 'desserts.jpg', 1, 1),
(16, 0, 'Напитки', 'Все напитки: от соков и компотов до пива и водки', 'Напитки', 'напитки', 'напитки', 'напитки', 'drinks.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `status` smallint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `name`, `text`, `title`, `status`) VALUES
(1, 'Новость номер 1', 'Привет, это новость номер 1!', 'Новость номер 1 - TITLE', 1),
(2, 'Новость номер 2', '234524323 4234 234 52 52435 2354 234 524352435 2345 245 2465245 245 245 2456 356  345674357 34 735635 35 735 7357 3573576 3567 35763576 3567 3576 34675 357 357357 357 357 357357 35 7357 ', 'Новость номер 2 - TITLE', 1),
(3, 'Новость номер 3', 'fgh edfg sdfh edsfh ef hewfgh egfh egfh egfh eg fhegf heh egh egfh koegfhmn oegfhn oegf hnoeg hng hfg jfnef jfjfnjfngwjrfjfgnjfngwfnwrg o gnwojgn wjfnej ewfh eondjgfodnh opsnwon wong wojfd nwofjn ofjhg', 'Новость номер 3 - TITLE', 1),
(4, 'Новость номер 4', '321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч 321432 ыфваыва 234234 ап выар ыч ', 'Новость номер 4 - TITLE', 1),
(5, 'Новость номер 5', 'маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 маип тр ьо  бьлб 565 46 ', 'Новость номер 5 - TITLE', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `articul` varchar(50) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `status` smallint(2) UNSIGNED NOT NULL DEFAULT '0',
  `product_image` varchar(250) DEFAULT '0',
  `product_description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `articul`, `price`, `quantity`, `status`, `product_image`, `product_description`) VALUES
(32, 'Маранелла', '1', 131, 100, 1, 'maranello.jpg', 'Окорок свинной, ветчина, салями, перец болгарский, сыр, руккола, соус Неаполитано.'),
(33, 'Цезарь', '1', 125, 100, 1, 'cesar.jpg', ''),
(34, 'Бульон', '1', 39, 100, 1, 'bul.jpg', ''),
(35, 'Лазанья мясная', '1', 77, 100, 1, 'lazmyas.jpg', ''),
(36, 'Чизкейк', '1', 45, 100, 1, 'chiz.jpg', ''),
(37, 'Cок Rich', '1', 38, 100, 1, 'rich.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product_to_category`
--

CREATE TABLE `product_to_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_to_category`
--

INSERT INTO `product_to_category` (`product_id`, `category_id`) VALUES
(32, 11),
(33, 12),
(34, 13),
(35, 14),
(36, 15),
(37, 16);

-- --------------------------------------------------------

--
-- Структура таблицы `url_alias`
--

CREATE TABLE `url_alias` (
  `id_url_alias` int(11) NOT NULL,
  `url` varchar(250) NOT NULL,
  `alias` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `url_alias`
--

INSERT INTO `url_alias` (`id_url_alias`, `url`, `alias`) VALUES
(1, 'controller=news', 'news'),
(4, 'news_id=1', 'my1news.html'),
(5, 'news_id=2', 'my2news.html'),
(6, 'news_id=3', 'my3news.html'),
(7, 'news_id=4', 'my4news.html'),
(9, 'news_id=5', 'my5news.html'),
(10, 'controller=admin', 'admin'),
(12, 'controller=renews', 'renews'),
(13, 'controller=excel', 'excel'),
(14, 'controller=categories', 'categories'),
(19, 'controller=recategories', 'recategories'),
(27, 'controller=reproducts', 'reproducts'),
(28, 'controller=products', 'products'),
(57, 'controller=login', 'login'),
(58, 'controller=registration', 'registration'),
(59, 'category_id=11', 'pizza'),
(60, 'category_id=12', 'salats'),
(61, 'category_id=13', 'firsts'),
(62, 'category_id=14', 'seconds'),
(63, 'category_id=15', 'desserts'),
(64, 'category_id=16', 'drink'),
(65, 'product_id=32', 'mara'),
(66, 'product_id=33', 'cesar'),
(67, 'product_id=34', 'bul'),
(68, 'product_id=35', 'lazm'),
(69, 'product_id=36', 'chizcake'),
(70, 'product_id=37', 'rich'),
(71, 'controller=logout', 'logout'),
(72, 'controller=about', 'about');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `status` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `password`, `email`, `phone`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '0955438806', 3),
(4, 'Валерий', 'Коваленко', '30bc9b11653060f903a8d428cc2582ce', 'relax030714@gmail.com', '0955438806', 3),
(5, 'Екатерина', 'Гуляченко', '1b097e2c2bfb361ea6e8ebf22f86e2ab', 'kgulyachenko@mail.ua', '0950144308', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `url_alias`
--
ALTER TABLE `url_alias`
  ADD PRIMARY KEY (`id_url_alias`),
  ADD UNIQUE KEY `Индекс 2` (`url`),
  ADD UNIQUE KEY `Индекс 3` (`alias`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT для таблицы `url_alias`
--
ALTER TABLE `url_alias`
  MODIFY `id_url_alias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
