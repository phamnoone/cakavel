<?php
class Teachers extends Controller{
    /*
     * http://localhost/
     */
  	function login () {
      $message = '';
        if ($this->method === 'POST') {
            $userTeacher = $this->data;
            $this->model('TeachersModel');
            if ($this->TeachersModel->checkLogin($userTeacher['username'], $userTeacher['password'])) {
                session_start();
                $tokenTeacher = sha1(''.$userTeacher['username'].$userTeacher['password'].time());
                $_SESSION['token_teacher'] = $tokenTeacher;
                $_SESSION['permission'] = 1;
                header("Location: /dashboard/teacher");
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