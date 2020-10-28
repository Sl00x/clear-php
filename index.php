<?php
require(dirname(__FILE__) . '/core/app.php');
require(dirname(__FILE__) . '/core/parsing/renderTemplate.php');
require(dirname(__FILE__) . '/models/UserModel.php');

$router->post('/', function () use ($res){
    $res->renders([
        "title" => "Clear PHP",
        "message" => "Ce text s'affichera une fois appellé."
    ], "hello"); // call template hello on /view/hello.php
});

$router->get('/user/(adminid)', function ($id) use ($res){

    //$orm->findAll();
    $user = new User();
    $reslt = $user->findAll();
    $res->send("Ceci est un id ".$id);
});

$router->dispatch();

?>
