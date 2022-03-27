-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Mar 2022, 20:59:24
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sibervatan_sqlmap_lab1`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `picture_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `gallery`
--

INSERT INTO `gallery` (`id`, `picture_url`) VALUES
(1, 'gallery/angelli2387.jpg'),
(2, 'gallery/mrfraser01.jpg'),
(3, 'gallery/junebes.jpg'),
(4, 'gallery/marhowells.jpg'),
(5, 'gallery/sanest.jpg'),
(6, 'gallery/allosaurus.jpg'),
(7, 'gallery/parzival.jpg'),
(8, 'gallery/art3mis.jpg'),
(9, 'gallery/flag.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `landscape_gallery`
--

CREATE TABLE `landscape_gallery` (
  `id` int(11) NOT NULL,
  `landscape_pictureURL` varchar(100) NOT NULL,
  `picture_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `landscape_gallery`
--

INSERT INTO `landscape_gallery` (`id`, `landscape_pictureURL`, `picture_name`) VALUES
(1, 'landspaces/beauty_mountains.jpg', 'beauty of the mountains'),
(2, 'landspaces/amazing_lanspace.jpg', 'Amazing landspace'),
(3, 'landspaces/beauty_greenlands.jpg', 'beauty of the greenlands'),
(4, 'landspaces/beauty_lake.jpeg', 'beauty of the lake'),
(5, 'landspaces/evening_beauty.jpeg', 'beauty of the evening'),
(6, 'landspaces/evening_landscape.jpg', 'Evening landscape'),
(7, 'landspaces/hills-2836301__340.jpg', 'Hills'),
(8, 'landspaces/istockphoto-1297349747-170667a.jpg', 'Beautiful balloon'),
(9, 'landspaces/jungle_landspace.jpeg', 'Jungle landspace'),
(10, 'landspaces/landscape-nature-mountan-alps-rainbow-76824355.jpg', 'Nature mountain Alps'),
(11, 'landspaces/Landscape-Photography-steps.jpg', 'Sun between mountains'),
(12, 'landspaces/Landscape-Tips-Mike-Mezeul-II.jpg', 'Beautiful waterfall'),
(13, 'landspaces/landscape-view-fields-mountains-banff-national-park-alberta-canada_181624-24968.jpg', 'National park Alberta | Canada'),
(14, 'landspaces/mountains.jpg', 'Mountains'),
(15, 'landspaces/pexels-photo-2662116.jpeg', 'border of beautiful land'),
(16, 'landspaces/rainbow-landscape-over-poppy-field-118133556.jpg', 'Rainbow landscape'),
(17, 'landspaces/snowy_lands.jpeg', 'Snowy lands'),
(18, 'landspaces/sun-rays-mountain-landscape-5721010.jpg', 'Mountain landscapes'),
(19, 'landspaces/sunshine.jpeg', 'Sunshine');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL,
  `report_database` tinyint(1) NOT NULL,
  `report_dbname` tinyint(1) NOT NULL,
  `report_tablename_users` tinyint(1) NOT NULL,
  `report_tablename_subscribs` tinyint(1) NOT NULL,
  `report_admin` tinyint(1) NOT NULL,
  `report_sibervatan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sibervatan_members`
--

CREATE TABLE `sibervatan_members` (
  `id` int(10) NOT NULL,
  `name_surname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sibervatan_members`
--

INSERT INTO `sibervatan_members` (`id`, `name_surname`, `username`, `passwd`) VALUES
(1, 'Angelo Lincoln', 'angelLi2387', 'Baevaed0jah'),
(2, 'Rick Fraser', 'MrFraser01', '!passw0rd123'),
(3, 'June Clark', 'junebes', '16081997'),
(4, 'Marwah Howells', 'marhowells', 'marwahowells05'),
(5, 'Sandra Guest', 'sanest', '1234567890'),
(6, 'Aniyah Munoz', 'allosaurus', 'iloveallosaurus'),
(7, 'Wade Watts', 'Parzival', 'theOasisParzival'),
(8, 'Samantha Evelyn Cook', 'art3mis', 'art3misSamantha'),
(9, 'admin admin', 'sibervatan_y0u-4re-aw3some', 'sqlmapwork'),
(10, 'Mehmet Özler ÇELİK', 'mozler', '25d55ad283aa400af464c76d713c07ad'),
(11, 'Siber Vatan', 'sibervatan', '9002629b210baff49a987c44103e09b3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sibervatan_subscribers`
--

CREATE TABLE `sibervatan_subscribers` (
  `subscriberID` int(10) UNSIGNED NOT NULL,
  `subscriberMail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sibervatan_subscribers`
--

INSERT INTO `sibervatan_subscribers` (`subscriberID`, `subscriberMail`) VALUES
(1, 'lirocol130@sofrge.com'),
(2, 'taskomishe@typery.com'),
(3, 'bouligaciq@mobitivaisao.com'),
(4, 'conley270@mymailcr.com'),
(5, 'thomasroth@tmtdoeh.com'),
(6, 'goingeasyj@fpfc.tk'),
(7, 'voomamzoom2000@nonise.com'),
(8, 'suxvry44@rmune.com'),
(9, 'surfstar@fssh.ml'),
(10, 'stewartn@eatneha.com'),
(11, 'galapagp@partnerct.com'),
(12, 'cg58dcap@fnaul.com'),
(13, 'gencko@bacharg.com'),
(14, 'carcraft@picsviral.net'),
(15, 'tiddles8@eatneha.com'),
(16, 'natterr@mailpluss.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `landscape_gallery`
--
ALTER TABLE `landscape_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`kullanici_adi`);

--
-- Tablo için indeksler `sibervatan_members`
--
ALTER TABLE `sibervatan_members`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sibervatan_subscribers`
--
ALTER TABLE `sibervatan_subscribers`
  ADD PRIMARY KEY (`subscriberID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `landscape_gallery`
--
ALTER TABLE `landscape_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sibervatan_members`
--
ALTER TABLE `sibervatan_members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `sibervatan_subscribers`
--
ALTER TABLE `sibervatan_subscribers`
  MODIFY `subscriberID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
