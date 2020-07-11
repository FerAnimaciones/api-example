<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see https://codeigniter.com/user_guide/general/urls.html
	*/
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Usuario'));
		$this->load->helper(array('url','headers'));
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function Lista($value='')
	{
		$data["total"]=0;
		$data["lista"]=$this->Usuario->GetUsers();
		if ($data["lista"]) {
			$data["total"]=count($data["lista"]);
		}
		$this->load->view('ci/lista',$data);
	}

	// --------------------------- AQUI INICIA VUEJS ----------------------------------------
	public function Vuejslista($value='')
	{
		$this->load->view('vuejs/lista');
	}
	public function Getlista($value='') {
		HeaderJson();
		switch ($this->input->method()) {
			case 'get':
			$response["total"]=0;
			$response["lista"]=$this->Usuario->GetUsers();
			if ($response["lista"]) {
				$response["total"]=count($response["lista"]);
			}
			echo json_encode($response);
			break;
			default:
			break;
		}
	}
	public function Save($value='') {
		HeaderJson();
		switch ($this->input->method()) {
			case 'post':
			$data_post= json_decode(file_get_contents('php://input'), true);
			//var_dumo($data_post); //<-- Con esto haces un debug a la variable. tambien puedes usar json para eso. <echo json_encode($data_post)>;
			$item=array(
				//'idusario' => 0, //No es necesario si es autoincrementable, contrario si fuera manual deberias calcular el siguiente.
				'usuario' => $data_post["usuario"],
				'contrasena' =>$data_post["password"] ,
			);
			$response["estatus"]=false;
			switch ($data_post["modo"] ) {
				case 0:
				$response["action"]="insert";
				if ($this->Usuario->Insert($item)) {
					$response["estatus"]=true;
				}
				break;
				case 1:
				$response["action"]="update";
				if ($this->Usuario->Update($item,$data_post["idusuario"])) { //Enviamos Item y id del post.
					$response["estatus"]=true;
				}
				break;
				default:
				$response["action"]="error";
				$response["estatus"]=false;
				break;
			}
			echo json_encode($response);
			break;
			default:
			break;
		}
	}
}
