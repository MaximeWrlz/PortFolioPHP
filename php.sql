-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 20 mars 2020 à 09:17
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `php`
--

-- --------------------------------------------------------

--
-- Structure de la table `aboutme`
--

DROP TABLE IF EXISTS `aboutme`;
CREATE TABLE IF NOT EXISTS `aboutme` (
  `about_image` text CHARACTER SET utf8 NOT NULL,
  `descme` varchar(10000) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `aboutme`
--

INSERT INTO `aboutme` (`about_image`, `descme`) VALUES
('profilimg.png', 'After 1 year as a first scientist, I finally reoriented myself towards the STI2D sector with option Digital Information System (NIS). It was during these two years that I became fond of programming and web development. Very quickly, I started to develop my own websites. They were only prototypes, tests, but it allowed me to improve myself and make them more attractive. After the \"A levels\", I joined a Higher National Diploma in MMI at the Technological University Institute of Bordeaux Montaigne.\r\nI was then able to increase my development skills and thus to be passionate about full stack development.');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(256) CHARACTER SET utf8 NOT NULL,
  `message` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `pseudo`, `message`, `date`) VALUES
(1, 'Coco', 'Ceci est mon prems commentaire', '2020-03-19 17:00:44'),
(3, 'max.wrlz', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme Du texte.', '2020-03-19 17:14:23');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `mail` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `password`) VALUES
(13, 'max.wrlz', 'maximewarluzel@gmail.com', '$2y$10$1vZxNdO0RlBMn4RqAWxlvOQbkBsqjBTN2zASkXNKPs2ibwaAWkwki'),
(21, 'Juju33', 'juju33@gmail.com', '$2y$10$FW5xFOgv3L4d9t/fCFKDr.xTRK6SQZichkvpKdigWKoLP1P.jeJ8q'),
(19, 'Coco', 'cocodu33@gmail.com', '$2y$10$tEe2vOoom/9lP36VkaT6RuTWtnDbOHmbuccWh7hZJwRm8.Q5Yby.S'),
(22, 'lou', 'lou@gmail.com', '$2y$10$G9cSlvbbTtRL1IfsXJl7XO7MqS6E1fcwAgIAx0wJRtfShV2jkUbdq');

-- --------------------------------------------------------

--
-- Structure de la table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) CHARACTER SET utf8 NOT NULL,
  `description` varchar(10000) CHARACTER SET utf8 NOT NULL,
  `project_image` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `works`
--

INSERT INTO `works` (`id`, `title`, `description`, `project_image`) VALUES
(53, 'Projet numÃ©ro 123456789', 'Ceci est une longue description pour un projet qui n\'en vaut pas autant croyez moi Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les annÃ©es 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour rÃ©aliser un livre spÃ©cimen de polices de texte. Il n\'a pas fait que survivre cinq siÃ¨cles, mais s\'est aussi adaptÃ© Ã  la bureautique informatique, sans que son contenu n\'en soit modifiÃ©. Il a Ã©tÃ© popularisÃ© dans les annÃ©es 1960 grÃ¢ce Ã  la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus rÃ©cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'project2.jpg'),
(46, 'StratÃ©gies amoureuses', 'bla bla bla bla bla 5 Contrairement Ã  une opinion rÃ©pandue, le Lorem Ipsum n\'est pas simplement du texte alÃ©atoire. Il trouve ses racines dans une oeuvre de la littÃ©rature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intÃ©ressÃ© Ã  un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en Ã©tudiant tous les usages de ce mot dans la littÃ©rature classique, dÃ©couvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du \"De Finibus Bonorum et Malorum\" (Des SuprÃªmes Biens et des SuprÃªmes Maux) de CicÃ©ron. Cet ouvrage, trÃ¨s populaire pendant la Renaissance, est un traitÃ© sur la thÃ©orie de l\'Ã©thique. Les premiÃ¨res lignes du Lorem Ipsum, \"Lorem ipsum dolor sit amet...\", proviennent de la section 1.10.32.', '9A58D5C0-BA38-4A1C-BD71-323DC7011A96.png'),
(51, 'Dark Net et CybercriminalitÃ©', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empÃªche de se concentrer sur la mise en page elle-mÃªme. L\'avantage du Lorem Ipsum sur un texte gÃ©nÃ©rique comme \'Du texte. Du texte. Du texte.\' est qu\'il possÃ¨de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du franÃ§ais standard. De nombreuses suites logicielles de mise en page ou Ã©diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par dÃ©faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'Ã  leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes)', 'contact.jpg'),
(50, 'Projet 67', 'Description courte mais simple osef Plusieurs variations de Lorem Ipsum peuvent Ãªtre trouvÃ©es ici ou lÃ , mais la majeure partie d\'entre elles a Ã©tÃ© altÃ©rÃ©e par l\'addition d\'humour ou de mots alÃ©atoires qui ne ressemblent pas une seconde Ã  du texte standard. Si vous voulez utiliser un passage du Lorem Ipsum, vous devez Ãªtre sÃ»r qu\'il n\'y a rien d\'embarrassant cachÃ© dans le texte. Tous les gÃ©nÃ©rateurs de Lorem Ipsum sur Internet tendent Ã  reproduire le mÃªme extrait sans fin, ce qui fait de lipsum.com le seul vrai gÃ©nÃ©rateur de Lorem Ipsum. Iil utilise un dictionnaire de plus de 200 mots latins, en combinaison de plusieurs structures de phrases, pour gÃ©nÃ©rer un Lorem Ipsum irrÃ©prochable. Le Lorem Ipsum ainsi obtenu ne contient aucune rÃ©pÃ©tition, ni ne contient des mots farfelus, ou des touches d\'humour.', 'project1.jpg'),
(54, 'Projet 51', 'Ce projet est portÃ© Secret DÃ©fense', 'Cdgea.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
