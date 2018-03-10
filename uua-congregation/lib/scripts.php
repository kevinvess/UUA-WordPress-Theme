<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Register Theme Scripts and Styles
 */
if ( ! function_exists('uuatheme_scripts') ) {

    function uuatheme_scripts() {

        // Enqueue Styles.
        wp_enqueue_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
        wp_enqueue_style( 'uuatheme-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css') );

        // Enqueue Scripts.
        wp_enqueue_script( 'uuatheme-script', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), false, true );

        // Load single scripts only on single pages.
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }

  }
  add_action( 'wp_enqueue_scripts', 'uuatheme_scripts', 100 );

}
