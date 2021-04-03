<?php

class App
{
    private $controller_name;
    private $action_name;

    public function __construct()
    {
        session_start();

        $this->parseURL();
        $this->setControlllerActionName();


        $filename = $this->parseControllerName($this->controller_name) . 'Controller';
        $file = '../app/controller/' . $filename . '.php';
        if (file_exists($file)) {

            require $file;

            $controller = new $filename();
            if (is_callable(array($controller, $this->action_name))) {
                $controller->{$this->action_name}();
            }
        } else {
            http_response_code(404);
            require '../app/views/404.php';
            exit;
        }
    }

    private function parseControllerName($str)
    {
        return strcasecmp(substr($str, -1), 's') == 0 ? substr($str, 0, -1) : $str;
    }

    private function parseURL()
    {
        if (isset($_SERVER['REQUEST_URI'])) {

            $url = $_SERVER['REQUEST_URI'];
            $url = filter_var(trim($url, '/'), FILTER_SANITIZE_URL);

            $path_str = explode('/', explode('?', $url)[0]);
            $this->controller_name = isset($path_str[0]) ? $path_str[0] : null;
            $this->action_name = isset($path_str[1]) ? $path_str[1] : null;
        }
    }

    private function setControlllerActionName()
    {
        if (!$this->controller_name) {
            $this->controller_name = 'product';
        }
        if (!$this->action_name) {
            $this->action_name = 'index';
        }
    }
}
