<?php 
require 'Authentication.php';

class Zmanagers extends Authentication{
    public $tokenKey = 'token_admin';
  	public $redirectURL = 'dashboard/login';
}

?>