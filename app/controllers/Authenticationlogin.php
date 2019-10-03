<?php
class Authenticationlogin extends Controller {
    public $tokenKey = '';
    public $redirectURL = '';
  
  	function beforeRender(){
  	  if($this->checkCookies() == false){
  	      header('Location: /'.$this->redirectURL);
 	  }
	}

  	private function checkCookies(){
          return empty($_COOKIE[$this->tokenKey]);
  	}
}

?>