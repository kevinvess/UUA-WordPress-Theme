<div class="row slide-search">
	<div class="container">
		<div class="sitesearch">
		<form style="display: inline-block;" role="search" method="get" class="search-form form-inline" action="<?php echo esc_url(home_url('/')); ?>">
		  <label class="sr-only" for="searchinput"><?php _e('Search for:', 'uuatheme'); ?></label>
		  <div class="input-group">
		    <input id="searchinput" label="search" type="search" value="<?php echo get_search_query(); ?>" name="s" class="search-field form-control" placeholder="<?php _e('Search', 'uuatheme'); ?>" required>
		    <span class="input-group-btn">
		      <button type="submit" class="search-submit btn btn-default"><?php _e('Search', 'uuatheme'); ?></button>
		    </span>
		  </div>
		</form>
		</div>
	</div>
</div>