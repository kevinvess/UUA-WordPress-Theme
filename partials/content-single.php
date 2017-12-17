<article <?php post_class(); ?>>
  <header>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php get_template_part('partials/entry-meta'); ?>
  </header>
  <?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			if(is_singular('testimonial')) {
			the_post_thumbnail('medium', array('class' => 'alignright round'));
			} else {
			the_post_thumbnail('medium', array('class' => 'alignright'));
			}				
		}
	?>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>
  <footer>
    <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'uuatheme'), 'after' => '</p></nav>')); ?>
  </footer>
  <?php comments_template('/comments.php'); ?>
</article>