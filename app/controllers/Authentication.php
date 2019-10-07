<?php
class Authentication extends Controller {
    public $tokenKey = '';
    public $redirectURL = '';

    function beforeRender() {
      if ($this->checkSession()) {
          if ($this->checkCookie()) {
              $this->checkURL($this->redirectURL);
          } else {
                $this->model('AdministratorsModel');
                if ($this->AdministratorsModel->checkToken($_COOKIE[$this->tokenKey])) {
                    session_start();
                    $_SESSION[$this->tokenKey] = ''.time();
                } else {
                      $this->checkURL($this->redirectURL);
                  }
            }
      } 
    }

    private function checkURL($str) {
      if(!strpos(''.$this->getCurURL(), ''.$str)){
          header('Location: /'.$str);
      }
    }
	
  	private function checkSession(){
        return empty($_SESSION[$this->tokenKey]);
  	}

    private function checkCookie(){
        return empty($_COOKIE[$this->tokenKey]);
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