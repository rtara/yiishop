-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 21 2017 р., 18:53
-- Версія сервера: 5.7.13
-- Версія PHP: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `yii2advanced`
--

-- --------------------------------------------------------

--
-- Структура таблиці `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `user_id` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tmp_user_id` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` int(11) NOT NULL,
  `updated_time` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `tmp_user_id`, `created_time`, `updated_time`) VALUES
(1, 'd20e00de62cd50174fa6b2f20f4f8864', NULL, 1496351778, 1496498079),
(2, NULL, 'd20e00de62cd50174fa6b2f20f4f8864', 1497828813, 1498050033),
(3, NULL, 'f5f48c40c5ebc96e75c39a546f07e300', 1498040182, 1498040182),
(4, NULL, '9dd34f90639f0b6823f4918f4c6c5815', 1498040191, 1498040191);

-- --------------------------------------------------------

--
-- Структура таблиці `cart_element`
--

CREATE TABLE IF NOT EXISTS `cart_element` (
  `id` int(11) NOT NULL,
  `parent_id` int(55) DEFAULT NULL,
  `model` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `cart_id` int(11) NOT NULL,
  `item_id` int(55) NOT NULL,
  `count` int(11) NOT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `cart_element`
--

INSERT INTO `cart_element` (`id`, `parent_id`, `model`, `cart_id`, `item_id`, `count`, `price`, `hash`, `options`) VALUES
(1, NULL, 'dvizh\\shop\\models\\Product', 2, 2, 2, NULL, '1bb161926dc113a150c7498507271103', '[]');

-- --------------------------------------------------------

--
-- Структура таблиці `field`
--

CREATE TABLE IF NOT EXISTS `field` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` text COLLATE utf8_unicode_ci,
  `options` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `relation_model` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `field_category`
--

CREATE TABLE IF NOT EXISTS `field_category` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `field_value`
--

