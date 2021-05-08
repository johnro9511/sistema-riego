<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cultivo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("cultivo_model");
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'cultivo' => $this->cultivo_model->getcult(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/cultivo/lista_cultivo",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/cultivo/add_cultivo");
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
    
  	$desc_cultivo = $this->input->post("desc_cultivo");
    $desc_cultivo = trim($desc_cultivo); // quitar espacios
    $desc_cultivo = strtoupper($desc_cultivo); // convertir a mayusculas
  	$duracion = $this->input->post("duracion");
    $duracion = trim($duracion); // quitar espacios
    $duracion = strtoupper($duracion); // convertir a mayusculas
      
  	$data  = array(
        'id_cultivo' => $this->cultivo_model->getID(),
  		'desc_cultivo' => $desc_cultivo,
        'duracion' => $duracion,
    );

  	if ($this->cultivo_model->save($data)) {
  			redirect(base_url()."mantenimiento/cultivo");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/cultivo/add_cultivo");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
          'cultivo' => $this->cultivo_model->getRow($id),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/cultivo/edit_cultivo",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    $id = $this->input->post("id_cultivo");
    $desc_cultivo = $this->input->post("desc_cultivo");
    $desc_cultivo = trim($desc_cultivo);
    $desc_cultivo = strtoupper($desc_cultivo);
  	$duracion = $this->input->post("duracion");
    $duracion = trim($duracion);
    $duracion = strtoupper($duracion);
      
  	$data  = array(
  		'desc_cultivo' => $desc_cultivo,
        'duracion' => $duracion,
    );

    if ($this->cultivo_model->update_cult($id, $data)) {
  		redirect(base_url()."mantenimiento/cultivo");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/cultivo/edit");
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
      
      if ($this->cultivo_model->update_cult($id, $data)) {
  		redirect(base_url()."mantenimiento/cultivo");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/cultivo/lista_cultivo");
  	}
  }
    
}// cultivo
