-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 05 2025 г., 04:51
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
-- База данных: `olimp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `user_id`, `tournament_id`, `status`, `created_at`) VALUES
(1, 1, 1, 'в обработке', 1745651525),
(2, 2, 1, 'в обработке', 1745776296),
(3, 2, 1, 'в обработке', 1745776299),
(4, 2, 1, 'в обработке', 1745776301),
(5, 2, 1, 'в обработке', 1745776302),
(6, 2, 1, 'в обработке', 1745776303),
(7, 2, 1, 'в обработке', 1745776305),
(8, 1, 1, 'в обработке', 1746261709),
(9, 1, 2, 'в обработке', 1746261867),
(10, 1, 1, 'одобрена', 1746277450),
(11, 1, 2, 'в обработке', 1746277450),
(12, 2, 3, 'отклонена', 1746277450),
(13, 3, 1, 'в обработке', 1746277450);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1745651329),
('m250426_070757_create_user_table', 1745651330),
('m250426_070802_create_tournament_table', 1745651330),
('m250426_070807_create_application_table', 1745651330),
('m250426_071439_add_attributes_to_tournament', 1745651699);

-- --------------------------------------------------------

--
-- Структура таблицы `tournament`
--

CREATE TABLE `tournament` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `class` int(11) DEFAULT NULL,
  `age_group` varchar(50) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tournament`
--

INSERT INTO `tournament` (`id`, `name`, `date`, `description`, `created_at`, `class`, `age_group`, `language`) VALUES
(1, 'Всероссийская олимпиада ', '2025-04-02', 'фвцфвцфцвфцв', 0, NULL, NULL, NULL),
(2, 'гыы', '2025-04-02', 'выыы', 2010, 6, '15', 'Java'),
(3, 'Олимпиада по Python', '2024-06-15', 'Международное соревнование для начинающих', 1746277450, 9, 'middle', 'Python'),
(4, 'Чемпионат по Java', '2024-07-20', 'Соревнование для старших классов', 1746277450, 11, 'senior', 'Java'),
(5, 'Школьный турнир C++', '2024-05-30', 'Локальное мероприятие для школ', 1746277450, 7, 'junior', 'C++');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `email`, `created_at`, `updated_at`, `profile_image`) VALUES
(1, 'кира', 'rDx3bkfsZ0iXZ_DhiprDxlZy4NWeeZyT', '$2y$13$nhsK3rqvEVdhdu0vCwKqqevZ2AZVjI9hTi9RE3GDKUaysbEfdn/sK', 'bendi666@mail.ru', 1745651516, 1745651516, NULL),
(2, 'яркакои', 'Et2HZ8SOc9T2-SHH4XtWV6m8MLkQW4so', '$2y$13$oEdPc5Bu8F3nR161XeoXu.SCB4cyN1kwYSBCpanFyU17U9SYdcxn6', 'iwishshedied2@mail.ru', 1745776279, 1745776279, NULL),
(3, 'chupep', 'aSv2M9LRZyzqomyw8GhGjmOQsnLUoCvt', '$2y$13$LRStkW.kGYmBLpLMt7UcxejXjRlu7To2M6O2ukm9KJ11sCkFABQyu', 'tyntyntyntyntynsahur@gmail.com', 1745851724, 1745851724, NULL),
(4, 'alex_ivanov', 'abc123xyz', '$2y$13$xyz...', 'alex@mail.com', 1746277450, 1746277450, 'user_1.jpg'),
(5, 'maria_smith', 'def456uvw', '$2y$13$abc...', 'maria@mail.com', 1746277450, 1746277450, 'user_2.jpg'),
(6, 'john_doe', 'ghi789rst', '$2y$13$def...', 'john@mail.com', 1746277450, 1746277450, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-application-user_id` (`user_id`),
  ADD KEY `fk-application-tournament_id` (`tournament_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `tournament`
--
ALTER TABLE `tournament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `fk-application-tournament_id` FOREIGN KEY (`tournament_id`) REFERENCES `tournament` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-application-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
