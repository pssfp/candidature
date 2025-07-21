<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">
            <div class="jumbotron">
                <div class="row">

                    <div class="col-lg-10">
                        
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Master en Finances Publiques: Candidaturé enrégistrée avec succès </h3>
                                </div>
                <span style="color: red"><?php if (isset($message)) echo $message; ?></span>
                <div class="bs-docs-section1" style=" font-size: 17px;">
                    <?php 
                    $succes = $this->session->flashdata('succes');
//                    $succes="message";
                    if (isset($succes) && $succes != '') { ?>
                        
                        <?php
                        $id = $this->session->flashdata('id');
                        $numordre = $this->session->flashdata('numordre');
                        $phone = $this->session->flashdata('telephone');
                        $email = $this->session->flashdata('email');
                        ?>
                        <div style="text-align: center">Nous vous informons que votre candidature a bien été enregistrée. <br/>Bien vouloir noter les informations suivantes. Elles vous serviront à vous connecter et à pouvoir mettre à jour votre candidature. </div><br/>
                        <div class="form-group">
                                <label class="control-label col-lg-2" >Votre numéro d'ordre : </label>
                                <div class="col-lg-4">
                                    <span class="form-control "> <?php echo $numordre; ?> </span>
                                </div>
                        </div><br/>
                        <div class="form-group">
                                <label class="control-label col-lg-2" >Votre téléphone : </label>
                                <div class="col-lg-4">
                                   <span class="form-control "> <?php echo $phone; ?> </span>
                                </div>
                        </div><br/>
                        <div class="form-group">
                                <label class="control-label col-lg-2" >Votre email : </label>
                                <div class="col-lg-4">
                                    <span class="form-control "> <?php echo $email; ?> </span>
                                </div>
                        </div><br/>
                        <div class="form-group">
                            <center>
                            <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/impression/imprimer_fiche/<?php echo $id; ?>"><i class="icon-inbox"></i>Télécharger, Imprimer votre fiches de candidature ici</a>
                            </center>
                        </div>
                        
                    <?php } ?>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>