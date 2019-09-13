<?php
class App {
    private $config = [];
    public $db;

    function __construct () {
        define("URI", $_SERVER['REQUEST_URI']);
        define("ROOT", $_SERVER['DOCUMENT_ROOT']);
        define("QUERY", $_SERVER['QUERY_STRING']);
        define("METHOD", $_SERVER['REQUEST_METHOD']);
        define("DATA", $_POST);
    }


    function autoload () {
        spl_autoload_register(function ($class) {
            $class = strtolower($class);
            if (file_exists(ROOT . '/core/classes/' . $class . '.php')) {
                require_once ROOT . '/core/classes/' . $class . '.php';
            } else if (file_exists(ROOT . '/core/helpers/' . $class . '.php')) {
                require_once ROOT . '/core/helpers/' . $class . '.php';
            }
        });
    }


    function config () {
        $this->require('/config/session.php');
        $this->require('/config/database.php');

        try {
            $host = 'mysql:host=' . $this->config['database']['hostname'] . ';dbname=' . $this->config['database']['dbname'];
            $this->db = new PDO($host,
                                $this->config['database']['username'],
                                $this->config['database']['password']);
            $this->db->query('SET NAMES utf8');
            $this->db->query('SET CHARACTER_SET utf8_unicode_ci');

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'PDOException: ' . $e->getMessage();
        }
    }


    function require ($path) {
        require ROOT . $path;
    }


    function start () {
        session_name($this->config['sessionName']);
        session_start();

        $route = explode('/', URI);
        $route[1] = strtolower($route[1]);

        if (file_exists(ROOT . '/app/controllers/' . $route[1] . '.php')) {
            $this->require('/app/controllers/' . $route[1] . '.php');
            $controller = new $route[1]();
        } else {
            if(empty($route[1])){
                $this->require('/app/controllers/main.php');
                $main = new Main();
            } else {
                $this->require('/app/views/errors/404.php');
            }
        }
    }

}

?>
