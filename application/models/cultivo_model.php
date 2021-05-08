<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cultivo_model extends CI_Model {

	public function getcult(){
		$sql = "SELECT *FROM cultivo where estado = 1 ORDER BY id_cultivo ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($data){
		return $this->db->insert("cultivo",$data);
	}

	public function update_cult($id,$data){
		$this->db->where("id_cultivo",$id);
		return $this->db->update("cultivo",$data);
	}

	public function getID(){
		$res = $this->db->select_max("id_cultivo")->get("cultivo")->result_array();
		$x = 1+ $res[0]["id_cultivo"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "SELECT *FROM cultivo where estado = 1 and id_cultivo=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}
    
} // Ubicacicultivo