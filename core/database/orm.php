<?php
require(dirname(__FILE__). '/connector.php');

class ORM {
    function __construct(){
        $this->sql = new Connector();
    }

    function findAll($constraint=null){
        $exec = $this->sql->exec("SELECT * FROM " . $this->tableName);
        $object = json($exec->fetchAll());
        return $object;
        /*if($constraint == null){
            $exec = $this->sql->exec("SELECT * FROM " . $this->tableName);
        } else {
            $exec = $this->sql->exec("SELECT * FROM user WHERE id=2");
        }
        
        
        var_dump($object[0]->user);*/
    }
}
?>