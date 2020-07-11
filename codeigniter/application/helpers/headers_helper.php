<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!function_exists('HeaderJson'))
{
  /**
  * This method send json header and CORS
  *
  * @param null Not have param
  *
  * @return void
  */
  function HeaderJson($value="")
  {
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Credentials: true');
    header("Access-Control-Allow-Methods: GET,OPTIONS,POST");
    header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept,Accept-Encoding , Content-Length,Authorization");
  }
}
