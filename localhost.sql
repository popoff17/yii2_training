-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `yii2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii2`;

DROP TABLE IF EXISTS `yii_admin_log`;
CREATE TABLE `yii_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Действие',
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Пользователь',
  `time` int(11) NOT NULL COMMENT 'Дата и время',
  PRIMARY KEY (`id`),
  KEY `FK_yii_admin_log_yii_user` (`user`),
  CONSTRAINT `FK_yii_admin_log_yii_user` FOREIGN KEY (`user`) REFERENCES `yii_user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='Таблица для хранения всех изменений, производимых в админке';

INSERT INTO `yii_admin_log` (`id`, `action`, `user`, `time`) VALUES
(1,	'Создал новость',	'admin',	1111);

DROP TABLE IF EXISTS `yii_auth_assignment`;
CREATE TABLE `yii_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `yii_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `yii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `yii_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin',	'2',	1472945735),
('developer',	'1',	1472945735),
('manager',	'48',	1473617617),
('smm',	'5',	1517066905),
('user',	'4',	1472945735);

DROP TABLE IF EXISTS `yii_auth_item`;
CREATE TABLE `yii_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Название роли',
  `type` int(11) NOT NULL COMMENT 'Тип',
  `description` text COLLATE utf8_unicode_ci COMMENT 'Описание',
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Правило',
  `data` text COLLATE utf8_unicode_ci COMMENT 'Данные',
  `created_at` int(11) DEFAULT NULL COMMENT 'Дата создания',
  `updated_at` int(11) DEFAULT NULL COMMENT 'Дата обновления',
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `yii_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `yii_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `yii_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin',	1,	NULL,	NULL,	NULL,	1472932403,	1472932403),
('developer',	1,	NULL,	NULL,	NULL,	1472932403,	1472932403),
('manager',	1,	NULL,	NULL,	NULL,	1472932403,	1472932403),
('smm',	1,	NULL,	NULL,	NULL,	NULL,	NULL),
('user',	1,	NULL,	NULL,	NULL,	1472932403,	1472932403);

DROP TABLE IF EXISTS `yii_auth_item_child`;
CREATE TABLE `yii_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `yii_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `yii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `yii_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `yii_auth_item_child` (`parent`, `child`) VALUES
('developer',	'admin'),
('admin',	'manager'),
('manager',	'user');

DROP TABLE IF EXISTS `yii_auth_rule`;
CREATE TABLE `yii_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `yii_concerts`;
CREATE TABLE `yii_concerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL COMMENT 'Псевдоним',
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `short_text` varchar(512) NOT NULL COMMENT 'Краткий текст',
  `text` text NOT NULL COMMENT 'Полный текст',
  `date` varchar(50) NOT NULL COMMENT 'Дата',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `yii_concerts` (`id`, `alias`, `title`, `short_text`, `text`, `date`) VALUES
(2,	'novyj-koncert',	'Новый концерт',	'Краткий текст для анонса',	'<p>Подробное описание</p>',	'2016-11-22'),
(4,	'novyj-koncert',	'Новый концерт2',	'Краткий текст для анонса',	'<p>Подробное описание</p>',	'2016-11-22'),
(5,	'novyj-koncert',	'Новый концерт3',	'Краткий текст для анонса',	'<p>Подробное описание</p>',	'2016-11-22');

DROP TABLE IF EXISTS `yii_events`;
CREATE TABLE `yii_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL COMMENT 'Псевдоним',
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `short_text` varchar(512) NOT NULL COMMENT 'Краткий текст',
  `text` text NOT NULL COMMENT 'Полный текст',
  `date` varchar(50) NOT NULL COMMENT 'Дата',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `yii_events` (`id`, `alias`, `title`, `short_text`, `text`, `date`) VALUES
(1,	'vystuplenie-v-harat-s-pub-22-11-2016',	'Выступление в Harat\'s pub 22-11-2016',	'Мы будем вытупать в харатсе! И ты приходи!',	'<p><strong>Lorem Ipsum</strong> - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>',	'2016-11-22');

DROP TABLE IF EXISTS `yii_gallery`;
CREATE TABLE `yii_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL COMMENT 'Псевдоним',
  `title` varchar(255) NOT NULL COMMENT 'Название альбома',
  `image` varchar(255) NOT NULL COMMENT 'Обложка альбома',
  `date` varchar(50) NOT NULL COMMENT 'Дата альбома',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `yii_gallery` (`id`, `alias`, `title`, `image`, `date`) VALUES
