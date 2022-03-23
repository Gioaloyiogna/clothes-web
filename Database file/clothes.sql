-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 28 Novembre 2021 à 14:56
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clothes`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `SirName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `ProfilePic` text NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `AccountClosed` varchar(3) NOT NULL,
  `Orders` int(10) NOT NULL,
  `Password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `SirName`, `FirstName`, `Email`, `ProfilePic`, `UserName`, `AccountClosed`, `Orders`, `Password`) VALUES
(2, 'Aloyiogna', 'Giovanni', 'Giovannialoyiogna9@gmail.com', './images/user1.png', 'giovanni_aloyiogna', 'NO', 0, '5e60d2287e718123fbc157e5622eda0b'),
(3, 'Akoua', 'Gabiste', 'Gabisteakoua@gmail.com', './images/user.png', 'gabiste_akoua', 'NO', 0, 'b7f5b794ac9e029501f6154a5741cd4f'),
(4, 'Aloyiogna', 'Giovanni', 'Giovannialoyiogna12@gmail.com', './images/user1.png', 'giovanni_aloyiogna_1', 'NO', 0, '5e60d2287e718123fbc157e5622eda0b'),
(5, 'Aloyiogna', 'Giovanni', 'Giovannialoyiogna11@gmail.com', './images/user1.png', 'giovanni_aloyiogna_1_2', 'NO', 0, 'a31eb40f7ac5c173dc09c1f4eddbde47');

-- --------------------------------------------------------

--
-- Structure de la table `clientsinfos`
--

CREATE TABLE `clientsinfos` (
  `id` int(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `location` text NOT NULL,
  `email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clientsinfos`
--

INSERT INTO `clientsinfos` (`id`, `name`, `phonenumber`, `location`, `email`) VALUES
(144, 'aloyiogna1346380984', 274911985, 'blockfactory', ''),
(142, 'govanni30782920', 274911985, 'blockfactory', ''),
(143, 'aloyiogna', 274911985, 'blockfactory', 'Giovannialoyiogna9@gmail.com'),
(141, 'govanni1165590442', 274911985, 'blockfactory', ''),
(137, 'pacorabane', 274911985, 'gabon', ''),
(138, 'pacorabanec', 274911985, 'gabon', ''),
(140, 'govanni', 274911985, 'blockfactory', ''),
(136, 'pacorab', 274911985, 'gabon', ''),
(145, 'govanni819174953', 274911985, 'blockfactory', ''),
(153, 'govanni1186072949', 274911985, 'blockfactory', 'giovannialoyiogna11@gmail.com'),
(151, 'gabiste', 274911985, 'usa', 'gabisteakoua@gmail.com'),
(152, 'govanni1535989162', 274911985, 'blockfactory', 'samabenakpalemon@outlook.com'),
(154, 'govanni1351433179', 274911985, 'blockfactory', 'gabisteakoua@gmail.com'),
(155, 'abi', 274911985, 'blockfactory', 'gabisteakoua@gmail.com'),
(156, 'joe', 274911985, 'blockfactory', 'giovannialoyiogna11@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `clothescollection`
--

CREATE TABLE `clothescollection` (
  `id` int(11) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clothescollection`
--

INSERT INTO `clothescollection` (`id`, `image`, `price`, `name`) VALUES
(1, './images/cloth1.jpeg', 100, 'dress'),
(0, './images/cloth2.jpeg', 50, 'dress'),
(2, './images/cloth3.jpeg', 30, 'dress'),
(10, './images/cloth4.jpeg', 120, 'dress'),
(9, './images/cloth5.jpeg', 30, 'dress'),
(12, './images/cloth6.jpeg', 120, 'dress'),
(3, './images/cloth8.jpeg', 95, 'skirt'),
(4, './images/cloth10.jpeg', 85, 'skirt'),
(11, './images/cake9webp.webp', 45, 'lewis');

-- --------------------------------------------------------

--
-- Structure de la table `clothescontact`
--

