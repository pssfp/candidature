-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.123.0.91:3306
-- Generation Time: Jul 11, 2025 at 02:23 AM
-- Server version: 8.0.22
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epole_candi_p12_2024`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` bigint NOT NULL COMMENT 'identifiant',
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 TABLESPACE `epole_candi_p12_2024`;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `login`, `password`) VALUES
(1, 'anatole', 'anatole'),
(2, 'jp', 'jp');

-- --------------------------------------------------------

--
-- Table structure for table `candidats`
--

CREATE TABLE `candidats` (
  `id` bigint NOT NULL,
  `id_specialite` int NOT NULL,
  `id_pays` int NOT NULL,
  `nom` varchar(128) DEFAULT NULL,
  `prenom` varchar(128) DEFAULT NULL,
  `epouse` varchar(128) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `nationalite` varchar(50) DEFAULT NULL,
  `lieu_de_naissce` varchar(128) DEFAULT NULL,
  `region_dorigine` varchar(50) DEFAULT NULL,
  `sexe` varchar(15) DEFAULT NULL,
  `statu_matrimonial` varchar(128) DEFAULT NULL,
  `nombre_enfant` bigint DEFAULT NULL,
  `adresse_candidat` varchar(128) DEFAULT NULL,
  `telephone` varchar(32) DEFAULT NULL,
  `telephone2` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `ville_residence` varchar(128) DEFAULT NULL,
  `pays_residence` int DEFAULT NULL,
  `paysorigine` int DEFAULT NULL,
  `nombre_annee_etude_sup` bigint DEFAULT NULL,
  `dernier_diplome` varchar(128) DEFAULT NULL,
  `diplome_obtenu_a` varchar(128) DEFAULT NULL,
  `annee_optention_diplome` varchar(50) DEFAULT NULL,
  `statut_prof` varchar(128) DEFAULT NULL,
  `structure` varchar(128) DEFAULT NULL,
  `adresse_structure` varchar(128) DEFAULT NULL,
  `telephone_structure` varchar(128) DEFAULT NULL,
  `email_structure` varchar(128) DEFAULT NULL,
  `accepter_condition` tinyint(1) DEFAULT NULL,
  `etat` bigint DEFAULT NULL,
  `ordre_candidature` int NOT NULL,
  `date_enregistrement` datetime DEFAULT NULL,
  `langue` varchar(255) DEFAULT NULL,
  `civilite` varchar(45) DEFAULT NULL,
  `type_etude` varchar(32) DEFAULT NULL,
  `dept_dorigine` varchar(64) DEFAULT NULL,
  `diplome_requis` varchar(128) DEFAULT NULL,
  `specialite_requise` varchar(128) DEFAULT NULL,
  `a_depose` tinyint(1) NOT NULL COMMENT 'Indique si il a déposé phisiquement ou pas son dossier',
  `howDidYouKnewUs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 TABLESPACE `epole_candi_p12_2024`;

--
-- Dumping data for table `candidats`
--

INSERT INTO `candidats` (`id`, `id_specialite`, `id_pays`, `nom`, `prenom`, `epouse`, `date_naissance`, `nationalite`, `lieu_de_naissce`, `region_dorigine`, `sexe`, `statu_matrimonial`, `nombre_enfant`, `adresse_candidat`, `telephone`, `telephone2`, `email`, `ville_residence`, `pays_residence`, `paysorigine`, `nombre_annee_etude_sup`, `dernier_diplome`, `diplome_obtenu_a`, `annee_optention_diplome`, `statut_prof`, `structure`, `adresse_structure`, `telephone_structure`, `email_structure`, `accepter_condition`, `etat`, `ordre_candidature`, `date_enregistrement`, `langue`, `civilite`, `type_etude`, `dept_dorigine`, `diplome_requis`, `specialite_requise`, `a_depose`, `howDidYouKnewUs`) VALUES
(12364, 2, 215, 'MEMADJI', 'DJIMOUDJIEL ', 'VIVIANE DOSKEM ', '1986-03-10', 'Tchadienne ', 'Ndjamena ', 'Chari baguirmi', 'Homme', 'Marié(e)', 3, 'BP: chagoua 2', '0023566356125', '0023598144489', 'mdjimoudjiel@yahoo.com', 'Ndjamena ', 0, 215, 0, 'Maîtrise ', '0', '2013', 'Fonctionnaire', 'Ministère des finances, du budget et de l\'économie ', '', '0', 'Direction Générale du Trésor ', 1, NULL, 12364, '2024-08-29 13:54:40', 'Français', 'Monsieur', 'Distanciel', 'Ndjamena ', 'Maîtrise en GESTION ', 'Comptabilité finance ', 0, 'Internet et réseaux sociaux'),
(12365, 4, 41, 'Saïse Bayaola', 'Henok-Roger', '', '2000-09-20', 'Camerounais', 'AMBAM', 'Extrême-Nord', 'Homme', 'Célibataire', 0, 'BP Yaoundé 11628', '693877118', '694317481', 'bayaolahenokr2000@gmail.com', 'Yaoundé', 41, 41, 0, 'Licence en Économie de Gestion', '0', '2022', 'Fonctionnaire', 'MINFOPRA', '', '0', '', 1, NULL, 12365, '2024-07-27 19:38:12', 'Français', 'Monsieur', 'Presentiel', 'Mayo Danay', 'Licence', 'Économie de gestion', 0, 'Internet et réseaux sociaux'),
(12883, 5, 41, 'Dang Dissak Delon', 'Serge ', '', '1989-02-27', 'Camerounaise ', 'Yaoundé ', 'Centre ', 'Homme', 'Célibataire', 2, 'BP 718 yaounde ', '273693041327', '237693041327', 'sergedissakdelon@yahoo.fr', 'Yaoundé ', 41, 41, 0, 'Master 2', '0', '2018', 'Fonctionnaire', 'Feicom ', 'BP 718 yaounde ', '0', '', 1, NULL, 12883, '2025-07-09 09:26:42', 'Français', 'Monsieur', 'Presentiel', 'Ayos ', 'Licence professionnelle métiers ', 'Gestion des ETS financiers ', 0, 'Média Radio et TV');

-- --------------------------------------------------------

--
-- Stand-in structure for view `candidature2024`
-- (See below for the actual view)
--
CREATE TABLE `candidature2024` (
`id` bigint
,`id_specialite` int
,`id_pays` int
,`nom` varchar(128)
,`prenom` varchar(128)
,`epouse` varchar(128)
,`date_naissance` date
,`nationalite` varchar(50)
,`lieu_de_naissce` varchar(128)
,`region_dorigine` varchar(50)
,`sexe` varchar(15)
,`statu_matrimonial` varchar(128)
,`nombre_enfant` bigint
,`adresse_candidat` varchar(128)
,`telephone` varchar(32)
,`telephone2` varchar(32)
,`email` varchar(50)
,`ville_residence` varchar(128)
,`pays_residence` int
,`paysorigine` int
,`nombre_annee_etude_sup` bigint
,`dernier_diplome` varchar(128)
,`diplome_obtenu_a` varchar(128)
,`annee_optention_diplome` varchar(50)
,`statut_prof` varchar(128)
,`structure` varchar(128)
,`adresse_structure` varchar(128)
,`telephone_structure` varchar(128)
,`email_structure` varchar(128)
,`accepter_condition` tinyint(1)
,`etat` bigint
,`ordre_candidature` int
,`date_enregistrement` datetime
,`langue` varchar(255)
,`civilite` varchar(45)
,`type_etude` varchar(32)
,`dept_dorigine` varchar(64)
,`diplome_requis` varchar(128)
,`specialite_requise` varchar(128)
,`a_depose` tinyint(1)
,`specialite` varchar(128)
,`pays` varchar(150)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `candidatureFull2023`
-- (See below for the actual view)
--
CREATE TABLE `candidatureFull2023` (
`id` bigint
,`id_specialite` int
,`id_pays` int
,`nom` varchar(128)
,`prenom` varchar(128)
,`epouse` varchar(128)
,`date_naissance` date
,`nationalite` varchar(50)
,`lieu_de_naissce` varchar(128)
,`region_dorigine` varchar(50)
,`sexe` varchar(15)
,`statu_matrimonial` varchar(128)
,`nombre_enfant` bigint
,`adresse_candidat` varchar(128)
,`telephone` varchar(32)
,`telephone2` varchar(32)
,`email` varchar(50)
,`ville_residence` varchar(128)
,`pays_residence` int
,`paysorigine` int
,`nombre_annee_etude_sup` bigint
,`dernier_diplome` varchar(128)
,`diplome_obtenu_a` varchar(128)
,`annee_optention_diplome` varchar(50)
,`statut_prof` varchar(128)
,`structure` varchar(128)
,`adresse_structure` varchar(128)
,`telephone_structure` varchar(128)
,`email_structure` varchar(128)
,`accepter_condition` tinyint(1)
,`etat` bigint
,`ordre_candidature` int
,`date_enregistrement` datetime
,`langue` varchar(255)
,`civilite` varchar(45)
,`type_etude` varchar(32)
,`dept_dorigine` varchar(64)
,`diplome_requis` varchar(128)
,`specialite_requise` varchar(128)
,`a_depose` tinyint(1)
,`pays` varchar(150)
,`specialite` varchar(128)
);

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `id` int NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `nationalite` varchar(150) DEFAULT NULL,
  `nom_en` varchar(150) DEFAULT NULL,
  `natonalite_en` varchar(150) DEFAULT NULL,
  `code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 TABLESPACE `epole_candi_p12_2024`;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`id`, `nom`, `nationalite`, `nom_en`, `natonalite_en`, `code`) VALUES
