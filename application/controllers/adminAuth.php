<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of adminAuth
 *
 * @author
 */
class adminAuth extends MY_Controller {

    // Property declaration to prevent PHP 8.1 deprecation warning
    public $form_data;

    public function __construct() {
        parent::__construct();

        // load library
        $this->load->library(array('table', 'form_validation'));
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('email');
        // load helper
        $this->load->helper('url');

        // load model
        $this->load->model('Model_generique', 'model', TRUE);
    }

    public function index() {
        redirect('adminAuth/initAuth');
    }

    public function initAuth() {
        $data['action'] = site_url('adminAuth/initAuth');
        $this->form_data = new stdclass;
        $this->form_data->login = '';
        $this->form_data->password = '';
        $submitname = "enregistrer";
        $data['submitname'] = $submitname;
        if (isset($_POST[$submitname])) {
            $this->form_validation->set_rules('login', 'login', 'trim|required|');
            $this->form_validation->set_rules('password', 'Mot de Passe', 'trim|required');
            $this->form_validation->set_message('required', 'Valeur Obligatoire');
            if ($this->form_validation->run() == FALSE) {
                $this->form_data->login = $this->input->post('login');
                $this->form_data->password = $this->input->post('password');
            } else {
                $req = "select * from administrateur where login='".$this->input->post('login')."' and password='".$this->input->post('password')."'";
                $admin=$this->model->getEntity($req)->row();
                if(isset($admin) && isset($admin->login)){
                    $this->session->set_userdata('login', $admin->login);
                    redirect('liste/');
                }else{
                    $this->form_data->login = $this->input->post('login');
                    $this->form_data->password = $this->input->post('password');
                }
            }
        }
        $this->template->layout('formAdminAuth', $data);
    }

}

?>
