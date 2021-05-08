<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class observacion extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("observacion_model");
    $this->load->model("zona_model");
    $this->load->model("ubicacion_model");
    $this->load->model("cultivo_model");
    // $this->load->helper("array");
      
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'observacion' => $this->observacion_model->getobs(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/observacion/lista_observacion",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
      $data  = array(
        'zona' => $this->zona_model->getzona(),
        'ubicacion'=>$this->ubicacion_model->getubi(),
        'cultivo'=>$this->cultivo_model->getcult(),
      );
      
    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/observacion/add_observacion",$data);
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
     
      $foto_zona = 'foto_zona';
      $config['upload_path'] = './evidencias/';
      $config['allowed_types'] = '*';
      $config['max_size'] = '0'; // 15 MB 
      $config['max_width'] = '0';
      $config['max_height'] = '0';
      $config['overwrite'] = TRUE;
      $config['remove_spaces']= TRUE;

      $this->load->library('upload',$config);
      $this->upload->do_upload($foto_zona);
      $data = $this->upload->data();
        
      $imagenes=$data['file_name'];
        if (empty(imagenes)){
            $imagenes="default.png";
        }

      if(!$this->upload->do_upload($foto_zona)){
          $error= array('error' => $this->upload->display_errors());
          echo $this->upload->display_errors();
          print_r($error);
          return;
      }
        $data['uploadSuccess'] = $this->upload->data();
      
     
    $id_zona = $this->input->post("id_zona");
    $id_ubi = $this->input->post("id_ubi");
    $cultivo = $this->input->post("cultivo");  
    $desc_obs = $this->input->post("desc_obs");
    $desc_obs = trim($desc_obs); // quitar espacios
    $desc_obs = strtoupper($desc_obs); // convertir a mayusculas  
    $foto = $this->input->post("foto_zona");
      
    $usuario = $this->session->userdata("nombres");
      
  	$data  = array(
        'id_obs' => $this->observacion_model->getID(),
        'id_zona' => $id_zona,
        'id_ubi' => $id_ubi,
        'desc_obs' => $desc_obs,
        'cultivo' => $cultivo,
        'foto_zona' => $imagenes,
        'usuario' => $usuario,
    );

  	if ($this->observacion_model->save($data)) {
  			redirect(base_url()."mantenimiento/observacion");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/observacion/add_observacion");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
        'observacion' => $this->observacion_model->getRow($id),
        'zona' => $this->zona_model->getzona(),
        'ubicacion'=>$this->ubicacion_model->getubi(),
        'cultivo'=>$this->cultivo_model->getcult(),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/observacion/edit_observacion",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
      
      $foto_zona = 'foto_zona';
      $config['upload_path'] = './evidencias/';
      $config['allowed_types'] = '*';
      $config['max_size'] = '0'; // 15 MB
      $config['max_width'] = '0';
      $config['max_height'] = '0';
      $config['overwrite'] = TRUE;
      $config['remove_spaces']= TRUE;

      $this->load->library('upload',$config);
      $this->upload->do_upload($foto_zona);
      $data = $this->upload->data();
        
      $imagenes=$data['file_name'];
        if (empty(imagenes)){
            $imagenes="default.png";
        }

      if(!$this->upload->do_upload($foto_zona)){
          $error= array('error' => $this->upload->display_errors());
          echo $this->upload->display_errors();
          print_r($error);
          return;
      }
        $data['uploadSuccess'] = $this->upload->data();
      
    $id = $this->input->post("id_obs");
    $id_zona = $this->input->post("id_zona");
    $id_ubi = $this->input->post("id_ubi");
    $cultivo = $this->input->post("cultivo");  
    $desc_obs = $this->input->post("desc_obs");
    $desc_obs = trim($desc_obs); // quitar espacios
    $desc_obs = strtoupper($desc_obs); // convertir a mayusculas  
    $foto = $this->input->post("foto_zona");
      
    $usuario = $this->session->userdata("nombres");
      
  	$data  = array(
        'id_obs' => $this->observacion_model->getID(),
        'id_zona' => $id_zona,
        'id_ubi' => $id_ubi,
        'desc_obs' => $desc_obs,
        'cultivo' => $cultivo,
        'foto_zona' => $imagenes,
        'usuario' => $usuario,
    );

    if ($this->observacion_model->update_comp($id,$data)) {
  		redirect(base_url()."mantenimiento/observacion");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/observacion/edit");
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
      
      if ($this->observacion_model->update_comp($id, $data)) {
  		redirect(base_url()."mantenimiento/observacion");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/observacion/lista_observacion");
  	}
  }
    
    public function view($id){
        $data  = array(
        'observacion' => $this->observacion_model->getRow($id),);
		$this->load->view("admin/observacion/view",$data);
	}
    
}// OBSERVACION
