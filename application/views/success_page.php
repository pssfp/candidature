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
        .candidate-info {
            margin: 20px 0;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            text-align: left;
        }
        .candidate-info h3 {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 15px;
            color: #495057;
        }
        .candidate-info p {
            margin: 8px 0;
        }
        .info-label {
            font-weight: bold;
            color: #495057;
        }
        .email-status {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
        }
        .status-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .error-details {
            font-family: monospace;
            background: #f8f8f8;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 10px;
            white-space: pre-wrap;
            text-align: left;
            max-height: 200px;
            overflow: auto;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-container">
            <div class="success-icon <?= $this->session->flashdata('email_sent') ? '' : 'error' ?>">
                <i class="<?= $this->session->flashdata('email_sent') ? 'fas fa-check-circle' : 'fas fa-exclamation-circle' ?>"></i>
            </div>
            <h1 class="success-title">Candidature soumise avec succès !</h1>

            <div class="candidate-info">
                <h3>Informations de votre candidature</h3>
                <p><span class="info-label">Numéro de dossier :</span> <?= $this->session->flashdata('numordre') ?></p>
                <p><span class="info-label">Téléphone :</span> <?= $this->session->flashdata('telephone') ?></p>
                <p><span class="info-label">Email :</span> <?= $this->session->flashdata('email') ?></p>

                <div class="email-status <?= $this->session->flashdata('email_sent') ? 'status-success' : 'status-error' ?>">
                    <?php if ($this->session->flashdata('email_sent')): ?>
                        <p><i class="fas fa-check"></i> Un email de confirmation a été envoyé à votre adresse email.</p>
                    <?php else: ?>
                        <p><i class="fas fa-times"></i> Nous n'avons pas pu envoyer l'email de confirmation.</p>
                        <p>Veuillez noter précieusement les informations ci-dessus et contacter l'administration si nécessaire.</p>

                        <?php if ($this->session->flashdata('email_error')): ?>
                            <div class="error-details">
                                <?= $this->session->flashdata('email_error') ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <p class="success-message">
                Merci d'avoir soumis votre candidature. Veuillez conserver précieusement votre numéro de dossier.
            </p>

            <div class="success-actions">
                <a href="<?= site_url('impression/imprimer_fiche/' . $this->session->flashdata('numordre')) ?>" class="btn btn-primary">Télécharger ma fiche</a>
                <a href="<?= site_url('candidature') ?>" class="btn btn-secondary">Retour à l'accueil</a>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>
</html>
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
        .success-icon.error {
            color: #dc3545;
        }
        .success-title {
