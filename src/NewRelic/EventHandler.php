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
        Router::add($route, new Route($route, function($request) {
            // ping the urls
            $pinger = new Pinger($urls);
            $res = $pinger->ping();

            // add path to lookup view
            Finder::instance()->add_path(realpath(rtrim(__DIR__, '/') . '/../'));

            // build a view and return it
            return View::forge('_newrelic-status', ['result' => $res]);
        }));
    }

} 