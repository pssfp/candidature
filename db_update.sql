-- Script SQL pour mettre à jour la structure de la base de données epole_candi_p12_2024
-- Ajout des champs manquants pour correspondre aux formulaires mis à jour
-- Date: 03-08-2025

-- 1. Ajout des nouveaux champs liés au diplôme
ALTER TABLE `candidats`
    ADD COLUMN `dernier_diplome_intitule` VARCHAR(255) NULL COMMENT 'Intitulé exact du dernier diplôme' AFTER `dernier_diplome`,
    ADD COLUMN `dernier_diplome_specialite` VARCHAR(255) NULL COMMENT 'Spécialité/Filière du diplôme' AFTER `dernier_diplome_intitule`,
    ADD COLUMN `dernier_diplome_domaine` VARCHAR(100) NULL COMMENT 'Domaine principal du diplôme' AFTER `dernier_diplome_specialite`,
    ADD COLUMN `dernier_diplome_autre_domaine` VARCHAR(255) NULL COMMENT 'Précision si domaine = Autre' AFTER `dernier_diplome_domaine`,
    ADD COLUMN `dernier_diplome_etablissement` VARCHAR(255) NULL COMMENT 'Établissement d\'obtention du diplôme' AFTER `dernier_diplome_autre_domaine`,
    ADD COLUMN `dernier_diplome_pays` INT NULL COMMENT 'ID du pays de l\'établissement' AFTER `dernier_diplome_etablissement`,
    ADD COLUMN `dernier_diplome_annee` INT NULL COMMENT 'Année d\'obtention du diplôme' AFTER `dernier_diplome_pays`,
    ADD COLUMN `dernier_diplome_niveau` VARCHAR(50) NULL COMMENT 'Niveau académique (BAC+3, BAC+4, etc.)' AFTER `dernier_diplome_annee`,
    ADD COLUMN `dernier_diplome_mention` VARCHAR(50) NULL COMMENT 'Mention obtenue' AFTER `dernier_diplome_niveau`;

-- 2. Ajout des nouveaux champs professionnels
ALTER TABLE `candidats`
    ADD COLUMN `autre_statut_prof` VARCHAR(255) NULL COMMENT 'Précision si statut = Autre' AFTER `statut_prof`,
    ADD COLUMN `poste_actuel` VARCHAR(255) NULL COMMENT 'Poste occupé actuellement' AFTER `email_structure`,
    ADD COLUMN `date_debut_poste` VARCHAR(20) NULL COMMENT 'Date de début du poste actuel' AFTER `poste_actuel`,
    ADD COLUMN `lien_finances_publiques` VARCHAR(50) NULL COMMENT 'Lien du poste avec les finances publiques' AFTER `date_debut_poste`,
    ADD COLUMN `explication_lien_partiel` TEXT NULL COMMENT 'Explication si lien partiel' AFTER `lien_finances_publiques`,
    ADD COLUMN `total_annees_experience` DECIMAL(5,1) NULL COMMENT 'Nombre total d\'années d\'expérience' AFTER `explication_lien_partiel`;

-- 3. Ajout du champ pour le détail de la source d'information
ALTER TABLE `candidats`
    ADD COLUMN `howDidYouKnewUs_autre` VARCHAR(255) NULL COMMENT 'Précision si source = Autre' AFTER `howDidYouKnewUs`;

-- 4. Suppression des champs qui ne sont plus utilisés dans le formulaire
ALTER TABLE `candidats`
    DROP COLUMN `specialite_requise`,
    DROP COLUMN `diplome_requis`,
    DROP COLUMN `annee_optention_diplome`,
    DROP COLUMN `diplome_obtenu_a`,
    DROP COLUMN `dernier_diplome`,
    DROP COLUMN `nombre_annee_etude_sup`;

-- 5. Création d'index pour améliorer les performances
CREATE INDEX idx_candidats_diplome_pays ON candidats(dernier_diplome_pays);
CREATE INDEX idx_candidats_specialite ON candidats(id_specialite);
CREATE INDEX idx_candidats_pays ON candidats(id_pays);
CREATE INDEX idx_candidats_email ON candidats(email);

-- 6. Mise à jour des vues pour inclure les nouveaux champs
DROP VIEW IF EXISTS `candidature2024`;
CREATE VIEW `candidature2024` AS
SELECT
    c.*,
    s.nom AS specialite,
    p.nom AS pays
FROM
    candidats c
    JOIN pays p ON c.id_pays = p.id
    JOIN specialite s ON c.id_specialite = s.id
WHERE
    c.a_depose = 1;

DROP VIEW IF EXISTS `candidatureFull2023`;
CREATE VIEW `candidatureFull2023` AS
SELECT
    c.*,
    p.nom AS pays,
    s.nom AS specialite
FROM
    candidats c
    JOIN specialite s ON c.id_specialite = s.id
    JOIN pays p ON c.id_pays = p.id;
