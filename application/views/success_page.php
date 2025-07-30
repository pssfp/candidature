<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidature Soumise avec Succès</title>
    <link rel="stylesheet" href="<?= base_url() ?>resources/css/modern-form.css">
    <style>
        .success-container {
            text-align: center;
            padding: 40px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: 40px auto;
            max-width: 600px;
        }
        .success-icon {
            font-size: 48px;
            color: #28a745;
        }
        .success-title {
            font-size: 24px;
            margin-top: 20px;
            color: #333;
        }
        .success-message {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }
        .success-actions {
            margin-top: 30px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin: 0 10px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-container">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="success-title">Candidature soumise avec succès !</h1>
            <p class="success-message">
                Merci d'avoir soumis votre candidature. Un email de confirmation vous a été envoyé avec les détails de votre inscription.
            </p>
            <div class="success-actions">
                <a href="<?= site_url('candidature') ?>" class="btn btn-primary">Retour à l'accueil</a>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>
</html>

