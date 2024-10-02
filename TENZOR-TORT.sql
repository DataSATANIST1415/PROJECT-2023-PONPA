-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3309
-- Время создания: Май 30 2023 г., 19:26
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tortotoro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authorised_users`
--

CREATE TABLE `authorised_users` (
  `userlogin` varchar(50) NOT NULL,
  `employername` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `userrole` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `authorised_users`
--

INSERT INTO `authorised_users` (`userlogin`, `employername`, `userpassword`, `userrole`) VALUES
('dunaev', 'Владислав Дунаев', '123123', 'admin'),
('123', 'DICK', '123', 'waiter'),
('fuzetea', 'Касаткин Антон Витальевич', '123123', 'waiter'),
('asya', 'Голубцова Анастасия Евгеньевна', '123123', 'waiter'),
('paradise', 'Ларионов Денис Сергеевич', '123123', 'cooker');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `iddishes` int NOT NULL,
  `namedishes` varchar(50) NOT NULL,
  `costdishes` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`iddishes`, `namedishes`, `costdishes`) VALUES
(1, 'Суп', '100'),
(2, 'Мясо', '200');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes-order`
--

CREATE TABLE `dishes-order` (
  `idorder` int NOT NULL,
  `iddishes1` varchar(50) NOT NULL,
  `dishes1cost` varchar(50) NOT NULL,
  `iddishes2` varchar(50) NOT NULL,
  `dishes2cost` varchar(50) NOT NULL,
  `iddishes3` varchar(50) NOT NULL,
  `dishes3cost` varchar(50) NOT NULL,
  `iddishes4` varchar(50) NOT NULL,
  `dishes4cost` varchar(50) NOT NULL,
  `iddishes5` varchar(50) NOT NULL,
  `dishes5cost` varchar(50) NOT NULL,
  `iddishes6` varchar(50) NOT NULL,
  `dishes6cost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `dishes-order`
--

INSERT INTO `dishes-order` (`idorder`, `iddishes1`, `dishes1cost`, `iddishes2`, `dishes2cost`, `iddishes3`, `dishes3cost`, `iddishes4`, `dishes4cost`, `iddishes5`, `dishes5cost`, `iddishes6`, `dishes6cost`) VALUES
(2, 'Суп', '2', 'Мясо', '2', 'Суп', '', 'Суп', '', 'Суп', '', 'Суп', ''),
(3, 'Мясо', '12', 'Суп', '12', 'Суп', '12', 'Суп', '12', 'Суп', '12', 'Суп', '12'),
(4, 'Суп', '2', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `idorder` int NOT NULL,
  `dataorder` date NOT NULL,
  `timeorder` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idorder`, `dataorder`, `timeorder`, `status`) VALUES
(2, '2023-05-30', '22:22:00', 'Отменен'),
(3, '2023-05-30', '12:22:00', 'Отменен'),
(4, '2023-05-31', '12:12:00', 'Отменен');

-- --------------------------------------------------------

--
-- Структура таблицы `workshift`
--

CREATE TABLE `workshift` (
  `data` date NOT NULL,
  `idworkshift` int NOT NULL,
  `opentime` time NOT NULL,
  `closetime` time NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `workshift`
--

INSERT INTO `workshift` (`data`, `idworkshift`, `opentime`, `closetime`, `status`) VALUES
('2023-06-01', 2, '09:00:00', '22:00:00', 'open'),
('2023-06-11', 3, '10:00:00', '22:00:00', 'open');

-- --------------------------------------------------------

--
-- Структура таблицы `workshift-employee`
--

CREATE TABLE `workshift-employee` (
  `idworkshift` int NOT NULL,
  `employeename1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `employeename2` varchar(100) NOT NULL,
  `employeename3` varchar(100) NOT NULL,
  `employeename4` varchar(100) NOT NULL,
  `employeename5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `workshift-employee`
--

INSERT INTO `workshift-employee` (`idworkshift`, `employeename1`, `employeename2`, `employeename3`, `employeename4`, `employeename5`) VALUES
(2, 'Владислав Дунаев', 'DICK', 'Касаткин Антон Витальевич', 'Голубцова Анастасия Евгеньевна', 'Ларионов Денис Сергеевич'),
(3, 'Владислав Дунаев', 'DICK', 'Касаткин Антон Витальевич', 'Голубцова Анастасия Евгеньевна', 'Ларионов Денис Сергеевич');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authorised_users`
--
ALTER TABLE `authorised_users`
  ADD KEY `employername` (`employername`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`iddishes`);

--
-- Индексы таблицы `dishes-order`
--
ALTER TABLE `dishes-order`
  ADD KEY `idorder` (`idorder`),
  ADD KEY `iddishes1` (`iddishes1`),
  ADD KEY `iddishes2` (`iddishes2`),
  ADD KEY `iddishes3` (`iddishes3`),
  ADD KEY `iddishes4` (`iddishes4`),
  ADD KEY `iddishes5` (`iddishes5`),
  ADD KEY `iddishes6` (`iddishes6`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idorder`);

--
-- Индексы таблицы `workshift`
--
ALTER TABLE `workshift`
  ADD PRIMARY KEY (`idworkshift`);

--
-- Индексы таблицы `workshift-employee`
--
ALTER TABLE `workshift-employee`
  ADD PRIMARY KEY (`idworkshift`),
  ADD KEY `emloyername` (`employeename1`),
  ADD KEY `employeename2` (`employeename2`),
  ADD KEY `employeename3` (`employeename3`),
  ADD KEY `employeename4` (`employeename4`),
  ADD KEY `employeename5` (`employeename5`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `iddishes` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idorder` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `workshift`
--
ALTER TABLE `workshift`
  MODIFY `idworkshift` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `workshift-employee`
--
ALTER TABLE `workshift-employee`
  MODIFY `idworkshift` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `dishes-order`
--
ALTER TABLE `dishes-order`
  ADD CONSTRAINT `dishes-order_ibfk_2` FOREIGN KEY (`idorder`) REFERENCES `orders` (`idorder`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `workshift-employee`
--
ALTER TABLE `workshift-employee`
  ADD CONSTRAINT `workshift-employee_ibfk_1` FOREIGN KEY (`idworkshift`) REFERENCES `workshift` (`idworkshift`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `workshift-employee_ibfk_2` FOREIGN KEY (`employeename1`) REFERENCES `authorised_users` (`employername`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `workshift-employee_ibfk_3` FOREIGN KEY (`employeename2`) REFERENCES `authorised_users` (`employername`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `workshift-employee_ibfk_4` FOREIGN KEY (`employeename3`) REFERENCES `authorised_users` (`employername`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `workshift-employee_ibfk_5` FOREIGN KEY (`employeename4`) REFERENCES `authorised_users` (`employername`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `workshift-employee_ibfk_6` FOREIGN KEY (`employeename5`) REFERENCES `authorised_users` (`employername`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
