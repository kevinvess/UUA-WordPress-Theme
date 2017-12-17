<?php

/**
 * Displays the map
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

function uuatheme_map_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'address'           => false,
			'label'           	=> false,
			'width'             => '100%',
			'height'            => '400px',
			'enablescrollwheel' => 'true',
			'zoom'              => 15,
			'disablecontrols'   => 'false'
		),
		$atts
	);

	$address = $atts['address'];

	if( $address )	if( $address && wp_script_is( 'google-maps-api', 'registered' ) ) :

		wp_print_scripts( 'google-maps-api' );

		$coordinates = uuatheme_map_get_coordinates( $address );

		if( !is_array( $coordinates ) )
			return;

		$map_id = uniqid( 'uuatheme_map_' ); // generate a unique ID for this map

		ob_start(); ?>
		<div class="uuatheme_map_canvas" id="<?php echo esc_attr( $map_id ); ?>" style="height: <?php echo esc_attr( $atts['height'] ); ?>; width: <?php echo esc_attr( $atts['width'] ); ?>"></div><a href="https://maps.google.com?saddr=Current+Location&daddr=<?php echo $coordinates['lat']; ?>,<?php echo $coordinates['lng']; ?>" target="_blank">Directions from your current location</a>
	    <script type="text/javascript">
			var map_<?php echo $map_id; ?>;
			function uuatheme_run_map_<?php echo $map_id ; ?>(){
				var location = new google.maps.LatLng("<?php echo $coordinates['lat']; ?>", "<?php echo $coordinates['lng']; ?>");
				var map_options = {
					zoom: <?php echo $atts['zoom']; ?>,
					center: location,
					scrollwheel: <?php echo 'true' === strtolower( $atts['enablescrollwheel'] ) ? '1' : '0'; ?>,
					disableDefaultUI: <?php echo 'true' === strtolower( $atts['disablecontrols'] ) ? '1' : '0'; ?>,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				map_<?php echo $map_id ; ?> = new google.maps.Map(document.getElementById("<?php echo $map_id ; ?>"), map_options);

				var contentString = 'Church';
			
			  var infowindow = new google.maps.InfoWindow({
			    content: contentString
			  });
			
				var marker = new google.maps.Marker({
					position: location,
				  animation: google.maps.Animation.DROP,
			    title: '<?php echo esc_attr( $atts['label'] ); ?>',
					map: map_<?php echo $map_id ; ?>
				});
							
			  marker.addListener('click', function() {
			    infowindow.open(map_<?php echo $map_id ; ?>, marker);
			  });

			}
			uuatheme_run_map_<?php echo $map_id ; ?>();
		</script>
		<?php
		return ob_get_clean();
	else :
		return __( 'This Google Map cannot be loaded because the maps API does not appear to be loaded', 'uuatheme-maps' );
	endif;
}
add_shortcode( 'uuatheme_map', 'uuatheme_map_shortcode' );


/**
 * Loads Google Map API
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

function uuatheme_map_load_scripts() {
	wp_register_script( 'google-maps-api', '//maps.google.com/maps/api/js?sensor=false' );
}
add_action( 'wp_enqueue_scripts', 'uuatheme_map_load_scripts' );



/**
 * Retrieve coordinates for an address
 *
 * Coordinates are cached using transients and a hash of the address
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

function uuatheme_map_get_coordinates( $address, $force_refresh = false ) {

    $address_hash = md5( $address );

    $coordinates = get_transient( $address_hash );

    if ($force_refresh || $coordinates === false) {

    	$args       = array( 'address' => urlencode( $address ), 'sensor' => 'false' );
    	$url        = add_query_arg( $args, 'http://maps.googleapis.com/maps/api/geocode/json' );
     	$response 	= wp_remote_get( $url );

     	if( is_wp_error( $response ) )
     		return;

     	$data = wp_remote_retrieve_body( $response );

     	if( is_wp_error( $data ) )
     		return;

		if ( $response['response']['code'] == 200 ) {

			$data = json_decode( $data );

			if ( $data->status === 'OK' ) {

			  	$coordinates = $data->results[0]->geometry->location;

			  	$cache_value['lat'] 	= $coordinates->lat;
			  	$cache_value['lng'] 	= $coordinates->lng;
			  	$cache_value['address'] = (string) $data->results[0]->formatted_address;

			  	// cache coordinates for 3 months
			  	set_transient($address_hash, $cache_value, 3600*24*30*3);
			  	$data = $cache_value;

			} elseif ( $data->status === 'ZERO_RESULTS' ) {
			  	return __( 'No location found for the entered address.', 'uuatheme-maps' );
			} elseif( $data->status === 'INVALID_REQUEST' ) {
			   	return __( 'Invalid request. Did you enter an address?', 'uuatheme-maps' );
			} else {
				return __( 'Something went wrong while retrieving your map, please ensure you have entered the short code correctly.', 'uuatheme-maps' );
			}

		} else {
		 	return __( 'Unable to contact Google API service.', 'uuatheme-maps' );
		}

    } else {
       // return cached results
       $data = $coordinates;
    }

    return $data;
}


/**
 * Fixes a problem with responsive themes
 *
 * @access      private
 * @since       1.0.1
 * @return      void
*/

function uuatheme_map_css() {
	echo '<style type="text/css">/* =Responsive Map fix
-------------------------------------------------------------- */
.uuatheme_map_canvas img {
	max-width: none;
}</style>';

}
add_action( 'wp_head', 'uuatheme_map_css' );