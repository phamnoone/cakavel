<?php
require 'Zmanagers.php';

class Managers extends Zmanagers{
    const COST_TIME = 3600;

  	function login () {
      if (!empty($_SESSION['token_admin'])) {
          header("Location: /dashboard/admin");
      }
      $message = '';
        if ($this->method === 'POST') {
            $userAdmin = $this->data;
            $this->model('AdministratorsModel');
            $password = sha1($userAdmin['password']);
            if ($this->AdministratorsModel->checkLogin($userAdmin['username'], $password)) {
                $tokenAdmin = sha1(''.$userAdmin['username'].$userAdmin['password'].time());
                $_SESSION['token_admin'] = $tokenAdmin;
                $_SESSION['username'] = $userAdmin['username'];
                if (isset($_POST['checklogin'])) {
                    setcookie('token_admin',$tokenAdmin,time()+self::COST_TIME);
                    $this->AdministratorsModel->insertToken($tokenAdmin,$userAdmin['username']);
                }
                header("Location: /dashboard/admin");
            } else {
                $message = "Đăng nhập không thành công !";
            }
        }
      $this->view('template/login/header');
      $this->view('main/login',[
          'message' => $message
      ]);
      $this->view('template/login/footer');
    }
}

?>