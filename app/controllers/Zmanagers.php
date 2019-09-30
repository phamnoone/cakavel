<?php 
class Zmanagers extends Controller{
  /*
  * http://localhost/
  */
  function afterRender() {
    if(isset($_SESSION['permission'])){
        switch ($_SESSION['permission']) {
          case 0:
            if(isset($_SESSION['token_admin'])){
             
            } else {
                  header("Location: /managers/login");
            }
          break;
          case 1:
            if(isset($_SESSION['token_teacher'])){

            } else {
                  header("Location: /teachers/login");
            }
          break;
          case 2:
            if(isset($_SESSION['token_student'])){

            } else {
                  header("Location: /students/login");
            }
          break;
          default:
            if($this->getCurURL() == 'http://localhost:8080/dashboard/admin'){
                header("Location: /managers/login");
            } else if($this->getCurURL() == 'http://localhost:8080/dashboard/student'){
                  header("Location: /students/login");
              } else if($this->getCurURL() == 'http://localhost:8080/dashboard/teacher'){
                    header("Location: /teachers/login");
                }
          break;
        }
    } else {
          if($this->getCurURL() == 'http://localhost:8080/dashboard/admin'){
              header("Location: /managers/login");
          } else if($this->getCurURL() == 'http://localhost:8080/dashboard/student'){
                header("Location: /students/login");
            } else if($this->getCurURL() == 'http://localhost:8080/dashboard/teacher'){
                  header("Location: /teachers/login");
            }
    }
  }

  function getCurURL() {
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "https://";
    } else {
          $pageURL = 'http://';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
          $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
  }
}

?>