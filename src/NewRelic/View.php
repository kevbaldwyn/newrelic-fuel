<?php  namespace KevBaldwyn\NewRelic; 

class View {

    public static function start($withTags = true)
    {
        if (extension_loaded ('newrelic')) {
            newrelic_get_browser_timing_header($withTags);
        }
    }


    public static function end($withTags = true)
    {
        if (extension_loaded ('newrelic')) {
            newrelic_get_browser_timing_footer($withTags);
        }
    }

} 