<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category UUA Theme
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 *
 */
 
 add_action( 'cmb2_init', 'uuatheme_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function uuatheme_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_uuatheme_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'test_metabox',
        'title'         => __( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'page', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Test Text', 'cmb2' ),
        'desc'       => __( 'field description (optional)', 'cmb2' ),
        'id'         => $prefix . 'text',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Website URL', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'url',
        'type' => 'text_url',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    // Email text field
    $cmb->add_field( array(
        'name' => __( 'Test Text Email', 'cmb2' ),
        'desc' => __( 'field description (optional)', 'cmb2' ),
        'id'   => $prefix . 'email',
        'type' => 'text_email',
        // 'repeatable' => true,
    ) );

    // Add other metaboxes as needed

}