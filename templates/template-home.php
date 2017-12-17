<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
				
			<?php endwhile; // End of the loop. ?>
				
				<div class="row">					
					<div class="col-lg-8 home-featured match">
					  <?php dynamic_sidebar('sidebar-home-one'); ?>
					</div>
					<div class="col-lg-4 home-widget-2 match">
					  <?php dynamic_sidebar('sidebar-home-two'); ?>
					</div>
				</div>				
							
				<div class="row grey">
				  <div class="col-sm-4 home-feature">
					  <?php dynamic_sidebar('sidebar-home-three'); ?>
				  </div>
				  <div class="col-sm-4 home-feature">
					  <?php dynamic_sidebar('sidebar-home-four'); ?>
				  </div>
				  <div class="col-sm-4 home-feature">
					  <?php dynamic_sidebar('sidebar-home-five'); ?>
				  </div>
				</div>
				
				<div class="row">
				  <div class="col-md-4 home-news">
					  <?php dynamic_sidebar('sidebar-home-six'); ?>
				  </div>
				  <div class="col-md-4 home-events">
					  <?php dynamic_sidebar('sidebar-home-seven'); ?>
				  </div>
				  <div class="col-md-4 home-testimonials testimonials">
					  <?php dynamic_sidebar('sidebar-home-eight'); ?>
				  </div>
				</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>