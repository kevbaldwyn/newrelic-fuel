<?php  namespace KevBaldwyn\NewRelic; 
class Transaction {

    public static function add($route)
    {
        newrelic_name_transaction($route);
    }

} 