(1, 'Afghanistan', NULL, 'Afghanistan', NULL, 'AF'),
(2, 'Afrique du Sud', NULL, 'South Africa', NULL, 'ZA'),
(3, 'Albanie', NULL, 'Albania', NULL, 'AL'),
(4, 'Algérie', NULL, 'Algeria', NULL, 'DZ'),
(5, 'Allemagne', NULL, 'Germany', NULL, 'DE'),
(6, 'Andorre', NULL, 'Andorra', NULL, 'AD'),
(7, 'Angola', NULL, 'Angola', NULL, 'AO'),
(8, 'Anguilla', NULL, 'Anguilla', NULL, 'AI'),
(9, 'Antarctique', NULL, 'Antarctica', NULL, 'AQ'),
(10, 'Antigua-et-Barbuda', NULL, 'Antigua & Barbuda', NULL, 'AG'),
(11, 'Antilles néerlandaises', NULL, 'Netherlands Antilles', NULL, 'AN'),
(12, 'Arabie saoudite', NULL, 'Saudi Arabia', NULL, 'SA'),
(13, 'Argentine', NULL, 'Argentina', NULL, 'AR'),
(14, 'Arménie', NULL, 'Armenia', NULL, 'AM'),
(15, 'Aruba', NULL, 'Aruba', NULL, 'AW'),
(16, 'Australie', NULL, 'Australia', NULL, 'AU'),
(17, 'Autriche', NULL, 'Austria', NULL, 'AT'),
(18, 'Azerbaïdjan', NULL, 'Azerbaijan', NULL, 'AZ'),
(19, 'Bénin', NULL, 'Benin', NULL, 'BJ'),
(20, 'Bahamas', NULL, 'Bahamas, The', NULL, 'BS'),
(21, 'Bahreïn', NULL, 'Bahrain', NULL, 'BH'),
(22, 'Bangladesh', NULL, 'Bangladesh', NULL, 'BD'),
(23, 'Barbade', NULL, 'Barbados', NULL, 'BB'),
(24, 'Belau', NULL, 'Palau', NULL, 'PW'),
(25, 'Belgique', NULL, 'Belgium', NULL, 'BE'),
(26, 'Belize', NULL, 'Belize', NULL, 'BZ'),
(27, 'Bermudes', NULL, 'Bermuda', NULL, 'BM'),
(28, 'Bhoutan', NULL, 'Bhutan', NULL, 'BT'),
(29, 'Biélorussie', NULL, 'Belarus', NULL, 'BY'),
(30, 'Birmanie', NULL, 'Myanmar (ex-Burma)', NULL, 'MM'),
(31, 'Bolivie', NULL, 'Bolivia', NULL, 'BO'),
(32, 'Bosnie-Herzégovine', NULL, 'Bosnia and Herzegovina', NULL, 'BA'),
(33, 'Botswana', NULL, 'Botswana', NULL, 'BW'),
(34, 'Brésil', NULL, 'Brazil', NULL, 'BR'),
(35, 'Brunei', NULL, 'Brunei Darussalam', NULL, 'BN'),
(36, 'Bulgarie', NULL, 'Bulgaria', NULL, 'BG'),
(37, 'Burkina Faso', NULL, 'Burkina Faso', NULL, 'BF'),
(38, 'Burundi', NULL, 'Burundi', NULL, 'BI'),
(39, 'Côte d\'Ivoire', NULL, 'Ivory Coast (see Cote d\'Ivoire)', NULL, 'CI'),
(40, 'Cambodge', NULL, 'Cambodia', NULL, 'KH'),
(41, 'Cameroun', NULL, 'Cameroon', NULL, 'CM'),
(42, 'Canada', NULL, 'Canada', NULL, 'CA'),
(43, 'Cap-Vert', NULL, 'Cape Verde', NULL, 'CV'),
(44, 'Chili', NULL, 'Chile', NULL, 'CL'),
(45, 'Chine', NULL, 'China', NULL, 'CN'),
(46, 'Chypre', NULL, 'Cyprus', NULL, 'CY'),
(47, 'Colombie', NULL, 'Colombia', NULL, 'CO'),
(48, 'Comores', NULL, 'Comoros', NULL, 'KM'),
(49, 'Congo', NULL, 'Congo', NULL, 'CG'),
(50, 'Corée du Nord', NULL, 'Korea, Demo. People s Rep. of', NULL, 'KP'),
(51, 'Corée du Sud', NULL, 'Korea, (South) Republic of', NULL, 'KR'),
(52, 'Costa Rica', NULL, 'Costa Rica', NULL, 'CR'),
(53, 'Croatie', NULL, 'Croatia', NULL, 'HR'),
(54, 'Cuba', NULL, 'Cuba', NULL, 'CU'),
(55, 'Danemark', NULL, 'Denmark', NULL, 'DK'),
(56, 'Djibouti', NULL, 'Djibouti', NULL, 'DJ'),
(57, 'Dominique', NULL, 'Dominica', NULL, 'DM'),
(58, 'Égypte', NULL, 'Egypt', NULL, 'EG'),
(59, 'Émirats arabes unis', NULL, 'United Arab Emirates', NULL, 'AE'),
(60, 'Équateur', NULL, 'Ecuador', NULL, 'EC'),
(61, 'Érythrée', NULL, 'Eritrea', NULL, 'ER'),
(62, 'Espagne', NULL, 'Spain', NULL, 'ES'),
(63, 'Estonie', NULL, 'Estonia', NULL, 'EE'),
(64, 'États-Unis', NULL, 'United States', NULL, 'US'),
(65, 'Éthiopie', NULL, 'Ethiopia', NULL, 'ET'),
(66, 'Finlande', NULL, 'Finland', NULL, 'FI'),
(67, 'France', NULL, 'France', NULL, 'FR'),
(68, 'Géorgie', NULL, 'Georgia', NULL, 'GE'),
(69, 'Gabon', NULL, 'Gabon', NULL, 'GA'),
(70, 'Gambie', NULL, 'Gambia, the', NULL, 'GM'),
(71, 'Ghana', NULL, 'Ghana', NULL, 'GH'),
(72, 'Gibraltar', NULL, 'Gibraltar', NULL, 'GI'),
(73, 'Grèce', NULL, 'Greece', NULL, 'GR'),
(74, 'Grenade', NULL, 'Grenada', NULL, 'GD'),
(75, 'Groenland', NULL, 'Greenland', NULL, 'GL'),
(76, 'Guadeloupe', NULL, 'Guinea, Equatorial', NULL, 'GP'),
(77, 'Guam', NULL, 'Guam', NULL, 'GU'),
(78, 'Guatemala', NULL, 'Guatemala', NULL, 'GT'),
(79, 'Guinée', NULL, 'Guinea', NULL, 'GN'),
(80, 'Guinée équatoriale', NULL, 'Equatorial Guinea', NULL, 'GQ'),
(81, 'Guinée-Bissao', NULL, 'Guinea-Bissau', NULL, 'GW'),
(82, 'Guyana', NULL, 'Guyana', NULL, 'GY'),
(83, 'Guyane française', NULL, 'Guiana, French', NULL, 'GF'),
(84, 'Haïti', NULL, 'Haiti', NULL, 'HT'),
(85, 'Honduras', NULL, 'Honduras', NULL, 'HN'),
(86, 'Hong Kong', NULL, 'Hong Kong, (China)', NULL, 'HK'),
(87, 'Hongrie', NULL, 'Hungary', NULL, 'HU'),
(88, 'Ile Bouvet', NULL, 'Bouvet Island', NULL, 'BV'),
(89, 'Ile Christmas', NULL, 'Christmas Island', NULL, 'CX'),
(90, 'Ile Norfolk', NULL, 'Norfolk Island', NULL, 'NF'),
(91, 'Iles Cayman', NULL, 'Cayman Islands', NULL, 'KY'),
(92, 'Iles Cook', NULL, 'Cook Islands', NULL, 'CK'),
(93, 'Iles Féroé', NULL, 'Faroe Islands', NULL, 'FO'),
(94, 'Iles Falkland', NULL, 'Falkland Islands (Malvinas)', NULL, 'FK'),
(95, 'Iles Fidji', NULL, 'Fiji', NULL, 'FJ'),
(96, 'Iles Géorgie du Sud et Sandwich du Sud', NULL, 'S. Georgia and S. Sandwich Is.', NULL, 'GS'),
(97, 'Iles Heard et McDonald', NULL, 'Heard and McDonald Islands', NULL, 'HM'),
(98, 'Iles Marshall', NULL, 'Marshall Islands', NULL, 'MH'),
(99, 'Iles Pitcairn', NULL, 'Pitcairn Island', NULL, 'PN'),
(100, 'Iles Salomon', NULL, 'Solomon Islands', NULL, 'SB'),
(101, 'Iles Svalbard et Jan Mayen', NULL, 'Svalbard and Jan Mayen Islands', NULL, 'SJ'),
(102, 'Iles Turks-et-Caicos', NULL, 'Turks and Caicos Islands', NULL, 'TC'),
(103, 'Iles Vierges américaines', NULL, 'Virgin Islands, U.S.', NULL, 'VI'),
(104, 'Iles Vierges britanniques', NULL, 'Virgin Islands, British', NULL, 'VG'),
(105, 'Iles des Cocos (Keeling)', NULL, 'Cocos (Keeling) Islands', NULL, 'CC'),
(106, 'Iles mineures éloignées des États-Unis', NULL, 'US Minor Outlying Islands', NULL, 'UM'),
(107, 'Inde', NULL, 'India', NULL, 'IN'),
(108, 'Indonésie', NULL, 'Indonesia', NULL, 'ID'),
(109, 'Iran', NULL, 'Iran, Islamic Republic of', NULL, 'IR'),
(110, 'Iraq', NULL, 'Iraq', NULL, 'IQ'),
(111, 'Irlande', NULL, 'Ireland', NULL, 'IE'),
(112, 'Islande', NULL, 'Iceland', NULL, 'IS'),
(113, 'Israël', NULL, 'Israel', NULL, 'IL'),
(114, 'Italie', NULL, 'Italy', NULL, 'IT'),
(115, 'Jamaïque', NULL, 'Jamaica', NULL, 'JM'),
(116, 'Japon', NULL, 'Japan', NULL, 'JP'),
(117, 'Jordanie', NULL, 'Jordan', NULL, 'JO'),
(118, 'Kazakhstan', NULL, 'Kazakhstan', NULL, 'KZ'),
(119, 'Kenya', NULL, 'Kenya', NULL, 'KE'),
(120, 'Kirghizistan', NULL, 'Kyrgyzstan', NULL, 'KG'),
(121, 'Kiribati', NULL, 'Kiribati', NULL, 'KI'),
(122, 'Koweït', NULL, 'Kuwait', NULL, 'KW'),
(123, 'Laos', NULL, 'Lao People s Democratic Republic', NULL, 'LA'),
(124, 'Lesotho', NULL, 'Lesotho', NULL, 'LS'),
(125, 'Lettonie', NULL, 'Latvia', NULL, 'LV'),
(126, 'Liban', NULL, 'Lebanon', NULL, 'LB'),
(127, 'Liberia', NULL, 'Liberia', NULL, 'LR'),
(128, 'Libye', NULL, 'Libyan Arab Jamahiriya', NULL, 'LY'),
(129, 'Liechtenstein', NULL, 'Liechtenstein', NULL, 'LI'),
(130, 'Lituanie', NULL, 'Lithuania', NULL, 'LT'),
(131, 'Luxembourg', NULL, 'Luxembourg', NULL, 'LU'),
(132, 'Macao', NULL, 'Macao, (China)', NULL, 'MO'),
(133, 'Madagascar', NULL, 'Madagascar', NULL, 'MG'),
(134, 'Malaisie', NULL, 'Malaysia', NULL, 'MY'),
(135, 'Malawi', NULL, 'Malawi', NULL, 'MW'),
(136, 'Maldives', NULL, 'Maldives', NULL, 'MV'),
(137, 'Mali', NULL, 'Mali', NULL, 'ML'),
(138, 'Malte', NULL, 'Malta', NULL, 'MT'),
(139, 'Mariannes du Nord', NULL, 'Northern Mariana Islands', NULL, 'MP'),
(140, 'Maroc', NULL, 'Morocco', NULL, 'MA'),
(141, 'Martinique', NULL, 'Martinique', NULL, 'MQ'),
(142, 'Maurice', NULL, 'Mauritius', NULL, 'MU'),
(143, 'Mauritanie', NULL, 'Mauritania', NULL, 'MR'),
(144, 'Mayotte', NULL, 'Mayotte', NULL, 'YT'),
(145, 'Mexique', NULL, 'Mexico', NULL, 'MX'),
(146, 'Micronésie', NULL, 'Micronesia, Federated States of', NULL, 'FM'),
(147, 'Moldavie', NULL, 'Moldova, Republic of', NULL, 'MD'),
(148, 'Monaco', NULL, 'Monaco', NULL, 'MC'),
(149, 'Mongolie', NULL, 'Mongolia', NULL, 'MN'),
(150, 'Montserrat', NULL, 'Montserrat', NULL, 'MS'),
(151, 'Mozambique', NULL, 'Mozambique', NULL, 'MZ'),
(152, 'Népal', NULL, 'Nepal', NULL, 'NP'),
(153, 'Namibie', NULL, 'Namibia', NULL, 'NA'),
(154, 'Nauru', NULL, 'Nauru', NULL, 'NR'),
(155, 'Nicaragua', NULL, 'Nicaragua', NULL, 'NI'),
(156, 'Niger', NULL, 'Niger', NULL, 'NE'),
(157, 'Nigeria', NULL, 'Nigeria', NULL, 'NG'),
(158, 'Nioué', NULL, 'Niue', NULL, 'NU'),
(159, 'Norvège', NULL, 'Norway', NULL, 'NO'),
(160, 'Nouvelle-Calédonie', NULL, 'New Caledonia', NULL, 'NC'),
(161, 'Nouvelle-Zélande', NULL, 'New Zealand', NULL, 'NZ'),
(162, 'Oman', NULL, 'Oman', NULL, 'OM'),
(163, 'Ouganda', NULL, 'Uganda', NULL, 'UG'),
(164, 'Ouzbékistan', NULL, 'Uzbekistan', NULL, 'UZ'),
(165, 'Pérou', NULL, 'Peru', NULL, 'PE'),
(166, 'Pakistan', NULL, 'Pakistan', NULL, 'PK'),
(167, 'Panama', NULL, 'Panama', NULL, 'PA'),
(168, 'Papouasie-Nouvelle-Guinée', NULL, 'Papua New Guinea', NULL, 'PG'),
(169, 'Paraguay', NULL, 'Paraguay', NULL, 'PY'),
(170, 'country-Bas', NULL, 'Netherlands', NULL, 'NL'),
(171, 'Philippines', NULL, 'Philippines', NULL, 'PH'),
(172, 'Pologne', NULL, 'Poland', NULL, 'PL'),
(173, 'Polynésie française', NULL, 'French Polynesia', NULL, 'PF'),
(174, 'Porto Rico', NULL, 'Puerto Rico', NULL, 'PR'),
(175, 'Portugal', NULL, 'Portugal', NULL, 'PT'),
(176, 'Qatar', NULL, 'Qatar', NULL, 'QA'),
(177, 'République centrafricaine', NULL, 'Central African Republic', NULL, 'CF'),
(178, 'République démocratique du Congo', NULL, 'Congo, Democratic Rep. of the', NULL, 'CD'),
(179, 'République dominicaine', NULL, 'Dominican Republic', NULL, 'DO'),
(180, 'République tchèque', NULL, 'Czech Republic', NULL, 'CZ'),
(181, 'Réunion', NULL, 'Reunion', NULL, 'RE'),
(182, 'Roumanie', NULL, 'Romania', NULL, 'RO'),
(183, 'Royaume-Uni', NULL, 'Saint Pierre and Miquelon', NULL, 'GB'),
(184, 'Russie', NULL, 'Russia (Russian Federation)', NULL, 'RU'),
(185, 'Rwanda', NULL, 'Rwanda', NULL, 'RW'),
(186, 'Sénégal', NULL, 'Senegal', NULL, 'SN'),
(187, 'Sahara occidental', NULL, 'Western Sahara', NULL, 'EH'),
(188, 'Saint-Christophe-et-Niévès', NULL, 'Saint Kitts and Nevis', NULL, 'KN'),
(189, 'Saint-Marin', NULL, 'San Marino', NULL, 'SM'),
(190, 'Saint-Pierre-et-Miquelon', NULL, 'Saint Pierre and Miquelon', NULL, 'PM'),
(191, 'Saint-Siège ', NULL, 'Vatican City State (Holy See)', NULL, 'VA'),
(192, 'Saint-Vincent-et-les-Grenadines', NULL, 'Saint Vincent and the Grenadines', NULL, 'VC'),
(193, 'Sainte-Hélène', NULL, 'Saint Helena', NULL, 'SH'),
(194, 'Sainte-Lucie', NULL, 'Saint Lucia', NULL, 'LC'),
(195, 'Salvador', NULL, 'El Salvador', NULL, 'SV'),
(196, 'Samoa', NULL, 'Samoa', NULL, 'WS'),
(197, 'Samoa américaines', NULL, 'American Samoa', NULL, 'AS'),
(198, 'Sao Tomé-et-Principe', NULL, 'Sao Tome and Principe', NULL, 'ST'),
(199, 'Seychelles', NULL, 'Seychelles', NULL, 'SC'),
(200, 'Sierra Leone', NULL, 'Sierra Leone', NULL, 'SL'),
(201, 'Singapour', NULL, 'Singapore', NULL, 'SG'),
(202, 'Slovénie', NULL, 'Slovenia', NULL, 'SI'),
(203, 'Slovaquie', NULL, 'Slovakia', NULL, 'SK'),
(204, 'Somalie', NULL, 'Somalia', NULL, 'SO'),
(205, 'Soudan', NULL, 'Sudan', NULL, 'SD'),
(206, 'Sri Lanka', NULL, 'Sri Lanka (ex-Ceilan)', NULL, 'LK'),
(207, 'Suède', NULL, 'Sweden', NULL, 'SE'),
(208, 'Suisse', NULL, 'Switzerland', NULL, 'CH'),
(209, 'Suriname', NULL, 'Suriname', NULL, 'SR'),
(210, 'Swaziland', NULL, 'Swaziland', NULL, 'SZ'),
(211, 'Syrie', NULL, 'Syrian Arab Republic', NULL, 'SY'),
(212, 'Taïwan', NULL, 'Taiwan', NULL, 'TW'),
(213, 'Tadjikistan', NULL, 'Tajikistan', NULL, 'TJ'),
(214, 'Tanzanie', NULL, 'Tanzania, United Republic of', NULL, 'TZ'),
(215, 'Tchad', NULL, 'Chad', NULL, 'TD'),
(216, 'Terres australes françaises', NULL, 'French Southern Territories - TF', NULL, 'TF'),
(217, 'Territoire britannique de l Océan Indien', NULL, 'British Indian Ocean Territory', NULL, 'IO'),
(218, 'Thaïlande', NULL, 'Thailand', NULL, 'TH'),
(219, 'Timor Oriental', NULL, 'Timor-Leste (East Timor)', NULL, 'TL'),
(220, 'Togo', NULL, 'Togo', NULL, 'TG'),
(221, 'Tokélaou', NULL, 'Tokelau', NULL, 'TK'),
(222, 'Tonga', NULL, 'Tonga', NULL, 'TO'),
(223, 'Trinité-et-Tobago', NULL, 'Trinidad & Tobago', NULL, 'TT'),
(224, 'Tunisie', NULL, 'Tunisia', NULL, 'TN'),
(225, 'Turkménistan', NULL, 'Turkmenistan', NULL, 'TM'),
(226, 'Turquie', NULL, 'Turkey', NULL, 'TR'),
(227, 'Tuvalu', NULL, 'Tuvalu', NULL, 'TV'),
(228, 'Ukraine', NULL, 'Ukraine', NULL, 'UA'),
(229, 'Uruguay', NULL, 'Uruguay', NULL, 'UY'),
(230, 'Vanuatu', NULL, 'Vanuatu', NULL, 'VU'),
(231, 'Venezuela', NULL, 'Venezuela', NULL, 'VE'),
(232, 'Viêt Nam', NULL, 'Viet Nam', NULL, 'VN'),
(233, 'Wallis-et-Futuna', NULL, 'Wallis and Futuna', NULL, 'WF'),
(234, 'Yémen', NULL, 'Yemen', NULL, 'YE'),
(235, 'Yougoslavie', NULL, 'Saint Pierre and Miquelon', NULL, 'YU'),
(236, 'Zambie', NULL, 'Zambia', NULL, 'ZM'),
(237, 'Zimbabwe', NULL, 'Zimbabwe', NULL, 'ZW'),
(238, 'ex-République yougoslave de Macédoine', NULL, 'Macedonia, TFYR', NULL, 'MK');

