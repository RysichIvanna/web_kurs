<?php

namespace models;

use core\Core;
use DateTime;
use DateTimeZone;

class Drivers
{
    private static $tableName = 'Drivers';
    public static function getDrivers()
    {
        return Core::getInstance()->context->table(self::$tableName)->select()->execute();
    }
    public static function getDriverById($id)
    {
        return Core::getInstance()->context->table(self::$tableName)->select()->where([
            "id" => $id
        ])->execute();
    }

    public static function addDriver($name, $surname)
    {
        $context = Core::getInstance()->context;

        $context->table(self::$tableName)->insert([
            "name" => $name,
            "surname" => $surname
        ])->execute();

        return $context->lastInsertId();
    }

    public static function editDriver($id, $name, $surname)
    {
        $editParams = [
            "name" => $name,
            "surname" => $surname
        ];

        Core::getInstance()->context->table(self::$tableName)->update($editParams)->where([
            "id" => $id
        ])->execute();
    }

    public static function deleteDriver($id)
    {
        Core::getInstance()->context->table(self::$tableName)->delete()->where(["id" => $id])->execute();
    }
}
