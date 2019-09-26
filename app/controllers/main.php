<?php
class Main extends Controller {
    /*
     * http://localhost/
     */
    function index () {
        $this->view('template/header');
        $this->view('main/index');
        $this->view('template/footer');
    }
}

?>
