<?php  namespace KevBaldwyn\NewRelic; 
class Transaction {

    public static function add($route)
    {
        if (extension_loaded('newrelic')) {
            newrelic_name_transaction($route);
        }
    }

    public static function addJobQueue($route)
    {
        static::end();
        static::start();
        static::markAsBackground();
        static::add($route);
    }

    public static function addParam($key, $value)
    {
        if(extension_loaded('newrelic')) {
            newrelic_add_custom_parameter($key, $value);
        }
    }

    public static function markAsBackground()
    {
        if(extension_loaded('newrelic')) {
            newrelic_background_job(true);
        }
    }

    public static function start($name = null)
    {
        if(extension_loaded('newrelic')) {
            if(is_null($name)) {
                $name = ini_get("newrelic.appname");
            }
            newrelic_start_transaction($name);
        }
    }

    public static function end()
    {
        if(extension_loaded('newrelic')) {
            newrelic_end_transaction();
        }
    }

    public static function ignore()
    {
        if(extension_loaded('newrelic')) {
            newrelic_ignore_transaction();
        }
    }
} 