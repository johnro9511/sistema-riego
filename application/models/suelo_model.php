<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suelo_model extends CI_Model {

	public function getsue(){
		$sql = "SELECT *FROM suelo where estado=1 ORDER BY id_suelo ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($data){
		return $this->db->insert("suelo",$data);
	}

	public function update_suelo($id,$data){
		$this->db->where("id_suelo",$id);
		return $this->db->update("suelo",$data);
	}

	public function getID(){
		$res = $this->db->select_max("id_suelo")->get("suelo")->result_array();
		$x = 1+ $res[0]["id_suelo"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "SELECT *FROM suelo where estado=1 and id_suelo=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}
    
} // Suelo