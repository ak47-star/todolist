<?php
$controllers = array(
    'ToDo' => ['index', 'create', 'update', 'delete']
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'ToDo';
    $action = 'index';
}

include_once('controllers/' . 'ToDo' . 'Controller.php');
$controller = new \Controller\ToDoController();
$controller->$action();