<!--<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading" style="background : #683884">
                                    <h3 class="panel-title">Master en Finances Publiques</h3>
                                </div>

                                
                                <div class="panel-body">
                                    <div style="color: #002166">
                                        <center>
                                            Veuillez entrer le numéro d'ordre reçu à l'enrégistrement de votre
                                            candidature et votre numéro de téléphone<br />
                                        </center>
                                    </div>
                                    <span style="color: red">
                                        <center><?php if (isset($message))
                                            echo $message; ?></center>
                                    </span>
                                    <form id="myForm" method="post" class="bs-example form-horizontal" action="<?php echo $action; ?>">
                                        <div class="form-group">
                                            <span style="color: red"></span>
                                            <label class="col-lg-4 control-label" for="numordre">Numéro d'Ordre :</label>
                                            <div class="col-lg-8">
                                                <input value="<?php echo set_value('numordre', $this->form_data->numordre); ?>" name="numordre" placeholder="Numéro d'Ordre" pattern="[0-9]*" required class="form-control taille_champ" id="Numéro d'Ordre" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label" for="telephone">Téléphone :</label>
                                            <div class="col-lg-8">
                                                <input value="<?php echo set_value('telephone', $this->form_data->telephone); ?>" name="telephone" placeholder="Téléphone" required class="form-control taille_champ" id="telephone" type="text" pattern="[0-9]*">
                                            </div>
                                        </div>
                                        <div style="text-align: right;">
                                            <div class="form-group">
                                                <div class="col-lg-10 col-lg-offset-2">
                                                    <button name="envoyer" id="subenregistrer" class="btn btn-info" style="background:#44c767; border-radius:6px; border:1px solid #18ab29; display:inline-block; cursor:pointer; color:#ffffff; font-family:Arial; font-size:17px; padding:2%; text-decoration:none; text-shadow:0px 1px 0px #2f6627;">Ouvrir le formulaire</button>
                                                    <?php echo anchor(
                                                        'candidature/initRecupOrdre/',
                                                        'Numéro d\'ordre oublié',
                                                        array(
                                                            'class' => 'btn btn-warning',

                                                        )
                                                    ); ?>
                                                </div>
                                            </div>
                                        </div><br />
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


                                                -->



