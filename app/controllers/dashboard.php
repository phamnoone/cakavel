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

    function student () {

    }

    function teacher () {
      $this->view('template/teachers/header');
      $this->view('main/teachers');
      $this->view('template/teachers/footer');
    }

    function phen () {
      $this->view('template/students/header');
      $this->view('main/students');
      $this->view('template/students/footer');
    }
}

?>