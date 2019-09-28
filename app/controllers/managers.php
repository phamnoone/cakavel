<?php
class Managers extends Controller{
    /*
     * http://localhost/
     */
    function index () {
      $this->login();
    }

  	function login () {
      $message = '';
        if ($this->method === 'POST') {
            $userAdmin = $this->data;
            $this->model('AdministratorsModel');
            if ($this->AdministratorsModel->checkLogin($userAdmin['username'], $userAdmin['password'])) {
                $token = sha1(''.$userAdmin['username'].$userAdmin['password'].time());
                $_SESSION['token'] = $token;
                $this->AdministratorsModel->insertToken($token, $userAdmin['username']);
                header("Location: /dashboard/admin");
            } else {
                $message = "Đăng nhập không thành công !";
            }
        }
      $this->view('template/login/footer');
      $this->view('main/login',[
          'message' => $message
      ]);
      $this->view('template/login/header');
    }
}

?>