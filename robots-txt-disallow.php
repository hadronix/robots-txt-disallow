<?php
/*
Plugin Name:  Disallow Robots.txt Indexing
Plugin URI:   https://rudidiedrich.de/
Description:  Disallow indexing at all
Version:      1.0.0
Author:       Rudi Diedrich
Author URI:   https://rudidiedrich.de/
Text Domain:  rd
License:      MIT License
*/

if (!defined('DISALLOW_INDEXING') || DISALLOW_INDEXING !== true) {
    return;
}

add_filter('robots_txt', function ($output) {
    $public = (bool) get_option( 'blog_public' );
    if ( $public ) {
        return $output;
    }

    $output = "User-agent: *\n";
    $output .= "Disallow: /\n";
    return $output;
}, PHP_INT_MAX );
