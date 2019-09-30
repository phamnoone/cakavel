<?php 
require 'Authentication.php';
class Zmanagers extends Authentication{
  /*
  * http://localhost/
  */
  public $tokenKey = 'token_admin';
  public $redirectURL = 'managers/login';
}

?>