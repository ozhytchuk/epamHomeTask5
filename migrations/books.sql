SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `books`
--
CREATE DATABASE IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `books`;

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` tinyint(100) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `author` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `poster` text NOT NULL,
  `url` text NOT NULL,
  `price` float NOT NULL,
  `book_tags` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `book_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Структура таблицы `books_tag`
--

CREATE TABLE `books_tag` (
  `id` smallint(6) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `tag` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE `tags` (
  `id` smallint(6) NOT NULL,
  `tag` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_tag`
--
ALTER TABLE `books_tag`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` tinyint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `books_tag`
--
ALTER TABLE `books_tag`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;
COMMIT;
