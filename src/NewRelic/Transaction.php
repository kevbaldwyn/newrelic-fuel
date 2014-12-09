<?php  namespace KevBaldwyn\NewRelic; 
class Transaction {

    public static function add($route)
    {
        if (extension_loaded('newrelic')) {
            newrelic_name_transaction($route);
        }
    }

} 