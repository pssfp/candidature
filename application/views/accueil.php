  
    <nav class="nav" id="nav">
        <div class="nav-container">
            <div class="logo"  style="width:20%"><a href="<?php echo base_url(); ?>index.php"><img src="<?= base_url()?>resources/assets/images/logo.png"  style="width:23%" alt=""></a></div>
            <div class="nav-cta">
                <a href="<?= base_url('index.php/')?>" class="btn">Acceuil</a>
                <a href="<?= base_url('index.php/welcome/index')?>" class="btne">Documentation</a>
                <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btne">Candidater</a>
            </div>
        </div>
    </nav>
    <section class="hero-section">
        <div class="container text-center position-relative">
            <h1 class="display-4 fw-bold mb-4">Master Professionnel en Finances Publiques</h1>
            <p class="lead mb-5">13ème promotion - Année académique 2025-2026</p>
            <a href="formulaire.php" class="btne">Commencer l'inscription</a>
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
                            <li>remplissez le formulaire</li>
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

    <!-- CTA Section -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Prêt à commencer votre inscription ?</h2>
            <p class="lead mb-5">Rejoignez notre programme d'excellence en Finances Publiques</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="formulaire.php" class="btne">
                    <i class="bi bi-pencil-fill me-2"></i> Commencer l'inscription
                </a>
                <a href="login.php" class="btn btn-outline-primary px-4">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Espace candidat
                </a>
            </div>
            <p class="mt-4 text-muted">
                Vous avez des questions ? <a href="#" class="text-decoration-none">Contactez-nous</a>
            </p>
        </div>
    </section>