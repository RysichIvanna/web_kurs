<?php

namespace core;

use controllers\MainController;
use Exception;
use core\DBContext;

include('config/database.php');

class Core
{
    private static $instance = null;

    public $context;
    public $app;

    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function Redirect($where)
    {
        header("Location: $where");
    }

    public function Initialize()
    {
        session_start();
        $this->context = new DBContext(DATABASE_HOST, DATABASE_BASENAME, DATABASE_LOGIN, DATABASE_PASSWORD);
    }

    public function Run()
    {
        $route = $_GET["route"];
        $routeParts = explode('/', $route);

        $moduleName = array_shift($routeParts);
        $actionName = array_shift($routeParts);
        if (empty($moduleName)) {
            $moduleName = "main";
        }
        if (empty($actionName)) {
            $actionName = "index";
        }

        $controllerName = "\\controllers\\" . ucfirst($moduleName) . "Controller";
        $controllerActionName = $actionName . "Action";

        try {
            if (!class_exists($controllerName)) {
                throw new Exception("Not found", 404);
            }
            $controller = new $controllerName();
            if (!method_exists($controller, $controllerActionName)) {
                throw new Exception("Not found", 404);
            }

            $this->app["moduleName"] = $moduleName;
            $this->app["actionName"] = $actionName;

            $this->app["content"] = $controller->$controllerActionName($routeParts);
        } catch (Exception $ex) {
            $mainController = new MainController();
            $this->app["content"] = $mainController->errorAction($ex->getMessage(), $ex->getCode());
        }
    }
    public function Done()
    {
        $theme = $_SESSION['theme'] ?? 'light';

        if ($theme == 'black') {
            $layoutPath = "themes/dark/layout.php";
        } else {
            $layoutPath = "themes/light/layout.php";
        }
        
        $tpl = new Template($layoutPath);
        $tpl->addParam("content", $this->app["content"]);
        echo $tpl->getHTML();
    }
}