CREATE TABLE `clothescontact` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `period` varchar(30) NOT NULL,
  `reason` text NOT NULL,
  `phone` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clothescontact`
--

INSERT INTO `clothescontact` (`id`, `name`, `period`, `reason`, `phone`) VALUES
(1, 'Giovanni', 'morning', 'boost', 274911985),
(2, 'Giovanni', 'morning', 'boost', 274911985);

-- --------------------------------------------------------

--
-- Structure de la table `employee`
--

CREATE TABLE `employee` (
  `id` int(6) NOT NULL,
  `SurName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `ProfilePic` text NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `AccountClosed` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employee`
--

INSERT INTO `employee` (`id`, `SurName`, `FirstName`, `Email`, `Password`, `ProfilePic`, `UserName`, `AccountClosed`) VALUES
(3, 'Aloyiogna', 'Giovanni', 'Giooo@gmail.com', 'e09c80c42fda55f9d992e59ca6b3307d', '../../../images/user1.jpg', 'giovanni_aloyiogna', 'YES'),
(2, 'Aloyiogna', 'Romina', 'Giovannialoyiogna10@gmail.com', 'd560fc67fe6dd6098d4fb81017b4691d', '../../../images/user1.jpg', 'romina_aloyiogna', 'NO'),
(4, 'Ike', 'Joe', 'Romina.meyo09@gmail.com', 'f440de7f9ec85e6f10d338626b944c55', '../../../images/user1.jpg', 'joe_ike', 'YES'),
(5, 'Gabiste', 'Giovanni', 'Empty@deapinnov.com', '5e60d2287e718123fbc157e5622eda0b', '../../../images/user.jpg', 'giovanni_gabiste', 'YES'),
(6, 'Aloyiogna', 'Giovanni', 'Giovannialoyiogna9@gmail.com', '5e60d2287e718123fbc157e5622eda0b', '../../../images/user1.jpg', 'giovanni_aloyiogna', 'NO'),
(7, 'Aloyiogna', 'Giovanni', 'Giovannialoyiogna@gmail.com', '5e60d2287e718123fbc157e5622eda0b', '../../../images/user1.jpg', 'giovanni_aloyiogna', 'NO');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `clothname` varchar(30) NOT NULL,
  `articlerefnumber` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `orders`
--

INSERT INTO `orders` (`id`, `image`, `price`, `quantity`, `clothname`, `articlerefnumber`) VALUES
(48, './images/cloth3.jpeg', 30, 2, 'dress', 141),
(47, './images/cloth4.jpeg', 120, 3, 'dress', 140),
(45, './images/cloth6.jpeg', 120, 5, 'dress', 138),
(46, './images/cloth5.jpeg', 30, 2, 'dress', 139),
(40, './images/cake6.webp', 100, 0, 'jean', 135),
(41, './images/cloth2.jpeg', 50, 0, 'dress', 136),
(42, './images/cloth6.jpeg', 120, 0, 'dress', 136),
(43, './images/cloth2.jpeg', 50, 0, 'dress', 137),
(44, './images/cloth6.jpeg', 120, 0, 'dress', 137),
(49, './images/cloth2.jpeg', 50, 2, 'dress', 142),
(50, './images/cloth4.jpeg', 120, 2, 'dress', 143),
(51, './images/cloth2.jpeg', 50, 3, 'dress', 144),
(63, './images/cloth3.jpeg', 30, 0, 'dress', 156),
(58, './images/cloth3.jpeg', 30, 5, 'dress', 151),
(59, './images/cloth2.jpeg', 50, 2, 'dress', 152),
(60, './images/cloth8.jpeg', 95, 2, 'skirt', 153),
(61, './images/cloth3.jpeg', 30, 2, 'dress', 154),
(62, './images/cloth3.jpeg', 30, 3, 'dress', 155);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `image` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `promoprice` int(10) NOT NULL,
  `id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`image`, `name`, `promoprice`, `id`) VALUES
('./images/cloth1.jpeg', 'dress', 30, 1),
('./images/cloth2.jpeg', 'skirt', 20, 2),
('./images/cloth3.jpeg', 'dress', 90, 3),
('./images/cloth4.jpeg', 'dress', 35, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clientsinfos`
--
ALTER TABLE `clientsinfos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clothescollection`
--
ALTER TABLE `clothescollection`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clothescontact`
--
ALTER TABLE `clothescontact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `clientsinfos`
--
ALTER TABLE `clientsinfos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT pour la table `clothescontact`
--
ALTER TABLE `clothescontact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