(14,	'b-day-slam-2016-2-9-2016',	'B-Day Slam 2016 2/9/2016',	'/uploads/gallery/093460ad887e60fc.jpg',	'2016-09-02'),
(15,	'harat-s-pub-3-09-16',	'Harat\'s Pub 3/09/16',	'/uploads/gallery/79d099d484725f6e.jpg',	'2016-09-16');

DROP TABLE IF EXISTS `yii_gallery_items`;
CREATE TABLE `yii_gallery_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL COMMENT 'ИД галереи',
  `thumb_image` varchar(255) NOT NULL COMMENT 'Уменьшенное изображение',
  `image` varchar(255) NOT NULL COMMENT 'Оригинальное изображение',
  PRIMARY KEY (`id`),
  KEY `FK_yii_gallery_items_yii_gallery` (`gallery_id`),
  CONSTRAINT `FK_yii_gallery_items_yii_gallery` FOREIGN KEY (`gallery_id`) REFERENCES `yii_gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `yii_gallery_items` (`id`, `gallery_id`, `thumb_image`, `image`) VALUES
(22,	14,	'/uploads/gallery/626115bb9341b8fe.jpg',	'/uploads/gallery/c80be0a46813f674.jpg'),
(23,	14,	'/uploads/gallery/e03a63f82aeaaf79.jpg',	'/uploads/gallery/5764e73255928613.jpg'),
(24,	14,	'/uploads/gallery/029ab8cad5d65ea2.jpg',	'/uploads/gallery/a8e17cbf0c21fca0.jpg'),
(25,	14,	'/uploads/gallery/358161ffcaf8c872.jpg',	'/uploads/gallery/032d28a9c84d163c.jpg'),
(26,	14,	'/uploads/gallery/9663d7d1b843032f.jpg',	'/uploads/gallery/fdbe93ed53f78168.jpg'),
(27,	14,	'/uploads/gallery/934a05b332306b16.jpg',	'/uploads/gallery/48f35c453206798a.jpg'),
(28,	14,	'/uploads/gallery/e8fb946dbc499ed2.jpg',	'/uploads/gallery/36a51d4cd4ced1e9.jpg'),
(29,	14,	'/uploads/gallery/becf45f188baefcf.jpg',	'/uploads/gallery/048b5fced0aff682.jpg'),
(30,	14,	'/uploads/gallery/566bac3b93c90103.jpg',	'/uploads/gallery/d552298614ba3c24.jpg'),
(31,	14,	'/uploads/gallery/c1b46bff13ef3b06.jpg',	'/uploads/gallery/e7c279c65fa20eed.jpg'),
(32,	14,	'/uploads/gallery/c65f3b3b28e52644.jpg',	'/uploads/gallery/162ca2de49eaf833.jpg'),
(33,	14,	'/uploads/gallery/5ab5d8ad2bdd862c.jpg',	'/uploads/gallery/3724b8da9df9444b.jpg'),
(34,	14,	'/uploads/gallery/be958d41fb6f0ddd.jpg',	'/uploads/gallery/0b134d7149d73ebe.jpg'),
(35,	14,	'/uploads/gallery/600cc8373e514c18.jpg',	'/uploads/gallery/b9577c333dce70ff.jpg'),
(36,	14,	'/uploads/gallery/8c9ba66b41950aa2.jpg',	'/uploads/gallery/e1cd0728b023f1cc.jpg'),
(37,	14,	'/uploads/gallery/e6f81aeddf60b5ff.jpg',	'/uploads/gallery/53ab50f5894ae7a4.jpg'),
(38,	14,	'/uploads/gallery/99e350c6aea5361b.jpg',	'/uploads/gallery/54d8148cdd383fd0.jpg'),
(82,	15,	'/uploads/gallery/4e50f55164297f8a.jpg',	'/uploads/gallery/ba5ae06915d85ce5.jpg'),
(83,	15,	'/uploads/gallery/7989596868e7850f.jpg',	'/uploads/gallery/7a61776952225d4c.jpg'),
(84,	15,	'/uploads/gallery/d2b70f0c8e016401.jpg',	'/uploads/gallery/a79a0824df00a1b2.jpg'),
(85,	15,	'/uploads/gallery/26ea3d8e270a5c26.jpg',	'/uploads/gallery/6badc36acacbf976.jpg'),
(86,	15,	'/uploads/gallery/f433a110dfa84795.jpg',	'/uploads/gallery/0bac345e12648039.jpg'),
(87,	15,	'/uploads/gallery/32eb772583554db6.jpg',	'/uploads/gallery/a88f5b7a62c478e9.jpg'),
(88,	15,	'/uploads/gallery/4b170c165b64f55d.jpg',	'/uploads/gallery/45f664ea71228658.jpg'),
(89,	15,	'/uploads/gallery/6f4d2bda7fb969d1.jpg',	'/uploads/gallery/4b747bc3da1dd454.jpg'),
(90,	15,	'/uploads/gallery/b9e02e93f9cc91a6.jpg',	'/uploads/gallery/526aa3b9b97e2bd2.jpg'),
(91,	15,	'/uploads/gallery/9490feda9ce331ef.jpg',	'/uploads/gallery/ea0dc8ff41538c43.jpg'),
(92,	15,	'/uploads/gallery/e62071424c4f4abb.jpg',	'/uploads/gallery/13f8a2a047c05dd9.jpg'),
(93,	15,	'/uploads/gallery/c00fb69a01e5ff7c.jpg',	'/uploads/gallery/b65209656f77d4e5.jpg'),
(94,	15,	'/uploads/gallery/9ac6920c158b79f1.jpg',	'/uploads/gallery/7886b4032eb03f16.jpg'),
(95,	15,	'/uploads/gallery/d537b58d8dedb8ab.jpg',	'/uploads/gallery/a4d9855e57e28b5e.jpg'),
(96,	15,	'/uploads/gallery/4cfbf3e5185c7fc2.jpg',	'/uploads/gallery/5a1303183f04810c.jpg');

