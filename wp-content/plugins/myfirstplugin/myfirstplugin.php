<?php
/*
Plugin Name:  My First Plugin
Description: This is my firsy wordPress plugin.
Author: Gendy
Version: 1.0

*/

// Action

// The callback function
function myfirstplugin_action_say_hello()
{
    print '<h2>Hello World!</h2>';
    if (is_page()) {
        print '<h3>This is a Page!</h3>';
    }
}
// Register the action hook
add_action(/* hook*/'wp', /* callback*/ 'myfirstplugin_action_say_hello');

/**
 * My Filter
 */

// The callback function
//display author profile
function myfirstplugin_filter_title($title)
{
    $new_title = strtoupper($title);

    if (is_page()) {
        $title = strtoupper($title);
    }
    return $title;
}
// Register the filter hook
add_filter('the_title', 'myfirstplugin_filter_title');

/**
 * my Short code
 */

// The callback function
function nscc_shortcode($atts = [], $content = null)
{
    $content = "Hello from NSCC!";
    return $content;
}
add_shortcode('nscc', 'nscc_shortcode');
