<?php

/**
 * UUA Testimonials Shortcode
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

// adds testimonial shortcode

if ( ! function_exists('uua_testimonials_shortcode') ) {

	function uua_testimonials_shortcode( $atts ) {
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$args = array(
		    'posts_per_page' => 5,
				'post_type' => 'testimonial',
				'paged' => $paged
		);
		$query_args = apply_filters( 'testimonial_query_args', $args );
		$testimonial_query = new WP_Query( $query_args );
		if ( $testimonial_query->have_posts() ) {
			global $post;
		?>
			<div class="testimonials-archive-list">
				<?php	ob_start(); ?>
				<?php while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post(); ?>
				  <?php get_template_part('partials/content', 'testimonials'); ?>
				<?php endwhile; ?>
			</div>
		    <?php $args = [
				'query' => $testimonial_query
				];
				echo get_paginated_numbers( $args );
			?>
		<?php $output = ob_get_clean();
		wp_reset_query(); 
		return $output;
		}
	}
	add_shortcode( 'uua_testimonials', 'uua_testimonials_shortcode' );

}