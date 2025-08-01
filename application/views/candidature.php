<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature au Master en Finances Publiques - PSSFP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url() ?>resources/css/modern-form.css">
    <link rel="stylesheet" href="<?= base_url() ?>resources/css/form-fixes.css">
    <link rel="stylesheet" href="<?= base_url() ?>resources/css/review-styles.css">
</head>
<body>
<style>
        .nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }


        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
</style>
<script>
    function changesoustitre() {
        const nom = document.getElementById('nom').value;
        const prenom = document.getElementById('prenom').value;
        document.getElementById('label_sous').innerHTML = `${nom} ${prenom}`.trim();
    }

    function maskepouse() {
        const sel = document.getElementById('civilite');
        const civilite = sel.options[sel.selectedIndex].value;
        const epouseField = document.getElementById('epouse');

        if (epouseField) {
            epouseField.style.display = (civilite === "Monsieur") ? "none" : "block";
            if (civilite === "Monsieur") {
                epouseField.removeAttribute('required');
            }
        }
    }
</script>
<body>

    <nav class="nav" id="nav">
        <div class="nav-container">
            <div class="logo"  style="width:20%"><a href="<?php echo base_url(); ?>index.php"><img src="<?= base_url()?>resources/assets/images/logo.png"  style="width:23%" alt=""></a></div>
            <div class="nav-cta">
                <a href="<?= base_url('index.php/')?>" class="btn btn-ghost">Acceuil</a>
                <a href="<?php echo base_url(); ?>index.php/adminAuth" class="btn btn-primary">Connexion</a>
            </div>
        </div>
    </nav>
