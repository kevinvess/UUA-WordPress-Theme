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
<!-- 					  <section class="widget widget_text">			 -->
				
					  <!-- Carousel
						================================================== -->
<!-- 						<div id="myCarousel" class="carousel slide" data-ride="carousel"> -->
						  <!-- Indicators -->
<!--
						  <ol class="carousel-indicators">
						    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						    <li data-target="#myCarousel" data-slide-to="1"></li>
						    <li data-target="#myCarousel" data-slide-to="2"></li>
						  </ol>
						  <div class="carousel-inner" role="listbox">
						    <div class="item active">
						      <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2015/06/buddhist_meditation_statue_-_david_gabriel_fischer_on_flickr_creative_commons.jpg" alt="First slide">
						      <div class="carousel-caption">
						        <header><span>June’s theme is “Compassion”</span></header>
						      </div>
						    </div>
						    <div class="item">
						      <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2015/06/onions.jpeg" alt="Second slide">
						      <div class="carousel-caption">
						        <header><span>Serve with us at the homeless shelter</span></header>
						      </div>
						    </div>
						    <div class="item">
						      <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2015/06/fdo_mg_bloomuu_lasagna.jpg" alt="Third slide">
						      <div class="carousel-caption">
						        <header><span>Join us for Friday Family Fun Nights!</span></header>
						      </div>
						    </div>
						  </div>
						</div>
					  </section>
-->
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