<?php
class Authentication extends Controller {
  public $tokenKey = '';
  public $redirectURL = '';
  
  function beforeRender(){
  	if($this->checkPermisson()){

  	} else {
  	  		header('Location: /'.$this->redirectURL);
  	}
  }

  private function checkPermisson(){
    return empty($_SESSION[$this->tokenKey]);
  }

}

?>