<div class="container">
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">

            <!-- Enhanced Header -->
            <div class="form-header">
                <img src="<?= base_url() ?>resources/assets/images/logform.png" class="form-logo" alt="Logo PSSFP">
                <h2>Candidature Master en Finances Publiques</h2>
                <p>13&egrave;me Promotion 2025/2026 • Remplissez soigneusement tous les champs obligatoires (*)</p>
            </div>

            <!-- Enhanced Progress Steps -->
            <div class="progress-steps">
                <div class="progress-step active" role="button" tabindex="0" aria-label="Étape 1: Formation">
                    <div class="step-circle">1</div>
                    <div class="step-text">Formation</div>
                </div>
                <div class="progress-step" role="button" tabindex="0" aria-label="Étape 2: Identité">
                    <div class="step-circle">2</div>
                    <div class="step-text">Identité</div>
                </div>
                <div class="progress-step" role="button" tabindex="0" aria-label="Étape 3: Contact">
                    <div class="step-circle">3</div>
                    <div class="step-text">Contact</div>
                </div>
                <div class="progress-step" role="button" tabindex="0" aria-label="Étape 4: Cursus">
                    <div class="step-circle">4</div>
                    <div class="step-text">Cursus</div>
                </div>
                <div class="progress-step" role="button" tabindex="0" aria-label="Étape 5: Professionnel">
                    <div class="step-circle">5</div>
                    <div class="step-text">Professionnel</div>
                </div>
            </div>

            <!-- Enhanced Form with Better Structure -->
            <form id="candidatureForm" method="post" action="<?php echo $action; ?>" novalidate>
                <?php if(isset($message) && $message): ?>
                    <div class="message error" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <?php if(validation_errors()): ?>
                    <div class="validation-errors error" role="alert">
                        <h4><i class="fas fa-exclamation-circle"></i> Erreurs de validation détectées :</h4>
                        <?php echo validation_errors('<div class="error-item"><i class="fas fa-times-circle"></i> ', '</div>'); ?>
                        <p><strong>Veuillez corriger ces erreurs avant de continuer.</strong></p>
                    </div>
                <?php endif; ?>

                <!-- SECTION 1: Formation -->
                <div class="form-section active" id="section-formation">
                    <legend>
                        <i class="fas fa-graduation-cap"></i>
                        Formation et Type d'Étude
                    </legend>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="specialite" class="formbold-form-label required">Spécialité de formation</label>
                            <select class="formbold-form-input" name="specialite" id="specialite" required aria-describedby="specialite-help">
                                <option value="" style="color: #718096;">-- Sélectionnez votre spécialité --</option>
                                <?php
                                if (!empty($specialites)) {
                                    foreach ($specialites as $specialite) {
                                        $selected = (isset($this->form_data->specialite) && (string)$specialite->id === (string)$this->form_data->specialite) ? 'selected' : '';
                                        echo "<option value='{$specialite->id}' {$selected}>{$specialite->nom}</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled style='color: #718096;'>Aucune spécialité disponible</option>";
                                }
                                ?>
                            </select>
                            <div id="specialite-help" class="input-help-text">Choisissez la spécialité qui correspond à votre projet professionnel</div>
                        </div>
                    </div>



                    <div class="form-row">
                        <div class="form-group">
                            <label class="formbold-form-label required">Mode de formation souhaité</label>
                            <div class="radio-group" role="radiogroup" aria-labelledby="type-etude-label">
                                <div class="radio-item">
                                    <input type="radio" name="type_etude" id="presentiel" value="Presentiel"
                                           <?php if (isset($this->form_data->type_etude) && ($this->form_data->type_etude === 'Présentiel' || $this->form_data->type_etude === 'Presentiel')) echo 'checked'; ?> required>
                                    <label for="presentiel">
                                        <strong>Présentiel</strong>
                                        <br><small>Cours en salle avec présence physique obligatoire</small>
                                    </label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" name="type_etude" id="distanciel" value="Distanciel"
                                           <?php if (isset($this->form_data->type_etude) && ($this->form_data->type_etude === 'Distanciel' || $this->form_data->type_etude === 'Distanciel')) echo 'checked'; ?> required>
                                    <label for="distanciel">
                                        <strong>Distanciel</strong>
                                        <br><small>Formation à distance avec outils numériques</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 2: Identité -->
                <div class="form-section" id="section-identite">
                    <legend>
                        <i class="fas fa-user"></i>
                        Identité et Informations Personnelles
                    </legend>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="langue1" class="formbold-form-label required">Langue principale</label>
                            <select class="formbold-form-input" name="langue" id="langue1" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">-- Choisir --</option>
                                <option value="Français" <?php if ($this->form_data->langue === "Français") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Français</option>
                                <option value="Anglais" <?php if ($this->form_data->langue === "Anglais") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Anglais</option>
                            </select>
                        </div>

                        <div class="form-group half">
                            <label for="civilite" class="formbold-form-label required">Civilité</label>
                            <select class="formbold-form-input" name="civilite" onchange="maskepouse();" id="civilite" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">-- Choisir --</option>
                                <option value="Madame" <?php if ($this->form_data->civilite === "Madame") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Madame</option>
                                <option value="Mademoiselle" <?php if ($this->form_data->civilite === "Mademoiselle") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Mademoiselle</option>
                                <option value="Monsieur" <?php if ($this->form_data->civilite === "Monsieur") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Monsieur</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="nom" class="formbold-form-label required">Nom de famille</label>
                            <input value="<?php echo set_value('nom', $this->form_data->nom); ?>"
                                   onchange="changesoustitre();"
                                   name="nom"
                                   placeholder="Votre nom de famille"
                                   class="formbold-form-input"
                                   id="nom"
                                   type="text"
                                   required
                                   autocomplete="family-name" />
                        </div>

                        <div class="form-group half">
                            <label for="prenom" class="formbold-form-label required">Prénom(s)</label>
                            <input value="<?php echo set_value('prenom', $this->form_data->prenom); ?>"
                                   onchange="changesoustitre();"
                                   name="prenom"
                                   placeholder="Vos prénom(s)"
                                   class="formbold-form-input"
                                   id="prenom"
                                   type="text"
                                   required
                                   autocomplete="given-name" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="epouse" class="formbold-form-label">Nom d'épouse (si applicable)</label>
                            <input value="<?php echo set_value('epouse', $this->form_data->epouse); ?>"
                                   name="epouse"
                                   placeholder="Nom d'épouse"
                                   class="formbold-form-input"
                                   id="epouse"
                                   type="text"
                                   style="display: none;" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="formbold-form-label required">Date de naissance</label>
                            <div class="date-group">
                                <div>
                                    <label for="datenaiss_jj" class="sr-only">Jour</label>
                                    <select class="formbold-form-input" name="datenaiss_jj" id="datenaiss_jj" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                        <option value="" style="color: #718096;">Jour</option>
                                        <?php for ($i = 1; $i < 32; $i++) {
                                            $selected = ($i == $this->form_data->datenaiss_jj) ? 'selected' : '';
                                            echo "<option value='{$i}' {$selected} style='color: #2d3748; background-color: #ffffff;'>{$i}</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="datenaiss_mm" class="sr-only">Mois</label>
                                    <select class="formbold-form-input" name="datenaiss_mm" id="datenaiss_mm" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                        <option value="" style="color: #718096;">Mois</option>
                                        <?php
                                        $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                                               'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
                                        for ($i = 1; $i < 13; $i++) {
                                            $selected = ($i == $this->form_data->datenaiss_mm) ? 'selected' : '';
                                            echo "<option value='{$i}' {$selected} style='color: #2d3748; background-color: #ffffff;'>{$mois[$i-1]}</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="datenaiss_yy" class="sr-only">Année</label>
                                    <select class="formbold-form-input" name="datenaiss_yy" id="datenaiss_yy" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                        <option value="" style="color: #718096;">Année</option>
                                        <?php $x = date('Y');
                                        for ($i = $x - 65; $i < $x - 15; $i++) {
                                            $selected = ($i == $this->form_data->datenaiss_yy) ? 'selected' : '';
                                            echo "<option value='{$i}' {$selected} style='color: #2d3748; background-color: #ffffff;'>{$i}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="lieu_de_naissce" class="formbold-form-label required">Lieu de naissance</label>
                            <input value="<?php echo set_value('lieu_de_naissce', $this->form_data->lieu_de_naissce); ?>"
                                   name="lieu_de_naissce"
                                   placeholder="Ex: Yaoundé, Douala, Paris..."
                                   class="formbold-form-input"
                                   id="lieu_de_naissce"
                                   type="text"
                                   required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="region_dorigine" class="formbold-form-label required">Région d'origine</label>
                            <input value="<?php echo set_value('region_dorigine', $this->form_data->region_dorigine); ?>"
                                   name="region_dorigine"
                                   placeholder="Ex: Centre, Littoral, Ouest..."
                                   class="formbold-form-input"
                                   id="region_dorigine"
                                   type="text"
                                   required />
                        </div>

                        <div class="form-group half">
                            <label for="dept_dorigine" class="formbold-form-label required">Département d'origine</label>
                            <input value="<?php echo set_value('dept_dorigine', $this->form_data->dept_dorigine); ?>"
                                   name="dept_dorigine"
                                   placeholder="Ex: Mfoundi, Wouri, Bamoun..."
                                   class="formbold-form-input"
                                   id="dept_dorigine"
                                   type="text"
                                   required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="nationalite" class="formbold-form-label required">Nationalité</label>
                            <input value="<?php echo set_value('nationalite', $this->form_data->nationalite); ?>"
                                   name="nationalite"
                                   placeholder="Ex: Camerounaise, Française..."
                                   class="formbold-form-input"
                                   id="nationalite"
                                   type="text"
                                   required />
                        </div>

                        <div class="form-group half">
                            <label for="statu_matrimonial" class="formbold-form-label required">Statut matrimonial</label>
                            <select class="formbold-form-input" name="statu_matrimonial" id="statu_matrimonial" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">-- Choisir --</option>
                                <option value="Célibataire" <?php if ($this->form_data->statu_matrimonial === "Célibataire") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Célibataire</option>
                                <option value="Marié(e)" <?php if ($this->form_data->statu_matrimonial === "Marié(e)") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Marié(e)</option>
                                <option value="Veuf(ve)" <?php if ($this->form_data->statu_matrimonial === "Veuf(ve)") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Veuf(ve)</option>
                                <option value="Divorcé(e)" <?php if ($this->form_data->statu_matrimonial === "Divorcé(e)") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Divorcé(e)</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="nombre_enfant" class="formbold-form-label required">Nombre d'enfants à charge</label>
                            <input value="<?php echo set_value('nombre_enfant', $this->form_data->nombre_enfant); ?>"
                                   name="nombre_enfant"
                                   placeholder="0"
                                   class="formbold-form-input"
                                   id="nombre_enfant"
                                   type="number"
                                   min="0"
                                   max="20"
                                   required />
                        </div>
                    </div>
                </div>

                <!-- SECTION 3: Contact -->
                <div class="form-section" id="section-contact">
                    <legend>
                        <i class="fas fa-address-book"></i>
                        Informations de Contact
                    </legend>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="paysorigine" class="formbold-form-label required">Pays d'origine</label>
                            <select class="formbold-form-input" name="paysorigine" id="paysorigine" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">-- Sélectionner --</option>
                                <?php foreach ($pays as $pay) {
                                    $selected = ($pay->id == $this->form_data->paysorigine) ? 'selected' : '';
                                    echo "<option value='{$pay->id}' {$selected} style='color: #2d3748; background-color: #ffffff;'>{$pay->nom}</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="form-group half">
                            <label for="pays" class="formbold-form-label required">Pays de résidence</label>
                            <select class="formbold-form-input" name="pays_residence" id="pays" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">-- Sélectionner --</option>
                                <?php foreach ($pays as $pay) {
                                    $selected = ($pay->id == $this->form_data->pays_residence) ? 'selected' : '';
                                    echo "<option value='{$pay->id}' {$selected} style='color: #2d3748; background-color: #ffffff;'>{$pay->nom}</option>";
                                } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="adressecandidat" class="formbold-form-label required">Adresse complète</label>
                            <input value="<?php echo set_value('adresse_candidat', $this->form_data->adresse_candidat); ?>"
                                   name="adresse_candidat"
                                   placeholder="Ex: BP 1234, Quartier Essos"
                                   class="formbold-form-input"
                                   id="adressecandidat"
                                   type="text"
                                   required />
                        </div>

                        <div class="form-group half">
                            <label for="villeresidence" class="formbold-form-label required">Ville de résidence</label>
                            <input value="<?php echo set_value('ville_residence', $this->form_data->ville_residence); ?>"
                                   name="ville_residence"
                                   placeholder="Ex: Yaoundé, Douala..."
                                   class="formbold-form-input"
                                   id="villeresidence"
                                   type="text"
                                   required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="telephone1" class="formbold-form-label required">Téléphone WhatsApp</label>
                            <input value="<?php echo set_value('telephone', $this->form_data->telephone); ?>"
                                   name="telephone"
                                   placeholder="+237 6XX XXX XXX"
                                   class="formbold-form-input"
                                   id="telephone1"
                                   type="tel"
                                   required />
                            <div class="input-help-text">Numéro principal pour les communications (avec indicatif pays)</div>
                            <?php if(form_error('telephone')): ?>
                                <div class="form-error"><?php echo form_error('telephone'); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group half">
                            <label for="telephone2" class="formbold-form-label">Téléphone secondaire</label>
                            <input value="<?php echo set_value('telephone2', $this->form_data->telephone2); ?>"
                                   name="telephone2"
                                   placeholder="+237 6XX XXX XXX"
                                   class="formbold-form-input"
                                   id="telephone2"
                                   type="tel" />
                            <div class="input-help-text">Numéro de contact alternatif (optionnel)</div>
                            <?php if(form_error('telephone2')): ?>
                                <div class="form-error"><?php echo form_error('telephone2'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="email" class="formbold-form-label required">Adresse email</label>
                            <input value="<?php echo set_value('email', $this->form_data->email); ?>"
                                   name="email"
                                   placeholder="votre.email@exemple.com"
                                   class="formbold-form-input"
                                   id="email"
                                   type="email"
                                   required
                                   autocomplete="email" />
                            <div class="input-help-text">Utilisée pour toutes les communications officielles</div>
                            <?php if(form_error('email')): ?>
                                <div class="form-error"><?php echo form_error('email'); ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group half">
                            <label for="emailverif" class="formbold-form-label required">Confirmer l'email</label>
                            <input value="<?php echo set_value('emailverif', $this->form_data->emailverif); ?>"
                                   name="emailverif"
                                   placeholder="Confirmer votre email"
                                   class="formbold-form-input"
                                   id="emailverif"
                                   type="email"
                                   required />
                            <div class="input-help-text">Saisissez à nouveau votre adresse email</div>
                            <?php if(form_error('emailverif')): ?>
                                <div class="form-error"><?php echo form_error('emailverif'); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- SECTION 4: Cursus Académique -->
                <div class="form-section">
                    <legend><i class="fas fa-university"></i> Cursus Académique</legend>
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="dernier_diplome" class="formbold-form-label required">Dernier diplôme obtenu</label>
                            <input value="<?php echo set_value('dernier_diplome', $this->form_data->dernier_diplome); ?>" name="dernier_diplome" class="formbold-form-input" required id="dernier_diplome" type="text" placeholder="Ex. DEA " list="list_dernierdiplome" />
                            <datalist id="list_dernierdiplome">
                                <option value="Licence">
                                <option value="DEA / Master">
                                <option value="Doctorat">
                            </datalist>
                        </div>

                        <div class="form-group half">
                            <label for="diplome_requis" class="formbold-form-label required">Diplôme requis</label>
                            <input value="<?php echo set_value('diplome_requis', $this->form_data->diplome_requis); ?>" name="diplome_requis" class="formbold-form-input" required id="diplome_requis" type="text" placeholder="Ex. Licence" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="specialite_requise" class="formbold-form-label required">Spécialité du diplôme requis</label>
                            <input value="<?php echo set_value('specialite_requise', $this->form_data->specialite_requise); ?>" name="specialite_requise" class="formbold-form-input" required id="specialite_requiss" type="text" placeholder="Ex. Economie" />
                        </div>

                        <div class="form-group half">
                            <label for="annee_optention_diplome" class="formbold-form-label required">Année d'obtention du diplôme requis</label>
                            <select class="formbold-form-input" name="annee_optention_diplome" id="annee_optention_diplome" required style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">Choisir une année</option>
                                <?php $x = date('Y');
                                for ($i = $x; $i >= $x - 30; $i--) {
                                    $selected = ($i == $this->form_data->annee_optention_diplome) ? 'selected' : '';
                                    echo "<option value='{$i}' {$selected} style='color: #2d3748; background-color: #ffffff;'>{$i}</option>";
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SECTION 5: Coordonnées Professionnelles -->
                <div class="form-section">
                    <legend><i class="fas fa-briefcase"></i> Coordonnées Professionnelles</legend>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="formbold-form-label required">Votre statut actuel</label>
                            <select class="formbold-form-input" name="statut_prof" id="statut" style="color: #2d3748 !important; background-color: #ffffff !important;">
                                <option value="" style="color: #718096;">Choisir une réponse</option>
                                <option value="Fonctionnaire" <?php if ($this->form_data->statut_prof === "Fonctionnaire") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Fonctionnaire</option>
                                <option value="Travailleur privé" <?php if ($this->form_data->statut_prof === "Travailleur_Privé") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Travailleur Privé</option>
                                <option value="Indépendant" <?php if ($this->form_data->statut_prof === "Indépendant") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Indépendant</option>
                                <option value="Etudiant" <?php if ($this->form_data->statut_prof === "Etudiant") echo "selected"; ?> style="color: #2d3748; background-color: #ffffff;">Etudiant</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half employer-field">
                            <label for="structure" class="formbold-form-label">Employeur</label>
                            <input value="<?php echo set_value('structure', $this->form_data->structure); ?>" placeholder="Ex. MINFI, FEICOM, DGTCFM ou AUTRE" name="structure" class="formbold-form-input" id="structure" type="text" />
                        </div>

                        <div class="form-group half employer-field">
                            <label for="adresse_structure" class="formbold-form-label">Adresse de votre Employeur</label>
                            <input value="<?php echo set_value('adresse_structure', $this->form_data->adresse_structure); ?>" placeholder="Ex. BP: 000 Douala" name="adresse_structure" class="formbold-form-input" id="adressAdministration" type="text" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half employer-field">
                            <label for="telephone_structure" class="formbold-form-label">Téléphone de l'employeur</label>
                            <input value="<?php echo isset($this->form_data->telephone_structure) ? set_value('telephone_structure', $this->form_data->telephone_structure) : set_value('telephone_structure', ''); ?>" placeholder="Téléphone de l'employeur" name="telephone_structure" class="formbold-form-input" id="telephone_structure" type="text" />
                        </div>

                        <div class="form-group half employer-field">
                            <label for="email_structure" class="formbold-form-label">Email de l'employeur</label>
                            <input value="<?php echo isset($this->form_data->email_structure) ? set_value('email_structure', $this->form_data->email_structure) : set_value('email_structure', ''); ?>" name="email_structure" placeholder="Email Administration" class="formbold-form-input" id="email_structure" type="email" />
                        </div>
                    </div>
                </div>

                <!-- SECTION 6: Avis -->
                <div class="form-section">
                    <legend><i class="fas fa-comment-alt"></i> Votre Avis Nous Intéresse</legend>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="formbold-form-label required">Comment avez-vous connu le PSSFP</label>
                            <select class="formbold-form-input" name="howDidYouKnewUs" id="howDidYouKnewUs">
                                <option value="">Choisir une réponse</option>
                                <option value="Cameroun Tribune" <?php if ($this->form_data->howDidYouKnewUs === "Cameroun Tribune") echo "selected"; ?>>Cameroun Tribune</option>
                                <option value="Banderoles et affiches publicitaires" <?php if ($this->form_data->howDidYouKnewUs === "Banderoles et affiches publicitaires") echo "selected"; ?>>Banderoles et affiches publicitaires</option>
                                <option value="Internet et réseaux sociaux" <?php if ($this->form_data->howDidYouKnewUs === "Internet et réseaux sociaux") echo "selected"; ?>>Internet et réseaux sociaux</option>
                                <option value="Média Radio et TV" <?php if ($this->form_data->howDidYouKnewUs === "Média Radio et TV") echo "selected"; ?>>Média Radio et TV</option>
                                <option value="Campagne de sensibilisation des équipes du PSSFP sur le terrain" <?php if ($this->form_data->howDidYouKnewUs === "Campagne de sensibilisation des équipes du PSSFP sur le terrain") echo "selected"; ?>>Campagne de sensibilisation des équipes du PSSFP sur le terrain</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SECTION 7: Engagement -->
                <div class="form-section">
                    <legend><i class="fas fa-handshake"></i> Engagement</legend>
                    <div class="panel-body" style="text-align: justify; font-size: 1rem; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 5px;">
                        Je soussigné(e) <strong id="label_sous"><?php if (isset($this->form_data->nom_prenom)) echo $this->form_data->nom_prenom; ?></strong>, certifie sur l'honneur l'exactitude des renseignements consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat au programme de Master Professionnel en Finances Publiques.
                    </div>

                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="engagement" required>
                            J'ai lu et j'accepte <a href="#" target="_blank">les termes, conditions et politiques</a>
                        </label>
                    </div>
                </div>

                <!-- SECTION 8: Revue des informations -->
                <div class="form-section" id="review-section">
                    <legend><i class="fas fa-check-double"></i> Revue des Informations</legend>
                    <p class="review-intro">Veuillez vérifier les informations saisies avant de soumettre votre candidature.</p>

                    <div class="review-container">
                        <!-- Formation -->
                        <div class="review-section">
                            <h3><i class="fas fa-graduation-cap"></i> Formation</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Spécialité de formation</span>
                                    <span class="review-value" id="review-specialite">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Mode de formation</span>
                                    <span class="review-value" id="review-type_etude">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Identité -->
                        <div class="review-section">
                            <h3><i class="fas fa-user"></i> Identité</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Civilité</span>
                                    <span class="review-value" id="review-civilite">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Nom</span>
                                    <span class="review-value" id="review-nom">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Prénom(s)</span>
                                    <span class="review-value" id="review-prenom">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Nom d'épouse</span>
                                    <span class="review-value" id="review-epouse">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Date de naissance</span>
                                    <span class="review-value" id="review-date_naissance">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Lieu de naissance</span>
                                    <span class="review-value" id="review-lieu_de_naissce">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Nationalité</span>
                                    <span class="review-value" id="review-nationalite">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Région d'origine</span>
                                    <span class="review-value" id="review-region_dorigine">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Statut matrimonial</span>
                                    <span class="review-value" id="review-statu_matrimonial">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Nombre d'enfants</span>
                                    <span class="review-value" id="review-nombre_enfant">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Contact -->
                        <div class="review-section">
                            <h3><i class="fas fa-address-book"></i> Contact</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Adresse</span>
                                    <span class="review-value" id="review-adresse_candidat">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Ville de résidence</span>
                                    <span class="review-value" id="review-ville_residence">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Téléphone principal</span>
                                    <span class="review-value" id="review-telephone">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Téléphone secondaire</span>
                                    <span class="review-value" id="review-telephone2">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Email</span>
                                    <span class="review-value" id="review-email">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Formation -->
                        <div class="review-section">
                            <h3><i class="fas fa-university"></i> Cursus académique</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Dernier diplôme obtenu</span>
                                    <span class="review-value" id="review-dernier_diplome">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Diplôme requis</span>
                                    <span class="review-value" id="review-diplome_requis">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Spécialité du diplôme</span>
                                    <span class="review-value" id="review-specialite_requise">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Année d'obtention</span>
                                    <span class="review-value" id="review-annee_optention_diplome">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Professionnel -->
                        <div class="review-section">
                            <h3><i class="fas fa-briefcase"></i> Informations professionnelles</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Statut actuel</span>
                                    <span class="review-value" id="review-statut_prof">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Employeur</span>
                                    <span class="review-value" id="review-structure">-</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="review-actions">
                        <button type="button" class="btn btn-warning" id="edit-submission">
                            <i class="fas fa-edit"></i> Modifier mes informations
                        </button>
                    </div>
                </div>

                <div class="form-actions">
                    <button name="<?php if (isset($submitname)) echo $submitname; ?>" id="subenregistrer" class="btn btn-success" type="submit">
                        <i class="fas fa-paper-plane"></i> Soumettre ma candidature
                    </button>
                    <button type="reset" class="btn btn-danger">
                        <i class="fas fa-undo"></i> Réinitialiser
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Load JavaScript at the end for better performance -->
<script src="<?= base_url() ?>resources/js/modern-form.js"></script>
</body>
</html>
