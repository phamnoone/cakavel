<?php
class Authentication extends Controller {
  public $tokenKey;
  
  function beforeRender(){

  }

  private function checkPermisson(){
  	if (isset($_SESSION["$this->tokenKey"])){
  	    return true;
  	}
  	return flase;
  }
}

?>