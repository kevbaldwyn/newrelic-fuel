<?php  namespace KevBaldwyn\NewRelic; 
class Transaction {

    public static function add($route)
    {
        if (extension_loaded('newrelic')) {
            newrelic_name_transaction($route);
        }
    }

    public static function addParam($key, $value)
    {
        if(extension_loaded('newrelic')) {
            newrelic_add_custom_parameter($key, $value);
        }
    }
} 