-- --------------------------------------------------------

--
-- Table structure for table `specialite`
--

CREATE TABLE `specialite` (
  `id` int NOT NULL,
  `nom` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 TABLESPACE `epole_candi_p12_2024`;

--
-- Dumping data for table `specialite`
--

INSERT INTO `specialite` (`id`, `nom`, `description`) VALUES
(1, 'Economie Publique et Gestion Publique', 'Economie Publique et Gestion Publique'),
(2, 'Fiscalité, Finance et Comptabilité Publique', 'Fiscalité, Finance et Comptabilité Publique'),
(3, 'Gouvernance Territoriale et Finances Publiques locales', 'Gouvernance Territoriale et Finances Publiques locales'),
(4, 'Marchés Publics et Partenariats Public-Privés', 'Marchés Publics et Partenariats Public-Privés'),
(5, 'Audit et contrôle', 'Audit et contrôle');

-- --------------------------------------------------------

--
-- Structure for view `candidature2024`
--
DROP TABLE IF EXISTS `candidature2024`;

CREATE ALGORITHM=UNDEFINED DEFINER=`epole_candi_p12_2024`@`%` SQL SECURITY DEFINER VIEW `candidature2024`  AS SELECT `candidats`.`id` AS `id`, `candidats`.`id_specialite` AS `id_specialite`, `candidats`.`id_pays` AS `id_pays`, `candidats`.`nom` AS `nom`, `candidats`.`prenom` AS `prenom`, `candidats`.`epouse` AS `epouse`, `candidats`.`date_naissance` AS `date_naissance`, `candidats`.`nationalite` AS `nationalite`, `candidats`.`lieu_de_naissce` AS `lieu_de_naissce`, `candidats`.`region_dorigine` AS `region_dorigine`, `candidats`.`sexe` AS `sexe`, `candidats`.`statu_matrimonial` AS `statu_matrimonial`, `candidats`.`nombre_enfant` AS `nombre_enfant`, `candidats`.`adresse_candidat` AS `adresse_candidat`, `candidats`.`telephone` AS `telephone`, `candidats`.`telephone2` AS `telephone2`, `candidats`.`email` AS `email`, `candidats`.`ville_residence` AS `ville_residence`, `candidats`.`pays_residence` AS `pays_residence`, `candidats`.`paysorigine` AS `paysorigine`, `candidats`.`nombre_annee_etude_sup` AS `nombre_annee_etude_sup`, `candidats`.`dernier_diplome` AS `dernier_diplome`, `candidats`.`diplome_obtenu_a` AS `diplome_obtenu_a`, `candidats`.`annee_optention_diplome` AS `annee_optention_diplome`, `candidats`.`statut_prof` AS `statut_prof`, `candidats`.`structure` AS `structure`, `candidats`.`adresse_structure` AS `adresse_structure`, `candidats`.`telephone_structure` AS `telephone_structure`, `candidats`.`email_structure` AS `email_structure`, `candidats`.`accepter_condition` AS `accepter_condition`, `candidats`.`etat` AS `etat`, `candidats`.`ordre_candidature` AS `ordre_candidature`, `candidats`.`date_enregistrement` AS `date_enregistrement`, `candidats`.`langue` AS `langue`, `candidats`.`civilite` AS `civilite`, `candidats`.`type_etude` AS `type_etude`, `candidats`.`dept_dorigine` AS `dept_dorigine`, `candidats`.`diplome_requis` AS `diplome_requis`, `candidats`.`specialite_requise` AS `specialite_requise`, `candidats`.`a_depose` AS `a_depose`, `specialite`.`nom` AS `specialite`, `pays`.`nom` AS `pays` FROM ((`candidats` join `pays`) join `specialite`) WHERE ((`candidats`.`id_specialite` = `specialite`.`id`) AND (`candidats`.`id_pays` = `pays`.`id`) AND (`candidats`.`a_depose` = 1)) ;

-- --------------------------------------------------------

--
-- Structure for view `candidatureFull2023`
--
DROP TABLE IF EXISTS `candidatureFull2023`;

CREATE ALGORITHM=UNDEFINED DEFINER=`epole_candi_p12_2024`@`%` SQL SECURITY DEFINER VIEW `candidatureFull2023`  AS SELECT `candidats`.`id` AS `id`, `candidats`.`id_specialite` AS `id_specialite`, `candidats`.`id_pays` AS `id_pays`, `candidats`.`nom` AS `nom`, `candidats`.`prenom` AS `prenom`, `candidats`.`epouse` AS `epouse`, `candidats`.`date_naissance` AS `date_naissance`, `candidats`.`nationalite` AS `nationalite`, `candidats`.`lieu_de_naissce` AS `lieu_de_naissce`, `candidats`.`region_dorigine` AS `region_dorigine`, `candidats`.`sexe` AS `sexe`, `candidats`.`statu_matrimonial` AS `statu_matrimonial`, `candidats`.`nombre_enfant` AS `nombre_enfant`, `candidats`.`adresse_candidat` AS `adresse_candidat`, `candidats`.`telephone` AS `telephone`, `candidats`.`telephone2` AS `telephone2`, `candidats`.`email` AS `email`, `candidats`.`ville_residence` AS `ville_residence`, `candidats`.`pays_residence` AS `pays_residence`, `candidats`.`paysorigine` AS `paysorigine`, `candidats`.`nombre_annee_etude_sup` AS `nombre_annee_etude_sup`, `candidats`.`dernier_diplome` AS `dernier_diplome`, `candidats`.`diplome_obtenu_a` AS `diplome_obtenu_a`, `candidats`.`annee_optention_diplome` AS `annee_optention_diplome`, `candidats`.`statut_prof` AS `statut_prof`, `candidats`.`structure` AS `structure`, `candidats`.`adresse_structure` AS `adresse_structure`, `candidats`.`telephone_structure` AS `telephone_structure`, `candidats`.`email_structure` AS `email_structure`, `candidats`.`accepter_condition` AS `accepter_condition`, `candidats`.`etat` AS `etat`, `candidats`.`ordre_candidature` AS `ordre_candidature`, `candidats`.`date_enregistrement` AS `date_enregistrement`, `candidats`.`langue` AS `langue`, `candidats`.`civilite` AS `civilite`, `candidats`.`type_etude` AS `type_etude`, `candidats`.`dept_dorigine` AS `dept_dorigine`, `candidats`.`diplome_requis` AS `diplome_requis`, `candidats`.`specialite_requise` AS `specialite_requise`, `candidats`.`a_depose` AS `a_depose`, `pays`.`nom` AS `pays`, `specialite`.`nom` AS `specialite` FROM ((`candidats` join `specialite`) join `pays`) WHERE ((`candidats`.`id_specialite` = `specialite`.`id`) AND (`pays`.`id` = `candidats`.`id_pays`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12884;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
