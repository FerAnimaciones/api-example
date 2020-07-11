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
			$this->load->view('ci/formulario');
		}else{

		}
	}
	public function Vuejslista($value='')
	{
		$this->load->view('vuejs/lista');
	}
}
