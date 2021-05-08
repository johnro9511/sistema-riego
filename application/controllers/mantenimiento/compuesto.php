<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compuesto extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("compuesto_model");
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'compuesto' => $this->compuesto_model->getcomp(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/compuesto/lista_compuesto",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/compuesto/add_compuesto");
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
      
  	$nom_comp = $this->input->post("nom_comp");
    $nom_comp = trim($nom_comp); // quitar espacios
    $nom_comp = strtoupper($nom_comp); // convertir a mayusculas
    $react1 = $this->input->post("react1");
    $react1 = trim($react1); // quitar espacios
    $react1 = strtoupper($react1); // convertir a mayusculas
    $react2 = $this->input->post("react2");
    $react2 = trim($react2); // quitar espacios
    $react2 = strtoupper($react2); // convertir a mayusculas  
    $react3 = $this->input->post("react3");
    $react3 = trim($react3); // quitar espacios
    $react3 = strtoupper($react3); // convertir a mayusculas
    $react4 = $this->input->post("react4");
    $react4 = trim($react4); // quitar espacios
    $react4 = strtoupper($react4); // convertir a mayusculas
    $react5 = $this->input->post("react5");
    $react5 = trim($react5); // quitar espacios
    $react5 = strtoupper($react5); // convertir a mayusculas
      
  	$data  = array(
        'id_comp' => $this->compuesto_model->getID(),
  		'nom_comp' => $nom_comp,
        'react1' => $react1,
        'react2' => $react2,
        'react3' => $react3,
        'react4' => $react4,
        'react5' => $react5,
    );

  	if ($this->compuesto_model->save($data)) {
  			redirect(base_url()."mantenimiento/compuesto");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/compuesto/add_compuesto");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
          'compuesto' => $this->compuesto_model->getRow($id),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/compuesto/edit_compuesto",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    $id = $this->input->post("id_comp");
    $nom_comp = $this->input->post("nom_comp");
    $nom_comp = trim($nom_comp); // quitar espacios
    $nom_comp = strtoupper($nom_comp); // convertir a mayusculas
    $react1 = $this->input->post("react1");
    $react1 = trim($react1); // quitar espacios
    $react1 = strtoupper($react1); // convertir a mayusculas
    $react2 = $this->input->post("react2");
    $react2 = trim($react2); // quitar espacios
    $react2 = strtoupper($react2); // convertir a mayusculas  
    $react3 = $this->input->post("react3");
    $react3 = trim($react3); // quitar espacios
    $react3 = strtoupper($react3); // convertir a mayusculas
    $react4 = $this->input->post("react4");
    $react4 = trim($react4); // quitar espacios
    $react4 = strtoupper($react4); // convertir a mayusculas
    $react5 = $this->input->post("react5");
    $react5 = trim($react5); // quitar espacios
    $react5 = strtoupper($react5); // convertir a mayusculas
      
  	$data  = array(
  		'nom_comp' => $nom_comp,
        'react1' => $react1,
        'react2' => $react2,
        'react3' => $react3,
        'react4' => $react4,
        'react5' => $react5,
    );

    if ($this->compuesto_model->update_comp($id, $data)) {
  		redirect(base_url()."mantenimiento/compuesto");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/compuesto/edit");
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
      
      if ($this->compuesto_model->update_comp($id, $data)) {
  		redirect(base_url()."mantenimiento/compuesto");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/compuesto/lista_compuesto");
  	}
  }
    
}// compcompuesto
