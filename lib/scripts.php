<?php
/**
 * Scripts and stylesheets
 */

if ( ! function_exists('uuatheme_scripts') ) {

  function uuatheme_scripts() {
    $assets     = array(
      'css'       => '/style.css',
      'js'        => '/assets/js/scripts.js',
    );

    wp_enqueue_style('styles', get_stylesheet_uri(), false, filemtime( get_template_directory() . '/style.css'), 'all');
    wp_enqueue_style('fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', null, '4.7.0');

    if (is_single() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js", array(), '3.2.1' );

    wp_enqueue_script('uuatheme_js', get_template_directory_uri() . $assets['js'], array('jquery'), null, false);
  }
  add_action('wp_enqueue_scripts', 'uuatheme_scripts', 100);

}