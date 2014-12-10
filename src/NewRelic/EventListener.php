<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Event;

class EventListener {

    const EVENT_TRANSACTION = 'controller_started';
    const EVENT_APP_BOOT    = 'app_created';

    public static function register()
    {
        if (extension_loaded('newrelic')) {
            Event::register(self::EVENT_LISTEN, 'KevBaldwyn\NewRelic\EventHandler::transaction');
        }

        Event::register(self::EVENT_APP_BOOT, 'KevBaldwyn\NewRelic\EventHandler::routes');
    }

} 