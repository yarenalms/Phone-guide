-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Haz 2025, 23:54:10
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `telefon_rehberi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `birimler`
--

CREATE TABLE `birimler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `ust_birim_id` int(11) DEFAULT NULL,
  `kategori` enum('Fakülte','Rektörlük','Daire Başkanlığı','Bölüm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `birimler`
--

INSERT INTO `birimler` (`id`, `ad`, `ust_birim_id`, `kategori`) VALUES
(1, 'Kalite Koordinatörlüğü', NULL, 'Daire Başkanlığı'),
(2, 'Rektör Yardımcısı', NULL, 'Rektörlük');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL,
  `fakulte_id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`id`, `fakulte_id`, `ad`) VALUES
(40, 18, 'Bilgisayar Mühendisliği'),
(41, 18, 'Makine Mühendisliği'),
(42, 18, 'Elektrik-Elektronik Mühendisliği'),
(43, 19, 'Cerrahi Bilimler'),
(44, 19, 'Dahili Tıp Bilimleri'),
(45, 20, 'İşletme'),
(46, 20, 'İktisat'),
(47, 21, 'Tarla Bitkileri'),
(48, 21, 'Bahçe Bitkileri'),
(49, 22, 'Mimarlık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fakulteler`
--

CREATE TABLE `fakulteler` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `fakulteler`
--

INSERT INTO `fakulteler` (`id`, `ad`) VALUES
(18, 'Mühendislik Fakültesi'),
(19, 'Tıp Fakültesi'),
(20, 'İktisadi ve İdari Bilimler Fakültesi'),
(21, 'Ziraat Fakültesi'),
(22, 'Sanat tasarım ve mimari fakültesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisiler`
--

CREATE TABLE `kisiler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `resim` varchar(255) DEFAULT NULL,
  `unvan` varchar(50) NOT NULL,
  `bolum_id` int(11) DEFAULT NULL,
  `birim_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kisiler`
--

INSERT INTO `kisiler` (`id`, `ad_soyad`, `telefon`, `email`, `resim`, `unvan`, `bolum_id`, `birim_id`) VALUES
(84, 'Örnek Personel 1', '5347', 'personel1@ornek.edu.tr', 'default-profile.png', 'Doç. Dr.', 45, NULL),
(86, 'Örnek Personel 2', '4352 ', 'personel2@ornek.edu.tr', 'default-profile.png', 'Doç. Dr.', 41, NULL),
(88, 'Örnek Personel 3', '0876', 'personel3@ornek.edu.tr', 'default-profile.png', 'Prof. Dr.', 42, NULL),
(89, 'Örnek Personel 4', '2343', 'personel4@ornek.edu.tr', 'default-profile.png', 'Doç. Dr.', 42, NULL),
(90, 'Örnek Personel 5', '9878', 'personel5@ornek.edu.tr', 'default-profile.png', 'Arş. Gör.', 42, NULL),
(91, 'Örnek Personel 6', '2163', 'personel6@ornek.edu.tr', 'default-profile.png', 'Prof. Dr.', 43, NULL),
(92, 'Örnek Personel 7', '0555 000 0022', NULL, 'default-profile.png', 'Doç. Dr.', 43, NULL),
(93, 'Örnek Personel 8', '0555 000 0023', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 43, NULL),
(94, 'Örnek Personel 9', '0555 000 0031', NULL, 'default-profile.png', 'Prof. Dr.', 44, NULL),
(95, 'Örnek Personel 10', '0555 000 0032', NULL, 'default-profile.png', 'Doç. Dr.', 44, NULL),
(96, 'Örnek Personel 11', '0555 000 0033', NULL, 'default-profile.png', 'Arş. Gör.', 44, NULL),
(97, 'Örnek Personel 12', '0555 000 0061', NULL, 'default-profile.png', 'Prof. Dr.', 46, NULL),
(98, 'Örnek Personel 13', '0555 000 0062', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 46, NULL),
(100, 'Örnek Personel 14', '0555 000 0071', NULL, 'default-profile.png', 'Prof. Dr.', 47, NULL),
(101, 'Örnek Personel 15', '0555 000 0072', NULL, 'default-profile.png', 'Doç. Dr.', 47, NULL),
(102, 'Örnek Personel 16', '0555 000 0073', NULL, 'default-profile.png', 'Öğr. Gör.', 47, NULL),
(103, 'Örnek Personel 17', '0555 000 0081', NULL, 'default-profile.png', 'Prof. Dr.', 48, NULL),
(104, 'Örnek Personel 18', '0555 000 0082', NULL, 'default-profile.png', 'Doç. Dr.', 48, NULL),
(105, 'Örnek Personel 19', '0555 000 0083', NULL, 'default-profile.png', 'Arş. Gör.', 48, NULL),
(106, 'Örnek Personel 20', '0555 000 0001', NULL, 'default-profile.png', 'Prof. Dr.', 41, NULL),
(107, 'Örnek Personel 21', '0555 000 0002', NULL, 'default-profile.png', 'Doç. Dr.', 41, NULL),
(108, 'Örnek Personel 22', '0555 000 0003', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 41, NULL),
(109, 'Örnek Personel 23', '0555 000 0004', NULL, 'default-profile.png', 'Arş. Gör.', 41, NULL),
(110, 'Örnek Personel 24', '0555 000 0005', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 41, NULL),
(111, 'Örnek Personel 25', '0555 000 0006', NULL, 'default-profile.png', 'Doç. Dr.', 41, NULL),
(112, 'Örnek Personel 26', '0555 000 0011', NULL, 'default-profile.png', 'Prof. Dr.', 42, NULL),
(113, 'Örnek Personel 27', '0555 000 0012', NULL, 'default-profile.png', 'Doç. Dr.', 42, NULL),
(114, 'Örnek Personel 28', '0555 000 0013', NULL, 'default-profile.png', 'Arş. Gör.', 42, NULL),
(115, 'Örnek Personel 29', '0555 000 0014', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 42, NULL),
(116, 'Örnek Personel 30', '0555 000 0015', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 42, NULL),
(117, 'Örnek Personel 31', '0555 000 0016', NULL, 'default-profile.png', 'Prof. Dr.', 42, NULL),
(118, 'Örnek Personel 32', '0555 000 0021', NULL, 'default-profile.png', 'Prof. Dr.', 43, NULL),
(119, 'Örnek Personel 33', '0555 000 0022', NULL, 'default-profile.png', 'Doç. Dr.', 43, NULL),
(120, 'Örnek Personel 34', '0555 000 0023', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 43, NULL),
(121, 'Örnek Personel 35', '0555 ', 'personel35@ornek.edu.tr', 'default-profile.png', 'Arş. Gör.', 43, NULL),
(122, 'Örnek Personel 36', '0555 000 0025', NULL, 'default-profile.png', 'Prof. Dr.', 43, NULL),
(123, 'Örnek Personel 37', '0555 000 0031', NULL, 'default-profile.png', 'Prof. Dr.', 44, NULL),
(124, 'Örnek Personel 38', '0555 000 0032', NULL, 'default-profile.png', 'Doç. Dr.', 44, NULL),
(125, 'Örnek Personel 39', '0555 000 0033', NULL, 'default-profile.png', 'Arş. Gör.', 44, NULL),
(126, 'Örnek Personel 40', '0555 000 0034', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 44, NULL),
(127, 'Örnek Personel 41', '0555 000 0035', NULL, 'default-profile.png', 'Prof. Dr.', 44, NULL),
(128, 'Örnek Personel 42', '0555 000 0036', NULL, 'default-profile.png', 'Arş. Gör.', 44, NULL),
(129, 'Örnek Personel 43', '0555 000 0041', NULL, 'default-profile.png', 'Prof. Dr.', 45, NULL),
(130, 'Örnek Personel 44', '0555 000 0042', NULL, 'default-profile.png', 'Doç. Dr.', 45, NULL),
(131, 'Örnek Personel 45', '0555 000 0043', NULL, 'default-profile.png', 'Öğr. Gör.', 45, NULL),
(132, 'Örnek Personel 46', '0555 000 0044', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 45, NULL),
(133, 'Örnek Personel 47', '0555 000 0045', NULL, 'default-profile.png', 'Doç. Dr.', 45, NULL),
(134, 'Örnek Personel 48', '0555 000 0046', NULL, 'default-profile.png', 'Arş. Gör.', 45, NULL),
(135, 'Örnek Personel 49', '0555 000 0061', NULL, 'default-profile.png', 'Prof. Dr.', 46, NULL),
(136, 'Örnek Personel 50', '0555 000 0062', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 46, NULL),
(137, 'Örnek Personel 51', '0555', 'personel51@ornek.edu.tr', 'default-profile.png', 'Arş. Gör.', 46, NULL),
(138, 'Örnek Personel 52', '0555 000 0064', NULL, 'default-profile.png', 'Doç. Dr.', 46, NULL),
(139, 'Örnek Personel 53', '0555 000 0065', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 46, NULL),
(140, 'Örnek Personel 54', '0555 000 0066', NULL, 'default-profile.png', 'Prof. Dr.', 46, NULL),
(141, 'Örnek Personel 55', '0555 000 0071', NULL, 'default-profile.png', 'Prof. Dr.', 47, NULL),
(142, 'Örnek Personel 56', '0555 000 0072', NULL, 'default-profile.png', 'Doç. Dr.', 47, NULL),
(143, 'Örnek Personel 57', '0555 000 0073', NULL, 'default-profile.png', 'Öğr. Gör.', 47, NULL),
(144, 'Örnek Personel 58', '0555 000 0074', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 47, NULL),
(145, 'Örnek Personel 59', '0555 000 0075', NULL, 'default-profile.png', 'Arş. Gör.', 47, NULL),
(146, 'Örnek Personel 60', '0555 000 0076', NULL, 'default-profile.png', 'Prof. Dr.', 47, NULL),
(147, 'Örnek Personel 61', '0555 000 0081', NULL, 'default-profile.png', 'Prof. Dr.', 48, NULL),
(148, 'Örnek Personel 62', '0555 000 0082', NULL, 'default-profile.png', 'Doç. Dr.', 48, NULL),
(149, 'Örnek Personel 63', '0555 000 0083', NULL, 'default-profile.png', 'Arş. Gör.', 48, NULL),
(150, 'Örnek Personel 64', '0555 000 0084', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 48, NULL),
(151, 'Örnek Personel 65', '0555 000 0085', NULL, 'default-profile.png', 'Öğr. Gör.', 48, NULL),
(152, 'Örnek Personel 66', '0555 000 0086', NULL, 'default-profile.png', 'Doç. Dr.', 48, NULL),
(153, 'Örnek Personel 67', '0555 000 0040', NULL, 'default-profile.png', 'Arş. Gör.', 40, NULL),
(154, 'Örnek Personel 68', '0555 000 0041', NULL, 'default-profile.png', 'Doç. Dr.', 40, NULL),
(155, 'Örnek Personel 69', '0555 000 0042', NULL, 'default-profile.png', 'Prof. Dr.', 40, NULL),
(156, 'Örnek Personel 70', '0555 000 0043', NULL, 'default-profile.png', 'Dr. Öğr. Üyesi', 40, NULL),
(157, 'Örnek Personel 71', '0555 ', 'personel71@ornek.edu.tr', 'default-profile.png', 'Arş. Gör.', 40, NULL),
(158, 'Örnek Personel 72', '0555 000 0045', NULL, 'default-profile.png', 'Doç. Dr.', 40, NULL),
(159, 'Örnek Personel 73', '0555 000 0046', NULL, 'default-profile.png', 'Prof. Dr.', 40, NULL),
(160, 'Örnek Personel 74', '0555 000 0047', 'personel74@ornek.edu.tr', 'default-profile.png', 'Dr. Öğr. Üyesi', 40, NULL),
(161, 'Örnek Personel 75', '5423456555', 'personel75@ornek.edu.tr', 'default-profile.png', 'Prof. Dr.', 40, NULL),
(162, 'Örnek Personel 76', '5231434242', 'personel76@ornek.edu.tr', 'default-profile.png', 'Prof. Dr.', 40, NULL),
(163, 'Örnek Personel 77', '5323334334', 'personel77@ornek.edu.tr', 'default-profile.png', 'Prof. Dr.', 42, NULL),
(164, 'Örnek Personel 78', '9886', 'personel78@ornek.edu.tr', 'default-profile.png', 'Prof. Dr.', 44, NULL),
(165, 'Örnek Personel 79', '5433', 'personel79@ornek.edu.tr', 'default-profile.png', 'Doç. Dr.', NULL, 1),
(166, 'Örnek Personel 80', '2134', 'personel80@ornek.edu.tr', 'default-profile.png', 'Arş. Gör.', NULL, 1),
;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) NOT NULL,
  `tc_no` char(11) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `tc_no`, `sifre`) VALUES
(1, 'admin', '12345678901', '$2y$10$g/kJXvOqrtBE.oGenr7wmuEJtv/lgYM/4WQw.QSbkMqohgs0R/XPa');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `birimler`
--
ALTER TABLE `birimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fakulte_id` (`fakulte_id`);

--
-- Tablo için indeksler `fakulteler`
--
ALTER TABLE `fakulteler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kisiler`
--
ALTER TABLE `kisiler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bolum_id` (`bolum_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tc_no` (`tc_no`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `birimler`
--
ALTER TABLE `birimler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `fakulteler`
--
ALTER TABLE `fakulteler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `kisiler`
--
ALTER TABLE `kisiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `bolumler`
--
ALTER TABLE `bolumler`
  ADD CONSTRAINT `bolumler_ibfk_1` FOREIGN KEY (`fakulte_id`) REFERENCES `fakulteler` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `kisiler`
--
ALTER TABLE `kisiler`
  ADD CONSTRAINT `kisiler_ibfk_1` FOREIGN KEY (`bolum_id`) REFERENCES `bolumler` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
