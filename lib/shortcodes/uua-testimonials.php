<?php

/**
 * UUA Testimonials Shortcode
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

// adds testimonial shortcode
function uua_testimonials_shortcode( $atts ) {
	ob_start();

	$args = array(
		'post_type' => 'testimonial',
	);

	$testimonial_query = new WP_Query( $args );
	if ( $testimonial_query->have_posts() ) { 
		global $post;
	?>
		<div class="testimonials-archive-list">
			<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
			  <?php get_template_part('partials/content', 'testimonials'); ?>
			<?php endwhile;
			wp_reset_postdata(); ?>
		</div>
	<?php $output = ob_get_clean();
	return $output;
	}	
}
add_shortcode( 'uua_testimonials', 'uua_testimonials_shortcode' );