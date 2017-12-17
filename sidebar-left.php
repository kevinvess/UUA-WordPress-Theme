<div class="col-md-2 col-md-pull-7 left-sidebar">
	
	<span class="sr-only">Section Navigation</span>
	
	<nav class="sidebar-nav-collapse" role="navigation">
	
	<?php if(is_single()) { ?> 
		<?php dynamic_sidebar('sidebar-left'); ?>
	<?php } else { ?>
	<?php uuatheme_list_subpages(); ?>
	<?php } ?>
	
	</nav>
</div>

<script>
	jQuery(document).ready(function($){
		
		var nav = responsiveNav(".sidebar-nav-collapse", { // Selector
		  animate: true, // Boolean: Use CSS3 transitions, true or false
		  transition: 284, // Integer: Speed of the transition, in milliseconds
		  label: "Section Menu", // String: Label for the navigation toggle
		  insert: "before", // String: Insert the toggle before or after the navigation
		  customToggle: "", // Selector: Specify the ID of a custom toggle
		  closeOnNavClick: false, // Boolean: Close the navigation when one of the links are clicked
		  openPos: "relative", // String: Position of the opened nav, relative or static
		  navClass: "nav-collapse", // String: Default CSS class. If changed, you need to edit the CSS too!
		  navActiveClass: "js-nav-active", // String: Class that is added to  element when nav is active
		  jsClass: "js", // String: 'JS enabled' class which is added to  element
		  init: function(){}, // Function: Init callback
		  open: function(){}, // Function: Open callback
		  close: function(){} // Function: Close callback
		});

	});
</script>