<?php
/**
 * The template for displaying the error page.
 *
 */

get_header(); ?>

<div class="primary-content col-md-9">
<main id="main" class="main" role="main">

	<div class="alert alert-warning">
	  <?php _e('Sorry, but the page you were trying to view does not exist.', 'uuatheme'); ?>
	</div>
	
	<p><?php _e('It looks like this was the result of either:', 'uuatheme'); ?></p>
	<ul>
	  <li><?php _e('a mistyped address', 'uuatheme'); ?></li>
	  <li><?php _e('an out-of-date link', 'uuatheme'); ?></li>
	</ul>
	
	<?php get_search_form(); ?>


	</main><!-- #main -->
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>