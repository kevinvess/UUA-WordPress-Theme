<?php


/**
 * Utility functions
 */

// Tell WordPress to use searchform.php from the templates/ directory
function uuatheme_get_search_form() {
  $form = '';
  locate_template('/templates/searchform.php', true, false);
  return $form;
}
add_filter('get_search_form', 'uuatheme_get_search_form');


/**
 * Add page slug to body_class() classes if it doesn't exist
 */
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