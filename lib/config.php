<?php

/**
 * Enable theme features
 */
add_theme_support('jquery-cdn');            // Enable to load jQuery from the Google CDN


/**
 * Enable Custom Background Option
 */
add_theme_support( 'custom-background' );

/**
 * Allow Shortcodes in Widgets
 */
add_filter('widget_text', 'do_shortcode');


/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }
