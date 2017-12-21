<?php 
	//Get the set display time
	$uu_services_displaytime = get_post_meta( get_the_ID(), '_uu_services_datetime-display', true );
	//Get the automated display time
	$timestamp = get_post_meta( get_the_ID(), '_services_unixtime', true );
	$servicedate = date("F j, Y - g:ia", $timestamp);
?>
<?php 
	// If there is a set display time
	if(!empty($uu_services_displaytime)) {
	?>
		<time><?php echo $uu_services_displaytime; ?></time>
  <?php 
	// If there is no set display time, show the automated display time
  } else { 
  ?>
		<time datetime="<?php echo get_the_time('c'); ?>"><?php echo $servicedate; ?></time>
<?php } ?>