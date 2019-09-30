<?php 
require 'Authentication.php';
class Zmanagers extends Authentication{
  /*
  * http://localhost/
  */
  function __construct(){
    $this->tokenKey = "token_admin";
  }
}

?>