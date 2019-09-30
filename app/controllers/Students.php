<?php
class Students extends Controller{
    /*
     * http://localhost/
     */
  	function login () {
      $message = '';
        if ($this->method === 'POST') {
            $userStudent = $this->data;
            $this->model('StudentsModel');
            if ($this->StudentsModel->checkLogin($userStudent['username'], $userStudent['password'])) {
                session_start();
                $tokenStudent = sha1(''.$userStudent['username'].$userStudent['password'].time());
                $_SESSION['token_student'] = $tokenStudent;
                $_SESSION['permission'] = 2;
                header("Location: /dashboard/student");
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