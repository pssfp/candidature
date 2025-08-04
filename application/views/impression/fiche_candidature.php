<html lang="fr">
<head>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
        }

        .filigrane {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 25px;
            font-weight: 800;
            color: rgba(158, 158, 158, 0.2);
            z-index: 0;
        }

        .header {
            position: relative;
            text-align: center;
            border-bottom: -2px solid #6a0dad;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .header h1 {
            color: #6a0dad;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .photo-box {
            float: right;
            border: 1px solid #ccc;
            width: 120px;
            height: 120px;
            margin-left: 10px;
            text-align: center;
            font-size: 10px;
            overflow: hidden;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .qr-box {
            float: right;
            width: 100px;
            height: 100px;
            margin-left: 10px;
            margin-top: 10px;
        }

        .section {
            margin-bottom: 20px;
            clear: both;
        }

        .section-title {
            background: #f4f0ff;
            border-left: 5px solid #6a0dad;
            padding: 5px 10px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .info-row {
            margin: 4px 0;
        }

        .info-label {
            display: inline-block;
            width: 35%;
            font-weight: bold;
            vertical-align: top;
        }

        .info-value {
            display: inline-block;
            width: 60%;
        }

        .footer {
            font-size: 10px;
            text-align: center;
            color: #666;
            border-top: 1px solid #ccc;
            margin-top: 30px;
            padding-top: 10px;
        }

        .qr-container {
            position: absolute;
            bottom: 70px;
            right: 0px;
            text-align: center;
            font-size: 8px;
        }

        .header-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .header-left, .header-right {
            font-size: 9px;
            text-align: center;
            width: 35%;
            margin-bottom: -10px;
        }

        .header-middle {
            width: 30%;
            text-align: center;
        }

        .header-middle img {
            width: 100px;
        }

        .page-break {
            page-break-after: always;
            margin-top: 50px;
        }
    </style>
</head>

<body>
<!-- Première page - Copie Candidat -->
<div class="filigrane">COPIE CANDIDAT</div>

<table class="header-table">
    <tr>
        <td class="header-left">
            REPUBLIQUE DU CAMEROUN <br />
            Paix- Travail- Patrie<br />
            MINISTERE DES FINANCES<br />
            SECRETARIAT GENERAL<br />
            PROGRAMME SUPERIEUR DE SPECIALISATION <br />
            EN FINANCES PUBLIQUES<br />
        </td>
        <td class="header-middle">
            <img src="<?= base_url() ?>resources/assets/images/logo.png" alt="Logo">
        </td>
        <td class="header-right">
            REPUBLIC OF CAMEROON<br />
            Peace- Work- Fatherland<br />
            MINISTRY OF FINANCE<br />
            GENERAL SECRETARIAT<br />
            ADVANCED PROGRAM OF SPECIALISATION<br />
            IN PUBLIC FINANCE<br />
        </td>
    </tr>
</table>

<div class="header">
    <h1>MASTER PROFESSIONNEL EN FINANCES PUBLIQUES</h1>
    <p>Formulaire d'Inscription N°: <?php echo $candidat->ordre_candidature; ?></p>
</div>
<div class="section">
    <div class="section-title">État civil</div>
    <div class="photo-box">
        Photo 4X4
    </div>
    <div class="info-row"><span class="info-label">Nom complet : </span><span class="info-value"><?php echo ' '.$candidat->nom . ' ' . $candidat->prenom; ?></span></div>
    <div class="info-row"><span class="info-label">Épouse :</span><span class="info-value"><?php echo $candidat->epouse; ?></span></div>
    <div class="info-row"><span class="info-label">Date & lieu de naissance :</span><span class="info-value"><?php echo $candidat->date_naissance . ' à ' . $candidat->lieu_de_naissce; ?></span></div>
    <div class="info-row"><span class="info-label">Sexe :</span><span class="info-value"><?php echo $candidat->sexe; ?></span></div>
    <div class="info-row"><span class="info-label">Statut matrimonial :</span><span class="info-value"><?php echo $candidat->statu_matrimonial; ?></span></div>
    <div class="info-row"><span class="info-label">Nationalité :</span><span class="info-value"><?php echo $candidat->nationalite; ?></span></div>
</div>
<div class="section">
    <div class="section-title">Spécialité</div>

    <div class="info-row"><span class="info-label">Spécialité :</span><span class="info-value"><?php echo $candidat->specialite; ?></span></div>
    <div class="info-row"><span class="info-label">Type de formation :</span><span class="info-value"><?php echo $candidat->type_etude; ?></span></div>
</div>


<div class="section">
    <div class="section-title">Coordonnées</div>
    <div class="info-row"><span class="info-label">Lieu de résidence :</span><span class="info-value"><?php echo $candidat->ville_residence; ?></span></div>
    <div class="info-row"><span class="info-label">Téléphones :</span><span class="info-value"><?php echo $candidat->telephone . ' / ' . $candidat->telephone2; ?></span></div>
    <div class="info-row"><span class="info-label">Email :</span><span class="info-value"><?php echo $candidat->email; ?></span></div>
</div>

<div class="section">
    <div class="section-title">Études supérieures</div>
    <div class="info-row"><span class="info-label">Dernier diplôme :</span><span class="info-value"><?php echo $candidat->dernier_diplome_intitule; ?> <strong style="margin-left: 20px"><em>en :</em></strong> <?php echo $candidat->specialite; ?></span></div>
    <div class="info-row"><span class="info-label">Lieu d'obtention :</span><span class="info-value"><?php echo $candidat->dernier_diplome_etablissement; ?></span></div>
    <div class="info-row"><span class="info-label">Année d'obtention :</span><span class="info-value"><?php echo $candidat->dernier_diplome_annee; ?> <strong style="margin-left: 40px"><em>Niveau :</em></strong> <?php echo $candidat->dernier_diplome_niveau; ?></span></div>

</div>

<div class="section">
    <div class="section-title">Coordonnées professionnelles</div>
    <div class="info-row"><span class="info-label">Statut professionnel :</span><span class="info-value"><?php echo $candidat->statut_prof; ?></span></div>
    <div class="info-row"><span class="info-label">en lien avec les finances publiques ? :</span><span class="info-value"><?php echo $candidat->structure; ?></span></div>
    <div class="info-row"><span class="info-label">Année d'expérience</span><span class="info-value"><?php echo $candidat->total_annees_experience; ?></span></div>
</div>

<div class="section"><div style="font-size: 10px;">
        <div class="section-title">Engagement</div>
        <p style="text-align: justify; font-family: 9px;">
            Je sousigné(e) : <strong><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></strong>, certifie sous l'honneur, l'exactidude des renseignements
            consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat au <em>Programme supérieures de spécialisation en Finances Publiques</em>.
        </p></div>
    <div style="display: flex; justify-content: space-around; margin-top: 20px;">
        <span style="margin-right: 100px;">A____________</span>
        <span style="margin-right: 80px;">Le _____/_____/______</span>
        <span>Signature du candidat</span>
    </div>
    <div style="display: flex; margin-top: 10px; ">
        <span style="margin-right: 250px;">Reçu le: ___/___/_______</span>
        <span>Cachet et visa du PSSFP</span>
    </div>
</div>

<div class="footer" style="margin-bottom: -60px;" >
    <p style="font-size: 8px; margin-bottom: -10px;" >Plateforme PSSFP – © <?php echo date('Y'); ?> – Tous droits réservés - Généré le <?php echo date('d/m/Y à H:i'); ?></p>
    <p style="font-size:5px;"><center>B.P: 16 578 Yaoundé – Cameroun Tel.: + (237) 242 22 76 81 / (237) 242 23 37 06 / (237) 697 92 13 32 <br> Web: www.pfinancespubliques.org - E-Mail: info@pfinancespubliques.org</center></p>
</div>

<!-- Saut de page pour la copie administration -->
<div class="page-break"></div>

<!-- Deuxième page - Copie Administration (identique sauf filigrane) -->
<div class="filigrane">COPIE ADMINISTRATION</div>

<table class="header-table">
    <tr>
        <td class="header-left">
            REPUBLIQUE DU CAMEROUN <br />
            Paix- Travail- Patrie<br />
            MINISTERE DES FINANCES<br />
            SECRETARIAT GENERAL<br />
            PROGRAMME SUPERIEUR DE SPECIALISATION <br />
            EN FINANCES PUBLIQUES<br />
        </td>
        <td class="header-middle">
            <img src="<?= base_url() ?>resources/assets/images/logo.png" alt="Logo">
        </td>
        <td class="header-right">
            REPUBLIC OF CAMEROON<br />
            Peace- Work- Fatherland<br />
            MINISTRY OF FINANCE<br />
            GENERAL SECRETARIAT<br />
            ADVANCED PROGRAM OF SPECIALISATION<br />
            IN PUBLIC FINANCE<br />
        </td>
    </tr>
</table>

<div class="header">
    <h1>MASTER PROFESSIONNEL EN FINANCES PUBLIQUES</h1>
    <p>Formulaire d'Inscription N°: <?php echo $candidat->ordre_candidature; ?></p>
</div>
<div class="section">
    <div class="section-title">État civil</div>
    <div class="photo-box">
        Photo 4X4
    </div>
    <div class="info-row"><span class="info-label">Nom complet : </span><span class="info-value"><?php echo ' '.$candidat->nom . ' ' . $candidat->prenom; ?></span></div>
    <div class="info-row"><span class="info-label">Épouse :</span><span class="info-value"><?php echo $candidat->epouse; ?></span></div>
    <div class="info-row"><span class="info-label">Date & lieu de naissance :</span><span class="info-value"><?php echo $candidat->date_naissance . ' à ' . $candidat->lieu_de_naissce; ?></span></div>
    <div class="info-row"><span class="info-label">Sexe :</span><span class="info-value"><?php echo $candidat->sexe; ?></span></div>
    <div class="info-row"><span class="info-label">Statut matrimonial :</span><span class="info-value"><?php echo $candidat->statu_matrimonial; ?></span></div>
    <div class="info-row"><span class="info-label">Nationalité :</span><span class="info-value"><?php echo $candidat->nationalite; ?></span></div>
</div>
<div class="section">
    <div class="section-title">Spécialité</div>

    <div class="info-row"><span class="info-label">Spécialité :</span><span class="info-value"><?php echo $candidat->specialite; ?></span></div>
    <div class="info-row"><span class="info-label">Type de formation :</span><span class="info-value"><?php echo $candidat->type_etude; ?></span></div>
</div>


<div class="section">
    <div class="section-title">Coordonnées</div>
    <div class="info-row"><span class="info-label">Lieu de résidence :</span><span class="info-value"><?php echo $candidat->ville_residence; ?></span></div>
    <div class="info-row"><span class="info-label">Téléphones :</span><span class="info-value"><?php echo $candidat->telephone . ' / ' . $candidat->telephone2; ?></span></div>
    <div class="info-row"><span class="info-label">Email :</span><span class="info-value"><?php echo $candidat->email; ?></span></div>
</div>

<div class="section">
    <div class="section-title">Études supérieures</div>
    <div class="info-row"><span class="info-label">Dernier diplôme :</span><span class="info-value"><?php echo $candidat->dernier_diplome_intitule; ?> <strong style="margin-left: 15px"><em>en :</em></strong> <?php echo $candidat->specialite; ?></span></div>
    <div class="info-row"><span class="info-label">Lieu d'obtention :</span><span class="info-value"><?php echo $candidat->dernier_diplome_etablissement; ?></span></div>
    <div class="info-row"><span class="info-label">Année d'obtention :</span><span class="info-value"><?php echo $candidat->dernier_diplome_annee; ?> <strong style="margin-left: 25px"><em>Niveau :</em></strong> <?php echo $candidat->dernier_diplome_niveau; ?></span></div>

</div>

<div class="section">
    <div class="section-title">Coordonnées professionnelles</div>
    <div class="info-row"><span class="info-label">Statut professionnel :</span><span class="info-value"><?php echo $candidat->statut_prof; ?></span></div>
    <div class="info-row"><span class="info-label">en lien avec les finances publiques ? :</span><span class="info-value"><?php echo $candidat->structure; ?></span></div>
    <div class="info-row"><span class="info-label">Année d'expérience</span><span class="info-value"><?php echo $candidat->total_annees_experience; ?></span></div>
</div>

<div class="section"><div style="font-size: 10px;">
        <div class="section-title">Engagement</div>
        <p style="text-align: justify; font-family: 9px;">
            Je sousigné(e) : <strong><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></strong>, certifie sous l'honneur, l'exactidude des renseignements
            consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat au <em>Programme supérieures de spécialisation en Finances Publiques</em>.
        </p></div>
    <div style="display: flex; justify-content: space-around; margin-top: 20px;">
        <span style="margin-right: 100px;">A____________</span>
        <span style="margin-right: 80px;">Le _____/_____/______</span>
        <span>Signature du candidat</span>
    </div>
    <div style="display: flex; margin-top: 10px; ">
        <span style="margin-right: 250px;">Reçu le: ___/___/_______</span>
        <span>Cachet et visa du PSSFP</span>
    </div>
</div>

<div class="footer" style="margin-bottom: -60px;" >
    <p style="font-size: 8px; margin-bottom: -10px;" >Plateforme PSSFP – © <?php echo date('Y'); ?> – Tous droits réservés - Généré le <?php echo date('d/m/Y à H:i'); ?></p>
    <p style="font-size:5px;"><center>B.P: 16 578 Yaoundé – Cameroun Tel.: + (237) 242 22 76 81 / (237) 242 23 37 06 / (237) 697 92 13 32 <br> Web: www.pfinancespubliques.org - E-Mail: info@pfinancespubliques.org</center></p>
</div>
</body>
</html>