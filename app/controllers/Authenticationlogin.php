<?php
class Authenticationlogin extends Controller {
    public $tokenKey = '';
    public $redirectURL = '';
  
  	function beforeRender(){
  	  if($this->checkCookies()){
  	      header('Location: /'.$this->redirectURL);
 	  }
	}

  	private function checkCookies(){
  	  if(empty($_COOKIE[$this->tokenKey]) == false){
  	      $this->model('AdministratorsModel');
          return $this->AdministratorsModel->checkToken($_COOKIE[$this->tokenKey]);
  	  }
  	}
}

?>