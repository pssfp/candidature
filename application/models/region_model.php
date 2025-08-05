<?php
class Region_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

    // Récupérer toutes les régions
    public function get_all_regions() {
        return $this->db->get('regions')->result();
    }

    // Récupérer les départements d'une région
    public function get_departements_by_region($region_id) {
        $this->db->where('region_id', $region_id);
        return $this->db->get('departements')->result();
    }
}