CREATE TABLE IF NOT EXISTS `field_value` (
  `id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `numeric_value` int(11) DEFAULT NULL,
  `model_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `field_variant`
--

CREATE TABLE IF NOT EXISTS `field_variant` (
  `id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeric_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `filter`
--

CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `relation_field_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_filter` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `relation_field_value` text COLLATE utf8_unicode_ci COMMENT 'PHP serialize'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `filter_relation_value`
--

CREATE TABLE IF NOT EXISTS `filter_relation_value` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `filter_value`
--

CREATE TABLE IF NOT EXISTS `filter_value` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `variant_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `filter_variant`
--

CREATE TABLE IF NOT EXISTS `filter_variant` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numeric_value` int(11) NOT NULL,
  `latin_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(20) NOT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `description` text,
  `gallery_id` varchar(150) DEFAULT NULL,
  `sort` int(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `image`
--

INSERT INTO `image` (`id`, `title`, `alt`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `description`, `gallery_id`, `sort`) VALUES
(1, NULL, NULL, 'Products/Product1/c5e4df.jpg', 1, NULL, 'Product', 'c6c51c0f10-2', NULL, NULL, NULL),
(2, NULL, NULL, 'Products/Product2/91844d.jpg', 2, NULL, 'Product', '097c9acf72-2', NULL, NULL, NULL),
(3, NULL, NULL, 'Products/Product3/730d16.jpg', 3, NULL, 'Product', '463fd135af-2', NULL, NULL, NULL),
(4, NULL, NULL, 'Products/Product4/a44bec.jpg', 4, NULL, 'Product', '8681505346-2', NULL, NULL, NULL),
(5, NULL, NULL, 'Products/Product5/e91b6e.jpg', 5, NULL, 'Product', '18c5e71cce-2', NULL, NULL, NULL),
(6, NULL, NULL, 'Products/Product6/3d848b.jpg', 6, NULL, 'Product', 'e478047fc2-2', NULL, NULL, NULL),
(7, NULL, NULL, 'Products/Product17/19c70c.jpg', 17, NULL, 'Product', 'b0d4877efb-2', NULL, NULL, NULL),
(8, NULL, NULL, 'Products/Product18/0b65de.jpg', 18, NULL, 'Product', '5e2769bc29-2', NULL, NULL, NULL),
(9, NULL, NULL, 'Products/Product8/e5fc8e.jpg', 8, NULL, 'Product', '0c88202bb0-2', NULL, NULL, NULL),
(10, NULL, NULL, 'Products/Product10/e0ea2a.jpg', 10, NULL, 'Product', '06ce21b2ef-2', NULL, NULL, NULL),
(11, NULL, NULL, 'Products/Product7/ba31f8.jpg', 7, NULL, 'Product', 'ec50f402e8-2', NULL, NULL, NULL),
(12, NULL, NULL, 'Products/Product9/59c55f.jpg', 9, NULL, 'Product', 'f03d80917f-2', NULL, NULL, NULL),
(13, NULL, NULL, 'Products/Product15/4fab40.jpg', 15, NULL, 'Product', '8d15c42b0a-2', NULL, NULL, NULL),
(14, NULL, NULL, 'Products/Product13/3f2c54.jpg', 13, NULL, 'Product', 'e4bc9591ab-2', NULL, NULL, NULL),
(15, NULL, NULL, 'Products/Product12/0591ef.jpg', 12, NULL, 'Product', 'e8270b383a-2', NULL, NULL, NULL),
(16, NULL, NULL, 'Products/Product16/499fc0.jpg', 16, NULL, 'Product', '7beba44194-2', NULL, NULL, NULL),
(17, NULL, NULL, 'Products/Product14/afca84.jpg', 14, NULL, 'Product', 'd36209d62c-2', NULL, NULL, NULL),
(18, NULL, NULL, 'Products/Product11/62e6d2.jpg', 11, NULL, 'Product', 'c531dde3b4-2', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `default` smallint(6) NOT NULL DEFAULT '0',
  `date_update` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `lang`
--

INSERT INTO `lang` (`id`, `url`, `local`, `name`, `default`, `date_update`, `date_create`) VALUES
(1, 'en', 'en-EN', 'English', 0, 1497812244, 1497812244),
(2, 'uk', 'uk-UK', 'Українська', 1, 1497812244, 1497812244),
(3, 'ru', 'ru-RU', 'Русский', 0, 1497812244, 1497812244);

-- --------------------------------------------------------

--
-- Структура таблиці `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1495565080),
('m130524_201442_init', 1495565084),
('m140622_111540_create_image_table', 1495565084),
('m160506_062849_create_cart', 1495565085),
('m160513_121415_Mass', 1495565087),
('m160518_123713_Mass', 1495565088),
('m160521_112619_Mass', 1495565095),
('m160613_134415_Mass', 1495565098),
('m161129_101511_promocode_to_item', 1495565098),
('m170116_073411_altertable_promocode', 1495565098),
('m170116_073511_promocode_used', 1495565099),
('m170117_131738_altertable_promocode_type', 1495565099),
('m170118_075411_promocode_condition', 1495565099),
('m170118_075611_promocode_to_condition', 1495565099),
('m170303_071750_altertable_promocode_cumulative', 1495565099),
('m170419_110711_model_name_field', 1495565100),
('m170425_115443_latin_value_field', 1495565100),
('m170426_105633_modif_type_field', 1495565100),
('m170529_152556_lang', 1497812245),
('m230217_134711_altertable_promocode_used', 1495565101),
('m260519_000708_alter_cart_table', 1497812248),
('m314315_215216_create_seo_table', 1495565101);

-- --------------------------------------------------------

--
-- Структура таблиці `promocode`
--

CREATE TABLE IF NOT EXISTS `promocode` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `date_elapsed` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type` enum('percent','quantum','cumulative') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'percent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `promocode_condition`
--

CREATE TABLE IF NOT EXISTS `promocode_condition` (
  `id` int(11) NOT NULL,
  `sum_start` int(10) NOT NULL,
  `sum_stop` int(10) NOT NULL,
  `value` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `promocode_to_condition`
--

CREATE TABLE IF NOT EXISTS `promocode_to_condition` (
  `id` int(11) NOT NULL,
  `promocode_id` int(11) NOT NULL,
  `condition_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `promocode_to_item`
--

CREATE TABLE IF NOT EXISTS `promocode_to_item` (
  `id` int(11) NOT NULL,
  `promocode_id` int(11) NOT NULL,
  `item_model` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `promocode_use`
--

CREATE TABLE IF NOT EXISTS `promocode_use` (
  `id` int(11) NOT NULL,
  `promocode_id` int(11) NOT NULL,
  `user_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `promocode_used`
--

CREATE TABLE IF NOT EXISTS `promocode_used` (
  `id` int(11) NOT NULL,
  `promocode_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user` int(11) DEFAULT NULL,
  `sum` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `h1` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(522) DEFAULT NULL,
  `text` text,
  `meta_index` varchar(255) DEFAULT NULL,
  `redirect_301` varchar(522) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `seo`
--

INSERT INTO `seo` (`id`, `item_id`, `modelName`, `h1`, `title`, `keywords`, `description`, `text`, `meta_index`, `redirect_301`) VALUES
(1, 1, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(2, 2, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(3, 3, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(4, 4, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(5, 5, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(6, 1, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', ''),
(7, 2, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', ''),
(8, 3, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', ''),
(9, 4, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', ''),
(10, 5, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', ''),
(11, 1, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(12, 2, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(13, 6, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(14, 3, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(15, 4, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(16, 5, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(17, 6, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(18, 7, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(19, 8, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(20, 9, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(21, 10, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(22, 11, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(23, 12, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(24, 13, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(25, 14, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(26, 15, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(27, 16, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(28, 7, 'dvizh\\shop\\models\\Producer', '', '', '', '', '', '', ''),
(29, 17, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(30, 18, 'dvizh\\shop\\models\\Product', '', '', '', '', '', '', ''),
(31, 41, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', ''),
(32, 42, 'dvizh\\shop\\models\\Category', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблиці `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `image` text COLLATE utf8_unicode_ci,
  `sort` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `shop_category`
--

INSERT INTO `shop_category` (`id`, `parent_id`, `name`, `code`, `slug`, `text`, `image`, `sort`) VALUES
(1, 6, 'Побутова техніка', '', 'pobutova-tehnika', '', '', NULL),
(2, 6, 'Телевізори і аудіо', '', 'televizori-i-audio', '', '', NULL),
(3, 7, 'Смартфони і телефони', '', 'smartfoni-i-telefoni', '', '', NULL),
(4, 7, 'Ноутбуки і планшети', '', 'noutbuki-i-planseti', '', '', NULL),
(5, NULL, 'Фото і відео', '', 'foto-i-video', '', '', NULL),
(6, NULL, 'Техніка для дому', '', 'ofisna-technika', '', '', NULL),
(7, NULL, 'Цифрова техніка\n', '', 'cifrova-technika', '', '', NULL),
(8, 5, 'Камери', '', 'cameri', '', '', NULL),
(9, 5, 'Фотоапарати', '', 'fotoaparaty', '', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `shop_incoming`
--

CREATE TABLE IF NOT EXISTS `shop_incoming` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shop_outcoming`
--

CREATE TABLE IF NOT EXISTS `shop_outcoming` (
  `id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shop_price`
--

CREATE TABLE IF NOT EXISTS `shop_price` (
  `id` int(11) NOT NULL,
  `code` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `price_old` decimal(11,2) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `available` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'yes',
  `type` char(1) COLLATE utf8_unicode_ci DEFAULT 'p'
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `shop_price`
--

INSERT INTO `shop_price` (`id`, `code`, `name`, `price`, `price_old`, `sort`, `amount`, `type_id`, `item_id`, `available`, `type`) VALUES
(1, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 1, 'yes', 'p'),
(2, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 2, 'yes', 'p'),
(3, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 3, 'yes', 'p'),
(4, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 4, 'yes', 'p'),
(5, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 5, 'yes', 'p'),
(6, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 6, 'yes', 'p'),
(7, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 7, 'yes', 'p'),
(8, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 8, 'yes', 'p'),
(9, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 9, 'yes', 'p'),
(10, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 10, 'yes', 'p'),
(11, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 11, 'yes', 'p'),
(12, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 12, 'yes', 'p'),
(13, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 13, 'yes', 'p'),
(14, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 14, 'yes', 'p'),
(15, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 15, 'yes', 'p'),
(16, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 16, 'yes', 'p'),
(17, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 17, 'yes', 'p'),
(18, NULL, 'Основная цена', NULL, NULL, NULL, NULL, 1, 18, 'yes', 'p');

-- --------------------------------------------------------

--
-- Структура таблиці `shop_price_type`
--

CREATE TABLE IF NOT EXISTS `shop_price_type` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `condition` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `shop_price_type`
--

INSERT INTO `shop_price_type` (`id`, `name`, `sort`, `condition`) VALUES
(1, 'Основная цена', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `shop_producer`
--

CREATE TABLE IF NOT EXISTS `shop_producer` (
  `id` int(11) NOT NULL,
  `code` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `shop_producer`
--

INSERT INTO `shop_producer` (`id`, `code`, `name`, `image`, `text`, `slug`) VALUES
(1, NULL, 'Samsung', NULL, '', 'samsung'),
(2, NULL, 'Bosch', NULL, '', 'bosch'),
(3, NULL, 'Apple', NULL, '', 'apple'),
(4, NULL, 'Asus', NULL, '', 'asus'),
(5, NULL, 'Bravis ', NULL, '', 'bravis'),
(6, NULL, 'Lenovo', NULL, '', 'lenovo'),
(7, NULL, 'Sony', NULL, '', 'sony');

-- --------------------------------------------------------

--
-- Структура таблиці `shop_product`
--

CREATE TABLE IF NOT EXISTS `shop_product` (
  `id` int(11) NOT NULL,
  `category_id` int(10) DEFAULT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `related_products` text COLLATE utf8_unicode_ci COMMENT 'PHP serialize',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8_unicode_ci,
  `short_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_new` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_popular` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `is_promo` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `images` text COLLATE utf8_unicode_ci,
  `available` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'yes',
  `sort` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `related_ids` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `shop_product`
--

INSERT INTO `shop_product` (`id`, `category_id`, `producer_id`, `amount`, `related_products`, `name`, `code`, `text`, `short_text`, `is_new`, `is_popular`, `is_promo`, `images`, `available`, `sort`, `slug`, `related_ids`) VALUES
(1, 4, 4, NULL, '', 'Ноутбук ASUS VivoBook Max F541SA-XO397D Chocolate Black (90NB0CH1-M06300)', '6315898', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'noutbuk-asus-vivobook-max-f541sa-xo397d-chocolate-black-90nb0ch1-m06300', 'a:0:{}'),
(2, 4, 4, NULL, '', 'Ноутбук ASUS VivoBook Max F541SC-XO119T (90NB0CI3-M02080)', '6315891', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'noutbuk-asus-vivobook-max-f541sc-xo119t-90nb0ci3-m02080', 'a:0:{}'),
(3, 4, 6, NULL, '', 'Ноутбук LENOVO 100S-14 (80R9009RUA)', '6289012', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'noutbuk-lenovo-100s-14-80r9009rua', 'a:0:{}'),
(4, 4, 3, NULL, '', 'Ноутбук APPLE A1466 MacBook Air 13W" (MMGF2UA/A)', '6294337', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'noutbuk-apple-a1466-macbook-air-13w-mmgf2ua-a', 'a:0:{}'),
(5, 4, 3, NULL, '', 'Ноутбук APPLE A1466 MacBook Air 13W" (MMGG2UA/A)', '6294338', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'noutbuk-apple-a1466-macbook-air-13w-mmgg2ua-a', 'a:0:{}'),
(6, 4, 3, NULL, '', 'Ультрабук APPLE A1534 MacBook 12" Retina (MLH72UA/A)', '6294342', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'ul-trabuk-apple-a1534-macbook-12-retina-mlh72ua-a', 'a:0:{}'),
(7, 4, 1, NULL, '', 'Планшет Samsung SM-T561N Galaxy Tab E 9.6 3G ZNA Gold brown', '6229736', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'planset-samsung-sm-t561n-galaxy-tab-e-9-6-3g-zna-gold-brown', 'a:0:{}'),
(8, 4, 6, NULL, '', 'Планшет Lenovo IdeaPad Tab 3-710F 8GB (ZA0R0006)', '6275011', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'planset-lenovo-ideapad-tab-3-710f-8gb-za0r0006', 'a:0:{}'),
(9, 4, 5, NULL, '', 'Планшет BRAVIS NB107 10.1" 3G (black)', '6284373', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'planset-bravis-nb107-10-1-3g-black', 'a:0:{}'),
(10, 4, 6, NULL, '', 'Планшет LENOVO TAB3-710I 1G+16GWH-UA (ZA0S0119UA)', '6307076', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'planset-lenovo-tab3-710i-1g-16gwh-ua-za0s0119ua', 'a:0:{}'),
(11, 1, 1, NULL, '', 'Холодильник SAMSUNG RB37J5100SA/UA', '6320980', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'holodil-nik-samsung-rb37j5100sa-ua', 'a:0:{}'),
(12, 1, 2, NULL, '', 'Холодильник BOSCH KAI90VI20', '6234418', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'holodil-nik-bosch-kai90vi20', 'a:0:{}'),
(13, 2, 1, NULL, '', 'Телевізор SAMSUNG UE32J5200AKXUA', '6231245', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'televizor-samsung-ue32j5200akxua', 'a:0:{}'),
(14, 2, 5, NULL, '', 'Телевізор BRAVIS LED-32E3000 Smart +T2 black', '6296785', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'televizor-bravis-led-32e3000-smart-t2-black', 'a:0:{}'),
(15, 3, 6, NULL, '', 'Смартфон LENOVO VIBE P1m Dual Sim 16 Gb black', '6248798', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'smartfon-lenovo-vibe-p1m-dual-sim-16-gb-black', 'a:0:{}'),
(16, 3, 1, NULL, '', 'Смартфон SAMSUNG SM-J510H Galaxy J5 Duos ZDD (gold)', '6280637', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'smartfon-samsung-sm-j510h-galaxy-j5-duos-zdd-gold', 'a:0:{}'),
(17, 5, 7, NULL, '', 'Відеокамера SONY HDR-CX405', '6217323', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'videokamera-sony-hdr-cx405', 'a:0:{}'),
(18, 5, 7, NULL, '', 'Цифровой фотоаппарат SONY Cybershot DSC-H300 Black', '6102521', '', '', 'no', 'no', 'no', '', 'yes', NULL, 'cifrovoj-fotoapparat-sony-cybershot-dsc-h300-black', 'a:0:{}');

-- --------------------------------------------------------

--
-- Структура таблиці `shop_product_modification`
--

CREATE TABLE IF NOT EXISTS `shop_product_modification` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(155) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8_unicode_ci,
  `available` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'yes',
  `sort` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `filter_values` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shop_product_to_category`
--

CREATE TABLE IF NOT EXISTS `shop_product_to_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shop_stock`
--

CREATE TABLE IF NOT EXISTS `shop_stock` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shop_stock_to_product`
--

CREATE TABLE IF NOT EXISTS `shop_stock_to_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `shop_stock_to_user`
--

CREATE TABLE IF NOT EXISTS `shop_stock_to_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `group` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `group`) VALUES
(1, 'admin1', 'CLsIvv6KXYsqikxP6n-MEnOxfTaQbydb', '$2y$13$ZNlGDgj3fZQPLR6eKY712.l5s5Nb0cuxqcmqKWFD0YTnFu4sIkT7C', NULL, 'admin@gmail.com', 10, 1495565580, 1495565580, 'superadmin');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tmp_user_id` (`tmp_user_id`);

--
-- Індекси таблиці `cart_element`
--
ALTER TABLE `cart_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Індекси таблиці `field`
--
ALTER TABLE `field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Індекси таблиці `field_category`
--
ALTER TABLE `field_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `field_value`
--
ALTER TABLE `field_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `field_id` (`field_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Індекси таблиці `field_variant`
--
ALTER TABLE `field_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_field` (`field_id`);

--
-- Індекси таблиці `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `filter_relation_value`
--
ALTER TABLE `filter_relation_value`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `filter_value`
--
ALTER TABLE `filter_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `variant_item` (`variant_id`,`item_id`);

--
-- Індекси таблиці `filter_variant`
--
ALTER TABLE `filter_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_filter` (`filter_id`);

--
-- Індекси таблиці `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `lang`
--
ALTER TABLE `lang`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `promocode`
--
ALTER TABLE `promocode`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Індекси таблиці `promocode_condition`
--
ALTER TABLE `promocode_condition`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `promocode_to_condition`
--
ALTER TABLE `promocode_to_condition`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `promocode_to_item`
--
ALTER TABLE `promocode_to_item`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `promocode_use`
--
ALTER TABLE `promocode_use`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_promocode` (`promocode_id`);

--
-- Індекси таблиці `promocode_used`
--
ALTER TABLE `promocode_used`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_category`
--
ALTER TABLE `shop_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`parent_id`);

--
-- Індекси таблиці `shop_incoming`
--
ALTER TABLE `shop_incoming`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_outcoming`
--
ALTER TABLE `shop_outcoming`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_price`
--
ALTER TABLE `shop_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `fk_type` (`type_id`);

--
-- Індекси таблиці `shop_price_type`
--
ALTER TABLE `shop_price_type`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_producer`
--
ALTER TABLE `shop_producer`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_product`
--
ALTER TABLE `shop_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Індекси таблиці `shop_product_modification`
--
ALTER TABLE `shop_product_modification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Індекси таблиці `shop_product_to_category`
--
ALTER TABLE `shop_product_to_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat_to_product` (`product_id`),
  ADD KEY `fk_cat_to_product_2` (`category_id`);

--
-- Індекси таблиці `shop_stock`
--
ALTER TABLE `shop_stock`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_stock_to_product`
--
ALTER TABLE `shop_stock_to_product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shop_stock_to_user`
--
ALTER TABLE `shop_stock_to_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stock` (`stock_id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `cart_element`
--
ALTER TABLE `cart_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `field`
--
ALTER TABLE `field`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `field_category`
--
ALTER TABLE `field_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `field_value`
--
ALTER TABLE `field_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `field_variant`
--
ALTER TABLE `field_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `filter_relation_value`
--
ALTER TABLE `filter_relation_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `filter_value`
--
ALTER TABLE `filter_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `filter_variant`
--
ALTER TABLE `filter_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `lang`
--
ALTER TABLE `lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `promocode`
--
ALTER TABLE `promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `promocode_condition`
--
ALTER TABLE `promocode_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `promocode_to_condition`
--
ALTER TABLE `promocode_to_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `promocode_to_item`
--
ALTER TABLE `promocode_to_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `promocode_use`
--
ALTER TABLE `promocode_use`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `promocode_used`
--
ALTER TABLE `promocode_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблиці `shop_category`
--
ALTER TABLE `shop_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблиці `shop_incoming`
--
ALTER TABLE `shop_incoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `shop_outcoming`
--
ALTER TABLE `shop_outcoming`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `shop_price`
--
ALTER TABLE `shop_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `shop_price_type`
--
ALTER TABLE `shop_price_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблиці `shop_producer`
--
ALTER TABLE `shop_producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `shop_product`
--
ALTER TABLE `shop_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблиці `shop_product_modification`
--
ALTER TABLE `shop_product_modification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `shop_product_to_category`
--
ALTER TABLE `shop_product_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `shop_stock`
--
ALTER TABLE `shop_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `shop_stock_to_product`
--
ALTER TABLE `shop_stock_to_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `shop_stock_to_user`
--
ALTER TABLE `shop_stock_to_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `cart_element`
--
ALTER TABLE `cart_element`
  ADD CONSTRAINT `elem_to_cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `field`
--
ALTER TABLE `field`
  ADD CONSTRAINT `fk_field_category_id` FOREIGN KEY (`category_id`) REFERENCES `field_category` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `field_value`
--
ALTER TABLE `field_value`
  ADD CONSTRAINT `fk_field_value_field_id` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `field_variant`
--
ALTER TABLE `field_variant`
  ADD CONSTRAINT `fk_field_variant_field_id` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `filter_value`
--
ALTER TABLE `filter_value`
  ADD CONSTRAINT `fk_variant` FOREIGN KEY (`variant_id`) REFERENCES `filter_variant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `filter_variant`
--
ALTER TABLE `filter_variant`
  ADD CONSTRAINT `fk_filter` FOREIGN KEY (`filter_id`) REFERENCES `filter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `promocode_use`
--
ALTER TABLE `promocode_use`
  ADD CONSTRAINT `fk_promocode` FOREIGN KEY (`promocode_id`) REFERENCES `promocode` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `shop_price`
--
ALTER TABLE `shop_price`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type_id`) REFERENCES `shop_price_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `shop_product`
--
ALTER TABLE `shop_product`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `shop_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_producer` FOREIGN KEY (`producer_id`) REFERENCES `shop_producer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `shop_product_modification`
--
ALTER TABLE `shop_product_modification`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `shop_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `shop_product_to_category`
--
ALTER TABLE `shop_product_to_category`
  ADD CONSTRAINT `fk_cat_to_product` FOREIGN KEY (`product_id`) REFERENCES `shop_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cat_to_product_2` FOREIGN KEY (`category_id`) REFERENCES `shop_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `shop_stock_to_user`
--
ALTER TABLE `shop_stock_to_user`
  ADD CONSTRAINT `fk_stock` FOREIGN KEY (`stock_id`) REFERENCES `shop_stock` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
