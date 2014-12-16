<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Request;
use Fuel\Core\Router;
use Fuel\Core\Route;
use Fuel\Core\View;
use Fuel\Core\Config;
use Fuel\Core\Finder;
use Fuel\Core\Response;
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
            // load a config
            $conf = Config::load('newrelic-ping');

            // ping the urls
            $pinger = new Pinger($conf['urls'], $conf['base_host']);
            $res = $pinger->ping();

            // add path to lookup view
            Finder::instance()->add_path(realpath(rtrim(__DIR__, '/') . '/../'));

            // build a response and return it
            return new Response(View::forge('_newrelic-status', ['result' => $res]), $res->getResultStatusCode());
        }));
    }

} 