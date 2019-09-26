<?php 
class Managers extends Controller{
    /*
     * http://localhost/
     */
    function index () {
        $this->view('template/header');
        $this->view('main/index');
        $this->view('template/footer');
    }

  	function login () {
      $message = '';
      $mang = $this->data;
      if (count($mang) == 0 ){

      }else {
          if ($this->method === 'POST') {
                $this->model('AdministratorsModel');
                $user = $this->AdministratorsModel->checkLogin($mang['username'],$mang['password']);
                if ($user) {

                }else {
                     $message = "Đăng nhập không thành công !";
                }
          }else {
            
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