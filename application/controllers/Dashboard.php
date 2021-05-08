<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Dashboard_model");
		if (!$this->session->userdata("login")) {
		redirect(base_url());
		}
	}
	public function index()
	{
        $data = array(
            'viaje' => $this->Dashboard_model->viajes(),
            'registros' => $this->Dashboard_model->rowCount("registros"),
            'observacion' => $this->Dashboard_model->rowCount("observacion"),
            'cultivo' => $this->Dashboard_model->rowCount("cultivo"),
            'zona' => $this->Dashboard_model->rowCount("zona"),
        );
        
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard",$data);
		$this->load->view("layouts/footer");

	}

	public function sincro(){
		if ($this->Dashboard_model->sincro()) {
	  		redirect(base_url()."dashboard");
	  }else{
	  		$this->session->set_flashdata("error","No se pudo exportar la informacion");
	  		redirect(base_url()."dashboard");
	  }
	}

	public function getData(){
			$viaje = $this->input->post("viaje");
			$resultados = $this->Dashboard_model->info($viaje);
			echo json_encode($resultados);
	}

	public function getData2(){
			$viaje = $this->input->post("viaje");
			$resultados = $this->Dashboard_model->info2($viaje);
			echo json_encode($resultados);
	}
    // mysql -h localhost -u root -p
} // Dashboard
