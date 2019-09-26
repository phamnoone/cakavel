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
        $this->model('adminators');

        $data = $this->adminators->create();

        $this->view('template/header');
        $this->view('dashboard/test_model', $data);
        $this->view('template/footer');

    }

    function login(){

      $title= array(
        "mess" =>""
      );
      $mang = $this->data;
      if (count($mang) == 0 ){

      } else {
    
        if ($this->method === 'POST') {
          $this->model('adminators');
          $user = $this->adminators->checkLogin($mang['username'],$mang['password']);
          if ($user) {
      
          }else{
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