DROP TABLE IF EXISTS `yii_mailforms`;
CREATE TABLE `yii_mailforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ключ (псевдоним) формы',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Название формы',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'E-mail адреса получателей',
  `phones` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Телефоны для смс-уведомлений',
  `request_text_ok` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Текст ответа при успешной отправке',
  `request_text_error` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Текст ответа при ошибке',
  `template` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Шаблон письма',
  `form_fields` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Поля формы',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `yii_mailforms` (`id`, `key`, `title`, `email`, `phones`, `request_text_ok`, `request_text_error`, `template`, `form_fields`) VALUES
(1,	'callback22',	'Заказать звонок',	'popoff17@yandex.ru',	'+7 (111) 111-11-11',	'Спасибо! Мы вам перезвоним!',	'Произошла ошибка!',	'#name,\r\n<br/>\r\n<br/>\r\n<br/>\r\n<br/>\r\n<br/>\r\n#phone\r\n',	'49,50');

DROP TABLE IF EXISTS `yii_mailforms_fields`;
CREATE TABLE `yii_mailforms_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Тип поля',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя поля',
  `placeholder` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Плейсхолдер',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Значение',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `yii_mailforms_fields` (`id`, `type`, `name`, `placeholder`, `value`) VALUES
(49,	'text',	'name',	'Ф.И.О.',	'Ф.И.О.'),
(50,	'text',	'phone',	'Телефон',	'8 (800) 000 00 00');

