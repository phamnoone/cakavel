<?php
class Dashboard extends Controller{
    /*
     * http://localhost/
     */
  	function admin () {
      if ($this->beforeRender()) {
          $this->view('template/managers/header');
          $this->view('main/managers');
          $this->view('template/managers/footer');
      } else {
          header("Location: /managers/login");
      }
   
    }
}

?>