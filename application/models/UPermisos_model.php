<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UPermisos_model extends CI_Model {

  public function getPermisos(){
    $this->db->select("p.*,m.nombre as menu ,r.desc_rol as roles");
    $this->db->from("permisos p");
    $this->db->join("roles r","p.id_rol = r.id_rol");
    $this->db->join("menus m","p.idmenu = m.idmenu");
	  $query = $this->db->get();
	  return $query->result();
  }

  public function getPer($id){
    $resultado = $this->db->query("select p.*,r.desc_rol as rol,m.nombre as menu from permisos as p
                                   inner join roles as r on p.id_rol=r.id_rol
                                   inner join menus as m on p.idmenu=m.idmenu and p.idpermiso=$id");
    return $resultado->row();
  }

  public function getMenus(){
    $resultados = $this->db->get("menus");
    return $resultados->result();
  }

  public function save($data){
    return $this->db->insert("permisos",$data);
  }

  public function getN(){
    $res = $this->db->select_max("idpermiso")->get("permisos")->result_array();
    if (empty($res)) {
        $x="1";
        return (int) $x;
    }else {
        $x = 1+ $res[0]["idpermiso"];
        return (int) $x;
      }
  }

  public function update($id,$data){
    $this->db->where("idpermiso",$id);
    return $this->db->update("permisos",$data);
  }

  public function delete($id){
    $this->db->where('idpermiso',$id);
    return $this->db->delete('permisos');
  }

  public function getId(){
    $res = $this->db->select_max("id_rol")->get("roles")->result_array();
		if (empty($res)){
			 $x = "1";
			return (int) $x;

		}else {
				$x = 1+ $res[0]["id_rol"];
				return (int) $x;
		}
  }

  public function saverol($data){
    return $this->db->insert("roles",$data);
  }

}
