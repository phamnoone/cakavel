<?php
require 'Zmanagers.php';
class Dashboard extends Zmanagers{
    /*
     * http://localhost/
     */
  	function admin () {
      $this->view('template/managers/header');
      $this->view('main/managers');
      $this->view('template/managers/footer');
    }
}

?>