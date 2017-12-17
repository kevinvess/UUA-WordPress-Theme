<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package uuasite
 */

get_header(); ?>

	
	<div class="primary-content col-md-7 col-md-push-2">
	<main id="main" class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/content', 'page' ); ?>
			
		  <?php comments_template('/comments.php'); ?>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
	</div>

<?php get_sidebar('left'); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>