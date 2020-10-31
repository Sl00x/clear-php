<?php

class View{
    function __construct($loader, $ext){
        $this->loader = $loader;
        $this->ext = $ext;
    }
    function status($code){
        http_response_code($code);
    }
    function render($name, $var=false){
        if($var){
            $_SESSION['get_data'] = $var;
            extract($_SESSION, EXTR_SKIP, "wddx");
        }
        $this->loader->load($name . $this->ext);
    }

    function send($data){
        if(gettype($data) == "array"){
            $data = json_encode($data);
        }
        echo $data;
    }
}
?>