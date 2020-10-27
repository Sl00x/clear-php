<?php
include_once(dirname(__FILE__) . '/view/viewLoad.php');
include_once(dirname(__FILE__) . '/view/view.php');
include_once(dirname(__FILE__) . '/router/router.php');
include_once(dirname(__FILE__) . '/config.php');

$viewPath = VIEW;
$viewLoader = new ViewLoad($viewPath);
$res = new View($viewLoader, VIEW_EXTENSION);

$router = new Router();
?>