<?php
require(dirname(__FILE__) . '/core/app.php');
require(dirname(__FILE__) . '/core/parsing/renderTemplate.php');
require(dirname(__FILE__) . '/core/database/orm.php');

$orm = new ORM();

/**
 * @method post 
 * @see('/')
 */
$router->post('/', function () use ($res, $orm){

    //$orm->findAll();
    /*$view->render([
        "title" => "Welcome to the jungle my dir !",
        "user" => 'test',
        "password" => 'pass',
        "role" => json(["id" => "1", "name" => "admin"])
    ],'hello');*/

    $res->send(["coucou" => "est"]);
});


/**
 * @method post 
 * @see('/mange-merde')
 */
$router->post('/mange-merde', function () use ($view, $orm){

    $orm->findAll();
    $view->displays([
        "title" => "Je suis une merde",
        "user" => 'test',
        "password" => 'pass',
        "role" => json(["id" => "1", "name" => "admin"])
    ],'hello');
});

$router->dispatch();

?>