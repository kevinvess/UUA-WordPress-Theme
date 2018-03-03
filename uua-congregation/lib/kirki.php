<?php
/**
 * Include and setup customizer fields.
 *
 * @category UUA Theme
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 *
 */

function uuatheme_kirki_init() {

    if ( ! class_exists( 'Kirki' ) ) {
        return;
    }

    /*
     * First of all, add the config.
     *
     * @link https://aristath.github.io/kirki/docs/getting-started/config.html
     */
    Kirki::add_config( 'uuatheme_kirki_config', array(
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
    ) );

    /*
     * Add Sections
     *
     * @link https://aristath.github.io/kirki/docs/getting-started/sections.html
     */
    Kirki::add_section( 'uuatheme_design_options', array(
        'title'          => esc_attr__( 'Theme Colour Options', 'uuatheme' ),
        'description'    => esc_attr__( 'Configure the site colour scheme', 'uuatheme' ),
        'panel'          => '',
        'priority'       => 10,
    ) );

    Kirki::add_section( 'uuatheme_congregation_map', array(
        'title'          => esc_attr__( 'Congregation Map', 'uuatheme' ),
        'description'    => esc_attr__( 'Make changes to the information for maps', 'uuatheme' ),
        'panel'          => '',
        'priority'       => 10,
    ) );

    Kirki::add_section( 'uuatheme_header_options', array(
        'title'          => esc_attr__( 'Header Options', 'uuatheme' ),
        'description'    => esc_attr__( 'Make changes to the site header', 'uuatheme' ),
        'panel'          => '',
        'priority'       => 10,
    ) );

    Kirki::add_section( 'uuatheme_footer_options', array(
        'title'          => esc_attr__( 'Footer Options', 'uuatheme' ),
        'description'    => esc_attr__( 'Make changes to the site footer', 'uuatheme' ),
        'panel'          => '',
        'priority'       => 10,
    ) );

    Kirki::add_section( 'uuatheme_social_networks', array(
        'title'          => esc_attr__( 'Social Networks', 'uuatheme' ),
        'description'    => esc_attr__( 'Add social network web addresses for icon links in header and footer. Put the page address in the box including the http:// part.', 'uuatheme' ),
        'panel'          => '',
        'priority'       => 10,
    ) );

    /*
     * Customizer Fields
     */

    //* Theme Colour Options *//

    // Site Color Scheme
    Kirki::add_field( 'uuatheme_kirki_config', array(
    'type'        => 'radio',
    'settings'    => 'uuatheme_colors',
    'label'       => __( 'Site Color Scheme', 'uuatheme' ),
    'description' => __( 'Choose from the Dark Blue, Grey Red, or Aqua Green colour scheme.', 'uuatheme' ),
    'section'     => 'uuatheme_design_options',
    'default'     => '',
    'priority'    => 10,
    'choices'     => array(
        'dark-blue'  => esc_attr__( 'Dark Blue', 'uuatheme' ),
        'grey-red'   => esc_attr__( 'Grey Red', 'uuatheme' ),
        'aqua-green' => esc_attr__( 'Aqua Green', 'uuatheme' ),
        ),
    ) );

    //* Congregation Map *//

    // Congregation Address
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'textarea',
        'settings'    => 'uuatheme_congregation_address',
        'label'       => __( 'Congregation Address for Maps', 'uuatheme' ),
        'description' => __( 'Enter your physical street address, including city, state and zip code.', 'uuatheme' ),
        'section'     => 'uuatheme_congregation_map',
        'default'     => '',
        'priority'    => 10,
    ) );

    // Google Maps API Key
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_googlemapsapi',
        'label'       => __( 'Google Maps API Key', 'uuatheme' ),
        'description' => __( 'Follow Google’s instructions for signing up for an API account and getting a key.', 'uuatheme' ),
        'section'     => 'uuatheme_congregation_map',
        'default'     => '',
        'priority'    => 10,
    ) );

    //* Header Options *//

    // Site logo
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'image',
        'settings'    => 'uuatheme_logo_upload',
        'label'       => esc_attr__( 'Logo Image', 'uuatheme' ),
        'section'     => 'uuatheme_header_options',
        'default'     => '',
        'priority'    => 10,
    ) );

    // Text content beneath the utility menu
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'textarea',
        'settings'    => 'uuatheme_header_text',
        'label'       => __( 'Header Text', 'uuatheme' ),
        'description' => __( 'Edit the text in the header beneath the utility menu.', 'uuatheme' ),
        'section'     => 'uuatheme_header_options',
        'default'     => esc_attr__( 'Sunday Services: 10:30am', 'uuatheme' ),
        'priority'    => 15,
    ) );

    //* Footer Options *//

    // Link and logo for welcoming congregations
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_welcoming_congregation_link',
        'label'       => __( 'Welcoming Congregation Logo', 'uuatheme' ),
        'description' => __( 'Enter the address of your own page or the UUA page (http://www.uua.org/lgbtq/welcoming/program) about welcoming congregations if you want to display the welcoming congregations logo.', 'uuatheme' ),
        'section'     => 'uuatheme_footer_options',
        'default'     => '',
        'priority'    => 10,
    ) );

    // Link and logo for green sanctuary
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_green_sanctuary_link',
        'label'       => __( 'Green Sanctuary Logo', 'uuatheme' ),
        'description' => __( 'Enter the address of your own page or the UUA page (http://www.uua.org/environment/sanctuary) about green sanctuaries if you want to display the green sanctuary logo.', 'uuatheme' ),
        'section'     => 'uuatheme_footer_options',
        'default'     => '',
        'priority'    => 15,
    ) );

    // Link and logo for green sanctuary
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'textarea',
        'settings'    => 'uuatheme_copyright_text',
        'label'       => __( 'Copyright Text', 'uuatheme' ),
        'description' => __( 'Edit your footer copyright text. To add the copyright symbol, type &copy;', 'uuatheme' ),
        'section'     => 'uuatheme_footer_options',
        'default'     => '',
        'priority'    => 20,
    ) );

    //* Social Networks *//

    // Facebook
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_facebook_link',
        'label'       => __( 'Facebook Link', 'uuatheme' ),
        'section'     => 'uuatheme_social_networks',
        'default'     => '',
        'priority'    => 10,
    ) );

    // Twitter
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_twitter_link',
        'label'       => __( 'Twitter Link', 'uuatheme' ),
        'section'     => 'uuatheme_social_networks',
        'default'     => '',
        'priority'    => 15,
    ) );

    // YouTube
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_youtube_link',
        'label'       => __( 'YouTube Link', 'uuatheme' ),
        'section'     => 'uuatheme_social_networks',
        'default'     => '',
        'priority'    => 20,
    ) );

    // Pinterest
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_pinterest_link',
        'label'       => __( 'Pinterest Link', 'uuatheme' ),
        'section'     => 'uuatheme_social_networks',
        'default'     => '',
        'priority'    => 25,
    ) );

    // Instagram
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_instagram_link',
        'label'       => __( 'Instagram Link', 'uuatheme' ),
        'section'     => 'uuatheme_social_networks',
        'default'     => '',
        'priority'    => 30,
    ) );

    // GooglePlus
    Kirki::add_field( 'uuatheme_kirki_config', array(
        'type'        => 'text',
        'settings'    => 'uuatheme_googleplus_link',
        'label'       => __( 'GooglePlus Link', 'uuatheme' ),
        'section'     => 'uuatheme_social_networks',
        'default'     => '',
        'priority'    => 35,
    ) );

}
add_action( 'init', 'uuatheme_kirki_init' );

/**
* Add AJAX live preview for layout field: enqueue the js script that handles the live preview
*/
function uuatheme_customizer_live_preview() {
    wp_enqueue_script( 'uuatheme_css_preview', get_template_directory_uri() . '/inc/js/uuatheme-customizer-preview.js', array( 'customize-preview', 'jquery' ), '', true );
}
add_action( 'customize_preview_init', 'uuatheme_customizer_live_preview' );

/**
 * Filter the kirki configurations.
 *
 * @param array $config
 */
function uuatheme_kirki_config( $config ) {
    $config['disable_output'] = true;
    $config['disable_loader'] = true;
    return $config;
}
add_filter( 'kirki_config', 'uuatheme_kirki_config' );
