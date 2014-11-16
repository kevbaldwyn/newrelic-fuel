<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Request;

class EventHandler {

    public static function handle()
    {
        $request = Request::active();
        pa($request, true);
        //newrelic_name_transaction($request->controller . '/' . $request->action);
    }

} 