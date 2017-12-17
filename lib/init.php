<?php
/**
 * uuatheme initial setup and constants
 */
function uuatheme_setup() {
  // Make theme available for translation
  load_theme_textdomain('uuatheme', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Enable support for the site logo function
  // http://jetpack.me/support/site-logo/
	/*
		$args = array(
	    'header-text' => array(
	        'site-title',
	        'site-description',
	    ),
	    'size' => 'medium',
		);
		add_theme_support( 'site-logo', $args );
	*/

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'uuatheme'),
    'utility_navigation' => __('Utility Navigation', 'uuatheme'),
    'footer_navigation' => __('Footer Navigation', 'uuatheme'),    
    'page_navigation' => __('Page Navigation', 'uuatheme')
  ));

  // Add post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  add_theme_support('post-thumbnails');
  add_image_size( 'medium', 420, 9999 );

  // Add HTML5 markup for captions
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'uuatheme_setup');

/**
 * Register sidebars
 */
function uuatheme_widgets_init() {
  register_sidebar(array(
    'name'          => __('Primary', 'uuatheme'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => __('Secondary', 'uuatheme'),
    'id'            => 'sidebar-secondary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Left Sidebar', 'roots'),
    'id'            => 'sidebar-left',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '',
    'after_title'   => '',
  ));
    
  register_sidebar(array(
    'name'          => __('Home 1', 'roots'),
    'id'            => 'sidebar-home-one',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 2', 'roots'),
    'id'            => 'sidebar-home-two',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 3', 'roots'),
    'id'            => 'sidebar-home-three',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 4', 'roots'),
    'id'            => 'sidebar-home-four',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 5', 'roots'),
    'id'            => 'sidebar-home-five',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 6', 'roots'),
    'id'            => 'sidebar-home-six',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 7', 'roots'),
    'id'            => 'sidebar-home-seven',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Home 8', 'roots'),
    'id'            => 'sidebar-home-eight',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
  
  register_sidebar(array(
    'name'          => __('Footer 1', 'uuatheme'),
    'id'            => 'sidebar-footer-one',
    'before_widget' => '<section class="col-md-3 widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
  
  register_sidebar(array(
    'name'          => __('Footer 2', 'uuatheme'),
    'id'            => 'sidebar-footer-two',
    'before_widget' => '<section class="col-md-3 widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
  
  register_sidebar(array(
    'name'          => __('Footer 3', 'uuatheme'),
    'id'            => 'sidebar-footer-three',
    'before_widget' => '<section class="col-md-3 widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ));
    
}
add_action('widgets_init', 'uuatheme_widgets_init');