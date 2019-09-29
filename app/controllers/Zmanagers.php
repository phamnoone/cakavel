<?php 
class Zmanagers extends Controller{
  /*
  * http://localhost/
  */
  function afterRender() {
    if(isset($_SESSION['token_admin'])){
      
    } else {
          header("Location: /managers/login");
    }
  }

}

?>