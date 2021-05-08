<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function sincro(){
		$resultados = $this->db->query("select x2viajes.Exp_prov();");
		return $resultados->result();
	}

	public function viajes(){
		$this->db->select('id_zona,nom_zona');
		$resultados = $this->db->get('zona');
		return $resultados->result();
	}

	public function info($id){
		$resultados = $this->db->query("select temp_amb, temp_suelo, date(fechahora) as fecha, time(fechahora) as hora from registros where id_zona =$id");
		return $resultados->result();
	}

	public function rowCount($tabla){
			$resultados = $this->db->get($tabla);
			return $resultados->num_rows();
	}

	public function info2($id){
		$resultados = $this->db->query("select hume_amb, hume_suelo, date(fechahora) as fecha, time(fechahora) as hora from registros where id_zona =$id");
		return $resultados->result();
	}

}
