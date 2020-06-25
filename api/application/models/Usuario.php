<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*
* @author
* @copyright	Copyright (c) 2018-2020, British Columbia Institute of Technology (http://bcit.ca/)
*/
class Usuario extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  public function GetUsers($v="")
  {
    $db_connection = $this->load->database("default", TRUE);
    $query=$db_connection->query("select * from usuarios oder by idusuario asc");
    if ($query->num_rows() > 0) {
      return  $query->result();
    } else {
      return false;
    }
  }
  public function GetUser($user="")
  {
    $db_connection = $this->load->database("default", TRUE);
    $query=$db_connection->query("select * from usuarios where idusuarios = $user");

    if ($query->num_rows() > 0) {
      return  $query->row();
    } else {
      return false;
    }
  }
}
