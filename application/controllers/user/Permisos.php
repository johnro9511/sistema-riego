<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

private $permisos;
  public function __construct(){
    parent::__construct();
    //$this->permisos = $this->backend_lib->control();
    $this->load->model("UPermisos_model");
    $this->load->model("Usuarios_model");
    // $this->permisos = $this->backend_lib->control();
   /* if (!$this->session->userdata("login")) {
		    redirect(base_url());
		} */
	}

	public function index(){
    $data  = array(
		  'permisos' => $this->UPermisos_model->getPermisos(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/UPermisos/list",$data);
		$this->load->view("layouts/footer");
	}

  public function add(){
   /* if(! $this->permisos->insert){

					 redirect(base_url()); return;

			 } */

    $data  = array(
                    'roles' => $this->Usuarios_model->getRoles(),
                    'menus' => $this->UPermisos_model->getMenus(),
                  );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/UPermisos/add",$data);
    $this->load->view("layouts/footer");
  }

  public function store(){
  /* if(! $this->permisos->insert){

					 redirect(base_url()); return;

			 }*/

    //$idpermiso = $this->input->post("idpermiso");
    $menu = $this->input->post("idmenu");
    $idrol = $this->input->post("id_rol");
    $read = $this->input->post("read");
    $insert = $this->input->post("insert");
    $update = $this->input->post("update");
    $delete = $this->input->post("delete");
    $data = array(
                  "idpermiso" =>$this->UPermisos_model->getN(),
                  "idmenu" => $menu,
                  "id_rol" => $idrol,
                  "reader" => $read,
                  "inserter" => $insert,
                  "updater" => $update,
                  "deleter" => $delete,
                );
    if ($this->UPermisos_model->save($data)) {
        redirect(base_url()."user/permisos");
    }else{
        $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."user/permisos");
    }
  }

  public function edit($id){
   /* if(! $this->permisos->update){

					 redirect(base_url()); return;

			 } */
    $data = array(
                  'permiso' => $this->UPermisos_model->getPer($id),
                );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/UPermisos/edit",$data);
    $this->load->view("layouts/footer");
  }

  public function update(){
   /* if(! $this->permisos->update){

					 redirect(base_url()); return;

			 } */
    $id = $this->input->post("idpermiso");
    $leer = $this->input->post("read");
    $insertar = $this->input->post("insert");
    $actualizar = $this->input->post("update");
    $borrar = $this->input->post("delete");
    $data  = array(
  	               'reader' => $leer,
                   'inserter' => $insertar,
  	               'updater' => $actualizar,
  	               'deleter' => $borrar,
                 );
    if ($this->UPermisos_model->update($id,$data)) {
  	    redirect(base_url()."user/permisos");
    }else{
  	    $this->session->set_flashdata("error","No se pudo actualizar la informacion");
  	    redirect(base_url()."user/permisos/edit/".$id);
    }
  }

  public function delete($id){
    /*  if(! $this->permisos->delete){

					 redirect(base_url()); return;

			 } */
	  //$id = $this->input->post('idpermiso',true);
	  $this->UPermisos_model->delete($id);
	  echo "user/permisos";
  }

  public function addrol(){
    /* if(! $this->permisos->insert){

					 redirect(base_url()); return;

			 } */
    //$idpermiso = $this->input->post("idpermiso");
    $rol = $this->input->post("rol");
    $data = array(
                  "id_rol" => $this->UPermisos_model->getId(),
                  "desc_rol" => $rol,
                );
    if ($this->UPermisos_model->saverol($data)) {
        redirect(base_url()."user/permisos");
    }else{
        $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."user/permisos");
    }
  }

}
