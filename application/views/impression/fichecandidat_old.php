<div class="bs-docs-section1">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header" style="text-align: center;">
                <h2 id="forms">Formulaire de pré-inscription au programme de <?php echo $formation_nom_titre; ?> <br/> </h2>
                <h3 id="forms">Récapitulatif des informations saisies</h3>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="row" style="margin-left: 150px;">
        <div class="col-lg-10">
            <div class="well">
                <form  method="post" class="bs-example form-horizontal" action="candidature/confirmer">
                     <!--groupe 4-->
                    <div  style="text-align: right;">
                        <div class="form-group">
                            <div class="col-lg-12 col-lg-offset-2">
                                <button type="submit" formaction="<?php echo $formation_id?>/?action=modif" class="btn btn-primary">&LT;&LT; Modifier</button> 
                                <button formaction="<?php echo $formation_id?>/?action=submit" class="btn btn-info">Valider candidature</button> 
                                <button class="btn btn-warning">Annuler</button> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
