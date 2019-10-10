<?php
require 'Zmanagers.php';

class Dashboard extends Zmanagers{

  function admin () {
    $this->view('template/managers/header');
    $this->view('main/managers',[
        'admin' => $_SESSION['username']
    ]);
    $this->view('template/managers/footer');
  }

  function logout() {
    $this->model('AdministratorsModel');
    $this->AdministratorsModel->insertToken(NULL,$_SESSION['username']);
    unset($_SESSION['token_admin']);
    unset($_SESSION['username']);
    header("Location: /managers/login");
  }

  function infor(){
    $this->model('AdministratorsModel');
    $this->AdministratorsModel->infor($_SESSION['username']);
  }
}

?>