<?php

class ViewLoad {
    function __construct($path){
        $this->path = $path;
    }

    function load($name) {
        if(file_exists($this->path.$name)){
            require($this->path.$name);
        } else {
            throw new Exception("View does not exist: ". $this->path.$name);
        }
        
    }
}

?>