<?php
/**
 * Created by PhpStorm.
 * User: sanjay
 * Date: 26/3/19
 * Time: 11:01 PM
 */




final  class UserType
{

    const SUPER_ADMIN = 10;
    const USER = 20;

    public static function getValue($x)
    {
        $value = null;
        switch ($x) {

            case 10:
                $value = "Super Admin";
                break;
            case 20:
                $value = "User";
                break;
        }

        return $value;
    }


}
