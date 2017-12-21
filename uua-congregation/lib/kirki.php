<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category UUA Theme
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 *
 */

 function uuatheme_panels_sections( $wp_customize ) {
	
			/**
				* Add a Section for Design Options
				*/
			$wp_customize->add_section( 'uuatheme_design_options', array(
				'title'       => __( 'Theme Colour Options', 'uuatheme' ),
				'priority'    => 10,
				'panel'       => '',
				'description' => __( 'Make changes to the site colour scheme', 'uuatheme' ),
			) );

			/**
				* Add a Section for Congregation Information
				*/
			$wp_customize->add_section( 'uuatheme_congregation_information', array(
				'title'       => __( 'Congregation Map Information', 'uuatheme' ),
				'priority'    => 10,
				'panel'       => '',
				'description' => __( 'Make changes to the information for maps', 'uuatheme' ),
			) );

			/**
				* Add a Section for Header Options
				*/
			$wp_customize->add_section( 'uuatheme_header_options', array(
				'title'       => __( 'Header Options', 'uuatheme' ),
				'priority'    => 10,
				'panel'       => '',
				'description' => __( 'Make changes to the header section', 'uuatheme' ),
			) );
			
			/**
				* Add a Section for Footer Options
				*/
			$wp_customize->add_section( 'uuatheme_footer_options', array(
				'title'       => __( 'Footer Options', 'uuatheme' ),
				'priority'    => 10,
				'panel'       => '',
				'description' => __( 'Make changes to the footer section', 'uuatheme' ),
			) );
						
			/** 
				* Add a Section for Social Connections
		    */
			$wp_customize->add_section( 'uuatheme_social_connections', array(
				'title'       => __( 'Social Network Connections', 'uuatheme' ),
				'priority'    => 10,
				'panel'       => '',
				'description' => __( 'Add social network page addresses for icon links in header and footer. Put the page address in the box including the http:// part.', 'uuatheme' ),
			) );
	
	  }
	  add_action( 'customize_register', 'uuatheme_panels_sections' );

	
