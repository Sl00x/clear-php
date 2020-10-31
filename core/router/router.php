<?php
require(dirname(__FILE__) . '/parsor.php');

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
        $this->routes[$name] = array("type" => "get", "action" => $action);
    }

    function put($name, $action){
        $this->routes[$name] = array("type" => "put", "action" => $action);
    }

    function delete($name, $action){
        $this->routes[$name] = array("type" => "delete", "action" => $action);
    }
    function dispatch(){
        
        foreach($this->routes as $name => $value){
            $uri = (parse($name, $_SERVER['REQUEST_URI']));
            if($uri != false && $uri['bases'] == $uri['entered']) {
                if(isset($uri['params']) && sizeof($uri['params']) > 0){
                    
                    return call_user_func_array($this->routes[$uri['bases']]['action'], $uri['params']);
                }

                return $this->routes[$name]['action']();
            }
        }
        call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);
    }
    public function setNotFound($action){
        $this->notFound = $action;
    }


}

?>