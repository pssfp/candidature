<style>
    #page { background-image: url(<?= base_url()?>resources/assets/bg_3.jpg); background-size: cover; }
    
    .hero-section {
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        padding: 100px 0;
        margin-bottom: 50px;
    }
    .step-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        height: 100%;
    }
    .step-icon {
        font-size: 2.5rem;
        color: #0d6efd;
    }
    .step-number {
        display: inline-block;
        width: 30px;
        height: 30px;
        background: #0d6efd;
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        margin-right: 10px;
    }
    .feature-list li {
        margin-bottom: 8px;
        position: relative;
        padding-left: 25px;
    }
    .feature-list li:before {
        content: "•";
        color: #0d6efd;
        font-weight: bold;
        position: absolute;
        left: 0;
    }
    .cta-btn {
        display: inline-block;
        padding: 12px 25px;
        background: #0d6efd;
        color: white;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s;
    }
    .cta-btn:hover {
        background: #0b5ed7;
        color: white;
        transform: translateY(-2px);
    }
</style>

<div class="row" style="background: none">
    <div class="col-lg-12">
        <section class="hero-section">
            <div class="container text-center position-relative">
                <h1 class="display-4 fw-bold mb-4">Master Professionnel en Finances Publiques</h1>
                <p class="lead mb-5">13ème promotion - Année académique 2025-2026</p>
                <a href="<?= base_url()?>index.php/candidature/add" class="btn btn-light btn-lg px-5 py-3 fw-bold">Commencer l'inscription</a>
            </div>
        </section>
        
        <section class="py-5">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">Processus d'inscription en 3 étapes</h2>
                    <p class="text-muted">Suivez ces étapes simples pour postuler à notre programme</p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="step-card p-4">
                            <div class="text-center mb-4">
                                <i class="bi bi-file-earmark-text step-icon"></i>
                            </div>
                            <h4 class="mb-3"><span class="step-number">1</span> Pré-requis</h4>
                            <ul class="feature-list list-unstyled">
                                <li>Diplôme Bac+3 minimum</li>
                                <li>Expérience professionnelle</li>
                                <li>CV et copies des diplômes</li>
                                <li>Photo d'identité 4x4</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="step-card p-4">
                            <div class="text-center mb-4">
                                <i class="bi bi-laptop step-icon"></i>
                            </div>
                            <h4 class="mb-3"><span class="step-number">2</span> Formulaire en ligne</h4>
                            <ul class="feature-list list-unstyled">
                                <li>Suivez les étapes</li>
                                <li>Remplissez le formulaire</li>
                                <li>Paiement des frais sur place ou en ligne</li>
                                <li>Validez vos informations</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="step-card p-4">
                            <div class="text-center mb-4">
                                <i class="bi bi-check-circle step-icon"></i>
                            </div>
                            <h4 class="mb-3"><span class="step-number">3</span> Validation finale</h4>
                            <ul class="feature-list list-unstyled">
                                <li>Dépôt physique du dossier</li>
                                <li>Examen du dossier</li>
                                <li>Entretien éventuel</li>
                                <li>Notification des résultats</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-5 bg-light">
            <div class="container text-center">
                <h2 class="fw-bold mb-4">Prêt à commencer votre inscription ?</h2>
                <p class="lead mb-5">Rejoignez notre programme d'excellence en Finances Publiques</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="<?= base_url()?>index.php/candidature/add" class="cta-btn">
                        <i class="bi bi-pencil-fill me-2"></i> Commencer l'inscription
                    </a>
                    <!--a href="<?= base_url()?>index.php/candature/add" class="btn btn-outline-primary px-4">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Espace candidat
                    </a-->
                </div>
                <p class="mt-4 text-muted">
                    Vous avez des questions ? <a href="#" class="text-decoration-none">Contactez-nous</a>
                </p>
            </div>
        </section>
    </div>
</div>

<footer class="footer bg-dark text-white mt-5 py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4 mb-md-0">
                <img style="width: 20%; margin: 20px;" src="<?= base_url()?>resources/assets/images/logo.png" alt="Logo PSSFP" height="50" class="mb-3">
                <p>Programme Supérieur de Spécialisation en Finances Publiques</p>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <h5 style="color:#0d6efd">Liens utiles</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url()?>" class="text-white text-decoration-none">Accueil</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Programme</a></li>
                    <li><a href="<?= base_url()?>index.php/candidature/add" class="text-white text-decoration-none">Inscription</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 style="color:#0d6efd">Contact</h5>
                <ul class="list-unstyled">
                    <li><i class="bi bi-geo-alt-fill me-2"></i> Yaoundé, Cameroun</li>
                    <li><i class="bi bi-telephone-fill me-2"></i> (+237) 694 17 61 92</li>
                    <li><i class="bi bi-envelope-fill me-2"></i> info@pssfp.net</li>
                </ul>
            </div>
        </div>
        <hr class="my-4 bg-light">
        <div class="text-center">
            <p class="mb-0">&copy; 2025 PSSFP - Tous droits réservés</p>
        </div>
    </div>
</footer>
