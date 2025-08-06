<html lang="fr">
<head>
    <style>
        @page {
            margin: 25px;
        }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .filigrane {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-40deg);
            font-size: 100px;
            font-weight: 800;
            color: rgba(0, 0, 0, 0.08);
            z-index: -1000;
            text-align: center;
        }
        .header-table {
            width: 100%;
            padding-bottom: 5px;
        }
        .header-left, .header-right {
            font-size: 9px;
            text-align: center;
            width: 38%;
            line-height: 1.3;
        }
        .header-middle {
            width: 24%;
            text-align: center;
        }
        .header-middle img {
            width: 90px;
        }
        .main-title {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .main-title h1 {
            font-size: 16px;
            color: #4a0e6c;
            margin: 0;
        }
        .main-title p {
            font-size: 11px;
            margin: 2px 0;
        }
        .photo-box {
            position: absolute;
            top: 136px;
            right: 1px;
            border: 1px solid #ccc;
            width: 140px;
            height: 120px;
            text-align: center;
            font-size: 10px;
            color: #999;
            padding-top: 50px;
        }
        .section {
            margin-bottom: 5px;
            clear: both;
        }
        .section-title {
            background: #f0e6f7;
            border-left: 4px solid #6a0dad;
            padding: 5px 10px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            font-size: 11px;
        }
        .info-grid {
            display: -dompdf-flex;
            flex-wrap: wrap;
        }
        .info-row {
            margin-bottom: 5px;
            padding-left: 10px;
            width: 100%;
        }
        .info-row.half {
            width: 100%;
        }
        .info-label {
            display: inline-block;
            width: 30%;
            font-weight: bold;
            vertical-align: top;
            color: #555;
        }
        .info-value {
            display: inline-block;
            width: 70%;
        }
        .footer {
            font-size: 8px;
            text-align: center;
            color: #666;
            position: fixed;
            bottom: 0px;
            left: 25px;
            right: 25px;
            padding-top: 5px;
        }
        .footer p {
            margin: 0;
        }
        .page-break {
            page-break-after: always;
        }
        .engagement-section {
            margin-top: 10px;
            font-size: 9px;
            text-align: justify;
        }
        .signature-area {
            margin-top: 30px;
        }
        .signature-line {
            display: inline-block;
            width: 200px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Wrapper for each copy -->
<div class="page-wrapper">
    <div class="filigrane">COPIE CANDIDAT</div>

    <table class="header-table">
        <tr>
            <td class="header-left">
                REPUBLIQUE DU CAMEROUN <br> Paix- Travail- Patrie<br> MINISTERE DES FINANCES<br> SECRETARIAT GENERAL<br> PROGRAMME SUPERIEUR DE SPECIALISATION <br> EN FINANCES PUBLIQUES
            </td>
            <td class="header-middle">
                <img src="<?= base_url() ?>resources/assets/images/logo.png" alt="Logo">
            </td>
            <td class="header-right">
                REPUBLIC OF CAMEROON<br> Peace- Work- Fatherland<br> MINISTRY OF FINANCE<br> GENERAL SECRETARIAT<br> ADVANCED PROGRAM OF SPECIALISATION<br> IN PUBLIC FINANCE
            </td>
        </tr>
    </table>

    <div class="main-title">
        <h1>FICHE DE CANDIDATURE</h1>
        <p>Master Professionnel en Finances Publiques (Promotion 13)</p>
        <p>N° de candidature : <strong><?php echo $candidat->ordre_candidature; ?></strong></p>
    </div>

    <div class="photo-box">
        Photo 4x4
    </div>

    <div class="section">
        <div class="section-title">I – Formation Souhaitée</div>
        <div class="info-grid">
            <div class="info-row "><span class="info-label">Spécialité:</span><span class="info-value"><?php echo $candidat->specialite; ?></span></div>
            <div class="info-row "><span class="info-label">Mode de formation:</span><span class="info-value"><?php echo $candidat->type_etude; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">II – Informations Personnelles</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Civilité:</span><span class="info-value"><?php echo $candidat->civilite; ?></span></div>
            <div class="info-row half"><span class="info-label">Nom(s) et Prénom(s):</span><span class="info-value"><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></span></div>
            <?php if (!empty($candidat->epouse)): ?>
            <div class="info-row half"><span class="info-label">Nom d'épouse:</span><span class="info-value"><?php echo $candidat->epouse; ?></span></div>
            <?php endif; ?>
            <div class="info-row half"><span class="info-label">Né(e) le:</span><span class="info-value"><?php echo date('d/m/Y', strtotime($candidat->date_naissance)) . ' à ' . $candidat->lieu_de_naissce; ?></span></div>
            <div class="info-row half"><span class="info-label">Nationalité:</span><span class="info-value"><?php echo $candidat->nationalite; ?></span></div>
            <div class="info-row half"><span class="info-label">Statut matrimonial:</span><span class="info-value"><?php echo $candidat->statu_matrimonial; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">III – Coordonnées</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Adresse:</span><span class="info-value"><?php echo $candidat->adresse_candidat; ?></span></div>
            <div class="info-row half"><span class="info-label">Ville de résidence:</span><span class="info-value"><?php echo $candidat->ville_residence; ?></span></div>
            <div class="info-row half"><span class="info-label">Téléphone (WhatsApp):</span><span class="info-value"><?php echo $candidat->telephone; ?></span></div>
            <div class="info-row half"><span class="info-label">Téléphone (Secondaire):</span><span class="info-value"><?php echo $candidat->telephone2 ?: '-'; ?></span></div>
            <div class="info-row"><span class="info-label">Email:</span><span class="info-value"><?php echo $candidat->email; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">IV – Cursus Académique (Dernier diplôme obtenu)</div>
        <div class="info-grid">
            <div class="info-row"><span class="info-label">Intitulé du diplôme:</span><span class="info-value"><?php echo $candidat->dernier_diplome_intitule; ?></span></div>
            <div class="info-row half"><span class="info-label">Spécialité/Filière:</span><span class="info-value"><?php echo $candidat->dernier_diplome_specialite; ?></span></div>
            <div class="info-row half"><span class="info-label">Niveau:</span><span class="info-value"><?php echo $candidat->dernier_diplome_niveau; ?></span></div>
            <div class="info-row half"><span class="info-label">Établissement:</span><span class="info-value"><?php echo $candidat->dernier_diplome_etablissement; ?></span></div>
            <div class="info-row half"><span class="info-label">Année d'obtention:</span><span class="info-value"><?php echo $candidat->dernier_diplome_annee; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">V – Situation Professionnelle</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Statut:</span><span class="info-value"><?php echo $candidat->statut_prof; ?></span></div>
            <div class="info-row half"><span class="info-label">Expérience (années):</span><span class="info-value"><?php echo $candidat->total_annees_experience ?: 'Non spécifié'; ?></span></div>
            <?php if ($candidat->statut_prof !== 'Étudiant / en recherche d\'emploi' && $candidat->statut_prof !== 'Etudiant'): ?>
            <div class="info-row"><span class="info-label">Employeur:</span><span class="info-value"><?php echo $candidat->structure; ?></span></div>
            <div class="info-row"><span class="info-label">Poste occupé:</span><span class="info-value"><?php echo $candidat->poste_actuel; ?></span></div>
            <div class="info-row"><span class="info-label">Lien avec les FP:</span><span class="info-value"><?php echo $candidat->lien_finances_publiques; ?></span></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section">
        <div class="section-title">VI – Engagement</div>
        <div class="section engagement-section">
            <p>
                Je soussigné(e), <strong><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></strong>, certifie sur l'honneur l'exactitude des renseignements consignés dans cette fiche et avoir pris connaissance des conditions d'admission au Programme Supérieur de Spécialisation en Finance Publiques.
            </p>
        </div>
    </div>

    <div class="signature-area" style="margin-top: 1px; text-align: right">
        <div style="width: 100%; text-align: right; margin-bottom: 25px;">Fait à ____________________, le ____/____/________</div>
        <div style="float: left; width: 50%; text-align: center;">
            <strong>Signature du candidat</strong>
        </div>
        <div style="float: right; width: 50%; text-align: center;">
            <strong>Cachet et visa du PSSFP</strong>
        </div>
    </div>

</div>

<div class="footer">
    <p>Plateforme PSSFP – © <?php echo date('Y'); ?> – Tous droits réservés - Généré le <?php echo date('d/m/Y à H:i'); ?></p>
    <p style="font-size:7px;">B.P: 16 578 Yaoundé – Cameroun | Tel.: +237 697 92 13 32 / 242 22 76 81 | Web: www.pfinancespubliques.org | E-Mail: info@pfinancespubliques.org</p>
</div>

<!-- Saut de page pour la copie administration -->
<div class="page-break"></div>

<!-- Deuxième page - Copie Administration -->
<div class="page-wrapper">
    <div class="filigrane">COPIE ADMINISTRATION</div>

    <table class="header-table">
        <tr>
            <td class="header-left">
                REPUBLIQUE DU CAMEROUN <br> Paix- Travail- Patrie<br> MINISTERE DES FINANCES<br> SECRETARIAT GENERAL<br> PROGRAMME SUPERIEUR DE SPECIALISATION <br> EN FINANCES PUBLIQUES
            </td>
            <td class="header-middle">
                <img src="<?= base_url() ?>resources/assets/images/logo.png" alt="Logo">
            </td>
            <td class="header-right">
                REPUBLIC OF CAMEROON<br> Peace- Work- Fatherland<br> MINISTRY OF FINANCE<br> GENERAL SECRETARIAT<br> ADVANCED PROGRAM OF SPECIALISATION<br> IN PUBLIC FINANCE
            </td>
        </tr>
    </table>

    <div class="main-title">
        <h1>FICHE DE CANDIDATURE</h1>
        <p>Master Professionnel en Finances Publiques (Promotion 13)</p>
        <p>N° de candidature : <strong><?php echo $candidat->ordre_candidature; ?></strong></p>
    </div>

    <div class="photo-box">
        Photo 4x4
    </div>

    <div class="section">
        <div class="section-title">I – Formation Souhaitée</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Spécialité:</span><span class="info-value"><?php echo $candidat->specialite; ?></span></div>
            <div class="info-row half"><span class="info-label">Mode de formation:</span><span class="info-value"><?php echo $candidat->type_etude; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">II – Informations Personnelles</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Civilité:</span><span class="info-value"><?php echo $candidat->civilite; ?></span></div>
            <div class="info-row half"><span class="info-label">Nom(s) et Prénom(s):</span><span class="info-value"><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></span></div>
            <?php if (!empty($candidat->epouse)): ?>
            <div class="info-row half"><span class="info-label">Nom d'épouse:</span><span class="info-value"><?php echo $candidat->epouse; ?></span></div>
            <?php endif; ?>
            <div class="info-row half"><span class="info-label">Né(e) le:</span><span class="info-value"><?php echo date('d/m/Y', strtotime($candidat->date_naissance)) . ' à ' . $candidat->lieu_de_naissce; ?></span></div>
            <div class="info-row half"><span class="info-label">Nationalité:</span><span class="info-value"><?php echo $candidat->nationalite; ?></span></div>
            <div class="info-row half"><span class="info-label">Statut matrimonial:</span><span class="info-value"><?php echo $candidat->statu_matrimonial; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">III – Coordonnées</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Adresse:</span><span class="info-value"><?php echo $candidat->adresse_candidat; ?></span></div>
            <div class="info-row half"><span class="info-label">Ville de résidence:</span><span class="info-value"><?php echo $candidat->ville_residence; ?></span></div>
            <div class="info-row half"><span class="info-label">Téléphone (WhatsApp):</span><span class="info-value"><?php echo $candidat->telephone; ?></span></div>
            <div class="info-row half"><span class="info-label">Téléphone (Secondaire):</span><span class="info-value"><?php echo $candidat->telephone2 ?: '-'; ?></span></div>
            <div class="info-row"><span class="info-label">Email:</span><span class="info-value"><?php echo $candidat->email; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">IV – Cursus Académique (Dernier diplôme obtenu)</div>
        <div class="info-grid">
            <div class="info-row"><span class="info-label">Intitulé du diplôme:</span><span class="info-value"><?php echo $candidat->dernier_diplome_intitule; ?></span></div>
            <div class="info-row half"><span class="info-label">Spécialité/Filière:</span><span class="info-value"><?php echo $candidat->dernier_diplome_specialite; ?></span></div>
            <div class="info-row half"><span class="info-label">Niveau:</span><span class="info-value"><?php echo $candidat->dernier_diplome_niveau; ?></span></div>
            <div class="info-row half"><span class="info-label">Établissement:</span><span class="info-value"><?php echo $candidat->dernier_diplome_etablissement; ?></span></div>
            <div class="info-row half"><span class="info-label">Année d'obtention:</span><span class="info-value"><?php echo $candidat->dernier_diplome_annee; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">V – Situation Professionnelle</div>
        <div class="info-grid">
            <div class="info-row half"><span class="info-label">Statut:</span><span class="info-value"><?php echo $candidat->statut_prof; ?></span></div>
            <div class="info-row half"><span class="info-label">Expérience (années):</span><span class="info-value"><?php echo $candidat->total_annees_experience ?: 'Non spécifié'; ?></span></div>
            <?php if ($candidat->statut_prof !== 'Étudiant / en recherche d\'emploi' && $candidat->statut_prof !== 'Etudiant'): ?>
            <div class="info-row"><span class="info-label">Employeur:</span><span class="info-value"><?php echo $candidat->structure; ?></span></div>
            <div class="info-row"><span class="info-label">Poste occupé:</span><span class="info-value"><?php echo $candidat->poste_actuel; ?></span></div>
            <div class="info-row"><span class="info-label">Lien avec les FP:</span><span class="info-value"><?php echo $candidat->lien_finances_publiques; ?></span></div>
            <?php endif; ?>
        </div>
    </div>

    <div class="section">
        <div class="section-title">VI – Engagement</div>
        <div class="section engagement-section">
            <p>
                Je soussigné(e), <strong><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></strong>, certifie sur l'honneur l'exactitude des renseignements consignés dans cette fiche et avoir pris connaissance des conditions d'admission au Programme Supérieur de Spécialisation en Finance Publiques.
            </p>
        </div>
    </div>

    <div class="signature-area" style="margin-top: 1px; text-align: right">
        <div style="width: 100%; text-align: right; margin-bottom: 25px;">Fait à ____________________, le ____/____/________</div>
        <div style="float: left; width: 50%; text-align: center;">
            <strong>Signature du candidat</strong>
        </div>
        <div style="float: right; width: 50%; text-align: center;">
            <strong>Cachet et visa du PSSFP</strong>
        </div>
    </div>

</div>

<div class="footer">
    <p>Plateforme PSSFP – © <?php echo date('Y'); ?> – Tous droits réservés - Généré le <?php echo date('d/m/Y à H:i'); ?></p>
    <p style="font-size:7px;">B.P: 16 578 Yaoundé – Cameroun | Tel.: +237 697 92 13 32 / 242 22 76 81 | Web: www.pfinancespubliques.org | E-Mail: info@pfinancespubliques.org</p>
</div>

</body>
</html>
