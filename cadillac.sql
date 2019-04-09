-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 09:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cadillac`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE `anketa` (
  `id_anketa` int(3) NOT NULL,
  `opis` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `glasova` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `opis`, `glasova`) VALUES
(1, 'Da', 25),
(2, 'Ne', 3);

-- --------------------------------------------------------

--
-- Table structure for table `anketa1`
--

CREATE TABLE `anketa1` (
  `id_anketa` int(3) NOT NULL,
  `odgovor` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa1`
--

INSERT INTO `anketa1` (`id_anketa`, `odgovor`, `user_id`) VALUES
(1, 'Da', 1),
(2, 'Da', 0),
(3, 'Da', 0),
(4, 'Da', 0),
(5, 'Ne', 0),
(6, 'Ne', 0),
(7, 'Da', 0),
(8, 'Da', 3),
(9, 'Da', 3),
(10, 'Da', 3),
(11, 'Da', 3),
(12, 'Ne', 3),
(13, 'Ne', 3),
(14, 'Da', 3),
(15, 'Da', 3),
(16, 'Da', 3),
(17, 'Da', 3);

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id_galerija` int(3) NOT NULL,
  `slika_proizvod` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_proizvod` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id_galerija`, `slika_proizvod`, `naziv_proizvod`) VALUES
(1, 'img/Cadillac_slider/img01.jpg', ''),
(2, 'img/Cadillac_slider/img02.jpg', ''),
(3, 'img/Cadillac_slider/img04.jpg', ''),
(4, 'img/Cadillac_slider/img03.jpg', ''),
(5, 'img/Cadillac_slider/img05.jpg', ''),
(6, 'img/Cadillac_slider/img06.jpg', ''),
(7, 'img/Cadillac_slider/img07.jpg', ''),
(8, 'img/Cadillac_slider/img08.jpg', ''),
(9, 'img/Cadillac_slider/img09.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id_korisnik` int(4) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sifra` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_uloga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnik`, `ime`, `prezime`, `korisnicko_ime`, `sifra`, `mail`, `id_uloga`) VALUES
(3, 'Nikola', 'Pavlovic', 'pavke123', 'ef962f0c005089c2d05a3940fa053749', 'pavke@gmail.com', 1),
(4, 'Nikola', 'Pusonja', 'puske123', 'd2e45a303804373b70695224f57090ac', 'puske@gmail.com', 2),
(5, 'Nikola', 'Markovic', 'mare123', '582519aa12331efe894ac456a92988b7', 'markoni@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `id_meni` int(3) NOT NULL,
  `link` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `naziv_link` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `link`, `naziv_link`) VALUES
(1, 'index.php', 'Home'),
(2, 'galerija.php', 'Galerija'),
(4, 'kontakt.php', 'Kontakt'),
(5, 'autor.php', 'Autor'),
(6, 'user_profil.php', 'Vas profil'),
(13, 'admin.php', 'Panel');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id_proizvod` int(4) NOT NULL,
  `naziv_proizvod` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cena_proizvod` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id_proizvod`, `naziv_proizvod`, `cena_proizvod`, `putanja`) VALUES
(1, 'cadiiii', '156.000$', 'img/Cadillac_slider/img01.jpg'),
(2, 'cadiiii', '32.000$', 'img/Cadillac_slider/img07.jpg'),
(4, 'cadillac4', '310.000$', 'img/Cadillac_slider/img03.jpg'),
(5, 'cadillac5', '89.000$', 'img/Cadillac_slider/img04.jpg'),
(6, 'cadillac6', '110.000$', 'img/Cadillac_slider/img05.jpg'),
(7, 'cadillac7', '320.000$', 'img/Cadillac_slider/img06.jpg'),
(9, 'cadillac9', '175.000$', 'img/Cadillac_slider/img02.jpg'),
(13, 'cadiiii', '564.000$', 'img/Cadillac_slider/img09.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slajder`
--

CREATE TABLE `slajder` (
  `id_slajder` int(3) NOT NULL,
  `putanja_slike` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slajder`
--

INSERT INTO `slajder` (`id_slajder`, `putanja_slike`) VALUES
(1, 'img/Cadillac_slider/slider2.png'),
(3, 'img/Cadillac_slider/slider3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `id_uloga` int(11) NOT NULL,
  `naziv_uloga` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`id_uloga`, `naziv_uloga`) VALUES
(1, 'user'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
  ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `anketa1`
--
ALTER TABLE `anketa1`
  ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id_galerija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id_korisnik`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id_proizvod`);

--
-- Indexes for table `slajder`
--
ALTER TABLE `slajder`
  ADD PRIMARY KEY (`id_slajder`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
  MODIFY `id_anketa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anketa1`
--
ALTER TABLE `anketa1`
  MODIFY `id_anketa` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id_galerija` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id_korisnik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `id_meni` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id_proizvod` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slajder`
--
ALTER TABLE `slajder`
  MODIFY `id_slajder` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
