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
	// http://localhost/api-example/codeigniter/index.php/welcome/
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
	public function Formulario($id=0)
	{
		if ($id==0) {
			$data["usuario_data"] = array(
				'idusuario' =>0,
				'usuario'=>"",
				'contrasena'=>"",
			);
			$this->load->view('ci/formulario',$data);
		}else{
			$data["usuario_data"] = $this->Usuario->GetUser($id); // Retorna un objeto o un false, si es un false entra al else.
			if ($data["usuario_data"]) {
				$this->load->view('ci/formulario',$data);
			}else{
				redirect('/welcome/lista/'); // Si el id ingresado no existe lo regresamos a la lista.
			}
		}
	}
	public function Save($value='')
	{
		switch ($this->input->method()) {
			case 'post':
			$item=array(
				//'idusario' => 0, //No es necesario si es autoincrementable, contrario si fuera manual deberias calcular el siguiente.
				'usuario' => $this->input->post("usuario"),
				'contrasena' =>$this->input->post("contrasena"),
			);
			switch ($this->input->post("idusuario")) {
				case 0:
				if ($this->Usuario->Insert($item)) {
					redirect('/welcome/lista/'); // Sirve para regresar a la funcion de lista o cualquier funcion dentro de el controlado que se agrega.
				}else{

				}
				break;
				default:
				if ($this->Usuario->Update($item,$this->input->post("idusuario"))) { //Enviamos Item y id del post.
				}
				redirect('/welcome/lista/');
				break;
			}
			break;
		}
	}
	public function Vuejslista($value='')
	{
		$this->load->view('vuejs/lista');
	}
}
