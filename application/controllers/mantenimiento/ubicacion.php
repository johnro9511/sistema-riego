<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ubicacion extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("ubicacion_model");
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'ubicacion' => $this->ubicacion_model->getubi(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/ubicacion/lista_ubicacion",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/ubicacion/add_ubicacion");
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
    
  	$desc_ubi = $this->input->post("desc_ubi");
    $desc_ubi = trim($desc_ubi); // quitar espacios
    $desc_ubi = strtoupper($desc_ubi); // convertir a mayusculas
  	$tipo_zona = $this->input->post("tipo_zona");
    $tipo_zona = trim($tipo_zona); // quitar espacios
    $tipo_zona = strtoupper($tipo_zona); // convertir a mayusculas
      
  	$data  = array(
        'id_ubi' => $this->ubicacion_model->getID(),
  		'desc_ubi' => $desc_ubi,
        'tipo_zona' => $tipo_zona,
    );

  	if ($this->ubicacion_model->save($data)) {
  			redirect(base_url()."mantenimiento/ubicacion");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/ubicacion/add_ubicacion");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
          'ubicacion' => $this->ubicacion_model->getRow($id),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/ubicacion/edit_ubicacion",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    $id = $this->input->post("id_ubi");
    $desc_ubi = $this->input->post("desc_ubi");
    $desc_ubi = trim($desc_ubi);
    $desc_ubi = strtoupper($desc_ubi);
  	$tipo_zona = $this->input->post("tipo_zona");
    $tipo_zona = trim($tipo_zona);
    $tipo_zona = strtoupper($tipo_zona);
      
  	$data  = array(
  		'desc_ubi' => $desc_ubi,
        'tipo_zona' => $tipo_zona,
    );

    if ($this->ubicacion_model->update_ubi($id, $data)) {
  		redirect(base_url()."mantenimiento/ubicacion");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/ubicacion/edit");
  	}
  }

	/* public function view($id){
		$data  = array(
			'fincas' => $this->Categorias_model->getCategoria($id),
		);
		$this->load->view("admin/usuarios/view",$data);
	} */

  public function eliminar($id){
     /* if(! $this->permisos->delete){
          redirect(base_url()); return;
      } */
    
      $data  = array(
        'estado' => "0",
      );
      
      if ($this->ubicacion_model->update_ubi($id, $data)) {
  		redirect(base_url()."mantenimiento/ubicacion");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/ubicacion/lista_ubicacion");
  	}
  }
    
}// ubicacion
