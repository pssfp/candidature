<!-- Hero Section -->

<div class="hero-carousel">
    <div class="carousel-container">
        <!-- Slide 1 -->
        <div class="carousel-slide active"
             style="background-image: linear-gradient(135deg, rgba(42,17,101,0.42), rgba(49,19,99,0.47)) , url('<?= base_url() ?>resources/assets/images/img_bg_1.jpeg')">
            <div class="slide-overlay"></div>
            <div class="particles"></div>
            <div class="slide-content">
                <h1 class="slide-title">
                    L'excellence en <span class="highlight">finances publiques</span> commence ici
                </h1>
                <p class="slide-description">
                    Rejoignez la nouvelle génération d'experts en finances publiques. Formation de haut niveau,
                    innovation pédagogique et réseau professionnel d'exception.
                </p>

                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Promotions</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">+500</span>
                        <span class="stat-label">Diplômés</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Employabilité</span>
                    </div>
                </div>

                <div class="slide-actions">
                    <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">
                        <i class="fas fa-briefcase"></i>
                        Rejoindre l'élite
                    </a>
                    <a href="#" class="btn btn-secondary">
                        <i class="fas fa-play"></i>
                        En Savoir Plus
                    </a>
                </div>
            </div>
        </div>

        <div class="carousel-slide"
             style="background-image: linear-gradient(135deg, rgba(42,17,101,0.42), rgba(49,19,99,0.47)) , url('<?= base_url() ?>resources/assets/images/img_bg_2.jpeg')">
            <div class="slide-overlay"></div>
            <div class="particles"></div>
            <div class="slide-content">
                <h1 class="slide-title">
                    Formation d'experts en <span class="highlight">gestion publique</span>
                </h1>
                <p class="slide-description">
                    Acquérez des compétences pointues en audit, contrôle et gestion des finances publiques avec notre
                    programme de formation innovant et reconnu.
                </p>

                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Promotions</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">+500</span>
                        <span class="stat-label">Diplômés</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Employabilité</span>
                    </div>
                </div>

                <div class="slide-actions">
                    <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">
                        <i class="fas fa-briefcase"></i>
                        Rejoindre l'élite
                    </a>
                    <a href="#" class="btn btn-secondary">
                        <i class="fas fa-book-open"></i>
                        Voir les spécialités
                    </a>
                </div>
            </div>
        </div>

        <div class="carousel-slide"
             style="background-image: linear-gradient(135deg, rgba(42,17,101,0.42), rgba(49,19,99,0.47)) , url('<?= base_url() ?>resources/assets/images/img_bg_1old.jpeg')">
            <div class="slide-overlay"></div>
            <div class="particles"></div>
            <div class="slide-content">
                <h1 class="slide-title">
                    Votre carrière d'<span class="highlight">excellence</span> vous attend
                </h1>
                <p class="slide-description">
                    Intégrez un réseau de professionnels de haut niveau et bénéficiez d'opportunités de carrière
                    exceptionnelles dans le secteur public et privé.
                </p>

                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">12</span>
                        <span class="stat-label">Promotions</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">+500</span>
                        <span class="stat-label">Diplômés</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Employabilité</span>
                    </div>
                </div>

                <div class="slide-actions">
                    <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">
                        <i class="fas fa-briefcase"></i>
                        Rejoindre l'élite
                    </a>
                    <a href="#" class="btn btn-secondary">
                        <i class="fas fa-users"></i>
                        En Savoir Plus
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="carousel-nav">
        <button class="nav-btn carousel-prev">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="nav-btn carousel-next">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <div class="carousel-indicators">
        <div class="indicator active"></div>
        <div class="indicator"></div>
        <div class="indicator"></div>
    </div>

    <!-- Barre de progression -->
    <div class="progress-bar"></div>
</div>

