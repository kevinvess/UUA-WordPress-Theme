<div class="row slide-location">
	<div class="container">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<span class="sr-only">Google Map</span>
			<?php 
				$uuatheme_address = get_theme_mod('uuatheme_congregation_address');
				echo do_shortcode('[uuatheme_map address="'.$uuatheme_address.'" height="250px" enablescrollwheel=false]'); 
			?>
		</div>
    <?php dynamic_sidebar('sidebar-footer-one'); ?>

		<div class="col-md-1"></div>		
	</div>
</div>