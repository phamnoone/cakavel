<?php
class App
{
    private $config = [];
    public $db;

    public function __construct()
    {
        define("URI", $_SERVER['REQUEST_URI']);
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);
        define("QUERY", $_SERVER['QUERY_STRING']);
        define("METHOD", $_SERVER['REQUEST_METHOD']);
        define("DATA", $_POST);
    }


    public function autoload()
    {
        spl_autoload_register(function ($class) {
            $class = strtolower($class);
            if (file_exists(ROOT . '/core/classes/' . $class . '.php')) {
                require_once ROOT . '/core/classes/' . $class . '.php';
            } elseif (file_exists(ROOT . '/core/helpers/' . $class . '.php')) {
                require_once ROOT . '/core/helpers/' . $class . '.php';
            }
        });
    }


    public function config()
    {
        $this->require('/config/session.php');
        $this->require('/config/database.php');

        try {
            $host = 'mysql:host=' . $this->config['database']['hostname'] . ';dbname=' . $this->config['database']['dbname'];
            $this->db = new PDO(
                $host,
                $this->config['database']['username'],
                $this->config['database']['password']
            );
            $this->db->query('SET NAMES utf8');
            $this->db->query('SET CHARACTER_SET utf8_unicode_ci');

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'PDOException: ' . $e->getMessage();
        }
    }


    public function require($path)
    {
        require ROOT . $path;
    }

    public function start()
    {
        session_name($this->config['sessionName']);
        session_start();
    }


    public function controller()
    {
        $route = explode('/', URI);

        if (count($route) == 2) {
            require_once ROOT . "/app/controllers/IndexController.php";
            $controller = new IndexController();
            if (empty($route[1]) || method_exists($controller, $route[1])) {
                return $controller;
            }

            $class = ucfirst(strtolower($route[1])) . "Controller";
            $path = ROOT . "/app/controllers/$class.php";
            if (file_exists($path)) {
                require_once $path;
                return new $class();
            }
        } else {
            $class = ucfirst(strtolower($route[1])) . "Controller";
            $path = ROOT . "/app/controllers/$class.php";
            if (file_exists($path)) {
                require_once $path;
                return new $class();
            }

            $class = ucfirst(strtolower($route[2])) . "Controller";
            $path = ROOT . "/app/controllers/$route[1]/$class.php";
            if (file_exists($path)) {
                require_once $path;
                return new $class();
            }
        }
    }
}
