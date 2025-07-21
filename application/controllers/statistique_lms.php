<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistique_lms extends MY_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();

        // load library
        $this->load->library(array('table', 'form_validation'));

        //load our new PHPExcel library
        $this->load->library('excel');

        // load helper
        $this->load->helper('url');

        // load model
        $this->load->model('Model_statistique_lms', 'model', TRUE);

        $tmpl = array(
            'table_open' => '<table class="table table-striped table-bordered table-hover t_border_color">',
            'heading_row_start' => '<thead class="t_header"><tr>',
            'heading_row_end' => '</thead></tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end' => '</th>',
            'row_start' => '<tr class="t_border_color">',
            'row_end' => '</tr>',
            'cell_start' => '<td class="t_border_color">',
            'cell_end' => '</td>',
            'row_alt_start' => '<tr class="alt">',
            'row_alt_end' => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end' => '</td>',
            'table_close' => '</table>'
        );
        $this->table->set_template($tmpl);
    }

    public function index() {
        // creation du tableau final qui contien la liste des présence des auditeurs
        $req_stat_final = "SELECT user_id, t2.`nom`  FROM  `cl2_user` t2  WHERE  t2.user_id < 127 ;";
        $stat_result_final = $this->model->getEntities($req_stat_final)->result();
        $Presence_auditeur = array();

        $Presence_auditeur[0][0] = '--';
        $Presence_auditeur[0][1] = '--';
        $Presence_auditeur[0][2] = 17;
        $Presence_auditeur[0][3] = 18;
        $Presence_auditeur[0][4] = 19;
        $Presence_auditeur[0][5] = 20;

        $i = 1;
        foreach ($stat_result_final as $auditeur) {
            $Presence_auditeur[$i][0] = $auditeur->user_id;
            $Presence_auditeur[$i][1] = $auditeur->nom;
            $i++;
        }
        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);

        $liste_cours = array('CGE18', 'EDG16', 'EDG16_001', 'IAG09', 'IFN11', 'SMA17S2', 'IFN', 'MFSFEES2', 'MEP13S2', 'NGD15S2', 'MEP13S2', 'IER19S2', 'HCI20S2', 'PPG14S2', 'PPG14S2_001', 'CSD21S2  ');

        // generate table data
        $this->load->library('table');
        $this->table->set_empty("&nbsp;");
