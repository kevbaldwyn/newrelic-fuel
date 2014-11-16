<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Request;

class EventHandler {

    public static function handle()
    {
        $request = Request::active();
        newrelic_name_transaction($request->route->translation);
    }

} 