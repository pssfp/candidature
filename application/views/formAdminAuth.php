<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">
            <div class="jumbotron">
                
                
                <div class="row">

                        <div class="col-lg-12">
                            <div class="col-lg-2">
                                
                            </div>
                            <div class="col-lg-8">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Master en Finances Publiques : Admin Authentification</h3>
                                    </div>
                                    <div class="panel-body" >
                                        <div style="color: #002166">
                    <center>
                        Veuillez entrer vos identifiants<br/>
                    </center>
                </div>
                <span style="color: red">
                    <center><?php if (isset($message)) echo $message; ?></center>
                </span>

                    <form id="myForm" method="post" class="bs-example form-horizontal" action="<?php echo $action; ?>">
                        <div class="form-group">
                            <span style="color: red"></span>
                            <label class="col-lg-4 control-label" for="login">Identifiant :</label>
                            <div class="col-lg-6">
                                <input value="<?php echo set_value('login', $this->form_data->login); ?>" 
                                       name="login" placeholder="Identifiant"  
                                       required class="form-control taille_champ" id="login"  type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-4 control-label" for="password">Password :</label>
                            <div class="col-lg-6">
                                <input value="<?php echo set_value('password', $this->form_data->password); ?>" 
                                       name="password" placeholder="Mot de passe" required class="form-control taille_champ" 
                                       id="password"  type="password"  >
                            </div>
                        </div>
                        <div  style="text-align: right;">
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button  name="<?php if (isset($submitname)) echo $submitname; ?>" id="subenregistrer"  class="btn btn-info" >Connexion</button> 
                                </div>
                            </div>
                        </div><br/>
                    </form>
                
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
