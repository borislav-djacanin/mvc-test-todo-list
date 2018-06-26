<?php
    require_once '../classes/core/Session.class.php';
    require_once '../classes/core/Router.class.php';
    
    use compect\mvctest\classes\core\Router;
    use compect\mvctest\classes\core\Session;
    
    if (!isset($_SESSION)) {
        session_start();
    }
    if (file_exists('../config/config.local.inc.php')) {
        include '../config/config.local.inc.php';
    } else {
        include '../config/config.inc.php';
    }
    if (defined('ENVIRONMENT')) {
        switch (ENVIRONMENT) {
            case 'dev':
                error_reporting(E_ALL);
                ini_set("display_errors", 1);
                break;
            case 'prod':
                error_reporting(0);
                ini_set("display_errors", 0);
                break;
            default:
                die("Please set a right environment status.");
        }
    }
    Session::post($_POST);
    Router::getInstance();
    $controller = Router::getController();
    $action = Router::getAction();
    if (is_file('../controller/' . $controller . '.class.php')) {
        require '../controller/' . $controller . '.class.php';
        $className = 'compect\mvctest\controller\\' . $controller;
        $actionName = $action . 'Action';
        if (class_exists($className)) {
            $controller = new $className();
            if (method_exists($controller, $actionName) || is_callable([$controller, $actionName])) {
                echo $controller->$actionName();
            }
        }
    }
