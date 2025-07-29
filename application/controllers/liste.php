<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Liste extends MY_Controller {
         private $limit = 10;

	 function __construct() {
		parent::__construct();

		// load library
		$this->load->library(array('table', 'form_validation'));
		// load helper
		$this->load->helper('url');
		// load model
		$this->load->model('Model_generique', 'model', TRUE);
                
                $tmpl = array (
                    'table_open'          => '<table class="table table-striped table-bordered table-hover t_border_color">',

                    'heading_row_start'   => '<thead class="t_header"><tr>',
                    'heading_row_end'     => '</thead></tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr class="t_border_color">',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td class="t_border_color" >',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr class="alt">',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
                );
                $this->table->set_template($tmpl);
	 
	    }
            
	public function index()
	{
            
            // offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$candidats = $this->model->get_paged_list('candidats',$this->limit, $offset)->result();
        //Count
		$nbdeposer = $this->model->countEntities('SELECT * FROM `candidats` WHERE a_depose = true');
        $totalCandidatures = $this->model->count_all('candidats');
        $data['nbDeposer'] = $nbdeposer;        
        $data['nbtotal'] = $totalCandidatures;
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('liste/index/');
 		$config['total_rows'] = $totalCandidatures;
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Noms et prénoms','Spécialité','Statut', 'Date','Actions');
		$i = 0 + $offset;
		foreach ($candidats as $candidat)
		{       
                        $specialite = $this->model->get_by_id2('specialite',$candidat->id_specialite);
                        
			$this->table->add_row( ++$i, $candidat->nom . " ". $candidat->prenom, $specialite->nom, strtoupper($candidat->statut_prof), strtoupper($candidat->date_enregistrement), 
				'<div class="btn-group" style="min-width:150px">
                        <a href="#" class="btn btn-primary"><i class="icon-list icon-white"></i> Actions</a>
                        <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
                        <ul class="dropdown-menu">'.
                                '<li><a href="'.site_url('impression/imprimer_fiche/'.$candidat->id).'"><i class="icon-zoom-in"></i> Afficher dossier détaillé</a></li>'.
                                '<li><a href="'.site_url('candidature/marquerdeposer/'.$candidat->id).'"><i class="icon-trash"></i> Marquer comme déposé</a></li>'.
                                '<li><a href="#"><i class="icon-ok"></i> ...</a></li>
                            <li class="divider"></li>'
                                
			);
		}
		$data['table'] = $this->table->generate();
            //	$this->load->view('welcome_message');
                $this->template->layout('liste', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */