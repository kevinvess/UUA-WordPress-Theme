<div class="social-media-links">
	<?php if ( $facebook_url = get_theme_mod('uuatheme_facebook_link') ) : ?>
		<a href="<?php echo esc_url($facebook_url); ?>"><i class="fa fa-facebook-official fa-2x"></i><span class="sr-only">Facebook</span></a>
	<?php endif; ?>			
	<?php if ( $twitter_url = get_theme_mod('uuatheme_twitter_link') ) : ?>
		<a href="<?php echo esc_url($twitter_url); ?>"><i class="fa fa-twitter fa-2x"></i><span class="sr-only">Twitter</span></a>
	<?php endif; ?>			
	<?php if ( $youtube_url = get_theme_mod('uuatheme_youtube_link') ) : ?>
		<a href="<?php echo esc_url($youtube_url); ?>"><i class="fa fa-youtube fa-2x"></i><span class="sr-only">YouTube</span></a>
	<?php endif; ?>			
	<?php if ( $pinterest_url = get_theme_mod('uuatheme_pinterest_link') ) : ?>
		<a href="<?php echo esc_url($pinterest_url); ?>"><i class="fa fa-pinterest fa-2x"></i><span class="sr-only">Pinterest</span></a>
	<?php endif; ?>			
	<?php if ( $instagram_url = get_theme_mod('uuatheme_instagram_link') ) : ?>
		<a href="<?php echo esc_url($instagram_url); ?>"><i class="fa fa-instagram fa-2x"></i><span class="sr-only">Instagram</span></a>
	<?php endif; ?>			
	<?php if ( $googleplus_url = get_theme_mod('uuatheme_googleplus_link') ) : ?>
		<a href="<?php echo esc_url($googleplus_url); ?>"><i class="fa fa-google-plus fa-2x"></i><span class="sr-only">GooglePlus</span></a>
	<?php endif; ?>
</div>