<?php
abstract class Controller
{
    private $route = [];
    private $args = 0;
    private $params = [];
    public $method;
    public $query;
    public $data = [];


    public function __construct()
    {
        $this->route = explode('/', URI);
        $this->method = METHOD;
        if (!empty(QUERY)) {
            $query = preg_split("/[\s,=,&]+/", QUERY);
            $key = array();
            $value = array();
            foreach ($query as $k => $v) {
                if ($k % 2 == 0) {
                    $key[] = $v;
                } else {
                    $value[] = $v;
                }
            }
            $this->query = [];
            foreach ($key as $k => $v) {
                $this->query[$v] = empty($value[$k]) ? "" : $value[$k];
            }
            $this->route = explode('/', explode('?', URI)[0]);
        }

        $this->data = DATA;
        $this->args = count($this->route);
    }


    public function router()
    {
        $this->beforeRender();
        if ($this->args == 2) {
            if (method_exists($this, $this->route[1])) {
                $this->uriCaller(1, 2);
            } else {
                $this->uriCaller(0, 2);
            }
        } elseif (!empty($this->route[2]) && method_exists($this, $this->route[2])) {
            $this->uriCaller(2, 3);
        } elseif (!empty($this->route[3]) &&method_exists($this, $this->route[3])) {
            $this->uriCaller(3, 4);
        }

        $this->afterRender();
    }


    private function uriCaller($method, $param)
    {
        for ($i = $param; $i < $this->args; $i++) {
            $this->params[$i] = $this->route[$i];
        }
        if ($method == 0) {
            call_user_func_array(array($this, 'index'), $this->params);
        } else {
            call_user_func_array(array($this, $this->route[$method]), $this->params);
        }
    }

    public function beforeRender()
    {
    }

    public function index()
    {
    }

    public function afterRender()
    {
    }


    public function model($path)
    {
        $path = $path;
        $class = explode('/', $path);
        $class = $class[count($class)-1];
        // $path = strtolower($path);
        require_once(ROOT . '/app/models/' . $path . '.php');
        $this->$class = new $class;
    }


    public function view($path, $data = [])
    {
        if (is_array($data)) {
            extract($data);
        }
        require_once(ROOT . '/app/views/' . $path . '.php');
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}
