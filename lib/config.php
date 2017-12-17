<?php

/**
 * Enable theme features
 */
add_theme_support('automatic-feed-links'); 	// Enable automatic feeds in post and comment in the head

/**
 * Enable Custom Background Option
 */
add_theme_support( 'custom-background' );


/**
 * Allow Shortcodes in Widgets
 */
add_filter('widget_text', 'do_shortcode');


/**
 * Allow HTML in Category Descriptions
 */
remove_filter('pre_term_description', 'wp_filter_kses'); 


/**
 * $content_width is a global variable used by WordPress for max image upload sizes
 * and media embeds (in pixels).
 *
 * Example: If the content area is 640px wide, set $content_width = 620; so images and videos will not overflow.
 * Default: 1140px is the default Bootstrap container width.
 */
if (!isset($content_width)) { $content_width = 1140; }


/**
 * TEXT WIDGET
 *
 * Remove the super annoying wpautop functions
 * from the new text widget.
 */
remove_filter('widget_text_content', 'wpautop');