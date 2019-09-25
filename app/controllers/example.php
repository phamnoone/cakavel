<?php


class Example extends Controller {



    /*
     * http://localhost/example
     */
    function index () {
        $this->view('template/header');
        $this->view('dashboard/index');
        $this->view('template/footer');
    }

    /*
     * http://localhost/example/subpage/[$parameter1]
     */
    function subpage ($parameter = '') {
      $viewData = array(
          'parameter' => $parameter
      );

      // if ($parameter === '') {
      //     $this->view('errors/404');
      // }

      $this->view('template/header');
      $this->view('dashboard/subpage', $viewData);
      $this->view('template/footer');
    }


    function mutilparameter ($parameter1 = '', $parameter2 = '') {
       var_dump($parameter1);
       echo "<br>";
       var_dump($parameter2);
    }

    function test_model(){
        $this->model('Users');

        $data = $this->Users->create();

        $this->view('template/header');
        $this->view('dashboard/test_model', $data);
        $this->view('template/footer');


    }

    function login(){
      // var_dump($this->method);
      // echo '<br>';
      // var_dump($this->data);

      // echo'<br>';
      $mang = $this->data;
      // var_dump($mang);
      echo '<br>';
      if(count($mang)==0){
        
      }else {
    
        if($this->method === 'POST'){
          $this->model('Users');
          $user = $this->Users->checkLogin($mang['username'],$mang['password']);
          var_dump($user);
          // login thanh cong hay khong
          if($user){
            var_dump($user); 
            echo "<script>alert('Login thanh cong')</script>";
          }else{
            echo "<script>alert('Tài khoản mật khẩu không chính xác')</script>";
          }
            
        }else{
            
        }
      }
        $this->view('template/footerlogin');
        $this->view('main/login');
        $this->view('template/headerlogin');
    }

}

?>


