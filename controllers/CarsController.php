<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Cars;
use models\Drivers;


class CarsController extends Controller
{

    public function indexAction()
    {
        return $this->render(["cars" => Cars::getCars()]);
    }

    public function pageAction($params)
    {
        $id = array_shift($params);
        $car = Cars::getCarById($id);
        $driver = Drivers::getDriverById($car["driver_id"]);
        return $this->render(["car"=> $car, "driver"=> $driver[0] ]);
    }


    public function errorAction($message, $statusCode)
    {
        return $this->render([
            "message" => $message,
            "statusCode" => $statusCode
        ], "views/main/error.php");
    }
}
