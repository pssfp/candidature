<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-section">
                <h3>PSSFP</h3>
                <p style="color: var(--gray-400); line-height: 1.7; text-align : justify">
                    Programme Supérieur de Spécialisation en Finances Publiques.
                    L'excellence académique au service de l'administration publique.
                </p>
                <div style="display: flex; gap: 1rem; margin-top: 1.5rem;">
                    <a href=""
                       style="width: 40px; height: 40px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/PPssfp/status/1235278646593671170"
                       style="width: 40px; height: 40px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/pssfp-programme-sup%C3%A9rieur-de-sp%C3%A9cialisation-en-finances-publiques"
                       style="width: 40px; height: 40px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCfsbYkPPV4HXHAdIYCMKKTQ"
                       style="width: 40px; height: 40px; background: var(--primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none;">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <div class="footer-section">
                <h3>Programmes</h3>
                <ul class="footer-links" style="font-size : 70%; line-height: 120%">
                    <li><a href="#">Audit et contrôle des finances publiques (AC)</a></li>
                    <li><a href="#">Économie publique et gestion publique (EPGP)</a></li>
                    <li><a href="#">Finance, fiscalité et comptabilité publique (FFCP)</a></li>
                    <li><a href="#">Gouvernance Territoriale et Finance Publique Locale (GTFPL)</a></li>
                    <li><a href="#">Marchés publics et partenariats Public-privés (MPPPP)</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Ressources</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo base_url(); ?>index.php/candidature/add">Candidature en ligne</a></li>
                    <li><a href="<?= base_url('index.php/welcome/index') ?>">En savoir Plus</a></li>
                    <li><a href="#news">Actualités</a></li>
                    <li><a href="#programs">Programmes</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <div style="color: var(--gray-400); line-height: 1.8;">
                    <p><strong style="color: white;">Campus de Messa</strong><br>
                        Yaoundé, Cameroun</p>
                    <p><strong style="color: white;">Téléphone</strong><br>
                        +237 6 94 17 61 92</p>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2025 PSSFP - Programme Supérieur de Spécialisation en Finances Publiques. Tous droits
                réservés.</p>
        </div>
    </div>
</footer>


<script>
    class ModernCarousel {
        constructor() {
            this.slides = document.querySelectorAll('.carousel-slide');
            this.indicators = document.querySelectorAll('.indicator');
            this.prevBtn = document.querySelector('.carousel-prev');
            this.nextBtn = document.querySelector('.carousel-next');
            this.progressBar = document.querySelector('.progress-bar');

            this.currentSlide = 0;
            this.slideInterval = null;
            this.slideDelay = 6000;

            this.init();
        }

        init() {
            this.createParticles();
            this.setupEventListeners();
            this.startAutoSlide();
            this.animateCounters();
        }

        createParticles() {
            const particlesContainer = document.querySelectorAll('.particles');

            particlesContainer.forEach(container => {
                for (let i = 0; i < 20; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.left = Math.random() * 100 + '%';
                    particle.style.animationDelay = Math.random() * 6 + 's';
                    particle.style.animationDuration = (Math.random() * 3 + 3) + 's';
                    container.appendChild(particle);
                }
            });
        }

        setupEventListeners() {
            this.prevBtn.addEventListener('click', () => this.prevSlide());
            this.nextBtn.addEventListener('click', () => this.nextSlide());

            this.indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => this.goToSlide(index));
            });

            // Pause on hover
            const carousel = document.querySelector('.hero-carousel');
            carousel.addEventListener('mouseenter', () => this.pauseAutoSlide());
            carousel.addEventListener('mouseleave', () => this.startAutoSlide());

            // Touch/swipe support
            let startX = 0;
            let endX = 0;

            carousel.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
            });

            carousel.addEventListener('touchend', (e) => {
                endX = e.changedTouches[0].clientX;
                const diff = startX - endX;

                if (Math.abs(diff) > 50) {
                    if (diff > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            });
        }

        goToSlide(index) {
            this.slides[this.currentSlide].classList.remove('active');
            this.indicators[this.currentSlide].classList.remove('active');

            this.currentSlide = index;

            this.slides[this.currentSlide].classList.add('active');
            this.indicators[this.currentSlide].classList.add('active');

            this.restartProgressBar();
            this.animateCounters();
        }

        nextSlide() {
            const next = (this.currentSlide + 1) % this.slides.length;
            this.goToSlide(next);
        }

        prevSlide() {
            const prev = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            this.goToSlide(prev);
        }

        startAutoSlide() {
            this.slideInterval = setInterval(() => {
                this.nextSlide();
            }, this.slideDelay);

            this.progressBar.style.animation = `progress ${this.slideDelay}ms linear infinite`;
        }

        pauseAutoSlide() {
            if (this.slideInterval) {
                clearInterval(this.slideInterval);
                this.slideInterval = null;
            }
            this.progressBar.style.animationPlayState = 'paused';
        }

        restartProgressBar() {
            this.progressBar.style.animation = 'none';
            setTimeout(() => {
                this.progressBar.style.animation = `progress ${this.slideDelay}ms linear infinite`;
            }, 10);
        }

        animateCounters() {
            const activeSlide = this.slides[this.currentSlide];
            const counters = activeSlide.querySelectorAll('.stat-number');
            const targets = ['12', '+500', '95%'];

            counters.forEach((counter, index) => {
                const target = targets[index];
                const isPercentage = target.includes('%');
                const isPlus = target.includes('+');
                const numericTarget = parseInt(target.replace(/[^0-9]/g, ''));

                let current = 0;
                const increment = numericTarget / 30;

                const timer = setInterval(() => {
                    current += increment;
                    if (current >= numericTarget) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        let displayValue = Math.floor(current);
                        if (isPlus && current >= numericTarget * 0.8) {
                            displayValue = '+' + displayValue;
                        } else if (isPercentage && current >= numericTarget * 0.8) {
                            displayValue = displayValue + '%';
                        }
                        counter.textContent = displayValue;
                    }
                }, 50);
            });
        }
    }

    // Initialiser le carrousel
    document.addEventListener('DOMContentLoaded', () => {
        new ModernCarousel();
    });

    // Animation d'entrée
    window.addEventListener('load', () => {
        document.body.style.opacity = '1';
    });
