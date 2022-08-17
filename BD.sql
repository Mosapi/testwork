-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Авг 07 2022 г., 12:59
-- Версия сервера: 5.7.18
-- Версия PHP: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_company`
--
CREATE DATABASE IF NOT EXISTS `test_company` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test_company`;

-- --------------------------------------------------------

--
-- Структура таблицы `t_comms`
--

CREATE TABLE `t_comms` (
  `id` int(11) NOT NULL,
  `mast_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pole_nm` varchar(25) NOT NULL,
  `comm_bl` varchar(500) NOT NULL,
  `data` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `t_comms`
--

INSERT INTO `t_comms` (`id`, `mast_id`, `user_id`, `pole_nm`, `comm_bl`, `data`) VALUES
(1, 1, 1, 'comm_all', 'Основной тестовый комментарий.', '12:57 07-08-2022'),
(2, 1, 1, 'comp_name', 'Тестовый комментарий к названию компании.', '12:57 07-08-2022');

-- --------------------------------------------------------

--
-- Структура таблицы `t_company`
--

CREATE TABLE `t_company` (
  `co_id` int(11) NOT NULL,
  `co_name` varchar(50) NOT NULL,
  `co_inn` varchar(30) NOT NULL,
  `co_gendir` varchar(40) NOT NULL,
  `co_addr` varchar(100) NOT NULL,
  `co_tel` varchar(50) NOT NULL,
  `co_desc` varchar(255) NOT NULL,
  `co_logo` varchar(25) NOT NULL DEFAULT 'default.png',
  `log_adduser` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `t_company`
--

INSERT INTO `t_company` (`co_id`, `co_name`, `co_inn`, `co_gendir`, `co_addr`, `co_tel`, `co_desc`, `co_logo`, `log_adduser`) VALUES
(1, 'Company Name', '000000000000', 'Фамилия И.О.', '610047, г. Киров, Октябрьский проспект, 1А', '(8332) 58-61-22', 'Существуют сотни или более компаний со знаменитыми логотипами, практически для всех диапазонов продуктов, доступных на рынке. При такой плотной конкуренции создание индивидуальности для бренда это проблема, даже нанимая известного бренд дизайнера.', 'default.png', ''),
(2, 'ООО ХММР', '7801463902', 'Джу Сучоун', '191124,Санкт-Петербург г,Красного Текстильщика ул,10-12 лит.О', '+70000000000', 'Хозяйственные общества и товарищества с участием иностранных юридических и (или) физических лиц, а также лиц без гражданства', 'default.png', 'TestUser1'),
(3, 'ГРДММ', '798968224681', 'Фигагулин А. О.', 'Сенная 20 к2 оф.12', '+70000000000', 'текст текст', 'default.png', 'user2');

-- --------------------------------------------------------

--
-- Структура таблицы `t_users`
--

CREATE TABLE `t_users` (
  `id` int(11) NOT NULL,
  `login` varchar(25) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` int(2) NOT NULL DEFAULT '1',
  `data` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `t_users`
--

INSERT INTO `t_users` (`id`, `login`, `pass`, `level`, `data`) VALUES
(1, 'test', 'c2f1366c51911b52369fe27df307ff84', 1, '2022-08-07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `t_comms`
--
ALTER TABLE `t_comms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `t_company`
--
ALTER TABLE `t_company`
  ADD PRIMARY KEY (`co_id`);

--
-- Индексы таблицы `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `t_comms`
--
ALTER TABLE `t_comms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `t_company`
--
ALTER TABLE `t_company`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
