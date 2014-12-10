<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Request;
use Fuel\Core\Router;
use Fuel\Core\Route;
use Fuel\Core\View;
use KevBaldwyn\NewRelic\Status\Pinger;

class EventHandler {

    public static function transaction()
    {
        $request = Request::active();
        Transaction::add($request->route->translation);
    }

    public static function routes()
    {
        $route = '_status';
        Router::add($route, new Route($route, function() {
            // ping the urls
            $pinger = new Pinger($urls);
            $res = $pinger->ping();

            // add path to request
            $request = Request::active();
            $request->add_path(realpath(rtrim(__DIR__, '/')) . '/../views/');

            // build a view and return it
            return View::forge('status', ['result' => $res]);
        }));
    }

} 