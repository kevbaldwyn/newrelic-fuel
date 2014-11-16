newrelic-fuel
=============

A simple new relic framework integration for FuelPHP

##Installation
With Composer

    "require": {
        ...
        "kevbaldwyn/newrelic-fuel":"0.*"
        ...
    }

Composer Update:

    $ composer update kevbaldwyn/newrelic-fuel

##Usage
To start logging transactions you simply need to add a call to register the event listener somewhere logical such as the end of the bootstrap.php file:

    KevBaldwyn\NewRelic\EventListener::register();

To use the page load time monitoring add the following 2 calls to your layout template:

    echo KevBaldwyn\NewRelic\View::start();
    echo KevBaldwyn\NewRelic\View::end();

For example:

    <!DOCTYPE html>
    <html lang="en">
    <head>
    	<meta charset="utf-8">
    	<title>Page Title</title>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<?php echo KevBaldwyn\NewRelic\View::start(); ?>

    </head>
    <body>

    	....

    	<?php echo KevBaldwyn\NewRelic\View::end(); ?>
    </body>
    </html>

If you do not want to output the script tags then pass `false` to the `View::start()` and `View::end()`:

    <?php echo KevBaldwyn\NewRelic\View::start(false); ?>
    <?php echo KevBaldwyn\NewRelic\View::end(false); ?>