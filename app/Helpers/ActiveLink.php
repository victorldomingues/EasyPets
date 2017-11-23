<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class  ActiveLink {
    public static function isActiveRoute($route, $output = "active"){
    	if (Route::currentRouteName() == $route) return $output;
    }

    public static function areActiveRoutes(Array $routes, $output = "active") {
	    foreach ($routes as $route)
	    {
	        if (Route::currentRouteName() == $route) return $output;
	    }

	}
}

