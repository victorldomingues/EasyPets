<?php

namespace App\Helpers;
use Session;
class  CartHelper {
    public static $key = 'cart';
    public static function get(){
        if(Session::has(self::$key))
            $cart = Session(self::$key);
        else
            $cart  =  self::store();
        return $cart;
    }

    public static function store(){
        Session::put(self::$key, GuidHelper::guid());
        return $cart  = Session(self::$key);
    }

    public static function destory(){
        if(Session::has(self::$key))
            Session::forget(self::$key);
        
    }
}