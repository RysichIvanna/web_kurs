<?php

namespace controllers;

use core\Controller;
use core\Core;
use models\Trips;

class TripsController extends Controller
{

    public function carAction($params)
    {
        $id = array_shift($params);
        return $this->render(["trips" => Trips::getTripsByCarId($id)]);
    }

    public function orderAction()
    {
        if ($_POST['submit']) {
            $phoneNumber = $_POST['customer_phone_number'];

            if (empty($phoneNumber)) {
                $error = "Phone number is required.";
            } elseif (!preg_match('/^\d{10,15}$/', $phoneNumber)) {
                $error = "Invalid phone number. Please enter a valid number between 10 and 15 digits.";
            }

            if (!isset($error)) {
                Trips::addTrip($phoneNumber);
                Core::getInstance()->Redirect("/");
            }
        }
        return $this->render(["error" => $error]);
    }

    public function errorAction($message, $statusCode)
    {
        return $this->render([
            "message" => $message,
            "statusCode" => $statusCode
        ], "views/main/error.php");
    }
}