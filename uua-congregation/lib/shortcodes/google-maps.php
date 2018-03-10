<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( ! function_exists( 'uuatheme_map_shortcode' ) ) {
/**
 * The Google Maps shortcode function.
 * @since  1.0.0
 * @param  array  $atts    Shortcode attributes.
 * @return string          HTML output.
 */
function uuatheme_map_shortcode( $atts ) {

    $atts = shortcode_atts(
        array(
            'address'           => null,
            'label'             => '',
            'width'             => '100%',
            'height'            => '400px',
            'enablescrollwheel' => 'true',
            'zoom'              => 15,
            'disablecontrols'   => 'false',
        ),
        $atts
    );

    // Check for address
    if ( empty( $atts['address'] ) ) {
        return __( 'Invalid request. Did you enter an address?', 'uuatheme' );
    }

    // Get Google Maps API Key
    $googlemapsapikey = get_theme_mod('uuatheme_googlemapsapi');

    // Enqueue Google Maps API Script
    wp_enqueue_script( 'google-maps-api', '//maps.google.com/maps/api/js?key=' . $googlemapsapikey, array(), false, true );

    // Get address coordinates
    $coordinates = uuatheme_map_get_coordinates( $atts['address'] );
    if ( is_wp_error( $coordinates ) ) {
        return $coordinates->get_error_message();
    }

    // Generate a unique ID for this map
    $map_id = uniqid( 'uuatheme_map_' );

    // Output HTML
    $options = htmlspecialchars( json_encode( $atts ), ENT_QUOTES, 'UTF-8' );

    $html = '<div id="' . esc_attr( $map_id ) . '" class="uuatheme_map_canvas" data-lat="' . $coordinates['lat'] . '" data-lng="' . $coordinates['lng'] . '" data-options="' . $options . '" style="width:' . $atts['width'] . ';height:' . $atts['height'] . ';"></div><a href="https://maps.google.com?saddr=Current+Location&daddr=' . $coordinates['lat'] . ',' . $coordinates['lng'] . '" target="_blank">' . __( 'Directions from your current location', 'uuatheme') . '</a>';

    return $html;
}
add_shortcode( 'uuatheme_map', 'uuatheme_map_shortcode' );
}

if ( ! function_exists( 'uuatheme_map_get_coordinates' ) ) {
/**
 * Retrieve coordinates for an address.
 *
 * Coordinates are cached using transients.
 *
 * @since 1.0.0
 * @param string $address The specified address.
 * @param bool $force_refresh Refresh the cached map coordinates.
 * @return array|WP_Error The response or WP_Error on failure.
 */
function uuatheme_map_get_coordinates( $address, $force_refresh = false ) {

    $coordinates = get_transient( 'uuatheme_map_' . md5( serialize( $address ) ) );

    if ( $force_refresh || $coordinates === false) {

        $args = array(
            'address' => urlencode( $address ),
            'sensor'  => false,
        );

        $url = add_query_arg( $args, 'https://maps.googleapis.com/maps/api/geocode/json' );

        $raw_response = wp_remote_get( $url );

        if ( is_wp_error( $raw_response ) ) {
            return $raw_response;
        } elseif ( empty( $raw_response['body'] ) ) {
            return new WP_Error( 'uuatheme-map', __( 'Unable to connect to the Google API service.', 'uuatheme' ) );
        }

        $response = json_decode( $raw_response['body'] );

        if ( $response->status === 'OK' ) {

            $location = $response->results[0]->geometry->location;

            $coordinates = array(
                'lat'     => $location->lat,
                'lng'     => $location->lng,
                'address' => (string) $response->results[0]->formatted_address,
            );

            // cache results for 3 months
            set_transient( 'uuatheme_map_' . md5( serialize( $address ) ), $coordinates, 3 * MONTH_IN_SECONDS );

        } elseif ( $response->status === 'ZERO_RESULTS' ) {
            return new WP_Error( 'uuatheme-map', __( 'No location found for the specified address.', 'uuatheme' ) );
        } elseif( $response->status === 'INVALID_REQUEST' ) {
            return new WP_Error( 'uuatheme-map', __( 'Invalid request. Did you enter an address?', 'uuatheme' ) );
        } else {
            return new WP_Error( 'uuatheme-map', __( 'Something went wrong while retrieving your map.', 'uuatheme' ) );
        }
    }

    return $coordinates;
}
}

/**
 * Fixes a problem with responsive themes
 *
 * @since 1.0.1
 * @return void
 */
function uuatheme_map_css() {
    echo '<style type="text/css">.uuatheme_map_canvas{color:black}.uuatheme_map_canvas img{max-width:none;}</style>';
}
add_action( 'wp_head', 'uuatheme_map_css' );
