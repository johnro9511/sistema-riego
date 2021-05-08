<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {

    public function getid($link){
        $this->db->like("link",$link);
        $resultado = $this->db->get("menus");
        return $resultado->row();
    }

    public function getpermisos($menu,$rol){
        $this->db->where("idmenu",$menu);
        $this->db->where("id_rol",$rol);
        $resultado = $this->db->get("permisos");
        return $resultado->row();
    }

}
