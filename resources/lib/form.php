<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!-- Forms
      ================================================== -->
<div class="bs-docs-section1">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header" style="text-align: center;">
                <h2 id="forms">Formulaire de pré-inscription au <br/> <font style="color: #dd5600">Programme Supérieur de Spécialisation en Finances Publiques(PSSFP) </font></h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="well">
                <form class="bs-example form-horizontal">
                    <fieldset>
                        <legend>Choix de formation</legend>
                        <div class="panel panel-default" >
                            <div class="panel-body ">
                                <div class="form-group " style="float: left">
                                    <label for="select" class="col-lg-2 control-label">Formation</label>
                                    <div class="col-lg-10">
                                        <select class="form-control taille_champ" id="select">
                                            <option selected="selected">------- Choisir une formation -------</option>
                                            <option>Master Professionnel en Finances Publiques (MPFP) </option>
                                            <option>Formation certificative de courte durée</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="float: right">
                                    <label for="select" class="col-lg-2 control-label">Spécialité</label>
                                    <div class="col-lg-10">
                                        <select class="form-control taille_champ" id="select">
                                            <option selected="selected">----------------- Choisir une spécialité -------------------</option>
                                            <option>------------------------------------------</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <!--groupe 2--> 
                    <fieldset>
                        <legend>Informations Personnelles</legend>
                        <div class="panel panel-default" style='float: left; width: 540px;'>
                            <div class="panel-body marge_droit">
                                <div class="form-group">
                                    <label class="control-label " for="nom">Nom et Prénoms</label>
                                    <input class="form-control taille_champ" id="nom"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="Epouse">Epouse</label>
                                    <input class="form-control taille_champ" id="Epouse"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="naissance">Date de Naissance</label>
                                    <input class="form-control taille_champ" id="naissance"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Sexe</label>
                                    
                                    <div class="col-lg-10">
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="checked" type="radio">
                                                Masculin
                                            </label>
                                            
                                        </div>
                                        <div class="radio">
                                            
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option2"  type="radio">
                                                Feminin
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Statut matrimonial</label>
                                    <div class="col-lg-10">
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="checked" type="radio">
                                                Célibataire
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option2"  type="radio">
                                                Marié(e)
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option3"  type="radio">
                                                Veuf(ve)
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="lieu">Lieu de Naissance</label>
                                    <input class="form-control taille_champ" id="lieu"  type="text">
                                </div>
                               
                                <div class="form-group" >
                                    <label for="select" class=" control-label" for="nationalite">Nationalité</label>
                                        <select class="form-control taille_champ"  id="nationalite">
                                            <option selected="selected">------------- Choisir une Nationalité ------------</option>
                                            <option>Cameroun</option>
                                            <option>Congo</option>
                                            <option>Gabon</option>
                                        </select>
                                </div>

                            </div>
                        </div>
                        <div class="panel panel-default" style='float: right; width: 540px;'>
                            <div class="panel-body marge_droit">
                                <div class="form-group">
                                    <label class="control-label" for="adresseCandidat">Adresse du candidat :</label>
                                    <input class="form-control taille_champ" id="adresseCandidat"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="villeResidence">Ville de résidence</label>
                                    <input class="form-control taille_champ" id="villeResidence"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="tel1">Télephone 1</label>
                                    <input class="form-control taille_champ" id="tel1"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="tel2">Télephone 1</label>
                                    <input class="form-control taille_champ" id="tel2"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">Email</label>
                                    <input class="form-control taille_champ" id="email"  type="text">
                                </div>
                                
                               
                                <div class="form-group" >
                                    <label for="select" class=" control-label" for="nationalite">Première Langue</label>
                                        <select class="form-control taille_champ"  id="nationalite">
                                            <option selected="selected">------------- Choisir première Langue ------------</option>
                                            <option>Français</option>
                                            <option>Anglais</option>
                                        </select>
                                </div>
                                <div class="form-group" >
                                    <label for="select" class=" control-label" for="nationalite">Deuxieme Langue</label>
                                        <select class="form-control taille_champ"  id="nationalite">
                                            <option selected="selected">------------- Choisir deuxieme Langue ------------</option>
                                            <option>Français</option>
                                            <option>Anglais</option>
                                        </select>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                    <!--groupe 3-->
                    <fieldset>
                        <legend>Cursus Scolaire et Informations Professionnelle</legend>
                        <div class="panel panel-default" style='float: left; width: 540px;'>
                            <div class="panel-body marge_droit">
                                <div class="form-group" >
                                    <label for="select" class=" control-label" for="nbanneesup">Nombre d'années d'etudes supérieures: </label>
                                        <select class="form-control taille_champ"  id="nbanneesup">
                                            <option selected="selected">------------- choisir un nombre ------------</option>
                                            <?php $i=1; for ($i = 1; $i < 15; $i++) { ?>
                                            <option><?php echo $i ;} ?></option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="dernDiplom">Dernier Diplome Obtenu: </label>
                                    <input class="form-control taille_champ" id="dernDiplom"  type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="lieuDiplo">Lieu d'obtention du diplome: </label>
                                    <input class="form-control taille_champ" id="lieuDiplo"  type="text">
                                </div>
                                <div class="form-group" >
                                    <label for="select" class=" control-label" for="anneeObtention">Année d'Obtention du diplome: </label>
                                        <select class="form-control taille_champ"  id="anneeObtention">
                                            <option selected="selected">------------- Choisir une année ------------</option>
                                            <?php $i=1990; for ($i = 1990; $i < 2016; $i++) { ?>
                                            <option><?php echo $i ;} ?></option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" style='float: right; width: 540px;'>
                            <div class="panel-body marge_droit">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Etes vous: </label>
                                    <div class="col-lg-10">
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option1" checked="checked" type="radio">
                                                Fonctionnaire
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option2"  type="radio">
                                                Travailleur Privé 
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option3"  type="radio">
                                                Etudiant
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input name="optionsRadios" id="optionsRadios1" value="option4"  type="radio">
                                                Autre
                                            </label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <div  style="text-align: right;">
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-info">Soummetre</button> 
                            <button class="btn btn-warning">Annuler</button> 
                        </div>
                    </div>
                        </div>
                </form>
            </div>
        </div>


    </div>
</div>