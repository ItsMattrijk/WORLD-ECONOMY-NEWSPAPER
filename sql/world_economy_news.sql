-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 oct. 2025 à 11:30
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `world_economy_news`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `apercu` text DEFAULT NULL,
  `contenu` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `id_region` int(11) DEFAULT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `date_publication` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `apercu`, `contenu`, `image`, `id_theme`, `id_pays`, `id_region`, `id_auteur`, `date_publication`) VALUES
(5, '🚨 EXCLUSIF : Monkey D. Luffy proclamé 5ème Empereur des Mers !', 'Le Chapeau de Paille secoue le monde avec une prime record de 1,5 milliard de Berrys !', 'BIG NEWS ! Dans un retournement spectaculaire, Monkey D. Luffy, capitaine de l\'équipage du Chapeau de Paille, a été officiellement reconnu comme le 5ème Empereur des Mers par le World Economy News Paper !\r\n\r\nAprès avoir causé le chaos à Whole Cake Island et défié ouvertement Charlotte Linlin (Big Mom), l\'un des Quatre Empereurs, Luffy a prouvé sa valeur au monde entier. Sa prime a explosé, atteignant 1,5 milliard de Berrys !\r\n\r\nNos Martins Facteurs confirment que l\'équipage possède désormais une Grande Flotte de 5600 hommes. Son influence s\'étend sur plusieurs territoires du Nouveau Monde.\r\n\r\n\"Cette histoire fera la une dans le monde entier ! C\'est la plus grande nouvelle de l\'année !\" - Big News Morgans\r\n\r\nLe Gouvernement Mondial est en état d\'alerte maximale !', '68f1fede13d6e.jpg', 1, 13, 5, 1, '2025-10-17 06:01:40'),
(6, '⚔️ La chute de Kaido secoue le Nouveau Monde !', 'L\'Empereur aux Cent Bêtes vaincu par l\'Alliance à Wano !', 'SCOOP EXCLUSIF ! Après 20 ans d\'oppression, Wano est libéré ! L\'Empereur Kaido, surnommé \"la Créature la Plus Forte du Monde\", a été vaincu lors d\'une bataille épique.\r\n\r\nL\'Alliance formée par Luffy, Law, Kid et les samouraïs de Wano a réussi l\'impossible. Malgré son alliance avec Big Mom, Kaido a été terrassé.\r\n\r\nLuffy aurait éveillé le légendaire fruit Hito Hito no Mi modèle Nika, révélation qui choque le Gouvernement Mondial !\r\n\r\nLe shogun Kozuki Momonosuke ouvre les frontières de Wano. Une nouvelle ère commence !\r\n\r\nLes répercussions se font sentir dans le monde entier. L\'équilibre des Empereurs est rompu !', '68f1ff5947380.webp', 1, 9, 5, 2, '2025-10-15 07:01:40'),
(7, '🏴‍☠️ Shanks le Roux aperçu près de Elbaf', 'L\'Empereur mystérieux se rend au royaume des géants', 'Nos Martins Facteurs rapportent que Shanks le Roux, l\'un des Quatre Empereurs, a été aperçu naviguant vers Elbaf, le légendaire royaume des géants.\r\n\r\nLes intentions de cet homme au chapeau de paille restent mystérieuses. Certains parlent d\'une rencontre avec les anciens guerriers géants.\r\n\r\nShanks, ancien membre de l\'équipage de Gol D. Roger, garde toujours une longueur d\'avance. Que prépare-t-il ?\r\n\r\nLe Gouvernement observe ses mouvements avec la plus grande attention.', '68f1ffb3d6997.jpg', 1, 14, 5, 3, '2025-10-14 07:01:40'),
(8, 'Trafalgar Law et Eustass Kid forment une alliance improbable', 'Deux Supernovas s\'unissent contre un Empereur', 'Dans un retournement surprenant, Trafalgar Law et Eustass Kid, deux capitaines de la Pire Génération, ont formé une alliance temporaire pour affronter Big Mom.\r\n\r\nCes deux rivaux, chacun avec une prime dépassant 1 milliard de Berrys, ont mis leurs différends de côté face à la menace d\'un Empereur.\r\n\r\nNos sources indiquent que leur combat à Wano a secoué l\'île entière. Les deux capitaines ont démontré l\'éveil de leurs Fruits du Démon respectifs.\r\n\r\n\"C\'est la nouvelle génération qui prend le pouvoir !\" déclarent les témoins.', '68f2002c65e44.jpg', 1, 9, 5, 2, '2025-10-13 07:01:40'),
(9, '🎖️ Nouveau trio d\'Amiraux nommé au QG de la Marine', 'Fujitora, Ryokugyu et Kizaru forment la nouvelle force', 'Le Quartier Général de la Marine annonce sa nouvelle structure d\'Amiraux après le départ d\'Aokiji et la promotion d\'Akainu au poste de Commandant en Chef.\r\n\r\nFujitora (Taureau Pourpre), l\'aveugle au sens de la justice absolu, et Ryokugyu (Taureau Vert), mystérieux et puissant, rejoignent Kizaru pour former le nouveau trio.\r\n\r\nCes trois hommes possèdent tous des Fruits du Démon de type Logia extrêmement dangereux. Leur mission : restaurer l\'ordre dans les mers.\r\n\r\nLe Maréchal Sakazuki (Akainu) compte sur eux pour éliminer les pirates du Nouveau Monde.', '68f20153c2d52.webp', 2, 15, 5, 7, '2025-10-12 07:01:40'),
(10, 'Vice-Amiral Smoker promu après les événements de Punk Hazard', 'Le chasseur de Luffy grimpe les échelons', 'Smoker, connu pour sa poursuite acharnée des Chapeaux de Paille depuis Loguetown, vient d\'être promu Vice-Amiral.\r\n\r\nCe fumeur invétéré possède le fruit Moku Moku no Mi et utilise son arme Nanashaku Jitte avec une efficacité redoutable.\r\n\r\n\"La justice doit être absolue, mais équitable\", déclare Smoker, montrant une vision différente de celle de son supérieur Akainu.\r\n\r\nIl continue sa croisade avec l\'aide de la Capitaine Tashigi, experte en sabres.', '68f201b3a0271.webp', 2, 15, 5, 8, '2025-10-11 07:01:40'),
(11, 'Le héros de la Marine Garp prend sa retraite', 'Le légendaire Vice-Amiral quitte officiellement le service', 'Monkey D. Garp, surnommé \"Le Héros de la Marine\", annonce officiellement sa retraite après des décennies de service.\r\n\r\nCet homme a refusé à plusieurs reprises le poste d\'Amiral, préférant garder sa liberté d\'action. Il est célèbre pour avoir coincé Gol D. Roger à de nombreuses reprises.\r\n\r\nSon petit-fils n\'est autre que Luffy, le nouvel Empereur, et son fils est Dragon, le chef des Révolutionnaires.\r\n\r\n\"Une légende s\'en va, mais son héritage restera\", déclare le QG.', '68f201f209853.webp', 2, 15, 5, 10, '2025-10-10 07:01:40'),
(12, 'Koby devient Capitaine à seulement 18 ans', 'Le protégé de Garp gravit les échelons rapidement', 'Koby, ancien mousse devenu Marine grâce à la rencontre avec Luffy, vient d\'être promu Capitaine !\r\n\r\nEn seulement 2 ans, ce jeune homme est passé de simple soldat à Capitaine, un exploit rarissime. Il maîtrise les six techniques de combat de la Marine et possède le Haki de l\'Observation.\r\n\r\n\"Mon rêve est de devenir Amiral !\" déclare-t-il avec détermination.\r\n\r\nFormé directement par le Vice-Amiral Garp, Koby représente l\'avenir de la Marine.', '68f20262df689.jpg', 2, 15, 5, 10, '2025-10-09 07:01:40'),
(13, '🚩 L\'Armée Révolutionnaire attaque Mary Geoise pendant la Rêverie !', 'Dragon et ses commandants défient le Gouvernement Mondial', 'BREAKING NEWS ! L\'Armée Révolutionnaire a lancé une attaque audacieuse contre Mary Geoise lors de la Rêverie !\r\n\r\nMonkey D. Dragon, l\'homme le plus recherché au monde, accompagné de ses commandants Sabo, Ivankov, Karasu et Morley, a secoué le siège du pouvoir mondial.\r\n\r\nLeur objectif : libérer Bartholomew Kuma, l\'ancien Shichibukai devenu esclave des Dragons Célestes.\r\n\r\nLes détails restent flous mais les répercussions seront énormes ! Le Gouvernement tente d\'étouffer l\'affaire.\r\n\r\nNos Martins Facteurs continueront d\'enquêter !', '68f202927be55.avif', 3, 12, 7, 5, '2025-10-08 07:01:40'),
(14, 'Sabo vu en vie après Mary Geoise !', 'Le Général d\'État-Major des Révolutionnaires survit', 'Après des rumeurs de mort, nos sources confirment que Sabo, le Général d\'État-Major de l\'Armée Révolutionnaire, est bien vivant !\r\n\r\nLe frère de Luffy et Ace aurait été impliqué dans un incident majeur à Mary Geoise concernant le royaume d\'Alabasta.\r\n\r\nPossesseur du fruit Mera Mera no Mi (hérité d\'Ace), Sabo est l\'un des révolutionnaires les plus dangereux.\r\n\r\nLe Gouvernement a tenté de cacher cette information, mais la vérité éclate toujours !', '68f202d8836ea.jpg', 3, 12, 7, 5, '2025-10-07 07:01:40'),
(15, '🌍 La Rêverie débute à Mary Geoise', '50 royaumes se réunissent pour discuter du futur', 'La Rêverie quadriennale s\'ouvre à Mary Geoise ! Les dirigeants de 50 nations montent les 10 000 marches vers la Terre Sainte.\r\n\r\nParmi les sujets majeurs : la menace révolutionnaire croissante, l\'équilibre des Empereurs, et la proposition choc du roi Cobra d\'Alabasta concernant les Poneglyphes.\r\n\r\nLa princesse Vivi d\'Alabasta et la princesse Shirahoshi de l\'île des Hommes-Poissons attirent tous les regards.\r\n\r\nCertains royaumes demandent l\'abolition du système des Shichibukai, jugé trop dangereux.\r\n\r\nNos reporters couvriront chaque moment de cet événement historique !', '68f203066e81a.webp', 4, 12, 7, 4, '2025-10-06 07:01:40'),
(16, 'Le système des 7 Grands Corsaires aboli !', 'Une décision historique bouleverse l\'équilibre du monde', 'SCOOP MAJEUR ! Lors de la Rêverie, les royaumes ont voté l\'abolition du système des Shichibukai !\r\n\r\nMihawk, Boa Hancock, Weevil et Baggy sont désormais pourchassés par la Marine. Leurs primes sont réactivées.\r\n\r\nCette décision fait suite aux trahisons répétées de Crocodile, Doflamingo et Teach (Barbe Noire).\r\n\r\nL\'Amiral Fujitora, fer de lance de cette réforme, célèbre cette victoire pour une justice plus pure.\r\n\r\nMais quel sera l\'impact sur l\'équilibre des Trois Grandes Puissances ?', '68f2036e6fedd.webp', 4, 12, 7, 9, '2025-10-05 07:01:40'),
(17, '💰 Alabasta retrouve sa prospérité après Crocodile', 'Le royaume du désert renaît de ses cendres', 'Depuis la chute de Crocodile et de Baroque Works, Alabasta connaît une renaissance économique spectaculaire !\r\n\r\nLe roi Cobra et la princesse Vivi ont lancé de vastes programmes de reconstruction. Les pluies Dance Powder ont cessé, les vraies pluies sont revenues !\r\n\r\nL\'agriculture reprend, le commerce fleurit. Le port de Nanohana accueille à nouveau des centaines de navires marchands.\r\n\r\n\"Notre royaume est sauvé grâce aux Chapeaux de Paille\", déclare Vivi avec émotion.\r\n\r\nLes exportations de parfum et de tissus battent des records !', '68f203aa4578f.webp', 5, 6, 5, 4, '2025-10-04 07:01:40'),
(18, 'Dressrosa ouvre ses ports au commerce international', 'L\'ère post-Doflamingo commence', 'Libéré de la tyrannie de Doflamingo, Dressrosa retrouve sa place de hub commercial majeur !\r\n\r\nLe roi Riku Doldo III rétablit des relations avec les nations voisines. Les jouets redevenus humains reprennent leur vie.\r\n\r\nLes célèbres tournesols et les jouets artisanaux de Dressrosa s\'exportent à nouveau.\r\n\r\nLe Colisée, autrefois arène de combats illégaux, devient un lieu de compétitions sportives légales.\r\n\r\n\"Une nouvelle ère de paix et de prospérité commence\", annonce le roi Riku.', '68f203e1d3cff.jpg', 5, 7, 5, 4, '2025-10-03 07:01:40'),
(19, '🗿 Un Ponéglyphe Rouge découvert à Wano !', 'L\'île fermée révèle ses secrets du Siècle Oublié', 'DÉCOUVERTE MAJEURE ! Un Ponéglyphe Rouge a été trouvé dans les profondeurs de Wano Kuni !\r\n\r\nCes pierres indestructibles, interdites par le Gouvernement Mondial, contiennent des informations sur le Siècle Oublié et la localisation de Laugh Tale.\r\n\r\nSeule Nico Robin, la dernière archéologue capable de les lire, peut déchiffrer ces mystères.\r\n\r\nLes quatre Ponéglyphes Rouges indiquent le chemin vers le trésor ultime : le One Piece !\r\n\r\nLe Gouvernement tente de récupérer ces artefacts dangereux par tous les moyens.', '68f2040eb4097.webp', 6, 9, 5, 3, '2025-10-02 07:01:40'),
(20, 'Ruines antiques découvertes sous Fish-Man Island', 'Des vestiges de l\'ancien royaume révélés', 'Des archéologues sous-marins ont découvert d\'immenses ruines sous l\'île des Hommes-Poissons !\r\n\r\nCes structures gigantesques dateraient de plus de 900 ans, époque du mystérieux Siècle Oublié.\r\n\r\nLa famille Neptune autorise des fouilles contrôlées. Des inscriptions en ancien langage ont été trouvées.\r\n\r\n\"Ces découvertes pourraient réécrire l\'histoire du monde\", déclare un chercheur.\r\n\r\nLe Gouvernement surveille de près ces recherches potentiellement explosives.', '68f2044bdf605.webp', 6, 10, 5, 3, '2025-10-01 07:01:40'),
(21, '📜 20 ans après : Wano célèbre sa libération', 'La prophétie d\'Oden se réalise enfin', 'Il y a 20 ans, Kozuki Oden prophétisait la venue de guerriers qui libéreraient Wano de l\'oppression.\r\n\r\nCette prophétie s\'est réalisée ! Kaido et Orochi sont tombés. Momonosuke, fils d\'Oden, devient le nouveau shogun à seulement 28 ans (grâce au fruit de Shinobu).\r\n\r\nLes frontières de Wano, fermées depuis des siècles, s\'ouvrent progressivement au monde.\r\n\r\nLe pays, riche en pierre de mer et en savoir-faire, devient un acteur majeur.\r\n\r\n\"Mon père serait fier. Une nouvelle ère commence pour Wano !\" - Momonosuke', '68f2048475f60.webp', 10, 9, 5, 2, '2025-09-30 07:01:40'),
(22, 'La bataille de Marineford : 2 ans après', 'Retour sur la guerre qui a changé le monde', 'Il y a 2 ans, la bataille de Marineford opposait la Marine à Barbe Blanche, le plus fort des Empereurs.\r\n\r\nEdward Newgate et Portgas D. Ace y ont perdu la vie. Cette guerre a bouleversé l\'équilibre du monde.\r\n\r\nTeach (Barbe Noire) a volé le pouvoir de Barbe Blanche et est devenu Empereur.\r\n\r\nAkainu est devenu Commandant en Chef. Aokiji a quitté la Marine.\r\n\r\n\"Ce jour a marqué le début de la nouvelle ère de piraterie\", analysent les historiens.', '68f204bb685a2.jpg', 10, 15, 5, 1, '2025-09-29 07:01:40'),
(23, '🎭 Le Festival du Feu de Wano attire des milliers de visiteurs', 'La tradition ancestrale revit après 20 ans', 'Pour la première fois en 20 ans, Wano célèbre son Festival du Feu traditionnel dans la joie !\r\n\r\nDes lanternes illuminent le ciel, les samouraïs dansent, le saké coule à flots. C\'est une renaissance culturelle.\r\n\r\nLes artisans présentent leurs katanas légendaires, les geishas chantent les anciennes mélodies.\r\n\r\n\"Nos traditions étaient interdites sous Kaido. Aujourd\'hui, nous célébrons notre liberté !\" - habitant de la Capitale des Fleurs.\r\n\r\nLe shogun Momonosuke promet de préserver l\'héritage culturel de Wano.', '68f204ea43f91.jpg', 8, 9, 5, 4, '2025-09-28 07:01:40'),
(24, 'Foosha Village célèbre son enfant prodige', 'Le village natal de Luffy en liesse totale', 'Le petit village de Foosha, East Blue, célèbre l\'ascension fulgurante de Monkey D. Luffy !\r\n\r\nLe maire Woop Slap, malgré ses anciennes réserves, ne peut cacher sa fierté. Makino offre des boissons gratuites au bar Party\'s.\r\n\r\nLes habitants racontent les souvenirs d\'enfance de Luffy : \"Il disait toujours qu\'il deviendrait Roi des Pirates !\"\r\n\r\nUne statue en son honneur sera érigée sur la place du village.\r\n\r\n\"Notre petit Luffy est devenu Empereur des Mers. Qui l\'aurait cru ?\" - Makino', '68f2055139950.jpg', 8, 2, 1, 2, '2025-09-27 07:01:40'),
(25, '⚙️ Vegapunk présente les nouveaux Pacifistas', 'La technologie militaire atteint un nouveau palier', 'Le Dr Vegapunk, génie scientifique de la Marine, dévoile sa dernière création : les Pacifistas Mark III !\r\n\r\nCes cyborgs, basés sur Bartholomew Kuma, sont désormais capables d\'utiliser des lasers encore plus puissants.\r\n\r\nChaque Pacifista coûte l\'équivalent d\'un navire de guerre, mais leur efficacité est redoutable.\r\n\r\n\"Avec cette armée, nous éliminerons les pirates du Nouveau Monde\", déclare le Maréchal Akainu.\r\n\r\nLes droits de l\'homme sont-ils respectés ? Certains s\'interrogent sur l\'éthique de ces créations.', '68f2057b9abb3.avif', 9, 15, 5, 6, '2025-09-26 07:01:40'),
(26, 'Franky dévoile le Thousand Sunny 2.0', 'Le navire des Chapeaux de Paille amélioré', 'Franky, le charpentier cyborg des Chapeaux de Paille, a apporté des modifications majeures au Thousand Sunny !\r\n\r\nNouvelles armes, système de propulsion optimisé, renforts en pierre de mer de Wano : le navire est plus puissant que jamais.\r\n\r\n\"SUPER ! Ce navire nous mènera jusqu\'au bout du monde !\" s\'exclame Franky avec enthousiasme.\r\n\r\nLe lion de proue peut désormais tirer des canons laser. L\'atelier a été agrandi.\r\n\r\n\"Avec ce navire, rien ne peut nous arrêter !\" - Équipage du Chapeau de Paille', '68f205acd10f5.jpg', 9, 10, 5, 6, '2025-09-25 07:01:40');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `id_region`) VALUES
(1, 'Shells Town', 1),
(2, 'Foosha Village', 1),
(3, 'Ohara', 2),
(4, 'Germa Kingdom', 3),
(5, 'Baterilla', 4),
(6, 'Alabasta', 5),
(7, 'Dressrosa', 5),
(8, 'Drum Island', 5),
(9, 'Wano Kuni', 5),
(10, 'Fish-Man Island', 5),
(11, 'Amazon Lily', 6),
(12, 'Mary Geoise', 7),
(13, 'Whole Cake Island', 5),
(14, 'Elbaf', 5),
(15, 'MarineFord', 5),
(16, 'Loguetown', 1),
(17, 'Syrup Village', 1),
(18, 'Orange Town', 1),
(19, 'Baratie', 1),
(20, 'Arlong Park', 1),
(21, 'Ilusia Kingdom', 2),
(22, 'Toroa', 2),
(23, 'Ohara Ruins', 2),
(24, 'Flevance', 3),
(25, 'Spider Miles', 3),
(26, 'Lvneel Kingdom', 3),
(27, 'Briss Kingdom', 4),
(28, 'Sorbet Kingdom', 4),
(29, 'Jaya', 5),
(30, 'Skypiea', 5),
(31, 'Water 7', 5),
(32, 'Enies Lobby', 5),
(33, 'Thriller Bark', 5),
(34, 'Sabaody Archipelago', 5),
(35, 'Impel Down', 5),
(36, 'Baltigo', 5),
(37, 'Laugh Tale', 5),
(38, 'Rusukaina Island', 6),
(39, 'Kuja Island', 6),
(40, 'Red Line Capital', 7);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`) VALUES
(1, 'East Blue'),
(2, 'West Blue'),
(3, 'North Blue'),
(4, 'South Blue'),
(5, 'Grand Line'),
(6, 'Calm Belt'),
(7, 'Mary Geoise');

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `themes`
--

INSERT INTO `themes` (`id`, `nom`) VALUES
(1, 'Piraterie'),
(2, 'Marine'),
(3, 'Révolutionnaires'),
(4, 'Politique mondiale'),
(5, 'Commerce et économie'),
(6, 'Découvertes'),
(7, 'Crimes et affaires judiciaires'),
(8, 'Culture et traditions'),
(9, 'Technologie et inventions'),
(10, 'Événements historiques');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('admin','auteur','lecteur') DEFAULT 'lecteur',
  `date_creation` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `email`, `mot_de_passe`, `role`, `date_creation`) VALUES
(1, 'Big News Morgans', 'morgans@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'admin', '2025-10-16 18:47:44'),
(2, 'Nami', 'nami@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(3, 'Nico Robin', 'robin@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(4, 'Vivi Nefertari', 'vivi@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(5, 'Koala', 'koala@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(6, 'Franky', 'franky@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(7, 'Smoker', 'smoker@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(8, 'Tashigi', 'tashigi@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(9, 'Fujitora', 'fujitora@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(10, 'Koby', 'Koby@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'auteur', '2025-10-16 18:47:44'),
(11, 'Monkey D. Luffy', 'luffy@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(12, 'Roronoa Zoro', 'zoro@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(13, 'Sanji Vinsmoke', 'sanji@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(14, 'Usopp', 'usopp@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(15, 'Tony Tony Chopper', 'chopper@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(16, 'Brook', 'brook@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(17, 'Jinbe', 'jinbe@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(18, 'Trafalgar Law', 'law@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(19, 'Eustass Kid', 'kid@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(20, 'Boa Hancock', 'hancock@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(21, 'Sabo', 'sabo@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(22, 'Monkey D. Dragon', 'dragon@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(23, 'Buggy', 'buggy@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(24, 'Shanks', 'shanks@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(25, 'Marshall D. Teach', 'blackbeard@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44'),
(26, 'Edward Newgate', 'whitebeard@worldeconomynews.op', '0b7640519a531b7914cbff8e81ba3410428d8c6dfd5618f34eab53c1b9204895', 'lecteur', '2025-10-16 18:47:44');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_theme` (`id_theme`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_pays` (`id_pays`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pays_region` (`id_region`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_theme`) REFERENCES `themes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_ibfk_4` FOREIGN KEY (`id_auteur`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `articles_ibfk_5` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`);

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `fk_pays_region` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