</script>
<script>


    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });

    const testimonials = [
        {
            quote: "Le PSSFP représente l'avant-garde de la formation en finances publiques. Une approche innovante qui forme les leaders de demain avec une vision moderne et pragmatique.",
            author: "BASAHAG Achile Nestor",
            role: "Président du Comité de Pilotage du PSSFP"
        },
        {
            quote: "Cette formation a complètement transformé ma vision des finances publiques. L'approche pratique et l'excellence du corps professoral font toute la différence.",
            author: "Marie-Claire NDJOMO",
            role: "Diplômée Promotion 2023"
        },
        {
            quote: "Un partenaire incontournable pour la modernisation de nos services financiers. La qualité des compétences développées répond parfaitement aux besoins actuels.",
            author: "Dr. Paul MBARGA",
            role: "Directeur des Finances Publiques"
        }
    ];

    let currentTestimonial = 0;
    const testimonialQuote = document.querySelector('.testimonial-quote');
    const testimonialAuthor = document.querySelector('.testimonial-author');
    const testimonialRole = document.querySelector('.testimonial-role');

    function updateTestimonial() {
        const testimonial = testimonials[currentTestimonial];
        testimonialQuote.style.opacity = '0';
        testimonialAuthor.style.opacity = '0';
        testimonialRole.style.opacity = '0';
        setTimeout(() => {
            testimonialQuote.textContent = testimonial.quote;
            testimonialAuthor.textContent = testimonial.author;
            testimonialRole.textContent = testimonial.role;
            testimonialQuote.style.opacity = '1';
            testimonialAuthor.style.opacity = '1';
            testimonialRole.style.opacity = '1';
        }, 300);

        currentTestimonial = (currentTestimonial + 1) % testimonials.length;
    }

    setInterval(updateTestimonial, 6000);

    // Parallax effect for hero background
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const heroBackground = document.querySelector('.hero-bg');
        if (heroBackground) {
            heroBackground.style.transform = `translateY(${scrolled * 0.5}px) rotate(-15deg)`;
        }
    });

    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');
        const targets = ['12', '500+', '95%'];

        counters.forEach((counter, index) => {
            const target = targets[index];
            const isPercentage = target.includes('%');
            const isPlus = target.includes('+');
            const numericTarget = parseInt(target.replace(/[^0-9]/g, ''));

            let current = 0;
            const increment = numericTarget / 50; // Animation duration control

            const timer = setInterval(() => {
                current += increment;
                if (current >= numericTarget) {
                    counter.textContent = target;
                    clearInterval(timer);
                } else {
                    let displayValue = Math.floor(current);
                    if (isPlus && current >= numericTarget * 0.8) {
                        displayValue += '+';
                    } else if (isPercentage && current >= numericTarget * 0.8) {
                        displayValue += '%';
                    }
                    counter.textContent = displayValue;
                }
            }, 50);
        });
    }

    const heroObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                heroObserver.disconnect(); // Run only once
            }
        });
    });

    heroObserver.observe(document.querySelector('.hero-stats'));

    function handleResize() {
        const navMenu = document.querySelector('.nav-menu');
        const navCta = document.querySelector('.nav-cta');

        if (window.innerWidth <= 768) {
            // Mobile behavior - could add hamburger menu here
            navMenu.style.display = 'none';
            navCta.style.flexDirection = 'column';
            navCta.style.gap = '0.5rem';
        } else {
            navMenu.style.display = 'flex';
            navCta.style.flexDirection = 'row';
            navCta.style.gap = '1rem';
        }
    }

    window.addEventListener('resize', handleResize);
    handleResize(); // Initial call

    // Enhanced hover effects
    document.querySelectorAll('.specialty-card, .news-card, .agenda-item').forEach(card => {
        card.addEventListener('mouseenter', function () {
            this.style.transform = this.classList.contains('agenda-item')
                ? 'translateX(10px) scale(1.02)'
                : 'translateY(-10px) scale(1.02)';
        });

        card.addEventListener('mouseleave', function () {
            this.style.transform = this.classList.contains('agenda-item')
                ? 'translateX(0) scale(1)'
                : 'translateY(0) scale(1)';
        });
    });

    // Loading optimization
    window.addEventListener('load', () => {
        document.body.style.opacity = '1';
        // Trigger initial animations
        setTimeout(() => {
            document.querySelectorAll('.fade-in').forEach(el => {
                if (el.getBoundingClientRect().top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });
        }, 100);
    });
</script>
</body>
</html>