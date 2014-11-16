<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Event;

class EventListener {

    const EVENT_LISTEN = 'controller_started';

    public static function register()
    {
        if (extension_loaded('newrelic')) {
            Event::register(self::EVENT_LISTEN, 'KevBaldwyn\NewRelic\EventHandler::handle');
        }
    }

} 