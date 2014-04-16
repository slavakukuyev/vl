-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2014 at 10:27 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vl`
--
CREATE DATABASE IF NOT EXISTS `vl` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `vl`;

-- --------------------------------------------------------

--
-- Table structure for table `actormovie`
--

CREATE TABLE IF NOT EXISTS `actormovie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movieid` int(11) NOT NULL,
  `actorid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `movieid` (`movieid`,`actorid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Dumping data for table `actormovie`
--

INSERT INTO `actormovie` (`id`, `movieid`, `actorid`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 3, 7),
(8, 3, 8),
(9, 3, 9),
(10, 4, 10),
(11, 4, 11),
(12, 4, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15),
(16, 6, 16),
(17, 6, 17),
(18, 6, 18),
(19, 7, 14),
(20, 7, 19),
(21, 7, 20),
(22, 8, 21),
(23, 8, 22),
(24, 8, 23),
(25, 9, 9),
(26, 9, 24),
(27, 9, 25),
(28, 10, 26),
(29, 10, 27),
(30, 10, 28),
(31, 11, 29),
(32, 11, 30),
(33, 11, 31),
(34, 12, 32),
(35, 12, 33),
(36, 12, 34),
(37, 13, 35),
(38, 13, 36),
(39, 13, 37),
(40, 14, 38),
(41, 14, 39),
(42, 14, 40),
(44, 15, 26),
(43, 15, 41),
(45, 15, 42),
(46, 16, 43),
(47, 16, 44),
(48, 16, 45),
(49, 17, 46),
(50, 17, 47),
(51, 17, 48),
(52, 18, 49),
(53, 18, 50),
(54, 18, 51),
(55, 19, 52),
(56, 19, 53),
(57, 19, 54),
(58, 20, 55),
(59, 20, 56),
(60, 20, 57),
(61, 21, 9),
(62, 21, 58),
(63, 21, 59),
(64, 22, 60),
(65, 22, 61),
(66, 22, 62);

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imgUrl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yearbirth` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullname` (`fullname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `fullname`, `imgUrl`, `yearbirth`) VALUES
(1, 'Ben Affleck', 'http://ia.media-imdb.com/images/M/MV5BMTI4MzIxMTk0Nl5BMl5BanBnXkFtZTcwOTU5NjA0Mg@@._V1._SX214_CR0,0,214,314_.jpg', 1972),
(2, 'Bryan Cranston', 'http://ia.media-imdb.com/images/M/MV5BMTA2NjEyMTY4MTVeQTJeQWpwZ15BbWU3MDQ5NDAzNDc@._V1._SX214_CR0,0,214,314_.jpg', 1956),
(3, 'John Goodman', 'http://ia.media-imdb.com/images/M/MV5BMjI2MTIzODQ1M15BMl5BanBnXkFtZTcwNjI4Mzc1OA@@._V1._SY314_CR4,0,214,314_.jpg', 1956),
(4, 'Sam Worthington', 'http://ia.media-imdb.com/images/M/MV5BMTc5NTMyMjIwMV5BMl5BanBnXkFtZTcwNTMyNjYwMw@@._V1._SY314_CR5,0,214,314_.jpg', 1976),
(5, 'Zoe Saldana', 'http://ia.media-imdb.com/images/M/MV5BMjA4NDk1NTA1OV5BMl5BanBnXkFtZTcwMTIzMjQ4Ng@@._V1._SY314_CR7,0,214,314_.jpg', 1978),
(6, 'Sigourney Weaver', 'http://ia.media-imdb.com/images/M/MV5BMTk1MTcyNTE3OV5BMl5BanBnXkFtZTcwMTA0MTMyMw@@._V1._SY314_CR11,0,214,314_.jpg', 1949),
(7, 'Jamie Foxx', 'http://ia.media-imdb.com/images/M/MV5BMjAyMDMwNzkxMV5BMl5BanBnXkFtZTcwNzg4Nzg4Mg@@._V1._SY314_CR5,0,214,314_.jpg', 1967),
(8, 'Christoph Waltz', 'http://ia.media-imdb.com/images/M/MV5BMTM4MDk3OTYxOF5BMl5BanBnXkFtZTcwMDk5OTUwOQ@@._V1._SY314_CR8,0,214,314_.jpg', 1956),
(9, 'Leonardo DiCaprio', 'http://ia.media-imdb.com/images/M/MV5BMjI0MTg3MzI0M15BMl5BanBnXkFtZTcwMzQyODU2Mw@@._V1._SY314_CR9,0,214,314_.jpg', 1974),
(10, 'Ellen Burstyn', 'http://ia.media-imdb.com/images/M/MV5BMTU4MjYxMDc3MF5BMl5BanBnXkFtZTYwNzU3MDIz._V1._SX214_CR0,0,214,314_.jpg', 1932),
(11, 'Max von Sydow', 'http://ia.media-imdb.com/images/M/MV5BMTI3MDQzOTMwN15BMl5BanBnXkFtZTYwMDgyMjM1._V1._SY314_CR1,0,214,314_.jpg', 1929),
(12, 'Linda Blair', 'http://ia.media-imdb.com/images/M/MV5BMTYxNzMxMTMwMV5BMl5BanBnXkFtZTYwODM3MTI0._V1._SX214_CR0,0,214,314_.jpg', 1959),
(13, 'Brad Pitt', 'http://ia.media-imdb.com/images/M/MV5BMjA1MjE2MTQ2MV5BMl5BanBnXkFtZTcwMjE5MDY0Nw@@._V1._SX214_CR0,0,214,314_.jpg', 1963),
(14, 'Edward Norton', 'http://ia.media-imdb.com/images/M/MV5BMTYwNjQ5MTI1NF5BMl5BanBnXkFtZTcwMzU5MTI2Mw@@._V1._SY314_CR15,0,214,314_.jpg', 1969),
(15, 'Helena Bonham Carter', 'http://ia.media-imdb.com/images/M/MV5BMTUzMzUzMDg5MV5BMl5BanBnXkFtZTcwMDA5NDMwNA@@._V1._SY314_CR3,0,214,314_.jpg', 1966),
(16, 'Russell Crowe', 'http://ia.media-imdb.com/images/M/MV5BMTQyMTExNTMxOF5BMl5BanBnXkFtZTcwNDg1NzkzNw@@._V1._SX214_CR0,0,214,314_.jpg', 1964),
(17, 'Joaquin Phoenix', 'http://ia.media-imdb.com/images/M/MV5BNzAzNjg5MDE3N15BMl5BanBnXkFtZTcwMjIxNzU0OA@@._V1._SX214_CR0,0,214,314_.jpg', 1974),
(18, 'Connie Nielsen', 'http://ia.media-imdb.com/images/M/MV5BMTIwMDQ3NjIzMV5BMl5BanBnXkFtZTYwOTMwMDA0._V1._SX214_CR0,0,214,314_.jpg', 1965),
(19, 'Edward Furlong', 'http://ia.media-imdb.com/images/M/MV5BMTI1MzgxODkyMl5BMl5BanBnXkFtZTcwNTc1NDIzMQ@@._V1._SY314_CR5,0,214,314_.jpg', 1977),
(20, 'Beverly D''Angelo', 'http://ia.media-imdb.com/images/M/MV5BMTMyNTk4ODU5NV5BMl5BanBnXkFtZTcwODU0OTgwMw@@._V1._SY314_CR5,0,214,314_.jpg', 1951),
(21, 'Macaulay Culkin', 'http://ia.media-imdb.com/images/M/MV5BODQwNDMxODI1M15BMl5BanBnXkFtZTYwNTE1NDM0._V1._SX214_CR0,0,214,314_.jpg', 1980),
(22, 'Joe Pesci', 'http://ia.media-imdb.com/images/M/MV5BMzc3MTcxNDYxNV5BMl5BanBnXkFtZTcwOTI3NjE1Mw@@._V1._SX214_CR0,0,214,314_.jpg', 1943),
(23, 'Daniel Stern', 'http://ia.media-imdb.com/images/M/MV5BMTI3NTcwNDcxMF5BMl5BanBnXkFtZTcwMTI3Mjc4Mg@@._V1._SY314_CR9,0,214,314_.jpg', 1957),
(24, 'Joseph Gordon-Levitt', 'http://ia.media-imdb.com/images/M/MV5BMTQzOTg0NTkzNF5BMl5BanBnXkFtZTcwNTQ4MTcwOQ@@._V1._SY314_CR34,0,214,314_.jpg', 1981),
(25, 'Ellen Page', 'http://ia.media-imdb.com/images/M/MV5BMTU3MzM3MDYzMV5BMl5BanBnXkFtZTcwNzk1Mzc3NA@@._V1._SX214_CR0,0,214,314_.jpg', 1987),
(26, 'Uma Thurman', 'http://ia.media-imdb.com/images/M/MV5BNzk3NTUyOTMyNl5BMl5BanBnXkFtZTcwMjQzNDcwMg@@._V1._SY314_CR2,0,214,314_.jpg', 1970),
(27, 'David Carradine', 'http://ia.media-imdb.com/images/M/MV5BMTQ2MDM1NjcwOV5BMl5BanBnXkFtZTYwNzUwMDIz._V1._SY314_CR0,0,214,314_.jpg', 1936),
(28, 'Daryl Hannah', 'http://ia.media-imdb.com/images/M/MV5BNTQ2MTYyOTA4OV5BMl5BanBnXkFtZTcwMTI2MjM3Nw@@._V1._SX214_CR0,0,214,314_.jpg', 1960),
(29, 'Jean Reno', 'http://ia.media-imdb.com/images/M/MV5BMTgzNjA1MjY2M15BMl5BanBnXkFtZTYwMjgzOTk0._V1._SX214_CR0,0,214,314_.jpg', 1948),
(30, 'Gary Oldman', 'http://ia.media-imdb.com/images/M/MV5BMTc3NTM4MzQ5MV5BMl5BanBnXkFtZTcwOTE4MDczNw@@._V1._SX214_CR0,0,214,314_.jpg', 1958),
(31, 'Natalie Portman', 'http://ia.media-imdb.com/images/M/MV5BMTQ3ODE3Mjg1NV5BMl5BanBnXkFtZTcwNzA4ODcxNA@@._V1._SY314_CR10,0,214,314_.jpg', 1981),
(32, 'Keanu Reeves', 'http://ia.media-imdb.com/images/M/MV5BNjUxNDcwMTg4Ml5BMl5BanBnXkFtZTcwMjU4NDYyOA@@._V1._SY314_CR14,0,214,314_.jpg', 1964),
(33, 'Laurence Fishburne', 'http://ia.media-imdb.com/images/M/MV5BMTc0NjczNDc1MV5BMl5BanBnXkFtZTYwMDU0Mjg1._V1._SX214_CR0,0,214,314_.jpg', 1961),
(34, 'Carrie-Anne Moss', 'http://ia.media-imdb.com/images/M/MV5BMTYxMjgwNzEwOF5BMl5BanBnXkFtZTcwNTQ0NzI5Ng@@._V1._SY314_CR11,0,214,314_.jpg', 1967),
(35, 'Suraj Sharma', 'http://ia.media-imdb.com/images/M/MV5BMjI0MDU5NTM1OF5BMl5BanBnXkFtZTcwNDQ0MDYwOQ@@._V1._SX214_CR0,0,214,314_.jpg', 1993),
(36, 'Irrfan Khan', 'http://ia.media-imdb.com/images/M/MV5BNDg3NDgxNzY4NF5BMl5BanBnXkFtZTcwODMxODQzMg@@._V1._SY314_CR10,0,214,314_.jpg', 1967),
(37, 'Adil Hussain', 'http://ia.media-imdb.com/images/M/MV5BMjE3OTAyNDU1Nl5BMl5BanBnXkFtZTcwMzI1MzUxOQ@@._V1._SY314_CR5,0,214,314_.jpg', 1963),
(38, 'Anthony Perkins', 'http://ia.media-imdb.com/images/M/MV5BMTIzMTUyMTYxM15BMl5BanBnXkFtZTYwNzE5OTI2._V1._SY314_CR19,0,214,314_.jpg', 1932),
(39, 'Janet Leigh', 'http://ia.media-imdb.com/images/M/MV5BMjU3MjY5OTE0MF5BMl5BanBnXkFtZTYwMzUyMDY2._V1._SY314_CR2,0,214,314_.jpg', 1927),
(40, 'Vera Miles', 'http://ia.media-imdb.com/images/M/MV5BMTgwOTY2MTk4MF5BMl5BanBnXkFtZTcwMTAwNjYwNA@@._V1._SY314_CR15,0,214,314_.jpg', 1929),
(41, 'John Travolta', 'http://ia.media-imdb.com/images/M/MV5BMTUwNjQ0ODkxN15BMl5BanBnXkFtZTcwMDc5NjQwNw@@._V1._SY314_CR10,0,214,314_.jpg', 1954),
(42, 'Samuel L. Jackson', 'http://ia.media-imdb.com/images/M/MV5BMTQ1NTQwMTYxNl5BMl5BanBnXkFtZTYwMjA1MzY1._V1._SX214_CR0,0,214,314_.jpg', 1948),
(43, 'Tim Robbins', 'http://ia.media-imdb.com/images/M/MV5BMTI1OTYxNzAxOF5BMl5BanBnXkFtZTYwNTE5ODI4._V1._SY314_CR15,0,214,314_.jpg', 1958),
(44, 'Morgan Freeman', 'http://ia.media-imdb.com/images/M/MV5BMTc0MDMyMzI2OF5BMl5BanBnXkFtZTcwMzM2OTk1MQ@@._V1._SX214_CR0,0,214,314_.jpg', 1937),
(45, 'Bob Gunton', 'http://ia.media-imdb.com/images/M/MV5BMTc3MzY0MTQzM15BMl5BanBnXkFtZTcwMTM0ODYxNw@@._V1._SY314_CR89,0,214,314_.jpg', 1945),
(46, 'George Clooney', 'http://ia.media-imdb.com/images/M/MV5BMjEyMTEyOTQ0MV5BMl5BanBnXkFtZTcwNzU3NTMzNw@@._V1._SY314_CR8,0,214,314_.jpg', 1961),
(47, 'Natascha McElhone', 'http://ia.media-imdb.com/images/M/MV5BMjIyODk3ODI5OF5BMl5BanBnXkFtZTcwNDY1NDIwOQ@@._V1._SY314_CR97,0,214,314_.jpg', 1969),
(48, 'Ulrich Tukur', 'http://ia.media-imdb.com/images/M/MV5BMTI4MDMwNTkzOF5BMl5BanBnXkFtZTcwMjY0OTk2Mg@@._V1._SY314_CR171,0,214,314_.jpg', 1957),
(49, 'Chris Pine', 'http://ia.media-imdb.com/images/M/MV5BMTM4OTQ4NTU3NV5BMl5BanBnXkFtZTcwNjEwNDU0OQ@@._V1._SX214_CR0,0,214,314_.jpg', 1980),
(50, 'Zachary Quinto', 'http://ia.media-imdb.com/images/M/MV5BMTQ3MjEzOTU4MV5BMl5BanBnXkFtZTcwMjMwMTY0Mg@@._V1._SY314_CR14,0,214,314_.jpg', 1977),
(51, 'Simon Pegg', 'http://ia.media-imdb.com/images/M/MV5BMjI3Nzk0MDAzOF5BMl5BanBnXkFtZTcwNTMwNDU0OQ@@._V1._SX214_CR0,0,214,314_.jpg', 1970),
(52, 'Arnold Schwarzenegger', 'http://ia.media-imdb.com/images/M/MV5BMTI3MDc4NzUyMV5BMl5BanBnXkFtZTcwMTQyMTc5MQ@@._V1._SY314_CR18,0,214,314_.jpg', 1947),
(53, 'Linda Hamilton', 'http://ia.media-imdb.com/images/M/MV5BMjE4NTk0Mzg0MF5BMl5BanBnXkFtZTYwMzU5NjM0._V1._SY314_CR3,0,214,314_.jpg', 1956),
(54, 'Michael Biehn', 'http://ia.media-imdb.com/images/M/MV5BMTQwNDk0NjU4OV5BMl5BanBnXkFtZTcwNzIyMzYwOA@@._V1._SX214_CR0,0,214,314_.jpg', 1956),
(55, 'Ashton Kutcher', 'http://ia.media-imdb.com/images/M/MV5BMTM5Mjc2MzMzMl5BMl5BanBnXkFtZTcwOTA5OTIxNw@@._V1._SX214_CR0,0,214,314_.jpg', 1978),
(56, 'Amy Smart', 'http://ia.media-imdb.com/images/M/MV5BMTY2Njc4NDA2N15BMl5BanBnXkFtZTcwOTQ1NDUwMw@@._V1._SY314_CR25,0,214,314_.jpg', 1976),
(57, 'Melora Walters', 'http://ia.media-imdb.com/images/M/MV5BMTkwMzcyMDc3NF5BMl5BanBnXkFtZTcwNTYxMTA0NQ@@._V1._SY314_CR5,0,214,314_.jpg', 1960),
(58, 'Kate Winslet', 'http://ia.media-imdb.com/images/M/MV5BODgzMzM2NTE0Ml5BMl5BanBnXkFtZTcwMTcyMTkyOQ@@._V1._SX214_CR0,0,214,314_.jpg', 1975),
(59, 'Billy Zane', 'http://ia.media-imdb.com/images/M/MV5BMTI5NzA2NTE0NF5BMl5BanBnXkFtZTcwNzAxMTUxMw@@._V1._SY314_CR14,0,214,314_.jpg', 1966),
(60, 'Edward Asner', 'http://ia.media-imdb.com/images/M/MV5BMTk0MDI4ODk5NF5BMl5BanBnXkFtZTcwMzg3ODQ3MQ@@._V1._SY314_CR1,0,214,314_.jpg', 1929),
(61, 'Jordan Nagai', 'http://ia.media-imdb.com/images/M/MV5BMTQ0NjczNDczNl5BMl5BanBnXkFtZTcwMDMwMTc1Mg@@._V1._SY314_CR16,0,214,314_.jpg', 200),
(62, 'John Ratzenberger', 'http://ia.media-imdb.com/images/M/MV5BMTYwNjY3ODI4Nl5BMl5BanBnXkFtZTcwNDc3OTYyMQ@@._V1._SY314_CR5,0,214,314_.jpg', 1947);

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `fulladdress` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(3, 'Crime'),
(4, 'Animation'),
(5, 'History'),
(6, 'Fantasy'),
(7, 'Drama'),
(8, 'Romance'),
(9, 'Adventure'),
(10, 'Sci-Fi'),
(11, 'Western'),
(14, 'Horror'),
(15, 'Family'),
(17, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `imgUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vidUrl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categories` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `copies` int(11) NOT NULL DEFAULT '1',
  `instock` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `about`, `year`, `imgUrl`, `vidUrl`, `added`, `categories`, `price`, `copies`, `instock`) VALUES
