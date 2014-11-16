<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Event;

class EventListener {

    const EVENT_LISTEN = 'controller_started';

    public static function register()
    {
        Event::register(self::EVENT_LISTEN, 'KevBaldwyn\EventHandler::handle');
    }

} 