<?php


/**
 * Utility functions
 */

// Tell WordPress to use searchform.php from the templates/ directory

if ( ! function_exists('uuatheme_get_search_form') ) {

  function uuatheme_get_search_form() {
    $form = '';
    locate_template('/partials/searchform.php', true, false);
    return $form;
  }
  add_filter('get_search_form', 'uuatheme_get_search_form');

}


/**
 * Add page slug to body_class() classes if it doesn't exist
 */

if ( ! function_exists('uuatheme_body_class') ) {

  function uuatheme_body_class($classes) {
    // Add post/page slug
    if (is_single() || is_page() && !is_front_page()) {
      if (!in_array(basename(get_permalink()), $classes)) {
        $classes[] = basename(get_permalink());
      }
    }
    return $classes;
  }
  add_filter('body_class', 'uuatheme_body_class');

}

/**
 * Add is_post_type conditional
 */

if ( ! function_exists('is_post_type') ) {

  function is_post_type($type){
      global $wp_query;
      if($type == get_post_type($wp_query->post->ID)) return true;
      return false;
  }

}