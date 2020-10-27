<?php

class Router{
    function __construct(){
        $this->routes = array();
        $this->notFound = function($url){
            echo "404 - $url was not found!";
        };
    }

    function post($name, $action){
        $this->routes[$name] = array("type" => "post", "action" => $action);
    }

    function get($name, $action){
        $arg = explode("/", $name);
        $this->result = array();
        $i = 0;
        foreach ($arg as $a) {
            $i += 1;
            if(strpos($a, '(') > -1){
                $result[$a] = $i;
            }
        }
        $this->routes[$name] = array("type" => "get", "action" => $action);
    }

    function dispatch(){
        foreach($this->routes as $name => $value){
            if($name == $_SERVER['REQUEST_URI']) {
                if($this->routes[$name]['type'] == 'get'){
                    return $this->routes[$name]['action']();
                } else {
                    return $this->routes[$name]['action']();
                }
                
            }
        }
        call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);
    }
    public function setNotFound($action){
        $this->notFound = $action;
    }


}

?>