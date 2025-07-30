<!-- Hero Section -->

        <section class="hero-carousel" id="home">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="carousel-bg" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url()?>resources/assets/images/img_bg_1.jpeg');"></div>
                    <div class="carousel-overlay"></div>
                    <div class="hero-container">
                        <div class="hero-content">
                            <h1>
                                L'excellence en
                                <span class="hero-highlight">finances publiques</span>
                                commence ici
                            </h1>
                            <p>
                                Rejoignez la nouvelle génération d'experts en finances publiques.
                                Formation de haut niveau, innovation pédagogique et réseau professionnel d'exception.
                            </p>

                            <div class="hero-stats">
                                <div class="stat">
                                    <span class="stat-number">12</span>
                                    <span class="stat-label">Promotions</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">500+</span>
                                    <span class="stat-label">Diplômés</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-number">95%</span>
                                    <span class="stat-label">Employabilité</span>
                                </div>
                            </div>

                            <div class="hero-actions">
                                <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">
                                    <i class="fas fa-rocket"></i>
                                    Commencer maintenant
                                </a>
                                <a href="#programs" class="btn btn-ghost">
                                    <i class="fas fa-play"></i>
                                    Découvrir les programmes
                                </a>
                            </div>
                        </div>

                        <div class="hero-visual">
                            <img src="<?= base_url()?>resources/assets/images/img_bg_1.jpeg" alt="Excellence académique" class="hero-image">

                            <div class="floating-card card-1">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: var(--gradient-main); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-graduation-cap" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; font-size: 1.1rem; color: var(--gray-900);">Master en Finances</h4>
                                        <p style="margin: 0; color: var(--gray-600); font-size: 0.9rem;">Formation d'excellence</p>
                                    </div>
                                </div>
                            </div>

                            <div class="floating-card card-2">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: var(--gradient-main); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-chart-line" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; font-size: 1.1rem; color: var(--gray-900);">Expertise Avérée</h4>
                                        <p style="margin: 0; color: var(--gray-600); font-size: 0.9rem;">Opportunités garanties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="carousel-bg" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url()?>resources/assets/images/img_bg_1old.jpeg');"></div>
                    <div class="carousel-overlay"></div>
                    <div class="hero-container">
                        <div class="hero-content">
                            <h1>
                                Formation d'experts en
                                <span class="hero-highlight">gestion publique</span>
                            </h1>
                            <p>
                                Acquérez des compétences pointues en audit, contrôle et gestion des finances publiques
                                avec notre programme de formation innovant.
                            </p>

                            </div>

                            <div class="hero-actions">
                                <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">
                                    <i class="fas fa-rocket"></i>
                                    Postuler maintenant
                                </a>
                                <a href="#programs" class="btn btn-ghost">
                                    <i class="fas fa-book-open"></i>
                                    Voir les spécialités
                                </a>
                            </div>
                        </div>

                        <div class="hero-visual">
                            <img src="<?= base_url()?>resources/assets/images/img_bg_1old.jpeg" alt="Formation pratique" class="hero-image">

                            <div class="floating-card card-1">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: var(--gradient-main); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-users" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; font-size: 1.1rem; color: var(--gray-900);">Réseau Professionnel</h4>
                                        <p style="margin: 0; color: var(--gray-600); font-size: 0.9rem;">Accès à notre communauté</p>
                                    </div>
                                </div>
                            </div>

                            <div class="floating-card card-2">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <div style="width: 50px; height: 50px; background: var(--gradient-main); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <i class="fas fa-briefcase" style="color: white;"></i>
                                    </div>
                                    <div>
                                        <h4 style="margin: 0; font-size: 1.1rem; color: var(--gray-900);">Insertion Professionnelle</h4>
                                        <p style="margin: 0; color: var(--gray-600); font-size: 0.9rem;">Carrières prestigieuses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Navigation -->
            <div class="carousel-nav">
                <button class="carousel-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="carousel-next"><i class="fas fa-chevron-right"></i></button>
            </div>

            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <div class="carousel-indicator active"></div>
                <div class="carousel-indicator"></div>
            </div>
        </section>

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
                    <h3>Économie publique et gestion publique (EPGP)</h3><p>
                        Approche  en mmoderne de la gestion financière publique intégrant 
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
                   <div class="news-image" style="background-image: linear-gradient(135deg, rgba(236, 72, 154, 0.4), rgba(138, 92, 246, 0.4)), url('<?= base_url()?>resources/assets/images/img_bg_1.jpeg'); background-size: cover; background-position: center;"></div>
                    <div class="news-content">
                        <h3>Soutenance 11ème Promotion</h3>
                        <p style="text-align : justify">
                            Excellence académique confirmée lors des soutenances de master 
                            avec des projets innovants en finances publiques. Une occasion pour nos experts de nous présenter le fruit de leurs recherches.
                        </p>
                        <a href="#" class="news-link">
                            En savoir plus <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="news-card fade-in">
                    <div class="news-image" style="background-image: linear-gradient(135deg, rgba(236, 72, 153, 0.4), rgba(139, 92, 246, 0.4)), url('<?= base_url()?>resources/assets/images/img_bg_1old.jpeg'); background-size: cover; background-position: center;"></div>
                    <div class="news-content">
                        <h3 >Sortie solennelle des  7ème 8ème et 9ème promotion</h3>
                        <p style="text-align : justify">
                            les auditeurs de ces différentes promotions ont eu ce jour leurs diplome d'expert en finance publique.
                             une cérémonie à la hauteur de leurs distinctions.
                        </p>
                        <a href="#" class="news-link">
                            En savoir plus <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <div class="news-card fade-in">
                    <div class="news-image" style="background-image: linear-gradient(135deg, rgba(236, 72, 153, 0.4), rgba(139, 92, 246, 0.4)), url('<?= base_url()?>resources/assets/images/img_bg_2.jpg'); background-size: cover; background-position: center;"></div>
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
                    <a href="#" class="news-link">
                        Candidater maintenant <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="agenda-item fade-in">
                    <div class="agenda-date">01 SEPTEMBRE 2024</div>
                    <h3>Rentrée Académique</h3>
                    <p>
                        Lancement officiel de la 12ème promotion avec une semaine 
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
