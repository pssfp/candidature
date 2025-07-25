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
        showSection(0);

        console.log('Form initialized with', formSections.length, 'sections');
    }

    // Progress bar and section management
    function setupProgressBar() {
        progressSteps.forEach((step, index) => {
            step.addEventListener('click', () => {
                console.log('Progress step clicked:', index);
                if (index <= currentSection || validateAllPreviousSections(index)) {
                    navigateToSection(index);
                }
            });
        });
    }

    function showSection(sectionIndex) {
        console.log('Showing section:', sectionIndex);

        // Hide all sections
        formSections.forEach((section, index) => {
            section.style.display = 'none';
            section.classList.remove('active');
        });

        // Show target section with animation
        if (formSections[sectionIndex]) {
            formSections[sectionIndex].style.display = 'block';
            setTimeout(() => {
                formSections[sectionIndex].classList.add('active');
            }, 50);
        }

        updateProgress(sectionIndex);
        updateNavigationButtons(sectionIndex);
        currentSection = sectionIndex;

        // Scroll to top of form
        document.querySelector('.formbold-form-wrapper').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
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

    // Section navigation
    function setupSectionNavigation() {
        formSections.forEach((section, index) => {
            // Remove existing navigation if any
            const existingNav = section.querySelector('.form-navigation');
            if (existingNav) {
                existingNav.remove();
            }

            // Create navigation container
            const navContainer = document.createElement('div');
            navContainer.className = 'form-navigation';

            // Previous button
            if (index > 0) {
                const prevButton = createButton('Précédent', 'btn btn-secondary', () => {
                    console.log('Previous button clicked from section:', index);
                    navigateToSection(index - 1);
                });
                prevButton.innerHTML = '<i class="fas fa-arrow-left"></i> Précédent';
                navContainer.appendChild(prevButton);
            }

            // Next button or submit
            if (index < formSections.length - 1) {
                const nextButton = createButton('Suivant', 'btn btn-primary', () => {
                    console.log('Next button clicked from section:', index);
                    if (validateSection(index)) {
                        saveFormData();
                        navigateToSection(index + 1);
                    } else {
                        showValidationErrors(section);
                    }
                });
                nextButton.innerHTML = 'Suivant <i class="fas fa-arrow-right"></i>';
                navContainer.appendChild(nextButton);
            }

            section.appendChild(navContainer);
        });
    }

    function createButton(text, className, onClick) {
        const button = document.createElement('button');
        button.type = 'button'; // Important: prevent form submission
        button.textContent = text;
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

    // Enhanced validation
    function setupFormValidation() {
        // Real-time validation
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            // Validate on blur
            input.addEventListener('blur', () => {
                validateField(input);
            });

            // Clear errors on input
            input.addEventListener('input', () => {
                clearFieldError(input);
                saveFormData();
            });

            // Enhanced select handling
            if (input.tagName === 'SELECT') {
                input.addEventListener('change', () => {
                    validateField(input);
                    saveFormData();
                });
            }
        });

        // Form submission - only allow if on last section
        form.addEventListener('submit', handleFormSubmit);
    }

    function validateSection(sectionIndex, showErrors = true) {
        const section = formSections[sectionIndex];
        if (!section) return true;

        const requiredFields = section.querySelectorAll('input[required], select[required], textarea[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            // Skip hidden fields
            if (field.style.display === 'none' || field.closest('.form-group').style.display === 'none') {
                return;
            }

            if (!validateField(field, showErrors)) {
                isValid = false;
            }
        });

        // Custom validations
        isValid = performCustomValidations(section, showErrors) && isValid;

        console.log('Section', sectionIndex, 'validation result:', isValid);
        return isValid;
    }

    function validateField(field, showErrors = true) {
        const value = field.value.trim();
        const isRequired = field.hasAttribute('required');
        let isValid = true;

        // Clear previous errors
        clearFieldError(field);

        // Skip validation for hidden fields
        if (field.style.display === 'none' || field.closest('.form-group').style.display === 'none') {
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

    function handleFormSubmit(e) {
        // Only allow submission if on the last section
        if (currentSection < formSections.length - 1) {
            e.preventDefault();
            console.log('Form submission prevented - not on last section');
            return false;
        }

        // Final validation
        let isFormValid = true;

        for (let i = 0; i < formSections.length; i++) {
            if (!validateSection(i, true)) {
                isFormValid = false;
                navigateToSection(i);
                break;
            }
        }

        if (!isFormValid) {
            e.preventDefault();
            showNotification('Veuillez corriger les erreurs avant de soumettre le formulaire', 'error');
            return false;
        }

        // Show loading state
        const submitBtn = document.querySelector('.btn-success');
        if (submitBtn) {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        }

        // Clear saved data on successful submission
        localStorage.removeItem('candidature_form_data');
    }

    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `message ${type}`;
        notification.innerHTML = `<i class="fas fa-${type === 'error' ? 'exclamation-triangle' : 'info-circle'}"></i> ${message}`;

        const firstSection = formSections[0];
        firstSection.insertBefore(notification, firstSection.firstChild);

        setTimeout(() => {
            notification.remove();
        }, 5000);

        notification.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Public API
    window.FormController = {
        navigateToSection,
        validateSection,
        saveFormData,
        getCurrentSection: () => currentSection
    };
});
