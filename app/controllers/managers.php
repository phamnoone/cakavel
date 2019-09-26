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
            $mang = $this->data;
            $this->model('AdministratorsModel');
            $bool = $this->AdministratorsModel->checkLogin($mang['username'],$mang['password']);
            if ($bool) {

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