<?php

namespace App\Helpers;

class  OrderStateHelper {

    /// closed
    public static $closed = 0;
    /// opened
    public static $open = 1;
    /// shopping
    public static $shopping = 2;
    /// finhed
    public static $finished = 3;
    /// processing payment
    public static $processingPayment = 4;
    /// dispatched
    public static $dispatched = 5;
    /// delivered
    public static $delivered = 6;
}