<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class zona extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("zona_model");
    $this->load->model("ubicacion_model");
    $this->load->model("cultivo_model"); 
    $this->load->model("suelo_model");
    $this->load->model("compuesto_model");
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'zona' => $this->zona_model->getzona(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/zona/lista_zona",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
    $data=array(
            'ubicacion'=>$this->ubicacion_model->getubi(),
            'cultivo' => $this->cultivo_model->getcult(),
            'suelo' => $this->suelo_model->getsue(),
            'compuesto' => $this->compuesto_model->getcomp(),
    ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/zona/add_zona",$data);
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
    
    $nom_zona = $this->input->post("nom_zona");
    $nom_zona = trim($nom_zona); // quitar espacios
    $nom_zona = strtoupper($nom_zona); // convertir a mayusculas  
  	$id_ubi = $this->input->post("id_ubi");
    $id_cultivo = $this->input->post("id_cultivo");
    $id_suelo = $this->input->post("id_suelo");
    $id_comp = $this->input->post("id_comp");
    $fec_inicio = $this->input->post("fec_inicio");
      
  	$data  = array(
        'id_zona' => $this->zona_model->getID(),
  		'nom_zona' => $nom_zona,
        'id_ubi' => $id_ubi,
        'id_cultivo' => $id_cultivo,
        'id_suelo' => $id_suelo,
        'id_comp' => $id_comp,
        'fec_inicio' => $fec_inicio,
    );

  	if ($this->zona_model->save($data)) {
  			redirect(base_url()."mantenimiento/zona");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/zona/add_zona");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
          'zona' => $this->zona_model->getRow($id),
          'ubicacion'=>$this->ubicacion_model->getubi(),
          'cultivo' => $this->cultivo_model->getcult(),
          'suelo' => $this->suelo_model->getsue(),
          'compuesto' => $this->compuesto_model->getcomp(),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/zona/edit_zona",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
      
    $id = $this->input->post("id_zona");
    $nom_zona = $this->input->post("nom_zona");
    $nom_zona = trim($nom_zona); // quitar espacios
    $nom_zona = strtoupper($nom_zona); // convertir a mayusculas  
  	$id_ubi = $this->input->post("id_ubi");
    $id_cultivo = $this->input->post("id_cultivo");
    $id_suelo = $this->input->post("id_suelo");
    $id_comp = $this->input->post("id_comp");
    $fec_inicio = $this->input->post("fec_inicio");
      
  	$data  = array(
  		'nom_zona' => $nom_zona,
        'id_ubi' => $id_ubi,
        'id_cultivo' => $id_cultivo,
        'id_suelo' => $id_suelo,
        'id_comp' => $id_comp,
        'fec_inicio' => $fec_inicio,
    );
 
    if ($this->zona_model->update_zona($id,$data)) {
  		redirect(base_url()."mantenimiento/zona");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/zona/edit");
  	}
  }

  public function eliminar($id){
     /* if(! $this->permisos->delete){
          redirect(base_url()); return;
      } */
    
      $data  = array(
        'estado' => "0",
      );
      
      if ($this->zona_model->update_zona($id,$data)) {
  		redirect(base_url()."mantenimiento/zona");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/zona/lista_zona");
  	}
  }

   public function fec_cos_edit($id){ 
    $data  = array(
          'zona' => $this->zona_model->getRow($id),
      ); 

    $this->load->view("layouts/header");
      $this->load->view("layouts/aside");
      $this->load->view("admin/zona/add_fec_cos",$data);
      $this->load->view("layouts/footer");
  }

  public function upd_fec_cos(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
      
    $id = $this->input->post("id_zona");
    $fec_cosecha = $this->input->post("fec_cosecha");
      
    $data  = array(
      'fec_cosecha' => $fec_cosecha,
    );
 
    if ($this->zona_model->update_zona($id,$data)) {
      redirect(base_url()."mantenimiento/zona");
    }else{
      $this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/zona/edit");
    }
  }
    
}// zona
