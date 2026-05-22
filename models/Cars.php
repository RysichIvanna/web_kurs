<?php

namespace models;

use core\Core;

class Cars
{
    public static $tableName = "Cars";

    public static function getCars()
    {
        $cars = Core::getInstance()->context->table(self::$tableName)->select()->execute();
        return $cars;
    }

    public static function getCarById($id)
    {
        $cars = Core::getInstance()->context->table(self::$tableName)->select()->where([
            "id" => $id
        ])->execute();
        return $cars[0];
    }
    public static function addCar($brand, $model, $year, $number_of_trips, $driver_id, $img)
    {
        Core::getInstance()->context->table(self::$tableName)->insert([
            "brand" => $brand,
            "model" => $model,
            "year" => $year,
            "number_of_trips" => $number_of_trips,
            "driver_id" => $driver_id,
            "img" => $img,
        ])->execute();
    }
    public static function editCar($id, $brand, $model, $year, $number_of_trips, $driver_id, $img)
    {
        $editParams = [
            "brand" => $brand,
            "model" => $model,
            "year" => $year,
            "number_of_trips" => $number_of_trips,
            "driver_id" => $driver_id,
            "img" => $img,
        ];

        Core::getInstance()->context->table(self::$tableName)->update($editParams)->where([
            "id" => $id
        ])->execute();
    }

    public static function deleteCar($id)
    {
        Core::getInstance()->context->table(self::$tableName)->delete()->where(["id" => $id])->execute();
    }
}
