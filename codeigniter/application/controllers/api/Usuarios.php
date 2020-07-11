<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model(array('Usuario'));
		$this->load->helper(array('url','headers'));
	}
	// http://localhost/api-example/codeigniter/index.php/welcome/
	public function index()
	{

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
				case 2:
				$response["action"]="delete";
				if ($this->Usuario->Delete($data_post["idusuario"])) {
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
