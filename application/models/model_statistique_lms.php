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

class Model_statistique_lms extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
		$this->lms= $this->load->database('distant_lms', TRUE);
    }
    
	function list_all($table){
		return $this->lms->get($table);
//                return $this->conversion($q);
	}
	
	function count_all($table){
		return $this->lms->count_all($table);
	}
	
	function get_paged_list($table, $limit = 10, $offset = 0,$key=''){
            if($key!=='') $this->lms->order_by($key,'desc');
               return $this->lms->get($table, $limit, $offset);
//               return $q;
	}
	
	function get_by_id($table,$id,$key=''){
		if($key!=='') $this->lms->where($key, $id);
		return $this->lms->get($table);
//                return $this->conversion($q);
	}
	
	function get_by_id2($table,$id){
		$this->lms->select($table.'.*');
		$this->lms->from($table);
		$this->lms->where('id', $id);
		return $this->lms->get()->row();
	}
        
	function get_where_attrib($table, $attrib, $value){
		$this->lms->where($attrib, $value);
		return $this->lms->get($table);
//                return $this->conversion($q);
	}
	
	function save($table,$object){
		$this->lms->insert($table, $object);
		return $this->lms->insert_id();
	}
	
	function update($table, $key,$id, $object){
		$this->lms->where($key, $id);
		$this->lms->update($table, $object);
	}
        
	function update_Where($table, $attrib, $value, $object){
		$this->lms->where($attrib, $value);
		$this->lms->update($table, $object);
	}
	
	function delete($table,$key,$id){
		$this->lms->where($key, $id);
		$this->lms->delete($table);
	}
        
        function getEntities($req){
//           return $this->lms->get($req);
             return $this->lms->query($req);
//             return $this->conversion($q);
            
        }
        function getEntity($req){
			return $this->lms->query($req);
            
        }
        
        function countEntities($req){
          $query = $this->lms->query($req);
           return $query->num_rows();
        }
        
        function conversion($q){
            if ($q->num_rows()>0){
                    
                    foreach ($q->result() as $row){
                        $data[]=$row;
                    }
                    return $data;
                }
        }
        
        function add_geom_param($table, $longt, $lat, $id_name, $id_val){
	
		$this->lms->query("UPDATE $table SET \"geom\" = ST_GeomFromText('POINT($longt $lat)', 2154) WHERE $id_name=$id_val");
	}
}

?>