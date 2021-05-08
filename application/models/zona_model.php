<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class zona_model extends CI_Model {

	public function getzona(){
		$sql = "select z.id_zona,z.nom_zona,u.desc_ubi,c.desc_cultivo,s.desc_suelo,k.nom_comp,z.fec_inicio,z.fec_cosecha from zona z inner join ubicacion u on z.id_ubi = u.id_ubi inner join cultivo c on z.id_cultivo = c.id_cultivo inner join suelo s on z.id_suelo = s.id_suelo inner join compuesto k on z.id_comp = k.id_comp where z.estado = 1;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($data){
		return $this->db->insert("zona",$data);
	}

	public function update_zona($id,$data){
		$this->db->where("id_zona",$id);
		return $this->db->update("zona",$data);
	}

	public function getID(){
		$res = $this->db->select_max("id_zona")->get("zona")->result_array();
		$x = 1+ $res[0]["id_zona"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "select z.id_zona,z.nom_zona,u.id_ubi,u.desc_ubi,c.id_cultivo,c.desc_cultivo,s.id_suelo,s.desc_suelo,k.id_comp,k.nom_comp,z.fec_inicio,z.fec_cosecha from zona z inner join ubicacion u on z.id_ubi = u.id_ubi inner join cultivo c on z.id_cultivo = c.id_cultivo inner join suelo s on z.id_suelo = s.id_suelo inner join compuesto k on z.id_comp = k.id_comp where z.estado = 1 and z.id_zona=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}
    
} // zona