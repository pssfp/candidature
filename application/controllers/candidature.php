<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidature extends MY_Controller {

    public $form_data;

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
    public function __construct() {
        parent::__construct();

        // load library
        $this->load->library(array('table', 'form_validation'));
        $this->load->library('session');
        $this->load->library('email');
        // Remove duplicate email loading
        // load helper
        $this->load->helper('url');

        // load model
        $this->load->model('Model_generique', 'model', TRUE);
    }

    public function index() {
        $this->reset_form_data();
        $submitname = "enregistrer";
        $data['submitname'] = $submitname;
        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/add/');
        $this->template->layout('candidature', $data);
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

        if ($this->form_validation->run() == FALSE) {
            if (empty($_POST)) {
                $this->reset_form_data();
            } else {
                $this->form_data = new stdClass();
                foreach ($this->input->post() as $key => $value) {
                    $this->form_data->$key = $value;
                }
                $fields = ['type_etude', 'id_specialite', 'civilite', 'nom', 'prenom', 'epouse', 'nombre_enfant',
                          'date_naissance', 'lieu_de_naissce', 'nationalite', 'paysorigine',
                          'region_dorigine', 'dept_dorigine', 'sexe', 'statu_matrimonial', 'langue', 'pays_residence',
                          'adresse_candidat', 'ville_residence', 'telephone', 'telephone2', 'email', 'emailverif',
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
            }

            $this->template->layout('candidature', $data);
        } else {
            // If validation is successful, process the data
            $candidat_data = array();
            $fields = ['type_etude', 'id_specialite', 'civilite', 'nom', 'prenom', 'epouse', 'nombre_enfant',
                      'lieu_de_naissce', 'nationalite', 'paysorigine', 'region_dorigine', 'dept_dorigine', 'sexe',
                      'statu_matrimonial', 'langue', 'pays_residence', 'adresse_candidat', 'ville_residence',
                      'telephone', 'telephone2', 'email', 'dernier_diplome_intitule', 'dernier_diplome_specialite',
                      'dernier_diplome_domaine', 'dernier_diplome_autre_domaine', 'dernier_diplome_etablissement',
                      'dernier_diplome_pays', 'dernier_diplome_annee', 'dernier_diplome_niveau', 'dernier_diplome_mention',
                      'statut_prof', 'autre_statut_prof', 'structure', 'adresse_structure', 'telephone_structure',
                      'email_structure', 'poste_actuel', 'date_debut_poste', 'lien_finances_publiques',
                      'explication_lien_partiel', 'total_annees_experience', 'howDidYouKnewUs', 'howDidYouKnewUs_autre'];
            foreach ($fields as $field) {
                if ($this->input->post($field) !== NULL) {
                    $candidat_data[$field] = $this->input->post($field);
                }
            }
            $candidat_data['date_naissance'] = $this->input->post('date_naissance'); // Use the date directly from the input
            // Set the sexe based on civilite
            $candidat_data['sexe'] = ($this->input->post('civilite') === "Monsieur") ? "Homme" : "Femme";
            $candidat_data['accepter_condition'] = true; // Assuming this is a checkbox
            //ordre_candidature value is same as id in this case (auto increment)
            $candidat_data['ordre_candidature'] = null; // This will be auto-generated by the database
            $candidat_data['date_enregistrement'] = date("Y-m-d H:i:s");
            $candidat_data['id_pays'] = $this->input->post('pays_residence');
            $candidat_data['a_depose'] = false; // Default value for new candidates

            // Assuming you have a model method to insert data
            $this->model->create($table, $candidat_data);

            // Redirect to a success page
            redirect('candidature/success'); // You need to create this success page and method
        }
    }

    public function success() {
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

        $candidature = $this->model->get_by_id($table, $numordre, 'ordre_candidature')->row();

        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/update/'.$numordre."/".$phone);

        $this->form_data = new stdclass;
        // Load all current data into form_data
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

            if ($this->form_validation->run() == FALSE) {
                // Populate form data from POST values if validation fails
                foreach ($this->input->post() as $key => $value) {
                    $this->form_data->$key = $value;
                }
                $data['message'] = 'Des erreurs ont été rencontrées lors de l\'enregistrement de votre fiche<br/> verifier vos informations et corriger les problèmes signalés';
            } else {
                // Build update data array with all fields
                $candidat = array(
                    'civilite' => $this->input->post('civilite'),
                    'type_etude' => $this->input->post('type_etude'),
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'epouse' => $this->input->post('epouse'),
                    'nombre_enfant' => $this->input->post('nombre_enfant'),
                    'date_naissance' => $this->input->post('date_naissance'), // Use the date directly from input
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
                    'id_specialite' => $this->input->post('id_specialite'),
                    'id_pays' => $this->input->post('pays_residence'),
                    'pays_residence' => $this->model->get_by_id("pays", $this->input->post('pays_residence'), "id")->row()->nom,
                    'date_enregistrement' => date("Y-m-d H:i:s"),
                    'sexe' => ($this->input->post('civilite') === "Monsieur") ? "Homme" : "Femme",
                    'accepter_condition' => true
                );

                // Update the record
                $this->model->update($table, 'id', $candidature->id, $candidat);

                // Create and send confirmation email
                $email_setting['charset'] = 'utf-8';
                $email_setting['mailtype'] = 'html';
                $this->email->initialize($email_setting);
                $this->email->from('info@pfinancespubliques.org', '[PSSFP] DEPOT de CANDIDATURE 12eme PROMOTION 2024/2025 ');
                $this->email->to($this->input->post('email'));
                $this->email->newline = "\r\n";
                $this->email->crlf = "\n";
                $specialite_candidat= $this->model->get_by_id2('specialite', $this->input->post('specialite'));
                $this->email->subject('Enregistrement candidature N°'.$candidature->id);
                $this->email->message('
                    <h2>Confirmation de Candidature</h2>

                    <p>Cher(e) ' . $this->input->post('civilite') . ' ' . $this->input->post('nom') . ' ' . $this->input->post('prenom') . ',</p>

                    <p>Nous vous informons que votre candidature a bien été enregistrée avec les détails suivants :</p>

                    <table>
                        <tr><td><strong>Dossier N°</strong></td><td>: ' . $candidature->id . '</td></tr>
                        <tr><td><strong>N° de téléphone</strong></td><td>: ' . $this->input->post('telephone') . '</td></tr>
                        <tr><td><strong>Spécialité</strong></td><td>: ' . $specialite_candidat->nom . '</td></tr>
                        <tr><td><strong>Type de formation</strong></td><td>: ' . $this->input->post('type_etude') . '</td></tr>
                        <tr><td><strong>Statut</strong></td><td>: ' . $this->input->post('statut_prof') . '</td></tr>
                        <tr><td><strong>Administration d\'origine</strong></td><td>: ' . $this->input->post('structure') . '</td></tr>
                        <tr><td><strong>Nationalité</strong></td><td>: ' . $this->input->post('nationalite') . '</td></tr>
                    </table>

                    <h3>Actions importantes :</h3>
                    <ul>
                        <li><a href="' . site_url('impression/imprimer_fiche/' . $candidature->id) . '">Télécharger votre fiche de candidature</a></li>
                        <li><a href="' . site_url('candidature/initupdate/' ) . '">Modifier les informations de votre candidature</a></li>
                    </ul>

                    <p>Pour toute modification, veuillez utiliser les identifiants suivants :</p>
                    <ul>
                        <li><strong>Numéro d\'ordre</strong> : ' . $candidature->id . '</li>
                        <li><strong>N° de téléphone</strong> : ' . $this->input->post('telephone') . '</li>
                    </ul>

                    <hr>

                    <footer style="color: #666; font-size: 0.9em;">
                        <p>PSSFP: B.P: 16 578 Yaoundé – Cameroun<br>
                        Tel.: + (237) 697 921 332<br>
                             (237) 677 257 272<br>
                             (237) 671 171 808</p>
                    </footer>
                ');


                $this->email->send();

                $this->session->set_flashdata('succes', 'Modification de la Candidature enrégistrée avec succes, votre numéro d\'ordre a été envoyé à votre adresse mail!!');

                $this->session->set_flashdata('id', $candidature->ordre_candidature);
                $this->session->set_flashdata('numordre', $candidature->ordre_candidature);
                $this->session->set_flashdata('telephone', $candidature->telephone);
                $this->session->set_flashdata('email', $candidature->email);
                redirect('candidature/viewnumordre');
            }
        }
        $this->template->layout('candidature', $data);
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

}
