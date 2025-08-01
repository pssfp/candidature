/**
 * Review Form JavaScript - Handles review step functionality
 */

document.addEventListener('DOMContentLoaded', function() {
    // Add Review step to the progress bar
    function addReviewStepToProgressBar() {
        const progressSteps = document.querySelector('.progress-steps');
        if (!progressSteps) return;

        // Check if review step already exists
        const existingReviewStep = progressSteps.querySelector('[aria-label*="Revue"]');
        if (existingReviewStep) return;

        // Create review step element
        const reviewStep = document.createElement('div');
        reviewStep.className = 'progress-step';
        reviewStep.setAttribute('role', 'button');
        reviewStep.setAttribute('tabindex', '0');
        reviewStep.setAttribute('aria-label', 'Étape 6: Revue');

        const stepCircle = document.createElement('div');
        stepCircle.className = 'step-circle';
        stepCircle.textContent = '6';

        const stepText = document.createElement('div');
        stepText.className = 'step-text';
        stepText.textContent = 'Revue';

        reviewStep.appendChild(stepCircle);
        reviewStep.appendChild(stepText);
        progressSteps.appendChild(reviewStep);

        // Add click handler for the new review step
        reviewStep.addEventListener('click', () => {
            if (window.formFunctions && window.formFunctions.validateAllSections && window.formFunctions.validateAllSections()) {
                populateReviewSection();
                const reviewSectionIndex = findReviewSectionIndex();
                if (reviewSectionIndex !== -1) {
                    window.formFunctions.navigateToSection(reviewSectionIndex);
                }
            } else {
                alert('Veuillez remplir correctement tous les champs obligatoires avant d\'accéder à la revue.');
            }
        });
    }

    // Function to find the review section index
    function findReviewSectionIndex() {
        const formSections = document.querySelectorAll('.form-section');
        let reviewSectionIndex = -1;
        formSections.forEach((section, index) => {
            if (section.id === 'review-section') {
                reviewSectionIndex = index;
            }
        });
        return reviewSectionIndex;
    }

    // Function to populate review section with form data
    function populateReviewSection() {
        console.log("Populating review section");

        // Formation section
        updateReviewField('id_specialite', function() {
            const select = document.getElementById('id_specialite');
            return select ? select.options[select.selectedIndex]?.text || '' : '';
        });

        updateReviewField('type_etude', function() {
            const presentiel = document.getElementById('presentiel');
            const distanciel = document.getElementById('distanciel');
            if (presentiel && presentiel.checked) return 'Présentiel';
            if (distanciel && distanciel.checked) return 'Distanciel';
            return '';
        });

        // Identité section
        updateReviewField('civilite', getSelectValue('civilite'));
        updateReviewField('nom', getInputValue('nom'));
        updateReviewField('prenom', getInputValue('prenom'));
        updateReviewField('epouse', getInputValue('epouse'));

        // Date de naissance
        updateReviewField('date_naissance', function() {
            const jour = document.getElementById('datenaiss_jj')?.value;
            const moisIndex = document.getElementById('datenaiss_mm')?.value - 1;
            const annee = document.getElementById('datenaiss_yy')?.value;

            if (!jour || moisIndex === undefined || !annee) return '';

            const mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
                'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'][moisIndex];
            return `${jour} ${mois} ${annee}`;
        });

        updateReviewField('lieu_de_naissce', getInputValue('lieu_de_naissce'));
        updateReviewField('nationalite', getInputValue('nationalite'));
        updateReviewField('region_dorigine', getInputValue('region_dorigine'));
        updateReviewField('statu_matrimonial', getSelectValue('statu_matrimonial'));
        updateReviewField('nombre_enfant', getInputValue('nombre_enfant'));

        // Contact section
        updateReviewField('adresse_candidat', getInputValue('adressecandidat'));
        updateReviewField('ville_residence', getInputValue('villeresidence'));
        updateReviewField('telephone', getInputValue('telephone1'));
        updateReviewField('telephone2', getInputValue('telephone2'));
        updateReviewField('email', getInputValue('email'));

        // Cursus académique
        updateReviewField('dernier_diplome', getInputValue('dernier_diplome'));
        updateReviewField('diplome_requis', getInputValue('diplome_requis'));
        updateReviewField('specialite_requise', getInputValue('specialite_requiss'));
        updateReviewField('annee_optention_diplome', getSelectValue('annee_optention_diplome'));

        // Informations professionnelles
        updateReviewField('statut_prof', getSelectValue('statut'));
        updateReviewField('structure', getInputValue('structure'));
    }

    // Helper functions to get values
    function getInputValue(id) {
        return function() {
            const el = document.getElementById(id);
            return el ? el.value : '';
        };
    }

    function getSelectValue(id) {
        return function() {
            const select = document.getElementById(id);
            if (!select) return '';
            return select.options[select.selectedIndex]?.text || '';
        };
    }

    // Update a single review field
    function updateReviewField(fieldName, valueGetter) {
        const reviewField = document.getElementById(`review-${fieldName}`);
        if (!reviewField) {
            console.warn(`Review field not found: review-${fieldName}`);
            return;
        }

        let value = typeof valueGetter === 'function' ? valueGetter() : valueGetter;

        // Handle empty values
        if (!value || value === '' || value === 'undefined' || value === '-- Choisir --' || value === 'Choisir une réponse') {
            reviewField.innerHTML = '<em style="color: #666;">Non renseigné</em>';
            return;
        }

        reviewField.textContent = value;
    }

    // Listen for the custom event to navigate to review
    window.addEventListener('navigateToReview', function(e) {
        console.log('Navigate to review event received from section:', e.detail.fromSection);

        // Populate review section
        populateReviewSection();

        // Navigate to review section
        const reviewSectionIndex = findReviewSectionIndex();
        if (reviewSectionIndex !== -1 && window.formFunctions && window.formFunctions.navigateToSection) {
            window.formFunctions.navigateToSection(reviewSectionIndex);
        } else {
            console.error("Could not navigate to review section");
        }
    });

    // Only handle reset button (not submit)
    const form = document.getElementById('candidatureForm');
    const originalSubmitButton = document.getElementById('subenregistrer');
    const resetButton = form ? (form.querySelector('button[type="reset"]') || form.querySelector('input[type="reset"]')) : null;
    if (form && resetButton) {
        // Remove existing event listeners by cloning
        const newResetButton = resetButton.cloneNode(true);
        resetButton.parentNode.replaceChild(newResetButton, resetButton);
        newResetButton.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir réinitialiser le formulaire ? Toutes les données saisies seront perdues.')) {
                // Reset the form
                form.reset();

                // Clear localStorage
                localStorage.removeItem('candidature_form_data');

                // Clear any validation errors
                const errorElements = form.querySelectorAll('.form-error');
                errorElements.forEach(error => error.remove());

                // Remove validation classes
                const invalidFields = form.querySelectorAll('.is-invalid');
                invalidFields.forEach(field => field.classList.remove('is-invalid'));

                // Navigate back to first section
                if (window.formFunctions && window.formFunctions.navigateToSection) {
                    window.formFunctions.navigateToSection(0);
                }

                // Trigger conditional field updates
                setTimeout(() => {
                    const selectElements = form.querySelectorAll('select');
                    selectElements.forEach(select => {
                        const event = new Event('change', { bubbles: true });
                        select.dispatchEvent(event);
                    });

                    // Update button states
                    if (window.formFunctions && window.formFunctions.updateCurrentSectionNavigationButtons) {
                        window.formFunctions.updateCurrentSectionNavigationButtons();
                    }
                }, 100);

                console.log("Form reset completed");
            }
        });
    }

    // Initialize review functionality
    function initReviewFunctionality() {
        console.log("Initializing review functionality");

        // Add review step to progress bar
        addReviewStepToProgressBar();

        // Set up review section observer
        const reviewSection = document.getElementById('review-section');
        if (reviewSection) {
            // Add MutationObserver to detect when section becomes active
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.attributeName === 'class' && reviewSection.classList.contains('active')) {
                        console.log("Review section is now active, populating data");
                        populateReviewSection();
                    }
                });
            });

            observer.observe(reviewSection, { attributes: true });
        }
    }

    // Wait for formFunctions to be available and initialize
    function waitForFormFunctions() {
        if (window.formFunctions) {
            console.log("Form functions available, initializing review functionality");
            initReviewFunctionality();
        } else {
            console.log("Form functions not available yet, waiting...");
            setTimeout(waitForFormFunctions, 100);
        }
    }

    // Start initialization
    waitForFormFunctions();
});
