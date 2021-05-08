<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class observacion_model extends CI_Model {

	public function getobs(){
		$sql = "select o.*,z.nom_zona,u.desc_ubi,date(o.fec_obs) as fecha,time(o.fec_obs) as hora from observacion o inner join zona z on o.id_zona = z.id_zona inner join ubicacion u on o.id_ubi = u.id_ubi;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function save($data){
		return $this->db->insert("observacion",$data);
	}

	public function update_comp($id,$data){
		$this->db->where("id_obs",$id);
		return $this->db->update("observacion",$data);
	}

	public function getID(){
		$res = $this->db->select_max("id_obs")->get("observacion")->result_array();
		$x = 1+ $res[0]["id_obs"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "select o.*,z.nom_zona,u.desc_ubi,date(o.fec_obs) as fecha,time(o.fec_obs) as hora from observacion o inner join zona z on o.id_zona = z.id_zona inner join ubicacion u on o.id_ubi = u.id_ubi and id_obs=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}

    public function getcultivo($id1,$id2){
		$sql = "select c.desc_cultivo as cultivo from cultivo c inner join zona z where c.id_cultivo = z.id_cultivo and z.id_zona = $id1 and z.id_ubi = $id2";
		$query = $this->db->query($sql);
		return $query->row();
	}
} // observacion