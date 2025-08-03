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

    function showHideAutreDomaine() {
        const domaineSelect = document.getElementById('dernier_diplome_domaine');
        const autreDomaineRow = document.getElementById('autre_domaine_row');
        if (domaineSelect.value === 'Autre') {
            autreDomaineRow.style.display = 'block';
        } else {
            autreDomaineRow.style.display = 'none';
            document.getElementById('dernier_diplome_autre_domaine').value = ''; // Clear the field
        }
    }

    function toggleEmployerFields() {
        const statut = document.getElementById('statut_prof').value;
        const employerInfoSection = document.getElementById('employer_info_section');
        const autreStatutRow = document.getElementById('autre_statut_row');

        if (statut === "Étudiant / en recherche d'emploi" || statut === "Etudiant") {
            employerInfoSection.style.display = 'none';
        } else {
            employerInfoSection.style.display = 'block';
        }

        if (statut === "Autre") {
            autreStatutRow.style.display = 'block';
        } else {
            autreStatutRow.style.display = 'none';
        }
    }
</script>

<div class="container">
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">

            <!-- Enhanced Header -->
            <div class="form-header">
                <h2>Candidature Master en Finances Publiques</h2>
                <p>13ème Promotion 2025/2026 • Remplissez soigneusement tous les champs obligatoires (*)</p>
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
                            <select class="formbold-form-input" name="id_specialite" id="id_specialite" required aria-describedby="specialite-help">
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
                            <input type="date" name="date_naissance" id="date_naissance"
                                   class="formbold-form-input"
                                   value="<?php echo set_value('date_naissance', isset($this->form_data->date_naissance) ? $this->form_data->date_naissance : ''); ?>"
                                   required
                                   min="<?php echo (date('Y')-65).'-01-01'; ?>"
                                   max="<?php echo (date('Y')-15).'-12-31'; ?>" />
                            <div class="input-help-text">Format: AAAA-MM-JJ</div>
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
                <div class="form-section" id="section-cursus">
                    <legend>
                        <i class="fas fa-university"></i>
                        IV – Cursus Académique
                    </legend>

                    <h4>🎓 Dernier diplôme obtenu</h4>
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="dernier_diplome_intitule" class="formbold-form-label required">Intitulé exact du diplôme</label>
                            <input type="text" name="dernier_diplome_intitule" id="dernier_diplome_intitule" class="formbold-form-input" placeholder="Ex. Licence en Droit, Maîtrise en Sciences économiques" value="<?php echo set_value('dernier_diplome_intitule', isset($this->form_data->dernier_diplome_intitule) ? $this->form_data->dernier_diplome_intitule : ''); ?>" required />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="dernier_diplome_specialite" class="formbold-form-label required">Spécialité / Filière</label>
                            <input type="text" name="dernier_diplome_specialite" id="dernier_diplome_specialite" class="formbold-form-input" placeholder="Ex. Économie, Finances, Gestion, Droit" value="<?php echo set_value('dernier_diplome_specialite', isset($this->form_data->dernier_diplome_specialite) ? $this->form_data->dernier_diplome_specialite : ''); ?>" required />
                        </div>

                        <div class="form-group half">
                            <label for="dernier_diplome_domaine" class="formbold-form-label required">Domaine du diplôme</label>
                            <select name="dernier_diplome_domaine" id="dernier_diplome_domaine" class="formbold-form-input" onchange="showHideAutreDomaine()" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="Économie" <?php if(isset($this->form_data->dernier_diplome_domaine) && $this->form_data->dernier_diplome_domaine=='Économie') echo 'selected'; ?>>Économie</option>
                                <option value="Finances" <?php if(isset($this->form_data->dernier_diplome_domaine) && $this->form_data->dernier_diplome_domaine=='Finances') echo 'selected'; ?>>Finances</option>
                                <option value="Gestion" <?php if(isset($this->form_data->dernier_diplome_domaine) && $this->form_data->dernier_diplome_domaine=='Gestion') echo 'selected'; ?>>Gestion</option>
                                <option value="Droit" <?php if(isset($this->form_data->dernier_diplome_domaine) && $this->form_data->dernier_diplome_domaine=='Droit') echo 'selected'; ?>>Droit</option>
                                <option value="Autre" <?php if(isset($this->form_data->dernier_diplome_domaine) && $this->form_data->dernier_diplome_domaine=='Autre') echo 'selected'; ?>>Autre</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row" id="autre_domaine_row" style="display: <?php echo (isset($this->form_data->dernier_diplome_domaine) && $this->form_data->dernier_diplome_domaine=='Autre') ? 'block' : 'none'; ?>">
                        <div class="form-group">
                            <label for="dernier_diplome_autre_domaine" class="formbold-form-label">Précisez le domaine</label>
                            <input type="text" name="dernier_diplome_autre_domaine" id="dernier_diplome_autre_domaine" class="formbold-form-input" value="<?php echo set_value('dernier_diplome_autre_domaine', isset($this->form_data->dernier_diplome_autre_domaine) ? $this->form_data->dernier_diplome_autre_domaine : ''); ?>" />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="dernier_diplome_etablissement" class="formbold-form-label required">Établissement d'obtention</label>
                            <input type="text" name="dernier_diplome_etablissement" id="dernier_diplome_etablissement" class="formbold-form-input" value="<?php echo set_value('dernier_diplome_etablissement', isset($this->form_data->dernier_diplome_etablissement) ? $this->form_data->dernier_diplome_etablissement : ''); ?>" required />
                        </div>

                        <div class="form-group half">
                            <label for="dernier_diplome_pays" class="formbold-form-label required">Pays de l'établissement</label>
                            <select name="dernier_diplome_pays" id="dernier_diplome_pays" class="formbold-form-input" required>
                                <option value="">-- Sélectionnez un pays --</option>
                                <?php if (!empty($pays)) { foreach ($pays as $p) { $selected = (isset($this->form_data->dernier_diplome_pays) && $this->form_data->dernier_diplome_pays == $p->id) ? 'selected' : ''; echo "<option value='{$p->id}' $selected>{$p->nom}</option>"; } } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="dernier_diplome_annee" class="formbold-form-label required">Année d'obtention</label>
                            <input type="number" min="1950" max="<?php echo date('Y'); ?>" name="dernier_diplome_annee" id="dernier_diplome_annee" class="formbold-form-input" value="<?php echo set_value('dernier_diplome_annee', isset($this->form_data->dernier_diplome_annee) ? $this->form_data->dernier_diplome_annee : ''); ?>" required />
                        </div>

                        <div class="form-group half">
                            <label for="dernier_diplome_niveau" class="formbold-form-label required">Niveau académique</label>
                            <select name="dernier_diplome_niveau" id="dernier_diplome_niveau" class="formbold-form-input" required>
                                <option value="">-- Sélectionnez --</option>
                                <option value="BAC+3" <?php if(isset($this->form_data->dernier_diplome_niveau) && $this->form_data->dernier_diplome_niveau=='BAC+3') echo 'selected'; ?>>BAC+3</option>
                                <option value="BAC+4" <?php if(isset($this->form_data->dernier_diplome_niveau) && $this->form_data->dernier_diplome_niveau=='BAC+4') echo 'selected'; ?>>BAC+4</option>
                                <option value="BAC+5 ou plus" <?php if(isset($this->form_data->dernier_diplome_niveau) && $this->form_data->dernier_diplome_niveau=='BAC+5 ou plus') echo 'selected'; ?>>BAC+5 ou plus</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="dernier_diplome_mention" class="formbold-form-label">Mention (facultatif)</label>
                            <select name="dernier_diplome_mention" id="dernier_diplome_mention" class="formbold-form-input">
                                <option value="">-- Sélectionnez --</option>
                                <option value="Passable" <?php if(isset($this->form_data->dernier_diplome_mention) && $this->form_data->dernier_diplome_mention=='Passable') echo 'selected'; ?>>Passable</option>
                                <option value="Assez Bien" <?php if(isset($this->form_data->dernier_diplome_mention) && $this->form_data->dernier_diplome_mention=='Assez Bien') echo 'selected'; ?>>Assez Bien</option>
                                <option value="Bien" <?php if(isset($this->form_data->dernier_diplome_mention) && $this->form_data->dernier_diplome_mention=='Bien') echo 'selected'; ?>>Bien</option>
                                <option value="Très Bien" <?php if(isset($this->form_data->dernier_diplome_mention) && $this->form_data->dernier_diplome_mention=='Très Bien') echo 'selected'; ?>>Très Bien</option>
                                <option value="Excellent" <?php if(isset($this->form_data->dernier_diplome_mention) && $this->form_data->dernier_diplome_mention=='Excellent') echo 'selected'; ?>>Excellent</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SECTION 5: Situation et Expérience Professionnelles -->
                <div class="form-section" id="section-professionnel">
                    <legend><i class="fas fa-briefcase"></i> V – Situation et Expérience Professionnelles</legend>

                    <h4>🔹 1. Statut professionnel</h4>
                    <!-- 1. Statut professionnel actuel -->
                    <div class="form-row">
                        <div class="form-group half">
                            <label class="formbold-form-label required">Statut professionnel actuel</label>
                            <select class="formbold-form-input" name="statut_prof" id="statut_prof" onchange="toggleEmployerFields();" required>
                                <option value="">-- Sélectionnez votre statut actuel --</option>
                                <option value="Fonctionnaire" <?php if ($this->form_data->statut_prof === "Fonctionnaire") echo "selected"; ?>>Fonctionnaire</option>
                                <option value="Employé du secteur privé" <?php if ($this->form_data->statut_prof === "Employé du secteur privé" || $this->form_data->statut_prof === "Travailleur_Privé") echo "selected"; ?>>Employé du secteur privé</option>
                                <option value="Travailleur indépendant / consultant" <?php if ($this->form_data->statut_prof === "Travailleur indépendant / consultant" || $this->form_data->statut_prof === "Indépendant") echo "selected"; ?>>Travailleur indépendant / consultant</option>
                                <option value="Étudiant / en recherche d'emploi" <?php if ($this->form_data->statut_prof === "Étudiant / en recherche d'emploi" || $this->form_data->statut_prof === "Etudiant") echo "selected"; ?>>Étudiant / en recherche d'emploi</option>
                                <option value="Autre" <?php if ($this->form_data->statut_prof === "Autre") echo "selected"; ?>>Autre</option>
                            </select>
                        </div>
                    </div>

                    <div id="autre_statut_row" class="form-row" style="display: <?php echo ($this->form_data->statut_prof === "Autre") ? 'block' : 'none'; ?>">
                        <div class="form-group">
                            <label for="autre_statut_prof" class="formbold-form-label">Précisez votre statut professionnel</label>
                            <input type="text" name="autre_statut_prof" id="autre_statut_prof" class="formbold-form-input" value="<?php echo set_value('autre_statut_prof', isset($this->form_data->autre_statut_prof) ? $this->form_data->autre_statut_prof : ''); ?>" />
                        </div>
                    </div>

                    <!-- 2. Informations sur l'organisation actuelle -->
                    <div id="employer_info_section" style="display: <?php echo ($this->form_data->statut_prof !== "Étudiant / en recherche d'emploi" && $this->form_data->statut_prof !== "Etudiant") ? 'block' : 'none'; ?>">
                        <h4>🔹 2. Informations sur l'organisation actuelle</h4>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="structure" class="formbold-form-label required">Nom de l'employeur actuel</label>
                                <input value="<?php echo set_value('structure', $this->form_data->structure); ?>" placeholder="Ex. Ministère des Finances, Banque Atlantique" name="structure" class="formbold-form-input" id="structure" type="text" required />
                            </div>

                            <div class="form-group half">
                                <label for="adresse_structure" class="formbold-form-label required">Adresse complète de l'employeur</label>
                                <input value="<?php echo set_value('adresse_structure', $this->form_data->adresse_structure); ?>" placeholder="Ex. BP 1234 Yaoundé, Cameroun" name="adresse_structure" class="formbold-form-input" id="adresse_structure" type="text" required />
                            </div>
                        </div>

                        <div class="form-row">

                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="telephone_structure" class="formbold-form-label">Téléphone de l'employeur</label>
                                <input value="<?php echo isset($this->form_data->telephone_structure) ? set_value('telephone_structure', $this->form_data->telephone_structure) : set_value('telephone_structure', ''); ?>" placeholder="Téléphone de l'employeur" name="telephone_structure" class="formbold-form-input" id="telephone_structure" type="text" />
                            </div>

                            <div class="form-group half">
                                <label for="email_structure" class="formbold-form-label">Email de l'employeur</label>
                                <input value="<?php echo isset($this->form_data->email_structure) ? set_value('email_structure', $this->form_data->email_structure) : set_value('email_structure', ''); ?>" name="email_structure" placeholder="Email de l'employeur" class="formbold-form-input" id="email_structure" type="email" />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label for="poste_actuel" class="formbold-form-label required">Poste occupé actuellement</label>
                                <input type="text" name="poste_actuel" id="poste_actuel" placeholder="Ex. Comptable, Analyste budgétaire" class="formbold-form-input" value="<?php echo set_value('poste_actuel', isset($this->form_data->poste_actuel) ? $this->form_data->poste_actuel : ''); ?>" required />
                            </div>

                            <div class="form-group half">
                                <label for="date_debut_poste" class="formbold-form-label required">Date de début de ce poste</label>
                                <input type="month" name="date_debut_poste" id="date_debut_poste" class="formbold-form-input" value="<?php echo set_value('date_debut_poste', isset($this->form_data->date_debut_poste) ? $this->form_data->date_debut_poste : ''); ?>" required />
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group half">
                                <label class="formbold-form-label required">Ce poste a-t-il un lien avec les finances publiques ?</label>
                                <div class="radio-group" role="radiogroup">
                                    <div class="radio-item">
                                        <input type="radio" name="lien_finances_publiques" id="lien_oui" value="Oui" <?php if (isset($this->form_data->lien_finances_publiques) && $this->form_data->lien_finances_publiques === 'Oui') echo 'checked'; ?> required>
                                        <label for="lien_oui">Oui</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="lien_finances_publiques" id="lien_partiel" value="Partiellement" <?php if (isset($this->form_data->lien_finances_publiques) && $this->form_data->lien_finances_publiques === 'Partiellement') echo 'checked'; ?> required>
                                        <label for="lien_partiel">Partiellement</label>
                                    </div>
                                    <div class="radio-item">
                                        <input type="radio" name="lien_finances_publiques" id="lien_non" value="Non" <?php if (isset($this->form_data->lien_finances_publiques) && $this->form_data->lien_finances_publiques === 'Non') echo 'checked'; ?> required>
                                        <label for="lien_non">Non</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="lien_partiel_explication" class="form-row" style="display: <?php echo (isset($this->form_data->lien_finances_publiques) && $this->form_data->lien_finances_publiques === 'Partiellement') ? 'block' : 'none'; ?>">
                            <div class="form-group">
                                <label for="explication_lien_partiel" class="formbold-form-label">Veuillez expliquer</label>
                                <textarea name="explication_lien_partiel" id="explication_lien_partiel" class="formbold-form-input" rows="3"><?php echo set_value('explication_lien_partiel', isset($this->form_data->explication_lien_partiel) ? $this->form_data->explication_lien_partiel : ''); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Total d'années d'expérience professionnelle -->
                    <h4>🔹 3. Total d'années d'expérience professionnelle</h4>
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="total_annees_experience" class="formbold-form-label">Nombre total d'années d'expérience</label>
                            <input type="number" min="0" step="0.5" name="total_annees_experience" id="total_annees_experience" class="formbold-form-input" value="<?php echo set_value('total_annees_experience', isset($this->form_data->total_annees_experience) ? $this->form_data->total_annees_experience : ''); ?>" />
                            <div class="input-help-text">Indiquez une estimation du total de vos années d'expérience professionnelle</div>
                        </div>
                    </div>
                </div>

                <!-- SECTION 6: Avis -->
                <div class="form-section">
                    <legend><i class="fas fa-comment-alt"></i> Votre avis nous intéresse</legend>
                    <div class="form-row">
                        <div class="form-group half">
                            <label class="formbold-form-label required" for="howDidYouKnewUs">
                                Comment avez-vous connu le PSSFP&nbsp;?
                            </label>
                            <select class="formbold-form-input" name="howDidYouKnewUs" id="howDidYouKnewUs" required>
                                <option value="" disabled <?php if (empty($this->form_data->howDidYouKnewUs)) echo "selected"; ?>>-- Sélectionnez une option --</option>
                                <option value="Cameroun Tribune" <?php if ($this->form_data->howDidYouKnewUs === "Cameroun Tribune") echo "selected"; ?>>Cameroun Tribune</option>
                                <option value="Banderoles et affiches publicitaires" <?php if ($this->form_data->howDidYouKnewUs === "Banderoles et affiches publicitaires") echo "selected"; ?>>Banderoles et affiches publicitaires</option>
                                <option value="Internet et réseaux sociaux" <?php if ($this->form_data->howDidYouKnewUs === "Internet et réseaux sociaux") echo "selected"; ?>>Internet et réseaux sociaux</option>
                                <option value="Média Radio et TV" <?php if ($this->form_data->howDidYouKnewUs === "Média Radio et TV") echo "selected"; ?>>Média Radio et TV</option>
                                <option value="Campagne de sensibilisation des équipes du PSSFP sur le terrain" <?php if ($this->form_data->howDidYouKnewUs === "Campagne de sensibilisation des équipes du PSSFP sur le terrain") echo "selected"; ?>>Campagne de sensibilisation des équipes du PSSFP sur le terrain</option>
                                <option value="Recommandation d'un ancien" <?php if ($this->form_data->howDidYouKnewUs === "Recommandation d'un ancien") echo "selected"; ?>>Recommandation d'un ancien</option>
                                <option value="Autre" <?php if ($this->form_data->howDidYouKnewUs === "Autre") echo "selected"; ?>>Autre</option>
                            </select>
                            <div class="input-help-text">Merci de nous indiquer comment vous avez entendu parler du programme.</div>
                        </div>
                    </div>
                    <div class="form-row" id="howDidYouKnewUs_autre_row" style="display: <?php echo (isset($this->form_data->howDidYouKnewUs) && $this->form_data->howDidYouKnewUs === "Autre") ? 'block' : 'none'; ?>">
                        <div class="form-group half">
                            <label class="formbold-form-label" for="howDidYouKnewUs_autre">Précisez&nbsp;:</label>
                            <input type="text" class="formbold-form-input" name="howDidYouKnewUs_autre" id="howDidYouKnewUs_autre" value="<?php echo set_value('howDidYouKnewUs_autre', isset($this->form_data->howDidYouKnewUs_autre) ? $this->form_data->howDidYouKnewUs_autre : ''); ?>" />
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const select = document.getElementById('howDidYouKnewUs');
                        const autreRow = document.getElementById('howDidYouKnewUs_autre_row');
                        if (select) {
                            select.addEventListener('change', function() {
                                if (this.value === 'Autre') {
                                    autreRow.style.display = 'block';
                                } else {
                                    autreRow.style.display = 'none';
                                    const input = document.getElementById('howDidYouKnewUs_autre');
                                    if (input) input.value = '';
                                }
                            });
                        }
                    });
                </script>

                <!-- SECTION 7: Engagement -->
                <div class="form-section">
                    <legend><i class="fas fa-handshake"></i> Engagement</legend>
                    <div class="panel-body" style="text-align: justify; font-size: 1rem; margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 5px;">
                        Je soussigné(e) <strong id="label_sous"><?php echo isset($this->form_data->nom) && isset($this->form_data->prenom) ? $this->form_data->nom . ' ' . $this->form_data->prenom : ''; ?></strong>, certifie sur l'honneur l'exactitude des renseignements consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat au programme de Master Professionnel en Finances Publiques.
                    </div>

                    <div class="checkbox-group">
                        <label class="checkbox-item">
                            <input type="checkbox" name="engagement" id="checkbox_engagement" required>
                            J'ai lu et j'accepte <a href="#" target="_blank">les termes, conditions et politiques</a>
                        </label>
                        <div id="engagement_error" class="form-error" style="display: none; color: #dc3545; margin-top: 5px;">
                            <i class="fas fa-exclamation-circle"></i> Vous devez accepter les termes et conditions pour continuer.
                        </div>
                    </div>
                </div>

                <script>
                    // Validation du formulaire pour vérifier que la case est cochée
                    document.getElementById('candidatureForm').addEventListener('submit', function(event) {
                        const checkbox = document.getElementById('checkbox_engagement');
                        const errorMsg = document.getElementById('engagement_error');

                        if (!checkbox.checked) {
                            event.preventDefault();
                            errorMsg.style.display = 'block';
                            // Scroll to the checkbox
                            checkbox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            // Highlight the checkbox
                            checkbox.parentElement.style.boxShadow = '0 0 0 2px #dc3545';
                            return false;
                        } else {
                            errorMsg.style.display = 'none';
                            checkbox.parentElement.style.boxShadow = 'none';
                        }
                    });
                </script>

                <!-- SECTION 8: Revue des informations -->
                <div class="form-section" id="review-section">
                    <legend><i class="fas fa-check-double"></i> Revue des Informations</legend>
                    <p class="review-intro">Veuillez vérifier attentivement toutes les informations saisies avant de soumettre votre candidature.</p>

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
                                    <span class="review-label">Langue principale</span>
                                    <span class="review-value" id="review-langue">-</span>
                                </div>
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
                                <div class="review-item" id="review-epouse-container">
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
                                    <span class="review-label">Département d'origine</span>
                                    <span class="review-value" id="review-dept_dorigine">-</span>
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
                                    <span class="review-label">Pays d'origine</span>
                                    <span class="review-value" id="review-paysorigine">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Pays de résidence</span>
                                    <span class="review-value" id="review-pays_residence">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Adresse</span>
                                    <span class="review-value" id="review-adresse_candidat">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Ville de résidence</span>
                                    <span class="review-value" id="review-ville_residence">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Téléphone WhatsApp</span>
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

                        <!-- Cursus Académique -->
                        <div class="review-section">
                            <h3><i class="fas fa-university"></i> Cursus académique</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Intitulé du dernier diplôme</span>
                                    <span class="review-value" id="review-dernier_diplome_intitule">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Spécialité / Filière</span>
                                    <span class="review-value" id="review-dernier_diplome_specialite">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Domaine</span>
                                    <span class="review-value" id="review-dernier_diplome_domaine">-</span>
                                </div>
                                <div class="review-item" id="review-autre-domaine-container" style="display: none;">
                                    <span class="review-label">Précision domaine</span>
                                    <span class="review-value" id="review-dernier_diplome_autre_domaine">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Établissement</span>
                                    <span class="review-value" id="review-dernier_diplome_etablissement">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Pays de l'établissement</span>
                                    <span class="review-value" id="review-dernier_diplome_pays">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Année d'obtention</span>
                                    <span class="review-value" id="review-dernier_diplome_annee">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Niveau académique</span>
                                    <span class="review-value" id="review-dernier_diplome_niveau">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Mention</span>
                                    <span class="review-value" id="review-dernier_diplome_mention">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Informations professionnelles -->
                        <div class="review-section">
                            <h3><i class="fas fa-briefcase"></i> Informations professionnelles</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Statut professionnel</span>
                                    <span class="review-value" id="review-statut_prof">-</span>
                                </div>
                                <div class="review-item" id="review-autre-statut-container" style="display: none;">
                                    <span class="review-label">Précision statut</span>
                                    <span class="review-value" id="review-autre_statut_prof">-</span>
                                </div>
                                <div class="review-item" id="review-employeur-container">
                                    <span class="review-label">Employeur actuel</span>
                                    <span class="review-value" id="review-structure">-</span>
                                </div>
                                <div class="review-item" id="review-adresse-structure-container">
                                    <span class="review-label">Adresse employeur</span>
                                    <span class="review-value" id="review-adresse_structure">-</span>
                                </div>
                                <div class="review-item" id="review-tel-structure-container">
                                    <span class="review-label">Téléphone employeur</span>
                                    <span class="review-value" id="review-telephone_structure">-</span>
                                </div>
                                <div class="review-item" id="review-email-structure-container">
                                    <span class="review-label">Email employeur</span>
                                    <span class="review-value" id="review-email_structure">-</span>
                                </div>
                                <div class="review-item" id="review-poste-actuel-container">
                                    <span class="review-label">Poste occupé</span>
                                    <span class="review-value" id="review-poste_actuel">-</span>
                                </div>
                                <div class="review-item" id="review-date-debut-container">
                                    <span class="review-label">Date de début de poste</span>
                                    <span class="review-value" id="review-date_debut_poste">-</span>
                                </div>
                                <div class="review-item" id="review-lien-finances-container">
                                    <span class="review-label">Lien avec finances publiques</span>
                                    <span class="review-value" id="review-lien_finances_publiques">-</span>
                                </div>
                                <div class="review-item" id="review-explication-lien-container" style="display: none;">
                                    <span class="review-label">Explication lien partiel</span>
                                    <span class="review-value" id="review-explication_lien_partiel">-</span>
                                </div>
                                <div class="review-item">
                                    <span class="review-label">Années d'expérience</span>
                                    <span class="review-value" id="review-total_annees_experience">-</span>
                                </div>
                            </div>
                        </div>

                        <!-- Connaissance du programme -->
                        <div class="review-section">
                            <h3><i class="fas fa-info-circle"></i> Comment vous avez connu le programme</h3>
                            <div class="review-grid">
                                <div class="review-item">
                                    <span class="review-label">Source d'information</span>
                                    <span class="review-value" id="review-howDidYouKnewUs">-</span>
                                </div>
                                <div class="review-item" id="review-autre-source-container" style="display: none;">
                                    <span class="review-label">Précision source</span>
                                    <span class="review-value" id="review-howDidYouKnewUs_autre">-</span>
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

                <script>
                    // Script pour pré-remplir la section de revue
                    document.addEventListener('DOMContentLoaded', function() {
                        // Fonction pour mettre à jour les valeurs de revue
                        function updateReviewValues() {
                            // Formation
                            updateSelectReviewValue('id_specialite', 'review-specialite');
                            updateRadioReviewValue('type_etude', 'review-type_etude');

                            // Identité
                            updateSelectReviewValue('langue1', 'review-langue');
                            updateSelectReviewValue('civilite', 'review-civilite');
                            updateInputReviewValue('nom', 'review-nom');
                            updateInputReviewValue('prenom', 'review-prenom');
                            updateInputReviewValue('epouse', 'review-epouse');

                            // Date de naissance
                            updateInputReviewValue('date_naissance', 'review-date_naissance');

                            updateInputReviewValue('lieu_de_naissce', 'review-lieu_de_naissce');
                            updateInputReviewValue('nationalite', 'review-nationalite');
                            updateInputReviewValue('region_dorigine', 'review-region_dorigine');
                            updateInputReviewValue('dept_dorigine', 'review-dept_dorigine');
                            updateSelectReviewValue('statu_matrimonial', 'review-statu_matrimonial');
                            updateInputReviewValue('nombre_enfant', 'review-nombre_enfant');

                            // Contact
                            updateSelectReviewValue('paysorigine', 'review-paysorigine');
                            updateSelectReviewValue('pays', 'review-pays_residence');
                            updateInputReviewValue('adressecandidat', 'review-adresse_candidat');
                            updateInputReviewValue('villeresidence', 'review-ville_residence');
                            updateInputReviewValue('telephone1', 'review-telephone');
                            updateInputReviewValue('telephone2', 'review-telephone2');
                            updateInputReviewValue('email', 'review-email');

                            // Cursus Académique
                            updateInputReviewValue('dernier_diplome_intitule', 'review-dernier_diplome_intitule');
                            updateInputReviewValue('dernier_diplome_specialite', 'review-dernier_diplome_specialite');
                            updateSelectReviewValue('dernier_diplome_domaine', 'review-dernier_diplome_domaine');
                            updateInputReviewValue('dernier_diplome_autre_domaine', 'review-dernier_diplome_autre_domaine');
                            updateInputReviewValue('dernier_diplome_etablissement', 'review-dernier_diplome_etablissement');
                            updateSelectReviewValue('dernier_diplome_pays', 'review-dernier_diplome_pays');
                            updateInputReviewValue('dernier_diplome_annee', 'review-dernier_diplome_annee');
                            updateSelectReviewValue('dernier_diplome_niveau', 'review-dernier_diplome_niveau');
                            updateSelectReviewValue('dernier_diplome_mention', 'review-dernier_diplome_mention');

                            // Situation Professionnelle
                            updateSelectReviewValue('statut_prof', 'review-statut_prof');
                            updateInputReviewValue('autre_statut_prof', 'review-autre_statut_prof');
                            updateInputReviewValue('structure', 'review-structure');
                            updateInputReviewValue('adresse_structure', 'review-adresse_structure');
                            updateInputReviewValue('telephone_structure', 'review-telephone_structure');
                            updateInputReviewValue('email_structure', 'review-email_structure');
                            updateInputReviewValue('poste_actuel', 'review-poste_actuel');
                            updateInputReviewValue('date_debut_poste', 'review-date_debut_poste');
                            updateRadioReviewValue('lien_finances_publiques', 'review-lien_finances_publiques');
                            updateInputReviewValue('explication_lien_partiel', 'review-explication_lien_partiel');
                            updateInputReviewValue('total_annees_experience', 'review-total_annees_experience');

                            // Comment vous avez connu le programme
                            updateSelectReviewValue('howDidYouKnewUs', 'review-howDidYouKnewUs');
                            updateInputReviewValue('howDidYouKnewUs_autre', 'review-howDidYouKnewUs_autre');

                            // Affichage conditionnel des éléments
                            toggleReviewElementVisibility('review-epouse-container', document.getElementById('civilite').value !== 'Monsieur');
                            toggleReviewElementVisibility('review-autre-domaine-container', document.getElementById('dernier_diplome_domaine').value === 'Autre');
                            toggleReviewElementVisibility('review-autre-statut-container', document.getElementById('statut_prof').value === 'Autre');

                            const statutProf = document.getElementById('statut_prof').value;
                            const estEtudiant = statutProf === "Étudiant / en recherche d'emploi" || statutProf === "Etudiant";
                            toggleReviewElementVisibility('review-employeur-container', !estEtudiant);
                            toggleReviewElementVisibility('review-adresse-structure-container', !estEtudiant);
                            toggleReviewElementVisibility('review-tel-structure-container', !estEtudiant);
                            toggleReviewElementVisibility('review-email-structure-container', !estEtudiant);
                            toggleReviewElementVisibility('review-poste-actuel-container', !estEtudiant);
                            toggleReviewElementVisibility('review-date-debut-container', !estEtudiant);
                            toggleReviewElementVisibility('review-lien-finances-container', !estEtudiant);

                            toggleReviewElementVisibility('review-explication-lien-container',
                                document.querySelector('input[name="lien_finances_publiques"]:checked')?.value === 'Partiellement');

                            toggleReviewElementVisibility('review-autre-source-container',
                                document.getElementById('howDidYouKnewUs').value === 'Autre');
                        }

                        // Helper pour mettre à jour les valeurs de champs input
                        function updateInputReviewValue(inputId, reviewId) {
                            const input = document.getElementById(inputId);
                            const review = document.getElementById(reviewId);
                            if (input && review) {
                                review.textContent = input.value || '-';
                            }
                        }

                        // Helper pour mettre à jour les valeurs de champs select
                        function updateSelectReviewValue(selectId, reviewId) {
                            const select = document.getElementById(selectId);
                            const review = document.getElementById(reviewId);
                            if (select && review && select.selectedIndex !== -1) {
                                review.textContent = select.options[select.selectedIndex].text;
                                // Si c'est "--" ou "Sélectionnez", afficher "-" à la place
                                if (review.textContent.includes('--') ||
                                    review.textContent.includes('Sélectionnez') ||
                                    review.textContent === '') {
                                    review.textContent = '-';
                                }
                            }
                        }

                        // Helper pour mettre à jour les valeurs de boutons radio
                        function updateRadioReviewValue(radioName, reviewId) {
                            const checkedRadio = document.querySelector('input[name="' + radioName + '"]:checked');
                            const review = document.getElementById(reviewId);
                            if (checkedRadio && review) {
                                if (radioName === 'type_etude') {
                                    // Pour le mode de formation, on veut afficher "Présentiel" ou "Distanciel"
                                    review.textContent = (checkedRadio.value === 'Presentiel') ? 'Présentiel' : 'Distanciel';
                                } else {
                                    review.textContent = checkedRadio.value || '-';
                                }
                            } else if (review) {
                                review.textContent = '-';
                            }
                        }

                        // Helper pour gérer l'affichage des éléments conditionnels
                        function toggleReviewElementVisibility(containerId, condition) {
                            const container = document.getElementById(containerId);
                            if (container) {
                                container.style.display = condition ? 'flex' : 'none';
                            }
                        }

                        // Mettre à jour la revue quand on change de section
                        const formSections = document.querySelectorAll('.form-section');
                        formSections.forEach(section => {
                            section.addEventListener('blur', updateReviewValues, true);
                        });

                        // Mettre à jour la revue quand on clique sur le bouton de revue
                        document.querySelector('.progress-step:last-child').addEventListener('click', updateReviewValues);

                        // Mettre à jour la revue au chargement initial de la page
                        updateReviewValues();

                        // Bouton pour revenir à l'édition
                        document.getElementById('edit-submission').addEventListener('click', function() {
                            const sections = document.querySelectorAll('.form-section');
                            sections.forEach(section => {
                                section.classList.remove('active');
                            });
                            sections[0].classList.add('active'); // Retourner à la première section

                            // Mettre à jour l'état des étapes
                            document.querySelectorAll('.progress-step').forEach((step, index) => {
                                if (index === 0) {
                                    step.classList.add('active');
                                } else {
                                    step.classList.remove('active');
                                }
                            });
                        });
                    });
                </script>

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
<script src="<?= base_url() ?>resources/js/review-form.js"></script>
</body>
</html>
