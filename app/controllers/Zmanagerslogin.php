<?php 
require 'Authenticationlogin.php';

class Zmanagerslogin extends Authenticationlogin{
    public $tokenKey = 'token_admin';
  	public $redirectURL = 'dashboard/admin';
}

?>
