<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model("Usuarios_model");
    $this->load->helper("array");
   /* $this->permisos = $this->backend_lib->control();
    
      if (!$this->session->userdata("login")) {
		    redirect(base_url());
    } */
  }

	public function index(){
        $data  = array(
            'usuarios' => $this->Usuarios_model->getuser(),);
        
        $this->load->view("layouts/header");
	    $this->load->view("layouts/aside");
        $this->load->view("admin/usuarios/lista_usuario",$data);
	    $this->load->view("layouts/footer");
	}

  public function addHtml(){
   /* if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */

    $data=array(
        'roles'=>$this->Usuarios_model->get_roles(),
    ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/usuarios/add_usuario",$data);
	$this->load->view("layouts/footer");
  }

  public function store(){
    /*if(! $this->permisos->insert){
        redirect(base_url()); return;
    } */
    
  	$nombres = $this->input->post("nombres");
    $nombres = trim($nombres); // quitar espacios
  	$nombres = strtoupper($nombres); // convertir a mayusculas
    if ($nombres == '') {
  			$nombres = null;
  	}
      
  	$apellidos = $this->input->post("apellidos");
    $apellidos = trim($apellidos); // quitar espacios
    $apellidos = strtoupper($apellidos); // convertir a mayusculas
  	if ($apellidos == '') {
  			$apellidos = null;
  	}
      
    $telefono = $this->input->post("telefono");
  	$username = $this->input->post("login");
    $username = trim($username);
  	
    if ($username == '') {
  			$username = null;
  	}
  	
    $password = $this->input->post("password");
    $rol_id = $this->input->post("id_rol");
    
  	$data  = array(
        'id_user' => $this->Usuarios_model->getID(),
  		'nombres' => $nombres,
        'apellidos' => $apellidos,
        'telefono' => $telefono,
  		'login' => $username,
        'password' => $password,
        'id_rol' => $rol_id,
    );

  	if ($this->Usuarios_model->save($data)) {
  			redirect(base_url()."mantenimiento/Usuario");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
  		redirect(base_url()."mantenimiento/usuarios/add_usuario");
  	}
  }

  public function editHtml($id){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
      $data  = array(
          'usuarios' => $this->Usuarios_model->getRow($id),
          'roles'=>$this->Usuarios_model->get_roles(),
      ); 

    $this->load->view("layouts/header");
	$this->load->view("layouts/aside");
    $this->load->view("admin/usuarios/edit_usuario",$data);
	$this->load->view("layouts/footer");
  }

  public function edit(){
   /* if(! $this->permisos->update){
        redirect(base_url()); return;
    } */
    
    $id = $this->input->post("id_user");
  	$nombres = $this->input->post("nombres");
    $nombres = trim($nombres); // quitar espacios
  	$nombres = strtoupper($nombres); // convertir a mayusculas
    if ($nombres == '') {
      $nombres = null;
  	}
      
  	$apellidos = $this->input->post("apellidos");
    $apellidos = trim($apellidos); // quitar espacios
    $apellidos = strtoupper($apellidos); // convertir a mayusculas
  	if ($apellidos == '') {
  		$apellidos = null;
  	}
    $telefono = $this->input->post("telefono");
  	$username = $this->input->post("login");
    $username = trim($username);
  	if ($username == '') {
        $username = null;
  	}
  	$password = $this->input->post("password");
    $rol_id = $this->input->post("id_rol");

  	$data  = array(
        'nombres' => $nombres,
        'apellidos' => $apellidos,
        'telefono' => $telefono,
  		'login' => $username,
        'password' => $password,
        'id_rol' => $rol_id,
    );
  	
    if ($this->Usuarios_model->update_user($id, $data)) {
  		redirect(base_url()."mantenimiento/usuario");
  	}else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/usuario/edit");
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
      
      if ($this->Usuarios_model->update_user($id, $data)) {
  		redirect(base_url()."mantenimiento/usuario");
  	 }else{
  		$this->session->set_flashdata("error","No se pudo guardar la informacion");
        redirect(base_url()."mantenimiento/usuario/lista_usuario");
  	}
  }
    
}// Usuario