//		$this->table->set_heading('BD-id', 'Noms et prénoms', 'Présence');
        $i = 0 + $offset;

        for ($k = 2; $k <= 5; $k++) {
            $req_stat = "SELECT t1.user_id
                                    FROM `c2_SMA17S2_tracking_event` t1 RIGHT JOIN `cl2_user` t2 ON t1.user_id = t2.user_id 
                                    WHERE  t2.user_id < 127 AND t1.`date` LIKE \"2015-01-" . $Presence_auditeur[0][$k] . "%\" GROUP BY t1.user_id;";
            $stat_result = $this->model->getEntities($req_stat)->result();


            $index = 0;
            foreach ($Presence_auditeur as $auditeur) {
                if ($index == 0) {
                    $index++;
                    continue;
                }
                $trouve = false;
                foreach ($stat_result as $result) {

                    if ($auditeur[0] == $result->user_id) {
                        $Presence_auditeur[$index][$Presence_auditeur[0][$k]] = "oui";
                        $trouve = true;
                        break;
                    }
                }
                if ($trouve == false)
                    $Presence_auditeur[$index][$Presence_auditeur[0][$k]] = "non";
                $index++;
            }
        }
        //var_dump($Presence_auditeur);exit;

        $data['table'] = $this->table->generate($Presence_auditeur);
        //	$this->load->view('welcome_message');

        $this->template->layout('liste_statistique', $data);
    }
    
    /**
     * fonction qui calcul les présences des auditeurs sur la plateforme
     * entree = Interval de jour [1   9] , Date et numéro ou identifiant de la matière
     */
    public function calculLespresences($j_deb, $j_fin, $date, $uv_id) {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Présence Sem 2 1er Promo');
        $this->excel->getActiveSheet()->setCellValue('A1', 'BD-Id');
        $this->excel->getActiveSheet()->setCellValue('B1', 'Nom et Prénom');
        $this->excel->getActiveSheet()->setCellValue('C1', $uv_id);
        $this->excel->getActiveSheet()->mergeCells('C1:G1');
        // creation du tableau final qui contien la liste des présence des auditeurs
			//Liste des étudiants distanciel promo 2
	$etudiant_distanciel_promo2 = "(219,163,128,224,227,232,181,158,213,233,230,240,220,162,127,156,160,150,196,206,138,145,182,157,172,180,159,226,178,250,249,260,252,236)";
	$etudiant_distanciel_promo1_dist_FPL = "(26,27,32,35,36)";
	$etudiant_distanciel_promo1_dist_CP = "(44,46,51,52,59,64,68)";
		$etudiant_distanciel_promo1_dist_GB = "(91,88)";
        $req_stat_final = "SELECT user_id, t2.`nom`  FROM  `cl2_user` t2  WHERE t2.user_id in $etudiant_distanciel_promo1_dist_FPL ;";
        $stat_result_final = $this->model->getEntities($req_stat_final)->result();
        $Presence_auditeur = array();
        
//        ==================================================================================
        $Presence_auditeur[0][0] = '--';
        $Presence_auditeur[0][1] = '--';
        
        // initialisation des jours de cours
        $this->excel->getActiveSheet()->setCellValue('A2', '-');
        $this->excel->getActiveSheet()->setCellValue('B2', '-');
        $jour_deb = $j_deb; // date de début de cours
        $jour_fin = $j_fin; // date de fin de cours
        $n=2;
        for ($col= 'C'; $col <= 'Z'; $col++){  // On indique à chaque fois les colonnes de fin
            if ($jour_deb > $jour_fin) break;
           $this->excel->getActiveSheet()->setCellValue($col.'2', $jour_deb);
           $Presence_auditeur[0][$n] = $jour_deb; // jour de cours
           $jour_deb = $jour_deb + 1;
           $n++;
        }
//        ============================================================================
            // initialisation des auditeurs
        $i = 3;
        foreach ($stat_result_final as $auditeur) {
            $this->excel->getActiveSheet()->setCellValue('A'.$i, $auditeur->user_id);
            $this->excel->getActiveSheet()->setCellValue('B'.$i, $auditeur->nom);
            
            $Presence_auditeur[$i][0] = $auditeur->user_id;
            $Presence_auditeur[$i][1] = $auditeur->nom;
//            
            $i++;
        }

        $liste_cours = array('CGE18', 'EDG16', 'EDG16_001', 'IAG09S2', 'IFN11', 'SMA17S2', 'IFN', 'MFSFEES2', 'MEP13S2', 'NGD15S2', 'MEP13S2', 'IER19S2', 'HCI20S2', 'PPG14S2', 'PPG14S2_001', 'CSD21S2  ');
        
        $colonne=3;
        for ($k = 2; $k < $n; $k++) {
            $req_stat = "SELECT user_id FROM `c2_".$uv_id."_tracking_event` 
							WHERE user_id IN $etudiant_distanciel_promo1_dist_FPL 
							AND `date` LIKE \"$date-" . sprintf("%02d", $Presence_auditeur[0][$k]) . "%\" GROUP BY user_id;"; 
            $stat_result = $this->model->getEntities($req_stat)->result();
		

            
            
            foreach ($stat_result as $result) {
                $index = 0;
            	$ligne =3;
                
                foreach ($Presence_auditeur as $auditeur) {
                	if ($index == 0) {
	                    $index++;
	                    continue;
	                }
	                $ligne =3+$index;
                	$trouve = false;
                	
			//echo $auditeur[0]."  ". $result->user_id. "<br/>";	
                    if ($auditeur[0] == $result->user_id) {
//                        $Presence_auditeur[$index][$Presence_auditeur[0][$k]] = "oui";
                        $this->excel->getActiveSheet()->setCellValueByColumnAndRow($colonne-1, $ligne-1, 1);
                        $trouve = true;
                        break;
                    }
                    $index++;
                    
                }
                if ($trouve == false)$this->excel->getActiveSheet()->setCellValueByColumnAndRow($colonne-1, $ligne-1, 0);
//                    $Presence_auditeur[$index][$Presence_auditeur[0][$k]] = "non";
                
                //echo "Presence suivante ============================== <br/>";exit;
            }
            $colonne++;
        }
        
        $filename = 'Statistique_des_présences_'.$uv_id.'.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function excelexport() {
        //load our new PHPExcel library
        $this->load->library('excel');
//activate worksheet number 1
        $this->excel->setActiveSheetIndex(0);
//name the worksheet
        $this->excel->getActiveSheet()->setTitle('test worksheet');
//set cell A1 content with some text
        $this->excel->getActiveSheet()->setCellValue('A1', 'This is just some text value');
//change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
//make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
//merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
//set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $filename = 'just_some_random_name.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
//if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
//force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */