<article <?php post_class(); ?>>
  <?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			the_post_thumbnail('thumbnail', array('class' => 'alignright round'));
		} 
	?>
  <header>
    <h2 class="entry-title"><?php the_title(); ?></h2>
  </header>
  <div class="entry-summary">
    <?php the_content(); ?>
  </div>
</article>