DROP TABLE IF EXISTS `yii_mailforms_results`;
CREATE TABLE `yii_mailforms_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL COMMENT 'ИД формы',
  `time` int(11) NOT NULL COMMENT 'Дата и время записи',
  `user` int(11) DEFAULT NULL COMMENT 'Пользователь',
  PRIMARY KEY (`id`),
  KEY `FK_yii_mailforms_results_yii_mailforms` (`form_id`),
  CONSTRAINT `FK_yii_mailforms_results_yii_mailforms` FOREIGN KEY (`form_id`) REFERENCES `yii_mailforms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='Результаты заполнения форм\r\n';

INSERT INTO `yii_mailforms_results` (`id`, `form_id`, `time`, `user`) VALUES
(1,	1,	1478713105,	NULL),
(2,	1,	1478723292,	NULL);

DROP TABLE IF EXISTS `yii_mailforms_results_values`;
CREATE TABLE `yii_mailforms_results_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `result_id` int(11) NOT NULL COMMENT 'ИД результата',
  `field_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя поля',
  `field_value` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Значение',
  PRIMARY KEY (`id`),
  KEY `FK_yii_mailforms_results_values_yii_mailforms_results` (`result_id`),
  KEY `FK_yii_mailforms_results_values_yii_mailforms_fields` (`field_name`),
  CONSTRAINT `FK_yii_mailforms_results_values_yii_mailforms_fields` FOREIGN KEY (`field_name`) REFERENCES `yii_mailforms_fields` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_yii_mailforms_results_values_yii_mailforms_results` FOREIGN KEY (`result_id`) REFERENCES `yii_mailforms_results` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT COMMENT='Значения полей результатов форм';

INSERT INTO `yii_mailforms_results_values` (`id`, `result_id`, `field_name`, `field_value`) VALUES
(1,	1,	'name',	'test name'),
(2,	1,	'phone',	'test phone'),
(3,	2,	'name',	'test'),
(4,	2,	'phone',	'test');

DROP TABLE IF EXISTS `yii_migration`;
CREATE TABLE `yii_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `yii_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1471551731),
('m130524_201442_init',	1471551736),
('m140506_102106_rbac_init',	1472857568);

DROP TABLE IF EXISTS `yii_pages`;
CREATE TABLE `yii_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) NOT NULL COMMENT 'Псевдоним',
  `title` varchar(255) NOT NULL COMMENT 'Заголовок',
  `text` text NOT NULL COMMENT 'Полный текст',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `yii_pages` (`id`, `alias`, `title`, `text`) VALUES
(2,	'rajder',	'Райдер',	'<p>1. Бэклайн<br /><br />1.1. Ламповый гитарный усилитель с кабинетом 1х12, 2х12. Fender/Marshall или клоны. Крайне нежелательны Mesa/Boogie и его клоны. - 2 шт. Кабинеты должны быть подзвучены инструментальными микрофонами (Эленберг и прочие караоке микрофонами не считаются)<br /><br />1.2. Басовый усилитель с кабинетом... Подзвучка микрофоном и съем в линию (дибокс).<br /><br />1.3.Барабаная установка классом не ниже Sonor 507, Mapex Q series. Комплектация бочка 22\"(20\"), подвесной том 12\" (10\"), напольный том 16\" (14\"). 4 стойки под тарелки, стойка под хэт, под малый, все стойки классом не ниже sonor 100-й серии. Набор микрофонов для съема ударной установки - бочка, малый, хэт, подвесной том, напольный том, оверхед, все микрофоны должны быть предназначены для подзвучки барабанов (Эленберг и прочие караоке микрофонами не считаются). Компрессор, как минимум на бочке.<br />P.S.: пласты целые!!!! не заклеенные скотчем малярной лентой и т.д., а ЦЕЛЫЕ<br /><br />1.4. 2 и более микрофона вокальных со стойками, классом не ниже shure sm58, вокальная обработка (компрессор, дилэй).<br /><br />2. Мониторинг<br /><br />2.1. Минимум 3 мониторные линии. Отдельная мониторная линия для барабанщика (можно наушники, исправные с длинным шнуром классом не ниже AKG 44).</p>'),
(3,	'kontakty',	'Контакты',	'<p>тут контакты</p>'),
(4,	'biografiya',	'Биография',	'<p>Био</p>'),
(5,	'index',	'Главная',	'<p><strong>Lorem Ipsum</strong> - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.</p>');

