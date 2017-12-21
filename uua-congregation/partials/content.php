<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php if(is_post_type ('uu_services') ) { ?> 
	    <?php get_template_part('partials/services-meta'); ?>		
	<?php } else { ?>
	    <?php get_template_part('partials/entry-meta'); ?>
    <?php } ?>
  </header>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
</article>
