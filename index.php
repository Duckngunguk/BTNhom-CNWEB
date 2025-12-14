<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

define('BASE_URL', '/CNWeb-PHP/onlinecourse');

$controller = isset($_GET['controller']) && $_GET['controller'] !== ''
    ? $_GET['controller']
    : 'home';

$action = isset($_GET['action']) && $_GET['action'] !== ''
    ? $_GET['action']
    : 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = __DIR__ . "/controllers/$controllerName.php";

if (!file_exists($controllerFile)) {
    die("Controller không tồn tại: $controllerName");
}

require_once $controllerFile;

$ctrl = new $controllerName();

if (!method_exists($ctrl, $action)) {
    die("Action không tồn tại: $action");
}

$ctrl->$action();
