-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 11:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podaci`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivnosti`
--

CREATE TABLE `aktivnosti` (
  `idAktivnosti` int(255) NOT NULL,
  `idProjekta` int(255) NOT NULL,
  `naziv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `opis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktivnosti`
--

INSERT INTO `aktivnosti` (`idAktivnosti`, `idProjekta`, `naziv`, `opis`, `status`) VALUES
(11, 1, 'HTML', 'Završiti HTML kod', 'Gotovo'),
(12, 1, 'PHP', 'Završiti PHP kod', 'Nije početo'),
(21, 2, 'Python', 'Napiši kod u pajtonu', 'U toku'),
(22, 2, 'Seminarski', 'Završi seminarski', 'Nije početo'),
(31, 3, 'Baza', 'Kreirati bazu podataka', 'U toku'),
(111, 11, 'Bezbendost', 'Obezbedi sajt', 'Nije početo'),
(112, 11, 'test', 'test test test', 'U toku');

-- --------------------------------------------------------

--
-- Table structure for table `delegiranje`
--

CREATE TABLE `delegiranje` (
  `idDelegiranja` int(50) NOT NULL,
  `idOsobe` int(50) NOT NULL,
  `idAktivnosti` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delegiranje`
--

INSERT INTO `delegiranje` (`idDelegiranja`, `idOsobe`, `idAktivnosti`) VALUES
(1, 4, 11),
(2, 5, 12),
(3, 4, 21),
(4, 5, 22),
(5, 4, 31),
(6, 5, 111),
(7, 4, 12),
(8, 37, 112);

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

CREATE TABLE `komentari` (
  `idKomentara` int(11) NOT NULL,
  `idAktivnosti` int(11) NOT NULL,
  `komentar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`idKomentara`, `idAktivnosti`, `komentar`) VALUES
(1, 11, 'uskoro gotovo'),
(13, 12, 'Teško je'),
(14, 11, 'test'),
(15, 11, '45yrtb');

-- --------------------------------------------------------

--
-- Table structure for table `nalog`
--

CREATE TABLE `nalog` (
  `idNaloga` int(50) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nalog`
--

INSERT INTO `nalog` (`idNaloga`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'JankoStrkalj', '12345', 'jankokg26@gmail.com', 'Menadžer'),
(3, 'JovanIvosevic', '12345', 'jovan@gmail.com', 'Menadžer'),
(4, 'NovakDjokovic', '12345', 'novak@gmail.com', 'Zaposleni'),
(5, 'NikolaJokic', '12345', 'nikola@gmail.com', 'Zaposleni'),
(37, 'AleksandarMitrovic', '12345', 'aca@gmail.com', 'Zaposleni');

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `komentar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `idOdgovora` int(50) NOT NULL,
  `idKomentara` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`komentar`, `idOdgovora`, `idKomentara`) VALUES
('Bravooo', 2, 1),
('test', 3, 14),
('test3', 23, 14),
('test2', 24, 15),
('Proba', 25, 1),
('jeste', 26, 13);

-- --------------------------------------------------------

--
-- Table structure for table `projekti`
--

CREATE TABLE `projekti` (
  `idProjekta` int(50) NOT NULL,
  `naziv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `lokacija` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sprema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `opis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `benefiti` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `rok_konkursa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projekti`
--

INSERT INTO `projekti` (`idProjekta`, `naziv`, `lokacija`, `sprema`, `opis`, `benefiti`, `rok_konkursa`, `status`) VALUES
(1, 'PIA', 'Kragujevac', 'Osnovne četvorogodišnje akademske studije', 'Aplikacija za upravljanje projektima', 'Dobra ocena', '1.10.2022.', 'U toku'),
(2, 'Softverski inženjering', 'Beograd', 'Srednja škola', 'Napravi matematički kalkulator', 'Kalkulator', '25.3.2022', 'U toku'),
(3, 'Baze podataka', 'Niš', 'Doktor nauka', 'Napraviti bazu podataka za lokalnu biblioteku', 'Novac', '2.5.2022.', 'Završen'),
(11, 'Sajt', 'Subotica', 'Osnovna škola', 'Obezbedi sajt', 'novac', '30.12.2022.', 'Nije početo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivnosti`
--
ALTER TABLE `aktivnosti`
  ADD PRIMARY KEY (`idAktivnosti`);

--
-- Indexes for table `delegiranje`
--
ALTER TABLE `delegiranje`
  ADD PRIMARY KEY (`idDelegiranja`);

--
-- Indexes for table `komentari`
--
ALTER TABLE `komentari`
  ADD PRIMARY KEY (`idKomentara`);

--
-- Indexes for table `nalog`
--
ALTER TABLE `nalog`
  ADD PRIMARY KEY (`idNaloga`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`idOdgovora`);

--
-- Indexes for table `projekti`
--
ALTER TABLE `projekti`
  ADD PRIMARY KEY (`idProjekta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delegiranje`
--
ALTER TABLE `delegiranje`
  MODIFY `idDelegiranja` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `komentari`
--
ALTER TABLE `komentari`
  MODIFY `idKomentara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nalog`
--
ALTER TABLE `nalog`
  MODIFY `idNaloga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `idOdgovora` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `projekti`
--
ALTER TABLE `projekti`
  MODIFY `idProjekta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
