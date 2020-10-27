<?php
class Connector {
    function __construct(){
        $this->database = new PDO("mysql:port=".SQL_CONNECTOR['PORT'].";host=".SQL_CONNECTOR['HOST'].";dbname=".SQL_CONNECTOR['DATABASE'], SQL_CONNECTOR['USER'], SQL_CONNECTOR['PASS']); 
    }

    function exec($query){
        $check = $this->database->prepare($query);
        $check->execute();
        return $check;
    }
}
?>