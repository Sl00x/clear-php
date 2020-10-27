<?php
require(dirname(__FILE__) . '/../core/database/orm.php');

class User extends ORM {
    function __constructor(){
        super();
    }

    public $data = [
        'id' => 0,
        'user' => ''
    ];

    public $tableName ="user";
}

?>