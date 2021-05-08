<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ubicacion_model extends CI_Model {

	public function getubi(){
		$sql = "SELECT *FROM ubicacion where estado = 1 ORDER BY id_ubi ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($data){
		return $this->db->insert("ubicacion",$data);
	}

	public function update_ubi($id,$data){
		$this->db->where("id_ubi",$id);
		return $this->db->update("ubicacion",$data);
	}

	public function getID(){
		$res = $this->db->select_max("id_ubi")->get("ubicacion")->result_array();
		$x = 1+ $res[0]["id_ubi"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "SELECT *FROM ubicacion where estado = 1 and id_ubi=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}

} // Ubicacion_model
