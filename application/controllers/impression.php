<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


use Dompdf\Options;
use Dompdf\Dompdf;
class Impression extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	// Declare properties to avoid dynamic property creation warnings
	public $impression_model;
	public $pdf;

	public function index()
	{
            //	$this->load->view('welcome_message');
            $data = array();
            $this->template->layout('candidature', $data);
	}



    public function imprimer_fiche($id_candidat)
    {

        // Charger le modèle
        $this->load->model('impression_model', '', true);

        // Préparer les données
        $data['candidat'] = $this->impression_model->get_fiche($id_candidat)->row();

        // Charger la vue HTML dans une variable
        $html = $this->load->view('impression/fiche_candidature', $data, true);

        // Configurer les options de Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true); // Pour autoriser les images externes

        // Créer l'instance Dompdf
        $dompdf = new Dompdf($options);

        // Charger le HTML
        $dompdf->loadHtml($html);

        // Configuration de la page (portrait ou landscape)
        $dompdf->setPaper('A4', 'portrait');

        // Générer le PDF
        $dompdf->render();

        // Envoyer le PDF au navigateur
        $dompdf->stream("Fiche_de_candidature_N0_" . $id_candidat, array("Attachment" => false));
    }


    function imprimer_fiche_old($id_candidat){
	
	 $this->load->helper(array('dompdf', 'file'));
	 $this->load->model('impression_model', '', TRUE);
     // page info here, db calls, etc. 
	 
	 $data['candidat'] = $this->Impression_model->get_fiche($id_candidat)->row();

     $html = $this->load->view('impression/fiche_candidature', $data, true);
     pdf_create($html, 'fiche_candidature');
	
	}
	
	function impri($id_candidat){
		 $data = array();
		 $this->load->model('impression_model', '', TRUE);
		 
		 
		 
		 $this->load->library('pdf');
		 $dompdf = new Dompdf\Dompdf();
		 
		 
		 // Set Font Style
		 //$dompdf->set_option('defaultFont', 'Courier');
		 $html = '<center><strong><h2> COMMUNIQUE </h2></strong></center>';
		 $data['candidat'] = $this->impression_model->get_fiche($id_candidat)->row();
		 //$html = $this->load->view('impression/fiche_candidature', $data, true);
		 $html = $this->load->view('impression/fiche_candidature', $data, true);
		 
		 //echo $html;exit;
		 
		 $dompdf->load_html($html);
		 // To Setup the paper size and orientatio//$dompdf->setPaper('A4', 'landscape');n
		 //$dompdf->setPaper('A4', 'landscape');
		 // Render the HTML as PDF
		 $dompdf->render();
		 
		 // Get the generated PDF file contents
		 $pdf = $dompdf->output();
		 
		 // Output the generated PDF to Browser
		 $dompdf->stream("fiche_candidature");
		 
	}	
	
	function imprimer_liste($specialite=null){
	
		 $this->load->helper(array('dompdf', 'file'));
		 $this->load->model('impression_model', '', TRUE);
		 // page info here, db calls, etc. 
		 
		$data['candidats'] = $this->Impression_model->get_liste($specialite)->result();
		
		switch ($specialite) {
		  case 1:
				$data['titre'] = ' Liste des candidats preinscrits : Comptabilité Publique';
			break;
		  case 2:
				$data['titre'] = ' Liste des candidats preinscrits : Gestion Budgétaire';
			break;
		  case 3:
				$data['titre'] = ' Liste des candidats preinscrits : Finances Publiques Locales';
			break;
		default:
				$data['titre'] = ' Liste des candidats preinscrits';
		}
		
		if($specialite==null){
			 $html = $this->load->view('impression/liste_candidats_all', $data, true);
		}else{
			 $html = $this->load->view('impression/liste_candidats', $data, true);
		}
		
		 pdf_create($html, 'liste_candidats');
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */