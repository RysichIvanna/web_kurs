<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\Cars;
use models\Drivers;
use models\Product;
use models\Trips;

class AdminController extends Controller
{

    public function indexAction()
    {
        Utils::IsNotAdminThrowError();

        $trips = Trips::getTrips();

        $totalTrips = count($trips);
        $totalIncome = 0;
        $totalDistance = 0;
        $validPhoneCount = 0;
        $invalidPhoneCount = 0;

        foreach ($trips as $trip) {
            $totalIncome += (float) $trip["price"];
            $totalDistance += (float) $trip["trip_range"];

            if (preg_match("/^\d{10,12}$/", $trip["customer_phone_number"])) {
                $validPhoneCount++;
            } else {
                $invalidPhoneCount++;
            }
        }

        $averageDistance = $totalTrips > 0 ? $totalDistance / $totalTrips : 0;

        return $this->render([
            "trips" => $trips,
            "totalTrips" => $totalTrips,
            "totalIncome" => $totalIncome,
            "totalDistance" => $totalDistance,
            "averageDistance" => $averageDistance,
            "validPhoneCount" => $validPhoneCount,
            "invalidPhoneCount" => $invalidPhoneCount,
        ]);
    }

    public function carAction()
    {
        Utils::IsNotAdminThrowError();

        return $this->render([
            "cars" => Cars::getCars(),
        ]);
    }


    public function addCarAction()
    {
        Utils::IsNotAdminThrowError();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $number_of_trips = $_POST['number_of_trips'];
            $driver_id = $_POST['driver_id'];
            $img = $_POST['img'];
            Cars::addCar($brand, $model, $year, $number_of_trips, $driver_id, $img);
            Core::getInstance()->Redirect("/admin/car");
        }
        return $this->render(["drivers" => Drivers::getDrivers()]);
    }

    public function editCarAction($params)
    {
        Utils::IsNotAdminThrowError();

        $id = array_shift($params);
        $car = Cars::getCarById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            if ($_POST['brand'] != '') {
                $brand = $_POST['brand'];
            } else {
                $brand = $car['brand'];
            }

            if ($_POST['model'] != '') {
                $model = $_POST['model'];
            } else {
                $model = $car['model'];
            }

            if ($_POST['year'] != '') {
                $year = $_POST['year'];
            } else {
                $year = $car['year'];
            }

            if ($_POST['number_of_trips'] != '') {
                $number_of_trips = $_POST['number_of_trips'];
            } else {
                $number_of_trips = $car['number_of_trips'];
            }

            if ($_POST['driver_id'] != '') {
                $driver_id = $_POST['driver_id'];
            } else {
                $driver_id = $car['driver_id'];
            }

            if ($_POST['img'] != '') {
                $img = $_POST['img'];
            } else {
                $img = $car['img'];
            }

            Cars::editCar($id, $brand, $model, $year, $number_of_trips, $driver_id, $img);
            Core::getInstance()->Redirect("/admin/car");
        }
        return $this->render(["car" => $car, "drivers" => Drivers::getDrivers()]);
    }

    public function deleteCarAction($params)
    {
        Utils::IsNotAdminThrowError();

        $id = array_shift($params);
        Cars::deleteCar($id);
        Core::getInstance()->Redirect("/admin/car");
    }

    public function driversAction()
    {
        Utils::IsNotAdminThrowError();

        return $this->render([
            "drivers" => Drivers::getDrivers(),
        ]);
    }

    public function addDriverAction()
    {
        Utils::IsNotAdminThrowError();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            Drivers::addDriver($name, $surname);
            Core::getInstance()->Redirect("/admin/drivers");
        }
        return $this->render();
    }

    public function editDriverAction($params)
    {
        Utils::IsNotAdminThrowError();

        $id = array_shift($params);
        $driver = Drivers::getDriverById($id)[0];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            if ($_POST['name'] != '') {
                $name = $_POST['name'];
            } else {
                $name = $driver['name'];
            }

            if ($_POST['surname'] != '') {
                $surname = $_POST['surname'];
            } else {
                $surname = $driver['surname'];
            }

            Drivers::editDriver($id, $name, $surname);
            Core::getInstance()->Redirect("/admin/drivers");
        }
        return $this->render(["driver" => $driver]);
    }


    public function deleteDriverAction($params)
    {
        Utils::IsNotAdminThrowError();

        $id = array_shift($params);
        Drivers::deleteDriver($id);
        Core::getInstance()->Redirect("/admin/drivers");
    }

    public function loginAction()
    {

        if (isset($_SESSION["is_login"])) {
            Core::getInstance()->Redirect("/admin/");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';

            if (!empty($login) && !empty($password)) {
                if (Utils::LoginAdmin($login, $password)) {
                    Core::getInstance()->Redirect("/admin/");
                }
            }
        }
        return $this->render();
    }

    public function logoutAction()
    {
        Utils::LogoutAdmin();
        Core::getInstance()->Redirect("/");
    }

    public function errorAction($message, $statusCode)
    {
        return $this->render([
            "message" => $message,
            "statusCode" => $statusCode
        ], "views/main/error.php");
    }
}