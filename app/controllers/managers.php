<?php
class Managers extends Controller{
    const COST_TIME = 3600;

  	function login () {
      $message = '';
        if ($this->method === 'POST') {
            $userAdmin = $this->data;
            $this->model('AdministratorsModel');
            $password = sha1($userAdmin['password']);
            if ($this->AdministratorsModel->checkLogin($userAdmin['username'], $password)) {
                session_start();
                $tokenAdmin = sha1(''.$userAdmin['username'].$userAdmin['password'].time());
                $_SESSION['token_admin'] = $tokenAdmin;
                setcookie('username',$userAdmin['username'],time()+self::COST_TIME);
                setcookie('password',$userAdmin['password'],time()+self::COST_TIME);
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