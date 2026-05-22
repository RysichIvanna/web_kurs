<?php

namespace core;

class Controller {

    public function render($params = [], $viewPath = null) {
        if ($viewPath == null) {
            $moduleName = Core::getInstance()->app["moduleName"];
            $actionName = Core::getInstance()->app["actionName"];

            $viewPath = "views/$moduleName/$actionName.php";
        }
        $tpl = new Template($viewPath);
        $tpl->addParams($params);
        return $tpl->getHTML();
    }
}