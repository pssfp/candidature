<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region_model extends CI_Model {

    public function get_all_regions() {
        $query = $this->db->order_by('nom', 'ASC')->get('regions');
        return $query->result();
    }

    public function get_departements_by_region($region_id) {
        $query = $this->db->get_where('departements', array('region_id' => $region_id));
        return $query->result();
    }
}

