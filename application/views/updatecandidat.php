<script>
    function changesoustitre() {
        document.getElementById('label_sous').innerHTML = document.getElementById('nom').value;
    }
    function maskepouse() {
        sel = document.getElementById('civilite');
        civilite = sel.options[sel.selectedIndex].value;
        console.log(civilite);
        document.getElementById('epouse').style.display = (civilite === "Monsieur") ? "none" : "block";
    }
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">
            <div class="jumbotron">
                <div class="row">

                    <div class="col-lg-10">
                        
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Master en Finances Publiques: Formulaire de modification </h3>
                                </div>
                
                <span style="color: red"><?php //if (isset($message)) echo $message; ?></span>
                <div class="bs-docs-section1" style="min-height: 800px; font-size: 17px;">
			<center><span style="color:red;"><?php if(isset($message)) echo $message; ?></span></center>
                    <form id="myForm" method="post" class="bs-example form-horizontal" action="<?php echo $action; ?>">
                        <?php //echo validation_errors(); ?>
                        <fieldset>
                            <legend>I- Formation</legend>

                            <div class="form-group " >
                                <span style="color: red"></span>
                                <label for="specialite" class="col-lg-4 control-label">Spécialité:</label>
                                <div class="col-lg-6">
                                    <select name="specialite" class="form-control taille_champ" id="specialite" required >
                                        <option value="" selected="selected">----------------- Choisir une Spécialité -------------------</option>
                                        <?php
                                        foreach ($specialites as $specialite) {
                                            if ($specialite->id == $this->form_data->specialite) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            echo "<option value='" . $specialite->id . "' " . $selected . ">" . $specialite->nom . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
				<div class="form-group " >
                                                <span style="color: red"></span>
                                                <label for="specialite" class="col-lg-4 control-label">Type d'étude:</label>
                                                <div class="col-lg-6">
                                                    <Input type = 'Radio' Name ='type_etude' required value= "presentiel"
								<?php  
									if(isset($this->form_data->type_etude) && $this->form_data->type_etude==='presentiel')
										echo 'checked = "checked"';	
								?>
							>&nbsp;&nbsp;Présentiel&nbsp;&nbsp;&nbsp;
						    <Input type = 'Radio' Name ='type_etude' required value= "distanciel"
								<?php  
									if(isset($this->form_data->type_etude) && $this->form_data->type_etude==='distanciel')
										echo 'checked = "checked"';	
								?>				
							>&nbsp;&nbsp;Distanciel&nbsp;&nbsp;&nbsp;
                                                </div>
                               </div> 
                        </fieldset>

                        <fieldset>
                            <legend>II- Identité et Informations personnelles du candidat</legend>
                            <div class="form-group" >
                                <span style="color: red"> </span>
                                <label for="langue1" class=" col-lg-4 control-label"  >Première Langue :</label>
                                <div class="col-lg-6">
                                    <select  name="langue" class="form-control taille_champ"  id="langue1" required >
                                        <option value="" selected="selected">------------- Choisir première Langue ------------</option>
                                        <option value="Français" <?php if ($this->form_data->langue === "Français") echo "selected"; ?>>Français</option>
                                        <option value="Anglais" <?php if ($this->form_data->langue === "Anglais") echo "selected"; ?>>Anglais</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <span style="color: red"></span>
                                <label class="col-lg-4 control-label " for="civilite">Civilité:</label>
                                <div class="col-lg-6">
                                    <select  name="civilite" onchange="maskepouse();" class="form-control taille_champ"  id="civilite" required >
                                        <option value="" selected="selected">------------- Choisir Civilité ------------</option>
                                        <option value="Madame" <?php if ($this->form_data->civilite === "Madame") echo "selected"; ?>>Madame</option>
                                        <option value="Madémoiselle" <?php if ($this->form_data->civilite === "Madémoiselle") echo "selected"; ?>>Madémoiselle</option>
                                        <option value="Monsieur" <?php if ($this->form_data->civilite === "Monsieur") echo "selected"; ?>>Monsieur</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span style="color: red"></span>
                                <label class="col-lg-4 control-label " for="nom">Nom et Prénoms:</label>
                                <div class="col-lg-6">
                                    <input  value="<?php echo set_value('nom_prenom', $this->form_data->nom_prenom); ?>" 
                                            onchange="changesoustitre();" name="nom_prenom" placeholder="Noms et Prènoms" class="form-control  taille_champ" id="nom"  type="text" required>
                                    <input  value="<?php echo set_value('epouse', $this->form_data->epouse); ?>" 
                                            name="epouse" placeholder="Epouse .........." class="form-control  taille_champ" id="epouse"  type="text" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-4 control-label" for="datenaiss_jj">Né(e) le :<br/>(jj/mm/aaaa)</label>
                                <div class="col-lg-2">
                                    <select name="datenaiss_jj" class="form-control" id="datenaiss_jj" required 
                                            >
                                        <option value="" selected="selected"> ---- Jour ----</option>
                                        <?php
                                        $i = 1;
                                        for ($i = 1; $i < 32; $i++) {
                                            if ($i == $this->form_data->datenaiss_jj) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            ?>
                                            <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="color: red"> </span>
                                </div>
                                <div class="col-lg-2">
                                    <select name="datenaiss_mm" class="form-control" id="datenaiss_mm" required
                                            value="">
                                        <option value="" selected="selected"> ---- Mois ----</option>
                                        <?php
                                        $i = 1;
                                        for ($i = 1; $i < 13; $i++) {
                                            if ($i == $this->form_data->datenaiss_mm) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            ?>
                                            <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="color: red"> </span>
                                </div>
                                <div class="col-lg-2">
                                    <select name="datenaiss_yy" class="form-control" id="datenaiss_yy" required 
                                            >
                                        <option value="" selected="selected"> ---- Année ----</option>
                                        <?php
                                        $x = date(Y);
                                        $i = 0;
                                        for ($i = $x - 65; $i < $x - 20; $i++) {
                                            if ($i == $this->form_data->datenaiss_yy) {
                                                $selected = 'selected';
                                            } else {
                                                $selected = '';
                                            }
                                            ?>
                                            <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span style="color: red"> </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <span style="color: red"> </span>
                                <label class="control-label col-lg-4" for="lieu_de_naissce">Lieu de Naissance :</label>
                                <div class="col-lg-6">
                                    <input value="<?php echo set_value('lieu_de_naissce', $this->form_data->lieu_de_naissce); ?>" name="lieu_de_naissce" placeholder="Lieu de Naissance" class="form-control taille_champ" id="lieu_de_naissce"  type="text" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <span style="color: red"></span>
                                <label class="col-lg-4 control-label" for="statutmatrimonial"> Statut matrimonial :</label>
                                <div class="col-lg-6">
                                    <select  name="statu_matrimonial" class="form-control taille_champ"  id="civilite" required >
                                        <option value="" selected="selected">------------- Choisir première Statut Mat ------------</option>
                                        <option value="Célibataire" <?php if ($this->form_data->statu_matrimonial === "Célibataire") echo "selected"; ?>>Célibataire</option>
                                        <option value="Marié(e)" <?php if ($this->form_data->statu_matrimonial === "Marié(e)") echo "selected"; ?>>Marié(e)</option>
                                        <option value="Veuf(ve)" <?php if ($this->form_data->statu_matrimonial === "Veuf(ve)") echo "selected"; ?>>Veuf(ve)</option>
                                    </select>
                                </div>
                            </div>	

                            
                            <div class="form-group" >
                                <span style="color: red"> </span>
                                <label for="nombre_enfant" class=" col-lg-4 control-label"  >Nombre d'Enfant :</label>
                                <div class="col-lg-6">
                                    <input value="<?php echo set_value('nombre_enfant', $this->form_data->nombre_enfant); ?>" name="nombre_enfant" placeholder="nombre d'enfant" class="form-control taille_champ" id="nombre_enfant"  type="text" required>
                                </div>
                            </div>	

                            <fieldset>
                                <legend>II- Contacts du candidat</legend>


                                <div class="form-group" >
                                    <span style="color: red"> </span>
                                    <label for="pays" class=" col-lg-4 control-label"  >Pays de résidence :</label>
                                    <div class="col-lg-6">
                                        <select  name="paysresidence" class="form-control taille_champ"  id="pays" required

                                                 >
                                            <option value="" selected="selected">------------- Choisir pays ------------</option>
                                            <?php
                                            foreach ($pays as $pay) {
                                                if ($pay->id == $this->form_data->paysresidence) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo "<option value='" . $pay->id . "' " . $selected . ">" . $pay->nom . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>	

                                <div class="form-group">
                                    <span style="color: red"> </span>
                                    <label class="col-lg-4 control-label" for="adressecandidat">Adresse du candidat :</label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('adresse_candidat', $this->form_data->adresse_candidat); ?>" name="adresse_candidat" placeholder="Adresse du candidat" required class="form-control taille_champ" id="adressecandidat"  type="text">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <span style="color: red"></span>
                                    <label class="col-lg-4 control-label" for="villeresidence">Ville de résidence :</label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('ville_residence', $this->form_data->ville_residence); ?>" name="ville_residence" placeholder="Ville de résidence" required class="form-control taille_champ" id="villeresidence"  type="text">
                                    </div>
                                </div>

                                <span style="color: red;float: right;display: inline"><?php echo form_error('telephone'); ?></span>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="telephone1">Téléphone 1 :</label>
                                    <div class="col-lg-6">
                                        <input disabled="true" value="<?php echo set_value('telephone', $this->form_data->telephone); ?>" name="telephone" placeholder="Téléphone" required class="form-control taille_champ" id="telephone1"  type="text" pattern="[0-9]*">
                                    </div>
                                </div>
                                <span style="color: red;float: right;display: inline"><?php echo form_error('telephone2'); ?></span>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="telephone2">Téléphone 2 :</label>
                                    <div class="col-lg-6">
                                        <input disabled="true" value="<?php echo set_value('telephone2', $this->form_data->telephone2); ?>" name="telephone2" placeholder="Téléphone" required class="form-control taille_champ" id="telephone2"  type="text" pattern="[0-9]*">
                                    </div>
                                </div>
                                <span style="color: red;float: right;display: inline"><?php echo form_error('email'); ?></span>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="email">Email Personnel :</label>
                                    <div class="col-lg-6">
                                        <input disabled="true" value="<?php echo set_value('email', $this->form_data->email); ?>" name="email" placeholder="exemple@site.com" required class="form-control taille_champ" id="email"  type="email">
                                    </div>
                                </div>
                                <span style="color: red;float: right;display: inline"><?php echo form_error('emailverif'); ?></span>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="emailverif">Copie Email Personnel :</label>
                                    <div class="col-lg-6">
                                        <input disabled="true" value="<?php echo set_value('emailverif', $this->form_data->emailverif); ?>" name="emailverif" placeholder="exemple@site.com"  required class="form-control taille_champ" id="emailverif"  type="email">
                                    </div>
                                </div>

                                <br/>
                            </fieldset>

                            <!--groupe 3-->
                            <fieldset>
                                <legend>III- Cursus Académique</legend>

                                <div class="form-group" >
                                    <span style="color: red"> </span>
                                    <label for="select" class=" col-lg-4 control-label" for="nbanneeetude">Nombre d'années d'etudes supérieures : </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('nombre_annee_etude_sup', $this->form_data->nombre_annee_etude_sup); ?>" name="nombre_annee_etude_sup" class="form-control taille_champ" pattern="[0-9]*" required id="nbanneeetude"  type="text" placeholder="Nombre d'années d'etudes supérieures " list="list_annee">
                                        <datalist id="list_annee">
                                            <?php
                                            $i = 1;
                                            for ($i = 3; $i < 11; $i++) {
                                                ?>
                                                <option value="<?php echo $i; ?>">
                                                <?php } ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span style="color: red"> </span>
                                    <label class="col-lg-4 control-label" for="dernier_diplome">Dernier Diplome Obtenu : </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('dernier_diplome', $this->form_data->dernier_diplome); ?>" name="dernier_diplome" class="form-control taille_champ"  required id="dernier_diplome"  type="text"  placeholder="Dernier Diplome Obtenu " list="list_dernierdiplome">
                                        <datalist id="list_dernierdiplome">
                                            <option value="Licence" >
                                            <option value="DEA / Master" >
                                            <option value="Doctorat" >				
                                        </datalist>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <span style="color: red"></span>
                                    <label class="col-lg-4 control-label" for="diplome_obtenu_a">Lieu d'obtention du diplome : </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('diplome_obtenu_a', $this->form_data->diplome_obtenu_a); ?>" name="diplome_obtenu_a" required placeholder="Lieu d'obtention du diplome"  class="form-control taille_champ" id="lieudernierdiplome"  type="text">
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <span style="color: red"></span>
                                    <label for="annee_optention_diplome" class=" col-lg-4 control-label" for="anneedernierdiplome">Année d'Obtention du diplome : </label>
                                    <div class="col-lg-6">
                                        <select name="annee_optention_diplome" class="form-control taille_champ"  id="annee_optention_diplome" required 
                                                >
                                            <option value="" selected="selected">------------- Choisir une année ------------</option>
                                            <?php
                                            $x = date('Y');
                                            $i = 0;
                                            for ($i = $x; $i >= $x - 30; $i--) {
                                                if ($i == $this->form_data->annee_optention_diplome) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                ?>
                                                <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                            </fieldset>
                            <!--groupe 5-->
                            <fieldset>
                                <legend>IV- Coordonnées professionnel</legend>

                                <div class="form-group">
                                    <span style="color: red"></span>
                                    <label class="col-lg-4  control-label">Votre statut actuel: </label>
                                    <div class="col-lg-6">
                                        <select  name="statut_prof" class="form-control taille_champ"  id="statut" required >
                                            <option value="" selected="selected">------------- Choisir première statut actuel ------------</option>
                                            <option value="Fonctionnaire" <?php if ($this->form_data->statut_prof === "Fonctionnaire") echo "selected"; ?>>Fonctionnaire</option>
                                            <option value="Travailleur Privé" <?php if ($this->form_data->statut_prof === "Travailleur_Privé") echo "selected"; ?>>Travailleur Privé</option>
                                            <option value="Etudiant" <?php if ($this->form_data->statut_prof === "Etudiant") echo "selected"; ?>>Etudiant</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <span style="color: red"></span>
                                    <label class="col-lg-4 control-label" for="structure">Institution à laquelle vous appartenez: </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('structure', $this->form_data->structure); ?>" name="structure" class="form-control taille_champ" id="structure"  type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span style="color: red"></span>
                                    <label class="col-lg-4 control-label" for="adresse_structure">Adresse de cette Institution: </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('adresse_structure', $this->form_data->adresse_structure); ?>" name="adresse_structure" class="form-control taille_champ" id="adressAdministration"  type="text">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="teladmi">Téléphone de l'Institution: </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('telephone_structure', $this->form_data->telephone_structure); ?>" name="telephone_structure" placeholder="Téléphone Administration" class="form-control taille_champ" id="teladmi"  type="text">
                                        <span style="color: red"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-4 control-label" for="email_structure">Email Administration: </label>
                                    <div class="col-lg-6">
                                        <input value="<?php echo set_value('email_structure', $this->form_data->email_structure); ?>" name="email_structure" placeholder="Email Administration" class="form-control taille_champ" id="email_structure"  type="text">
                                        <span style="color: red"></span>
                                    </div>
                                </div>
                            </fieldset>

                            <!--groupe 7-->
                            <fieldset>
                                <legend>VII- Engagement</legend>
                                <div class="row">
                                    <div class="form-group">
                                        <div style="margin-left: 10px;">
                                            <label class="col-lg-2">

                                            </label>
                                        </div>
                                        <div class="col-lg-8 panel panel-default " style="margin-left: 30px;">
                                           
                                            <div class="panel-body">
                                                Je sousigné(e) : <h3 class="" id="label_sous"><?php if(isset($this->form_data->nom_prenom))echo $this->form_data->nom_prenom; ?></h3>, certifie sous l'honneur, l'exactidude des renseignements 
                                                consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat 
                                                au programme de Master Professionnel en Finances Publiques.

                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-1">

                                    </div>
                                    <div class="col-lg-5">
                                        <span style="color: red">  </span>
                                        <label >
                                            <input name="engagement" type="checkbox" required> J'ai lu et j'accepte <a href=""> les conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div  style="text-align: right;">
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">

                                        <button  name="<?php if(isset($submitname)) echo $submitname; ?>" id="subenregistrer"   class="btn btn-info" >Soummetre</button> 
                                        
                                    </div>
                                </div>
                            </div><br/>
                    </form>
                    <br/><br/>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
