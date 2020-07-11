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
    $query=$db_connection->query("select * from usuario order by idusuario asc");
    if ($query->num_rows() > 0) {
      return  $query->result();
    } else {
      return false;
    }
  }
  public function GetUser($user="")
  {
    $db_connection = $this->load->database("default", TRUE);
    $query=$db_connection->query("select * from usuario where idusuario = $user");
    if ($query->num_rows() > 0) {
      return  $query->row();
    } else {
      return false;
    }
  }
  public function Insert($data=null)
  {
    if ($data!=null) {
      $db_connection = $this->load->database("default", TRUE);
      $query=$db_connection->insert('usuario',$data);
      if ($db_connection->affected_rows()) {
        return  true;
      } else {
        return false;
      }
    }else{
      return false;
    }
  }
  public function Update($data=null,$idusuario=0)
  {
    if ($data!=null) {
      $db_connection = $this->load->database("default", TRUE);
      $db_connection->where("idusuario",$idusuario);
      $query=$db_connection->update('usuario',$data);
      if ($db_connection->affected_rows()) {
        return  true;
      } else {
        return false;
      }
    }else{
      return false;
    }
  }
}
