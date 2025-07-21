<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site_model
 *
 * @author CIC-1
 */

class Impression_model extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    

	
	function get_fiche($id){
	
		$this->db->select('candidats.*, pays.nom as nom_pays, specialite.nom as specialite');
		$this->db->from('candidats, pays, specialite');
		$this->db->where('candidats.id', $id);
		$this->db->where('candidats.id_specialite = specialite.id');
		$this->db->where('candidats.id_pays = pays.id');
		return $this->db->get();
                 
	}	
	
	function get_liste($id){
	
	
		$this->db->select('candidats.*, pays.nom as nom_pays, specialite.nom as specialite');
		$this->db->from('candidats, pays, specialite');
		
		if($id!=null){
		
			$this->db->where('specialite.id', $id);
			
		}	
		
		$this->db->where('candidats.id_specialite = specialite.id');
		$this->db->where('candidats.id_pays = pays.id');
		return $this->db->get();
 
	}

}

?>
