<?php
class Authentication extends Controller {
  $tokenKey;

  function beforeRender(){

  }

  function checkPermisson(){
  	if ($_SESSION("$this->tokenKey")){
  	    return true;
  	}
  	return flase;
  }
}

?>