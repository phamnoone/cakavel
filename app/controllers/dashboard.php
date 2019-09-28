<?php
class Dashboard extends Controller{
    /*
     * http://localhost/
     */
    function index () {

    }

  	function admin () {
      if (isset($_SESSION['token']) ) {
          $this->view('template/managers/header');
          $this->view('main/managers');
          $this->view('template/managers/footer');
      } else {
          header("Location: /Managers/login");
      }
   
    }
}

?>