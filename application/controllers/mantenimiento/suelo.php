<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suelo extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("suelo_model");
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'suelo' => $this->suelo_model->getsue(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/suelo/lista_suelo",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/suelo/add_suelo");
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
      
  	$densidad = $this->input->post("densidad");
    $densidad = trim($densidad); // quitar espacios
    $materia_org = $this->input->post("materia_org");
    $materia_org = trim($materia_org); // quitar espacios
    $arcilla = $this->input->post("arcilla");
    $arcilla = trim($arcilla); // quitar espacios
    $arena = $this->input->post("arena");
    $arena = trim($arena); // quitar espacios
    $limo = $this->input->post("limo");
    $limo = trim($limo); // quitar espacios
    $desc_suelo = $this->input->post("desc_suelo");
    $desc_suelo = trim($desc_suelo); // quitar espacios
    $desc_suelo = strtoupper($desc_suelo); // convertir a mayusculas
      
  	$data  = array(
        'id_suelo' => $this->suelo_model->getID(),
  		'densidad' => $densidad,
        'materia_org' => $materia_org,
        'arcilla' => $arcilla,
        'arena' => $arena,
        'limo' => $limo,
        'desc_suelo' => $desc_suelo,
    );

  	if ($this->suelo_model->save($data)) {
  			redirect(base_url()."mantenimiento/suelo");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/suelo/add_suelo");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
          'suelo' => $this->suelo_model->getRow($id),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/suelo/edit_suelo",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    $id = $this->input->post("id_suelo");
    $densidad = $this->input->post("densidad");
    $densidad = trim($densidad); // quitar espacios
    $materia_org = $this->input->post("materia_org");
    $materia_org = trim($materia_org); // quitar espacios
    $arcilla = $this->input->post("arcilla");
    $arcilla = trim($arcilla); // quitar espacios
    $arena = $this->input->post("arena");
    $arena = trim($arena); // quitar espacios
    $limo = $this->input->post("limo");
    $limo = trim($limo); // quitar espacios
    $desc_suelo = $this->input->post("desc_suelo");
    $desc_suelo = trim($desc_suelo); // quitar espacios
    $desc_suelo = strtoupper($desc_suelo); // convertir a mayusculas
 
  	$data  = array(
  		'densidad' => $densidad,
        'materia_org' => $materia_org,
        'arcilla' => $arcilla,
        'arena' => $arena,
        'limo' => $limo,
        'desc_suelo' => $desc_suelo,
    );

    if ($this->suelo_model->update_suelo($id, $data)) {
  		redirect(base_url()."mantenimiento/suelo");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/suelo/edit");
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
      
      if ($this->suelo_model->update_suelo($id, $data)) {
  		redirect(base_url()."mantenimiento/suelo");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/suelo/lista_suelo");
  	}
  }
    
}// cultivo
