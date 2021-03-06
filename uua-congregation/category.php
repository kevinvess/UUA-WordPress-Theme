<?php
/**
 * The template for displaying category archives.
 *
 * @package uuasite
 */

get_header(); ?>

	
	<div class="primary-content col-md-7 col-md-push-2">
	<main id="main" class="main" role="main">
		
		<h1 class="page-title"><?php echo uuatheme_title(); ?></h1>
		
		<?php if (!have_posts()) : ?>
		  <div class="alert alert-warning">
		    <?php _e('Sorry, no results were found.', 'uuatheme'); ?>
		  </div>
		  <?php get_search_form(); ?>
		<?php endif; ?>
		
		<?php global $cat; ?>
		<?php echo category_description( $cat ); ?>
		
		<?php while (have_posts()) : the_post(); ?>
		  <?php get_template_part('partials/content', get_post_format()); ?>
		<?php endwhile; ?>
		
		<?php if ($wp_query->max_num_pages > 1) : ?>
		  <nav class="post-nav">
		    <ul class="pager">
		      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'uuatheme')); ?></li>
		      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'uuatheme')); ?></li>
		    </ul>
		  </nav>
		<?php endif; ?>

	</main><!-- #main -->
	</div>

<?php get_sidebar('left'); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>