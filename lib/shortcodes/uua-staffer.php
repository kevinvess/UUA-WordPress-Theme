<?php

/**
 * UUA Staffer Shortcode
 *
 * @access      private
 * @since       1.0
 * @return      void
*/

// adds staff shortcode


if ( ! function_exists('uua_staffer_shortcode') ) {

	function uua_staffer_shortcode( $atts ) {
		extract( shortcode_atts( array (
			'order' => 'DESC',
			'orderby' => 'date',
			'number' => -1,
			'department' => '',
		), $atts ) );

		if ( $department != '' ) {
			$tax_query = array (
				array (
					'taxonomy'	=> 'department',
					'field'		=> 'slug',
					'terms'		=> $department,
					),
				);
		} else {
			$tax_query = null;
		}
		$args = array(
			'post_type' => 'staff',
			'order' => $order,
			'orderby' => $orderby,
			'posts_per_page' => $number,
			'tax_query' => $tax_query,
		);
		$staff_query = new WP_Query( $args );
		if ( $staff_query->have_posts() ) {
			global $post;
			$stafferoptions = get_option ( 'staffer' );
		?>
			<?php ob_start(); ?>
				<div class="staffer-archive-list">
				<?php while ( $staff_query->have_posts() ) : $staff_query->the_post(); ?>
					<div class="staff-member">
						<header class="staffer-staff-header">
						<?php the_post_thumbnail ( 'thumbnail', array ('class' => 'alignright') ); ?>
						<h3 class="staffer-staff-title">
							<a href="<?php the_permalink(); ?>">
								<?php echo the_title(); ?>
							</a>
							<?php
						if ( get_post_meta ($post->ID,'staffer_staff_title', true) != '' ) {
							echo '<br /><small>';
							echo get_post_meta ($post->ID,'staffer_staff_title', true) . '</small>';
							}
							?>
						</h3>
						</header>
						<div class="staff-content">
							<?php
							if ($stafferoptions['estyle'] == null or $stafferoptions['estyle'] == 'excerpt' ) {
								the_excerpt();
							} elseif ($stafferoptions['estyle'] == 'full' ) {
								the_content();
							} elseif ($stafferoptions['estyle'] == 'none' ) {
								// nothing to see here
							}
							?>
						</div>
					</div>
			<?php endwhile; ?>
				</div>
			<?php
				$output = ob_get_clean();
				return $output;
			?>
			<?php wp_reset_postdata(); ?>
			</div>
		<?php $output = ob_get_clean();
		return $output;
		}
	}
	add_shortcode( 'uua_staffer', 'uua_staffer_shortcode' );

}