<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Request;

class EventHandler {

    public static function handle()
    {
        $request = Request::active();
        Transaction::add($request->route->translation);
    }

} 