<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Programme Supérieur de Spécialisation en Finances Publiques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <script src="<?php echo base_url(); ?>resources/js/mainAjax.js"></script>-->

    <script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/jquery.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/favicon.png" />
    <script type="text/javascript">
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>


    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/org_lib/bootstrap.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/org_lib/bootstrap11.css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style.css">
    <script src="../bower_components/bootstrap/assets/js/html5shiv.js"></script>
    <script src="../bower_components/bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
        *{
            font-family: "Open Sans", sans-serif;
        }
    </style>
    <script src="<?php echo base_url(); ?>resources/org_lib/ga.js" async="" type="text/javascript"></script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-23019901-1']);
        _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>
<body>
<!-- Navbar
================================================== -->
<div style="width:100%; height: 30px; background-color: #683884;">
    <div class="container">
        <div class="row" style="color:#fff; margin-top: 3px;">

            <div id="menu-principal" class="col-lg-10" style="color:#fff;">
                <a href="<?php echo base_url(); ?>index.php"> Accueil</a> &nbsp;|&nbsp;
                <a href="<?php echo base_url(); ?>index.php/candidature/add"> Inscription</a> &nbsp;|&nbsp;
                <a href="<?php echo base_url(); ?>index.php/adminAuth"> Administration</a>

            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-1">
            <img src='<?php echo base_url(); ?>resources/images/logo5.png' width="75" height="35" />
        </div>
        <div class="col-lg-11">
            <div class="page-header">
                <h2 id="forms" style="text-aligne:justify; margin-top: -15px;">
                    <font style="color: #683884; ">
                        <center>Appel à candidature, 12ème promotion Master en Finances Publiques<br /> Année
                            académique: 2024 - 2025 </center>
                    </font>
                </h2>
                <div class="row" style="">
                    <div class="col-lg-16 right_align">
                        <a href="<?php echo base_url(); ?>index.php/candidature/add"
                           class="btn" style="
                                                    background:linear-gradient(to bottom, #c123de 5%, #a20dbd 100%);
                                                    border-radius:6px;
                                                    color:#ffffff;
                                                    font-family:Arial;
                                                    font-size:15px;
                                                    font-weight:bold;
                                                    padding:6px 24px;
                                                    text-decoration:none;
                                                    text-shadow:0px 1px 0px #9b14b3;
                                                ">S'inscrire ici</a>
                        <a href="<?php echo base_url(); ?>index.php/candidature/initupdate"
                           class="btn" style=" background:linear-gradient(to bottom, #e4685d 5%, #eb675e 100%);
                                                    border-radius:6px;
                                                    color:#ffffff;
                                                    font-family:Arial;
                                                    font-size:15px;
                                                    font-weight:bold;
                                                    padding:6px 24px;
                                                    text-decoration:none;
                                                    text-shadow:0px 1px 0px #9b14b3;
                                                    ">Modifier son inscription</a>
                        <!--<a  href="<?php echo base_url(); ?>index.php" class="btn btn-success">Nous contacter</a>-->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $content; ?>

    <div class="footer">
        <div class="row">

            <div class="col-lg-12">
                <center>
                    &COPY; Septembre 2024: <a href="http://www.pfinancespubliques.org">Programme Supérieur de
                        Spécialisation en Finances Publiques <a />
                </center><br><br>
            </div>
        </div>
    </div>
</div>

<!-- Le javascript
================================================== -->
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>

<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-transition.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-alert.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-modal.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-scrollspy.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-tab.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-popover.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-button.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-collapse.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-carousel.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/bootstrap-typeahead.js"></script>
<script src="<?php echo base_url(); ?>resources/bootstrap-lib/js/application.js"></script>
</body>

</html>