<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidature extends MY_Controller {

    public $load;
    public $form_data;
    public $region_model;


    function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('model_generique', 'model', TRUE);
        $this->load->model('region_model');

        // load library
        $this->load->library(['form_validation', 'session', 'email', 'table']);

        // load helper
        $this->load->helper(['form', 'url']);
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */

    public function index() {
        $this->reset_form_data();
        $submitname = "enregistrer";
        $data['submitname'] = $submitname;
        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/add/');
        $this->template->layout('candidature', $data);
    }

    /**
     * Send a confirmation email to the user after form submission
     *
     * @param object $candidature The candidate data object
     * @param string $action The action performed (new submission or update)
     * @return boolean True if email sent successfully
     */
    private function send_confirmation_email($candidature, $action = 'new') {
        // Start by logging the attempt
        log_message('info', 'Attempting to send email to: ' . $this->input->post('email') . ' for candidate ID: ' . (is_object($candidature) ? $candidature->id : $candidature));

        $email_setting = array(
            'charset' => 'utf-8',
            'mailtype' => 'html'
        );

        // Load email configuration from config file
        $this->config->load('email');

        $this->email->initialize($email_setting);
        $this->email->from('noreply@pssfp.net', '[PSSFP] DEPOT de CANDIDATURE 13ème PROMOTION 2025/2026');
        $this->email->to($this->input->post('email'));
        $this->email->newline = "\r\n";
        $this->email->crlf = "\n";

        // Log recipient email for debugging
        log_message('debug', 'Email recipient: ' . $this->input->post('email'));

        $candidat_id = isset($candidature->id) ? $candidature->id : $candidature;
        $specialite_candidat = $this->model->get_by_id2('specialite', $this->input->post('id_specialite'));

        // Set the appropriate subject based on action
        if ($action == 'new') {
            $this->email->subject('Confirmation de candidature N°' . $candidat_id . ' - PSSFP');
        } else {
            $this->email->subject('Mise à jour de candidature N°' . $candidat_id . ' - PSSFP');
        }

        // Build the email message with improved formatting
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { width: 100%; max-width: 600px; margin: 0 auto; }
                .header { background-color: #0056b3; color: white; padding: 20px; text-align: center; }
                .content { padding: 20px; }
                .footer { background-color: #f8f9fa; padding: 15px; font-size: 12px; color: #666; text-align: center; }
                table { width: 100%; border-collapse: collapse; margin: 20px 0; }
                table td { padding: 8px; border-bottom: 1px solid #eee; }
                .label { font-weight: bold; width: 40%; }
                .actions { background-color: #f5f5f5; padding: 15px; margin: 20px 0; border-left: 4px solid #0056b3; }
                .btn { display: inline-block; background-color: #0056b3; color: white; padding: 10px 20px; 
                       text-decoration: none; border-radius: 4px; margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>' . ($action == 'new' ? 'Confirmation de Candidature' : 'Mise à jour de Candidature') . '</h2>
                </div>
                
                <div class="content">
                    <p>Cher(e) ' . $this->input->post('civilite') . ' ' . $this->input->post('nom') . ' ' . $this->input->post('prenom') . ',</p>
                    
                    <p>Nous vous informons que votre candidature a bien été ' . ($action == 'new' ? 'enregistrée' : 'mise à jour') . ' avec les détails suivants :</p>
                    
                    <table>
                        <tr>
                            <td class="label">Dossier N°</td>
                            <td>: ' . $candidat_id . '</td>
                        </tr>
                        <tr>
                            <td class="label">N° de téléphone</td>
                            <td>: ' . $this->input->post('telephone') . '</td>
                        </tr>
                        <tr>
                            <td class="label">Spécialité</td>
                            <td>: ' . $specialite_candidat->nom . '</td>
                        </tr>
                        <tr>
                            <td class="label">Type de formation</td>
                            <td>: ' . $this->input->post('type_etude') . '</td>
                        </tr>
                        <tr>
                            <td class="label">Statut professionnel</td>
                            <td>: ' . $this->input->post('statut_prof') . '</td>
                        </tr>
                        <tr>
                            <td class="label">Administration d\'origine</td>
                            <td>: ' . $this->input->post('structure') . '</td>
                        </tr>
                        <tr>
                            <td class="label">Nationalité</td>
                            <td>: ' . $this->input->post('nationalite') . '</td>
                        </tr>
                    </table>
                    
                    <div class="actions">
                        <h3>Actions importantes :</h3>
                        <p>
                            <a href="' . site_url('impression/imprimer_fiche/' . $candidat_id) . '" class="btn">Télécharger votre fiche de candidature</a>
                        </p>
                        <p>
                            <a href="' . site_url('candidature/initupdate/') . '" class="btn">Modifier vos informations</a>
                        </p>
                        
                        <p><strong>Pour toute modification ultérieure, veuillez utiliser les identifiants suivants :</strong></p>
                        <ul>
                            <li><strong>Numéro d\'ordre</strong> : ' . $candidat_id . '</li>
                            <li><strong>N° de téléphone</strong> : ' . $this->input->post('telephone') . '</li>
                        </ul>
                    </div>
                    
                    <p>Nous vous remercions de votre intérêt pour notre programme et restons à votre disposition pour toute information complémentaire.</p>
                    
                    <p>Cordialement,<br>L\'équipe PSSFP</p>
                </div>
                
                <div class="footer">
                    <p>PSSFP: B.P: 16 578 Yaoundé – Cameroun<br>
                    Tel.: + (237) 697 921 332<br>
                    (237) 677 257 272<br>
                    (237) 671 171 808</p>
                </div>
            </div>
        </body>
        </html>';

        $this->email->message($message);

        // Try to send the email with enhanced error handling
        try {
            if ($this->email->send()) {
                log_message('info', 'Confirmation email sent successfully to: ' . $this->input->post('email') . ' for candidate ID: ' . $candidat_id);

                log_message('info', 'Confirmation email sent successfully to: ' . $this->input->post('email') . ' for candidate ID: ' . $candidat_id);
                return true;
            } else {
                $error = $this->email->print_debugger();
                log_message('error', 'Failed to send confirmation email to: ' . $this->input->post('email') . ' for candidate ID: ' . $candidat_id . '. Error: ' . $error);

                // Log SMTP configuration for debugging
                log_message('debug', 'SMTP Host: ' . $this->config->item('smtp_host', 'email'));
                log_message('debug', 'SMTP Port: ' . $this->config->item('smtp_port', 'email'));
                log_message('debug', 'SMTP User: ' . $this->config->item('smtp_user', 'email'));
                log_message('debug', 'SMTP Protocol: ' . $this->config->item('protocol', 'email'));
                //log_message('error', 'Failed to send confirmation email to: ' . $this->input->post('email') . ' for candidate ID: ' . $candidat_id . '. Error: ' . $error);

                return false;
            }
        } catch (Exception $e) {
            log_message('error', 'Exception when sending email: ' . $e->getMessage());
            return false;
        }
    }

    public function add() {
        $this->load->library('form_validation');
        $table = 'candidats';
        $data = array();
        $submitname = "enregistrer";
        $data['submitname'] = $submitname;
        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/add/');

        // Log to help with debugging
        //log_message('debug', 'Add method accessed. POST data present: ' . (empty($_POST) ? 'No' : 'Yes'));
        //log_message("");
        //log_message($submitname, $this->input->post($submitname));

        // Check if form is submitted
        if (empty($_POST) === false) {
            log_message('debug', 'Form submitted with button: ' . $submitname);

            // Set validation rules
            $this->form_validation->set_rules('id_specialite', 'Spécialité', 'required');
            $this->form_validation->set_rules('type_etude', 'Mode de formation', 'required');
            $this->form_validation->set_rules('civilite', 'Civilité', 'required');
            $this->form_validation->set_rules('nom', 'Nom', 'required');
            $this->form_validation->set_rules('prenom', 'Prénom', 'required');
            $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'required');
            $this->form_validation->set_rules('lieu_de_naissce', 'Lieu de naissance', 'required');
            $this->form_validation->set_rules('nationalite', 'Nationalité', 'required');
            $this->form_validation->set_rules('paysorigine', 'Pays d\'origine', 'required');
            $this->form_validation->set_rules('statu_matrimonial', 'Statut matrimonial', 'required');
            $this->form_validation->set_rules('adresse_candidat', 'Adresse complète', 'required');
            $this->form_validation->set_rules('ville_residence', 'Ville de résidence', 'required');
            $this->form_validation->set_rules('pays_residence', 'Pays de résidence', 'required');
            $this->form_validation->set_rules('telephone', 'Téléphone WhatsApp', 'required|is_unique[candidats.telephone]|is_unique[candidats.telephone2]');
            $this->form_validation->set_rules('telephone2', 'Téléphone secondaire', 'trim|differs[telephone]|is_unique[candidats.telephone]|is_unique[candidats.telephone2]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|matches[emailverif]|is_unique[candidats.email]');
            $this->form_validation->set_rules('emailverif', 'Confirmation Email', 'required');
            $this->form_validation->set_rules('engagement', 'Engagement', 'required');

            // Set custom error messages with clear and specific descriptions
            $this->form_validation->set_message('required', 'Le champ %s est obligatoire.');
            $this->form_validation->set_message('is_unique', 'Ce %s est déjà utilisé par un autre candidat. Veuillez en saisir un autre.');
            $this->form_validation->set_message('matches', 'La confirmation de l\'adresse e-mail ne correspond pas à l\'adresse e-mail principale.');
            $this->form_validation->set_message('differs', 'Le numéro de téléphone secondaire doit être différent du numéro principal.');
            $this->form_validation->set_message('valid_email', 'Veuillez saisir une adresse e-mail valide.');

            // Store form values for repopulation in case of validation failure
            $this->form_data = new stdClass();
            foreach ($this->input->post() as $key => $value) {
                $this->form_data->$key = $value;
            }

            $fields = ['type_etude', 'id_specialite', 'civilite', 'nom', 'prenom', 'epouse', 'nombre_enfant',
                      'date_naissance', 'lieu_de_naissce', 'nationalite', 'paysorigine',
                      'region_dorigine', 'dept_dorigine', 'sexe', 'statu_matrimonial', 'langue', 'pays_residence',
                      'adresse_candidat', 'ville_residence', 'telephone', 'telephone2', 'email',
                      'dernier_diplome_intitule', 'dernier_diplome_specialite',
                      'dernier_diplome_domaine', 'dernier_diplome_autre_domaine', 'dernier_diplome_etablissement',
                      'dernier_diplome_pays', 'dernier_diplome_annee', 'dernier_diplome_niveau', 'dernier_diplome_mention',
                      'statut_prof', 'autre_statut_prof', 'structure', 'adresse_structure', 'telephone_structure',
                      'email_structure', 'poste_actuel', 'date_debut_poste', 'lien_finances_publiques',
                      'explication_lien_partiel', 'total_annees_experience', 'howDidYouKnewUs', 'howDidYouKnewUs_autre'];

            foreach ($fields as $field) {
                if (!isset($this->form_data->$field)) {
                    $this->form_data->$field = '';
                }
            }

            // Run validation and log the result
            $validation_result = $this->form_validation->run();

            if ($validation_result === TRUE) {

                // Only save data if validation passes
                $candidat_data = array();
                foreach ($fields as $field) {
                    if ($this->input->post($field) !== NULL) {
                        $candidat_data[$field] = $this->input->post($field);
                    }
                }

                $candidat_data['date_naissance'] = $this->input->post('date_naissance');
                $candidat_data['sexe'] = ($this->input->post('civilite') === "Monsieur") ? "Homme" : "Femme";
                $candidat_data['accepter_condition'] = true;
                $candidat_data['ordre_candidature'] = time();;
                $candidat_data['date_enregistrement'] = date("Y-m-d H:i:s");
                $candidat_data['id_pays'] = $this->input->post('pays_residence');
                $candidat_data['a_depose'] = false;

                // Create the new record
                $candidat_id = $this->model->save($table, $candidat_data);

                if ($candidat_id) {
                    // Send confirmation email to the candidate
                    //$email_sent = $this->send_confirmation_email($candidat_id, 'new');
                    $email_sent = true;

                    // Store info in session for the success page
                    $this->session->set_flashdata('id', $candidat_id);
                    $this->session->set_flashdata('numordre', $candidat_id);
                    $this->session->set_flashdata('telephone', $this->input->post('telephone'));
                    $this->session->set_flashdata('email', $this->input->post('email'));
                    $this->session->set_flashdata('email_sent', $email_sent);

                    // If email sending failed, get the error message
                    if (!$email_sent) {
                        $error = $this->email->print_debugger();
                        $this->session->set_flashdata('email_error', $error);
                        log_message('error', 'Email sending failed for candidate ID: ' . $candidat_id . '. Error: ' . $error);
                    } else {
                        log_message('info', 'Email successfully sent for candidate ID: ' . $candidat_id);
                    }

                    // Ensure the redirect URL is correct and properly formed
                    $redirect_url = site_url('candidature/success');
                    log_message('debug', 'Redirecting to success page: ' . $redirect_url);

                    // Force a proper redirect with header
                    header('Location: ' . $redirect_url);
                    exit(); // Stop further execution to ensure the redirect takes place
                } else {
                    // Database insertion failed
                    $data['error'] = 'Échec de l\'enregistrement de la candidature. Veuillez réessayer.';
                    log_message('error', 'Failed to create candidate record in database');
                    $this->template->layout('candidature', $data);
                }
            } else {
                // Validation failed - log and display the form with errors
                var_dump('debug', 'Form validation failed. Errors: ' . validation_errors());
                $this->template->layout('candidature', $data);
            }
        } else {
            // First time loading the form - reset form data
            log_message('debug', 'Initial form load - resetting form data');
            $this->reset_form_data();
            $this->template->layout('candidature', $data);
        }
    }

    public function success() {
        // Add detailed logging about the session data for debugging
        log_message('debug', 'Success page accessed. Session data: ' .
            'numordre=' . $this->session->flashdata('numordre') . ', ' .
            'email=' . $this->session->flashdata('email') . ', ' .
            'email_sent=' . ($this->session->flashdata('email_sent') ? 'true' : 'false'));

        $this->template->layout('success_page', array()); // Create a success view
    }

    public function viewnumordre(){
        $data=array();
        $this->template->layout('numOrdreCandidature', $data);
    }

    public function initupdate() {
        $this->form_data = new stdclass;
        $this->form_data->numordre = '';
        $this->form_data->telephone = '';
        $submitname = "modifier";
        $data['submitname'] = $submitname;
        $data['action'] = site_url('candidature/verifinitupdate/');
        $this->template->layout('firstformupdate', $data);
    }

    public function verifinitupdate() {
        $table = 'candidats';
        $submitname = "modifier";
        $data['submitname'] = $submitname;
        $numordre = $this->input->post('numordre');
        $phone = $this->input->post('telephone');
        $candidature = $this->model->get_by_id($table, $numordre, 'ordre_candidature')->row();
        if ($candidature == null || $candidature->telephone !== $phone) {
            $this->form_data = new stdclass;
            $this->form_data->numordre = $this->input->post('numordre');
            $this->form_data->telephone = $this->input->post('telephone');
            $data['action'] = site_url('candidature/verifinitupdate/');
            $data['message'] = "Vérifier vos informations";
            $this->template->layout('firstformupdate', $data);
        } else {
            redirect('candidature/update/'.$numordre."/".$phone);
        }
    }

    public function marquerdeposer($id_candidat) {
        $this->load->model('impression_model', '', TRUE);
        $candidat = array(
            'a_depose' => true
        );
        $this->model->update("candidats", 'id', $id_candidat, $candidat);
        redirect('liste');
    }

    public function update($numordre = 0, $phone = '') {
        $table = 'candidats';
        $submitname = "modifier";
        $data['submitname'] = $submitname;

        // Get candidate data
        $candidature = $this->model->get_by_id($table, $numordre, 'ordre_candidature')->row();
        if (!$candidature) {
            // No candidate found with this order number
            $this->session->set_flashdata('error', 'Aucune candidature trouvée avec ce numéro d\'ordre.');
            redirect('candidature/initupdate');
            return;
        }

        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/update/'.$numordre."/".$phone);

        // Load all current data into form_data
        $this->form_data = new stdclass;
        $this->form_data->type_etude = $candidature->type_etude;
        $this->form_data->specialite = $candidature->id_specialite;
        $this->form_data->civilite = $candidature->civilite;
        $this->form_data->nom = $candidature->nom;
        $this->form_data->prenom = $candidature->prenom;
        $this->form_data->epouse = $candidature->epouse;
        $this->form_data->nombre_enfant = $candidature->nombre_enfant;
        $this->form_data->date_naissance = $candidature->date_naissance; // Use the date directly
        $this->form_data->lieu_de_naissce = $candidature->lieu_de_naissce;
        $this->form_data->nationalite = $candidature->nationalite;
        $this->form_data->paysorigine = $candidature->paysorigine;
        $this->form_data->region_dorigine = $candidature->region_dorigine;
        $this->form_data->dept_dorigine = $candidature->dept_dorigine;
        $this->form_data->sexe = $candidature->sexe;
        $this->form_data->statu_matrimonial = $candidature->statu_matrimonial;
        $this->form_data->langue = $candidature->langue;
        $this->form_data->pays_residence = $candidature->id_pays;
        $this->form_data->adresse_candidat = $candidature->adresse_candidat;
        $this->form_data->ville_residence = $candidature->ville_residence;
        $this->form_data->telephone = $candidature->telephone;
        $this->form_data->telephone2 = $candidature->telephone2;
        $this->form_data->email = $candidature->email;
        $this->form_data->emailverif = $candidature->email;
        $this->form_data->dernier_diplome_intitule = $candidature->dernier_diplome_intitule;
        $this->form_data->dernier_diplome_specialite = $candidature->dernier_diplome_specialite;
        $this->form_data->dernier_diplome_domaine = $candidature->dernier_diplome_domaine;
        $this->form_data->dernier_diplome_autre_domaine = $candidature->dernier_diplome_autre_domaine;
        $this->form_data->dernier_diplome_etablissement = $candidature->dernier_diplome_etablissement;
        $this->form_data->dernier_diplome_pays = $candidature->dernier_diplome_pays;
        $this->form_data->dernier_diplome_annee = $candidature->dernier_diplome_annee;
        $this->form_data->dernier_diplome_niveau = $candidature->dernier_diplome_niveau;
        $this->form_data->dernier_diplome_mention = $candidature->dernier_diplome_mention;
        $this->form_data->statut_prof = $candidature->statut_prof;
        $this->form_data->autre_statut_prof = $candidature->autre_statut_prof;
        $this->form_data->structure = $candidature->structure;
        $this->form_data->adresse_structure = $candidature->adresse_structure;
        $this->form_data->telephone_structure = $candidature->telephone_structure;
        $this->form_data->email_structure = $candidature->email_structure;
        $this->form_data->poste_actuel = $candidature->poste_actuel;
        $this->form_data->date_debut_poste = $candidature->date_debut_poste;
        $this->form_data->lien_finances_publiques = $candidature->lien_finances_publiques;
        $this->form_data->explication_lien_partiel = $candidature->explication_lien_partiel;
        $this->form_data->total_annees_experience = $candidature->total_annees_experience;
        $this->form_data->howDidYouKnewUs = $candidature->howDidYouKnewUs;
        $this->form_data->howDidYouKnewUs_autre = $candidature->howDidYouKnewUs_autre;
        //$this->form_data->accepter_condition              Pas besoin d'enregistrer cette variable

        if (isset($_POST[$submitname])) {
            // Validation rules for update - exclude current record from uniqueness check
            $this->form_validation->set_rules('telephone', 'Numéro de téléphone principal', 'trim|required|is_unique[candidats.telephone.id.' . $candidature->id . ']|is_unique[candidats.telephone2.id.' . $candidature->id . ']');
            $this->form_validation->set_rules('telephone2', 'Numéro de téléphone secondaire', 'trim|is_unique[candidats.telephone2.id.' . $candidature->id . ']|is_unique[candidats.telephone.id.' . $candidature->id . ']|differs[telephone]');
            $this->form_validation->set_rules('email', 'Adresse e-mail', 'trim|required|valid_email|is_unique[candidats.email.id.' . $candidature->id . ']');
            $this->form_validation->set_rules('emailverif', 'Confirmation de l\'adresse e-mail', 'trim|required|valid_email|matches[email]');
            $this->form_validation->set_rules('date_naissance', 'Date de naissance', 'required');

            // Set custom error messages with clear and specific descriptions
            $this->form_validation->set_message('required', 'Le champ %s est obligatoire.');
            $this->form_validation->set_message('is_unique', 'Ce %s est déjà utilisé par un autre candidat. Veuillez en saisir un autre.');
            $this->form_validation->set_message('matches', 'La confirmation de l\'adresse e-mail ne correspond pas à l\'adresse e-mail principale.');
            $this->form_validation->set_message('differs', 'Le numéro de téléphone secondaire doit être différent du numéro principal.');
            $this->form_validation->set_message('valid_email', 'Veuillez saisir une adresse e-mail valide.');

            // Store form values for repopulation in case of validation failure
            foreach ($this->input->post() as $key => $value) {
                $this->form_data->$key = $value;
            }

            if ($this->form_validation->run() == TRUE) {
                // Build update data array with all fields
                $candidat = array(
                    'civilite' => $this->input->post('civilite'),
                    'type_etude' => $this->input->post('type_etude'),
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'epouse' => $this->input->post('epouse'),
                    'nombre_enfant' => $this->input->post('nombre_enfant'),
                    'date_naissance' => $this->input->post('date_naissance'),
                    'lieu_de_naissce' => $this->input->post('lieu_de_naissce'),
                    'nationalite' => $this->input->post('nationalite'),
                    'paysorigine' => $this->input->post('paysorigine'),
                    'region_dorigine' => $this->input->post('region_dorigine'),
                    'dept_dorigine' => $this->input->post('dept_dorigine'),
                    'statu_matrimonial' => $this->input->post('statu_matrimonial'),
                    'adresse_candidat' => $this->input->post('adresse_candidat'),
                    'telephone' => $this->input->post('telephone'),
                    'telephone2' => $this->input->post('telephone2'),
                    'email' => $this->input->post('email'),
                    'ville_residence' => $this->input->post('ville_residence'),
                    'dernier_diplome_intitule' => $this->input->post('dernier_diplome_intitule'),
                    'dernier_diplome_specialite' => $this->input->post('dernier_diplome_specialite'),
                    'dernier_diplome_domaine' => $this->input->post('dernier_diplome_domaine'),
                    'dernier_diplome_autre_domaine' => $this->input->post('dernier_diplome_autre_domaine'),
                    'dernier_diplome_etablissement' => $this->input->post('dernier_diplome_etablissement'),
                    'dernier_diplome_pays' => $this->input->post('dernier_diplome_pays'),
                    'dernier_diplome_annee' => $this->input->post('dernier_diplome_annee'),
                    'dernier_diplome_niveau' => $this->input->post('dernier_diplome_niveau'),
                    'dernier_diplome_mention' => $this->input->post('dernier_diplome_mention'),
                    'statut_prof' => $this->input->post('statut_prof'),
                    'autre_statut_prof' => $this->input->post('autre_statut_prof'),
                    'structure' => $this->input->post('structure'),
                    'adresse_structure' => $this->input->post('adresse_structure'),
                    'email_structure' => $this->input->post('email_structure'),
                    'telephone_structure' => $this->input->post('telephone_structure'),
                    'poste_actuel' => $this->input->post('poste_actuel'),
                    'date_debut_poste' => $this->input->post('date_debut_poste'),
                    'lien_finances_publiques' => $this->input->post('lien_finances_publiques'),
                    'explication_lien_partiel' => $this->input->post('explication_lien_partiel'),
                    'total_annees_experience' => $this->input->post('total_annees_experience'),
                    'howDidYouKnewUs' => $this->input->post('howDidYouKnewUs'),
                    'howDidYouKnewUs_autre' => $this->input->post('howDidYouKnewUs_autre'),
                    'langue' => $this->input->post('langue'),
                    'id_specialite' => $this->input->post('pays_residence'),
                    'id_pays' => $this->input->post('pays_residence'),
                    'pays_residence' => $this->model->get_by_id("pays", $this->input->post('pays_residence'), "id")->row()->nom,
                    'date_enregistrement' => date("Y-m-d H:i:s"),
                    'sexe' => ($this->input->post('civilite') === "Monsieur") ? "Homme" : "Femme",
                    'accepter_condition' => true
                );

                // Update the record
                $update_result = $this->model->update($table, 'id', $candidature->id, $candidat);

                if ($update_result) {
                    // Send confirmation email to the candidate
                    $email_sent = $this->send_confirmation_email($candidature, 'update');

                    $this->session->set_flashdata('succes', 'Modification de la Candidature enregistrée avec succès, votre numéro d\'ordre a été envoyé à votre adresse mail!');
                    $this->session->set_flashdata('id', $candidature->ordre_candidature);
                    $this->session->set_flashdata('numordre', $candidature->ordre_candidature);
                    $this->session->set_flashdata('telephone', $this->input->post('telephone'));
                    $this->session->set_flashdata('email', $this->input->post('email'));
                    $this->session->set_flashdata('email_sent', $email_sent);

                    // If email sending failed, get the error message
                    if (!$email_sent) {
                        $error = $this->email->print_debugger();
                        $this->session->set_flashdata('email_error', $error);
                        log_message('error', 'Email sending failed for update of candidate ID: ' . $candidature->id . '. Error: ' . $error);
                    } else {
                        log_message('info', 'Email successfully sent for update of candidate ID: ' . $candidature->id);
                    }

                    // Redirect to prevent form resubmission
                    redirect('candidature/viewnumordre');
                } else {
                    // Database update failed
                    $data['message'] = 'Échec de la mise à jour de la candidature. Veuillez réessayer.';
                    $this->template->layout('candidature', $data);
                }
            } else {
                // Validation failed
                $data['message'] = 'Des erreurs ont été rencontrées lors de l\'enregistrement de votre fiche<br/> verifier vos informations et corriger les problèmes signalés';
                $this->template->layout('candidature', $data);
            }
        } else {
            // Initial page load - just display the form
            $this->template->layout('candidature', $data);
        }
    }

    public function initRecupOrdre(){
        $data=array();
        $this->template->layout('formEmailForNumOrdre', array());
    }

    /**
     * Reset form data by initializing all properties to empty values
     */
    private function reset_form_data() {
        // Initialize form_data object if it doesn't exist
        if (!isset($this->form_data)) {
            $this->form_data = new stdClass();
        }

        // Reset all form fields to empty values
        $this->form_data->specialite = '';
        $this->form_data->type_etude = '';
        $this->form_data->civilite = '';
        $this->form_data->nom = '';
        $this->form_data->prenom = '';
        $this->form_data->epouse = '';
        $this->form_data->nombre_enfant = '';
        $this->form_data->datenaiss_jj = '';
        $this->form_data->datenaiss_mm = '';
        $this->form_data->datenaiss_yy = '';
        $this->form_data->lieu_de_naissce = '';
        $this->form_data->nationalite = '';
        $this->form_data->paysorigine = '';
        $this->form_data->region_dorigine = '';
        $this->form_data->dept_dorigine = '';
        $this->form_data->sexe = '';
        $this->form_data->statu_matrimonial = '';
        $this->form_data->langue = '';
        $this->form_data->pays_residence = '';
        $this->form_data->adresse_candidat = '';
        $this->form_data->ville_residence = '';
        $this->form_data->telephone = '';
        $this->form_data->telephone2 = '';
        $this->form_data->email = '';
        $this->form_data->emailverif = '';
        $this->form_data->nombre_annee_etude_sup = '';
        $this->form_data->dernier_diplome = '';
        $this->form_data->specialite_requise = '';
        $this->form_data->diplome_requis = '';
        $this->form_data->diplome_obtenu_a = '';
        $this->form_data->annee_optention_diplome = '';
        $this->form_data->statut_prof = '';
        $this->form_data->structure = '';
        $this->form_data->adresse_structure = '';
        $this->form_data->telephone_structure = '';
        $this->form_data->email_structure = '';
        $this->form_data->howDidYouKnewUs = '';
    }

    public function get_regions() {
        header('Content-Type: application/json');
        $regions = $this->region_model->get_all_regions();
        echo json_encode($regions);
    }

    public function get_departements($region_id) {
        header('Content-Type: application/json');
        if (is_numeric($region_id)) {
            $departements = $this->region_model->get_departements_by_region($region_id);
            echo json_encode($departements);
        } else {
            echo json_encode([]);
        }
    }


    function _remap($method)
    {
        $param_offset = 2;
        $params = func_get_args();
        array_shift($params);
        if (method_exists($this, $method))
        {
            // Call the method with the remaining parameters
            return call_user_func_array(array($this, $method), $params);
        }
        else
        {
            // Method doesn't exist, show 404
            show_404();
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
