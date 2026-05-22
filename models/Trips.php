<?php

namespace models;

use core\Core;

class Trips
{
    private static $tableName = 'Trips';

    public static function getTrips()
    {
        $trips = Core::getInstance()->context->table(self::$tableName)->select()->execute();
        return $trips;
    }

    public static function getTripsByCarId($id)
    {
        return Core::getInstance()->context->table(self::$tableName)->select()->where([
            "car_id" => $id
        ])->execute();
    }
    public static function addTrip($customer_phone_number)
    {
        $cars = Cars::getCars();
        $randomKey = array_rand($cars);
        $randomCar = $cars[$randomKey];

        $trip_range = rand(1, 20);
        $price = $trip_range * 2.3;

        $currentDateTime = date('Y-m-d H:i:s');

        Core::getInstance()->context->table(self::$tableName)->insert([
            "date" => $currentDateTime,
            "trip_range" => $trip_range,
            "car_id" => $randomCar["id"],
            "customer_phone_number" => $customer_phone_number,
            "price" => $price
        ])->execute();
    }
}
