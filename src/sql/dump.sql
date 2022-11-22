SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `db`;

SET NAMES utf8mb4;

CREATE TABLE `departments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `departments` (`id`, `title`) VALUES
(1,	'Бухгалтерия'),
(2,	'Отдел кадров'),
(3,	'Финансовый отдел'),
(4,	'Отдел продаж'),
(5,	'Юридическая служба');

CREATE TABLE `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `file` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `files` (`id`, `title`, `file`) VALUES
(1,	'Any desk',	'https://anydesk.com/ru'),
(2,	'7 zip',	'https://www.7-zip.org/'),
(3,	'Adobe Reader',	'https://get.adobe.com/ru/reader/');

CREATE TABLE `links` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `links` (`id`, `title`, `link`) VALUES
(1,	'Яндекс',	'https://ya.ru/'),
(2,	'Google',	'https://www.google.ru/'),
(3,	'Mail.ru',	'https://mail.ru/');

CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `news` (`id`, `title`, `text`, `date`) VALUES
(1,	'Начало работы сайта',	'Ура! Наш сайт заработал',	'2022-11-22'),
(2,	'Очередная новость',	'Это раздел работы с новостями и сюда будут добаловаться новости по мере их поступления. Это раздел работы с новостями и сюда будут добаловаться новости по мере их поступления.',	'2022-11-22');

CREATE TABLE `workers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `department` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department` (`department`),
  CONSTRAINT `workers_ibfk_1` FOREIGN KEY (`department`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `workers` (`id`, `name`, `position`, `department`) VALUES
(1,	'Николай Осипов',	'Менеджер',	4),
(2,	'Алексей Савченко',	'Юрист',	5),
(3,	'Елена Виноградова',	'Главный бухгалтер',	1),
(4,	'Лариса Кузнецова',	'Бухгалтер',	1),
(5,	'Олег Николаев',	'Менеджер',	4),
(6,	'Ольга Ботникова',	'Финансовый директор',	3),
(7,	'Александр Катышев',	'Специалист',	3),
(8,	'Наталья Кувшинова',	'HR менеджер',	2),
(9,	'Алексей Оплетаев',	'Менеджер',	4),
(10,	'Михаель Шумахер',	'Юрист',	5);

ALTER TABLE news ADD FULLTEXT (

text

)
