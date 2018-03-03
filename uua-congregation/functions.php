<?php

/**
 * KIRKI Customizer Library
 *
 * @link https://github.com/aristath/kirki
 *
 */

/**
 * Kirki Customizer Library
 */
if ( ! class_exists( 'Kirki' ) ) {

    include_once( dirname( __FILE__ ) . '/inc/kirki/kirki.php' );

    /**
     * Change the URL that will be used by Kirki
     * to load its assets in the customizer.
     */
    function uuatheme_kirki_path( $config ) {
        $config['url_path'] = get_template_directory_uri() . '/inc/kirki/';
        return $config;
    }
    add_filter( 'kirki_config', 'uuatheme_kirki_path' );

}


/**
  * TGM PLUGIN ACTIVATION LIBRARY
  *
  * Include the TGM_Plugin_Activation class.
  *
  * @link http://tgmpluginactivation.com/
  *
  */

require_once dirname( __FILE__ ) . '/inc/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'uuatheme_register_required_plugins' );




/**
 * AUTOMATIC UPDATES FROM KERNL
 * This replaces the WP Updates for theme and plugin update management
 *
 */
require 'theme_update_check.php';
$MyUpdateChecker = new ThemeUpdateChecker(
    'uua-congregation',
    'https://kernl.us/api/v1/theme-updates/5a3b08a9b9705f1e9fa06fab/'
);
// $MyUpdateChecker->license = "aKernlLicenseKey";  <---- optional
// $MyUpdateChecker->remoteGetTimeout = 5; <---- optional



/**
 * UUA THEME INCLUDES
 *
 * The $uuatheme_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$uuatheme_includes = array(
  'lib/kirki.php',           					// Theme Customizer Functions
  'lib/tgmpa.php',           					// Required and Recommended Plugin functions
  'lib/utils.php',           					// Utility functions
  'lib/init.php',            					// Initial theme setup and constants
  'lib/config.php',          					// Configuration
  'lib/titles.php',          					// Page titles
  'lib/nav.php',             					// Custom nav modifications
  'lib/scripts.php',         					// Scripts and stylesheets
  'lib/context-nav.php',     					// Contextual Navigation
  'lib/shortcodes/google-maps.php',   			// Google Maps Shortcodes
  'lib/shortcodes/uua-staffer.php',   			// Staffer Shortcodes
  'lib/shortcodes/uua-testimonials.php',   		// Staffer Shortcodes
  'lib/widgets/uua-feature-box-widgets.php',	// UUA Feature Box Widgets
  'lib/widgets/uua-bookstore-widget.php',		// UUA Bookstore Widget
  'lib/extras.php',          					// Custom functions
);

foreach ($uuatheme_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'uuatheme'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
