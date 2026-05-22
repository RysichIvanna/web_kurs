<?php

namespace controllers;

use models\Cars;
use models\Trips;

class ApiController
{
    public function carsAction()
    {
        header('Content-Type: application/json');
        echo json_encode(Cars::getCars());
    }

    public function tripsAction()
    {
        header('Content-Type: application/json');
        $carId = $_GET['car_id'] ?? null;

        if ($carId) {
            echo json_encode(Trips::getTripsByCarId($carId));
        } else {
            echo json_encode(['error' => 'car_id is required']);
        }
    }
}