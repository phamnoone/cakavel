<?php 
class Zmanagers extends Controller{
  /*
  * http://localhost/
  */
  function beforeRender() {
    if(isset($_SESSION('token_admin'))){
        return true;
  	} 
  	return false;
  }
}

?>