DROP TABLE IF EXISTS `yii_settings_seo`;
CREATE TABLE `yii_settings_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'Название настройки',
  `alias` varchar(255) NOT NULL COMMENT 'алиас',
  `value` text NOT NULL COMMENT 'Значение',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Поля для настройки СЕО данных';

INSERT INTO `yii_settings_seo` (`id`, `title`, `alias`, `value`) VALUES
(1,	'Ключевые слова',	'keywords',	'the maugleez, mowglee, breaking bad, saltoz, saltozguitars, music, download music, listen, listen to music, rockband, rock, nvkz, siberia, novokuznetsk, новокузнецк, blues, stoner, indie, get up, getup, clip, video, album, new album, fanclub, fan, Russia, Россия, русская музыка, russian music, nobidy cares, warld, peace, society, social, way, prime minister, lyrics, song, songs, daisy, #1, number 1, number one, love, love story, ballad, single, ethnic, indie, independent, independent russian music, сибиряк, authentical, shazam, melody, fantasy, drums, amtelectronics, amedia cymbals, cymbals, pedalboard, vaper, guitar, bass, vocal, vox, text, скачать, скачать музыку, скачать текст, vape, скачать песню, jungle, city jungle, jet, jet fighter, jet fighters, песня, музыка, скачать бесплатно, мауглиз, мауглис, зэ мауглис, же мауглис, зэ мауглиз, зе мауглиз. Do it yourself, diy, production, label, record, studio, record studio, recording, sexy, stunning, gourgeous, funny, funk, alternative, new, new wave, punk, hard, follow, follow me, tasty, wonderful, beautiful, nice'),
(2,	'Описание сайта',	'site_description',	'Рок-группа The Maugleez из Новокузнецка. Быстро, жарко и довольно агрессивно. Громко, дико и прямо в цель. Это The Maugleez.');

DROP TABLE IF EXISTS `yii_sitemap`;
CREATE TABLE `yii_sitemap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL DEFAULT '0' COMMENT 'Родитель',
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Псевдоним',
  `menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Меню',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Заголовок страницы',
  `template` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Шаблон',
  `ord` int(11) NOT NULL COMMENT 'Порядок',
  PRIMARY KEY (`id`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `yii_sitemap` (`id`, `parent`, `alias`, `menu`, `title`, `template`, `ord`) VALUES
(1,	0,	'site',	'',	'Главная',	'default',	0),
(2,	1,	'news',	'',	'Новости',	'default',	0),
(5,	2,	'news2',	'',	'Новости2',	'default',	0),
(6,	0,	'events',	'',	'События',	'default',	0);

DROP TABLE IF EXISTS `yii_sitemap_menu`;
CREATE TABLE `yii_sitemap_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Псевдоним',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Название меню',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `yii_sitemap_menu` (`id`, `alias`, `title`) VALUES
(1,	'main_menu',	'Главное меню'),
(2,	'bottom_menu',	'Нижнее меню');

