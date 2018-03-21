<?php
/**
 * Created by PhpStorm.
 * User: kevbaldwyn
 * Date: 21/03/2018
 * Time: 16:21
 */

namespace KevBaldwyn\NewRelic;

final class Custom
{
    public static function event($name, array $attributes = [])
    {
        if (extension_loaded('newrelic')) {
            newrelic_record_custom_event($name, $attributes);
        }
    }

    public static function metric($name, $value)
    {
        $metric = 'Custom/' . $name;
        if (extension_loaded('newrelic')) {
            newrelic_custom_metric($metric, $value);
        }
    }
}
