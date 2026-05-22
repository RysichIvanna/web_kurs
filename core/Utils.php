<?php

namespace core;

use Exception;

class Utils {
    public static function IsNotAdminThrowError(){
    if (($_SESSION["is_login"] ?? false) !== true) {
        Core::getInstance()->Redirect("/admin/login");
        exit; 
    }
}

    public static function LoginAdmin($login, $password){
        if($login == "admin" && $password == "1234"){
            $_SESSION["is_login"] = true;
            return true;
        }
        return false;
    }

    public static function LogoutAdmin(){
        unset($_SESSION["is_login"]);
    }

    public static function Encrypt($data){
        return md5($data);
    }
}