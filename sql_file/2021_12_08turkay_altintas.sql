-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 08 Ara 2021, 19:19:58
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `api_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Fashion', 'Category for anything related to fashion.', '2014-06-01 00:35:07', '2014-05-30 14:34:33'),
(2, 'Electronics', 'Gadgets, drones and more.', '2014-06-01 00:35:07', '2014-05-30 14:34:33'),
(3, 'Motors', 'Motor sports and more', '2014-06-01 00:35:07', '2014-05-30 14:34:54'),
(5, 'Movies', 'Movie products.', '2014-06-01 00:35:07', '2016-01-08 10:27:26'),
(6, 'Books', 'Kindle books, audio books and more.', '2014-06-01 00:35:07', '2016-01-08 10:27:47'),
(13, 'Sports', 'Drop into new winter gear.', '2016-01-09 02:24:24', '2016-01-08 22:24:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `category_id`, `created`, `modified`) VALUES
(74, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(75, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(77, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(78, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(79, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(80, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(81, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(82, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(83, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(84, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(85, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(86, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(87, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(88, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(89, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(90, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(91, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(92, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(93, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(94, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(95, 'Telefon', 'Denem ürün', '1234', 2, '2021-12-08 16:16:51', '2021-12-08 16:16:51'),
(96, 'Test 2', 'DDAAA', '12345', 3, '2021-12-08 16:40:19', '2021-12-08 16:40:19'),
(97, 'Türkay 1', 'DDDeeee', '123123', 5, '2021-12-08 16:45:49', '2021-12-08 16:45:49'),
(98, 'fas23', 'fdsar', '44', 2, '2021-12-08 17:28:02', '2021-12-08 17:28:02');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `token` text,
  `token_expire` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `token`, `token_expire`) VALUES
(1, 'turkay@turkayaltintas.com', '1234', '01c3086790a510e01353f91db74a3e33', '2021-12-08- 17:16:39'),
(2, 'turkay', '1234', 'c1b38487efd1bb50c7b49d21fa6e4adc', '2021-12-08- 11:44:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
