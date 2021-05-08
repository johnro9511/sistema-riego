<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function login($username, $password){
		//$sql = "select u.*,r.desc_rol as rol from usuarios u, roles r where u.id_rol=r.id_rol and u.login = 'juanro' and password = 'riego1' ;";
		//$resultados = $this->db->query($sql,array($username, $password));
		$this->db->select('u.*,r.desc_rol as rol');
		$this->db->from('usuarios u, roles r');
		$this->db->where("u.id_rol=r.id_rol");
		$this->db->where('u.login',$username);
		$this->db->where('u.password',$password);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function getuser(){
		$sql = "SELECT u.*,r.desc_rol FROM usuarios u, roles r where u.id_rol = r.id_rol and u.estado = 1 ORDER BY u.id_user ASC;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getRoles(){
		$sql = "SELECT * FROM roles;";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function get_rol($id){
    $data = array();
    $options = array('id_rol' => $id);
    $Q = $this->db->get('roles', $options, 1);
    if($Q->num_rows()> 0){
        $data = $Q->row_array();
    }
    $Q->free_result();
    return $data;
	}

	public function get_roles(){
    $data =array();
    $Q = $this->db->get('roles');
    if($Q->num_rows() > 0){
        foreach ($Q->result_array() as $row){
            $data[] = $row;
        }
    }
    $Q->free_result();
    return $data;
  }

	public function save($data){
		return $this->db->insert("usuarios",$data);
	}

	public function update_user($id,$data){
		$this->db->where("id_user",$id);
		return $this->db->update("usuarios",$data);
	}

	public function del_user($id){
    $this->db->where('id_user',$id);
    return $this->db->delete('usuarios');
  }

	public function getID(){
		$res = $this->db->select_max("id_user")->get("usuarios")->result_array();
		$x = 1+ $res[0]["id_user"];
		return (int) $x;
	}
    
	public function getRow($id){
		$sql = "SELECT u.*,r.desc_rol FROM usuarios as u inner join roles as r on u.id_rol=r.id_rol and u.estado = 1 and u.id_user=$id";
		$query = $this->db->query($sql);
		return $query->row();
	}
    
} // Usuarios_model