/**
	* Add Fields to the sections
	*/
	function uuatheme_fields( $fields ) {

	/* SITEWIDE FIELDS */
    
	  /**
	   * Add a Field to change the site color scheme
	   */
	  $fields[] = array(
		    'type'        => 'radio',
		    'settings'     => 'uuatheme_colors',
		    'label'       => __( 'Site Color Scheme', 'kirki' ),
		    'description' => __( 'Choose from the dark blue, grey-red, or aqua-green colour scheme.', 'kirki' ),
		    'section'     => 'uuatheme_design_options',
	      'default'     => 'fullwidth',
		    'priority'    => 10,
		    'choices'     => array(
		        'dark-blue' => __( 'Dark Blue', 'kirki' ),
		        'grey-red' => __( 'Grey Red', 'kirki' ),
		        'aqua-green' => __( 'Aqua Green', 'kirki' ),
		    ),
		);

	/* CONGREGATION INFORMATION FIELDS */
	  
	  /**
	   * Address
	   */
	  $fields[] = array(
	      'type'        => 'textarea',
	      'setting'     => 'uuatheme_congregation_address',
	      'label'       => __( 'Congregation Address for Maps', 'uuatheme' ),
	      'description' => __( 'What is your physical street address, including city, state and zip code?', 'uuatheme' ),
	      'section'     => 'uuatheme_congregation_information',
	      'default'     => '',
	      'priority'    => 15,
	  );

	  /**
	   * Add Google Maps API Key
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_googlemapsapi',
	      'label'       => __( 'Google Maps API Key', 'uuatheme' ),
	      'description' => __( 'What is your Google Maps API Key', 'uuatheme' ),
	      'section'     => 'uuatheme_congregation_information',
	      'default'     => '',
	      'priority'    => 15,
	  );
	  


	/* SOCIAL CONNECTIONS */
	
	  /**
	   * Add a Facebook link
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_facebook_link',
	      'label'       => __( 'Facebook Link', 'uuatheme' ),
	      'description' => __( '', 'uuatheme' ),
	      'section'     => 'uuatheme_social_connections',
	      'default'     => '',
	      'priority'    => 15,
	  );
	  
	  /**
	   * Add a Twitter link
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_twitter_link',
	      'label'       => __( 'Twitter Link', 'uuatheme' ),
	      'description' => __( '', 'uuatheme' ),
	      'section'     => 'uuatheme_social_connections',
	      'default'     => '',
	      'priority'    => 15,
	  );
	  
	  /**
	   * Add a YouTube link
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_youtube_link',
	      'label'       => __( 'YouTube Link', 'uuatheme' ),
	      'description' => __( '', 'uuatheme' ),
	      'section'     => 'uuatheme_social_connections',
	      'default'     => '',
	      'priority'    => 15,
	  );

	  /**
	   * Add a Pinterest link
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_pinterest_link',
	      'label'       => __( 'Pinterest Link', 'uuatheme' ),
	      'description' => __( '', 'uuatheme' ),
	      'section'     => 'uuatheme_social_connections',
	      'default'     => '',
	      'priority'    => 15,
	  );
	  
	  /**
	   * Add a Instagram link
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_instagram_link',
	      'label'       => __( 'Instagram Link', 'uuatheme' ),
	      'description' => __( '', 'uuatheme' ),
	      'section'     => 'uuatheme_social_connections',
	      'default'     => '',
	      'priority'    => 15,
	  );
	  
	  /**
	   * Add a Google+ link
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_googleplus_link',
	      'label'       => __( 'GooglePlus Link', 'uuatheme' ),
	      'description' => __( '', 'uuatheme' ),
	      'section'     => 'uuatheme_social_connections',
	      'default'     => '',
	      'priority'    => 15,
	  );

	  
	/* HEADER FIELDS */
	  
	  /**
	   * Site logo
	   */
	  $fields[] = array(
				'type'     => 'image',
				'setting'  => 'uuatheme_logo_upload',
				'label'    => __( 'Logo Image', 'uuatheme' ),
				'section'  => 'uuatheme_header_options',
				'default'  => '',
				'priority' => 1,
				'transport' => 'refresh'
	  );	  
	
	  /**
	   * Add a text field beneath the utility menu
	   */
	  $fields[] = array(
	      'type'        => 'textarea',
	      'setting'     => 'uuatheme_header_text',
	      'label'       => __( 'Header Text', 'uuatheme' ),
	      'description' => __( 'Edit the text in the header beneath the utility menu.', 'uuatheme' ),
	      'section'     => 'uuatheme_header_options',
	      'default'     => 'Sunday Services: 10:30am',
	      'priority'    => 15,
	  );
	
	/* FOOTER FIELDS */
	
	  /**
	   * Add a text field to add a link and logo for welcoming congregations
	   */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_welcoming_congregation_link',
	      'label'       => __( 'Welcoming Congregation Link', 'uuatheme' ),
	      'description' => __( 'Enter the address of your own page or the UUA page (http://www.uua.org/lgbtq/welcoming/program) about welcoming congregations if you want to display the welcoming congregations logo.', 'uuatheme' ),
	      'section'     => 'uuatheme_footer_options',
	      'default'     => '',
	      'priority'    => 15,
	  );	  

  
	  /**
		  * Add a text field to add a link and logo for green sanctuary
	    */
	  $fields[] = array(
	      'type'        => 'text',
	      'setting'     => 'uuatheme_green_sanctuary_link',
	      'label'       => __( 'Green Sanctuary Logo', 'uuatheme' ),
	      'description' => __( 'Enter the address of your own page or the UUA page (http://www.uua.org/environment/sanctuary) about green sanctuaries if you want to display the green sanctuary logo.', 'uuatheme' ),
	      'section'     => 'uuatheme_footer_options',
	      'default'     => '',
	      'priority'    => 25,
	  );
		


		/* FOOTER COPYRIGHT */
	  
	  /**
	   * Copyright text
	   */
	  $fields[] = array(
	      'type'        => 'textarea',
	      'setting'     => 'uuatheme_copyright_text',
	      'label'       => __( 'Copyright Text', 'uuatheme' ),
	      'description' => __( 'Edit your footer copyright text. To add the copyright symbol, type &copy;', 'uuatheme' ),
	      'section'     => 'uuatheme_footer_text',
	      'default'     => '',
	      'priority'    => 20,
	  );
    
    
  return $fields;
    
}
add_filter( 'kirki/fields', 'uuatheme_fields' );


/**
* Add AJAX live preview for layout field: enqueue the js script that handles the live preview
*/

function uuatheme_customizer_live_preview() {
    wp_enqueue_script( 'uuatheme_css_preview', get_template_directory_uri().'/inc/js/uuatheme-customizer-preview.js', array( 'customize-preview', 'jquery' ), '', true );
}
add_action( 'customize_preview_init', 'uuatheme_customizer_live_preview' );




/**
 * Configuration sample for the Kirki Customizer.
 */
function kirki_configuration() {
	$args = array(
		'disable_output' => true,
	);
	return $args;
}
add_filter( 'kirki/config', 'kirki_configuration' );