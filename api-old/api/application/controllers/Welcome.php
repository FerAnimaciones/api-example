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
	public function Lista($value='') {
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
			case 'post':
			$response["post"]=json_decode(file_get_contents('php://input'), true);
			$response["total"]=0;
			echo json_encode($response);
			break;
			default:
			break;
		}
	}
}
