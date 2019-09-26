<?php 
class Managers extends Controller{
    /*
     * http://localhost/
     */
    function index () {
    }

  	function login () {
      $message = '';
        if ($this->method === 'POST') {
            $userAdmin = $this->data;
            $this->model('AdministratorsModel');
            if ($this->AdministratorsModel->checkLogin($userAdmin['username'],$userAdmin['password'])) {

            }else {
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