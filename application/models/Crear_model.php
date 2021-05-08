<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crear_model extends CI_Model {

	public function getViaje(){
		$resultados = $this->db->query("select id_viaje,desc_clave,fecha,desc_broker,usuario
from x2viajes.viaje as a inner join x2viajes.broker as b on a.id_broker=b.id_broker
inner join x2viajes.dispositivo as c on a.id_dispositivo=c.id_dispositivo");
		return $resultados->result();
	}

	public function getCns($id){
		$resultados = $this->db->query("select count(id_broker) as cns from x2viajes.viaje where id_broker=$id");
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("x2viajes.viaje",$data);
	}

	public function delete($id){
 		$this->db->where("id_viaje",$id);
 		return $this->db->delete("x2viajes.viaje");
 	}

 	public function getV($id){
		$resultados = $this->db->query("select id_viaje,desc_clave,fecha,pais,a.id_broker,desc_broker,cns_item,a.id_dispositivo,usuario,clave
 from x2viajes.viaje as a inner join x2viajes.broker as b on a.id_broker=b.id_broker
 inner join x2viajes.dispositivo as c on a.id_dispositivo=c.id_dispositivo and a.id_viaje=$id");
	 return $resultados->row();
 	}

	public function getBro(){
		$resultados = $this->db->query("select * from x2viajes.broker where id_broker!=0;");
		return $resultados->result();
	}

	public function getBrok($id){
		$this->db->where("id_broker",$id);
		$resultados = $this->db->get("x2viajes.broker");
		return $resultados->row();
	}


 	public function update($id,$data){
 		$this->db->where("id_viaje",$id);
 		return $this->db->update("x2viajes.viaje",$data);
 	}

	public function getMov()
	{
		$resultados = $this->db->get("x2viajes.dispositivo");
		return $resultados->result();
	}

 	public function getID(){
		$res = $this->db->select_max("id_viaje")->get("x2viajes.viaje")->result_array();
		if (empty($res)){
			 $x = "1";
			return (int) $x;
		}else {
				$x = 1+ $res[0]["id_viaje"];
				return (int) $x;
		}
	}

}
//////////////////////////
