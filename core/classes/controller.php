<?php
abstract class Controller {
    private $route = [];
    private $args = 0;
    private $params = [];
    public $method;
    public $query = [];
    public $data = [];


    function __construct() {
        $this->route = explode('/', URI);
        $this->method = METHOD;
        if (!empty(QUERY)) {
            $keywords = preg_split("/[\s,=,&]+/", QUERY);
            for($i=0;$i<sizeof($keywords);$i++){
                $arr[$keywords[$i]] = $keywords[++$i];
            }
            $this->query = (object)$arr;
        }

        $this->data = DATA;
        $this->args = count($this->route);
        $this->router();
    }


    private function router() {
        if (class_exists($this->route[1])) {
            if ($this->args >= 3) {
                if (method_exists($this, $this->route[2])) {
                    $this->uriCaller(2, 3);
                }
            } else {
                $this->uriCaller(0, 2);
            }
        }
    }


    private function uriCaller($method, $param) {
        for ($i = $param; $i < $this->args; $i++) {
            $this->params[$i] = $this->route[$i];
        }

        if ($method == 0)
            call_user_func_array(array($this, 'index'), $this->params);
        else
            call_user_func_array(array($this, $this->route[$method]), $this->params);
    }


    abstract function index();


    function model($path) {
        $path = $path;
        $class = explode('/', $path);
        $class = $class[count($class)-1];
        $path = strtolower($path);
        require(ROOT . '/app/models/' . $path . '.php');
        $this->$class = new $class;
    }


    function view ($path, $data = []) {
        if (is_array($data))
            extract($data);
        require(ROOT . '/app/views/' . $path . '.php');
    }

}

?>