DROP TABLE IF EXISTS `yii_social`;
CREATE TABLE `yii_social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'Название',
  `link` varchar(255) NOT NULL COMMENT 'Ссылка',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `yii_social` (`id`, `title`, `link`) VALUES
(3,	'vk',	'https://vk.com/the_maugleez'),
(4,	'instagram',	'https://www.instagram.com/themaugleez/'),
(5,	'jamendo',	'https://www.jamendo.com/artist/492314/the-maugleez'),
(6,	'youtube',	'https://www.youtube.com/channel/UCLBpgk3Lv1_ASL8ww1jWtCA');

DROP TABLE IF EXISTS `yii_test`;
CREATE TABLE `yii_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `yii_user`;
CREATE TABLE `yii_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Логин пользователя',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Имя пользователя',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ключ авторизации',
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Пароль',
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Токен сброса пароля',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'E-mail пользователя',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT 'Статус',
  `active` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Акстивность',
  `created_at` int(11) NOT NULL COMMENT 'Создан',
  `updated_at` int(11) NOT NULL COMMENT 'Обновлен',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `FK_yii_user_yii_user_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `yii_user` (`id`, `username`, `name`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1,	'developer',	'Разработчик',	'okoNGoEJ-Ea-YTmNMn1O2R6b7LH5iXIY',	'$2y$13$xkeKYO0Ox7e7OTAWdTJvMOylsAGxP17EHlPxLBu3JcTqJh97nrn0S',	NULL,	'<a href=\"mailto:developer@admin.com\" class=\"mailto\">admin@admin.com<span class=\"mailto\"><span class=\"element-invisible\"> (link sends e-mail)</span></span></a>',	10,	0,	1467146186,	1467146186),
(2,	'admin',	'Администратор',	'GBYgVK9fmg8ArK9uMu2biaXdotUZbe9g',	'$2y$13$xkeKYO0Ox7e7OTAWdTJvMOylsAGxP17EHlPxLBu3JcTqJh97nrn0S',	NULL,	'<a href=\"mailto:admin@qwe.ru\" class=\"mailto\">user@qwe.ru<span class=\"mailto\"><span class=\"element-invisible\"> (link sends e-mail)</span></span></a>',	10,	0,	1467146418,	1467146418),
(3,	'manager',	'Менеджер',	'GBYgVK9fmg8ArK9uMu2biaXdotUZbe9g',	'$2y$13$xkeKYO0Ox7e7OTAWdTJvMOylsAGxP17EHlPxLBu3JcTqJh97nrn0S',	NULL,	'<a href=\"mailto:manager@qwe.ru\" class=\"mailto\">user@qwe.ru<span class=\"mailto\"><span class=\"element-invisible\"> (link sends e-mail)</span></span></a>',	10,	0,	1467146418,	1467146418),
(4,	'user',	'Пользователь',	'GBYgVK9fmg8ArK9uMu2biaXdotUZbe9g',	'$2y$13$xkeKYO0Ox7e7OTAWdTJvMOylsAGxP17EHlPxLBu3JcTqJh97nrn0S',	NULL,	'<a href=\"mailto:user@qwe.ru\" class=\"mailto\">user@qwe.ru<span class=\"mailto\"><span class=\"element-invisible\"> (link sends e-mail)</span></span></a>',	10,	0,	1467146418,	1467146418),
(5,	'smm1',	'Николай Попов',	'c717d1f2c28010cdc2acc686daecf2da',	'$2y$13$NEKGF4VjF80UOUf7v/bmiurFWe67qb1bOVUkeedz3wKdu3Y.8SRYW',	NULL,	'coder17@web-axioma.ru',	10,	1,	1517066901,	1517066901);

DROP TABLE IF EXISTS `yii_video`;
CREATE TABLE `yii_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'Название',
  `link` varchar(255) NOT NULL COMMENT 'Ссылка на видео',
  `date` varchar(50) NOT NULL COMMENT 'Дата видео',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `yii_video` (`id`, `title`, `link`, `date`) VALUES
(1,	'Get Up!',	'https://youtu.be/LMl74VLNyAs',	'24-06-2016'),
(2,	'Get Up!',	'https://youtu.be/7LUPMsTtsYA',	'24-06-2017');

-- 2019-01-27 06:55:10
