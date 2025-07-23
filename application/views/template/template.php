<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Programme Supérieur de Spécialisation en Finances Publiques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    
    <!-- jQuery et jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VOTRE_ID_GA4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-VOTRE_ID_GA4');
    </script>
    
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
        * {
            font-family: "Open Sans", sans-serif;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>

<body>
    <!-- Navbar -->
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

    <div class="">
        
        <?php echo $content; ?>

    <!-- Twitter Widget (si nécessaire) -->
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>