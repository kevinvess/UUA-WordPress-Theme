	<?php // Display service topics, if any
		$speaker_list = get_the_term_list( $post->ID, 'uu_service_speaker' );
		if(!empty($speaker_list)) {
	?>
		<span class="speaker"><?php the_terms( '', 'uu_service_speaker', '', ', ' ); ?></span>
	<?php } ?>