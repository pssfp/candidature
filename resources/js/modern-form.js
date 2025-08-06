/**
 * Enhanced Modern Form JavaScript - Fixed Multi-Step Navigation
 * Advanced UX features for the candidature form
 */

document.addEventListener('DOMContentLoaded', function () {
    // Form elements and state
    const formSections = document.querySelectorAll('.form-section');
    const progressSteps = document.querySelectorAll('.progress-step');
    const form = document.getElementById('candidatureForm');
    let currentSection = 0;

    // Initialize form
    initializeForm();

    function initializeForm() {
        setupProgressBar();
        setupSectionNavigation();
        setupFormValidation();
        setupConditionalFields();
        setupAutoSave();
        setupFormEnhancements();
        setupFormSubmission(); // Added form submission handling
        showSection(0);

        // Initial button state update after everything is loaded
        setTimeout(() => {
            updateCurrentSectionNavigationButtons();
        }, 100);

    }

    // Progress bar and section management
    function setupProgressBar() {
        progressSteps.forEach((step, index) => {
            step.addEventListener('click', () => {
                if (index <= currentSection || validateAllPreviousSections(index)) {
                    navigateToSection(index);
                }
            });
        });
    }

    function showSection(sectionIndex) {

        // Hide all sections and remove active class
        formSections.forEach((section, index) => {
            section.style.display = 'none';
            section.classList.remove('active');
        });

        // Show the target section and add active class
        if (formSections[sectionIndex]) {
            formSections[sectionIndex].style.display = 'block'; // Explicitly set to block
            formSections[sectionIndex].classList.add('active');
            currentSection = sectionIndex;
        } else {
            return;
        }

        updateProgress(sectionIndex);

        // Show/hide only the submit button on last section, keep navigation always visible
        const submitBtn = document.querySelector('.form-actions .btn-success, .form-actions button[type="submit"]');
        if (submitBtn) {
            if (sectionIndex === formSections.length - 1) {
                submitBtn.style.display = '';
            } else {
                submitBtn.style.display = 'none';
            }
        }
        // Always show form-actions (navigation)
        const formActions = document.querySelector('.form-actions');
        if (formActions) {
            formActions.style.display = '';
        }

        updateCurrentSectionNavigationButtons();
    }

    function updateProgress(step) {
        progressSteps.forEach((progressStep, index) => {
            progressStep.classList.remove('active', 'completed');

            if (index < step) {
                progressStep.classList.add('completed');
            } else if (index === step) {
                progressStep.classList.add('active');
            }
        });
    }

    function navigateToSection(targetSection) {
        if (targetSection >= 0 && targetSection < formSections.length) {
            showSection(targetSection);
        }
    }

    // A more reliable form submission handler
    function setupFormSubmission() {
        const form = document.getElementById('candidatureForm');
        if (!form) return;

        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('.btn-success[type="submit"]');

            // Prevent multiple submissions
            if (form.getAttribute('data-submitting')) {
                e.preventDefault();
                return;
            }

            // Set submitting flag
            form.setAttribute('data-submitting', 'true');

            // Update button state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Envoi en cours...';
            }

            // Clear saved data on successful submission
            try {
                localStorage.removeItem('candidature_form_data');
            } catch (err) {
                console.error('Could not clear form data from localStorage:', err);
            }

            // Allow the form to submit
        });
    }

    // Function to validate all sections
    function validateAllSections() {
        let isValid = true;

        // Get all required fields
        const requiredFields = form.querySelectorAll('[required]');

        // Check each required field
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
            } else {
                field.classList.remove('error');
            }
        });

        return isValid;
    }

    // Section navigation
    function setupSectionNavigation() {
        formSections.forEach((section, index) => {
            // Remove existing navigation if any
            const existingNav = section.querySelector('.form-navigation');
            if (existingNav) {
                existingNav.remove();
            }

            // Skip navigation for review section - it will be handled by review-form.js
            if (section.id === 'review-section') {
                return;
            }

            // Create navigation container
            const navContainer = document.createElement('div');
            navContainer.className = 'form-navigation';

            // Previous button
            if (index > 0) {
                const prevButton = createButton('Précédent', 'btn btn-secondary', () => {
                    navigateToSection(index - 1);
                });
                prevButton.innerHTML = '<i class="fas fa-arrow-left"></i> <span>Précédent</span>';
                navContainer.appendChild(prevButton);
            }

            // Next button - check if this is the last regular section (before review)
            const isLastRegularSection = index === formSections.length - 2 && formSections[formSections.length - 1].id === 'review-section';

            if (index < formSections.length - 1 && !isLastRegularSection) {
                const nextButton = createButton('Suivant', 'btn btn-primary', () => {
                    if (validateSection(index)) {
                        saveFormData();
                        navigateToSection(index + 1);
                    } else {
                        showValidationErrors(section);
                    }
                });
                nextButton.innerHTML = '<span>Suivant</span> <i class="fas fa-arrow-right"></i>';
                nextButton.setAttribute('data-button-type', 'next');
                navContainer.appendChild(nextButton);
            } else if (isLastRegularSection) {
                // This will be handled by review-form.js
                const reviewButton = createButton('Vérifier ma candidature', 'btn btn-primary', () => {
                    if (validateSection(index)) {
                        saveFormData();
                        // Trigger review section navigation
                        window.dispatchEvent(new CustomEvent('navigateToReview', { detail: { fromSection: index } }));
                    } else {
                        showValidationErrors(section);
                    }
                });
                reviewButton.innerHTML = '<span>Vérifier ma candidature</span> <i class="fas fa-check-circle"></i>';
                reviewButton.setAttribute('data-button-type', 'review');
                navContainer.appendChild(reviewButton);
            }

            section.appendChild(navContainer);
        });
    }

    function createButton(text, className, onClick) {
        const button = document.createElement('button');
        button.type = 'button'; // Important: prevent form submission
        // button.textContent = text; // This will be set by innerHTML
        button.className = className;
        button.addEventListener('click', (e) => {
            e.preventDefault(); // Prevent any default behavior
            onClick();
        });
        return button;
    }

    function updateNavigationButtons(sectionIndex) {
        const navigation = formSections[sectionIndex]?.querySelector('.form-navigation');
        if (!navigation) return;

        const nextBtn = navigation.querySelector('.btn-primary');

        // Update button states based on validation
        if (nextBtn) {
            const isValid = validateSection(sectionIndex, false);
            nextBtn.disabled = !isValid;
            nextBtn.classList.toggle('loading', false);
        }
    }

    // New function to update current section's navigation buttons
    function updateCurrentSectionNavigationButtons() {
        updateNavigationButtons(currentSection);
    }

    // Enhanced validation
    function setupFormValidation() {
        // Real-time validation with comprehensive event handling
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            // Validate on blur
            input.addEventListener('blur', () => {
                validateField(input);
                updateCurrentSectionNavigationButtons();
            });

            // Clear errors and update on input (typing)
            input.addEventListener('input', () => {
                clearFieldError(input);
                saveFormData();
                clearTimeout(input.validationTimeout);
                input.validationTimeout = setTimeout(() => {
                    validateField(input, false);
                    updateCurrentSectionNavigationButtons();
                }, 300);
            });

            // Immediate validation on keyup for instant feedback
            input.addEventListener('keyup', () => {
                clearTimeout(input.keyupTimeout);
                input.keyupTimeout = setTimeout(() => {
                    updateCurrentSectionNavigationButtons();
                }, 100);
            });

            // Always update on change for all input types (select, radio, checkbox, text, etc.)
            input.addEventListener('change', () => {
                validateField(input);
                saveFormData();
                updateCurrentSectionNavigationButtons();
            });
        });

        // Form submission - only allow if on last section
        form.addEventListener('submit', handleFormSubmit);

        // Additional global form change listener as fallback
        form.addEventListener('change', () => {
            setTimeout(updateCurrentSectionNavigationButtons, 50);
        });

        // On DOM ready, after autofill, update button state
        window.addEventListener('pageshow', updateCurrentSectionNavigationButtons);
        window.addEventListener('load', updateCurrentSectionNavigationButtons);
    }

    function validateSection(sectionIndex, showErrors = true) {
        const section = formSections[sectionIndex];
        if (!section) return true;

        const requiredFields = section.querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            // Proper null check before accessing style property
            if (!field) return;

            // Skip hidden fields - check both the field and its container
            const isFieldHidden = field.style.display === 'none';
            const formGroup = field.closest('.form-group');
            const isContainerHidden = formGroup && formGroup.style.display === 'none';

            if (isFieldHidden || isContainerHidden) {
                return;
            }

            if (!validateField(field, showErrors)) {
                isValid = false;
            }
        });

        // Custom validations
        isValid = performCustomValidations(section, showErrors) && isValid;

        return isValid;
    }

    function validateField(field, showErrors = true) {
        const value = field.value.trim();
        const isRequired = field.hasAttribute('required');
        let isValid = true;

        // Clear previous errors
        clearFieldError(field);

        // Skip validation for hidden fields
        if (field.style.display === 'none' || (field.closest('.form-group') && field.closest('.form-group').style.display === 'none')) {
            return true;
        }

        // Special handling for radio buttons
        if (field.type === 'radio' && isRequired) {
            const radioGroup = form.querySelectorAll(`input[name="${field.name}"]`);
            const isChecked = Array.from(radioGroup).some(radio => radio.checked);
            if (!isChecked) {
                if (showErrors) {
                    const radioContainer = field.closest('.radio-group');
                    showFieldError(radioContainer || field, 'Veuillez sélectionner une option');
                }
                isValid = false;
            }
            return isValid; // Return early for radio buttons
        }

        // Required field validation for non-radio fields
        if (isRequired && !value) {
            if (showErrors) {
                showFieldError(field, 'Ce champ est obligatoire');
            }
            isValid = false;
        }

        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                if (showErrors) {
                    showFieldError(field, 'Veuillez entrer une adresse email valide');
                }
                isValid = false;
            }
        }

        // Phone validation
        if (field.type === 'tel' && field.name.includes('telephone') && value) {
            const phoneRegex = /^[0-9+\-\s()]{10,}$/;
            if (!phoneRegex.test(value)) {
                if (showErrors) {
                    showFieldError(field, 'Veuillez entrer un numéro de téléphone valide');
                }
                isValid = false;
            }
        }

        // Update field appearance
        field.classList.toggle('is-invalid', !isValid);

        return isValid;
    }

    function performCustomValidations(section, showErrors = true) {
        let isValid = true;

        // Email confirmation validation
        const email = section.querySelector('#email');
        const emailVerif = section.querySelector('#emailverif');
        if (email && emailVerif && email.value && emailVerif.value) {
            if (email.value !== emailVerif.value) {
                if (showErrors) {
                    showFieldError(emailVerif, 'Les adresses email ne correspondent pas');
                }
                isValid = false;
            }
        }

        // Date validation
        const daySelect = section.querySelector('#datenaiss_jj');
        const monthSelect = section.querySelector('#datenaiss_mm');
        const yearSelect = section.querySelector('#datenaiss_yy');

        if (daySelect && monthSelect && yearSelect) {
            const day = parseInt(daySelect.value);
            const month = parseInt(monthSelect.value);
            const year = parseInt(yearSelect.value);

            if (day && month && year) {
                const date = new Date(year, month - 1, day);
                const today = new Date();
                const age = today.getFullYear() - year;

                if (date.getDate() !== day || date.getMonth() !== month - 1 || date.getFullYear() !== year) {
                    if (showErrors) {
                        showFieldError(daySelect, 'Date invalide');
                    }
                    isValid = false;
                } else if (age < 18 || age > 65) {
                    if (showErrors) {
                        showFieldError(yearSelect, 'L\'âge doit être entre 18 et 65 ans');
                    }
                    isValid = false;
                }
            }
        }

        return isValid;
    }

    function showFieldError(field, message) {
        clearFieldError(field);

        const errorDiv = document.createElement('div');
        errorDiv.className = 'form-error';
        errorDiv.textContent = message;

        // Handle radio group errors differently
        if (field.classList && field.classList.contains('radio-group')) {
            field.appendChild(errorDiv);
        } else {
            field.parentNode.appendChild(errorDiv);
            field.classList.add('is-invalid');
        }
    }

    function clearFieldError(field) {
        if (field.classList && field.classList.contains('radio-group')) {
            const existingError = field.querySelector('.form-error');
            if (existingError) {
                existingError.remove();
            }
        } else {
            const existingError = field.parentNode.querySelector('.form-error');
            if (existingError) {
                existingError.remove();
            }
            field.classList.remove('is-invalid');
        }
    }

    function showValidationErrors(section) {
        const errors = section.querySelectorAll('.form-error');
        if (errors.length > 0) {
            errors[0].scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }

    function validateAllPreviousSections(targetSection) {
        for (let i = 0; i < targetSection; i++) {
            if (!validateSection(i, false)) {
                return false;
            }
        }
        return true;
    }

    // Conditional fields logic
    function setupConditionalFields() {
        const statutProfSelect = document.getElementById('statut');
        const employerFields = document.querySelectorAll('.employer-field');

        function toggleEmployerFields() {
            const selectedStatus = statutProfSelect?.value;
            const showFields = ['Fonctionnaire', 'Travailleur privé'].includes(selectedStatus);

            employerFields.forEach(field => {
                field.style.display = showFields ? 'block' : 'none';
                field.classList.toggle('active', showFields);

                const inputs = field.querySelectorAll('input');
                inputs.forEach(input => {
                    if (showFields) {
                        input.setAttribute('required', 'required');
                    } else {
                        input.removeAttribute('required');
                        clearFieldError(input);
                    }
                });
            });

            // Update button state after changing conditional fields
            setTimeout(updateCurrentSectionNavigationButtons, 50);
        }

        if (statutProfSelect) {
            statutProfSelect.addEventListener('change', toggleEmployerFields);
            toggleEmployerFields(); // Initial state
        }

        // Spouse name field logic
        const civiliteSelect = document.getElementById('civilite');
        const epouseField = document.getElementById('epouse');

        function toggleSpouseField() {
            const civilite = civiliteSelect?.value;
            if (epouseField) {
                epouseField.style.display = (civilite === "Monsieur") ? "none" : "block";
                if (civilite === "Monsieur") {
                    epouseField.removeAttribute('required');
                } else {
                    // Don't make it required automatically
                }
            }

            // Update button state after changing conditional fields
            setTimeout(updateCurrentSectionNavigationButtons, 50);
        }

        if (civiliteSelect) {
            civiliteSelect.addEventListener('change', toggleSpouseField);
            toggleSpouseField(); // Initial state
        }
    }

    // Auto-save functionality
    function setupAutoSave() {
        const STORAGE_KEY = 'candidature_form_data';

        // Load saved data
        loadFormData();

        // Save periodically
        setInterval(saveFormData, 30000); // Every 30 seconds

        // Save on page unload
        window.addEventListener('beforeunload', saveFormData);
    }

    function saveFormData() {
        const data = {};
        const inputs = form.querySelectorAll('input, select, textarea');

        inputs.forEach(input => {
            if (input.type === 'radio' || input.type === 'checkbox') {
                if (input.checked) {
                    data[input.name] = input.value;
                }
            } else {
                data[input.name] = input.value;
            }
        });

        localStorage.setItem('candidature_form_data', JSON.stringify(data));
        showAutoSaveIndicator();
    }

    function loadFormData() {
        const savedData = localStorage.getItem('candidature_form_data');
        if (!savedData) return;

        try {
            const data = JSON.parse(savedData);
            const inputs = form.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {
                if (data[input.name] !== undefined) {
                    if (input.type === 'radio' || input.type === 'checkbox') {
                        input.checked = data[input.name] === input.value;
                    } else {
                        input.value = data[input.name];
                    }
                }
            });
        } catch (e) {
            console.error('Error loading saved form data:', e);
        }
    }

    function showAutoSaveIndicator() {
        // Create or update auto-save indicator
        let indicator = document.getElementById('autosave-indicator');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.id = 'autosave-indicator';
            indicator.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: var(--success-color);
                color: white;
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 0.8rem;
                opacity: 0;
                transition: opacity 0.3s;
                z-index: 1000;
            `;
            document.body.appendChild(indicator);
        }

        indicator.textContent = 'Sauvegarde automatique ✓';
        indicator.style.opacity = '1';

        setTimeout(() => {
            indicator.style.opacity = '0';
        }, 2000);
    }

    // Additional form enhancements
    function setupFormEnhancements() {
        // Smooth focus transitions
        const inputs = form.querySelectorAll('.formbold-form-input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.classList.add('focused');
            });

            input.addEventListener('blur', function() {
                this.parentNode.classList.remove('focused');
            });
        });

        // Progress bar click navigation
        progressSteps.forEach((step, index) => {
            step.style.cursor = 'pointer';
            step.addEventListener('mouseenter', function() {
                if (index <= currentSection || validateAllPreviousSections(index)) {
                    this.style.transform = 'scale(1.05)';
                }
            });

            step.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch(e.key) {
                    case 'ArrowLeft':
                        e.preventDefault();
                        if (currentSection > 0) {
                            navigateToSection(currentSection - 1);
                        }
                        break;
                    case 'ArrowRight':
                        e.preventDefault();
                        if (currentSection < formSections.length - 1 && validateSection(currentSection, false)) {
                            navigateToSection(currentSection + 1);
                        }
                        break;
                }
            }
        });

        // Fix dropdown selection visibility issues
        setupDropdownVisibilityFix();

        // Form completion progress
        updateCompletionProgress();
        form.addEventListener('input', updateCompletionProgress);
        form.addEventListener('change', updateCompletionProgress);
    }

    // Fix dropdown selection visibility issues
    function setupDropdownVisibilityFix() {
        const selectElements = document.querySelectorAll('select.formbold-form-input');

        selectElements.forEach(select => {
            // Force initial style application
            forceSelectVisibility(select);

            // Handle change events
            select.addEventListener('change', function() {
                forceSelectVisibility(this);
                // Force re-render by briefly changing display
                const originalDisplay = this.style.display;
                this.style.display = 'none';
                this.offsetHeight; // Trigger reflow
                this.style.display = originalDisplay || 'block';
            });

            // Handle focus/blur events
            select.addEventListener('focus', function() {
                forceSelectVisibility(this);
            });

            select.addEventListener('blur', function() {
                setTimeout(() => forceSelectVisibility(this), 10);
            });
        });
    }

    function forceSelectVisibility(selectElement) {
        if (!selectElement) return;

        // Force style properties
        selectElement.style.color = '#2d3748';
        selectElement.style.backgroundColor = '#ffffff';
        selectElement.style.opacity = '1';

        // Handle selected state
        if (selectElement.value && selectElement.value !== '') {
            selectElement.style.fontWeight = '500';
            selectElement.setAttribute('data-has-value', 'true');
        } else {
            selectElement.style.fontWeight = '400';
            selectElement.removeAttribute('data-has-value');
        }

        // Force repaint
        selectElement.offsetHeight;
    }

    // Apply fixes to all dropdowns on page load
    function fixAllDropdowns() {
        const allSelects = document.querySelectorAll('select.formbold-form-input');
        allSelects.forEach(select => {
            forceSelectVisibility(select);
        });
    }

    function updateCompletionProgress() {
        const allInputs = form.querySelectorAll('input[required], select[required], textarea[required]');
        const filledInputs = Array.from(allInputs).filter(input => {
            // Skip if input itself is hidden
            if (input.style.display === 'none') {
                return true; // Consider hidden fields as filled
            }

            // Check if parent form-group is hidden
            const formGroup = input.closest('.form-group');
            if (formGroup && formGroup.style.display === 'none') {
                return true; // Consider hidden fields as filled
            }

            // Special handling for radio buttons
            if (input.type === 'radio') {
                return form.querySelector(`input[name="${input.name}"]:checked`);
            }

            return input.value.trim() !== '';
        });

        const progress = Math.round((filledInputs.length / allInputs.length) * 100);

        // Update progress in header
        let progressText = document.querySelector('.form-completion-progress');
        if (!progressText) {
            progressText = document.createElement('div');
            progressText.className = 'form-completion-progress';
            progressText.style.cssText = `
                position: absolute;
                top: 10px;
                right: 20px;
                background: rgba(255,255,255,0.2);
                padding: 5px 12px;
                border-radius: 15px;
                font-size: 0.8rem;
                z-index: 10;
            `;
            const formHeader = document.querySelector('.form-header');
            if (formHeader) {
                formHeader.appendChild(progressText);
            }
        }

        if (progressText) {
            progressText.textContent = `${progress}% complété`;
        }
    }

    // We don't need this function anymore as we want normal form submission
    function handleFormSubmit(e) {
        // Allow the form to submit normally - don't prevent default!
        console.log('Submit button clicked, allowing normal submission...');
        return true;
    }

    // Public API
    window.formFunctions = {
        navigateToSection,
        validateSection,
        saveFormData,
        validateAllSections: () => {
            for (let i = 0; i < formSections.length - 1; i++) {
                if (!validateSection(i, false)) {
                    return false;
                }
            }
            return true;
        },
        getCurrentSection: () => currentSection,
        getTotalSections: () => formSections.length
    };
});
