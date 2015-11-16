<?php

class App
{

    /*
     * Standart Controller Class
     */
    protected $controller = 'home';

    /*
     * Standart Method
     */
    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        /* If is there $url[0] (Controller Name)*/
        if(file_exists("App/Controller/". $url[0] .".php"))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }

        $this->controller = new $this->controller;

        /* If is there $url[1] (Method Name)*/
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = $url ? array_values($url) : [];

            call_user_func_array([$this->controller , $this->method], $this->params);

        }
        else {
            call_user_func_array([$this->controller, $this->method], array());
        }

    }

    /* URL */
    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}

?>