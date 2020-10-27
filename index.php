<?php
require(dirname(__FILE__) . '/core/app.php');
require(dirname(__FILE__) . '/core/parsing/renderTemplate.php');
require(dirname(__FILE__) . '/models/UserModel.php');

$router->post('/', function () use ($res){

    //$orm->findAll();
    $user = new User();
    $reslt = $user->findAll();
    $res->send("Ceci est un page html");
});

$router->get('/user/(adminid)', function ($id) use ($res){

    //$orm->findAll();
    $user = new User();
    $reslt = $user->findAll();
    $res->send("Ceci est un id ".$id);
});

$router->dispatch();

?>