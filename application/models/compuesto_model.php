<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compuesto_model extends CI_Model {

	public function getcomp(){
		$sql = "SELECT *FROM compuesto where estado = 1 ORDER BY id_comp ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($data){
		return $this->db->insert("compuesto",$data);
	}

	public function update_comp($id,$data){
		$this->db->where("id_comp",$id);
		return $this->db->update("compuesto",$data);
	}

	public function getID(){
		$res = $this->db->select_max("id_comp")->get("compuesto")->result_array();
		$x = 1+ $res[0]["id_comp"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "SELECT *FROM compuesto where estado = 1 and id_comp=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}
    
} // compuesto