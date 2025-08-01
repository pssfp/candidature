<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow">
                <div class="card-header text-white">
                    <h3 class="card-title mb-0">Master en Finances Publiques : Authentification</h3>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($message)): ?>
                        <div class="alert alert-danger text-center mb-4"><?php echo $message; ?></div>
                    <?php endif; ?>

                    <div class="text-center text-primary mb-4">
                        Veuillez entrer vos identifiants
                    </div>

                    <form id="loginForm" method="post" action="<?php echo $action; ?>">
                        <div class="mb-4">
                            <label for="login" class="form-label">Identifiant :</label>
                            <input value="<?php echo set_value('login', $this->form_data->login); ?>"
                                   name="login" placeholder="Identifiant"
                                   required class="form-control form-control-lg" id="login" type="text">
                            <div class="invalid-feedback">Veuillez saisir votre identifiant</div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Mot de passe :</label>
                            <input value="<?php echo set_value('password', $this->form_data->password); ?>"
                                   name="password" placeholder="Mot de passe" required
                                   class="form-control form-control-lg" id="password" type="password">
                            <div class="invalid-feedback">Veuillez saisir votre mot de passe</div>
                        </div>

                        <div class="d-grid" >
                            <button style="background-color: #6d189c; border-radius; 10px;" name="<?php if (isset($submitname)) echo $submitname; ?>"
                                    id="subenregistrer" class="btn btn-primary btn-lg">
                                Connexion
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }
    .card {
        border-radius: 10px;
        border: none;
    }
    .form-control-lg {
        padding: 1rem;
    }
    .card-header{
        background-color: #6d189c;
    }
    button{
        background-color: #6d189c;
        border-radius: 15px;
    }
</style>

<script>
    // Validation côté client optionnelle
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        let isValid = true;
        const inputs = this.querySelectorAll('input[required]');

        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('is-invalid');
                isValid = false;
            } else {
                input.classList.remove('is-invalid');
            }
        });

        if (!isValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
</script>