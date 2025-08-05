--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`) VALUES
(1, 'Adamaoua'),
(2, 'Centre'),
(3, 'Est'),
(4, 'Extrême-Nord'),
(5, 'Littoral'),
(6, 'Nord'),
(7, 'Nord-Ouest'),
(8, 'Ouest'),
(9, 'Sud'),
(10, 'Sud-Ouest');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom`, `region_id`) VALUES
-- Adamaoua
(1, 'Djérem', 1),
(2, 'Faro-et-Déo', 1),
(3, 'Mayo-Banyo', 1),
(4, 'Mbéré', 1),
(5, 'Vina', 1),
-- Centre
(6, 'Haute-Sanaga', 2),
(7, 'Lekié', 2),
(8, 'Mbam-et-Inoubou', 2),
(9, 'Mbam-et-Kim', 2),
(10, 'Méfou-et-Afamba', 2),
(11, 'Méfou-et-Akono', 2),
(12, 'Mfoundi', 2),
(13, 'Nyong-et-Kéllé', 2),
(14, 'Nyong-et-Mfoumou', 2),
(15, 'Nyong-et-So''o', 2),
-- Est
(16, 'Boumba-et-Ngoko', 3),
(17, 'Haut-Nyong', 3),
(18, 'Kadey', 3),
(19, 'Lom-et-Djérem', 3),
-- Extrême-Nord
(20, 'Diamaré', 4),
(21, 'Logone-et-Chari', 4),
(22, 'Mayo-Danay', 4),
(23, 'Mayo-Kani', 4),
(24, 'Mayo-Sava', 4),
(25, 'Mayo-Tsanaga', 4),
-- Littoral
(26, 'Moungo', 5),
(27, 'Nkam', 5),
(28, 'Sanaga-Maritime', 5),
(29, 'Wouri', 5),
-- Nord
(30, 'Bénoué', 6),
(31, 'Faro', 6),
(32, 'Mayo-Louti', 6),
(33, 'Mayo-Rey', 6),
-- Nord-Ouest
(34, 'Boyo', 7),
(35, 'Bui', 7),
(36, 'Donga-Mantung', 7),
(37, 'Menchum', 7),
(38, 'Mezam', 7),
(39, 'Momo', 7),
(40, 'Ngo-Ketunjia', 7),
-- Ouest
(41, 'Bamboutos', 8),
(42, 'Haut-Nkam', 8),
(43, 'Hauts-Plateaux', 8),
(44, 'Koung-Khi', 8),
(45, 'Ménoua', 8),
(46, 'Mifi', 8),
(47, 'Ndé', 8),
(48, 'Noun', 8),
-- Sud
(49, 'Dja-et-Lobo', 9),
(50, 'Mvila', 9),
(51, 'Océan', 9),
(52, 'Vallée-du-Ntem', 9),
-- Sud-Ouest
(53, 'Fako', 10),
(54, 'Koupé-Manengouba', 10),
(55, 'Lebialem', 10),
(56, 'Manyu', 10),
(57, 'Meme', 10),
(58, 'Ndian', 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;