<section class="section" id="programs">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title">Nos domaines d'expertise</h2>
            <p class="section-subtitle">
                Des programmes conçus pour répondre aux défis
                de la gestion des finances publiques.
            </p>
        </div>

        <div class="specialties-grid">
            <div class="specialty-card fade-in">
                <div class="specialty-icon">
                    <i class="fas fa-university"></i>
                </div>
                <h3>Audit et contrôle des finances publiques (AC)</h3>
                <p>
                    Formation aux techniques d'audit moderne et
                    aux systèmes de contrôle des finances publiques.
                </p>
            </div>

            <div class="specialty-card fade-in">
                <div class="specialty-icon">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <h3>Économie publique et gestion publique (EPGP)</h3>
                <p>
                    Approche en mmoderne de la gestion financière publique intégrant
                    les dernières innovationsatière de fiscalité et de comptabilité.
                </p>

            </div>

            <div class="specialty-card fade-in">
                <div class="specialty-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Finance, fiscalité et comptabilité publique (FFCP)</h3>
                <p>
                    Maîtrise complète des systèmes fiscaux contemporains
                    et de la comptabilité publique.
                </p>
            </div>

            <div class="specialty-card fade-in">
                <div class="specialty-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Gouvernance Territoriale et Finance Publique Locale (GTFPL)</h3>
                <p>
                    Maîtrise des enjeux locaux et territoriaux avec une vision
                    stratégique de la décentralisation financière.
                </p>
            </div>

            <div class="specialty-card fade-in">
                <div class="specialty-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3>Marchés publics et partenariats Public-privés (MPPPP)</h3>
                <p>
                    Expertise avancée en passation des marchés publics et
                    gestion des partenariats public-privé.
                </p>
            </div>

            <div class="specialty-card fade-in">
                <div class="specialty-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <h3>Formation Continue</h3>
                <p>
                    Programmes de mise à niveau pour professionnels en activité
                    avec certification reconnue.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section news-section" id="news">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title">Actualités & Événements</h2>
            <p class="section-subtitle">
                Suivez l'actualité du PSSFP et découvrez nos dernières réalisations
                et événements marquants.
            </p>
        </div>

        <div class="news-grid">
            <div class="news-card fade-in">
                <div class="news-image"
                     style="background-image: linear-gradient(135deg, rgba(236, 72, 154, 0.4), rgba(138, 92, 246, 0.4)), url('<?= base_url() ?>resources/assets/images/img_bg_1.jpeg'); background-size: cover; background-position: center;"></div>
                <div class="news-content">
                    <h3>Soutenance 11ème Promotion</h3>
                    <p style="text-align : justify">
                        Excellence académique confirmée lors des soutenances de master
                        avec des projets innovants en finances publiques. Une occasion pour nos experts de nous
                        présenter le fruit de leurs recherches.
                    </p>
                    <a href="#" class="news-link">
                        En savoir plus <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="news-card fade-in">
                <div class="news-image"
                     style="background-image: linear-gradient(135deg, rgba(236, 72, 153, 0.4), rgba(139, 92, 246, 0.4)), url('<?= base_url() ?>resources/assets/images/img_bg_1old.jpeg'); background-size: cover; background-position: center;"></div>
                <div class="news-content">
                    <h3>Sortie solennelle des 7&egrave;me 8&egrave;me et 9&egrave;me promotion</h3>
                    <p style="text-align : justify">
                        Les auditeurs de ces différentes promotions ont eu ce jour leurs diplômes d'expert en finance
                        publique.
                        Une cérémonie à la hauteur de leurs distinctions.
                    </p>
                    <a href="#" class="news-link">
                        En savoir plus <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <div class="news-card fade-in">
                <div class="news-image"
                     style="background-image: linear-gradient(135deg, rgba(236, 72, 153, 0.4), rgba(139, 92, 246, 0.4)), url('<?= base_url() ?>resources/assets/images/img_bg_2.jpg'); background-size: cover; background-position: center;"></div>
                <div class="news-content">
                    <h3>LANCEMENT DE L'APPEL A LA CANDIDATURE DE LA 13EME PROMOTION</h3>
                    <p style="text-align : justify">
                        Événement majeur sur la transformation digitale
                        des services financiers publics au Cameroun.
                    </p>
                    <a href="#" class="news-link">
                        En savoir plus <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section testimonials">
    <div class="container">
        <div class="testimonial-card fade-in">
            <p class="testimonial-quote">
                Le PSSFP représente l'avant-garde de la formation en finances publiques.
                Une approche innovante qui forme les leaders de demain avec une vision moderne et pragmatique.
            </p>
            <div class="testimonial-author">BASAHAG Achile Nestor</div>
            <div class="testimonial-role">Président du Comité de Pilotage du PSSFP</div>
        </div>
    </div>
</section>

<section class="section" id="agenda">
    <div class="container">
        <div class="section-header fade-in">
            <h2 class="section-title">Calendrier & Événements</h2>
            <p class="section-subtitle">
                Suivez les dates clés de notre programme académique
                et ne manquez aucune opportunité.
            </p>
        </div>

        <div class="agenda-timeline">
            <div class="agenda-item fade-in">
                <div class="agenda-date">24-25 JUILLET 2024</div>
                <h3>Soutenance de Master - 9ème Promotion</h3>
                <p>
                    Présentation des projets de fin d'études par nos étudiants.
                    Événement ouvert aux professionnels du secteur.
                </p>
                <a href="#" class="news-link">
                    Programme détaillé <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="agenda-item fade-in">
                <div class="agenda-date">15 AOÛT 2024</div>
                <h3>Clôture des Candidatures</h3>
                <p>
                    Date limite pour déposer votre dossier de candidature
                    pour la promotion 2024-2025. Processus entièrement digitalisé.
                </p>
                <a href="<?php echo base_url(); ?>index.php/candidature/add" class="news-link">
                    Candidater maintenant <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="agenda-item fade-in">
                <div class="agenda-date">01 SEPTEMBRE 2024</div>
                <h3>Rentrée Académique</h3>
                <p>
                    Lancement officiel de la 12&egrave;  promotion avec une semaine
                    d'intégration et de présentation des nouveaux programmes.
                </p>
                <a href="#" class="news-link">
                    Découvrir le programme <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <div class="agenda-item fade-in">
                <div class="agenda-date">15 OCTOBRE 2024</div>
                <h3>Forum Professionnel</h3>
                <p>
                    Rencontre avec les acteurs majeurs du secteur des finances publiques.
                    Opportunités de stage et d'emploi.
                </p>
                <a href="#" class="news-link">
                    S'inscrire gratuitement <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section cta-section">
    <div class="container">
        <div class="cta-content fade-in">
            <h3>Devenez un expert en finances maintenant ?</h3>
            <p>
                Transformez votre carrière avec une formation de haut niveau
                et intégrez un réseau de leaders <br> et devenez dès maintenant un expert en finances publiques.
            </p>
            <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-white">
                <i class="fas fa-rocket"></i>
                Commencer mon parcours
            </a>
        </div>
    </div>
</section>
