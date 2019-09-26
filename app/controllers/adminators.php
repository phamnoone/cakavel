<?php 

class Adminators extends Controller{
    /*
     * http://localhost/
     */
    function index () {
        $this->view('template/header');
        $this->view('main/index');
        $this->view('template/footer');

    }

	function login () {
      $title= array(
        "mess" =>""
      );
      $mang = $this->data;
      if (count($mang) == 0 ){

      } else {
    
        if ($this->method === 'POST') {
          $this->model('Users');
          $user = $this->Users->checkLogin($mang['username'],$mang['password']);
          if ($user) {
      
          } else {
            $title['mess'] = "Đăng nhập không thành công !";
          }
            
        } else {
            
        }
      }
        $this->view('template/login/footer');
        $this->view('main/login',$title);
        $this->view('template/login/header');
    }

}




 ?>