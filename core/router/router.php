<?php

class Router{
    function __construct(){
        $this->routes = array();
        $this->notFound = function($url){
            echo "404 - $url was not found!";
        };

        $this->notArgument = function($url){
            echo "400 - Error with route need argument !";
        };

        $this->emptyArgs = function($url){
            echo "400 - You can't have empty args";
        };
    }

    function post($name, $action){
        $this->routes[$name] = array("type" => "post", "action" => $action);
    }

    function get($name, $action){
        $road = explode('(', $name)[0];
        $args = explode('(', $name);
        $my_args = array();
        foreach ($args as $key) {
            if($key != $road){
                array_push($my_args, str_replace(')', '', $key));
            }
        }

        $this->routes[$name] = array("type" => "get", "action" => $action, "args" => $my_args);
    }

    function dispatch(){
        foreach($this->routes as $name => $value){
            if(strpos($name, '(') > 0){
                $road = explode('(', $name)[0];
                $args = explode('/', str_replace($road, '', $_SERVER['REQUEST_URI']));
                $check_arg = ($this->routes[$name]['args']);
                if(strpos($_SERVER['REQUEST_URI'], $road) > -1){
                    $checkValidity = true;
                    foreach ($args as $value) {
                        if($value == ''){
                            $checkValidity = false;
                        }
                    }

                    if($checkValidity){
                        return call_user_func_array($this->routes[$name]['action'], $args);
                    } else {
                        return call_user_func_array($this->emptyArgs,[$_SERVER['REQUEST_URI']]);
                    }
                    
                    
                } else {
                    return call_user_func_array($this->notArgument,[$_SERVER['REQUEST_URI']]);
                }
            } else {
                if($name == $_SERVER['REQUEST_URI']) {

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