<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cedis extends CI_Controller {

  public function __construct(){
    parent::__construct();
    //$this->permisos = $this->backend_lib->control();
    //$this->load->model("Cedis_model");
    $this->permisos = $this->backend_lib->control();
    if (!$this->session->userdata("login")) {
		    redirect(base_url());
		}
	}

	public function index(){
    /*$data  = array(
			             'permisos' => $this->UPermisos_model->getPermisos(),
                 );*/
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("cedis/add");
		$this->load->view("layouts/footer");
	}

  public function store(){
    if(! $this->permisos->insert){

           redirect(base_url()); return;

       }

    $descripcion = $this->input->post("nombre");
    $descripcion = strtoupper($descripcion);
    $descripcion = trim($descripcion);
    if ($descripcion == '') {
      $descripcion = null;
    }

    $config['upload_path'] = '/var/www/html/distribucion/fotos/';
    $config['allowed_types'] = '*';
    //$config['file_name'] = $descripcion;
    //$config['max_size'] = '15000';

    $this->load->library('upload',$config);
    if ($this->upload->do_upload("foto")) {
      $file = $this->upload->data();
      $this->mini($file['file_name']);
      $foto = $file['file_name'];
    }else {
      $foto = 'default.jpg';
      //$foto = 'no';
    }

  /*  $data  = array(
          'codigo_blister' => $codigo_blister,
          'descripcion' => $descripcion,
          'foto_blister' => $foto,
        );

    if ($this->Blister_model->save($data)) {
          redirect(base_url()."articulos/blister");
    }else{
          $this->session->set_flashdata("error","No se pudo guardar la informacion");
          redirect(base_url()."articulos/blister/add");
    }*/
  }


  public function mini($file_name){
		$config['image_library'] = 'gd2';
		$config['source_image'] = '/var/www/html/distribucion/fotos/'.$file_name;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		//$config['new_image'] = './json/enviados/blister/';
		//$config['file_name'] = $codigo;
		$config['width'] = 600;
		$config['height'] = 600;

		$this->load->library('image_lib',$config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
	}

}
