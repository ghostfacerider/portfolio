<?php
/*
Plugin Name:  My second Plugin
Description: This is my firsy wordPress plugin.
Author: Gendy w0202057
Version: 1.0

 */

/**
 * My Action
 *
 *
 */
// The callback function
function myfirstplugin_action_say_hello()
{
    print '<h2>Hello Title</h2>';
    if (is_page()) {
        print '<h3>Hello Title</h3>';
    }
}
// Register the action hook
add_action('wp', 'myfirstplugin_action_say_hello');

/**
 * My Filter
 */

// The callback function
function myfirstplugin_filter_title($title)
{
    $new_title = strtoupper($title);

    if (is_page()) {
        $title = 'style="font-style: italic"'($title);
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
