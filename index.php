<?php
require(dirname(__FILE__) . '/core/app.php');
require(dirname(__FILE__) . '/core/parsing/renderTemplate.php');

$router->post('/', function () use ($res, $req){
    
    $res->status(404);
    $res->send([
        "message" => $req->body('message'),
        "data" => "fef4erJGefzf5efjkGJlds.Icvefezf5er24egerlkgVUYd"
    ]);
});

$router->post('/user/:id', function ($id) use ($res, $req){
    $res->send([
        "id" => $id,
        "message" => $req->body('message'),
    ]);
});


$router->dispatch();

?>
