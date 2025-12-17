<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once "config/Database.php";

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = "controllers/$controllerName.php";

if (!file_exists($controllerFile)) {
    die("Controller không tồn tại");
}

require_once $controllerFile;
$obj = new $controllerName();

if (!method_exists($obj, $action)) {
    die("Action không tồn tại");
}

$obj->$action();