<div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 50vh;flex-grow: 1; ">
        <div class="loginbackground box-background--white ">
            <div class="loginbackground-gridContainer">
                <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
                    <div class="box-root"
                        style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
                    </div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
                    <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;">
                    </div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
                    <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
                    <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
                    <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
                    <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
                    <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
                    <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
                </div>
                <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
                    <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;">
                    </div>
                </div>
            </div>
        </div>
        <div class="box-root  flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
            <div class="box-root padding-top--30 padding-bottom--15 flex-flex flex-justifyContent--center">
                <h1 style="text-align : center; color: #683884">Master en Finances Publiques</h1>
            </div>

            <div class="formbg-outer">
                <div class="formbg">
                    <div class="formbg-inner padding-horizontal--48">
                        <span style="color: #ff0000" class="text-center">
                            <?php if (isset($message))
                                echo $message; ?>
                        </span>
                        <span class="padding-bottom--15"
                            style="font-size: 108%; line-height: 100%; text-align: center;"> Entrez le numéro d'ordre
                            reçu à l'enrégistrement et votre numéro de téléphone</span>
                        <form id="myForm" method="post" class="bs-example form-horizontal"
                            action="<?php echo $action; ?>">
                            <div class="field padding-bottom--24">
                                <label for="numordre">Numéro d'Ordre :</label>
                                <input value="<?php echo set_value('numordre', $this->form_data->numordre); ?>"
                                    name="numordre" placeholder="Numéro d'Ordre" pattern="[0-9]*" required
                                    class="form-control taille_champ" id="Numéro d'Ordre" type="number">
                            </div>

                            <div class="field padding-bottom--24">
                                <label for="telephone">Numéro de téléphone :</label>
                                <input value="<?php echo set_value('telephone', $this->form_data->telephone); ?>"
                                    name="telephone" placeholder="Téléphone" required class="form-control taille_champ"
                                    id="telephone" type="number" pattern="[0-9]*">
                            </div>
                            <div class="field padding-bottom--24">
                                <input type="submit" name="envoyer" value="Ouvrir le formulaire">
                            </div>
                            <div class="field">
                                <a class="ssolink" href="<?php echo site_url('candidature/initRecupOrdre/'); ?>">Numéro
                                    Oublié ?</a>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="footer-link padding-top--24">
                    <span>Vous n'êtes pas inscrit ? <a href="">Cliquez Ici</a></span>
                    <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
                        <span><a href="#">© PSSFP</a></span>
                        <span><a href="#">Acceuil</a></span>
                        <span><a href="#">Communiqué</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    * {
        padding: 0;
        margin: 0;
        color: #683884;
        box-sizing: border-box;
        word-wrap: break-word;
        font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Ubuntu, sans-serif;
    }

    h1 {
        letter-spacing: -1px;
    }

    a {
        color: #5469d4;
        text-decoration: unset;
    }

    .login-root {
        background: #fff;
        display: flex;
        width: 100%;
        min-height: 100vh;
        overflow: hidden;
    }

    /*
.loginbackground {
    min-height: 692px;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    z-index: 0;
    overflow: hidden;
}*/
    .flex-flex {
        display: flex;
    }

    .align-center {
        align-items: center;
    }

    .center-center {
        align-items: center;
        justify-content: center;
    }

    .box-root {
        box-sizing: border-box;
    }

    .flex-direction--column {
        -ms-flex-direction: column;
        flex-direction: column;
    }

    /*.loginbackground-gridContainer {
    display: -ms-grid;
    display: grid;
    -ms-grid-columns: [start] 1fr [left-gutter] (86.6px)[16] [left-gutter] 1fr [end];
    grid-template-columns: [start] 1fr [left-gutter] repeat(16,86.6px) [left-gutter] 1fr [end];
    -ms-grid-rows: [top] 1fr [top-gutter] (64px)[8] [bottom-gutter] 1fr [bottom];
    grid-template-rows: [top] 1fr [top-gutter] repeat(8,64px) [bottom-gutter] 1fr [bottom];
    justify-content: center;
    margin: 0 -2%;
    transform: rotate(-12deg) skew(-12deg);
}*/
    .box-divider--light-all-2 {
        box-shadow: inset 0 0 0 2px #e3e8ee;
    }

    .box-background--blue {
        background-color: #5469d4;
    }

    .box-background--white {
        background-color: #ffffff;
    }

    .box-background--blue800 {
        background-color: #212d63;
    }

    .box-background--gray100 {
        background-color: #e3e8ee;
    }

    .box-background--cyan200 {
        background-color: #7fd3ed;
    }

    .padding-top--64 {
        padding-top: 64px;
    }

    .padding-top--24 {
        padding-top: 24px;
    }

    .padding-top--48 {
        padding-top: 48px;
    }

    .padding-bottom--24 {
        padding-bottom: 24px;
    }

    .padding-horizontal--48 {
        padding: 48px;
    }

    .padding-bottom--15 {
        padding-bottom: 15px;
    }


    .flex-justifyContent--center {
        -ms-flex-pack: center;
        justify-content: center;
    }

    .formbg {
        margin: 0px auto;
        width: 100%;
        max-width: 448px;
        background: white;
        border-radius: 4px;
        box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
    }

    span {
        display: block;
        font-size: 20px;
        line-height: 28px;
        color: #2b1a36;
    }

    label {
        margin-bottom: 10px;
    }

    .reset-pass a,
    label {
        font-size: 14px;
        font-weight: 600;
        display: block;
    }

    .reset-pass>a {
        text-align: right;
        margin-bottom: 10px;
    }

    .grid--50-50 {
        display: grid;
        grid-template-columns: 50% 50%;
        align-items: center;
    }

    .field input {
        font-size: 16px;
        line-height: 28px;
        padding: 8px 16px;
        width: 100%;
        min-height: 44px;
        border: unset;
        border-radius: 4px;
        outline-color: rgb(84 105 212 / 0.5);
        background-color: rgb(255, 255, 255);
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(60, 66, 87, 0.16) 0px 0px 0px 1px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px;
    }

    input[type="submit"] {
        background-color: rgb(84, 105, 212);
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0.12) 0px 1px 1px 0px,
            rgb(84, 105, 212) 0px 0px 0px 1px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(0, 0, 0, 0) 0px 0px 0px 0px,
            rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
        color: #fff;
        font-weight: 600;
        cursor: pointer;
    }

    .field-checkbox input {
        width: 20px;
        height: 15px;
        margin-right: 5px;
        box-shadow: unset;
        min-height: unset;
    }

    .field-checkbox label {
        display: flex;
        align-items: center;
        margin: 0;
    }

    a.ssolink {
        display: block;
        text-align: center;
        font-weight: 600;
    }

    .footer-link span {
        font-size: 14px;
        text-align: center;
    }

    .listing a {
        color: #697386;
        font-weight: 600;
        margin: 0 10px;
    }

    .animationRightLeft {
        animation: animationRightLeft 2s ease-in-out infinite;
    }

    .animationLeftRight {
        animation: animationLeftRight 2s ease-in-out infinite;
    }

    .tans3s {
        animation: animationLeftRight 3s ease-in-out infinite;
    }

    .tans4s {
        animation: animationLeftRight 4s ease-in-out infinite;
    }

    @keyframes animationLeftRight {
        0% {
            transform: translateX(0px);
        }

        50% {
            transform: translateX(1000px);
        }

        100% {
            transform: translateX(0px);
        }
    }

    @keyframes animationRightLeft {
        0% {
            transform: translateX(0px);
        }

        50% {
            transform: translateX(-1000px);
        }

        100% {
            transform: translateX(0px);
        }
    }
</style>