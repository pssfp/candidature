<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dom extends MY_Controller {
      function __construct() {
 parent::__construct();
 }
 function index()
 {
 $this->load->library('pdf');
 $dompdf = new Dompdf\Dompdf();
 // Set Font Style
 $dompdf->set_option('defaultFont', 'Courier');
 // Set Text
 $html = '<center><h3>PDF Created Using DOMPDF</h3></center>';
 // Load HTML to DOMPDF
 $dompdf->load_html($html);
 // Setup paper size and orientation
 $dompdf->setPaper('A4', 'landscape');
 // Render HTML as PDF
 $dompdf->render();
 // Output to screen
 $dompdf->stream("welcome.pdf");
 }
}
