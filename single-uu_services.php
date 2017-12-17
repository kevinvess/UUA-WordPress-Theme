<?php
/**
 * The template for displaying all single services.
 *
 */

get_header(); ?>

	<div class="primary-content col-md-7 col-md-push-2">
	<main id="main" class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article <?php post_class(); ?>>
				<header>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php get_template_part('partials/services-meta'); ?>
				</header>
				<?php
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail('medium', array('class' => 'alignright'));
					}
				?>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php // Display service topics, if any
					    $topic_term_list = get_the_term_list( get_the_ID(), 'uu_service_topics' );
					    if(!empty($topic_term_list)) {
						?>
						<span class="small topics">Topics: <?php the_terms( '', 'uu_service_topics', '', ', ' ); ?></span>
					<?php } ?>
				</div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'uuatheme'), 'after' => '</p></nav>')); ?>
				</footer>
				<?php comments_template('/comments.php'); ?>
			</article>

		<?php endwhile; // End of the loop. ?>

	</main><!-- #main -->
	</div>

<?php get_sidebar('left'); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
