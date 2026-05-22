<?php

namespace controllers;

use core\Controller;
use models\Cars;

class MainController extends Controller{

    public function indexAction(){
        return $this->render(["cars" => Cars::getCars()]);
    }  

    public function errorAction($message, $statusCode){
        return $this->render([
            "message" => $message,
            "statusCode" => $statusCode
        ], "views/main/error.php");
    }
}