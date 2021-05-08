<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}

	public function index(){
		if ($this->session->userdata("login")) {
				redirect(base_url()."dashboard");
		}else{
				$this->load->view("admin/login");
		}
	}

	public function login(){
		$username = $this->input->post("username");
		$username = trim($username);
		$password = $this->input->post("password");
		$res = $this->Usuarios_model->login($username,$password);
		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			redirect(base_url()."Auth");
		}
		else{
            $data = array(
			'id_user' => $res->id_user,
            'nombres' => $res->nombres,
            'apellidos' => $res->apellidos,
			'id_rol' => $res->id_rol,
			'rol' => $res->rol,
			'login' => TRUE
											);
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