(1, 'Argo', 'Acting under the cover of a Hollywood producer scouting a location for a science fiction film, a CIA agent launches a dangerous operation to rescue six Americans in Tehran during the U.S. hostage crisis in Iran in 1980.', 2012, 'http://ia.media-imdb.com/images/M/MV5BMTc3MjI0MjM0NF5BMl5BanBnXkFtZTcwMTYxMTQ1OA@@._V1_SY317_CR0,0,214,317_.jpg', '//www.youtube.com/embed/w918Eh3fij0', '0000-00-00 00:00:00', 'Comedy, Family', 50, 0, 0),
(2, 'Avatar', 'Avatar is a science fiction film written and directed by James Cameron, starring Sam Worthington, Zoë Saldaña, Stephen Lang, Michelle Rodriguez, and Sigourney Weaver. It was made by Lightstorm Entertainment and released by 20th Century Fox on December 18, 2009. The film is set in the year 2154 on Pandora, a fictional Earth-like moon in a distant planetary system. Humans are engaged in mining Pandora''s reserves of a precious mineral known as unobtanium, while the Na''vi — the sapient and sentient race of humanoids indigenous to the moon — resist the colonists'' expansion, which threatens the continued existence of the Na''vi and the Pandoran ecosystem. The film''s title refers to the remotely controlled, genetically engineered human-Na''vi bodies used by the film''s human characters to interact with the indigenous population.', 2009, 'http://ia.media-imdb.com/images/M/MV5BMTYwOTEwNjAzMl5BMl5BanBnXkFtZTcwODc5MTUwMw@@._V1_SY317_CR0,0,214,317_.jpg', '//www.youtube.com/embed/d1_JBMrrYw8', '2013-08-13 00:24:08', 'Action, Adventure, Fantasy', 25, 0, 0),
(3, 'Django Unchained', 'Django Unchained /ˈdʒæŋɡoʊ/ is a 2012 American western film written and directed by Quentin Tarantino. The film stars Jamie Foxx, Christoph Waltz, Leonardo DiCaprio, Kerry Washington, and Samuel L. Jackson. The film was released on December 25, 2012 (Christmas Day), in North America.[5][6]\nSet in the antebellum era of the Deep South and Old West, the film follows a freed slave (Foxx) who treks across the United States with a bounty hunter (Waltz) on a mission to rescue his wife (Washington) from a cruel plantation owner (DiCaprio).\nThe film received very positive reviews from critics and was nominated for five Academy Awards including Best Picture. Christoph Waltz received several accolades for his performance, and won the Golden Globe, the BAFTA and his second Academy Award for Best Supporting Actor. His first win was for another Tarantino film, 2009''s Inglourious Basterds; Waltz is one of the few actors to win more than once in this category.[7] Tarantino won the Academy Award for Best Original Screenplay, his second Oscar in this category for which he first won in 1995 for co-writing Pulp Fiction, as well as the Golden Globe and the BAFTA. The film grossed over $423 million in theaters worldwide, making it Tarantino''s highest grossing film to date.', 2012, 'http://ia.media-imdb.com/images/M/MV5BMjIyNTQ5NjQ1OV5BMl5BanBnXkFtZTcwODg1MDU4OA@@._V1_SX214_.jpg', '//www.youtube.com/embed/eUdM9vrCbow', '2013-08-19 06:37:39', 'Adventure, Drama, Western', 10, 0, 0),
(4, 'Exorcist', 'The Exorcist is a 1973 American supernatural horror film directed by William Friedkin, adapted by William Peter Blatty from his 1971 novel of the same name. The book, inspired by the 1949 exorcism case of Roland Doe,[3][4] deals with the demonic possession of a 12-year-old girl and her mother''s desperate attempts to win back her child through an exorcism conducted by two priests.\r\nThe film features Ellen Burstyn, Max von Sydow, Jason Miller, Lee J. Cobb, Linda Blair, and (in voice only) Mercedes McCambridge. It is one of a cycle of "demonic child" films produced from the late 1960s to the mid-1970s, including Rosemary''s Baby and The Omen.\r\nThe Exorcist was released theatrically in the United States by Warner Bros. on December 26, 1973. The film earned 10 Academy Award nominations, winning two (Best Sound Mixing and Best Adapted Screenplay), and losing Best Picture to The Sting. It became one of the highest-grossing films of all time, grossing over $441 million worldwide. It is also the first horror film to be nominated for Best Picture.\r\nThe film has had a significant influence on popular culture.[5][6] It was named the scariest film of all time by Entertainment Weekly[7] and Movies.com[8] and by viewers of AMC in 2006, and was No. 3 on Bravo''s The 100 Scariest Movie Moments.[9][dead link] In 2010, the Library of Congress selected the film to be preserved as part of its National Film Registry.[10][11] In 2003, it was placed at No. 2 in Channel 4''s The 100 Greatest Scary Moments in the United Kingdom.', 1973, 'http://ia.media-imdb.com/images/M/MV5BNzYwMDA0NTA3M15BMl5BanBnXkFtZTcwMDcwNDY3Mg@@._V1_SY317_CR0,0,214,317_.jpg', '//www.youtube.com/embed/0iS59iV2Ffs', '0000-00-00 00:00:00', 'Horror', 25, 0, 0),
(5, 'Fight Club', 'Fight Club is a 1999 American film based on the 1996 novel of the same name by Chuck Palahniuk. The film was directed by David Fincher and stars Edward Norton, Brad Pitt, and Helena Bonham Carter. Norton plays the unnamed protagonist, an "everyman" who is discontented with his white-collar job. He forms a "fight club" with soap maker Tyler Durden, played by Pitt, and they are joined by men who also want to fight recreationally. The narrator becomes embroiled in a relationship with him and a dissolute woman, Marla Singer, played by Bonham Carter.\r\nPalahniuk''s novel was optioned by 20th Century Fox producer Laura Ziskin, who hired Jim Uhls to write the film adaptation. Fincher was one of four directors the producers considered. They hired him because of his enthusiasm for the film. Fincher developed the script with Uhls and sought screenwriting advice from the cast and others in the film industry. The director and the cast compared the film to Rebel Without a Cause (1955) and The Graduate (1967). Fincher intended Fight Club''s violence to serve as a metaphor for the conflict between a generation of young people and the value system of advertising. The director copied the homoerotic overtones from Palahniuk''s novel to make audiences uncomfortable and keep them from anticipating the twist ending.[1]\r\nStudio executives did not like the film and they restructured Fincher''s intended marketing campaign to try to reduce anticipated losses. Fight Club failed to meet the studio''s expectations at the box office and received polarized reactions from critics. It was cited as one of the most controversial and talked-about films of 1999. However, the film later found commercial success with its DVD release, which established Fight Club as a cult film. Critical reception of Fight Club has since become more positive.\r\nIn 2008, Fight Club was named the 10th greatest movie of all time by Empire magazine in its issue of The 500 Greatest Movies of All Time.', 1999, 'http://ia.media-imdb.com/images/M/MV5BMjIwNTYzMzE1M15BMl5BanBnXkFtZTcwOTE5Mzg3OA@@._V1_SX214_.jpg', '//www.youtube.com/embed/SUXWAEX2jlg', '2013-07-17 07:27:42', 'Drama, Action', 25, 0, 0),
(6, 'Gladiator', 'Gladiator is a 2000 British-American epic historical drama film directed by Ridley Scott, starring Russell Crowe, Joaquin Phoenix, Connie Nielsen, Ralf Möller, Oliver Reed (in his final film role), Djimon Hounsou, Derek Jacobi, John Shrapnel, and Richard Harris. Crowe portrays the fictional character, loyal Roman general Maximus Decimus Meridius, who is betrayed when the emperor''s ambitious son, Commodus, murders his father and seizes the throne. Reduced to slavery, Maximus rises through the ranks of the gladiatorial arena to avenge the murder of his family and his emperor.\r\nReleased in the United States on May 5, 2000, Gladiator was a box office success, receiving positive reviews, and was credited with rekindling interest in the historical epic. The film was nominated for and won multiple awards, notably five Academy Awards in the 73rd Academy Awards including Best Picture and Best Actor for Crowe.', 2000, 'http://ia.media-imdb.com/images/M/MV5BNTQ2NzI0ODc5MV5BMl5BanBnXkFtZTcwMTA0MTk3OA@@._V1_SX214_.jpg', '//www.youtube.com/embed/ol67qo3WhJk', '2013-08-21 21:00:00', 'Action, Adventure, Drama', 25, 0, 0),
(7, 'American History X', 'American History X is a 1998 American drama film directed by Tony Kaye from a screenplay written by David McKenna, starring Edward Norton and Edward Furlong. It was distributed by New Line Cinema.\r\nThe film tells the story of two brothers, Derek Vinyard (Norton) and Daniel "Danny" Vinyard (Furlong) of Venice, Los Angeles, California. Both are intelligent and charismatic students. Their father, a firefighter, is murdered by a black drug dealer while trying to extinguish a fire in South Los Angeles, and Derek is drawn into the Neo-Nazi movement. Derek brutally kills two black gang members whom he catches breaking into the truck left to him by his father, and is sentenced to three years in prison for voluntary manslaughter. The story shows how Danny is influenced by his older brother''s actions and ideology and how Derek, now radically changed by his experience in incarceration, which includes violent rape by white neo-Nazi inmates, tries to prevent his brother from going down the same path as he did. The film is told in the style of nonlinear narrative.\r\nShooting took place in Los Angeles, California. The film was released in the United States on October 30, 1998 and went on to gross over $23 million at the international box office. It was given an "R" rating by the MPAA for "graphic brutal violence including rape, pervasive language, strong sexuality and nudity".\r\nCritics mostly praised the film and Edward Norton''s performance, which earned him an Academy Award nomination for Best Actor. It was also named by Empire magazine in September 2008 as the 311th Greatest Movie of All Time.[2]', 1998, 'http://ia.media-imdb.com/images/M/MV5BMjMzNDUwNTIyMF5BMl5BanBnXkFtZTcwNjMwNDg3OA@@._V1_SY317_CR17,0,214,317_.jpg', '//www.youtube.com/embed/jXaZENPQrsw', '0000-00-00 00:00:00', 'Crime, Drama', 20, 0, 0),
(8, 'Home Alone', 'Home Alone is a 1990 American family comedy film written and produced by John Hughes and directed by Chris Columbus. The film stars Macaulay Culkin as Kevin McCallister, an eight-year-old boy, who is mistakenly left behind when his family flies to Paris for their Christmas vacation. While initially relishing time by himself, he is later greeted by two would-be burglars played by Daniel Stern and Joe Pesci. The film also features Catherine O''Hara and John Heard as Kevin''s parents. As of 2009, Home Alone was the highest-grossing comedy of all time.[2]', 1990, 'http://ia.media-imdb.com/images/M/MV5BMTUzMzg4MTg2M15BMl5BanBnXkFtZTYwNDM4OTk4._V1_SY317_CR6,0,214,317_.jpg', '//www.youtube.com/embed/CK2Btk6Ybm0', '0000-00-00 00:00:00', 'Comedy, Family', 18, 0, 0),
(9, 'Inception', 'Inception is a 2010 science fiction film written, co-produced, and directed by Christopher Nolan. The film stars a large ensemble cast that includes Leonardo DiCaprio, Ken Watanabe, Joseph Gordon-Levitt, Marion Cotillard, Ellen Page, Tom Hardy, Dileep Rao, Cillian Murphy, Tom Berenger, and Michael Caine. DiCaprio plays Dom Cobb, a thief who commits corporate espionage by infiltrating the subconscious of his targets. He is offered a chance to regain his old life as payment for a task considered to be impossible: "inception", the implantation of another person''s idea into a target''s subconscious.[6]\r\nShortly after finishing Insomnia (2002), Nolan wrote an 80-page treatment about "dream stealers" envisioning a horror film inspired by lucid dreaming and presented the idea to Warner Bros. Feeling he needed to have more experience with large-scale film production, Nolan retired the project and instead worked on Batman Begins (2005), The Prestige (2006), and The Dark Knight (2008).[7] He spent six months revising the script before Warner Bros. purchased it in February 2009.[8] Inception was filmed in six countries and four continents, beginning in Tokyo on June 19, 2009, and finishing in Canada on November 22, 2009.[9] Its official budget was US$160 million; a cost which was split between Warner Bros and Legendary Pictures.[4] Nolan''s reputation and success with The Dark Knight helped secure the film''s $100 million in advertising expenditure, with most of the publicity involving viral marketing.\r\nInception''s première was held in London on July 8, 2010; its wide release to both conventional and IMAX theaters began on July 16, 2010.[10][11] A box office success, Inception has grossed over $800 million worldwide becoming the 36th highest-grossing film of all time.[5] The home video market also had strong results, with $68 million in DVD sales. Inception has received wide critical acclaim and numerous critics have praised its originality, cast, score, and visual effects.[12] It won Academy Awards for Best Cinematography, Best Sound Editing, Best Sound Mixing, and Best Visual Effects, and was nominated for four more: Best Picture, Best Original Score, Best Art Direction, and Best Original Screenplay.', 2010, 'http://ia.media-imdb.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX214_.jpg', '//www.youtube.com/embed/66TuSJo4dZM', '0000-00-00 00:00:00', 'Action, Adventure, Mystery', 49, 0, 0),
(10, 'Kill Bill', 'Kill Bill is an American action/thriller film written and directed by Quentin Tarantino. Kill Bill was originally scheduled for a single theatrical release, but with a running time of over four hours, it was separated into two movies: Kill Bill Volume 1, released in late 2003, and Kill Bill Volume 2, released in early 2004. A third installment was planned for the year 2014,[1] but in a 2012 interview from Tarantino, concerning Kill Bill: Vol. 3, he remarked, "we''ll see, probably not".', 2004, 'http://ia.media-imdb.com/images/M/MV5BMTU1NDg1Mzg4M15BMl5BanBnXkFtZTYwMDExOTc3._V1_SX214_.jpg', '//www.youtube.com/embed/-czwy-aVbbU', '2013-08-21 21:00:00', 'Action, Crime', 27, 0, 0),
(11, 'Léon: The Professional', 'Léon: The Professional (French: Léon; Original U.S.: The Professional) is a 1994 English-language French thriller film written and directed by Luc Besson. The film stars Jean Reno as the titular mob hitman; Gary Oldman as corrupt DEA agent Norman Stansfield; a young Natalie Portman, in her feature film debut, as Mathilda, a 12-year-old girl who is taken in by the hitman after her family is murdered; and Danny Aiello as Tony, the mobster who gives the hitman his assignments.', 1994, 'http://ia.media-imdb.com/images/M/MV5BMTgzMzg4MDkwNF5BMl5BanBnXkFtZTcwODAwNDg3OA@@._V1_SY317_CR4,0,214,317_.jpg', '//www.youtube.com/embed/DcsirofJrlM', '0000-00-00 00:00:00', 'Crime, Drama, Thriller', 25, 0, 0),
(12, 'The Matrix', 'The Matrix is a 1999 American–Australian science fiction action film written and directed by The Wachowski Brothers, and starring Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss, Joe Pantoliano, and Hugo Weaving. It depicts a dystopian future in which reality as perceived by most humans is actually a simulated reality called "the Matrix", created by sentient machines to subdue the human population, while their bodies'' heat and electrical activity are used as an energy source. Computer programmer "Neo" learns this truth and is drawn into a rebellion against the machines, which involves other people who have been freed from the "dream world".\r\nThe Matrix is known for popularizing a visual effect known as "bullet time", in which the heightened perception of certain characters is represented by allowing the action within a shot to progress in slow-motion while the camera''s viewpoint appears to move through the scene at normal speed. The film is an example of the cyberpunk science fiction genre.[3] It contains numerous references to philosophical and religious ideas, and prominently pays homage to works such as Jean Baudrillard''s Simulacra and Simulation[4] and Lewis Carroll''s Alice''s Adventures in Wonderland. The Wachowskis'' approach to action scenes drew upon their admiration for Japanese animation[5] and martial arts films, and the film''s use of fight choreographers and wire fu techniques from Hong Kong action cinema was influential upon subsequent Hollywood action film productions.\r\nThe Matrix was first released in the United States on March 31, 1999, and grossed over $460 million worldwide. It was generally well-received by critics,[6][7] and won four Academy Awards as well as other accolades including BAFTA Awards and Saturn Awards. Reviewers praised The Matrix for its innovative visual effects, cinematography and its entertainment. The film''s premise was both criticized for being derivative of earlier science fiction works, and praised for being intriguing. The action also polarized critics, some describing it as impressive, but others dismissing it as a trite distraction from an interesting premise.\r\nDespite this, the film has since appeared in lists of the greatest science fiction films,[8][9][10] and in 2012, was added to the National Film Registry for preservation.[11] The success of the film led to the release of two feature film sequels, both written and directed by the Wachowskis, The Matrix Reloaded and The Matrix Revolutions. The Matrix franchise was further expanded through the production of comic books, video games, and animated short films in which the Wachowskis were heavily involved.', 1999, 'http://ia.media-imdb.com/images/M/MV5BMjEzNjg1NTg2NV5BMl5BanBnXkFtZTYwNjY3MzQ5._V1_SY317_CR6,0,214,317_.jpg', '//www.youtube.com/embed/m8e-FF8MsqU', '2013-08-01 06:29:33', 'Action, Adventure, Sci-Fi ', 20, 0, 0),
(13, 'Life of Pi', 'Life of Pi is a fantasy adventure novel by Yann Martel published in 2001. The protagonist, Piscine Molitor "Pi" Patel, a Tamil boy from Pondicherry, explores issues of spirituality and practicality from an early age. He survives 227 days after a shipwreck while stranded on a lifeboat in the Pacific Ocean with a Bengal tiger named Richard Parker.\r\nThe novel, which has sold more than ten million copies worldwide,[1] was rejected by at least five London publishing houses[2] before being accepted by Knopf Canada, which published it in September 2001. The UK edition won the Man Booker Prize for Fiction the following year.[3][4][5] It was also chosen for CBC Radio''s Canada Reads 2003, where it was championed by author Nancy Lee.[6] The French translation, L''Histoire de Pi, was chosen in the French CBC version of the contest Le combat des livres, where it was championed by Louise Forestier.[7] The novel won the 2003 Boeke Prize, a South African novel award. In 2004, it won the Asian/Pacific American Award for Literature in Best Adult Fiction for years 2001–2003.[8] In 2012 it was adapted into a theatrical feature film directed by Ang Lee with a screenplay by David Magee.', 2012, 'http://ia.media-imdb.com/images/M/MV5BNTg2OTY2ODg5OF5BMl5BanBnXkFtZTcwODM5MTYxOA@@._V1_SX214_.jpg', '//www.youtube.com/embed/mZEZ35Fhvuc', '0000-00-00 00:00:00', 'Adventure, Drama, Fantasy', 50, 0, 0),
(14, 'Psycho', 'Psycho is a 1960 American suspense/horror film directed by Alfred Hitchcock starring Anthony Perkins, Vera Miles, John Gavin, and Janet Leigh. The screenplay is by Joseph Stefano, based on the 1959 novel of the same name by Robert Bloch loosely inspired by the crimes of Wisconsin murderer and grave robber Ed Gein.[1]\r\nThe film centers on the encounter between a secretary, Marion Crane (Leigh), who ends up at a secluded motel after embezzling money from her employer, and the motel''s disturbed owner-manager, Norman Bates (Perkins), and its aftermath.[2] When originally made, the film was seen as a departure from Hitchcock''s previous film North by Northwest, being filmed on a low budget, with a television crew and in black and white. Psycho initially received mixed reviews, but outstanding box office returns prompted reconsideration which led to overwhelming critical acclaim and four Academy Award nominations, including Best Supporting Actress for Leigh and Best Director for Hitchcock.\r\nIt is now considered one of Hitchcock''s best films[3] and praised as a work of cinematic art by international film critics and film scholars. Ranked among the greatest films of all time, it set a new level of acceptability for violence, deviant behavior and sexuality in American films.[4] After Hitchcock''s death in 1980, Universal Studios began producing follow-ups: three sequels, a remake, a television movie spin-off and a TV series.\r\nIn 1992, the film was selected for preservation by the US Library of Congress at the National Film Registry.', 1960, 'http://ia.media-imdb.com/images/M/MV5BMTgyNDIxNzQ4MF5BMl5BanBnXkFtZTYwMzkyNTQ2._V1_SX214_.jpg', '//www.youtube.com/embed/Wz719b9QUqY', '0000-00-00 00:00:00', 'Horror, Mystery, Thriller ', 10, 0, 0),
(15, 'Pulp Fiction', 'Pulp Fiction is a 1994 American black comedy and crime film directed by Quentin Tarantino, who also co-wrote the screenplay along with Roger Avary.[4] The film is known for its eclectic dialogue, ironic mix of humor and violence, nonlinear storyline, and a host of cinematic allusions and pop culture references. The film was nominated for seven Oscars, including Best Picture; Tarantino and Avary won for Best Original Screenplay. It was also awarded the Palme d''Or at the 1994 Cannes Film Festival. A major critical and commercial success, it revitalized the career of its leading man, John Travolta, who received an Academy Award nomination, as did costars Samuel L. Jackson and Uma Thurman.\r\nDirected in a highly stylized manner, Pulp Fiction connects the intersecting storylines of Los Angeles mobsters, fringe players, small-time criminals, and a mysterious briefcase. Considerable screen time is devoted to conversations and monologues that reveal the characters'' senses of humor and perspectives on life. The film''s title refers to the pulp magazines and hardboiled crime novels popular during the mid-20th century, known for their graphic violence and punchy dialogue. Pulp Fiction is self-referential from its opening moments, beginning with a title card that gives two dictionary definitions of "pulp." The plot, as in many of Tarantino''s other works, is presented out of chronological sequence.\r\nThe picture''s self-reflexivity, unconventional structure, and extensive use of homage and pastiche have led critics to describe it as a prime example of postmodern film. Considered by some critics a black comedy,[4] the film is also frequently labeled a "neo-noir."[5] Critic Geoffrey O''Brien argues otherwise: "The old-time noir passions, the brooding melancholy and operatic death scenes, would be altogether out of place in the crisp and brightly lit wonderland that Tarantino conjures up. [It is] neither neo-noir nor a parody of noir."[6] Similarly, Nicholas Christopher calls it "more gangland camp than neo-noir,"[7] and Foster Hirsch suggests that its "trippy fantasy landscape" characterizes it more definitively than any genre label.[8] Pulp Fiction is viewed as the inspiration for many later movies that adopted various elements of its style. The nature of its development, marketing, and distribution and its consequent profitability had a sweeping effect on the field of independent cinema. Considered a cultural watershed, Pulp Fiction''s influence has been felt in several other media, and it is widely regarded as one of the greatest films of all time.', 1994, 'http://ia.media-imdb.com/images/M/MV5BMjE0ODk2NjczOV5BMl5BanBnXkFtZTYwNDQ0NDg4._V1_SY317_CR4,0,214,317_.jpg', '//www.youtube.com/embed/s7EdQ4FqbhY', '0000-00-00 00:00:00', 'Crime, Drama, Thriller', 17, 0, 0),
(16, 'The Shawshank Redemption', 'The Shawshank Redemption is a 1994 American drama film written and directed by Frank Darabont and starring Tim Robbins and Morgan Freeman.\r\nAdapted from the Stephen King novella Rita Hayworth and Shawshank Redemption, the film tells the story of Andy Dufresne, a banker who spends nearly two decades in Shawshank State Prison for the murder of his wife and her lover despite his claims of innocence. During his time at the prison, he befriends a fellow inmate, Ellis Boyd "Red" Redding, and finds himself protected by the guards after the warden begins using him in his money laundering operation.\r\nDespite a lukewarm box office reception that barely recouped its budget, the film received multiple award nominations and favorable reviews from critics for its acting and realism. It has since enjoyed a remarkable life on cable television, VHS, DVD, and Blu-ray. It was included in the American Film Institute''s 100 Years...100 Movies 10th Anniversary Edition.[2]', 1994, 'http://ia.media-imdb.com/images/M/MV5BMTc3NjM4MTY3MV5BMl5BanBnXkFtZTcwODk4Mzg3OA@@._V1_SY317_CR4,0,214,317_.jpg', '//www.youtube.com/embed/6hB3S9bIaco', '0000-00-00 00:00:00', 'Crime, Drama', 20, 0, 0),
(17, 'Solaris', 'Solaris is a 2002 American science fiction drama directed by Steven Soderbergh and starring George Clooney and Natascha McElhone. It is based on the 1961 science fiction novel "Solaris" by Polish writer Stanisław Lem. Reflecting on Andrei Tarkovsky''s critically acclaimed 1972 Russian film "Solaris" (which was itself preceded by a 1968 Russian TV film), Soderbergh promised to be closer in spirit to Lem''s novel.[2]\r\nSoderbergh''s version is a meditative psychodrama set almost entirely on a space station orbiting Solaris, adding flashbacks to the previous experiences of its main characters on Earth. Chris struggles with the questions of Solaris'' motivation, his beliefs and memories, and reconciling what was lost with an opportunity for a second chance.', 2002, 'http://ia.media-imdb.com/images/M/MV5BMTQyNzI3MzMyNF5BMl5BanBnXkFtZTYwNDAyNzk2._V1_SX214_.jpg', '//www.youtube.com/embed/rvm7WMbXfeY', '0000-00-00 00:00:00', 'Drama, Mystery, Romance', 17, 0, 0),
(18, 'Star Trek', 'Star Trek is a 2009 American science fiction action film directed by J. J. Abrams, written by Roberto Orci and Alex Kurtzman and distributed by Paramount Pictures. It is the eleventh film of the Star Trek film franchise and is also a reboot that features the main characters of the original Star Trek television series, portrayed by a new cast. The film follows James T. Kirk (Chris Pine) and Spock (Zachary Quinto) aboard the USS Enterprise as they combat Nero (Eric Bana), a Romulan from their future who threatens the United Federation of Planets. The story takes place in an alternate reality[3][4] due to time travel by both Nero and the original Spock (Leonard Nimoy). The alternate timeline was created in an effort to free the film and the franchise from established continuity constraints while simultaneously preserving original story elements.\r\nDevelopment for Star Trek originated in 1968, when creator Gene Roddenberry announced plans to produce a prequel modeled after the television series. The concept resurfaced temporarily in the late 1980s, when it was postulated by Harve Bennett as a possible plotline for the movie that would become Star Trek VI: The Undiscovered Country, but was rejected in lieu of other projects by Roddenberry. Following the critical and commercial failure of Star Trek: Nemesis and the cancellation of the television series Star Trek: Enterprise, franchise executive producer Rick Berman and screenwriter Erik Jendresen wrote an un-produced film, titled Star Trek: The Beginning, which would take place after Enterprise. After the split between Viacom and CBS Corporation, former Paramount president Gail Berman convinced CBS to produce a feature film. Orci and Kurtzman, both fans of the Star Trek series, were approached to write the film and Abrams was approached to direct it. Kurtzman and Orci used inspiration from novels and graduate school dissertations as well as the series itself.\r\nPrincipal photography commenced on November 7, 2007 and ended on March 27, 2008. The film was shot in various locations around California and Utah. Abrams wanted to avoid using bluescreen and greenscreen, opting to use sets and locations instead. Heavy secrecy surrounded the film''s production and was under the fake working title Corporate Headquarters. Industrial Light & Magic used digital ships for the film, as opposed to the previous films in the franchise. Production for the film concluded by the end of 2008.\r\nStar Trek was heavily promoted the months preceding its release; pre-release screenings for the film premiered in select cities around the world including Austin, Texas, Sydney, Australia, and Calgary, Alberta. It was released in the United States and Canada on May 8, 2009, to very positive reviews. Critics praised the character development as well as the storyline in the film. Star Trek became a box office success, grossing over $385.7 million worldwide. It was nominated for several awards, including four Academy Awards at the 82nd Academy Awards, ultimately winning in the category for Best Makeup, making it the first Star Trek film to win an Academy Award. The DVD and Blu-ray for the film were released on November 17, 2009. Following the success of the film, its cast members signed on for two sequels, making Star Trek the first of a planned trilogy. A sequel, Star Trek Into Darkness, was released on May 16, 2013 with Abrams returning as director and Orci and Kurtzman returning as screenwriters (with the addition of Star Trek producer Damon Lindelof as screenwriter).', 2009, 'http://ia.media-imdb.com/images/M/MV5BMjE5NDQ5OTE4Ml5BMl5BanBnXkFtZTcwOTE3NDIzMw@@._V1_SX214_.jpg', '//www.youtube.com/embed/yhz4A5BCMAA', '0000-00-00 00:00:00', 'Action, Adventure, Sci-Fi', 10, 1, 1),
(19, 'The Terminator', 'The Terminator is a 1984 American science fiction action film directed by James Cameron, co-written by Cameron, Gale Anne Hurd and William Wisher, Jr., and starring Arnold Schwarzenegger, Michael Biehn and Linda Hamilton. It was filmed in Los Angeles, produced by Hemdale Film Corporation and distributed by Orion Pictures. Schwarzenegger plays the Terminator, a cyborg assassin sent back in time from the year 2029 to 1984 to kill Sarah Connor, played by Hamilton. Biehn plays Kyle Reese, a soldier from the future sent back in time to protect Sarah.\r\nThough not expected to be either a commercial or critical success, The Terminator topped the American box office for two weeks and helped launch the film career of Cameron and solidify that of Schwarzenegger. Three sequels have been produced: Terminator 2: Judgment Day (1991), Terminator 3: Rise of the Machines (2003), and Terminator Salvation (2009), as well as a television series, Terminator: The Sarah Connor Chronicles (2008–2009). In 2008, The Terminator was selected by the Library of Congress for preservation in the United States National Film Registry, being deemed "culturally, historically, or aesthetically significant".', 1984, 'http://ia.media-imdb.com/images/M/MV5BODE1MDczNTUxOV5BMl5BanBnXkFtZTcwMTA0NDQyNA@@._V1_SX214_.jpg', '//www.youtube.com/embed/c4Jo8QoOTQ4', '0000-00-00 00:00:00', 'Action, Sci-Fi', 10, 1, 1),
(20, 'The Butterfly Effect', 'The Butterfly Effect is a 2004 American science-fiction psychological thriller film that was written and directed by Eric Bress and J. Mackye Gruber, starring Ashton Kutcher and Amy Smart. The title refers to the butterfly effect, a popular hypothetical example of chaos theory which illustrates how small initial differences may lead to large unforeseen consequences over time.\r\nKutcher plays 20-year-old college student Evan Treborn,[2] with Amy Smart as his childhood sweetheart Kayleigh Miller, William Lee Scott as her sadistic brother Tommy, and Elden Henson as their neighbor Lenny. Evan finds he has the ability to travel back in time to inhabit his former self (that is, his adult mind inhabits his younger body) and to change the present by changing his past behaviours. Having been the victim of several childhood traumas aggravated by stress-induced memory losses, he attempts to set things right for himself and his friends, but there are unintended consequences for all. The film draws heavily on flashbacks of the characters'' lives at ages 7 and 13, and presents several alternate present-day outcomes as Evan attempts to change the past, before settling on a final outcome.\r\nThe film received a poor critical reception, but was nevertheless a commercial success, producing gross earnings of $96 million from a budget of $13 million. The film won the Pegasus Audience Award at the Brussels International Fantastic Film Festival, and was nominated for Best Science Fiction Film at the Saturn Awards and Choice Movie: Thriller in the Teen Choice Awards.', 2004, 'http://ia.media-imdb.com/images/M/MV5BMTI1ODkxNzg2N15BMl5BanBnXkFtZTYwMzQ2MTg2._V1_SY317_CR0,0,214,317_.jpg', '//www.youtube.com/embed/B8_dgqfPXFg', '0000-00-00 00:00:00', 'Sci-Fi, Thriller', 30, 1, 1),
(21, 'Titanic', 'Titanic is a 1997 American epic romantic disaster film directed, written, co-produced, co-edited and partly financed by James Cameron. A fictionalized account of the sinking of the RMS Titanic, it stars Leonardo DiCaprio and Kate Winslet as members of different social classes who fall in love aboard the ship during its ill-fated maiden voyage.\r\nCameron''s inspiration for the film was predicated on his fascination with shipwrecks; he wanted to convey the emotional message of the tragedy and felt that a love story interspersed with the human loss would be essential to achieving this. Production on the film began in 1995, when Cameron shot footage of the actual Titanic wreck. The modern scenes were shot on board the Akademik Mstislav Keldysh, which Cameron had used as a base when filming the wreck. A reconstruction of the Titanic was built at Playas de Rosarito in Baja California, scale models, and computer-generated imagery were used to recreate the sinking. The film was partially funded by Paramount Pictures and 20th Century Fox, and, at the time, was the most expensive film ever made, with an estimated budget of $200 million.\r\nUpon its release on December 19, 1997, the film achieved critical and commercial success. Nominated for fourteen Academy Awards, it won eleven, including the awards for Best Picture and Best Director, tying Ben Hur (1959) for most Oscars won by a single film. With an initial worldwide gross of over $1.84 billion, it was the first film to reach the billion-dollar mark. It remained the highest-grossing film of all time, until Cameron''s 2009 film Avatar surpassed its gross in 2010. A 3D version of the film, released on April 4, 2012 (often billed as Titanic 3D) to commemorate the centenary of the sinking of the ship, earned it an additional $343.6 million worldwide, pushing Titanic''s worldwide total to $2.18 billion. It became the second film to gross more than $2 billion worldwide (after Avatar).', 1997, 'http://ia.media-imdb.com/images/M/MV5BMjExNzM0NDM0N15BMl5BanBnXkFtZTcwMzkxOTUwNw@@._V1_SY317_CR0,0,214,317_.jpg', '//www.youtube.com/embed/zCy5WQ9S4c0', '2013-08-22 02:16:17', 'Drama, Romance, History', 25, 0, 0),
(22, 'Up', 'Up is a 2009 American 3D computer-animated comedy-adventure film produced by Pixar Animation Studios and directed by Pete Docter. The film centers on an elderly widower named Carl Fredricksen (voiced by Edward Asner) and an earnest young Wilderness Explorer named Russell (Jordan Nagai). By tying thousands of balloons to his home, 78-year-old Carl sets out to fulfill his lifelong dream to see the wilds of South America and to complete a promise made to his lifelong love. The film was co-directed by Bob Peterson, with music composed by Michael Giacchino.\r\nDocter began working on the story in 2004, which was based on fantasies of escaping from life when it becomes too irritating. He and eleven other Pixar artists spent three days in Venezuela gathering research and inspiration. The designs of the characters were caricatured and stylized considerably, and animators were challenged with creating realistic cloth. The floating house is attached by a varying number between 10,000 and 20,000 balloons in the film''s sequences. Up was Pixar''s first film to be presented in Disney Digital 3-D.[3]\r\nUp was released on May 29, 2009 and opened the 2009 Cannes Film Festival, becoming the first animated and 3D film to do so.[4] The film became a great financial success, accumulating over $731 million in its theatrical release. Up received critical acclaim, with most reviewers commending the humor and heart of the film. Edward Asner was praised for his portrayal of Carl, and a montage of Carl and his wife Ellie aging together was widely lauded. The film received five Academy Award nominations, including Best Picture, making it the second animated film in history to receive such a nomination, following Beauty and the Beast (1991).[5]', 2009, 'http://ia.media-imdb.com/images/M/MV5BMTMwODg0NDY1Nl5BMl5BanBnXkFtZTcwMjkwNTgyMg@@._V1_SX214_.jpg', '//www.youtube.com/embed/pkqzFUhGPJg', '2013-08-21 21:00:00', 'Animation, Adventure, Comedy', 40, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE IF NOT EXISTS `rents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `movieid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `userid`, `movieid`, `price`, `datetime`) VALUES
(1, 1, 1, 50, '2013-10-09 09:38:25'),
(2, 1, 2, 25, '2013-10-09 09:52:43'),
(3, 1, 3, 10, '2013-10-09 09:55:46'),
(4, 1, 4, 25, '2013-10-09 10:35:01'),
(5, 1, 6, 25, '2013-10-09 10:38:16'),
(6, 1, 22, 40, '2013-10-09 10:39:55'),
(7, 1, 12, 20, '2013-10-09 10:41:24'),
(8, 1, 5, 25, '2013-10-09 10:41:47'),
(9, 1, 10, 27, '2013-10-09 10:42:14'),
(10, 1, 7, 20, '2013-10-09 10:43:18'),
(11, 1, 8, 18, '2013-10-09 13:48:39'),
(12, 1, 9, 49, '2013-10-09 13:51:09'),
(13, 1, 11, 25, '2013-10-09 14:23:06'),
(14, 1, 13, 50, '2013-10-09 14:25:59'),
(15, 1, 14, 10, '2013-10-09 14:26:59'),
(16, 1, 15, 17, '2013-10-09 14:27:30'),
(17, 1, 16, 20, '2013-10-09 14:28:49'),
(18, 1, 17, 17, '2013-10-09 14:29:09');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movieid` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` int(50) NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male',
  `balance` int(30) NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `birthdate`, `sex`, `balance`, `isadmin`) VALUES
(1, 'slavak@gmail.com', 123456, 'Slava', 'By', '1983-03-23', 'male', 630, 1),
(32, 'dfgh@oi.ioi', 123456, 'xfghdfgh', 'dfghd', '1984-10-01', 'male', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
