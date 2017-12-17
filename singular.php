<?php
/**
 * The template for displaying all single posts.
 *
 */

get_header(); ?>

	<div class="primary-content col-md-7 col-md-push-2">
	<main id="main" class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
	</div>

<?php get_sidebar('left'); ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>