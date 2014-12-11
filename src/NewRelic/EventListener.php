<?php namespace KevBaldwyn\NewRelic;

use Fuel\Core\Event;

class EventListener {

    const EVENT_TRANSACTION = 'controller_started';
    const EVENT_APP_BOOT    = 'app_created';

    public static function register()
    {
        if (extension_loaded('newrelic')) {
            Event::register(self::EVENT_TRANSACTION, 'KevBaldwyn\NewRelic\EventHandler::transaction');
        }

        EventHandler::routes();
    }

} 